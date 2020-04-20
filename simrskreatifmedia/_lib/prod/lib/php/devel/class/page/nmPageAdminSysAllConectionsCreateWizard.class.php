<?php

/* Classes ancestrais */
nm_load_class('page', 'Page');

/* Definicao da classe */
class nmPageAdminSysAllConectionsCreateWizard extends nmPage
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

   /**
     * Repositorio
     *
     * Pega a lista de repositorios existentes
     * @access  protected
     */
    function getRepositorios()
    {
    	return array();
    }

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
        $this->Ajax();
        $this->SetBody('nmPage');
        $this->SetMargin(10);
        $this->SetPage('AdminSysAllConectionsCreateWizard');
		$this->CheckLogin();
        $this->SetPageSubtitle('');

    } // nmPageMenu

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

        $nm_template->Display('body_msg');
		
        $nm_template->Display('body_admin_sys_allconections_create_wizard_'.$this->str_page);

    } // DisplayContent

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
      global $nm_template, $nm_lang, $nm_config;

      if ($this->FormSent('create'))
      {

        if(empty($this->errors))
        {
          $this->str_page = $this->getArg('nextstep');
        }
        else
        {
          $this->str_page = $this->getArg('step');
        }

        switch($this->str_page)
        {
          case 'sgdb':
              $arr_steps = $this->GetSteps();
              $this->str_page = $arr_steps[0];

              $nm_template->SetVar('db_dbms_short', $this->obj_conn->GetSGBDS());
          break;
          case 'sgdb2':

          	$this->setDefaultValues();

            $arr_sgdb = $this->obj_conn->GetSGBDVersions();

            if(count($arr_sgdb[$_SESSION['nm_session']['connection']['wizard']['dbms']]) > 0) //> 1)
            {
              $nm_template->SetVar('db_sgdb', $arr_sgdb[$_SESSION['nm_session']['connection']['wizard']['dbms']]);
              break;
            }elseif($this->getArg('step') == "dados_rep" && count($arr_sgdb[$_SESSION['nm_session']['connection']['wizard']['dbms']]) == 1)
            {
              	$arr_steps = $this->GetSteps();
                $this->str_page = $arr_steps[0];
				$nm_template->SetVar('db_dbms_short', $this->obj_conn->GetSGBDVersions());
            }else
            {
            	$_SESSION['nm_session']['connection']['wizard']['sgdb'] = $_SESSION['nm_session']['connection']['wizard']['dbms'];
              	$this->str_page = $this->GetNextStep();
            }
          case 'dados_rep':

            $conHas = array();
            $conHas['server'] = 'S';
            $conHas['base']   = 'S';
            $conHas['rep']    = 'S';
            $conHas['schema'] = 'N';
            $conHas['db2']    = 'N';
            switch($_SESSION['nm_session']['connection']['wizard']['dbms'])
            {
              case 'sqlite':
                $conHas['base'] = 'N';
                $nm_lang['label']['server'] = $nm_lang['label']['sqlite'];
                $nm_lang['create_conn_wizard']['descricoes']['server'] = $nm_lang['create_conn_wizard']['descricoes']['sqlite'];
              break;
              case 'ibase':
                $nm_lang['label']['server'] = $nm_lang['label']['ibase'];
                $nm_lang['create_conn_wizard']['descricoes']['server'] = $nm_lang['create_conn_wizard']['descricoes']['ibase'];
                $conHas['base'] = 'N';
                break;
              case 'odbc':
              case 'vfp':
              case 'progress':
                    $nm_lang['create_conn_wizard']['descricoes']['server'] = $nm_lang['create_conn_wizard']['descricoes']['odbc'];
	                $nm_lang['label']['server'] = $nm_lang['label']['odbc'];
	                $conHas['base'] = 'N';
              break;
              case 'access':
                if($_SESSION['nm_session']['connection']['wizard']['sgdb']=="access")
                {
                  $nm_lang['label']['server'] = $nm_lang['label']['odbc'];
                  $nm_lang['create_conn_wizard']['descricoes']['server'] = $nm_lang['create_conn_wizard']['descricoes']['odbc'];
                  $conHas['base'] = 'N';
                }elseif($_SESSION['nm_session']['connection']['wizard']['sgdb']=="ado_access" || $_SESSION['nm_session']['connection']['wizard']['sgdb']=="ace_access")
                {
                  $nm_lang['label']['server'] = $nm_lang['label']['access'];
                  $nm_lang['create_conn_wizard']['descricoes']['server'] = $nm_lang['create_conn_wizard']['descricoes']['access'];
                  $conHas['base'] = 'N';
                }
              break;
              case 'mssql':
                  if($_SESSION['nm_session']['connection']['wizard']['sgdb']=="odbc_mssql")
                  {
                    $nm_lang['label']['server'] = $nm_lang['label']['odbc'];
                    $conHas['base'] = 'N';
                  }
              break;
              case 'db2':
              	  $conHas['schema'] = 'S';
              	  $conHas['db2']    = 'S';

				  if(!defined("DB2_AUTOCOMMIT_ON"))
				  {
				    define("DB2_AUTOCOMMIT_ON", "");
				  }
				  if(!defined("DB2_AUTOCOMMIT_OFF"))
				  {
				    define("DB2_AUTOCOMMIT_OFF", "");
				  }
				  if(!defined("DB2_I5_NAMING_ON"))
				  {
				    define("DB2_I5_NAMING_ON", "");
				  }
				  if(!defined("DB2_I5_NAMING_OFF"))
				  {
				    define("DB2_I5_NAMING_OFF", "");
				  }
				  if(!defined("DB2_I5_TXN_NO_COMMIT"))
				  {
				    define("DB2_I5_TXN_NO_COMMIT", "");
				  }
				  if(!defined("DB2_I5_TXN_READ_UNCOMMITTED"))
				  {
				    define("DB2_I5_TXN_READ_UNCOMMITTED", "");
				  }
				  if(!defined("DB2_I5_TXN_READ_COMMITTED"))
				  {
				    define("DB2_I5_TXN_READ_COMMITTED", "");
				  }
				  if(!defined("DB2_I5_TXN_REPEATABLE_READ"))
				  {
				    define("DB2_I5_TXN_REPEATABLE_READ", "");
				  }
				  if(!defined("DB2_I5_TXN_SERIALIZABLE"))
				  {
				    define("DB2_I5_TXN_SERIALIZABLE", "");
				  }
				  if(!defined("DB2_FIRST_IO"))
				  {
				    define("DB2_FIRST_IO", "");
				  }
				  if(!defined("DB2_ALL_IO"))
				  {
				    define("DB2_ALL_IO", "");
				  }

                  if($_SESSION['nm_session']['connection']['wizard']['sgdb']=="odbc_db2" ||
                     $_SESSION['nm_session']['connection']['wizard']['sgdb']=="odbc_db2v6")
                  {
                  	$nm_lang['create_conn_wizard']['descricoes']['server'] = $nm_lang['create_conn_wizard']['descricoes']['odbc'];
                    $nm_lang['label']['server'] = $nm_lang['label']['odbc'];
                    $conHas['base'] = 'N';
                    $conHas['db2']  = 'N';
                  }
              break;
              case 'oracle':
                $nm_lang['create_conn_wizard']['descricoes']['base'] = $nm_lang['create_conn_wizard']['descricoes']['oracle'];
                $nm_lang['label']['base'] = $nm_lang['label']['oracle'];
                $conHas['server'] = 'N';
              break;
            }

            $nm_template->SetVar('repositorios', $this->getRepositorios());
            $nm_template->SetVar('conHas', $conHas);
          break;
          case 'dados_usu':
            $arr_fields = array();
            $arr_fields['dbms']                  = $_SESSION['nm_session']['connection']['wizard']['sgdb'];
            $arr_fields['host']                  = $_SESSION['nm_session']['connection']['wizard']['server'];
            $arr_fields['base']                  = $_SESSION['nm_session']['connection']['wizard']['base'];
            $arr_fields['schema']                = $_SESSION['nm_session']['connection']['wizard']['schema'];
            $arr_fields['decimal']               = $_SESSION['nm_session']['connection']['wizard']['decimal'];
            $arr_fields['repository']            = $_SESSION['nm_session']['connection']['wizard']['rep'];
            $arr_fields['conn']                  = $_SESSION['nm_session']['connection']['wizard']['conn'];
            $arr_fields['retrieve_schema']       = $_SESSION['nm_session']['connection']['wizard']['retrieve_schema'];
            $arr_fields['date_separator']        = $_SESSION['nm_session']['connection']['wizard']['date_separator'];
            $arr_fields['use_persistent']        = $_SESSION['nm_session']['connection']['wizard']['use_persistent'];
            $arr_fields['use_schema']            = $_SESSION['nm_session']['connection']['wizard']['use_schema'];
            $arr_fields['postgres_encoding']     = $_SESSION['nm_session']['connection']['wizard']['postgres_encoding'];
            $arr_fields['oracle_encoding']       = $_SESSION['nm_session']['connection']['wizard']['oracle_encoding'];
            $arr_fields['mysql_encoding']        = $_SESSION['nm_session']['connection']['wizard']['mysql_encoding'];
            $arr_fields['db2_autocommit']        = $_SESSION['nm_session']['connection']['wizard']['db2_autocommit'];
            $arr_fields['db2_i5_lib']            = $_SESSION['nm_session']['connection']['wizard']['db2_i5_lib'];
            $arr_fields['db2_i5_naming']         = $_SESSION['nm_session']['connection']['wizard']['db2_i5_naming'];
            $arr_fields['db2_i5_commit']         = $_SESSION['nm_session']['connection']['wizard']['db2_i5_commit'];
            $arr_fields['db2_i5_query_optimize'] = $_SESSION['nm_session']['connection']['wizard']['db2_i5_query_optimize'];
            $arr_fields['use_ssl']          = $_SESSION['nm_session']['connection']['wizard']['use_ssl'];
            $arr_fields['mysql_ssl_key']    = $_SESSION['nm_session']['connection']['wizard']['mysql_ssl_key'];
            $arr_fields['mysql_ssl_cert']   = $_SESSION['nm_session']['connection']['wizard']['mysql_ssl_cert'];
            $arr_fields['mysql_ssl_capath'] = $_SESSION['nm_session']['connection']['wizard']['mysql_ssl_capath'];
            $arr_fields['mysql_ssl_ca']     = $_SESSION['nm_session']['connection']['wizard']['mysql_ssl_ca'];
            $arr_fields['mysql_ssl_cipher'] = $_SESSION['nm_session']['connection']['wizard']['mysql_ssl_cipher'];

            $nm_template->SetVar('arr_fields', $arr_fields);
          break;
          case 'testar':
            $arr_fields = array();
            $arr_fields['dbms']                  = $_SESSION['nm_session']['connection']['wizard']['sgdb'];
            $arr_fields['host']                  = $_SESSION['nm_session']['connection']['wizard']['server'];
            $arr_fields['user']                  = $_SESSION['nm_session']['connection']['wizard']['user'];
            $arr_fields['pass']                  = $_SESSION['nm_session']['connection']['wizard']['pass'];
            $arr_fields['base']                  = $_SESSION['nm_session']['connection']['wizard']['base'];
            $arr_fields['schema']                = $_SESSION['nm_session']['connection']['wizard']['schema'];
            $arr_fields['retrieve_schema']       = $_SESSION['nm_session']['connection']['wizard']['retrieve_schema'];
            $arr_fields['date_separator']        = $_SESSION['nm_session']['connection']['wizard']['date_separator'];
            $arr_fields['use_persistent']        = $_SESSION['nm_session']['connection']['wizard']['use_persistent'];
            $arr_fields['use_schema']            = $_SESSION['nm_session']['connection']['wizard']['use_schema'];
            $arr_fields['postgres_encoding']     = $_SESSION['nm_session']['connection']['wizard']['postgres_encoding'];
            $arr_fields['oracle_encoding']       = $_SESSION['nm_session']['connection']['wizard']['oracle_encoding'];
            $arr_fields['mysql_encoding']        = $_SESSION['nm_session']['connection']['wizard']['mysql_encoding'];
            $arr_fields['db2_autocommit']        = $_SESSION['nm_session']['connection']['wizard']['db2_autocommit'];
            $arr_fields['db2_i5_lib']            = $_SESSION['nm_session']['connection']['wizard']['db2_i5_lib'];
            $arr_fields['db2_i5_naming']         = $_SESSION['nm_session']['connection']['wizard']['db2_i5_naming'];
            $arr_fields['db2_i5_commit']         = $_SESSION['nm_session']['connection']['wizard']['db2_i5_commit'];
            $arr_fields['db2_i5_query_optimize'] = $_SESSION['nm_session']['connection']['wizard']['db2_i5_query_optimize'];
            $arr_fields['decimal']               = $_SESSION['nm_session']['connection']['wizard']['decimal'];
            $arr_fields['repository']            = ''; //$_SESSION['nm_session']['connection']['wizard']['rep'];
			
            $arr_fields['use_ssl']               = $_SESSION['nm_session']['connection']['wizard']['use_ssl'];
            $arr_fields['mysql_ssl_key']         = $_SESSION['nm_session']['connection']['wizard']['mysql_ssl_key'];
            $arr_fields['mysql_ssl_cert']        = $_SESSION['nm_session']['connection']['wizard']['mysql_ssl_cert'];
            $arr_fields['mysql_ssl_capath']      = $_SESSION['nm_session']['connection']['wizard']['mysql_ssl_capath'];
            $arr_fields['mysql_ssl_ca']          = $_SESSION['nm_session']['connection']['wizard']['mysql_ssl_ca'];
            $arr_fields['mysql_ssl_cipher']      = $_SESSION['nm_session']['connection']['wizard']['mysql_ssl_cipher'];
			
            $arr_fields['conn']                  = $_SESSION['nm_session']['connection']['wizard']['conn'];
			
            $this->SaveConections($arr_fields);
			$this->delSession();

			if ($this->IsArg('edit_conn') && $this->GetArg('edit_conn') == 'S')
			{
				$this->Redirect($nm_config['url_iface'] . 'admin_sys_allconections_create_wizard.php?conn_open=S', '');
			}
			else
			{
				$this->Redirect($nm_config['url_iface'] . 'admin_sys_allconections_create_wizard.php', '');
			}
          break;
        }
        }
        else
        {
          $this->iniSession();
          $arr_steps = $this->GetSteps();
          $this->str_page = $arr_steps[0];

          $nm_template->SetVar('db_dbms_short', $this->obj_conn->GetSGBDS());
        }
        $nm_template->SetVar('btn_avanc', $this->GetNextStep());
        $nm_template->SetVar('btn_retor', $this->GetPreviousStep());
        $nm_template->SetVar('step', $this->str_page);

        $this->setVarSession();

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
        global $nm_config, $nm_lang;

        $str_js  = " var bln_test = true; \n";

        $str_js .= "  function setStep(str_step)\n";
        $str_js .= "  {\n";
        $str_js .= "   if (str_step == 'cancel' && !confirm('". conv_utf8_all(html_entity_decode($nm_lang['msg_cancel_create_conn']))."')) \n";
        $str_js .= "   {\n";
        $str_js .= "      return; \n";
        $str_js .= "   }\n";
        $str_js .= "   document.form_create.action = \"". nm_url_rand($nm_config['url_iface'] . 'admin_sys_allconections_create_wizard.php') ."\"; \n";
        $str_js .= "   document.form_create.nextstep.value=str_step;\n";
        $str_js .= "   document.form_create.submit();\n";
        $str_js .= "  }\n";
        $this->AddJavascript($str_js);

        $str_js .= "  function fc_cancel_edit()\n";
        $str_js .= "  {\n";
        //$str_js .= "   if (confirm('". conv_utf8_all(html_entity_decode($nm_lang['msg_cancel_create_conn']))."')) \n";
        //$str_js .= "   {\n";
        $str_js .= "      document.frm_back_edit.submit(); \n";
        //$str_js .= "   }\n";
        $str_js .= "  }\n";
        $this->AddJavascript($str_js);

        $str_js  = "  function mostraId(str_id)\n";
        $str_js .= "  {\n";
        $str_js .= "    document.getElementById(str_id).style.display='';\n";
        $str_js .= "  }\n";
        $this->AddJavascript($str_js);

        $str_js  = "  function escondeId(str_id)\n";
        $str_js .= "  {\n";
        $str_js .= "    document.getElementById(str_id).style.display='none';\n";
        $str_js .= "  }\n";
        $this->AddJavascript($str_js);

        $str_js  = "  function nm_test()\n";
        $str_js .= "  {\n";
        $str_js .= "    if (document.form_create.pass.value != document.form_create.pass_confirm.value) \n";
        $str_js .= "    {\n";
        $str_js .= "   		alert(\"" . conv_utf8_all(html_entity_decode($nm_lang['create_conn_wizard']['erro']['pass_confirm'])) . "\");\n";
        $str_js .= "        return;\n";
        $str_js .= "    }\n";
        $str_js .= "    document.test_conn.action = \"" . $nm_config['url_iface'] .  "admin_sys_allconections_test.php?rand=\"+Math.random();\n";
        $str_js .= "    document.test_conn.target = 'testaconn';\n";
        $str_js .= "    document.test_conn.user.value = document.form_create.user.value;\n";
        $str_js .= "    document.test_conn.pass.value = document.form_create.pass.value;\n";
        $str_js .= "    document.test_conn.submit();\n";
        $str_js .= "    document.getElementById('id_test_conn').style.display='';\n";
        $str_js .= "  }\n";
        $this->AddJavascript($str_js);

        $str_js  = "  function nm_help_conn()\n";
        $str_js .= "  {\n";
        //$str_js .= "   nm_window_manual(\"" . $this->getManual('tut_bases', 'NM_ADMIN') . "\");\n";
        $str_js .= "  }\n";
        $this->AddJavascript($str_js);

        $str_js  = "  function nm_sel_tp_conn(str_tp_conn)\n";
        $str_js .= "  {\n";
        $str_js .= "  	sel_tp_conn = document.getElementById('tp_dbms');	\n";
        $str_js .= "  	for(nI = 0; nI < sel_tp_conn.options.length; nI++)\n";
        $str_js .= "  	{\n";
        $str_js .= "  		if (sel_tp_conn.options[nI].value == str_tp_conn)\n";
        $str_js .= "  		{\n";
        $str_js .= "  			sel_tp_conn.selectedIndex = nI;\n";
        $str_js .= "  			break; \n";
        $str_js .= "  		}\n";
        $str_js .= "  	}\n";
        $str_js .= "  }\n";
        $this->AddJavascript($str_js);

        $str_js  = "var bln_advanced = false;\n";
        $str_js .= "function nm_show_more()\n";
        $str_js .= "{\n";
        $str_js .= "	$('#id_test_conn').hide();\n";
        $str_js .= "	if (!bln_advanced)\n";
        $str_js .= "	{\n";
        $str_js .= "		$('#img_seta_down').hide();\n";
        $str_js .= "		$('#img_seta_up').show();\n";
        $str_js .= "		$('#tr_more_info').show();\n";
        $str_js .= "		$('#tr_more_dados_rep').show();	\n";
        $str_js .= "		bln_advanced = true;\n";
        $str_js .= "	}\n";
        $str_js .= "	else\n";
        $str_js .= "	{\n";
        $str_js .= "		$('#img_seta_up').hide();\n";
        $str_js .= "		$('#img_seta_down').show();	\n";
        $str_js .= "		$('#tr_more_info').hide();\n";
        $str_js .= "		$('#tr_more_dados_rep').hide();\n";
        $str_js .= "		bln_advanced = false;\n";
        $str_js .= "	}\n";
        $str_js .= "}\n";
		$this->AddJavascript($str_js);

        $str_js  = "function fc_ajust_port()\n";
        $str_js .= "{ return; \n";
        $str_js .= "}\n";
		$this->AddJavascript($str_js);

		$str_js  = "first_time = 'S';\n";
        $str_js .= "function nm_post_conn_ajax(str_start)\n";
        $str_js .= "{\n";
        $str_js .= "    $('#carregar_db').val('S'); \n";
        $str_js .= "    if (bln_advanced) \n";
        $str_js .= "	{\n";
        $str_js .= "		nm_show_more();\n";
        $str_js .= "	}\n";
        $str_js .= "	fc_show_filter(false, false); \n";
        $str_js .= "	$('#id_test_conn').hide();\n";
        $str_js .= "	$('#tr_more_dados_rep').hide();	\n";
        $str_js .= "	$('#td_dados_rep').hide(); \n";
        $str_js .= "	$('#td_dados_usu').hide();\n";
        $str_js .= "	$('#tr_more_dados_rep').hide();\n";
        $str_js .= "	$('#td_load_ajax').show();\n";
        $str_js .= "	$('#tab_more').show();\n";
        $str_js .= "	str_dados_form = ''; \n";
        $str_js .= "	for (nI = 0; nI <= document.form_create.elements.length; nI++)\n";
        $str_js .= "	{\n";
        $str_js .= "		if (document.form_create.elements[nI] && document.form_create.elements[nI].value && \n";
        $str_js .= "			document.form_create.elements[nI].name != '' && document.form_create.elements[nI].name != 'conn')\n";
        $str_js .= "		{ \n";
        $str_js .= "			if (document.form_create.dbms.value == 'mysql' || document.form_create.dbms.value == 'postgres' || document.form_create.dbms.value == 'sybase'  || document.form_create.dbms.value == 'db2' || document.form_create.dbms.value == 'db2' || document.form_create.dbms.value == 'firebird' || document.form_create.dbms.value == 'ibase' || document.form_create.dbms.value == 'mssql') \n";
        $str_js .= "		    {  \n";
        $str_js .= "		    	if (document.form_create.elements[nI].name == 'port') \n";
        $str_js .= "		    	{  \n";
        $str_js .= "		    		continue;  \n";
        $str_js .= "		    	}  \n";
        $str_js .= "		    	else if (document.form_create.elements[nI].name == 'server' && \n";
        $str_js .= "		    	        document.form_create.port && document.form_create.port.value != '' && document.form_create.port.value != '0')  \n";
        $str_js .= "		    	{  \n";
        $str_js .= "		    		document.form_create.elements[nI].value += ':' + document.form_create.port.value;  \n";
        $str_js .= "		    	}  \n";
        $str_js .= "		    }  \n";
        $str_js .= "		    if(document.form_create.elements[nI].type == 'checkbox' && document.form_create.elements[nI].checked == false)  \n";
        $str_js .= "		    {  \n";
        $str_js .= "		    		continue;  \n";
        $str_js .= "		    }  \n";
        $str_js .= "			str_dados_form += '&' + document.form_create.elements[nI].name + '=' + escape(document.form_create.elements[nI].value);\n";
        $str_js .= "		}\n";
        $str_js .= "	}\n";
        $str_js .= "	$.ajax({\n";
        $str_js .= "            type: 'POST',\n";
        $str_js .= "            url: '" . $nm_config['url_iface'] . 'admin_sys_allconections_create_wizard.php' ."',\n";
        $str_js .= "            data: 'ajax=S' + str_dados_form,\n";
        $str_js .= "            success: function(html_retorno)\n";
        $str_js .= "            {\n";
        $str_js .= "            	arr_html_retorno = html_retorno.split('__#$' + '@' + '$#__');\n";
        $str_js .= "            	$('#td_dados_rep').html(\"<table border='0' width='100%'>\" + arr_html_retorno[1] + \"</table>\");\n";
        $str_js .= "			    if (arr_html_retorno[2].length > 100)\n";
        $str_js .= "				{\n";
        $str_js .= "					$('#td_more_dados_rep').html(\"<table border='0' width='100%' style=''>\" + arr_html_retorno[2] + \"</table>\");\n";
        $str_js .= "					if ($('#tr_more_info').css('display') != 'none')\n";
        $str_js .= "					{\n";
        $str_js .= "						$('#tr_more_dados_rep').show();\n";
        $str_js .= "					}\n";
        $str_js .= "				}	\n";
        $str_js .= "            	else \n";
        $str_js .= "            	{\n";
        $str_js .= "            		$('#td_more_dados_rep').html('');\n";
        $str_js .= "            	}\n";
        $str_js .= "            	$('#td_load_ajax').hide();\n";
        $str_js .= "            	$('#td_dados_rep').show(); \n";
        $str_js .= "				$('#td_dados_usu').show(); \n";
        $str_js .= "            	if (str_start != null && str_start == 'S' && $('#dbms').val() == 'mysql' && $('#server').val() != '' && $('#user').val() != '' && ($('#pass').val() != '' || ($('#pass').val() == '' && first_time == 'S'))) \n";
        $str_js .= "            	{\n";
		$str_js .= "            	    if($('#pass').val() == '' && first_time == 'S')\n";
        $str_js .= "            	    {\n";
		$str_js .= "            		    fc_get_db($('#base').val(), 'S'); \n";
		$str_js .= "            		    setConnCharset($('#base').val()); \n";
		$str_js .= "            		    first_time = 'N'; \n";
        $str_js .= "            	    }\n";
        $str_js .= "            	    else\n";
        $str_js .= "            	    {\n";
		$str_js .= "            		    fc_get_db($('#base').val(), 'N'); \n";
		$str_js .= "            		    //setConnCharset($('#base').val()); \n";
        $str_js .= "            	    }\n";
        $str_js .= "            	}\n";
        $str_js .= "            }\n";
        $str_js .= "        });\n";
        $str_js .= "}\n";
		$this->AddJavascript($str_js);

        $str_js  = "function nm_test_conn()\n";
        $str_js .= "{\n";
        $str_js .= "	if (!bln_test) return; \n";
        $str_js .= "	$('#span_msg_err_test_auto').hide();  \n";
        $str_js .= "	$('#span_iframe_test_conn').hide();\n";
        $str_js .= "	$('#span_load_ajax_test_conn').show();	\n";
        $str_js .= "	document.test_conn.action = '". $nm_config['url_iface'] . "admin_sys_allconections_test.php?rand=' + Math.random();\n";
        $str_js .= "	document.test_conn.target = 'testaconn'; \n";
        $str_js .= "	str_objs_form = '';\n";
        $str_js .= "	for (nI = 0; nI <= document.form_create.elements.length; nI++)\n";
        $str_js .= "	{\n";
        $str_js .= "		if (document.form_create.elements[nI] && document.form_create.elements[nI].value && document.form_create.elements[nI].name != '')\n";
        $str_js .= "		{\n";
        $str_js .= "			if (document.form_create.elements[nI].name == 'server')\n";
        $str_js .= "			{\n";
		$str_js .= "				str_ser = document.form_create.elements[nI].value; \n";
        $str_js .= "				if (document.form_create.dbms.value == 'mysql' || document.form_create.dbms.value == 'postgres' || document.form_create.dbms.value == 'sybase' || document.form_create.dbms.value == 'db2' || document.form_create.dbms.value == 'db2' || document.form_create.dbms.value == 'firebird' || document.form_create.dbms.value == 'ibase' || document.form_create.dbms.value == 'mssql') \n";
        $str_js .= "				{  \n";
		$str_js .= "	    			if (document.form_create.port && document.form_create.port.value != '' && document.form_create.port.value != '0') \n";
        $str_js .= "					{  \n";
        $str_js .= "						str_ser += ':' + document.form_create.port.value;  \n";
        $str_js .= "					}  \n";
        $str_js .= "				} \n";
        $str_js .= "				str_objs_form += \"<input type='hidden' name='host' value='\" + str_ser + \"' />\";\n";
        $str_js .= "			}\n";
        $str_js .= "			else if (document.form_create.elements[nI].name == 'sgdb')\n";
        $str_js .= "			{\n";
        $str_js .= "				str_objs_form += \"<input type='hidden' name='dbms' value='\" + document.form_create.elements[nI].value + \"' />\";\n";
        $str_js .= "			}\n";
		$str_js .= "			if (document.form_create.elements[nI].name == 'use_ssl' && document.getElementById('use_ssl').checked != true)\n";
        $str_js .= "			{\n";
        $str_js .= "			    continue; \n";
        $str_js .= "			}\n";        
        $str_js .= "			if (document.form_create.elements[nI].name != 'sgdb')\n";
        $str_js .= "			{\n";
        $str_js .= "				str_objs_form += \"<input type='hidden' name='\" + document.form_create.elements[nI].name + \"' value='\" + document.form_create.elements[nI].value + \"' />\"; \n";
        $str_js .= "			}\n";
        $str_js .= "		}\n";
        $str_js .= "	}	\n";
		$str_js .= "	$('#id_test_conn').show();\n";
		$str_js .= "	$('#div_form_conn_test').html(str_objs_form);\n";
		$str_js .= "	document.test_conn.submit();	\n";
		
        $str_js .= "}  \n";
		$this->AddJavascript($str_js);

		$str_js  = "function nm_salvar_conn()\n";
		$str_js .= "{  \n";
		$str_js .= "	if (document.form_create.dbms.value == 'mysql' && document.form_create.server && document.form_create.server.value == '') \n";
		$str_js .= "	{  \n";
		$str_js .= "		alert(\"". conv_utf8_all(html_entity_decode($nm_lang['msg_err_server_empty'])) ."\");  \n";
		$str_js .= "		document.form_create.server.focus();  \n";
		$str_js .= "		return;  \n";
		$str_js .= "	}  \n";
		$str_js .= "	if (document.form_create.dbms.value == 'mysql' && document.form_create.user && document.form_create.user.value == '') \n";
		$str_js .= "	{  \n";
		$str_js .= "		alert(\"". conv_utf8_all(html_entity_decode($nm_lang['msg_err_user_empty'])) ."\");  \n";
		$str_js .= "		document.form_create.user.focus();  \n";
		$str_js .= "		return;  \n";
		$str_js .= "	}  \n";
		$str_js .= "	document.getElementById('tr_advanced').style.display = 'none';	\n";
		$str_js .= "	document.getElementById('tr_principal').style.display = 'none';	\n";
		$str_js .= "	document.getElementById('bt_nav_1').style.display = 'none';	\n";
		$str_js .= "	document.getElementById('tr_title_extra').style.display = '';	\n";
		$str_js .= "  	document.getElementById('span_save_conn').innerHTML = 'S'; 	\n";
        $str_js .= "	nm_test_conn();\n";
        $str_js .= "}  \n";
		$this->AddJavascript($str_js);

		$str_js  = "function fc_back_save()\n";
		$str_js .= "{  \n";
		$str_js .= "	$('#id_test_conn').hide();\n";
		$str_js .= "	document.getElementById('tr_title_extra').style.display = 'none';	\n";
		$str_js .= "	document.getElementById('bt_nav_2').style.display = 'none';	\n";
		$str_js .= "	document.getElementById('tr_advanced').style.display = '';	\n";
		$str_js .= "	document.getElementById('tr_principal').style.display = '';	\n";
		$str_js .= "	document.getElementById('bt_nav_1').style.display = '';	\n";
		$str_js .= "  	document.getElementById('span_save_conn').innerHTML = ''; 	\n";
        $str_js .= "}  \n";
		$this->AddJavascript($str_js);

        $str_js  = "function nm_back_test_conn()\n";
        $str_js .= "{	\n";
        $str_js .= "	$('#bt_back_test_conn').hide();\n";
        $str_js .= "	$('#id_test_conn').hide();\n";
        $str_js .= "	$('#tab_new_conn').show();\n";
        $str_js .= "	$('#img_bt_test_conn').show();	\n";
        $str_js .= "	$('#bt_back_sel_conn').show();\n";
        $str_js .= "}  \n";
        $this->AddJavascript($str_js);

        $str_js  = "function fc_show_filter(bln_show, bln_call_advanced)\n";
        $str_js .= "{\n";
        $str_js .= "	if (bln_show)\n";
        $str_js .= "	{\n";
        $str_js .= "		$('#tr_dados_usu').hide(); \n";
        $str_js .= "		$('#tr_load_ajax').hide();\n";
        $str_js .= "		$('#tr_dados_rep').hide();\n";
        $str_js .= "		$('#tr_advanced').hide();\n";
        $str_js .= "        if (bln_advanced) \n";
        $str_js .= "        {\n";
        $str_js .= "        	nm_show_more(); \n";
        $str_js .= "        }\n";
        $str_js .= "        $('#tab_sep_bt').show();\n";
        $str_js .= "        $('#tr_filter').show();\n";
        $str_js .= "	}\n";
        $str_js .= "	else\n";
        $str_js .= "	{\n";
        $str_js .= "        $('#tab_sep_bt').hide();\n";
        $str_js .= "        $('#tr_filter').hide(); \n";
        $str_js .= "		$('#tr_dados_usu').show();\n";
        $str_js .= "		$('#tr_load_ajax').show();\n";
        $str_js .= "		$('#tr_dados_rep').show();\n";
        $str_js .= "		$('#tr_advanced').show();\n";
        $str_js .= "		if (!bln_advanced && bln_call_advanced)\n";
        $str_js .= "		{\n";
        $str_js .= "			nm_show_more(); \n";
        $str_js .= "		}\n";
        $str_js .= "	}\n";
        $str_js .= "} \n";
        $this->AddJavascript($str_js);

        $str_js  = "function fc_get_db(nome_db, first_time)\n";
        $str_js .= "{   \n";
        $str_js .= "    if ($('#carregar_db').val() == 'N') return;   \n";
        $str_js .= "	bln_test = false; \n";
        $str_js .= "	host = $('#server').val() + ($('#port').val() != '' ? (':' + $('#port').val()) : ''); \n";
        $str_js .= "	host = protectAjaxChar(host); \n";
        $str_js .= "	usr  = protectAjaxChar($('#user').val()); \n";
        $str_js .= "	pwd  = protectAjaxChar($('#pass').val()); \n";
        $str_js .= "	db   = nome_db != null ? protectAjaxChar(nome_db) : ''; \n";
        $str_js .= "	driver   = protectAjaxChar($('select[name=sgdb]').val()); \n";
        $str_js .= "	$('#span_sel_database_name').html(\"<select class='nmInput' disabled style='width:122px'><option>". htmlentities($nm_lang['lbl_loading']) ."...</option></select>\");  \n";
        $str_js .= "  str_add_parameters = '';\n";
        $str_js .= "  if($('#dbms').val() == 'mysql' && $('#use_ssl:checked').length>0 && $('#use_ssl:checked').val()=='Y')\n";
        $str_js .= "  {\n";
        $str_js .= "      str_add_parameters +='&use_ssl='+$('#use_ssl:checked').val();\n";
        $str_js .= "      str_add_parameters +='&mysql_ssl_key='+$('#mysql_ssl_key').val();\n";
        $str_js .= "      str_add_parameters +='&mysql_ssl_cert='+$('#mysql_ssl_cert').val();\n";
        $str_js .= "      str_add_parameters +='&mysql_ssl_capath='+$('#mysql_ssl_capath').val();\n";
        $str_js .= "      str_add_parameters +='&mysql_ssl_ca='+$('#mysql_ssl_ca').val();\n";
        $str_js .= "      str_add_parameters +='&mysql_ssl_cipher='+$('#mysql_ssl_cipher').val();\n";
        $str_js .= "  }\n";
		    $str_js .= "	$.ajax({\n";
        $str_js .= "            type: 'POST',\n";
        $str_js .= "            url: '" . $nm_config['url_iface'] . 'admin_sys_allconections_create_wizard.php' ."',\n";
        $str_js .= "            data: 'ajax=S&list_db=S&dbms='+ $('#dbms').val() +'&exit=S&host=' + escape(host) + '&usr=' + escape(usr) + '&pwd=' + escape(pwd) + '&db=' + escape(db)+ '&driver='+ driver +'&first_time=' + first_time+str_add_parameters,\n";
        $str_js .= "            success: function(html_retorno)\n";
        $str_js .= "            {\n";
        $str_js .= "              $('#carregar_db').val('N'); \n";
        $str_js .= "            	arr_html_retorno = html_retorno.split('_#' + '@' + '#_'); \n";
        $str_js .= "            	if (arr_html_retorno[0] == 'S') \n";
        $str_js .= "            	{\n";
        $str_js .= "					      fc_hide_msg_err(); \n";
        $str_js .= "					      $('#span_sel_database_name').html(arr_html_retorno[1]); \n";
        $str_js .= "            		$('#sel_base').focus(); \n";
    		$str_js .= "            		$('#base').val($('#sel_base').val()); \n";
    		$str_js .= "            		if(arr_html_retorno[2] == 'S' || document.form_create.mysql_encoding.value == '') \n";
    		$str_js .= "            		{ \n";
    		$str_js .= "            		    setConnCharset($('#base').val()); \n";
    		$str_js .= "            		} \n";
        $str_js .= "            	}\n";
        $str_js .= "            	else\n";
        $str_js .= "            	{\n";
        $str_js .= "                $('#span_sel_database_name').html(\"<select class='nmInput' style='width:122px' onfocus='fc_get_db();'><option>&nbsp;</option></select>\");  \n";
        $str_js .= "            		if (nome_db == null)  \n";
        $str_js .= "            		{\n";
        $str_js .= "                  if(typeof arr_html_retorno[1] === 'undefined')\n";
        $str_js .= "                  {\n";
        $str_js .= "                      str_error_msg = arr_html_retorno;\n";
        $str_js .= "                  }\n";
        $str_js .= "                  else\n";
        $str_js .= "                  {\n";
        $str_js .= "                      str_error_msg = arr_html_retorno[1];\n";
        $str_js .= "                  }\n";
        $str_js .= "            			$('#span_iframe_test_conn').hide();  \n";
        $str_js .= "            			$('#span_load_ajax_test_conn').hide();  \n";
        $str_js .= "						      $('#span_msg_err_test_auto').hide();  \n";
        $str_js .= "            			$('#id_test_conn').show();  \n";
        $str_js .= "            			$('#span_msg_err_test_auto').show();  \n";
        $str_js .= "            			$('#td_msg_erro').html('". $nm_lang['msg_conn_erro'] ."<br><br>' + str_error_msg); \n";
        $str_js .= "            		}\n";
        $str_js .= "            	}\n";
        $str_js .= "				bln_test = true; \n";
        $str_js .= "            }, \n";
        $str_js .= "            error: function(data) { bln_test = true; /*alert('erro');*/ } \n";
        $str_js .= "        });  \n";
        $str_js .= "}\n";
		$this->AddJavascript($str_js);
		
		$str_js  = "function setConnCharset(db)\n";
        $str_js .= "{\n";
        $str_js .= "  if(db != '')\n";
        $str_js .= "  {\n";
        $str_js .= "	if(document.form_create.mysql_encoding) \n";
        $str_js .= "	{\n";
        $str_js .= "	  host = $('#server').val() + ($('#port').val() != '' ? (':' + $('#port').val()) : ''); \n";
        $str_js .= "	  host = protectAjaxChar(host); \n";
        $str_js .= "	  usr  = protectAjaxChar($('#user').val()); \n";
        $str_js .= "	  pwd  = protectAjaxChar($('#pass').val()); \n";
        $str_js .= "	  db   = protectAjaxChar(db); \n";
		$str_js .= "	  driver   = protectAjaxChar($('select[name=sgdb]').val()); \n";
        $str_js .= "	  $.ajax({\n";
        $str_js .= "            type: 'POST',\n";
        $str_js .= "            url: '" . $nm_config['url_iface'] . 'admin_sys_allconections_create_wizard.php' ."',\n";
        $str_js .= "            data: 'ajax=S&set_charset=S&dbms='+ $('#dbms').val() +'&sgdb='+ driver+'&exit=S&host=' + host + '&usr=' + usr + '&pwd=' + pwd + '&db=' + db,\n";
        $str_js .= "            success: function(str_return)\n";
        $str_js .= "            {\n";
        $str_js .= "            	arr_return = str_return.split('_#@#_'); \n";
        $str_js .= "            	if(arr_return[0] == 'S')\n";
        $str_js .= "            	{ \n";
        $str_js .= "            	   if(arr_return[1] != '')\n";
        $str_js .= "            	   {\n";
        $str_js .= "            	       if(document.form_create.mysql_encoding)\n";
        $str_js .= "            	       {\n";
        $str_js .= "            	           document.form_create.mysql_encoding.value = arr_return[1];\n";
		$str_js .= "            	       }\n";
		$str_js .= "            	   }\n";
        $str_js .= "            	} \n";
		$str_js .= "            }, \n";
        $str_js .= "            error: function(str_return) {  } \n";
        $str_js .= "        });  \n";
		$str_js .= "    }\n";
		$str_js .= "  }\n";
        $str_js .= "}\n";
		$this->AddJavascript($str_js);

		$str_js  = "function protectAjaxChar(str_field)\n";
        $str_js .= "{\n";
        $str_js .= "	str_field = str_field.replace('#', '__HASH__'); \n";
        $str_js .= "	str_field = str_field.replace('+', '__PLUS__'); \n";
        $str_js .= "	str_field = str_field.replace('-', '__MINUS__'); \n";
        $str_js .= "	str_field = str_field.replace('&', '__E__'); \n";
        $str_js .= "	return str_field; \n";
        $str_js .= "}\n";
		$this->AddJavascript($str_js);
		
		$str_js  = "function fc_hide_msg_err() \n";
		$str_js .= "{\n";
		$str_js .= "	$('#id_test_conn').hide();  \n";
		$str_js .= "	$('#span_msg_err_test_auto').hide();  \n";
        $str_js .= "}\n";
		$this->AddJavascript($str_js);

		$str_js = "  function nm_connection_edit(v_str_conn)\n";
		$str_js .= " {\n";
		$str_js .= "     document.form_edit_conn.conn.value = v_str_conn;\n";
		$str_js .= "     document.form_edit_conn.submit();\n";
		$str_js .= " }\n";
		$this->AddJavascript($str_js);

		/*
    	$msg_exc = html_entity_decode(nm_get_lang('OpenAppFolder', 'lbl_excl'));
    	$msg_exc = !is_utf8($msg_exc) ? mb_convert_encoding($msg_exc, "UTF-8") : $msg_exc;
		*/
		$msg_exc = $nm_lang['lbl_excl'];

		$str_js  = " function nm_del_conn(v_str_conn)\n";
		$str_js .= " {\n";
        $str_js .= "     if(confirm('". conv_utf8_all(html_entity_decode($msg_exc)) ."'))\n";
        $str_js .= "     {\n";
		$str_js .= "         document.form_del_conn.del_conn.value = v_str_conn;\n";
		$str_js .= "         document.form_del_conn.submit();\n";
		$str_js .= "     }\n";
		$str_js .= " }\n";
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
        $this->AddJs('devel', 'functions.js');
        $this->AddJs('devel', 'random.js');
        $this->AddJs('devel', 'window.js');
        $this->AddJs('third', 'jquery/js/jquery.js');
        $this->AddJs('third', 'jquery/js/jquery-ui.js');

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
    function GetListDatabaseNameMySql($host, $usr, $pwd, $driver, $v_arr_db)
    {
        $_SESSION['nm_err_num_error'] = 0;
	    $_SESSION['nm_err_str_error'] = "";

        $fc_err_old = set_error_handler("nm_err_generic");

        $use_ssl = (isset($v_arr_db['use_ssl']) && !empty($v_arr_db['use_ssl']))?$v_arr_db['use_ssl']:"";
        $arrExtraArgs = array();
        if($use_ssl == 'Y')
        {            
            $mysql_ssl_key = ($v_arr_db['mysql_ssl_key']);
            if(!empty($mysql_ssl_key))
            {
                $arrExtraArgs[ PDO::MYSQL_ATTR_SSL_KEY ] = $mysql_ssl_key;
            }
            $mysql_ssl_cert = ($v_arr_db['mysql_ssl_cert']);
            if(!empty($mysql_ssl_cert))
            {
                $arrExtraArgs[ PDO::MYSQL_ATTR_SSL_CERT ] = $mysql_ssl_cert;
            }
            $mysql_ssl_ca = ($v_arr_db['mysql_ssl_ca']);
            if(!empty($mysql_ssl_ca))
            {
                $arrExtraArgs[ PDO::MYSQL_ATTR_SSL_CA ] = $mysql_ssl_ca;
            }
            $mysql_ssl_capath = ($v_arr_db['mysql_ssl_capath']);
            if(!empty($mysql_ssl_capath))
            {
                $arrExtraArgs[ PDO::MYSQL_ATTR_SSL_CAPATH ] = $mysql_ssl_capath;
            }
            $mysql_ssl_cipher = ($v_arr_db['mysql_ssl_cipher']);
            if(!empty($mysql_ssl_cipher))
            {
                $arrExtraArgs[ PDO::MYSQL_ATTR_SSL_CIPHER ] = $mysql_ssl_cipher;
            }

            if(empty($arrExtraArgs[ PDO::MYSQL_ATTR_SSL_KEY ]) || empty($arrExtraArgs[ PDO::MYSQL_ATTR_SSL_CERT ]) || empty($arrExtraArgs[ PDO::MYSQL_ATTR_SSL_CA ]))
            {
                //dados bebos e desabiilta o mysql para verificar os certificados
                if(empty($arrExtraArgs[ PDO::MYSQL_ATTR_SSL_KEY ]))
                {
                    $arrExtraArgs[ PDO::MYSQL_ATTR_SSL_KEY ] = "client-key.pem";
                }
                if(empty($arrExtraArgs[ PDO::MYSQL_ATTR_SSL_CERT ]))
                {
                    $arrExtraArgs[ PDO::MYSQL_ATTR_SSL_CERT ] = "client-cert.pem";
                }
                if(empty($arrExtraArgs[ PDO::MYSQL_ATTR_SSL_CA ]))
                {
                    $arrExtraArgs[ PDO::MYSQL_ATTR_SSL_CA ] = "server-ca.pem";
                }
                $arrExtraArgs[ PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT ] = false;
            }
        }

        if($driver == 'pdo_mysql')
        {
          list($host, $port) = explode(':', $host);
          $conn_mysql = new PDO('mysql:host='. $host . ';port='.$port, $usr, $pwd, $arrExtraArgs);

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
          $conn_mysql = mysqli_init();

          $clientFlags = 0;
          if($use_ssl == 'Y')
          {
            $clientFlags = MYSQLI_CLIENT_SSL;

            if(empty($v_arr_db[ 'mysql_ssl_key' ]) || empty($v_arr_db[ 'mysql_ssl_cert' ]) || empty($v_arr_db[ 'mysql_ssl_ca' ]))
            {
              mysqli_options($conn_mysql, MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, false);
            }

            $mysql_ssl_key = (isset($v_arr_db['mysql_ssl_key']) && !empty($v_arr_db['mysql_ssl_key']))?$v_arr_db['mysql_ssl_key']:false;
            $mysql_ssl_cert = (isset($v_arr_db['mysql_ssl_cert']) && !empty($v_arr_db['mysql_ssl_cert']))?$v_arr_db['mysql_ssl_cert']:false;
            $mysql_ssl_ca = (isset($v_arr_db['mysql_ssl_ca']) && !empty($v_arr_db['mysql_ssl_ca']))?$v_arr_db['mysql_ssl_ca']:false;
            $mysql_ssl_capath = (isset($v_arr_db['mysql_ssl_capath']) && !empty($v_arr_db['mysql_ssl_capath']))?$v_arr_db['mysql_ssl_capath']:false;
            $mysql_ssl_cipher = (isset($v_arr_db['mysql_ssl_cipher']) && !empty($v_arr_db['mysql_ssl_cipher']))?$v_arr_db['mysql_ssl_cipher']:false;
            mysqli_ssl_set($conn_mysql, $mysql_ssl_key, $mysql_ssl_cert, $mysql_ssl_ca, $mysql_ssl_capath, $mysql_ssl_cipher);            
          }

          $ok = mysqli_real_connect($conn_mysql, $host, $usr, $pwd, false, false, false, $clientFlags);

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
          if($use_ssl == 'Y')
          {
            $conn_mysql = @mysql_connect($host, $usr, $pwd, false, MYSQL_CLIENT_SSL);
          }
          else
          {
            $conn_mysql = @mysql_connect($host, $usr, $pwd);
          }
          

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
     * Funcao ajax
     *
     * @access  protected
     */
    function Ajax()
    {
    	if (isset($_POST['ajax']) && $_POST['ajax'] == 'S')
    	{
    		if (isset($_POST['list_db']) && $_POST['list_db'] == 'S')
    		{
  				$_POST['host']   = $this->unProtectAjaxChar($_POST['host']);
  				$_POST['usr']    = $this->unProtectAjaxChar($_POST['usr']);
  				$_POST['pwd']    = $this->unProtectAjaxChar($_POST['pwd']);
  				$_POST['db']     = $this->unProtectAjaxChar($_POST['db']);
  				$_POST['driver'] = $this->unProtectAjaxChar($_POST['driver']);

          $v_arr_db = array();
          if($_POST['dbms'] == 'mysql')
          {
              if(isset($_POST['use_ssl']))
              {
                  $v_arr_db['use_ssl']          = $this->unProtectAjaxChar($_POST['use_ssl']);
                  $v_arr_db['mysql_ssl_key']    = $this->unProtectAjaxChar($_POST['mysql_ssl_key']);
                  $v_arr_db['mysql_ssl_cert']   = $this->unProtectAjaxChar($_POST['mysql_ssl_cert']);
                  $v_arr_db['mysql_ssl_capath'] = $this->unProtectAjaxChar($_POST['mysql_ssl_capath']);
                  $v_arr_db['mysql_ssl_ca']     = $this->unProtectAjaxChar($_POST['mysql_ssl_ca']);
                  $v_arr_db['mysql_ssl_cipher'] = $this->unProtectAjaxChar($_POST['mysql_ssl_cipher']);
              }
          }

    			$list_db = $this->GetListDatabaseNameMySql($_POST['host'], $_POST['usr'], $_POST['pwd'], $_POST['driver'], $v_arr_db);
    			if (is_array($list_db))
    			{
  					if (!empty($list_db) || $_POST['first_time'] == 'S')
  					{
  						$ret = "<select name='sel_base' id='sel_base' class='nmInput' onchange=\"$('#base').val(this.value);setConnCharset($('#base').val());\"  onfocus='fc_get_db();'>";
  						foreach ($list_db as $db)
  						{
  							$ret .= "<option ". ($db == $_POST['db'] ? " selected " : "") ." value='$db'>$db</option>";
  						}
  						$ret .= "</select>";
  					}
            else
  					{
  						$ret = "<input type='text' name='base' id='base' class='nmInput' value='". $_POST['db'] ."'/>";
  					}

    				echo "S_#@#_" . $ret;
    			}
    			else
    			{
    				echo "N_#@#_" . nl2br(htmlentities($list_db));
    			}
				  echo "_#@#_" . $_POST['first_time'];
    		}
			  elseif (isset($_POST['set_charset']) && $_POST['set_charset'] == 'S')
    		{
  				$_POST['host']   = $this->unProtectAjaxChar($_POST['host']);
  				$_POST['usr']    = $this->unProtectAjaxChar($_POST['usr']);
  				$_POST['pwd']    = $this->unProtectAjaxChar($_POST['pwd']);
  				$_POST['db']     = $this->unProtectAjaxChar($_POST['db']);
  				$_POST['driver'] = $this->unProtectAjaxChar($_POST['sgdb']);

  				$arr_charset = $this->GetDbCharset($_POST['host'], $_POST['db'], $_POST['usr'], $_POST['pwd'], $_POST['driver']);
  				
  				if(isset($arr_charset) && is_array($arr_charset))
  				{
  					$str_charset = "";
  					if(isset($arr_charset['database']))
  					{
  						$str_charset = $arr_charset['database'];
  					}
  					elseif(isset($arr_charset['server']))
  					{
  						$str_charset = $arr_charset['server'];
  					}
  					echo "S_#@#_". $str_charset ."_#@#_";
  				}
  				elseif(!empty($arr_charset))
  				{
  					$str_msg = $arr_charset;
  					if($_SESSION['nm_err_num_error'])
  					{
  						if (strpos($_SESSION['nm_err_str_error'], ']:') !== false)
  						{
  							$str_msg .= "\r\n\r\n" . substr($_SESSION['nm_err_str_error'], strpos($_SESSION['nm_err_str_error'], ']:') + 2);
  						}
  						else
  						{
  							$str_msg .= "\r\n\r\n" . $_SESSION['nm_err_str_error'];
  						}
  					}

      				echo "N_#@#_" . nl2br(htmlentities($str_msg));
  				}
    		}

    		if (isset($_POST['exit']) && $_POST['exit'] == 'S')
    		{
    			exit;
    		}
    	}

    }//Ajax

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
    $arr_conn['use_schema']         = $arr_ini_conn['USE_SCHEMA'];
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

	}//GetConnection
}

?>