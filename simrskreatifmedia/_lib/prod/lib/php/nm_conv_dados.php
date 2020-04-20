<?php
/**
 * $Id: nm_conv_dados.php,v 1.2 2011-05-26 14:30:18 sergio Exp $
 */
//--- Desformata data/hora
function nm_conv_limpa_dado(&$dado, $formato)
{
    if (trim($dado) == "" || empty($formato))
    {
        return ;
    }
    $repl = array();
    $form_trab = strtoupper($formato);
    $dado = substr($dado, 0, strlen($form_trab));
    for ($ix = 0; $ix < strlen($form_trab); $ix ++)
    {
         $car = substr($form_trab, $ix, 1);
         if ($car == "A" || $car == "Y" || $car == "M" || $car == "D" || $car == "H" ||
             $car == "I" || $car == "S")
         { }
         else
         {
             $repl[] = $car;
         }
    }
    foreach ($repl as $cada_repl)
    {
             $dado = str_replace("$cada_repl", "", $dado) ;
    }
    return $dado;
}
//--- Converte data : de um formato ($form_in) para outro ($form_out)
function nm_conv_form_data(&$dt_out, $form_in, $form_out, $replaces = array())
{
    $form_in  = strtoupper($form_in);
    $form_out = strtoupper($form_out);
    $dt_out   = str_replace("/", "", $dt_out) ;
    $dt_out   = str_replace("-", "", $dt_out) ;
    $dt_out   = str_replace(":", "", $dt_out) ;
    $dt_out   = str_replace(".", "", $dt_out) ;
    $form_in  = str_replace("/", "", $form_in) ;
    $form_in  = str_replace("-", "", $form_in) ;
    $form_in  = str_replace(":", "", $form_in) ;
    $form_in  = str_replace(".", "", $form_in) ;
    $form_in  = str_replace("Y", "A", $form_in) ;
    $form_out = str_replace("Y", "A", $form_out) ;
    if (!empty($replaces) && is_array($replaces))
    {
        foreach ($replaces as $char_to_replace)
        {
            $dt_out  = str_replace($char_to_replace, '', $dt_out);
            $form_in = str_replace($char_to_replace, '', $form_in);
        }
    }
    $ano = "" ;
    $mes = "" ;
    $dia = "" ;
    $txt_ano = "" ;
    $txt_mes = "" ;
    $txt_dia = "" ;
    if (trim($dt_out) == "" || empty($dt_out))
    {
        return ;
    }
    for ($conv = 0; $conv < strlen($form_in); $conv ++)
    {
         if (substr($form_in, $conv, 1) == "A")
         {
             $ano .= substr($dt_out, $conv, 1) ;
             $txt_ano .= "A" ;
         }
         if (substr($form_in, $conv, 1) == "M")
         {
             $mes .= substr($dt_out, $conv, 1) ;
             $txt_mes .= "M" ;
         }
         if (substr($form_in, $conv, 1) == "D")
         {
             $dia .= substr($dt_out, $conv, 1) ;
             $txt_dia .= "D" ;
         }
    }
    $dt_out = $form_out;
    $dt_out = str_replace($txt_ano, $ano, $dt_out) ;
    $dt_out = str_replace($txt_mes, $mes, $dt_out) ;
    $dt_out = str_replace($txt_dia, $dia, $dt_out) ;
    return $dt_out;
}

//--- Converte hora : de um formato ($form_in) para outro ($form_out)
function nm_conv_form_hora(&$hh_out, $form_in, $form_out, $replaces = array())
{
    $form_in  = strtoupper($form_in);
    $form_out = strtoupper($form_out);

    /*--- modificado em 22/07/2009 para dar suporte a segundos com casas decimais */
    $hh_out = trim($hh_out);
    if (strpos($hh_out, " ") !== false)
    {
       $hh_out = substr($hh_out, (strpos($hh_out, " ") + 1));
    }

    $hh_out   = str_replace(":", "", $hh_out) ;
    $hh_out   = str_replace("-", "", $hh_out) ;
    $hh_out   = str_replace(".", "", $hh_out) ;
    $form_in  = str_replace(":", "", $form_in) ;
    $form_in  = str_replace("-", "", $form_in) ;
    $form_in  = str_replace(".", "", $form_in) ;
    $form_in  = str_replace("M", "I", $form_in) ;
    $form_out = str_replace("M", "I", $form_out) ;
    if (!empty($replaces) && is_array($replaces))
    {
        foreach ($replaces as $char_to_replace)
        {
            $hh_out  = str_replace($char_to_replace, '', $hh_out);
            $form_in = str_replace($char_to_replace, '', $form_in);
        }
    }
    $hora = "" ;
    $min = "" ;
    $seg = "" ;
    $txt_hora = "" ;
    $txt_min = "" ;
    $txt_seg = "" ;
    if (trim($hh_out) == "" || empty($hh_out))
    {
        return ;
    }
    for ($conv = 0; $conv < strlen($form_in); $conv ++)
    {
         if (substr($form_in, $conv, 1) == "H")
         {
             $hora .= substr($hh_out, $conv, 1) ;
             $txt_hora .= "H" ;
         }
         if (substr($form_in, $conv, 1) == "I")
         {
             $min .= substr($hh_out, $conv, 1) ;
             $txt_min .= "I" ;
         }
         if (substr($form_in, $conv, 1) == "S")
         {
             $seg .= substr($hh_out, $conv, 1) ;
             $txt_seg .= "S" ;
         }
    }
    $hh_out = strtoupper($form_out) ;
    $hh_out = str_replace($txt_hora, $hora, $hh_out) ;
    $hh_out = str_replace($txt_min, $min, $hh_out) ;
    $hh_out = str_replace($txt_seg, $seg, $hh_out) ;
    return $hh_out;
}

//--- Converte data/hora : de um formato ($form_in) para outro ($form_out)
function nm_conv_form_data_hora(&$dt_out, $form_in, $form_out, $replaces = array())
{
    $dt_out = str_replace("/", "", $dt_out) ;
    $dt_out = str_replace("-", "", $dt_out) ;
    $dt_out = str_replace(":", "", $dt_out) ;
    $dt_out = str_replace(";", "", $dt_out) ;
    $dt_out = str_replace("-", "", $dt_out) ;
    $dt_out = str_replace(".", "", $dt_out) ;

    $form_in = str_replace("/", "", $form_in) ;
    $form_in = str_replace("-", "", $form_in) ;
    $form_in = str_replace("y", "A", $form_in) ;
    $form_in = str_replace("Y", "A", $form_in) ;
    $form_in = str_replace(":", "", $form_in) ;
    $form_in = str_replace(";", "", $form_in) ;
    $form_in = str_replace("-", "", $form_in) ;
    $form_in = str_replace(".", "", $form_in) ;

    if (!empty($replaces) && is_array($replaces))
    {
        foreach ($replaces as $char_to_replace)
        {
            $dt_out  = str_replace($char_to_replace, '', $dt_out);
            $form_in = str_replace($char_to_replace, '', $form_in);
        }
    }

    $form_out = str_replace("y", "A", $form_out) ;
    $form_out = str_replace("Y", "A", $form_out) ;
    $ano = "" ;
    $mes = "" ;
    $dia = "" ;
    $hora = "" ;
    $min = "" ;
    $seg = "" ;
    $txt_ano = "" ;
    $txt_mes = "" ;
    $txt_dia = "" ;
    $txt_hora = "" ;
    $txt_min = "" ;
    $txt_seg = "" ;
    if (trim($dt_out) == "" || empty($dt_out))
    {
        return ;
    }
    for ($conv = 0; $conv < strlen($form_in); $conv ++)
    {
         if (substr(strtoupper($form_in), $conv, 1) == "A")
         {
             $ano .= substr($dt_out, $conv, 1) ;
             $txt_ano .= "A" ;
         }
         if (substr(strtoupper($form_in), $conv, 1) == "M")
         {
             $mes .= substr($dt_out, $conv, 1) ;
             $txt_mes .= "M" ;
         }
         if (substr(strtoupper($form_in), $conv, 1) == "D")
         {
             $dia .= substr($dt_out, $conv, 1) ;
             $txt_dia .= "D" ;
         }
         if (substr(strtoupper($form_in), $conv, 1) == "H")
         {
             $hora .= substr($dt_out, $conv, 1) ;
             $txt_hora .= "H" ;
         }
         if (substr(strtoupper($form_in), $conv, 1) == "I")
         {
             $min .= substr($dt_out, $conv, 1) ;
             $txt_min .= "I" ;
         }
         if (substr(strtoupper($form_in), $conv, 1) == "S")
         {
             $seg .= substr($dt_out, $conv, 1) ;
             $txt_seg .= "S" ;
         }
    }
    $dt_out = strtoupper($form_out) ;
    $dt_out = str_replace($txt_ano, $ano, $dt_out) ;
    $dt_out = str_replace($txt_mes, $mes, $dt_out) ;
    $dt_out = str_replace($txt_dia, $dia, $dt_out) ;
    $dt_out = str_replace($txt_hora, $hora, $dt_out) ;
    $dt_out = str_replace($txt_min, $min, $dt_out) ;
    $dt_out = str_replace($txt_seg, $seg, $dt_out) ;
    return $dt_out;
}

//--- Converte data do formato do Usuário  para o formato do Banco de Dados
function nm_conv_data(&$dt_out, $form_in)
{
    $ano = "" ;
    $mes = "" ;
    $dia = "" ;
    $ind_dt = 0 ;
    if (trim($dt_out) == "" || empty($dt_out))
    {
        return ;
    }
    for ($conv = 0; $conv < strlen($form_in) && $ind_dt < strlen(trim($dt_out)); $conv ++)
    {
         if (substr(strtoupper($form_in), $conv, 1) == "A" || substr(strtoupper($form_in), $conv, 1) == "Y")
         {
             $ano .= substr($dt_out, $ind_dt, 1) ;
             $ind_dt ++ ;
         }
         if (substr(strtoupper($form_in), $conv, 1) == "M")
         {
             $mes .= substr($dt_out, $ind_dt, 1) ;
             $ind_dt ++ ;
         }
         if (substr(strtoupper($form_in), $conv, 1) == "D")
         {
             $dia .= substr($dt_out, $ind_dt, 1) ;
             $ind_dt ++ ;
         }
    }
    if (strlen($ano) == 2)
    {
        if ($ano < 25)
        {
            $ano = "20" . $ano ;
        }
        else
        {
            $ano = "19" . $ano ;
        }
    }
    if ($ano == "")
    {
        $ano = "1900" ;
    }
    if ($mes == "")
    {
        $mes = "01" ;
    }
    if ($dia == "")
    {
        $dia = "01" ;
    }
    $dt_out = $ano . "-" . $mes . "-" . $dia ;
    return  $dt_out;
}
//
//--- Converte data do formato do Banco de Dados para o formato do Usuário
function nm_volta_data(&$dt_in, $form_out)
{
    if (trim($dt_in) == "" || empty($dt_in))
    {
        return ;
    }
    $dt_in = str_replace("-", "", $dt_in) ;
    $ano = substr($dt_in, 0, 4) ;
    $mes = substr($dt_in, 4, 2) ;
    $dia = substr($dt_in, 6, 2) ;
    $ind_ano = 0 ;
    $ind_mes = 0 ;
    $ind_dia = 0 ;
    $dt_in = "" ;
    for ($conv = 0; $conv < strlen($form_out); $conv ++)
    {
         if (substr(strtoupper($form_out), $conv, 1) == "A" || substr(strtoupper($form_out), $conv, 1) == "Y")
         {
             $dt_in .= substr($ano, $ind_ano, 1) ;
             $ind_ano ++ ;
         }
         if (substr(strtoupper($form_out), $conv, 1) == "M")
         {
             $dt_in .= substr($mes, $ind_mes, 1) ;
             $ind_mes ++ ;
         }
         if (substr(strtoupper($form_out), $conv, 1) == "D")
         {
             $dt_in .= substr($dia, $ind_dia, 1) ;
             $ind_dia ++ ;
         }
   }
   if ($dt_in * 1 == 0)
   {
       $dt_in = "" ;
   }
   return $dt_in;
}


//--- Converte hora do formato do Usuário  para o formato do Banco de Dados

function nm_conv_hora(&$hora_out, $form_in)
{
    $hora = "" ;
    $min = "" ;
    $seg = "" ;
    $decim = "" ;
    $ind_hora = 0 ;
    $form_in = strtoupper($form_in);
    if (trim($hora_out) == "" || empty($hora_out))
    {
        return ;
    }
    for ($conv = 0; $conv < strlen($form_in) && $ind_hora < strlen(trim($hora_out)); $conv ++)
    {
         if (substr(strtoupper($form_in), $conv, 1) == "H")
         {
             $hora .= substr($hora_out, $ind_hora, 1) ;
             $ind_hora ++ ;
         }
         if (substr(strtoupper($form_in), $conv, 1) == "I" || substr(strtoupper($form_in), $conv, 1) == "M")
         {
             $min .= substr($hora_out, $ind_hora, 1) ;
             $ind_hora ++ ;
         }
         if (substr(strtoupper($form_in), $conv, 1) == "S")
         {
             if (strlen($seg) == 2)
             {
                 $seg .= "." ;
             }
             $seg .= substr($hora_out, $ind_hora, 1) ;
             $ind_hora ++ ;
         }
         if (substr(strtoupper($form_in), $conv, 1) == "D")
         {
             $decim .= substr($hora_out, $ind_hora, 1) ;
             $ind_hora ++ ;
         }
    }
	// ver com Sergio
	// campo segundo formatava como ss.mmm caso viesse com milisegundo e logo abaixo concatenava milisegundos de novo.
	// por isso esta agora separando segundos de milisegundos e atribuindo as variaveis
	if (false !== strpos($seg, '.'))
	{
		$parts = explode('.', $seg);
		$seg   = $parts[0];
		$decim = $parts[1];
	}
    if ($hora == "")
    {
        $hora = "00" ;
    }
    if ($min == "")
    {
        $min = "00" ;
    }
    if ($seg == "")
    {
        $seg = "00" ;
    }
    if ($decim == "")
    {
        $decim = "000" ;
    }
    $hora_out = $hora . ":" . $min . ":" . $seg . ":" . $decim ;
    return $hora_out;
}

//
//--- Converte hora do formato do Banco de Dados para o formato do Usuário
function nm_volta_hora(&$hora_in, $form_out)
{
    if (trim($hora_in) == "" || empty($hora_in))
    {
        return ;
    }
/*--- modificado em 22/07/2009 para dar suporte a segundos com casas decimais
    $sincr = strpos($hora_in, ":") ;
    $hora_in = str_replace(":", "", $hora_in) ;
    $hora = substr($hora_in, $sincr - 2, 2) ;
    $min = substr($hora_in, $sincr, 2) ;
    $seg = substr($hora_in, $sincr + 2, 2) ;
    $decim = substr($hora_in, $sincr + 4, 3) ;
*/
    $hora_in = trim($hora_in);
    $sincr = strpos($hora_in, " ") ;
    if ($sincr !== false)
    {
       $hora_in = substr($hora_in, ($sincr + 1));
    }

    $hora_in = str_replace(".", "", $hora_in) ;
    $temp    = explode(":", $hora_in);
    $hora    = (isset($temp[0])) ? $temp[0] : "00";
    $min     = (isset($temp[1])) ? $temp[1] : "00";
    $seg     = (isset($temp[2])) ? $temp[2] : "00";
    $decim   = (isset($temp[3])) ? $temp[3] : "000";

    $ind_hora  = 0 ;
    $ind_min   = 0 ;
    $ind_seg   = 0 ;
    $ind_decim = 0 ;
    $hora_in   = "" ;
    $form_out = strtoupper($form_out);
    for ($conv = 0; $conv < strlen($form_out); $conv ++)
    {
         if (substr(strtoupper($form_out), $conv, 1) == "H")
         {
             $hora_in .= substr($hora, $ind_hora, 1) ;
             $ind_hora ++ ;
         }
         if (substr(strtoupper($form_out), $conv, 1) == "I" || substr(strtoupper($form_out), $conv, 1) == "M")
         {
             $hora_in .= substr($min, $ind_min, 1) ;
             $ind_min ++ ;
         }
         if (substr(strtoupper($form_out), $conv, 1) == "S")
         {
             $hora_in .= substr($seg, $ind_seg, 1) ;
             $ind_seg ++ ;
         }
         if (substr(strtoupper($form_out), $conv, 1) == "D")
         {
             $hora_in .= substr($decim, $ind_decim, 1) ;
             $ind_decim ++ ;
         }
    }
/*--- comentado em 23/03/2007 porque quando a hora é 00:00 estava limpando
    if ($hora_in * 1 == 0)
    {
        $hora_in = "" ;
    }
*/
    return $hora_in;
}

//--- Converte DATAHORA do formato do Usuário  para o formato do Banco de Dados

function nm_conv_data_hora(&$dt_out, $form_in)
{
    $ano = "" ;
    $mes = "" ;
    $dia = "" ;
    $hora = "" ;
    $min = "" ;
    $seg = "" ;
    $decim = "" ;
    $ind_dt = 0 ;
    $separador = 0;
    if (trim($dt_out) == "" || empty($dt_out))
    {
        return ;
    }

    for ($conv = 0; $conv < strlen($form_in) && $ind_dt < strlen(trim($dt_out)); $conv ++)
    {
         if (substr($form_in, $conv, 1) == ";")
         {
             $separador = 1 ;
         }
        if (substr($dt_out, $ind_dt, 1) == " ")
        {
            if ($separador == 0)
            {
                break;
            }
            else
            {
                $ind_dt ++ ;
            }
        }
        if ($separador == 0 )
        {
            if (substr(strtoupper($form_in), $conv, 1) == "A" || substr(strtoupper($form_in), $conv, 1) == "Y")
            {
               $ano .= substr($dt_out, $ind_dt, 1) ;
               $ind_dt ++ ;
            }
            if (substr(strtoupper($form_in), $conv, 1) == "M")
            {
                $mes .= substr($dt_out, $ind_dt, 1) ;
                $ind_dt ++ ;
            }
            if (substr(strtoupper($form_in), $conv, 1) == "D")
            {
                $dia .= substr($dt_out, $ind_dt, 1) ;
                $ind_dt ++ ;
            }
        }
        else
        {
            if (substr(strtoupper($form_in), $conv, 1) == "H")
            {
                $hora .= substr($dt_out, $ind_dt, 1) ;
                $ind_dt ++ ;
            }
            if (substr(strtoupper($form_in), $conv, 1) == "I" || substr(strtoupper($form_in), $conv, 1) == "M")
            {
                $min .= substr($dt_out, $ind_dt, 1) ;
                $ind_dt ++ ;
            }
            if (substr(strtoupper($form_in), $conv, 1) == "S")
            {
                $seg .= substr($dt_out, $ind_dt, 1) ;
                $ind_dt ++ ;
            }
            if (substr(strtoupper($form_in), $conv, 1) == "D")
            {
                $decim .= substr($dt_out, $ind_dt, 1) ;
                $ind_dt ++ ;
            }
        }
    }
    if (strlen($ano) == 2)
    {
        if ($ano < 25)
        {
            $ano = "20" . $ano ;
        }
        else
        {
            $ano = "19" . $ano ;
        }
    }
    if ($ano == "")
    {
        $ano = "1900" ;
    }
    if ($mes == "")
    {
        $mes = "01" ;
    }
    if ($dia == "")
    {
        $dia = "01" ;
    }
    if ($hora == "")
    {
        $hora = "00" ;
    }
    if ($min == "")
    {
        $min = "00" ;
    }
    if ($seg == "")
    {
        $seg = "00" ;
    }
    if ($decim == "")
    {
        $decim = "000" ;
    }
    $dt_out = $ano . "-" . $mes . "-" . $dia . " " . $hora . ":" . $min . ":" . $seg . ":" . $decim ;
    return $dt_out;
}

//--- Converte Imagens lidas pelo ODBC do ACCESS
function nm_conv_img_access($img_access)
{
    $newImage = "";
    for($it=0; $it<strlen($img_access); $it++)
    {
       $newImage .= trim($img_access{$it});
    }
    return $newImage;
}
?>