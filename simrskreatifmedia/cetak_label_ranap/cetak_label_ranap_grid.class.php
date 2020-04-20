<?php
class cetak_label_ranap_grid
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
   var $SC_incr_col;
   var $SC_incr_lin;
   var $SC_desloca_col; 
   var $SC_desloca_lin; 
   var $usia = array();
   var $sc_field_0 = array();
   var $sc_field_1 = array();
   var $sc_field_2 = array();
   var $sc_field_3 = array();
   var $jk = array();
   var $alergi = array();
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
   $_SESSION['scriptcase']['cetak_label_ranap']['default_font'] = $this->default_font;
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
           if (in_array("cetak_label_ranap", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->sc_field_0[0] = $Busca_temp['sc_field_0']; 
       $tmp_pos = strpos($this->sc_field_0[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->sc_field_0[0]))
       {
           $this->sc_field_0[0] = substr($this->sc_field_0[0], 0, $tmp_pos);
       }
       $this->sc_field_1[0] = $Busca_temp['sc_field_1']; 
       $tmp_pos = strpos($this->sc_field_1[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->sc_field_1[0]))
       {
           $this->sc_field_1[0] = substr($this->sc_field_1[0], 0, $tmp_pos);
       }
       $this->sc_field_2[0] = $Busca_temp['sc_field_2']; 
       $tmp_pos = strpos($this->sc_field_2[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->sc_field_2[0]))
       {
           $this->sc_field_2[0] = substr($this->sc_field_2[0], 0, $tmp_pos);
       }
       $this->sc_field_3[0] = $Busca_temp['sc_field_3']; 
       $tmp_pos = strpos($this->sc_field_3[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->sc_field_3[0]))
       {
           $this->sc_field_3[0] = substr($this->sc_field_3[0], 0, $tmp_pos);
       }
       $sc_field_3_2 = $Busca_temp['sc_field_3_input_2']; 
       $this->sc_field_3_2 = $Busca_temp['sc_field_3_input_2']; 
       $this->usia[0] = $Busca_temp['usia']; 
       $tmp_pos = strpos($this->usia[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->usia[0]))
       {
           $this->usia[0] = substr($this->usia[0], 0, $tmp_pos);
       }
   } 
   else 
   { 
       $this->sc_field_3_2 = ""; 
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['qt_col_grid'] = 3 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['cetak_label_ranap']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['cetak_label_ranap']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['cetak_label_ranap']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['cetak_label_ranap']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['where_orig'] = " where a.custCode = " . $_SESSION['var_No_Struk'] . "";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT b.NAME as sc_field_0, NULL as sc_field_1, a.custCode as sc_field_2, str_replace (convert(char(10),date( b.birthDate ),102), '.', '-') + ' ' + convert(char(8),date( b.birthDate ),20) as sc_field_3, b.sex as jk, NULL as alergi from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT b.NAME as sc_field_0, NULL as sc_field_1, a.custCode as sc_field_2, date( b.birthDate ) as sc_field_3, b.sex as jk, NULL as alergi from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT b.NAME as sc_field_0, NULL as sc_field_1, a.custCode as sc_field_2, convert(char(23),date( b.birthDate ),121) as sc_field_3, b.sex as jk, NULL as alergi from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT b.NAME as sc_field_0, NULL as sc_field_1, a.custCode as sc_field_2, date( b.birthDate ) as sc_field_3, b.sex as jk, NULL as alergi from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT b.NAME as sc_field_0, NULL as sc_field_1, a.custCode as sc_field_2, EXTEND(date( b.birthDate ), YEAR TO DAY) as sc_field_3, b.sex as jk, NULL as alergi from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT b.NAME as sc_field_0, NULL as sc_field_1, a.custCode as sc_field_2, date( b.birthDate ) as sc_field_3, b.sex as jk, NULL as alergi from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['order_grid'] = $nmgp_order_by;
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
     $this->Pdf->setCellMargins($left = 0, $top = 0, $right = 0, $bottom = 0);
     $this->Pdf->SetAutoPageBreak(false);
     if ($this->Font_ttf)
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 8, $this->def_TTF);
     }
     else
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 8);
     }
     $this->Pdf->SetTextColor(0, 0, 0);
     $this->Pdf->SetAutoPageBreak(false);
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
   $this->Pdf->Image($this->NM_raiz_img . $this->Ini->path_img_global . "/grp__NM__bg__NM__label107 (1).jpg", "0.000000", "0.000000", "210", "297", '', '', '', false, 300, '', false, false, 0);
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['labels']['sc_field_0'] = "Nama Pasien";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['labels']['sc_field_1'] = "Kategori Pasien";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['labels']['sc_field_2'] = "No RM";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['labels']['sc_field_3'] = "Tanggal Lahir";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['labels']['jk'] = "JK";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['labels']['alergi'] = "Alergi";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['labels']['usia'] = "Usia";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['cetak_label_ranap']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['cetak_label_ranap']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['cetak_label_ranap']['lig_edit'];
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
   $Contr_Y_init          = 5; 
   $Contr_lin_Pdf         = 0; 
   $this->SC_desloca_col  = 32; 
   $this->SC_desloca_lin  = 64; 
   while (!$this->rs_grid->EOF) 
   {  
      $this->nm_grid_colunas = 0; 
      $nm_quant_linhas = 0;
      $this->SC_incr_col = 0; 
      $this->SC_incr_lin = $this->SC_desloca_lin * $Contr_lin_Pdf; 
      $Contr_lin_Pdf++; 
      if ($Init_Pdf || ($this->SC_incr_lin + $this->SC_desloca_lin + $Contr_Y_init) > 297)
      {
          $this->Pdf->setImageScale(1.33);
          $this->Pdf->AddPage();
          $this->Pdf_init();
          $this->Pdf_image();
          $this->SC_incr_lin = 0; 
          $Contr_lin_Pdf     = 1; 
          $Init_Pdf          = false; 
      }
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_ranap']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->SC_incr_col = $this->SC_desloca_col * $nm_quant_linhas; 
          $this->sc_field_0[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->sc_field_1[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->sc_field_2[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->sc_field_3[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->jk[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->alergi[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->usia[$this->nm_grid_colunas] = "";
          $_SESSION['scriptcase']['cetak_label_ranap']['contr_erro'] = 'on';
 $lahir = new DateTime($this->sc_field_3[$this->nm_grid_colunas] );
$today = new DateTime();
$umur = $today->diff($lahir);
$this->usia[$this->nm_grid_colunas]  = $umur->y . " TH " . $umur->m . " BLN " . $umur->d . " HR";

if($this->jk[$this->nm_grid_colunas]  == 'L')
{
	$this->jk[$this->nm_grid_colunas]  = 'L /';
}else{
	$this->jk[$this->nm_grid_colunas]  = 'P /';
}
$_SESSION['scriptcase']['cetak_label_ranap']['contr_erro'] = 'off';
          $this->sc_field_0[$this->nm_grid_colunas] = sc_strip_script($this->sc_field_0[$this->nm_grid_colunas]);
          if ($this->sc_field_0[$this->nm_grid_colunas] === "") 
          { 
              $this->sc_field_0[$this->nm_grid_colunas] = "" ;  
          } 
          $this->sc_field_0[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->sc_field_0[$this->nm_grid_colunas]);
          $this->sc_field_1[$this->nm_grid_colunas] = sc_strip_script($this->sc_field_1[$this->nm_grid_colunas]);
          if ($this->sc_field_1[$this->nm_grid_colunas] === "") 
          { 
              $this->sc_field_1[$this->nm_grid_colunas] = "" ;  
          } 
          $this->sc_field_1[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->sc_field_1[$this->nm_grid_colunas]);
          $this->sc_field_2[$this->nm_grid_colunas] = sc_strip_script($this->sc_field_2[$this->nm_grid_colunas]);
          if ($this->sc_field_2[$this->nm_grid_colunas] === "") 
          { 
              $this->sc_field_2[$this->nm_grid_colunas] = "" ;  
          } 
          $this->sc_field_2[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->sc_field_2[$this->nm_grid_colunas]);
          $this->sc_field_3[$this->nm_grid_colunas] = sc_strip_script($this->sc_field_3[$this->nm_grid_colunas]);
          if ($this->sc_field_3[$this->nm_grid_colunas] === "") 
          { 
              $this->sc_field_3[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $sc_field_3_x =  $this->sc_field_3[$this->nm_grid_colunas];
               nm_conv_limpa_dado($sc_field_3_x, "YYYY-MM-DD");
               if (is_numeric($sc_field_3_x) && strlen($sc_field_3_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->sc_field_3[$this->nm_grid_colunas], "YYYY-MM-DD");
                   $this->sc_field_3[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->sc_field_3[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->sc_field_3[$this->nm_grid_colunas]);
          $this->jk[$this->nm_grid_colunas] = sc_strip_script($this->jk[$this->nm_grid_colunas]);
          if ($this->jk[$this->nm_grid_colunas] === "") 
          { 
              $this->jk[$this->nm_grid_colunas] = "" ;  
          } 
          $this->jk[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->jk[$this->nm_grid_colunas]);
          $this->alergi[$this->nm_grid_colunas] = sc_strip_script($this->alergi[$this->nm_grid_colunas]);
          if ($this->alergi[$this->nm_grid_colunas] === "") 
          { 
              $this->alergi[$this->nm_grid_colunas] = "" ;  
          } 
          $this->alergi[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->alergi[$this->nm_grid_colunas]);
          if ($this->usia[$this->nm_grid_colunas] === "") 
          { 
              $this->usia[$this->nm_grid_colunas] = "" ;  
          } 
          $this->usia[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->usia[$this->nm_grid_colunas]);
            $cell_sc_field_0 = array('posx' => '17', 'posy' => '9', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_2 = array('posx' => '17', 'posy' => '5', 'data' => $this->sc_field_2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_3 = array('posx' => '17', 'posy' => '16.5', 'data' => $this->sc_field_3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_JK = array('posx' => '17', 'posy' => '12.5', 'data' => $this->jk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Usia = array('posx' => '21', 'posy' => '12.5', 'data' => $this->usia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_02 = array('posx' => '71', 'posy' => '9', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_22 = array('posx' => '71', 'posy' => '5', 'data' => $this->sc_field_2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_32 = array('posx' => '71', 'posy' => '16.5', 'data' => $this->sc_field_3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_JK2 = array('posx' => '71', 'posy' => '12.5', 'data' => $this->jk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Usia2 = array('posx' => '75', 'posy' => '12.5', 'data' => $this->usia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_03 = array('posx' => '129', 'posy' => '9', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_23 = array('posx' => '129', 'posy' => '5', 'data' => $this->sc_field_2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_33 = array('posx' => '129', 'posy' => '16.5', 'data' => $this->sc_field_3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_JK3 = array('posx' => '129', 'posy' => '12.5', 'data' => $this->jk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Usia3 = array('posx' => '133', 'posy' => '12.5', 'data' => $this->usia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_04 = array('posx' => '17', 'posy' => '29', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_24 = array('posx' => '17', 'posy' => '25', 'data' => $this->sc_field_2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_34 = array('posx' => '17', 'posy' => '36.5', 'data' => $this->sc_field_3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_JK4 = array('posx' => '17', 'posy' => '32.5', 'data' => $this->jk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Usia4 = array('posx' => '21', 'posy' => '32.5', 'data' => $this->usia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_05 = array('posx' => '71', 'posy' => '29.5', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_25 = array('posx' => '71', 'posy' => '25', 'data' => $this->sc_field_2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_35 = array('posx' => '71', 'posy' => '36.5', 'data' => $this->sc_field_3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_JK5 = array('posx' => '71', 'posy' => '32.5', 'data' => $this->jk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Usia5 = array('posx' => '75', 'posy' => '32.5', 'data' => $this->usia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_06 = array('posx' => '129', 'posy' => '29.3', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_26 = array('posx' => '129', 'posy' => '25.3', 'data' => $this->sc_field_2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_36 = array('posx' => '129', 'posy' => '37', 'data' => $this->sc_field_3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_JK6 = array('posx' => '129', 'posy' => '33', 'data' => $this->jk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Usia6 = array('posx' => '133', 'posy' => '33', 'data' => $this->usia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_07 = array('posx' => '17', 'posy' => '49.55', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_27 = array('posx' => '17', 'posy' => '46', 'data' => $this->sc_field_2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_37 = array('posx' => '17', 'posy' => '57.5', 'data' => $this->sc_field_3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_JK7 = array('posx' => '17', 'posy' => '53.5', 'data' => $this->jk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Usia7 = array('posx' => '21', 'posy' => '53.5', 'data' => $this->usia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_08 = array('posx' => '71', 'posy' => '50', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_28 = array('posx' => '71', 'posy' => '46', 'data' => $this->sc_field_2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_38 = array('posx' => '71', 'posy' => '57.5', 'data' => $this->sc_field_3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_JK8 = array('posx' => '71', 'posy' => '53.5', 'data' => $this->jk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Usia8 = array('posx' => '75', 'posy' => '53.5', 'data' => $this->usia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_09 = array('posx' => '129', 'posy' => '50', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_29 = array('posx' => '129', 'posy' => '46', 'data' => $this->sc_field_2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_39 = array('posx' => '129', 'posy' => '57.5', 'data' => $this->sc_field_3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_JK9 = array('posx' => '129', 'posy' => '53.5', 'data' => $this->jk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Usia9 = array('posx' => '133', 'posy' => '53.5', 'data' => $this->usia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_010 = array('posx' => '17', 'posy' => '69.90', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_210 = array('posx' => '17', 'posy' => '65.90', 'data' => $this->sc_field_2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_310 = array('posx' => '17', 'posy' => '77.5', 'data' => $this->sc_field_3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_JK10 = array('posx' => '17', 'posy' => '74', 'data' => $this->jk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Usia10 = array('posx' => '21', 'posy' => '74', 'data' => $this->usia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_011 = array('posx' => '71', 'posy' => '69.90', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_211 = array('posx' => '71', 'posy' => '65.90', 'data' => $this->sc_field_2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_311 = array('posx' => '71', 'posy' => '77.40', 'data' => $this->sc_field_3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_JK11 = array('posx' => '71', 'posy' => '73.70', 'data' => $this->jk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Usia11 = array('posx' => '75', 'posy' => '73.70', 'data' => $this->usia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_012 = array('posx' => '129', 'posy' => '70', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_212 = array('posx' => '129', 'posy' => '66', 'data' => $this->sc_field_2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_312 = array('posx' => '129', 'posy' => '77.70', 'data' => $this->sc_field_3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_JK12 = array('posx' => '129', 'posy' => '74', 'data' => $this->jk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Usia12 = array('posx' => '133', 'posy' => '74', 'data' => $this->usia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_013 = array('posx' => '17', 'posy' => '91', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_213 = array('posx' => '17', 'posy' => '87', 'data' => $this->sc_field_2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_313 = array('posx' => '17', 'posy' => '98.6', 'data' => $this->sc_field_3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_JK13 = array('posx' => '17', 'posy' => '95', 'data' => $this->jk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Usia13 = array('posx' => '21', 'posy' => '95', 'data' => $this->usia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_014 = array('posx' => '71', 'posy' => '91', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_214 = array('posx' => '71', 'posy' => '87', 'data' => $this->sc_field_2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_314 = array('posx' => '71', 'posy' => '98.60', 'data' => $this->sc_field_3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_JK14 = array('posx' => '71', 'posy' => '95', 'data' => $this->jk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Usia14 = array('posx' => '75', 'posy' => '95', 'data' => $this->usia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_015 = array('posx' => '129', 'posy' => '91', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_215 = array('posx' => '129', 'posy' => '87', 'data' => $this->sc_field_2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_315 = array('posx' => '129', 'posy' => '99', 'data' => $this->sc_field_3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_JK15 = array('posx' => '129', 'posy' => '95', 'data' => $this->jk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Usia15 = array('posx' => '133', 'posy' => '95', 'data' => $this->usia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_016 = array('posx' => '17', 'posy' => '111', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_216 = array('posx' => '17', 'posy' => '107', 'data' => $this->sc_field_2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_316 = array('posx' => '17', 'posy' => '118.60', 'data' => $this->sc_field_3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_JK16 = array('posx' => '17', 'posy' => '115', 'data' => $this->jk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Usia16 = array('posx' => '21', 'posy' => '115', 'data' => $this->usia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_017 = array('posx' => '71', 'posy' => '111', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_217 = array('posx' => '71', 'posy' => '107', 'data' => $this->sc_field_2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_317 = array('posx' => '71', 'posy' => '118.80', 'data' => $this->sc_field_3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_JK17 = array('posx' => '71', 'posy' => '115', 'data' => $this->jk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Usia17 = array('posx' => '75', 'posy' => '115', 'data' => $this->usia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_018 = array('posx' => '129', 'posy' => '111', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_218 = array('posx' => '129', 'posy' => '107', 'data' => $this->sc_field_2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_318 = array('posx' => '129', 'posy' => '119', 'data' => $this->sc_field_3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_JK18 = array('posx' => '129', 'posy' => '115', 'data' => $this->jk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Usia18 = array('posx' => '133', 'posy' => '115', 'data' => $this->usia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_019 = array('posx' => '17', 'posy' => '132', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_219 = array('posx' => '17', 'posy' => '128', 'data' => $this->sc_field_2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_319 = array('posx' => '17', 'posy' => '139.70', 'data' => $this->sc_field_3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_JK19 = array('posx' => '17', 'posy' => '135.80', 'data' => $this->jk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_usia19 = array('posx' => '21', 'posy' => '135.80', 'data' => $this->usia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_020 = array('posx' => '71', 'posy' => '132', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_220 = array('posx' => '71', 'posy' => '128', 'data' => $this->sc_field_2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_320 = array('posx' => '71', 'posy' => '139.30', 'data' => $this->sc_field_3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_JK20 = array('posx' => '71', 'posy' => '135.80', 'data' => $this->jk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Usia20 = array('posx' => '75', 'posy' => '135.80', 'data' => $this->usia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_021 = array('posx' => '129', 'posy' => '132', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_221 = array('posx' => '129', 'posy' => '128', 'data' => $this->sc_field_2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_321 = array('posx' => '129', 'posy' => '140', 'data' => $this->sc_field_3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_JK21 = array('posx' => '129', 'posy' => '136', 'data' => $this->jk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Usia21 = array('posx' => '133', 'posy' => '136', 'data' => $this->usia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_022 = array('posx' => '17', 'posy' => '152', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_222 = array('posx' => '17', 'posy' => '148', 'data' => $this->sc_field_2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_322 = array('posx' => '17', 'posy' => '159.90', 'data' => $this->sc_field_3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_JK22 = array('posx' => '17', 'posy' => '155.80', 'data' => $this->jk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Usia22 = array('posx' => '21', 'posy' => '155.80', 'data' => $this->usia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_023 = array('posx' => '71', 'posy' => '151.90', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_223 = array('posx' => '71', 'posy' => '148', 'data' => $this->sc_field_2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_323 = array('posx' => '71', 'posy' => '159.80', 'data' => $this->sc_field_3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_JK23 = array('posx' => '71', 'posy' => '155.80', 'data' => $this->jk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Usia23 = array('posx' => '75', 'posy' => '155.80', 'data' => $this->usia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_024 = array('posx' => '129', 'posy' => '152', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_224 = array('posx' => '129', 'posy' => '148', 'data' => $this->sc_field_2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_324 = array('posx' => '129', 'posy' => '160', 'data' => $this->sc_field_3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_JK24 = array('posx' => '129', 'posy' => '156', 'data' => $this->jk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Usia24 = array('posx' => '133', 'posy' => '156', 'data' => $this->usia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_025 = array('posx' => '17', 'posy' => '172.5', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_225 = array('posx' => '17', 'posy' => '168.5', 'data' => $this->sc_field_2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_325 = array('posx' => '17', 'posy' => '180.4', 'data' => $this->sc_field_3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_JK25 = array('posx' => '17', 'posy' => '176.5', 'data' => $this->jk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_usia25 = array('posx' => '21', 'posy' => '176.5', 'data' => $this->usia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_026 = array('posx' => '71', 'posy' => '172.5', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_226 = array('posx' => '71', 'posy' => '168.5', 'data' => $this->sc_field_2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_326 = array('posx' => '71', 'posy' => '180.1', 'data' => $this->sc_field_3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_JK26 = array('posx' => '71', 'posy' => '176.5', 'data' => $this->jk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Usia26 = array('posx' => '75', 'posy' => '176.5', 'data' => $this->usia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_027 = array('posx' => '129', 'posy' => '172.5', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_227 = array('posx' => '129', 'posy' => '168.5', 'data' => $this->sc_field_2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_327 = array('posx' => '129', 'posy' => '180.5', 'data' => $this->sc_field_3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_JK27 = array('posx' => '129', 'posy' => '176.5', 'data' => $this->jk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Usia27 = array('posx' => '133', 'posy' => '176.5', 'data' => $this->usia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_028 = array('posx' => '17', 'posy' => '193.3', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_228 = array('posx' => '17', 'posy' => '189.3', 'data' => $this->sc_field_2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_328 = array('posx' => '17', 'posy' => '201', 'data' => $this->sc_field_3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_JK28 = array('posx' => '17', 'posy' => '197.3', 'data' => $this->jk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Usia28 = array('posx' => '21', 'posy' => '197.3', 'data' => $this->usia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_029 = array('posx' => '71', 'posy' => '193.3', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_229 = array('posx' => '71', 'posy' => '189.3', 'data' => $this->sc_field_2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_329 = array('posx' => '71', 'posy' => '201', 'data' => $this->sc_field_3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_JK29 = array('posx' => '71', 'posy' => '197', 'data' => $this->jk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Usia29 = array('posx' => '75', 'posy' => '197', 'data' => $this->usia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_030 = array('posx' => '129', 'posy' => '193.7', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_230 = array('posx' => '129', 'posy' => '189.5', 'data' => $this->sc_field_2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_330 = array('posx' => '129', 'posy' => '201', 'data' => $this->sc_field_3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_JK30 = array('posx' => '129', 'posy' => '197.4', 'data' => $this->jk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Usia30 = array('posx' => '133', 'posy' => '197.4', 'data' => $this->usia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);


            $this->Pdf->SetFont($cell_sc_field_0['font_type'], $cell_sc_field_0['font_style'], $cell_sc_field_0['font_size']);
            $this->pdf_text_color($cell_sc_field_0['data'], $cell_sc_field_0['color_r'], $cell_sc_field_0['color_g'], $cell_sc_field_0['color_b']);
            if (!empty($cell_sc_field_0['posx']) && !empty($cell_sc_field_0['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_0['posx'] + $this->SC_incr_col,  $cell_sc_field_0['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_0['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_0['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_0['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_0['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_0['width'], 0, $cell_sc_field_0['data'], 0, 0, $cell_sc_field_0['align']);

            $this->Pdf->SetFont($cell_sc_field_2['font_type'], $cell_sc_field_2['font_style'], $cell_sc_field_2['font_size']);
            $this->pdf_text_color($cell_sc_field_2['data'], $cell_sc_field_2['color_r'], $cell_sc_field_2['color_g'], $cell_sc_field_2['color_b']);
            if (!empty($cell_sc_field_2['posx']) && !empty($cell_sc_field_2['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_2['posx'] + $this->SC_incr_col,  $cell_sc_field_2['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_2['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_2['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_2['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_2['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_2['width'], 0, $cell_sc_field_2['data'], 0, 0, $cell_sc_field_2['align']);

            $this->Pdf->SetFont($cell_sc_field_3['font_type'], $cell_sc_field_3['font_style'], $cell_sc_field_3['font_size']);
            $this->pdf_text_color($cell_sc_field_3['data'], $cell_sc_field_3['color_r'], $cell_sc_field_3['color_g'], $cell_sc_field_3['color_b']);
            if (!empty($cell_sc_field_3['posx']) && !empty($cell_sc_field_3['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_3['posx'] + $this->SC_incr_col,  $cell_sc_field_3['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_3['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_3['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_3['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_3['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_3['width'], 0, $cell_sc_field_3['data'], 0, 0, $cell_sc_field_3['align']);

            $this->Pdf->SetFont($cell_JK['font_type'], $cell_JK['font_style'], $cell_JK['font_size']);
            $this->pdf_text_color($cell_JK['data'], $cell_JK['color_r'], $cell_JK['color_g'], $cell_JK['color_b']);
            if (!empty($cell_JK['posx']) && !empty($cell_JK['posy']))
            {
                $this->Pdf->SetXY($cell_JK['posx'] + $this->SC_incr_col,  $cell_JK['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_JK['posx']))
            {
                $this->Pdf->SetX($cell_JK['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_JK['posy']))
            {
                $this->Pdf->SetY($cell_JK['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_JK['width'], 0, $cell_JK['data'], 0, 0, $cell_JK['align']);

            $this->Pdf->SetFont($cell_Usia['font_type'], $cell_Usia['font_style'], $cell_Usia['font_size']);
            $this->pdf_text_color($cell_Usia['data'], $cell_Usia['color_r'], $cell_Usia['color_g'], $cell_Usia['color_b']);
            if (!empty($cell_Usia['posx']) && !empty($cell_Usia['posy']))
            {
                $this->Pdf->SetXY($cell_Usia['posx'] + $this->SC_incr_col,  $cell_Usia['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_Usia['posx']))
            {
                $this->Pdf->SetX($cell_Usia['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_Usia['posy']))
            {
                $this->Pdf->SetY($cell_Usia['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_Usia['width'], 0, $cell_Usia['data'], 0, 0, $cell_Usia['align']);

            $this->Pdf->SetFont($cell_sc_field_02['font_type'], $cell_sc_field_02['font_style'], $cell_sc_field_02['font_size']);
            $this->pdf_text_color($cell_sc_field_02['data'], $cell_sc_field_02['color_r'], $cell_sc_field_02['color_g'], $cell_sc_field_02['color_b']);
            if (!empty($cell_sc_field_02['posx']) && !empty($cell_sc_field_02['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_02['posx'] + $this->SC_incr_col,  $cell_sc_field_02['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_02['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_02['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_02['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_02['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_02['width'], 0, $cell_sc_field_02['data'], 0, 0, $cell_sc_field_02['align']);

            $this->Pdf->SetFont($cell_sc_field_22['font_type'], $cell_sc_field_22['font_style'], $cell_sc_field_22['font_size']);
            $this->pdf_text_color($cell_sc_field_22['data'], $cell_sc_field_22['color_r'], $cell_sc_field_22['color_g'], $cell_sc_field_22['color_b']);
            if (!empty($cell_sc_field_22['posx']) && !empty($cell_sc_field_22['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_22['posx'] + $this->SC_incr_col,  $cell_sc_field_22['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_22['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_22['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_22['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_22['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_22['width'], 0, $cell_sc_field_22['data'], 0, 0, $cell_sc_field_22['align']);

            $this->Pdf->SetFont($cell_sc_field_32['font_type'], $cell_sc_field_32['font_style'], $cell_sc_field_32['font_size']);
            $this->pdf_text_color($cell_sc_field_32['data'], $cell_sc_field_32['color_r'], $cell_sc_field_32['color_g'], $cell_sc_field_32['color_b']);
            if (!empty($cell_sc_field_32['posx']) && !empty($cell_sc_field_32['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_32['posx'] + $this->SC_incr_col,  $cell_sc_field_32['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_32['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_32['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_32['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_32['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_32['width'], 0, $cell_sc_field_32['data'], 0, 0, $cell_sc_field_32['align']);

            $this->Pdf->SetFont($cell_JK2['font_type'], $cell_JK2['font_style'], $cell_JK2['font_size']);
            $this->pdf_text_color($cell_JK2['data'], $cell_JK2['color_r'], $cell_JK2['color_g'], $cell_JK2['color_b']);
            if (!empty($cell_JK2['posx']) && !empty($cell_JK2['posy']))
            {
                $this->Pdf->SetXY($cell_JK2['posx'] + $this->SC_incr_col,  $cell_JK2['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_JK2['posx']))
            {
                $this->Pdf->SetX($cell_JK2['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_JK2['posy']))
            {
                $this->Pdf->SetY($cell_JK2['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_JK2['width'], 0, $cell_JK2['data'], 0, 0, $cell_JK2['align']);

            $this->Pdf->SetFont($cell_Usia2['font_type'], $cell_Usia2['font_style'], $cell_Usia2['font_size']);
            $this->pdf_text_color($cell_Usia2['data'], $cell_Usia2['color_r'], $cell_Usia2['color_g'], $cell_Usia2['color_b']);
            if (!empty($cell_Usia2['posx']) && !empty($cell_Usia2['posy']))
            {
                $this->Pdf->SetXY($cell_Usia2['posx'] + $this->SC_incr_col,  $cell_Usia2['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_Usia2['posx']))
            {
                $this->Pdf->SetX($cell_Usia2['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_Usia2['posy']))
            {
                $this->Pdf->SetY($cell_Usia2['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_Usia2['width'], 0, $cell_Usia2['data'], 0, 0, $cell_Usia2['align']);

            $this->Pdf->SetFont($cell_sc_field_03['font_type'], $cell_sc_field_03['font_style'], $cell_sc_field_03['font_size']);
            $this->pdf_text_color($cell_sc_field_03['data'], $cell_sc_field_03['color_r'], $cell_sc_field_03['color_g'], $cell_sc_field_03['color_b']);
            if (!empty($cell_sc_field_03['posx']) && !empty($cell_sc_field_03['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_03['posx'] + $this->SC_incr_col,  $cell_sc_field_03['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_03['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_03['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_03['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_03['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_03['width'], 0, $cell_sc_field_03['data'], 0, 0, $cell_sc_field_03['align']);

            $this->Pdf->SetFont($cell_sc_field_23['font_type'], $cell_sc_field_23['font_style'], $cell_sc_field_23['font_size']);
            $this->pdf_text_color($cell_sc_field_23['data'], $cell_sc_field_23['color_r'], $cell_sc_field_23['color_g'], $cell_sc_field_23['color_b']);
            if (!empty($cell_sc_field_23['posx']) && !empty($cell_sc_field_23['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_23['posx'] + $this->SC_incr_col,  $cell_sc_field_23['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_23['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_23['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_23['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_23['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_23['width'], 0, $cell_sc_field_23['data'], 0, 0, $cell_sc_field_23['align']);

            $this->Pdf->SetFont($cell_sc_field_33['font_type'], $cell_sc_field_33['font_style'], $cell_sc_field_33['font_size']);
            $this->pdf_text_color($cell_sc_field_33['data'], $cell_sc_field_33['color_r'], $cell_sc_field_33['color_g'], $cell_sc_field_33['color_b']);
            if (!empty($cell_sc_field_33['posx']) && !empty($cell_sc_field_33['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_33['posx'] + $this->SC_incr_col,  $cell_sc_field_33['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_33['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_33['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_33['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_33['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_33['width'], 0, $cell_sc_field_33['data'], 0, 0, $cell_sc_field_33['align']);

            $this->Pdf->SetFont($cell_JK3['font_type'], $cell_JK3['font_style'], $cell_JK3['font_size']);
            $this->pdf_text_color($cell_JK3['data'], $cell_JK3['color_r'], $cell_JK3['color_g'], $cell_JK3['color_b']);
            if (!empty($cell_JK3['posx']) && !empty($cell_JK3['posy']))
            {
                $this->Pdf->SetXY($cell_JK3['posx'] + $this->SC_incr_col,  $cell_JK3['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_JK3['posx']))
            {
                $this->Pdf->SetX($cell_JK3['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_JK3['posy']))
            {
                $this->Pdf->SetY($cell_JK3['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_JK3['width'], 0, $cell_JK3['data'], 0, 0, $cell_JK3['align']);

            $this->Pdf->SetFont($cell_Usia3['font_type'], $cell_Usia3['font_style'], $cell_Usia3['font_size']);
            $this->pdf_text_color($cell_Usia3['data'], $cell_Usia3['color_r'], $cell_Usia3['color_g'], $cell_Usia3['color_b']);
            if (!empty($cell_Usia3['posx']) && !empty($cell_Usia3['posy']))
            {
                $this->Pdf->SetXY($cell_Usia3['posx'] + $this->SC_incr_col,  $cell_Usia3['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_Usia3['posx']))
            {
                $this->Pdf->SetX($cell_Usia3['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_Usia3['posy']))
            {
                $this->Pdf->SetY($cell_Usia3['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_Usia3['width'], 0, $cell_Usia3['data'], 0, 0, $cell_Usia3['align']);

            $this->Pdf->SetFont($cell_sc_field_04['font_type'], $cell_sc_field_04['font_style'], $cell_sc_field_04['font_size']);
            $this->pdf_text_color($cell_sc_field_04['data'], $cell_sc_field_04['color_r'], $cell_sc_field_04['color_g'], $cell_sc_field_04['color_b']);
            if (!empty($cell_sc_field_04['posx']) && !empty($cell_sc_field_04['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_04['posx'] + $this->SC_incr_col,  $cell_sc_field_04['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_04['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_04['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_04['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_04['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_04['width'], 0, $cell_sc_field_04['data'], 0, 0, $cell_sc_field_04['align']);

            $this->Pdf->SetFont($cell_sc_field_24['font_type'], $cell_sc_field_24['font_style'], $cell_sc_field_24['font_size']);
            $this->pdf_text_color($cell_sc_field_24['data'], $cell_sc_field_24['color_r'], $cell_sc_field_24['color_g'], $cell_sc_field_24['color_b']);
            if (!empty($cell_sc_field_24['posx']) && !empty($cell_sc_field_24['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_24['posx'] + $this->SC_incr_col,  $cell_sc_field_24['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_24['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_24['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_24['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_24['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_24['width'], 0, $cell_sc_field_24['data'], 0, 0, $cell_sc_field_24['align']);

            $this->Pdf->SetFont($cell_sc_field_34['font_type'], $cell_sc_field_34['font_style'], $cell_sc_field_34['font_size']);
            $this->pdf_text_color($cell_sc_field_34['data'], $cell_sc_field_34['color_r'], $cell_sc_field_34['color_g'], $cell_sc_field_34['color_b']);
            if (!empty($cell_sc_field_34['posx']) && !empty($cell_sc_field_34['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_34['posx'] + $this->SC_incr_col,  $cell_sc_field_34['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_34['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_34['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_34['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_34['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_34['width'], 0, $cell_sc_field_34['data'], 0, 0, $cell_sc_field_34['align']);

            $this->Pdf->SetFont($cell_JK4['font_type'], $cell_JK4['font_style'], $cell_JK4['font_size']);
            $this->pdf_text_color($cell_JK4['data'], $cell_JK4['color_r'], $cell_JK4['color_g'], $cell_JK4['color_b']);
            if (!empty($cell_JK4['posx']) && !empty($cell_JK4['posy']))
            {
                $this->Pdf->SetXY($cell_JK4['posx'] + $this->SC_incr_col,  $cell_JK4['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_JK4['posx']))
            {
                $this->Pdf->SetX($cell_JK4['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_JK4['posy']))
            {
                $this->Pdf->SetY($cell_JK4['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_JK4['width'], 0, $cell_JK4['data'], 0, 0, $cell_JK4['align']);

            $this->Pdf->SetFont($cell_Usia4['font_type'], $cell_Usia4['font_style'], $cell_Usia4['font_size']);
            $this->pdf_text_color($cell_Usia4['data'], $cell_Usia4['color_r'], $cell_Usia4['color_g'], $cell_Usia4['color_b']);
            if (!empty($cell_Usia4['posx']) && !empty($cell_Usia4['posy']))
            {
                $this->Pdf->SetXY($cell_Usia4['posx'] + $this->SC_incr_col,  $cell_Usia4['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_Usia4['posx']))
            {
                $this->Pdf->SetX($cell_Usia4['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_Usia4['posy']))
            {
                $this->Pdf->SetY($cell_Usia4['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_Usia4['width'], 0, $cell_Usia4['data'], 0, 0, $cell_Usia4['align']);

            $this->Pdf->SetFont($cell_sc_field_05['font_type'], $cell_sc_field_05['font_style'], $cell_sc_field_05['font_size']);
            $this->pdf_text_color($cell_sc_field_05['data'], $cell_sc_field_05['color_r'], $cell_sc_field_05['color_g'], $cell_sc_field_05['color_b']);
            if (!empty($cell_sc_field_05['posx']) && !empty($cell_sc_field_05['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_05['posx'] + $this->SC_incr_col,  $cell_sc_field_05['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_05['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_05['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_05['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_05['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_05['width'], 0, $cell_sc_field_05['data'], 0, 0, $cell_sc_field_05['align']);

            $this->Pdf->SetFont($cell_sc_field_25['font_type'], $cell_sc_field_25['font_style'], $cell_sc_field_25['font_size']);
            $this->pdf_text_color($cell_sc_field_25['data'], $cell_sc_field_25['color_r'], $cell_sc_field_25['color_g'], $cell_sc_field_25['color_b']);
            if (!empty($cell_sc_field_25['posx']) && !empty($cell_sc_field_25['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_25['posx'] + $this->SC_incr_col,  $cell_sc_field_25['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_25['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_25['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_25['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_25['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_25['width'], 0, $cell_sc_field_25['data'], 0, 0, $cell_sc_field_25['align']);

            $this->Pdf->SetFont($cell_sc_field_35['font_type'], $cell_sc_field_35['font_style'], $cell_sc_field_35['font_size']);
            $this->pdf_text_color($cell_sc_field_35['data'], $cell_sc_field_35['color_r'], $cell_sc_field_35['color_g'], $cell_sc_field_35['color_b']);
            if (!empty($cell_sc_field_35['posx']) && !empty($cell_sc_field_35['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_35['posx'] + $this->SC_incr_col,  $cell_sc_field_35['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_35['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_35['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_35['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_35['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_35['width'], 0, $cell_sc_field_35['data'], 0, 0, $cell_sc_field_35['align']);

            $this->Pdf->SetFont($cell_JK5['font_type'], $cell_JK5['font_style'], $cell_JK5['font_size']);
            $this->pdf_text_color($cell_JK5['data'], $cell_JK5['color_r'], $cell_JK5['color_g'], $cell_JK5['color_b']);
            if (!empty($cell_JK5['posx']) && !empty($cell_JK5['posy']))
            {
                $this->Pdf->SetXY($cell_JK5['posx'] + $this->SC_incr_col,  $cell_JK5['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_JK5['posx']))
            {
                $this->Pdf->SetX($cell_JK5['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_JK5['posy']))
            {
                $this->Pdf->SetY($cell_JK5['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_JK5['width'], 0, $cell_JK5['data'], 0, 0, $cell_JK5['align']);

            $this->Pdf->SetFont($cell_Usia5['font_type'], $cell_Usia5['font_style'], $cell_Usia5['font_size']);
            $this->pdf_text_color($cell_Usia5['data'], $cell_Usia5['color_r'], $cell_Usia5['color_g'], $cell_Usia5['color_b']);
            if (!empty($cell_Usia5['posx']) && !empty($cell_Usia5['posy']))
            {
                $this->Pdf->SetXY($cell_Usia5['posx'] + $this->SC_incr_col,  $cell_Usia5['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_Usia5['posx']))
            {
                $this->Pdf->SetX($cell_Usia5['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_Usia5['posy']))
            {
                $this->Pdf->SetY($cell_Usia5['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_Usia5['width'], 0, $cell_Usia5['data'], 0, 0, $cell_Usia5['align']);

            $this->Pdf->SetFont($cell_sc_field_06['font_type'], $cell_sc_field_06['font_style'], $cell_sc_field_06['font_size']);
            $this->pdf_text_color($cell_sc_field_06['data'], $cell_sc_field_06['color_r'], $cell_sc_field_06['color_g'], $cell_sc_field_06['color_b']);
            if (!empty($cell_sc_field_06['posx']) && !empty($cell_sc_field_06['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_06['posx'] + $this->SC_incr_col,  $cell_sc_field_06['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_06['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_06['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_06['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_06['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_06['width'], 0, $cell_sc_field_06['data'], 0, 0, $cell_sc_field_06['align']);

            $this->Pdf->SetFont($cell_sc_field_26['font_type'], $cell_sc_field_26['font_style'], $cell_sc_field_26['font_size']);
            $this->pdf_text_color($cell_sc_field_26['data'], $cell_sc_field_26['color_r'], $cell_sc_field_26['color_g'], $cell_sc_field_26['color_b']);
            if (!empty($cell_sc_field_26['posx']) && !empty($cell_sc_field_26['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_26['posx'] + $this->SC_incr_col,  $cell_sc_field_26['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_26['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_26['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_26['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_26['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_26['width'], 0, $cell_sc_field_26['data'], 0, 0, $cell_sc_field_26['align']);

            $this->Pdf->SetFont($cell_sc_field_36['font_type'], $cell_sc_field_36['font_style'], $cell_sc_field_36['font_size']);
            $this->pdf_text_color($cell_sc_field_36['data'], $cell_sc_field_36['color_r'], $cell_sc_field_36['color_g'], $cell_sc_field_36['color_b']);
            if (!empty($cell_sc_field_36['posx']) && !empty($cell_sc_field_36['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_36['posx'] + $this->SC_incr_col,  $cell_sc_field_36['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_36['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_36['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_36['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_36['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_36['width'], 0, $cell_sc_field_36['data'], 0, 0, $cell_sc_field_36['align']);

            $this->Pdf->SetFont($cell_JK6['font_type'], $cell_JK6['font_style'], $cell_JK6['font_size']);
            $this->pdf_text_color($cell_JK6['data'], $cell_JK6['color_r'], $cell_JK6['color_g'], $cell_JK6['color_b']);
            if (!empty($cell_JK6['posx']) && !empty($cell_JK6['posy']))
            {
                $this->Pdf->SetXY($cell_JK6['posx'] + $this->SC_incr_col,  $cell_JK6['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_JK6['posx']))
            {
                $this->Pdf->SetX($cell_JK6['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_JK6['posy']))
            {
                $this->Pdf->SetY($cell_JK6['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_JK6['width'], 0, $cell_JK6['data'], 0, 0, $cell_JK6['align']);

            $this->Pdf->SetFont($cell_Usia6['font_type'], $cell_Usia6['font_style'], $cell_Usia6['font_size']);
            $this->pdf_text_color($cell_Usia6['data'], $cell_Usia6['color_r'], $cell_Usia6['color_g'], $cell_Usia6['color_b']);
            if (!empty($cell_Usia6['posx']) && !empty($cell_Usia6['posy']))
            {
                $this->Pdf->SetXY($cell_Usia6['posx'] + $this->SC_incr_col,  $cell_Usia6['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_Usia6['posx']))
            {
                $this->Pdf->SetX($cell_Usia6['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_Usia6['posy']))
            {
                $this->Pdf->SetY($cell_Usia6['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_Usia6['width'], 0, $cell_Usia6['data'], 0, 0, $cell_Usia6['align']);

            $this->Pdf->SetFont($cell_sc_field_07['font_type'], $cell_sc_field_07['font_style'], $cell_sc_field_07['font_size']);
            $this->pdf_text_color($cell_sc_field_07['data'], $cell_sc_field_07['color_r'], $cell_sc_field_07['color_g'], $cell_sc_field_07['color_b']);
            if (!empty($cell_sc_field_07['posx']) && !empty($cell_sc_field_07['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_07['posx'] + $this->SC_incr_col,  $cell_sc_field_07['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_07['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_07['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_07['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_07['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_07['width'], 0, $cell_sc_field_07['data'], 0, 0, $cell_sc_field_07['align']);

            $this->Pdf->SetFont($cell_sc_field_27['font_type'], $cell_sc_field_27['font_style'], $cell_sc_field_27['font_size']);
            $this->pdf_text_color($cell_sc_field_27['data'], $cell_sc_field_27['color_r'], $cell_sc_field_27['color_g'], $cell_sc_field_27['color_b']);
            if (!empty($cell_sc_field_27['posx']) && !empty($cell_sc_field_27['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_27['posx'] + $this->SC_incr_col,  $cell_sc_field_27['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_27['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_27['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_27['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_27['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_27['width'], 0, $cell_sc_field_27['data'], 0, 0, $cell_sc_field_27['align']);

            $this->Pdf->SetFont($cell_sc_field_37['font_type'], $cell_sc_field_37['font_style'], $cell_sc_field_37['font_size']);
            $this->pdf_text_color($cell_sc_field_37['data'], $cell_sc_field_37['color_r'], $cell_sc_field_37['color_g'], $cell_sc_field_37['color_b']);
            if (!empty($cell_sc_field_37['posx']) && !empty($cell_sc_field_37['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_37['posx'] + $this->SC_incr_col,  $cell_sc_field_37['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_37['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_37['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_37['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_37['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_37['width'], 0, $cell_sc_field_37['data'], 0, 0, $cell_sc_field_37['align']);

            $this->Pdf->SetFont($cell_JK7['font_type'], $cell_JK7['font_style'], $cell_JK7['font_size']);
            $this->pdf_text_color($cell_JK7['data'], $cell_JK7['color_r'], $cell_JK7['color_g'], $cell_JK7['color_b']);
            if (!empty($cell_JK7['posx']) && !empty($cell_JK7['posy']))
            {
                $this->Pdf->SetXY($cell_JK7['posx'] + $this->SC_incr_col,  $cell_JK7['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_JK7['posx']))
            {
                $this->Pdf->SetX($cell_JK7['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_JK7['posy']))
            {
                $this->Pdf->SetY($cell_JK7['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_JK7['width'], 0, $cell_JK7['data'], 0, 0, $cell_JK7['align']);

            $this->Pdf->SetFont($cell_Usia7['font_type'], $cell_Usia7['font_style'], $cell_Usia7['font_size']);
            $this->pdf_text_color($cell_Usia7['data'], $cell_Usia7['color_r'], $cell_Usia7['color_g'], $cell_Usia7['color_b']);
            if (!empty($cell_Usia7['posx']) && !empty($cell_Usia7['posy']))
            {
                $this->Pdf->SetXY($cell_Usia7['posx'] + $this->SC_incr_col,  $cell_Usia7['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_Usia7['posx']))
            {
                $this->Pdf->SetX($cell_Usia7['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_Usia7['posy']))
            {
                $this->Pdf->SetY($cell_Usia7['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_Usia7['width'], 0, $cell_Usia7['data'], 0, 0, $cell_Usia7['align']);

            $this->Pdf->SetFont($cell_sc_field_08['font_type'], $cell_sc_field_08['font_style'], $cell_sc_field_08['font_size']);
            $this->pdf_text_color($cell_sc_field_08['data'], $cell_sc_field_08['color_r'], $cell_sc_field_08['color_g'], $cell_sc_field_08['color_b']);
            if (!empty($cell_sc_field_08['posx']) && !empty($cell_sc_field_08['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_08['posx'] + $this->SC_incr_col,  $cell_sc_field_08['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_08['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_08['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_08['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_08['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_08['width'], 0, $cell_sc_field_08['data'], 0, 0, $cell_sc_field_08['align']);

            $this->Pdf->SetFont($cell_sc_field_28['font_type'], $cell_sc_field_28['font_style'], $cell_sc_field_28['font_size']);
            $this->pdf_text_color($cell_sc_field_28['data'], $cell_sc_field_28['color_r'], $cell_sc_field_28['color_g'], $cell_sc_field_28['color_b']);
            if (!empty($cell_sc_field_28['posx']) && !empty($cell_sc_field_28['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_28['posx'] + $this->SC_incr_col,  $cell_sc_field_28['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_28['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_28['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_28['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_28['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_28['width'], 0, $cell_sc_field_28['data'], 0, 0, $cell_sc_field_28['align']);

            $this->Pdf->SetFont($cell_sc_field_38['font_type'], $cell_sc_field_38['font_style'], $cell_sc_field_38['font_size']);
            $this->pdf_text_color($cell_sc_field_38['data'], $cell_sc_field_38['color_r'], $cell_sc_field_38['color_g'], $cell_sc_field_38['color_b']);
            if (!empty($cell_sc_field_38['posx']) && !empty($cell_sc_field_38['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_38['posx'] + $this->SC_incr_col,  $cell_sc_field_38['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_38['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_38['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_38['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_38['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_38['width'], 0, $cell_sc_field_38['data'], 0, 0, $cell_sc_field_38['align']);

            $this->Pdf->SetFont($cell_JK8['font_type'], $cell_JK8['font_style'], $cell_JK8['font_size']);
            $this->pdf_text_color($cell_JK8['data'], $cell_JK8['color_r'], $cell_JK8['color_g'], $cell_JK8['color_b']);
            if (!empty($cell_JK8['posx']) && !empty($cell_JK8['posy']))
            {
                $this->Pdf->SetXY($cell_JK8['posx'] + $this->SC_incr_col,  $cell_JK8['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_JK8['posx']))
            {
                $this->Pdf->SetX($cell_JK8['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_JK8['posy']))
            {
                $this->Pdf->SetY($cell_JK8['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_JK8['width'], 0, $cell_JK8['data'], 0, 0, $cell_JK8['align']);

            $this->Pdf->SetFont($cell_Usia8['font_type'], $cell_Usia8['font_style'], $cell_Usia8['font_size']);
            $this->pdf_text_color($cell_Usia8['data'], $cell_Usia8['color_r'], $cell_Usia8['color_g'], $cell_Usia8['color_b']);
            if (!empty($cell_Usia8['posx']) && !empty($cell_Usia8['posy']))
            {
                $this->Pdf->SetXY($cell_Usia8['posx'] + $this->SC_incr_col,  $cell_Usia8['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_Usia8['posx']))
            {
                $this->Pdf->SetX($cell_Usia8['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_Usia8['posy']))
            {
                $this->Pdf->SetY($cell_Usia8['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_Usia8['width'], 0, $cell_Usia8['data'], 0, 0, $cell_Usia8['align']);

            $this->Pdf->SetFont($cell_sc_field_09['font_type'], $cell_sc_field_09['font_style'], $cell_sc_field_09['font_size']);
            $this->pdf_text_color($cell_sc_field_09['data'], $cell_sc_field_09['color_r'], $cell_sc_field_09['color_g'], $cell_sc_field_09['color_b']);
            if (!empty($cell_sc_field_09['posx']) && !empty($cell_sc_field_09['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_09['posx'] + $this->SC_incr_col,  $cell_sc_field_09['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_09['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_09['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_09['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_09['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_09['width'], 0, $cell_sc_field_09['data'], 0, 0, $cell_sc_field_09['align']);

            $this->Pdf->SetFont($cell_sc_field_29['font_type'], $cell_sc_field_29['font_style'], $cell_sc_field_29['font_size']);
            $this->pdf_text_color($cell_sc_field_29['data'], $cell_sc_field_29['color_r'], $cell_sc_field_29['color_g'], $cell_sc_field_29['color_b']);
            if (!empty($cell_sc_field_29['posx']) && !empty($cell_sc_field_29['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_29['posx'] + $this->SC_incr_col,  $cell_sc_field_29['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_29['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_29['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_29['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_29['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_29['width'], 0, $cell_sc_field_29['data'], 0, 0, $cell_sc_field_29['align']);

            $this->Pdf->SetFont($cell_sc_field_39['font_type'], $cell_sc_field_39['font_style'], $cell_sc_field_39['font_size']);
            $this->pdf_text_color($cell_sc_field_39['data'], $cell_sc_field_39['color_r'], $cell_sc_field_39['color_g'], $cell_sc_field_39['color_b']);
            if (!empty($cell_sc_field_39['posx']) && !empty($cell_sc_field_39['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_39['posx'] + $this->SC_incr_col,  $cell_sc_field_39['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_39['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_39['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_39['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_39['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_39['width'], 0, $cell_sc_field_39['data'], 0, 0, $cell_sc_field_39['align']);

            $this->Pdf->SetFont($cell_JK9['font_type'], $cell_JK9['font_style'], $cell_JK9['font_size']);
            $this->pdf_text_color($cell_JK9['data'], $cell_JK9['color_r'], $cell_JK9['color_g'], $cell_JK9['color_b']);
            if (!empty($cell_JK9['posx']) && !empty($cell_JK9['posy']))
            {
                $this->Pdf->SetXY($cell_JK9['posx'] + $this->SC_incr_col,  $cell_JK9['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_JK9['posx']))
            {
                $this->Pdf->SetX($cell_JK9['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_JK9['posy']))
            {
                $this->Pdf->SetY($cell_JK9['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_JK9['width'], 0, $cell_JK9['data'], 0, 0, $cell_JK9['align']);

            $this->Pdf->SetFont($cell_Usia9['font_type'], $cell_Usia9['font_style'], $cell_Usia9['font_size']);
            $this->pdf_text_color($cell_Usia9['data'], $cell_Usia9['color_r'], $cell_Usia9['color_g'], $cell_Usia9['color_b']);
            if (!empty($cell_Usia9['posx']) && !empty($cell_Usia9['posy']))
            {
                $this->Pdf->SetXY($cell_Usia9['posx'] + $this->SC_incr_col,  $cell_Usia9['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_Usia9['posx']))
            {
                $this->Pdf->SetX($cell_Usia9['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_Usia9['posy']))
            {
                $this->Pdf->SetY($cell_Usia9['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_Usia9['width'], 0, $cell_Usia9['data'], 0, 0, $cell_Usia9['align']);

            $this->Pdf->SetFont($cell_sc_field_010['font_type'], $cell_sc_field_010['font_style'], $cell_sc_field_010['font_size']);
            $this->pdf_text_color($cell_sc_field_010['data'], $cell_sc_field_010['color_r'], $cell_sc_field_010['color_g'], $cell_sc_field_010['color_b']);
            if (!empty($cell_sc_field_010['posx']) && !empty($cell_sc_field_010['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_010['posx'] + $this->SC_incr_col,  $cell_sc_field_010['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_010['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_010['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_010['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_010['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_010['width'], 0, $cell_sc_field_010['data'], 0, 0, $cell_sc_field_010['align']);

            $this->Pdf->SetFont($cell_sc_field_210['font_type'], $cell_sc_field_210['font_style'], $cell_sc_field_210['font_size']);
            $this->pdf_text_color($cell_sc_field_210['data'], $cell_sc_field_210['color_r'], $cell_sc_field_210['color_g'], $cell_sc_field_210['color_b']);
            if (!empty($cell_sc_field_210['posx']) && !empty($cell_sc_field_210['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_210['posx'] + $this->SC_incr_col,  $cell_sc_field_210['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_210['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_210['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_210['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_210['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_210['width'], 0, $cell_sc_field_210['data'], 0, 0, $cell_sc_field_210['align']);

            $this->Pdf->SetFont($cell_sc_field_310['font_type'], $cell_sc_field_310['font_style'], $cell_sc_field_310['font_size']);
            $this->pdf_text_color($cell_sc_field_310['data'], $cell_sc_field_310['color_r'], $cell_sc_field_310['color_g'], $cell_sc_field_310['color_b']);
            if (!empty($cell_sc_field_310['posx']) && !empty($cell_sc_field_310['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_310['posx'] + $this->SC_incr_col,  $cell_sc_field_310['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_310['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_310['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_310['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_310['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_310['width'], 0, $cell_sc_field_310['data'], 0, 0, $cell_sc_field_310['align']);

            $this->Pdf->SetFont($cell_JK10['font_type'], $cell_JK10['font_style'], $cell_JK10['font_size']);
            $this->pdf_text_color($cell_JK10['data'], $cell_JK10['color_r'], $cell_JK10['color_g'], $cell_JK10['color_b']);
            if (!empty($cell_JK10['posx']) && !empty($cell_JK10['posy']))
            {
                $this->Pdf->SetXY($cell_JK10['posx'] + $this->SC_incr_col,  $cell_JK10['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_JK10['posx']))
            {
                $this->Pdf->SetX($cell_JK10['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_JK10['posy']))
            {
                $this->Pdf->SetY($cell_JK10['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_JK10['width'], 0, $cell_JK10['data'], 0, 0, $cell_JK10['align']);

            $this->Pdf->SetFont($cell_Usia10['font_type'], $cell_Usia10['font_style'], $cell_Usia10['font_size']);
            $this->pdf_text_color($cell_Usia10['data'], $cell_Usia10['color_r'], $cell_Usia10['color_g'], $cell_Usia10['color_b']);
            if (!empty($cell_Usia10['posx']) && !empty($cell_Usia10['posy']))
            {
                $this->Pdf->SetXY($cell_Usia10['posx'] + $this->SC_incr_col,  $cell_Usia10['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_Usia10['posx']))
            {
                $this->Pdf->SetX($cell_Usia10['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_Usia10['posy']))
            {
                $this->Pdf->SetY($cell_Usia10['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_Usia10['width'], 0, $cell_Usia10['data'], 0, 0, $cell_Usia10['align']);

            $this->Pdf->SetFont($cell_sc_field_011['font_type'], $cell_sc_field_011['font_style'], $cell_sc_field_011['font_size']);
            $this->pdf_text_color($cell_sc_field_011['data'], $cell_sc_field_011['color_r'], $cell_sc_field_011['color_g'], $cell_sc_field_011['color_b']);
            if (!empty($cell_sc_field_011['posx']) && !empty($cell_sc_field_011['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_011['posx'] + $this->SC_incr_col,  $cell_sc_field_011['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_011['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_011['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_011['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_011['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_011['width'], 0, $cell_sc_field_011['data'], 0, 0, $cell_sc_field_011['align']);

            $this->Pdf->SetFont($cell_sc_field_211['font_type'], $cell_sc_field_211['font_style'], $cell_sc_field_211['font_size']);
            $this->pdf_text_color($cell_sc_field_211['data'], $cell_sc_field_211['color_r'], $cell_sc_field_211['color_g'], $cell_sc_field_211['color_b']);
            if (!empty($cell_sc_field_211['posx']) && !empty($cell_sc_field_211['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_211['posx'] + $this->SC_incr_col,  $cell_sc_field_211['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_211['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_211['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_211['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_211['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_211['width'], 0, $cell_sc_field_211['data'], 0, 0, $cell_sc_field_211['align']);

            $this->Pdf->SetFont($cell_sc_field_311['font_type'], $cell_sc_field_311['font_style'], $cell_sc_field_311['font_size']);
            $this->pdf_text_color($cell_sc_field_311['data'], $cell_sc_field_311['color_r'], $cell_sc_field_311['color_g'], $cell_sc_field_311['color_b']);
            if (!empty($cell_sc_field_311['posx']) && !empty($cell_sc_field_311['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_311['posx'] + $this->SC_incr_col,  $cell_sc_field_311['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_311['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_311['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_311['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_311['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_311['width'], 0, $cell_sc_field_311['data'], 0, 0, $cell_sc_field_311['align']);

            $this->Pdf->SetFont($cell_JK11['font_type'], $cell_JK11['font_style'], $cell_JK11['font_size']);
            $this->pdf_text_color($cell_JK11['data'], $cell_JK11['color_r'], $cell_JK11['color_g'], $cell_JK11['color_b']);
            if (!empty($cell_JK11['posx']) && !empty($cell_JK11['posy']))
            {
                $this->Pdf->SetXY($cell_JK11['posx'] + $this->SC_incr_col,  $cell_JK11['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_JK11['posx']))
            {
                $this->Pdf->SetX($cell_JK11['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_JK11['posy']))
            {
                $this->Pdf->SetY($cell_JK11['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_JK11['width'], 0, $cell_JK11['data'], 0, 0, $cell_JK11['align']);

            $this->Pdf->SetFont($cell_Usia11['font_type'], $cell_Usia11['font_style'], $cell_Usia11['font_size']);
            $this->pdf_text_color($cell_Usia11['data'], $cell_Usia11['color_r'], $cell_Usia11['color_g'], $cell_Usia11['color_b']);
            if (!empty($cell_Usia11['posx']) && !empty($cell_Usia11['posy']))
            {
                $this->Pdf->SetXY($cell_Usia11['posx'] + $this->SC_incr_col,  $cell_Usia11['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_Usia11['posx']))
            {
                $this->Pdf->SetX($cell_Usia11['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_Usia11['posy']))
            {
                $this->Pdf->SetY($cell_Usia11['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_Usia11['width'], 0, $cell_Usia11['data'], 0, 0, $cell_Usia11['align']);

            $this->Pdf->SetFont($cell_sc_field_012['font_type'], $cell_sc_field_012['font_style'], $cell_sc_field_012['font_size']);
            $this->pdf_text_color($cell_sc_field_012['data'], $cell_sc_field_012['color_r'], $cell_sc_field_012['color_g'], $cell_sc_field_012['color_b']);
            if (!empty($cell_sc_field_012['posx']) && !empty($cell_sc_field_012['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_012['posx'] + $this->SC_incr_col,  $cell_sc_field_012['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_012['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_012['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_012['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_012['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_012['width'], 0, $cell_sc_field_012['data'], 0, 0, $cell_sc_field_012['align']);

            $this->Pdf->SetFont($cell_sc_field_212['font_type'], $cell_sc_field_212['font_style'], $cell_sc_field_212['font_size']);
            $this->pdf_text_color($cell_sc_field_212['data'], $cell_sc_field_212['color_r'], $cell_sc_field_212['color_g'], $cell_sc_field_212['color_b']);
            if (!empty($cell_sc_field_212['posx']) && !empty($cell_sc_field_212['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_212['posx'] + $this->SC_incr_col,  $cell_sc_field_212['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_212['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_212['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_212['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_212['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_212['width'], 0, $cell_sc_field_212['data'], 0, 0, $cell_sc_field_212['align']);

            $this->Pdf->SetFont($cell_sc_field_312['font_type'], $cell_sc_field_312['font_style'], $cell_sc_field_312['font_size']);
            $this->pdf_text_color($cell_sc_field_312['data'], $cell_sc_field_312['color_r'], $cell_sc_field_312['color_g'], $cell_sc_field_312['color_b']);
            if (!empty($cell_sc_field_312['posx']) && !empty($cell_sc_field_312['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_312['posx'] + $this->SC_incr_col,  $cell_sc_field_312['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_312['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_312['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_312['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_312['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_312['width'], 0, $cell_sc_field_312['data'], 0, 0, $cell_sc_field_312['align']);

            $this->Pdf->SetFont($cell_JK12['font_type'], $cell_JK12['font_style'], $cell_JK12['font_size']);
            $this->pdf_text_color($cell_JK12['data'], $cell_JK12['color_r'], $cell_JK12['color_g'], $cell_JK12['color_b']);
            if (!empty($cell_JK12['posx']) && !empty($cell_JK12['posy']))
            {
                $this->Pdf->SetXY($cell_JK12['posx'] + $this->SC_incr_col,  $cell_JK12['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_JK12['posx']))
            {
                $this->Pdf->SetX($cell_JK12['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_JK12['posy']))
            {
                $this->Pdf->SetY($cell_JK12['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_JK12['width'], 0, $cell_JK12['data'], 0, 0, $cell_JK12['align']);

            $this->Pdf->SetFont($cell_Usia12['font_type'], $cell_Usia12['font_style'], $cell_Usia12['font_size']);
            $this->pdf_text_color($cell_Usia12['data'], $cell_Usia12['color_r'], $cell_Usia12['color_g'], $cell_Usia12['color_b']);
            if (!empty($cell_Usia12['posx']) && !empty($cell_Usia12['posy']))
            {
                $this->Pdf->SetXY($cell_Usia12['posx'] + $this->SC_incr_col,  $cell_Usia12['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_Usia12['posx']))
            {
                $this->Pdf->SetX($cell_Usia12['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_Usia12['posy']))
            {
                $this->Pdf->SetY($cell_Usia12['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_Usia12['width'], 0, $cell_Usia12['data'], 0, 0, $cell_Usia12['align']);

            $this->Pdf->SetFont($cell_sc_field_013['font_type'], $cell_sc_field_013['font_style'], $cell_sc_field_013['font_size']);
            $this->pdf_text_color($cell_sc_field_013['data'], $cell_sc_field_013['color_r'], $cell_sc_field_013['color_g'], $cell_sc_field_013['color_b']);
            if (!empty($cell_sc_field_013['posx']) && !empty($cell_sc_field_013['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_013['posx'] + $this->SC_incr_col,  $cell_sc_field_013['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_013['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_013['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_013['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_013['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_013['width'], 0, $cell_sc_field_013['data'], 0, 0, $cell_sc_field_013['align']);

            $this->Pdf->SetFont($cell_sc_field_213['font_type'], $cell_sc_field_213['font_style'], $cell_sc_field_213['font_size']);
            $this->pdf_text_color($cell_sc_field_213['data'], $cell_sc_field_213['color_r'], $cell_sc_field_213['color_g'], $cell_sc_field_213['color_b']);
            if (!empty($cell_sc_field_213['posx']) && !empty($cell_sc_field_213['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_213['posx'] + $this->SC_incr_col,  $cell_sc_field_213['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_213['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_213['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_213['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_213['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_213['width'], 0, $cell_sc_field_213['data'], 0, 0, $cell_sc_field_213['align']);

            $this->Pdf->SetFont($cell_sc_field_313['font_type'], $cell_sc_field_313['font_style'], $cell_sc_field_313['font_size']);
            $this->pdf_text_color($cell_sc_field_313['data'], $cell_sc_field_313['color_r'], $cell_sc_field_313['color_g'], $cell_sc_field_313['color_b']);
            if (!empty($cell_sc_field_313['posx']) && !empty($cell_sc_field_313['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_313['posx'] + $this->SC_incr_col,  $cell_sc_field_313['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_313['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_313['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_313['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_313['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_313['width'], 0, $cell_sc_field_313['data'], 0, 0, $cell_sc_field_313['align']);

            $this->Pdf->SetFont($cell_JK13['font_type'], $cell_JK13['font_style'], $cell_JK13['font_size']);
            $this->pdf_text_color($cell_JK13['data'], $cell_JK13['color_r'], $cell_JK13['color_g'], $cell_JK13['color_b']);
            if (!empty($cell_JK13['posx']) && !empty($cell_JK13['posy']))
            {
                $this->Pdf->SetXY($cell_JK13['posx'] + $this->SC_incr_col,  $cell_JK13['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_JK13['posx']))
            {
                $this->Pdf->SetX($cell_JK13['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_JK13['posy']))
            {
                $this->Pdf->SetY($cell_JK13['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_JK13['width'], 0, $cell_JK13['data'], 0, 0, $cell_JK13['align']);

            $this->Pdf->SetFont($cell_Usia13['font_type'], $cell_Usia13['font_style'], $cell_Usia13['font_size']);
            $this->pdf_text_color($cell_Usia13['data'], $cell_Usia13['color_r'], $cell_Usia13['color_g'], $cell_Usia13['color_b']);
            if (!empty($cell_Usia13['posx']) && !empty($cell_Usia13['posy']))
            {
                $this->Pdf->SetXY($cell_Usia13['posx'] + $this->SC_incr_col,  $cell_Usia13['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_Usia13['posx']))
            {
                $this->Pdf->SetX($cell_Usia13['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_Usia13['posy']))
            {
                $this->Pdf->SetY($cell_Usia13['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_Usia13['width'], 0, $cell_Usia13['data'], 0, 0, $cell_Usia13['align']);

            $this->Pdf->SetFont($cell_sc_field_014['font_type'], $cell_sc_field_014['font_style'], $cell_sc_field_014['font_size']);
            $this->pdf_text_color($cell_sc_field_014['data'], $cell_sc_field_014['color_r'], $cell_sc_field_014['color_g'], $cell_sc_field_014['color_b']);
            if (!empty($cell_sc_field_014['posx']) && !empty($cell_sc_field_014['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_014['posx'] + $this->SC_incr_col,  $cell_sc_field_014['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_014['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_014['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_014['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_014['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_014['width'], 0, $cell_sc_field_014['data'], 0, 0, $cell_sc_field_014['align']);

            $this->Pdf->SetFont($cell_sc_field_214['font_type'], $cell_sc_field_214['font_style'], $cell_sc_field_214['font_size']);
            $this->pdf_text_color($cell_sc_field_214['data'], $cell_sc_field_214['color_r'], $cell_sc_field_214['color_g'], $cell_sc_field_214['color_b']);
            if (!empty($cell_sc_field_214['posx']) && !empty($cell_sc_field_214['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_214['posx'] + $this->SC_incr_col,  $cell_sc_field_214['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_214['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_214['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_214['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_214['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_214['width'], 0, $cell_sc_field_214['data'], 0, 0, $cell_sc_field_214['align']);

            $this->Pdf->SetFont($cell_sc_field_314['font_type'], $cell_sc_field_314['font_style'], $cell_sc_field_314['font_size']);
            $this->pdf_text_color($cell_sc_field_314['data'], $cell_sc_field_314['color_r'], $cell_sc_field_314['color_g'], $cell_sc_field_314['color_b']);
            if (!empty($cell_sc_field_314['posx']) && !empty($cell_sc_field_314['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_314['posx'] + $this->SC_incr_col,  $cell_sc_field_314['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_314['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_314['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_314['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_314['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_314['width'], 0, $cell_sc_field_314['data'], 0, 0, $cell_sc_field_314['align']);

            $this->Pdf->SetFont($cell_JK14['font_type'], $cell_JK14['font_style'], $cell_JK14['font_size']);
            $this->pdf_text_color($cell_JK14['data'], $cell_JK14['color_r'], $cell_JK14['color_g'], $cell_JK14['color_b']);
            if (!empty($cell_JK14['posx']) && !empty($cell_JK14['posy']))
            {
                $this->Pdf->SetXY($cell_JK14['posx'] + $this->SC_incr_col,  $cell_JK14['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_JK14['posx']))
            {
                $this->Pdf->SetX($cell_JK14['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_JK14['posy']))
            {
                $this->Pdf->SetY($cell_JK14['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_JK14['width'], 0, $cell_JK14['data'], 0, 0, $cell_JK14['align']);

            $this->Pdf->SetFont($cell_Usia14['font_type'], $cell_Usia14['font_style'], $cell_Usia14['font_size']);
            $this->pdf_text_color($cell_Usia14['data'], $cell_Usia14['color_r'], $cell_Usia14['color_g'], $cell_Usia14['color_b']);
            if (!empty($cell_Usia14['posx']) && !empty($cell_Usia14['posy']))
            {
                $this->Pdf->SetXY($cell_Usia14['posx'] + $this->SC_incr_col,  $cell_Usia14['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_Usia14['posx']))
            {
                $this->Pdf->SetX($cell_Usia14['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_Usia14['posy']))
            {
                $this->Pdf->SetY($cell_Usia14['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_Usia14['width'], 0, $cell_Usia14['data'], 0, 0, $cell_Usia14['align']);

            $this->Pdf->SetFont($cell_sc_field_015['font_type'], $cell_sc_field_015['font_style'], $cell_sc_field_015['font_size']);
            $this->pdf_text_color($cell_sc_field_015['data'], $cell_sc_field_015['color_r'], $cell_sc_field_015['color_g'], $cell_sc_field_015['color_b']);
            if (!empty($cell_sc_field_015['posx']) && !empty($cell_sc_field_015['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_015['posx'] + $this->SC_incr_col,  $cell_sc_field_015['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_015['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_015['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_015['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_015['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_015['width'], 0, $cell_sc_field_015['data'], 0, 0, $cell_sc_field_015['align']);

            $this->Pdf->SetFont($cell_sc_field_215['font_type'], $cell_sc_field_215['font_style'], $cell_sc_field_215['font_size']);
            $this->pdf_text_color($cell_sc_field_215['data'], $cell_sc_field_215['color_r'], $cell_sc_field_215['color_g'], $cell_sc_field_215['color_b']);
            if (!empty($cell_sc_field_215['posx']) && !empty($cell_sc_field_215['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_215['posx'] + $this->SC_incr_col,  $cell_sc_field_215['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_215['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_215['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_215['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_215['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_215['width'], 0, $cell_sc_field_215['data'], 0, 0, $cell_sc_field_215['align']);

            $this->Pdf->SetFont($cell_sc_field_315['font_type'], $cell_sc_field_315['font_style'], $cell_sc_field_315['font_size']);
            $this->pdf_text_color($cell_sc_field_315['data'], $cell_sc_field_315['color_r'], $cell_sc_field_315['color_g'], $cell_sc_field_315['color_b']);
            if (!empty($cell_sc_field_315['posx']) && !empty($cell_sc_field_315['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_315['posx'] + $this->SC_incr_col,  $cell_sc_field_315['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_315['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_315['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_315['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_315['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_315['width'], 0, $cell_sc_field_315['data'], 0, 0, $cell_sc_field_315['align']);

            $this->Pdf->SetFont($cell_JK15['font_type'], $cell_JK15['font_style'], $cell_JK15['font_size']);
            $this->pdf_text_color($cell_JK15['data'], $cell_JK15['color_r'], $cell_JK15['color_g'], $cell_JK15['color_b']);
            if (!empty($cell_JK15['posx']) && !empty($cell_JK15['posy']))
            {
                $this->Pdf->SetXY($cell_JK15['posx'] + $this->SC_incr_col,  $cell_JK15['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_JK15['posx']))
            {
                $this->Pdf->SetX($cell_JK15['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_JK15['posy']))
            {
                $this->Pdf->SetY($cell_JK15['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_JK15['width'], 0, $cell_JK15['data'], 0, 0, $cell_JK15['align']);

            $this->Pdf->SetFont($cell_Usia15['font_type'], $cell_Usia15['font_style'], $cell_Usia15['font_size']);
            $this->pdf_text_color($cell_Usia15['data'], $cell_Usia15['color_r'], $cell_Usia15['color_g'], $cell_Usia15['color_b']);
            if (!empty($cell_Usia15['posx']) && !empty($cell_Usia15['posy']))
            {
                $this->Pdf->SetXY($cell_Usia15['posx'] + $this->SC_incr_col,  $cell_Usia15['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_Usia15['posx']))
            {
                $this->Pdf->SetX($cell_Usia15['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_Usia15['posy']))
            {
                $this->Pdf->SetY($cell_Usia15['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_Usia15['width'], 0, $cell_Usia15['data'], 0, 0, $cell_Usia15['align']);

            $this->Pdf->SetFont($cell_sc_field_016['font_type'], $cell_sc_field_016['font_style'], $cell_sc_field_016['font_size']);
            $this->pdf_text_color($cell_sc_field_016['data'], $cell_sc_field_016['color_r'], $cell_sc_field_016['color_g'], $cell_sc_field_016['color_b']);
            if (!empty($cell_sc_field_016['posx']) && !empty($cell_sc_field_016['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_016['posx'] + $this->SC_incr_col,  $cell_sc_field_016['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_016['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_016['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_016['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_016['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_016['width'], 0, $cell_sc_field_016['data'], 0, 0, $cell_sc_field_016['align']);

            $this->Pdf->SetFont($cell_sc_field_216['font_type'], $cell_sc_field_216['font_style'], $cell_sc_field_216['font_size']);
            $this->pdf_text_color($cell_sc_field_216['data'], $cell_sc_field_216['color_r'], $cell_sc_field_216['color_g'], $cell_sc_field_216['color_b']);
            if (!empty($cell_sc_field_216['posx']) && !empty($cell_sc_field_216['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_216['posx'] + $this->SC_incr_col,  $cell_sc_field_216['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_216['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_216['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_216['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_216['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_216['width'], 0, $cell_sc_field_216['data'], 0, 0, $cell_sc_field_216['align']);

            $this->Pdf->SetFont($cell_sc_field_316['font_type'], $cell_sc_field_316['font_style'], $cell_sc_field_316['font_size']);
            $this->pdf_text_color($cell_sc_field_316['data'], $cell_sc_field_316['color_r'], $cell_sc_field_316['color_g'], $cell_sc_field_316['color_b']);
            if (!empty($cell_sc_field_316['posx']) && !empty($cell_sc_field_316['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_316['posx'] + $this->SC_incr_col,  $cell_sc_field_316['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_316['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_316['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_316['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_316['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_316['width'], 0, $cell_sc_field_316['data'], 0, 0, $cell_sc_field_316['align']);

            $this->Pdf->SetFont($cell_JK16['font_type'], $cell_JK16['font_style'], $cell_JK16['font_size']);
            $this->pdf_text_color($cell_JK16['data'], $cell_JK16['color_r'], $cell_JK16['color_g'], $cell_JK16['color_b']);
            if (!empty($cell_JK16['posx']) && !empty($cell_JK16['posy']))
            {
                $this->Pdf->SetXY($cell_JK16['posx'] + $this->SC_incr_col,  $cell_JK16['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_JK16['posx']))
            {
                $this->Pdf->SetX($cell_JK16['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_JK16['posy']))
            {
                $this->Pdf->SetY($cell_JK16['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_JK16['width'], 0, $cell_JK16['data'], 0, 0, $cell_JK16['align']);

            $this->Pdf->SetFont($cell_Usia16['font_type'], $cell_Usia16['font_style'], $cell_Usia16['font_size']);
            $this->pdf_text_color($cell_Usia16['data'], $cell_Usia16['color_r'], $cell_Usia16['color_g'], $cell_Usia16['color_b']);
            if (!empty($cell_Usia16['posx']) && !empty($cell_Usia16['posy']))
            {
                $this->Pdf->SetXY($cell_Usia16['posx'] + $this->SC_incr_col,  $cell_Usia16['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_Usia16['posx']))
            {
                $this->Pdf->SetX($cell_Usia16['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_Usia16['posy']))
            {
                $this->Pdf->SetY($cell_Usia16['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_Usia16['width'], 0, $cell_Usia16['data'], 0, 0, $cell_Usia16['align']);

            $this->Pdf->SetFont($cell_sc_field_017['font_type'], $cell_sc_field_017['font_style'], $cell_sc_field_017['font_size']);
            $this->pdf_text_color($cell_sc_field_017['data'], $cell_sc_field_017['color_r'], $cell_sc_field_017['color_g'], $cell_sc_field_017['color_b']);
            if (!empty($cell_sc_field_017['posx']) && !empty($cell_sc_field_017['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_017['posx'] + $this->SC_incr_col,  $cell_sc_field_017['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_017['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_017['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_017['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_017['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_017['width'], 0, $cell_sc_field_017['data'], 0, 0, $cell_sc_field_017['align']);

            $this->Pdf->SetFont($cell_sc_field_217['font_type'], $cell_sc_field_217['font_style'], $cell_sc_field_217['font_size']);
            $this->pdf_text_color($cell_sc_field_217['data'], $cell_sc_field_217['color_r'], $cell_sc_field_217['color_g'], $cell_sc_field_217['color_b']);
            if (!empty($cell_sc_field_217['posx']) && !empty($cell_sc_field_217['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_217['posx'] + $this->SC_incr_col,  $cell_sc_field_217['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_217['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_217['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_217['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_217['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_217['width'], 0, $cell_sc_field_217['data'], 0, 0, $cell_sc_field_217['align']);

            $this->Pdf->SetFont($cell_sc_field_317['font_type'], $cell_sc_field_317['font_style'], $cell_sc_field_317['font_size']);
            $this->pdf_text_color($cell_sc_field_317['data'], $cell_sc_field_317['color_r'], $cell_sc_field_317['color_g'], $cell_sc_field_317['color_b']);
            if (!empty($cell_sc_field_317['posx']) && !empty($cell_sc_field_317['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_317['posx'] + $this->SC_incr_col,  $cell_sc_field_317['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_317['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_317['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_317['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_317['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_317['width'], 0, $cell_sc_field_317['data'], 0, 0, $cell_sc_field_317['align']);

            $this->Pdf->SetFont($cell_JK17['font_type'], $cell_JK17['font_style'], $cell_JK17['font_size']);
            $this->pdf_text_color($cell_JK17['data'], $cell_JK17['color_r'], $cell_JK17['color_g'], $cell_JK17['color_b']);
            if (!empty($cell_JK17['posx']) && !empty($cell_JK17['posy']))
            {
                $this->Pdf->SetXY($cell_JK17['posx'] + $this->SC_incr_col,  $cell_JK17['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_JK17['posx']))
            {
                $this->Pdf->SetX($cell_JK17['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_JK17['posy']))
            {
                $this->Pdf->SetY($cell_JK17['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_JK17['width'], 0, $cell_JK17['data'], 0, 0, $cell_JK17['align']);

            $this->Pdf->SetFont($cell_Usia17['font_type'], $cell_Usia17['font_style'], $cell_Usia17['font_size']);
            $this->pdf_text_color($cell_Usia17['data'], $cell_Usia17['color_r'], $cell_Usia17['color_g'], $cell_Usia17['color_b']);
            if (!empty($cell_Usia17['posx']) && !empty($cell_Usia17['posy']))
            {
                $this->Pdf->SetXY($cell_Usia17['posx'] + $this->SC_incr_col,  $cell_Usia17['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_Usia17['posx']))
            {
                $this->Pdf->SetX($cell_Usia17['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_Usia17['posy']))
            {
                $this->Pdf->SetY($cell_Usia17['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_Usia17['width'], 0, $cell_Usia17['data'], 0, 0, $cell_Usia17['align']);

            $this->Pdf->SetFont($cell_sc_field_018['font_type'], $cell_sc_field_018['font_style'], $cell_sc_field_018['font_size']);
            $this->pdf_text_color($cell_sc_field_018['data'], $cell_sc_field_018['color_r'], $cell_sc_field_018['color_g'], $cell_sc_field_018['color_b']);
            if (!empty($cell_sc_field_018['posx']) && !empty($cell_sc_field_018['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_018['posx'] + $this->SC_incr_col,  $cell_sc_field_018['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_018['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_018['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_018['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_018['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_018['width'], 0, $cell_sc_field_018['data'], 0, 0, $cell_sc_field_018['align']);

            $this->Pdf->SetFont($cell_sc_field_218['font_type'], $cell_sc_field_218['font_style'], $cell_sc_field_218['font_size']);
            $this->pdf_text_color($cell_sc_field_218['data'], $cell_sc_field_218['color_r'], $cell_sc_field_218['color_g'], $cell_sc_field_218['color_b']);
            if (!empty($cell_sc_field_218['posx']) && !empty($cell_sc_field_218['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_218['posx'] + $this->SC_incr_col,  $cell_sc_field_218['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_218['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_218['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_218['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_218['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_218['width'], 0, $cell_sc_field_218['data'], 0, 0, $cell_sc_field_218['align']);

            $this->Pdf->SetFont($cell_sc_field_318['font_type'], $cell_sc_field_318['font_style'], $cell_sc_field_318['font_size']);
            $this->pdf_text_color($cell_sc_field_318['data'], $cell_sc_field_318['color_r'], $cell_sc_field_318['color_g'], $cell_sc_field_318['color_b']);
            if (!empty($cell_sc_field_318['posx']) && !empty($cell_sc_field_318['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_318['posx'] + $this->SC_incr_col,  $cell_sc_field_318['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_318['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_318['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_318['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_318['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_318['width'], 0, $cell_sc_field_318['data'], 0, 0, $cell_sc_field_318['align']);

            $this->Pdf->SetFont($cell_JK18['font_type'], $cell_JK18['font_style'], $cell_JK18['font_size']);
            $this->pdf_text_color($cell_JK18['data'], $cell_JK18['color_r'], $cell_JK18['color_g'], $cell_JK18['color_b']);
            if (!empty($cell_JK18['posx']) && !empty($cell_JK18['posy']))
            {
                $this->Pdf->SetXY($cell_JK18['posx'] + $this->SC_incr_col,  $cell_JK18['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_JK18['posx']))
            {
                $this->Pdf->SetX($cell_JK18['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_JK18['posy']))
            {
                $this->Pdf->SetY($cell_JK18['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_JK18['width'], 0, $cell_JK18['data'], 0, 0, $cell_JK18['align']);

            $this->Pdf->SetFont($cell_Usia18['font_type'], $cell_Usia18['font_style'], $cell_Usia18['font_size']);
            $this->pdf_text_color($cell_Usia18['data'], $cell_Usia18['color_r'], $cell_Usia18['color_g'], $cell_Usia18['color_b']);
            if (!empty($cell_Usia18['posx']) && !empty($cell_Usia18['posy']))
            {
                $this->Pdf->SetXY($cell_Usia18['posx'] + $this->SC_incr_col,  $cell_Usia18['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_Usia18['posx']))
            {
                $this->Pdf->SetX($cell_Usia18['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_Usia18['posy']))
            {
                $this->Pdf->SetY($cell_Usia18['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_Usia18['width'], 0, $cell_Usia18['data'], 0, 0, $cell_Usia18['align']);

            $this->Pdf->SetFont($cell_sc_field_019['font_type'], $cell_sc_field_019['font_style'], $cell_sc_field_019['font_size']);
            $this->pdf_text_color($cell_sc_field_019['data'], $cell_sc_field_019['color_r'], $cell_sc_field_019['color_g'], $cell_sc_field_019['color_b']);
            if (!empty($cell_sc_field_019['posx']) && !empty($cell_sc_field_019['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_019['posx'] + $this->SC_incr_col,  $cell_sc_field_019['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_019['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_019['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_019['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_019['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_019['width'], 0, $cell_sc_field_019['data'], 0, 0, $cell_sc_field_019['align']);

            $this->Pdf->SetFont($cell_sc_field_219['font_type'], $cell_sc_field_219['font_style'], $cell_sc_field_219['font_size']);
            $this->pdf_text_color($cell_sc_field_219['data'], $cell_sc_field_219['color_r'], $cell_sc_field_219['color_g'], $cell_sc_field_219['color_b']);
            if (!empty($cell_sc_field_219['posx']) && !empty($cell_sc_field_219['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_219['posx'] + $this->SC_incr_col,  $cell_sc_field_219['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_219['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_219['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_219['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_219['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_219['width'], 0, $cell_sc_field_219['data'], 0, 0, $cell_sc_field_219['align']);

            $this->Pdf->SetFont($cell_sc_field_319['font_type'], $cell_sc_field_319['font_style'], $cell_sc_field_319['font_size']);
            $this->pdf_text_color($cell_sc_field_319['data'], $cell_sc_field_319['color_r'], $cell_sc_field_319['color_g'], $cell_sc_field_319['color_b']);
            if (!empty($cell_sc_field_319['posx']) && !empty($cell_sc_field_319['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_319['posx'] + $this->SC_incr_col,  $cell_sc_field_319['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_319['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_319['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_319['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_319['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_319['width'], 0, $cell_sc_field_319['data'], 0, 0, $cell_sc_field_319['align']);

            $this->Pdf->SetFont($cell_JK19['font_type'], $cell_JK19['font_style'], $cell_JK19['font_size']);
            $this->pdf_text_color($cell_JK19['data'], $cell_JK19['color_r'], $cell_JK19['color_g'], $cell_JK19['color_b']);
            if (!empty($cell_JK19['posx']) && !empty($cell_JK19['posy']))
            {
                $this->Pdf->SetXY($cell_JK19['posx'] + $this->SC_incr_col,  $cell_JK19['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_JK19['posx']))
            {
                $this->Pdf->SetX($cell_JK19['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_JK19['posy']))
            {
                $this->Pdf->SetY($cell_JK19['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_JK19['width'], 0, $cell_JK19['data'], 0, 0, $cell_JK19['align']);

            $this->Pdf->SetFont($cell_usia19['font_type'], $cell_usia19['font_style'], $cell_usia19['font_size']);
            $this->pdf_text_color($cell_usia19['data'], $cell_usia19['color_r'], $cell_usia19['color_g'], $cell_usia19['color_b']);
            if (!empty($cell_usia19['posx']) && !empty($cell_usia19['posy']))
            {
                $this->Pdf->SetXY($cell_usia19['posx'] + $this->SC_incr_col,  $cell_usia19['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_usia19['posx']))
            {
                $this->Pdf->SetX($cell_usia19['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_usia19['posy']))
            {
                $this->Pdf->SetY($cell_usia19['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_usia19['width'], 0, $cell_usia19['data'], 0, 0, $cell_usia19['align']);

            $this->Pdf->SetFont($cell_sc_field_020['font_type'], $cell_sc_field_020['font_style'], $cell_sc_field_020['font_size']);
            $this->pdf_text_color($cell_sc_field_020['data'], $cell_sc_field_020['color_r'], $cell_sc_field_020['color_g'], $cell_sc_field_020['color_b']);
            if (!empty($cell_sc_field_020['posx']) && !empty($cell_sc_field_020['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_020['posx'] + $this->SC_incr_col,  $cell_sc_field_020['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_020['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_020['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_020['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_020['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_020['width'], 0, $cell_sc_field_020['data'], 0, 0, $cell_sc_field_020['align']);

            $this->Pdf->SetFont($cell_sc_field_220['font_type'], $cell_sc_field_220['font_style'], $cell_sc_field_220['font_size']);
            $this->pdf_text_color($cell_sc_field_220['data'], $cell_sc_field_220['color_r'], $cell_sc_field_220['color_g'], $cell_sc_field_220['color_b']);
            if (!empty($cell_sc_field_220['posx']) && !empty($cell_sc_field_220['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_220['posx'] + $this->SC_incr_col,  $cell_sc_field_220['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_220['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_220['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_220['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_220['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_220['width'], 0, $cell_sc_field_220['data'], 0, 0, $cell_sc_field_220['align']);

            $this->Pdf->SetFont($cell_sc_field_320['font_type'], $cell_sc_field_320['font_style'], $cell_sc_field_320['font_size']);
            $this->pdf_text_color($cell_sc_field_320['data'], $cell_sc_field_320['color_r'], $cell_sc_field_320['color_g'], $cell_sc_field_320['color_b']);
            if (!empty($cell_sc_field_320['posx']) && !empty($cell_sc_field_320['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_320['posx'] + $this->SC_incr_col,  $cell_sc_field_320['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_320['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_320['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_320['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_320['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_320['width'], 0, $cell_sc_field_320['data'], 0, 0, $cell_sc_field_320['align']);

            $this->Pdf->SetFont($cell_JK20['font_type'], $cell_JK20['font_style'], $cell_JK20['font_size']);
            $this->pdf_text_color($cell_JK20['data'], $cell_JK20['color_r'], $cell_JK20['color_g'], $cell_JK20['color_b']);
            if (!empty($cell_JK20['posx']) && !empty($cell_JK20['posy']))
            {
                $this->Pdf->SetXY($cell_JK20['posx'] + $this->SC_incr_col,  $cell_JK20['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_JK20['posx']))
            {
                $this->Pdf->SetX($cell_JK20['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_JK20['posy']))
            {
                $this->Pdf->SetY($cell_JK20['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_JK20['width'], 0, $cell_JK20['data'], 0, 0, $cell_JK20['align']);

            $this->Pdf->SetFont($cell_Usia20['font_type'], $cell_Usia20['font_style'], $cell_Usia20['font_size']);
            $this->pdf_text_color($cell_Usia20['data'], $cell_Usia20['color_r'], $cell_Usia20['color_g'], $cell_Usia20['color_b']);
            if (!empty($cell_Usia20['posx']) && !empty($cell_Usia20['posy']))
            {
                $this->Pdf->SetXY($cell_Usia20['posx'] + $this->SC_incr_col,  $cell_Usia20['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_Usia20['posx']))
            {
                $this->Pdf->SetX($cell_Usia20['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_Usia20['posy']))
            {
                $this->Pdf->SetY($cell_Usia20['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_Usia20['width'], 0, $cell_Usia20['data'], 0, 0, $cell_Usia20['align']);

            $this->Pdf->SetFont($cell_sc_field_021['font_type'], $cell_sc_field_021['font_style'], $cell_sc_field_021['font_size']);
            $this->pdf_text_color($cell_sc_field_021['data'], $cell_sc_field_021['color_r'], $cell_sc_field_021['color_g'], $cell_sc_field_021['color_b']);
            if (!empty($cell_sc_field_021['posx']) && !empty($cell_sc_field_021['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_021['posx'] + $this->SC_incr_col,  $cell_sc_field_021['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_021['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_021['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_021['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_021['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_021['width'], 0, $cell_sc_field_021['data'], 0, 0, $cell_sc_field_021['align']);

            $this->Pdf->SetFont($cell_sc_field_221['font_type'], $cell_sc_field_221['font_style'], $cell_sc_field_221['font_size']);
            $this->pdf_text_color($cell_sc_field_221['data'], $cell_sc_field_221['color_r'], $cell_sc_field_221['color_g'], $cell_sc_field_221['color_b']);
            if (!empty($cell_sc_field_221['posx']) && !empty($cell_sc_field_221['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_221['posx'] + $this->SC_incr_col,  $cell_sc_field_221['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_221['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_221['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_221['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_221['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_221['width'], 0, $cell_sc_field_221['data'], 0, 0, $cell_sc_field_221['align']);

            $this->Pdf->SetFont($cell_sc_field_321['font_type'], $cell_sc_field_321['font_style'], $cell_sc_field_321['font_size']);
            $this->pdf_text_color($cell_sc_field_321['data'], $cell_sc_field_321['color_r'], $cell_sc_field_321['color_g'], $cell_sc_field_321['color_b']);
            if (!empty($cell_sc_field_321['posx']) && !empty($cell_sc_field_321['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_321['posx'] + $this->SC_incr_col,  $cell_sc_field_321['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_321['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_321['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_321['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_321['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_321['width'], 0, $cell_sc_field_321['data'], 0, 0, $cell_sc_field_321['align']);

            $this->Pdf->SetFont($cell_JK21['font_type'], $cell_JK21['font_style'], $cell_JK21['font_size']);
            $this->pdf_text_color($cell_JK21['data'], $cell_JK21['color_r'], $cell_JK21['color_g'], $cell_JK21['color_b']);
            if (!empty($cell_JK21['posx']) && !empty($cell_JK21['posy']))
            {
                $this->Pdf->SetXY($cell_JK21['posx'] + $this->SC_incr_col,  $cell_JK21['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_JK21['posx']))
            {
                $this->Pdf->SetX($cell_JK21['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_JK21['posy']))
            {
                $this->Pdf->SetY($cell_JK21['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_JK21['width'], 0, $cell_JK21['data'], 0, 0, $cell_JK21['align']);

            $this->Pdf->SetFont($cell_Usia21['font_type'], $cell_Usia21['font_style'], $cell_Usia21['font_size']);
            $this->pdf_text_color($cell_Usia21['data'], $cell_Usia21['color_r'], $cell_Usia21['color_g'], $cell_Usia21['color_b']);
            if (!empty($cell_Usia21['posx']) && !empty($cell_Usia21['posy']))
            {
                $this->Pdf->SetXY($cell_Usia21['posx'] + $this->SC_incr_col,  $cell_Usia21['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_Usia21['posx']))
            {
                $this->Pdf->SetX($cell_Usia21['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_Usia21['posy']))
            {
                $this->Pdf->SetY($cell_Usia21['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_Usia21['width'], 0, $cell_Usia21['data'], 0, 0, $cell_Usia21['align']);

            $this->Pdf->SetFont($cell_sc_field_022['font_type'], $cell_sc_field_022['font_style'], $cell_sc_field_022['font_size']);
            $this->pdf_text_color($cell_sc_field_022['data'], $cell_sc_field_022['color_r'], $cell_sc_field_022['color_g'], $cell_sc_field_022['color_b']);
            if (!empty($cell_sc_field_022['posx']) && !empty($cell_sc_field_022['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_022['posx'] + $this->SC_incr_col,  $cell_sc_field_022['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_022['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_022['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_022['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_022['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_022['width'], 0, $cell_sc_field_022['data'], 0, 0, $cell_sc_field_022['align']);

            $this->Pdf->SetFont($cell_sc_field_222['font_type'], $cell_sc_field_222['font_style'], $cell_sc_field_222['font_size']);
            $this->pdf_text_color($cell_sc_field_222['data'], $cell_sc_field_222['color_r'], $cell_sc_field_222['color_g'], $cell_sc_field_222['color_b']);
            if (!empty($cell_sc_field_222['posx']) && !empty($cell_sc_field_222['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_222['posx'] + $this->SC_incr_col,  $cell_sc_field_222['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_222['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_222['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_222['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_222['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_222['width'], 0, $cell_sc_field_222['data'], 0, 0, $cell_sc_field_222['align']);

            $this->Pdf->SetFont($cell_sc_field_322['font_type'], $cell_sc_field_322['font_style'], $cell_sc_field_322['font_size']);
            $this->pdf_text_color($cell_sc_field_322['data'], $cell_sc_field_322['color_r'], $cell_sc_field_322['color_g'], $cell_sc_field_322['color_b']);
            if (!empty($cell_sc_field_322['posx']) && !empty($cell_sc_field_322['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_322['posx'] + $this->SC_incr_col,  $cell_sc_field_322['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_322['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_322['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_322['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_322['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_322['width'], 0, $cell_sc_field_322['data'], 0, 0, $cell_sc_field_322['align']);

            $this->Pdf->SetFont($cell_JK22['font_type'], $cell_JK22['font_style'], $cell_JK22['font_size']);
            $this->pdf_text_color($cell_JK22['data'], $cell_JK22['color_r'], $cell_JK22['color_g'], $cell_JK22['color_b']);
            if (!empty($cell_JK22['posx']) && !empty($cell_JK22['posy']))
            {
                $this->Pdf->SetXY($cell_JK22['posx'] + $this->SC_incr_col,  $cell_JK22['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_JK22['posx']))
            {
                $this->Pdf->SetX($cell_JK22['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_JK22['posy']))
            {
                $this->Pdf->SetY($cell_JK22['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_JK22['width'], 0, $cell_JK22['data'], 0, 0, $cell_JK22['align']);

            $this->Pdf->SetFont($cell_Usia22['font_type'], $cell_Usia22['font_style'], $cell_Usia22['font_size']);
            $this->pdf_text_color($cell_Usia22['data'], $cell_Usia22['color_r'], $cell_Usia22['color_g'], $cell_Usia22['color_b']);
            if (!empty($cell_Usia22['posx']) && !empty($cell_Usia22['posy']))
            {
                $this->Pdf->SetXY($cell_Usia22['posx'] + $this->SC_incr_col,  $cell_Usia22['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_Usia22['posx']))
            {
                $this->Pdf->SetX($cell_Usia22['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_Usia22['posy']))
            {
                $this->Pdf->SetY($cell_Usia22['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_Usia22['width'], 0, $cell_Usia22['data'], 0, 0, $cell_Usia22['align']);

            $this->Pdf->SetFont($cell_sc_field_023['font_type'], $cell_sc_field_023['font_style'], $cell_sc_field_023['font_size']);
            $this->pdf_text_color($cell_sc_field_023['data'], $cell_sc_field_023['color_r'], $cell_sc_field_023['color_g'], $cell_sc_field_023['color_b']);
            if (!empty($cell_sc_field_023['posx']) && !empty($cell_sc_field_023['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_023['posx'] + $this->SC_incr_col,  $cell_sc_field_023['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_023['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_023['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_023['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_023['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_023['width'], 0, $cell_sc_field_023['data'], 0, 0, $cell_sc_field_023['align']);

            $this->Pdf->SetFont($cell_sc_field_223['font_type'], $cell_sc_field_223['font_style'], $cell_sc_field_223['font_size']);
            $this->pdf_text_color($cell_sc_field_223['data'], $cell_sc_field_223['color_r'], $cell_sc_field_223['color_g'], $cell_sc_field_223['color_b']);
            if (!empty($cell_sc_field_223['posx']) && !empty($cell_sc_field_223['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_223['posx'] + $this->SC_incr_col,  $cell_sc_field_223['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_223['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_223['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_223['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_223['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_223['width'], 0, $cell_sc_field_223['data'], 0, 0, $cell_sc_field_223['align']);

            $this->Pdf->SetFont($cell_sc_field_323['font_type'], $cell_sc_field_323['font_style'], $cell_sc_field_323['font_size']);
            $this->pdf_text_color($cell_sc_field_323['data'], $cell_sc_field_323['color_r'], $cell_sc_field_323['color_g'], $cell_sc_field_323['color_b']);
            if (!empty($cell_sc_field_323['posx']) && !empty($cell_sc_field_323['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_323['posx'] + $this->SC_incr_col,  $cell_sc_field_323['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_323['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_323['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_323['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_323['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_323['width'], 0, $cell_sc_field_323['data'], 0, 0, $cell_sc_field_323['align']);

            $this->Pdf->SetFont($cell_JK23['font_type'], $cell_JK23['font_style'], $cell_JK23['font_size']);
            $this->pdf_text_color($cell_JK23['data'], $cell_JK23['color_r'], $cell_JK23['color_g'], $cell_JK23['color_b']);
            if (!empty($cell_JK23['posx']) && !empty($cell_JK23['posy']))
            {
                $this->Pdf->SetXY($cell_JK23['posx'] + $this->SC_incr_col,  $cell_JK23['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_JK23['posx']))
            {
                $this->Pdf->SetX($cell_JK23['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_JK23['posy']))
            {
                $this->Pdf->SetY($cell_JK23['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_JK23['width'], 0, $cell_JK23['data'], 0, 0, $cell_JK23['align']);

            $this->Pdf->SetFont($cell_Usia23['font_type'], $cell_Usia23['font_style'], $cell_Usia23['font_size']);
            $this->pdf_text_color($cell_Usia23['data'], $cell_Usia23['color_r'], $cell_Usia23['color_g'], $cell_Usia23['color_b']);
            if (!empty($cell_Usia23['posx']) && !empty($cell_Usia23['posy']))
            {
                $this->Pdf->SetXY($cell_Usia23['posx'] + $this->SC_incr_col,  $cell_Usia23['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_Usia23['posx']))
            {
                $this->Pdf->SetX($cell_Usia23['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_Usia23['posy']))
            {
                $this->Pdf->SetY($cell_Usia23['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_Usia23['width'], 0, $cell_Usia23['data'], 0, 0, $cell_Usia23['align']);

            $this->Pdf->SetFont($cell_sc_field_024['font_type'], $cell_sc_field_024['font_style'], $cell_sc_field_024['font_size']);
            $this->pdf_text_color($cell_sc_field_024['data'], $cell_sc_field_024['color_r'], $cell_sc_field_024['color_g'], $cell_sc_field_024['color_b']);
            if (!empty($cell_sc_field_024['posx']) && !empty($cell_sc_field_024['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_024['posx'] + $this->SC_incr_col,  $cell_sc_field_024['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_024['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_024['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_024['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_024['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_024['width'], 0, $cell_sc_field_024['data'], 0, 0, $cell_sc_field_024['align']);

            $this->Pdf->SetFont($cell_sc_field_224['font_type'], $cell_sc_field_224['font_style'], $cell_sc_field_224['font_size']);
            $this->pdf_text_color($cell_sc_field_224['data'], $cell_sc_field_224['color_r'], $cell_sc_field_224['color_g'], $cell_sc_field_224['color_b']);
            if (!empty($cell_sc_field_224['posx']) && !empty($cell_sc_field_224['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_224['posx'] + $this->SC_incr_col,  $cell_sc_field_224['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_224['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_224['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_224['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_224['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_224['width'], 0, $cell_sc_field_224['data'], 0, 0, $cell_sc_field_224['align']);

            $this->Pdf->SetFont($cell_sc_field_324['font_type'], $cell_sc_field_324['font_style'], $cell_sc_field_324['font_size']);
            $this->pdf_text_color($cell_sc_field_324['data'], $cell_sc_field_324['color_r'], $cell_sc_field_324['color_g'], $cell_sc_field_324['color_b']);
            if (!empty($cell_sc_field_324['posx']) && !empty($cell_sc_field_324['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_324['posx'] + $this->SC_incr_col,  $cell_sc_field_324['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_324['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_324['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_324['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_324['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_324['width'], 0, $cell_sc_field_324['data'], 0, 0, $cell_sc_field_324['align']);

            $this->Pdf->SetFont($cell_JK24['font_type'], $cell_JK24['font_style'], $cell_JK24['font_size']);
            $this->pdf_text_color($cell_JK24['data'], $cell_JK24['color_r'], $cell_JK24['color_g'], $cell_JK24['color_b']);
            if (!empty($cell_JK24['posx']) && !empty($cell_JK24['posy']))
            {
                $this->Pdf->SetXY($cell_JK24['posx'] + $this->SC_incr_col,  $cell_JK24['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_JK24['posx']))
            {
                $this->Pdf->SetX($cell_JK24['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_JK24['posy']))
            {
                $this->Pdf->SetY($cell_JK24['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_JK24['width'], 0, $cell_JK24['data'], 0, 0, $cell_JK24['align']);

            $this->Pdf->SetFont($cell_Usia24['font_type'], $cell_Usia24['font_style'], $cell_Usia24['font_size']);
            $this->pdf_text_color($cell_Usia24['data'], $cell_Usia24['color_r'], $cell_Usia24['color_g'], $cell_Usia24['color_b']);
            if (!empty($cell_Usia24['posx']) && !empty($cell_Usia24['posy']))
            {
                $this->Pdf->SetXY($cell_Usia24['posx'] + $this->SC_incr_col,  $cell_Usia24['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_Usia24['posx']))
            {
                $this->Pdf->SetX($cell_Usia24['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_Usia24['posy']))
            {
                $this->Pdf->SetY($cell_Usia24['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_Usia24['width'], 0, $cell_Usia24['data'], 0, 0, $cell_Usia24['align']);

            $this->Pdf->SetFont($cell_sc_field_025['font_type'], $cell_sc_field_025['font_style'], $cell_sc_field_025['font_size']);
            $this->pdf_text_color($cell_sc_field_025['data'], $cell_sc_field_025['color_r'], $cell_sc_field_025['color_g'], $cell_sc_field_025['color_b']);
            if (!empty($cell_sc_field_025['posx']) && !empty($cell_sc_field_025['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_025['posx'] + $this->SC_incr_col,  $cell_sc_field_025['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_025['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_025['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_025['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_025['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_025['width'], 0, $cell_sc_field_025['data'], 0, 0, $cell_sc_field_025['align']);

            $this->Pdf->SetFont($cell_sc_field_225['font_type'], $cell_sc_field_225['font_style'], $cell_sc_field_225['font_size']);
            $this->pdf_text_color($cell_sc_field_225['data'], $cell_sc_field_225['color_r'], $cell_sc_field_225['color_g'], $cell_sc_field_225['color_b']);
            if (!empty($cell_sc_field_225['posx']) && !empty($cell_sc_field_225['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_225['posx'] + $this->SC_incr_col,  $cell_sc_field_225['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_225['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_225['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_225['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_225['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_225['width'], 0, $cell_sc_field_225['data'], 0, 0, $cell_sc_field_225['align']);

            $this->Pdf->SetFont($cell_sc_field_325['font_type'], $cell_sc_field_325['font_style'], $cell_sc_field_325['font_size']);
            $this->pdf_text_color($cell_sc_field_325['data'], $cell_sc_field_325['color_r'], $cell_sc_field_325['color_g'], $cell_sc_field_325['color_b']);
            if (!empty($cell_sc_field_325['posx']) && !empty($cell_sc_field_325['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_325['posx'] + $this->SC_incr_col,  $cell_sc_field_325['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_325['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_325['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_325['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_325['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_325['width'], 0, $cell_sc_field_325['data'], 0, 0, $cell_sc_field_325['align']);

            $this->Pdf->SetFont($cell_JK25['font_type'], $cell_JK25['font_style'], $cell_JK25['font_size']);
            $this->pdf_text_color($cell_JK25['data'], $cell_JK25['color_r'], $cell_JK25['color_g'], $cell_JK25['color_b']);
            if (!empty($cell_JK25['posx']) && !empty($cell_JK25['posy']))
            {
                $this->Pdf->SetXY($cell_JK25['posx'] + $this->SC_incr_col,  $cell_JK25['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_JK25['posx']))
            {
                $this->Pdf->SetX($cell_JK25['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_JK25['posy']))
            {
                $this->Pdf->SetY($cell_JK25['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_JK25['width'], 0, $cell_JK25['data'], 0, 0, $cell_JK25['align']);

            $this->Pdf->SetFont($cell_usia25['font_type'], $cell_usia25['font_style'], $cell_usia25['font_size']);
            $this->pdf_text_color($cell_usia25['data'], $cell_usia25['color_r'], $cell_usia25['color_g'], $cell_usia25['color_b']);
            if (!empty($cell_usia25['posx']) && !empty($cell_usia25['posy']))
            {
                $this->Pdf->SetXY($cell_usia25['posx'] + $this->SC_incr_col,  $cell_usia25['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_usia25['posx']))
            {
                $this->Pdf->SetX($cell_usia25['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_usia25['posy']))
            {
                $this->Pdf->SetY($cell_usia25['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_usia25['width'], 0, $cell_usia25['data'], 0, 0, $cell_usia25['align']);

            $this->Pdf->SetFont($cell_sc_field_026['font_type'], $cell_sc_field_026['font_style'], $cell_sc_field_026['font_size']);
            $this->pdf_text_color($cell_sc_field_026['data'], $cell_sc_field_026['color_r'], $cell_sc_field_026['color_g'], $cell_sc_field_026['color_b']);
            if (!empty($cell_sc_field_026['posx']) && !empty($cell_sc_field_026['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_026['posx'] + $this->SC_incr_col,  $cell_sc_field_026['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_026['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_026['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_026['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_026['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_026['width'], 0, $cell_sc_field_026['data'], 0, 0, $cell_sc_field_026['align']);

            $this->Pdf->SetFont($cell_sc_field_226['font_type'], $cell_sc_field_226['font_style'], $cell_sc_field_226['font_size']);
            $this->pdf_text_color($cell_sc_field_226['data'], $cell_sc_field_226['color_r'], $cell_sc_field_226['color_g'], $cell_sc_field_226['color_b']);
            if (!empty($cell_sc_field_226['posx']) && !empty($cell_sc_field_226['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_226['posx'] + $this->SC_incr_col,  $cell_sc_field_226['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_226['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_226['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_226['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_226['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_226['width'], 0, $cell_sc_field_226['data'], 0, 0, $cell_sc_field_226['align']);

            $this->Pdf->SetFont($cell_sc_field_326['font_type'], $cell_sc_field_326['font_style'], $cell_sc_field_326['font_size']);
            $this->pdf_text_color($cell_sc_field_326['data'], $cell_sc_field_326['color_r'], $cell_sc_field_326['color_g'], $cell_sc_field_326['color_b']);
            if (!empty($cell_sc_field_326['posx']) && !empty($cell_sc_field_326['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_326['posx'] + $this->SC_incr_col,  $cell_sc_field_326['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_326['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_326['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_326['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_326['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_326['width'], 0, $cell_sc_field_326['data'], 0, 0, $cell_sc_field_326['align']);

            $this->Pdf->SetFont($cell_JK26['font_type'], $cell_JK26['font_style'], $cell_JK26['font_size']);
            $this->pdf_text_color($cell_JK26['data'], $cell_JK26['color_r'], $cell_JK26['color_g'], $cell_JK26['color_b']);
            if (!empty($cell_JK26['posx']) && !empty($cell_JK26['posy']))
            {
                $this->Pdf->SetXY($cell_JK26['posx'] + $this->SC_incr_col,  $cell_JK26['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_JK26['posx']))
            {
                $this->Pdf->SetX($cell_JK26['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_JK26['posy']))
            {
                $this->Pdf->SetY($cell_JK26['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_JK26['width'], 0, $cell_JK26['data'], 0, 0, $cell_JK26['align']);

            $this->Pdf->SetFont($cell_Usia26['font_type'], $cell_Usia26['font_style'], $cell_Usia26['font_size']);
            $this->pdf_text_color($cell_Usia26['data'], $cell_Usia26['color_r'], $cell_Usia26['color_g'], $cell_Usia26['color_b']);
            if (!empty($cell_Usia26['posx']) && !empty($cell_Usia26['posy']))
            {
                $this->Pdf->SetXY($cell_Usia26['posx'] + $this->SC_incr_col,  $cell_Usia26['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_Usia26['posx']))
            {
                $this->Pdf->SetX($cell_Usia26['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_Usia26['posy']))
            {
                $this->Pdf->SetY($cell_Usia26['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_Usia26['width'], 0, $cell_Usia26['data'], 0, 0, $cell_Usia26['align']);

            $this->Pdf->SetFont($cell_sc_field_027['font_type'], $cell_sc_field_027['font_style'], $cell_sc_field_027['font_size']);
            $this->pdf_text_color($cell_sc_field_027['data'], $cell_sc_field_027['color_r'], $cell_sc_field_027['color_g'], $cell_sc_field_027['color_b']);
            if (!empty($cell_sc_field_027['posx']) && !empty($cell_sc_field_027['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_027['posx'] + $this->SC_incr_col,  $cell_sc_field_027['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_027['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_027['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_027['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_027['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_027['width'], 0, $cell_sc_field_027['data'], 0, 0, $cell_sc_field_027['align']);

            $this->Pdf->SetFont($cell_sc_field_227['font_type'], $cell_sc_field_227['font_style'], $cell_sc_field_227['font_size']);
            $this->pdf_text_color($cell_sc_field_227['data'], $cell_sc_field_227['color_r'], $cell_sc_field_227['color_g'], $cell_sc_field_227['color_b']);
            if (!empty($cell_sc_field_227['posx']) && !empty($cell_sc_field_227['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_227['posx'] + $this->SC_incr_col,  $cell_sc_field_227['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_227['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_227['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_227['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_227['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_227['width'], 0, $cell_sc_field_227['data'], 0, 0, $cell_sc_field_227['align']);

            $this->Pdf->SetFont($cell_sc_field_327['font_type'], $cell_sc_field_327['font_style'], $cell_sc_field_327['font_size']);
            $this->pdf_text_color($cell_sc_field_327['data'], $cell_sc_field_327['color_r'], $cell_sc_field_327['color_g'], $cell_sc_field_327['color_b']);
            if (!empty($cell_sc_field_327['posx']) && !empty($cell_sc_field_327['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_327['posx'] + $this->SC_incr_col,  $cell_sc_field_327['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_327['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_327['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_327['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_327['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_327['width'], 0, $cell_sc_field_327['data'], 0, 0, $cell_sc_field_327['align']);

            $this->Pdf->SetFont($cell_JK27['font_type'], $cell_JK27['font_style'], $cell_JK27['font_size']);
            $this->pdf_text_color($cell_JK27['data'], $cell_JK27['color_r'], $cell_JK27['color_g'], $cell_JK27['color_b']);
            if (!empty($cell_JK27['posx']) && !empty($cell_JK27['posy']))
            {
                $this->Pdf->SetXY($cell_JK27['posx'] + $this->SC_incr_col,  $cell_JK27['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_JK27['posx']))
            {
                $this->Pdf->SetX($cell_JK27['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_JK27['posy']))
            {
                $this->Pdf->SetY($cell_JK27['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_JK27['width'], 0, $cell_JK27['data'], 0, 0, $cell_JK27['align']);

            $this->Pdf->SetFont($cell_Usia27['font_type'], $cell_Usia27['font_style'], $cell_Usia27['font_size']);
            $this->pdf_text_color($cell_Usia27['data'], $cell_Usia27['color_r'], $cell_Usia27['color_g'], $cell_Usia27['color_b']);
            if (!empty($cell_Usia27['posx']) && !empty($cell_Usia27['posy']))
            {
                $this->Pdf->SetXY($cell_Usia27['posx'] + $this->SC_incr_col,  $cell_Usia27['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_Usia27['posx']))
            {
                $this->Pdf->SetX($cell_Usia27['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_Usia27['posy']))
            {
                $this->Pdf->SetY($cell_Usia27['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_Usia27['width'], 0, $cell_Usia27['data'], 0, 0, $cell_Usia27['align']);

            $this->Pdf->SetFont($cell_sc_field_028['font_type'], $cell_sc_field_028['font_style'], $cell_sc_field_028['font_size']);
            $this->pdf_text_color($cell_sc_field_028['data'], $cell_sc_field_028['color_r'], $cell_sc_field_028['color_g'], $cell_sc_field_028['color_b']);
            if (!empty($cell_sc_field_028['posx']) && !empty($cell_sc_field_028['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_028['posx'] + $this->SC_incr_col,  $cell_sc_field_028['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_028['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_028['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_028['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_028['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_028['width'], 0, $cell_sc_field_028['data'], 0, 0, $cell_sc_field_028['align']);

            $this->Pdf->SetFont($cell_sc_field_228['font_type'], $cell_sc_field_228['font_style'], $cell_sc_field_228['font_size']);
            $this->pdf_text_color($cell_sc_field_228['data'], $cell_sc_field_228['color_r'], $cell_sc_field_228['color_g'], $cell_sc_field_228['color_b']);
            if (!empty($cell_sc_field_228['posx']) && !empty($cell_sc_field_228['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_228['posx'] + $this->SC_incr_col,  $cell_sc_field_228['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_228['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_228['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_228['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_228['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_228['width'], 0, $cell_sc_field_228['data'], 0, 0, $cell_sc_field_228['align']);

            $this->Pdf->SetFont($cell_sc_field_328['font_type'], $cell_sc_field_328['font_style'], $cell_sc_field_328['font_size']);
            $this->pdf_text_color($cell_sc_field_328['data'], $cell_sc_field_328['color_r'], $cell_sc_field_328['color_g'], $cell_sc_field_328['color_b']);
            if (!empty($cell_sc_field_328['posx']) && !empty($cell_sc_field_328['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_328['posx'] + $this->SC_incr_col,  $cell_sc_field_328['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_328['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_328['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_328['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_328['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_328['width'], 0, $cell_sc_field_328['data'], 0, 0, $cell_sc_field_328['align']);

            $this->Pdf->SetFont($cell_JK28['font_type'], $cell_JK28['font_style'], $cell_JK28['font_size']);
            $this->pdf_text_color($cell_JK28['data'], $cell_JK28['color_r'], $cell_JK28['color_g'], $cell_JK28['color_b']);
            if (!empty($cell_JK28['posx']) && !empty($cell_JK28['posy']))
            {
                $this->Pdf->SetXY($cell_JK28['posx'] + $this->SC_incr_col,  $cell_JK28['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_JK28['posx']))
            {
                $this->Pdf->SetX($cell_JK28['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_JK28['posy']))
            {
                $this->Pdf->SetY($cell_JK28['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_JK28['width'], 0, $cell_JK28['data'], 0, 0, $cell_JK28['align']);

            $this->Pdf->SetFont($cell_Usia28['font_type'], $cell_Usia28['font_style'], $cell_Usia28['font_size']);
            $this->pdf_text_color($cell_Usia28['data'], $cell_Usia28['color_r'], $cell_Usia28['color_g'], $cell_Usia28['color_b']);
            if (!empty($cell_Usia28['posx']) && !empty($cell_Usia28['posy']))
            {
                $this->Pdf->SetXY($cell_Usia28['posx'] + $this->SC_incr_col,  $cell_Usia28['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_Usia28['posx']))
            {
                $this->Pdf->SetX($cell_Usia28['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_Usia28['posy']))
            {
                $this->Pdf->SetY($cell_Usia28['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_Usia28['width'], 0, $cell_Usia28['data'], 0, 0, $cell_Usia28['align']);

            $this->Pdf->SetFont($cell_sc_field_029['font_type'], $cell_sc_field_029['font_style'], $cell_sc_field_029['font_size']);
            $this->pdf_text_color($cell_sc_field_029['data'], $cell_sc_field_029['color_r'], $cell_sc_field_029['color_g'], $cell_sc_field_029['color_b']);
            if (!empty($cell_sc_field_029['posx']) && !empty($cell_sc_field_029['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_029['posx'] + $this->SC_incr_col,  $cell_sc_field_029['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_029['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_029['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_029['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_029['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_029['width'], 0, $cell_sc_field_029['data'], 0, 0, $cell_sc_field_029['align']);

            $this->Pdf->SetFont($cell_sc_field_229['font_type'], $cell_sc_field_229['font_style'], $cell_sc_field_229['font_size']);
            $this->pdf_text_color($cell_sc_field_229['data'], $cell_sc_field_229['color_r'], $cell_sc_field_229['color_g'], $cell_sc_field_229['color_b']);
            if (!empty($cell_sc_field_229['posx']) && !empty($cell_sc_field_229['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_229['posx'] + $this->SC_incr_col,  $cell_sc_field_229['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_229['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_229['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_229['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_229['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_229['width'], 0, $cell_sc_field_229['data'], 0, 0, $cell_sc_field_229['align']);

            $this->Pdf->SetFont($cell_sc_field_329['font_type'], $cell_sc_field_329['font_style'], $cell_sc_field_329['font_size']);
            $this->pdf_text_color($cell_sc_field_329['data'], $cell_sc_field_329['color_r'], $cell_sc_field_329['color_g'], $cell_sc_field_329['color_b']);
            if (!empty($cell_sc_field_329['posx']) && !empty($cell_sc_field_329['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_329['posx'] + $this->SC_incr_col,  $cell_sc_field_329['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_329['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_329['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_329['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_329['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_329['width'], 0, $cell_sc_field_329['data'], 0, 0, $cell_sc_field_329['align']);

            $this->Pdf->SetFont($cell_JK29['font_type'], $cell_JK29['font_style'], $cell_JK29['font_size']);
            $this->pdf_text_color($cell_JK29['data'], $cell_JK29['color_r'], $cell_JK29['color_g'], $cell_JK29['color_b']);
            if (!empty($cell_JK29['posx']) && !empty($cell_JK29['posy']))
            {
                $this->Pdf->SetXY($cell_JK29['posx'] + $this->SC_incr_col,  $cell_JK29['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_JK29['posx']))
            {
                $this->Pdf->SetX($cell_JK29['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_JK29['posy']))
            {
                $this->Pdf->SetY($cell_JK29['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_JK29['width'], 0, $cell_JK29['data'], 0, 0, $cell_JK29['align']);

            $this->Pdf->SetFont($cell_Usia29['font_type'], $cell_Usia29['font_style'], $cell_Usia29['font_size']);
            $this->pdf_text_color($cell_Usia29['data'], $cell_Usia29['color_r'], $cell_Usia29['color_g'], $cell_Usia29['color_b']);
            if (!empty($cell_Usia29['posx']) && !empty($cell_Usia29['posy']))
            {
                $this->Pdf->SetXY($cell_Usia29['posx'] + $this->SC_incr_col,  $cell_Usia29['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_Usia29['posx']))
            {
                $this->Pdf->SetX($cell_Usia29['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_Usia29['posy']))
            {
                $this->Pdf->SetY($cell_Usia29['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_Usia29['width'], 0, $cell_Usia29['data'], 0, 0, $cell_Usia29['align']);

            $this->Pdf->SetFont($cell_sc_field_030['font_type'], $cell_sc_field_030['font_style'], $cell_sc_field_030['font_size']);
            $this->pdf_text_color($cell_sc_field_030['data'], $cell_sc_field_030['color_r'], $cell_sc_field_030['color_g'], $cell_sc_field_030['color_b']);
            if (!empty($cell_sc_field_030['posx']) && !empty($cell_sc_field_030['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_030['posx'] + $this->SC_incr_col,  $cell_sc_field_030['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_030['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_030['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_030['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_030['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_030['width'], 0, $cell_sc_field_030['data'], 0, 0, $cell_sc_field_030['align']);

            $this->Pdf->SetFont($cell_sc_field_230['font_type'], $cell_sc_field_230['font_style'], $cell_sc_field_230['font_size']);
            $this->pdf_text_color($cell_sc_field_230['data'], $cell_sc_field_230['color_r'], $cell_sc_field_230['color_g'], $cell_sc_field_230['color_b']);
            if (!empty($cell_sc_field_230['posx']) && !empty($cell_sc_field_230['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_230['posx'] + $this->SC_incr_col,  $cell_sc_field_230['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_230['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_230['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_230['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_230['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_230['width'], 0, $cell_sc_field_230['data'], 0, 0, $cell_sc_field_230['align']);

            $this->Pdf->SetFont($cell_sc_field_330['font_type'], $cell_sc_field_330['font_style'], $cell_sc_field_330['font_size']);
            $this->pdf_text_color($cell_sc_field_330['data'], $cell_sc_field_330['color_r'], $cell_sc_field_330['color_g'], $cell_sc_field_330['color_b']);
            if (!empty($cell_sc_field_330['posx']) && !empty($cell_sc_field_330['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_330['posx'] + $this->SC_incr_col,  $cell_sc_field_330['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_sc_field_330['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_330['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_sc_field_330['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_330['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_sc_field_330['width'], 0, $cell_sc_field_330['data'], 0, 0, $cell_sc_field_330['align']);

            $this->Pdf->SetFont($cell_JK30['font_type'], $cell_JK30['font_style'], $cell_JK30['font_size']);
            $this->pdf_text_color($cell_JK30['data'], $cell_JK30['color_r'], $cell_JK30['color_g'], $cell_JK30['color_b']);
            if (!empty($cell_JK30['posx']) && !empty($cell_JK30['posy']))
            {
                $this->Pdf->SetXY($cell_JK30['posx'] + $this->SC_incr_col,  $cell_JK30['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_JK30['posx']))
            {
                $this->Pdf->SetX($cell_JK30['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_JK30['posy']))
            {
                $this->Pdf->SetY($cell_JK30['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_JK30['width'], 0, $cell_JK30['data'], 0, 0, $cell_JK30['align']);

            $this->Pdf->SetFont($cell_Usia30['font_type'], $cell_Usia30['font_style'], $cell_Usia30['font_size']);
            $this->pdf_text_color($cell_Usia30['data'], $cell_Usia30['color_r'], $cell_Usia30['color_g'], $cell_Usia30['color_b']);
            if (!empty($cell_Usia30['posx']) && !empty($cell_Usia30['posy']))
            {
                $this->Pdf->SetXY($cell_Usia30['posx'] + $this->SC_incr_col,  $cell_Usia30['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_Usia30['posx']))
            {
                $this->Pdf->SetX($cell_Usia30['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_Usia30['posy']))
            {
                $this->Pdf->SetY($cell_Usia30['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_Usia30['width'], 0, $cell_Usia30['data'], 0, 0, $cell_Usia30['align']);
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
