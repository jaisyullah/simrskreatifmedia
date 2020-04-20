
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
  scEventControl_data["kelas_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jenisbayar_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tarif_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kodelab_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["kelas_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kelas_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jenisbayar_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jenisbayar_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tarif_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tarif_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kodelab_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kodelab_" + iSeqRow]["change"]) {
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
  if ("kelas_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("jenisbayar_" + iSeq == fieldName) {
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
  $('#id_sc_field_kodelab_' + iSeqRow).bind('blur', function() { sc_form_tariflab_kodelab__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_tariflab_kodelab__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tariflab_kodelab__onfocus(this, iSeqRow) });
  $('#id_sc_field_kelas_' + iSeqRow).bind('blur', function() { sc_form_tariflab_kelas__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_tariflab_kelas__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tariflab_kelas__onfocus(this, iSeqRow) });
  $('#id_sc_field_jenisbayar_' + iSeqRow).bind('blur', function() { sc_form_tariflab_jenisbayar__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_tariflab_jenisbayar__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tariflab_jenisbayar__onfocus(this, iSeqRow) });
  $('#id_sc_field_tarif_' + iSeqRow).bind('blur', function() { sc_form_tariflab_tarif__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_tariflab_tarif__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tariflab_tarif__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tariflab_kodelab__onblur(oThis, iSeqRow) {
  do_ajax_form_tariflab_validate_kodelab_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tariflab_kodelab__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tariflab_kodelab__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tariflab_kelas__onblur(oThis, iSeqRow) {
  do_ajax_form_tariflab_validate_kelas_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tariflab_kelas__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tariflab_kelas__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tariflab_jenisbayar__onblur(oThis, iSeqRow) {
  do_ajax_form_tariflab_validate_jenisbayar_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tariflab_jenisbayar__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tariflab_jenisbayar__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tariflab_tarif__onblur(oThis, iSeqRow) {
  do_ajax_form_tariflab_validate_tarif_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tariflab_tarif__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tariflab_tarif__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("kelas_", "", status);
	displayChange_field("jenisbayar_", "", status);
	displayChange_field("tarif_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_kelas_(row, status);
	displayChange_field_jenisbayar_(row, status);
	displayChange_field_tarif_(row, status);
	displayChange_field_kodelab_(row, status);
}

function displayChange_field(field, row, status) {
	if ("kelas_" == field) {
		displayChange_field_kelas_(row, status);
	}
	if ("jenisbayar_" == field) {
		displayChange_field_jenisbayar_(row, status);
	}
	if ("tarif_" == field) {
		displayChange_field_tarif_(row, status);
	}
	if ("kodelab_" == field) {
		displayChange_field_kodelab_(row, status);
	}
}

function displayChange_field_kelas_(row, status) {
}

function displayChange_field_jenisbayar_(row, status) {
}

function displayChange_field_tarif_(row, status) {
}

function displayChange_field_kodelab_(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tariflab_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(21);
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

