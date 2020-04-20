
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
  scEventControl_data["namakelas_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tarifkamar_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tarifkeperawatan_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["citosiang_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["citomalam_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["citominggu_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idtarifinap_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["namakelas_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["namakelas_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tarifkamar_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tarifkamar_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tarifkeperawatan_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tarifkeperawatan_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["citosiang_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["citosiang_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["citomalam_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["citomalam_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["citominggu_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["citominggu_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idtarifinap_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idtarifinap_" + iSeqRow]["change"]) {
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
  $('#id_sc_field_idtarifinap_' + iSeqRow).bind('blur', function() { sc_form_tbtarifinap_idtarifinap__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_tbtarifinap_idtarifinap__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tbtarifinap_idtarifinap__onfocus(this, iSeqRow) });
  $('#id_sc_field_namakelas_' + iSeqRow).bind('blur', function() { sc_form_tbtarifinap_namakelas__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_tbtarifinap_namakelas__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbtarifinap_namakelas__onfocus(this, iSeqRow) });
  $('#id_sc_field_tarifkamar_' + iSeqRow).bind('blur', function() { sc_form_tbtarifinap_tarifkamar__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_tbtarifinap_tarifkamar__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbtarifinap_tarifkamar__onfocus(this, iSeqRow) });
  $('#id_sc_field_tarifkeperawatan_' + iSeqRow).bind('blur', function() { sc_form_tbtarifinap_tarifkeperawatan__onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_tbtarifinap_tarifkeperawatan__onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_tbtarifinap_tarifkeperawatan__onfocus(this, iSeqRow) });
  $('#id_sc_field_citosiang_' + iSeqRow).bind('blur', function() { sc_form_tbtarifinap_citosiang__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_tbtarifinap_citosiang__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbtarifinap_citosiang__onfocus(this, iSeqRow) });
  $('#id_sc_field_citomalam_' + iSeqRow).bind('blur', function() { sc_form_tbtarifinap_citomalam__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_tbtarifinap_citomalam__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbtarifinap_citomalam__onfocus(this, iSeqRow) });
  $('#id_sc_field_citominggu_' + iSeqRow).bind('blur', function() { sc_form_tbtarifinap_citominggu__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_tbtarifinap_citominggu__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbtarifinap_citominggu__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbtarifinap_idtarifinap__onblur(oThis, iSeqRow) {
  do_ajax_form_tbtarifinap_validate_idtarifinap_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbtarifinap_idtarifinap__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbtarifinap_idtarifinap__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbtarifinap_namakelas__onblur(oThis, iSeqRow) {
  do_ajax_form_tbtarifinap_validate_namakelas_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbtarifinap_namakelas__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbtarifinap_namakelas__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbtarifinap_tarifkamar__onblur(oThis, iSeqRow) {
  do_ajax_form_tbtarifinap_validate_tarifkamar_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbtarifinap_tarifkamar__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbtarifinap_tarifkamar__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbtarifinap_tarifkeperawatan__onblur(oThis, iSeqRow) {
  do_ajax_form_tbtarifinap_validate_tarifkeperawatan_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbtarifinap_tarifkeperawatan__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbtarifinap_tarifkeperawatan__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbtarifinap_citosiang__onblur(oThis, iSeqRow) {
  do_ajax_form_tbtarifinap_validate_citosiang_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbtarifinap_citosiang__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbtarifinap_citosiang__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbtarifinap_citomalam__onblur(oThis, iSeqRow) {
  do_ajax_form_tbtarifinap_validate_citomalam_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbtarifinap_citomalam__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbtarifinap_citomalam__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbtarifinap_citominggu__onblur(oThis, iSeqRow) {
  do_ajax_form_tbtarifinap_validate_citominggu_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbtarifinap_citominggu__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbtarifinap_citominggu__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("namakelas_", "", status);
	displayChange_field("tarifkamar_", "", status);
	displayChange_field("tarifkeperawatan_", "", status);
	displayChange_field("citosiang_", "", status);
	displayChange_field("citomalam_", "", status);
	displayChange_field("citominggu_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_namakelas_(row, status);
	displayChange_field_tarifkamar_(row, status);
	displayChange_field_tarifkeperawatan_(row, status);
	displayChange_field_citosiang_(row, status);
	displayChange_field_citomalam_(row, status);
	displayChange_field_citominggu_(row, status);
	displayChange_field_idtarifinap_(row, status);
}

function displayChange_field(field, row, status) {
	if ("namakelas_" == field) {
		displayChange_field_namakelas_(row, status);
	}
	if ("tarifkamar_" == field) {
		displayChange_field_tarifkamar_(row, status);
	}
	if ("tarifkeperawatan_" == field) {
		displayChange_field_tarifkeperawatan_(row, status);
	}
	if ("citosiang_" == field) {
		displayChange_field_citosiang_(row, status);
	}
	if ("citomalam_" == field) {
		displayChange_field_citomalam_(row, status);
	}
	if ("citominggu_" == field) {
		displayChange_field_citominggu_(row, status);
	}
	if ("idtarifinap_" == field) {
		displayChange_field_idtarifinap_(row, status);
	}
}

function displayChange_field_namakelas_(row, status) {
}

function displayChange_field_tarifkamar_(row, status) {
}

function displayChange_field_tarifkeperawatan_(row, status) {
}

function displayChange_field_citosiang_(row, status) {
}

function displayChange_field_citomalam_(row, status) {
}

function displayChange_field_citominggu_(row, status) {
}

function displayChange_field_idtarifinap_(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbtarifinap_form" + pageNo).hide();
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

function scJQSelect2Add(seqRow, specificField) {
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
} // scJQElementsAdd

