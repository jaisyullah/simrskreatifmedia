<?php

$progressFile = $_POST['export_progress_file'];

if (@is_file($progressFile)) {
	echo @file_get_contents($progressFile);
}
else {
	echo 'nofile';
}
exit;

?>