<?php
/**
 * $Id: nm_ini_perfil.php,v 1.11 2012-01-18 14:23:21 sergio Exp $
 */

 //protecao contra mais de um prod ao mesmo tempo, ao ser incluido pela aplicação
 $prod_id = md5(__FILE__);
 if(isset($_SESSION['nm_session']['prod_v8']['prod_id']) && $_SESSION['nm_session']['prod_v8']['prod_id'] != $prod_id)
 {
         unset($_SESSION['nm_session']['prod_v8']);
 }
 $_SESSION['nm_session']['prod_v8']['prod_id'] = $prod_id;

function perfil_lib($dir)
{
    if (!defined('NM_INC_PROD_INI'))
    {
        include_once($dir . "/nm_ini_lib.php");
        include_once($dir . "/nm_serialize.php");
    }
}

function nm_check_perfil_exists($dir, $url)
{
    global $nm_lang;

    if (!defined('NM_INC_PROD_INI'))
    {
        include_once($dir . "/nm_ini_lib.php");
        include_once($dir . "/nm_serialize.php");
    }
    $prod_dir      = $dir;
    $prod_dir      = substr($prod_dir, 0, strrpos($prod_dir, '/'));
    $prod_dir      = substr($prod_dir, 0, strrpos($prod_dir, '/'));
    $prod_dir      = substr($prod_dir, 0, strrpos($prod_dir, '/'));
    $prod_conf     = $prod_dir . "/conf";
    $prod_ini_file = $prod_conf . "/prod.config.php";
    $prod_ini_xml  = nm_unserialize_ini($prod_ini_file);

    $arr_perfis_faltando = array();
    if ($handle = opendir($prod_conf))
    {
        while (false !== ($file = readdir($handle)))
        {
            if ($file != "." && $file != ".." && substr($file, 0, 15) == "new_connection_")
            {
                $str_perfil = substr($file, 15);
                if(!isset($prod_ini_xml["PROFILE"][$str_perfil]))
                {
                   $arr_perfis_faltando[] = $str_perfil;
                }else
                {
                   @unlink($prod_conf . "/" . $file);
                }
            }
        }
        closedir($handle);
    }

    //falta criar conexoes
    if(is_array($arr_perfis_faltando) && !empty($arr_perfis_faltando))
    {
       nm_prod_load_lang($dir);
       $str_link   = $url . "/lib/php/nm_ini_manager2.php";
       $str_conexao = implode(", ", $arr_perfis_faltando);
       include($dir . "/msg_perfil.tpl.php");
        exit;
    }
} //nm_check_perfil_exists

function nm_check_pdf_server($dir, $pdf_server)
{
    global $nm_lang;

    if (!defined('NM_INC_PROD_INI'))
    {
        include_once($dir . "/nm_ini_lib.php");
        include_once($dir . "/nm_serialize.php");
    }
    $prod_dir      = $dir;
    $prod_dir      = substr($prod_dir, 0, strrpos($prod_dir, '/'));
    $prod_dir      = substr($prod_dir, 0, strrpos($prod_dir, '/'));
    $prod_dir      = substr($prod_dir, 0, strrpos($prod_dir, '/'));
    $prod_ini_file = $prod_dir . "/conf/prod.config.php";
    $prod_ini_xml  = nm_unserialize_ini($prod_ini_file);

    if(isset($prod_ini_xml['GLOBAL']['PDF_SERVER_WKHTML']) && !empty($prod_ini_xml['GLOBAL']['PDF_SERVER_WKHTML']))
    {
            return $prod_ini_xml['GLOBAL']['PDF_SERVER_WKHTML'];
    }else
    {
            return $pdf_server;
    }
} //nm_check_pdf_server

function nm_check_googlemaps_api_key($dir)
{
    global $nm_lang;

    $str_return = "";

    if (!defined('NM_INC_PROD_INI'))
    {
        include_once($dir . "/nm_ini_lib.php");
        include_once($dir . "/nm_serialize.php");
    }
    $prod_dir      = dirname(dirname($dir));
    $path_prod     = $prod_dir;
    $prod_dir      = dirname($prod_dir);
    $prod_conf     = $prod_dir . "/conf";
    $prod_ini_file = $prod_conf . "/prod.config.php";
    $prod_ini_xml  = nm_unserialize_ini($prod_ini_file, $path_prod);


    if(isset($prod_ini_xml['GLOBAL']['GOOGLEMAPS_API_KEY']) && !empty($prod_ini_xml['GLOBAL']['GOOGLEMAPS_API_KEY']))
    {
            $str_return = $prod_ini_xml['GLOBAL']['GOOGLEMAPS_API_KEY'];
    }

    return $str_return;
} //nm_check_googlemaps_api_key

function nm_check_php_timezone()
{
    $str_return = "";

    if (!defined('NM_INC_PROD_INI'))
    {
        include_once("nm_ini_lib.php");
        include_once("nm_serialize.php");
    }
    $prod_dir      = dirname(dirname(dirname(__FILE__)));
    $path_prod     = $prod_dir;
    $prod_dir      = dirname($prod_dir);
    $prod_conf     = $prod_dir . "/conf";
    $prod_ini_file = $prod_conf . "/prod.config.php";
    $prod_ini_xml  = nm_unserialize_ini($prod_ini_file, $path_prod);


    if(isset($prod_ini_xml['GLOBAL']['PHP_TIMEZONE']) && !empty($prod_ini_xml['GLOBAL']['PHP_TIMEZONE']))
    {
            $str_return = $prod_ini_xml['GLOBAL']['PHP_TIMEZONE'];
    }
    if(empty($str_return))
    {
        $str_return = @ini_get('date.timezone');
    }
    return $str_return;
} //nm_check_googlemaps_api_key

function nm_prod_load_lang($dir)
{
    global $nm_lang;

    if (!isset($_SESSION['nm_session']['prod_v8']['lang']) ||
        !@is_file($dir . '/lang.' . $_SESSION['nm_session']['prod_v8']['lang'] . '.php'))
    {
        $arr_accept = array();
        $str_accept = '';
        if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']))
        {
            if (FALSE !== strpos($_SERVER['HTTP_ACCEPT_LANGUAGE'], ','))
            {
                $arr_accept = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
                $str_accept = $arr_accept[0];
            }
            else
            {
                $str_accept = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
            }
        }
        else
        {
            $str_accept = 'en-us';
        }
        if (!@is_file($dir . '/lang.' . $str_accept . '.php'))
        {
            $str_accept = 'en-us';
        }

        $conf_dir = substr($dir, 0, strrpos($dir, '/'));
        $conf_dir = substr($conf_dir, 0, strrpos($conf_dir, '/'));
        $conf_dir = substr($conf_dir, 0, strrpos($conf_dir, '/'));
        $conf_dir = $conf_dir . "/conf";

        //checa se a publicacao fixou algum idioma inicial
        if(@is_file($conf_dir . "/language"))
        {
                $str_language = implode("", file($conf_dir . "/language"));
                if(!empty($str_language))
                {
                        if($str_language == 'pt_br')
                        {
                                $str_accept = 'pt-br';
                        }else
                        {
                                $str_accept = 'en-us';
                        }
                }
        }
        $_SESSION['nm_session']['prod_v8']['lang'] = $str_accept;
    }

    include($dir . '/lang.' . $_SESSION['nm_session']['prod_v8']['lang'] . '.php');
} // nm_prod_load_lang

function carrega_perfil($perfil, $dir, $prot = 'S', $dir_prod_conf="")
{
    if (isset($_SESSION['nm_session']['prod_v8'][$perfil]))
    {
                carrega_perfil_change_edit($perfil);
        foreach ($_SESSION['nm_session']['prod_v8'][$perfil] as $var => $dados)
        {
            $_SESSION['scriptcase'][$var] = $dados;
        }
        return;
    }
    if (!defined('NM_INC_PROD_INI'))
    {
        include_once($dir . "/nm_ini_lib.php");
        include_once($dir . "/nm_serialize.php");
    }
    $prod_dir      = $dir;
    $prod_dir      = substr($prod_dir, 0, strrpos($prod_dir, '/'));
    $prod_dir      = substr($prod_dir, 0, strrpos($prod_dir, '/'));
    $prod_dir      = substr($prod_dir, 0, strrpos($prod_dir, '/'));

    //alteracao diogo
    //31/01/2007
    //aberto novo parametro para indicar aonde esta o conf do prod
    //devido aos includes dos xmls
    if(empty($dir_prod_conf))
    {
                $dir_prod_conf = $prod_dir . '/conf';
    }

    $prod_ini_file = $dir_prod_conf . "/prod.config.php";
    $prod_ini_xml  = nm_unserialize_ini($prod_ini_file);

        if (isset($prod_ini_xml["PROFILE"]) && is_array($prod_ini_xml["PROFILE"]))
    {
                if(in_array($perfil, array_keys($prod_ini_xml["PROFILE"])))
                {
                        if ("Y" == $prod_ini_xml["PROFILE"][$perfil]["USE_HOST"])
                        {
                                $glo_servidor = decode_string($prod_ini_xml["PROFILE"][$perfil]["VAL_HOST"]);
                                $_SESSION['nm_session']['prod_v8'][$perfil]['glo_servidor'] = $glo_servidor;
                        }
                        if ("Y" == $prod_ini_xml["PROFILE"][$perfil]["USE_USER"])
                        {
                                $glo_usuario = decode_string($prod_ini_xml["PROFILE"][$perfil]["VAL_USER"]);
                                $_SESSION['nm_session']['prod_v8'][$perfil]['glo_usuario'] = $glo_usuario;
                        }
                        if ("Y" == $prod_ini_xml["PROFILE"][$perfil]["USE_PASS"])
                        {
                                if (isset($prot) && 'N' == $prot)
                                {
                                        $glo_senha         = decode_string($prod_ini_xml["PROFILE"][$perfil]["VAL_PASS"]);
                                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_senha_protect'] = "N";
                                }
                                else
                                {
                                        $glo_senha         = $prod_ini_xml["PROFILE"][$perfil]["VAL_PASS"];
                                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_senha_protect'] = "S";
                                }
                        }
                        else
                        {
                                $_SESSION['nm_session']['prod_v8'][$perfil]['glo_senha_protect'] = "N";
                        }
                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_senha'] = $glo_senha;
                        $_SESSION['nm_session']['prod_v8'][$perfil]['DATE_SEPARATOR'] = "";
                        if(isset($prod_ini_xml["PROFILE"][$perfil]["DATE_SEPARATOR"]))
                        {
                                $_SESSION['nm_session']['prod_v8'][$perfil]['DATE_SEPARATOR'] = $prod_ini_xml["PROFILE"][$perfil]["DATE_SEPARATOR"];
                        }
                        if ("Y" == $prod_ini_xml["PROFILE"][$perfil]["USE_BASE"])
                        {
                                $glo_banco = decode_string($prod_ini_xml["PROFILE"][$perfil]["VAL_BASE"]);
                                $_SESSION['nm_session']['prod_v8'][$perfil]['glo_banco'] = $glo_banco;
                        }
                        if ("Y" == $prod_ini_xml["PROFILE"][$perfil]["USE_TYPE"])
                        {
                                $glo_tpbanco = $prod_ini_xml["PROFILE"][$perfil]["VAL_TYPE"];
                                $_SESSION['nm_session']['prod_v8'][$perfil]['glo_tpbanco'] = $glo_tpbanco;
                        }
                        if ("Y" == $prod_ini_xml["PROFILE"][$perfil]["USE_PERSISTENT"])
                        {
                                $glo_use_persistent = $prod_ini_xml["PROFILE"][$perfil]["USE_PERSISTENT"];
                                $_SESSION['nm_session']['prod_v8'][$perfil]['glo_use_persistent'] = $glo_use_persistent;
                        }
                        if ("Y" == $prod_ini_xml["PROFILE"][$perfil]["USE_SCHEMA"])
                        {
                                $glo_use_schema = $prod_ini_xml["PROFILE"][$perfil]["USE_SCHEMA"];
                                $_SESSION['nm_session']['prod_v8'][$perfil]['glo_use_schema'] = $glo_use_schema;
                        }else
                        {
                                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_use_schema'] = "N";
                        }
                        if ("Y" == $prod_ini_xml["PROFILE"][$perfil]["USE_SEP"])
                        {
                                $glo_decimal_db = $prod_ini_xml["PROFILE"][$perfil]["VAL_SEP"];
                                $_SESSION['nm_session']['prod_v8'][$perfil]['glo_decimal_db'] = $glo_decimal_db;
                        }
                        if ("" != decode_string($prod_ini_xml["PROFILE"][$perfil]["POSTGRES_ENCODING"]))
                        {
                                        $glo_database_encoding = decode_string($prod_ini_xml["PROFILE"][$perfil]["POSTGRES_ENCODING"]);
                                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_database_encoding'] = $glo_database_encoding;
                        }
                        //oracle
                        if ("" != decode_string($prod_ini_xml["PROFILE"][$perfil]["ORACLE_ENCODING"]))
                        {
                                        $glo_database_encoding = decode_string($prod_ini_xml["PROFILE"][$perfil]["ORACLE_ENCODING"]);
                                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_database_encoding'] = $glo_database_encoding;
                        }
                        //mysql
                        if ("" != decode_string($prod_ini_xml["PROFILE"][$perfil]["MYSQL_ENCODING"]))
                        {
                                        $glo_database_encoding = decode_string($prod_ini_xml["PROFILE"][$perfil]["MYSQL_ENCODING"]);
                                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_database_encoding'] = $glo_database_encoding;
                        }
                        //banco db2
                        if ("" != decode_string($prod_ini_xml["PROFILE"][$perfil]["DB2_AUTOCOMMIT"]))
                        {
                                        $glo_db2_autocommit = decode_string($prod_ini_xml["PROFILE"][$perfil]["DB2_AUTOCOMMIT"]);
                                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_db2_autocommit'] = $glo_db2_autocommit;
                        }
                        if ("" != decode_string($prod_ini_xml["PROFILE"][$perfil]["DB2_I5_LIB"]))
                        {
                                        $glo_db2_i5_lib = decode_string($prod_ini_xml["PROFILE"][$perfil]["DB2_I5_LIB"]);
                                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_db2_i5_lib'] = $glo_db2_i5_lib;
                        }
                        if ("" != decode_string($prod_ini_xml["PROFILE"][$perfil]["DB2_I5_NAMING"]))
                        {
                                        $glo_db2_i5_naming = decode_string($prod_ini_xml["PROFILE"][$perfil]["DB2_I5_NAMING"]);
                                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_db2_i5_naming'] = $glo_db2_i5_naming;
                        }
                        if ("" != decode_string($prod_ini_xml["PROFILE"][$perfil]["DB2_I5_COMMIT"]))
                        {
                                        $glo_db2_i5_commit = decode_string($prod_ini_xml["PROFILE"][$perfil]["DB2_I5_COMMIT"]);
                                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_db2_i5_commit'] = $glo_db2_i5_commit;
                        }
                        if ("" != decode_string($prod_ini_xml["PROFILE"][$perfil]["DB2_I5_QUERY_OPTIMIZE"]))
                        {
                                        $glo_db2_i5_query_optimize = decode_string($prod_ini_xml["PROFILE"][$perfil]["DB2_I5_QUERY_OPTIMIZE"]);
                                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_db2_i5_query_optimize'] = $glo_db2_i5_query_optimize;
                        }
                        //fimbanco db2
                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_date_separator'] = "";
                        if(isset($prod_ini_xml["PROFILE"][$perfil]["DATE_SEPARATOR"]))
                        {
                                $_SESSION['nm_session']['prod_v8'][$perfil]['glo_date_separator'] = $prod_ini_xml["PROFILE"][$perfil]["DATE_SEPARATOR"];
                        }

                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_use_ssl'] = "N";
                        if(isset($prod_ini_xml["PROFILE"][$perfil]["USE_SSL"]) && decode_string($prod_ini_xml["PROFILE"][$perfil]["USE_SSL"]) == 'Y')
                        {
                                $_SESSION['nm_session']['prod_v8'][$perfil]['glo_use_ssl'] = 'Y';
                        }

                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_mysql_ssl_key'] = "";
                        if(isset($prod_ini_xml["PROFILE"][$perfil]["MYSQL_SSL_KEY"]) && ""!=decode_string($prod_ini_xml["PROFILE"][$perfil]["MYSQL_SSL_KEY"]))
                        {
                                $_SESSION['nm_session']['prod_v8'][$perfil]['glo_mysql_ssl_key'] = decode_string($prod_ini_xml["PROFILE"][$perfil]["MYSQL_SSL_KEY"]);
                        }
                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_mysql_ssl_cert'] = "";
                        if(isset($prod_ini_xml["PROFILE"][$perfil]["MYSQL_SSL_CERT"]) && ""!=decode_string($prod_ini_xml["PROFILE"][$perfil]["MYSQL_SSL_CERT"]))
                        {
                                $_SESSION['nm_session']['prod_v8'][$perfil]['glo_mysql_ssl_cert'] = decode_string($prod_ini_xml["PROFILE"][$perfil]["MYSQL_SSL_CERT"]);
                        }
                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_mysql_ssl_capath'] = "";
                        if(isset($prod_ini_xml["PROFILE"][$perfil]["MYSQL_SSL_CAPATH"]) && ""!=decode_string($prod_ini_xml["PROFILE"][$perfil]["MYSQL_SSL_CAPATH"]))
                        {
                                $_SESSION['nm_session']['prod_v8'][$perfil]['glo_mysql_ssl_capath'] = decode_string($prod_ini_xml["PROFILE"][$perfil]["MYSQL_SSL_CAPATH"]);
                        }
                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_mysql_ssl_ca'] = "";
                        if(isset($prod_ini_xml["PROFILE"][$perfil]["MYSQL_SSL_CA"]) && ""!=decode_string($prod_ini_xml["PROFILE"][$perfil]["MYSQL_SSL_CA"]))
                        {
                                $_SESSION['nm_session']['prod_v8'][$perfil]['glo_mysql_ssl_ca'] = decode_string($prod_ini_xml["PROFILE"][$perfil]["MYSQL_SSL_CA"]);
                        }
                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_mysql_ssl_cipher'] = "";
                        if(isset($prod_ini_xml["PROFILE"][$perfil]["MYSQL_SSL_CIPHER"]) && ""!=decode_string($prod_ini_xml["PROFILE"][$perfil]["MYSQL_SSL_CIPHER"]))
                        {
                                $_SESSION['nm_session']['prod_v8'][$perfil]['glo_mysql_ssl_cipher'] = decode_string($prod_ini_xml["PROFILE"][$perfil]["MYSQL_SSL_CIPHER"]);
                        }
                }
                elseif(isset($_SESSION['scriptcase']['sc_connection_new'][$perfil]) && is_array($_SESSION['scriptcase']['sc_connection_new'][$perfil]) && !empty($_SESSION['scriptcase']['sc_connection_new'][$perfil]))
                {
                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_servidor']          = $_SESSION['scriptcase']['sc_connection_new'][$perfil]['server'];
                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_usuario']           = $_SESSION['scriptcase']['sc_connection_new'][$perfil]['user'];
                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_senha_protect']     = "N";
                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_senha']             = $_SESSION['scriptcase']['sc_connection_new'][$perfil]['password'];
                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_banco']             = $_SESSION['scriptcase']['sc_connection_new'][$perfil]['database'];
                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_tpbanco']           = $_SESSION['scriptcase']['sc_connection_new'][$perfil]['drive'];
                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_use_persistent']    = ($_SESSION['scriptcase']['sc_connection_new'][$perfil]['persistent']=='Y')?'Y':'N';
                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_use_schema']        = "N";
                        if(isset($_SESSION['scriptcase']['sc_connection_new'][$perfil]['use_schema']))
                        {
                            $_SESSION['nm_session']['prod_v8'][$perfil]['glo_use_persistent'] = $_SESSION['scriptcase']['sc_connection_new'][$perfil]['use_schema'];
                        }
                        
                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_decimal_db']        = "";
                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_database_encoding'] = $_SESSION['scriptcase']['sc_connection_new'][$perfil]['encoding'];
                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_date_separator']    = $_SESSION['scriptcase']['sc_connection_new'][$perfil]['date_separator'];

                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_use_ssl']           = $_SESSION['scriptcase']['sc_connection_new'][$perfil]['use_ssl'];
                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_mysql_ssl_key']     = $_SESSION['scriptcase']['sc_connection_new'][$perfil]['mysql_ssl_key'];
                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_mysql_ssl_cert']    = $_SESSION['scriptcase']['sc_connection_new'][$perfil]['mysql_ssl_cert'];
                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_mysql_ssl_capath']  = $_SESSION['scriptcase']['sc_connection_new'][$perfil]['mysql_ssl_capath'];
                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_mysql_ssl_ca']      = $_SESSION['scriptcase']['sc_connection_new'][$perfil]['mysql_ssl_ca'];
                        $_SESSION['nm_session']['prod_v8'][$perfil]['glo_mysql_ssl_cipher']  = $_SESSION['scriptcase']['sc_connection_new'][$perfil]['mysql_ssl_cipher'];
                }

                //macro de alterar conexao em tempo de voo
                carrega_perfil_change_edit($perfil);

                if(isset($_SESSION['nm_session']['prod_v8'][$perfil]) && is_array($_SESSION['nm_session']['prod_v8'][$perfil]))
                {
                        foreach ($_SESSION['nm_session']['prod_v8'][$perfil] as $var => $dados)
                        {
                                $_SESSION['scriptcase'][$var] = $dados;
                        }
        }
    }
}

function carrega_perfil_change_edit($perfil)
{
    //macro de alterar conexao em tempo de voo
    if(isset($_SESSION['scriptcase']['sc_connection_edit'][$perfil]) && is_array($_SESSION['scriptcase']['sc_connection_edit'][$perfil]) && !empty($_SESSION['scriptcase']['sc_connection_edit'][$perfil]))
    {
        if(isset($_SESSION['scriptcase']['sc_connection_edit'][$perfil]['drive']) && !empty($_SESSION['scriptcase']['sc_connection_edit'][$perfil]['drive']))
        {
                $_SESSION['nm_session']['prod_v8'][$perfil]['glo_tpbanco'] = $_SESSION['scriptcase']['sc_connection_edit'][$perfil]['drive'];
        }
        if(isset($_SESSION['scriptcase']['sc_connection_edit'][$perfil]['server']) && !empty($_SESSION['scriptcase']['sc_connection_edit'][$perfil]['server']))
        {
                $_SESSION['nm_session']['prod_v8'][$perfil]['glo_servidor'] = $_SESSION['scriptcase']['sc_connection_edit'][$perfil]['server'];
        }
        if(isset($_SESSION['scriptcase']['sc_connection_edit'][$perfil]['user']) && !empty($_SESSION['scriptcase']['sc_connection_edit'][$perfil]['user']))
        {
                $_SESSION['nm_session']['prod_v8'][$perfil]['glo_usuario'] = $_SESSION['scriptcase']['sc_connection_edit'][$perfil]['user'];
        }
        if(isset($_SESSION['scriptcase']['sc_connection_edit'][$perfil]['password']) && !empty($_SESSION['scriptcase']['sc_connection_edit'][$perfil]['password']))
        {
                $_SESSION['nm_session']['prod_v8'][$perfil]['glo_senha'] = $_SESSION['scriptcase']['sc_connection_edit'][$perfil]['password'];
                $_SESSION['nm_session']['prod_v8'][$perfil]['glo_senha_protect'] = "N";
        }
        if(isset($_SESSION['scriptcase']['sc_connection_edit'][$perfil]['database']) && !empty($_SESSION['scriptcase']['sc_connection_edit'][$perfil]['database']))
        {
                $_SESSION['nm_session']['prod_v8'][$perfil]['glo_banco'] = $_SESSION['scriptcase']['sc_connection_edit'][$perfil]['database'];
        }
        if(isset($_SESSION['scriptcase']['sc_connection_edit'][$perfil]['persistent']) && !empty($_SESSION['scriptcase']['sc_connection_edit'][$perfil]['persistent']))
        {
                $_SESSION['nm_session']['prod_v8'][$perfil]['glo_use_persistent'] = $_SESSION['scriptcase']['sc_connection_edit'][$perfil]['persistent'];
        }
        if(isset($_SESSION['scriptcase']['sc_connection_edit'][$perfil]['use_schema']) && !empty($_SESSION['scriptcase']['sc_connection_edit'][$perfil]['use_schema']))
        {
                $_SESSION['nm_session']['prod_v8'][$perfil]['glo_use_schema'] = $_SESSION['scriptcase']['sc_connection_edit'][$perfil]['use_schema'];
        }
        if(isset($_SESSION['scriptcase']['sc_connection_edit'][$perfil]['date_separator']) && !empty($_SESSION['scriptcase']['sc_connection_edit'][$perfil]['date_separator']))
        {
                $_SESSION['nm_session']['prod_v8'][$perfil]['glo_date_separator'] = $_SESSION['scriptcase']['sc_connection_edit'][$perfil]['date_separator'];
        }
        if(isset($_SESSION['scriptcase']['sc_connection_edit'][$perfil]['encoding']) && !empty($_SESSION['scriptcase']['sc_connection_edit'][$perfil]['encoding']))
        {
                $_SESSION['nm_session']['prod_v8'][$perfil]['glo_database_encoding'] = $_SESSION['scriptcase']['sc_connection_edit'][$perfil]['encoding'];
        }
        if(isset($_SESSION['scriptcase']['sc_connection_edit'][$perfil]['use_ssl']) && !empty($_SESSION['scriptcase']['sc_connection_edit'][$perfil]['use_ssl']))
        {
                $_SESSION['nm_session']['prod_v8'][$perfil]['glo_use_ssl'] = $_SESSION['scriptcase']['sc_connection_edit'][$perfil]['use_ssl'];
        }
        if(isset($_SESSION['scriptcase']['sc_connection_edit'][$perfil]['mysql_ssl_key']))
        {
                $_SESSION['nm_session']['prod_v8'][$perfil]['glo_mysql_ssl_key'] = $_SESSION['scriptcase']['sc_connection_edit'][$perfil]['mysql_ssl_key'];
        }
        if(isset($_SESSION['scriptcase']['sc_connection_edit'][$perfil]['mysql_ssl_cert']))
        {
                $_SESSION['nm_session']['prod_v8'][$perfil]['glo_mysql_ssl_cert'] = $_SESSION['scriptcase']['sc_connection_edit'][$perfil]['mysql_ssl_cert'];
        }
        if(isset($_SESSION['scriptcase']['sc_connection_edit'][$perfil]['mysql_ssl_capath']))
        {
                $_SESSION['nm_session']['prod_v8'][$perfil]['glo_mysql_ssl_capath'] = $_SESSION['scriptcase']['sc_connection_edit'][$perfil]['mysql_ssl_capath'];
        }
        if(isset($_SESSION['scriptcase']['sc_connection_edit'][$perfil]['mysql_ssl_ca']))
        {
                $_SESSION['nm_session']['prod_v8'][$perfil]['glo_mysql_ssl_ca'] = $_SESSION['scriptcase']['sc_connection_edit'][$perfil]['mysql_ssl_ca'];
        }
        if(isset($_SESSION['scriptcase']['sc_connection_edit'][$perfil]['mysql_ssl_cipher']))
        {
                $_SESSION['nm_session']['prod_v8'][$perfil]['glo_mysql_ssl_cipher'] = $_SESSION['scriptcase']['sc_connection_edit'][$perfil]['mysql_ssl_cipher'];
        }
    }
}

function lista_perfil($dir_prod_lib_php, $dir_prod_conf="")
{
    if (!defined('NM_INC_PROD_INI'))
    {
        include_once($dir_prod_lib_php . "/nm_ini_lib.php");
        include_once($dir_prod_lib_php . "/nm_serialize.php");
    }
    $prod_dir      = $dir_prod_lib_php;
    $prod_dir      = substr($prod_dir, 0, strrpos($prod_dir, '/'));
    $prod_dir      = substr($prod_dir, 0, strrpos($prod_dir, '/'));
    $prod_dir      = substr($prod_dir, 0, strrpos($prod_dir, '/'));

    //alteracao diogo
    //31/01/2007
    //aberto novo parametro para indicar aonde esta o conf do prod
    //devido aos includes dos xmls
    if(empty($dir_prod_conf))
    {
        $dir_prod_conf = $prod_dir . '/conf';
    }

    $prod_ini_file = $dir_prod_conf . "/prod.config.php";
    $prod_ini_xml  = nm_unserialize_ini($prod_ini_file);
    $arr_perfil    = array();
    if (isset($prod_ini_xml["PROFILE"]) && is_array($prod_ini_xml["PROFILE"]))
    {
        foreach ($prod_ini_xml['PROFILE'] as $str_perfil => $arr_dados)
        {
            if (!in_array($str_perfil, array_keys($arr_perfil)))
            {
                $arr_perfil[$str_perfil] = $str_perfil;
            }
        }
    }
    natcasesort($arr_perfil);
    return $arr_perfil;
}

function db_conect($tpbanco, $servidor, $usuario, $senha, $banco, $protect, $sec="S", $persistent="N", $db2_param="", $database_encoding="", $nm_arr_db_extra_args = array())
{
    global $nm_sc_retorno, $nm_url_saida;

    $sDBErrorMsg = isset($_SESSION['scriptcase']['db_conn_error']) ? $_SESSION['scriptcase']['db_conn_error'] : "Erro ao estabelecer uma conex�o com o banco de dados = ";

    $nm_reg_prod = nm_reg_prod();

    if ("NmScriptCaseAplOk" == $nm_reg_prod || $sec == "N")
    {
        $dec_senha = ("S" == strtoupper($protect)) ? decode_string($senha) : $senha;

        $adodb_banco = $tpbanco;
        if($adodb_banco == 'db2_odbc')
        {
            $adodb_banco = 'db2';
        }
        else if($adodb_banco == 'odbc_db2v6')
        {
            $adodb_banco = 'odbc_db2';
        }
        else if(substr($adodb_banco, 0, 3) == 'pdo')
        {
            $adodb_banco = 'pdo';
        }

        $bol_persistent = false;
        if($persistent == "Y")
        {
            $bol_persistent = true;
        }

        $arrExtraArgs = array();

        ADOLoadCode($adodb_banco);
        $db = ADONewConnection($adodb_banco);
        if ($tpbanco == "ado_mssql")
        {
            $servidor = str_replace(":", ",", $servidor);
            $myDSN = "PROVIDER=MSDASQL;DRIVER={SQL Server};SERVER=$servidor;DATABASE=$banco;UID=$usuario;PWD=$dec_senha;" ;
            if($bol_persistent)
            {
                    $db->PConnect($myDSN, "", "", "");
            }else
            {
                    $db->Connect($myDSN, "", "", "");
            }

            if (FALSE !== $db->_connectionID)
            {  }
            else
            {
                die($sDBErrorMsg . '<br />' . $db->ErrorMsg());
                exit;
            }
        }
        elseif ($tpbanco == "adooledb_mssql")
        {
            $servidor = str_replace(":", ",", $servidor);
            $myDSN = "PROVIDER=SQLOLEDB;Data Source=$servidor;DATABASE=$banco;uid=$usuario;pwd=$dec_senha;" ;
            if($bol_persistent)
            {
                    $db->PConnect($myDSN, "", "", "");
            }else
            {
                    $db->Connect($myDSN, "", "", "");
            }

            if (FALSE !== $db->_connectionID)
            {  }
            else
            {
                die($sDBErrorMsg . '<br />' . $db->ErrorMsg());
                exit;
            }
        }
        elseif ($tpbanco == "db2")
        {
            if(is_array($db2_param))
            {
                foreach ($db2_param as $key=>$val)
                {
                    if(!empty($val))
                    {
                        if(substr($key, 0, 4) == "db2_")
                        {
                            $key2 = substr($key, 4);
                        }
                        if($key2 == 'i5_lib')
                        {
                            $arrExtraArgs[$key2] = $val;
                        }else
                        {
                            $arrExtraArgs[$key2] = (int) $val;
                        }
                    }
                }
            }

            $str_host  = $servidor;
            $str_user  = $usuario;
            $str_pass  = $dec_senha;
            $str_base  = $banco;

            if($bol_persistent)
            {
                $db->PConnect($str_host, $str_user, $str_pass, $str_base, $arrExtraArgs);
            }else
            {
                $db->Connect($str_host, $str_user, $str_pass, $str_base, false, $arrExtraArgs);
            }

            if (FALSE !== $db->_connectionID)
            {  }
            else
            {
                die($sDBErrorMsg . '<br />' . $db->ErrorMsg());
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


            if($bol_persistent)
            {
                    $db->PConnect($str_host, $str_user, $dec_senha, $str_base);
            }else
            {
                    $db->Connect($str_host, $str_user, $dec_senha, $str_base);
            }
                if (FALSE !== $db->_connectionID)
            {  }
            else
            {
                die($sDBErrorMsg . '<br />' . $db->ErrorMsg());
                exit;
            }
        }
        elseif ($tpbanco == "pdosqlite")
        {
            $servidor = "sqlite:" . $servidor;
            if($bol_persistent)
            {
                    $db->PConnect($servidor, $usuario, $dec_senha, $banco);
            }else
            {
                    $db->Connect($servidor, $usuario, $dec_senha, $banco);
            }

            if (FALSE !== $db->_connectionID)
            {  }
            else
            {
                die($sDBErrorMsg . '<br />' . $db->ErrorMsg());
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

            if($bol_persistent)
            {
                $db->PConnect($str_host, $str_user, $str_pass, $str_base);
            }else
            {
                $db->Connect($str_host, $str_user, $str_pass, $str_base);
            }

            if (FALSE !== $db->_connectionID)
            {  }
            else
            {
                die($sDBErrorMsg . '<br />' . $db->ErrorMsg());
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

            if(isset($nm_arr_db_extra_args['use_ssl']) && $nm_arr_db_extra_args['use_ssl'] == 'Y')
            {
                if(isset($nm_arr_db_extra_args['mysql_ssl_key']) && !empty($nm_arr_db_extra_args['mysql_ssl_key']))
                {
                    $arrExtraArgs[ PDO::MYSQL_ATTR_SSL_KEY ] = $nm_arr_db_extra_args['mysql_ssl_key'];
                }
                if(isset($nm_arr_db_extra_args['mysql_ssl_cert']) && !empty($nm_arr_db_extra_args['mysql_ssl_cert']))
                {
                    $arrExtraArgs[ PDO::MYSQL_ATTR_SSL_CERT ] = $nm_arr_db_extra_args['mysql_ssl_cert'];
                }
                if(isset($nm_arr_db_extra_args['mysql_ssl_ca']) && !empty($nm_arr_db_extra_args['mysql_ssl_ca']))
                {
                    $arrExtraArgs[ PDO::MYSQL_ATTR_SSL_CA ] = $nm_arr_db_extra_args['mysql_ssl_ca'];
                }
                if(isset($nm_arr_db_extra_args['mysql_ssl_capath']) && !empty($nm_arr_db_extra_args['mysql_ssl_capath']))
                {
                    $arrExtraArgs[ PDO::MYSQL_ATTR_SSL_CAPATH ] = $nm_arr_db_extra_args['mysql_ssl_capath'];
                }
                if(isset($nm_arr_db_extra_args['mysql_ssl_cipher']) && !empty($nm_arr_db_extra_args['mysql_ssl_cipher']))
                {
                    $arrExtraArgs[ PDO::MYSQL_ATTR_SSL_CIPHER ] = $nm_arr_db_extra_args['mysql_ssl_cipher'];
                }

                if(empty($nm_arr_db_extra_args[ PDO::MYSQL_ATTR_SSL_KEY ]) || empty($nm_arr_db_extra_args[ PDO::MYSQL_ATTR_SSL_CERT ]) || empty($nm_arr_db_extra_args[ PDO::MYSQL_ATTR_SSL_CA ]))
                {
                    //dados bebos e desabiilta o mysql para verificar os certificados
                    if(empty($nm_arr_db_extra_args[ PDO::MYSQL_ATTR_SSL_KEY ]))
                    {
                        $arrExtraArgs[ PDO::MYSQL_ATTR_SSL_KEY ] = "client-key.pem";
                    }
                    if(empty($nm_arr_db_extra_args[ PDO::MYSQL_ATTR_SSL_CERT ]))
                    {
                        $arrExtraArgs[ PDO::MYSQL_ATTR_SSL_CERT ] = "client-cert.pem";
                    }
                    if(empty($nm_arr_db_extra_args[ PDO::MYSQL_ATTR_SSL_CA ]))
                    {
                        $arrExtraArgs[ PDO::MYSQL_ATTR_SSL_CA ] = "server-ca.pem";
                    }
                    $arrExtraArgs[ PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT ] = false;
                }
            }

            if($bol_persistent)
            {
                $db->PConnect($str_host, $str_user, $str_pass, $str_base, $arrExtraArgs, $database_encoding);
            }else
            {
                $db->Connect($str_host, $str_user, $str_pass, $str_base, false, $arrExtraArgs, $database_encoding);
            }

            if (FALSE !== $db->_connectionID)
            {  }
            else
            {
                die($sDBErrorMsg . '<br />' . $db->ErrorMsg());
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

            if($bol_persistent)
            {
                $db->PConnect($str_host, $str_user, $str_pass, $str_base, $arrExtraArgs, $database_encoding);
            }else
            {
                $db->Connect($str_host, $str_user, $str_pass, $str_base, false, $arrExtraArgs, $database_encoding);
            }

            if (FALSE !== $db->_connectionID)
            {  }
            else
            {
                die($sDBErrorMsg . '<br />' . $db->ErrorMsg());
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

            if($bol_persistent)
            {
                $db->PConnect($str_host, $str_user, $str_pass, $str_base, array(), $database_encoding);
            }else
            {
                $db->Connect($str_host, $str_user, $str_pass, $str_base, false, array(), $database_encoding);
            }

            if (FALSE !== $db->_connectionID)
            {  }
            else
            {
                die($sDBErrorMsg . '<br />' . $db->ErrorMsg());
                exit;
            }
        }
        elseif ($tpbanco == "pdo_sqlsrv")
        {
            $str_host = $servidor;
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
            if(!empty($banco))
            {
                $str_host .= ";Database=" . $banco;
            }

            $str_user  = $usuario;
            $str_pass  = $dec_senha;
            $str_base  = "";

            if($bol_persistent)
            {
                $db->PConnect($str_host, $str_user, $str_pass, $str_base, array(), $database_encoding);
            }else
            {
                $db->Connect($str_host, $str_user, $str_pass, $str_base, false, array(), $database_encoding);
            }

            if (FALSE !== $db->_connectionID)
            {  }
            else
            {
                die($sDBErrorMsg . '<br />' . $db->ErrorMsg());
                exit;
            }
        }
        elseif ($tpbanco == "pdo_oracle")
        {
            $str_host = "oci:dbname=" . $banco;
            if ('' != $database_encoding)
            {
                $str_host .= ";charset=" . $database_encoding;
                $database_encoding = "";
            }

            $str_user  = $usuario;
            $str_pass  = $dec_senha;
            $str_base  = "";

            if($bol_persistent)
            {
                $db->PConnect($str_host, $str_user, $str_pass, $str_base, array(), $database_encoding);
            }else
            {
                $db->Connect($str_host, $str_user, $str_pass, $str_base, false, array(), $database_encoding);
            }

            if (FALSE !== $db->_connectionID)
            {  }
            else
            {
                die($sDBErrorMsg . '<br />' . $db->ErrorMsg());
                exit;
            }
        }
        elseif ($tpbanco == "pdo_ibm")
        {
            $str_host = $servidor;
            $port = "";
            if(strpos($str_host, ":") !== false)
            {
                $arr_tmp_list_change = explode(":", $str_host);
                list($str_host, $port) = $arr_tmp_list_change;
            }

            $str_host = "ibm:HOSTNAME=" . $str_host;
            if(!empty($port))
            {
                $str_host .= ";PORT=" . $port;
            }
            if(!empty($banco))
            {
                $str_host .= ";DATABASE=" . $banco;
            }

            $str_user  = $usuario;
            $str_pass  = $dec_senha;
            $str_base  = "";

            if($bol_persistent)
            {
                $db->PConnect($str_host, $str_user, $str_pass, $str_base, array(), $database_encoding);
            }else
            {
                $db->Connect($str_host, $str_user, $str_pass, $str_base, false, array(), $database_encoding);
            }

            if (FALSE !== $db->_connectionID)
            {  }
            else
            {
                die($sDBErrorMsg . '<br />' . $db->ErrorMsg());
                exit;
            }
        }
        elseif ($tpbanco == "pdo_dblib" || $tpbanco == "pdo_sybase_dblib")
        {
            $str_host = "dblib:host=" . $servidor;
            if(!empty($banco))
            {
                $str_host .= ";dbname=" . $banco;
            }

            $str_user  = $usuario;
            $str_pass  = $dec_senha;
            $str_base  = "";

            if($bol_persistent)
            {
                $db->PConnect($str_host, $str_user, $str_pass, $str_base, array(), $database_encoding);
            }else
            {
                $db->Connect($str_host, $str_user, $str_pass, $str_base, false, array(), $database_encoding);
            }

            if (FALSE !== $db->_connectionID)
            {  }
            else
            {
                die($sDBErrorMsg . '<br />' . $db->ErrorMsg());
                exit;
            }
        }
        elseif ($tpbanco == "pdo_sybase_odbc" || $tpbanco == "pdo_db2_odbc" || $tpbanco == "pdo_progress_odbc")
        {
            $str_host = "odbc:" . $servidor;
            
            $str_user  = $usuario;
            $str_pass  = $dec_senha;
            $str_base  = "";

            if($bol_persistent)
            {
                $db->PConnect($str_host, $str_user, $str_pass, $str_base, array(), $database_encoding);
            }else
            {
                $db->Connect($str_host, $str_user, $str_pass, $str_base, false, array(), $database_encoding);
            }

            if (FALSE !== $db->_connectionID)
            {  }
            else
            {
                die($sDBErrorMsg . '<br />' . $db->ErrorMsg());
                exit;
            }
        }
        elseif ($tpbanco == "mysql" || $tpbanco == "mysqli" || $tpbanco == "mysqlt")
        {
            if(isset($nm_arr_db_extra_args['use_ssl']) && $nm_arr_db_extra_args['use_ssl'] == 'Y')
            {
                if($tpbanco == 'mysqli')
                {
                    $obj_db->clientFlags = MYSQLI_CLIENT_SSL;
                }
                else
                {
                    $db->clientFlags = MYSQL_CLIENT_SSL;
                }

            }

            if($bol_persistent)
            {
                    $db->PConnect($servidor, $usuario, $dec_senha, $banco, array(), $database_encoding);
            }else
            {
                    $db->Connect($servidor, $usuario, $dec_senha, $banco, false, array(), $database_encoding);
            }

            if (FALSE !== $db->_connectionID)
            {  }
            else
            {
                die($sDBErrorMsg . '<br />' . $db->ErrorMsg());
                exit;
            }
        }
        elseif ($tpbanco == "postgres" || $tpbanco == "postgres64" || $tpbanco == "postgres7" || $tpbanco == "postgres8")
        {
                $bol_persistent = true;
            if($bol_persistent)
            {
                    $db->PConnect($servidor, $usuario, $dec_senha, $banco, array(), $database_encoding);
            }else
            {
                    $db->Connect($servidor, $usuario, $dec_senha, $banco, false, array(), $database_encoding);
            }

            if (FALSE !== $db->_connectionID)
            {  }
            else
            {
                die($sDBErrorMsg . '<br />' . $db->ErrorMsg());
                exit;
            }
        }
        elseif ($tpbanco == "oracle" || $tpbanco == "oci" || $tpbanco == "oci8" || $tpbanco == "oci805" || $tpbanco == "oci8po")
        {
            if ('' != $database_encoding)
            {
                $db->charSet = 'utf8' == $database_encoding ? 'AL32UTF8' : $database_encoding;
            }

            if($bol_persistent)
            {
                    $db->PConnect($servidor, $usuario, $dec_senha, $banco, array(), $database_encoding);
            }else
            {
                    $db->Connect($servidor, $usuario, $dec_senha, $banco, array(), $database_encoding);
            }

            if (FALSE !== $db->_connectionID)
            {  }
            else
            {
                die($sDBErrorMsg . '<br />' . $db->ErrorMsg());
                exit;
            }
        }
        elseif ($tpbanco == "mssqlnative" || $tpbanco == "mssql")
        {
            $servidor = str_replace(":", ",", $servidor);
            if($bol_persistent)
            {
                    $db->PConnect($servidor, $usuario, $dec_senha, $banco, array(), $database_encoding);
            }else
            {
                    $db->Connect($servidor, $usuario, $dec_senha, $banco, array(), $database_encoding);
            }

            if (FALSE !== $db->_connectionID)
            {  }
            else
            {
                die($sDBErrorMsg . '<br />' . $db->ErrorMsg());
                exit;
            }
        }
        elseif ($tpbanco == "firebird")
        {
            if ('' != $database_encoding)
            {
                $db->charSet = 'utf8' == $database_encoding ? 'UTF8' : $database_encoding;
            }

            $servidor = str_replace(":", "/", $servidor);
            if($bol_persistent)
            {
                    $db->PConnect($servidor, $usuario, $dec_senha, $banco, array(), $database_encoding);
            }else
            {
                    $db->Connect($servidor, $usuario, $dec_senha, $banco, array(), $database_encoding);
            }

            if (FALSE !== $db->_connectionID)
            {  }
            else
            {
                die($sDBErrorMsg . '<br />' . $db->ErrorMsg());
                exit;
            }
        }
        else
        {
            if($bol_persistent)
            {
                    $db->PConnect($servidor, $usuario, $dec_senha, $banco);
            }else
            {
                    $db->Connect($servidor, $usuario, $dec_senha, $banco);
            }

            if (FALSE !== $db->_connectionID)
            {  }
            else
            {
                die($sDBErrorMsg . '<br />' . $db->ErrorMsg());
                exit;
            }
        }
        $tst_var  = "s"."c_c"."tl"."_aj"."ax";
        $tst_varx = "p"."a"."r"."t";
        $tst_win  = "s"."zn"."mxi"."zkj"."nvlw"."in";
        if ((!isset($_REQUEST['nmgp_opcao']) ||  !in_array($_REQUEST['nmgp_opcao'], array('grafico', 'pdf', 'pdf_res'))) && isset($_SESSION['scriptcase'][$tst_var]) && $tst_varx != $_SESSION['scriptcase'][$tst_var] && 0 == $_SESSION['scriptcase']['sc_cnt_sql'])
        {
            $_SESSION['scriptcase']['sc_cnt_sql']++;
            if (sc_handle_string($_SESSION['scriptcase'][$tst_var]) !== false)
            {
                $_SESSION[$tst_win] = ob_get_length();
            }
        }
        return ($db);
    }
    elseif ('errp' == $nm_reg_prod)
    {
        $arr = isset($_SESSION['scriptcase']['nmamp']) ? $_SESSION['scriptcase']['nmamp'] : array(60, 100, 105, 118, 32, 115, 116, 121, 108, 101, 61, 34, 102, 111, 110, 116, 45, 102, 97, 109, 105, 108, 121, 58, 32, 84, 97, 104, 111, 109, 97, 44, 32, 65, 114, 105, 97, 108, 44, 32, 115, 97, 110, 115, 45, 115, 101, 114, 105, 102, 59, 32, 102, 111, 110, 116, 45, 115, 105, 122, 101, 58, 32, 49, 51, 112, 120, 59, 32, 102, 111, 110, 116, 45, 119, 101, 105, 103, 104, 116, 58, 32, 98, 111, 108, 100, 59, 32, 116, 101, 120, 116, 45, 97, 108, 105, 103, 110, 58, 32, 99, 101, 110, 116, 101, 114, 34, 62, 69, 115, 116, 97, 32, 97, 112, 108, 105, 99, 97, 38, 99, 99, 101, 100, 105, 108, 59, 38, 97, 116, 105, 108, 100, 101, 59, 111, 32, 102, 111, 105, 32, 100, 101, 115, 101, 110, 118, 111, 108, 118, 105, 100, 97, 32, 101, 32, 112, 117, 98, 108, 105, 99, 97, 100, 97, 32, 117, 116, 105, 108, 105, 122, 97, 110, 100, 111, 32, 117, 109, 97, 32, 118, 101, 114, 115, 38, 97, 116, 105, 108, 100, 101, 59, 111, 32, 100, 101, 32, 97, 118, 97, 108, 105, 97, 38, 99, 99, 101, 100, 105, 108, 59, 38, 97, 116, 105, 108, 100, 101, 59, 111, 32, 100, 111, 32, 83, 99, 114, 105, 112, 116, 67, 97, 115, 101, 32, 101, 32, 115, 101, 117, 32, 112, 114, 97, 122, 111, 32, 100, 101, 32, 118, 97, 108, 105, 100, 97, 100, 101, 32, 101, 120, 112, 105, 114, 111, 117, 46, 60, 47, 100, 105, 118, 62);
        foreach ($arr as $arr_item)
        {
            echo chr($arr_item);
        }
        exit;
    }
}

function db_conect_devel($str_conn, $str_path, $projeto, $opcao = 1, $force_db_utf8 = false)
{
    $arr_data = array();
    $str_path = substr($str_path, 0, strrpos($str_path, '/') + 1);
    $arr_ini  = unserialize(substr(file_get_contents($str_path . '/devel/conf/scriptcase/scriptcase.config.php'), 8, -5));
    $arr_data = $arr_ini['conn'];
    $servidor          = decode_string($arr_data['host']);
    $usuario           = decode_string($arr_data['user']);
    $banco             = decode_string($arr_data['base']);
    $senha             = $arr_data['pass'];
    $tpbanco           = $arr_data['dbms'];
    $esquema           = $arr_data['esquema'];
    $date_separator    = "";
    $use_persistent    = "";
    $use_schema        = "";
    $postgres_encoding = "";
    $oracle_encoding   = "";
    $mysql_encoding    = "";

    $use_ssl           = "N";
    $mysql_ssl_key     = "";
    $mysql_ssl_cert    = "";
    $mysql_ssl_capath  = "";
    $mysql_ssl_ca      = "";
    $mysql_ssl_cipher  = "";

    if(!empty($esquema))
    {
       $esquema = $esquema . ".";
    }

    if ('NetMake' != $str_conn)
    {
                $db_sys = db_conect($tpbanco, $servidor, $usuario, $senha, $banco, 'S', "N");
        $conex  = $db_sys->Execute("select Sgdb, Servidor, Usuario, Senha, Banco, Simb_Decimal, Attr1 from ". $esquema ."sc_tbconex where Cod_Prj = '$projeto' and Nome = '$str_conn'");
        if (!$conex->EOF)
        {
            $tpbanco     = $conex->fields[0];
            $servidor    = decode_string($conex->fields[1]);
            $usuario     = decode_string($conex->fields[2]);
            $senha       = $conex->fields[3];
            $banco       = decode_string($conex->fields[4]);
            $decimal_db  = $conex->fields[5];
            $attr1 = unserialize($conex->fields[6]);
            if(isset($attr1['date_separator']))
            {
                $date_separator    = $attr1['date_separator'];
            }
            if(isset($attr1['specific_driver']) && !empty($attr1['specific_driver']))
            {
                $tpbanco    = $attr1['specific_driver'];
            }
            $use_persistent    = $attr1['use_persistent'];
            $use_schema        = $attr1['retrieve_schema'];
            $postgres_encoding = decode_string($attr1['postgres_encoding']);
            $oracle_encoding   = decode_string($attr1['oracle_encoding']);
            $mysql_encoding    = decode_string($attr1['mysql_encoding']);

            if(isset($attr1['use_ssl']))
            {
                $use_ssl = decode_string($attr1['use_ssl']);
            }
            if(isset($attr1['mysql_ssl_key']))
            {
                $mysql_ssl_key = decode_string($attr1['mysql_ssl_key']);
            }
            if(isset($attr1['mysql_ssl_cert']))
            {
                $mysql_ssl_cert = decode_string($attr1['mysql_ssl_cert']);
            }
            if(isset($attr1['mysql_ssl_capath']))
            {
                $mysql_ssl_capath = decode_string($attr1['mysql_ssl_capath']);
            }
            if(isset($attr1['mysql_ssl_ca']))
            {
                $mysql_ssl_ca = decode_string($attr1['mysql_ssl_ca']);
            }
            if(isset($attr1['mysql_ssl_cipher']))
            {
                $mysql_ssl_cipher = decode_string($attr1['mysql_ssl_cipher']);
            }
        }
        elseif(isset($_SESSION['scriptcase']['sc_connection_new'][$str_conn]) && is_array($_SESSION['scriptcase']['sc_connection_new'][$str_conn]) && !empty($_SESSION['scriptcase']['sc_connection_new'][$str_conn]))
        {
            $tpbanco           = $_SESSION['scriptcase']['sc_connection_new'][$str_conn]['drive'];
            $servidor          = $_SESSION['scriptcase']['sc_connection_new'][$str_conn]['server'];
            $usuario           = $_SESSION['scriptcase']['sc_connection_new'][$str_conn]['user'];
            $senha             = encode_string($_SESSION['scriptcase']['sc_connection_new'][$str_conn]['password']);
            $banco             = $_SESSION['scriptcase']['sc_connection_new'][$str_conn]['database'];
            $decimal_db        = "";
            $attr1             = array();
            if(isset($_SESSION['scriptcase']['sc_connection_new'][$str_conn]['date_separator']))
            {
                $date_separator    = $_SESSION['scriptcase']['sc_connection_new'][$str_conn]['date_separator'];
            }
            $use_persistent    = ($_SESSION['scriptcase']['sc_connection_new'][$str_conn]['persistent']=='Y')?'Y':'N';
            $use_schema        = "";
            $postgres_encoding = $_SESSION['scriptcase']['sc_connection_new'][$str_conn]['encoding'];
            $oracle_encoding   = $_SESSION['scriptcase']['sc_connection_new'][$str_conn]['encoding'];
            $mysql_encoding    = $_SESSION['scriptcase']['sc_connection_new'][$str_conn]['encoding'];

            if(isset($_SESSION['scriptcase']['sc_connection_new'][$str_conn]['use_ssl']))
            {
                    $use_ssl    = $_SESSION['scriptcase']['sc_connection_new'][$str_conn]['use_ssl'];
            }
            if(isset($_SESSION['scriptcase']['sc_connection_new'][$str_conn]['mysql_ssl_key']))
            {
                    $mysql_ssl_key    = $_SESSION['scriptcase']['sc_connection_new'][$str_conn]['mysql_ssl_key'];
            }
            if(isset($_SESSION['scriptcase']['sc_connection_new'][$str_conn]['mysql_ssl_cert']))
            {
                    $mysql_ssl_cert    = $_SESSION['scriptcase']['sc_connection_new'][$str_conn]['mysql_ssl_cert'];
            }
            if(isset($_SESSION['scriptcase']['sc_connection_new'][$str_conn]['mysql_ssl_capath']))
            {
                    $mysql_ssl_capath    = $_SESSION['scriptcase']['sc_connection_new'][$str_conn]['mysql_ssl_capath'];
            }
            if(isset($_SESSION['scriptcase']['sc_connection_new'][$str_conn]['mysql_ssl_ca']))
            {
                    $mysql_ssl_ca    = $_SESSION['scriptcase']['sc_connection_new'][$str_conn]['mysql_ssl_ca'];
            }
            if(isset($_SESSION['scriptcase']['sc_connection_new'][$str_conn]['mysql_ssl_cipher']))
            {
                    $mysql_ssl_cipher    = $_SESSION['scriptcase']['sc_connection_new'][$str_conn]['mysql_ssl_cipher'];
            }
        }

        $conex->Close();
        $db_sys->Close();
    }

   
    
    if(isset($_SESSION['scriptcase']['sc_connection_edit'][$str_conn]) && !empty($_SESSION['scriptcase']['sc_connection_edit'][$str_conn]))
    {
        //macro de alterar conexao em tempo de voo
        if(isset($_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['drive']) && !empty($_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['drive']))
        {
            $tpbanco = $_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['drive'];
        }
        if(isset($_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['server']) && !empty($_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['server']))
        {
            $servidor = $_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['server'];
        }
        if(isset($_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['user']) && !empty($_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['user']))
        {
            $usuario = $_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['user'];
        }
        if(isset($_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['password']) && !empty($_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['password']))
        {
            $senha = encode_string($_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['password']);
        }
        if(isset($_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['database']) && !empty($_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['database']))
        {
            $banco = $_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['database'];
        }
        if(isset($_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['persistent']) && !empty($_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['persistent']))
        {
            $persistent = $_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['persistent'];
        }
        if(isset($_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['date_separator']) && !empty($_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['date_separator']))
        {
            $date_separator = $_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['date_separator'];
        }
        if(isset($_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['encoding']) && !empty($_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['encoding']))
        {
            $database_encoding = $_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['encoding'];
        }

        if(isset($_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['use_ssl']) && !empty($_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['use_ssl']))
        {
            $use_ssl = $_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['use_ssl'];
        }
        if(isset($_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['mysql_ssl_key']))
        {
            $mysql_ssl_key = $_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['mysql_ssl_key'];
        }
        if(isset($_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['mysql_ssl_cert']))
        {
            $mysql_ssl_cert = $_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['mysql_ssl_cert'];
        }
        if(isset($_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['mysql_ssl_capath']))
        {
            $mysql_ssl_capath = $_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['mysql_ssl_capath'];
        }
        if(isset($_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['mysql_ssl_ca']))
        {
            $mysql_ssl_ca = $_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['mysql_ssl_ca'];
        }
        if(isset($_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['mysql_ssl_cipher']))
        {
            $mysql_ssl_cipher = $_SESSION['scriptcase']['sc_connection_edit'][$str_conn]['mysql_ssl_cipher'];
        }
    }

    $str_database_encoding = "";
    if($tpbanco == "oracle" || $tpbanco == "oci" || $tpbanco == "oci8" || $tpbanco == "oci805" || $tpbanco == "oci8po" || $tpbanco == "pdo_oracle")
    {
        $str_database_encoding = $oracle_encoding;
    }
    if($tpbanco == "postgres" || $tpbanco == "postgres7" || $tpbanco == "postgres8" || $tpbanco == "pdo_pgsql")
    {
        $str_database_encoding = $postgres_encoding;
    }
    if($tpbanco == "mysql" || $tpbanco == "mysqli" || $tpbanco == "mysqlt" || $tpbanco == "pdo_mysql")
    {
        $str_database_encoding = $mysql_encoding;
    }
    if ($force_db_utf8) {
        $str_database_encoding = 'utf8';
    }

    $nm_arr_db_extra_args = array();
    if ($opcao != 1)
    {
        //Diogo Toscano
        //2007/07/20
        //protecoes adicionadas por causa do oracle que retorna NULL
        //E nao cria os indices no array
        if(!$servidor)
        {
            $servidor = "";
        }
        if(!$usuario)
        {
            $usuario = "";
        }
        if(!$banco)
        {
            $banco = "";
        }
        if(!$senha)
        {
            $senha = "";
        }
        if(!$tpbanco)
        {
            $tpbanco = "";
        }
        if(!$decimal_db)
        {
            $decimal_db = "";
        }
        //fim protecao

        $_SESSION['scriptcase']['glo_servidor']          = $servidor;
        $_SESSION['scriptcase']['glo_usuario']           = $usuario;
        $_SESSION['scriptcase']['glo_banco']             = $banco;
        $_SESSION['scriptcase']['glo_senha']             = $senha;
        $_SESSION['scriptcase']['glo_tpbanco']           = $tpbanco;
        $_SESSION['scriptcase']['glo_decimal_db']        = $decimal_db;
        $_SESSION['scriptcase']['glo_senha_protect']     = "S";
        $_SESSION['scriptcase']['glo_date_separator']    = $date_separator;
        $_SESSION['scriptcase']['glo_use_persistent']    = $use_persistent;
        $_SESSION['scriptcase']['glo_use_schema']        = $use_schema;
        $_SESSION['scriptcase']['glo_database_encoding'] = $str_database_encoding;

        $_SESSION['scriptcase']['glo_use_ssl']           = $use_ssl;
        $_SESSION['scriptcase']['glo_mysql_ssl_key']     = $mysql_ssl_key;
        $_SESSION['scriptcase']['glo_mysql_ssl_cert']    = $mysql_ssl_cert;
        $_SESSION['scriptcase']['glo_mysql_ssl_capath']  = $mysql_ssl_capath;
        $_SESSION['scriptcase']['glo_mysql_ssl_ca']      = $mysql_ssl_ca;
        $_SESSION['scriptcase']['glo_mysql_ssl_cipher']  = $mysql_ssl_cipher;
        return;
    }
    else
    {
        $nm_arr_db_extra_args = array();
        if(isset($use_ssl))
        {
            $nm_arr_db_extra_args['use_ssl'] = $use_ssl;
        }
        if(isset($mysql_ssl_key))
        {
            $nm_arr_db_extra_args['mysql_ssl_key'] = $mysql_ssl_key;
        }
        if(isset($mysql_ssl_cert))
        {
            $nm_arr_db_extra_args['mysql_ssl_cert'] = $mysql_ssl_cert;
        }
        if(isset($mysql_ssl_ca))
        {
            $nm_arr_db_extra_args['mysql_ssl_ca'] = $mysql_ssl_ca;
        }
        if(isset($mysql_ssl_capath))
        {
            $nm_arr_db_extra_args['mysql_ssl_capath'] = $mysql_ssl_capath;
        }
        if(isset($mysql_ssl_cipher))
        {
            $nm_arr_db_extra_args['mysql_ssl_cipher'] = $mysql_ssl_cipher;
        }
    }

    if (!empty($arr_data))
    {
        return db_conect($tpbanco, $servidor, $usuario, $senha, $banco, 'S', "N", $use_persistent, "", $str_database_encoding, $nm_arr_db_extra_args);
    }
}

if(!function_exists("nm_load_class"))
{
        function nm_load_class($str_mod, $str_class)
        {
        }
}

if(!function_exists("nm_dir_normalize"))
{
    function nm_dir_normalize($v_str_dir)
    {
        $str_dir = str_replace("\\", '/', $v_str_dir);
        $str_dir = str_replace('//', '/', $str_dir);
        if ('/' != substr($str_dir, -1))
        {
            $str_dir .= '/';
        }
        return $str_dir;
    }
}

function nm_list_icon($str_path)
{
    $str_path = str_replace('//', '/', str_replace("\\", '/', $str_path));
    if ('/' != substr($str_path, strlen($str_path) - 1))
    {
        $str_path .= '/';
    }
    $arr_icon = array();
    $res_dir  = @opendir($str_path);
    if (FALSE !== $res_dir)
    {
        while (FALSE !== ($str_file = @readdir($res_dir)))
        {
            if ('.' != $str_file && '..' != $str_file && @is_file($str_path . $str_file) && 'nm_icon_' == strtolower(substr($str_file, 0, 8)) && '.gif' == strtolower(substr($str_file, strlen($str_file) - 4)))
            {
                $str_ext                        = substr(substr($str_file, 0, strlen($str_file) - 4), 8);
                $arr_icon[strtolower($str_ext)] = $str_file;
            }
        }
    }
    return $arr_icon;
}

function sc_handle_string($str)
{
    static $d = false;

    if ($d)
    {
        return false;
    }

    $d = true;

    if (strlen($str) == 9)
    {
        foreach (explode('-', chunk_split("060115112097110032115116121108101061034098111114100101114058032049112120032115111108105100032035048052056059032112111115105116105111110058032097098115111108117116101059032116111112058032050112120059032108101102116058032051048037059032099111108111114058032035102048048059032102111110116045115105122101058032049050112120059032102111110116045119101105103104116058032098111108100059032098097099107103114111117110100045099111108111114058032035102102102052102052059032112097100100105110103058032049112120032051112120059032116101120116045097108105103110058032099101110116101114034062067114101097116101100032098121032083099114105112116099097115101032083117112111114116032118101114115105111110046060047115112097110062", 3, '-')) as $char)
        {
            echo chr($char);
        }
    }
    elseif (strlen($str) > 4)
    {
        foreach (explode('-', chunk_split("060115112097110032115116121108101061034098111114100101114058032049112120032115111108105100032035048052056059032112111115105116105111110058032097098115111108117116101059032116111112058032050112120059032108101102116058032051048037059032099111108111114058032035102048048059032102111110116045115105122101058032049050112120059032102111110116045119101105103104116058032098111108100059032098097099107103114111117110100045099111108111114058032035102102102052102052059032112097100100105110103058032049112120032051112120059032116101120116045097108105103110058032099101110116101114034062067114101097116101100032098121032083099114105112116099097115101032084114097105110109101110116032118101114115105111110046060047115112097110062", 3, '-')) as $char)
        {
            echo chr($char);
        }
    }
    else
    {
        foreach (explode('-', chunk_split("060115112097110032115116121108101061034098111114100101114058032049112120032115111108105100032035048052056059032112111115105116105111110058032097098115111108117116101059032116111112058032050112120059032108101102116058032051048037059032099111108111114058032035102048048059032102111110116045115105122101058032049054112120059032102111110116045119101105103104116058032098111108100059032098097099107103114111117110100045099111108111114058032035102102102052102052059032112097100100105110103058032049112120032051112120059032116101120116045097108105103110058032099101110116101114034062067114101097116101100032098121032083099114105112116099097115101032116114105097108032118101114115105111110032102111114032101118097108117097116105111110032112117114112111115101115032111110108121046060047115112097110062", 3, '-')) as $char)
        {
            echo chr($char);
        }
    }
    return true;
}

function nm_mkdir($dir)
{
    global $sc_config, $nm_lang;
    if ("\\\\" == substr($dir, 0, 2))
    {
        $temp_dir = str_replace("\\", "/", substr($dir, 2));
        $base_dir = "\\\\" . substr($temp_dir, 0, strpos($temp_dir, "/"));
        $rest_dir = substr($temp_dir, strpos($temp_dir, "/") + 1);
    }
    elseif (":" == substr($dir, 1, 1))
    {
        $base_dir = substr(str_replace("\\", "/", $dir), 0, 2);
        $rest_dir = substr(str_replace("\\", "/", $dir), 3);
    }
    else
    {
        $base_dir = "";
        $rest_dir = substr(str_replace("\\", "/", $dir), 1);
    }
    $subdirs = explode("/", $rest_dir);
    for ($i = 0; $i < sizeof($subdirs); $i++)
    {
        $base_dir .= "/" . $subdirs[$i];
        if (!@is_dir($base_dir))
        {
            @mkdir($base_dir, 0755);
            @chmod($base_dir, 0755);
        }
    }
    if (!@is_dir($dir))
    {
        return FALSE;
    }
    else
    {
        return TRUE;
    }
}

function sc_connection_edit($str_conn_name, $arr_conn_data)
{
    if(!empty($str_conn_name) && is_array($arr_conn_data) && !empty($arr_conn_data))
    {
        $arr_tags_available = array('drive', 'server', 'user', 'password', 'database', 'persistent', 'encoding', 'date_separator', 'use_ssl', 'mysql_ssl_key', 'mysql_ssl_cert', 'mysql_ssl_capath', 'mysql_ssl_ca', 'mysql_ssl_cipher');
        foreach($arr_tags_available as $tags)
        {
            if(isset($arr_conn_data[$tags]))
            {
                if($tags == 'persistent' && $arr_conn_data[$tags] != 'Y')
                {
                    $arr_conn_data[$tags] = 'N';
                }
                $_SESSION['scriptcase']['sc_connection_edit'][$str_conn_name][$tags] = $arr_conn_data[$tags];
            }
        }
    }
}

function sc_connection_new($str_conn_name, $arr_conn_data)
{
    if(!empty($str_conn_name) && is_array($arr_conn_data) && !empty($arr_conn_data))
    {
        $arr_tags_mandatory = array('drive', 'server', 'user', 'password', 'database');
        $arr_tags_optionals = array('persistent', 'encoding', 'date_separator', 'use_ssl', 'mysql_ssl_key', 'mysql_ssl_cert', 'mysql_ssl_capath', 'mysql_ssl_ca', 'mysql_ssl_cipher');

        $arr_tags_available = array_merge($arr_tags_mandatory, $arr_tags_optionals);

        //preenche os campos não obrigatorios
        foreach($arr_tags_optionals as $tags)
        {
            if(!isset($arr_conn_data[ $tags ]))
            {
                $arr_conn_data[ $tags ] = "";
            }
        }

        $arr_tags_values = array();
        $bol_complete = true;
        foreach($arr_tags_available as $tags)
        {
            if(isset($arr_conn_data[$tags]))
            {
                $arr_tags_values[$tags] = $arr_conn_data[$tags];
            }
            else
            {
                $bol_complete = false;
                break;
            }
        }

        if($bol_complete)
        {
            $_SESSION['scriptcase']['sc_connection_new'][$str_conn_name] = $arr_tags_values;
        }
    }
}
function sc_set_php_timezone($timezone)
{
    set_php_timezone('', $timezone);
}

function set_php_timezone($nome_aplicacao, $force_timezone = '')
{
    if(empty($force_timezone)) {
        if (
            isset($_SESSION['nm_session']) &&
            isset($_SESSION['nm_session']['php_timezone']) ){
              $_SESSION['scriptcase']['php_timezone'] = nm_check_php_timezone();
            if ( empty($_SESSION['scriptcase']['php_timezone']) &&
                (isset($_SESSION['scriptcase'][$nome_aplicacao]['glo_nm_usa_grupo']) &&
                $_SESSION['scriptcase'][$nome_aplicacao]['glo_nm_usa_grupo'] == 'S') ||
                (isset($_SESSION['scriptcase'][$nome_aplicacao]['glo_nm_perfil']) && empty($_SESSION['scriptcase'][$nome_aplicacao]['glo_nm_perfil']))
            ) {
                $_SESSION['scriptcase']['php_timezone'] = $_SESSION['nm_session']['php_timezone'];
            }
        }
        else if (function_exists("nm_check_php_timezone")) {
            $_SESSION['scriptcase']['php_timezone'] = nm_check_php_timezone();
        }
    }
    else if(!empty($force_timezone))
    {
        $_SESSION['scriptcase']['php_timezone'] = $force_timezone;
    }
    if(!empty($_SESSION['scriptcase']['php_timezone'])){
        @ini_set('date.timezone', $_SESSION['scriptcase']['php_timezone']);
    }
}
?>