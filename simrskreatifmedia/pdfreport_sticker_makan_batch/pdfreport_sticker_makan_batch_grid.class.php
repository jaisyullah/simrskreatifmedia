<?php
class pdfreport_sticker_makan_batch_grid
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
   var $array_jenis = array();
   var $array_nama_jenis = array();
   var $jenis = array();
   var $nama_jenis = array();
   var $makan = array();
   var $b_gelar = array();
   var $sc_field_0 = array();
   var $ruangan = array();
   var $sc_field_1 = array();
   var $diet = array();
   var $gizi = array();
   var $mp = array();
   var $lh = array();
   var $ln = array();
   var $syr = array();
   var $ekstra = array();
   var $buah = array();
   var $tgl = array();
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
   $_SESSION['scriptcase']['pdfreport_sticker_makan_batch']['default_font'] = $this->default_font;
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
           if (in_array("pdfreport_sticker_makan_batch", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->makan[0] = $Busca_temp['makan']; 
       $tmp_pos = strpos($this->makan[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->makan[0]))
       {
           $this->makan[0] = substr($this->makan[0], 0, $tmp_pos);
       }
       $this->b_gelar[0] = $Busca_temp['b_gelar']; 
       $tmp_pos = strpos($this->b_gelar[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->b_gelar[0]))
       {
           $this->b_gelar[0] = substr($this->b_gelar[0], 0, $tmp_pos);
       }
       $this->sc_field_0[0] = $Busca_temp['sc_field_0']; 
       $tmp_pos = strpos($this->sc_field_0[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->sc_field_0[0]))
       {
           $this->sc_field_0[0] = substr($this->sc_field_0[0], 0, $tmp_pos);
       }
       $this->ruangan[0] = $Busca_temp['ruangan']; 
       $tmp_pos = strpos($this->ruangan[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->ruangan[0]))
       {
           $this->ruangan[0] = substr($this->ruangan[0], 0, $tmp_pos);
       }
       $this->sc_field_1[0] = $Busca_temp['sc_field_1']; 
       $tmp_pos = strpos($this->sc_field_1[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->sc_field_1[0]))
       {
           $this->sc_field_1[0] = substr($this->sc_field_1[0], 0, $tmp_pos);
       }
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['qt_col_grid'] = 2 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_sticker_makan_batch']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_sticker_makan_batch']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_sticker_makan_batch']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_sticker_makan_batch']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['where_orig'] = " where b.id = '" . $_SESSION['contacts'] . "'";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT a.jadwal as makan, b.gelar as b_gelar, b.nama_pasien as sc_field_0, b.kamar_kelas as ruangan, b.bed as sc_field_1, b.diet as diet, b.gizi as gizi, b.mp as mp, b.lh as lh, b.ln as ln, b.syr as syr, b.ekstra as ekstra, b.buah as buah, str_replace (convert(char(10),a.tgl_kirim,102), '.', '-') + ' ' + convert(char(8),a.tgl_kirim,20) as tgl from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT a.jadwal as makan, b.gelar as b_gelar, b.nama_pasien as sc_field_0, b.kamar_kelas as ruangan, b.bed as sc_field_1, b.diet as diet, b.gizi as gizi, b.mp as mp, b.lh as lh, b.ln as ln, b.syr as syr, b.ekstra as ekstra, b.buah as buah, a.tgl_kirim as tgl from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT a.jadwal as makan, b.gelar as b_gelar, b.nama_pasien as sc_field_0, b.kamar_kelas as ruangan, b.bed as sc_field_1, b.diet as diet, b.gizi as gizi, b.mp as mp, b.lh as lh, b.ln as ln, b.syr as syr, b.ekstra as ekstra, b.buah as buah, convert(char(23),a.tgl_kirim,121) as tgl from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT a.jadwal as makan, b.gelar as b_gelar, b.nama_pasien as sc_field_0, b.kamar_kelas as ruangan, b.bed as sc_field_1, b.diet as diet, b.gizi as gizi, b.mp as mp, b.lh as lh, b.ln as ln, b.syr as syr, b.ekstra as ekstra, b.buah as buah, a.tgl_kirim as tgl from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT a.jadwal as makan, b.gelar as b_gelar, b.nama_pasien as sc_field_0, b.kamar_kelas as ruangan, b.bed as sc_field_1, b.diet as diet, b.gizi as gizi, b.mp as mp, b.lh as lh, b.ln as ln, b.syr as syr, b.ekstra as ekstra, b.buah as buah, EXTEND(a.tgl_kirim, YEAR TO DAY) as tgl from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT a.jadwal as makan, b.gelar as b_gelar, b.nama_pasien as sc_field_0, b.kamar_kelas as ruangan, b.bed as sc_field_1, b.diet as diet, b.gizi as gizi, b.mp as mp, b.lh as lh, b.ln as ln, b.syr as syr, b.ekstra as ekstra, b.buah as buah, a.tgl_kirim as tgl from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['order_grid'] = $nmgp_order_by;
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
         $this->Pdf->SetFont($this->default_font, $this->default_style, 11, $this->def_TTF);
     }
     else
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 11);
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
   $this->Pdf->Image($this->NM_raiz_img . $this->Ini->path_img_global . "/grp__NM__bg__NM__label_gizi_batch.jpg", "0.000000", "0.000000", "210", "297", '', '', '', false, 300, '', false, false, 0);
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['labels']['makan'] = "Makan";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['labels']['b_gelar'] = "Gelar";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['labels']['sc_field_0'] = "Nama Pasien";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['labels']['ruangan'] = "Ruangan";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['labels']['sc_field_1'] = "No Bed";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['labels']['diet'] = "Diet";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['labels']['gizi'] = "Gizi";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['labels']['mp'] = "MP";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['labels']['lh'] = "LH";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['labels']['ln'] = "LN";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['labels']['syr'] = "Syr";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['labels']['ekstra'] = "Ekstra";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['labels']['buah'] = "Buah";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['labels']['tgl'] = "Tgl";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['labels']['jenis'] = "jenis";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['labels']['nama_jenis'] = "nama_jenis";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_sticker_makan_batch']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_sticker_makan_batch']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_sticker_makan_batch']['lig_edit'];
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
   $Contr_Y_init          = 12; 
   $Contr_lin_Pdf         = 0; 
   $this->SC_desloca_col  = 78; 
   $this->SC_desloca_lin  = 41; 
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
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->SC_incr_col = $this->SC_desloca_col * $nm_quant_linhas; 
          $this->makan[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->b_gelar[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->sc_field_0[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->ruangan[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->sc_field_1[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->diet[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->gizi[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->mp[$this->nm_grid_colunas] = $this->rs_grid->fields[7] ;  
          $this->lh[$this->nm_grid_colunas] = $this->rs_grid->fields[8] ;  
          $this->ln[$this->nm_grid_colunas] = $this->rs_grid->fields[9] ;  
          $this->syr[$this->nm_grid_colunas] = $this->rs_grid->fields[10] ;  
          $this->ekstra[$this->nm_grid_colunas] = $this->rs_grid->fields[11] ;  
          $this->buah[$this->nm_grid_colunas] = $this->rs_grid->fields[12] ;  
          $this->tgl[$this->nm_grid_colunas] = $this->rs_grid->fields[13] ;  
          $this->jenis[$this->nm_grid_colunas] = "";
          $this->nama_jenis[$this->nm_grid_colunas] = "";
          $this->Lookup->lookup_jenis($this->jenis[$this->nm_grid_colunas], $this->barang[$this->nm_grid_colunas], $this->array_jenis); 
          $this->Lookup->lookup_nama_jenis($this->nama_jenis[$this->nm_grid_colunas], $this->jenis[$this->nm_grid_colunas], $this->array_nama_jenis); 
          $_SESSION['scriptcase']['pdfreport_sticker_makan_batch']['contr_erro'] = 'on';
 $this->sc_field_0[$this->nm_grid_colunas]  = substr($this->sc_field_0[$this->nm_grid_colunas] ,0,20);
$_SESSION['scriptcase']['pdfreport_sticker_makan_batch']['contr_erro'] = 'off';
          $this->makan[$this->nm_grid_colunas] = sc_strip_script($this->makan[$this->nm_grid_colunas]);
          if ($this->makan[$this->nm_grid_colunas] === "") 
          { 
              $this->makan[$this->nm_grid_colunas] = "" ;  
          } 
          $this->makan[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->makan[$this->nm_grid_colunas]);
          $this->b_gelar[$this->nm_grid_colunas] = sc_strip_script($this->b_gelar[$this->nm_grid_colunas]);
          if ($this->b_gelar[$this->nm_grid_colunas] === "") 
          { 
              $this->b_gelar[$this->nm_grid_colunas] = "" ;  
          } 
          $this->b_gelar[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->b_gelar[$this->nm_grid_colunas]);
          $this->sc_field_0[$this->nm_grid_colunas] = sc_strip_script($this->sc_field_0[$this->nm_grid_colunas]);
          if ($this->sc_field_0[$this->nm_grid_colunas] === "") 
          { 
              $this->sc_field_0[$this->nm_grid_colunas] = "" ;  
          } 
          $this->sc_field_0[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->sc_field_0[$this->nm_grid_colunas]);
          $this->ruangan[$this->nm_grid_colunas] = sc_strip_script($this->ruangan[$this->nm_grid_colunas]);
          if ($this->ruangan[$this->nm_grid_colunas] === "") 
          { 
              $this->ruangan[$this->nm_grid_colunas] = "" ;  
          } 
          $this->ruangan[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->ruangan[$this->nm_grid_colunas]);
          $this->sc_field_1[$this->nm_grid_colunas] = sc_strip_script($this->sc_field_1[$this->nm_grid_colunas]);
          if ($this->sc_field_1[$this->nm_grid_colunas] === "") 
          { 
              $this->sc_field_1[$this->nm_grid_colunas] = "" ;  
          } 
          $this->sc_field_1[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->sc_field_1[$this->nm_grid_colunas]);
          $this->diet[$this->nm_grid_colunas] = sc_strip_script($this->diet[$this->nm_grid_colunas]);
          if ($this->diet[$this->nm_grid_colunas] === "") 
          { 
              $this->diet[$this->nm_grid_colunas] = "" ;  
          } 
          $this->diet[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->diet[$this->nm_grid_colunas]);
          $this->gizi[$this->nm_grid_colunas] = sc_strip_script($this->gizi[$this->nm_grid_colunas]);
          if ($this->gizi[$this->nm_grid_colunas] === "") 
          { 
              $this->gizi[$this->nm_grid_colunas] = "" ;  
          } 
          $this->gizi[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->gizi[$this->nm_grid_colunas]);
          $this->mp[$this->nm_grid_colunas] = sc_strip_script($this->mp[$this->nm_grid_colunas]);
          if ($this->mp[$this->nm_grid_colunas] === "") 
          { 
              $this->mp[$this->nm_grid_colunas] = "" ;  
          } 
          $this->mp[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->mp[$this->nm_grid_colunas]);
          $this->lh[$this->nm_grid_colunas] = sc_strip_script($this->lh[$this->nm_grid_colunas]);
          if ($this->lh[$this->nm_grid_colunas] === "") 
          { 
              $this->lh[$this->nm_grid_colunas] = "" ;  
          } 
          $this->lh[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->lh[$this->nm_grid_colunas]);
          $this->ln[$this->nm_grid_colunas] = sc_strip_script($this->ln[$this->nm_grid_colunas]);
          if ($this->ln[$this->nm_grid_colunas] === "") 
          { 
              $this->ln[$this->nm_grid_colunas] = "" ;  
          } 
          $this->ln[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->ln[$this->nm_grid_colunas]);
          $this->syr[$this->nm_grid_colunas] = sc_strip_script($this->syr[$this->nm_grid_colunas]);
          if ($this->syr[$this->nm_grid_colunas] === "") 
          { 
              $this->syr[$this->nm_grid_colunas] = "" ;  
          } 
          $this->syr[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->syr[$this->nm_grid_colunas]);
          $this->ekstra[$this->nm_grid_colunas] = sc_strip_script($this->ekstra[$this->nm_grid_colunas]);
          if ($this->ekstra[$this->nm_grid_colunas] === "") 
          { 
              $this->ekstra[$this->nm_grid_colunas] = "" ;  
          } 
          $this->ekstra[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->ekstra[$this->nm_grid_colunas]);
          $this->buah[$this->nm_grid_colunas] = sc_strip_script($this->buah[$this->nm_grid_colunas]);
          if ($this->buah[$this->nm_grid_colunas] === "") 
          { 
              $this->buah[$this->nm_grid_colunas] = "" ;  
          } 
          $this->buah[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->buah[$this->nm_grid_colunas]);
          $this->tgl[$this->nm_grid_colunas] = sc_strip_script($this->tgl[$this->nm_grid_colunas]);
          if ($this->tgl[$this->nm_grid_colunas] === "") 
          { 
              $this->tgl[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $tgl_x =  $this->tgl[$this->nm_grid_colunas];
               nm_conv_limpa_dado($tgl_x, "YYYY-MM-DD");
               if (is_numeric($tgl_x) && strlen($tgl_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->tgl[$this->nm_grid_colunas], "YYYY-MM-DD");
                   $this->tgl[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->tgl[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tgl[$this->nm_grid_colunas]);
          $this->Lookup->lookup_jenis($this->jenis[$this->nm_grid_colunas], $this->barang[$this->nm_grid_colunas], $this->array_jenis); 
          $this->jenis[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->jenis[$this->nm_grid_colunas]);
          $this->Lookup->lookup_nama_jenis($this->nama_jenis[$this->nm_grid_colunas], $this->jenis[$this->nm_grid_colunas], $this->array_nama_jenis); 
          $this->nama_jenis[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->nama_jenis[$this->nm_grid_colunas]);
            $cell_makan = array('posx' => '24', 'posy' => '12', 'data' => $this->makan[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_gelar = array('posx' => '24', 'posy' => '17', 'data' => $this->b_gelar[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_nama = array('posx' => '32', 'posy' => '17', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_ruangan = array('posx' => '24', 'posy' => '21.5', 'data' => $this->ruangan[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_bed = array('posx' => '71', 'posy' => '21.5', 'data' => $this->sc_field_1[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_diet = array('posx' => '24', 'posy' => '26', 'data' => $this->diet[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_mp = array('posx' => '15', 'posy' => '32.5', 'data' => $this->mp[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_lh = array('posx' => '38', 'posy' => '32.5', 'data' => $this->lh[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_ln = array('posx' => '64', 'posy' => '32.5', 'data' => $this->ln[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_syr = array('posx' => '15', 'posy' => '37.5', 'data' => $this->syr[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_ekstra = array('posx' => '70', 'posy' => '37.5', 'data' => $this->ekstra[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_buah = array('posx' => '41', 'posy' => '37.5', 'data' => $this->buah[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tgl = array('posx' => '47.5', 'posy' => '12', 'data' => $this->tgl[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '7', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_Gizi = array('posx' => '35', 'posy' => '26', 'data' => $this->gizi[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);


            $this->Pdf->SetFont($cell_makan['font_type'], $cell_makan['font_style'], $cell_makan['font_size']);
            $this->pdf_text_color($cell_makan['data'], $cell_makan['color_r'], $cell_makan['color_g'], $cell_makan['color_b']);
            if (!empty($cell_makan['posx']) && !empty($cell_makan['posy']))
            {
                $this->Pdf->SetXY($cell_makan['posx'] + $this->SC_incr_col,  $cell_makan['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_makan['posx']))
            {
                $this->Pdf->SetX($cell_makan['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_makan['posy']))
            {
                $this->Pdf->SetY($cell_makan['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_makan['width'], 0, $cell_makan['data'], 0, 0, $cell_makan['align']);

            $this->Pdf->SetFont($cell_gelar['font_type'], $cell_gelar['font_style'], $cell_gelar['font_size']);
            $this->pdf_text_color($cell_gelar['data'], $cell_gelar['color_r'], $cell_gelar['color_g'], $cell_gelar['color_b']);
            if (!empty($cell_gelar['posx']) && !empty($cell_gelar['posy']))
            {
                $this->Pdf->SetXY($cell_gelar['posx'] + $this->SC_incr_col,  $cell_gelar['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_gelar['posx']))
            {
                $this->Pdf->SetX($cell_gelar['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_gelar['posy']))
            {
                $this->Pdf->SetY($cell_gelar['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_gelar['width'], 0, $cell_gelar['data'], 0, 0, $cell_gelar['align']);

            $this->Pdf->SetFont($cell_nama['font_type'], $cell_nama['font_style'], $cell_nama['font_size']);
            $this->pdf_text_color($cell_nama['data'], $cell_nama['color_r'], $cell_nama['color_g'], $cell_nama['color_b']);
            if (!empty($cell_nama['posx']) && !empty($cell_nama['posy']))
            {
                $this->Pdf->SetXY($cell_nama['posx'] + $this->SC_incr_col,  $cell_nama['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_nama['posx']))
            {
                $this->Pdf->SetX($cell_nama['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_nama['posy']))
            {
                $this->Pdf->SetY($cell_nama['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_nama['width'], 0, $cell_nama['data'], 0, 0, $cell_nama['align']);

            $this->Pdf->SetFont($cell_ruangan['font_type'], $cell_ruangan['font_style'], $cell_ruangan['font_size']);
            $this->pdf_text_color($cell_ruangan['data'], $cell_ruangan['color_r'], $cell_ruangan['color_g'], $cell_ruangan['color_b']);
            if (!empty($cell_ruangan['posx']) && !empty($cell_ruangan['posy']))
            {
                $this->Pdf->SetXY($cell_ruangan['posx'] + $this->SC_incr_col,  $cell_ruangan['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_ruangan['posx']))
            {
                $this->Pdf->SetX($cell_ruangan['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_ruangan['posy']))
            {
                $this->Pdf->SetY($cell_ruangan['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_ruangan['width'], 0, $cell_ruangan['data'], 0, 0, $cell_ruangan['align']);

            $this->Pdf->SetFont($cell_bed['font_type'], $cell_bed['font_style'], $cell_bed['font_size']);
            $this->pdf_text_color($cell_bed['data'], $cell_bed['color_r'], $cell_bed['color_g'], $cell_bed['color_b']);
            if (!empty($cell_bed['posx']) && !empty($cell_bed['posy']))
            {
                $this->Pdf->SetXY($cell_bed['posx'] + $this->SC_incr_col,  $cell_bed['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_bed['posx']))
            {
                $this->Pdf->SetX($cell_bed['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_bed['posy']))
            {
                $this->Pdf->SetY($cell_bed['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_bed['width'], 0, $cell_bed['data'], 0, 0, $cell_bed['align']);

            $this->Pdf->SetFont($cell_diet['font_type'], $cell_diet['font_style'], $cell_diet['font_size']);
            $this->pdf_text_color($cell_diet['data'], $cell_diet['color_r'], $cell_diet['color_g'], $cell_diet['color_b']);
            if (!empty($cell_diet['posx']) && !empty($cell_diet['posy']))
            {
                $this->Pdf->SetXY($cell_diet['posx'] + $this->SC_incr_col,  $cell_diet['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_diet['posx']))
            {
                $this->Pdf->SetX($cell_diet['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_diet['posy']))
            {
                $this->Pdf->SetY($cell_diet['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_diet['width'], 0, $cell_diet['data'], 0, 0, $cell_diet['align']);

            $this->Pdf->SetFont($cell_mp['font_type'], $cell_mp['font_style'], $cell_mp['font_size']);
            $this->pdf_text_color($cell_mp['data'], $cell_mp['color_r'], $cell_mp['color_g'], $cell_mp['color_b']);
            if (!empty($cell_mp['posx']) && !empty($cell_mp['posy']))
            {
                $this->Pdf->SetXY($cell_mp['posx'] + $this->SC_incr_col,  $cell_mp['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_mp['posx']))
            {
                $this->Pdf->SetX($cell_mp['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_mp['posy']))
            {
                $this->Pdf->SetY($cell_mp['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_mp['width'], 0, $cell_mp['data'], 0, 0, $cell_mp['align']);

            $this->Pdf->SetFont($cell_lh['font_type'], $cell_lh['font_style'], $cell_lh['font_size']);
            $this->pdf_text_color($cell_lh['data'], $cell_lh['color_r'], $cell_lh['color_g'], $cell_lh['color_b']);
            if (!empty($cell_lh['posx']) && !empty($cell_lh['posy']))
            {
                $this->Pdf->SetXY($cell_lh['posx'] + $this->SC_incr_col,  $cell_lh['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_lh['posx']))
            {
                $this->Pdf->SetX($cell_lh['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_lh['posy']))
            {
                $this->Pdf->SetY($cell_lh['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_lh['width'], 0, $cell_lh['data'], 0, 0, $cell_lh['align']);

            $this->Pdf->SetFont($cell_ln['font_type'], $cell_ln['font_style'], $cell_ln['font_size']);
            $this->pdf_text_color($cell_ln['data'], $cell_ln['color_r'], $cell_ln['color_g'], $cell_ln['color_b']);
            if (!empty($cell_ln['posx']) && !empty($cell_ln['posy']))
            {
                $this->Pdf->SetXY($cell_ln['posx'] + $this->SC_incr_col,  $cell_ln['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_ln['posx']))
            {
                $this->Pdf->SetX($cell_ln['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_ln['posy']))
            {
                $this->Pdf->SetY($cell_ln['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_ln['width'], 0, $cell_ln['data'], 0, 0, $cell_ln['align']);

            $this->Pdf->SetFont($cell_syr['font_type'], $cell_syr['font_style'], $cell_syr['font_size']);
            $this->pdf_text_color($cell_syr['data'], $cell_syr['color_r'], $cell_syr['color_g'], $cell_syr['color_b']);
            if (!empty($cell_syr['posx']) && !empty($cell_syr['posy']))
            {
                $this->Pdf->SetXY($cell_syr['posx'] + $this->SC_incr_col,  $cell_syr['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_syr['posx']))
            {
                $this->Pdf->SetX($cell_syr['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_syr['posy']))
            {
                $this->Pdf->SetY($cell_syr['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_syr['width'], 0, $cell_syr['data'], 0, 0, $cell_syr['align']);

            $this->Pdf->SetFont($cell_ekstra['font_type'], $cell_ekstra['font_style'], $cell_ekstra['font_size']);
            $this->pdf_text_color($cell_ekstra['data'], $cell_ekstra['color_r'], $cell_ekstra['color_g'], $cell_ekstra['color_b']);
            if (!empty($cell_ekstra['posx']) && !empty($cell_ekstra['posy']))
            {
                $this->Pdf->SetXY($cell_ekstra['posx'] + $this->SC_incr_col,  $cell_ekstra['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_ekstra['posx']))
            {
                $this->Pdf->SetX($cell_ekstra['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_ekstra['posy']))
            {
                $this->Pdf->SetY($cell_ekstra['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_ekstra['width'], 0, $cell_ekstra['data'], 0, 0, $cell_ekstra['align']);

            $this->Pdf->SetFont($cell_buah['font_type'], $cell_buah['font_style'], $cell_buah['font_size']);
            $this->pdf_text_color($cell_buah['data'], $cell_buah['color_r'], $cell_buah['color_g'], $cell_buah['color_b']);
            if (!empty($cell_buah['posx']) && !empty($cell_buah['posy']))
            {
                $this->Pdf->SetXY($cell_buah['posx'] + $this->SC_incr_col,  $cell_buah['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_buah['posx']))
            {
                $this->Pdf->SetX($cell_buah['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_buah['posy']))
            {
                $this->Pdf->SetY($cell_buah['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_buah['width'], 0, $cell_buah['data'], 0, 0, $cell_buah['align']);

            $this->Pdf->SetFont($cell_tgl['font_type'], $cell_tgl['font_style'], $cell_tgl['font_size']);
            $this->pdf_text_color($cell_tgl['data'], $cell_tgl['color_r'], $cell_tgl['color_g'], $cell_tgl['color_b']);
            if (!empty($cell_tgl['posx']) && !empty($cell_tgl['posy']))
            {
                $this->Pdf->SetXY($cell_tgl['posx'] + $this->SC_incr_col,  $cell_tgl['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_tgl['posx']))
            {
                $this->Pdf->SetX($cell_tgl['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_tgl['posy']))
            {
                $this->Pdf->SetY($cell_tgl['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_tgl['width'], 0, $cell_tgl['data'], 0, 0, $cell_tgl['align']);

            $this->Pdf->SetFont($cell_Gizi['font_type'], $cell_Gizi['font_style'], $cell_Gizi['font_size']);
            $this->pdf_text_color($cell_Gizi['data'], $cell_Gizi['color_r'], $cell_Gizi['color_g'], $cell_Gizi['color_b']);
            if (!empty($cell_Gizi['posx']) && !empty($cell_Gizi['posy']))
            {
                $this->Pdf->SetXY($cell_Gizi['posx'] + $this->SC_incr_col,  $cell_Gizi['posy'] + $this->SC_incr_lin);
            }
            elseif (!empty($cell_Gizi['posx']))
            {
                $this->Pdf->SetX($cell_Gizi['posx'] + $this->SC_incr_col);
            }
            elseif (!empty($cell_Gizi['posy']))
            {
                $this->Pdf->SetY($cell_Gizi['posy'] + $this->SC_incr_lin);
            }
            $this->Pdf->Cell($cell_Gizi['width'], 0, $cell_Gizi['data'], 0, 0, $cell_Gizi['align']);
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
