
function scJQGeneralAdd() {
  scLoadScInput('input:text.sc-js-input');
  scLoadScInput('input:password.sc-js-input');
  scLoadScInput('input:checkbox.sc-js-input');
  scLoadScInput('input:radio.sc-js-input');
  scLoadScInput('select.sc-js-input');
  scLoadScInput('textarea.sc-js-input');

  scJQCheckboxControl_general('')
  $('.sc-ui-checkbox-all-all').click(function() { scJQCheckboxControl('__ALL__', '__ALL__', this); });
  $('.sc-ui-checkbox-record-all').click(function() { scJQCheckboxControl('__ALL__', '__REC__', this); });

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if ($("#id_ac_" + sField).length > 0) {
    if ($oField.hasClass("select2-hidden-accessible")) {
      if (false == scSetFocusOnField($oField)) {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
    else {
      if (false == scSetFocusOnField($oField)) {
        if (false == scSetFocusOnField($("#id_ac_" + sField))) {
          setTimeout(function() { scSetFocusOnField($("#id_ac_" + sField)); }, 500);
        }
      }
      else {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["app_name_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["priv_access_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["priv_insert_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["priv_delete_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["priv_update_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["priv_export_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["priv_print_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["app_name_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["app_name_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["priv_access_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["priv_access_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["priv_insert_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["priv_insert_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["priv_delete_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["priv_delete_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["priv_update_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["priv_update_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["priv_export_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["priv_export_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["priv_print_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["priv_print_" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_active_all() {
  for (var i = 1; i < iAjaxNewLine; i++) {
    if (scEventControl_active(i)) {
      return true;
    }
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val() || scEventControl_data[sFieldName]["calculated"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_app_name_' + iSeqRow).bind('blur', function() { sc_sec_form_sec_groups_apps_app_name__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_sec_form_sec_groups_apps_app_name__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_sec_form_sec_groups_apps_app_name__onfocus(this, iSeqRow) });
  $('#id_sc_field_priv_access_' + iSeqRow).bind('blur', function() { sc_sec_form_sec_groups_apps_priv_access__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_sec_form_sec_groups_apps_priv_access__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_sec_form_sec_groups_apps_priv_access__onfocus(this, iSeqRow) });
  $('#id_sc_field_priv_insert_' + iSeqRow).bind('blur', function() { sc_sec_form_sec_groups_apps_priv_insert__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_sec_form_sec_groups_apps_priv_insert__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_sec_form_sec_groups_apps_priv_insert__onfocus(this, iSeqRow) });
  $('#id_sc_field_priv_delete_' + iSeqRow).bind('blur', function() { sc_sec_form_sec_groups_apps_priv_delete__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_sec_form_sec_groups_apps_priv_delete__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_sec_form_sec_groups_apps_priv_delete__onfocus(this, iSeqRow) });
  $('#id_sc_field_priv_update_' + iSeqRow).bind('blur', function() { sc_sec_form_sec_groups_apps_priv_update__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_sec_form_sec_groups_apps_priv_update__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_sec_form_sec_groups_apps_priv_update__onfocus(this, iSeqRow) });
  $('#id_sc_field_priv_export_' + iSeqRow).bind('blur', function() { sc_sec_form_sec_groups_apps_priv_export__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_sec_form_sec_groups_apps_priv_export__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_sec_form_sec_groups_apps_priv_export__onfocus(this, iSeqRow) });
  $('#id_sc_field_priv_print_' + iSeqRow).bind('blur', function() { sc_sec_form_sec_groups_apps_priv_print__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_sec_form_sec_groups_apps_priv_print__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_sec_form_sec_groups_apps_priv_print__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_sec_form_sec_groups_apps_app_name__onblur(oThis, iSeqRow) {
  do_ajax_sec_form_sec_groups_apps_validate_app_name_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_sec_form_sec_groups_apps_app_name__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_sec_form_sec_groups_apps_app_name__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_sec_form_sec_groups_apps_priv_access__onblur(oThis, iSeqRow) {
  do_ajax_sec_form_sec_groups_apps_validate_priv_access_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_sec_form_sec_groups_apps_priv_access__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_sec_form_sec_groups_apps_priv_access__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_sec_form_sec_groups_apps_priv_insert__onblur(oThis, iSeqRow) {
  do_ajax_sec_form_sec_groups_apps_validate_priv_insert_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_sec_form_sec_groups_apps_priv_insert__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_sec_form_sec_groups_apps_priv_insert__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_sec_form_sec_groups_apps_priv_delete__onblur(oThis, iSeqRow) {
  do_ajax_sec_form_sec_groups_apps_validate_priv_delete_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_sec_form_sec_groups_apps_priv_delete__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_sec_form_sec_groups_apps_priv_delete__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_sec_form_sec_groups_apps_priv_update__onblur(oThis, iSeqRow) {
  do_ajax_sec_form_sec_groups_apps_validate_priv_update_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_sec_form_sec_groups_apps_priv_update__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_sec_form_sec_groups_apps_priv_update__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_sec_form_sec_groups_apps_priv_export__onblur(oThis, iSeqRow) {
  do_ajax_sec_form_sec_groups_apps_validate_priv_export_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_sec_form_sec_groups_apps_priv_export__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_sec_form_sec_groups_apps_priv_export__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_sec_form_sec_groups_apps_priv_print__onblur(oThis, iSeqRow) {
  do_ajax_sec_form_sec_groups_apps_validate_priv_print_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_sec_form_sec_groups_apps_priv_print__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_sec_form_sec_groups_apps_priv_print__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("app_name_", "", status);
	displayChange_field("priv_access_", "", status);
	displayChange_field("priv_insert_", "", status);
	displayChange_field("priv_delete_", "", status);
	displayChange_field("priv_update_", "", status);
	displayChange_field("priv_export_", "", status);
	displayChange_field("priv_print_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_app_name_(row, status);
	displayChange_field_priv_access_(row, status);
	displayChange_field_priv_insert_(row, status);
	displayChange_field_priv_delete_(row, status);
	displayChange_field_priv_update_(row, status);
	displayChange_field_priv_export_(row, status);
	displayChange_field_priv_print_(row, status);
}

function displayChange_field(field, row, status) {
	if ("app_name_" == field) {
		displayChange_field_app_name_(row, status);
	}
	if ("priv_access_" == field) {
		displayChange_field_priv_access_(row, status);
	}
	if ("priv_insert_" == field) {
		displayChange_field_priv_insert_(row, status);
	}
	if ("priv_delete_" == field) {
		displayChange_field_priv_delete_(row, status);
	}
	if ("priv_update_" == field) {
		displayChange_field_priv_update_(row, status);
	}
	if ("priv_export_" == field) {
		displayChange_field_priv_export_(row, status);
	}
	if ("priv_print_" == field) {
		displayChange_field_priv_print_(row, status);
	}
}

function displayChange_field_app_name_(row, status) {
}

function displayChange_field_priv_access_(row, status) {
}

function displayChange_field_priv_insert_(row, status) {
}

function displayChange_field_priv_delete_(row, status) {
}

function displayChange_field_priv_update_(row, status) {
}

function displayChange_field_priv_export_(row, status) {
}

function displayChange_field_priv_print_(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_sec_form_sec_groups_apps_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(32);
		}
	}
}
function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

function scJQCheckboxControl_general(mainContainer) {
    $(mainContainer + '.sc-ui-checkbox-priv_access_-control').click(function() { scJQCheckboxControl('priv_access_', '__ALL__', this); });
    $(mainContainer + '.sc-ui-checkbox-priv_insert_-control').click(function() { scJQCheckboxControl('priv_insert_', '__ALL__', this); });
    $(mainContainer + '.sc-ui-checkbox-priv_delete_-control').click(function() { scJQCheckboxControl('priv_delete_', '__ALL__', this); });
    $(mainContainer + '.sc-ui-checkbox-priv_update_-control').click(function() { scJQCheckboxControl('priv_update_', '__ALL__', this); });
    $(mainContainer + '.sc-ui-checkbox-priv_export_-control').click(function() { scJQCheckboxControl('priv_export_', '__ALL__', this); });
    $(mainContainer + '.sc-ui-checkbox-priv_print_-control').click(function() { scJQCheckboxControl('priv_print_', '__ALL__', this); });
    $('.sc-ui-checkbox-all-all').click(function() { scJQCheckboxControl('__ALL__', '__ALL__', this); });
    $('.sc-ui-checkbox-record-all').click(function() { scJQCheckboxControl('__ALL__', '__REC__', this); });
}

function scJQCheckboxControl_updateShow() {
    $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-priv_access_-control').prop("checked", $('#div_hidden_bloco_0 .sc-ui-checkbox-priv_access_-control').prop("checked"));
    $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-priv_insert_-control').prop("checked", $('#div_hidden_bloco_0 .sc-ui-checkbox-priv_insert_-control').prop("checked"));
    $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-priv_delete_-control').prop("checked", $('#div_hidden_bloco_0 .sc-ui-checkbox-priv_delete_-control').prop("checked"));
    $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-priv_update_-control').prop("checked", $('#div_hidden_bloco_0 .sc-ui-checkbox-priv_update_-control').prop("checked"));
    $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-priv_export_-control').prop("checked", $('#div_hidden_bloco_0 .sc-ui-checkbox-priv_export_-control').prop("checked"));
    $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-priv_print_-control').prop("checked", $('#div_hidden_bloco_0 .sc-ui-checkbox-priv_print_-control').prop("checked"));
}

function scJQCheckboxControl_updateHide() {
    $('#div_hidden_bloco_0 .sc-ui-checkbox-priv_access_-control').prop("checked", $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-priv_access_-control').prop("checked"));
    $('#div_hidden_bloco_0 .sc-ui-checkbox-priv_insert_-control').prop("checked", $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-priv_insert_-control').prop("checked"));
    $('#div_hidden_bloco_0 .sc-ui-checkbox-priv_delete_-control').prop("checked", $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-priv_delete_-control').prop("checked"));
    $('#div_hidden_bloco_0 .sc-ui-checkbox-priv_update_-control').prop("checked", $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-priv_update_-control').prop("checked"));
    $('#div_hidden_bloco_0 .sc-ui-checkbox-priv_export_-control').prop("checked", $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-priv_export_-control').prop("checked"));
    $('#div_hidden_bloco_0 .sc-ui-checkbox-priv_print_-control').prop("checked", $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-priv_print_-control').prop("checked"));
}

function scJQCheckboxControl(sColumn, sSeqRow, oCheckbox) {
  var iSeqRow = '';

  if ('__ALL__' == sColumn || 'priv_access_' == sColumn) {
    iSeqRow = ('__REC__' == sSeqRow) ? $(oCheckbox).attr('alt') : '';
    scJQCheckboxControl_priv_access_(iSeqRow, oCheckbox.checked);
    if ('__REC__' == sSeqRow) {
      nm_check_insert(iSeqRow);
    }
    else {
      if ('__ALL__' == sColumn || 'priv_access_' == sColumn) {
         for (var i = 1; i <= iAjaxNewLine; i++) {
           nm_check_insert(i);
         }
      }
    }
    if ('__ALL__' == sColumn && '__ALL__' == sSeqRow) {
      var $oCheckbox = $(".sc-ui-checkbox-record-all");
      for (var i = 0; i < $oCheckbox.length; i++) {
        if (oCheckbox.checked != $oCheckbox[i].checked) {
          $oCheckbox[i].checked = oCheckbox.checked;
        }
      }
    }
  }

  if ('__ALL__' == sColumn || 'priv_insert_' == sColumn) {
    iSeqRow = ('__REC__' == sSeqRow) ? $(oCheckbox).attr('alt') : '';
    scJQCheckboxControl_priv_insert_(iSeqRow, oCheckbox.checked);
    if ('__REC__' == sSeqRow) {
      nm_check_insert(iSeqRow);
    }
    else {
      if ('__ALL__' == sColumn || 'priv_insert_' == sColumn) {
         for (var i = 1; i <= iAjaxNewLine; i++) {
           nm_check_insert(i);
         }
      }
    }
    if ('__ALL__' == sColumn && '__ALL__' == sSeqRow) {
      var $oCheckbox = $(".sc-ui-checkbox-record-all");
      for (var i = 0; i < $oCheckbox.length; i++) {
        if (oCheckbox.checked != $oCheckbox[i].checked) {
          $oCheckbox[i].checked = oCheckbox.checked;
        }
      }
    }
  }

  if ('__ALL__' == sColumn || 'priv_delete_' == sColumn) {
    iSeqRow = ('__REC__' == sSeqRow) ? $(oCheckbox).attr('alt') : '';
    scJQCheckboxControl_priv_delete_(iSeqRow, oCheckbox.checked);
    if ('__REC__' == sSeqRow) {
      nm_check_insert(iSeqRow);
    }
    else {
      if ('__ALL__' == sColumn || 'priv_delete_' == sColumn) {
         for (var i = 1; i <= iAjaxNewLine; i++) {
           nm_check_insert(i);
         }
      }
    }
    if ('__ALL__' == sColumn && '__ALL__' == sSeqRow) {
      var $oCheckbox = $(".sc-ui-checkbox-record-all");
      for (var i = 0; i < $oCheckbox.length; i++) {
        if (oCheckbox.checked != $oCheckbox[i].checked) {
          $oCheckbox[i].checked = oCheckbox.checked;
        }
      }
    }
  }

  if ('__ALL__' == sColumn || 'priv_update_' == sColumn) {
    iSeqRow = ('__REC__' == sSeqRow) ? $(oCheckbox).attr('alt') : '';
    scJQCheckboxControl_priv_update_(iSeqRow, oCheckbox.checked);
    if ('__REC__' == sSeqRow) {
      nm_check_insert(iSeqRow);
    }
    else {
      if ('__ALL__' == sColumn || 'priv_update_' == sColumn) {
         for (var i = 1; i <= iAjaxNewLine; i++) {
           nm_check_insert(i);
         }
      }
    }
    if ('__ALL__' == sColumn && '__ALL__' == sSeqRow) {
      var $oCheckbox = $(".sc-ui-checkbox-record-all");
      for (var i = 0; i < $oCheckbox.length; i++) {
        if (oCheckbox.checked != $oCheckbox[i].checked) {
          $oCheckbox[i].checked = oCheckbox.checked;
        }
      }
    }
  }

  if ('__ALL__' == sColumn || 'priv_export_' == sColumn) {
    iSeqRow = ('__REC__' == sSeqRow) ? $(oCheckbox).attr('alt') : '';
    scJQCheckboxControl_priv_export_(iSeqRow, oCheckbox.checked);
    if ('__REC__' == sSeqRow) {
      nm_check_insert(iSeqRow);
    }
    else {
      if ('__ALL__' == sColumn || 'priv_export_' == sColumn) {
         for (var i = 1; i <= iAjaxNewLine; i++) {
           nm_check_insert(i);
         }
      }
    }
    if ('__ALL__' == sColumn && '__ALL__' == sSeqRow) {
      var $oCheckbox = $(".sc-ui-checkbox-record-all");
      for (var i = 0; i < $oCheckbox.length; i++) {
        if (oCheckbox.checked != $oCheckbox[i].checked) {
          $oCheckbox[i].checked = oCheckbox.checked;
        }
      }
    }
  }

  if ('__ALL__' == sColumn || 'priv_print_' == sColumn) {
    iSeqRow = ('__REC__' == sSeqRow) ? $(oCheckbox).attr('alt') : '';
    scJQCheckboxControl_priv_print_(iSeqRow, oCheckbox.checked);
    if ('__REC__' == sSeqRow) {
      nm_check_insert(iSeqRow);
    }
    else {
      if ('__ALL__' == sColumn || 'priv_print_' == sColumn) {
         for (var i = 1; i <= iAjaxNewLine; i++) {
           nm_check_insert(i);
         }
      }
    }
    if ('__ALL__' == sColumn && '__ALL__' == sSeqRow) {
      var $oCheckbox = $(".sc-ui-checkbox-record-all");
      for (var i = 0; i < $oCheckbox.length; i++) {
        if (oCheckbox.checked != $oCheckbox[i].checked) {
          $oCheckbox[i].checked = oCheckbox.checked;
        }
      }
    }
  }

} // scJQCheckboxControl

function scJQCheckboxControl_priv_access_(iSeqRow, bChecked) {
  if ('__ALL__' == iSeqRow) {
    var $oCheckbox = $(".sc-ui-checkbox-priv_access_");
  }
  else {
    var $oCheckbox = $(".sc-ui-checkbox-priv_access_" + iSeqRow);
  }

  var bChanged = false, lcsObjects;
  for (var i = 0; i < $oCheckbox.length; i++) {
    if (bChecked != $oCheckbox[i].checked && !$oCheckbox[i].disabled) {
      $oCheckbox[i].checked = bChecked;
      nm_check_insert(iSeqRow);
      lcsObjects = $($oCheckbox[i]).parent().find(".lcs_switch");
      if (lcsObjects.length) {
        if (bChecked) {
          lcsObjects.lcs_on();
        }
        else {
          lcsObjects.lcs_off();
        }
      }
      bChanged = true;
    }
  }
} // scJQCheckboxControl_priv_access_

function scJQCheckboxControl_priv_insert_(iSeqRow, bChecked) {
  if ('__ALL__' == iSeqRow) {
    var $oCheckbox = $(".sc-ui-checkbox-priv_insert_");
  }
  else {
    var $oCheckbox = $(".sc-ui-checkbox-priv_insert_" + iSeqRow);
  }

  var bChanged = false, lcsObjects;
  for (var i = 0; i < $oCheckbox.length; i++) {
    if (bChecked != $oCheckbox[i].checked && !$oCheckbox[i].disabled) {
      $oCheckbox[i].checked = bChecked;
      nm_check_insert(iSeqRow);
      lcsObjects = $($oCheckbox[i]).parent().find(".lcs_switch");
      if (lcsObjects.length) {
        if (bChecked) {
          lcsObjects.lcs_on();
        }
        else {
          lcsObjects.lcs_off();
        }
      }
      bChanged = true;
    }
  }
} // scJQCheckboxControl_priv_insert_

function scJQCheckboxControl_priv_delete_(iSeqRow, bChecked) {
  if ('__ALL__' == iSeqRow) {
    var $oCheckbox = $(".sc-ui-checkbox-priv_delete_");
  }
  else {
    var $oCheckbox = $(".sc-ui-checkbox-priv_delete_" + iSeqRow);
  }

  var bChanged = false, lcsObjects;
  for (var i = 0; i < $oCheckbox.length; i++) {
    if (bChecked != $oCheckbox[i].checked && !$oCheckbox[i].disabled) {
      $oCheckbox[i].checked = bChecked;
      nm_check_insert(iSeqRow);
      lcsObjects = $($oCheckbox[i]).parent().find(".lcs_switch");
      if (lcsObjects.length) {
        if (bChecked) {
          lcsObjects.lcs_on();
        }
        else {
          lcsObjects.lcs_off();
        }
      }
      bChanged = true;
    }
  }
} // scJQCheckboxControl_priv_delete_

function scJQCheckboxControl_priv_update_(iSeqRow, bChecked) {
  if ('__ALL__' == iSeqRow) {
    var $oCheckbox = $(".sc-ui-checkbox-priv_update_");
  }
  else {
    var $oCheckbox = $(".sc-ui-checkbox-priv_update_" + iSeqRow);
  }

  var bChanged = false, lcsObjects;
  for (var i = 0; i < $oCheckbox.length; i++) {
    if (bChecked != $oCheckbox[i].checked && !$oCheckbox[i].disabled) {
      $oCheckbox[i].checked = bChecked;
      nm_check_insert(iSeqRow);
      lcsObjects = $($oCheckbox[i]).parent().find(".lcs_switch");
      if (lcsObjects.length) {
        if (bChecked) {
          lcsObjects.lcs_on();
        }
        else {
          lcsObjects.lcs_off();
        }
      }
      bChanged = true;
    }
  }
} // scJQCheckboxControl_priv_update_

function scJQCheckboxControl_priv_export_(iSeqRow, bChecked) {
  if ('__ALL__' == iSeqRow) {
    var $oCheckbox = $(".sc-ui-checkbox-priv_export_");
  }
  else {
    var $oCheckbox = $(".sc-ui-checkbox-priv_export_" + iSeqRow);
  }

  var bChanged = false, lcsObjects;
  for (var i = 0; i < $oCheckbox.length; i++) {
    if (bChecked != $oCheckbox[i].checked && !$oCheckbox[i].disabled) {
      $oCheckbox[i].checked = bChecked;
      nm_check_insert(iSeqRow);
      lcsObjects = $($oCheckbox[i]).parent().find(".lcs_switch");
      if (lcsObjects.length) {
        if (bChecked) {
          lcsObjects.lcs_on();
        }
        else {
          lcsObjects.lcs_off();
        }
      }
      bChanged = true;
    }
  }
} // scJQCheckboxControl_priv_export_

function scJQCheckboxControl_priv_print_(iSeqRow, bChecked) {
  if ('__ALL__' == iSeqRow) {
    var $oCheckbox = $(".sc-ui-checkbox-priv_print_");
  }
  else {
    var $oCheckbox = $(".sc-ui-checkbox-priv_print_" + iSeqRow);
  }

  var bChanged = false, lcsObjects;
  for (var i = 0; i < $oCheckbox.length; i++) {
    if (bChecked != $oCheckbox[i].checked && !$oCheckbox[i].disabled) {
      $oCheckbox[i].checked = bChecked;
      nm_check_insert(iSeqRow);
      lcsObjects = $($oCheckbox[i]).parent().find(".lcs_switch");
      if (lcsObjects.length) {
        if (bChecked) {
          lcsObjects.lcs_on();
        }
        else {
          lcsObjects.lcs_off();
        }
      }
      bChanged = true;
    }
  }
} // scJQCheckboxControl_priv_print_

