<?php
class PO_gizi_grid
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
   var $array_sgizi_bahan = array();
   var $array_sgizi_supplier = array();
   var $sgizi = array();
   var $sgizi_bahan = array();
   var $sc_field_4 = array();
   var $sgizi_n = array();
   var $sgizi_qty = array();
   var $sgizi_satuan = array();
   var $sgizi_stock = array();
   var $sgizi_subtotal = array();
   var $sgizi_supplier = array();
   var $terbilang = array();
   var $tgl = array();
   var $a_nopo = array();
   var $grandtotal = array();
   var $supplier = array();
   var $barcode = array();
   var $ppn = array();
   var $diskon = array();
   var $sc_field_0 = array();
   var $sc_field_1 = array();
   var $sc_field_2 = array();
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
   $Tp_papel = array(210, 297);
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
   $_SESSION['scriptcase']['PO_gizi']['default_font'] = $this->default_font;
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
           if (in_array("PO_gizi", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->a_nopo[0] = $Busca_temp['a_nopo']; 
       $tmp_pos = strpos($this->a_nopo[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->a_nopo[0]))
       {
           $this->a_nopo[0] = substr($this->a_nopo[0], 0, $tmp_pos);
       }
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['PO_gizi']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['PO_gizi']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['PO_gizi']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['PO_gizi']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['ordem_select'] = array(); 
       $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['ordem_select']; 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['where_orig'] = "";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT a.noPO as a_nopo, (sum(b.refharga * b.disetujui))-(sum((b.refharga * b.diskon)/100))+(sum((b.refharga * b.ppn)/100)) as grandtotal, b.supplier as supplier, a.noPO as barcode, sum((b.refharga * b.ppn)/100) as ppn, sum((b.refharga * b.diskon)/100) as diskon, str_replace (convert(char(10),a.pic_date,102), '.', '-') + ' ' + convert(char(8),a.pic_date,20) as sc_field_0, str_replace (convert(char(10),a.spv_date,102), '.', '-') + ' ' + convert(char(8),a.spv_date,20) as sc_field_1, str_replace (convert(char(10),a.wk_date,102), '.', '-') + ' ' + convert(char(8),a.wk_date,20) as sc_field_2 from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT a.noPO as a_nopo, (sum(b.refharga * b.disetujui))-(sum((b.refharga * b.diskon)/100))+(sum((b.refharga * b.ppn)/100)) as grandtotal, b.supplier as supplier, a.noPO as barcode, sum((b.refharga * b.ppn)/100) as ppn, sum((b.refharga * b.diskon)/100) as diskon, a.pic_date as sc_field_0, a.spv_date as sc_field_1, a.wk_date as sc_field_2 from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT a.noPO as a_nopo, (sum(b.refharga * b.disetujui))-(sum((b.refharga * b.diskon)/100))+(sum((b.refharga * b.ppn)/100)) as grandtotal, b.supplier as supplier, a.noPO as barcode, sum((b.refharga * b.ppn)/100) as ppn, sum((b.refharga * b.diskon)/100) as diskon, convert(char(23),a.pic_date,121) as sc_field_0, convert(char(23),a.spv_date,121) as sc_field_1, convert(char(23),a.wk_date,121) as sc_field_2 from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT a.noPO as a_nopo, (sum(b.refharga * b.disetujui))-(sum((b.refharga * b.diskon)/100))+(sum((b.refharga * b.ppn)/100)) as grandtotal, b.supplier as supplier, a.noPO as barcode, sum((b.refharga * b.ppn)/100) as ppn, sum((b.refharga * b.diskon)/100) as diskon, a.pic_date as sc_field_0, a.spv_date as sc_field_1, a.wk_date as sc_field_2 from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT a.noPO as a_nopo, (sum(b.refharga * b.disetujui))-(sum((b.refharga * b.diskon)/100))+(sum((b.refharga * b.ppn)/100)) as grandtotal, b.supplier as supplier, a.noPO as barcode, sum((b.refharga * b.ppn)/100) as ppn, sum((b.refharga * b.diskon)/100) as diskon, EXTEND(a.pic_date, YEAR TO FRACTION) as sc_field_0, EXTEND(a.spv_date, YEAR TO FRACTION) as sc_field_1, EXTEND(a.wk_date, YEAR TO FRACTION) as sc_field_2 from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT a.noPO as a_nopo, (sum(b.refharga * b.disetujui))-(sum((b.refharga * b.diskon)/100))+(sum((b.refharga * b.ppn)/100)) as grandtotal, b.supplier as supplier, a.noPO as barcode, sum((b.refharga * b.ppn)/100) as ppn, sum((b.refharga * b.diskon)/100) as diskon, a.pic_date as sc_field_0, a.spv_date as sc_field_1, a.wk_date as sc_field_2 from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['order_grid'] = $nmgp_order_by;
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
         $this->Pdf->SetFont($this->default_font, $this->default_style, 10, $this->def_TTF);
     }
     else
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 10);
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
   $this->Pdf->Image($this->NM_raiz_img . $this->Ini->path_img_global . "/grp__NM__bg__NM__PO_gizi_potrait_rev.jpg", "0.000000", "0.000000", "210", "297", '', '', '', false, 300, '', false, false, 0);
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['labels']['a_nopo'] = "No PO";
   $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['labels']['grandtotal'] = "Grandtotal";
   $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['labels']['supplier'] = "Supplier";
   $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['labels']['barcode'] = "Barcode";
   $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['labels']['ppn'] = "Ppn";
   $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['labels']['diskon'] = "Diskon";
   $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['labels']['sc_field_0'] = "PIC Acc";
   $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['labels']['sc_field_1'] = "SPV Acc";
   $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['labels']['sc_field_2'] = "Wadir Acc";
   $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['labels']['sgizi'] = "sgizi";
   $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['labels']['sgizi_bahan'] = "Bahan";
   $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['labels']['sc_field_4'] = "Harga Satuan";
   $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['labels']['sgizi_n'] = "N";
   $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['labels']['sgizi_qty'] = "Qty";
   $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['labels']['sgizi_satuan'] = "Satuan";
   $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['labels']['sgizi_stock'] = "Stock";
   $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['labels']['sgizi_subtotal'] = "Subtotal";
   $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['labels']['sgizi_supplier'] = "Supplier";
   $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['labels']['terbilang'] = "terbilang";
   $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['labels']['tgl'] = "tgl";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['PO_gizi']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['PO_gizi']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['PO_gizi']['lig_edit'];
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
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['PO_gizi']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->a_nopo[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->grandtotal[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->grandtotal[$this->nm_grid_colunas] =  str_replace(",", ".", $this->grandtotal[$this->nm_grid_colunas]);
          $this->grandtotal[$this->nm_grid_colunas] = (strpos(strtolower($this->grandtotal[$this->nm_grid_colunas]), "e")) ? (float)$this->grandtotal[$this->nm_grid_colunas] : $this->grandtotal[$this->nm_grid_colunas]; 
          $this->grandtotal[$this->nm_grid_colunas] = (string)$this->grandtotal[$this->nm_grid_colunas];
          $this->supplier[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->barcode[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->ppn[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->ppn[$this->nm_grid_colunas] =  str_replace(",", ".", $this->ppn[$this->nm_grid_colunas]);
          $this->ppn[$this->nm_grid_colunas] = (string)$this->ppn[$this->nm_grid_colunas];
          $this->diskon[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->diskon[$this->nm_grid_colunas] =  str_replace(",", ".", $this->diskon[$this->nm_grid_colunas]);
          $this->diskon[$this->nm_grid_colunas] = (string)$this->diskon[$this->nm_grid_colunas];
          $this->sc_field_0[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->sc_field_1[$this->nm_grid_colunas] = $this->rs_grid->fields[7] ;  
          $this->sc_field_2[$this->nm_grid_colunas] = $this->rs_grid->fields[8] ;  
          $this->sgizi_bahan[$this->nm_grid_colunas] = array();
          $this->sc_field_4[$this->nm_grid_colunas] = array();
          $this->sgizi_n[$this->nm_grid_colunas] = array();
          $this->sgizi_qty[$this->nm_grid_colunas] = array();
          $this->sgizi_satuan[$this->nm_grid_colunas] = array();
          $this->sgizi_stock[$this->nm_grid_colunas] = array();
          $this->sgizi_subtotal[$this->nm_grid_colunas] = array();
          $this->sgizi_supplier[$this->nm_grid_colunas] = array();
          $this->Lookup->lookup_sgizi($this->sgizi[$this->nm_grid_colunas] , $this->a_nopo[$this->nm_grid_colunas], $array_sgizi); 
          $NM_ind = 0;
          $this->sgizi = array();
          foreach ($array_sgizi as $cada_subselect) 
          {
              $this->sgizi[$this->nm_grid_colunas][$NM_ind] = "";
              $this->sgizi_n[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[0];
              $this->sgizi_bahan[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[1];
              $this->sgizi_stock[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[2];
              $this->sgizi_qty[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[3];
              $this->sgizi_satuan[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[4];
              $this->sc_field_4[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[5];
              $this->sgizi_supplier[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[6];
              $this->sgizi_subtotal[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[7];
              $NM_ind++;
          }
          $this->terbilang[$this->nm_grid_colunas] = "";
          $this->tgl[$this->nm_grid_colunas] = "";
          $_SESSION['scriptcase']['PO_gizi']['contr_erro'] = 'on';
  




$this->terbilang[$this->nm_grid_colunas]  = $this->terbilang($this->grandtotal[$this->nm_grid_colunas] , $style=1).'  RUPIAH';

$bulan = array(
                '01' => 'JANUARI',
                '02' => 'FEBRUARI',
                '03' => 'MARET',
                '04' => 'APRIL',
                '05' => 'MEI',
                '06' => 'JUNI',
                '07' => 'JULI',
                '08' => 'AGUSTUS',
                '09' => 'SEPTEMBER',
                '10' => 'OKTOBER',
                '11' => 'NOVEMBER',
                '12' => 'DESEMBER',
        );

$this->tgl[$this->nm_grid_colunas]  = date('d').' '.$bulan[date('m')].' '.date('Y');
$_SESSION['scriptcase']['PO_gizi']['contr_erro'] = 'off';
          $this->a_nopo[$this->nm_grid_colunas] = sc_strip_script($this->a_nopo[$this->nm_grid_colunas]);
          if ($this->a_nopo[$this->nm_grid_colunas] === "") 
          { 
              $this->a_nopo[$this->nm_grid_colunas] = "" ;  
          } 
          $this->a_nopo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->a_nopo[$this->nm_grid_colunas]);
          $this->grandtotal[$this->nm_grid_colunas] = sc_strip_script($this->grandtotal[$this->nm_grid_colunas]);
          if ($this->grandtotal[$this->nm_grid_colunas] === "") 
          { 
              $this->grandtotal[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->grandtotal[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->grandtotal[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->grandtotal[$this->nm_grid_colunas]);
          $this->Lookup->lookup_supplier($this->supplier[$this->nm_grid_colunas] , $this->supplier[$this->nm_grid_colunas]) ; 
          $this->supplier[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->supplier[$this->nm_grid_colunas]);
          $this->barcode[$this->nm_grid_colunas] = $this->barcode[$this->nm_grid_colunas]; 
          if (empty($this->barcode[$this->nm_grid_colunas]) || $this->barcode[$this->nm_grid_colunas] == "none" || $this->barcode[$this->nm_grid_colunas] == "*nm*") 
          { 
              $this->barcode[$this->nm_grid_colunas] = "" ;  
              $out_barcode = "" ; 
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
          $this->ppn[$this->nm_grid_colunas] = sc_strip_script($this->ppn[$this->nm_grid_colunas]);
          if ($this->ppn[$this->nm_grid_colunas] === "") 
          { 
              $this->ppn[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->ppn[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->ppn[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->ppn[$this->nm_grid_colunas]);
          $this->diskon[$this->nm_grid_colunas] = sc_strip_script($this->diskon[$this->nm_grid_colunas]);
          if ($this->diskon[$this->nm_grid_colunas] === "") 
          { 
              $this->diskon[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->diskon[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->diskon[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->diskon[$this->nm_grid_colunas]);
          $this->sc_field_0[$this->nm_grid_colunas] = sc_strip_script($this->sc_field_0[$this->nm_grid_colunas]);
          if ($this->sc_field_0[$this->nm_grid_colunas] === "") 
          { 
              $this->sc_field_0[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               if (substr($this->sc_field_0[$this->nm_grid_colunas], 10, 1) == "-") 
               { 
                  $this->sc_field_0[$this->nm_grid_colunas] = substr($this->sc_field_0[$this->nm_grid_colunas], 0, 10) . " " . substr($this->sc_field_0[$this->nm_grid_colunas], 11);
               } 
               if (substr($this->sc_field_0[$this->nm_grid_colunas], 13, 1) == ".") 
               { 
                  $this->sc_field_0[$this->nm_grid_colunas] = substr($this->sc_field_0[$this->nm_grid_colunas], 0, 13) . ":" . substr($this->sc_field_0[$this->nm_grid_colunas], 14, 2) . ":" . substr($this->sc_field_0[$this->nm_grid_colunas], 17);
               } 
               $sc_field_0_x =  $this->sc_field_0[$this->nm_grid_colunas];
               nm_conv_limpa_dado($sc_field_0_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($sc_field_0_x) && strlen($sc_field_0_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->sc_field_0[$this->nm_grid_colunas], "YYYY-MM-DD HH:II:SS");
                   $this->sc_field_0[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhii")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->sc_field_0[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->sc_field_0[$this->nm_grid_colunas]);
          $this->sc_field_1[$this->nm_grid_colunas] = sc_strip_script($this->sc_field_1[$this->nm_grid_colunas]);
          if ($this->sc_field_1[$this->nm_grid_colunas] === "") 
          { 
              $this->sc_field_1[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               if (substr($this->sc_field_1[$this->nm_grid_colunas], 10, 1) == "-") 
               { 
                  $this->sc_field_1[$this->nm_grid_colunas] = substr($this->sc_field_1[$this->nm_grid_colunas], 0, 10) . " " . substr($this->sc_field_1[$this->nm_grid_colunas], 11);
               } 
               if (substr($this->sc_field_1[$this->nm_grid_colunas], 13, 1) == ".") 
               { 
                  $this->sc_field_1[$this->nm_grid_colunas] = substr($this->sc_field_1[$this->nm_grid_colunas], 0, 13) . ":" . substr($this->sc_field_1[$this->nm_grid_colunas], 14, 2) . ":" . substr($this->sc_field_1[$this->nm_grid_colunas], 17);
               } 
               $sc_field_1_x =  $this->sc_field_1[$this->nm_grid_colunas];
               nm_conv_limpa_dado($sc_field_1_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($sc_field_1_x) && strlen($sc_field_1_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->sc_field_1[$this->nm_grid_colunas], "YYYY-MM-DD HH:II:SS");
                   $this->sc_field_1[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhii")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->sc_field_1[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->sc_field_1[$this->nm_grid_colunas]);
          $this->sc_field_2[$this->nm_grid_colunas] = sc_strip_script($this->sc_field_2[$this->nm_grid_colunas]);
          if ($this->sc_field_2[$this->nm_grid_colunas] === "") 
          { 
              $this->sc_field_2[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               if (substr($this->sc_field_2[$this->nm_grid_colunas], 10, 1) == "-") 
               { 
                  $this->sc_field_2[$this->nm_grid_colunas] = substr($this->sc_field_2[$this->nm_grid_colunas], 0, 10) . " " . substr($this->sc_field_2[$this->nm_grid_colunas], 11);
               } 
               if (substr($this->sc_field_2[$this->nm_grid_colunas], 13, 1) == ".") 
               { 
                  $this->sc_field_2[$this->nm_grid_colunas] = substr($this->sc_field_2[$this->nm_grid_colunas], 0, 13) . ":" . substr($this->sc_field_2[$this->nm_grid_colunas], 14, 2) . ":" . substr($this->sc_field_2[$this->nm_grid_colunas], 17);
               } 
               $sc_field_2_x =  $this->sc_field_2[$this->nm_grid_colunas];
               nm_conv_limpa_dado($sc_field_2_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($sc_field_2_x) && strlen($sc_field_2_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->sc_field_2[$this->nm_grid_colunas], "YYYY-MM-DD HH:II:SS");
                   $this->sc_field_2[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhii")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->sc_field_2[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->sc_field_2[$this->nm_grid_colunas]);
          if ($this->terbilang[$this->nm_grid_colunas] === "") 
          { 
              $this->terbilang[$this->nm_grid_colunas] = "" ;  
          } 
          $this->terbilang[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->terbilang[$this->nm_grid_colunas]);
          if ($this->tgl[$this->nm_grid_colunas] === "") 
          { 
              $this->tgl[$this->nm_grid_colunas] = "" ;  
          } 
          $this->tgl[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tgl[$this->nm_grid_colunas]);
          foreach ($this->sgizi_bahan[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
              $this->Lookup->lookup_sgizi_bahan($this->sgizi_bahan[$this->nm_grid_colunas][$NM_ind] , $this->sgizi_bahan[$this->nm_grid_colunas][$NM_ind], $array_sgizi_bahan) ; 
              $this->sgizi_bahan[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->sgizi_bahan[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->sc_field_4[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->sc_field_4[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->sc_field_4[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->sc_field_4[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
              $this->sc_field_4[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->sc_field_4[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->sgizi_n[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->sgizi_n[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->sgizi_n[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->sgizi_n[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->sgizi_n[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->sgizi_n[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->sgizi_qty[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->sgizi_qty[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->sgizi_qty[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->sgizi_qty[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->sgizi_qty[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->sgizi_satuan[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->sgizi_satuan[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->sgizi_satuan[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->sgizi_satuan[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->sgizi_satuan[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->sgizi_stock[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->sgizi_stock[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->sgizi_stock[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->sgizi_stock[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->sgizi_stock[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->sgizi_subtotal[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->sgizi_subtotal[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->sgizi_subtotal[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->sgizi_subtotal[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
              $this->sgizi_subtotal[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->sgizi_subtotal[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->sgizi_supplier[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
              $this->Lookup->lookup_sgizi_supplier($this->sgizi_supplier[$this->nm_grid_colunas][$NM_ind] , $this->sgizi_supplier[$this->nm_grid_colunas][$NM_ind], $array_sgizi_supplier) ; 
              $this->sgizi_supplier[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->sgizi_supplier[$this->nm_grid_colunas][$NM_ind]);
          }
            $cell_a_noPO = array('posx' => '44', 'posy' => '42', 'data' => $this->a_nopo[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_grandtotal = array('posx' => '167', 'posy' => '281.5', 'data' => $this->grandtotal[$this->nm_grid_colunas], 'width'      => '28', 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tgl = array('posx' => '44', 'posy' => '47.5', 'data' => $this->tgl[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_ppn = array('posx' => '167', 'posy' => '275', 'data' => $this->ppn[$this->nm_grid_colunas], 'width'      => '28', 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_diskon = array('posx' => '167', 'posy' => '270', 'data' => $this->diskon[$this->nm_grid_colunas], 'width'      => '28', 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_terbilang = array('posx' => '18', 'posy' => '274.5', 'data' => $this->terbilang[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '9', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sgizi_n = array('posx' => '15', 'posy' => '68.75859374999133', 'data' => $this->sgizi_n[$this->nm_grid_colunas], 'width'      => '10', 'align'      => 'C', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sgizi_bahan = array('posx' => '25.9180541666634', 'posy' => '68.75859374999133', 'data' => $this->sgizi_bahan[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sgizi_stock = array('posx' => '81.1167520833231', 'posy' => '68.75859374999133', 'data' => $this->sgizi_stock[$this->nm_grid_colunas], 'width'      => '20', 'align'      => 'C', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sgizi_qty = array('posx' => '102.12361041665379', 'posy' => '68.75859374999133', 'data' => $this->sgizi_qty[$this->nm_grid_colunas], 'width'      => '10', 'align'      => 'C', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sgizi_satuan = array('posx' => '114.5', 'posy' => '68.75859374999133', 'data' => $this->sgizi_satuan[$this->nm_grid_colunas], 'width'      => '25', 'align'      => 'C', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_4 = array('posx' => '143', 'posy' => '68.75859374999133', 'data' => $this->sc_field_4[$this->nm_grid_colunas], 'width'      => '21', 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sgizi_subtotal = array('posx' => '168', 'posy' => '68.75859374999133', 'data' => $this->sgizi_subtotal[$this->nm_grid_colunas], 'width'      => '25', 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_pic = array('posx' => '17', 'posy' => '284', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '25', 'align'      => 'C', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_spv = array('posx' => '59', 'posy' => '284', 'data' => $this->sc_field_1[$this->nm_grid_colunas], 'width'      => '25', 'align'      => 'C', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_keu = array('posx' => '103', 'posy' => '280', 'data' => $this->sc_field_2[$this->nm_grid_colunas], 'width'      => '25', 'align'      => 'C', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);


            $this->Pdf->SetFont($cell_a_noPO['font_type'], $cell_a_noPO['font_style'], $cell_a_noPO['font_size']);
            $this->pdf_text_color($cell_a_noPO['data'], $cell_a_noPO['color_r'], $cell_a_noPO['color_g'], $cell_a_noPO['color_b']);
            if (!empty($cell_a_noPO['posx']) && !empty($cell_a_noPO['posy']))
            {
                $this->Pdf->SetXY($cell_a_noPO['posx'], $cell_a_noPO['posy']);
            }
            elseif (!empty($cell_a_noPO['posx']))
            {
                $this->Pdf->SetX($cell_a_noPO['posx']);
            }
            elseif (!empty($cell_a_noPO['posy']))
            {
                $this->Pdf->SetY($cell_a_noPO['posy']);
            }
            $this->Pdf->Cell($cell_a_noPO['width'], 0, $cell_a_noPO['data'], 0, 0, $cell_a_noPO['align']);

            $this->Pdf->SetFont($cell_grandtotal['font_type'], $cell_grandtotal['font_style'], $cell_grandtotal['font_size']);
            $this->pdf_text_color($cell_grandtotal['data'], $cell_grandtotal['color_r'], $cell_grandtotal['color_g'], $cell_grandtotal['color_b']);
            if (!empty($cell_grandtotal['posx']) && !empty($cell_grandtotal['posy']))
            {
                $this->Pdf->SetXY($cell_grandtotal['posx'], $cell_grandtotal['posy']);
            }
            elseif (!empty($cell_grandtotal['posx']))
            {
                $this->Pdf->SetX($cell_grandtotal['posx']);
            }
            elseif (!empty($cell_grandtotal['posy']))
            {
                $this->Pdf->SetY($cell_grandtotal['posy']);
            }
            $this->Pdf->Cell($cell_grandtotal['width'], 0, $cell_grandtotal['data'], 0, 0, $cell_grandtotal['align']);

            $this->Pdf->SetFont($cell_tgl['font_type'], $cell_tgl['font_style'], $cell_tgl['font_size']);
            $this->pdf_text_color($cell_tgl['data'], $cell_tgl['color_r'], $cell_tgl['color_g'], $cell_tgl['color_b']);
            if (!empty($cell_tgl['posx']) && !empty($cell_tgl['posy']))
            {
                $this->Pdf->SetXY($cell_tgl['posx'], $cell_tgl['posy']);
            }
            elseif (!empty($cell_tgl['posx']))
            {
                $this->Pdf->SetX($cell_tgl['posx']);
            }
            elseif (!empty($cell_tgl['posy']))
            {
                $this->Pdf->SetY($cell_tgl['posy']);
            }
            $this->Pdf->Cell($cell_tgl['width'], 0, $cell_tgl['data'], 0, 0, $cell_tgl['align']);

            $this->Pdf->SetFont($cell_ppn['font_type'], $cell_ppn['font_style'], $cell_ppn['font_size']);
            $this->pdf_text_color($cell_ppn['data'], $cell_ppn['color_r'], $cell_ppn['color_g'], $cell_ppn['color_b']);
            if (!empty($cell_ppn['posx']) && !empty($cell_ppn['posy']))
            {
                $this->Pdf->SetXY($cell_ppn['posx'], $cell_ppn['posy']);
            }
            elseif (!empty($cell_ppn['posx']))
            {
                $this->Pdf->SetX($cell_ppn['posx']);
            }
            elseif (!empty($cell_ppn['posy']))
            {
                $this->Pdf->SetY($cell_ppn['posy']);
            }
            $this->Pdf->Cell($cell_ppn['width'], 0, $cell_ppn['data'], 0, 0, $cell_ppn['align']);

            $this->Pdf->SetFont($cell_diskon['font_type'], $cell_diskon['font_style'], $cell_diskon['font_size']);
            $this->pdf_text_color($cell_diskon['data'], $cell_diskon['color_r'], $cell_diskon['color_g'], $cell_diskon['color_b']);
            if (!empty($cell_diskon['posx']) && !empty($cell_diskon['posy']))
            {
                $this->Pdf->SetXY($cell_diskon['posx'], $cell_diskon['posy']);
            }
            elseif (!empty($cell_diskon['posx']))
            {
                $this->Pdf->SetX($cell_diskon['posx']);
            }
            elseif (!empty($cell_diskon['posy']))
            {
                $this->Pdf->SetY($cell_diskon['posy']);
            }
            $this->Pdf->Cell($cell_diskon['width'], 0, $cell_diskon['data'], 0, 0, $cell_diskon['align']);

            $this->Pdf->SetFont($cell_terbilang['font_type'], $cell_terbilang['font_style'], $cell_terbilang['font_size']);
            $this->pdf_text_color($cell_terbilang['data'], $cell_terbilang['color_r'], $cell_terbilang['color_g'], $cell_terbilang['color_b']);
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
            $this->Pdf->Cell($cell_terbilang['width'], 0, $cell_terbilang['data'], 0, 0, $cell_terbilang['align']);

            $this->Pdf->SetY(68.75859374999133);
            foreach ($this->sgizi[$this->nm_grid_colunas] as $NM_ind => $Dados)
            {
                $this->Pdf->SetFont($cell_sgizi_n['font_type'], $cell_sgizi_n['font_style'], $cell_sgizi_n['font_size']);
                if (!empty($cell_sgizi_n['posx']))
                {
                    $this->Pdf->SetX($cell_sgizi_n['posx']);
                }
                $this->pdf_text_color($this->sgizi_n[$this->nm_grid_colunas][$NM_ind], $cell_sgizi_n['color_r'], $cell_sgizi_n['color_g'], $cell_sgizi_n['color_b']);
                $this->Pdf->Cell($cell_sgizi_n['width'], 0, $this->sgizi_n[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_sgizi_n['align']);
                $this->Pdf->SetFont($cell_sgizi_bahan['font_type'], $cell_sgizi_bahan['font_style'], $cell_sgizi_bahan['font_size']);
                if (!empty($cell_sgizi_bahan['posx']))
                {
                    $this->Pdf->SetX($cell_sgizi_bahan['posx']);
                }
                $this->pdf_text_color($this->sgizi_bahan[$this->nm_grid_colunas][$NM_ind], $cell_sgizi_bahan['color_r'], $cell_sgizi_bahan['color_g'], $cell_sgizi_bahan['color_b']);
                $this->Pdf->Cell($cell_sgizi_bahan['width'], 0, $this->sgizi_bahan[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_sgizi_bahan['align']);
                $this->Pdf->SetFont($cell_sgizi_stock['font_type'], $cell_sgizi_stock['font_style'], $cell_sgizi_stock['font_size']);
                if (!empty($cell_sgizi_stock['posx']))
                {
                    $this->Pdf->SetX($cell_sgizi_stock['posx']);
                }
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->SetTextColor($cell_sgizi_stock['color_r'], $cell_sgizi_stock['color_g'], $cell_sgizi_stock['color_b']);
                $this->Pdf->writeHTMLCell($cell_sgizi_stock['width'], 0, $atu_X, $atu_Y, $this->sgizi_stock[$this->nm_grid_colunas][$NM_ind], 0, 0, false, true, $cell_sgizi_stock['align']);
                $this->Pdf->SetY($atu_Y);
                $this->Pdf->SetFont($cell_sgizi_qty['font_type'], $cell_sgizi_qty['font_style'], $cell_sgizi_qty['font_size']);
                if (!empty($cell_sgizi_qty['posx']))
                {
                    $this->Pdf->SetX($cell_sgizi_qty['posx']);
                }
                $this->pdf_text_color($this->sgizi_qty[$this->nm_grid_colunas][$NM_ind], $cell_sgizi_qty['color_r'], $cell_sgizi_qty['color_g'], $cell_sgizi_qty['color_b']);
                $this->Pdf->Cell($cell_sgizi_qty['width'], 0, $this->sgizi_qty[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_sgizi_qty['align']);
                $this->Pdf->SetFont($cell_sgizi_satuan['font_type'], $cell_sgizi_satuan['font_style'], $cell_sgizi_satuan['font_size']);
                if (!empty($cell_sgizi_satuan['posx']))
                {
                    $this->Pdf->SetX($cell_sgizi_satuan['posx']);
                }
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->SetTextColor($cell_sgizi_satuan['color_r'], $cell_sgizi_satuan['color_g'], $cell_sgizi_satuan['color_b']);
                $this->Pdf->writeHTMLCell($cell_sgizi_satuan['width'], 0, $atu_X, $atu_Y, $this->sgizi_satuan[$this->nm_grid_colunas][$NM_ind], 0, 0, false, true, $cell_sgizi_satuan['align']);
                $this->Pdf->SetY($atu_Y);
                $this->Pdf->SetFont($cell_sc_field_4['font_type'], $cell_sc_field_4['font_style'], $cell_sc_field_4['font_size']);
                if (!empty($cell_sc_field_4['posx']))
                {
                    $this->Pdf->SetX($cell_sc_field_4['posx']);
                }
                $this->pdf_text_color($this->sc_field_4[$this->nm_grid_colunas][$NM_ind], $cell_sc_field_4['color_r'], $cell_sc_field_4['color_g'], $cell_sc_field_4['color_b']);
                $this->Pdf->Cell($cell_sc_field_4['width'], 0, $this->sc_field_4[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_sc_field_4['align']);
                $this->Pdf->SetFont($cell_sgizi_subtotal['font_type'], $cell_sgizi_subtotal['font_style'], $cell_sgizi_subtotal['font_size']);
                if (!empty($cell_sgizi_subtotal['posx']))
                {
                    $this->Pdf->SetX($cell_sgizi_subtotal['posx']);
                }
                $this->pdf_text_color($this->sgizi_subtotal[$this->nm_grid_colunas][$NM_ind], $cell_sgizi_subtotal['color_r'], $cell_sgizi_subtotal['color_g'], $cell_sgizi_subtotal['color_b']);
                $this->Pdf->Cell($cell_sgizi_subtotal['width'], 0, $this->sgizi_subtotal[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_sgizi_subtotal['align']);
                if (!isset($max_Y) || empty($max_Y) || $this->Pdf->GetY() < $max_Y )
                {
                    $max_Y = $this->Pdf->GetY();
                }
                $max_Y += 4;
                $this->Pdf->SetY($max_Y);

            }

            $this->Pdf->SetFont($cell_pic['font_type'], $cell_pic['font_style'], $cell_pic['font_size']);
            $this->pdf_text_color($cell_pic['data'], $cell_pic['color_r'], $cell_pic['color_g'], $cell_pic['color_b']);
            if (!empty($cell_pic['posx']) && !empty($cell_pic['posy']))
            {
                $this->Pdf->SetXY($cell_pic['posx'], $cell_pic['posy']);
            }
            elseif (!empty($cell_pic['posx']))
            {
                $this->Pdf->SetX($cell_pic['posx']);
            }
            elseif (!empty($cell_pic['posy']))
            {
                $this->Pdf->SetY($cell_pic['posy']);
            }
            $this->Pdf->Cell($cell_pic['width'], 0, $cell_pic['data'], 0, 0, $cell_pic['align']);

            $this->Pdf->SetFont($cell_spv['font_type'], $cell_spv['font_style'], $cell_spv['font_size']);
            $this->pdf_text_color($cell_spv['data'], $cell_spv['color_r'], $cell_spv['color_g'], $cell_spv['color_b']);
            if (!empty($cell_spv['posx']) && !empty($cell_spv['posy']))
            {
                $this->Pdf->SetXY($cell_spv['posx'], $cell_spv['posy']);
            }
            elseif (!empty($cell_spv['posx']))
            {
                $this->Pdf->SetX($cell_spv['posx']);
            }
            elseif (!empty($cell_spv['posy']))
            {
                $this->Pdf->SetY($cell_spv['posy']);
            }
            $this->Pdf->Cell($cell_spv['width'], 0, $cell_spv['data'], 0, 0, $cell_spv['align']);

            $this->Pdf->SetFont($cell_keu['font_type'], $cell_keu['font_style'], $cell_keu['font_size']);
            $this->pdf_text_color($cell_keu['data'], $cell_keu['color_r'], $cell_keu['color_g'], $cell_keu['color_b']);
            if (!empty($cell_keu['posx']) && !empty($cell_keu['posy']))
            {
                $this->Pdf->SetXY($cell_keu['posx'], $cell_keu['posy']);
            }
            elseif (!empty($cell_keu['posx']))
            {
                $this->Pdf->SetX($cell_keu['posx']);
            }
            elseif (!empty($cell_keu['posy']))
            {
                $this->Pdf->SetY($cell_keu['posy']);
            }
            $this->Pdf->Cell($cell_keu['width'], 0, $cell_keu['data'], 0, 0, $cell_keu['align']);

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
$_SESSION['scriptcase']['PO_gizi']['contr_erro'] = 'on';
  
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

$_SESSION['scriptcase']['PO_gizi']['contr_erro'] = 'off';
}
function terbilang($x, $style=4) {
$_SESSION['scriptcase']['PO_gizi']['contr_erro'] = 'on';
  
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

$_SESSION['scriptcase']['PO_gizi']['contr_erro'] = 'off';
}
}
?>
