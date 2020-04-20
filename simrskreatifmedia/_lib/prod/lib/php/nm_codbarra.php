<?php
/**
 * $Id: nm_codbarra.php,v 1.1.1.1 2011-05-12 20:31:29 diogo Exp $
 */
/*     Componente para Geração de Códigos de Barra.

       Propriedade: NETMAKE - Soluções em Informática Ltda.
                    www.netmake.com.br
       Abril/2001.
*/
class NM_Codbarra
{
/*    ================================================================
                         Código 2 de 5
      ================================================================ */
      function Barra_2de5($Codigo, $Path, &$Arq, $Texto=0, $Alt=0, $Largura=0)
      {
            if (nm_reg_prod() != "NmScriptCaseAplOk")
            {
                return ;
            }
            if (empty($Codigo))
            {
                return ;
            }
            $Qualidade = 100;

            if ($Arq == "")
            {
                settype ($Arq, "integer");
                $Arq = rand(0, 30000) ;
                settype ($Arq, "string");
            }

            $Bfina = 1 ;
            $Bgrossa = 3 ;
            $Bseparador = 0;
            $Base_altura = 0;
            $FontHeight = 0;

            if (!empty($Alt) && $Alt != 0)
            {
                $Altura = $Alt ;
            }
            else
            {
                $Altura = 50 ;
                $Alt = 50;
            }

            if (!empty($Largura) && $Largura != 0)
            {
                $Num_char = (strlen($Codigo)+2) * ((7 * $Bfina) + (2 * $Bgrossa) + ($Bseparador));
                $Num_char = $Num_char - ($Bfina * 8) ;
                $Pixels = $Largura / $Num_char;
                $Bfina = (int)($Bfina * $Pixels);
                $Bgrossa = (int)($Bgrossa * $Pixels);
                $Bseparador = (int)($Bseparador * $Pixels);
            }
            else
            {
                $Largura = (($Bfina * 3) + ($Bgrossa * 2) + $Bseparador) * (strlen ($Codigo));
                $Largura = $Largura + ($Bfina * 8) + $Bgrossa;
            }

            $Larg_Final = (($Bfina * 3) + ($Bgrossa * 2) + $Bseparador) * (strlen ($Codigo));
            $Larg_Final = $Larg_Final + ($Bfina * 8)  + $Bgrossa;

            $im = @ImageCreate ($Larg_Final-1, $Altura)
              or die ("Não foi possível criar imagem !!");
            $Branco = ImageColorAllocate ($im, 255, 255, 255);
            $Preto = ImageColorAllocate ($im, 0, 0, 0);
//            ImageColorTransparent ($im, $Branco);
            ImageInterLace ($im, 1);

            for ($i = 0; $i < strlen($Codigo); $i++)
            {    if (substr($Codigo, $i, 1) < "0" || substr($Codigo, $i, 1) > "9")
                 {
                      ImageString ($im, 2, 0, 0, "Código invalido.", $Preto); ;
                      ImageString ($im, 2, 0, 10, "Só aceita números !", $Preto); ;
                      ImageJPEG ($im, $Path . $Arq . ".jpg", $Qualidade);
                      if ($Largura == 0)
                      {
                          $Largura = $Larg_Final ;
                      }
                      return ;
                 }
            }

            if ($Bfina == 0 || $Bfina == $Bgrossa || $Bgrossa == 0 || $Bgrossa == $Bseparador)
            {
                ImageString ($im, 2, 0, 0, "Imagem muito pequena !", $Preto);
                ImageJPEG ($im, $Path . $Arq . ".jpg", $Qualidade);
                if ($Largura == 0)
                {
                    $Largura = $Larg_Final ;
                }
                return;
            }
            if (strlen($Codigo) % 2 != 0)
            {
                ImageString ($im, 2, 0, 0, "Quantidade de algarismos tem que ser par !", $Preto);
                ImageJPEG ($im, $Path . $Arq . ".jpg", $Qualidade);
                if ($Largura == 0)
                {
                    $Largura = $Larg_Final ;
                }
                return;
            }
            $Posicao = 0 ;
            $Cor = $Branco;
            $CodigoFull = strtoupper($Codigo);
            settype ($CodigoFull, "string");

            if ($Texto != 0)
            {
                $FontNum = $Texto;
                $FontHeight = ImageFontHeight ($FontNum);
                $FontWidth = ImageFontWidth ($FontNum);
                $Pos_Texto = (int)(($Larg_Final - (int)($FontWidth * strlen($Codigo))) / 2);
                ImageString ($im, $FontNum, $Pos_Texto, $Altura - $FontHeight, $Codigo, $Preto);
            }
            ImageFilledRectangle ($im, $Posicao, 0, $Posicao+$Bfina, $Altura-1-$FontHeight-2, $Preto);
            $Posicao += $Bfina;
            ImageFilledRectangle ($im, $Posicao, 0, $Posicao+$Bfina, $Altura-1-$FontHeight-2, $Branco);
            $Posicao += $Bfina;
            ImageFilledRectangle ($im, $Posicao, 0, $Posicao+$Bfina, $Altura-1-$FontHeight-2, $Preto);
            $Posicao += $Bfina;
            ImageFilledRectangle ($im, $Posicao, 0, $Posicao+$Bfina, $Altura-1-$FontHeight-2, $Branco);
            $Posicao += $Bfina;
            for ($i=0; $i < strlen($CodigoFull); $i = $i + 2)
            {
                 $Cada_Cod1 = $this->Code2de5($CodigoFull[$i]);
                 $Cada_Cod2 = $this->Code2de5($CodigoFull[$i + 1]);
                 for ($z = 0; $z < 5; $z++)
                 {
                      if (substr($Cada_Cod1, $z, 1) == "1")
                      {
                          ImageFilledRectangle ($im, $Posicao, 0, $Posicao+$Bgrossa, $Altura-1-$FontHeight-2, $Preto);
                          $Posicao += $Bgrossa;
                      }
                      else
                      {
                          ImageFilledRectangle ($im, $Posicao, 0, $Posicao+$Bfina, $Altura-1-$FontHeight-2, $Preto);
                          $Posicao += $Bfina;
                      }
                      if (substr($Cada_Cod2, $z, 1) == "1")
                      {
                          ImageFilledRectangle ($im, $Posicao, 0, $Posicao+$Bgrossa, $Altura-1-$FontHeight-2, $Branco);
                          $Posicao += $Bgrossa;
                      }
                      else
                      {
                          ImageFilledRectangle ($im, $Posicao, 0, $Posicao+$Bfina, $Altura-1-$FontHeight-2, $Branco);
                          $Posicao += $Bfina;
                      }
                 }

            }
            ImageFilledRectangle ($im, $Posicao, 0, $Posicao+$Bgrossa, $Altura-1-$FontHeight-2, $Preto);
            $Posicao += $Bgrossa;
            ImageFilledRectangle ($im, $Posicao, 0, $Posicao+$Bfina, $Altura-1-$FontHeight-2, $Branco);
            $Posicao += $Bfina;
            ImageFilledRectangle ($im, $Posicao, 0, $Posicao+$Bfina, $Altura-1-$FontHeight-2, $Preto);
            $Posicao += $Bfina;
            ImageFilledRectangle ($im, $Posicao, 0, $Posicao+$Bgrossa, $Altura-1-$FontHeight-2, $Branco);
            ImageJPEG ($im, $Path . $Arq . ".jpg", $Qualidade);
            $Largura = $Larg_Final ;
      }
//-----------------------------------------------------------------------------
      function Code2de5 ($Carater)
      {
            switch ($Carater)
            {
                case '0':
                        return "00110";
                case '1':
                        return "10001";
                case '2':
                        return "01001";
                case '3':
                        return "11000";
                case '4':
                        return "00101";
                case '5':
                        return "10100";
                case '6':
                        return "01100";
                case '7':
                        return "00011";
                case '8':
                        return "10010";
                case '9':
                        return "01010";
                case 'F':
                        return "100";   // Guarda Final
                case 'I':
                        return "0000";   // Guarda Inicio
                default:
                        return "00110";   // 0
            }
      }

/*    ================================================================
                         Código 39
      ================================================================ */
      function Barra_39($Codigo, $Path, &$Arq, $Texto=0, $Alt=0, $Largura=0)
      {
            if (nm_reg_prod() != "NmScriptCaseAplOk")
            {
                return ;
            }
            if (empty($Codigo))
            {
                return ;
            }
            $Qualidade = 100;

            if ($Arq == "")
            {
                settype ($Arq, "integer");
                $Arq = rand(0, 30000) ;
                settype ($Arq, "string");
            }
            $Bfina = 1 ;
            $Bgrossa = 3 ;
            $Bseparador = 1;

            if (!empty($Alt) && $Alt != 0)
            {
                $Altura = $Alt ;
            }
            else
            {
                $Altura = 60 ;
                $Alt = 60;
            }

            if (!empty($Largura) && $Largura != 0)
            {
                $Num_char = (strlen($Codigo)+2) * ((6 * $Bfina) + (3 * $Bgrossa) + $Bseparador);
                $Pixels = $Largura / $Num_char;
                $Bfina = (int)($Bfina * $Pixels);
                $Bgrossa = (int)($Bgrossa * $Pixels);
                $Bseparador = (int)($Bseparador * $Pixels);
            }
            else
            {
                $Largura = (($Bfina * 6) + ($Bgrossa * 3) + $Bseparador) * (strlen ($Codigo)+2);
            }

            $Larg_Final = (($Bfina * 6) + ($Bgrossa * 3) + $Bseparador) * (strlen ($Codigo)+2);

            $Largura = $Larg_Final ;

            $im = @ImageCreate ($Larg_Final-1, $Altura)
              or die ("Não foi possível criar imagem !!");

            $Branco = ImageColorAllocate ($im, 255, 255, 255);
            $Preto = ImageColorAllocate ($im, 0, 0, 0);
            //ImageColorTransparent ($im, $Branco);
            ImageInterLace ($im, 1);

            if (($Bfina == 0) || ($Bfina == $Bgrossa) || ($Bgrossa == 0) || ($Bgrossa == $Bseparador) || ($Bseparador == 0))
            {
                ImageString ($im, 2, 0, 0, "Imagem muito pequena !", $Preto);
                ImageJPEG ($im, $Path . $Arq . ".jpg", $Qualidade);
                return;
            }

            $Posicao = 0 ;
            $Cor = $Branco;
            $CodigoFull = "*" . strtoupper($Codigo) . "*";
            settype ($CodigoFull, "string");

            $FontHeight = 0;
            $FontWidth  = 0;
            if ($Texto != 0)
            {
                $FontNum = $Texto;
                $FontHeight = ImageFontHeight ($FontNum);
                $FontWidth = ImageFontWidth ($FontNum);
                $Pos_Texto = (int)(($Larg_Final - (int)($FontWidth * strlen($CodigoFull))) / 2);
                ImageString ($im, $FontNum, $Pos_Texto, $Altura - $FontHeight, $CodigoFull, $Preto);
            }

            for ($i=0; $i<strlen($CodigoFull); $i++)
            {
                 $Cada_Codigo = $this->Code39($CodigoFull[$i]);
                 for ($n=0; $n < 9; $n++)
                 {
                      if ($Cor == $Branco)
                      {
                          $Cor = $Preto;
                      }
                      else
                      {
                          $Cor = $Branco;
                      }

                      switch ($Cada_Codigo[$n])
                      {
                              case '0':
                                    ImageFilledRectangle ($im, $Posicao, 0, $Posicao+$Bfina, $Altura-1-$FontHeight-2, $Cor);
                                    $Posicao += $Bfina;
                                     break;
                              case '1':
                                    ImageFilledRectangle ($im, $Posicao, 0, $Posicao+$Bgrossa, $Altura-1-$FontHeight-2, $Cor);
                                    $Posicao += $Bgrossa;
                                    break;
                      }
                 }
                 $Cor = $Branco;
                 ImageFilledRectangle ($im, $Posicao, 0, $Posicao+$Bseparador, $Altura-1-$FontHeight-2, $Cor);
                 $Posicao += $Bseparador;
            }
            ImageJPEG ($im, $Path . $Arq . ".jpg", $Qualidade);
      }
//-----------------------------------------------------------------------------
      function Code39($Carater)
      {
            switch ($Carater)
            {
                case ' ':
                        return "011000100";
                case '$':
                        return "010101000";
                case '%':
                        return "000101010";
                case '*':
                        return "010010100"; // * Guarda inicio/fim
                case '+':
                        return "010001010";
                case '|':
                        return "010000101";
                case '.':
                        return "110000100";
                case '-':
                        return "010000101";
                case '/':
                        return "010100010";
                case '0':
                        return "000110100";
                case '1':
                        return "100100001";
                case '2':
                        return "001100001";
                case '3':
                        return "101100000";
                case '4':
                        return "000110001";
                case '5':
                        return "100110000";
                case '6':
                        return "001110000";
                case '7':
                        return "000100101";
                case '8':
                        return "100100100";
                case '9':
                        return "001100100";
                case 'A':
                        return "100001001";
                case 'B':
                        return "001001001";
                case 'C':
                        return "101001000";
                case 'D':
                        return "000011001";
                case 'E':
                        return "100011000";
                case 'F':
                        return "001011000";
                case 'G':
                        return "000001101";
                case 'H':
                        return "100001100";
                case 'I':
                        return "001001100";
                case 'J':
                        return "000011100";
                case 'K':
                        return "100000011";
                case 'L':
                        return "001000011";
                case 'M':
                        return "101000010";
                case 'N':
                        return "000010011";
                case 'O':
                        return "100010010";
                case 'P':
                        return "001010010";
                case 'Q':
                        return "000000111";
                case 'R':
                        return "100000110";
                case 'S':
                        return "001000110";
                case 'T':
                        return "000010110";
                case 'U':
                        return "110000001";
                case 'V':
                        return "011000001";
                case 'W':
                        return "111000000";
                case 'X':
                        return "010010001";
                case 'Y':
                        return "110010000";
                case 'Z':
                        return "011010000";
                default:
                        return "011000100";  // branco
            }
      }
//    ================================================================

/*    ================================================================
                         Código 128
      ================================================================ */
      function Barra_128($Codigo, $Path, &$Arq, $Texto=0, $Alt=0, $Largura=0)
      {
            if (nm_reg_prod() != "NmScriptCaseAplOk")
            {
                return ;
            }
            if (empty($Codigo))
            {
                return ;
            }
            $Qualidade = 100;
            $Bfina = 1 ;

            if ($Arq == "")
            {
                settype ($Arq, "integer");
                $Arq = rand(0, 30000) ;
                settype ($Arq, "string");
            }

            if (!empty($Alt) && $Alt != 0)
            {
                $Altura = $Alt ;
            }
            else
            {
                $Altura = 60 ;
                $Alt = 60;
            }

            $Larg_Final = 36 + (11 * strlen($Codigo));
            if (!empty($Largura) && $Largura > $Larg_Final)
            {
                $Pixels = $Largura / $Larg_Final;
                $Bfina = (int)($Bfina * $Pixels);
                $Larg_Final = $Largura;
            }

            $im = @ImageCreate ($Larg_Final-1, $Altura)
              or die ("Não foi possível criar imagem !!");

            $Branco = ImageColorAllocate ($im, 255, 255, 255);
            $Preto = ImageColorAllocate ($im, 0, 0, 0);
            //ImageColorTransparent ($im, $Branco);
            ImageInterLace ($im, 1);

            $Posicao = 0 ;
            settype ($Codigo, "string");

            $FontHeight = 0;
            $FontWidth  = 0;
            if ($Texto != 0)
            {
                $FontNum = $Texto;
                $FontHeight = ImageFontHeight ($FontNum);
                $FontWidth = ImageFontWidth ($FontNum);
                $Pos_Texto = (int)(($Larg_Final - (int)($FontWidth * strlen($Codigo))) / 2);
                ImageString ($im, $FontNum, $Pos_Texto, $Altura - $FontHeight, $Codigo, $Preto);
            }

            $cont    = 0;
            $total   = 104;
            $arr_val = array();
            $this->code128();
            // Start
            $arr_val[]  = 104;
            //  Corpo
            for( $xx=0; $xx < strlen($Codigo); $xx++ )
            {
                 $pos = strpos($this->ascii, $Codigo[$xx]);
                 if ($pos === false )
                 {
                     continue;
                 }
                 else
                 {
                     $cont++;
                     $arr_val[] = $pos;
                     $total    += ($cont * $pos);
                 }
            }
            //  Digito
            $arr_val[] = ($total % 103);
            // Stop
            $arr_val[] = 106;

            foreach ($arr_val as $key => $valor)
            {
                $Cor = $Branco;
                $cod = $this->arr128[$valor];
                for ($i=0; $i < strlen($cod); $i++)
                {
                     $Cor = ($Cor == $Branco) ? $Preto : $Branco;
                     $lar = $Bfina * $cod[$i];
                     ImageFilledRectangle ($im, $Posicao, 0, $Posicao + $lar, $Altura-1-$FontHeight-2, $Cor);
                     $Posicao += $lar;
                }
            }
            ImageJPEG ($im, $Path . $Arq . ".jpg", $Qualidade);
      }

      function code128()
      {
            $this->ascii         = " !\"#\$%&'()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\\]^_`abcdefghijklmnopqrstuvwxyz{|}~";
            $this->arr128[0]     = "212222";
            $this->arr128[1]     = "222122";
            $this->arr128[2]     = "222221";
            $this->arr128[3]     = "121223";
            $this->arr128[4]     = "121322";
            $this->arr128[5]     = "131222";
            $this->arr128[6]     = "122213";
            $this->arr128[7]     = "122312";
            $this->arr128[8]     = "132212";
            $this->arr128[9]     = "221213";
            $this->arr128[10]    = "221312";
            $this->arr128[11]    = "231212";
            $this->arr128[12]    = "112232";
            $this->arr128[13]    = "122132";
            $this->arr128[14]    = "122231";
            $this->arr128[15]    = "113222";
            $this->arr128[16]    = "123122";
            $this->arr128[17]    = "123221";
            $this->arr128[18]    = "223211";
            $this->arr128[19]    = "221132";
            $this->arr128[20]    = "221231";
            $this->arr128[21]    = "213212";
            $this->arr128[22]    = "223112";
            $this->arr128[23]    = "312131";
            $this->arr128[24]    = "311222";
            $this->arr128[25]    = "321122";
            $this->arr128[26]    = "321221";
            $this->arr128[27]    = "312212";
            $this->arr128[28]    = "322112";
            $this->arr128[29]    = "322211";
            $this->arr128[30]    = "212123";
            $this->arr128[31]    = "212321";
            $this->arr128[32]    = "232121";
            $this->arr128[33]    = "111323";
            $this->arr128[34]    = "131123";
            $this->arr128[35]    = "131321";
            $this->arr128[36]    = "112313";
            $this->arr128[37]    = "132113";
            $this->arr128[38]    = "132311";
            $this->arr128[39]    = "211313";
            $this->arr128[40]    = "231113";
            $this->arr128[41]    = "231311";
            $this->arr128[42]    = "112133";
            $this->arr128[43]    = "112331";
            $this->arr128[44]    = "132131";
            $this->arr128[45]    = "113123";
            $this->arr128[46]    = "113321";
            $this->arr128[47]    = "133121";
            $this->arr128[48]    = "313121";
            $this->arr128[49]    = "211331";
            $this->arr128[50]    = "231131";
            $this->arr128[51]    = "213113";
            $this->arr128[52]    = "213311";
            $this->arr128[53]    = "213131";
            $this->arr128[54]    = "311123";
            $this->arr128[55]    = "311321";
            $this->arr128[56]    = "331121";
            $this->arr128[57]    = "312113";
            $this->arr128[58]    = "312311";
            $this->arr128[59]    = "332111";
            $this->arr128[60]    = "314111";
            $this->arr128[61]    = "221411";
            $this->arr128[62]    = "431111";
            $this->arr128[63]    = "111224";
            $this->arr128[64]    = "111422";
            $this->arr128[65]    = "121124";
            $this->arr128[66]    = "121421";
            $this->arr128[67]    = "141122";
            $this->arr128[68]    = "141221";
            $this->arr128[69]    = "112214";
            $this->arr128[70]    = "112412";
            $this->arr128[71]    = "122114";
            $this->arr128[72]    = "122411";
            $this->arr128[73]    = "142112";
            $this->arr128[74]    = "142211";
            $this->arr128[75]    = "241211";
            $this->arr128[76]    = "221114";
            $this->arr128[77]    = "413111";
            $this->arr128[78]    = "241112";
            $this->arr128[79]    = "134111";
            $this->arr128[80]    = "111242";
            $this->arr128[81]    = "121142";
            $this->arr128[82]    = "121241";
            $this->arr128[83]    = "114212";
            $this->arr128[84]    = "124112";
            $this->arr128[85]    = "124211";
            $this->arr128[86]    = "411212";
            $this->arr128[87]    = "421112";
            $this->arr128[88]    = "421211";
            $this->arr128[89]    = "212141";
            $this->arr128[90]    = "214121";
            $this->arr128[91]    = "412121";
            $this->arr128[92]    = "111143";
            $this->arr128[93]    = "111341";
            $this->arr128[94]    = "131141";
            $this->arr128[95]    = "114113";
            $this->arr128[96]    = "114311";
            $this->arr128[97]    = "411113";
            $this->arr128[98]    = "411311";
            $this->arr128[99]    = "113141";
            $this->arr128[100]   = "114131";
            $this->arr128[101]   = "311141";
            $this->arr128[102]   = "411131";
            $this->arr128[103]   = "211412";
            $this->arr128[104]   = "211214";
            $this->arr128[105]   = "211232";
            $this->arr128[106]   = "2331112";
      }

//-----------------------------------------------------------------------------

/*    ================================================================
                         Código EAN-13
      ================================================================ */
      function Barra_EAN13($Codigo, $Path, &$Arq, $Tamanho=2, $Alt=0, $Larg=0)
      {
            if (nm_reg_prod() != "NmScriptCaseAplOk")
            {
                return ;
            }
            if (empty($Codigo))
            {
                return ;
            }
            $Qualidade = 100;

            if ($Arq == "")
            {
                settype ($Arq, "integer");
                $Arq = rand(0, 30000) ;
                settype ($Arq, "string");
            }

            if ($Tamanho == 1)
            {
                $Altura = 66 ;
                $Largura = 202 ;
            }
            else
            {
                $Tamanho = 2 ; //oficial
                $Altura = 100 ;
                $Largura = 304 ;
            }
            $im = @ImageCreate ($Largura, $Altura)
                 or die ("Não foi possível criar imagem !!");
            $Branco = ImageColorAllocate ($im, 255, 255, 255);
            $Preto = ImageColorAllocate ($im, 0, 0, 0);

//   Crítica do código informado
            if (strlen($Codigo) != 12)
            {
                ImageString ($im, 2, 0, 0, "Código invalido.", $Preto);
                ImageString ($im, 2, 0, 10, "Não tem 13 dígitos !", $Preto);
                ImageJPEG ($im, $Path . $Arq . ".jpg", $Qualidade);
                $Alt = $Altura;
                $Larg = $Largura;
                return ;
            }

            for ($i = 0; $i < strlen($Codigo); $i++)
            {    if (substr($Codigo, $i, 1) < "0" || substr($Codigo, $i, 1) > "9")
                 {
                      ImageString ($im, 2, 0, 0, "Código invalido.", $Preto); ;
                      ImageString ($im, 2, 0, 10, "Só aceita números !", $Preto); ;
                      ImageJPEG ($im, $Path . $Arq . ".jpg", $Qualidade);
                      $Alt = $Altura;
                      $Larg = $Largura;
                      return ;
                 }
            }

// Define tabela dos códigos
            $esquerda[0][O] = "0001101";
            $esquerda[0][E] = "0100111";
            $esquerda[1][O] = "0011001";
            $esquerda[1][E] = "0110011";
            $esquerda[2][O] = "0010011";
            $esquerda[2][E] = "0011011";
            $esquerda[3][O] = "0111101";
            $esquerda[3][E] = "0100001";
            $esquerda[4][O] = "0100011";
            $esquerda[4][E] = "0011101";
            $esquerda[5][O] = "0110001";
            $esquerda[5][E]  = "0111001";
            $esquerda[6][O] = "0101111";
            $esquerda[6][E] = "0000101";
            $esquerda[7][O] = "0111011";
            $esquerda[7][E] = "0010001";
            $esquerda[8][O] = "0110111";
            $esquerda[8][E] = "0001001";
            $esquerda[9][O] = "0001011";
            $esquerda[9][E] = "0010111";
            $direita[0] = "1110010";
            $direita[1] = "1100110";
            $direita[2] = "1101100";
            $direita[3] = "1000010";
            $direita[4] = "1011100";
            $direita[5] = "1001110";
            $direita[6] = "1010000";
            $direita[7] = "1000100";
            $direita[8] = "1001000";
            $direita[9] = "1110100";

// Cálculo do dígito de controle
            $soma1 = 0 ;
            $soma2 = 0 ;
            $controle = 1 ;

            for ($i = 0; $i <= 11; $i++)
            {    $num = substr($Codigo, $i, 1);
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
            $Codigo = $Codigo . $DV;

// Cria Array de $Codigo
            for ($i = 1; $i <= 13; $i++)
            {
                 $c[$i] = substr($Codigo, $i-1, 1);
            }

// Define tabela a ser utilizada
            if ($c[1] == 0)
            {
                $parity = "OOOOO";
            }
            else if ($c[1] == 1)
                 {  $parity = "OEOEE"; }
                 else if ($c[1] == 2)
                      {   $parity = "OEEOE"; }
                      else if ($c[1] == 3)
                           {   $parity = "OEEEO"; }
                           else if ($c[1] == 4)
                                {   $parity = "EOOEE"; }
                                else if ($c[1] == 5)
                                     {   $parity = "EEOOEE"; }
                                     else if ($c[1] == 6)
                                          {   $parity = "EEEOO"; }
                                          else if ($c[1] == 7)
                                               {   $parity = "EOEOE"; }
                                               else if ($c[1] == 8)
                                                    {   $parity = "EOEEO"; }
                                                    else if ($c[1] == 9)
                                                         {   $parity = "EEOEO"; }

// Gera string para dezenho
            $barbit = "101"; // Guarda Inicial
            $barbit = $barbit . $esquerda[$c[2]][O]; // Primeito caracter

            for ($i = 3; $i <= 7; $i++) // Cinco caracteres seguintes
            {
                 $par = substr($parity, $i - 3, 1);
                 $barbit = $barbit . $esquerda[$c[$i]][$par];
            }

            $barbit = $barbit . "01010"; // Caracter guarda Central

            for ($i = 8; $i <= 13; $i++) //  Cinco caracteres restantes e DV
            {
                 $barbit = $barbit . $direita[$c[$i]];
            }

            $barbit = $barbit . "101"; // Guarda Final

// Imagem tamanho 1
            if ($Tamanho == 1)
            {   $start = 9;
                for ($i = 1; $i <= 95; $i++)
                {
                     $end = $start + 2;
                     $bit = substr($barbit, $i-1, 1);
                     if ($bit == 0)
                     {
                         Imagefilledrectangle ($im, $start, 0, $end, 66, $Branco);
                     }
                     else
                     {
                         Imagefilledrectangle ($im, $start, 0, $end, 66, $Preto);
                     }
                     $start = $end;
                }
                Imagefilledrectangle ($im, 199, 0, 202, 66, $Branco);
                Imagefilledrectangle ($im, 15, 53, 98, 66, $Branco);
                Imagefilledrectangle ($im, 108, 53, 192, 66, $Branco);
                Imagefilledrectangle ($im, 0, 60, 202, 66, $Branco);
                ImageString ($im, 3, 1, 44, $c[1], $Preto);
                ImageString ($im, 3, 20, 54, "$c[2] $c[3] $c[4] $c[5] $c[6] $c[7]", $Preto);
                ImageString ($im, 3, 114, 54, "$c[8] $c[9] $c[10] $c[11] $c[12] $c[13]", $Preto);
            }

// Imagem tamanho 2
            if ($Tamanho == 2)
            {
                $start = 14;
                for ($i = 1; $i <= 95; $i++)
                {
                     $end = $start + 3;
                     $bit = substr($barbit, $i-1, 1);
                     if ($bit == 0)
                     {   Imagefilledrectangle ($im, $start, 0, $end, 100, $Branco); }
                     else
                     {   Imagefilledrectangle ($im, $start, 0, $end, 100, $Preto);  }
                     $start = $end;
                }

                Imagefilledrectangle ($im, 299, 0, 304, 100, $Branco);
                Imagefilledrectangle ($im, 23, 80, 148, 100, $Branco);
                Imagefilledrectangle ($im, 163, 80, 289, 100, $Branco);
                Imagefilledrectangle ($im, 0, 92, 304, 100, $Branco);
                ImageString ($im, 5, 3, 68, $c[1], $Preto);
                ImageString ($im, 5, 37, 83, "$c[2] $c[3] $c[4] $c[5] $c[6] $c[7]", $Preto);
                ImageString ($im, 5, 177, 83, "$c[8] $c[9] $c[10] $c[11] $c[12] $c[13]", $Preto);
            }

            ImageJPEG ($im, $Path . $Arq . ".jpg", $Qualidade);
            if (empty($Larg) && empty($Alt))
            {
                $Larg = $Largura ;
                $Alt =  $Altura ;
            }
            else
            {  if (empty($Larg))
               {
                   $Larg = $Largura ;
               }
               if (empty($Alt))
               {
                   $Alt = $Altura ;
               }
               $nimg = $Path . $Arq . ".jpg" ;
               $src = imagecreatefromjpeg("$nimg");
               $im = imagecreate($Larg, $Alt);
               imagecopyresized($im,$src,0,0,0,0,$Larg,$Alt,$Largura,$Altura);
               ImageJPEG ($im, $Path . $Arq . ".jpg", $Qualidade);
               imagedestroy($im);
            }
  }
//    ================================================================


/*    ================================================================
                         Código EAN-8
      ================================================================ */
      function Barra_EAN8($Codigo, $Path, &$Arq, $Tamanho=2, $Alt=0, $Larg=0)
      {
            if (nm_reg_prod() != "NmScriptCaseAplOk")
            {
                return ;
            }
            if (empty($Codigo))
            {
                return ;
            }
            $Qualidade = 100;

            if ($Arq == "")
            {
                settype ($Arq, "integer");
                $Arq = rand(0, 30000) ;
                settype ($Arq, "string");
            }
            if ($Tamanho == 1)
            {
                $Altura = 66 ;
                $Largura = 140 ;
            }
            else
            {
                $Tamanho = 2 ; // oficial
                $Altura = 100 ;
                $Largura = 211 ;
            }

            $im = @ImageCreate ($Largura, $Altura)
                 or die ("Não foi possível criar imagem !!");
            $Branco = ImageColorAllocate ($im, 255, 255, 255);
            $Preto = ImageColorAllocate ($im, 0, 0, 0);

//   Crítica do código informado
            if (strlen($Codigo) != 7)
            {
                ImageString ($im, 2, 0, 0, "Código invalido.", $Preto);
                ImageString ($im, 2, 0, 10, "Não tem 8 dígitos !", $Preto);
                ImageJPEG ($im, $Path . $Arq . ".jpg", $Qualidade);
                $Alt = $Altura;
                $Larg = $Largura;
                return ;
            }

            for ($i = 0; $i < strlen($Codigo); $i++)
            {    if (substr($Codigo, $i, 1) < "0" || substr($Codigo, $i, 1) > "9")
                 {
                      ImageString ($im, 2, 0, 0, "Código invalido.", $Preto); ;
                      ImageString ($im, 2, 0, 10, "Só aceita números !", $Preto); ;
                      ImageJPEG ($im, $Path . $Arq . ".jpg", $Qualidade);
                      $Alt = $Altura;
                      $Larg = $Largura;
                      return ;
                 }
            }

// Cálculo do dígito de controle
            $soma1 = 0 ;
            $soma2 = 0 ;
            $controle = 1 ;

            for ($i = 0; $i <= 6; $i++)
            {
                 $num = substr($Codigo, $i, 1);
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
            $Codigo = $Codigo . $DV;

// Cria Array de $Codigo
            for ($i = 1; $i <= 8; $i++)
            {
                 $c[$i] = substr($Codigo, $i-1, 1);
            }

// Define tabela dos códigos
            $esquerda[0] = "0001101";
            $esquerda[1] = "0011001";
            $esquerda[2] = "0010011";
            $esquerda[3] = "0111101";
            $esquerda[4] = "0100011";
            $esquerda[5] = "0110001";
            $esquerda[6] = "0101111";
            $esquerda[7] = "0111011";
            $esquerda[8] = "0110111";
            $esquerda[9] = "0001011";
            $direita[0]  = "1110010";
            $direita[1]  = "1100110";
            $direita[2]  = "1101100";
            $direita[3]  = "1000010";
            $direita[4]  = "1011100";
            $direita[5]  = "1001110";
            $direita[6]  = "1010000";
            $direita[7]  = "1000100";
            $direita[8]  = "1001000";
            $direita[9]  = "1110100";

// Gera string para dezenho
            $barbit = "101"; // Guarda Inicial
            for ($i = 1; $i <= 4; $i++) // 4 primiros digitos
            {
                 $num = substr($Codigo, $i - 1, 1);
                 $barbit = $barbit . $esquerda[$num];
            }

            $barbit = $barbit . "01010"; // Guarda do meio

            for ($i = 5; $i <= 8; $i++) //   4 digitos restantes
            {
                 $num = substr($Codigo, $i - 1, 1);
                 $barbit = $barbit . $direita[$num];
            }
            $barbit = $barbit . "101"; // Guarda Final

// Imagem tamanho 1
            if ($Tamanho == 1)
            {
                $start = 3;
                for ($i = 1; $i <= 67; $i++)
                {
                    $end = $start + 2;
                    $bit = substr($barbit, $i-1, 1);
                    if ($bit == 0)
                    {   Imagefilledrectangle ($im, $start, 0, $end, 66, $Branco); }
                    else
                    {   Imagefilledrectangle ($im, $start, 0, $end, 66, $Preto); }
                    $start = $end;
                }
                Imagefilledrectangle ($im, 137, 0, 140, 66, $Branco);
                Imagefilledrectangle ($im, 9, 52, 65, 66, $Branco);
                Imagefilledrectangle ($im, 75, 52, 130, 66, $Branco);
                Imagefilledrectangle ($im, 0, 60, 140, 66, $Branco);
                ImageString ($im, 2, 16, 54, "$c[1] $c[2] $c[3] $c[4]", $Preto);
                ImageString ($im, 2, 82, 54, "$c[5] $c[6] $c[7] $c[8]", $Preto);
            }

// Imagem tamanho 2
            if ($Tamanho == 2)
            {
                $start = 5;
                for ($i = 1; $i <= 67; $i++)
                {
                    $end = $start + 3;
                    $bit = substr($barbit, $i-1, 1);
                    if ($bit == 0)
                    {
                        Imagefilledrectangle ($im, $start, 0, $end, 100, $Branco);
                    }
                    else
                    {
                        Imagefilledrectangle ($im, $start, 0, $end, 100, $Preto);
                    }
                    $start = $end;
                }
                Imagefilledrectangle ($im, 206, 0, 211, 100, $Branco);
                Imagefilledrectangle ($im, 14, 80, 98, 100, $Branco);
                Imagefilledrectangle ($im, 113, 80, 196, 100, $Branco);
                Imagefilledrectangle ($im, 0, 92, 211, 100, $Branco);
                ImageString ($im, 5, 25, 83, "$c[1] $c[2] $c[3] $c[4]", $Preto);
                ImageString ($im, 5, 124, 83, "$c[5] $c[6] $c[7] $c[8]", $Preto);
            }
            ImageJPEG ($im, $Path . $Arq . ".jpg", $Qualidade);
            if (empty($Larg) && empty($Alt))
            {
                $Larg = $Largura ;
                $Alt =  $Altura ;
            }
            else
            {   if (empty($Larg))
                {
                    $Larg = $Largura ;
                }
                if (empty($Alt))
                {
                    $Alt = $Altura ;
                }
                $nimg = $Path . $Arq . ".jpg" ;
                $src = imagecreatefromjpeg("$nimg");
                $im = imagecreate($Larg, $Alt);
                imagecopyresized($im,$src,0,0,0,0,$Larg,$Alt,$Largura,$Altura);
                ImageJPEG ($im, $Path . $Arq . ".jpg", $Qualidade);
                imagedestroy($im);
            }
      }
//    ================================================================

/*    ================================================================
                         Código UPC
      ================================================================ */
      function Barra_UPC($Codigo, $Path, &$Arq, $Tamanho=2, $Alt=0, $Larg=0)
      {
            if (nm_reg_prod() != "NmScriptCaseAplOk")
            {
                return ;
            }
            if (empty($Codigo))
            {
                return ;
            }
            $Qualidade = 100;

            if ($Arq == "")
            {
                settype ($Arq, "integer");
                $Arq = rand(0, 30000) ;
                settype ($Arq, "string");
            }

            if ($Tamanho == 1)
            {
                $Altura = 66 ;
                $Largura = 210 ;
            }
            else
            {
                $Tamanho = 2 ; //oficial
                $Altura = 100 ;
                $Largura = 313 ;
            }

            $im = @ImageCreate ($Largura, $Altura)
                 or die ("Não foi possível criar imagem !!");
            $Branco = ImageColorAllocate ($im, 255, 255, 255);
            $Preto = ImageColorAllocate ($im, 0, 0, 0);

//   Crítica do código informado
            if (strlen($Codigo) != 11)
            {
                ImageString ($im, 2, 0, 0, "Código invalido.", $Preto);
                ImageString ($im, 2, 0, 10, "Não tem 12 dígitos !", $Preto);
                ImageJPEG ($im, $Path . $Arq . ".jpg", $Qualidade);
                $Alt = $Altura;
                $Larg = $Largura;
                return ;
            }

            for ($i = 0; $i < strlen($Codigo); $i++)
            {
                 if (substr($Codigo, $i, 1) < "0" || substr($Codigo, $i, 1) > "9")
                 {
                      ImageString ($im, 2, 0, 0, "Código invalido.", $Preto); ;
                      ImageString ($im, 2, 0, 10, "Só aceita números !", $Preto); ;
                      ImageJPEG ($im, $Path . $Arq . ".jpg", $Qualidade);
                      $Alt = $Altura;
                      $Larg = $Largura;
                      return ;
                 }
            }

// Cálculo do dígito de controle
            $soma1 = 0 ;
            $soma2 = 0 ;
            $controle = 1 ;

            for ($i = 0; $i <= 10; $i++)
            {
                 $num = substr($Codigo, $i, 1);
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
            $Codigo = $Codigo . $DV;

// Cria Array de $Codigo
            for ($i = 1; $i <= 12; $i++)
            {
                 $c[$i] = substr($Codigo, $i-1, 1);
            }

// Define tabela dos códigos
            $esquerda[0] = "0001101";
            $esquerda[1] = "0011001";
            $esquerda[2] = "0010011";
            $esquerda[3] = "0111101";
            $esquerda[4] = "0100011";
            $esquerda[5] = "0110001";
            $esquerda[6] = "0101111";
            $esquerda[7] = "0111011";
            $esquerda[8] = "0110111";
            $esquerda[9] = "0001011";
            $direita[0] = "1110010";
            $direita[1] = "1100110";
            $direita[2] = "1101100";
            $direita[3] = "1000010";
            $direita[4] = "1011100";
            $direita[5] = "1001110";
            $direita[6] = "1010000";
            $direita[7] = "1000100";
            $direita[8] = "1001000";
            $direita[9] = "1110100";

// Gera string para dezenho
            $barbit = "101"; // Guarda Inicial
            for ($i = 0; $i <= 5; $i++) // 6 primiros digitos
            {
                 $num = substr($Codigo, $i, 1);
                 $barbit = $barbit . $esquerda[$num] ;
            }
            $barbit = $barbit . "01010"; // Guarda do meio
            for ($i = 6; $i <= 11; $i++) //   6 digitos restantes
            {
                 $num = substr($Codigo, $i, 1);
                 $barbit = $barbit . $direita[$num];
            }
            $barbit = $barbit . "101"; // Guarda Final

// Imagem tamanho 1
            if ($Tamanho == 1)
            {
                $start = 8;
                $barbit = $barbit . "0";
                for ($i = 0; $i < strlen($barbit) ; $i++)
                {
                     $end = $start + 2;
                     $bit = substr($barbit, $i, 1);
                     if ($bit == 0)
                     {
                         Imagefilledrectangle ($im, $start, 0, $end, 66, $Branco);
                     }
                     else
                     {
                         Imagefilledrectangle ($im, $start, 0, $end, 66, $Preto);
                     }
                     $start = $end;
                 }
                 Imagefilledrectangle ($im, 208, 0, 210, 66, $Branco);
                 Imagefilledrectangle ($im, 29, 52, 98, 66, $Branco);
                 Imagefilledrectangle ($im, 108, 52, 177, 66, $Branco);
                 Imagefilledrectangle ($im, 0, 60, 210, 66, $Branco);
                 ImageString ($im, 2, 2, 44, $c[1], $Preto);
                 ImageString ($im, 2, 36, 52, "$c[2] $c[3] $c[4] $c[5] $c[6]", $Preto);
                 ImageString ($im, 2, 115, 52, "$c[7] $c[8] $c[9] $c[10] $c[11]", $Preto);
                 ImageString ($im, 2, 201, 44, $c[12], $Preto);
            }

// Imagem tamanho 2
            if ($Tamanho == 2)
            {
                $start = 14;
                for ($i = 0; $i < strlen($barbit) ; $i++)
                {
                     $end = $start + 3;
                     $bit = substr($barbit, $i, 1);
                     if ($bit == 0)
                     {
                         Imagefilledrectangle ($im, $start, 0, $end, 100, $Branco);
                     }
                     else
                     {
                         Imagefilledrectangle ($im, $start, 0, $end, 100, $Preto);
                     }
                     $start = $end;
                }
                Imagefilledrectangle ($im, 299, 0, 313, 100, $Branco);
                Imagefilledrectangle ($im, 44, 80, 148, 100, $Branco);
                Imagefilledrectangle ($im, 163, 80, 267, 100, $Branco);
                Imagefilledrectangle ($im, 0, 92, 313, 100, $Branco);
                ImageString ($im, 5, 3, 68, $c[1], $Preto);
                ImageString ($im, 5, 56, 83, "$c[2] $c[3] $c[4] $c[5] $c[6]", $Preto);
                ImageString ($im, 5, 175, 83, "$c[7] $c[8] $c[9] $c[10] $c[11]", $Preto);
                ImageString ($im, 5, 302, 68, $c[12], $Preto);
            }
            ImageJPEG ($im, $Path . $Arq . ".jpg", $Qualidade);
            if (empty($Larg) && empty($Alt))
            {
                $Larg = $Largura ;
                $Alt =  $Altura ;
            }
            else
            {  if (empty($Larg))
               {
                   $Larg = $Largura ;
               }
               if (empty($Alt))
               {
                   $Alt = $Altura ;
               }
               $nimg = $Path . $Arq . ".jpg" ;
               $src = imagecreatefromjpeg("$nimg");
               $im = imagecreate($Larg, $Alt);
               imagecopyresized($im,$src,0,0,0,0,$Larg,$Alt,$Largura,$Altura);
               ImageJPEG ($im, $Path . $Arq . ".jpg", $Qualidade);
               imagedestroy($im);
            }
      }
//    ================================================================

}
?>