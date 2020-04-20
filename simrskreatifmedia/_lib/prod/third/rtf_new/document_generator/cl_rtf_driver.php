<?php


// v.1.1.1    [14.08.2007]
//         www.paggard.com



error_reporting(E_ERROR | E_WARNING | E_PARSE);
//error_reporting(E_ALL);

//-------------------------------------------------------------------------------------------------
class RTF_DRIVER {

	var $temp_dir;
	var $rnd_proc_nm;
	
	var $default_units;
	var $multilingual_support;
	var $doc_encoding;
	

	var $header = "";
	var $text = "";

	var $pg_width;
	var $pg_height;
	var $mar_left;
	var $mar_right;
	var $mar_top;
	var $mar_bott;
	var $facing_pages;
	var $gutter_width;
	var $rtl_gutter;

	var $image_size;

	var $header_align;
	var $footer_align;
	var $head_y;
	var $foot_y;
	var $page_numbers;
	var $page_numbers_valign;
	var $page_numbers_align;
	var $pn_autoInsert;

	var $font_face;
	var $font_size;
	var $def_par_before;
	var $def_par_after;
	var $def_par_align;
	var $def_par_lines;
	var $def_par_lindent;
	var $def_par_rindent;
	var $def_par_findent;
	var $tbl_def_border;
	var $tbl_def_width;
	var $tbl_def_align;
	var $tbl_def_valign;
	var $tbl_def_bgcolor;
	var $row_def_align;
	var $img_def_border;
	var $img_def_src;
	var $img_def_width;
	var $img_def_height;
	var $img_def_left;
	var $img_def_top;
	var $img_def_space;
	var $img_def_align;
	var $img_def_wrap;
	var $img_def_anchor;

	var $h_link_fontf;
	var $h_link_fonts;
	var $h_link_fontd;

	var $fnt_type;
	var $fnt_color;
	var $fnt_fontf;
	var $fnt_fonts;
	var $fnt_fontd;

	var $tbl_level;
	var $curr_tbl_settings;
	var $tbl_all_data_head;
	var $tbl_all_data_body;
	var $tbl_all_data_wdth;
	var $tbl_cells_wdth;
	var $tr_hd_mass;
	var $tb_wdth;
	var $table_data;
	

	var $inTable;
	var $color_table;
	var $image_array;
	var $image_token;
	var $image_counter;
	
	var $_started;
	var $_pre_table = false;
	var $_first_in_cell = true;
	


// ------------------------------------------------------------------------------------------------
// CONSTRUCTOR
	function __construct() { 
		$this->color_table = array();
		$this->image_array = array();
		$this->image_token = " img12365412img ";
		$this->image_counter = 0;

		$this->curr_tbl_settings = array();
		$this->tbl_all_data_head = array();
		$this->tbl_all_data_body = array();
		$this->tbl_all_data_wdth = array();
		$this->tbl_cells_wdth = array();
		$this->tr_hd_mass = array();
		$this->table_data = array();
		$this->tb_wdth = array();
		$this->_started = false;
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function _iDOCUMENT($attribs,$EndOfTag) {
		if (!$EndOfTag) {
			if (isset($attribs["CONFIG_FILE"]) && $attribs["CONFIG_FILE"]!="") {
				if ($this->file_check($attribs["CONFIG_FILE"])) {
					include $attribs["CONFIG_FILE"];
				}
			}
			else {die("Configuration file was not provided - script terminated.");}

			//--- document properties
			$document_properties = "{\\info\r\n";
			$document_properties .= "\r\n}\r\n";			if (isset($attribs["TITLE"])) {$document_properties .= "{\\title ".$attribs["TITLE"]."}";}
			if (isset($attribs["SUBJECT"])) {$document_properties .= "{\\subject ".$attribs["SUBJECT"]."}";}
			if (isset($attribs["AUTHOR"])) {$document_properties .= "{\\author ".$attribs["AUTHOR"]."}";}
			if (isset($attribs["MANAGER"])) {$document_properties .= "{\\manager ".$attribs["MANAGER"]."}";}
			if (isset($attribs["COMPANY"])) {$document_properties .= "{\\company ".$attribs["COMPANY"]."}";}
			if (isset($attribs["OPERATOR"])) {$document_properties .= "{\\operator ".$attribs["OPERATOR"]."}";}
			if (isset($attribs["CATEGORY"])) {$document_properties .= "{\\category ".$attribs["CATEGORY"]."}";}
			if (isset($attribs["KEYWORDS"])) {$document_properties .= "{\\keywords ".$attribs["KEYWORDS"]."}";}
			if (isset($attribs["COMMENT"])) {$document_properties .= "{\\comment ".$attribs["COMMENT"]."}";}
			if (isset($attribs["COMMENT"])) {$document_properties .= "{\\doccomm ".$attribs["COMMENT"]."}";}

			//-----------------------
			$this->temp_dir = $temp_dir;
			$this->rnd_proc_nm = time();

			$this->default_units = $default_units;
			$this->multilingual_support = $multilingual_support;
			//-----
			if ($this->multilingual_support) {
				if (!function_exists("mb_convert_encoding")) {
					trigger_error ("You have turned on the multilingual support, but do not have 'mb_string' PHP extention enabled.<br>\n", E_USER_ERROR);
				}
				switch (strtoupper($this->doc_encoding)) {
					case "ISO-8859-1": $curr_charset = "0"; break;
					case "WINDOWS-1251": $curr_charset = "204"; break;
					default: $curr_charset = $default_charset; break;
				}
			}
			else {
				$curr_charset = $default_charset;
			}
			//-----

			$this->pg_width=$this->twips($pg_width);
			$this->pg_height=$this->twips($pg_height);
			$this->mar_left=$this->twips($mar_left);
			$this->mar_right=$this->twips($mar_right);
			$this->mar_top=$this->twips($mar_top);
			$this->mar_bott=$this->twips($mar_bott);

			$this->facing_pages=$facing_pages;
			$this->rtl_gutter=$rtl_gutter;
			$this->gutter_width=$this->twips($gutter_width);

			$this->header_align = $header_align;
			$this->footer_align = $footer_align;

			$this->image_size = $image_size;

			$this->head_y=$this->twips($head_y);
			$this->foot_y=$this->twips($foot_y);
			$this->page_numbers = $page_numbers;
			$this->page_numbers_valign = $page_numbers_valign;
			$this->page_numbers_align = $page_numbers_align;
			$this->pn_autoInsert = $page_numbers_autoinsert;

			$this->font_face=$font_face;
			$this->font_size=$font_size;
			$this->def_par_before=$def_par_before;
			$this->def_par_after=$def_par_after;
			$this->def_par_align=$def_par_align;
			$this->def_par_lines=$def_par_lines;
			$this->def_par_lindent=$def_par_lindent;
			$this->def_par_rindent=$def_par_rindent;
			$this->def_par_findent=$def_par_findent;
			$this->tbl_def_border=$tbl_def_border;
			$this->tbl_def_width=$tbl_def_width;
			$this->tbl_def_cellpadding=$tbl_def_cellpadding;
			$this->tbl_def_align=$tbl_def_align;
			$this->tbl_def_valign=$tbl_def_valign;
			$this->tbl_def_bgcolor=$tbl_def_bgcolor;
			$this->row_def_align=$row_def_align;
			$this->img_def_border=$img_def_border;
			$this->img_def_src=$img_def_src;
			$this->img_def_width=$img_def_width;
			$this->img_def_height=$img_def_height;
			$this->img_def_left=$img_def_left;
			$this->img_def_top=$img_def_top;
			$this->img_def_space=$img_def_space;
			$this->img_def_align=$img_def_align;
			$this->img_def_wrap=$img_def_wrap;
			$this->img_def_anchor=$img_def_anchor;

			$this->h_link_fontf=$h_link_fontf;
			$this->h_link_fonts=$h_link_fonts;
			$this->h_link_fontd=$h_link_fontd;

			switch (@$fnt_type) {
				case "arab": $this->fnt_type="ftnnar"; break;
				case "alp_lower": $this->fnt_type="ftnnalc"; break;
				case "alp_upper": $this->fnt_type="ftnnauc"; break;
				case "rom_lower": $this->fnt_type="ftnnrlc"; break;
				case "rom_upper": $this->fnt_type="ftnnruc"; break;
				default: $this->fnt_type="ftnnar"; break;
			}
			$this->fnt_color=$fnt_color;
			$this->fnt_fontf=$fnt_fontf;
			$this->fnt_fonts=$fnt_fonts;
			$this->fnt_fontd=$fnt_fontd;



			$this->tbl_level = 0;
			$this->_first_par = 1;
			$this->inTable = false;
	
			$hlink = $this->get_rtf_color($h_link_color);
			$ftn_color = $this->get_rtf_color(preg_replace("/\#/","",$fnt_color));

		$this->header = "{\\rtf1\\ansi\\deff0\\deftab720

{\\fonttbl
{\\f0\\fnil MS Sans Serif;}
{\\f1\\froman\\fcharset2 Symbol;}
{\\f2\\fswiss\\fprq2\\fcharset".$curr_charset."{\\*\\fname Arial;}Arial;}
{\\f3\\froman\\fprq2\\fcharset".$curr_charset."{\\*\\fname Times New Roman;}Times New Roman;}
{\\f4\\fmodern\\fcharset".$curr_charset."\\fprq1{\\*\\panose 02070309020205020404}Courier New;}
{\\f5\\fswiss\\fcharset".$curr_charset."\\fprq2{\\*\\panose 020b0604020202020204}Microsoft Sans Serif;}
{\\f6\\froman\\fcharset".$curr_charset."\\fprq2{\\*\\panose 02020404030301010803}Garamond;}
{\\f7\\froman\\fcharset".$curr_charset."\\fprq2{\\*\\panose 02020404030301010999}Verdana;}
{\\f8\\froman\\fcharset".$curr_charset."\\fprq2{\\*\\panose 02020404030301010888}Courier;}
{\\f9\\fswiss\\fcharset".$curr_charset."\\fprq2{\\*\\panose 02020404030301010812}Helvetica;;}
{\\f10\\fnil\\fcharset2\\fprq2{\\*\\panose 05000000000000000000}Wingdings;}
{\\f11\\froman\\fcharset2\\fprq2{\\*\\panose 05020102010507070707}Wingdings 2;}
{\\f12\\froman\\fcharset2\\fprq2{\\*\\panose 05040102010807070707}Wingdings 3;}
{\\f20\\fswiss\\fcharset".$curr_charset."\\fprq2{\\*\\panose 02020404030301010558}Arial Narrow;}
{\\f21\\fnil\\fcharset".$curr_charset."\\fprq2{\\*\\panose 02000400000000000000}Futura Medium;}
{\\f22\\fswiss\\fcharset".$curr_charset."\\fprq2{\\*\\panose 020b0604030504040204}Tahoma;}
}

{\\colortbl;
\\red0\\green0\\blue0;
\\red0\\green0\\blue255;
\\red0\\green255\\blue255;
\\red0\\green255\\blue0;
\\red255\\green0\\blue255;
\\red255\\green0\\blue0;
\\red255\\green255\\blue0;
\\red255\\green255\\blue255;
\\red0\\green0\\blue128;
$hlink
$ftn_color
goesuserscolors
}
".$document_properties;

			$this->header.= "\\".$this->font($this->font_face)."\\fs".($this->font_size * 2)."\r\n";
			$orient = "";
			if ($page_orientation == "landscape") {
				$this->header.= "\\paperw".$this->pg_height."\\paperh".$this->pg_width;
				$temp_w = $this->pg_width;
				$this->pg_width = $this->pg_height;
				$this->pg_height = $temp_w;
				$orient = "\\sectd\\lndscpsxn";
			}
			$this->header.= "\\paperw".$this->pg_width."\\paperh".$this->pg_height;
			$this->header.= "\\margl".$this->mar_left.
									"\\margr".$this->mar_right.
									"\\margt".$this->mar_top.
									"\\margb".$this->mar_bott.
									"\\headery".$this->head_y.
									"\\footery".$this->foot_y."\r\n";
			if ($this->facing_pages===1) {
				$this->header.= "\\facingp\\gutter".$this->gutter_width."\r\n";
				if ($this->rtl_gutter) {
					$this->header.= "\\rtlgutter";
				}
				$this->header.= "\r\n";
			}
			if ($this->page_numbers >= 0) {
				$pageCoordinates = $this->get_page_numbers();
				$this->header.= $orient."\\pgncont".$pageCoordinates.
												"\\pgndec\\pgnstarts".$this->page_numbers.
												"\\pgnrestart"."\r\n";
			}
			$this->header.= "\\ftnbj\\ftnstart1\\ftnrstcont\\".$this->fnt_type;
			$this->header.= "\r\n";
		}// end of IF
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function _set_encoding($encoding) {
		$this->doc_encoding = $encoding;
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function get_page_numbers($mode="\\",$lnd=false) {
		$p_width = $this->pg_width;$p_height = $this->pg_height;
		if ($lnd) {
			$p_width = $this->pg_height;$p_height = $this->pg_width;
		}
		$pgn_y = ($this->page_numbers_valign == "top") ? $this->head_y : $p_height-$this->foot_y;
		switch ($this->page_numbers_align) {
			case "center": $pgn_x = round($p_width / 2); break;
			case "right": $pgn_x = $this->mar_left; break;
			case "left": $pgn_x = $p_width - $this->mar_right; break;
		}
		if ($this->pn_autoInsert != "0") {$pageCoordinates = $mode."pgnx".$pgn_x.$mode."pgny".$pgn_y;}
		else {$pageCoordinates = "";}
		return $pageCoordinates;
	} // end of function
// ------------------------------------------------------------------------------------------------

//-------------------------------------------------------------------------------------------------
	function twips($num) { // great thanks to Ian M. Nordby for this function
		//added units recognition -- assumes 1pt=1/72in exactly (IMN)...
		if (preg_match('/^(-?[0-9]+(\.[0-9]+)?)[ ]?(mm|cm|q|kyu|in|pt|pts|picas|twips)$/i',trim($num),$regs)) {
			$units = strtolower($regs[3]);
			$num = (float)$regs[1];
		}
		else {
			$units = $this->default_units;
		}
		switch ($units) { //unit type
			case 'cm'   : $sum = round($num*567); break; //centimeters (actual ~566.929)
			case 'mm'   : $sum = round($num*56.7); break; //millimeters (=1/10 cm)
			case 'q'    : //alias of 'kyu'
			case 'kyu'  : $sum = round($num*14.175); break; //Q/kyu (=1/4 mm)
			case 'in'   : $sum = round($num*1440); break; //inches
			case 'pt'   : //alias of 'pts' (points)
			case 'pts'  : $sum = round($num*20); break; //pt/pts (=1/72 in)
			case 'picas': $sum = round($num*240); break; //picas (=12 pts or 1/6 in)
			case 'twips': $sum = round($num); break; //twips (=1/20 pt or 1/1440 in)
		}
		return $sum;
	} // end of function
// ------------------------------------------------------------------------------------------------

//-------------------------------------------------------------------------------------------------
	function font($font) {
		$perm = false;
		switch (strtolower($font)) {
			case "sym": $perm = "f1 "; break;
			case "symbol": $perm = "f1 "; break;
			case "arial": $perm = "f2 "; break;
			case "roman": $perm = "f3 "; break;
			case "courier": $perm = "f4 "; break;
			case "seriff": $perm = "f5 "; break;
			case "garamond": $perm = "f6 "; break;
			case "verdana": $perm = "f7 "; break;
			case "cur": $perm = "f8 "; break;
			case "helvetica": $perm = "f9 "; break;
			case "wingdings": $perm = "f10 "; break;
			case "wingdings2": $perm = "f11 "; break;
			case "wingdings3": $perm = "f12 "; break;
			case "arial_narrow": $perm = "f23 "; break;
			case "futura": $perm = "f21 "; break;
			case "tahoma": $perm = "f22 "; break;
		}
		return $perm;
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function b_style($style) {
		$perms = "";
		switch (strtoupper($style)) {
			case "SHADOWED": $perms .= "brdrsh"; break; //Shadowed border.
			case "DOUBLE": $perms .= "brdrdb"; break; //Double border.
			case "DOTTED": $perms .= "brdrdot"; break; //Dotted border.
			case "DASHED": $perms .= "brdrdash"; break; //Dashed border.
			case "HAIRLINE": $perms .= "brdrhair"; break; //Hairline border.
			case "INSET": $perms .= "brdrinset"; break; //Inset border.
			case "DASH": $perms .= "brdrdashsm"; break; //Dash border (small).
			case "DOT": $perms .= "brdrdashd"; break; //Dot dash border.
			case "DDDASH": $perms .= "brdrdashdd"; break; //Dot dot dash border.
			case "OUTSET": $perms .= "brdroutset"; break; //Outset border.
			case "TRIPLE": $perms .= "brdrtriple"; break; //Triple border.
			//case "Thick": $perms .= "brdrtnthsg"; break; //Thick thin border (small).
			//case "Thin": $perms .= "brdrthtnsg"; break; //Thin thick border (small).
			//case "Thin": $perms .= "brdrtnthtnsg"; break; //Thin thick thin border (small).
			//case "Thick": $perms .= "brdrtnthmg"; break; //Thick thin border (medium).
			//case "Thin": $perms .= "brdrthtnmg"; break; //Thin thick border (medium).
			//case "Thin": $perms .= "brdrtnthtnmg"; break; //Thin thick thin border (medium).
			//case "Thick": $perms .= "brdrtnthlg"; break; //Thick thin border (large).
			//case "Thin": $perms .= "brdrthtnlg"; break; //Thin thick border (large).
			//case "Thin": $perms .= "brdrtnthtnlg"; break; //Thin thick thin border (large).
			case "WAVY": $perms .= "brdrwavy"; break; //Wavy border.
			case "DOUBLEW": $perms .= "brdrwavydb"; break; //Double wavy border.
			case "STRIPED": $perms .= "brdrdashdotstr"; break; //Striped border.
			case "EMBOSS": $perms .= "brdremboss"; break; //Emboss border.
			case "ENGRAVE": $perms .= $slash."brdrengrave"; break; //Engrave border.
		}
		return $perms;
	} // end of function
// ------------------------------------------------------------------------------------------------

//-------------------------------------------------------------------------------------------------
	function def_par() {
		$before = "\\sb".$this->twips($this->def_par_before);
		$after = "\\sa".$this->twips($this->def_par_after);
		$align = "\\q".$this->def_par_align;
		$lines = "\\sl".$this->twips($this->def_par_lines);
		$lindent = "\\li".$this->twips($this->def_par_lindent);
		$rindent = "\\ri".$this->twips($this->def_par_rindent);
		$findent = "\\fi".$this->twips($this->def_par_findent);
		return $before.$after.$align.$lines.$lindent.$rindent.$findent;
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function get_align($variable) {
		switch (strtolower($variable)) {
			case "center": $variable = "c"; break;
			case "left": $variable = "l"; break;
			case "right": $variable = "r"; break;
			case "justify": $variable = "j"; break;
		}
		return $variable;
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function _add_code($code) {
		$this->_started = true;
		if ($this->tbl_level>0) {
			if (isset($this->table_data[$this->tbl_level][$this->curr_tbl_settings[$this->tbl_level]["r_num"]][$this->curr_tbl_settings[$this->tbl_level]["c_num"]])) {
				$this->table_data[$this->tbl_level][$this->curr_tbl_settings[$this->tbl_level]["r_num"]][$this->curr_tbl_settings[$this->tbl_level]["c_num"]] .= $code;
			}
			else {
				$this->table_data[$this->tbl_level][$this->curr_tbl_settings[$this->tbl_level]["r_num"]][$this->curr_tbl_settings[$this->tbl_level]["c_num"]] = $code;
			}
		}
		else {
			$this->_pre_table = false;
			$this->text .= $code;
		}
	} // end of function
// ------------------------------------------------------------------------------------------------


// ------------------------------------------------------------------------------------------------
	function add_text($string) {
		// need to set the correct encoding in the head of XML
		// like this - xml version="1.0" encoding="windows-1251"
		// and after that use the same encoding to decode the scrings
		// plus - use the correct character set in RTF fonts
		// --- 
		if ($this->multilingual_support && strtoupper($this->doc_encoding) != "UTF-8") {
			$string = @mb_convert_encoding($string, $this->doc_encoding, "auto");
		}
		else if ($this->multilingual_support && strtoupper($this->doc_encoding) == "UTF-8") {
			// trying to create an automatic conversion to UNICODE points
    		$string = preg_replace("/[\r\n\t]+/","",$string);
    		$string = preg_replace("/##amp##/msi","&",$string);
    		$string = preg_replace("/&amp;/msi","&",$string);
			$string = convert_to_unicode_points($string);
		}

		// --- 
		$fig_l     = "pag456pag";
		$fig_r     = "pag654pag";
		$slash     = "pp345pag1223pp";
		$star      = "pp346pag1224pp"; // *
		$quote     = "pp375pag1225pp"; // "
		$string    = preg_replace("/[\r\n\t]+/","",$string);
		$string    = preg_replace("/##amp##/msi","&",$string);
		$string    = preg_replace("/&amp;/msi","&",$string);
		//$string    = preg_replace("/&#([0-9]+)/e","chr('\\1')",$string);
		$string    = preg_replace("/&#([0-9]+);/",$slash."u\\1  ",$string);
		$string    = preg_replace("/&#U([0-9]+)/",$slash."u\\1  ",$string);

		if (function_exists('htmlspecialchars_decode')) {
			/* TESTING */ $string    = htmlspecialchars_decode($string);
		}
		$string    = html_entity_decode($string);
		$fin       = rawurlencode($string);
		//$fin       = $string;
		$r_srch = array (
								"'%20'",
								"'%92'",
								"'%'",
								"'\\'5C'",
								"'".$slash."'",
								"'".$fig_l."'",
								"'".$fig_r."'",
								"'".$star."'",
								"'".$quote."'"
							);
		$r_rplc = array (
								" ",
								"%27",
								"\'",
								"\\",
								"\\",
								"{",
								"}",
								"*",
								"\""
							);
		$this->_first_in_cell = false;
		$this->_add_code(preg_replace($r_srch,$r_rplc,$fin));
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function _iIMG($attribs,$EndOfTag) {
		if (!$EndOfTag) {
			$temp_image_data = $this->parse_image($attribs);
			$im_fl = sizeof($this->image_array);
			if ($this->temp_dir !== false) {
				// saving the image data to a tmp file to save memory
				$fp = fopen($this->temp_dir.$this->rnd_proc_nm."_".$this->image_counter, "w");
				if (!$fp) {
					trigger_error ("Failed to write into specified temporary directory - check the permissions.<br>\n", E_USER_ERROR);
				}
				fwrite($fp, $temp_image_data);
				@fclose($fp);
			}
			else {
				$this->image_array[$this->image_counter] = $temp_image_data;
			}
			unset($temp_image_data);
			$this->_add_code($this->image_token.$this->image_counter."nort");
			$this->image_counter++;
		}
		else {
		
		}
	} // end of function
// ------------------------------------------------------------------------------------------------

//-------------------------------------------------------------------------------------------------
	function parse_image($attribs) {
		if (isset($attribs["SRC"])) {
			$img_src = $attribs["SRC"];
		}
		else {$img_src = $this->img_def_src;}
		$img_src = preg_replace("/##amp##/msi","&",$img_src);


		if (isset($attribs["TOP"])) {$img_top = $attribs["TOP"];}
		else {$img_top = $this->img_def_top;}
		if (isset($attribs["WIDTH"])) {$img_width = $attribs["WIDTH"];}
		else {$img_width = $this->img_def_width;}
		if (isset($attribs["HEIGHT"])) {$img_height = $attribs["HEIGHT"]+$img_top;}
		else {$img_height = $this->img_def_height+$img_top;}
		if (isset($attribs["LEFT"])) {$img_left = $attribs["LEFT"];}
		else {$img_left = $this->img_def_left;}
		if (isset($attribs["BORDER"])) {$img_border = $attribs["BORDER"];}
		else {$img_border = $this->img_def_border;}
		if (isset($attribs["ALIGN"])) {$img_align = $attribs["ALIGN"];}
		else {$img_align = $this->img_def_align;}
		if (isset($attribs["WRAP"])) {$img_wrap = $attribs["WRAP"];}
		else {$img_wrap = $this->img_def_wrap;}
		if (isset($attribs["SPACE"])) {$img_space = $attribs["SPACE"];}
		else {$img_space = $this->img_def_space;}
		if (isset($attribs["ANCHOR"])) {$img_anchor = $attribs["ANCHOR"];}
		else {$img_anchor = $this->img_def_anchor;}

		srand((double)microtime()*1000000);
		$randval = rand(1111,9999);$bliptag = rand();$blipuid = bin2hex(rand());
		$im=false;
		//script generated images support
		if (isset($attribs["SCRIPT"])) {
			switch ($attribs["SCRIPT"]) {
				case "JPG": $img_type = "jpeg"; $im=true; break;
				case "JPEG": $img_type = "jpeg"; $im=true; break;
				case "PNG": $img_type = "png"; $im=true; break;
			}
		}
		else {
			preg_match_all("/\.(\w+)/", $img_src, $src);
			switch (strtoupper($src[1][sizeof($src[1])-1])) {
				case "JPG": $img_type = "jpeg"; $im=true; break;
				case "JPEG": $img_type = "jpeg"; $im=true; break;
				case "PNG": $img_type = "png"; $im=true; break;
			}
		}
		switch (strtoupper($img_wrap)) {
			case "NO": $img_wrap = 3; break;
			case "AROUND": $img_wrap = 2; break;
			case "UPDOWN": $img_wrap = 1; break;
		}
		//--- ALIGN
		switch (strtoupper($img_anchor)) {
			case "PARA": $a_left = true; break;
			case "PAGE": $a_left = 0; break;
			case "MARGIN": $a_left = true; break;
			case "INCELL": $a_left = true; break;
		}
		switch (strtoupper($img_align)) {
			case "RIGHT":
					if ($a_left) { $a_left = $this->mar_right + $this->mar_left; }
					$del = $this->pg_width - $a_left - $this->twips($img_width);
					break;
			case "LEFT":
					$del = 0;
					break;
			case "CENTER":
					if ($a_left) { $a_left = $this->mar_right + $this->mar_left; }
					$del = round((($this->pg_width - $a_left) / 2) - ($this->twips($img_width) / 2));
					break;
		}
		//--- RAW PICTURE -------------------------
		if (isset($attribs["RAW"])) {
			$f_image = "{\\pict\\picscalex100\\picscaley100\\piccropl0\\piccropr0\\piccropt0\\piccropb0\\picw".
							round($this->twips($img_width)*2)."\\pich".round($this->twips($img_height)*2).
							"\\picwgoal".$this->twips($img_width)."\\pichgoal".$this->twips($img_height)."\\wmetafile8";
			$f_image .= "\\bliptag".$bliptag."{\\*\\blipuid ".$blipuid."}";

			if ($im) { $f_image .= $this->openimage(preg_replace("/\"/msi","",$img_src)); }
			else { $f_image .= $this->openimage("logo.png"); }
			return $f_image."}";
		}
		//--- PICTURE PARAMS ----------------------
		$sps = $this->twips($img_space);
		$sps = $img_space*36004;
		$x1 = $this->twips($img_left)+$del;
		$x2 = $x1 + $this->twips($img_width);
		$y1 = $this->twips($img_top);
		$y2 = $this->twips($img_height);
		////////////////
		$f_image = "{\\shp{\\*\\shpinst\\shpleft".$x1."\\shpright".$x2."\\shptop".$y1."\\shpbottom".$y2;
		$f_image .= "\\shpz0\\shplid".$randval;
		$f_image .= "\\shpwr".$img_wrap."\\shpwrk0";
		$f_image .= "{\\sp{\\sn fLine}{\\sv ".$img_border."}}";
		$f_image .= "{\\sp{\\sn shapeType}{\\sv 75}}";

		if (strtoupper($img_anchor)=="INCELL") {
			$f_image .= "{\\sp{\\sn fLayoutInCell}{\\sv 1}}";
			$f_image .= "{\\sp{\\sn fAllowOverlap}{\\sv 0}}";
		}
		else {
			$f_image .= "\\shpbx".strtolower($img_anchor)."\\shpby".strtolower($img_anchor);
			$f_image .= "{\\sp{\\sn fBehindDocument}{\\sv 1}}";
			$f_image .= "{\\sp{\\sn dxWrapDistLeft}{\\sv ".$sps."}}";
			$f_image .= "{\\sp{\\sn dxWrapDistRight}{\\sv ".$sps."}}";
			$f_image .= "{\\sp{\\sn dyWrapDistTop}{\\sv ".$sps."}}";
			$f_image .= "{\\sp{\\sn dyWrapDistBottom}{\\sv ".$sps."}}";
		}
		$f_image .= "{\\sp{\\sn pib}{\\sv {\\pict\\".$img_type."blip\\picw".round($img_width)."\\pich".round($img_height)."\\picscalex100\\picscaley100";
		$f_image .= "\\bliptag".$bliptag."{\\*\\blipuid ".$blipuid."}";

		if ($im) { $f_image .= $this->openimage(preg_replace("/\"/msi","",$img_src)); }
		else { $f_image .= $this->openimage("logo.png"); }

		$f_image .= "}}}}}";
		return $f_image;
	}// end of function
//-------------------------------------------------------------------------------------------------



// ------------------------------------------------------------------------------------------------
	function _iPAGE($attribs,$EndOfTag) {
		if (!$EndOfTag) {
			$this->_add_code("\\page ");
		}
		else {
		
		}
	} // end of function
// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
	function _iHIDDEN($attribs,$EndOfTag) {
		if (!$EndOfTag) {
			$this->_add_code("{\\v ");
		}
		else {
			$this->_add_code("}");
		}
	} // end of function
// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
	function _iCPAGENUM($attribs,$EndOfTag) {
		if (!$EndOfTag) {
			$this->_add_code("\\chpgn ");
		}
		else {
		
		}
	} // end of function
// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
	function _iTPAGENUM($attribs,$EndOfTag) {
		if (!$EndOfTag) {
			$this->_add_code("{\\field{\\*\\fldinst  NUMPAGES }}");
		}
		else {
		
		}
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function _iHEADER($attribs,$EndOfTag) {
		if (!$EndOfTag) {
			$this->_add_code("{\\header \\pard\\plain\\".
			$this->font($this->font_face)."\\fs".($this->font_size * 2).
			" \\q".$this->get_align($this->header_align)." ");
		}
		else {
			$this->_add_code("\\par }");
		}
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function _iHEADERR($attribs,$EndOfTag) {
		if (!$EndOfTag) {
			$this->_add_code("{\\headerr \\pard\\plain\\".
			$this->font($this->font_face)."\\fs".($this->font_size * 2).
			" \\q".$this->get_align($this->header_align)." ");
		}
		else {
			$this->_add_code("\\par }");
		}
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function _iHEADERL($attribs,$EndOfTag) {
		if (!$EndOfTag) {
			$this->_add_code("{\\headerl \\pard\\plain\\".
			$this->font($this->font_face)."\\fs".($this->font_size * 2).
			" \\q".$this->get_align($this->header_align)." ");
		}
		else {
			$this->_add_code("\\par }");
		}
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function _iFOOTER($attribs,$EndOfTag) {
		if (!$EndOfTag) {
			$this->_add_code("{\\footer \\pard\\plain\\".
			$this->font($this->font_face)."\\fs".($this->font_size * 2).
			" \\q".$this->get_align($this->footer_align)." ");
		}
		else {
			$this->_add_code("\\par }");
		}
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function _iFOOTERR($attribs,$EndOfTag) {
		if (!$EndOfTag) {
			$this->_add_code("{\\footerr \\pard\\plain\\".
			$this->font($this->font_face)."\\fs".($this->font_size * 2).
			" \\q".$this->get_align($this->footer_align)." ");
		}
		else {
			$this->_add_code("\\par }");
		}
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function _iFOOTERL($attribs,$EndOfTag) {
		if (!$EndOfTag) {
			$this->_add_code("{\\footerl \\pard\\plain\\".
			$this->font($this->font_face)."\\fs".($this->font_size * 2).
			" \\q".$this->get_align($this->footer_align)." ");
		}
		else {
			$this->_add_code("\\par }");
		}
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function _iFOOTNOTE($attribs,$EndOfTag) {
		if (!$EndOfTag) {
			$settings = "";
			$settings .= "{\\super \\chftn{\\footnote \\chftn\\pard\\plain ";
			$settings .= "\\tx200\\li200\\ri0\\fi-200 \\tab ";
			$settings .= "\\".$this->font($this->fnt_fontf)."\\fs".($this->fnt_fonts*2)."\\cf11 \\".$this->fnt_fontd." ";
			
			$this->_add_code($settings);
		}
		else {
			$this->_add_code("}}");
		}
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function _iSECTION($attribs,$EndOfTag) {
		if (!$EndOfTag) {
			$settings = "\\sect\\sectd\\pgncont\r\n";
			if (isset($attribs["NOBREAK"])) {
				$settings .= "\\sbknone ";
			}
			if (isset($attribs["COLUMNS"])) {
				$settings .= "\\cols".$attribs["COLUMNS"]." ";
			}
			else { $settings .= "\\cols1 "; }
			if (isset($attribs["LANDSCAPE"]) && !isset($attribs["PORTRAIT"])) {
				$settings .= "\\lndscpsxn";
				$settings .= "\\pghsxn".$this->pg_width;
				$settings .= "\\pgwsxn".$this->pg_height;
				$settings .= "\\marglsxn".$this->mar_left;
				$settings .= "\\margrsxn".$this->mar_right;
				$settings .= "\\margtsxn".$this->mar_top;
				$settings .= "\\margbsxn".$this->mar_bott;
				$settings .= "\\headery".$this->head_y."\\footery".$this->foot_y;
				$settings .= $this->get_page_numbers("\\",1);
			}
			if (!isset($attribs["LANDSCAPE"]) && isset($attribs["PORTRAIT"])) {
				$settings .= "\\lndscpsxn";
				$settings .= "\\pgwsxn".$this->pg_width;
				$settings .= "\\pghsxn".$this->pg_height;
				$settings .= "\\marglsxn".$this->mar_left;
				$settings .= "\\margrsxn".$this->mar_right;
				$settings .= "\\margtsxn".$this->mar_top;
				$settings .= "\\margbsxn".$this->mar_bott;
				$settings .= "\\headery".$this->head_y."\\footery".$this->foot_y;
				$settings .= $this->get_page_numbers("\\");
			}
			if (!isset($attribs["LANDSCAPE"]) && !isset($attribs["PORTRAIT"])) {
				$settings .= "\\margl".$this->mar_left.
								"\\margr".$this->mar_right.
								"\\margt".$this->mar_top.
								"\\margb".$this->mar_bott.
								"\\headery".$this->head_y.
								"\\footery".$this->foot_y."\r\n";
				$settings .= $this->get_page_numbers("\\");
			}

			if (isset($attribs["PN_START"])) {
				$pn_align = (isset($attribs["PN_ALIGN"])) ? $attribs["PN_ALIGN"] : $this->page_numbers_align;
				$pn_valign = (isset($attribs["PN_VALIGN"])) ? $attribs["PN_VALIGN"] : $this->page_numbers_valign;
				switch (strtolower($pn_align)){
					case "center": $pgn_x = round($this->pg_width / 2); break;
					case "right": $pgn_x = $this->mar_left; break;
					case "left": $pgn_x = $this->pg_width - $this->mar_right; break;
				}
				$pgn_y = (strtolower($pn_valign) == "top") ? $this->head_y : $this->pg_height-$this->foot_y;
				if ($this->pn_autoInsert == "1") {$pageCoordinates = $slash."pgnx".$pgn_x.$slash."pgny".$pgn_y;}
				else {$pageCoordinates = "";}

				$settings .= "\\pgncont".$pageCoordinates."\\pgndec\\pgnstarts".$attribs["PN_START"]."\\pgnrestart \r\n";
				$this->_add_code($settings);
			}
			else {
				$this->_add_code($settings);
			}
		}
		else { // END OF TAG
			
		}
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function _iFONT($attribs,$EndOfTag) {
		if (!$EndOfTag) {
			$settings = "";
			if (isset($attribs["FACE"])) {
				$settings .= "\\".$this->font($attribs["FACE"]);
			}
			if (isset($attribs["SIZE"])) {
				$settings .= "\\fs".($attribs["SIZE"]*2)." ";
			}
			if (isset($attribs["COLOR"])) {
				$settings .= "\\cf".($this->color_table[$attribs["COLOR"]]["NUM"]+11)." ";
			}
			$this->_add_code("{".$settings);
		}
		else {
			$this->_add_code("}");
		}
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function _iNEWCOL() {
		if (!$EndOfTag) {
			$this->_add_code("\\column ");
		}
		else {
		
		}
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function _iA($attribs,$EndOfTag) {
		if (!$EndOfTag) {
			$settings = "{\\field{\\*\\fldinst  ";
			if (isset($attribs["LOCAL"])) {
				$settings .= "HYPERLINK  \\\\l \"".$attribs["LOCAL"]."\" ";
			}
			else if (isset($attribs["FILE"])) {
				$settings .= "HYPERLINK  \"".$attribs["FILE"]."\" ";
			}
			$settings .= "}";
			$settings .= "{\\fldrslt \\".$this->font($this->h_link_fontf)."\\fs".($this->h_link_fonts*2)."\\cf10\\".$this->h_link_fontd." ";
			$this->_add_code($settings);
		}
		else {
			$this->_add_code("\\cf10}}");
		}
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function _iID($attribs,$EndOfTag) {
		if (!$EndOfTag) {
			if (isset($attribs["NAME"])) {
				$this->_add_code("{\\*\\bkmkstart ".$attribs["NAME"]."}{\\*\\bkmkend ".$attribs["NAME"]."}");
			}
		}
		else {
		
		}
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function _iP($attribs,$EndOfTag) {
		if (!$EndOfTag) {
			$d_before    = "\\sb".$this->twips($this->def_par_before);
			$d_after     = "\\sa".$this->twips($this->def_par_after);
			$d_align     = "\\q".$this->get_align($this->def_par_align);
			$d_lines     = "\\sl".$this->twips($this->def_par_lines);
			$d_lindent   = "\\li".$this->twips($this->def_par_lindent);
			$d_rindent   = "\\ri".$this->twips($this->def_par_rindent);
			$d_findent   = "\\fi".$this->twips($this->def_par_findent);
			$d_def_par   = $d_before.$d_after.$d_align.$d_lines.$d_lindent.$d_rindent.$d_findent;
			$settings = "";
			if (isset($attribs["ALIGN"])) {
				$f_align = "\\q".$this->get_align($attribs["ALIGN"]);
			}
			else { $f_align = $d_align; }
			if (isset($attribs["BEFORE"])) {
				$f_before = "\\sb".$this->twips($attribs["BEFORE"]);
			}
			else { $f_before = $d_before; }
			if (isset($attribs["AFTER"])) {
				$f_after = "\\sa".$this->twips($attribs["AFTER"]);
			}
			else { $f_after = $d_after; }
			if (isset($attribs["LINES"])) {
				$f_lines = "\\sl".$this->twips($attribs["LINES"]);
			}
			else { $f_lines = $d_lines; }
			if (isset($attribs["LINDENT"])) {
				$f_lindent = "\\li".$this->twips($attribs["LINDENT"]);
			}
			else { $f_lindent = $d_lindent; }
			if (isset($attribs["RINDENT"])) {
				$f_rindent = "\\ri".$this->twips($attribs["RINDENT"]);
			}
			else { $f_rindent = $d_rindent; }
			if (isset($attribs["FINDENT"])) {
				$f_findent = "\\fi".$this->twips($attribs["FINDENT"]);
			}
			else { $f_findent = $d_findent; }
			// --- TABULATIONS ---------------------
			if (isset($attribs["TALIGN"])) {
				$f_talign_ar = preg_split("/[,. ]/",preg_replace("/['\"]/","",$attribs["TALIGN"]));
			}
			if (isset($attribs["LEAD"])) {
				$f_lead_ar = preg_split("/[,. ]/",preg_replace("/['\"]/","",$attribs["LEAD"]));
			}
			else { $f_lead = ""; }
			if (isset($attribs["TSIZE"])) {
				$f_tsize_ar = preg_split("/[,. ]/",preg_replace("/['\"]/","",$attribs["TSIZE"]));
			}
			else { $f_tsize = ""; }
			// -------------------------
			$f_tabs = "";
			if (isset($f_tsize_ar)) {
				for ($ll=0;$ll<sizeof($f_tsize_ar);$ll++) {
					if ($f_tsize_ar[$ll]!="") {
						$f_tsize_ar[$ll] = ($f_tsize_ar[$ll]) ? $f_tsize_ar[$ll] : 10;
						if (isset($f_talign_ar[$ll])) {
							switch ($f_talign_ar[$ll]) {
								case "right": $talign_tmp = $slash."tqr"; break;
								case "center": $talign_tmp = $slash."tqc"; break;
								case "decimal": $talign_tmp = $slash."tqdec"; break;
								default: $talign_tmp = ""; break;
							}
						}
						else { $talign_tmp = ""; }
						$f_tabs .= "\\tl".$f_lead_ar[$ll].$talign_tmp."\\tx".$this->twips($f_tsize_ar[$ll]);
					}
				}
			}
			// -------------------------
			$settings .= $f_tabs.$f_before.$f_after.$f_align.$f_lines.$f_lindent.$f_rindent.$f_findent;
			if (isset($attribs["PAR_KEEP"])) {
				$settings .= "\\keep";
			}

			if ($this->inTable) {$mdefp = "";}
			else {$mdefp = "\\pard";}
			$tyu = $mdefp;
//			if ($this->_first_par) {
//				$tyu = $mdefp;
//			}
//			else {
				if ($this->_first_par || $this->_first_in_cell) {$tyu = $mdefp;}
				else {$tyu = "\\par".$mdefp;} // FIXES SOMETHING ...
				if ($this->_first_in_cell) {
					$this->_first_in_cell = false;
				}
				//$tyu = $mdefp;
				//else {$tyu = $slash."par".$mdefp;}
//			}
			$this->_add_code($tyu.$settings." ");
			$this->_first_par=0;
		}
		else { // END OF TAG
		
		}
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function _iB($attribs,$EndOfTag) {
		if (!$EndOfTag) {
			$this->_add_code("\\b ");
		}
		else {
			$this->_add_code("\\b0 ");
		}
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function _iI($attribs,$EndOfTag) {
		if (!$EndOfTag) {
			$this->_add_code("\\i ");
		}
		else {
			$this->_add_code("\\i0 ");
		}
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function _iU($attribs,$EndOfTag) {
		if (!$EndOfTag) {
			$this->_add_code("\\ul ");
		}
		else {
			$this->_add_code("\\ul0 ");
		}
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function _iBR($attribs,$EndOfTag) {
		if (!$EndOfTag) {
			$this->_add_code("\\line ");
		}
		else {
			
		}
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function _iSUP($attribs,$EndOfTag) {
		if (!$EndOfTag) {
			$this->_add_code("{\\super ");
		}
		else {
			$this->_add_code("}");
		}
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function _iSUB($attribs,$EndOfTag) {
		if (!$EndOfTag) {
			$this->_add_code("{\\sub ");
		}
		else {
			$this->_add_code("}");
		}
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function _iHR($attribs,$EndOfTag) {
		if (!$EndOfTag) {
			$settings = "\\brdrb\\brdrs";
			if (isset($attribs["STYLE"])) {
				$settings .= "\\".$this->b_style($attribs["STYLE"]);
			}
			if (isset($attribs["COLOR"])) {
				// TODO $settings .= "\\brdrcf".($attribs["COLOR"]);
			}
			if (isset($attribs["SIZE"])) {
				$settings .= "\\brdrw".($attribs["SIZE"]);
			}
			else {
				$settings .= "\\brdrw15";
			}
			$settings .= "\\brsp20  ";
			if (!$this->inTable) {
				$settings .= "\\par\\pard ";
			}
			$this->_add_code($settings);
		}
		else {
		
		}
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function _iTAB($attribs,$EndOfTag) {
		if (!$EndOfTag) {
			$this->_add_code("\\tab ");
		}
		else {

		}
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function _iTABLE($attribs,$EndOfTag) {
		if (!$EndOfTag) {
			$this->inTable = true;
			$this->tbl_level++;
			//echo $this->tbl_level."<br>";

			$this->curr_tbl_settings[$this->tbl_level] = array();
			$this->tbl_all_data_head[$this->tbl_level] = array();
			$this->tbl_all_data_body[$this->tbl_level] = array();
			$this->tbl_all_data_wdth[$this->tbl_level] = array();
			$this->tr_hd_mass[$this->tbl_level] = array();
			$this->table_data[$this->tbl_level] = array();

			if (isset($attribs["CELLPADDING"])) { $tbl_cellpadding = $this->twips($attribs["CELLPADDING"]); }
			else {$tbl_cellpadding = $this->twips($this->tbl_def_cellpadding);}
			if (isset($attribs["BORDER"])) { $tbl_border = $attribs["BORDER"];}
			else {$tbl_border = $this->tbl_def_border;}
			if (isset($attribs["WIDTH"])) { $tbl_width = $attribs["WIDTH"]; }
			else {$tbl_width = $this->tbl_def_width;}
			if (isset($attribs["ALIGN"])) { $tbl_align = $attribs["ALIGN"]; }
			else {$tbl_align = $this->tbl_def_align;}
			if (isset($attribs["VALIGN"])) { $tbl_valign = $attribs["VALIGN"]; }
			else {$tbl_valign = $this->tbl_def_valign;}
			if (isset($attribs["BGCOLOR"])) { $tbl_bgcolor = $attribs["BGCOLOR"]; }
			else {$tbl_bgcolor = $this->tbl_def_bgcolor;}
			if (isset($attribs["COLOR"])) { $tbl_bgccolor = ($this->color_table[$attribs["COLOR"]]["NUM"]+11); } // TODO
			else {$tbl_bgccolor = $this->tbl_def_bgcolor;}
			if (isset($attribs["BORD_COLOR"])) {
				//$brd_color = "\\brdrcf".$attribs["BORD_COLOR"]."";
				$brd_color = "\\brdrcf".($this->color_table[$attribs["BORD_COLOR"]]["NUM"]+11)."";
			}
			else {$brd_color = "";}
			if (isset($attribs["TABLEKEEP"])) { $tbl_keep_all = "\\keep\\keepn "; }
			else {$tbl_keep_all = "";}
			/////////////
			if (preg_match("/%/",$tbl_width)) {
				$yyy = strtr($tbl_width, "%", "");
				$this->tb_wdth[$this->tbl_level] = round((($this->pg_width - ($this->mar_left + $this->mar_right)) / 100) * $yyy);
			}
			else { $this->tb_wdth[$this->tbl_level] = $this->twips($tbl_width); }
			$cells_wdth = 0;
			$cells_hght = 0;

			$this->curr_tbl_settings[$this->tbl_level]["tbl_cellpadding"] = $tbl_cellpadding;
			$this->curr_tbl_settings[$this->tbl_level]["tbl_border"] = $tbl_border;
			$this->curr_tbl_settings[$this->tbl_level]["tbl_width"] = $tbl_width;
			$this->curr_tbl_settings[$this->tbl_level]["tbl_align"] = $tbl_align;
			$this->curr_tbl_settings[$this->tbl_level]["tbl_valign"] = $tbl_valign;
			$this->curr_tbl_settings[$this->tbl_level]["tbl_bgcolor"] = $tbl_bgcolor;
			$this->curr_tbl_settings[$this->tbl_level]["tbl_bgccolor"] = $tbl_bgccolor;
			$this->curr_tbl_settings[$this->tbl_level]["brd_color"] = $brd_color;
			$this->curr_tbl_settings[$this->tbl_level]["tbl_keep_all"] = $tbl_keep_all;

			$this->curr_tbl_settings[$this->tbl_level]["r_num"] = 0;
			$this->curr_tbl_settings[$this->tbl_level]["c_num"] = 0;

			$this->curr_tbl_settings[$this->tbl_level]["cells_wdth"] = 0;

		}
		else {
			$midle_res = $this->tbl_full(
				$this->tbl_all_data_head[$this->tbl_level],
				$this->tbl_all_data_body[$this->tbl_level],
				$this->tbl_all_data_wdth[$this->tbl_level],
				$this->curr_tbl_settings[$this->tbl_level]["cells_wdth"]
				);

			$this->tbl_level--;

			if ($this->tbl_level>0) {
				if (isset($this->table_data[$this->tbl_level][$this->curr_tbl_settings[$this->tbl_level]["r_num"]][$this->curr_tbl_settings[$this->tbl_level]["c_num"]])) {
					$this->_add_code("\\par".$midle_res);
				}
				else {
					$this->_add_code($midle_res);
				}
			}
			else {
				if (!$this->_started || $this->_pre_table) {
					$this->_add_code($midle_res);
				}
				else {$this->_add_code("\\par".$midle_res);}
			}
			//$this->_add_code($midle_res);
			unset($midle_res);
			$this->inTable = false;
			if ($this->tbl_level == 0) {
				$this->_pre_table = true;
			}
		}
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function _iROW($attribs,$EndOfTag) {
		if (!$EndOfTag) {
			$this->curr_tbl_settings[$this->tbl_level]["num_t"] = 0;
			//$this->curr_tbl_settings[$this->tbl_level]["r_num"]++;
			$this->curr_tbl_settings[$this->tbl_level]["c_num"] = 0;
			$keep_row = (isset($attribs["ROWKEEP"])) ? "\\trkeep" : "";

			if (isset($attribs["CELLPADDING"])) { $tr_cellpadding = $this->twips($attribs["CELLPADDING"]); }
			else { $tr_cellpadding = $this->curr_tbl_settings[$this->tbl_level]["tbl_cellpadding"]; }
			if (isset($attribs["BORDER"])) { $tr_border = $attribs["BORDER"]; }
			else { $tr_border = $this->curr_tbl_settings[$this->tbl_level]["tbl_border"]; }
			if (isset($attribs["WIDTH"])) { $tr_width = $attribs["WIDTH"]; }
			else {$tr_width = $this->curr_tbl_settings[$this->tbl_level]["tbl_width"];}
			if (isset($attribs["HEIGHT"])) { $tr_height = $attribs["HEIGHT"]; }
			else {$tr_height = 0;}
			if (isset($attribs["ALIGN"])) { $tr_align = $attribs["ALIGN"]; }
			else {$tr_align = $this->row_def_align;}
			if (isset($attribs["VALIGN"])) { $tr_valign = $attribs["VALIGN"]; }
			else { $tr_valign = $this->curr_tbl_settings[$this->tbl_level]["tbl_valign"]; }
			if (isset($attribs["BGCOLOR"])) { $tr_bgcolor = $attribs["BGCOLOR"]; }
			else { $tr_bgcolor = $this->curr_tbl_settings[$this->tbl_level]["tbl_bgcolor"]; }
			if (isset($attribs["COLOR"])) { $tr_bgccolor = ($this->color_table[$attribs["COLOR"]]["NUM"]+11); } // TODO
			else { $tr_bgccolor = $this->curr_tbl_settings[$this->tbl_level]["tbl_bgccolor"]; }
			if (isset($attribs["HEADING"])) { $tr_header = "\\trhdr"; }
			else { $tr_header = ""; }

			///////////////////// - ROW
			if (preg_match("/%/",$tr_width)) {
				$yyy = strtr($tr_width,"%", "");
				$tr_twips_wdth = round((($this->pg_width - ($this->mar_left + $this->mar_right)) / 100) * $yyy);
			}
			else { $tr_twips_wdth = $this->twips($tr_width); }
			if ($tr_height!=0){ $tr_twips_height = "\\trrh".$this->twips($tr_height); }
			else {$tr_twips_height = "\\trrh100"; }

			switch ($this->curr_tbl_settings[$this->tbl_level]["tbl_align"]) {
				case "CENTER": $tbl_all_all = "\\trqc "; break;
				case "LEFT": $tbl_all_all = "\\trql "; break;
				case "RIGHT": $tbl_all_all = "\\trqr "; break;
				default: $tbl_all_all = ""; break;
			}
			//----
			$tr_padding = "\\trpaddl".$tr_cellpadding."\\trpaddt".$tr_cellpadding."\\trpaddb".$tr_cellpadding."\\trpaddr".$tr_cellpadding."\\trpaddfl3\\trpaddft3\\trpaddfb3\\trpaddfr3";
			$tr_res = "\\pard\\trowd".$keep_row.$tr_header.$tbl_all_all.$tr_padding."\\trgaph100".$tr_twips_height."\\trleft36\r\n";
			//----
			$this->tr_hd_mass[$this->tbl_level][] = $tr_res;
			////////////////
			$cells_row_hght = 0;
			$cells_row_wdth = 0;


			$this->curr_tbl_settings[$this->tbl_level]["tr_border"] = $tr_border;
			$this->curr_tbl_settings[$this->tbl_level]["tr_align"] = $tr_align;
			$this->curr_tbl_settings[$this->tbl_level]["tr_valign"] = $tr_valign;
			$this->curr_tbl_settings[$this->tbl_level]["tr_bgcolor"] = $tr_bgcolor;
			$this->curr_tbl_settings[$this->tbl_level]["tr_bgccolor"] = $tr_bgccolor;
			$this->curr_tbl_settings[$this->tbl_level]["tr_twips_wdth"] = $tr_twips_wdth;
			$this->curr_tbl_settings[$this->tbl_level]["tr_twips_height"] = $tr_twips_height;
			
			$this->curr_tbl_settings[$this->tbl_level]["cells_row_wdth"] = 0;
			
		}
		else {
			
			if ($this->curr_tbl_settings[$this->tbl_level]["cells_wdth"]<$this->curr_tbl_settings[$this->tbl_level]["cells_row_wdth"]) {
				$this->curr_tbl_settings[$this->tbl_level]["cells_wdth"]=$this->curr_tbl_settings[$this->tbl_level]["cells_row_wdth"];
			}
			$this->curr_tbl_settings[$this->tbl_level]["r_num"]++;
		}
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function _iCELL($attribs,$EndOfTag) {
		if (!$EndOfTag) {
			$this->_first_in_cell = true;
			//$this->curr_tbl_settings[$this->tbl_level]["c_num"]++;

			if (isset($attribs["COLSPAN"])) { $td_colspan = $attribs["COLSPAN"]; }
			else {$td_colspan =1;}
			if (isset($attribs["ROWSPAN"])) { $td_rowspan = $attribs["ROWSPAN"];  }
			else {$td_rowspan =1;}
			if (isset($attribs["TEXT_FLOW"])) {
				$td_txt_flow = "\\cltxlrtb";
				switch (strtolower($attribs["TEXT_FLOW"])) {
					case "lrtb": $td_txt_flow="\\cltxlrtb"; break; //Text in a cell flows from left to right and top to bottom (default)
					case "rltb": $td_txt_flow="\\cltxtbrl"; break; //Text in a cell flows right to left and top to bottom.
					case "lrbt": $td_txt_flow="\\cltxbtlr"; break; //Text in a cell flows left to right and bottom to top.
					case "lrtbv": $td_txt_flow="\\cltxlrtbv"; break; //Text in a cell flows left to right and top to bottom, vertical.
					case "rltbv": $td_txt_flow="\\cltxtbrlv"; break; //Text in a cell flows top to bottom and right to left, vertical.
				}
			}
			else {$td_txt_flow = "";}
			if (isset($attribs["BORDER"])) { $td_border = $attribs["BORDER"];  }
			else {$td_border = $this->curr_tbl_settings[$this->tbl_level]["tr_border"];}
			if (isset($attribs["WIDTH"])) { $td_width = $attribs["WIDTH"]; }
			else {$td_width = "no";}
			if (isset($attribs["ALIGN"])) { $td_align = $attribs["ALIGN"]; }
			else {$td_align = $this->curr_tbl_settings[$this->tbl_level]["tr_align"];}
			if (isset($attribs["VALIGN"])) { $td_valign = $attribs["VALIGN"]; }
			else {$td_valign = $this->curr_tbl_settings[$this->tbl_level]["tr_valign"];}
			if (isset($attribs["BGCOLOR"])) { $td_bgcolor = $attribs["BGCOLOR"]; }
			else {$td_bgcolor = $this->curr_tbl_settings[$this->tbl_level]["tr_bgcolor"];}
			if (isset($attribs["COLOR"])) { $td_bgccolor = ($this->color_table[$attribs["COLOR"]]["NUM"]+11);}
			else {$td_bgccolor = $this->curr_tbl_settings[$this->tbl_level]["tr_bgccolor"];}
			$brd_color = $this->curr_tbl_settings[$this->tbl_level]["brd_color"];

			switch (strtoupper($td_valign)) {
				case "TOP": $td_val_f = "\\clvertalt"; break;
				case "MIDDLE": $td_val_f = "\\clvertalc"; break;
				case "BOTTOM": $td_val_f = "\\clvertalb"; break;
			}

			if ($td_bgcolor==0 && $td_bgccolor==0) { $td_bg_f = ""; }
			else if ($td_bgccolor>0) { $td_bgcolor = $td_bgccolor; $td_bg_f = "\\clcbpat".$td_bgcolor; }
			else { $td_bgcolor = $td_bgcolor*100; $td_bg_f = "\\clcbpat8\\clshdng".$td_bgcolor; }

			if ($td_border==1) {
				$td_brd_f = "\\clbrdrt\\brdrs\\brdrw10".$brd_color."\\clbrdrl\\brdrs\\brdrw10".$brd_color."\\clbrdrb\\brdrs\\brdrw10".$brd_color."\\clbrdrr\\brdrs\\brdrw10".$brd_color;
			}
			else {
				$td_brd_f = "";
				if (preg_match("/t/i",$td_border)) { $td_brd_f .= "\\clbrdrt\\brdrs\\brdrw10".$brd_color; }
				if (preg_match("/b/i",$td_border)) { $td_brd_f .= "\\clbrdrb\\brdrs\\brdrw10".$brd_color; }
				if (preg_match("/r/i",$td_border)) { $td_brd_f .= "\\clbrdrr\\brdrs\\brdrw10".$brd_color; }
				if (preg_match("/l/i",$td_border)) { $td_brd_f .= "\\clbrdrl\\brdrs\\brdrw10".$brd_color; }
			}
			if (preg_match("/%/",$td_width)) {
				$ooo = strtr($td_width, "%", "");
				$td_wdth_mass[] = round(($this->curr_tbl_settings[$this->tbl_level]["tr_twips_wdth"] / 100) * $ooo);
				$tmp_wdth = round(($this->curr_tbl_settings[$this->tbl_level]["tr_twips_wdth"] / 100) * $ooo);
			}
			else if ($td_width=="no") {$td_wdth_mass[] = "no"; $tmp_wdth = "no"; }
			else { $td_wdth_mass[] = $this->twips($td_width); $tmp_wdth = $this->twips($td_width); }

			$tmp_head = $this->curr_tbl_settings[$this->tbl_level]["tbl_keep_all"].$td_val_f.$td_bg_f.$td_brd_f.$td_txt_flow;

			$this->curr_tbl_settings[$this->tbl_level]["td_colspan"] = $td_colspan;
			$this->curr_tbl_settings[$this->tbl_level]["td_rowspan"] = $td_rowspan;
			$this->curr_tbl_settings[$this->tbl_level]["td_align"] = $td_align;
			$this->curr_tbl_settings[$this->tbl_level]["tmp_head"] = $tmp_head;
			$this->curr_tbl_settings[$this->tbl_level]["tmp_wdth"] = $tmp_wdth;



			
		}
		else { // END OF CELL TAG


//// ACTUAL DATA PLACEMENT

			switch ($this->curr_tbl_settings[$this->tbl_level]["td_align"]) {
				case "CENTER": $td_text = "\\qc "; break;
				case "LEFT": $td_text = "\\ql "; break;
				case "RIGHT": $td_text = "\\qr "; break;
				case "JUSTIFY": $td_text = "\\qj "; break;
				default: $td_text = "\\ql "; break;
			}
			$td_text .= $this->table_data[$this->tbl_level][$this->curr_tbl_settings[$this->tbl_level]["r_num"]][$this->curr_tbl_settings[$this->tbl_level]["c_num"]];
//// END - ACTUAL DATA PLACEMENT

			
			///////////////////////////////////
			
			if ($this->tbl_level>1) { // nested
				$tmp_body = "\\intbl \\itap".$this->tbl_level." ".$td_text."\\nestcell \\pard \r\n";
			}
			else {
				$tmp_body = "\\intbl ".$td_text."\\cell \\pard \r\n";
			}
			//////////////////////////////////
			for ($gh=0;$gh<$this->curr_tbl_settings[$this->tbl_level]["td_rowspan"];$gh++) {
				for ($jh=0;$jh<$this->curr_tbl_settings[$this->tbl_level]["td_colspan"];$jh++) {
					$this->tbl_all_data_head[$this->tbl_level][$this->curr_tbl_settings[$this->tbl_level]["r_num"]][$this->curr_tbl_settings[$this->tbl_level]["num_t"]][$gh][$jh] = $this->curr_tbl_settings[$this->tbl_level]["tmp_head"];
					$this->tbl_all_data_body[$this->tbl_level][$this->curr_tbl_settings[$this->tbl_level]["r_num"]][$this->curr_tbl_settings[$this->tbl_level]["num_t"]][$gh][$jh] = $tmp_body;
					$this->tbl_all_data_wdth[$this->tbl_level][$this->curr_tbl_settings[$this->tbl_level]["r_num"]][$this->curr_tbl_settings[$this->tbl_level]["num_t"]][$gh][$jh] = $this->curr_tbl_settings[$this->tbl_level]["tmp_wdth"];
				}
			}
			$this->curr_tbl_settings[$this->tbl_level]["num_t"]++;
			$this->curr_tbl_settings[$this->tbl_level]["cells_row_wdth"]++;
			if ($this->curr_tbl_settings[$this->tbl_level]["td_colspan"]>1) {
				$this->curr_tbl_settings[$this->tbl_level]["cells_row_wdth"]+=$this->curr_tbl_settings[$this->tbl_level]["td_colspan"]-1;
			}
			///////////////

			$this->curr_tbl_settings[$this->tbl_level]["c_num"]++;

		
		}
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function _process_attribs($attr) {
		if (isset($attr["COLOR"])) {
			$this->add_color($attr["COLOR"]);
		}
		if (isset($attr["BORD_COLOR"])) {
			$this->add_color($attr["BORD_COLOR"]);
		}
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function add_color($color) {
		if (!isset($this->color_table[$color])) {
			$curr_num = sizeof($this->color_table)+1;
			$this->color_table[$color]["VALUE"] = $this->get_rtf_color($color);
			$this->color_table[$color]["NUM"] = $curr_num;
		}
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function get_rtf_color($color) {
		$color = preg_replace("/\#/","",$color);
		$r = hexdec(substr($color, 0, 2));
		$g = hexdec(substr($color, 2, 2));
		$b = hexdec(substr($color, 4, 2));
		//\red0\green0\blue0;
		return "\\red".$r."\\green".$g."\\blue".$b.";";
	} // end of function
// ------------------------------------------------------------------------------------------------

//-------------------------------------------------------------------------------------------------
	function file_check($file) {
		if (!file_exists($file)) { die("<b>Wrong path to the settings file - doc_config.inc. <br>Script is terminated</b>"); return false; }
		else { return true; }
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function process_images() {
		if ($this->temp_dir !== false) {
			$test_fin = preg_split("/".$this->image_token."/ms",$this->text);

			// trying to save memory by using tmp file
			$tmp_file_name = $this->rnd_proc_nm."_final";
			$fp = fopen($this->temp_dir.$tmp_file_name, "w");

			fwrite($fp, $this->header."\r\n");
			fwrite($fp, $test_fin[0]);
			if (sizeof($test_fin)>1) {
				for ($i=1;$i<sizeof($test_fin);$i++) {
					preg_match("/(\d+)nort/",$test_fin[$i],$mtchs);
					$img_num = $mtchs[1];
					unset($mtchs);
					$test_fin[$i] = preg_replace("/".$img_num."nort"."/","",$test_fin[$i]);

					//read the contents of a tmt image data into the final tmp file
					$handle = fopen ($this->temp_dir.$this->rnd_proc_nm."_".$img_num, "rb"); 
					while (!feof($handle)) {
						$data = fread($handle, 8192);
						fwrite($fp, $data);
						empty($data);
					}
					fclose ($handle);
					@unlink($this->temp_dir.$this->rnd_proc_nm."_".$img_num);
					fwrite($fp, $test_fin[$i]);
					empty($test_fin[$i]);
				}
			}
			fwrite($fp, "\r\n}");
			@fclose($fp);
		}
		else {
			if (preg_match_all("/".$this->image_token."/ms", $this->text,$count_i)) {
				$count_i = $count_i[0];
				for ($i=0;$i<sizeof($count_i);$i++) {
					$fnd = $this->image_token.$i."nort";
					$this->text = strtr($this->text, array($fnd => $this->image_array[$i]));
				}
			}
		}
	} // end of function
// ------------------------------------------------------------------------------------------------

//-------------------------------------------------------------------------------------------------
	function pixtotwips($pix) {
		return $this->twips($pix * 3.53);
	}// end of function
//-------------------------------------------------------------------------------------------------
	function openimage($image) {
		$sz = 0;$cy = "";
			$fp = @fopen($image, "rb");
			if (!$fp) {
				return false;
			}
			while (!feof($fp)){
				$cy .= @fread($fp, 1024);
				$sz++;
				if ($sz > $this->image_size) { break; }
			}
			@fclose($fp);
			return bin2hex($cy);
	}// end of function
//-------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function render_doc() {
		//--- PROCESSING COLORS ----------------
		$colors = "";
		reset ($this->color_table);
		while (list ($key, $val) = each ($this->color_table)) {
			$colors .= $this->color_table[$key]["VALUE"];
		}
		$this->header = preg_replace("/goesuserscolors/",$colors,$this->header);
		//--------------------------------------
		$this->process_images();
		//--------------------------------------
		$this->text = $this->header."\r\n".$this->text."\r\n}";
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function _iGetCode() {
		if ($this->temp_dir !== false) {
			@unlink($this->temp_dir.$this->rnd_proc_nm."_final");
			trigger_error ("If you are using temporary directory you need to call either <b>get_doc_stream(\"file_name\");</b> or <b>get_doc_to_file(\"path_to_file\",\"file_name\");</b>. Please, consult documentation for additional information.<br>", E_USER_ERROR);
			exit;
		}
		else {
			$this->render_doc();
		}
		return $this->text;
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function _get_doc_stream() {
		$this->render_doc();
		$handle = fopen ($this->temp_dir.$this->rnd_proc_nm."_final", "rb"); 
		do {
			$data = fread($handle, 8192);
			if (strlen($data) == 0) break;
			echo $data;
			empty($data);
		} while(true);
		fclose ($handle);
		@unlink($this->temp_dir.$this->rnd_proc_nm."_final");
	} // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
	function _get_doc_to_file($path,$file_name) {
		$this->render_doc();

		if (!copy($this->temp_dir.$this->rnd_proc_nm."_final", $path.$file_name)) {
			trigger_error ("Failed to copy the file to the given destination : '".$path.$file_name."'<br>\n", E_USER_ERROR);
		}

		@unlink($this->temp_dir.$this->rnd_proc_nm."_final");
	} // end of function
// ------------------------------------------------------------------------------------------------

//-------------------------------------------------------------------------------------------------
////////////////////// three dimensional array parse
//-------------------------------------------------------------------------------------------------
	function tbl_full($mass_head,$mass_body,$mass_wdth,$width) {
		$shablon_mass = array();
		$fin_tbl_head = array();
		$fin_tbl_body = array();
		$fin_tbl_wdth = array();
		if ($this->tbl_level>1) { // nested
			$h = "\\intbl  \\itap".$this->tbl_level." \\nestcell \\pard \r\n";
		}
		else {
			$h = "\\intbl  \\cell \\pard \r\n";
		}

		$hh = "no";
		$hhh = "\\clvertalc\\clbrdrt\\brdrs\\brdrw10 \\clbrdrl\\brdrs\\brdrw10 \\clbrdrb\\brdrs\\brdrw10 \\clbrdrr\\brdrs\\brdrw10 \\cltxlrtb";

		for ($i=0;$i<sizeof($mass_wdth);$i++) { for ($b=0;$b<$width;$b++){ $shablon_mass[$i][$b] = "&nbsp;"; $fin_tbl_head[$i][$b] = $hhh;$fin_tbl_body[$i][$b] = $h;$fin_tbl_wdth[$i][$b] = $hh; } }
		$num_id = 0;
		for ($a=0;$a<sizeof($mass_wdth);$a++)
		{
			$id = 0; // номер блока в ряду
			for ($c=0;$c<$width;$c++) {
				if ($fin_tbl_body[$a][$c]==$h) {
						for ($lk=0;$lk<sizeof(@$mass_wdth[$a][$id]);$lk++) {
							for ($kl=0;$kl<sizeof($mass_wdth[$a][$id][$lk]);$kl++) {
								if ($mass_wdth[$a][$id][$lk][$kl]!="") {
									$shablon_mass[$a+$lk][$c+$kl] = $num_id+$id+1;
									$fin_tbl_head[$a+$lk][$c+$kl] = $mass_head[$a][$id][$lk][$kl];
									$fin_tbl_body[$a+$lk][$c+$kl] = $mass_body[$a][$id][$lk][$kl];
									$fin_tbl_wdth[$a+$lk][$c+$kl] = $mass_wdth[$a][$id][$lk][$kl];
								}
							}
						}
					$id++; // $num_id += $id;
				}
			}
			$num_id += $id;
		}
		$fin_max = $this->row_me($fin_tbl_wdth,$width,$shablon_mass);
		return $this->final_parse($fin_tbl_head,$fin_max,$fin_tbl_body,$shablon_mass);
	}// end of function
//-------------------------------------------------------------------------------------------------
	function final_parse($head,$fin_max,$body,$shablon) {
		$tr_all_f = "";
		for ($h=0;$h<sizeof($shablon);$h++) {
			$td_head_f = "";
			$td_body_f = "";
			//$tr_res = $this->tr_hd_mass[$h];
			$tr_res = @$this->tr_hd_mass[$this->tbl_level][$h];
			$iiii = 0;

			for ($w=0;$w<sizeof($shablon[0]);$w++) {
				$iiii += (isset($fin_max[$w])) ? $fin_max[$w] : 0;
				if (
						((isset($shablon[$h][$w]) && isset($shablon[$h][$w+1])) && ($shablon[$h][$w] != $shablon[$h][$w+1])) || 
						((isset($shablon[0]) && $w==sizeof($shablon[0])-1))
					) {

					$rspn="rspn".@$shablon[$h][$w];
					if (@!$$rspn) {
						if (@$shablon[$h][$w] == @$shablon[$h+1][$w]) { $rs="\\clvmgf"; $$rspn=true;}
						else {$rs="";}
					}
					else {
						if (@$shablon[$h][$w] != @$shablon[$h-1][$w]) { $rs=""; }
						else {$rs="\\clvmrg";}
					}
					$td_head_f .= $rs.@$head[$h][$w]."\\cellx".$iiii."\r\n";
					if ($this->tbl_level>1) { // nested
						if ($rs=="\\clvmrg") {$td_body_f .= "\\intbl \\itap".$this->tbl_level." \\nestcell \\pard \r\n";}
						else {$td_body_f .= $body[$h][$w];}
					}
					else {
						if ($rs=="\\clvmrg") {$td_body_f .= "\\intbl \\cell \\pard \r\n";}
						else {$td_body_f .= @$body[$h][$w];}
					}
					
				}
			}
			if ($this->tbl_level>1) { // nested
				$tr_all_f .= $tr_res.$td_head_f."\r\n".$td_body_f."\r\n\\intbl \\itap".$this->tbl_level." \\nestrow \\pard \r\n";
			}
			else {
				$tr_all_f .= $tr_res.$td_head_f."\r\n".$td_body_f."\r\n\\intbl \\row \\pard \r\n";
			}
		}
		// nested 
		if ($this->tbl_level>1) {
			return "{\\*\\nesttableprops".$tr_all_f."}";
		}
		else {
			return $tr_all_f;
		}
	}// end of function
//-------------------------------------------------------------------------------------------------
//////////////  object inserted tables searching
//-------------------------------------------------------------------------------------------------
	function obj_srch($shablon) {
		$width = sizeof($shablon[0]);
		$height = sizeof($shablon);
		for ($h=0;$h<$height;$h++) {
			$g_count=0;
			for ($w=0;$w<$width;$w++) {
				if ($shablon[$h][$w] != $shablon[$h+1][$w]) { $g_count++; }
			}
			$g_mass[$h] = $g_count;
		}
		for ($w=0;$w<$width;$w++) {
			$v_count=0;
			for ($h=0;$h<$height;$h++) {
				if ($shablon[$h][$w] != $shablon[$h][$w+1]) { $v_count++; }
			}
			$v_mass[$w] = $v_count;
		}
	}
//-------------------------------------------------------------------------------------------------
////////////////////// crow widths counting function
//-------------------------------------------------------------------------------------------------
	function row_me($wdth,$or_wdth,$shablon) {
		for ($h=0;$h<sizeof($wdth);$h++) {
			$count = 0; $sum = 0; $mstc = 0;
			for ($w=0;$w<$or_wdth;$w++) {
				if (isset($wdth[$h][$w]) && $wdth[$h][$w] == "no") { $count++; }
				else {
					if (@$shablon[$h][$w] != @$shablon[$h][$w+1]) {
						$sum += $wdth[$h][$w];
						$wdth[$h][$w] = $wdth[$h][$w]."mst".$mstc; $mstc = 0;
					}
					else { @$wdth[$h][$w] = @$wdth[$h][$w]."sl".$mstc; $mstc++;}
				}
			}
			if ($count == 0) {$count = 1;}
			$opt = round(($this->tb_wdth[$this->tbl_level] - $sum) / $count);
			for ($w=0;$w<$or_wdth;$w++) {
				if ($wdth[$h][$w] == "no") { $wdth[$h][$w] = $opt; }
			}
		}
		for ($w=0;$w<$or_wdth;$w++) {
			$fl=false;
			for ($h=0;$h<sizeof($wdth);$h++) {
				if (preg_match("/mst/",$wdth[$h][$w]) || preg_match("/sl/",$wdth[$h][$w])) { $fl = true; }
			}
			if ($fl) { $yes_no[$w] = "yes"; }
			else { $yes_no[$w] = "no"; }
		}
		return $this->mxs($wdth,$or_wdth,$shablon);
	}// end of function
//-------------------------------------------------------------------------------------------------
////////////////////// main borders counting function
//-------------------------------------------------------------------------------------------------
	function mxs($wdth,$or_wdth,$shablon) {
		$t_count = 0; $mst = array();$fin_max = array();
		for ($h=0;$h<$or_wdth;$h++) { $fin_max[$h]="no"; }
		for ($w=0;$w<$or_wdth;$w++) {
			for ($h=0;$h<sizeof($wdth);$h++) {
				$d_tmp = 0;
				if (preg_match("/mst/",$wdth[$h][$w])) {
					$width = preg_replace("/mst\d+/","",$wdth[$h][$w]);
					$span = preg_replace("/\d+mst/","",$wdth[$h][$w]);
					if ($span>0) {
						$tty = $width / ($span + 1);
						//TODO
						if (isset($mst_mass[$w]) && $mst_mass[$w]<$tty) { $mst_mass[$w] = $tty; $mst[$w] = $wdth[$h][$w]; }
					}
					else {
						$d_tmp = $width;
					}
				}
				if ($fin_max[$w]<$d_tmp || $fin_max[$w] == "no") { $fin_max[$w] = $d_tmp; }
			}
			$t_count++;
		}
		for ($i=0;$i<$t_count;$i++) { if ($fin_max[$i] == "") { $fin_max[$i] = "no"; } }
		return $this->mxs2($fin_max,$mst);
	}
//-------------------------------------------------------------------------------------------------
	function mxs2($fin_max,$mst) {
		for ($i=0;$i<sizeof($fin_max);$i++) {
			$tmp_sum = 0; $fl = 1;
			if (isset($mst[$i]) &&  $mst[$i] != "") {
				if ($fin_max[$i] == "no") {
					$width = preg_replace("/mst\d+/","",$mst[$i]);
					$span = preg_replace("/\d+mst/","",$mst[$i]);
					for ($h=$i-$span;$h<$i;$h++) {
						if ($fin_max[$h] != "no") { $tmp_sum += $fin_max[$h]; }
						else { $fl++; }
					}
					$opt = round(($width - $tmp_sum) / $fl);
					for ($h=$i-$span;$h<=$i;$h++) {
						if ($fin_max[$h] == "no") { $fin_max[$h] = $opt; }
					}
				}
				else {
					$width = preg_replace("/mst\d+/","",$mst[$i]);
					$span = preg_replace("/\d+mst/","",$mst[$i]);
					for ($h=$i-$span;$h<=$i;$h++) {
						if ($fin_max[$h] != "no") { $tmp_sum += $fin_max[$h]; }
						else { $fl++; }
					}
					$opt = round(($width - $tmp_sum) / ($fl - 1));
					if ($opt>=0) {
						for ($h=$i-$span;$h<$i;$h++) {
							if ($fin_max[$h] == "no") { $fin_max[$h] = $opt; }
						}
					}
				}
			}
		}
		$f_sum = 0; $f_fl = 0;
		for ($i=0;$i<sizeof($fin_max);$i++) {
			if ($fin_max[$i] != "no") { $f_sum += $fin_max[$i]; }
			else { $f_fl++; }
		}
		$f_fl = ($f_fl == 0) ? 1 : $f_fl;
		$f_opt = round(($this->tb_wdth[$this->tbl_level] - $f_sum) / $f_fl);
		if ($f_opt<0) { $f_opt = 10; }
		for ($i=0;$i<sizeof($fin_max);$i++) {
			if ($fin_max[$i] == "no") { $fin_max[$i] = $f_opt; }
		}
		return $fin_max;
	}
//////////////////////////////////////////////////////////
//-------------------------------------------------------------------------------------------------



} // END OF CLASS
//-------------------------------------------------------------------------------------------------


?>
