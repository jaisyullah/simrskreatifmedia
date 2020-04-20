<?php
/**
 * $Id: nm_saida.php,v 1.1.1.1 2011-05-12 20:31:30 diogo Exp $
 */
    session_start() ;

//print_r($HTTP_SESSION_VARS);
 echo "saida=" . $session_NM_url_saida . " tp=" . $session_NM_tp_saida;exit;
      header ("Location:" . $session_NM_url_saida) ;
//  $session_NM_tp_saida
?>