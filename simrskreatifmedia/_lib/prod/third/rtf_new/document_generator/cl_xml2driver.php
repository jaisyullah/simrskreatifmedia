<?php

// v.1.1      [08.08.2007]
//         www.paggard.com

require_once "cl_rtf_driver.php";


//-------------------------------------------------------------------------------------------------
class nDOCGEN {

// ------------------------------------------------------------------------------------------------
// CONSTRUCTOR
        function __construct($template,$driver) {
                global $doc_wrap;
                //-----------------------------------------
                $doc_wrap->begin($driver);
                //-----------------------------------------
                if (!($xml_parser = new_xml_parser($template))) {
                                die("not a valid XML input");
                }
                $data = $this->clear_data($template);
                $pattern = '/<\?xml.*?encoding="(.*?)".*?\?>/';
                if (preg_match($pattern, $data, $matches)) {
                        $doc_wrap->DRIVER->_set_encoding($matches[1]);
                }
                else {$doc_wrap->DRIVER->_set_encoding(false);}
                if ($driver=="PDF" && preg_match("/<table/si",$data)) {
                        $doc_wrap->_pass = 1;
                        $doc_wrap->DRIVER->_pass = 1;
                        if (!xml_parse($xml_parser, $data)) {
                                die(sprintf("XML error: %s at line %d\n",
                                                                xml_error_string(xml_get_error_code($xml_parser)),
                                                                xml_get_current_line_number($xml_parser)));
                        }
                        $doc_wrap->_pass = 2;
                        $doc_wrap->DRIVER->_pass = 2;
                        xml_parser_free($xml_parser);
                        if (!($xml_parser = new_xml_parser($template))) {
                                        die("not a valid XML input");
                        }
                }
                else {
                        $doc_wrap->_pass = 2;
                }
                if (!xml_parse($xml_parser, $data)) {
                        die(sprintf("XML error: %s at line %d\n",
                                                        xml_error_string(xml_get_error_code($xml_parser)),
                                                        xml_get_current_line_number($xml_parser)));
                }
                xml_parser_free($xml_parser);

        } // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
        function get_result_file() {
                global $doc_wrap;
                $doc_wrap->end();
                return $doc_wrap->final_result();
        } // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
        function get_doc_stream() {
                global $doc_wrap;
                $doc_wrap->end();
                return $doc_wrap->get_doc_stream();
        } // end of function
// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
        function get_doc_to_file($path,$file_name) {
                global $doc_wrap;
                $doc_wrap->end();
                return $doc_wrap->get_doc_to_file($path,$file_name);
        } // end of function
// ------------------------------------------------------------------------------------------------


// ------------------------------------------------------------------------------------------------
        function clear_data($data) {
                global $doc_wrap;
                //$data = preg_replace("/\xA0/msi"," ",$data);
                $data = preg_replace("/\t+/msi"," ",$data);
                //$data = preg_replace("/\r\n|\n/msi"," ##carret## ",$data);
                $data = preg_replace("/&/msi","##amp##",$data);
                return $data;
        } // end of function
// ------------------------------------------------------------------------------------------------

} // END OF CLASS
//-------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
class doc_wrap { // for wrapping purposes

        var $_pass;

        var $final_out; // variable to store final output from driver
        var $config_file; // path to configuration file
        var $temp_dir;  // path to store tem files
        var $FileName;

        var $txt_width;
// --- help vars -----------------------------
        var $_debug;
        var $_element_data=false;
        var $_tree_element;
        var $_tree_settings;
        var $_cur_element;
        var $_cur_level;

        var $global_settings;

        var $body;
        var $head;

        var $_flg_head;

        /// Abstract functions
//-------------------------------------------------------------------------------------------------
        function begin($driver="RTF") {
                //$this->_debug = 1;

                //=====================================================
                if ($driver=="RTF") {
                        $this->DRIVER = new RTF_DRIVER();
                }
                else if ($driver=="PDF") {
                        $this->DRIVER = new PDF_DRIVER();
                }
                //=====================================================

        }
//-------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
        function final_result() {
                return $this->DRIVER->_iGetCode();
        } // end of function
// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
        function get_doc_stream() {
                return $this->DRIVER->_get_doc_stream();
        } // end of function
// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
        function get_doc_to_file($path,$file_name) {
                return $this->DRIVER->_get_doc_to_file($path,$file_name);
        } // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
        function end() {
                //
        } // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
        function _start_child($name) {
                $this->_cur_level++;
                $this->_tree_element[$this->_cur_level] = $name;
                //$this->_tree_settings[$this->_cur_level] = $this->_tree_settings[$this->_cur_level-1];
                $this->_cur_element = $name;
        } // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
        function _end_child($name) {
                $this->_cur_level--;
                $this->_cur_element = @$this->_tree_element[$this->_cur_level];
        } // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
        function plain_text($data) {
                # TODO #$data = preg_replace("/[\r\n]/msi","",trim($data));
                if (trim($data) != ""){
                        $this->DRIVER->add_text($data);
                }
        } // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
        function _int_DOCUMENT($attribs,$EndOfTag) {
                if ($EndOfTag) {
                        $this->DRIVER->_iDOCUMENT($attribs,$EndOfTag);
                }
                else {
                        $this->DRIVER->_iDOCUMENT($attribs,$EndOfTag);
                }
        } // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
        function _int_IMG($attribs,$EndOfTag) {
                if (!$EndOfTag) {
                        $this->_start_child("IMG");
                        $this->DRIVER->_iIMG($attribs,$EndOfTag);
                }
                else {
                        $this->_end_child("IMG");
                        $this->DRIVER->_iIMG($attribs,$EndOfTag);
                }
        } // end of function
// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
        function _int_PAGE($attribs,$EndOfTag) {
                if (!$EndOfTag) {
                        $this->_start_child("PAGE");
                        $this->DRIVER->_iPAGE($attribs,$EndOfTag);
                }
                else {
                        $this->_end_child("PAGE");
                        $this->DRIVER->_iPAGE($attribs,$EndOfTag);
                }
        } // end of function
// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
        function _int_CPAGENUM($attribs,$EndOfTag) {
                if (!$EndOfTag) {
                        $this->_start_child("CPAGENUM");
                        $this->DRIVER->_iCPAGENUM($attribs,$EndOfTag);
                }
                else {
                        $this->_end_child("CPAGENUM");
                        $this->DRIVER->_iCPAGENUM($attribs,$EndOfTag);
                }
        } // end of function
// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
        function _int_TPAGENUM($attribs,$EndOfTag) {
                if (!$EndOfTag) {
                        $this->_start_child("TPAGENUM");
                        $this->DRIVER->_iTPAGENUM($attribs,$EndOfTag);
                }
                else {
                        $this->_end_child("TPAGENUM");
                        $this->DRIVER->_iTPAGENUM($attribs,$EndOfTag);
                }
        } // end of function
// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
        function _int_SECTION($attribs,$EndOfTag) {
                if (!$EndOfTag) {
                        $this->_start_child("SECTION");
                        $this->DRIVER->_iSECTION($attribs,$EndOfTag);
                }
                else {
                        $this->_end_child("SECTION");
                        $this->DRIVER->_iSECTION($attribs,$EndOfTag);
                }
        } // end of function
// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
        function _int_HIDDEN($attribs,$EndOfTag) {
                if (!$EndOfTag) {
                        $this->_start_child("HIDDEN");
                        $this->DRIVER->_iHIDDEN($attribs,$EndOfTag);
                }
                else {
                        $this->_end_child("HIDDEN");
                        $this->DRIVER->_iHIDDEN($attribs,$EndOfTag);
                }
        } // end of function
// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
        function _int_HEADER($attribs,$EndOfTag) {
                if (!$EndOfTag) {
                        $this->_start_child("HEADER");
                        $this->DRIVER->_iHEADER($attribs,$EndOfTag);
                }
                else {
                        $this->_end_child("HEADER");
                        $this->DRIVER->_iHEADER($attribs,$EndOfTag);
                }
        } // end of function
// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
        function _int_HEADERR($attribs,$EndOfTag) {
                if (!$EndOfTag) {
                        $this->_start_child("HEADERR");
                        $this->DRIVER->_iHEADERR($attribs,$EndOfTag);
                }
                else {
                        $this->_end_child("HEADERR");
                        $this->DRIVER->_iHEADERR($attribs,$EndOfTag);
                }
        } // end of function
// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
        function _int_HEADERL($attribs,$EndOfTag) {
                if (!$EndOfTag) {
                        $this->_start_child("HEADERL");
                        $this->DRIVER->_iHEADERL($attribs,$EndOfTag);
                }
                else {
                        $this->_end_child("HEADERL");
                        $this->DRIVER->_iHEADERL($attribs,$EndOfTag);
                }
        } // end of function
// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
        function _int_FOOTER($attribs,$EndOfTag) {
                if (!$EndOfTag) {
                        $this->_start_child("FOOTER");
                        $this->DRIVER->_iFOOTER($attribs,$EndOfTag);
                }
                else {
                        $this->_end_child("FOOTER");
                        $this->DRIVER->_iFOOTER($attribs,$EndOfTag);
                }
        } // end of function
// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
        function _int_FOOTERR($attribs,$EndOfTag) {
                if (!$EndOfTag) {
                        $this->_start_child("FOOTERR");
                        $this->DRIVER->_iFOOTERR($attribs,$EndOfTag);
                }
                else {
                        $this->_end_child("FOOTERR");
                        $this->DRIVER->_iFOOTERR($attribs,$EndOfTag);
                }
        } // end of function
// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
        function _int_FOOTERL($attribs,$EndOfTag) {
                if (!$EndOfTag) {
                        $this->_start_child("FOOTERL");
                        $this->DRIVER->_iFOOTERL($attribs,$EndOfTag);
                }
                else {
                        $this->_end_child("FOOTERL");
                        $this->DRIVER->_iFOOTERL($attribs,$EndOfTag);
                }
        } // end of function
// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
        function _int_P($attribs,$EndOfTag) {
                if (!$EndOfTag) {
                        $this->_start_child("P");
                        $this->DRIVER->_iP($attribs,$EndOfTag);
                }
                else {
                        $this->DRIVER->_iP($attribs,$EndOfTag);
                        $this->_end_child("P");
                }
        } // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
        function _int_FONT($attribs,$EndOfTag) {
                if (!$EndOfTag) {
                        $this->_start_child("FONT");
                        $this->DRIVER->_iFONT($attribs,$EndOfTag);
                }
                else {
                        $this->DRIVER->_iFONT($attribs,$EndOfTag);
                        $this->_end_child("FONT");
                }
        } // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
        function _int_NEWCOL($attribs,$EndOfTag) {
                if (!$EndOfTag) {
                        $this->_start_child("NEWCOL");
                        $this->DRIVER->_iNEWCOL($attribs,$EndOfTag);
                }
                else {
                        $this->DRIVER->_iNEWCOL($attribs,$EndOfTag);
                        $this->_end_child("NEWCOL");
                }
        } // end of function
// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
        function _int_FOOTNOTE($attribs,$EndOfTag) {
                if (!$EndOfTag) {
                        $this->_start_child("FOOTNOTE");
                        $this->DRIVER->_iFOOTNOTE($attribs,$EndOfTag);
                }
                else {
                        $this->DRIVER->_iFOOTNOTE($attribs,$EndOfTag);
                        $this->_end_child("FOOTNOTE");
                }
        } // end of function
// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
        function _int_A($attribs,$EndOfTag) {
                if (!$EndOfTag) {
                        $this->_start_child("A");
                        $this->DRIVER->_iA($attribs,$EndOfTag);
                }
                else {
                        $this->DRIVER->_iA($attribs,$EndOfTag);
                        $this->_end_child("A");
                }
        } // end of function
// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
        function _int_ID($attribs,$EndOfTag) {
                if (!$EndOfTag) {
                        $this->_start_child("ID");
                        $this->DRIVER->_iID($attribs,$EndOfTag);
                }
                else {
                        $this->DRIVER->_iID($attribs,$EndOfTag);
                        $this->_end_child("ID");
                }
        } // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
        function _int_B($attribs,$EndOfTag) {
                if (!$EndOfTag) {
                        $this->_start_child("B");
                        $this->DRIVER->_iB($attribs,$EndOfTag);
                }
                else {
                        $this->_end_child("B");
                        $this->DRIVER->_iB($attribs,$EndOfTag);
                }
        } // end of function
// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
        function _int_I($attribs,$EndOfTag) {
                if (!$EndOfTag) {
                        $this->_start_child("I");
                        $this->DRIVER->_iI($attribs,$EndOfTag);
                }
                else {
                        $this->_end_child("I");
                        $this->DRIVER->_iI($attribs,$EndOfTag);
                }
        } // end of function
// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
        function _int_U($attribs,$EndOfTag) {
                if (!$EndOfTag) {
                        $this->_start_child("U");
                        $this->DRIVER->_iU($attribs,$EndOfTag);
                }
                else {
                        $this->_end_child("U");
                        $this->DRIVER->_iU($attribs,$EndOfTag);
                }
        } // end of function
// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
        function _int_SUP($attribs,$EndOfTag) {
                if (!$EndOfTag) {
                        $this->_start_child("SUP");
                        $this->DRIVER->_iSUP($attribs,$EndOfTag);
                }
                else {
                        $this->_end_child("SUP");
                        $this->DRIVER->_iSUP($attribs,$EndOfTag);
                }
        } // end of function
// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
        function _int_SUB($attribs,$EndOfTag) {
                if (!$EndOfTag) {
                        $this->_start_child("SUB");
                        $this->DRIVER->_iSUB($attribs,$EndOfTag);
                }
                else {
                        $this->_end_child("SUB");
                        $this->DRIVER->_iSUB($attribs,$EndOfTag);
                }
        } // end of function
// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
        function _int_BR($attribs,$EndOfTag) {
                if (!$EndOfTag) {
                        $this->_start_child("BR");
                        $this->DRIVER->_iBR($attribs,$EndOfTag);
                }
                else {
                        $this->_end_child("BR");
                        $this->DRIVER->_iBR($attribs,$EndOfTag);
                }
        } // end of function
// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
        function _int_HR($attribs,$EndOfTag) {
                if (!$EndOfTag) {
                        $this->_start_child("HR");
                        $this->DRIVER->_iHR($attribs,$EndOfTag);
                }
                else {
                        $this->_end_child("HR");
                        $this->DRIVER->_iHR($attribs,$EndOfTag);
                }
        } // end of function
// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
        function _int_TAB($attribs,$EndOfTag) {
                if (!$EndOfTag) {
                        $this->_start_child("TAB");
                        $this->DRIVER->_iTAB($attribs,$EndOfTag);
                }
                else {
                        $this->_end_child("TAB");
                        $this->DRIVER->_iTAB($attribs,$EndOfTag);
                }
        } // end of function
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
        function _int_TABLE($attribs,$EndOfTag) {
                if (!$EndOfTag) {
                        $this->_start_child("TABLE");
                        $this->DRIVER->_iTABLE($attribs,$EndOfTag);
                }
                else {
                        $this->DRIVER->_iTABLE($attribs,$EndOfTag);
                        $this->_end_child("TABLE");
                }
        } // end of function
// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
        function _int_ROW($attribs,$EndOfTag) {
                if (!$EndOfTag) {
                        $this->_start_child("ROW");
                        $this->DRIVER->_iROW($attribs,$EndOfTag);
                }
                else {
                        $this->DRIVER->_iROW($attribs,$EndOfTag);
                        $this->_end_child("ROW");
                }
        } // end of function
// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
        function _int_CELL($attribs,$EndOfTag) {
                if (!$EndOfTag) {
                        $this->_start_child("CELL");
                        $this->DRIVER->_iCELL($attribs,$EndOfTag);
                }
                else {
                        $this->DRIVER->_iCELL($attribs,$EndOfTag);
                        $this->_end_child("CELL");
                }
        } // end of function
// ------------------------------------------------------------------------------------------------


} // END OF CLASS
// ------------------------------------------------------------------------------------------------


//-------------------------------------------------------------------------------------------------

$doc_wrap = new doc_wrap;
                            
// ------------------------------------------------------------------------------------------------




//-------------------------------------------------------------------------------------------------
        function new_xml_parser($file) {
                global $doc_wrap;
                global $parser_file;
                $xml_parser = xml_parser_create();
                xml_parser_set_option($xml_parser, XML_OPTION_CASE_FOLDING, 1);
                xml_set_element_handler($xml_parser, "startElement", "endElement");
                xml_set_character_data_handler($xml_parser, "characterData");
                xml_set_processing_instruction_handler($xml_parser, "PIHandler");
                xml_set_unparsed_entity_decl_handler($xml_parser, "test_ent");
                xml_set_default_handler($xml_parser, "defaultHandler");
                xml_set_external_entity_ref_handler($xml_parser, "externalEntityRefHandler");
                if ($file == "") { return false; }
                if (!is_array($parser_file)) { settype($parser_file, "array"); }
                $parser_file[$xml_parser] = $file;
                return $xml_parser;
        } // end of function
//-------------------------------------------------------------------------------------------------


// ------------------------------------------------------------------------------------------------
        function startElement($parser, $name, $attribs) {
                global $doc_wrap;
                if ($doc_wrap->_debug) {
                        echo "[start_el <b>".$name."</b>]"; // tag name
                        if (sizeof($attribs)) {
                                echo " {";
                                while (list($k, $v) = each($attribs)) {
                                        print "<font color=\"#00ff00\">$k</font>=\"<font color=\"#990000\">$v</font>\"";
                                }
                                echo "}";
                        }
                        reset($attribs);
                        return;
                }
                if (sizeof($attribs)) {
                        reset($attribs);
                        while (list($k, $v) = each($attribs)) {
                                $ar_tmp[$k] = ($k!="NUM_FORMAT"&&
                                                                        $k!="CONFIG_FILE"&&
                                                                        $k!="TITLE"&&
                                                                        $k!="SUBJECT"&&
                                                                        $k!="AUTHOR"&&
                                                                        $k!="MANAGER"&&
                                                                        $k!="COMPANY"&&
                                                                        $k!="OPERATOR"&&
                                                                        $k!="CATEGORY"&&
                                                                        $k!="KEYWORDS"&&
                                                                        $k!="COMMENT"&&
                                                                        $k!="NAME"&&
                                                                        $k!="SRC"&&
                                                                        $k!="LEAD"&&
                                                                        $k!="FILE"
                                                                ) ? strtoupper($v) : $v;
                        }
                        $attribs=$ar_tmp;
                        reset($attribs);
                }
                //--- PROCESS ATTRIBS ---------------------
                $doc_wrap->DRIVER->_process_attribs($attribs);
                //-----------------------------------------
                switch ($name) {
                        case "DOC":                                $doc_wrap->_int_DOCUMENT($attribs,false);                break;
                        case "IMG":                                $doc_wrap->_int_IMG($attribs,false);                        break;
                        case "PAGE":                        $doc_wrap->_int_PAGE($attribs,false);                        break;
                        case "CPAGENUM":                $doc_wrap->_int_CPAGENUM($attribs,false);                break;
                        case "TPAGENUM":                $doc_wrap->_int_TPAGENUM($attribs,false);                break;
                        case "HEADER":                        $doc_wrap->_int_HEADER($attribs,false);                break;
                        case "HEADERR":                $doc_wrap->_int_HEADERR($attribs,false);                break;
                        case "HEADERL":                $doc_wrap->_int_HEADERL($attribs,false);                break;
                        case "FOOTER":                        $doc_wrap->_int_FOOTER($attribs,false);                break;
                        case "FOOTERR":                $doc_wrap->_int_FOOTERR($attribs,false);                break;
                        case "FOOTERL":                $doc_wrap->_int_FOOTERL($attribs,false);                break;
                        case "SECTION":                $doc_wrap->_int_SECTION($attribs,false);                break;
                        case "FONT":                        $doc_wrap->_int_FONT($attribs,false);                        break;
                        case "NEWCOL":                        $doc_wrap->_int_NEWCOL($attribs,false);                break;
                        case "FOOTNOTE":                $doc_wrap->_int_FOOTNOTE($attribs,false);                break;
                        case "HIDDEN":                        $doc_wrap->_int_HIDDEN($attribs,false);                break;
                        case "A":                                $doc_wrap->_int_A($attribs,false);                                break;
                        case "ID":                                $doc_wrap->_int_ID($attribs,false);                                break;
                        case "P":                                $doc_wrap->_int_P($attribs,false);                                break;
                        case "B":                                $doc_wrap->_int_B($attribs,false);                                break;
                        case "I":                                $doc_wrap->_int_I($attribs,false);                                break;
                        case "U":                                $doc_wrap->_int_U($attribs,false);                                break;
                        case "SUP":                                $doc_wrap->_int_SUP($attribs,false);                        break;
                        case "SUB":                                $doc_wrap->_int_SUB($attribs,false);                        break;
                        case "LINE":                        $doc_wrap->_int_BR($attribs,false);                                break;
                        case "BR":                                $doc_wrap->_int_BR($attribs,false);                                break;
                        case "HR":                                $doc_wrap->_int_HR($attribs,false);                                break;
                        case "TAB":                                $doc_wrap->_int_TAB($attribs,false);                        break;
                        case "DATA":                        $doc_wrap->_int_DATA($attribs,false);                        break;
                        case "TABLE":                        $doc_wrap->_int_TABLE($attribs,false);                        break;
                        case "ROW":                                $doc_wrap->_int_ROW($attribs,false);                        break;
                        case "TR":                                $doc_wrap->_int_ROW($attribs,false);                        break;
                        case "CELL":                        $doc_wrap->_int_CELL($attribs,false);                        break;
                        case "TD":                                $doc_wrap->_int_CELL($attribs,false);                        break;
                }
        } // end of function
// ------------------------------------------------------------------------------------------------

//-------------------------------------------------------------------------------------------------
        function endElement($parser, $name) {
                $attribs = array();
                global $doc_wrap;
                if ($doc_wrap->_debug) {
                        echo "[end_el <b>".$name."</b>]\n"; // tag name
                        return;
                }
                switch ($name) {
                        case "DOC":         $doc_wrap->_int_DOCUMENT($attribs,1);    break;
                        case "IMG":         $doc_wrap->_int_IMG($attribs,1);         break;
                        case "PAGE":        $doc_wrap->_int_PAGE($attribs,1);        break;
                        case "CPAGENUM":    $doc_wrap->_int_CPAGENUM($attribs,1);    break;
                        case "TPAGENUM":    $doc_wrap->_int_TPAGENUM($attribs,1);    break;
                        case "HEADER":      $doc_wrap->_int_HEADER($attribs,1);      break;
                        case "HEADERR":     $doc_wrap->_int_HEADERR($attribs,1);     break;
                        case "HEADERL":     $doc_wrap->_int_HEADERL($attribs,1);     break;
                        case "FOOTER":      $doc_wrap->_int_FOOTER($attribs,1);      break;
                        case "FOOTERR":     $doc_wrap->_int_FOOTERR($attribs,1);     break;
                        case "FOOTERL":     $doc_wrap->_int_FOOTERL($attribs,1);     break;
                        case "SECTION":     $doc_wrap->_int_SECTION($attribs,1);     break;
                        case "FONT":        $doc_wrap->_int_FONT($attribs,1);        break;
                        case "NEWCOL":      $doc_wrap->_int_NEWCOL($attribs,1);      break;
                        case "FOOTNOTE":    $doc_wrap->_int_FOOTNOTE($attribs,1);    break;
                        case "HIDDEN":      $doc_wrap->_int_HIDDEN($attribs,1);      break;
                        case "A":           $doc_wrap->_int_A($attribs,1);           break;
                        case "ID":          $doc_wrap->_int_ID($attribs,1);          break;
                        case "P":           $doc_wrap->_int_P($attribs,1);           break;
                        case "B":           $doc_wrap->_int_B($attribs,1);           break;
                        case "I":           $doc_wrap->_int_I($attribs,1);           break;
                        case "U":           $doc_wrap->_int_U($attribs,1);           break;
                        case "SUP":         $doc_wrap->_int_SUP($attribs,1);         break;
                        case "SUB":         $doc_wrap->_int_SUB($attribs,1);         break;
                        case "LINE":        $doc_wrap->_int_BR($attribs,1);          break;
                        case "BR":          $doc_wrap->_int_BR($attribs,1);          break;
                        case "HR":          $doc_wrap->_int_HR($attribs,1);          break;
                        case "TAB":         $doc_wrap->_int_TAB($attribs,1);         break;
                        case "DATA":        $doc_wrap->_int_DATA($attribs,1);        break;
                        case "TABLE":       $doc_wrap->_int_TABLE($attribs,1);       break;
                        case "ROW":         $doc_wrap->_int_ROW($attribs,1);         break;
                        case "TR":          $doc_wrap->_int_ROW($attribs,1);         break;
                        case "CELL":        $doc_wrap->_int_CELL($attribs,1);        break;
                        case "TD":          $doc_wrap->_int_CELL($attribs,1);        break;
                }
        } // end of function
//-------------------------------------------------------------------------------------------------

//-------------------------------------------------------------------------------------------------
        function characterData($parser, $data) { // returns plain text
                global $doc_wrap;
                if ($doc_wrap->_debug) {
                        echo "[plain_text]<b>".$data."</b>[[".$doc_wrap->driver->_cur_element."]/plain_text]"; // tag name
                        return;
                }
                $doc_wrap->plain_text($data);
        } // end of function
//-------------------------------------------------------------------------------------------------

//-------------------------------------------------------------------------------------------------
        function PIHandler($parser, $target, $data) {
                global $doc_wrap;
                switch (strtolower($target)) {
                        case "php":
                                global $parser_file;
                                if (trustedFile($parser_file[$parser])) {
                                        //eval($data);
                                }
                                else {
                                        //printf("Untrusted PHP code: <i>%s</i>",htmlspecialchars($data));
                                }
                                break;
                }
        } // end of function
//-------------------------------------------------------------------------------------------------

//-------------------------------------------------------------------------------------------------
        function defaultHandler($parser, $data) {
                global $doc_wrap;
                if (substr($data, 0, 1) == "&" && substr($data, -1, 1) == ";") {
                        //printf('[def_handler_1]<font color="#aa00aa">%s[d]</font>',htmlspecialchars($data));
                }
                else {
                        //printf('[def_handler_2]<font size="-1">%s</font>',htmlspecialchars($data));
                }
        } // end of function
//-------------------------------------------------------------------------------------------------

//-------------------------------------------------------------------------------------------------
        function externalEntityRefHandler($parser, $openEntityNames, $base, $systemId,$publicId) {
                global $doc_wrap;
                if ($systemId) {
                        if (!list($parser, $fp) = new_xml_parser($systemId)) {
                                        //printf("Could not open entity %s at %s\n", $openEntityNames,$systemId);
                                        return false;
                        }
                        while ($data = fread($fp, 4096)) {
                                        if (!xml_parse($parser, $data, feof($fp))) {
                                                printf("XML error: %s at line %d while parsing entity %s\n",
                                                                xml_error_string(xml_get_error_code($parser)),
                                                                xml_get_current_line_number($parser), $openEntityNames);
                                                xml_parser_free($parser);
                                                return false;
                                        }
                        }
                        xml_parser_free($parser);
                        return true;
                }
                return false;
        } // end of function
//-------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
        function test_ent ($parser, $entityName, $base, $systemId, $publicId, $notationName) {
                global $doc_wrap;
        } // end of function
// ------------------------------------------------------------------------------------------------

//-------------------------------------------------------------------------------------------------
        function trustedFile($file) {
                global $doc_wrap;
                // only trust local files owned by ourselves
                if (!preg_match("/^([a-z]+):\/\//i", $file)
                        && fileowner($file) == getmyuid()) {
                        return true;
                }
                return false;
        } // end of function
//-------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
        function strbin2hex($bin){
                $x = 0;
                $last = strlen($bin)-1;
                for($i=0; $i<=$last; $i++){ $x += $bin[$last-$i] * pow(2,$i); }
                return dechex($x);
        }
// ------------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------------
        function convert_to_unicode_points($string) {
                //----- NetMake
                $string     = html_entity_decode($string, ENT_NOQUOTES, 'UTF-8');
                $aCodePoint = utf8ToUnicode($string);
                foreach ($aCodePoint as $iIndex => $sCode) {
                     $aCodePoint[$iIndex] = '&#U' . $sCode;
                }
                return implode('', $aCodePoint);
                
                if ($string == "") { return ""; }
                $tmp_ar = unpack("H*",$string);
                $tmp_fin = explode("\r\n",chunk_split($tmp_ar[1],2));
                $trash = array_pop($tmp_fin);
                $bin_str = array();
                foreach ($tmp_fin as $v) { $bin_str[] = decbin(hexdec($v)); }
                $final_string = "";
                $first_bt = 0;
                $tmp_data = "";
                foreach ($bin_str as $v) {
                        // trying to get the UNICODE point
                        if ($first_bt>0) {
                                $final_string .= "&#U".hexdec(strbin2hex($tmp_data.substr($v,2)));
                                $tmp_data = "";
                                $first_bt--;
                        }
                        else if (substr($v,0,1) == "0" || strlen($v)<8) { // 1 octet sequence
                                if (strlen($v)<8) { $final_string .= chr(hexdec(strbin2hex($v))); }
                                else { $final_string .= chr(hexdec(strbin2hex($tmp_data.substr($v,1)))); }
                        }
                        else if (substr($v,0,3) == "110") { // 2 octet sequence
                                $tmp_data = substr($v,3);
                                $first_bt = 1;
                        }
                        else if (substr($v,0,4) == "1110") { // 3 octet sequence
                                $tmp_data = substr($v,4);
                                $first_bt = 2;
                        }
                        else if (substr($v,0,5) == "11110") { // 3 octet sequence
                                $tmp_data = substr($v,5);
                                $first_bt = 3;
                        }
                }
                return $final_string;
        } // end of function
// ------------------------------------------------------------------------------------------------


function utf8ToUnicode(&$str)
{
  $mState = 0;     // cached expected number of octets after the current octet
                   // until the beginning of the next UTF8 character sequence
  $mUcs4  = 0;     // cached Unicode character
  $mBytes = 1;     // cached expected number of octets in the current sequence

  $out = array();

  $len = strlen($str);
  for($i = 0; $i < $len; $i++) {
    $in = ord($str{$i});
    if (0 == $mState) {
      // When mState is zero we expect either a US-ASCII character or a
      // multi-octet sequence.
      if (0 == (0x80 & ($in))) {
        // US-ASCII, pass straight through.
        $out[] = $in;
        $mBytes = 1;
      } else if (0xC0 == (0xE0 & ($in))) {
        // First octet of 2 octet sequence
        $mUcs4 = ($in);
        $mUcs4 = ($mUcs4 & 0x1F) << 6;
        $mState = 1;
        $mBytes = 2;
      } else if (0xE0 == (0xF0 & ($in))) {
        // First octet of 3 octet sequence
        $mUcs4 = ($in);
        $mUcs4 = ($mUcs4 & 0x0F) << 12;
        $mState = 2;
        $mBytes = 3;
      } else if (0xF0 == (0xF8 & ($in))) {
        // First octet of 4 octet sequence
        $mUcs4 = ($in);
        $mUcs4 = ($mUcs4 & 0x07) << 18;
        $mState = 3;
        $mBytes = 4;
      } else if (0xF8 == (0xFC & ($in))) {
        /* First octet of 5 octet sequence.
         *
         * This is illegal because the encoded codepoint must be either
         * (a) not the shortest form or
         * (b) outside the Unicode range of 0-0x10FFFF.
         * Rather than trying to resynchronize, we will carry on until the end
         * of the sequence and let the later error handling code catch it.
         */
        $mUcs4 = ($in);
        $mUcs4 = ($mUcs4 & 0x03) << 24;
        $mState = 4;
        $mBytes = 5;
      } else if (0xFC == (0xFE & ($in))) {
        // First octet of 6 octet sequence, see comments for 5 octet sequence.
        $mUcs4 = ($in);
        $mUcs4 = ($mUcs4 & 1) << 30;
        $mState = 5;
        $mBytes = 6;
      } else {
        /* Current octet is neither in the US-ASCII range nor a legal first
         * octet of a multi-octet sequence.
         */
        return false;
      }
    } else {
      // When mState is non-zero, we expect a continuation of the multi-octet
      // sequence
      if (0x80 == (0xC0 & ($in))) {
        // Legal continuation.
        $shift = ($mState - 1) * 6;
        $tmp = $in;
        $tmp = ($tmp & 0x0000003F) << $shift;
        $mUcs4 |= $tmp;

        if (0 == --$mState) {
          /* End of the multi-octet sequence. mUcs4 now contains the final
           * Unicode codepoint to be output
           *
           * Check for illegal sequences and codepoints.
           */

          // From Unicode 3.1, non-shortest form is illegal
          if (((2 == $mBytes) && ($mUcs4 < 0x0080)) ||
              ((3 == $mBytes) && ($mUcs4 < 0x0800)) ||
              ((4 == $mBytes) && ($mUcs4 < 0x10000)) ||
              (4 < $mBytes) ||
              // From Unicode 3.2, surrogate characters are illegal
              (($mUcs4 & 0xFFFFF800) == 0xD800) ||
              // Codepoints outside the Unicode range are illegal
              ($mUcs4 > 0x10FFFF)) {
            return false;
          }
          if (0xFEFF != $mUcs4) {
            // BOM is legal but we don't want to output it
            $out[] = $mUcs4;
          }
          //initialize UTF8 cache
          $mState = 0;
          $mUcs4  = 0;
          $mBytes = 1;
        }
      } else {
        /* ((0xC0 & (*in) != 0x80) && (mState != 0))
         *
         * Incomplete multi-octet sequence.
         */
        return false;
      }
    }
  }
  return $out;
}
?>
