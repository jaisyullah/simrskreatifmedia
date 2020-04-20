/**
 * Abertura de janelas auxiliares.
 *
 * Rotinas de controle das janelas auxiliares do ScriptCase.
 *
 * @package     Biblioteca
 * @subpackage  Javascript
 * @creation    2004/02/14
 * @copyright   NetMake Solucoes em Informatica
 * @author      Diogo Silva Toscano De Brito <diogo@netmake.com.br>
 *
 * $Id: window.js,v 1.1.1.1 2011-05-12 20:31:30 diogo Exp $
 */


/*
 * antiga execucao das janelas de popup eram com rpc, agora passa a ser ajax
function nm_popup_status(obj_chk, str_popup)
{
	str_status = obj_chk.checked ? 'on' : 'off';
	rpcExecute(nm_url_iface + "popup_status.php?pop=" + str_popup + "&stat=" + str_status, "popup_status");
}
*/
function nm_popup_status(obj_chk, str_popup)
{
	str_status = obj_chk.checked ? 'on' : 'off';
	//window.open(nm_url_iface + "popup_status.php?pop=" + str_popup + "&stat=" + str_status);
	getDataAjax(nm_url_iface + "popup_status.php?pop=" + str_popup + "&stat=" + str_status, nm_popup_status_retorno);
}
function nm_popup_status_retorno(str_retorno)
{
}

function nm_window_bg(str_form, str_field, str_cback, str_css, str_cback_params)
{
 str_val = document.forms[str_form].elements[str_field].value;
 if (null == str_cback)
 {
  str_cback = '';
 }
 if (null == str_cback_params)
 {
  str_cback_params = '';
 }
 str_sep = (null == str_css) ? '' : '&css_sep=Y';
 obj_win = window.open(nm_url_compat + "nm_escolhe_fundo.php?form=" + str_form + "&field=" + str_field + "&image=" + str_val + "&cback=" + str_cback + "&cback_params=" + str_cback_params + str_sep, "nmWinBackgroundV5_" + nm_win_name, "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=500,height=420");
 obj_win.focus();
}

function nm_window_button()
{
 obj_win = window.open(nm_url_compat + "nm_button_list.php", "nmWinButtonV5_" + nm_win_name, "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=550,height=500");
 obj_win.focus();
}

function nm_window_schema_novo()
{
 obj_win = window.open(nm_url_rand(nm_url_iface + "app_schema.php"), "nmWinSchemaV5_" + nm_win_name, "scrollbars=yes, toolbar=no,location=no,directories=no,status=no,menubar=no,width=940,height=700");
 obj_win.focus();
}

function nm_window_prj_diagram()
{ 
 obj_win = window.open(nm_url_iface + "proj_diagram.php", "nmWinSchemaV5_" + nm_win_name, "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,left=0,top=0,width="+screen.width+",height=" + (screen.height - 70)); //width=940,height=705
 obj_win.focus();
}

function nm_window_connection_new()
{
 obj_win = window.open(nm_url_iface + "admin_sys_allconections_create_wizard.php", "connectionNew_" + nm_win_name, "width=500, height=400, directories=no, location=no, menubar=no, status=no, toolbar=no");
 obj_win.focus();
}

function nm_window_connection_edit(v_str_conn)
{
 obj_win = window.open(nm_url_iface + "connections.php?conn=" + v_str_conn, "connectionEdit_" + nm_win_name, "width=480, height=340, directories=no, location=no, menubar=no, status=yes, toolbar=no, scrollbars=yes,resizable=yes");
 obj_win.focus();
}

function nm_window_button_novo()
{
 obj_win = window.open(nm_url_iface + "buttons.php?reset=1", "nmWinButton2V5_" + nm_win_name, "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=900,height=600"); //scrollbars=auto
 obj_win.focus();
}

function nm_window_template_novo()
{
 obj_win = window.open(nm_url_iface + "app_template.php", "nmWinTemplateV5_" + nm_win_name, "toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,width=550,height=330");
 obj_win.focus();
}

function nm_window_color(str_form, str_field, str_cback, str_cback_params)
{
 str_val = document.forms[str_form].elements[str_field].value;
 if (null == str_cback)
 {
  str_cback = '';
 }
 if (null == str_cback_params)
 {
  str_cback_params = '';
 } 
 if (7 == str_val.length)
 {
  if (str_val.substring(0, 1) == "#")
  {
   str_val = str_val.substring(1, str_val.length);
  }
 }
 else
 {
  str_val = "";
 }
 obj_win = window.open(nm_url_compat + "nm_cor.php?form=" + str_form + "&field=" + str_field + "&cor=" + str_val + "&cback=" + str_cback + "&cback_params=" + str_cback_params, "nmWinColorV5_" + nm_win_name, "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=310,height=420");
 obj_win.focus();
}

function nm_window_date_limit(str_form, str_field, str_cback)
{
 str_val = document.forms[str_form].elements[str_field].value;
 if (null == str_cback)
 {
  str_cback = '';
 }
 obj_win = window.open(nm_url_compat + "nm_atualiza_dataatual.php?form=" + str_form + "&field=" + str_field + "&value=" + str_val + "&cback=" + str_cback, "nmWinDateLimitV5_" + nm_win_name, "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=250,height=200");
 obj_win.focus();
}

function nm_window_editor()
{
 obj_win = window.open(nm_url_iface + "popup_editor.php", "nmWinEditorV5_" + nm_win_name, "width=320, height=240, directories=no, location=no, menubar=no, status=no, toolbar=no");
 obj_win.focus();
}

function nm_window_font(str_form, str_field, str_cback)
{
 str_val = document.forms[str_form].elements[str_field].value;
 if (null == str_cback)
 {
  str_cback = '';
 }
 obj_win = window.open(nm_url_compat + "nm_atualiza_fontetexto.php?form=" + str_form + "&field=" + str_field + "&value=" + str_val + "&cback=" + str_cback, "nmWinFontV5_" + nm_win_name, "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=300,height=150");
 obj_win.focus();
}

function nm_window_group()
{
 obj_win = window.open(nm_url_iface + "group_change.php", "nmWinGroupChangeV5_" + nm_win_name, "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=200,height=75");
 obj_win.focus();
}

function nm_window_help_date()
{
 obj_win = window.open(nm_url_iface + "help_date_format.php", "nmWinHelpDateV5_" + nm_win_name, "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=400,height=420");
 obj_win.focus();
}

function nm_window_help_format()
{
 obj_win = window.open(nm_url_iface + "help_db_format.php", "nmWinHelpDateV5_" + nm_win_name, "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=400,height=420");
 obj_win.focus();
}

function nm_window_hint(int_hint)
{
 str_hint = (null == int_hint) ? "" : "?hint_no=" + int_hint;
 obj_win = window.open(nm_url_iface + "popup_hint.php" + str_hint, "nmWinHintV5_" + nm_win_name, "width=320, height=240, directories=no, location=no, menubar=no, status=no, toolbar=no");
 obj_win.focus();
}

function nm_window_icon(str_form, str_field, str_cback)
{
 str_val = document.forms[str_form].elements[str_field].value;
 if (null == str_cback)
 {
  str_cback = '';
 }
 obj_win = window.open(nm_url_compat + "nm_escolhe_icone.php?form=" + str_form + "&field=" + str_field + "&image=" + str_val + "&cback=" + str_cback, "nmWinIconV5_" + nm_win_name, "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=500,height=420");
 obj_win.focus();
}

function nm_window_aba(str_form, str_field, str_cback)
{
 str_val = document.forms[str_form].elements[str_field].value;
 if (null == str_cback)
 {
  str_cback = '';
 }
 obj_win = window.open(nm_url_compat + "nm_escolhe_aba.php?form=" + str_form + "&field=" + str_field + "&image=" + str_val + "&cback=" + str_cback, "nmWinIconV5_" + nm_win_name, "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=500,height=420");
 obj_win.focus();
}

function nm_window_image(str_form, str_field, str_cback, int_index, not_exib, sc_subfolder)
{
 str_index = (null == int_index || '' == int_index)
           ? '' : '&index=' + int_index;
 if ('' == str_index)
 {
  str_val = document.forms[str_form].elements[str_field].value;
 }
 else
 {
  str_val = document.forms[str_form].elements[str_field + "[" + int_index + "]"].value;
 }
 if (null == str_cback)
 {
  str_cback = '';
 }
 if (null == sc_subfolder)
 {
  sc_subfolder = '';
 } 

 str_not_exib = (not_exib != null) ? ('&notexib=' + not_exib) : '';
 
 obj_win = window.open(nm_url_compat + "nm_escolhe_imagem.php?form=" + str_form + "&field=" + str_field + "&image=" + str_val + "&cback=" + str_cback + str_index + str_not_exib + "&sc_subfolder=" + sc_subfolder, "nmWinImageV5_" + nm_win_name, "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=500,height=420");
 obj_win.focus();
}

function nm_window_import(str_field)
{
 window.open(nm_url_iface + 'app_import.php?option=radio&field=' + str_field, 'app_import', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=650,height=500');
}

function nm_window_init()
{
 obj_win = window.open(nm_url_iface + "popup_init.php", "nmWinInitV5_" + nm_win_name, "width=320, height=240, directories=no, location=no, menubar=no, status=no, toolbar=no");
 obj_win.focus();
}

function nm_window_suporte_upgrade()
{
 obj_win = window.open(nm_url_iface + "popup_suporte_upgrade.php", "nmWinSuporteUpgradetV5_" + nm_win_name, "width=400, height=280, directories=no, location=no, menubar=no, status=no, toolbar=no");
 obj_win.focus();
}

function nm_window_manual(str_url)
{
 if(str_url != '#')
 {
   obj_win = window.open(str_url, "nmWinWebhelpV5_" + nm_win_name, "width=750, height=440, directories=no, location=no, menubar=no, status=no, toolbar=no, resizable=yes, scrollbars=yes");
   obj_win.focus();
 }
}

function nm_window_open_app()
{
 obj_win = window.open(nm_url_iface + "open_app.php", "nmWinOpenAppV5_" + nm_win_name, "width=575, height=400, directories=no, location=no, menubar=no, status=no, toolbar=no, resizable=yes");
 obj_win.focus();
}

function nm_window_phpedit()
{
 obj_win = window.open(nm_url_rand(nm_url_compat + "nm_edit_php.php"), "nmWinEditPhpV5_" + nm_win_name, "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,width=820,height=620")
 obj_win.focus();
}

function nm_window_phptest()
{
 str_code = document.form_edit.Formula.value;
 obj_win  = window.open(nm_url_compat + "nm_test_php.php?nm_code=" + str_code, "nmWinTestPhpV5_" + nm_win_name, "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=600,height=420")
 obj_win.focus();
}

function nm_window_recent()
{
 obj_win = window.open(nm_url_iface + "open_recent.php", "nmWinRecentV5_" + nm_win_name, "width=300, height=250, directories=no, location=no, menubar=no, status=no, toolbar=no");
 obj_win.focus();
}

function nm_window_sql_script(str_script)
{
 obj_win = window.open(nm_url_iface + "popup_sql_script.php?sql_script=" + str_script, "nmWinSqlScriptV5_" + nm_win_name, "width=250, height=200, directories=no, location=no, menubar=no, status=no, toolbar=no");
 obj_win.focus();
}

function nm_window_upload(str_mod, not_exib)
{
 str_not_exib = (not_exib != null) ? ('&notexib=' + not_exib) : '';
 
 obj_win = window.open(nm_url_iface + "upload.php?mod=" + str_mod + str_not_exib, "nmWinUploadV5_" + nm_win_name, "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=320,height=240");
 obj_win.focus();
}

function nm_window_warning(str_warn)
{
 obj_win = window.open(nm_url_iface + "popup_warning.php?warn=" + str_warn, "nmWinWarningV5_" + nm_win_name, "width=320, height=240, directories=no, location=no, menubar=no, status=no, toolbar=no");
 obj_win.focus();
}

function nm_window_wizard()
{
 obj_win = window.open(nm_url_iface + "popup_wizard.php", "nmWinWizardV5_" + nm_win_name, "width=320, height=240, directories=no, location=no, menubar=no, status=no, toolbar=no");
 obj_win.focus();
}