<?php
/**
 * $Id: nm_ini_lib.php,v 1.7 2012-01-10 19:38:03 diogo Exp $
 */

if (!defined('NM_INC_PROD_INI'))
{
    define('NM_INC_PROD_INI', TRUE);
}

//----- Esquema de Cores e Fontes
$sc_schema                     = array();
$sc_schema["page_face"]        = "Tahoma, Arial, sans-serif";
$sc_schema["page_color"]       = "#000000";
$sc_schema["page_size"]        = "2";
$sc_schema["page_bgcolor"]     = "#FFFFFF";
$sc_schema["bar_bgcolor"]      = "#3F1D1C";
$sc_schema["table_bgcolor"]    = "#000000";
$sc_schema["border_color"]     = "";
$sc_schema["border_width"]     = "0";
$sc_schema["cell_padding"]     = "2";
$sc_schema["cell_spacing"]     = "1";
$sc_schema["link_page"]        = "#9B6000";
$sc_schema["link_header"]      = "#FFFF00";
$sc_schema["link_grid"]        = "#9B6000";
$sc_schema["header_face"]      = "Verdana, Arial, sans-serif";
$sc_schema["header_color"]     = "#FFFFFF";
$sc_schema["header_size"]      = "3";
$sc_schema["header_bgcolor"]   = "#000000";
$sc_schema["title_face"]       = "Verdana, Arial, sans-serif";
$sc_schema["title_color"]      = "#FFFFFF";
$sc_schema["title_size"]       = "2";
$sc_schema["title_bgcolor"]    = "#855B3F";
$sc_schema["group_face"]       = "Verdana, Arial, sans-serif";
$sc_schema["group_color"]      = "#000000";
$sc_schema["group_size"]       = "2";
$sc_schema["group_bgcolor"]    = "#FFDE60";
$sc_schema["total_face"]       = "Verdana, Arial, sans-serif";
$sc_schema["total_color"]      = "#000000";
$sc_schema["total_size"]       = "2";
$sc_schema["total_bgcolor"]    = "#7B7B7B";
$sc_schema["subtotal_face"]    = "Verdana, Arial, sans-serif";
$sc_schema["subtotal_color"]   = "#000000";
$sc_schema["subtotal_size"]    = "2";
$sc_schema["subtotal_bgcolor"] = "#C2C2C2";
$sc_schema["grid_face"]        = "Tahoma, Arial, sans-serif";
$sc_schema["grid_color"]       = "#000000";
$sc_schema["grid_size"]        = "2";
$sc_schema["grid_odd"]         = "#FFF7DC";
$sc_schema["grid_even"]        = "#FCEEBC";
$sc_schema["image_page"]       = "";
$sc_schema["image_header"]     = "";
$sc_schema["image_title"]      = "";
$sc_schema["image_group"]      = "";
$sc_schema["image_total"]      = "";
$sc_schema["image_subtotal"]   = "";
$sc_schema["image_odd"]        = "";
$sc_schema["image_even"]       = "";

//----- Lista de SGBDs
$lista_sgbd = array();
$lista_sgbd['access']        = 'MS Access';
$lista_sgbd['ado']           = 'Generic ADO';
$lista_sgbd['ado_access']    = 'MS Access ADO';
$lista_sgbd['ado_mssql']     = 'MS SQL Server ADO MSDASQL';
$lista_sgbd['adooledb_mssql']= 'MS SQL Server ADO SQLOLEDB';
$lista_sgbd['borland_ibase'] = 'Interbase 6.5';
$lista_sgbd['db2']           = 'DB2';
$lista_sgbd['db2_odbc']      = 'DB2 ODBC NATIVE';
$lista_sgbd['odbc_db2']      = 'DB2 ODBC GENERIC';
$lista_sgbd['odbc_db2v6']    = 'DB2 ODBC GENERIC 6';
$lista_sgbd['firebird']      = 'Firebird';
$lista_sgbd['ibase']         = 'Interbase 6';
$lista_sgbd['maxsql']        = 'MaxSQL';
$lista_sgbd['mssql']         = 'MS SQL Server 7';
$lista_sgbd['mssqlnative']   = 'MS SQL Server NATIVE SRV';
$lista_sgbd['mysql']         = 'MySQL';
$lista_sgbd['mysqlt']        = 'MySQL (Transaction)';
$lista_sgbd['oci8']          = 'Oracle 8';
$lista_sgbd['oci805']        = 'Oracle 8.0.5';
$lista_sgbd['oci8po']        = 'Oracle 8 Portable';
$lista_sgbd['odbc']          = 'Generic ODBC';
$lista_sgbd['odbc_mssql']    = 'MS SQL Server ODBC';
$lista_sgbd['odbc_oracle']   = 'Oracle ODBC';
$lista_sgbd['oracle']        = 'Oracle 7';
$lista_sgbd['pdo_oracle']    = 'Oracle PDO';
$lista_sgbd['pdosqlite']     = 'SQLite PDO';
$lista_sgbd['postgres']      = 'PostgreSQL';
$lista_sgbd['postgres64']    = 'PostgreSQL 6.4';
$lista_sgbd['postgres7']     = 'PostgreSQL 7';
$lista_sgbd['progress']      = 'Progress';
$lista_sgbd['sqlite']        = 'SQLite';
$lista_sgbd['sqlite3']       = 'SQLite 3';
$lista_sgbd['sybase']        = 'Sybase';
//$lista_sgbd['vfp']           = 'Visual FoxPro';
asort($lista_sgbd);

//----- Funcoes Auxiliares
//protegido se funcao existe, pois alteração da Telematica Suricato
//o desenv agora inclui essa lib e algumas funcoes ja existiam na lista de funcoes do scriptcase
//e quando inclui essa lib da erro de funcao ja declarada, entao so inclui se a funcao nao existir
if(!function_exists("nm_dir_create"))
{
	function nm_dir_create($v_str_dir)
	{
	    if (@is_dir($v_str_dir))
	    {
	        return TRUE;
	    }
	    $arr_subdir = explode('/', nm_dir_normaliza($v_str_dir));
	    $str_dir    = $arr_subdir[0] . '/';
	    for ($i = 1; $i < sizeof($arr_subdir); $i++)
	    {
	        $str_dir .= $arr_subdir[$i] . '/';
	        if (!@is_dir($str_dir))
	        {
	            @mkdir($str_dir, 0755);
	            @chmod($str_dir, 0755);
	        }
	    }
	    return @is_dir($str_dir);
	}
}

function nm_dir_normaliza($v_str_dir)
{
    $str_dir = str_replace("\\", '/', $v_str_dir);
    $str_dir = str_replace('//', '/', $str_dir);
    if ('/' != substr($str_dir, -1))
    {
        $str_dir .= '/';
    }
    return $str_dir;
}

function salva_xml($prod_ini_file, $novo_xml, $arr_ini)
{
	global $nm_lang;

	//atualiza cache e sessao do prod
	$_SESSION['nm_session']['prod_v8']['arr_ini'] = $arr_ini;
	$_SESSION['nm_session']['cache']['prod_v8']   = $arr_ini;
	
	if (!@is_dir(dirname($prod_ini_file)))
    {
        nm_dir_create(dirname($prod_ini_file));
    }
	
	file_put_contents($prod_ini_file, $novo_xml);
}

function prepara_string($string = "")
{
    if (get_magic_quotes_gpc())
    {
        $result = stripslashes($string);
    }
    else
    {
        $result = $string;
    }
    return ($result);
}

//protegido se funcao existe, pois alteração da Telematica Suricato
//o desenv agora inclui essa lib e algumas funcoes ja existiam na lista de funcoes do scriptcase
//e quando inclui essa lib da erro de funcao ja declarada, entao so inclui se a funcao nao existir
if(!function_exists("encode_string"))
{
	function encode_string($v_str_decoded)
	{
		if(empty($v_str_decoded)) return "";
	
		$result = shift_letter($v_str_decoded, 5);
	    $result = xoft_encode($result, "filet com fritas");
	    $result = substitution($result, "enc");
	    $result = xoft_encode($result, "arroz com feijao");
	    $result = shift_letter($result, 17);
		
		return $result;
	}
}

if(!function_exists("encode_string_utf8"))
{
	function encode_string_utf8($v_str_decoded)
	{
		if(empty($v_str_decoded)) return "";
	
		return "enc_nm_enc_v1" . encode_string(unicode_encode64($v_str_decoded));
	}
}

if(!function_exists("unicode_encode64"))
{
	//essas funcoes dao suporte a cryptografia de caracteres utf8
	function unicode_encode64($v_str_string) {
		return base64_encode($v_str_string);
	}
}

if(!function_exists("unicode_decode64"))
{
	//essas funcoes dao suporte a cryptografia de caracteres utf8
	function unicode_decode64($v_str_string) {
		return base64_decode($v_str_string);
	} 
} 

//protegido se funcao existe, pois alteração da Telematica Suricato
//o desenv agora inclui essa lib e algumas funcoes ja existiam na lista de funcoes do scriptcase
//e quando inclui essa lib da erro de funcao ja declarada, entao so inclui se a funcao nao existir
if(!function_exists("decode_string"))
{
	function decode_string($string)
	{
		$new_crypt = false;
		if(substr($string, 0, 13) == "enc_nm_enc_v1")
		{
			$string = substr($string, 13);
			$new_crypt = true;
		}
		
	    $result = shift_letter($string, 9);
	    $result = xoft_decode($result, "arroz com feijao");
	    $result = substitution($result, "dec");
	    $result = xoft_decode($result, "filet com fritas");
	    $result = shift_letter($result, 21);
		
		if($new_crypt)
		{
			$result = unicode_decode64($result);
		}
		
	    return ($result);
	}
}

//protegido se funcao existe, pois alteração da Telematica Suricato
//o desenv agora inclui essa lib e algumas funcoes ja existiam na lista de funcoes do scriptcase
//e quando inclui essa lib da erro de funcao ja declarada, entao so inclui se a funcao nao existir
if(!function_exists("dectobase64"))
{
	function dectobase64($decimal_value)
	{
	    switch($decimal_value)
	    {
	        case 0:  $base64_value="A"; break;
	        case 1:  $base64_value="B"; break;
	        case 2:  $base64_value="C"; break;
	        case 3:  $base64_value="D"; break;
	        case 4:  $base64_value="E"; break;
	        case 5:  $base64_value="F"; break;
	        case 6:  $base64_value="G"; break;
	        case 7:  $base64_value="H"; break;
	        case 8:  $base64_value="I"; break;
	        case 9:  $base64_value="J"; break;
	        case 10: $base64_value="K"; break;
	        case 11: $base64_value="L"; break;
	        case 12: $base64_value="M"; break;
	        case 13: $base64_value="N"; break;
	        case 14: $base64_value="O"; break;
	        case 15: $base64_value="P"; break;
	        case 16: $base64_value="Q"; break;
	        case 17: $base64_value="R"; break;
	        case 18: $base64_value="S"; break;
	        case 19: $base64_value="T"; break;
	        case 20: $base64_value="U"; break;
	        case 21: $base64_value="V"; break;
	        case 22: $base64_value="W"; break;
	        case 23: $base64_value="X"; break;
	        case 24: $base64_value="Y"; break;
	        case 25: $base64_value="Z"; break;
	        case 26: $base64_value="a"; break;
	        case 27: $base64_value="b"; break;
	        case 28: $base64_value="c"; break;
	        case 29: $base64_value="d"; break;
	        case 30: $base64_value="e"; break;
	        case 31: $base64_value="f"; break;
	        case 32: $base64_value="g"; break;
	        case 33: $base64_value="h"; break;
	        case 34: $base64_value="i"; break;
	        case 35: $base64_value="j"; break;
	        case 36: $base64_value="k"; break;
	        case 37: $base64_value="l"; break;
	        case 38: $base64_value="m"; break;
	        case 39: $base64_value="n"; break;
	        case 40: $base64_value="o"; break;
	        case 41: $base64_value="p"; break;
	        case 42: $base64_value="q"; break;
	        case 43: $base64_value="r"; break;
	        case 44: $base64_value="s"; break;
	        case 45: $base64_value="t"; break;
	        case 46: $base64_value="u"; break;
	        case 47: $base64_value="v"; break;
	        case 48: $base64_value="w"; break;
	        case 49: $base64_value="x"; break;
	        case 50: $base64_value="y"; break;
	        case 51: $base64_value="z"; break;
	        case 52: $base64_value="0"; break;
	        case 53: $base64_value="1"; break;
	        case 54: $base64_value="2"; break;
	        case 55: $base64_value="3"; break;
	        case 56: $base64_value="4"; break;
	        case 57: $base64_value="5"; break;
	        case 58: $base64_value="6"; break;
	        case 59: $base64_value="7"; break;
	        case 60: $base64_value="8"; break;
	        case 61: $base64_value="9"; break;
	        case 62: $base64_value="+"; break;
	        case 63: $base64_value="/"; break;
	        case 64: $base64_value="="; break;
	        default: $base64_value="a"; break;
	    }
	    return ($base64_value);
	}
}

//protegido se funcao existe, pois alteração da Telematica Suricato
//o desenv agora inclui essa lib e algumas funcoes ja existiam na lista de funcoes do scriptcase
//e quando inclui essa lib da erro de funcao ja declarada, entao so inclui se a funcao nao existir
if(!function_exists("base64todec"))
{
	function base64todec($base64_value)
	{
	    switch($base64_value)
	    {
	        case "A": $decimal_value=0;  break;
	        case "B": $decimal_value=1;  break;
	        case "C": $decimal_value=2;  break;
	        case "D": $decimal_value=3;  break;
	        case "E": $decimal_value=4;  break;
	        case "F": $decimal_value=5;  break;
	        case "G": $decimal_value=6;  break;
	        case "H": $decimal_value=7;  break;
	        case "I": $decimal_value=8;  break;
	        case "J": $decimal_value=9;  break;
	        case "K": $decimal_value=10; break;
	        case "L": $decimal_value=11; break;
	        case "M": $decimal_value=12; break;
	        case "N": $decimal_value=13; break;
	        case "O": $decimal_value=14; break;
	        case "P": $decimal_value=15; break;
	        case "Q": $decimal_value=16; break;
	        case "R": $decimal_value=17; break;
	        case "S": $decimal_value=18; break;
	        case "T": $decimal_value=19; break;
	        case "U": $decimal_value=20; break;
	        case "V": $decimal_value=21; break;
	        case "W": $decimal_value=22; break;
	        case "X": $decimal_value=23; break;
	        case "Y": $decimal_value=24; break;
	        case "Z": $decimal_value=25; break;
	        case "a": $decimal_value=26; break;
	        case "b": $decimal_value=27; break;
	        case "c": $decimal_value=28; break;
	        case "d": $decimal_value=29; break;
	        case "e": $decimal_value=30; break;
	        case "f": $decimal_value=31; break;
	        case "g": $decimal_value=32; break;
	        case "h": $decimal_value=33; break;
	        case "i": $decimal_value=34; break;
	        case "j": $decimal_value=35; break;
	        case "k": $decimal_value=36; break;
	        case "l": $decimal_value=37; break;
	        case "m": $decimal_value=38; break;
	        case "n": $decimal_value=39; break;
	        case "o": $decimal_value=40; break;
	        case "p": $decimal_value=41; break;
	        case "q": $decimal_value=42; break;
	        case "r": $decimal_value=43; break;
	        case "s": $decimal_value=44; break;
	        case "t": $decimal_value=45; break;
	        case "u": $decimal_value=46; break;
	        case "v": $decimal_value=47; break;
	        case "w": $decimal_value=48; break;
	        case "x": $decimal_value=49; break;
	        case "y": $decimal_value=50; break;
	        case "z": $decimal_value=51; break;
	        case "0": $decimal_value=52; break;
	        case "1": $decimal_value=53; break;
	        case "2": $decimal_value=54; break;
	        case "3": $decimal_value=55; break;
	        case "4": $decimal_value=56; break;
	        case "5": $decimal_value=57; break;
	        case "6": $decimal_value=58; break;
	        case "7": $decimal_value=59; break;
	        case "8": $decimal_value=60; break;
	        case "9": $decimal_value=61; break;
	        case "+": $decimal_value=62; break;
	        case "/": $decimal_value=63; break;
	        case "=": $decimal_value=64; break;
	        default:  $decimal_value=0;  break;
	    }
	    return ($decimal_value);
	}
}

//protegido se funcao existe, pois alteração da Telematica Suricato
//o desenv agora inclui essa lib e algumas funcoes ja existiam na lista de funcoes do scriptcase
//e quando inclui essa lib da erro de funcao ja declarada, entao so inclui se a funcao nao existir
if(!function_exists("xoft_encode"))
{
	function xoft_encode($plain_data, $key)
	{
	    $key_length    = 0;
	    $all_bin_chars = "";
	    $cipher_data   = "";
	    for ($i = 0; $i < strlen($plain_data); $i++)
	    {
	        $p = substr($plain_data, $i, 1);
	        $k = substr($key, $key_length, 1);
	        $key_length++;
	        if ($key_length >= strlen($key))
	        {
	            $key_length = 0;
	        }
	        $dec_chars = ord($p) ^ ord($k);
	        $dec_chars = $dec_chars + strlen($key);
	        $bin_chars = decbin($dec_chars);
	        while (strlen($bin_chars)<8)
	        {
	            $bin_chars = "0" . $bin_chars;
	        }
	        $all_bin_chars = $all_bin_chars . $bin_chars;
	    }
	    $m = 0;
	    for ($j = 0; $j < strlen($all_bin_chars); $j = $j + 4)
	    {
	        $four_bit      = substr($all_bin_chars, $j, 4);
	        $four_bit_dec  = bindec($four_bit);
	        $decimal_value = $four_bit_dec * 4 + $m;
	        $base64_value  = dectobase64($decimal_value);
	        $cipher_data   = $cipher_data . $base64_value;
	        $m++;
	        if ($m > 3)
	        {
	            $m = 0;
	        }
	    }
	    return ($cipher_data);
	}
}

//protegido se funcao existe, pois alteração da Telematica Suricato
//o desenv agora inclui essa lib e algumas funcoes ja existiam na lista de funcoes do scriptcase
//e quando inclui essa lib da erro de funcao ja declarada, entao so inclui se a funcao nao existir
if(!function_exists("xoft_decode"))
{
	function xoft_decode($cipher_data, $key)
	{
	    $m             = 0;
	    $all_bin_chars = "";
	    for ($i=0;$i<strlen($cipher_data);$i++)
	    {
	        $c             = substr($cipher_data, $i, 1);
	        $decimal_value = base64todec($c);
	        $decimal_value = ($decimal_value - $m) / 4;
	        $four_bit      = decbin($decimal_value);
	        while (strlen($four_bit) < 4)
	        {
	            $four_bit = "0" . $four_bit;
	        }
	        $all_bin_chars = $all_bin_chars . $four_bit;
	        $m++;
	        if ($m > 3)
	        {
	            $m = 0;
	        }
	    }
	    $key_length = 0;
	    $plain_data = "";
	    for ($j = 0; $j < strlen($all_bin_chars); $j = $j + 8)
	    {
	        $c         = substr($all_bin_chars, $j, 8);
	        $k         = substr($key, $key_length, 1);
	        $dec_chars = bindec($c);
	        $dec_chars = $dec_chars - strlen($key);
	        $c         = chr($dec_chars);
	        $key_length++;
	        if ($key_length >= strlen($key))
	        {
	            $key_length = 0;
	        }
	        $dec_chars  = ord($c) ^ ord($k);
	        $p          = chr($dec_chars);
	        $plain_data = $plain_data . $p;
	    }
	    return ($plain_data);
	}
}

//protegido se funcao existe, pois alteração da Telematica Suricato
//o desenv agora inclui essa lib e algumas funcoes ja existiam na lista de funcoes do scriptcase
//e quando inclui essa lib da erro de funcao ja declarada, entao so inclui se a funcao nao existir
if(!function_exists("shift_letter"))
{
	function shift_letter($plain, $shift)
	{
	    $cipher = "";
	    for($i = 0;$i < strlen($plain); $i++)
	    {
	        $p = substr($plain, $i, 1);
	        $p = ord($p);
	        if (($p >= 97) && ($p <= 122))
	        {
	            $c = $p + $shift;
	            if ($c > 122)
	            {
	                $c = $c - 26;
	            }
	        }
	        elseif (($p >= 65) && ($p <= 90))
	        {
	            $c = $p + $shift;
	            if($c > 90)
	            {
	                $c = $c - 26;
	            }
	        }
	        else
	        {
	            $c = $p;
	        }
	        $c      = chr($c);
	        $cipher = $cipher . $c;
	    }
	    return ($cipher);
	}
}

//protegido se funcao existe, pois alteração da Telematica Suricato
//o desenv agora inclui essa lib e algumas funcoes ja existiam na lista de funcoes do scriptcase
//e quando inclui essa lib da erro de funcao ja declarada, entao so inclui se a funcao nao existir
if(!function_exists("substitution"))
{
	function substitution($plain, $operation)
	{
	    $decode  = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ=";
	    $encode  = "blPqoVjBiOrnDucdxLyICaRSfAkFQsNtmzZKMpHeTGWhUXJwvYgE_";
	    $d_temp  = string_to_array($decode);
	    $e_temp  = string_to_array($encode);
	    $array_d = array();
	    $array_e = array();
	    for ($i = 0; $i < sizeof($d_temp); $i++)
	    {
	        $array_d[$e_temp[$i]] = $d_temp[$i];
	        $array_e[$d_temp[$i]] = $e_temp[$i];
	    }
	    $cipher = "";
	    $array  = ("dec" == $operation) ? $array_d : $array_e;
	    for ($i = 0; $i < strlen($plain); $i++)
	    {
	        $char    = substr($plain, $i, 1);
	        $cipher .= (in_array($char, $array)) ? $array[$char] : $char;
	    }
	    return ($cipher);
	}
}

//protegido se funcao existe, pois alteração da Telematica Suricato
//o desenv agora inclui essa lib e algumas funcoes ja existiam na lista de funcoes do scriptcase
//e quando inclui essa lib da erro de funcao ja declarada, entao so inclui se a funcao nao existir
if(!function_exists("string_to_array"))
{
	function string_to_array($string)
	{
	    $str_chunk = chunk_split($string, 1, " ");
	    $array     = explode(" ", substr($str_chunk, 0, strlen($str_chunk) - 1));
	    return ($array);
	}
}

//protegido se funcao existe, pois alteração da Telematica Suricato
//o desenv agora inclui essa lib e algumas funcoes ja existiam na lista de funcoes do scriptcase
//e quando inclui essa lib da erro de funcao ja declarada, entao so inclui se a funcao nao existir
if(!function_exists("getProdVersion"))
{
	function getProdVersion($v_str_dir_lib)
	{
		$v_str_dir_lib .= "/ver.dat";
		if(is_file($v_str_dir_lib))
		{
			return implode("", file($v_str_dir_lib));
		}
	}
}
?>
