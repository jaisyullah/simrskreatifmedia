<?php
/**
 * $Id: nm_ini_manager2.php,v 1.8 2012-02-07 21:26:50 vinicius Exp $
 */

// Inicializa script
set_error_handler("trataError");
mt_srand((double)microtime() * 1000000);
session_start();
error_reporting(E_ALL);
if (!isset($_SESSION['nm_session']['prod_v8'])) {
    $_SESSION['nm_session']['prod_v8'] = array('logged' => FALSE);
}

if (isset($_GET['login']) && isset($_SESSION['nm_session']['cache']['prod_v8'])) {
    unset($_SESSION['nm_session']['cache']['prod_v8']);

    if (isset($_SESSION['nm_session']['prod_v8']['logged'])) {
        unset($_SESSION['nm_session']['prod_v8']['logged']);
    }
}

$arr_dbms = nm_prod_dbms();
$arr_error = array();
$arr_argv = nm_prod_argv();
$nm_config = nm_prod_path();
$str_option = '';
nm_prod_lang();
require($nm_config['path_lib'] . 'lang.' . $_SESSION['nm_session']['prod_v8']['lang'] . '.php');

// Arquivo de inicializacao
if (!defined('NM_INC_PROD_INI')) {
    require_once($nm_config['path_lib'] . 'nm_ini_lib.php');
    require_once($nm_config['path_lib'] . 'nm_serialize.php');
}
$str_ini = $nm_config['path_conf'] . 'prod.config.php';
$arr_ini = nm_unserialize_ini($str_ini);

$_SESSION['nm_session']['prod_v8']['arr_dbms'] = $arr_dbms;
$_SESSION['nm_session']['prod_v8']['arr_ini'] = $arr_ini;

// Verifica login
if (isset($arr_argv['option'])) {
    $str_option = $arr_argv['option'];
    $str_opt_par = $arr_argv['opt_par'];
}
if (('' != $str_option) && ('login' != $str_option) && !$_SESSION['nm_session']['prod_v8']['logged']) {
    $str_option = '';
    $str_opt_par = '';
}

$str_message = "";
$b_reenviar = false;

// Processa formulario
switch ($str_option) {
    // Altera senha
    case 'change_pass':
        if (isset($arr_argv['field_pass_old'])) {
            $str_pwd_ini = decode_string($arr_ini['GLOBAL']['PASSWORD']);
            $str_pwd_old = $arr_argv['field_pass_old'];
            $str_pwd_new = trim($arr_argv['field_pass_new']);
            $str_pwd_conf = $arr_argv['field_pass_conf'];
            if ('' == $str_pwd_ini) {
                $str_pwd_ini = 'scriptcase';
            }
            if ($str_pwd_old != $str_pwd_ini) {
                $arr_error[] = 'error_password_invalid';
            } elseif (('' == $str_pwd_new) || ('scriptcase' == $str_pwd_new)) {
                $arr_error[] = 'error_password_reserved';
            } elseif ($str_pwd_new != $str_pwd_conf) {
                $arr_error[] = 'error_password_confirm';
            } else {
                $arr_ini['GLOBAL']['LANGUAGE'] = $_SESSION['nm_session']['prod_v8']['lang'];
                $arr_ini['GLOBAL']['PASSWORD'] = encode_string_utf8($str_pwd_new);
                $str_xml = nm_serialize_ini($arr_ini);

                salva_xml($str_ini, $str_xml, $arr_ini);

                if (isset($_POST['hid_login']) && $_POST['hid_login'] == 'S') {
                    $str_option = 'main_menu';
                } else {
                    $str_option = "msg";
                    $b_reenviar = false;
                    $str_message = $nm_lang['msg_change_pass_ok'];
                }
            }
        }
        break;
    // Ambiente de producao
    case 'environment':
        if (isset($arr_argv['field_gc_dir'])) {
            $b_reenviar = $arr_ini['GLOBAL']['LANGUAGE'] != $arr_argv['field_language'];

            $arr_ini['GLOBAL']['GC_DIR'] = $arr_argv['field_gc_dir'];
            $arr_ini['GLOBAL']['GC_MIN'] = $arr_argv['field_gc_min'];
            $arr_ini['GLOBAL']['PDF_SERVER_WKHTML'] = $arr_argv['field_pdf_server_wkhtml'];
            $arr_ini['GLOBAL']['LANGUAGE'] = $arr_argv['field_language'];
            $arr_ini['GLOBAL']['GOOGLEMAPS_API_KEY'] = $arr_argv['field_googlemaps_api_key'];
            $arr_ini['GLOBAL']['PHP_TIMEZONE'] = $arr_argv['field_php_timezone'];
            $_SESSION['scriptcase']['php_timezone'] = $arr_argv['field_php_timezone'];


            if (!@is_dir($arr_argv['field_gc_dir'])) {
                $arr_error[] = 'error_gc_dir_invalid';
            }
            if (!@is_file($nm_config['path_lib'] . 'lang.' . $arr_argv['field_language'] . '.php')) {
                $arr_error[] = 'error_lang_file_invalid';
            }
            if (empty($arr_error)) {
                $_SESSION['nm_session']['prod_v8']['lang'] = $arr_argv['field_language'];
                include $nm_config['path_lib'] . 'lang.' . $_SESSION['nm_session']['prod_v8']['lang'] . '.php';
                $str_xml = nm_serialize_ini($arr_ini);
                salva_xml($str_ini, $str_xml, $arr_ini);

                $str_option = "msg";
                $str_message = $nm_lang['msg_environment_ok'];
            }
        }
        break;
    // Realiza login
    case 'login':
        if ($_SESSION['nm_session']['prod_v8']['lang'] != $arr_argv['field_language']) {
            if (!@is_file($nm_config['path_lib'] . 'lang.' . $arr_argv['field_language'] . '.php')) {
                $arr_error[] = 'error_lang_file_invalid';
            }
            if (empty($arr_error)) {
                $arr_ini['GLOBAL']['LANGUAGE'] = $arr_argv['field_language'];

                $str_xml = nm_serialize_ini($arr_ini);
                salva_xml($str_ini, $str_xml, $arr_ini);

                $_SESSION['nm_session']['prod_v8']['lang'] = $arr_argv['field_language'];
                include $nm_config['path_lib'] . 'lang.' . $_SESSION['nm_session']['prod_v8']['lang'] . '.php';
            }
        } else {
            $str_pwd_ini = decode_string($arr_ini['GLOBAL']['PASSWORD']);
            $str_pwd_htm = $arr_argv['field_pass'];
            if ('' == $str_pwd_ini) {
                $str_pwd_ini = 'scriptcase';
            }
            if ($str_pwd_htm != $str_pwd_ini) {
                $arr_error[] = 'error_password_invalid';
            } elseif ('scriptcase' == $str_pwd_htm) {
                $str_option = 'change_pass';
                $_SESSION['nm_session']['prod_v8']['logged'] = TRUE;
            } else {
                $str_option = 'main_menu';
                $_SESSION['nm_session']['prod_v8']['logged'] = TRUE;
            }
        }
        break;
    // Menu principal
    case 'logout':
        $_SESSION['nm_session']['prod_v8']['logged'] = FALSE;
        $str_option = 'login';
        break;
    // Menu principal
    case 'main_menu':
    case 'main_menu_msg':
    case 'msg':
        break;
    // Excluir perfil existente
    case 'profile_delete':
        if (isset($arr_argv['field_profile'])) {
            if (('' == $arr_argv['field_profile']) || !isset($arr_ini['PROFILE'][$arr_argv['field_profile']])) {
                $arr_error[] = 'error_profile_invalid';
            } else {
                unset($arr_ini['PROFILE'][$arr_argv['field_profile']]);
                $str_xml = nm_serialize_ini($arr_ini);
                salva_xml($str_ini, $str_xml, $arr_ini);
                $str_option = 'main_menu';
            }
        }
        break;
        case 'api_save':
            $file = $nm_config['path_conf']."profile_api.conf.php";
            if(file_exists($file))
            {
                $str_content = strtr(file_get_contents( $file ), array("<?php" => '', "?>" => ''));
                $arr_profiles = unserialize(trim($str_content));
            }
            if($_REQUEST['opt_par'] != '-1')
            {
                foreach($arr_profiles as $profile => $data)
                {
                    if($data['id'] == $_REQUEST['opt_par'])
                    {
                        unset($arr_profiles[$profile]);
                    }
                }
            }
            $gw = explode('__NM__', $_REQUEST['gateway']);
            $arr_profiles[ $_REQUEST['name'] ] = [
                                                    'id' => count($arr_profiles) + 1,
                                                    'name'      => $_REQUEST['name'],
                                                    'type'   => $gw[0],
                                                    'gateway'   => $gw[1],
                                                    'settings'  => $_REQUEST[ $gw[1] ]
                                                 ];


            ksort($arr_profiles);

            $arr_profiles = serialize($arr_profiles);
            file_put_contents( $file, "<?php ". $arr_profiles ." ?>");

            if(isset($_REQUEST['new_flag']) && !empty($_REQUEST['new_flag']))
            {
                @unlink($nm_config['path_conf'] . $_REQUEST['new_flag']);
            }


            $str_option = 'api';
        break;
        case 'api_delete_profile':
            $file = $nm_config['path_conf']."profile_api.conf.php";
            if(file_exists($file))
            {
                $str_content = strtr(file_get_contents( $file ), array("<?php" => '', "?>" => ''));
                $arr_profiles = unserialize(trim($str_content));
            }
            if($_REQUEST['opt_par'] != '-1')
            {
                foreach($arr_profiles as $profile => $data)
                {
                    if($data['id'] == $_REQUEST['opt_par'])
                    {
                        unset($arr_profiles[$profile]);
                    }
                }
            }
            natcasesort($arr_profiles);
            $arr_profiles = serialize($arr_profiles);
            file_put_contents( $file, "<?php ". $arr_profiles ." ?>");
            $str_option = 'api';
            break;
        case 'api':
            $str_option = 'api';
        break;
        case 'api_edit_profile':
            $str_option = 'api_add_profile';
            break;
        case 'api_add_profile':
            $str_option = 'api_add_profile';
            break;
    // Renomeia o perfil
    case 'profile_rename':
        if (isset($arr_argv['field_new_name'])) {
            if ('' == $arr_argv['field_profile']) {
                $arr_error[] = 'error_profile_conn_not_sel';
            } elseif ('' == $arr_argv['field_new_name']) {
                $arr_error[] = 'error_profile_name_empty';
            } elseif ($arr_argv['field_profile'] == $arr_argv['field_new_name']) {
                $arr_error[] = 'error_profile_same_name';
            } elseif (isset($arr_ini['PROFILE'][$arr_argv['field_new_name']])) {
                $arr_error[] = 'error_profile_name_used';
            } else {
                $arr_ini['PROFILE'][$arr_argv['field_new_name']] = $arr_ini['PROFILE'][$arr_argv['field_profile']];

                unset($arr_ini['PROFILE'][$arr_argv['field_profile']]);
                $arr_list = array_keys($arr_ini['PROFILE']);
                $arr_data = array();
                natcasesort($arr_list);
                foreach ($arr_list as $str_profile) {
                    $arr_data[$str_profile] = $arr_ini['PROFILE'][$str_profile];
                }
                $arr_ini['PROFILE'] = $arr_data;
                $str_xml = nm_serialize_ini($arr_ini);
                salva_xml($str_ini, $str_xml, $arr_ini);
                $str_option = 'main_menu';

                $_SESSION['nm_session']['prod_v8']['arr_ini'] = $arr_ini;
                $str_option = "msg";
                $b_reenviar = false;
                $str_message = $nm_lang['msg_conn_rename_ok'];
            }
        }
        break;
    // Testa o perfil
    case 'profile_test':
        break;
    // Conexoes pendentes
    case 'connections_pendent':
        break;
    case 'delete_preprofile':
        nm_prod_delete_new_connections($arr_argv['opt_par']);
        $str_option = 'connections_pendent';
        break;
    // Entrada no ambiente de producao
    default:
        $str_option = 'login';
        break;
}

// Exibe formulario
nm_prod_display_header();
nm_prod_display_errors();
switch ($str_option) {
    // Exibe alteracao de senha
    case 'change_pass':
        $str_pwd = decode_string($arr_ini['GLOBAL']['PASSWORD']);

        if (trim($str_pwd) == "" || $str_pwd == "scriptcase") {
            nm_prod_display_login(decode_string($arr_ini['GLOBAL']['PASSWORD']), "change_pass");
        } else {
            nm_prod_display_change_pass(decode_string($arr_ini['GLOBAL']['PASSWORD']));
        }
        break;
    // Ambiente de producao
    case 'environment':
        nm_prod_display_environment();
        break;
    // Exibe login
    case 'login':
        nm_prod_display_login(decode_string($arr_ini['GLOBAL']['PASSWORD']));
        break;
    // Menu principal
    case 'main_menu':
        nm_prod_display_main_menu(false);
        break;
    // Menu principal
    case 'main_menu_msg':
        nm_prod_display_main_menu(true);
        break;
    // Conexoes pendentes
    case 'connections_pendent':
        nm_prod_display_connections_pendent();
        break;
    // Criar novo perfil e editar perfil existente
    case 'profile_edit':
    case 'profile_new':
        switch ($str_step) {
            // Configuracao geral do perfil
            case 'general':
                nm_prod_display_profile_general();
                break;
            // Selecao do perfil a editar
            case 'select':
                nm_prod_display_profile_select();
                break;
        }
        break;
    // Renomeia o perfil
    case 'profile_rename':
        nm_prod_display_profile_rename();
        break;
    // Testa o perfil
    case 'profile_test':
        nm_prod_display_profile_test_select();
        break;
    case 'api':
        nm_prod_display_api();
        break;
    case 'api_add_profile':
        nm_prod_display_api_add_profile(isset($_REQUEST['opt_par'])? $_REQUEST['opt_par'] : -1);
        break;
    case 'msg':
        nm_show_msg($str_message, $b_reenviar);
        break;
    // Entrada no ambiente de producao
    default:
        nm_prod_display_login(decode_string($arr_ini['GLOBAL']['PASSWORD']));
        break;
}
nm_prod_display_footer();

//---------- Definicao de funcoes auxiliares -----------------------------------

function nm_prod_argv()
{
    $arr_args = array();
    if (isset($_GET) && !empty($_GET)) {
        $arr_args = nm_prod_argv_unescape($_GET);
    }
    if (isset($_POST) && !empty($_POST)) {
        $arr_args = array_merge($arr_args, nm_prod_argv_unescape($_POST));
    }
    return $arr_args;
} // nm_prod_argv

function nm_prod_argv_string($v_str_string)
{
    if (get_magic_quotes_gpc()) {
        return stripslashes($v_str_string);
    } else {
        return $v_str_string;
    }
} // nm_prod_argv_string

function nm_prod_argv_unescape($v_arr_array)
{
    $arr_unescaped = array();
    foreach ($v_arr_array as $mix_key => $mix_value) {
        if (is_array($mix_value)) {
            $arr_unescaped[nm_prod_argv_string($mix_key)] = nm_prod_argv_unescape($mix_value);
        } else {
            $arr_unescaped[nm_prod_argv_string($mix_key)] = nm_prod_argv_string($mix_value);
        }
    }
    return $arr_unescaped;
} // nm_prod_argv_unescape


/**
 * Retorna a versao do PHP.
 *
 * @access  public
 * @return  integer  $int_result  Versao do PHP.
 */
function nm_php_version()
{
    if (-1 != version_compare(phpversion(), '5.0.0')) {
        return 5;
    } elseif (-1 != version_compare(phpversion(), '4.0.0')) {
        return 4;
    } else {
        return 3;
    }
} // nm_php_version


function nm_prod_dbms()
{
    return array('MS Access' => array('ado_access','ace_access',
        'access'),
        'DB2' => array('db2',
            'db2_odbc',
            'odbc_db2',
            'odbc_db2v6'),
        'Firebird' => array('firebird', 'pdo_firebird'),

        'Informix' => array('informix',
            'pdo_informix',
            'informix72'),
        'Interbase' => array('borland_ibase',
            'ibase'),
        'MS SQL Server' => array(
            'ado_mssql',
            'adooledb_mssql',
            'mssql',
            'mssqlnative',
            'odbc_mssql'),
        'MySQL' => array('pdo_mysql',
            'mysql',
            'mysqlt'),
        'ODBC' => array('odbc'),
        'Oracle' => array(
            'pdo_oracle',
            'oci805',
            'oci8',
            'oci8po',
            'oracle',
            'odbc_oracle'),
        'PostGreSQL' => array('postgres7',
            'postgres64',
            'postgres',
            'pdo_pgsql'),
        'Progress' => array('progress'),
        'SQLite' => array('sqlite',
            'sqlite3',
            'pdosqlite'),
        'Sybase' => array('sybase'));
    //'Visual FoxPro' => array('vfp'));
} // nm_prod_dbms


function nm_prod_display_change_pass($v_str_pass)
{
    global $nm_config, $nm_lang;
    ?>

    <table cellpadding="1" cellspacing="6" border="0" align="center" style="width:500px;margin:0px auto;">
        <tr>
            <td align="center">

                <table class="nmTable" cellpadding="0" cellspacing="8" border="0" width="100%" align="center">
                    <tr>
                        <td colspan="2" class="nmTitle"><?php echo $nm_lang['change_pass']; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                    <?php
                    if (('' == $v_str_pass) || ('scriptcase' == $v_str_pass)) {
                        ?>
                        <input type="hidden" name="field_pass_old" value="scriptcase"/>
                    <?php
                    } else {
                        ?>
                        <tr>
                            <td class="nmLineV3" align="right" width="50%"><?php echo $nm_lang['form_pass_old']; ?>
                                &nbsp;&nbsp;</td>
                            <td class="nmLineV3" width="50%"><input type="password" name="field_pass_old" size="20"
                                                                    class="nmInput"/></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="font-size:5px">&nbsp;</td>
                        </tr>
                        <!--tr class="nmTableLine" >
                          <td height="1" colspan="2"><img src="../../nm_transparent.gif" width="1" height="1"></td>
                        </tr-->
                    <?php
                    }
                    ?>

                    <tr>
                        <td class="nmLineV3" align="right" width="50%"><?php echo $nm_lang['form_pass_new']; ?>&nbsp;&nbsp;</td>
                        <td class="nmLineV3" width="50%"><input type="password" name="field_pass_new" size="20"
                                                                class="nmInput"/></td>
                    </tr>
                    <!--tr class="nmTableLine">
                      <td height="1" colspan="2"><img src="../../nm_transparent.gif" width="1" height="1"></td>
                    </tr-->
                    <tr>
                        <td colspan="2" style="font-size:5px">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="nmLineV3" align="right"><?php echo $nm_lang['form_pass_conf']; ?>&nbsp;&nbsp;</td>
                        <td class="nmLineV3"><input type="password" name="field_pass_conf" size="20" class="nmInput"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                </table>
                <br/>

                <center>
                    <!--input type="submit" value="<?php echo $nm_lang['button_change']; ?>" class="nmButton" /-->
                    <input type="button" value="<?php echo $nm_lang['button_change']; ?>"
                           onclick="nm_set_option('change_pass', '', 'nm_iframe')" class="nmButton">
                    <?php
                    if (('' != $v_str_pass) && ('scriptcase' != $v_str_pass)) {
                        ?>
                        &nbsp;&nbsp;&nbsp;<input type="button" value="<?php echo $nm_lang['button_cancel']; ?>"
                                                 onClick="nm_set_option('main_menu', '', '_top')" class="nmButton"/>
                    <?php
                    }
                    ?>
                </center>
            </td>
        </tr>
    </table>
<?php
} // nm_prod_display_change_pass

function nm_prod_display_errors()
{
    global $arr_error, $nm_config, $nm_lang;
    if (!empty($arr_error)) {
        ?>
        <!--div class="nmTable" style="width: 300px; position:absolute; z-index:1001; left:38%;"-->
        <center>
            <?php

            if (isset($_POST['hid_login']) && $_POST['hid_login'] == 'S')
            {
            $b_br = false;
            ?>
            <div class="nmTable" style="width:28%; margin-top:15px; position:absolute; z-index:1001; left:36%">
                <?php
                }
                else
                {
                $b_br = true;
                ?>
                <div class="nmTable" style="width:350px; margin-top:15px">
                    <?php
                    }
                    ?>

                    <div class="nmErrorTitle">
                        <img src="<?php echo $nm_config['url_img']; ?>notice.gif"/> <?php echo $nm_lang['error']; ?>
                    </div>
                    <div class="nmErrorMsg">
                        <?php
                        foreach ($arr_error as $str_code) {
                            echo $nm_lang[$str_code] . '<br />';
                        }
                        ?>
                    </div>
                </div>

        </center>
        <?php
        if ($b_br) {
            echo "<br>";
        }
    }
} // nm_prod_display_errors

function nm_prod_display_environment()
{
    global $arr_ini, $nm_config, $nm_lang;
    $arr_lang = nm_prod_list_lang();
    $str_comp = ('' == $arr_ini['GLOBAL']['LANGUAGE']) ? $_SESSION['nm_session']['prod_v8']['lang'] : $arr_ini['GLOBAL']['LANGUAGE'];
    ?>
    <style>
        .pad {
            padding: 3px;
        }
    </style>
    <div style="text-align: center">
        <center>
            <table class="nmTable" cellpadding="3px">
                <tr>
                    <td class="nmTitle" colspan="5" style="white-space: nowrap"><?php echo $nm_lang['sc_prod']; ?></td>
                </tr>
                <tr>
                    <td colspan="5" style="font-size:3px">&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td class="nmLineV3 pad"><?php echo $nm_lang['form_gc_dir']; ?></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td class="nmLineV3 pad"><input type="text" name="field_gc_dir" size="50"
                                                    value="<?php echo $arr_ini['GLOBAL']['GC_DIR']; ?>"
                                                    class="nmInput"/></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td class="nmLineV3 pad"><?php echo $nm_lang['form_gc_min']; ?></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td class="nmLineV3 pad"><input type="text" name="field_gc_min" size="5"
                                                    value="<?php echo $arr_ini['GLOBAL']['GC_MIN']; ?>"
                                                    class="nmInput"/></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td class="nmLineV3 pad"><?php echo $nm_lang['form_pdf_server']; ?></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td class="nmLineV3 pad"><input type="text" name="field_pdf_server_wkhtml" size="50"
                                                    value="<?php echo $arr_ini['GLOBAL']['PDF_SERVER_WKHTML']; ?>"
                                                    class="nmInput"/></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td class="nmLineV3 pad"><?php echo $nm_lang['form_language']; ?></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td class="nmLineV3 pad">
                        <select name="field_language" class="nmInput"/>
                        <?php
                        foreach ($arr_lang as $str_code => $str_lang) {
                            $str_sel = ($str_comp == $str_code) ? ' selected="selected"' : '';
                            ?>
                            <option
                                value="<?php echo $str_code; ?>"<?php echo $str_sel; ?>><?php echo $str_lang; ?></option>
                        <?php
                        }
                        ?>
                        </select>
                    </td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td class="nmLineV3 pad"><?php echo $nm_lang['form_php_timezone']; ?></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td class="nmLineV3 pad">
                        <select name="field_php_timezone" class="nmInput"/>
                        <option value=''></option>
                        <?php
                        $_arr = DateTimeZone::listIdentifiers();
                        foreach ($_arr as $str_code) {
                            $str_sel = ($arr_ini['GLOBAL']['PHP_TIMEZONE'] == $str_code) ? ' selected="selected"' : '';
                            ?>
                            <option
                                value="<?php echo $str_code; ?>"<?php echo $str_sel; ?>><?php echo $str_code; ?></option>
                        <?php
                        }
                        ?>
                        </select>
                    </td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="5" style="font-size:3px">&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td class="nmLineV3 pad"><?php echo $nm_lang['form_googlemaps_api_key']; ?></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td class="nmLineV3 pad"><input type="text" name="field_googlemaps_api_key" size="25"
                                                    value="<?php echo(isset($arr_ini['GLOBAL']['GOOGLEMAPS_API_KEY']) ? $arr_ini['GLOBAL']['GOOGLEMAPS_API_KEY'] : ""); ?>"
                                                    class="nmInput"/></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="5" style="font-size:3px">&nbsp;</td>
                </tr>
            </table>
            <br/>
            <!--input type="submit" value="<?php echo $nm_lang['button_save']; ?>" class="nmButton" />&nbsp;&nbsp;&nbsp; -->
            <input type="button" style='min-width:68px;' value="<?php echo $nm_lang['button_save']; ?>"
                   onclick="nm_set_option('environment', '', 'nm_iframe')" class="nmButton">&nbsp;&nbsp;&nbsp;
            <input type="button" style='min-width:68px;' value="<?php echo $nm_lang['button_cancel']; ?>"
                   onClick="nm_set_option('main_menu', '', '_top')" class="nmButton"/>
        </center>
    </div>

<?php
} // nm_prod_display_environment

function nm_prod_display_footer()
{
    ?>
    </form>
    </body>
    </html>
<?php
} // nm_prod_display_footer

function nm_prod_display_header()
{
global $nm_config, $nm_lang, $str_option;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <title>&lt;ScriptCase&gt; :: <?php echo $nm_lang['sc_prod']; ?></title>
    <meta http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <meta http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <meta http-equiv="Cache-Control" content="max-age=15, s-maxage=0, private"/>
    <meta http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="author" content="NetMake"/>
    <meta name="generator" content="ScriptCase"/>
    <link rel="stylesheet" type="text/css" href="../css/prod.css"/>
    <?php
    nm_prod_display_javascript();
    ?>
</head>
<body class="nmPage">
<form name="form_prod" action="<?php echo nm_prod_url_rand($nm_config['url_lib'] . 'nm_ini_manager2.php'); ?>"
      method="post" target="_top">
<input type="hidden" name="option" value="<?php echo $str_option; ?>"/>
<input type="hidden" name="opt_par" value=""/>
<?php
} // nm_prod_display_header

function nm_prod_display_javascript()
{
    global $nm_config, $nm_lang, $str_option;
    ?>
    <script language="javascript">
        function confirmDeletePreProfile(str_opt, str_par, str_target)
        {
            if(confirm("<?php echo $nm_lang['confirm_delete_preprofile']; ?>"))
            {
                nm_set_option(str_opt, str_par, str_target);
            }
        }
        
        function nm_set_option(str_opt, str_par, str_target)
        {
            if (str_opt == 'profile_new')
            {
                document.form_prod.action = "<?php echo nm_prod_url_rand($nm_config['url_lib'] . 'devel/iface/admin_sys_allconections_create_wizard.php'); ?>";
            }
            else if (str_opt == 'profile_edit')
            {
                document.form_prod.action = "<?php echo nm_prod_url_rand($nm_config['url_lib'] . 'devel/iface/admin_sys_allconections_create_wizard.php?conn_open=S'); ?>";
            }
            else if (str_opt == 'profile_new_2')
            {
                document.form_prod.action = "<?php echo nm_prod_url_rand($nm_config['url_lib'] . 'devel/iface/admin_sys_allconections_create_wizard_2.php'); ?>";
            }
            else if (str_opt == 'profile_edit_2')
            {
                document.form_prod.action = "<?php echo nm_prod_url_rand($nm_config['url_lib'] . 'devel/iface/admin_sys_allconections_create_wizard_2.php?conn_open=S'); ?>";
            }
            else
            {
                document.form_prod.action = "<?php echo nm_prod_url_rand($nm_config['url_lib'] . 'nm_ini_manager2.php'); ?>";
            }

            document.form_prod.option.value = str_opt;
            document.form_prod.opt_par.value = str_par;
            document.form_prod.target = str_target;
            document.form_prod.submit();
        }
        <?php
            switch ($str_option)
            {
                case 'main_menu':
                case 'delete_preprofile':
                break;
                case 'profile_edit':
                case 'profile_new':
                    ?>
                    function nm_test_conn() {
                        oWin = window.open("<?php echo $nm_config['url_lib']; ?>nm_ini_manager2.php?option=test", "winTestConn", "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=300,height=200");
                        oWin.focus();
                    }
                    <?php
                break;
                case 'profile_test':
                    ?>
                    function nm_test_conn() {
                        iSel = document.form_prod.field_profile.selectedIndex;
                        if (0 < iSel) {
                            sSel = document.form_prod.field_profile.options[iSel].value;
                            oWin = window.open("<?php echo $nm_config['url_lib']; ?>nm_ini_manager2.php?option=test&profile=" + sSel, "winTestConn", "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=300,height=200");
                            oWin.focus();
                        }
                    }
                    <?php
                break;
                case 'test':
                    ?>
                    function nm_close() {
                        window.close();
                    }
                    <?php
                break;
            }
        ?>
    </script>
<?php
} // nm_prod_display_javascript

function nm_prod_get_version()
{
    $ver = "9.1";
    if(is_file("ver.dat"))
    {
        $ver = file_get_contents("ver.dat");
    }
    return $ver;
}

function nm_prod_display_login($v_str_pass, $v_tp_win = "login")
{
    global $nm_config, $nm_lang, $arr_ini;

    $arr_lang = nm_prod_list_lang();
    $str_comp = ('' == $_SESSION['nm_session']['prod_v8']['lang']) ? $arr_ini['GLOBAL']['LANGUAGE'] : $_SESSION['nm_session']['prod_v8']['lang'];
    $cp       = sprintf($nm_lang['login_copyright'], date("Y"));
    $ver      = sprintf($nm_lang['login_version'], nm_prod_get_version());
    ?>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            background: #bfd1e3 url(../../img/bgLogin.jpg);
            background-size: cover;
        }
    </style>
    <input type="hidden" name="hid_login" value="S"/>

    <table cellpadding=0 cellspacing=0 border=0 id="loginContainer" align='center'>
        <tr>
            <td style='height: 89%'>
                <!-- logo -->
                <div id="loginPartsLogo"><img src="../../img/scriptcase.png" width="300" alt="Scriptcase"
                                              title="Scriptcase"/></div>
                <!-- xx logo -->
                <div id="loginPartsBox">


                    <!-- form -->
                    <div id="loginBoxForm">
                        <div class="nmTextTitle" style="text-align:center;">
                            <?php
                            if ($v_tp_win == 'change_pass') {
                                echo $nm_lang['change_pass'];
                            } else {
                                echo $nm_lang['sc_prod'];
                            }
                            ?>
                        </div>
                        <table cellpadding="8" cellspacing="4" border="0">
                            <tr>
                                <td colspan="2">
                                    &nbsp;
                                </td>
                            </tr>
                            <?php
                            if ($v_tp_win == 'change_pass') {
                                ?>
                                <tr>
                                    <td valign="top" height="35px" class="nmTextTitle" align="left">
                                        <?php echo $nm_lang['form_pass_new']; ?>
                                    </td>
                                    <td valign="top" height="35px" class="nmText">
                                        <input type="hidden" name="field_pass_old" value="scriptcase"/>
                                        <input type="password" name="field_pass_new" size="14" class="nmInput"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top" height="35px" class="nmTextTitle" align="left">
                                        <?php echo $nm_lang['form_pass_conf']; ?>
                                    </td>
                                    <td valign="top" height="35px" class="nmText">
                                        <input type="password" name="field_pass_conf" size="14" class="nmInput"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center">
                                        <div id="loginButtonsLogin" onclick='document.form_prod.submit();'>
                                            <a href="javascript: document.form_prod.submit();"> <?php echo $nm_lang['button_change']; ?> </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            } else {
                                ?>
                                <tr>
                                    <td valign="middle" class="nmTextTitle" align="right">
                                        <?php echo $nm_lang['form_password']; ?>
                                    </td>
                                    <td valign="middle" class="nmText">
                                        <input type="password" name="field_pass" class="nmInput" size="12"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="middle" class="nmTextTitle" align="right">
                                        <?php echo $nm_lang['form_language']; ?>
                                    </td>
                                    <td valign="middle" class="nmText">
                                        <select name="field_language" class="nmInput"
                                                onChange="document.form_prod.submit()"/>
                                        <?php
                                        foreach ($arr_lang as $str_code => $str_lang) {
                                            $str_sel = ($str_comp == $str_code) ? ' selected="selected"' : '';
                                            ?>
                                            <option
                                                value="<?php echo $str_code; ?>"<?php echo $str_sel; ?>><?php echo $str_lang; ?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center" height="50" valign="bottom">
                                        <div id="loginButtonsLogin" onclick='document.form_prod.submit();'>
                                            <a href="javascript: document.form_prod.submit();"> Login </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>

                    <!-- xx form -->
                </div>

                <!-- infos -->
                <div id="loginPartsInfos">
                    <span class="nmLoginErroMsg" style="display: none"
                          id="id_erro_msg"><?php echo $str_msg_login; ?></span>
                        <span id="id_sem_erro_msg">
                            <?php echo empty($str_msg_login) ? "&nbsp;" : $str_msg_login; ?>
                        </span>
                    <br/>
                    <?php
                    if ($v_tp_win != 'change_pass' && (('' == $v_str_pass) || ('scriptcase' == $v_str_pass))) {
                        ?>
                        <div id="id_login_msg">
                            <?php

                            echo "<span>" . $nm_lang['login_warning'] . "</span>";

                            ?>
                        </div>
                    <?php } ?>
                </div>
                <!-- xx infos -->
            </td>
        </tr>
        <tr>
            <td style='height: 10%'></td>
        </tr>
        <tr>
            <td style='height: 1%' id='id_cp'>
                <div id='sc_footer'>
                    <div class='left'>
                        <span><?php echo $cp;?></span>
                    </div>
                    <div class='right'>
                        <span style='margin-right: 30px;'><?php echo $ver;?></span>
                    </div>
                </div>
            </td>
        </tr>
    </table>

<?php
} // nm_prod_display_login

function nm_prod_display_main_menu($b_msg)
{
    global $nm_config, $nm_lang;
    ?>
    <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" height="97%"
           style="border-collapse:collapse;" class="nmPageTop">
        <tr class="nmMenuLine"
        ">
        <td class="nmMenuLine" valign="middle" colspan="2">
            <table border=0>
                <tr>
                    <td class="nmTextTitle3">
                        <img src="../../img/sc_ico.png" border="0" align="absmiddle"/>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <?php echo $nm_lang['sc_prod']; ?>
                    </td>
                </tr>
            </table>
        </td>
        </tr>
        <tr>
            <td width="300" valign="top" style="padding:10px" class="nmTable">

                <table class="nmTable" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td class="nmTitle">
                    <span class="nmTextTitle">
                        <?php echo $nm_lang['connection']; ?>
                    </span>
                        </td>
                    </tr>
                    <tr class="nmTableTd">
                        <td class="nmLineV3">
                            &nbsp;&nbsp;<a href="javascript: nm_set_option('profile_new', '', 'nm_iframe')"
                                           title="<?php echo $nm_lang['hint_profile_new']; ?>"
                                           class="nmText"><?php echo $nm_lang['main_profile_new']; ?></a>
                        </td>
                    </tr>
<!--                    <tr class="nmTableTd">-->
<!--                        <td class="nmLineV3">-->
<!--                            &nbsp;&nbsp;<a href="javascript: nm_set_option('profile_new_2', '', 'nm_iframe')"-->
<!--                                           title="--><?php //echo $nm_lang['hint_profile_new']; ?><!--"-->
<!--                                           class="nmText">--><?php //echo $nm_lang['main_profile_new']; ?><!--</a>-->
<!--                        </td>-->
<!--                    </tr>-->
                    <tr class="nmTableTd">
                        <td class="nmLineV3">
                            &nbsp;&nbsp;<a href="javascript: nm_set_option('profile_edit', '', 'nm_iframe')"
                                           title="<?php echo $nm_lang['hint_profile_edit']; ?>"
                                           class="nmText"><?php echo $nm_lang['main_profile_edit']; ?></a>
                        </td>
                    </tr>
<!--                    <tr class="nmTableTd">-->
<!--                        <td class="nmLineV3">-->
<!--                            &nbsp;&nbsp;<a href="javascript: nm_set_option('profile_edit_2', '', 'nm_iframe')"-->
<!--                                           title="--><?php //echo $nm_lang['hint_profile_edit']; ?><!--"-->
<!--                                           class="nmText">--><?php //echo $nm_lang['main_profile_edit']; ?><!--</a>-->
<!--                        </td>-->
<!--                    </tr>-->
                    <tr class="nmTableTd">
                        <td class="nmLineV3">
                            &nbsp;&nbsp;<a href="javascript: nm_set_option('profile_rename', '', 'nm_iframe')"
                                           title="<?php echo $nm_lang['hint_profile_rename']; ?>"
                                           class="nmText"><?php echo $nm_lang['main_profile_rename']; ?></a>
                        </td>
                    </tr>
                    <!--tr class="nmTableTd">
              <td class="nmLineV3">
              &nbsp;&nbsp;<a href="javascript: nm_set_option('profile_delete', '', 'nm_iframe')" title="<?php echo $nm_lang['hint_profile_delete']; ?>" class="nmText"><?php echo $nm_lang['main_profile_delete']; ?></a>
              </td>
             </tr>
             <tr class="nmTableTd">
              <td class="nmLineV3">
              &nbsp;&nbsp;<a href="javascript: nm_set_option('profile_test', '', 'nm_iframe')" title="<?php echo $nm_lang['hint_profile_test']; ?>" class="nmText"><?php echo $nm_lang['main_profile_test']; ?></a>
              </td>
             </tr-->
                </table>

                <br/>

                <table class="nmTable" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td class="nmTitle">
                    <span class="nmTextTitle">
                        <?php echo $nm_lang['environment']; ?>
                    </span>
                        </td>
                    </tr>
                    <tr class="nmTableTd">
                        <td class="nmLineV3">
                            &nbsp;&nbsp;<a href="javascript: nm_set_option('environment', '', 'nm_iframe')"
                                           title="<?php echo $nm_lang['hint_environment']; ?>"
                                           class="nmText"><?php echo $nm_lang['main_environment']; ?></a>
                        </td>
                    </tr>
                    <tr class="nmTableTd">
                        <td class="nmLineV3">
                            &nbsp;&nbsp;<a href="javascript: nm_set_option('api', '', 'nm_iframe')"
                                           title="<?php echo $nm_lang['hint_api']; ?>"
                                           class="nmText"><?php echo $nm_lang['main_api']; ?></a>
                        </td>
                    </tr>
                    <tr class="nmTableTd">
                        <td class="nmLineV3">
                            &nbsp;&nbsp;<a href="javascript: nm_set_option('change_pass', '', 'nm_iframe')"
                                           title="<?php echo $nm_lang['hint_change_pass']; ?>"
                                           class="nmText"><?php echo $nm_lang['main_password']; ?></a>
                        </td>
                    </tr>
                    <tr class="nmTableTd">
                        <td class="nmLineV3">
                            <?php
                            switch ($_SESSION['nm_session']['prod_v8']['lang']) {
                                case "pt-br":
                                    $str_lang = "pt_br";
                                    $site_lang = ".com.br";
                                    $pub_lang = "manual/12-publicacao/01-visao-geral/";
                                    break;
                                case "es-es":
                                    $str_lang = "es_es";
                                    $site_lang = ".net";
                                    $pub_lang = "manual/12-despliegue/01-vision-general/";
                                    break;
                                default:
                                    $str_lang = "en_us";
                                    $site_lang = ".net";
                                    $pub_lang = "manual/12-deploy/01-general-view/";
                                    break;
                            }

                            //$arr_file = @file("http://www.scriptcase{$site_lang}/docs/{$str_lang}/v81/manual_mp.htm");
                            $arr_file = @file("http://www.scriptcase{$site_lang}/docs/{$str_lang}/v9/index.html");

                            if (is_array($arr_file) && count($arr_file) > 1) {
                                ?>
                                &nbsp;&nbsp;<a
                                    href="http://www.scriptcase<?php echo $site_lang; ?>/docs/<?php echo $str_lang; ?>/v9/<?php echo $pub_lang; ?>"
                                    title="<?php echo $nm_lang['lbl_help']; ?>" class="nmText"
                                    target="_blank"><?php echo $nm_lang['lbl_help']; ?></a>
                            <?php
                            } else {
                                ?>
                                &nbsp;&nbsp;<a
                                    href="javascript:alert('<?php echo html_entity_decode($nm_lang['msg_not_internet']); ?>');"
                                    title="<?php echo $nm_lang['lbl_help']; ?>"
                                    class="nmText"><?php echo $nm_lang['lbl_help']; ?></a>
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <tr class="nmTableTd">
                        <td class="nmLineV3">
                            &nbsp;&nbsp;<a href="javascript: nm_set_option('logout', '', '_top')"
                                           title="<?php echo $nm_lang['hint_logout']; ?>"
                                           class="nmText"><?php echo $nm_lang['main_logout']; ?></a>
                        </td>
                    </tr>
                </table>
            </td>
            <td valign="top" align="center" style="height:100%;padding: 10px;" class="nmTable">
                <?php
                if ($b_msg) {
                    $str_msg = isset($_POST['opt_par']) ? $_POST['opt_par'] : '';
                    ?>
                    <iframe name="nm_iframe" id="id_iframe" width="100%" height="100%"
                            src="<?php echo nm_prod_url_rand($nm_config['url_lib'] . 'nm_ini_manager2.php?option=msg&msg=' . urlencode($str_msg)); ?>"
                            frameborder="0"
                            style="border-style: none; border-width: 0px;margin:0px; padding: 0px;"></iframe>
                <?php
                } else {
                    ?>
                    <iframe name="nm_iframe" id="id_iframe" width="100%" height="100%" src="../../img/index.html"
                            frameborder="0"
                            style="border-style: none; border-width: 0px;margin:0px; padding: 0px;"></iframe>
                <?php
                }
                ?>
                <!--iframe name="nm_iframe" id="id_iframe" width="640" height="468" src="../../img/index.html" frameborder="0" style="border-style: none; border-width: 0px;margin:0px; padding: 0px;"></iframe-->
            </td>
        </tr>
    </table>

<?php

$arr_new_conn = nm_prod_get_pending_connections();
$int_col_total = 3;
$int_col_width = floor(100 / $int_col_total);
$int_con_count = 0;
if (!empty($arr_new_conn))
{
?>
    <SCRIPT>
        nm_set_option('connections_pendent', '', 'nm_iframe');
    </SCRIPT>
<?php
}

} // nm_prod_display_main_menu


function nm_prod_display_connections_pendent()
{
    global $nm_config, $nm_lang;
    ?>
    <table cellpadding="0" cellspacing="0" border="0" align="center" style="border-collapse:collapse;">
        <?php

        $arr_new_conn = nm_prod_get_pending_connections();
        $int_col_total = 3;
        $int_col_width = floor(100 / $int_col_total);
        $int_con_count = 0;
        if (!empty($arr_new_conn)) {
            ?>
            <tr>
                <td>
                    <br/>
                    <table>
                        <tr>
                            <td class="nmOddText" style="padding: 4px 10px"
                                colspan="<?php echo $int_col_total; ?>"><?php echo $nm_lang['main_warn_conn']; ?></td>
                        </tr>
                        <?php
                        $int_col_count = 0;
                        foreach ($arr_new_conn as $str_new_conn) {
                            if (0 == $int_col_count) {
                                ?>
                                <tr>
                            <?php
                            }
                            $int_con_count++;
                            ?>
                            <td class="nmOddText"
                                style="padding: 4px 10px; text-align: center; width: <?php echo $int_col_width; ?>%">
                                <a href="javascript: nm_set_option('profile_new', '<?php echo $str_new_conn; ?>', '')" class="nmLinkData"><img src="../../img/database.png" style="height:64px; width:64px" border="0"/></a>
                                <br/>
                                <a href="javascript: nm_set_option('profile_new', '<?php echo $str_new_conn; ?>', '')" class="nmLinkData"><?php echo $str_new_conn; ?></a> <a href="javascript: confirmDeletePreProfile('delete_preprofile', '<?php echo $str_new_conn; ?>', '')"><img src="../../img/nm_lixeira.gif" border=0 align="absmiddle" /></a>
                            </td>
                            <?php
                            $int_col_count++;
                            if (sizeof($arr_new_conn) == $int_con_count && $int_col_count != $int_col_total) {
                                $int_colspan = $int_col_total - $int_col_count;
                                ?>
                                <td class="nmOddText" style="padding: 4px 10px" colspan="<?php echo $int_colspan; ?>">
                                    &nbsp;</td>
                            <?php
                            }
                            if ($int_col_count == $int_col_total || sizeof($arr_new_conn) == $int_con_count) {
                                $int_col_count = 0;
                                ?>
                                </tr>
                            <?php
                            }
                        }
                        ?>
                    </table>
                </td>
            </tr>
        <?php
        }

        ?>
    </table>
<?php
} // nm_prod_display_connections_pendent


function nm_prod_display_profile_general()
{
    global $arr_dbms, $nm_lang, $str_step;
    ?>
    <div style="text-align: center">
        <table class="nmTable" style="width: 500px;margin:0px auto;" align="center">
            <tr>
                <td class="nmTitle" colspan="2"
                    style="white-space: nowrap"><?php echo $nm_lang['profile_general']; ?></td>
            </tr>
            <tr>
                <td class="nmLineV3"><?php echo $nm_lang['form_dbms']; ?></td>
                <td class="nmLineV3">
                    <?php
                    if (1 == sizeof($arr_dbms[$_SESSION['nm_session']['prod_v8']['profile']['dbms_group']])) {
                        reset($arr_dbms[$_SESSION['nm_session']['prod_v8']['profile']['dbms_group']]);
                        $str_dbms = current($arr_dbms[$_SESSION['nm_session']['prod_v8']['profile']['dbms_group']]);
                        ?>
                        <input type="hidden" name="field_dbms" value="<?php echo $str_dbms; ?>"/>
                        <?php echo $nm_lang[$str_dbms]; ?>
                    <?php
                    } else {
                        ?>
                        <select name="field_dbms" class="nmInput">
                            <?php
                            foreach ($arr_dbms[$_SESSION['nm_session']['prod_v8']['profile']['dbms_group']] as $str_dbms) {
                                ?>
                                <option
                                    value="<?php echo $str_dbms; ?>"<?php if ($str_dbms == $_SESSION['nm_session']['prod_v8']['profile']['dbms']) {
                                    echo ' selected="selected"';
                                } ?>><?php echo $nm_lang[$str_dbms]; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    <?php
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td class="nmLineV3"><?php echo $nm_lang['form_dec']; ?></td>
                <td class="nmLineV3">
                    <select name="field_decimal" class="nmInput">
                        <option value="."<?php if ('.' == $_SESSION['nm_session']['prod_v8']['profile']['decimal']) {
                            echo ' selected="selected"';
                        } ?>><?php echo $nm_lang['form_dec_dot']; ?></option>
                        <option value=","<?php if (',' == $_SESSION['nm_session']['prod_v8']['profile']['decimal']) {
                            echo ' selected="selected"';
                        } ?>><?php echo $nm_lang['form_dec_comma']; ?></option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="nmLineV3"><?php echo $nm_lang['form_use_persistent']; ?></td>
                <td class="nmLineV3">
                    <select name="field_use_persistent" class="nmInput">
                        <option
                            value="Y"<?php if ('Y' == $_SESSION['nm_session']['prod_v8']['profile']['use_persistent']) {
                            echo ' selected="selected"';
                        } ?>><?php echo $nm_lang['form_persistente_y']; ?></option>
                        <option
                            value="N"<?php if ('N' == $_SESSION['nm_session']['prod_v8']['profile']['use_persistent'] || empty($_SESSION['nm_session']['prod_v8']['profile']['use_persistent'])) {
                            echo ' selected="selected"';
                        } ?>><?php echo $nm_lang['form_persistente_n']; ?></option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="nmLineV3"><?php echo $nm_lang['form_use_schema']; ?></td>
                <td class="nmLineV3">
                    <select name="field_use_schema" class="nmInput">
                        <option
                            value="Y"<?php if ('Y' == $_SESSION['nm_session']['prod_v8']['profile']['use_schema']) {
                            echo ' selected="selected"';
                        } ?>><?php echo $nm_lang['form_persistente_y']; ?></option>
                        <option
                            value="N"<?php if ('N' == $_SESSION['nm_session']['prod_v8']['profile']['use_schema'] || empty($_SESSION['nm_session']['prod_v8']['profile']['use_schema'])) {
                            echo ' selected="selected"';
                        } ?>><?php echo $nm_lang['form_persistente_n']; ?></option>
                    </select>
                </td>
            </tr>
        </table>
        <br/>
        <input type="hidden" name="step" value="<?php echo $str_step; ?>"/>
        <input type="submit" value="<?php echo $nm_lang['button_continue']; ?>" class="nmButton"/>
        <input type="button" value="<?php echo $nm_lang['button_cancel']; ?>"
               onClick="nm_set_option('main_menu', '', 'nm_iframe')" class="nmButton"/>
    </div>
<?php
} // nm_prod_display_profile_general


function nm_prod_display_profile_rename()
{
    global $arr_ini, $nm_lang;
    $arr_profiles = array_keys($arr_ini['PROFILE']);
    if (empty($arr_profiles)) {
        ?>
        <div style="text-align: center;">
            <table class="nmTable" style="width: 500px;margin:0px auto;text-align: center;" align="center">
                <tr>
                    <td class="nmTitle" style="white-space: nowrap"><?php echo $nm_lang['profile_rename']; ?></td>
                </tr>
                <tr>
                    <td class="nmLineV3"><?php echo $nm_lang['profile_rename_empty']; ?></td>
                </tr>
            </table>
            <br/>
            <input type="button" value="<?php echo $nm_lang['button_back']; ?>"
                   onClick="nm_set_option('main_menu', '', 'nm_iframe')" class="nmButton"/>
        </div>
    <?php
    } else {
        natcasesort($arr_profiles);

        $conn_sel = isset($_POST['field_profile']) ? $_POST['field_profile'] : "";
        ?>
        <div style="text-align: center">
            <table class="nmTable" style="width: 500px;margin:0px auto;" align="center" cellpadding="3px">
                <tr>
                    <td class="nmTitle" style="white-space: nowrap"
                        colspan="5"><?php echo $nm_lang['profile_rename']; ?></td>
                </tr>
                <tr>
                    <td colspan="5">&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <td class="nmLineV3" align="right"><?php echo $nm_lang['rem_conn_sel_conn']; ?>&nbsp;</td>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <td>
                        <select name="field_profile" class="nmInput ">
                            <option></option>
                            <?php
                            foreach ($arr_profiles as $str_profile) {
                                $sel = $conn_sel == $str_profile ? " selected " : "";
                                ?>
                                <option
                                    value="<?php echo $str_profile; ?>" <?php echo $sel; ?>><?php echo $str_profile; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <td class="nmLineV3" align="right"><?php echo $nm_lang['rem_conn_new_name']; ?>&nbsp;</td>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <td><input type="text" name="field_new_name" class="nmInput"/></td>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="5">&nbsp;</td>
                </tr>
            </table>
            <br/>
            <!--input type="submit" value="<?php echo $nm_lang['button_rename']; ?>" class="nmButton" -->
            <input type="button" value="<?php echo $nm_lang['button_rename']; ?>"
                   onclick="nm_set_option('profile_rename', '', 'nm_iframe')" class="nmButton">
            <input type="button" value="<?php echo $nm_lang['button_cancel']; ?>"
                   onClick="nm_set_option('main_menu', '', '_top')" class="nmButton"/>
        </div>
    <?php
    }
} // nm_prod_display_profile_rename

function nm_prod_display_profile_select()
{
    global $arr_ini, $nm_lang, $str_step;
    $arr_profiles = array_keys($arr_ini['PROFILE']);
    if (empty($arr_profiles)) {
        ?>
        <div style="text-align: center">
            <table class="nmTable" style="width: 500px" align="center">
                <tr>
                    <td class="nmTitle" style="white-space: nowrap"><?php echo $nm_lang['profile_select']; ?></td>
                </tr>
                <tr>
                    <td class="nmLineV3"><?php echo $nm_lang['profile_select_empty']; ?></td>
                </tr>
            </table>
            <br/>
            <input type="button" value="<?php echo $nm_lang['button_back']; ?>"
                   onClick="nm_set_option('main_menu', '', 'nm_iframe')" class="nmButton"/>
        </div>
    <?php
    } else {
        natcasesort($arr_profiles);
        ?>
        <div style="text-align: center">
            <table class="nmTable" style="width: 500px" align="center">
                <tr>
                    <td class="nmTitle" style="white-space: nowrap"><?php echo $nm_lang['profile_select']; ?></td>
                </tr>
                <tr>
                    <td class="nmLineV3">
                        <?php echo $nm_lang['profile_select_warning']; ?>
                        <div style="text-align: center">
                            <br/>
                            <select name="field_profile" class="nmInput">
                                <option></option>
                                <?php
                                foreach ($arr_profiles as $str_profile) {
                                    ?>
                                    <option value="<?php echo $str_profile; ?>"><?php echo $str_profile; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </td>
                </tr>
            </table>
            <br/>
            <input type="hidden" name="step" value="<?php echo $str_step; ?>"/>
            <input type="submit" value="<?php echo $nm_lang['button_edit']; ?>" class="nmButton"/>
            <input type="button" value="<?php echo $nm_lang['button_cancel']; ?>"
                   onClick="nm_set_option('main_menu', '', 'nm_iframe')" class="nmButton"/>
        </div>
    <?php
    }
} // nm_prod_display_profile_select


function nm_prod_display_profile_test_select()
{
    global $arr_ini, $nm_lang;
    $arr_profiles = array_keys($arr_ini['PROFILE']);
    if (empty($arr_profiles)) {
        ?>
        <div style="text-align: center">
            <table class="nmTable" style="width: 500px" align="center">
                <tr>
                    <td class="nmTitle" style="white-space: nowrap"><?php echo $nm_lang['profile_test']; ?></td>
                </tr>
                <tr>
                    <td class="nmLineV3"><?php echo $nm_lang['profile_test_empty']; ?></td>
                </tr>
            </table>
            <br/>
            <input type="button" value="<?php echo $nm_lang['button_back']; ?>"
                   onClick="nm_set_option('main_menu', '', 'nm_iframe')" class="nmButton"/>
        </div>
    <?php
    } else {
        natcasesort($arr_profiles);
        ?>
        <div style="text-align: center">
            <table class="nmTable" style="width: 500px" align="center">
                <tr>
                    <td class="nmTitle" style="white-space: nowrap"><?php echo $nm_lang['profile_test']; ?></td>
                </tr>
                <tr>
                    <td class="nmLineV3">
                        <?php echo $nm_lang['profile_test_warning']; ?>
                        <div style="text-align: center">
                            <br/>
                            <select name="field_profile" class="nmInput">
                                <option></option>
                                <?php
                                foreach ($arr_profiles as $str_profile) {
                                    ?>
                                    <option value="<?php echo $str_profile; ?>"><?php echo $str_profile; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </td>
                </tr>
            </table>
            <br/>
            <input type="button" value="<?php echo $nm_lang['button_test']; ?>" onClick="nm_test_conn()"
                   class="nmButton"/>
            <input type="button" value="<?php echo $nm_lang['button_cancel']; ?>"
                   onClick="nm_set_option('main_menu', '', 'nm_iframe')" class="nmButton"/>
        </div>
    <?php
    }
} // nm_prod_display_profile_test_select



function nm_prod_display_api()
{
    global $nm_config, $nm_lang;


    $arr_profiles = [];


    $file = $nm_config['path_conf']."profile_api.conf.php";
    if(file_exists($file))
    {
        $str_content = strtr(file_get_contents( $file ), array("<?php" => '', "?>" => ''));
        $arr_profiles = unserialize(trim($str_content));
    }


    $arr_new = [];
    $arr_files = scandir($nm_config['path_conf']);
    foreach($arr_files as $file)
    {
        if(substr($file, 0 , 8) == 'new_api_')
        {
            $arr_new[$file] = file_get_contents($nm_config['path_conf'].$file);
        }
    }



?>
<style>
.nmLineV3{padding:4px;}
</style>
        <div style="text-align: center;margin-top:10px;">
            <div style="width: 600px; margin: 0 auto;text-align:left">
             <?php foreach($arr_new as $profile => $name): ?>
                 <a href="javascript:nm_set_option('api_edit_profile', '<?php echo $profile ?>', 'nm_iframe')" style="color:#000;    display: inline-block; text-align: center;width:67px">
                    <img src="../../img/api.png" border=0 align="absmiddle" style="width:60px"/>
                    <span><?php echo $name; ?></span>
                 </a>
             <?php endforeach;?>
            </div>
            <div style="width: 600px; margin: 0 auto;text-align:right">
                <input type="button" value="<?php echo $nm_lang['button_add']; ?>"
                   onClick="nm_set_option('api_add_profile', '', 'nm_iframe')" class="nmButton"/>
            </div>
            <table class="nmTable" style="width: 600px; margin: 0 auto;border:1px solid #333;padding:3px;padding:3px" align="center">
                <!--<tr >
                    <td colspan="4" class="nmTitle" style="white-space: nowrap"><?php /*echo $nm_lang['api']; */?></td>
                </tr>-->

                <tr class="nmTitle">
                    <td class="nmLineV3">#</td>
                    <td class="nmLineV3"><?php echo $nm_lang['name']; ?></td>
                    <td class="nmLineV3"><?php echo $nm_lang['gateway']; ?></td>
                    <td class="nmLineV3"><?php echo $nm_lang['action']; ?></td>
                </tr>

                <?php $i=1; foreach($arr_profiles as $profile): ?>
                <tr>
                    <td class="nmLineV3"><?php echo $i; ?></td>
                    <td class="nmLineV3"><?php echo $profile['name']; ?></td>
                    <td class="nmLineV3"><?php echo $profile['gateway']; ?></td>
                    <td class="nmLineV3">
                        <a href="javascript:nm_set_option('api_edit_profile', '<?php echo $profile['id'] ?>', 'nm_iframe')" style="color:#000"><?php echo $nm_lang['button_edit']; ?></a>
                        | <a href="javascript:nm_set_option('api_delete_profile', '<?php echo $profile['id'] ?>', 'nm_iframe')" style="color:#000"><?php echo $nm_lang['button_delete']; ?></a>
                    </td>
                </tr>
                <?php $i++; endforeach; ?>
            </table>
            <br/>

        </div>
    <?php
} // nm_prod_display_profile_test_select



function nm_prod_display_api_add_profile($id = -1)
{
    global $nm_config, $nm_lang;


    $arr_profiles = [];


    $file = $nm_config['path_conf']."profile_api.conf.php";
    if(file_exists($file))
    {
        $str_content = strtr(file_get_contents( $file ), array("<?php" => '', "?>" => ''));
        $arr_profiles = unserialize(trim($str_content));
    }

    include_once(__DIR__.'/nm_api.php');

    $arr_gateways = nm_get_api_gateways();
    $api = [];
    if($id != -1)
    {
        foreach($arr_profiles as $arr_data)
        {
            if($arr_data['id'] == $id)
            {
                $api = $arr_data;
            }
        }
    }
    $name_default = (isset($api['name']) ? $api['name'] : '');
    $new_flag = '';
    if(empty($name_default) && !is_numeric($id) && file_exists($nm_config['path_conf'].$id))
    {
        $name_default = file_get_contents($nm_config['path_conf'].$id);
        $new_flag = $id;
    }

    $gateway_default = isset($api['gateway']) ? $api['gateway'] : 'smtp';
?>
<style>
    .gw {
        display: none
    }

    .row {
        margin-bottom: 2px;
    }
    .nmLineV3{
        padding:3px;
    }
    *{font-size:14px;}
    .form-control{width:100%; height:23px;}
</style>
<script src="../../third/jquery/js/jquery.js"></script>

        <div style="text-align: center;margin-top:20px">
            <div style="width: 600px; margin: 0 auto;text-align:right">
            <form method="post" action="nm_ini_manager2.php">
            <input type="hidden" name="option" value="api_save">
            <input type="hidden" name="api_id" value="<?php echo $api['id']; ?>">
            <input type="hidden" name="new_flag" value="<?php echo $new_flag; ?>">
                <table class="nmTable" style="width: 600px; margin: 0 auto;;padding:3px;padding:3px">
                    <tr class="row">
                        <td style="width:150px;" class="nmLineV3">
                            <strong><?php echo $nm_lang['name']; ?></strong>
                        </td>

                        <td class="nmLineV3">
                            <input class="nmInput form-control" name="name" required="required" id="id_name_api"
                                   placeholder="<?php echo $nm_lang['name']; ?>"
                                   value="<?php echo $name_default; ?>">
                        </td>
                    </tr>


                <tr>
                    <td style="width:150px;" class="nmLineV3">
                        <strong><?php echo $nm_lang['gateway']; ?></strong>
                    </td>

                        <td class="nmLineV3">
                            <select name="gateway" class="form-control" onchange="$('.gw').hide(); $('#id_gw_'+this.value.split('__NM__')[1]).show();" required="required">
                                <?php foreach ($arr_gateways as $type => $arr_gat): ?>
                                <optgroup label="<?=ucfirst($type)?>">
                                <?php foreach ($arr_gat as $k => $gw_data): ?>
                                    <option value="<?php echo $type . '__NM__'.$k; ?>" <?php echo $api['gateway'] == $k ? "selected='selected'" : ''; ?> >
                                        <?php echo $k; ?>
                                    </option>
                                <?php endforeach; ?>
                                </optgroup>
                                <?php endforeach; ?>
                            </select>
                        </td>
                  </tr>
            <?php foreach ($arr_gateways as $type => $arr_gw_data): ?>
            <?php foreach ($arr_gw_data as $k => $gw_data): ?>
            <tr id="id_gw_<?php echo $k; ?>"
                 class="gw" <?php echo($k == $gateway_default ? "style='display:table-row'" : ""); ?>>
                 <td colspan="2">
                     <table class="nmTable" style="width:100%">
                    <?php foreach ($gw_data as $field_name => $value): ?>
                        <tr class="row">
                            <td style="width:150px;" class="nmLineV3">
                                <strong><?php echo  ucfirst(implode(' ', explode('_',$field_name))) ; ?></strong>
                            </td>
                            <td class="nmLineV3">
                                <?php if( $value['type'] == 'select'): ?>
                                <select name="<?php echo $k; ?>[<?php echo $field_name; ?>]" class="nmInput form-control">
                                    <?php $selected = (isset($api['settings'][$field_name]) ? $api['settings'][$field_name] : '') ?>
                                    <?php foreach($value['options'] as $v): ?>
                                        <option <?php echo $selected == $v ? "selected='selected'" : "" ?>><?php echo $v; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            <?php else: ?>
                            <input type="<?php echo isset($value['type'])? $value['type'] : 'text'; ?>" class="nmInput form-control" name="<?php echo $k; ?>[<?php echo $field_name; ?>]" required="required" <?=$on_change?>
                                   placeholder="<?php echo $value['placeholder']; ?>"
                                   value="<?php echo(isset($api['settings'][$field_name]) ? $api['settings'][$field_name] : '') ?>">
                            <?php endif; ?>

                            </td>
                        </tr>

                    <?php endforeach; ?>
                    </table>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php endforeach; ?>

            <tr>
                <td colspan="2" style="text-align: center">
                 <input type="button" value="<?php echo $nm_lang['button_back']; ?>"
                   onClick="nm_set_option('api', '', 'nm_iframe')" class="nmButton"/>
                 <input type="button" value="<?php echo $nm_lang['button_save']; ?>"
                   onClick="nm_set_option('api_save', '<?php echo (isset($api['id'])?$api['id'] : -1) ; ?>', 'nm_iframe')" class="nmButton"/>
                </td>
            </tr>

            </table>

    </form>
            <br/>

        </div>
    <?php
}


function nm_prod_error_filter($v_str_msg)
{
    global $nm_db;
    if ('' == trim($v_str_msg)) {
        return FALSE;
    } elseif (FALSE !== strpos($v_str_msg, 'Changed language setting')) {
        return FALSE;
    } elseif (FALSE !== strpos($v_str_msg, 'Changed database context to')) {
        return FALSE;
    } elseif (FALSE !== strpos($v_str_msg, 'Creating default object from empty value')) {
        return FALSE;
    } elseif (FALSE !== strpos($v_str_msg, 'should be compatible with that of')) {
        return FALSE;
    } elseif (FALSE !== strpos($v_str_msg, 'Contexto do banco de dados alterado para')) {
        return FALSE;
    } elseif (FALSE !== strpos($v_str_msg, 'Contexto do banco de dados modificado para')) {
        return FALSE;
    } elseif (FALSE !== strpos($v_str_msg, "Invalid object name 'sys.schemas'")) {
        return FALSE;
    } elseif (FALSE !== strpos($v_str_msg, 'do idioma alterada para')) {
        return FALSE;
    } elseif (FALSE !== strpos(strtolower($v_str_msg), 'n de idioma a espa')) {
        return FALSE;
    } elseif (FALSE !== strpos($v_str_msg, 'Qualified object name COLUMNS not valid')) {
        return FALSE;
    } elseif (FALSE !== strpos($v_str_msg, 'Check messages from the SQL Server')) {
        return FALSE;
    } elseif (FALSE !== strpos(strtolower($v_str_msg), 'seclabelname')) {
        return FALSE;
    } elseif (FALSE !== strpos(strtolower($v_str_msg), 'db2admin.rcml01')) {
        return FALSE;
    } elseif (FALSE !== strpos(strtolower($v_str_msg), 'nada foi executado')) {
        return FALSE;
    } elseif (FALSE !== strpos(strtolower($v_str_msg), 'the mysql extension is deprecated and will be removed in the future')) {
        return FALSE;
    } elseif (FALSE !== strpos(strtolower($v_str_msg), 'driver doesn\'t support meta data')) {
        return FALSE;
    } else {
        return TRUE;
    }
} // nm_prod_error_filter

function nm_prod_error_handler($v_int_no, $v_str_msg, $v_str_script,
                               $v_int_line, $v_arr_context = array())
{
    global $str_db_err;
    $arr_handled = array(
        E_ERROR,
        E_WARNING,
        E_PARSE,
        E_NOTICE,
        E_CORE_ERROR,
        E_CORE_WARNING,
        E_COMPILE_ERROR,
        E_COMPILE_WARNING,
        E_USER_ERROR,
        E_USER_WARNING,
        E_USER_NOTICE
    );
    if (in_array($v_int_no, $arr_handled) && '' != $v_str_msg) {
        if ((FALSE !== strpos($v_str_msg, 'Invoke() failed')) &&
            (FALSE !== strpos($v_str_msg, 'sybase_select_db()')) &&
            (FALSE !== strpos($v_str_msg, 'Changed database context to')) &&
            (FALSE !== strpos($v_str_msg, 'Creating default object from empty value')) &&
            (FALSE !== strpos($v_str_msg, 'should be compatible with that of')) &&
            (FALSE !== strpos($v_str_msg, 'Contexto do banco de dados alterado para')) &&
            (FALSE !== strpos($v_str_msg, 'Contexto do banco de dados modificado para')) &&
            (FALSE !== strpos($v_str_msg, 'do idioma alterada para')) &&
            (FALSE !== strpos(strtolower($v_str_msg), 'n de idioma a espa')) &&
            (FALSE !== strpos($v_str_msg, 'Unexpected results, cancelling current')) &&
            (FALSE !== strpos($v_str_msg, 'Only variable references should be returned by reference')) &&
            (FALSE !== strpos($v_str_msg, 'Only variables should be assigned by reference')) &&
            (FALSE !== strpos($v_str_msg, 'Undefined index:')) &&
            (FALSE !== strpos($v_str_msg, 'Assigning the return value of new by reference is deprecated')) &&
            (FALSE !== strpos($v_str_msg, 'var: Deprecated. Please use the')) &&
            (FALSE !== strpos($v_str_msg, "Invalid object name 'sys.schemas'")) &&
            (FALSE !== strpos($v_str_msg, "Qualified object name COLUMNS not valid")) &&
            (FALSE !== strpos($v_str_msg, "Check messages from the SQL Server")) &&
            (FALSE !== strpos($v_str_msg, 'Changed language')) &&
            (FALSE !== strpos(strtolower($v_str_msg), 'the mysql extension is deprecated and will be removed in the future')) &&
            (FALSE !== strpos(strtolower($v_str_msg), 'driver doesn\'t support meta data')) &&
            (FALSE !== strpos(strtolower($v_str_msg), 'unable to bind to server'))
        ) {
            $str_db_err = $v_str_msg;
        }
    }
} // nm_prod_error_handler

function nm_prod_get_old_connections()
{
    global $arr_ini;
    $arr_conn = array_keys($arr_ini['PROFILE']);
    natcasesort($arr_conn);
    return $arr_conn;
} // nm_prod_get_old_connections

function nm_prod_get_pending_connections()
{
    global $nm_config;

    $arr_new_conn = nm_prod_get_new_connections($nm_config['path_conf']);
    $arr_old_conn = nm_prod_get_old_connections();

    foreach ($arr_old_conn as $str_old_conn) {
        if (in_array($str_old_conn, $arr_new_conn)) {
            @unlink($nm_config['path_conf'] . 'new_connection_' . $str_old_conn);
            unset($arr_new_conn[array_search($str_old_conn, $arr_new_conn)]);
        }
    }

    return $arr_new_conn;
} // nm_prod_get_pending_connections

function nm_prod_get_new_connections($str_path)
{
    $arr_conn = array();
    $res_dir = @opendir($str_path);
    if ($res_dir) {
        while (false !== ($str_file_conn = @readdir($res_dir))) {
            if ('new_connection_' == substr($str_file_conn, 0, 15)) {
                $arr_conn[] = substr(trim($str_file_conn), 15);
            }
        }
        @closedir($res_dir);
    }
    natcasesort($arr_conn);
    return $arr_conn;
} // nm_prod_get_new_connections

function nm_prod_delete_new_connections($str_conn)
{
    global $nm_config;
    
    if(is_file($nm_config['path_conf'] . "new_connection_" . $str_conn))
    {
        unlink($nm_config['path_conf'] . "new_connection_" . $str_conn);
    }
    
} // nm_prod_get_new_connections

function nm_prod_lang()
{
    global $nm_config;
    if (!isset($_SESSION['nm_session']['prod_v8']['lang']) ||
        !@is_file($nm_config['path_lib'] . 'lang.' . $_SESSION['nm_session']['prod_v8']['lang'] . '.php')
    ) {
        $arr_accept = array();
        $str_accept = '';
        if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            if (FALSE !== strpos($_SERVER['HTTP_ACCEPT_LANGUAGE'], ',')) {
                $arr_accept = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
                $str_accept = $arr_accept[0];
            } else {
                $str_accept = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
            }
        } else {
            $str_accept = 'en-us';
        }
        if (!@is_file($nm_config['path_lib'] . 'lang.' . $str_accept . '.php')) {
            $str_accept = 'en-us';
        }

        //checa se a publicacao fixou algum idioma inicial
        if (@is_file("../../../conf/language")) {
            $str_language = implode("", file("../../../conf/language"));
            if (!empty($str_language)) {
                if ($str_language == 'pt_br') {
                    $str_accept = 'pt-br';
                } else {
                    $str_accept = 'en-us';
                }
            }
        }

        $_SESSION['nm_session']['prod_v8']['lang'] = $str_accept;
    }
} // nm_prod_lang

function nm_prod_list_lang()
{
    global $nm_config;
    $arr_lang = array();
    $res_dir = @opendir($nm_config['path_lib']);
    if ($res_dir) {
        while (FALSE !== ($str_file = @readdir($res_dir))) {
            if ('.' != $str_file && '..' != $str_file &&
                'lang.' == substr($str_file, 0, 5) &&
                '.php' == substr($str_file, -4) &&
                @is_file($nm_config['path_lib'] . $str_file)
            ) {
                $str_lang = substr($str_file, 5, -4);
                $arr_data = @file($nm_config['path_lib'] . $str_file);
                $arr_lang[$str_lang] = trim(substr($arr_data[1], 2));
            }
        }
        @closedir($res_dir);
    }
    return $arr_lang;
} // nm_prod_list_lang

function nm_prod_path()
{
    $arr_config = array();
    /* Calculo dos caminhos */
    $str_script = $_SERVER['PHP_SELF'];
    $str_url_base = dirname($str_script);
    if (in_array($str_url_base, array("\\", ".\\", './'))) {
        $str_url_base = '';
    }

    //alteracao diogo
    $dir_getcwd = getcwd();
    if (!empty($dir_getcwd)) {
        $str_path_base = $dir_getcwd . "/" . basename($_SERVER["SCRIPT_NAME"]);
    } else {
        if (isset($_SERVER["SCRIPT_FILENAME"])) {
            $str_path_base = $_SERVER["SCRIPT_FILENAME"];
        } else {
            $str_path_base = $_SERVER["ORIG_PATH_TRANSLATED"];
        }
    }
    //fim alteracao diogo

    $str_path_base = str_replace("\\", '/', $str_path_base);
    $str_root = substr($str_path_base, 0, (-1 * strlen($str_script)) + 1);
    $str_path_base = dirname($str_path_base);
    $str_path_prod = $str_path_base;
    $str_url_prod = $str_url_base;

    for ($i = 0; $i < 2; $i++) {
        $str_path_prod = substr($str_path_prod, 0, strrpos($str_path_prod, '/'));
        $str_url_prod = substr($str_url_prod, 0, strrpos($str_url_prod, '/'));
    }
    $str_path_conf = substr($str_path_prod, 0, strrpos($str_path_prod, '/'));

    $arr_config['script'] = $str_script;
    $arr_config['path_root'] = $str_root;
    $arr_config['path_conf'] = $str_path_conf . '/conf/';
    $arr_config['path_prod'] = $str_path_prod . '/';
    $arr_config['path_lib'] = $str_path_base . '/';
    $arr_config['url_prod'] = $str_url_prod . '/';
    $arr_config['url_img'] = $str_url_prod . '/img/';
    $arr_config['url_lib'] = $str_url_base . '/';

    return $arr_config;
} // nm_prod_path

function nm_prod_php_version()
{
    if (-1 != version_compare(phpversion(), '5.0.0')) {
        return 5;
    } elseif (-1 != version_compare(phpversion(), '4.0.0')) {
        return 4;
    } else {
        return 3;
    }
} // nm_prod_php_version

function nm_prod_url_rand($v_str_url, $v_bol_force = FALSE)
{
    $str_url = $v_str_url;
    $str_url .= (FALSE === strpos($v_str_url, '?'))
        ? '?rand='
        : '&rand=';
    $str_url .= substr(md5(mt_rand()), 8, 16);
    return $str_url;
} // nm_prod_url_rand

function trataError($errno, $errstr, $errfile, $errline)
{
    $arr_handled = array(
        E_ERROR,
        E_WARNING,
        E_PARSE,
        E_NOTICE,
        E_CORE_ERROR,
        E_CORE_WARNING,
        E_COMPILE_ERROR,
        E_COMPILE_WARNING,
        E_USER_ERROR,
        E_USER_WARNING,
        E_USER_NOTICE
    );

    if (strpos($errstr, "set_time_limit()") !== false) {
    } elseif (in_array($errno, $arr_handled) && '' != $errstr) {
        switch ($errno) {
            case E_ERROR:
                $errno = "FATAL";
                break;
            case E_WARNING:
                $errno = "WARNING";
                break;
            case E_NOTICE:
                $errno = "NOTICE";
                break;
            case E_PARSE:
                $errno = "PARSE ERROR";
                break;
        }
        if (in_array($errno, $arr_handled) && '' != $errstr) {
            if ((FALSE !== strpos($errstr, 'Invoke() failed')) &&
                (FALSE !== strpos($errstr, 'sybase_select_db()')) &&
                (FALSE !== strpos($errstr, 'Changed database context to')) &&
                (FALSE !== strpos($errstr, 'Creating default object from empty value')) &&
                (FALSE !== strpos($errstr, 'should be compatible with that of')) &&
                (FALSE !== strpos($errstr, 'Contexto do banco de dados alterado para')) &&
                (FALSE !== strpos($errstr, 'Contexto do banco de dados modificado para')) &&
                (FALSE !== strpos($errstr, "Invalid object name 'sys.schemas'")) &&
                (FALSE !== strpos($errstr, 'do idioma alterada para')) &&
                (FALSE !== strpos(errstr($v_str_msg), 'n de idioma a espa')) &&
                (FALSE !== strpos($errstr, 'Unexpected results, cancelling current')) &&
                (FALSE !== strpos($errstr, 'Only variable references should be returned by reference')) &&
                (FALSE !== strpos($errstr, 'Only variables should be assigned by reference')) &&
                (FALSE !== strpos($errstr, 'Undefined index:')) &&
                (FALSE !== strpos($errstr, 'Assigning the return value of new by reference is deprecated')) &&
                (FALSE !== strpos($errstr, 'var: Deprecated. Please use the')) &&
                (FALSE !== strpos($errstr, 'Qualified object name COLUMNS not valid')) &&
                (FALSE !== strpos($errstr, 'Check messages from the SQL Server')) &&
                (FALSE !== strpos($errstr, 'Changed language')) &&
                (FALSE !== strpos(strtolower($errstr), 'the mysql extension is deprecated and will be removed in the future')) &&
                (FALSE !== strpos(strtolower($errstr), 'driver doesn\'t support meta data')) &&
                (FALSE !== strpos(strtolower($errstr), 'unable to bind to server'))
            ) {
                echo $errno . ": " . $errstr . " in <B>" . $errfile . "</B> on line <B>" . $errline . "</B>";
            }
        }
    }
}

function nm_show_msg($str_msg, $par_reenviar)
{
    if ($par_reenviar) {
        ?>
        <script>

            setTimeout(function () {
                nm_set_option("main_menu_msg", "<?php echo $str_msg; ?>", "_top")
            }, 1000);

        </script>
    <?php
    } else {
        if (isset($_GET['msg']) && $_GET['msg'] != "" && $str_msg == "") {
            $str_msg = $_GET['msg'];
        }
        ?>
        <center>
            <div class="nmTable" style="width:370px; padding:5px; margin-top:50px;">
                <center>
                    <table class="nmTable" width="365px" style="border-style:dotted">
                        <tr>
                            <td width="10px">&nbsp;</td>
                            <td width="30px" align="center" valign="middle">
                                <img src="<?php echo $nm_config['path_lib'] . "devel/conf/img/check.png"; ?>"/>
                            </td>
                            <td class="nmText" align="center" valign="middle">
                                <br>
                                <?php echo $str_msg; ?>
                                </br>&nbsp;
                            </td>
                        </tr>
                    </table>
                </center>
            </div>
        </center>
    <?php
    }
}//nm_show_msg
?>