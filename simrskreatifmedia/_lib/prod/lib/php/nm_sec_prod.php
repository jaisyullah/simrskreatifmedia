<?php
/**
 * $Id: nm_sec_prod.php,v 1.1.1.1 2011-05-12 20:31:30 diogo Exp $
 */
  function nm_reg_prod()
  {
	  return ("NmScriptCaseAplOk");
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
  
function xdecode_string($vString)
{
	$new_crypt = false;
	if(substr($vString, 0, 13) == "enc_nm_enc_v1")
	{
		$vString = substr($vString, 13);
		$new_crypt = true;
	}

    $result = xshift_letter($vString, 9);
    $result = xxoft_decode($result, "arroz com feijao");
    $result = xsubstitution($result, "dec");
    $result = xxoft_decode($result, "filet com fritas");
    $result = xshift_letter($result, 21);
	
	if($new_crypt)
	{
		$result = unicode_decode64($result);
	}
	
    return ($result);
}

function xdectobase64($vDecimal)
{
    switch($vDecimal)
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

function xbase64todec($vBase64)
{
    switch($vBase64)
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

function xxoft_decode($cipher_data, $key)
{
    $m             = 0;
    $all_bin_chars = "";
    for ($i = 0; $i < strlen($cipher_data); $i++)
    {
        $c             = substr($cipher_data, $i, 1);
        $decimal_value = xbase64todec($c);
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

function xshift_letter($plain, $shift)
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

function xsubstitution($plain, $operation)
{
    $decode  = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ=";
    $encode  = "blPqoVjBiOrnDucdxLyICaRSfAkFQsNtmzZKMpHeTGWhUXJwvYgE_";
    $d_temp  = xstring_to_array($decode);
    $e_temp  = xstring_to_array($encode);
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

function xstring_to_array($string)
{
    $str_chunk = chunk_split($string, 1, " ");
    $array     = explode(" ", substr($str_chunk, 0, strlen($str_chunk) - 1));
    return ($array);
}

?>