<?php

/* Classes ancestrais */
nm_load_class('page', 'Page');

/* Definicao da classe */
class nmPageAdminSysAllConectionsTest extends nmPage
{
    /* ----- Getters & Setters ----------------------------------------- */

    /**
     * Verifica Conexao.
     *
     * Retorna true se conexao ja existir no sistema, false caso contrario.
     * @param   string  $str_conn  Nome da conexao.
     * @access  protected
     */
    function TestConection($arr_conn)
    {
        nm_load_class('interface', 'Connection');
        $obj_con = new nmConnection();
        $str_ret = $obj_con->TestConn($arr_conn);
        
       	if ($str_ret != '')
       	{
            return array('teste_fail', $str_ret);
       	}
       	else 
       	{
        	return array('teste_ok', '');
       	}
       	
    } // TestConection

    /* ----- Construtor e Destrutor ------------------------------------ */

    /**
     * Construtor da classe.
     *
     * Seta o nome da pagina a ser exibida.
     *
     * @access  public
     * @global  array   $nm_config  Array de configuracao do ScriptCase.
     */
    function __construct()
    {
        global $nm_config;
        $this->SetBody('nmPage');
        $this->SetMargin(10);
        $this->SetPage('AdminSysAllConectionsTest');
		$this->CheckLogin();
        $this->SetPageSubtitle('');
    } // nmPageMenu

    /* ----- Metodos Protegidos ---------------------------------------- */

    /**
     * Exibe o conteudo.
     *
     * Exibe o conteudo da tela inicial do ScriptCase.
     *
     * @access  protected
     * @global  object     $nm_template  Objeto para exibicao de templates.
     */
    function DisplayContent()
    {
        global $nm_config, $nm_db, $nm_template;

    	$arr_fields         = $_POST;    	
    	
    	if(!empty($arr_fields) && is_array($arr_fields))
    	{
    		foreach ($arr_fields as $key=>$valor)
    		{
    			$arr_fields[$key]        = nm_unescape_string($valor);
    		}
    	}
		
		$str_conn           = $arr_fields['conn'];
        $tp_busca           = 'post';
        $arr_test           = $this->TestConection($arr_fields);
        
        /* Carrega Variaveis do Template */
        $nm_template->SetVar('str_conn',  $str_conn);
        $nm_template->SetVar('str_teste', $arr_test[0]);
        $nm_template->SetVar('str_msg',   $arr_test[1]);
        $nm_template->SetVar('tp_busca', $tp_busca);
        $nm_template->SetVar('hid_create_connect', $this->GetArg('hid_create_connect'));
        
        /* Monta formulario */
        $nm_template->Display('body_admin_sys_allconections_test');
        
    } // DisplayContent

    /**
     * Filtra as mensagens de erro.
     *
     * @access  protected
     * @return  boolean    $bol_result  TRUE se a mensagem de erro for valida, caso
     *                                  contrario FALSE.
     */
    function FilterErrorMessage($v_str_msg)
    {
        global $nm_db;
        if ('' == trim($v_str_msg))
        {
            return FALSE;
        }
        elseif (FALSE !== strpos($v_str_msg, 'Changed language setting'))
        {
            return FALSE;
        }
        elseif (FALSE !== strpos($v_str_msg, 'Changed database context to'))
        {
            return FALSE;
        }
        elseif (FALSE !== strpos($v_str_msg, 'Creating default object from empty value'))
        {
            return FALSE;
        }
        elseif (FALSE !== strpos($v_str_msg, 'should be compatible with that of'))
        {
            return FALSE;
        }
        elseif (FALSE !== strpos($v_str_msg, 'Assigning the return value of new by reference is deprecated'))
        {
            return FALSE;
        }
        elseif (FALSE !== strpos($v_str_msg, 'Contexto do banco de dados alterado para'))
        {
            return FALSE;
        }
        elseif (FALSE !== strpos($v_str_msg, 'Contexto do banco de dados modificado para'))
        {
            return FALSE;
        }
        elseif (FALSE !== strpos($v_str_msg, "Invalid object name 'sys.schemas'"))
        {
            return FALSE;
        }
        elseif (FALSE !== strpos($v_str_msg, 'do idioma alterada para'))
        {
            return FALSE;
        }
        elseif (FALSE !== strpos($v_str_msg, 'Qualified object name COLUMNS not valid'))
        {
            return FALSE;
        }
        elseif (FALSE !== strpos($v_str_msg, 'Check messages from the SQL Server'))
        {
            return FALSE;
        }
        elseif (FALSE !== strpos(strtolower($v_str_msg), 'seclabelname'))
        {
            return FALSE;
        }
        elseif (FALSE !== strpos(strtolower($v_str_msg), 'db2admin.rcml01'))
        {
            return FALSE;
        }
        elseif (FALSE !== strpos(strtolower($v_str_msg), 'nada foi executado'))
        {
            return FALSE;
        }
        elseif (FALSE !== strpos(strtolower($v_str_msg), 'the mysql extension is deprecated and will be removed in the future'))
        {
            return FALSE;
        }
        elseif (FALSE !== strpos(strtolower($v_str_msg), 'driver doesn\'t support meta data'))
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    } // FilterErrorMessage

    /**
     * Define funcoes Javascript da pagina.
     *
     * Define a lista de funcoes Javascript especificos da pagina atual.
     *
     * @access  protected
     * @global  array      $nm_config  Array de configuracao do ScriptCase.
     * @global  array      $nm_lang    Array de idioma.
     */
    function PageJavascript()
    {
        $str_js  = "  function nm_cancelar()\n";
        $str_js .= "  {\n";
        $str_js .= "   document.nm_form_cancel.submit();\n";
        $str_js .= "  }\n";
        $this->AddJavascript($str_js);

    } // PageJavascript

    /**
     * Define arquivos JS da pagina.
     *
     * Define a lista de arquivos JS especificos da pagina atual.
     *
     * @access  protected
     */
    function PageJs()
    {
        $this->AddJs('devel', 'display.js');
        $this->AddJs('devel', 'random.js');
    } // PageJs

    /**
     * Define folhas de estilo da pagina.
     *
     * Define a lista de folhas de estilo especificas da pagina atual.
     *
     * @access  protected
     */
    function PageStyle()
    {
        $str_style = "  .TitlePage { color: #000000; font-family: Verdana, Arial, sans-serfi; font-size: 16px; font-weight: normal; font-style: italic; font-weight: bold; text-decoration: none; padding: 2px 4px; }\n";
        $this->AddStyle($str_style);
    } // PageStyle


}

?>