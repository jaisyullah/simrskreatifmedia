<?php
class pdfreport_tbhasillab_grid
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
   var $array_tl = array();
   var $dpjp = array();
   var $login = array();
   var $sub = array();
   var $sub_hasil = array();
   var $sub_marked = array();
   var $sub_rujukan = array();
   var $sub_satuan = array();
   var $sub_subname = array();
   var $tl = array();
   var $sub_kategori = array();
   var $trancode = array();
   var $struk = array();
   var $custcode = array();
   var $custage = array();
   var $doccode = array();
   var $trandate = array();
   var $finishdate = array();
   var $barcode = array();
   var $nama = array();
   var $jk = array();
   var $plname = array();
   var $asal = array();
   var $inapcode = array();
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
   $_SESSION['scriptcase']['pdfreport_tbhasillab']['default_font'] = $this->default_font;
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
           if (in_array("pdfreport_tbhasillab", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->trancode[0] = $Busca_temp['trancode']; 
       $tmp_pos = strpos($this->trancode[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->trancode[0]))
       {
           $this->trancode[0] = substr($this->trancode[0], 0, $tmp_pos);
       }
       $this->struk[0] = $Busca_temp['struk']; 
       $tmp_pos = strpos($this->struk[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->struk[0]))
       {
           $this->struk[0] = substr($this->struk[0], 0, $tmp_pos);
       }
       $this->custcode[0] = $Busca_temp['custcode']; 
       $tmp_pos = strpos($this->custcode[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->custcode[0]))
       {
           $this->custcode[0] = substr($this->custcode[0], 0, $tmp_pos);
       }
       $this->custage[0] = $Busca_temp['custage']; 
       $tmp_pos = strpos($this->custage[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->custage[0]))
       {
           $this->custage[0] = substr($this->custage[0], 0, $tmp_pos);
       }
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbhasillab']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbhasillab']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbhasillab']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbhasillab']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['where_orig'] = " where trancode = '" . $_SESSION['var_Lab'] . "'";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT trancode, struk, custcode, custage, doccode, str_replace (convert(char(10),trandate,102), '.', '-') + ' ' + convert(char(8),trandate,20), str_replace (convert(char(10),finishdate,102), '.', '-') + ' ' + convert(char(8),finishdate,20), trancode as barcode, custcode as nama, custcode as jk, plname, asal, inapcode from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT trancode, struk, custcode, custage, doccode, trandate, finishdate, trancode as barcode, custcode as nama, custcode as jk, plname, asal, inapcode from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT trancode, struk, custcode, custage, doccode, convert(char(23),trandate,121), convert(char(23),finishdate,121), trancode as barcode, custcode as nama, custcode as jk, plname, asal, inapcode from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT trancode, struk, custcode, custage, doccode, trandate, finishdate, trancode as barcode, custcode as nama, custcode as jk, plname, asal, inapcode from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT trancode, struk, custcode, custage, doccode, EXTEND(trandate, YEAR TO FRACTION), EXTEND(finishdate, YEAR TO FRACTION), trancode as barcode, custcode as nama, custcode as jk, plname, asal, inapcode from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT trancode, struk, custcode, custage, doccode, trandate, finishdate, trancode as barcode, custcode as nama, custcode as jk, plname, asal, inapcode from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['order_grid'] = $nmgp_order_by;
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
   $this->Pdf->Image($this->NM_raiz_img . $this->Ini->path_img_global . "/grp__NM__bg__NM__Lab Hasil (2).jpg", "0.000000", "0.000000", "210", "297", '', '', '', false, 300, '', false, false, 0);
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['labels']['trancode'] = "Trancode";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['labels']['struk'] = "Struk";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['labels']['custcode'] = "Custcode";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['labels']['custage'] = "Custage";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['labels']['doccode'] = "Doccode";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['labels']['trandate'] = "Trandate";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['labels']['finishdate'] = "Finishdate";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['labels']['barcode'] = "Barcode";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['labels']['nama'] = "Nama";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['labels']['jk'] = "Jk";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['labels']['plname'] = "Plname";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['labels']['asal'] = "Asal";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['labels']['inapcode'] = "Inapcode";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['labels']['dpjp'] = "dpjp";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['labels']['login'] = "login";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['labels']['sub'] = "sub";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['labels']['sub_hasil'] = "Hasil";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['labels']['sub_marked'] = "Marked";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['labels']['sub_rujukan'] = "Rujukan";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['labels']['sub_satuan'] = "Satuan";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['labels']['sub_subname'] = "Subname";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['labels']['tl'] = "tl";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['labels']['sub_kategori'] = "Kategori";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbhasillab']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbhasillab']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbhasillab']['lig_edit'];
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
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasillab']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->trancode[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->struk[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->custcode[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->custage[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->doccode[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->trandate[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->finishdate[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->barcode[$this->nm_grid_colunas] = $this->rs_grid->fields[7] ;  
          $this->nama[$this->nm_grid_colunas] = $this->rs_grid->fields[8] ;  
          $this->jk[$this->nm_grid_colunas] = $this->rs_grid->fields[9] ;  
          $this->plname[$this->nm_grid_colunas] = $this->rs_grid->fields[10] ;  
          $this->asal[$this->nm_grid_colunas] = $this->rs_grid->fields[11] ;  
          $this->inapcode[$this->nm_grid_colunas] = $this->rs_grid->fields[12] ;  
          $this->sub_hasil[$this->nm_grid_colunas] = array();
          $this->sub_marked[$this->nm_grid_colunas] = array();
          $this->sub_rujukan[$this->nm_grid_colunas] = array();
          $this->sub_satuan[$this->nm_grid_colunas] = array();
          $this->sub_subname[$this->nm_grid_colunas] = array();
          $this->sub_kategori[$this->nm_grid_colunas] = array();
          $this->Lookup->lookup_sub($this->sub[$this->nm_grid_colunas] , $_SESSION['varLab'], $array_sub); 
          $NM_ind = 0;
          $this->sub = array();
          foreach ($array_sub as $cada_subselect) 
          {
              $this->sub[$this->nm_grid_colunas][$NM_ind] = "";
              $this->sub_kategori[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[0];
              $this->sub_subname[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[1];
              $this->sub_hasil[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[2];
              $this->sub_rujukan[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[3];
              $this->sub_satuan[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[4];
              $this->sub_marked[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[5];
              $NM_ind++;
          }
          $this->dpjp[$this->nm_grid_colunas] = "";
          $this->login[$this->nm_grid_colunas] = "";
          $this->look_sub_marked[$this->nm_grid_colunas] = $this->sub_marked[$this->nm_grid_colunas]; 
   $this->Lookup->lookup_sub_marked($this->look_sub_marked[$this->nm_grid_colunas]); 
          $this->tl[$this->nm_grid_colunas] = "";
          $this->Lookup->lookup_tl($this->tl[$this->nm_grid_colunas], $this->custcode[$this->nm_grid_colunas], $this->array_tl); 
          $_SESSION['scriptcase']['pdfreport_tbhasillab']['contr_erro'] = 'on';
if (!isset($_SESSION['usr_login'])) {$_SESSION['usr_login'] = "";}
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
 $check_sql = "SELECT name"
   . " FROM rsiapp_users"
   . " WHERE login = '" . $this->sc_temp_usr_login . "'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs[$this->nm_grid_colunas] = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs[$this->nm_grid_colunas][$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs[$this->nm_grid_colunas] = false;
          $this->rs_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[$this->nm_grid_colunas][0][0]))     
{
    $this->login[$this->nm_grid_colunas]  = $this->rs[$this->nm_grid_colunas][0][0];
}
		else     
{
	$this->login[$this->nm_grid_colunas]  = 'PETUGAS LAB';
}

if($this->jk[$this->nm_grid_colunas]  == 'P'){
	$this->jk[$this->nm_grid_colunas]  = 'Perempuan';
}else if($this->jk[$this->nm_grid_colunas]  == 'L'){
	$this->jk[$this->nm_grid_colunas]  = 'Laki-laki';
}

if($this->inapcode[$this->nm_grid_colunas]  == '--' || $this->inapcode[$this->nm_grid_colunas]  = ''){
	$this->asal[$this->nm_grid_colunas]  = 'POLIKLINIK/IGD';
}else{
	$this->asal[$this->nm_grid_colunas]  = 'RAWAT INAP';
}	
	
$this->dpjp[$this->nm_grid_colunas]  = 'dr.Yessi Mayke Sp.PK';
if (isset($this->sc_temp_usr_login)) {$_SESSION['usr_login'] = $this->sc_temp_usr_login;}
$_SESSION['scriptcase']['pdfreport_tbhasillab']['contr_erro'] = 'off';
          $this->trancode[$this->nm_grid_colunas] = sc_strip_script($this->trancode[$this->nm_grid_colunas]);
          if ($this->trancode[$this->nm_grid_colunas] === "") 
          { 
              $this->trancode[$this->nm_grid_colunas] = "" ;  
          } 
          $this->trancode[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->trancode[$this->nm_grid_colunas]);
          $this->struk[$this->nm_grid_colunas] = sc_strip_script($this->struk[$this->nm_grid_colunas]);
          if ($this->struk[$this->nm_grid_colunas] === "") 
          { 
              $this->struk[$this->nm_grid_colunas] = "" ;  
          } 
          $this->struk[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->struk[$this->nm_grid_colunas]);
          $this->custcode[$this->nm_grid_colunas] = sc_strip_script($this->custcode[$this->nm_grid_colunas]);
          if ($this->custcode[$this->nm_grid_colunas] === "") 
          { 
              $this->custcode[$this->nm_grid_colunas] = "" ;  
          } 
          $this->custcode[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->custcode[$this->nm_grid_colunas]);
          $this->custage[$this->nm_grid_colunas] = sc_strip_script($this->custage[$this->nm_grid_colunas]);
          if ($this->custage[$this->nm_grid_colunas] === "") 
          { 
              $this->custage[$this->nm_grid_colunas] = "" ;  
          } 
          $this->custage[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->custage[$this->nm_grid_colunas]);
          $this->Lookup->lookup_doccode($this->doccode[$this->nm_grid_colunas] , $this->doccode[$this->nm_grid_colunas]) ; 
          $this->doccode[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->doccode[$this->nm_grid_colunas]);
          $this->trandate[$this->nm_grid_colunas] = sc_strip_script($this->trandate[$this->nm_grid_colunas]);
          if ($this->trandate[$this->nm_grid_colunas] === "") 
          { 
              $this->trandate[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               if (substr($this->trandate[$this->nm_grid_colunas], 10, 1) == "-") 
               { 
                  $this->trandate[$this->nm_grid_colunas] = substr($this->trandate[$this->nm_grid_colunas], 0, 10) . " " . substr($this->trandate[$this->nm_grid_colunas], 11);
               } 
               if (substr($this->trandate[$this->nm_grid_colunas], 13, 1) == ".") 
               { 
                  $this->trandate[$this->nm_grid_colunas] = substr($this->trandate[$this->nm_grid_colunas], 0, 13) . ":" . substr($this->trandate[$this->nm_grid_colunas], 14, 2) . ":" . substr($this->trandate[$this->nm_grid_colunas], 17);
               } 
               $trandate_x =  $this->trandate[$this->nm_grid_colunas];
               nm_conv_limpa_dado($trandate_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($trandate_x) && strlen($trandate_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->trandate[$this->nm_grid_colunas], "YYYY-MM-DD HH:II:SS");
                   $this->trandate[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->trandate[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->trandate[$this->nm_grid_colunas]);
          $this->finishdate[$this->nm_grid_colunas] = sc_strip_script($this->finishdate[$this->nm_grid_colunas]);
          if ($this->finishdate[$this->nm_grid_colunas] === "") 
          { 
              $this->finishdate[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               if (substr($this->finishdate[$this->nm_grid_colunas], 10, 1) == "-") 
               { 
                  $this->finishdate[$this->nm_grid_colunas] = substr($this->finishdate[$this->nm_grid_colunas], 0, 10) . " " . substr($this->finishdate[$this->nm_grid_colunas], 11);
               } 
               if (substr($this->finishdate[$this->nm_grid_colunas], 13, 1) == ".") 
               { 
                  $this->finishdate[$this->nm_grid_colunas] = substr($this->finishdate[$this->nm_grid_colunas], 0, 13) . ":" . substr($this->finishdate[$this->nm_grid_colunas], 14, 2) . ":" . substr($this->finishdate[$this->nm_grid_colunas], 17);
               } 
               $finishdate_x =  $this->finishdate[$this->nm_grid_colunas];
               nm_conv_limpa_dado($finishdate_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($finishdate_x) && strlen($finishdate_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->finishdate[$this->nm_grid_colunas], "YYYY-MM-DD HH:II:SS");
                   $this->finishdate[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->finishdate[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->finishdate[$this->nm_grid_colunas]);
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
          $this->Lookup->lookup_nama($this->nama[$this->nm_grid_colunas] , $this->nama[$this->nm_grid_colunas]) ; 
          $this->nama[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->nama[$this->nm_grid_colunas]);
          $this->Lookup->lookup_jk($this->jk[$this->nm_grid_colunas] , $this->custcode[$this->nm_grid_colunas]) ; 
          $this->jk[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->jk[$this->nm_grid_colunas]);
          $this->plname[$this->nm_grid_colunas] = sc_strip_script($this->plname[$this->nm_grid_colunas]);
          if ($this->plname[$this->nm_grid_colunas] === "") 
          { 
              $this->plname[$this->nm_grid_colunas] = "" ;  
          } 
          $this->plname[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->plname[$this->nm_grid_colunas]);
          $this->asal[$this->nm_grid_colunas] = sc_strip_script($this->asal[$this->nm_grid_colunas]);
          if ($this->asal[$this->nm_grid_colunas] === "") 
          { 
              $this->asal[$this->nm_grid_colunas] = "" ;  
          } 
          $this->asal[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->asal[$this->nm_grid_colunas]);
          $this->inapcode[$this->nm_grid_colunas] = sc_strip_script($this->inapcode[$this->nm_grid_colunas]);
          if ($this->inapcode[$this->nm_grid_colunas] === "") 
          { 
              $this->inapcode[$this->nm_grid_colunas] = "" ;  
          } 
          $this->inapcode[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->inapcode[$this->nm_grid_colunas]);
          if ($this->dpjp[$this->nm_grid_colunas] === "") 
          { 
              $this->dpjp[$this->nm_grid_colunas] = "" ;  
          } 
          $this->dpjp[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->dpjp[$this->nm_grid_colunas]);
          if ($this->login[$this->nm_grid_colunas] === "") 
          { 
              $this->login[$this->nm_grid_colunas] = "" ;  
          } 
          $this->login[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->login[$this->nm_grid_colunas]);
          $this->Lookup->lookup_tl($this->tl[$this->nm_grid_colunas], $this->custcode[$this->nm_grid_colunas], $this->array_tl); 
          $this->tl[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tl[$this->nm_grid_colunas]);
          foreach ($this->sub_hasil[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->sub_hasil[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->sub_hasil[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->sub_hasil[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->sub_hasil[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->sub_marked[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
              $this->Lookup->lookup_sub_marked($this->sub_marked[$this->nm_grid_colunas][$NM_ind]); 
              $this->sub_marked[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->sub_marked[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->sub_rujukan[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->sub_rujukan[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->sub_rujukan[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->sub_rujukan[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->sub_rujukan[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->sub_satuan[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->sub_satuan[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->sub_satuan[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->sub_satuan[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->sub_satuan[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->sub_subname[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->sub_subname[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->sub_subname[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->sub_subname[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->sub_subname[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->sub_kategori[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->sub_kategori[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->sub_kategori[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->sub_kategori[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->sub_kategori[$this->nm_grid_colunas][$NM_ind]);
          }
            $cell_trancode = array('posx' => '146', 'posy' => '40', 'data' => $this->trancode[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_struk = array('posx' => '34', 'posy' => '40', 'data' => $this->struk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_RM = array('posx' => '52', 'posy' => '49.5', 'data' => $this->custcode[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_usia = array('posx' => '52', 'posy' => '63', 'data' => $this->custage[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_dokter = array('posx' => '146', 'posy' => '49.5', 'data' => $this->doccode[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_trandate = array('posx' => '146', 'posy' => '58', 'data' => $this->trandate[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_finishdate = array('posx' => '146', 'posy' => '63', 'data' => $this->finishdate[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_barcode = array('posx' => '190', 'posy' => '4', 'data' => $this->barcode[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_login = array('posx' => '157', 'posy' => '272', 'data' => $this->login[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_nama = array('posx' => '52', 'posy' => '54', 'data' => $this->nama[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_jk = array('posx' => '52', 'posy' => '58.5', 'data' => $this->jk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sub_subname = array('posx' => '14', 'posy' => '83', 'data' => $this->sub_subname[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sub_hasil = array('posx' => '72.20002916665757', 'posy' => '83.04688749998952', 'data' => $this->sub_hasil[$this->nm_grid_colunas], 'width'      => '60', 'align'      => 'C', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sub_satuan = array('posx' => '121.95360208331796', 'posy' => '83.04688749998952', 'data' => $this->sub_satuan[$this->nm_grid_colunas], 'width'      => '20', 'align'      => 'C', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sub_marked = array('posx' => '113', 'posy' => '83.04688749998952', 'data' => $this->sub_marked[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sub_rujukan = array('posx' => '160.06127499997982', 'posy' => '83.04688749998952', 'data' => $this->sub_rujukan[$this->nm_grid_colunas], 'width'      => '30', 'align'      => 'C', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_dpjp = array('posx' => '146', 'posy' => '67', 'data' => $this->dpjp[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tl = array('posx' => '52', 'posy' => '67', 'data' => $this->tl[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_dr_ex = array('posx' => '146', 'posy' => '49.5', 'data' => $this->plname[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_asal = array('posx' => '146', 'posy' => '54', 'data' => $this->asal[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sub_kategori = array('posx' => '10', 'posy' => '83', 'data' => $this->sub_kategori[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);


            $this->Pdf->SetFont($cell_trancode['font_type'], $cell_trancode['font_style'], $cell_trancode['font_size']);
            $this->pdf_text_color($cell_trancode['data'], $cell_trancode['color_r'], $cell_trancode['color_g'], $cell_trancode['color_b']);
            if (!empty($cell_trancode['posx']) && !empty($cell_trancode['posy']))
            {
                $this->Pdf->SetXY($cell_trancode['posx'], $cell_trancode['posy']);
            }
            elseif (!empty($cell_trancode['posx']))
            {
                $this->Pdf->SetX($cell_trancode['posx']);
            }
            elseif (!empty($cell_trancode['posy']))
            {
                $this->Pdf->SetY($cell_trancode['posy']);
            }
            $this->Pdf->Cell($cell_trancode['width'], 0, $cell_trancode['data'], 0, 0, $cell_trancode['align']);

            $this->Pdf->SetFont($cell_struk['font_type'], $cell_struk['font_style'], $cell_struk['font_size']);
            $this->pdf_text_color($cell_struk['data'], $cell_struk['color_r'], $cell_struk['color_g'], $cell_struk['color_b']);
            if (!empty($cell_struk['posx']) && !empty($cell_struk['posy']))
            {
                $this->Pdf->SetXY($cell_struk['posx'], $cell_struk['posy']);
            }
            elseif (!empty($cell_struk['posx']))
            {
                $this->Pdf->SetX($cell_struk['posx']);
            }
            elseif (!empty($cell_struk['posy']))
            {
                $this->Pdf->SetY($cell_struk['posy']);
            }
            $this->Pdf->Cell($cell_struk['width'], 0, $cell_struk['data'], 0, 0, $cell_struk['align']);

            $this->Pdf->SetFont($cell_RM['font_type'], $cell_RM['font_style'], $cell_RM['font_size']);
            $this->pdf_text_color($cell_RM['data'], $cell_RM['color_r'], $cell_RM['color_g'], $cell_RM['color_b']);
            if (!empty($cell_RM['posx']) && !empty($cell_RM['posy']))
            {
                $this->Pdf->SetXY($cell_RM['posx'], $cell_RM['posy']);
            }
            elseif (!empty($cell_RM['posx']))
            {
                $this->Pdf->SetX($cell_RM['posx']);
            }
            elseif (!empty($cell_RM['posy']))
            {
                $this->Pdf->SetY($cell_RM['posy']);
            }
            $this->Pdf->Cell($cell_RM['width'], 0, $cell_RM['data'], 0, 0, $cell_RM['align']);

            $this->Pdf->SetFont($cell_usia['font_type'], $cell_usia['font_style'], $cell_usia['font_size']);
            $this->pdf_text_color($cell_usia['data'], $cell_usia['color_r'], $cell_usia['color_g'], $cell_usia['color_b']);
            if (!empty($cell_usia['posx']) && !empty($cell_usia['posy']))
            {
                $this->Pdf->SetXY($cell_usia['posx'], $cell_usia['posy']);
            }
            elseif (!empty($cell_usia['posx']))
            {
                $this->Pdf->SetX($cell_usia['posx']);
            }
            elseif (!empty($cell_usia['posy']))
            {
                $this->Pdf->SetY($cell_usia['posy']);
            }
            $this->Pdf->Cell($cell_usia['width'], 0, $cell_usia['data'], 0, 0, $cell_usia['align']);

            $this->Pdf->SetFont($cell_dokter['font_type'], $cell_dokter['font_style'], $cell_dokter['font_size']);
            $this->pdf_text_color($cell_dokter['data'], $cell_dokter['color_r'], $cell_dokter['color_g'], $cell_dokter['color_b']);
            if (!empty($cell_dokter['posx']) && !empty($cell_dokter['posy']))
            {
                $this->Pdf->SetXY($cell_dokter['posx'], $cell_dokter['posy']);
            }
            elseif (!empty($cell_dokter['posx']))
            {
                $this->Pdf->SetX($cell_dokter['posx']);
            }
            elseif (!empty($cell_dokter['posy']))
            {
                $this->Pdf->SetY($cell_dokter['posy']);
            }
            $this->Pdf->Cell($cell_dokter['width'], 0, $cell_dokter['data'], 0, 0, $cell_dokter['align']);

            $this->Pdf->SetFont($cell_trandate['font_type'], $cell_trandate['font_style'], $cell_trandate['font_size']);
            $this->pdf_text_color($cell_trandate['data'], $cell_trandate['color_r'], $cell_trandate['color_g'], $cell_trandate['color_b']);
            if (!empty($cell_trandate['posx']) && !empty($cell_trandate['posy']))
            {
                $this->Pdf->SetXY($cell_trandate['posx'], $cell_trandate['posy']);
            }
            elseif (!empty($cell_trandate['posx']))
            {
                $this->Pdf->SetX($cell_trandate['posx']);
            }
            elseif (!empty($cell_trandate['posy']))
            {
                $this->Pdf->SetY($cell_trandate['posy']);
            }
            $this->Pdf->Cell($cell_trandate['width'], 0, $cell_trandate['data'], 0, 0, $cell_trandate['align']);

            $this->Pdf->SetFont($cell_finishdate['font_type'], $cell_finishdate['font_style'], $cell_finishdate['font_size']);
            $this->pdf_text_color($cell_finishdate['data'], $cell_finishdate['color_r'], $cell_finishdate['color_g'], $cell_finishdate['color_b']);
            if (!empty($cell_finishdate['posx']) && !empty($cell_finishdate['posy']))
            {
                $this->Pdf->SetXY($cell_finishdate['posx'], $cell_finishdate['posy']);
            }
            elseif (!empty($cell_finishdate['posx']))
            {
                $this->Pdf->SetX($cell_finishdate['posx']);
            }
            elseif (!empty($cell_finishdate['posy']))
            {
                $this->Pdf->SetY($cell_finishdate['posy']);
            }
            $this->Pdf->Cell($cell_finishdate['width'], 0, $cell_finishdate['data'], 0, 0, $cell_finishdate['align']);

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

            $this->Pdf->SetFont($cell_login['font_type'], $cell_login['font_style'], $cell_login['font_size']);
            $this->pdf_text_color($cell_login['data'], $cell_login['color_r'], $cell_login['color_g'], $cell_login['color_b']);
            if (!empty($cell_login['posx']) && !empty($cell_login['posy']))
            {
                $this->Pdf->SetXY($cell_login['posx'], $cell_login['posy']);
            }
            elseif (!empty($cell_login['posx']))
            {
                $this->Pdf->SetX($cell_login['posx']);
            }
            elseif (!empty($cell_login['posy']))
            {
                $this->Pdf->SetY($cell_login['posy']);
            }
            $this->Pdf->Cell($cell_login['width'], 0, $cell_login['data'], 0, 0, $cell_login['align']);

            $this->Pdf->SetFont($cell_nama['font_type'], $cell_nama['font_style'], $cell_nama['font_size']);
            $this->pdf_text_color($cell_nama['data'], $cell_nama['color_r'], $cell_nama['color_g'], $cell_nama['color_b']);
            if (!empty($cell_nama['posx']) && !empty($cell_nama['posy']))
            {
                $this->Pdf->SetXY($cell_nama['posx'], $cell_nama['posy']);
            }
            elseif (!empty($cell_nama['posx']))
            {
                $this->Pdf->SetX($cell_nama['posx']);
            }
            elseif (!empty($cell_nama['posy']))
            {
                $this->Pdf->SetY($cell_nama['posy']);
            }
            $this->Pdf->Cell($cell_nama['width'], 0, $cell_nama['data'], 0, 0, $cell_nama['align']);

            $this->Pdf->SetFont($cell_jk['font_type'], $cell_jk['font_style'], $cell_jk['font_size']);
            $this->pdf_text_color($cell_jk['data'], $cell_jk['color_r'], $cell_jk['color_g'], $cell_jk['color_b']);
            if (!empty($cell_jk['posx']) && !empty($cell_jk['posy']))
            {
                $this->Pdf->SetXY($cell_jk['posx'], $cell_jk['posy']);
            }
            elseif (!empty($cell_jk['posx']))
            {
                $this->Pdf->SetX($cell_jk['posx']);
            }
            elseif (!empty($cell_jk['posy']))
            {
                $this->Pdf->SetY($cell_jk['posy']);
            }
            $this->Pdf->Cell($cell_jk['width'], 0, $cell_jk['data'], 0, 0, $cell_jk['align']);

            $this->Pdf->SetY(83);
            foreach ($this->sub[$this->nm_grid_colunas] as $NM_ind => $Dados)
            {
                $this->Pdf->SetFont($cell_sub_subname['font_type'], $cell_sub_subname['font_style'], $cell_sub_subname['font_size']);
                if (!empty($cell_sub_subname['posx']))
                {
                    $this->Pdf->SetX($cell_sub_subname['posx']);
                }
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->SetTextColor($cell_sub_subname['color_r'], $cell_sub_subname['color_g'], $cell_sub_subname['color_b']);
                $this->Pdf->writeHTMLCell($cell_sub_subname['width'], 0, $atu_X, $atu_Y, $this->sub_subname[$this->nm_grid_colunas][$NM_ind], 0, 0, false, true, $cell_sub_subname['align']);
                $this->Pdf->SetY($atu_Y);
                $this->Pdf->SetFont($cell_sub_hasil['font_type'], $cell_sub_hasil['font_style'], $cell_sub_hasil['font_size']);
                if (!empty($cell_sub_hasil['posx']))
                {
                    $this->Pdf->SetX($cell_sub_hasil['posx']);
                }
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->SetTextColor($cell_sub_hasil['color_r'], $cell_sub_hasil['color_g'], $cell_sub_hasil['color_b']);
                $this->Pdf->writeHTMLCell($cell_sub_hasil['width'], 0, $atu_X, $atu_Y, $this->sub_hasil[$this->nm_grid_colunas][$NM_ind], 0, 0, false, true, $cell_sub_hasil['align']);
                $this->Pdf->SetY($atu_Y);
                $this->Pdf->SetFont($cell_sub_satuan['font_type'], $cell_sub_satuan['font_style'], $cell_sub_satuan['font_size']);
                if (!empty($cell_sub_satuan['posx']))
                {
                    $this->Pdf->SetX($cell_sub_satuan['posx']);
                }
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->SetTextColor($cell_sub_satuan['color_r'], $cell_sub_satuan['color_g'], $cell_sub_satuan['color_b']);
                $this->Pdf->writeHTMLCell($cell_sub_satuan['width'], 0, $atu_X, $atu_Y, $this->sub_satuan[$this->nm_grid_colunas][$NM_ind], 0, 0, false, true, $cell_sub_satuan['align']);
                $this->Pdf->SetY($atu_Y);
                $this->Pdf->SetFont($cell_sub_marked['font_type'], $cell_sub_marked['font_style'], $cell_sub_marked['font_size']);
                if (!empty($cell_sub_marked['posx']))
                {
                    $this->Pdf->SetX($cell_sub_marked['posx']);
                }
                $this->pdf_text_color($this->sub_marked[$this->nm_grid_colunas][$NM_ind], $cell_sub_marked['color_r'], $cell_sub_marked['color_g'], $cell_sub_marked['color_b']);
                $this->Pdf->Cell($cell_sub_marked['width'], 0, $this->sub_marked[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_sub_marked['align']);
                $this->Pdf->SetFont($cell_sub_rujukan['font_type'], $cell_sub_rujukan['font_style'], $cell_sub_rujukan['font_size']);
                if (!empty($cell_sub_rujukan['posx']))
                {
                    $this->Pdf->SetX($cell_sub_rujukan['posx']);
                }
                $this->pdf_text_color($this->sub_rujukan[$this->nm_grid_colunas][$NM_ind], $cell_sub_rujukan['color_r'], $cell_sub_rujukan['color_g'], $cell_sub_rujukan['color_b']);
                $this->Pdf->Cell($cell_sub_rujukan['width'], 0, $this->sub_rujukan[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_sub_rujukan['align']);
                if (!isset($max_Y) || empty($max_Y) || $this->Pdf->GetY() < $max_Y )
                {
                    $max_Y = $this->Pdf->GetY();
                }
                $max_Y += 5;
                $this->Pdf->SetY($max_Y);

            }

            $this->Pdf->SetFont($cell_dpjp['font_type'], $cell_dpjp['font_style'], $cell_dpjp['font_size']);
            $this->pdf_text_color($cell_dpjp['data'], $cell_dpjp['color_r'], $cell_dpjp['color_g'], $cell_dpjp['color_b']);
            if (!empty($cell_dpjp['posx']) && !empty($cell_dpjp['posy']))
            {
                $this->Pdf->SetXY($cell_dpjp['posx'], $cell_dpjp['posy']);
            }
            elseif (!empty($cell_dpjp['posx']))
            {
                $this->Pdf->SetX($cell_dpjp['posx']);
            }
            elseif (!empty($cell_dpjp['posy']))
            {
                $this->Pdf->SetY($cell_dpjp['posy']);
            }
            $this->Pdf->Cell($cell_dpjp['width'], 0, $cell_dpjp['data'], 0, 0, $cell_dpjp['align']);

            $this->Pdf->SetFont($cell_tl['font_type'], $cell_tl['font_style'], $cell_tl['font_size']);
            $this->pdf_text_color($cell_tl['data'], $cell_tl['color_r'], $cell_tl['color_g'], $cell_tl['color_b']);
            if (!empty($cell_tl['posx']) && !empty($cell_tl['posy']))
            {
                $this->Pdf->SetXY($cell_tl['posx'], $cell_tl['posy']);
            }
            elseif (!empty($cell_tl['posx']))
            {
                $this->Pdf->SetX($cell_tl['posx']);
            }
            elseif (!empty($cell_tl['posy']))
            {
                $this->Pdf->SetY($cell_tl['posy']);
            }
            $this->Pdf->Cell($cell_tl['width'], 0, $cell_tl['data'], 0, 0, $cell_tl['align']);

            $this->Pdf->SetFont($cell_dr_ex['font_type'], $cell_dr_ex['font_style'], $cell_dr_ex['font_size']);
            $this->pdf_text_color($cell_dr_ex['data'], $cell_dr_ex['color_r'], $cell_dr_ex['color_g'], $cell_dr_ex['color_b']);
            if (!empty($cell_dr_ex['posx']) && !empty($cell_dr_ex['posy']))
            {
                $this->Pdf->SetXY($cell_dr_ex['posx'], $cell_dr_ex['posy']);
            }
            elseif (!empty($cell_dr_ex['posx']))
            {
                $this->Pdf->SetX($cell_dr_ex['posx']);
            }
            elseif (!empty($cell_dr_ex['posy']))
            {
                $this->Pdf->SetY($cell_dr_ex['posy']);
            }
            $this->Pdf->Cell($cell_dr_ex['width'], 0, $cell_dr_ex['data'], 0, 0, $cell_dr_ex['align']);

            $this->Pdf->SetFont($cell_asal['font_type'], $cell_asal['font_style'], $cell_asal['font_size']);
            $this->pdf_text_color($cell_asal['data'], $cell_asal['color_r'], $cell_asal['color_g'], $cell_asal['color_b']);
            if (!empty($cell_asal['posx']) && !empty($cell_asal['posy']))
            {
                $this->Pdf->SetXY($cell_asal['posx'], $cell_asal['posy']);
            }
            elseif (!empty($cell_asal['posx']))
            {
                $this->Pdf->SetX($cell_asal['posx']);
            }
            elseif (!empty($cell_asal['posy']))
            {
                $this->Pdf->SetY($cell_asal['posy']);
            }
            $this->Pdf->Cell($cell_asal['width'], 0, $cell_asal['data'], 0, 0, $cell_asal['align']);

            $this->Pdf->SetY(83);
            foreach ($this->sub[$this->nm_grid_colunas] as $NM_ind => $Dados)
            {
                $this->Pdf->SetFont($cell_sub_kategori['font_type'], $cell_sub_kategori['font_style'], $cell_sub_kategori['font_size']);
                if (!empty($cell_sub_kategori['posx']))
                {
                    $this->Pdf->SetX($cell_sub_kategori['posx']);
                }
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->SetTextColor($cell_sub_kategori['color_r'], $cell_sub_kategori['color_g'], $cell_sub_kategori['color_b']);
                $this->Pdf->writeHTMLCell($cell_sub_kategori['width'], 0, $atu_X, $atu_Y, $this->sub_kategori[$this->nm_grid_colunas][$NM_ind], 0, 0, false, true, $cell_sub_kategori['align']);
                $this->Pdf->SetY($atu_Y);
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
