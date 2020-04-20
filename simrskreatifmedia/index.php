<?php
	$str_apl = 'sec_Login';
	if(is_file("_lib/friendly_url/" . $str_apl . '_ini.txt'))
	{
		$str_apl = file_get_contents("_lib/friendly_url/" . $str_apl . '_ini.txt');
	}
	else
	{
		$str_apl = $str_apl . '/';
	}
    header("Location: " . $str_apl);

?>