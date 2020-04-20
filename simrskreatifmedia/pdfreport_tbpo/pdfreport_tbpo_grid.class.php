<?php
class pdfreport_tbpo_grid
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
   var $array_alamat_pbf = array();
   var $subsel = array();
   var $subsel_no = array();
   var $subsel_item = array();
   var $subsel_stok = array();
   var $subsel_jumlah = array();
   var $subsel_kemasan = array();
   var $subsel_harga = array();
   var $subsel_principal = array();
   var $subsel_total = array();
   var $barcode = array();
   var $terbilang = array();
   var $alamat_pbf = array();
   var $id = array();
   var $pocode = array();
   var $pbf = array();
   var $pesandate = array();
   var $datangdate = array();
   var $jatuhtempo = array();
   var $total = array();
   var $fakturno = array();
   var $note = array();
   var $status = array();
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
   $_SESSION['scriptcase']['pdfreport_tbpo']['default_font'] = $this->default_font;
   chdir($this->Ini->path_third . "/tcpdf/");
   include_once("tcpdf.php");
   chdir($old_dir);
   $this->Pdf = new TCPDF('L', 'mm', $Tp_papel, true, 'UTF-8', false);
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
           if (in_array("pdfreport_tbpo", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['campos_busca'];
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
       $this->pocode[0] = $Busca_temp['pocode']; 
       $tmp_pos = strpos($this->pocode[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->pocode[0]))
       {
           $this->pocode[0] = substr($this->pocode[0], 0, $tmp_pos);
       }
       $this->pbf[0] = $Busca_temp['pbf']; 
       $tmp_pos = strpos($this->pbf[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->pbf[0]))
       {
           $this->pbf[0] = substr($this->pbf[0], 0, $tmp_pos);
       }
       $this->pesandate[0] = $Busca_temp['pesandate']; 
       $tmp_pos = strpos($this->pesandate[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->pesandate[0]))
       {
           $this->pesandate[0] = substr($this->pesandate[0], 0, $tmp_pos);
       }
       $pesandate_2 = $Busca_temp['pesandate_input_2']; 
       $this->pesandate_2 = $Busca_temp['pesandate_input_2']; 
       $this->status[0] = $Busca_temp['status']; 
       $tmp_pos = strpos($this->status[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->status[0]))
       {
           $this->status[0] = substr($this->status[0], 0, $tmp_pos);
       }
   } 
   else 
   { 
       $this->pesandate_2 = ""; 
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbpo']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbpo']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbpo']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbpo']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['where_orig'] = " where poCode = '" . $_SESSION['var_po'] . "'";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT id, poCode, pbf, str_replace (convert(char(10),pesanDate,102), '.', '-') + ' ' + convert(char(8),pesanDate,20), str_replace (convert(char(10),datangDate,102), '.', '-') + ' ' + convert(char(8),datangDate,20), str_replace (convert(char(10),jatuhTempo,102), '.', '-') + ' ' + convert(char(8),jatuhTempo,20), total, fakturNo, note, status from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT id, poCode, pbf, pesanDate, datangDate, jatuhTempo, total, fakturNo, note, status from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT id, poCode, pbf, convert(char(23),pesanDate,121), convert(char(23),datangDate,121), convert(char(23),jatuhTempo,121), total, fakturNo, note, status from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT id, poCode, pbf, pesanDate, datangDate, jatuhTempo, total, fakturNo, note, status from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT id, poCode, pbf, EXTEND(pesanDate, YEAR TO FRACTION), EXTEND(datangDate, YEAR TO FRACTION), EXTEND(jatuhTempo, YEAR TO FRACTION), total, fakturNo, note, status from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT id, poCode, pbf, pesanDate, datangDate, jatuhTempo, total, fakturNo, note, status from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['order_grid'] = $nmgp_order_by;
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
   $this->Pdf->Image($this->NM_raiz_img . $this->Ini->path_img_global . "/grp__NM__bg__NM__PO Logistik.jpg", "0.000000", "0.000000", "297", "210", '', '', '', false, 300, '', false, false, 0);
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['labels']['id'] = "Id";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['labels']['pocode'] = "pocode";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['labels']['pbf'] = "Pbf";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['labels']['pesandate'] = "Pesan Date";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['labels']['datangdate'] = "Datang Date";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['labels']['jatuhtempo'] = "Jatuh Tempo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['labels']['total'] = "Total";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['labels']['fakturno'] = "Faktur No";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['labels']['note'] = "Note";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['labels']['status'] = "Status";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['labels']['subsel'] = "subsel";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['labels']['subsel_no'] = "NO";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['labels']['subsel_item'] = "Item";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['labels']['subsel_stok'] = "Stok";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['labels']['subsel_jumlah'] = "Jumlah";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['labels']['subsel_kemasan'] = "Kemasan";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['labels']['subsel_harga'] = "Harga";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['labels']['subsel_principal'] = "Principal";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['labels']['subsel_total'] = "Total";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['labels']['barcode'] = "barcode";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['labels']['terbilang'] = "terbilang";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['labels']['alamat_pbf'] = "alamat_pbf";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbpo']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbpo']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbpo']['lig_edit'];
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
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpo']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->id[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->id[$this->nm_grid_colunas] = (string)$this->id[$this->nm_grid_colunas];
          $this->pocode[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->pbf[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->pesandate[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->datangdate[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->jatuhtempo[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->total[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->total[$this->nm_grid_colunas] =  str_replace(",", ".", $this->total[$this->nm_grid_colunas]);
          $this->total[$this->nm_grid_colunas] = (strpos(strtolower($this->total[$this->nm_grid_colunas]), "e")) ? (float)$this->total[$this->nm_grid_colunas] : $this->total[$this->nm_grid_colunas]; 
          $this->total[$this->nm_grid_colunas] = (string)$this->total[$this->nm_grid_colunas];
          $this->fakturno[$this->nm_grid_colunas] = $this->rs_grid->fields[7] ;  
          $this->note[$this->nm_grid_colunas] = $this->rs_grid->fields[8] ;  
          $this->status[$this->nm_grid_colunas] = $this->rs_grid->fields[9] ;  
          $this->subsel_no[$this->nm_grid_colunas] = array();
          $this->subsel_item[$this->nm_grid_colunas] = array();
          $this->subsel_stok[$this->nm_grid_colunas] = array();
          $this->subsel_jumlah[$this->nm_grid_colunas] = array();
          $this->subsel_kemasan[$this->nm_grid_colunas] = array();
          $this->subsel_harga[$this->nm_grid_colunas] = array();
          $this->subsel_principal[$this->nm_grid_colunas] = array();
          $this->subsel_total[$this->nm_grid_colunas] = array();
          $this->Lookup->lookup_subsel($this->subsel[$this->nm_grid_colunas] , $this->pocode[$this->nm_grid_colunas], $array_subsel); 
          $NM_ind = 0;
          $this->subsel = array();
          foreach ($array_subsel as $cada_subselect) 
          {
              $this->subsel[$this->nm_grid_colunas][$NM_ind] = "";
              $this->subsel_no[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[0];
              $this->subsel_item[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[1];
              $this->subsel_stok[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[2];
              $this->subsel_jumlah[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[3];
              $this->subsel_kemasan[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[4];
              $this->subsel_harga[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[5];
              $this->subsel_principal[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[6];
              $this->subsel_total[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[7];
              $NM_ind++;
          }
          $this->barcode[$this->nm_grid_colunas] = "";
          $this->terbilang[$this->nm_grid_colunas] = "";
          $this->alamat_pbf[$this->nm_grid_colunas] = "";
          $this->Lookup->lookup_alamat_pbf($this->alamat_pbf[$this->nm_grid_colunas], $this->pbf[$this->nm_grid_colunas], $this->array_alamat_pbf); 
          $_SESSION['scriptcase']['pdfreport_tbpo']['contr_erro'] = 'on';
  $this->barcode[$this->nm_grid_colunas]  = $this->pocode[$this->nm_grid_colunas] ;


 
 


$nilai = $this->total[$this->nm_grid_colunas] ;
        
$this->terbilang[$this->nm_grid_colunas]  = $this->terbilang($nilai, $style=3);
$_SESSION['scriptcase']['pdfreport_tbpo']['contr_erro'] = 'off';
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
          $this->pocode[$this->nm_grid_colunas] = sc_strip_script($this->pocode[$this->nm_grid_colunas]);
          if ($this->pocode[$this->nm_grid_colunas] === "") 
          { 
              $this->pocode[$this->nm_grid_colunas] = "" ;  
          } 
          $this->pocode[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pocode[$this->nm_grid_colunas]);
          $this->Lookup->lookup_pbf($this->pbf[$this->nm_grid_colunas] , $this->pbf[$this->nm_grid_colunas]) ; 
          $this->pbf[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pbf[$this->nm_grid_colunas]);
          $this->pesandate[$this->nm_grid_colunas] = sc_strip_script($this->pesandate[$this->nm_grid_colunas]);
          if ($this->pesandate[$this->nm_grid_colunas] === "") 
          { 
              $this->pesandate[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               if (substr($this->pesandate[$this->nm_grid_colunas], 10, 1) == "-") 
               { 
                  $this->pesandate[$this->nm_grid_colunas] = substr($this->pesandate[$this->nm_grid_colunas], 0, 10) . " " . substr($this->pesandate[$this->nm_grid_colunas], 11);
               } 
               if (substr($this->pesandate[$this->nm_grid_colunas], 13, 1) == ".") 
               { 
                  $this->pesandate[$this->nm_grid_colunas] = substr($this->pesandate[$this->nm_grid_colunas], 0, 13) . ":" . substr($this->pesandate[$this->nm_grid_colunas], 14, 2) . ":" . substr($this->pesandate[$this->nm_grid_colunas], 17);
               } 
               $pesandate_x =  $this->pesandate[$this->nm_grid_colunas];
               nm_conv_limpa_dado($pesandate_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($pesandate_x) && strlen($pesandate_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->pesandate[$this->nm_grid_colunas], "YYYY-MM-DD HH:II:SS");
                   $this->pesandate[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->pesandate[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pesandate[$this->nm_grid_colunas]);
          $this->datangdate[$this->nm_grid_colunas] = sc_strip_script($this->datangdate[$this->nm_grid_colunas]);
          if ($this->datangdate[$this->nm_grid_colunas] === "") 
          { 
              $this->datangdate[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               if (substr($this->datangdate[$this->nm_grid_colunas], 10, 1) == "-") 
               { 
                  $this->datangdate[$this->nm_grid_colunas] = substr($this->datangdate[$this->nm_grid_colunas], 0, 10) . " " . substr($this->datangdate[$this->nm_grid_colunas], 11);
               } 
               if (substr($this->datangdate[$this->nm_grid_colunas], 13, 1) == ".") 
               { 
                  $this->datangdate[$this->nm_grid_colunas] = substr($this->datangdate[$this->nm_grid_colunas], 0, 13) . ":" . substr($this->datangdate[$this->nm_grid_colunas], 14, 2) . ":" . substr($this->datangdate[$this->nm_grid_colunas], 17);
               } 
               $datangdate_x =  $this->datangdate[$this->nm_grid_colunas];
               nm_conv_limpa_dado($datangdate_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($datangdate_x) && strlen($datangdate_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->datangdate[$this->nm_grid_colunas], "YYYY-MM-DD HH:II:SS");
                   $this->datangdate[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->datangdate[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->datangdate[$this->nm_grid_colunas]);
          $this->jatuhtempo[$this->nm_grid_colunas] = sc_strip_script($this->jatuhtempo[$this->nm_grid_colunas]);
          if ($this->jatuhtempo[$this->nm_grid_colunas] === "") 
          { 
              $this->jatuhtempo[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               if (substr($this->jatuhtempo[$this->nm_grid_colunas], 10, 1) == "-") 
               { 
                  $this->jatuhtempo[$this->nm_grid_colunas] = substr($this->jatuhtempo[$this->nm_grid_colunas], 0, 10) . " " . substr($this->jatuhtempo[$this->nm_grid_colunas], 11);
               } 
               if (substr($this->jatuhtempo[$this->nm_grid_colunas], 13, 1) == ".") 
               { 
                  $this->jatuhtempo[$this->nm_grid_colunas] = substr($this->jatuhtempo[$this->nm_grid_colunas], 0, 13) . ":" . substr($this->jatuhtempo[$this->nm_grid_colunas], 14, 2) . ":" . substr($this->jatuhtempo[$this->nm_grid_colunas], 17);
               } 
               $jatuhtempo_x =  $this->jatuhtempo[$this->nm_grid_colunas];
               nm_conv_limpa_dado($jatuhtempo_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($jatuhtempo_x) && strlen($jatuhtempo_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->jatuhtempo[$this->nm_grid_colunas], "YYYY-MM-DD HH:II:SS");
                   $this->jatuhtempo[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->jatuhtempo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->jatuhtempo[$this->nm_grid_colunas]);
          $this->total[$this->nm_grid_colunas] = sc_strip_script($this->total[$this->nm_grid_colunas]);
          if ($this->total[$this->nm_grid_colunas] === "") 
          { 
              $this->total[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->total[$this->nm_grid_colunas], ".", ",", "0", "S", "2", "Rp", "V:3:3", "-") ; 
          } 
          $this->total[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->total[$this->nm_grid_colunas]);
          $this->fakturno[$this->nm_grid_colunas] = sc_strip_script($this->fakturno[$this->nm_grid_colunas]);
          if ($this->fakturno[$this->nm_grid_colunas] === "") 
          { 
              $this->fakturno[$this->nm_grid_colunas] = "" ;  
          } 
          $this->fakturno[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->fakturno[$this->nm_grid_colunas]);
          $this->note[$this->nm_grid_colunas] = sc_strip_script($this->note[$this->nm_grid_colunas]);
          if ($this->note[$this->nm_grid_colunas] === "") 
          { 
              $this->note[$this->nm_grid_colunas] = "" ;  
          } 
          $this->note[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->note[$this->nm_grid_colunas]);
          $this->status[$this->nm_grid_colunas] = sc_strip_script($this->status[$this->nm_grid_colunas]);
          if ($this->status[$this->nm_grid_colunas] === "") 
          { 
              $this->status[$this->nm_grid_colunas] = "" ;  
          } 
          $this->status[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->status[$this->nm_grid_colunas]);
          if ($this->barcode[$this->nm_grid_colunas] === "") 
          { 
              $this->barcode[$this->nm_grid_colunas] = "" ;  
          } 
          elseif ($this->Ini->Gd_missing)
          { 
              $this->barcode[$this->nm_grid_colunas] = "<span class=\"scErrorLine\">" . $this->Ini->Nm_lang['lang_errm_gd'] . "</span>";
              $out_barcode = "" ; 
          } 
          else   
          { 
              $out_barcode = $this->Ini->path_imag_temp . "/sc_barcode_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".png";   
              QRcode::png($this->barcode[$this->nm_grid_colunas], $this->Ini->root . $out_barcode, 0,2,1);
              $_SESSION['scriptcase']['sc_num_img']++;
          } 
              $this->barcode[$this->nm_grid_colunas] = $this->NM_raiz_img . $out_barcode;
          $this->barcode[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->barcode[$this->nm_grid_colunas]);
          if ($this->terbilang[$this->nm_grid_colunas] === "") 
          { 
              $this->terbilang[$this->nm_grid_colunas] = "" ;  
          } 
          $this->terbilang[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->terbilang[$this->nm_grid_colunas]);
          $this->Lookup->lookup_alamat_pbf($this->alamat_pbf[$this->nm_grid_colunas], $this->pbf[$this->nm_grid_colunas], $this->array_alamat_pbf); 
          $this->alamat_pbf[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->alamat_pbf[$this->nm_grid_colunas]);
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
          foreach ($this->subsel_stok[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->subsel_stok[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->subsel_stok[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->subsel_stok[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->subsel_stok[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->subsel_stok[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->subsel_jumlah[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->subsel_jumlah[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->subsel_jumlah[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->subsel_jumlah[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->subsel_jumlah[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->subsel_jumlah[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->subsel_kemasan[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->subsel_kemasan[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->subsel_kemasan[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->subsel_kemasan[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->subsel_kemasan[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->subsel_harga[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->subsel_harga[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->subsel_harga[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->subsel_harga[$this->nm_grid_colunas][$NM_ind], ".", ",", "0", "S", "2", "Rp", "V:3:3", "-") ; 
          } 
              $this->subsel_harga[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->subsel_harga[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->subsel_principal[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->subsel_principal[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->subsel_principal[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->subsel_principal[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->subsel_principal[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->subsel_total[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->subsel_total[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->subsel_total[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->subsel_total[$this->nm_grid_colunas][$NM_ind], ".", ",", "0", "S", "2", "Rp", "V:3:3", "-") ; 
          } 
              $this->subsel_total[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->subsel_total[$this->nm_grid_colunas][$NM_ind]);
          }
            $cell_poCode = array('posx' => '46', 'posy' => '44.5', 'data' => $this->pocode[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_pbf = array('posx' => '180', 'posy' => '44.5', 'data' => $this->pbf[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_pesanDate = array('posx' => '46', 'posy' => '51.5', 'data' => $this->pesandate[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_jatuhTempo = array('posx' => '46', 'posy' => '58.5', 'data' => $this->jatuhtempo[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_total = array('posx' => '210', 'posy' => '198', 'data' => $this->total[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_subsel_NO = array('posx' => '10', 'posy' => '74', 'data' => $this->subsel_no[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_subsel_item = array('posx' => '20', 'posy' => '74', 'data' => $this->subsel_item[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_subsel_stok = array('posx' => '92', 'posy' => '74', 'data' => $this->subsel_stok[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_subsel_jumlah = array('posx' => '117', 'posy' => '74', 'data' => $this->subsel_jumlah[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_subsel_kemasan = array('posx' => '140', 'posy' => '74', 'data' => $this->subsel_kemasan[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_subsel_harga = array('posx' => '170', 'posy' => '74', 'data' => $this->subsel_harga[$this->nm_grid_colunas], 'width'      => '23', 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_subsel_principal = array('posx' => '200', 'posy' => '74', 'data' => $this->subsel_principal[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_subsel_total = array('posx' => '265', 'posy' => '74', 'data' => $this->subsel_total[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_barcode = array('posx' => '270', 'posy' => '3', 'data' => $this->barcode[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_terbilang = array('posx' => '7', 'posy' => '192', 'data' => $this->terbilang[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_alamat_pbf = array('posx' => '180', 'posy' => '51.5', 'data' => $this->alamat_pbf[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);


            $this->Pdf->SetFont($cell_poCode['font_type'], $cell_poCode['font_style'], $cell_poCode['font_size']);
            $this->pdf_text_color($cell_poCode['data'], $cell_poCode['color_r'], $cell_poCode['color_g'], $cell_poCode['color_b']);
            if (!empty($cell_poCode['posx']) && !empty($cell_poCode['posy']))
            {
                $this->Pdf->SetXY($cell_poCode['posx'], $cell_poCode['posy']);
            }
            elseif (!empty($cell_poCode['posx']))
            {
                $this->Pdf->SetX($cell_poCode['posx']);
            }
            elseif (!empty($cell_poCode['posy']))
            {
                $this->Pdf->SetY($cell_poCode['posy']);
            }
            $this->Pdf->Cell($cell_poCode['width'], 0, $cell_poCode['data'], 0, 0, $cell_poCode['align']);

            $this->Pdf->SetFont($cell_pbf['font_type'], $cell_pbf['font_style'], $cell_pbf['font_size']);
            $this->pdf_text_color($cell_pbf['data'], $cell_pbf['color_r'], $cell_pbf['color_g'], $cell_pbf['color_b']);
            if (!empty($cell_pbf['posx']) && !empty($cell_pbf['posy']))
            {
                $this->Pdf->SetXY($cell_pbf['posx'], $cell_pbf['posy']);
            }
            elseif (!empty($cell_pbf['posx']))
            {
                $this->Pdf->SetX($cell_pbf['posx']);
            }
            elseif (!empty($cell_pbf['posy']))
            {
                $this->Pdf->SetY($cell_pbf['posy']);
            }
            $this->Pdf->Cell($cell_pbf['width'], 0, $cell_pbf['data'], 0, 0, $cell_pbf['align']);

            $this->Pdf->SetFont($cell_pesanDate['font_type'], $cell_pesanDate['font_style'], $cell_pesanDate['font_size']);
            $this->pdf_text_color($cell_pesanDate['data'], $cell_pesanDate['color_r'], $cell_pesanDate['color_g'], $cell_pesanDate['color_b']);
            if (!empty($cell_pesanDate['posx']) && !empty($cell_pesanDate['posy']))
            {
                $this->Pdf->SetXY($cell_pesanDate['posx'], $cell_pesanDate['posy']);
            }
            elseif (!empty($cell_pesanDate['posx']))
            {
                $this->Pdf->SetX($cell_pesanDate['posx']);
            }
            elseif (!empty($cell_pesanDate['posy']))
            {
                $this->Pdf->SetY($cell_pesanDate['posy']);
            }
            $this->Pdf->Cell($cell_pesanDate['width'], 0, $cell_pesanDate['data'], 0, 0, $cell_pesanDate['align']);

            $this->Pdf->SetFont($cell_jatuhTempo['font_type'], $cell_jatuhTempo['font_style'], $cell_jatuhTempo['font_size']);
            $this->pdf_text_color($cell_jatuhTempo['data'], $cell_jatuhTempo['color_r'], $cell_jatuhTempo['color_g'], $cell_jatuhTempo['color_b']);
            if (!empty($cell_jatuhTempo['posx']) && !empty($cell_jatuhTempo['posy']))
            {
                $this->Pdf->SetXY($cell_jatuhTempo['posx'], $cell_jatuhTempo['posy']);
            }
            elseif (!empty($cell_jatuhTempo['posx']))
            {
                $this->Pdf->SetX($cell_jatuhTempo['posx']);
            }
            elseif (!empty($cell_jatuhTempo['posy']))
            {
                $this->Pdf->SetY($cell_jatuhTempo['posy']);
            }
            $this->Pdf->Cell($cell_jatuhTempo['width'], 0, $cell_jatuhTempo['data'], 0, 0, $cell_jatuhTempo['align']);

            $this->Pdf->SetFont($cell_total['font_type'], $cell_total['font_style'], $cell_total['font_size']);
            $this->pdf_text_color($cell_total['data'], $cell_total['color_r'], $cell_total['color_g'], $cell_total['color_b']);
            if (!empty($cell_total['posx']) && !empty($cell_total['posy']))
            {
                $this->Pdf->SetXY($cell_total['posx'], $cell_total['posy']);
            }
            elseif (!empty($cell_total['posx']))
            {
                $this->Pdf->SetX($cell_total['posx']);
            }
            elseif (!empty($cell_total['posy']))
            {
                $this->Pdf->SetY($cell_total['posy']);
            }
            $this->Pdf->Cell($cell_total['width'], 0, $cell_total['data'], 0, 0, $cell_total['align']);

            $this->Pdf->SetY(74);
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
                $this->Pdf->SetFont($cell_subsel_stok['font_type'], $cell_subsel_stok['font_style'], $cell_subsel_stok['font_size']);
                if (!empty($cell_subsel_stok['posx']))
                {
                    $this->Pdf->SetX($cell_subsel_stok['posx']);
                }
                $this->pdf_text_color($this->subsel_stok[$this->nm_grid_colunas][$NM_ind], $cell_subsel_stok['color_r'], $cell_subsel_stok['color_g'], $cell_subsel_stok['color_b']);
                $this->Pdf->Cell($cell_subsel_stok['width'], 0, $this->subsel_stok[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_subsel_stok['align']);
                $this->Pdf->SetFont($cell_subsel_jumlah['font_type'], $cell_subsel_jumlah['font_style'], $cell_subsel_jumlah['font_size']);
                if (!empty($cell_subsel_jumlah['posx']))
                {
                    $this->Pdf->SetX($cell_subsel_jumlah['posx']);
                }
                $this->pdf_text_color($this->subsel_jumlah[$this->nm_grid_colunas][$NM_ind], $cell_subsel_jumlah['color_r'], $cell_subsel_jumlah['color_g'], $cell_subsel_jumlah['color_b']);
                $this->Pdf->Cell($cell_subsel_jumlah['width'], 0, $this->subsel_jumlah[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_subsel_jumlah['align']);
                $this->Pdf->SetFont($cell_subsel_kemasan['font_type'], $cell_subsel_kemasan['font_style'], $cell_subsel_kemasan['font_size']);
                if (!empty($cell_subsel_kemasan['posx']))
                {
                    $this->Pdf->SetX($cell_subsel_kemasan['posx']);
                }
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->SetTextColor($cell_subsel_kemasan['color_r'], $cell_subsel_kemasan['color_g'], $cell_subsel_kemasan['color_b']);
                $this->Pdf->writeHTMLCell($cell_subsel_kemasan['width'], 0, $atu_X, $atu_Y, $this->subsel_kemasan[$this->nm_grid_colunas][$NM_ind], 0, 0, false, true, $cell_subsel_kemasan['align']);
                $this->Pdf->SetY($atu_Y);
                $this->Pdf->SetFont($cell_subsel_harga['font_type'], $cell_subsel_harga['font_style'], $cell_subsel_harga['font_size']);
                if (!empty($cell_subsel_harga['posx']))
                {
                    $this->Pdf->SetX($cell_subsel_harga['posx']);
                }
                $this->pdf_text_color($this->subsel_harga[$this->nm_grid_colunas][$NM_ind], $cell_subsel_harga['color_r'], $cell_subsel_harga['color_g'], $cell_subsel_harga['color_b']);
                $this->Pdf->Cell($cell_subsel_harga['width'], 0, $this->subsel_harga[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_subsel_harga['align']);
                $this->Pdf->SetFont($cell_subsel_principal['font_type'], $cell_subsel_principal['font_style'], $cell_subsel_principal['font_size']);
                if (!empty($cell_subsel_principal['posx']))
                {
                    $this->Pdf->SetX($cell_subsel_principal['posx']);
                }
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->SetTextColor($cell_subsel_principal['color_r'], $cell_subsel_principal['color_g'], $cell_subsel_principal['color_b']);
                $this->Pdf->writeHTMLCell($cell_subsel_principal['width'], 0, $atu_X, $atu_Y, $this->subsel_principal[$this->nm_grid_colunas][$NM_ind], 0, 0, false, true, $cell_subsel_principal['align']);
                $this->Pdf->SetY($atu_Y);
                $this->Pdf->SetFont($cell_subsel_total['font_type'], $cell_subsel_total['font_style'], $cell_subsel_total['font_size']);
                if (!empty($cell_subsel_total['posx']))
                {
                    $this->Pdf->SetX($cell_subsel_total['posx']);
                }
                $this->pdf_text_color($this->subsel_total[$this->nm_grid_colunas][$NM_ind], $cell_subsel_total['color_r'], $cell_subsel_total['color_g'], $cell_subsel_total['color_b']);
                $this->Pdf->Cell($cell_subsel_total['width'], 0, $this->subsel_total[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_subsel_total['align']);
                if (!isset($max_Y) || empty($max_Y) || $this->Pdf->GetY() < $max_Y )
                {
                    $max_Y = $this->Pdf->GetY();
                }
                $max_Y += 5;
                $this->Pdf->SetY($max_Y);

            }
            if (isset($cell_barcode['data']) && !empty($cell_barcode['data']) && is_file($cell_barcode['data']))
            {
                $Finfo_img = finfo_open(FILEINFO_MIME_TYPE);
                $Tipo_img  = finfo_file($Finfo_img, $cell_barcode['data']);
                finfo_close($Finfo_img);
                if (substr($Tipo_img, 0, 5) == "image")
                {
                    $this->Pdf->Image($cell_barcode['data'], $cell_barcode['posx'], $cell_barcode['posy'], 0, 0);
                }
            }
            $this->Pdf->SetFont($cell_terbilang['font_type'], $cell_terbilang['font_style'], $cell_terbilang['font_size']);
            $this->Pdf->SetTextColor($cell_terbilang['color_r'], $cell_terbilang['color_g'], $cell_terbilang['color_b']);
            if (!empty($cell_terbilang['posx']) && !empty($cell_terbilang['posy']))
            {
                $this->Pdf->SetXY($cell_terbilang['posx'], $cell_terbilang['posy']);
            }
            elseif (!empty($cell_terbilang['posx']))
            {
                $this->Pdf->SetX($cell_terbilang['posx']);
            }
            elseif (!empty($cell_terbilang['posy']))
            {
                $this->Pdf->SetY($cell_terbilang['posy']);
            }
            $NM_partes_val = explode("<br>", $cell_terbilang['data']);
            $PosX = $this->Pdf->GetX();
            $Incre = false;
            foreach ($NM_partes_val as $Lines)
            {
                if ($Incre)
                {
                    $this->Pdf->Ln(4.2333333333333);
                }
                $this->Pdf->SetX($PosX);
                $this->Pdf->Cell($cell_terbilang['width'], 0, trim($Lines), 0, 0, $cell_terbilang['align']);
                $Incre = true;
            }
            $this->Pdf->SetFont($cell_alamat_pbf['font_type'], $cell_alamat_pbf['font_style'], $cell_alamat_pbf['font_size']);
            $this->Pdf->SetTextColor($cell_alamat_pbf['color_r'], $cell_alamat_pbf['color_g'], $cell_alamat_pbf['color_b']);
            if (!empty($cell_alamat_pbf['posx']) && !empty($cell_alamat_pbf['posy']))
            {
                $this->Pdf->SetXY($cell_alamat_pbf['posx'], $cell_alamat_pbf['posy']);
            }
            elseif (!empty($cell_alamat_pbf['posx']))
            {
                $this->Pdf->SetX($cell_alamat_pbf['posx']);
            }
            elseif (!empty($cell_alamat_pbf['posy']))
            {
                $this->Pdf->SetY($cell_alamat_pbf['posy']);
            }
            $NM_partes_val = explode("<br>", $cell_alamat_pbf['data']);
            $PosX = $this->Pdf->GetX();
            $Incre = false;
            foreach ($NM_partes_val as $Lines)
            {
                if ($Incre)
                {
                    $this->Pdf->Ln(4.2333333333333);
                }
                $this->Pdf->SetX($PosX);
                $this->Pdf->Cell($cell_alamat_pbf['width'], 0, trim($Lines), 0, 0, $cell_alamat_pbf['align']);
                $Incre = true;
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
function kekata($x) {
$_SESSION['scriptcase']['pdfreport_tbpo']['contr_erro'] = 'on';
  
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

$_SESSION['scriptcase']['pdfreport_tbpo']['contr_erro'] = 'off';
}
function terbilang($x, $style=4) {
$_SESSION['scriptcase']['pdfreport_tbpo']['contr_erro'] = 'on';
  
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

$_SESSION['scriptcase']['pdfreport_tbpo']['contr_erro'] = 'off';
}
}
?>
