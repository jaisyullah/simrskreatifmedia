<?php
    function sc_filename_protect_chars($sFilename) {
        $aProtectBasic = array(
            "'" => '__SC_QUOTES__',
            ' ' => '__SC_SPACE__',
            '!' => '__SC_EXCLAMATION__',
            ',' => '__SC_COMMA__',
            '-' => '__SC_MINUS__',
            '+' => '__SC_PLUS__',
            '=' => '__SC_EQUAL__',
            '(' => '__SC_PARENTHESIS_LEFT__',
            ')' => '__SC_PARENTHESIS_RIGHT__',
            '[' => '__SC_BRACKET_LEFT__',
            ']' => '__SC_BRACKET_RIGHT__',
            '{' => '__SC_CURLYBRACE_LEFT__',
            '}' => '__SC_CURLYBRACE_RIGHT__',
            '&' => '__SC_AMPERSAND__',
            '%' => '__SC_PERCENT__',
            '$' => '__SC_DOLLAR__',
            '#' => '__SC_NUMBER__',
            '@' => '__SC_AT__',
            ';' => '__SC_SEMMICOLON__',
            '~' => '__SC_TILDE__',
            '^' => '__SC_CARET__',
        );
        $aProtectUtf8 = array(
            '´' => '__SC_ACUTE__',
            '`' => '__SC_GRAVE__',
            '¨' => '__SC_UMLAUT__',
            'á' => '__SC_aACUTE__',
            'à' => '__SC_aGRAVE__',
            'ã' => '__SC_aTILDE__',
            'â' => '__SC_aCARET__',
            'ä' => '__SC_aUMLAUT__',
            'Á' => '__SC_AACUTE__',
            'À' => '__SC_AGRAVE__',
            'Ã' => '__SC_ATILDE__',
            'Â' => '__SC_ACARET__',
            'Ä' => '__SC_AUMLAUT__',
            'é' => '__SC_eACUTE__',
            'è' => '__SC_eGRAVE__',
            'ê' => '__SC_eCARET__',
            'ë' => '__SC_eUMLAUT__',
            'É' => '__SC_EACUTE__',
            'È' => '__SC_EGRAVE__',
            'Ê' => '__SC_ECARET__',
            'Ë' => '__SC_EUMLAUT__',
            'í' => '__SC_iACUTE__',
            'ì' => '__SC_iGRAVE__',
            'î' => '__SC_iCARET__',
            'ï' => '__SC_iUMLAUT__',
            'Í' => '__SC_IACUTE__',
            'Ì' => '__SC_IGRAVE__',
            'Î' => '__SC_ICARET__',
            'Ï' => '__SC_IUMLAUT__',
            'ó' => '__SC_oACUTE__',
            'ò' => '__SC_oGRAVE__',
            'õ' => '__SC_oTILDE__',
            'ô' => '__SC_oCARET__',
            'ö' => '__SC_oUMLAUT__',
            'Ó' => '__SC_OACUTE__',
            'Ò' => '__SC_OGRAVE__',
            'Õ' => '__SC_OTILDE__',
            'Ô' => '__SC_OCARET__',
            'Ö' => '__SC_OUMLAUT__',
            'ú' => '__SC_uACUTE__',
            'ù' => '__SC_uGRAVE__',
            'û' => '__SC_uCARET__',
            'ü' => '__SC_uUMLAUT__',
            'Ú' => '__SC_UACUTE__',
            'Ù' => '__SC_UGRAVE__',
            'Û' => '__SC_UCARET__',
            'Ü' => '__SC_UUMLAUT__',
            'ý' => '__SC_yACUTE__',
            'ÿ' => '__SC_yUMLAUT__',
            'Ý' => '__SC_YACUTE__',
            'ç' => '__SC_cCEDILLA__',
            'Ç' => '__SC_CCEDILLA__',
            'ñ' => '__SC_nTILDE__',
            'Ñ' => '__SC_NTILDE__',
        );
        if (isset($_SESSION['scriptcase']['charset']) && $_SESSION['scriptcase']['charset'] != 'UTF-8')
        {
            $aTmpList = array();
            foreach ($aProtectUtf8 as $sChar => $sCode)
            {
                $aTmpList[ NM_conv_charset($sChar, $_SESSION['scriptcase']['charset'], 'UTF-8') ] = $sCode;
            }
            $aProtectUtf8 = $aTmpList;
        }
        $sFilename = str_replace(array_keys($aProtectBasic), array_values($aProtectBasic), $sFilename);
        $sFilename = str_replace(array_keys($aProtectUtf8),  array_values($aProtectUtf8),  $sFilename);
        return $sFilename;
    }

    function sc_filename_unprotect_chars($sFilename) {
        $aProtectBasic = array(
            "'" => '__SC_QUOTES__',
            ' ' => '__SC_SPACE__',
            '!' => '__SC_EXCLAMATION__',
            ',' => '__SC_COMMA__',
            '-' => '__SC_MINUS__',
            '+' => '__SC_PLUS__',
            '=' => '__SC_EQUAL__',
            '(' => '__SC_PARENTHESIS_LEFT__',
            ')' => '__SC_PARENTHESIS_RIGHT__',
            '[' => '__SC_BRACKET_LEFT__',
            ']' => '__SC_BRACKET_RIGHT__',
            '{' => '__SC_CURLYBRACE_LEFT__',
            '}' => '__SC_CURLYBRACE_RIGHT__',
            '&' => '__SC_AMPERSAND__',
            '%' => '__SC_PERCENT__',
            '$' => '__SC_DOLLAR__',
            '#' => '__SC_NUMBER__',
            '@' => '__SC_AT__',
            ';' => '__SC_SEMMICOLON__',
            '~' => '__SC_TILDE__',
            '^' => '__SC_CARET__',
        );
        $aProtectUtf8 = array(
            '´' => '__SC_ACUTE__',
            '`' => '__SC_GRAVE__',
            '¨' => '__SC_UMLAUT__',
            'á' => '__SC_aACUTE__',
            'à' => '__SC_aGRAVE__',
            'ã' => '__SC_aTILDE__',
            'â' => '__SC_aCARET__',
            'ä' => '__SC_aUMLAUT__',
            'Á' => '__SC_AACUTE__',
            'À' => '__SC_AGRAVE__',
            'Ã' => '__SC_ATILDE__',
            'Â' => '__SC_ACARET__',
            'Ä' => '__SC_AUMLAUT__',
            'é' => '__SC_eACUTE__',
            'è' => '__SC_eGRAVE__',
            'ê' => '__SC_eCARET__',
            'ë' => '__SC_eUMLAUT__',
            'É' => '__SC_EACUTE__',
            'È' => '__SC_EGRAVE__',
            'Ê' => '__SC_ECARET__',
            'Ë' => '__SC_EUMLAUT__',
            'í' => '__SC_iACUTE__',
            'ì' => '__SC_iGRAVE__',
            'î' => '__SC_iCARET__',
            'ï' => '__SC_iUMLAUT__',
            'Í' => '__SC_IACUTE__',
            'Ì' => '__SC_IGRAVE__',
            'Î' => '__SC_ICARET__',
            'Ï' => '__SC_IUMLAUT__',
            'ó' => '__SC_oACUTE__',
            'ò' => '__SC_oGRAVE__',
            'õ' => '__SC_oTILDE__',
            'ô' => '__SC_oCARET__',
            'ö' => '__SC_oUMLAUT__',
            'Ó' => '__SC_OACUTE__',
            'Ò' => '__SC_OGRAVE__',
            'Õ' => '__SC_OTILDE__',
            'Ô' => '__SC_OCARET__',
            'Ö' => '__SC_OUMLAUT__',
            'ú' => '__SC_uACUTE__',
            'ù' => '__SC_uGRAVE__',
            'û' => '__SC_uCARET__',
            'ü' => '__SC_uUMLAUT__',
            'Ú' => '__SC_UACUTE__',
            'Ù' => '__SC_UGRAVE__',
            'Û' => '__SC_UCARET__',
            'Ü' => '__SC_UUMLAUT__',
            'ý' => '__SC_yACUTE__',
            'ÿ' => '__SC_yUMLAUT__',
            'Ý' => '__SC_YACUTE__',
            'ç' => '__SC_cCEDILLA__',
            'Ç' => '__SC_CCEDILLA__',
            'ñ' => '__SC_nTILDE__',
            'Ñ' => '__SC_NTILDE__',
        );
        if (isset($_SESSION['scriptcase']['charset']) && $_SESSION['scriptcase']['charset'] != 'UTF-8')
        {
            $aTmpList = array();
            foreach ($aProtectUtf8 as $sChar => $sCode)
            {
                $aTmpList[ NM_conv_charset($sChar, $_SESSION['scriptcase']['charset'], 'UTF-8') ] = $sCode;
            }
            $aProtectUtf8 = $aTmpList;
        }
        $sFilename = str_replace(array_values($aProtectBasic), array_keys($aProtectBasic), $sFilename);
        $sFilename = str_replace(array_values($aProtectUtf8),  array_keys($aProtectUtf8),  $sFilename);
        return $sFilename;
    }

    function sc_upload_protect_chars($sFilename) {
        $aProtectBasic = array(
            ' ' => '__SC_SPACE__',
            '!' => '__SC_EXCLAMATION__',
            '"' => '__SC_DOUBLE_QUOTES__',
            '#' => '__SC_NUMBER__',
            '$' => '__SC_DOLLAR__',
            '%' => '__SC_PERCENT__',
            '&' => '__SC_AMPERSAND__',
            "'" => '__SC_SINGLE_QUOTES__',
            '(' => '__SC_PARENTHESIS_OPEN__',
            ')' => '__SC_PARENTHESIS_CLOSE__',
            '*' => '__SC_ASTERISK__',
            '+' => '__SC_PLUS__',
            ',' => '__SC_COMMA__',
            '-' => '__SC_MINUS__',
            ';' => '__SC_SEMMICOLON__',
            '=' => '__SC_EQUAL__',
            '@' => '__SC_AT__',
            '[' => '__SC_BRACKET_OPEN__',
            ']' => '__SC_BRACKET_CLOSE__',
            '^' => '__SC_CARET__',
            '{' => '__SC_CURLYBRACE_OPEN__',
            '}' => '__SC_CURLYBRACE_CLOSE__',
            '~' => '__SC_TILDE__',
        );
        $aProtectPlus = array(
            '¢' => '__SC_CENT__',
            '€' => '__SC_EURO__',
            '£' => '__SC_POUND__',
            '¥' => '__SC_YEN__',
            '¡' => '__SC_INVERTED_EXCLAMATION__',
            '§' => '__SC_SECTION__',
            'ª' => '__SC_FEM_ORDINAL__',
            'º' => '__SC_MASC_ORDINAL__',
            '°' => '__SC_DEGREE__',
            '¹' => '__SC_SUP_ONE__',
            '²' => '__SC_SUP_TWO__',
            '³' => '__SC_SUP_THREE__',
        );
        $sFilename = str_replace(array_keys($aProtectBasic), array_values($aProtectBasic), $sFilename);
        if (isset($_SESSION['scriptcase']['charset']) && $_SESSION['scriptcase']['charset'] != 'UTF-8')
        {
            $sFilename = str_replace(array_keys($aProtectPlus), array_values($aProtectPlus), $sFilename);
        }
        return $sFilename;
    }

    function sc_upload_unprotect_chars($sFilename) {
        $aProtectBasic = array(
            ' ' => '__SC_SPACE__',
            '!' => '__SC_EXCLAMATION__',
            '"' => '__SC_DOUBLE_QUOTES__',
            '#' => '__SC_NUMBER__',
            '$' => '__SC_DOLLAR__',
            '%' => '__SC_PERCENT__',
            '&' => '__SC_AMPERSAND__',
            "'" => '__SC_SINGLE_QUOTES__',
            '(' => '__SC_PARENTHESIS_OPEN__',
            ')' => '__SC_PARENTHESIS_CLOSE__',
            '*' => '__SC_ASTERISK__',
            '+' => '__SC_PLUS__',
            ',' => '__SC_COMMA__',
            '-' => '__SC_MINUS__',
            ';' => '__SC_SEMMICOLON__',
            '=' => '__SC_EQUAL__',
            '@' => '__SC_AT__',
            '[' => '__SC_BRACKET_OPEN__',
            ']' => '__SC_BRACKET_CLOSE__',
            '^' => '__SC_CARET__',
            '{' => '__SC_CURLYBRACE_OPEN__',
            '}' => '__SC_CURLYBRACE_CLOSE__',
            '~' => '__SC_TILDE__',
        );
        $aProtectPlus = array(
            '¢' => '__SC_CENT__',
            '€' => '__SC_EURO__',
            '£' => '__SC_POUND__',
            '¥' => '__SC_YEN__',
            '¡' => '__SC_INVERTED_EXCLAMATION__',
            '§' => '__SC_SECTION__',
            'ª' => '__SC_FEM_ORDINAL__',
            'º' => '__SC_MASC_ORDINAL__',
            '°' => '__SC_DEGREE__',
            '¹' => '__SC_SUP_ONE__',
            '²' => '__SC_SUP_TWO__',
            '³' => '__SC_SUP_THREE__',
        );
        $sFilename = str_replace(array_values($aProtectBasic), array_keys($aProtectBasic), $sFilename);
        if (isset($_SESSION['scriptcase']['charset']) && $_SESSION['scriptcase']['charset'] != 'UTF-8')
        {
            $sFilename = str_replace(array_values($aProtectPlus), array_keys($aProtectPlus), $sFilename);
        }
        return $sFilename;
    }
?>
