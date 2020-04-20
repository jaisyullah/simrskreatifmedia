<?php
/**
 * $Id: nm_data.class.php,v 1.2 2011-06-20 14:31:34 diogo Exp $
 */
/*******************************************************************
 * Script Case
 *------------------------------------------------------------------
 * Arquivo  : nm_data.class.php
 * Modulo   : Biblioteca
 * Criacao  : 09.01.2002
 * Alteracao: 09.01.2002
 *------------------------------------------------------------------
 * Classe para tratamento de datas
 *------------------------------------------------------------------
 * © NetMake Solucoes em Informatica Ltda
 *******************************************************************/

class nm_data
{
    var $mAno;
    var $mMes;
    var $mDia;
    var $mHora;
    var $mMin;
    var $mSeg;

    var $mIdioma;

    var $mTipo;

    var $mSeparador = "@?#?@";

    function __construct($idioma = "port")
    {
        $this->SetaIdioma($idioma);
    }

    function SetaData($datahora, $formato)
    {
        $lData    = $this->LimpaData($datahora);
        $lForm    = $this->LimpaFormato($formato);
        $str_ano  = "";
        $str_mes  = "";
        $str_dia  = "";
        $str_hora = "";
        $str_min  = "";
        $str_seg  = "";
        if ("SEC" == strtoupper($formato) || "MIN" == strtoupper($formato) || "HOR" == strtoupper($formato))
        {
            $this->mTipo = "qtd";
            $str_mes     = "00";
            $str_ano     = "0000";
            if ("SEC" == strtoupper($formato))
            {
                list($val_min, $str_seg)  = $this->ValSeg($datahora);
                list($val_hor, $str_min)  = $this->ValMin($val_min);
                list($str_dia, $str_hora) = $this->ValHor($val_hor);
            }
            elseif ("MIN" == strtoupper($formato))
            {
                list($val_hor, $str_min)  = $this->ValMin($datahora);
                list($str_dia, $str_hora) = $this->ValHor($val_hor);
                $str_seg = "00";
            }
            else
            {
                list($str_dia, $str_hora) = $this->ValHor($datahora);
                $str_min = "00";
                $str_seg = "00";
            }
        }
        else
        {
            $this->mTipo = "val";
            $str_form = str_replace('A', 'Y', strtoupper($formato));
            for ($i = 0; $i < strlen($str_form); $i++)
            {
                $char_form = substr($str_form, $i, 1);
                $char_data = substr($datahora, $i, 1);
                switch (strtoupper($char_form))
                {
                    case "Y":
                        $str_ano .= $char_data;
                    break;
                    case "M":
                        $str_mes .= $char_data;
                    break;
                    case "D":
                        $str_dia .= $char_data;
                    break;
                    case "H":
                        $str_hora .= $char_data;
                    break;
                    case "I":
                        $str_min .= $char_data;
                    break;
                    case "S":
                        $str_seg .= $char_data;
                    break;
                    case ".":
                        $str_seg .= $char_data;
                    break;
                }
            }
            if ("" == $str_seg)  { $str_seg  = "00";   }
            if ("" == $str_min)  { $str_min  = "00";   }
            if ("" == $str_hora) { $str_hora = "00";   }
            if ("" == $str_dia)  { $str_dia  = "00";   }
            if ("" == $str_mes)  { $str_mes  = "00";   }
            if ("" == $str_ano)  { $str_ano  = "0000"; }
            if (2 == strlen($str_ano))
            {
                if ("25" > $str_ano)
                {
                    $str_ano = "20" . $str_ano;
                }
                else
                {
                    $str_ano = "19" . $str_ano;
                }
            }
        }
        $this->SetaValores($str_ano, $str_mes, $str_dia, $str_hora, $str_min, $str_seg);
    }

    function SetaValores($ano, $mes, $dia, $hora, $min, $seg)
    {
/*        $this->mAno  = (int) $ano; */
        $this->mAno  = $ano;
        $this->mMes  = (int) $mes;
        $this->mDia  = (int) $dia;
        $this->mHora = (int) $hora;
        $this->mMin  = (int) $min;
/*        $this->mSeg  = (int) $seg; alt. para permitir decimais nos segundos */
        $this->mSeg  = $seg;
    }

    function FormataSaida($str_format)
    {
        $sep_ini    = substr($this->mSeparador, 0, 1);
        $sep_tam    = strlen($this->mSeparador);
        $sep_fim    = substr($this->mSeparador, 1, $sep_tam - 1);
        $str_format = str_replace("\\", $this->mSeparador, $str_format);
        if ('SEC' == strtoupper($str_format) || 'MIN' == strtoupper($str_format) || 'HOR' == strtoupper($str_format))
        {
            $str_format = strtoupper($str_format);
        }
        $str_result = "";
        if (('SEC' == $str_format) || ('MIN' == $str_format) || ('HOR' == $str_format))
        {
            $str_result = 0;
            if ('HOR' == $str_format || 'MIN' == $str_format || 'SEC' == $str_format)
            {
                $str_result = ($this->mDia * 24) + $this->mHora;
            }
            if ('MIN' == $str_format || 'SEC' == $str_format)
            {
                $str_result = ($str_result * 60) + $this->mMin;
            }
            if ('SEC' == $str_format)
            {
                $str_result = ($str_result * 60) + $this->mSeg;
            }
        }
        else
        {
            for ($i = 0; $i < strlen($str_format); $i++)
            {
                $char = substr($str_format, $i, 1);
                switch ($char)
                {
                    //---------- HORA
                    case "H":     // 00 - 23
                        $str_result .= (10 > $this->mHora) ? ("0" . $this->mHora) : $this->mHora;
                    break;
                    case "h":     // 01 - 12
                        $hora_temp   = (12 < $this->mHora) ? ($this->mHora - 12) : $this->mHora;
                        $str_result .= (10 > $hora_temp)   ? ("0" . $hora_temp)  : $hora_temp;
                    break;
                    case "G":     // 0 - 23
                        $str_result .= $this->mHora;
                    break;
                    case "g":     // 1 - 12
                        $str_result .= (12 < $this->mHora) ? ($this->mHora - 12) : $this->mHora;
                    break;
                    case "A":     // AM - PM
                        $str_result .= (11 < $this->mHora) ? "PM" : "AM";
                    break;
                    case "a":     // am - pm
                        $str_result .= (11 < $this->mHora) ? "pm" : "am";
                    break;
                    //---------- MINUTO
                    case "i":     // 00 - 59
                        $str_result .= (10 > $this->mMin) ? ("0" . $this->mMin) : $this->mMin;
                    break;
                    //---------- SEGUNDO
                    case "s":     // 00 - 59
/*                        $str_result .= (10 > $this->mSeg) ? ("0" . $this->mSeg) : $this->mSeg; alt. para permitir decimais nos segundos*/
                        $str_result .= (strlen($this->mSeg) < 2) ? ("0" . $this->mSeg) : $this->mSeg;
                    break;
                    //---------- DIA
                    case "d":     // No Mes: 01 - 31
                        $str_result .= (10 > $this->mDia) ? ("0" . $this->mDia) : $this->mDia;
                    break;
                    case "j":     // No Mes: 1 - 31
                        $str_result .= $this->mDia;
                    break;
                    case "w":     // Na Semana: numero
                        $str_result .= $this->DiaSemana("num");
                    break;
                    case "D":     // Na Semana: abreviado
                        $str_result .= $this->DiaSemana("abr");
                    break;
                    case "l":     // Na Semana: inteiro
                        $str_result .= $this->DiaSemana();
                    break;
                    case "z":     // No ano: 0 - 365
                        $str_result .= $this->DiaAno();
                    break;
                    //---------- MES
                    case "m":     // 01 - 12
                        $str_result .= (10 > $this->mMes) ? ("0" . $this->mMes) : $this->mMes;
                    break;
                    case "n":     // 1 - 12
                        $str_result .= $this->mMes;
                    break;
                    case "M":     // Extenso abreviado
                        $str_result .= $this->MesExtenso("abr");
                    break;
                    case "F":     // Extenso inteiro
                        $str_result .= $this->MesExtenso();
                    break;
                    case "t":     // Dias no mes
                        $str_result .= $this->DiasNoMes();
                    break;
                    //---------- ANO
                    case "Y":     // 4 digitos
                        $str_result .= $this->mAno;
                    break;
                    case "y":     // 2 digitos
                        if (0 != $this->mAno)
                        {
                            $str_result .= substr($this->mAno, strlen($this->mAno) - 2, 2);
                        }
                        else
                        {
                            $str_result .= "0";
                        }
                    break;
                    case "L":     // 0 - Ano normal / 1 - Ano Bissexto
                        if ($this->AnoBissexto)
                        {
                            $str_result .= "1";
                        }
                        else
                        {
                            $str_result .= "0";
                        }
                    break;
                    //---------- ACUMULADOR
                    case "#":
                        $char_n = substr($str_format, $i + 1, 1);
                        if ("s" == $char_n)
                        {
                            $str_result .= $this->SegVal();
                            $i++;
                        }
                        elseif ("i" == $char_n)
                        {
                            $str_result .= $this->MinVal();
                            $i++;
                        }
                        elseif ("h" == $char_n)
                        {
                            $str_result .= $this->HorVal();
                            $i++;
                        }
                        elseif ("d" == $char_n)
                        {
                            $str_result .= $this->DiaVal();
                            $i++;
                        }
                        else
                        {
                            $str_result .= "#";
                        }
                    break;
                    //---------- OUTROS CARACTERES
                    case $sep_ini:
                        $char_sep = substr($str_format, $i, $sep_tam);
                        if ($char_sep == $this->mSeparador)
                        {
                            $i     += $sep_tam;
                            $char_n = substr($str_format, $i, 1);
                            if ($char_n == $sep_ini)
                            {
                                $char_sep = substr($str_format, $i, $sep_tam);
                                if ($char_sep == $this->mSeparador)
                                {
                                    $i          += $sep_tam;
                                    $str_result .= "\\";
                                }
                                else
                                {
                                    $str_result .= $sep_ini;
                                }
                            }
                            else
                            {
                                $str_result .= $char_n;
                            }
                        }
                        else
                        {
                            $str_result .= $sep_ini;
                        }
                    break;
                    default:
                        $str_result .= $char;
                    break;
                }
            }
        }
        return ($str_result);
    }

    function SetaIdioma($idioma)
    {
        if ($idioma == "port")
        {
            $idioma = "pt_br";
        }
        if ($idioma == "eng")
        {
            $idioma = "en_us";
        }
        $this->mIdioma = $idioma;
    }

    function LimpaData($data)
    {
        return (preg_replace("/[^0-9]/i", "", $data));
    }

    function LimpaFormato($formato)
    {
        $result = str_replace("/", "", $formato);
        $result = str_replace(".", "", $result);
        $result = str_replace(":", "", $result);
        $result = str_replace(" ", "", $result);
        return ($result);
    }

    function MesExtenso($opcao = "int")
    {
        switch (strtoupper($opcao))
        {
            case "ABR":
                $tipo = "abr";
            break;
            case "INT":
            default:
                $tipo = "int";
            break;
        }
        $mes["en_us"]["int"]  = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $mes["en_us"]["abr"]  = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
        $mes["pt_br"]["int"] = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
        $mes["pt_br"]["abr"] = array("Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez");
        if (isset($_SESSION['scriptcase']['sc_tab_meses'][$tipo]))
        {
            $mes[$this->mIdioma][$tipo] = $_SESSION['scriptcase']['sc_tab_meses'][$tipo];
        }
        return ($mes[$this->mIdioma][$tipo][$this->mMes - 1]);
    }

    function DiaSemana($opcao = "int")
    {
        switch (strtoupper($opcao))
        {
            case "NUM":
                $tipo = "num";
            break;
            case "ABR":
                $tipo = "abr";
            break;
            case "INT":
            default:
                $tipo = "int";
            break;
        }
        $dia_arr["en_us"]["int"]  = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
        $dia_arr["en_us"]["abr"]  = array("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat");
        $dia_arr["pt_br"]["int"] = array("Domingo", "Segunda-Feira", "Terça-Feira", "Quarta-Feira", "Quinta-Feira", "Sexta-Feira", "Sábado");
        $dia_arr["pt_br"]["abr"] = array("Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab");
        if (isset($_SESSION['scriptcase']['sc_tab_dias'][$tipo]))
        {
            $dia_arr[$this->mIdioma][$tipo] = $_SESSION['scriptcase']['sc_tab_dias'][$tipo];
        }
        $dia = $this->mDia;
        $mes = $this->mMes;
        $ano = $this->mAno;
        if($mes > 2)
        {
            $mes -= 2;
        }
        else
        {
            $mes += 10;
            $ano--;
        }
        $dia = (floor((13 * $mes - 1) / 5) + $dia + ($ano % 100) + floor(($ano % 100) / 4) + floor(($ano / 100) / 4) - 2 * floor($ano / 100) + 77);
        $dia_semana = (($dia - 7 * floor($dia / 7)));
        if ("num" == $tipo)
        {
            return ($dia_semana);
        }
        else
        {
            return ($dia_arr[$this->mIdioma][$tipo][$dia_semana]);
        }
    }

    function DiaAno()
    {
        if ((0 == $this->mDia) || (0 == $this->mMes) || (0 == $this->mAno))
        {
            return (0);
        }
        else
        {
            $dia_ano = 0;
            for ($i = 1; $i < $this->mMes; $i++)
            {
                $dia_ano += $this->DiasNoMes($i);
            }
            return ($dia_ano + $this->mDia);
        }
    }

    function AnoBissexto()
    {
        $ano = $this->mAno;
        return ((($ano % 4 == 0) && ($ano % 100 != 0)) || ($ano % 400 == 0));
    }

    function TestaAnoBissexto($ano)
    {
        return ((($ano % 4 == 0) && ($ano % 100 != 0)) || ($ano % 400 == 0));
    }

    function DiasNoMes($mes = "")
    {
        if ("" == $mes)
        {
            $mes = $this->mMes;
        }
        if (0 == $mes)
        {
            return (0);
        }
        else
        {
            if (2 == $mes)
            {
                if ($this->AnoBissexto())
                {
                    return (29);
                }
                else
                {
                    return (28);
                }
            }
            elseif ((4 == $mes) || (6 == $mes) || (9 == $mes) || (11 == $mes))
            {
                return (30);
            }
            else
            {
                return (31);
            }
        }
    }

    function ValSeg($val)
    {
        $val_seg = $val % 60;
        $val_res = floor($val / 60);
        return (array($val_res, $val_seg));
    }

    function ValMin($val)
    {
        $val_min = $val % 60;
        $val_res = floor($val / 60);
        return (array($val_res, $val_min));
    }

    function ValHor($val)
    {
        $val_hor = $val % 24;
        $val_res = floor($val / 24);
        return (array($val_res, $val_hor));
    }

    function SegVal()
    {
        $seg = $this->mSeg;
        if ("qtd" == $this->mTipo)
        {
            $seg += (60 * $this->mMin) + (60 * 60 * $this->mHora) + (24 * 60 * 60 * $this->mDia);
        }
        return ($seg);
    }

    function MinVal()
    {
        $min = $this->mMin;
        if ("qtd" == $this->mTipo)
        {
            $min += (60 * $this->mHora) + (24 * 60 * $this->mDia);
        }
        return ($min);
    }

    function HorVal()
    {
        $hor = $this->mHora;
        if ("qtd" == $this->mTipo)
        {
            $hor += (24 * $this->mDia);
        }
        return ($hor);
    }

    function DiaVal()
    {
        return ($this->mDia);
    }

//-- Calcula quantidade de dias entre duas datas
    function Dif_Datas($str_data1, $str_formato1, $str_data2, $str_formato2)
    {
/*
        global $nm_config;
        if (!function_exists('adodb_mktime') &&
            isset($nm_config) &&
            @is_file($nm_config['path_prod'] . 'third/adodb/adodb-time.inc.php'))
        {
            include_once $nm_config['path_prod'] . 'third/adodb/adodb-time.inc.php';
        }
        if (function_exists('adodb_mktime'))
        {
            $this->SetaData($str_data1, $str_formato1);
            $int_mktime1 = adodb_mktime(0, 0, 0, $this->mMes, $this->mDia, $this->mAno);
            $this->SetaData($str_data2, $str_formato2);
            $int_mktime2 = adodb_mktime(0, 0, 0, $this->mMes, $this->mDia, $this->mAno);
            $result = floor(abs($int_mktime1 - $int_mktime2)/86400);
            if ($int_mktime1 < $int_mktime2)
            {
                $result = $result * -1;
            }
            return $result;
        }
        $this->SetaData($str_data1, $str_formato1);
        $this->mDia = ($this->mDia < 10 ? "0" . $this->mDia : $this->mDia);
        $this->mMes = ($this->mMes < 10 ? "0" . $this->mMes : $this->mMes);
        $temp_data1 = $this->mAno . $this->mMes . $this->mDia;
        $this->SetaData($str_data2, $str_formato2);
        $this->mDia = ($this->mDia < 10 ? "0" . $this->mDia : $this->mDia);
        $this->mMes = ($this->mMes < 10 ? "0" . $this->mMes : $this->mMes);
        $temp_data2 = $this->mAno . $this->mMes . $this->mDia;
        $result = floor((strtotime($temp_data1) - strtotime($temp_data2))/86400);
        return $result;
*/
        $dias_meses = array(1 => 31, 2 => 28, 3 => 31, 4 => 30, 5 => 31, 6 => 30, 7 => 31, 8 => 31, 9 => 30, 10 => 31, 11 => 30, 12 => 31);
        $dias = 0;
        $negativo = -1;
        $this->SetaData($str_data1, $str_formato1);
        if ($this->mDia < 1 || $this->mDia > 31 || $this->mMes < 1 || $this->mMes > 12 || !is_numeric($this->mAno) || strlen($this->mAno) != 4) {
            return false;
        }
        $dia_1 = (strlen($this->mDia) < 2) ? "0" . $this->mDia : $this->mDia;
        $mes_1 = (strlen($this->mMes) < 2) ? "0" . $this->mMes : $this->mMes;
        $ano_1 = $this->mAno;
        $temp_data1 = $ano_1 . $mes_1 . $dia_1;
        $this->SetaData($str_data2, $str_formato2);
        if ($this->mDia < 1 || $this->mDia > 31 || $this->mMes < 1 || $this->mMes > 12 || !is_numeric($this->mAno) || strlen($this->mAno) != 4) {
            return false;
        }
        $dia_2 = (strlen($this->mDia) < 2) ? "0" . $this->mDia : $this->mDia;
        $mes_2 = (strlen($this->mMes) < 2) ? "0" . $this->mMes : $this->mMes;
        $ano_2 = $this->mAno;
        $temp_data2 = $ano_2 . $mes_2 . $dia_2;
        if ($temp_data1 == $temp_data2)
        {
            return $dias;
        }
        if ($temp_data1 > $temp_data2)
        {
            $ano_2 = $ano_1;
            $mes_2 = $mes_1;
            $dia_2 = $dia_1;
            $dia_1 = $this->mDia;
            $mes_1 = $this->mMes;
            $ano_1 = $this->mAno;
            $negativo = 1;
        }
        $mes_1 = (int)$mes_1;
        $dia_1 = (int)$dia_1;
        $mes_2 = (int)$mes_2;
        $dia_2 = (int)$dia_2;
        if ($ano_1 == $ano_2 && $mes_1 == $mes_2)
        {
            $dias = ($dia_2 - $dia_1) * $negativo;
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
        return $dias * $negativo;
    }

//-- Calcula quantidade de dias, meses e anos entre duas datas
    function Dif_Datas_2($str_data1, $str_formato1, $str_data2, $str_formato2, $opcao=1)
    {
        $saida = array();
        $dias_meses = array(1 => 31, 2 => 28, 3 => 31, 4 => 30, 5 => 31, 6 => 30, 7 => 31, 8 => 31, 9 => 30, 10 => 31, 11 => 30, 12 => 31, 13 => 31);
        $this->SetaData($str_data1, $str_formato1);
        if ($this->mDia < 1 || $this->mDia > 31 || $this->mMes < 1 || $this->mMes > 12 || !is_numeric($this->mAno) || strlen($this->mAno) != 4) {
            return false;
        }
        $ano_1 = $this->mAno;
        $mes_1 = $this->mMes;
        $dia_1 = $this->mDia;
        $this->SetaData($str_data2, $str_formato2);
        if ($this->mDia < 1 || $this->mDia > 31 || $this->mMes < 1 || $this->mMes > 12 || !is_numeric($this->mAno) || strlen($this->mAno) != 4) {
            return false;
        }
        $dt_1 = $ano_1 . substr("0" . $mes_1, -2) . substr("0" . $dia_1, -2);
        $dt_2 = $this->mAno . substr("0" . $this->mMes, -2) . substr("0" . $this->mDia, -2);

        if ($dt_2 < $dt_1)
        {
            $ano_2 = $ano_1;
            $mes_2 = $mes_1;
            $dia_2 = $dia_1;
            $ano_1 = $this->mAno;
            $mes_1 = $this->mMes;
            $dia_1 = $this->mDia;
        }
        else
        {
            $ano_2 = $this->mAno;
            $mes_2 = $this->mMes;
            $dia_2 = $this->mDia;
        }
        if ($opcao == 2)
        {
            $dia_1--;
            if ($dia_1 == 0)
            {
                $mes_1--;
                if ($mes_1 == 0)
                {
                    $mes_1 = 12;
                    $ano_1--;
                }
                if (($ano_1 % 4) == 0)
                {
                    $dias_meses[2] = 29;
                }
                $dia_1 = $dias_meses[$mes_1];
                $dias_meses[2] = 28;
            }
        }

        $anos = $ano_2 - $ano_1;
        $meses = 0;
        $dias = 0;
        $ano_1 = $ano_2;
        $dt_2  = $ano_2 . substr("0" . $mes_2, -2) . substr("0" . $dia_2, -2);
        $temp = $ano_2 . substr("0" . $mes_1, -2) . substr("0" . $dia_1, -2);

        if ($temp > $dt_2)
        {
            $anos--;
            $ano_1 = $ano_2 - 1;
        }
        $dia_maior= false;
        if ($dia_1 > $dia_2)
        {
            $dia_maior= true;
            $mes_2--;
            if ($mes_2 == 0)
            {
                $mes_2 = "12";
                $ano_2--;
            }
        }
        $temp = $ano_1 . substr("0" . $mes_1, -2);
        $temp2 = $ano_2 . substr("0" . $mes_2, -2);
        while ($temp < $temp2)
        {
           $meses++;
           $mes_1++;
            if ($mes_1 == 13)
            {
                $mes_1 = 1;
                $ano_1++;
            }
            $temp = $ano_1 . substr("0" . $mes_1, -2);
        }
        if (!$dia_maior)
        {
            $dias = $dia_2 - $dia_1;
        }
        else
        {
           if (($ano_1 % 4) == 0)
           {
              $dias_meses[2] = 29;
           }
           $dias = ($dias_meses[$mes_1] - $dia_1) + $dia_2;
        }
        if ($dias != 0 && $dias == $dias_meses[$mes_1 + 1])
        {
            $dias = 0;
            $meses++;
            if ($meses == 12)
            {
                $meses = 0;
                $anos++;
            }
        }
        $saida[0] = $dias;
        $saida[1] = $meses;
        $saida[2] = $anos;
        return($saida);
    }

//-- Calcula diferença de horas: retorna array com horas, minutos e segundos
    function Dif_Horas($str_hora1, $str_formato1, $str_hora2, $str_formato2)
    {
        $saida = array(0 => 0, 1 => 0, 2 => 0);
        $negativo = 1;
        $dif = 0;
        $this->SetaData($str_hora1, $str_formato1);
        $data_1 = $this->mAno . $this->mMes . $this->mDia;
        $hora_1 = ($this->mHora * 3600) + ($this->mMin * 60) + $this->mSeg;

        $this->SetaData($str_hora2, $str_formato2);
        $data_2 = $this->mAno . $this->mMes . $this->mDia;
        $hora_2 = ($this->mHora * 3600) + ($this->mMin * 60) + $this->mSeg;

        if (!empty($data_1) && !empty($data_2) && $data_1 != $data_2)
        {
            $dias_ini = $this->Dif_Datas($str_hora1, $str_formato1, $str_hora2, $str_formato2);
            if ($dias_ini < 0)
            {
                $negativo = -1;
                $dias_ini -= (1 * $negativo);
                $dif  = (86400 - $hora_1) + $hora_2;
            }
            else
            {
                $dias_ini--;
                $dif  = (86400 - $hora_2) + $hora_1;
            }
            $saida[0] = $dias_ini * 24;
        }
        elseif ($hora_1 < $hora_2)
        {
            $dif      = $hora_2 - $hora_1;
            $negativo = -1;
        }
        else
        {
            $dif      = $hora_1 - $hora_2;
        }
        $result    = (int) ($dif / 3600);
        $saida[0] += $result * $negativo;
        $dif      -= $result * 3600;
        $result    = (int) ($dif / 60);
        $saida[1]  = $result * $negativo;
        $dif      -= $result * 60;
        $saida[2]  = $dif * $negativo;
        return($saida);
    }

//-- Calcula nova data em função de incremento ou decremento de dias, meses e anos
    function CalculaData($str_data, $str_formato, $str_op, $int_dia, $int_mes, $int_ano, $format_in="", $format_out="")
    {
        global $nm_config;
        $str_formato = strtoupper($str_formato);
        $this->SetaData($str_data, $str_formato);
        $str_dia_orig = $this->mDia;
        $str_mes_orig = $this->mMes;
        $str_ano_orig = $this->mAno;
/*
        if (!function_exists('adodb_mktime') &&
            isset($nm_config) &&
            @is_file($nm_config['path_prod'] . 'third/adodb/adodb-time.inc.php'))
        {
            include_once $nm_config['path_prod'] . 'third/adodb/adodb-time.inc.php';
        }
        if (function_exists('adodb_mktime'))
        {
            $this->nm_calc_data2($str_dia_orig, $str_mes_orig, $str_ano_orig, $int_dia, $int_mes, $int_ano, $str_op);
        }
        else
        {
            $this->nm_calc_data($str_dia_orig, $str_mes_orig, $str_ano_orig, $int_dia, $int_mes, $int_ano, $str_op);
        }
*/
        $this->nm_calc_data3($str_dia_orig, $str_mes_orig, $str_ano_orig, $int_dia, $int_mes, $int_ano, trim($str_op));
        $dt_ok = $str_ano_orig . '-' . $str_mes_orig . '-' . $str_dia_orig;
        if (!empty($format_out))
        {
            nm_conv_form_data($dt_ok, $format_in, $format_out);
        }
        return $dt_ok;
    }

    function nm_calc_data (&$dia, &$mes, &$ano, $dias_calc=0, $mes_calc=0, $ano_calc=0, $direcao="+")
    {
        $dia = (int)$dia;
        $mes = (int)$mes;
        $ano = (int)$ano;
        $dias_calc = (int)$dias_calc;
        $mes_calc  = (int)$mes_calc;
        $ano_calc  = (int)$ano_calc;
        $tab_dias  = array(00,31,28,31,30,31,30,31,31,30,31,30,31);
        if ($mes_calc > 11)
        {
            $trab = floor($mes_calc / 12);
            $mes_calc  -= $trab * 12;
            if ($direcao == "-")
            {
                $ano -= $trab;
            }
            else
            {
                $ano += $trab;
            }
        }
        if ($ano_calc != 0)
        {
            if ($direcao == "-")
            {
                $ano -= $ano_calc;
            }
            else
            {
                $ano += $ano_calc;
            }
        }
        if ($mes_calc != 0)
        {
            if ($direcao == "-")
            {
                $mes = $mes + (12 - $mes_calc);
                if ($mes > 12)
                {
                    $mes -= 12;
                }
                else
                {
                    $ano--;
                }
            }
            else
            {
                $mes += $mes_calc;
                if ($mes > 12)
                {
                    $mes -= 12;
                    $ano++;
                }
            }
            if (nm_data::TestaAnoBissexto($ano))
            {
                $tab_dias[2] = 29;
            }
            else
            {
                $tab_dias[2] = 28;
            }
            if ($dia > $tab_dias[$mes])
            {
                $dia = $tab_dias[$mes];
            }
        }
        if (nm_data::TestaAnoBissexto($ano) && $dias_calc > 365)
        {
            if (($direcao == "+" && $mes > 2) || ($direcao == "-" && $mes < 3))
            {
                $dias_calc++;
            }
        }
        while ($dias_calc > 365)
        {
               if (nm_data::TestaAnoBissexto($ano))
               {
                   $dias_calc--;
               }
               $dias_calc -= 365;
               $ano = ($direcao == "+" ? $ano + 1 : $ano - 1);
        }
        if ($direcao == "+")
        {
            if (nm_data::TestaAnoBissexto($ano))
            {
                $tab_dias[2] = 29;
            }
            while ($dias_calc > $tab_dias[$mes])
            {
                   $dias_calc -= $tab_dias[$mes];
                   if ($mes == 2 && nm_data::TestaAnoBissexto($ano))
                   {
                       $dias_calc--;
                   }
                   $mes++;
                   if ($mes > 12)
                   {
                       $mes = 1;
                       $ano++;
                       if (nm_data::TestaAnoBissexto($ano))
                       {
                           $tab_dias[2] = 29;
                       }
                       else
                       {
                           $tab_dias[2] = 28;
                       }
                   }
            }
            $dia += $dias_calc;
            while ($dia > $tab_dias[$mes])
            {
                $dia -= $tab_dias[$mes];
                $mes++;
                if ($mes > 12)
                {
                    $mes = 1;
                    $ano++;
                    if (nm_data::TestaAnoBissexto($ano))
                    {
                        $tab_dias[2] = 29;
                    }
                    else
                    {
                        $tab_dias[2] = 28;
                    }
                }
           }
        }
        else
        {
            if ($dias_calc > $dia)
            {
                $dias_calc -= $dia;
                $mes--;
                if ($mes == 0)
                {
                    $mes = 12;
                    $ano--;
                }
                if (nm_data::TestaAnoBissexto($ano))
                {
                    $tab_dias[2] = 29;
                }
                else
                {
                    $tab_dias[2] = 28;
                }
                while ($dias_calc >= $tab_dias[$mes])
                {
                       $dias_calc -= $tab_dias[$mes];
                       if ($mes == 2 && nm_data::TestaAnoBissexto($ano))
                       {
                           $dias_calc--;
                       }
                       $mes--;
                       if ($mes == 0)
                       {
                           $mes = 12;
                           $ano--;
                       }
                       if (nm_data::TestaAnoBissexto($ano))
                       {
                           $tab_dias[2] = 29;
                       }
                       else
                       {
                           $tab_dias[2] = 28;
                       }
                }
                $dia = $tab_dias[$mes] - $dias_calc;
            }
            else
            {
                $dia -= $dias_calc;
                if ($dia == 0)
                {
                    $mes--;
                    if ($mes == 0)
                    {
                        $mes = 12;
                        $ano--;
                    }
                    $dia = $tab_dias[$mes];
                    if ($mes == 2 && nm_data::TestaAnoBissexto($ano))
                    {
                        $dia++;
                    }
                }
            }
        }
        //--- saida
        $dia = ($dia < 10 ? "0" . $dia : $dia);
        $mes = ($mes < 10 ? "0" . $mes : $mes);
    }

    function nm_calc_data2(&$dia, &$mes, &$ano, $dias_calc = 0, $mes_calc = 0, $ano_calc = 0, $direcao = '+')
    {
        //--- sem operacao
        if (0 >= $dias_calc && 0 >= $mes_calc && 0 >= $ano_calc)
        {
            $dia = ($dia < 10 ? "0" . $dia : $dia);
            $mes = ($mes < 10 ? "0" . $mes : $mes);
            return;
        }
        //--- inicializa variaveis
        $dia       = (int) $dia;
        $mes       = (int) $mes;
        $ano       = (int) $ano;
        $dias_calc = (int) $dias_calc;
        $mes_calc  = (int) $mes_calc;
        $ano_calc  = (int) $ano_calc;
        $int_dir   = ('+' == $direcao) ? 1 : -1;
        $arr_dias  = array(0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        //--- calcula anos
        if (0 < $ano_calc)
        {
            $ano = $ano + ($ano_calc * $int_dir);
        }
        //--- calcula meses
        if (0 < $mes_calc)
        {
            while (12 <= $mes_calc)
            {
                $ano       = $ano + (1 * $int_dir);
                $mes_calc -= 12;
            }
            $mes = $mes + ($mes_calc * $int_dir);
            if (12 < $mes || 1 > $mes)
            {
                $mes = $mes - (12 * $int_dir);
                $ano = $ano + (1  * $int_dir);
            }
        }
        //--- corrige ultimo dia
        if ($dia > $arr_dias[$mes])
        {
            if ((2 != $mes) || !adodb_is_leap_year($ano))
            {
                $dia = $arr_dias[$mes];
            }
            else
            {
                $dia = 29;
            }
        }
        //--- calcula dias
        if (0 < $dias_calc)
        {
            $int_stamp = adodb_mktime(0, 0, 0, $mes, $dia, $ano);
            $int_stamp = $int_stamp + ($dias_calc * 24 * 60 * 60 * $int_dir);
            $str_date  = adodb_date('d/m/Y', $int_stamp);
        }
        else
        {
            $dia      = ($dia < 10 ? "0" . $dia : $dia);
            $mes      = ($mes < 10 ? "0" . $mes : $mes);
            $str_date = $dia . '/' . $mes . '/' . $ano;
        }
        //--- saida
        $arr_tmp_list_change = explode('/', $str_date);
        list($dia, $mes, $ano) = $arr_tmp_list_change;
    }

    function nm_calc_data3(&$dia, &$mes, &$ano, $dias_calc = 0, $mes_calc = 0, $ano_calc = 0, $direcao = '+')
    {
        //--- sem operacao
        if (0 >= $dias_calc && 0 >= $mes_calc && 0 >= $ano_calc)
        {
            $dia = ($dia < 10 ? "0" . $dia : $dia);
            $mes = ($mes < 10 ? "0" . $mes : $mes);
            return;
        }
        //--- inicializa variaveis
        $dia       = (int) $dia;
        $mes       = (int) $mes;
        $ano       = (int) $ano;
        $dias_calc = (int) $dias_calc;
        $mes_calc  = (int) $mes_calc;
        $ano_calc  = (int) $ano_calc;
        $int_dir   = ('+' == $direcao) ? 1 : -1;
        $arr_dias  = array(0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
		$date_calc = $ano . '-' . (10 > $mes ? '0' : '') . $mes . '-' . (10 > $dia ? '0' : '') . $dia;
		if (0 < $dias_calc) {
			$date_calc = date('Y-m-d', strtotime($date_calc. " $direcao $dias_calc days"));
		}
		$dia = (int) date('d', strtotime($date_calc));
		$mes = (int) date('m', strtotime($date_calc));
		$ano = (int) date('Y', strtotime($date_calc));
		if (0 < $mes_calc) {
            while (12 <= $mes_calc)
            {
                $ano       = $ano + (1 * $int_dir);
                $mes_calc -= 12;
            }
            $mes = $mes + ($mes_calc * $int_dir);
            if (12 < $mes || 1 > $mes)
            {
                $mes = $mes - (12 * $int_dir);
                $ano = $ano + (1  * $int_dir);
            }
			if ($dia > $arr_dias[$mes])
			{
				if ((2 != $mes) || !$this->TestaAnoBissexto($ano))
				{
					$dia = $arr_dias[$mes];
				}
				else
				{
					$dia = 29;
				}
			}
		}
		if (0 < $ano_calc) {
            $ano       = $ano + ($ano_calc * $int_dir);
		}
		$dia = ($dia < 10 ? "0" . $dia : $dia);
		$mes = ($mes < 10 ? "0" . $mes : $mes);
    }

    function FormatRegion($Type, $Format)
    {
         $Form_base = str_replace("/", "", $Format);
         $Form_base = str_replace("-", "", $Form_base);
         $Form_base = str_replace(":", "", $Form_base);
         $Form_base = str_replace(";", "", $Form_base);
         $Form_base = str_replace(" ", "", $Form_base);
         $Form_base = str_replace("a", "Y", $Form_base);
         $Form_base = str_replace("y", "Y", $Form_base);
         $Form_base = str_replace("h", "H", $Form_base);
         $date_format_show = "";
         if ($Type == "DT" || $Type == "DH")
         {
             $Str_date = str_replace("a", "y", strtolower($_SESSION['scriptcase']['reg_conf']['date_format']));
             $Str_date = str_replace("y", "Y", $Str_date);
             $Str_date = str_replace("h", "H", $Str_date);
             $Lim   = strlen($Str_date);
             $Ult   = "";
             $Arr_D = array();
             for ($I = 0; $I < $Lim; $I++)
             {
                  $Char = substr($Str_date, $I, 1);
                  if ($Char != $Ult)
                  {
                      $Arr_D[] = $Char;
                  }
                  $Ult = $Char;
             }
             $Prim = true;
             foreach ($Arr_D as $Cada_d)
             {
                 if (strpos($Form_base, $Cada_d) !== false)
                 {
                     $date_format_show .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
                     $date_format_show .= $Cada_d;
                     $Prim = false;
                 }
             }
         }
         if ($Type == "DH" || $Type == "HH")
         {
             if ($Type == "DH")
             {
                 $date_format_show .= " ";
             }
             $Str_time = strtolower($_SESSION['scriptcase']['reg_conf']['time_format']);
             $Str_time = str_replace("h", "H", $Str_time);
             $Lim   = strlen($Str_time);
             $Ult   = "";
             $Arr_T = array();
             for ($I = 0; $I < $Lim; $I++)
             {
                  $Char = substr($Str_time, $I, 1);
                  if ($Char != $Ult)
                  {
                      $Arr_T[] = $Char;
                  }
                  $Ult = $Char;
             }
             $Prim = true;
             foreach ($Arr_T as $Cada_t)
             {
                 if (strpos($Form_base, $Cada_t) !== false)
                 {
                     $date_format_show .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['time_sep'] : "";
                     $date_format_show .= $Cada_t;
                     $Prim = false;
                 }
             }
         }
         return $date_format_show;
    }

    function GetSem($month)
    {
        if ($month == "01" || $month == "02" || $month == "03" || $month == "04" || $month == "05" || $month == "06") {
            return 1;
        }
        if ($month == "07" || $month == "08" || $month == "09" || $month == "10" || $month == "11" || $month == "12") {
            return 2;
        }
        return false;
    }
    function GetQuadr($month)
    {
        if ($month == "01" || $month == "02" || $month == "03" || $month == "04") {
            return 1;
        }
        if ($month == "05" || $month == "06" || $month == "07" || $month == "08") {
            return 2;
        }
        if ($month == "09" || $month == "10" || $month == "11" || $month == "12") {
            return 3;
        }
        return false;
    }
    function GetTrim($month)
    {
        if ($month == "01" || $month == "02" || $month == "03") {
            return 1;
        }
        if ($month == "04" || $month == "05" || $month == "06") {
            return 2;
        }
        if ($month == "07" || $month == "08" || $month == "09") {
            return 3;
        }
        if ($month == "10" || $month == "11" || $month == "12") {
            return 4;
        }
        return false;
    }
    function GetBim($month)
    {
        if ($month == "01" || $month == "02") {
            return 1;
        }
        if ($month == "03" || $month == "04") {
            return 2;
        }
        if ($month == "05" || $month == "06") {
            return 3;
        }
        if ($month == "07" || $month == "08") {
            return 4;
        }
        if ($month == "09" || $month == "10") {
            return 5;
        }
        if ($month == "11" || $month == "12") {
            return 6;
        }
        return false;
    }
    function GetWeek($date_in)
    {
        $date_in = substr($date_in, 0, 10);
/*
        $date = new DateTime($date_in);
        $temp = $date->format("W");
*/
        $temp = date('W', strtotime($date_in));
        return (int)$temp;
    }
    function GetWeekDay($date_in)
    {
        $date_in = substr($date_in, 0, 10);
/*
        $date = new DateTime($date_in);
        return $date->format("w");
        return $date->format("w");
*/
        return date('w', strtotime($date_in));
    }
}
?>