<?php
/**
 * $Id: nm_secure.php,v 1.1.1.1 2011-05-12 20:31:30 diogo Exp $
 */

if (isset($HTTP_POST_VARS["nm_logout"]) && "Logout" == $HTTP_POST_VARS["nm_logout"])
{
    session_start();
    session_destroy();
}

include_once("nm_secure_base.php");

?>
<HTML>
<HEAD>
 <TITLE>NetMake :: Script Case</TITLE>
 <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
</HEAD>
<FRAMESET ROWS="40,*" FRAMEBORDER="NO" BORDER="0" FRAMESPACING="0" NORESIZE>
 <FRAME NAME="nm_secure_top" SRC="nm_secure_top.php" SCROLLING="NO">
 <FRAME NAME="nm_secure_bot" SRC="nm_secure_bot.php" SCROLLING="AUTO">
</FRAMESET>
</HTML>