<?php

class billInap_rtf
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Texto_tag;
   var $Arquivo;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function __construct()
   {
      $this->nm_data   = new nm_data("id");
      $this->Texto_tag = "";
   }

   //---- 
   function monta_rtf()
   {
      $this->inicializa_vars();
      $this->gera_texto_tag();
      $this->grava_arquivo_rtf();
      if ($this->Ini->sc_export_ajax)
      {
          $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Rtf_f);
          $this->Arr_result['title_export'] = NM_charset_to_utf8($this->Tit_doc);
          $Temp = ob_get_clean();
          if ($Temp !== false && trim($Temp) != "")
          {
              $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          exit;
      }
      else
      {
          $this->progress_bar_end();
      }
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "billInap_total.class.php"); 
      $this->Tot      = new billInap_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['billInap']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_billInap";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "billInap.rtf";
   }
   //---- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini    = $this->Ini;
      $this->$modulo->Db     = $this->Db;
      $this->$modulo->Erro   = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
   }


   //----- 
   function gera_texto_tag()
   {
     global $nm_lang;
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['rtf_name']);
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['billInap']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['billInap']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['billInap']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->deskripsi = $Busca_temp['deskripsi']; 
          $tmp_pos = strpos($this->deskripsi, "##@@");
          if ($tmp_pos !== false && !is_array($this->deskripsi))
          {
              $this->deskripsi = substr($this->deskripsi, 0, $tmp_pos);
          }
          $this->jumlah = $Busca_temp['jumlah']; 
          $tmp_pos = strpos($this->jumlah, "##@@");
          if ($tmp_pos !== false && !is_array($this->jumlah))
          {
              $this->jumlah = substr($this->jumlah, 0, $tmp_pos);
          }
          $this->kategori = $Busca_temp['kategori']; 
          $tmp_pos = strpos($this->kategori, "##@@");
          if ($tmp_pos !== false && !is_array($this->kategori))
          {
              $this->kategori = substr($this->kategori, 0, $tmp_pos);
          }
      } 
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['deskripsi'])) ? $this->New_label['deskripsi'] : "Deskripsi"; 
          if ($Cada_col == "deskripsi" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['jumlah'])) ? $this->New_label['jumlah'] : "Jumlah"; 
          if ($Cada_col == "jumlah" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['biaya'])) ? $this->New_label['biaya'] : "Biaya"; 
          if ($Cada_col == "biaya" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['total'])) ? $this->New_label['total'] : "Total"; 
          if ($Cada_col == "total" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['diskon'])) ? $this->New_label['diskon'] : "Diskon"; 
          if ($Cada_col == "diskon" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['kategori'])) ? $this->New_label['kategori'] : "Kategori"; 
          if ($Cada_col == "kategori" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
      } 
      $this->Texto_tag .= "</tr>\r\n";
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT 	c.Deskripsi, 	c.jumlah, 	c.Biaya, 	c.Diskon, 	c.Total, 	c.Kategori  FROM 	( 	SELECT 		CONCAT( 			date_format( a.tglTindakan, '%d/%m/%Y' ), 			' - ', 			a.tindakan, 			' (', 			d.gelar, 			' ', 			d.NAME, 			', ', 			d.spec, 			')'  		) AS Deskripsi, 		1 jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		a.biaya - a.diskon AS Total, 		c.tranCode, 		'Tindakan IGD' AS Kategori  	FROM 		tbtindakanigd a 		LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 		LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk 		LEFT JOIN tbdoctor d ON d.docCode = a.pelaksana UNION ALL 	SELECT 		CONCAT( date_format( a.tranDate, '%d/%m/%Y' ), ' - ', d.namaItem ) AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		( 			a.biaya * a.jumlah - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) )  			) + ( 			( 				( a.biaya * a.jumlah ) - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) )  			) * ( 10 / 100 )  		) AS Total, 		c.tranCode AS tranCode, 		'Resep IGD' Kategori  	FROM 		tbreseprawatigd a 		LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 		LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk 		LEFT JOIN tbobat d ON d.kodeItem = a.item UNION ALL 	SELECT 		CONCAT( date_format( a.tranDate, '%d/%m/%Y' ), ' - ', d.namaItem ) AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		( 			a.biaya * a.jumlah - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) )  			) + ( 			( 				( a.biaya * a.jumlah ) - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) )  			) * ( 10 / 100 )  		) AS Total, 		c.tranCode AS tranCode, 		'BHP IGD' Kategori  	FROM 		tbbhpigd a 		LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 		LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk 		LEFT JOIN tbobat d ON d.kodeItem = a.item UNION ALL 	SELECT 	tbl_sum.nama AS Deskripsi, 	1 AS jumlah, 	tbl_sum.rate AS Biaya, 	tbl_sum.disc AS Diskon, 	tbl_sum.total AS Total, 	tbl_sum.tranCode AS tranCode, 	'Rujuk Lab IGD' AS Kategori  FROM 	( 	SELECT 		c.nama AS nama, 		b.rate AS rate, 		b.disc AS disc, 		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total, 		e.tranCode as tranCode 	FROM 		tbtranlab a 		LEFT JOIN tbdetaillab b ON b.trancode = a.trancode 		LEFT JOIN tblab c ON c.labcode = b.labcode 		LEFT JOIN tbrujukanlab d ON d.struk = a.struk 		LEFT JOIN tbadmrawatinap e ON e.unitAsal = d.struk 	GROUP BY 		concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ', b.labcode) 	) tbl_sum UNION ALL 	SELECT 	tbl_sum.nama AS Deskripsi, 	1 AS jumlah, 	tbl_sum.rate AS Biaya, 	tbl_sum.disc AS Diskon, 	tbl_sum.total AS Total, 	tbl_sum.tranCode AS tranCode, 	'Rujuk Radiologi IGD' AS Kategori  FROM 	( 	SELECT 		c.nama AS nama, 		b.rate AS rate, 		b.disc AS disc, 		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total, 		e.tranCode as tranCode 	FROM 		tbtranrad a 		LEFT JOIN tbdetailrad b ON b.trancode = a.trancode 		LEFT JOIN tbradiologi c ON c.radcode = b.radcode 		LEFT JOIN tbrujukanradiologi d ON d.struk = a.struk 		LEFT JOIN tbadmrawatinap e ON e.unitAsal = d.struk 	GROUP BY 		concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ', b.radcode)  	) tbl_sum UNION ALL 	SELECT 		'Administrasi IGD' AS Deskripsi, 		1 jumlah, 		biaya AS Biaya, 		'0' Diskon, 		biaya AS Total, 		c.tranCode as tranCode, 		'Administrasi IGD' Kategori  	FROM 		tbbilladm a 		LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 	LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk UNION ALL 	SELECT 		concat( 			b.ruang, 			' Bed ', 			b.noBed, 			' (', 			date_format( a.check_in, '%d %M %Y %H:%i' ), 			' - ', 			date_format( a.check_out, '%d %M %Y %H:%i' ), 			')'  		) AS Deskripsi, 		NULL AS jumlah, 		a.rate AS Biaya, 		a.disc AS Diskon, 		( 			( a.rate - ( a.rate * ( a.disc / 100 ) ) ) * 		IF 			( 				( date_format( a.check_out, '%H:%i' ) <= '12:00' ), 				DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ), 				DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ) + 1  			)  		) AS Total, 		a.tranCode AS tranCode, 		'Biaya Kamar Rawat Inap' Kategori  	FROM 		tbbillruang a 		LEFT JOIN tbbed b ON b.idBed = a.bed UNION ALL 	SELECT 		'Tarif Keperawatan' AS Deskripsi, 		NULL AS jumlah, 		a.keperawatan AS Biaya, 		a.disc AS Diskon, 		( 			( a.keperawatan - ( a.keperawatan * ( a.disc / 100 ) ) ) * 		IF 			( 				( date_format( a.check_out, '%H:%i' ) <= '12:00' ), 				DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ), 				DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ) + 1  			)  		) AS Total, 		a.tranCode AS tranCode, 		'Biaya Kamar Rawat Inap' Kategori  	FROM 		tbbillruang a 		LEFT JOIN tbbed b ON b.idBed = a.bed UNION ALL 	SELECT 		CONCAT( 			date_format( b.tranDate, '%d/%m/%Y' ), 			' - ', 			a.actcode, 			' (', 			c.gelar, 			' ', 			c.NAME, 			', ', 			c.spec, 			')'  		) AS Deskripsi, 		1 jumlah, 		a.fee AS Biaya, 		a.disc AS Diskon, 		a.fee - ( a.fee * ( a.disc / 100 ) ) AS Total, 		b.inapCode AS tranCode, 		'Biaya Tind. Persalinan' Kategori  	FROM 		tbtim a 		LEFT JOIN tbdetailvk b ON b.tranCode = a.trancode 		LEFT JOIN tbdoctor c ON c.docCode = a.CODE UNION ALL 	SELECT 		CONCAT( 			date_format( b.tranDate, '%d/%m/%Y' ), 			' - ', 			d.namaTindakan, 			' (', 			c.gelar, 			' ', 			c.NAME, 			', ', 			c.spec, 			')'  		) AS Deskripsi, 		1 jumlah, 		a.fee AS Biaya, 		a.disc AS Diskon, 		a.fee - ( a.fee * ( a.disc / 100 ) ) AS Total, 		b.inapCode AS tranCode, 		'Biaya Tind. Operasi' Kategori  	FROM 		tbtim a 		LEFT JOIN tbdetailok b ON b.tranCode = a.trancode 		LEFT JOIN tbdoctor c ON c.docCode = a. 		CODE LEFT JOIN tbtindakan d ON d.kodeTindakan = a.actcode UNION ALL 	SELECT 		CONCAT( 			DATE_FORMAT( a.tglTindakan, '%d/%m/%Y' ), 			' - ', 			a.tindakan, 			' (', 			b.gelar, 			b.NAME, 			', ', 			b.spec, 			')'  		) AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		a.biaya - ( a.biaya * ( a.diskon / 100 ) ) AS Total, 		a.tranCode AS tranCode, 		'Tind. Rawat Inap' Kategori  	FROM 		tbtindakanrawatinap a 		LEFT JOIN tbdoctor b ON b.docCode = a.pelaksana UNION ALL 	SELECT 		b.namaItem AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		(a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ))+((a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ))*(10/100)) AS Total, 		c.inapcode AS tranCode, 		'Obat OK/VK' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT 		CONCAT( DATE_FORMAT( a.tranDate, '%d/%m/%Y' ), ' - ', b.namaItem ) AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		(a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ))+((a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ))*(10/100)) AS Total, 		a.tranCode AS tranCode, 		'Obat Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 	tbl_sum.nama AS Deskripsi, 	1 AS jumlah, 	tbl_sum.rate AS Biaya, 	tbl_sum.disc AS Diskon, 	tbl_sum.total AS Total, 	tbl_sum.tranCode AS tranCode, 	'Biaya Lab Rawat Inap' AS Kategori  FROM 	( 	SELECT 		concat( date_format( b.trandate, '%d/%m/%Y  %H:%i' ), ' - ', c.nama ) AS nama, 		b.rate AS rate, 		b.disc AS disc, 		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total, 		a.inapcode AS tranCode  	FROM 		tbtranlab a 		LEFT JOIN tbdetaillab b ON b.trancode = a.trancode 		LEFT JOIN tblab c ON c.labcode = b.labcode  	GROUP BY 		concat( date_format( b.trandate, '%d/%m/%Y  %H:%i' ), ' - ', b.labcode) 	) tbl_sum UNION ALL SELECT 	tbl_sum.nama AS Deskripsi, 	1 AS jumlah, 	tbl_sum.rate AS Biaya, 	tbl_sum.disc AS Diskon, 	tbl_sum.total AS Total, 	tbl_sum.tranCode AS tranCode, 	'Biaya Rad Rawat Inap' AS Kategori  FROM 	( 	SELECT 		concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ', c.nama ) AS nama, 		b.rate AS rate, 		b.disc AS disc, 		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total, 		a.inapcode AS tranCode  	FROM 		tbtranrad a 		LEFT JOIN tbdetailrad b ON b.trancode = a.trancode 		LEFT JOIN tbradiologi c ON c.radcode = b.radcode 	GROUP BY 	concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ', b.radcode) 	) tbl_sum UNION ALL 	SELECT 		namaAdm AS Deskripsi, 		1 jumlah, 		biaya AS Biaya, 		diskon AS Diskon, 		biaya - diskon AS Total, 		tranCode, 		'Administrasi' Kategori  	FROM 		tbbilladm  	) c  WHERE 	c.tranCode = '" . $_SESSION['tran_RI'] . "') nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT Deskripsi, jumlah, Biaya, Total, Diskon, Kategori from (SELECT 	c.Deskripsi, 	c.jumlah, 	c.Biaya, 	c.Diskon, 	c.Total, 	c.Kategori  FROM 	( 	SELECT 		CONCAT( 			date_format( a.tglTindakan, '%d/%m/%Y' ), 			' - ', 			a.tindakan, 			' (', 			d.gelar, 			' ', 			d.NAME, 			', ', 			d.spec, 			')'  		) AS Deskripsi, 		1 jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		a.biaya - a.diskon AS Total, 		c.tranCode, 		'Tindakan IGD' AS Kategori  	FROM 		tbtindakanigd a 		LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 		LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk 		LEFT JOIN tbdoctor d ON d.docCode = a.pelaksana UNION ALL 	SELECT 		CONCAT( date_format( a.tranDate, '%d/%m/%Y' ), ' - ', d.namaItem ) AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		( 			a.biaya * a.jumlah - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) )  			) + ( 			( 				( a.biaya * a.jumlah ) - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) )  			) * ( 10 / 100 )  		) AS Total, 		c.tranCode AS tranCode, 		'Resep IGD' Kategori  	FROM 		tbreseprawatigd a 		LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 		LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk 		LEFT JOIN tbobat d ON d.kodeItem = a.item UNION ALL 	SELECT 		CONCAT( date_format( a.tranDate, '%d/%m/%Y' ), ' - ', d.namaItem ) AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		( 			a.biaya * a.jumlah - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) )  			) + ( 			( 				( a.biaya * a.jumlah ) - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) )  			) * ( 10 / 100 )  		) AS Total, 		c.tranCode AS tranCode, 		'BHP IGD' Kategori  	FROM 		tbbhpigd a 		LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 		LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk 		LEFT JOIN tbobat d ON d.kodeItem = a.item UNION ALL 	SELECT 	tbl_sum.nama AS Deskripsi, 	1 AS jumlah, 	tbl_sum.rate AS Biaya, 	tbl_sum.disc AS Diskon, 	tbl_sum.total AS Total, 	tbl_sum.tranCode AS tranCode, 	'Rujuk Lab IGD' AS Kategori  FROM 	( 	SELECT 		c.nama AS nama, 		b.rate AS rate, 		b.disc AS disc, 		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total, 		e.tranCode as tranCode 	FROM 		tbtranlab a 		LEFT JOIN tbdetaillab b ON b.trancode = a.trancode 		LEFT JOIN tblab c ON c.labcode = b.labcode 		LEFT JOIN tbrujukanlab d ON d.struk = a.struk 		LEFT JOIN tbadmrawatinap e ON e.unitAsal = d.struk 	GROUP BY 		concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ', b.labcode) 	) tbl_sum UNION ALL 	SELECT 	tbl_sum.nama AS Deskripsi, 	1 AS jumlah, 	tbl_sum.rate AS Biaya, 	tbl_sum.disc AS Diskon, 	tbl_sum.total AS Total, 	tbl_sum.tranCode AS tranCode, 	'Rujuk Radiologi IGD' AS Kategori  FROM 	( 	SELECT 		c.nama AS nama, 		b.rate AS rate, 		b.disc AS disc, 		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total, 		e.tranCode as tranCode 	FROM 		tbtranrad a 		LEFT JOIN tbdetailrad b ON b.trancode = a.trancode 		LEFT JOIN tbradiologi c ON c.radcode = b.radcode 		LEFT JOIN tbrujukanradiologi d ON d.struk = a.struk 		LEFT JOIN tbadmrawatinap e ON e.unitAsal = d.struk 	GROUP BY 		concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ', b.radcode)  	) tbl_sum UNION ALL 	SELECT 		'Administrasi IGD' AS Deskripsi, 		1 jumlah, 		biaya AS Biaya, 		'0' Diskon, 		biaya AS Total, 		c.tranCode as tranCode, 		'Administrasi IGD' Kategori  	FROM 		tbbilladm a 		LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 	LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk UNION ALL 	SELECT 		concat( 			b.ruang, 			' Bed ', 			b.noBed, 			' (', 			date_format( a.check_in, '%d %M %Y %H:%i' ), 			' - ', 			date_format( a.check_out, '%d %M %Y %H:%i' ), 			')'  		) AS Deskripsi, 		NULL AS jumlah, 		a.rate AS Biaya, 		a.disc AS Diskon, 		( 			( a.rate - ( a.rate * ( a.disc / 100 ) ) ) * 		IF 			( 				( date_format( a.check_out, '%H:%i' ) <= '12:00' ), 				DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ), 				DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ) + 1  			)  		) AS Total, 		a.tranCode AS tranCode, 		'Biaya Kamar Rawat Inap' Kategori  	FROM 		tbbillruang a 		LEFT JOIN tbbed b ON b.idBed = a.bed UNION ALL 	SELECT 		'Tarif Keperawatan' AS Deskripsi, 		NULL AS jumlah, 		a.keperawatan AS Biaya, 		a.disc AS Diskon, 		( 			( a.keperawatan - ( a.keperawatan * ( a.disc / 100 ) ) ) * 		IF 			( 				( date_format( a.check_out, '%H:%i' ) <= '12:00' ), 				DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ), 				DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ) + 1  			)  		) AS Total, 		a.tranCode AS tranCode, 		'Biaya Kamar Rawat Inap' Kategori  	FROM 		tbbillruang a 		LEFT JOIN tbbed b ON b.idBed = a.bed UNION ALL 	SELECT 		CONCAT( 			date_format( b.tranDate, '%d/%m/%Y' ), 			' - ', 			a.actcode, 			' (', 			c.gelar, 			' ', 			c.NAME, 			', ', 			c.spec, 			')'  		) AS Deskripsi, 		1 jumlah, 		a.fee AS Biaya, 		a.disc AS Diskon, 		a.fee - ( a.fee * ( a.disc / 100 ) ) AS Total, 		b.inapCode AS tranCode, 		'Biaya Tind. Persalinan' Kategori  	FROM 		tbtim a 		LEFT JOIN tbdetailvk b ON b.tranCode = a.trancode 		LEFT JOIN tbdoctor c ON c.docCode = a.CODE UNION ALL 	SELECT 		CONCAT( 			date_format( b.tranDate, '%d/%m/%Y' ), 			' - ', 			d.namaTindakan, 			' (', 			c.gelar, 			' ', 			c.NAME, 			', ', 			c.spec, 			')'  		) AS Deskripsi, 		1 jumlah, 		a.fee AS Biaya, 		a.disc AS Diskon, 		a.fee - ( a.fee * ( a.disc / 100 ) ) AS Total, 		b.inapCode AS tranCode, 		'Biaya Tind. Operasi' Kategori  	FROM 		tbtim a 		LEFT JOIN tbdetailok b ON b.tranCode = a.trancode 		LEFT JOIN tbdoctor c ON c.docCode = a. 		CODE LEFT JOIN tbtindakan d ON d.kodeTindakan = a.actcode UNION ALL 	SELECT 		CONCAT( 			DATE_FORMAT( a.tglTindakan, '%d/%m/%Y' ), 			' - ', 			a.tindakan, 			' (', 			b.gelar, 			b.NAME, 			', ', 			b.spec, 			')'  		) AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		a.biaya - ( a.biaya * ( a.diskon / 100 ) ) AS Total, 		a.tranCode AS tranCode, 		'Tind. Rawat Inap' Kategori  	FROM 		tbtindakanrawatinap a 		LEFT JOIN tbdoctor b ON b.docCode = a.pelaksana UNION ALL 	SELECT 		b.namaItem AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		(a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ))+((a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ))*(10/100)) AS Total, 		c.inapcode AS tranCode, 		'Obat OK/VK' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT 		CONCAT( DATE_FORMAT( a.tranDate, '%d/%m/%Y' ), ' - ', b.namaItem ) AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		(a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ))+((a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ))*(10/100)) AS Total, 		a.tranCode AS tranCode, 		'Obat Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 	tbl_sum.nama AS Deskripsi, 	1 AS jumlah, 	tbl_sum.rate AS Biaya, 	tbl_sum.disc AS Diskon, 	tbl_sum.total AS Total, 	tbl_sum.tranCode AS tranCode, 	'Biaya Lab Rawat Inap' AS Kategori  FROM 	( 	SELECT 		concat( date_format( b.trandate, '%d/%m/%Y  %H:%i' ), ' - ', c.nama ) AS nama, 		b.rate AS rate, 		b.disc AS disc, 		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total, 		a.inapcode AS tranCode  	FROM 		tbtranlab a 		LEFT JOIN tbdetaillab b ON b.trancode = a.trancode 		LEFT JOIN tblab c ON c.labcode = b.labcode  	GROUP BY 		concat( date_format( b.trandate, '%d/%m/%Y  %H:%i' ), ' - ', b.labcode) 	) tbl_sum UNION ALL SELECT 	tbl_sum.nama AS Deskripsi, 	1 AS jumlah, 	tbl_sum.rate AS Biaya, 	tbl_sum.disc AS Diskon, 	tbl_sum.total AS Total, 	tbl_sum.tranCode AS tranCode, 	'Biaya Rad Rawat Inap' AS Kategori  FROM 	( 	SELECT 		concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ', c.nama ) AS nama, 		b.rate AS rate, 		b.disc AS disc, 		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total, 		a.inapcode AS tranCode  	FROM 		tbtranrad a 		LEFT JOIN tbdetailrad b ON b.trancode = a.trancode 		LEFT JOIN tbradiologi c ON c.radcode = b.radcode 	GROUP BY 	concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ', b.radcode) 	) tbl_sum UNION ALL 	SELECT 		namaAdm AS Deskripsi, 		1 jumlah, 		biaya AS Biaya, 		diskon AS Diskon, 		biaya - diskon AS Total, 		tranCode, 		'Administrasi' Kategori  	FROM 		tbbilladm  	) c  WHERE 	c.tranCode = '" . $_SESSION['tran_RI'] . "') nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT Deskripsi, jumlah, Biaya, Total, Diskon, Kategori from (SELECT 	c.Deskripsi, 	c.jumlah, 	c.Biaya, 	c.Diskon, 	c.Total, 	c.Kategori  FROM 	( 	SELECT 		CONCAT( 			date_format( a.tglTindakan, '%d/%m/%Y' ), 			' - ', 			a.tindakan, 			' (', 			d.gelar, 			' ', 			d.NAME, 			', ', 			d.spec, 			')'  		) AS Deskripsi, 		1 jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		a.biaya - a.diskon AS Total, 		c.tranCode, 		'Tindakan IGD' AS Kategori  	FROM 		tbtindakanigd a 		LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 		LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk 		LEFT JOIN tbdoctor d ON d.docCode = a.pelaksana UNION ALL 	SELECT 		CONCAT( date_format( a.tranDate, '%d/%m/%Y' ), ' - ', d.namaItem ) AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		( 			a.biaya * a.jumlah - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) )  			) + ( 			( 				( a.biaya * a.jumlah ) - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) )  			) * ( 10 / 100 )  		) AS Total, 		c.tranCode AS tranCode, 		'Resep IGD' Kategori  	FROM 		tbreseprawatigd a 		LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 		LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk 		LEFT JOIN tbobat d ON d.kodeItem = a.item UNION ALL 	SELECT 		CONCAT( date_format( a.tranDate, '%d/%m/%Y' ), ' - ', d.namaItem ) AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		( 			a.biaya * a.jumlah - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) )  			) + ( 			( 				( a.biaya * a.jumlah ) - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) )  			) * ( 10 / 100 )  		) AS Total, 		c.tranCode AS tranCode, 		'BHP IGD' Kategori  	FROM 		tbbhpigd a 		LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 		LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk 		LEFT JOIN tbobat d ON d.kodeItem = a.item UNION ALL 	SELECT 	tbl_sum.nama AS Deskripsi, 	1 AS jumlah, 	tbl_sum.rate AS Biaya, 	tbl_sum.disc AS Diskon, 	tbl_sum.total AS Total, 	tbl_sum.tranCode AS tranCode, 	'Rujuk Lab IGD' AS Kategori  FROM 	( 	SELECT 		c.nama AS nama, 		b.rate AS rate, 		b.disc AS disc, 		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total, 		e.tranCode as tranCode 	FROM 		tbtranlab a 		LEFT JOIN tbdetaillab b ON b.trancode = a.trancode 		LEFT JOIN tblab c ON c.labcode = b.labcode 		LEFT JOIN tbrujukanlab d ON d.struk = a.struk 		LEFT JOIN tbadmrawatinap e ON e.unitAsal = d.struk 	GROUP BY 		concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ', b.labcode) 	) tbl_sum UNION ALL 	SELECT 	tbl_sum.nama AS Deskripsi, 	1 AS jumlah, 	tbl_sum.rate AS Biaya, 	tbl_sum.disc AS Diskon, 	tbl_sum.total AS Total, 	tbl_sum.tranCode AS tranCode, 	'Rujuk Radiologi IGD' AS Kategori  FROM 	( 	SELECT 		c.nama AS nama, 		b.rate AS rate, 		b.disc AS disc, 		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total, 		e.tranCode as tranCode 	FROM 		tbtranrad a 		LEFT JOIN tbdetailrad b ON b.trancode = a.trancode 		LEFT JOIN tbradiologi c ON c.radcode = b.radcode 		LEFT JOIN tbrujukanradiologi d ON d.struk = a.struk 		LEFT JOIN tbadmrawatinap e ON e.unitAsal = d.struk 	GROUP BY 		concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ', b.radcode)  	) tbl_sum UNION ALL 	SELECT 		'Administrasi IGD' AS Deskripsi, 		1 jumlah, 		biaya AS Biaya, 		'0' Diskon, 		biaya AS Total, 		c.tranCode as tranCode, 		'Administrasi IGD' Kategori  	FROM 		tbbilladm a 		LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 	LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk UNION ALL 	SELECT 		concat( 			b.ruang, 			' Bed ', 			b.noBed, 			' (', 			date_format( a.check_in, '%d %M %Y %H:%i' ), 			' - ', 			date_format( a.check_out, '%d %M %Y %H:%i' ), 			')'  		) AS Deskripsi, 		NULL AS jumlah, 		a.rate AS Biaya, 		a.disc AS Diskon, 		( 			( a.rate - ( a.rate * ( a.disc / 100 ) ) ) * 		IF 			( 				( date_format( a.check_out, '%H:%i' ) <= '12:00' ), 				DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ), 				DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ) + 1  			)  		) AS Total, 		a.tranCode AS tranCode, 		'Biaya Kamar Rawat Inap' Kategori  	FROM 		tbbillruang a 		LEFT JOIN tbbed b ON b.idBed = a.bed UNION ALL 	SELECT 		'Tarif Keperawatan' AS Deskripsi, 		NULL AS jumlah, 		a.keperawatan AS Biaya, 		a.disc AS Diskon, 		( 			( a.keperawatan - ( a.keperawatan * ( a.disc / 100 ) ) ) * 		IF 			( 				( date_format( a.check_out, '%H:%i' ) <= '12:00' ), 				DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ), 				DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ) + 1  			)  		) AS Total, 		a.tranCode AS tranCode, 		'Biaya Kamar Rawat Inap' Kategori  	FROM 		tbbillruang a 		LEFT JOIN tbbed b ON b.idBed = a.bed UNION ALL 	SELECT 		CONCAT( 			date_format( b.tranDate, '%d/%m/%Y' ), 			' - ', 			a.actcode, 			' (', 			c.gelar, 			' ', 			c.NAME, 			', ', 			c.spec, 			')'  		) AS Deskripsi, 		1 jumlah, 		a.fee AS Biaya, 		a.disc AS Diskon, 		a.fee - ( a.fee * ( a.disc / 100 ) ) AS Total, 		b.inapCode AS tranCode, 		'Biaya Tind. Persalinan' Kategori  	FROM 		tbtim a 		LEFT JOIN tbdetailvk b ON b.tranCode = a.trancode 		LEFT JOIN tbdoctor c ON c.docCode = a.CODE UNION ALL 	SELECT 		CONCAT( 			date_format( b.tranDate, '%d/%m/%Y' ), 			' - ', 			d.namaTindakan, 			' (', 			c.gelar, 			' ', 			c.NAME, 			', ', 			c.spec, 			')'  		) AS Deskripsi, 		1 jumlah, 		a.fee AS Biaya, 		a.disc AS Diskon, 		a.fee - ( a.fee * ( a.disc / 100 ) ) AS Total, 		b.inapCode AS tranCode, 		'Biaya Tind. Operasi' Kategori  	FROM 		tbtim a 		LEFT JOIN tbdetailok b ON b.tranCode = a.trancode 		LEFT JOIN tbdoctor c ON c.docCode = a. 		CODE LEFT JOIN tbtindakan d ON d.kodeTindakan = a.actcode UNION ALL 	SELECT 		CONCAT( 			DATE_FORMAT( a.tglTindakan, '%d/%m/%Y' ), 			' - ', 			a.tindakan, 			' (', 			b.gelar, 			b.NAME, 			', ', 			b.spec, 			')'  		) AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		a.biaya - ( a.biaya * ( a.diskon / 100 ) ) AS Total, 		a.tranCode AS tranCode, 		'Tind. Rawat Inap' Kategori  	FROM 		tbtindakanrawatinap a 		LEFT JOIN tbdoctor b ON b.docCode = a.pelaksana UNION ALL 	SELECT 		b.namaItem AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		(a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ))+((a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ))*(10/100)) AS Total, 		c.inapcode AS tranCode, 		'Obat OK/VK' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT 		CONCAT( DATE_FORMAT( a.tranDate, '%d/%m/%Y' ), ' - ', b.namaItem ) AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		(a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ))+((a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ))*(10/100)) AS Total, 		a.tranCode AS tranCode, 		'Obat Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 	tbl_sum.nama AS Deskripsi, 	1 AS jumlah, 	tbl_sum.rate AS Biaya, 	tbl_sum.disc AS Diskon, 	tbl_sum.total AS Total, 	tbl_sum.tranCode AS tranCode, 	'Biaya Lab Rawat Inap' AS Kategori  FROM 	( 	SELECT 		concat( date_format( b.trandate, '%d/%m/%Y  %H:%i' ), ' - ', c.nama ) AS nama, 		b.rate AS rate, 		b.disc AS disc, 		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total, 		a.inapcode AS tranCode  	FROM 		tbtranlab a 		LEFT JOIN tbdetaillab b ON b.trancode = a.trancode 		LEFT JOIN tblab c ON c.labcode = b.labcode  	GROUP BY 		concat( date_format( b.trandate, '%d/%m/%Y  %H:%i' ), ' - ', b.labcode) 	) tbl_sum UNION ALL SELECT 	tbl_sum.nama AS Deskripsi, 	1 AS jumlah, 	tbl_sum.rate AS Biaya, 	tbl_sum.disc AS Diskon, 	tbl_sum.total AS Total, 	tbl_sum.tranCode AS tranCode, 	'Biaya Rad Rawat Inap' AS Kategori  FROM 	( 	SELECT 		concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ', c.nama ) AS nama, 		b.rate AS rate, 		b.disc AS disc, 		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total, 		a.inapcode AS tranCode  	FROM 		tbtranrad a 		LEFT JOIN tbdetailrad b ON b.trancode = a.trancode 		LEFT JOIN tbradiologi c ON c.radcode = b.radcode 	GROUP BY 	concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ', b.radcode) 	) tbl_sum UNION ALL 	SELECT 		namaAdm AS Deskripsi, 		1 jumlah, 		biaya AS Biaya, 		diskon AS Diskon, 		biaya - diskon AS Total, 		tranCode, 		'Administrasi' Kategori  	FROM 		tbbilladm  	) c  WHERE 	c.tranCode = '" . $_SESSION['tran_RI'] . "') nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT Deskripsi, jumlah, Biaya, Total, Diskon, Kategori from (SELECT 	c.Deskripsi, 	c.jumlah, 	c.Biaya, 	c.Diskon, 	c.Total, 	c.Kategori  FROM 	( 	SELECT 		CONCAT( 			date_format( a.tglTindakan, '%d/%m/%Y' ), 			' - ', 			a.tindakan, 			' (', 			d.gelar, 			' ', 			d.NAME, 			', ', 			d.spec, 			')'  		) AS Deskripsi, 		1 jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		a.biaya - a.diskon AS Total, 		c.tranCode, 		'Tindakan IGD' AS Kategori  	FROM 		tbtindakanigd a 		LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 		LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk 		LEFT JOIN tbdoctor d ON d.docCode = a.pelaksana UNION ALL 	SELECT 		CONCAT( date_format( a.tranDate, '%d/%m/%Y' ), ' - ', d.namaItem ) AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		( 			a.biaya * a.jumlah - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) )  			) + ( 			( 				( a.biaya * a.jumlah ) - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) )  			) * ( 10 / 100 )  		) AS Total, 		c.tranCode AS tranCode, 		'Resep IGD' Kategori  	FROM 		tbreseprawatigd a 		LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 		LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk 		LEFT JOIN tbobat d ON d.kodeItem = a.item UNION ALL 	SELECT 		CONCAT( date_format( a.tranDate, '%d/%m/%Y' ), ' - ', d.namaItem ) AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		( 			a.biaya * a.jumlah - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) )  			) + ( 			( 				( a.biaya * a.jumlah ) - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) )  			) * ( 10 / 100 )  		) AS Total, 		c.tranCode AS tranCode, 		'BHP IGD' Kategori  	FROM 		tbbhpigd a 		LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 		LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk 		LEFT JOIN tbobat d ON d.kodeItem = a.item UNION ALL 	SELECT 	tbl_sum.nama AS Deskripsi, 	1 AS jumlah, 	tbl_sum.rate AS Biaya, 	tbl_sum.disc AS Diskon, 	tbl_sum.total AS Total, 	tbl_sum.tranCode AS tranCode, 	'Rujuk Lab IGD' AS Kategori  FROM 	( 	SELECT 		c.nama AS nama, 		b.rate AS rate, 		b.disc AS disc, 		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total, 		e.tranCode as tranCode 	FROM 		tbtranlab a 		LEFT JOIN tbdetaillab b ON b.trancode = a.trancode 		LEFT JOIN tblab c ON c.labcode = b.labcode 		LEFT JOIN tbrujukanlab d ON d.struk = a.struk 		LEFT JOIN tbadmrawatinap e ON e.unitAsal = d.struk 	GROUP BY 		concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ', b.labcode) 	) tbl_sum UNION ALL 	SELECT 	tbl_sum.nama AS Deskripsi, 	1 AS jumlah, 	tbl_sum.rate AS Biaya, 	tbl_sum.disc AS Diskon, 	tbl_sum.total AS Total, 	tbl_sum.tranCode AS tranCode, 	'Rujuk Radiologi IGD' AS Kategori  FROM 	( 	SELECT 		c.nama AS nama, 		b.rate AS rate, 		b.disc AS disc, 		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total, 		e.tranCode as tranCode 	FROM 		tbtranrad a 		LEFT JOIN tbdetailrad b ON b.trancode = a.trancode 		LEFT JOIN tbradiologi c ON c.radcode = b.radcode 		LEFT JOIN tbrujukanradiologi d ON d.struk = a.struk 		LEFT JOIN tbadmrawatinap e ON e.unitAsal = d.struk 	GROUP BY 		concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ', b.radcode)  	) tbl_sum UNION ALL 	SELECT 		'Administrasi IGD' AS Deskripsi, 		1 jumlah, 		biaya AS Biaya, 		'0' Diskon, 		biaya AS Total, 		c.tranCode as tranCode, 		'Administrasi IGD' Kategori  	FROM 		tbbilladm a 		LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 	LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk UNION ALL 	SELECT 		concat( 			b.ruang, 			' Bed ', 			b.noBed, 			' (', 			date_format( a.check_in, '%d %M %Y %H:%i' ), 			' - ', 			date_format( a.check_out, '%d %M %Y %H:%i' ), 			')'  		) AS Deskripsi, 		NULL AS jumlah, 		a.rate AS Biaya, 		a.disc AS Diskon, 		( 			( a.rate - ( a.rate * ( a.disc / 100 ) ) ) * 		IF 			( 				( date_format( a.check_out, '%H:%i' ) <= '12:00' ), 				DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ), 				DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ) + 1  			)  		) AS Total, 		a.tranCode AS tranCode, 		'Biaya Kamar Rawat Inap' Kategori  	FROM 		tbbillruang a 		LEFT JOIN tbbed b ON b.idBed = a.bed UNION ALL 	SELECT 		'Tarif Keperawatan' AS Deskripsi, 		NULL AS jumlah, 		a.keperawatan AS Biaya, 		a.disc AS Diskon, 		( 			( a.keperawatan - ( a.keperawatan * ( a.disc / 100 ) ) ) * 		IF 			( 				( date_format( a.check_out, '%H:%i' ) <= '12:00' ), 				DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ), 				DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ) + 1  			)  		) AS Total, 		a.tranCode AS tranCode, 		'Biaya Kamar Rawat Inap' Kategori  	FROM 		tbbillruang a 		LEFT JOIN tbbed b ON b.idBed = a.bed UNION ALL 	SELECT 		CONCAT( 			date_format( b.tranDate, '%d/%m/%Y' ), 			' - ', 			a.actcode, 			' (', 			c.gelar, 			' ', 			c.NAME, 			', ', 			c.spec, 			')'  		) AS Deskripsi, 		1 jumlah, 		a.fee AS Biaya, 		a.disc AS Diskon, 		a.fee - ( a.fee * ( a.disc / 100 ) ) AS Total, 		b.inapCode AS tranCode, 		'Biaya Tind. Persalinan' Kategori  	FROM 		tbtim a 		LEFT JOIN tbdetailvk b ON b.tranCode = a.trancode 		LEFT JOIN tbdoctor c ON c.docCode = a.CODE UNION ALL 	SELECT 		CONCAT( 			date_format( b.tranDate, '%d/%m/%Y' ), 			' - ', 			d.namaTindakan, 			' (', 			c.gelar, 			' ', 			c.NAME, 			', ', 			c.spec, 			')'  		) AS Deskripsi, 		1 jumlah, 		a.fee AS Biaya, 		a.disc AS Diskon, 		a.fee - ( a.fee * ( a.disc / 100 ) ) AS Total, 		b.inapCode AS tranCode, 		'Biaya Tind. Operasi' Kategori  	FROM 		tbtim a 		LEFT JOIN tbdetailok b ON b.tranCode = a.trancode 		LEFT JOIN tbdoctor c ON c.docCode = a. 		CODE LEFT JOIN tbtindakan d ON d.kodeTindakan = a.actcode UNION ALL 	SELECT 		CONCAT( 			DATE_FORMAT( a.tglTindakan, '%d/%m/%Y' ), 			' - ', 			a.tindakan, 			' (', 			b.gelar, 			b.NAME, 			', ', 			b.spec, 			')'  		) AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		a.biaya - ( a.biaya * ( a.diskon / 100 ) ) AS Total, 		a.tranCode AS tranCode, 		'Tind. Rawat Inap' Kategori  	FROM 		tbtindakanrawatinap a 		LEFT JOIN tbdoctor b ON b.docCode = a.pelaksana UNION ALL 	SELECT 		b.namaItem AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		(a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ))+((a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ))*(10/100)) AS Total, 		c.inapcode AS tranCode, 		'Obat OK/VK' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT 		CONCAT( DATE_FORMAT( a.tranDate, '%d/%m/%Y' ), ' - ', b.namaItem ) AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		(a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ))+((a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ))*(10/100)) AS Total, 		a.tranCode AS tranCode, 		'Obat Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 	tbl_sum.nama AS Deskripsi, 	1 AS jumlah, 	tbl_sum.rate AS Biaya, 	tbl_sum.disc AS Diskon, 	tbl_sum.total AS Total, 	tbl_sum.tranCode AS tranCode, 	'Biaya Lab Rawat Inap' AS Kategori  FROM 	( 	SELECT 		concat( date_format( b.trandate, '%d/%m/%Y  %H:%i' ), ' - ', c.nama ) AS nama, 		b.rate AS rate, 		b.disc AS disc, 		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total, 		a.inapcode AS tranCode  	FROM 		tbtranlab a 		LEFT JOIN tbdetaillab b ON b.trancode = a.trancode 		LEFT JOIN tblab c ON c.labcode = b.labcode  	GROUP BY 		concat( date_format( b.trandate, '%d/%m/%Y  %H:%i' ), ' - ', b.labcode) 	) tbl_sum UNION ALL SELECT 	tbl_sum.nama AS Deskripsi, 	1 AS jumlah, 	tbl_sum.rate AS Biaya, 	tbl_sum.disc AS Diskon, 	tbl_sum.total AS Total, 	tbl_sum.tranCode AS tranCode, 	'Biaya Rad Rawat Inap' AS Kategori  FROM 	( 	SELECT 		concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ', c.nama ) AS nama, 		b.rate AS rate, 		b.disc AS disc, 		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total, 		a.inapcode AS tranCode  	FROM 		tbtranrad a 		LEFT JOIN tbdetailrad b ON b.trancode = a.trancode 		LEFT JOIN tbradiologi c ON c.radcode = b.radcode 	GROUP BY 	concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ', b.radcode) 	) tbl_sum UNION ALL 	SELECT 		namaAdm AS Deskripsi, 		1 jumlah, 		biaya AS Biaya, 		diskon AS Diskon, 		biaya - diskon AS Total, 		tranCode, 		'Administrasi' Kategori  	FROM 		tbbilladm  	) c  WHERE 	c.tranCode = '" . $_SESSION['tran_RI'] . "') nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT Deskripsi, jumlah, Biaya, Total, Diskon, Kategori from (SELECT 	c.Deskripsi, 	c.jumlah, 	c.Biaya, 	c.Diskon, 	c.Total, 	c.Kategori  FROM 	( 	SELECT 		CONCAT( 			date_format( a.tglTindakan, '%d/%m/%Y' ), 			' - ', 			a.tindakan, 			' (', 			d.gelar, 			' ', 			d.NAME, 			', ', 			d.spec, 			')'  		) AS Deskripsi, 		1 jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		a.biaya - a.diskon AS Total, 		c.tranCode, 		'Tindakan IGD' AS Kategori  	FROM 		tbtindakanigd a 		LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 		LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk 		LEFT JOIN tbdoctor d ON d.docCode = a.pelaksana UNION ALL 	SELECT 		CONCAT( date_format( a.tranDate, '%d/%m/%Y' ), ' - ', d.namaItem ) AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		( 			a.biaya * a.jumlah - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) )  			) + ( 			( 				( a.biaya * a.jumlah ) - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) )  			) * ( 10 / 100 )  		) AS Total, 		c.tranCode AS tranCode, 		'Resep IGD' Kategori  	FROM 		tbreseprawatigd a 		LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 		LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk 		LEFT JOIN tbobat d ON d.kodeItem = a.item UNION ALL 	SELECT 		CONCAT( date_format( a.tranDate, '%d/%m/%Y' ), ' - ', d.namaItem ) AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		( 			a.biaya * a.jumlah - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) )  			) + ( 			( 				( a.biaya * a.jumlah ) - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) )  			) * ( 10 / 100 )  		) AS Total, 		c.tranCode AS tranCode, 		'BHP IGD' Kategori  	FROM 		tbbhpigd a 		LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 		LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk 		LEFT JOIN tbobat d ON d.kodeItem = a.item UNION ALL 	SELECT 	tbl_sum.nama AS Deskripsi, 	1 AS jumlah, 	tbl_sum.rate AS Biaya, 	tbl_sum.disc AS Diskon, 	tbl_sum.total AS Total, 	tbl_sum.tranCode AS tranCode, 	'Rujuk Lab IGD' AS Kategori  FROM 	( 	SELECT 		c.nama AS nama, 		b.rate AS rate, 		b.disc AS disc, 		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total, 		e.tranCode as tranCode 	FROM 		tbtranlab a 		LEFT JOIN tbdetaillab b ON b.trancode = a.trancode 		LEFT JOIN tblab c ON c.labcode = b.labcode 		LEFT JOIN tbrujukanlab d ON d.struk = a.struk 		LEFT JOIN tbadmrawatinap e ON e.unitAsal = d.struk 	GROUP BY 		concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ', b.labcode) 	) tbl_sum UNION ALL 	SELECT 	tbl_sum.nama AS Deskripsi, 	1 AS jumlah, 	tbl_sum.rate AS Biaya, 	tbl_sum.disc AS Diskon, 	tbl_sum.total AS Total, 	tbl_sum.tranCode AS tranCode, 	'Rujuk Radiologi IGD' AS Kategori  FROM 	( 	SELECT 		c.nama AS nama, 		b.rate AS rate, 		b.disc AS disc, 		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total, 		e.tranCode as tranCode 	FROM 		tbtranrad a 		LEFT JOIN tbdetailrad b ON b.trancode = a.trancode 		LEFT JOIN tbradiologi c ON c.radcode = b.radcode 		LEFT JOIN tbrujukanradiologi d ON d.struk = a.struk 		LEFT JOIN tbadmrawatinap e ON e.unitAsal = d.struk 	GROUP BY 		concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ', b.radcode)  	) tbl_sum UNION ALL 	SELECT 		'Administrasi IGD' AS Deskripsi, 		1 jumlah, 		biaya AS Biaya, 		'0' Diskon, 		biaya AS Total, 		c.tranCode as tranCode, 		'Administrasi IGD' Kategori  	FROM 		tbbilladm a 		LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 	LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk UNION ALL 	SELECT 		concat( 			b.ruang, 			' Bed ', 			b.noBed, 			' (', 			date_format( a.check_in, '%d %M %Y %H:%i' ), 			' - ', 			date_format( a.check_out, '%d %M %Y %H:%i' ), 			')'  		) AS Deskripsi, 		NULL AS jumlah, 		a.rate AS Biaya, 		a.disc AS Diskon, 		( 			( a.rate - ( a.rate * ( a.disc / 100 ) ) ) * 		IF 			( 				( date_format( a.check_out, '%H:%i' ) <= '12:00' ), 				DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ), 				DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ) + 1  			)  		) AS Total, 		a.tranCode AS tranCode, 		'Biaya Kamar Rawat Inap' Kategori  	FROM 		tbbillruang a 		LEFT JOIN tbbed b ON b.idBed = a.bed UNION ALL 	SELECT 		'Tarif Keperawatan' AS Deskripsi, 		NULL AS jumlah, 		a.keperawatan AS Biaya, 		a.disc AS Diskon, 		( 			( a.keperawatan - ( a.keperawatan * ( a.disc / 100 ) ) ) * 		IF 			( 				( date_format( a.check_out, '%H:%i' ) <= '12:00' ), 				DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ), 				DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ) + 1  			)  		) AS Total, 		a.tranCode AS tranCode, 		'Biaya Kamar Rawat Inap' Kategori  	FROM 		tbbillruang a 		LEFT JOIN tbbed b ON b.idBed = a.bed UNION ALL 	SELECT 		CONCAT( 			date_format( b.tranDate, '%d/%m/%Y' ), 			' - ', 			a.actcode, 			' (', 			c.gelar, 			' ', 			c.NAME, 			', ', 			c.spec, 			')'  		) AS Deskripsi, 		1 jumlah, 		a.fee AS Biaya, 		a.disc AS Diskon, 		a.fee - ( a.fee * ( a.disc / 100 ) ) AS Total, 		b.inapCode AS tranCode, 		'Biaya Tind. Persalinan' Kategori  	FROM 		tbtim a 		LEFT JOIN tbdetailvk b ON b.tranCode = a.trancode 		LEFT JOIN tbdoctor c ON c.docCode = a.CODE UNION ALL 	SELECT 		CONCAT( 			date_format( b.tranDate, '%d/%m/%Y' ), 			' - ', 			d.namaTindakan, 			' (', 			c.gelar, 			' ', 			c.NAME, 			', ', 			c.spec, 			')'  		) AS Deskripsi, 		1 jumlah, 		a.fee AS Biaya, 		a.disc AS Diskon, 		a.fee - ( a.fee * ( a.disc / 100 ) ) AS Total, 		b.inapCode AS tranCode, 		'Biaya Tind. Operasi' Kategori  	FROM 		tbtim a 		LEFT JOIN tbdetailok b ON b.tranCode = a.trancode 		LEFT JOIN tbdoctor c ON c.docCode = a. 		CODE LEFT JOIN tbtindakan d ON d.kodeTindakan = a.actcode UNION ALL 	SELECT 		CONCAT( 			DATE_FORMAT( a.tglTindakan, '%d/%m/%Y' ), 			' - ', 			a.tindakan, 			' (', 			b.gelar, 			b.NAME, 			', ', 			b.spec, 			')'  		) AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		a.biaya - ( a.biaya * ( a.diskon / 100 ) ) AS Total, 		a.tranCode AS tranCode, 		'Tind. Rawat Inap' Kategori  	FROM 		tbtindakanrawatinap a 		LEFT JOIN tbdoctor b ON b.docCode = a.pelaksana UNION ALL 	SELECT 		b.namaItem AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		(a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ))+((a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ))*(10/100)) AS Total, 		c.inapcode AS tranCode, 		'Obat OK/VK' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT 		CONCAT( DATE_FORMAT( a.tranDate, '%d/%m/%Y' ), ' - ', b.namaItem ) AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		(a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ))+((a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ))*(10/100)) AS Total, 		a.tranCode AS tranCode, 		'Obat Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 	tbl_sum.nama AS Deskripsi, 	1 AS jumlah, 	tbl_sum.rate AS Biaya, 	tbl_sum.disc AS Diskon, 	tbl_sum.total AS Total, 	tbl_sum.tranCode AS tranCode, 	'Biaya Lab Rawat Inap' AS Kategori  FROM 	( 	SELECT 		concat( date_format( b.trandate, '%d/%m/%Y  %H:%i' ), ' - ', c.nama ) AS nama, 		b.rate AS rate, 		b.disc AS disc, 		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total, 		a.inapcode AS tranCode  	FROM 		tbtranlab a 		LEFT JOIN tbdetaillab b ON b.trancode = a.trancode 		LEFT JOIN tblab c ON c.labcode = b.labcode  	GROUP BY 		concat( date_format( b.trandate, '%d/%m/%Y  %H:%i' ), ' - ', b.labcode) 	) tbl_sum UNION ALL SELECT 	tbl_sum.nama AS Deskripsi, 	1 AS jumlah, 	tbl_sum.rate AS Biaya, 	tbl_sum.disc AS Diskon, 	tbl_sum.total AS Total, 	tbl_sum.tranCode AS tranCode, 	'Biaya Rad Rawat Inap' AS Kategori  FROM 	( 	SELECT 		concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ', c.nama ) AS nama, 		b.rate AS rate, 		b.disc AS disc, 		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total, 		a.inapcode AS tranCode  	FROM 		tbtranrad a 		LEFT JOIN tbdetailrad b ON b.trancode = a.trancode 		LEFT JOIN tbradiologi c ON c.radcode = b.radcode 	GROUP BY 	concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ', b.radcode) 	) tbl_sum UNION ALL 	SELECT 		namaAdm AS Deskripsi, 		1 jumlah, 		biaya AS Biaya, 		diskon AS Diskon, 		biaya - diskon AS Total, 		tranCode, 		'Administrasi' Kategori  	FROM 		tbbilladm  	) c  WHERE 	c.tranCode = '" . $_SESSION['tran_RI'] . "') nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT Deskripsi, jumlah, Biaya, Total, Diskon, Kategori from (SELECT 	c.Deskripsi, 	c.jumlah, 	c.Biaya, 	c.Diskon, 	c.Total, 	c.Kategori  FROM 	( 	SELECT 		CONCAT( 			date_format( a.tglTindakan, '%d/%m/%Y' ), 			' - ', 			a.tindakan, 			' (', 			d.gelar, 			' ', 			d.NAME, 			', ', 			d.spec, 			')'  		) AS Deskripsi, 		1 jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		a.biaya - a.diskon AS Total, 		c.tranCode, 		'Tindakan IGD' AS Kategori  	FROM 		tbtindakanigd a 		LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 		LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk 		LEFT JOIN tbdoctor d ON d.docCode = a.pelaksana UNION ALL 	SELECT 		CONCAT( date_format( a.tranDate, '%d/%m/%Y' ), ' - ', d.namaItem ) AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		( 			a.biaya * a.jumlah - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) )  			) + ( 			( 				( a.biaya * a.jumlah ) - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) )  			) * ( 10 / 100 )  		) AS Total, 		c.tranCode AS tranCode, 		'Resep IGD' Kategori  	FROM 		tbreseprawatigd a 		LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 		LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk 		LEFT JOIN tbobat d ON d.kodeItem = a.item UNION ALL 	SELECT 		CONCAT( date_format( a.tranDate, '%d/%m/%Y' ), ' - ', d.namaItem ) AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		( 			a.biaya * a.jumlah - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) )  			) + ( 			( 				( a.biaya * a.jumlah ) - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) )  			) * ( 10 / 100 )  		) AS Total, 		c.tranCode AS tranCode, 		'BHP IGD' Kategori  	FROM 		tbbhpigd a 		LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 		LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk 		LEFT JOIN tbobat d ON d.kodeItem = a.item UNION ALL 	SELECT 	tbl_sum.nama AS Deskripsi, 	1 AS jumlah, 	tbl_sum.rate AS Biaya, 	tbl_sum.disc AS Diskon, 	tbl_sum.total AS Total, 	tbl_sum.tranCode AS tranCode, 	'Rujuk Lab IGD' AS Kategori  FROM 	( 	SELECT 		c.nama AS nama, 		b.rate AS rate, 		b.disc AS disc, 		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total, 		e.tranCode as tranCode 	FROM 		tbtranlab a 		LEFT JOIN tbdetaillab b ON b.trancode = a.trancode 		LEFT JOIN tblab c ON c.labcode = b.labcode 		LEFT JOIN tbrujukanlab d ON d.struk = a.struk 		LEFT JOIN tbadmrawatinap e ON e.unitAsal = d.struk 	GROUP BY 		concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ', b.labcode) 	) tbl_sum UNION ALL 	SELECT 	tbl_sum.nama AS Deskripsi, 	1 AS jumlah, 	tbl_sum.rate AS Biaya, 	tbl_sum.disc AS Diskon, 	tbl_sum.total AS Total, 	tbl_sum.tranCode AS tranCode, 	'Rujuk Radiologi IGD' AS Kategori  FROM 	( 	SELECT 		c.nama AS nama, 		b.rate AS rate, 		b.disc AS disc, 		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total, 		e.tranCode as tranCode 	FROM 		tbtranrad a 		LEFT JOIN tbdetailrad b ON b.trancode = a.trancode 		LEFT JOIN tbradiologi c ON c.radcode = b.radcode 		LEFT JOIN tbrujukanradiologi d ON d.struk = a.struk 		LEFT JOIN tbadmrawatinap e ON e.unitAsal = d.struk 	GROUP BY 		concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ', b.radcode)  	) tbl_sum UNION ALL 	SELECT 		'Administrasi IGD' AS Deskripsi, 		1 jumlah, 		biaya AS Biaya, 		'0' Diskon, 		biaya AS Total, 		c.tranCode as tranCode, 		'Administrasi IGD' Kategori  	FROM 		tbbilladm a 		LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 	LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk UNION ALL 	SELECT 		concat( 			b.ruang, 			' Bed ', 			b.noBed, 			' (', 			date_format( a.check_in, '%d %M %Y %H:%i' ), 			' - ', 			date_format( a.check_out, '%d %M %Y %H:%i' ), 			')'  		) AS Deskripsi, 		NULL AS jumlah, 		a.rate AS Biaya, 		a.disc AS Diskon, 		( 			( a.rate - ( a.rate * ( a.disc / 100 ) ) ) * 		IF 			( 				( date_format( a.check_out, '%H:%i' ) <= '12:00' ), 				DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ), 				DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ) + 1  			)  		) AS Total, 		a.tranCode AS tranCode, 		'Biaya Kamar Rawat Inap' Kategori  	FROM 		tbbillruang a 		LEFT JOIN tbbed b ON b.idBed = a.bed UNION ALL 	SELECT 		'Tarif Keperawatan' AS Deskripsi, 		NULL AS jumlah, 		a.keperawatan AS Biaya, 		a.disc AS Diskon, 		( 			( a.keperawatan - ( a.keperawatan * ( a.disc / 100 ) ) ) * 		IF 			( 				( date_format( a.check_out, '%H:%i' ) <= '12:00' ), 				DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ), 				DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ) + 1  			)  		) AS Total, 		a.tranCode AS tranCode, 		'Biaya Kamar Rawat Inap' Kategori  	FROM 		tbbillruang a 		LEFT JOIN tbbed b ON b.idBed = a.bed UNION ALL 	SELECT 		CONCAT( 			date_format( b.tranDate, '%d/%m/%Y' ), 			' - ', 			a.actcode, 			' (', 			c.gelar, 			' ', 			c.NAME, 			', ', 			c.spec, 			')'  		) AS Deskripsi, 		1 jumlah, 		a.fee AS Biaya, 		a.disc AS Diskon, 		a.fee - ( a.fee * ( a.disc / 100 ) ) AS Total, 		b.inapCode AS tranCode, 		'Biaya Tind. Persalinan' Kategori  	FROM 		tbtim a 		LEFT JOIN tbdetailvk b ON b.tranCode = a.trancode 		LEFT JOIN tbdoctor c ON c.docCode = a.CODE UNION ALL 	SELECT 		CONCAT( 			date_format( b.tranDate, '%d/%m/%Y' ), 			' - ', 			d.namaTindakan, 			' (', 			c.gelar, 			' ', 			c.NAME, 			', ', 			c.spec, 			')'  		) AS Deskripsi, 		1 jumlah, 		a.fee AS Biaya, 		a.disc AS Diskon, 		a.fee - ( a.fee * ( a.disc / 100 ) ) AS Total, 		b.inapCode AS tranCode, 		'Biaya Tind. Operasi' Kategori  	FROM 		tbtim a 		LEFT JOIN tbdetailok b ON b.tranCode = a.trancode 		LEFT JOIN tbdoctor c ON c.docCode = a. 		CODE LEFT JOIN tbtindakan d ON d.kodeTindakan = a.actcode UNION ALL 	SELECT 		CONCAT( 			DATE_FORMAT( a.tglTindakan, '%d/%m/%Y' ), 			' - ', 			a.tindakan, 			' (', 			b.gelar, 			b.NAME, 			', ', 			b.spec, 			')'  		) AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		a.biaya - ( a.biaya * ( a.diskon / 100 ) ) AS Total, 		a.tranCode AS tranCode, 		'Tind. Rawat Inap' Kategori  	FROM 		tbtindakanrawatinap a 		LEFT JOIN tbdoctor b ON b.docCode = a.pelaksana UNION ALL 	SELECT 		b.namaItem AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		(a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ))+((a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ))*(10/100)) AS Total, 		c.inapcode AS tranCode, 		'Obat OK/VK' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT 		CONCAT( DATE_FORMAT( a.tranDate, '%d/%m/%Y' ), ' - ', b.namaItem ) AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		(a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ))+((a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ))*(10/100)) AS Total, 		a.tranCode AS tranCode, 		'Obat Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 	tbl_sum.nama AS Deskripsi, 	1 AS jumlah, 	tbl_sum.rate AS Biaya, 	tbl_sum.disc AS Diskon, 	tbl_sum.total AS Total, 	tbl_sum.tranCode AS tranCode, 	'Biaya Lab Rawat Inap' AS Kategori  FROM 	( 	SELECT 		concat( date_format( b.trandate, '%d/%m/%Y  %H:%i' ), ' - ', c.nama ) AS nama, 		b.rate AS rate, 		b.disc AS disc, 		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total, 		a.inapcode AS tranCode  	FROM 		tbtranlab a 		LEFT JOIN tbdetaillab b ON b.trancode = a.trancode 		LEFT JOIN tblab c ON c.labcode = b.labcode  	GROUP BY 		concat( date_format( b.trandate, '%d/%m/%Y  %H:%i' ), ' - ', b.labcode) 	) tbl_sum UNION ALL SELECT 	tbl_sum.nama AS Deskripsi, 	1 AS jumlah, 	tbl_sum.rate AS Biaya, 	tbl_sum.disc AS Diskon, 	tbl_sum.total AS Total, 	tbl_sum.tranCode AS tranCode, 	'Biaya Rad Rawat Inap' AS Kategori  FROM 	( 	SELECT 		concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ', c.nama ) AS nama, 		b.rate AS rate, 		b.disc AS disc, 		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total, 		a.inapcode AS tranCode  	FROM 		tbtranrad a 		LEFT JOIN tbdetailrad b ON b.trancode = a.trancode 		LEFT JOIN tbradiologi c ON c.radcode = b.radcode 	GROUP BY 	concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ', b.radcode) 	) tbl_sum UNION ALL 	SELECT 		namaAdm AS Deskripsi, 		1 jumlah, 		biaya AS Biaya, 		diskon AS Diskon, 		biaya - diskon AS Total, 		tranCode, 		'Administrasi' Kategori  	FROM 		tbbilladm  	) c  WHERE 	c.tranCode = '" . $_SESSION['tran_RI'] . "') nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT Deskripsi, jumlah, Biaya, Total, Diskon, Kategori from (SELECT 	c.Deskripsi, 	c.jumlah, 	c.Biaya, 	c.Diskon, 	c.Total, 	c.Kategori  FROM 	( 	SELECT 		CONCAT( 			date_format( a.tglTindakan, '%d/%m/%Y' ), 			' - ', 			a.tindakan, 			' (', 			d.gelar, 			' ', 			d.NAME, 			', ', 			d.spec, 			')'  		) AS Deskripsi, 		1 jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		a.biaya - a.diskon AS Total, 		c.tranCode, 		'Tindakan IGD' AS Kategori  	FROM 		tbtindakanigd a 		LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 		LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk 		LEFT JOIN tbdoctor d ON d.docCode = a.pelaksana UNION ALL 	SELECT 		CONCAT( date_format( a.tranDate, '%d/%m/%Y' ), ' - ', d.namaItem ) AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		( 			a.biaya * a.jumlah - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) )  			) + ( 			( 				( a.biaya * a.jumlah ) - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) )  			) * ( 10 / 100 )  		) AS Total, 		c.tranCode AS tranCode, 		'Resep IGD' Kategori  	FROM 		tbreseprawatigd a 		LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 		LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk 		LEFT JOIN tbobat d ON d.kodeItem = a.item UNION ALL 	SELECT 		CONCAT( date_format( a.tranDate, '%d/%m/%Y' ), ' - ', d.namaItem ) AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		( 			a.biaya * a.jumlah - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) )  			) + ( 			( 				( a.biaya * a.jumlah ) - ( ( a.biaya * a.jumlah ) * ( a.diskon / 100 ) )  			) * ( 10 / 100 )  		) AS Total, 		c.tranCode AS tranCode, 		'BHP IGD' Kategori  	FROM 		tbbhpigd a 		LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 		LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk 		LEFT JOIN tbobat d ON d.kodeItem = a.item UNION ALL 	SELECT 	tbl_sum.nama AS Deskripsi, 	1 AS jumlah, 	tbl_sum.rate AS Biaya, 	tbl_sum.disc AS Diskon, 	tbl_sum.total AS Total, 	tbl_sum.tranCode AS tranCode, 	'Rujuk Lab IGD' AS Kategori  FROM 	( 	SELECT 		c.nama AS nama, 		b.rate AS rate, 		b.disc AS disc, 		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total, 		e.tranCode as tranCode 	FROM 		tbtranlab a 		LEFT JOIN tbdetaillab b ON b.trancode = a.trancode 		LEFT JOIN tblab c ON c.labcode = b.labcode 		LEFT JOIN tbrujukanlab d ON d.struk = a.struk 		LEFT JOIN tbadmrawatinap e ON e.unitAsal = d.struk 	GROUP BY 		concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ', b.labcode) 	) tbl_sum UNION ALL 	SELECT 	tbl_sum.nama AS Deskripsi, 	1 AS jumlah, 	tbl_sum.rate AS Biaya, 	tbl_sum.disc AS Diskon, 	tbl_sum.total AS Total, 	tbl_sum.tranCode AS tranCode, 	'Rujuk Radiologi IGD' AS Kategori  FROM 	( 	SELECT 		c.nama AS nama, 		b.rate AS rate, 		b.disc AS disc, 		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total, 		e.tranCode as tranCode 	FROM 		tbtranrad a 		LEFT JOIN tbdetailrad b ON b.trancode = a.trancode 		LEFT JOIN tbradiologi c ON c.radcode = b.radcode 		LEFT JOIN tbrujukanradiologi d ON d.struk = a.struk 		LEFT JOIN tbadmrawatinap e ON e.unitAsal = d.struk 	GROUP BY 		concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ', b.radcode)  	) tbl_sum UNION ALL 	SELECT 		'Administrasi IGD' AS Deskripsi, 		1 jumlah, 		biaya AS Biaya, 		'0' Diskon, 		biaya AS Total, 		c.tranCode as tranCode, 		'Administrasi IGD' Kategori  	FROM 		tbbilladm a 		LEFT JOIN tbdetailigd b ON b.tranCode = a.tranCode 	LEFT JOIN tbadmrawatinap c ON c.unitAsal = b.noStruk UNION ALL 	SELECT 		concat( 			b.ruang, 			' Bed ', 			b.noBed, 			' (', 			date_format( a.check_in, '%d %M %Y %H:%i' ), 			' - ', 			date_format( a.check_out, '%d %M %Y %H:%i' ), 			')'  		) AS Deskripsi, 		NULL AS jumlah, 		a.rate AS Biaya, 		a.disc AS Diskon, 		( 			( a.rate - ( a.rate * ( a.disc / 100 ) ) ) * 		IF 			( 				( date_format( a.check_out, '%H:%i' ) <= '12:00' ), 				DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ), 				DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ) + 1  			)  		) AS Total, 		a.tranCode AS tranCode, 		'Biaya Kamar Rawat Inap' Kategori  	FROM 		tbbillruang a 		LEFT JOIN tbbed b ON b.idBed = a.bed UNION ALL 	SELECT 		'Tarif Keperawatan' AS Deskripsi, 		NULL AS jumlah, 		a.keperawatan AS Biaya, 		a.disc AS Diskon, 		( 			( a.keperawatan - ( a.keperawatan * ( a.disc / 100 ) ) ) * 		IF 			( 				( date_format( a.check_out, '%H:%i' ) <= '12:00' ), 				DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ), 				DATEDIFF( date_format( a.check_out, '%Y-%m-%d %H:%i' ), date_format( a.check_in, '%Y-%m-%d %H:%i' ) ) + 1  			)  		) AS Total, 		a.tranCode AS tranCode, 		'Biaya Kamar Rawat Inap' Kategori  	FROM 		tbbillruang a 		LEFT JOIN tbbed b ON b.idBed = a.bed UNION ALL 	SELECT 		CONCAT( 			date_format( b.tranDate, '%d/%m/%Y' ), 			' - ', 			a.actcode, 			' (', 			c.gelar, 			' ', 			c.NAME, 			', ', 			c.spec, 			')'  		) AS Deskripsi, 		1 jumlah, 		a.fee AS Biaya, 		a.disc AS Diskon, 		a.fee - ( a.fee * ( a.disc / 100 ) ) AS Total, 		b.inapCode AS tranCode, 		'Biaya Tind. Persalinan' Kategori  	FROM 		tbtim a 		LEFT JOIN tbdetailvk b ON b.tranCode = a.trancode 		LEFT JOIN tbdoctor c ON c.docCode = a.CODE UNION ALL 	SELECT 		CONCAT( 			date_format( b.tranDate, '%d/%m/%Y' ), 			' - ', 			d.namaTindakan, 			' (', 			c.gelar, 			' ', 			c.NAME, 			', ', 			c.spec, 			')'  		) AS Deskripsi, 		1 jumlah, 		a.fee AS Biaya, 		a.disc AS Diskon, 		a.fee - ( a.fee * ( a.disc / 100 ) ) AS Total, 		b.inapCode AS tranCode, 		'Biaya Tind. Operasi' Kategori  	FROM 		tbtim a 		LEFT JOIN tbdetailok b ON b.tranCode = a.trancode 		LEFT JOIN tbdoctor c ON c.docCode = a. 		CODE LEFT JOIN tbtindakan d ON d.kodeTindakan = a.actcode UNION ALL 	SELECT 		CONCAT( 			DATE_FORMAT( a.tglTindakan, '%d/%m/%Y' ), 			' - ', 			a.tindakan, 			' (', 			b.gelar, 			b.NAME, 			', ', 			b.spec, 			')'  		) AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		a.biaya - ( a.biaya * ( a.diskon / 100 ) ) AS Total, 		a.tranCode AS tranCode, 		'Tind. Rawat Inap' Kategori  	FROM 		tbtindakanrawatinap a 		LEFT JOIN tbdoctor b ON b.docCode = a.pelaksana UNION ALL 	SELECT 		b.namaItem AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		(a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ))+((a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ))*(10/100)) AS Total, 		c.inapcode AS tranCode, 		'Obat OK/VK' Kategori  	FROM 		tbdetailresepokvk a 		LEFT JOIN tbobat b ON b.kodeItem = a.item 		LEFT JOIN tbdetailok c ON c.tranCode = a.tranCode UNION ALL 	SELECT 		CONCAT( DATE_FORMAT( a.tranDate, '%d/%m/%Y' ), ' - ', b.namaItem ) AS Deskripsi, 		a.jumlah AS jumlah, 		a.biaya AS Biaya, 		a.diskon AS Diskon, 		(a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ))+((a.jumlah * ( a.biaya - ( a.biaya * ( a.diskon / 100 ) ) ))*(10/100)) AS Total, 		a.tranCode AS tranCode, 		'Obat Rawat Inap' Kategori  	FROM 		tbreseprawatinap a 		LEFT JOIN tbobat b ON b.kodeItem = a.item UNION ALL 	SELECT 	tbl_sum.nama AS Deskripsi, 	1 AS jumlah, 	tbl_sum.rate AS Biaya, 	tbl_sum.disc AS Diskon, 	tbl_sum.total AS Total, 	tbl_sum.tranCode AS tranCode, 	'Biaya Lab Rawat Inap' AS Kategori  FROM 	( 	SELECT 		concat( date_format( b.trandate, '%d/%m/%Y  %H:%i' ), ' - ', c.nama ) AS nama, 		b.rate AS rate, 		b.disc AS disc, 		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total, 		a.inapcode AS tranCode  	FROM 		tbtranlab a 		LEFT JOIN tbdetaillab b ON b.trancode = a.trancode 		LEFT JOIN tblab c ON c.labcode = b.labcode  	GROUP BY 		concat( date_format( b.trandate, '%d/%m/%Y  %H:%i' ), ' - ', b.labcode) 	) tbl_sum UNION ALL SELECT 	tbl_sum.nama AS Deskripsi, 	1 AS jumlah, 	tbl_sum.rate AS Biaya, 	tbl_sum.disc AS Diskon, 	tbl_sum.total AS Total, 	tbl_sum.tranCode AS tranCode, 	'Biaya Rad Rawat Inap' AS Kategori  FROM 	( 	SELECT 		concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ', c.nama ) AS nama, 		b.rate AS rate, 		b.disc AS disc, 		b.rate - ( b.rate * ( b.disc / 100 ) ) AS total, 		a.inapcode AS tranCode  	FROM 		tbtranrad a 		LEFT JOIN tbdetailrad b ON b.trancode = a.trancode 		LEFT JOIN tbradiologi c ON c.radcode = b.radcode 	GROUP BY 	concat( date_format( b.trandate, '%d/%m/%Y %H:%i' ), ' - ', b.radcode) 	) tbl_sum UNION ALL 	SELECT 		namaAdm AS Deskripsi, 		1 jumlah, 		biaya AS Biaya, 		diskon AS Diskon, 		biaya - diskon AS Total, 		tranCode, 		'Administrasi' Kategori  	FROM 		tbbilladm  	) c  WHERE 	c.tranCode = '" . $_SESSION['tran_RI'] . "') nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select_count;
      $rt = $this->Db->Execute($nmgp_select_count);
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->count_ger = $rt->fields[0];
      $rt->Close();
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->SC_seq_register = 0;
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if (!$this->Ini->sc_export_ajax) {
             $Mens_bar = $this->Ini->Nm_lang['lang_othr_prcs'];
             if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
                 $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
             }
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->Texto_tag .= "<tr>\r\n";
         $this->deskripsi = $rs->fields[0] ;  
         $this->jumlah = $rs->fields[1] ;  
         $this->jumlah =  str_replace(",", ".", $this->jumlah);
         $this->jumlah = (string)$this->jumlah;
         $this->biaya = $rs->fields[2] ;  
         $this->biaya =  str_replace(",", ".", $this->biaya);
         $this->biaya = (string)$this->biaya;
         $this->total = $rs->fields[3] ;  
         $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
         $this->total = (string)$this->total;
         $this->diskon = $rs->fields[4] ;  
         $this->kategori = $rs->fields[5] ;  
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->Texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->Texto_tag .= "</table>\r\n";
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- deskripsi
   function NM_export_deskripsi()
   {
         $this->deskripsi = html_entity_decode($this->deskripsi, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->deskripsi = strip_tags($this->deskripsi);
         if (!NM_is_utf8($this->deskripsi))
         {
             $this->deskripsi = sc_convert_encoding($this->deskripsi, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->deskripsi = str_replace('<', '&lt;', $this->deskripsi);
         $this->deskripsi = str_replace('>', '&gt;', $this->deskripsi);
         $this->Texto_tag .= "<td>" . $this->deskripsi . "</td>\r\n";
   }
   //----- jumlah
   function NM_export_jumlah()
   {
             nmgp_Form_Num_Val($this->jumlah, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if (!NM_is_utf8($this->jumlah))
         {
             $this->jumlah = sc_convert_encoding($this->jumlah, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->jumlah = str_replace('<', '&lt;', $this->jumlah);
         $this->jumlah = str_replace('>', '&gt;', $this->jumlah);
         $this->Texto_tag .= "<td>" . $this->jumlah . "</td>\r\n";
   }
   //----- biaya
   function NM_export_biaya()
   {
             nmgp_Form_Num_Val($this->biaya, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if (!NM_is_utf8($this->biaya))
         {
             $this->biaya = sc_convert_encoding($this->biaya, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->biaya = str_replace('<', '&lt;', $this->biaya);
         $this->biaya = str_replace('>', '&gt;', $this->biaya);
         $this->Texto_tag .= "<td>" . $this->biaya . "</td>\r\n";
   }
   //----- total
   function NM_export_total()
   {
             nmgp_Form_Num_Val($this->total, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->total))
         {
             $this->total = sc_convert_encoding($this->total, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->total = str_replace('<', '&lt;', $this->total);
         $this->total = str_replace('>', '&gt;', $this->total);
         $this->Texto_tag .= "<td>" . $this->total . "</td>\r\n";
   }
   //----- diskon
   function NM_export_diskon()
   {
             nmgp_Form_Num_Val($this->diskon, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->diskon))
         {
             $this->diskon = sc_convert_encoding($this->diskon, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->diskon = str_replace('<', '&lt;', $this->diskon);
         $this->diskon = str_replace('>', '&gt;', $this->diskon);
         $this->Texto_tag .= "<td>" . $this->diskon . "</td>\r\n";
   }
   //----- kategori
   function NM_export_kategori()
   {
         $this->kategori = html_entity_decode($this->kategori, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->kategori = strip_tags($this->kategori);
         if (!NM_is_utf8($this->kategori))
         {
             $this->kategori = sc_convert_encoding($this->kategori, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->kategori = str_replace('<', '&lt;', $this->kategori);
         $this->kategori = str_replace('>', '&gt;', $this->kategori);
         $this->Texto_tag .= "<td>" . $this->kategori . "</td>\r\n";
   }

   //----- 
   function grava_arquivo_rtf()
   {
      global $nm_lang, $doc_wrap;
      $this->Rtf_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $rtf_f       = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      require_once($this->Ini->path_third      . "/rtf_new/document_generator/cl_xml2driver.php"); 
      $text_ok  =  "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n"; 
      $text_ok .=  "<DOC config_file=\"" . $this->Ini->path_third . "/rtf_new/doc_config.inc\" >\r\n"; 
      $text_ok .=  $this->Texto_tag; 
      $text_ok .=  "</DOC>\r\n"; 
      $xml = new nDOCGEN($text_ok,"RTF"); 
      fwrite($rtf_f, $xml->get_result_file());
      fclose($rtf_f);
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
   function progress_bar_end()
   {
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['billInap'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['billInap'][$path_doc_md5][1] = $this->Tit_doc;
      $Mens_bar = $this->Ini->Nm_lang['lang_othr_file_msge'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
          $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
      }
      $this->pb->setProgressbarMessage($Mens_bar);
      $this->pb->setDownloadLink($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $this->pb->setDownloadMd5($path_doc_md5);
      $this->pb->completed();
   }
   //---- 
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['billInap'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['billInap'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>DETAIL BILLING INAP PASIEN :: RTF</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
  <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
  <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
  <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
  <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
  <META http-equiv="Pragma" content="no-cache"/>
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <?php
 if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts))
 {
 ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->str_google_fonts ?>" />
 <?php
 }
 ?>
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">RTF</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="billInap_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="billInap"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="volta_grid"> 
</FORM> 
</BODY>
</HTML>
<?php
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
