<?php
class cetak_alergi_grid
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
   var $custcode = array();
   var $description = array();
   var $alergi = array();
   var $note = array();
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
   $this->default_font_sr  = 'Times';
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
   $_SESSION['scriptcase']['cetak_alergi']['default_font'] = $this->default_font;
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
           if (in_array("cetak_alergi", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['campos_busca'];
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
       $this->description[0] = $Busca_temp['description']; 
       $tmp_pos = strpos($this->description[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->description[0]))
       {
           $this->description[0] = substr($this->description[0], 0, $tmp_pos);
       }
       $this->alergi[0] = $Busca_temp['alergi']; 
       $tmp_pos = strpos($this->alergi[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->alergi[0]))
       {
           $this->alergi[0] = substr($this->alergi[0], 0, $tmp_pos);
       }
       $this->note[0] = $Busca_temp['note']; 
       $tmp_pos = strpos($this->note[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->note[0]))
       {
           $this->note[0] = substr($this->note[0], 0, $tmp_pos);
       }
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['cetak_alergi']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['cetak_alergi']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['cetak_alergi']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['cetak_alergi']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['where_orig'] = "";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT custCode, description, alergi, note from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT custCode, description, alergi, note from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT custCode, description, alergi, note from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT custCode, description, alergi, note from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT custCode, description, alergi, note from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT custCode, description, alergi, note from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['order_grid'] = $nmgp_order_by;
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['labels']['custcode'] = "Cust Code";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['labels']['description'] = "Description";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['labels']['alergi'] = "Alergi";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['labels']['note'] = "Note";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['cetak_alergi']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['cetak_alergi']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['cetak_alergi']['lig_edit'];
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
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_alergi']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->custcode[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->description[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->alergi[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->alergi[$this->nm_grid_colunas] = (string)$this->alergi[$this->nm_grid_colunas];
          $this->note[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->note[$this->nm_grid_colunas] = (string)$this->note[$this->nm_grid_colunas];
          $this->custcode[$this->nm_grid_colunas] = sc_strip_script($this->custcode[$this->nm_grid_colunas]);
          if ($this->custcode[$this->nm_grid_colunas] === "") 
          { 
              $this->custcode[$this->nm_grid_colunas] = "" ;  
          } 
          $this->custcode[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->custcode[$this->nm_grid_colunas]);
          $this->description[$this->nm_grid_colunas] = sc_strip_script($this->description[$this->nm_grid_colunas]);
          if ($this->description[$this->nm_grid_colunas] === "") 
          { 
              $this->description[$this->nm_grid_colunas] = "" ;  
          } 
          $this->description[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->description[$this->nm_grid_colunas]);
          $this->alergi[$this->nm_grid_colunas] = sc_strip_script($this->alergi[$this->nm_grid_colunas]);
          if ($this->alergi[$this->nm_grid_colunas] === "") 
          { 
              $this->alergi[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->alergi[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->alergi[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->alergi[$this->nm_grid_colunas]);
          $this->note[$this->nm_grid_colunas] = sc_strip_script($this->note[$this->nm_grid_colunas]);
          if ($this->note[$this->nm_grid_colunas] === "") 
          { 
              $this->note[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->note[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->note[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->note[$this->nm_grid_colunas]);
            $cell_custCode = array('posx' => '15.817135624998006', 'posy' => '9.996302291665407', 'data' => $this->custcode[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => 'DotMatrix', 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_description = array('posx' => '15.552552291664707', 'posy' => '21.055012499997346', 'data' => $this->description[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => 'DotMatrix', 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_alergi = array('posx' => '15.548398333331374', 'posy' => '32.11380208332928', 'data' => $this->alergi[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => 'DotMatrix', 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_note = array('posx' => '15.552552291664707', 'posy' => '44.23224791666109', 'data' => $this->note[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => 'DotMatrix', 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
          /*------------------ Page 1 -----------------*/

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

            $this->Pdf->SetFont($cell_description['font_type'], $cell_description['font_style'], $cell_description['font_size']);
            $this->pdf_text_color($cell_description['data'], $cell_description['color_r'], $cell_description['color_g'], $cell_description['color_b']);
            if (!empty($cell_description['posx']) && !empty($cell_description['posy']))
            {
                $this->Pdf->SetXY($cell_description['posx'], $cell_description['posy']);
            }
            elseif (!empty($cell_description['posx']))
            {
                $this->Pdf->SetX($cell_description['posx']);
            }
            elseif (!empty($cell_description['posy']))
            {
                $this->Pdf->SetY($cell_description['posy']);
            }
            $this->Pdf->Cell($cell_description['width'], 0, $cell_description['data'], 0, 0, $cell_description['align']);

            $this->Pdf->SetFont($cell_alergi['font_type'], $cell_alergi['font_style'], $cell_alergi['font_size']);
            $this->pdf_text_color($cell_alergi['data'], $cell_alergi['color_r'], $cell_alergi['color_g'], $cell_alergi['color_b']);
            if (!empty($cell_alergi['posx']) && !empty($cell_alergi['posy']))
            {
                $this->Pdf->SetXY($cell_alergi['posx'], $cell_alergi['posy']);
            }
            elseif (!empty($cell_alergi['posx']))
            {
                $this->Pdf->SetX($cell_alergi['posx']);
            }
            elseif (!empty($cell_alergi['posy']))
            {
                $this->Pdf->SetY($cell_alergi['posy']);
            }
            $this->Pdf->Cell($cell_alergi['width'], 0, $cell_alergi['data'], 0, 0, $cell_alergi['align']);

            $this->Pdf->SetFont($cell_note['font_type'], $cell_note['font_style'], $cell_note['font_size']);
            $this->pdf_text_color($cell_note['data'], $cell_note['color_r'], $cell_note['color_g'], $cell_note['color_b']);
            if (!empty($cell_note['posx']) && !empty($cell_note['posy']))
            {
                $this->Pdf->SetXY($cell_note['posx'], $cell_note['posy']);
            }
            elseif (!empty($cell_note['posx']))
            {
                $this->Pdf->SetX($cell_note['posx']);
            }
            elseif (!empty($cell_note['posy']))
            {
                $this->Pdf->SetY($cell_note['posy']);
            }
            $this->Pdf->Cell($cell_note['width'], 0, $cell_note['data'], 0, 0, $cell_note['align']);

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
