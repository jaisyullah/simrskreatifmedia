<?php
/**
 * $Id: nm_extenso.php,v 1.1.1.1 2011-05-12 20:31:29 diogo Exp $
 */
/*     Componente para geração de valor por extenso.

       Propriedade: NETMAKE - Soluções em Informática Ltda.
                    www.netmake.com.br
       Dezembro/2000.
 */
 //
 //---- Variaveis Globais ----------------------------------------------------
 //
 $nm_ext_und  = array() ;
 $nm_ext_dez1 = array() ;
 $nm_ext_dez2 = array() ;
 $nm_ext_cent = array() ;
 $nm_ext_parte1 = ""    ;
 $nm_ext_parte2 = ""    ;
 $nm_ext_parte3 = ""    ;
 $nm_ext_tam1 = 0       ;
 $nm_ext_tam2 = 0       ;
 $nm_ext_tam3 = 0       ;
 $nm_ext_valtrab = ""   ;
 $nm_ext_ini = 0   ;
 $nm_tp_numero = 0 ;

 //
 //---- Inicializa tabela ---------------------------------------------------
 //
 function nm_ext_inicial()
 {
    global $nm_ext_und, $nm_ext_dez1, $nm_ext_dez2, $nm_ext_cent ;

    $nm_ext_und[1] = "2000UM"       ;
    $nm_ext_und[2] = "2200DOIS"     ;
    $nm_ext_und[3] = "4000TRES"     ;
    $nm_ext_und[4] = "3300QUATRO"   ;
    $nm_ext_und[5] = "3200CINCO"    ;
    $nm_ext_und[6] = "2200SEIS"     ;
    $nm_ext_und[7] = "2200SETE"     ;
    $nm_ext_und[8] = "2200OITO"     ;
    $nm_ext_und[9] = "2200NOVE"     ;

    $nm_ext_dez1[0] = "3000DEZ"      ;
    $nm_ext_dez1[1] = "2200ONZE"     ;
    $nm_ext_dez1[2] = "2200DOZE"     ;
    $nm_ext_dez1[3] = "3200TREZE"    ;
    $nm_ext_dez1[4] = "3320QUATORZE" ;
    $nm_ext_dez1[5] = "4200QUINZE"   ;
    $nm_ext_dez1[6] = "2322DEZESSEIS";
    $nm_ext_dez1[7] = "2322DEZESSETE";
    $nm_ext_dez1[8] = "2320DEZOITO"  ;
    $nm_ext_dez1[9] = "2222DEZENOVE" ;

    $nm_ext_dez2[2] = "3200VINTE"    ;
    $nm_ext_dez2[3] = "4200TRINTA"   ;
    $nm_ext_dez2[4] = "3320QUARENTA" ;
    $nm_ext_dez2[5] = "3420CINQUENTA";
    $nm_ext_dez2[6] = "3320SESSENTA" ;
    $nm_ext_dez2[7] = "2320SETENTA"  ;
    $nm_ext_dez2[8] = "2320OITENTA"  ;
    $nm_ext_dez2[9] = "2320NOVENTA"  ;

    $nm_ext_cent[1] = "3200CENTO"    ;
    $nm_ext_cent[2] = "2330DUZENTOS" ;
    $nm_ext_cent[3] = "3330TREZENTOS";
    $nm_ext_cent[4] = "3333QUATROCENTOS" ;
    $nm_ext_cent[5] = "3430QUINHENTOS"   ;
    $nm_ext_cent[6] = "2233SEISCENTOS"   ;
    $nm_ext_cent[7] = "2233SETECENTOS"   ;
    $nm_ext_cent[8] = "2233OITOCENTOS"   ;
    $nm_ext_cent[9] = "2233NOVECENTOS"   ;
 }
 //
 //---- Arma extenso ------------------------------------------------------------
 //
 function nm_ext_arma($Num, $Tipo)
 {
    global $nm_ext_und, $nm_ext_dez1, $nm_ext_dez2, $nm_ext_cent, $nm_ext_valtrab, $nm_ext_parte1, $nm_ext_ini, $nm_tp_numero ;
    $E = 0  ;

    if ($Tipo == "0")
     {  $E = 0 ;
        if ($nm_ext_valtrab >  .99)
         {  $E = 1 ; }
     }
    // --- Centena
    If ($nm_ext_ini == 0 && $Num == "001" && $nm_tp_numero == 0)
     {  nm_ext_monta("1000H") ;}
    If ($Num == "100")
      { nm_ext_monta("3100CEM ") ; }
    ElseIf (substr($Num,0, 1) != "0")
         {  nm_ext_monta($nm_ext_cent[substr($Num, 0, 1)] ) ;
            nm_ext_monta("1000 ") ;
            $E = 1 ; }

    // --- dezena
    If (substr($Num,1, 1) != "0")
     { if ($E == 1)
        {  nm_ext_monta("1100E ") ; }
        if (substr($Num,1, 1) == "1")
         {  nm_ext_monta ($nm_ext_dez1[substr($Num, 2, 1)] ) ;
            nm_ext_monta("1000 ") ; }
       else
         {  nm_ext_monta ($nm_ext_dez2[substr($Num, 1, 1)] ) ;
            nm_ext_monta("1000 ") ;
            $E = 1 ;  }
     }

    // --- Unidade
    If (substr($Num,2, 1) != "0" && substr($Num,1,1) != "1")
     {  if ($E == 1)
        {  nm_ext_monta("1100E ") ; }
        nm_ext_monta ($nm_ext_und[substr($Num, 2, 1)] ) ;
        nm_ext_monta("1000 ") ; }

    // -------- Controle dos Milhões
    If ($Tipo == 3)
     {  If ($Num == "001")
          { nm_ext_monta("2400MILHAO") ; }
        Else
          { nm_ext_monta("2500MILHOES") ; }
        If (substr($nm_ext_valtrab,3, 3) != "000" && substr($nm_ext_valtrab,6, 3) != "000")
          { nm_ext_monta("1100, ") ; }
        ElseIf (substr($nm_ext_valtrab,3, 3) == "000" && substr($nm_ext_valtrab,6, 3) == "000")
             {  nm_ext_monta("1210 DE ") ; }
            Else
              { nm_ext_monta("1100, ")   ; }
     }
    // -------- Controle dos Milhares
    If ($Tipo == 2)
     {  If ($Num != "000")
          { nm_ext_monta("3000MIL") ; }
        If (substr($nm_ext_valtrab,6, 3) == "000")
          { nm_ext_monta("1000 ")    ; }
        elseif (substr($nm_ext_valtrab,6,1) != "0" && (substr($nm_ext_valtrab,7,1) != "0" || substr($nm_ext_valtrab,8,1) != "0") )
             {  nm_ext_monta("1100, ")   ; }
            else
             {  nm_ext_monta("1110 E ") ;  }
     }
    // -------- Controle dos Centavos
    If ($Tipo == 0)
     {  If ($Num == "001")
          { nm_ext_monta("3221CENTAVO ") ; }
        else
          { nm_ext_monta("3231CENTAVOS ") ; }
     }
 }
 //
 //---- Monta string de saida ------------------------------------------------
 //
 function nm_ext_monta($Teor)
 {
    global $nm_ext_parte1, $nm_ext_parte2, $nm_ext_parte3,
           $nm_ext_tam1, $nm_ext_tam2, $nm_ext_tam3, $nm_ext_ini ;
    $Tam = 0     ;
    $Parte = 0  ;
    $Y = 4 ;
    $X = 0  ;
    $Silaba = 0 ;

    $nm_ext_ini = 1  ;

    while ($X < 4 && ($nm_ext_tam1 + $nm_ext_tam2 + $nm_ext_tam3) != 0)
     {  if ($nm_ext_tam1 != 0)
         {  $Tam = "nm_ext_tam1" ;
            $Parte = "nm_ext_parte1" ; }
        elseif ($nm_ext_tam2 != 0)
            {  $Tam = "nm_ext_tam2" ;
               $Parte = "nm_ext_parte2" ; }
            else
              {  $Tam = "nm_ext_tam3" ;
                 $Parte = "nm_ext_parte3" ; }
        $Silaba = substr($Teor, $X, 1)  ;
        if ($Silaba != "0")
         { if ($$Tam >= $Silaba)
            { if (strlen($$Parte) == 0 && substr($Teor, $Y, $Silaba) == " ")
               {  $Y = $Y + $Silaba ;
                  $X++ ;   }
               else
               {  $$Parte = $$Parte . substr($Teor, $Y, $Silaba) ;
                  $$Tam = $$Tam - $Silaba ;
                  $Y = $Y + $Silaba ;
                  $X++ ;   }
             }
           else
             { $$Tam = 0 ;
               if ($X != 0)
                {  $$Parte = $$Parte . "-"  ; }
             }
         }
        else
           { $X++ ;  }
     }
 }
 //
 //---- Controle Geral -------------------------------------------------------
 //
 function nm_extenso($Valor, $Linha1, $Linha2, $Linha3, &$Ext1, &$Ext2, &$Ext3, $Tipo="")
 {
    global $nm_ext_parte1, $nm_ext_parte2, $nm_ext_parte3, $nm_ext_tam1, $nm_ext_tam2,
           $nm_ext_tam3, $nm_ext_valtrab, $nm_ext_und, $nm_ext_ini, $nm_tp_numero ;

    if (nm_reg_prod() != "NmScriptCaseAplOk")
    {
        return ;
    }
    $vl_negativ = false;
    if ($Valor < 0)
    {
        $Valor = $Valor * -1;
        $vl_negativ = true;
    }
    nm_ext_inicial()   ;
    $nm_ext_tam1 = $Linha1  ;
    $nm_ext_tam2 = $Linha2  ;
    $nm_ext_tam3 = $Linha3  ;
    $nm_ext_parte1 = ""   ;
    $nm_ext_parte2 = ""   ;
    $nm_ext_parte3 = ""   ;

    if (strlen($Valor) > 12)
    {
       $Ext1 = "** VALOR INFORMADO SUPERIOR AO PERMITIDO **" ;
       $Ext2 = "" ;
       $Ext3 = "" ;
       return false ;
    }

    $nm_tp_numero = 0 ;
    if (!empty($Tipo))
    {
        if (strtolower(substr($Tipo, 0, 1)) == "n")
        {
            $nm_tp_numero = 1;
        }
    }
    else
    {
        $ponto = strpos($Valor, ".") ;
        if ($ponto === false)
        {
           $nm_tp_numero = 1;
        }
    }
    $Valor = (string) $Valor;
    $nm_ext_valtrab = sprintf ("%01.2f", $Valor);
    if ($Valor != $nm_ext_valtrab)
    {
       $Ext1 = "** ERRO NO VALOR INFORMADO **" ;
       $Ext2 = "" ;
       $Ext3 = "" ;
       return false ;
    }
    if (strlen($nm_ext_valtrab) < 12)
    {
        $nm_ext_valtrab = str_repeat("0", 12 - strlen($nm_ext_valtrab) ) . $nm_ext_valtrab;
    }
    $nm_ext_ini = 0  ;

    // --- Milhões
    if (substr($nm_ext_valtrab,0,3) != "000")
    {
        nm_ext_arma(substr($nm_ext_valtrab,0,3), "3") ;
    }
    // --- Milhares
    if (substr($nm_ext_valtrab,3,3) != "000")
    {
        nm_ext_arma(substr($nm_ext_valtrab,3,3), "2") ;
    }
    // --- Centena
    if (substr($nm_ext_valtrab,6,3) != "000")
    {
        nm_ext_arma(substr($nm_ext_valtrab,6,3), "1") ;
    }
    if ($nm_tp_numero == 0)
    {  // --- Tipo da Moeda
        if ($nm_ext_valtrab > 1.99)
        {
            nm_ext_monta("2310REAIS ") ;
        }
        elseif ($nm_ext_valtrab > .99)
        {
            nm_ext_monta("2210REAL ");
        }
        // --- Centavos
        if (substr($nm_ext_valtrab,10,2) != "00")
        {
            nm_ext_arma( "0" . substr($nm_ext_valtrab,10,2), "0") ;
        }
    }
   // --- Saida
    if ($nm_ext_tam1 != 0)
    {
/*        $Ext1 = $nm_ext_parte1 . str_repeat ("*", $nm_ext_tam1 ) ; */
        $Ext1 = $nm_ext_parte1 ;
    }
    else
    {
        $Ext1 = $nm_ext_parte1 ;
    }
    if ($nm_ext_tam2 != 0)
    {
/*        $Ext2 = $nm_ext_parte2 . str_repeat ("*", $nm_ext_tam2 ) ; */
        $Ext2 = $nm_ext_parte2 ;
    }
    else
    {
         $Ext2 = $nm_ext_parte2 ;
    }
    if ($nm_ext_tam3 != 0)
    {
/*      $Ext3 = $nm_ext_parte3 . str_repeat ("*", $nm_ext_tam3 ) ; */
       $Ext3 = $nm_ext_parte3 ;
    }
    else
    {
       $Ext3 = $nm_ext_parte3 ;
    }
    $saida_final = $Ext1 ;
    if (!empty($Ext2))
    {
        $saida_final .= "<br />" . $Ext2 ;
    }
    if (!empty($Ext3))
    {
        $saida_final .= "<br />" . $Ext3 ;
    }
    if ($vl_negativ)
    {
        if (!empty($Ext3))
        {
            $Ext3 .= "NEGATIVO";
        }
        elseif (!empty($Ext2))
        {
            $Ext2 .= "NEGATIVO";
        }
        else
        {
            $Ext1 .= "NEGATIVO";
        }
        $saida_final .= "NEGATIVO";
    }
    return $saida_final;
 }
?>