<?php
/**
 * $Id: nm_valida.php,v 1.1.1.1 2011-05-12 20:31:30 diogo Exp $
 */
/*     Componente para validação de Valor, CPF, CNPJ, Datas e Cartões de Crédito.

       Propriedade: NETMAKE - Soluções em Informática Ltda.
                    www.netmake.com.br
       Dezembro/2000.
*/
class NM_Valida
{
      var $x ;
      var $y  ;
      var $soma  ;
      var $resto  ;
      var $aux  ;

/*    ================================================================
                            Números e  Valores
      ================================================================ */
      function Valor($valorIn, $inteiros, $decimais, $valormin="", $valormax="", $aceita_neg="S")
      {
            if (nm_reg_prod() != "NmScriptCaseAplOk")
            {
                return false;
            }
            $pt = 0 ;
            for ($x = 0; $x < strlen($valorIn); $x++)
            {
                 if (($valorIn[$x] < "0" || $valorIn[$x] > "9") && $valorIn[$x] != "." && $valorIn[$x] != "-")
                 {
                     return false ;
                 }
                 if ($valorIn[$x] == ".")
                 {
                     if ($pt != 0 )
                     {
                         return false ;
                     }
                     $pt++ ;
                 }
            }
            $negativo = strpos($valorIn, "-")  ;
            if ($negativo > 0)
            {
                return false ;
            }
            if ($negativo === false)
            {
                if ($aceita_neg == "T" && 0 < $valorIn)
                {
                    return false;
                }
            }
            else
            {
                if ($aceita_neg == "N")
                {
                    return false ;
                }
                $inteiros++ ;
                if ($negativo > 0)
                {
                    return false ;
                }
            }
            $decim = strstr($valorIn, ".") ;
            $int   = 0 ;
            if ($decim === false)
            {
                $decim = 0 ;
                $int = strlen($valorIn) ;
            }
            else
            {
                $int = strlen($valorIn) - strlen($decim) ;
                $decim = strlen($decim) - 1 ;
            }
            if ($int > $inteiros || $decim > $decimais)
            {
                return false ;
            }
//            if (is_int($valormin) && $valormin != -0)
            if (!empty($valormin) && !$valormin == 0)
            {
                if ($valorIn < $valormin)
                {
                    return false ;
                }
            }
            if (empty($valormax) || $valormax == 0)
            {
                return true ;
            }
            if ($valorIn > $valormax)
            {
                return false ;
            }
            return true ;
      }
/*    ================================================================
                            Códigos de Barra
      ================================================================ */
      function B_ABAR($valorIn)
      {
            $char_val = "0123456789-+/.:\$ABCD";
            $valorIn  = strtoupper($valorIn);
            if (nm_reg_prod() != "NmScriptCaseAplOk")
            {
                return false;
            }
            for ($x = 0; $x < strlen($valorIn); $x++)
            {
                 if ($x == 0 || $x = (strlen($valorIn) - 1))
                 {
                     if (substr($valorIn, $x, 1) != "A" && substr($valorIn, $x, 1) != "B" && substr($valorIn, $x, 1) != "C" && substr($valorIn, $x, 1) != "D")
                     {
                         return false;
                     }
                 }
                 else
                 {
                     for ($y = 0; $y < strlen($char_val); $y++)
                     {
                          if (substr($valorIn, $x, 1) == substr($char_val, $y, 1) )
                          {
                              break ;
                          }
                     }
                     if (substr($valorIn, $x, 1) != substr($char_val, $y, 1) )
                     {
                        return false;
                     }
                 }
            }
            return true ;
      }
//---
      function B_11($valorIn)
      {
            $char_val = str_replace("-", "0", $valorIn);
            if (nm_reg_prod() != "NmScriptCaseAplOk")
            {
                return false;
            }
            if (!is_numeric($char_val))
            {
                return false;
            }
            return true ;
      }
//---
      function B_39($valorIn)
      {
            $char_val = array('0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','-','.',' ','$','/','+','%','*');
            if (nm_reg_prod() != "NmScriptCaseAplOk")
            {
                return false;
            }
            for ($x = 0; $x < strlen($valorIn); $x++)
            {
                 if (array_search($valorIn[$x], $char_val) === false)
                 {
                     return false;
                 }
            }
            return true ;
      }
//---
      function B_39extended($valorIn)
      {
            $char_val = array('0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','-','.',' ','$','/','+','%','*');
            if (nm_reg_prod() != "NmScriptCaseAplOk")
            {
                return false;
            }
            for ($x = 0; $x < strlen($valorIn); $x++)
            {
                 if (array_search($valorIn[$x], $char_val) === false)
                 {
                     if (Extended_39($valorIn[$x]) === false)
                     {
                         return false;
                     }
                 }
            }
            return true ;
      }
      function Extended_39($char)
      {
            $o = ord($char);
            if($o === 0)
                    return '%U';
            elseif($o >= 1 && $o <= 26)
                    return '$' . chr($o + 64);
            elseif(($o >= 33 && $o <= 44) || $o === 47 || $o === 48)
                    return '/' . chr($o + 32);
            elseif($o >= 97 && $o <= 122)
                    return '+' . chr($o - 32);
            elseif($o >= 27 && $o <= 31)
                    return '%' . chr($o + 38);
            elseif($o >= 59 && $o <= 63)
                    return '%' . chr($o + 11);
            elseif($o >= 91 && $o <= 95)
                    return '%' . chr($o - 16);
            elseif($o >= 123 && $o <= 127)
                    return '%' . chr($o - 43);
            elseif($o === 64)
                    return '%V';
            elseif($o === 96)
                    return '%W';
            elseif($o > 127)
                    return false;
            else
                    return $char;
      }

//---
      function B_93($valorIn)
      {
            $char_val = array('0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','-','.',' ','$','/','+','%','($)','(%)','(/)','(+)','(*)');
            if (nm_reg_prod() != "NmScriptCaseAplOk")
            {
                return false;
            }
            for ($x = 0; $x < strlen($valorIn); $x++)
            {
                 if (array_search($valorIn[$x], $char_val) === false)
                 {
                     if (Extended_93($valorIn[$x]) === false)
                     {
                         return false;
                     }
                 }
            }
            return true ;
      }
      function getExtended_93($char)
      {
            $o = ord($char);
            if($o === 0)
                    return '%U';
            elseif($o >= 1 && $o <= 26)
                    return '$' . chr($o + 64);
            elseif(($o >= 33 && $o <= 44) || $o === 47 || $o === 48)
                    return '/' . chr($o + 32);
            elseif($o >= 97 && $o <= 122)
                    return '+' . chr($o - 32);
            elseif($o >= 27 && $o <= 31)
                    return '%' . chr($o + 38);
            elseif($o >= 59 && $o <= 63)
                    return '%' . chr($o + 11);
            elseif($o >= 91 && $o <= 95)
                    return '%' . chr($o - 16);
            elseif($o >= 123 && $o <= 127)
                    return '%' . chr($o - 43);
            elseif($o === 64)
                    return '%V';
            elseif($o === 96)
                    return '%W';
            elseif($o > 127)
                    return false;
            else
                    return $char;
      }

//---
      function B_128($valorIn)
      {
            if (nm_reg_prod() != "NmScriptCaseAplOk")
            {
                return false;
            }
            return true ;
      }
//---
      function B_EAN8($valorIn)
      {
            if (nm_reg_prod() != "NmScriptCaseAplOk")
            {
                return false;
            }
            if (!is_numeric($valorIn))
            {
                return false ;
            }
            if (strlen($valorIn) != 8)
            {
                return false ;
            }
      // Cálculo do dígito de controle
            $soma1 = 0 ;
            $soma2 = 0 ;
            $controle = 1 ;

            for ($i = 0; $i <= 6; $i++)
            {
                 $num = substr($valorIn, $i, 1);
                 if ($controle == 1)
                 {
                     $soma1 += (int)($num * 3) ;
                     $controle = 2;
                 }
                 else
                 {
                     $soma2 += (int)$num ;
                     $controle = 1;
                 }
            }
            $soma1 = $soma1 + $soma2 ;
            $soma2 = (int)($soma1 / 10) ;
            $DV = (($soma2 * 10) + 10) - $soma1;
            if ($DV == 10)
            {
                $DV = 0;
            }
            if (substr($valorIn, 7, 1) != $DV)
            {
                return false ;
            }
            return true ;
      }
//---
      function B_EAN13($valorIn)
      {
            if (nm_reg_prod() != "NmScriptCaseAplOk")
            {
                return false;
            }
            if (!is_numeric($valorIn))
            {
                return false ;
            }
            if (strlen($valorIn) != 13)
            {
                return false ;
            }
      // Cálculo do dígito de controle
            $soma1 = 0 ;
            $soma2 = 0 ;
            $controle = 1 ;

            for ($i = 0; $i <= 11; $i++)
            {    $num = substr($valorIn, $i, 1);
                 if ($controle == 2)
                 {
                     $soma1 += (int)($num * 3) ;
                     $controle = 1;
                 }
                else
                 {
                     $soma2 += (int)$num ;
                     $controle = 2;
                 }
            }
            $soma1 = $soma1 + $soma2 ;
            $soma2 = (int)($soma1 / 10) ;
            $DV = (($soma2 * 10) + 10) - $soma1;
            if ($DV == 10)
            {
                $DV = 0;
            }
            if (substr($valorIn, 12, 1) != $DV)
            {
                return false ;
            }
            return true ;
      }
//---
      function B_GS1128($valorIn)
      {
            if (nm_reg_prod() != "NmScriptCaseAplOk")
            {
                return false;
            }
            return true ;
      }
//---
      function B_ISBN($valorIn)
      {
            if (!is_numeric($valorIn))
            {
                return false;
            }
            if (strlen($valorIn) != 9 && strlen($valorIn) != 10 && strlen($valorIn) != 12 && strlen($valorIn) != 13)
            {
                return false;
            }
            return true ;
      }
//---
      function B_2DE5($valorIn, $checksun="X")
      {
            if (nm_reg_prod() != "NmScriptCaseAplOk")
            {
                return false;
            }
            if (!is_numeric($valorIn))
            {
                return false;
            }
            $x = strlen($valorIn) % 2;
            if ($x != 0 && $checksun == "N")
            {
                return false;
            }
            if ($x != 1 && $checksun == "S")
            {
                return false;
            }
            return true ;
      }
//---
      function B_MSI($valorIn)
      {
            if (nm_reg_prod() != "NmScriptCaseAplOk")
            {
                return false;
            }
            if (!is_numeric($valorIn))
            {
                return false;
            }
            return true ;
      }
//---
      function B_UPC($valorIn)
      {
            if (nm_reg_prod() != "NmScriptCaseAplOk")
            {
                return false;
            }
            if (!is_numeric($valorIn))
            {
                return false;
            }
            if (strlen($valorIn) != 12)
            {
                return false ;
            }
       // Cálculo do dígito de controle
            $soma1 = 0 ;
            $soma2 = 0 ;
            $controle = 1 ;

            for ($i = 0; $i <= 10; $i++)
            {
                 $num = substr($valorIn, $i, 1);
                 if ($controle == 1)
                 {
                     $soma1 += (int)($num * 3) ;
                     $controle = 2;
                 }
                 else
                 {
                     $soma2 += (int)$num ;
                     $controle = 1;
                 }
            }
            $soma1 = $soma1 + $soma2 ;
            $soma2 = (int)($soma1 / 10) ;
            $DV = (($soma2 * 10) + 10) - $soma1;
            if ($DV == 10)
            {
                $DV = 0;
            }
            if (substr($valorIn, 11, 1) != $DV)
            {
                return false ;
            }
            return true ;
      }
//---
      function B_UPCE($valorIn)
      {
            if (!is_numeric($valorIn))
            {
                return false;
            }
            if (strlen($valorIn) > 10 && substr($valorIn, 0, 1) != 0 && substr($valorIn, 0, 1) != 1)
            {
                return false;
            }
            return true ;
      }
//---
      function B_UPCEXT2($valorIn)
      {
            if (!is_numeric($valorIn))
            {
                return false;
            }
            if (strlen($valorIn) != 2)
            {
                return false;
            }
            return true ;
      }
//---
      function B_UPCEXT5($valorIn)
      {
            if (!is_numeric($valorIn))
            {
                return false;
            }
            if (strlen($valorIn) != 5)
            {
                return false;
            }
            return true ;
      }
//---
      function B_POSTNET($valorIn)
      {
            if (!is_numeric($valorIn))
            {
                return false;
            }
            if (strlen($valorIn) != 11 && strlen($valorIn) != 9 && strlen($valorIn) != 5)
            {
                return false;
            }
            return true ;
      }
//---

/*    ================================================================
                             CIC
      ================================================================ */
      function CIC($CpfIn)
      {
            if (nm_reg_prod() != "NmScriptCaseAplOk")
            {
                return false;
            }
            for ($x = 0; $x < strlen($CpfIn); $x++)
            {
                 if ($CpfIn[$x] < "0" || $CpfIn[$x] > "9")
                 {
                     return false ;
                 }
            }

            $x = 0 ;
            $y = 0 ;
            $soma = 0 ;
            $resto = 0 ;

            if (strlen($CpfIn) != 11)
            {
                return false ;
            }
            $aux = substr($CpfIn, 0, 9) ;
            $x = substr($CpfIn, 0, 1) ;
            for ($y = 0; $y < 9; $y++)
            {
                if (substr($CpfIn, $y , 1) != $x)
                {
                    break ;
                }
                else
                {
                    $soma++ ;
                }
            }
            if ($soma == 9)
            {
                 return false ;
            }

            $soma = 0 ;
            $y = 10 ;
            for ($x = 0 ; $x < 9 ; $x++)
            {
                 $soma = $soma + (substr($aux, $x , 1) * $y ) ;
                 $y-- ;
            }
            $soma = $soma * 10 ;
            $resto = $soma % 11 ;
            if ($resto == 10)
            {
                $resto = 0 ;
            }
            $aux = $aux . $resto ;

            $x = 0 ;
            $y = 11 ;
            $soma = 0 ;
            for ($x = 0 ; $x < 10 ; $x++)
            {
                 $soma = $soma + (substr($aux, $x , 1) * $y ) ;
                 $y-- ;
            }
            $soma = $soma * 10  ;
            $resto = $soma % 11  ;
            if ($resto == 10)
            {
                $resto = 0 ;
            }
            $aux = $aux . $resto ;
            if ($aux != $CpfIn)
            {
                return false  ;
            }
            return true ;
      }
/*    ================================================================
                             CNPJ
      ================================================================ */
      function CNPJ($CnpjIn)
      {
            if (nm_reg_prod() != "NmScriptCaseAplOk")
            {
                return false;
            }
            for ($x = 0; $x < strlen($CnpjIn); $x++)
            {
                 if ($CnpjIn[$x] < "0" || $CnpjIn[$x] > "9")
                 {
                     return false ;
                 }
            }

            $x = 0 ;
            $y = 5 ;
            $soma = 0 ;

            if (strlen($CnpjIn) != 14)
            {
                return false ;
            }
            $aux = substr($CnpjIn, 0, 12) ;

            for ($x = 0 ; $x < 12 ; $x++)
            {
                 $soma = $soma + (substr($aux, $x , 1) * $y ) ;
                 $y-- ;
                 if ($y == 1)
                 {
                     $y = 9 ;
                 }
            }
            $soma = $soma * 10 ;
            $resto = $soma % 11 ;
            if ($resto == 10)
            {
                $resto = 0 ;
            }
            $aux = $aux . $resto  ;

            $x = 0 ;
            $y = 6 ;
            $soma = 0 ;
            for ($x = 0 ; $x < 13 ; $x++)
            {
                 $soma = $soma + (substr($aux, $x , 1) * $y ) ;
                 $y-- ;
                 if ($y == 1)
                 {
                     $y = 9 ;
                 }
            }
            $soma = $soma * 10 ;
            $resto = $soma % 11 ;
            if ($resto == 10)
            {
                $resto = 0 ;
            }
            $aux = $aux . $resto ;

            if ($aux != $CnpjIn || $CnpjIn == "00000000000000")
            {
                return false  ;
            }
            return true ;
      }
/*    ================================================================
                              DATAS
      ================================================================ */
      function Data($DataIn, $DataFormat, $DataMin, $DataMax)
      {
            if (nm_reg_prod() != "NmScriptCaseAplOk")
            {
                return false;
            }
            for ($x = 0; $x < strlen($DataIn); $x++)
            {
                 if ($DataIn[$x] < "0" || $DataIn[$x] > "9")
                 {
                     return false ;
                 }
            }
            $Dia = "" ;
            $Mes = "" ;
            $Ano = ""  ;
            $DiaMax = "" ;
            $Erro = "" ;
            if ($DataIn == "" || strlen($DataIn) != strlen($DataFormat) )
            {
                return false  ;
            }

            for ($x = 0; $x < strlen($DataIn); $x++)
            {
                 if (substr(strtoupper($DataFormat), $x, 1) == "D")
                 {
                     $Dia = $Dia . substr($DataIn, $x, 1) ;
                 }
                 else
                 {
                     if (substr(strtoupper($DataFormat), $x, 1) == "M")
                     {
                         $Mes = $Mes . substr($DataIn, $x, 1) ;
                     }
                     else
                     {
                         $Ano = $Ano . substr($DataIn, $x, 1) ;
                     }
                 }
            }

            if (($Dia != "" && strlen($Dia) != 2) || ($Mes != "" && strlen($Mes) != 2) || ($Ano != "" && strlen($Ano) != 4) )
            {
                 return false  ;
            }

            $DiaMax = 31 ;
            if ($Mes != "" && $Dia != "")
            {
                if ($Mes == "04" || $Mes == "06" || $Mes == "09" || $Mes == "11" )
                {
                    $DiaMax = 30 ;
                }
                if ($Mes == "02" )
                {
                    $DiaMax = 29 ;
                }
            }
            if ($Ano != "" && $Mes == "02")
            {
                $DiaMax = ( ($Ano % 4) == 0  ?  29 : 28) ;
            }

            if ($Dia != "" && ($Dia < "01" || $Dia > $DiaMax) )
            {
                $Erro = " Dia" ;
            }
            if ($Mes != "" && ($Mes < "01" || $Mes > "12") )
            {
                $Erro .= " Mes" ;
            }
            $data_teste  = ($Ano != ""  ?  $Ano : "0000") ;
            $data_teste .= ($Mes != ""  ?  $Mes : "00") ;
            $data_teste .= ($Dia != ""  ?  $Dia : "00") ;
            if (!empty($DataMin) && $data_teste < $DataMin)
            {
                $Erro .= " Data mínima";
            }
            if (!empty($DataMax) && $data_teste > $DataMax)
            {
                $Erro .= " Data máxima";
            }
            if ($Erro != "" )
            {
                return false  ;
            }
            return true ;
      }

/*    ================================================================
                              HORA
      ================================================================ */
      function Hora($HoraIn, $HoraFormat)
      {
            if (nm_reg_prod() != "NmScriptCaseAplOk")
            {
                return false;
            }
            for ($x = 0; $x < strlen($HoraIn); $x++)
            {
                 if ($HoraIn[$x] < "0" || $HoraIn[$x] > "9")
                 {
                     return false ;
                 }
            }
            $Hora = "" ;
            $Min = "" ;
            $Seg = ""  ;
            $Decim = "" ;
            $Erro = "" ;

            for ($x = 0; $x < strlen($HoraIn); $x++)
            {
                 if (substr(strtoupper($HoraFormat), $x, 1) == "H")
                 {
                     $Hora = $Hora . substr($HoraIn, $x, 1) ;
                 }
                 else
                 {
                     if (substr(strtoupper($HoraFormat), $x, 1) == "M" || substr(strtoupper($HoraFormat), $x, 1) == "I")
                     {
                         $Min = $Min . substr($HoraIn, $x, 1) ;
                     }
                     else
                     {
                         if (substr(strtoupper($HoraFormat), $x, 1) == "S")
                         {
                             $Seg = $Seg . substr($HoraIn, $x, 1) ;
                         }
                         else
                         {
                             $Decim = $Decim . substr($HoraIn, $x, 1) ;
                         }
                      }
                 }
            }

            $qtd_segundos = 0;
            for ($x = 0; $x < strlen($HoraFormat); $x++)
            {
                    if (substr(strtoupper($HoraFormat), $x, 1) == "S")
                    {
                            $qtd_segundos++;
                    }
            }

            $dif_segundos = 0;
            if($qtd_segundos != strlen($Seg) && strlen($Seg) > 1)
            {
                    $dif_segundos = $qtd_segundos - strlen($Seg);
                    $Seg .= str_repeat('0', $qtd_segundos-strlen($Seg));
            }

            if ($HoraIn == "" || (strlen($HoraIn) + $dif_segundos) != strlen($HoraFormat) )
            {
                return false  ;
            }

            if ($Hora != "" && ($Hora < "00" || $Hora > "23") )
            {
                $Erro = " Hora" ;
            }
            if ($Min != "" && ($Min < "00" || $Min > "59") )
            {
                $Erro .= " Minutos" ;
            }
            if ($Seg != "" && strlen($Seg) == 2 && ($Seg < "00" || $Seg > "59") )
            {
                $Erro .= " Segundos" ;
            }
            if ($Decim != "" && ($Decim < "00" || $Decim > "999") )
            {
                $Erro .= " Décimos de Segundo" ;
            }
            if ($Erro != "" )
            {
                 return false  ;
            }
            return true ;
      }

/*    ================================================================
                       Validação de Email
      ================================================================ */
      function Email($email)
      {
            if (nm_reg_prod() != "NmScriptCaseAplOk")
            {
                return false;
            }
            $Erro = "" ;
            $x = strpos(trim($email), " ") ;
            if ($x !== false)
            {
                $Erro = 1 ;
            }
            $x = strpos($email, "@") ;
            $aux = strrpos($email, "@") ;
            if ($x == "" || $x == 0 || $x != $aux)
            {
                $Erro = 1 ;
            }
            $aux = substr($email, $x + 1) ;
            $x = strpos($aux, ".") ;
            if ($x == "" || $x == 0 || $x == (strlen($aux) - 1))
            {
                $Erro = 1 ;
            }
            $x = strrpos($aux, ".") ;
            if ($x == (strlen($aux) - 1))
            {
                $Erro = 1 ;
            }
            if ($Erro != "" )
            {
                return false  ;
            }
            return true ;
      }

/*    ================================================================
                       Validação dos diversos cartões
      ================================================================ */
      function NM_Valida_Cartoes($num_cart)
      {
            if (nm_reg_prod() != "NmScriptCaseAplOk")
            {
                return false;
            }
            for ($x = 0; $x < strlen($num_cart); $x++)
            {
                 if ($num_cart[$x] < "0" || $num_cart[$x] > "9")
                 {
                     return false ;
                 }
            }

            $mult = 1 ;
            $y = strlen($num_cart) ;
            $soma = 0 ;
            for ($x = 0; $x < $y ; $x++)
            {
                 $aux = substr($num_cart, $y - $x - 1, 1) * $mult ;
                 if ($aux >= 10)
                 {
                     $soma += ($aux % 10) + 1;
                 }
                 else
                 {
                     $soma += $aux ;
                 }
                 if ($mult == 1)
                 {
                     $mult++ ;
                 }
                 else
                 {
                     $mult-- ;
                 }
            }
            if (($soma % 10) == 0)
            {
                 return true ;
            }
            else
            {
                 return false ;
            }
      }
/*    ================================================================
                                VISA
                   Padrão: 4000 0000 0000 0000 (16 digitos)
      ================================================================ */
      function Visa($num_cart)
      {
            if (nm_reg_prod() != "NmScriptCaseAplOk")
            {
                return false;
            }
            if ( (strlen($num_cart) == 16 || strlen($num_cart) == 13) &&
                  substr($num_cart, 0, 1) == 4 )
            {
                  return $this->NM_Valida_Cartoes($num_cart) ;
            }
            return false;
      }
/*    ================================================================
                               MasterCard
                    Padrão: 5500 0000 0000 0000 (16 digitos)
      ================================================================ */
      function MasterCard($num_cart)
      {
            if (nm_reg_prod() != "NmScriptCaseAplOk")
            {
                return false;
            }
            if (strlen($num_cart) == 16 && substr($num_cart, 0, 1) == 5 &&
               (substr($num_cart, 1, 1) >= 1 && substr($num_cart, 1, 1) <= 5) )
            {
                return $this->NM_Valida_Cartoes($num_cart) ;
            }
            return false;
      }
/*    ================================================================
                             AmericanExpress
                    Padrão: 340000000000000 (15 digitos)
      ================================================================ */
      function AmericanExpress($num_cart)
      {
            if (nm_reg_prod() != "NmScriptCaseAplOk")
            {
                return false;
            }
            if (strlen($num_cart) == 15 && substr($num_cart, 0, 1) == 3 &&
               (substr($num_cart, 1, 1) == 4 || substr($num_cart, 1, 1) == 7) )
            {
                return $this->NM_Valida_Cartoes($num_cart) ;
            }
            return false;
      }
/*    ================================================================
                                DinersClub
                     Padrão: 30000000000000 (14 digitos)
      ================================================================ */
      function DinersClub($num_cart)
      {
            if (nm_reg_prod() != "NmScriptCaseAplOk")
            {
                return false;
            }
            if (strlen($num_cart) == 14 && substr($num_cart, 0, 1) == 3 &&
               (substr($num_cart, 1, 1) == 0 || substr($num_cart, 1, 1) == 6 ||
                substr($num_cart, 1, 1) == 8) )
            {
                return $this->NM_Valida_Cartoes($num_cart) ;
            }
            return false;
      }
//    ================================================================

 /*    ================================================================
                       Extensoes de arquivos
      ================================================================ */
      function ArqExtensao($arquivo, $extensoes)
      {
            if (nm_reg_prod() != "NmScriptCaseAplOk")
            {
                return false;
            }
            if (empty($extensoes))
            {
                return true;
            }
            $iPos = strrpos($arquivo, '.');
            if (false === $iPos)
            {
                $sExt = '';
            }
            else
            {
                $sExt = strtolower(substr($arquivo, $iPos + 1));
            }
            if ('' == $sExt)
            {
                return false;
            }
            elseif (!in_array($sExt, $extensoes))
            {
                return false;
            }
            return true;
      }

 /*    ================================================================
                       Tamanho de arquivos
      ================================================================ */
      function ArqTamanho($arquivo, $tamanho_max)
      {
            if (nm_reg_prod() != "NmScriptCaseAplOk")
            {
                return false;
            }
            if ('' == $tamanho_max)
            {
                return true;
            }
            $iSize = @filesize($arquivo);
            if (false === $iSize)
            {
                return true;
            }
            if ($iSize > $tamanho_max)
            {
                return false;
            }
            return true;
      }
}
 ?>