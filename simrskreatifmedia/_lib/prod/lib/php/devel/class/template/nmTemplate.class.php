<?php

/* Definicao da classe */
class nmTemplate
{
    /**
     * Diretorio do template.
     *
     * Diretorio onde estao armazenados os arquivos do template.
     *
     * @access  private
     * @var     string
     */
    var $dir;

    /**
     * Status do template.
     *
     * Flag para indicar o status do template.
     *
     * @access  private
     * @var     string
     */
    var $status;

    /**
     * Lista de variaveis.
     *
     * Array com valores das variaveis do template para substituicao.
     *
     * @access  private
     * @var     array
     */
    var $vars;

    /**
     * Nome do template.
     *
     * Nome do template das paginas a serem exibidas.
     *
     * @access  private
     * @var     string
     */
    var $tpl;

    /* ----- Construtor e Destrutor ------------------------------------ */

    /**
     * Construtor da classe.
     *
     * Inicializa as variaveis e seta o diretorio onde estao armazenados os
     * arquivos do template.
     *
     * @access  public
     * @global  array   $nm_config  Array com configuracao do ScriptCase.
     * @param   string  $v_str_tpl  Nome do template.
     */
    function __construct($v_str_tpl)
    {
        global $nm_config;
                
        $this->SetStatus('ok');
        $this->SetDir($nm_config['path_tpl'] . $v_str_tpl . '/');
        $this->SetTpl($v_str_tpl);
    } // nmTemplate

    /* ----- Getters & Setters ----------------------------------------- */

    /**
     * Recupera diretorio.
     *
     * Recupera diretorio com os arquivos do template.
     *
     * @access  private
     * @return  string   $str_result  Diretorio do template.
     */
    function GetDir()
    {
        return $this->dir;
    } // GetDir

    /**
     * Recupera status.
     *
     * Recupera a flag de status do template.
     *
     * @access  private
     * @return  string   $str_result  Status do template.
     */
    function GetStatus()
    {
        return $this->status;
    } // GetStatus

    /**
     * Recupera variavel.
     *
     * Recupera o valor de uma variavel do template.
     *
     * @access  public
     * @param   string  $v_str_var   Nome da variavel de template.
     * @return  mixed   $mix_result  Valor da variavel de template.
     */
    function GetVar($v_str_var)
    {
        if (isset($this->vars[$v_str_var]))
        {
            return $this->vars[$v_str_var];
        }
    } // GetVar

    /**
     * Recupera template.
     *
     * Recupera o nome do template utilizado para exibicao.
     *
     * @access  private
     * @return  string   $str_result  Nome do template.
     */
    function GetTpl()
    {
        return $this->tpl;
    } // GetTpl

    /**
     * Seta diretorio.
     *
     * Armazena o diretorio onde estao armazenados os arquivo do template.
     *
     * @access  private
     * @param   string   $v_str_dir  Diretorio do template.
     */
    function SetDir($v_str_dir)
    {
        if (@is_dir($v_str_dir))
        {
            $this->dir = nm_dir_normalize($v_str_dir);
        }
        else
        {
            $this->SetStatus('error');
        }
    } // SetDir

    /**
     * Seta status.
     *
     * Armazena a flag de status do template.
     *
     * @access  private
     * @param   string   $v_str_status  Status do template.
     */
    function SetStatus($v_str_status)
    {
        $this->status = ('ok' == $v_str_status) ? 'ok' : 'error';
    } // SetStatus

    /**
     * Seta variavel.
     *
     * Armazena o valor de uma variavel de template.
     *
     * @access  public
     * @param   string  $v_str_var  Nome da variavel de template.
     * @param   mixed   $v_mix_val  Valor da variavel de template.
     */
    function SetVar($v_str_var, $v_mix_val)
    {
        if ('' != $v_str_var)
        {
            $this->vars[$v_str_var] = $v_mix_val;
        }
    } // SetVar

    /**
     * Seta template.
     *
     * Armazena o nome do template utilizado para exibicao.
     *
     * @access  private
     * @param   string   $v_str_tpl  Nome do template.
     */
    function SetTpl($v_str_tpl)
    {
        if ('' != $v_str_tpl)
        {
            $this->tpl = $v_str_tpl;
        }
        else
        {
            $this->SetStatus('error');
        }
    } // SetTpl

    /* ----- Metodos Publicos ------------------------------------------ */

    /**
     * Exibe um arquivo.
     *
     * Carrega um arquivo do template e exibe com os valores das variaveis
     * substituidos.
     *
     * @access  public
     * @param   string  $v_str_file  Nome do arquivo a ser exibido.
     * @global  array   $nm_browser  Objeto para manipulacao do browser.
     * @global  array   $nm_config   Array com configuracao do ScriptCase.
     * @global  object  $nm_ini_sys  Objeto para manipulacao do arquivo de
     *                               inicializacao do ScriptCase.
     * @global  array   $nm_lang     Array com strings do idioma.
     * @global  object  $nm_user     Objeto para manipulacao de usuarios.
     */
    function Display($v_str_file)
    {
        global $nm_config, $nm_lang;
        
        $str_file = $this->GetDir() . $v_str_file . '.tpl.php';
		if (@is_file($str_file))
        {
            include($str_file);
        }
        
    } // Display

    /**
     * Verifica o status do template.
     *
     * Checa se o template foi corretamente inicializado.
     *
     * @access  public
     * @return  boolean  $bol_result  TRUE se o template foi inicializado
     *                                corretamente, caso contrario FALSE.
     */
    function IsOk()
    {
        return 'ok' == $this->GetStatus();
    } // IsOk
    
}
?>