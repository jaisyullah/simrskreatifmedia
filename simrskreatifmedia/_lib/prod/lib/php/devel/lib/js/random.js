/**
 * Geracao de strings randomicas.
 *
 * Geracao de strings randomicas para uso em URLs.
 *
 * @package     Biblioteca
 * @subpackage  Javascript
 * @creation    2003/10/27
 * @copyright   NetMake Solucoes em Informatica
 * @author      Luis Humberto Roman <romanlh@netmake.com.br>
 *
 * $Id: random.js,v 1.1.1.1 2011-05-12 20:31:30 diogo Exp $
 */

/**
 * Gera string randomica.
 *
 * Gera uma string randomica com letras e numeros para concatenacao com URLs.
 *
 * @access  public
 * @param   string  v_str_url  URL original.
 * @return  string  str_rand   URL com string randomica.
 */
function nm_url_rand(v_str_url)
{
 str_chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
 str_rand  = v_str_url;
 str_rand += (-1 == v_str_url.indexOf('?')) ? '?' : '&';
 str_rand += 'randjs=';
 for (i = 0; i < 16; i++)
 {
  str_rand += str_chars.charAt(Math.round(str_chars.length * Math.random()));
 }
 return str_rand;
}