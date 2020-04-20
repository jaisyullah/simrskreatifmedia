<?php
/**
 * $Id: nm_secure_ini.php,v 1.1.1.1 2011-05-12 20:31:30 diogo Exp $
 */

$NM_PROD_INI_DIR = $dir;

if (!defined(NM_INC_PROD_INI))
{
  require_once($NM_PROD_INI_DIR . "/nm_ini_lib.php");
  require_once($NM_PROD_INI_DIR . "/nm_xml.php");
}

$prod_ini_file = $NM_PROD_INI_DIR . "/nm_ini.ini";
$prod_ini_xml  = nm_xml_ini($prod_ini_file, $dir);

$nm_secure_bd_tipo     = $prod_ini_xml["GLOBAL"]["SEC_TYPE"];
$nm_secure_bd_servidor = $prod_ini_xml["GLOBAL"]["SEC_HOST"];
$nm_secure_bd_usuario  = $prod_ini_xml["GLOBAL"]["SEC_USER"];
$nm_secure_bd_senha    = decode_string($prod_ini_xml["GLOBAL"]["SEC_PASS"]);
$nm_secure_bd_banco    = $prod_ini_xml["GLOBAL"]["SEC_BASE"];

$nm_secure_tbgrp = "nm_grupo";
$nm_secure_tbusu = "nm_usuario";
$nm_secure_tbapl = "nm_aplicacao";

$apl_base_path = $prod_ini_xml["GLOBAL"]["SEC_PATH"];

$secure_delim = "#@#";

$html_cor_texto_barra   = "#FFFFFF";
$html_cor_texto_titulo  = "#000000";
$html_cor_texto_coluna  = "#000000";
$html_cor_texto_normal  = "#000000";
$html_cor_fundo_barra   = "#000000";
$html_cor_fundo_titulo  = "#FFFFFF";
$html_cor_fundo_lateral = "#FFFFFF";
$html_cor_fundo_borda   = "#000000";
$html_cor_fundo_coluna  = "#FFFFFF";
$html_cor_fundo_linimp  = "#FFFFFF";
$html_cor_fundo_linpar  = "#FFFFFF";
$html_cor_fundo_pagina  = "#FFFFFF";
$html_cor_link_barra    = "#FFFFFF";

?>