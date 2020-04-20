<?php
   include_once('tabsIGD_session.php');
   if (!function_exists("NM_is_utf8"))
   {
       include_once("../_lib/lib/php/nm_utf8.php");
   }
   session_start();

//----- 
   if (!empty($_POST))
   {
       foreach ($_POST as $nmgp_var => $nmgp_val)
       {
            if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
            {
                $nmgp_var = substr($nmgp_var, 11);
                $nmgp_val = $_SESSION[$nmgp_val];
            }
            if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
            {
                $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
            }
            $$nmgp_var = $nmgp_val;
       }
   }
   if (isset($_SESSION['session_sec_aplicacao']["simrskreatifmedia_____tabsIGD"]))
   {
      unset($_SESSION['session_sec_aplicacao']["simrskreatifmedia_____tabsIGD"]);
   }

   if (isset($_SESSION['session_sec_aplicacao']) && empty($_SESSION['session_sec_aplicacao']))
   {
      unset($_SESSION['session_sec_aplicacao']);
      unset($_SESSION['session_sec_usuario']);
   }
   if (isset($_SESSION['scriptcase']['sc_aba_iframe']['tabsIGD']))
   {
       unset($_SESSION['scriptcase']['sc_aba_iframe']['tabsIGD']);
   }
   $fecha_janela = false;
   if (isset($_SESSION['sc_session'][$script_case_init]['tabsIGD']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['tabsIGD']['sc_outra_jan'])
   {
       $fecha_janela = true;
   }
   $fecha_modal = false;
   if (isset($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['tabsIGD']['aba_saida']) && $_SESSION['sc_session'][$script_case_init]['tabsIGD']['aba_saida'] == "modal")
   {
       unset($_SESSION['sc_session'][$script_case_init]['tabsIGD']['aba_saida']);
       $fecha_modal = true;
   }
   nm_limpa_arr_session();
?>
<HTML>
<HEAD>
<TITLE></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
 if ($_SESSION['scriptcase']['proc_mobile'])
 {
?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
 }
?>
</HEAD>
<BODY>
<?php
   if ($fecha_modal)
   {
?>
<SCRIPT LANGUAGE="Javascript">
   self.parent.tb_remove();
</SCRIPT>
</BODY>
</HTML>
<?php
   }
   elseif ($fecha_janela)
   {
?>
<SCRIPT LANGUAGE="Javascript">
   window.close();
</SCRIPT>
</BODY>
</HTML>
<?php
   }
   elseif (empty($saida_aba))
   {
?>
<SCRIPT LANGUAGE="Javascript">
  history.back();
</SCRIPT>
</BODY>
</HTML>
<?php
   }
   else
   {
?>
<form name="fsai" action="<?php echo $saida_aba; ?>"
                  method="post"
                  target="_self">
<input type=hidden name="script_case_init" value="<?php  echo NM_encode_input($script_case_init); ?>"> 
<input type=hidden name="script_case_session" value="<?php  echo NM_encode_input(session_id()); ?>"> 
</form>
<SCRIPT LANGUAGE="Javascript">
   nm_ver_saida = "<?php echo $saida_aba; ?>";
   nm_ver_saida = nm_ver_saida.toLowerCase();
   if (nm_ver_saida.substr(0, 4) != ".php" && (nm_ver_saida.substr(0, 7) == "http://" || nm_ver_saida.substr(0, 8) == "https://" || nm_ver_saida.substr(0, 3) == "../")) 
   { 
       window.location = ("<?php echo $saida_aba; ?>"); 
   } 
   else 
   { 
       document.fsai.submit();
   } 
</SCRIPT>
</BODY>
</HTML>
<?php
   }
   function nm_limpa_arr_session()
   {
      global $script_case_init;
      $achou = false;
      if (!isset($_SESSION['sc_session'][$script_case_init]))
      {
          return;
      }
      foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
      {
          if ($nome_apl == 'tabsIGD' || $achou)
          {
              unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
              $achou = true;
          }
      }
      if (empty($_SESSION['sc_session'][$script_case_init]))
      {
          unset($_SESSION['sc_session'][$script_case_init]);
      }
   }
?>
