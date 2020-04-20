
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
  scEventControl_data["tingkat_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["instnama_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fakultas_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["thlulus_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kodekary_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["tingkat_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tingkat_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["instnama_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["instnama_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fakultas_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fakultas_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["thlulus_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["thlulus_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kodekary_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kodekary_" + iSeqRow]["change"]) {
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
  if ("tingkat_" + iSeq == fieldName) {
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
  $('#id_sc_field_kodekary_' + iSeqRow).bind('blur', function() { sc_form_tbhrdformal_kodekary__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_tbhrdformal_kodekary__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbhrdformal_kodekary__onfocus(this, iSeqRow) });
  $('#id_sc_field_tingkat_' + iSeqRow).bind('blur', function() { sc_form_tbhrdformal_tingkat__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_tbhrdformal_tingkat__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbhrdformal_tingkat__onfocus(this, iSeqRow) });
  $('#id_sc_field_instnama_' + iSeqRow).bind('blur', function() { sc_form_tbhrdformal_instnama__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_tbhrdformal_instnama__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbhrdformal_instnama__onfocus(this, iSeqRow) });
  $('#id_sc_field_fakultas_' + iSeqRow).bind('blur', function() { sc_form_tbhrdformal_fakultas__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_tbhrdformal_fakultas__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbhrdformal_fakultas__onfocus(this, iSeqRow) });
  $('#id_sc_field_thlulus_' + iSeqRow).bind('blur', function() { sc_form_tbhrdformal_thlulus__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_tbhrdformal_thlulus__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbhrdformal_thlulus__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbhrdformal_kodekary__onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrdformal_validate_kodekary_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbhrdformal_kodekary__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbhrdformal_kodekary__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbhrdformal_tingkat__onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrdformal_validate_tingkat_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbhrdformal_tingkat__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbhrdformal_tingkat__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbhrdformal_instnama__onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrdformal_validate_instnama_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbhrdformal_instnama__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbhrdformal_instnama__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbhrdformal_fakultas__onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrdformal_validate_fakultas_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbhrdformal_fakultas__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbhrdformal_fakultas__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbhrdformal_thlulus__onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrdformal_validate_thlulus_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbhrdformal_thlulus__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbhrdformal_thlulus__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("tingkat_", "", status);
	displayChange_field("instnama_", "", status);
	displayChange_field("fakultas_", "", status);
	displayChange_field("thlulus_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_tingkat_(row, status);
	displayChange_field_instnama_(row, status);
	displayChange_field_fakultas_(row, status);
	displayChange_field_thlulus_(row, status);
	displayChange_field_kodekary_(row, status);
}

function displayChange_field(field, row, status) {
	if ("tingkat_" == field) {
		displayChange_field_tingkat_(row, status);
	}
	if ("instnama_" == field) {
		displayChange_field_instnama_(row, status);
	}
	if ("fakultas_" == field) {
		displayChange_field_fakultas_(row, status);
	}
	if ("thlulus_" == field) {
		displayChange_field_thlulus_(row, status);
	}
	if ("kodekary_" == field) {
		displayChange_field_kodekary_(row, status);
	}
}

function displayChange_field_tingkat_(row, status) {
}

function displayChange_field_instnama_(row, status) {
}

function displayChange_field_fakultas_(row, status) {
}

function displayChange_field_thlulus_(row, status) {
}

function displayChange_field_kodekary_(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbhrdformal_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(24);
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

