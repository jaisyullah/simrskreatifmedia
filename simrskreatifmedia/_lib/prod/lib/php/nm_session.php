<?php

class sc_session implements SessionHandlerInterface{
    var $link;
    var $sessTable = 'sc_tbsess';
    var $useLobDec = false;
    var $useLobEnc = false;
    var $lobObj    = '';
    var $lobType   = '';

    function open($savePath, $sessionName) {
        global $sc_sess_db, $sc_sess_dbms, $sc_sess_sch, $sc_sess_tab;
        $this->link = false;
        if (isset($sc_sess_db)) {
        	
        	if(empty($sc_sess_tab))
            {
            	$sc_sess_tab = $this->sessTable;
            }
        	
            $this->link      = $sc_sess_db;
            $this->sessTable = $sc_sess_sch . $sc_sess_tab;
            $this->useLobDec = $this->sc_db_decode($sc_sess_dbms);
            $this->useLobEnc = $this->sc_db_encode($sc_sess_dbms);
            $this->lobObj    = $this->sc_db_lob($sc_sess_dbms);
            $this->lobType   = $this->sc_db_lob_type($sc_sess_dbms);
            return true;
        }
        return false;
    } // open

    function close() {
        return true;
    } // close

    function read($sId) {
        $sSql = 'SELECT sess_data FROM ' . $this->sessTable . ' WHERE sess_id = ' . $this->link->qstr($sId);
        $oRs  = $this->link->Execute($sSql);
        if ($oRs && !$oRs->EOF) {
            return $oRs->fields[0];
        }
        return '';
    } // read

    function write($sId, $sData) {
        $sSql = 'SELECT * FROM ' . $this->sessTable . ' WHERE sess_id = ' . $this->link->qstr($sId);
        $oRs  = $this->link->Execute($sSql);
        if ($oRs && !$oRs->EOF) {
            if ($this->useLobEnc) {
                $sSql = 'UPDATE ' . $this->sessTable . ' SET sess_last_access = ' . time()
                      . ' WHERE sess_id = ' . $this->link->qstr($sId);
                $oRs  = $this->link->Execute($sSql);
                if ($oRs) {
                    $this->link->UpdateBlob($this->sessTable,
                                            'sess_data',
                                            $this->quoteLob($sData),
                                            'sess_id = ' . $this->link->qstr($sId),
                                            $this->lobType);
                    return true;
                }
            }
            else {
                $sSql = 'UPDATE ' . $this->sessTable . ' SET sess_data = ' . $this->link->qstr($sData)
                      . ', sess_last_access = ' . time()
                      . ' WHERE sess_id = ' . $this->link->qstr($sId);
                $oRs  = $this->link->Execute($sSql);
                if ($oRs) {
                    return true;
                }
            }
        }
        else {
            if ($this->useLobEnc) {
                $sSql = 'INSERT INTO ' . $this->sessTable . ' (sess_id, sess_last_access, sess_data) VALUES (' . $this->link->qstr($sId)
                      . ', ' . time() . ', ' . $this->lobObj . ')';
                $oRs  = $this->link->Execute($sSql);
                if ($oRs) {
                    $this->link->UpdateBlob($this->sessTable,
                                            'sess_data',
                                            $this->quoteLob($sData),
                                            'sess_id = ' . $this->link->qstr($sId),
                                            $this->lobType);
                    return true;
                }
            }
            else {
                $sSql = 'INSERT INTO ' . $this->sessTable . ' (sess_id, sess_last_access, sess_data) VALUES (' . $this->link->qstr($sId)
                      . ', ' . time() . ', ' . $this->link->qstr($sData) . ')';
                $oRs  = $this->link->Execute($sSql);
                if ($oRs) {
                    return true;
                }
            }
        }
        return false;
    } // write

    function destroy($sId) {
        $sSql = 'DELETE FROM ' . $this->sessTable . ' WHERE sess_id = ' . $this->link->qstr($sId);
        $oRs  = $this->link->Execute($sSql);
        if ($oRs) {
            return true;
        }
        return false;
    } // destroy

    function gc($iMaxLifeTime) {
        $sSql = 'DELETE FROM ' . $this->sessTable . ' WHERE sess_last_access < ' . (time() - $iMaxLifeTime);
        $oRs  = $this->link->Execute($sSql);
        return true;
    } // gc

    function quoteLob($sStr) {
        return substr($this->link->qstr($sStr), 1, -1);
    } // quoteLob

    function testTable($oLink, $sTab, $sSch) {
    	
        if(!$oLink)
        {
            return false;
        }

    	if(empty($sTab))
    	{
    		$sTab = $this->sessTable;
    	}
    	if(!empty($sSch))
    	{
    		$sSch = $sSch . ".";
    	}
        $sSql = 'SELECT COUNT(*) FROM ' . $sSch . $this->sessTable;
        $oRs  = $oLink->Execute($sSql);
        if ($oRs && !$oRs->EOF) {
            return true;
        }
        return false;
    } // testTable

    function conect($perfil, $tab_name, $dir, $dir_prod_conf="")
    {
        global $sc_sess_dbms;

        if (!empty($tab_name))
        {
            $this->sessTable = $tab_name;
        }
        if (!defined('NM_INC_PROD_INI'))
        {
            include_once($dir . "/lib/php/nm_ini_lib.php");
            include_once($dir . "/lib/php/nm_serialize.php");
        }
        include_once($dir . '/third/adodb/adodb.inc.php');
        $conf_dir      = substr($dir, 0, strrpos($dir, '/'));
        $conf_dir     .= '/conf';
        if(empty($dir_prod_conf))
        {
           $dir_prod_conf = $conf_dir;
        }

        $prod_ini_file = $dir_prod_conf . "/prod.config.php";
        $prod_ini_xml  = nm_unserialize_ini($prod_ini_file);
        if (isset($prod_ini_xml["PROFILE"]) && is_array($prod_ini_xml["PROFILE"]) && in_array($perfil, array_keys($prod_ini_xml["PROFILE"])))
        {
            if ("Y" == $prod_ini_xml["PROFILE"][$perfil]["USE_HOST"])
            {
                $servidor = decode_string($prod_ini_xml["PROFILE"][$perfil]["VAL_HOST"]);
            }
            if ("Y" == $prod_ini_xml["PROFILE"][$perfil]["USE_USER"])
            {
                $usuario = decode_string($prod_ini_xml["PROFILE"][$perfil]["VAL_USER"]);
            }
            if ("Y" == $prod_ini_xml["PROFILE"][$perfil]["USE_PASS"])
            {
                $dec_senha = decode_string($prod_ini_xml["PROFILE"][$perfil]["VAL_PASS"]);
            }
            else
            {
                $dec_senha = "";
            }
            if ("Y" == $prod_ini_xml["PROFILE"][$perfil]["USE_BASE"])
            {
                $banco = decode_string($prod_ini_xml["PROFILE"][$perfil]["VAL_BASE"]);
            }
            if ("Y" == $prod_ini_xml["PROFILE"][$perfil]["USE_TYPE"])
            {
                $tpbanco = $prod_ini_xml["PROFILE"][$perfil]["VAL_TYPE"];
            }
            if ("Y" == $prod_ini_xml["PROFILE"][$perfil]["USE_PERSISTENT"])
            {
                $str_persistent = $prod_ini_xml["PROFILE"][$perfil]["USE_PERSISTENT"];
            }
            //db2
            if ("" != decode_string($prod_ini_xml["PROFILE"][$perfil]["DB2_AUTOCOMMIT"]))
            {
                $str_db2_autocommit = decode_string($prod_ini_xml["PROFILE"][$perfil]["DB2_AUTOCOMMIT"]);
            }
            if ("" != decode_string($prod_ini_xml["PROFILE"][$perfil]["DB2_I5_LIB"]))
            {
                $str_db2_i5_lib = decode_string($prod_ini_xml["PROFILE"][$perfil]["DB2_I5_LIB"]);
            }
            if ("" != decode_string($prod_ini_xml["PROFILE"][$perfil]["DB2_I5_NAMING"]))
            {
                $str_db2_i5_naming = decode_string($prod_ini_xml["PROFILE"][$perfil]["DB2_I5_NAMING"]);
            }
            if ("" != decode_string($prod_ini_xml["PROFILE"][$perfil]["DB2_I5_COMMIT"]))
            {
                $str_db2_i5_commit = decode_string($prod_ini_xml["PROFILE"][$perfil]["DB2_I5_COMMIT"]);
            }
            if ("" != decode_string($prod_ini_xml["PROFILE"][$perfil]["DB2_I5_QUERY_OPTIMIZE"]))
            {
                $str_db2_i5_query_optimize = decode_string($prod_ini_xml["PROFILE"][$perfil]["DB2_I5_QUERY_OPTIMIZE"]);
            }
            //fim db2
			
			$str_date_separator = $prod_ini_xml["PROFILE"][$perfil]["DATE_SEPARATOR"];
            if ("Y" == $prod_ini_xml["PROFILE"][$perfil]["USE_PERSISTENT"])
            {
                $str_use_persistent = $prod_ini_xml["PROFILE"][$perfil]["USE_PERSISTENT"];
            }
			
			$use_ssl          = decode_string($prod_ini_xml["PROFILE"][$perfil]["USE_SSL"]);
			$mysql_ssl_key    = decode_string($prod_ini_xml["PROFILE"][$perfil]["MYSQL_SSL_KEY"]);
			$mysql_ssl_cert   = decode_string($prod_ini_xml["PROFILE"][$perfil]["MYSQL_SSL_CERT"]);
			$mysql_ssl_capath = decode_string($prod_ini_xml["PROFILE"][$perfil]["MYSQL_SSL_CAPATH"]);
			$mysql_ssl_ca     = decode_string($prod_ini_xml["PROFILE"][$perfil]["MYSQL_SSL_CA"]);
			$mysql_ssl_cipher = decode_string($prod_ini_xml["PROFILE"][$perfil]["MYSQL_SSL_CIPHER"]);
        }
        else
        {
            return false;
        }

        $adodb_banco = $tpbanco;
        if($adodb_banco == 'db2_odbc')
        {
           $adodb_banco = 'db2';
        }
        else if($adodb_banco == 'odbc_db2v6')
        {
           $adodb_banco = 'odbc_db2';
        }
        else if($adodb_banco == 'pdosqlite' || $adodb_banco == 'pdo_informix' || $adodb_banco == 'pdo_firebird' || $adodb_banco == 'pdo_mysql' || $adodb_banco == 'pdo_pgsql')
        {
           $adodb_banco = 'pdo';
        }
        
        $bol_persistent = false;
        if(isset($str_use_persistent) && $str_use_persistent == "Y")
        {
        	$bol_persistent = true;
        }
        
        ADOLoadCode($adodb_banco);
        $db_Sess = ADONewConnection($adodb_banco);
        if ($tpbanco == "ado_mssql")
        {
            $servidor = str_replace(":", ",", $servidor);
            $myDSN = "PROVIDER=MSDASQL;DRIVER={SQL Server};SERVER=$servidor;DATABASE=$banco;UID=$usuario;PWD=$dec_senha;" ;
            $db_Sess->Connect($myDSN, "", "", "");
            if (FALSE !== $db_Sess->_connectionID)
            {  }
            else
            {
                die("Erro ao estabelecer uma conex�o com o banco de dados = " . $db_Sess->ErrorMsg());
                exit;
            }
        }
        elseif ($tpbanco == "ado_mssql")
        {
            
            $servidor = str_replace(":", ",", $servidor);
            $myDSN = "PROVIDER=SQLOLEDB;Data Source=$servidor;DATABASE=$banco;uid=$usuario;pwd=$dec_senha;" ;
            $db_Sess->Connect($myDSN, "", "", "");
            if (FALSE !== $db_Sess->_connectionID)
            {  }
            else
            {
                die("Erro ao estabelecer uma conex�o com o banco de dados = " . $db_Sess->ErrorMsg());
                exit;
            }
        }
        elseif ($tpbanco == "db2")
        {
            $arrExtraArgs = array();
        	if(!empty($str_db2_autocommit))
        	{
        		$arrExtraArgs['autocommit']        = (int) $str_db2_autocommit;
        	}
        	if(!empty($str_db2_autocommit))
        	{
        		$arrExtraArgs['i5_lib']            = $str_db2_i5_lib;
        	}
        	if(!empty($str_db2_autocommit))
        	{
        		$arrExtraArgs['i5_naming']         = (int) $str_db2_i5_naming;
        	}
        	if(!empty($str_db2_autocommit))
        	{
        		$arrExtraArgs['i5_commit']         = (int) $str_db2_i5_commit;
        	}
        	if(!empty($str_db2_autocommit))
        	{
        		$arrExtraArgs['i5_query_optimize'] = (int) $str_db2_i5_query_optimize;
        	}
        	
        	$str_host  = $servidor;
            $str_user  = $usuario;
            $str_pass  = $dec_senha;
            $str_base  = $banco; 

            if($bol_persistent)
            {
            	$db_Sess->PConnect($str_host, $str_user, $str_pass, $str_base, $arrExtraArgs);
            }else
            {
            	$db_Sess->Connect($str_host, $str_user, $str_pass, $str_base, false, $arrExtraArgs);
            }
            
            if (FALSE !== $db_Sess->_connectionID)
            {  }
            else
            {
                die("Erro ao estabelecer uma conex�o com o banco de dados = " . $db_Sess->ErrorMsg());
                exit;
            }
        }
        elseif ($tpbanco == "db2_odbc")
        {
                $str_port = "50000";

                if(strpos($servidor, ":") !== false)
                {
                        $arr_tmp_list_change = explode(":", $servidor);
                        list($servidor, $str_port) = $arr_tmp_list_change;
                }

                $str_host  = "driver={IBM db2 odbc DRIVER};Database=". $banco .";hostname=". $servidor .";port=". $str_port .";protocol=TCPIP;";
                $str_host .= "uid=". $usuario ."; pwd=" . $dec_senha;
                $str_user  = '';
                $str_pass  = '';
                $str_base  = '';

                $db_Sess->Connect($str_host, $str_user, $dec_senha, $str_base);
                if (FALSE !== $db_Sess->_connectionID)
            {  }
            else
            {
                die("Erro ao estabelecer uma conex�o com o banco de dados = " . $db_Sess->ErrorMsg());
                exit;
            }
        }
        elseif ($tpbanco == "pdosqlite")
        {
        	$servidor = "sqlite:" . $servidor;
            $db_Sess->Connect($servidor, $usuario, $dec_senha, $banco);
            if (FALSE !== $db_Sess->_connectionID)
            {  }
            else
            {
                die("Erro ao estabelecer uma conex�o com o banco de dados = " . $db_Sess->ErrorMsg());
                exit;
            }
        }
        elseif ($tpbanco == "pdo_informix")
        {
        	$str_host  = $servidor;
	    	$str_user  = $usuario;
	        $str_pass  = $dec_senha;
	        $str_base  = $banco;
	        
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
	        
        	$db_Sess->Connect($str_host, $str_user, $str_pass, $str_base);
            if (FALSE !== $db_Sess->_connectionID)
            {  }
            else
            {
                die("Erro ao estabelecer uma conex�o com o banco de dados = " . $db_Sess->ErrorMsg());
                exit;
            }
        }
        elseif ($tpbanco == "pdo_mysql")
        {
            $str_host = $servidor;
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
            
            $str_user  = $usuario;
            $str_pass  = $dec_senha;
            $str_base  = $banco;
            
            $db_Sess->Connect($str_host, $str_user, $str_pass, $str_base);
            if (FALSE !== $db_Sess->_connectionID)
            {  }
            else
            {
                die("Erro ao estabelecer uma conex�o com o banco de dados = " . $db_Sess->ErrorMsg());
                exit;
            }
        }
        elseif ($tpbanco == "pdo_firebird")
        {
        	$str_host = $servidor;
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
            if(!empty($banco))
		    {
		    	$str_host .= ":" . $banco;
		    }
		    
        	$str_user  = $usuario;
	        $str_pass  = $dec_senha;
	        $str_base  = "";
	        
        	$db_Sess->Connect($str_host, $str_user, $str_pass, $str_base);
            if (FALSE !== $db_Sess->_connectionID)
            {  }
            else
            {
                die("Erro ao estabelecer uma conex�o com o banco de dados = " . $db_Sess->ErrorMsg());
                exit;
            }
        }
        elseif ($tpbanco == "pdo_pgsql")
        {
        	$str_host = $servidor;
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
		    
        	$str_user  = $usuario;
	        $str_pass  = $dec_senha;
	        $str_base  = $banco;
	        
        	$db_Sess->Connect($str_host, $str_user, $str_pass, $str_base);
            if (FALSE !== $db_Sess->_connectionID)
            {  }
            else
            {
                die("Erro ao estabelecer uma conex�o com o banco de dados = " . $db_Sess->ErrorMsg());
                exit;
            }
        }
        else
        {
            $db_Sess->Connect($servidor, $usuario, $dec_senha, $banco);
            if (FALSE !== $db_Sess->_connectionID)
            {  }
            else
            {
                die("Erro ao estabelecer uma conex�o com o banco de dados = " . $db_Sess->ErrorMsg());
                exit;
            }
        }
        $sc_sess_dbms = $tpbanco;
        return ($db_Sess);
    }

/**
 * Retorna se e necessario decode de blob.
 *
 * Verifica se o modulo do PHP carregado necessita de decode de blob.
 *
 * @access  public
 * @param   string   $v_str_dbms  Banco de dados.
 * @return  boolean  $bol_result  TRUE se precisar de decode, caso contrario
 *                                FALSE.
 */
    function sc_db_decode($v_str_dbms)
    {
        switch ($v_str_dbms)
        {
            default:
                return FALSE;
            break;
            case 'oci8':
            case 'oci805':
            case 'oci8po':
            case 'oracle':
            case 'odbc_oracle':
            case 'borland_ibase':
            case 'firebird':
            case 'ibase':
            case 'pdo_oracle':
                return TRUE;
            break;
        }
    } // sc_db_decode

/**
 * Retorna se e necessario encode de blob.
 *
 * Verifica se o modulo do PHP carregado necessita de encode de blob.
 *
 * @access  public
 * @param   string   $v_str_dbms  Banco de dados.
 * @return  boolean  $bol_result  TRUE se precisar de encode, caso contrario
 *                                FALSE.
 */
    function sc_db_encode($v_str_dbms)
    {
        switch ($v_str_dbms)
        {
            default:
                return FALSE;
            break;
            case 'oci8':
            case 'oci805':
            case 'oci8po':
            case 'oracle':
            case 'odbc_oracle':
            case 'borland_ibase':
            case 'firebird':
            case 'ibase':
            case 'pdo_oracle':
                return TRUE;
            break;
        }
    } // sc_db_encode

/**
 * Retorna o lob padrao.
 *
 * Retorna o valor do lob padrao para insert.
 *
 * @access  public
 * @param   string  $v_str_dbms  Banco de dados.
 * @return  string  $str_result  Lob padrao.
 */
    function sc_db_lob($v_str_dbms)
    {
        switch ($v_str_dbms)
        {
            default:
                return '';
            break;
            case 'borland_ibase':
            case 'firebird':
            case 'ibase':
            case 'pdo_firebird':
                return 'null';
            break;
            case 'oci8':
            case 'oci805':
            case 'oci8po':
            case 'oracle':
            case 'pdo_oracle':
                return 'empty_clob()';
            break;
        }
    } // nm_db_decode

/**
 * Retorna tipo de lob
 *
 * Retorna o tipo de lob pelo banco de dados
 *
 * @access  public
 * @param   string   $v_str_dbms  Banco de dados.
 * @return  boolean  $bol_result  TRUE se precisar de decode, caso contrario
 *                                FALSE.
 */
    function sc_db_lob_type($v_str_dbms)
    {
        switch ($v_str_dbms)
        {
            default:
                return 'BLOB';
            break;
            case 'oci8':
            case 'oci805':
            case 'oci8po':
            case 'oracle':
            case 'odbc_oracle':
            case 'pdo_oracle':
                return 'CLOB';
            break;
        }
    } // sc_db_lob_type

}
?>