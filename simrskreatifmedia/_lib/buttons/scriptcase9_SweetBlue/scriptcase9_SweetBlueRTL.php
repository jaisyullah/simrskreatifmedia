<?php

  $arr_buttons = array();
  if(isset($this->Ini->Nm_lang))
  {
      $Nm_lang = $this->Ini->Nm_lang;
  }
  else
  {
      $Nm_lang = $this->Nm_lang;
  }
  $this->arr_buttons['bcons_inicio']['hint']             = $Nm_lang['lang_btns_frst_hint'];
  $this->arr_buttons['bcons_inicio']['type']             = 'button';
  $this->arr_buttons['bcons_inicio']['value']            = $Nm_lang['lang_btns_frst'];
  $this->arr_buttons['bcons_inicio']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bcons_inicio']['display_position'] = 'img_right';
  $this->arr_buttons['bcons_inicio']['fontawesomeicon']  = 'fas fa-step-backward';
  $this->arr_buttons['bcons_inicio']['style'] = 'fontawesome';
  $this->arr_buttons['bcons_inicio']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_last_enabled.png';

  $this->arr_buttons['bcons_retorna']['hint']             = $Nm_lang['lang_btns_prev_hint'];
  $this->arr_buttons['bcons_retorna']['type']             = 'button';
  $this->arr_buttons['bcons_retorna']['value']            = $Nm_lang['lang_btns_prev'];
  $this->arr_buttons['bcons_retorna']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bcons_retorna']['display_position'] = 'img_right';
  $this->arr_buttons['bcons_retorna']['fontawesomeicon']  = 'fas fa-arrow-left';
  $this->arr_buttons['bcons_retorna']['style'] = 'fontawesome';
  $this->arr_buttons['bcons_retorna']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_right_enabled.png';

  $this->arr_buttons['bcons_avanca']['hint']             = $Nm_lang['lang_btns_next_hint'];
  $this->arr_buttons['bcons_avanca']['type']             = 'button';
  $this->arr_buttons['bcons_avanca']['value']            = $Nm_lang['lang_btns_next'];
  $this->arr_buttons['bcons_avanca']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bcons_avanca']['display_position'] = 'img_right';
  $this->arr_buttons['bcons_avanca']['fontawesomeicon']  = 'fas fa-arrow-right';
  $this->arr_buttons['bcons_avanca']['style'] = 'fontawesome';
  $this->arr_buttons['bcons_avanca']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_left_enabled.png';

  $this->arr_buttons['bcons_final']['hint']             = $Nm_lang['lang_btns_last_hint'];
  $this->arr_buttons['bcons_final']['type']             = 'button';
  $this->arr_buttons['bcons_final']['value']            = $Nm_lang['lang_btns_last'];
  $this->arr_buttons['bcons_final']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bcons_final']['display_position'] = 'img_right';
  $this->arr_buttons['bcons_final']['fontawesomeicon']  = 'fas fa-step-forward';
  $this->arr_buttons['bcons_final']['style'] = 'fontawesome';
  $this->arr_buttons['bcons_final']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_first_enabled.png';

  $this->arr_buttons['birpara']['hint']             = $Nm_lang['lang_btns_jump_hint'];
  $this->arr_buttons['birpara']['type']             = 'button';
  $this->arr_buttons['birpara']['value']            = $Nm_lang['lang_btns_jump'];
  $this->arr_buttons['birpara']['display']          = 'only_text';
  $this->arr_buttons['birpara']['display_position'] = 'img_right';
  $this->arr_buttons['birpara']['fontawesomeicon']  = '';
  $this->arr_buttons['birpara']['style'] = 'default';
  $this->arr_buttons['birpara']['image'] = 'sys__NM__nm_teste_birpara.gif';

  $this->arr_buttons['bprint']['hint']             = $Nm_lang['lang_btns_prnt_hint'];
  $this->arr_buttons['bprint']['type']             = 'button';
  $this->arr_buttons['bprint']['value']            = $Nm_lang['lang_btns_prnt'];
  $this->arr_buttons['bprint']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bprint']['display_position'] = 'img_right';
  $this->arr_buttons['bprint']['fontawesomeicon']  = 'fas fa-print';
  $this->arr_buttons['bprint']['style'] = 'default';
  $this->arr_buttons['bprint']['image'] = 'grp__NM__printer2.png';

  $this->arr_buttons['bresumo']['hint']             = $Nm_lang['lang_btns_smry_hint'];
  $this->arr_buttons['bresumo']['type']             = 'button';
  $this->arr_buttons['bresumo']['value']            = $Nm_lang['lang_btns_smry'];
  $this->arr_buttons['bresumo']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bresumo']['display_position'] = 'img_right';
  $this->arr_buttons['bresumo']['fontawesomeicon']  = 'fas fa-th-list';
  $this->arr_buttons['bresumo']['style'] = 'default';
  $this->arr_buttons['bresumo']['image'] = 'sys__NM__nm_teste_bresumo.gif';

  $this->arr_buttons['bsort']['hint']             = $Nm_lang['lang_btns_sort_hint'];
  $this->arr_buttons['bsort']['type']             = 'button';
  $this->arr_buttons['bsort']['value']            = $Nm_lang['lang_btns_sort'];
  $this->arr_buttons['bsort']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bsort']['display_position'] = 'img_right';
  $this->arr_buttons['bsort']['fontawesomeicon']  = 'fas fa-sort-alpha-down';
  $this->arr_buttons['bsort']['style'] = 'default';
  $this->arr_buttons['bsort']['image'] = 'scriptcase__NM__sorting.png';

  $this->arr_buttons['bcolumns']['hint']             = $Nm_lang['lang_btns_clmn_hint'];
  $this->arr_buttons['bcolumns']['type']             = 'button';
  $this->arr_buttons['bcolumns']['value']            = $Nm_lang['lang_btns_clmn'];
  $this->arr_buttons['bcolumns']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bcolumns']['display_position'] = 'img_right';
  $this->arr_buttons['bcolumns']['fontawesomeicon']  = 'fas fa-columns';
  $this->arr_buttons['bcolumns']['style'] = 'default';
  $this->arr_buttons['bcolumns']['image'] = 'sys__NM__nm_teste_bcolumns.gif';

  $this->arr_buttons['bdynamicsearch']['hint']             = $Nm_lang['lang_btns_dynamicsearch_hint'];
  $this->arr_buttons['bdynamicsearch']['type']             = 'button';
  $this->arr_buttons['bdynamicsearch']['value']            = $Nm_lang['lang_btns_dynamicsearch'];
  $this->arr_buttons['bdynamicsearch']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bdynamicsearch']['display_position'] = 'img_right';
  $this->arr_buttons['bdynamicsearch']['fontawesomeicon']  = 'fas fa-search';
  $this->arr_buttons['bdynamicsearch']['style'] = 'default';
  $this->arr_buttons['bdynamicsearch']['image'] = 'sys__NM__nm_teste_bdynamicsearch.gif';

  $this->arr_buttons['bgridsave']['hint']             = $Nm_lang['lang_btns_gridsave_hint'];
  $this->arr_buttons['bgridsave']['type']             = 'button';
  $this->arr_buttons['bgridsave']['value']            = $Nm_lang['lang_btns_gridsave'];
  $this->arr_buttons['bgridsave']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bgridsave']['display_position'] = 'img_right';
  $this->arr_buttons['bgridsave']['fontawesomeicon']  = 'fas fa-save';
  $this->arr_buttons['bgridsave']['style'] = 'default';
  $this->arr_buttons['bgridsave']['image'] = 'sys__NM__nm_teste_bgridsave.gif';

  $this->arr_buttons['bgroupby']['hint']             = $Nm_lang['lang_btns_gbrl_hint'];
  $this->arr_buttons['bgroupby']['type']             = 'button';
  $this->arr_buttons['bgroupby']['value']            = $Nm_lang['lang_btns_gbrl'];
  $this->arr_buttons['bgroupby']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bgroupby']['display_position'] = 'img_right';
  $this->arr_buttons['bgroupby']['fontawesomeicon']  = 'fas fa-layer-group';
  $this->arr_buttons['bgroupby']['style'] = 'default';
  $this->arr_buttons['bgroupby']['image'] = 'sys__NM__nm_teste_bgroupby.gif';

  $this->arr_buttons['bcons_detalhes']['hint']             = $Nm_lang['lang_btns_lens_hint'];
  $this->arr_buttons['bcons_detalhes']['type']             = 'button';
  $this->arr_buttons['bcons_detalhes']['value']            = $Nm_lang['lang_btns_lens'];
  $this->arr_buttons['bcons_detalhes']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bcons_detalhes']['display_position'] = 'img_right';
  $this->arr_buttons['bcons_detalhes']['fontawesomeicon']  = 'fas fa-ellipsis-h';
  $this->arr_buttons['bcons_detalhes']['style'] = 'fontawesome';
  $this->arr_buttons['bcons_detalhes']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_details.png';

  $this->arr_buttons['bqt_linhas']['hint']             = $Nm_lang['lang_btns_rows_hint'];
  $this->arr_buttons['bqt_linhas']['type']             = 'button';
  $this->arr_buttons['bqt_linhas']['value']            = $Nm_lang['lang_btns_rows'];
  $this->arr_buttons['bqt_linhas']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bqt_linhas']['display_position'] = 'img_right';
  $this->arr_buttons['bqt_linhas']['fontawesomeicon']  = 'fas fa-eye';
  $this->arr_buttons['bqt_linhas']['style'] = 'default';
  $this->arr_buttons['bqt_linhas']['image'] = 'sys__NM__nm_teste_bqt_linhas.gif';

  $this->arr_buttons['bgraf']['hint']             = $Nm_lang['lang_btns_chrt_hint'];
  $this->arr_buttons['bgraf']['type']             = 'button';
  $this->arr_buttons['bgraf']['value']            = $Nm_lang['lang_btns_chrt'];
  $this->arr_buttons['bgraf']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bgraf']['display_position'] = 'img_right';
  $this->arr_buttons['bgraf']['fontawesomeicon']  = 'fas fa-chart-bar';
  $this->arr_buttons['bgraf']['style'] = 'fontawesome';
  $this->arr_buttons['bgraf']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_charts.png';

  $this->arr_buttons['bconf_graf']['hint']             = $Nm_lang['lang_btns_chrt_stng_hint'];
  $this->arr_buttons['bconf_graf']['type']             = 'button';
  $this->arr_buttons['bconf_graf']['value']            = $Nm_lang['lang_btns_chrt_stng'];
  $this->arr_buttons['bconf_graf']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bconf_graf']['display_position'] = 'img_right';
  $this->arr_buttons['bconf_graf']['fontawesomeicon']  = 'fas fa-cog';
  $this->arr_buttons['bconf_graf']['style'] = 'default';
  $this->arr_buttons['bconf_graf']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_set_charts.png';

  $this->arr_buttons['bqtd_bytes']['hint']             = '';
  $this->arr_buttons['bqtd_bytes']['type']             = 'link';
  $this->arr_buttons['bqtd_bytes']['value']            = $Nm_lang['lang_btns_qtch'];
  $this->arr_buttons['bqtd_bytes']['display']          = 'only_text';
  $this->arr_buttons['bqtd_bytes']['display_position'] = 'img_right';
  $this->arr_buttons['bqtd_bytes']['fontawesomeicon']  = '';
  $this->arr_buttons['bqtd_bytes']['style'] = 'default';
  $this->arr_buttons['bqtd_bytes']['image'] = '';

  $this->arr_buttons['blink_resumogrid']['hint']             = $Nm_lang['lang_btns_smry_drll_hint'];
  $this->arr_buttons['blink_resumogrid']['type']             = 'button';
  $this->arr_buttons['blink_resumogrid']['value']            = $Nm_lang['lang_btns_smry_drll'];
  $this->arr_buttons['blink_resumogrid']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['blink_resumogrid']['display_position'] = 'img_right';
  $this->arr_buttons['blink_resumogrid']['fontawesomeicon']  = 'fas fa-ellipsis-h';
  $this->arr_buttons['blink_resumogrid']['style'] = 'default';
  $this->arr_buttons['blink_resumogrid']['image'] = 'sys__NM__nm_teste_blink_resumogrid.gif';

  $this->arr_buttons['brot_resumo']['hint']             = $Nm_lang['lang_btns_smry_rtte_hint'];
  $this->arr_buttons['brot_resumo']['type']             = 'button';
  $this->arr_buttons['brot_resumo']['value']            = $Nm_lang['lang_btns_smry_rtte'];
  $this->arr_buttons['brot_resumo']['display']          = 'only_text';
  $this->arr_buttons['brot_resumo']['display_position'] = 'img_right';
  $this->arr_buttons['brot_resumo']['fontawesomeicon']  = 'fas fa-undo';
  $this->arr_buttons['brot_resumo']['style'] = 'default';
  $this->arr_buttons['brot_resumo']['image'] = 'sys__NM__nm_teste_brot_resumo.gif';

  $this->arr_buttons['smry_conf']['hint']             = $Nm_lang['lang_btns_smry_conf_hint'];
  $this->arr_buttons['smry_conf']['type']             = 'button';
  $this->arr_buttons['smry_conf']['value']            = $Nm_lang['lang_btns_smry_conf'];
  $this->arr_buttons['smry_conf']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['smry_conf']['display_position'] = 'img_right';
  $this->arr_buttons['smry_conf']['fontawesomeicon']  = 'fas fa-cogs';
  $this->arr_buttons['smry_conf']['style'] = 'default';
  $this->arr_buttons['smry_conf']['image'] = 'sys__NM__nm_teste_smry_conf.gif';

  $this->arr_buttons['gantt_chart']['hint']             = $Nm_lang['lang_btns_chrt_gantt_hint'];
  $this->arr_buttons['gantt_chart']['type']             = 'button';
  $this->arr_buttons['gantt_chart']['value']            = $Nm_lang['lang_btns_chrt_gantt'];
  $this->arr_buttons['gantt_chart']['display']          = 'only_text';
  $this->arr_buttons['gantt_chart']['display_position'] = 'img_right';
  $this->arr_buttons['gantt_chart']['fontawesomeicon']  = '';
  $this->arr_buttons['gantt_chart']['style'] = 'default';
  $this->arr_buttons['gantt_chart']['image'] = 'sys__NM__nm_teste_gantt_chart.gif';

  $this->arr_buttons['bcons_apply']['hint']             = $Nm_lang['lang_btns_apply_hint'];
  $this->arr_buttons['bcons_apply']['type']             = 'button';
  $this->arr_buttons['bcons_apply']['value']            = $Nm_lang['lang_btns_apply'];
  $this->arr_buttons['bcons_apply']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bcons_apply']['display_position'] = 'text_right';
  $this->arr_buttons['bcons_apply']['fontawesomeicon']  = 'fas fa-check';
  $this->arr_buttons['bcons_apply']['style'] = 'check';
  $this->arr_buttons['bcons_apply']['image'] = 'scriptcase__NM__nm_scriptcase8_BlueWood_bcons_apply.gif';

  $this->arr_buttons['bcons_cancel']['hint']             = $Nm_lang['lang_btns_cncl_hint'];
  $this->arr_buttons['bcons_cancel']['type']             = 'button';
  $this->arr_buttons['bcons_cancel']['value']            = $Nm_lang['lang_btns_cncl'];
  $this->arr_buttons['bcons_cancel']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bcons_cancel']['display_position'] = 'text_right';
  $this->arr_buttons['bcons_cancel']['fontawesomeicon']  = 'fas fa-ban';
  $this->arr_buttons['bcons_cancel']['style'] = 'cancel';
  $this->arr_buttons['bcons_cancel']['image'] = 'scriptcase__NM__nm_scriptcase8_BlueWood_bcons_cancel.gif';

  $this->arr_buttons['bmultiselect']['hint']             = $Nm_lang['lang_btns_multiselect_hint'];
  $this->arr_buttons['bmultiselect']['type']             = 'button';
  $this->arr_buttons['bmultiselect']['value']            = $Nm_lang['lang_btns_multiselect'];
  $this->arr_buttons['bmultiselect']['display']          = 'only_text';
  $this->arr_buttons['bmultiselect']['display_position'] = 'text_right';
  $this->arr_buttons['bmultiselect']['fontawesomeicon']  = '';
  $this->arr_buttons['bmultiselect']['style'] = 'small';
  $this->arr_buttons['bmultiselect']['image'] = 'scriptcase__NM__nm_scriptcase8_BlueWood_bmultiselect.gif';

  $this->arr_buttons['bcons_inicio_off']['hint']             = $Nm_lang['lang_btns_frst_hint'];
  $this->arr_buttons['bcons_inicio_off']['type']             = 'image';
  $this->arr_buttons['bcons_inicio_off']['value']            = $Nm_lang['lang_btns_frst'];
  $this->arr_buttons['bcons_inicio_off']['display']          = 'only_text';
  $this->arr_buttons['bcons_inicio_off']['display_position'] = 'img_right';
  $this->arr_buttons['bcons_inicio_off']['fontawesomeicon']  = '';
  $this->arr_buttons['bcons_inicio_off']['style'] = 'disabledSCImage';
  $this->arr_buttons['bcons_inicio_off']['image'] = 'scriptcase__NM__nm_scriptcase9_SweetBlue_bcons_inicio_off.gif';

  $this->arr_buttons['bcons_retorna_off']['hint']             = $Nm_lang['lang_btns_prev_hint'];
  $this->arr_buttons['bcons_retorna_off']['type']             = 'image';
  $this->arr_buttons['bcons_retorna_off']['value']            = $Nm_lang['lang_btns_prev'];
  $this->arr_buttons['bcons_retorna_off']['display']          = 'only_text';
  $this->arr_buttons['bcons_retorna_off']['display_position'] = 'img_right';
  $this->arr_buttons['bcons_retorna_off']['fontawesomeicon']  = '';
  $this->arr_buttons['bcons_retorna_off']['style'] = 'disabledSCImage';
  $this->arr_buttons['bcons_retorna_off']['image'] = 'scriptcase__NM__nm_scriptcase9_SweetBlue_bcons_retorna_off.gif';

  $this->arr_buttons['bcons_avanca_off']['hint']             = $Nm_lang['lang_btns_next_hint'];
  $this->arr_buttons['bcons_avanca_off']['type']             = 'image';
  $this->arr_buttons['bcons_avanca_off']['value']            = $Nm_lang['lang_btns_next'];
  $this->arr_buttons['bcons_avanca_off']['display']          = 'only_text';
  $this->arr_buttons['bcons_avanca_off']['display_position'] = 'img_right';
  $this->arr_buttons['bcons_avanca_off']['fontawesomeicon']  = '';
  $this->arr_buttons['bcons_avanca_off']['style'] = 'disabledSCImage';
  $this->arr_buttons['bcons_avanca_off']['image'] = 'scriptcase__NM__nm_scriptcase9_SweetBlue_bcons_avanca_off.gif';

  $this->arr_buttons['bcons_final_off']['hint']             = $Nm_lang['lang_btns_last_hint'];
  $this->arr_buttons['bcons_final_off']['type']             = 'image';
  $this->arr_buttons['bcons_final_off']['value']            = $Nm_lang['lang_btns_last'];
  $this->arr_buttons['bcons_final_off']['display']          = 'only_text';
  $this->arr_buttons['bcons_final_off']['display_position'] = 'img_right';
  $this->arr_buttons['bcons_final_off']['fontawesomeicon']  = '';
  $this->arr_buttons['bcons_final_off']['style'] = 'disabledSCImage';
  $this->arr_buttons['bcons_final_off']['image'] = 'scriptcase__NM__nm_scriptcase9_SweetBlue_bcons_final_off.gif';

  $this->arr_buttons['bemailpdf']['hint']             = $Nm_lang['lang_btns_email_pdfc_hint'];
  $this->arr_buttons['bemailpdf']['type']             = 'button';
  $this->arr_buttons['bemailpdf']['value']            = $Nm_lang['lang_btns_email_pdfc'];
  $this->arr_buttons['bemailpdf']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bemailpdf']['display_position'] = 'text_right';
  $this->arr_buttons['bemailpdf']['fontawesomeicon']  = 'fas fa-file-pdf';
  $this->arr_buttons['bemailpdf']['style'] = 'default';
  $this->arr_buttons['bemailpdf']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bemailpdf.gif';

  $this->arr_buttons['bemailrtf']['hint']             = $Nm_lang['lang_btns_email_rtff_hint'];
  $this->arr_buttons['bemailrtf']['type']             = 'button';
  $this->arr_buttons['bemailrtf']['value']            = $Nm_lang['lang_btns_email_rtff'];
  $this->arr_buttons['bemailrtf']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bemailrtf']['display_position'] = 'text_right';
  $this->arr_buttons['bemailrtf']['fontawesomeicon']  = 'fas fa-file-alt';
  $this->arr_buttons['bemailrtf']['style'] = 'default';
  $this->arr_buttons['bemailrtf']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bemailrtf.gif';

  $this->arr_buttons['bemailxls']['hint']             = $Nm_lang['lang_btns_email_xlsf_hint'];
  $this->arr_buttons['bemailxls']['type']             = 'button';
  $this->arr_buttons['bemailxls']['value']            = $Nm_lang['lang_btns_email_xlsf'];
  $this->arr_buttons['bemailxls']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bemailxls']['display_position'] = 'text_right';
  $this->arr_buttons['bemailxls']['fontawesomeicon']  = 'fas fa-file-excel';
  $this->arr_buttons['bemailxls']['style'] = 'default';
  $this->arr_buttons['bemailxls']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bemailxls.gif';

  $this->arr_buttons['bemailxml']['hint']             = $Nm_lang['lang_btns_email_xmlf_hint'];
  $this->arr_buttons['bemailxml']['type']             = 'button';
  $this->arr_buttons['bemailxml']['value']            = $Nm_lang['lang_btns_email_xmlf'];
  $this->arr_buttons['bemailxml']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bemailxml']['display_position'] = 'text_right';
  $this->arr_buttons['bemailxml']['fontawesomeicon']  = 'fas fa-file-code';
  $this->arr_buttons['bemailxml']['style'] = 'default';
  $this->arr_buttons['bemailxml']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bemailxml.gif';

  $this->arr_buttons['bemailcsv']['hint']             = $Nm_lang['lang_btns_email_csvf_hint'];
  $this->arr_buttons['bemailcsv']['type']             = 'button';
  $this->arr_buttons['bemailcsv']['value']            = $Nm_lang['lang_btns_email_csvf'];
  $this->arr_buttons['bemailcsv']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bemailcsv']['display_position'] = 'text_right';
  $this->arr_buttons['bemailcsv']['fontawesomeicon']  = 'fas fa-file-excel';
  $this->arr_buttons['bemailcsv']['style'] = 'default';
  $this->arr_buttons['bemailcsv']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bemailcsv.gif';

  $this->arr_buttons['bemaildoc']['hint']             = $Nm_lang['lang_btns_email_word_hint'];
  $this->arr_buttons['bemaildoc']['type']             = 'button';
  $this->arr_buttons['bemaildoc']['value']            = $Nm_lang['lang_btns_email_word'];
  $this->arr_buttons['bemaildoc']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bemaildoc']['display_position'] = 'text_right';
  $this->arr_buttons['bemaildoc']['fontawesomeicon']  = 'fas fa-file-word';
  $this->arr_buttons['bemaildoc']['style'] = 'default';
  $this->arr_buttons['bemaildoc']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bemaildoc.gif';

  $this->arr_buttons['bemailimg']['hint']             = $Nm_lang['lang_btns_email_img_hint'];
  $this->arr_buttons['bemailimg']['type']             = 'button';
  $this->arr_buttons['bemailimg']['value']            = $Nm_lang['lang_btns_email_img'];
  $this->arr_buttons['bemailimg']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bemailimg']['display_position'] = 'text_right';
  $this->arr_buttons['bemailimg']['fontawesomeicon']  = 'fas fa-file-image';
  $this->arr_buttons['bemailimg']['style'] = 'default';
  $this->arr_buttons['bemailimg']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bemailimg.gif';

  $this->arr_buttons['bemailhtml']['hint']             = $Nm_lang['lang_btns_email_html_hint'];
  $this->arr_buttons['bemailhtml']['type']             = 'button';
  $this->arr_buttons['bemailhtml']['value']            = $Nm_lang['lang_btns_email_html'];
  $this->arr_buttons['bemailhtml']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bemailhtml']['display_position'] = 'text_right';
  $this->arr_buttons['bemailhtml']['fontawesomeicon']  = 'fas fa-file-code';
  $this->arr_buttons['bemailhtml']['style'] = 'default';
  $this->arr_buttons['bemailhtml']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bemailhtml.gif';

  $this->arr_buttons['bexportemail']['hint']             = $Nm_lang['lang_btns_mail_hint'];
  $this->arr_buttons['bexportemail']['type']             = 'button';
  $this->arr_buttons['bexportemail']['value']            = $Nm_lang['lang_btns_mail'];
  $this->arr_buttons['bexportemail']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bexportemail']['display_position'] = 'img_right';
  $this->arr_buttons['bexportemail']['fontawesomeicon']  = 'fas fa-at';
  $this->arr_buttons['bexportemail']['style'] = 'default';
  $this->arr_buttons['bexportemail']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bdownload.gif';

  $this->arr_buttons['bpdf']['hint']             = $Nm_lang['lang_btns_pdfc_hint'];
  $this->arr_buttons['bpdf']['type']             = 'button';
  $this->arr_buttons['bpdf']['value']            = $Nm_lang['lang_btns_pdfc'];
  $this->arr_buttons['bpdf']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bpdf']['display_position'] = 'img_right';
  $this->arr_buttons['bpdf']['fontawesomeicon']  = 'fas fa-file-pdf';
  $this->arr_buttons['bpdf']['style'] = 'default';
  $this->arr_buttons['bpdf']['image'] = 'sys__NM__nm_teste_bpdf.gif';

  $this->arr_buttons['brtf']['hint']             = $Nm_lang['lang_btns_rtff_hint'];
  $this->arr_buttons['brtf']['type']             = 'button';
  $this->arr_buttons['brtf']['value']            = $Nm_lang['lang_btns_rtff'];
  $this->arr_buttons['brtf']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['brtf']['display_position'] = 'img_right';
  $this->arr_buttons['brtf']['fontawesomeicon']  = 'fas fa-file-alt';
  $this->arr_buttons['brtf']['style'] = 'default';
  $this->arr_buttons['brtf']['image'] = 'sys__NM__nm_teste_brtf.gif';

  $this->arr_buttons['bexcel']['hint']             = $Nm_lang['lang_btns_xlsf_hint'];
  $this->arr_buttons['bexcel']['type']             = 'button';
  $this->arr_buttons['bexcel']['value']            = $Nm_lang['lang_btns_xlsf'];
  $this->arr_buttons['bexcel']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bexcel']['display_position'] = 'img_right';
  $this->arr_buttons['bexcel']['fontawesomeicon']  = 'fas fa-file-excel';
  $this->arr_buttons['bexcel']['style'] = 'default';
  $this->arr_buttons['bexcel']['image'] = 'sys__NM__nm_teste_bexcel.gif';

  $this->arr_buttons['bxml']['hint']             = $Nm_lang['lang_btns_xmlf_hint'];
  $this->arr_buttons['bxml']['type']             = 'button';
  $this->arr_buttons['bxml']['value']            = $Nm_lang['lang_btns_xmlf'];
  $this->arr_buttons['bxml']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bxml']['display_position'] = 'img_right';
  $this->arr_buttons['bxml']['fontawesomeicon']  = 'fas fa-file-code';
  $this->arr_buttons['bxml']['style'] = 'default';
  $this->arr_buttons['bxml']['image'] = 'sys__NM__nm_teste_bxml.gif';

  $this->arr_buttons['bcsv']['hint']             = $Nm_lang['lang_btns_csvf_hint'];
  $this->arr_buttons['bcsv']['type']             = 'button';
  $this->arr_buttons['bcsv']['value']            = $Nm_lang['lang_btns_csvf'];
  $this->arr_buttons['bcsv']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bcsv']['display_position'] = 'img_right';
  $this->arr_buttons['bcsv']['fontawesomeicon']  = 'fas fa-file-excel';
  $this->arr_buttons['bcsv']['style'] = 'default';
  $this->arr_buttons['bcsv']['image'] = 'sys__NM__nm_teste_bcsv.gif';

  $this->arr_buttons['bword']['hint']             = $Nm_lang['lang_btns_word_hint'];
  $this->arr_buttons['bword']['type']             = 'button';
  $this->arr_buttons['bword']['value']            = $Nm_lang['lang_btns_word'];
  $this->arr_buttons['bword']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bword']['display_position'] = 'img_right';
  $this->arr_buttons['bword']['fontawesomeicon']  = 'fas fa-file-word';
  $this->arr_buttons['bword']['style'] = 'default';
  $this->arr_buttons['bword']['image'] = 'sys__NM__nm_teste_bword.gif';

  $this->arr_buttons['bimg']['hint']             = $Nm_lang['lang_btns_img_hint'];
  $this->arr_buttons['bimg']['type']             = 'button';
  $this->arr_buttons['bimg']['value']            = $Nm_lang['lang_btns_img'];
  $this->arr_buttons['bimg']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bimg']['display_position'] = 'text_right';
  $this->arr_buttons['bimg']['fontawesomeicon']  = 'fas fa-file-image';
  $this->arr_buttons['bimg']['style'] = 'default';
  $this->arr_buttons['bimg']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bimg.gif';

  $this->arr_buttons['bexport']['hint']             = $Nm_lang['lang_btns_expo_hint'];
  $this->arr_buttons['bexport']['type']             = 'button';
  $this->arr_buttons['bexport']['value']            = $Nm_lang['lang_btns_expo'];
  $this->arr_buttons['bexport']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bexport']['display_position'] = 'img_right';
  $this->arr_buttons['bexport']['fontawesomeicon']  = 'fas fa-file-export';
  $this->arr_buttons['bexport']['style'] = 'default';
  $this->arr_buttons['bexport']['image'] = 'sys__NM__nm_teste_bexport.gif';

  $this->arr_buttons['bexportview']['hint']             = $Nm_lang['lang_btns_expv_hint'];
  $this->arr_buttons['bexportview']['type']             = 'button';
  $this->arr_buttons['bexportview']['value']            = $Nm_lang['lang_btns_expv'];
  $this->arr_buttons['bexportview']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bexportview']['display_position'] = 'img_right';
  $this->arr_buttons['bexportview']['fontawesomeicon']  = 'fas fa-eye';
  $this->arr_buttons['bexportview']['style'] = 'default';
  $this->arr_buttons['bexportview']['image'] = 'sys__NM__nm_teste_bexportview.gif';

  $this->arr_buttons['bdownload']['hint']             = $Nm_lang['lang_btns_down_hint'];
  $this->arr_buttons['bdownload']['type']             = 'button';
  $this->arr_buttons['bdownload']['value']            = $Nm_lang['lang_btns_down'];
  $this->arr_buttons['bdownload']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bdownload']['display_position'] = 'img_right';
  $this->arr_buttons['bdownload']['fontawesomeicon']  = 'fas fa-cloud-download-alt';
  $this->arr_buttons['bdownload']['style'] = 'default';
  $this->arr_buttons['bdownload']['image'] = 'sys__NM__nm_teste_bdownload.gif';

  $this->arr_buttons['binicio']['hint']             = $Nm_lang['lang_btns_frst_hint'];
  $this->arr_buttons['binicio']['type']             = 'button';
  $this->arr_buttons['binicio']['value']            = $Nm_lang['lang_btns_frst'];
  $this->arr_buttons['binicio']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['binicio']['display_position'] = 'img_right';
  $this->arr_buttons['binicio']['fontawesomeicon']  = 'fas fa-step-backward';
  $this->arr_buttons['binicio']['style'] = 'fontawesome';
  $this->arr_buttons['binicio']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_last_enabled.png';

  $this->arr_buttons['bretorna']['hint']             = $Nm_lang['lang_btns_prev_hint'];
  $this->arr_buttons['bretorna']['type']             = 'button';
  $this->arr_buttons['bretorna']['value']            = $Nm_lang['lang_btns_prev'];
  $this->arr_buttons['bretorna']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bretorna']['display_position'] = 'img_right';
  $this->arr_buttons['bretorna']['fontawesomeicon']  = 'fas fa-arrow-left';
  $this->arr_buttons['bretorna']['style'] = 'fontawesome';
  $this->arr_buttons['bretorna']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_right_enabled.png';

  $this->arr_buttons['bavanca']['hint']             = $Nm_lang['lang_btns_next_hint'];
  $this->arr_buttons['bavanca']['type']             = 'button';
  $this->arr_buttons['bavanca']['value']            = $Nm_lang['lang_btns_next'];
  $this->arr_buttons['bavanca']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bavanca']['display_position'] = 'img_right';
  $this->arr_buttons['bavanca']['fontawesomeicon']  = 'fas fa-arrow-right';
  $this->arr_buttons['bavanca']['style'] = 'fontawesome';
  $this->arr_buttons['bavanca']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_left_enabled.png';

  $this->arr_buttons['bfinal']['hint']             = $Nm_lang['lang_btns_last_hint'];
  $this->arr_buttons['bfinal']['type']             = 'button';
  $this->arr_buttons['bfinal']['value']            = $Nm_lang['lang_btns_last'];
  $this->arr_buttons['bfinal']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bfinal']['display_position'] = 'img_right';
  $this->arr_buttons['bfinal']['fontawesomeicon']  = 'fas fa-step-forward';
  $this->arr_buttons['bfinal']['style'] = 'fontawesome';
  $this->arr_buttons['bfinal']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_first_enabled.png';

  $this->arr_buttons['bincluir']['hint']             = $Nm_lang['lang_btns_inst_hint'];
  $this->arr_buttons['bincluir']['type']             = 'button';
  $this->arr_buttons['bincluir']['value']            = $Nm_lang['lang_btns_inst'];
  $this->arr_buttons['bincluir']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bincluir']['display_position'] = 'img_right';
  $this->arr_buttons['bincluir']['fontawesomeicon']  = 'fas fa-plus';
  $this->arr_buttons['bincluir']['style'] = 'ok';
  $this->arr_buttons['bincluir']['image'] = 'sys__NM__nm_teste_bincluir.gif';

  $this->arr_buttons['bexcluir']['hint']             = $Nm_lang['lang_btns_dele_hint'];
  $this->arr_buttons['bexcluir']['type']             = 'button';
  $this->arr_buttons['bexcluir']['value']            = $Nm_lang['lang_btns_dele'];
  $this->arr_buttons['bexcluir']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bexcluir']['display_position'] = 'img_right';
  $this->arr_buttons['bexcluir']['fontawesomeicon']  = 'fas fa-trash';
  $this->arr_buttons['bexcluir']['style'] = 'danger';
  $this->arr_buttons['bexcluir']['image'] = 'sys__NM__nm_teste_bexcluir.gif';

  $this->arr_buttons['balterar']['hint']             = $Nm_lang['lang_btns_updt_hint'];
  $this->arr_buttons['balterar']['type']             = 'button';
  $this->arr_buttons['balterar']['value']            = $Nm_lang['lang_btns_updt'];
  $this->arr_buttons['balterar']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['balterar']['display_position'] = 'img_right';
  $this->arr_buttons['balterar']['fontawesomeicon']  = 'fas fa-save';
  $this->arr_buttons['balterar']['style'] = 'default';
  $this->arr_buttons['balterar']['image'] = 'sys__NM__nm_teste_balterar.gif';

  $this->arr_buttons['bexcluirsel']['hint']             = $Nm_lang['lang_btns_dl_sel_hint'];
  $this->arr_buttons['bexcluirsel']['type']             = 'button';
  $this->arr_buttons['bexcluirsel']['value']            = $Nm_lang['lang_btns_dl_sel'];
  $this->arr_buttons['bexcluirsel']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bexcluirsel']['display_position'] = 'img_right';
  $this->arr_buttons['bexcluirsel']['fontawesomeicon']  = 'fas fa-trash';
  $this->arr_buttons['bexcluirsel']['style'] = 'danger';
  $this->arr_buttons['bexcluirsel']['image'] = 'sys__NM__nm_teste_bexcluirsel.gif';

  $this->arr_buttons['balterarsel']['hint']             = $Nm_lang['lang_btns_sv_sel_hint'];
  $this->arr_buttons['balterarsel']['type']             = 'button';
  $this->arr_buttons['balterarsel']['value']            = $Nm_lang['lang_btns_sv_sel'];
  $this->arr_buttons['balterarsel']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['balterarsel']['display_position'] = 'img_right';
  $this->arr_buttons['balterarsel']['fontawesomeicon']  = 'fas fa-save';
  $this->arr_buttons['balterarsel']['style'] = 'default';
  $this->arr_buttons['balterarsel']['image'] = 'sys__NM__nm_teste_balterarsel.gif';

  $this->arr_buttons['bnovo']['hint']             = $Nm_lang['lang_btns_neww_hint'];
  $this->arr_buttons['bnovo']['type']             = 'button';
  $this->arr_buttons['bnovo']['value']            = $Nm_lang['lang_btns_neww'];
  $this->arr_buttons['bnovo']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bnovo']['display_position'] = 'img_right';
  $this->arr_buttons['bnovo']['fontawesomeicon']  = 'fas fa-plus';
  $this->arr_buttons['bnovo']['style'] = 'ok';
  $this->arr_buttons['bnovo']['image'] = 'sys__NM__nm_teste_bnovo.gif';

  $this->arr_buttons['bform_editar']['hint']             = $Nm_lang['lang_btns_pncl_hint'];
  $this->arr_buttons['bform_editar']['type']             = 'button';
  $this->arr_buttons['bform_editar']['value']            = $Nm_lang['lang_btns_pncl'];
  $this->arr_buttons['bform_editar']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bform_editar']['display_position'] = 'img_right';
  $this->arr_buttons['bform_editar']['fontawesomeicon']  = 'fas fa-edit';
  $this->arr_buttons['bform_editar']['style'] = 'fontawesome';
  $this->arr_buttons['bform_editar']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_edit.png';

  $this->arr_buttons['bform_captura']['hint']             = $Nm_lang['lang_btns_rtrv_grid_hint'];
  $this->arr_buttons['bform_captura']['type']             = 'button';
  $this->arr_buttons['bform_captura']['value']            = $Nm_lang['lang_btns_rtrv_grid'];
  $this->arr_buttons['bform_captura']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bform_captura']['display_position'] = 'img_right';
  $this->arr_buttons['bform_captura']['fontawesomeicon']  = 'fas fa-search';
  $this->arr_buttons['bform_captura']['style'] = 'fontawesome';
  $this->arr_buttons['bform_captura']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_search.png';

  $this->arr_buttons['bform_lookuplink']['hint']             = $Nm_lang['lang_btns_rtrv_form_hint'];
  $this->arr_buttons['bform_lookuplink']['type']             = 'button';
  $this->arr_buttons['bform_lookuplink']['value']            = $Nm_lang['lang_btns_rtrv_form'];
  $this->arr_buttons['bform_lookuplink']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bform_lookuplink']['display_position'] = 'img_right';
  $this->arr_buttons['bform_lookuplink']['fontawesomeicon']  = 'fas fa-edit';
  $this->arr_buttons['bform_lookuplink']['style'] = 'default';
  $this->arr_buttons['bform_lookuplink']['image'] = 'sys__NM__nm_teste_bform_lookuplink.gif';

  $this->arr_buttons['bok']['hint']             = $Nm_lang['lang_btns_cfrm_hint'];
  $this->arr_buttons['bok']['type']             = 'button';
  $this->arr_buttons['bok']['value']            = $Nm_lang['lang_btns_cfrm'];
  $this->arr_buttons['bok']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bok']['display_position'] = 'img_right';
  $this->arr_buttons['bok']['fontawesomeicon']  = 'fas fa-check';
  $this->arr_buttons['bok']['style'] = 'ok';
  $this->arr_buttons['bok']['image'] = 'sys__NM__nm_teste_bok.gif';

  $this->arr_buttons['bcalendario']['hint']             = $Nm_lang['lang_btns_cldr_hint'];
  $this->arr_buttons['bcalendario']['type']             = 'button';
  $this->arr_buttons['bcalendario']['value']            = $Nm_lang['lang_btns_cldr'];
  $this->arr_buttons['bcalendario']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bcalendario']['display_position'] = 'img_right';
  $this->arr_buttons['bcalendario']['fontawesomeicon']  = 'fas fa-calendar-alt';
  $this->arr_buttons['bcalendario']['style'] = 'fontawesome';
  $this->arr_buttons['bcalendario']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_date.png';

  $this->arr_buttons['bcalculadora']['hint']             = $Nm_lang['lang_btns_calc_hint'];
  $this->arr_buttons['bcalculadora']['type']             = 'button';
  $this->arr_buttons['bcalculadora']['value']            = $Nm_lang['lang_btns_calc'];
  $this->arr_buttons['bcalculadora']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bcalculadora']['display_position'] = 'img_right';
  $this->arr_buttons['bcalculadora']['fontawesomeicon']  = 'fas fa-calculator';
  $this->arr_buttons['bcalculadora']['style'] = 'fontawesome';
  $this->arr_buttons['bcalculadora']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_calc.png';

  $this->arr_buttons['bajaxcapt']['hint']             = $Nm_lang['lang_btns_ajax_hint'];
  $this->arr_buttons['bajaxcapt']['type']             = 'button';
  $this->arr_buttons['bajaxcapt']['value']            = $Nm_lang['lang_btns_ajax'];
  $this->arr_buttons['bajaxcapt']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bajaxcapt']['display_position'] = 'img_right';
  $this->arr_buttons['bajaxcapt']['fontawesomeicon']  = 'fas fa-search';
  $this->arr_buttons['bajaxcapt']['style'] = 'fontawesome';
  $this->arr_buttons['bajaxcapt']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_search.png';

  $this->arr_buttons['bajaxclose']['hint']             = $Nm_lang['lang_btns_ajax_close_hint'];
  $this->arr_buttons['bajaxclose']['type']             = 'button';
  $this->arr_buttons['bajaxclose']['value']            = $Nm_lang['lang_btns_ajax_close'];
  $this->arr_buttons['bajaxclose']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bajaxclose']['display_position'] = 'img_right';
  $this->arr_buttons['bajaxclose']['fontawesomeicon']  = 'fas fa-times';
  $this->arr_buttons['bajaxclose']['style'] = 'fontawesome';
  $this->arr_buttons['bajaxclose']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_close.png';

  $this->arr_buttons['bcaptchareload']['hint']             = $Nm_lang['lang_btns_cptc_rfim_hint'];
  $this->arr_buttons['bcaptchareload']['type']             = 'button';
  $this->arr_buttons['bcaptchareload']['value']            = $Nm_lang['lang_btns_cptc_rfim'];
  $this->arr_buttons['bcaptchareload']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bcaptchareload']['display_position'] = 'img_right';
  $this->arr_buttons['bcaptchareload']['fontawesomeicon']  = 'fas fa-sync-alt';
  $this->arr_buttons['bcaptchareload']['style'] = 'fontawesome';
  $this->arr_buttons['bcaptchareload']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_refresh.png';

  $this->arr_buttons['bsrch_mtmf']['hint']             = $Nm_lang['lang_btns_srch_mtmf_hint'];
  $this->arr_buttons['bsrch_mtmf']['type']             = 'button';
  $this->arr_buttons['bsrch_mtmf']['value']            = $Nm_lang['lang_btns_srch_mtmf'];
  $this->arr_buttons['bsrch_mtmf']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bsrch_mtmf']['display_position'] = 'img_right';
  $this->arr_buttons['bsrch_mtmf']['fontawesomeicon']  = 'fas fa-search';
  $this->arr_buttons['bsrch_mtmf']['style'] = 'ok';
  $this->arr_buttons['bsrch_mtmf']['image'] = 'sys__NM__nm_teste_bsrch_mtmf.gif';

  $this->arr_buttons['bcopy']['hint']             = $Nm_lang['lang_btns_copy_hint'];
  $this->arr_buttons['bcopy']['type']             = 'button';
  $this->arr_buttons['bcopy']['value']            = $Nm_lang['lang_btns_copy'];
  $this->arr_buttons['bcopy']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bcopy']['display_position'] = 'img_right';
  $this->arr_buttons['bcopy']['fontawesomeicon']  = 'fas fa-copy';
  $this->arr_buttons['bcopy']['style'] = 'default';
  $this->arr_buttons['bcopy']['image'] = 'sys__NM__nm_teste_bcopy.gif';

  $this->arr_buttons['binicio_off']['hint']             = $Nm_lang['lang_btns_frst_hint'];
  $this->arr_buttons['binicio_off']['type']             = 'image';
  $this->arr_buttons['binicio_off']['value']            = $Nm_lang['lang_btns_frst'];
  $this->arr_buttons['binicio_off']['display']          = 'only_text';
  $this->arr_buttons['binicio_off']['display_position'] = 'img_right';
  $this->arr_buttons['binicio_off']['fontawesomeicon']  = '';
  $this->arr_buttons['binicio_off']['style'] = 'disabledSCImage';
  $this->arr_buttons['binicio_off']['image'] = 'scriptcase__NM__nm_scriptcase9_SweetBlue_binicio_off.gif';

  $this->arr_buttons['bretorna_off']['hint']             = $Nm_lang['lang_btns_prev_hint'];
  $this->arr_buttons['bretorna_off']['type']             = 'image';
  $this->arr_buttons['bretorna_off']['value']            = $Nm_lang['lang_btns_prev'];
  $this->arr_buttons['bretorna_off']['display']          = 'only_text';
  $this->arr_buttons['bretorna_off']['display_position'] = 'img_right';
  $this->arr_buttons['bretorna_off']['fontawesomeicon']  = '';
  $this->arr_buttons['bretorna_off']['style'] = 'disabledSCImage';
  $this->arr_buttons['bretorna_off']['image'] = 'scriptcase__NM__nm_scriptcase9_SweetBlue_bretorna_off.gif';

  $this->arr_buttons['bavanca_off']['hint']             = $Nm_lang['lang_btns_next_hint'];
  $this->arr_buttons['bavanca_off']['type']             = 'image';
  $this->arr_buttons['bavanca_off']['value']            = $Nm_lang['lang_btns_next'];
  $this->arr_buttons['bavanca_off']['display']          = 'only_text';
  $this->arr_buttons['bavanca_off']['display_position'] = 'img_right';
  $this->arr_buttons['bavanca_off']['fontawesomeicon']  = '';
  $this->arr_buttons['bavanca_off']['style'] = 'disabledSCImage';
  $this->arr_buttons['bavanca_off']['image'] = 'scriptcase__NM__nm_scriptcase9_SweetBlue_bavanca_off.gif';

  $this->arr_buttons['bfinal_off']['hint']             = $Nm_lang['lang_btns_last_hint'];
  $this->arr_buttons['bfinal_off']['type']             = 'image';
  $this->arr_buttons['bfinal_off']['value']            = $Nm_lang['lang_btns_last'];
  $this->arr_buttons['bfinal_off']['display']          = 'only_text';
  $this->arr_buttons['bfinal_off']['display_position'] = 'img_right';
  $this->arr_buttons['bfinal_off']['fontawesomeicon']  = '';
  $this->arr_buttons['bfinal_off']['style'] = 'disabledSCImage';
  $this->arr_buttons['bfinal_off']['image'] = 'scriptcase__NM__nm_scriptcase9_SweetBlue_bfinal_off.gif';

  $this->arr_buttons['bcresumo']['hint']             = $Nm_lang['lang_btns_smry_hint'];
  $this->arr_buttons['bcresumo']['type']             = 'button';
  $this->arr_buttons['bcresumo']['value']            = $Nm_lang['lang_btns_smry'];
  $this->arr_buttons['bcresumo']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bcresumo']['display_position'] = 'text_right';
  $this->arr_buttons['bcresumo']['fontawesomeicon']  = 'fas fa-th-list';
  $this->arr_buttons['bcresumo']['style'] = 'ok';
  $this->arr_buttons['bcresumo']['image'] = 'scriptcase__NM__nm_scriptcase8_BlueWood_bcresumo.gif';

  $this->arr_buttons['bcsort']['hint']             = $Nm_lang['lang_btns_sort_hint'];
  $this->arr_buttons['bcsort']['type']             = 'button';
  $this->arr_buttons['bcsort']['value']            = $Nm_lang['lang_btns_sort'];
  $this->arr_buttons['bcsort']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bcsort']['display_position'] = 'text_right';
  $this->arr_buttons['bcsort']['fontawesomeicon']  = 'fas fa-sort-amount-down';
  $this->arr_buttons['bcsort']['style'] = 'default';
  $this->arr_buttons['bcsort']['image'] = 'scriptcase__NM__sc_ico_order_b.png';

  $this->arr_buttons['bctype']['hint']             = $Nm_lang['lang_btns_ctype_hint'];
  $this->arr_buttons['bctype']['type']             = 'button';
  $this->arr_buttons['bctype']['value']            = $Nm_lang['lang_btns_ctype'];
  $this->arr_buttons['bctype']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bctype']['display_position'] = 'text_right';
  $this->arr_buttons['bctype']['fontawesomeicon']  = 'fas fa-chart-pie';
  $this->arr_buttons['bctype']['style'] = 'default';
  $this->arr_buttons['bctype']['image'] = 'scriptcase__NM__nm_scriptcase8_BlueWood_bctype.gif';

  $this->arr_buttons['bcpersonalite']['hint']             = $Nm_lang['lang_btns_ctpersonalite_hint'];
  $this->arr_buttons['bcpersonalite']['type']             = 'button';
  $this->arr_buttons['bcpersonalite']['value']            = $Nm_lang['lang_btns_ctpersonalite'];
  $this->arr_buttons['bcpersonalite']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bcpersonalite']['display_position'] = 'text_right';
  $this->arr_buttons['bcpersonalite']['fontawesomeicon']  = 'fas fa-cog';
  $this->arr_buttons['bcpersonalite']['style'] = 'default';
  $this->arr_buttons['bcpersonalite']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_set_charts.png';

  $this->arr_buttons['bchart_bar']['hint']             = $Nm_lang['lang_btns_ctbar_hint'];
  $this->arr_buttons['bchart_bar']['type']             = 'button';
  $this->arr_buttons['bchart_bar']['value']            = $Nm_lang['lang_btns_ctbar'];
  $this->arr_buttons['bchart_bar']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bchart_bar']['display_position'] = 'text_right';
  $this->arr_buttons['bchart_bar']['fontawesomeicon']  = 'fas fa-chart-bar';
  $this->arr_buttons['bchart_bar']['style'] = 'icons';
  $this->arr_buttons['bchart_bar']['image'] = 'scriptcase__NM__sc_ico_bar_c.png';

  $this->arr_buttons['bchart_line']['hint']             = $Nm_lang['lang_btns_ctline_hint'];
  $this->arr_buttons['bchart_line']['type']             = 'button';
  $this->arr_buttons['bchart_line']['value']            = $Nm_lang['lang_btns_ctline'];
  $this->arr_buttons['bchart_line']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bchart_line']['display_position'] = 'text_right';
  $this->arr_buttons['bchart_line']['fontawesomeicon']  = 'fas fa-chart-line';
  $this->arr_buttons['bchart_line']['style'] = 'icons';
  $this->arr_buttons['bchart_line']['image'] = 'scriptcase__NM__sc_ico_line_c.png';

  $this->arr_buttons['bchart_area']['hint']             = $Nm_lang['lang_btns_ctarea_hint'];
  $this->arr_buttons['bchart_area']['type']             = 'button';
  $this->arr_buttons['bchart_area']['value']            = $Nm_lang['lang_btns_ctarea'];
  $this->arr_buttons['bchart_area']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bchart_area']['display_position'] = 'text_right';
  $this->arr_buttons['bchart_area']['fontawesomeicon']  = 'fas fa-chart-area';
  $this->arr_buttons['bchart_area']['style'] = 'icons';
  $this->arr_buttons['bchart_area']['image'] = 'scriptcase__NM__sc_ico_area_c.png';

  $this->arr_buttons['bchart_pizza']['hint']             = $Nm_lang['lang_btns_ctpizza_hint'];
  $this->arr_buttons['bchart_pizza']['type']             = 'button';
  $this->arr_buttons['bchart_pizza']['value']            = $Nm_lang['lang_btns_ctpizza'];
  $this->arr_buttons['bchart_pizza']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bchart_pizza']['display_position'] = 'text_right';
  $this->arr_buttons['bchart_pizza']['fontawesomeicon']  = 'fas fa-chart-pie';
  $this->arr_buttons['bchart_pizza']['style'] = 'icons';
  $this->arr_buttons['bchart_pizza']['image'] = 'scriptcase__NM__sc_ico_pizza_c.png';

  $this->arr_buttons['bchart_combo']['hint']             = $Nm_lang['lang_btns_ctcombo_hint'];
  $this->arr_buttons['bchart_combo']['type']             = 'button';
  $this->arr_buttons['bchart_combo']['value']            = $Nm_lang['lang_btns_ctcombo'];
  $this->arr_buttons['bchart_combo']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bchart_combo']['display_position'] = 'text_right';
  $this->arr_buttons['bchart_combo']['fontawesomeicon']  = 'fas fa-shapes';
  $this->arr_buttons['bchart_combo']['style'] = 'icons';
  $this->arr_buttons['bchart_combo']['image'] = 'scriptcase__NM__sc_ico_combo_c.png';

  $this->arr_buttons['bchart_stack']['hint']             = $Nm_lang['lang_btns_ctstack_hint'];
  $this->arr_buttons['bchart_stack']['type']             = 'button';
  $this->arr_buttons['bchart_stack']['value']            = $Nm_lang['lang_btns_ctstack'];
  $this->arr_buttons['bchart_stack']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bchart_stack']['display_position'] = 'text_right';
  $this->arr_buttons['bchart_stack']['fontawesomeicon']  = 'fas fa-layer-group';
  $this->arr_buttons['bchart_stack']['style'] = 'icons';
  $this->arr_buttons['bchart_stack']['image'] = 'scriptcase__NM__sc_ico_stack_c.png';

  $this->arr_buttons['bcsort_on']['hint']             = $Nm_lang['lang_btns_sort_hint'];
  $this->arr_buttons['bcsort_on']['type']             = 'button';
  $this->arr_buttons['bcsort_on']['value']            = $Nm_lang['lang_btns_sort'];
  $this->arr_buttons['bcsort_on']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bcsort_on']['display_position'] = 'text_right';
  $this->arr_buttons['bcsort_on']['fontawesomeicon']  = 'fas fa-sort-amount-down';
  $this->arr_buttons['bcsort_on']['style'] = 'default';
  $this->arr_buttons['bcsort_on']['image'] = 'scriptcase__NM__sc_ico_order_c.png';

  $this->arr_buttons['bchart_bar_on']['hint']             = $Nm_lang['lang_btns_ctbar_hint'];
  $this->arr_buttons['bchart_bar_on']['type']             = 'button';
  $this->arr_buttons['bchart_bar_on']['value']            = $Nm_lang['lang_btns_ctbar'];
  $this->arr_buttons['bchart_bar_on']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bchart_bar_on']['display_position'] = 'text_right';
  $this->arr_buttons['bchart_bar_on']['fontawesomeicon']  = 'fas fa-chart-bar';
  $this->arr_buttons['bchart_bar_on']['style'] = 'icons';
  $this->arr_buttons['bchart_bar_on']['image'] = 'scriptcase__NM__sc_ico_bar_c.png';

  $this->arr_buttons['bchart_line_on']['hint']             = $Nm_lang['lang_btns_ctline_hint'];
  $this->arr_buttons['bchart_line_on']['type']             = 'button';
  $this->arr_buttons['bchart_line_on']['value']            = $Nm_lang['lang_btns_ctline'];
  $this->arr_buttons['bchart_line_on']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bchart_line_on']['display_position'] = 'text_right';
  $this->arr_buttons['bchart_line_on']['fontawesomeicon']  = 'fas fa-chart-line';
  $this->arr_buttons['bchart_line_on']['style'] = 'icons';
  $this->arr_buttons['bchart_line_on']['image'] = 'scriptcase__NM__sc_ico_line_c.png';

  $this->arr_buttons['bchart_area_on']['hint']             = $Nm_lang['lang_btns_ctarea_hint'];
  $this->arr_buttons['bchart_area_on']['type']             = 'button';
  $this->arr_buttons['bchart_area_on']['value']            = $Nm_lang['lang_btns_ctarea'];
  $this->arr_buttons['bchart_area_on']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bchart_area_on']['display_position'] = 'text_right';
  $this->arr_buttons['bchart_area_on']['fontawesomeicon']  = 'fas fa-chart-area';
  $this->arr_buttons['bchart_area_on']['style'] = 'icons';
  $this->arr_buttons['bchart_area_on']['image'] = 'scriptcase__NM__sc_ico_area_c.png';

  $this->arr_buttons['bchart_pizza_on']['hint']             = $Nm_lang['lang_btns_ctpizza_hint'];
  $this->arr_buttons['bchart_pizza_on']['type']             = 'button';
  $this->arr_buttons['bchart_pizza_on']['value']            = $Nm_lang['lang_btns_ctpizza'];
  $this->arr_buttons['bchart_pizza_on']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bchart_pizza_on']['display_position'] = 'text_right';
  $this->arr_buttons['bchart_pizza_on']['fontawesomeicon']  = 'fas fa-chart-pie';
  $this->arr_buttons['bchart_pizza_on']['style'] = 'icons';
  $this->arr_buttons['bchart_pizza_on']['image'] = 'scriptcase__NM__sc_ico_pizza_c.png';

  $this->arr_buttons['bchart_combo_on']['hint']             = $Nm_lang['lang_btns_ctcombo_hint'];
  $this->arr_buttons['bchart_combo_on']['type']             = 'button';
  $this->arr_buttons['bchart_combo_on']['value']            = $Nm_lang['lang_btns_ctcombo'];
  $this->arr_buttons['bchart_combo_on']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bchart_combo_on']['display_position'] = 'text_right';
  $this->arr_buttons['bchart_combo_on']['fontawesomeicon']  = 'fas fa-shapes';
  $this->arr_buttons['bchart_combo_on']['style'] = 'icons';
  $this->arr_buttons['bchart_combo_on']['image'] = 'scriptcase__NM__sc_ico_combo_c.png';

  $this->arr_buttons['bchart_stack_on']['hint']             = $Nm_lang['lang_btns_ctstack_hint'];
  $this->arr_buttons['bchart_stack_on']['type']             = 'button';
  $this->arr_buttons['bchart_stack_on']['value']            = $Nm_lang['lang_btns_ctstack'];
  $this->arr_buttons['bchart_stack_on']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bchart_stack_on']['display_position'] = 'text_right';
  $this->arr_buttons['bchart_stack_on']['fontawesomeicon']  = 'fas fa-layer-group';
  $this->arr_buttons['bchart_stack_on']['style'] = 'icons';
  $this->arr_buttons['bchart_stack_on']['image'] = 'scriptcase__NM__sc_ico_stack_c.png';

  $this->arr_buttons['bcsort_off']['hint']             = $Nm_lang['lang_btns_sort_hint'];
  $this->arr_buttons['bcsort_off']['type']             = 'image';
  $this->arr_buttons['bcsort_off']['value']            = $Nm_lang['lang_btns_sort'];
  $this->arr_buttons['bcsort_off']['display']          = 'only_text';
  $this->arr_buttons['bcsort_off']['display_position'] = 'img_right';
  $this->arr_buttons['bcsort_off']['fontawesomeicon']  = '';
  $this->arr_buttons['bcsort_off']['style'] = 'disabledSCImage';
  $this->arr_buttons['bcsort_off']['image'] = 'scriptcase__NM__nm_scriptcase9_SweetBlue_bcsort_off.gif';

  $this->arr_buttons['bchart_bar_off']['hint']             = $Nm_lang['lang_btns_ctbar_hint'];
  $this->arr_buttons['bchart_bar_off']['type']             = 'image';
  $this->arr_buttons['bchart_bar_off']['value']            = $Nm_lang['lang_btns_ctbar'];
  $this->arr_buttons['bchart_bar_off']['display']          = 'only_text';
  $this->arr_buttons['bchart_bar_off']['display_position'] = 'img_right';
  $this->arr_buttons['bchart_bar_off']['fontawesomeicon']  = '';
  $this->arr_buttons['bchart_bar_off']['style'] = 'disabledSCImage';
  $this->arr_buttons['bchart_bar_off']['image'] = 'scriptcase__NM__nm_scriptcase9_SweetBlue_bchart_bar_off.gif';

  $this->arr_buttons['bchart_line_off']['hint']             = $Nm_lang['lang_btns_ctline_hint'];
  $this->arr_buttons['bchart_line_off']['type']             = 'image';
  $this->arr_buttons['bchart_line_off']['value']            = $Nm_lang['lang_btns_ctline'];
  $this->arr_buttons['bchart_line_off']['display']          = 'only_text';
  $this->arr_buttons['bchart_line_off']['display_position'] = 'img_right';
  $this->arr_buttons['bchart_line_off']['fontawesomeicon']  = '';
  $this->arr_buttons['bchart_line_off']['style'] = 'disabledSCImage';
  $this->arr_buttons['bchart_line_off']['image'] = 'scriptcase__NM__nm_scriptcase9_SweetBlue_bchart_line_off.gif';

  $this->arr_buttons['bchart_area_off']['hint']             = $Nm_lang['lang_btns_ctarea_hint'];
  $this->arr_buttons['bchart_area_off']['type']             = 'image';
  $this->arr_buttons['bchart_area_off']['value']            = $Nm_lang['lang_btns_ctarea'];
  $this->arr_buttons['bchart_area_off']['display']          = 'only_text';
  $this->arr_buttons['bchart_area_off']['display_position'] = 'img_right';
  $this->arr_buttons['bchart_area_off']['fontawesomeicon']  = '';
  $this->arr_buttons['bchart_area_off']['style'] = 'disabledSCImage';
  $this->arr_buttons['bchart_area_off']['image'] = 'scriptcase__NM__nm_scriptcase9_SweetBlue_bchart_area_off.gif';

  $this->arr_buttons['bchart_pizza_off']['hint']             = $Nm_lang['lang_btns_ctpizza_hint'];
  $this->arr_buttons['bchart_pizza_off']['type']             = 'image';
  $this->arr_buttons['bchart_pizza_off']['value']            = $Nm_lang['lang_btns_ctpizza'];
  $this->arr_buttons['bchart_pizza_off']['display']          = 'only_text';
  $this->arr_buttons['bchart_pizza_off']['display_position'] = 'img_right';
  $this->arr_buttons['bchart_pizza_off']['fontawesomeicon']  = '';
  $this->arr_buttons['bchart_pizza_off']['style'] = 'disabledSCImage';
  $this->arr_buttons['bchart_pizza_off']['image'] = 'scriptcase__NM__nm_scriptcase9_SweetBlue_bchart_pizza_off.gif';

  $this->arr_buttons['bchart_combo_off']['hint']             = $Nm_lang['lang_btns_ctcombo_hint'];
  $this->arr_buttons['bchart_combo_off']['type']             = 'image';
  $this->arr_buttons['bchart_combo_off']['value']            = $Nm_lang['lang_btns_ctcombo'];
  $this->arr_buttons['bchart_combo_off']['display']          = 'only_text';
  $this->arr_buttons['bchart_combo_off']['display_position'] = 'img_right';
  $this->arr_buttons['bchart_combo_off']['fontawesomeicon']  = '';
  $this->arr_buttons['bchart_combo_off']['style'] = 'disabledSCImage';
  $this->arr_buttons['bchart_combo_off']['image'] = 'scriptcase__NM__nm_scriptcase9_SweetBlue_bchart_combo_off.gif';

  $this->arr_buttons['bchart_stack_off']['hint']             = $Nm_lang['lang_btns_ctstack_hint'];
  $this->arr_buttons['bchart_stack_off']['type']             = 'image';
  $this->arr_buttons['bchart_stack_off']['value']            = $Nm_lang['lang_btns_ctstack'];
  $this->arr_buttons['bchart_stack_off']['display']          = 'only_text';
  $this->arr_buttons['bchart_stack_off']['display_position'] = 'img_right';
  $this->arr_buttons['bchart_stack_off']['fontawesomeicon']  = '';
  $this->arr_buttons['bchart_stack_off']['style'] = 'disabledSCImage';
  $this->arr_buttons['bchart_stack_off']['image'] = 'scriptcase__NM__nm_scriptcase9_SweetBlue_bchart_stack_off.gif';

  $this->arr_buttons['bpesquisa']['hint']             = $Nm_lang['lang_btns_srch_hint'];
  $this->arr_buttons['bpesquisa']['type']             = 'button';
  $this->arr_buttons['bpesquisa']['value']            = $Nm_lang['lang_btns_srch'];
  $this->arr_buttons['bpesquisa']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bpesquisa']['display_position'] = 'img_right';
  $this->arr_buttons['bpesquisa']['fontawesomeicon']  = 'fas fa-search';
  $this->arr_buttons['bpesquisa']['style'] = 'ok';
  $this->arr_buttons['bpesquisa']['image'] = 'sys__NM__nm_teste_bpesquisa.gif';

  $this->arr_buttons['blimpar']['hint']             = $Nm_lang['lang_btns_clea_hint'];
  $this->arr_buttons['blimpar']['type']             = 'button';
  $this->arr_buttons['blimpar']['value']            = $Nm_lang['lang_btns_clea'];
  $this->arr_buttons['blimpar']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['blimpar']['display_position'] = 'img_right';
  $this->arr_buttons['blimpar']['fontawesomeicon']  = 'fas fa-broom';
  $this->arr_buttons['blimpar']['style'] = 'default';
  $this->arr_buttons['blimpar']['image'] = 'sys__NM__nm_teste_blimpar.gif';

  $this->arr_buttons['bsalvar']['hint']             = $Nm_lang['lang_btns_save_hint'];
  $this->arr_buttons['bsalvar']['type']             = 'button';
  $this->arr_buttons['bsalvar']['value']            = $Nm_lang['lang_btns_save'];
  $this->arr_buttons['bsalvar']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bsalvar']['display_position'] = 'img_right';
  $this->arr_buttons['bsalvar']['fontawesomeicon']  = 'fas fa-save';
  $this->arr_buttons['bsalvar']['style'] = 'small';
  $this->arr_buttons['bsalvar']['image'] = 'sys__NM__nm_teste_bsalvar.gif';

  $this->arr_buttons['bedit_filter']['hint']             = $Nm_lang['lang_btns_srch_edit_hint'];
  $this->arr_buttons['bedit_filter']['type']             = 'button';
  $this->arr_buttons['bedit_filter']['value']            = $Nm_lang['lang_btns_srch_edit'];
  $this->arr_buttons['bedit_filter']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bedit_filter']['display_position'] = 'img_right';
  $this->arr_buttons['bedit_filter']['fontawesomeicon']  = 'fas fa-save';
  $this->arr_buttons['bedit_filter']['style'] = 'default';
  $this->arr_buttons['bedit_filter']['image'] = 'sys__NM__nm_teste_bedit_filter.gif';

  $this->arr_buttons['bquick_search']['hint']             = $Nm_lang['lang_btns_quck_srch_hint'];
  $this->arr_buttons['bquick_search']['type']             = 'button';
  $this->arr_buttons['bquick_search']['value']            = $Nm_lang['lang_btns_quck_srch'];
  $this->arr_buttons['bquick_search']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bquick_search']['display_position'] = 'img_right';
  $this->arr_buttons['bquick_search']['fontawesomeicon']  = 'fas fa-search';
  $this->arr_buttons['bquick_search']['style'] = 'fontawesome';
  $this->arr_buttons['bquick_search']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_search.png';

  $this->arr_buttons['blimparsummaryfield']['hint']             = $Nm_lang['lang_btns_clean_summary_field_hint'];
  $this->arr_buttons['blimparsummaryfield']['type']             = 'link';
  $this->arr_buttons['blimparsummaryfield']['value']            = $Nm_lang['lang_btns_clean_summary_field'];
  $this->arr_buttons['blimparsummaryfield']['display']          = 'only_text';
  $this->arr_buttons['blimparsummaryfield']['display_position'] = 'text_right';
  $this->arr_buttons['blimparsummaryfield']['fontawesomeicon']  = '';
  $this->arr_buttons['blimparsummaryfield']['style'] = 'default';
  $this->arr_buttons['blimparsummaryfield']['image'] = '';

  $this->arr_buttons['blimparsummaryall']['hint']             = $Nm_lang['lang_btns_clean_summary_all_hint'];
  $this->arr_buttons['blimparsummaryall']['type']             = 'button';
  $this->arr_buttons['blimparsummaryall']['value']            = $Nm_lang['lang_btns_clean_summary_all'];
  $this->arr_buttons['blimparsummaryall']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['blimparsummaryall']['display_position'] = 'text_right';
  $this->arr_buttons['blimparsummaryall']['fontawesomeicon']  = 'fas fa-broom';
  $this->arr_buttons['blimparsummaryall']['style'] = 'cancel';
  $this->arr_buttons['blimparsummaryall']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_blimparsummaryall.gif';

  $this->arr_buttons['boksummary']['hint']             = $Nm_lang['lang_btns_ok_summary_hint'];
  $this->arr_buttons['boksummary']['type']             = 'button';
  $this->arr_buttons['boksummary']['value']            = $Nm_lang['lang_btns_ok_summary'];
  $this->arr_buttons['boksummary']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['boksummary']['display_position'] = 'text_right';
  $this->arr_buttons['boksummary']['fontawesomeicon']  = 'fas fa-check';
  $this->arr_buttons['boksummary']['style'] = 'ok';
  $this->arr_buttons['boksummary']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_boksummary.gif';

  $this->arr_buttons['bmd_incluir']['hint']             = $Nm_lang['lang_btns_mdtl_inst_hint'];
  $this->arr_buttons['bmd_incluir']['type']             = 'button';
  $this->arr_buttons['bmd_incluir']['value']            = $Nm_lang['lang_btns_mdtl_inst'];
  $this->arr_buttons['bmd_incluir']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bmd_incluir']['display_position'] = 'img_right';
  $this->arr_buttons['bmd_incluir']['fontawesomeicon']  = 'fas fa-check';
  $this->arr_buttons['bmd_incluir']['style'] = 'fontawesome';
  $this->arr_buttons['bmd_incluir']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_done.png';

  $this->arr_buttons['bmd_excluir']['hint']             = $Nm_lang['lang_btns_mdtl_dele_hint'];
  $this->arr_buttons['bmd_excluir']['type']             = 'button';
  $this->arr_buttons['bmd_excluir']['value']            = $Nm_lang['lang_btns_mdtl_dele'];
  $this->arr_buttons['bmd_excluir']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bmd_excluir']['display_position'] = 'img_right';
  $this->arr_buttons['bmd_excluir']['fontawesomeicon']  = 'fas fa-trash';
  $this->arr_buttons['bmd_excluir']['style'] = 'fontawesome';
  $this->arr_buttons['bmd_excluir']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_delete.png';

  $this->arr_buttons['bmd_alterar']['hint']             = $Nm_lang['lang_btns_mdtl_updt_hint'];
  $this->arr_buttons['bmd_alterar']['type']             = 'button';
  $this->arr_buttons['bmd_alterar']['value']            = $Nm_lang['lang_btns_mdtl_updt'];
  $this->arr_buttons['bmd_alterar']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bmd_alterar']['display_position'] = 'img_right';
  $this->arr_buttons['bmd_alterar']['fontawesomeicon']  = 'fas fa-save';
  $this->arr_buttons['bmd_alterar']['style'] = 'fontawesome';
  $this->arr_buttons['bmd_alterar']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_refresh.png';

  $this->arr_buttons['bmd_novo']['hint']             = $Nm_lang['lang_btns_copy_hint'];
  $this->arr_buttons['bmd_novo']['type']             = 'button';
  $this->arr_buttons['bmd_novo']['value']            = $Nm_lang['lang_btns_copy'];
  $this->arr_buttons['bmd_novo']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bmd_novo']['display_position'] = 'img_right';
  $this->arr_buttons['bmd_novo']['fontawesomeicon']  = 'fas fa-copy';
  $this->arr_buttons['bmd_novo']['style'] = 'fontawesome';
  $this->arr_buttons['bmd_novo']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_copy.png';

  $this->arr_buttons['bmd_cancelar']['hint']             = $Nm_lang['lang_btns_mdtl_cncl_hint'];
  $this->arr_buttons['bmd_cancelar']['type']             = 'button';
  $this->arr_buttons['bmd_cancelar']['value']            = $Nm_lang['lang_btns_mdtl_cncl'];
  $this->arr_buttons['bmd_cancelar']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bmd_cancelar']['display_position'] = 'img_right';
  $this->arr_buttons['bmd_cancelar']['fontawesomeicon']  = 'fas fa-times';
  $this->arr_buttons['bmd_cancelar']['style'] = 'fontawesome';
  $this->arr_buttons['bmd_cancelar']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_close.png';

  $this->arr_buttons['bmd_edit']['hint']             = $Nm_lang['lang_btns_mdtl_edit_hint'];
  $this->arr_buttons['bmd_edit']['type']             = 'button';
  $this->arr_buttons['bmd_edit']['value']            = $Nm_lang['lang_btns_mdtl_edit'];
  $this->arr_buttons['bmd_edit']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bmd_edit']['display_position'] = 'img_right';
  $this->arr_buttons['bmd_edit']['fontawesomeicon']  = 'fas fa-edit';
  $this->arr_buttons['bmd_edit']['style'] = 'fontawesome';
  $this->arr_buttons['bmd_edit']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_edit.png';

  $this->arr_buttons['bfacebook']['hint']             = '{Facebook_hint}';
  $this->arr_buttons['bfacebook']['type']             = 'button';
  $this->arr_buttons['bfacebook']['value']            = '{Facebook}';
  $this->arr_buttons['bfacebook']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bfacebook']['display_position'] = 'img_right';
  $this->arr_buttons['bfacebook']['fontawesomeicon']  = 'fab fa-facebook-f';
  $this->arr_buttons['bfacebook']['style'] = 'facebook';
  $this->arr_buttons['bfacebook']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_facebook.png';

  $this->arr_buttons['bgoogle']['hint']             = '{Google_hint}';
  $this->arr_buttons['bgoogle']['type']             = 'button';
  $this->arr_buttons['bgoogle']['value']            = '{Google}';
  $this->arr_buttons['bgoogle']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bgoogle']['display_position'] = 'img_right';
  $this->arr_buttons['bgoogle']['fontawesomeicon']  = 'fab fa-google';
  $this->arr_buttons['bgoogle']['style'] = 'google';
  $this->arr_buttons['bgoogle']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_google_plus.png';

  $this->arr_buttons['bpaypal']['hint']             = '{Paypal_hint}';
  $this->arr_buttons['bpaypal']['type']             = 'button';
  $this->arr_buttons['bpaypal']['value']            = '{Paypal}';
  $this->arr_buttons['bpaypal']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bpaypal']['display_position'] = 'img_right';
  $this->arr_buttons['bpaypal']['fontawesomeicon']  = 'fab fa-paypal';
  $this->arr_buttons['bpaypal']['style'] = 'paypal';
  $this->arr_buttons['bpaypal']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_paypal.png';

  $this->arr_buttons['btwitter']['hint']             = '{Twitter_hint}';
  $this->arr_buttons['btwitter']['type']             = 'button';
  $this->arr_buttons['btwitter']['value']            = '{Twitter}';
  $this->arr_buttons['btwitter']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['btwitter']['display_position'] = 'img_right';
  $this->arr_buttons['btwitter']['fontawesomeicon']  = 'fab fa-twitter';
  $this->arr_buttons['btwitter']['style'] = 'twitter';
  $this->arr_buttons['btwitter']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_twitter.png';

  $this->arr_buttons['bmenu']['hint']             = '{Menu_hint}';
  $this->arr_buttons['bmenu']['type']             = 'button';
  $this->arr_buttons['bmenu']['value']            = '{Menu}';
  $this->arr_buttons['bmenu']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bmenu']['display_position'] = 'text_right';
  $this->arr_buttons['bmenu']['fontawesomeicon']  = 'fas fa-bars';
  $this->arr_buttons['bmenu']['style'] = 'icons';
  $this->arr_buttons['bmenu']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_nav.png';

  $this->arr_buttons['bhelp']['hint']             = $Nm_lang['lang_btns_help_hint'];
  $this->arr_buttons['bhelp']['type']             = 'image';
  $this->arr_buttons['bhelp']['value']            = $Nm_lang['lang_btns_help'];
  $this->arr_buttons['bhelp']['display']          = 'only_text';
  $this->arr_buttons['bhelp']['display_position'] = 'img_right';
  $this->arr_buttons['bhelp']['fontawesomeicon']  = '';
  $this->arr_buttons['bhelp']['style'] = 'disabledSCImage';
  $this->arr_buttons['bhelp']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_help.png';

  $this->arr_buttons['bsair']['hint']             = $Nm_lang['lang_btns_exit_hint'];
  $this->arr_buttons['bsair']['type']             = 'button';
  $this->arr_buttons['bsair']['value']            = $Nm_lang['lang_btns_exit'];
  $this->arr_buttons['bsair']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bsair']['display_position'] = 'img_right';
  $this->arr_buttons['bsair']['fontawesomeicon']  = 'fas fa-sign-out-alt';
  $this->arr_buttons['bsair']['style'] = 'danger';
  $this->arr_buttons['bsair']['image'] = 'sys__NM__nm_teste_bsair.gif';

  $this->arr_buttons['bvoltar']['hint']             = $Nm_lang['lang_btns_back_hint'];
  $this->arr_buttons['bvoltar']['type']             = 'button';
  $this->arr_buttons['bvoltar']['value']            = $Nm_lang['lang_btns_back'];
  $this->arr_buttons['bvoltar']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bvoltar']['display_position'] = 'img_right';
  $this->arr_buttons['bvoltar']['fontawesomeicon']  = 'fas fa-arrow-left';
  $this->arr_buttons['bvoltar']['style'] = 'default';
  $this->arr_buttons['bvoltar']['image'] = 'sys__NM__nm_teste_bvoltar.gif';

  $this->arr_buttons['bcancelar']['hint']             = $Nm_lang['lang_btns_cncl_hint'];
  $this->arr_buttons['bcancelar']['type']             = 'button';
  $this->arr_buttons['bcancelar']['value']            = $Nm_lang['lang_btns_cncl'];
  $this->arr_buttons['bcancelar']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bcancelar']['display_position'] = 'img_right';
  $this->arr_buttons['bcancelar']['fontawesomeicon']  = 'fas fa-ban';
  $this->arr_buttons['bcancelar']['style'] = 'danger';
  $this->arr_buttons['bcancelar']['image'] = 'sys__NM__nm_teste_bcancelar.gif';

  $this->arr_buttons['bapply']['hint']             = $Nm_lang['lang_btns_apply_hint'];
  $this->arr_buttons['bapply']['type']             = 'button';
  $this->arr_buttons['bapply']['value']            = $Nm_lang['lang_btns_apply'];
  $this->arr_buttons['bapply']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bapply']['display_position'] = 'img_right';
  $this->arr_buttons['bapply']['fontawesomeicon']  = 'fas fa-check';
  $this->arr_buttons['bapply']['style'] = 'ok';
  $this->arr_buttons['bapply']['image'] = 'sys__NM__nm_teste_bapply.gif';

  $this->arr_buttons['brestore']['hint']             = $Nm_lang['lang_btns_restore_hint'];
  $this->arr_buttons['brestore']['type']             = 'button';
  $this->arr_buttons['brestore']['value']            = $Nm_lang['lang_btns_restore'];
  $this->arr_buttons['brestore']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['brestore']['display_position'] = 'img_right';
  $this->arr_buttons['brestore']['fontawesomeicon']  = 'fas fa-undo';
  $this->arr_buttons['brestore']['style'] = 'default';
  $this->arr_buttons['brestore']['image'] = 'sys__NM__nm_teste_brestore.gif';

  $this->arr_buttons['bzipcode']['hint']             = $Nm_lang['lang_btns_zpcd_hint'];
  $this->arr_buttons['bzipcode']['type']             = 'button';
  $this->arr_buttons['bzipcode']['value']            = $Nm_lang['lang_btns_zpcd'];
  $this->arr_buttons['bzipcode']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bzipcode']['display_position'] = 'text_right';
  $this->arr_buttons['bzipcode']['fontawesomeicon']  = 'fas fa-map-marker-alt';
  $this->arr_buttons['bzipcode']['style'] = 'fontawesome';
  $this->arr_buttons['bzipcode']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_place.png';

  $this->arr_buttons['blink']['hint']             = $Nm_lang['lang_btns_iurl_hint'];
  $this->arr_buttons['blink']['type']             = 'button';
  $this->arr_buttons['blink']['value']            = $Nm_lang['lang_btns_iurl'];
  $this->arr_buttons['blink']['display']          = 'only_text';
  $this->arr_buttons['blink']['display_position'] = 'img_right';
  $this->arr_buttons['blink']['fontawesomeicon']  = '';
  $this->arr_buttons['blink']['style'] = 'default';
  $this->arr_buttons['blink']['image'] = 'sys__NM__nm_teste_blink.gif';

  $this->arr_buttons['blanguage']['hint']             = $Nm_lang['lang_btns_lang_hint'];
  $this->arr_buttons['blanguage']['type']             = 'button';
  $this->arr_buttons['blanguage']['value']            = $Nm_lang['lang_btns_lang'];
  $this->arr_buttons['blanguage']['display']          = 'only_text';
  $this->arr_buttons['blanguage']['display_position'] = 'img_right';
  $this->arr_buttons['blanguage']['fontawesomeicon']  = '';
  $this->arr_buttons['blanguage']['style'] = 'default';
  $this->arr_buttons['blanguage']['image'] = 'sys__NM__nm_teste_blanguage.gif';

  $this->arr_buttons['bfieldhelp']['hint']             = $Nm_lang['lang_btns_hlpf_hint'];
  $this->arr_buttons['bfieldhelp']['type']             = 'image';
  $this->arr_buttons['bfieldhelp']['value']            = $Nm_lang['lang_btns_hlpf'];
  $this->arr_buttons['bfieldhelp']['display']          = 'only_text';
  $this->arr_buttons['bfieldhelp']['display_position'] = 'img_right';
  $this->arr_buttons['bfieldhelp']['fontawesomeicon']  = '';
  $this->arr_buttons['bfieldhelp']['style'] = 'disabledSCImage';
  $this->arr_buttons['bfieldhelp']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_help.png';

  $this->arr_buttons['bsrgb']['hint']             = $Nm_lang['lang_btns_srgb_hint'];
  $this->arr_buttons['bsrgb']['type']             = 'button';
  $this->arr_buttons['bsrgb']['value']            = $Nm_lang['lang_btns_srgb'];
  $this->arr_buttons['bsrgb']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bsrgb']['display_position'] = 'img_right';
  $this->arr_buttons['bsrgb']['fontawesomeicon']  = 'fas fa-palette';
  $this->arr_buttons['bsrgb']['style'] = 'fontawesome';
  $this->arr_buttons['bsrgb']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_color.png';

  $this->arr_buttons['berrm_clse']['hint']             = $Nm_lang['lang_btns_errm_clse_hint'];
  $this->arr_buttons['berrm_clse']['type']             = 'button';
  $this->arr_buttons['berrm_clse']['value']            = $Nm_lang['lang_btns_errm_clse'];
  $this->arr_buttons['berrm_clse']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['berrm_clse']['display_position'] = 'img_right';
  $this->arr_buttons['berrm_clse']['fontawesomeicon']  = 'fas fa-times';
  $this->arr_buttons['berrm_clse']['style'] = 'danger';
  $this->arr_buttons['berrm_clse']['image'] = 'sys__NM__nm_teste_berrm_clse.gif';

  $this->arr_buttons['bemail']['hint']             = $Nm_lang['lang_btns_emai_hint'];
  $this->arr_buttons['bemail']['type']             = 'button';
  $this->arr_buttons['bemail']['value']            = $Nm_lang['lang_btns_emai'];
  $this->arr_buttons['bemail']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bemail']['display_position'] = 'img_right';
  $this->arr_buttons['bemail']['fontawesomeicon']  = 'fas fa-envelope';
  $this->arr_buttons['bemail']['style'] = 'fontawesome';
  $this->arr_buttons['bemail']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_mail.png';

  $this->arr_buttons['bcapture']['hint']             = $Nm_lang['lang_btns_pick_hint'];
  $this->arr_buttons['bcapture']['type']             = 'button';
  $this->arr_buttons['bcapture']['value']            = $Nm_lang['lang_btns_pick'];
  $this->arr_buttons['bcapture']['display']          = 'only_text';
  $this->arr_buttons['bcapture']['display_position'] = 'img_right';
  $this->arr_buttons['bcapture']['fontawesomeicon']  = '';
  $this->arr_buttons['bcapture']['style'] = 'default';
  $this->arr_buttons['bcapture']['image'] = 'sys__NM__nm_teste_bcapture.gif';

  $this->arr_buttons['bmessageclose']['hint']             = $Nm_lang['lang_btns_mess_clse_hint'];
  $this->arr_buttons['bmessageclose']['type']             = 'button';
  $this->arr_buttons['bmessageclose']['value']            = $Nm_lang['lang_btns_mess_clse'];
  $this->arr_buttons['bmessageclose']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bmessageclose']['display_position'] = 'img_right';
  $this->arr_buttons['bmessageclose']['fontawesomeicon']  = 'fas fa-times';
  $this->arr_buttons['bmessageclose']['style'] = 'cancel';
  $this->arr_buttons['bmessageclose']['image'] = 'sys__NM__nm_teste_bmessageclose.gif';

  $this->arr_buttons['bgooglemaps']['hint']             = $Nm_lang['lang_btns_maps_hint'];
  $this->arr_buttons['bgooglemaps']['type']             = 'button';
  $this->arr_buttons['bgooglemaps']['value']            = $Nm_lang['lang_btns_maps'];
  $this->arr_buttons['bgooglemaps']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bgooglemaps']['display_position'] = 'img_right';
  $this->arr_buttons['bgooglemaps']['fontawesomeicon']  = 'fas fa-map';
  $this->arr_buttons['bgooglemaps']['style'] = 'default';
  $this->arr_buttons['bgooglemaps']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_google.png';

  $this->arr_buttons['bclear']['hint']             = $Nm_lang['lang_btns_clear_hint'];
  $this->arr_buttons['bclear']['type']             = 'button';
  $this->arr_buttons['bclear']['value']            = $Nm_lang['lang_btns_clear'];
  $this->arr_buttons['bclear']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bclear']['display_position'] = 'text_right';
  $this->arr_buttons['bclear']['fontawesomeicon']  = 'fas fa-broom';
  $this->arr_buttons['bclear']['style'] = 'default';
  $this->arr_buttons['bclear']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bclear.gif';

  $this->arr_buttons['byoutube']['hint']             = $Nm_lang['lang_btns_yutb_hint'];
  $this->arr_buttons['byoutube']['type']             = 'button';
  $this->arr_buttons['byoutube']['value']            = $Nm_lang['lang_btns_yutb'];
  $this->arr_buttons['byoutube']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['byoutube']['display_position'] = 'img_right';
  $this->arr_buttons['byoutube']['fontawesomeicon']  = 'fab fa-youtube';
  $this->arr_buttons['byoutube']['style'] = 'youtube';
  $this->arr_buttons['byoutube']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_youtube.png';

  $this->arr_buttons['bpassfld_up']['hint']             = $Nm_lang['lang_btns_bpassfld_up_hint'];
  $this->arr_buttons['bpassfld_up']['type']             = 'button';
  $this->arr_buttons['bpassfld_up']['value']            = $Nm_lang['lang_btns_bpassfld_up'];
  $this->arr_buttons['bpassfld_up']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bpassfld_up']['display_position'] = 'text_right';
  $this->arr_buttons['bpassfld_up']['fontawesomeicon']  = 'fas fa-caret-up';
  $this->arr_buttons['bpassfld_up']['style'] = 'fontawesome';
  $this->arr_buttons['bpassfld_up']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_come_up.png';

  $this->arr_buttons['bpassfld_down']['hint']             = $Nm_lang['lang_btns_bpassfld_down_hint'];
  $this->arr_buttons['bpassfld_down']['type']             = 'button';
  $this->arr_buttons['bpassfld_down']['value']            = $Nm_lang['lang_btns_bpassfld_down'];
  $this->arr_buttons['bpassfld_down']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bpassfld_down']['display_position'] = 'text_right';
  $this->arr_buttons['bpassfld_down']['fontawesomeicon']  = 'fas fa-caret-down';
  $this->arr_buttons['bpassfld_down']['style'] = 'fontawesome';
  $this->arr_buttons['bpassfld_down']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_come_down.png';

  $this->arr_buttons['bpassfld_rightall']['hint']             = $Nm_lang['lang_btns_bpassfld_rightall_hint'];
  $this->arr_buttons['bpassfld_rightall']['type']             = 'button';
  $this->arr_buttons['bpassfld_rightall']['value']            = $Nm_lang['lang_btns_bpassfld_rightall'];
  $this->arr_buttons['bpassfld_rightall']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bpassfld_rightall']['display_position'] = 'text_right';
  $this->arr_buttons['bpassfld_rightall']['fontawesomeicon']  = 'fas fa-forward';
  $this->arr_buttons['bpassfld_rightall']['style'] = 'fontawesome';
  $this->arr_buttons['bpassfld_rightall']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_rewind.png';

  $this->arr_buttons['bpassfld_right']['hint']             = $Nm_lang['lang_btns_bpassfld_right_hint'];
  $this->arr_buttons['bpassfld_right']['type']             = 'button';
  $this->arr_buttons['bpassfld_right']['value']            = $Nm_lang['lang_btns_bpassfld_right'];
  $this->arr_buttons['bpassfld_right']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bpassfld_right']['display_position'] = 'text_right';
  $this->arr_buttons['bpassfld_right']['fontawesomeicon']  = 'fas fa-caret-right';
  $this->arr_buttons['bpassfld_right']['style'] = 'fontawesome';
  $this->arr_buttons['bpassfld_right']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_left_enabled.png';

  $this->arr_buttons['bpassfld_leftall']['hint']             = $Nm_lang['lang_btns_bpassfld_leftall_hint'];
  $this->arr_buttons['bpassfld_leftall']['type']             = 'button';
  $this->arr_buttons['bpassfld_leftall']['value']            = $Nm_lang['lang_btns_bpassfld_leftall'];
  $this->arr_buttons['bpassfld_leftall']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bpassfld_leftall']['display_position'] = 'text_right';
  $this->arr_buttons['bpassfld_leftall']['fontawesomeicon']  = 'fas fa-backward';
  $this->arr_buttons['bpassfld_leftall']['style'] = 'fontawesome';
  $this->arr_buttons['bpassfld_leftall']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_foward.png';

  $this->arr_buttons['bpassfld_left']['hint']             = $Nm_lang['lang_btns_bpassfld_left_hint'];
  $this->arr_buttons['bpassfld_left']['type']             = 'button';
  $this->arr_buttons['bpassfld_left']['value']            = $Nm_lang['lang_btns_bpassfld_left'];
  $this->arr_buttons['bpassfld_left']['display']          = 'only_fontawesomeicon';
  $this->arr_buttons['bpassfld_left']['display_position'] = 'text_right';
  $this->arr_buttons['bpassfld_left']['fontawesomeicon']  = 'fas fa-caret-left';
  $this->arr_buttons['bpassfld_left']['style'] = 'fontawesome';
  $this->arr_buttons['bpassfld_left']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_right_enabled.png';

  $this->arr_buttons['bapply_appdiv']['hint']             = $Nm_lang['lang_btns_apply_hint'];
  $this->arr_buttons['bapply_appdiv']['type']             = 'button';
  $this->arr_buttons['bapply_appdiv']['value']            = $Nm_lang['lang_btns_apply'];
  $this->arr_buttons['bapply_appdiv']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bapply_appdiv']['display_position'] = 'img_right';
  $this->arr_buttons['bapply_appdiv']['fontawesomeicon']  = 'fas fa-check';
  $this->arr_buttons['bapply_appdiv']['style'] = 'check';
  $this->arr_buttons['bapply_appdiv']['image'] = 'sys__NM__nm_teste_bapply.gif';

  $this->arr_buttons['bok_appdiv']['hint']             = $Nm_lang['lang_btns_cfrm_hint'];
  $this->arr_buttons['bok_appdiv']['type']             = 'button';
  $this->arr_buttons['bok_appdiv']['value']            = $Nm_lang['lang_btns_cfrm'];
  $this->arr_buttons['bok_appdiv']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bok_appdiv']['display_position'] = 'img_right';
  $this->arr_buttons['bok_appdiv']['fontawesomeicon']  = 'fas fa-check';
  $this->arr_buttons['bok_appdiv']['style'] = 'check';
  $this->arr_buttons['bok_appdiv']['image'] = 'sys__NM__nm_teste_bok.gif';

  $this->arr_buttons['brestore_appdiv']['hint']             = $Nm_lang['lang_btns_restore_hint'];
  $this->arr_buttons['brestore_appdiv']['type']             = 'button';
  $this->arr_buttons['brestore_appdiv']['value']            = $Nm_lang['lang_btns_restore'];
  $this->arr_buttons['brestore_appdiv']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['brestore_appdiv']['display_position'] = 'img_right';
  $this->arr_buttons['brestore_appdiv']['fontawesomeicon']  = 'fas fa-undo';
  $this->arr_buttons['brestore_appdiv']['style'] = 'small';
  $this->arr_buttons['brestore_appdiv']['image'] = 'sys__NM__nm_teste_brestore.gif';

  $this->arr_buttons['blimpar_appdiv']['hint']             = $Nm_lang['lang_btns_clea_hint'];
  $this->arr_buttons['blimpar_appdiv']['type']             = 'button';
  $this->arr_buttons['blimpar_appdiv']['value']            = $Nm_lang['lang_btns_clea'];
  $this->arr_buttons['blimpar_appdiv']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['blimpar_appdiv']['display_position'] = 'text_right';
  $this->arr_buttons['blimpar_appdiv']['fontawesomeicon']  = 'fas fa-broom';
  $this->arr_buttons['blimpar_appdiv']['style'] = 'small';
  $this->arr_buttons['blimpar_appdiv']['image'] = 'scriptcase__NM__nm_scriptcase9_SweetBlue_blimpar_appdiv.gif';

  $this->arr_buttons['bsair_appdiv']['hint']             = $Nm_lang['lang_btns_exit_hint'];
  $this->arr_buttons['bsair_appdiv']['type']             = 'button';
  $this->arr_buttons['bsair_appdiv']['value']            = $Nm_lang['lang_btns_exit'];
  $this->arr_buttons['bsair_appdiv']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bsair_appdiv']['display_position'] = 'img_right';
  $this->arr_buttons['bsair_appdiv']['fontawesomeicon']  = 'fas fa-times';
  $this->arr_buttons['bsair_appdiv']['style'] = 'cancel';
  $this->arr_buttons['bsair_appdiv']['image'] = 'sys__NM__nm_teste_bsair.gif';

  $this->arr_buttons['bcancelar_appdiv']['hint']             = $Nm_lang['lang_btns_cncl_hint'];
  $this->arr_buttons['bcancelar_appdiv']['type']             = 'button';
  $this->arr_buttons['bcancelar_appdiv']['value']            = $Nm_lang['lang_btns_cncl'];
  $this->arr_buttons['bcancelar_appdiv']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bcancelar_appdiv']['display_position'] = 'img_right';
  $this->arr_buttons['bcancelar_appdiv']['fontawesomeicon']  = 'fas fa-ban';
  $this->arr_buttons['bcancelar_appdiv']['style'] = 'cancel';
  $this->arr_buttons['bcancelar_appdiv']['image'] = 'sys__NM__nm_teste_bcancelar.gif';

  $this->arr_buttons['bsalvar_appdiv']['hint']             = $Nm_lang['lang_btns_save_hint'];
  $this->arr_buttons['bsalvar_appdiv']['type']             = 'button';
  $this->arr_buttons['bsalvar_appdiv']['value']            = $Nm_lang['lang_btns_save'];
  $this->arr_buttons['bsalvar_appdiv']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bsalvar_appdiv']['display_position'] = 'text_right';
  $this->arr_buttons['bsalvar_appdiv']['fontawesomeicon']  = 'fas fa-save';
  $this->arr_buttons['bsalvar_appdiv']['style'] = 'small';
  $this->arr_buttons['bsalvar_appdiv']['image'] = 'scriptcase__NM__nm_scriptcase9_SweetBlue_bsalvar_appdiv.gif';

  $this->arr_buttons['bexcluir_appdiv']['hint']             = $Nm_lang['lang_btns_dele_hint'];
  $this->arr_buttons['bexcluir_appdiv']['type']             = 'button';
  $this->arr_buttons['bexcluir_appdiv']['value']            = $Nm_lang['lang_btns_dele'];
  $this->arr_buttons['bexcluir_appdiv']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bexcluir_appdiv']['display_position'] = 'text_right';
  $this->arr_buttons['bexcluir_appdiv']['fontawesomeicon']  = 'fas fa-trash';
  $this->arr_buttons['bexcluir_appdiv']['style'] = 'small';
  $this->arr_buttons['bexcluir_appdiv']['image'] = 'scriptcase__NM__nm_scriptcase9_SweetBlue_bexcluir_appdiv.gif';

  $this->arr_buttons['bcalendarimport']['hint']             = $Nm_lang['lang_btns_import_hint'];
  $this->arr_buttons['bcalendarimport']['type']             = 'button';
  $this->arr_buttons['bcalendarimport']['value']            = $Nm_lang['lang_btns_import'];
  $this->arr_buttons['bcalendarimport']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bcalendarimport']['display_position'] = 'text_right';
  $this->arr_buttons['bcalendarimport']['fontawesomeicon']  = 'fas fa-file-import';
  $this->arr_buttons['bcalendarimport']['style'] = 'default';
  $this->arr_buttons['bcalendarimport']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bcalendarimport.gif';

  $this->arr_buttons['bcalendarexport']['hint']             = $Nm_lang['lang_btns_expo_hint'];
  $this->arr_buttons['bcalendarexport']['type']             = 'button';
  $this->arr_buttons['bcalendarexport']['value']            = $Nm_lang['lang_btns_expo'];
  $this->arr_buttons['bcalendarexport']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bcalendarexport']['display_position'] = 'text_right';
  $this->arr_buttons['bcalendarexport']['fontawesomeicon']  = 'fas fa-file-export';
  $this->arr_buttons['bcalendarexport']['style'] = 'default';
  $this->arr_buttons['bcalendarexport']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bcalendarexport.gif';

  $this->arr_buttons['bcalendarcancel']['hint']             = $Nm_lang['lang_btns_cncl_hint'];
  $this->arr_buttons['bcalendarcancel']['type']             = 'button';
  $this->arr_buttons['bcalendarcancel']['value']            = $Nm_lang['lang_btns_cncl'];
  $this->arr_buttons['bcalendarcancel']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bcalendarcancel']['display_position'] = 'text_right';
  $this->arr_buttons['bcalendarcancel']['fontawesomeicon']  = 'fas fa-ban';
  $this->arr_buttons['bcalendarcancel']['style'] = 'danger';
  $this->arr_buttons['bcalendarcancel']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bcalendarcancel.gif';

  $this->arr_buttons['bcalendarimport_google']['hint']             = $Nm_lang['lang_btns_import_google_hint'];
  $this->arr_buttons['bcalendarimport_google']['type']             = 'button';
  $this->arr_buttons['bcalendarimport_google']['value']            = $Nm_lang['lang_btns_import_google'];
  $this->arr_buttons['bcalendarimport_google']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bcalendarimport_google']['display_position'] = 'text_right';
  $this->arr_buttons['bcalendarimport_google']['fontawesomeicon']  = 'fas fa-file-import';
  $this->arr_buttons['bcalendarimport_google']['style'] = 'default';
  $this->arr_buttons['bcalendarimport_google']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bcalendarimport_google.gif';

  $this->arr_buttons['bcalendarexport_google']['hint']             = $Nm_lang['lang_btns_export_google_hint'];
  $this->arr_buttons['bcalendarexport_google']['type']             = 'button';
  $this->arr_buttons['bcalendarexport_google']['value']            = $Nm_lang['lang_btns_export_google'];
  $this->arr_buttons['bcalendarexport_google']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bcalendarexport_google']['display_position'] = 'text_right';
  $this->arr_buttons['bcalendarexport_google']['fontawesomeicon']  = 'fas fa-file-export';
  $this->arr_buttons['bcalendarexport_google']['style'] = 'default';
  $this->arr_buttons['bcalendarexport_google']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bcalendarexport_google.gif';

  $this->arr_buttons['bsweetalert_ok']['hint']             = $Nm_lang['lang_btns_cfrm_hint'];
  $this->arr_buttons['bsweetalert_ok']['type']             = 'button';
  $this->arr_buttons['bsweetalert_ok']['value']            = $Nm_lang['lang_btns_cfrm'];
  $this->arr_buttons['bsweetalert_ok']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bsweetalert_ok']['display_position'] = 'text_right';
  $this->arr_buttons['bsweetalert_ok']['fontawesomeicon']  = 'fas fa-check';
  $this->arr_buttons['bsweetalert_ok']['style'] = 'sweetalertok';
  $this->arr_buttons['bsweetalert_ok']['image'] = 'scriptcase__NM__nm_scriptcase9_SweetBlue_bsweetalert_ok.gif';

  $this->arr_buttons['bsweetalert_cancel']['hint']             = $Nm_lang['lang_btns_cncl_hint'];
  $this->arr_buttons['bsweetalert_cancel']['type']             = 'button';
  $this->arr_buttons['bsweetalert_cancel']['value']            = $Nm_lang['lang_btns_cncl'];
  $this->arr_buttons['bsweetalert_cancel']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bsweetalert_cancel']['display_position'] = 'text_right';
  $this->arr_buttons['bsweetalert_cancel']['fontawesomeicon']  = 'fas fa-ban';
  $this->arr_buttons['bsweetalert_cancel']['style'] = 'sweetalertcancel';
  $this->arr_buttons['bsweetalert_cancel']['image'] = 'scriptcase__NM__nm_scriptcase9_SweetBlue_bsweetalert_cancel.gif';

  $this->arr_buttons['bedit_filter_appdiv']['hint']             = $Nm_lang['lang_btns_srch_edit_hint'];
  $this->arr_buttons['bedit_filter_appdiv']['type']             = 'button';
  $this->arr_buttons['bedit_filter_appdiv']['value']            = $Nm_lang['lang_btns_srch_edit'];
  $this->arr_buttons['bedit_filter_appdiv']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bedit_filter_appdiv']['display_position'] = 'img_right';
  $this->arr_buttons['bedit_filter_appdiv']['fontawesomeicon']  = 'fas fa-save';
  $this->arr_buttons['bedit_filter_appdiv']['style'] = 'small';
  $this->arr_buttons['bedit_filter_appdiv']['image'] = 'sys__NM__nm_teste_bedit_filter.gif';

  $this->arr_buttons['bnovo_appdiv']['hint']             = $Nm_lang['lang_btns_neww_hint'];
  $this->arr_buttons['bnovo_appdiv']['type']             = 'button';
  $this->arr_buttons['bnovo_appdiv']['value']            = $Nm_lang['lang_btns_neww'];
  $this->arr_buttons['bnovo_appdiv']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bnovo_appdiv']['display_position'] = 'img_right';
  $this->arr_buttons['bnovo_appdiv']['fontawesomeicon']  = 'fas fa-plus';
  $this->arr_buttons['bnovo_appdiv']['style'] = 'check';
  $this->arr_buttons['bnovo_appdiv']['image'] = 'sys__NM__nm_teste_bnovo.gif';

?>