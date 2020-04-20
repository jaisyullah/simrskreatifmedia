<div id="id_msg" class="nmIntroMsgNotRead" onclick="$( '#id_msg' ).remove(); setCookieProd('scprod8_dont_show_msg_connection', 'S', 1);">
	<?php echo $nm_lang['page_apl_cache']; ?>
</div>
<script>
	$( document ).ready(function() {
		if(document.cookie.indexOf('scprod8_dont_show_msg_connection=S') < 0)
		{
			$( "#id_msg" ).fadeIn( 1000 );
		}
	});
</script>