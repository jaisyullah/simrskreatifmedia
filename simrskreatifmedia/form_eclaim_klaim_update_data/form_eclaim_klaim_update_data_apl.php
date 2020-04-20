<?php
//
class form_eclaim_klaim_update_data_apl
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
   var $nomor_sep;
   var $nomor_kartu;
   var $tgl_masuk;
   var $tgl_masuk_hora;
   var $tgl_pulang;
   var $tgl_pulang_hora;
   var $jenis_rawat;
   var $kelas_rawat;
   var $adl_sub_acute;
   var $adl_chronic;
   var $icu_indikator;
   var $icu_los;
   var $ventilator_hour;
   var $upgrade_class_ind;
   var $upgrade_class_class;
   var $upgrade_class_los;
   var $add_payment_pct;
   var $birth_weight;
   var $discharge_status;
   var $diagnosa;
   var $procedure;
   var $tarif_rs_prosedur_non_bedah;
   var $tarif_rs_prosedur_bedah;
   var $tarif_rs_konsultasi;
   var $tarif_rs_tenaga_ahli;
   var $tarif_rs_keperawatan;
   var $tarif_rs_penunjang;
   var $tarif_rs_radiologi;
   var $tarif_rs_laboratorium;
   var $tarif_rs_pelayanan_darah;
   var $tarif_rs_rehabilitasi;
   var $tarif_rs_kamar;
   var $tarif_rs_rawat_intensif;
   var $tarif_rs_obat;
   var $tarif_rs_alkes;
   var $tarif_rs_bmhp;
   var $tarif_rs_sewa_alat;
   var $tarif_poli_eks;
   var $nama_dokter;
   var $kode_tarif;
   var $payor_id;
   var $payor_cd;
   var $cob_cd;
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
          if (isset($this->NM_ajax_info['param']['add_payment_pct']))
          {
              $this->add_payment_pct = $this->NM_ajax_info['param']['add_payment_pct'];
          }
          if (isset($this->NM_ajax_info['param']['adl_chronic']))
          {
              $this->adl_chronic = $this->NM_ajax_info['param']['adl_chronic'];
          }
          if (isset($this->NM_ajax_info['param']['adl_sub_acute']))
          {
              $this->adl_sub_acute = $this->NM_ajax_info['param']['adl_sub_acute'];
          }
          if (isset($this->NM_ajax_info['param']['birth_weight']))
          {
              $this->birth_weight = $this->NM_ajax_info['param']['birth_weight'];
          }
          if (isset($this->NM_ajax_info['param']['cob_cd']))
          {
              $this->cob_cd = $this->NM_ajax_info['param']['cob_cd'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['diagnosa']))
          {
              $this->diagnosa = $this->NM_ajax_info['param']['diagnosa'];
          }
          if (isset($this->NM_ajax_info['param']['discharge_status']))
          {
              $this->discharge_status = $this->NM_ajax_info['param']['discharge_status'];
          }
          if (isset($this->NM_ajax_info['param']['icu_indikator']))
          {
              $this->icu_indikator = $this->NM_ajax_info['param']['icu_indikator'];
          }
          if (isset($this->NM_ajax_info['param']['icu_los']))
          {
              $this->icu_los = $this->NM_ajax_info['param']['icu_los'];
          }
          if (isset($this->NM_ajax_info['param']['jenis_rawat']))
          {
              $this->jenis_rawat = $this->NM_ajax_info['param']['jenis_rawat'];
          }
          if (isset($this->NM_ajax_info['param']['kelas_rawat']))
          {
              $this->kelas_rawat = $this->NM_ajax_info['param']['kelas_rawat'];
          }
          if (isset($this->NM_ajax_info['param']['kode_tarif']))
          {
              $this->kode_tarif = $this->NM_ajax_info['param']['kode_tarif'];
          }
          if (isset($this->NM_ajax_info['param']['nama_dokter']))
          {
              $this->nama_dokter = $this->NM_ajax_info['param']['nama_dokter'];
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
          if (isset($this->NM_ajax_info['param']['nomor_kartu']))
          {
              $this->nomor_kartu = $this->NM_ajax_info['param']['nomor_kartu'];
          }
          if (isset($this->NM_ajax_info['param']['nomor_sep']))
          {
              $this->nomor_sep = $this->NM_ajax_info['param']['nomor_sep'];
          }
          if (isset($this->NM_ajax_info['param']['payor_cd']))
          {
              $this->payor_cd = $this->NM_ajax_info['param']['payor_cd'];
          }
          if (isset($this->NM_ajax_info['param']['payor_id']))
          {
              $this->payor_id = $this->NM_ajax_info['param']['payor_id'];
          }
          if (isset($this->NM_ajax_info['param']['procedure']))
          {
              $this->procedure = $this->NM_ajax_info['param']['procedure'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['tarif_poli_eks']))
          {
              $this->tarif_poli_eks = $this->NM_ajax_info['param']['tarif_poli_eks'];
          }
          if (isset($this->NM_ajax_info['param']['tarif_rs_alkes']))
          {
              $this->tarif_rs_alkes = $this->NM_ajax_info['param']['tarif_rs_alkes'];
          }
          if (isset($this->NM_ajax_info['param']['tarif_rs_bmhp']))
          {
              $this->tarif_rs_bmhp = $this->NM_ajax_info['param']['tarif_rs_bmhp'];
          }
          if (isset($this->NM_ajax_info['param']['tarif_rs_kamar']))
          {
              $this->tarif_rs_kamar = $this->NM_ajax_info['param']['tarif_rs_kamar'];
          }
          if (isset($this->NM_ajax_info['param']['tarif_rs_keperawatan']))
          {
              $this->tarif_rs_keperawatan = $this->NM_ajax_info['param']['tarif_rs_keperawatan'];
          }
          if (isset($this->NM_ajax_info['param']['tarif_rs_konsultasi']))
          {
              $this->tarif_rs_konsultasi = $this->NM_ajax_info['param']['tarif_rs_konsultasi'];
          }
          if (isset($this->NM_ajax_info['param']['tarif_rs_laboratorium']))
          {
              $this->tarif_rs_laboratorium = $this->NM_ajax_info['param']['tarif_rs_laboratorium'];
          }
          if (isset($this->NM_ajax_info['param']['tarif_rs_obat']))
          {
              $this->tarif_rs_obat = $this->NM_ajax_info['param']['tarif_rs_obat'];
          }
          if (isset($this->NM_ajax_info['param']['tarif_rs_pelayanan_darah']))
          {
              $this->tarif_rs_pelayanan_darah = $this->NM_ajax_info['param']['tarif_rs_pelayanan_darah'];
          }
          if (isset($this->NM_ajax_info['param']['tarif_rs_penunjang']))
          {
              $this->tarif_rs_penunjang = $this->NM_ajax_info['param']['tarif_rs_penunjang'];
          }
          if (isset($this->NM_ajax_info['param']['tarif_rs_prosedur_bedah']))
          {
              $this->tarif_rs_prosedur_bedah = $this->NM_ajax_info['param']['tarif_rs_prosedur_bedah'];
          }
          if (isset($this->NM_ajax_info['param']['tarif_rs_prosedur_non_bedah']))
          {
              $this->tarif_rs_prosedur_non_bedah = $this->NM_ajax_info['param']['tarif_rs_prosedur_non_bedah'];
          }
          if (isset($this->NM_ajax_info['param']['tarif_rs_radiologi']))
          {
              $this->tarif_rs_radiologi = $this->NM_ajax_info['param']['tarif_rs_radiologi'];
          }
          if (isset($this->NM_ajax_info['param']['tarif_rs_rawat_intensif']))
          {
              $this->tarif_rs_rawat_intensif = $this->NM_ajax_info['param']['tarif_rs_rawat_intensif'];
          }
          if (isset($this->NM_ajax_info['param']['tarif_rs_rehabilitasi']))
          {
              $this->tarif_rs_rehabilitasi = $this->NM_ajax_info['param']['tarif_rs_rehabilitasi'];
          }
          if (isset($this->NM_ajax_info['param']['tarif_rs_sewa_alat']))
          {
              $this->tarif_rs_sewa_alat = $this->NM_ajax_info['param']['tarif_rs_sewa_alat'];
          }
          if (isset($this->NM_ajax_info['param']['tarif_rs_tenaga_ahli']))
          {
              $this->tarif_rs_tenaga_ahli = $this->NM_ajax_info['param']['tarif_rs_tenaga_ahli'];
          }
          if (isset($this->NM_ajax_info['param']['tgl_masuk']))
          {
              $this->tgl_masuk = $this->NM_ajax_info['param']['tgl_masuk'];
          }
          if (isset($this->NM_ajax_info['param']['tgl_pulang']))
          {
              $this->tgl_pulang = $this->NM_ajax_info['param']['tgl_pulang'];
          }
          if (isset($this->NM_ajax_info['param']['upgrade_class_class']))
          {
              $this->upgrade_class_class = $this->NM_ajax_info['param']['upgrade_class_class'];
          }
          if (isset($this->NM_ajax_info['param']['upgrade_class_ind']))
          {
              $this->upgrade_class_ind = $this->NM_ajax_info['param']['upgrade_class_ind'];
          }
          if (isset($this->NM_ajax_info['param']['upgrade_class_los']))
          {
              $this->upgrade_class_los = $this->NM_ajax_info['param']['upgrade_class_los'];
          }
          if (isset($this->NM_ajax_info['param']['ventilator_hour']))
          {
              $this->ventilator_hour = $this->NM_ajax_info['param']['ventilator_hour'];
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
      if (isset($this->message) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['message'] = $this->message;
      }
      if (isset($this->patient_id) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['patient_id'] = $this->patient_id;
      }
      if (isset($this->admission_id) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['admission_id'] = $this->admission_id;
      }
      if (isset($this->hospital_admission_id) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['hospital_admission_id'] = $this->hospital_admission_id;
      }
      if (isset($this->message_err) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['message_err'] = $this->message_err;
      }
      if (isset($this->nama_pasien_0) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['nama_pasien_0'] = $this->nama_pasien_0;
      }
      if (isset($this->nomor_rm_0) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['nomor_rm_0'] = $this->nomor_rm_0;
      }
      if (isset($this->tgl_masuk_0) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['tgl_masuk_0'] = $this->tgl_masuk_0;
      }
      if (isset($this->nama_pasien_1) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['nama_pasien_1'] = $this->nama_pasien_1;
      }
      if (isset($this->nomor_rm_1) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['nomor_rm_1'] = $this->nomor_rm_1;
      }
      if (isset($this->tgl_masuk_1) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['tgl_masuk_1'] = $this->tgl_masuk_1;
      }
      if (isset($_POST["message"]) && isset($this->message)) 
      {
          $_SESSION['message'] = $this->message;
      }
      if (isset($_POST["patient_id"]) && isset($this->patient_id)) 
      {
          $_SESSION['patient_id'] = $this->patient_id;
      }
      if (isset($_POST["admission_id"]) && isset($this->admission_id)) 
      {
          $_SESSION['admission_id'] = $this->admission_id;
      }
      if (isset($_POST["hospital_admission_id"]) && isset($this->hospital_admission_id)) 
      {
          $_SESSION['hospital_admission_id'] = $this->hospital_admission_id;
      }
      if (isset($_POST["message_err"]) && isset($this->message_err)) 
      {
          $_SESSION['message_err'] = $this->message_err;
      }
      if (isset($_POST["nama_pasien_0"]) && isset($this->nama_pasien_0)) 
      {
          $_SESSION['nama_pasien_0'] = $this->nama_pasien_0;
      }
      if (isset($_POST["nomor_rm_0"]) && isset($this->nomor_rm_0)) 
      {
          $_SESSION['nomor_rm_0'] = $this->nomor_rm_0;
      }
      if (isset($_POST["tgl_masuk_0"]) && isset($this->tgl_masuk_0)) 
      {
          $_SESSION['tgl_masuk_0'] = $this->tgl_masuk_0;
      }
      if (isset($_POST["nama_pasien_1"]) && isset($this->nama_pasien_1)) 
      {
          $_SESSION['nama_pasien_1'] = $this->nama_pasien_1;
      }
      if (isset($_POST["nomor_rm_1"]) && isset($this->nomor_rm_1)) 
      {
          $_SESSION['nomor_rm_1'] = $this->nomor_rm_1;
      }
      if (isset($_POST["tgl_masuk_1"]) && isset($this->tgl_masuk_1)) 
      {
          $_SESSION['tgl_masuk_1'] = $this->tgl_masuk_1;
      }
      if (isset($_GET["message"]) && isset($this->message)) 
      {
          $_SESSION['message'] = $this->message;
      }
      if (isset($_GET["patient_id"]) && isset($this->patient_id)) 
      {
          $_SESSION['patient_id'] = $this->patient_id;
      }
      if (isset($_GET["admission_id"]) && isset($this->admission_id)) 
      {
          $_SESSION['admission_id'] = $this->admission_id;
      }
      if (isset($_GET["hospital_admission_id"]) && isset($this->hospital_admission_id)) 
      {
          $_SESSION['hospital_admission_id'] = $this->hospital_admission_id;
      }
      if (isset($_GET["message_err"]) && isset($this->message_err)) 
      {
          $_SESSION['message_err'] = $this->message_err;
      }
      if (isset($_GET["nama_pasien_0"]) && isset($this->nama_pasien_0)) 
      {
          $_SESSION['nama_pasien_0'] = $this->nama_pasien_0;
      }
      if (isset($_GET["nomor_rm_0"]) && isset($this->nomor_rm_0)) 
      {
          $_SESSION['nomor_rm_0'] = $this->nomor_rm_0;
      }
      if (isset($_GET["tgl_masuk_0"]) && isset($this->tgl_masuk_0)) 
      {
          $_SESSION['tgl_masuk_0'] = $this->tgl_masuk_0;
      }
      if (isset($_GET["nama_pasien_1"]) && isset($this->nama_pasien_1)) 
      {
          $_SESSION['nama_pasien_1'] = $this->nama_pasien_1;
      }
      if (isset($_GET["nomor_rm_1"]) && isset($this->nomor_rm_1)) 
      {
          $_SESSION['nomor_rm_1'] = $this->nomor_rm_1;
      }
      if (isset($_GET["tgl_masuk_1"]) && isset($this->tgl_masuk_1)) 
      {
          $_SESSION['tgl_masuk_1'] = $this->tgl_masuk_1;
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_eclaim_klaim_update_data']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_eclaim_klaim_update_data']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_eclaim_klaim_update_data']['embutida_parms']);
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
                 nm_limpa_str_form_eclaim_klaim_update_data($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->message)) 
          {
              $_SESSION['message'] = $this->message;
          }
          if (isset($this->patient_id)) 
          {
              $_SESSION['patient_id'] = $this->patient_id;
          }
          if (isset($this->admission_id)) 
          {
              $_SESSION['admission_id'] = $this->admission_id;
          }
          if (isset($this->hospital_admission_id)) 
          {
              $_SESSION['hospital_admission_id'] = $this->hospital_admission_id;
          }
          if (isset($this->message_err)) 
          {
              $_SESSION['message_err'] = $this->message_err;
          }
          if (isset($this->nama_pasien_0)) 
          {
              $_SESSION['nama_pasien_0'] = $this->nama_pasien_0;
          }
          if (isset($this->nomor_rm_0)) 
          {
              $_SESSION['nomor_rm_0'] = $this->nomor_rm_0;
          }
          if (isset($this->tgl_masuk_0)) 
          {
              $_SESSION['tgl_masuk_0'] = $this->tgl_masuk_0;
          }
          if (isset($this->nama_pasien_1)) 
          {
              $_SESSION['nama_pasien_1'] = $this->nama_pasien_1;
          }
          if (isset($this->nomor_rm_1)) 
          {
              $_SESSION['nomor_rm_1'] = $this->nomor_rm_1;
          }
          if (isset($this->tgl_masuk_1)) 
          {
              $_SESSION['tgl_masuk_1'] = $this->tgl_masuk_1;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_eclaim_klaim_update_data']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_eclaim_klaim_update_data']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_eclaim_klaim_update_data']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_eclaim_klaim_update_data']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->message)) 
          {
              $_SESSION['message'] = $this->message;
          }
          if (isset($this->patient_id)) 
          {
              $_SESSION['patient_id'] = $this->patient_id;
          }
          if (isset($this->admission_id)) 
          {
              $_SESSION['admission_id'] = $this->admission_id;
          }
          if (isset($this->hospital_admission_id)) 
          {
              $_SESSION['hospital_admission_id'] = $this->hospital_admission_id;
          }
          if (isset($this->message_err)) 
          {
              $_SESSION['message_err'] = $this->message_err;
          }
          if (isset($this->nama_pasien_0)) 
          {
              $_SESSION['nama_pasien_0'] = $this->nama_pasien_0;
          }
          if (isset($this->nomor_rm_0)) 
          {
              $_SESSION['nomor_rm_0'] = $this->nomor_rm_0;
          }
          if (isset($this->tgl_masuk_0)) 
          {
              $_SESSION['tgl_masuk_0'] = $this->tgl_masuk_0;
          }
          if (isset($this->nama_pasien_1)) 
          {
              $_SESSION['nama_pasien_1'] = $this->nama_pasien_1;
          }
          if (isset($this->nomor_rm_1)) 
          {
              $_SESSION['nomor_rm_1'] = $this->nomor_rm_1;
          }
          if (isset($this->tgl_masuk_1)) 
          {
              $_SESSION['tgl_masuk_1'] = $this->tgl_masuk_1;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_eclaim_klaim_update_data']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_eclaim_klaim_update_data']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_eclaim_klaim_update_data']['nm_run_menu'] = 1;
      } 
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->tgl_masuk);
          $this->tgl_masuk      = $aDtParts[0];
          $this->tgl_masuk_hora = $aDtParts[1];
      }
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->tgl_pulang);
          $this->tgl_pulang      = $aDtParts[0];
          $this->tgl_pulang_hora = $aDtParts[1];
      }
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_eclaim_klaim_update_data']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_eclaim_klaim_update_data']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_eclaim_klaim_update_data']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_eclaim_klaim_update_data']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_eclaim_klaim_update_data']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_eclaim_klaim_update_data']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_eclaim_klaim_update_data']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_eclaim_klaim_update_data_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("id");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("id");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_eclaim_klaim_update_data']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_eclaim_klaim_update_data']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_eclaim_klaim_update_data'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_eclaim_klaim_update_data']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_eclaim_klaim_update_data']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_eclaim_klaim_update_data') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_eclaim_klaim_update_data']['label'] = "Update Data Klaim";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_eclaim_klaim_update_data")
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



      $_SESSION['scriptcase']['error_icon']['form_eclaim_klaim_update_data']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_eclaim_klaim_update_data'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_eclaim_klaim_update_data']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_eclaim_klaim_update_data']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_eclaim_klaim_update_data']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_eclaim_klaim_update_data']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_eclaim_klaim_update_data']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_eclaim_klaim_update_data']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['goto']      = 'on';
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_eclaim_klaim_update_data']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_eclaim_klaim_update_data']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_eclaim_klaim_update_data']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_eclaim_klaim_update_data']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_eclaim_klaim_update_data'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_eclaim_klaim_update_data'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_eclaim_klaim_update_data']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_eclaim_klaim_update_data']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_eclaim_klaim_update_data']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_eclaim_klaim_update_data']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_eclaim_klaim_update_data']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_eclaim_klaim_update_data']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_eclaim_klaim_update_data']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_eclaim_klaim_update_data']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_eclaim_klaim_update_data']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_eclaim_klaim_update_data']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_eclaim_klaim_update_data']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_eclaim_klaim_update_data']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_eclaim_klaim_update_data']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_eclaim_klaim_update_data']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_eclaim_klaim_update_data']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_eclaim_klaim_update_data']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_eclaim_klaim_update_data']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_eclaim_klaim_update_data']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_eclaim_klaim_update_data']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_eclaim_klaim_update_data", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'form_eclaim_klaim_update_data/form_eclaim_klaim_update_data_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_eclaim_klaim_update_data_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_eclaim_klaim_update_data_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_eclaim_klaim_update_data_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_eclaim_klaim_update_data/form_eclaim_klaim_update_data_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_eclaim_klaim_update_data_erro.class.php"); 
      }
      $this->Erro      = new form_eclaim_klaim_update_data_erro();
      $this->Erro->Ini = $this->Ini;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_eclaim_klaim_update_data']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_eclaim_klaim_update_data']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_eclaim_klaim_update_data']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['dados_form'];
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- tgl_masuk
      $this->field_config['tgl_masuk']                 = array();
      $this->field_config['tgl_masuk']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['tgl_masuk']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['tgl_masuk']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['tgl_masuk']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'tgl_masuk');
      //-- tgl_pulang
      $this->field_config['tgl_pulang']                 = array();
      $this->field_config['tgl_pulang']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['tgl_pulang']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['tgl_pulang']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['tgl_pulang']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'tgl_pulang');
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
          if ('validate_nomor_sep' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nomor_sep');
          }
          if ('validate_nomor_kartu' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nomor_kartu');
          }
          if ('validate_tgl_masuk' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tgl_masuk');
          }
          if ('validate_tgl_pulang' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tgl_pulang');
          }
          if ('validate_jenis_rawat' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'jenis_rawat');
          }
          if ('validate_kelas_rawat' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'kelas_rawat');
          }
          if ('validate_adl_sub_acute' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'adl_sub_acute');
          }
          if ('validate_adl_chronic' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'adl_chronic');
          }
          if ('validate_icu_indikator' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'icu_indikator');
          }
          if ('validate_icu_los' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'icu_los');
          }
          if ('validate_ventilator_hour' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ventilator_hour');
          }
          if ('validate_upgrade_class_ind' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'upgrade_class_ind');
          }
          if ('validate_upgrade_class_class' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'upgrade_class_class');
          }
          if ('validate_upgrade_class_los' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'upgrade_class_los');
          }
          if ('validate_add_payment_pct' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'add_payment_pct');
          }
          if ('validate_birth_weight' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'birth_weight');
          }
          if ('validate_discharge_status' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'discharge_status');
          }
          if ('validate_diagnosa' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'diagnosa');
          }
          if ('validate_procedure' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'procedure');
          }
          if ('validate_tarif_rs_prosedur_non_bedah' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tarif_rs_prosedur_non_bedah');
          }
          if ('validate_tarif_rs_prosedur_bedah' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tarif_rs_prosedur_bedah');
          }
          if ('validate_tarif_rs_konsultasi' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tarif_rs_konsultasi');
          }
          if ('validate_tarif_rs_tenaga_ahli' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tarif_rs_tenaga_ahli');
          }
          if ('validate_tarif_rs_keperawatan' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tarif_rs_keperawatan');
          }
          if ('validate_tarif_rs_penunjang' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tarif_rs_penunjang');
          }
          if ('validate_tarif_rs_radiologi' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tarif_rs_radiologi');
          }
          if ('validate_tarif_rs_laboratorium' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tarif_rs_laboratorium');
          }
          if ('validate_tarif_rs_pelayanan_darah' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tarif_rs_pelayanan_darah');
          }
          if ('validate_tarif_rs_rehabilitasi' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tarif_rs_rehabilitasi');
          }
          if ('validate_tarif_rs_kamar' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tarif_rs_kamar');
          }
          if ('validate_tarif_rs_rawat_intensif' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tarif_rs_rawat_intensif');
          }
          if ('validate_tarif_rs_obat' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tarif_rs_obat');
          }
          if ('validate_tarif_rs_alkes' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tarif_rs_alkes');
          }
          if ('validate_tarif_rs_bmhp' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tarif_rs_bmhp');
          }
          if ('validate_tarif_rs_sewa_alat' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tarif_rs_sewa_alat');
          }
          if ('validate_tarif_poli_eks' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tarif_poli_eks');
          }
          if ('validate_nama_dokter' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nama_dokter');
          }
          if ('validate_kode_tarif' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'kode_tarif');
          }
          if ('validate_payor_id' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'payor_id');
          }
          if ('validate_payor_cd' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'payor_cd');
          }
          if ('validate_cob_cd' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cob_cd');
          }
          form_eclaim_klaim_update_data_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_eclaim_klaim_update_data_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_eclaim_klaim_update_data']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_eclaim_klaim_update_data_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_eclaim_klaim_update_data']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_eclaim_klaim_update_data_pack_ajax_response();
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
          $this->nomor_sep = "" ;  
          $this->nomor_kartu = "" ;  
          $this->tgl_masuk = "" ;  
          $this->tgl_pulang = "" ;  
          $this->jenis_rawat = "" ;  
          $this->kelas_rawat = "" ;  
          $this->adl_sub_acute = "" ;  
          $this->adl_chronic = "" ;  
          $this->icu_indikator = "" ;  
          $this->icu_los = "" ;  
          $this->ventilator_hour = "" ;  
          $this->upgrade_class_ind = "" ;  
          $this->upgrade_class_class = "" ;  
          $this->upgrade_class_los = "" ;  
          $this->add_payment_pct = "" ;  
          $this->birth_weight = "" ;  
          $this->discharge_status = "" ;  
          $this->diagnosa = "" ;  
          $this->procedure = "" ;  
          $this->tarif_rs_prosedur_non_bedah = "" ;  
          $this->tarif_rs_prosedur_bedah = "" ;  
          $this->tarif_rs_konsultasi = "" ;  
          $this->tarif_rs_tenaga_ahli = "" ;  
          $this->tarif_rs_keperawatan = "" ;  
          $this->tarif_rs_penunjang = "" ;  
          $this->tarif_rs_radiologi = "" ;  
          $this->tarif_rs_laboratorium = "" ;  
          $this->tarif_rs_pelayanan_darah = "" ;  
          $this->tarif_rs_rehabilitasi = "" ;  
          $this->tarif_rs_kamar = "" ;  
          $this->tarif_rs_rawat_intensif = "" ;  
          $this->tarif_rs_obat = "" ;  
          $this->tarif_rs_alkes = "" ;  
          $this->tarif_rs_bmhp = "" ;  
          $this->tarif_rs_sewa_alat = "" ;  
          $this->tarif_poli_eks = "" ;  
          $this->nama_dokter = "" ;  
          $this->kode_tarif = "" ;  
          $this->payor_id = "" ;  
          $this->payor_cd = "" ;  
          $this->cob_cd = "" ;  
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['dados_form']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['dados_form']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['dados_form'] as $NM_campo => $NM_valor)
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['recarga'] = $this->nmgp_opcao;
      }
      if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "" || $campos_erro != "" || !isset($this->bok) || $this->bok != "OK" || $this->nmgp_opcao == "recarga")
      {
          if ($Campos_Crit == "" && empty($Campos_Falta) && $this->Campos_Mens_erro == "" && !isset($this->bok) && $this->nmgp_opcao != "recarga")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos']))
              { 
                  $nomor_sep = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][0]; 
                  $nomor_kartu = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][1]; 
                  $tgl_masuk = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][2]; 
                  $tgl_pulang = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][3]; 
                  $jenis_rawat = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][4]; 
                  $kelas_rawat = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][5]; 
                  $adl_sub_acute = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][6]; 
                  $adl_chronic = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][7]; 
                  $icu_indikator = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][8]; 
                  $icu_los = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][9]; 
                  $ventilator_hour = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][10]; 
                  $upgrade_class_ind = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][11]; 
                  $upgrade_class_class = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][12]; 
                  $upgrade_class_los = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][13]; 
                  $add_payment_pct = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][14]; 
                  $birth_weight = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][15]; 
                  $discharge_status = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][16]; 
                  $diagnosa = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][17]; 
                  $procedure = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][18]; 
                  $tarif_rs_prosedur_non_bedah = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][19]; 
                  $tarif_rs_prosedur_bedah = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][20]; 
                  $tarif_rs_konsultasi = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][21]; 
                  $tarif_rs_tenaga_ahli = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][22]; 
                  $tarif_rs_keperawatan = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][23]; 
                  $tarif_rs_penunjang = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][24]; 
                  $tarif_rs_radiologi = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][25]; 
                  $tarif_rs_laboratorium = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][26]; 
                  $tarif_rs_pelayanan_darah = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][27]; 
                  $tarif_rs_rehabilitasi = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][28]; 
                  $tarif_rs_kamar = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][29]; 
                  $tarif_rs_rawat_intensif = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][30]; 
                  $tarif_rs_obat = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][31]; 
                  $tarif_rs_alkes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][32]; 
                  $tarif_rs_bmhp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][33]; 
                  $tarif_rs_sewa_alat = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][34]; 
                  $tarif_poli_eks = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][35]; 
                  $nama_dokter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][36]; 
                  $kode_tarif = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][37]; 
                  $payor_id = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][38]; 
                  $payor_cd = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][39]; 
                  $cob_cd = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][40]; 
              } 
          }
          $this->nm_gera_html();
      }
      elseif (isset($this->bok) && $this->bok == "OK")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'] = array(); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][0] = $this->nomor_sep; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][1] = $this->nomor_kartu; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][2] = $this->tgl_masuk; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][3] = $this->tgl_pulang; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][4] = $this->jenis_rawat; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][5] = $this->kelas_rawat; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][6] = $this->adl_sub_acute; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][7] = $this->adl_chronic; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][8] = $this->icu_indikator; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][9] = $this->icu_los; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][10] = $this->ventilator_hour; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][11] = $this->upgrade_class_ind; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][12] = $this->upgrade_class_class; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][13] = $this->upgrade_class_los; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][14] = $this->add_payment_pct; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][15] = $this->birth_weight; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][16] = $this->discharge_status; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][17] = $this->diagnosa; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][18] = $this->procedure; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][19] = $this->tarif_rs_prosedur_non_bedah; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][20] = $this->tarif_rs_prosedur_bedah; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][21] = $this->tarif_rs_konsultasi; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][22] = $this->tarif_rs_tenaga_ahli; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][23] = $this->tarif_rs_keperawatan; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][24] = $this->tarif_rs_penunjang; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][25] = $this->tarif_rs_radiologi; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][26] = $this->tarif_rs_laboratorium; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][27] = $this->tarif_rs_pelayanan_darah; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][28] = $this->tarif_rs_rehabilitasi; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][29] = $this->tarif_rs_kamar; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][30] = $this->tarif_rs_rawat_intensif; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][31] = $this->tarif_rs_obat; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][32] = $this->tarif_rs_alkes; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][33] = $this->tarif_rs_bmhp; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][34] = $this->tarif_rs_sewa_alat; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][35] = $this->tarif_poli_eks; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][36] = $this->nama_dokter; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][37] = $this->kode_tarif; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][38] = $this->payor_id; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][39] = $this->payor_cd; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['campos'][40] = $this->cob_cd; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['redir'] == "redir")
          {
              $this->nmgp_redireciona(); 
          }
          else
          {
              $contr_menu = "";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['iframe_menu'])
              {
                  $contr_menu = "glo_menu";
              }
              if (isset($_SESSION['scriptcase']['sc_ult_apl_menu']) && in_array("form_eclaim_klaim_update_data", $_SESSION['scriptcase']['sc_ult_apl_menu']))
              {
                  $this->nmgp_redireciona_form("form_eclaim_klaim_update_data_fim.php", $this->nm_location, $contr_menu); 
              }
              else
              {
                  $this->nm_gera_html();
              }
          }
          if ($this->NM_ajax_flag)
          {
              form_eclaim_klaim_update_data_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_eclaim_klaim_update_data.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("Update Data Klaim") ?></TITLE>
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
<form name="Fdown" method="get" action="form_eclaim_klaim_update_data_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_eclaim_klaim_update_data"> 
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
           case 'nomor_sep':
               return "No. SEP";
               break;
           case 'nomor_kartu':
               return "No. Kartu";
               break;
           case 'tgl_masuk':
               return "Tanggal Masuk";
               break;
           case 'tgl_pulang':
               return "Tanggal Pulang";
               break;
           case 'jenis_rawat':
               return "Jenis Perawatan";
               break;
           case 'kelas_rawat':
               return "Kelas Perawatan";
               break;
           case 'adl_sub_acute':
               return "ADL Sub Acute";
               break;
           case 'adl_chronic':
               return "ADL Chronic";
               break;
           case 'icu_indikator':
               return "ICU Indikator";
               break;
           case 'icu_los':
               return "ICU Los";
               break;
           case 'ventilator_hour':
               return "Ventilator Hour";
               break;
           case 'upgrade_class_ind':
               return "Upgrade Class Ind";
               break;
           case 'upgrade_class_class':
               return "Upgrade Class Class";
               break;
           case 'upgrade_class_los':
               return "Upgrade Class Los";
               break;
           case 'add_payment_pct':
               return "Add Payment Percent";
               break;
           case 'birth_weight':
               return "Birth Weight";
               break;
           case 'discharge_status':
               return "Discharge Status";
               break;
           case 'diagnosa':
               return "Diagnosa";
               break;
           case 'procedure':
               return "Procedure";
               break;
           case 'tarif_rs_prosedur_non_bedah':
               return "Tarif Prosedur Non Bedah";
               break;
           case 'tarif_rs_prosedur_bedah':
               return "Tarif Prosedur Bedah";
               break;
           case 'tarif_rs_konsultasi':
               return "Tarif konsultasi";
               break;
           case 'tarif_rs_tenaga_ahli':
               return "Tarif Tenaga Ahli";
               break;
           case 'tarif_rs_keperawatan':
               return "Tarif Keperawatan";
               break;
           case 'tarif_rs_penunjang':
               return "Tarif Penunjang";
               break;
           case 'tarif_rs_radiologi':
               return "Tarif Radiologi";
               break;
           case 'tarif_rs_laboratorium':
               return "Tarif Laboratorium";
               break;
           case 'tarif_rs_pelayanan_darah':
               return "Tarif Pelayanan Darah";
               break;
           case 'tarif_rs_rehabilitasi':
               return "Tarif rehabilitasi";
               break;
           case 'tarif_rs_kamar':
               return "Tarif Kamar";
               break;
           case 'tarif_rs_rawat_intensif':
               return "Tarif Rawat Intensif";
               break;
           case 'tarif_rs_obat':
               return "Tarif Obat";
               break;
           case 'tarif_rs_alkes':
               return "Tarif Alkes";
               break;
           case 'tarif_rs_bmhp':
               return "Tarif BMHP";
               break;
           case 'tarif_rs_sewa_alat':
               return "Tarif Sewa Alat";
               break;
           case 'tarif_poli_eks':
               return "Tarif Poli Eksekutif";
               break;
           case 'nama_dokter':
               return "Nama Dokter";
               break;
           case 'kode_tarif':
               return "Kode Tarif";
               break;
           case 'payor_id':
               return "Payor ID";
               break;
           case 'payor_cd':
               return "Payor Code";
               break;
           case 'cob_cd':
               return "COB Code";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_eclaim_klaim_update_data']) || !is_array($this->NM_ajax_info['errList']['geral_form_eclaim_klaim_update_data']))
              {
                  $this->NM_ajax_info['errList']['geral_form_eclaim_klaim_update_data'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_eclaim_klaim_update_data'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'nomor_sep' == $filtro)
        $this->ValidateField_nomor_sep($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nomor_kartu' == $filtro)
        $this->ValidateField_nomor_kartu($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tgl_masuk' == $filtro)
        $this->ValidateField_tgl_masuk($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tgl_pulang' == $filtro)
        $this->ValidateField_tgl_pulang($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'jenis_rawat' == $filtro)
        $this->ValidateField_jenis_rawat($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'kelas_rawat' == $filtro)
        $this->ValidateField_kelas_rawat($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'adl_sub_acute' == $filtro)
        $this->ValidateField_adl_sub_acute($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'adl_chronic' == $filtro)
        $this->ValidateField_adl_chronic($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'icu_indikator' == $filtro)
        $this->ValidateField_icu_indikator($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'icu_los' == $filtro)
        $this->ValidateField_icu_los($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'ventilator_hour' == $filtro)
        $this->ValidateField_ventilator_hour($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'upgrade_class_ind' == $filtro)
        $this->ValidateField_upgrade_class_ind($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'upgrade_class_class' == $filtro)
        $this->ValidateField_upgrade_class_class($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'upgrade_class_los' == $filtro)
        $this->ValidateField_upgrade_class_los($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'add_payment_pct' == $filtro)
        $this->ValidateField_add_payment_pct($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'birth_weight' == $filtro)
        $this->ValidateField_birth_weight($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'discharge_status' == $filtro)
        $this->ValidateField_discharge_status($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'diagnosa' == $filtro)
        $this->ValidateField_diagnosa($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'procedure' == $filtro)
        $this->ValidateField_procedure($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tarif_rs_prosedur_non_bedah' == $filtro)
        $this->ValidateField_tarif_rs_prosedur_non_bedah($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tarif_rs_prosedur_bedah' == $filtro)
        $this->ValidateField_tarif_rs_prosedur_bedah($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tarif_rs_konsultasi' == $filtro)
        $this->ValidateField_tarif_rs_konsultasi($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tarif_rs_tenaga_ahli' == $filtro)
        $this->ValidateField_tarif_rs_tenaga_ahli($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tarif_rs_keperawatan' == $filtro)
        $this->ValidateField_tarif_rs_keperawatan($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tarif_rs_penunjang' == $filtro)
        $this->ValidateField_tarif_rs_penunjang($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tarif_rs_radiologi' == $filtro)
        $this->ValidateField_tarif_rs_radiologi($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tarif_rs_laboratorium' == $filtro)
        $this->ValidateField_tarif_rs_laboratorium($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tarif_rs_pelayanan_darah' == $filtro)
        $this->ValidateField_tarif_rs_pelayanan_darah($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tarif_rs_rehabilitasi' == $filtro)
        $this->ValidateField_tarif_rs_rehabilitasi($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tarif_rs_kamar' == $filtro)
        $this->ValidateField_tarif_rs_kamar($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tarif_rs_rawat_intensif' == $filtro)
        $this->ValidateField_tarif_rs_rawat_intensif($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tarif_rs_obat' == $filtro)
        $this->ValidateField_tarif_rs_obat($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tarif_rs_alkes' == $filtro)
        $this->ValidateField_tarif_rs_alkes($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tarif_rs_bmhp' == $filtro)
        $this->ValidateField_tarif_rs_bmhp($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tarif_rs_sewa_alat' == $filtro)
        $this->ValidateField_tarif_rs_sewa_alat($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tarif_poli_eks' == $filtro)
        $this->ValidateField_tarif_poli_eks($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nama_dokter' == $filtro)
        $this->ValidateField_nama_dokter($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'kode_tarif' == $filtro)
        $this->ValidateField_kode_tarif($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'payor_id' == $filtro)
        $this->ValidateField_payor_id($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'payor_cd' == $filtro)
        $this->ValidateField_payor_cd($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cob_cd' == $filtro)
        $this->ValidateField_cob_cd($Campos_Crit, $Campos_Falta, $Campos_Erros);
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
              $_SESSION['scriptcase']['form_eclaim_klaim_update_data']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_add_payment_pct = $this->add_payment_pct;
    $original_adl_chronic = $this->adl_chronic;
    $original_adl_sub_acute = $this->adl_sub_acute;
    $original_birth_weight = $this->birth_weight;
    $original_cob_cd = $this->cob_cd;
    $original_diagnosa = $this->diagnosa;
    $original_discharge_status = $this->discharge_status;
    $original_icu_indikator = $this->icu_indikator;
    $original_icu_los = $this->icu_los;
    $original_jenis_rawat = $this->jenis_rawat;
    $original_kelas_rawat = $this->kelas_rawat;
    $original_kode_tarif = $this->kode_tarif;
    $original_nama_dokter = $this->nama_dokter;
    $original_nomor_kartu = $this->nomor_kartu;
    $original_nomor_sep = $this->nomor_sep;
    $original_payor_cd = $this->payor_cd;
    $original_payor_id = $this->payor_id;
    $original_procedure = $this->procedure;
    $original_tarif_poli_eks = $this->tarif_poli_eks;
    $original_tarif_rs_alkes = $this->tarif_rs_alkes;
    $original_tarif_rs_bmhp = $this->tarif_rs_bmhp;
    $original_tarif_rs_kamar = $this->tarif_rs_kamar;
    $original_tarif_rs_keperawatan = $this->tarif_rs_keperawatan;
    $original_tarif_rs_konsultasi = $this->tarif_rs_konsultasi;
    $original_tarif_rs_laboratorium = $this->tarif_rs_laboratorium;
    $original_tarif_rs_obat = $this->tarif_rs_obat;
    $original_tarif_rs_pelayanan_darah = $this->tarif_rs_pelayanan_darah;
    $original_tarif_rs_penunjang = $this->tarif_rs_penunjang;
    $original_tarif_rs_prosedur_bedah = $this->tarif_rs_prosedur_bedah;
    $original_tarif_rs_prosedur_non_bedah = $this->tarif_rs_prosedur_non_bedah;
    $original_tarif_rs_radiologi = $this->tarif_rs_radiologi;
    $original_tarif_rs_rawat_intensif = $this->tarif_rs_rawat_intensif;
    $original_tarif_rs_rehabilitasi = $this->tarif_rs_rehabilitasi;
    $original_tarif_rs_sewa_alat = $this->tarif_rs_sewa_alat;
    $original_tarif_rs_tenaga_ahli = $this->tarif_rs_tenaga_ahli;
    $original_tgl_masuk = $this->tgl_masuk;
    $original_tgl_pulang = $this->tgl_pulang;
    $original_upgrade_class_class = $this->upgrade_class_class;
    $original_upgrade_class_ind = $this->upgrade_class_ind;
    $original_upgrade_class_los = $this->upgrade_class_los;
    $original_ventilator_hour = $this->ventilator_hour;
}
if (!isset($this->sc_temp_tgl_masuk_1)) {$this->sc_temp_tgl_masuk_1 = (isset($_SESSION['tgl_masuk_1'])) ? $_SESSION['tgl_masuk_1'] : "";}
if (!isset($this->sc_temp_nomor_rm_1)) {$this->sc_temp_nomor_rm_1 = (isset($_SESSION['nomor_rm_1'])) ? $_SESSION['nomor_rm_1'] : "";}
if (!isset($this->sc_temp_nama_pasien_1)) {$this->sc_temp_nama_pasien_1 = (isset($_SESSION['nama_pasien_1'])) ? $_SESSION['nama_pasien_1'] : "";}
if (!isset($this->sc_temp_tgl_masuk_0)) {$this->sc_temp_tgl_masuk_0 = (isset($_SESSION['tgl_masuk_0'])) ? $_SESSION['tgl_masuk_0'] : "";}
if (!isset($this->sc_temp_nomor_rm_0)) {$this->sc_temp_nomor_rm_0 = (isset($_SESSION['nomor_rm_0'])) ? $_SESSION['nomor_rm_0'] : "";}
if (!isset($this->sc_temp_nama_pasien_0)) {$this->sc_temp_nama_pasien_0 = (isset($_SESSION['nama_pasien_0'])) ? $_SESSION['nama_pasien_0'] : "";}
if (!isset($this->sc_temp_message_err)) {$this->sc_temp_message_err = (isset($_SESSION['message_err'])) ? $_SESSION['message_err'] : "";}
if (!isset($this->sc_temp_hospital_admission_id)) {$this->sc_temp_hospital_admission_id = (isset($_SESSION['hospital_admission_id'])) ? $_SESSION['hospital_admission_id'] : "";}
if (!isset($this->sc_temp_admission_id)) {$this->sc_temp_admission_id = (isset($_SESSION['admission_id'])) ? $_SESSION['admission_id'] : "";}
if (!isset($this->sc_temp_patient_id)) {$this->sc_temp_patient_id = (isset($_SESSION['patient_id'])) ? $_SESSION['patient_id'] : "";}
if (!isset($this->sc_temp_message)) {$this->sc_temp_message = (isset($_SESSION['message'])) ? $_SESSION['message'] : "";}
  $conf = $this->config_param();
$key = $conf['eklaim_key'];
$conf_url = $conf['eklaim_api_url'];
$coder_nik = '123123123123';

$json_request = '{
	"metadata": {
		"method": "set_claim_data",
		"nomor_sep": "'.$this->nomor_sep .'"
	},
	"data": {
		"nomor_sep": "'.$this->nomor_sep .'",
		"nomor_kartu": "'.$this->nomor_kartu .'",
		"tgl_masuk": "'.$this->tgl_masuk .'",
		"tgl_pulang": "'.$this->tgl_pulang .'",
		"jenis_rawat": "'.$this->jenis_rawat .'",
		"kelas_rawat": "'.$this->kelas_rawat .'",
		"adl_sub_acute": "'.$this->adl_sub_acute .'",
		"adl_chronic": "'.$this->adl_chronic .'",
		"icu_indikator": "'.$this->icu_indikator .'",
		"icu_los": "'.$this->icu_los .'",
		"ventilator_hour": "'.$this->ventilator_hour .'",
		"upgrade_class_ind": "'.$this->upgrade_class_ind .'",
		"upgrade_class_class": "'.$this->upgrade_class_class .'",
		"upgrade_class_los": "'.$this->upgrade_class_los .'",
		"add_payment_pct": "'.$this->add_payment_pct .'",
		"birth_weight": "'.$this->birth_weight .'",
		"discharge_status": "'.$this->discharge_status .'",
		"diagnosa": "'.$this->diagnosa .'",
		"procedure": "'.$this->procedure .'",
		"tarif_rs": {
			"prosedur_non_bedah": "'.$this->tarif_rs_prosedur_non_bedah .'",
			"prosedur_bedah": "'.$this->tarif_rs_prosedur_bedah .'",
			"konsultasi": "'.$this->tarif_rs_konsultasi .'",
			"tenaga_ahli": "'.$this->tarif_rs_tenaga_ahli .'",
			"keperawatan": "'.$this->tarif_rs_keperawatan .'",
			"penunjang": "'.$this->tarif_rs_penunjang .'",
			"radiologi": "'.$this->tarif_rs_radiologi .'",
			"laboratorium": "'.$this->tarif_rs_laboratorium .'",
			"pelayanan_darah": "'.$this->tarif_rs_pelayanan_darah .'",
			"rehabilitasi": "'.$this->tarif_rs_rehabilitasi .'",
			"kamar": "'.$this->tarif_rs_kamar .'",
			"rawat_intensif": "'.$this->tarif_rs_rawat_intensif .'",
			"obat": "'.$this->tarif_rs_obat .'",
			"alkes": "'.$this->tarif_rs_alkes .'",
			"bmhp": "'.$this->tarif_rs_bmhp .'",
			"sewa_alat": "'.$this->tarif_rs_sewa_alat .'"
		},
		"tarif_poli_eks": "'.$this->tarif_poli_eks .'",
		"nama_dokter": "'.$this->nama_dokter .'",
		"kode_tarif": "'.$this->kode_tarif .'",
		"payor_id": "'.$this->payor_id .'",
		"payor_cd": "'.$this->payor_cd .'",
		"cob_cd": "'.$this->cob_cd .'",
		"coder_nik": "'.$coder_nik.'"
	}
}';


$response = $this->post_request($json_request, $key, $conf_url);
	
$jr = json_decode($response,true);
$statResponse = $jr['metadata']['code'];

switch ($statResponse) {
    case 200:        
		
		$redir_app = 'form_eclaim_klaim_baru_message';
		$redir_target = '_self';		
		$this->sc_temp_message 				= $jr['metadata']['message'];
		$this->sc_temp_patient_id 			= $jr['response']['patient_id'];
		$this->sc_temp_admission_id 			= $jr['response']['admission_id'];
		$this->sc_temp_hospital_admission_id = $jr['response']['hospital_admission_id'];
		 if (isset($this->sc_temp_message)) { $_SESSION['message'] = $this->sc_temp_message;}
 if (isset($this->sc_temp_patient_id)) { $_SESSION['patient_id'] = $this->sc_temp_patient_id;}
 if (isset($this->sc_temp_admission_id)) { $_SESSION['admission_id'] = $this->sc_temp_admission_id;}
 if (isset($this->sc_temp_hospital_admission_id)) { $_SESSION['hospital_admission_id'] = $this->sc_temp_hospital_admission_id;}
 if (isset($this->sc_temp_message_err)) { $_SESSION['message_err'] = $this->sc_temp_message_err;}
 if (isset($this->sc_temp_nama_pasien_0)) { $_SESSION['nama_pasien_0'] = $this->sc_temp_nama_pasien_0;}
 if (isset($this->sc_temp_nomor_rm_0)) { $_SESSION['nomor_rm_0'] = $this->sc_temp_nomor_rm_0;}
 if (isset($this->sc_temp_tgl_masuk_0)) { $_SESSION['tgl_masuk_0'] = $this->sc_temp_tgl_masuk_0;}
 if (isset($this->sc_temp_nama_pasien_1)) { $_SESSION['nama_pasien_1'] = $this->sc_temp_nama_pasien_1;}
 if (isset($this->sc_temp_nomor_rm_1)) { $_SESSION['nomor_rm_1'] = $this->sc_temp_nomor_rm_1;}
 if (isset($this->sc_temp_tgl_masuk_1)) { $_SESSION['tgl_masuk_1'] = $this->sc_temp_tgl_masuk_1;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($redir_app, $this->nm_location, $redir_target, "_self", "ret_self", 440, 630);
 };
		
        break;
    case 400:
        
		$redir_app = 'form_eclaim_klaim_baru_error';
		$redir_target = '_self';
		$this->sc_temp_message_err 		= $jr['metadata']['message'];
		
		$this->sc_temp_nama_pasien_0 = $jr['duplicate'][0]['nama_pasien'];
		$this->sc_temp_nomor_rm_0 	= $jr['duplicate'][0]['nomor_rm'];
		$this->sc_temp_tgl_masuk_0	= $jr['duplicate'][0]['tgl_masuk'];
		
		$this->sc_temp_nama_pasien_1 = $jr['duplicate'][1]['nama_pasien'];
		$this->sc_temp_nomor_rm_1 	= $jr['duplicate'][1]['nomor_rm'];
		$this->sc_temp_tgl_masuk_1 	= $jr['duplicate'][1]['tgl_masuk'];		
		 if (isset($this->sc_temp_message)) { $_SESSION['message'] = $this->sc_temp_message;}
 if (isset($this->sc_temp_patient_id)) { $_SESSION['patient_id'] = $this->sc_temp_patient_id;}
 if (isset($this->sc_temp_admission_id)) { $_SESSION['admission_id'] = $this->sc_temp_admission_id;}
 if (isset($this->sc_temp_hospital_admission_id)) { $_SESSION['hospital_admission_id'] = $this->sc_temp_hospital_admission_id;}
 if (isset($this->sc_temp_message_err)) { $_SESSION['message_err'] = $this->sc_temp_message_err;}
 if (isset($this->sc_temp_nama_pasien_0)) { $_SESSION['nama_pasien_0'] = $this->sc_temp_nama_pasien_0;}
 if (isset($this->sc_temp_nomor_rm_0)) { $_SESSION['nomor_rm_0'] = $this->sc_temp_nomor_rm_0;}
 if (isset($this->sc_temp_tgl_masuk_0)) { $_SESSION['tgl_masuk_0'] = $this->sc_temp_tgl_masuk_0;}
 if (isset($this->sc_temp_nama_pasien_1)) { $_SESSION['nama_pasien_1'] = $this->sc_temp_nama_pasien_1;}
 if (isset($this->sc_temp_nomor_rm_1)) { $_SESSION['nomor_rm_1'] = $this->sc_temp_nomor_rm_1;}
 if (isset($this->sc_temp_tgl_masuk_1)) { $_SESSION['tgl_masuk_1'] = $this->sc_temp_tgl_masuk_1;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($redir_app, $this->nm_location, $redir_target, "_self", "ret_self", 440, 630);
 };
		
        break;
}
if (isset($this->sc_temp_message)) { $_SESSION['message'] = $this->sc_temp_message;}
if (isset($this->sc_temp_patient_id)) { $_SESSION['patient_id'] = $this->sc_temp_patient_id;}
if (isset($this->sc_temp_admission_id)) { $_SESSION['admission_id'] = $this->sc_temp_admission_id;}
if (isset($this->sc_temp_hospital_admission_id)) { $_SESSION['hospital_admission_id'] = $this->sc_temp_hospital_admission_id;}
if (isset($this->sc_temp_message_err)) { $_SESSION['message_err'] = $this->sc_temp_message_err;}
if (isset($this->sc_temp_nama_pasien_0)) { $_SESSION['nama_pasien_0'] = $this->sc_temp_nama_pasien_0;}
if (isset($this->sc_temp_nomor_rm_0)) { $_SESSION['nomor_rm_0'] = $this->sc_temp_nomor_rm_0;}
if (isset($this->sc_temp_tgl_masuk_0)) { $_SESSION['tgl_masuk_0'] = $this->sc_temp_tgl_masuk_0;}
if (isset($this->sc_temp_nama_pasien_1)) { $_SESSION['nama_pasien_1'] = $this->sc_temp_nama_pasien_1;}
if (isset($this->sc_temp_nomor_rm_1)) { $_SESSION['nomor_rm_1'] = $this->sc_temp_nomor_rm_1;}
if (isset($this->sc_temp_tgl_masuk_1)) { $_SESSION['tgl_masuk_1'] = $this->sc_temp_tgl_masuk_1;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_add_payment_pct != $this->add_payment_pct || (isset($bFlagRead_add_payment_pct) && $bFlagRead_add_payment_pct)))
    {
        $this->ajax_return_values_add_payment_pct(true);
    }
    if (($original_adl_chronic != $this->adl_chronic || (isset($bFlagRead_adl_chronic) && $bFlagRead_adl_chronic)))
    {
        $this->ajax_return_values_adl_chronic(true);
    }
    if (($original_adl_sub_acute != $this->adl_sub_acute || (isset($bFlagRead_adl_sub_acute) && $bFlagRead_adl_sub_acute)))
    {
        $this->ajax_return_values_adl_sub_acute(true);
    }
    if (($original_birth_weight != $this->birth_weight || (isset($bFlagRead_birth_weight) && $bFlagRead_birth_weight)))
    {
        $this->ajax_return_values_birth_weight(true);
    }
    if (($original_cob_cd != $this->cob_cd || (isset($bFlagRead_cob_cd) && $bFlagRead_cob_cd)))
    {
        $this->ajax_return_values_cob_cd(true);
    }
    if (($original_diagnosa != $this->diagnosa || (isset($bFlagRead_diagnosa) && $bFlagRead_diagnosa)))
    {
        $this->ajax_return_values_diagnosa(true);
    }
    if (($original_discharge_status != $this->discharge_status || (isset($bFlagRead_discharge_status) && $bFlagRead_discharge_status)))
    {
        $this->ajax_return_values_discharge_status(true);
    }
    if (($original_icu_indikator != $this->icu_indikator || (isset($bFlagRead_icu_indikator) && $bFlagRead_icu_indikator)))
    {
        $this->ajax_return_values_icu_indikator(true);
    }
    if (($original_icu_los != $this->icu_los || (isset($bFlagRead_icu_los) && $bFlagRead_icu_los)))
    {
        $this->ajax_return_values_icu_los(true);
    }
    if (($original_jenis_rawat != $this->jenis_rawat || (isset($bFlagRead_jenis_rawat) && $bFlagRead_jenis_rawat)))
    {
        $this->ajax_return_values_jenis_rawat(true);
    }
    if (($original_kelas_rawat != $this->kelas_rawat || (isset($bFlagRead_kelas_rawat) && $bFlagRead_kelas_rawat)))
    {
        $this->ajax_return_values_kelas_rawat(true);
    }
    if (($original_kode_tarif != $this->kode_tarif || (isset($bFlagRead_kode_tarif) && $bFlagRead_kode_tarif)))
    {
        $this->ajax_return_values_kode_tarif(true);
    }
    if (($original_nama_dokter != $this->nama_dokter || (isset($bFlagRead_nama_dokter) && $bFlagRead_nama_dokter)))
    {
        $this->ajax_return_values_nama_dokter(true);
    }
    if (($original_nomor_kartu != $this->nomor_kartu || (isset($bFlagRead_nomor_kartu) && $bFlagRead_nomor_kartu)))
    {
        $this->ajax_return_values_nomor_kartu(true);
    }
    if (($original_nomor_sep != $this->nomor_sep || (isset($bFlagRead_nomor_sep) && $bFlagRead_nomor_sep)))
    {
        $this->ajax_return_values_nomor_sep(true);
    }
    if (($original_payor_cd != $this->payor_cd || (isset($bFlagRead_payor_cd) && $bFlagRead_payor_cd)))
    {
        $this->ajax_return_values_payor_cd(true);
    }
    if (($original_payor_id != $this->payor_id || (isset($bFlagRead_payor_id) && $bFlagRead_payor_id)))
    {
        $this->ajax_return_values_payor_id(true);
    }
    if (($original_procedure != $this->procedure || (isset($bFlagRead_procedure) && $bFlagRead_procedure)))
    {
        $this->ajax_return_values_procedure(true);
    }
    if (($original_tarif_poli_eks != $this->tarif_poli_eks || (isset($bFlagRead_tarif_poli_eks) && $bFlagRead_tarif_poli_eks)))
    {
        $this->ajax_return_values_tarif_poli_eks(true);
    }
    if (($original_tarif_rs_alkes != $this->tarif_rs_alkes || (isset($bFlagRead_tarif_rs_alkes) && $bFlagRead_tarif_rs_alkes)))
    {
        $this->ajax_return_values_tarif_rs_alkes(true);
    }
    if (($original_tarif_rs_bmhp != $this->tarif_rs_bmhp || (isset($bFlagRead_tarif_rs_bmhp) && $bFlagRead_tarif_rs_bmhp)))
    {
        $this->ajax_return_values_tarif_rs_bmhp(true);
    }
    if (($original_tarif_rs_kamar != $this->tarif_rs_kamar || (isset($bFlagRead_tarif_rs_kamar) && $bFlagRead_tarif_rs_kamar)))
    {
        $this->ajax_return_values_tarif_rs_kamar(true);
    }
    if (($original_tarif_rs_keperawatan != $this->tarif_rs_keperawatan || (isset($bFlagRead_tarif_rs_keperawatan) && $bFlagRead_tarif_rs_keperawatan)))
    {
        $this->ajax_return_values_tarif_rs_keperawatan(true);
    }
    if (($original_tarif_rs_konsultasi != $this->tarif_rs_konsultasi || (isset($bFlagRead_tarif_rs_konsultasi) && $bFlagRead_tarif_rs_konsultasi)))
    {
        $this->ajax_return_values_tarif_rs_konsultasi(true);
    }
    if (($original_tarif_rs_laboratorium != $this->tarif_rs_laboratorium || (isset($bFlagRead_tarif_rs_laboratorium) && $bFlagRead_tarif_rs_laboratorium)))
    {
        $this->ajax_return_values_tarif_rs_laboratorium(true);
    }
    if (($original_tarif_rs_obat != $this->tarif_rs_obat || (isset($bFlagRead_tarif_rs_obat) && $bFlagRead_tarif_rs_obat)))
    {
        $this->ajax_return_values_tarif_rs_obat(true);
    }
    if (($original_tarif_rs_pelayanan_darah != $this->tarif_rs_pelayanan_darah || (isset($bFlagRead_tarif_rs_pelayanan_darah) && $bFlagRead_tarif_rs_pelayanan_darah)))
    {
        $this->ajax_return_values_tarif_rs_pelayanan_darah(true);
    }
    if (($original_tarif_rs_penunjang != $this->tarif_rs_penunjang || (isset($bFlagRead_tarif_rs_penunjang) && $bFlagRead_tarif_rs_penunjang)))
    {
        $this->ajax_return_values_tarif_rs_penunjang(true);
    }
    if (($original_tarif_rs_prosedur_bedah != $this->tarif_rs_prosedur_bedah || (isset($bFlagRead_tarif_rs_prosedur_bedah) && $bFlagRead_tarif_rs_prosedur_bedah)))
    {
        $this->ajax_return_values_tarif_rs_prosedur_bedah(true);
    }
    if (($original_tarif_rs_prosedur_non_bedah != $this->tarif_rs_prosedur_non_bedah || (isset($bFlagRead_tarif_rs_prosedur_non_bedah) && $bFlagRead_tarif_rs_prosedur_non_bedah)))
    {
        $this->ajax_return_values_tarif_rs_prosedur_non_bedah(true);
    }
    if (($original_tarif_rs_radiologi != $this->tarif_rs_radiologi || (isset($bFlagRead_tarif_rs_radiologi) && $bFlagRead_tarif_rs_radiologi)))
    {
        $this->ajax_return_values_tarif_rs_radiologi(true);
    }
    if (($original_tarif_rs_rawat_intensif != $this->tarif_rs_rawat_intensif || (isset($bFlagRead_tarif_rs_rawat_intensif) && $bFlagRead_tarif_rs_rawat_intensif)))
    {
        $this->ajax_return_values_tarif_rs_rawat_intensif(true);
    }
    if (($original_tarif_rs_rehabilitasi != $this->tarif_rs_rehabilitasi || (isset($bFlagRead_tarif_rs_rehabilitasi) && $bFlagRead_tarif_rs_rehabilitasi)))
    {
        $this->ajax_return_values_tarif_rs_rehabilitasi(true);
    }
    if (($original_tarif_rs_sewa_alat != $this->tarif_rs_sewa_alat || (isset($bFlagRead_tarif_rs_sewa_alat) && $bFlagRead_tarif_rs_sewa_alat)))
    {
        $this->ajax_return_values_tarif_rs_sewa_alat(true);
    }
    if (($original_tarif_rs_tenaga_ahli != $this->tarif_rs_tenaga_ahli || (isset($bFlagRead_tarif_rs_tenaga_ahli) && $bFlagRead_tarif_rs_tenaga_ahli)))
    {
        $this->ajax_return_values_tarif_rs_tenaga_ahli(true);
    }
    if (($original_tgl_masuk != $this->tgl_masuk || (isset($bFlagRead_tgl_masuk) && $bFlagRead_tgl_masuk)))
    {
        $this->ajax_return_values_tgl_masuk(true);
    }
    if (($original_tgl_pulang != $this->tgl_pulang || (isset($bFlagRead_tgl_pulang) && $bFlagRead_tgl_pulang)))
    {
        $this->ajax_return_values_tgl_pulang(true);
    }
    if (($original_upgrade_class_class != $this->upgrade_class_class || (isset($bFlagRead_upgrade_class_class) && $bFlagRead_upgrade_class_class)))
    {
        $this->ajax_return_values_upgrade_class_class(true);
    }
    if (($original_upgrade_class_ind != $this->upgrade_class_ind || (isset($bFlagRead_upgrade_class_ind) && $bFlagRead_upgrade_class_ind)))
    {
        $this->ajax_return_values_upgrade_class_ind(true);
    }
    if (($original_upgrade_class_los != $this->upgrade_class_los || (isset($bFlagRead_upgrade_class_los) && $bFlagRead_upgrade_class_los)))
    {
        $this->ajax_return_values_upgrade_class_los(true);
    }
    if (($original_ventilator_hour != $this->ventilator_hour || (isset($bFlagRead_ventilator_hour) && $bFlagRead_ventilator_hour)))
    {
        $this->ajax_return_values_ventilator_hour(true);
    }
}
$_SESSION['scriptcase']['form_eclaim_klaim_update_data']['contr_erro'] = 'off'; 
          }
      }
   }

    function ValidateField_nomor_sep(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nomor_sep) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "No. SEP " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nomor_sep']))
              {
                  $Campos_Erros['nomor_sep'] = array();
              }
              $Campos_Erros['nomor_sep'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nomor_sep']) || !is_array($this->NM_ajax_info['errList']['nomor_sep']))
              {
                  $this->NM_ajax_info['errList']['nomor_sep'] = array();
              }
              $this->NM_ajax_info['errList']['nomor_sep'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nomor_sep';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nomor_sep

    function ValidateField_nomor_kartu(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nomor_kartu) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "No. Kartu " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nomor_kartu']))
              {
                  $Campos_Erros['nomor_kartu'] = array();
              }
              $Campos_Erros['nomor_kartu'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nomor_kartu']) || !is_array($this->NM_ajax_info['errList']['nomor_kartu']))
              {
                  $this->NM_ajax_info['errList']['nomor_kartu'] = array();
              }
              $this->NM_ajax_info['errList']['nomor_kartu'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nomor_kartu';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nomor_kartu

    function ValidateField_tgl_masuk(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->tgl_masuk, $this->field_config['tgl_masuk']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['tgl_masuk']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['tgl_masuk']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['tgl_masuk']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['tgl_masuk']['date_sep']) ; 
          if (trim($this->tgl_masuk) != "")  
          { 
              if ($teste_validade->Data($this->tgl_masuk, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tanggal Masuk; " ; 
                  if (!isset($Campos_Erros['tgl_masuk']))
                  {
                      $Campos_Erros['tgl_masuk'] = array();
                  }
                  $Campos_Erros['tgl_masuk'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['tgl_masuk']) || !is_array($this->NM_ajax_info['errList']['tgl_masuk']))
                  {
                      $this->NM_ajax_info['errList']['tgl_masuk'] = array();
                  }
                  $this->NM_ajax_info['errList']['tgl_masuk'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['tgl_masuk']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tgl_masuk';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->tgl_masuk_hora, $this->field_config['tgl_masuk_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['tgl_masuk_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['tgl_masuk_hora']['time_sep']) ; 
          if (trim($this->tgl_masuk_hora) != "")  
          { 
              if ($teste_validade->Hora($this->tgl_masuk_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tanggal Masuk; " ; 
                  if (!isset($Campos_Erros['tgl_masuk_hora']))
                  {
                      $Campos_Erros['tgl_masuk_hora'] = array();
                  }
                  $Campos_Erros['tgl_masuk_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['tgl_masuk']) || !is_array($this->NM_ajax_info['errList']['tgl_masuk']))
                  {
                      $this->NM_ajax_info['errList']['tgl_masuk'] = array();
                  }
                  $this->NM_ajax_info['errList']['tgl_masuk'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['tgl_masuk']) && isset($Campos_Erros['tgl_masuk_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['tgl_masuk'], $Campos_Erros['tgl_masuk_hora']);
          if (empty($Campos_Erros['tgl_masuk_hora']))
          {
              unset($Campos_Erros['tgl_masuk_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['tgl_masuk']))
          {
              $this->NM_ajax_info['errList']['tgl_masuk'] = array_unique($this->NM_ajax_info['errList']['tgl_masuk']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tgl_masuk_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tgl_masuk_hora

    function ValidateField_tgl_pulang(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->tgl_pulang, $this->field_config['tgl_pulang']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['tgl_pulang']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['tgl_pulang']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['tgl_pulang']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['tgl_pulang']['date_sep']) ; 
          if (trim($this->tgl_pulang) != "")  
          { 
              if ($teste_validade->Data($this->tgl_pulang, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tanggal Pulang; " ; 
                  if (!isset($Campos_Erros['tgl_pulang']))
                  {
                      $Campos_Erros['tgl_pulang'] = array();
                  }
                  $Campos_Erros['tgl_pulang'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['tgl_pulang']) || !is_array($this->NM_ajax_info['errList']['tgl_pulang']))
                  {
                      $this->NM_ajax_info['errList']['tgl_pulang'] = array();
                  }
                  $this->NM_ajax_info['errList']['tgl_pulang'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['tgl_pulang']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tgl_pulang';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->tgl_pulang_hora, $this->field_config['tgl_pulang_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['tgl_pulang_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['tgl_pulang_hora']['time_sep']) ; 
          if (trim($this->tgl_pulang_hora) != "")  
          { 
              if ($teste_validade->Hora($this->tgl_pulang_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tanggal Pulang; " ; 
                  if (!isset($Campos_Erros['tgl_pulang_hora']))
                  {
                      $Campos_Erros['tgl_pulang_hora'] = array();
                  }
                  $Campos_Erros['tgl_pulang_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['tgl_pulang']) || !is_array($this->NM_ajax_info['errList']['tgl_pulang']))
                  {
                      $this->NM_ajax_info['errList']['tgl_pulang'] = array();
                  }
                  $this->NM_ajax_info['errList']['tgl_pulang'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['tgl_pulang']) && isset($Campos_Erros['tgl_pulang_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['tgl_pulang'], $Campos_Erros['tgl_pulang_hora']);
          if (empty($Campos_Erros['tgl_pulang_hora']))
          {
              unset($Campos_Erros['tgl_pulang_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['tgl_pulang']))
          {
              $this->NM_ajax_info['errList']['tgl_pulang'] = array_unique($this->NM_ajax_info['errList']['tgl_pulang']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tgl_pulang_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tgl_pulang_hora

    function ValidateField_jenis_rawat(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->jenis_rawat) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Jenis Perawatan " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['jenis_rawat']))
              {
                  $Campos_Erros['jenis_rawat'] = array();
              }
              $Campos_Erros['jenis_rawat'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['jenis_rawat']) || !is_array($this->NM_ajax_info['errList']['jenis_rawat']))
              {
                  $this->NM_ajax_info['errList']['jenis_rawat'] = array();
              }
              $this->NM_ajax_info['errList']['jenis_rawat'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'jenis_rawat';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_jenis_rawat

    function ValidateField_kelas_rawat(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->kelas_rawat) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Kelas Perawatan " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['kelas_rawat']))
              {
                  $Campos_Erros['kelas_rawat'] = array();
              }
              $Campos_Erros['kelas_rawat'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['kelas_rawat']) || !is_array($this->NM_ajax_info['errList']['kelas_rawat']))
              {
                  $this->NM_ajax_info['errList']['kelas_rawat'] = array();
              }
              $this->NM_ajax_info['errList']['kelas_rawat'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'kelas_rawat';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_kelas_rawat

    function ValidateField_adl_sub_acute(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->adl_sub_acute) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "ADL Sub Acute " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['adl_sub_acute']))
              {
                  $Campos_Erros['adl_sub_acute'] = array();
              }
              $Campos_Erros['adl_sub_acute'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['adl_sub_acute']) || !is_array($this->NM_ajax_info['errList']['adl_sub_acute']))
              {
                  $this->NM_ajax_info['errList']['adl_sub_acute'] = array();
              }
              $this->NM_ajax_info['errList']['adl_sub_acute'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'adl_sub_acute';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_adl_sub_acute

    function ValidateField_adl_chronic(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->adl_chronic) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "ADL Chronic " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['adl_chronic']))
              {
                  $Campos_Erros['adl_chronic'] = array();
              }
              $Campos_Erros['adl_chronic'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['adl_chronic']) || !is_array($this->NM_ajax_info['errList']['adl_chronic']))
              {
                  $this->NM_ajax_info['errList']['adl_chronic'] = array();
              }
              $this->NM_ajax_info['errList']['adl_chronic'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'adl_chronic';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_adl_chronic

    function ValidateField_icu_indikator(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->icu_indikator) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "ICU Indikator " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['icu_indikator']))
              {
                  $Campos_Erros['icu_indikator'] = array();
              }
              $Campos_Erros['icu_indikator'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['icu_indikator']) || !is_array($this->NM_ajax_info['errList']['icu_indikator']))
              {
                  $this->NM_ajax_info['errList']['icu_indikator'] = array();
              }
              $this->NM_ajax_info['errList']['icu_indikator'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'icu_indikator';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_icu_indikator

    function ValidateField_icu_los(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->icu_los) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "ICU Los " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['icu_los']))
              {
                  $Campos_Erros['icu_los'] = array();
              }
              $Campos_Erros['icu_los'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['icu_los']) || !is_array($this->NM_ajax_info['errList']['icu_los']))
              {
                  $this->NM_ajax_info['errList']['icu_los'] = array();
              }
              $this->NM_ajax_info['errList']['icu_los'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'icu_los';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_icu_los

    function ValidateField_ventilator_hour(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->ventilator_hour) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Ventilator Hour " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['ventilator_hour']))
              {
                  $Campos_Erros['ventilator_hour'] = array();
              }
              $Campos_Erros['ventilator_hour'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['ventilator_hour']) || !is_array($this->NM_ajax_info['errList']['ventilator_hour']))
              {
                  $this->NM_ajax_info['errList']['ventilator_hour'] = array();
              }
              $this->NM_ajax_info['errList']['ventilator_hour'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ventilator_hour';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ventilator_hour

    function ValidateField_upgrade_class_ind(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->upgrade_class_ind) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Upgrade Class Ind " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['upgrade_class_ind']))
              {
                  $Campos_Erros['upgrade_class_ind'] = array();
              }
              $Campos_Erros['upgrade_class_ind'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['upgrade_class_ind']) || !is_array($this->NM_ajax_info['errList']['upgrade_class_ind']))
              {
                  $this->NM_ajax_info['errList']['upgrade_class_ind'] = array();
              }
              $this->NM_ajax_info['errList']['upgrade_class_ind'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'upgrade_class_ind';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_upgrade_class_ind

    function ValidateField_upgrade_class_class(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->upgrade_class_class) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Upgrade Class Class " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['upgrade_class_class']))
              {
                  $Campos_Erros['upgrade_class_class'] = array();
              }
              $Campos_Erros['upgrade_class_class'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['upgrade_class_class']) || !is_array($this->NM_ajax_info['errList']['upgrade_class_class']))
              {
                  $this->NM_ajax_info['errList']['upgrade_class_class'] = array();
              }
              $this->NM_ajax_info['errList']['upgrade_class_class'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'upgrade_class_class';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_upgrade_class_class

    function ValidateField_upgrade_class_los(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->upgrade_class_los) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Upgrade Class Los " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['upgrade_class_los']))
              {
                  $Campos_Erros['upgrade_class_los'] = array();
              }
              $Campos_Erros['upgrade_class_los'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['upgrade_class_los']) || !is_array($this->NM_ajax_info['errList']['upgrade_class_los']))
              {
                  $this->NM_ajax_info['errList']['upgrade_class_los'] = array();
              }
              $this->NM_ajax_info['errList']['upgrade_class_los'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'upgrade_class_los';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_upgrade_class_los

    function ValidateField_add_payment_pct(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->add_payment_pct) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Add Payment Percent " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['add_payment_pct']))
              {
                  $Campos_Erros['add_payment_pct'] = array();
              }
              $Campos_Erros['add_payment_pct'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['add_payment_pct']) || !is_array($this->NM_ajax_info['errList']['add_payment_pct']))
              {
                  $this->NM_ajax_info['errList']['add_payment_pct'] = array();
              }
              $this->NM_ajax_info['errList']['add_payment_pct'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'add_payment_pct';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_add_payment_pct

    function ValidateField_birth_weight(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->birth_weight) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Birth Weight " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['birth_weight']))
              {
                  $Campos_Erros['birth_weight'] = array();
              }
              $Campos_Erros['birth_weight'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['birth_weight']) || !is_array($this->NM_ajax_info['errList']['birth_weight']))
              {
                  $this->NM_ajax_info['errList']['birth_weight'] = array();
              }
              $this->NM_ajax_info['errList']['birth_weight'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'birth_weight';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_birth_weight

    function ValidateField_discharge_status(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->discharge_status) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Discharge Status " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['discharge_status']))
              {
                  $Campos_Erros['discharge_status'] = array();
              }
              $Campos_Erros['discharge_status'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['discharge_status']) || !is_array($this->NM_ajax_info['errList']['discharge_status']))
              {
                  $this->NM_ajax_info['errList']['discharge_status'] = array();
              }
              $this->NM_ajax_info['errList']['discharge_status'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'discharge_status';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_discharge_status

    function ValidateField_diagnosa(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->diagnosa) > 50) 
          { 
              $hasError = true;
              $Campos_Crit .= "Diagnosa " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['diagnosa']))
              {
                  $Campos_Erros['diagnosa'] = array();
              }
              $Campos_Erros['diagnosa'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['diagnosa']) || !is_array($this->NM_ajax_info['errList']['diagnosa']))
              {
                  $this->NM_ajax_info['errList']['diagnosa'] = array();
              }
              $this->NM_ajax_info['errList']['diagnosa'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'diagnosa';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_diagnosa

    function ValidateField_procedure(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->procedure) > 50) 
          { 
              $hasError = true;
              $Campos_Crit .= "Procedure " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['procedure']))
              {
                  $Campos_Erros['procedure'] = array();
              }
              $Campos_Erros['procedure'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['procedure']) || !is_array($this->NM_ajax_info['errList']['procedure']))
              {
                  $this->NM_ajax_info['errList']['procedure'] = array();
              }
              $this->NM_ajax_info['errList']['procedure'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'procedure';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_procedure

    function ValidateField_tarif_rs_prosedur_non_bedah(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tarif_rs_prosedur_non_bedah) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tarif Prosedur Non Bedah " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tarif_rs_prosedur_non_bedah']))
              {
                  $Campos_Erros['tarif_rs_prosedur_non_bedah'] = array();
              }
              $Campos_Erros['tarif_rs_prosedur_non_bedah'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tarif_rs_prosedur_non_bedah']) || !is_array($this->NM_ajax_info['errList']['tarif_rs_prosedur_non_bedah']))
              {
                  $this->NM_ajax_info['errList']['tarif_rs_prosedur_non_bedah'] = array();
              }
              $this->NM_ajax_info['errList']['tarif_rs_prosedur_non_bedah'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tarif_rs_prosedur_non_bedah';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tarif_rs_prosedur_non_bedah

    function ValidateField_tarif_rs_prosedur_bedah(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tarif_rs_prosedur_bedah) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tarif Prosedur Bedah " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tarif_rs_prosedur_bedah']))
              {
                  $Campos_Erros['tarif_rs_prosedur_bedah'] = array();
              }
              $Campos_Erros['tarif_rs_prosedur_bedah'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tarif_rs_prosedur_bedah']) || !is_array($this->NM_ajax_info['errList']['tarif_rs_prosedur_bedah']))
              {
                  $this->NM_ajax_info['errList']['tarif_rs_prosedur_bedah'] = array();
              }
              $this->NM_ajax_info['errList']['tarif_rs_prosedur_bedah'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tarif_rs_prosedur_bedah';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tarif_rs_prosedur_bedah

    function ValidateField_tarif_rs_konsultasi(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tarif_rs_konsultasi) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tarif konsultasi " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tarif_rs_konsultasi']))
              {
                  $Campos_Erros['tarif_rs_konsultasi'] = array();
              }
              $Campos_Erros['tarif_rs_konsultasi'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tarif_rs_konsultasi']) || !is_array($this->NM_ajax_info['errList']['tarif_rs_konsultasi']))
              {
                  $this->NM_ajax_info['errList']['tarif_rs_konsultasi'] = array();
              }
              $this->NM_ajax_info['errList']['tarif_rs_konsultasi'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tarif_rs_konsultasi';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tarif_rs_konsultasi

    function ValidateField_tarif_rs_tenaga_ahli(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tarif_rs_tenaga_ahli) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tarif Tenaga Ahli " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tarif_rs_tenaga_ahli']))
              {
                  $Campos_Erros['tarif_rs_tenaga_ahli'] = array();
              }
              $Campos_Erros['tarif_rs_tenaga_ahli'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tarif_rs_tenaga_ahli']) || !is_array($this->NM_ajax_info['errList']['tarif_rs_tenaga_ahli']))
              {
                  $this->NM_ajax_info['errList']['tarif_rs_tenaga_ahli'] = array();
              }
              $this->NM_ajax_info['errList']['tarif_rs_tenaga_ahli'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tarif_rs_tenaga_ahli';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tarif_rs_tenaga_ahli

    function ValidateField_tarif_rs_keperawatan(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tarif_rs_keperawatan) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tarif Keperawatan " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tarif_rs_keperawatan']))
              {
                  $Campos_Erros['tarif_rs_keperawatan'] = array();
              }
              $Campos_Erros['tarif_rs_keperawatan'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tarif_rs_keperawatan']) || !is_array($this->NM_ajax_info['errList']['tarif_rs_keperawatan']))
              {
                  $this->NM_ajax_info['errList']['tarif_rs_keperawatan'] = array();
              }
              $this->NM_ajax_info['errList']['tarif_rs_keperawatan'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tarif_rs_keperawatan';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tarif_rs_keperawatan

    function ValidateField_tarif_rs_penunjang(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tarif_rs_penunjang) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tarif Penunjang " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tarif_rs_penunjang']))
              {
                  $Campos_Erros['tarif_rs_penunjang'] = array();
              }
              $Campos_Erros['tarif_rs_penunjang'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tarif_rs_penunjang']) || !is_array($this->NM_ajax_info['errList']['tarif_rs_penunjang']))
              {
                  $this->NM_ajax_info['errList']['tarif_rs_penunjang'] = array();
              }
              $this->NM_ajax_info['errList']['tarif_rs_penunjang'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tarif_rs_penunjang';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tarif_rs_penunjang

    function ValidateField_tarif_rs_radiologi(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tarif_rs_radiologi) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tarif Radiologi " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tarif_rs_radiologi']))
              {
                  $Campos_Erros['tarif_rs_radiologi'] = array();
              }
              $Campos_Erros['tarif_rs_radiologi'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tarif_rs_radiologi']) || !is_array($this->NM_ajax_info['errList']['tarif_rs_radiologi']))
              {
                  $this->NM_ajax_info['errList']['tarif_rs_radiologi'] = array();
              }
              $this->NM_ajax_info['errList']['tarif_rs_radiologi'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tarif_rs_radiologi';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tarif_rs_radiologi

    function ValidateField_tarif_rs_laboratorium(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tarif_rs_laboratorium) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tarif Laboratorium " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tarif_rs_laboratorium']))
              {
                  $Campos_Erros['tarif_rs_laboratorium'] = array();
              }
              $Campos_Erros['tarif_rs_laboratorium'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tarif_rs_laboratorium']) || !is_array($this->NM_ajax_info['errList']['tarif_rs_laboratorium']))
              {
                  $this->NM_ajax_info['errList']['tarif_rs_laboratorium'] = array();
              }
              $this->NM_ajax_info['errList']['tarif_rs_laboratorium'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tarif_rs_laboratorium';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tarif_rs_laboratorium

    function ValidateField_tarif_rs_pelayanan_darah(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tarif_rs_pelayanan_darah) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tarif Pelayanan Darah " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tarif_rs_pelayanan_darah']))
              {
                  $Campos_Erros['tarif_rs_pelayanan_darah'] = array();
              }
              $Campos_Erros['tarif_rs_pelayanan_darah'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tarif_rs_pelayanan_darah']) || !is_array($this->NM_ajax_info['errList']['tarif_rs_pelayanan_darah']))
              {
                  $this->NM_ajax_info['errList']['tarif_rs_pelayanan_darah'] = array();
              }
              $this->NM_ajax_info['errList']['tarif_rs_pelayanan_darah'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tarif_rs_pelayanan_darah';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tarif_rs_pelayanan_darah

    function ValidateField_tarif_rs_rehabilitasi(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tarif_rs_rehabilitasi) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tarif rehabilitasi " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tarif_rs_rehabilitasi']))
              {
                  $Campos_Erros['tarif_rs_rehabilitasi'] = array();
              }
              $Campos_Erros['tarif_rs_rehabilitasi'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tarif_rs_rehabilitasi']) || !is_array($this->NM_ajax_info['errList']['tarif_rs_rehabilitasi']))
              {
                  $this->NM_ajax_info['errList']['tarif_rs_rehabilitasi'] = array();
              }
              $this->NM_ajax_info['errList']['tarif_rs_rehabilitasi'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tarif_rs_rehabilitasi';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tarif_rs_rehabilitasi

    function ValidateField_tarif_rs_kamar(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tarif_rs_kamar) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tarif Kamar " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tarif_rs_kamar']))
              {
                  $Campos_Erros['tarif_rs_kamar'] = array();
              }
              $Campos_Erros['tarif_rs_kamar'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tarif_rs_kamar']) || !is_array($this->NM_ajax_info['errList']['tarif_rs_kamar']))
              {
                  $this->NM_ajax_info['errList']['tarif_rs_kamar'] = array();
              }
              $this->NM_ajax_info['errList']['tarif_rs_kamar'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tarif_rs_kamar';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tarif_rs_kamar

    function ValidateField_tarif_rs_rawat_intensif(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tarif_rs_rawat_intensif) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tarif Rawat Intensif " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tarif_rs_rawat_intensif']))
              {
                  $Campos_Erros['tarif_rs_rawat_intensif'] = array();
              }
              $Campos_Erros['tarif_rs_rawat_intensif'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tarif_rs_rawat_intensif']) || !is_array($this->NM_ajax_info['errList']['tarif_rs_rawat_intensif']))
              {
                  $this->NM_ajax_info['errList']['tarif_rs_rawat_intensif'] = array();
              }
              $this->NM_ajax_info['errList']['tarif_rs_rawat_intensif'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tarif_rs_rawat_intensif';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tarif_rs_rawat_intensif

    function ValidateField_tarif_rs_obat(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tarif_rs_obat) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tarif Obat " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tarif_rs_obat']))
              {
                  $Campos_Erros['tarif_rs_obat'] = array();
              }
              $Campos_Erros['tarif_rs_obat'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tarif_rs_obat']) || !is_array($this->NM_ajax_info['errList']['tarif_rs_obat']))
              {
                  $this->NM_ajax_info['errList']['tarif_rs_obat'] = array();
              }
              $this->NM_ajax_info['errList']['tarif_rs_obat'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tarif_rs_obat';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tarif_rs_obat

    function ValidateField_tarif_rs_alkes(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tarif_rs_alkes) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tarif Alkes " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tarif_rs_alkes']))
              {
                  $Campos_Erros['tarif_rs_alkes'] = array();
              }
              $Campos_Erros['tarif_rs_alkes'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tarif_rs_alkes']) || !is_array($this->NM_ajax_info['errList']['tarif_rs_alkes']))
              {
                  $this->NM_ajax_info['errList']['tarif_rs_alkes'] = array();
              }
              $this->NM_ajax_info['errList']['tarif_rs_alkes'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tarif_rs_alkes';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tarif_rs_alkes

    function ValidateField_tarif_rs_bmhp(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tarif_rs_bmhp) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tarif BMHP " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tarif_rs_bmhp']))
              {
                  $Campos_Erros['tarif_rs_bmhp'] = array();
              }
              $Campos_Erros['tarif_rs_bmhp'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tarif_rs_bmhp']) || !is_array($this->NM_ajax_info['errList']['tarif_rs_bmhp']))
              {
                  $this->NM_ajax_info['errList']['tarif_rs_bmhp'] = array();
              }
              $this->NM_ajax_info['errList']['tarif_rs_bmhp'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tarif_rs_bmhp';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tarif_rs_bmhp

    function ValidateField_tarif_rs_sewa_alat(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tarif_rs_sewa_alat) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tarif Sewa Alat " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tarif_rs_sewa_alat']))
              {
                  $Campos_Erros['tarif_rs_sewa_alat'] = array();
              }
              $Campos_Erros['tarif_rs_sewa_alat'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tarif_rs_sewa_alat']) || !is_array($this->NM_ajax_info['errList']['tarif_rs_sewa_alat']))
              {
                  $this->NM_ajax_info['errList']['tarif_rs_sewa_alat'] = array();
              }
              $this->NM_ajax_info['errList']['tarif_rs_sewa_alat'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tarif_rs_sewa_alat';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tarif_rs_sewa_alat

    function ValidateField_tarif_poli_eks(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tarif_poli_eks) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tarif Poli Eksekutif " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tarif_poli_eks']))
              {
                  $Campos_Erros['tarif_poli_eks'] = array();
              }
              $Campos_Erros['tarif_poli_eks'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tarif_poli_eks']) || !is_array($this->NM_ajax_info['errList']['tarif_poli_eks']))
              {
                  $this->NM_ajax_info['errList']['tarif_poli_eks'] = array();
              }
              $this->NM_ajax_info['errList']['tarif_poli_eks'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tarif_poli_eks';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tarif_poli_eks

    function ValidateField_nama_dokter(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nama_dokter) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nama Dokter " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nama_dokter']))
              {
                  $Campos_Erros['nama_dokter'] = array();
              }
              $Campos_Erros['nama_dokter'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nama_dokter']) || !is_array($this->NM_ajax_info['errList']['nama_dokter']))
              {
                  $this->NM_ajax_info['errList']['nama_dokter'] = array();
              }
              $this->NM_ajax_info['errList']['nama_dokter'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nama_dokter';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nama_dokter

    function ValidateField_kode_tarif(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->kode_tarif) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Kode Tarif " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['kode_tarif']))
              {
                  $Campos_Erros['kode_tarif'] = array();
              }
              $Campos_Erros['kode_tarif'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['kode_tarif']) || !is_array($this->NM_ajax_info['errList']['kode_tarif']))
              {
                  $this->NM_ajax_info['errList']['kode_tarif'] = array();
              }
              $this->NM_ajax_info['errList']['kode_tarif'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'kode_tarif';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_kode_tarif

    function ValidateField_payor_id(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->payor_id) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Payor ID " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['payor_id']))
              {
                  $Campos_Erros['payor_id'] = array();
              }
              $Campos_Erros['payor_id'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['payor_id']) || !is_array($this->NM_ajax_info['errList']['payor_id']))
              {
                  $this->NM_ajax_info['errList']['payor_id'] = array();
              }
              $this->NM_ajax_info['errList']['payor_id'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'payor_id';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_payor_id

    function ValidateField_payor_cd(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->payor_cd) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Payor Code " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['payor_cd']))
              {
                  $Campos_Erros['payor_cd'] = array();
              }
              $Campos_Erros['payor_cd'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['payor_cd']) || !is_array($this->NM_ajax_info['errList']['payor_cd']))
              {
                  $this->NM_ajax_info['errList']['payor_cd'] = array();
              }
              $this->NM_ajax_info['errList']['payor_cd'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'payor_cd';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_payor_cd

    function ValidateField_cob_cd(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cob_cd) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "COB Code " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cob_cd']))
              {
                  $Campos_Erros['cob_cd'] = array();
              }
              $Campos_Erros['cob_cd'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cob_cd']) || !is_array($this->NM_ajax_info['errList']['cob_cd']))
              {
                  $this->NM_ajax_info['errList']['cob_cd'] = array();
              }
              $this->NM_ajax_info['errList']['cob_cd'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cob_cd';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cob_cd

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
    $this->nmgp_dados_form['nomor_sep'] = $this->nomor_sep;
    $this->nmgp_dados_form['nomor_kartu'] = $this->nomor_kartu;
    $this->nmgp_dados_form['tgl_masuk'] = $this->tgl_masuk;
    $this->nmgp_dados_form['tgl_pulang'] = $this->tgl_pulang;
    $this->nmgp_dados_form['jenis_rawat'] = $this->jenis_rawat;
    $this->nmgp_dados_form['kelas_rawat'] = $this->kelas_rawat;
    $this->nmgp_dados_form['adl_sub_acute'] = $this->adl_sub_acute;
    $this->nmgp_dados_form['adl_chronic'] = $this->adl_chronic;
    $this->nmgp_dados_form['icu_indikator'] = $this->icu_indikator;
    $this->nmgp_dados_form['icu_los'] = $this->icu_los;
    $this->nmgp_dados_form['ventilator_hour'] = $this->ventilator_hour;
    $this->nmgp_dados_form['upgrade_class_ind'] = $this->upgrade_class_ind;
    $this->nmgp_dados_form['upgrade_class_class'] = $this->upgrade_class_class;
    $this->nmgp_dados_form['upgrade_class_los'] = $this->upgrade_class_los;
    $this->nmgp_dados_form['add_payment_pct'] = $this->add_payment_pct;
    $this->nmgp_dados_form['birth_weight'] = $this->birth_weight;
    $this->nmgp_dados_form['discharge_status'] = $this->discharge_status;
    $this->nmgp_dados_form['diagnosa'] = $this->diagnosa;
    $this->nmgp_dados_form['procedure'] = $this->procedure;
    $this->nmgp_dados_form['tarif_rs_prosedur_non_bedah'] = $this->tarif_rs_prosedur_non_bedah;
    $this->nmgp_dados_form['tarif_rs_prosedur_bedah'] = $this->tarif_rs_prosedur_bedah;
    $this->nmgp_dados_form['tarif_rs_konsultasi'] = $this->tarif_rs_konsultasi;
    $this->nmgp_dados_form['tarif_rs_tenaga_ahli'] = $this->tarif_rs_tenaga_ahli;
    $this->nmgp_dados_form['tarif_rs_keperawatan'] = $this->tarif_rs_keperawatan;
    $this->nmgp_dados_form['tarif_rs_penunjang'] = $this->tarif_rs_penunjang;
    $this->nmgp_dados_form['tarif_rs_radiologi'] = $this->tarif_rs_radiologi;
    $this->nmgp_dados_form['tarif_rs_laboratorium'] = $this->tarif_rs_laboratorium;
    $this->nmgp_dados_form['tarif_rs_pelayanan_darah'] = $this->tarif_rs_pelayanan_darah;
    $this->nmgp_dados_form['tarif_rs_rehabilitasi'] = $this->tarif_rs_rehabilitasi;
    $this->nmgp_dados_form['tarif_rs_kamar'] = $this->tarif_rs_kamar;
    $this->nmgp_dados_form['tarif_rs_rawat_intensif'] = $this->tarif_rs_rawat_intensif;
    $this->nmgp_dados_form['tarif_rs_obat'] = $this->tarif_rs_obat;
    $this->nmgp_dados_form['tarif_rs_alkes'] = $this->tarif_rs_alkes;
    $this->nmgp_dados_form['tarif_rs_bmhp'] = $this->tarif_rs_bmhp;
    $this->nmgp_dados_form['tarif_rs_sewa_alat'] = $this->tarif_rs_sewa_alat;
    $this->nmgp_dados_form['tarif_poli_eks'] = $this->tarif_poli_eks;
    $this->nmgp_dados_form['nama_dokter'] = $this->nama_dokter;
    $this->nmgp_dados_form['kode_tarif'] = $this->kode_tarif;
    $this->nmgp_dados_form['payor_id'] = $this->payor_id;
    $this->nmgp_dados_form['payor_cd'] = $this->payor_cd;
    $this->nmgp_dados_form['cob_cd'] = $this->cob_cd;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['tgl_masuk'] = $this->tgl_masuk;
      nm_limpa_data($this->tgl_masuk, $this->field_config['tgl_masuk']['date_sep']) ; 
      nm_limpa_hora($this->tgl_masuk_hora, $this->field_config['tgl_masuk']['time_sep']) ; 
      $this->Before_unformat['tgl_pulang'] = $this->tgl_pulang;
      nm_limpa_data($this->tgl_pulang, $this->field_config['tgl_pulang']['date_sep']) ; 
      nm_limpa_hora($this->tgl_pulang_hora, $this->field_config['tgl_pulang']['time_sep']) ; 
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
      if (!empty($this->tgl_masuk) || (!empty($format_fields) && isset($format_fields['tgl_masuk'])))
      {
          $nm_separa_data = strpos($this->field_config['tgl_masuk']['date_format'], ";") ;
          $form_data = substr($this->field_config['tgl_masuk']['date_format'], 0, $nm_separa_data);
          $form_hora = substr($this->field_config['tgl_masuk']['date_format'], $nm_separa_data + 1);
          $temp      = trim(strtolower("YYYY-MM-DD hh:mm:ss"));
          $pos_hora  = strpos($temp, "h");
          $pos_min   = strpos($temp, "i");
          $pos_seg   = strpos($temp, "s");
          $pos_hora  = min($pos_hora, $pos_min, $pos_seg);
          $out_data  = trim(substr($temp, 0, $pos_hora));
          $out_hora  = trim(substr($temp, $pos_hora));
          $separador = strpos($this->tgl_masuk, " ") ; 
          $this->tgl_masuk_hora = substr($this->tgl_masuk, $separador + 1) ; 
          $this->tgl_masuk = substr($this->tgl_masuk, 0, $separador) ; 
          nm_conv_form_data($this->tgl_masuk, $out_data, $form_data, array($this->field_config['tgl_masuk']['date_sep'])) ;  
          nm_conv_form_hora($this->tgl_masuk_hora, $out_hora, $form_hora, array($this->field_config['tgl_masuk']['time_sep'])) ;  
      }
      if (!empty($this->tgl_pulang) || (!empty($format_fields) && isset($format_fields['tgl_pulang'])))
      {
          $nm_separa_data = strpos($this->field_config['tgl_pulang']['date_format'], ";") ;
          $form_data = substr($this->field_config['tgl_pulang']['date_format'], 0, $nm_separa_data);
          $form_hora = substr($this->field_config['tgl_pulang']['date_format'], $nm_separa_data + 1);
          $temp      = trim(strtolower("YYYY-MM-DD hh:mm:ss"));
          $pos_hora  = strpos($temp, "h");
          $pos_min   = strpos($temp, "i");
          $pos_seg   = strpos($temp, "s");
          $pos_hora  = min($pos_hora, $pos_min, $pos_seg);
          $out_data  = trim(substr($temp, 0, $pos_hora));
          $out_hora  = trim(substr($temp, $pos_hora));
          $separador = strpos($this->tgl_pulang, " ") ; 
          $this->tgl_pulang_hora = substr($this->tgl_pulang, $separador + 1) ; 
          $this->tgl_pulang = substr($this->tgl_pulang, 0, $separador) ; 
          nm_conv_form_data($this->tgl_pulang, $out_data, $form_data, array($this->field_config['tgl_pulang']['date_sep'])) ;  
          nm_conv_form_hora($this->tgl_pulang_hora, $out_hora, $form_hora, array($this->field_config['tgl_pulang']['time_sep'])) ;  
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
      if ($this->tgl_masuk != "")  
      {
              $this->tgl_masuk .= $this->tgl_masuk_hora ; 
     nm_conv_form_data_hora($this->tgl_masuk, $this->field_config['tgl_masuk']['date_format'], "YYYY-MM-DD hh:mm:ss", array($this->field_config['tgl_masuk']['date_sep'], $this->field_config['tgl_masuk']['time_sep'])) ;  
      }
      if ($this->tgl_pulang != "")  
      {
              $this->tgl_pulang .= $this->tgl_pulang_hora ; 
     nm_conv_form_data_hora($this->tgl_pulang, $this->field_config['tgl_pulang']['date_format'], "YYYY-MM-DD hh:mm:ss", array($this->field_config['tgl_pulang']['date_sep'], $this->field_config['tgl_pulang']['time_sep'])) ;  
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
          $this->ajax_return_values_nomor_sep();
          $this->ajax_return_values_nomor_kartu();
          $this->ajax_return_values_tgl_masuk();
          $this->ajax_return_values_tgl_pulang();
          $this->ajax_return_values_jenis_rawat();
          $this->ajax_return_values_kelas_rawat();
          $this->ajax_return_values_adl_sub_acute();
          $this->ajax_return_values_adl_chronic();
          $this->ajax_return_values_icu_indikator();
          $this->ajax_return_values_icu_los();
          $this->ajax_return_values_ventilator_hour();
          $this->ajax_return_values_upgrade_class_ind();
          $this->ajax_return_values_upgrade_class_class();
          $this->ajax_return_values_upgrade_class_los();
          $this->ajax_return_values_add_payment_pct();
          $this->ajax_return_values_birth_weight();
          $this->ajax_return_values_discharge_status();
          $this->ajax_return_values_diagnosa();
          $this->ajax_return_values_procedure();
          $this->ajax_return_values_tarif_rs_prosedur_non_bedah();
          $this->ajax_return_values_tarif_rs_prosedur_bedah();
          $this->ajax_return_values_tarif_rs_konsultasi();
          $this->ajax_return_values_tarif_rs_tenaga_ahli();
          $this->ajax_return_values_tarif_rs_keperawatan();
          $this->ajax_return_values_tarif_rs_penunjang();
          $this->ajax_return_values_tarif_rs_radiologi();
          $this->ajax_return_values_tarif_rs_laboratorium();
          $this->ajax_return_values_tarif_rs_pelayanan_darah();
          $this->ajax_return_values_tarif_rs_rehabilitasi();
          $this->ajax_return_values_tarif_rs_kamar();
          $this->ajax_return_values_tarif_rs_rawat_intensif();
          $this->ajax_return_values_tarif_rs_obat();
          $this->ajax_return_values_tarif_rs_alkes();
          $this->ajax_return_values_tarif_rs_bmhp();
          $this->ajax_return_values_tarif_rs_sewa_alat();
          $this->ajax_return_values_tarif_poli_eks();
          $this->ajax_return_values_nama_dokter();
          $this->ajax_return_values_kode_tarif();
          $this->ajax_return_values_payor_id();
          $this->ajax_return_values_payor_cd();
          $this->ajax_return_values_cob_cd();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          }
   } // ajax_return_values

          //----- nomor_sep
   function ajax_return_values_nomor_sep($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nomor_sep", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nomor_sep);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nomor_sep'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- nomor_kartu
   function ajax_return_values_nomor_kartu($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nomor_kartu", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nomor_kartu);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nomor_kartu'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tgl_masuk
   function ajax_return_values_tgl_masuk($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tgl_masuk", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tgl_masuk);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tgl_masuk'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->tgl_masuk . ' ' . $this->tgl_masuk_hora),
              );
          }
   }

          //----- tgl_pulang
   function ajax_return_values_tgl_pulang($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tgl_pulang", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tgl_pulang);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tgl_pulang'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->tgl_pulang . ' ' . $this->tgl_pulang_hora),
              );
          }
   }

          //----- jenis_rawat
   function ajax_return_values_jenis_rawat($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("jenis_rawat", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->jenis_rawat);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['jenis_rawat'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- kelas_rawat
   function ajax_return_values_kelas_rawat($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("kelas_rawat", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->kelas_rawat);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['kelas_rawat'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- adl_sub_acute
   function ajax_return_values_adl_sub_acute($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("adl_sub_acute", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->adl_sub_acute);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['adl_sub_acute'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- adl_chronic
   function ajax_return_values_adl_chronic($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("adl_chronic", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->adl_chronic);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['adl_chronic'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- icu_indikator
   function ajax_return_values_icu_indikator($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("icu_indikator", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->icu_indikator);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['icu_indikator'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- icu_los
   function ajax_return_values_icu_los($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("icu_los", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->icu_los);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['icu_los'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- ventilator_hour
   function ajax_return_values_ventilator_hour($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ventilator_hour", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ventilator_hour);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ventilator_hour'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- upgrade_class_ind
   function ajax_return_values_upgrade_class_ind($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("upgrade_class_ind", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->upgrade_class_ind);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['upgrade_class_ind'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- upgrade_class_class
   function ajax_return_values_upgrade_class_class($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("upgrade_class_class", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->upgrade_class_class);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['upgrade_class_class'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- upgrade_class_los
   function ajax_return_values_upgrade_class_los($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("upgrade_class_los", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->upgrade_class_los);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['upgrade_class_los'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- add_payment_pct
   function ajax_return_values_add_payment_pct($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("add_payment_pct", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->add_payment_pct);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['add_payment_pct'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- birth_weight
   function ajax_return_values_birth_weight($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("birth_weight", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->birth_weight);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['birth_weight'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- discharge_status
   function ajax_return_values_discharge_status($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("discharge_status", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->discharge_status);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['discharge_status'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- diagnosa
   function ajax_return_values_diagnosa($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("diagnosa", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->diagnosa);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['diagnosa'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- procedure
   function ajax_return_values_procedure($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("procedure", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->procedure);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['procedure'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tarif_rs_prosedur_non_bedah
   function ajax_return_values_tarif_rs_prosedur_non_bedah($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tarif_rs_prosedur_non_bedah", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tarif_rs_prosedur_non_bedah);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tarif_rs_prosedur_non_bedah'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tarif_rs_prosedur_bedah
   function ajax_return_values_tarif_rs_prosedur_bedah($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tarif_rs_prosedur_bedah", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tarif_rs_prosedur_bedah);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tarif_rs_prosedur_bedah'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tarif_rs_konsultasi
   function ajax_return_values_tarif_rs_konsultasi($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tarif_rs_konsultasi", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tarif_rs_konsultasi);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tarif_rs_konsultasi'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tarif_rs_tenaga_ahli
   function ajax_return_values_tarif_rs_tenaga_ahli($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tarif_rs_tenaga_ahli", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tarif_rs_tenaga_ahli);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tarif_rs_tenaga_ahli'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tarif_rs_keperawatan
   function ajax_return_values_tarif_rs_keperawatan($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tarif_rs_keperawatan", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tarif_rs_keperawatan);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tarif_rs_keperawatan'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tarif_rs_penunjang
   function ajax_return_values_tarif_rs_penunjang($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tarif_rs_penunjang", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tarif_rs_penunjang);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tarif_rs_penunjang'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tarif_rs_radiologi
   function ajax_return_values_tarif_rs_radiologi($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tarif_rs_radiologi", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tarif_rs_radiologi);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tarif_rs_radiologi'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tarif_rs_laboratorium
   function ajax_return_values_tarif_rs_laboratorium($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tarif_rs_laboratorium", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tarif_rs_laboratorium);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tarif_rs_laboratorium'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tarif_rs_pelayanan_darah
   function ajax_return_values_tarif_rs_pelayanan_darah($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tarif_rs_pelayanan_darah", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tarif_rs_pelayanan_darah);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tarif_rs_pelayanan_darah'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tarif_rs_rehabilitasi
   function ajax_return_values_tarif_rs_rehabilitasi($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tarif_rs_rehabilitasi", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tarif_rs_rehabilitasi);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tarif_rs_rehabilitasi'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tarif_rs_kamar
   function ajax_return_values_tarif_rs_kamar($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tarif_rs_kamar", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tarif_rs_kamar);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tarif_rs_kamar'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tarif_rs_rawat_intensif
   function ajax_return_values_tarif_rs_rawat_intensif($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tarif_rs_rawat_intensif", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tarif_rs_rawat_intensif);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tarif_rs_rawat_intensif'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tarif_rs_obat
   function ajax_return_values_tarif_rs_obat($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tarif_rs_obat", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tarif_rs_obat);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tarif_rs_obat'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tarif_rs_alkes
   function ajax_return_values_tarif_rs_alkes($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tarif_rs_alkes", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tarif_rs_alkes);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tarif_rs_alkes'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tarif_rs_bmhp
   function ajax_return_values_tarif_rs_bmhp($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tarif_rs_bmhp", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tarif_rs_bmhp);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tarif_rs_bmhp'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tarif_rs_sewa_alat
   function ajax_return_values_tarif_rs_sewa_alat($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tarif_rs_sewa_alat", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tarif_rs_sewa_alat);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tarif_rs_sewa_alat'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tarif_poli_eks
   function ajax_return_values_tarif_poli_eks($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tarif_poli_eks", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tarif_poli_eks);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tarif_poli_eks'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- nama_dokter
   function ajax_return_values_nama_dokter($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nama_dokter", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nama_dokter);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nama_dokter'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- kode_tarif
   function ajax_return_values_kode_tarif($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("kode_tarif", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->kode_tarif);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['kode_tarif'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- payor_id
   function ajax_return_values_payor_id($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("payor_id", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->payor_id);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['payor_id'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- payor_cd
   function ajax_return_values_payor_cd($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("payor_cd", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->payor_cd);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['payor_cd'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- cob_cd
   function ajax_return_values_cob_cd($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cob_cd", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cob_cd);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cob_cd'] = array(
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['upload_dir'][$fieldName][] = $newName;
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
function config_param()
{
$_SESSION['scriptcase']['form_eclaim_klaim_update_data']['contr_erro'] = 'on';
  
	$config = array();
	$config['cons_id'] 	  			= '11372';
	$config['secret_key'] 			= '5lM9AC0DCF';
	$config['app_user'] 			= 'Aulia_admin';
	$config['vclaim_api_url'] 		= 'http://api.bpjs-kesehatan.go.id:8080/vclaim-rest/';
	$config['vclaim_aplicare_url'] 	= 'http://api.bpjs-kesehatan.go.id/aplicaresws/';
	$config['eklaim_key'] 			= 'a566bfdd0740444b0372e40045e1ad2c1acbda8fe7fd9e0f9690c5769595e438';
	$config['eklaim_api_url'] 		= 'http://192.168.1.73/E-Klaim/ws.php';
	$config['coder_nik'] 			= '123123123123';
	return $config;

$_SESSION['scriptcase']['form_eclaim_klaim_update_data']['contr_erro'] = 'off';
}
function inacbg_encrypt($data, $key){
$_SESSION['scriptcase']['form_eclaim_klaim_update_data']['contr_erro'] = 'on';
  
		$key = hex2bin($key);
		
		if (mb_strlen($key, "8bit") !== 32) {
			throw new Exception("Needs a 256-bit key!");
		}
		
		$iv_size = openssl_cipher_iv_length("aes-256-cbc");
		$iv = openssl_random_pseudo_bytes($iv_size); 
		
		$encrypted = openssl_encrypt($data,"aes-256-cbc",$key,OPENSSL_RAW_DATA,$iv);
		
		$signature = mb_substr(hash_hmac("sha256",$encrypted,$key,true),0,10,"8bit");
		
		$encoded = chunk_split(base64_encode($signature.$iv.$encrypted));
		
		return $encoded;

$_SESSION['scriptcase']['form_eclaim_klaim_update_data']['contr_erro'] = 'off';
}
function inacbg_decrypt($str, $strkey){
$_SESSION['scriptcase']['form_eclaim_klaim_update_data']['contr_erro'] = 'on';
  
		$key = hex2bin($strkey);
		
		if (mb_strlen($key, "8bit") !== 32) {
			throw new Exception("Needs a 256-bit key!");
		}
		
		$iv_size = openssl_cipher_iv_length("aes-256-cbc");
		
		$decoded = base64_decode($str);
		$signature = mb_substr($decoded,0,10,"8bit");
		$iv = mb_substr($decoded,10,$iv_size,"8bit");
		$encrypted = mb_substr($decoded,$iv_size+10,NULL,"8bit");
		
		$calc_signature = mb_substr(hash_hmac("sha256",$encrypted,$key,true),0,10,"8bit");
		if(!$this->inacbg_compare($signature,$calc_signature)) {
			return "SIGNATURE_NOT_MATCH"; 
		}
		$decrypted = openssl_decrypt($encrypted,"aes-256-cbc",$key,OPENSSL_RAW_DATA,$iv);
		
		return $decrypted;

$_SESSION['scriptcase']['form_eclaim_klaim_update_data']['contr_erro'] = 'off';
}
function inacbg_compare($a, $b){
$_SESSION['scriptcase']['form_eclaim_klaim_update_data']['contr_erro'] = 'on';
  
		if (strlen($a) !== strlen($b)) return false;

		$result = 0;
		for($i = 0; $i < strlen($a); $i ++) {
			$result |= ord($a[$i]) ^ ord($b[$i]);
		}

		return $result == 0;

$_SESSION['scriptcase']['form_eclaim_klaim_update_data']['contr_erro'] = 'off';
}
function post_request($json_request, $key, $conf_url){
$_SESSION['scriptcase']['form_eclaim_klaim_update_data']['contr_erro'] = 'on';
  
	
	$payload = $this->inacbg_encrypt($json_request,$key);
	$header = array("Content-Type: application/x-www-form-urlencoded");
	$url = $conf_url;
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
	$response = curl_exec($ch);
	
	$first = strpos($response, "\n")+1;
	$last = strrpos($response, "\n")-1;
	$response = substr($response, $first, strlen($response) - $first - $last);

	$response = $this->inacbg_decrypt($response,$key);
	return 	$response;
	

$_SESSION['scriptcase']['form_eclaim_klaim_update_data']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_eclaim_klaim_update_data_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['retorno_edit'] . "';";
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
    include_once("form_eclaim_klaim_update_data_form0.php");
        $this->hideFormPages();
 }

        function initFormPages() {
        } // initFormPages

        function hideFormPages() {
        } // hideFormPages

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['csrf_token'];
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
       $nmgp_saida_form = "form_eclaim_klaim_update_data_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_eclaim_klaim_update_data_fim.php";
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
       form_eclaim_klaim_update_data_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['masterValue']);
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
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data'][substr($val, 1, -1)];
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
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_eclaim_klaim_update_data']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           form_eclaim_klaim_update_data_pack_ajax_response();
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
       form_eclaim_klaim_update_data_pack_ajax_response();
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
