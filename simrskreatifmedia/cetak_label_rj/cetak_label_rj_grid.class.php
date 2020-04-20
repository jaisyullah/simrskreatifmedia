<?php
class cetak_label_rj_grid
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
   var $usia = array();
   var $tl1 = array();
   var $tl2 = array();
   var $tl3 = array();
   var $tl4 = array();
   var $sc_field_0 = array();
   var $sc_field_1 = array();
   var $sc_field_2 = array();
   var $sc_field_3 = array();
   var $jk = array();
   var $sc_field_4 = array();
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
   $this->default_font = '';
   $this->default_font_sr  = '';
   $this->default_style    = '';
   $this->default_style_sr = 'B';
   $Tp_papel = array(5.08, 7.62);
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
   $_SESSION['scriptcase']['cetak_label_rj']['default_font'] = $this->default_font;
   chdir($this->Ini->path_third . "/tcpdf/");
   include_once("tcpdf.php");
   chdir($old_dir);
   $this->Pdf = new TCPDF('P', 'cm', $Tp_papel, true, 'UTF-8', false);
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
           if (in_array("cetak_label_rj", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['campos_busca'];
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
       $this->alergi[0] = $Busca_temp['alergi']; 
       $tmp_pos = strpos($this->alergi[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->alergi[0]))
       {
           $this->alergi[0] = substr($this->alergi[0], 0, $tmp_pos);
       }
   } 
   else 
   { 
       $this->sc_field_3_2 = ""; 
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['cetak_label_rj']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['cetak_label_rj']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['cetak_label_rj']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['cetak_label_rj']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['ordem_select'] = array(); 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['ordem_select']['a.struckNo'] = 'DESC'; 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['ordem_ant']  = "a.struckNo DESC"; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['where_orig'] = " where a.struckNo = " . $_SESSION['var_No_Struk'] . "";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT b.NAME as sc_field_0, a.bayar as sc_field_1, a.custCode as sc_field_2, str_replace (convert(char(10),date(b.birthDate),102), '.', '-') + ' ' + convert(char(8),date(b.birthDate),20) as sc_field_3, b.sex as jk, a.inst as sc_field_4, d.description as alergi from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT b.NAME as sc_field_0, a.bayar as sc_field_1, a.custCode as sc_field_2, date(b.birthDate) as sc_field_3, b.sex as jk, a.inst as sc_field_4, d.description as alergi from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT b.NAME as sc_field_0, a.bayar as sc_field_1, a.custCode as sc_field_2, convert(char(23),date(b.birthDate),121) as sc_field_3, b.sex as jk, a.inst as sc_field_4, d.description as alergi from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT b.NAME as sc_field_0, a.bayar as sc_field_1, a.custCode as sc_field_2, date(b.birthDate) as sc_field_3, b.sex as jk, a.inst as sc_field_4, d.description as alergi from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT b.NAME as sc_field_0, a.bayar as sc_field_1, a.custCode as sc_field_2, EXTEND(date(b.birthDate), YEAR TO DAY) as sc_field_3, b.sex as jk, a.inst as sc_field_4, d.description as alergi from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT b.NAME as sc_field_0, a.bayar as sc_field_1, a.custCode as sc_field_2, date(b.birthDate) as sc_field_3, b.sex as jk, a.inst as sc_field_4, d.description as alergi from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['order_grid'] = $nmgp_order_by;
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
//----- 
 function grid($linhas = 0)
 {
    global 
           $nm_saida, $nm_url_saida;
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['labels']['sc_field_0'] = "Nama Pasien";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['labels']['sc_field_1'] = "Kategori Pasien";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['labels']['sc_field_2'] = "No RM";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['labels']['sc_field_3'] = "Tanggal Lahir";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['labels']['jk'] = "JK";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['labels']['sc_field_4'] = "Kategori Pasien";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['labels']['alergi'] = "Alergi";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['labels']['usia'] = "Usia";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['labels']['tl1'] = "tl1";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['labels']['tl2'] = "tl2";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['labels']['tl3'] = "tl3";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['labels']['tl4'] = "tl4";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['cetak_label_rj']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['cetak_label_rj']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['cetak_label_rj']['lig_edit'];
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
       $this->Pdf->Text(1, 1, html_entity_decode($this->nm_grid_sem_reg, ENT_COMPAT, $_SESSION['scriptcase']['charset']));
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
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_label_rj']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->sc_field_0[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->sc_field_1[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->sc_field_2[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->sc_field_3[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->jk[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->sc_field_4[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->alergi[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->usia[$this->nm_grid_colunas] = "";
          $this->tl1[$this->nm_grid_colunas] = "";
          $this->tl2[$this->nm_grid_colunas] = "";
          $this->tl3[$this->nm_grid_colunas] = "";
          $this->tl4[$this->nm_grid_colunas] = "";
          $_SESSION['scriptcase']['cetak_label_rj']['contr_erro'] = 'on';
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

$this->tl1[$this->nm_grid_colunas]  = 'RM			:';
$this->tl2[$this->nm_grid_colunas]  = 'Nama		:';
$this->tl3[$this->nm_grid_colunas]  = 'JK/Usia	:';
$this->tl4[$this->nm_grid_colunas]  = 'Tgl. Lahir	:';
$_SESSION['scriptcase']['cetak_label_rj']['contr_erro'] = 'off';
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
          $this->sc_field_4[$this->nm_grid_colunas] = sc_strip_script($this->sc_field_4[$this->nm_grid_colunas]);
          if ($this->sc_field_4[$this->nm_grid_colunas] === "") 
          { 
              $this->sc_field_4[$this->nm_grid_colunas] = "" ;  
          } 
          $this->sc_field_4[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->sc_field_4[$this->nm_grid_colunas]);
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
          if ($this->tl1[$this->nm_grid_colunas] === "") 
          { 
              $this->tl1[$this->nm_grid_colunas] = "" ;  
          } 
          $this->tl1[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tl1[$this->nm_grid_colunas]);
          if ($this->tl2[$this->nm_grid_colunas] === "") 
          { 
              $this->tl2[$this->nm_grid_colunas] = "" ;  
          } 
          $this->tl2[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tl2[$this->nm_grid_colunas]);
          if ($this->tl3[$this->nm_grid_colunas] === "") 
          { 
              $this->tl3[$this->nm_grid_colunas] = "" ;  
          } 
          $this->tl3[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tl3[$this->nm_grid_colunas]);
          if ($this->tl4[$this->nm_grid_colunas] === "") 
          { 
              $this->tl4[$this->nm_grid_colunas] = "" ;  
          } 
          $this->tl4[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tl4[$this->nm_grid_colunas]);
            $cell_sc_field_0 = array('posx' => '14', 'posy' => '18', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_2 = array('posx' => '14', 'posy' => '11', 'data' => $this->sc_field_2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_3 = array('posx' => '14', 'posy' => '32', 'data' => $this->sc_field_3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_JK = array('posx' => '14', 'posy' => '25', 'data' => $this->jk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Usia = array('posx' => '21', 'posy' => '25', 'data' => $this->usia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tl1 = array('posx' => '5', 'posy' => '11', 'data' => $this->tl1[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tl2 = array('posx' => '5', 'posy' => '18', 'data' => $this->tl2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tl3 = array('posx' => '5', 'posy' => '25', 'data' => $this->tl3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tl4 = array('posx' => '5', 'posy' => '32', 'data' => $this->tl4[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);


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

            $this->Pdf->SetFont($cell_sc_field_2['font_type'], $cell_sc_field_2['font_style'], $cell_sc_field_2['font_size']);
            $this->pdf_text_color($cell_sc_field_2['data'], $cell_sc_field_2['color_r'], $cell_sc_field_2['color_g'], $cell_sc_field_2['color_b']);
            if (!empty($cell_sc_field_2['posx']) && !empty($cell_sc_field_2['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_2['posx'], $cell_sc_field_2['posy']);
            }
            elseif (!empty($cell_sc_field_2['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_2['posx']);
            }
            elseif (!empty($cell_sc_field_2['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_2['posy']);
            }
            $this->Pdf->Cell($cell_sc_field_2['width'], 0, $cell_sc_field_2['data'], 0, 0, $cell_sc_field_2['align']);

            $this->Pdf->SetFont($cell_sc_field_3['font_type'], $cell_sc_field_3['font_style'], $cell_sc_field_3['font_size']);
            $this->pdf_text_color($cell_sc_field_3['data'], $cell_sc_field_3['color_r'], $cell_sc_field_3['color_g'], $cell_sc_field_3['color_b']);
            if (!empty($cell_sc_field_3['posx']) && !empty($cell_sc_field_3['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_3['posx'], $cell_sc_field_3['posy']);
            }
            elseif (!empty($cell_sc_field_3['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_3['posx']);
            }
            elseif (!empty($cell_sc_field_3['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_3['posy']);
            }
            $this->Pdf->Cell($cell_sc_field_3['width'], 0, $cell_sc_field_3['data'], 0, 0, $cell_sc_field_3['align']);

            $this->Pdf->SetFont($cell_JK['font_type'], $cell_JK['font_style'], $cell_JK['font_size']);
            $this->pdf_text_color($cell_JK['data'], $cell_JK['color_r'], $cell_JK['color_g'], $cell_JK['color_b']);
            if (!empty($cell_JK['posx']) && !empty($cell_JK['posy']))
            {
                $this->Pdf->SetXY($cell_JK['posx'], $cell_JK['posy']);
            }
            elseif (!empty($cell_JK['posx']))
            {
                $this->Pdf->SetX($cell_JK['posx']);
            }
            elseif (!empty($cell_JK['posy']))
            {
                $this->Pdf->SetY($cell_JK['posy']);
            }
            $this->Pdf->Cell($cell_JK['width'], 0, $cell_JK['data'], 0, 0, $cell_JK['align']);

            $this->Pdf->SetFont($cell_Usia['font_type'], $cell_Usia['font_style'], $cell_Usia['font_size']);
            $this->pdf_text_color($cell_Usia['data'], $cell_Usia['color_r'], $cell_Usia['color_g'], $cell_Usia['color_b']);
            if (!empty($cell_Usia['posx']) && !empty($cell_Usia['posy']))
            {
                $this->Pdf->SetXY($cell_Usia['posx'], $cell_Usia['posy']);
            }
            elseif (!empty($cell_Usia['posx']))
            {
                $this->Pdf->SetX($cell_Usia['posx']);
            }
            elseif (!empty($cell_Usia['posy']))
            {
                $this->Pdf->SetY($cell_Usia['posy']);
            }
            $this->Pdf->Cell($cell_Usia['width'], 0, $cell_Usia['data'], 0, 0, $cell_Usia['align']);

            $this->Pdf->SetFont($cell_tl1['font_type'], $cell_tl1['font_style'], $cell_tl1['font_size']);
            $this->pdf_text_color($cell_tl1['data'], $cell_tl1['color_r'], $cell_tl1['color_g'], $cell_tl1['color_b']);
            if (!empty($cell_tl1['posx']) && !empty($cell_tl1['posy']))
            {
                $this->Pdf->SetXY($cell_tl1['posx'], $cell_tl1['posy']);
            }
            elseif (!empty($cell_tl1['posx']))
            {
                $this->Pdf->SetX($cell_tl1['posx']);
            }
            elseif (!empty($cell_tl1['posy']))
            {
                $this->Pdf->SetY($cell_tl1['posy']);
            }
            $this->Pdf->Cell($cell_tl1['width'], 0, $cell_tl1['data'], 0, 0, $cell_tl1['align']);

            $this->Pdf->SetFont($cell_tl2['font_type'], $cell_tl2['font_style'], $cell_tl2['font_size']);
            $this->pdf_text_color($cell_tl2['data'], $cell_tl2['color_r'], $cell_tl2['color_g'], $cell_tl2['color_b']);
            if (!empty($cell_tl2['posx']) && !empty($cell_tl2['posy']))
            {
                $this->Pdf->SetXY($cell_tl2['posx'], $cell_tl2['posy']);
            }
            elseif (!empty($cell_tl2['posx']))
            {
                $this->Pdf->SetX($cell_tl2['posx']);
            }
            elseif (!empty($cell_tl2['posy']))
            {
                $this->Pdf->SetY($cell_tl2['posy']);
            }
            $this->Pdf->Cell($cell_tl2['width'], 0, $cell_tl2['data'], 0, 0, $cell_tl2['align']);

            $this->Pdf->SetFont($cell_tl3['font_type'], $cell_tl3['font_style'], $cell_tl3['font_size']);
            $this->pdf_text_color($cell_tl3['data'], $cell_tl3['color_r'], $cell_tl3['color_g'], $cell_tl3['color_b']);
            if (!empty($cell_tl3['posx']) && !empty($cell_tl3['posy']))
            {
                $this->Pdf->SetXY($cell_tl3['posx'], $cell_tl3['posy']);
            }
            elseif (!empty($cell_tl3['posx']))
            {
                $this->Pdf->SetX($cell_tl3['posx']);
            }
            elseif (!empty($cell_tl3['posy']))
            {
                $this->Pdf->SetY($cell_tl3['posy']);
            }
            $this->Pdf->Cell($cell_tl3['width'], 0, $cell_tl3['data'], 0, 0, $cell_tl3['align']);

            $this->Pdf->SetFont($cell_tl4['font_type'], $cell_tl4['font_style'], $cell_tl4['font_size']);
            $this->pdf_text_color($cell_tl4['data'], $cell_tl4['color_r'], $cell_tl4['color_g'], $cell_tl4['color_b']);
            if (!empty($cell_tl4['posx']) && !empty($cell_tl4['posy']))
            {
                $this->Pdf->SetXY($cell_tl4['posx'], $cell_tl4['posy']);
            }
            elseif (!empty($cell_tl4['posx']))
            {
                $this->Pdf->SetX($cell_tl4['posx']);
            }
            elseif (!empty($cell_tl4['posy']))
            {
                $this->Pdf->SetY($cell_tl4['posy']);
            }
            $this->Pdf->Cell($cell_tl4['width'], 0, $cell_tl4['data'], 0, 0, $cell_tl4['align']);

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
