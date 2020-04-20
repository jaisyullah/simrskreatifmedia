/**
 * $Id: nm_open_graf.js,v 1.1.1.1 2011-05-12 20:31:29 diogo Exp $
 */
   function nm_gp_graf(a, t, p, l)
   {
       window.open(path_prod + '/lib/php/nm_config_graf.php?nome_apl=' + a + '&campo_apl=' + t + '&sc_page=' + p + '&language=' + l, '', 'location=no,menubar=no,resizable=no,scrollbars=no,status=no,toolbar=no,width=350,height=230'); return false;
   }