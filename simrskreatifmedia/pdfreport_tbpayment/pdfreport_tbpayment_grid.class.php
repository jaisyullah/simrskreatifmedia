<?php
class pdfreport_tbpayment_grid
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
   var $jam = array();
   var $acc = array();
   var $alamat1 = array();
   var $alamat2 = array();
   var $bayar = array();
   var $bukti_sah = array();
   var $bukti_sah2 = array();
   var $detail = array();
   var $detail_uraian = array();
   var $detail_biaya = array();
   var $dok = array();
   var $header = array();
   var $jm = array();
   var $kasir = array();
   var $kembali = array();
   var $ksr = array();
   var $line = array();
   var $line2 = array();
   var $line3 = array();
   var $logo = array();
   var $logo10 = array();
   var $logo11 = array();
   var $logo12 = array();
   var $logo2 = array();
   var $logo3 = array();
   var $logo4 = array();
   var $logo5 = array();
   var $logo6 = array();
   var $logo7 = array();
   var $logo8 = array();
   var $logo9 = array();
   var $pasien = array();
   var $pol = array();
   var $t_bayar = array();
   var $terbilang = array();
   var $terbilang2 = array();
   var $tgl = array();
   var $total = array();
   var $u_p = array();
   var $uang = array();
   var $trancode = array();
   var $nostruk = array();
   var $custcode = array();
   var $dokter = array();
   var $poli = array();
   var $jmltagihan = array();
   var $jmlbayar = array();
   var $hrsdibayar = array();
   var $trandate = array();
   var $terimadari = array();
   var $paiddate = array();
   var $nopayment = array();
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
   $this->default_font = 'courier';
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
   $_SESSION['scriptcase']['pdfreport_tbpayment']['default_font'] = $this->default_font;
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
           if (in_array("pdfreport_tbpayment", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['campos_busca'];
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
       $this->nostruk[0] = $Busca_temp['nostruk']; 
       $tmp_pos = strpos($this->nostruk[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->nostruk[0]))
       {
           $this->nostruk[0] = substr($this->nostruk[0], 0, $tmp_pos);
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
       $this->paiddate[0] = $Busca_temp['paiddate']; 
       $tmp_pos = strpos($this->paiddate[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->paiddate[0]))
       {
           $this->paiddate[0] = substr($this->paiddate[0], 0, $tmp_pos);
       }
       $paiddate_2 = $Busca_temp['paiddate_input_2']; 
       $this->paiddate_2 = $Busca_temp['paiddate_input_2']; 
   } 
   else 
   { 
       $this->paiddate_2 = ""; 
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbpayment']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbpayment']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbpayment']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbpayment']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['where_orig'] = " where tranCode = '" . $_SESSION['var_kw'] . "'";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT tranCode, noStruk, custCode, dokter, dokter as poli, jmlTagihan, jmlBayar, hrsDibayar, str_replace (convert(char(10),tranDate,102), '.', '-') + ' ' + convert(char(8),tranDate,20), terimaDari, str_replace (convert(char(10),paidDate,102), '.', '-') + ' ' + convert(char(8),paidDate,20), noPayment from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT tranCode, noStruk, custCode, dokter, dokter as poli, jmlTagihan, jmlBayar, hrsDibayar, tranDate, terimaDari, paidDate, noPayment from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT tranCode, noStruk, custCode, dokter, dokter as poli, jmlTagihan, jmlBayar, hrsDibayar, convert(char(23),tranDate,121), terimaDari, convert(char(23),paidDate,121), noPayment from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT tranCode, noStruk, custCode, dokter, dokter as poli, jmlTagihan, jmlBayar, hrsDibayar, tranDate, terimaDari, paidDate, noPayment from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT tranCode, noStruk, custCode, dokter, dokter as poli, jmlTagihan, jmlBayar, hrsDibayar, EXTEND(tranDate, YEAR TO FRACTION), terimaDari, EXTEND(paidDate, YEAR TO FRACTION), noPayment from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT tranCode, noStruk, custCode, dokter, dokter as poli, jmlTagihan, jmlBayar, hrsDibayar, tranDate, terimaDari, paidDate, noPayment from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['order_grid'] = $nmgp_order_by;
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
//----- 
 function grid($linhas = 0)
 {
    global 
           $nm_saida, $nm_url_saida;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['trancode'] = "Tran Code";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['nostruk'] = "No Struk";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['custcode'] = "Cust Code";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['dokter'] = "Dokter";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['poli'] = "Poli";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['jmltagihan'] = "Jml Tagihan";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['jmlbayar'] = "Jml Bayar";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['hrsdibayar'] = "Hrs Dibayar";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['trandate'] = "Tran Date";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['terimadari'] = "Terima Dari";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['paiddate'] = "Paid Date";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['nopayment'] = "No Payment";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['jam'] = "Jam";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['acc'] = "acc";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['alamat1'] = "alamat1";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['alamat2'] = "alamat2";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['bayar'] = "bayar";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['bukti_sah'] = "bukti_sah";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['bukti_sah2'] = "bukti_sah2";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['detail'] = "detail";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['detail_uraian'] = "URAIAN";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['detail_biaya'] = "Biaya";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['dok'] = "dok";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['header'] = "header";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['jm'] = "jm";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['kasir'] = "kasir";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['kembali'] = "kembali";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['ksr'] = "ksr";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['line'] = "line";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['line2'] = "line2";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['line3'] = "line3";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['logo'] = "logo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['logo10'] = "logo10";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['logo11'] = "logo11";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['logo12'] = "logo12";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['logo2'] = "logo2";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['logo3'] = "logo3";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['logo4'] = "logo4";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['logo5'] = "logo5";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['logo6'] = "logo6";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['logo7'] = "logo7";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['logo8'] = "logo8";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['logo9'] = "logo9";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['pasien'] = "pasien";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['pol'] = "pol";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['t_bayar'] = "t_bayar";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['terbilang'] = "terbilang";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['terbilang2'] = "terbilang2";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['tgl'] = "tgl";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['total'] = "total";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['u_p'] = "u_p";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['labels']['uang'] = "uang";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbpayment']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbpayment']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbpayment']['lig_edit'];
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
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbpayment']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->trancode[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->nostruk[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->nostruk[$this->nm_grid_colunas] = (string)$this->nostruk[$this->nm_grid_colunas];
          $this->custcode[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->dokter[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->poli[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->jmltagihan[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->jmltagihan[$this->nm_grid_colunas] =  str_replace(",", ".", $this->jmltagihan[$this->nm_grid_colunas]);
          $this->jmltagihan[$this->nm_grid_colunas] = (string)$this->jmltagihan[$this->nm_grid_colunas];
          $this->jmlbayar[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->jmlbayar[$this->nm_grid_colunas] =  str_replace(",", ".", $this->jmlbayar[$this->nm_grid_colunas]);
          $this->jmlbayar[$this->nm_grid_colunas] = (string)$this->jmlbayar[$this->nm_grid_colunas];
          $this->hrsdibayar[$this->nm_grid_colunas] = $this->rs_grid->fields[7] ;  
          $this->hrsdibayar[$this->nm_grid_colunas] =  str_replace(",", ".", $this->hrsdibayar[$this->nm_grid_colunas]);
          $this->hrsdibayar[$this->nm_grid_colunas] = (string)$this->hrsdibayar[$this->nm_grid_colunas];
          $this->trandate[$this->nm_grid_colunas] = $this->rs_grid->fields[8] ;  
          $this->terimadari[$this->nm_grid_colunas] = $this->rs_grid->fields[9] ;  
          $this->paiddate[$this->nm_grid_colunas] = $this->rs_grid->fields[10] ;  
          $this->nopayment[$this->nm_grid_colunas] = $this->rs_grid->fields[11] ;  
          $this->detail_uraian[$this->nm_grid_colunas] = array();
          $this->detail_biaya[$this->nm_grid_colunas] = array();
          $this->Lookup->lookup_detail($this->detail[$this->nm_grid_colunas] , $this->trancode[$this->nm_grid_colunas], $array_detail); 
          $NM_ind = 0;
          $this->detail = array();
          foreach ($array_detail as $cada_subselect) 
          {
              $this->detail[$this->nm_grid_colunas][$NM_ind] = "";
              $this->detail_uraian[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[0];
              $this->detail_biaya[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[1];
              $NM_ind++;
          }
          $this->jam[$this->nm_grid_colunas] = "";
          $this->acc[$this->nm_grid_colunas] = "";
          $this->alamat1[$this->nm_grid_colunas] = "";
          $this->alamat2[$this->nm_grid_colunas] = "";
          $this->bayar[$this->nm_grid_colunas] = "";
          $this->bukti_sah[$this->nm_grid_colunas] = "";
          $this->bukti_sah2[$this->nm_grid_colunas] = "";
          $this->dok[$this->nm_grid_colunas] = "";
          $this->header[$this->nm_grid_colunas] = "";
          $this->jm[$this->nm_grid_colunas] = "";
          $this->kasir[$this->nm_grid_colunas] = "";
          $this->kembali[$this->nm_grid_colunas] = "";
          $this->ksr[$this->nm_grid_colunas] = "";
          $this->line[$this->nm_grid_colunas] = "";
          $this->line2[$this->nm_grid_colunas] = "";
          $this->line3[$this->nm_grid_colunas] = "";
          $this->logo[$this->nm_grid_colunas] = "";
          $this->logo10[$this->nm_grid_colunas] = "";
          $this->logo11[$this->nm_grid_colunas] = "";
          $this->logo12[$this->nm_grid_colunas] = "";
          $this->logo2[$this->nm_grid_colunas] = "";
          $this->logo3[$this->nm_grid_colunas] = "";
          $this->logo4[$this->nm_grid_colunas] = "";
          $this->logo5[$this->nm_grid_colunas] = "";
          $this->logo6[$this->nm_grid_colunas] = "";
          $this->logo7[$this->nm_grid_colunas] = "";
          $this->logo8[$this->nm_grid_colunas] = "";
          $this->logo9[$this->nm_grid_colunas] = "";
          $this->pasien[$this->nm_grid_colunas] = "";
          $this->pol[$this->nm_grid_colunas] = "";
          $this->t_bayar[$this->nm_grid_colunas] = "";
          $this->terbilang[$this->nm_grid_colunas] = "";
          $this->terbilang2[$this->nm_grid_colunas] = "";
          $this->tgl[$this->nm_grid_colunas] = "";
          $this->total[$this->nm_grid_colunas] = "";
          $this->u_p[$this->nm_grid_colunas] = "";
          $this->uang[$this->nm_grid_colunas] = "";
          $_SESSION['scriptcase']['pdfreport_tbpayment']['contr_erro'] = 'on';
if (!isset($_SESSION['usr_login'])) {$_SESSION['usr_login'] = "";}
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
  $this->kasir[$this->nm_grid_colunas]  = $this->sc_temp_usr_login;

$this->line[$this->nm_grid_colunas]  = '============================================';

$this->line2[$this->nm_grid_colunas]  = '============================================';

$this->line3[$this->nm_grid_colunas]  = '============================================';

$this->jam[$this->nm_grid_colunas]  = date("H:i:s");

$this->header[$this->nm_grid_colunas]   = 'RUMAH SAKIT AULIA';

$this->alamat1[$this->nm_grid_colunas]  = 'JL. Jeruk Raya No. 15 Jagakarsa, JakSel 12620';

$this->alamat2[$this->nm_grid_colunas]  = 'Telp. (021)7270208, 7866057 : Fax. (021)7270208';

$this->acc[$this->nm_grid_colunas]      = 'Terima Dari   :';

$this->uang[$this->nm_grid_colunas]     = 'Uang Sebanyak :';

$this->pasien[$this->nm_grid_colunas]   = 'Pasien        :';

$this->dok[$this->nm_grid_colunas]      = 'Dokter        :';

$this->pol[$this->nm_grid_colunas]      = 'Poli          :';

$this->t_bayar[$this->nm_grid_colunas]  = 'Tgl. Bayar    :';

$this->u_p[$this->nm_grid_colunas]      = 'Untuk Pembayaran';

$this->tgl[$this->nm_grid_colunas]      = 'Tgl   :';
	
$this->jm[$this->nm_grid_colunas]       = 'Jam   :';

$this->ksr[$this->nm_grid_colunas]      = 'Kasir :';

$this->total[$this->nm_grid_colunas]    = 'Total   :';
	
$this->bayar[$this->nm_grid_colunas]    = 'Bayar   :';

$this->kembali[$this->nm_grid_colunas]  = 'Kembali :';

$this->bukti_sah[$this->nm_grid_colunas]  = '(Bukti pembayaran ini sah jika dibubuhi';

$this->bukti_sah2[$this->nm_grid_colunas]  = 'cap/stempel RUMAH SAKIT AULIA)';


 


if($this->jmltagihan[$this->nm_grid_colunas]  < $this->jmlbayar[$this->nm_grid_colunas] ){
	$nilai = $this->jmltagihan[$this->nm_grid_colunas] ;
}else{
	$nilai = $this->jmlbayar[$this->nm_grid_colunas] ;
}

$terbilangs = $this->terbilang($nilai, $style=1)." RUPIAH";





$num_char = 25;

$cut_text2 = substr($terbilangs, 0, $num_char);
if ($terbilangs{$num_char - 1} != ' ') { 
	$new_pos2 = strrpos($cut_text2, ' '); 
	$cut_text2 = substr($this->terbilang[$this->nm_grid_colunas], 0, $new_pos2);
}

$this->terbilang[$this->nm_grid_colunas]  = $this->cutText($terbilangs, 25);
$this->terbilang2[$this->nm_grid_colunas]  = $this->cutText2($terbilangs, 25);

$this->logo[$this->nm_grid_colunas]    = '         `-/+syyhddddddhyso+/-`         ';
$this->logo2[$this->nm_grid_colunas]   = '     ./shdddddddddy++ydddddddddyo:`     ';
$this->logo3[$this->nm_grid_colunas]   = '   :shhhhhhhhhhhdd-...hdhhhhhhhhhhhs:   ';
$this->logo4[$this->nm_grid_colunas]   = ' -yhhhhhhhhhhhhhddhooyddhhhhhhhhhhhhhs. ';
$this->logo5[$this->nm_grid_colunas]   = '-yyyyyyyyyddddddmhs/..odmdddddhyyyyyyyy.';
$this->logo6[$this->nm_grid_colunas]   = 'syyyyyyyyyddddddd:-y..-hddddddyyyyyyyyyo';
$this->logo7[$this->nm_grid_colunas]   = 'osssssssssdddddds..++../ddddddyssssssss+';
$this->logo8[$this->nm_grid_colunas]   = '.sssssssssyyyyyy-...y-..oyyyyysssssssso.';
$this->logo9[$this->nm_grid_colunas]   = ' .+ssssssssssss:....:o..-osssssssssss+` ';
$this->logo10[$this->nm_grid_colunas]  = '   ./oooooooooo+osssshss/oooooooooo/.   ';
$this->logo11[$this->nm_grid_colunas]  = '      .:+ooooooosyyyyyyyooooooo+:.      ';
$this->logo12[$this->nm_grid_colunas]  = '          `.-://++++++++//:-.`          ';

if (isset($this->sc_temp_usr_login)) {$_SESSION['usr_login'] = $this->sc_temp_usr_login;}
$_SESSION['scriptcase']['pdfreport_tbpayment']['contr_erro'] = 'off';
          $this->trancode[$this->nm_grid_colunas] = sc_strip_script($this->trancode[$this->nm_grid_colunas]);
          if ($this->trancode[$this->nm_grid_colunas] === "") 
          { 
              $this->trancode[$this->nm_grid_colunas] = "" ;  
          } 
          $this->trancode[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->trancode[$this->nm_grid_colunas]);
          $this->Lookup->lookup_nostruk($this->nostruk[$this->nm_grid_colunas] , $this->trancode[$this->nm_grid_colunas]) ; 
          $this->nostruk[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->nostruk[$this->nm_grid_colunas]);
          $this->Lookup->lookup_custcode($this->custcode[$this->nm_grid_colunas] , $this->custcode[$this->nm_grid_colunas]) ; 
          $this->custcode[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->custcode[$this->nm_grid_colunas]);
          $this->Lookup->lookup_dokter($this->dokter[$this->nm_grid_colunas] , $this->dokter[$this->nm_grid_colunas]) ; 
          $this->dokter[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->dokter[$this->nm_grid_colunas]);
          $this->Lookup->lookup_poli($this->poli[$this->nm_grid_colunas] , $this->poli[$this->nm_grid_colunas]) ; 
          $this->poli[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->poli[$this->nm_grid_colunas]);
          $this->jmltagihan[$this->nm_grid_colunas] = sc_strip_script($this->jmltagihan[$this->nm_grid_colunas]);
          if ($this->jmltagihan[$this->nm_grid_colunas] === "") 
          { 
              $this->jmltagihan[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->jmltagihan[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->jmltagihan[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->jmltagihan[$this->nm_grid_colunas]);
          $this->jmlbayar[$this->nm_grid_colunas] = sc_strip_script($this->jmlbayar[$this->nm_grid_colunas]);
          if ($this->jmlbayar[$this->nm_grid_colunas] === "") 
          { 
              $this->jmlbayar[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->jmlbayar[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->jmlbayar[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->jmlbayar[$this->nm_grid_colunas]);
          $this->hrsdibayar[$this->nm_grid_colunas] = sc_strip_script($this->hrsdibayar[$this->nm_grid_colunas]);
          if ($this->hrsdibayar[$this->nm_grid_colunas] === "") 
          { 
              $this->hrsdibayar[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->hrsdibayar[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
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
                   $this->trandate[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->trandate[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->trandate[$this->nm_grid_colunas]);
          $this->terimadari[$this->nm_grid_colunas] = sc_strip_script($this->terimadari[$this->nm_grid_colunas]);
          if ($this->terimadari[$this->nm_grid_colunas] === "") 
          { 
              $this->terimadari[$this->nm_grid_colunas] = "" ;  
          } 
          $this->terimadari[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->terimadari[$this->nm_grid_colunas]);
          $this->paiddate[$this->nm_grid_colunas] = sc_strip_script($this->paiddate[$this->nm_grid_colunas]);
          if ($this->paiddate[$this->nm_grid_colunas] === "") 
          { 
              $this->paiddate[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               if (substr($this->paiddate[$this->nm_grid_colunas], 10, 1) == "-") 
               { 
                  $this->paiddate[$this->nm_grid_colunas] = substr($this->paiddate[$this->nm_grid_colunas], 0, 10) . " " . substr($this->paiddate[$this->nm_grid_colunas], 11);
               } 
               if (substr($this->paiddate[$this->nm_grid_colunas], 13, 1) == ".") 
               { 
                  $this->paiddate[$this->nm_grid_colunas] = substr($this->paiddate[$this->nm_grid_colunas], 0, 13) . ":" . substr($this->paiddate[$this->nm_grid_colunas], 14, 2) . ":" . substr($this->paiddate[$this->nm_grid_colunas], 17);
               } 
               $paiddate_x =  $this->paiddate[$this->nm_grid_colunas];
               nm_conv_limpa_dado($paiddate_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($paiddate_x) && strlen($paiddate_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->paiddate[$this->nm_grid_colunas], "YYYY-MM-DD HH:II:SS");
                   $this->paiddate[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->paiddate[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->paiddate[$this->nm_grid_colunas]);
          $this->nopayment[$this->nm_grid_colunas] = sc_strip_script($this->nopayment[$this->nm_grid_colunas]);
          if ($this->nopayment[$this->nm_grid_colunas] === "") 
          { 
              $this->nopayment[$this->nm_grid_colunas] = "" ;  
          } 
          $this->nopayment[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->nopayment[$this->nm_grid_colunas]);
          if ($this->jam[$this->nm_grid_colunas] === "") 
          { 
              $this->jam[$this->nm_grid_colunas] = "" ;  
          } 
          $this->jam[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->jam[$this->nm_grid_colunas]);
          if ($this->acc[$this->nm_grid_colunas] === "") 
          { 
              $this->acc[$this->nm_grid_colunas] = "" ;  
          } 
          $this->acc[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->acc[$this->nm_grid_colunas]);
          if ($this->alamat1[$this->nm_grid_colunas] === "") 
          { 
              $this->alamat1[$this->nm_grid_colunas] = "" ;  
          } 
          $this->alamat1[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->alamat1[$this->nm_grid_colunas]);
          if ($this->alamat2[$this->nm_grid_colunas] === "") 
          { 
              $this->alamat2[$this->nm_grid_colunas] = "" ;  
          } 
          $this->alamat2[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->alamat2[$this->nm_grid_colunas]);
          if ($this->bayar[$this->nm_grid_colunas] === "") 
          { 
              $this->bayar[$this->nm_grid_colunas] = "" ;  
          } 
          $this->bayar[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->bayar[$this->nm_grid_colunas]);
          if ($this->bukti_sah[$this->nm_grid_colunas] === "") 
          { 
              $this->bukti_sah[$this->nm_grid_colunas] = "" ;  
          } 
          $this->bukti_sah[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->bukti_sah[$this->nm_grid_colunas]);
          if ($this->bukti_sah2[$this->nm_grid_colunas] === "") 
          { 
              $this->bukti_sah2[$this->nm_grid_colunas] = "" ;  
          } 
          $this->bukti_sah2[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->bukti_sah2[$this->nm_grid_colunas]);
          if ($this->dok[$this->nm_grid_colunas] === "") 
          { 
              $this->dok[$this->nm_grid_colunas] = "" ;  
          } 
          $this->dok[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->dok[$this->nm_grid_colunas]);
          if ($this->header[$this->nm_grid_colunas] === "") 
          { 
              $this->header[$this->nm_grid_colunas] = "" ;  
          } 
          $this->header[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->header[$this->nm_grid_colunas]);
          if ($this->jm[$this->nm_grid_colunas] === "") 
          { 
              $this->jm[$this->nm_grid_colunas] = "" ;  
          } 
          $this->jm[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->jm[$this->nm_grid_colunas]);
          if ($this->kasir[$this->nm_grid_colunas] === "") 
          { 
              $this->kasir[$this->nm_grid_colunas] = "" ;  
          } 
          $this->kasir[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->kasir[$this->nm_grid_colunas]);
          if ($this->kembali[$this->nm_grid_colunas] === "") 
          { 
              $this->kembali[$this->nm_grid_colunas] = "" ;  
          } 
          $this->kembali[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->kembali[$this->nm_grid_colunas]);
          if ($this->ksr[$this->nm_grid_colunas] === "") 
          { 
              $this->ksr[$this->nm_grid_colunas] = "" ;  
          } 
          $this->ksr[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->ksr[$this->nm_grid_colunas]);
          if ($this->line[$this->nm_grid_colunas] === "") 
          { 
              $this->line[$this->nm_grid_colunas] = "" ;  
          } 
          $this->line[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->line[$this->nm_grid_colunas]);
          if ($this->line2[$this->nm_grid_colunas] === "") 
          { 
              $this->line2[$this->nm_grid_colunas] = "" ;  
          } 
          $this->line2[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->line2[$this->nm_grid_colunas]);
          if ($this->line3[$this->nm_grid_colunas] === "") 
          { 
              $this->line3[$this->nm_grid_colunas] = "" ;  
          } 
          $this->line3[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->line3[$this->nm_grid_colunas]);
          if ($this->logo[$this->nm_grid_colunas] === "") 
          { 
              $this->logo[$this->nm_grid_colunas] = "" ;  
          } 
          $this->logo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->logo[$this->nm_grid_colunas]);
          if ($this->logo10[$this->nm_grid_colunas] === "") 
          { 
              $this->logo10[$this->nm_grid_colunas] = "" ;  
          } 
          $this->logo10[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->logo10[$this->nm_grid_colunas]);
          if ($this->logo11[$this->nm_grid_colunas] === "") 
          { 
              $this->logo11[$this->nm_grid_colunas] = "" ;  
          } 
          $this->logo11[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->logo11[$this->nm_grid_colunas]);
          if ($this->logo12[$this->nm_grid_colunas] === "") 
          { 
              $this->logo12[$this->nm_grid_colunas] = "" ;  
          } 
          $this->logo12[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->logo12[$this->nm_grid_colunas]);
          if ($this->logo2[$this->nm_grid_colunas] === "") 
          { 
              $this->logo2[$this->nm_grid_colunas] = "" ;  
          } 
          $this->logo2[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->logo2[$this->nm_grid_colunas]);
          if ($this->logo3[$this->nm_grid_colunas] === "") 
          { 
              $this->logo3[$this->nm_grid_colunas] = "" ;  
          } 
          $this->logo3[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->logo3[$this->nm_grid_colunas]);
          if ($this->logo4[$this->nm_grid_colunas] === "") 
          { 
              $this->logo4[$this->nm_grid_colunas] = "" ;  
          } 
          $this->logo4[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->logo4[$this->nm_grid_colunas]);
          if ($this->logo5[$this->nm_grid_colunas] === "") 
          { 
              $this->logo5[$this->nm_grid_colunas] = "" ;  
          } 
          $this->logo5[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->logo5[$this->nm_grid_colunas]);
          if ($this->logo6[$this->nm_grid_colunas] === "") 
          { 
              $this->logo6[$this->nm_grid_colunas] = "" ;  
          } 
          $this->logo6[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->logo6[$this->nm_grid_colunas]);
          if ($this->logo7[$this->nm_grid_colunas] === "") 
          { 
              $this->logo7[$this->nm_grid_colunas] = "" ;  
          } 
          $this->logo7[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->logo7[$this->nm_grid_colunas]);
          if ($this->logo8[$this->nm_grid_colunas] === "") 
          { 
              $this->logo8[$this->nm_grid_colunas] = "" ;  
          } 
          $this->logo8[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->logo8[$this->nm_grid_colunas]);
          if ($this->logo9[$this->nm_grid_colunas] === "") 
          { 
              $this->logo9[$this->nm_grid_colunas] = "" ;  
          } 
          $this->logo9[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->logo9[$this->nm_grid_colunas]);
          if ($this->pasien[$this->nm_grid_colunas] === "") 
          { 
              $this->pasien[$this->nm_grid_colunas] = "" ;  
          } 
          $this->pasien[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pasien[$this->nm_grid_colunas]);
          if ($this->pol[$this->nm_grid_colunas] === "") 
          { 
              $this->pol[$this->nm_grid_colunas] = "" ;  
          } 
          $this->pol[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pol[$this->nm_grid_colunas]);
          if ($this->t_bayar[$this->nm_grid_colunas] === "") 
          { 
              $this->t_bayar[$this->nm_grid_colunas] = "" ;  
          } 
          $this->t_bayar[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->t_bayar[$this->nm_grid_colunas]);
          if ($this->terbilang[$this->nm_grid_colunas] === "") 
          { 
              $this->terbilang[$this->nm_grid_colunas] = "" ;  
          } 
          $this->terbilang[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->terbilang[$this->nm_grid_colunas]);
          if ($this->terbilang2[$this->nm_grid_colunas] === "") 
          { 
              $this->terbilang2[$this->nm_grid_colunas] = "" ;  
          } 
          $this->terbilang2[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->terbilang2[$this->nm_grid_colunas]);
          if ($this->tgl[$this->nm_grid_colunas] === "") 
          { 
              $this->tgl[$this->nm_grid_colunas] = "" ;  
          } 
          $this->tgl[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tgl[$this->nm_grid_colunas]);
          if ($this->total[$this->nm_grid_colunas] === "") 
          { 
              $this->total[$this->nm_grid_colunas] = "" ;  
          } 
          $this->total[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->total[$this->nm_grid_colunas]);
          if ($this->u_p[$this->nm_grid_colunas] === "") 
          { 
              $this->u_p[$this->nm_grid_colunas] = "" ;  
          } 
          $this->u_p[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->u_p[$this->nm_grid_colunas]);
          if ($this->uang[$this->nm_grid_colunas] === "") 
          { 
              $this->uang[$this->nm_grid_colunas] = "" ;  
          } 
          $this->uang[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->uang[$this->nm_grid_colunas]);
          foreach ($this->detail_uraian[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detail_uraian[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detail_uraian[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->detail_uraian[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detail_uraian[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detail_biaya[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detail_biaya[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detail_biaya[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detail_biaya[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
              $this->detail_biaya[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detail_biaya[$this->nm_grid_colunas][$NM_ind]);
          }
            $cell_tranCode = array('posx' => '81', 'posy' => '56', 'data' => $this->trancode[$this->nm_grid_colunas], 'width'      => '15', 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_custCode = array('posx' => '36', 'posy' => '35', 'data' => $this->custcode[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_dokter = array('posx' => '36', 'posy' => '40', 'data' => $this->dokter[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_jmlTagihan = array('posx' => '81', 'posy' => '111', 'data' => $this->jmltagihan[$this->nm_grid_colunas], 'width'      => '15', 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_jmlBayar = array('posx' => '81', 'posy' => '116', 'data' => $this->jmlbayar[$this->nm_grid_colunas], 'width'      => '15', 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_hrsDibayar = array('posx' => '81', 'posy' => '120.5', 'data' => $this->hrsdibayar[$this->nm_grid_colunas], 'width'      => '15', 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tranDate = array('posx' => '18', 'posy' => '111.25993749998597', 'data' => $this->trandate[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_terimaDari = array('posx' => '36', 'posy' => '21', 'data' => $this->terimadari[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_paidDate = array('posx' => '36', 'posy' => '50', 'data' => $this->paiddate[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Jam = array('posx' => '18', 'posy' => '115.73139583331874', 'data' => $this->jam[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_kasir = array('posx' => '18', 'posy' => '120.5', 'data' => $this->kasir[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_line = array('posx' => '1', 'posy' => '123', 'data' => $this->line[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_line2 = array('posx' => '1', 'posy' => '108', 'data' => $this->line2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_line3 = array('posx' => '1', 'posy' => '13.5', 'data' => $this->line3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_header = array('posx' => '2', 'posy' => '1', 'data' => $this->header[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '18', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_alamat1 = array('posx' => '2', 'posy' => '8', 'data' => $this->alamat1[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '7', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_alamat2 = array('posx' => '1', 'posy' => '11', 'data' => $this->alamat2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '7', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_acc = array('posx' => '1', 'posy' => '21', 'data' => $this->acc[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_uang = array('posx' => '1', 'posy' => '25', 'data' => $this->uang[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_pasien = array('posx' => '1', 'posy' => '35', 'data' => $this->pasien[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_dok = array('posx' => '1', 'posy' => '40', 'data' => $this->dok[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_pol = array('posx' => '1', 'posy' => '45', 'data' => $this->pol[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_t_bayar = array('posx' => '1', 'posy' => '50', 'data' => $this->t_bayar[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_u_p = array('posx' => '1', 'posy' => '56', 'data' => $this->u_p[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_tgl = array('posx' => '1', 'posy' => '111', 'data' => $this->tgl[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_jm = array('posx' => '1', 'posy' => '116', 'data' => $this->jm[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_ksr = array('posx' => '1', 'posy' => '120.5', 'data' => $this->ksr[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_total = array('posx' => '44', 'posy' => '111', 'data' => $this->total[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_bayar = array('posx' => '44', 'posy' => '116', 'data' => $this->bayar[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_kembali = array('posx' => '44', 'posy' => '120.5', 'data' => $this->kembali[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_bukti_sah = array('posx' => '38', 'posy' => '126', 'data' => $this->bukti_sah[$this->nm_grid_colunas], 'width'      => '20', 'align'      => 'C', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_bukti_sah2 = array('posx' => '36', 'posy' => '130', 'data' => $this->bukti_sah2[$this->nm_grid_colunas], 'width'      => '20', 'align'      => 'C', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_terbilang = array('posx' => '36', 'posy' => '25', 'data' => $this->terbilang[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_terbilang2 = array('posx' => '36', 'posy' => '30', 'data' => $this->terbilang2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detail_URAIAN = array('posx' => '2', 'posy' => '61', 'data' => $this->detail_uraian[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_detail_biaya = array('posx' => '81', 'posy' => '61', 'data' => $this->detail_biaya[$this->nm_grid_colunas], 'width'      => '15', 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_51 = array('posx' => '69', 'posy' => '1', 'data' => $this->logo[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '3', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_52 = array('posx' => '69', 'posy' => '2', 'data' => $this->logo2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '3', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_53 = array('posx' => '69', 'posy' => '3', 'data' => $this->logo3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '3', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_54 = array('posx' => '69', 'posy' => '4', 'data' => $this->logo4[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '3', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_55 = array('posx' => '69', 'posy' => '5', 'data' => $this->logo5[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '3', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_56 = array('posx' => '69', 'posy' => '6', 'data' => $this->logo6[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '3', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_57 = array('posx' => '69', 'posy' => '7', 'data' => $this->logo7[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '3', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_58 = array('posx' => '69', 'posy' => '8', 'data' => $this->logo8[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '3', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_59 = array('posx' => '69', 'posy' => '9', 'data' => $this->logo9[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '3', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_60 = array('posx' => '69', 'posy' => '10', 'data' => $this->logo10[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '3', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_61 = array('posx' => '69', 'posy' => '11', 'data' => $this->logo11[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '3', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_62 = array('posx' => '69', 'posy' => '12', 'data' => $this->logo12[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '3', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_poli = array('posx' => '36', 'posy' => '45', 'data' => $this->poli[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_no_pay = array('posx' => '32', 'posy' => '16.5', 'data' => $this->nopayment[$this->nm_grid_colunas], 'width'      => '30', 'align'      => 'C', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);


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

            $this->Pdf->SetFont($cell_paidDate['font_type'], $cell_paidDate['font_style'], $cell_paidDate['font_size']);
            $this->pdf_text_color($cell_paidDate['data'], $cell_paidDate['color_r'], $cell_paidDate['color_g'], $cell_paidDate['color_b']);
            if (!empty($cell_paidDate['posx']) && !empty($cell_paidDate['posy']))
            {
                $this->Pdf->SetXY($cell_paidDate['posx'], $cell_paidDate['posy']);
            }
            elseif (!empty($cell_paidDate['posx']))
            {
                $this->Pdf->SetX($cell_paidDate['posx']);
            }
            elseif (!empty($cell_paidDate['posy']))
            {
                $this->Pdf->SetY($cell_paidDate['posy']);
            }
            $this->Pdf->Cell($cell_paidDate['width'], 0, $cell_paidDate['data'], 0, 0, $cell_paidDate['align']);

            $this->Pdf->SetFont($cell_Jam['font_type'], $cell_Jam['font_style'], $cell_Jam['font_size']);
            $this->pdf_text_color($cell_Jam['data'], $cell_Jam['color_r'], $cell_Jam['color_g'], $cell_Jam['color_b']);
            if (!empty($cell_Jam['posx']) && !empty($cell_Jam['posy']))
            {
                $this->Pdf->SetXY($cell_Jam['posx'], $cell_Jam['posy']);
            }
            elseif (!empty($cell_Jam['posx']))
            {
                $this->Pdf->SetX($cell_Jam['posx']);
            }
            elseif (!empty($cell_Jam['posy']))
            {
                $this->Pdf->SetY($cell_Jam['posy']);
            }
            $this->Pdf->Cell($cell_Jam['width'], 0, $cell_Jam['data'], 0, 0, $cell_Jam['align']);

            $this->Pdf->SetFont($cell_kasir['font_type'], $cell_kasir['font_style'], $cell_kasir['font_size']);
            $this->pdf_text_color($cell_kasir['data'], $cell_kasir['color_r'], $cell_kasir['color_g'], $cell_kasir['color_b']);
            if (!empty($cell_kasir['posx']) && !empty($cell_kasir['posy']))
            {
                $this->Pdf->SetXY($cell_kasir['posx'], $cell_kasir['posy']);
            }
            elseif (!empty($cell_kasir['posx']))
            {
                $this->Pdf->SetX($cell_kasir['posx']);
            }
            elseif (!empty($cell_kasir['posy']))
            {
                $this->Pdf->SetY($cell_kasir['posy']);
            }
            $this->Pdf->Cell($cell_kasir['width'], 0, $cell_kasir['data'], 0, 0, $cell_kasir['align']);

            $this->Pdf->SetFont($cell_line['font_type'], $cell_line['font_style'], $cell_line['font_size']);
            $this->pdf_text_color($cell_line['data'], $cell_line['color_r'], $cell_line['color_g'], $cell_line['color_b']);
            if (!empty($cell_line['posx']) && !empty($cell_line['posy']))
            {
                $this->Pdf->SetXY($cell_line['posx'], $cell_line['posy']);
            }
            elseif (!empty($cell_line['posx']))
            {
                $this->Pdf->SetX($cell_line['posx']);
            }
            elseif (!empty($cell_line['posy']))
            {
                $this->Pdf->SetY($cell_line['posy']);
            }
            $this->Pdf->Cell($cell_line['width'], 0, $cell_line['data'], 0, 0, $cell_line['align']);

            $this->Pdf->SetFont($cell_line2['font_type'], $cell_line2['font_style'], $cell_line2['font_size']);
            $this->pdf_text_color($cell_line2['data'], $cell_line2['color_r'], $cell_line2['color_g'], $cell_line2['color_b']);
            if (!empty($cell_line2['posx']) && !empty($cell_line2['posy']))
            {
                $this->Pdf->SetXY($cell_line2['posx'], $cell_line2['posy']);
            }
            elseif (!empty($cell_line2['posx']))
            {
                $this->Pdf->SetX($cell_line2['posx']);
            }
            elseif (!empty($cell_line2['posy']))
            {
                $this->Pdf->SetY($cell_line2['posy']);
            }
            $this->Pdf->Cell($cell_line2['width'], 0, $cell_line2['data'], 0, 0, $cell_line2['align']);

            $this->Pdf->SetFont($cell_line3['font_type'], $cell_line3['font_style'], $cell_line3['font_size']);
            $this->pdf_text_color($cell_line3['data'], $cell_line3['color_r'], $cell_line3['color_g'], $cell_line3['color_b']);
            if (!empty($cell_line3['posx']) && !empty($cell_line3['posy']))
            {
                $this->Pdf->SetXY($cell_line3['posx'], $cell_line3['posy']);
            }
            elseif (!empty($cell_line3['posx']))
            {
                $this->Pdf->SetX($cell_line3['posx']);
            }
            elseif (!empty($cell_line3['posy']))
            {
                $this->Pdf->SetY($cell_line3['posy']);
            }
            $this->Pdf->Cell($cell_line3['width'], 0, $cell_line3['data'], 0, 0, $cell_line3['align']);

            $this->Pdf->SetFont($cell_header['font_type'], $cell_header['font_style'], $cell_header['font_size']);
            $this->pdf_text_color($cell_header['data'], $cell_header['color_r'], $cell_header['color_g'], $cell_header['color_b']);
            if (!empty($cell_header['posx']) && !empty($cell_header['posy']))
            {
                $this->Pdf->SetXY($cell_header['posx'], $cell_header['posy']);
            }
            elseif (!empty($cell_header['posx']))
            {
                $this->Pdf->SetX($cell_header['posx']);
            }
            elseif (!empty($cell_header['posy']))
            {
                $this->Pdf->SetY($cell_header['posy']);
            }
            $this->Pdf->Cell($cell_header['width'], 0, $cell_header['data'], 0, 0, $cell_header['align']);

            $this->Pdf->SetFont($cell_alamat1['font_type'], $cell_alamat1['font_style'], $cell_alamat1['font_size']);
            $this->pdf_text_color($cell_alamat1['data'], $cell_alamat1['color_r'], $cell_alamat1['color_g'], $cell_alamat1['color_b']);
            if (!empty($cell_alamat1['posx']) && !empty($cell_alamat1['posy']))
            {
                $this->Pdf->SetXY($cell_alamat1['posx'], $cell_alamat1['posy']);
            }
            elseif (!empty($cell_alamat1['posx']))
            {
                $this->Pdf->SetX($cell_alamat1['posx']);
            }
            elseif (!empty($cell_alamat1['posy']))
            {
                $this->Pdf->SetY($cell_alamat1['posy']);
            }
            $this->Pdf->Cell($cell_alamat1['width'], 0, $cell_alamat1['data'], 0, 0, $cell_alamat1['align']);

            $this->Pdf->SetFont($cell_alamat2['font_type'], $cell_alamat2['font_style'], $cell_alamat2['font_size']);
            $this->pdf_text_color($cell_alamat2['data'], $cell_alamat2['color_r'], $cell_alamat2['color_g'], $cell_alamat2['color_b']);
            if (!empty($cell_alamat2['posx']) && !empty($cell_alamat2['posy']))
            {
                $this->Pdf->SetXY($cell_alamat2['posx'], $cell_alamat2['posy']);
            }
            elseif (!empty($cell_alamat2['posx']))
            {
                $this->Pdf->SetX($cell_alamat2['posx']);
            }
            elseif (!empty($cell_alamat2['posy']))
            {
                $this->Pdf->SetY($cell_alamat2['posy']);
            }
            $this->Pdf->Cell($cell_alamat2['width'], 0, $cell_alamat2['data'], 0, 0, $cell_alamat2['align']);

            $this->Pdf->SetFont($cell_acc['font_type'], $cell_acc['font_style'], $cell_acc['font_size']);
            $this->pdf_text_color($cell_acc['data'], $cell_acc['color_r'], $cell_acc['color_g'], $cell_acc['color_b']);
            if (!empty($cell_acc['posx']) && !empty($cell_acc['posy']))
            {
                $this->Pdf->SetXY($cell_acc['posx'], $cell_acc['posy']);
            }
            elseif (!empty($cell_acc['posx']))
            {
                $this->Pdf->SetX($cell_acc['posx']);
            }
            elseif (!empty($cell_acc['posy']))
            {
                $this->Pdf->SetY($cell_acc['posy']);
            }
            $this->Pdf->Cell($cell_acc['width'], 0, $cell_acc['data'], 0, 0, $cell_acc['align']);

            $this->Pdf->SetFont($cell_uang['font_type'], $cell_uang['font_style'], $cell_uang['font_size']);
            $this->pdf_text_color($cell_uang['data'], $cell_uang['color_r'], $cell_uang['color_g'], $cell_uang['color_b']);
            if (!empty($cell_uang['posx']) && !empty($cell_uang['posy']))
            {
                $this->Pdf->SetXY($cell_uang['posx'], $cell_uang['posy']);
            }
            elseif (!empty($cell_uang['posx']))
            {
                $this->Pdf->SetX($cell_uang['posx']);
            }
            elseif (!empty($cell_uang['posy']))
            {
                $this->Pdf->SetY($cell_uang['posy']);
            }
            $this->Pdf->Cell($cell_uang['width'], 0, $cell_uang['data'], 0, 0, $cell_uang['align']);

            $this->Pdf->SetFont($cell_pasien['font_type'], $cell_pasien['font_style'], $cell_pasien['font_size']);
            $this->pdf_text_color($cell_pasien['data'], $cell_pasien['color_r'], $cell_pasien['color_g'], $cell_pasien['color_b']);
            if (!empty($cell_pasien['posx']) && !empty($cell_pasien['posy']))
            {
                $this->Pdf->SetXY($cell_pasien['posx'], $cell_pasien['posy']);
            }
            elseif (!empty($cell_pasien['posx']))
            {
                $this->Pdf->SetX($cell_pasien['posx']);
            }
            elseif (!empty($cell_pasien['posy']))
            {
                $this->Pdf->SetY($cell_pasien['posy']);
            }
            $this->Pdf->Cell($cell_pasien['width'], 0, $cell_pasien['data'], 0, 0, $cell_pasien['align']);

            $this->Pdf->SetFont($cell_dok['font_type'], $cell_dok['font_style'], $cell_dok['font_size']);
            $this->pdf_text_color($cell_dok['data'], $cell_dok['color_r'], $cell_dok['color_g'], $cell_dok['color_b']);
            if (!empty($cell_dok['posx']) && !empty($cell_dok['posy']))
            {
                $this->Pdf->SetXY($cell_dok['posx'], $cell_dok['posy']);
            }
            elseif (!empty($cell_dok['posx']))
            {
                $this->Pdf->SetX($cell_dok['posx']);
            }
            elseif (!empty($cell_dok['posy']))
            {
                $this->Pdf->SetY($cell_dok['posy']);
            }
            $this->Pdf->Cell($cell_dok['width'], 0, $cell_dok['data'], 0, 0, $cell_dok['align']);

            $this->Pdf->SetFont($cell_pol['font_type'], $cell_pol['font_style'], $cell_pol['font_size']);
            $this->pdf_text_color($cell_pol['data'], $cell_pol['color_r'], $cell_pol['color_g'], $cell_pol['color_b']);
            if (!empty($cell_pol['posx']) && !empty($cell_pol['posy']))
            {
                $this->Pdf->SetXY($cell_pol['posx'], $cell_pol['posy']);
            }
            elseif (!empty($cell_pol['posx']))
            {
                $this->Pdf->SetX($cell_pol['posx']);
            }
            elseif (!empty($cell_pol['posy']))
            {
                $this->Pdf->SetY($cell_pol['posy']);
            }
            $this->Pdf->Cell($cell_pol['width'], 0, $cell_pol['data'], 0, 0, $cell_pol['align']);

            $this->Pdf->SetFont($cell_t_bayar['font_type'], $cell_t_bayar['font_style'], $cell_t_bayar['font_size']);
            $this->pdf_text_color($cell_t_bayar['data'], $cell_t_bayar['color_r'], $cell_t_bayar['color_g'], $cell_t_bayar['color_b']);
            if (!empty($cell_t_bayar['posx']) && !empty($cell_t_bayar['posy']))
            {
                $this->Pdf->SetXY($cell_t_bayar['posx'], $cell_t_bayar['posy']);
            }
            elseif (!empty($cell_t_bayar['posx']))
            {
                $this->Pdf->SetX($cell_t_bayar['posx']);
            }
            elseif (!empty($cell_t_bayar['posy']))
            {
                $this->Pdf->SetY($cell_t_bayar['posy']);
            }
            $this->Pdf->Cell($cell_t_bayar['width'], 0, $cell_t_bayar['data'], 0, 0, $cell_t_bayar['align']);

            $this->Pdf->SetFont($cell_u_p['font_type'], $cell_u_p['font_style'], $cell_u_p['font_size']);
            $this->pdf_text_color($cell_u_p['data'], $cell_u_p['color_r'], $cell_u_p['color_g'], $cell_u_p['color_b']);
            if (!empty($cell_u_p['posx']) && !empty($cell_u_p['posy']))
            {
                $this->Pdf->SetXY($cell_u_p['posx'], $cell_u_p['posy']);
            }
            elseif (!empty($cell_u_p['posx']))
            {
                $this->Pdf->SetX($cell_u_p['posx']);
            }
            elseif (!empty($cell_u_p['posy']))
            {
                $this->Pdf->SetY($cell_u_p['posy']);
            }
            $this->Pdf->Cell($cell_u_p['width'], 0, $cell_u_p['data'], 0, 0, $cell_u_p['align']);

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

            $this->Pdf->SetFont($cell_jm['font_type'], $cell_jm['font_style'], $cell_jm['font_size']);
            $this->pdf_text_color($cell_jm['data'], $cell_jm['color_r'], $cell_jm['color_g'], $cell_jm['color_b']);
            if (!empty($cell_jm['posx']) && !empty($cell_jm['posy']))
            {
                $this->Pdf->SetXY($cell_jm['posx'], $cell_jm['posy']);
            }
            elseif (!empty($cell_jm['posx']))
            {
                $this->Pdf->SetX($cell_jm['posx']);
            }
            elseif (!empty($cell_jm['posy']))
            {
                $this->Pdf->SetY($cell_jm['posy']);
            }
            $this->Pdf->Cell($cell_jm['width'], 0, $cell_jm['data'], 0, 0, $cell_jm['align']);

            $this->Pdf->SetFont($cell_ksr['font_type'], $cell_ksr['font_style'], $cell_ksr['font_size']);
            $this->pdf_text_color($cell_ksr['data'], $cell_ksr['color_r'], $cell_ksr['color_g'], $cell_ksr['color_b']);
            if (!empty($cell_ksr['posx']) && !empty($cell_ksr['posy']))
            {
                $this->Pdf->SetXY($cell_ksr['posx'], $cell_ksr['posy']);
            }
            elseif (!empty($cell_ksr['posx']))
            {
                $this->Pdf->SetX($cell_ksr['posx']);
            }
            elseif (!empty($cell_ksr['posy']))
            {
                $this->Pdf->SetY($cell_ksr['posy']);
            }
            $this->Pdf->Cell($cell_ksr['width'], 0, $cell_ksr['data'], 0, 0, $cell_ksr['align']);

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

            $this->Pdf->SetFont($cell_bayar['font_type'], $cell_bayar['font_style'], $cell_bayar['font_size']);
            $this->pdf_text_color($cell_bayar['data'], $cell_bayar['color_r'], $cell_bayar['color_g'], $cell_bayar['color_b']);
            if (!empty($cell_bayar['posx']) && !empty($cell_bayar['posy']))
            {
                $this->Pdf->SetXY($cell_bayar['posx'], $cell_bayar['posy']);
            }
            elseif (!empty($cell_bayar['posx']))
            {
                $this->Pdf->SetX($cell_bayar['posx']);
            }
            elseif (!empty($cell_bayar['posy']))
            {
                $this->Pdf->SetY($cell_bayar['posy']);
            }
            $this->Pdf->Cell($cell_bayar['width'], 0, $cell_bayar['data'], 0, 0, $cell_bayar['align']);

            $this->Pdf->SetFont($cell_kembali['font_type'], $cell_kembali['font_style'], $cell_kembali['font_size']);
            $this->pdf_text_color($cell_kembali['data'], $cell_kembali['color_r'], $cell_kembali['color_g'], $cell_kembali['color_b']);
            if (!empty($cell_kembali['posx']) && !empty($cell_kembali['posy']))
            {
                $this->Pdf->SetXY($cell_kembali['posx'], $cell_kembali['posy']);
            }
            elseif (!empty($cell_kembali['posx']))
            {
                $this->Pdf->SetX($cell_kembali['posx']);
            }
            elseif (!empty($cell_kembali['posy']))
            {
                $this->Pdf->SetY($cell_kembali['posy']);
            }
            $this->Pdf->Cell($cell_kembali['width'], 0, $cell_kembali['data'], 0, 0, $cell_kembali['align']);

            $this->Pdf->SetFont($cell_bukti_sah['font_type'], $cell_bukti_sah['font_style'], $cell_bukti_sah['font_size']);
            $this->pdf_text_color($cell_bukti_sah['data'], $cell_bukti_sah['color_r'], $cell_bukti_sah['color_g'], $cell_bukti_sah['color_b']);
            if (!empty($cell_bukti_sah['posx']) && !empty($cell_bukti_sah['posy']))
            {
                $this->Pdf->SetXY($cell_bukti_sah['posx'], $cell_bukti_sah['posy']);
            }
            elseif (!empty($cell_bukti_sah['posx']))
            {
                $this->Pdf->SetX($cell_bukti_sah['posx']);
            }
            elseif (!empty($cell_bukti_sah['posy']))
            {
                $this->Pdf->SetY($cell_bukti_sah['posy']);
            }
            $this->Pdf->Cell($cell_bukti_sah['width'], 0, $cell_bukti_sah['data'], 0, 0, $cell_bukti_sah['align']);

            $this->Pdf->SetFont($cell_bukti_sah2['font_type'], $cell_bukti_sah2['font_style'], $cell_bukti_sah2['font_size']);
            $this->pdf_text_color($cell_bukti_sah2['data'], $cell_bukti_sah2['color_r'], $cell_bukti_sah2['color_g'], $cell_bukti_sah2['color_b']);
            if (!empty($cell_bukti_sah2['posx']) && !empty($cell_bukti_sah2['posy']))
            {
                $this->Pdf->SetXY($cell_bukti_sah2['posx'], $cell_bukti_sah2['posy']);
            }
            elseif (!empty($cell_bukti_sah2['posx']))
            {
                $this->Pdf->SetX($cell_bukti_sah2['posx']);
            }
            elseif (!empty($cell_bukti_sah2['posy']))
            {
                $this->Pdf->SetY($cell_bukti_sah2['posy']);
            }
            $this->Pdf->Cell($cell_bukti_sah2['width'], 0, $cell_bukti_sah2['data'], 0, 0, $cell_bukti_sah2['align']);

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

            $this->Pdf->SetFont($cell_terbilang2['font_type'], $cell_terbilang2['font_style'], $cell_terbilang2['font_size']);
            $this->pdf_text_color($cell_terbilang2['data'], $cell_terbilang2['color_r'], $cell_terbilang2['color_g'], $cell_terbilang2['color_b']);
            if (!empty($cell_terbilang2['posx']) && !empty($cell_terbilang2['posy']))
            {
                $this->Pdf->SetXY($cell_terbilang2['posx'], $cell_terbilang2['posy']);
            }
            elseif (!empty($cell_terbilang2['posx']))
            {
                $this->Pdf->SetX($cell_terbilang2['posx']);
            }
            elseif (!empty($cell_terbilang2['posy']))
            {
                $this->Pdf->SetY($cell_terbilang2['posy']);
            }
            $this->Pdf->Cell($cell_terbilang2['width'], 0, $cell_terbilang2['data'], 0, 0, $cell_terbilang2['align']);

            $this->Pdf->SetY(61);
            foreach ($this->detail[$this->nm_grid_colunas] as $NM_ind => $Dados)
            {
                $this->Pdf->SetFont($cell_detail_URAIAN['font_type'], $cell_detail_URAIAN['font_style'], $cell_detail_URAIAN['font_size']);
                if (!empty($cell_detail_URAIAN['posx']))
                {
                    $this->Pdf->SetX($cell_detail_URAIAN['posx']);
                }
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->SetTextColor($cell_detail_URAIAN['color_r'], $cell_detail_URAIAN['color_g'], $cell_detail_URAIAN['color_b']);
                $this->Pdf->writeHTMLCell($cell_detail_URAIAN['width'], 0, $atu_X, $atu_Y, $this->detail_uraian[$this->nm_grid_colunas][$NM_ind], 0, 0, false, true, $cell_detail_URAIAN['align']);
                $this->Pdf->SetY($atu_Y);
                $this->Pdf->SetFont($cell_detail_biaya['font_type'], $cell_detail_biaya['font_style'], $cell_detail_biaya['font_size']);
                if (!empty($cell_detail_biaya['posx']))
                {
                    $this->Pdf->SetX($cell_detail_biaya['posx']);
                }
                $this->pdf_text_color($this->detail_biaya[$this->nm_grid_colunas][$NM_ind], $cell_detail_biaya['color_r'], $cell_detail_biaya['color_g'], $cell_detail_biaya['color_b']);
                $this->Pdf->Cell($cell_detail_biaya['width'], 0, $this->detail_biaya[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_detail_biaya['align']);
                if (!isset($max_Y) || empty($max_Y) || $this->Pdf->GetY() < $max_Y )
                {
                    $max_Y = $this->Pdf->GetY();
                }
                $max_Y += 5;
                $this->Pdf->SetY($max_Y);

            }

            $this->Pdf->SetFont($cell_51['font_type'], $cell_51['font_style'], $cell_51['font_size']);
            $this->pdf_text_color($cell_51['data'], $cell_51['color_r'], $cell_51['color_g'], $cell_51['color_b']);
            if (!empty($cell_51['posx']) && !empty($cell_51['posy']))
            {
                $this->Pdf->SetXY($cell_51['posx'], $cell_51['posy']);
            }
            elseif (!empty($cell_51['posx']))
            {
                $this->Pdf->SetX($cell_51['posx']);
            }
            elseif (!empty($cell_51['posy']))
            {
                $this->Pdf->SetY($cell_51['posy']);
            }
            $this->Pdf->Cell($cell_51['width'], 0, $cell_51['data'], 0, 0, $cell_51['align']);

            $this->Pdf->SetFont($cell_52['font_type'], $cell_52['font_style'], $cell_52['font_size']);
            $this->pdf_text_color($cell_52['data'], $cell_52['color_r'], $cell_52['color_g'], $cell_52['color_b']);
            if (!empty($cell_52['posx']) && !empty($cell_52['posy']))
            {
                $this->Pdf->SetXY($cell_52['posx'], $cell_52['posy']);
            }
            elseif (!empty($cell_52['posx']))
            {
                $this->Pdf->SetX($cell_52['posx']);
            }
            elseif (!empty($cell_52['posy']))
            {
                $this->Pdf->SetY($cell_52['posy']);
            }
            $this->Pdf->Cell($cell_52['width'], 0, $cell_52['data'], 0, 0, $cell_52['align']);

            $this->Pdf->SetFont($cell_53['font_type'], $cell_53['font_style'], $cell_53['font_size']);
            $this->pdf_text_color($cell_53['data'], $cell_53['color_r'], $cell_53['color_g'], $cell_53['color_b']);
            if (!empty($cell_53['posx']) && !empty($cell_53['posy']))
            {
                $this->Pdf->SetXY($cell_53['posx'], $cell_53['posy']);
            }
            elseif (!empty($cell_53['posx']))
            {
                $this->Pdf->SetX($cell_53['posx']);
            }
            elseif (!empty($cell_53['posy']))
            {
                $this->Pdf->SetY($cell_53['posy']);
            }
            $this->Pdf->Cell($cell_53['width'], 0, $cell_53['data'], 0, 0, $cell_53['align']);

            $this->Pdf->SetFont($cell_54['font_type'], $cell_54['font_style'], $cell_54['font_size']);
            $this->pdf_text_color($cell_54['data'], $cell_54['color_r'], $cell_54['color_g'], $cell_54['color_b']);
            if (!empty($cell_54['posx']) && !empty($cell_54['posy']))
            {
                $this->Pdf->SetXY($cell_54['posx'], $cell_54['posy']);
            }
            elseif (!empty($cell_54['posx']))
            {
                $this->Pdf->SetX($cell_54['posx']);
            }
            elseif (!empty($cell_54['posy']))
            {
                $this->Pdf->SetY($cell_54['posy']);
            }
            $this->Pdf->Cell($cell_54['width'], 0, $cell_54['data'], 0, 0, $cell_54['align']);

            $this->Pdf->SetFont($cell_55['font_type'], $cell_55['font_style'], $cell_55['font_size']);
            $this->pdf_text_color($cell_55['data'], $cell_55['color_r'], $cell_55['color_g'], $cell_55['color_b']);
            if (!empty($cell_55['posx']) && !empty($cell_55['posy']))
            {
                $this->Pdf->SetXY($cell_55['posx'], $cell_55['posy']);
            }
            elseif (!empty($cell_55['posx']))
            {
                $this->Pdf->SetX($cell_55['posx']);
            }
            elseif (!empty($cell_55['posy']))
            {
                $this->Pdf->SetY($cell_55['posy']);
            }
            $this->Pdf->Cell($cell_55['width'], 0, $cell_55['data'], 0, 0, $cell_55['align']);

            $this->Pdf->SetFont($cell_56['font_type'], $cell_56['font_style'], $cell_56['font_size']);
            $this->pdf_text_color($cell_56['data'], $cell_56['color_r'], $cell_56['color_g'], $cell_56['color_b']);
            if (!empty($cell_56['posx']) && !empty($cell_56['posy']))
            {
                $this->Pdf->SetXY($cell_56['posx'], $cell_56['posy']);
            }
            elseif (!empty($cell_56['posx']))
            {
                $this->Pdf->SetX($cell_56['posx']);
            }
            elseif (!empty($cell_56['posy']))
            {
                $this->Pdf->SetY($cell_56['posy']);
            }
            $this->Pdf->Cell($cell_56['width'], 0, $cell_56['data'], 0, 0, $cell_56['align']);

            $this->Pdf->SetFont($cell_57['font_type'], $cell_57['font_style'], $cell_57['font_size']);
            $this->pdf_text_color($cell_57['data'], $cell_57['color_r'], $cell_57['color_g'], $cell_57['color_b']);
            if (!empty($cell_57['posx']) && !empty($cell_57['posy']))
            {
                $this->Pdf->SetXY($cell_57['posx'], $cell_57['posy']);
            }
            elseif (!empty($cell_57['posx']))
            {
                $this->Pdf->SetX($cell_57['posx']);
            }
            elseif (!empty($cell_57['posy']))
            {
                $this->Pdf->SetY($cell_57['posy']);
            }
            $this->Pdf->Cell($cell_57['width'], 0, $cell_57['data'], 0, 0, $cell_57['align']);

            $this->Pdf->SetFont($cell_58['font_type'], $cell_58['font_style'], $cell_58['font_size']);
            $this->pdf_text_color($cell_58['data'], $cell_58['color_r'], $cell_58['color_g'], $cell_58['color_b']);
            if (!empty($cell_58['posx']) && !empty($cell_58['posy']))
            {
                $this->Pdf->SetXY($cell_58['posx'], $cell_58['posy']);
            }
            elseif (!empty($cell_58['posx']))
            {
                $this->Pdf->SetX($cell_58['posx']);
            }
            elseif (!empty($cell_58['posy']))
            {
                $this->Pdf->SetY($cell_58['posy']);
            }
            $this->Pdf->Cell($cell_58['width'], 0, $cell_58['data'], 0, 0, $cell_58['align']);

            $this->Pdf->SetFont($cell_59['font_type'], $cell_59['font_style'], $cell_59['font_size']);
            $this->pdf_text_color($cell_59['data'], $cell_59['color_r'], $cell_59['color_g'], $cell_59['color_b']);
            if (!empty($cell_59['posx']) && !empty($cell_59['posy']))
            {
                $this->Pdf->SetXY($cell_59['posx'], $cell_59['posy']);
            }
            elseif (!empty($cell_59['posx']))
            {
                $this->Pdf->SetX($cell_59['posx']);
            }
            elseif (!empty($cell_59['posy']))
            {
                $this->Pdf->SetY($cell_59['posy']);
            }
            $this->Pdf->Cell($cell_59['width'], 0, $cell_59['data'], 0, 0, $cell_59['align']);

            $this->Pdf->SetFont($cell_60['font_type'], $cell_60['font_style'], $cell_60['font_size']);
            $this->pdf_text_color($cell_60['data'], $cell_60['color_r'], $cell_60['color_g'], $cell_60['color_b']);
            if (!empty($cell_60['posx']) && !empty($cell_60['posy']))
            {
                $this->Pdf->SetXY($cell_60['posx'], $cell_60['posy']);
            }
            elseif (!empty($cell_60['posx']))
            {
                $this->Pdf->SetX($cell_60['posx']);
            }
            elseif (!empty($cell_60['posy']))
            {
                $this->Pdf->SetY($cell_60['posy']);
            }
            $this->Pdf->Cell($cell_60['width'], 0, $cell_60['data'], 0, 0, $cell_60['align']);

            $this->Pdf->SetFont($cell_61['font_type'], $cell_61['font_style'], $cell_61['font_size']);
            $this->pdf_text_color($cell_61['data'], $cell_61['color_r'], $cell_61['color_g'], $cell_61['color_b']);
            if (!empty($cell_61['posx']) && !empty($cell_61['posy']))
            {
                $this->Pdf->SetXY($cell_61['posx'], $cell_61['posy']);
            }
            elseif (!empty($cell_61['posx']))
            {
                $this->Pdf->SetX($cell_61['posx']);
            }
            elseif (!empty($cell_61['posy']))
            {
                $this->Pdf->SetY($cell_61['posy']);
            }
            $this->Pdf->Cell($cell_61['width'], 0, $cell_61['data'], 0, 0, $cell_61['align']);

            $this->Pdf->SetFont($cell_62['font_type'], $cell_62['font_style'], $cell_62['font_size']);
            $this->pdf_text_color($cell_62['data'], $cell_62['color_r'], $cell_62['color_g'], $cell_62['color_b']);
            if (!empty($cell_62['posx']) && !empty($cell_62['posy']))
            {
                $this->Pdf->SetXY($cell_62['posx'], $cell_62['posy']);
            }
            elseif (!empty($cell_62['posx']))
            {
                $this->Pdf->SetX($cell_62['posx']);
            }
            elseif (!empty($cell_62['posy']))
            {
                $this->Pdf->SetY($cell_62['posy']);
            }
            $this->Pdf->Cell($cell_62['width'], 0, $cell_62['data'], 0, 0, $cell_62['align']);

            $this->Pdf->SetFont($cell_poli['font_type'], $cell_poli['font_style'], $cell_poli['font_size']);
            $this->pdf_text_color($cell_poli['data'], $cell_poli['color_r'], $cell_poli['color_g'], $cell_poli['color_b']);
            if (!empty($cell_poli['posx']) && !empty($cell_poli['posy']))
            {
                $this->Pdf->SetXY($cell_poli['posx'], $cell_poli['posy']);
            }
            elseif (!empty($cell_poli['posx']))
            {
                $this->Pdf->SetX($cell_poli['posx']);
            }
            elseif (!empty($cell_poli['posy']))
            {
                $this->Pdf->SetY($cell_poli['posy']);
            }
            $this->Pdf->Cell($cell_poli['width'], 0, $cell_poli['data'], 0, 0, $cell_poli['align']);

            $this->Pdf->SetFont($cell_no_pay['font_type'], $cell_no_pay['font_style'], $cell_no_pay['font_size']);
            $this->pdf_text_color($cell_no_pay['data'], $cell_no_pay['color_r'], $cell_no_pay['color_g'], $cell_no_pay['color_b']);
            if (!empty($cell_no_pay['posx']) && !empty($cell_no_pay['posy']))
            {
                $this->Pdf->SetXY($cell_no_pay['posx'], $cell_no_pay['posy']);
            }
            elseif (!empty($cell_no_pay['posx']))
            {
                $this->Pdf->SetX($cell_no_pay['posx']);
            }
            elseif (!empty($cell_no_pay['posy']))
            {
                $this->Pdf->SetY($cell_no_pay['posy']);
            }
            $this->Pdf->Cell($cell_no_pay['width'], 0, $cell_no_pay['data'], 0, 0, $cell_no_pay['align']);


			$this->Pdf->SetTitle({No Payment});
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
$_SESSION['scriptcase']['pdfreport_tbpayment']['contr_erro'] = 'on';
  
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

$_SESSION['scriptcase']['pdfreport_tbpayment']['contr_erro'] = 'off';
}
function terbilang($x, $style=4) {
$_SESSION['scriptcase']['pdfreport_tbpayment']['contr_erro'] = 'on';
  
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

$_SESSION['scriptcase']['pdfreport_tbpayment']['contr_erro'] = 'off';
}
function cutText($text, $length, $mode = 2)
{
$_SESSION['scriptcase']['pdfreport_tbpayment']['contr_erro'] = 'on';
  
	if ($mode != 1)
	{
		$char = $text{$length - 1};
		switch($mode)
		{
			case 2: 
				while($char != ' ') {
					$char = $text{--$length};
				}
			case 3:
				while($char != ' ') {
					$char = $text{++$num_char};
				}
		}
	}
	return substr($text, 0, $length);

$_SESSION['scriptcase']['pdfreport_tbpayment']['contr_erro'] = 'off';
}
function cutText2($text, $length, $mode = 2)
{
$_SESSION['scriptcase']['pdfreport_tbpayment']['contr_erro'] = 'on';
  
	if ($mode != 1)
	{
		$char = $text{$length - 1};
		switch($mode)
		{
			case 2: 
				while($char != ' ') {
					$char = $text{--$length};
				}
			case 3:
				while($char != ' ') {
					$char = $text{++$num_char};
				}
		}
	}
	return substr($text, 25, $length);

$_SESSION['scriptcase']['pdfreport_tbpayment']['contr_erro'] = 'off';
}
}
?>
