<?php

/* Classes ancestrais */
nm_load_class('page', 'Page');

/* Definicao da classe */
class nmPageAdminSysAllConectionsCreateWizard2 extends nmPage
{
    /**
     * Erros do formulario.
     *
     * Lista de erros encontrados na validacao do formulario.
     *
     * @access  protected
     * @var     array
     */
    var $errors;

    /**
     * Campos do formulario.
     *
     * Lista de campos do formulario.
     *
     * @access  protected
     * @var     array
     */
    var $fields;

    /**
     * template do formulario.
     *
     * Template que ser� exibido no form
     *
     * @access  protected
     * @var     array
     */
    var $str_page;

    /**
     * Conexao.
     *
     * Objeto connection
     *
     * @access  protected
     * @var     array
     */
    var $obj_conn;

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

        nm_load_class('interface', 'Connection');
        $this->obj_conn = new nmConnection();

        $this->Ajax();
        $this->SetBody('nmPage');
        $this->SetMargin(10);
        $this->SetPage('AdminSysAllConectionsCreateWizard2');
        $this->CheckLogin();
        $this->SetPageSubtitle('');

    } // nmPageMenu


    /**
     * Funcao ajax
     *
     * @access  protected
     */
    function Ajax()
    {
        if (isset($_REQUEST['op'])){
            $httpOrigin = (isset($_SERVER['HTTP_ORIGIN']) && !empty($_SERVER['HTTP_ORIGIN'])) ? $_SERVER['HTTP_ORIGIN'] : '';
            header("Access-Control-Allow-Origin: ".$httpOrigin);
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
            header('Access-Control-Max-Age: 1000');
            header('Content-Type: application/json');
            switch ($_REQUEST['op']) {
                case 'sgdb_list':
                    echo json_encode($this->obj_conn->GetSGBDS());
                    break;
                case 'sgdb_show':
                    echo json_encode($this->ShowSGDB($_REQUEST['data']['sgdb']));
                    break;
                default:
                    break;
            }
            die;
        }
    }//Ajax

    private function GetInputList() {
        return [
            'mysql' => [
                'connection'    => ['server', 'port', 'user', 'pass', 'database'],
                'security'      => ['mysql_use_ssl', 'mysql_ssl_key', 'mysql_ssl_cert', 'mysql_ssl_capath', 'mysql_ssl_ca', 'mysql_ssl_cipher'],
                'advanced'      => ['decimal', 'date_separator', 'use_persistent', 'encoding']
            ],
            'oracle' => [
                'connection'    => ['tsname', 'user', 'pass'],
                'security'      => [],
                'advanced'      => ['decimal', 'date_separator', 'use_persistent', 'encoding']
            ],
            'mssql' => [
                'connection'    => ['server', 'port', 'user', 'pass', 'database'],
                'security'      => [],
                'advanced'      => ['decimal', 'date_separator', 'use_persistent']
            ],
            'postgres' => [
                'connection'    => ['server', 'port', 'schema', 'user', 'pass', 'database'],
                'security'      => [],
                'advanced'      => ['decimal', 'date_separator', 'use_persistent', 'encoding']
            ],
            'db2' => [
                'connection'    => ['server', 'port', 'schema', 'user', 'pass', 'database'],
                'security'      => ['db2_autocommit', 'db2_i5_lib', 'db2_i5_naming', 'db2_i5_commit'],
                'advanced'      => ['decimal', 'date_separator', 'use_schema', 'use_persistent', 'encoding']
            ],
            'informix' => [
                'connection'    => ['server', 'base', 'user', 'pass'],
                'security'      => [],
                'advanced'      => ['decimal', 'date_separator', 'use_persistent']
            ],
            'access' => [
                'connection'    => ['path', 'user', 'pass'],
                'security'      => [],
                'advanced'      => ['decimal', 'date_separator', 'use_persistent']
            ],
            'sqlite' => [
                'connection'    => ['path', 'pass'],
                'security'      => [],
                'advanced'      => ['decimal', 'date_separator', 'use_persistent']
            ],
            'sybase' => [
                'connection'    => ['server', 'port', 'user', 'pass', 'database'],
                'security'      => [],
                'advanced'      => ['decimal', 'date_separator', 'use_persistent']
            ],
            'ibase' => [
                'connection'    => ['ip_path', 'port', 'user', 'pass'],
                'security'      => [],
                'advanced'      => ['decimal', 'date_separator', 'use_persistent']
            ],
            'firebird' => [
                'connection'    => ['server', 'port', 'user', 'pass', 'database'],
                'security'      => [],
                'advanced'      => ['decimal', 'date_separator', 'use_persistent']
            ],
            'progress' => [
                'connection'    => ['odbc_name', 'user', 'pass'],
                'security'      => [],
                'advanced'      => ['decimal', 'date_separator', 'use_persistent']
            ],
            'odbc' => [
                'connection'    => ['odbc_name', 'user', 'pass'],
                'security'      => [],
                'advanced'      => ['decimal', 'date_separator', 'use_persistent']
            ]
        ];
    }

    private function ShowSGDB($sgdb)
    {
        $sgdb_list = $this->obj_conn->GetSGBDVersions()[$sgdb];
        $input_list = $this->GetInputList()[$sgdb];

        return [
            'input_list' => $input_list,
            'sgdb_list' => $sgdb_list
        ];
    }//GetInputList

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
        global $nm_template, $nm_config, $nm_lang;

        nm_load_class('interface', 'Connection');
        $this->obj_conn = new nmConnection();

        $this->CheckDelConn();
        $this->AjustePort();
        $this->PrepareEditConn();

        $bEditConn = ('S' == $this->GetArg('conn_open')) || $this->FormSent('create');

        $this->ValidateForm();
        $this->DisplayForm();
        $this->CheckError();

        $nm_template->SetVar('force_name_conn', $this->GetArg('opt_par'));
        $nm_template->SetVar('conn_open', $this->GetArg('conn_open'));
        $nm_template->SetVar('arr_conns', ($this->GetArg('conn_open') == 'S' ? $this->GetAllConnections() : array()));
        $nm_template->SetVar('db_dbms_short', $this->obj_conn->GetSGBDS());

        $nm_template->Display('body_admin_sys_allconections_create_wizard_2');

    } // DisplayContent

    /**
     * Retorna os passo de cria�ao
     *
     * Rotorna o array com os passos de cria��o
     *
     * @access  protected
     */
    function GetSteps()
    {
      $arr_steps = array();
      $arr_steps[] = 'sgdb';
      $arr_steps[] = 'sgdb2';
      $arr_steps[] = 'dados_rep';
      $arr_steps[] = 'dados_usu';
      $arr_steps[] = 'testar';

      return $arr_steps;
    } // GetGroups

    function CheckError()
    {
      global $nm_error, $nm_lang;

      $arr_erros = $this->GetErrors();
      $str_erro  = "";
      if(is_array($arr_erros))
      {
        foreach($arr_erros as $field => $erro)
        {
          $str_erro = "$field : $erro<br>";
        }
      }
      if(!empty($str_erro))
      {
      	echo "Error: " . $nm_lang['create_conn_wizard']['erro']['title'] . ", " . $str_erro . "<hr>";
      }
    }

    /**
     * Salva o $nm_ini_sys.
     *
     * Salva o array de parametros $nm_ini_sys do ScriptCase.
     *
     * @access  protected
     */
    function SaveConections($arr_fields, $str_prj="")
    {
		$arr_ini = $_SESSION['nm_session']['prod_v8']['arr_ini'];

        if ($this->IsArg('edit_conn') && $this->GetArg('edit_conn') == 'S')
        {
        	$str_name = $this->GetArg('id_edit_conn');
        }
        else
        {
        	$str_name = $arr_fields['conn'];
        }

        $arr_profile = array(
                             'USE_HOST'               => 'Y',
                             'VAL_HOST'               => nm_crypt_encode_utf8($arr_fields['host']),
                             'USE_USER'               => 'Y',
                             'VAL_USER'               => nm_crypt_encode_utf8($arr_fields['user']),
                             'USE_PASS'               => 'Y',
                             'VAL_PASS'               => nm_crypt_encode_utf8($arr_fields['pass']),
                             'USE_BASE'               => 'Y',
                             'VAL_BASE'               => nm_crypt_encode_utf8($arr_fields['base']),
                             'USE_TYPE'               => 'Y',
                             'VAL_TYPE'               => $arr_fields['dbms'],
                             'VARIABLE'               => array(),
                             'USE_SEP'                => 'Y',
                             'VAL_SEP'                => $arr_fields['decimal'],
                             'POSTGRES_ENCODING'      => nm_crypt_encode_utf8($arr_fields['postgres_encoding']),
                             'ORACLE_ENCODING'        => nm_crypt_encode_utf8($arr_fields['oracle_encoding']),
                             'MYSQL_ENCODING'         => nm_crypt_encode_utf8($arr_fields['mysql_encoding']),
                             'DB2_AUTOCOMMIT'         => nm_crypt_encode_utf8($arr_fields['db2_autocommit']),
                             'DB2_I5_LIB'             => nm_crypt_encode_utf8($arr_fields['db2_i5_lib']),
                             'DB2_I5_NAMING'          => nm_crypt_encode_utf8($arr_fields['db2_i5_naming']),
                             'DB2_I5_COMMIT'          => nm_crypt_encode_utf8($arr_fields['db2_i5_commit']),
                             'DB2_I5_QUERY_OPTIMIZE'  => nm_crypt_encode_utf8($arr_fields['db2_i5_query_optimize']),
                             'USE_PERSISTENT'         => $arr_fields['use_persistent'],
                             'USE_SCHEMA'             => $arr_fields['use_schema'],
                             'DATE_SEPARATOR'         => $arr_fields['date_separator'],
							 'USE_SSL'                => nm_crypt_encode_utf8($arr_fields['use_ssl']),
							 'MYSQL_SSL_KEY'          => nm_crypt_encode_utf8($arr_fields['mysql_ssl_key']),
							 'MYSQL_SSL_CERT'         => nm_crypt_encode_utf8($arr_fields['mysql_ssl_cert']),
							 'MYSQL_SSL_CAPATH'       => nm_crypt_encode_utf8($arr_fields['mysql_ssl_capath']),
							 'MYSQL_SSL_CA'           => nm_crypt_encode_utf8($arr_fields['mysql_ssl_ca']),
							 'MYSQL_SSL_CIPHER'       => nm_crypt_encode_utf8($arr_fields['mysql_ssl_cipher']),
        );

        $arr_ini['PROFILE'][$str_name] = $arr_profile;
        $arr_list                      = array_keys($arr_ini['PROFILE']);
        $arr_data                      = array();
        natcasesort($arr_list);
        foreach ($arr_list as $str_profile)
        {
            $arr_data[$str_profile] = $arr_ini['PROFILE'][$str_profile];
        }
        $arr_ini['PROFILE']     = $arr_data;

        $this->obj_conn->SaveConn($arr_ini);

        $_SESSION['nm_session']['prod_v8']['arr_ini'] = $arr_ini;

    } // SaveConections

    /**
     * Seta o erro de um campo.
     *
     * Armazena o codigo do erro de um campo retornado na validacao.
     *
     * @access  public
     * @param   string  $v_str_field  Campo do formulario.
     * @param   string  $v_str_error  Codigo do erro.
     */
    function AddError($v_str_field, $v_str_error)
    {
        $this->erros[$v_str_field] = $v_str_error;
    } // SetError

    function iniSession()
    {
       $_SESSION['nm_session']['connection']['wizard']['conn']                  = '';
       $_SESSION['nm_session']['connection']['wizard']['dbms']                  = '';
       $_SESSION['nm_session']['connection']['wizard']['sgdb']                  = '';
       $_SESSION['nm_session']['connection']['wizard']['server']                = '';
       $_SESSION['nm_session']['connection']['wizard']['user']                  = '';
       $_SESSION['nm_session']['connection']['wizard']['pass']                  = '';
       $_SESSION['nm_session']['connection']['wizard']['pass_confirm']          = '';
       $_SESSION['nm_session']['connection']['wizard']['base']                  = '';
       $_SESSION['nm_session']['connection']['wizard']['schema']                = '';
       $_SESSION['nm_session']['connection']['wizard']['retrieve_schema']       = 'Y';
       $_SESSION['nm_session']['connection']['wizard']['date_separator']        = '';
       $_SESSION['nm_session']['connection']['wizard']['use_persistent']        = 'N';
       $_SESSION['nm_session']['connection']['wizard']['use_schema']            = 'N';
       $_SESSION['nm_session']['connection']['wizard']['postgres_encoding']     = '';
       $_SESSION['nm_session']['connection']['wizard']['oracle_encoding']       = '';
       $_SESSION['nm_session']['connection']['wizard']['mysql_encoding']        = '';
       $_SESSION['nm_session']['connection']['wizard']['db2_autocommit']        = '';
       $_SESSION['nm_session']['connection']['wizard']['db2_i5_lib']            = '';
       $_SESSION['nm_session']['connection']['wizard']['db2_i5_naming']         = '';
       $_SESSION['nm_session']['connection']['wizard']['db2_i5_commit']         = '';
       $_SESSION['nm_session']['connection']['wizard']['db2_i5_query_optimize'] = '';
       $_SESSION['nm_session']['connection']['wizard']['decimal']               = '.';
       $_SESSION['nm_session']['connection']['wizard']['rep']                   = '';
	   
       $_SESSION['nm_session']['connection']['wizard']['use_ssl']               = 'N';
       $_SESSION['nm_session']['connection']['wizard']['mysql_ssl_key']         = '';
       $_SESSION['nm_session']['connection']['wizard']['mysql_ssl_cert']        = '';
       $_SESSION['nm_session']['connection']['wizard']['mysql_ssl_capath']      = '';
       $_SESSION['nm_session']['connection']['wizard']['mysql_ssl_ca']          = '';
       $_SESSION['nm_session']['connection']['wizard']['mysql_ssl_cipher']      = '';

       $_SESSION['nm_session']['connection']['wizard']['addgroup'] = 'S';
    }

    function delSession()
    {
    	if(isset($_SESSION['nm_session']['connection']))
    	{
    		unset($_SESSION['nm_session']['connection']);
    	}
    }

    function setDefaultValues()
    {
      if($_SESSION['nm_session']['connection']['wizard']['dbms']=="mysql")
      {
        if(empty($_SESSION['nm_session']['connection']['wizard']['server']))
        {
          $_SESSION['nm_session']['connection']['wizard']['server'] = "localhost";
        }
        if(empty($_SESSION['nm_session']['connection']['wizard']['user']))
        {
          $_SESSION['nm_session']['connection']['wizard']['user'] = ""; //"root";
        }
      }
    }

    function setVarSession()
    {
      global $nm_template;

      foreach($_SESSION['nm_session']['connection']['wizard'] as $field => $value)
      {
        $nm_template->SetVar($field, $value);
      }
    }


  function GetPreviousStep()
  {
    $retorno = '';
    $arr_steps = $this->GetSteps();
    foreach ($arr_steps as $key => $value)
    {
      if($value==$this->str_page)
      {
        $key--;
        if(isset($arr_steps[$key]))
        {
          $retorno = $arr_steps[$key];
        }
      }
    }
    return $retorno;
  }

  function GetNextStep()
  {
    $retorno = '';
    $arr_steps = $this->GetSteps();
    foreach ($arr_steps as $key => $value)
    {
      if($value==$this->str_page)
      {
        $key++;
        if(isset($arr_steps[$key]))
        {
          $retorno = $arr_steps[$key];
        }
      }
    }
    return $retorno;
  }

    /**
     * Retorna os erro do formulario.
     *
     * Recupera a lista de codigos do erros dos campos de um formulario.
     *
     * @access  public
     * @return  array   $arr_result  Lista de codigos do erros.
     */
    function GetErrors()
    {
        return $this->errors;
    } // GetErrors

    /**
     * Retorna lista de campos da pagina.
     *
     * Rotorna o array com a lista de campos da pagina com seus valores.
     *
     * @access  protected
     */
    function GetFieldsList()
    {
        global $nm_validator;

        $arr_fields = array();

        foreach($_POST as $str_field => $str_value)
        {
          if($str_field != "form_create" && $str_field != "step" && $str_field !="nextstep")
          {
            $arr_fields[$str_field] = $str_value;
          }
        }
        return $arr_fields;
    } // GetFieldsList

    /**
     * Exibe A pagina html
     *
     */
    function DisplayForm()
    {

    } // DisplayErrors

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
        $this->AddJs('devel', 'functions.js');
        $this->AddJs('devel', 'random.js');
        $this->AddJs('devel', 'window.js');
        $this->AddJs('third', 'jquery/js/jquery.js');
        $this->AddJs('third', 'jquery/js/jquery-ui.js');
        $this->AddJs('third', 'semantic-ui/semantic.js');
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
        $this->AddStyleCss('third', 'jquery/css/base/jquery-ui.css');
        $this->AddStyleCss('third', 'semantic-ui/semantic.css');
        $this->AddStyleCss('devel', 'css/conn.css');
    } // PageStyle

   /**
     * Valida o formulario.
     *
     * Verifica se o formulario nao contem erros.
     *
     * @access  public
     */
    function ValidateForm()
    {
        global $nm_lang;
        if ($this->FormSent('create'))
        {
          $arr_fields = $this->GetFieldsList();
          if($this->GetArg('step')=="dados_usu")
          {
              if($this->GetArg('addgroup')!="S")
              {
                 $arr_fields['addgroup'] = "N";
              }
          }
          foreach ($arr_fields as $str_field => $str_value)
          {
              $str_valid = $this->ValidateField($str_field);
              if ('' != $str_valid)
              {
                  $this->errors[$nm_lang['label'][$str_field]] = $str_valid;
              }
          }
        }
    } // ValidateForm

    /**
     * Valida um campo.
     *
     * Verifica se o valor de um campo recebido pelo formulario e valido.
     *
     * @access  protected
     * @param   string     $v_str_field   Campo do formulario.
     * @return  string     $str_result    String vazia se o campo for valido,
     *                                    caso contrario retorna o codigo do
     *                                    erro.
     * @global  object     $nm_validator  Objeto para validacao de dados.
     */
    function ValidateField($v_str_field)
    {
        global $nm_validator, $nm_lang;
        /* Inicializa variaveis */
        $bol_null = FALSE;
        $mix_val  = $this->GetArg($v_str_field);
        $str_err  = '';
        /* Seleciona o campo */
        switch ($v_str_field)
        {
          case 'dbms':
          case 'sgdb':
            if("" == $mix_val)
            {
              $str_err = $nm_lang['create_conn_wizard']['erro']['sgdb'];
            }else
            {
              $_SESSION['nm_session']['connection']['wizard'][$v_str_field] = $mix_val;
            }
          break;
          case 'conn':

          	if (!($this->IsArg('flag_edit') || ($this->IsArg('edit_conn') && $this->GetArg('edit_conn') == 'S')))
          	{
				  if($this->ExistConn($mix_val))
	              {
	                $str_err = $nm_lang['create_conn_wizard']['erro']['conn_e'];
	              }
	              $_SESSION['nm_session']['connection']['wizard'][$v_str_field] = $mix_val;
          	}
          	else
          	{
          		$_SESSION['nm_session']['connection']['wizard'][$v_str_field] = $mix_val;
          	}

          break;
          case 'server':
          case 'base':
          case 'schema':
          case 'rep':
          case 'user':
          case 'pass':
          case 'decimal':
          case 'addgroup':
          case 'retrieve_schema':
          case 'date_separator':
          case 'use_persistent':
          case 'use_schema':
          case 'postgres_encoding':
          case 'oracle_encoding':
          case 'mysql_encoding':
          case 'db2_autocommit':
          case 'db2_i5_lib':
          case 'db2_i5_naming':
          case 'db2_i5_commit':
          case 'db2_i5_query_optimize':
          case 'use_ssl':
          case 'mysql_ssl_key':
          case 'mysql_ssl_cert':
          case 'mysql_ssl_capath':
          case 'mysql_ssl_ca':
          case 'mysql_ssl_cipher':
              $_SESSION['nm_session']['connection']['wizard'][$v_str_field] = $mix_val;
          break;
          case 'pass_confirm':
          	if($this->GetArg('pass') != $mix_val)
          	{
          		$str_err = $nm_lang['create_conn_wizard']['erro']['pass_confirm'];
          	}
          	$_SESSION['nm_session']['connection']['wizard'][$v_str_field] = $mix_val;
          break;
    }
	
    /* Retorna o resultado */
        return $str_err;
    } // ValidateField


    /**
     * Prepara campos para edicao da conexao.
     *
     * @access  protected
     */
    function PrepareEditConn()
    {
        global $nm_template;

        $arr_filter_ini = array();
        $arr_filter_ini['filter_table'] = '';
        $arr_filter_ini['filter_owner'] = '';
        $arr_filter_ini['filter_show']  = 'N';

        if ($this->IsArg('flag_edit') && $this->GetArg('flag_edit') == 'S')
        {
			$arr_conn = $this->GetConnection($this->GetArg('conn'));

			$_SESSION['nm_session']['connection']['wizard'] = $arr_conn;

			$_SESSION['nm_session']['connection']['wizard']['host']					 = nm_crypt_decode($arr_conn['host']);
			$_SESSION['nm_session']['connection']['wizard']['user']   			     = nm_crypt_decode($arr_conn['user']);
			$_SESSION['nm_session']['connection']['wizard']['pass']   			     = nm_crypt_decode($arr_conn['pass']);
			$_SESSION['nm_session']['connection']['wizard']['base']   				 = nm_crypt_decode($arr_conn['base']);
			$_SESSION['nm_session']['connection']['wizard']['schema'] 				 = nm_crypt_decode($arr_conn['schema']);
			$_SESSION['nm_session']['connection']['wizard']['postgres_encoding']     = nm_crypt_decode($arr_conn['postgres_encoding']);
			$_SESSION['nm_session']['connection']['wizard']['oracle_encoding']       = nm_crypt_decode($arr_conn['oracle_encoding']);
			$_SESSION['nm_session']['connection']['wizard']['mysql_encoding']        = nm_crypt_decode($arr_conn['mysql_encoding']);
			$_SESSION['nm_session']['connection']['wizard']['db2_autocommit']        = nm_crypt_decode($arr_conn['db2_autocommit']);
			$_SESSION['nm_session']['connection']['wizard']['db2_i5_lib']            = nm_crypt_decode($arr_conn['db2_i5_lib']);
			$_SESSION['nm_session']['connection']['wizard']['db2_i5_naming']         = nm_crypt_decode($arr_conn['db2_i5_naming']);
			$_SESSION['nm_session']['connection']['wizard']['db2_i5_commit']         = nm_crypt_decode($arr_conn['db2_i5_commit']);
			$_SESSION['nm_session']['connection']['wizard']['db2_i5_query_optimize'] = nm_crypt_decode($arr_conn['db2_i5_query_optimize']);
			
			$_SESSION['nm_session']['connection']['wizard']['date_separator']        = $arr_conn['date_separator'];
			
			$_SESSION['nm_session']['connection']['wizard']['use_ssl']          = nm_crypt_decode($arr_conn['use_ssl']);
			$_SESSION['nm_session']['connection']['wizard']['mysql_ssl_key']    = nm_crypt_decode($arr_conn['mysql_ssl_key']);
			$_SESSION['nm_session']['connection']['wizard']['mysql_ssl_cert']   = nm_crypt_decode($arr_conn['mysql_ssl_cert']);
			$_SESSION['nm_session']['connection']['wizard']['mysql_ssl_capath'] = nm_crypt_decode($arr_conn['mysql_ssl_capath']);
			$_SESSION['nm_session']['connection']['wizard']['mysql_ssl_ca']     = nm_crypt_decode($arr_conn['mysql_ssl_ca']);
			$_SESSION['nm_session']['connection']['wizard']['mysql_ssl_cipher'] = nm_crypt_decode($arr_conn['mysql_ssl_cipher']);
			
			$_SESSION['nm_session']['connection']['wizard']['sgdb'] = $_SESSION['nm_session']['connection']['wizard']['dbms'];
			$_SESSION['nm_session']['connection']['wizard']['server'] = $_SESSION['nm_session']['connection']['wizard']['host'];

			$arr_ver_sgbd = $this->obj_conn->GetSGBDVersions();

			foreach ($arr_ver_sgbd as $db => $arr_db)
			{
				foreach ($arr_db as $k => $v)
				{
					if ($_SESSION['nm_session']['connection']['wizard']['sgdb'] == $k)
					{
						$_SESSION['nm_session']['connection']['wizard']['dbms'] = $db;
						break 2;
					}
				}
			}

			$this->SetArg('dbms', $_SESSION['nm_session']['connection']['wizard']['dbms']);
			$this->SetArg('step', 'sgdb');
			$this->SetArg('nextstep', 'sgdb2');

			if (empty($_SESSION['nm_session']['connection']['wizard']['filters']['list'])     ||
			    !is_array($_SESSION['nm_session']['connection']['wizard']['filters']['list']) ||
			    count($_SESSION['nm_session']['connection']['wizard']['filters']['list']) == 0)
			{
				$_SESSION['nm_session']['connection']['wizard']['filters']['list'] = array($arr_filter_ini);
			}
			else
			{
				$exist_em_branco = false;

				foreach ($_SESSION['nm_session']['connection']['wizard']['filters']['list'] as $arr_fil)
				{
					if ($arr_fil['filter_table'] == '' && $arr_fil['filter_owner'] == '')
					{
						$exist_em_branco = true;
						break;
					}
				}

				if (!$exist_em_branco)
				{
					$_SESSION['nm_session']['connection']['wizard']['filters']['list'][] = $arr_filter_ini;
				}
			}

			$nm_template->SetVar('id_edit_conn', $this->GetArg('conn'));
			$nm_template->SetVar('edit_conn', 'S');
			$nm_template->SetVar('conn', $this->GetArg('conn'));
			$nm_template->SetVar('arr_filters', $_SESSION['nm_session']['connection']['wizard']['filters']);
        }
        elseif ($this->GetArg('step') == 'sgdb' && $this->GetArg('nextstep') == 'sgdb2')
        {
        	$cont = 0;
        	$str_nome_conn = "conn_" . $this->GetArg('dbms');

			while($this->ExistConn($str_nome_conn))
			{
				$str_nome_conn = "conn_" . $this->GetArg('dbms') . "_" . ++$cont;
			}

        	$nm_template->SetVar('nome_conn_sugerido', $str_nome_conn);
        	$nm_template->SetVar('arr_filters', array(
													    'show_table' 		=> 'Y',
													    'show_view' 		=> 'Y',
													    'show_system' 		=> 'N',
													    'show_procedure' 	=> 'N',
													    'list' 				=>  array($arr_filter_ini)
						                             )
                       		     );
        }


    }//PrepareEditConn

	function ExistConn($str_conn)
	{
		return isset($_SESSION['nm_session']['prod_v8']['arr_ini']['PROFILE']) &&  isset($_SESSION['nm_session']['prod_v8']['arr_ini']['PROFILE'][$str_conn]);
	}

    /**
     * Retorna link especifico da conexao
     *
     * @access  protected
     */
    function GetLinkHelpConn($str_tp_conn)
    {
    	$link = "tut_bases";

    	if (!($this->IsArg('step') && $this->GetArg('step') == 'sgdb2'))
    	{
	    	$win  = stripos(php_uname("s"), "win") !== false;

	    	switch ($str_tp_conn)
	    	{
  				case 'mysql':		  $link = "conn_mysql";									  break;
  				case 'oracle':		$link = $win ? "conn_oracle_win" : "conn_oracle_lin";	break;
  				case 'mssql':		  $link = $win ? "conn_mssql_win"  : "conn_mssql_lin";	break;
  				case 'postgres':	$link = "conn_postgres";								break;
  				case 'db2':			  $link = "conn_db2";										  break;
  				case 'informix':	$link = "conn_informix";								break;
  				case 'access':		$link = "conn_access";									break;
  				case 'sqlite':		$link = "conn_sqlite";									break;
  				case 'sybase':		$link = "conn_sybase";									break;
  				case 'ibase':		  $link = "conn_ibase";									  break;
          case 'firebird':  $link = "conn_firebird";                break;
  				case 'progress':	$link = "conn_progress";								break;
	    	}
    	}

    	return $link;

    }//GetLinkHelpConn

    /**
     * Retorna lista de banco de dados do mysql
     *
     * @access  protected
     */
    function GetListDatabaseNameMySql($host, $usr, $pwd, $driver)
    {
        $_SESSION['nm_err_num_error'] = 0;
    	$_SESSION['nm_err_str_error'] = "";

        $fc_err_old = set_error_handler("nm_err_generic");

        if($driver == 'pdo_mysql')
        {
            list($host, $port) = explode(':', $host);
            $conn_mysql = new PDO('mysql:host='. $host . ';port='.$port, $usr, $pwd);

            if ($_SESSION['nm_err_num_error'] == 0)
            {
                $arr_db = array();
                foreach($conn_mysql->query("SHOW DATABASES") as $db)
                {
                    $arr_db[$db['Database']] = $db['Database'];
                }
            }
            else
            {
                if (strpos($_SESSION['nm_err_str_error'], ']:') !== false)
                {
                    $arr_db = substr($_SESSION['nm_err_str_error'], strpos($_SESSION['nm_err_str_error'], ']:') + 2);
                }
                else
                {
                    $arr_db = $_SESSION['nm_err_str_error'];
                }
            }
        }
        elseif($driver == 'mysqli')
        { 
            $conn_mysql = @mysqli_connect($host, $usr, $pwd);

            if ($_SESSION['nm_err_num_error'] == 0 || !nm_prod_error_filter($_SESSION['nm_err_str_error']))
            {
                $rs_db = @mysqli_query($conn_mysql, "SHOW DATABASES");

                $arr_db = array();

                while ($db = @mysqli_fetch_assoc($rs_db))
                {
                    $arr_db[current($db)] = current($db);
                }
            }
            else
            {
                if (strpos($_SESSION['nm_err_str_error'], ']:') !== false)
                {
                    $arr_db = substr($_SESSION['nm_err_str_error'], strpos($_SESSION['nm_err_str_error'], ']:') + 2);
                }
                else
                {
                    $arr_db = $_SESSION['nm_err_str_error'];
                }
            }
        }
        else
        {

            $conn_mysql = @mysql_connect($host, $usr, $pwd);

            if ($_SESSION['nm_err_num_error'] == 0 || !nm_prod_error_filter($_SESSION['nm_err_str_error']))
            {
                $rs_db = @mysql_query("SHOW DATABASES", $conn_mysql);

                $arr_db = array();

                while ($db = @mysql_fetch_assoc($rs_db))
                {
                    $arr_db[current($db)] = current($db);
                }
            }
            else
            {
                if (strpos($_SESSION['nm_err_str_error'], ']:') !== false)
                {
                    $arr_db = substr($_SESSION['nm_err_str_error'], strpos($_SESSION['nm_err_str_error'], ']:') + 2);
                }
                else
                {
                    $arr_db = $_SESSION['nm_err_str_error'];
                }
            }
        }
        

    	set_error_handler($fc_err_old);

    	return $arr_db;

    }//GetListDatabaseNameMySql

    /**
     * Retorna lista de banco de dados do mysql
     *
     * @access  protected
     */
    function GetDbCharset($host, $db, $usr, $pwd, $driver)
    {
		$_SESSION['nm_err_num_error'] = 0;
    	$_SESSION['nm_err_str_error'] = "";

        $fc_err_old = set_error_handler("nm_err_generic");

		$arr_charset = array();
        if($driver == 'mysqli')
        {
            $connectionID = mysqli_connect($host, $usr, $pwd, $db);
            if ($_SESSION['nm_err_num_error'] == 0)
            {
                $rs_charset = mysqli_query($connectionID, "SHOW VARIABLES LIKE 'character_set%'");
                if($rs_charset)
                {
                    while ($charset = mysqli_fetch_assoc($rs_charset))
                    {
                       if($charset['Variable_name'] == 'character_set_server')
                        {
                            $arr_charset['server'] = $charset['Value'];
                        }
                        elseif($charset['Variable_name'] == 'character_set_database')
                        {
                            $arr_charset['database'] = $charset['Value'];
                        }
                    }
                }
            }
            else
            {
                if (strpos($_SESSION['nm_err_str_error'], ']:') !== false)
                {
                    $arr_charset = substr($_SESSION['nm_err_str_error'], strpos($_SESSION['nm_err_str_error'], ']:') + 2);
                }
                else
                {
                    $arr_charset = $_SESSION['nm_err_str_error'];
                }
            }
        }
        elseif($driver == 'mysql' || $driver == 'mysqlt')
        {
            $conn_mysql = @mysql_connect($host, $usr, $pwd);

            if ($_SESSION['nm_err_num_error'] == 0)
            {
				if(!empty($db))
				{
					mysql_select_db($db, $conn_mysql);
				}
			
                $rs_charset = @mysql_query("SHOW VARIABLES LIKE 'character_set%'", $conn_mysql);

                while ($charset = @mysql_fetch_assoc($rs_charset))
                {
					if($charset['Variable_name'] == 'character_set_server')
					{
						$arr_charset['server'] = $charset['Value'];
					}
					elseif($charset['Variable_name'] == 'character_set_database')
					{
						$arr_charset['database'] = $charset['Value'];
					}
                }
            }
            else
            {
                if (strpos($_SESSION['nm_err_str_error'], ']:') !== false)
                {
                    $arr_charset = substr($_SESSION['nm_err_str_error'], strpos($_SESSION['nm_err_str_error'], ']:') + 2);
                }
                else
                {
                    $arr_charset = $_SESSION['nm_err_str_error'];
                }
            }
        }
        elseif($driver == 'pdo_mysql')
        {
			list($host, $port) = explode(':', $host);
			$argDSN = 'mysql:host='. $host . ';port='.$port;            
			if (!empty($db)) {
				$argDSN .= ';dbname='.$db;
			}
			$conn_mysql = new PDO($argDSN, $usr, $pwd);
			
			if ($_SESSION['nm_err_num_error'] == 0)
            {
                foreach($conn_mysql->query("SHOW VARIABLES LIKE 'character_set%'") as $charset)
                {
					if($charset['Variable_name'] == 'character_set_server')
					{
						$arr_charset['server'] = $charset['Value'];
					}
					elseif($charset['Variable_name'] == 'character_set_database')
					{
						$arr_charset['database'] = $charset['Value'];
					}
                }
            }
            else
            {
                if (strpos($_SESSION['nm_err_str_error'], ']:') !== false)
                {
                    $arr_charset = substr($_SESSION['nm_err_str_error'], strpos($_SESSION['nm_err_str_error'], ']:') + 2);
                }
                else
                {
                    $arr_charset = $_SESSION['nm_err_str_error'];
                }
            }
        }

    	set_error_handler($fc_err_old);

    	return $arr_charset;
    }//GetDbCharset

	function unProtectAjaxChar($str_field)
	{
		$str_field = str_replace("__HASH__", "#", $str_field);
		$str_field = str_replace("__PLUS__", "+", $str_field);
		$str_field = str_replace("__MINUS__", "-", $str_field);
		$str_field = str_replace("__E__", "&", $str_field);
		return $str_field;
	}

    /**
     * Ajusta porta (mysql)
     *
     * @access  protected
     */
	function AjustePort()
	{
		if (
        ($this->GetArg('dbms') == 'mysql' || $this->GetArg('dbms') == 'postgres' || $this->GetArg('dbms') == 'db2' || $this->GetArg('dbms') == 'sybase' || $this->GetArg('dbms') == 'mssql' || $this->GetArg('dbms') == 'firebird' || $this->GetArg('dbms') == 'ibase') && 
        $this->IsArg('port') && $this->GetArg('port') != '' && $this->GetArg('server') != '')
		{
			$this->SetArg('server', $this->GetArg('server') . ":" . $this->GetArg('port'));
		}

	}//AjustePort

    /**
     * Retorna todas as conexoes
     *
     * @access  protected
     */
	function GetAllConnections()
	{
		$arr_conns = array();

		foreach ($_SESSION['nm_session']['prod_v8']['arr_ini']['PROFILE'] as $str_conn => $arr_conn)
		{
			$arr_conns[$this->obj_conn->DbType($arr_conn['VAL_TYPE'])][] = $str_conn;
		}

        return $arr_conns;

	}//GetAllConnections


    /**
     * Checa se precisa deletar
     *
     * @access  protected
     */
	function CheckDelConn()
	{
		global $nm_config;

		if ($this->IsArg('del_conn') && $this->GetArg('del_conn') != '')
		{
			$_SESSION['nm_session']['conn']['conn'] = $this->GetArg('del_conn');

			foreach ($_SESSION['nm_session']['prod_v8']['arr_ini']['PROFILE'] as $str_conn => $arr_conn)
			{
				if ($str_conn == $this->GetArg('del_conn'))
				{
					unset($_SESSION['nm_session']['prod_v8']['arr_ini']['PROFILE'][$str_conn]);
					break;
				}
			}

			$this->obj_conn->SaveConn($_SESSION['nm_session']['prod_v8']['arr_ini']);

			$this->Redirect($nm_config['url_iface'] . "admin_sys_allconections_create_wizard.php?conn_open=S", '');
		}

	}//CheckDelConn

	function GetConnection($str_conn)
	{
		$arr_ini_conn = $_SESSION['nm_session']['prod_v8']['arr_ini']['PROFILE'][$this->GetArg('conn')];

		$arr_conn	= array();
		$arr_conn['dbms']					= $arr_ini_conn['VAL_TYPE'];
		$arr_conn['host']					= $arr_ini_conn['VAL_HOST'];
		$arr_conn['user']					= $arr_ini_conn['VAL_USER'];
		$arr_conn['pass']					= $arr_ini_conn['VAL_PASS'];
		$arr_conn['base']					= $arr_ini_conn['VAL_BASE'];
		$arr_conn['schema']					= ''; //$arr_ini_conn['USE_SCHEMA'];
		$arr_conn['retrieve_schema']		= 'N';//'($arr_ini_conn['USE_SCHEMA'] != '' ? 'Y' : 'N');
		$arr_conn['postgres_encoding']		= $arr_ini_conn['POSTGRES_ENCODING'];
		$arr_conn['oracle_encoding']		= $arr_ini_conn['ORACLE_ENCODING'];
		$arr_conn['mysql_encoding']			= $arr_ini_conn['MYSQL_ENCODING'];
		$arr_conn['db2_autocommit']			= $arr_ini_conn['DB2_AUTOCOMMIT'];
		$arr_conn['db2_i5_lib']				= $arr_ini_conn['DB2_I5_LIB'];
		$arr_conn['db2_i5_naming']			= $arr_ini_conn['DB2_I5_NAMING'];
		$arr_conn['db2_i5_commit']			= $arr_ini_conn['DB2_I5_COMMIT'];
		$arr_conn['db2_i5_query_optimize']	= $arr_ini_conn['DB2_I5_QUERY_OPTIMIZE'];
		$arr_conn['decimal']				= $arr_ini_conn['VAL_SEP'];
		$arr_conn['date_separator']			= $arr_ini_conn['DATE_SEPARATOR'];
		$arr_conn['use_persistent']			= $arr_ini_conn['USE_PERSISTENT'];
        $arr_conn['use_schema']             = $arr_ini_conn['USE_SCHEMA'];
		$arr_conn['trans']					= '';
		$arr_conn['repository']			    = '';
		$arr_conn['filters'] 				= Array
										        (
										            'show_table' 		=> 'Y',
										            'show_view' 		=> 'Y',
										            'show_system' 		=> 'N',
										            'show_procedure' 	=> 'N',
										            'list' 				=> Array ()
										        );
		$arr_conn['use_ssl']		  = $arr_ini_conn['USE_SSL'];
		$arr_conn['mysql_ssl_key']	  = $arr_ini_conn['MYSQL_SSL_KEY'];
		$arr_conn['mysql_ssl_cert']	  = $arr_ini_conn['MYSQL_SSL_CERT'];
		$arr_conn['mysql_ssl_capath'] = $arr_ini_conn['MYSQL_SSL_CAPATH'];
		$arr_conn['mysql_ssl_ca']	  = $arr_ini_conn['MYSQL_SSL_CA'];
		$arr_conn['mysql_ssl_cipher'] = $arr_ini_conn['MYSQL_SSL_CIPHER'];
		
		return $arr_conn;

	}
}

?>