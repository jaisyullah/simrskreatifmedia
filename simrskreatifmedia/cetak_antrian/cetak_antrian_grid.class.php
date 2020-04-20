<?php
class cetak_antrian_grid
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
   var $array_sc_field_9 = array();
   var $sc_field_9 = array();
   var $usia = array();
   var $sc_field_0 = array();
   var $sc_field_1 = array();
   var $sc_field_2 = array();
   var $sc_field_3 = array();
   var $sc_field_4 = array();
   var $sc_field_5 = array();
   var $sc_field_6 = array();
   var $sc_field_7 = array();
   var $sc_field_8 = array();
   var $a_doctor = array();
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
   $Tp_papel = array(210, 99);
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
   $_SESSION['scriptcase']['cetak_antrian']['default_font'] = $this->default_font;
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
           if (in_array("cetak_antrian", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['campos_busca'];
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
       $this->sc_field_7[0] = $Busca_temp['sc_field_7']; 
       $tmp_pos = strpos($this->sc_field_7[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->sc_field_7[0]))
       {
           $this->sc_field_7[0] = substr($this->sc_field_7[0], 0, $tmp_pos);
       }
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['cetak_antrian']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['cetak_antrian']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['cetak_antrian']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['cetak_antrian']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['ordem_select'] = array(); 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['ordem_select']['a.struckNo'] = 'DESC'; 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['ordem_ant']  = "a.struckNo DESC"; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['where_orig'] = " where a.struckNo = '" . $_SESSION['var_No_Struk'] . "'";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT concat(b. NAME,', ',b.salut) as sc_field_0, a.queue as sc_field_1, str_replace (convert(char(10),date(a.regDate),102), '.', '-') + ' ' + convert(char(8),date(a.regDate),20) as sc_field_2, a.regTime as sc_field_3, c. NAME as sc_field_4, a.bayar as sc_field_5, a.custCode as sc_field_6, str_replace (convert(char(10),date(b.birthDate),102), '.', '-') + ' ' + convert(char(8),date(b.birthDate),20) as sc_field_7, a.struckNo as sc_field_8, a.doctor as a_doctor from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT concat(b. NAME,', ',b.salut) as sc_field_0, a.queue as sc_field_1, date(a.regDate) as sc_field_2, a.regTime as sc_field_3, c. NAME as sc_field_4, a.bayar as sc_field_5, a.custCode as sc_field_6, date(b.birthDate) as sc_field_7, a.struckNo as sc_field_8, a.doctor as a_doctor from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT concat(b. NAME,', ',b.salut) as sc_field_0, a.queue as sc_field_1, convert(char(23),date(a.regDate),121) as sc_field_2, a.regTime as sc_field_3, c. NAME as sc_field_4, a.bayar as sc_field_5, a.custCode as sc_field_6, convert(char(23),date(b.birthDate),121) as sc_field_7, a.struckNo as sc_field_8, a.doctor as a_doctor from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT concat(b. NAME,', ',b.salut) as sc_field_0, a.queue as sc_field_1, date(a.regDate) as sc_field_2, a.regTime as sc_field_3, c. NAME as sc_field_4, a.bayar as sc_field_5, a.custCode as sc_field_6, date(b.birthDate) as sc_field_7, a.struckNo as sc_field_8, a.doctor as a_doctor from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT concat(b. NAME,', ',b.salut) as sc_field_0, a.queue as sc_field_1, EXTEND(date(a.regDate), YEAR TO DAY) as sc_field_2, a.regTime as sc_field_3, c. NAME as sc_field_4, a.bayar as sc_field_5, a.custCode as sc_field_6, EXTEND(date(b.birthDate), YEAR TO DAY) as sc_field_7, a.struckNo as sc_field_8, a.doctor as a_doctor from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT concat(b. NAME,', ',b.salut) as sc_field_0, a.queue as sc_field_1, date(a.regDate) as sc_field_2, a.regTime as sc_field_3, c. NAME as sc_field_4, a.bayar as sc_field_5, a.custCode as sc_field_6, date(b.birthDate) as sc_field_7, a.struckNo as sc_field_8, a.doctor as a_doctor from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['order_grid'] = $nmgp_order_by;
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
         $this->Pdf->SetFont($this->default_font, $this->default_style, 9, $this->def_TTF);
     }
     else
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 9);
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
   $this->Pdf->Image($this->NM_raiz_img . $this->Ini->path_img_global . "/grp__NM__bg__NM__Bukti Tindakan.jpg", "0.000000", "0.000000", "99", "210", '', '', '', false, 300, '', false, false, 0);
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['labels']['sc_field_0'] = "Nama Pasien";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['labels']['sc_field_1'] = "sc_field_1";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['labels']['sc_field_2'] = "sc_field_2";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['labels']['sc_field_3'] = "sc_field_3";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['labels']['sc_field_4'] = "sc_field_4";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['labels']['sc_field_5'] = "sc_field_5";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['labels']['sc_field_6'] = "sc_field_6";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['labels']['sc_field_7'] = "sc_field_7";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['labels']['sc_field_8'] = "sc_field_8";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['labels']['a_doctor'] = "Doctor";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['labels']['sc_field_9'] = "Tanggal Cetak";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['labels']['usia'] = "Usia";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['cetak_antrian']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['cetak_antrian']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['cetak_antrian']['lig_edit'];
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
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_antrian']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->sc_field_0[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->sc_field_1[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->sc_field_1[$this->nm_grid_colunas] = (string)$this->sc_field_1[$this->nm_grid_colunas];
          $this->sc_field_2[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->sc_field_3[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->sc_field_4[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->sc_field_5[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->sc_field_6[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->sc_field_7[$this->nm_grid_colunas] = $this->rs_grid->fields[7] ;  
          $this->sc_field_8[$this->nm_grid_colunas] = $this->rs_grid->fields[8] ;  
          $this->a_doctor[$this->nm_grid_colunas] = $this->rs_grid->fields[9] ;  
          $this->sc_field_9[$this->nm_grid_colunas] = "";
          $this->usia[$this->nm_grid_colunas] = "";
          $this->Lookup->lookup_sc_field_9($this->sc_field_9[$this->nm_grid_colunas], $this->array_sc_field_9); 
          $_SESSION['scriptcase']['cetak_antrian']['contr_erro'] = 'on';
 $check_sql = "SELECT date(birthDate), date(registerDate)"
   . " FROM tbcustomer"
   . " WHERE custCode = '" . $this->sc_field_6[$this->nm_grid_colunas]  . "'";
 
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
    $tgl_lahir = $this->rs[$this->nm_grid_colunas][0][0];
}

$lahir = new DateTime($tgl_lahir);
$today = new DateTime();
$umur = $today->diff($lahir);
$this->usia[$this->nm_grid_colunas]  = $umur->y . " TH " . $umur->m . " BLN " . $umur->d . " HR";




$check_sql = "SELECT concat(gelar,' ', name,', ', spec)"
   . " FROM tbdoctor"
   . " WHERE docCode = '" . $this->a_doctor[$this->nm_grid_colunas]  . "'";
 
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
    $this->a_doctor[$this->nm_grid_colunas]  = $this->rs[$this->nm_grid_colunas][0][0];
}

$this->sc_field_3[$this->nm_grid_colunas]  = date('H:i');

$this->sc_field_1[$this->nm_grid_colunas]  = 'No. Antrian : '.$this->sc_field_1[$this->nm_grid_colunas] ;
$_SESSION['scriptcase']['cetak_antrian']['contr_erro'] = 'off';
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
          else    
          { 
               $sc_field_2_x =  $this->sc_field_2[$this->nm_grid_colunas];
               nm_conv_limpa_dado($sc_field_2_x, "YYYY-MM-DD");
               if (is_numeric($sc_field_2_x) && strlen($sc_field_2_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->sc_field_2[$this->nm_grid_colunas], "YYYY-MM-DD");
                   $this->sc_field_2[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida("d-m-Y"), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->sc_field_2[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->sc_field_2[$this->nm_grid_colunas]);
          $this->sc_field_3[$this->nm_grid_colunas] = sc_strip_script($this->sc_field_3[$this->nm_grid_colunas]);
          if ($this->sc_field_3[$this->nm_grid_colunas] === "") 
          { 
              $this->sc_field_3[$this->nm_grid_colunas] = "" ;  
          } 
          $this->sc_field_3[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->sc_field_3[$this->nm_grid_colunas]);
          $this->sc_field_4[$this->nm_grid_colunas] = sc_strip_script($this->sc_field_4[$this->nm_grid_colunas]);
          if ($this->sc_field_4[$this->nm_grid_colunas] === "") 
          { 
              $this->sc_field_4[$this->nm_grid_colunas] = "" ;  
          } 
          $this->sc_field_4[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->sc_field_4[$this->nm_grid_colunas]);
          $this->sc_field_5[$this->nm_grid_colunas] = sc_strip_script($this->sc_field_5[$this->nm_grid_colunas]);
          if ($this->sc_field_5[$this->nm_grid_colunas] === "") 
          { 
              $this->sc_field_5[$this->nm_grid_colunas] = "" ;  
          } 
          $this->sc_field_5[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->sc_field_5[$this->nm_grid_colunas]);
          $this->sc_field_6[$this->nm_grid_colunas] = sc_strip_script($this->sc_field_6[$this->nm_grid_colunas]);
          if ($this->sc_field_6[$this->nm_grid_colunas] === "") 
          { 
              $this->sc_field_6[$this->nm_grid_colunas] = "" ;  
          } 
          $this->sc_field_6[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->sc_field_6[$this->nm_grid_colunas]);
          $this->sc_field_7[$this->nm_grid_colunas] = sc_strip_script($this->sc_field_7[$this->nm_grid_colunas]);
          if ($this->sc_field_7[$this->nm_grid_colunas] === "") 
          { 
              $this->sc_field_7[$this->nm_grid_colunas] = "" ;  
          } 
          $this->sc_field_7[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->sc_field_7[$this->nm_grid_colunas]);
          $this->sc_field_8[$this->nm_grid_colunas] = sc_strip_script($this->sc_field_8[$this->nm_grid_colunas]);
          if ($this->sc_field_8[$this->nm_grid_colunas] === "") 
          { 
              $this->sc_field_8[$this->nm_grid_colunas] = "" ;  
          } 
          $this->sc_field_8[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->sc_field_8[$this->nm_grid_colunas]);
          $this->a_doctor[$this->nm_grid_colunas] = sc_strip_script($this->a_doctor[$this->nm_grid_colunas]);
          if ($this->a_doctor[$this->nm_grid_colunas] === "") 
          { 
              $this->a_doctor[$this->nm_grid_colunas] = "" ;  
          } 
          $this->a_doctor[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->a_doctor[$this->nm_grid_colunas]);
          $this->Lookup->lookup_sc_field_9($this->sc_field_9[$this->nm_grid_colunas], $this->array_sc_field_9); 
          $this->sc_field_9[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->sc_field_9[$this->nm_grid_colunas]);
          if ($this->usia[$this->nm_grid_colunas] === "") 
          { 
              $this->usia[$this->nm_grid_colunas] = "" ;  
          } 
          $this->usia[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->usia[$this->nm_grid_colunas]);
            $cell_sc_field_0 = array('posx' => '42', 'posy' => '20.5', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '9', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_2 = array('posx' => '71', 'posy' => '188', 'data' => $this->sc_field_2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_3 = array('posx' => '87', 'posy' => '188', 'data' => $this->sc_field_3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_4 = array('posx' => '42', 'posy' => '50', 'data' => $this->sc_field_4[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '9', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_5 = array('posx' => '41.7343166666614', 'posy' => '45.99807708332754', 'data' => $this->sc_field_5[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '9', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_6 = array('posx' => '42', 'posy' => '24.5', 'data' => $this->sc_field_6[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '9', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Usia = array('posx' => '42', 'posy' => '28.5', 'data' => $this->usia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '9', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_dokter = array('posx' => '42', 'posy' => '33', 'data' => $this->a_doctor[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '9', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Antrian = array('posx' => '70', 'posy' => '46.0319437499942', 'data' => $this->sc_field_1[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '9', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);


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

            $this->Pdf->SetFont($cell_sc_field_4['font_type'], $cell_sc_field_4['font_style'], $cell_sc_field_4['font_size']);
            $this->pdf_text_color($cell_sc_field_4['data'], $cell_sc_field_4['color_r'], $cell_sc_field_4['color_g'], $cell_sc_field_4['color_b']);
            if (!empty($cell_sc_field_4['posx']) && !empty($cell_sc_field_4['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_4['posx'], $cell_sc_field_4['posy']);
            }
            elseif (!empty($cell_sc_field_4['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_4['posx']);
            }
            elseif (!empty($cell_sc_field_4['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_4['posy']);
            }
            $this->Pdf->Cell($cell_sc_field_4['width'], 0, $cell_sc_field_4['data'], 0, 0, $cell_sc_field_4['align']);

            $this->Pdf->SetFont($cell_sc_field_5['font_type'], $cell_sc_field_5['font_style'], $cell_sc_field_5['font_size']);
            $this->pdf_text_color($cell_sc_field_5['data'], $cell_sc_field_5['color_r'], $cell_sc_field_5['color_g'], $cell_sc_field_5['color_b']);
            if (!empty($cell_sc_field_5['posx']) && !empty($cell_sc_field_5['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_5['posx'], $cell_sc_field_5['posy']);
            }
            elseif (!empty($cell_sc_field_5['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_5['posx']);
            }
            elseif (!empty($cell_sc_field_5['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_5['posy']);
            }
            $this->Pdf->Cell($cell_sc_field_5['width'], 0, $cell_sc_field_5['data'], 0, 0, $cell_sc_field_5['align']);

            $this->Pdf->SetFont($cell_sc_field_6['font_type'], $cell_sc_field_6['font_style'], $cell_sc_field_6['font_size']);
            $this->pdf_text_color($cell_sc_field_6['data'], $cell_sc_field_6['color_r'], $cell_sc_field_6['color_g'], $cell_sc_field_6['color_b']);
            if (!empty($cell_sc_field_6['posx']) && !empty($cell_sc_field_6['posy']))
            {
                $this->Pdf->SetXY($cell_sc_field_6['posx'], $cell_sc_field_6['posy']);
            }
            elseif (!empty($cell_sc_field_6['posx']))
            {
                $this->Pdf->SetX($cell_sc_field_6['posx']);
            }
            elseif (!empty($cell_sc_field_6['posy']))
            {
                $this->Pdf->SetY($cell_sc_field_6['posy']);
            }
            $this->Pdf->Cell($cell_sc_field_6['width'], 0, $cell_sc_field_6['data'], 0, 0, $cell_sc_field_6['align']);

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

            $this->Pdf->SetFont($cell_Antrian['font_type'], $cell_Antrian['font_style'], $cell_Antrian['font_size']);
            $this->pdf_text_color($cell_Antrian['data'], $cell_Antrian['color_r'], $cell_Antrian['color_g'], $cell_Antrian['color_b']);
            if (!empty($cell_Antrian['posx']) && !empty($cell_Antrian['posy']))
            {
                $this->Pdf->SetXY($cell_Antrian['posx'], $cell_Antrian['posy']);
            }
            elseif (!empty($cell_Antrian['posx']))
            {
                $this->Pdf->SetX($cell_Antrian['posx']);
            }
            elseif (!empty($cell_Antrian['posy']))
            {
                $this->Pdf->SetY($cell_Antrian['posy']);
            }
            $this->Pdf->Cell($cell_Antrian['width'], 0, $cell_Antrian['data'], 0, 0, $cell_Antrian['align']);

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
