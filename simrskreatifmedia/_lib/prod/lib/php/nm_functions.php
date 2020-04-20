<?php

function sc_webservice($str_webservice_type, $str_url, $str_port, $str_metodo, $str_param, $arr_params = array(), $int_timeout=30, $bol_return_array = false)
{
        $str_buffer = '';

        $str_webservice_type = trim(strtolower($str_webservice_type));
        switch($str_webservice_type)
        {
                case 'fsockopen':

                        $str_servidor = $str_url;
                        $str_caminho  = "/";

                        //retira http e https
                        if ('http://' == strtolower(substr(trim($str_servidor), 0, 7)))
                        {
                                $str_servidor = substr(trim($str_servidor), 7);
                        }
                        elseif ('https://' == strtolower(substr(trim($str_servidor), 0, 8)))
                        {
                                $str_servidor = substr(trim($str_servidor), 8);
                        }

                        if(strpos($str_servidor, '/') !== false)
                        {
                                $str_caminho  = substr($str_servidor, strpos($str_servidor, '/'));
                                $str_servidor = substr($str_servidor, 0, strpos($str_servidor, '/'));

                        }

                        $res_socket = fsockopen($str_servidor, $str_port, $int_err, $str_err, $int_timeout);

                        if ('GET' == $str_metodo)
                        {
                                if (strpos($str_caminho, "?") === FALSE)
                                {
                                        $str_caminho .= '?' . $str_param;
                                }
                                else
                                {
                                        $str_caminho .= '&' . $str_param;
                                }
                        }

                        fputs($res_socket, "$str_metodo $str_caminho HTTP/1.1\r\n");
                        fputs($res_socket, "Host: $str_servidor\r\n");

                        if ($str_metodo == 'POST' && !empty($str_param))
                        {
                                fputs($res_socket, "Content-type: application/x-www-form-urlencoded\r\n");
                                fputs($res_socket, 'Content-length: ' . strlen($str_param) . "\r\n");
                                fputs($res_socket, $str_param);
                        }
                        fputs($res_socket, "Connection: close\r\n\r\n");

                        if (isset($arr_params['header']))
                        {
                                fputs($res_socket, $arr_params['header']);
                        }

                        stream_set_timeout($res_socket, $int_timeout);

                        while(!feof($res_socket))
                        {
                                $str_buffer .= fread($res_socket,256);
                        }
                        fclose($res_socket);

                break;
                case 'soap':
                        try
                        {
                                $soap_client = new SoapClient($str_url, $arr_params);
                                return $soap_client;
                        }
                        catch (Exception $e)
                        {
                                throw new Exception($e->getMessage());
                        }

                break;
                case 'file_get_contents':

                        if ('GET' == $str_metodo)
                        {
                                if (strpos($str_url, "?") === FALSE)
                                {
                                        $str_url .= '?' . $str_param;
                                }
                                else
                                {
                                        $str_url .= '&' . $str_param;
                                }

                                $str_param = "";
                        }

                        $context_options = array();
                        $context_options['http']['timeout'] = $int_timeout;

                        if (isset($arr_params['header']))
                        {
                                $context_options['http']['header'] = $arr_params['header'];
                        }
                        if('POST' == $str_metodo && !empty($str_param))
                        {
                                $data_len = strlen ($str_param);
                                if(isset($context_options['http']['header']))
                                {
                                        $context_options['http']['header'] .= "Connection: close\r\nContent-Length: $data_len\r\n";
                                }
                                else
                                {
                                        $context_options['http']['header']  = "Content-Type: application/x-www-form-urlencoded\r\n";
                                        $context_options['http']['header'] .= "Connection: close\r\nContent-Length: $data_len\r\n";
                                }
                                $context_options['http']['content'] = $str_param;
                                $context_options['http']['method'] = $str_metodo;
                        }

                        $context_options['http']['timeout'] = $int_timeout;

                        $context  = stream_context_create($context_options);
                        $str_buffer = file_get_contents($str_url, false, $context);
                break;
                case 'curl':

                        if ('GET' == $str_metodo)
                        {
                                if (strpos($str_url, "?") === FALSE)
                                {
                                        $str_url .= '?' . $str_param;
                                }
                                else
                                {
                                        $str_url .= '&' . $str_param;
                                }

                                $str_param = "";
                        }

                        $ch1 = curl_init();
                        curl_setopt($ch1, CURLOPT_URL, $str_url);
                        if ('POST' == $str_metodo && !empty($str_param))
                        {
                                curl_setopt($ch1, CURLOPT_POST, true);
                                curl_setopt($ch1, CURLOPT_POSTFIELDS, $str_param);
                        }
                        curl_setopt($ch1, CURLOPT_TIMEOUT, $int_timeout);
                        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch1, CURLOPT_HEADER, false);
                        curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);


                        if(is_array($arr_params) && !empty($arr_params))
                        {
                                foreach($arr_params as $key => $value)
                                {
                                        curl_setopt($ch1, $key, $value);
                                }
                        }

                        $str_buffer = curl_exec($ch1);

                break;

        }

        if($bol_return_array)
        {
                $xml = simplexml_load_string(trim($str_buffer));
                $json = json_encode($xml);
                $str_buffer = json_decode($json,TRUE);
        }

        return $str_buffer;
}

function sc_include_library($str_origem, $str_library, $str_file, $bol_once = true, $bol_require = true)
{
        $str_file_include = $str_library . "/" . $str_file;
        if($str_origem == "prj" || $str_origem == "project")
        {
                $str_file_include = "../_lib/libraries/grp/" . $str_file_include;
        }
        elseif($str_origem == "public" || $str_origem == "sys")
        {
                $str_file_include = "../_lib/libraries/sys/" . $str_file_include;
        }
        else
        {
                $str_file_include = "../_lib/libraries/scriptcase/" . $str_file_include;
        }

        if($bol_once)
        {
                if($bol_require)
                {
                        require_once($str_file_include);
                }
                else
                {
                        include_once($str_file_include);
                }
        }
        else
        {
                if($bol_require)
                {
                        require($str_file_include);
                }
                else
                {
                        include($str_file_include);
                }
        }
}

function sc_url_library($str_origem, $str_library, $str_file, $boll_full_url = false, $bol_header = false)
{
        $str_file_include = $str_library . "/" . $str_file;
        if($str_origem == "prj" || $str_origem == "project")
        {
                $str_file_include = "_lib/libraries/grp/" . $str_file_include;
        }
        elseif($str_origem == "sys" || $str_origem == "public")
        {
                $str_file_include = "_lib/libraries/sys/" . $str_file_include;
        }
        else
        {
                $str_file_include = "_lib/libraries/scriptcase/" . $str_file_include;
        }

        if(!$boll_full_url)
        {
                $str_file_include = "../" . $str_file_include;
        }
        else
        {
                $str_file_include = "//" . dirname(dirname($_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"])) . "/" . $str_file_include;
                if($bol_header)
                {
                        if(is_ssl())
                        {
                                $str_file_include = "https:" . $str_file_include;
                        }
                        else
                        {
                                $str_file_include = "http:" . $str_file_include;
                        }
                }
        }

        return $str_file_include;
}

function is_ssl()
{
	if (isset($_SERVER['HTTPS'])) {
		if ('on' == strtolower($_SERVER['HTTPS'])) {
			return true;
		}
		if ('1' == $_SERVER['HTTPS']) {
			return true;
		}
	}

	if (isset($_SERVER['REQUEST_SCHEME'])) {
		if ('https' == $_SERVER['REQUEST_SCHEME']) {
			return true;
		}
	}

	if (isset($_SERVER['SERVER_PORT'])) {
		if ('443' == $_SERVER['SERVER_PORT']) {
			return true;
		}
	}

	return false;
}

function sc_statistic($arr_input, $var_tp="A")
{
/* var_tp: A = amostral
           P = populacional
*/
    $media     = 0;
    $mediana   = 0;
    $variancia = 0;
    $desvio    = 0;
    $amplitude = 0;
    $d_count   = 0;
    $freq      = 0;
    $count     = 0;
    $max       = 0;
    $min       = 0;
    $trab      = 0;
    if (!is_array($arr_input) || empty($arr_input))
    {
        return array($media,$mediana,$variancia,$desvio,$amplitude,$d_count,$freq,$count,$min,$max);
    }
    if (count($arr_input) < 2)
    {
        $freq    = 1;
        $d_count = 1;
        if ($arr_input[0] != null)
        {
            $count = 1;
        }
        if (is_numeric($arr_input[0]))
        {
            $media   = $arr_input[0];
            $mediana = $arr_input[0];
            $min     = $arr_input[0];
            $max     = $arr_input[0];
        }
        return array($media,$mediana,$variancia,$desvio,$amplitude,$d_count,$freq,$count,$min,$max);
    }
    $freq      = count($arr_input);
    $ctr_dupl  = false;
    sort($arr_input);
    $min   = $arr_input[0];
    $max   = $arr_input[$freq - 1];
    foreach ($arr_input as $val)
    {
        if ($val != null)
        {
            $count++;
        }
        if (is_numeric($val))
        {
            $trab += $val;
        }
        if ($val !== $ctr_dupl)
        {
            $d_count++;
        }
        $ctr_dupl = $val;
    }
    $media = $trab / $freq;
    $amplitude = $arr_input[$freq - 1] - $arr_input[0];
    $trab = 0;
    foreach ($arr_input as $val)
    {
        if (!is_numeric($val))
        {
            $val = 0;
        }
        $trab += pow(($val - $media), 2);
    }
    if ($var_tp == "A")
    {
        $variancia = $trab / ($freq - 1);
    }
    else
    {
        $variancia = $trab / $freq;
    }
    $desvio = sqrt($variancia);
    $trab   = (int)$freq / 2;
    $rest   = $freq % 2;
    if ($rest == 1)
    {
        $mediana = $arr_input[$trab];
    }
    else
    {
        $mediana = ($arr_input[$trab] + $arr_input[$trab - 1]) / 2;
    }
    return array($media,$mediana,$variancia,$desvio,$amplitude,$d_count,$freq,$count,$min,$max);
}


function nm_fix_permissions($path, $permission = 0644, $recursive = true)
{
    $arr_files = array_diff(scandir($path), ['.','..']);
    foreach($arr_files as $file)
    {
        if(is_dir($path.$file))
        {
            @chmod($path.$file, 0755);
            if($recursive)
            {
                nm_fix_permissions($path.$file.'/', $permission);
            }
        }
        else
        {
            @chmod($path.$file, $permission);
        }
    }
}

?>