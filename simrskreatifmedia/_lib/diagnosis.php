<?php
session_start();
set_time_limit(0);

if (isset($_GET['button'])) {


	if ($_GET['button'] == "button_ok.png")
		$image = "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";
	elseif ($_GET['button'] == "button_cancel.png")
		$image = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAIGNIUk0AAHolAACAgwAA+f8AAIDpAAB1MAAA6mAAADqYAAAXb5JfxUYAAAMnSURBVHjaXJNPTBN2HMU/v9ICTbF/pFALxVbRQEg0GFO5SPgjEMASNqCgCStg1/LHEYEsDpkh27zs4LaD2WFnsyUeWNgErBUqGMVNEkYc0+ywbNnBxGW3HXbY4tuhNW47vHxP309e3sujDWgHWqC8Pz9/sQMSXcBrwGmgCTiVuxEYjlmtSz0QHAD6AdpeaeJKOPzXkMuVaQf/6/8CNGdVcq6wMH0lGHwRhanoS0AzBNrg/MeNjXpy7ZpujY9ryOHInAZfBGjIOihOFhSkbzQ0KBWJ6MNgUP0w3Qsh+u32pQ9qa7V79aq25ua0demSls+eVdJuX20HbxN4xgsKUov19Uq1turLEye0GA7rfbdb5/Ly0rRaLMODLld6KRbTtzMz2ojHtTU6qlRnpxI2251RqzV16+RJ3W9v10o4rK9qanQ9GNSYzXav15gxmrI2i2OFhemvIxE9GhnRg2hU2wMDWqmv18rx43pUV6dMKKS0z6cbTqemLZZ7USjvJJfwqVxIcas1tdLYqJ2eHn3X0aGdujptB4P6pqRED71eLTkcehs24lDxRraV7HNLTo3gTFitqZVjx/S4pkaPy8r0tKJCP+7fr3W3W7MWy90hKJ0AYi8Bzf914UxAaqGoSE/Ky/VLZaWeVVXp2aFD2vR49C6sXQDPPDAB9PCqY1qgJAmpBYdDO2Vl+ungQf1eXa0/jx7VH0eO6Pnhw3qYhaxeBP8k0Euu52YojkP6emGhNr1e7QQC+rWyUpslJdotL9fftbV6Xl2tn0MhrblcumxMZgR83QBdMBwzJv2ZzablPXu07vXq+0BAG8XFmoHVd4xZ/cHv129VVXoaCml73z7dLCrStDFrg/Amg3D7ojH6wmbTot2uux6PbjqdumDM6hh4p8B72ZjVTa9Xu4GAHpSWat3t1kdWqyaNuUMXHOiDmfcsFi3Y7frcbtdbxmROgy8JzAEz4Js1JnPb5dL9vXv1aX6+kjAdhwN059I8A9PzeXlKGpOJgL8TGAVmgXngPPinjMl8YrW+GIOpJJAA6Ab6gCiERmClDxKR3BL/B+AMJCZhOQGhsRzgnwEAq7Qzh9XK2kEAAAAASUVORK5CYII=";

	header("Content-type: image/gif");
	echo base64_decode($image);

	exit;
}

class sc_ambiente
{
        //Versao do php
        var $str_php_version;

		//nome da maquina
        var $str_hostname;

        //Sistema Operacional
        var $str_so;

        //versao
        var $devel_version;

        //build
        var $build_version;

        //versao
        var $prod_version;

        //Vers�o do Zend
        var $str_zend_version;

        //Servidor WEB
        var $str_web_server;

        //database suportadas
        var $arr_databases;

        //extensao necessarias para sc
        var $arr_ext;

        //extensao necessarias para sc
        var $str_ini;

        //cwd
        var $str_cwd;

        //diretorio de licenca
        var $str_license_path;

        //se o scriptcase tem permissao de escrita
        var $bol_scriptcase_writeable;

        //se o diretorio da sessao tem permissao de escrita
        var $bol_session_writeable;

        //se tem acesso a internet
        var $bol_internet_acess_socks;

        //se tem acesso a internet
        var $bol_internet_acess_direct;

        //se tem permissao de execucao
        var $bol_zendid_permission;

        //md5 do zendid
        var $bol_zendid_md5;

        //se tem permissao no imagemagick
        var $str_gd_or_imagemagick;

		//se tem mb_convert_encoding
        var $str_mb_convert_encoding;

		//se tem iconv
        var $str_iconv;


        //construtor
        function __construct()
        {
                $this->SetPhpVersion();
                $this->SetHostname();
                $this->SetCwd();
                $this->SetZendVersion();
                $this->SetSo();
                $this->SetDevelVersion();
                $this->SetBuildVersion();
                $this->SetProdVersion();
                $this->SetWebServer();
                $this->SetDatabasesSuportadas();
                $this->SetExtNecessarias();
                $this->SetPhpIniPath();
                $this->SetScriptcaseWriteable();
                $this->SetSessionWriteable();
                //$this->SetInternetAcessSocks(); movido para final dos processos, para agilizar abertura do diagnosis
                $this->SetZendIdPermission();
                $this->SetGdOrImagemagick();
                $this->SetMbConvertEncoding();
                $this->SetIconv();
        }

        /**
 * Retorna a versao do PHP.
 *
 * @access  public
 * @return  integer  $int_result  Versao do PHP.
 */
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
        } // nm_php_version

        //** GETs and SETs**//

		//seta versao do php
		function SetPhpVersion()
		{
			$this->str_php_version = phpversion();
		}//seta versao do php

		//pega versao do php
		function GetPhpVersion()
		{
			return $this->str_php_version;
		}//pega versao do php

		//seta versao do php
		function SetHostname()
		{
			$this->str_hostname = @gethostname();
		}//seta versao do php

		//pega versao do php
		function GetHostname()
		{
			return $this->str_hostname;
		}//pega versao do php

		//seta cwd
		function SetCwd()
		{
			$this->str_cwd = getcwd();
		}//seta cwd

		//pega cwd
		function GetCwd()
		{
			return $this->str_cwd;
		}//pega cwd

		//seta SO
		function SetSo()
		{
			$str_sys = "";
			if(function_exists("php_uname"))
			{
				$str_sys = strtoupper(php_uname());
			}elseif(defined("PHP_OS"))
			{
				$str_sys = strtoupper(PHP_OS);
			}


			$this->str_so = $str_sys;
		} //seta SO

		//seta Devel Version
		function SetDevelVersion()
		{
			$str_version = "";

			if(is_file("devel/lib/php/ver.dat"))
			{
				$str_version = implode("", file("devel/lib/php/ver.dat"));
			}

			$this->devel_version = $str_version;
		} //SetDevelVersion

		//seta Build Version
		function SetBuildVersion()
		{
			$str_version = "";

			if(is_file("devel/lib/php/build.dat"))
			{
				$str_version = implode("", file("devel/lib/php/build.dat"));
			}

			$this->build_version = $str_version;
		} //SetBuildVersion

		//seta Prod Version
		function SetProdVersion()
		{
			$str_version = "";

			if(is_file("prod/lib/php/ver.dat"))
			{
				$str_version = implode("", file("prod/lib/php/ver.dat"));
			}

			$this->prod_version = $str_version;
		} //seta Prod Version

		//pega SO
		function GetSo()
		{
			return $this->str_so;
		}//pega SO

		//pega versao
		function GetDevelVersion()
		{
			return $this->devel_version;
		}//pega versao

		//pega versao
		function GetBuildVersion()
		{
			return $this->build_version;
		}//pega versao

		//pega versao do prod
		function GetProdVersion()
		{
			return $this->prod_version;
		}//pega versao

		//seta versao do zend
		function SetZendVersion()
		{
				ob_start();
				phpinfo();
				$str_opt = ob_get_contents();
				ob_end_clean();
				$str_opt = html_entity_decode(str_replace("&nbsp;", " ", $str_opt));
				$str_src = "with SourceGuardian";
				if (version_compare(PHP_VERSION, '7.3.0') >= 0) {
					$str_src = "with the ionCub";
				}

				if (FALSE !== strpos($str_opt, $str_src))
				{
					$str_opt = trim(substr($str_opt, strpos($str_opt, $str_src) + strlen($str_src)));

					if (FALSE !== strpos($str_opt, ','))
					{
						$str_opt = trim(substr($str_opt, 1, strpos($str_opt, ',')));
						if (',' == substr($str_opt, -1))
						{
							$str_opt = substr($str_opt, 0, -1);
						}
					}
					else
					{
						$str_opt = '';
					}
				}
				else
				{
					$str_opt = '';
				}
				$this->str_zend_version = $str_opt;
		}//seta versao do zend

		//pega versao do zend
		function GetZendVersion()
		{
				return $this->str_zend_version;
		}//pega versao do zend

		//seta o servidor web
		function SetWebServer()
		{
				$servidor = "";
				if(isset($_SERVER["SERVER_SOFTWARE"]))
				{
						$servidor = $_SERVER["SERVER_SOFTWARE"];
				}
				$this->str_web_server = $servidor;
		}//seta o servidor web

		//pega servidor web
		function GetWebServer()
		{
				return $this->str_web_server;
		}//pega servidor web

		//seta os tipos de banco suportados pelo php
		function SetDatabasesSuportadas()
		{
				$arr_databases = array();

				if (5 == $this->nm_php_version())
				{
						$arr_databases['com_dotnet'] = 'off';
				}
				else
				{
						$arr_databases['com'] = 'off';
				}

				$arr_databases['ibm_db2']   = 'off';
				$arr_databases['interbase'] = 'off';
				$arr_databases['mssql']     = 'off';
				$arr_databases['sqlsrv']    = 'off';
				$arr_databases['mysql']     = 'off';
				$arr_databases['mysqli']    = 'off';
				$arr_databases['odbc']      = 'off';
				$arr_databases['oci8']      = 'off';
				$arr_databases['oracle']    = 'off';
				$arr_databases['pgsql']     = 'off';
				$arr_databases['sqlite']    = 'off';
				$arr_databases['sqlite3']   = 'off';
				$arr_databases['sybase_ct'] = 'off';
				$arr_databases['pdo_cubrid']= 'off';
				$arr_databases['pdo_dblib']   = 'off';
				$arr_databases['pdo_firebird']= 'off';
				$arr_databases['pdo_ibm']     = 'off';
				$arr_databases['pdo_informix']= 'off';
				$arr_databases['pdo_mysql']   = 'off';
				$arr_databases['pdo_oci']     = 'off';
                $arr_databases['pdo_odbc']    = 'off';
				$arr_databases['pdo_pgsql']   = 'off';
				$arr_databases['pdo_sqlite']  = 'off';
				$arr_databases['pdo_sqlsrv']  = 'off';
				$arr_databases['pdo_4d']      = 'off';

				foreach($arr_databases as $database => $setada)
				{
					if(extension_loaded($database))
					{
						$arr_databases[$database] = 'on';
					}
				}
				$this->arr_databases = $arr_databases;
		}//seta os tipos de banco suportados pelo php

		//pega os tipos de banco suportados pelo php
		function GetDatabasesSuportadas()
		{
				return $this->arr_databases;
		}//pega os tipos de banco suportados pelo php

		//seta extensoes necessarios pro scriptcase
		function SetExtNecessarias()
		{
			$arr_ext = array();
			$arr_ext['zlib']   = 'off';
			$arr_ext['gd']     = 'off';
			$arr_ext['iconv']  = 'off';
			$arr_ext['bcmath'] = 'off';
			$arr_ext['mbstring'] = 'off';

			foreach($arr_ext as $ext => $setada)
			{
				if(extension_loaded($ext))
				{
					$arr_ext[$ext] = 'on';
				}
			}

			$this->arr_ext = $arr_ext;
		}//seta extensoes necessarios pro scriptcase

		//pega extensoes necessarios pro scriptcase
		function GetExtNecessarias()
		{
				return $this->arr_ext;
		}//pega extensoes necessarios pro scriptcase

		//seta o end do ini do php(se ele existir
		function SetPhpIniPath()
		{
			$str_ini = get_cfg_var('cfg_file_path');

			if(is_file($str_ini))
			{
					$this->str_ini = $str_ini;
			}
		}//seta o end do ini do php(se ele existir

		//pega o end do ini do php(se ele existir
		function GetPhpIniPath()
		{
				return $this->str_ini;
		}//pega o end do ini do php(se ele existir

		//Seta diretorio da licenca
		function SetScriptcaseWriteable()
		{
			$bol_scriptcase_writeable = 'on';

			$arr_path = array();

			$arr_path[] = 'app';
			$arr_path[] = 'devel';
			$arr_path[] = 'tmp';
			$arr_path[] = 'devel/class/interface';
			$arr_path[] = 'devel/class/page';
			$arr_path[] = 'devel/class/xmlparser';
			$arr_path[] = 'devel/compat';
			$arr_path[] = 'devel/tpl/scriptcase';

			foreach($arr_path as $path)
			{
					if(is_dir($path))
					{
							$str_temp = trim($path);
							$old_dir = getcwd();
							chdir($str_temp);

							$handle = @fopen("teste.tmp", "w+");

							if($handle)
							{
									@fclose($handle);
									@unlink("teste.tmp");
							}else
							{
									$bol_scriptcase_writeable = 'off';
							}
							chdir($old_dir);
					}
			}

			$this->bol_scriptcase_writeable = $bol_scriptcase_writeable;
		}//Seta diretorio da licenca

		//Pega diretorio da licenca
		function GetScriptcaseWriteable()
		{
				return $this->bol_scriptcase_writeable;
		}//Pega diretorio da licenca

		//seta se o dir da sessao � writeable
		function SetSessionWriteable()
		{
			$bol_session_writeable = "off";


			$session_dir = get_cfg_var('session.save_path');

			if(empty($session_dir))
			{
					$session_dir = session_save_path();
			}

			if(is_dir($session_dir))
			{
				$str_temp = trim($session_dir);
				$old_dir = getcwd();
				chdir($str_temp);

				$handle = @fopen("teste.tmp", "w+");

				if($handle)
				{
						fclose($handle);
						@unlink("teste.tmp");
						$bol_session_writeable = 'on';
				}
				chdir($old_dir);
			}

			$this->bol_session_writeable = $bol_session_writeable;
		}//seta se o dir da sessao � writeable

		//pega se o dir da sessao � writeable
		function GetSessionWriteable()
		{
				return $this->bol_session_writeable;
		}//pega se o dir da sessao � writeable

		//seta se a maquina tem acesso a internet
		function SetInternetAcessSocks()
		{
			$bol_internet_acess_socks = "off";

			$str_caminho = "http://webservice.scriptcase.com.br/checaupd/nm_checaupd_service.php";
			$v_str_dados = '<?xml version="1.0" encoding="iso-8859-1" ?><checaupd>ok</checaupd>';

			$arr_result = $this->nm_xml_send($str_caminho, "POST", $v_str_dados, false, 10);

			if(strpos($arr_result, "<checaupd>ok</checaupd>")!==false)
			{
				$bol_internet_acess_socks = 'on';
			}

			$this->bol_internet_acess_socks = $bol_internet_acess_socks;
		}//seta se a maquina tem acesso a internet

		//pega se a maquina tem acesso a internet
		function GetInternetAcessSocks()
		{
				return $this->bol_internet_acess_socks;
		}//pega se a maquina tem acesso a internet

		//seta ze o zend tem permiss�o de execu�ao
		function SetZendIdPermission()
		{
			$bol_zendid_permission = 'off';
			$bol_zendid_md5        = '';

			$zend_dir = "prod/third/zend";
			if(!is_dir($zend_dir))
			{
				$zend_dir = "devel/lib/third/zend";
			}
			$old_dir = getcwd();
			chdir($zend_dir);

			if(substr($this->GetSo(), 0, 3) === 'WIN')
			{
				if(is_file("zendid.exe"))
				{
						@exec("zendid.exe", $arr_exec);
						$bol_zendid_md5 = md5_file("zendid.exe");
				}
			}
			else
			{
				if(is_file("zendid"))
				{
						@exec("./zendid", $arr_exec);
						$bol_zendid_md5 = md5_file("./zendid");
				}
			}

			if(isset($arr_exec) && is_array($arr_exec) && isset($arr_exec[0]) && strlen($arr_exec[0])>20)
			{
					$bol_zendid_permission = 'on';
			}

			chdir($old_dir);

			$this->bol_zendid_md5        = $bol_zendid_md5;
			$this->bol_zendid_permission = $bol_zendid_permission;
		}//seta ze o zend tem permiss�o de execu�ao

		//pega ze o zend tem permiss�o de execu�ao
		function GetZendIdPermission()
		{
				return $this->bol_zendid_permission;
		}//pega ze o zend tem permiss�o de execu�ao

		//pega o md5 zendid
		function GetZendIdMd5()
		{
				return $this->bol_zendid_md5;
		}//pega o md5 zendid

		//pega id da maquina
		function GetZendIdinfo()
		{
			$str_id = "";
			if($this->GetZendIdPermission()=='on')
			{
				$old_dir = getcwd();

				$zend_dir = "prod/third/zend";
				if(!is_dir($zend_dir))
				{
					$zend_dir = "devel/lib/third/zend";
				}

				chdir($zend_dir);

				if(substr($this->GetSo(), 0, 3) === 'WIN')
				{
					if(is_file("zendid.exe"))
					{
						@exec("zendid.exe allid", $arr_exec);
					}
				}
				else
				{
					if(is_file("zendid"))
					{
						@exec("./zendid allid", $arr_exec);
					}
				}

				if(isset($arr_exec))
				{
					if(is_array($arr_exec))
					{
						$str_id = implode("#lic#", $arr_exec);
					}else
					{
						$str_id = $arr_exec;
					}
				}

				chdir($old_dir);
				return $str_id;
			}

			return $str_id;
		}

		//pega se usa imagemagick ou gd
		function GetGdOrImagemagick()
		{
			return $this->str_gd_or_imagemagick;
		}//pega se usa imagemagick ou gd

		//seta se usa imagemagickiz ou gd
		function SetGdOrImagemagick()
		{
			$str_gd_or_imagemagick = "ImageMagick";
			$prod_version = "";
			if(is_file("prod/lib/php/ver.dat"))
			{
				$prod_version = str_replace(".", "", implode("", file("prod/lib/php/ver.dat")));
			}

			if($prod_version >= 2168 && function_exists("gd_info"))
			{
				$sc_info_GD = gd_info();
				if(isset($sc_info_GD['GD Version']))
				{
					$pos_Temp = strpos($sc_info_GD['GD Version'], "(");
					if($pos_Temp)
					{
						$sc_GD_version = substr($sc_info_GD['GD Version'], $pos_Temp + 1, 3);
					}elseif(!empty($sc_info_GD['GD Version']))
					{
						$pos_Temp = strpos($sc_info_GD['GD Version'], " ");
						$sc_GD_version = substr($sc_info_GD['GD Version'], 0, $pos_Temp);
					}
					if($sc_GD_version >= 2)
					{
					   $str_gd_or_imagemagick = "GD - " . $sc_GD_version;
					}
				}
			}

			$this->str_gd_or_imagemagick = $str_gd_or_imagemagick;
		}//seta se usa imagemagick ou gd

		
		function GetMbConvertEncoding()
		{
			return $this->str_mb_convert_encoding;
		}
		
		function SetMbConvertEncoding()
		{
			$this->str_mb_convert_encoding = "off";
			if(function_exists("mb_convert_encoding"))
			{
				$this->str_mb_convert_encoding = "on";
			}
			return $this->str_mb_convert_encoding;
		}

		function GetIconv()
		{
			return $this->str_iconv;
		}
		
		function SetIconv()
		{
			$this->str_iconv = "off";
			if(function_exists("iconv"))
			{
				$this->str_iconv = "on";
			}
			
			return $this->str_iconv;
		}
		
        //** fim GETs and SETs**//

        /**
 * Acessa o servico de registro.
 *
 * Envia o pedido de registro para o servico e aguarda a resposta.
 *
 * @access  public
 */
	function nm_xml_send($v_str_servico, $v_str_metodo, $v_str_dados, $v_bol_msie = FALSE, $v_int_timeout = -1, $v_bol_trata_dados = TRUE)
	{
		$str_proxy_serv = "";
		$str_proxy_usu = "";
		$str_proxy_pass = "";
		$str_proxy_port = "";


		$str_cabecalho = "";
		if ('http://' == strtolower(substr(trim($v_str_servico), 0, 7))) {
			$str_cabecalho = "http://";
			$v_str_servico = substr(trim($v_str_servico), 7);
		}

		if ($v_int_timeout > 0) {
			$int_timeout = $v_int_timeout;
		} else {
			$int_timeout = ini_get("default_socket_timeout");

			if ($int_timeout < 30) {
				$int_timeout = 60;
			}
		}

		$str_servidor = substr($v_str_servico, 0, strpos($v_str_servico, '/'));
		$str_caminho = substr($v_str_servico, strpos($v_str_servico, '/'));
		$v_str_metodo = (empty($v_str_metodo)) ? 'POST' : strtoupper($v_str_metodo);

		if ($v_bol_trata_dados) {
			$v_str_dados = str_replace('%', '__NM_ENC__', $v_str_dados);
			$v_str_dados = str_replace('+', '__NM_MAIS__', $v_str_dados);
		}

		$v_str_dados = 'reg_data=' . $v_str_dados;
		if (isset($_SESSION['nm_session']['status']['lang']) && '' != $_SESSION['nm_session']['status']['lang']) {
			$v_str_dados .= '&rem_lang=' . $_SESSION['nm_session']['status']['lang'];
		}
		if (FALSE !== strpos($str_servidor, ':')) {
			$int_port = substr($str_servidor, strpos($str_servidor, ':') + 1);
			$str_servidor = substr($str_servidor, 0, strpos($str_servidor, ':'));
		} else {
			$int_port = 80;
		}

		//adicionado servico de proxy
		$str_proxy_aut = false;
		$str_servidor_con = $str_servidor;
		if (!empty($str_proxy_serv)) {
			$str_caminho = $str_caminho;
			$str_caminho = $str_cabecalho . $str_servidor . $str_caminho;
			$str_servidor_con = $str_proxy_serv;
			$int_port = $str_proxy_port;
			if (!empty($str_proxy_usu)) {
				$str_proxy_aut = true;
			}
		}
		//fim adicionado servico de proxy

		$res_socket = @fsockopen($str_servidor_con, $int_port, $int_err, $str_err, $int_timeout);

		if (FALSE == $res_socket) {
			return FALSE;
		}
		if ('GET' == $v_str_metodo) {
			if (strpos($str_caminho, "?") === FALSE) {
				$str_caminho .= '?' . $v_str_dados;
			} else {
				$str_caminho .= '&' . $v_str_dados;
			}
		}

		fputs($res_socket, "$v_str_metodo $str_caminho HTTP/1.1\r\n");
		fputs($res_socket, "Host: $str_servidor\r\n");

		if ($str_proxy_aut) {
			fputs($res_socket, "Proxy-Connection: Keep-Alive\r\n");
			fputs($res_socket, "Proxy-Authorization: Basic " . base64_encode("$str_proxy_usu:$str_proxy_pass") . "\r\n\r\n");
		}
		if ($v_str_metodo == 'POST') {
			fputs($res_socket, "Content-type: application/x-www-form-urlencoded\r\n");
			fputs($res_socket, 'Content-length: ' . strlen($v_str_dados) . "\r\n");
		}
		if ($v_bol_msie) {
			fputs($res_socket, "User-Agent: MSIE\r\n");
		}
		fputs($res_socket, "Connection: close\r\n\r\n");
		if ('POST' == $v_str_metodo) {
			fputs($res_socket, $v_str_dados);
		}

		$str_buffer = '';
		$bol_echo = FALSE;

		while (!feof($res_socket)) {
			$str_line = fread($res_socket, 256);
			if (FALSE !== strpos($str_line, '?xml ') && !$bol_echo) {
				$bol_echo = TRUE;
				$str_line = substr($str_line, strpos($str_line, "<?xml"));
			}
			if ($bol_echo) {
				$str_buffer .= $str_line;
			}

		}
		fclose($res_socket);

		$str_buffer = trim($str_buffer);
		if (strpos($str_buffer, "xml") !== false) {
			$str_buffer = "<?" . substr($str_buffer, strpos($str_buffer, "xml"));
		}

		return $str_buffer;
	} // nm_xml_send // nm_xml_send
}

class diagnosis
{
        var $v_str_dados;

        function getArrLang()
        {
        	$arr_lang = array();
        	if($this->getEnvLang()=="pt_br")
        	{
				$arr_lang['titulo'] 			= "Diagnosis";
				$arr_lang['ambiente'] 			= "Ambiente";
				$arr_lang['so'] 				= "Sistema Operacional";
				$arr_lang['webserver'] 			= "Servidor WEB";
				$arr_lang['basedados'] 			= "Bases de Dados";
				$arr_lang['extensoes'] 			= "Extens�es";
				$arr_lang['ambiente2'] 			= "Ambiente ScriptCase";
				$arr_lang['phpinipath'] 		= "Diretorio do php.ini";
				$arr_lang['zend_licence_path']	= "zend_optimizer.license_path";
				$arr_lang['sc_write_perm'] 		= "Permiss�o de Escrita no ScriptCase";
				$arr_lang['sess_write_perm'] 	= "Permiss�o de Escrita na Sess�o";
				$arr_lang['acesso_internet'] 	= "Acesso a Internet";
				$arr_lang['acesso_checando'] 	= "Verificando conex�o com internet";
				$arr_lang['zendid_perm'] 		= "Permiss�o de Executar ZendId";
				$arr_lang['zendid_md5'] 		= "ZendId MD5";

				$arr_lang['sc_instalado'] 		= "ScriptCase Instalado";
				$arr_lang['tables'] 			= "Tabelas";
				$arr_lang['ambiente_sc'] 		= "Ambiente ScriptCase";
				$arr_lang['campos_sem_apl'] 	= "Campos Sem Aplica��o";
				$arr_lang['sc_licence'] 		= "licen�a do ScriptCase";
				$arr_lang['n_connections'] 		= "N�mero de Conex�es";
				$arr_lang['licence_tipo'] 		= "Tipo da licen�a";
				$arr_lang['licence_versao'] 	= "Vers�o da licen�a";
				$arr_lang['data_expiracao'] 	= "Data Licen�a";
				$arr_lang['licenciado_para'] 	= "Licenciado Para";
				$arr_lang['comando_select'] 	= "Comando Select";
				$arr_lang['sc_versao'] 			= "Vers�o do ScriptCase";
				$arr_lang['data_sistema'] 		= "Data Sistema";
				$arr_lang['data_max_apl'] 		= "Data Max Apl";

				$arr_lang['mensagem_sucesso'] 	= "Arquivo de Log Gerado com Sucesso. Clique aqui, salve o arquivo e envie para a NetMake!";
				$arr_lang['mensagem_fail'] 		= "Falta de permiss�o na escrita do diretorio tmp!";

				$arr_lang['problema'] 			= "Problema";
				$arr_lang['ok']       			= "OK";
        	}else
        	{
        		$arr_lang['titulo'] 			= "Diagnosis";
				$arr_lang['ambiente'] 			= "Environment";
				$arr_lang['so'] 				= "OS";
				$arr_lang['webserver'] 			= "WEB Server";
				$arr_lang['basedados'] 			= "Databases";
				$arr_lang['extensoes'] 			= "Extensions";
				$arr_lang['ambiente2'] 			= "Environment 2";
				$arr_lang['phpinipath'] 		= "php.ini PATH";
				$arr_lang['zend_licence_path']	= "zend_optimizer.license_path";
				$arr_lang['sc_write_perm'] 		= "ScriptCase write permission";
				$arr_lang['sess_write_perm'] 	= "Session write permission";
				$arr_lang['acesso_internet'] 	= "Internet Access";
				$arr_lang['acesso_checando'] 	= "Checking internet connection";
				$arr_lang['zendid_perm'] 		= "ZendId execute Permission";
				$arr_lang['zendid_md5'] 		= "ZendId MD5";

				$arr_lang['sc_instalado'] 		= "ScriptCase Installed";
				$arr_lang['tables'] 			= "Tables";
				$arr_lang['ambiente_sc'] 		= "ScriptCase Environment";
				$arr_lang['campos_sem_apl'] 	= "Fields without applications";
				$arr_lang['sc_licence'] 		= "ScriptCase License";
				$arr_lang['n_connections'] 		= "Number of Connections";
				$arr_lang['licence_tipo'] 		= "License Type";
				$arr_lang['licence_versao'] 	= "License Version";
				$arr_lang['data_expiracao'] 	= "License Date";
				$arr_lang['licenciado_para'] 	= "licensed To";
				$arr_lang['comando_select'] 	= "SQL Select Statement";
				$arr_lang['sc_versao'] 			= "ScriptCase Version";
				$arr_lang['data_sistema'] 		= "System Date";
				$arr_lang['data_max_apl'] 		= "Max Apl Date";

				$arr_lang['mensagem_sucesso'] 	= "Log file successfully created. Click here, save the file and send to NetMake!";
				$arr_lang['mensagem_fail'] 		= "Access denied to write in the tmp directory!";

				$arr_lang['problema'] 			= "Problem";
				$arr_lang['ok']       			= "OK";
        	}

        	return $arr_lang;
        }

        function getEnvLang()
        {
        	$strlang = "";
        	if(isset($_SESSION['nm_session']['status']['lang']))
        	{
        		$strlang = $_SESSION['nm_session']['status']['lang'];
        	}

        	if(empty($strlang))
        	{
        		if(is_file("devel/conf/scriptcase/scriptcase.config.php"))
        		{
					$arr_ini = unserialize(substr(file_get_contents('devel/conf/scriptcase/scriptcase.config.php'), 8, -5));
					if(isset($arr_ini['sys_idioma']) && !empty($arr_ini['sys_idioma']))
					{
						$strlang = $arr_ini['sys_idioma'];
					}
        		}
        	}

        	if(empty($strlang))
        	{
        		$arr_accept = array();
			    $strlang = '';
			    if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']))
			    {
			        if (FALSE !== strpos($_SERVER['HTTP_ACCEPT_LANGUAGE'], ','))
			        {
			            $arr_accept = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
			            $strlang = $arr_accept[0];
			        }
			        else
			        {
			            $strlang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
			        }
			        $strlang = str_replace('-', '_', $strlang);
			    }
        	}

        	if(empty($strlang))
        	{
        		$strlang = 'en_us';
        	}
        	return $strlang;
        }

        function __cosntruct()
        {
                $this->v_str_dados = "";
        }

        function makeDiagnosis()
        {
        	    $arr_lang = $this->getArrLang();

                $obj_ambiente = new sc_ambiente();
                $cor1 = "ffffff";
                $cor2 = "f5f6f8";
                $cssTitle1 = " style=' height: 30px; background-color:#87adde;'";
                $cssTitle = " style='color: #FFFFFF; font-weight: bold; height: 25px; margin: 0; padding: 0 0 0 6px; font-family: Arial,Helvetica,sans-serif; font-size: 12px; background-color:#959595;'";
                $cssTextTitle = " Style='color: #FFFFFF; font-family: Verdana, Arial, sans-serif; font-size: 13px; font-weight: bold;'";
                $cssText = " style='color: #404040; font-family: Tahoma, Arial, sans-serif; font-size: 11px;'";

                $this->escreveTela("<HTML>\r");
                $this->escreveTela("<HEAD>\r");
                $this->escreveTela("  <TITLE>".$arr_lang['titulo']."</TITLE>\r");
                $this->escreveTela("  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=ISO-8859-1\" />\r");
                $this->escreveTela("</HEAD>\r");
                $this->escreveTela("<BODY>\r");
                $this->escreveTela("<H1></H1>\r");

                $log_file = "sc_diagnosis_" . date("YmdHis") .".html";

                $this->escreveTela("<center " . $cssText . ">\r");
                $this->escreveTela("<span id='id_msg'></span>\r");
                $this->escreveTela("</center>\r");

                $this->escreveTela("<BR />\r");
                $this->escreveTela("<BR />\r");

                $this->escreveTela("<TABLE cellpadding='2' cellspacing='0' style='border: 1px solid #f0f2f5' align='center' width='700'>\r");

                //titulo 1
                $this->escreveTela("  <TR ". $cssTitle1 .">\r");
                $this->escreveTela("    <TD colspan='2' align='center' ". $cssTextTitle .">\r");
                $this->escreveTela("      <B>".$arr_lang['titulo']."</B>\r");
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("  </TR>\r");
                //titulo 1

                //titulo 1
                $this->escreveTela("  <TR ". $cssTitle .">\r");
                $this->escreveTela("    <TD colspan='2' align='center' ". $cssTextTitle .">\r");
                $this->escreveTela("      <B>".$arr_lang['ambiente']."</B>\r");
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("  </TR>\r");
                //titulo 1

                //checa versao do php
                $teste_ver = version_compare($obj_ambiente->GetPhpVersion(), "4.3.2");
                $imagem = "button_ok.png";
                if($teste_ver<0)
                {
                        $imagem = "button_cancel.png";
                }
                $this->escreveTela("  <TR bgcolor='#". $cor1 ."'>\r");
                $this->escreveTela("    <TD>\r");
                $this->escreveTela("      <img src='diagnosis.php?button=" . $imagem . "' border='0'>\r", 'N', $imagem);
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("    <TD align='left' ". $cssText .">\r");
                $this->escreveTela("      PHP: " . $obj_ambiente->GetPhpVersion() . "\r");
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("  </TR>\r");
                //fim checa versao do php

                //checa versao do php
                $teste_ver = $obj_ambiente->GetHostname();
                $imagem = "button_ok.png";
                if(!$teste_ver)
                {
                        $imagem = "button_cancel.png";
                }
                $this->escreveTela("  <TR bgcolor='#". $cor2 ."'>\r");
                $this->escreveTela("    <TD>\r");
                $this->escreveTela("      <img src='diagnosis.php?button=" . $imagem . "' border='0'>\r", 'N', $imagem);
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("    <TD align='left' ". $cssText .">\r");
                $this->escreveTela("      Hostname: " . $teste_ver . "\r");
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("  </TR>\r");
                //fim checa versao do php

                //checa versao do zend
				if (version_compare(PHP_VERSION, '7.3.0') >= 0) {
					$__tmp = $obj_ambiente->GetZendVersion();
					$teste_ver = !empty($__tmp) ? 1 : -1;
				}
				else{
					$teste_ver = version_compare($obj_ambiente->GetZendVersion(), "2.5.5");
				}

                $imagem = "button_ok.png";
                if($teste_ver<0)
                {
                        $imagem = "button_cancel.png";
                }
                $this->escreveTela("  <TR bgcolor='#". $cor1 ."'>\r");
                $this->escreveTela("    <TD>\r");
                $this->escreveTela("      <img src='diagnosis.php?button=" . $imagem . "' border='0'>\r", 'N', $imagem);
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("    <TD align='left' ". $cssText .">\r");
				if (version_compare(PHP_VERSION, '7.3.0') >= 0) {
					$this->escreveTela("      Ioncube: " . $obj_ambiente->GetZendVersion() . "\r");
				}else{
					$this->escreveTela("      SourceGuardian: " . $obj_ambiente->GetZendVersion() . "\r");
				}
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("  </TR>\r");
                //fim checa versao do zend

                //checa sistema operacional
                $imagem = "button_ok.png";
                $this->escreveTela("  <TR bgcolor='#". $cor2 ."'>\r");
                $this->escreveTela("    <TD>\r");
                $this->escreveTela("      <img src='diagnosis.php?button=" . $imagem . "' border='0'>\r", 'N', $imagem);
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("    <TD align='left' ". $cssText .">\r");
                $this->escreveTela("      ".$arr_lang['so'].": " . $obj_ambiente->GetSo() . "\r");
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("  </TR>\r");
                //checa sistema operacional

                //checa webserver
                $imagem = "button_ok.png";
                $this->escreveTela("  <TR bgcolor='#". $cor1 ."'>\r");
                $this->escreveTela("    <TD>\r");
                $this->escreveTela("      <img src='diagnosis.php?button=" . $imagem . "' border='0'>\r", 'N', $imagem);
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("    <TD align='left' ". $cssText .">\r");
                $this->escreveTela("      ".$arr_lang['webserver'].": " . $obj_ambiente->GetWebServer() . "\r");
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("  </TR>\r");
                //checa webserver

                //checa devel version
                $this->escreveTela("  <TR bgcolor='#". $cor1 ."'>\r");
                $this->escreveTela("    <TD>\r");
                $this->escreveTela("      &nbsp;\r");
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("    <TD align='left' ". $cssText .">\r");
                $this->escreveTela("      ScriptCase Devel: " . $obj_ambiente->GetDevelVersion() . "\r");
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("  </TR>\r");
                //checa devel version

                //checa build version
                $this->escreveTela("  <TR bgcolor='#". $cor2 ."'>\r");
                $this->escreveTela("    <TD>\r");
                $this->escreveTela("      &nbsp;\r");
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("    <TD align='left' ". $cssText .">\r");
                $this->escreveTela("      ScriptCase Build: " . $obj_ambiente->GetBuildVersion() . "\r");
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("  </TR>\r");
                //checa build version

                //checa prod version
                $this->escreveTela("  <TR bgcolor='#". $cor1 ."'>\r");
                $this->escreveTela("    <TD>\r");
                $this->escreveTela("      &nbsp;\r");
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("    <TD align='left' ". $cssText .">\r");
                $this->escreveTela("      ScriptCase Prod: " . $obj_ambiente->GetProdVersion() . "\r");
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("  </TR>\r");
                //checa prod version

                //datetime
                $this->escreveTela("  <TR bgcolor='#". $cor1 ."'>\r");
                $this->escreveTela("    <TD>\r");
                $this->escreveTela("      &nbsp;\r");
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("    <TD align='left' ". $cssText .">\r");
                $this->escreveTela("      Server time: " . date('Ymd Hisu') . "\r");
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("  </TR>\r");
                //datetime

                //checa bancos suportados
                $this->escreveTela("  <TR ". $cssTitle .">\r");
                $this->escreveTela("    <TD colspan='2' align='center' ". $cssTextTitle .">\r");
                $this->escreveTela("      <B>".$arr_lang['basedados']."</B>\r");
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("  </TR>\r");

                if (5 == $obj_ambiente->nm_php_version())
                {
                        $arr_db['com_dotnet'] = 'COM';
                }
                else
                {
                        $arr_db['com'] = 'ADO';
                }
                $arr_db['ibm_db2']   = 'DB2';
                $arr_db['interbase'] = 'InterBase';
                $arr_db['mssql']     = 'MsSQL Server';
                $arr_db['sqlsrv']    = 'MsSQL Server SRV';
                $arr_db['mysql']     = 'MySQL';
                $arr_db['mysqli']    = 'MySQLI';
                $arr_db['odbc']      = 'ODBC';
                $arr_db['oci8']      = 'Oracle 8';
                $arr_db['oracle']    = 'Oracle';
                $arr_db['pgsql']     = 'PostGreSQL';
                $arr_db['sqlite']    = 'SQLite';
                $arr_db['sqlite3']    = 'SQLite 3';
                $arr_db['sybase_ct'] = 'SyBase';
				$arr_db['pdo_mysql'] = 'PDO MySQL';
				$arr_db['pdo_pgsql'] = 'PDO PostGreSQL';
				$arr_db['pdo_sqlite']= 'PDO SQLite';
				$arr_db['pdo_sqlsrv']= 'PDO MsSQL Server';
				$arr_db['pdo_oci']   = 'PDO Oracle';
				$arr_db['pdo_firebird']= 'PDO Firebird';
				$arr_db['pdo_informix']= 'PDO Informix';
				$arr_db['pdo_dblib']= 'PDO DBLIB';
				$arr_db['pdo_odbc']= 'PDO ODBC';

                $arr_databases = $obj_ambiente->GetDatabasesSuportadas();
                $cor = 1;
                foreach($arr_databases as $database=>$flag)
                {
					if($cor==1)
					{
						$color  = $cor1;
					}else
					{
						$color  = $cor2;
					}

					$imagem = "button_ok.png";
					if($flag=='off')
					{
						$imagem = "button_cancel.png";
					}
					$str_db = isset($arr_db[$database])?$arr_db[$database]:$database;
					$this->escreveTela("  <TR bgcolor='#". $color ."'>\r");
					$this->escreveTela("    <TD>\r");
					$this->escreveTela("      <img src='diagnosis.php?button=" . $imagem . "' border='0'>\r", 'N', $imagem);
					$this->escreveTela("    </TD>\r");
					$this->escreveTela("    <TD align='left' ". $cssText .">\r");
					$this->escreveTela("      " . $str_db . "\r");
					$this->escreveTela("    </TD>\r");
					$this->escreveTela("  </TR>\r");

					if($cor==1)
					{
						$cor = 0;
					}else
					{
						$cor++;
					}
                }
                //checa bancos suportados

                //checa extensoes necessarias
                $this->escreveTela("  <TR ". $cssTitle .">\r");
                $this->escreveTela("    <TD colspan='2' align='center' ". $cssTextTitle .">\r");
                $this->escreveTela("      <B>".$arr_lang['extensoes']."</B>\r");
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("  </TR>\r");

                $arr_ext = $obj_ambiente->GetExtNecessarias();
                $cor = 1;
                foreach($arr_ext as $ext=>$flag)
                {
                        if($cor==1)
                        {
                                $color  = $cor1;
                        }else
                        {
                                $color  = $cor2;
                        }

                        $imagem = "button_ok.png";
                        if($flag=='off')
                        {
                                $imagem = "button_cancel.png";
                        }

                        $this->escreveTela("  <TR bgcolor='#". $color ."'>\r");
                        $this->escreveTela("    <TD>\r");
                        $this->escreveTela("      <img src='diagnosis.php?button=" . $imagem . "' border='0'>\r", 'N', $imagem);
                        $this->escreveTela("    </TD>\r");
                        $this->escreveTela("    <TD align='left' ". $cssText .">\r");
                        $this->escreveTela("      ". strtoupper($ext) ."\r");
                        $this->escreveTela("    </TD>\r");
                        $this->escreveTela("  </TR>\r");

                        if($cor==1)
                        {
                                $cor = 0;
                        }else
                        {
                                $cor++;
                        }
                }
                //checa extensoes necessarias

                //titulo 2
                $this->escreveTela("  <TR ". $cssTitle .">\r");
                $this->escreveTela("    <TD colspan='2' align='center' ". $cssTextTitle .">\r");
                $this->escreveTela("      <B>".$arr_lang['ambiente2']."</B>\r");
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("  </TR>\r");
                //titulo 2

                //checa ini do php
                $teste_tmp = $obj_ambiente->GetPhpIniPath();
                $imagem = "button_ok.png";
                if(empty($teste_tmp))
                {
                        $imagem = "button_cancel.png";
                }
                $this->escreveTela("  <TR bgcolor='#". $cor1 ."'>\r");
                $this->escreveTela("    <TD>\r");
                $this->escreveTela("      <img src='diagnosis.php?button=" . $imagem . "' border='0'>\r", 'N', $imagem);
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("    <TD align='left' ". $cssText .">\r");
                $this->escreveTela("      ".$arr_lang['phpinipath'].": " . $teste_tmp . "\r");
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("  </TR>\r");
                //checa ini do php

                //checa scriptcasewriteable
                $teste_tmp = $obj_ambiente->GetScriptcaseWriteable();
                $imagem = "button_ok.png";
                if($teste_tmp=='off')
                {
                        $imagem = "button_cancel.png";
                }
                $this->escreveTela("  <TR bgcolor='#". $cor1 ."'>\r");
                $this->escreveTela("    <TD>\r");
                $this->escreveTela("      <img src='diagnosis.php?button=" . $imagem . "' border='0'>\r", 'N', $imagem);
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("    <TD align='left' ". $cssText .">\r");
                $this->escreveTela("      ".$arr_lang['sc_write_perm']."\r");
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("  </TR>\r");
                //checa scriptcasewriteable

                //checa escrita na sessao
                $teste_tmp = $obj_ambiente->GetSessionWriteable();
                $imagem = "button_ok.png";
                if($teste_tmp=='off')
                {
                        $imagem = "button_cancel.png";
                }
                $this->escreveTela("  <TR bgcolor='#". $cor2 ."'>\r");
                $this->escreveTela("    <TD>\r");
                $this->escreveTela("      <img src='diagnosis.php?button=" . $imagem . "' border='0'>\r", 'N', $imagem);
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("    <TD align='left' ". $cssText .">\r");
                $this->escreveTela("      ".$arr_lang['sess_write_perm']."\r");
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("  </TR>\r");
                //checa escrita na sessao

                //checa acesso a internet
                /*$teste_tmp = $obj_ambiente->GetInternetAcessSocks();
                $imagem = "button_ok.png";
                if($teste_tmp=='off')
                {
                        $imagem = "button_cancel.png";
                }*/
                $this->escreveTela("<!-- INTERNET_SOCKS -->");
                $this->escreveTela("  <TR bgcolor='#". $cor1 ."'>\r", 'N');
                $this->escreveTela("    <TD>\r", 'N');
                $this->escreveTela("      <span id='id_internet_img'></span>\r", 'N');
                $this->escreveTela("    </TD>\r", 'N');
                $this->escreveTela("    <TD align='left' ". $cssText .">\r", 'N');
                $this->escreveTela("      ".$arr_lang['acesso_internet']." - Socks\r", 'N');
                $this->escreveTela("      <span id='id_internet_text'> - ".$arr_lang['acesso_checando']."...</span>\r", 'N');
                $this->escreveTela("    </TD>\r", 'N');
                $this->escreveTela("  </TR>\r", 'N');
                //checa acesso a internet

                //checa permissao no zendid
                $teste_tmp = $obj_ambiente->GetZendIdPermission();
                $imagem = "button_ok.png";
                if($teste_tmp=='off')
                {
                        $imagem = "button_cancel.png";
                }
                $this->escreveTela("  <TR bgcolor='#". $cor2 ."'>\r");
                $this->escreveTela("    <TD>\r");
                $this->escreveTela("      <img src='diagnosis.php?button=" . $imagem . "' border='0'>\r", 'N', $imagem);
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("    <TD align='left' ". $cssText .">\r");
                $this->escreveTela("      ".$arr_lang['zendid_perm']."\r");
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("  </TR>\r");
                //checa permissao no zendid

                //checa mod5 do zendid
                $teste_tmp = $obj_ambiente->GetZendIdMd5();
                $imagem = "button_ok.png";
                if($teste_tmp=='off')
                {
					$imagem = "button_cancel.png";
                }
                $this->escreveTela("  <TR bgcolor='#". $cor2 ."'>\r");
                $this->escreveTela("    <TD>\r");
                $this->escreveTela("      <img src='diagnosis.php?button=" . $imagem . "' border='0'>\r", 'N', $imagem);
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("    <TD align='left' ". $cssText .">\r");
                $this->escreveTela("      ".$arr_lang['zendid_md5'].": ". $teste_tmp ."\r");
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("  </TR>\r");
                //checa mod5 do zendid
/*
                //checa id da maquina
                $teste_tmp = $obj_ambiente->GetZendIdinfo();
                $imagem = "button_ok.png";
                if(empty($teste_tmp))
                {
                        $imagem = "button_cancel.png";
                }
                $this->escreveTela("  <TR bgcolor='#". $cor2 ."'>\r");
                $this->escreveTela("    <TD>\r");
                $this->escreveTela("      <img src='diagnosis.php?button=" . $imagem . "' border='0'>\r", 'N', $imagem);
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("    <TD align='left' ". $cssText .">\r");
                $this->escreveTela("      ID: ". $teste_tmp ."\r");
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("  </TR>\r");
                //checa id da maquina
*/
                //checa popup
                $imagem = "button_ok.png";
                $this->escreveTela("  <TR bgcolor='#". $cor2 ."'>\r");
                $this->escreveTela("    <TD>\r");
                $this->escreveTela("      <img id='id_img' src='diagnosis.php?button=" . $imagem . "' border='0'>\r", 'N', $imagem);
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("    <TD align='left' ". $cssText .">\r");
                $this->escreveTela("      <span id='id_popup'>Popup: Erro</span>\r");
                $this->escreveTela("      <script type='text/JavaScript' language='JavaScript'>");
				$this->escreveTela("       var wTestPopup = window.open('', '', 'width=1,height=1,left=0,top=0,scrollbars=no');");
				$this->escreveTela("       if (wTestPopup)");
				$this->escreveTela("       {");
				$this->escreveTela("        document.getElementById('id_popup').innerHTML = 'Popup: OK';");
				$this->escreveTela("        wTestPopup.close();");
				$this->escreveTela("       }");
				$this->escreveTela("      </script>");
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("  </TR>\r");
                //checa se usa gd ou imagemagick

                $teste_tmp = $obj_ambiente->GetGdOrImagemagick();
                $imagem = "button_ok.png";
                $this->escreveTela("  <TR bgcolor='#". $cor1 ."'>\r");
                $this->escreveTela("    <TD>\r");
                $this->escreveTela("      <img src='diagnosis.php?button=" . $imagem . "' border='0'>\r", 'N', $imagem);
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("    <TD align='left' ". $cssText .">\r");
                $this->escreveTela("      ".$teste_tmp."\r");
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("  </TR>\r");
                //checa se usa gd ou imagemagick

                //checa cwd
                $teste_tmp = $obj_ambiente->GetCwd();
                $imagem = "button_ok.png";
                if(empty($teste_tmp))
                {
                        $imagem = "button_cancel.png";
                }
                $this->escreveTela("  <TR bgcolor='#". $cor2 ."'>\r");
                $this->escreveTela("    <TD>\r");
                $this->escreveTela("      <img src='diagnosis.php?button=" . $imagem . "' border='0'>\r", 'N', $imagem);
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("    <TD align='left' ". $cssText .">\r");
                $this->escreveTela("      ".$teste_tmp."\r");
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("  </TR>\r");
                //checa cwd

                //checa cwd
                $teste_tmp = $obj_ambiente->GetMbConvertEncoding();
                $imagem = "button_ok.png";
                if($teste_tmp=='off')
                {
					$imagem = "button_cancel.png";
                }
                $this->escreveTela("  <TR bgcolor='#". $cor2 ."'>\r");
                $this->escreveTela("    <TD>\r");
                $this->escreveTela("      <img src='diagnosis.php?button=" . $imagem . "' border='0'>\r", 'N', $imagem);
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("    <TD align='left' ". $cssText .">\r");
                $this->escreveTela("      mb_convert_encoding ".$teste_tmp."\r");
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("  </TR>\r");
                //checa cwd

                //checa cwd
                $teste_tmp = $obj_ambiente->GetIconv();
				$imagem = "button_ok.png";
                if($teste_tmp=='off')
                {
					$imagem = "button_cancel.png";
                }
                $this->escreveTela("  <TR bgcolor='#". $cor2 ."'>\r");
                $this->escreveTela("    <TD>\r");
                $this->escreveTela("      <img src='diagnosis.php?button=" . $imagem . "' border='0'>\r", 'N', $imagem);
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("    <TD align='left' ". $cssText .">\r");
                $this->escreveTela("      iconv ".$teste_tmp."\r");
                $this->escreveTela("    </TD>\r");
                $this->escreveTela("  </TR>\r");
                //checa cwd


                $this->escreveTela("</TABLE>\r");

                //checa acesso a internet
                $this->escreveTela("<script>document.getElementById('id_msg').innerHTML = '".$arr_lang['acesso_checando']."...';</script>\r", 'N');
				$obj_ambiente->SetInternetAcessSocks();
                $teste_tmp = $obj_ambiente->GetInternetAcessSocks();
                $imagem = "button_ok.png";
                $msg	= $arr_lang['ok'];
                $cor_erro_log = "#123456";
                if($teste_tmp=='off')
                {
                        $imagem = "button_cancel.png";
                        $msg	= $arr_lang['problema'];
                        $cor_erro_log = "#E71800";
                }
                $this->escreveTela("<script>document.getElementById('id_internet_img').innerHTML = \"<img src='diagnosis.php?button=" . $imagem . "' border='0'>\" </script> \r", 'N');
                $this->escreveTela("<script>document.getElementById('id_internet_text').innerHTML = \" - $msg\" </script>\r", 'N');

                $str_res_socks  = "  <TR bgcolor='#". $cor1 ."'>";
                $str_res_socks .= "	   <TD>";
                $str_res_socks .= "	     <font color='".$cor_erro_log."'>&nbsp;&nbsp; ".$msg." &nbsp;&nbsp;</font>\r";
                $str_res_socks .= "    </TD>\r";
                $str_res_socks .= "    <TD align='left' ". $cssText .">\r";
                $str_res_socks .= "      ".$arr_lang['acesso_internet']." - Socks\r";
                $str_res_socks .= "    </TD>\r";
                $str_res_socks .= "  </TR>\r";
                $this->v_str_dados = str_replace("<!-- INTERNET_SOCKS -->", $str_res_socks, $this->v_str_dados);
                //checa acesso a internet


                $this->createLogFile($log_file);

                if(is_file("tmp/" . $log_file))
                {
                        $this->escreveTela("
						<script>document.getElementById('id_msg').innerHTML = \"<a href='tmp/". $log_file ."'><font color='#0044C8'>".$arr_lang['mensagem_sucesso']."</font></a>\"</script>\r\n");
                }else
                {
                        $this->escreveTela("<script>document.getElementById('id_msg').innerHTML = '".$arr_lang['mensagem_fail']."';</script>\r");
                }
                $this->escreveTela("</BODY>\r");
                $this->escreveTela("</HTML>\r");
        }

        function escreveTela($str_string, $v_str_arquivo='S', $str_arq = '')
        {
        	$arr_lang = $this->getArrLang();

                if($v_str_arquivo=='S')
                {
                        $this->v_str_dados .= $str_string;
                }else
                {
                        if(strpos($str_arq, 'button_ok.png')!==false)
                        {
							$str_arq = "<font color='#123456'>&nbsp;&nbsp; ".$arr_lang['ok']." &nbsp;&nbsp;</font>";
							$this->v_str_dados .= $str_arq;
                        }elseif(strpos($str_arq, 'button_cancel.png')!==false)
                        {
							$str_arq = "<font color='#E71800'>&nbsp;&nbsp; ".$arr_lang['problema']." &nbsp;&nbsp;</font>";
							$this->v_str_dados .= $str_arq;
                        }
                }
                echo $str_string;
                flush();
        }

        function createLogFile($v_str_nome)
        {
                ob_start();
                phpinfo();
                $str_opt = "<BR /><BR /><CENTER>PHP INFO</CENTER><BR /><BR />\r" . ob_get_contents();
                ob_end_clean();

                $possibleErros = "";
                if(isset($_SESSION['nm_session']['error_msgs']) && is_array($_SESSION['nm_session']['error_msgs']))
                {
                        $possibleErros = implode("<BR />\r", $_SESSION['nm_session']['error_msgs']);
                }

                if(!is_dir('tmp'))
                {
                        @mkdir('tmp');
                }
                chdir('tmp');
                $hd = fopen($v_str_nome, "w+");
                fputs($hd, $this->v_str_dados . $str_opt . "<BR /><BR />Erros Poss�veis:<BR /><BR />" . $possibleErros);
                fclose($hd);
                chdir("..");
        }
}

function nm_load_class($a, $b)
{
}
function nm_dir_normalize($v_str_dir)
{
    $str_dir = str_replace("\\", '/', $v_str_dir);
    $str_dir = str_replace('//', '/', $str_dir);
    if ('/' != substr($str_dir, -1))
    {
        $str_dir .= '/';
    }
    return $str_dir;
} // nm_dir_normalize
function treatError($int_error_level, $str_error_msg, $str_error_file, $int_error_line)
{
        $error_msg = "Erro Level: " . $int_error_level . "; Mensagem: " . $str_error_msg . "; Arquivo: " . $str_error_file . "; Linha: " . $int_error_line;
        $_SESSION['nm_session']['error_msgs'][]         = $error_msg;
}

set_error_handler('treatError');
$obj_diag        = new diagnosis();
$obj_diag->makeDiagnosis();
?>
