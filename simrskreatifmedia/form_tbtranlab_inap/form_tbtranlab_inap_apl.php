<?php
//
class form_tbtranlab_inap_apl
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
   var $note;
   var $trandate;
   var $trandate_hora;
   var $enterdate;
   var $enterdate_hora;
   var $status;
   var $status_1;
   var $finishdate;
   var $finishdate_hora;
   var $keterangan;
   var $deleted;
   var $tlc;
   var $custtlc;
   var $poli;
   var $poli_1;
   var $diag;
   var $jalancode;
   var $takendate;
   var $takendate_hora;
   var $takenby;
   var $takenreason;
   var $periksaname;
   var $instcode;
   var $instcode_1;
   var $jenisinst;
   var $proyeksidate;
   var $proyeksidate_hora;
   var $inapclass;
   var $penjamin;
   var $pasien;
   var $ageyear;
   var $agemonth;
   var $ageday;
   var $custage;
   var $urutno;
   var $ispl;
   var $plcode;
   var $plname;
   var $plsex;
   var $petugas;
   var $extcodelist;
   var $asal;
   var $asallayanan;
   var $sep;
   var $kelompoktarif;
   var $sc_field_0;
   var $sc_field_0_1;
   var $sc_field_1;
   var $sc_field_1_1;
   var $alamat;
   var $detaillab;
   var $hasillab;
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
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['custage']))
          {
              $this->custage = $this->NM_ajax_info['param']['custage'];
          }
          if (isset($this->NM_ajax_info['param']['custcode']))
          {
              $this->custcode = $this->NM_ajax_info['param']['custcode'];
          }
          if (isset($this->NM_ajax_info['param']['detaillab']))
          {
              $this->detaillab = $this->NM_ajax_info['param']['detaillab'];
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
          if (isset($this->NM_ajax_info['param']['finishdate']))
          {
              $this->finishdate = $this->NM_ajax_info['param']['finishdate'];
          }
          if (isset($this->NM_ajax_info['param']['finishdate_hora']))
          {
              $this->finishdate_hora = $this->NM_ajax_info['param']['finishdate_hora'];
          }
          if (isset($this->NM_ajax_info['param']['hasillab']))
          {
              $this->hasillab = $this->NM_ajax_info['param']['hasillab'];
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
          if (isset($this->NM_ajax_info['param']['plname']))
          {
              $this->plname = $this->NM_ajax_info['param']['plname'];
          }
          if (isset($this->NM_ajax_info['param']['poli']))
          {
              $this->poli = $this->NM_ajax_info['param']['poli'];
          }
          if (isset($this->NM_ajax_info['param']['proyeksidate']))
          {
              $this->proyeksidate = $this->NM_ajax_info['param']['proyeksidate'];
          }
          if (isset($this->NM_ajax_info['param']['proyeksidate_hora']))
          {
              $this->proyeksidate_hora = $this->NM_ajax_info['param']['proyeksidate_hora'];
          }
          if (isset($this->NM_ajax_info['param']['sc_field_0']))
          {
              $this->sc_field_0 = $this->NM_ajax_info['param']['sc_field_0'];
          }
          if (isset($this->NM_ajax_info['param']['sc_field_1']))
          {
              $this->sc_field_1 = $this->NM_ajax_info['param']['sc_field_1'];
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
          if (isset($this->NM_ajax_info['param']['trandate_hora']))
          {
              $this->trandate_hora = $this->NM_ajax_info['param']['trandate_hora'];
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
      $this->sc_conv_var['j/k'] = "sc_field_0";
      $this->sc_conv_var['nama pasien'] = "sc_field_1";
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
      if (isset($_SESSION['sc_session'][$script_case_init]['form_tbtranlab_inap']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_tbtranlab_inap']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_tbtranlab_inap']['embutida_parms']);
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
                 nm_limpa_str_form_tbtranlab_inap($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_tbtranlab_inap']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_tbtranlab_inap']['total']);
          }
          if (!isset($_SESSION['sc_session'][$script_case_init]['form_tbtranlab_inap']['total']))
          {
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_tbtranlab_inap']['form_tbdetaillab_script_case_init'] ]['form_tbdetaillab']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_tbtranlab_inap']['form_tbdetaillab_script_case_init'] ]['form_tbdetaillab']['total']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_tbtranlab_inap']['form_tbhasillab_script_case_init'] ]['form_tbhasillab']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_tbtranlab_inap']['form_tbhasillab_script_case_init'] ]['form_tbhasillab']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_tbtranlab_inap']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_tbtranlab_inap']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_tbtranlab_inap']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_tbtranlab_inap']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_tbtranlab_inap']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_tbtranlab_inap']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_tbtranlab_inap']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_tbtranlab_inap']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_tbtranlab_inap']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_tbtranlab_inap']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_tbtranlab_inap']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_tbtranlab_inap']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_tbtranlab_inap_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("id");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("id");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_tbtranlab_inap']['upload_field_info'] = array();

      $this->Ini->Init_apl_lig = array();
      $this->List_apl_lig = array('pdfreport_tbhasillab'=>array('type'=>'reportpdf', 'lab'=>'Hasil Laboratorium', 'hint'=>'', 'img_on'=>'', 'img_off'=>''));
      if (isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['sc_outra_jan'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['sc_modal']))
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_tbtranlab_inap']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_tbtranlab_inap'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_tbtranlab_inap']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_tbtranlab_inap']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_tbtranlab_inap') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_tbtranlab_inap']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " Cek Lab";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_tbtranlab_inap")
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
      $this->arr_buttons['sc_btn_0']['value']            = "Cetak Hasil Lab";
      $this->arr_buttons['sc_btn_0']['display']          = "only_text";
      $this->arr_buttons['sc_btn_0']['display_position'] = "text_right";
      $this->arr_buttons['sc_btn_0']['style']            = "default";
      $this->arr_buttons['sc_btn_0']['image']            = "";

      $this->arr_buttons['batal']['hint']             = "";
      $this->arr_buttons['batal']['type']             = "button";
      $this->arr_buttons['batal']['value']            = "Batal";
      $this->arr_buttons['batal']['display']          = "only_text";
      $this->arr_buttons['batal']['display_position'] = "text_right";
      $this->arr_buttons['batal']['style']            = "default";
      $this->arr_buttons['batal']['image']            = "";

      $this->arr_buttons['sc_btn_1']['hint']             = "";
      $this->arr_buttons['sc_btn_1']['type']             = "button";
      $this->arr_buttons['sc_btn_1']['value']            = "Cetak Hasil New !";
      $this->arr_buttons['sc_btn_1']['display']          = "text_fontawesomeicon";
      $this->arr_buttons['sc_btn_1']['display_position'] = "text_right";
      $this->arr_buttons['sc_btn_1']['style']            = "default";
      $this->arr_buttons['sc_btn_1']['image']            = "";
      $this->arr_buttons['sc_btn_1']['has_fa']            = "true";
      $this->arr_buttons['sc_btn_1']['fontawesomeicon']            = "fas fa-paperclip";

      $this->arr_buttons['sc_btn_2']['hint']             = "";
      $this->arr_buttons['sc_btn_2']['type']             = "button";
      $this->arr_buttons['sc_btn_2']['value']            = "Cetak Label";
      $this->arr_buttons['sc_btn_2']['display']          = "text_fontawesomeicon";
      $this->arr_buttons['sc_btn_2']['display_position'] = "text_right";
      $this->arr_buttons['sc_btn_2']['style']            = "default";
      $this->arr_buttons['sc_btn_2']['image']            = "";
      $this->arr_buttons['sc_btn_2']['has_fa']            = "true";
      $this->arr_buttons['sc_btn_2']['fontawesomeicon']            = "fas fa-tag";


      $_SESSION['scriptcase']['error_icon']['form_tbtranlab_inap']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_tbtranlab_inap'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranlab_inap']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_tbtranlab_inap']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranlab_inap']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_tbtranlab_inap']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranlab_inap']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_tbtranlab_inap']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['qsearch'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      $this->nmgp_botoes['summary'] = "on";
      $this->nmgp_botoes['navpage'] = "on";
      $this->nmgp_botoes['goto'] = "on";
      $this->nmgp_botoes['qtline'] = "off";
      $this->nmgp_botoes['sc_btn_0'] = "on";
      $this->nmgp_botoes['Batal'] = "on";
      $this->nmgp_botoes['sc_btn_1'] = "on";
      $this->nmgp_botoes['sc_btn_2'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranlab_inap']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranlab_inap']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranlab_inap']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbtranlab_inap']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_tbtranlab_inap'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_tbtranlab_inap'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranlab_inap']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbtranlab_inap']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_tbtranlab_inap']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbtranlab_inap']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranlab_inap']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbtranlab_inap']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbtranlab_inap']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranlab_inap']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbtranlab_inap']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbtranlab_inap']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranlab_inap']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranlab_inap']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranlab_inap']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranlab_inap']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranlab_inap']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranlab_inap']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranlab_inap']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbtranlab_inap']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_tbtranlab_inap']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_form'];
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['trancode'] != "null"){$this->trancode = $this->nmgp_dados_form['trancode'];} 
          if (!isset($this->source)){$this->source = $this->nmgp_dados_form['source'];} 
          if (!isset($this->enterdate)){$this->enterdate = $this->nmgp_dados_form['enterdate'];} 
          if (!isset($this->keterangan)){$this->keterangan = $this->nmgp_dados_form['keterangan'];} 
          if (!isset($this->deleted)){$this->deleted = $this->nmgp_dados_form['deleted'];} 
          if (!isset($this->tlc)){$this->tlc = $this->nmgp_dados_form['tlc'];} 
          if (!isset($this->custtlc)){$this->custtlc = $this->nmgp_dados_form['custtlc'];} 
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['diag'] != "null"){$this->diag = $this->nmgp_dados_form['diag'];} 
          if (!isset($this->jalancode)){$this->jalancode = $this->nmgp_dados_form['jalancode'];} 
          if (!isset($this->takendate)){$this->takendate = $this->nmgp_dados_form['takendate'];} 
          if (!isset($this->takenby)){$this->takenby = $this->nmgp_dados_form['takenby'];} 
          if (!isset($this->takenreason)){$this->takenreason = $this->nmgp_dados_form['takenreason'];} 
          if (!isset($this->periksaname)){$this->periksaname = $this->nmgp_dados_form['periksaname'];} 
          if (!isset($this->jenisinst)){$this->jenisinst = $this->nmgp_dados_form['jenisinst'];} 
          if (!isset($this->inapclass)){$this->inapclass = $this->nmgp_dados_form['inapclass'];} 
          if (!isset($this->penjamin)){$this->penjamin = $this->nmgp_dados_form['penjamin'];} 
          if (!isset($this->pasien)){$this->pasien = $this->nmgp_dados_form['pasien'];} 
          if (!isset($this->ageyear)){$this->ageyear = $this->nmgp_dados_form['ageyear'];} 
          if (!isset($this->agemonth)){$this->agemonth = $this->nmgp_dados_form['agemonth'];} 
          if (!isset($this->ageday)){$this->ageday = $this->nmgp_dados_form['ageday'];} 
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['custage'] != "null"){$this->custage = $this->nmgp_dados_form['custage'];} 
          if (!isset($this->urutno)){$this->urutno = $this->nmgp_dados_form['urutno'];} 
          if (!isset($this->ispl)){$this->ispl = $this->nmgp_dados_form['ispl'];} 
          if (!isset($this->plcode)){$this->plcode = $this->nmgp_dados_form['plcode'];} 
          if (!isset($this->plsex)){$this->plsex = $this->nmgp_dados_form['plsex'];} 
          if (!isset($this->petugas)){$this->petugas = $this->nmgp_dados_form['petugas'];} 
          if (!isset($this->extcodelist)){$this->extcodelist = $this->nmgp_dados_form['extcodelist'];} 
          if (!isset($this->asal)){$this->asal = $this->nmgp_dados_form['asal'];} 
          if (!isset($this->asallayanan)){$this->asallayanan = $this->nmgp_dados_form['asallayanan'];} 
          if (!isset($this->sep)){$this->sep = $this->nmgp_dados_form['sep'];} 
          if (!isset($this->kelompoktarif)){$this->kelompoktarif = $this->nmgp_dados_form['kelompoktarif'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_tbtranlab_inap", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'form_tbtranlab_inap/form_tbtranlab_inap_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_tbtranlab_inap_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_tbtranlab_inap_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_tbtranlab_inap_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_tbtranlab_inap/form_tbtranlab_inap_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_tbtranlab_inap_erro.class.php"); 
      }
      $this->Erro      = new form_tbtranlab_inap_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['opcao']))
         { 
             if ($this->id != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranlab_inap']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbtranlab_inap']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_tbtranlab_inap']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['sc_btn_0'] = "off";
          $this->nmgp_botoes['Batal'] = "off";
          $this->nmgp_botoes['sc_btn_1'] = "off";
          $this->nmgp_botoes['sc_btn_2'] = "off";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['sc_btn_0'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['botoes']['sc_btn_0'];
          $this->nmgp_botoes['Batal'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['botoes']['Batal'];
          $this->nmgp_botoes['sc_btn_1'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['botoes']['sc_btn_1'];
          $this->nmgp_botoes['sc_btn_2'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['botoes']['sc_btn_2'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_form'];
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
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['form_tbdetaillab_script_case_init'] ]['form_tbdetaillab']['embutida_form'] = false;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['form_tbdetaillab_script_case_init'] ]['form_tbdetaillab']['embutida_proc'] = true;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['form_tbdetaillab_script_case_init'] ]['form_tbdetaillab']['reg_start'] = "";
          unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['form_tbdetaillab_script_case_init'] ]['form_tbdetaillab']['total']);
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbdetaillab') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbdetaillab') . "/form_tbdetaillab_apl.php");
          $this->form_tbdetaillab = new form_tbdetaillab_apl;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['form_tbhasillab_script_case_init'] ]['form_tbhasillab']['embutida_form'] = false;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['form_tbhasillab_script_case_init'] ]['form_tbhasillab']['embutida_proc'] = true;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['form_tbhasillab_script_case_init'] ]['form_tbhasillab']['reg_start'] = "";
          unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['form_tbhasillab_script_case_init'] ]['form_tbhasillab']['total']);
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbhasillab') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_tbhasillab') . "/form_tbhasillab_apl.php");
          $this->form_tbhasillab = new form_tbhasillab_apl;
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
      if (isset($this->poli)) { $this->nm_limpa_alfa($this->poli); }
      if (isset($this->diag)) { $this->nm_limpa_alfa($this->diag); }
      if (isset($this->instcode)) { $this->nm_limpa_alfa($this->instcode); }
      if (isset($this->custage)) { $this->nm_limpa_alfa($this->custage); }
      if (isset($this->plname)) { $this->nm_limpa_alfa($this->plname); }
      if (isset($this->detaillab)) { $this->nm_limpa_alfa($this->detaillab); }
      if (isset($this->hasillab)) { $this->nm_limpa_alfa($this->hasillab); }
      if ($nm_opc_form_php == "formphp")
      { 
          if ($nm_call_php == "Batal")
          { 
              $this->sc_btn_Batal();
          } 
          $this->NM_close_db(); 
          exit;
      } 
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_select'];
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
      $this->field_config['trandate']['date_display'] = "ddmmaaaa;hhii";
      $this->new_date_format('DH', 'trandate');
      //-- proyeksidate
      $this->field_config['proyeksidate']                 = array();
      $this->field_config['proyeksidate']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['proyeksidate']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['proyeksidate']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['proyeksidate']['date_display'] = "ddmmaaaa;hhii";
      $this->new_date_format('DH', 'proyeksidate');
      //-- finishdate
      $this->field_config['finishdate']                 = array();
      $this->field_config['finishdate']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['finishdate']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['finishdate']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['finishdate']['date_display'] = "ddmmaaaa;hhii";
      $this->new_date_format('DH', 'finishdate');
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
      //-- deleted
      $this->field_config['deleted']               = array();
      $this->field_config['deleted']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['deleted']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['deleted']['symbol_dec'] = '';
      $this->field_config['deleted']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['deleted']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- takendate
      $this->field_config['takendate']                 = array();
      $this->field_config['takendate']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['takendate']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['takendate']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['takendate']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'takendate');
      //-- penjamin
      $this->field_config['penjamin']               = array();
      $this->field_config['penjamin']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['penjamin']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['penjamin']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['penjamin']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['penjamin']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- pasien
      $this->field_config['pasien']               = array();
      $this->field_config['pasien']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['pasien']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['pasien']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['pasien']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['pasien']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ageyear
      $this->field_config['ageyear']               = array();
      $this->field_config['ageyear']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ageyear']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ageyear']['symbol_dec'] = '';
      $this->field_config['ageyear']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ageyear']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- agemonth
      $this->field_config['agemonth']               = array();
      $this->field_config['agemonth']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['agemonth']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['agemonth']['symbol_dec'] = '';
      $this->field_config['agemonth']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['agemonth']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ageday
      $this->field_config['ageday']               = array();
      $this->field_config['ageday']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ageday']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ageday']['symbol_dec'] = '';
      $this->field_config['ageday']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ageday']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ispl
      $this->field_config['ispl']               = array();
      $this->field_config['ispl']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ispl']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ispl']['symbol_dec'] = '';
      $this->field_config['ispl']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ispl']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
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
          if ('validate_custcode' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'custcode');
          }
          if ('validate_instcode' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'instcode');
          }
          if ('validate_struk' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'struk');
          }
          if ('validate_trandate' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'trandate');
          }
          if ('validate_proyeksidate' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'proyeksidate');
          }
          if ('validate_sc_field_1' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sc_field_1');
          }
          if ('validate_sc_field_0' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sc_field_0');
          }
          if ('validate_custage' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'custage');
          }
          if ('validate_alamat' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'alamat');
          }
          if ('validate_poli' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'poli');
          }
          if ('validate_doccode' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'doccode');
          }
          if ('validate_docname' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'docname');
          }
          if ('validate_plname' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'plname');
          }
          if ('validate_diag' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'diag');
          }
          if ('validate_note' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'note');
          }
          if ('validate_finishdate' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'finishdate');
          }
          if ('validate_status' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'status');
          }
          if ('validate_detaillab' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'detaillab');
          }
          if ('validate_hasillab' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'hasillab');
          }
          form_tbtranlab_inap_pack_ajax_response();
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
          form_tbtranlab_inap_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_select']['trancode']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->trancode = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_select']['trancode'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_select']['custcode']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->custcode = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_select']['custcode'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_select']['instcode']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->instcode = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_select']['instcode'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_select']['struk']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->struk = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_select']['struk'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_select']['sc_field_1']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->sc_field_1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_select']['sc_field_1'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_select']['sc_field_0']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->sc_field_0 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_select']['sc_field_0'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_select']['custage']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->custage = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_select']['custage'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_select']['alamat']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->alamat = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_select']['alamat'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_select']['poli']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->poli = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_select']['poli'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_select']['doccode']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->doccode = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_select']['doccode'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_select']['docname']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->docname = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_select']['docname'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_select']['diag']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->diag = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_select']['diag'];
          } 
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_tbtranlab_inap_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_tbtranlab_inap']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_tbtranlab_inap_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['sc_redir_atualiz'] == "ok")
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
          form_tbtranlab_inap_pack_ajax_response();
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
          form_tbtranlab_inap_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_tbtranlab_inap.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " Cek Lab") ?></TITLE>
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
<form name="Fdown" method="get" action="form_tbtranlab_inap_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_tbtranlab_inap"> 
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
   function sc_btn_Batal() 
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;
 
     ob_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
 <head>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

      if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
      {
?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
      }

?>
        <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
    <SCRIPT type="text/javascript">
      var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
      var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
      var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
      var sc_userSweetAlertDisplayed = false;
    </SCRIPT>
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
<?php
include_once("form_tbtranlab_inap_sajax_js.php");
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>
 <script type="text/javascript" src="../_lib/lib/js/frameControl.js"></script>
    <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
    <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
  <?php 
  if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
  { 
  ?> 
  <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
  <?php 
  } 
  ?> 
 </head>
  <body class="scFormPage">
      <table class="scFormTabela" align="center"><tr><td>
<?php
      $varloc_btn_php = array();
      $nmgp_opcao_saida_php = "igual";
      $nmgp_opc_ant_saida_php = "";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['opc_ant'] == "novo" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['opc_ant'] == "incluir")
      {
          $nmgp_opc_ant_saida_php = "novo";
          $nmgp_opcao_saida_php   = "recarga";
      }
      else
      {
          if (!isset($this->trancode) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_form']['trancode']))
          {
              $varloc_btn_php['trancode'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_form']['trancode'];
          }
      }
      $nm_f_saida = "./";
      nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      nm_limpa_data($this->trandate, $this->field_config['trandate']['date_sep']) ; 
      nm_limpa_hora($this->trandate_hora, $this->field_config['trandate']['time_sep']) ; 
      nm_limpa_data($this->proyeksidate, $this->field_config['proyeksidate']['date_sep']) ; 
      nm_limpa_hora($this->proyeksidate_hora, $this->field_config['proyeksidate']['time_sep']) ; 
      nm_limpa_data($this->finishdate, $this->field_config['finishdate']['date_sep']) ; 
      nm_limpa_hora($this->finishdate_hora, $this->field_config['finishdate']['time_sep']) ; 
      $this->nm_converte_datas();
      foreach ($varloc_btn_php as $cmp => $val_cmp)
      {
          $this->$cmp = $val_cmp;
      }
      $_SESSION['scriptcase']['form_tbtranlab_inap']['contr_erro'] = 'on';
  $update_table  = 'tbtranlab';      
$update_where  = "trancode = '$this->trancode'"; 
$update_fields = array(   
     "deleted = 'Y'",
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
                form_tbtranlab_inap_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
$_SESSION['scriptcase']['form_tbtranlab_inap']['contr_erro'] = 'off'; 
    echo ob_get_clean();
?>
      </td></tr><tr><td align="center">
      <form name="FPHP" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value=""/>
      <input type=hidden name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"/>
      <input type=hidden name="script_case_session" value="<?php  echo $this->form_encode_input(session_id()); ?>"/>
      <input type=hidden name="id" value="<?php echo $this->form_encode_input($this->id) ?>"/>
      <input type=hidden name="nmgp_opcao" value="<?php echo $this->form_encode_input($nmgp_opcao_saida_php); ?>"/>
      <input type=hidden name="nmgp_opc_ant" value="<?php echo $this->form_encode_input($nmgp_opc_ant_saida_php); ?>"/>
      <input type=submit name="nmgp_bok" value="<?php echo $this->Ini->Nm_lang['lang_btns_cfrm'] ?>"/>
      </form>
      </td></tr></table>
      </body>
      </html>
<?php
       if (isset($this->redir_modal) && !empty($this->redir_modal))
       {
           echo "<script type=\"text/javascript\">" . $this->redir_modal . "</script>";
           $this->redir_modal = "";
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
           case 'custcode':
               return "Rekam Medis";
               break;
           case 'instcode':
               return "Inst Penjamin";
               break;
           case 'struk':
               return "No. Struk";
               break;
           case 'trandate':
               return "Tgl. Transaksi";
               break;
           case 'proyeksidate':
               return "Waktu Perkiraan";
               break;
           case 'sc_field_1':
               return "Nama Pasien";
               break;
           case 'sc_field_0':
               return "J/K";
               break;
           case 'custage':
               return "Umur";
               break;
           case 'alamat':
               return "Alamat";
               break;
           case 'poli':
               return "Poli";
               break;
           case 'doccode':
               return "Kode Dokter";
               break;
           case 'docname':
               return "Nama Dokter";
               break;
           case 'plname':
               return "Dokter Eksternal";
               break;
           case 'diag':
               return "Diagnosa";
               break;
           case 'note':
               return "Catatan";
               break;
           case 'finishdate':
               return "Tgl. Selesai";
               break;
           case 'status':
               return "Status";
               break;
           case 'detaillab':
               return "";
               break;
           case 'hasillab':
               return "";
               break;
           case 'source':
               return "Source";
               break;
           case 'enterdate':
               return "Tgl. Masuk";
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
               return "Kode RJ";
               break;
           case 'takendate':
               return "Takendate";
               break;
           case 'takenby':
               return "Takenby";
               break;
           case 'takenreason':
               return "Takenreason";
               break;
           case 'periksaname':
               return "Nama Pemeriksaan";
               break;
           case 'jenisinst':
               return "Jenis Penjamin";
               break;
           case 'inapclass':
               return "Kelas Inap";
               break;
           case 'penjamin':
               return "Penjamin";
               break;
           case 'pasien':
               return "Pasien";
               break;
           case 'ageyear':
               return "Tahun Lahir";
               break;
           case 'agemonth':
               return "Bulan Lahir";
               break;
           case 'ageday':
               return "Tgl. Lahir";
               break;
           case 'urutno':
               return "Urutno";
               break;
           case 'ispl':
               return "Ispl";
               break;
           case 'plcode':
               return "Plcode";
               break;
           case 'plsex':
               return "Plsex";
               break;
           case 'petugas':
               return "Petugas";
               break;
           case 'extcodelist':
               return "Extcodelist";
               break;
           case 'asal':
               return "Asal";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_tbtranlab_inap']) || !is_array($this->NM_ajax_info['errList']['geral_form_tbtranlab_inap']))
              {
                  $this->NM_ajax_info['errList']['geral_form_tbtranlab_inap'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_tbtranlab_inap'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'id' == $filtro)
        $this->ValidateField_id($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'trancode' == $filtro)
        $this->ValidateField_trancode($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'inapcode' == $filtro)
        $this->ValidateField_inapcode($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'custcode' == $filtro)
        $this->ValidateField_custcode($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'instcode' == $filtro)
        $this->ValidateField_instcode($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'struk' == $filtro)
        $this->ValidateField_struk($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'trandate' == $filtro)
        $this->ValidateField_trandate($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'proyeksidate' == $filtro)
        $this->ValidateField_proyeksidate($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sc_field_1' == $filtro)
        $this->ValidateField_sc_field_1($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sc_field_0' == $filtro)
        $this->ValidateField_sc_field_0($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'custage' == $filtro)
        $this->ValidateField_custage($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'alamat' == $filtro)
        $this->ValidateField_alamat($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'poli' == $filtro)
        $this->ValidateField_poli($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'doccode' == $filtro)
        $this->ValidateField_doccode($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'docname' == $filtro)
        $this->ValidateField_docname($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'plname' == $filtro)
        $this->ValidateField_plname($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'diag' == $filtro)
        $this->ValidateField_diag($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'note' == $filtro)
        $this->ValidateField_note($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'finishdate' == $filtro)
        $this->ValidateField_finishdate($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'status' == $filtro)
        $this->ValidateField_status($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'detaillab' == $filtro)
        $this->ValidateField_detaillab($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'hasillab' == $filtro)
        $this->ValidateField_hasillab($Campos_Crit, $Campos_Falta, $Campos_Erros);
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
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['php_cmp_required']['inapcode']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['php_cmp_required']['inapcode'] == "on")) 
      { 
          if ($this->inapcode == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Kode Inap" ; 
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

    function ValidateField_custcode(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->custcode) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_custcode']) && !in_array($this->custcode, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_custcode']))
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
               if (!empty($this->instcode) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_instcode']) && !in_array($this->instcode, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_instcode']))
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

    function ValidateField_struk(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->struk) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_struk']) && !in_array($this->struk, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_struk']))
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
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['php_cmp_required']['trandate']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['php_cmp_required']['trandate'] == "on") 
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
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['php_cmp_required']['trandate_hora']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['php_cmp_required']['trandate_hora'] == "on") 
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
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'trandate_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_trandate_hora

    function ValidateField_proyeksidate(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->proyeksidate, $this->field_config['proyeksidate']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['proyeksidate']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['proyeksidate']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['proyeksidate']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['proyeksidate']['date_sep']) ; 
          if (trim($this->proyeksidate) != "")  
          { 
              if ($teste_validade->Data($this->proyeksidate, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Waktu Perkiraan; " ; 
                  if (!isset($Campos_Erros['proyeksidate']))
                  {
                      $Campos_Erros['proyeksidate'] = array();
                  }
                  $Campos_Erros['proyeksidate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['proyeksidate']) || !is_array($this->NM_ajax_info['errList']['proyeksidate']))
                  {
                      $this->NM_ajax_info['errList']['proyeksidate'] = array();
                  }
                  $this->NM_ajax_info['errList']['proyeksidate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['proyeksidate']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'proyeksidate';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->proyeksidate_hora, $this->field_config['proyeksidate_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['proyeksidate_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['proyeksidate_hora']['time_sep']) ; 
          if (trim($this->proyeksidate_hora) != "")  
          { 
              if ($teste_validade->Hora($this->proyeksidate_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Waktu Perkiraan; " ; 
                  if (!isset($Campos_Erros['proyeksidate_hora']))
                  {
                      $Campos_Erros['proyeksidate_hora'] = array();
                  }
                  $Campos_Erros['proyeksidate_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['proyeksidate']) || !is_array($this->NM_ajax_info['errList']['proyeksidate']))
                  {
                      $this->NM_ajax_info['errList']['proyeksidate'] = array();
                  }
                  $this->NM_ajax_info['errList']['proyeksidate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'proyeksidate_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_proyeksidate_hora

    function ValidateField_sc_field_1(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->sc_field_1) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_sc_field_1']) && !in_array($this->sc_field_1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_sc_field_1']))
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

    function ValidateField_sc_field_0(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->sc_field_0) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_sc_field_0']) && !in_array($this->sc_field_0, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_sc_field_0']))
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

    function ValidateField_custage(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->custage) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "Umur " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['custage']))
              {
                  $Campos_Erros['custage'] = array();
              }
              $Campos_Erros['custage'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['custage']) || !is_array($this->NM_ajax_info['errList']['custage']))
              {
                  $this->NM_ajax_info['errList']['custage'] = array();
              }
              $this->NM_ajax_info['errList']['custage'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'custage';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_custage

    function ValidateField_alamat(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->alamat) > 150) 
          { 
              $hasError = true;
              $Campos_Crit .= "Alamat " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 150 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['alamat']))
              {
                  $Campos_Erros['alamat'] = array();
              }
              $Campos_Erros['alamat'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 150 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['alamat']) || !is_array($this->NM_ajax_info['errList']['alamat']))
              {
                  $this->NM_ajax_info['errList']['alamat'] = array();
              }
              $this->NM_ajax_info['errList']['alamat'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 150 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
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

    function ValidateField_poli(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->poli) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_poli']) && !in_array($this->poli, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_poli']))
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

    function ValidateField_doccode(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->doccode) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_doccode']) && !in_array($this->doccode, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_doccode']))
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
               if (!empty($this->docname) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_docname']) && !in_array($this->docname, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_docname']))
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

    function ValidateField_plname(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->plname) > 50) 
          { 
              $hasError = true;
              $Campos_Crit .= "Dokter Eksternal " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['plname']))
              {
                  $Campos_Erros['plname'] = array();
              }
              $Campos_Erros['plname'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['plname']) || !is_array($this->NM_ajax_info['errList']['plname']))
              {
                  $this->NM_ajax_info['errList']['plname'] = array();
              }
              $this->NM_ajax_info['errList']['plname'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'plname';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_plname

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

    function ValidateField_finishdate(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->finishdate, $this->field_config['finishdate']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['finishdate']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['finishdate']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['finishdate']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['finishdate']['date_sep']) ; 
          if (trim($this->finishdate) != "")  
          { 
              if ($teste_validade->Data($this->finishdate, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tgl. Selesai; " ; 
                  if (!isset($Campos_Erros['finishdate']))
                  {
                      $Campos_Erros['finishdate'] = array();
                  }
                  $Campos_Erros['finishdate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['finishdate']) || !is_array($this->NM_ajax_info['errList']['finishdate']))
                  {
                      $this->NM_ajax_info['errList']['finishdate'] = array();
                  }
                  $this->NM_ajax_info['errList']['finishdate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['finishdate']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'finishdate';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->finishdate_hora, $this->field_config['finishdate_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['finishdate_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['finishdate_hora']['time_sep']) ; 
          if (trim($this->finishdate_hora) != "")  
          { 
              if ($teste_validade->Hora($this->finishdate_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tgl. Selesai; " ; 
                  if (!isset($Campos_Erros['finishdate_hora']))
                  {
                      $Campos_Erros['finishdate_hora'] = array();
                  }
                  $Campos_Erros['finishdate_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['finishdate']) || !is_array($this->NM_ajax_info['errList']['finishdate']))
                  {
                      $this->NM_ajax_info['errList']['finishdate'] = array();
                  }
                  $this->NM_ajax_info['errList']['finishdate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'finishdate_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_finishdate_hora

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

    function ValidateField_detaillab(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->detaillab) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'detaillab';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_detaillab

    function ValidateField_hasillab(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->hasillab) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'hasillab';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_hasillab

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
    $this->nmgp_dados_form['custcode'] = $this->custcode;
    $this->nmgp_dados_form['instcode'] = $this->instcode;
    $this->nmgp_dados_form['struk'] = $this->struk;
    $this->nmgp_dados_form['trandate'] = (strlen(trim($this->trandate)) > 19) ? str_replace(".", ":", $this->trandate) : trim($this->trandate);
    $this->nmgp_dados_form['proyeksidate'] = (strlen(trim($this->proyeksidate)) > 19) ? str_replace(".", ":", $this->proyeksidate) : trim($this->proyeksidate);
    $this->nmgp_dados_form['sc_field_1'] = $this->sc_field_1;
    $this->nmgp_dados_form['sc_field_0'] = $this->sc_field_0;
    $this->nmgp_dados_form['custage'] = $this->custage;
    $this->nmgp_dados_form['alamat'] = $this->alamat;
    $this->nmgp_dados_form['poli'] = $this->poli;
    $this->nmgp_dados_form['doccode'] = $this->doccode;
    $this->nmgp_dados_form['docname'] = $this->docname;
    $this->nmgp_dados_form['plname'] = $this->plname;
    $this->nmgp_dados_form['diag'] = $this->diag;
    $this->nmgp_dados_form['note'] = $this->note;
    $this->nmgp_dados_form['finishdate'] = (strlen(trim($this->finishdate)) > 19) ? str_replace(".", ":", $this->finishdate) : trim($this->finishdate);
    $this->nmgp_dados_form['status'] = $this->status;
    $this->nmgp_dados_form['detaillab'] = $this->detaillab;
    $this->nmgp_dados_form['hasillab'] = $this->hasillab;
    $this->nmgp_dados_form['source'] = $this->source;
    $this->nmgp_dados_form['enterdate'] = $this->enterdate;
    $this->nmgp_dados_form['keterangan'] = $this->keterangan;
    $this->nmgp_dados_form['deleted'] = $this->deleted;
    $this->nmgp_dados_form['tlc'] = $this->tlc;
    $this->nmgp_dados_form['custtlc'] = $this->custtlc;
    $this->nmgp_dados_form['jalancode'] = $this->jalancode;
    $this->nmgp_dados_form['takendate'] = $this->takendate;
    $this->nmgp_dados_form['takenby'] = $this->takenby;
    $this->nmgp_dados_form['takenreason'] = $this->takenreason;
    $this->nmgp_dados_form['periksaname'] = $this->periksaname;
    $this->nmgp_dados_form['jenisinst'] = $this->jenisinst;
    $this->nmgp_dados_form['inapclass'] = $this->inapclass;
    $this->nmgp_dados_form['penjamin'] = $this->penjamin;
    $this->nmgp_dados_form['pasien'] = $this->pasien;
    $this->nmgp_dados_form['ageyear'] = $this->ageyear;
    $this->nmgp_dados_form['agemonth'] = $this->agemonth;
    $this->nmgp_dados_form['ageday'] = $this->ageday;
    $this->nmgp_dados_form['urutno'] = $this->urutno;
    $this->nmgp_dados_form['ispl'] = $this->ispl;
    $this->nmgp_dados_form['plcode'] = $this->plcode;
    $this->nmgp_dados_form['plsex'] = $this->plsex;
    $this->nmgp_dados_form['petugas'] = $this->petugas;
    $this->nmgp_dados_form['extcodelist'] = $this->extcodelist;
    $this->nmgp_dados_form['asal'] = $this->asal;
    $this->nmgp_dados_form['asallayanan'] = $this->asallayanan;
    $this->nmgp_dados_form['sep'] = $this->sep;
    $this->nmgp_dados_form['kelompoktarif'] = $this->kelompoktarif;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_form'] = $this->nmgp_dados_form;
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
      $this->Before_unformat['proyeksidate'] = $this->proyeksidate;
      nm_limpa_data($this->proyeksidate, $this->field_config['proyeksidate']['date_sep']) ; 
      nm_limpa_hora($this->proyeksidate_hora, $this->field_config['proyeksidate']['time_sep']) ; 
      $this->Before_unformat['finishdate'] = $this->finishdate;
      nm_limpa_data($this->finishdate, $this->field_config['finishdate']['date_sep']) ; 
      nm_limpa_hora($this->finishdate_hora, $this->field_config['finishdate']['time_sep']) ; 
      $this->Before_unformat['source'] = $this->source;
      nm_limpa_numero($this->source, $this->field_config['source']['symbol_grp']) ; 
      $this->Before_unformat['enterdate'] = $this->enterdate;
      nm_limpa_data($this->enterdate, $this->field_config['enterdate']['date_sep']) ; 
      nm_limpa_hora($this->enterdate_hora, $this->field_config['enterdate']['time_sep']) ; 
      $this->Before_unformat['deleted'] = $this->deleted;
      nm_limpa_numero($this->deleted, $this->field_config['deleted']['symbol_grp']) ; 
      $this->Before_unformat['takendate'] = $this->takendate;
      nm_limpa_data($this->takendate, $this->field_config['takendate']['date_sep']) ; 
      nm_limpa_hora($this->takendate_hora, $this->field_config['takendate']['time_sep']) ; 
      $this->Before_unformat['penjamin'] = $this->penjamin;
      if (!empty($this->field_config['penjamin']['symbol_dec']))
      {
         nm_limpa_valor($this->penjamin, $this->field_config['penjamin']['symbol_dec'], $this->field_config['penjamin']['symbol_grp']);
      }
      $this->Before_unformat['pasien'] = $this->pasien;
      if (!empty($this->field_config['pasien']['symbol_dec']))
      {
         nm_limpa_valor($this->pasien, $this->field_config['pasien']['symbol_dec'], $this->field_config['pasien']['symbol_grp']);
      }
      $this->Before_unformat['ageyear'] = $this->ageyear;
      nm_limpa_numero($this->ageyear, $this->field_config['ageyear']['symbol_grp']) ; 
      $this->Before_unformat['agemonth'] = $this->agemonth;
      nm_limpa_numero($this->agemonth, $this->field_config['agemonth']['symbol_grp']) ; 
      $this->Before_unformat['ageday'] = $this->ageday;
      nm_limpa_numero($this->ageday, $this->field_config['ageday']['symbol_grp']) ; 
      $this->Before_unformat['ispl'] = $this->ispl;
      nm_limpa_numero($this->ispl, $this->field_config['ispl']['symbol_grp']) ; 
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
      if ($Nome_Campo == "penjamin")
      {
          if (!empty($this->field_config['penjamin']['symbol_dec']))
          {
             nm_limpa_valor($this->penjamin, $this->field_config['penjamin']['symbol_dec'], $this->field_config['penjamin']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "pasien")
      {
          if (!empty($this->field_config['pasien']['symbol_dec']))
          {
             nm_limpa_valor($this->pasien, $this->field_config['pasien']['symbol_dec'], $this->field_config['pasien']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "ageyear")
      {
          nm_limpa_numero($this->ageyear, $this->field_config['ageyear']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "agemonth")
      {
          nm_limpa_numero($this->agemonth, $this->field_config['agemonth']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "ageday")
      {
          nm_limpa_numero($this->ageday, $this->field_config['ageday']['symbol_grp']) ; 
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
      if ((!empty($this->proyeksidate) && 'null' != $this->proyeksidate) || (!empty($format_fields) && isset($format_fields['proyeksidate'])))
      {
          $nm_separa_data = strpos($this->field_config['proyeksidate']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['proyeksidate']['date_format'];
          $this->field_config['proyeksidate']['date_format'] = substr($this->field_config['proyeksidate']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->proyeksidate, " ") ; 
          $this->proyeksidate_hora = substr($this->proyeksidate, $separador + 1) ; 
          $this->proyeksidate = substr($this->proyeksidate, 0, $separador) ; 
          nm_volta_data($this->proyeksidate, $this->field_config['proyeksidate']['date_format']) ; 
          nmgp_Form_Datas($this->proyeksidate, $this->field_config['proyeksidate']['date_format'], $this->field_config['proyeksidate']['date_sep']) ;  
          $this->field_config['proyeksidate']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->proyeksidate_hora, $this->field_config['proyeksidate']['date_format']) ; 
          nmgp_Form_Hora($this->proyeksidate_hora, $this->field_config['proyeksidate']['date_format'], $this->field_config['proyeksidate']['time_sep']) ;  
          $this->field_config['proyeksidate']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->proyeksidate || '' == $this->proyeksidate)
      {
          $this->proyeksidate_hora = '';
          $this->proyeksidate = '';
      }
      if ((!empty($this->finishdate) && 'null' != $this->finishdate) || (!empty($format_fields) && isset($format_fields['finishdate'])))
      {
          $nm_separa_data = strpos($this->field_config['finishdate']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['finishdate']['date_format'];
          $this->field_config['finishdate']['date_format'] = substr($this->field_config['finishdate']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->finishdate, " ") ; 
          $this->finishdate_hora = substr($this->finishdate, $separador + 1) ; 
          $this->finishdate = substr($this->finishdate, 0, $separador) ; 
          nm_volta_data($this->finishdate, $this->field_config['finishdate']['date_format']) ; 
          nmgp_Form_Datas($this->finishdate, $this->field_config['finishdate']['date_format'], $this->field_config['finishdate']['date_sep']) ;  
          $this->field_config['finishdate']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->finishdate_hora, $this->field_config['finishdate']['date_format']) ; 
          nmgp_Form_Hora($this->finishdate_hora, $this->field_config['finishdate']['date_format'], $this->field_config['finishdate']['time_sep']) ;  
          $this->field_config['finishdate']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->finishdate || '' == $this->finishdate)
      {
          $this->finishdate_hora = '';
          $this->finishdate = '';
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
      $guarda_format_hora = $this->field_config['proyeksidate']['date_format'];
      if ($this->proyeksidate != "")  
      { 
          $nm_separa_data = strpos($this->field_config['proyeksidate']['date_format'], ";") ;
          $this->field_config['proyeksidate']['date_format'] = substr($this->field_config['proyeksidate']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->proyeksidate, $this->field_config['proyeksidate']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->proyeksidate = str_replace('-', '', $this->proyeksidate);
          }
          $this->field_config['proyeksidate']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->proyeksidate_hora, $this->field_config['proyeksidate']['date_format']) ; 
          if ($this->proyeksidate_hora == "" )  
          { 
              $this->proyeksidate_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->proyeksidate_hora = substr($this->proyeksidate_hora, 0, -4) . "." . substr($this->proyeksidate_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->proyeksidate_hora = substr($this->proyeksidate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->proyeksidate_hora = substr($this->proyeksidate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->proyeksidate_hora = substr($this->proyeksidate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->proyeksidate_hora = substr($this->proyeksidate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->proyeksidate_hora = substr($this->proyeksidate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->proyeksidate_hora = substr($this->proyeksidate_hora, 0, -4);
          }
          if ($this->proyeksidate != "")  
          { 
              $this->proyeksidate .= " " . $this->proyeksidate_hora ; 
          }
      } 
      if ($this->proyeksidate == "" && $use_null)  
      { 
          $this->proyeksidate = "null" ; 
      } 
      $this->field_config['proyeksidate']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['finishdate']['date_format'];
      if ($this->finishdate != "")  
      { 
          $nm_separa_data = strpos($this->field_config['finishdate']['date_format'], ";") ;
          $this->field_config['finishdate']['date_format'] = substr($this->field_config['finishdate']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->finishdate, $this->field_config['finishdate']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->finishdate = str_replace('-', '', $this->finishdate);
          }
          $this->field_config['finishdate']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->finishdate_hora, $this->field_config['finishdate']['date_format']) ; 
          if ($this->finishdate_hora == "" )  
          { 
              $this->finishdate_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->finishdate_hora = substr($this->finishdate_hora, 0, -4) . "." . substr($this->finishdate_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->finishdate_hora = substr($this->finishdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->finishdate_hora = substr($this->finishdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->finishdate_hora = substr($this->finishdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->finishdate_hora = substr($this->finishdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->finishdate_hora = substr($this->finishdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->finishdate_hora = substr($this->finishdate_hora, 0, -4);
          }
          if ($this->finishdate != "")  
          { 
              $this->finishdate .= " " . $this->finishdate_hora ; 
          }
      } 
      if ($this->finishdate == "" && $use_null)  
      { 
          $this->finishdate = "null" ; 
      } 
      $this->field_config['finishdate']['date_format'] = $guarda_format_hora;
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
          $this->ajax_return_values_custcode();
          $this->ajax_return_values_instcode();
          $this->ajax_return_values_struk();
          $this->ajax_return_values_trandate();
          $this->ajax_return_values_proyeksidate();
          $this->ajax_return_values_sc_field_1();
          $this->ajax_return_values_sc_field_0();
          $this->ajax_return_values_custage();
          $this->ajax_return_values_alamat();
          $this->ajax_return_values_poli();
          $this->ajax_return_values_doccode();
          $this->ajax_return_values_docname();
          $this->ajax_return_values_plname();
          $this->ajax_return_values_diag();
          $this->ajax_return_values_note();
          $this->ajax_return_values_finishdate();
          $this->ajax_return_values_status();
          $this->ajax_return_values_detaillab();
          $this->ajax_return_values_hasillab();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id']['keyVal'] = form_tbtranlab_inap_pack_protect_string($this->nmgp_dados_form['id']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['form_tbdetaillab_script_case_init'] ]['form_tbdetaillab']['foreign_key']['trancode'] = $this->nmgp_dados_form['trancode'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['form_tbdetaillab_script_case_init'] ]['form_tbdetaillab']['where_filter'] = "trancode = '" . $this->nmgp_dados_form['trancode'] . "'";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['form_tbdetaillab_script_case_init'] ]['form_tbdetaillab']['where_detal']  = "trancode = '" . $this->nmgp_dados_form['trancode'] . "'";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['total'] < 0)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['form_tbdetaillab_script_case_init'] ]['form_tbdetaillab']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['form_tbdetaillab_script_case_init'] ]['form_tbdetaillab']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['form_tbdetaillab_script_case_init'] ]['form_tbdetaillab']['total']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['form_tbhasillab_script_case_init'] ]['form_tbhasillab']['foreign_key']['trancode'] = $this->nmgp_dados_form['trancode'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['form_tbhasillab_script_case_init'] ]['form_tbhasillab']['where_filter'] = "trancode = '" . $this->nmgp_dados_form['trancode'] . "'";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['form_tbhasillab_script_case_init'] ]['form_tbhasillab']['where_detal']  = "trancode = '" . $this->nmgp_dados_form['trancode'] . "'";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['total'] < 0)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['form_tbhasillab_script_case_init'] ]['form_tbhasillab']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['form_tbhasillab_script_case_init'] ]['form_tbhasillab']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['form_tbhasillab_script_case_init'] ]['form_tbhasillab']['total']);
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

          //----- custcode
   function ajax_return_values_custcode($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("custcode", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->custcode);
              $aLookup = array();
              $this->_tmp_lookup_custcode = $this->custcode;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_custcode']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_custcode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_custcode']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_custcode'] = array(); 
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
   $old_value_proyeksidate = $this->proyeksidate;
   $old_value_proyeksidate_hora = $this->proyeksidate_hora;
   $old_value_finishdate = $this->finishdate;
   $old_value_finishdate_hora = $this->finishdate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;
   $unformatted_value_proyeksidate = $this->proyeksidate;
   $unformatted_value_proyeksidate_hora = $this->proyeksidate_hora;
   $unformatted_value_finishdate = $this->finishdate;
   $unformatted_value_finishdate_hora = $this->finishdate_hora;

   $nm_comando = "SELECT custCode FROM tbadmrawatinap where tranCode = '$this->inapcode' ORDER BY custCode";

   $this->id = $old_value_id;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;
   $this->proyeksidate = $old_value_proyeksidate;
   $this->proyeksidate_hora = $old_value_proyeksidate_hora;
   $this->finishdate = $old_value_finishdate;
   $this->finishdate_hora = $old_value_finishdate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbtranlab_inap_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbtranlab_inap_pack_protect_string(NM_charset_to_utf8($rs->fields[0]))));
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_custcode'][] = $rs->fields[0];
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
              $this->NM_ajax_info['fldList']['custcode']['valList'][$i] = form_tbtranlab_inap_pack_protect_string($v);
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_instcode']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_instcode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_instcode']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_instcode'] = array(); 
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
   $old_value_proyeksidate = $this->proyeksidate;
   $old_value_proyeksidate_hora = $this->proyeksidate_hora;
   $old_value_finishdate = $this->finishdate;
   $old_value_finishdate_hora = $this->finishdate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;
   $unformatted_value_proyeksidate = $this->proyeksidate;
   $unformatted_value_proyeksidate_hora = $this->proyeksidate_hora;
   $unformatted_value_finishdate = $this->finishdate;
   $unformatted_value_finishdate_hora = $this->finishdate_hora;

   $nm_comando = "SELECT provider, provider  FROM tbadmrawatinap where tranCode = '$this->inapcode' ORDER BY provider";

   $this->id = $old_value_id;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;
   $this->proyeksidate = $old_value_proyeksidate;
   $this->proyeksidate_hora = $old_value_proyeksidate_hora;
   $this->finishdate = $old_value_finishdate;
   $this->finishdate_hora = $old_value_finishdate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbtranlab_inap_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbtranlab_inap_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_instcode'][] = $rs->fields[0];
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
              $this->NM_ajax_info['fldList']['instcode']['valList'][$i] = form_tbtranlab_inap_pack_protect_string($v);
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

          //----- struk
   function ajax_return_values_struk($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("struk", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->struk);
              $aLookup = array();
              $this->_tmp_lookup_struk = $this->struk;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_struk']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_struk'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_struk']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_struk'] = array(); 
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
   $old_value_proyeksidate = $this->proyeksidate;
   $old_value_proyeksidate_hora = $this->proyeksidate_hora;
   $old_value_finishdate = $this->finishdate;
   $old_value_finishdate_hora = $this->finishdate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;
   $unformatted_value_proyeksidate = $this->proyeksidate;
   $unformatted_value_proyeksidate_hora = $this->proyeksidate_hora;
   $unformatted_value_finishdate = $this->finishdate;
   $unformatted_value_finishdate_hora = $this->finishdate_hora;

   $nm_comando = "SELECT struckNo, struckNo  FROM tbadmrawatinap where tranCode = '$this->inapcode' ORDER BY struckNo DESC";

   $this->id = $old_value_id;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;
   $this->proyeksidate = $old_value_proyeksidate;
   $this->proyeksidate_hora = $old_value_proyeksidate_hora;
   $this->finishdate = $old_value_finishdate;
   $this->finishdate_hora = $old_value_finishdate_hora;

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
              $aLookup[] = array(form_tbtranlab_inap_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbtranlab_inap_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_struk'][] = $rs->fields[0];
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
              $this->NM_ajax_info['fldList']['struk']['valList'][$i] = form_tbtranlab_inap_pack_protect_string($v);
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
               'valList' => array($sTmpValue),
              );
          $this->NM_ajax_info['fldList']['trandate_hora'] = array(
               'type'    => 'text',
               'valList' => array($this->trandate_hora),
              );
          }
   }

          //----- proyeksidate
   function ajax_return_values_proyeksidate($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("proyeksidate", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->proyeksidate);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['proyeksidate'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          $this->NM_ajax_info['fldList']['proyeksidate_hora'] = array(
               'type'    => 'text',
               'valList' => array($this->proyeksidate_hora),
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_sc_field_1']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_sc_field_1'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_sc_field_1']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_sc_field_1'] = array(); 
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
   $old_value_proyeksidate = $this->proyeksidate;
   $old_value_proyeksidate_hora = $this->proyeksidate_hora;
   $old_value_finishdate = $this->finishdate;
   $old_value_finishdate_hora = $this->finishdate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;
   $unformatted_value_proyeksidate = $this->proyeksidate;
   $unformatted_value_proyeksidate_hora = $this->proyeksidate_hora;
   $unformatted_value_finishdate = $this->finishdate;
   $unformatted_value_finishdate_hora = $this->finishdate_hora;

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
   $this->proyeksidate = $old_value_proyeksidate;
   $this->proyeksidate_hora = $old_value_proyeksidate_hora;
   $this->finishdate = $old_value_finishdate;
   $this->finishdate_hora = $old_value_finishdate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbtranlab_inap_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbtranlab_inap_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_sc_field_1'][] = $rs->fields[0];
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
              $this->NM_ajax_info['fldList']['sc_field_1']['valList'][$i] = form_tbtranlab_inap_pack_protect_string($v);
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

          //----- sc_field_0
   function ajax_return_values_sc_field_0($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sc_field_0", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->sc_field_0);
              $aLookup = array();
              $this->_tmp_lookup_sc_field_0 = $this->sc_field_0;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_sc_field_0']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_sc_field_0'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_sc_field_0']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_sc_field_0'] = array(); 
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
   $old_value_proyeksidate = $this->proyeksidate;
   $old_value_proyeksidate_hora = $this->proyeksidate_hora;
   $old_value_finishdate = $this->finishdate;
   $old_value_finishdate_hora = $this->finishdate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;
   $unformatted_value_proyeksidate = $this->proyeksidate;
   $unformatted_value_proyeksidate_hora = $this->proyeksidate_hora;
   $unformatted_value_finishdate = $this->finishdate;
   $unformatted_value_finishdate_hora = $this->finishdate_hora;

   $nm_comando = "SELECT sex  FROM tbcustomer where custcode = '$this->custcode' ORDER BY sex";

   $this->id = $old_value_id;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;
   $this->proyeksidate = $old_value_proyeksidate;
   $this->proyeksidate_hora = $old_value_proyeksidate_hora;
   $this->finishdate = $old_value_finishdate;
   $this->finishdate_hora = $old_value_finishdate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbtranlab_inap_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbtranlab_inap_pack_protect_string(NM_charset_to_utf8($rs->fields[0]))));
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_sc_field_0'][] = $rs->fields[0];
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
              $this->NM_ajax_info['fldList']['sc_field_0']['valList'][$i] = form_tbtranlab_inap_pack_protect_string($v);
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

          //----- custage
   function ajax_return_values_custage($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("custage", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->custage);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['custage'] = array(
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
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['alamat'] = array(
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_poli']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_poli'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_poli']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_poli'] = array(); 
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
   $old_value_proyeksidate = $this->proyeksidate;
   $old_value_proyeksidate_hora = $this->proyeksidate_hora;
   $old_value_finishdate = $this->finishdate;
   $old_value_finishdate_hora = $this->finishdate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;
   $unformatted_value_proyeksidate = $this->proyeksidate;
   $unformatted_value_proyeksidate_hora = $this->proyeksidate_hora;
   $unformatted_value_finishdate = $this->finishdate;
   $unformatted_value_finishdate_hora = $this->finishdate_hora;

   $nm_comando = "SELECT b.polyCode, b.name FROM tbdoctor a left join tbpoli b on b.polyCode = a.poli where a.docCode = '$this->doccode'";

   $this->id = $old_value_id;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;
   $this->proyeksidate = $old_value_proyeksidate;
   $this->proyeksidate_hora = $old_value_proyeksidate_hora;
   $this->finishdate = $old_value_finishdate;
   $this->finishdate_hora = $old_value_finishdate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbtranlab_inap_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbtranlab_inap_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_poli'][] = $rs->fields[0];
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
              $this->NM_ajax_info['fldList']['poli']['valList'][$i] = form_tbtranlab_inap_pack_protect_string($v);
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

          //----- doccode
   function ajax_return_values_doccode($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("doccode", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->doccode);
              $aLookup = array();
              $this->_tmp_lookup_doccode = $this->doccode;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_doccode']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_doccode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_doccode']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_doccode'] = array(); 
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
   $old_value_proyeksidate = $this->proyeksidate;
   $old_value_proyeksidate_hora = $this->proyeksidate_hora;
   $old_value_finishdate = $this->finishdate;
   $old_value_finishdate_hora = $this->finishdate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;
   $unformatted_value_proyeksidate = $this->proyeksidate;
   $unformatted_value_proyeksidate_hora = $this->proyeksidate_hora;
   $unformatted_value_finishdate = $this->finishdate;
   $unformatted_value_finishdate_hora = $this->finishdate_hora;

   $nm_comando = "SELECT doctor, doctor  FROM tbadmrawatinap where struckNo = '$this->struk' ORDER BY doctor";

   $this->id = $old_value_id;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;
   $this->proyeksidate = $old_value_proyeksidate;
   $this->proyeksidate_hora = $old_value_proyeksidate_hora;
   $this->finishdate = $old_value_finishdate;
   $this->finishdate_hora = $old_value_finishdate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbtranlab_inap_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbtranlab_inap_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_doccode'][] = $rs->fields[0];
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
              $this->NM_ajax_info['fldList']['doccode']['valList'][$i] = form_tbtranlab_inap_pack_protect_string($v);
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_docname']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_docname'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_docname']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_docname'] = array(); 
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
   $old_value_proyeksidate = $this->proyeksidate;
   $old_value_proyeksidate_hora = $this->proyeksidate_hora;
   $old_value_finishdate = $this->finishdate;
   $old_value_finishdate_hora = $this->finishdate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;
   $unformatted_value_proyeksidate = $this->proyeksidate;
   $unformatted_value_proyeksidate_hora = $this->proyeksidate_hora;
   $unformatted_value_finishdate = $this->finishdate;
   $unformatted_value_finishdate_hora = $this->finishdate_hora;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT docCode, gelar + ' ' + name + ', ' + spec  FROM tbdoctor where docCode = '$this->doccode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT docCode, concat(gelar,' ', name,', ', spec)  FROM tbdoctor where docCode = '$this->doccode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT docCode, gelar&' '&name&', '&spec  FROM tbdoctor where docCode = '$this->doccode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT docCode, gelar||' '||name||', '||spec  FROM tbdoctor where docCode = '$this->doccode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT docCode, gelar + ' ' + name + ', ' + spec  FROM tbdoctor where docCode = '$this->doccode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT docCode, gelar||' '||name||', '||spec  FROM tbdoctor where docCode = '$this->doccode'";
   }
   else
   {
       $nm_comando = "SELECT docCode, gelar||' '||name||', '||spec  FROM tbdoctor where docCode = '$this->doccode'";
   }

   $this->id = $old_value_id;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;
   $this->proyeksidate = $old_value_proyeksidate;
   $this->proyeksidate_hora = $old_value_proyeksidate_hora;
   $this->finishdate = $old_value_finishdate;
   $this->finishdate_hora = $old_value_finishdate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbtranlab_inap_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbtranlab_inap_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_docname'][] = $rs->fields[0];
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
              $this->NM_ajax_info['fldList']['docname']['valList'][$i] = form_tbtranlab_inap_pack_protect_string($v);
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

          //----- plname
   function ajax_return_values_plname($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("plname", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->plname);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['plname'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
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

          //----- finishdate
   function ajax_return_values_finishdate($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("finishdate", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->finishdate);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['finishdate'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          $this->NM_ajax_info['fldList']['finishdate_hora'] = array(
               'type'    => 'text',
               'valList' => array($this->finishdate_hora),
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

$aLookup[] = array(form_tbtranlab_inap_pack_protect_string('0') => form_tbtranlab_inap_pack_protect_string("Daftar"));
$aLookup[] = array(form_tbtranlab_inap_pack_protect_string('1') => form_tbtranlab_inap_pack_protect_string("Pelayanan"));
$aLookup[] = array(form_tbtranlab_inap_pack_protect_string('2') => form_tbtranlab_inap_pack_protect_string("Lengkap"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_status'][] = '0';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_status'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_status'][] = '2';
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
              $this->NM_ajax_info['fldList']['status']['valList'][$i] = form_tbtranlab_inap_pack_protect_string($v);
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

          //----- detaillab
   function ajax_return_values_detaillab($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("detaillab", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->detaillab);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['detaillab'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- hasillab
   function ajax_return_values_hasillab($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("hasillab", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->hasillab);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['hasillab'] = array(
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['upload_dir'][$fieldName][] = $newName;
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
       $this->NM_ajax_info['btnVars']['var_btn_sc_btn_0_var_lab'] = $this->form_encode_input($this->nmgp_dados_form['trancode']);
       $this->NM_ajax_info['btnVars']['var_btn_sc_btn_0_varlab'] = $this->form_encode_input($this->nmgp_dados_form['trancode']);
       $this->NM_ajax_info['btnVars']['var_btn_sc_btn_1_tranlab'] = $this->form_encode_input($this->nmgp_dados_form['trancode']);
       $this->NM_ajax_info['btnVars']['var_btn_sc_btn_2_norm'] = $this->form_encode_input($this->nmgp_dados_form['custcode']);
   } // ajax_add_parameters
  function nm_proc_onload($bFormat = true)
  {
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['scriptcase']['form_tbtranlab_inap']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_alamat = $this->alamat;
    $original_custcode = $this->custcode;
}
  if(empty($this->alamat )) {

	$check_sql = "SELECT address"
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
		$this->alamat  = $this->rs[0][0];
	}
			else     
	{
		$this->alamat  = '';
	}
}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_alamat != $this->alamat || (isset($bFlagRead_alamat) && $bFlagRead_alamat)))
    {
        $this->ajax_return_values_alamat(true);
    }
    if (($original_custcode != $this->custcode || (isset($bFlagRead_custcode) && $bFlagRead_custcode)))
    {
        $this->ajax_return_values_custcode(true);
    }
}
$_SESSION['scriptcase']['form_tbtranlab_inap']['contr_erro'] = 'off'; 
      }
      if (empty($this->trandate))
      {
          $this->trandate_hora = $this->trandate;
      }
      if (empty($this->proyeksidate))
      {
          $this->proyeksidate_hora = $this->proyeksidate;
      }
      if (empty($this->finishdate))
      {
          $this->finishdate_hora = $this->finishdate;
      }
      if (empty($this->enterdate))
      {
          $this->enterdate_hora = $this->enterdate;
      }
      if (empty($this->takendate))
      {
          $this->takendate_hora = $this->takendate;
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
      $this->penjamin = str_replace($sc_parm1, $sc_parm2, $this->penjamin); 
      $this->pasien = str_replace($sc_parm1, $sc_parm2, $this->pasien); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->penjamin = "'" . $this->penjamin . "'";
      $this->pasien = "'" . $this->pasien . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->penjamin = str_replace("'", "", $this->penjamin); 
      $this->pasien = str_replace("'", "", $this->pasien); 
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
      $_SESSION['scriptcase']['form_tbtranlab_inap']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_status = $this->status;
    $original_trancode = $this->trancode;
}
  $today = date("ym");
$check_sql = "SELECT max(tranCode) FROM tbtranlab  WHERE tranCode LIKE 'LB$today%'";
 
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
	$this->trancode  = 'LB'.$today.sprintf('%05s', $nextNoUrut);
}
		else     
{
	$this->trancode  = 'LB'.$today.sprintf('%05s', '1');
}

$this->status  = '0';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_status != $this->status || (isset($bFlagRead_status) && $bFlagRead_status)))
    {
        $this->ajax_return_values_status(true);
    }
    if (($original_trancode != $this->trancode || (isset($bFlagRead_trancode) && $bFlagRead_trancode)))
    {
        $this->ajax_return_values_trancode(true);
    }
}
$_SESSION['scriptcase']['form_tbtranlab_inap']['contr_erro'] = 'off'; 
    }
    if ("alterar" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_tbtranlab_inap']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_custage = $this->custage;
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
$this->custage  = $umur->y . " TH " . $umur->m . " BLN " . $umur->d . " HR";
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_custage != $this->custage || (isset($bFlagRead_custage) && $bFlagRead_custage)))
    {
        $this->ajax_return_values_custage(true);
    }
    if (($original_custcode != $this->custcode || (isset($bFlagRead_custcode) && $bFlagRead_custcode)))
    {
        $this->ajax_return_values_custcode(true);
    }
}
$_SESSION['scriptcase']['form_tbtranlab_inap']['contr_erro'] = 'off'; 
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
      $NM_val_form['custcode'] = $this->custcode;
      $NM_val_form['instcode'] = $this->instcode;
      $NM_val_form['struk'] = $this->struk;
      $NM_val_form['trandate'] = $this->trandate;
      $NM_val_form['proyeksidate'] = $this->proyeksidate;
      $NM_val_form['sc_field_1'] = $this->sc_field_1;
      $NM_val_form['sc_field_0'] = $this->sc_field_0;
      $NM_val_form['custage'] = $this->custage;
      $NM_val_form['alamat'] = $this->alamat;
      $NM_val_form['poli'] = $this->poli;
      $NM_val_form['doccode'] = $this->doccode;
      $NM_val_form['docname'] = $this->docname;
      $NM_val_form['plname'] = $this->plname;
      $NM_val_form['diag'] = $this->diag;
      $NM_val_form['note'] = $this->note;
      $NM_val_form['finishdate'] = $this->finishdate;
      $NM_val_form['status'] = $this->status;
      $NM_val_form['detaillab'] = $this->detaillab;
      $NM_val_form['hasillab'] = $this->hasillab;
      $NM_val_form['source'] = $this->source;
      $NM_val_form['enterdate'] = $this->enterdate;
      $NM_val_form['keterangan'] = $this->keterangan;
      $NM_val_form['deleted'] = $this->deleted;
      $NM_val_form['tlc'] = $this->tlc;
      $NM_val_form['custtlc'] = $this->custtlc;
      $NM_val_form['jalancode'] = $this->jalancode;
      $NM_val_form['takendate'] = $this->takendate;
      $NM_val_form['takenby'] = $this->takenby;
      $NM_val_form['takenreason'] = $this->takenreason;
      $NM_val_form['periksaname'] = $this->periksaname;
      $NM_val_form['jenisinst'] = $this->jenisinst;
      $NM_val_form['inapclass'] = $this->inapclass;
      $NM_val_form['penjamin'] = $this->penjamin;
      $NM_val_form['pasien'] = $this->pasien;
      $NM_val_form['ageyear'] = $this->ageyear;
      $NM_val_form['agemonth'] = $this->agemonth;
      $NM_val_form['ageday'] = $this->ageday;
      $NM_val_form['urutno'] = $this->urutno;
      $NM_val_form['ispl'] = $this->ispl;
      $NM_val_form['plcode'] = $this->plcode;
      $NM_val_form['plsex'] = $this->plsex;
      $NM_val_form['petugas'] = $this->petugas;
      $NM_val_form['extcodelist'] = $this->extcodelist;
      $NM_val_form['asal'] = $this->asal;
      $NM_val_form['asallayanan'] = $this->asallayanan;
      $NM_val_form['sep'] = $this->sep;
      $NM_val_form['kelompoktarif'] = $this->kelompoktarif;
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
      if ($this->penjamin === "" || is_null($this->penjamin))  
      { 
          $this->penjamin = 0;
          $this->sc_force_zero[] = 'penjamin';
      } 
      if ($this->pasien === "" || is_null($this->pasien))  
      { 
          $this->pasien = 0;
          $this->sc_force_zero[] = 'pasien';
      } 
      if ($this->ageyear === "" || is_null($this->ageyear))  
      { 
          $this->ageyear = 0;
          $this->sc_force_zero[] = 'ageyear';
      } 
      if ($this->agemonth === "" || is_null($this->agemonth))  
      { 
          $this->agemonth = 0;
          $this->sc_force_zero[] = 'agemonth';
      } 
      if ($this->ageday === "" || is_null($this->ageday))  
      { 
          $this->ageday = 0;
          $this->sc_force_zero[] = 'ageday';
      } 
      if ($this->ispl === "" || is_null($this->ispl))  
      { 
          $this->ispl = 0;
          $this->sc_force_zero[] = 'ispl';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'));
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['decimal_db'] == ",") 
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
          if ($this->takendate == "")  
          { 
              $this->takendate = "null"; 
              $NM_val_null[] = "takendate";
          } 
          $this->takenby_before_qstr = $this->takenby;
          $this->takenby = substr($this->Db->qstr($this->takenby), 1, -1); 
          if ($this->takenby == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->takenby = "null"; 
              $NM_val_null[] = "takenby";
          } 
          $this->takenreason_before_qstr = $this->takenreason;
          $this->takenreason = substr($this->Db->qstr($this->takenreason), 1, -1); 
          if ($this->takenreason == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->takenreason = "null"; 
              $NM_val_null[] = "takenreason";
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
          if ($this->proyeksidate == "")  
          { 
              $this->proyeksidate = "null"; 
              $NM_val_null[] = "proyeksidate";
          } 
          $this->inapclass_before_qstr = $this->inapclass;
          $this->inapclass = substr($this->Db->qstr($this->inapclass), 1, -1); 
          if ($this->inapclass == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->inapclass = "null"; 
              $NM_val_null[] = "inapclass";
          } 
          $this->custage_before_qstr = $this->custage;
          $this->custage = substr($this->Db->qstr($this->custage), 1, -1); 
          if ($this->custage == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->custage = "null"; 
              $NM_val_null[] = "custage";
          } 
          $this->urutno_before_qstr = $this->urutno;
          $this->urutno = substr($this->Db->qstr($this->urutno), 1, -1); 
          if ($this->urutno == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->urutno = "null"; 
              $NM_val_null[] = "urutno";
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
          $this->petugas_before_qstr = $this->petugas;
          $this->petugas = substr($this->Db->qstr($this->petugas), 1, -1); 
          if ($this->petugas == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->petugas = "null"; 
              $NM_val_null[] = "petugas";
          } 
          $this->extcodelist_before_qstr = $this->extcodelist;
          $this->extcodelist = substr($this->Db->qstr($this->extcodelist), 1, -1); 
          if ($this->extcodelist == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->extcodelist = "null"; 
              $NM_val_null[] = "extcodelist";
          } 
          $this->asal_before_qstr = $this->asal;
          $this->asal = substr($this->Db->qstr($this->asal), 1, -1); 
          if ($this->asal == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->asal = "null"; 
              $NM_val_null[] = "asal";
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
          $this->detaillab_before_qstr = $this->detaillab;
          $this->detaillab = substr($this->Db->qstr($this->detaillab), 1, -1); 
          if ($this->detaillab == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->detaillab = "null"; 
              $NM_val_null[] = "detaillab";
          } 
          $this->hasillab_before_qstr = $this->hasillab;
          $this->hasillab = substr($this->Db->qstr($this->hasillab), 1, -1); 
          if ($this->hasillab == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->hasillab = "null"; 
              $NM_val_null[] = "hasillab";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['decimal_db'] == ",") 
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
                 form_tbtranlab_inap_pack_ajax_response();
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
                  $SC_fields_update[] = "trancode = '$this->trancode', struk = '$this->struk', custcode = '$this->custcode', inapcode = '$this->inapcode', doccode = '$this->doccode', docname = '$this->docname', note = '$this->note', trandate = #$this->trandate#, status = $this->status, finishdate = #$this->finishdate#, poli = '$this->poli', diag = '$this->diag', instcode = '$this->instcode', proyeksidate = #$this->proyeksidate#, custage = '$this->custage', plname = '$this->plname'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "trancode = '$this->trancode', struk = '$this->struk', custcode = '$this->custcode', inapcode = '$this->inapcode', doccode = '$this->doccode', docname = '$this->docname', note = '$this->note', trandate = " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", status = $this->status, finishdate = " . $this->Ini->date_delim . $this->finishdate . $this->Ini->date_delim1 . ", poli = '$this->poli', diag = '$this->diag', instcode = '$this->instcode', proyeksidate = " . $this->Ini->date_delim . $this->proyeksidate . $this->Ini->date_delim1 . ", custage = '$this->custage', plname = '$this->plname'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "trancode = '$this->trancode', struk = '$this->struk', custcode = '$this->custcode', inapcode = '$this->inapcode', doccode = '$this->doccode', docname = '$this->docname', note = '$this->note', trandate = " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", status = $this->status, finishdate = " . $this->Ini->date_delim . $this->finishdate . $this->Ini->date_delim1 . ", poli = '$this->poli', diag = '$this->diag', instcode = '$this->instcode', proyeksidate = " . $this->Ini->date_delim . $this->proyeksidate . $this->Ini->date_delim1 . ", custage = '$this->custage', plname = '$this->plname'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "trancode = '$this->trancode', struk = '$this->struk', custcode = '$this->custcode', inapcode = '$this->inapcode', doccode = '$this->doccode', docname = '$this->docname', note = '$this->note', trandate = EXTEND('$this->trandate', YEAR TO FRACTION), status = $this->status, finishdate = EXTEND('$this->finishdate', YEAR TO FRACTION), poli = '$this->poli', diag = '$this->diag', instcode = '$this->instcode', proyeksidate = EXTEND('$this->proyeksidate', YEAR TO FRACTION), custage = '$this->custage', plname = '$this->plname'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "trancode = '$this->trancode', struk = '$this->struk', custcode = '$this->custcode', inapcode = '$this->inapcode', doccode = '$this->doccode', docname = '$this->docname', note = '$this->note', trandate = " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", status = $this->status, finishdate = " . $this->Ini->date_delim . $this->finishdate . $this->Ini->date_delim1 . ", poli = '$this->poli', diag = '$this->diag', instcode = '$this->instcode', proyeksidate = " . $this->Ini->date_delim . $this->proyeksidate . $this->Ini->date_delim1 . ", custage = '$this->custage', plname = '$this->plname'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "trancode = '$this->trancode', struk = '$this->struk', custcode = '$this->custcode', inapcode = '$this->inapcode', doccode = '$this->doccode', docname = '$this->docname', note = '$this->note', trandate = " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", status = $this->status, finishdate = " . $this->Ini->date_delim . $this->finishdate . $this->Ini->date_delim1 . ", poli = '$this->poli', diag = '$this->diag', instcode = '$this->instcode', proyeksidate = " . $this->Ini->date_delim . $this->proyeksidate . $this->Ini->date_delim1 . ", custage = '$this->custage', plname = '$this->plname'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "trancode = '$this->trancode', struk = '$this->struk', custcode = '$this->custcode', inapcode = '$this->inapcode', doccode = '$this->doccode', docname = '$this->docname', note = '$this->note', trandate = " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", status = $this->status, finishdate = " . $this->Ini->date_delim . $this->finishdate . $this->Ini->date_delim1 . ", poli = '$this->poli', diag = '$this->diag', instcode = '$this->instcode', proyeksidate = " . $this->Ini->date_delim . $this->proyeksidate . $this->Ini->date_delim1 . ", custage = '$this->custage', plname = '$this->plname'"; 
              } 
              if (isset($NM_val_form['source']) && $NM_val_form['source'] != $this->nmgp_dados_select['source']) 
              { 
                  $SC_fields_update[] = "source = $this->source"; 
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
              if (isset($NM_val_form['takendate']) && $NM_val_form['takendate'] != $this->nmgp_dados_select['takendate']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "takendate = #$this->takendate#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "takendate = EXTEND('" . $this->takendate . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "takendate = " . $this->Ini->date_delim . $this->takendate . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['takenby']) && $NM_val_form['takenby'] != $this->nmgp_dados_select['takenby']) 
              { 
                  $SC_fields_update[] = "takenby = '$this->takenby'"; 
              } 
              if (isset($NM_val_form['takenreason']) && $NM_val_form['takenreason'] != $this->nmgp_dados_select['takenreason']) 
              { 
                  $SC_fields_update[] = "takenreason = '$this->takenreason'"; 
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
              if (isset($NM_val_form['penjamin']) && $NM_val_form['penjamin'] != $this->nmgp_dados_select['penjamin']) 
              { 
                  $SC_fields_update[] = "penjamin = $this->penjamin"; 
              } 
              if (isset($NM_val_form['pasien']) && $NM_val_form['pasien'] != $this->nmgp_dados_select['pasien']) 
              { 
                  $SC_fields_update[] = "pasien = $this->pasien"; 
              } 
              if (isset($NM_val_form['ageyear']) && $NM_val_form['ageyear'] != $this->nmgp_dados_select['ageyear']) 
              { 
                  $SC_fields_update[] = "ageyear = $this->ageyear"; 
              } 
              if (isset($NM_val_form['agemonth']) && $NM_val_form['agemonth'] != $this->nmgp_dados_select['agemonth']) 
              { 
                  $SC_fields_update[] = "agemonth = $this->agemonth"; 
              } 
              if (isset($NM_val_form['ageday']) && $NM_val_form['ageday'] != $this->nmgp_dados_select['ageday']) 
              { 
                  $SC_fields_update[] = "ageday = $this->ageday"; 
              } 
              if (isset($NM_val_form['urutno']) && $NM_val_form['urutno'] != $this->nmgp_dados_select['urutno']) 
              { 
                  $SC_fields_update[] = "urutno = '$this->urutno'"; 
              } 
              if (isset($NM_val_form['ispl']) && $NM_val_form['ispl'] != $this->nmgp_dados_select['ispl']) 
              { 
                  $SC_fields_update[] = "ispl = $this->ispl"; 
              } 
              if (isset($NM_val_form['plcode']) && $NM_val_form['plcode'] != $this->nmgp_dados_select['plcode']) 
              { 
                  $SC_fields_update[] = "plcode = '$this->plcode'"; 
              } 
              if (isset($NM_val_form['plsex']) && $NM_val_form['plsex'] != $this->nmgp_dados_select['plsex']) 
              { 
                  $SC_fields_update[] = "plsex = '$this->plsex'"; 
              } 
              if (isset($NM_val_form['petugas']) && $NM_val_form['petugas'] != $this->nmgp_dados_select['petugas']) 
              { 
                  $SC_fields_update[] = "petugas = '$this->petugas'"; 
              } 
              if (isset($NM_val_form['extcodelist']) && $NM_val_form['extcodelist'] != $this->nmgp_dados_select['extcodelist']) 
              { 
                  $SC_fields_update[] = "extcodelist = '$this->extcodelist'"; 
              } 
              if (isset($NM_val_form['asal']) && $NM_val_form['asal'] != $this->nmgp_dados_select['asal']) 
              { 
                  $SC_fields_update[] = "asal = '$this->asal'"; 
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
                                  form_tbtranlab_inap_pack_ajax_response();
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
              $this->note = $this->note_before_qstr;
              $this->keterangan = $this->keterangan_before_qstr;
              $this->tlc = $this->tlc_before_qstr;
              $this->custtlc = $this->custtlc_before_qstr;
              $this->poli = $this->poli_before_qstr;
              $this->diag = $this->diag_before_qstr;
              $this->jalancode = $this->jalancode_before_qstr;
              $this->takenby = $this->takenby_before_qstr;
              $this->takenreason = $this->takenreason_before_qstr;
              $this->periksaname = $this->periksaname_before_qstr;
              $this->instcode = $this->instcode_before_qstr;
              $this->jenisinst = $this->jenisinst_before_qstr;
              $this->inapclass = $this->inapclass_before_qstr;
              $this->custage = $this->custage_before_qstr;
              $this->urutno = $this->urutno_before_qstr;
              $this->plcode = $this->plcode_before_qstr;
              $this->plname = $this->plname_before_qstr;
              $this->plsex = $this->plsex_before_qstr;
              $this->petugas = $this->petugas_before_qstr;
              $this->extcodelist = $this->extcodelist_before_qstr;
              $this->asal = $this->asal_before_qstr;
              $this->asallayanan = $this->asallayanan_before_qstr;
              $this->sep = $this->sep_before_qstr;
              $this->kelompoktarif = $this->kelompoktarif_before_qstr;
              $this->detaillab = $this->detaillab_before_qstr;
              $this->hasillab = $this->hasillab_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['db_changed'] = true;


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
              if     (isset($NM_val_form) && isset($NM_val_form['poli'])) { $this->poli = $NM_val_form['poli']; }
              elseif (isset($this->poli)) { $this->nm_limpa_alfa($this->poli); }
              if     (isset($NM_val_form) && isset($NM_val_form['diag'])) { $this->diag = $NM_val_form['diag']; }
              elseif (isset($this->diag)) { $this->nm_limpa_alfa($this->diag); }
              if     (isset($NM_val_form) && isset($NM_val_form['instcode'])) { $this->instcode = $NM_val_form['instcode']; }
              elseif (isset($this->instcode)) { $this->nm_limpa_alfa($this->instcode); }
              if     (isset($NM_val_form) && isset($NM_val_form['custage'])) { $this->custage = $NM_val_form['custage']; }
              elseif (isset($this->custage)) { $this->nm_limpa_alfa($this->custage); }
              if     (isset($NM_val_form) && isset($NM_val_form['plname'])) { $this->plname = $NM_val_form['plname']; }
              elseif (isset($this->plname)) { $this->nm_limpa_alfa($this->plname); }
              if     (isset($NM_val_form) && isset($NM_val_form['detaillab'])) { $this->detaillab = $NM_val_form['detaillab']; }
              elseif (isset($this->detaillab)) { $this->nm_limpa_alfa($this->detaillab); }
              if     (isset($NM_val_form) && isset($NM_val_form['hasillab'])) { $this->hasillab = $NM_val_form['hasillab']; }
              elseif (isset($this->hasillab)) { $this->nm_limpa_alfa($this->hasillab); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('id', 'trancode', 'inapcode', 'custcode', 'instcode', 'struk', 'trandate', 'proyeksidate', 'sc_field_1', 'sc_field_0', 'custage', 'alamat', 'poli', 'doccode', 'docname', 'plname', 'diag', 'note', 'finishdate', 'status', 'detaillab', 'hasillab'), $aDoNotUpdate);
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
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "id, ";
          } 
              $this->enterdate =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->enterdate_hora =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_tbtranlab_inap_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (trancode, struk, custcode, inapcode, source, doccode, docname, note, trandate, enterdate, status, finishdate, keterangan, deleted, tlc, custtlc, poli, diag, jalancode, takendate, takenby, takenreason, periksaname, instcode, jenisinst, proyeksidate, inapclass, penjamin, pasien, ageyear, agemonth, ageday, custage, urutno, ispl, plcode, plname, plsex, petugas, extcodelist, asal, asallayanan, sep, kelompoktarif) VALUES ('$this->trancode', '$this->struk', '$this->custcode', '$this->inapcode', $this->source, '$this->doccode', '$this->docname', '$this->note', #$this->trandate#, #$this->enterdate#, $this->status, #$this->finishdate#, '$this->keterangan', $this->deleted, '$this->tlc', '$this->custtlc', '$this->poli', '$this->diag', '$this->jalancode', #$this->takendate#, '$this->takenby', '$this->takenreason', '$this->periksaname', '$this->instcode', '$this->jenisinst', #$this->proyeksidate#, '$this->inapclass', $this->penjamin, $this->pasien, $this->ageyear, $this->agemonth, $this->ageday, '$this->custage', '$this->urutno', $this->ispl, '$this->plcode', '$this->plname', '$this->plsex', '$this->petugas', '$this->extcodelist', '$this->asal', '$this->asallayanan', '$this->sep', '$this->kelompoktarif')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "trancode, struk, custcode, inapcode, source, doccode, docname, note, trandate, enterdate, status, finishdate, keterangan, deleted, tlc, custtlc, poli, diag, jalancode, takendate, takenby, takenreason, periksaname, instcode, jenisinst, proyeksidate, inapclass, penjamin, pasien, ageyear, agemonth, ageday, custage, urutno, ispl, plcode, plname, plsex, petugas, extcodelist, asal, asallayanan, sep, kelompoktarif) VALUES (" . $NM_seq_auto . "'$this->trancode', '$this->struk', '$this->custcode', '$this->inapcode', $this->source, '$this->doccode', '$this->docname', '$this->note', " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->enterdate . $this->Ini->date_delim1 . ", $this->status, " . $this->Ini->date_delim . $this->finishdate . $this->Ini->date_delim1 . ", '$this->keterangan', $this->deleted, '$this->tlc', '$this->custtlc', '$this->poli', '$this->diag', '$this->jalancode', " . $this->Ini->date_delim . $this->takendate . $this->Ini->date_delim1 . ", '$this->takenby', '$this->takenreason', '$this->periksaname', '$this->instcode', '$this->jenisinst', " . $this->Ini->date_delim . $this->proyeksidate . $this->Ini->date_delim1 . ", '$this->inapclass', $this->penjamin, $this->pasien, $this->ageyear, $this->agemonth, $this->ageday, '$this->custage', '$this->urutno', $this->ispl, '$this->plcode', '$this->plname', '$this->plsex', '$this->petugas', '$this->extcodelist', '$this->asal', '$this->asallayanan', '$this->sep', '$this->kelompoktarif')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "trancode, struk, custcode, inapcode, source, doccode, docname, note, trandate, enterdate, status, finishdate, keterangan, deleted, tlc, custtlc, poli, diag, jalancode, takendate, takenby, takenreason, periksaname, instcode, jenisinst, proyeksidate, inapclass, penjamin, pasien, ageyear, agemonth, ageday, custage, urutno, ispl, plcode, plname, plsex, petugas, extcodelist, asal, asallayanan, sep, kelompoktarif) VALUES (" . $NM_seq_auto . "'$this->trancode', '$this->struk', '$this->custcode', '$this->inapcode', $this->source, '$this->doccode', '$this->docname', '$this->note', " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->enterdate . $this->Ini->date_delim1 . ", $this->status, " . $this->Ini->date_delim . $this->finishdate . $this->Ini->date_delim1 . ", '$this->keterangan', $this->deleted, '$this->tlc', '$this->custtlc', '$this->poli', '$this->diag', '$this->jalancode', " . $this->Ini->date_delim . $this->takendate . $this->Ini->date_delim1 . ", '$this->takenby', '$this->takenreason', '$this->periksaname', '$this->instcode', '$this->jenisinst', " . $this->Ini->date_delim . $this->proyeksidate . $this->Ini->date_delim1 . ", '$this->inapclass', $this->penjamin, $this->pasien, $this->ageyear, $this->agemonth, $this->ageday, '$this->custage', '$this->urutno', $this->ispl, '$this->plcode', '$this->plname', '$this->plsex', '$this->petugas', '$this->extcodelist', '$this->asal', '$this->asallayanan', '$this->sep', '$this->kelompoktarif')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "trancode, struk, custcode, inapcode, source, doccode, docname, note, trandate, enterdate, status, finishdate, keterangan, deleted, tlc, custtlc, poli, diag, jalancode, takendate, takenby, takenreason, periksaname, instcode, jenisinst, proyeksidate, inapclass, penjamin, pasien, ageyear, agemonth, ageday, custage, urutno, ispl, plcode, plname, plsex, petugas, extcodelist, asal, asallayanan, sep, kelompoktarif) VALUES (" . $NM_seq_auto . "'$this->trancode', '$this->struk', '$this->custcode', '$this->inapcode', $this->source, '$this->doccode', '$this->docname', '$this->note', " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->enterdate . $this->Ini->date_delim1 . ", $this->status, " . $this->Ini->date_delim . $this->finishdate . $this->Ini->date_delim1 . ", '$this->keterangan', $this->deleted, '$this->tlc', '$this->custtlc', '$this->poli', '$this->diag', '$this->jalancode', " . $this->Ini->date_delim . $this->takendate . $this->Ini->date_delim1 . ", '$this->takenby', '$this->takenreason', '$this->periksaname', '$this->instcode', '$this->jenisinst', " . $this->Ini->date_delim . $this->proyeksidate . $this->Ini->date_delim1 . ", '$this->inapclass', $this->penjamin, $this->pasien, $this->ageyear, $this->agemonth, $this->ageday, '$this->custage', '$this->urutno', $this->ispl, '$this->plcode', '$this->plname', '$this->plsex', '$this->petugas', '$this->extcodelist', '$this->asal', '$this->asallayanan', '$this->sep', '$this->kelompoktarif')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "trancode, struk, custcode, inapcode, source, doccode, docname, note, trandate, enterdate, status, finishdate, keterangan, deleted, tlc, custtlc, poli, diag, jalancode, takendate, takenby, takenreason, periksaname, instcode, jenisinst, proyeksidate, inapclass, penjamin, pasien, ageyear, agemonth, ageday, custage, urutno, ispl, plcode, plname, plsex, petugas, extcodelist, asal, asallayanan, sep, kelompoktarif) VALUES (" . $NM_seq_auto . "'$this->trancode', '$this->struk', '$this->custcode', '$this->inapcode', $this->source, '$this->doccode', '$this->docname', '$this->note', EXTEND('$this->trandate', YEAR TO FRACTION), EXTEND('$this->enterdate', YEAR TO FRACTION), $this->status, EXTEND('$this->finishdate', YEAR TO FRACTION), '$this->keterangan', $this->deleted, '$this->tlc', '$this->custtlc', '$this->poli', '$this->diag', '$this->jalancode', EXTEND('$this->takendate', YEAR TO FRACTION), '$this->takenby', '$this->takenreason', '$this->periksaname', '$this->instcode', '$this->jenisinst', EXTEND('$this->proyeksidate', YEAR TO FRACTION), '$this->inapclass', $this->penjamin, $this->pasien, $this->ageyear, $this->agemonth, $this->ageday, '$this->custage', '$this->urutno', $this->ispl, '$this->plcode', '$this->plname', '$this->plsex', '$this->petugas', '$this->extcodelist', '$this->asal', '$this->asallayanan', '$this->sep', '$this->kelompoktarif')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "trancode, struk, custcode, inapcode, source, doccode, docname, note, trandate, enterdate, status, finishdate, keterangan, deleted, tlc, custtlc, poli, diag, jalancode, takendate, takenby, takenreason, periksaname, instcode, jenisinst, proyeksidate, inapclass, penjamin, pasien, ageyear, agemonth, ageday, custage, urutno, ispl, plcode, plname, plsex, petugas, extcodelist, asal, asallayanan, sep, kelompoktarif) VALUES (" . $NM_seq_auto . "'$this->trancode', '$this->struk', '$this->custcode', '$this->inapcode', $this->source, '$this->doccode', '$this->docname', '$this->note', " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->enterdate . $this->Ini->date_delim1 . ", $this->status, " . $this->Ini->date_delim . $this->finishdate . $this->Ini->date_delim1 . ", '$this->keterangan', $this->deleted, '$this->tlc', '$this->custtlc', '$this->poli', '$this->diag', '$this->jalancode', " . $this->Ini->date_delim . $this->takendate . $this->Ini->date_delim1 . ", '$this->takenby', '$this->takenreason', '$this->periksaname', '$this->instcode', '$this->jenisinst', " . $this->Ini->date_delim . $this->proyeksidate . $this->Ini->date_delim1 . ", '$this->inapclass', $this->penjamin, $this->pasien, $this->ageyear, $this->agemonth, $this->ageday, '$this->custage', '$this->urutno', $this->ispl, '$this->plcode', '$this->plname', '$this->plsex', '$this->petugas', '$this->extcodelist', '$this->asal', '$this->asallayanan', '$this->sep', '$this->kelompoktarif')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "trancode, struk, custcode, inapcode, source, doccode, docname, note, trandate, enterdate, status, finishdate, keterangan, deleted, tlc, custtlc, poli, diag, jalancode, takendate, takenby, takenreason, periksaname, instcode, jenisinst, proyeksidate, inapclass, penjamin, pasien, ageyear, agemonth, ageday, custage, urutno, ispl, plcode, plname, plsex, petugas, extcodelist, asal, asallayanan, sep, kelompoktarif) VALUES (" . $NM_seq_auto . "'$this->trancode', '$this->struk', '$this->custcode', '$this->inapcode', $this->source, '$this->doccode', '$this->docname', '$this->note', " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->enterdate . $this->Ini->date_delim1 . ", $this->status, " . $this->Ini->date_delim . $this->finishdate . $this->Ini->date_delim1 . ", '$this->keterangan', $this->deleted, '$this->tlc', '$this->custtlc', '$this->poli', '$this->diag', '$this->jalancode', " . $this->Ini->date_delim . $this->takendate . $this->Ini->date_delim1 . ", '$this->takenby', '$this->takenreason', '$this->periksaname', '$this->instcode', '$this->jenisinst', " . $this->Ini->date_delim . $this->proyeksidate . $this->Ini->date_delim1 . ", '$this->inapclass', $this->penjamin, $this->pasien, $this->ageyear, $this->agemonth, $this->ageday, '$this->custage', '$this->urutno', $this->ispl, '$this->plcode', '$this->plname', '$this->plsex', '$this->petugas', '$this->extcodelist', '$this->asal', '$this->asallayanan', '$this->sep', '$this->kelompoktarif')"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "trancode, struk, custcode, inapcode, source, doccode, docname, note, trandate, enterdate, status, finishdate, keterangan, deleted, tlc, custtlc, poli, diag, jalancode, takendate, takenby, takenreason, periksaname, instcode, jenisinst, proyeksidate, inapclass, penjamin, pasien, ageyear, agemonth, ageday, custage, urutno, ispl, plcode, plname, plsex, petugas, extcodelist, asal, asallayanan, sep, kelompoktarif) VALUES (" . $NM_seq_auto . "'$this->trancode', '$this->struk', '$this->custcode', '$this->inapcode', $this->source, '$this->doccode', '$this->docname', '$this->note', " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->enterdate . $this->Ini->date_delim1 . ", $this->status, " . $this->Ini->date_delim . $this->finishdate . $this->Ini->date_delim1 . ", '$this->keterangan', $this->deleted, '$this->tlc', '$this->custtlc', '$this->poli', '$this->diag', '$this->jalancode', " . $this->Ini->date_delim . $this->takendate . $this->Ini->date_delim1 . ", '$this->takenby', '$this->takenreason', '$this->periksaname', '$this->instcode', '$this->jenisinst', " . $this->Ini->date_delim . $this->proyeksidate . $this->Ini->date_delim1 . ", '$this->inapclass', $this->penjamin, $this->pasien, $this->ageyear, $this->agemonth, $this->ageday, '$this->custage', '$this->urutno', $this->ispl, '$this->plcode', '$this->plname', '$this->plsex', '$this->petugas', '$this->extcodelist', '$this->asal', '$this->asallayanan', '$this->sep', '$this->kelompoktarif')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "trancode, struk, custcode, inapcode, source, doccode, docname, note, trandate, enterdate, status, finishdate, keterangan, deleted, tlc, custtlc, poli, diag, jalancode, takendate, takenby, takenreason, periksaname, instcode, jenisinst, proyeksidate, inapclass, penjamin, pasien, ageyear, agemonth, ageday, custage, urutno, ispl, plcode, plname, plsex, petugas, extcodelist, asal, asallayanan, sep, kelompoktarif) VALUES (" . $NM_seq_auto . "'$this->trancode', '$this->struk', '$this->custcode', '$this->inapcode', $this->source, '$this->doccode', '$this->docname', '$this->note', " . $this->Ini->date_delim . $this->trandate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->enterdate . $this->Ini->date_delim1 . ", $this->status, " . $this->Ini->date_delim . $this->finishdate . $this->Ini->date_delim1 . ", '$this->keterangan', $this->deleted, '$this->tlc', '$this->custtlc', '$this->poli', '$this->diag', '$this->jalancode', " . $this->Ini->date_delim . $this->takendate . $this->Ini->date_delim1 . ", '$this->takenby', '$this->takenreason', '$this->periksaname', '$this->instcode', '$this->jenisinst', " . $this->Ini->date_delim . $this->proyeksidate . $this->Ini->date_delim1 . ", '$this->inapclass', $this->penjamin, $this->pasien, $this->ageyear, $this->agemonth, $this->ageday, '$this->custage', '$this->urutno', $this->ispl, '$this->plcode', '$this->plname', '$this->plsex', '$this->petugas', '$this->extcodelist', '$this->asal', '$this->asallayanan', '$this->sep', '$this->kelompoktarif')"; 
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
                              form_tbtranlab_inap_pack_ajax_response();
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
                          form_tbtranlab_inap_pack_ajax_response();
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

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->trancode = $this->trancode_before_qstr;
              $this->struk = $this->struk_before_qstr;
              $this->custcode = $this->custcode_before_qstr;
              $this->inapcode = $this->inapcode_before_qstr;
              $this->doccode = $this->doccode_before_qstr;
              $this->docname = $this->docname_before_qstr;
              $this->note = $this->note_before_qstr;
              $this->keterangan = $this->keterangan_before_qstr;
              $this->tlc = $this->tlc_before_qstr;
              $this->custtlc = $this->custtlc_before_qstr;
              $this->poli = $this->poli_before_qstr;
              $this->diag = $this->diag_before_qstr;
              $this->jalancode = $this->jalancode_before_qstr;
              $this->takenby = $this->takenby_before_qstr;
              $this->takenreason = $this->takenreason_before_qstr;
              $this->periksaname = $this->periksaname_before_qstr;
              $this->instcode = $this->instcode_before_qstr;
              $this->jenisinst = $this->jenisinst_before_qstr;
              $this->inapclass = $this->inapclass_before_qstr;
              $this->custage = $this->custage_before_qstr;
              $this->urutno = $this->urutno_before_qstr;
              $this->plcode = $this->plcode_before_qstr;
              $this->plname = $this->plname_before_qstr;
              $this->plsex = $this->plsex_before_qstr;
              $this->petugas = $this->petugas_before_qstr;
              $this->extcodelist = $this->extcodelist_before_qstr;
              $this->asal = $this->asal_before_qstr;
              $this->asallayanan = $this->asallayanan_before_qstr;
              $this->sep = $this->sep_before_qstr;
              $this->kelompoktarif = $this->kelompoktarif_before_qstr;
              $this->detaillab = $this->detaillab_before_qstr;
              $this->hasillab = $this->hasillab_before_qstr;
              $this->sc_insert_on = true; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao   = "igual"; 
              $this->nmgp_opc_ant = "igual"; 
              $this->nmgp_botoes['sc_btn_0'] = "on";
              $this->nmgp_botoes['Batal'] = "on";
              $this->nmgp_botoes['sc_btn_1'] = "on";
              $this->nmgp_botoes['sc_btn_2'] = "on";
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['decimal_db'] == ",") 
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
              $this->form_tbdetaillab->ini_controle();
              if ($this->form_tbdetaillab->temRegistros($sDetailWhere))
              {
                  $bDelecaoOk = false;
                  $sMsgErro   = $this->Ini->Nm_lang['lang_errm_fkvi'];
              }
          }
          if ($bDelecaoOk)
          {
              $sDetailWhere = "trancode = '" . $this->trancode . "'";
              $this->form_tbhasillab->ini_controle();
              if ($this->form_tbhasillab->temRegistros($sDetailWhere))
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
                          form_tbtranlab_inap_pack_ajax_response();
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['total']);
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
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['decimal_db'] == ",")
        {
            $this->nm_troca_decimal(",", ".");
        }
        $_SESSION['scriptcase']['form_tbtranlab_inap']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_inapcode = $this->inapcode;
    $original_trancode = $this->trancode;
}
  $check_sql = "SELECT date(a.birthDate), b.diagnosa1"
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
$usianya = $umur->y . " TH " . $umur->m . " BLN " . $umur->d . " HR";
$diagnya = $this->rs[0][1];

$update_table  = 'tbtranlab';      
$update_where  = "trancode = '".$this->trancode ."'"; 
$update_fields = array(   
     "custage = '".$usianya."'",
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
                form_tbtranlab_inap_pack_ajax_response();
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
    if (($original_trancode != $this->trancode || (isset($bFlagRead_trancode) && $bFlagRead_trancode)))
    {
        $this->ajax_return_values_trancode(true);
    }
}
$_SESSION['scriptcase']['form_tbtranlab_inap']['contr_erro'] = 'off'; 
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['decimal_db'] == ",")
   {
       $this->nm_troca_decimal(".", ",");
   }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['parms'] = "id?#?$this->id?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id = null === $this->id ? null : substr($this->Db->qstr($this->id), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['run_iframe'] == "R")
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['iframe_evento'] == "insert") 
          { 
               $this->nmgp_opcao = "novo"; 
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['select'] = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['iframe_evento'] = $this->sc_evento; 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['run_iframe'] == "F" && $this->sc_evento == "insert")
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
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['total']))
      { 
          $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_tbtranlab_inap = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['total'] = $qt_geral_reg_form_tbtranlab_inap;
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_tbtranlab_inap = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['reg_start'] > $qt_geral_reg_form_tbtranlab_inap)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['reg_start'] = $qt_geral_reg_form_tbtranlab_inap; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['reg_start'] = $qt_geral_reg_form_tbtranlab_inap; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_tbtranlab_inap) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['total'] + 1; 
      $this->NM_gera_nav_page(); 
      $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT id, trancode, struk, custcode, inapcode, source, doccode, docname, note, str_replace (convert(char(10),trandate,102), '.', '-') + ' ' + convert(char(8),trandate,20), str_replace (convert(char(10),enterdate,102), '.', '-') + ' ' + convert(char(8),enterdate,20), status, str_replace (convert(char(10),finishdate,102), '.', '-') + ' ' + convert(char(8),finishdate,20), keterangan, deleted, tlc, custtlc, poli, diag, jalancode, str_replace (convert(char(10),takendate,102), '.', '-') + ' ' + convert(char(8),takendate,20), takenby, takenreason, periksaname, instcode, jenisinst, str_replace (convert(char(10),proyeksidate,102), '.', '-') + ' ' + convert(char(8),proyeksidate,20), inapclass, penjamin, pasien, ageyear, agemonth, ageday, custage, urutno, ispl, plcode, plname, plsex, petugas, extcodelist, asal, asallayanan, sep, kelompoktarif from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT id, trancode, struk, custcode, inapcode, source, doccode, docname, note, convert(char(23),trandate,121), convert(char(23),enterdate,121), status, convert(char(23),finishdate,121), keterangan, deleted, tlc, custtlc, poli, diag, jalancode, convert(char(23),takendate,121), takenby, takenreason, periksaname, instcode, jenisinst, convert(char(23),proyeksidate,121), inapclass, penjamin, pasien, ageyear, agemonth, ageday, custage, urutno, ispl, plcode, plname, plsex, petugas, extcodelist, asal, asallayanan, sep, kelompoktarif from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT id, trancode, struk, custcode, inapcode, source, doccode, docname, note, trandate, enterdate, status, finishdate, keterangan, deleted, tlc, custtlc, poli, diag, jalancode, takendate, takenby, takenreason, periksaname, instcode, jenisinst, proyeksidate, inapclass, penjamin, pasien, ageyear, agemonth, ageday, custage, urutno, ispl, plcode, plname, plsex, petugas, extcodelist, asal, asallayanan, sep, kelompoktarif from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT id, trancode, struk, custcode, inapcode, source, doccode, docname, note, EXTEND(trandate, YEAR TO FRACTION), EXTEND(enterdate, YEAR TO FRACTION), status, EXTEND(finishdate, YEAR TO FRACTION), keterangan, deleted, tlc, custtlc, poli, diag, jalancode, EXTEND(takendate, YEAR TO FRACTION), takenby, takenreason, periksaname, instcode, jenisinst, EXTEND(proyeksidate, YEAR TO FRACTION), inapclass, penjamin, pasien, ageyear, agemonth, ageday, custage, urutno, ispl, plcode, plname, plsex, petugas, extcodelist, asal, asallayanan, sep, kelompoktarif from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT id, trancode, struk, custcode, inapcode, source, doccode, docname, note, trandate, enterdate, status, finishdate, keterangan, deleted, tlc, custtlc, poli, diag, jalancode, takendate, takenby, takenreason, periksaname, instcode, jenisinst, proyeksidate, inapclass, penjamin, pasien, ageyear, agemonth, ageday, custage, urutno, ispl, plcode, plname, plsex, petugas, extcodelist, asal, asallayanan, sep, kelompoktarif from " . $this->Ini->nm_tabela ; 
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['where_filter']))
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
                  $this->NM_ajax_info['buttonDisplay']['Batal'] = $this->nmgp_botoes['Batal'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['sc_btn_1'] = $this->nmgp_botoes['sc_btn_1'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['sc_btn_2'] = $this->nmgp_botoes['sc_btn_2'] = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['empty_filter'] = true;
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
              $this->NM_ajax_info['buttonDisplay']['Batal'] = $this->nmgp_botoes['Batal'] = "off";
              $this->NM_ajax_info['buttonDisplay']['sc_btn_1'] = $this->nmgp_botoes['sc_btn_1'] = "off";
              $this->NM_ajax_info['buttonDisplay']['sc_btn_2'] = $this->nmgp_botoes['sc_btn_2'] = "off";
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
              $this->note = $rs->fields[8] ; 
              $this->nmgp_dados_select['note'] = $this->note;
              $this->trandate = $rs->fields[9] ; 
              if (substr($this->trandate, 10, 1) == "-") 
              { 
                 $this->trandate = substr($this->trandate, 0, 10) . " " . substr($this->trandate, 11);
              } 
              if (substr($this->trandate, 13, 1) == ".") 
              { 
                 $this->trandate = substr($this->trandate, 0, 13) . ":" . substr($this->trandate, 14, 2) . ":" . substr($this->trandate, 17);
              } 
              $this->nmgp_dados_select['trandate'] = $this->trandate;
              $this->enterdate = $rs->fields[10] ; 
              if (substr($this->enterdate, 10, 1) == "-") 
              { 
                 $this->enterdate = substr($this->enterdate, 0, 10) . " " . substr($this->enterdate, 11);
              } 
              if (substr($this->enterdate, 13, 1) == ".") 
              { 
                 $this->enterdate = substr($this->enterdate, 0, 13) . ":" . substr($this->enterdate, 14, 2) . ":" . substr($this->enterdate, 17);
              } 
              $this->nmgp_dados_select['enterdate'] = $this->enterdate;
              $this->status = $rs->fields[11] ; 
              $this->nmgp_dados_select['status'] = $this->status;
              $this->finishdate = $rs->fields[12] ; 
              if (substr($this->finishdate, 10, 1) == "-") 
              { 
                 $this->finishdate = substr($this->finishdate, 0, 10) . " " . substr($this->finishdate, 11);
              } 
              if (substr($this->finishdate, 13, 1) == ".") 
              { 
                 $this->finishdate = substr($this->finishdate, 0, 13) . ":" . substr($this->finishdate, 14, 2) . ":" . substr($this->finishdate, 17);
              } 
              $this->nmgp_dados_select['finishdate'] = $this->finishdate;
              $this->keterangan = $rs->fields[13] ; 
              $this->nmgp_dados_select['keterangan'] = $this->keterangan;
              $this->deleted = $rs->fields[14] ; 
              $this->nmgp_dados_select['deleted'] = $this->deleted;
              $this->tlc = $rs->fields[15] ; 
              $this->nmgp_dados_select['tlc'] = $this->tlc;
              $this->custtlc = $rs->fields[16] ; 
              $this->nmgp_dados_select['custtlc'] = $this->custtlc;
              $this->poli = $rs->fields[17] ; 
              $this->nmgp_dados_select['poli'] = $this->poli;
              $this->diag = $rs->fields[18] ; 
              $this->nmgp_dados_select['diag'] = $this->diag;
              $this->jalancode = $rs->fields[19] ; 
              $this->nmgp_dados_select['jalancode'] = $this->jalancode;
              $this->takendate = $rs->fields[20] ; 
              if (substr($this->takendate, 10, 1) == "-") 
              { 
                 $this->takendate = substr($this->takendate, 0, 10) . " " . substr($this->takendate, 11);
              } 
              if (substr($this->takendate, 13, 1) == ".") 
              { 
                 $this->takendate = substr($this->takendate, 0, 13) . ":" . substr($this->takendate, 14, 2) . ":" . substr($this->takendate, 17);
              } 
              $this->nmgp_dados_select['takendate'] = $this->takendate;
              $this->takenby = $rs->fields[21] ; 
              $this->nmgp_dados_select['takenby'] = $this->takenby;
              $this->takenreason = $rs->fields[22] ; 
              $this->nmgp_dados_select['takenreason'] = $this->takenreason;
              $this->periksaname = $rs->fields[23] ; 
              $this->nmgp_dados_select['periksaname'] = $this->periksaname;
              $this->instcode = $rs->fields[24] ; 
              $this->nmgp_dados_select['instcode'] = $this->instcode;
              $this->jenisinst = $rs->fields[25] ; 
              $this->nmgp_dados_select['jenisinst'] = $this->jenisinst;
              $this->proyeksidate = $rs->fields[26] ; 
              if (substr($this->proyeksidate, 10, 1) == "-") 
              { 
                 $this->proyeksidate = substr($this->proyeksidate, 0, 10) . " " . substr($this->proyeksidate, 11);
              } 
              if (substr($this->proyeksidate, 13, 1) == ".") 
              { 
                 $this->proyeksidate = substr($this->proyeksidate, 0, 13) . ":" . substr($this->proyeksidate, 14, 2) . ":" . substr($this->proyeksidate, 17);
              } 
              $this->nmgp_dados_select['proyeksidate'] = $this->proyeksidate;
              $this->inapclass = $rs->fields[27] ; 
              $this->nmgp_dados_select['inapclass'] = $this->inapclass;
              $this->penjamin = $rs->fields[28] ; 
              $this->nmgp_dados_select['penjamin'] = $this->penjamin;
              $this->pasien = $rs->fields[29] ; 
              $this->nmgp_dados_select['pasien'] = $this->pasien;
              $this->ageyear = $rs->fields[30] ; 
              $this->nmgp_dados_select['ageyear'] = $this->ageyear;
              $this->agemonth = $rs->fields[31] ; 
              $this->nmgp_dados_select['agemonth'] = $this->agemonth;
              $this->ageday = $rs->fields[32] ; 
              $this->nmgp_dados_select['ageday'] = $this->ageday;
              $this->custage = $rs->fields[33] ; 
              $this->nmgp_dados_select['custage'] = $this->custage;
              $this->urutno = $rs->fields[34] ; 
              $this->nmgp_dados_select['urutno'] = $this->urutno;
              $this->ispl = $rs->fields[35] ; 
              $this->nmgp_dados_select['ispl'] = $this->ispl;
              $this->plcode = $rs->fields[36] ; 
              $this->nmgp_dados_select['plcode'] = $this->plcode;
              $this->plname = $rs->fields[37] ; 
              $this->nmgp_dados_select['plname'] = $this->plname;
              $this->plsex = $rs->fields[38] ; 
              $this->nmgp_dados_select['plsex'] = $this->plsex;
              $this->petugas = $rs->fields[39] ; 
              $this->nmgp_dados_select['petugas'] = $this->petugas;
              $this->extcodelist = $rs->fields[40] ; 
              $this->nmgp_dados_select['extcodelist'] = $this->extcodelist;
              $this->asal = $rs->fields[41] ; 
              $this->nmgp_dados_select['asal'] = $this->asal;
              $this->asallayanan = $rs->fields[42] ; 
              $this->nmgp_dados_select['asallayanan'] = $this->asallayanan;
              $this->sep = $rs->fields[43] ; 
              $this->nmgp_dados_select['sep'] = $this->sep;
              $this->kelompoktarif = $rs->fields[44] ; 
              $this->nmgp_dados_select['kelompoktarif'] = $this->kelompoktarif;
              $this->detaillab = $rs->fields[45] ; 
              $this->nmgp_dados_select['detaillab'] = $this->detaillab;
              $this->hasillab = $rs->fields[46] ; 
              $this->nmgp_dados_select['hasillab'] = $this->hasillab;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->id = (string)$this->id; 
              $this->source = (string)$this->source; 
              $this->status = (string)$this->status; 
              $this->deleted = (string)$this->deleted; 
              $this->penjamin = (string)$this->penjamin; 
              $this->pasien = (string)$this->pasien; 
              $this->ageyear = (string)$this->ageyear; 
              $this->agemonth = (string)$this->agemonth; 
              $this->ageday = (string)$this->ageday; 
              $this->ispl = (string)$this->ispl; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['parms'] = "id?#?$this->id?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['reg_start'] < $qt_geral_reg_form_tbtranlab_inap;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['opcao']   = '';
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
              $this->finishdate =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->finishdate_hora =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->nmgp_dados_form["finishdate"] = $this->finishdate;
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
              $this->takendate = "";  
              $this->takendate_hora = "" ;  
              $this->nmgp_dados_form["takendate"] = $this->takendate;
              $this->takenby = "";  
              $this->nmgp_dados_form["takenby"] = $this->takenby;
              $this->takenreason = "";  
              $this->nmgp_dados_form["takenreason"] = $this->takenreason;
              $this->periksaname = "";  
              $this->nmgp_dados_form["periksaname"] = $this->periksaname;
              $this->instcode = "";  
              $this->nmgp_dados_form["instcode"] = $this->instcode;
              $this->jenisinst = "";  
              $this->nmgp_dados_form["jenisinst"] = $this->jenisinst;
              $this->proyeksidate =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->proyeksidate_hora =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->nmgp_dados_form["proyeksidate"] = $this->proyeksidate;
              $this->inapclass = "";  
              $this->nmgp_dados_form["inapclass"] = $this->inapclass;
              $this->penjamin = "";  
              $this->nmgp_dados_form["penjamin"] = $this->penjamin;
              $this->pasien = "";  
              $this->nmgp_dados_form["pasien"] = $this->pasien;
              $this->ageyear = "";  
              $this->nmgp_dados_form["ageyear"] = $this->ageyear;
              $this->agemonth = "";  
              $this->nmgp_dados_form["agemonth"] = $this->agemonth;
              $this->ageday = "";  
              $this->nmgp_dados_form["ageday"] = $this->ageday;
              $this->custage = "";  
              $this->nmgp_dados_form["custage"] = $this->custage;
              $this->urutno = "";  
              $this->nmgp_dados_form["urutno"] = $this->urutno;
              $this->ispl = "";  
              $this->nmgp_dados_form["ispl"] = $this->ispl;
              $this->plcode = "";  
              $this->nmgp_dados_form["plcode"] = $this->plcode;
              $this->plname = "";  
              $this->nmgp_dados_form["plname"] = $this->plname;
              $this->plsex = "";  
              $this->nmgp_dados_form["plsex"] = $this->plsex;
              $this->petugas = "";  
              $this->nmgp_dados_form["petugas"] = $this->petugas;
              $this->extcodelist = "";  
              $this->nmgp_dados_form["extcodelist"] = $this->extcodelist;
              $this->asal = "";  
              $this->nmgp_dados_form["asal"] = $this->asal;
              $this->asallayanan = "";  
              $this->nmgp_dados_form["asallayanan"] = $this->asallayanan;
              $this->sep = "";  
              $this->nmgp_dados_form["sep"] = $this->sep;
              $this->kelompoktarif = "";  
              $this->nmgp_dados_form["kelompoktarif"] = $this->kelompoktarif;
              $this->sc_field_0 = "";  
              $this->nmgp_dados_form["sc_field_0"] = $this->sc_field_0;
              $this->sc_field_1 = "";  
              $this->nmgp_dados_form["sc_field_1"] = $this->sc_field_1;
              $this->alamat = "";  
              $this->nmgp_dados_form["alamat"] = $this->alamat;
              $this->detaillab = "";  
              $this->nmgp_dados_form["detaillab"] = $this->detaillab;
              $this->hasillab = "";  
              $this->nmgp_dados_form["hasillab"] = $this->hasillab;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['foreign_key'] as $sFKName => $sFKValue)
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
      $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['form_tbdetaillab_script_case_init'] ]['form_tbdetaillab']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
      $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['form_tbhasillab_script_case_init'] ]['form_tbhasillab']['embutida_parms'] = "NM_btn_insert*scinN*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
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
         if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['where_filter']))
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
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['reg_start'] + 1;
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
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function inapcode_onChange()
{
$_SESSION['scriptcase']['form_tbtranlab_inap']['contr_erro'] = 'on';
  
$original_inapcode = $this->inapcode;
$original_custage = $this->custage;
$original_diag = $this->diag;
$original_custage = $this->custage;
$original_diag = $this->diag;

$check_sql = "SELECT date(a.birthDate), b.diagnosa1"
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
$this->custage  = $umur->y . " TH " . $umur->m . " BLN " . $umur->d . " HR";
$this->diag  = $this->rs[0][1];


$modificado_inapcode = $this->inapcode;
$modificado_custage = $this->custage;
$modificado_diag = $this->diag;
$modificado_custage = $this->custage;
$modificado_diag = $this->diag;
$this->nm_formatar_campos('inapcode', 'custage', 'diag');
if ($original_inapcode !== $modificado_inapcode || isset($this->nmgp_cmp_readonly['inapcode']) || (isset($bFlagRead_inapcode) && $bFlagRead_inapcode))
{
    $this->ajax_return_values_inapcode(true);
}
if ($original_custage !== $modificado_custage || isset($this->nmgp_cmp_readonly['custage']) || (isset($bFlagRead_custage) && $bFlagRead_custage))
{
    $this->ajax_return_values_custage(true);
}
if ($original_diag !== $modificado_diag || isset($this->nmgp_cmp_readonly['diag']) || (isset($bFlagRead_diag) && $bFlagRead_diag))
{
    $this->ajax_return_values_diag(true);
}
if ($original_custage !== $modificado_custage || isset($this->nmgp_cmp_readonly['custage']) || (isset($bFlagRead_custage) && $bFlagRead_custage))
{
    $this->ajax_return_values_custage(true);
}
if ($original_diag !== $modificado_diag || isset($this->nmgp_cmp_readonly['diag']) || (isset($bFlagRead_diag) && $bFlagRead_diag))
{
    $this->ajax_return_values_diag(true);
}
$this->NM_ajax_info['event_field'] = 'inapcode';
form_tbtranlab_inap_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_tbtranlab_inap']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_tbtranlab_inap_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("form_tbtranlab_inap_form0.php");
        $this->hideFormPages();
 }

        function initFormPages() {
        } // initFormPages

        function hideFormPages() {
        } // hideFormPages

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['csrf_token'];
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_custcode']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_custcode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_custcode']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_custcode'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_custcode']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_custcode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_custcode']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_custcode'] = array(); 
    }

   $old_value_id = $this->id;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $old_value_proyeksidate = $this->proyeksidate;
   $old_value_proyeksidate_hora = $this->proyeksidate_hora;
   $old_value_finishdate = $this->finishdate;
   $old_value_finishdate_hora = $this->finishdate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;
   $unformatted_value_proyeksidate = $this->proyeksidate;
   $unformatted_value_proyeksidate_hora = $this->proyeksidate_hora;
   $unformatted_value_finishdate = $this->finishdate;
   $unformatted_value_finishdate_hora = $this->finishdate_hora;

   $nm_comando = "SELECT custCode FROM tbadmrawatinap where tranCode = '$this->inapcode' ORDER BY custCode";

   $this->id = $old_value_id;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;
   $this->proyeksidate = $old_value_proyeksidate;
   $this->proyeksidate_hora = $old_value_proyeksidate_hora;
   $this->finishdate = $old_value_finishdate;
   $this->finishdate_hora = $old_value_finishdate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_custcode'][] = $rs->fields[0];
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_instcode']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_instcode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_instcode']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_instcode'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_instcode']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_instcode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_instcode']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_instcode'] = array(); 
    }

   $old_value_id = $this->id;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $old_value_proyeksidate = $this->proyeksidate;
   $old_value_proyeksidate_hora = $this->proyeksidate_hora;
   $old_value_finishdate = $this->finishdate;
   $old_value_finishdate_hora = $this->finishdate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;
   $unformatted_value_proyeksidate = $this->proyeksidate;
   $unformatted_value_proyeksidate_hora = $this->proyeksidate_hora;
   $unformatted_value_finishdate = $this->finishdate;
   $unformatted_value_finishdate_hora = $this->finishdate_hora;

   $nm_comando = "SELECT provider, provider  FROM tbadmrawatinap where tranCode = '$this->inapcode' ORDER BY provider";

   $this->id = $old_value_id;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;
   $this->proyeksidate = $old_value_proyeksidate;
   $this->proyeksidate_hora = $old_value_proyeksidate_hora;
   $this->finishdate = $old_value_finishdate;
   $this->finishdate_hora = $old_value_finishdate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_instcode'][] = $rs->fields[0];
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_struk']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_struk'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_struk']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_struk'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_struk']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_struk'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_struk']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_struk'] = array(); 
    }

   $old_value_id = $this->id;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $old_value_proyeksidate = $this->proyeksidate;
   $old_value_proyeksidate_hora = $this->proyeksidate_hora;
   $old_value_finishdate = $this->finishdate;
   $old_value_finishdate_hora = $this->finishdate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;
   $unformatted_value_proyeksidate = $this->proyeksidate;
   $unformatted_value_proyeksidate_hora = $this->proyeksidate_hora;
   $unformatted_value_finishdate = $this->finishdate;
   $unformatted_value_finishdate_hora = $this->finishdate_hora;

   $nm_comando = "SELECT struckNo, struckNo  FROM tbadmrawatinap where tranCode = '$this->inapcode' ORDER BY struckNo DESC";

   $this->id = $old_value_id;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;
   $this->proyeksidate = $old_value_proyeksidate;
   $this->proyeksidate_hora = $old_value_proyeksidate_hora;
   $this->finishdate = $old_value_finishdate;
   $this->finishdate_hora = $old_value_finishdate_hora;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_struk'][] = $rs->fields[0];
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_sc_field_1']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_sc_field_1'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_sc_field_1']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_sc_field_1'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_sc_field_1']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_sc_field_1'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_sc_field_1']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_sc_field_1'] = array(); 
    }

   $old_value_id = $this->id;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $old_value_proyeksidate = $this->proyeksidate;
   $old_value_proyeksidate_hora = $this->proyeksidate_hora;
   $old_value_finishdate = $this->finishdate;
   $old_value_finishdate_hora = $this->finishdate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;
   $unformatted_value_proyeksidate = $this->proyeksidate;
   $unformatted_value_proyeksidate_hora = $this->proyeksidate_hora;
   $unformatted_value_finishdate = $this->finishdate;
   $unformatted_value_finishdate_hora = $this->finishdate_hora;

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
   $this->proyeksidate = $old_value_proyeksidate;
   $this->proyeksidate_hora = $old_value_proyeksidate_hora;
   $this->finishdate = $old_value_finishdate;
   $this->finishdate_hora = $old_value_finishdate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_sc_field_1'][] = $rs->fields[0];
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_sc_field_0']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_sc_field_0'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_sc_field_0']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_sc_field_0'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_sc_field_0']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_sc_field_0'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_sc_field_0']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_sc_field_0'] = array(); 
    }

   $old_value_id = $this->id;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $old_value_proyeksidate = $this->proyeksidate;
   $old_value_proyeksidate_hora = $this->proyeksidate_hora;
   $old_value_finishdate = $this->finishdate;
   $old_value_finishdate_hora = $this->finishdate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;
   $unformatted_value_proyeksidate = $this->proyeksidate;
   $unformatted_value_proyeksidate_hora = $this->proyeksidate_hora;
   $unformatted_value_finishdate = $this->finishdate;
   $unformatted_value_finishdate_hora = $this->finishdate_hora;

   $nm_comando = "SELECT sex  FROM tbcustomer where custcode = '$this->custcode' ORDER BY sex";

   $this->id = $old_value_id;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;
   $this->proyeksidate = $old_value_proyeksidate;
   $this->proyeksidate_hora = $old_value_proyeksidate_hora;
   $this->finishdate = $old_value_finishdate;
   $this->finishdate_hora = $old_value_finishdate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_sc_field_0'][] = $rs->fields[0];
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
   function Form_lookup_poli()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_poli']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_poli'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_poli']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_poli'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_poli']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_poli'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_poli']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_poli'] = array(); 
    }

   $old_value_id = $this->id;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $old_value_proyeksidate = $this->proyeksidate;
   $old_value_proyeksidate_hora = $this->proyeksidate_hora;
   $old_value_finishdate = $this->finishdate;
   $old_value_finishdate_hora = $this->finishdate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;
   $unformatted_value_proyeksidate = $this->proyeksidate;
   $unformatted_value_proyeksidate_hora = $this->proyeksidate_hora;
   $unformatted_value_finishdate = $this->finishdate;
   $unformatted_value_finishdate_hora = $this->finishdate_hora;

   $nm_comando = "SELECT b.polyCode, b.name FROM tbdoctor a left join tbpoli b on b.polyCode = a.poli where a.docCode = '$this->doccode'";

   $this->id = $old_value_id;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;
   $this->proyeksidate = $old_value_proyeksidate;
   $this->proyeksidate_hora = $old_value_proyeksidate_hora;
   $this->finishdate = $old_value_finishdate;
   $this->finishdate_hora = $old_value_finishdate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_poli'][] = $rs->fields[0];
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_doccode']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_doccode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_doccode']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_doccode'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_doccode']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_doccode'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_doccode']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_doccode'] = array(); 
    }

   $old_value_id = $this->id;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $old_value_proyeksidate = $this->proyeksidate;
   $old_value_proyeksidate_hora = $this->proyeksidate_hora;
   $old_value_finishdate = $this->finishdate;
   $old_value_finishdate_hora = $this->finishdate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;
   $unformatted_value_proyeksidate = $this->proyeksidate;
   $unformatted_value_proyeksidate_hora = $this->proyeksidate_hora;
   $unformatted_value_finishdate = $this->finishdate;
   $unformatted_value_finishdate_hora = $this->finishdate_hora;

   $nm_comando = "SELECT doctor, doctor  FROM tbadmrawatinap where struckNo = '$this->struk' ORDER BY doctor";

   $this->id = $old_value_id;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;
   $this->proyeksidate = $old_value_proyeksidate;
   $this->proyeksidate_hora = $old_value_proyeksidate_hora;
   $this->finishdate = $old_value_finishdate;
   $this->finishdate_hora = $old_value_finishdate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_doccode'][] = $rs->fields[0];
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_docname']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_docname'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_docname']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_docname'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_docname']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_docname'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_docname']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_docname'] = array(); 
    }

   $old_value_id = $this->id;
   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $old_value_proyeksidate = $this->proyeksidate;
   $old_value_proyeksidate_hora = $this->proyeksidate_hora;
   $old_value_finishdate = $this->finishdate;
   $old_value_finishdate_hora = $this->finishdate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;
   $unformatted_value_proyeksidate = $this->proyeksidate;
   $unformatted_value_proyeksidate_hora = $this->proyeksidate_hora;
   $unformatted_value_finishdate = $this->finishdate;
   $unformatted_value_finishdate_hora = $this->finishdate_hora;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT docCode, gelar + ' ' + name + ', ' + spec  FROM tbdoctor where docCode = '$this->doccode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT docCode, concat(gelar,' ', name,', ', spec)  FROM tbdoctor where docCode = '$this->doccode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT docCode, gelar&' '&name&', '&spec  FROM tbdoctor where docCode = '$this->doccode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT docCode, gelar||' '||name||', '||spec  FROM tbdoctor where docCode = '$this->doccode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT docCode, gelar + ' ' + name + ', ' + spec  FROM tbdoctor where docCode = '$this->doccode'";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT docCode, gelar||' '||name||', '||spec  FROM tbdoctor where docCode = '$this->doccode'";
   }
   else
   {
       $nm_comando = "SELECT docCode, gelar||' '||name||', '||spec  FROM tbdoctor where docCode = '$this->doccode'";
   }

   $this->id = $old_value_id;
   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;
   $this->proyeksidate = $old_value_proyeksidate;
   $this->proyeksidate_hora = $old_value_proyeksidate_hora;
   $this->finishdate = $old_value_finishdate;
   $this->finishdate_hora = $old_value_finishdate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['Lookup_docname'][] = $rs->fields[0];
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
       $nmgp_def_dados .= "Daftar?#?0?#?N?@?";
       $nmgp_def_dados .= "Pelayanan?#?1?#?N?@?";
       $nmgp_def_dados .= "Lengkap?#?2?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function SC_fast_search($field, $arg_search, $data_search)
   {
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_tbtranlab_inap_pack_ajax_response();
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
          $this->SC_monta_condicao($comando, "takenby", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "takenreason", $arg_search, $data_search);
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
          $this->SC_monta_condicao($comando, "penjamin", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "pasien", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ageyear", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "agemonth", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ageday", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "custage", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "urutno", $arg_search, $data_search);
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
          $this->SC_monta_condicao($comando, "petugas", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "extcodelist", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "asal", $arg_search, $data_search);
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_tbtranlab_inap = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['total'] = $qt_geral_reg_form_tbtranlab_inap;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_tbtranlab_inap_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_tbtranlab_inap_pack_ajax_response();
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
      $nm_numeric[] = "id";$nm_numeric[] = "source";$nm_numeric[] = "status";$nm_numeric[] = "deleted";$nm_numeric[] = "penjamin";$nm_numeric[] = "pasien";$nm_numeric[] = "ageyear";$nm_numeric[] = "agemonth";$nm_numeric[] = "ageday";$nm_numeric[] = "ispl";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['decimal_db'] == ".")
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
      $Nm_datas['trandate'] = "datetime";$Nm_datas['enterdate'] = "datetime";$Nm_datas['finishdate'] = "datetime";$Nm_datas['takendate'] = "datetime";$Nm_datas['proyeksidate'] = "datetime";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['SC_sep_date1'];
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
       $data_look['1'] = "Pelayanan";
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
       $nmgp_saida_form = "form_tbtranlab_inap_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_tbtranlab_inap_fim.php";
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
       form_tbtranlab_inap_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtranlab_inap']['masterValue']);
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
