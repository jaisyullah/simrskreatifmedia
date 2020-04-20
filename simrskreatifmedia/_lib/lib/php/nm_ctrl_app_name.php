<?php
   function SC_dir_app_ini($proj)
   {
       $NM_dir_atual = getcwd();
       if (empty($NM_dir_atual))
       {
           $str_path_sys  = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
           $str_path_sys  = str_replace("\\", '/', $str_path_sys);
           $str_path_sys  = str_replace('//', '/', $str_path_sys);
       }
       else
       {
           $sc_nm_arquivo = explode("/", $_SERVER['PHP_SELF']);
           $str_path_sys  = str_replace("\\", "/", str_replace("\\\\", "\\", getcwd())) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
       }
       $str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
       $str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);
       $_SESSION['scriptcase']['SC_app_dir'] = $str_path_apl_dir;
       $_SESSION['scriptcase']['SC_app_prj'] = $proj;
       if (!isset($_SESSION['scriptcase']['SC_app_names'][$proj]))
       {
           $_SESSION['scriptcase']['SC_app_names'][$proj] = array();
       }
   }
   function SC_dir_app_name($orig_dir)
   {
       $proj = $_SESSION['scriptcase']['SC_app_prj'];
       if (isset($_SESSION['scriptcase']['SC_app_names'][$proj][$orig_dir]))
       {
           return $_SESSION['scriptcase']['SC_app_names'][$proj][$orig_dir];
       }
       $ini_file = $_SESSION['scriptcase']['SC_app_dir'] . "_lib/friendly_url/" . $orig_dir . "_ini.txt";
       if (is_file($ini_file))
       {
           $sc_init_apl = file($ini_file);
           if (isset($sc_init_apl[0]) && !empty($sc_init_apl[0]))
           {
               $sc_init_apl[0] = str_replace(array('\r', '\n') , '', $sc_init_apl[0]);
               $_SESSION['scriptcase']['SC_app_names'][$proj][$orig_dir] = trim($sc_init_apl[0]);
               return trim($sc_init_apl[0]);
           }
       }
       return $orig_dir;
   }
?>