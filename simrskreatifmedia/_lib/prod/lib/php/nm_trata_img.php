<?php
class nm_trata_img
{
        //privado
        var $v_str_prod_dir = "";
        //privado
        var $v_str_img_path = "";
        //privado
        var $v_str_img_ext = "";
        //privado
        var $v_str_img_width = 0;
        //privado
        var $v_str_img_width_original = 0;
        //privado
        var $v_str_img_height = 0;
        //privado
        var $v_str_img_height_original = 0;
        //privado
        var $v_str_erro = "";
        //privado
        var $v_bol_manter_aspect = "";
        //privado
        var $v_bol_force = false;

        function __construct($v_str_img_path, $bol_force = false)
        {
                if(!is_file($v_str_img_path))
                {
                        return false;
                }

                $this->setForceCreation($bol_force);

                $this->v_str_img_path = $v_str_img_path;

                //pega dimensoes
                $arr_temp = getImageSize($this->v_str_img_path);

                $this->setWidth($arr_temp[0]);//atribui width
                $this->setHeight($arr_temp[1]);//atribui height
                $this->setWidthOri($arr_temp[0]);//atribui width
                $this->setHeightOri($arr_temp[1]);//atribui height

                $this->setManterAspecto(false);

                $arr_ext = array();
                $arr_ext[1] = "GIF";
                $arr_ext[2] = "JPG";
                $arr_ext[3] = "PNG";
                $arr_ext[4] = "SWF";
                $arr_ext[5] = "PSD";
                $arr_ext[6] = "BMP";
                $arr_ext[7] = "TIFF(intel byte order)";
                $arr_ext[8] = "TIFF(motorola byte order)";
                $arr_ext[9] = "JPC";
                $arr_ext[10] = "JP2";
                $arr_ext[11] = "JPX";
                $arr_ext[12] = "JB2";
                $arr_ext[13] = "SWC";
                $arr_ext[14] = "IFF";
                $arr_ext[15] = "WBMP";
                $arr_ext[16] = "XBM";

                if(isset($arr_ext[$arr_temp[2]]))
                {
                        $this->setExt($arr_ext[$arr_temp[2]]);
                }else
                {
                        $this->setExt("undefined");
                }
        }

        //getters

        //public
        //mantem aspecto
        function setManterAspecto($v_bol_manter_aspect)
        {
                $this->v_bol_manter_aspect = $v_bol_manter_aspect;
        }

        //privado
        function getManterAspecto()
        {
                return $this->v_bol_manter_aspect;
        }

        //privado
        function calculaAspecto()
        {
            //cria height proporcional
            if ($this->getWidthOri() == 0)
            {
                return;
            }
            $iWidNew  = $this->getWidth();
            $iHeiNew  = $this->getHeight();
            $iWidth   = $iWidNew;
            $fAspecto = $iWidth / $this->getWidthOri();
            $iHeight  = floor($this->getHeightOri() * $fAspecto);
            if ($iHeiNew < $iHeight)
            {
                $iHeight  = $iHeiNew;
                $fAspecto = $iHeight / $this->getHeightOri();
                $iWidth   = floor($this->getWidthOri() * $fAspecto);
            }
            $this->setWidth($iWidth);
            $this->setHeight($iHeight);
            /*
            if ($this->getWidthOri() > $this->getHeightOri())
            {
                    $ratio = $this->getWidthOri() / $this->getWidth();
                    $this->setHeight($this->getHeightOri() / $ratio);
            }
            else
            {
                    $ratio = $this->getHeightOri() / $this->getWidth();
                    $this->setWidth($this->getHeightOri() / $ratio);
            }
            */
        }

        //public
        function getError()
        {
                return $this->v_str_erro;
        }
        //privado
        function setError($v_str_error)
        {
                $this->v_str_erro = $v_str_error;
        }

        //publico
        function getWidth()
        {
                return $this->v_str_img_width;
        }
        //publico
        function setWidth($v_int_width)
        {
                $this->v_str_img_width = $v_int_width;
        }
        //publico
        function setForceCreation($v_bol_force)
        {
                $this->v_bol_force_creation = $v_bol_force;
        }
        //publico
        function getForceCreation()
        {
                return $this->v_bol_force_creation;
        }
        //privado
        function getWidthOri()
        {
                return $this->v_str_img_width_original;
        }
        //privado
        function setWidthOri($v_int_width)
        {
                $this->v_str_img_width_original = $v_int_width;
        }

        //publico
        function getHeight()
        {
                return $this->v_str_img_height;
        }
        //publico
        function setHeight($v_int_height)
        {
                $this->v_str_img_height = $v_int_height;
        }
        //privado
        function getHeightOri()
        {
                return $this->v_str_img_height_original;
        }
        //privado
        function setHeightOri($v_int_height)
        {
                $this->v_str_img_height_original = $v_int_height;
        }

        //publico
        function getExt()
        {
                return $this->v_str_img_ext;
        }
        //privado
        function setExt($v_str_ext)
        {
                $this->v_str_img_ext = $v_str_ext;
        }

        function getImgOrig()
        {
                return $this->v_str_img_path;
        }

        function createImg($v_str_output_path)
        {
            if($this->getManterAspecto()==true)
            {
                    $this->calculaAspecto();
            }

            $retorno = false;
            switch($this->getExt())
            {
                case 'GIF':
                    if(function_exists("imagecreatefromgif"))
                    {
                        $rImagem = imagecreatefromgif($this->getImgOrig());

                        if(function_exists("imageCreateTrueColor"))
                        {
                            $rThumb = imagecreate($this->getWidth(), $this->getHeight());
                            $black = imagecolorallocate($rThumb, 0, 0, 0);
                            imagecolortransparent($rThumb, $black);
                            if(function_exists("imageCopyResampled"))
                            {
                                imageCopyResampled($rThumb, $rImagem, 0, 0, 0, 0, $this->getWidth(), $this->getHeight(), $this->getWidthOri($rImagem), $this->getHeightOri($rImagem));

                                if(function_exists("imagegif"))
                                {
                                    imagegif($rThumb, $v_str_output_path);
                                    $retorno = true;
                                }else
                                {
                                    $this->setError("GD version not supported. function not exist: imagegif");
                                }
                            }else
                            {
                                $this->setError("GD version not supported. function not exist: imageCopyResampled");
                            }
                        }else
                        {
                            $this->setError("GD version not supported. function not exist: imageCreateTrueColor");
                        }
                    }else
                    {
                        $this->setError("GD version not supported. function not exist: imagecreatefromgif");
                    }
                break;
                case 'JPG':
                    if(function_exists("imageCreateFromJPEG"))
                    {
                        $rImagem = imageCreateFromJPEG($this->getImgOrig());

                        if(function_exists("imageCreateTrueColor"))
                        {
                            $rThumb = imageCreateTrueColor($this->getWidth(), $this->getHeight());

                            if(function_exists("imageCopyResampled"))
                            {
                                imageCopyResampled($rThumb, $rImagem, 0, 0, 0, 0, $this->getWidth(), $this->getHeight(), $this->getWidthOri($rImagem), $this->getHeightOri($rImagem));

                                if(function_exists("imageJPEG"))
                                {
                                    imageJPEG($rThumb, $v_str_output_path);
                                    $retorno = true;
                                }else
                                {
                                        $this->setError("GD version not supported. function not exist: imageJPEG");
                                }
                            }else
                            {
                                $this->setError("GD version not supported. function not exist: imageCopyResampled");
                            }
                        }else
                        {
                            $this->setError("GD version not supported. function not exist: imageCreateTrueColor");
                        }
                    }else
                    {
                        $this->setError("GD version not supported. function not exist: imageCreateFromJPEG");
                    }
                break;
                case 'BMP':
                    if(function_exists("imagecreatefrombmp"))
                    {
                        $rImagem = imagecreatefrombmp($this->getImgOrig());

                        if(function_exists("imageCreateTrueColor"))
                        {
                            $rThumb = imageCreateTrueColor($this->getWidth(), $this->getHeight());

                            if(function_exists("imageCopyResampled"))
                            {
                                imageCopyResampled($rThumb, $rImagem, 0, 0, 0, 0, $this->getWidth(), $this->getHeight(), $this->getWidthOri($rImagem), $this->getHeightOri($rImagem));

                                if(function_exists("imagebmp"))
                                {
                                    imagebmp($rThumb, $v_str_output_path);
                                    $retorno = true;
                                }else
                                {
                                        $this->setError("GD version not supported. function not exist: imagebmp");
                                }
                            }else
                            {
                                $this->setError("GD version not supported. function not exist: imageCopyResampled");
                            }
                        }else
                        {
                            $this->setError("GD version not supported. function not exist: imageCreateTrueColor");
                        }
                    }else
                    {
                        $this->setError("GD version not supported. function not exist: imagecreatefrombmp");
                    }
                break;
                case 'PNG':
                    if(function_exists("imagecreatefrompng"))
                    {
                        $rImagem = imagecreatefrompng($this->getImgOrig());

                        if(function_exists("imageCreateTrueColor"))
                        {
                                $rThumb = imagecreatetruecolor($this->getWidth(), $this->getHeight());                                                
                                imagealphablending( $rThumb, false );
                                imagesavealpha( $rThumb, true );

                                if(function_exists("imageCopyResampled"))
                                {
                                    imageCopyResampled($rThumb, $rImagem, 0, 0, 0, 0, $this->getWidth(), $this->getHeight(), $this->getWidthOri($rImagem), $this->getHeightOri($rImagem));

                                    if(function_exists("imagepng"))
                                    {
                                        imagepng($rThumb, $v_str_output_path, 9);
                                        
                                        $retorno = true;
                                    }else
                                    {
                                        $this->setError("GD version not supported. function not exist: imagepng");
                                    }
                                }else
                                {
                                    $this->setError("GD version not supported. function not exist: imageCopyResampled");
                                }
                        }else
                        {
                            $this->setError("GD version not supported. function not exist: imageCreateTrueColor");
                        }
                    }else
                    {
                        $this->setError("GD version not supported. function not exist: imagecreatefrompng");
                    }
                break;
                default:
                        $this->setError("Format not supported");
                break;
            }

            if($this->getForceCreation() && $this->getError() != '')
            {
                copy($this->getImgOrig(), $v_str_output_path);
            }

            return $retorno;
        }
}
?>