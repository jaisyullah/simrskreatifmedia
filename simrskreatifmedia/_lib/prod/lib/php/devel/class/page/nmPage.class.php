<?php

/* Definicao da classe */
class nmPage
{

    /**
     * Quantidade de argumentos.
     *
     * Numero de argumentos recebidos pela pagina.
     *
     * @access  protected
     * @var     integer
     */
    var $argc;

    /**
     * Lista de argumentos.
     *
     * Array com valores dos argumentos recebidos pela pagina.
     *
     * @access  protected
     * @var     array
     */
    var $argv;

    /**
     * Classe ou objeto do BODY.
     *
     * Classe CSS ou objeto que define a tag BODY da pagina.
     *
     * @access  protected
     * @var     string
     */
    var $body;

    /**
     * Funcoes Javascript.
     *
     * Funcoes javascript usados pela pagina.
     *
     * @access  protected
     * @var     array
     */
    var $javascript;

    /**
     * Funcoes Javascript.
     *
     * Funcoes javascript usados pela pagina.
     * Que rodam antes da inclusao dos arquivos .js
     *
     * @access  protected
     * @var     array
     */
    var $javascriptbeforejs;

    /**
     * Arquivos JS.
     *
     * Arquivos javascript usados pela pagina.
     *
     * @access  protected
     * @var     array
     */
    var $js;

    /**
     * Margem da pagina.
     *
     * Valor das margens da pagina.
     *
     * @access  protected
     * @var     integer
     */
    var $margin;

    /**
     * Pagina a ser exibida.
     *
     * Nome da pagina a ser exibida pelo ScriptCase.
     *
     * @access  protected
     * @var     string
     */
    var $page;

    /**
     * digita
     *
     * se vai incluir o digita ou nao
     *
     * @access  protected
     * @var     string
     */
    var $digita;

    /**
     * Codigo da pagina a ser exibida.
     *
     * Codigo da pagina a ser exibida pelo ScriptCase.
     *
     * @access  protected
     * @var     integer
     */
    var $page_code;

    /**
     * Subtitulo da pagina a ser exibida.
     *
     * Subtitulo da pagina a ser exibida pelo ScriptCase.
     *
     * @access  protected
     * @var     string
     */
    var $page_subtitle;

    /**
     * Paramentro do redirecionamento.
     *
     * Valor do parametro do redirecionamento.
     *
     * @access  protected
     * @var     string
     */
    var $redirect_param;

    /**
     * Destino do redirecionamento.
     *
     * Codigo de destino do redirecionamento.
     *
     * @access  protected
     * @var     string
     */
    var $redirect_to;


    /**
     * Secao do campo.
     *
     * Secao onde esta localizada o campo.
     *
     * @access  protected
     * @var     string
     */
    var $fld_section;

    /**
     * Secao do campo.
     *
     * Secao onde vai o campo.
     *
     * @access  protected
     * @var     string
     */
    var $fld_section_redirect;

    /**
     * Scroll da pagina.
     *
     * Flag para exibicao ou nao das barras de rolagem na pagina.
     *
     * @access  protected
     * @var     string
     */
    var $scroll;

    /**
     * Folhas de estilo.
     *
     * Folhas de estilo usadas pela pagina.
     *
     * @access  protected
     * @var     array
     */
    var $style;

    /**
     * Folhas de estilo.
     *
     * Folhas de estilo usadas pela pagina.
     *
     * @access  protected
     * @var     array
     */
    var $styleCss;

    /**
     * DOCTYPE.
     *
     * DOCTYPE.
     *
     * @access  protected
     * @var     array
     */
    var $doctype;

    /* ----- Getters & Setters ----------------------------------------- */

    /**
     * Adiciona funcao Javascript.
     *
     * Adiciona a definicao de uma funcao Javascript na lista da pagina.
     *
     * @access  protected
     * @param   string     $v_str_javascript  Funcao javascript.
     */
    function AddJavascript($v_str_javascript)
    {
        $this->javascript[] = $v_str_javascript;
    } // AddJavascript

    /**
     * Adiciona funcao Javascript.
     *
     * Adiciona a definicao de uma funcao Javascript na lista da pagina.
     * Para rodar antes da inclusao dos arquivos .js
     *
     * @access  protected
     * @param   string     $v_str_javascript  Funcao javascript.
     */
    function AddJavascriptBeforeJs($v_str_javascript)
    {
        $this->javascriptbeforejs[] = $v_str_javascript;
    } // AddJavascriptBeforeJs

    /**
     * Adiciona arquivo JS.
     *
     * Adiciona a chamanda de um arquivo JS na lista da pagina.
     *
     * @access  protected
     * @param   string     $v_str_mod  Modulo de origem do JS.
     * @param   string     $v_str_js   Arquivo JS.
     */
    function AddJs($v_str_mod, $v_str_js)
    {
        $this->js[] = array($v_str_mod, $v_str_js);
    } // AddJs

    /**
     * Adiciona folha de estilo.
     *
     * Adiciona a definicao de uma folha de estilo na lista da pagina.
     *
     * @access  protected
     * @param   string     $v_str_style  Folha de estilo.
     */
    function AddStyle($v_str_style)
    {
        $this->style[] = $v_str_style;
    } // AddStyle

    /**
     * Adiciona folha de estilo.
     *
     * Adiciona a definicao de uma folha de estilo na lista da pagina.
     *
     * @access  protected
     * @param   string     $v_str_style  Folha de estilo.
     */
    function AddStyleCss($v_str_mod, $v_str_js)
    {
        $this->styleCss[] = array($v_str_mod, $v_str_js);
    } // AddStyleCss

    /**
     * Recupera argumento.
     *
     * Recupera o valor de um argumento recebido pela pagina atual.
     *
     * @access  protected
     * @param   string     $v_str_arg   Nome do argumento.
     * @return  mixed      $mix_result  Valor do argumento.
     */
    function GetArg($v_str_arg)
    {
        if (isset($this->argv[$v_str_arg]))
        {
            return $this->argv[$v_str_arg];
        }
    } // GetArg

    /**
     * Retorna quantidade de argumentos.
     *
     * Retorna o numero de argumentos recebidos pela pagina atual.
     *
     * @access  protected
     * @return  integer    $int_result  Numero de argumentos.
     */
    function GetArgCount()
    {
        return $this->argc;
    } // GetArgCount

    /**
     * Recupera body.
     *
     * Recupera a classe CSS ou objeto da tag BODY.
     *
     * @access  protected
     * @return  string     $str_result  Classe ou objeto da tag BODY.
     */
    function GetBody()
    {
        return $this->body;
    } // GetBody

    /**
     * Recupera funcoes Javascript.
     *
     * Recupera a lista de funcoes Javascript usadas pela pagina.
     *
     * @access  protected
     * @return  array      $arr_result  Lista de funcoes javascript.
     */
    function GetJavascript()
    {
        return $this->javascript;
    } // GetJavascript

    /**
     * Recupera funcoes Javascript.
     *
     * Recupera a lista de funcoes Javascript usadas pela pagina.
     * Que rodam antes da inclusao do arquivo .js
     *
     * @access  protected
     * @return  array      $arr_result  Lista de funcoes javascript.
     */
    function GetJavascriptBeforeJs()
    {
        return $this->javascriptbeforejs;
    } // GetJavascriptBeforeJs

    /**
     * Recupera arquivos JS.
     *
     * Recupera a lista de arquivos JS usados pela pagina.
     *
     * @access  protected
     * @return  array      $arr_result  Lista de arquivos JS.
     */
    function GetJs()
    {
        return $this->js;
    } // GetJs

    /**
     * Recupera margem.
     *
     * Recupera o valor da margem da pagina a ser exibida.
     *
     * @access  protected
     * @return  integer    $int_result  Valor da margem.
     */
    function GetMargin()
    {
        return $this->margin;
    } // GetMargin

    /**
     * Recupera pagina.
     *
     * Recupera nome da pagina a ser exibida.
     *
     * @access  protected
     * @return  string     $str_result  Nome da pagina.
     */
    function GetPage()
    {
        return $this->page;
    } // GetPage

    /**
     * Recupera digitra.
     *
     * Recupera se eh pra incluir ou nao o digita
     *
     * @access  protected
     * @return  string     $str_result  Nome da pagina.
     */
    function GetDigita()
    {
    	if(!isset($this->digita))
    	{
    		$this->SetDigita(true);
    	}
        return $this->digita;
    } // GetPage

    /**
     * Recupera codigo da pagina.
     *
     * Recupera codigo da pagina a ser exibida.
     *
     * @access  protected
     * @return  string     $int_result  Codigo da pagina.
     */
    function GetPageCode()
    {
        return $this->page_code;
    } // GetPageCode

    /**
     * Recupera subtitulo pagina.
     *
     * Recupera o subtitulo da pagina a ser exibida.
     *
     * @access  protected
     * @return  string     $str_result  Subtitulo da pagina.
     */
    function GetPageSubtitle()
    {
        return $this->page_subtitle;
    } // GetPageSubtitle

    /**
     * Recupera o parametro de redirecionamento.
     *
     * Recupera o valor do paramentro de redirecionamento.
     *
     * @access  protected
     * @return  string     $str_result  Parametro de redirecionamento.
     */
    function GetRedirectParam()
    {
        return $this->redirect_param;
    } // GetRedirectParam

    /**
     * Recupera o destino de redirecionamento.
     *
     * Recupera o codigo do destino de redirecionamento.
     *
     * @access  protected
     * @return  string     $str_result  Destino de redirecionamento.
     */
    function GetRedirectTo()
    {
        return $this->redirect_to;
    } // GetRedirectTo


    /**
     * Recupera a secao do campo.
     *
     * Recupera a secao onde encontra-se o campo.
     *
     * @access  protected
     */
    function GetFldSection()
    {
        return $this->fld_section;
    } // GetFldSection

    /**
     * Recupera a secao do campo.
     *
     * Recupera a secao onde vai o campo.
     *
     * @access  protected
     */
    function GetFldSectionRedirect()
    {
        return $this->fld_section_redirect;
    } // GetFldSection


    /**
     * Recupera scroll.
     *
     * Recupera a flag de exibicao de barras de reloagem.
     *
     * @access  protected
     * @return  string     $str_result  Flag para barras de rolagem.
     */
    function GetScroll()
    {
        if (in_array($this->scroll, array('no', 'yes')))
        {
            return $this->scroll;
        }
        else
        {
            return 'auto';
        }
    } // GetScroll

    /**
     * Destroi um argumento.
     *
     * Apaga do array o argumento especificado.
     *
     * @access  protected
     * @param   string     $v_str_arg   Nome do argumento.
     */
    function UnsetArg($v_str_arg)
    {
        if (isset($this->argv[$v_str_arg]))
        {
            unset($this->argv[$v_str_arg]);
        }
    } //  UnsetArg


    /**
     * Seta argumento.
     *
     * Armazena o valor de um argumento recebido pela pagina atual.
     *
     * @access  protected
     * @param   string     $v_str_arg  Nome do argumento.
     * @param   mixed      $v_mix_val  Valor do argumento.
     */
    function SetArg($v_str_arg, $v_mix_val)
    {
        $this->argv[$v_str_arg] = $v_mix_val;
    } // SetArg

    /**
     * Recupera folhas de estilo.
     *
     * Recupera a lista de folhas de estilo usadas pela pagina.
     *
     * @access  protected
     * @return  array      $arr_result  Lista de folhas de estilo.
     */
    function GetStyle()
    {
        return $this->style;
    } // GetStyle

    /**
     * Recupera folhas de estilo.
     *
     * Recupera a lista de folhas de estilo usadas pela pagina.
     *
     * @access  protected
     * @return  array      $arr_result  Lista de folhas de estilo.
     */
    function GetStyleCss()
    {
    	return $this->styleCss;
    } // GetStyleCss

    /**
     * Inicializa funcoes Javascript.
     *
     * Inicializa lista de funcoes Javascript utilizadas pelas paginas do
     * ScriptCase.
     *
     * @access  protected
     * @global  array      $nm_config  Array de configuracao do ScriptCase.
     */
    function InitJavascript()
    {
        global $nm_config;
        $this->javascript = array();

    } // InitJavascript

    /**
     * Inicializa arquivos JS.
     *
     * Inicializa lista de arquivos JS utilizados pelas paginas do ScriptCase.
     *
     * @access  protected
     */
    function InitJs()
    {
    	$this->js = array();
    } // InitJs

    /**
     * Inicializa informacoes de redirecionamento.
     *
     * Inicializa o destino e o parametro de redirecionamento.
     *
     * @access  protected
     */
    function InitRedirectInfo()
    {
        $this->redirect_param = '';
        $this->redirect_to    = '';
    } // InitRedirectInfo

    /**
     * Inicializa folhas de estilo.
     *
     * Inicializa lista de folhas de estilo utilizadas pelas paginas do
     * ScriptCase.
     *
     * @access  protected
     */
    function InitStyle()
    {
        $this->style = array();
    } // InitStyle

    /**
     * Inicializa folhas de estilo.
     *
     * Inicializa lista de folhas de estilo utilizadas pelas paginas do
     * ScriptCase.
     *
     * @access  protected
     */
    function InitStyleCss()
    {
        $this->styleCss = array();
    } // InitStyleCss

    /**
     * Verifica se argumento existe.
     *
     * Verifica se um argumento foi passado como parametro para a pagina a ser
     * exibida.
     *
     * @access  protected
     * @param   string     $v_str_arg   Nome do argumento.
     * @retrun  boolean    $bol_result  TRUE se o argumento existe, caso
     *                                  contrario FALSE.
     */
    function IsArg($v_str_arg)
    {
        return isset($this->argv[$v_str_arg]);
    } // IsArg

    /**
     * Recebe argumentos.
     *
     * Prepara argumentos recebidos pela pagina para uso futuro.
     *
     * @access  protected
     */
    function ParseArgs()
    {
        $arr_args = array();
        if (isset($_GET) && !empty($_GET))
        {
            $arr_args = nm_unescape_array($_GET);
        }
        if (isset($_POST) && !empty($_POST))
        {
            $arr_args = array_merge($arr_args, nm_unescape_array($_POST));
        }
        $this->argv = $arr_args;
        $this->argc = sizeof($this->argv);
    } // ParseArgs

    /**
     * Seta body.
     *
     * Armazena a classe CSS ou objeto da tag BODY.
     * Se passado apenas o primeiro parametro, define a class css do body,
     * caso contrario define algum objeto do body.
     * Obs: Apenas a primeira defini��o de css sera reconhecida. As demais s�o descartadas.
     *
     * @access  protected
     * @param   string     $v_str_body  Classe CSS ou objeto.
     * @param   string     $v_str_body  Se definido, atribui o valor do objeto especificado.
     */
    function SetBody($v_str_body, $str_body_value = "")
    {
		$sep_body	= !empty($this->body) ? "|" : "";

    	if (!empty($v_str_body) && !empty($str_body_value))
    	{
            $this->body .= $sep_body . $v_str_body . "#" . $str_body_value;
		}
		else if ('' != $v_str_body)
        {
            $this->body .= $sep_body . $v_str_body;
        }

    } // SetBody

    /**
     * Seta margem.
     *
     * Armazena o valor da margem da pagina a ser exibida.
     *
     * @access  protected
     * @param   integer    $v_int_margin  Valor da margem.
     */
    function SetMargin($v_int_margin)
    {
        if (0 <= $v_int_margin)
        {
            $this->margin = $v_int_margin;
        }
    } // SetMargin

    /**
     * Seta pagina.
     *
     * Armazena nome da pagina a ser exibida.
     *
     * @access  protected
     * @param   string     $v_str_page  Nome da pagina.
     */
    function SetPage($v_str_page)
    {
        if ('' != $v_str_page)
        {
            $this->page = $v_str_page;
        }
    } // SetPage

    /**
     * Seta digita.
     *
     * True ou false se vai incluir o digita
     *
     * @access  protected
     * @param   string     $v_str_page  Nome da pagina.
     */
    function SetDigita($v_bol_digita)
    {
    	$this->digita = $v_bol_digita;
    } // SetPage

    /**
     * Seta codigo da pagina.
     *
     * Armazena codigo da pagina a ser exibida.
     *
     * @access  protected
     * @param   string     $v_int_code  Codigo da pagina.
     */
    function SetPageCode($v_int_code)
    {
        if (0 < $v_int_code)
        {
            $this->page_code = $v_int_code;
        }
    } // SetPageCode

    /**
     * Seta subtitulo pagina.
     *
     * Armazena o subtitulo da pagina a ser exibida.
     *
     * @access  protected
     * @param   string     $v_str_subtit  Subtitulo da pagina.
     */
    function SetPageSubtitle($v_str_subtit)
    {
        $this->page_subtitle = $v_str_subtit;
    } // SetPageSubtitle

    /**
     * Seta as informacoes de redirecionamento.
     *
     * Armazena o destino e o parametro de redirecionamento.
     *
     * @access  protected
     * @param   string     $v_str_fld_section     Secao do campo.
     * @param   string     $v_str_to                       Destino de redirecionamento.
     * @param   string     $v_str_param                    Parametro de redirecionamento.
     */
    function SetRedirectInfo($v_str_to, $v_str_param, $v_str_fld_section = '', $v_str_fld_section_redirect = '')
    {
            $this->fld_section_redirect        = $v_str_fld_section_redirect;
            $this->fld_section                = $v_str_fld_section;
        $this->redirect_param       = $v_str_param;
        $this->redirect_to          = $v_str_to;
    } // SetRedirectInfo

    /**
     * Seta scroll.
     *
     * Armazena a flag para exibicao de barras de rolagem.
     *
     * @access  protected
     * @param   string     $v_str_scroll  Flag para barras de rolagem.
     */
    function SetScroll($v_str_scroll)
    {
        if (in_array(strtolower($v_str_scroll), array('no', 'yes')))
        {
            $this->scroll = strtolower($v_str_scroll);
        }
        else
        {
            $this->scroll = 'auto';
        }
    } // SetScroll

    /* ----- Metodos Protegidos ---------------------------------------- */

       

    /**
     * Exibe o conteudo.
     *
     * Exibe o conteudo da pagina acessada pelo cliente.
     *
     * @abstract
     */
    function DisplayContent()
    {
    } // DisplayContent

    /**
     * Exibe o rodape.
     *
     * Exibe o rodape comum as paginas do ScriptCase.
     *
     * @access  protected
     * @global  array      $nm_config    Array com configuracao do ScriptCase.
     * @global  array      $nm_lang      Array de idioma.
     * @global  object     $nm_template  Objeto para exibicao de templates.
     */
    function DisplayFooter()
    {
        global $nm_config, $nm_lang, $nm_template;
        $str_footer = '';       

        $nm_template->SetVar('footer_data', $str_footer);
        $nm_template->Display('page_footer');
    } // DisplayFooter

    /**
     * Exibe o cabecalho.
     *
     * Exibe o cabecalho comum as paginas do ScriptCase.
     *
     * @access  protected
     * @global  object     $nm_template  Objeto para exibicao de templates.
     */
    function DisplayHeader()
    {
        global $nm_template;
        $nm_template->SetVar('doctype', $this->getDocType());
        $nm_template->Display('page_header');
    } // DisplayHeader


    /**
     * Inicializa o cabecalho.
     *
     * Monta o cabecalho da pagina HTML a ser exibida.
     *
     * @access  protected
     * @global  array      $nm_template  Objeto para exibicao de templates.
     */
    function InitHeader()
    {
        global $nm_config, $nm_template;
        /* Inibe cache da pagina */
        header('Expires: Fri, Jan 01 1900 00:00:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Cache-Control: max-age=15, s-maxage=0, private');
        header('Cache-Control: post-check=0, pre-check=0', FALSE);
        header('Pragma: no-cache');

        //$this->CreateCss();
        
        /* Inicializa elementos comuns do cabecalho */
        $this->InitJavascript();
        $this->InitJs();
        $this->InitStyle();
        $this->InitStyleCss();
        /* Deine elementos particulares do cabecalho */
        $this->PageJavascriptBeforeJs();
        $this->PageJavascript();
        $this->PageJs();
        $this->PageStyle();
        $this->PageStyleCss();
        /* Define variaveis iniciais do template */
        
        $nm_template->SetVar('css_file',        		$nm_config['url_css'] . "prod.css");
        $nm_template->SetVar('usar_css', 				"S");        
        $nm_template->SetVar('page_body',               $this->GetBody());
        $nm_template->SetVar('page_javascriptbeforejs', $this->GetJavascriptBeforeJs());
        $nm_template->SetVar('page_javascript',         $this->GetJavascript());
        $nm_template->SetVar('page_js',                 $this->GetJs());
        $nm_template->SetVar('page_margin',             $this->GetMargin());
        $nm_template->SetVar('page_scroll',             $this->GetScroll());
        $nm_template->SetVar('page_style',              $this->GetStyle());
        $nm_template->SetVar('page_style_css',          $this->GetStyleCss());
        $nm_template->SetVar('page_subtitle',           $this->GetPageSubtitle());
    } // InitHeader


    /**
     * Carrega o idioma.
     *
     * Carrega as strings de idioma relativas a pagina a ser exibida.
     *
     * @access  protected
     * @global  array      $nm_config  Array com configuracao do ScriptCase.
     * @global  array      $nm_lang    Array de idioma.
     */
    function LoadLang($str_page = '')
    {
        global $nm_config, $nm_lang;
        
        $str_file = $nm_config['path_lang'] . ($str_page != '' ? $str_page : $this->GetPage()) . '.lang.php';
 
        if (@is_file($str_file))
        {
            include_once($str_file);
            
        }
        
    } // LoadLang
    

    /**
     * Define funcoes Javascript da pagina.
     *
     * Define a lista de funcoes Javascript especificas da pagina atual.
     *
     * @abstract
     */
    function PageJavascript()
    {
    } // PageJavascript

    /**
     * Define funcoes Javascript da pagina.
     *
     * Define a lista de funcoes Javascript especificas da pagina atual que serao incluidas
     * antes dos arquivos .js
     *
     * @abstract
     */
    function PageJavascriptBeforeJs()
    {
    } // PageJavascriptBeforeJs

    /**
     * Define arquivos JS da pagina.
     *
     * Define a lista de arquivos JS especificos da pagina atual.
     *
     * @abstract
     */
    function PageJs()
    {
    } // PageJs

    /**
     * Define folhas de estilo da pagina.
     *
     * Define a lista de folhas de estilo especificas da pagina atual.
     *
     * @abstract
     */
    function PageStyle()
    {
    } // PageStyle

    /**
     * Define folhas de estilo da pagina.
     *
     * Define a lista de folhas de estilo especificas da pagina atual.
     *
     * @abstract
     */
    function PageStyleCss()
    {
    } // PageStyle   
   

    /* ----- Metodos Publicos ------------------------------------------ */

    /**
     * Exibe a pagina.
     *
     * Inicia o processo de exibicao da pagina definida pela aplicacao.
     *
     * @access  public
     */
    function Display()
    {
        $this->LoadLang();
        $this->ParseArgs();
        $this->InitHeader();
        $this->DisplayHeader();
        $this->DisplayContent();
        $this->DisplayFooter();
        
    } // Display
  
   
    /**
     * Teste o formulario.
     *
     * Verifica se o formulario foi enviado.
     *
     * @access  protected
     * @param   string     $v_str_form  Nome do formulario.
     * @return  boolean    $bol_result  TRUE se o formulario foi enviado, caso
     *                                  contrario FALSE.
     */
    function FormSent($v_str_form)
    {
        return (isset($_POST['form_' . $v_str_form]) && ('' != $_POST['form_' . $v_str_form])) ||
               (isset($_GET['form_' . $v_str_form])  && ('' != $_GET['form_' . $v_str_form]));
    } // FormSent    

    /**
     *  Configura o DOCTYPE da pagina  ----------------------------------  //
     */
    function setDocType($doctype = "")
    {
    	switch($doctype)
    	{
			case "HTML 4.01 Strict":
				$this->doctype = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01//EN\" \"http://www.w3.org/TR/html4/strict.dtd\">";
				break;

			case "HTML 4.01 Transitional":
				$this->doctype = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">";
				break;

			case "HTML 4.01 Frameset":
				$this->doctype = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Frameset//EN\" \"http://www.w3.org/TR/html4/frameset.dtd\">";
				break;

			case "XHTML 1.0 Strict":
				$this->doctype = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">";
				break;

			case "XHTML 1.0 Transitional":
				$this->doctype = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";
				break;

			case "XHTML 1.0 Frameset":
				$this->doctype = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Frameset//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd\">";
				break;

			case "XHTML 1.1":
				$this->doctype = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">";
				break;

    		case "HTML":
				$this->doctype = "<!DOCTYPE html>";
				break;

			default:
				$this->doctype = $doctype;
				break;
    	}

    }// setDocType

    /**
     *  Recupera o DOCTYPE  ----------------------------------  //
     */
    function getDocType()
    {
		return $this->doctype;

    }//getDocType
    
   function Redirect($v_str_url, $v_str_target = '', $v_str_method = 'get',
                      $v_arr_param = array(), $v_bol_focus = FALSE,
                      $v_bol_end = TRUE)
    {
        global $nm_template;
        /* Redirecionamento por POST */
        if ('get' != $v_str_method)
        {
            $str_method = 'post';
            $str_action = nm_url_rand($v_str_url);
            if (empty($v_arr_param))
            {
                $str_input = '<input type="hidden" name="nm" value="" />';
            }
            else
            {
                $str_input = '';
                foreach ($v_arr_param as $str_param => $mix_value)
                {
                    if (!is_array($mix_value))
                    {
                        $str_input .= '<input type="hidden" name="' . $str_param
                                    . '" value="' . $mix_value . '" />';
                    }
                    else
                    {
                        foreach ($mix_value as $mix_key => $mix_val)
                        {
                            $str_input .= '<input type="hidden" name="'
                                        . $str_param . "[" . $mix_key . "]"
                                        . '" value="' . $mix_val . '" />';
                        }
                    }
                }
            }
        }
        /* Redirecionamento por GET */
        else
        {
            $str_method = 'get';
            $str_redir  = nm_url_rand($v_str_url);
            if (FALSE === strpos($str_redir, '?'))
            {
                $str_action = $str_redir;
                if (empty($v_arr_param))
                {
                    $str_input = '<input type="hidden" name="nm" value="" />';
                }
                else
                {
                    $str_input = '';
                    foreach ($v_arr_param as $str_param => $mix_value)
                    {
                        if(!is_array($mix_value))
                        {
                            $str_input .= '<input type="hidden" name="'
                                        . $str_param . '" value="' . $mix_value
                                        . '" />';
                        }
                        else
                        {
                            foreach ($mix_value as $mix_key => $mix_val)
                            {
                                $str_input .= '<input type="hidden" name="'
                                            . $str_param . "[" . $mix_key . "]"
                                            . '" value="' . $mix_val . '" />';
                            }
                        }
                    }
                }
            }
            else
            {
                $str_action = substr($str_redir, 0, strpos($str_redir, '?'));
                $arr_input  = explode('&', substr($str_redir,
                                                  strpos($str_redir, '?') + 1));
                $str_input  = '';
                foreach ($arr_input as $str_var)
                {
                    $arr_tmp_list_change = explode('=', $str_var);
                    list($str_name, $str_val) = $arr_tmp_list_change;
                    $str_input .= '<input type="hidden" name="' . $str_name
                                . '" value="' . $str_val .'" />';
                }
                foreach ($v_arr_param as $str_param => $mix_value)
                {
                    if (!is_array($mix_value))
                    {
                        $str_input .= '<input type="hidden" name="' . $str_param
                                    . '" value="' . $mix_value . '" />';
                    }
                    else
                    {
                        foreach ($mix_value as $mix_key => $mix_val)
                        {
                            $str_input .= '<input type="hidden" name="'
                                        . $str_param . "[" . $mix_key . "]"
                                        . '" value="' . $mix_val . '" />';
                        }
                    }
                 }
            }
        }

        $str_target = ('' == $v_str_target) ? '_self' : $v_str_target;
        $nm_template->SetVar('redirect_to',     $str_action);
        $nm_template->SetVar('redirect_target', $str_target);
        $nm_template->SetVar('redirect_method', $str_method);
        $nm_template->SetVar('redirect_input',  $str_input);
        $nm_template->SetVar('redirect_focus',  $v_bol_focus);
        $nm_template->Display('body_redirect');
        if ($v_bol_end)
        {
            $this->DisplayFooter();
            exit;
        }
    } // Redirect
	
	/**
     * Verifica o login.
     *
     * Checa se o usuario esta logado. Caso nao, redireciona para a tela de
     * login.
     *
     * @access  protected
     * @global  array      $nm_config  Array com configuracao do ScriptCase.
     * @global  object     $nm_online  Objeto para manipulacao de usuarios
     *                                 online.
     * @global  object     $nm_user    Objeto para manipulacao de usuarios.
     */
    function CheckLogin()
    {
		global $nm_config;
		
        if (!isset($_SESSION['nm_session']['prod_v8']['logged']) || !$_SESSION['nm_session']['prod_v8']['logged'])
        {
			Header("location: " . $nm_config['url_prod']);
			exit;
        }
    } // CheckLogin
}

?>