<?php
/*
 * jQuery File Upload Plugin PHP Class 5.6
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

class UploadHandler
{
    private $options;

    function __construct($options=null) {
        $this->options = array(
            'script_url' => $this->getFullUrl().'/',
            'upload_dir' => dirname($_SERVER['SCRIPT_FILENAME']).'/files/',
            'upload_url' => $this->getFullUrl().'/files/',
            'param_name' => 'files',
            // The php.ini settings upload_max_filesize and post_max_size
            // take precedence over the following max_file_size setting:
            'max_file_size' => null,
            'min_file_size' => 1,
            'accept_file_types' => '/.+$/i',
            'max_number_of_files' => null,
            // Set the following option to false to enable non-multipart uploads:
            'discard_aborted_uploads' => true,
            // Set to true to rotate images based on EXIF meta data, if available:
            'orient_image' => false,
            'image_versions' => array(
                // Uncomment the following version to restrict the size of
                // uploaded images. You can also add additional versions with
                // their own upload directories:
                /*
                'large' => array(
                    'upload_dir' => dirname($_SERVER['SCRIPT_FILENAME']).'/files/',
                    'upload_url' => $this->getFullUrl().'/files/',
                    'max_width' => 1920,
                    'max_height' => 1200
                ),
                'thumbnail' => array(
                    'upload_dir' => dirname($_SERVER['SCRIPT_FILENAME']).'/thumbnails/',
                    'upload_url' => $this->getFullUrl().'/thumbnails/',
                    'max_width' => 80,
                    'max_height' => 80
                )
                */
            )
        );
        if ($options) {
            $this->options = array_replace_recursive($this->options, $options);
        }
    }

    function getFullUrl() {
              return
                        (isset($_SERVER['HTTPS']) ? 'https://' : 'http://').
                        (isset($_SERVER['REMOTE_USER']) ? $_SERVER['REMOTE_USER'].'@' : '').
                        (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : ($_SERVER['SERVER_NAME'].
                        (isset($_SERVER['HTTPS']) && $_SERVER['SERVER_PORT'] === 443 ||
                        $_SERVER['SERVER_PORT'] === 80 ? '' : ':'.$_SERVER['SERVER_PORT']))).
                        substr($_SERVER['SCRIPT_NAME'],0, strrpos($_SERVER['SCRIPT_NAME'], '/'));
    }

    private function get_file_object($file_name) {
        $file_path = $this->options['upload_dir'].$file_name;
        if (is_file($file_path) && $file_name[0] !== '.') {
            $file = new stdClass();
            $file->name = $file_name;
            $file->size = filesize($file_path);
            $file->url = $this->options['upload_url'].rawurlencode($file->name);
            foreach($this->options['image_versions'] as $version => $options) {
                if (is_file($options['upload_dir'].$file_name)) {
                    $file->{$version.'_url'} = $options['upload_url']
                        .rawurlencode($file->name);
                }
            }
            $file->delete_url = $this->options['script_url']
                .'?file='.rawurlencode($file->name);
            $file->delete_type = 'DELETE';
            return $file;
        }
        return null;
    }

    private function get_file_objects() {
        return array_values(array_filter(array_map(
            array($this, 'get_file_object'),
            scandir($this->options['upload_dir'])
        )));
    }

    private function create_scaled_image($file_name, $options) {
        $file_path = $this->options['upload_dir'].$file_name;
        $new_file_path = $options['upload_dir'].$file_name;
        list($img_width, $img_height) = @getimagesize($file_path);
        if (!$img_width || !$img_height) {
            return false;
        }
        $scale = min(
            $options['max_width'] / $img_width,
            $options['max_height'] / $img_height
        );
        if ($scale > 1) {
            $scale = 1;
        }
        $new_width = $img_width * $scale;
        $new_height = $img_height * $scale;
        $new_img = @imagecreatetruecolor($new_width, $new_height);
        switch (strtolower(substr(strrchr($file_name, '.'), 1))) {
            case 'jpg':
            case 'jpeg':
                $src_img = @imagecreatefromjpeg($file_path);
                $write_image = 'imagejpeg';
                break;
            case 'gif':
                @imagecolortransparent($new_img, @imagecolorallocate($new_img, 0, 0, 0));
                $src_img = @imagecreatefromgif($file_path);
                $write_image = 'imagegif';
                break;
            case 'png':
                @imagecolortransparent($new_img, @imagecolorallocate($new_img, 0, 0, 0));
                @imagealphablending($new_img, false);
                @imagesavealpha($new_img, true);
                $src_img = @imagecreatefrompng($file_path);
                $write_image = 'imagepng';
                break;
            default:
                $src_img = $image_method = null;
        }
        $success = $src_img && @imagecopyresampled(
            $new_img,
            $src_img,
            0, 0, 0, 0,
            $new_width,
            $new_height,
            $img_width,
            $img_height
        ) && $write_image($new_img, $new_file_path);
        // Free up memory (imagedestroy does not delete files):
        @imagedestroy($src_img);
        @imagedestroy($new_img);
        return $success;
    }

    private function has_error($uploaded_file, $file, $error) {
        if ($error) {
            return $error;
        }
        if (!preg_match($this->options['accept_file_types'], $file->name)) {
            return 'acceptFileTypes';
        }
        if ($uploaded_file && is_uploaded_file($uploaded_file)) {
            $file_size = filesize($uploaded_file);
        } else {
            $file_size = $_SERVER['CONTENT_LENGTH'];
        }
        if (0 === $file_size) {
            return 'emptyFile';
        }
        if ($this->options['max_file_size'] && (
                $file_size > $this->options['max_file_size'] ||
                $file->size > $this->options['max_file_size'])
            ) {
            return 'maxFileSize';
        }
        if ($this->options['min_file_size'] &&
            $file_size < $this->options['min_file_size']) {
            return 'minFileSize';
        }
        if (is_int($this->options['max_number_of_files']) && (
                count($this->get_file_objects()) >= $this->options['max_number_of_files'])
            ) {
            return 'maxNumberOfFiles';
        }
        return $error;
    }

    private function trim_file_name($name, $type) {
        // Remove path information and dots around the filename, to prevent uploading
        // into different directories or replacing hidden system files.
        // Also remove control characters and spaces (\x00..\x20) around the filename:
        // scriptcase
        $file_name = trim($this->mb_basename(stripslashes($name)), ".\x00..\x20");
        /*$file_name = trim(basename(stripslashes($name)), ".\x00..\x20");*/
        // ----------
        // Add missing file extension for known image types:
        if (strpos($file_name, '.') === false &&
            preg_match('/^image\/(gif|jpe?g|png)/', $type, $matches)) {
            $file_name .= '.'.$matches[1];
        }
        return $file_name;
    }

    private function orient_image($file_path) {
              $exif = exif_read_data($file_path);
              $orientation = intval(@$exif['Orientation']);
              if (!in_array($orientation, array(3, 6, 8))) {
                  return false;
              }
              $image = @imagecreatefromjpeg($file_path);
              switch ($orientation) {
                  case 3:
                      $image = @imagerotate($image, 180, 0);
                      break;
                  case 6:
                      $image = @imagerotate($image, 270, 0);
                      break;
                  case 8:
                      $image = @imagerotate($image, 90, 0);
                      break;
                  default:
                      return false;
              }
              $success = imagejpeg($image, $file_path);
              // Free up memory (imagedestroy does not delete files):
              @imagedestroy($image);
              return $success;
    }

    private function handle_file_upload($uploaded_file, $name, $size, $type, $error) {
        $file = new stdClass();
        $file->name = $this->trim_file_name($name, $type);
        $file->size = intval($size);
        $file->type = $type;
        // scriptcase
        $file->name_prot = sc_upload_protect_chars($file->name);
        $sUploadFileNameOrig = $file->name_prot;
        $sUploadFileNameProt = $sUploadFileNameOrig;
        if (isset($_SESSION['scriptcase']['charset']) && 'UTF-8' != $_SESSION['scriptcase']['charset'])
        {
            $sUploadFileNameProt = mb_convert_encoding($sUploadFileNameProt, $_SESSION['scriptcase']['charset'], 'UTF-8');
            $sUploadFileNameOrig = mb_convert_encoding($sUploadFileNameOrig, $_SESSION['scriptcase']['charset'], 'UTF-8');
        }
        $bRedim          = 0 < $this->options['upload_file_height'] && 0 < $this->options['upload_file_width'];
        $sRandomPart     = 'sc_' . substr(md5(mt_rand(1, 1000) . date('His')), 0, 8) . '_';
        $sExtension      = false === strpos($file->name, '.') ? '' : substr($file->name, strrpos($file->name, '.'));
        $file->sc_random = 'sc_' . substr(md5(mt_rand(1, 1000) . date('His')), 0, 8) . '_';
        if ($bRedim)
        {
            $file->sc_thumb_prot = $file->sc_random . 'thumb_' . md5($sUploadFileNameProt) . $sExtension;
            $file->sc_thumb      = $file->sc_random . 'thumb_' . md5($sUploadFileNameOrig) . $sExtension;
        }
        else
        {
            $file->sc_thumb_prot = $file->sc_random . $sUploadFileNameProt;
            $file->sc_thumb      = $file->sc_random . $sUploadFileNameOrig;
        }
        $file->sc_random_prot = $file->sc_random . $sUploadFileNameProt;
        $file->sc_random      = $file->sc_random . $sUploadFileNameOrig;
        // ----------
        $error = $this->has_error($uploaded_file, $file, $error);
        if (!$error && $file->name) {
            // scriptcase
            //$file_path = $this->options['upload_dir'].$file->name;
            if ('I' == $this->options['upload_file_type'])
            {
                $file->sc_image_source = $sRandomPart . md5($sUploadFileNameOrig) . $sExtension;
                $file_path = $this->options['upload_dir'] . $file->sc_image_source;
            }
            else
            {
                $file_path = $this->options['upload_dir'] . sc_upload_unprotect_chars($file->sc_random);
            }
            // ----------
            $append_file = !$this->options['discard_aborted_uploads'] &&
                is_file($file_path) && $file->size > filesize($file_path);
            clearstatcache();
            if ($uploaded_file && is_uploaded_file($uploaded_file)) {
                // multipart/formdata uploads (POST method uploads)
                if ($append_file) {
                    file_put_contents(
                        $file_path,
                        fopen($uploaded_file, 'r'),
                        FILE_APPEND
                    );
                } else {
                    move_uploaded_file($uploaded_file, $file_path);
                }
            } else {
                // Non-multipart uploads (PUT method support)
                file_put_contents(
                    $file_path,
                    fopen('php://input', 'r'),
                    $append_file ? FILE_APPEND : 0
                );
            }
            if ('I' == $this->options['upload_file_type'])
            {
                $copyFile = $this->options['upload_dir'] . sc_upload_unprotect_chars($file->sc_random);
                @copy($file_path, $copyFile);
                $this->correctImageOrientation($copyFile);
            }
            $file_size = filesize($file_path);
            if ($file_size === $file->size) {
                if ($this->options['orient_image']) {
                    $this->orient_image($file_path);
                }
                else {
                    $this->correctImageOrientation($file_path);
                }
                // scriptcase
                //$file->url = $this->options['upload_url'].rawurlencode($file->name);
                $file->url = $this->options['upload_url'].rawurlencode($file->sc_random);
                // ----------
                foreach($this->options['image_versions'] as $version => $options) {
                    // scriptcase
                    /*
                    if ($this->create_scaled_image($file->name, $options)) {
                        $file->{$version.'_url'} = $options['upload_url']
                            .rawurlencode($file->name);
                    }
                    */
                    if ($this->create_scaled_image($file->sc_random, $options)) {
                        $file->{$version.'_url'} = $options['upload_url']
                            .rawurlencode($file->sc_random);
                    }
                    // ----------
                }
            } else if ($this->options['discard_aborted_uploads']) {
                unlink($file_path);
                $file->error = 'abort';
            }
            $file->size = $file_size;
            // scriptcase
            /*
            $file->delete_url = $this->options['script_url']
                .'?file='.rawurlencode($file->name);
            */
            $file->delete_url = $this->options['script_url']
                .'?file='.rawurlencode($file->sc_random);
            if ($bRedim)
            {
                include_once('../_lib/lib/php/nm_trata_img.php');
                $sc_obj_img = new nm_trata_img($this->options['upload_dir'] . sc_upload_unprotect_chars($file->sc_random));
                $sc_obj_img->setWidth($this->options['upload_file_width']);
                $sc_obj_img->setHeight($this->options['upload_file_height']);
                $sc_obj_img->setManterAspecto('N' != $this->options['upload_file_aspect']);
                $sc_obj_img->createImg($this->options['upload_dir'] . $file->sc_thumb);
            }
            elseif ('I' == $this->options['upload_file_type'])
            {
                $file->sc_thumb_prot = $file->sc_image_source;
            }
            // ----------
            $file->delete_type = 'DELETE';
            // scriptcase
            if (isset($_SESSION['scriptcase']['charset']) && 'UTF-8' != $_SESSION['scriptcase']['charset'])
            {
                $file->sc_random_prot = mb_convert_encoding($file->sc_random_prot, 'UTF-8', $_SESSION['scriptcase']['charset']);
                $file->sc_random      = mb_convert_encoding($file->sc_random,      'UTF-8', $_SESSION['scriptcase']['charset']);
                $file->sc_thumb_prot  = mb_convert_encoding($file->sc_thumb_prot,  'UTF-8', $_SESSION['scriptcase']['charset']);
                $file->sc_thumb       = mb_convert_encoding($file->sc_thumb,       'UTF-8', $_SESSION['scriptcase']['charset']);
            }
            global $aUploadInfo;
            $file->sc_ul_name = md5($aUploadInfo['app_name'] . $this->options['param_name'] . $file->sc_random_prot . microtime());
            $_SESSION['sc_session'][ $_POST['param_seq'] ][ $aUploadInfo['app_name'] ]['upload_field_ul_name'][$file->sc_ul_name] = $file->sc_random_prot;
            // ----------
        } else {
            $file->error = $error;
        }
        return $file;
    }

    public function get() {
        $file_name = isset($_REQUEST['file']) ?
            basename(stripslashes($_REQUEST['file'])) : null;
        if ($file_name) {
            $info = $this->get_file_object($file_name);
        } else {
            $info = $this->get_file_objects();
        }
        header('Content-type: application/json');
        echo json_encode($info);
    }

    public function post() {
        if (isset($_REQUEST['_method']) && $_REQUEST['_method'] === 'DELETE') {
            return $this->delete();
        }
        $upload = isset($_FILES[$this->options['param_name']]) ?
            $_FILES[$this->options['param_name']] : null;
        $info = array();
        if ($upload && is_array($upload['tmp_name'])) {
            foreach ($upload['tmp_name'] as $index => $value) {
                $info[] = $this->handle_file_upload(
                    $upload['tmp_name'][$index],
                    isset($_SERVER['HTTP_X_FILE_NAME']) ?
                        $_SERVER['HTTP_X_FILE_NAME'] : $upload['name'][$index],
                    isset($_SERVER['HTTP_X_FILE_SIZE']) ?
                        $_SERVER['HTTP_X_FILE_SIZE'] : $upload['size'][$index],
                    isset($_SERVER['HTTP_X_FILE_TYPE']) ?
                        $_SERVER['HTTP_X_FILE_TYPE'] : $upload['type'][$index],
                    $upload['error'][$index]
                );
            }
        } elseif ($upload || isset($_SERVER['HTTP_X_FILE_NAME'])) {
            $info[] = $this->handle_file_upload(
                isset($upload['tmp_name']) ? $upload['tmp_name'] : null,
                isset($_SERVER['HTTP_X_FILE_NAME']) ?
                    $_SERVER['HTTP_X_FILE_NAME'] : (isset($upload['name']) ?
                        isset($upload['name']) : null),
                isset($_SERVER['HTTP_X_FILE_SIZE']) ?
                    $_SERVER['HTTP_X_FILE_SIZE'] : (isset($upload['size']) ?
                        isset($upload['size']) : null),
                isset($_SERVER['HTTP_X_FILE_TYPE']) ?
                    $_SERVER['HTTP_X_FILE_TYPE'] : (isset($upload['type']) ?
                        isset($upload['type']) : null),
                isset($upload['error']) ? $upload['error'] : null
            );
        }
        header('Vary: Accept');
        $json = json_encode($info);
        $redirect = isset($_REQUEST['redirect']) ?
            stripslashes($_REQUEST['redirect']) : null;
        if ($redirect) {
            header('Location: '.sprintf($redirect, rawurlencode($json)));
            return;
        }
        if (isset($_SERVER['HTTP_ACCEPT']) &&
            (strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false)) {
            header('Content-type: application/json');
        } else {
            header('Content-type: text/plain');
        }
        echo $json;
    }

    public function delete() {
        $file_name = isset($_REQUEST['file']) ?
            basename(stripslashes($_REQUEST['file'])) : null;
        $file_path = $this->options['upload_dir'].$file_name;
        $success = is_file($file_path) && $file_name[0] !== '.' && unlink($file_path);
        if ($success) {
            foreach($this->options['image_versions'] as $version => $options) {
                $file = $options['upload_dir'].$file_name;
                if (is_file($file)) {
                    unlink($file);
                }
            }
        }
        header('Content-type: application/json');
        echo json_encode($success);
    }

    // scriptcase
    private function mb_basename($path)
    {
        $separator = " qq ";
        $path = preg_replace("/[^ ]/u", $separator."\$0".$separator, $path);
        $base = basename($path);
        $base = str_replace($separator, "", $base);
        return $base;
    }

    private function correctImageOrientation($filename)
    {
        if (function_exists('exif_read_data')) {
            $imageType = exif_imagetype($filename);
            if (!in_array($imageType, [IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP])) {
                return;
            }
            switch ($imageType) {
                case IMAGETYPE_GIF:
                    $img = imagecreatefromgif($filename);
                    break;
                case IMAGETYPE_JPEG:
                    $img = imagecreatefromjpeg($filename);
                    break;
                case IMAGETYPE_PNG:
                    $img = imagecreatefrompng($filename);
                    break;
                case IMAGETYPE_BMP:
                    $img = imagecreatefrombmp($filename);
                    break;
            }
            $exif = exif_read_data($filename);
            if ($img && $exif && isset($exif['Orientation'])) {
                $ort = $exif['Orientation'];
                $changed = false;
                if ($ort == 6 || $ort == 5) {
                    $img = imagerotate($img, 270, null);
                    $changed = true;
                }
                if ($ort == 3 || $ort == 4) {
                    $img = imagerotate($img, 180, null);
                    $changed = true;
                }
                if ($ort == 8 || $ort == 7) {
                    $img = imagerotate($img, 90, null);
                    $changed = true;
                }
                if ($ort == 5 || $ort == 4 || $ort == 7) {
                    imageflip($img, IMG_FLIP_HORIZONTAL);
                    $changed = true;
                }
                if ($changed) {
                    switch ($imageType) {
                        case IMAGETYPE_GIF:
                            imagegif($img, $filename);
                            break;
                        case IMAGETYPE_JPEG:
                            imagejpeg($img, $filename);
                            break;
                        case IMAGETYPE_PNG:
                            imagepng($img, $filename);
                            break;
                        case IMAGETYPE_BMP:
                            imagebmp($img, $filename);
                            break;
                    }
                }
            }
        }
    }
    // ----------

}
