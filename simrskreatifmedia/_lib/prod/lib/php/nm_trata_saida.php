<?php
/**
 * $Id: nm_trata_saida.php,v 1.2 2011-09-09 20:21:02 sergio Exp $
 */

class nm_trata_saida
{
    var $arquivo;
    var $browser;
    var $pointer;
    var $charset_in;
    var $ok;

    function __construct()
    {
        if (nm_reg_prod() == "NmScriptCaseAplOk")
        {
            $this->arquivo = "";
            $this->browser = TRUE;
            $this->pointer = 0;
            $this->ok      = TRUE;
        }
        else
        {
            $this->ok = FALSE;
        }
    }

    function seta_arquivo($arquivo, $charset_conv="")
    {
        $dir = dirname($arquivo);
        if (@is_dir($dir))
        {
            $this->pointer = fopen($arquivo, "w");
            if (FALSE !== $this->pointer)
            {
                $this->arquivo    = $arquivo;
                $this->charset_in = $charset_conv;
                $this->browser    = FALSE;
            }
        }
    }

    function saida($txt)
    {
        if ($this->ok)
        {
            if (isset($_SESSION['scriptcase']['saida_var']) && $_SESSION['scriptcase']['saida_var'])
            {
                $_SESSION['scriptcase']['saida_html'] .= $txt;
            }
            elseif ($this->browser)
            {
                echo $txt;
            }
            else
            {
                if (isset($_SESSION['scriptcase']['saida_word']) && $_SESSION['scriptcase']['saida_word'])
                {
                    $txt = str_replace("&nbsp;", " ", $txt);
                }
                if (!empty($this->charset_in))
                {
                    if (!NM_is_utf8($txt))
                    {
                        $txt = mb_convert_encoding($txt, "UTF-8", $this->charset_in);
                    }
                }
                fwrite($this->pointer, $txt);
            }
        }
    }

    function finaliza()
    {
        if (!$this->browser)
        {
            fclose($this->pointer);
        }
    }
}


?>