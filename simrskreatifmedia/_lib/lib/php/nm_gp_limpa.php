<?php
/**
 * $Id: nm_gp_limpa.php,v 1.1.1.1 2011-05-12 20:31:29 diogo Exp $
 */
//
//----- Funчѕes para retirar ediчуo dos campos
//
function nm_limpa_valor(&$valor, $simb_dec=',', $simb_grp='.', $simb_neg='-')
{
/*   alterado em 25/07/07 por SG para limpar valor que vem sem casas decimais
      $vg = strstr($valor, $simb_dec) ;
      if ($vg === FALSE)
       {  return ; }
*/
      if ($simb_dec == $simb_grp)
      {
          if ('.' == $simb_dec)
          {
              $simb_grp = ',';
          }
          else
          {
              $simb_grp = '.';
          }
      }
      if ($simb_dec == ".")
      {
          $valor = str_replace($simb_grp, "", $valor) ;
      }
      else
      {
          $valor = str_replace($simb_grp, "", $valor) ;
          $valor = str_replace($simb_dec, ".", $valor) ;
      }
/* trtamento negativos - 21/02/2018*/
       $valor = trim($valor);
       if (substr($valor, 0, 1) == "(" && substr($valor, -1, 1) == ")")
       {
           $valor = "-" . substr($valor, 1, -1);
       }
       elseif (strpos($valor, $simb_neg) !== false)
       {
           $valor = str_replace($simb_neg, "", $valor);
           $valor = "-" . $valor;
       }
}

function nm_limpa_numero(&$numero, $simb_grp = '.')
{
      $numero = str_replace(".", "", $numero) ;
      $numero = str_replace(",", "", $numero) ;
      $numero = str_replace($simb_grp, "", $numero) ;
}

function nm_limpa_data(&$dt, $sep = '/')
{
      $dt = str_replace($sep, "", $dt) ;
}

function nm_limpa_hora(&$hora, $sep = ':')
{
      $hora = str_replace($sep, "", $hora) ;
}

function nm_limpa_cep(&$cep)
{
      $cep = str_replace(".", "", $cep) ;
      $cep = str_replace("-", "", $cep) ;
}

function nm_limpa_ciccnpj(&$ciccnpj)
{
      $ciccnpj = str_replace(".", "", $ciccnpj) ;
      $ciccnpj = str_replace("/", "", $ciccnpj) ;
      $ciccnpj = str_replace("-", "", $ciccnpj) ;
}

function nm_limpa_cartao(&$cartao)
{
      $cartao = str_replace(" ", "", $cartao) ;
}
?>