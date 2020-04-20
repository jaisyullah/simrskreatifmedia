<?php
function nmButtonOutput($arr_buttons, $sBtn, $sClick, $sHref, $sId, $sName, $sValue, $sStyle, $sAlign, $sKey, $sBorder, $spath, $sAlt, $sHint, $sClassJ, $AltJ, $sGrupo = '', $str_display = 'only_text', $str_display_position = 'text_right', $bol_link = false, $str_target = '', $sonMouseOver='', $sonMouseOut='', $menu_em_aba = false, $nome_aplicacao = '',
    $addAttr = '')
{
    $sCodigo  = '';

    if ('' != $sGrupo && '__sc_grp__' !=$sGrupo)
    {
        $arr_buttons[$sBtn]['type'] = 'link';

        //if(!empty($sClick))
        {
            $sClick = "scBtnGrpHide($(this).closest( 'table' ).attr('id').substring(12), true);" . $sClick;
        }
    }

    // Parametros
    $sTarget    = '';
    if($menu_em_aba)
    {
        $sHref   = ' item-href="' . $sHref   . '" href="#"';
        $sTarget = ' item-target="'. $str_target .'"';
        $sClick = ' onclick="openMenuItem(\''. $nome_aplicacao . '_' . $sId .'\');"';
    }
    elseif($bol_link)
    {
        $sClick        = '';
        $sHref         = ' href="' . $sHref   . '"';
        if(!empty($str_target))
        {
            $sTarget    = ' target="'. $str_target .'"';
        }
    }
    elseif ($sClick == $sHref)
    {
        $sClick        = ('' != $sClick)  ? ' onClick="'          . $sClick  . '; return false;"' : '';
        $sHref         = '';
    }
    else
    {
        $sClick        = ('' != $sClick)  ? ' onClick="'          . $sClick  . '; return false;"' : '';
        $sHref         = ('' != $sHref)   ? ' href="javascript: ' . $sHref   . '"'               : '';
    }

    if(isset($arr_buttons[$sBtn]['disabled']) && strtolower($arr_buttons[$sBtn]['disabled']) == 'off')
    {
        $arr_buttons[$sBtn]['style'] = "disabled";
        $sHref = "";
    }

    $str_class_additional = "";
    if((isset($arr_buttons[$sBtn]['disabled']) && strtolower($arr_buttons[$sBtn]['disabled']) == 'off') || substr($sBtn, -4) == '_off')
    {
        $str_class_additional = "disabled";
    }



    $sIdImg        = ('' != $sId)     ? ' id="id_img_'        . $sId     . '"'               : '';
    $sId           = ('' != $sId)     ? ' id="'               . $sId     . '"'               : '';
    $sName         = ('' != $sName)   ? ' name="'             . $sName   . '"'               : '';
    $sStyle        = ('' != $sStyle)  ? ' style="'            . $sStyle  . '"'               : '';
    $sAlign        = ('' != $sAlign)  ? ' align="'            . $sAlign  . '"'               : '';
    $sKey          = ('' != $sKey)    ? ' accesskey="'        . $sKey    . '"'               : '';
    $sBorder       = ('' != $sBorder) ? ' border="'           . $sBorder . '"'               : '';
    $spath         = ('' != $spath)   ? $spath                                               : "\$this->Ini->path_botoes";
    $sAlt          = '';
    $sClassB       = ('' != $arr_buttons[$sBtn]['style']) ? ' class="scButton_' . $arr_buttons[$sBtn]['style'] . ' '. $str_class_additional .'"' : $str_class_additional;
    $sClassOver    = ('' != $arr_buttons[$sBtn]['style']) ? ' class="scButton_onmouseover"' : '';
    $sClassDown    = ('' != $arr_buttons[$sBtn]['style']) ? ' class="scButton_onmousedown"' : '';
    $sClassL       = ('' != $arr_buttons[$sBtn]['style']) ? ' class="scLink_'   . $arr_buttons[$sBtn]['style'] . ' '. $str_class_additional .'"' : $str_class_additional;
    $sClassI       = '';

    $sonMouseOver  = ('' != $sonMouseOver) ? ' onmouseover="' . $sonMouseOver . '; return false;"' : '';
    $sonMouseOut   = ('' != $sonMouseOut)  ? ' onmouseout="' . $sonMouseOut  . '; return false;"' : '';

    $sonMouseDown  = "";
    $sonMouseUp    = "";

    $sAddAttrs     = $addAttr;

    if ('' != $sGrupo)
    {
        $sClassL = ' class="scBtnGrpLink"';
    }
    if (empty($sValue))
    {
        $sValue  = ('' != $arr_buttons[$sBtn]['value']) ? $arr_buttons[$sBtn]['value'] : '';
    }

    if (substr($sHint, 0, 11) == "__NM_HINT__")
    {
        $temp_hint = (isset($arr_buttons[$sBtn]['hint'])  && '' != $arr_buttons[$sBtn]['hint']) ? $arr_buttons[$sBtn]['hint'] : '';
        $sHint     = ' title="' . $temp_hint  . substr($sHint, 11) . '"';
    }
    elseif (!empty($sHint))
    {
        $sHint   = ' title="' . $sHint  . '"';
    }
    else
    {
        $sHint   = (isset($arr_buttons[$sBtn]['hint'])  && '' != $arr_buttons[$sBtn]['hint'])  ? ' title="'          . $arr_buttons[$sBtn]['hint']  . '"' : '';
    }

    if (isset($_SESSION['scriptcase']['charset']))
    {
        if (!function_exists("sc_convert_encoding"))
        {
            if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($sValue))
            {
                $sValue = mb_convert_encoding($sValue, $_SESSION['scriptcase']['charset'], "UTF-8");
            }
            if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($sHint))
            {
                $sHint = mb_convert_encoding($sHint, $_SESSION['scriptcase']['charset'], "UTF-8");
            }
            if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($sAlt))
            {
                $sAlt = mb_convert_encoding($sAlt, $_SESSION['scriptcase']['charset'], "UTF-8");
            }
            if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($AltJ))
            {
                $AltJ = mb_convert_encoding($AltJ, $_SESSION['scriptcase']['charset'], "UTF-8");
            }
        }
        else
        {
            if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($sValue))
            {
                $sValue = sc_convert_encoding($sValue, $_SESSION['scriptcase']['charset'], "UTF-8");
            }
            if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($sHint))
            {
                $sHint = sc_convert_encoding($sHint, $_SESSION['scriptcase']['charset'], "UTF-8");
            }
            if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($sAlt))
            {
                $sAlt = sc_convert_encoding($sAlt, $_SESSION['scriptcase']['charset'], "UTF-8");
            }
            if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($AltJ))
            {
                $AltJ = sc_convert_encoding($AltJ, $_SESSION['scriptcase']['charset'], "UTF-8");
            }
        }
    }

    if ('' != $AltJ)
    {
        //se onclick tiver vazio e hint preenchido e for botao, eh pq eh thickbox
        if ($sClassJ == "colorbox")
        {
            $sClick = " onClick=\"javascript:SC_colorbox('". $AltJ ."')\" ";
        }
        elseif(empty($sClick) && 'button' == $arr_buttons[$sBtn]['type'])
        {
            $sClick = ' onClick="tb_show(\'\', \''. $AltJ .'\')" ';
        }
        else
        {
            $sAlt  = ' alt="'  . $AltJ . '"';
            $sHref = ' href="' . $AltJ . '"';
        }
    }
    if ('' != $sClassJ)
    {
        $sClassB = str_replace('class="', 'class="' . $sClassJ . ' ', $sClassB);
        $sClassL = str_replace('class="', 'class="' . $sClassJ . ' ', $sClassL);
        $sClassI = 'image' == $arr_buttons[$sBtn]['type'] ? ' class="sc-button-image ' . $sClassJ . '"' : ' class="' . $sClassJ . '"';
    }

    // Vertical align
    if ('' == $sStyle)
    {
        $sStyle = ' style="vertical-align: middle; display:inline-block;"';
    }
    else
    {
        $sStyle = str_replace('style="', 'style="vertical-align: middle; display:inline-block;', $sStyle);
    }

    //novos botoes
    if(!isset($arr_buttons[$sBtn]['display']))
    {
        $arr_buttons[$sBtn]['display'] = $str_display;
    }
    if(!isset($arr_buttons[$sBtn]['display_position']))
    {
        $arr_buttons[$sBtn]['display_position'] = $str_display_position;
    }

    // Codigo do botao
    if ('button' == $arr_buttons[$sBtn]['type'])
    {
        $sCodigo .= "<a ". $sHref . $sTarget . $sAlt . $sId . $sClick . $sKey . $sClassB . $sHint . $sStyle .  $sonMouseOver .  $sonMouseOut .  $sonMouseDown .  $sonMouseUp . $sAddAttrs . ">";
        switch($arr_buttons[$sBtn]['display'])
        {
            case 'only_text':
                $sCodigo .= $sValue;
                break;
            case 'only_img':
                $sCodigo .= "<img src=\"" . $spath . "/" . $arr_buttons[$sBtn]['image'] . "\" ". $sIdImg ." align='absmiddle' border='0'>\r\n";
                break;
            case 'text_img':
                if($arr_buttons[$sBtn]['display_position'] == 'img_right')
                {
                    $sCodigo .= $sValue;

                    if(!empty($arr_buttons[$sBtn]['image']))
                    {
                        $sCodigo .= "&nbsp;&nbsp;<img src=\"" . $spath . "/" . $arr_buttons[$sBtn]['image'] . "\" ". $sIdImg ." align='absmiddle' border='0'>\r\n";
                    }
                }
                else
                {
                    if(!empty($arr_buttons[$sBtn]['image']))
                    {
                        $sCodigo .= "<img src=\"" . $spath . "/" . $arr_buttons[$sBtn]['image'] . "\" ". $sIdImg ." align='absmiddle' border='0'>&nbsp;&nbsp;\r\n";
                    }
                    $sCodigo .= $sValue;
                }
                break;
            case 'only_fontawesomeicon':
                if(!empty($arr_buttons[$sBtn]['fontawesomeicon']))
                {
                    $sCodigo .= "<i class='icon_fa ". $arr_buttons[$sBtn]['fontawesomeicon'] ."'></i>\r\n";
                }
                break;
            case 'text_fontawesomeicon':
                if($arr_buttons[$sBtn]['display_position'] == 'img_right')
                {
                    $sCodigo .= $sValue;
                    if(!empty($arr_buttons[$sBtn]['fontawesomeicon']))
                    {
                        $sCodigo .= "&nbsp;&nbsp;<i class='icon_fa ". $arr_buttons[$sBtn]['fontawesomeicon'] ."'></i>\r\n";
                    }
                }
                else
                {
                    if(!empty($arr_buttons[$sBtn]['fontawesomeicon']))
                    {
                        $sCodigo .= "<i class='icon_fa ". $arr_buttons[$sBtn]['fontawesomeicon'] ."'></i>&nbsp;&nbsp;\r\n";
                    }
                    $sCodigo .= $sValue;
                }
                break;
        }

        if('__sc_grp__' == $sGrupo)
        {
			if ($arr_buttons[$sBtn]['has_fa'])
			{
				$sCodigo .= "&nbsp;&nbsp;<i class='fa fa-caret-down'></i>\r\n";
			}
			else
			{
				$sCodigo .= "&nbsp;&nbsp;<img src=\"" . $spath . "/scriptcase__NM__ico__NM__group_expand.png\" align='absmiddle' border='0'>\r\n";
			}
        }

        $sCodigo .= "</a>\r\n";
    }
    elseif ('image' == $arr_buttons[$sBtn]['type'])
    {
        if (isset($arr_buttons[$sBtn]['image']) && !empty($arr_buttons[$sBtn]['image']))
        {
            $sSrc = $arr_buttons[$sBtn]['image'];
        }
        else
        {
            $sSrc = "nm_" . $tbapl_template_botao . "_" . $sBtn . ".gif";
        }
        if (empty($sClick))
        {
            $sClick = $sHref;
        }
        $sCodigo .= "<a " . $sId . $sKey . $sClassB . $sTarget . $sBorder. $sHref. $sHint . $sStyle . $sAlign . $sClassI . $sClick . "><img " . $sIdImg . " src=\"" . $spath . "/" . $sSrc . "\" style=\"border-width: 0; cursor: pointer\" /></a>\r\n";
    }
    elseif ('fontawesomeicon' == $arr_buttons[$sBtn]['type'])
    {
        $sCodigo .= "<a " . $sId . $sKey . $sTarget . $sBorder. $sHref. $sHint . $sStyle . $sAlign . $sClassI . $sClick . "><i class=' icon_fa". $arr_buttons[$sBtn]['fontawesomeicon'] ."'></i></a>\r\n";
    }
    else
    {
		if ('' != $sGrupo && '__sc_grp__' != $sGrupo && isset($arr_buttons["group_{$sGrupo}"]) && isset($arr_buttons["group_{$sGrupo}"]['content_icons']) && $arr_buttons["group_{$sGrupo}"]['content_icons'])
		{
			if ('text_fontawesomeicon' == $arr_buttons[$sBtn]['display'] && !empty($arr_buttons[$sBtn]['fontawesomeicon']))
			{
				$sCodigo .= "<i class='icon_fa ". $arr_buttons[$sBtn]['fontawesomeicon'] ."'></i>&nbsp;&nbsp;\r\n";
			}
			elseif ('text_img' == $arr_buttons[$sBtn]['display'] && !empty($arr_buttons[$sBtn]['image']))
			{
				$sCodigo .= "<img src=\"" . $spath . "/" . $arr_buttons[$sBtn]['image'] . "\" ". $sIdImg ." align='absmiddle' border='0'>&nbsp;&nbsp;\r\n";
			}
		}
        $sCodigo .= "<a" . $sId . $sHref . $sTarget . $sClassL . $sHint . $sStyle . $sClick . ">" . $sValue . "</a>\r\n";
    }
    return $sCodigo;
}

function nmButtonGroupOutput($arr_buttons, $sBtn, $str_step)
{
    $sClass       = ('' != $arr_buttons[$sBtn]['style']) ? ' class="scButton_' . $arr_buttons[$sBtn]['style'] . '_group"' : '';

    if($str_step == 'ini')
    {
        $sCodigo .= "<span id=\"". $sBtn ."\" ". $sClass ." style='display: inline-block;'>\r\n";
    }
    else
    {
        $sCodigo .= "</span>\r\n";
    }

    return $sCodigo;
}

function nmButtonGroupTableOutput($arr_buttons, $sBtn, $grupo, $pos, $theme, $str_step)
{
    if($theme == 'button')
    {
        $sClassTb = 'SC_SubMenuButton scButton_' . $arr_buttons[$sBtn]['style'] . '_list';
    }
    else
    {
        $sClassTb = 'SC_SubMenuApp';
    }

    if($str_step == 'ini')
    {
        $sCodigo .= "           <table style=\"border-collapse: collapse; border-width: 0; display: none; position: absolute; z-index: 10\" class='". $sClassTb ."' id=\"sc_btgp_div_" . $grupo . "_" . $pos . "\">\r\n";
        $sCodigo .= "               <tr>\r\n";
        $sCodigo .= "                   <td class='scBtnGrpBackground' align='center'>\r\n";
    }
    else
    {
        $sCodigo .= "                   </td>\r\n";
        $sCodigo .= "               </tr>\r\n";
        $sCodigo .= "           </table>\r\n";
    }

    return $sCodigo;
}
?>