<?php
class print_etiket9_grid
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
   var $array_sc_field_0 = array();
   var $array_ed = array();
   var $array_nama = array();
   var $array_tgl_lahir = array();
   var $sc_field_0 = array();
   var $ed = array();
   var $exp = array();
   var $nama = array();
   var $qty = array();
   var $rsia = array();
   var $sehari = array();
   var $tgl_lahir = array();
   var $id = array();
   var $trancode = array();
   var $item = array();
   var $satuan = array();
   var $jumlah = array();
   var $aturanpakai1 = array();
   var $aturanpakai2 = array();
   var $jenisaturanpakai = array();
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
   $this->default_style    = 'B';
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
   $_SESSION['scriptcase']['print_etiket9']['default_font'] = $this->default_font;
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
           if (in_array("print_etiket9", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['campos_busca'];
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
       $this->trancode[0] = $Busca_temp['trancode']; 
       $tmp_pos = strpos($this->trancode[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->trancode[0]))
       {
           $this->trancode[0] = substr($this->trancode[0], 0, $tmp_pos);
       }
       $this->item[0] = $Busca_temp['item']; 
       $tmp_pos = strpos($this->item[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->item[0]))
       {
           $this->item[0] = substr($this->item[0], 0, $tmp_pos);
       }
       $this->satuan[0] = $Busca_temp['satuan']; 
       $tmp_pos = strpos($this->satuan[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->satuan[0]))
       {
           $this->satuan[0] = substr($this->satuan[0], 0, $tmp_pos);
       }
       $this->aturanpakai2[0] = $Busca_temp['aturanpakai2']; 
       $tmp_pos = strpos($this->aturanpakai2[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->aturanpakai2[0]))
       {
           $this->aturanpakai2[0] = substr($this->aturanpakai2[0], 0, $tmp_pos);
       }
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['print_etiket9']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['print_etiket9']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['print_etiket9']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['print_etiket9']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['where_orig'] = " where id = '" . $_SESSION['var_etiket'] . "'";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT id, tranCode, item, satuan, jumlah, aturanPakai1, aturanPakai2, jenisAturanPakai from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT id, tranCode, item, satuan, jumlah, aturanPakai1, aturanPakai2, jenisAturanPakai from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT id, tranCode, item, satuan, jumlah, aturanPakai1, aturanPakai2, jenisAturanPakai from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT id, tranCode, item, satuan, jumlah, aturanPakai1, aturanPakai2, jenisAturanPakai from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT id, tranCode, item, satuan, jumlah, aturanPakai1, aturanPakai2, jenisAturanPakai from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT id, tranCode, item, satuan, jumlah, aturanPakai1, aturanPakai2, jenisAturanPakai from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['order_grid'] = $nmgp_order_by;
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
   $this->Pdf->Image($this->NM_raiz_img . $this->Ini->path_img_global . "/grp__NM__bg__NM__etiket9.jpg", "0.000000", "0.000000", "210", "297", '', '', '', false, 300, '', false, false, 0);
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['labels']['id'] = "Id";
   $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['labels']['trancode'] = "Tran Code";
   $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['labels']['item'] = "Item";
   $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['labels']['satuan'] = "Satuan";
   $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['labels']['jumlah'] = "Jumlah";
   $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['labels']['aturanpakai1'] = "Aturan Pakai 1";
   $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['labels']['aturanpakai2'] = "Aturan Pakai 2";
   $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['labels']['jenisaturanpakai'] = "Jenis Aturan Pakai";
   $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['labels']['sc_field_0'] = "Nama Obat";
   $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['labels']['ed'] = "ed";
   $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['labels']['exp'] = "exp";
   $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['labels']['nama'] = "nama";
   $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['labels']['qty'] = "qty";
   $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['labels']['rsia'] = "rsia";
   $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['labels']['sehari'] = "sehari";
   $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['labels']['tgl_lahir'] = "tgl_lahir";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['print_etiket9']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['print_etiket9']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['print_etiket9']['lig_edit'];
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
       $this->Pdf->Text(10, 10, html_entity_decode($this->nm_grid_sem_reg, ENT_COMPAT, $_SESSION['scriptcase']['charset']));
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
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['print_etiket9']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->id[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->id[$this->nm_grid_colunas] = (string)$this->id[$this->nm_grid_colunas];
          $this->trancode[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->item[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->satuan[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->jumlah[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->jumlah[$this->nm_grid_colunas] = (string)$this->jumlah[$this->nm_grid_colunas];
          $this->aturanpakai1[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->aturanpakai1[$this->nm_grid_colunas] = (string)$this->aturanpakai1[$this->nm_grid_colunas];
          $this->aturanpakai2[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->aturanpakai2[$this->nm_grid_colunas] = (string)$this->aturanpakai2[$this->nm_grid_colunas];
          $this->jenisaturanpakai[$this->nm_grid_colunas] = $this->rs_grid->fields[7] ;  
          $this->sc_field_0[$this->nm_grid_colunas] = "";
          $this->ed[$this->nm_grid_colunas] = "";
          $this->exp[$this->nm_grid_colunas] = "";
          $this->nama[$this->nm_grid_colunas] = "";
          $this->qty[$this->nm_grid_colunas] = "";
          $this->rsia[$this->nm_grid_colunas] = "";
          $this->sehari[$this->nm_grid_colunas] = "";
          $this->tgl_lahir[$this->nm_grid_colunas] = "";
          $this->Lookup->lookup_sc_field_0($this->sc_field_0[$this->nm_grid_colunas], $this->item[$this->nm_grid_colunas], $this->array_sc_field_0); 
          $this->Lookup->lookup_ed($this->ed[$this->nm_grid_colunas], $this->item[$this->nm_grid_colunas], $this->array_ed); 
          $this->Lookup->lookup_nama($this->nama[$this->nm_grid_colunas], $this->trancode[$this->nm_grid_colunas], $this->array_nama); 
          $this->Lookup->lookup_tgl_lahir($this->tgl_lahir[$this->nm_grid_colunas], $this->trancode[$this->nm_grid_colunas], $this->array_tgl_lahir); 
          $_SESSION['scriptcase']['print_etiket9']['contr_erro'] = 'on';
 $this->sehari[$this->nm_grid_colunas]  = 'x sehari';
$this->rsia[$this->nm_grid_colunas]  = 'INSTALASI FARMASI RSIA PP';
$this->qty[$this->nm_grid_colunas]  = 'Qty :';
$this->exp[$this->nm_grid_colunas]  = 'Kadaluarsa: ';
$_SESSION['scriptcase']['print_etiket9']['contr_erro'] = 'off';
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
          $this->Lookup->lookup_trancode($this->trancode[$this->nm_grid_colunas] , $this->trancode[$this->nm_grid_colunas]) ; 
          $this->trancode[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->trancode[$this->nm_grid_colunas]);
          $this->item[$this->nm_grid_colunas] = sc_strip_script($this->item[$this->nm_grid_colunas]);
          if ($this->item[$this->nm_grid_colunas] === "") 
          { 
              $this->item[$this->nm_grid_colunas] = "" ;  
          } 
          $this->item[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->item[$this->nm_grid_colunas]);
          $this->satuan[$this->nm_grid_colunas] = sc_strip_script($this->satuan[$this->nm_grid_colunas]);
          if ($this->satuan[$this->nm_grid_colunas] === "") 
          { 
              $this->satuan[$this->nm_grid_colunas] = "" ;  
          } 
          $this->satuan[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->satuan[$this->nm_grid_colunas]);
          $this->jumlah[$this->nm_grid_colunas] = sc_strip_script($this->jumlah[$this->nm_grid_colunas]);
          if ($this->jumlah[$this->nm_grid_colunas] === "") 
          { 
              $this->jumlah[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->jumlah[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->jumlah[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->jumlah[$this->nm_grid_colunas]);
          $this->aturanpakai1[$this->nm_grid_colunas] = sc_strip_script($this->aturanpakai1[$this->nm_grid_colunas]);
          if ($this->aturanpakai1[$this->nm_grid_colunas] === "") 
          { 
              $this->aturanpakai1[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->aturanpakai1[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->aturanpakai1[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->aturanpakai1[$this->nm_grid_colunas]);
          $this->aturanpakai2[$this->nm_grid_colunas] = sc_strip_script($this->aturanpakai2[$this->nm_grid_colunas]);
          if ($this->aturanpakai2[$this->nm_grid_colunas] === "") 
          { 
              $this->aturanpakai2[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->aturanpakai2[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->aturanpakai2[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->aturanpakai2[$this->nm_grid_colunas]);
          $this->jenisaturanpakai[$this->nm_grid_colunas] = sc_strip_script($this->jenisaturanpakai[$this->nm_grid_colunas]);
          if ($this->jenisaturanpakai[$this->nm_grid_colunas] === "") 
          { 
              $this->jenisaturanpakai[$this->nm_grid_colunas] = "" ;  
          } 
          $this->jenisaturanpakai[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->jenisaturanpakai[$this->nm_grid_colunas]);
          $this->Lookup->lookup_sc_field_0($this->sc_field_0[$this->nm_grid_colunas], $this->item[$this->nm_grid_colunas], $this->array_sc_field_0); 
          $this->sc_field_0[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->sc_field_0[$this->nm_grid_colunas]);
          $this->Lookup->lookup_ed($this->ed[$this->nm_grid_colunas], $this->item[$this->nm_grid_colunas], $this->array_ed); 
          $this->ed[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->ed[$this->nm_grid_colunas]);
          if ($this->exp[$this->nm_grid_colunas] === "") 
          { 
              $this->exp[$this->nm_grid_colunas] = "" ;  
          } 
          $this->exp[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->exp[$this->nm_grid_colunas]);
          $this->Lookup->lookup_nama($this->nama[$this->nm_grid_colunas], $this->trancode[$this->nm_grid_colunas], $this->array_nama); 
          $this->nama[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->nama[$this->nm_grid_colunas]);
          if ($this->qty[$this->nm_grid_colunas] === "") 
          { 
              $this->qty[$this->nm_grid_colunas] = "" ;  
          } 
          $this->qty[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->qty[$this->nm_grid_colunas]);
          if ($this->rsia[$this->nm_grid_colunas] === "") 
          { 
              $this->rsia[$this->nm_grid_colunas] = "" ;  
          } 
          $this->rsia[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->rsia[$this->nm_grid_colunas]);
          if ($this->sehari[$this->nm_grid_colunas] === "") 
          { 
              $this->sehari[$this->nm_grid_colunas] = "" ;  
          } 
          $this->sehari[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->sehari[$this->nm_grid_colunas]);
          $this->Lookup->lookup_tgl_lahir($this->tgl_lahir[$this->nm_grid_colunas], $this->trancode[$this->nm_grid_colunas], $this->array_tgl_lahir); 
          $this->tgl_lahir[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tgl_lahir[$this->nm_grid_colunas]);
            $cell_tranCode = array('posx' => '6', 'posy' => '174', 'data' => $this->trancode[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '255', 'color_g'    => '255', 'color_b'    => '255', 'font_style' => $this->default_style);
            $cell_satuan = array('posx' => '11', 'posy' => '190', 'data' => $this->satuan[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_jumlah = array('posx' => '43', 'posy' => '187', 'data' => $this->jumlah[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_aturanPakai1 = array('posx' => '6', 'posy' => '185.5', 'data' => $this->aturanpakai1[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_aturanPakai2 = array('posx' => '6', 'posy' => '190', 'data' => $this->aturanpakai2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_jenisAturanPakai = array('posx' => '6', 'posy' => '195', 'data' => $this->jenisaturanpakai[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sehari = array('posx' => '11', 'posy' => '185.5', 'data' => $this->sehari[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_nama = array('posx' => '6', 'posy' => '169', 'data' => $this->nama[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '255', 'color_g'    => '255', 'color_b'    => '255', 'font_style' => $this->default_style);
            $cell_tgl_lahir = array('posx' => '55', 'posy' => '174', 'data' => $this->tgl_lahir[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '255', 'color_g'    => '255', 'color_b'    => '255', 'font_style' => $this->default_style);
            $cell_rsia = array('posx' => '13', 'posy' => '200.5', 'data' => $this->rsia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_qty = array('posx' => '33', 'posy' => '187', 'data' => $this->qty[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_ed = array('posx' => '55', 'posy' => '192', 'data' => $this->ed[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_exp = array('posx' => '55', 'posy' => '187', 'data' => $this->exp[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_0 = array('posx' => '6', 'posy' => '180', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);


            $this->Pdf->SetFont($cell_tranCode['font_type'], $cell_tranCode['font_style'], $cell_tranCode['font_size']);
            $this->pdf_text_color($cell_tranCode['data'], $cell_tranCode['color_r'], $cell_tranCode['color_g'], $cell_tranCode['color_b']);
            if (!empty($cell_tranCode['posx']) && !empty($cell_tranCode['posy']))
            {
                $this->Pdf->SetXY($cell_tranCode['posx'], $cell_tranCode['posy']);
            }
            elseif (!empty($cell_tranCode['posx']))
            {
                $this->Pdf->SetX($cell_tranCode['posx']);
            }
            elseif (!empty($cell_tranCode['posy']))
            {
                $this->Pdf->SetY($cell_tranCode['posy']);
            }
            $this->Pdf->Cell($cell_tranCode['width'], 0, $cell_tranCode['data'], 0, 0, $cell_tranCode['align']);

            $this->Pdf->SetFont($cell_satuan['font_type'], $cell_satuan['font_style'], $cell_satuan['font_size']);
            $this->pdf_text_color($cell_satuan['data'], $cell_satuan['color_r'], $cell_satuan['color_g'], $cell_satuan['color_b']);
            if (!empty($cell_satuan['posx']) && !empty($cell_satuan['posy']))
            {
                $this->Pdf->SetXY($cell_satuan['posx'], $cell_satuan['posy']);
            }
            elseif (!empty($cell_satuan['posx']))
            {
                $this->Pdf->SetX($cell_satuan['posx']);
            }
            elseif (!empty($cell_satuan['posy']))
            {
                $this->Pdf->SetY($cell_satuan['posy']);
            }
            $this->Pdf->Cell($cell_satuan['width'], 0, $cell_satuan['data'], 0, 0, $cell_satuan['align']);

            $this->Pdf->SetFont($cell_jumlah['font_type'], $cell_jumlah['font_style'], $cell_jumlah['font_size']);
            $this->pdf_text_color($cell_jumlah['data'], $cell_jumlah['color_r'], $cell_jumlah['color_g'], $cell_jumlah['color_b']);
            if (!empty($cell_jumlah['posx']) && !empty($cell_jumlah['posy']))
            {
                $this->Pdf->SetXY($cell_jumlah['posx'], $cell_jumlah['posy']);
            }
            elseif (!empty($cell_jumlah['posx']))
            {
                $this->Pdf->SetX($cell_jumlah['posx']);
            }
            elseif (!empty($cell_jumlah['posy']))
            {
                $this->Pdf->SetY($cell_jumlah['posy']);
            }
            $this->Pdf->Cell($cell_jumlah['width'], 0, $cell_jumlah['data'], 0, 0, $cell_jumlah['align']);

            $this->Pdf->SetFont($cell_aturanPakai1['font_type'], $cell_aturanPakai1['font_style'], $cell_aturanPakai1['font_size']);
            $this->pdf_text_color($cell_aturanPakai1['data'], $cell_aturanPakai1['color_r'], $cell_aturanPakai1['color_g'], $cell_aturanPakai1['color_b']);
            if (!empty($cell_aturanPakai1['posx']) && !empty($cell_aturanPakai1['posy']))
            {
                $this->Pdf->SetXY($cell_aturanPakai1['posx'], $cell_aturanPakai1['posy']);
            }
            elseif (!empty($cell_aturanPakai1['posx']))
            {
                $this->Pdf->SetX($cell_aturanPakai1['posx']);
            }
            elseif (!empty($cell_aturanPakai1['posy']))
            {
                $this->Pdf->SetY($cell_aturanPakai1['posy']);
            }
            $this->Pdf->Cell($cell_aturanPakai1['width'], 0, $cell_aturanPakai1['data'], 0, 0, $cell_aturanPakai1['align']);

            $this->Pdf->SetFont($cell_aturanPakai2['font_type'], $cell_aturanPakai2['font_style'], $cell_aturanPakai2['font_size']);
            $this->pdf_text_color($cell_aturanPakai2['data'], $cell_aturanPakai2['color_r'], $cell_aturanPakai2['color_g'], $cell_aturanPakai2['color_b']);
            if (!empty($cell_aturanPakai2['posx']) && !empty($cell_aturanPakai2['posy']))
            {
                $this->Pdf->SetXY($cell_aturanPakai2['posx'], $cell_aturanPakai2['posy']);
            }
            elseif (!empty($cell_aturanPakai2['posx']))
            {
                $this->Pdf->SetX($cell_aturanPakai2['posx']);
            }
            elseif (!empty($cell_aturanPakai2['posy']))
            {
                $this->Pdf->SetY($cell_aturanPakai2['posy']);
            }
            $this->Pdf->Cell($cell_aturanPakai2['width'], 0, $cell_aturanPakai2['data'], 0, 0, $cell_aturanPakai2['align']);

            $this->Pdf->SetFont($cell_jenisAturanPakai['font_type'], $cell_jenisAturanPakai['font_style'], $cell_jenisAturanPakai['font_size']);
            $this->pdf_text_color($cell_jenisAturanPakai['data'], $cell_jenisAturanPakai['color_r'], $cell_jenisAturanPakai['color_g'], $cell_jenisAturanPakai['color_b']);
            if (!empty($cell_jenisAturanPakai['posx']) && !empty($cell_jenisAturanPakai['posy']))
            {
                $this->Pdf->SetXY($cell_jenisAturanPakai['posx'], $cell_jenisAturanPakai['posy']);
            }
            elseif (!empty($cell_jenisAturanPakai['posx']))
            {
                $this->Pdf->SetX($cell_jenisAturanPakai['posx']);
            }
            elseif (!empty($cell_jenisAturanPakai['posy']))
            {
                $this->Pdf->SetY($cell_jenisAturanPakai['posy']);
            }
            $this->Pdf->Cell($cell_jenisAturanPakai['width'], 0, $cell_jenisAturanPakai['data'], 0, 0, $cell_jenisAturanPakai['align']);

            $this->Pdf->SetFont($cell_sehari['font_type'], $cell_sehari['font_style'], $cell_sehari['font_size']);
            $this->pdf_text_color($cell_sehari['data'], $cell_sehari['color_r'], $cell_sehari['color_g'], $cell_sehari['color_b']);
            if (!empty($cell_sehari['posx']) && !empty($cell_sehari['posy']))
            {
                $this->Pdf->SetXY($cell_sehari['posx'], $cell_sehari['posy']);
            }
            elseif (!empty($cell_sehari['posx']))
            {
                $this->Pdf->SetX($cell_sehari['posx']);
            }
            elseif (!empty($cell_sehari['posy']))
            {
                $this->Pdf->SetY($cell_sehari['posy']);
            }
            $this->Pdf->Cell($cell_sehari['width'], 0, $cell_sehari['data'], 0, 0, $cell_sehari['align']);

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

            $this->Pdf->SetFont($cell_tgl_lahir['font_type'], $cell_tgl_lahir['font_style'], $cell_tgl_lahir['font_size']);
            $this->pdf_text_color($cell_tgl_lahir['data'], $cell_tgl_lahir['color_r'], $cell_tgl_lahir['color_g'], $cell_tgl_lahir['color_b']);
            if (!empty($cell_tgl_lahir['posx']) && !empty($cell_tgl_lahir['posy']))
            {
                $this->Pdf->SetXY($cell_tgl_lahir['posx'], $cell_tgl_lahir['posy']);
            }
            elseif (!empty($cell_tgl_lahir['posx']))
            {
                $this->Pdf->SetX($cell_tgl_lahir['posx']);
            }
            elseif (!empty($cell_tgl_lahir['posy']))
            {
                $this->Pdf->SetY($cell_tgl_lahir['posy']);
            }
            $this->Pdf->Cell($cell_tgl_lahir['width'], 0, $cell_tgl_lahir['data'], 0, 0, $cell_tgl_lahir['align']);

            $this->Pdf->SetFont($cell_rsia['font_type'], $cell_rsia['font_style'], $cell_rsia['font_size']);
            $this->pdf_text_color($cell_rsia['data'], $cell_rsia['color_r'], $cell_rsia['color_g'], $cell_rsia['color_b']);
            if (!empty($cell_rsia['posx']) && !empty($cell_rsia['posy']))
            {
                $this->Pdf->SetXY($cell_rsia['posx'], $cell_rsia['posy']);
            }
            elseif (!empty($cell_rsia['posx']))
            {
                $this->Pdf->SetX($cell_rsia['posx']);
            }
            elseif (!empty($cell_rsia['posy']))
            {
                $this->Pdf->SetY($cell_rsia['posy']);
            }
            $this->Pdf->Cell($cell_rsia['width'], 0, $cell_rsia['data'], 0, 0, $cell_rsia['align']);

            $this->Pdf->SetFont($cell_qty['font_type'], $cell_qty['font_style'], $cell_qty['font_size']);
            $this->pdf_text_color($cell_qty['data'], $cell_qty['color_r'], $cell_qty['color_g'], $cell_qty['color_b']);
            if (!empty($cell_qty['posx']) && !empty($cell_qty['posy']))
            {
                $this->Pdf->SetXY($cell_qty['posx'], $cell_qty['posy']);
            }
            elseif (!empty($cell_qty['posx']))
            {
                $this->Pdf->SetX($cell_qty['posx']);
            }
            elseif (!empty($cell_qty['posy']))
            {
                $this->Pdf->SetY($cell_qty['posy']);
            }
            $this->Pdf->Cell($cell_qty['width'], 0, $cell_qty['data'], 0, 0, $cell_qty['align']);

            $this->Pdf->SetFont($cell_ed['font_type'], $cell_ed['font_style'], $cell_ed['font_size']);
            $this->pdf_text_color($cell_ed['data'], $cell_ed['color_r'], $cell_ed['color_g'], $cell_ed['color_b']);
            if (!empty($cell_ed['posx']) && !empty($cell_ed['posy']))
            {
                $this->Pdf->SetXY($cell_ed['posx'], $cell_ed['posy']);
            }
            elseif (!empty($cell_ed['posx']))
            {
                $this->Pdf->SetX($cell_ed['posx']);
            }
            elseif (!empty($cell_ed['posy']))
            {
                $this->Pdf->SetY($cell_ed['posy']);
            }
            $this->Pdf->Cell($cell_ed['width'], 0, $cell_ed['data'], 0, 0, $cell_ed['align']);

            $this->Pdf->SetFont($cell_exp['font_type'], $cell_exp['font_style'], $cell_exp['font_size']);
            $this->pdf_text_color($cell_exp['data'], $cell_exp['color_r'], $cell_exp['color_g'], $cell_exp['color_b']);
            if (!empty($cell_exp['posx']) && !empty($cell_exp['posy']))
            {
                $this->Pdf->SetXY($cell_exp['posx'], $cell_exp['posy']);
            }
            elseif (!empty($cell_exp['posx']))
            {
                $this->Pdf->SetX($cell_exp['posx']);
            }
            elseif (!empty($cell_exp['posy']))
            {
                $this->Pdf->SetY($cell_exp['posy']);
            }
            $this->Pdf->Cell($cell_exp['width'], 0, $cell_exp['data'], 0, 0, $cell_exp['align']);

            $this->Pdf->SetFont($cell_sc_field_0['font_type'], $cell_sc_field_0['font_style'], $cell_sc_field_0['font_size']);
            $this->pdf_text_color($cell_sc_field_0['data'], $cell_sc_field_0['color_r'], $cell_sc_field_0['color_g'], $cell_sc_field_0['color_b']);
            if (!empty($cell_sc_field_0['posx']) && !empty($cell_sc_field_0['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_0['posx'], $cell_sc_field_0['posy']);
            }
            elseif (!empty($cell_sc_field_0['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_0['posx']);
            }
            elseif (!empty($cell_sc_field_0['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_0['posy']);
            }
            $this->Pdf->Cell($cell_sc_field_0['width'], 0, $cell_sc_field_0['data'], 0, 0, $cell_sc_field_0['align']);

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
