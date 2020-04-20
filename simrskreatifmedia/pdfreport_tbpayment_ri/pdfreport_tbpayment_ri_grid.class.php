<?php
class pdfreport_tbpayment_ri_grid
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
   var $id = array();
   var $trancode = array();
   var $custcode = array();
   var $dokter = array();
   var $jmltagihan = array();
   var $jmlbayar = array();
   var $deposit = array();
   var $potongan = array();
   var $hrsdibayar = array();
   var $trandate = array();
   var $terimadari = array();
   var $jenispayment = array();
   var $instansipenjamin = array();
   var $bankdebit = array();
   var $nokartu = array();
   var $sc_field_0 = array();
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
   $Tp_papel = array(350, 210);
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
   $_SESSION['scriptcase']['pdfreport_tbpayment_ri']['default_font'] = $this->default_font;
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
           if (in_array("pdfreport_tbpayment_ri", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['campos_busca'];
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
       $this->custcode[0] = $Busca_temp['custcode']; 
       $tmp_pos = strpos($this->custcode[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->custcode[0]))
       {
           $this->custcode[0] = substr($this->custcode[0], 0, $tmp_pos);
       }
       $this->dokter[0] = $Busca_temp['dokter']; 
       $tmp_pos = strpos($this->dokter[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->dokter[0]))
       {
           $this->dokter[0] = substr($this->dokter[0], 0, $tmp_pos);
       }
       $this->sc_field_0[0] = $Busca_temp['sc_field_0']; 
       $tmp_pos = strpos($this->sc_field_0[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->sc_field_0[0]))
       {
           $this->sc_field_0[0] = substr($this->sc_field_0[0], 0, $tmp_pos);
       }
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbpayment_ri']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbpayment_ri']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbpayment_ri']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbpayment_ri']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['where_orig'] = "";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT id, tranCode, custCode, dokter, jmlTagihan, jmlBayar, deposit, potongan, hrsDibayar, str_replace (convert(char(10),tranDate,102), '.', '-') + ' ' + convert(char(8),tranDate,20), terimaDari, jenisPayment, instansiPenjamin, bankDebit, noKartu, `Jaminan/Polis` as sc_field_0 from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT id, tranCode, custCode, dokter, jmlTagihan, jmlBayar, deposit, potongan, hrsDibayar, tranDate, terimaDari, jenisPayment, instansiPenjamin, bankDebit, noKartu, `Jaminan/Polis` as sc_field_0 from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT id, tranCode, custCode, dokter, jmlTagihan, jmlBayar, deposit, potongan, hrsDibayar, convert(char(23),tranDate,121), terimaDari, jenisPayment, instansiPenjamin, bankDebit, noKartu, `Jaminan/Polis` as sc_field_0 from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT id, tranCode, custCode, dokter, jmlTagihan, jmlBayar, deposit, potongan, hrsDibayar, tranDate, terimaDari, jenisPayment, instansiPenjamin, bankDebit, noKartu, `Jaminan/Polis` as sc_field_0 from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT id, tranCode, custCode, dokter, jmlTagihan, jmlBayar, deposit, potongan, hrsDibayar, EXTEND(tranDate, YEAR TO FRACTION), terimaDari, jenisPayment, instansiPenjamin, bankDebit, noKartu, `Jaminan/Polis` as sc_field_0 from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT id, tranCode, custCode, dokter, jmlTagihan, jmlBayar, deposit, potongan, hrsDibayar, tranDate, terimaDari, jenisPayment, instansiPenjamin, bankDebit, noKartu, `Jaminan/Polis` as sc_field_0 from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['order_grid'] = $nmgp_order_by;
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
//----- 
 function grid($linhas = 0)
 {
    global 
           $nm_saida, $nm_url_saida;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['labels']['id'] = "Id";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['labels']['trancode'] = "Tran Code";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['labels']['custcode'] = "Cust Code";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['labels']['dokter'] = "Dokter";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['labels']['jmltagihan'] = "Jml Tagihan";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['labels']['jmlbayar'] = "Jml Bayar";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['labels']['deposit'] = "Deposit";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['labels']['potongan'] = "Potongan";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['labels']['hrsdibayar'] = "Hrs Dibayar";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['labels']['trandate'] = "Tran Date";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['labels']['terimadari'] = "Terima Dari";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['labels']['jenispayment'] = "Jenis Payment";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['labels']['instansipenjamin'] = "Instansi Penjamin";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['labels']['bankdebit'] = "Bank Debit";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['labels']['nokartu'] = "No Kartu";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['labels']['sc_field_0'] = "Jaminan / Polis";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbpayment_ri']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbpayment_ri']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbpayment_ri']['lig_edit'];
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
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment_ri']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->id[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->id[$this->nm_grid_colunas] = (string)$this->id[$this->nm_grid_colunas];
          $this->trancode[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->custcode[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->dokter[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->jmltagihan[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->jmltagihan[$this->nm_grid_colunas] = (string)$this->jmltagihan[$this->nm_grid_colunas];
          $this->jmlbayar[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->jmlbayar[$this->nm_grid_colunas] = (string)$this->jmlbayar[$this->nm_grid_colunas];
          $this->deposit[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->deposit[$this->nm_grid_colunas] = (string)$this->deposit[$this->nm_grid_colunas];
          $this->potongan[$this->nm_grid_colunas] = $this->rs_grid->fields[7] ;  
          $this->potongan[$this->nm_grid_colunas] = (string)$this->potongan[$this->nm_grid_colunas];
          $this->hrsdibayar[$this->nm_grid_colunas] = $this->rs_grid->fields[8] ;  
          $this->hrsdibayar[$this->nm_grid_colunas] = (string)$this->hrsdibayar[$this->nm_grid_colunas];
          $this->trandate[$this->nm_grid_colunas] = $this->rs_grid->fields[9] ;  
          $this->terimadari[$this->nm_grid_colunas] = $this->rs_grid->fields[10] ;  
          $this->jenispayment[$this->nm_grid_colunas] = $this->rs_grid->fields[11] ;  
          $this->instansipenjamin[$this->nm_grid_colunas] = $this->rs_grid->fields[12] ;  
          $this->bankdebit[$this->nm_grid_colunas] = $this->rs_grid->fields[13] ;  
          $this->nokartu[$this->nm_grid_colunas] = $this->rs_grid->fields[14] ;  
          $this->sc_field_0[$this->nm_grid_colunas] = $this->rs_grid->fields[15] ;  
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
          $this->trancode[$this->nm_grid_colunas] = sc_strip_script($this->trancode[$this->nm_grid_colunas]);
          if ($this->trancode[$this->nm_grid_colunas] === "") 
          { 
              $this->trancode[$this->nm_grid_colunas] = "" ;  
          } 
          $this->trancode[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->trancode[$this->nm_grid_colunas]);
          $this->custcode[$this->nm_grid_colunas] = sc_strip_script($this->custcode[$this->nm_grid_colunas]);
          if ($this->custcode[$this->nm_grid_colunas] === "") 
          { 
              $this->custcode[$this->nm_grid_colunas] = "" ;  
          } 
          $this->custcode[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->custcode[$this->nm_grid_colunas]);
          $this->dokter[$this->nm_grid_colunas] = sc_strip_script($this->dokter[$this->nm_grid_colunas]);
          if ($this->dokter[$this->nm_grid_colunas] === "") 
          { 
              $this->dokter[$this->nm_grid_colunas] = "" ;  
          } 
          $this->dokter[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->dokter[$this->nm_grid_colunas]);
          $this->jmltagihan[$this->nm_grid_colunas] = sc_strip_script($this->jmltagihan[$this->nm_grid_colunas]);
          if ($this->jmltagihan[$this->nm_grid_colunas] === "") 
          { 
              $this->jmltagihan[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->jmltagihan[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->jmltagihan[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->jmltagihan[$this->nm_grid_colunas]);
          $this->jmlbayar[$this->nm_grid_colunas] = sc_strip_script($this->jmlbayar[$this->nm_grid_colunas]);
          if ($this->jmlbayar[$this->nm_grid_colunas] === "") 
          { 
              $this->jmlbayar[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->jmlbayar[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->jmlbayar[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->jmlbayar[$this->nm_grid_colunas]);
          $this->deposit[$this->nm_grid_colunas] = sc_strip_script($this->deposit[$this->nm_grid_colunas]);
          if ($this->deposit[$this->nm_grid_colunas] === "") 
          { 
              $this->deposit[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->deposit[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->deposit[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->deposit[$this->nm_grid_colunas]);
          $this->potongan[$this->nm_grid_colunas] = sc_strip_script($this->potongan[$this->nm_grid_colunas]);
          if ($this->potongan[$this->nm_grid_colunas] === "") 
          { 
              $this->potongan[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->potongan[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->potongan[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->potongan[$this->nm_grid_colunas]);
          $this->hrsdibayar[$this->nm_grid_colunas] = sc_strip_script($this->hrsdibayar[$this->nm_grid_colunas]);
          if ($this->hrsdibayar[$this->nm_grid_colunas] === "") 
          { 
              $this->hrsdibayar[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->hrsdibayar[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->hrsdibayar[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->hrsdibayar[$this->nm_grid_colunas]);
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
          $this->terimadari[$this->nm_grid_colunas] = sc_strip_script($this->terimadari[$this->nm_grid_colunas]);
          if ($this->terimadari[$this->nm_grid_colunas] === "") 
          { 
              $this->terimadari[$this->nm_grid_colunas] = "" ;  
          } 
          $this->terimadari[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->terimadari[$this->nm_grid_colunas]);
          $this->jenispayment[$this->nm_grid_colunas] = sc_strip_script($this->jenispayment[$this->nm_grid_colunas]);
          if ($this->jenispayment[$this->nm_grid_colunas] === "") 
          { 
              $this->jenispayment[$this->nm_grid_colunas] = "" ;  
          } 
          $this->jenispayment[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->jenispayment[$this->nm_grid_colunas]);
          $this->instansipenjamin[$this->nm_grid_colunas] = sc_strip_script($this->instansipenjamin[$this->nm_grid_colunas]);
          if ($this->instansipenjamin[$this->nm_grid_colunas] === "") 
          { 
              $this->instansipenjamin[$this->nm_grid_colunas] = "" ;  
          } 
          $this->instansipenjamin[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->instansipenjamin[$this->nm_grid_colunas]);
          $this->bankdebit[$this->nm_grid_colunas] = sc_strip_script($this->bankdebit[$this->nm_grid_colunas]);
          if ($this->bankdebit[$this->nm_grid_colunas] === "") 
          { 
              $this->bankdebit[$this->nm_grid_colunas] = "" ;  
          } 
          $this->bankdebit[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->bankdebit[$this->nm_grid_colunas]);
          $this->nokartu[$this->nm_grid_colunas] = sc_strip_script($this->nokartu[$this->nm_grid_colunas]);
          if ($this->nokartu[$this->nm_grid_colunas] === "") 
          { 
              $this->nokartu[$this->nm_grid_colunas] = "" ;  
          } 
          $this->nokartu[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->nokartu[$this->nm_grid_colunas]);
          $this->sc_field_0[$this->nm_grid_colunas] = sc_strip_script($this->sc_field_0[$this->nm_grid_colunas]);
          if ($this->sc_field_0[$this->nm_grid_colunas] === "") 
          { 
              $this->sc_field_0[$this->nm_grid_colunas] = "" ;  
          } 
          $this->sc_field_0[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->sc_field_0[$this->nm_grid_colunas]);
                      /*-------- Def. Body --------*/
            $cell_id = array('posx' => '10', 'posy' => '10', 'data' => $this->id[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tranCode = array('posx' => '10', 'posy' => '20', 'data' => $this->trancode[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_custCode = array('posx' => '10', 'posy' => '30', 'data' => $this->custcode[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_dokter = array('posx' => '10', 'posy' => '40', 'data' => $this->dokter[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_jmlTagihan = array('posx' => '10', 'posy' => '50', 'data' => $this->jmltagihan[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_jmlBayar = array('posx' => '10', 'posy' => '60', 'data' => $this->jmlbayar[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_deposit = array('posx' => '10', 'posy' => '70', 'data' => $this->deposit[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_potongan = array('posx' => '10', 'posy' => '80', 'data' => $this->potongan[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_hrsDibayar = array('posx' => '10', 'posy' => '90', 'data' => $this->hrsdibayar[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tranDate = array('posx' => '10', 'posy' => '100', 'data' => $this->trandate[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_terimaDari = array('posx' => '10', 'posy' => '110', 'data' => $this->terimadari[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_jenisPayment = array('posx' => '10', 'posy' => '120', 'data' => $this->jenispayment[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_instansiPenjamin = array('posx' => '10', 'posy' => '130', 'data' => $this->instansipenjamin[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_bankDebit = array('posx' => '10', 'posy' => '140', 'data' => $this->bankdebit[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_noKartu = array('posx' => '10', 'posy' => '150', 'data' => $this->nokartu[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_0 = array('posx' => '10', 'posy' => '160', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);

          /*------------------ Page 1 -----------------*/

            $this->Pdf->SetFont($cell_id['font_type'], $cell_id['font_style'], $cell_id['font_size']);
            $this->pdf_text_color($cell_id['data'], $cell_id['color_r'], $cell_id['color_g'], $cell_id['color_b']);
            if (!empty($cell_id['posx']) && !empty($cell_id['posy']))
            {
                $this->Pdf->SetXY($cell_id['posx'], $cell_id['posy']);
            }
            elseif (!empty($cell_id['posx']))
            {
                $this->Pdf->SetX($cell_id['posx']);
            }
            elseif (!empty($cell_id['posy']))
            {
                $this->Pdf->SetY($cell_id['posy']);
            }
            $this->Pdf->Cell($cell_id['width'], 0, $cell_id['data'], 0, 0, $cell_id['align']);

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

            $this->Pdf->SetFont($cell_custCode['font_type'], $cell_custCode['font_style'], $cell_custCode['font_size']);
            $this->pdf_text_color($cell_custCode['data'], $cell_custCode['color_r'], $cell_custCode['color_g'], $cell_custCode['color_b']);
            if (!empty($cell_custCode['posx']) && !empty($cell_custCode['posy']))
            {
                $this->Pdf->SetXY($cell_custCode['posx'], $cell_custCode['posy']);
            }
            elseif (!empty($cell_custCode['posx']))
            {
                $this->Pdf->SetX($cell_custCode['posx']);
            }
            elseif (!empty($cell_custCode['posy']))
            {
                $this->Pdf->SetY($cell_custCode['posy']);
            }
            $this->Pdf->Cell($cell_custCode['width'], 0, $cell_custCode['data'], 0, 0, $cell_custCode['align']);

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

            $this->Pdf->SetFont($cell_jmlTagihan['font_type'], $cell_jmlTagihan['font_style'], $cell_jmlTagihan['font_size']);
            $this->pdf_text_color($cell_jmlTagihan['data'], $cell_jmlTagihan['color_r'], $cell_jmlTagihan['color_g'], $cell_jmlTagihan['color_b']);
            if (!empty($cell_jmlTagihan['posx']) && !empty($cell_jmlTagihan['posy']))
            {
                $this->Pdf->SetXY($cell_jmlTagihan['posx'], $cell_jmlTagihan['posy']);
            }
            elseif (!empty($cell_jmlTagihan['posx']))
            {
                $this->Pdf->SetX($cell_jmlTagihan['posx']);
            }
            elseif (!empty($cell_jmlTagihan['posy']))
            {
                $this->Pdf->SetY($cell_jmlTagihan['posy']);
            }
            $this->Pdf->Cell($cell_jmlTagihan['width'], 0, $cell_jmlTagihan['data'], 0, 0, $cell_jmlTagihan['align']);

            $this->Pdf->SetFont($cell_jmlBayar['font_type'], $cell_jmlBayar['font_style'], $cell_jmlBayar['font_size']);
            $this->pdf_text_color($cell_jmlBayar['data'], $cell_jmlBayar['color_r'], $cell_jmlBayar['color_g'], $cell_jmlBayar['color_b']);
            if (!empty($cell_jmlBayar['posx']) && !empty($cell_jmlBayar['posy']))
            {
                $this->Pdf->SetXY($cell_jmlBayar['posx'], $cell_jmlBayar['posy']);
            }
            elseif (!empty($cell_jmlBayar['posx']))
            {
                $this->Pdf->SetX($cell_jmlBayar['posx']);
            }
            elseif (!empty($cell_jmlBayar['posy']))
            {
                $this->Pdf->SetY($cell_jmlBayar['posy']);
            }
            $this->Pdf->Cell($cell_jmlBayar['width'], 0, $cell_jmlBayar['data'], 0, 0, $cell_jmlBayar['align']);

            $this->Pdf->SetFont($cell_deposit['font_type'], $cell_deposit['font_style'], $cell_deposit['font_size']);
            $this->pdf_text_color($cell_deposit['data'], $cell_deposit['color_r'], $cell_deposit['color_g'], $cell_deposit['color_b']);
            if (!empty($cell_deposit['posx']) && !empty($cell_deposit['posy']))
            {
                $this->Pdf->SetXY($cell_deposit['posx'], $cell_deposit['posy']);
            }
            elseif (!empty($cell_deposit['posx']))
            {
                $this->Pdf->SetX($cell_deposit['posx']);
            }
            elseif (!empty($cell_deposit['posy']))
            {
                $this->Pdf->SetY($cell_deposit['posy']);
            }
            $this->Pdf->Cell($cell_deposit['width'], 0, $cell_deposit['data'], 0, 0, $cell_deposit['align']);

            $this->Pdf->SetFont($cell_potongan['font_type'], $cell_potongan['font_style'], $cell_potongan['font_size']);
            $this->pdf_text_color($cell_potongan['data'], $cell_potongan['color_r'], $cell_potongan['color_g'], $cell_potongan['color_b']);
            if (!empty($cell_potongan['posx']) && !empty($cell_potongan['posy']))
            {
                $this->Pdf->SetXY($cell_potongan['posx'], $cell_potongan['posy']);
            }
            elseif (!empty($cell_potongan['posx']))
            {
                $this->Pdf->SetX($cell_potongan['posx']);
            }
            elseif (!empty($cell_potongan['posy']))
            {
                $this->Pdf->SetY($cell_potongan['posy']);
            }
            $this->Pdf->Cell($cell_potongan['width'], 0, $cell_potongan['data'], 0, 0, $cell_potongan['align']);

            $this->Pdf->SetFont($cell_hrsDibayar['font_type'], $cell_hrsDibayar['font_style'], $cell_hrsDibayar['font_size']);
            $this->pdf_text_color($cell_hrsDibayar['data'], $cell_hrsDibayar['color_r'], $cell_hrsDibayar['color_g'], $cell_hrsDibayar['color_b']);
            if (!empty($cell_hrsDibayar['posx']) && !empty($cell_hrsDibayar['posy']))
            {
                $this->Pdf->SetXY($cell_hrsDibayar['posx'], $cell_hrsDibayar['posy']);
            }
            elseif (!empty($cell_hrsDibayar['posx']))
            {
                $this->Pdf->SetX($cell_hrsDibayar['posx']);
            }
            elseif (!empty($cell_hrsDibayar['posy']))
            {
                $this->Pdf->SetY($cell_hrsDibayar['posy']);
            }
            $this->Pdf->Cell($cell_hrsDibayar['width'], 0, $cell_hrsDibayar['data'], 0, 0, $cell_hrsDibayar['align']);

            $this->Pdf->SetFont($cell_tranDate['font_type'], $cell_tranDate['font_style'], $cell_tranDate['font_size']);
            $this->pdf_text_color($cell_tranDate['data'], $cell_tranDate['color_r'], $cell_tranDate['color_g'], $cell_tranDate['color_b']);
            if (!empty($cell_tranDate['posx']) && !empty($cell_tranDate['posy']))
            {
                $this->Pdf->SetXY($cell_tranDate['posx'], $cell_tranDate['posy']);
            }
            elseif (!empty($cell_tranDate['posx']))
            {
                $this->Pdf->SetX($cell_tranDate['posx']);
            }
            elseif (!empty($cell_tranDate['posy']))
            {
                $this->Pdf->SetY($cell_tranDate['posy']);
            }
            $this->Pdf->Cell($cell_tranDate['width'], 0, $cell_tranDate['data'], 0, 0, $cell_tranDate['align']);

            $this->Pdf->SetFont($cell_terimaDari['font_type'], $cell_terimaDari['font_style'], $cell_terimaDari['font_size']);
            $this->pdf_text_color($cell_terimaDari['data'], $cell_terimaDari['color_r'], $cell_terimaDari['color_g'], $cell_terimaDari['color_b']);
            if (!empty($cell_terimaDari['posx']) && !empty($cell_terimaDari['posy']))
            {
                $this->Pdf->SetXY($cell_terimaDari['posx'], $cell_terimaDari['posy']);
            }
            elseif (!empty($cell_terimaDari['posx']))
            {
                $this->Pdf->SetX($cell_terimaDari['posx']);
            }
            elseif (!empty($cell_terimaDari['posy']))
            {
                $this->Pdf->SetY($cell_terimaDari['posy']);
            }
            $this->Pdf->Cell($cell_terimaDari['width'], 0, $cell_terimaDari['data'], 0, 0, $cell_terimaDari['align']);

            $this->Pdf->SetFont($cell_jenisPayment['font_type'], $cell_jenisPayment['font_style'], $cell_jenisPayment['font_size']);
            $this->pdf_text_color($cell_jenisPayment['data'], $cell_jenisPayment['color_r'], $cell_jenisPayment['color_g'], $cell_jenisPayment['color_b']);
            if (!empty($cell_jenisPayment['posx']) && !empty($cell_jenisPayment['posy']))
            {
                $this->Pdf->SetXY($cell_jenisPayment['posx'], $cell_jenisPayment['posy']);
            }
            elseif (!empty($cell_jenisPayment['posx']))
            {
                $this->Pdf->SetX($cell_jenisPayment['posx']);
            }
            elseif (!empty($cell_jenisPayment['posy']))
            {
                $this->Pdf->SetY($cell_jenisPayment['posy']);
            }
            $this->Pdf->Cell($cell_jenisPayment['width'], 0, $cell_jenisPayment['data'], 0, 0, $cell_jenisPayment['align']);

            $this->Pdf->SetFont($cell_instansiPenjamin['font_type'], $cell_instansiPenjamin['font_style'], $cell_instansiPenjamin['font_size']);
            $this->pdf_text_color($cell_instansiPenjamin['data'], $cell_instansiPenjamin['color_r'], $cell_instansiPenjamin['color_g'], $cell_instansiPenjamin['color_b']);
            if (!empty($cell_instansiPenjamin['posx']) && !empty($cell_instansiPenjamin['posy']))
            {
                $this->Pdf->SetXY($cell_instansiPenjamin['posx'], $cell_instansiPenjamin['posy']);
            }
            elseif (!empty($cell_instansiPenjamin['posx']))
            {
                $this->Pdf->SetX($cell_instansiPenjamin['posx']);
            }
            elseif (!empty($cell_instansiPenjamin['posy']))
            {
                $this->Pdf->SetY($cell_instansiPenjamin['posy']);
            }
            $this->Pdf->Cell($cell_instansiPenjamin['width'], 0, $cell_instansiPenjamin['data'], 0, 0, $cell_instansiPenjamin['align']);

            $this->Pdf->SetFont($cell_bankDebit['font_type'], $cell_bankDebit['font_style'], $cell_bankDebit['font_size']);
            $this->pdf_text_color($cell_bankDebit['data'], $cell_bankDebit['color_r'], $cell_bankDebit['color_g'], $cell_bankDebit['color_b']);
            if (!empty($cell_bankDebit['posx']) && !empty($cell_bankDebit['posy']))
            {
                $this->Pdf->SetXY($cell_bankDebit['posx'], $cell_bankDebit['posy']);
            }
            elseif (!empty($cell_bankDebit['posx']))
            {
                $this->Pdf->SetX($cell_bankDebit['posx']);
            }
            elseif (!empty($cell_bankDebit['posy']))
            {
                $this->Pdf->SetY($cell_bankDebit['posy']);
            }
            $this->Pdf->Cell($cell_bankDebit['width'], 0, $cell_bankDebit['data'], 0, 0, $cell_bankDebit['align']);

            $this->Pdf->SetFont($cell_noKartu['font_type'], $cell_noKartu['font_style'], $cell_noKartu['font_size']);
            $this->pdf_text_color($cell_noKartu['data'], $cell_noKartu['color_r'], $cell_noKartu['color_g'], $cell_noKartu['color_b']);
            if (!empty($cell_noKartu['posx']) && !empty($cell_noKartu['posy']))
            {
                $this->Pdf->SetXY($cell_noKartu['posx'], $cell_noKartu['posy']);
            }
            elseif (!empty($cell_noKartu['posx']))
            {
                $this->Pdf->SetX($cell_noKartu['posx']);
            }
            elseif (!empty($cell_noKartu['posy']))
            {
                $this->Pdf->SetY($cell_noKartu['posy']);
            }
            $this->Pdf->Cell($cell_noKartu['width'], 0, $cell_noKartu['data'], 0, 0, $cell_noKartu['align']);

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

          /*-------------------------------------------*/
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
