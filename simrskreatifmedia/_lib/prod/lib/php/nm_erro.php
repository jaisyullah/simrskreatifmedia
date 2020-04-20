<?php
/**
 * $Id: nm_erro.php,v 1.1.1.1 2011-05-12 20:31:29 diogo Exp $
 */
/*******************************************************************
 * Script Case
 *------------------------------------------------------------------
 * Arquivo  : nm_erro.php
 *            Tratamento de erros
 *------------------------------------------------------------------
 * © NetMake Solucoes em Informatica Ltda
 *******************************************************************/

$erro_mensagem = "";

function nmgp_mensagem($arq_erro, $script, $linha, $tipo, $mensagem, $complemento = "")
{
   global $erro_mensagem;
   switch ($tipo)
   {
      case "banco":
         $mensagem .= "<BR>" . $complemento;
      break;
   }
   if ($tipo != "critica")
    {  $erro_mensagem = $mensagem . "<BR><BR>" . $script . " (" . $linha . ")" ; }
   else
    {  $erro_mensagem = $mensagem  ; }
   $mensagem  = urlencode($erro_mensagem);
   include($arq_erro);
   if ($tipo != "critica")
    {  exit; }
}

?>