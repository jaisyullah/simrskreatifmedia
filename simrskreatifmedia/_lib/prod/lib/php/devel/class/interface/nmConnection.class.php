<?php

class nmConnection
{

    function __construct()
    {
    } // nmConnection


    function TestConn($arr_conn)
    {
    	global $nm_config;

    	$bol_conn   = FALSE;
    	$str_db_err = '';

        $str_dbms                  = isset($arr_conn['dbms']) ? $arr_conn['dbms'] : "";
        $str_host                  = isset($arr_conn['host']) ? $arr_conn['host'] : "";
        $str_user                  = isset($arr_conn['user']) ? $arr_conn['user'] : "";
        $str_pass                  = isset($arr_conn['pass']) ? $arr_conn['pass'] : "";
        $str_base                  = isset($arr_conn['base']) ? $arr_conn['base'] : "";
        $postgres_encoding         = isset($arr_conn['postgres_encoding']) ? $arr_conn['postgres_encoding'] : "";
        $oracle_encoding           = isset($arr_conn['oracle_encoding']) ? $arr_conn['oracle_encoding'] : "";
        $mysql_encoding            = isset($arr_conn['mysql_encoding']) ? $arr_conn['mysql_encoding'] : "";
        $str_db2_autocommit        = isset($arr_conn['db2_autocommit']) ? $arr_conn['db2_autocommit'] : "";
        $str_db2_i5_lib            = isset($arr_conn['db2_i5_lib']) ? $arr_conn['db2_i5_lib'] : "";
        $str_db2_i5_naming         = isset($arr_conn['db2_i5_naming']) ? $arr_conn['db2_i5_naming'] : "";
        $str_db2_i5_commit         = isset($arr_conn['db2_i5_commit']) ? $arr_conn['db2_i5_commit'] : "";
        $str_db2_i5_query_optimize = isset($arr_conn['db2_i5_query_optimize']) ? $arr_conn['db2_i5_query_optimize'] : "";
        $str_date_separator        = isset($arr_conn['date_separator']) ? $arr_conn['date_separator'] : "";
        $str_use_persistent        = isset($arr_conn['use_persistent']) ? $arr_conn['use_persistent'] : "";
        $str_use_schema            = isset($arr_conn['use_schema']) ? $arr_conn['use_schema'] : "";
		
        $use_ssl                   = isset($arr_conn['use_ssl']) ? $arr_conn['use_ssl'] : "N";
        $mysql_ssl_key             = isset($arr_conn['mysql_ssl_key']) ? $arr_conn['mysql_ssl_key'] : "";
        $mysql_ssl_cert            = isset($arr_conn['mysql_ssl_cert']) ? $arr_conn['mysql_ssl_cert'] : "";
        $mysql_ssl_capath          = isset($arr_conn['mysql_ssl_capath']) ? $arr_conn['mysql_ssl_capath'] : "";
        $mysql_ssl_ca              = isset($arr_conn['mysql_ssl_ca']) ? $arr_conn['mysql_ssl_ca'] : "";
        $mysql_ssl_cipher          = isset($arr_conn['mysql_ssl_cipher']) ? $arr_conn['mysql_ssl_cipher'] : "";


        if (!extension_loaded($this->DbModule($str_dbms)))
        {
            $str_db_err = 'error_profile_test_module';
        }
        else
        {
            include_once $nm_config['path_prod'] . '../../third/adodb/adodb.inc.php';
            $arrExtraArgs              = array();
            $str_execute_after_connect = "";
			$str_charset               = "";

            $bol_persistent = false;
            if($str_use_persistent == "Y")
            {
            	$bol_persistent = true;
            }
			$obj_db = ADONewConnection($this->DbAdodbModule($str_dbms));
            if ('ado_mssql' == $str_dbms)
            {
                $str_host = 'PROVIDER=MSDASQL;DRIVER={SQL Server};'
                          . 'SERVER='   . str_replace(":", ",", $str_host) . ';'
                          . 'UID='      . $str_user . ';'
                          . 'PWD='      . $str_pass . ';'
                          . 'DATABASE=' . $str_base . ';';
                $str_user = '';
                $str_pass = '';
                $str_base = '';
            }
            else if ('adooledb_mssql' == $str_dbms)
            {
                $str_host = 'PROVIDER=SQLOLEDB;'
                          . 'Data Source='   . str_replace(":", ",", $str_host) . ';'
                          . 'uid='      . $str_user . ';'
                          . 'pwd='      . $str_pass . ';'
                          . 'DATABASE=' . $str_base . ';';
                $str_user = '';
                $str_pass = '';
                $str_base = '';
            }
            elseif ('db2' == $str_dbms)
            {
            	$arrExtraArgs = array();
            	if(!empty($str_db2_autocommit))
            	{
            		$arrExtraArgs['autocommit']        = (int) $str_db2_autocommit;
            	}
            	if(!empty($str_db2_i5_lib))
            	{
            		$arrExtraArgs['i5_lib']            = $str_db2_i5_lib;
            	}
            	if(!empty($str_db2_i5_naming))
            	{
            		$arrExtraArgs['i5_naming']         = (int) $str_db2_i5_naming;
            	}
            	if(!empty($str_db2_i5_commit))
            	{
            		$arrExtraArgs['i5_commit']         = (int) $str_db2_i5_commit;
            	}
            	if(!empty($str_db2_i5_query_optimize))
            	{
            		$arrExtraArgs['i5_query_optimize'] = (int) $str_db2_i5_query_optimize;
            	}

		        $str_host  = $str_host;
		    	$str_user  = $str_user;
		        $str_pass  = $str_pass;
		        $str_base  = $str_base;
            }
			elseif ($str_dbms == "db2_odbc")
			{
				$str_port = "50000";

				if(strpos($str_host, ":") !== false)
				{
					$arr_tmp_list_change = explode(":", $str_host);
					list($str_host, $str_port) = $arr_tmp_list_change;
				}

				$str_host  = "driver={IBM db2 odbc DRIVER};Database=". $str_base .";hostname=". $str_host .";port=". $str_port .";protocol=TCPIP;";
				$str_host .= "uid=". $str_user ."; pwd=" . $str_pass;
				$str_user  = '';
				$str_pass  = '';
				$str_base  = '';
			}
            elseif ('postgres' == $str_dbms || 'postgres7' == $str_dbms || 'postgres8' == $str_dbms || 'postgres64' == $str_dbms)
			{
				if(!empty($postgres_encoding))
            	{
            		$str_execute_after_connect = "SET CLIENT_ENCODING TO '". $postgres_encoding ."'";
            		$str_charset = $postgres_encoding;
            	}

				$str_host  = $str_host;
		    	$str_user  = $str_user;
		        $str_pass  = $str_pass;
		        $str_base  = $str_base;
			}
            elseif ('oracle' == $str_dbms || 'oci' == $str_dbms || 'oci8' == $str_dbms || 'oci805' == $str_dbms || 'oci8po' == $str_dbms)
			{
				if(!empty($oracle_encoding))
            	{
            		$obj_db->charSet = $oracle_encoding;
            	}

				$str_host  = $str_host;
		    	$str_user  = $str_user;
		        $str_pass  = $str_pass;
		        $str_base  = $str_base;
			}
            elseif ('pdosqlite' == $str_dbms)
            {
                $str_host = "sqlite:" . $str_host;
            }
            elseif ('pdo_informix' == $str_dbms)
            {
            	$str_host  = $str_host;
		    	$str_user  = $str_user;
		        $str_pass  = $str_pass;
		        $str_base  = $str_base;

		        if(empty($str_host) && !empty($str_base))
		        {
		        	$str_host = "informix:DSN=" . $str_host;
		        	$str_base = "";
		        }else
		        {
		        	$str_port   = "9088";
			    	$str_server = "";
			    	if(strpos($str_host, ":") !== false)
			    	{
			    		$arr_tmp_list_change = explode(":", $str_host);
			    		list($str_host, $str_port) = $arr_tmp_list_change;
			    	}
		        	if(strpos($str_host, "\\") !== false)
			    	{
			    		$arr_tmp_list_change = explode("\\", $str_host);
			    		list($str_host, $str_server) = $arr_tmp_list_change;
			    	}
		        	$str_host = "informix:host=". $str_host ."; service=". $str_port ."; database=". $str_base ."; server=". $str_server ."; protocol=onsoctcp; EnableScrollableCursors=1";
		        }
            }
            elseif ('pdo_mysql' == $str_dbms)
            {
            	if(!empty($mysql_encoding))
            	{
            		$str_execute_after_connect = "SET NAMES '". $mysql_encoding ."'";
					$str_charset = $mysql_encoding;
            	}

            	//$str_host = $servidor;
		    	$port = "";
				if(strpos($str_host, ":") !== false)
				{
					$arr_tmp_list_change = explode(":", $str_host);
					list($str_host, $port) = $arr_tmp_list_change;
				}

			    $str_host = "mysql:host=" . $str_host;
			    if(!empty($port))
			    {
			    	$str_host .= ";port=" . $port;
			    }
				if($use_ssl == 'Y')
				{
					if(!empty($mysql_ssl_key))
					{
						$arrExtraArgs[ PDO::MYSQL_ATTR_SSL_KEY ] = $mysql_ssl_key;
					}
					if(!empty($mysql_ssl_cert))
					{
						$arrExtraArgs[ PDO::MYSQL_ATTR_SSL_CERT ] = $mysql_ssl_cert;
					}
					if(!empty($mysql_ssl_ca))
					{
						$arrExtraArgs[ PDO::MYSQL_ATTR_SSL_CA ] = $mysql_ssl_ca;
					}
					if(!empty($mysql_ssl_capath))
					{
						$arrExtraArgs[ PDO::MYSQL_ATTR_SSL_CAPATH ] = $mysql_ssl_capath;
					}
					if(!empty($mysql_ssl_cipher))
					{
						$arrExtraArgs[ PDO::MYSQL_ATTR_SSL_CIPHER ] = $mysql_ssl_cipher;
					}

					if(empty($mysql_ssl_key) || empty($mysql_ssl_cert) || empty($mysql_ssl_ca))
	                {
	                    //dados bebos e desabiilta o mysql para verificar os certificados
	                    if(empty($mysql_ssl_key))
	                    {
	                        $arrExtraArgs[ PDO::MYSQL_ATTR_SSL_KEY ] = "client-key.pem";
	                    }
	                    if(empty($mysql_ssl_cert))
	                    {
	                        $arrExtraArgs[ PDO::MYSQL_ATTR_SSL_CERT ] = "client-cert.pem";
	                    }
	                    if(empty($mysql_ssl_ca))
	                    {
	                        $arrExtraArgs[ PDO::MYSQL_ATTR_SSL_CA ] = "server-ca.pem";
	                    }
	                    $arrExtraArgs[ PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT ] = false;
	                }
				}

            	$str_user  = $str_user;
		        $str_pass  = $str_pass;
		        $str_base  = $str_base;
            }
            elseif ('pdo_firebird' == $str_dbms)
            {
            	//$str_host = $servidor;
		    	$port = "";
				if(strpos($str_host, ":") !== false)
				{
					$arr_tmp_list_change = explode(":", $str_host);
					list($str_host, $port) = $arr_tmp_list_change;
				}

			    $str_host = "firebird:dbname=" . $str_host;
			    if(!empty($port))
			    {
			    	$str_host .= "/" . $port;
			    }
			    if(!empty($str_base))
			    {
			    	$str_host .= ":" . $str_base;
			    }

            	$str_user  = $str_user;
		        $str_pass  = $str_pass;
		        $str_base  = "";
            }
            elseif ('pdo_pgsql' == $str_dbms)
            {
            	if(!empty($postgres_encoding))
            	{
            		$str_execute_after_connect = "SET CLIENT_ENCODING TO '". $postgres_encoding ."'";
					$str_charset = $postgres_encoding;
            	}

            	//$str_host = $servidor;
		    	$port = "";
				if(strpos($str_host, ":") !== false)
				{
					$arr_tmp_list_change = explode(":", $str_host);
					list($str_host, $port) = $arr_tmp_list_change;
				}

			    $str_host = "pgsql:host=" . $str_host;
			    if(!empty($port))
			    {
			    	$str_host .= ";port=" . $port;
			    }

            	$str_user  = $str_user;
		        $str_pass  = $str_pass;
		        $str_base  = $str_base;
            }
            elseif ('pdo_sqlsrv' == $str_dbms)
            {
	           $port = "";
               if(strpos($str_host, ":") !== false)
               {
                   $arr_tmp_list_change = explode(":", $str_host);
                   list($str_host, $port) = $arr_tmp_list_change;
               }

               $str_host = "sqlsrv:ConnectionPooling=0;Server=" . $str_host;
               if(!empty($port))
               {
                   $str_host .= "," . $port;
               }
               if(!empty($str_base))
               {
                   $str_host .= ";Database=" . $str_base;
               }

               $str_base  = "";

            }
            elseif ('pdo_dblib' == $str_dbms || 'pdo_sybase_dblib' == $str_dbms)
            {
	           $str_host = "dblib:host=" . $str_host;
               if(!empty($str_base))
               {
                   $str_host .= ";dbname=" . $str_base;
               }

               $str_base  = "";

            }
            elseif ('pdo_oracle' == $str_dbms)
            {
	           $str_host = "oci:dbname=" . $str_base;
	           if(!empty($oracle_encoding))
               {
            		$str_host .= ";charset=" . $oracle_encoding;
               }
               
               $str_base  = "";
            }
            elseif ('pdo_odbc' == $str_dbms || 'pdo_sybase_odbc' == $str_dbms || 'pdo_db2_odbc' == $str_dbms || 'pdo_progress_odbc' == $str_dbms)
            {
	           $str_host = "odbc:host=" . $str_host;
               
               $str_base  = "";

            }
            elseif ('pdo_ibm' == $str_dbms)
            {
	           $port = "";
	           if(strpos($str_host, ":") !== false)
	           {
	               $arr_tmp_list_change = explode(":", $str_host);
	               list($str_host, $port) = $arr_tmp_list_change;
	           }

	           $str_host = "ibm:HOSTNAME=" . $str_host;
	           if(!empty($str_base))
               {
                   $str_host .= ";DATABASE=" . $str_base;
               }
               if(!empty($port))
	           {
	               $str_host .= ";PORT=" . $port;
	           }
               
               $str_base  = "";

            }
            elseif ('firebird' == $str_dbms)
            {
	           $str_host = str_replace(":", "/", $str_host);
            }
            elseif ('mssql' == $str_dbms || 'mssqlnative' == $str_dbms)
            {
	           $str_host = str_replace(":", ",", $str_host);
            }
            elseif ('mysql' == $str_dbms || 'mysqli' == $str_dbms || 'mysqlt' == $str_dbms)
			{
				if(!empty($mysql_encoding))
            	{
            		$str_execute_after_connect = "SET NAMES '". $mysql_encoding ."'";
					$str_charset = $mysql_encoding;
            	}
				
				if($use_ssl == 'Y')
				{
                    if($str_dbms == 'mysqli')
                    {
                        $obj_db->clientFlags = MYSQLI_CLIENT_SSL;
                    }
                    else
                    {
                        $obj_db->clientFlags = MYSQL_CLIENT_SSL;
                    }
				}

				$str_host  = $str_host;
		    	$str_user  = $str_user;
		        $str_pass  = $str_pass;
		        $str_base  = $str_base;
			}

            /* Cria nova conexao ADOdb */
            set_error_handler('nm_prod_error_handler');

            if($bol_persistent)
		    {
		    	$obj_db->PConnect($str_host, $str_user, $str_pass, $str_base, $arrExtraArgs, $str_charset);
		    }else
		    {
		    	$obj_db->Connect($str_host, $str_user, $str_pass, $str_base, false, $arrExtraArgs, $str_charset);
		    }

		    if(!empty($str_execute_after_connect))
		    {
		    	$obj_db->Execute($str_execute_after_connect);
		    }

            /* Verifica sucesso da conexao */
            if (FALSE != $obj_db->_connectionID)
            {
                if ('interbase' == $this->DbType($str_dbms))
                {
                    if (function_exists('ibase_timefmt'))
                	{
                		ibase_timefmt('%Y-%m-%d %H:%M:%S');
                	}else
                	{
                		ini_set("ibase.dateformat"     , '%Y-%m-%d %H:%M:%S');
                		ini_set("ibase.timestampformat", '%Y-%m-%d %H:%M:%S');
						ini_set("ibase.timeformat"     , '%H:%M:%S');
                	}
                }
                elseif ('sybase' == $str_dbms)
                {
                    sybase_min_client_severity(11);
                    sybase_min_server_severity(11);
                }

                if (nm_prod_error_filter($obj_db->ErrorMsg()))
                {
                    $str_db_err = $obj_db->ErrorMsg();
                }
                else
                {
                    $bol_conn = TRUE;
                }
            }
            else
            {
                $str_db_err = "Unable to connect: " . $obj_db->ErrorMsg();
            }
		}

		return ($bol_conn ? "" : $str_db_err);

    }//TestConn

    function SaveConn($arr_ini)
    {
    	global $nm_config;

		$prod_ini_file = $nm_config['path_conf'] . 'prod.config.php';

	    if (!is_dir($nm_config['path_conf']))
	    {
	        nm_dir_create($nm_config['path_conf']);
	    }

		$_SESSION['nm_session']['cache']['prod_v8'] = $arr_ini;

		file_put_contents($prod_ini_file, "<?php /*" . serialize($arr_ini) . "*/ ?>");
    }//SaveConn

	function DbModule($v_str_dbms)
	{
	    switch ($v_str_dbms)
	    {
	        /* ADO */
	        case 'ado':
	        case 'ace_access':
            case 'ado_access':
	        case 'ado_mssql':
            case 'adooledb_mssql':
	            if (5 == nm_php_version())
	            {
	                return 'com_dotnet';
	            }
	            else
	            {
	                return 'com';
	            }
	            break;
	        /* Frontbase */
	        case 'fbsql':
	            return 'fbsql';
	            break;
	        /* IBM Db2 */
	        case 'db2':
	        case 'db2_odbc':
	            return 'ibm_db2';
	            break;
	        /* Informix */
	        case 'informix':
	        case 'informix72':
	            return 'informix';
	            break;
	        /* Interbase */
	        case 'borland_ibase':
	        case 'firebird':
	        case 'ibase':
	            return 'interbase';
	            break;
	        case 'pdo_firebird':
	            return 'pdo_firebird';
	            break;
	        /* MS SQL Server */
	        case 'mssql':
	        case 'mssqlpo':
	            return 'mssql';
	            break;
	        /* MS SQL Server Nativo SRV */
	        case 'mssqlnative':
	            return 'sqlsrv';
	            break;
	        /* MySQL */
	        case 'maxsql':
	        case 'mysql':
	        case 'mysqlt':
	            return 'mysql';
	            break;
	        /* ODBC */
	        case 'mysqli':
	            return 'mysqli';
	            break;
	        /* ODBC */
	        case 'access':
	        case 'odbc_db2':
	        case 'odbc_db2v6':
	        case 'odbc':
	        case 'odbc_access':
	        case 'odbc_mssql':
	        case 'odbc_oracle':
	        case 'sapdb':
	        case 'sqlanywhere':
	        case 'vfp':
	        case 'progress':
	            return 'odbc';
	            break;
	        /* Oracle */
	        case 'oci8':
	        case 'oci805':
	        case 'oci8po':
	            return 'oci8';
	            break;
	        case 'oracle':
	            return 'oracle';
	            break;
	        /* SQLite PDO */
	        case 'pdosqlite':
	            return 'pdo_sqlite';
	            break;
	        case 'pdo_informix':
	            return 'pdo_informix';
	            break;
	        case 'pdo_mysql':
	            return 'pdo_mysql';
	            break;
	        case 'pdo_pgsql':
	            return 'pdo_pgsql';
	            break;
	        case 'pdo_sqlsrv':
	            return 'pdo_sqlsrv';
	            break;
	        case 'pdo_dblib':
	        case 'pdo_sybase_dblib':
	            return 'pdo_dblib';
	            break;
	        case 'pdo_sybase_odbc':
	        case 'pdo_db2_odbc':
	        case 'pdo_progress_odbc':
	            return 'pdo_odbc';
	            break;
	        case 'pdo_ibm':
	            return 'pdo_ibm';
	            break;
	        case 'pdo_oracle':
	            return 'pdo_oci';
	            break;
	        /* PostGreSQL */
	        case 'postgres':
	        case 'postgres64':
	        case 'postgres7':
	            return 'pgsql';
	            break;
	        /* SQLite */
	        case 'sqlite':
	            return 'sqlite';
	            break;
	        /* SQLite */
	        case 'sqlite3':
	            return 'sqlite3';
	            break;
	        /* Sybase */
	        case 'sybase':
	            return 'sybase_ct';
	            break;
	        /* Outros */
	        default:
	            return FALSE;
	            break;
	    }
	} // nm_db_module

	/**
	 * Retorna o modulo do adodb.
	 *
	 * Retorna o modulo do adodb responsavel pela comunicacao com o banco de dados.
	 *
	 * @access  public
	 * @param   string  $v_str_dbms  Banco de dados.
	 * @return  string  $str_result  Modulo do PHP.
	 */
	function DbAdodbModule($v_str_dbms)
	{
	    switch ($v_str_dbms)
	    {
	        /* DB2 */
	        case 'db2_odbc':
	            return 'db2';
	            break;
	        /* DB2 */
	        case 'odbc_db2v6':
	            return 'odbc_db2';
	            break;
	        /* SQLite PDO */
	        case 'pdosqlite':
	        case 'pdo_informix':
	        case 'pdo_mysql':
	        case 'pdo_pgsql':
	        case 'pdo_sqlsrv':
	        case 'pdo_dblib':
	        case 'pdo_sybase_odbc':
	        case 'pdo_firebird':
	        case 'pdo_oracle':
	        case 'pdo_sybase_dblib':
	        case 'pdo_db2_odbc':
	        case 'pdo_ibm':
	        case 'pdo_progress_odbc':
	            return 'pdo';
	            break;
	        case 'dbf':
	        case 'filemaker':
	        case 'progress':
	            return 'odbc';
	            break;
	        /* Outros */
	        default:
	            return $v_str_dbms;
	            break;
	    }
	} // nm_db_module

	function DbType($v_str_dbms)
	{
		switch ($v_str_dbms)
	    {
	        /* Access  */
	        case 'access':
	        case 'ace_access':
            case 'ado_access':
	            return 'access';
	        break;
	        /* ADO */
	        case 'ado':
	            return 'ado';
	        break;
	        /* DB2 */
	        case 'db2':
	        case 'db2_odbc':
	        case 'odbc_db2':
	        case 'odbc_db2v6':
	        case 'pdo_db2_odbc':
	        case 'pdo_ibm':
	            return 'db2';
	        break;
	        /* Frontbase */
	        case 'fbsql':
	            return 'fbsql';
	        break;
	        /* Informix */
	        case 'informix':
	        case 'pdo_informix':
	        case 'informix72':
	            return 'informix';
	        break;
	        /* Interbase */
	        case 'borland_ibase':
	        case 'firebird':
	        case 'ibase':
	        case 'pdo_firebird':
	            return 'interbase';
	        break;
	        /* MS-SQL Server */
	        case 'ado_mssql':
            case 'adooledb_mssql':
	        case 'mssql':
	        case 'mssqlnative':
	        case 'mssqlpo':
	        case 'pdo_sqlsrv':
	        case 'odbc_mssql':
	        case 'pdo_dblib':
	            return 'mssql';
	        break;
	        /* MySQL */
	        case 'mysql':
	        case 'mysqlt':
	        case 'pdo_mysql':
	        case 'mysqli':
	            return 'mysql';
	        break;
	        /* ODBC */
	        case 'odbc':
	            return 'odbc';
	        break;
	        /* Oracle */
	        case 'oci8':
	        case 'oci805':
	        case 'oci8po':
	        case 'odbc_oracle':
	        case 'oracle':
	        case 'pdo_oracle':
	            return 'oracle';
	        break;
	        /* PostGreSQL */
	        case 'postgres':
	        case 'postgres64':
	        case 'postgres7':
	        case 'pdo_pgsql':
	            return 'postgres';
	        break;
	        /* SQLite */
	        case 'pdosqlite':
	        case 'sqlite':
	            return 'sqlite';
	        break;
	        /* Sybase */
	        case 'sqlanywhere':
	        case 'sybase':
	        case 'pdo_sybase_odbc':
	        case 'pdo_sybase_dblib':
	            return 'sybase';
	        break;
	        case 'progress':
	        case 'pdo_progress_odbc':
	            return 'progress';
	        break;
	        /* Visual Fox Pro */
	        case 'vfp':
	            return 'vfp';
	        break;
	        /* Outros */
	        default:
	            return FALSE;
	        break;
	    }
	} // DbType


    function GetSGBDVersions()
    {
		return
            [
				    'access' =>
                        [
				            'ace_access' => 'MS Access ADO',
//				            'ace_access' => 'MS Access ADO ACE OLEDB',
//                            'ado_access' => 'MS Access ADO Jet OLEDB 32bits',
				            'access' => 'MS Access ODBC'
                        ],

				    'db2' =>
                        [
				            'pdo_db2_odbc' => 'DB2 PDO ODBC',
				            'pdo_ibm'      => 'PDO IBM',
				            'db2'          => 'DB2',
				            'db2_odbc'     => 'DB2 Native ODBC',
				            'odbc_db2'     => 'DB2 Generic ODBC',
				            'odbc_db2v6'   => 'DB2 Generic ODBC 6 or Lower'
                        ],

				    'firebird' =>
                        [
				            'firebird'     => 'Firebird',
				            'pdo_firebird' => 'Firebird PDO'
                        ],

				    'ibase' =>
                        [
				            'borland_ibase' => 'Interbase 6.5 or Higher',
				            'ibase' => 'Interbase'
                        ],

				    'informix' =>
                        [
				            'informix' => 'Informix',
				            'pdo_informix' => 'Informix PDO',
				            'informix72' => 'Informix 7.2 or Lower'
                        ],

				    'maxsql' =>
                        [
				            'maxsql' => 'MaxSQL'
                        ],

				    'mssql' =>
                        [
//				            'ado_mssql' => 'MSSQL Server ADO MSDASQL',
//                            'adooledb_mssql' => 'MSSQL Server ADO SQLOLEDB',
				            'mssql' => 'MSSQL Server',
				            'pdo_sqlsrv' => 'MSSQL Server NATIVE SRV PDO',
				            'mssqlnative' => 'MSSQL Server NATIVE SRV',
				            'odbc_mssql' => 'MSSQL Server ODBC',
				            'pdo_dblib' => 'DBLIB'
                        ],

				    'mysql' =>
                        [
                            'pdo_mysql' => 'MySQL PDO',
					        'mysqli' => 'MySQLi',
					        'mysqlt' => 'MySQL (Transaction)',
				            'mysql' => 'MySQL'
                        ],

				    'odbc' =>
                        [
				            'odbc' => 'Generic ODBC'
                        ],

				    'oracle' =>
                        [
				            'pdo_oracle' => 'Oracle PDO',
				            'oci805' => 'Oracle 8.0.5 or Higher',
				            'oci8' => 'Oracle 8',
				            'oci8po' => 'Oracle 8 Portable',
				            'odbc_oracle' => 'Oracle ODBC'
                        ],

				    'postgres' =>
                        [
				            'postgres7'  => 'PostgreSQL 7 or Higher',
				            'postgres'   => 'PostgreSQL',
				            'pdo_pgsql'  => 'PostgreSQL PDO',
				            'postgres64' => 'PostgreSQL 6.4'
                        ],

				    'progress' =>
                        [
				            'progress' => 'Progress'
                        ],

				    'sqlite' =>
                        [
				            'pdosqlite' => 'SQLite PDO',
				            //'sqlite3' => 'SQLite 3',
				            'sqlite' => 'SQLite',
                        ],

				    'sybase' =>
                        [
				            'pdo_sybase_dblib' => 'Sybase PDO DBLIB',
				            'pdo_sybase_odbc' => 'Sybase PDO ODBC',
				            'sybase' => 'Sybase',
                        ]/*,

				    'vfp' => Array
				        (
				            'vfp' => 'Visual FoxPro'
				        )*/

            ];

    } // GetSGBDVersions


    function GetSGBDS()
    {

        $arr_ret = [
//            'maxsql' => [
//                'maxsql' => 'MaxSQL'
//            ],
            'mysql' => [
                'mysql' => 'MySQL / MariaDB'
            ],
            'mssql' => [
                'mssql' => 'MSSQL Server'
            ],
            'postgres' => [
                'postgres' => 'PostgreSQL'
            ],
            'oracle' => [
                'oracle' => 'Oracle'
            ],
            'sqlite' => [
                'pdosqlite' => 'SQLite PDO',
                'sqlite' => 'SQLite',
            ],
            'progress' => [
                'progress' => 'Progress'
            ],
            'access' => [
                'access' => 'MS Access'
            ],
            'db2' => [
                'db2' => 'DB2'
            ],
            'firebird' => [
                'firebird' => 'Firebird'
            ],
            'ibase' => [
                'ibase' => 'Interbase'
            ],
            'informix' => [
                'informix' => 'Informix'
            ],
            'sybase' => [
                'sybase' => 'Sybase'
            ],
            'odbc' => [
                'odbc' => 'Generic ODBC'
            ],
//            'vfp' => [
//                'vfp' => 'Visual FoxPro'
//            ]
        ];

        return $arr_ret;

    } // GetSGBDS
}
?>