<?php
class pdfreport_surat_naikkelas_grid
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
   var $array_alamat = array();
   var $array_ktp = array();
   var $array_alamat2 = array();
   var $array_nama = array();
   var $alamat = array();
   var $ktp = array();
   var $tgl_skr = array();
   var $alamat2 = array();
   var $nama = array();
   var $custcode = array();
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
   $_SESSION['scriptcase']['pdfreport_surat_naikkelas']['default_font'] = $this->default_font;
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
           if (in_array("pdfreport_surat_naikkelas", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->custcode[0] = $Busca_temp['custcode']; 
       $tmp_pos = strpos($this->custcode[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->custcode[0]))
       {
           $this->custcode[0] = substr($this->custcode[0], 0, $tmp_pos);
       }
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_surat_naikkelas']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_surat_naikkelas']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_surat_naikkelas']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_surat_naikkelas']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['where_orig'] = " where tranCode = '" . $_SESSION['biaya_trancode'] . "'";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT custCode from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT custCode from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT custCode from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT custCode from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT custCode from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT custCode from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['order_grid'] = $nmgp_order_by;
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
   $this->Pdf->Image($this->NM_raiz_img . $this->Ini->path_img_global . "/grp__NM__bg__NM__SP NAIK KELAS.jpg", "0.000000", "0.000000", "210", "297", '', '', '', false, 300, '', false, false, 0);
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['labels']['custcode'] = "Cust Code";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['labels']['alamat'] = "alamat";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['labels']['ktp'] = "ktp";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['labels']['tgl_skr'] = "tgl_skr";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['labels']['alamat2'] = "alamat2";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['labels']['nama'] = "Nama";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_surat_naikkelas']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_surat_naikkelas']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_surat_naikkelas']['lig_edit'];
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
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_surat_naikkelas']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->custcode[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->alamat[$this->nm_grid_colunas] = "";
          $this->ktp[$this->nm_grid_colunas] = "";
          $this->tgl_skr[$this->nm_grid_colunas] = "";
          $this->alamat2[$this->nm_grid_colunas] = "";
          $this->nama[$this->nm_grid_colunas] = "";
          $this->Lookup->lookup_alamat($this->alamat[$this->nm_grid_colunas], $this->custcode[$this->nm_grid_colunas], $this->array_alamat); 
          $this->Lookup->lookup_ktp($this->ktp[$this->nm_grid_colunas], $this->custcode[$this->nm_grid_colunas], $this->array_ktp); 
          $this->Lookup->lookup_alamat2($this->alamat2[$this->nm_grid_colunas], $this->custcode[$this->nm_grid_colunas], $this->array_alamat2); 
          $this->Lookup->lookup_nama($this->nama[$this->nm_grid_colunas], $this->custcode[$this->nm_grid_colunas], $this->array_nama); 
          $_SESSION['scriptcase']['pdfreport_surat_naikkelas']['contr_erro'] = 'on';
  

$this->tgl_skr[$this->nm_grid_colunas]  = $this->tgl_indo(date('Y-m-d'));

$_SESSION['scriptcase']['pdfreport_surat_naikkelas']['contr_erro'] = 'off';
          $this->custcode[$this->nm_grid_colunas] = sc_strip_script($this->custcode[$this->nm_grid_colunas]);
          if ($this->custcode[$this->nm_grid_colunas] === "") 
          { 
              $this->custcode[$this->nm_grid_colunas] = "" ;  
          } 
          $this->custcode[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->custcode[$this->nm_grid_colunas]);
          $this->Lookup->lookup_alamat($this->alamat[$this->nm_grid_colunas], $this->custcode[$this->nm_grid_colunas], $this->array_alamat); 
          $this->alamat[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->alamat[$this->nm_grid_colunas]);
          $this->Lookup->lookup_ktp($this->ktp[$this->nm_grid_colunas], $this->custcode[$this->nm_grid_colunas], $this->array_ktp); 
          $this->ktp[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->ktp[$this->nm_grid_colunas]);
          if ($this->tgl_skr[$this->nm_grid_colunas] === "") 
          { 
              $this->tgl_skr[$this->nm_grid_colunas] = "" ;  
          } 
          $this->tgl_skr[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tgl_skr[$this->nm_grid_colunas]);
          $this->Lookup->lookup_alamat2($this->alamat2[$this->nm_grid_colunas], $this->custcode[$this->nm_grid_colunas], $this->array_alamat2); 
          $this->alamat2[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->alamat2[$this->nm_grid_colunas]);
          $this->Lookup->lookup_nama($this->nama[$this->nm_grid_colunas], $this->custcode[$this->nm_grid_colunas], $this->array_nama); 
          $this->nama[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->nama[$this->nm_grid_colunas]);
            $cell_alamat = array('posx' => '40', 'posy' => '116', 'data' => $this->alamat[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_ktp = array('posx' => '40', 'posy' => '128', 'data' => $this->ktp[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tgl_skr = array('posx' => '27', 'posy' => '226.5', 'data' => $this->tgl_skr[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12.5', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_alamat2 = array('posx' => '40', 'posy' => '121.5', 'data' => $this->alamat2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Nama = array('posx' => '40', 'posy' => '109.50', 'data' => $this->nama[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);

            $this->Pdf->SetFont($cell_alamat['font_type'], $cell_alamat['font_style'], $cell_alamat['font_size']);
            $this->Pdf->SetTextColor($cell_alamat['color_r'], $cell_alamat['color_g'], $cell_alamat['color_b']);
            if (!empty($cell_alamat['posx']) && !empty($cell_alamat['posy']))
            {
                $this->Pdf->SetXY($cell_alamat['posx'], $cell_alamat['posy']);
            }
            elseif (!empty($cell_alamat['posx']))
            {
                $this->Pdf->SetX($cell_alamat['posx']);
            }
            elseif (!empty($cell_alamat['posy']))
            {
                $this->Pdf->SetY($cell_alamat['posy']);
            }
            $NM_partes_val = explode("<br>", $cell_alamat['data']);
            $PosX = $this->Pdf->GetX();
            $Incre = false;
            foreach ($NM_partes_val as $Lines)
            {
                if ($Incre)
                {
                    $this->Pdf->Ln(4.2333333333333);
                }
                $this->Pdf->SetX($PosX);
                $this->Pdf->Cell($cell_alamat['width'], 0, trim($Lines), 0, 0, $cell_alamat['align']);
                $Incre = true;
            }

            $this->Pdf->SetFont($cell_ktp['font_type'], $cell_ktp['font_style'], $cell_ktp['font_size']);
            $this->pdf_text_color($cell_ktp['data'], $cell_ktp['color_r'], $cell_ktp['color_g'], $cell_ktp['color_b']);
            if (!empty($cell_ktp['posx']) && !empty($cell_ktp['posy']))
            {
                $this->Pdf->SetXY($cell_ktp['posx'], $cell_ktp['posy']);
            }
            elseif (!empty($cell_ktp['posx']))
            {
                $this->Pdf->SetX($cell_ktp['posx']);
            }
            elseif (!empty($cell_ktp['posy']))
            {
                $this->Pdf->SetY($cell_ktp['posy']);
            }
            $this->Pdf->Cell($cell_ktp['width'], 0, $cell_ktp['data'], 0, 0, $cell_ktp['align']);

            $this->Pdf->SetFont($cell_tgl_skr['font_type'], $cell_tgl_skr['font_style'], $cell_tgl_skr['font_size']);
            $this->pdf_text_color($cell_tgl_skr['data'], $cell_tgl_skr['color_r'], $cell_tgl_skr['color_g'], $cell_tgl_skr['color_b']);
            if (!empty($cell_tgl_skr['posx']) && !empty($cell_tgl_skr['posy']))
            {
                $this->Pdf->SetXY($cell_tgl_skr['posx'], $cell_tgl_skr['posy']);
            }
            elseif (!empty($cell_tgl_skr['posx']))
            {
                $this->Pdf->SetX($cell_tgl_skr['posx']);
            }
            elseif (!empty($cell_tgl_skr['posy']))
            {
                $this->Pdf->SetY($cell_tgl_skr['posy']);
            }
            $this->Pdf->Cell($cell_tgl_skr['width'], 0, $cell_tgl_skr['data'], 0, 0, $cell_tgl_skr['align']);

            $this->Pdf->SetFont($cell_alamat2['font_type'], $cell_alamat2['font_style'], $cell_alamat2['font_size']);
            $this->Pdf->SetTextColor($cell_alamat2['color_r'], $cell_alamat2['color_g'], $cell_alamat2['color_b']);
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
            $NM_partes_val = explode("<br>", $cell_alamat2['data']);
            $PosX = $this->Pdf->GetX();
            $Incre = false;
            foreach ($NM_partes_val as $Lines)
            {
                if ($Incre)
                {
                    $this->Pdf->Ln(4.2333333333333);
                }
                $this->Pdf->SetX($PosX);
                $this->Pdf->Cell($cell_alamat2['width'], 0, trim($Lines), 0, 0, $cell_alamat2['align']);
                $Incre = true;
            }

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
function tgl_indo($tanggal){
$_SESSION['scriptcase']['pdfreport_surat_naikkelas']['contr_erro'] = 'on';
  
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];

$_SESSION['scriptcase']['pdfreport_surat_naikkelas']['contr_erro'] = 'off';
}
}
?>
