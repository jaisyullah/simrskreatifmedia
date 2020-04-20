<?php
class cetak_form_pasien_grid
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
   var $array_sc_field_0 = array();
   var $array_alergi = array();
   var $array_alergi2 = array();
   var $array_alergi3 = array();
   var $array_perusahaan = array();
   var $sc_field_0 = array();
   var $alergi = array();
   var $alergi2 = array();
   var $alergi3 = array();
   var $cetak_date = array();
   var $gelar = array();
   var $nama = array();
   var $perusahaan = array();
   var $rm1 = array();
   var $rm2 = array();
   var $rm3 = array();
   var $rm4 = array();
   var $rm5 = array();
   var $rm6 = array();
   var $custcode = array();
   var $name = array();
   var $salut = array();
   var $address = array();
   var $city = array();
   var $postcode = array();
   var $birthdate = array();
   var $phone = array();
   var $hp = array();
   var $spouse = array();
   var $sex = array();
   var $type = array();
   var $typename = array();
   var $bbtb = array();
   var $partus = array();
   var $hamil = array();
   var $email = array();
   var $blood = array();
   var $location = array();
   var $mother = array();
   var $father = array();
   var $job = array();
   var $religion = array();
   var $birthplace = array();
   var $kelurahan = array();
   var $kecamatan = array();
   var $rt = array();
   var $rw = array();
   var $member = array();
   var $idno = array();
   var $jenis = array();
   var $expdate = array();
   var $photoname = array();
   var $tlc = array();
   var $bu = array();
   var $nip = array();
   var $instno = array();
   var $kelompokcode = array();
   var $kelompok = array();
   var $penanggung = array();
   var $registerdate = array();
   var $cardno = array();
   var $statusbl = array();
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
   $_SESSION['scriptcase']['cetak_form_pasien']['default_font'] = $this->default_font;
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
           if (in_array("cetak_form_pasien", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->name[0] = $Busca_temp['name']; 
       $tmp_pos = strpos($this->name[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->name[0]))
       {
           $this->name[0] = substr($this->name[0], 0, $tmp_pos);
       }
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['cetak_form_pasien']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['cetak_form_pasien']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['cetak_form_pasien']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['cetak_form_pasien']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['where_orig'] = " where custCode = '" . $_SESSION['var_custCode'] . "'";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT custCode, name, salut, address, city, postCode, str_replace (convert(char(10),birthDate,102), '.', '-') + ' ' + convert(char(8),birthDate,20), phone, hp, spouse, sex, type, typeName, bbtb, str_replace (convert(char(10),partus,102), '.', '-') + ' ' + convert(char(8),partus,20), hamil, email, blood, location, mother, father, job, religion, birthplace, kelurahan, kecamatan, rt, rw, member, idNo, jenis, str_replace (convert(char(10),expDate,102), '.', '-') + ' ' + convert(char(8),expDate,20), photoName, tlc, bu, nip, instNo, kelompokCode, kelompok, penanggung, str_replace (convert(char(10),registerDate,102), '.', '-') + ' ' + convert(char(8),registerDate,20), cardNo, statusBL from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT custCode, name, salut, address, city, postCode, birthDate, phone, hp, spouse, sex, type, typeName, bbtb, partus, hamil, email, blood, location, mother, father, job, religion, birthplace, kelurahan, kecamatan, rt, rw, member, idNo, jenis, expDate, photoName, tlc, bu, nip, instNo, kelompokCode, kelompok, penanggung, registerDate, cardNo, statusBL from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT custCode, name, salut, address, city, postCode, convert(char(23),birthDate,121), phone, hp, spouse, sex, type, typeName, bbtb, convert(char(23),partus,121), hamil, email, blood, location, mother, father, job, religion, birthplace, kelurahan, kecamatan, rt, rw, member, idNo, jenis, convert(char(23),expDate,121), photoName, tlc, bu, nip, instNo, kelompokCode, kelompok, penanggung, convert(char(23),registerDate,121), cardNo, statusBL from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT custCode, name, salut, address, city, postCode, birthDate, phone, hp, spouse, sex, type, typeName, bbtb, partus, hamil, email, blood, location, mother, father, job, religion, birthplace, kelurahan, kecamatan, rt, rw, member, idNo, jenis, expDate, photoName, tlc, bu, nip, instNo, kelompokCode, kelompok, penanggung, registerDate, cardNo, statusBL from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT custCode, name, salut, address, city, postCode, EXTEND(birthDate, YEAR TO FRACTION), phone, hp, spouse, sex, type, typeName, bbtb, EXTEND(partus, YEAR TO FRACTION), hamil, email, blood, location, mother, father, job, religion, birthplace, kelurahan, kecamatan, rt, rw, member, idNo, jenis, EXTEND(expDate, YEAR TO FRACTION), photoName, tlc, bu, nip, instNo, kelompokCode, kelompok, penanggung, EXTEND(registerDate, YEAR TO FRACTION), cardNo, statusBL from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT custCode, name, salut, address, city, postCode, birthDate, phone, hp, spouse, sex, type, typeName, bbtb, partus, hamil, email, blood, location, mother, father, job, religion, birthplace, kelurahan, kecamatan, rt, rw, member, idNo, jenis, expDate, photoName, tlc, bu, nip, instNo, kelompokCode, kelompok, penanggung, registerDate, cardNo, statusBL from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['order_grid'] = $nmgp_order_by;
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
         $this->Pdf->SetFont($this->default_font, $this->default_style, 10, $this->def_TTF);
     }
     else
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 10);
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
   $this->Pdf->Image($this->NM_raiz_img . $this->Ini->path_img_global . "/grp__NM__bg__NM__Formulir_Pasien.jpg", "0.000000", "0.000000", "210", "297", '', '', '', false, 300, '', false, false, 0);
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['custcode'] = "Cust Code";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['name'] = "Name";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['salut'] = "Salut";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['address'] = "Address";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['city'] = "City";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['postcode'] = "Post Code";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['birthdate'] = "Birth Date";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['phone'] = "Phone";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['hp'] = "Hp";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['spouse'] = "Spouse";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['sex'] = "Sex";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['type'] = "Type";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['typename'] = "Type Name";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['bbtb'] = "Bbtb";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['partus'] = "Partus";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['hamil'] = "Hamil";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['email'] = "Email";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['blood'] = "Blood";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['location'] = "Location";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['mother'] = "Mother";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['father'] = "Father";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['job'] = "Job";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['religion'] = "Religion";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['birthplace'] = "Birthplace";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['kelurahan'] = "Kelurahan";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['kecamatan'] = "Kecamatan";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['rt'] = "Rt";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['rw'] = "Rw";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['member'] = "Member";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['idno'] = "Id No";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['jenis'] = "Jenis";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['expdate'] = "Exp Date";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['photoname'] = "Photo Name";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['tlc'] = "Tlc";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['bu'] = "Bu";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['nip'] = "Nip";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['instno'] = "Inst No";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['kelompokcode'] = "Kelompok Code";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['kelompok'] = "Kelompok";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['penanggung'] = "Penanggung";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['registerdate'] = "Register Date";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['cardno'] = "Card No";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['statusbl'] = "Status BL";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['sc_field_0'] = "Nama Lengkap";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['alergi'] = "alergi";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['alergi2'] = "alergi2";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['alergi3'] = "alergi3";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['cetak_date'] = "cetak_date";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['gelar'] = "gelar";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['nama'] = "nama";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['perusahaan'] = "perusahaan";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['rm1'] = "rm1";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['rm2'] = "rm2";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['rm3'] = "rm3";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['rm4'] = "rm4";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['rm5'] = "rm5";
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['labels']['rm6'] = "rm6";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['cetak_form_pasien']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['cetak_form_pasien']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['cetak_form_pasien']['lig_edit'];
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
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['cetak_form_pasien']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->custcode[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->name[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->salut[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->address[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->city[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->postcode[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->birthdate[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->phone[$this->nm_grid_colunas] = $this->rs_grid->fields[7] ;  
          $this->hp[$this->nm_grid_colunas] = $this->rs_grid->fields[8] ;  
          $this->spouse[$this->nm_grid_colunas] = $this->rs_grid->fields[9] ;  
          $this->sex[$this->nm_grid_colunas] = $this->rs_grid->fields[10] ;  
          $this->type[$this->nm_grid_colunas] = $this->rs_grid->fields[11] ;  
          $this->typename[$this->nm_grid_colunas] = $this->rs_grid->fields[12] ;  
          $this->bbtb[$this->nm_grid_colunas] = $this->rs_grid->fields[13] ;  
          $this->partus[$this->nm_grid_colunas] = $this->rs_grid->fields[14] ;  
          $this->hamil[$this->nm_grid_colunas] = $this->rs_grid->fields[15] ;  
          $this->hamil[$this->nm_grid_colunas] = (string)$this->hamil[$this->nm_grid_colunas];
          $this->email[$this->nm_grid_colunas] = $this->rs_grid->fields[16] ;  
          $this->blood[$this->nm_grid_colunas] = $this->rs_grid->fields[17] ;  
          $this->location[$this->nm_grid_colunas] = $this->rs_grid->fields[18] ;  
          $this->mother[$this->nm_grid_colunas] = $this->rs_grid->fields[19] ;  
          $this->father[$this->nm_grid_colunas] = $this->rs_grid->fields[20] ;  
          $this->job[$this->nm_grid_colunas] = $this->rs_grid->fields[21] ;  
          $this->religion[$this->nm_grid_colunas] = $this->rs_grid->fields[22] ;  
          $this->birthplace[$this->nm_grid_colunas] = $this->rs_grid->fields[23] ;  
          $this->kelurahan[$this->nm_grid_colunas] = $this->rs_grid->fields[24] ;  
          $this->kecamatan[$this->nm_grid_colunas] = $this->rs_grid->fields[25] ;  
          $this->rt[$this->nm_grid_colunas] = $this->rs_grid->fields[26] ;  
          $this->rw[$this->nm_grid_colunas] = $this->rs_grid->fields[27] ;  
          $this->member[$this->nm_grid_colunas] = $this->rs_grid->fields[28] ;  
          $this->idno[$this->nm_grid_colunas] = $this->rs_grid->fields[29] ;  
          $this->jenis[$this->nm_grid_colunas] = $this->rs_grid->fields[30] ;  
          $this->expdate[$this->nm_grid_colunas] = $this->rs_grid->fields[31] ;  
          $this->photoname[$this->nm_grid_colunas] = $this->rs_grid->fields[32] ;  
          $this->tlc[$this->nm_grid_colunas] = $this->rs_grid->fields[33] ;  
          $this->bu[$this->nm_grid_colunas] = $this->rs_grid->fields[34] ;  
          $this->nip[$this->nm_grid_colunas] = $this->rs_grid->fields[35] ;  
          $this->instno[$this->nm_grid_colunas] = $this->rs_grid->fields[36] ;  
          $this->kelompokcode[$this->nm_grid_colunas] = $this->rs_grid->fields[37] ;  
          $this->kelompok[$this->nm_grid_colunas] = $this->rs_grid->fields[38] ;  
          $this->penanggung[$this->nm_grid_colunas] = $this->rs_grid->fields[39] ;  
          $this->registerdate[$this->nm_grid_colunas] = $this->rs_grid->fields[40] ;  
          $this->cardno[$this->nm_grid_colunas] = $this->rs_grid->fields[41] ;  
          $this->statusbl[$this->nm_grid_colunas] = $this->rs_grid->fields[42] ;  
          $this->sc_field_0[$this->nm_grid_colunas] = "";
          $this->alergi[$this->nm_grid_colunas] = "";
          $this->alergi2[$this->nm_grid_colunas] = "";
          $this->alergi3[$this->nm_grid_colunas] = "";
          $this->cetak_date[$this->nm_grid_colunas] = "";
          $this->gelar[$this->nm_grid_colunas] = "";
          $this->nama[$this->nm_grid_colunas] = "";
          $this->perusahaan[$this->nm_grid_colunas] = "";
          $this->rm1[$this->nm_grid_colunas] = "";
          $this->rm2[$this->nm_grid_colunas] = "";
          $this->rm3[$this->nm_grid_colunas] = "";
          $this->rm4[$this->nm_grid_colunas] = "";
          $this->rm5[$this->nm_grid_colunas] = "";
          $this->rm6[$this->nm_grid_colunas] = "";
          $this->Lookup->lookup_sc_field_0($this->sc_field_0[$this->nm_grid_colunas], $this->custcode[$this->nm_grid_colunas], $this->array_sc_field_0); 
          $this->Lookup->lookup_alergi($this->alergi[$this->nm_grid_colunas], $this->custcode[$this->nm_grid_colunas], $this->array_alergi); 
          $this->Lookup->lookup_alergi2($this->alergi2[$this->nm_grid_colunas], $this->custcode[$this->nm_grid_colunas], $this->array_alergi2); 
          $this->Lookup->lookup_alergi3($this->alergi3[$this->nm_grid_colunas], $this->custcode[$this->nm_grid_colunas], $this->array_alergi3); 
          $this->Lookup->lookup_perusahaan($this->perusahaan[$this->nm_grid_colunas], $this->bu[$this->nm_grid_colunas], $this->array_perusahaan); 
          $_SESSION['scriptcase']['cetak_form_pasien']['contr_erro'] = 'on';
 $this->rm1[$this->nm_grid_colunas]  = substr($this->custcode[$this->nm_grid_colunas] , 0, 1);
$this->rm2[$this->nm_grid_colunas]  = substr($this->custcode[$this->nm_grid_colunas] , 1, 1);
$this->rm3[$this->nm_grid_colunas]  = substr($this->custcode[$this->nm_grid_colunas] , 2, 1);
$this->rm4[$this->nm_grid_colunas]  = substr($this->custcode[$this->nm_grid_colunas] , 3, 1);
$this->rm5[$this->nm_grid_colunas]  = substr($this->custcode[$this->nm_grid_colunas] , 4, 1);
$this->rm6[$this->nm_grid_colunas]  = substr($this->custcode[$this->nm_grid_colunas] , 5, 1);

$bulan = array(
                '01' => 'JANUARI',
                '02' => 'FEBRUARI',
                '03' => 'MARET',
                '04' => 'APRIL',
                '05' => 'MEI',
                '06' => 'JUNI',
                '07' => 'JULI',
                '08' => 'AGUSTUS',
                '09' => 'SEPTEMBER',
                '10' => 'OKTOBER',
                '11' => 'NOVEMBER',
                '12' => 'DESEMBER',
        );
$this->cetak_date[$this->nm_grid_colunas]  = date('d').' '.($bulan[date('m')]).' '.date('Y');
$_SESSION['scriptcase']['cetak_form_pasien']['contr_erro'] = 'off';
          $this->custcode[$this->nm_grid_colunas] = sc_strip_script($this->custcode[$this->nm_grid_colunas]);
          if ($this->custcode[$this->nm_grid_colunas] === "") 
          { 
              $this->custcode[$this->nm_grid_colunas] = "" ;  
          } 
          $this->custcode[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->custcode[$this->nm_grid_colunas]);
          $this->name[$this->nm_grid_colunas] = sc_strip_script($this->name[$this->nm_grid_colunas]);
          if ($this->name[$this->nm_grid_colunas] === "") 
          { 
              $this->name[$this->nm_grid_colunas] = "" ;  
          } 
          $this->name[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->name[$this->nm_grid_colunas]);
          $this->salut[$this->nm_grid_colunas] = sc_strip_script($this->salut[$this->nm_grid_colunas]);
          if ($this->salut[$this->nm_grid_colunas] === "") 
          { 
              $this->salut[$this->nm_grid_colunas] = "" ;  
          } 
          $this->salut[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->salut[$this->nm_grid_colunas]);
          $this->address[$this->nm_grid_colunas] = sc_strip_script($this->address[$this->nm_grid_colunas]);
          if ($this->address[$this->nm_grid_colunas] === "") 
          { 
              $this->address[$this->nm_grid_colunas] = "" ;  
          } 
          $this->address[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->address[$this->nm_grid_colunas]);
          $this->city[$this->nm_grid_colunas] = sc_strip_script($this->city[$this->nm_grid_colunas]);
          if ($this->city[$this->nm_grid_colunas] === "") 
          { 
              $this->city[$this->nm_grid_colunas] = "" ;  
          } 
          $this->city[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->city[$this->nm_grid_colunas]);
          $this->postcode[$this->nm_grid_colunas] = sc_strip_script($this->postcode[$this->nm_grid_colunas]);
          if ($this->postcode[$this->nm_grid_colunas] === "") 
          { 
              $this->postcode[$this->nm_grid_colunas] = "" ;  
          } 
          $this->postcode[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->postcode[$this->nm_grid_colunas]);
          $this->birthdate[$this->nm_grid_colunas] = sc_strip_script($this->birthdate[$this->nm_grid_colunas]);
          if ($this->birthdate[$this->nm_grid_colunas] === "") 
          { 
              $this->birthdate[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $birthdate_x =  $this->birthdate[$this->nm_grid_colunas];
               nm_conv_limpa_dado($birthdate_x, "YYYY-MM-DD");
               if (is_numeric($birthdate_x) && strlen($birthdate_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->birthdate[$this->nm_grid_colunas], "YYYY-MM-DD");
                   $this->birthdate[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->birthdate[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->birthdate[$this->nm_grid_colunas]);
          $this->phone[$this->nm_grid_colunas] = sc_strip_script($this->phone[$this->nm_grid_colunas]);
          if ($this->phone[$this->nm_grid_colunas] === "") 
          { 
              $this->phone[$this->nm_grid_colunas] = "" ;  
          } 
          $this->phone[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->phone[$this->nm_grid_colunas]);
          $this->hp[$this->nm_grid_colunas] = sc_strip_script($this->hp[$this->nm_grid_colunas]);
          if ($this->hp[$this->nm_grid_colunas] === "") 
          { 
              $this->hp[$this->nm_grid_colunas] = "" ;  
          } 
          $this->hp[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->hp[$this->nm_grid_colunas]);
          $this->spouse[$this->nm_grid_colunas] = sc_strip_script($this->spouse[$this->nm_grid_colunas]);
          if ($this->spouse[$this->nm_grid_colunas] === "") 
          { 
              $this->spouse[$this->nm_grid_colunas] = "" ;  
          } 
          $this->spouse[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->spouse[$this->nm_grid_colunas]);
          $this->sex[$this->nm_grid_colunas] = sc_strip_script($this->sex[$this->nm_grid_colunas]);
          if ($this->sex[$this->nm_grid_colunas] === "") 
          { 
              $this->sex[$this->nm_grid_colunas] = "" ;  
          } 
          $this->sex[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->sex[$this->nm_grid_colunas]);
          $this->type[$this->nm_grid_colunas] = sc_strip_script($this->type[$this->nm_grid_colunas]);
          if ($this->type[$this->nm_grid_colunas] === "") 
          { 
              $this->type[$this->nm_grid_colunas] = "" ;  
          } 
          $this->type[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->type[$this->nm_grid_colunas]);
          $this->typename[$this->nm_grid_colunas] = sc_strip_script($this->typename[$this->nm_grid_colunas]);
          if ($this->typename[$this->nm_grid_colunas] === "") 
          { 
              $this->typename[$this->nm_grid_colunas] = "" ;  
          } 
          $this->typename[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->typename[$this->nm_grid_colunas]);
          $this->bbtb[$this->nm_grid_colunas] = sc_strip_script($this->bbtb[$this->nm_grid_colunas]);
          if ($this->bbtb[$this->nm_grid_colunas] === "") 
          { 
              $this->bbtb[$this->nm_grid_colunas] = "" ;  
          } 
          $this->bbtb[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->bbtb[$this->nm_grid_colunas]);
          $this->partus[$this->nm_grid_colunas] = sc_strip_script($this->partus[$this->nm_grid_colunas]);
          if ($this->partus[$this->nm_grid_colunas] === "") 
          { 
              $this->partus[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               if (substr($this->partus[$this->nm_grid_colunas], 10, 1) == "-") 
               { 
                  $this->partus[$this->nm_grid_colunas] = substr($this->partus[$this->nm_grid_colunas], 0, 10) . " " . substr($this->partus[$this->nm_grid_colunas], 11);
               } 
               if (substr($this->partus[$this->nm_grid_colunas], 13, 1) == ".") 
               { 
                  $this->partus[$this->nm_grid_colunas] = substr($this->partus[$this->nm_grid_colunas], 0, 13) . ":" . substr($this->partus[$this->nm_grid_colunas], 14, 2) . ":" . substr($this->partus[$this->nm_grid_colunas], 17);
               } 
               $partus_x =  $this->partus[$this->nm_grid_colunas];
               nm_conv_limpa_dado($partus_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($partus_x) && strlen($partus_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->partus[$this->nm_grid_colunas], "YYYY-MM-DD HH:II:SS");
                   $this->partus[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->partus[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->partus[$this->nm_grid_colunas]);
          $this->hamil[$this->nm_grid_colunas] = sc_strip_script($this->hamil[$this->nm_grid_colunas]);
          if ($this->hamil[$this->nm_grid_colunas] === "") 
          { 
              $this->hamil[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->hamil[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->hamil[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->hamil[$this->nm_grid_colunas]);
          $this->email[$this->nm_grid_colunas] = sc_strip_script($this->email[$this->nm_grid_colunas]);
          if ($this->email[$this->nm_grid_colunas] === "") 
          { 
              $this->email[$this->nm_grid_colunas] = "" ;  
          } 
          $this->email[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->email[$this->nm_grid_colunas]);
          $this->blood[$this->nm_grid_colunas] = sc_strip_script($this->blood[$this->nm_grid_colunas]);
          if ($this->blood[$this->nm_grid_colunas] === "") 
          { 
              $this->blood[$this->nm_grid_colunas] = "" ;  
          } 
          $this->blood[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->blood[$this->nm_grid_colunas]);
          $this->location[$this->nm_grid_colunas] = sc_strip_script($this->location[$this->nm_grid_colunas]);
          if ($this->location[$this->nm_grid_colunas] === "") 
          { 
              $this->location[$this->nm_grid_colunas] = "" ;  
          } 
          $this->location[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->location[$this->nm_grid_colunas]);
          $this->mother[$this->nm_grid_colunas] = sc_strip_script($this->mother[$this->nm_grid_colunas]);
          if ($this->mother[$this->nm_grid_colunas] === "") 
          { 
              $this->mother[$this->nm_grid_colunas] = "" ;  
          } 
          $this->mother[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->mother[$this->nm_grid_colunas]);
          $this->father[$this->nm_grid_colunas] = sc_strip_script($this->father[$this->nm_grid_colunas]);
          if ($this->father[$this->nm_grid_colunas] === "") 
          { 
              $this->father[$this->nm_grid_colunas] = "" ;  
          } 
          $this->father[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->father[$this->nm_grid_colunas]);
          $this->job[$this->nm_grid_colunas] = sc_strip_script($this->job[$this->nm_grid_colunas]);
          if ($this->job[$this->nm_grid_colunas] === "") 
          { 
              $this->job[$this->nm_grid_colunas] = "" ;  
          } 
          $this->job[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->job[$this->nm_grid_colunas]);
          $this->religion[$this->nm_grid_colunas] = sc_strip_script($this->religion[$this->nm_grid_colunas]);
          if ($this->religion[$this->nm_grid_colunas] === "") 
          { 
              $this->religion[$this->nm_grid_colunas] = "" ;  
          } 
          $this->religion[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->religion[$this->nm_grid_colunas]);
          $this->birthplace[$this->nm_grid_colunas] = sc_strip_script($this->birthplace[$this->nm_grid_colunas]);
          if ($this->birthplace[$this->nm_grid_colunas] === "") 
          { 
              $this->birthplace[$this->nm_grid_colunas] = "" ;  
          } 
          $this->birthplace[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->birthplace[$this->nm_grid_colunas]);
          $this->kelurahan[$this->nm_grid_colunas] = sc_strip_script($this->kelurahan[$this->nm_grid_colunas]);
          if ($this->kelurahan[$this->nm_grid_colunas] === "") 
          { 
              $this->kelurahan[$this->nm_grid_colunas] = "" ;  
          } 
          $this->kelurahan[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->kelurahan[$this->nm_grid_colunas]);
          $this->kecamatan[$this->nm_grid_colunas] = sc_strip_script($this->kecamatan[$this->nm_grid_colunas]);
          if ($this->kecamatan[$this->nm_grid_colunas] === "") 
          { 
              $this->kecamatan[$this->nm_grid_colunas] = "" ;  
          } 
          $this->kecamatan[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->kecamatan[$this->nm_grid_colunas]);
          $this->rt[$this->nm_grid_colunas] = sc_strip_script($this->rt[$this->nm_grid_colunas]);
          if ($this->rt[$this->nm_grid_colunas] === "") 
          { 
              $this->rt[$this->nm_grid_colunas] = "" ;  
          } 
          $this->rt[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->rt[$this->nm_grid_colunas]);
          $this->rw[$this->nm_grid_colunas] = sc_strip_script($this->rw[$this->nm_grid_colunas]);
          if ($this->rw[$this->nm_grid_colunas] === "") 
          { 
              $this->rw[$this->nm_grid_colunas] = "" ;  
          } 
          $this->rw[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->rw[$this->nm_grid_colunas]);
          $this->member[$this->nm_grid_colunas] = sc_strip_script($this->member[$this->nm_grid_colunas]);
          if ($this->member[$this->nm_grid_colunas] === "") 
          { 
              $this->member[$this->nm_grid_colunas] = "" ;  
          } 
          $this->member[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->member[$this->nm_grid_colunas]);
          $this->idno[$this->nm_grid_colunas] = sc_strip_script($this->idno[$this->nm_grid_colunas]);
          if ($this->idno[$this->nm_grid_colunas] === "") 
          { 
              $this->idno[$this->nm_grid_colunas] = "" ;  
          } 
          $this->idno[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->idno[$this->nm_grid_colunas]);
          $this->jenis[$this->nm_grid_colunas] = sc_strip_script($this->jenis[$this->nm_grid_colunas]);
          if ($this->jenis[$this->nm_grid_colunas] === "") 
          { 
              $this->jenis[$this->nm_grid_colunas] = "" ;  
          } 
          $this->jenis[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->jenis[$this->nm_grid_colunas]);
          $this->expdate[$this->nm_grid_colunas] = sc_strip_script($this->expdate[$this->nm_grid_colunas]);
          if ($this->expdate[$this->nm_grid_colunas] === "") 
          { 
              $this->expdate[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $expdate_x =  $this->expdate[$this->nm_grid_colunas];
               nm_conv_limpa_dado($expdate_x, "YYYY-MM-DD");
               if (is_numeric($expdate_x) && strlen($expdate_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->expdate[$this->nm_grid_colunas], "YYYY-MM-DD");
                   $this->expdate[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->expdate[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->expdate[$this->nm_grid_colunas]);
          $this->photoname[$this->nm_grid_colunas] = sc_strip_script($this->photoname[$this->nm_grid_colunas]);
          if ($this->photoname[$this->nm_grid_colunas] === "") 
          { 
              $this->photoname[$this->nm_grid_colunas] = "" ;  
          } 
          $this->photoname[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->photoname[$this->nm_grid_colunas]);
          $this->tlc[$this->nm_grid_colunas] = sc_strip_script($this->tlc[$this->nm_grid_colunas]);
          if ($this->tlc[$this->nm_grid_colunas] === "") 
          { 
              $this->tlc[$this->nm_grid_colunas] = "" ;  
          } 
          $this->tlc[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tlc[$this->nm_grid_colunas]);
          $this->bu[$this->nm_grid_colunas] = sc_strip_script($this->bu[$this->nm_grid_colunas]);
          if ($this->bu[$this->nm_grid_colunas] === "") 
          { 
              $this->bu[$this->nm_grid_colunas] = "" ;  
          } 
          $this->bu[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->bu[$this->nm_grid_colunas]);
          $this->nip[$this->nm_grid_colunas] = sc_strip_script($this->nip[$this->nm_grid_colunas]);
          if ($this->nip[$this->nm_grid_colunas] === "") 
          { 
              $this->nip[$this->nm_grid_colunas] = "" ;  
          } 
          $this->nip[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->nip[$this->nm_grid_colunas]);
          $this->instno[$this->nm_grid_colunas] = sc_strip_script($this->instno[$this->nm_grid_colunas]);
          if ($this->instno[$this->nm_grid_colunas] === "") 
          { 
              $this->instno[$this->nm_grid_colunas] = "" ;  
          } 
          $this->instno[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->instno[$this->nm_grid_colunas]);
          $this->kelompokcode[$this->nm_grid_colunas] = sc_strip_script($this->kelompokcode[$this->nm_grid_colunas]);
          if ($this->kelompokcode[$this->nm_grid_colunas] === "") 
          { 
              $this->kelompokcode[$this->nm_grid_colunas] = "" ;  
          } 
          $this->kelompokcode[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->kelompokcode[$this->nm_grid_colunas]);
          $this->kelompok[$this->nm_grid_colunas] = sc_strip_script($this->kelompok[$this->nm_grid_colunas]);
          if ($this->kelompok[$this->nm_grid_colunas] === "") 
          { 
              $this->kelompok[$this->nm_grid_colunas] = "" ;  
          } 
          $this->kelompok[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->kelompok[$this->nm_grid_colunas]);
          $this->penanggung[$this->nm_grid_colunas] = sc_strip_script($this->penanggung[$this->nm_grid_colunas]);
          if ($this->penanggung[$this->nm_grid_colunas] === "") 
          { 
              $this->penanggung[$this->nm_grid_colunas] = "" ;  
          } 
          $this->penanggung[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->penanggung[$this->nm_grid_colunas]);
          $this->registerdate[$this->nm_grid_colunas] = sc_strip_script($this->registerdate[$this->nm_grid_colunas]);
          if ($this->registerdate[$this->nm_grid_colunas] === "") 
          { 
              $this->registerdate[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               if (substr($this->registerdate[$this->nm_grid_colunas], 10, 1) == "-") 
               { 
                  $this->registerdate[$this->nm_grid_colunas] = substr($this->registerdate[$this->nm_grid_colunas], 0, 10) . " " . substr($this->registerdate[$this->nm_grid_colunas], 11);
               } 
               if (substr($this->registerdate[$this->nm_grid_colunas], 13, 1) == ".") 
               { 
                  $this->registerdate[$this->nm_grid_colunas] = substr($this->registerdate[$this->nm_grid_colunas], 0, 13) . ":" . substr($this->registerdate[$this->nm_grid_colunas], 14, 2) . ":" . substr($this->registerdate[$this->nm_grid_colunas], 17);
               } 
               $registerdate_x =  $this->registerdate[$this->nm_grid_colunas];
               nm_conv_limpa_dado($registerdate_x, "YYYY-MM-DD HH:II:SS");
               if (is_numeric($registerdate_x) && strlen($registerdate_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->registerdate[$this->nm_grid_colunas], "YYYY-MM-DD HH:II:SS");
                   $this->registerdate[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->registerdate[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->registerdate[$this->nm_grid_colunas]);
          $this->cardno[$this->nm_grid_colunas] = sc_strip_script($this->cardno[$this->nm_grid_colunas]);
          if ($this->cardno[$this->nm_grid_colunas] === "") 
          { 
              $this->cardno[$this->nm_grid_colunas] = "" ;  
          } 
          $this->cardno[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->cardno[$this->nm_grid_colunas]);
          $this->statusbl[$this->nm_grid_colunas] = sc_strip_script($this->statusbl[$this->nm_grid_colunas]);
          if ($this->statusbl[$this->nm_grid_colunas] === "") 
          { 
              $this->statusbl[$this->nm_grid_colunas] = "" ;  
          } 
          $this->statusbl[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->statusbl[$this->nm_grid_colunas]);
          $this->Lookup->lookup_sc_field_0($this->sc_field_0[$this->nm_grid_colunas], $this->custcode[$this->nm_grid_colunas], $this->array_sc_field_0); 
          $this->sc_field_0[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->sc_field_0[$this->nm_grid_colunas]);
          $this->Lookup->lookup_alergi($this->alergi[$this->nm_grid_colunas], $this->custcode[$this->nm_grid_colunas], $this->array_alergi); 
          $this->alergi[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->alergi[$this->nm_grid_colunas]);
          $this->Lookup->lookup_alergi2($this->alergi2[$this->nm_grid_colunas], $this->custcode[$this->nm_grid_colunas], $this->array_alergi2); 
          $this->alergi2[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->alergi2[$this->nm_grid_colunas]);
          $this->Lookup->lookup_alergi3($this->alergi3[$this->nm_grid_colunas], $this->custcode[$this->nm_grid_colunas], $this->array_alergi3); 
          $this->alergi3[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->alergi3[$this->nm_grid_colunas]);
          if ($this->cetak_date[$this->nm_grid_colunas] === "") 
          { 
              $this->cetak_date[$this->nm_grid_colunas] = "" ;  
          } 
          $this->cetak_date[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->cetak_date[$this->nm_grid_colunas]);
          if ($this->gelar[$this->nm_grid_colunas] === "") 
          { 
              $this->gelar[$this->nm_grid_colunas] = "" ;  
          } 
          $this->gelar[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->gelar[$this->nm_grid_colunas]);
          if ($this->nama[$this->nm_grid_colunas] === "") 
          { 
              $this->nama[$this->nm_grid_colunas] = "" ;  
          } 
          $this->nama[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->nama[$this->nm_grid_colunas]);
          $this->Lookup->lookup_perusahaan($this->perusahaan[$this->nm_grid_colunas], $this->bu[$this->nm_grid_colunas], $this->array_perusahaan); 
          $this->perusahaan[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->perusahaan[$this->nm_grid_colunas]);
          if ($this->rm1[$this->nm_grid_colunas] === "") 
          { 
              $this->rm1[$this->nm_grid_colunas] = "" ;  
          } 
          $this->rm1[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->rm1[$this->nm_grid_colunas]);
          if ($this->rm2[$this->nm_grid_colunas] === "") 
          { 
              $this->rm2[$this->nm_grid_colunas] = "" ;  
          } 
          $this->rm2[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->rm2[$this->nm_grid_colunas]);
          if ($this->rm3[$this->nm_grid_colunas] === "") 
          { 
              $this->rm3[$this->nm_grid_colunas] = "" ;  
          } 
          $this->rm3[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->rm3[$this->nm_grid_colunas]);
          if ($this->rm4[$this->nm_grid_colunas] === "") 
          { 
              $this->rm4[$this->nm_grid_colunas] = "" ;  
          } 
          $this->rm4[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->rm4[$this->nm_grid_colunas]);
          if ($this->rm5[$this->nm_grid_colunas] === "") 
          { 
              $this->rm5[$this->nm_grid_colunas] = "" ;  
          } 
          $this->rm5[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->rm5[$this->nm_grid_colunas]);
          if ($this->rm6[$this->nm_grid_colunas] === "") 
          { 
              $this->rm6[$this->nm_grid_colunas] = "" ;  
          } 
          $this->rm6[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->rm6[$this->nm_grid_colunas]);
            $cell_address = array('posx' => '63.46904374999199', 'posy' => '112.75668541665245', 'data' => $this->address[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_city = array('posx' => '177', 'posy' => '119.00085208331834', 'data' => $this->city[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_birthDate = array('posx' => '130', 'posy' => '70.1852270833245', 'data' => $this->birthdate[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_phone = array('posx' => '79', 'posy' => '150', 'data' => $this->phone[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_hp = array('posx' => '125', 'posy' => '150', 'data' => $this->hp[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_spouse = array('posx' => '64', 'posy' => '94.5', 'data' => $this->spouse[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sex = array('posx' => '64', 'posy' => '76.5', 'data' => $this->sex[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_email = array('posx' => '64', 'posy' => '155.5', 'data' => $this->email[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_blood = array('posx' => '64', 'posy' => '161.57654374997963', 'data' => $this->blood[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_mother = array('posx' => '64', 'posy' => '82.5', 'data' => $this->mother[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_father = array('posx' => '64', 'posy' => '88.5', 'data' => $this->father[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_job = array('posx' => '64', 'posy' => '168.03237708331213', 'data' => $this->job[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_religion = array('posx' => '64', 'posy' => '100.5', 'data' => $this->religion[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_birthplace = array('posx' => '64', 'posy' => '70.18522708332448', 'data' => $this->birthplace[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_kelurahan = array('posx' => '78', 'posy' => '119', 'data' => $this->kelurahan[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_kecamatan = array('posx' => '123', 'posy' => '119', 'data' => $this->kecamatan[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_rt = array('posx' => '167', 'posy' => '112.61539791665247', 'data' => $this->rt[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_rw = array('posx' => '190', 'posy' => '112.56248124998581', 'data' => $this->rw[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_idNo = array('posx' => '64', 'posy' => '125', 'data' => $this->idno[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_jenis = array('posx' => '24.837760416663535', 'posy' => '172.3265645833116', 'data' => $this->jenis[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_bu = array('posx' => '64', 'posy' => '173.7034562499781', 'data' => $this->bu[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_instNo = array('posx' => '64', 'posy' => '186', 'data' => $this->instno[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_rm1 = array('posx' => '157', 'posy' => '46', 'data' => $this->rm1[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '13', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_rm2 = array('posx' => '165', 'posy' => '46', 'data' => $this->rm2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '13', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_rm3 = array('posx' => '173', 'posy' => '46', 'data' => $this->rm3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '13', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_rm4 = array('posx' => '180.5', 'posy' => '46', 'data' => $this->rm4[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '13', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_rm5 = array('posx' => '188.5', 'posy' => '46', 'data' => $this->rm5[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '13', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_rm6 = array('posx' => '196', 'posy' => '46', 'data' => $this->rm6[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '13', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_nama = array('posx' => '64', 'posy' => '64.5', 'data' => $this->name[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_gelar = array('posx' => '163', 'posy' => '64.5', 'data' => $this->salut[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_nama_bu = array('posx' => '64.25141666665856', 'posy' => '179.64070624997734', 'data' => $this->bu[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_penanggung = array('posx' => '64', 'posy' => '198', 'data' => $this->penanggung[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_perusahaan = array('posx' => '64', 'posy' => '179.65208333331069', 'data' => $this->perusahaan[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_cetak_date = array('posx' => '38', 'posy' => '256', 'data' => $this->cetak_date[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);


            $this->Pdf->SetFont($cell_address['font_type'], $cell_address['font_style'], $cell_address['font_size']);
            $this->pdf_text_color($cell_address['data'], $cell_address['color_r'], $cell_address['color_g'], $cell_address['color_b']);
            if (!empty($cell_address['posx']) && !empty($cell_address['posy']))
            {
                $this->Pdf->SetXY($cell_address['posx'], $cell_address['posy']);
            }
            elseif (!empty($cell_address['posx']))
            {
                $this->Pdf->SetX($cell_address['posx']);
            }
            elseif (!empty($cell_address['posy']))
            {
                $this->Pdf->SetY($cell_address['posy']);
            }
            $this->Pdf->Cell($cell_address['width'], 0, $cell_address['data'], 0, 0, $cell_address['align']);

            $this->Pdf->SetFont($cell_city['font_type'], $cell_city['font_style'], $cell_city['font_size']);
            $this->pdf_text_color($cell_city['data'], $cell_city['color_r'], $cell_city['color_g'], $cell_city['color_b']);
            if (!empty($cell_city['posx']) && !empty($cell_city['posy']))
            {
                $this->Pdf->SetXY($cell_city['posx'], $cell_city['posy']);
            }
            elseif (!empty($cell_city['posx']))
            {
                $this->Pdf->SetX($cell_city['posx']);
            }
            elseif (!empty($cell_city['posy']))
            {
                $this->Pdf->SetY($cell_city['posy']);
            }
            $this->Pdf->Cell($cell_city['width'], 0, $cell_city['data'], 0, 0, $cell_city['align']);

            $this->Pdf->SetFont($cell_birthDate['font_type'], $cell_birthDate['font_style'], $cell_birthDate['font_size']);
            $this->pdf_text_color($cell_birthDate['data'], $cell_birthDate['color_r'], $cell_birthDate['color_g'], $cell_birthDate['color_b']);
            if (!empty($cell_birthDate['posx']) && !empty($cell_birthDate['posy']))
            {
                $this->Pdf->SetXY($cell_birthDate['posx'], $cell_birthDate['posy']);
            }
            elseif (!empty($cell_birthDate['posx']))
            {
                $this->Pdf->SetX($cell_birthDate['posx']);
            }
            elseif (!empty($cell_birthDate['posy']))
            {
                $this->Pdf->SetY($cell_birthDate['posy']);
            }
            $this->Pdf->Cell($cell_birthDate['width'], 0, $cell_birthDate['data'], 0, 0, $cell_birthDate['align']);

            $this->Pdf->SetFont($cell_phone['font_type'], $cell_phone['font_style'], $cell_phone['font_size']);
            $this->pdf_text_color($cell_phone['data'], $cell_phone['color_r'], $cell_phone['color_g'], $cell_phone['color_b']);
            if (!empty($cell_phone['posx']) && !empty($cell_phone['posy']))
            {
                $this->Pdf->SetXY($cell_phone['posx'], $cell_phone['posy']);
            }
            elseif (!empty($cell_phone['posx']))
            {
                $this->Pdf->SetX($cell_phone['posx']);
            }
            elseif (!empty($cell_phone['posy']))
            {
                $this->Pdf->SetY($cell_phone['posy']);
            }
            $this->Pdf->Cell($cell_phone['width'], 0, $cell_phone['data'], 0, 0, $cell_phone['align']);

            $this->Pdf->SetFont($cell_hp['font_type'], $cell_hp['font_style'], $cell_hp['font_size']);
            $this->pdf_text_color($cell_hp['data'], $cell_hp['color_r'], $cell_hp['color_g'], $cell_hp['color_b']);
            if (!empty($cell_hp['posx']) && !empty($cell_hp['posy']))
            {
                $this->Pdf->SetXY($cell_hp['posx'], $cell_hp['posy']);
            }
            elseif (!empty($cell_hp['posx']))
            {
                $this->Pdf->SetX($cell_hp['posx']);
            }
            elseif (!empty($cell_hp['posy']))
            {
                $this->Pdf->SetY($cell_hp['posy']);
            }
            $this->Pdf->Cell($cell_hp['width'], 0, $cell_hp['data'], 0, 0, $cell_hp['align']);

            $this->Pdf->SetFont($cell_spouse['font_type'], $cell_spouse['font_style'], $cell_spouse['font_size']);
            $this->pdf_text_color($cell_spouse['data'], $cell_spouse['color_r'], $cell_spouse['color_g'], $cell_spouse['color_b']);
            if (!empty($cell_spouse['posx']) && !empty($cell_spouse['posy']))
            {
                $this->Pdf->SetXY($cell_spouse['posx'], $cell_spouse['posy']);
            }
            elseif (!empty($cell_spouse['posx']))
            {
                $this->Pdf->SetX($cell_spouse['posx']);
            }
            elseif (!empty($cell_spouse['posy']))
            {
                $this->Pdf->SetY($cell_spouse['posy']);
            }
            $this->Pdf->Cell($cell_spouse['width'], 0, $cell_spouse['data'], 0, 0, $cell_spouse['align']);

            $this->Pdf->SetFont($cell_sex['font_type'], $cell_sex['font_style'], $cell_sex['font_size']);
            $this->pdf_text_color($cell_sex['data'], $cell_sex['color_r'], $cell_sex['color_g'], $cell_sex['color_b']);
            if (!empty($cell_sex['posx']) && !empty($cell_sex['posy']))
            {
                $this->Pdf->SetXY($cell_sex['posx'], $cell_sex['posy']);
            }
            elseif (!empty($cell_sex['posx']))
            {
                $this->Pdf->SetX($cell_sex['posx']);
            }
            elseif (!empty($cell_sex['posy']))
            {
                $this->Pdf->SetY($cell_sex['posy']);
            }
            $this->Pdf->Cell($cell_sex['width'], 0, $cell_sex['data'], 0, 0, $cell_sex['align']);

            $this->Pdf->SetFont($cell_email['font_type'], $cell_email['font_style'], $cell_email['font_size']);
            $this->pdf_text_color($cell_email['data'], $cell_email['color_r'], $cell_email['color_g'], $cell_email['color_b']);
            if (!empty($cell_email['posx']) && !empty($cell_email['posy']))
            {
                $this->Pdf->SetXY($cell_email['posx'], $cell_email['posy']);
            }
            elseif (!empty($cell_email['posx']))
            {
                $this->Pdf->SetX($cell_email['posx']);
            }
            elseif (!empty($cell_email['posy']))
            {
                $this->Pdf->SetY($cell_email['posy']);
            }
            $this->Pdf->Cell($cell_email['width'], 0, $cell_email['data'], 0, 0, $cell_email['align']);

            $this->Pdf->SetFont($cell_blood['font_type'], $cell_blood['font_style'], $cell_blood['font_size']);
            $this->pdf_text_color($cell_blood['data'], $cell_blood['color_r'], $cell_blood['color_g'], $cell_blood['color_b']);
            if (!empty($cell_blood['posx']) && !empty($cell_blood['posy']))
            {
                $this->Pdf->SetXY($cell_blood['posx'], $cell_blood['posy']);
            }
            elseif (!empty($cell_blood['posx']))
            {
                $this->Pdf->SetX($cell_blood['posx']);
            }
            elseif (!empty($cell_blood['posy']))
            {
                $this->Pdf->SetY($cell_blood['posy']);
            }
            $this->Pdf->Cell($cell_blood['width'], 0, $cell_blood['data'], 0, 0, $cell_blood['align']);

            $this->Pdf->SetFont($cell_mother['font_type'], $cell_mother['font_style'], $cell_mother['font_size']);
            $this->pdf_text_color($cell_mother['data'], $cell_mother['color_r'], $cell_mother['color_g'], $cell_mother['color_b']);
            if (!empty($cell_mother['posx']) && !empty($cell_mother['posy']))
            {
                $this->Pdf->SetXY($cell_mother['posx'], $cell_mother['posy']);
            }
            elseif (!empty($cell_mother['posx']))
            {
                $this->Pdf->SetX($cell_mother['posx']);
            }
            elseif (!empty($cell_mother['posy']))
            {
                $this->Pdf->SetY($cell_mother['posy']);
            }
            $this->Pdf->Cell($cell_mother['width'], 0, $cell_mother['data'], 0, 0, $cell_mother['align']);

            $this->Pdf->SetFont($cell_father['font_type'], $cell_father['font_style'], $cell_father['font_size']);
            $this->pdf_text_color($cell_father['data'], $cell_father['color_r'], $cell_father['color_g'], $cell_father['color_b']);
            if (!empty($cell_father['posx']) && !empty($cell_father['posy']))
            {
                $this->Pdf->SetXY($cell_father['posx'], $cell_father['posy']);
            }
            elseif (!empty($cell_father['posx']))
            {
                $this->Pdf->SetX($cell_father['posx']);
            }
            elseif (!empty($cell_father['posy']))
            {
                $this->Pdf->SetY($cell_father['posy']);
            }
            $this->Pdf->Cell($cell_father['width'], 0, $cell_father['data'], 0, 0, $cell_father['align']);

            $this->Pdf->SetFont($cell_job['font_type'], $cell_job['font_style'], $cell_job['font_size']);
            $this->pdf_text_color($cell_job['data'], $cell_job['color_r'], $cell_job['color_g'], $cell_job['color_b']);
            if (!empty($cell_job['posx']) && !empty($cell_job['posy']))
            {
                $this->Pdf->SetXY($cell_job['posx'], $cell_job['posy']);
            }
            elseif (!empty($cell_job['posx']))
            {
                $this->Pdf->SetX($cell_job['posx']);
            }
            elseif (!empty($cell_job['posy']))
            {
                $this->Pdf->SetY($cell_job['posy']);
            }
            $this->Pdf->Cell($cell_job['width'], 0, $cell_job['data'], 0, 0, $cell_job['align']);

            $this->Pdf->SetFont($cell_religion['font_type'], $cell_religion['font_style'], $cell_religion['font_size']);
            $this->pdf_text_color($cell_religion['data'], $cell_religion['color_r'], $cell_religion['color_g'], $cell_religion['color_b']);
            if (!empty($cell_religion['posx']) && !empty($cell_religion['posy']))
            {
                $this->Pdf->SetXY($cell_religion['posx'], $cell_religion['posy']);
            }
            elseif (!empty($cell_religion['posx']))
            {
                $this->Pdf->SetX($cell_religion['posx']);
            }
            elseif (!empty($cell_religion['posy']))
            {
                $this->Pdf->SetY($cell_religion['posy']);
            }
            $this->Pdf->Cell($cell_religion['width'], 0, $cell_religion['data'], 0, 0, $cell_religion['align']);

            $this->Pdf->SetFont($cell_birthplace['font_type'], $cell_birthplace['font_style'], $cell_birthplace['font_size']);
            $this->pdf_text_color($cell_birthplace['data'], $cell_birthplace['color_r'], $cell_birthplace['color_g'], $cell_birthplace['color_b']);
            if (!empty($cell_birthplace['posx']) && !empty($cell_birthplace['posy']))
            {
                $this->Pdf->SetXY($cell_birthplace['posx'], $cell_birthplace['posy']);
            }
            elseif (!empty($cell_birthplace['posx']))
            {
                $this->Pdf->SetX($cell_birthplace['posx']);
            }
            elseif (!empty($cell_birthplace['posy']))
            {
                $this->Pdf->SetY($cell_birthplace['posy']);
            }
            $this->Pdf->Cell($cell_birthplace['width'], 0, $cell_birthplace['data'], 0, 0, $cell_birthplace['align']);

            $this->Pdf->SetFont($cell_kelurahan['font_type'], $cell_kelurahan['font_style'], $cell_kelurahan['font_size']);
            $this->pdf_text_color($cell_kelurahan['data'], $cell_kelurahan['color_r'], $cell_kelurahan['color_g'], $cell_kelurahan['color_b']);
            if (!empty($cell_kelurahan['posx']) && !empty($cell_kelurahan['posy']))
            {
                $this->Pdf->SetXY($cell_kelurahan['posx'], $cell_kelurahan['posy']);
            }
            elseif (!empty($cell_kelurahan['posx']))
            {
                $this->Pdf->SetX($cell_kelurahan['posx']);
            }
            elseif (!empty($cell_kelurahan['posy']))
            {
                $this->Pdf->SetY($cell_kelurahan['posy']);
            }
            $this->Pdf->Cell($cell_kelurahan['width'], 0, $cell_kelurahan['data'], 0, 0, $cell_kelurahan['align']);

            $this->Pdf->SetFont($cell_kecamatan['font_type'], $cell_kecamatan['font_style'], $cell_kecamatan['font_size']);
            $this->pdf_text_color($cell_kecamatan['data'], $cell_kecamatan['color_r'], $cell_kecamatan['color_g'], $cell_kecamatan['color_b']);
            if (!empty($cell_kecamatan['posx']) && !empty($cell_kecamatan['posy']))
            {
                $this->Pdf->SetXY($cell_kecamatan['posx'], $cell_kecamatan['posy']);
            }
            elseif (!empty($cell_kecamatan['posx']))
            {
                $this->Pdf->SetX($cell_kecamatan['posx']);
            }
            elseif (!empty($cell_kecamatan['posy']))
            {
                $this->Pdf->SetY($cell_kecamatan['posy']);
            }
            $this->Pdf->Cell($cell_kecamatan['width'], 0, $cell_kecamatan['data'], 0, 0, $cell_kecamatan['align']);

            $this->Pdf->SetFont($cell_rt['font_type'], $cell_rt['font_style'], $cell_rt['font_size']);
            $this->pdf_text_color($cell_rt['data'], $cell_rt['color_r'], $cell_rt['color_g'], $cell_rt['color_b']);
            if (!empty($cell_rt['posx']) && !empty($cell_rt['posy']))
            {
                $this->Pdf->SetXY($cell_rt['posx'], $cell_rt['posy']);
            }
            elseif (!empty($cell_rt['posx']))
            {
                $this->Pdf->SetX($cell_rt['posx']);
            }
            elseif (!empty($cell_rt['posy']))
            {
                $this->Pdf->SetY($cell_rt['posy']);
            }
            $this->Pdf->Cell($cell_rt['width'], 0, $cell_rt['data'], 0, 0, $cell_rt['align']);

            $this->Pdf->SetFont($cell_rw['font_type'], $cell_rw['font_style'], $cell_rw['font_size']);
            $this->pdf_text_color($cell_rw['data'], $cell_rw['color_r'], $cell_rw['color_g'], $cell_rw['color_b']);
            if (!empty($cell_rw['posx']) && !empty($cell_rw['posy']))
            {
                $this->Pdf->SetXY($cell_rw['posx'], $cell_rw['posy']);
            }
            elseif (!empty($cell_rw['posx']))
            {
                $this->Pdf->SetX($cell_rw['posx']);
            }
            elseif (!empty($cell_rw['posy']))
            {
                $this->Pdf->SetY($cell_rw['posy']);
            }
            $this->Pdf->Cell($cell_rw['width'], 0, $cell_rw['data'], 0, 0, $cell_rw['align']);

            $this->Pdf->SetFont($cell_idNo['font_type'], $cell_idNo['font_style'], $cell_idNo['font_size']);
            $this->pdf_text_color($cell_idNo['data'], $cell_idNo['color_r'], $cell_idNo['color_g'], $cell_idNo['color_b']);
            if (!empty($cell_idNo['posx']) && !empty($cell_idNo['posy']))
            {
                $this->Pdf->SetXY($cell_idNo['posx'], $cell_idNo['posy']);
            }
            elseif (!empty($cell_idNo['posx']))
            {
                $this->Pdf->SetX($cell_idNo['posx']);
            }
            elseif (!empty($cell_idNo['posy']))
            {
                $this->Pdf->SetY($cell_idNo['posy']);
            }
            $this->Pdf->Cell($cell_idNo['width'], 0, $cell_idNo['data'], 0, 0, $cell_idNo['align']);

            $this->Pdf->SetFont($cell_jenis['font_type'], $cell_jenis['font_style'], $cell_jenis['font_size']);
            $this->pdf_text_color($cell_jenis['data'], $cell_jenis['color_r'], $cell_jenis['color_g'], $cell_jenis['color_b']);
            if (!empty($cell_jenis['posx']) && !empty($cell_jenis['posy']))
            {
                $this->Pdf->SetXY($cell_jenis['posx'], $cell_jenis['posy']);
            }
            elseif (!empty($cell_jenis['posx']))
            {
                $this->Pdf->SetX($cell_jenis['posx']);
            }
            elseif (!empty($cell_jenis['posy']))
            {
                $this->Pdf->SetY($cell_jenis['posy']);
            }
            $this->Pdf->Cell($cell_jenis['width'], 0, $cell_jenis['data'], 0, 0, $cell_jenis['align']);

            $this->Pdf->SetFont($cell_bu['font_type'], $cell_bu['font_style'], $cell_bu['font_size']);
            $this->pdf_text_color($cell_bu['data'], $cell_bu['color_r'], $cell_bu['color_g'], $cell_bu['color_b']);
            if (!empty($cell_bu['posx']) && !empty($cell_bu['posy']))
            {
                $this->Pdf->SetXY($cell_bu['posx'], $cell_bu['posy']);
            }
            elseif (!empty($cell_bu['posx']))
            {
                $this->Pdf->SetX($cell_bu['posx']);
            }
            elseif (!empty($cell_bu['posy']))
            {
                $this->Pdf->SetY($cell_bu['posy']);
            }
            $this->Pdf->Cell($cell_bu['width'], 0, $cell_bu['data'], 0, 0, $cell_bu['align']);

            $this->Pdf->SetFont($cell_instNo['font_type'], $cell_instNo['font_style'], $cell_instNo['font_size']);
            $this->pdf_text_color($cell_instNo['data'], $cell_instNo['color_r'], $cell_instNo['color_g'], $cell_instNo['color_b']);
            if (!empty($cell_instNo['posx']) && !empty($cell_instNo['posy']))
            {
                $this->Pdf->SetXY($cell_instNo['posx'], $cell_instNo['posy']);
            }
            elseif (!empty($cell_instNo['posx']))
            {
                $this->Pdf->SetX($cell_instNo['posx']);
            }
            elseif (!empty($cell_instNo['posy']))
            {
                $this->Pdf->SetY($cell_instNo['posy']);
            }
            $this->Pdf->Cell($cell_instNo['width'], 0, $cell_instNo['data'], 0, 0, $cell_instNo['align']);

            $this->Pdf->SetFont($cell_rm1['font_type'], $cell_rm1['font_style'], $cell_rm1['font_size']);
            $this->pdf_text_color($cell_rm1['data'], $cell_rm1['color_r'], $cell_rm1['color_g'], $cell_rm1['color_b']);
            if (!empty($cell_rm1['posx']) && !empty($cell_rm1['posy']))
            {
                $this->Pdf->SetXY($cell_rm1['posx'], $cell_rm1['posy']);
            }
            elseif (!empty($cell_rm1['posx']))
            {
                $this->Pdf->SetX($cell_rm1['posx']);
            }
            elseif (!empty($cell_rm1['posy']))
            {
                $this->Pdf->SetY($cell_rm1['posy']);
            }
            $this->Pdf->Cell($cell_rm1['width'], 0, $cell_rm1['data'], 0, 0, $cell_rm1['align']);

            $this->Pdf->SetFont($cell_rm2['font_type'], $cell_rm2['font_style'], $cell_rm2['font_size']);
            $this->pdf_text_color($cell_rm2['data'], $cell_rm2['color_r'], $cell_rm2['color_g'], $cell_rm2['color_b']);
            if (!empty($cell_rm2['posx']) && !empty($cell_rm2['posy']))
            {
                $this->Pdf->SetXY($cell_rm2['posx'], $cell_rm2['posy']);
            }
            elseif (!empty($cell_rm2['posx']))
            {
                $this->Pdf->SetX($cell_rm2['posx']);
            }
            elseif (!empty($cell_rm2['posy']))
            {
                $this->Pdf->SetY($cell_rm2['posy']);
            }
            $this->Pdf->Cell($cell_rm2['width'], 0, $cell_rm2['data'], 0, 0, $cell_rm2['align']);

            $this->Pdf->SetFont($cell_rm3['font_type'], $cell_rm3['font_style'], $cell_rm3['font_size']);
            $this->pdf_text_color($cell_rm3['data'], $cell_rm3['color_r'], $cell_rm3['color_g'], $cell_rm3['color_b']);
            if (!empty($cell_rm3['posx']) && !empty($cell_rm3['posy']))
            {
                $this->Pdf->SetXY($cell_rm3['posx'], $cell_rm3['posy']);
            }
            elseif (!empty($cell_rm3['posx']))
            {
                $this->Pdf->SetX($cell_rm3['posx']);
            }
            elseif (!empty($cell_rm3['posy']))
            {
                $this->Pdf->SetY($cell_rm3['posy']);
            }
            $this->Pdf->Cell($cell_rm3['width'], 0, $cell_rm3['data'], 0, 0, $cell_rm3['align']);

            $this->Pdf->SetFont($cell_rm4['font_type'], $cell_rm4['font_style'], $cell_rm4['font_size']);
            $this->pdf_text_color($cell_rm4['data'], $cell_rm4['color_r'], $cell_rm4['color_g'], $cell_rm4['color_b']);
            if (!empty($cell_rm4['posx']) && !empty($cell_rm4['posy']))
            {
                $this->Pdf->SetXY($cell_rm4['posx'], $cell_rm4['posy']);
            }
            elseif (!empty($cell_rm4['posx']))
            {
                $this->Pdf->SetX($cell_rm4['posx']);
            }
            elseif (!empty($cell_rm4['posy']))
            {
                $this->Pdf->SetY($cell_rm4['posy']);
            }
            $this->Pdf->Cell($cell_rm4['width'], 0, $cell_rm4['data'], 0, 0, $cell_rm4['align']);

            $this->Pdf->SetFont($cell_rm5['font_type'], $cell_rm5['font_style'], $cell_rm5['font_size']);
            $this->pdf_text_color($cell_rm5['data'], $cell_rm5['color_r'], $cell_rm5['color_g'], $cell_rm5['color_b']);
            if (!empty($cell_rm5['posx']) && !empty($cell_rm5['posy']))
            {
                $this->Pdf->SetXY($cell_rm5['posx'], $cell_rm5['posy']);
            }
            elseif (!empty($cell_rm5['posx']))
            {
                $this->Pdf->SetX($cell_rm5['posx']);
            }
            elseif (!empty($cell_rm5['posy']))
            {
                $this->Pdf->SetY($cell_rm5['posy']);
            }
            $this->Pdf->Cell($cell_rm5['width'], 0, $cell_rm5['data'], 0, 0, $cell_rm5['align']);

            $this->Pdf->SetFont($cell_rm6['font_type'], $cell_rm6['font_style'], $cell_rm6['font_size']);
            $this->pdf_text_color($cell_rm6['data'], $cell_rm6['color_r'], $cell_rm6['color_g'], $cell_rm6['color_b']);
            if (!empty($cell_rm6['posx']) && !empty($cell_rm6['posy']))
            {
                $this->Pdf->SetXY($cell_rm6['posx'], $cell_rm6['posy']);
            }
            elseif (!empty($cell_rm6['posx']))
            {
                $this->Pdf->SetX($cell_rm6['posx']);
            }
            elseif (!empty($cell_rm6['posy']))
            {
                $this->Pdf->SetY($cell_rm6['posy']);
            }
            $this->Pdf->Cell($cell_rm6['width'], 0, $cell_rm6['data'], 0, 0, $cell_rm6['align']);

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

            $this->Pdf->SetFont($cell_gelar['font_type'], $cell_gelar['font_style'], $cell_gelar['font_size']);
            $this->pdf_text_color($cell_gelar['data'], $cell_gelar['color_r'], $cell_gelar['color_g'], $cell_gelar['color_b']);
            if (!empty($cell_gelar['posx']) && !empty($cell_gelar['posy']))
            {
                $this->Pdf->SetXY($cell_gelar['posx'], $cell_gelar['posy']);
            }
            elseif (!empty($cell_gelar['posx']))
            {
                $this->Pdf->SetX($cell_gelar['posx']);
            }
            elseif (!empty($cell_gelar['posy']))
            {
                $this->Pdf->SetY($cell_gelar['posy']);
            }
            $this->Pdf->Cell($cell_gelar['width'], 0, $cell_gelar['data'], 0, 0, $cell_gelar['align']);

            $this->Pdf->SetFont($cell_nama_bu['font_type'], $cell_nama_bu['font_style'], $cell_nama_bu['font_size']);
            $this->pdf_text_color($cell_nama_bu['data'], $cell_nama_bu['color_r'], $cell_nama_bu['color_g'], $cell_nama_bu['color_b']);
            if (!empty($cell_nama_bu['posx']) && !empty($cell_nama_bu['posy']))
            {
                $this->Pdf->SetXY($cell_nama_bu['posx'], $cell_nama_bu['posy']);
            }
            elseif (!empty($cell_nama_bu['posx']))
            {
                $this->Pdf->SetX($cell_nama_bu['posx']);
            }
            elseif (!empty($cell_nama_bu['posy']))
            {
                $this->Pdf->SetY($cell_nama_bu['posy']);
            }
            $this->Pdf->Cell($cell_nama_bu['width'], 0, $cell_nama_bu['data'], 0, 0, $cell_nama_bu['align']);

            $this->Pdf->SetFont($cell_penanggung['font_type'], $cell_penanggung['font_style'], $cell_penanggung['font_size']);
            $this->pdf_text_color($cell_penanggung['data'], $cell_penanggung['color_r'], $cell_penanggung['color_g'], $cell_penanggung['color_b']);
            if (!empty($cell_penanggung['posx']) && !empty($cell_penanggung['posy']))
            {
                $this->Pdf->SetXY($cell_penanggung['posx'], $cell_penanggung['posy']);
            }
            elseif (!empty($cell_penanggung['posx']))
            {
                $this->Pdf->SetX($cell_penanggung['posx']);
            }
            elseif (!empty($cell_penanggung['posy']))
            {
                $this->Pdf->SetY($cell_penanggung['posy']);
            }
            $this->Pdf->Cell($cell_penanggung['width'], 0, $cell_penanggung['data'], 0, 0, $cell_penanggung['align']);

            $this->Pdf->SetFont($cell_perusahaan['font_type'], $cell_perusahaan['font_style'], $cell_perusahaan['font_size']);
            $this->pdf_text_color($cell_perusahaan['data'], $cell_perusahaan['color_r'], $cell_perusahaan['color_g'], $cell_perusahaan['color_b']);
            if (!empty($cell_perusahaan['posx']) && !empty($cell_perusahaan['posy']))
            {
                $this->Pdf->SetXY($cell_perusahaan['posx'], $cell_perusahaan['posy']);
            }
            elseif (!empty($cell_perusahaan['posx']))
            {
                $this->Pdf->SetX($cell_perusahaan['posx']);
            }
            elseif (!empty($cell_perusahaan['posy']))
            {
                $this->Pdf->SetY($cell_perusahaan['posy']);
            }
            $this->Pdf->Cell($cell_perusahaan['width'], 0, $cell_perusahaan['data'], 0, 0, $cell_perusahaan['align']);

            $this->Pdf->SetFont($cell_cetak_date['font_type'], $cell_cetak_date['font_style'], $cell_cetak_date['font_size']);
            $this->pdf_text_color($cell_cetak_date['data'], $cell_cetak_date['color_r'], $cell_cetak_date['color_g'], $cell_cetak_date['color_b']);
            if (!empty($cell_cetak_date['posx']) && !empty($cell_cetak_date['posy']))
            {
                $this->Pdf->SetXY($cell_cetak_date['posx'], $cell_cetak_date['posy']);
            }
            elseif (!empty($cell_cetak_date['posx']))
            {
                $this->Pdf->SetX($cell_cetak_date['posx']);
            }
            elseif (!empty($cell_cetak_date['posy']))
            {
                $this->Pdf->SetY($cell_cetak_date['posy']);
            }
            $this->Pdf->Cell($cell_cetak_date['width'], 0, $cell_cetak_date['data'], 0, 0, $cell_cetak_date['align']);

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
