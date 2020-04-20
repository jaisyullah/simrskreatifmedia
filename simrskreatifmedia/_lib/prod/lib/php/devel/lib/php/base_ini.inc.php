<?php

	if (!isset($_SESSION))
	{
		session_start();
	}
	
	if (!isset($_SESSION['nm_session']))
	{
	    $_SESSION['nm_session'] = array();
	}

    $nm_config = array();

    $str_script   = $_SERVER['PHP_SELF'];
    $str_script   = str_replace("\\", '/', $str_script);
    $str_script   = str_replace('//', '/', $str_script);
    $str_url_base = dirname($str_script);
    if (in_array($str_url_base, array("\\", ".\\", './')))
    {
        $str_url_base = '';
    }

    $dir_getcwd = getcwd();
    if(!empty($dir_getcwd))
    {
        $str_path_base = $dir_getcwd . "/" . basename($_SERVER["SCRIPT_NAME"]);
    }
	else
    {
        if(isset($_SERVER["SCRIPT_FILENAME"]))
        {
            $str_path_base = $_SERVER["SCRIPT_FILENAME"];
        }
		else
        {
            $str_path_base = $_SERVER["ORIG_PATH_TRANSLATED"];
        }
    }

    $str_path_base = str_replace("\\", '/', $str_path_base);
    $str_root      = substr($str_path_base, 0, (-1 * strlen($str_script)) + 1);
    $str_path_base = dirname($str_path_base);
    $str_path_prod = $str_path_base;
    $str_url_prod  = $str_url_base;

    for ($i = 0; $i < 2; $i++)
    {
        $str_path_prod = substr($str_path_prod, 0, strrpos($str_path_prod, '/'));
        $str_url_prod  = substr($str_url_prod , 0, strrpos($str_url_prod , '/'));
    }
    $str_path_conf = substr($str_path_prod, 0, strrpos($str_path_prod, '/'));
	
	if(!isset($_SESSION['nm_session']['prod_v8']['lang']))
	{
		$_SESSION['nm_session']['prod_v8']['lang'] = "en_us";
	}

    $nm_config['script']     		= $str_script;
    $nm_config['path_root']  		= $str_root;
    $nm_config['path_prod']  		= $str_path_prod . '/';
    $nm_config['path_lib']   		= $str_path_base . '/';
    $nm_config['url_prod']   		= $str_url_prod  . '/';
    $nm_config['url_lib']    		= $str_url_base  . '/';
	$nm_config['path_tpl']   		= $str_path_prod . '/devel/tpl/';
	$nm_config['url_img']    		= $str_url_prod  . '/devel/conf/img/';
	$nm_config['url_css']    		= $str_url_prod  . '/../css/';
	$nm_config['url_js_devel'] 		= $str_url_prod  . '/devel/lib/js/';
	$nm_config['url_iface']			= $str_url_prod  . '/devel/iface/';
	$nm_config['url_js_third'] 		= $str_url_prod  . '/../../third/';
	$nm_config['path_conf'] 		= $str_path_prod . '/../../../conf/';
	$nm_config['form_valid'] 		= md5(session_id() . microtime());
	$nm_config['path_lang']  		= $str_path_prod . '/devel/lang/' . str_replace("-", "_", $_SESSION['nm_session']['prod_v8']['lang']) . '/';

	require_once('../lib/php/functions.inc.php');
	require_once(dirname(dirname(dirname(dirname(__FILE__)))) . '/crypt.inc.php');
	
	nm_load_class('template',  'Template');
	nm_load_class('validator', 'Validator');
	
	$nm_template   = new nmTemplate('scriptcase');
	$nm_validator  = new nmValidator();	
?>