<?php
   session_cache_limiter("");
   session_start();

    include_once("../_lib/lib/php/nm_utf8.php");
   include_once 'form_ga_dokumen_mob_doc_name.php';

   if (!empty($_GET))
   {
       foreach ($_GET as $nmgp_var => $nmgp_val)
       {
            $$nmgp_var = NM_utf8_decode(NM_utf8_urldecode($nmgp_val));
            $$nmgp_var = str_replace('**Plus**', '+', $$nmgp_var);
            $$nmgp_var = str_replace('**Jvel**', '#', $$nmgp_var);
            $$nmgp_var = str_replace('**Ecom**', '&', $$nmgp_var);
            $$nmgp_var = str_replace('**Perc**', '%', $$nmgp_var);
       }
   }
   $accessError = false;
   if ($nm_cod_doc == "documento_db")
   {
       $NM_dir_atual = getcwd();
       if (empty($NM_dir_atual))
       {
          $str_path_sys    = (isset($_SERVER['PATH_TRANSLATED'])) ? $_SERVER['PATH_TRANSLATED'] : $_SERVER['SCRIPT_FILENAME'];
          $str_path_sys    = str_replace("\\", '/', $str_path_sys);
       }
       else
       {
           $sc_nm_arquivo = explode("/", $_SERVER['PHP_SELF']);
           $str_path_sys  = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
       }
       $str_path_web = $_SERVER['PHP_SELF'];
       $str_path_web = str_replace("\\", '/', $str_path_web);
       $root         = substr($str_path_sys, 0, -1 * strlen($str_path_web));
       $index_file   = $nm_nome_doc;
       if (isset($_SESSION['sc_session'][$script_case_init][$nm_cod_apl]['download_filenames'][$index_file]))
       {
           $nm_nome_doc = $_SESSION['sc_session'][$script_case_init][$nm_cod_apl]['download_filenames'][$index_file];
       }
       elseif (isset($_SESSION['sc_session'][$script_case_init][$nm_cod_apl]['download_filenames']['sc_' . $index_file]))
       {
           $index_file  = 'sc_' . $nm_nome_doc;
           $nm_nome_doc = $_SESSION['sc_session'][$script_case_init][$nm_cod_apl]['download_filenames'][$index_file];
       }
       else
       {
           $accessError = true;
       }
       $trab_doc = $root . $_SESSION['scriptcase']['form_ga_dokumen_mob']['glo_nm_path_imag_temp'] . "/" . $index_file;
   }
   else
   {
       $index_file = $nm_nome_doc;
       if (isset($_SESSION['sc_session'][$script_case_init][$nm_cod_apl]['download_filenames'][$index_file]))
       {
           $nm_nome_doc = $_SESSION['sc_session'][$script_case_init][$nm_cod_apl]['download_filenames'][$index_file];
       }
       elseif (isset($_SESSION['sc_session'][$script_case_init][$nm_cod_apl]['download_filenames']['sc_' . $index_file]))
       {
           $index_file  = 'sc_' . $index_file;
           $nm_nome_doc = $_SESSION['sc_session'][$script_case_init][$nm_cod_apl]['download_filenames'][$index_file];
       }
       else
       {
           $accessError = true;
       }
       $path_raiz = $_SESSION['sc_session'][$script_case_init][$nm_cod_apl]['path_doc'];
       $sub_path  = isset($_SESSION['sc_session'][$script_case_init][$nm_cod_apl]['sub_dir'][$nm_cod_doc]) ? $_SESSION['sc_session'][$script_case_init][$nm_cod_apl]['sub_dir'][$nm_cod_doc] : '';
       $bChanged  = false;
       if (!@is_file($path_raiz . $sub_path . "/" . $nm_nome_doc))
       {
           $nm_nome_doc = NM_utf8_decode(NM_utf8_urldecode($nm_nome_doc));
           $bChanged    = true;
       }
       $trab_doc = $path_raiz . $sub_path . "/" . $nm_nome_doc;
       $trab_doc = str_replace("\\", "/", $trab_doc);
       if ($bChanged)
       {
           $nm_nome_doc = $_SESSION['sc_session'][$script_case_init][$nm_cod_apl]['download_filenames'][$index_file];
       }
   }
   if (is_file($trab_doc) && !$accessError)
   {
        $aDownloadInfo = getDownloadInfo($nm_nome_doc);

        header("Content-Type: text/html; charset=utf-8");
        header("Pragma: public", true);
        header("Content-type: application/force-download");
        header($aDownloadInfo['header'][ $aDownloadInfo['browser'] ]);
        readfile($trab_doc);
   } 
   else 
   { 
       $STR_lang    = (isset($_SESSION['scriptcase']['str_lang']) && !empty($_SESSION['scriptcase']['str_lang'])) ? $_SESSION['scriptcase']['str_lang'] : "id";
       $NM_arq_lang = "../_lib/lang/" . $STR_lang . ".lang.php";
       $errorIndex  = $accessError ? 'lang_errm_facc' : 'lang_errm_fnfd';
       if (is_file($NM_arq_lang) && $STR_lang != "id")
       {
           $Lixo = file($NM_arq_lang);
           foreach ($Lixo as $Cada_lin) 
           {
               $Tst = explode("=", $Cada_lin); 
               if (strpos($Tst[0], $errorIndex) !== false)
               {
                   $Nm_lang[$errorIndex] = substr(trim($Tst[1]), 1, -2);
               }
           }
       }
       elseif ($accessError)
       {
           $Nm_lang[$errorIndex] = "";
       }
       else
       {
           $Nm_lang[$errorIndex] = "";
       }
       echo $Nm_lang[$errorIndex] . ": " . $nm_nome_doc;
   } 
   exit;

    function getDownloadInfo($sOriginal)
    {
        $aInfo = array(
            'browser' => 'rest',
            'version' => '',
            'browser_flags' => array(
                'is_chrome'  => false,
                'is_firefox' => false,
                'is_ie'      => false,
                'is_safari'  => false,
            ),
            'filename' => array(
                'original' => $sOriginal,
                'convert'  => $sOriginal,
                'chrome'   => '',
                'firefox1' => '',
                'firefox2' => '',
                'ie'       => '',
                'safari'   => '',
            ),
            'header' => array(
                'chrome'  => '',
                'firefox' => '',
                'ie'      => '',
                'safari'  => '',
                'rest'    => '',
            ),
        );

        if (isset($_SERVER['HTTP_USER_AGENT']))
        {
            $aInfo['browser_flags']['is_chrome']  = false !== strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'chrome');
            $aInfo['browser_flags']['is_firefox'] = false !== strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'firefox');
            $aInfo['browser_flags']['is_safari']  = false !== strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'safari');
            preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'], $matches);
            if (count($matches) < 2)
            {
                preg_match('/Trident\/\d{1,2}.\d{1,2}; rv:([0-9]*)/', $_SERVER['HTTP_USER_AGENT'], $matches);
            }
            if (count($matches) > 1)
            {
                $aInfo['browser_flags']['is_ie'] = true;
                $aInfo['version']                = $matches[1];
            }

            if ($aInfo['browser_flags']['is_chrome'])
            {
                $aInfo['browser'] = 'chrome';
            }
            elseif ($aInfo['browser_flags']['is_firefox'])
            {
                $aInfo['browser'] = 'firefox';
            }
            elseif ($aInfo['browser_flags']['is_ie'])
            {
                $aInfo['browser'] = 'ie';
            }
            elseif ($aInfo['browser_flags']['is_safari'])
            {
                $aInfo['browser'] = 'safari';
            }
        }

        if ($_SESSION['scriptcase']['charset'] != 'UTF-8')
        {
            $aInfo['filename']['convert'] = mb_convert_encoding($aInfo['filename']['convert'], 'UTF-8', $_SESSION['scriptcase']['charset']);
        }
        $aInfo['filename']['chrome']   = $aInfo['filename']['convert'];
        $aInfo['filename']['firefox1'] = $aInfo['filename']['convert'];
        $aInfo['filename']['firefox2'] = $aInfo['filename']['original'];
        $aInfo['filename']['safari']   = $aInfo['filename']['convert'];
        $aInfo['filename']['ie']       = sc_filename_protect_chars($aInfo['filename']['original']);
        $aInfo['filename']['ie']       = urlencode($aInfo['filename']['ie']);
        $aInfo['filename']['ie']       = sc_filename_unprotect_chars($aInfo['filename']['ie']);

        $aInfo['header']['chrome']  = "Content-Disposition: attachment; filename=\"" . $aInfo['filename']['chrome']   . "\"";
        $aInfo['header']['firefox'] = "Content-Disposition: attachment; filename=\"" . $aInfo['filename']['firefox1'] . "\" filename*=UTF-8''" . $aInfo['filename']['firefox2'];
        $aInfo['header']['ie']      = "Content-Disposition: attachment; filename=\"" . $aInfo['filename']['ie']       . "\"";
        $aInfo['header']['safari']  = "Content-Disposition: attachment; filename=\"" . $aInfo['filename']['safari']   . "\"";
        $aInfo['header']['rest']    = "Content-Disposition: attachment; filename=\"" . $aInfo['filename']['original'] . "\"";

        return $aInfo;
    }
?>
