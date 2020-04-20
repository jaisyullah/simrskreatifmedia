<?php
/*
 * jQuery File Upload Plugin PHP Example 5.6
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

   // scriptcase
   include_once('sec_form_sec_groups_session.php');
   @session_start();
   // ----------

error_reporting(E_ALL | E_STRICT);

if (!function_exists('array_replace_recursive'))
{
    function array_replace_recursive($array, $array1)
    {
        function recurse($array, $array1)
        {
            foreach ($array1 as $key => $value)
            {
                // create new key in $array, if it is empty or not an array
                if (!isset($array[$key]) || (isset($array[$key]) && !is_array($array[$key])))
                {
                    $array[$key] = array();
                }

                // overwrite the value in the base array
                if (is_array($value))
                {
                    $value = recurse($array[$key], $value);
                }
                $array[$key] = $value;
            }
            return $array;
        }

        // handle the arguments, merge one by one
        $args = func_get_args();
        $array = $args[0];
        if (!is_array($array))
        {
            return $array;
        }
        for ($i = 1; $i < count($args); $i++)
        {
            if (is_array($args[$i]))
            {
                $array = recurse($array, $args[$i]);
            }
        }
        return $array;
    }
}

require('../_lib/lib/php/upload.class.php');

if (!isset($_SESSION['sc_session'][ $_POST['param_seq'] ]['sec_form_sec_groups']['upload_field_info']) || !isset($_SESSION['sc_session'][ $_POST['param_seq'] ]['sec_form_sec_groups']['upload_field_info'][ $_POST['param_field'] ]))
{
    exit;
}

$aUploadInfo = $_SESSION['sc_session'][ $_POST['param_seq'] ]['sec_form_sec_groups']['upload_field_info'][ $_POST['param_field'] ];

$upload_handler = new UploadHandler(array(
        'upload_dir'         => $aUploadInfo['upload_dir'],
        'upload_url'         => scUploadGetHost() . $aUploadInfo['upload_url'],
        'upload_type'        => $aUploadInfo['upload_type'],
        'param_name'         => $_POST['param_field'] . $_POST['upload_file_row'],
        'upload_file_height' => $aUploadInfo['upload_file_height'],
        'upload_file_width'  => $aUploadInfo['upload_file_width'],
        'upload_file_aspect' => $aUploadInfo['upload_file_aspect'],
        'upload_file_type'   => $aUploadInfo['upload_file_type'],
		'accept_file_types'  => $aUploadInfo['upload_allowed_type'],
		'max_file_size'      => isset($aUploadInfo['upload_max_size']) ? $aUploadInfo['upload_max_size'] : null,
));

require('../_lib/lib/php/nm_utf8.php');
require($aUploadInfo['app_dir'] . $aUploadInfo['app_name'] . '_doc_name.php');

header('Pragma: no-cache');
header('Cache-Control: private, no-cache');
header('Content-Disposition: inline; filename="files.json"');
header('X-Content-Type-Options: nosniff');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: OPTIONS, HEAD, GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: X-File-Name, X-File-Type, X-File-Size');

switch ($_SERVER['REQUEST_METHOD']) {
    case 'OPTIONS':
        break;
    case 'HEAD':
    case 'GET':
        $upload_handler->get();
        break;
    case 'POST':
        $upload_handler->post();
        break;
    case 'DELETE':
        $upload_handler->delete();
        break;
    default:
        header('HTTP/1.1 405 Method Not Allowed');
}

function scUploadGetHost() {
        return
                        (isset($_SERVER['HTTPS']) ? 'https://' : 'http://').
                        (isset($_SERVER['REMOTE_USER']) ? $_SERVER['REMOTE_USER'].'@' : '').
                        (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : ($_SERVER['SERVER_NAME'].
                        (isset($_SERVER['HTTPS']) && $_SERVER['SERVER_PORT'] === 443 ||
                        $_SERVER['SERVER_PORT'] === 80 ? '' : ':'.$_SERVER['SERVER_PORT'])));
}

?>
