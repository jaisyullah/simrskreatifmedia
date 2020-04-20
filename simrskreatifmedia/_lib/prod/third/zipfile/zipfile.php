<?php

set_time_limit(0);

class zipfile
{
    var $datasec      = array();                            // array to store compressed data
    var $ctrl_dir     = array();                            // central directory
    var $eof_ctrl_dir = "\x50\x4b\x05\x06\x00\x00\x00\x00"; // end of Central directory record
    var $old_offset   = 0;
    var $file_pointer = false;
    var $new_offset   = 0;

    function add_dir($name)
    // adds "directory" to archive - do this before putting any files in directory!
    // $name - name of directory... like this: "path/"
    // ...then you can add files using add_file with names like "path/file.txt"
    {

        $name = str_replace("\\", "/", $name);

        $fr  = "\x50\x4b\x03\x04";
        $fr .= "\x0a\x00";         // ver needed to extract
        $fr .= "\x00\x00";         // gen purpose bit flag
        $fr .= "\x00\x00";         // compression method
        $fr .= "\x00\x00\x00\x00"; // last mod time and date
        $fr .= pack("V", 0);             // crc32
        $fr .= pack("V", 0);             // compressed filesize
        $fr .= pack("V", 0);             // uncompressed filesize
        $fr .= pack("v", strlen($name)); // length of pathname
        $fr .= pack("v", 0 );            // extra field length
        $fr .= $name;
        // end of "local file header" segment

        // no "file data" segment for path

        // "data descriptor" segment (optional but necessary if archive is not served as file)
        if(isset($crc))
        {
            $fr .= pack("V", $crc);     //crc32
        }else
        {
            $fr .= pack("V", "");     //crc32
        }

        if(isset($c_len))
        {
            $fr .= pack("V", $c_len);   //compressed filesize
        }else
        {
            $fr .= pack("V", "");   //compressed filesize
        }

        if(isset($unc_len))
        {
            $fr .= pack("V", $unc_len); //uncompressed filesize
        }else
        {
            $fr .= pack("V", ""); //uncompressed filesize
        }

        // add this entry to array
        if ($this->file_pointer)
        {
            @fwrite($this->file_pointer, $fr);
            $this->new_offset += strlen($fr);
            $new_offset        = $this->new_offset;
        }
        else
        {
            $this->datasec[] = $fr;
            $new_offset = strlen(implode("", $this->datasec));
        }

        // ext. file attributes mirrors MS-DOS directory attr byte, detailed
        // at http://support.microsoft.com/support/kb/articles/Q125/0/19.asp
        // now add to central record
        $cdrec  = "\x50\x4b\x01\x02";
        $cdrec .= "\x00\x00";               // version made by
        $cdrec .= "\x0a\x00";               // version needed to extract
        $cdrec .= "\x00\x00";               // gen purpose bit flag
        $cdrec .= "\x00\x00";               // compression method
        $cdrec .= "\x00\x00\x00\x00";       // last mod time & date
        $cdrec .= pack("V", 0);             // crc32
        $cdrec .= pack("V", 0);             // compressed filesize
        $cdrec .= pack("V", 0);             // uncompressed filesize
        $cdrec .= pack("v", strlen($name)); // length of filename
        $cdrec .= pack("v", 0);             // extra field length
        $cdrec .= pack("v", 0);             // file comment length
        $cdrec .= pack("v", 0);             // disk number start
        $cdrec .= pack("v", 0);             // internal file attributes
        $ext    = "\x00\x00\x10\x00";
        $ext    = "\xff\xff\xff\xff";
        $cdrec .= pack("V", 16);                  //external file attributes  - 'directory' bit set
        $cdrec .= pack("V", $this -> old_offset); //relative offset of local header

        $this->old_offset = $new_offset;
        $cdrec .= $name;
        // optional extra field, file comment goes here
        // save to array
        $this->ctrl_dir[] = $cdrec;
    }


    function add_file($data, $name)
    // adds "file" to archive
    // $data - file contents
    // $name - name of file in archive. Add path if your want
    {
        $name = str_replace("\\", "/", $name);
        //$name = str_replace("\\", "\\\\", $name);

        $fr  = "\x50\x4b\x03\x04";
        $fr .= "\x14\x00";         // ver needed to extract
        $fr .= "\x00\x00";         // gen purpose bit flag
        $fr .= "\x08\x00";         // compression method
        $fr .= "\x00\x00\x00\x00"; // last mod time and date

        $unc_len = strlen($data);
        $crc     = crc32($data);
        $zdata   = gzcompress($data);
        $zdata   = substr(substr($zdata, 0, strlen($zdata) - 4), 2); // fix crc bug
        $c_len   = strlen($zdata);
        $fr     .= pack("V", $crc);          // crc32
        $fr     .= pack("V", $c_len);        // compressed filesize
        $fr     .= pack("V", $unc_len);      // uncompressed filesize
        $fr     .= pack("v", strlen($name)); // length of filename
        $fr     .= pack("v", 0);             // extra field length
        $fr     .= $name;
        // end of "local file header" segment
        // "file data" segment
        $fr .= $zdata;

        // "data descriptor" segment (optional but necessary if archive is not served as file)
        $fr .= pack("V", $crc);     //crc32
        $fr .= pack("V", $c_len);   //compressed filesize
        $fr .= pack("V", $unc_len); //uncompressed filesize
        // add this entry to array
        if ($this->file_pointer)
        {
            @fwrite($this->file_pointer, $fr);
            $this->new_offset += strlen($fr);
            $new_offset        = $this->new_offset;
        }
        else
        {
            $this->datasec[] = $fr;
            $new_offset = strlen(implode("", $this->datasec));
        }
        // now add to central directory record
        $cdrec =  "\x50\x4b\x01\x02";
        $cdrec .= "\x00\x00";               // version made by
        $cdrec .= "\x14\x00";               // version needed to extract
        $cdrec .= "\x00\x00";               // gen purpose bit flag
        $cdrec .= "\x08\x00";               // compression method
        $cdrec .= "\x00\x00\x00\x00";       // last mod time & date
        $cdrec .= pack("V",$crc);           // crc32
        $cdrec .= pack("V",$c_len);         // compressed filesize
        $cdrec .= pack("V",$unc_len);       // uncompressed filesize
        $cdrec .= pack("v", strlen($name)); // length of filename
        $cdrec .= pack("v", 0);             // extra field length
        $cdrec .= pack("v", 0);             // file comment length
        $cdrec .= pack("v", 0);             // disk number start
        $cdrec .= pack("v", 0);             // internal file attributes
        $cdrec .= pack("V", 32);            // external file attributes - 'archive' bit set

        $cdrec .= pack("V", $this->old_offset); //relative offset of local header
//        echo "old offset is ".$this->old_offset.", new offset is $new_offset<br>";
        $this->old_offset = $new_offset;

        $cdrec .= $name;
        // optional extra field, file comment goes here
        // save to central directory
        $this->ctrl_dir[] = $cdrec;
    }

    function file()
    // dump out file
    {
        $ctrldir = implode("", $this->ctrl_dir);

        if ($this->file_pointer)
        {
            @fwrite($this->file_pointer,
                    $ctrldir .
                    $this->eof_ctrl_dir.
                    pack("v", sizeof($this->ctrl_dir)).
                    pack("v", sizeof($this->ctrl_dir)).
                    pack("V", strlen($ctrldir)).
                    pack("V", $this->new_offset).
                    "\x00\x00");
            @fclose($this->file_pointer);
        }
        else
        {
            $data = implode("", $this->datasec);
            return
                $data.
                $ctrldir.
                $this->eof_ctrl_dir.
                pack("v", sizeof($this->ctrl_dir)). // total # of entries "on this disk"
                pack("v", sizeof($this->ctrl_dir)). // total # of entries overall
                pack("V", strlen($ctrldir)).        // size of central dir
                pack("V", strlen($data)).           // offset to start of central dir
                "\x00\x00";                         // .zip file comment length
        }
    }

    function zip_dir($dir, $zip)
    {
        $dir = nm_dir_normalize($dir);
        $pre = substr($dir, 0, -1);
        $pre = substr($pre, strrpos($pre, '/') + 1);
        $this->set_file($zip);
        if (@is_dir($dir))
        {
            $this->zip_dir_recur($dir, '', $pre . '/');
        }
        $this->file();
    }

    function zip_dir_recur($dir, $sub, $pre)
    {
        $lst = array('bkp', 'c', 'css', 'htm', 'html', 'ihtml', 'inc', 'ini', 'js',
                     'php', 'phps', 'sql', 'tpl', 'txt');
        $res = @opendir($dir . $sub);
        if ($res)
        {
            while (FALSE !== ($file = @readdir($res)))
            {
                if ('.' != $file && '..' != $file)
                {
                    if (@is_dir($dir . $sub . $file))
                    {
                        $this->add_dir($pre . $sub . $file . '/');
                        $this->zip_dir_recur($dir, $sub . $file . '/', $pre);
                    }
                    elseif (@is_file($dir . $sub . $file))
                    {
                        $pos  = strrpos($file, '.');
                        $data = '';
                        if (FALSE === $pos)
                        {
                            $data = implode('', @file($dir . $sub . $file));
                        }
                        else
                        {
                            $ext = strtolower(substr($file, $pos + 1));
                            if (in_array($ext, $lst))
                            {
                                $data = implode('', @file($dir . $sub . $file));
                            }
                            else
                            {
                                $fp = @fopen($dir . $sub . $file, 'rb');
                                if ($fp)
                                {
                                    $size = @filesize($dir . $sub . $file);
                                    $data = (0 == $size) ? '' : @fread($fp, $size);
                                    @fclose($fp);
                                }
                            }
                        }
                        $this->add_file($data, $pre . $sub . $file);
                    }
                }
            }
        }
    }

    function sc_zip_all($dir)
    {
        $dir = str_replace("\\", '/', $dir);
        $dir = str_replace('//', '/', $dir);
        if (@is_dir($dir))
        {
            if ('/' != substr($dir, -1))
            {
                $dir .= '/';
            }
            $pre = substr($dir, 0, -1);
            $pre = substr($pre, strrpos($pre, '/') + 1);
            $this->sc_zip_dir_recur($dir, '', $pre . '/');
        }
        else
        {
            $pos = strrpos($dir, '/');
            if ($pos === false)
            {
                $file = $dir;
                $dir  = "";
            }
            else
            {
                $file = substr($dir, $pos + 1);
                $dir  = substr($dir, 0, $pos + 1);
            }
            $this->sc_zip_file($dir, "", "", $file);
        }
    }

    function sc_zip_dir_recur($dir, $sub, $pre)
    {
        $res = @opendir($dir . $sub);
        if ($res)
        {
            while (FALSE !== ($file = @readdir($res)))
            {
                if ('.' != $file && '..' != $file)
                {
                    if (@is_dir($dir . $sub . $file))
                    {
                        $this->add_dir($pre . $sub . $file . '/');
                        $this->zip_dir_recur($dir, $sub . $file . '/', $pre);
                    }
                    else
                    {
                        $this->sc_zip_file($dir, $sub, $pre, $file);
                    }
                }
            }
        }
    }
    function sc_zip_file($dir, $sub, $pre, $file)
    {
        $lst = array('bkp', 'c', 'css', 'htm', 'html', 'ihtml', 'inc', 'ini', 'js',
                     'php', 'phps', 'sql', 'tpl', 'txt');
        if (@is_file($dir . $sub . $file))
        {
            $pos  = strrpos($file, '.');
            $data = '';
            if (FALSE === $pos)
            {
                $data = implode('', @file($dir . $sub . $file));
            }
            else
            {
                $ext = strtolower(substr($file, $pos + 1));
                if (in_array($ext, $lst))
                {
                    $data = implode('', @file($dir . $sub . $file));
                }
                else
                {
                    $fp = @fopen($dir . $sub . $file, 'rb');
                    if ($fp)
                    {
                        $size = @filesize($dir . $sub . $file);
                        $data = (0 == $size) ? '' : @fread($fp, $size);
                        @fclose($fp);
                    }
               }
            }
            $this->add_file($data, $pre . $sub . $file);
        }
    }

    function init_zip()
    {
        $datasec      = array();
        $ctrl_dir     = array();
        $eof_ctrl_dir = "\x50\x4b\x05\x06\x00\x00\x00\x00";
        $old_offset   = 0;
        $new_offset   = 0;
    }

    function set_file($file)
    {
        $this->file_pointer = @fopen($file, 'w');
        $this->init_zip();
    }
}

?>