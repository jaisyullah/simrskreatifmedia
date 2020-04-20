<?php
//
class form_tbdetailrawatjalan_old_mob_apl
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
   var $trancode;
   var $dokter;
   var $dokter_1;
   var $selesai;
   var $selesai_1;
   var $tglkeluar;
   var $tglkeluar_hora;
   var $carakeluar;
   var $carakeluar_1;
   var $alasankeluar;
   var $custcode;
   var $custcode_1;
   var $nostruk;
   var $resikojatuh;
   var $diagnosa1;
   var $diagnosa2;
   var $icd1;
   var $icd2;
   var $sc_field_0;
   var $sc_field_0_1;
   var $soap;
   var $diagnosa;
   var $fisik;
   var $icd9cm;
   var $iskonsul;
   var $iskonsul_1;
   var $pemeriksaan;
   var $penunjang;
   var $resep;
   var $tindakan;
   var $hta;
   var $tp;
   var $uk;
   var $sc_field_1;
   var $sc_field_1_1;
   var $hasilrad;
   var $rujuk_intern_ke;
   var $rujuk_intern_ke_1;
   var $bhp;
   var $sc_field_2;
   var $sc_field_3;
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
          if (isset($this->NM_ajax_info['param']['alasankeluar']))
          {
              $this->alasankeluar = $this->NM_ajax_info['param']['alasankeluar'];
          }
          if (isset($this->NM_ajax_info['param']['bhp']))
          {
              $this->bhp = $this->NM_ajax_info['param']['bhp'];
          }
          if (isset($this->NM_ajax_info['param']['carakeluar']))
          {
              $this->carakeluar = $this->NM_ajax_info['param']['carakeluar'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['custcode']))
          {
              $this->custcode = $this->NM_ajax_info['param']['custcode'];
          }
          if (isset($this->NM_ajax_info['param']['diagnosa1']))
          {
              $this->diagnosa1 = $this->NM_ajax_info['param']['diagnosa1'];
          }
          if (isset($this->NM_ajax_info['param']['dokter']))
          {
              $this->dokter = $this->NM_ajax_info['param']['dokter'];
          }
          if (isset($this->NM_ajax_info['param']['fisik']))
          {
              $this->fisik = $this->NM_ajax_info['param']['fisik'];
          }
          if (isset($this->NM_ajax_info['param']['hasilrad']))
          {
              $this->hasilrad = $this->NM_ajax_info['param']['hasilrad'];
          }
          if (isset($this->NM_ajax_info['param']['hta']))
          {
              $this->hta = $this->NM_ajax_info['param']['hta'];
          }
          if (isset($this->NM_ajax_info['param']['icd1']))
          {
              $this->icd1 = $this->NM_ajax_info['param']['icd1'];
          }
          if (isset($this->NM_ajax_info['param']['icd9cm']))
          {
              $this->icd9cm = $this->NM_ajax_info['param']['icd9cm'];
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
          if (isset($this->NM_ajax_info['param']['nostruk']))
          {
              $this->nostruk = $this->NM_ajax_info['param']['nostruk'];
          }
          if (isset($this->NM_ajax_info['param']['pemeriksaan']))
          {
              $this->pemeriksaan = $this->NM_ajax_info['param']['pemeriksaan'];
          }
          if (isset($this->NM_ajax_info['param']['resep']))
          {
              $this->resep = $this->NM_ajax_info['param']['resep'];
          }
          if (isset($this->NM_ajax_info['param']['rujuk_intern_ke']))
          {
              $this->rujuk_intern_ke = $this->NM_ajax_info['param']['rujuk_intern_ke'];
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
          if (isset($this->NM_ajax_info['param']['sc_field_3']))
          {
              $this->sc_field_3 = $this->NM_ajax_info['param']['sc_field_3'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['selesai']))
          {
              $this->selesai = $this->NM_ajax_info['param']['selesai'];
          }
          if (isset($this->NM_ajax_info['param']['soap']))
          {
              $this->soap = $this->NM_ajax_info['param']['soap'];
          }
          if (isset($this->NM_ajax_info['param']['tglkeluar']))
          {
              $this->tglkeluar = $this->NM_ajax_info['param']['tglkeluar'];
          }
          if (isset($this->NM_ajax_info['param']['tindakan']))
          {
              $this->tindakan = $this->NM_ajax_info['param']['tindakan'];
          }
          if (isset($this->NM_ajax_info['param']['tp']))
          {
              $this->tp = $this->NM_ajax_info['param']['tp'];
          }
          if (isset($this->NM_ajax_info['param']['trancode']))
          {
              $this->trancode = $this->NM_ajax_info['param']['trancode'];
          }
          if (isset($this->NM_ajax_info['param']['uk']))
          {
              $this->uk = $this->NM_ajax_info['param']['uk'];
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
      $this->sc_conv_var['pilih dokter'] = "sc_field_1";
      $this->sc_conv_var['order lab'] = "sc_field_2";
      $this->sc_conv_var['rujuk radiologi'] = "sc_field_3";
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
      if (isset($this->v_dokter_terpilih) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['v_dokter_terpilih'] = $this->v_dokter_terpilih;
      }
      if (isset($this->kode_tran) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['kode_tran'] = $this->kode_tran;
      }
      if (isset($_POST["v_dokter_terpilih"]) && isset($this->v_dokter_terpilih)) 
      {
          $_SESSION['v_dokter_terpilih'] = $this->v_dokter_terpilih;
      }
      if (isset($_POST["kode_tran"]) && isset($this->kode_tran)) 
      {
          $_SESSION['kode_tran'] = $this->kode_tran;
      }
      if (isset($_GET["v_dokter_terpilih"]) && isset($this->v_dokter_terpilih)) 
      {
          $_SESSION['v_dokter_terpilih'] = $this->v_dokter_terpilih;
      }
      if (isset($_GET["kode_tran"]) && isset($this->kode_tran)) 
      {
          $_SESSION['kode_tran'] = $this->kode_tran;
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['embutida_parms']);
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
                 nm_limpa_str_form_tbdetailrawatjalan_old_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->v_dokter_terpilih)) 
          {
              $_SESSION['v_dokter_terpilih'] = $this->v_dokter_terpilih;
          }
          if (isset($this->kode_tran)) 
          {
              $_SESSION['kode_tran'] = $this->kode_tran;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['total']);
          }
          if (!isset($_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['total']))
          {
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['form_tbfisikrawatjalan_mob_script_case_init'] ]['form_tbfisikrawatjalan_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['form_tbfisikrawatjalan_mob_script_case_init'] ]['form_tbfisikrawatjalan_mob']['total']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan_mob']['total']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan_mob']['total']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan_mob']['total']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['total']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['total']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['form_tbhasilrad_mob_script_case_init'] ]['form_tbhasilrad_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['form_tbhasilrad_mob_script_case_init'] ]['form_tbhasilrad_mob']['total']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['form_tbicd9cmrawatjalan_mob_script_case_init'] ]['form_tbicd9cmrawatjalan_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['form_tbicd9cmrawatjalan_mob_script_case_init'] ]['form_tbicd9cmrawatjalan_mob']['total']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['form_tbsoaprawatjalan_mob_script_case_init'] ]['form_tbsoaprawatjalan_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['form_tbsoaprawatjalan_mob_script_case_init'] ]['form_tbsoaprawatjalan_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->v_dokter_terpilih)) 
          {
              $_SESSION['v_dokter_terpilih'] = $this->v_dokter_terpilih;
          }
          if (isset($this->kode_tran)) 
          {
              $_SESSION['kode_tran'] = $this->kode_tran;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['nm_run_menu'] = 1;
      } 
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->tglkeluar);
          $this->tglkeluar      = $aDtParts[0];
          $this->tglkeluar_hora = $aDtParts[1];
      }
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_tbdetailrawatjalan_old_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("id");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['initialize'];
          if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old']))
          {
              foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old_mob'][$I_conf]  = $Conf_opt;
              }
          }
      } 
      else 
      { 
         $this->nm_data = new nm_data("id");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_tbdetailrawatjalan_old_mob']['upload_field_info'] = array();

      $this->Ini->Init_apl_lig = array();
      $this->List_apl_lig = array('historiRJ'=>array('type'=>'cons', 'lab'=>'Histori Medis Pasien', 'hint'=>'', 'img_on'=>'', 'img_off'=>''));
      if (isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['sc_outra_jan'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['sc_modal']))
      {
          foreach ($this->List_apl_lig as $apl_name => $Lig_parms)
          {
              if (!isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init'][$apl_name]))
              {
                  $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init'][$apl_name] = rand(2, 10000);
              }
              $this->Ini->Init_apl_lig[$apl_name]['ini']     = "&script_case_init=" . $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init'][$apl_name];
              $this->Ini->Init_apl_lig[$apl_name]['type']    = $Lig_parms['type'];
              $this->Ini->Init_apl_lig[$apl_name]['lab']     = $Lig_parms['lab'];
              $this->Ini->Init_apl_lig[$apl_name]['hint']    = $Lig_parms['hint'];
              $this->Ini->Init_apl_lig[$apl_name]['img_on']  = $Lig_parms['img_on'];
              $this->Ini->Init_apl_lig[$apl_name]['img_off'] = $Lig_parms['img_off'];
          }
      }
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_tbdetailrawatjalan_old_mob']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_tbdetailrawatjalan_old_mob'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_tbdetailrawatjalan_old_mob']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_tbdetailrawatjalan_old_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_tbdetailrawatjalan_old_mob') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_tbdetailrawatjalan_old_mob']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - Pelayanan Rawat Jalan";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_tbdetailrawatjalan_old_mob")
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


      $this->arr_buttons['hta']['hint']             = "";
      $this->arr_buttons['hta']['type']             = "button";
      $this->arr_buttons['hta']['value']            = "Update HTA";
      $this->arr_buttons['hta']['display']          = "only_text";
      $this->arr_buttons['hta']['display_position'] = "text_right";
      $this->arr_buttons['hta']['style']            = "default";
      $this->arr_buttons['hta']['image']            = "";

      $this->arr_buttons['sc_btn_0']['hint']             = "";
      $this->arr_buttons['sc_btn_0']['type']             = "button";
      $this->arr_buttons['sc_btn_0']['value']            = "Histori Pasien";
      $this->arr_buttons['sc_btn_0']['display']          = "only_text";
      $this->arr_buttons['sc_btn_0']['display_position'] = "text_right";
      $this->arr_buttons['sc_btn_0']['style']            = "default";
      $this->arr_buttons['sc_btn_0']['image']            = "";

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


      $_SESSION['scriptcase']['error_icon']['form_tbdetailrawatjalan_old_mob']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_tbdetailrawatjalan_old_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old_mob']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old_mob']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old_mob']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['goto']      = 'on';
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
      $this->nmgp_botoes['HTA'] = "on";
      $this->nmgp_botoes['sc_btn_0'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old_mob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old_mob']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbdetailrawatjalan_old_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_tbdetailrawatjalan_old_mob'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_tbdetailrawatjalan_old_mob'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old_mob']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old_mob']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old_mob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old_mob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old_mob']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old_mob']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old_mob']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old_mob']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old_mob']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['dados_form'];
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['trancode'] != "null"){$this->trancode = $this->nmgp_dados_form['trancode'];} 
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['tglkeluar'] != "null"){
              $aDtParts = explode(' ', $this->nmgp_dados_form['tglkeluar']);
              $this->tglkeluar = $this->nm_conv_data_db($aDtParts[0], 'yyyy-mm-dd', $this->field_config['tglkeluar']['date_format']);
              $this->tglkeluar_hora = $aDtParts[1];
              $aDtParts = explode(';', $this->tglkeluar);
              $this->tglkeluar = $aDtParts[0];
          }
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['carakeluar'] != "null"){$this->carakeluar = $this->nmgp_dados_form['carakeluar'];} 
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['alasankeluar'] != "null"){$this->alasankeluar = $this->nmgp_dados_form['alasankeluar'];} 
          if (!isset($this->resikojatuh)){$this->resikojatuh = $this->nmgp_dados_form['resikojatuh'];} 
          if (!isset($this->diagnosa2)){$this->diagnosa2 = $this->nmgp_dados_form['diagnosa2'];} 
          if (!isset($this->icd2)){$this->icd2 = $this->nmgp_dados_form['icd2'];} 
          if (!isset($this->diagnosa)){$this->diagnosa = $this->nmgp_dados_form['diagnosa'];} 
          if (!isset($this->iskonsul)){$this->iskonsul = $this->nmgp_dados_form['iskonsul'];} 
          if (!isset($this->penunjang)){$this->penunjang = $this->nmgp_dados_form['penunjang'];} 
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['hta'] != "null"){
              $this->hta = $this->nmgp_dados_form['hta'];
              $this->hta = $this->nm_conv_data_db($this->hta, 'yyyy-mm-dd', $this->field_config['hta']['date_format']);
          }
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['tp'] != "null"){$this->tp = $this->nmgp_dados_form['tp'];} 
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['uk'] != "null"){$this->uk = $this->nmgp_dados_form['uk'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_tbdetailrawatjalan_old_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'form_tbdetailrawatjalan_old/form_tbdetailrawatjalan_old_mob_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_tbdetailrawatjalan_old_mob_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_tbdetailrawatjalan_old_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_tbdetailrawatjalan_old_mob_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_tbdetailrawatjalan_old/form_tbdetailrawatjalan_old_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_tbdetailrawatjalan_old_mob_erro.class.php"); 
      }
      $this->Erro      = new form_tbdetailrawatjalan_old_mob_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['opcao']))
         { 
             if ($this->nostruk != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old_mob']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_tbdetailrawatjalan_old_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['HTA'] = "off";
          $this->nmgp_botoes['sc_btn_0'] = "off";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['HTA'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['botoes']['HTA'];
          $this->nmgp_botoes['sc_btn_0'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['botoes']['sc_btn_0'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['dados_form'];
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
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbfisikrawatjalan_mob_script_case_init'] ]['form_tbfisikrawatjalan_mob']['embutida_form'] = false;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbfisikrawatjalan_mob_script_case_init'] ]['form_tbfisikrawatjalan_mob']['embutida_proc'] = true;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbfisikrawatjalan_mob_script_case_init'] ]['form_tbfisikrawatjalan_mob']['reg_start'] = "";
          unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbfisikrawatjalan_mob_script_case_init'] ]['form_tbfisikrawatjalan_mob']['total']);
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbfisikrawatjalan_mob') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbfisikrawatjalan_mob') . "/form_tbfisikrawatjalan_mob_apl.php");
          $this->form_tbfisikrawatjalan_mob = new form_tbfisikrawatjalan_mob_apl;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan_mob']['embutida_form'] = false;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan_mob']['embutida_proc'] = true;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan_mob']['reg_start'] = "";
          unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan_mob']['total']);
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbtindakanrawatjalan_mob') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbtindakanrawatjalan_mob') . "/form_tbtindakanrawatjalan_mob_apl.php");
          $this->form_tbtindakanrawatjalan_mob = new form_tbtindakanrawatjalan_mob_apl;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan_mob']['embutida_form'] = false;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan_mob']['embutida_proc'] = true;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan_mob']['reg_start'] = "";
          unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan_mob']['total']);
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbreseprawatjalan_mob') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbreseprawatjalan_mob') . "/form_tbreseprawatjalan_mob_apl.php");
          $this->form_tbreseprawatjalan_mob = new form_tbreseprawatjalan_mob_apl;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan_mob']['embutida_form'] = false;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan_mob']['embutida_proc'] = true;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan_mob']['reg_start'] = "";
          unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan_mob']['total']);
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbbhprawatjalan_mob') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbbhprawatjalan_mob') . "/form_tbbhprawatjalan_mob_apl.php");
          $this->form_tbbhprawatjalan_mob = new form_tbbhprawatjalan_mob_apl;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['embutida_form'] = false;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['embutida_proc'] = true;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['reg_start'] = "";
          unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['total']);
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbrujukanlab_mob') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbrujukanlab_mob') . "/form_tbrujukanlab_mob_apl.php");
          $this->form_tbrujukanlab_mob = new form_tbrujukanlab_mob_apl;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['embutida_form'] = false;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['embutida_proc'] = true;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['reg_start'] = "";
          unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['total']);
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbrujukanradiologi_mob') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbrujukanradiologi_mob') . "/form_tbrujukanradiologi_mob_apl.php");
          $this->form_tbrujukanradiologi_mob = new form_tbrujukanradiologi_mob_apl;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbhasilrad_mob_script_case_init'] ]['form_tbhasilrad_mob']['embutida_form'] = false;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbhasilrad_mob_script_case_init'] ]['form_tbhasilrad_mob']['embutida_proc'] = true;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbhasilrad_mob_script_case_init'] ]['form_tbhasilrad_mob']['reg_start'] = "";
          unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbhasilrad_mob_script_case_init'] ]['form_tbhasilrad_mob']['total']);
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbhasilrad_mob') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbhasilrad_mob') . "/form_tbhasilrad_mob_apl.php");
          $this->form_tbhasilrad_mob = new form_tbhasilrad_mob_apl;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbicd9cmrawatjalan_mob_script_case_init'] ]['form_tbicd9cmrawatjalan_mob']['embutida_form'] = false;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbicd9cmrawatjalan_mob_script_case_init'] ]['form_tbicd9cmrawatjalan_mob']['embutida_proc'] = true;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbicd9cmrawatjalan_mob_script_case_init'] ]['form_tbicd9cmrawatjalan_mob']['reg_start'] = "";
          unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbicd9cmrawatjalan_mob_script_case_init'] ]['form_tbicd9cmrawatjalan_mob']['total']);
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbicd9cmrawatjalan_mob') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbicd9cmrawatjalan_mob') . "/form_tbicd9cmrawatjalan_mob_apl.php");
          $this->form_tbicd9cmrawatjalan_mob = new form_tbicd9cmrawatjalan_mob_apl;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbsoaprawatjalan_mob_script_case_init'] ]['form_tbsoaprawatjalan_mob']['embutida_form'] = false;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbsoaprawatjalan_mob_script_case_init'] ]['form_tbsoaprawatjalan_mob']['embutida_proc'] = true;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbsoaprawatjalan_mob_script_case_init'] ]['form_tbsoaprawatjalan_mob']['reg_start'] = "";
          unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbsoaprawatjalan_mob_script_case_init'] ]['form_tbsoaprawatjalan_mob']['total']);
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbsoaprawatjalan_mob') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbsoaprawatjalan_mob') . "/form_tbsoaprawatjalan_mob_apl.php");
          $this->form_tbsoaprawatjalan_mob = new form_tbsoaprawatjalan_mob_apl;
      }
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
      $this->sc_insert_on = false;
      if (isset($this->trancode)) { $this->nm_limpa_alfa($this->trancode); }
      if (isset($this->dokter)) { $this->nm_limpa_alfa($this->dokter); }
      if (isset($this->selesai)) { $this->nm_limpa_alfa($this->selesai); }
      if (isset($this->carakeluar)) { $this->nm_limpa_alfa($this->carakeluar); }
      if (isset($this->alasankeluar)) { $this->nm_limpa_alfa($this->alasankeluar); }
      if (isset($this->custcode)) { $this->nm_limpa_alfa($this->custcode); }
      if (isset($this->nostruk)) { $this->nm_limpa_alfa($this->nostruk); }
      if (isset($this->diagnosa1)) { $this->nm_limpa_alfa($this->diagnosa1); }
      if (isset($this->icd1)) { $this->nm_limpa_alfa($this->icd1); }
      if (isset($this->soap)) { $this->nm_limpa_alfa($this->soap); }
      if (isset($this->fisik)) { $this->nm_limpa_alfa($this->fisik); }
      if (isset($this->icd9cm)) { $this->nm_limpa_alfa($this->icd9cm); }
      if (isset($this->pemeriksaan)) { $this->nm_limpa_alfa($this->pemeriksaan); }
      if (isset($this->resep)) { $this->nm_limpa_alfa($this->resep); }
      if (isset($this->tindakan)) { $this->nm_limpa_alfa($this->tindakan); }
      if (isset($this->hasilrad)) { $this->nm_limpa_alfa($this->hasilrad); }
      if (isset($this->bhp)) { $this->nm_limpa_alfa($this->bhp); }
      if (isset($this->sc_field_2)) { $this->nm_limpa_alfa($this->sc_field_2); }
      if (isset($this->sc_field_3)) { $this->nm_limpa_alfa($this->sc_field_3); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- hta
      $this->field_config['hta']                 = array();
      $this->field_config['hta']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['hta']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['hta']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'hta');
      //-- tglkeluar
      $this->field_config['tglkeluar']                 = array();
      $this->field_config['tglkeluar']['date_format']  = "dd/mm/aaaa;hh:ii:ss";
      $this->field_config['tglkeluar']['date_sep']     = "-";
      $this->field_config['tglkeluar']['time_sep']     = ":";
      $this->field_config['tglkeluar']['date_display'] = "dd/mm/aaaa;hh:ii:ss";
      $this->new_date_format('DH', 'tglkeluar');
      //-- resikojatuh
      $this->field_config['resikojatuh']               = array();
      $this->field_config['resikojatuh']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['resikojatuh']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['resikojatuh']['symbol_dec'] = '';
      $this->field_config['resikojatuh']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['resikojatuh']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
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
          if ('validate_sc_field_1' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sc_field_1');
          }
          if ('validate_nostruk' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nostruk');
          }
          if ('validate_custcode' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'custcode');
          }
          if ('validate_sc_field_0' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sc_field_0');
          }
          if ('validate_diagnosa1' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'diagnosa1');
          }
          if ('validate_icd1' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'icd1');
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
          if ('validate_dokter' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dokter');
          }
          if ('validate_selesai' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'selesai');
          }
          if ('validate_tglkeluar' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tglkeluar');
          }
          if ('validate_carakeluar' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'carakeluar');
          }
          if ('validate_rujuk_intern_ke' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'rujuk_intern_ke');
          }
          if ('validate_alasankeluar' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'alasankeluar');
          }
          if ('validate_fisik' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fisik');
          }
          if ('validate_tindakan' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tindakan');
          }
          if ('validate_resep' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'resep');
          }
          if ('validate_bhp' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'bhp');
          }
          if ('validate_sc_field_2' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sc_field_2');
          }
          if ('validate_sc_field_3' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sc_field_3');
          }
          if ('validate_pemeriksaan' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pemeriksaan');
          }
          if ('validate_hasilrad' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'hasilrad');
          }
          if ('validate_icd9cm' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'icd9cm');
          }
          if ('validate_soap' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'soap');
          }
          form_tbdetailrawatjalan_old_mob_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_sc_field_1_onchange' == $this->NM_ajax_opcao)
          {
              $this->sc_field_1_onChange();
          }
          if ('event_carakeluar_onchange' == $this->NM_ajax_opcao)
          {
              $this->caraKeluar_onChange();
          }
          if ('event_nostruk_onchange' == $this->NM_ajax_opcao)
          {
              $this->noStruk_onChange();
          }
          if ('event_selesai_onchange' == $this->NM_ajax_opcao)
          {
              $this->selesai_onChange();
          }
          form_tbdetailrawatjalan_old_mob_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('autocomp_icd1' == $this->NM_ajax_opcao)
          {
              if (isset($_GET['term'])) {
                  $this->icd1 = ($_SESSION['scriptcase']['charset'] != "UTF-8") ? NM_utf8_decode(sc_convert_encoding($_GET['term'], $_SESSION['scriptcase']['charset'], 'UTF-8')) : $_GET['term'];
              } else {
                  $this->icd1 = '';
              }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_icd1']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_icd1'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_icd1']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_icd1'] = array(); 
    }

   $old_value_hta = $this->hta;
   $old_value_tglkeluar = $this->tglkeluar;
   $old_value_tglkeluar_hora = $this->tglkeluar_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_hta = $this->hta;
   $unformatted_value_tglkeluar = $this->tglkeluar;
   $unformatted_value_tglkeluar_hora = $this->tglkeluar_hora;

   $nm_comando = "SELECT icd, concat(icd,' - ', descEng) FROM tbicd WHERE concat(icd,' - ', descEng) LIKE '%" . substr($this->Db->qstr($this->icd1), 1, -1) . "%'";

   $this->hta = $old_value_hta;
   $this->tglkeluar = $old_value_tglkeluar;
   $this->tglkeluar_hora = $old_value_tglkeluar_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 15, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbdetailrawatjalan_old_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbdetailrawatjalan_old_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[0] . "" . $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_icd1'][] = $rs->fields[0];
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
                  if ($AjaxLim > 15)
                  {
                      break;
                  }
                  foreach ($aLkpList as $sLkpIndex => $sLkpValue)
                  {
                      $sLkpIndex = str_replace(array("\r", "\n"), array('', '<br />'), $sLkpIndex);
                      $sLkpValue = str_replace(array("\r", "\n"), array('', '<br />'), $sLkpValue);
                      $aResponse[] = array('text' => $sLkpValue, 'id' => $sLkpIndex);
                  }
              }
              $oJson = new Services_JSON();
              echo $oJson->encode(array('results' => $aResponse));
              exit;
          }
          form_tbdetailrawatjalan_old_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['dados_select']['trancode']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->trancode = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['dados_select']['trancode'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['dados_select']['hta']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->hta = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['dados_select']['hta'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['dados_select']['tp']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->tp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['dados_select']['tp'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['dados_select']['uk']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->uk = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['dados_select']['uk'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['dados_select']['tglkeluar']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->tglkeluar = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['dados_select']['tglkeluar'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['dados_select']['carakeluar']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->carakeluar = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['dados_select']['carakeluar'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['dados_select']['alasankeluar']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->alasankeluar = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['dados_select']['alasankeluar'];
          } 
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_tbdetailrawatjalan_old_mob_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_tbdetailrawatjalan_old_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_tbdetailrawatjalan_old_mob_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_tbdetailrawatjalan_old_mob_pack_ajax_response();
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
          form_tbdetailrawatjalan_old_mob_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_tbdetailrawatjalan_old_mob.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - Pelayanan Rawat Jalan") ?></TITLE>
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
<form name="Fdown" method="get" action="form_tbdetailrawatjalan_old_mob_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_tbdetailrawatjalan_old_mob"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="form_tbdetailrawatjalan_old_mob.php" target="_self" style="display: none"> 
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
           case 'sc_field_1':
               return "Pilih Dokter";
               break;
           case 'nostruk':
               return "No Struk";
               break;
           case 'custcode':
               return "No. RM";
               break;
           case 'sc_field_0':
               return "Nama Pasien";
               break;
           case 'diagnosa1':
               return "Diagnosa";
               break;
           case 'icd1':
               return "Kode ICD";
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
           case 'dokter':
               return "Dokter";
               break;
           case 'selesai':
               return "Selesai";
               break;
           case 'tglkeluar':
               return "Tgl Keluar";
               break;
           case 'carakeluar':
               return "Tindak Lanjut";
               break;
           case 'rujuk_intern_ke':
               return "Rujuk Internal Dgn";
               break;
           case 'alasankeluar':
               return "Alasan Keluar";
               break;
           case 'fisik':
               return "fisik";
               break;
           case 'tindakan':
               return "";
               break;
           case 'resep':
               return "resep";
               break;
           case 'bhp':
               return "BHP";
               break;
           case 'sc_field_2':
               return "";
               break;
           case 'sc_field_3':
               return "";
               break;
           case 'pemeriksaan':
               return "pemeriksaan";
               break;
           case 'hasilrad':
               return "hasilRad";
               break;
           case 'icd9cm':
               return "icd9cm";
               break;
           case 'soap':
               return "SOAP";
               break;
           case 'resikojatuh':
               return "Resiko Jatuh";
               break;
           case 'diagnosa2':
               return "Diagnosa 2";
               break;
           case 'icd2':
               return "Kode ICD 2";
               break;
           case 'diagnosa':
               return "Rujuk Lab";
               break;
           case 'iskonsul':
               return "Konsul ke unit lain ?";
               break;
           case 'penunjang':
               return "Rujuk Rad";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_tbdetailrawatjalan_old_mob']) || !is_array($this->NM_ajax_info['errList']['geral_form_tbdetailrawatjalan_old_mob']))
              {
                  $this->NM_ajax_info['errList']['geral_form_tbdetailrawatjalan_old_mob'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_tbdetailrawatjalan_old_mob'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'trancode' == $filtro)
        $this->ValidateField_trancode($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sc_field_1' == $filtro)
        $this->ValidateField_sc_field_1($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nostruk' == $filtro)
        $this->ValidateField_nostruk($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'custcode' == $filtro)
        $this->ValidateField_custcode($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sc_field_0' == $filtro)
        $this->ValidateField_sc_field_0($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'diagnosa1' == $filtro)
        $this->ValidateField_diagnosa1($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'icd1' == $filtro)
        $this->ValidateField_icd1($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'hta' == $filtro)
        $this->ValidateField_hta($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tp' == $filtro)
        $this->ValidateField_tp($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'uk' == $filtro)
        $this->ValidateField_uk($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'dokter' == $filtro)
        $this->ValidateField_dokter($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'selesai' == $filtro)
        $this->ValidateField_selesai($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tglkeluar' == $filtro)
        $this->ValidateField_tglkeluar($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'carakeluar' == $filtro)
        $this->ValidateField_carakeluar($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'rujuk_intern_ke' == $filtro)
        $this->ValidateField_rujuk_intern_ke($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'alasankeluar' == $filtro)
        $this->ValidateField_alasankeluar($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fisik' == $filtro)
        $this->ValidateField_fisik($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tindakan' == $filtro)
        $this->ValidateField_tindakan($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'resep' == $filtro)
        $this->ValidateField_resep($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'bhp' == $filtro)
        $this->ValidateField_bhp($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sc_field_2' == $filtro)
        $this->ValidateField_sc_field_2($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sc_field_3' == $filtro)
        $this->ValidateField_sc_field_3($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'pemeriksaan' == $filtro)
        $this->ValidateField_pemeriksaan($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'hasilrad' == $filtro)
        $this->ValidateField_hasilrad($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'icd9cm' == $filtro)
        $this->ValidateField_icd9cm($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'soap' == $filtro)
        $this->ValidateField_soap($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_trancode(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->trancode) > 25) 
          { 
              $hasError = true;
              $Campos_Crit .= "Kode Transaksi " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['trancode']))
              {
                  $Campos_Erros['trancode'] = array();
              }
              $Campos_Erros['trancode'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['trancode']) || !is_array($this->NM_ajax_info['errList']['trancode']))
              {
                  $this->NM_ajax_info['errList']['trancode'] = array();
              }
              $this->NM_ajax_info['errList']['trancode'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
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

    function ValidateField_sc_field_1(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->sc_field_1) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_sc_field_1']) && !in_array($this->sc_field_1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_sc_field_1']))
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

    function ValidateField_nostruk(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['php_cmp_required']['nostruk']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['php_cmp_required']['nostruk'] == "on")) 
      { 
          if ($this->nostruk == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "No Struk" ; 
              if (!isset($Campos_Erros['nostruk']))
              {
                  $Campos_Erros['nostruk'] = array();
              }
              $Campos_Erros['nostruk'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['nostruk']) || !is_array($this->NM_ajax_info['errList']['nostruk']))
                  {
                      $this->NM_ajax_info['errList']['nostruk'] = array();
                  }
                  $this->NM_ajax_info['errList']['nostruk'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nostruk) > 10) 
          { 
              $hasError = true;
              $Campos_Crit .= "No Struk " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nostruk']))
              {
                  $Campos_Erros['nostruk'] = array();
              }
              $Campos_Erros['nostruk'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nostruk']) || !is_array($this->NM_ajax_info['errList']['nostruk']))
              {
                  $this->NM_ajax_info['errList']['nostruk'] = array();
              }
              $this->NM_ajax_info['errList']['nostruk'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "01234567890123456789";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->nostruk ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->nostruk, $_SESSION['scriptcase']['charset']); $x++) 
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
              $Campos_Crit .= "No Struk " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['nostruk']))
              {
                  $Campos_Erros['nostruk'] = array();
              }
              $Campos_Erros['nostruk'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['nostruk']) || !is_array($this->NM_ajax_info['errList']['nostruk']))
              {
                  $this->NM_ajax_info['errList']['nostruk'] = array();
              }
              $this->NM_ajax_info['errList']['nostruk'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
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
               if (!empty($this->custcode) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_custcode']) && !in_array($this->custcode, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_custcode']))
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

    function ValidateField_sc_field_0(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->sc_field_0) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_sc_field_0']) && !in_array($this->sc_field_0, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_sc_field_0']))
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

    function ValidateField_diagnosa1(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->diagnosa1 = sc_strtoupper($this->diagnosa1); 
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['php_cmp_required']['diagnosa1']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['php_cmp_required']['diagnosa1'] == "on")) 
      { 
          if ($this->diagnosa1 == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Diagnosa" ; 
              if (!isset($Campos_Erros['diagnosa1']))
              {
                  $Campos_Erros['diagnosa1'] = array();
              }
              $Campos_Erros['diagnosa1'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['diagnosa1']) || !is_array($this->NM_ajax_info['errList']['diagnosa1']))
                  {
                      $this->NM_ajax_info['errList']['diagnosa1'] = array();
                  }
                  $this->NM_ajax_info['errList']['diagnosa1'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->diagnosa1) > 25) 
          { 
              $hasError = true;
              $Campos_Crit .= "Diagnosa " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['diagnosa1']))
              {
                  $Campos_Erros['diagnosa1'] = array();
              }
              $Campos_Erros['diagnosa1'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['diagnosa1']) || !is_array($this->NM_ajax_info['errList']['diagnosa1']))
              {
                  $this->NM_ajax_info['errList']['diagnosa1'] = array();
              }
              $this->NM_ajax_info['errList']['diagnosa1'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'diagnosa1';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_diagnosa1

    function ValidateField_icd1(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->icd1 = sc_strtoupper($this->icd1); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->icd1) > 25) 
          { 
              $hasError = true;
              $Campos_Crit .= "Kode ICD " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['icd1']))
              {
                  $Campos_Erros['icd1'] = array();
              }
              $Campos_Erros['icd1'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['icd1']) || !is_array($this->NM_ajax_info['errList']['icd1']))
              {
                  $this->NM_ajax_info['errList']['icd1'] = array();
              }
              $this->NM_ajax_info['errList']['icd1'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'icd1';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_icd1

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
          if (NM_utf8_strlen($this->uk) > 25) 
          { 
              $hasError = true;
              $Campos_Crit .= "Usia Kehamilan " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['uk']))
              {
                  $Campos_Erros['uk'] = array();
              }
              $Campos_Erros['uk'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['uk']) || !is_array($this->NM_ajax_info['errList']['uk']))
              {
                  $this->NM_ajax_info['errList']['uk'] = array();
              }
              $this->NM_ajax_info['errList']['uk'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
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

    function ValidateField_dokter(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->dokter) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_dokter']) && !in_array($this->dokter, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_dokter']))
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

    function ValidateField_selesai(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->selesai == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'selesai';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_selesai

    function ValidateField_tglkeluar(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->tglkeluar, $this->field_config['tglkeluar']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['tglkeluar']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['tglkeluar']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['tglkeluar']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['tglkeluar']['date_sep']) ; 
          if (trim($this->tglkeluar) != "")  
          { 
              if ($teste_validade->Data($this->tglkeluar, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tgl Keluar; " ; 
                  if (!isset($Campos_Erros['tglkeluar']))
                  {
                      $Campos_Erros['tglkeluar'] = array();
                  }
                  $Campos_Erros['tglkeluar'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['tglkeluar']) || !is_array($this->NM_ajax_info['errList']['tglkeluar']))
                  {
                      $this->NM_ajax_info['errList']['tglkeluar'] = array();
                  }
                  $this->NM_ajax_info['errList']['tglkeluar'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['tglkeluar']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tglkeluar';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->tglkeluar_hora, $this->field_config['tglkeluar_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['tglkeluar_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['tglkeluar_hora']['time_sep']) ; 
          if (trim($this->tglkeluar_hora) != "")  
          { 
              if ($teste_validade->Hora($this->tglkeluar_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tgl Keluar; " ; 
                  if (!isset($Campos_Erros['tglkeluar_hora']))
                  {
                      $Campos_Erros['tglkeluar_hora'] = array();
                  }
                  $Campos_Erros['tglkeluar_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['tglkeluar']) || !is_array($this->NM_ajax_info['errList']['tglkeluar']))
                  {
                      $this->NM_ajax_info['errList']['tglkeluar'] = array();
                  }
                  $this->NM_ajax_info['errList']['tglkeluar'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['tglkeluar']) && isset($Campos_Erros['tglkeluar_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['tglkeluar'], $Campos_Erros['tglkeluar_hora']);
          if (empty($Campos_Erros['tglkeluar_hora']))
          {
              unset($Campos_Erros['tglkeluar_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['tglkeluar']))
          {
              $this->NM_ajax_info['errList']['tglkeluar'] = array_unique($this->NM_ajax_info['errList']['tglkeluar']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tglkeluar_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tglkeluar_hora

    function ValidateField_carakeluar(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->carakeluar == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'carakeluar';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_carakeluar

    function ValidateField_rujuk_intern_ke(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->rujuk_intern_ke) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_rujuk_intern_ke']) && !in_array($this->rujuk_intern_ke, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_rujuk_intern_ke']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['rujuk_intern_ke']))
                   {
                       $Campos_Erros['rujuk_intern_ke'] = array();
                   }
                   $Campos_Erros['rujuk_intern_ke'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['rujuk_intern_ke']) || !is_array($this->NM_ajax_info['errList']['rujuk_intern_ke']))
                   {
                       $this->NM_ajax_info['errList']['rujuk_intern_ke'] = array();
                   }
                   $this->NM_ajax_info['errList']['rujuk_intern_ke'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'rujuk_intern_ke';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_rujuk_intern_ke

    function ValidateField_alasankeluar(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->alasankeluar = sc_strtoupper($this->alasankeluar); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->alasankeluar) > 100) 
          { 
              $hasError = true;
              $Campos_Crit .= "Alasan Keluar " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['alasankeluar']))
              {
                  $Campos_Erros['alasankeluar'] = array();
              }
              $Campos_Erros['alasankeluar'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['alasankeluar']) || !is_array($this->NM_ajax_info['errList']['alasankeluar']))
              {
                  $this->NM_ajax_info['errList']['alasankeluar'] = array();
              }
              $this->NM_ajax_info['errList']['alasankeluar'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'alasankeluar';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_alasankeluar

    function ValidateField_fisik(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->fisik) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fisik';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fisik

    function ValidateField_tindakan(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->tindakan) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tindakan';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tindakan

    function ValidateField_resep(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->resep) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'resep';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_resep

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

    function ValidateField_sc_field_3(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->sc_field_3) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'sc_field_3';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_sc_field_3

    function ValidateField_pemeriksaan(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->pemeriksaan) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'pemeriksaan';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_pemeriksaan

    function ValidateField_hasilrad(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->hasilrad) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'hasilrad';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_hasilrad

    function ValidateField_icd9cm(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->icd9cm) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'icd9cm';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_icd9cm

    function ValidateField_soap(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->soap) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'soap';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_soap

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
    $this->nmgp_dados_form['sc_field_1'] = $this->sc_field_1;
    $this->nmgp_dados_form['nostruk'] = $this->nostruk;
    $this->nmgp_dados_form['custcode'] = $this->custcode;
    $this->nmgp_dados_form['sc_field_0'] = $this->sc_field_0;
    $this->nmgp_dados_form['diagnosa1'] = $this->diagnosa1;
    $this->nmgp_dados_form['icd1'] = $this->icd1;
    $this->nmgp_dados_form['hta'] = $this->hta;
    $this->nmgp_dados_form['tp'] = $this->tp;
    $this->nmgp_dados_form['uk'] = $this->uk;
    $this->nmgp_dados_form['dokter'] = $this->dokter;
    $this->nmgp_dados_form['selesai'] = $this->selesai;
    $this->nmgp_dados_form['tglkeluar'] = (strlen(trim($this->tglkeluar)) > 19) ? str_replace(".", ":", $this->tglkeluar) : trim($this->tglkeluar);
    $this->nmgp_dados_form['carakeluar'] = $this->carakeluar;
    $this->nmgp_dados_form['rujuk_intern_ke'] = $this->rujuk_intern_ke;
    $this->nmgp_dados_form['alasankeluar'] = $this->alasankeluar;
    $this->nmgp_dados_form['fisik'] = $this->fisik;
    $this->nmgp_dados_form['tindakan'] = $this->tindakan;
    $this->nmgp_dados_form['resep'] = $this->resep;
    $this->nmgp_dados_form['bhp'] = $this->bhp;
    $this->nmgp_dados_form['sc_field_2'] = $this->sc_field_2;
    $this->nmgp_dados_form['sc_field_3'] = $this->sc_field_3;
    $this->nmgp_dados_form['pemeriksaan'] = $this->pemeriksaan;
    $this->nmgp_dados_form['hasilrad'] = $this->hasilrad;
    $this->nmgp_dados_form['icd9cm'] = $this->icd9cm;
    $this->nmgp_dados_form['soap'] = $this->soap;
    $this->nmgp_dados_form['resikojatuh'] = $this->resikojatuh;
    $this->nmgp_dados_form['diagnosa2'] = $this->diagnosa2;
    $this->nmgp_dados_form['icd2'] = $this->icd2;
    $this->nmgp_dados_form['diagnosa'] = $this->diagnosa;
    $this->nmgp_dados_form['iskonsul'] = $this->iskonsul;
    $this->nmgp_dados_form['penunjang'] = $this->penunjang;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['hta'] = $this->hta;
      nm_limpa_data($this->hta, $this->field_config['hta']['date_sep']) ; 
      $this->Before_unformat['tglkeluar'] = $this->tglkeluar;
      nm_limpa_data($this->tglkeluar, $this->field_config['tglkeluar']['date_sep']) ; 
      nm_limpa_hora($this->tglkeluar_hora, $this->field_config['tglkeluar']['time_sep']) ; 
      $this->Before_unformat['resikojatuh'] = $this->resikojatuh;
      nm_limpa_numero($this->resikojatuh, $this->field_config['resikojatuh']['symbol_grp']) ; 
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
      if ($Nome_Campo == "resikojatuh")
      {
          nm_limpa_numero($this->resikojatuh, $this->field_config['resikojatuh']['symbol_grp']) ; 
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
      $this->hta = trim($this->hta);
      if ($this->hta == "0000000000")
      {
          $this->hta = "";
      }
      if (!empty($this->hta) || (!empty($format_fields) && isset($format_fields['hta'])))
      {
          nm_conv_form_data($this->hta, "AAAA-MM-DD", $this->field_config['hta']['date_format'], array($this->field_config['hta']['date_sep'])) ;  
      }
      if ((!empty($this->tglkeluar) && 'null' != $this->tglkeluar) || (!empty($format_fields) && isset($format_fields['tglkeluar'])))
      {
          $nm_separa_data = strpos($this->field_config['tglkeluar']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['tglkeluar']['date_format'];
          $this->field_config['tglkeluar']['date_format'] = substr($this->field_config['tglkeluar']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->tglkeluar, " ") ; 
          $this->tglkeluar_hora = substr($this->tglkeluar, $separador + 1) ; 
          $this->tglkeluar = substr($this->tglkeluar, 0, $separador) ; 
          nm_volta_data($this->tglkeluar, $this->field_config['tglkeluar']['date_format']) ; 
          nmgp_Form_Datas($this->tglkeluar, $this->field_config['tglkeluar']['date_format'], $this->field_config['tglkeluar']['date_sep']) ;  
          $this->field_config['tglkeluar']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->tglkeluar_hora, $this->field_config['tglkeluar']['date_format']) ; 
          nmgp_Form_Hora($this->tglkeluar_hora, $this->field_config['tglkeluar']['date_format'], $this->field_config['tglkeluar']['time_sep']) ;  
          $this->field_config['tglkeluar']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->tglkeluar || '' == $this->tglkeluar)
      {
          $this->tglkeluar_hora = '';
          $this->tglkeluar = '';
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
      if ($this->hta != "")  
      {
     nm_conv_form_data($this->hta, $this->field_config['hta']['date_format'], "AAAA-MM-DD", array($this->field_config['hta']['date_sep'])) ;  
      }
      $guarda_format_hora = $this->field_config['tglkeluar']['date_format'];
      if ($this->tglkeluar != "")  
      { 
          $nm_separa_data = strpos($this->field_config['tglkeluar']['date_format'], ";") ;
          $this->field_config['tglkeluar']['date_format'] = substr($this->field_config['tglkeluar']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->tglkeluar, $this->field_config['tglkeluar']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->tglkeluar = str_replace('-', '', $this->tglkeluar);
          }
          $this->field_config['tglkeluar']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->tglkeluar_hora, $this->field_config['tglkeluar']['date_format']) ; 
          if ($this->tglkeluar_hora == "" )  
          { 
              $this->tglkeluar_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->tglkeluar_hora = substr($this->tglkeluar_hora, 0, -4) . "." . substr($this->tglkeluar_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->tglkeluar_hora = substr($this->tglkeluar_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->tglkeluar_hora = substr($this->tglkeluar_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->tglkeluar_hora = substr($this->tglkeluar_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->tglkeluar_hora = substr($this->tglkeluar_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->tglkeluar_hora = substr($this->tglkeluar_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->tglkeluar_hora = substr($this->tglkeluar_hora, 0, -4);
          }
          if ($this->tglkeluar != "")  
          { 
              $this->tglkeluar .= " " . $this->tglkeluar_hora ; 
          }
      } 
      if ($this->tglkeluar == "" && $use_null)  
      { 
          $this->tglkeluar = "null" ; 
      } 
      $this->field_config['tglkeluar']['date_format'] = $guarda_format_hora;
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
          $this->ajax_return_values_sc_field_1();
          $this->ajax_return_values_nostruk();
          $this->ajax_return_values_custcode();
          $this->ajax_return_values_sc_field_0();
          $this->ajax_return_values_diagnosa1();
          $this->ajax_return_values_icd1();
          $this->ajax_return_values_hta();
          $this->ajax_return_values_tp();
          $this->ajax_return_values_uk();
          $this->ajax_return_values_dokter();
          $this->ajax_return_values_selesai();
          $this->ajax_return_values_tglkeluar();
          $this->ajax_return_values_carakeluar();
          $this->ajax_return_values_rujuk_intern_ke();
          $this->ajax_return_values_alasankeluar();
          $this->ajax_return_values_fisik();
          $this->ajax_return_values_tindakan();
          $this->ajax_return_values_resep();
          $this->ajax_return_values_bhp();
          $this->ajax_return_values_sc_field_2();
          $this->ajax_return_values_sc_field_3();
          $this->ajax_return_values_pemeriksaan();
          $this->ajax_return_values_hasilrad();
          $this->ajax_return_values_icd9cm();
          $this->ajax_return_values_soap();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['nostruk']['keyVal'] = form_tbdetailrawatjalan_old_mob_pack_protect_string($this->nmgp_dados_form['nostruk']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbsoaprawatjalan_mob_script_case_init'] ]['form_tbsoaprawatjalan_mob']['foreign_key']['trancode'] = $this->nmgp_dados_form['trancode'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbsoaprawatjalan_mob_script_case_init'] ]['form_tbsoaprawatjalan_mob']['where_filter'] = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbsoaprawatjalan_mob_script_case_init'] ]['form_tbsoaprawatjalan_mob']['where_detal']  = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['total'] < 0)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbsoaprawatjalan_mob_script_case_init'] ]['form_tbsoaprawatjalan_mob']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbsoaprawatjalan_mob_script_case_init'] ]['form_tbsoaprawatjalan_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbsoaprawatjalan_mob_script_case_init'] ]['form_tbsoaprawatjalan_mob']['total']);
              foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbsoaprawatjalan_mob_script_case_init'] ]['form_tbsoaprawatjalan_mob'] as $i => $v)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbsoaprawatjalan_mob_script_case_init'] ]['form_tbsoaprawatjalan'][$i] = $v;
              }
              if (isset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbsoaprawatjalan_mob_script_case_init'] ]['form_tbsoaprawatjalan_mob']['total']))
              {
                  unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbsoaprawatjalan_mob_script_case_init'] ]['form_tbsoaprawatjalan_mob']['total']);
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbdetaillab_mob_script_case_init'] ]['form_tbdetaillab_mob']['foreign_key']['trancode'] = $this->nmgp_dados_form['trancode'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbdetaillab_mob_script_case_init'] ]['form_tbdetaillab_mob']['where_filter'] = "trancode = '" . $this->nmgp_dados_form['trancode'] . "'";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbdetaillab_mob_script_case_init'] ]['form_tbdetaillab_mob']['where_detal']  = "trancode = '" . $this->nmgp_dados_form['trancode'] . "'";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['total'] < 0)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbdetaillab_mob_script_case_init'] ]['form_tbdetaillab_mob']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbdetaillab_mob_script_case_init'] ]['form_tbdetaillab_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbdetaillab_mob_script_case_init'] ]['form_tbdetaillab_mob']['total']);
              foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbdetaillab_mob_script_case_init'] ]['form_tbdetaillab_mob'] as $i => $v)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbdetaillab_mob_script_case_init'] ]['form_tbdetaillab'][$i] = $v;
              }
              if (isset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbdetaillab_mob_script_case_init'] ]['form_tbdetaillab_mob']['total']))
              {
                  unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbdetaillab_mob_script_case_init'] ]['form_tbdetaillab_mob']['total']);
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbfisikrawatjalan_mob_script_case_init'] ]['form_tbfisikrawatjalan_mob']['foreign_key']['trancode'] = $this->nmgp_dados_form['trancode'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbfisikrawatjalan_mob_script_case_init'] ]['form_tbfisikrawatjalan_mob']['where_filter'] = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbfisikrawatjalan_mob_script_case_init'] ]['form_tbfisikrawatjalan_mob']['where_detal']  = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['total'] < 0)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbfisikrawatjalan_mob_script_case_init'] ]['form_tbfisikrawatjalan_mob']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbfisikrawatjalan_mob_script_case_init'] ]['form_tbfisikrawatjalan_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbfisikrawatjalan_mob_script_case_init'] ]['form_tbfisikrawatjalan_mob']['total']);
              foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbfisikrawatjalan_mob_script_case_init'] ]['form_tbfisikrawatjalan_mob'] as $i => $v)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbfisikrawatjalan_mob_script_case_init'] ]['form_tbfisikrawatjalan'][$i] = $v;
              }
              if (isset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbfisikrawatjalan_mob_script_case_init'] ]['form_tbfisikrawatjalan_mob']['total']))
              {
                  unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbfisikrawatjalan_mob_script_case_init'] ]['form_tbfisikrawatjalan_mob']['total']);
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbicd9cmrawatjalan_mob_script_case_init'] ]['form_tbicd9cmrawatjalan_mob']['foreign_key']['trancode'] = $this->nmgp_dados_form['trancode'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbicd9cmrawatjalan_mob_script_case_init'] ]['form_tbicd9cmrawatjalan_mob']['where_filter'] = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbicd9cmrawatjalan_mob_script_case_init'] ]['form_tbicd9cmrawatjalan_mob']['where_detal']  = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['total'] < 0)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbicd9cmrawatjalan_mob_script_case_init'] ]['form_tbicd9cmrawatjalan_mob']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbicd9cmrawatjalan_mob_script_case_init'] ]['form_tbicd9cmrawatjalan_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbicd9cmrawatjalan_mob_script_case_init'] ]['form_tbicd9cmrawatjalan_mob']['total']);
              foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbicd9cmrawatjalan_mob_script_case_init'] ]['form_tbicd9cmrawatjalan_mob'] as $i => $v)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbicd9cmrawatjalan_mob_script_case_init'] ]['form_tbicd9cmrawatjalan'][$i] = $v;
              }
              if (isset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbicd9cmrawatjalan_mob_script_case_init'] ]['form_tbicd9cmrawatjalan_mob']['total']))
              {
                  unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbicd9cmrawatjalan_mob_script_case_init'] ]['form_tbicd9cmrawatjalan_mob']['total']);
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['pemeriksaanLab_rj_script_case_init'] ]['pemeriksaanLab_rj']['embutida_form_full'] = false;
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['pemeriksaanLab_rj_script_case_init'] ]['pemeriksaanLab_rj']['embutida_form']       = true;
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['pemeriksaanLab_rj_script_case_init'] ]['pemeriksaanLab_rj']['embutida_pai']        = "form_tbdetailrawatjalan_old_mob";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['pemeriksaanLab_rj_script_case_init'] ]['pemeriksaanLab_rj']['embutida_form_parms'] = "nostruk*scin" . $this->nmgp_dados_form['nostruk'] . "*scoutNMSC_inicial*scininicio*scoutNMSC_paginacao*scinFULL*scout";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['pemeriksaanLab_rj_script_case_init'] ]['pemeriksaanLab_rj']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['pemeriksaanLab_rj_script_case_init'] ]['pemeriksaanLab_rj']['total']);
              foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['pemeriksaanLab_rj_script_case_init'] ]['pemeriksaanLab_rj'] as $i => $v)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['pemeriksaanLab_rj_script_case_init'] ]['pemeriksaanLab_rj'][$i] = $v;
              }
              if (isset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['pemeriksaanLab_rj_script_case_init'] ]['pemeriksaanLab_rj']['total']))
              {
                  unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['pemeriksaanLab_rj_script_case_init'] ]['pemeriksaanLab_rj']['total']);
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbdetailrad_mob_script_case_init'] ]['form_tbdetailrad_mob']['foreign_key']['trancode'] = $this->nmgp_dados_form['trancode'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbdetailrad_mob_script_case_init'] ]['form_tbdetailrad_mob']['where_filter'] = "trancode = '" . $this->nmgp_dados_form['trancode'] . "'";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbdetailrad_mob_script_case_init'] ]['form_tbdetailrad_mob']['where_detal']  = "trancode = '" . $this->nmgp_dados_form['trancode'] . "'";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['total'] < 0)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbdetailrad_mob_script_case_init'] ]['form_tbdetailrad_mob']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbdetailrad_mob_script_case_init'] ]['form_tbdetailrad_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbdetailrad_mob_script_case_init'] ]['form_tbdetailrad_mob']['total']);
              foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbdetailrad_mob_script_case_init'] ]['form_tbdetailrad_mob'] as $i => $v)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbdetailrad_mob_script_case_init'] ]['form_tbdetailrad'][$i] = $v;
              }
              if (isset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbdetailrad_mob_script_case_init'] ]['form_tbdetailrad_mob']['total']))
              {
                  unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbdetailrad_mob_script_case_init'] ]['form_tbdetailrad_mob']['total']);
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan_mob']['foreign_key']['trancode'] = $this->nmgp_dados_form['trancode'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan_mob']['where_filter'] = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan_mob']['where_detal']  = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['total'] < 0)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan_mob']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan_mob']['total']);
              foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan_mob'] as $i => $v)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan'][$i] = $v;
              }
              if (isset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan_mob']['total']))
              {
                  unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan_mob']['total']);
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan_mob']['foreign_key']['trancode'] = $this->nmgp_dados_form['trancode'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan_mob']['where_filter'] = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan_mob']['where_detal']  = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['total'] < 0)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan_mob']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan_mob']['total']);
              foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan_mob'] as $i => $v)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan'][$i] = $v;
              }
              if (isset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan_mob']['total']))
              {
                  unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan_mob']['total']);
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbhasilrad_mob_script_case_init'] ]['form_tbhasilrad_mob']['foreign_key']['struk'] = $this->nmgp_dados_form['nostruk'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbhasilrad_mob_script_case_init'] ]['form_tbhasilrad_mob']['where_filter'] = "struk = " . $this->nmgp_dados_form['nostruk'] . "";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbhasilrad_mob_script_case_init'] ]['form_tbhasilrad_mob']['where_detal']  = "struk = " . $this->nmgp_dados_form['nostruk'] . "";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['total'] < 0)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbhasilrad_mob_script_case_init'] ]['form_tbhasilrad_mob']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbhasilrad_mob_script_case_init'] ]['form_tbhasilrad_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbhasilrad_mob_script_case_init'] ]['form_tbhasilrad_mob']['total']);
              foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbhasilrad_mob_script_case_init'] ]['form_tbhasilrad_mob'] as $i => $v)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbhasilrad_mob_script_case_init'] ]['form_tbhasilrad'][$i] = $v;
              }
              if (isset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbhasilrad_mob_script_case_init'] ]['form_tbhasilrad_mob']['total']))
              {
                  unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbhasilrad_mob_script_case_init'] ]['form_tbhasilrad_mob']['total']);
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan_mob']['foreign_key']['trancode'] = $this->nmgp_dados_form['trancode'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan_mob']['where_filter'] = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan_mob']['where_detal']  = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['total'] < 0)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan_mob']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan_mob']['total']);
              foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan_mob'] as $i => $v)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan'][$i] = $v;
              }
              if (isset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan_mob']['total']))
              {
                  unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan_mob']['total']);
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['foreign_key']['trancode'] = $this->nmgp_dados_form['trancode'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['foreign_key']['doccode'] = $this->nmgp_dados_form['dokter'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['foreign_key']['struk'] = $this->nmgp_dados_form['nostruk'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['where_filter'] = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "' AND docCode = '" . $this->nmgp_dados_form['dokter'] . "' AND struk = " . $this->nmgp_dados_form['nostruk'] . "";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['where_detal']  = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "' AND docCode = '" . $this->nmgp_dados_form['dokter'] . "' AND struk = " . $this->nmgp_dados_form['nostruk'] . "";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['total'] < 0)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['total']);
              foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob'] as $i => $v)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab'][$i] = $v;
              }
              if (isset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['total']))
              {
                  unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['total']);
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['foreign_key']['trancode'] = $this->nmgp_dados_form['trancode'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['foreign_key']['doccode'] = $this->nmgp_dados_form['dokter'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['foreign_key']['struk'] = $this->nmgp_dados_form['nostruk'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['where_filter'] = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "' AND docCode = '" . $this->nmgp_dados_form['dokter'] . "' AND struk = " . $this->nmgp_dados_form['nostruk'] . "";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['where_detal']  = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "' AND docCode = '" . $this->nmgp_dados_form['dokter'] . "' AND struk = " . $this->nmgp_dados_form['nostruk'] . "";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['total'] < 0)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['total']);
              foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob'] as $i => $v)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi'][$i] = $v;
              }
              if (isset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['total']))
              {
                  unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['total']);
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

          //----- sc_field_1
   function ajax_return_values_sc_field_1($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sc_field_1", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->sc_field_1);
              $aLookup = array();
              $this->_tmp_lookup_sc_field_1 = $this->sc_field_1;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_sc_field_1']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_sc_field_1'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_sc_field_1']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_sc_field_1'] = array(); 
}
$aLookup[] = array(form_tbdetailrawatjalan_old_mob_pack_protect_string('') => form_tbdetailrawatjalan_old_mob_pack_protect_string(' '));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_sc_field_1'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_hta = $this->hta;
   $old_value_tglkeluar = $this->tglkeluar;
   $old_value_tglkeluar_hora = $this->tglkeluar_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_hta = $this->hta;
   $unformatted_value_tglkeluar = $this->tglkeluar;
   $unformatted_value_tglkeluar_hora = $this->tglkeluar_hora;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT docCode, gelar + ' ' + name + ', ' + spec  FROM tbdoctor";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT docCode, concat(gelar,' ', name,', ', spec)  FROM tbdoctor";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT docCode, gelar&' '&name&', '&spec  FROM tbdoctor";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT docCode, gelar||' '||name||', '||spec  FROM tbdoctor";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT docCode, gelar + ' ' + name + ', ' + spec  FROM tbdoctor";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT docCode, gelar||' '||name||', '||spec  FROM tbdoctor";
   }
   else
   {
       $nm_comando = "SELECT docCode, gelar||' '||name||', '||spec  FROM tbdoctor";
   }

   $this->hta = $old_value_hta;
   $this->tglkeluar = $old_value_tglkeluar;
   $this->tglkeluar_hora = $old_value_tglkeluar_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbdetailrawatjalan_old_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbdetailrawatjalan_old_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_sc_field_1'][] = $rs->fields[0];
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
              $this->NM_ajax_info['fldList']['sc_field_1']['valList'][$i] = form_tbdetailrawatjalan_old_mob_pack_protect_string($v);
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

          //----- nostruk
   function ajax_return_values_nostruk($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nostruk", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nostruk);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nostruk'] = array(
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_custcode']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_custcode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_custcode']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_custcode'] = array(); 
}
if ($this->nostruk != "")
{ 
   $this->nm_clear_val("nostruk");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_hta = $this->hta;
   $old_value_tglkeluar = $this->tglkeluar;
   $old_value_tglkeluar_hora = $this->tglkeluar_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_hta = $this->hta;
   $unformatted_value_tglkeluar = $this->tglkeluar;
   $unformatted_value_tglkeluar_hora = $this->tglkeluar_hora;

   $nm_comando = "SELECT custCode FROM tbantrian  WHERE struckNo = '$this->nostruk' ORDER BY custCode";

   $this->hta = $old_value_hta;
   $this->tglkeluar = $old_value_tglkeluar;
   $this->tglkeluar_hora = $old_value_tglkeluar_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbdetailrawatjalan_old_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbdetailrawatjalan_old_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0]))));
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_custcode'][] = $rs->fields[0];
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
} 
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
              $this->NM_ajax_info['fldList']['custcode']['valList'][$i] = form_tbdetailrawatjalan_old_mob_pack_protect_string($v);
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

          //----- sc_field_0
   function ajax_return_values_sc_field_0($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sc_field_0", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->sc_field_0);
              $aLookup = array();
              $this->_tmp_lookup_sc_field_0 = $this->sc_field_0;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_sc_field_0']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_sc_field_0'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_sc_field_0']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_sc_field_0'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_hta = $this->hta;
   $old_value_tglkeluar = $this->tglkeluar;
   $old_value_tglkeluar_hora = $this->tglkeluar_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_hta = $this->hta;
   $unformatted_value_tglkeluar = $this->tglkeluar;
   $unformatted_value_tglkeluar_hora = $this->tglkeluar_hora;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT custCode, name + ',' + salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT custCode, concat(name,',', salut)  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT custCode, name&','&salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT custCode, name||','||salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT custCode, name + ',' + salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT custCode, name||','||salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   else
   {
       $nm_comando = "SELECT custCode, name||','||salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }

   $this->hta = $old_value_hta;
   $this->tglkeluar = $old_value_tglkeluar;
   $this->tglkeluar_hora = $old_value_tglkeluar_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbdetailrawatjalan_old_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbdetailrawatjalan_old_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_sc_field_0'][] = $rs->fields[0];
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
              $this->NM_ajax_info['fldList']['sc_field_0']['valList'][$i] = form_tbdetailrawatjalan_old_mob_pack_protect_string($v);
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

          //----- diagnosa1
   function ajax_return_values_diagnosa1($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("diagnosa1", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->diagnosa1);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['diagnosa1'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- icd1
   function ajax_return_values_icd1($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("icd1", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->icd1);
              $aLookup = array();
              $this->_tmp_lookup_icd1 = $this->icd1;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_icd1']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_icd1'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_icd1']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_icd1'] = array(); 
    }

   $old_value_hta = $this->hta;
   $old_value_tglkeluar = $this->tglkeluar;
   $old_value_tglkeluar_hora = $this->tglkeluar_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_hta = $this->hta;
   $unformatted_value_tglkeluar = $this->tglkeluar;
   $unformatted_value_tglkeluar_hora = $this->tglkeluar_hora;

   $nm_comando = "SELECT icd, concat(icd,' - ', descEng) FROM tbicd WHERE icd = '" . substr($this->Db->qstr($this->icd1), 1, -1) . "'";

   $this->hta = $old_value_hta;
   $this->tglkeluar = $old_value_tglkeluar;
   $this->tglkeluar_hora = $old_value_tglkeluar_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 15, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbdetailrawatjalan_old_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbdetailrawatjalan_old_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[0] . "" . $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_icd1'][] = $rs->fields[0];
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
          $this->NM_ajax_info['fldList']['icd1'] = array(
                       'row'    => '',
               'type'    => 'select2_ac',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['icd1']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['icd1']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['icd1']['labList'] = $aLabel;
          $val_output = isset($aLookup[0][form_tbdetailrawatjalan_old_mob_pack_protect_string(NM_charset_to_utf8($this->icd1))]) ? $aLookup[0][form_tbdetailrawatjalan_old_mob_pack_protect_string(NM_charset_to_utf8($this->icd1))] : "";
          $this->NM_ajax_info['fldList']['icd1_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
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

          //----- dokter
   function ajax_return_values_dokter($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dokter", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->dokter);
              $aLookup = array();
              $this->_tmp_lookup_dokter = $this->dokter;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_dokter']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_dokter'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_dokter']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_dokter'] = array(); 
}
if ($this->nostruk != "")
{ 
   $this->nm_clear_val("nostruk");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_hta = $this->hta;
   $old_value_tglkeluar = $this->tglkeluar;
   $old_value_tglkeluar_hora = $this->tglkeluar_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_hta = $this->hta;
   $unformatted_value_tglkeluar = $this->tglkeluar;
   $unformatted_value_tglkeluar_hora = $this->tglkeluar_hora;

   $nm_comando = "select docCode, concat(gelar, name,',', spec) from tbdoctor where docCode =  (SELECT doctor  FROM tbantrian  WHERE struckNo = '$this->nostruk')";

   $this->hta = $old_value_hta;
   $this->tglkeluar = $old_value_tglkeluar;
   $this->tglkeluar_hora = $old_value_tglkeluar_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbdetailrawatjalan_old_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbdetailrawatjalan_old_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_dokter'][] = $rs->fields[0];
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
} 
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
              $this->NM_ajax_info['fldList']['dokter']['valList'][$i] = form_tbdetailrawatjalan_old_mob_pack_protect_string($v);
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

          //----- selesai
   function ajax_return_values_selesai($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("selesai", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->selesai);
              $aLookup = array();
              $this->_tmp_lookup_selesai = $this->selesai;

$aLookup[] = array(form_tbdetailrawatjalan_old_mob_pack_protect_string('Y') => form_tbdetailrawatjalan_old_mob_pack_protect_string("Sudah"));
$aLookup[] = array(form_tbdetailrawatjalan_old_mob_pack_protect_string('N') => form_tbdetailrawatjalan_old_mob_pack_protect_string("Belum"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_selesai'][] = 'Y';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_selesai'][] = 'N';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"selesai\"";
          if (isset($this->NM_ajax_info['select_html']['selesai']) && !empty($this->NM_ajax_info['select_html']['selesai']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['selesai'];
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

                  if ($this->selesai == $sValue)
                  {
                      $this->_tmp_lookup_selesai = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['selesai'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['selesai']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['selesai']['valList'][$i] = form_tbdetailrawatjalan_old_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['selesai']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['selesai']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['selesai']['labList'] = $aLabel;
          }
   }

          //----- tglkeluar
   function ajax_return_values_tglkeluar($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tglkeluar", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tglkeluar);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tglkeluar'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->tglkeluar . ' ' . $this->tglkeluar_hora),
              );
          }
   }

          //----- carakeluar
   function ajax_return_values_carakeluar($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("carakeluar", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->carakeluar);
              $aLookup = array();
              $this->_tmp_lookup_carakeluar = $this->carakeluar;

$aLookup[] = array(form_tbdetailrawatjalan_old_mob_pack_protect_string('PULANG') => form_tbdetailrawatjalan_old_mob_pack_protect_string("PULANG"));
$aLookup[] = array(form_tbdetailrawatjalan_old_mob_pack_protect_string('RAWAT') => form_tbdetailrawatjalan_old_mob_pack_protect_string("RAWAT"));
$aLookup[] = array(form_tbdetailrawatjalan_old_mob_pack_protect_string('PULANG PAKSA') => form_tbdetailrawatjalan_old_mob_pack_protect_string("PULANG PAKSA"));
$aLookup[] = array(form_tbdetailrawatjalan_old_mob_pack_protect_string('RUJUK') => form_tbdetailrawatjalan_old_mob_pack_protect_string("RUJUK"));
$aLookup[] = array(form_tbdetailrawatjalan_old_mob_pack_protect_string('RUJUK INTERN') => form_tbdetailrawatjalan_old_mob_pack_protect_string("RUJUK INTERNAL"));
$aLookup[] = array(form_tbdetailrawatjalan_old_mob_pack_protect_string('MENINGGAL') => form_tbdetailrawatjalan_old_mob_pack_protect_string("MENINGGAL"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_carakeluar'][] = 'PULANG';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_carakeluar'][] = 'RAWAT';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_carakeluar'][] = 'PULANG PAKSA';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_carakeluar'][] = 'RUJUK';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_carakeluar'][] = 'RUJUK INTERN';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_carakeluar'][] = 'MENINGGAL';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"carakeluar\"";
          if (isset($this->NM_ajax_info['select_html']['carakeluar']) && !empty($this->NM_ajax_info['select_html']['carakeluar']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['carakeluar'];
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

                  if ($this->carakeluar == $sValue)
                  {
                      $this->_tmp_lookup_carakeluar = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['carakeluar'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['carakeluar']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['carakeluar']['valList'][$i] = form_tbdetailrawatjalan_old_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['carakeluar']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['carakeluar']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['carakeluar']['labList'] = $aLabel;
          }
   }

          //----- rujuk_intern_ke
   function ajax_return_values_rujuk_intern_ke($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("rujuk_intern_ke", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->rujuk_intern_ke);
              $aLookup = array();
              $this->_tmp_lookup_rujuk_intern_ke = $this->rujuk_intern_ke;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_rujuk_intern_ke']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_rujuk_intern_ke'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_rujuk_intern_ke']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_rujuk_intern_ke'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_hta = $this->hta;
   $old_value_tglkeluar = $this->tglkeluar;
   $old_value_tglkeluar_hora = $this->tglkeluar_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_hta = $this->hta;
   $unformatted_value_tglkeluar = $this->tglkeluar;
   $unformatted_value_tglkeluar_hora = $this->tglkeluar_hora;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT docCode, gelar + ' ' + name + ', ' + spec  FROM tbdoctor  ORDER BY gelar, name, spec";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT docCode, concat(gelar,' ', name,', ', spec)  FROM tbdoctor  ORDER BY gelar, name, spec";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT docCode, gelar&' '&name&', '&spec  FROM tbdoctor  ORDER BY gelar, name, spec";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT docCode, gelar||' '||name||', '||spec  FROM tbdoctor  ORDER BY gelar, name, spec";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT docCode, gelar + ' ' + name + ', ' + spec  FROM tbdoctor  ORDER BY gelar, name, spec";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT docCode, gelar||' '||name||', '||spec  FROM tbdoctor  ORDER BY gelar, name, spec";
   }
   else
   {
       $nm_comando = "SELECT docCode, gelar||' '||name||', '||spec  FROM tbdoctor  ORDER BY gelar, name, spec";
   }

   $this->hta = $old_value_hta;
   $this->tglkeluar = $old_value_tglkeluar;
   $this->tglkeluar_hora = $old_value_tglkeluar_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbdetailrawatjalan_old_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbdetailrawatjalan_old_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_rujuk_intern_ke'][] = $rs->fields[0];
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
          $sSelComp = "name=\"rujuk_intern_ke\"";
          if (isset($this->NM_ajax_info['select_html']['rujuk_intern_ke']) && !empty($this->NM_ajax_info['select_html']['rujuk_intern_ke']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['rujuk_intern_ke'];
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

                  if ($this->rujuk_intern_ke == $sValue)
                  {
                      $this->_tmp_lookup_rujuk_intern_ke = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['rujuk_intern_ke'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['rujuk_intern_ke']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['rujuk_intern_ke']['valList'][$i] = form_tbdetailrawatjalan_old_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['rujuk_intern_ke']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['rujuk_intern_ke']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['rujuk_intern_ke']['labList'] = $aLabel;
          }
   }

          //----- alasankeluar
   function ajax_return_values_alasankeluar($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("alasankeluar", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->alasankeluar);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['alasankeluar'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fisik
   function ajax_return_values_fisik($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fisik", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fisik);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fisik'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- tindakan
   function ajax_return_values_tindakan($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tindakan", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tindakan);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tindakan'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- resep
   function ajax_return_values_resep($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("resep", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->resep);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['resep'] = array(
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

          //----- sc_field_3
   function ajax_return_values_sc_field_3($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sc_field_3", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->sc_field_3);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['sc_field_3'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- pemeriksaan
   function ajax_return_values_pemeriksaan($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pemeriksaan", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->pemeriksaan);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['pemeriksaan'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- hasilrad
   function ajax_return_values_hasilrad($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("hasilrad", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->hasilrad);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['hasilrad'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- icd9cm
   function ajax_return_values_icd9cm($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("icd9cm", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->icd9cm);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['icd9cm'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- soap
   function ajax_return_values_soap($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("soap", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->soap);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['soap'] = array(
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['upload_dir'][$fieldName][] = $newName;
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
       $this->NM_ajax_info['btnVars']['var_btn_HTA_struckno'] = $this->form_encode_input($this->nmgp_dados_form['nostruk']);
       $this->NM_ajax_info['btnVars']['var_btn_sc_btn_0_var_rmrj'] = $this->form_encode_input($this->nmgp_dados_form['custcode']);
   } // ajax_add_parameters
  function nm_proc_onload($bFormat = true)
  {
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['scriptcase']['form_tbdetailrawatjalan_old_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_hta = $this->hta;
    $original_rujuk_intern_ke = $this->rujuk_intern_ke;
    $original_sc_field_0 = $this->sc_field_0;
    $original_sc_field_1 = $this->sc_field_1;
    $original_selesai = $this->selesai;
}
if (!isset($this->sc_temp_kode_tran)) {$this->sc_temp_kode_tran = (isset($_SESSION['kode_tran'])) ? $_SESSION['kode_tran'] : "";}
  if(!empty($this->trancode )){
    $this->nmgp_cmp_hidden["nostruk"] = "on"; $this->NM_ajax_info['fieldDisplay']['nostruk'] = 'on';
}
else      
{
    $this->nmgp_cmp_hidden["nostruk"] = "off"; $this->NM_ajax_info['fieldDisplay']['nostruk'] = 'off';
}

if($this->selesai  == 'N'){
	$this->nmgp_cmp_hidden["tglkeluar"] = "off"; $this->NM_ajax_info['fieldDisplay']['tglkeluar'] = 'off';
	$this->nmgp_cmp_hidden["carakeluar"] = "off"; $this->NM_ajax_info['fieldDisplay']['carakeluar'] = 'off';
	$this->nmgp_cmp_hidden["alasankeluar"] = "off"; $this->NM_ajax_info['fieldDisplay']['alasankeluar'] = 'off';
	$this->nmgp_cmp_hidden["rujuk_intern_ke"] = "off"; $this->NM_ajax_info['fieldDisplay']['rujuk_intern_ke'] = 'off';
}else{
	$this->nmgp_cmp_hidden["tglkeluar"] = "on"; $this->NM_ajax_info['fieldDisplay']['tglkeluar'] = 'on';
	$this->nmgp_cmp_hidden["carakeluar"] = "on"; $this->NM_ajax_info['fieldDisplay']['carakeluar'] = 'on';
	$this->nmgp_cmp_hidden["alasankeluar"] = "on"; $this->NM_ajax_info['fieldDisplay']['alasankeluar'] = 'on';
	}

$check_sql = "SELECT concat(name,',', salut)"
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
    $this->sc_field_0  = $this->rs[0][0];
}
		else     
{
	$this->sc_field_0  = '';
}

$check_sql = "SELECT hta 
FROM tbantrian
where struckNo = '".$this->nostruk ."'
ORDER BY hta";
 
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
    $this->hta  = $this->rs[0][0];
}
		else     
{
	$this->hta  = '';
}

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

$check_sql = "SELECT b.name"
   . " FROM tbantrian a left join tbpoli b on b.polyCode = a.poly"
   . " WHERE a.struckNo = '" . $this->nostruk  . "'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rsk = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rsk[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rsk = false;
          $this->rsk_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rsk[0][0]))     
{
    $poli = $this->rsk[0][0];

	if($poli == 'KEBIDANAN DAN KANDUNGAN')
	{
		$this->nmgp_cmp_hidden["hta"] = "on"; $this->NM_ajax_info['fieldDisplay']['hta'] = 'on';
		$this->nmgp_cmp_hidden["tp"] = "on"; $this->NM_ajax_info['fieldDisplay']['tp'] = 'on';
		$this->nmgp_cmp_hidden["uk"] = "on"; $this->NM_ajax_info['fieldDisplay']['uk'] = 'on';
		$this->NM_ajax_info['buttonDisplay']['hta'] = $this->nmgp_botoes["hta"] = "on";;
	}else{
		$this->nmgp_cmp_hidden["hta"] = "off"; $this->NM_ajax_info['fieldDisplay']['hta'] = 'off';
		$this->nmgp_cmp_hidden["tp"] = "off"; $this->NM_ajax_info['fieldDisplay']['tp'] = 'off';
		$this->nmgp_cmp_hidden["uk"] = "off"; $this->NM_ajax_info['fieldDisplay']['uk'] = 'off';
		$this->NM_ajax_info['buttonDisplay']['hta'] = $this->nmgp_botoes["hta"] = "off";;
	}
}
		else     
{
	$this->nmgp_cmp_hidden["hta"] = "off"; $this->NM_ajax_info['fieldDisplay']['hta'] = 'off';
	$this->nmgp_cmp_hidden["tp"] = "off"; $this->NM_ajax_info['fieldDisplay']['tp'] = 'off';
	$this->nmgp_cmp_hidden["uk"] = "off"; $this->NM_ajax_info['fieldDisplay']['uk'] = 'off';
	$this->NM_ajax_info['buttonDisplay']['hta'] = $this->nmgp_botoes["hta"] = "off";;
}

$this->sc_temp_kode_tran = $this->trancode ;

if($this->trancode  == ''){
	$this->nmgp_cmp_hidden["sc_field_1"] = "on"; $this->NM_ajax_info['fieldDisplay']['sc_field_1'] = 'on';
	$this->nmgp_cmp_hidden["rujuk_intern_ke"] = "off"; $this->NM_ajax_info['fieldDisplay']['rujuk_intern_ke'] = 'off';
}else{
    $this->nmgp_cmp_hidden["sc_field_1"] = "off"; $this->NM_ajax_info['fieldDisplay']['sc_field_1'] = 'off';
}

if($this->carakeluar  != 'RUJUK INTERN'){
	$this->nmgp_cmp_hidden["rujuk_intern_ke"] = "off"; $this->NM_ajax_info['fieldDisplay']['rujuk_intern_ke'] = 'off';
}
if (isset($this->sc_temp_kode_tran)) { $_SESSION['kode_tran'] = $this->sc_temp_kode_tran;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_hta != $this->hta || (isset($bFlagRead_hta) && $bFlagRead_hta)))
    {
        $this->ajax_return_values_hta(true);
    }
    if (($original_rujuk_intern_ke != $this->rujuk_intern_ke || (isset($bFlagRead_rujuk_intern_ke) && $bFlagRead_rujuk_intern_ke)))
    {
        $this->ajax_return_values_rujuk_intern_ke(true);
    }
    if (($original_sc_field_0 != $this->sc_field_0 || (isset($bFlagRead_sc_field_0) && $bFlagRead_sc_field_0)))
    {
        $this->ajax_return_values_sc_field_0(true);
    }
    if (($original_sc_field_1 != $this->sc_field_1 || (isset($bFlagRead_sc_field_1) && $bFlagRead_sc_field_1)))
    {
        $this->ajax_return_values_sc_field_1(true);
    }
    if (($original_selesai != $this->selesai || (isset($bFlagRead_selesai) && $bFlagRead_selesai)))
    {
        $this->ajax_return_values_selesai(true);
    }
}
$_SESSION['scriptcase']['form_tbdetailrawatjalan_old_mob']['contr_erro'] = 'off'; 
      }
      if (empty($this->tglkeluar))
      {
          $this->tglkeluar_hora = $this->tglkeluar;
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
      $_SESSION['scriptcase']['form_tbdetailrawatjalan_old_mob']['contr_erro'] = 'on';
  $today = date("ym");
$check_sql = "SELECT max(tranCode) FROM tbdetailrawatjalan  WHERE tranCode LIKE 'RJ$today%'";
 
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
	$this->trancode  = 'RJ'.$today.sprintf('%05s', $nextNoUrut);
}
		else     
{
	$this->trancode  = 'RJ'.$today.sprintf('%05s', '1');
}
$_SESSION['scriptcase']['form_tbdetailrawatjalan_old_mob']['contr_erro'] = 'off'; 
    }
    if ("alterar" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_tbdetailrawatjalan_old_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_rujuk_intern_ke = $this->rujuk_intern_ke;
}
  if($this->carakeluar  == 'RUJUK INTERN'){
	$check_sql = "SELECT concat(gelar,' ', name, ', ', spec)"
	   . " FROM tbdoctor"
	   . " WHERE docCode = '" . $this->rujuk_intern_ke  . "'";
	 
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

	$dokter_rujuk = $this->rs[0][0];
	
	$this->alasankeluar  = 'RUJUK INTERNAL KE '.$dokter_rujuk;
}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_rujuk_intern_ke != $this->rujuk_intern_ke || (isset($bFlagRead_rujuk_intern_ke) && $bFlagRead_rujuk_intern_ke)))
    {
        $this->ajax_return_values_rujuk_intern_ke(true);
    }
}
$_SESSION['scriptcase']['form_tbdetailrawatjalan_old_mob']['contr_erro'] = 'off'; 
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
      $NM_val_form['sc_field_1'] = $this->sc_field_1;
      $NM_val_form['nostruk'] = $this->nostruk;
      $NM_val_form['custcode'] = $this->custcode;
      $NM_val_form['sc_field_0'] = $this->sc_field_0;
      $NM_val_form['diagnosa1'] = $this->diagnosa1;
      $NM_val_form['icd1'] = $this->icd1;
      $NM_val_form['hta'] = $this->hta;
      $NM_val_form['tp'] = $this->tp;
      $NM_val_form['uk'] = $this->uk;
      $NM_val_form['dokter'] = $this->dokter;
      $NM_val_form['selesai'] = $this->selesai;
      $NM_val_form['tglkeluar'] = $this->tglkeluar;
      $NM_val_form['carakeluar'] = $this->carakeluar;
      $NM_val_form['rujuk_intern_ke'] = $this->rujuk_intern_ke;
      $NM_val_form['alasankeluar'] = $this->alasankeluar;
      $NM_val_form['fisik'] = $this->fisik;
      $NM_val_form['tindakan'] = $this->tindakan;
      $NM_val_form['resep'] = $this->resep;
      $NM_val_form['bhp'] = $this->bhp;
      $NM_val_form['sc_field_2'] = $this->sc_field_2;
      $NM_val_form['sc_field_3'] = $this->sc_field_3;
      $NM_val_form['pemeriksaan'] = $this->pemeriksaan;
      $NM_val_form['hasilrad'] = $this->hasilrad;
      $NM_val_form['icd9cm'] = $this->icd9cm;
      $NM_val_form['soap'] = $this->soap;
      $NM_val_form['resikojatuh'] = $this->resikojatuh;
      $NM_val_form['diagnosa2'] = $this->diagnosa2;
      $NM_val_form['icd2'] = $this->icd2;
      $NM_val_form['diagnosa'] = $this->diagnosa;
      $NM_val_form['iskonsul'] = $this->iskonsul;
      $NM_val_form['penunjang'] = $this->penunjang;
      if ($this->nostruk === "" || is_null($this->nostruk))  
      { 
          $this->nostruk = 0;
      } 
      if ($this->resikojatuh === "" || is_null($this->resikojatuh))  
      { 
          $this->resikojatuh = 0;
          $this->sc_force_zero[] = 'resikojatuh';
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
          $this->dokter_before_qstr = $this->dokter;
          $this->dokter = substr($this->Db->qstr($this->dokter), 1, -1); 
          if ($this->dokter == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->dokter = "null"; 
              $NM_val_null[] = "dokter";
          } 
          $this->selesai_before_qstr = $this->selesai;
          $this->selesai = substr($this->Db->qstr($this->selesai), 1, -1); 
          if ($this->selesai == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->selesai = "null"; 
              $NM_val_null[] = "selesai";
          } 
          if ($this->tglkeluar == "")  
          { 
              $this->tglkeluar = "null"; 
              $NM_val_null[] = "tglkeluar";
          } 
          $this->carakeluar_before_qstr = $this->carakeluar;
          $this->carakeluar = substr($this->Db->qstr($this->carakeluar), 1, -1); 
          if ($this->carakeluar == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->carakeluar = "null"; 
              $NM_val_null[] = "carakeluar";
          } 
          $this->alasankeluar_before_qstr = $this->alasankeluar;
          $this->alasankeluar = substr($this->Db->qstr($this->alasankeluar), 1, -1); 
          if ($this->alasankeluar == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->alasankeluar = "null"; 
              $NM_val_null[] = "alasankeluar";
          } 
          $this->custcode_before_qstr = $this->custcode;
          $this->custcode = substr($this->Db->qstr($this->custcode), 1, -1); 
          if ($this->custcode == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->custcode = "null"; 
              $NM_val_null[] = "custcode";
          } 
          $this->diagnosa1_before_qstr = $this->diagnosa1;
          $this->diagnosa1 = substr($this->Db->qstr($this->diagnosa1), 1, -1); 
          if ($this->diagnosa1 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->diagnosa1 = "null"; 
              $NM_val_null[] = "diagnosa1";
          } 
          $this->diagnosa2_before_qstr = $this->diagnosa2;
          $this->diagnosa2 = substr($this->Db->qstr($this->diagnosa2), 1, -1); 
          if ($this->diagnosa2 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->diagnosa2 = "null"; 
              $NM_val_null[] = "diagnosa2";
          } 
          $this->icd1_before_qstr = $this->icd1;
          $this->icd1 = substr($this->Db->qstr($this->icd1), 1, -1); 
          if ($this->icd1 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->icd1 = "null"; 
              $NM_val_null[] = "icd1";
          } 
          $this->icd2_before_qstr = $this->icd2;
          $this->icd2 = substr($this->Db->qstr($this->icd2), 1, -1); 
          if ($this->icd2 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->icd2 = "null"; 
              $NM_val_null[] = "icd2";
          } 
          $this->soap_before_qstr = $this->soap;
          $this->soap = substr($this->Db->qstr($this->soap), 1, -1); 
          if ($this->soap == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->soap = "null"; 
              $NM_val_null[] = "soap";
          } 
          $this->diagnosa_before_qstr = $this->diagnosa;
          $this->diagnosa = substr($this->Db->qstr($this->diagnosa), 1, -1); 
          if ($this->diagnosa == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->diagnosa = "null"; 
              $NM_val_null[] = "diagnosa";
          } 
          $this->fisik_before_qstr = $this->fisik;
          $this->fisik = substr($this->Db->qstr($this->fisik), 1, -1); 
          if ($this->fisik == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->fisik = "null"; 
              $NM_val_null[] = "fisik";
          } 
          $this->icd9cm_before_qstr = $this->icd9cm;
          $this->icd9cm = substr($this->Db->qstr($this->icd9cm), 1, -1); 
          if ($this->icd9cm == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->icd9cm = "null"; 
              $NM_val_null[] = "icd9cm";
          } 
          $this->pemeriksaan_before_qstr = $this->pemeriksaan;
          $this->pemeriksaan = substr($this->Db->qstr($this->pemeriksaan), 1, -1); 
          if ($this->pemeriksaan == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->pemeriksaan = "null"; 
              $NM_val_null[] = "pemeriksaan";
          } 
          $this->penunjang_before_qstr = $this->penunjang;
          $this->penunjang = substr($this->Db->qstr($this->penunjang), 1, -1); 
          if ($this->penunjang == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->penunjang = "null"; 
              $NM_val_null[] = "penunjang";
          } 
          $this->resep_before_qstr = $this->resep;
          $this->resep = substr($this->Db->qstr($this->resep), 1, -1); 
          if ($this->resep == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->resep = "null"; 
              $NM_val_null[] = "resep";
          } 
          $this->tindakan_before_qstr = $this->tindakan;
          $this->tindakan = substr($this->Db->qstr($this->tindakan), 1, -1); 
          if ($this->tindakan == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tindakan = "null"; 
              $NM_val_null[] = "tindakan";
          } 
          $this->hasilrad_before_qstr = $this->hasilrad;
          $this->hasilrad = substr($this->Db->qstr($this->hasilrad), 1, -1); 
          if ($this->hasilrad == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->hasilrad = "null"; 
              $NM_val_null[] = "hasilrad";
          } 
          $this->bhp_before_qstr = $this->bhp;
          $this->bhp = substr($this->Db->qstr($this->bhp), 1, -1); 
          if ($this->bhp == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->bhp = "null"; 
              $NM_val_null[] = "bhp";
          } 
          $this->sc_field_2_before_qstr = $this->sc_field_2;
          $this->sc_field_2 = substr($this->Db->qstr($this->sc_field_2), 1, -1); 
          if ($this->sc_field_2 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->sc_field_2 = "null"; 
              $NM_val_null[] = "sc_field_2";
          } 
          $this->sc_field_3_before_qstr = $this->sc_field_3;
          $this->sc_field_3 = substr($this->Db->qstr($this->sc_field_3), 1, -1); 
          if ($this->sc_field_3 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->sc_field_3 = "null"; 
              $NM_val_null[] = "sc_field_3";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['foreign_key'] as $sFKName => $sFKValue)
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
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_tbdetailrawatjalan_old_mob_pack_ajax_response();
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
                  $SC_fields_update[] = "tranCode = '$this->trancode', dokter = '$this->dokter', selesai = '$this->selesai', tglKeluar = #$this->tglkeluar#, caraKeluar = '$this->carakeluar', alasanKeluar = '$this->alasankeluar', custCode = '$this->custcode', diagnosa1 = '$this->diagnosa1', icd1 = '$this->icd1'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "tranCode = '$this->trancode', dokter = '$this->dokter', selesai = '$this->selesai', tglKeluar = " . $this->Ini->date_delim . $this->tglkeluar . $this->Ini->date_delim1 . ", caraKeluar = '$this->carakeluar', alasanKeluar = '$this->alasankeluar', custCode = '$this->custcode', diagnosa1 = '$this->diagnosa1', icd1 = '$this->icd1'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "tranCode = '$this->trancode', dokter = '$this->dokter', selesai = '$this->selesai', tglKeluar = " . $this->Ini->date_delim . $this->tglkeluar . $this->Ini->date_delim1 . ", caraKeluar = '$this->carakeluar', alasanKeluar = '$this->alasankeluar', custCode = '$this->custcode', diagnosa1 = '$this->diagnosa1', icd1 = '$this->icd1'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "tranCode = '$this->trancode', dokter = '$this->dokter', selesai = '$this->selesai', tglKeluar = EXTEND('$this->tglkeluar', YEAR TO FRACTION), caraKeluar = '$this->carakeluar', alasanKeluar = '$this->alasankeluar', custCode = '$this->custcode', diagnosa1 = '$this->diagnosa1', icd1 = '$this->icd1'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "tranCode = '$this->trancode', dokter = '$this->dokter', selesai = '$this->selesai', tglKeluar = " . $this->Ini->date_delim . $this->tglkeluar . $this->Ini->date_delim1 . ", caraKeluar = '$this->carakeluar', alasanKeluar = '$this->alasankeluar', custCode = '$this->custcode', diagnosa1 = '$this->diagnosa1', icd1 = '$this->icd1'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "tranCode = '$this->trancode', dokter = '$this->dokter', selesai = '$this->selesai', tglKeluar = " . $this->Ini->date_delim . $this->tglkeluar . $this->Ini->date_delim1 . ", caraKeluar = '$this->carakeluar', alasanKeluar = '$this->alasankeluar', custCode = '$this->custcode', diagnosa1 = '$this->diagnosa1', icd1 = '$this->icd1'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "tranCode = '$this->trancode', dokter = '$this->dokter', selesai = '$this->selesai', tglKeluar = " . $this->Ini->date_delim . $this->tglkeluar . $this->Ini->date_delim1 . ", caraKeluar = '$this->carakeluar', alasanKeluar = '$this->alasankeluar', custCode = '$this->custcode', diagnosa1 = '$this->diagnosa1', icd1 = '$this->icd1'"; 
              } 
              if (isset($NM_val_form['resikojatuh']) && $NM_val_form['resikojatuh'] != $this->nmgp_dados_select['resikojatuh']) 
              { 
                  $SC_fields_update[] = "resikoJatuh = $this->resikojatuh"; 
              } 
              if (isset($NM_val_form['diagnosa2']) && $NM_val_form['diagnosa2'] != $this->nmgp_dados_select['diagnosa2']) 
              { 
                  $SC_fields_update[] = "diagnosa2 = '$this->diagnosa2'"; 
              } 
              if (isset($NM_val_form['icd2']) && $NM_val_form['icd2'] != $this->nmgp_dados_select['icd2']) 
              { 
                  $SC_fields_update[] = "icd2 = '$this->icd2'"; 
              } 
              $aDoNotUpdate = array();
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE noStruk = $this->nostruk ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE noStruk = $this->nostruk ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE noStruk = $this->nostruk ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE noStruk = $this->nostruk ";  
              }  
              else  
              {
                  $comando .= " WHERE noStruk = $this->nostruk ";  
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
                                  form_tbdetailrawatjalan_old_mob_pack_ajax_response();
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
              $this->dokter = $this->dokter_before_qstr;
              $this->selesai = $this->selesai_before_qstr;
              $this->carakeluar = $this->carakeluar_before_qstr;
              $this->alasankeluar = $this->alasankeluar_before_qstr;
              $this->custcode = $this->custcode_before_qstr;
              $this->diagnosa1 = $this->diagnosa1_before_qstr;
              $this->diagnosa2 = $this->diagnosa2_before_qstr;
              $this->icd1 = $this->icd1_before_qstr;
              $this->icd2 = $this->icd2_before_qstr;
              $this->soap = $this->soap_before_qstr;
              $this->diagnosa = $this->diagnosa_before_qstr;
              $this->fisik = $this->fisik_before_qstr;
              $this->icd9cm = $this->icd9cm_before_qstr;
              $this->pemeriksaan = $this->pemeriksaan_before_qstr;
              $this->penunjang = $this->penunjang_before_qstr;
              $this->resep = $this->resep_before_qstr;
              $this->tindakan = $this->tindakan_before_qstr;
              $this->hasilrad = $this->hasilrad_before_qstr;
              $this->bhp = $this->bhp_before_qstr;
              $this->sc_field_2 = $this->sc_field_2_before_qstr;
              $this->sc_field_3 = $this->sc_field_3_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['db_changed'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['trancode'])) { $this->trancode = $NM_val_form['trancode']; }
              elseif (isset($this->trancode)) { $this->nm_limpa_alfa($this->trancode); }
              if     (isset($NM_val_form) && isset($NM_val_form['dokter'])) { $this->dokter = $NM_val_form['dokter']; }
              elseif (isset($this->dokter)) { $this->nm_limpa_alfa($this->dokter); }
              if     (isset($NM_val_form) && isset($NM_val_form['selesai'])) { $this->selesai = $NM_val_form['selesai']; }
              elseif (isset($this->selesai)) { $this->nm_limpa_alfa($this->selesai); }
              if     (isset($NM_val_form) && isset($NM_val_form['carakeluar'])) { $this->carakeluar = $NM_val_form['carakeluar']; }
              elseif (isset($this->carakeluar)) { $this->nm_limpa_alfa($this->carakeluar); }
              if     (isset($NM_val_form) && isset($NM_val_form['alasankeluar'])) { $this->alasankeluar = $NM_val_form['alasankeluar']; }
              elseif (isset($this->alasankeluar)) { $this->nm_limpa_alfa($this->alasankeluar); }
              if     (isset($NM_val_form) && isset($NM_val_form['custcode'])) { $this->custcode = $NM_val_form['custcode']; }
              elseif (isset($this->custcode)) { $this->nm_limpa_alfa($this->custcode); }
              if     (isset($NM_val_form) && isset($NM_val_form['nostruk'])) { $this->nostruk = $NM_val_form['nostruk']; }
              elseif (isset($this->nostruk)) { $this->nm_limpa_alfa($this->nostruk); }
              if     (isset($NM_val_form) && isset($NM_val_form['diagnosa1'])) { $this->diagnosa1 = $NM_val_form['diagnosa1']; }
              elseif (isset($this->diagnosa1)) { $this->nm_limpa_alfa($this->diagnosa1); }
              if     (isset($NM_val_form) && isset($NM_val_form['icd1'])) { $this->icd1 = $NM_val_form['icd1']; }
              elseif (isset($this->icd1)) { $this->nm_limpa_alfa($this->icd1); }
              if     (isset($NM_val_form) && isset($NM_val_form['soap'])) { $this->soap = $NM_val_form['soap']; }
              elseif (isset($this->soap)) { $this->nm_limpa_alfa($this->soap); }
              if     (isset($NM_val_form) && isset($NM_val_form['fisik'])) { $this->fisik = $NM_val_form['fisik']; }
              elseif (isset($this->fisik)) { $this->nm_limpa_alfa($this->fisik); }
              if     (isset($NM_val_form) && isset($NM_val_form['icd9cm'])) { $this->icd9cm = $NM_val_form['icd9cm']; }
              elseif (isset($this->icd9cm)) { $this->nm_limpa_alfa($this->icd9cm); }
              if     (isset($NM_val_form) && isset($NM_val_form['pemeriksaan'])) { $this->pemeriksaan = $NM_val_form['pemeriksaan']; }
              elseif (isset($this->pemeriksaan)) { $this->nm_limpa_alfa($this->pemeriksaan); }
              if     (isset($NM_val_form) && isset($NM_val_form['resep'])) { $this->resep = $NM_val_form['resep']; }
              elseif (isset($this->resep)) { $this->nm_limpa_alfa($this->resep); }
              if     (isset($NM_val_form) && isset($NM_val_form['tindakan'])) { $this->tindakan = $NM_val_form['tindakan']; }
              elseif (isset($this->tindakan)) { $this->nm_limpa_alfa($this->tindakan); }
              if     (isset($NM_val_form) && isset($NM_val_form['hasilrad'])) { $this->hasilrad = $NM_val_form['hasilrad']; }
              elseif (isset($this->hasilrad)) { $this->nm_limpa_alfa($this->hasilrad); }
              if     (isset($NM_val_form) && isset($NM_val_form['bhp'])) { $this->bhp = $NM_val_form['bhp']; }
              elseif (isset($this->bhp)) { $this->nm_limpa_alfa($this->bhp); }
              if     (isset($NM_val_form) && isset($NM_val_form['sc_field_2'])) { $this->sc_field_2 = $NM_val_form['sc_field_2']; }
              elseif (isset($this->sc_field_2)) { $this->nm_limpa_alfa($this->sc_field_2); }
              if     (isset($NM_val_form) && isset($NM_val_form['sc_field_3'])) { $this->sc_field_3 = $NM_val_form['sc_field_3']; }
              elseif (isset($this->sc_field_3)) { $this->nm_limpa_alfa($this->sc_field_3); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('trancode', 'sc_field_1', 'nostruk', 'custcode', 'sc_field_0', 'diagnosa1', 'icd1', 'hta', 'tp', 'uk', 'dokter', 'selesai', 'tglkeluar', 'carakeluar', 'rujuk_intern_ke', 'alasankeluar', 'fisik', 'tindakan', 'resep', 'bhp', 'sc_field_2', 'sc_field_3', 'pemeriksaan', 'hasilrad', 'icd9cm', 'soap'), $aDoNotUpdate);
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
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          $bInsertOk = true;
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk "); 
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
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_tbdetailrawatjalan_old_mob_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (tranCode, dokter, selesai, tglKeluar, caraKeluar, alasanKeluar, custCode, noStruk, resikoJatuh, diagnosa1, diagnosa2, icd1, icd2) VALUES ('$this->trancode', '$this->dokter', '$this->selesai', #$this->tglkeluar#, '$this->carakeluar', '$this->alasankeluar', '$this->custcode', $this->nostruk, $this->resikojatuh, '$this->diagnosa1', '$this->diagnosa2', '$this->icd1', '$this->icd2')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tranCode, dokter, selesai, tglKeluar, caraKeluar, alasanKeluar, custCode, noStruk, resikoJatuh, diagnosa1, diagnosa2, icd1, icd2) VALUES (" . $NM_seq_auto . "'$this->trancode', '$this->dokter', '$this->selesai', " . $this->Ini->date_delim . $this->tglkeluar . $this->Ini->date_delim1 . ", '$this->carakeluar', '$this->alasankeluar', '$this->custcode', $this->nostruk, $this->resikojatuh, '$this->diagnosa1', '$this->diagnosa2', '$this->icd1', '$this->icd2')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tranCode, dokter, selesai, tglKeluar, caraKeluar, alasanKeluar, custCode, noStruk, resikoJatuh, diagnosa1, diagnosa2, icd1, icd2) VALUES (" . $NM_seq_auto . "'$this->trancode', '$this->dokter', '$this->selesai', " . $this->Ini->date_delim . $this->tglkeluar . $this->Ini->date_delim1 . ", '$this->carakeluar', '$this->alasankeluar', '$this->custcode', $this->nostruk, $this->resikojatuh, '$this->diagnosa1', '$this->diagnosa2', '$this->icd1', '$this->icd2')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tranCode, dokter, selesai, tglKeluar, caraKeluar, alasanKeluar, custCode, noStruk, resikoJatuh, diagnosa1, diagnosa2, icd1, icd2) VALUES (" . $NM_seq_auto . "'$this->trancode', '$this->dokter', '$this->selesai', " . $this->Ini->date_delim . $this->tglkeluar . $this->Ini->date_delim1 . ", '$this->carakeluar', '$this->alasankeluar', '$this->custcode', $this->nostruk, $this->resikojatuh, '$this->diagnosa1', '$this->diagnosa2', '$this->icd1', '$this->icd2')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tranCode, dokter, selesai, tglKeluar, caraKeluar, alasanKeluar, custCode, noStruk, resikoJatuh, diagnosa1, diagnosa2, icd1, icd2) VALUES (" . $NM_seq_auto . "'$this->trancode', '$this->dokter', '$this->selesai', EXTEND('$this->tglkeluar', YEAR TO FRACTION), '$this->carakeluar', '$this->alasankeluar', '$this->custcode', $this->nostruk, $this->resikojatuh, '$this->diagnosa1', '$this->diagnosa2', '$this->icd1', '$this->icd2')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tranCode, dokter, selesai, tglKeluar, caraKeluar, alasanKeluar, custCode, noStruk, resikoJatuh, diagnosa1, diagnosa2, icd1, icd2) VALUES (" . $NM_seq_auto . "'$this->trancode', '$this->dokter', '$this->selesai', " . $this->Ini->date_delim . $this->tglkeluar . $this->Ini->date_delim1 . ", '$this->carakeluar', '$this->alasankeluar', '$this->custcode', $this->nostruk, $this->resikojatuh, '$this->diagnosa1', '$this->diagnosa2', '$this->icd1', '$this->icd2')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tranCode, dokter, selesai, tglKeluar, caraKeluar, alasanKeluar, custCode, noStruk, resikoJatuh, diagnosa1, diagnosa2, icd1, icd2) VALUES (" . $NM_seq_auto . "'$this->trancode', '$this->dokter', '$this->selesai', " . $this->Ini->date_delim . $this->tglkeluar . $this->Ini->date_delim1 . ", '$this->carakeluar', '$this->alasankeluar', '$this->custcode', $this->nostruk, $this->resikojatuh, '$this->diagnosa1', '$this->diagnosa2', '$this->icd1', '$this->icd2')"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tranCode, dokter, selesai, tglKeluar, caraKeluar, alasanKeluar, custCode, noStruk, resikoJatuh, diagnosa1, diagnosa2, icd1, icd2) VALUES (" . $NM_seq_auto . "'$this->trancode', '$this->dokter', '$this->selesai', " . $this->Ini->date_delim . $this->tglkeluar . $this->Ini->date_delim1 . ", '$this->carakeluar', '$this->alasankeluar', '$this->custcode', $this->nostruk, $this->resikojatuh, '$this->diagnosa1', '$this->diagnosa2', '$this->icd1', '$this->icd2')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "tranCode, dokter, selesai, tglKeluar, caraKeluar, alasanKeluar, custCode, noStruk, resikoJatuh, diagnosa1, diagnosa2, icd1, icd2) VALUES (" . $NM_seq_auto . "'$this->trancode', '$this->dokter', '$this->selesai', " . $this->Ini->date_delim . $this->tglkeluar . $this->Ini->date_delim1 . ", '$this->carakeluar', '$this->alasankeluar', '$this->custcode', $this->nostruk, $this->resikojatuh, '$this->diagnosa1', '$this->diagnosa2', '$this->icd1', '$this->icd2')"; 
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
                              form_tbdetailrawatjalan_old_mob_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->trancode = $this->trancode_before_qstr;
              $this->dokter = $this->dokter_before_qstr;
              $this->selesai = $this->selesai_before_qstr;
              $this->carakeluar = $this->carakeluar_before_qstr;
              $this->alasankeluar = $this->alasankeluar_before_qstr;
              $this->custcode = $this->custcode_before_qstr;
              $this->diagnosa1 = $this->diagnosa1_before_qstr;
              $this->diagnosa2 = $this->diagnosa2_before_qstr;
              $this->icd1 = $this->icd1_before_qstr;
              $this->icd2 = $this->icd2_before_qstr;
              $this->soap = $this->soap_before_qstr;
              $this->diagnosa = $this->diagnosa_before_qstr;
              $this->fisik = $this->fisik_before_qstr;
              $this->icd9cm = $this->icd9cm_before_qstr;
              $this->pemeriksaan = $this->pemeriksaan_before_qstr;
              $this->penunjang = $this->penunjang_before_qstr;
              $this->resep = $this->resep_before_qstr;
              $this->tindakan = $this->tindakan_before_qstr;
              $this->hasilrad = $this->hasilrad_before_qstr;
              $this->bhp = $this->bhp_before_qstr;
              $this->sc_field_2 = $this->sc_field_2_before_qstr;
              $this->sc_field_3 = $this->sc_field_3_before_qstr;
              $this->sc_insert_on = true; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao   = "igual"; 
              $this->nmgp_opc_ant = "igual"; 
              $this->nmgp_botoes['HTA'] = "on";
              $this->nmgp_botoes['sc_btn_0'] = "on";
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
          $this->nostruk = substr($this->Db->qstr($this->nostruk), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';
          if ($bDelecaoOk)
          {
              $sDetailWhere = "tranCode = '" . $this->trancode . "'";
              $this->form_tbsoaprawatjalan_mob->ini_controle();
              if ($this->form_tbsoaprawatjalan_mob->temRegistros($sDetailWhere))
              {
                  $bDelecaoOk = false;
                  $sMsgErro   = $this->Ini->Nm_lang['lang_errm_fkvi'];
              }
          }
          if ($bDelecaoOk)
          {
              $sDetailWhere = "tranCode = '" . $this->trancode . "'";
              $this->form_tbfisikrawatjalan_mob->ini_controle();
              if ($this->form_tbfisikrawatjalan_mob->temRegistros($sDetailWhere))
              {
                  $bDelecaoOk = false;
                  $sMsgErro   = $this->Ini->Nm_lang['lang_errm_fkvi'];
              }
          }
          if ($bDelecaoOk)
          {
              $sDetailWhere = "tranCode = '" . $this->trancode . "'";
              $this->form_tbicd9cmrawatjalan_mob->ini_controle();
              if ($this->form_tbicd9cmrawatjalan_mob->temRegistros($sDetailWhere))
              {
                  $bDelecaoOk = false;
                  $sMsgErro   = $this->Ini->Nm_lang['lang_errm_fkvi'];
              }
          }
          if ($bDelecaoOk)
          {
              $sDetailWhere = "tranCode = '" . $this->trancode . "'";
              $this->form_tbreseprawatjalan_mob->ini_controle();
              if ($this->form_tbreseprawatjalan_mob->temRegistros($sDetailWhere))
              {
                  $bDelecaoOk = false;
                  $sMsgErro   = $this->Ini->Nm_lang['lang_errm_fkvi'];
              }
          }
          if ($bDelecaoOk)
          {
              $sDetailWhere = "tranCode = '" . $this->trancode . "'";
              $this->form_tbtindakanrawatjalan_mob->ini_controle();
              if ($this->form_tbtindakanrawatjalan_mob->temRegistros($sDetailWhere))
              {
                  $bDelecaoOk = false;
                  $sMsgErro   = $this->Ini->Nm_lang['lang_errm_fkvi'];
              }
          }
          if ($bDelecaoOk)
          {
              $sDetailWhere = "struk = " . $this->nostruk . "";
              $this->form_tbhasilrad_mob->ini_controle();
              if ($this->form_tbhasilrad_mob->temRegistros($sDetailWhere))
              {
                  $bDelecaoOk = false;
                  $sMsgErro   = $this->Ini->Nm_lang['lang_errm_fkvi'];
              }
          }
          if ($bDelecaoOk)
          {
              $sDetailWhere = "tranCode = '" . $this->trancode . "'";
              $this->form_tbbhprawatjalan_mob->ini_controle();
              if ($this->form_tbbhprawatjalan_mob->temRegistros($sDetailWhere))
              {
                  $bDelecaoOk = false;
                  $sMsgErro   = $this->Ini->Nm_lang['lang_errm_fkvi'];
              }
          }
          if ($bDelecaoOk)
          {
              $sDetailWhere = "tranCode = '" . $this->trancode . "' AND docCode = '" . $this->dokter . "' AND struk = " . $this->nostruk . "";
              $this->form_tbrujukanlab_mob->ini_controle();
              if ($this->form_tbrujukanlab_mob->temRegistros($sDetailWhere))
              {
                  $bDelecaoOk = false;
                  $sMsgErro   = $this->Ini->Nm_lang['lang_errm_fkvi'];
              }
          }
          if ($bDelecaoOk)
          {
              $sDetailWhere = "tranCode = '" . $this->trancode . "' AND docCode = '" . $this->dokter . "' AND struk = " . $this->nostruk . "";
              $this->form_tbrujukanradiologi_mob->ini_controle();
              if ($this->form_tbrujukanradiologi_mob->temRegistros($sDetailWhere))
              {
                  $bDelecaoOk = false;
                  $sMsgErro   = $this->Ini->Nm_lang['lang_errm_fkvi'];
              }
          }

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk "); 
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
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where noStruk = $this->nostruk "); 
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
                          form_tbdetailrawatjalan_old_mob_pack_ajax_response();
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['total']);
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
        $_SESSION['scriptcase']['form_tbdetailrawatjalan_old_mob']['contr_erro'] = 'on';
  $update_table  = 'tbantrian';      
$update_where  = "struckNo = '$this->nostruk'"; 
$update_fields = array(   
     "status = 'Pelayanan'",
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
                form_tbdetailrawatjalan_old_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;

$update_table  = 'tbbilladm';      
$update_where  = "tranCode = '$this->nostruk'"; 
$update_fields = array(   
     "tranCode = '$this->trancode'",
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
                form_tbdetailrawatjalan_old_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;

$update_table  = 'tbpayment';      
$update_where  = "noStruk = '$this->nostruk'"; 
$update_fields = array(   
     "tranCode = '$this->trancode'",
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
                form_tbdetailrawatjalan_old_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
$_SESSION['scriptcase']['form_tbdetailrawatjalan_old_mob']['contr_erro'] = 'off'; 
    }
    if ("update" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        $_SESSION['scriptcase']['form_tbdetailrawatjalan_old_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_rujuk_intern_ke = $this->rujuk_intern_ke;
    $original_selesai = $this->selesai;
}
  if ($this->selesai  == 'Y'){
$update_table  = 'tbantrian';      
$update_where  = "struckNo = '$this->nostruk'"; 
$update_fields = array(   
     "status = 'Selesai'",
	 "handled = '$this->tglkeluar'",
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
                form_tbdetailrawatjalan_old_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	}

if($this->carakeluar  == 'RUJUK INTERN' && $this->rujuk_intern_ke  != ''){
	
	$rm = $this->custcode ;
	$dokterKode = $this->rujuk_intern_ke ;
	$tglSkr = date('Y-m-d');
	$wktSkr = date('H:i');
	
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
		$ns = $today.sprintf('%05s', $nextNoUrut);
	}
			else     
	{
		$ns = $today.sprintf('%05s', '1');
	}
	
	$check_sql = "SELECT inst, jenis, bayar, instCode, instNo, viaPhone"
	   . " FROM tbantrian"
	   . " WHERE struckNo = '" . $this->nostruk  . "'";
	 
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

		$instnya = $this->rs[0][0];
		$jenisnya = $this->rs[0][1];
		$bayarnya = $this->rs[0][2];
		$instCodenya = $this->rs[0][3];
		$instNonya = $this->rs[0][4];
		$vp = $this->rs[0][5];
	
	$check_sql = "SELECT poli"
	   . " FROM tbdoctor"
	   . " WHERE docCode = '" . $dokterKode . "'";
	 
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

	$polinya = $this->rs[0][0];
	
	$check_sql2 = "SELECT max(queue)"
	   . " FROM tbantrian"
	   . " WHERE regDate = '" . $tglSkr . "'  and poly = '" . $polinya . "' and doctor = '" . $dokterKode . "'and viaPhone = '0'";
	 
      $nm_select = $check_sql2; 
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
		$lastqueue = $antrian_non +1;
	}
			else     
	{
		$lastqueue = '1';
	}

$check_sql = "SELECT custCode"
   . " FROM tbantrian"
   . " WHERE custCode = '" . $rm . "' and doctor = '". $dokterKode ."' and status = 'Antre'";
 
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

	if (!isset($this->rs[0][0]))     
	{
		$insert_table  = 'tbantrian';      
		$insert_fields = array(   
			 'custCode' => "'$rm'",
			 'poly' => "'$polinya'",
			 'doctor' => "'$dokterKode'",
			 'queue' => "'$lastqueue'",
			 'regDate' => "'$tglSkr'",
			 'regTime' => "'$wktSkr'",
			 'status' => "'Antre'",
			 'inst' => "'$instnya'",
			 'jenis' => "'$jenisnya'",
			 'bayar' => "'$bayarnya'",
			 'instCode' => "'$instCodenya'",
			 'instNo' => "'$instNonya'",
			 'struckNo' => "'$ns'",
			 'viaPhone' => "'$vp'",
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
                form_tbdetailrawatjalan_old_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;

		$javascript_title   = 'Berhasil';       
		$javascript_message = 'Berhasil di rujuk.';  

		$this->sc_ajax_message($javascript_message, $javascript_title);
	}
		else     
	{

		$javascript_title   = 'Gagal';       
		$javascript_message = 'Gagal, double rujuk';  

		$this->sc_ajax_message($javascript_message, $javascript_title);
			
	}
}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_rujuk_intern_ke != $this->rujuk_intern_ke || (isset($bFlagRead_rujuk_intern_ke) && $bFlagRead_rujuk_intern_ke)))
    {
        $this->ajax_return_values_rujuk_intern_ke(true);
    }
    if (($original_selesai != $this->selesai || (isset($bFlagRead_selesai) && $bFlagRead_selesai)))
    {
        $this->ajax_return_values_selesai(true);
    }
}
$_SESSION['scriptcase']['form_tbdetailrawatjalan_old_mob']['contr_erro'] = 'off'; 
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['parms'] = "nostruk?#?$this->nostruk?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->nostruk = null === $this->nostruk ? null : substr($this->Db->qstr($this->nostruk), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['run_iframe'] == "R")
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['iframe_evento'] == "insert") 
          { 
               $this->nmgp_opcao = "novo"; 
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['select'] = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->nostruk)) 
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
      if ($this->nmgp_opcao != "nada" && (trim($this->nostruk) == "")) 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['run_iframe'] == "F" && $this->sc_evento == "insert")
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
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['total']))
      { 
          $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_tbdetailrawatjalan_old_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['total'] = $qt_geral_reg_form_tbdetailrawatjalan_old_mob;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->nostruk))
          {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $Key_Where = "noStruk < $this->nostruk "; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Key_Where = "noStruk < $this->nostruk "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Key_Where = "noStruk < $this->nostruk "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Key_Where = "noStruk < $this->nostruk "; 
              }
              else  
              {
                  $Key_Where = "noStruk < $this->nostruk "; 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_tbdetailrawatjalan_old_mob = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['reg_start'] > $qt_geral_reg_form_tbdetailrawatjalan_old_mob)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['reg_start'] = $qt_geral_reg_form_tbdetailrawatjalan_old_mob; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['reg_start'] = $qt_geral_reg_form_tbdetailrawatjalan_old_mob; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['total'] + 1; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT tranCode, dokter, selesai, str_replace (convert(char(10),tglKeluar,102), '.', '-') + ' ' + convert(char(8),tglKeluar,20), caraKeluar, alasanKeluar, custCode, noStruk, resikoJatuh, diagnosa1, diagnosa2, icd1, icd2 from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT tranCode, dokter, selesai, convert(char(23),tglKeluar,121), caraKeluar, alasanKeluar, custCode, noStruk, resikoJatuh, diagnosa1, diagnosa2, icd1, icd2 from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT tranCode, dokter, selesai, tglKeluar, caraKeluar, alasanKeluar, custCode, noStruk, resikoJatuh, diagnosa1, diagnosa2, icd1, icd2 from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT tranCode, dokter, selesai, EXTEND(tglKeluar, YEAR TO FRACTION), caraKeluar, alasanKeluar, custCode, noStruk, resikoJatuh, diagnosa1, diagnosa2, icd1, icd2 from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT tranCode, dokter, selesai, tglKeluar, caraKeluar, alasanKeluar, custCode, noStruk, resikoJatuh, diagnosa1, diagnosa2, icd1, icd2 from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "noStruk = $this->nostruk"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $aWhere[] = "noStruk = $this->nostruk"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $aWhere[] = "noStruk = $this->nostruk"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $aWhere[] = "noStruk = $this->nostruk"; 
              }  
              else  
              {
                  $aWhere[] = "noStruk = $this->nostruk"; 
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
          $sc_order_by = "noStruk";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['HTA'] = $this->nmgp_botoes['HTA'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['sc_btn_0'] = $this->nmgp_botoes['sc_btn_0'] = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['empty_filter'] = true;
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
              $this->NM_ajax_info['buttonDisplay']['HTA'] = $this->nmgp_botoes['HTA'] = "off";
              $this->NM_ajax_info['buttonDisplay']['sc_btn_0'] = $this->nmgp_botoes['sc_btn_0'] = "off";
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
              $this->trancode = $rs->fields[0] ; 
              $this->nmgp_dados_select['trancode'] = $this->trancode;
              $this->dokter = $rs->fields[1] ; 
              $this->nmgp_dados_select['dokter'] = $this->dokter;
              $this->selesai = $rs->fields[2] ; 
              $this->nmgp_dados_select['selesai'] = $this->selesai;
              $this->tglkeluar = $rs->fields[3] ; 
              if (substr($this->tglkeluar, 10, 1) == "-") 
              { 
                 $this->tglkeluar = substr($this->tglkeluar, 0, 10) . " " . substr($this->tglkeluar, 11);
              } 
              if (substr($this->tglkeluar, 13, 1) == ".") 
              { 
                 $this->tglkeluar = substr($this->tglkeluar, 0, 13) . ":" . substr($this->tglkeluar, 14, 2) . ":" . substr($this->tglkeluar, 17);
              } 
              $this->nmgp_dados_select['tglkeluar'] = $this->tglkeluar;
              $this->carakeluar = $rs->fields[4] ; 
              $this->nmgp_dados_select['carakeluar'] = $this->carakeluar;
              $this->alasankeluar = $rs->fields[5] ; 
              $this->nmgp_dados_select['alasankeluar'] = $this->alasankeluar;
              $this->custcode = $rs->fields[6] ; 
              $this->nmgp_dados_select['custcode'] = $this->custcode;
              $this->nostruk = $rs->fields[7] ; 
              $this->nmgp_dados_select['nostruk'] = $this->nostruk;
              $this->resikojatuh = $rs->fields[8] ; 
              $this->nmgp_dados_select['resikojatuh'] = $this->resikojatuh;
              $this->diagnosa1 = $rs->fields[9] ; 
              $this->nmgp_dados_select['diagnosa1'] = $this->diagnosa1;
              $this->diagnosa2 = $rs->fields[10] ; 
              $this->nmgp_dados_select['diagnosa2'] = $this->diagnosa2;
              $this->icd1 = $rs->fields[11] ; 
              $this->nmgp_dados_select['icd1'] = $this->icd1;
              $this->icd2 = $rs->fields[12] ; 
              $this->nmgp_dados_select['icd2'] = $this->icd2;
              $this->soap = $rs->fields[13] ; 
              $this->nmgp_dados_select['soap'] = $this->soap;
              $this->diagnosa = $rs->fields[14] ; 
              $this->nmgp_dados_select['diagnosa'] = $this->diagnosa;
              $this->fisik = $rs->fields[15] ; 
              $this->nmgp_dados_select['fisik'] = $this->fisik;
              $this->icd9cm = $rs->fields[16] ; 
              $this->nmgp_dados_select['icd9cm'] = $this->icd9cm;
              $this->pemeriksaan = $rs->fields[17] ; 
              $this->nmgp_dados_select['pemeriksaan'] = $this->pemeriksaan;
              $this->penunjang = $rs->fields[18] ; 
              $this->nmgp_dados_select['penunjang'] = $this->penunjang;
              $this->resep = $rs->fields[19] ; 
              $this->nmgp_dados_select['resep'] = $this->resep;
              $this->tindakan = $rs->fields[20] ; 
              $this->nmgp_dados_select['tindakan'] = $this->tindakan;
              $this->hasilrad = $rs->fields[21] ; 
              $this->nmgp_dados_select['hasilrad'] = $this->hasilrad;
              $this->bhp = $rs->fields[22] ; 
              $this->nmgp_dados_select['bhp'] = $this->bhp;
              $this->sc_field_2 = $rs->fields[23] ; 
              $this->nmgp_dados_select['sc_field_2'] = $this->sc_field_2;
              $this->sc_field_3 = $rs->fields[24] ; 
              $this->nmgp_dados_select['sc_field_3'] = $this->sc_field_3;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nostruk = (string)$this->nostruk; 
              $this->resikojatuh = (string)$this->resikojatuh; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['parms'] = "nostruk?#?$this->nostruk?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['reg_start'] < $qt_geral_reg_form_tbdetailrawatjalan_old_mob;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['opcao']   = '';
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
              $this->trancode = "";  
              $this->nmgp_dados_form["trancode"] = $this->trancode;
              $this->dokter = "";  
              $this->nmgp_dados_form["dokter"] = $this->dokter;
              $this->selesai = "";  
              $this->nmgp_dados_form["selesai"] = $this->selesai;
              $this->tglkeluar = "";  
              $this->tglkeluar_hora = "" ;  
              $this->nmgp_dados_form["tglkeluar"] = $this->tglkeluar;
              $this->carakeluar = "";  
              $this->nmgp_dados_form["carakeluar"] = $this->carakeluar;
              $this->alasankeluar = "";  
              $this->nmgp_dados_form["alasankeluar"] = $this->alasankeluar;
              $this->custcode = "";  
              $this->nmgp_dados_form["custcode"] = $this->custcode;
              $this->nostruk = "";  
              $this->nmgp_dados_form["nostruk"] = $this->nostruk;
              $this->resikojatuh = "";  
              $this->nmgp_dados_form["resikojatuh"] = $this->resikojatuh;
              $this->diagnosa1 = "";  
              $this->nmgp_dados_form["diagnosa1"] = $this->diagnosa1;
              $this->diagnosa2 = "";  
              $this->nmgp_dados_form["diagnosa2"] = $this->diagnosa2;
              $this->icd1 = "";  
              $this->nmgp_dados_form["icd1"] = $this->icd1;
              $this->icd2 = "";  
              $this->nmgp_dados_form["icd2"] = $this->icd2;
              $this->sc_field_0 = "";  
              $this->nmgp_dados_form["sc_field_0"] = $this->sc_field_0;
              $this->soap = "";  
              $this->nmgp_dados_form["soap"] = $this->soap;
              $this->diagnosa = "";  
              $this->nmgp_dados_form["diagnosa"] = $this->diagnosa;
              $this->fisik = "";  
              $this->nmgp_dados_form["fisik"] = $this->fisik;
              $this->icd9cm = "";  
              $this->nmgp_dados_form["icd9cm"] = $this->icd9cm;
              $this->iskonsul = "";  
              $this->nmgp_dados_form["iskonsul"] = $this->iskonsul;
              $this->pemeriksaan = "";  
              $this->nmgp_dados_form["pemeriksaan"] = $this->pemeriksaan;
              $this->penunjang = "";  
              $this->nmgp_dados_form["penunjang"] = $this->penunjang;
              $this->resep = "";  
              $this->nmgp_dados_form["resep"] = $this->resep;
              $this->tindakan = "";  
              $this->nmgp_dados_form["tindakan"] = $this->tindakan;
              $this->hta = "";  
              $this->nmgp_dados_form["hta"] = $this->hta;
              $this->tp = "";  
              $this->nmgp_dados_form["tp"] = $this->tp;
              $this->uk = "";  
              $this->nmgp_dados_form["uk"] = $this->uk;
              $this->sc_field_1 = "";  
              $this->nmgp_dados_form["sc_field_1"] = $this->sc_field_1;
              $this->hasilrad = "";  
              $this->nmgp_dados_form["hasilrad"] = $this->hasilrad;
              $this->rujuk_intern_ke = "";  
              $this->nmgp_dados_form["rujuk_intern_ke"] = $this->rujuk_intern_ke;
              $this->bhp = "";  
              $this->nmgp_dados_form["bhp"] = $this->bhp;
              $this->sc_field_2 = "";  
              $this->nmgp_dados_form["sc_field_2"] = $this->sc_field_2;
              $this->sc_field_3 = "";  
              $this->nmgp_dados_form["sc_field_3"] = $this->sc_field_3;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
              if ($this->nmgp_clone != "S")
              {
              }
              if ($this->nmgp_clone == "S" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['dados_select']))
              {
                  $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['dados_select'];
                  $this->trancode = $this->nmgp_dados_select['trancode'];  
                  $this->dokter = $this->nmgp_dados_select['dokter'];  
                  $this->selesai = $this->nmgp_dados_select['selesai'];  
                  $this->tglkeluar = $this->nmgp_dados_select['tglkeluar'];  
                  $this->carakeluar = $this->nmgp_dados_select['carakeluar'];  
                  $this->alasankeluar = $this->nmgp_dados_select['alasankeluar'];  
                  $this->custcode = $this->nmgp_dados_select['custcode'];  
                  $this->resikojatuh = $this->nmgp_dados_select['resikojatuh'];  
                  $this->diagnosa1 = $this->nmgp_dados_select['diagnosa1'];  
                  $this->diagnosa2 = $this->nmgp_dados_select['diagnosa2'];  
                  $this->icd1 = $this->nmgp_dados_select['icd1'];  
                  $this->icd2 = $this->nmgp_dados_select['icd2'];  
                  $this->soap = $this->nmgp_dados_select['soap'];  
                  $this->diagnosa = $this->nmgp_dados_select['diagnosa'];  
                  $this->fisik = $this->nmgp_dados_select['fisik'];  
                  $this->icd9cm = $this->nmgp_dados_select['icd9cm'];  
                  $this->pemeriksaan = $this->nmgp_dados_select['pemeriksaan'];  
                  $this->penunjang = $this->nmgp_dados_select['penunjang'];  
                  $this->resep = $this->nmgp_dados_select['resep'];  
                  $this->tindakan = $this->nmgp_dados_select['tindakan'];  
                  $this->hasilrad = $this->nmgp_dados_select['hasilrad'];  
                  $this->bhp = $this->nmgp_dados_select['bhp'];  
                  $this->sc_field_2 = $this->nmgp_dados_select['sc_field_2'];  
                  $this->sc_field_3 = $this->nmgp_dados_select['sc_field_3'];  
              }
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['foreign_key'] as $sFKName => $sFKValue)
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
      $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbfisikrawatjalan_mob_script_case_init'] ]['form_tbfisikrawatjalan_mob']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinS*scout";
      $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbtindakanrawatjalan_mob_script_case_init'] ]['form_tbtindakanrawatjalan_mob']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
      $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbreseprawatjalan_mob_script_case_init'] ]['form_tbreseprawatjalan_mob']['embutida_parms'] = "trancode*scin" . $this->nmgp_dados_form['trancode'] . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
      $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbbhprawatjalan_mob_script_case_init'] ]['form_tbbhprawatjalan_mob']['embutida_parms'] = "trancode*scin" . $this->nmgp_dados_form['trancode'] . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
      $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanlab_mob_script_case_init'] ]['form_tbrujukanlab_mob']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinN*scoutNM_btn_navega*scinN*scout";
      $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbrujukanradiologi_mob_script_case_init'] ]['form_tbrujukanradiologi_mob']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinN*scoutNM_btn_navega*scinN*scout";
      $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['pemeriksaanLab_rj_script_case_init'] ]['pemeriksaanLab_rj']['embutida_parms'] = "nostruk*scin" . $this->nmgp_dados_form['nostruk'] . "*scoutNMSC_inicial*scininicio*scoutNMSC_paginacao*scinFULL*scout";
      $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbhasilrad_mob_script_case_init'] ]['form_tbhasilrad_mob']['embutida_parms'] = "NM_btn_insert*scinN*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
      $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbicd9cmrawatjalan_mob_script_case_init'] ]['form_tbicd9cmrawatjalan_mob']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
      $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['form_tbsoaprawatjalan_mob_script_case_init'] ]['form_tbsoaprawatjalan_mob']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
  }
// 
//-- 
   function nm_db_retorna($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(noStruk) from " . $this->Ini->nm_tabela . " where noStruk < $this->nostruk" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(noStruk) from " . $this->Ini->nm_tabela . " where noStruk < $this->nostruk" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(noStruk) from " . $this->Ini->nm_tabela . " where noStruk < $this->nostruk" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(noStruk) from " . $this->Ini->nm_tabela . " where noStruk < $this->nostruk" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(noStruk) from " . $this->Ini->nm_tabela . " where noStruk < $this->nostruk" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(noStruk) from " . $this->Ini->nm_tabela . " where noStruk < $this->nostruk" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(noStruk) from " . $this->Ini->nm_tabela . " where noStruk < $this->nostruk" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(noStruk) from " . $this->Ini->nm_tabela . " where noStruk < $this->nostruk" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(noStruk) from " . $this->Ini->nm_tabela . " where noStruk < $this->nostruk" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(noStruk) from " . $this->Ini->nm_tabela . " where noStruk < $this->nostruk" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->nostruk = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(noStruk) from " . $this->Ini->nm_tabela . " where noStruk > $this->nostruk" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(noStruk) from " . $this->Ini->nm_tabela . " where noStruk > $this->nostruk" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(noStruk) from " . $this->Ini->nm_tabela . " where noStruk > $this->nostruk" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(noStruk) from " . $this->Ini->nm_tabela . " where noStruk > $this->nostruk" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(noStruk) from " . $this->Ini->nm_tabela . " where noStruk > $this->nostruk" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(noStruk) from " . $this->Ini->nm_tabela . " where noStruk > $this->nostruk" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(noStruk) from " . $this->Ini->nm_tabela . " where noStruk > $this->nostruk" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(noStruk) from " . $this->Ini->nm_tabela . " where noStruk > $this->nostruk" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(noStruk) from " . $this->Ini->nm_tabela . " where noStruk > $this->nostruk" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(noStruk) from " . $this->Ini->nm_tabela . " where noStruk > $this->nostruk" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->nostruk = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(noStruk) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(noStruk) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(noStruk) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(noStruk) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(noStruk) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(noStruk) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(noStruk) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(noStruk) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(noStruk) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(noStruk) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['where_filter']))
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
     $this->nostruk = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(noStruk) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(noStruk) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(noStruk) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(noStruk) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(noStruk) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(noStruk) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(noStruk) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(noStruk) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(noStruk) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(noStruk) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
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
     $this->nostruk = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
        function initializeRecordState() {
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function sc_field_1_onChange()
{
$_SESSION['scriptcase']['form_tbdetailrawatjalan_old_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_v_dokter_terpilih)) {$this->sc_temp_v_dokter_terpilih = (isset($_SESSION['v_dokter_terpilih'])) ? $_SESSION['v_dokter_terpilih'] : "";}
  
$original_sc_field_1 = $this->sc_field_1;
$original_nostruk = $this->nostruk;
$original_sc_field_1 = $this->sc_field_1;

$this->sc_temp_v_dokter_terpilih = $this->sc_field_1 ;

if (!empty($this->sc_field_1 ))     
{
    $this->nmgp_cmp_hidden["nostruk"] = "on"; $this->NM_ajax_info['fieldDisplay']['nostruk'] = 'on';
}
else      
{
    $this->nmgp_cmp_hidden["nostruk"] = "off"; $this->NM_ajax_info['fieldDisplay']['nostruk'] = 'off';
}



if (isset($this->sc_temp_v_dokter_terpilih)) { $_SESSION['v_dokter_terpilih'] = $this->sc_temp_v_dokter_terpilih;}
$_SESSION['scriptcase']['form_tbdetailrawatjalan_old_mob']['contr_erro'] = 'off';
$modificado_sc_field_1 = $this->sc_field_1;
$modificado_nostruk = $this->nostruk;
$modificado_sc_field_1 = $this->sc_field_1;
$this->nm_formatar_campos('sc_field_1', 'nostruk');
if ($original_sc_field_1 !== $modificado_sc_field_1 || isset($this->nmgp_cmp_readonly['sc_field_1']) || (isset($bFlagRead_sc_field_1) && $bFlagRead_sc_field_1))
{
    $this->ajax_return_values_sc_field_1(true);
}
if ($original_nostruk !== $modificado_nostruk || isset($this->nmgp_cmp_readonly['nostruk']) || (isset($bFlagRead_nostruk) && $bFlagRead_nostruk))
{
    $this->ajax_return_values_nostruk(true);
}
if ($original_sc_field_1 !== $modificado_sc_field_1 || isset($this->nmgp_cmp_readonly['sc_field_1']) || (isset($bFlagRead_sc_field_1) && $bFlagRead_sc_field_1))
{
    $this->ajax_return_values_sc_field_1(true);
}
$this->NM_ajax_info['event_field'] = 'sc';
form_tbdetailrawatjalan_old_mob_pack_ajax_response();
exit;
}
function caraKeluar_onChange()
{
$_SESSION['scriptcase']['form_tbdetailrawatjalan_old_mob']['contr_erro'] = 'on';
  
$original_carakeluar = $this->carakeluar;
$original_rujuk_intern_ke = $this->rujuk_intern_ke;
$original_rujuk_intern_ke = $this->rujuk_intern_ke;

if($this->carakeluar  == 'RUJUK INTERN'){
	$this->nmgp_cmp_hidden["rujuk_intern_ke"] = "on"; $this->NM_ajax_info['fieldDisplay']['rujuk_intern_ke'] = 'on';
}else{
	$this->nmgp_cmp_hidden["rujuk_intern_ke"] = "off"; $this->NM_ajax_info['fieldDisplay']['rujuk_intern_ke'] = 'off';
}

$modificado_carakeluar = $this->carakeluar;
$modificado_rujuk_intern_ke = $this->rujuk_intern_ke;
$modificado_rujuk_intern_ke = $this->rujuk_intern_ke;
$this->nm_formatar_campos('carakeluar', 'rujuk_intern_ke');
if ($original_carakeluar !== $modificado_carakeluar || isset($this->nmgp_cmp_readonly['carakeluar']) || (isset($bFlagRead_carakeluar) && $bFlagRead_carakeluar))
{
    $this->ajax_return_values_carakeluar(true);
}
if ($original_rujuk_intern_ke !== $modificado_rujuk_intern_ke || isset($this->nmgp_cmp_readonly['rujuk_intern_ke']) || (isset($bFlagRead_rujuk_intern_ke) && $bFlagRead_rujuk_intern_ke))
{
    $this->ajax_return_values_rujuk_intern_ke(true);
}
if ($original_rujuk_intern_ke !== $modificado_rujuk_intern_ke || isset($this->nmgp_cmp_readonly['rujuk_intern_ke']) || (isset($bFlagRead_rujuk_intern_ke) && $bFlagRead_rujuk_intern_ke))
{
    $this->ajax_return_values_rujuk_intern_ke(true);
}
$this->NM_ajax_info['event_field'] = 'caraKeluar';
form_tbdetailrawatjalan_old_mob_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_tbdetailrawatjalan_old_mob']['contr_erro'] = 'off';
}
function noStruk_onChange()
{
$_SESSION['scriptcase']['form_tbdetailrawatjalan_old_mob']['contr_erro'] = 'on';
  
$original_custcode = $this->custcode;
$original_sc_field_0 = $this->sc_field_0;
$original_trancode = $this->trancode;

$check_sql = "SELECT concat(name,',', salut)"
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
    $this->sc_field_0  = $this->rs[0][0];
}
		else     
{
	$this->sc_field_0  = '';
}


$modificado_custcode = $this->custcode;
$modificado_sc_field_0 = $this->sc_field_0;
$modificado_trancode = $this->trancode;
$this->nm_formatar_campos('custcode', 'sc_field_0');
if ($original_custcode !== $modificado_custcode || isset($this->nmgp_cmp_readonly['custcode']) || (isset($bFlagRead_custcode) && $bFlagRead_custcode))
{
    $this->ajax_return_values_custcode(true);
}
if ($original_sc_field_0 !== $modificado_sc_field_0 || isset($this->nmgp_cmp_readonly['sc_field_0']) || (isset($bFlagRead_sc_field_0) && $bFlagRead_sc_field_0))
{
    $this->ajax_return_values_sc_field_0(true);
}
if ($original_trancode !== $modificado_trancode || isset($this->nmgp_cmp_readonly['trancode']) || (isset($bFlagRead_trancode) && $bFlagRead_trancode))
{
    $this->ajax_return_values_trancode(true);
}
$this->NM_ajax_info['event_field'] = 'noStruk';
form_tbdetailrawatjalan_old_mob_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_tbdetailrawatjalan_old_mob']['contr_erro'] = 'off';
}
function selesai_onChange()
{
$_SESSION['scriptcase']['form_tbdetailrawatjalan_old_mob']['contr_erro'] = 'on';
  
$original_selesai = $this->selesai;
$original_tglkeluar = $this->tglkeluar;
$original_carakeluar = $this->carakeluar;
$original_alasankeluar = $this->alasankeluar;
$original_trancode = $this->trancode;

if($this->selesai  == 'N'){
	$this->nmgp_cmp_hidden["tglkeluar"] = "off"; $this->NM_ajax_info['fieldDisplay']['tglkeluar'] = 'off';
	$this->tglkeluar  = '';
   	$this->nmgp_cmp_hidden["carakeluar"] = "off"; $this->NM_ajax_info['fieldDisplay']['carakeluar'] = 'off';
	$this->nmgp_cmp_hidden["alasankeluar"] = "off"; $this->NM_ajax_info['fieldDisplay']['alasankeluar'] = 'off';
	$this->alasankeluar  = '';
}else{
	$this->nmgp_cmp_hidden["tglkeluar"] = "on"; $this->NM_ajax_info['fieldDisplay']['tglkeluar'] = 'on';
	$this->tglkeluar  = date('Y-m-d H:i:s');
   	$this->nmgp_cmp_hidden["carakeluar"] = "on"; $this->NM_ajax_info['fieldDisplay']['carakeluar'] = 'on';
	$this->nmgp_cmp_hidden["alasankeluar"] = "on"; $this->NM_ajax_info['fieldDisplay']['alasankeluar'] = 'on';
	$this->alasankeluar  = 'Atas Izin Dokter';
}

$modificado_selesai = $this->selesai;
$modificado_tglkeluar = $this->tglkeluar;
$modificado_carakeluar = $this->carakeluar;
$modificado_alasankeluar = $this->alasankeluar;
$modificado_trancode = $this->trancode;
$this->nm_formatar_campos('selesai', 'tglkeluar', 'carakeluar', 'alasankeluar');
if ($original_selesai !== $modificado_selesai || isset($this->nmgp_cmp_readonly['selesai']) || (isset($bFlagRead_selesai) && $bFlagRead_selesai))
{
    $this->ajax_return_values_selesai(true);
}
if ($original_tglkeluar !== $modificado_tglkeluar || isset($this->nmgp_cmp_readonly['tglkeluar']) || (isset($bFlagRead_tglkeluar) && $bFlagRead_tglkeluar))
{
    $this->ajax_return_values_tglkeluar(true);
}
if ($original_carakeluar !== $modificado_carakeluar || isset($this->nmgp_cmp_readonly['carakeluar']) || (isset($bFlagRead_carakeluar) && $bFlagRead_carakeluar))
{
    $this->ajax_return_values_carakeluar(true);
}
if ($original_alasankeluar !== $modificado_alasankeluar || isset($this->nmgp_cmp_readonly['alasankeluar']) || (isset($bFlagRead_alasankeluar) && $bFlagRead_alasankeluar))
{
    $this->ajax_return_values_alasankeluar(true);
}
if ($original_trancode !== $modificado_trancode || isset($this->nmgp_cmp_readonly['trancode']) || (isset($bFlagRead_trancode) && $bFlagRead_trancode))
{
    $this->ajax_return_values_trancode(true);
}
$this->NM_ajax_info['event_field'] = 'selesai';
form_tbdetailrawatjalan_old_mob_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_tbdetailrawatjalan_old_mob']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_tbdetailrawatjalan_old_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("form_tbdetailrawatjalan_old_mob_form0.php");
        $this->hideFormPages();
 }

        function initFormPages() {
        } // initFormPages

        function hideFormPages() {
        } // hideFormPages

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['csrf_token'];
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

   function Form_lookup_sc_field_1()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_sc_field_1']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_sc_field_1'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_sc_field_1']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_sc_field_1'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_sc_field_1']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_sc_field_1'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_sc_field_1']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_sc_field_1'] = array(); 
    }

   $old_value_hta = $this->hta;
   $old_value_tglkeluar = $this->tglkeluar;
   $old_value_tglkeluar_hora = $this->tglkeluar_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_hta = $this->hta;
   $unformatted_value_tglkeluar = $this->tglkeluar;
   $unformatted_value_tglkeluar_hora = $this->tglkeluar_hora;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT docCode, gelar + ' ' + name + ', ' + spec  FROM tbdoctor";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT docCode, concat(gelar,' ', name,', ', spec)  FROM tbdoctor";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT docCode, gelar&' '&name&', '&spec  FROM tbdoctor";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT docCode, gelar||' '||name||', '||spec  FROM tbdoctor";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT docCode, gelar + ' ' + name + ', ' + spec  FROM tbdoctor";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT docCode, gelar||' '||name||', '||spec  FROM tbdoctor";
   }
   else
   {
       $nm_comando = "SELECT docCode, gelar||' '||name||', '||spec  FROM tbdoctor";
   }

   $this->hta = $old_value_hta;
   $this->tglkeluar = $old_value_tglkeluar;
   $this->tglkeluar_hora = $old_value_tglkeluar_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_sc_field_1'][] = $rs->fields[0];
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_custcode']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_custcode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_custcode']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_custcode'] = array(); 
}
if ($this->nostruk != "")
{ 
   $this->nm_clear_val("nostruk");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_custcode']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_custcode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_custcode']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_custcode'] = array(); 
    }

   $old_value_hta = $this->hta;
   $old_value_tglkeluar = $this->tglkeluar;
   $old_value_tglkeluar_hora = $this->tglkeluar_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_hta = $this->hta;
   $unformatted_value_tglkeluar = $this->tglkeluar;
   $unformatted_value_tglkeluar_hora = $this->tglkeluar_hora;

   $nm_comando = "SELECT custCode FROM tbantrian  WHERE struckNo = '$this->nostruk' ORDER BY custCode";

   $this->hta = $old_value_hta;
   $this->tglkeluar = $old_value_tglkeluar;
   $this->tglkeluar_hora = $old_value_tglkeluar_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_custcode'][] = $rs->fields[0];
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
} 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_sc_field_0()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_sc_field_0']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_sc_field_0'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_sc_field_0']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_sc_field_0'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_sc_field_0']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_sc_field_0'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_sc_field_0']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_sc_field_0'] = array(); 
    }

   $old_value_hta = $this->hta;
   $old_value_tglkeluar = $this->tglkeluar;
   $old_value_tglkeluar_hora = $this->tglkeluar_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_hta = $this->hta;
   $unformatted_value_tglkeluar = $this->tglkeluar;
   $unformatted_value_tglkeluar_hora = $this->tglkeluar_hora;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT custCode, name + ',' + salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT custCode, concat(name,',', salut)  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT custCode, name&','&salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT custCode, name||','||salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT custCode, name + ',' + salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT custCode, name||','||salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }
   else
   {
       $nm_comando = "SELECT custCode, name||','||salut  FROM tbcustomer where custCode = '$this->custcode' ORDER BY name, salut";
   }

   $this->hta = $old_value_hta;
   $this->tglkeluar = $old_value_tglkeluar;
   $this->tglkeluar_hora = $old_value_tglkeluar_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_sc_field_0'][] = $rs->fields[0];
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_dokter']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_dokter'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_dokter']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_dokter'] = array(); 
}
if ($this->nostruk != "")
{ 
   $this->nm_clear_val("nostruk");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_dokter']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_dokter'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_dokter']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_dokter'] = array(); 
    }

   $old_value_hta = $this->hta;
   $old_value_tglkeluar = $this->tglkeluar;
   $old_value_tglkeluar_hora = $this->tglkeluar_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_hta = $this->hta;
   $unformatted_value_tglkeluar = $this->tglkeluar;
   $unformatted_value_tglkeluar_hora = $this->tglkeluar_hora;

   $nm_comando = "select docCode, concat(gelar, name,',', spec) from tbdoctor where docCode =  (SELECT doctor  FROM tbantrian  WHERE struckNo = '$this->nostruk')";

   $this->hta = $old_value_hta;
   $this->tglkeluar = $old_value_tglkeluar;
   $this->tglkeluar_hora = $old_value_tglkeluar_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_dokter'][] = $rs->fields[0];
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
} 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_selesai()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Sudah?#?Y?#?N?@?";
       $nmgp_def_dados .= "Belum?#?N?#?S?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_carakeluar()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "PULANG?#?PULANG?#?N?@?";
       $nmgp_def_dados .= "RAWAT?#?RAWAT?#?N?@?";
       $nmgp_def_dados .= "PULANG PAKSA?#?PULANG PAKSA?#?N?@?";
       $nmgp_def_dados .= "RUJUK?#?RUJUK?#?N?@?";
       $nmgp_def_dados .= "RUJUK INTERNAL?#?RUJUK INTERN?#?N?@?";
       $nmgp_def_dados .= "MENINGGAL?#?MENINGGAL?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_rujuk_intern_ke()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_rujuk_intern_ke']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_rujuk_intern_ke'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_rujuk_intern_ke']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_rujuk_intern_ke'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_rujuk_intern_ke']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_rujuk_intern_ke'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_rujuk_intern_ke']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_rujuk_intern_ke'] = array(); 
    }

   $old_value_hta = $this->hta;
   $old_value_tglkeluar = $this->tglkeluar;
   $old_value_tglkeluar_hora = $this->tglkeluar_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_hta = $this->hta;
   $unformatted_value_tglkeluar = $this->tglkeluar;
   $unformatted_value_tglkeluar_hora = $this->tglkeluar_hora;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT docCode, gelar + ' ' + name + ', ' + spec  FROM tbdoctor  ORDER BY gelar, name, spec";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT docCode, concat(gelar,' ', name,', ', spec)  FROM tbdoctor  ORDER BY gelar, name, spec";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT docCode, gelar&' '&name&', '&spec  FROM tbdoctor  ORDER BY gelar, name, spec";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT docCode, gelar||' '||name||', '||spec  FROM tbdoctor  ORDER BY gelar, name, spec";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT docCode, gelar + ' ' + name + ', ' + spec  FROM tbdoctor  ORDER BY gelar, name, spec";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT docCode, gelar||' '||name||', '||spec  FROM tbdoctor  ORDER BY gelar, name, spec";
   }
   else
   {
       $nm_comando = "SELECT docCode, gelar||' '||name||', '||spec  FROM tbdoctor  ORDER BY gelar, name, spec";
   }

   $this->hta = $old_value_hta;
   $this->tglkeluar = $old_value_tglkeluar;
   $this->tglkeluar_hora = $old_value_tglkeluar_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['Lookup_rujuk_intern_ke'][] = $rs->fields[0];
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
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_tbdetailrawatjalan_old_mob_pack_ajax_response();
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
          $this->SC_monta_condicao($comando, "tranCode", $arg_search, $data_search);
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
          $data_lookup = $this->SC_lookup_selesai($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "selesai", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_carakeluar($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "caraKeluar", $arg_search, $data_lookup);
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_tbdetailrawatjalan_old_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['total'] = $qt_geral_reg_form_tbdetailrawatjalan_old_mob;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_tbdetailrawatjalan_old_mob_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_tbdetailrawatjalan_old_mob_pack_ajax_response();
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
      $nm_numeric[] = "nostruk";$nm_numeric[] = "resikojatuh";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['decimal_db'] == ".")
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
      $Nm_datas['tglkeluar'] = "datetime";$Nm_datas[''] = "date";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['SC_sep_date1'];
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
   function SC_lookup_dokter($condicao, $campo)
   {
       return $campo;
   }
   function SC_lookup_selesai($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['Y'] = "Sudah";
       $data_look['N'] = "Belum";
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
   function SC_lookup_carakeluar($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['PULANG'] = "PULANG";
       $data_look['RAWAT'] = "RAWAT";
       $data_look['PULANG PAKSA'] = "PULANG PAKSA";
       $data_look['RUJUK'] = "RUJUK";
       $data_look['RUJUK INTERN'] = "RUJUK INTERNAL";
       $data_look['MENINGGAL'] = "MENINGGAL";
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
       $nmgp_saida_form = "form_tbdetailrawatjalan_old_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_tbdetailrawatjalan_old_mob_fim.php";
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
       form_tbdetailrawatjalan_old_mob_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbdetailrawatjalan_old_mob']['masterValue']);
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
