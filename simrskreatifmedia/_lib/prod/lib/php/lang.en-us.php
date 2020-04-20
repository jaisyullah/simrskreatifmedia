<?php
// English (United States)

// Array de idioma
$nm_lang = array();

// Misc
$nm_lang['charset'] = 'iso-8859-1';
$nm_lang['sc_prod'] = 'Production Environment';

// Botoes
$nm_lang['button_back']     = 'Back';
$nm_lang['button_cancel']   = 'Cancel';
$nm_lang['button_change']   = 'Update';
$nm_lang['button_close']    = 'Close';
$nm_lang['button_continue'] = 'Proceed &raquo;';
$nm_lang['button_delete']   = 'Remove';
$nm_lang['button_edit']     = 'Edit';
$nm_lang['button_login']    = 'Login';
$nm_lang['button_rename']   = 'Rename';
$nm_lang['button_save']     = 'Save';
$nm_lang['button_test']     = 'Test';
$nm_lang['button_add']     = 'Add';

// Campos de formulario
$nm_lang['form_base']                 = 'Database';
$nm_lang['form_conf']                 = 'Confirm';
$nm_lang['form_dbms']                 = 'DBMS / Driver';
$nm_lang['form_dec']                  = 'Decimal separator';
$nm_lang['form_dec_comma']            = 'Comma';
$nm_lang['form_dec_dot']              = 'Dot';
$nm_lang['form_persistente_y']        = 'Yes';
$nm_lang['form_persistente_n']        = 'No';
$nm_lang['form_file']                 = 'File path';
$nm_lang['form_gc_dir']               = 'Temporary files directory';
$nm_lang['form_gc_min']               = 'Time to live (minutes) of files';
$nm_lang['form_java_path']            = "Path for Java Binary";
$nm_lang['form_java_bin']             = "Java Binary";
$nm_lang['form_java_protocol']        = "PDF Server Protocol(http://, https:// ...)";
$nm_lang['form_pdf_server']           = "PDF Server IP";
$nm_lang['form_language']             = 'Language';
$nm_lang['form_name']                 = 'Name';
$nm_lang['form_odbc']                 = 'ODBC source name';
$nm_lang['form_pass_conf']            = 'Confirm';
$nm_lang['form_pass_new']             = 'New password';
$nm_lang['form_pass_old']             = 'Old password';
$nm_lang['form_password']             = 'Password';
$nm_lang['form_server']               = 'Server';
$nm_lang['form_port']                 = 'Port';
$nm_lang['form_serverfile']           = 'Server:Path';
$nm_lang['form_tsname']               = 'TSNAME';
$nm_lang['form_user']                 = 'User';
$nm_lang['form_db2_autocommit']       = 'autocommit';
$nm_lang['form_db2_i5_lib']           = 'i5_lib';
$nm_lang['form_db2_i5_naming']        = 'i5_naming';
$nm_lang['form_db2_i5_commit']        = 'i5_commit';
$nm_lang['form_db2_i5_query_optimize']= 'i5_query_optimize';
$nm_lang['form_date_separator']       = 'Delimiter character for date field in the database';
$nm_lang['form_use_persistent']       = 'Persistent connexion';
$nm_lang['form_db2_warning']		  = 'Attention, the settings below are specific to native ibm_db2 drive. Only change if you know what you are doing. For more details see: http://br2.php.net/manual/pt_BR/function.db2-connect.php';
$nm_lang['form_googlemaps_api_key']   = 'Authorization key to view the maps';
$nm_lang['form_php_timezone']             = 'PHP timezone';

// Erros
$nm_lang['error']                          = 'ERROR';
$nm_lang['error_gc_dir_invalid']           = 'The directory does not exists.';
$nm_lang['error_lang_file_invalid']        = 'The language file does not exists.';
$nm_lang['error_password_confirm']         = 'The password and confirmation are different.';
$nm_lang['error_password_invalid']         = 'The password is incorrect.';
$nm_lang['error_password_reserved']        = 'The new password enterd is reserved to ScriptCase. Please choose a new one different.';
$nm_lang['error_profile_base_empty']       = 'Inform the database name.';
$nm_lang['error_profile_invalid']          = 'Choose a connection.';
$nm_lang['error_profile_file_empty']       = 'Inform a valid file path.';
$nm_lang['error_profile_name_empty']       = 'The connection name cannot be empty.';
$nm_lang['error_profile_name_used']        = 'This connection name is already in use on the production environment.';
$nm_lang['error_profile_odbc_empty']       = 'Inform a valid ODBC source name.';
$nm_lang['error_profile_password_conf']    = 'The password and confirmation are different.';
$nm_lang['error_profile_same_name']        = 'The connection new name must be different of the old name.';
$nm_lang['error_profile_server_empty']     = 'Inform the server name or IP.';
$nm_lang['error_profile_serverfile_empty'] = 'Inform valids server name and file path.';
$nm_lang['error_profile_test_module']      = 'The PHP module that handles connections to this DBMS databases is not loaded.';
$nm_lang['error_profile_tsname_empty']     = 'Inform a valid TSNAME.';
$nm_lang['error_profile_conn_not_sel']     = 'Connection is not selected.';

// Login
$nm_lang['login_warning']	= 'The default password to access the production environment is <span style="font-weight: bold">scriptcase</span>. After your first login, you will be prompted to change it for security reasons.';
$nm_lang['login_copyright']	= '1997 - %d NetMake. All rights reserved.';
$nm_lang['login_version']	= 'Version: %s';

// Menu principal
$nm_lang['main_environment']    = 'Configure production environment';
$nm_lang['main_api']    = 'API';
$nm_lang['main_logout']         = 'Logout';
$nm_lang['main_password']       = 'Change password';
$nm_lang['main_profile_delete'] = 'Remove connection';
$nm_lang['main_profile_edit']   = 'Edit connection';
$nm_lang['main_profile_new']    = 'Create new connection';
$nm_lang['main_profile_rename'] = 'Rename connection';
$nm_lang['main_profile_test']   = 'Test connection';
$nm_lang['main_warn_conn']      = 'Some of the connections used during a deployment were not properly configured. Click on the connections to set them up.';

// Dicas
$nm_lang['hint_change_pass']    = 'Change access password to the ScriptCase production environment manager.';
$nm_lang['hint_environment']    = 'Configure the parameters of the garbage collection of the directory where the applications create the temporary files.';
$nm_lang['hint_api']            = 'Configure API Profiles';
$nm_lang['hint_logout']         = 'Exit the ScriptCase production environment manager.';
$nm_lang['hint_profile_delete'] = 'Remove a connection from the production environment.';
$nm_lang['hint_profile_edit']   = 'Edit the informations of a connection of the production environment.';
$nm_lang['hint_profile_new']    = 'Create a new access connection to the ScriptCase applications. The necessary information for an application to run are stored in the connection. It is necessary to inform in a connection the access data for the applications to connect to the database. You can also save some other information that the user needs to run the applications.';
$nm_lang['hint_profile_rename'] = 'Change the name of an access connection to the ScriptCase applications.';
$nm_lang['hint_profile_test']   = 'Perform a connection test with the database server.';

// Exclusao de perfil
$nm_lang['profile_delete']         = 'Remove Connection';
$nm_lang['profile_delete_empty']   = 'There are no connections saved on the production environment.';
$nm_lang['profile_delete_warning'] = 'This option removes permanently the information of a connection of the ScriptCase production environment. Any application that uses this connection will stop working. If you are sure that the connection can be removed, choose the connection to be deleted and confirm the operation.';

// Renomeacao de perfil
$nm_lang['profile_rename']         = 'Rename Connection';
$nm_lang['profile_rename_empty']   = 'There are no connections saved on the production environment.';
$nm_lang['profile_rename_message'] = 'Choose the connection to be renamed and inform the new name.';

// Criacao e edicao de perfil
$nm_lang['profile_auth']           = 'Authentication';
$nm_lang['profile_base']           = 'Database';
$nm_lang['profile_dbms']           = 'DBMS';
$nm_lang['profile_general']        = 'General Settings';
$nm_lang['profile_name']           = 'Connection Name';
$nm_lang['profile_select']         = 'Edit Connection';
$nm_lang['profile_select_empty']   = 'There are no connections saved on the production environment.';
$nm_lang['profile_select_warning'] = 'Choose the connection that will be edited.';
$nm_lang['profile_test']           = 'Test Connection';
$nm_lang['profile_test_conn']      = 'You can test if there are any errors with the connection to the database server before saving the connection data.';
$nm_lang['profile_test_empty']     = 'There are no connections saved on the production environment.';
$nm_lang['profile_test_error']     = 'An error occurred while connecting to the database server.';
$nm_lang['profile_test_select']    = 'Select a valid connection to be tested.';
$nm_lang['profile_test_success']   = 'The connection to the database server was successfull.';
$nm_lang['profile_test_warning']   = 'Choose the connection that you want to test.';

// Ambiente de producao
$nm_lang['environment'] = 'Production Configuration';
$nm_lang['connection']  = 'Database Connections';

// Alteracao de senha
$nm_lang['change_pass'] = 'Password Change';

// Bases de dados
$nm_lang['access']        = 'MS Access ODBC';
$nm_lang['ado_access']    = 'MS Access ADO';
$nm_lang['ado_mssql']     = 'MS SQL Server ADO MSDASQL';
$nm_lang['adooledb_mssql']= 'MS SQL Server ADO SQLOLEDB';
$nm_lang['borland_ibase'] = 'Interbase 6.5 or above';
$nm_lang['db2']           = 'DB2';
$nm_lang['db2_odbc']      = 'DB2 ODBC NATIVE';
$nm_lang['odbc_db2']      = 'DB2 ODBC GENERIC 7 or above';
$nm_lang['odbc_db2v6']    = 'DB2 ODBC GENERIC 6';
$nm_lang['firebird']      = 'Firebird';
$nm_lang['pdo_firebird']  = 'Firebird PDO';
$nm_lang['ibase']         = 'Interbase';
$nm_lang['informix']      = 'Informix';
$nm_lang['pdo_informix']  = 'Informix PDO';
//$nm_lang['pdo_mysql']     = 'MySQL PDO';
$nm_lang['pdo_pgsql']     = 'PostGreSQL PDO';
$nm_lang['informix72']    = 'Informix 7.2';
$nm_lang['mssql']         = 'MS SQL Server';
$nm_lang['mssqlnative']   = 'MS SQL Server NATIVE SRV';
$nm_lang['mysql']         = 'MySQL';
$nm_lang['mysqlt']        = 'MySQL (Transaction)';
$nm_lang['oci8']          = 'Oracle 8';
$nm_lang['oci805']        = 'Oracle 8.0.5 or above';
$nm_lang['oci8po']        = 'Oracle 8 Portable';
$nm_lang['odbc']          = 'Generic ODBC';
$nm_lang['odbc_mssql']    = 'MS SQL Server ODBC';
$nm_lang['odbc_oracle']   = 'Oracle ODBC';
$nm_lang['oracle']        = 'Oracle';
$nm_lang['pdo_oracle']    = 'Oracle PDO';
$nm_lang['pdosqlite']     = 'SQLite PDO';
$nm_lang['postgres']      = 'PostGreSQL';
$nm_lang['postgres64']    = 'PostGreSQL 6.4';
$nm_lang['postgres7']     = 'PostGreSQL 7 or Higher';
$nm_lang['sqlite']        = 'SQLite';
$nm_lang['sqlite3']       = 'SQLite 3';
$nm_lang['sybase']        = 'Sybase';
$nm_lang['vfp']           = 'Visual FoxPro';
$nm_lang['progress']      = 'Progress';

$nm_lang['error_perfil_title'] = "Connections Create";
$nm_lang['error_perfil_msg']   = "The database connection that your application use was not found. You need to access the production environment and create the connection.<br /><br />Connections not found: %s<br /><br /><a href=\"%s\">Click here to create the connections now</a>.";


$nm_lang['rem_conn_sel_conn']    = 'Select the connection';
$nm_lang['rem_conn_new_name']    = 'Enter the new name';

$nm_lang['msg_conn_rename_ok']    = 'Connection renamed successfully !';
$nm_lang['msg_environment_ok']    = 'Data updated successfully !';
$nm_lang['msg_change_pass_ok']    = 'Password successfully updated !';

$nm_lang['lbl_help']    = 'Help';
$nm_lang['msg_not_internet']    = 'Check your Internet connection !';
$nm_lang['error_backup']		= "Error performing backup boot file.";
$nm_lang['error_temp_file']		= "Error creating temporary file.";
$nm_lang['error_ini_save']		= "Error writing initialization file.";

$nm_lang['confirm_delete_preprofile'] = "Are you sure you want to delete this profile?\\r\\nThe interface won't criticizes to create this profile anymore.";

//api
$nm_lang['name'] = "Name";
$nm_lang['gateway'] = "Gateway";
$nm_lang['action'] = "Action";

?>