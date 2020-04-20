<?php
class pdfreport_kartu_grid
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
   var $rm = array();
   var $barcode = array();
   var $pasien = array();
   var $tl = array();
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
   $Tp_papel = array(86, 54);
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
   $_SESSION['scriptcase']['pdfreport_kartu']['default_font'] = $this->default_font;
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
           if (in_array("pdfreport_kartu", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->rm[0] = $Busca_temp['rm']; 
       $tmp_pos = strpos($this->rm[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->rm[0]))
       {
           $this->rm[0] = substr($this->rm[0], 0, $tmp_pos);
       }
       $this->barcode[0] = $Busca_temp['barcode']; 
       $tmp_pos = strpos($this->barcode[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->barcode[0]))
       {
           $this->barcode[0] = substr($this->barcode[0], 0, $tmp_pos);
       }
       $this->pasien[0] = $Busca_temp['pasien']; 
       $tmp_pos = strpos($this->pasien[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->pasien[0]))
       {
           $this->pasien[0] = substr($this->pasien[0], 0, $tmp_pos);
       }
       $this->tl[0] = $Busca_temp['tl']; 
       $tmp_pos = strpos($this->tl[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->tl[0]))
       {
           $this->tl[0] = substr($this->tl[0], 0, $tmp_pos);
       }
       $tl_2 = $Busca_temp['tl_input_2']; 
       $this->tl_2 = $Busca_temp['tl_input_2']; 
   } 
   else 
   { 
       $this->tl_2 = ""; 
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_kartu']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_kartu']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_kartu']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_kartu']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['where_orig'] = " where custCode = " . $_SESSION['var_custCode'] . "";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT custCode as rm, custCode as barcode, concat(NAME,', ',salut) as pasien, str_replace (convert(char(10),birthDate,102), '.', '-') + ' ' + convert(char(8),birthDate,20) as tl from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT custCode as rm, custCode as barcode, concat(NAME,', ',salut) as pasien, birthDate as tl from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT custCode as rm, custCode as barcode, concat(NAME,', ',salut) as pasien, convert(char(23),birthDate,121) as tl from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT custCode as rm, custCode as barcode, concat(NAME,', ',salut) as pasien, birthDate as tl from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT custCode as rm, custCode as barcode, concat(NAME,', ',salut) as pasien, EXTEND(birthDate, YEAR TO FRACTION) as tl from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT custCode as rm, custCode as barcode, concat(NAME,', ',salut) as pasien, birthDate as tl from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['order_grid'] = $nmgp_order_by;
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
         $this->Pdf->SetFont($this->default_font, $this->default_style, 11, $this->def_TTF);
     }
     else
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 11);
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
   $this->Pdf->Image($this->NM_raiz_img . $this->Ini->path_img_global . "/grp__NM__bg__NM__patien-card.jpg", "0.000000", "0.000000", "86", "54", '', '', '', false, 300, '', false, false, 0);
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['labels']['rm'] = "RM";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['labels']['barcode'] = "Barcode";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['labels']['pasien'] = "Pasien";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['labels']['tl'] = "TL";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_kartu']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_kartu']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_kartu']['lig_edit'];
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
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_kartu']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->rm[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->barcode[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->pasien[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->tl[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $_SESSION['scriptcase']['pdfreport_kartu']['contr_erro'] = 'on';
if (!isset($_SESSION['var_custCode'])) {$_SESSION['var_custCode'] = "";}
if (!isset($this->sc_temp_var_custCode)) {$this->sc_temp_var_custCode = (isset($_SESSION['var_custCode'])) ? $_SESSION['var_custCode'] : "";}
 $update_table  = 'tbcustomer';      
$update_where  = "custCode = '$this->sc_temp_var_custCode'"; 
$update_fields = array(   
     "member = 'Y'",
 );

$update_sql = 'UPDATE ' . $update_table
    . ' SET '   . implode(', ', $update_fields)
    . ' WHERE ' . $update_where;

     $nm_select = $update_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
if (isset($this->sc_temp_var_custCode)) {$_SESSION['var_custCode'] = $this->sc_temp_var_custCode;}
$_SESSION['scriptcase']['pdfreport_kartu']['contr_erro'] = 'off';
          $this->rm[$this->nm_grid_colunas] = sc_strip_script($this->rm[$this->nm_grid_colunas]);
          if ($this->rm[$this->nm_grid_colunas] === "") 
          { 
              $this->rm[$this->nm_grid_colunas] = "" ;  
          } 
          $this->rm[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->rm[$this->nm_grid_colunas]);
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
          $this->pasien[$this->nm_grid_colunas] = sc_strip_script($this->pasien[$this->nm_grid_colunas]);
          if ($this->pasien[$this->nm_grid_colunas] === "") 
          { 
              $this->pasien[$this->nm_grid_colunas] = "" ;  
          } 
          $this->pasien[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pasien[$this->nm_grid_colunas]);
          $this->tl[$this->nm_grid_colunas] = sc_strip_script($this->tl[$this->nm_grid_colunas]);
          if ($this->tl[$this->nm_grid_colunas] === "") 
          { 
              $this->tl[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $tl_x =  $this->tl[$this->nm_grid_colunas];
               nm_conv_limpa_dado($tl_x, "YYYY-MM-DD");
               if (is_numeric($tl_x) && strlen($tl_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->tl[$this->nm_grid_colunas], "YYYY-MM-DD");
                   $this->tl[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->tl[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tl[$this->nm_grid_colunas]);
            $cell_RM = array('posx' => '5', 'posy' => '38', 'data' => $this->rm[$this->nm_grid_colunas], 'width'      => '30', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_Barcode = array('posx' => '13.571828541664956', 'posy' => '17.494646874997795', 'data' => $this->barcode[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Pasien = array('posx' => '5', 'posy' => '34', 'data' => $this->pasien[$this->nm_grid_colunas], 'width'      => '30', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_TL = array('posx' => '5', 'posy' => '43', 'data' => $this->tl[$this->nm_grid_colunas], 'width'      => '30', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '11', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);


            $this->Pdf->SetFont($cell_RM['font_type'], $cell_RM['font_style'], $cell_RM['font_size']);
            $this->pdf_text_color($cell_RM['data'], $cell_RM['color_r'], $cell_RM['color_g'], $cell_RM['color_b']);
            if (!empty($cell_RM['posx']) && !empty($cell_RM['posy']))
            {
                $this->Pdf->SetXY($cell_RM['posx'], $cell_RM['posy']);
            }
            elseif (!empty($cell_RM['posx']))
            {
                $this->Pdf->SetX($cell_RM['posx']);
            }
            elseif (!empty($cell_RM['posy']))
            {
                $this->Pdf->SetY($cell_RM['posy']);
            }
            $this->Pdf->Cell($cell_RM['width'], 0, $cell_RM['data'], 0, 0, $cell_RM['align']);

            if (isset($cell_Barcode['data']) && !empty($cell_Barcode['data']) && is_file($cell_Barcode['data']))
            {
                $Finfo_img = finfo_open(FILEINFO_MIME_TYPE);
                $Tipo_img  = finfo_file($Finfo_img, $cell_Barcode['data']);
                finfo_close($Finfo_img);
                if (substr($Tipo_img, 0, 5) == "image")
                {
                    $this->Pdf->Image($cell_Barcode['data'], $cell_Barcode['posx'], $cell_Barcode['posy'], 0, 0);
                }
            }

            $this->Pdf->SetFont($cell_Pasien['font_type'], $cell_Pasien['font_style'], $cell_Pasien['font_size']);
            $this->pdf_text_color($cell_Pasien['data'], $cell_Pasien['color_r'], $cell_Pasien['color_g'], $cell_Pasien['color_b']);
            if (!empty($cell_Pasien['posx']) && !empty($cell_Pasien['posy']))
            {
                $this->Pdf->SetXY($cell_Pasien['posx'], $cell_Pasien['posy']);
            }
            elseif (!empty($cell_Pasien['posx']))
            {
                $this->Pdf->SetX($cell_Pasien['posx']);
            }
            elseif (!empty($cell_Pasien['posy']))
            {
                $this->Pdf->SetY($cell_Pasien['posy']);
            }
            $this->Pdf->Cell($cell_Pasien['width'], 0, $cell_Pasien['data'], 0, 0, $cell_Pasien['align']);

            $this->Pdf->SetFont($cell_TL['font_type'], $cell_TL['font_style'], $cell_TL['font_size']);
            $this->pdf_text_color($cell_TL['data'], $cell_TL['color_r'], $cell_TL['color_g'], $cell_TL['color_b']);
            if (!empty($cell_TL['posx']) && !empty($cell_TL['posy']))
            {
                $this->Pdf->SetXY($cell_TL['posx'], $cell_TL['posy']);
            }
            elseif (!empty($cell_TL['posx']))
            {
                $this->Pdf->SetX($cell_TL['posx']);
            }
            elseif (!empty($cell_TL['posy']))
            {
                $this->Pdf->SetY($cell_TL['posy']);
            }
            $this->Pdf->Cell($cell_TL['width'], 0, $cell_TL['data'], 0, 0, $cell_TL['align']);

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
