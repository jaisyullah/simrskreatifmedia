<?php
class pdfreport_tbreqitem_grid
{
   var $Ini;
   var $Erro;
   var $Pdf;
   var $Db;
   var $rs_grid;
   var $nm_grid_sem_reg;
   var $SC_seq_register;
   var $nm_location;
   var $nm_data;
   var $nm_cod_barra;
   var $sc_proc_grid; 
   var $nmgp_botoes = array();
   var $Campos_Mens_erro;
   var $NM_raiz_img; 
   var $Font_ttf; 
   var $subsel = array();
   var $subsel_no = array();
   var $subsel_item = array();
   var $subsel_permintaan = array();
   var $subsel_realisasi = array();
   var $id = array();
   var $kodereq = array();
   var $unit = array();
   var $tglreq = array();
   var $selesai = array();
//--- 
 function monta_grid($linhas = 0)
 {

   clearstatcache();
   $this->inicializa();
   $this->grid();
 }
//--- 
 function inicializa()
 {
   global $nm_saida, 
   $rec, $nmgp_chave, $nmgp_opcao, $nmgp_ordem, $nmgp_chave_det, 
   $nmgp_quant_linhas, $nmgp_quant_colunas, $nmgp_url_saida, $nmgp_parms;
//
   $this->nm_data = new nm_data("id");
   include_once("../_lib/lib/php/nm_font_tcpdf.php");
   $this->default_font = 'Helvetica';
   $this->default_font_sr  = '';
   $this->default_style    = '';
   $this->default_style_sr = 'B';
   $Tp_papel = "A4";
   $old_dir = getcwd();
   $File_font_ttf     = "";
   $temp_font_ttf     = "";
   $this->Font_ttf    = false;
   $this->Font_ttf_sr = false;
   if (empty($this->default_font) && isset($arr_font_tcpdf[$this->Ini->str_lang]))
   {
       $this->default_font = $arr_font_tcpdf[$this->Ini->str_lang];
   }
   elseif (empty($this->default_font))
   {
       $this->default_font = "Times";
   }
   if (empty($this->default_font_sr) && isset($arr_font_tcpdf[$this->Ini->str_lang]))
   {
       $this->default_font_sr = $arr_font_tcpdf[$this->Ini->str_lang];
   }
   elseif (empty($this->default_font_sr))
   {
       $this->default_font_sr = "Times";
   }
   $_SESSION['scriptcase']['pdfreport_tbreqitem']['default_font'] = $this->default_font;
   chdir($this->Ini->path_third . "/tcpdf/");
   include_once("tcpdf.php");
   chdir($old_dir);
   $this->Pdf = new TCPDF('P', 'mm', $Tp_papel, true, 'UTF-8', false);
   $this->Pdf->setPrintHeader(false);
   $this->Pdf->setPrintFooter(false);
   if (!empty($File_font_ttf))
   {
       $this->Pdf->addTTFfont($File_font_ttf, "", "", 32, $_SESSION['scriptcase']['dir_temp'] . "/");
   }
   $this->Pdf->SetDisplayMode('real');
   $this->aba_iframe = false;
   if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
   {
       foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
       {
           if (in_array("pdfreport_tbreqitem", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->id[0] = $Busca_temp['id']; 
       $tmp_pos = strpos($this->id[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->id[0]))
       {
           $this->id[0] = substr($this->id[0], 0, $tmp_pos);
       }
       $this->kodereq[0] = $Busca_temp['kodereq']; 
       $tmp_pos = strpos($this->kodereq[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->kodereq[0]))
       {
           $this->kodereq[0] = substr($this->kodereq[0], 0, $tmp_pos);
       }
       $this->unit[0] = $Busca_temp['unit']; 
       $tmp_pos = strpos($this->unit[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->unit[0]))
       {
           $this->unit[0] = substr($this->unit[0], 0, $tmp_pos);
       }
       $this->tglreq[0] = $Busca_temp['tglreq']; 
       $tmp_pos = strpos($this->tglreq[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->tglreq[0]))
       {
           $this->tglreq[0] = substr($this->tglreq[0], 0, $tmp_pos);
       }
       $tglreq_2 = $Busca_temp['tglreq_input_2']; 
       $this->tglreq_2 = $Busca_temp['tglreq_input_2']; 
       $this->selesai[0] = $Busca_temp['selesai']; 
       $tmp_pos = strpos($this->selesai[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->selesai[0]))
       {
           $this->selesai[0] = substr($this->selesai[0], 0, $tmp_pos);
       }
   } 
   else 
   { 
       $this->tglreq_2 = ""; 
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbreqitem']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbreqitem']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbreqitem']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbreqitem']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['where_orig'] = " where kodeReq = '" . $_SESSION['var_reqcode'] . "'";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT id, kodeReq, unit, str_replace (convert(char(10),tglReq,102), '.', '-') + ' ' + convert(char(8),tglReq,20), selesai from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT id, kodeReq, unit, tglReq, selesai from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT id, kodeReq, unit, convert(char(23),tglReq,121), selesai from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT id, kodeReq, unit, tglReq, selesai from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT id, kodeReq, unit, EXTEND(tglReq, YEAR TO FRACTION), selesai from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT id, kodeReq, unit, tglReq, selesai from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['ordem_desc']; 
   } 
   if (!empty($campos_order_select)) 
   { 
       if (!empty($nmgp_order_by)) 
       { 
          $nmgp_order_by .= ", " . $campos_order_select; 
       } 
       else 
       { 
          $nmgp_order_by = " order by $campos_order_select"; 
       } 
   } 
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['order_grid'] = $nmgp_order_by;
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
   $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
   if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit ; 
   }  
   if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
   { 
       $this->nm_grid_sem_reg = $this->SC_conv_utf8($this->Ini->Nm_lang['lang_errm_empt']); 
   }  
// 
 }  
// 
 function Pdf_init()
 {
     if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
     {
         $this->Pdf->setRTL(true);
     }
     $this->Pdf->setHeaderMargin(0);
     $this->Pdf->setFooterMargin(0);
     $this->Pdf->SetAutoPageBreak(false);
     if ($this->Font_ttf)
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 12, $this->def_TTF);
     }
     else
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 12);
     }
     $this->Pdf->SetTextColor(0, 0, 0);
 }
// 
 function Pdf_image()
 {
   if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
   {
       $this->Pdf->setRTL(false);
   }
   $SV_margin = $this->Pdf->getBreakMargin();
   $SV_auto_page_break = $this->Pdf->getAutoPageBreak();
   $this->Pdf->SetAutoPageBreak(false, 0);
   $this->Pdf->Image($this->NM_raiz_img . $this->Ini->path_img_global . "/grp__NM__bg__NM__permintaan obat.jpg", "0.000000", "0.000000", "210", "297", '', '', '', false, 300, '', false, false, 0);
   $this->Pdf->SetAutoPageBreak($SV_auto_page_break, $SV_margin);
   $this->Pdf->setPageMark();
   if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
   {
       $this->Pdf->setRTL(true);
   }
 }
// 
//----- 
 function grid($linhas = 0)
 {
    global 
           $nm_saida, $nm_url_saida;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['labels']['id'] = "Id";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['labels']['kodereq'] = "Kode Req";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['labels']['unit'] = "Unit";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['labels']['tglreq'] = "Tgl Req";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['labels']['selesai'] = "Selesai";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['labels']['subsel'] = "subsel";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['labels']['subsel_no'] = "NO";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['labels']['subsel_item'] = "Item";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['labels']['subsel_permintaan'] = "Permintaan";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['labels']['subsel_realisasi'] = "Realisasi";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbreqitem']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbreqitem']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbreqitem']['lig_edit'];
   }
   if (!empty($this->nm_grid_sem_reg))
   {
       $this->Pdf_init();
       $this->Pdf->AddPage();
       if ($this->Font_ttf_sr)
       {
           $this->Pdf->SetFont($this->default_font_sr, 'B', 12, $this->def_TTF);
       }
       else
       {
           $this->Pdf->SetFont($this->default_font_sr, 'B', 12);
       }
       $this->Pdf->SetTextColor(0, 0, 0);
       $this->Pdf->Text(0.000000, 0.000000, html_entity_decode($this->nm_grid_sem_reg, ENT_COMPAT, $_SESSION['scriptcase']['charset']));
       $this->Pdf->Output($this->Ini->root . $this->Ini->nm_path_pdf, 'F');
       return;
   }
// 
   $Init_Pdf = true;
   $this->SC_seq_register = 0; 
   while (!$this->rs_grid->EOF) 
   {  
      $this->nm_grid_colunas = 0; 
      $nm_quant_linhas = 0;
      $this->Pdf->setImageScale(1.33);
      $this->Pdf->AddPage();
      $this->Pdf_init();
      $this->Pdf_image();
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbreqitem']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->id[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->id[$this->nm_grid_colunas] = (string)$this->id[$this->nm_grid_colunas];
          $this->kodereq[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->unit[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->tglreq[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->selesai[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->subsel_no[$this->nm_grid_colunas] = array();
          $this->subsel_item[$this->nm_grid_colunas] = array();
          $this->subsel_permintaan[$this->nm_grid_colunas] = array();
          $this->subsel_realisasi[$this->nm_grid_colunas] = array();
          $this->Lookup->lookup_subsel($this->subsel[$this->nm_grid_colunas] , $this->kodereq[$this->nm_grid_colunas], $array_subsel); 
          $NM_ind = 0;
          $this->subsel = array();
          foreach ($array_subsel as $cada_subselect) 
          {
              $this->subsel[$this->nm_grid_colunas][$NM_ind] = "";
              $this->subsel_no[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[0];
              $this->subsel_item[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[1];
              $this->subsel_permintaan[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[2];
              $this->subsel_realisasi[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[3];
              $NM_ind++;
          }
          $this->id[$this->nm_grid_colunas] = sc_strip_script($this->id[$this->nm_grid_colunas]);
          if ($this->id[$this->nm_grid_colunas] === "") 
          { 
              $this->id[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->id[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->id[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->id[$this->nm_grid_colunas]);
          $this->kodereq[$this->nm_grid_colunas] = sc_strip_script($this->kodereq[$this->nm_grid_colunas]);
          if ($this->kodereq[$this->nm_grid_colunas] === "") 
          { 
              $this->kodereq[$this->nm_grid_colunas] = "" ;  
          } 
          $this->kodereq[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->kodereq[$this->nm_grid_colunas]);
          $this->Lookup->lookup_unit($this->unit[$this->nm_grid_colunas] , $this->unit[$this->nm_grid_colunas]) ; 
          $this->unit[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->unit[$this->nm_grid_colunas]);
          $this->tglreq[$this->nm_grid_colunas] = sc_strip_script($this->tglreq[$this->nm_grid_colunas]);
          if ($this->tglreq[$this->nm_grid_colunas] === "") 
          { 
              $this->tglreq[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               if (substr($this->tglreq[$this->nm_grid_colunas], 10, 1) == "-") 
               { 
                  $this->tglreq[$this->nm_grid_colunas] = substr($this->tglreq[$this->nm_grid_colunas], 0, 10) . " " . substr($this->tglreq[$this->nm_grid_colunas], 11);
               } 
               if (substr($this->tglreq[$this->nm_grid_colunas], 13, 1) == ".") 
               { 
                  $this->tglreq[$this->nm_grid_colunas] = substr($this->tglreq[$this->nm_grid_colunas], 0, 13) . ":" . substr($this->tglreq[$this->nm_grid_colunas], 14, 2) . ":" . substr($this->tglreq[$this->nm_grid_colunas], 17);
               } 
               $tglreq_x =  $this->tglreq[$this->nm_grid_colunas];
               nm_conv_limpa_dado($tglreq_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($tglreq_x) && strlen($tglreq_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->tglreq[$this->nm_grid_colunas], "YYYY-MM-DD HH:II:SS");
                   $this->tglreq[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->tglreq[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tglreq[$this->nm_grid_colunas]);
          $this->selesai[$this->nm_grid_colunas] = sc_strip_script($this->selesai[$this->nm_grid_colunas]);
          if ($this->selesai[$this->nm_grid_colunas] === "") 
          { 
              $this->selesai[$this->nm_grid_colunas] = "" ;  
          } 
          $this->selesai[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->selesai[$this->nm_grid_colunas]);
          foreach ($this->subsel_no[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->subsel_no[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->subsel_no[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->subsel_no[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->subsel_no[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->subsel_no[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->subsel_item[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->subsel_item[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->subsel_item[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->subsel_item[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->subsel_item[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->subsel_permintaan[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->subsel_permintaan[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->subsel_permintaan[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->subsel_permintaan[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->subsel_permintaan[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->subsel_permintaan[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->subsel_realisasi[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->subsel_realisasi[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->subsel_realisasi[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->subsel_realisasi[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->subsel_realisasi[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->subsel_realisasi[$this->nm_grid_colunas][$NM_ind]);
          }
            $cell_kodeReq = array('posx' => '53', 'posy' => '53', 'data' => $this->kodereq[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_unit = array('posx' => '53', 'posy' => '63', 'data' => $this->unit[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tglReq = array('posx' => '53', 'posy' => '73', 'data' => $this->tglreq[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_subsel_NO = array('posx' => '7', 'posy' => '95', 'data' => $this->subsel_no[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_subsel_item = array('posx' => '15', 'posy' => '95', 'data' => $this->subsel_item[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_subsel_permintaan = array('posx' => '153', 'posy' => '95', 'data' => $this->subsel_permintaan[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_subsel_realisasi = array('posx' => '186', 'posy' => '95', 'data' => $this->subsel_realisasi[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);


            $this->Pdf->SetFont($cell_kodeReq['font_type'], $cell_kodeReq['font_style'], $cell_kodeReq['font_size']);
            $this->pdf_text_color($cell_kodeReq['data'], $cell_kodeReq['color_r'], $cell_kodeReq['color_g'], $cell_kodeReq['color_b']);
            if (!empty($cell_kodeReq['posx']) && !empty($cell_kodeReq['posy']))
            {
                $this->Pdf->SetXY($cell_kodeReq['posx'], $cell_kodeReq['posy']);
            }
            elseif (!empty($cell_kodeReq['posx']))
            {
                $this->Pdf->SetX($cell_kodeReq['posx']);
            }
            elseif (!empty($cell_kodeReq['posy']))
            {
                $this->Pdf->SetY($cell_kodeReq['posy']);
            }
            $this->Pdf->Cell($cell_kodeReq['width'], 0, $cell_kodeReq['data'], 0, 0, $cell_kodeReq['align']);

            $this->Pdf->SetFont($cell_unit['font_type'], $cell_unit['font_style'], $cell_unit['font_size']);
            $this->pdf_text_color($cell_unit['data'], $cell_unit['color_r'], $cell_unit['color_g'], $cell_unit['color_b']);
            if (!empty($cell_unit['posx']) && !empty($cell_unit['posy']))
            {
                $this->Pdf->SetXY($cell_unit['posx'], $cell_unit['posy']);
            }
            elseif (!empty($cell_unit['posx']))
            {
                $this->Pdf->SetX($cell_unit['posx']);
            }
            elseif (!empty($cell_unit['posy']))
            {
                $this->Pdf->SetY($cell_unit['posy']);
            }
            $this->Pdf->Cell($cell_unit['width'], 0, $cell_unit['data'], 0, 0, $cell_unit['align']);

            $this->Pdf->SetFont($cell_tglReq['font_type'], $cell_tglReq['font_style'], $cell_tglReq['font_size']);
            $this->pdf_text_color($cell_tglReq['data'], $cell_tglReq['color_r'], $cell_tglReq['color_g'], $cell_tglReq['color_b']);
            if (!empty($cell_tglReq['posx']) && !empty($cell_tglReq['posy']))
            {
                $this->Pdf->SetXY($cell_tglReq['posx'], $cell_tglReq['posy']);
            }
            elseif (!empty($cell_tglReq['posx']))
            {
                $this->Pdf->SetX($cell_tglReq['posx']);
            }
            elseif (!empty($cell_tglReq['posy']))
            {
                $this->Pdf->SetY($cell_tglReq['posy']);
            }
            $this->Pdf->Cell($cell_tglReq['width'], 0, $cell_tglReq['data'], 0, 0, $cell_tglReq['align']);

            $this->Pdf->SetY(95);
            foreach ($this->subsel[$this->nm_grid_colunas] as $NM_ind => $Dados)
            {
                $this->Pdf->SetFont($cell_subsel_NO['font_type'], $cell_subsel_NO['font_style'], $cell_subsel_NO['font_size']);
                if (!empty($cell_subsel_NO['posx']))
                {
                    $this->Pdf->SetX($cell_subsel_NO['posx']);
                }
                $this->pdf_text_color($this->subsel_no[$this->nm_grid_colunas][$NM_ind], $cell_subsel_NO['color_r'], $cell_subsel_NO['color_g'], $cell_subsel_NO['color_b']);
                $this->Pdf->Cell($cell_subsel_NO['width'], 0, $this->subsel_no[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_subsel_NO['align']);
                $this->Pdf->SetFont($cell_subsel_item['font_type'], $cell_subsel_item['font_style'], $cell_subsel_item['font_size']);
                if (!empty($cell_subsel_item['posx']))
                {
                    $this->Pdf->SetX($cell_subsel_item['posx']);
                }
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->SetTextColor($cell_subsel_item['color_r'], $cell_subsel_item['color_g'], $cell_subsel_item['color_b']);
                $this->Pdf->writeHTMLCell($cell_subsel_item['width'], 0, $atu_X, $atu_Y, $this->subsel_item[$this->nm_grid_colunas][$NM_ind], 0, 0, false, true, $cell_subsel_item['align']);
                $this->Pdf->SetY($atu_Y);
                $this->Pdf->SetFont($cell_subsel_permintaan['font_type'], $cell_subsel_permintaan['font_style'], $cell_subsel_permintaan['font_size']);
                if (!empty($cell_subsel_permintaan['posx']))
                {
                    $this->Pdf->SetX($cell_subsel_permintaan['posx']);
                }
                $this->pdf_text_color($this->subsel_permintaan[$this->nm_grid_colunas][$NM_ind], $cell_subsel_permintaan['color_r'], $cell_subsel_permintaan['color_g'], $cell_subsel_permintaan['color_b']);
                $this->Pdf->Cell($cell_subsel_permintaan['width'], 0, $this->subsel_permintaan[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_subsel_permintaan['align']);
                $this->Pdf->SetFont($cell_subsel_realisasi['font_type'], $cell_subsel_realisasi['font_style'], $cell_subsel_realisasi['font_size']);
                if (!empty($cell_subsel_realisasi['posx']))
                {
                    $this->Pdf->SetX($cell_subsel_realisasi['posx']);
                }
                $this->pdf_text_color($this->subsel_realisasi[$this->nm_grid_colunas][$NM_ind], $cell_subsel_realisasi['color_r'], $cell_subsel_realisasi['color_g'], $cell_subsel_realisasi['color_b']);
                $this->Pdf->Cell($cell_subsel_realisasi['width'], 0, $this->subsel_realisasi[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_subsel_realisasi['align']);
                if (!isset($max_Y) || empty($max_Y) || $this->Pdf->GetY() < $max_Y )
                {
                    $max_Y = $this->Pdf->GetY();
                }
                $max_Y += 5;
                $this->Pdf->SetY($max_Y);

            }
          $max_Y = 0;
          $this->rs_grid->MoveNext();
          $this->sc_proc_grid = false;
          $nm_quant_linhas++ ;
      }  
   }  
   $this->rs_grid->Close();
   $this->Pdf->Output($this->Ini->root . $this->Ini->nm_path_pdf, 'F');
 }
 function pdf_text_color(&$val, $r, $g, $b)
 {
     $pos = strpos($val, "@SCNEG#");
     if ($pos !== false)
     {
         $cor = trim(substr($val, $pos + 7));
         $val = substr($val, 0, $pos);
         $cor = (substr($cor, 0, 1) == "#") ? substr($cor, 1) : $cor;
         if (strlen($cor) == 6)
         {
             $r = hexdec(substr($cor, 0, 2));
             $g = hexdec(substr($cor, 2, 2));
             $b = hexdec(substr($cor, 4, 2));
         }
     }
     $this->Pdf->SetTextColor($r, $g, $b);
 }
 function SC_conv_utf8($input)
 {
     if ($_SESSION['scriptcase']['charset'] != "UTF-8" && !NM_is_utf8($input))
     {
         $input = sc_convert_encoding($input, "UTF-8", $_SESSION['scriptcase']['charset']);
     }
     return $input;
 }
   function nm_conv_data_db($dt_in, $form_in, $form_out)
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
       nm_conv_form_data($dt_out, $form_in, $form_out);
       return $dt_out;
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
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
              if ($cont2 >= $tam_campo)
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
}
?>
