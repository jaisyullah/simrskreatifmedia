<?php
class pdfreport_tbhasilrad_grid
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
   var $kode = array();
   var $barcode = array();
   var $a_struk = array();
   var $sc_field_0 = array();
   var $nama = array();
   var $jk = array();
   var $tl = array();
   var $dokter = array();
   var $tglperiksa = array();
   var $tglselesai = array();
   var $hasil = array();
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
   $Tp_papel = "A5";
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
   $_SESSION['scriptcase']['pdfreport_tbhasilrad']['default_font'] = $this->default_font;
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
           if (in_array("pdfreport_tbhasilrad", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->kode[0] = $Busca_temp['kode']; 
       $tmp_pos = strpos($this->kode[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->kode[0]))
       {
           $this->kode[0] = substr($this->kode[0], 0, $tmp_pos);
       }
       $this->barcode[0] = $Busca_temp['barcode']; 
       $tmp_pos = strpos($this->barcode[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->barcode[0]))
       {
           $this->barcode[0] = substr($this->barcode[0], 0, $tmp_pos);
       }
       $this->a_struk[0] = $Busca_temp['a_struk']; 
       $tmp_pos = strpos($this->a_struk[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->a_struk[0]))
       {
           $this->a_struk[0] = substr($this->a_struk[0], 0, $tmp_pos);
       }
       $this->sc_field_0[0] = $Busca_temp['sc_field_0']; 
       $tmp_pos = strpos($this->sc_field_0[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->sc_field_0[0]))
       {
           $this->sc_field_0[0] = substr($this->sc_field_0[0], 0, $tmp_pos);
       }
       $this->hasil[0] = $Busca_temp['hasil']; 
       $tmp_pos = strpos($this->hasil[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->hasil[0]))
       {
           $this->hasil[0] = substr($this->hasil[0], 0, $tmp_pos);
       }
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbhasilrad']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbhasilrad']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbhasilrad']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbhasilrad']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['where_orig'] = " where a.trancode = '" . $_SESSION['var_Rad'] . "'";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT a.trancode as kode, a.trancode as barcode, a.struk as a_struk, a.custcode as sc_field_0, concat(b. NAME,', ',b.salut) as nama, b.sex as jk, str_replace (convert(char(10),b.birthDate,102), '.', '-') + ' ' + convert(char(8),b.birthDate,20) as tl, a.doccode as dokter, str_replace (convert(char(10),a.trandate,102), '.', '-') + ' ' + convert(char(8),a.trandate,20) as tglperiksa, str_replace (convert(char(10),a.finishdate,102), '.', '-') + ' ' + convert(char(8),a.finishdate,20) as tglselesai, c.hasil as hasil from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT a.trancode as kode, a.trancode as barcode, a.struk as a_struk, a.custcode as sc_field_0, concat(b. NAME,', ',b.salut) as nama, b.sex as jk, b.birthDate as tl, a.doccode as dokter, a.trandate as tglperiksa, a.finishdate as tglselesai, c.hasil as hasil from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT a.trancode as kode, a.trancode as barcode, a.struk as a_struk, a.custcode as sc_field_0, concat(b. NAME,', ',b.salut) as nama, b.sex as jk, convert(char(23),b.birthDate,121) as tl, a.doccode as dokter, convert(char(23),a.trandate,121) as tglperiksa, convert(char(23),a.finishdate,121) as tglselesai, c.hasil as hasil from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT a.trancode as kode, a.trancode as barcode, a.struk as a_struk, a.custcode as sc_field_0, concat(b. NAME,', ',b.salut) as nama, b.sex as jk, b.birthDate as tl, a.doccode as dokter, a.trandate as tglperiksa, a.finishdate as tglselesai, c.hasil as hasil from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT a.trancode as kode, a.trancode as barcode, a.struk as a_struk, a.custcode as sc_field_0, concat(b. NAME,', ',b.salut) as nama, b.sex as jk, EXTEND(b.birthDate, YEAR TO FRACTION) as tl, a.doccode as dokter, EXTEND(a.trandate, YEAR TO FRACTION) as tglperiksa, EXTEND(a.finishdate, YEAR TO FRACTION) as tglselesai, LOTOFILE(c.hasil, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_informix', 'client') as hasil from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT a.trancode as kode, a.trancode as barcode, a.struk as a_struk, a.custcode as sc_field_0, concat(b. NAME,', ',b.salut) as nama, b.sex as jk, b.birthDate as tl, a.doccode as dokter, a.trandate as tglperiksa, a.finishdate as tglselesai, c.hasil as hasil from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['order_grid'] = $nmgp_order_by;
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
         $this->Pdf->SetFont($this->default_font, $this->default_style, 8, $this->def_TTF);
     }
     else
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 8);
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
   $this->Pdf->Image($this->NM_raiz_img . $this->Ini->path_img_global . "/grp__NM__bg__NM__Rad Hasil.jpg", "0.000000", "0.000000", "148", "210", '', '', '', false, 300, '', false, false, 0);
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['labels']['kode'] = "Kode";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['labels']['barcode'] = "Barcode";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['labels']['a_struk'] = "Struk";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['labels']['sc_field_0'] = "No RM";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['labels']['nama'] = "Nama";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['labels']['jk'] = "Jk";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['labels']['tl'] = "Tl";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['labels']['dokter'] = "Dokter";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['labels']['tglperiksa'] = "Tgl Periksa";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['labels']['tglselesai'] = "Tgl Selesai";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['labels']['hasil'] = "Hasil";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbhasilrad']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbhasilrad']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_tbhasilrad']['lig_edit'];
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
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_tbhasilrad']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->kode[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->barcode[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->a_struk[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->sc_field_0[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->nama[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->jk[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->tl[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->dokter[$this->nm_grid_colunas] = $this->rs_grid->fields[7] ;  
          $this->tglperiksa[$this->nm_grid_colunas] = $this->rs_grid->fields[8] ;  
          $this->tglselesai[$this->nm_grid_colunas] = $this->rs_grid->fields[9] ;  
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
       { 
           $this->hasil[$this->nm_grid_colunas] = "";  
           if (is_file($this->rs_grid->fields[10])) 
           { 
               $this->hasil[$this->nm_grid_colunas] = file_get_contents($this->rs_grid->fields[10]);  
           } 
       } 
       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
       { 
           $this->hasil[$this->nm_grid_colunas] = $this->Db->BlobDecode($this->rs_grid->fields[10]) ;  
       } 
       else
       { 
           $this->hasil[$this->nm_grid_colunas] = $this->rs_grid->fields[10] ;  
       } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          { 
              if (!empty($this->hasil[$this->nm_grid_colunas]))
              { 
                  $this->hasil[$this->nm_grid_colunas] = $this->Db->BlobDecode($this->hasil[$this->nm_grid_colunas], false, true, "BLOB");
              }
          }
          $_SESSION['scriptcase']['pdfreport_tbhasilrad']['contr_erro'] = 'on';
 $tgl_lahir = $this->tl[$this->nm_grid_colunas] ;

$lahir = new DateTime($tgl_lahir);
$today = new DateTime();
$umur = $today->diff($lahir);
$this->tl[$this->nm_grid_colunas]  = $umur->y . " TH " . $umur->m . " BLN " . $umur->d . " HR";
$_SESSION['scriptcase']['pdfreport_tbhasilrad']['contr_erro'] = 'off';
          $this->kode[$this->nm_grid_colunas] = sc_strip_script($this->kode[$this->nm_grid_colunas]);
          if ($this->kode[$this->nm_grid_colunas] === "") 
          { 
              $this->kode[$this->nm_grid_colunas] = "" ;  
          } 
          if ($this->kode[$this->nm_grid_colunas] !== "")
          { 
              $this->kode[$this->nm_grid_colunas] = nl2br($this->kode[$this->nm_grid_colunas]) ; 
              $temp = explode("<br />", $this->kode[$this->nm_grid_colunas]); 
              if (!isset($temp[1])) 
              { 
                  $temp = explode("<br>", $this->kode[$this->nm_grid_colunas]); 
              } 
              $this->kode[$this->nm_grid_colunas] = "" ; 
              $ind_x = 0 ; 
              while (isset($temp[$ind_x])) 
              { 
                 if (!empty($this->kode[$this->nm_grid_colunas])) 
                 { 
                     $this->kode[$this->nm_grid_colunas] .= "<br>"; 
                 } 
                 if (strlen($temp[$ind_x]) > 255) 
                 { 
                     $this->kode[$this->nm_grid_colunas] .= wordwrap($temp[$ind_x], 255, "<br>", true); 
                 } 
                 else 
                 { 
                     $this->kode[$this->nm_grid_colunas] .= $temp[$ind_x]; 
                 } 
                 $ind_x++; 
              }  
          }  
          $this->kode[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->kode[$this->nm_grid_colunas]);
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
          $this->a_struk[$this->nm_grid_colunas] = sc_strip_script($this->a_struk[$this->nm_grid_colunas]);
          if ($this->a_struk[$this->nm_grid_colunas] === "") 
          { 
              $this->a_struk[$this->nm_grid_colunas] = "" ;  
          } 
          $this->a_struk[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->a_struk[$this->nm_grid_colunas]);
          $this->sc_field_0[$this->nm_grid_colunas] = sc_strip_script($this->sc_field_0[$this->nm_grid_colunas]);
          if ($this->sc_field_0[$this->nm_grid_colunas] === "") 
          { 
              $this->sc_field_0[$this->nm_grid_colunas] = "" ;  
          } 
          $this->sc_field_0[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->sc_field_0[$this->nm_grid_colunas]);
          $this->nama[$this->nm_grid_colunas] = sc_strip_script($this->nama[$this->nm_grid_colunas]);
          if ($this->nama[$this->nm_grid_colunas] === "") 
          { 
              $this->nama[$this->nm_grid_colunas] = "" ;  
          } 
          $this->nama[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->nama[$this->nm_grid_colunas]);
          $this->jk[$this->nm_grid_colunas] = sc_strip_script($this->jk[$this->nm_grid_colunas]);
          if ($this->jk[$this->nm_grid_colunas] === "") 
          { 
              $this->jk[$this->nm_grid_colunas] = "" ;  
          } 
          $this->jk[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->jk[$this->nm_grid_colunas]);
          $this->tl[$this->nm_grid_colunas] = sc_strip_script($this->tl[$this->nm_grid_colunas]);
          if ($this->tl[$this->nm_grid_colunas] === "") 
          { 
              $this->tl[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               if (substr($this->tl[$this->nm_grid_colunas], 10, 1) == "-") 
               { 
                  $this->tl[$this->nm_grid_colunas] = substr($this->tl[$this->nm_grid_colunas], 0, 10) . " " . substr($this->tl[$this->nm_grid_colunas], 11);
               } 
               if (substr($this->tl[$this->nm_grid_colunas], 13, 1) == ".") 
               { 
                  $this->tl[$this->nm_grid_colunas] = substr($this->tl[$this->nm_grid_colunas], 0, 13) . ":" . substr($this->tl[$this->nm_grid_colunas], 14, 2) . ":" . substr($this->tl[$this->nm_grid_colunas], 17);
               } 
               $tl_x =  $this->tl[$this->nm_grid_colunas];
               nm_conv_limpa_dado($tl_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($tl_x) && strlen($tl_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->tl[$this->nm_grid_colunas], "YYYY-MM-DD HH:II:SS");
                   $this->tl[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->tl[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tl[$this->nm_grid_colunas]);
          $this->Lookup->lookup_dokter($this->dokter[$this->nm_grid_colunas] , $this->dokter[$this->nm_grid_colunas]) ; 
          $this->dokter[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->dokter[$this->nm_grid_colunas]);
          $this->tglperiksa[$this->nm_grid_colunas] = sc_strip_script($this->tglperiksa[$this->nm_grid_colunas]);
          if ($this->tglperiksa[$this->nm_grid_colunas] === "") 
          { 
              $this->tglperiksa[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               if (substr($this->tglperiksa[$this->nm_grid_colunas], 10, 1) == "-") 
               { 
                  $this->tglperiksa[$this->nm_grid_colunas] = substr($this->tglperiksa[$this->nm_grid_colunas], 0, 10) . " " . substr($this->tglperiksa[$this->nm_grid_colunas], 11);
               } 
               if (substr($this->tglperiksa[$this->nm_grid_colunas], 13, 1) == ".") 
               { 
                  $this->tglperiksa[$this->nm_grid_colunas] = substr($this->tglperiksa[$this->nm_grid_colunas], 0, 13) . ":" . substr($this->tglperiksa[$this->nm_grid_colunas], 14, 2) . ":" . substr($this->tglperiksa[$this->nm_grid_colunas], 17);
               } 
               $tglperiksa_x =  $this->tglperiksa[$this->nm_grid_colunas];
               nm_conv_limpa_dado($tglperiksa_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($tglperiksa_x) && strlen($tglperiksa_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->tglperiksa[$this->nm_grid_colunas], "YYYY-MM-DD HH:II:SS");
                   $this->tglperiksa[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->tglperiksa[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tglperiksa[$this->nm_grid_colunas]);
          $this->tglselesai[$this->nm_grid_colunas] = sc_strip_script($this->tglselesai[$this->nm_grid_colunas]);
          if ($this->tglselesai[$this->nm_grid_colunas] === "") 
          { 
              $this->tglselesai[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               if (substr($this->tglselesai[$this->nm_grid_colunas], 10, 1) == "-") 
               { 
                  $this->tglselesai[$this->nm_grid_colunas] = substr($this->tglselesai[$this->nm_grid_colunas], 0, 10) . " " . substr($this->tglselesai[$this->nm_grid_colunas], 11);
               } 
               if (substr($this->tglselesai[$this->nm_grid_colunas], 13, 1) == ".") 
               { 
                  $this->tglselesai[$this->nm_grid_colunas] = substr($this->tglselesai[$this->nm_grid_colunas], 0, 13) . ":" . substr($this->tglselesai[$this->nm_grid_colunas], 14, 2) . ":" . substr($this->tglselesai[$this->nm_grid_colunas], 17);
               } 
               $tglselesai_x =  $this->tglselesai[$this->nm_grid_colunas];
               nm_conv_limpa_dado($tglselesai_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($tglselesai_x) && strlen($tglselesai_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->tglselesai[$this->nm_grid_colunas], "YYYY-MM-DD HH:II:SS");
                   $this->tglselesai[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->tglselesai[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tglselesai[$this->nm_grid_colunas]);
          $this->hasil[$this->nm_grid_colunas] = sc_strip_script($this->hasil[$this->nm_grid_colunas]);
          if ($this->hasil[$this->nm_grid_colunas] === "") 
          { 
              $this->hasil[$this->nm_grid_colunas] = "" ;  
          } 
          $this->hasil[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->hasil[$this->nm_grid_colunas]);
            $cell_Kode = array('posx' => '120', 'posy' => '29', 'data' => $this->kode[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_barcode = array('posx' => '133', 'posy' => '3', 'data' => $this->barcode[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_a_struk = array('posx' => '20', 'posy' => '29', 'data' => $this->a_struk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_sc_field_0 = array('posx' => '36', 'posy' => '37', 'data' => $this->sc_field_0[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Nama = array('posx' => '36', 'posy' => '41.5', 'data' => $this->nama[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_jk = array('posx' => '36', 'posy' => '45.5', 'data' => $this->jk[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tl = array('posx' => '36', 'posy' => '49.5', 'data' => $this->tl[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_dokter = array('posx' => '106', 'posy' => '37.5', 'data' => $this->dokter[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '7', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_TglPeriksa = array('posx' => '106', 'posy' => '45', 'data' => $this->tglperiksa[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_TglSelesai = array('posx' => '106', 'posy' => '49.5', 'data' => $this->tglselesai[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Hasil = array('posx' => '4.949269374999376', 'posy' => '57.58682708332608', 'data' => $this->hasil[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);

            $this->Pdf->SetFont($cell_Kode['font_type'], $cell_Kode['font_style'], $cell_Kode['font_size']);
            $this->Pdf->SetTextColor($cell_Kode['color_r'], $cell_Kode['color_g'], $cell_Kode['color_b']);
            if (!empty($cell_Kode['posx']) && !empty($cell_Kode['posy']))
            {
                $this->Pdf->SetXY($cell_Kode['posx'], $cell_Kode['posy']);
            }
            elseif (!empty($cell_Kode['posx']))
            {
                $this->Pdf->SetX($cell_Kode['posx']);
            }
            elseif (!empty($cell_Kode['posy']))
            {
                $this->Pdf->SetY($cell_Kode['posy']);
            }
            $NM_partes_val = explode("<br>", $cell_Kode['data']);
            $PosX = $this->Pdf->GetX();
            $Incre = false;
            foreach ($NM_partes_val as $Lines)
            {
                if ($Incre)
                {
                    $this->Pdf->Ln(2.8222222222222);
                }
                $this->Pdf->SetX($PosX);
                $this->Pdf->Cell($cell_Kode['width'], 0, trim($Lines), 0, 0, $cell_Kode['align']);
                $Incre = true;
            }

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

            $this->Pdf->SetFont($cell_a_struk['font_type'], $cell_a_struk['font_style'], $cell_a_struk['font_size']);
            $this->pdf_text_color($cell_a_struk['data'], $cell_a_struk['color_r'], $cell_a_struk['color_g'], $cell_a_struk['color_b']);
            if (!empty($cell_a_struk['posx']) && !empty($cell_a_struk['posy']))
            {
                $this->Pdf->SetXY($cell_a_struk['posx'], $cell_a_struk['posy']);
            }
            elseif (!empty($cell_a_struk['posx']))
            {
                $this->Pdf->SetX($cell_a_struk['posx']);
            }
            elseif (!empty($cell_a_struk['posy']))
            {
                $this->Pdf->SetY($cell_a_struk['posy']);
            }
            $this->Pdf->Cell($cell_a_struk['width'], 0, $cell_a_struk['data'], 0, 0, $cell_a_struk['align']);

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

            $this->Pdf->SetFont($cell_Nama['font_type'], $cell_Nama['font_style'], $cell_Nama['font_size']);
            $this->pdf_text_color($cell_Nama['data'], $cell_Nama['color_r'], $cell_Nama['color_g'], $cell_Nama['color_b']);
            if (!empty($cell_Nama['posx']) && !empty($cell_Nama['posy']))
            {
                $this->Pdf->SetXY($cell_Nama['posx'], $cell_Nama['posy']);
            }
            elseif (!empty($cell_Nama['posx']))
            {
                $this->Pdf->SetX($cell_Nama['posx']);
            }
            elseif (!empty($cell_Nama['posy']))
            {
                $this->Pdf->SetY($cell_Nama['posy']);
            }
            $this->Pdf->Cell($cell_Nama['width'], 0, $cell_Nama['data'], 0, 0, $cell_Nama['align']);

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

            $this->Pdf->SetFont($cell_TglPeriksa['font_type'], $cell_TglPeriksa['font_style'], $cell_TglPeriksa['font_size']);
            $this->pdf_text_color($cell_TglPeriksa['data'], $cell_TglPeriksa['color_r'], $cell_TglPeriksa['color_g'], $cell_TglPeriksa['color_b']);
            if (!empty($cell_TglPeriksa['posx']) && !empty($cell_TglPeriksa['posy']))
            {
                $this->Pdf->SetXY($cell_TglPeriksa['posx'], $cell_TglPeriksa['posy']);
            }
            elseif (!empty($cell_TglPeriksa['posx']))
            {
                $this->Pdf->SetX($cell_TglPeriksa['posx']);
            }
            elseif (!empty($cell_TglPeriksa['posy']))
            {
                $this->Pdf->SetY($cell_TglPeriksa['posy']);
            }
            $this->Pdf->Cell($cell_TglPeriksa['width'], 0, $cell_TglPeriksa['data'], 0, 0, $cell_TglPeriksa['align']);

            $this->Pdf->SetFont($cell_TglSelesai['font_type'], $cell_TglSelesai['font_style'], $cell_TglSelesai['font_size']);
            $this->pdf_text_color($cell_TglSelesai['data'], $cell_TglSelesai['color_r'], $cell_TglSelesai['color_g'], $cell_TglSelesai['color_b']);
            if (!empty($cell_TglSelesai['posx']) && !empty($cell_TglSelesai['posy']))
            {
                $this->Pdf->SetXY($cell_TglSelesai['posx'], $cell_TglSelesai['posy']);
            }
            elseif (!empty($cell_TglSelesai['posx']))
            {
                $this->Pdf->SetX($cell_TglSelesai['posx']);
            }
            elseif (!empty($cell_TglSelesai['posy']))
            {
                $this->Pdf->SetY($cell_TglSelesai['posy']);
            }
            $this->Pdf->Cell($cell_TglSelesai['width'], 0, $cell_TglSelesai['data'], 0, 0, $cell_TglSelesai['align']);


            $this->Pdf->SetFont($cell_Hasil['font_type'], $cell_Hasil['font_style'], $cell_Hasil['font_size']);
            $this->Pdf->SetTextColor($cell_Hasil['color_r'], $cell_Hasil['color_g'], $cell_Hasil['color_b']);
            if (!empty($cell_Hasil['posx']) && !empty($cell_Hasil['posy']))
            {
                $this->Pdf->SetXY($cell_Hasil['posx'], $cell_Hasil['posy']);
            }
            elseif (!empty($cell_Hasil['posx']))
            {
                $this->Pdf->SetX($cell_Hasil['posx']);
            }
            elseif (!empty($cell_Hasil['posy']))
            {
                $this->Pdf->SetY($cell_Hasil['posy']);
            }
            if ($this->Font_ttf)
            {
                $this->Pdf->Cell($cell_Hasil['width'], 0, $cell_Hasil['data'], 0, 0, $cell_Hasil['align']);
            }
            else
            {
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->writeHTMLCell($cell_Hasil['width'], 0, $atu_X, $atu_Y, $cell_Hasil['data'], 0, 0, false, true, $cell_Hasil['align']);
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
