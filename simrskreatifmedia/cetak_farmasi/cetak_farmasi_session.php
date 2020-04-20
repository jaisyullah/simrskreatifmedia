<?php
   $NM_session_db = false;
   $NM_session_prod  = "";
   $NM_session_conf  = "";
   $NM_session_conex = "";
   $NM_session_tab   = "";
   $NM_session_sch   = "";
   if ($NM_session_db && !defined('NM_CONTR_SESS_DB'))
   {
       $NM_dir_atual = getcwd();
       if (empty($NM_dir_atual))
       {
           $str_path_sys = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
           $str_path_sys = str_replace("\\", '/', $str_path_sys);
       }
       else
       {
           $sc_nm_arquivo = explode("/", $_SERVER['PHP_SELF']);
           $str_path_sys  = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
       }
       //check publication with the prod
       $str_path_apl_url = $_SERVER['PHP_SELF'];
       $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
       $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
       $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
       $str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
       $str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);
       //check prod
       if(empty($NM_session_prod))
       {
               /*check prod*/$NM_session_prod = $str_path_apl_url . "_lib/prod/";
       }
       //end check publication with the prod
       $str_path_web = $_SERVER['PHP_SELF'];
       $str_path_web = str_replace("\\", '/', $str_path_web);
       $str_path_web = str_replace('//', '/', $str_path_web);
       $root         = substr($str_path_sys, 0, -1 * strlen($str_path_web));
       $NM_session_prod = $root . $NM_session_prod;
       if (empty($NM_session_conf))
       {
           $NM_session_conf = substr($NM_session_prod, 0, strrpos($NM_session_prod, '/'));
           $NM_session_conf = substr($NM_session_conf, 0, strrpos($NM_session_conf, '/')) . "/conf";
       }
       include_once($NM_session_prod . "/lib/php/nm_session.php");
       $sc_session  = new sc_session();
       $sc_sess_sch = $NM_session_sch;
       $sc_sess_tab = $NM_session_tab;
       $sc_sess_db  = $sc_session->conect($NM_session_conex, $sc_sess_tab, $NM_session_prod, $NM_session_conf);
       if ($sc_session->testTable($sc_sess_db, $sc_sess_tab, $sc_sess_sch))
       {
           $mDbSessResult = ini_set('session.save_handler', 'user');
           if (false !== $mDbSessResult)
           {
               session_set_save_handler(array($sc_session, 'open'),
                                        array($sc_session, 'close'),
                                        array($sc_session, 'read'),
                                        array($sc_session, 'write'),
                                        array($sc_session, 'destroy'),
                                        array($sc_session, 'gc')
                                       );
           }
       }
       define('NM_CONTR_SESS_DB', TRUE);
   }
?>
