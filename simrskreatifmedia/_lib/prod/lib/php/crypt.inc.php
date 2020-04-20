<?php
/**
 * Criptografia.
 *
 * Rotinas de criptografia utilizadas no ScriptCase.
 *
 * @package     Biblioteca
 * @subpackage  PHP
 * @creation    2003/10/02
 * @copyright   NetMake Solucoes em Informatica
 * @author      Luis Humberto Roman <romanlh@netmake.com.br>
 *
 * $Id: crypt.inc.php,v 1.3 2012-01-10 19:38:03 diogo Exp $
 */

/* Protecao contra hacks */

/**
 * Retorna valor na base 64.
 *
 * Retorna o valor na base 64 de um numero.
 *
 * @access  private
 * @param   integer  $v_int_decimal  Numero original.
 * @return  string   $str_base64     Valor na base 64.
 */
function nm_crypt_conv_10to64($v_int_decimal)
{
    switch($v_int_decimal)
    {
        case 0:  $str_base64 = 'A'; break;
        case 1:  $str_base64 = 'B'; break;
        case 2:  $str_base64 = 'C'; break;
        case 3:  $str_base64 = 'D'; break;
        case 4:  $str_base64 = 'E'; break;
        case 5:  $str_base64 = 'F'; break;
        case 6:  $str_base64 = 'G'; break;
        case 7:  $str_base64 = 'H'; break;
        case 8:  $str_base64 = 'I'; break;
        case 9:  $str_base64 = 'J'; break;
        case 10: $str_base64 = 'K'; break;
        case 11: $str_base64 = 'L'; break;
        case 12: $str_base64 = 'M'; break;
        case 13: $str_base64 = 'N'; break;
        case 14: $str_base64 = 'O'; break;
        case 15: $str_base64 = 'P'; break;
        case 16: $str_base64 = 'Q'; break;
        case 17: $str_base64 = 'R'; break;
        case 18: $str_base64 = 'S'; break;
        case 19: $str_base64 = 'T'; break;
        case 20: $str_base64 = 'U'; break;
        case 21: $str_base64 = 'V'; break;
        case 22: $str_base64 = 'W'; break;
        case 23: $str_base64 = 'X'; break;
        case 24: $str_base64 = 'Y'; break;
        case 25: $str_base64 = 'Z'; break;
        case 26: $str_base64 = 'a'; break;
        case 27: $str_base64 = 'b'; break;
        case 28: $str_base64 = 'c'; break;
        case 29: $str_base64 = 'd'; break;
        case 30: $str_base64 = 'e'; break;
        case 31: $str_base64 = 'f'; break;
        case 32: $str_base64 = 'g'; break;
        case 33: $str_base64 = 'h'; break;
        case 34: $str_base64 = 'i'; break;
        case 35: $str_base64 = 'j'; break;
        case 36: $str_base64 = 'k'; break;
        case 37: $str_base64 = 'l'; break;
        case 38: $str_base64 = 'm'; break;
        case 39: $str_base64 = 'n'; break;
        case 40: $str_base64 = 'o'; break;
        case 41: $str_base64 = 'p'; break;
        case 42: $str_base64 = 'q'; break;
        case 43: $str_base64 = 'r'; break;
        case 44: $str_base64 = 's'; break;
        case 45: $str_base64 = 't'; break;
        case 46: $str_base64 = 'u'; break;
        case 47: $str_base64 = 'v'; break;
        case 48: $str_base64 = 'w'; break;
        case 49: $str_base64 = 'x'; break;
        case 50: $str_base64 = 'y'; break;
        case 51: $str_base64 = 'z'; break;
        case 52: $str_base64 = '0'; break;
        case 53: $str_base64 = '1'; break;
        case 54: $str_base64 = '2'; break;
        case 55: $str_base64 = '3'; break;
        case 56: $str_base64 = '4'; break;
        case 57: $str_base64 = '5'; break;
        case 58: $str_base64 = '6'; break;
        case 59: $str_base64 = '7'; break;
        case 60: $str_base64 = '8'; break;
        case 61: $str_base64 = '9'; break;
        case 62: $str_base64 = '+'; break;
        case 63: $str_base64 = '/'; break;
        case 64: $str_base64 = '='; break;
        default: $str_base64 = 'a'; break;
    }
    return $str_base64;
} // nm_crypt_conv_10to64

/**
 * Retorna valor na base decimal.
 *
 * Retorna o valor na base decimal de um numero na base 64.
 *
 * @access  private
 * @param   string   $v_str_base64  Valor na base 64.
 * @return  integer  $int_decimal   Valor decimal.
 */
function nm_crypt_conv_64to10($str_base64)
{
    switch($str_base64)
    {
        case 'A': $int_decimal = 0;  break;
        case 'B': $int_decimal = 1;  break;
        case 'C': $int_decimal = 2;  break;
        case 'D': $int_decimal = 3;  break;
        case 'E': $int_decimal = 4;  break;
        case 'F': $int_decimal = 5;  break;
        case 'G': $int_decimal = 6;  break;
        case 'H': $int_decimal = 7;  break;
        case 'I': $int_decimal = 8;  break;
        case 'J': $int_decimal = 9;  break;
        case 'K': $int_decimal = 10; break;
        case 'L': $int_decimal = 11; break;
        case 'M': $int_decimal = 12; break;
        case 'N': $int_decimal = 13; break;
        case 'O': $int_decimal = 14; break;
        case 'P': $int_decimal = 15; break;
        case 'Q': $int_decimal = 16; break;
        case 'R': $int_decimal = 17; break;
        case 'S': $int_decimal = 18; break;
        case 'T': $int_decimal = 19; break;
        case 'U': $int_decimal = 20; break;
        case 'V': $int_decimal = 21; break;
        case 'W': $int_decimal = 22; break;
        case 'X': $int_decimal = 23; break;
        case 'Y': $int_decimal = 24; break;
        case 'Z': $int_decimal = 25; break;
        case 'a': $int_decimal = 26; break;
        case 'b': $int_decimal = 27; break;
        case 'c': $int_decimal = 28; break;
        case 'd': $int_decimal = 29; break;
        case 'e': $int_decimal = 30; break;
        case 'f': $int_decimal = 31; break;
        case 'g': $int_decimal = 32; break;
        case 'h': $int_decimal = 33; break;
        case 'i': $int_decimal = 34; break;
        case 'j': $int_decimal = 35; break;
        case 'k': $int_decimal = 36; break;
        case 'l': $int_decimal = 37; break;
        case 'm': $int_decimal = 38; break;
        case 'n': $int_decimal = 39; break;
        case 'o': $int_decimal = 40; break;
        case 'p': $int_decimal = 41; break;
        case 'q': $int_decimal = 42; break;
        case 'r': $int_decimal = 43; break;
        case 's': $int_decimal = 44; break;
        case 't': $int_decimal = 45; break;
        case 'u': $int_decimal = 46; break;
        case 'v': $int_decimal = 47; break;
        case 'w': $int_decimal = 48; break;
        case 'x': $int_decimal = 49; break;
        case 'y': $int_decimal = 50; break;
        case 'z': $int_decimal = 51; break;
        case '0': $int_decimal = 52; break;
        case '1': $int_decimal = 53; break;
        case '2': $int_decimal = 54; break;
        case '3': $int_decimal = 55; break;
        case '4': $int_decimal = 56; break;
        case '5': $int_decimal = 57; break;
        case '6': $int_decimal = 58; break;
        case '7': $int_decimal = 59; break;
        case '8': $int_decimal = 60; break;
        case '9': $int_decimal = 61; break;
        case '+': $int_decimal = 62; break;
        case '/': $int_decimal = 63; break;
        case '=': $int_decimal = 64; break;
        default:  $int_decimal = 0;  break;
    }
    return $int_decimal;
} // nm_crypt_conv_64to10

//essas funcoes dao suporte a cryptografia de caracteres utf8
if(!function_exists("unicode_encode64"))
{
	//essas funcoes dao suporte a cryptografia de caracteres utf8
	function unicode_encode64($v_str_string) {
		return base64_encode($v_str_string);
	}
}

//essas funcoes dao suporte a cryptografia de caracteres utf8
if(!function_exists("unicode_decode64"))
{
	//essas funcoes dao suporte a cryptografia de caracteres utf8
	function unicode_decode64($v_str_string) {
		return base64_decode($v_str_string);
	} 
} 

/**
 * Decodifica uma string.
 *
 * Realiza a decodificacao de uma string.
 *
 * @access  private
 * @param   string   $v_str_encoded  Valor codificado.
 * @return  string   $str_result     Valor decodificado.
 */
function nm_crypt_decode($v_str_encoded)
{
    if(empty($v_str_encoded))
    {
        return $v_str_encoded;
    }
    elseif(!isset($_SESSION['nm_session']['cache']['cr'][md5($v_str_encoded)]) || empty($_SESSION['nm_session']['cache']['cr'][md5($v_str_encoded)]))
    {
        $new_crypt = false;
        if(substr($v_str_encoded, 0, 13) == "enc_nm_enc_v1")
        {
            $v_str_encoded = substr($v_str_encoded, 13);
            $new_crypt = true;
        }
        $str_result = nm_crypt_shift($v_str_encoded, 9);
        $str_result = nm_crypt_xoft_decode($str_result, 'arroz com feijao');
        $str_result = nm_crypt_substitution($str_result, 'dec');
        $str_result = nm_crypt_xoft_decode($str_result, 'filet com fritas');
        $str_result = nm_crypt_shift($str_result, 21);

        if($new_crypt)
        {
            $str_result = unicode_decode64($str_result);
        }
        $_SESSION['nm_session']['cache']['cr'][md5($v_str_encoded)] = $str_result;
    }
    return $_SESSION['nm_session']['cache']['cr'][md5($v_str_encoded)];
} // nm_crypt_decode

/**
 * Codifica uma string.
 *
 * Realiza a codificacao de uma string.
 *
 * @access  private
 * @param   string   $v_str_decoded  Valor decodificado.
 * @return  string   $str_result     Valor codificado.
 */
function nm_crypt_encode($v_str_decoded)
{
	if(empty($v_str_decoded)) return "";

	$str_result = nm_crypt_shift($v_str_decoded, 5);
    $str_result = nm_crypt_xoft_encode($str_result, 'filet com fritas');
    $str_result = nm_crypt_substitution($str_result, 'enc');
    $str_result = nm_crypt_xoft_encode($str_result, 'arroz com feijao');
    $str_result = nm_crypt_shift($str_result, 17);
	
	return $str_result;
} // nm_crypt_encode

/**
 * Codifica uma string.
 *
 * Realiza a codificacao de uma string.
 *
 * @access  private
 * @param   string   $v_str_decoded  Valor decodificado.
 * @return  string   $str_result     Valor codificado.
 */
function nm_crypt_encode_utf8($v_str_decoded)
{
	if(empty($v_str_decoded)) return "";

	return "enc_nm_enc_v1" . nm_crypt_encode(unicode_encode64($v_str_decoded));
} // nm_crypt_encode

/**
 * Realiza um shift.
 *
 * Realiza um shift dos caracteres de uma string em $v_int_shift posicoes.
 *
 * @access  private
 * @param   string   $v_str_text  String a ser processada.
 * @return  string   $str_cipher  String apos processamento.
 */
function nm_crypt_shift($v_str_text, $v_int_shift)
{
    $str_cipher = "";
    for($i = 0; $i < strlen($v_str_text); $i++)
    {
        $str_char  = substr($v_str_text, $i, 1);
        $int_ascii = ord($str_char);
        if (($int_ascii >= 97) && ($int_ascii <= 122))
        {
            $int_char = $int_ascii + $v_int_shift;
            if ($int_char > 122)
            {
                $int_char -= 26;
            }
        }
        elseif (($int_ascii >= 65) && ($int_ascii <= 90))
        {
            $int_char = $int_ascii + $v_int_shift;
            if($int_char > 90)
            {
                $int_char -= 26;
            }
        }
        else
        {
            $int_char = $int_ascii;
        }
        $str_cipher = $str_cipher . chr($int_char);
    }
    return $str_cipher;
} // nm_crypt_shift

/**
 * Transforma uma string em um array.
 *
 * Retorna o array de caracteres correspondente a uma string.
 *
 * @access  private
 * @param   string   $v_str_string  String a ser processada.
 * @return  array    $arr_result    Array de caracteres.
 */
function nm_crypt_strtoarray($v_str_string)
{
    $str_chunk = chunk_split($v_str_string, 1, ' ');
    $arr_char  = explode(' ', substr($str_chunk, 0, -1));
    return $arr_char;
} // nm_crypt_strtoarray

/**
 * Realiza substituicao em uma string.
 *
 * Realiza a troca de caracteres de uma string atraves de um mapeamento.
 *
 * @access  private
 * @param   string   $v_str_text    String a ser processada.
 * @param   string   $v_str_action  Acao a ser realizada.
 * @return  string   $str_cipher    String apos processamento.
 */
function nm_crypt_substitution($v_str_text, $v_str_action)
{
    $str_decode = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ=';
    $str_encode = 'blPqoVjBiOrnDucdxLyICaRSfAkFQsNtmzZKMpHeTGWhUXJwvYgE_';
    $arr_d_temp = nm_crypt_strtoarray($str_decode);
    $arr_e_temp = nm_crypt_strtoarray($str_encode);
    $arr_decode = array();
    $arr_encode = array();
    for ($i = 0; $i < sizeof($arr_d_temp); $i++)
    {
        $arr_decode[$arr_e_temp[$i]] = $arr_d_temp[$i];
        $arr_encode[$arr_d_temp[$i]] = $arr_e_temp[$i];
    }
    $str_cipher = '';
    $arr_cipher = ('dec' == $v_str_action) ? $arr_decode : $arr_encode;
    for ($i = 0; $i < strlen($v_str_text); $i++)
    {
        $str_char    = substr($v_str_text, $i, 1);
        $str_cipher .= (in_array($str_char, $arr_cipher))
                     ? $arr_cipher[$str_char] : $str_char;
    }
    return $str_cipher;
} // nm_crypt_substitution

/**
 * Decodifica uma string.
 *
 * Decodifica uma string baseando-se em uma chave especifica.
 *
 * @access  public
 * @param   string  $v_str_cipher  String codificada.
 * @param   string  $v_str_key     Chave de decodificacao.
 * @return  string  $str_string    String decodificada.
 */
function nm_crypt_xoft_decode($v_str_cipher, $v_str_key)
{
    $int_size      = 0;
    $str_bin_chars = '';
    for ($i = 0; $i < strlen($v_str_cipher); $i++)
    {
        $str_char     = substr($v_str_cipher, $i, 1);
        $int_decimal  = nm_crypt_conv_64to10($str_char);
        $int_decimal  = ($int_decimal - $int_size) / 4;
        $str_four_bit = decbin($int_decimal);
        while (strlen($str_four_bit) < 4)
        {
            $str_four_bit = '0' . $str_four_bit;
        }
        $str_bin_chars .= $str_four_bit;
        $int_size++;
        if ($int_size > 3)
        {
            $int_size = 0;
        }
    }
    $int_length = 0;
    $str_string = '';
    for ($j = 0; $j < strlen($str_bin_chars); $j = $j + 8)
    {
        $str_chars  = substr($str_bin_chars, $j, 8);
        $str_chark  = substr($v_str_key, $int_length, 1);
        $int_chars  = bindec($str_chars);
        $int_chars -= strlen($v_str_key);
        $str_chars  = chr($int_chars);
        $int_length++;
        if ($int_length >= strlen($v_str_key))
        {
            $int_length = 0;
        }
        $int_chars   = ord($str_chars) ^ ord($str_chark);
        $str_string .= chr($int_chars);
    }
    return $str_string;
} // nm_crypt_xoft_decode

/**
 * Codifica uma string.
 *
 * Codifica uma string baseando-se em uma chave especifica.
 *
 * @access  public
 * @param   string  $v_str_string  String decodificada.
 * @param   string  $v_str_key     Chave de codificacao.
 * @return  string  $str_cipher    String codificada.
 */
function nm_crypt_xoft_encode($v_str_string, $v_str_key)
{
    $int_length    = 0;
    $str_bin_chars = '';
    $str_cipher    = '';
    for ($i = 0; $i < strlen($v_str_string); $i++)
    {
        $str_char  = substr($v_str_string, $i, 1);
        $str_chark = substr($v_str_key, $int_length, 1);
        $int_length++;
        if ($int_length >= strlen($v_str_key))
        {
            $int_length = 0;
        }
        $int_chars  = ord($str_char) ^ ord($str_chark);
        $int_chars += strlen($v_str_key);
        $str_chars  = decbin($int_chars);
        while (strlen($str_chars) < 8)
        {
            $str_chars = '0' . $str_chars;
        }
        $str_bin_chars .= $str_chars;
    }
    $int_size = 0;
    for ($j = 0; $j < strlen($str_bin_chars); $j = $j + 4)
    {
        $str_four_bit = substr($str_bin_chars, $j, 4);
        $int_four_bit = bindec($str_four_bit);
        $int_decimal  = $int_four_bit * 4 + $int_size;
        $str_cipher  .= nm_crypt_conv_10to64($int_decimal);
        $int_size++;
        if ($int_size > 3)
        {
            $int_size = 0;
        }
    }
    return $str_cipher;
} // nm_crypt_xoft_encode

/**
 * Codifica uma string, criado pro remember me do cookie.
 *
 * Codifica uma string baseando-se em um tamanho (recomenda-se 128).
 *
 * @access  public
 * @param   string  $length - Tamanho da chave
 * @return  string  $token  - String codificada.
 */

function nm_generate_token($length)
{
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet.= "0123456789";
    $max = strlen($codeAlphabet) - 1;
    for ($i=0; $i < $length; $i++) {
        $token .= $codeAlphabet[nm_crypto_rand_secure(0, $max)];
    }
    return $token;
}

function nm_crypto_rand_secure($min, $max)
{
    $range = $max - $min;
    if ($range < 1) return $min; //pouco aleatorio
    $log = ceil(log($range, 2));
    $bytes = (int) ($log / 8) + 1; // tamanho em bytes
    $bits = (int) $log + 1; // tamanho em bits
    $filter = (int) (1 << $bits) - 1; // transforme todos os lower bits pra 1
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter; // descarte bits irrelevantes
    } while ($rnd >= $range);
    return $min + $rnd;
}

function dateDifference($date_1 , $date_2 , $differenceFormat = '%a' )
{
	$datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);

	if($datetime1 && $datetime2)
	{
		$interval = date_diff($datetime1, $datetime2);
		return $interval->format($differenceFormat);
	}
	else
	{
		return -1;
	}
}

?>