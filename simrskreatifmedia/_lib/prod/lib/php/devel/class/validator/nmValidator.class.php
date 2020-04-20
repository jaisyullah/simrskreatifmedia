<?php

/* Definicao da classe */
class nmValidator
{
    /**
     * Ultimo erro.
     *
     * Mensagem de erro da ultima validacao. Recebe uma string vazia se a
     * ultima validacao obteve sucesso.
     *
     * @access  private
     * @var     string
     */
    var $error;

    /**
     * Ultimo resultado.
     *
     * Resultado da ultima validacao realizada.
     *
     * @access  private
     * @var     boolean
     */
    var $result;

    /* ----- Construtor e Destrutor ------------------------------------ */

    /**
     * Construtor da classe.
     *
     * Seta o nome da pagina a ser exibida.
     *
     * @access  public
     */
    function __construct()
    {
        $this->SetError('');
        $this->SetResult(TRUE);
    } // nmValidator

    /* ----- Getters & Setters ----------------------------------------- */

    /**
     * Recupera erro.
     *
     * Recupera o codigo do erro da ultima validacao.
     *
     * @access  private
     * @return  string   $str_result  Codigo do erro.
     */
    function GetError()
    {
        return $this->error;
    } // GetError

    /**
     * Recupera resultado.
     *
     * Recupera o resultado da ultima validacao.
     *
     * @access  private
     * @return  boolean  $bol_result  Resultado da validacao.
     */
    function GetResult()
    {
        return $this->result;
    } // GetResult

    /**
     * Seta erro.
     *
     * Armazena o codigo do erro da ultima validacao.
     *
     * @access  private
     * @param   string   $v_str_error  Codigo do erro.
     */
    function SetError($v_str_error)
    {
        $this->error = $v_str_error;
    } // SetError

    /**
     * Seta resultado.
     *
     * Armazena o resultado da ultima validacao.
     *
     * @access  private
     * @param   boolean  $v_bol_result  Resultado da validacao.
     */
    function SetResult($v_bol_result)
    {
        $this->result = $v_bol_result;
    } // SetResult

    /* ----- Metodos Publicos ------------------------------------------ */

    /**
     * Valida um codigo.
     *
     * Verifica se a string informada e um codigo valido.
     *
     * @access  public
     * @param   string  $v_str_code  String a ser validada.
     */
    function IsCode($v_str_code, $v_int_min = 0, $v_int_max = 0)
    {
        if (($v_int_min > strlen($v_str_code)) && (0 < $v_int_min))
        {
            $this->SetError('valid_cod_size_min');
            $this->SetResult(FALSE);
        }
        elseif (($v_int_max < strlen($v_str_code)) && (0 < $v_int_max))
        {
            $this->SetError('valid_cod_size_max');
            $this->SetResult(FALSE);
        }
        elseif ('' != preg_replace('/[a-z0-9_]/i', '', $v_str_code))
        {
            $this->SetError('valid_cod_char');
            $this->SetResult(FALSE);
        }
        elseif (FALSE !== strpos('0123456789', substr($v_str_code, 0, 1)))
        {
            $this->SetError('valid_cod_init');
            $this->SetResult(FALSE);
        }
        else
        {
            $this->SetError('');
            $this->SetResult(TRUE);
        }
        return $this->GetResult();
    } // IsCode

    /**
     * Valida um codigo.
     *
     * Verifica se a string informada e um codigo valido.
     *
     * @access  public
     * @param   string  $v_str_code  String a ser validada.
     */
    function IsFolder($v_str_code, $v_int_min = 1, $v_int_max = 40)
    {
        if (($v_int_min > strlen($v_str_code)) && (0 < $v_int_min))
        {
            $this->SetError('valid_cod_size_min');
            $this->SetResult(FALSE);
        }
        elseif (($v_int_max < strlen($v_str_code)) && (0 < $v_int_max))
        {
            $this->SetError('valid_cod_size_max');
            $this->SetResult(FALSE);
        }
        elseif (' ' == $v_str_code{0} || $v_str_code{strlen($v_str_code)-1}==' ')
        {
            $this->SetError('valid_cod_char');
            $this->SetResult(FALSE);
        }
        elseif ('' != preg_replace('/[a-z0-9_ ]/i', '', $v_str_code))
        {
            $this->SetError('valid_cod_char');
            $this->SetResult(FALSE);
        }
        elseif (FALSE !== strpos('0123456789', substr($v_str_code, 0, 1)))
        {
            $this->SetError('valid_cod_init');
            $this->SetResult(FALSE);
        }
        else
        {
            $this->SetError('');
            $this->SetResult(TRUE);
        }
        return $this->GetResult();
    } // IsCode

    /**
     * Valida um e-mail.
     *
     * Verifica se a string informada e um e-mail valido.
     *
     * @access  public
     * @param   string   $v_str_email  E-mail a ser validado.
     * @return  boolean  $bol_result   TRUE se o e-mail for valido, FALSE em
     *                                 caso contrario.
     */
    function IsEmail($v_str_email)
    {
        $str_user   = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*";
        $str_domain = "[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$";
        $str_regex  = "/".$str_user . '@' . $str_domain."/i";
        if (!preg_match($str_regex, $v_str_email))
        {
            $this->SetError('valid_email_invalid');
            $this->SetResult(FALSE);
        }
        else
        {
            $this->SetError('');
            $this->SetResult(TRUE);
        }
        return $this->GetResult();
    } // IsEmail

    /**
     * Valida uma cor HTML.
     *
     * Verifica se a string informada e uma cor HTML valido.
     *
     * @access  public
     * @param   integer  $v_str_color  String a ser validada.
     * @return  boolean  $bol_result   TRUE se a cor for valida, FALSE em
     *                                 caso contrario.
     */
    function IsHtmlColor($v_str_color)
    {
        if (!preg_match('/#([a-f0-9]{2}){3}/i', $v_str_color))
        {
            $this->SetError('valid_html_invalid');
            $this->SetResult(FALSE);
        }
        else
        {
            $this->SetError('');
            $this->SetResult(TRUE);
        }
        return $this->GetResult();
    } // IsHtmlColor

    /**
     * Valida um inteiro.
     *
     * Verifica se o numero informado e um inteiro valido.
     *
     * @access  public
     * @param   integer  $v_int_integer  Inteiro a ser validado.
     * @return  boolean  $bol_result     TRUE se o numero for valido, FALSE em
     *                                   caso contrario.
     */
    function IsInt($v_int_integer, $v_int_min = '', $v_int_max = '')
    {

        if (($v_int_min > $v_int_integer) && ('' !=  $v_int_min))
        {
            $this->SetError('valid_cod_size_min');
            $this->SetResult(FALSE);
        }
        elseif (($v_int_max < $v_int_integer) && ('' != $v_int_max))
        {
            $this->SetError('valid_cod_size_max');
            $this->SetResult(FALSE);
        }
        elseif (!is_numeric($v_int_integer) || !is_int($v_int_integer * 1))
        {
            $this->SetError('valid_int_invalid');
            $this->SetResult(FALSE);
        }
        else
        {
            $this->SetError('');
            $this->SetResult(TRUE);
        }
        return $this->GetResult();
    } // IsInt

    /**
     * Valida um login.
     *
     * Verifica se a string informada e um login valido.
     *
     * @access  public
     * @param   string   $v_str_login  Login a ser validado.
     * @return  boolean  $bol_result   TRUE se o login for valido, FALSE em caso
     *                                 contrario.
     */
    function IsLogin($v_str_login)
    {
        if ((1 > strlen($v_str_login)) || (32 < strlen($v_str_login)))
        {
            $this->SetError('valid_login_size');
            $this->SetResult(FALSE);
        }
        elseif ('' != preg_match("/[a-z0-9_]/i", '', $v_str_login))
        {
            $this->SetError('valid_login_char');
            $this->SetResult(FALSE);
        }
        else
        {
            $this->SetError('');
            $this->SetResult(TRUE);
        }
        return $this->GetResult();
    } // IsLogin

    /**
     * Valida um natural.
     *
     * Verifica se o numero informado e um natural valido.
     *
     * @access  public
     * @param   integer  $v_int_natural  Natural a ser validado.
     * @return  boolean  $bol_result     TRUE se o numero for valido, FALSE em
     *                                   caso contrario.
     */
    function IsNatural($v_int_natural)
    {
        if (!is_numeric($v_int_natural) || !is_int($v_int_natural * 1))
        {
            $this->SetError('valid_nat_invalid');
            $this->SetResult(FALSE);
        }
        elseif (0 > $v_int_natural)
        {
            $this->SetError('valid_nat_invalid');
            $this->SetResult(FALSE);
        }
        else
        {
            $this->SetError('');
            $this->SetResult(TRUE);
        }
        return $this->GetResult();
    } // IsNatural

    /**
     * Valida um numero.
     *
     * Verifica se o numero informado e um numero valido.
     *
     * @access  public
     * @param   integer  $v_int_number  Natural a ser validado.
     * @return  boolean  $bol_result    TRUE se o numero for valido, FALSE em
     *                                  caso contrario.
     */
    function IsNumber($v_int_number)
    {
        if (!is_numeric($v_int_number))
        {
            $this->SetError('valid_num_invalid');
            $this->SetResult(FALSE);
        }
        else
        {
            $this->SetError('');
            $this->SetResult(TRUE);
        }
        return $this->GetResult();
    } // IsNumber

    /**
     * Valida uma opcao.
     *
     * Verifica se a opcao informada e um Sim ou Nao.
     *
     * @access  public
     * @param   string   $v_str_option  Opcao a ser validada.
     * @return  boolean  $bol_result    TRUE se a opcao for valida, FALSE em
     *                                  caso contrario.
     */
    function IsYesNo($v_str_option)
    {
        if (!in_array(strtoupper($v_str_option), array('N', 'S', 'Y')))
        {
            $this->SetError('valid_yesno_invalid');
            $this->SetResult(FALSE);
        }
        else
        {
            $this->SetError('');
            $this->SetResult(TRUE);
        }
        return $this->GetResult();
    } // IsYesNo
}

?>
