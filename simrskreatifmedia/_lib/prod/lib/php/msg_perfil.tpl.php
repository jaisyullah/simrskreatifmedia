<?php
/**
 * $Id: msg_perfil.tpl.php,v 1.1.1.1 2011-05-12 20:31:29 diogo Exp $
 */
?>
<html>
<head>
	<title><?php echo $nm_lang['error_perfil_title']; ?></title>
</head>
<style type="text/css">
    .scTable      { border: 1px solid #426184 }
	.scErrorTitle { background-color: #BDD7F7; color: #314163; font-family: Verdana, Arial, sans-serif; font-size: 16px; font-weight: bold; padding: 2px 5px 2px; }
	.scErrorMsg   { background-color: #F7F7F7; color: #000000; font-family: Verdana, Arial, sans-serif; font-size: 13px; padding: 2px 5px 2px; }
	.scErrorText  { color: #424142; }
</style>
<body>
	<TABLE border="0" cellspacing="0" cellpadding="3"  bordercolor="" align="center" width="50%" class="scTable">
		<tr class="scErrorTitle">
			<td>
			<?php echo $nm_lang['error_perfil_title']; ?>
			</td>
			</tr>
		<tr class="scErrorMsg">
			<td class="scErrorText">
				<?php echo sprintf($nm_lang['error_perfil_msg'], $str_conexao, $str_link); ?>
			</td>
		</tr>
	</table>
</body>
</html>