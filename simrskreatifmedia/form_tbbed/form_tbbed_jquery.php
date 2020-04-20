
function scJQGeneralAdd() {
  scLoadScInput('input:text.sc-js-input');
  scLoadScInput('input:password.sc-js-input');
  scLoadScInput('input:checkbox.sc-js-input');
  scLoadScInput('input:radio.sc-js-input');
  scLoadScInput('select.sc-js-input');
  scLoadScInput('textarea.sc-js-input');

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
  scEventControl_data["ruang_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nobed_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kelas_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["custcode_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["aktif_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idbed_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["ruang_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ruang_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nobed_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nobed_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kelas_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kelas_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["custcode_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["custcode_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["aktif_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["aktif_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idbed_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idbed_" + iSeqRow]["change"]) {
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
  if ("ruang_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("kelas_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("aktif_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
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
  $('#id_sc_field_idbed_' + iSeqRow).bind('blur', function() { sc_form_tbbed_idbed__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_tbbed_idbed__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbbed_idbed__onfocus(this, iSeqRow) });
  $('#id_sc_field_nobed_' + iSeqRow).bind('blur', function() { sc_form_tbbed_nobed__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_tbbed_nobed__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbbed_nobed__onfocus(this, iSeqRow) });
  $('#id_sc_field_ruang_' + iSeqRow).bind('blur', function() { sc_form_tbbed_ruang__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_tbbed_ruang__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbbed_ruang__onfocus(this, iSeqRow) });
  $('#id_sc_field_kelas_' + iSeqRow).bind('blur', function() { sc_form_tbbed_kelas__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_tbbed_kelas__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbbed_kelas__onfocus(this, iSeqRow) });
  $('#id_sc_field_custcode_' + iSeqRow).bind('blur', function() { sc_form_tbbed_custcode__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_tbbed_custcode__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbbed_custcode__onfocus(this, iSeqRow) });
  $('#id_sc_field_aktif_' + iSeqRow).bind('blur', function() { sc_form_tbbed_aktif__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_tbbed_aktif__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbbed_aktif__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbbed_idbed__onblur(oThis, iSeqRow) {
  do_ajax_form_tbbed_validate_idbed_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbbed_idbed__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbbed_idbed__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbbed_nobed__onblur(oThis, iSeqRow) {
  do_ajax_form_tbbed_validate_nobed_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbbed_nobed__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbbed_nobed__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbbed_ruang__onblur(oThis, iSeqRow) {
  do_ajax_form_tbbed_validate_ruang_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbbed_ruang__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbbed_ruang__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbbed_kelas__onblur(oThis, iSeqRow) {
  do_ajax_form_tbbed_validate_kelas_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbbed_kelas__onchange(oThis, iSeqRow) {
  do_ajax_form_tbbed_refresh_kelas_(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_tbbed_kelas__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbbed_custcode__onblur(oThis, iSeqRow) {
  do_ajax_form_tbbed_validate_custcode_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbbed_custcode__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbbed_custcode__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbbed_aktif__onblur(oThis, iSeqRow) {
  do_ajax_form_tbbed_validate_aktif_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbbed_aktif__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbbed_aktif__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("ruang_", "", status);
	displayChange_field("nobed_", "", status);
	displayChange_field("kelas_", "", status);
	displayChange_field("custcode_", "", status);
	displayChange_field("aktif_", "", status);
	displayChange_field("idbed_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_ruang_(row, status);
	displayChange_field_nobed_(row, status);
	displayChange_field_kelas_(row, status);
	displayChange_field_custcode_(row, status);
	displayChange_field_aktif_(row, status);
	displayChange_field_idbed_(row, status);
}

function displayChange_field(field, row, status) {
	if ("ruang_" == field) {
		displayChange_field_ruang_(row, status);
	}
	if ("nobed_" == field) {
		displayChange_field_nobed_(row, status);
	}
	if ("kelas_" == field) {
		displayChange_field_kelas_(row, status);
	}
	if ("custcode_" == field) {
		displayChange_field_custcode_(row, status);
	}
	if ("aktif_" == field) {
		displayChange_field_aktif_(row, status);
	}
	if ("idbed_" == field) {
		displayChange_field_idbed_(row, status);
	}
}

function displayChange_field_ruang_(row, status) {
}

function displayChange_field_nobed_(row, status) {
}

function displayChange_field_kelas_(row, status) {
}

function displayChange_field_custcode_(row, status) {
}

function displayChange_field_aktif_(row, status) {
}

function displayChange_field_idbed_(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbbed_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(18);
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

