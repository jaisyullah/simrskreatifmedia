<?php

	function nm_load_class($v_str_module, $v_str_class)
	{	    
	    $str_file = "../class/" . $v_str_module . '/nm' . $v_str_class . '.class.php';
	
	    if (@is_file($str_file))
	    {
	        $str_constant = strtoupper('NM_CLASS_' . $v_str_module . '_' . $v_str_class);
	        
	        if (!defined($str_constant))
	        {
	            include_once($str_file);
	            define($str_constant, 'LOADED');
	        }
	    }
	    
	} // nm_load_class
	
	function nm_unescape_array($v_arr_array)
	{
	    $arr_unescaped = array();
	    foreach ($v_arr_array as $mix_key => $mix_value)
	    {
	        if (is_array($mix_value))
	        {
	            $arr_unescaped[nm_unescape_string($mix_key)]
	                = nm_unescape_array($mix_value);
	        }
	        else
	        {
	            $arr_unescaped[nm_unescape_string($mix_key)]
	                = nm_unescape_string($mix_value);
	        }
	    }
	    
	    return $arr_unescaped;
	    
	} // nm_unescape_array

	function nm_unescape_string($v_str_string)
	{
	    if (get_magic_quotes_gpc())
	    {
	        return stripslashes($v_str_string);
	    }
	    else
	    {
	        return $v_str_string;
	    }
	    
	} // nm_unscape_string	
	
	function nm_dir_normalize($v_str_dir)
	{
	    $str_dir = str_replace("\\", '/', $v_str_dir);
		
	    if ('/' != substr($str_dir, -1))
	    {
	        $str_dir .= '/';
	    }
	    return $str_dir;
	    
	} // nm_dir_normalize
	
	
	function nm_conv_utf8($string)
	{
	    if (!is_utf8($string))
	    {
	        $string = mb_convert_encoding($string, "UTF-8");
	    }
	
	    return $string;
	}
	
	function conv_utf8_all($arr)
	{
	    if (is_array($arr))
	    {
	        $arr_aux = array();
	
	        foreach ($arr as $k => $v)
	        {
	            if (is_array($v))
	            {
	                if (!is_utf8($k))
	                {
	                    $arr_aux[mb_convert_encoding($k, "UTF-8")] = conv_utf8_all($v);
	                }
	                else
	                {
	                    $arr_aux[$k] = conv_utf8_all($v);
	                }
	            }
	            else
	            {
	              	if (!is_utf8($k))
	                {
	                    if (!is_utf8($v))
	                    {
	                      $arr_aux[mb_convert_encoding($k, "UTF-8")] = mb_convert_encoding($v, "UTF-8");
	                    }
	                    else
	                    {
	                        $arr_aux[mb_convert_encoding($k, "UTF-8")] = $v;
	                    }
	                }
	                else
	                {
	                    if (!is_utf8($v))
	                    {
	                        $arr_aux[$k] = mb_convert_encoding($v, "UTF-8");
	                    }
	                    else
	                    {
	                        $arr_aux[$k] = $v;
	                    }
	                }
	            }
	        }
	
	        $arr = $arr_aux;
	    }
	    elseif (!is_utf8($arr))
	    {
	      $arr = mb_convert_encoding($arr, "UTF-8");
	    }
	
	    return $arr;
	}	
	
	function is_utf8($str) 
	{
	    $c=0; $b=0;
	    $bits=0;
	    $len=strlen($str);
	    for($i=0; $i<$len; $i++){
	        $c=ord($str[$i]);
	        if($c > 128){
	            if(($c >= 254)) return false;
	            elseif($c >= 252) $bits=6;
	            elseif($c >= 248) $bits=5;
	            elseif($c >= 240) $bits=4;
	            elseif($c >= 224) $bits=3;
	            elseif($c >= 192) $bits=2;
	            else return false;
	            if(($i+$bits) > $len) return false;
	            while($bits > 1){
	                $i++;
	                $b=ord($str[$i]);
	                if($b < 128 || $b > 191) return false;
	                $bits--;
	            }
	        }
	    }
	    return true;
	}	
	
	function nm_url_rand($v_str_url, $v_bol_force = FALSE)
	{
	    $str_url  = $v_str_url;
	    $str_url .= (FALSE === strpos($v_str_url, '?'))
	              ? '?rand='
	              : '&rand=';
	    $str_url .= substr(md5(mt_rand()), 8, 16);
	    return $str_url;
	} // nm_url_rand	
	
	function nm_get_lang($file, $indice)
	{
		global $nm_lang, $nm_config;	
			
		$nm_lang_bkp = $nm_lang;  
		                           
		include($nm_config['path_user_lang'] . $file . '.lang.php');
		$str_retorno = $nm_lang[$indice];
		
		$nm_lang = $nm_lang_bkp;
		
		return $str_retorno;
	}	
	
	function nm_err_generic($errno, $errstr, $errfile, $errline)
	{    	
		$_SESSION['nm_err_num_error'] = $errno;
		$_SESSION['nm_err_str_error'] = $errstr;
		$_SESSION['nm_err_fil_error'] = $errfile;
		$_SESSION['nm_err_lin_error'] = $errline;	
	}

	function nm_prod_error_handler($v_int_no, $v_str_msg, $v_str_script, $v_int_line, $v_arr_context = array())
	{
	    global $str_db_err;
	    $arr_handled = array(
	                         E_ERROR,
	                         E_WARNING,
	                         E_PARSE,
	                         E_NOTICE,
	                         E_CORE_ERROR,
	                         E_CORE_WARNING,
	                         E_COMPILE_ERROR,
	                         E_COMPILE_WARNING,
	                         E_USER_ERROR,
	                         E_USER_WARNING,
	                         E_USER_NOTICE
	                        );
	    if (in_array($v_int_no, $arr_handled) && '' != $v_str_msg)
	    {
	        if ((FALSE !== strpos($v_str_msg, 'Invoke() failed'))    &&
	            (FALSE !== strpos($v_str_msg, 'sybase_select_db()')) &&
	            (FALSE !== strpos($v_str_msg, 'Changed database context to')) &&
	            (FALSE !== strpos($v_str_msg, 'Creating default object from empty value')) &&
	            (FALSE !== strpos($v_str_msg, 'should be compatible with that of')) &&
	            (FALSE !== strpos($v_str_msg, 'Contexto do banco de dados alterado para')) &&
	            (FALSE !== strpos($v_str_msg, 'Contexto do banco de dados modificado para')) &&
	            (FALSE !== strpos($v_str_msg, 'do idioma alterada para')) &&
	            (FALSE !== strpos($v_str_msg, 'Unexpected results, cancelling current')) &&
	            (FALSE !== strpos($v_str_msg, 'Only variable references should be returned by reference')) &&
	            (FALSE !== strpos(strtolower($v_str_msg), 'unable to bind to server')) &&
	            (FALSE !== strpos($v_str_msg, 'Only variables should be assigned by reference')) &&
	            (FALSE !== strpos($v_str_msg, 'Undefined index:')) &&
	            (FALSE !== strpos($v_str_msg, 'Assigning the return value of new by reference is deprecated')) &&
	            (FALSE !== strpos($v_str_msg, 'var: Deprecated. Please use the')) &&
	            (FALSE !== strpos($v_str_msg, "Invalid object name 'sys.schemas'")) &&
	            (FALSE !== strpos($v_str_msg, "Qualified object name COLUMNS not valid")) &&
	            (FALSE !== strpos($v_str_msg, "Check messages from the SQL Server")) &&
	            (FALSE !== strpos(strtolower($v_str_msg), "the mysql extension is deprecated and will be removed in the future")) &&
	            (FALSE !== strpos(strtolower($v_str_msg), "driver doesn't support meta data")) &&
	            (FALSE !== strpos($v_str_msg, 'Changed language')))
	        {
	            $str_db_err = $v_str_msg;
	        }
	    }
	} // nm_prod_error_handler
	
	function nm_prod_error_filter($v_str_msg)
	{
	    global $nm_db;
	    if ('' == trim($v_str_msg))
	    {
	        return FALSE;
	    }
	    elseif (FALSE !== strpos($v_str_msg, 'Changed language setting'))
	    {
	        return FALSE;
	    }
	    elseif (FALSE !== strpos($v_str_msg, 'Changed database context to'))
	    {
	        return FALSE;
	    }
	    elseif (FALSE !== strpos($v_str_msg, 'Creating default object from empty value'))
	    {
	        return FALSE;
	    }
	    elseif (FALSE !== strpos($v_str_msg, 'should be compatible with that of'))
	    {
	        return FALSE;
	    }
	    elseif (FALSE !== strpos($v_str_msg, 'Contexto do banco de dados alterado para'))
	    {
	        return FALSE;
	    }
	    elseif (FALSE !== strpos($v_str_msg, 'Contexto do banco de dados modificado para'))
	    {
	        return FALSE;
	    }
	    elseif (FALSE !== strpos($v_str_msg, "Invalid object name 'sys.schemas'"))
	    {
	        return FALSE;
	    }
	    elseif (FALSE !== strpos($v_str_msg, 'do idioma alterada para'))
	    {
	        return FALSE;
	    }
	    elseif (FALSE !== strpos($v_str_msg, 'Qualified object name COLUMNS not valid'))
	    {
	        return FALSE;
	    }
	    elseif (FALSE !== strpos($v_str_msg, 'Check messages from the SQL Server'))
	    {
	        return FALSE;
	    }
	    elseif (FALSE !== strpos(strtolower($v_str_msg), 'seclabelname'))
	    {
	        return FALSE;
	    }
	    elseif (FALSE !== strpos(strtolower($v_str_msg), 'db2admin.rcml01'))
	    {
	        return FALSE;
	    }
	    elseif (FALSE !== strpos(strtolower($v_str_msg), 'nada foi executado'))
	    {
	        return FALSE;
	    }
	    elseif (FALSE !== strpos(strtolower($v_str_msg), 'the mysql extension is deprecated and will be removed in the future'))
	    {
	        return FALSE;
	    }
	    elseif (FALSE !== strpos(strtolower($v_str_msg), 'driver doesn\'t support meta data'))
	    {
	        return FALSE;
	    }
	    else
	    {
	        return TRUE;
	    }
	} // nm_prod_error_filter
	
	function nm_php_version()
	{
	    if (-1 != version_compare(phpversion(), '5.0.0'))
	    {
	        return 5;
	    }
	    elseif (-1 != version_compare(phpversion(), '4.0.0'))
	    {
	        return 4;
	    }
	    else
	    {
	        return 3;
	    }
	} 	
	
	function nm_dir_create($v_str_dir)
	{
	    if (@is_dir($v_str_dir))
	    {
	        return TRUE;
	    }
	    $arr_subdir = explode('/', nm_dir_normaliza($v_str_dir));
	    $str_dir    = $arr_subdir[0] . '/';
	    for ($i = 1; $i < sizeof($arr_subdir); $i++)
	    {
	        $str_dir .= $arr_subdir[$i] . '/';
	        if (!@is_dir($str_dir))
	        {
	            @mkdir($str_dir, 0755);
	            @chmod($str_dir, 0755);
	        }
	    }
	    return @is_dir($str_dir);
	}	
	
	function nm_dir_normaliza($v_str_dir)
	{
	    $str_dir = str_replace("\\", '/', $v_str_dir);
	    $str_dir = str_replace('//', '/', $str_dir);
	    if ('/' != substr($str_dir, -1))
	    {
	        $str_dir .= '/';
	    }
	    return $str_dir;
	}	
?>