
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
  scEventControl_data["tarif_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sharedoc_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kodetindakan_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["tarif_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tarif_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sharedoc_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sharedoc_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kodetindakan_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kodetindakan_" + iSeqRow]["change"]) {
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
  $('#id_sc_field_kodetindakan_' + iSeqRow).bind('blur', function() { sc_form_tbtarifrj_kodetindakan__onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_tbtarifrj_kodetindakan__onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_tbtarifrj_kodetindakan__onfocus(this, iSeqRow) });
  $('#id_sc_field_tarif_' + iSeqRow).bind('blur', function() { sc_form_tbtarifrj_tarif__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_tbtarifrj_tarif__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbtarifrj_tarif__onfocus(this, iSeqRow) });
  $('#id_sc_field_sharedoc_' + iSeqRow).bind('blur', function() { sc_form_tbtarifrj_sharedoc__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_tbtarifrj_sharedoc__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbtarifrj_sharedoc__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbtarifrj_kodetindakan__onblur(oThis, iSeqRow) {
  do_ajax_form_tbtarifrj_validate_kodetindakan_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbtarifrj_kodetindakan__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbtarifrj_kodetindakan__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbtarifrj_tarif__onblur(oThis, iSeqRow) {
  do_ajax_form_tbtarifrj_validate_tarif_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbtarifrj_tarif__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbtarifrj_tarif__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbtarifrj_sharedoc__onblur(oThis, iSeqRow) {
  do_ajax_form_tbtarifrj_validate_sharedoc_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbtarifrj_sharedoc__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbtarifrj_sharedoc__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("tarif_", "", status);
	displayChange_field("sharedoc_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_tarif_(row, status);
	displayChange_field_sharedoc_(row, status);
	displayChange_field_kodetindakan_(row, status);
}

function displayChange_field(field, row, status) {
	if ("tarif_" == field) {
		displayChange_field_tarif_(row, status);
	}
	if ("sharedoc_" == field) {
		displayChange_field_sharedoc_(row, status);
	}
	if ("kodetindakan_" == field) {
		displayChange_field_kodetindakan_(row, status);
	}
}

function displayChange_field_tarif_(row, status) {
}

function displayChange_field_sharedoc_(row, status) {
}

function displayChange_field_kodetindakan_(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbtarifrj_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(22);
		}
	}
}
function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

function scJQSelect2Add(seqRow, specificField) {
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
} // scJQElementsAdd

