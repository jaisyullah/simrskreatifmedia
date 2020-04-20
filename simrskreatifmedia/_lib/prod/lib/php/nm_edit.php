<?php
/**
 * $Id: nm_edit.php,v 1.1.1.1 2011-05-12 20:31:29 diogo Exp $
 */
//---
//--- Fortação de Número, Valor, Data, Hora, Cep, CIC, CNPJ, Cod de barra e linha digitável para fichas de compensação
//
function sc_number_format_unlimited_precision($fNumber, $iPrecision, $sDecimal = '.', $sThousands = '')
{
   $bNegative = false;
   if ('-' == substr($fNumber, 0, 1))
   {
       $bNegative = true;
       $fNumber   = trim(substr($fNumber, 1));
   }

   $aNumberParts = explode($sDecimal, $fNumber);

   $sIntegerPart = $aNumberParts[0];
   $sDecimalPart = isset($aNumberParts[1]) ? $aNumberParts[1] : '';
   if (empty($sIntegerPart))
   {
       $sIntegerPart = 0;
   }
   if (strlen($sDecimalPart) > $iPrecision)
   {
       $sDecimalPart = substr($sDecimalPart, 0, $iPrecision);
   }

   return ($bNegative ? '-' : '') . number_format($sIntegerPart, 0, '', $sThousands) . $sDecimal . $sDecimalPart;
}

function nmgp_Form_Num_Val(&$conteudo, $simb_agrup, $simb_dec, $qt_dec=0, $enche_zeros="", $lado_neg="", $simb_monetario="", $new_format="", $simb_neg="-", $format_indiano=1)
{
   if ($enche_zeros == "Y") {$enche_zeros = "S";}
   $tab_format = array();
   $tab_format['num_neg'][1] = "(1,1)";
   $tab_format['num_neg'][2] = "-1,1";
   $tab_format['num_neg'][3] = "- 1,1";
   $tab_format['num_neg'][4] = "1,1-";
   $tab_format['num_neg'][5] = "1,1 -";

   $tab_format['val_pos'][1] = "R1,1";
   $tab_format['val_pos'][2] = "1,1R";
   $tab_format['val_pos'][3] = "R 1,1";
   $tab_format['val_pos'][4] = "1,1 R";

   $tab_format['val_neg'][1]  = "(R1,1)";
   $tab_format['val_neg'][2]  = "-R1,1";
   $tab_format['val_neg'][3]  = "R-1,1";
   $tab_format['val_neg'][4]  = "R1,1-";
   $tab_format['val_neg'][5]  = "(1,1R)";
   $tab_format['val_neg'][6]  = "-1,1R";
   $tab_format['val_neg'][7]  = "1,1-R";
   $tab_format['val_neg'][8]  = "1,1R-";
   $tab_format['val_neg'][9]  = "-1,1 R";
   $tab_format['val_neg'][10] = "-R 1,1";
   $tab_format['val_neg'][11] = "1,1 R-";
   $tab_format['val_neg'][12] = "R 1,1-";
   $tab_format['val_neg'][13] = "R -1,1";
   $tab_format['val_neg'][14] = "1,1- R";
   $tab_format['val_neg'][15] = "(R 1,1)";
   $tab_format['val_neg'][16] = "(1,1 R)";

   if (nm_reg_prod() != "NmScriptCaseAplOk")
   {
       return ;
   }

   $conteudo = trim($conteudo);
   if ($conteudo === "" || !is_numeric($conteudo))
   {
       return ;
   }
   if (0 < $qt_dec)
   {
       $conteudo = sc_number_format_unlimited_precision($conteudo, $qt_dec, '.', '');
   }
   elseif (is_float($conteudo))
   {
       $precision = strlen($conteudo) - strlen(intval($conteudo));
       if ($precision)
       {
           $precision--;
       }
       $conteudo = number_format($conteudo, $precision, '.', '');
   }
   $Sinal = "" ;
   if (substr($conteudo, 0, 1) == "-")
   {
       $Sinal = "-" ;
       $conteudo = substr($conteudo, 1) ;
   }

   $QuantIni = strpos($conteudo, ".") ;
   if ($qt_dec > 0)
   {
       if ($QuantIni !== false)
       {
           $decimal  = substr($conteudo, $QuantIni + 1) ;
           $inteiro = substr($conteudo, 0, $QuantIni + 1) ;
           if (strlen($decimal) > $qt_dec)
           {
               $decimal = substr($decimal, 0, $qt_dec);
           }
           else
           {
               if ($enche_zeros == "S")
               {
                   $decimal .= str_repeat(0, $qt_dec - strlen($decimal));
               }
           }
           $conteudo = $inteiro . $decimal;
       }
       else
       {
               if ($enche_zeros == "S")
               {
                   $conteudo .= ".";
                   $conteudo .= str_repeat(0, $qt_dec);
               }
       }
   }
   else
   {
       if ($QuantIni !== false)
       {
           $conteudo = substr($conteudo, 0, $QuantIni) ;
       }
   }
   if ($enche_zeros != "S" && substr($conteudo, -1, 1) == ".")
   {
       $conteudo = substr($conteudo, 0, -1);
   }
   $QuantIni = strpos($conteudo, ".") ;
   if ($simb_dec != ".")
   {
       $conteudo = str_replace(".", $simb_dec, $conteudo) ;
   }
   $decimal = "" ;
   if ($QuantIni !== false)
   {
       $decimal  = substr($conteudo, $QuantIni) ;
       $conteudo = substr($conteudo, 0, $QuantIni) ;
   }
   $QuantNum = strlen($conteudo) ;
   if ($QuantNum > 3 && $format_indiano == 2)
   {
       $conteudo = substr($conteudo, 0, -3) . $simb_agrup . substr($conteudo, -3);
   }
   if ($QuantNum > 3 && $format_indiano != 2)
   {
       $ini_ind = "";
       $qtd_grp = 3;
       if ($format_indiano == 3)
       {
           $qtd_grp  = 2;
           $ini_ind  = $simb_agrup . substr($conteudo, -3);
           $conteudo = substr($conteudo, 0, -3);
           $QuantNum = $QuantNum - 3;
       }
       $QuantIni = $QuantNum % $qtd_grp ;
       $ValNaoEditado = $conteudo ;
       $conteudo = substr($ValNaoEditado, 0, $QuantIni) ;
       for ($Inum = $QuantIni ; $Inum < $QuantNum ; $Inum = $Inum + $qtd_grp)
       {
            if ($Inum != 0)
            {
                $conteudo = $conteudo . $simb_agrup . substr($ValNaoEditado, $Inum, $qtd_grp) ;
            }
            else
            {
                $conteudo .=  substr($ValNaoEditado, $Inum, $qtd_grp) ;
            }
       }
       $conteudo .= $ini_ind;
   }
   $inteiro = $conteudo;
   if ($enche_zeros == "S" && empty($inteiro))
   {
       $inteiro = "0";
   }

   $conteudo = "";

/* format antigo  */
   if (empty($new_format))
   {
       if (!empty($simb_monetario))
       {
           $conteudo = $simb_monetario . " ";
       }
       if ($lado_neg == "4")
       {
           $conteudo .= $inteiro . $decimal . $Sinal ;
       }
       else
       {
           $conteudo .= $Sinal . $inteiro . $decimal ;
       }
   }
   else
   {
       $conteudo = $inteiro . $decimal;
       $part_format = explode(":", $new_format);
       if ($part_format[0] == "N" && !empty($Sinal))
       {
           $temp_form = $tab_format['num_neg'][$part_format[1]];
           $temp_form = str_replace("1,1", $conteudo, $temp_form);
           $conteudo  = str_replace("-", $simb_neg, $temp_form);
       }
       elseif ($part_format[0] == "V")
       {
           $temp_form = (empty($Sinal)) ? $tab_format['val_pos'][$part_format[1]] : $tab_format['val_neg'][$part_format[2]];
           $temp_form = str_replace("1,1", $conteudo, $temp_form);
           $temp_form = str_replace("R", $simb_monetario, $temp_form);
           $conteudo  = str_replace("-", $simb_neg, $temp_form);
       }
   }
}
//
function nmgp_Trunc_Num(&$conteudo, $qt_dec=0)
{
   if (nm_reg_prod() != "NmScriptCaseAplOk")
   {
       return;
   }
   if ($conteudo === "" || !is_numeric($conteudo))
   {
       return;
   }
   $ponto = strpos($conteudo, ".");
   if ($ponto === false)
   {
       if ($qt_dec == 0)
       {
           return;
       }
       else
       {
           $conteudo .= "." . str_repeat("0", $qt_dec);
           return;
       }
   }
   $inteiro = substr($conteudo, 0, $ponto + 1);
   $decimal = substr($conteudo, $ponto + 1);
   if (strlen($decimal) > $qt_dec)
   {
       $decimal = substr($decimal, 0, $qt_dec);
   }
   if (strlen($decimal) < $qt_dec)
   {
       $decimal .=  str_repeat("0", $qt_dec - strlen($decimal));
   }
   $conteudo = $inteiro . $decimal;
   if (trim($conteudo) == "." || trim($conteudo) == ",")
   {
       $conteudo = 0;
   }
}
//
function nmgp_Form_Datas(&$conteudo, $formdata, $sep = '/')
{
   if (nm_reg_prod() != "NmScriptCaseAplOk")
   {
       return ;
   }
   if ($conteudo === "" || empty($conteudo) || !is_numeric($conteudo))
   {
       return ;
   }
   $ValNaoEditado =  trim($conteudo) ;
   $conteudo = "" ;
   $x = 0 ;
   for ($y = 0; $y < strlen($formdata); $x++)
   {
        if (substr($formdata, $x, 1) == $sep)
        {
            $conteudo .= $sep;
        }
        else
        {  $conteudo .= substr($ValNaoEditado, $y, 1) ;
           $y++ ;
        }
   }
}
//
function nmgp_Form_Hora(&$conteudo, $formhora, $sep = ':')
{
   if (nm_reg_prod() != "NmScriptCaseAplOk")
   {
       return ;
   }
   if ($conteudo === "" || empty($conteudo) || !is_numeric($conteudo))
   {
       return ;
   }
   $ValNaoEditado = trim($conteudo) ;
   $conteudo = "" ;
   $x = 0 ;
   for ($y = 0; $y < strlen($formhora); $x++)
   {
        if (substr($formhora, $x, 1) == $sep)
        {
           $conteudo .= $sep;
        }
        else
        {
            $conteudo .= substr($ValNaoEditado, $y, 1) ;
            $y++ ;
        }
   }
}
//
function nmgp_Form_Cep(&$conteudo)
{
   if (nm_reg_prod() != "NmScriptCaseAplOk")
   {
       return ;
   }
   if ($conteudo === "" || empty($conteudo) || !is_numeric($conteudo))
   {
       return ;
   }
   $conteudo = trim($conteudo);
   if (strlen($conteudo) != 8 || !is_numeric($conteudo))
   {
       return ;
   }
   $conteudo = substr($conteudo, 0, 2) . "." . substr($conteudo, 2, 3) . "-" . substr($conteudo, 5, 3) ;
}
//
function nmgp_Form_CicCnpj(&$conteudo)
{
   if (nm_reg_prod() != "NmScriptCaseAplOk")
   {
       return ;
   }
   if ($conteudo === "" || empty($conteudo) || !is_numeric($conteudo))
   {
       return ;
   }
   $conteudo = trim($conteudo);
   if (strlen($conteudo) == 14 && is_numeric($conteudo))
   {
       $conteudo = substr($conteudo, 0, 2) . "." . substr($conteudo, 2, 3) . "." . substr($conteudo, 5, 3) . "/" . substr($conteudo, 8, 4) . "-" . substr($conteudo, 12, 2) ;
   }
   if (strlen($conteudo) == 11 && is_numeric($conteudo))
   {
       $conteudo = substr($conteudo, 0, 3) . "." . substr($conteudo, 3, 3) . "." . substr($conteudo, 6, 3) . "-" . substr($conteudo, 9, 2) ;
   }
}
//
function nmgp_Form_Cartao(&$conteudo)
{
   if (nm_reg_prod() != "NmScriptCaseAplOk")
   {
       return ;
   }
   if ($conteudo === "" || empty($conteudo) || !is_numeric($conteudo))
   {
       return ;
   }
   $conteudo = trim($conteudo);
   $conteudo = substr($conteudo, 0, 4) . " " . substr($conteudo, 4, 4) . " " . substr($conteudo, 8, 4) . " " . substr($conteudo, 12) ;
}
//
function nmgp_cod_barra_banco(&$cod_barra, $cod_banco, $cod_moeda, $valor, $livre, $dt_venc="")
{
   if (nm_reg_prod() != "NmScriptCaseAplOk")
   {
       return ;
   }
   $trab = "";
   if (strlen($cod_banco) < 3)
   {
       $trab = str_repeat(0, 3 - strlen($cod_banco)) . $cod_banco;
   }
   else
   {
       $trab = substr($cod_banco, 0, 3);
   }
   $trab .= substr($cod_moeda, 0, 1);
   $valor = str_replace(".", "", $valor);
   $valor = str_replace(",", "", $valor);
   if (strlen($valor) > 14)
   {
       $valor = substr($valor, -14);
   }
   $trab_valor = str_repeat(0, 14 - strlen($valor)) . $valor;
   if (!empty($dt_venc))
   {
       $dt_venc = str_replace("-", "", $dt_venc);
       $dt_venc = str_replace("/", "", $dt_venc);
       if (strlen($dt_venc) > 8)
       {
           $dt_venc = substr($dt_venc, 0, 8);
       }
       if (strlen($dt_venc) == 8 && $dt_venc > '20010401')
       {
/*           $fator_venc = floor(abs(strtotime($dt_venc) - strtotime(19971007))/86400); */
           $fator_venc = calc_dias_fator("19971007", $dt_venc);
           while ($fator_venc > 9999)
           {
               $fator_venc -= 9000;
           }
           $trab_valor = $fator_venc . substr($trab_valor, 4);
       }
   }
/*
24/12/2005 = 3000
12/03/2014 = 6000 (marco de implantação)
13/03/2014 = 6001
21/02/2025 = 9999
22/02/2025 = 1000
23/02/2025 = 1001
24/02/2025 = 1002
13/10/2049 = 9999
*/
   $trab .= $trab_valor;
   if (strlen($livre) > 25)
   {
       $livre = substr($livre, -25);
   }
   $trab .= $livre . str_repeat(0, 25 - strlen($livre));
   dig_universal($dig, $resto, $trab);
   $resto = 11 - $resto;

   /**
   *
   *chapado $dig==0 porque o digito verificar sempre vai ser 1
   *para modulo 11 e modulo 10
   *
   */
   if ($resto == 10 || $resto == 0 || $dig == 0)
   {
       $dig = 1;
   }
   $cod_barra = substr($trab, 0, 4) . $dig . substr($trab, 4);
}

function calc_dias_fator($str_data1, $str_data2)
{
   $dias_meses = array(1 => 31, 2 => 28, 3 => 31, 4 => 30, 5 => 31, 6 => 30, 7 => 31, 8 => 31, 9 => 30, 10 => 31, 11 => 30, 12 => 31);
   $dias = 0;
   $dia_1 = substr($str_data1, 6);
   $mes_1 = substr($str_data1, 4, 2);
   $ano_1 = substr($str_data1, 0, 4);
   $dia_2 = substr($str_data2, 6);
   $mes_2 = substr($str_data2, 4, 2);
   $ano_2 = substr($str_data2, 0, 4);
   if ($str_data1 == $str_data2)
   {
       return $dias;
   }
   $mes_1 = (int)$mes_1;
   $dia_1 = (int)$dia_1;
   $mes_2 = (int)$mes_2;
   $dia_2 = (int)$dia_2;
   if ($ano_1 == $ano_2 && $mes_1 == $mes_2)
   {
       $dias = $dia_2 - $dia_1;
       return $dias;
   }
   $temp = isset($dias_meses[$mes_1])?$dias_meses[$mes_1]:0;
   if (($ano_1 % 4) == 0 && $mes_1 == 2)
   {
       $temp = 29;
   }
   $dias += ($temp - $dia_1);
   $dia_1 = 1;
   $mes_1++;
   if ($ano_1 != $ano_2)
   {
       for ($x = $mes_1; $mes_1 < 13; $mes_1++)
       {
            $dias += $dias_meses[$mes_1];
            if (($ano_1 % 4) == 0 && $mes_1 == 2)
            {
                $dias++;
            }
       }
       $mes_1 = 1;
       $ano_1++;
       for ($x = $ano_1; $ano_1 < $ano_2; $ano_1++)
       {
            $dias += 365;
            if (($ano_1 % 4) == 0 )
            {
                $dias++;
            }
       }
   }
   for ($x = $mes_1; $mes_1 < $mes_2; $mes_1++)
   {
       $dias += isset($dias_meses[$mes_1])?$dias_meses[$mes_1]:0;
       if (($ano_1 % 4) == 0 && $mes_1 == 2)
       {
           $dias++;
       }
   }
   $dias += $dia_2;
   return $dias;
}
//
function nmgp_lin_dig_banco(&$lin_dig, $cod_barra)
{
   if (nm_reg_prod() != "NmScriptCaseAplOk")
   {
       return ;
   }
   $trab_dig = substr($cod_barra, 0, 4) . substr($cod_barra, 19, 5);
   dig_universal($dig1, $resto, $trab_dig, 10, 12, 2);
   $trab_dig = substr($cod_barra, 24, 10);
   dig_universal($dig2, $resto, $trab_dig, 10, 12, 2);
   $trab_dig = substr($cod_barra, 34, 10);
   dig_universal($dig3, $resto, $trab_dig, 10, 12, 2);
   $lin_dig  = substr($cod_barra, 0, 4) . substr($cod_barra, 19, 1) . "." . substr($cod_barra, 20, 4) . $dig1 . " ";
   $lin_dig .= substr($cod_barra, 24, 5) . "." . substr($cod_barra, 29, 5) . $dig2 . " ";
   $lin_dig .= substr($cod_barra, 34, 5) . "." . substr($cod_barra, 39, 5) . $dig3 . " ";
   $lin_dig .= substr($cod_barra, 4, 1) . " " . substr($cod_barra, 5, 14);
}
//
function nmgp_cod_barra_arrecadacao(&$cod_barra, $seguimento, $cod_moeda, $valor, $livre)
{
   if (nm_reg_prod() != "NmScriptCaseAplOk")
   {
       return ;
   }
   $trab = "8" . substr($seguimento, 0, 1) . substr($cod_moeda, 0, 1);
   $valor = str_replace(".", "", $valor);
   $valor = str_replace(",", "", $valor);
   if (strlen($valor) > 11)
   {
       $valor = substr($valor, -11);
   }
   $trab .= str_repeat(0, 11 - strlen($valor)) . $valor;
   if (strlen($livre) > 29)
   {
       $livre = substr($livre, -29);
   }
   $trab .= $livre . str_repeat(0, 29 - strlen($livre));
   if ($cod_moeda == "6" || $cod_moeda == "7")
   {
       dig_universal($dig, $resto, $trab, 10, 12, 2);
   }
   else
   {
       dig_mod_11_arrecadacao($dig, $trab);
   }

   $cod_barra = substr($trab, 0, 3) . $dig . substr($trab, 3);
}
//
function nmgp_lin_dig_arrecadacao(&$lin_dig, $cod_barra)
{
   if (nm_reg_prod() != "NmScriptCaseAplOk")
   {
       return ;
   }
   if (substr($cod_barra, 2, 1) == "6" || substr($cod_barra, 2, 1) == "7")
   {
       dig_universal($dig1, $resto, substr($cod_barra,  0, 11), 10, 12, 2);
       dig_universal($dig2, $resto, substr($cod_barra, 11, 11), 10, 12, 2);
       dig_universal($dig3, $resto, substr($cod_barra, 22, 11), 10, 12, 2);
       dig_universal($dig4, $resto, substr($cod_barra, 33, 11), 10, 12, 2);
   }
   else
   {
       dig_mod_11_arrecadacao($dig1, substr($cod_barra, 0, 11));
       dig_mod_11_arrecadacao($dig2, substr($cod_barra, 11, 11));
       dig_mod_11_arrecadacao($dig3, substr($cod_barra, 22, 11));
       dig_mod_11_arrecadacao($dig4, substr($cod_barra, 33, 11));
   }
   $lin_dig  = substr($cod_barra, 0, 11) . $dig1 . " ";
   $lin_dig .= substr($cod_barra, 11, 11) . $dig2 . " ";
   $lin_dig .= substr($cod_barra, 22, 11) . $dig3 . " ";
   $lin_dig .= substr($cod_barra, 33, 11) . $dig4;
}
function dig_mod_11_arrecadacao(&$dig, $valorIn)
{

   dig_universal($dig, $resto, $valorIn, 11, 9875432, 2);
   if ($resto == 0 || $resto == 1 || $resto == 10)
   {
       $dig = 1;
   }
}
function dig_universal(&$dig, &$resto, $valorIn, $modulo=11, $pesos=98765432, $tipo=1)
{
   if (!is_numeric($valorIn) || !is_numeric($modulo) || !is_numeric($pesos) || !is_numeric($tipo))
   {
       return;
   }
   $soma   = 0;
   $tam_v  = strlen($valorIn);
   $p      = strlen($pesos);
   for ($i = $tam_v; $i > 0; $i--)
   {
        if ($p == 0)
        {
            $p = strlen($pesos);
        }
        $p--;
        $num = substr($valorIn, $i - 1, 1);
        $mul = substr($pesos, $p, 1);
        $temp = (int)$num * (int)$mul;
        if ($tipo == 2)
        {
            $soma += (int)substr($temp, 0, 1);
            $soma += (int)substr($temp, 1, 1);
        }
        else
        {
            $soma += $temp;
        }
   }
   $resto = $soma % $modulo;
   $dig = ($resto == 0) ? 0 : $modulo - $resto;
   if (strlen($dig) > 1)
   {
      $dig = substr($dig, -1);
   }
}

?>