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
  $this->arr_buttons['bcons_inicio']['type']             = 'image';
  $this->arr_buttons['bcons_inicio']['value']            = $Nm_lang['lang_btns_frst'];
  $this->arr_buttons['bcons_inicio']['display']          = 'only_img';
  $this->arr_buttons['bcons_inicio']['display_position'] = 'img_right';
  $this->arr_buttons['bcons_inicio']['fontawesomeicon']  = '';
  $this->arr_buttons['bcons_inicio']['style'] = 'sc_image';
  $this->arr_buttons['bcons_inicio']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_last_enabled.png';

  $this->arr_buttons['bcons_retorna']['hint']             = $Nm_lang['lang_btns_prev_hint'];
  $this->arr_buttons['bcons_retorna']['type']             = 'image';
  $this->arr_buttons['bcons_retorna']['value']            = $Nm_lang['lang_btns_prev'];
  $this->arr_buttons['bcons_retorna']['display']          = 'only_img';
  $this->arr_buttons['bcons_retorna']['display_position'] = 'img_right';
  $this->arr_buttons['bcons_retorna']['fontawesomeicon']  = '';
  $this->arr_buttons['bcons_retorna']['style'] = 'sc_image';
  $this->arr_buttons['bcons_retorna']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_right_enabled.png';

  $this->arr_buttons['bcons_avanca']['hint']             = $Nm_lang['lang_btns_next_hint'];
  $this->arr_buttons['bcons_avanca']['type']             = 'image';
  $this->arr_buttons['bcons_avanca']['value']            = $Nm_lang['lang_btns_next'];
  $this->arr_buttons['bcons_avanca']['display']          = 'only_img';
  $this->arr_buttons['bcons_avanca']['display_position'] = 'img_right';
  $this->arr_buttons['bcons_avanca']['fontawesomeicon']  = '';
  $this->arr_buttons['bcons_avanca']['style'] = 'sc_image';
  $this->arr_buttons['bcons_avanca']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_left_enabled.png';

  $this->arr_buttons['bcons_final']['hint']             = $Nm_lang['lang_btns_last_hint'];
  $this->arr_buttons['bcons_final']['type']             = 'image';
  $this->arr_buttons['bcons_final']['value']            = $Nm_lang['lang_btns_last'];
  $this->arr_buttons['bcons_final']['display']          = 'only_img';
  $this->arr_buttons['bcons_final']['display_position'] = 'img_right';
  $this->arr_buttons['bcons_final']['fontawesomeicon']  = '';
  $this->arr_buttons['bcons_final']['style'] = 'sc_image';
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
  $this->arr_buttons['bprint']['display']          = 'only_text';
  $this->arr_buttons['bprint']['display_position'] = 'img_right';
  $this->arr_buttons['bprint']['fontawesomeicon']  = '';
  $this->arr_buttons['bprint']['style'] = 'default';
  $this->arr_buttons['bprint']['image'] = 'grp__NM__printer2.png';

  $this->arr_buttons['bresumo']['hint']             = $Nm_lang['lang_btns_smry_hint'];
  $this->arr_buttons['bresumo']['type']             = 'button';
  $this->arr_buttons['bresumo']['value']            = $Nm_lang['lang_btns_smry'];
  $this->arr_buttons['bresumo']['display']          = 'only_text';
  $this->arr_buttons['bresumo']['display_position'] = 'img_right';
  $this->arr_buttons['bresumo']['fontawesomeicon']  = '';
  $this->arr_buttons['bresumo']['style'] = 'default';
  $this->arr_buttons['bresumo']['image'] = 'sys__NM__nm_teste_bresumo.gif';

  $this->arr_buttons['bsort']['hint']             = $Nm_lang['lang_btns_sort_hint'];
  $this->arr_buttons['bsort']['type']             = 'button';
  $this->arr_buttons['bsort']['value']            = $Nm_lang['lang_btns_sort'];
  $this->arr_buttons['bsort']['display']          = 'only_text';
  $this->arr_buttons['bsort']['display_position'] = 'img_right';
  $this->arr_buttons['bsort']['fontawesomeicon']  = '';
  $this->arr_buttons['bsort']['style'] = 'default';
  $this->arr_buttons['bsort']['image'] = 'scriptcase__NM__sorting.png';

  $this->arr_buttons['bcolumns']['hint']             = $Nm_lang['lang_btns_clmn_hint'];
  $this->arr_buttons['bcolumns']['type']             = 'button';
  $this->arr_buttons['bcolumns']['value']            = $Nm_lang['lang_btns_clmn'];
  $this->arr_buttons['bcolumns']['display']          = 'only_text';
  $this->arr_buttons['bcolumns']['display_position'] = 'img_right';
  $this->arr_buttons['bcolumns']['fontawesomeicon']  = '';
  $this->arr_buttons['bcolumns']['style'] = 'default';
  $this->arr_buttons['bcolumns']['image'] = 'sys__NM__nm_teste_bcolumns.gif';

  $this->arr_buttons['bdynamicsearch']['hint']             = $Nm_lang['lang_btns_dynamicsearch_hint'];
  $this->arr_buttons['bdynamicsearch']['type']             = 'button';
  $this->arr_buttons['bdynamicsearch']['value']            = $Nm_lang['lang_btns_dynamicsearch'];
  $this->arr_buttons['bdynamicsearch']['display']          = 'only_text';
  $this->arr_buttons['bdynamicsearch']['display_position'] = 'img_right';
  $this->arr_buttons['bdynamicsearch']['fontawesomeicon']  = '';
  $this->arr_buttons['bdynamicsearch']['style'] = 'default';
  $this->arr_buttons['bdynamicsearch']['image'] = 'sys__NM__nm_teste_bdynamicsearch.gif';

  $this->arr_buttons['bgridsave']['hint']             = $Nm_lang['lang_btns_gridsave_hint'];
  $this->arr_buttons['bgridsave']['type']             = 'button';
  $this->arr_buttons['bgridsave']['value']            = $Nm_lang['lang_btns_gridsave'];
  $this->arr_buttons['bgridsave']['display']          = 'only_text';
  $this->arr_buttons['bgridsave']['display_position'] = 'img_right';
  $this->arr_buttons['bgridsave']['fontawesomeicon']  = '';
  $this->arr_buttons['bgridsave']['style'] = 'default';
  $this->arr_buttons['bgridsave']['image'] = 'sys__NM__nm_teste_bgridsave.gif';

  $this->arr_buttons['bgroupby']['hint']             = $Nm_lang['lang_btns_gbrl_hint'];
  $this->arr_buttons['bgroupby']['type']             = 'button';
  $this->arr_buttons['bgroupby']['value']            = $Nm_lang['lang_btns_gbrl'];
  $this->arr_buttons['bgroupby']['display']          = 'only_text';
  $this->arr_buttons['bgroupby']['display_position'] = 'img_right';
  $this->arr_buttons['bgroupby']['fontawesomeicon']  = '';
  $this->arr_buttons['bgroupby']['style'] = 'default';
  $this->arr_buttons['bgroupby']['image'] = 'sys__NM__nm_teste_bgroupby.gif';

  $this->arr_buttons['bcons_detalhes']['hint']             = $Nm_lang['lang_btns_lens_hint'];
  $this->arr_buttons['bcons_detalhes']['type']             = 'image';
  $this->arr_buttons['bcons_detalhes']['value']            = $Nm_lang['lang_btns_lens'];
  $this->arr_buttons['bcons_detalhes']['display']          = 'only_img';
  $this->arr_buttons['bcons_detalhes']['display_position'] = 'img_right';
  $this->arr_buttons['bcons_detalhes']['fontawesomeicon']  = '';
  $this->arr_buttons['bcons_detalhes']['style'] = 'disabledSCImage';
  $this->arr_buttons['bcons_detalhes']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_details.png';

  $this->arr_buttons['bqt_linhas']['hint']             = $Nm_lang['lang_btns_rows_hint'];
  $this->arr_buttons['bqt_linhas']['type']             = 'button';
  $this->arr_buttons['bqt_linhas']['value']            = $Nm_lang['lang_btns_rows'];
  $this->arr_buttons['bqt_linhas']['display']          = 'only_text';
  $this->arr_buttons['bqt_linhas']['display_position'] = 'img_right';
  $this->arr_buttons['bqt_linhas']['fontawesomeicon']  = '';
  $this->arr_buttons['bqt_linhas']['style'] = 'default';
  $this->arr_buttons['bqt_linhas']['image'] = 'sys__NM__nm_teste_bqt_linhas.gif';

  $this->arr_buttons['bgraf']['hint']             = $Nm_lang['lang_btns_chrt_hint'];
  $this->arr_buttons['bgraf']['type']             = 'image';
  $this->arr_buttons['bgraf']['value']            = $Nm_lang['lang_btns_chrt'];
  $this->arr_buttons['bgraf']['display']          = 'only_img';
  $this->arr_buttons['bgraf']['display_position'] = 'img_right';
  $this->arr_buttons['bgraf']['fontawesomeicon']  = '';
  $this->arr_buttons['bgraf']['style'] = 'disabledSCImage';
  $this->arr_buttons['bgraf']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_charts.png';

  $this->arr_buttons['bconf_graf']['hint']             = $Nm_lang['lang_btns_chrt_stng_hint'];
  $this->arr_buttons['bconf_graf']['type']             = 'button';
  $this->arr_buttons['bconf_graf']['value']            = $Nm_lang['lang_btns_chrt_stng'];
  $this->arr_buttons['bconf_graf']['display']          = 'text_img';
  $this->arr_buttons['bconf_graf']['display_position'] = 'img_right';
  $this->arr_buttons['bconf_graf']['fontawesomeicon']  = '';
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
  $this->arr_buttons['blink_resumogrid']['display']          = 'only_text';
  $this->arr_buttons['blink_resumogrid']['display_position'] = 'img_right';
  $this->arr_buttons['blink_resumogrid']['fontawesomeicon']  = '';
  $this->arr_buttons['blink_resumogrid']['style'] = 'default';
  $this->arr_buttons['blink_resumogrid']['image'] = 'sys__NM__nm_teste_blink_resumogrid.gif';

  $this->arr_buttons['brot_resumo']['hint']             = $Nm_lang['lang_btns_smry_rtte_hint'];
  $this->arr_buttons['brot_resumo']['type']             = 'button';
  $this->arr_buttons['brot_resumo']['value']            = $Nm_lang['lang_btns_smry_rtte'];
  $this->arr_buttons['brot_resumo']['display']          = 'only_text';
  $this->arr_buttons['brot_resumo']['display_position'] = 'img_right';
  $this->arr_buttons['brot_resumo']['fontawesomeicon']  = '';
  $this->arr_buttons['brot_resumo']['style'] = 'default';
  $this->arr_buttons['brot_resumo']['image'] = 'sys__NM__nm_teste_brot_resumo.gif';

  $this->arr_buttons['smry_conf']['hint']             = $Nm_lang['lang_btns_smry_conf_hint'];
  $this->arr_buttons['smry_conf']['type']             = 'button';
  $this->arr_buttons['smry_conf']['value']            = $Nm_lang['lang_btns_smry_conf'];
  $this->arr_buttons['smry_conf']['display']          = 'only_text';
  $this->arr_buttons['smry_conf']['display_position'] = 'img_right';
  $this->arr_buttons['smry_conf']['fontawesomeicon']  = '';
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
  $this->arr_buttons['bcons_apply']['display']          = 'only_text';
  $this->arr_buttons['bcons_apply']['display_position'] = 'img_right';
  $this->arr_buttons['bcons_apply']['fontawesomeicon']  = '';
  $this->arr_buttons['bcons_apply']['style'] = 'small';
  $this->arr_buttons['bcons_apply']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bcons_apply.gif';

  $this->arr_buttons['bcons_cancel']['hint']             = $Nm_lang['lang_btns_cncl_hint'];
  $this->arr_buttons['bcons_cancel']['type']             = 'button';
  $this->arr_buttons['bcons_cancel']['value']            = $Nm_lang['lang_btns_cncl'];
  $this->arr_buttons['bcons_cancel']['display']          = 'only_text';
  $this->arr_buttons['bcons_cancel']['display_position'] = 'img_right';
  $this->arr_buttons['bcons_cancel']['fontawesomeicon']  = '';
  $this->arr_buttons['bcons_cancel']['style'] = 'small';
  $this->arr_buttons['bcons_cancel']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bcons_cancel.gif';

  $this->arr_buttons['bmultiselect']['hint']             = $Nm_lang['lang_btns_multiselect_hint'];
  $this->arr_buttons['bmultiselect']['type']             = 'button';
  $this->arr_buttons['bmultiselect']['value']            = $Nm_lang['lang_btns_multiselect'];
  $this->arr_buttons['bmultiselect']['display']          = 'only_text';
  $this->arr_buttons['bmultiselect']['display_position'] = 'img_right';
  $this->arr_buttons['bmultiselect']['fontawesomeicon']  = '';
  $this->arr_buttons['bmultiselect']['style'] = 'small';
  $this->arr_buttons['bmultiselect']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bmultiselect.gif';

  $this->arr_buttons['bemailpdf']['hint']             = $Nm_lang['lang_btns_email_pdfc_hint'];
  $this->arr_buttons['bemailpdf']['type']             = 'button';
  $this->arr_buttons['bemailpdf']['value']            = $Nm_lang['lang_btns_email_pdfc'];
  $this->arr_buttons['bemailpdf']['display']          = 'only_text';
  $this->arr_buttons['bemailpdf']['display_position'] = 'text_right';
  $this->arr_buttons['bemailpdf']['fontawesomeicon']  = '';
  $this->arr_buttons['bemailpdf']['style'] = 'default';
  $this->arr_buttons['bemailpdf']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bemailpdf.gif';

  $this->arr_buttons['bemailrtf']['hint']             = $Nm_lang['lang_btns_email_rtff_hint'];
  $this->arr_buttons['bemailrtf']['type']             = 'button';
  $this->arr_buttons['bemailrtf']['value']            = $Nm_lang['lang_btns_email_rtff'];
  $this->arr_buttons['bemailrtf']['display']          = 'only_text';
  $this->arr_buttons['bemailrtf']['display_position'] = 'text_right';
  $this->arr_buttons['bemailrtf']['fontawesomeicon']  = '';
  $this->arr_buttons['bemailrtf']['style'] = 'default';
  $this->arr_buttons['bemailrtf']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bemailrtf.gif';

  $this->arr_buttons['bemailxls']['hint']             = $Nm_lang['lang_btns_email_xlsf_hint'];
  $this->arr_buttons['bemailxls']['type']             = 'button';
  $this->arr_buttons['bemailxls']['value']            = $Nm_lang['lang_btns_email_xlsf'];
  $this->arr_buttons['bemailxls']['display']          = 'only_text';
  $this->arr_buttons['bemailxls']['display_position'] = 'text_right';
  $this->arr_buttons['bemailxls']['fontawesomeicon']  = '';
  $this->arr_buttons['bemailxls']['style'] = 'default';
  $this->arr_buttons['bemailxls']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bemailxls.gif';

  $this->arr_buttons['bemailxml']['hint']             = $Nm_lang['lang_btns_email_xmlf_hint'];
  $this->arr_buttons['bemailxml']['type']             = 'button';
  $this->arr_buttons['bemailxml']['value']            = $Nm_lang['lang_btns_email_xmlf'];
  $this->arr_buttons['bemailxml']['display']          = 'only_text';
  $this->arr_buttons['bemailxml']['display_position'] = 'text_right';
  $this->arr_buttons['bemailxml']['fontawesomeicon']  = '';
  $this->arr_buttons['bemailxml']['style'] = 'default';
  $this->arr_buttons['bemailxml']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bemailxml.gif';

  $this->arr_buttons['bemailcsv']['hint']             = $Nm_lang['lang_btns_email_csvf_hint'];
  $this->arr_buttons['bemailcsv']['type']             = 'button';
  $this->arr_buttons['bemailcsv']['value']            = $Nm_lang['lang_btns_email_csvf'];
  $this->arr_buttons['bemailcsv']['display']          = 'only_text';
  $this->arr_buttons['bemailcsv']['display_position'] = 'text_right';
  $this->arr_buttons['bemailcsv']['fontawesomeicon']  = '';
  $this->arr_buttons['bemailcsv']['style'] = 'default';
  $this->arr_buttons['bemailcsv']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bemailcsv.gif';

  $this->arr_buttons['bemaildoc']['hint']             = $Nm_lang['lang_btns_email_word_hint'];
  $this->arr_buttons['bemaildoc']['type']             = 'button';
  $this->arr_buttons['bemaildoc']['value']            = $Nm_lang['lang_btns_email_word'];
  $this->arr_buttons['bemaildoc']['display']          = 'only_text';
  $this->arr_buttons['bemaildoc']['display_position'] = 'text_right';
  $this->arr_buttons['bemaildoc']['fontawesomeicon']  = '';
  $this->arr_buttons['bemaildoc']['style'] = 'default';
  $this->arr_buttons['bemaildoc']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bemaildoc.gif';

  $this->arr_buttons['bemailimg']['hint']             = $Nm_lang['lang_btns_email_img_hint'];
  $this->arr_buttons['bemailimg']['type']             = 'button';
  $this->arr_buttons['bemailimg']['value']            = $Nm_lang['lang_btns_email_img'];
  $this->arr_buttons['bemailimg']['display']          = 'only_text';
  $this->arr_buttons['bemailimg']['display_position'] = 'text_right';
  $this->arr_buttons['bemailimg']['fontawesomeicon']  = '';
  $this->arr_buttons['bemailimg']['style'] = 'default';
  $this->arr_buttons['bemailimg']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bemailimg.gif';

  $this->arr_buttons['bemailhtml']['hint']             = $Nm_lang['lang_btns_email_html_hint'];
  $this->arr_buttons['bemailhtml']['type']             = 'button';
  $this->arr_buttons['bemailhtml']['value']            = $Nm_lang['lang_btns_email_html'];
  $this->arr_buttons['bemailhtml']['display']          = 'only_text';
  $this->arr_buttons['bemailhtml']['display_position'] = 'text_right';
  $this->arr_buttons['bemailhtml']['fontawesomeicon']  = '';
  $this->arr_buttons['bemailhtml']['style'] = 'default';
  $this->arr_buttons['bemailhtml']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bemailhtml.gif';

  $this->arr_buttons['bexportemail']['hint']             = $Nm_lang['lang_btns_mail_hint'];
  $this->arr_buttons['bexportemail']['type']             = 'button';
  $this->arr_buttons['bexportemail']['value']            = $Nm_lang['lang_btns_mail'];
  $this->arr_buttons['bexportemail']['display']          = 'only_text';
  $this->arr_buttons['bexportemail']['display_position'] = 'img_right';
  $this->arr_buttons['bexportemail']['fontawesomeicon']  = '';
  $this->arr_buttons['bexportemail']['style'] = 'default';
  $this->arr_buttons['bexportemail']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bdownload.gif';

  $this->arr_buttons['bpdf']['hint']             = $Nm_lang['lang_btns_pdfc_hint'];
  $this->arr_buttons['bpdf']['type']             = 'button';
  $this->arr_buttons['bpdf']['value']            = $Nm_lang['lang_btns_pdfc'];
  $this->arr_buttons['bpdf']['display']          = 'only_text';
  $this->arr_buttons['bpdf']['display_position'] = 'img_right';
  $this->arr_buttons['bpdf']['fontawesomeicon']  = '';
  $this->arr_buttons['bpdf']['style'] = 'default';
  $this->arr_buttons['bpdf']['image'] = 'sys__NM__nm_teste_bpdf.gif';

  $this->arr_buttons['brtf']['hint']             = $Nm_lang['lang_btns_rtff_hint'];
  $this->arr_buttons['brtf']['type']             = 'button';
  $this->arr_buttons['brtf']['value']            = $Nm_lang['lang_btns_rtff'];
  $this->arr_buttons['brtf']['display']          = 'only_text';
  $this->arr_buttons['brtf']['display_position'] = 'img_right';
  $this->arr_buttons['brtf']['fontawesomeicon']  = '';
  $this->arr_buttons['brtf']['style'] = 'default';
  $this->arr_buttons['brtf']['image'] = 'sys__NM__nm_teste_brtf.gif';

  $this->arr_buttons['bexcel']['hint']             = $Nm_lang['lang_btns_xlsf_hint'];
  $this->arr_buttons['bexcel']['type']             = 'button';
  $this->arr_buttons['bexcel']['value']            = $Nm_lang['lang_btns_xlsf'];
  $this->arr_buttons['bexcel']['display']          = 'only_text';
  $this->arr_buttons['bexcel']['display_position'] = 'img_right';
  $this->arr_buttons['bexcel']['fontawesomeicon']  = '';
  $this->arr_buttons['bexcel']['style'] = 'default';
  $this->arr_buttons['bexcel']['image'] = 'sys__NM__nm_teste_bexcel.gif';

  $this->arr_buttons['bxml']['hint']             = $Nm_lang['lang_btns_xmlf_hint'];
  $this->arr_buttons['bxml']['type']             = 'button';
  $this->arr_buttons['bxml']['value']            = $Nm_lang['lang_btns_xmlf'];
  $this->arr_buttons['bxml']['display']          = 'only_text';
  $this->arr_buttons['bxml']['display_position'] = 'img_right';
  $this->arr_buttons['bxml']['fontawesomeicon']  = '';
  $this->arr_buttons['bxml']['style'] = 'default';
  $this->arr_buttons['bxml']['image'] = 'sys__NM__nm_teste_bxml.gif';

  $this->arr_buttons['bcsv']['hint']             = $Nm_lang['lang_btns_csvf_hint'];
  $this->arr_buttons['bcsv']['type']             = 'button';
  $this->arr_buttons['bcsv']['value']            = $Nm_lang['lang_btns_csvf'];
  $this->arr_buttons['bcsv']['display']          = 'only_text';
  $this->arr_buttons['bcsv']['display_position'] = 'img_right';
  $this->arr_buttons['bcsv']['fontawesomeicon']  = '';
  $this->arr_buttons['bcsv']['style'] = 'default';
  $this->arr_buttons['bcsv']['image'] = 'sys__NM__nm_teste_bcsv.gif';

  $this->arr_buttons['bword']['hint']             = $Nm_lang['lang_btns_word_hint'];
  $this->arr_buttons['bword']['type']             = 'button';
  $this->arr_buttons['bword']['value']            = $Nm_lang['lang_btns_word'];
  $this->arr_buttons['bword']['display']          = 'only_text';
  $this->arr_buttons['bword']['display_position'] = 'img_right';
  $this->arr_buttons['bword']['fontawesomeicon']  = '';
  $this->arr_buttons['bword']['style'] = 'default';
  $this->arr_buttons['bword']['image'] = 'sys__NM__nm_teste_bword.gif';

  $this->arr_buttons['bimg']['hint']             = $Nm_lang['lang_btns_img_hint'];
  $this->arr_buttons['bimg']['type']             = 'button';
  $this->arr_buttons['bimg']['value']            = $Nm_lang['lang_btns_img'];
  $this->arr_buttons['bimg']['display']          = 'only_text';
  $this->arr_buttons['bimg']['display_position'] = 'text_right';
  $this->arr_buttons['bimg']['fontawesomeicon']  = '';
  $this->arr_buttons['bimg']['style'] = 'default';
  $this->arr_buttons['bimg']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bimg.gif';

  $this->arr_buttons['bexport']['hint']             = $Nm_lang['lang_btns_expo_hint'];
  $this->arr_buttons['bexport']['type']             = 'button';
  $this->arr_buttons['bexport']['value']            = $Nm_lang['lang_btns_expo'];
  $this->arr_buttons['bexport']['display']          = 'only_text';
  $this->arr_buttons['bexport']['display_position'] = 'img_right';
  $this->arr_buttons['bexport']['fontawesomeicon']  = '';
  $this->arr_buttons['bexport']['style'] = 'default';
  $this->arr_buttons['bexport']['image'] = 'sys__NM__nm_teste_bexport.gif';

  $this->arr_buttons['bexportview']['hint']             = $Nm_lang['lang_btns_expv_hint'];
  $this->arr_buttons['bexportview']['type']             = 'button';
  $this->arr_buttons['bexportview']['value']            = $Nm_lang['lang_btns_expv'];
  $this->arr_buttons['bexportview']['display']          = 'only_text';
  $this->arr_buttons['bexportview']['display_position'] = 'img_right';
  $this->arr_buttons['bexportview']['fontawesomeicon']  = '';
  $this->arr_buttons['bexportview']['style'] = 'default';
  $this->arr_buttons['bexportview']['image'] = 'sys__NM__nm_teste_bexportview.gif';

  $this->arr_buttons['bdownload']['hint']             = $Nm_lang['lang_btns_down_hint'];
  $this->arr_buttons['bdownload']['type']             = 'button';
  $this->arr_buttons['bdownload']['value']            = $Nm_lang['lang_btns_down'];
  $this->arr_buttons['bdownload']['display']          = 'only_text';
  $this->arr_buttons['bdownload']['display_position'] = 'img_right';
  $this->arr_buttons['bdownload']['fontawesomeicon']  = '';
  $this->arr_buttons['bdownload']['style'] = 'default';
  $this->arr_buttons['bdownload']['image'] = 'sys__NM__nm_teste_bdownload.gif';

  $this->arr_buttons['binicio']['hint']             = $Nm_lang['lang_btns_frst_hint'];
  $this->arr_buttons['binicio']['type']             = 'image';
  $this->arr_buttons['binicio']['value']            = $Nm_lang['lang_btns_frst'];
  $this->arr_buttons['binicio']['display']          = 'only_img';
  $this->arr_buttons['binicio']['display_position'] = 'img_right';
  $this->arr_buttons['binicio']['fontawesomeicon']  = '';
  $this->arr_buttons['binicio']['style'] = 'sc_image';
  $this->arr_buttons['binicio']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_last_enabled.png';

  $this->arr_buttons['bretorna']['hint']             = $Nm_lang['lang_btns_prev_hint'];
  $this->arr_buttons['bretorna']['type']             = 'image';
  $this->arr_buttons['bretorna']['value']            = $Nm_lang['lang_btns_prev'];
  $this->arr_buttons['bretorna']['display']          = 'only_img';
  $this->arr_buttons['bretorna']['display_position'] = 'img_right';
  $this->arr_buttons['bretorna']['fontawesomeicon']  = '';
  $this->arr_buttons['bretorna']['style'] = 'sc_image';
  $this->arr_buttons['bretorna']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_right_enabled.png';

  $this->arr_buttons['bavanca']['hint']             = $Nm_lang['lang_btns_next_hint'];
  $this->arr_buttons['bavanca']['type']             = 'image';
  $this->arr_buttons['bavanca']['value']            = $Nm_lang['lang_btns_next'];
  $this->arr_buttons['bavanca']['display']          = 'only_img';
  $this->arr_buttons['bavanca']['display_position'] = 'img_right';
  $this->arr_buttons['bavanca']['fontawesomeicon']  = '';
  $this->arr_buttons['bavanca']['style'] = 'sc_image';
  $this->arr_buttons['bavanca']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_left_enabled.png';

  $this->arr_buttons['bfinal']['hint']             = $Nm_lang['lang_btns_last_hint'];
  $this->arr_buttons['bfinal']['type']             = 'image';
  $this->arr_buttons['bfinal']['value']            = $Nm_lang['lang_btns_last'];
  $this->arr_buttons['bfinal']['display']          = 'text_img';
  $this->arr_buttons['bfinal']['display_position'] = 'img_right';
  $this->arr_buttons['bfinal']['fontawesomeicon']  = '';
  $this->arr_buttons['bfinal']['style'] = 'sc_image';
  $this->arr_buttons['bfinal']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_first_enabled.png';

  $this->arr_buttons['bincluir']['hint']             = $Nm_lang['lang_btns_inst_hint'];
  $this->arr_buttons['bincluir']['type']             = 'button';
  $this->arr_buttons['bincluir']['value']            = $Nm_lang['lang_btns_inst'];
  $this->arr_buttons['bincluir']['display']          = 'only_text';
  $this->arr_buttons['bincluir']['display_position'] = 'img_right';
  $this->arr_buttons['bincluir']['fontawesomeicon']  = '';
  $this->arr_buttons['bincluir']['style'] = 'default';
  $this->arr_buttons['bincluir']['image'] = 'sys__NM__nm_teste_bincluir.gif';

  $this->arr_buttons['bexcluir']['hint']             = $Nm_lang['lang_btns_dele_hint'];
  $this->arr_buttons['bexcluir']['type']             = 'button';
  $this->arr_buttons['bexcluir']['value']            = $Nm_lang['lang_btns_dele'];
  $this->arr_buttons['bexcluir']['display']          = 'only_text';
  $this->arr_buttons['bexcluir']['display_position'] = 'img_right';
  $this->arr_buttons['bexcluir']['fontawesomeicon']  = '';
  $this->arr_buttons['bexcluir']['style'] = 'default';
  $this->arr_buttons['bexcluir']['image'] = 'sys__NM__nm_teste_bexcluir.gif';

  $this->arr_buttons['balterar']['hint']             = $Nm_lang['lang_btns_updt_hint'];
  $this->arr_buttons['balterar']['type']             = 'button';
  $this->arr_buttons['balterar']['value']            = $Nm_lang['lang_btns_updt'];
  $this->arr_buttons['balterar']['display']          = 'only_text';
  $this->arr_buttons['balterar']['display_position'] = 'img_right';
  $this->arr_buttons['balterar']['fontawesomeicon']  = '';
  $this->arr_buttons['balterar']['style'] = 'default';
  $this->arr_buttons['balterar']['image'] = 'sys__NM__nm_teste_balterar.gif';

  $this->arr_buttons['bexcluirsel']['hint']             = $Nm_lang['lang_btns_dl_sel_hint'];
  $this->arr_buttons['bexcluirsel']['type']             = 'button';
  $this->arr_buttons['bexcluirsel']['value']            = $Nm_lang['lang_btns_dl_sel'];
  $this->arr_buttons['bexcluirsel']['display']          = 'only_text';
  $this->arr_buttons['bexcluirsel']['display_position'] = 'img_right';
  $this->arr_buttons['bexcluirsel']['fontawesomeicon']  = '';
  $this->arr_buttons['bexcluirsel']['style'] = 'default';
  $this->arr_buttons['bexcluirsel']['image'] = 'sys__NM__nm_teste_bexcluirsel.gif';

  $this->arr_buttons['balterarsel']['hint']             = $Nm_lang['lang_btns_sv_sel_hint'];
  $this->arr_buttons['balterarsel']['type']             = 'button';
  $this->arr_buttons['balterarsel']['value']            = $Nm_lang['lang_btns_sv_sel'];
  $this->arr_buttons['balterarsel']['display']          = 'only_text';
  $this->arr_buttons['balterarsel']['display_position'] = 'img_right';
  $this->arr_buttons['balterarsel']['fontawesomeicon']  = '';
  $this->arr_buttons['balterarsel']['style'] = 'default';
  $this->arr_buttons['balterarsel']['image'] = 'sys__NM__nm_teste_balterarsel.gif';

  $this->arr_buttons['bnovo']['hint']             = $Nm_lang['lang_btns_neww_hint'];
  $this->arr_buttons['bnovo']['type']             = 'button';
  $this->arr_buttons['bnovo']['value']            = $Nm_lang['lang_btns_neww'];
  $this->arr_buttons['bnovo']['display']          = 'only_text';
  $this->arr_buttons['bnovo']['display_position'] = 'img_right';
  $this->arr_buttons['bnovo']['fontawesomeicon']  = '';
  $this->arr_buttons['bnovo']['style'] = 'default';
  $this->arr_buttons['bnovo']['image'] = 'sys__NM__nm_teste_bnovo.gif';

  $this->arr_buttons['bform_editar']['hint']             = $Nm_lang['lang_btns_pncl_hint'];
  $this->arr_buttons['bform_editar']['type']             = 'image';
  $this->arr_buttons['bform_editar']['value']            = $Nm_lang['lang_btns_pncl'];
  $this->arr_buttons['bform_editar']['display']          = 'only_text';
  $this->arr_buttons['bform_editar']['display_position'] = 'img_right';
  $this->arr_buttons['bform_editar']['fontawesomeicon']  = '';
  $this->arr_buttons['bform_editar']['style'] = 'disabledSCImage';
  $this->arr_buttons['bform_editar']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_edit.png';

  $this->arr_buttons['bform_captura']['hint']             = $Nm_lang['lang_btns_rtrv_grid_hint'];
  $this->arr_buttons['bform_captura']['type']             = 'image';
  $this->arr_buttons['bform_captura']['value']            = $Nm_lang['lang_btns_rtrv_grid'];
  $this->arr_buttons['bform_captura']['display']          = 'only_text';
  $this->arr_buttons['bform_captura']['display_position'] = 'img_right';
  $this->arr_buttons['bform_captura']['fontawesomeicon']  = '';
  $this->arr_buttons['bform_captura']['style'] = 'disabledSCImage';
  $this->arr_buttons['bform_captura']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_search.png';

  $this->arr_buttons['bform_lookuplink']['hint']             = $Nm_lang['lang_btns_rtrv_form_hint'];
  $this->arr_buttons['bform_lookuplink']['type']             = 'button';
  $this->arr_buttons['bform_lookuplink']['value']            = $Nm_lang['lang_btns_rtrv_form'];
  $this->arr_buttons['bform_lookuplink']['display']          = 'only_text';
  $this->arr_buttons['bform_lookuplink']['display_position'] = 'img_right';
  $this->arr_buttons['bform_lookuplink']['fontawesomeicon']  = '';
  $this->arr_buttons['bform_lookuplink']['style'] = 'default';
  $this->arr_buttons['bform_lookuplink']['image'] = 'sys__NM__nm_teste_bform_lookuplink.gif';

  $this->arr_buttons['bok']['hint']             = $Nm_lang['lang_btns_cfrm_hint'];
  $this->arr_buttons['bok']['type']             = 'button';
  $this->arr_buttons['bok']['value']            = $Nm_lang['lang_btns_cfrm'];
  $this->arr_buttons['bok']['display']          = 'only_text';
  $this->arr_buttons['bok']['display_position'] = 'img_right';
  $this->arr_buttons['bok']['fontawesomeicon']  = '';
  $this->arr_buttons['bok']['style'] = 'default';
  $this->arr_buttons['bok']['image'] = 'sys__NM__nm_teste_bok.gif';

  $this->arr_buttons['bcalendario']['hint']             = $Nm_lang['lang_btns_cldr_hint'];
  $this->arr_buttons['bcalendario']['type']             = 'image';
  $this->arr_buttons['bcalendario']['value']            = $Nm_lang['lang_btns_cldr'];
  $this->arr_buttons['bcalendario']['display']          = 'only_img';
  $this->arr_buttons['bcalendario']['display_position'] = 'img_right';
  $this->arr_buttons['bcalendario']['fontawesomeicon']  = '';
  $this->arr_buttons['bcalendario']['style'] = 'disabledSCImage';
  $this->arr_buttons['bcalendario']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_date.png';

  $this->arr_buttons['bcalculadora']['hint']             = $Nm_lang['lang_btns_calc_hint'];
  $this->arr_buttons['bcalculadora']['type']             = 'image';
  $this->arr_buttons['bcalculadora']['value']            = $Nm_lang['lang_btns_calc'];
  $this->arr_buttons['bcalculadora']['display']          = 'only_img';
  $this->arr_buttons['bcalculadora']['display_position'] = 'img_right';
  $this->arr_buttons['bcalculadora']['fontawesomeicon']  = '';
  $this->arr_buttons['bcalculadora']['style'] = 'disabledSCImage';
  $this->arr_buttons['bcalculadora']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_calc.png';

  $this->arr_buttons['bajaxcapt']['hint']             = $Nm_lang['lang_btns_ajax_hint'];
  $this->arr_buttons['bajaxcapt']['type']             = 'image';
  $this->arr_buttons['bajaxcapt']['value']            = $Nm_lang['lang_btns_ajax'];
  $this->arr_buttons['bajaxcapt']['display']          = 'only_text';
  $this->arr_buttons['bajaxcapt']['display_position'] = 'img_right';
  $this->arr_buttons['bajaxcapt']['fontawesomeicon']  = '';
  $this->arr_buttons['bajaxcapt']['style'] = 'disabledSCImage';
  $this->arr_buttons['bajaxcapt']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_search.png';

  $this->arr_buttons['bajaxclose']['hint']             = $Nm_lang['lang_btns_ajax_close_hint'];
  $this->arr_buttons['bajaxclose']['type']             = 'image';
  $this->arr_buttons['bajaxclose']['value']            = $Nm_lang['lang_btns_ajax_close'];
  $this->arr_buttons['bajaxclose']['display']          = 'only_text';
  $this->arr_buttons['bajaxclose']['display_position'] = 'img_right';
  $this->arr_buttons['bajaxclose']['fontawesomeicon']  = '';
  $this->arr_buttons['bajaxclose']['style'] = 'disabledSCImage';
  $this->arr_buttons['bajaxclose']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_close.png';

  $this->arr_buttons['bcaptchareload']['hint']             = $Nm_lang['lang_btns_cptc_rfim_hint'];
  $this->arr_buttons['bcaptchareload']['type']             = 'image';
  $this->arr_buttons['bcaptchareload']['value']            = $Nm_lang['lang_btns_cptc_rfim'];
  $this->arr_buttons['bcaptchareload']['display']          = 'only_text';
  $this->arr_buttons['bcaptchareload']['display_position'] = 'img_right';
  $this->arr_buttons['bcaptchareload']['fontawesomeicon']  = '';
  $this->arr_buttons['bcaptchareload']['style'] = 'disabledSCImage';
  $this->arr_buttons['bcaptchareload']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_refresh.png';

  $this->arr_buttons['bsrch_mtmf']['hint']             = $Nm_lang['lang_btns_srch_mtmf_hint'];
  $this->arr_buttons['bsrch_mtmf']['type']             = 'button';
  $this->arr_buttons['bsrch_mtmf']['value']            = $Nm_lang['lang_btns_srch_mtmf'];
  $this->arr_buttons['bsrch_mtmf']['display']          = 'only_text';
  $this->arr_buttons['bsrch_mtmf']['display_position'] = 'img_right';
  $this->arr_buttons['bsrch_mtmf']['fontawesomeicon']  = '';
  $this->arr_buttons['bsrch_mtmf']['style'] = 'default';
  $this->arr_buttons['bsrch_mtmf']['image'] = 'sys__NM__nm_teste_bsrch_mtmf.gif';

  $this->arr_buttons['bcopy']['hint']             = $Nm_lang['lang_btns_copy_hint'];
  $this->arr_buttons['bcopy']['type']             = 'button';
  $this->arr_buttons['bcopy']['value']            = $Nm_lang['lang_btns_copy'];
  $this->arr_buttons['bcopy']['display']          = 'only_text';
  $this->arr_buttons['bcopy']['display_position'] = 'img_right';
  $this->arr_buttons['bcopy']['fontawesomeicon']  = '';
  $this->arr_buttons['bcopy']['style'] = 'default';
  $this->arr_buttons['bcopy']['image'] = 'sys__NM__nm_teste_bcopy.gif';

  $this->arr_buttons['bcresumo']['hint']             = $Nm_lang['lang_btns_smry_hint'];
  $this->arr_buttons['bcresumo']['type']             = 'button';
  $this->arr_buttons['bcresumo']['value']            = $Nm_lang['lang_btns_smry'];
  $this->arr_buttons['bcresumo']['display']          = 'only_text';
  $this->arr_buttons['bcresumo']['display_position'] = 'text_right';
  $this->arr_buttons['bcresumo']['fontawesomeicon']  = '';
  $this->arr_buttons['bcresumo']['style'] = 'default';
  $this->arr_buttons['bcresumo']['image'] = 'scriptcase__NM__nm_scriptcase8_BlueWood_bcresumo.gif';

  $this->arr_buttons['bcsort']['hint']             = $Nm_lang['lang_btns_sort_hint'];
  $this->arr_buttons['bcsort']['type']             = 'button';
  $this->arr_buttons['bcsort']['value']            = $Nm_lang['lang_btns_sort'];
  $this->arr_buttons['bcsort']['display']          = 'text_img';
  $this->arr_buttons['bcsort']['display_position'] = 'text_right';
  $this->arr_buttons['bcsort']['fontawesomeicon']  = '';
  $this->arr_buttons['bcsort']['style'] = 'default';
  $this->arr_buttons['bcsort']['image'] = 'scriptcase__NM__sc_ico_order_b.png';

  $this->arr_buttons['bctype']['hint']             = $Nm_lang['lang_btns_ctype_hint'];
  $this->arr_buttons['bctype']['type']             = 'button';
  $this->arr_buttons['bctype']['value']            = $Nm_lang['lang_btns_ctype'];
  $this->arr_buttons['bctype']['display']          = 'only_text';
  $this->arr_buttons['bctype']['display_position'] = 'text_right';
  $this->arr_buttons['bctype']['fontawesomeicon']  = '';
  $this->arr_buttons['bctype']['style'] = 'default';
  $this->arr_buttons['bctype']['image'] = 'scriptcase__NM__nm_scriptcase8_BlueWood_bctype.gif';

  $this->arr_buttons['bcpersonalite']['hint']             = $Nm_lang['lang_btns_ctpersonalite_hint'];
  $this->arr_buttons['bcpersonalite']['type']             = 'button';
  $this->arr_buttons['bcpersonalite']['value']            = $Nm_lang['lang_btns_ctpersonalite'];
  $this->arr_buttons['bcpersonalite']['display']          = 'text_img';
  $this->arr_buttons['bcpersonalite']['display_position'] = 'text_right';
  $this->arr_buttons['bcpersonalite']['fontawesomeicon']  = '';
  $this->arr_buttons['bcpersonalite']['style'] = 'default';
  $this->arr_buttons['bcpersonalite']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_set_charts.png';

  $this->arr_buttons['bchart_bar']['hint']             = $Nm_lang['lang_btns_ctbar_hint'];
  $this->arr_buttons['bchart_bar']['type']             = 'button';
  $this->arr_buttons['bchart_bar']['value']            = $Nm_lang['lang_btns_ctbar'];
  $this->arr_buttons['bchart_bar']['display']          = 'only_img';
  $this->arr_buttons['bchart_bar']['display_position'] = 'text_right';
  $this->arr_buttons['bchart_bar']['fontawesomeicon']  = '';
  $this->arr_buttons['bchart_bar']['style'] = 'group';
  $this->arr_buttons['bchart_bar']['image'] = 'scriptcase__NM__sc_ico_bar_c.png';

  $this->arr_buttons['bchart_line']['hint']             = $Nm_lang['lang_btns_ctline_hint'];
  $this->arr_buttons['bchart_line']['type']             = 'button';
  $this->arr_buttons['bchart_line']['value']            = $Nm_lang['lang_btns_ctline'];
  $this->arr_buttons['bchart_line']['display']          = 'only_img';
  $this->arr_buttons['bchart_line']['display_position'] = 'text_right';
  $this->arr_buttons['bchart_line']['fontawesomeicon']  = '';
  $this->arr_buttons['bchart_line']['style'] = 'group';
  $this->arr_buttons['bchart_line']['image'] = 'scriptcase__NM__sc_ico_line_c.png';

  $this->arr_buttons['bchart_area']['hint']             = $Nm_lang['lang_btns_ctarea_hint'];
  $this->arr_buttons['bchart_area']['type']             = 'button';
  $this->arr_buttons['bchart_area']['value']            = $Nm_lang['lang_btns_ctarea'];
  $this->arr_buttons['bchart_area']['display']          = 'only_img';
  $this->arr_buttons['bchart_area']['display_position'] = 'text_right';
  $this->arr_buttons['bchart_area']['fontawesomeicon']  = '';
  $this->arr_buttons['bchart_area']['style'] = 'group';
  $this->arr_buttons['bchart_area']['image'] = 'scriptcase__NM__sc_ico_area_c.png';

  $this->arr_buttons['bchart_pizza']['hint']             = $Nm_lang['lang_btns_ctpizza_hint'];
  $this->arr_buttons['bchart_pizza']['type']             = 'button';
  $this->arr_buttons['bchart_pizza']['value']            = $Nm_lang['lang_btns_ctpizza'];
  $this->arr_buttons['bchart_pizza']['display']          = 'only_img';
  $this->arr_buttons['bchart_pizza']['display_position'] = 'text_right';
  $this->arr_buttons['bchart_pizza']['fontawesomeicon']  = '';
  $this->arr_buttons['bchart_pizza']['style'] = 'group';
  $this->arr_buttons['bchart_pizza']['image'] = 'scriptcase__NM__sc_ico_pizza_c.png';

  $this->arr_buttons['bchart_combo']['hint']             = $Nm_lang['lang_btns_ctcombo_hint'];
  $this->arr_buttons['bchart_combo']['type']             = 'button';
  $this->arr_buttons['bchart_combo']['value']            = $Nm_lang['lang_btns_ctcombo'];
  $this->arr_buttons['bchart_combo']['display']          = 'only_img';
  $this->arr_buttons['bchart_combo']['display_position'] = 'text_right';
  $this->arr_buttons['bchart_combo']['fontawesomeicon']  = '';
  $this->arr_buttons['bchart_combo']['style'] = 'group';
  $this->arr_buttons['bchart_combo']['image'] = 'scriptcase__NM__sc_ico_combo_c.png';

  $this->arr_buttons['bchart_stack']['hint']             = $Nm_lang['lang_btns_ctstack_hint'];
  $this->arr_buttons['bchart_stack']['type']             = 'button';
  $this->arr_buttons['bchart_stack']['value']            = $Nm_lang['lang_btns_ctstack'];
  $this->arr_buttons['bchart_stack']['display']          = 'only_img';
  $this->arr_buttons['bchart_stack']['display_position'] = 'text_right';
  $this->arr_buttons['bchart_stack']['fontawesomeicon']  = '';
  $this->arr_buttons['bchart_stack']['style'] = 'group';
  $this->arr_buttons['bchart_stack']['image'] = 'scriptcase__NM__sc_ico_stack_c.png';

  $this->arr_buttons['bcsort_on']['hint']             = $Nm_lang['lang_btns_sort_hint'];
  $this->arr_buttons['bcsort_on']['type']             = 'button';
  $this->arr_buttons['bcsort_on']['value']            = $Nm_lang['lang_btns_sort'];
  $this->arr_buttons['bcsort_on']['display']          = 'text_img';
  $this->arr_buttons['bcsort_on']['display_position'] = 'text_right';
  $this->arr_buttons['bcsort_on']['fontawesomeicon']  = '';
  $this->arr_buttons['bcsort_on']['style'] = 'default';
  $this->arr_buttons['bcsort_on']['image'] = 'scriptcase__NM__sc_ico_order_c.png';

  $this->arr_buttons['bchart_bar_on']['hint']             = $Nm_lang['lang_btns_ctbar_hint'];
  $this->arr_buttons['bchart_bar_on']['type']             = 'button';
  $this->arr_buttons['bchart_bar_on']['value']            = $Nm_lang['lang_btns_ctbar'];
  $this->arr_buttons['bchart_bar_on']['display']          = 'only_img';
  $this->arr_buttons['bchart_bar_on']['display_position'] = 'text_right';
  $this->arr_buttons['bchart_bar_on']['fontawesomeicon']  = '';
  $this->arr_buttons['bchart_bar_on']['style'] = 'group';
  $this->arr_buttons['bchart_bar_on']['image'] = 'scriptcase__NM__sc_ico_bar_c.png';

  $this->arr_buttons['bchart_line_on']['hint']             = $Nm_lang['lang_btns_ctline_hint'];
  $this->arr_buttons['bchart_line_on']['type']             = 'button';
  $this->arr_buttons['bchart_line_on']['value']            = $Nm_lang['lang_btns_ctline'];
  $this->arr_buttons['bchart_line_on']['display']          = 'only_img';
  $this->arr_buttons['bchart_line_on']['display_position'] = 'text_right';
  $this->arr_buttons['bchart_line_on']['fontawesomeicon']  = '';
  $this->arr_buttons['bchart_line_on']['style'] = 'group';
  $this->arr_buttons['bchart_line_on']['image'] = 'scriptcase__NM__sc_ico_line_c.png';

  $this->arr_buttons['bchart_area_on']['hint']             = $Nm_lang['lang_btns_ctarea_hint'];
  $this->arr_buttons['bchart_area_on']['type']             = 'button';
  $this->arr_buttons['bchart_area_on']['value']            = $Nm_lang['lang_btns_ctarea'];
  $this->arr_buttons['bchart_area_on']['display']          = 'only_img';
  $this->arr_buttons['bchart_area_on']['display_position'] = 'text_right';
  $this->arr_buttons['bchart_area_on']['fontawesomeicon']  = '';
  $this->arr_buttons['bchart_area_on']['style'] = 'group';
  $this->arr_buttons['bchart_area_on']['image'] = 'scriptcase__NM__sc_ico_area_c.png';

  $this->arr_buttons['bchart_pizza_on']['hint']             = $Nm_lang['lang_btns_ctpizza_hint'];
  $this->arr_buttons['bchart_pizza_on']['type']             = 'button';
  $this->arr_buttons['bchart_pizza_on']['value']            = $Nm_lang['lang_btns_ctpizza'];
  $this->arr_buttons['bchart_pizza_on']['display']          = 'only_img';
  $this->arr_buttons['bchart_pizza_on']['display_position'] = 'text_right';
  $this->arr_buttons['bchart_pizza_on']['fontawesomeicon']  = '';
  $this->arr_buttons['bchart_pizza_on']['style'] = 'group';
  $this->arr_buttons['bchart_pizza_on']['image'] = 'scriptcase__NM__sc_ico_pizza_c.png';

  $this->arr_buttons['bchart_combo_on']['hint']             = $Nm_lang['lang_btns_ctcombo_hint'];
  $this->arr_buttons['bchart_combo_on']['type']             = 'button';
  $this->arr_buttons['bchart_combo_on']['value']            = $Nm_lang['lang_btns_ctcombo'];
  $this->arr_buttons['bchart_combo_on']['display']          = 'only_img';
  $this->arr_buttons['bchart_combo_on']['display_position'] = 'text_right';
  $this->arr_buttons['bchart_combo_on']['fontawesomeicon']  = '';
  $this->arr_buttons['bchart_combo_on']['style'] = 'group';
  $this->arr_buttons['bchart_combo_on']['image'] = 'scriptcase__NM__sc_ico_combo_c.png';

  $this->arr_buttons['bchart_stack_on']['hint']             = $Nm_lang['lang_btns_ctstack_hint'];
  $this->arr_buttons['bchart_stack_on']['type']             = 'button';
  $this->arr_buttons['bchart_stack_on']['value']            = $Nm_lang['lang_btns_ctstack'];
  $this->arr_buttons['bchart_stack_on']['display']          = 'only_img';
  $this->arr_buttons['bchart_stack_on']['display_position'] = 'text_right';
  $this->arr_buttons['bchart_stack_on']['fontawesomeicon']  = '';
  $this->arr_buttons['bchart_stack_on']['style'] = 'group';
  $this->arr_buttons['bchart_stack_on']['image'] = 'scriptcase__NM__sc_ico_stack_c.png';

  $this->arr_buttons['bpesquisa']['hint']             = $Nm_lang['lang_btns_srch_hint'];
  $this->arr_buttons['bpesquisa']['type']             = 'button';
  $this->arr_buttons['bpesquisa']['value']            = $Nm_lang['lang_btns_srch'];
  $this->arr_buttons['bpesquisa']['display']          = 'only_text';
  $this->arr_buttons['bpesquisa']['display_position'] = 'img_right';
  $this->arr_buttons['bpesquisa']['fontawesomeicon']  = '';
  $this->arr_buttons['bpesquisa']['style'] = 'default';
  $this->arr_buttons['bpesquisa']['image'] = 'sys__NM__nm_teste_bpesquisa.gif';

  $this->arr_buttons['blimpar']['hint']             = $Nm_lang['lang_btns_clea_hint'];
  $this->arr_buttons['blimpar']['type']             = 'button';
  $this->arr_buttons['blimpar']['value']            = $Nm_lang['lang_btns_clea'];
  $this->arr_buttons['blimpar']['display']          = 'only_text';
  $this->arr_buttons['blimpar']['display_position'] = 'img_right';
  $this->arr_buttons['blimpar']['fontawesomeicon']  = '';
  $this->arr_buttons['blimpar']['style'] = 'default';
  $this->arr_buttons['blimpar']['image'] = 'sys__NM__nm_teste_blimpar.gif';

  $this->arr_buttons['bsalvar']['hint']             = $Nm_lang['lang_btns_save_hint'];
  $this->arr_buttons['bsalvar']['type']             = 'button';
  $this->arr_buttons['bsalvar']['value']            = $Nm_lang['lang_btns_save'];
  $this->arr_buttons['bsalvar']['display']          = 'only_text';
  $this->arr_buttons['bsalvar']['display_position'] = 'img_right';
  $this->arr_buttons['bsalvar']['fontawesomeicon']  = '';
  $this->arr_buttons['bsalvar']['style'] = 'small';
  $this->arr_buttons['bsalvar']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bsalvar.gif';

  $this->arr_buttons['bedit_filter']['hint']             = $Nm_lang['lang_btns_srch_edit_hint'];
  $this->arr_buttons['bedit_filter']['type']             = 'button';
  $this->arr_buttons['bedit_filter']['value']            = $Nm_lang['lang_btns_srch_edit'];
  $this->arr_buttons['bedit_filter']['display']          = 'only_text';
  $this->arr_buttons['bedit_filter']['display_position'] = 'img_right';
  $this->arr_buttons['bedit_filter']['fontawesomeicon']  = '';
  $this->arr_buttons['bedit_filter']['style'] = 'default';
  $this->arr_buttons['bedit_filter']['image'] = 'sys__NM__nm_teste_bedit_filter.gif';

  $this->arr_buttons['bquick_search']['hint']             = $Nm_lang['lang_btns_quck_srch_hint'];
  $this->arr_buttons['bquick_search']['type']             = 'image';
  $this->arr_buttons['bquick_search']['value']            = $Nm_lang['lang_btns_quck_srch'];
  $this->arr_buttons['bquick_search']['display']          = 'only_img';
  $this->arr_buttons['bquick_search']['display_position'] = 'img_right';
  $this->arr_buttons['bquick_search']['fontawesomeicon']  = '';
  $this->arr_buttons['bquick_search']['style'] = 'disabledSCImage';
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
  $this->arr_buttons['blimparsummaryall']['display']          = 'only_text';
  $this->arr_buttons['blimparsummaryall']['display_position'] = 'text_right';
  $this->arr_buttons['blimparsummaryall']['fontawesomeicon']  = '';
  $this->arr_buttons['blimparsummaryall']['style'] = 'small';
  $this->arr_buttons['blimparsummaryall']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_blimparsummaryall.gif';

  $this->arr_buttons['boksummary']['hint']             = $Nm_lang['lang_btns_ok_summary_hint'];
  $this->arr_buttons['boksummary']['type']             = 'button';
  $this->arr_buttons['boksummary']['value']            = $Nm_lang['lang_btns_ok_summary'];
  $this->arr_buttons['boksummary']['display']          = 'only_text';
  $this->arr_buttons['boksummary']['display_position'] = 'text_right';
  $this->arr_buttons['boksummary']['fontawesomeicon']  = '';
  $this->arr_buttons['boksummary']['style'] = 'default';
  $this->arr_buttons['boksummary']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_boksummary.gif';

  $this->arr_buttons['bmd_incluir']['hint']             = $Nm_lang['lang_btns_mdtl_inst_hint'];
  $this->arr_buttons['bmd_incluir']['type']             = 'image';
  $this->arr_buttons['bmd_incluir']['value']            = $Nm_lang['lang_btns_mdtl_inst'];
  $this->arr_buttons['bmd_incluir']['display']          = 'only_text';
  $this->arr_buttons['bmd_incluir']['display_position'] = 'img_right';
  $this->arr_buttons['bmd_incluir']['fontawesomeicon']  = '';
  $this->arr_buttons['bmd_incluir']['style'] = 'disabledSCImage';
  $this->arr_buttons['bmd_incluir']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_done.png';

  $this->arr_buttons['bmd_excluir']['hint']             = $Nm_lang['lang_btns_mdtl_dele_hint'];
  $this->arr_buttons['bmd_excluir']['type']             = 'image';
  $this->arr_buttons['bmd_excluir']['value']            = $Nm_lang['lang_btns_mdtl_dele'];
  $this->arr_buttons['bmd_excluir']['display']          = 'only_text';
  $this->arr_buttons['bmd_excluir']['display_position'] = 'img_right';
  $this->arr_buttons['bmd_excluir']['fontawesomeicon']  = '';
  $this->arr_buttons['bmd_excluir']['style'] = 'disabledSCImage';
  $this->arr_buttons['bmd_excluir']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_delete.png';

  $this->arr_buttons['bmd_alterar']['hint']             = $Nm_lang['lang_btns_mdtl_updt_hint'];
  $this->arr_buttons['bmd_alterar']['type']             = 'image';
  $this->arr_buttons['bmd_alterar']['value']            = $Nm_lang['lang_btns_mdtl_updt'];
  $this->arr_buttons['bmd_alterar']['display']          = 'only_text';
  $this->arr_buttons['bmd_alterar']['display_position'] = 'img_right';
  $this->arr_buttons['bmd_alterar']['fontawesomeicon']  = '';
  $this->arr_buttons['bmd_alterar']['style'] = 'disabledSCImage';
  $this->arr_buttons['bmd_alterar']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_refresh.png';

  $this->arr_buttons['bmd_novo']['hint']             = $Nm_lang['lang_btns_copy_hint'];
  $this->arr_buttons['bmd_novo']['type']             = 'image';
  $this->arr_buttons['bmd_novo']['value']            = $Nm_lang['lang_btns_copy'];
  $this->arr_buttons['bmd_novo']['display']          = 'only_text';
  $this->arr_buttons['bmd_novo']['display_position'] = 'img_right';
  $this->arr_buttons['bmd_novo']['fontawesomeicon']  = '';
  $this->arr_buttons['bmd_novo']['style'] = 'disabledSCImage';
  $this->arr_buttons['bmd_novo']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_copy.png';

  $this->arr_buttons['bmd_cancelar']['hint']             = $Nm_lang['lang_btns_mdtl_cncl_hint'];
  $this->arr_buttons['bmd_cancelar']['type']             = 'image';
  $this->arr_buttons['bmd_cancelar']['value']            = $Nm_lang['lang_btns_mdtl_cncl'];
  $this->arr_buttons['bmd_cancelar']['display']          = 'only_text';
  $this->arr_buttons['bmd_cancelar']['display_position'] = 'img_right';
  $this->arr_buttons['bmd_cancelar']['fontawesomeicon']  = '';
  $this->arr_buttons['bmd_cancelar']['style'] = 'disabledSCImage';
  $this->arr_buttons['bmd_cancelar']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_close.png';

  $this->arr_buttons['bmd_edit']['hint']             = $Nm_lang['lang_btns_mdtl_edit_hint'];
  $this->arr_buttons['bmd_edit']['type']             = 'image';
  $this->arr_buttons['bmd_edit']['value']            = $Nm_lang['lang_btns_mdtl_edit'];
  $this->arr_buttons['bmd_edit']['display']          = 'only_text';
  $this->arr_buttons['bmd_edit']['display_position'] = 'img_right';
  $this->arr_buttons['bmd_edit']['fontawesomeicon']  = '';
  $this->arr_buttons['bmd_edit']['style'] = 'disabledSCImage';
  $this->arr_buttons['bmd_edit']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_edit.png';

  $this->arr_buttons['bfacebook']['hint']             = '{Facebook_hint}';
  $this->arr_buttons['bfacebook']['type']             = 'button';
  $this->arr_buttons['bfacebook']['value']            = '{Facebook}';
  $this->arr_buttons['bfacebook']['display']          = 'text_img';
  $this->arr_buttons['bfacebook']['display_position'] = 'img_right';
  $this->arr_buttons['bfacebook']['fontawesomeicon']  = '';
  $this->arr_buttons['bfacebook']['style'] = 'default';
  $this->arr_buttons['bfacebook']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_facebook.png';

  $this->arr_buttons['bgoogle']['hint']             = '{Google_hint}';
  $this->arr_buttons['bgoogle']['type']             = 'button';
  $this->arr_buttons['bgoogle']['value']            = '{Google}';
  $this->arr_buttons['bgoogle']['display']          = 'text_img';
  $this->arr_buttons['bgoogle']['display_position'] = 'img_right';
  $this->arr_buttons['bgoogle']['fontawesomeicon']  = '';
  $this->arr_buttons['bgoogle']['style'] = 'default';
  $this->arr_buttons['bgoogle']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_google_plus.png';

  $this->arr_buttons['bpaypal']['hint']             = '{Paypal_hint}';
  $this->arr_buttons['bpaypal']['type']             = 'button';
  $this->arr_buttons['bpaypal']['value']            = '{Paypal}';
  $this->arr_buttons['bpaypal']['display']          = 'text_img';
  $this->arr_buttons['bpaypal']['display_position'] = 'img_right';
  $this->arr_buttons['bpaypal']['fontawesomeicon']  = '';
  $this->arr_buttons['bpaypal']['style'] = 'default';
  $this->arr_buttons['bpaypal']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_paypal.png';

  $this->arr_buttons['btwitter']['hint']             = '{Twitter_hint}';
  $this->arr_buttons['btwitter']['type']             = 'button';
  $this->arr_buttons['btwitter']['value']            = '{Twitter}';
  $this->arr_buttons['btwitter']['display']          = 'text_img';
  $this->arr_buttons['btwitter']['display_position'] = 'img_right';
  $this->arr_buttons['btwitter']['fontawesomeicon']  = '';
  $this->arr_buttons['btwitter']['style'] = 'default';
  $this->arr_buttons['btwitter']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_twitter.png';

  $this->arr_buttons['bmenu']['hint']             = '{Menu_hint}';
  $this->arr_buttons['bmenu']['type']             = 'button';
  $this->arr_buttons['bmenu']['value']            = '{Menu}';
  $this->arr_buttons['bmenu']['display']          = 'only_img';
  $this->arr_buttons['bmenu']['display_position'] = 'text_right';
  $this->arr_buttons['bmenu']['fontawesomeicon']  = '';
  $this->arr_buttons['bmenu']['style'] = 'default';
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
  $this->arr_buttons['bsair']['display']          = 'only_text';
  $this->arr_buttons['bsair']['display_position'] = 'img_right';
  $this->arr_buttons['bsair']['fontawesomeicon']  = '';
  $this->arr_buttons['bsair']['style'] = 'default';
  $this->arr_buttons['bsair']['image'] = 'sys__NM__nm_teste_bsair.gif';

  $this->arr_buttons['bvoltar']['hint']             = $Nm_lang['lang_btns_back_hint'];
  $this->arr_buttons['bvoltar']['type']             = 'button';
  $this->arr_buttons['bvoltar']['value']            = $Nm_lang['lang_btns_back'];
  $this->arr_buttons['bvoltar']['display']          = 'only_text';
  $this->arr_buttons['bvoltar']['display_position'] = 'img_right';
  $this->arr_buttons['bvoltar']['fontawesomeicon']  = '';
  $this->arr_buttons['bvoltar']['style'] = 'default';
  $this->arr_buttons['bvoltar']['image'] = 'sys__NM__nm_teste_bvoltar.gif';

  $this->arr_buttons['bcancelar']['hint']             = $Nm_lang['lang_btns_cncl_hint'];
  $this->arr_buttons['bcancelar']['type']             = 'button';
  $this->arr_buttons['bcancelar']['value']            = $Nm_lang['lang_btns_cncl'];
  $this->arr_buttons['bcancelar']['display']          = 'only_text';
  $this->arr_buttons['bcancelar']['display_position'] = 'img_right';
  $this->arr_buttons['bcancelar']['fontawesomeicon']  = '';
  $this->arr_buttons['bcancelar']['style'] = 'default';
  $this->arr_buttons['bcancelar']['image'] = 'sys__NM__nm_teste_bcancelar.gif';

  $this->arr_buttons['bapply']['hint']             = $Nm_lang['lang_btns_apply_hint'];
  $this->arr_buttons['bapply']['type']             = 'button';
  $this->arr_buttons['bapply']['value']            = $Nm_lang['lang_btns_apply'];
  $this->arr_buttons['bapply']['display']          = 'only_text';
  $this->arr_buttons['bapply']['display_position'] = 'img_right';
  $this->arr_buttons['bapply']['fontawesomeicon']  = '';
  $this->arr_buttons['bapply']['style'] = 'default';
  $this->arr_buttons['bapply']['image'] = 'sys__NM__nm_teste_bapply.gif';

  $this->arr_buttons['brestore']['hint']             = $Nm_lang['lang_btns_restore_hint'];
  $this->arr_buttons['brestore']['type']             = 'button';
  $this->arr_buttons['brestore']['value']            = $Nm_lang['lang_btns_restore'];
  $this->arr_buttons['brestore']['display']          = 'only_text';
  $this->arr_buttons['brestore']['display_position'] = 'img_right';
  $this->arr_buttons['brestore']['fontawesomeicon']  = '';
  $this->arr_buttons['brestore']['style'] = 'default';
  $this->arr_buttons['brestore']['image'] = 'sys__NM__nm_teste_brestore.gif';

  $this->arr_buttons['bzipcode']['hint']             = $Nm_lang['lang_btns_zpcd_hint'];
  $this->arr_buttons['bzipcode']['type']             = 'image';
  $this->arr_buttons['bzipcode']['value']            = $Nm_lang['lang_btns_zpcd'];
  $this->arr_buttons['bzipcode']['display']          = 'only_img';
  $this->arr_buttons['bzipcode']['display_position'] = 'text_right';
  $this->arr_buttons['bzipcode']['fontawesomeicon']  = '';
  $this->arr_buttons['bzipcode']['style'] = 'disabledSCImage';
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
  $this->arr_buttons['bsrgb']['type']             = 'image';
  $this->arr_buttons['bsrgb']['value']            = $Nm_lang['lang_btns_srgb'];
  $this->arr_buttons['bsrgb']['display']          = 'only_text';
  $this->arr_buttons['bsrgb']['display_position'] = 'img_right';
  $this->arr_buttons['bsrgb']['fontawesomeicon']  = '';
  $this->arr_buttons['bsrgb']['style'] = 'disabledSCImage';
  $this->arr_buttons['bsrgb']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_color.png';

  $this->arr_buttons['berrm_clse']['hint']             = $Nm_lang['lang_btns_errm_clse_hint'];
  $this->arr_buttons['berrm_clse']['type']             = 'button';
  $this->arr_buttons['berrm_clse']['value']            = $Nm_lang['lang_btns_errm_clse'];
  $this->arr_buttons['berrm_clse']['display']          = 'only_text';
  $this->arr_buttons['berrm_clse']['display_position'] = 'img_right';
  $this->arr_buttons['berrm_clse']['fontawesomeicon']  = '';
  $this->arr_buttons['berrm_clse']['style'] = 'default';
  $this->arr_buttons['berrm_clse']['image'] = 'sys__NM__nm_teste_berrm_clse.gif';

  $this->arr_buttons['bemail']['hint']             = $Nm_lang['lang_btns_emai_hint'];
  $this->arr_buttons['bemail']['type']             = 'image';
  $this->arr_buttons['bemail']['value']            = $Nm_lang['lang_btns_emai'];
  $this->arr_buttons['bemail']['display']          = 'only_text';
  $this->arr_buttons['bemail']['display_position'] = 'img_right';
  $this->arr_buttons['bemail']['fontawesomeicon']  = '';
  $this->arr_buttons['bemail']['style'] = 'disabledSCImage';
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
  $this->arr_buttons['bmessageclose']['display']          = 'only_text';
  $this->arr_buttons['bmessageclose']['display_position'] = 'img_right';
  $this->arr_buttons['bmessageclose']['fontawesomeicon']  = '';
  $this->arr_buttons['bmessageclose']['style'] = 'default';
  $this->arr_buttons['bmessageclose']['image'] = 'sys__NM__nm_teste_bmessageclose.gif';

  $this->arr_buttons['bgooglemaps']['hint']             = $Nm_lang['lang_btns_maps_hint'];
  $this->arr_buttons['bgooglemaps']['type']             = 'button';
  $this->arr_buttons['bgooglemaps']['value']            = $Nm_lang['lang_btns_maps'];
  $this->arr_buttons['bgooglemaps']['display']          = 'text_img';
  $this->arr_buttons['bgooglemaps']['display_position'] = 'img_right';
  $this->arr_buttons['bgooglemaps']['fontawesomeicon']  = '';
  $this->arr_buttons['bgooglemaps']['style'] = 'default';
  $this->arr_buttons['bgooglemaps']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_google.png';

  $this->arr_buttons['bclear']['hint']             = $Nm_lang['lang_btns_clear_hint'];
  $this->arr_buttons['bclear']['type']             = 'button';
  $this->arr_buttons['bclear']['value']            = $Nm_lang['lang_btns_clear'];
  $this->arr_buttons['bclear']['display']          = 'only_text';
  $this->arr_buttons['bclear']['display_position'] = 'text_right';
  $this->arr_buttons['bclear']['fontawesomeicon']  = '';
  $this->arr_buttons['bclear']['style'] = 'default';
  $this->arr_buttons['bclear']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bclear.gif';

  $this->arr_buttons['byoutube']['hint']             = $Nm_lang['lang_btns_yutb_hint'];
  $this->arr_buttons['byoutube']['type']             = 'button';
  $this->arr_buttons['byoutube']['value']            = $Nm_lang['lang_btns_yutb'];
  $this->arr_buttons['byoutube']['display']          = 'text_img';
  $this->arr_buttons['byoutube']['display_position'] = 'img_right';
  $this->arr_buttons['byoutube']['fontawesomeicon']  = '';
  $this->arr_buttons['byoutube']['style'] = 'default';
  $this->arr_buttons['byoutube']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_youtube.png';

  $this->arr_buttons['bpassfld_up']['hint']             = $Nm_lang['lang_btns_bpassfld_up_hint'];
  $this->arr_buttons['bpassfld_up']['type']             = 'image';
  $this->arr_buttons['bpassfld_up']['value']            = $Nm_lang['lang_btns_bpassfld_up'];
  $this->arr_buttons['bpassfld_up']['display']          = 'text_img';
  $this->arr_buttons['bpassfld_up']['display_position'] = 'text_right';
  $this->arr_buttons['bpassfld_up']['fontawesomeicon']  = '';
  $this->arr_buttons['bpassfld_up']['style'] = 'disabledSCImage';
  $this->arr_buttons['bpassfld_up']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_come_up.png';

  $this->arr_buttons['bpassfld_down']['hint']             = $Nm_lang['lang_btns_bpassfld_down_hint'];
  $this->arr_buttons['bpassfld_down']['type']             = 'image';
  $this->arr_buttons['bpassfld_down']['value']            = $Nm_lang['lang_btns_bpassfld_down'];
  $this->arr_buttons['bpassfld_down']['display']          = 'only_img';
  $this->arr_buttons['bpassfld_down']['display_position'] = 'text_right';
  $this->arr_buttons['bpassfld_down']['fontawesomeicon']  = '';
  $this->arr_buttons['bpassfld_down']['style'] = 'disabledSCImage';
  $this->arr_buttons['bpassfld_down']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_come_down.png';

  $this->arr_buttons['bpassfld_rightall']['hint']             = $Nm_lang['lang_btns_bpassfld_rightall_hint'];
  $this->arr_buttons['bpassfld_rightall']['type']             = 'image';
  $this->arr_buttons['bpassfld_rightall']['value']            = $Nm_lang['lang_btns_bpassfld_rightall'];
  $this->arr_buttons['bpassfld_rightall']['display']          = 'only_img';
  $this->arr_buttons['bpassfld_rightall']['display_position'] = 'text_right';
  $this->arr_buttons['bpassfld_rightall']['fontawesomeicon']  = '';
  $this->arr_buttons['bpassfld_rightall']['style'] = 'disabledSCImage';
  $this->arr_buttons['bpassfld_rightall']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_rewind.png';

  $this->arr_buttons['bpassfld_right']['hint']             = $Nm_lang['lang_btns_bpassfld_right_hint'];
  $this->arr_buttons['bpassfld_right']['type']             = 'image';
  $this->arr_buttons['bpassfld_right']['value']            = $Nm_lang['lang_btns_bpassfld_right'];
  $this->arr_buttons['bpassfld_right']['display']          = 'only_img';
  $this->arr_buttons['bpassfld_right']['display_position'] = 'text_right';
  $this->arr_buttons['bpassfld_right']['fontawesomeicon']  = '';
  $this->arr_buttons['bpassfld_right']['style'] = 'disabledSCImage';
  $this->arr_buttons['bpassfld_right']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_left_enabled.png';

  $this->arr_buttons['bpassfld_leftall']['hint']             = $Nm_lang['lang_btns_bpassfld_leftall_hint'];
  $this->arr_buttons['bpassfld_leftall']['type']             = 'image';
  $this->arr_buttons['bpassfld_leftall']['value']            = $Nm_lang['lang_btns_bpassfld_leftall'];
  $this->arr_buttons['bpassfld_leftall']['display']          = 'only_img';
  $this->arr_buttons['bpassfld_leftall']['display_position'] = 'text_right';
  $this->arr_buttons['bpassfld_leftall']['fontawesomeicon']  = '';
  $this->arr_buttons['bpassfld_leftall']['style'] = 'disabledSCImage';
  $this->arr_buttons['bpassfld_leftall']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_foward.png';

  $this->arr_buttons['bpassfld_left']['hint']             = $Nm_lang['lang_btns_bpassfld_left_hint'];
  $this->arr_buttons['bpassfld_left']['type']             = 'image';
  $this->arr_buttons['bpassfld_left']['value']            = $Nm_lang['lang_btns_bpassfld_left'];
  $this->arr_buttons['bpassfld_left']['display']          = 'only_img';
  $this->arr_buttons['bpassfld_left']['display_position'] = 'text_right';
  $this->arr_buttons['bpassfld_left']['fontawesomeicon']  = '';
  $this->arr_buttons['bpassfld_left']['style'] = 'disabledSCImage';
  $this->arr_buttons['bpassfld_left']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_right_enabled.png';

  $this->arr_buttons['bapply_appdiv']['hint']             = $Nm_lang['lang_btns_apply_hint'];
  $this->arr_buttons['bapply_appdiv']['type']             = 'button';
  $this->arr_buttons['bapply_appdiv']['value']            = $Nm_lang['lang_btns_apply'];
  $this->arr_buttons['bapply_appdiv']['display']          = 'only_text';
  $this->arr_buttons['bapply_appdiv']['display_position'] = 'img_right';
  $this->arr_buttons['bapply_appdiv']['fontawesomeicon']  = '';
  $this->arr_buttons['bapply_appdiv']['style'] = 'small';
  $this->arr_buttons['bapply_appdiv']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bapply_appdiv.gif';

  $this->arr_buttons['bok_appdiv']['hint']             = $Nm_lang['lang_btns_cfrm_hint'];
  $this->arr_buttons['bok_appdiv']['type']             = 'button';
  $this->arr_buttons['bok_appdiv']['value']            = $Nm_lang['lang_btns_cfrm'];
  $this->arr_buttons['bok_appdiv']['display']          = 'only_text';
  $this->arr_buttons['bok_appdiv']['display_position'] = 'img_right';
  $this->arr_buttons['bok_appdiv']['fontawesomeicon']  = '';
  $this->arr_buttons['bok_appdiv']['style'] = 'small';
  $this->arr_buttons['bok_appdiv']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bok_appdiv.gif';

  $this->arr_buttons['brestore_appdiv']['hint']             = $Nm_lang['lang_btns_restore_hint'];
  $this->arr_buttons['brestore_appdiv']['type']             = 'button';
  $this->arr_buttons['brestore_appdiv']['value']            = $Nm_lang['lang_btns_restore'];
  $this->arr_buttons['brestore_appdiv']['display']          = 'only_text';
  $this->arr_buttons['brestore_appdiv']['display_position'] = 'img_right';
  $this->arr_buttons['brestore_appdiv']['fontawesomeicon']  = '';
  $this->arr_buttons['brestore_appdiv']['style'] = 'small';
  $this->arr_buttons['brestore_appdiv']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_brestore_appdiv.gif';

  $this->arr_buttons['blimpar_appdiv']['hint']             = $Nm_lang['lang_btns_clea_hint'];
  $this->arr_buttons['blimpar_appdiv']['type']             = 'button';
  $this->arr_buttons['blimpar_appdiv']['value']            = $Nm_lang['lang_btns_clea'];
  $this->arr_buttons['blimpar_appdiv']['display']          = 'only_text';
  $this->arr_buttons['blimpar_appdiv']['display_position'] = 'img_right';
  $this->arr_buttons['blimpar_appdiv']['fontawesomeicon']  = '';
  $this->arr_buttons['blimpar_appdiv']['style'] = 'small';
  $this->arr_buttons['blimpar_appdiv']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_blimpar_appdiv.gif';

  $this->arr_buttons['bsair_appdiv']['hint']             = $Nm_lang['lang_btns_exit_hint'];
  $this->arr_buttons['bsair_appdiv']['type']             = 'button';
  $this->arr_buttons['bsair_appdiv']['value']            = $Nm_lang['lang_btns_exit'];
  $this->arr_buttons['bsair_appdiv']['display']          = 'only_text';
  $this->arr_buttons['bsair_appdiv']['display_position'] = 'img_right';
  $this->arr_buttons['bsair_appdiv']['fontawesomeicon']  = '';
  $this->arr_buttons['bsair_appdiv']['style'] = 'small';
  $this->arr_buttons['bsair_appdiv']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bsair_appdiv.gif';

  $this->arr_buttons['bcancelar_appdiv']['hint']             = $Nm_lang['lang_btns_cncl_hint'];
  $this->arr_buttons['bcancelar_appdiv']['type']             = 'button';
  $this->arr_buttons['bcancelar_appdiv']['value']            = $Nm_lang['lang_btns_cncl'];
  $this->arr_buttons['bcancelar_appdiv']['display']          = 'only_text';
  $this->arr_buttons['bcancelar_appdiv']['display_position'] = 'img_right';
  $this->arr_buttons['bcancelar_appdiv']['fontawesomeicon']  = '';
  $this->arr_buttons['bcancelar_appdiv']['style'] = 'small';
  $this->arr_buttons['bcancelar_appdiv']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bcancelar_appdiv.gif';

  $this->arr_buttons['bsalvar_appdiv']['hint']             = $Nm_lang['lang_btns_save_hint'];
  $this->arr_buttons['bsalvar_appdiv']['type']             = 'button';
  $this->arr_buttons['bsalvar_appdiv']['value']            = $Nm_lang['lang_btns_save'];
  $this->arr_buttons['bsalvar_appdiv']['display']          = 'only_text';
  $this->arr_buttons['bsalvar_appdiv']['display_position'] = 'img_right';
  $this->arr_buttons['bsalvar_appdiv']['fontawesomeicon']  = '';
  $this->arr_buttons['bsalvar_appdiv']['style'] = 'small';
  $this->arr_buttons['bsalvar_appdiv']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bsalvar_appdiv.gif';

  $this->arr_buttons['bexcluir_appdiv']['hint']             = $Nm_lang['lang_btns_dele_hint'];
  $this->arr_buttons['bexcluir_appdiv']['type']             = 'button';
  $this->arr_buttons['bexcluir_appdiv']['value']            = $Nm_lang['lang_btns_dele'];
  $this->arr_buttons['bexcluir_appdiv']['display']          = 'only_text';
  $this->arr_buttons['bexcluir_appdiv']['display_position'] = 'img_right';
  $this->arr_buttons['bexcluir_appdiv']['fontawesomeicon']  = '';
  $this->arr_buttons['bexcluir_appdiv']['style'] = 'small';
  $this->arr_buttons['bexcluir_appdiv']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bexcluir_appdiv.gif';

  $this->arr_buttons['bedit_filter_appdiv']['hint']             = $Nm_lang['lang_btns_srch_edit_hint'];
  $this->arr_buttons['bedit_filter_appdiv']['type']             = 'button';
  $this->arr_buttons['bedit_filter_appdiv']['value']            = $Nm_lang['lang_btns_srch_edit'];
  $this->arr_buttons['bedit_filter_appdiv']['display']          = 'only_text';
  $this->arr_buttons['bedit_filter_appdiv']['display_position'] = 'img_right';
  $this->arr_buttons['bedit_filter_appdiv']['fontawesomeicon']  = '';
  $this->arr_buttons['bedit_filter_appdiv']['style'] = 'small';
  $this->arr_buttons['bedit_filter_appdiv']['image'] = 'sys__NM__nm_teste_bedit_filter.gif';

  $this->arr_buttons['bcalendarimport']['hint']             = $Nm_lang['lang_btns_import_hint'];
  $this->arr_buttons['bcalendarimport']['type']             = 'button';
  $this->arr_buttons['bcalendarimport']['value']            = $Nm_lang['lang_btns_import'];
  $this->arr_buttons['bcalendarimport']['display']          = 'only_text';
  $this->arr_buttons['bcalendarimport']['display_position'] = 'text_right';
  $this->arr_buttons['bcalendarimport']['fontawesomeicon']  = '';
  $this->arr_buttons['bcalendarimport']['style'] = 'default';
  $this->arr_buttons['bcalendarimport']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bcalendarimport.gif';

  $this->arr_buttons['bcalendarexport']['hint']             = $Nm_lang['lang_btns_expo_hint'];
  $this->arr_buttons['bcalendarexport']['type']             = 'button';
  $this->arr_buttons['bcalendarexport']['value']            = $Nm_lang['lang_btns_expo'];
  $this->arr_buttons['bcalendarexport']['display']          = 'only_text';
  $this->arr_buttons['bcalendarexport']['display_position'] = 'text_right';
  $this->arr_buttons['bcalendarexport']['fontawesomeicon']  = '';
  $this->arr_buttons['bcalendarexport']['style'] = 'default';
  $this->arr_buttons['bcalendarexport']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bcalendarexport.gif';

  $this->arr_buttons['bcalendarcancel']['hint']             = $Nm_lang['lang_btns_cncl_hint'];
  $this->arr_buttons['bcalendarcancel']['type']             = 'button';
  $this->arr_buttons['bcalendarcancel']['value']            = $Nm_lang['lang_btns_cncl'];
  $this->arr_buttons['bcalendarcancel']['display']          = 'only_text';
  $this->arr_buttons['bcalendarcancel']['display_position'] = 'text_right';
  $this->arr_buttons['bcalendarcancel']['fontawesomeicon']  = '';
  $this->arr_buttons['bcalendarcancel']['style'] = 'default';
  $this->arr_buttons['bcalendarcancel']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bcalendarcancel.gif';

  $this->arr_buttons['bcalendarimport_google']['hint']             = $Nm_lang['lang_btns_import_google_hint'];
  $this->arr_buttons['bcalendarimport_google']['type']             = 'button';
  $this->arr_buttons['bcalendarimport_google']['value']            = $Nm_lang['lang_btns_import_google'];
  $this->arr_buttons['bcalendarimport_google']['display']          = 'only_text';
  $this->arr_buttons['bcalendarimport_google']['display_position'] = 'text_right';
  $this->arr_buttons['bcalendarimport_google']['fontawesomeicon']  = '';
  $this->arr_buttons['bcalendarimport_google']['style'] = 'default';
  $this->arr_buttons['bcalendarimport_google']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bcalendarimport_google.gif';

  $this->arr_buttons['bcalendarexport_google']['hint']             = $Nm_lang['lang_btns_export_google_hint'];
  $this->arr_buttons['bcalendarexport_google']['type']             = 'button';
  $this->arr_buttons['bcalendarexport_google']['value']            = $Nm_lang['lang_btns_export_google'];
  $this->arr_buttons['bcalendarexport_google']['display']          = 'only_text';
  $this->arr_buttons['bcalendarexport_google']['display_position'] = 'text_right';
  $this->arr_buttons['bcalendarexport_google']['fontawesomeicon']  = '';
  $this->arr_buttons['bcalendarexport_google']['style'] = 'default';
  $this->arr_buttons['bcalendarexport_google']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bcalendarexport_google.gif';

  $this->arr_buttons['bsweetalert_ok']['hint']             = $Nm_lang['lang_btns_cfrm_hint'];
  $this->arr_buttons['bsweetalert_ok']['type']             = 'button';
  $this->arr_buttons['bsweetalert_ok']['value']            = $Nm_lang['lang_btns_cfrm'];
  $this->arr_buttons['bsweetalert_ok']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bsweetalert_ok']['display_position'] = 'text_right';
  $this->arr_buttons['bsweetalert_ok']['fontawesomeicon']  = 'fas fa-check';
  $this->arr_buttons['bsweetalert_ok']['style'] = 'sweetalertok';
  $this->arr_buttons['bsweetalert_ok']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bsweetalert_ok.gif';

  $this->arr_buttons['bsweetalert_cancel']['hint']             = $Nm_lang['lang_btns_cncl_hint'];
  $this->arr_buttons['bsweetalert_cancel']['type']             = 'button';
  $this->arr_buttons['bsweetalert_cancel']['value']            = $Nm_lang['lang_btns_cncl'];
  $this->arr_buttons['bsweetalert_cancel']['display']          = 'text_fontawesomeicon';
  $this->arr_buttons['bsweetalert_cancel']['display_position'] = 'text_right';
  $this->arr_buttons['bsweetalert_cancel']['fontawesomeicon']  = 'fas fa-ban';
  $this->arr_buttons['bsweetalert_cancel']['style'] = 'sweetalertcancel';
  $this->arr_buttons['bsweetalert_cancel']['image'] = 'scriptcase__NM__nm_scriptcase9_Rhino_bsweetalert_cancel.gif';

  $this->arr_buttons['bnovo_appdiv']['hint']             = $Nm_lang['lang_btns_neww_hint'];
  $this->arr_buttons['bnovo_appdiv']['type']             = 'button';
  $this->arr_buttons['bnovo_appdiv']['value']            = $Nm_lang['lang_btns_neww'];
  $this->arr_buttons['bnovo_appdiv']['display']          = 'only_text';
  $this->arr_buttons['bnovo_appdiv']['display_position'] = 'img_right';
  $this->arr_buttons['bnovo_appdiv']['fontawesomeicon']  = '';
  $this->arr_buttons['bnovo_appdiv']['style'] = 'small';
  $this->arr_buttons['bnovo_appdiv']['image'] = 'sys__NM__nm_teste_bnovo.gif';

?>