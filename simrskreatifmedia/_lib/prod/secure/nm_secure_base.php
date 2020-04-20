<?php
/**
 * $Id: nm_secure_base.php,v 1.2 2011-06-22 20:59:21 vinicius Exp $
 */

$temp_dir = (isset($HTTP_SERVER_VARS['PATH_TRANSLATED'])) ? $HTTP_SERVER_VARS['PATH_TRANSLATED'] : $HTTP_SERVER_VARS['SCRIPT_FILENAME'];
$temp_dir = str_replace("//", "/", str_replace("\\", "/", $temp_dir));
$temp_dir = substr($temp_dir, 0, strrpos($temp_dir, "/"));
$dir      = substr($temp_dir, 0, strrpos($temp_dir, "/"));
$dir_base = $dir . '/phptxtdb/';
$dir     .= "/lib";

$dir_nm_phptxtdb_base = $dir_base;

include_once("nm_secure_ini.php");
include_once("nm_secure_lib.php");
include_once($dir_base . 'txt-db-api.php');

/*
include_once("../adodb/adodb.inc.php");
ADOLoadCode($nm_secure_bd_tipo);
$db     = &ADONewConnection($nm_secure_bd_tipo);
$result = @$db->Connect($nm_secure_bd_servidor, $nm_secure_bd_usuario, $nm_secure_bd_senha, $nm_secure_bd_banco);
if (FALSE == $result)
{
    die("Erro ao conectar ao banco de dados.");
}
*/

$db = new Database('nm_secure');

session_start();
if (!$_SESSION["session_sec_login"])
{
    header ("Location: nm_secure_login.php");
    exit;
}

?>
