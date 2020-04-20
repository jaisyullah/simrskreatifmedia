<?php

if (!isset($_POST['imgData'])) {
    exit;
}

$ext   = '.' . trim($_POST['imgType']);
$fname = trim($_POST['imgName']) . $ext;

$f = fopen($fname, 'wb');
fwrite($f, base64_decode($_POST['imgData']));
fclose($f);

?>
