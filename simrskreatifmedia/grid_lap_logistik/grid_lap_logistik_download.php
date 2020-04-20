<?php
   session_cache_limiter("");

   session_start();

   if (!empty($_GET))
   {
       foreach ($_GET as $nmgp_var => $nmgp_val)
       {
            $$nmgp_var = $nmgp_val;
       }
   }

   if (isset($script_case_init) && isset($nm_tit_doc) && isset($nm_name_doc) && isset($_SESSION['sc_session'][$script_case_init][$nm_tit_doc][$nm_name_doc]))
   {
       $nm_name_doc_ok = $_SESSION['sc_session'][$script_case_init][$nm_tit_doc][$nm_name_doc][0];
       $nm_tit_doc_ok  = $_SESSION['sc_session'][$script_case_init][$nm_tit_doc][$nm_name_doc][1];
   }
   else
   {
       echo "<html>";
       echo "<body>";
       echo "<table align=\"center\" width=\"50%\" border=1 height=\"50px\">";
       echo "<tr>";
       echo "   <td align=\"center\">";
       echo "       <b><font size=4>" . $_SESSION['sc_session']['SC_download_violation'] . "</font>";
       echo "   </b></td>";
       echo " </tr>";
       echo "</table>";
       echo "</body>";
       echo "</html>";
       exit;
   }

   $NM_dir_atual = getcwd();
   if (empty($NM_dir_atual))
   {
      $str_path_sys    = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
      $str_path_sys    = str_replace("\\", '/', $str_path_sys);
   }
   else
   {
       $sc_nm_arquivo = explode("/", $_SERVER['PHP_SELF']);
       $str_path_sys  = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
   }
   $str_path_web  = $_SERVER['PHP_SELF'];
   $str_path_web  = str_replace("\\", '/', $str_path_web);
   $root          = substr($str_path_sys, 0, -1 * strlen($str_path_web));

   header("Content-type: application/force-download");
   header("Content-Disposition: attachment; filename=$nm_tit_doc_ok");
   readfile($root . $nm_name_doc_ok);
   exit;
?>