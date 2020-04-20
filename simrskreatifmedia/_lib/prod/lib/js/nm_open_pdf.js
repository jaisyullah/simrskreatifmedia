/**
 * $Id: nm_open_pdf.js,v 1.1.1.1 2011-05-12 20:31:29 diogo Exp $
 */
   function nm_gp_pdf(x, y, z, p, o, b, l, cl, f)
   {
       window.open(path_prod + '/lib/php/nm_config_pdf.php?nm_opc=' + x + '&nm_target=' + y + '&nm_cor=' + z + '&papel=' + p + '&orientacao=' + o + '&bookmarks=' + b + '&largura=' + l + '&conf_larg=' + cl + '&conf_fonte=' + f + '&grafico=' + contr_grafico + '&language=' + contr_idioma, '', 'location=no,menubar=no,resizable=no,scrollbars=no,status=no,toolbar=no,width=300,height=250');
   }