<?php
class pdfreport_tbadmrawatinap_grid
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
   var $array_date = array();
   var $array_nama = array();
   var $date = array();
   var $kasir = array();
   var $nama = array();
   var $tgl_plg = array();
   var $umur_jk = array();
   var $trancode = array();
   var $custcode = array();
   var $tglmasuk = array();
   var $caramasuk = array();
   var $unitasal = array();
   var $doctor = array();
   var $struckno = array();
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
   $Tp_papel = array(148.5, 210);
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
   $_SESSION['scriptcase']['pdfreport_tbadmrawatinap']['default_font'] = $this->default_font;
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
           if (in_array("pdfreport_tbadmrawatinap", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['campos_busca'];
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
       $this->custcode[0] = $Busca_temp['custcode']; 
       $tmp_pos = strpos($this->custcode[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->custcode[0]))
       {
           $this->custcode[0] = substr($this->custcode[0], 0, $tmp_pos);
       }
       $this->tglmasuk[0] = $Busca_temp['tglmasuk']; 
       $tmp_pos = strpos($this->tglmasuk[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->tglmasuk[0]))
       {
           $this->tglmasuk[0] = substr($this->tglmasuk[0], 0, $tmp_pos);
       }
       $tglmasuk_2 = $Busca_temp['tglmasuk_input_2']; 
       $this->tglmasuk_2 = $Busca_temp['tglmasuk_input_2']; 
       $this->caramasuk[0] = $Busca_temp['caramasuk']; 
       $tmp_pos = strpos($this->caramasuk[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->caramasuk[0]))
       {
           $this->caramasuk[0] = substr($this->caramasuk[0], 0, $tmp_pos);
       }
       $this->struckno[0] = $Busca_temp['struckno']; 
       $tmp_pos = strpos($this->struckno[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->struckno[0]))
       {
           $this->struckno[0] = substr($this->struckno[0], 0, $tmp_pos);
       }
   } 
   else 
   { 
       $this->tglmasuk_2 = ""; 
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbadmrawatinap']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbadmrawatinap']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbadmrawatinap']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbadmrawatinap']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['where_orig'] = " where tranCode = '" . $_SESSION['var_pulang'] . "'";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT tranCode, custCode, str_replace (convert(char(10),tglMasuk,102), '.', '-') + ' ' + convert(char(8),tglMasuk,20), caraMasuk, unitAsal, doctor, struckNo from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT tranCode, custCode, tglMasuk, caraMasuk, unitAsal, doctor, struckNo from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT tranCode, custCode, convert(char(23),tglMasuk,121), caraMasuk, unitAsal, doctor, struckNo from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT tranCode, custCode, tglMasuk, caraMasuk, unitAsal, doctor, struckNo from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT tranCode, custCode, EXTEND(tglMasuk, YEAR TO FRACTION), caraMasuk, unitAsal, doctor, struckNo from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT tranCode, custCode, tglMasuk, caraMasuk, unitAsal, doctor, struckNo from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['order_grid'] = $nmgp_order_by;
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
   $this->Pdf->Image($this->NM_raiz_img . $this->Ini->path_img_global . "/grp__NM__bg__NM__SURAT IZIN PULANG.jpg", "0.000000", "0.000000", "210", "148.5", '', '', '', false, 300, '', false, false, 0);
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['labels']['trancode'] = "Tran Code";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['labels']['custcode'] = "Cust Code";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['labels']['tglmasuk'] = "Tgl Masuk";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['labels']['caramasuk'] = "Cara Masuk";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['labels']['unitasal'] = "Unit Asal";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['labels']['doctor'] = "Doctor";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['labels']['struckno'] = "Struck No";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['labels']['date'] = "date";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['labels']['kasir'] = "kasir";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['labels']['nama'] = "nama";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['labels']['tgl_plg'] = "tgl_plg";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['labels']['umur_jk'] = "umur_jk";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbadmrawatinap']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbadmrawatinap']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbadmrawatinap']['lig_edit'];
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
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbadmrawatinap']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->trancode[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->custcode[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->tglmasuk[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->caramasuk[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->unitasal[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->doctor[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->struckno[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->struckno[$this->nm_grid_colunas] = (string)$this->struckno[$this->nm_grid_colunas];
          $this->date[$this->nm_grid_colunas] = "";
          $this->kasir[$this->nm_grid_colunas] = "";
          $this->nama[$this->nm_grid_colunas] = "";
          $this->tgl_plg[$this->nm_grid_colunas] = "";
          $this->umur_jk[$this->nm_grid_colunas] = "";
          $this->Lookup->lookup_date($this->date[$this->nm_grid_colunas], $this->array_date); 
          $this->Lookup->lookup_nama($this->nama[$this->nm_grid_colunas], $this->custcode[$this->nm_grid_colunas], $this->array_nama); 
          $_SESSION['scriptcase']['pdfreport_tbadmrawatinap']['contr_erro'] = 'on';
if (!isset($_SESSION['usr_login'])) {$_SESSION['usr_login'] = "";}
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
 $this->kasir[$this->nm_grid_colunas]  = $this->sc_temp_usr_login;

$this->tgl_plg[$this->nm_grid_colunas]  = 'xxxx';

$this->umur_jk[$this->nm_grid_colunas]  = 'xx';
if (isset($this->sc_temp_usr_login)) {$_SESSION['usr_login'] = $this->sc_temp_usr_login;}
$_SESSION['scriptcase']['pdfreport_tbadmrawatinap']['contr_erro'] = 'off';
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
          $this->tglmasuk[$this->nm_grid_colunas] = sc_strip_script($this->tglmasuk[$this->nm_grid_colunas]);
          if ($this->tglmasuk[$this->nm_grid_colunas] === "") 
          { 
              $this->tglmasuk[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               if (substr($this->tglmasuk[$this->nm_grid_colunas], 10, 1) == "-") 
               { 
                  $this->tglmasuk[$this->nm_grid_colunas] = substr($this->tglmasuk[$this->nm_grid_colunas], 0, 10) . " " . substr($this->tglmasuk[$this->nm_grid_colunas], 11);
               } 
               if (substr($this->tglmasuk[$this->nm_grid_colunas], 13, 1) == ".") 
               { 
                  $this->tglmasuk[$this->nm_grid_colunas] = substr($this->tglmasuk[$this->nm_grid_colunas], 0, 13) . ":" . substr($this->tglmasuk[$this->nm_grid_colunas], 14, 2) . ":" . substr($this->tglmasuk[$this->nm_grid_colunas], 17);
               } 
               $tglmasuk_x =  $this->tglmasuk[$this->nm_grid_colunas];
               nm_conv_limpa_dado($tglmasuk_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($tglmasuk_x) && strlen($tglmasuk_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->tglmasuk[$this->nm_grid_colunas], "YYYY-MM-DD HH:II:SS");
                   $this->tglmasuk[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->tglmasuk[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tglmasuk[$this->nm_grid_colunas]);
          $this->caramasuk[$this->nm_grid_colunas] = sc_strip_script($this->caramasuk[$this->nm_grid_colunas]);
          if ($this->caramasuk[$this->nm_grid_colunas] === "") 
          { 
              $this->caramasuk[$this->nm_grid_colunas] = "" ;  
          } 
          $this->caramasuk[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->caramasuk[$this->nm_grid_colunas]);
          $this->unitasal[$this->nm_grid_colunas] = sc_strip_script($this->unitasal[$this->nm_grid_colunas]);
          if ($this->unitasal[$this->nm_grid_colunas] === "") 
          { 
              $this->unitasal[$this->nm_grid_colunas] = "" ;  
          } 
          $this->unitasal[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->unitasal[$this->nm_grid_colunas]);
          $this->Lookup->lookup_doctor($this->doctor[$this->nm_grid_colunas] , $this->doctor[$this->nm_grid_colunas]) ; 
          $this->doctor[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->doctor[$this->nm_grid_colunas]);
          $this->struckno[$this->nm_grid_colunas] = $this->struckno[$this->nm_grid_colunas]; 
          if (empty($this->struckno[$this->nm_grid_colunas]) || $this->struckno[$this->nm_grid_colunas] == "none" || $this->struckno[$this->nm_grid_colunas] == "*nm*") 
          { 
              $this->struckno[$this->nm_grid_colunas] = "" ;  
              $out_struckno = "" ; 
          } 
          elseif ($this->Ini->Gd_missing)
          { 
              $this->struckno[$this->nm_grid_colunas] = "<span class=\"scErrorLine\">" . $this->Ini->Nm_lang['lang_errm_gd'] . "</span>";
              $out_struckno = "" ; 
          } 
          else   
          { 
              $out_struckno = $this->Ini->path_imag_temp . "/sc_struckno_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".png";   
              QRcode::png($this->struckno[$this->nm_grid_colunas], $this->Ini->root . $out_struckno, 0,2,1);
              $_SESSION['scriptcase']['sc_num_img']++;
          } 
              $this->struckno[$this->nm_grid_colunas] = $this->NM_raiz_img . $out_struckno;
          $this->struckno[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->struckno[$this->nm_grid_colunas]);
          $this->Lookup->lookup_date($this->date[$this->nm_grid_colunas], $this->array_date); 
          $this->date[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->date[$this->nm_grid_colunas]);
          if ($this->kasir[$this->nm_grid_colunas] === "") 
          { 
              $this->kasir[$this->nm_grid_colunas] = "" ;  
          } 
          $this->kasir[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->kasir[$this->nm_grid_colunas]);
          $this->Lookup->lookup_nama($this->nama[$this->nm_grid_colunas], $this->custcode[$this->nm_grid_colunas], $this->array_nama); 
          $this->nama[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->nama[$this->nm_grid_colunas]);
          if ($this->tgl_plg[$this->nm_grid_colunas] === "") 
          { 
              $this->tgl_plg[$this->nm_grid_colunas] = "" ;  
          } 
          $this->tgl_plg[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tgl_plg[$this->nm_grid_colunas]);
          if ($this->umur_jk[$this->nm_grid_colunas] === "") 
          { 
              $this->umur_jk[$this->nm_grid_colunas] = "" ;  
          } 
          $this->umur_jk[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->umur_jk[$this->nm_grid_colunas]);
            $cell_tranCode = array('posx' => '134', 'posy' => '51', 'data' => $this->trancode[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_custCode = array('posx' => '55', 'posy' => '58', 'data' => $this->custcode[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tglMasuk = array('posx' => '55', 'posy' => '81', 'data' => $this->tglmasuk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_caraMasuk = array('posx' => '55', 'posy' => '46', 'data' => $this->caramasuk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_unitAsal = array('posx' => '74', 'posy' => '46', 'data' => $this->unitasal[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_doctor = array('posx' => '55', 'posy' => '99', 'data' => $this->doctor[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_struckNo = array('posx' => '190', 'posy' => '45', 'data' => $this->struckno[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_umur_jk = array('posx' => '55', 'posy' => '70', 'data' => $this->umur_jk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tgl_plg = array('posx' => '55', 'posy' => '87', 'data' => $this->tgl_plg[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_date = array('posx' => '170', 'posy' => '117', 'data' => $this->date[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_kasir = array('posx' => '165', 'posy' => '132', 'data' => $this->kasir[$this->nm_grid_colunas], 'width'      => '20', 'align'      => 'C', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_nama = array('posx' => '55', 'posy' => '64', 'data' => $this->nama[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);


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

            $this->Pdf->SetFont($cell_tglMasuk['font_type'], $cell_tglMasuk['font_style'], $cell_tglMasuk['font_size']);
            $this->pdf_text_color($cell_tglMasuk['data'], $cell_tglMasuk['color_r'], $cell_tglMasuk['color_g'], $cell_tglMasuk['color_b']);
            if (!empty($cell_tglMasuk['posx']) && !empty($cell_tglMasuk['posy']))
            {
                $this->Pdf->SetXY($cell_tglMasuk['posx'], $cell_tglMasuk['posy']);
            }
            elseif (!empty($cell_tglMasuk['posx']))
            {
                $this->Pdf->SetX($cell_tglMasuk['posx']);
            }
            elseif (!empty($cell_tglMasuk['posy']))
            {
                $this->Pdf->SetY($cell_tglMasuk['posy']);
            }
            $this->Pdf->Cell($cell_tglMasuk['width'], 0, $cell_tglMasuk['data'], 0, 0, $cell_tglMasuk['align']);

            $this->Pdf->SetFont($cell_caraMasuk['font_type'], $cell_caraMasuk['font_style'], $cell_caraMasuk['font_size']);
            $this->pdf_text_color($cell_caraMasuk['data'], $cell_caraMasuk['color_r'], $cell_caraMasuk['color_g'], $cell_caraMasuk['color_b']);
            if (!empty($cell_caraMasuk['posx']) && !empty($cell_caraMasuk['posy']))
            {
                $this->Pdf->SetXY($cell_caraMasuk['posx'], $cell_caraMasuk['posy']);
            }
            elseif (!empty($cell_caraMasuk['posx']))
            {
                $this->Pdf->SetX($cell_caraMasuk['posx']);
            }
            elseif (!empty($cell_caraMasuk['posy']))
            {
                $this->Pdf->SetY($cell_caraMasuk['posy']);
            }
            $this->Pdf->Cell($cell_caraMasuk['width'], 0, $cell_caraMasuk['data'], 0, 0, $cell_caraMasuk['align']);

            $this->Pdf->SetFont($cell_unitAsal['font_type'], $cell_unitAsal['font_style'], $cell_unitAsal['font_size']);
            $this->pdf_text_color($cell_unitAsal['data'], $cell_unitAsal['color_r'], $cell_unitAsal['color_g'], $cell_unitAsal['color_b']);
            if (!empty($cell_unitAsal['posx']) && !empty($cell_unitAsal['posy']))
            {
                $this->Pdf->SetXY($cell_unitAsal['posx'], $cell_unitAsal['posy']);
            }
            elseif (!empty($cell_unitAsal['posx']))
            {
                $this->Pdf->SetX($cell_unitAsal['posx']);
            }
            elseif (!empty($cell_unitAsal['posy']))
            {
                $this->Pdf->SetY($cell_unitAsal['posy']);
            }
            $this->Pdf->Cell($cell_unitAsal['width'], 0, $cell_unitAsal['data'], 0, 0, $cell_unitAsal['align']);

            $this->Pdf->SetFont($cell_doctor['font_type'], $cell_doctor['font_style'], $cell_doctor['font_size']);
            $this->pdf_text_color($cell_doctor['data'], $cell_doctor['color_r'], $cell_doctor['color_g'], $cell_doctor['color_b']);
            if (!empty($cell_doctor['posx']) && !empty($cell_doctor['posy']))
            {
                $this->Pdf->SetXY($cell_doctor['posx'], $cell_doctor['posy']);
            }
            elseif (!empty($cell_doctor['posx']))
            {
                $this->Pdf->SetX($cell_doctor['posx']);
            }
            elseif (!empty($cell_doctor['posy']))
            {
                $this->Pdf->SetY($cell_doctor['posy']);
            }
            $this->Pdf->Cell($cell_doctor['width'], 0, $cell_doctor['data'], 0, 0, $cell_doctor['align']);

            if (isset($cell_struckNo['data']) && !empty($cell_struckNo['data']) && is_file($cell_struckNo['data']))
            {
                $Finfo_img = finfo_open(FILEINFO_MIME_TYPE);
                $Tipo_img  = finfo_file($Finfo_img, $cell_struckNo['data']);
                finfo_close($Finfo_img);
                if (substr($Tipo_img, 0, 5) == "image")
                {
                    $this->Pdf->Image($cell_struckNo['data'], $cell_struckNo['posx'], $cell_struckNo['posy'], 0, 0);
                }
            }

            $this->Pdf->SetFont($cell_umur_jk['font_type'], $cell_umur_jk['font_style'], $cell_umur_jk['font_size']);
            $this->pdf_text_color($cell_umur_jk['data'], $cell_umur_jk['color_r'], $cell_umur_jk['color_g'], $cell_umur_jk['color_b']);
            if (!empty($cell_umur_jk['posx']) && !empty($cell_umur_jk['posy']))
            {
                $this->Pdf->SetXY($cell_umur_jk['posx'], $cell_umur_jk['posy']);
            }
            elseif (!empty($cell_umur_jk['posx']))
            {
                $this->Pdf->SetX($cell_umur_jk['posx']);
            }
            elseif (!empty($cell_umur_jk['posy']))
            {
                $this->Pdf->SetY($cell_umur_jk['posy']);
            }
            $this->Pdf->Cell($cell_umur_jk['width'], 0, $cell_umur_jk['data'], 0, 0, $cell_umur_jk['align']);

            $this->Pdf->SetFont($cell_tgl_plg['font_type'], $cell_tgl_plg['font_style'], $cell_tgl_plg['font_size']);
            $this->pdf_text_color($cell_tgl_plg['data'], $cell_tgl_plg['color_r'], $cell_tgl_plg['color_g'], $cell_tgl_plg['color_b']);
            if (!empty($cell_tgl_plg['posx']) && !empty($cell_tgl_plg['posy']))
            {
                $this->Pdf->SetXY($cell_tgl_plg['posx'], $cell_tgl_plg['posy']);
            }
            elseif (!empty($cell_tgl_plg['posx']))
            {
                $this->Pdf->SetX($cell_tgl_plg['posx']);
            }
            elseif (!empty($cell_tgl_plg['posy']))
            {
                $this->Pdf->SetY($cell_tgl_plg['posy']);
            }
            $this->Pdf->Cell($cell_tgl_plg['width'], 0, $cell_tgl_plg['data'], 0, 0, $cell_tgl_plg['align']);

            $this->Pdf->SetFont($cell_date['font_type'], $cell_date['font_style'], $cell_date['font_size']);
            $this->pdf_text_color($cell_date['data'], $cell_date['color_r'], $cell_date['color_g'], $cell_date['color_b']);
            if (!empty($cell_date['posx']) && !empty($cell_date['posy']))
            {
                $this->Pdf->SetXY($cell_date['posx'], $cell_date['posy']);
            }
            elseif (!empty($cell_date['posx']))
            {
                $this->Pdf->SetX($cell_date['posx']);
            }
            elseif (!empty($cell_date['posy']))
            {
                $this->Pdf->SetY($cell_date['posy']);
            }
            $this->Pdf->Cell($cell_date['width'], 0, $cell_date['data'], 0, 0, $cell_date['align']);

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
