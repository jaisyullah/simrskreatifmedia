
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
  scEventControl_data["kodeicdx_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["namadiagnosa_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jenisdiagnosa_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["keterangan_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tgldiagnosa_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["trancode_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["kodeicdx_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kodeicdx_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["namadiagnosa_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["namadiagnosa_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jenisdiagnosa_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jenisdiagnosa_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["keterangan_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["keterangan_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tgldiagnosa_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tgldiagnosa_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["trancode_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["trancode_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["namadiagnosa_" + iSeqRow]["autocomp"]) {
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
  if ("kodeicdx_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("jenisdiagnosa_" + iSeq == fieldName) {
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
  $('#id_sc_field_trancode_' + iSeqRow).bind('blur', function() { sc_form_tbdiagnosaigd_trancode__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_tbdiagnosaigd_trancode__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbdiagnosaigd_trancode__onfocus(this, iSeqRow) });
  $('#id_sc_field_kodeicdx_' + iSeqRow).bind('blur', function() { sc_form_tbdiagnosaigd_kodeicdx__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_tbdiagnosaigd_kodeicdx__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbdiagnosaigd_kodeicdx__onfocus(this, iSeqRow) });
  $('#id_sc_field_namadiagnosa_' + iSeqRow).bind('blur', function() { sc_form_tbdiagnosaigd_namadiagnosa__onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_tbdiagnosaigd_namadiagnosa__onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_tbdiagnosaigd_namadiagnosa__onfocus(this, iSeqRow) });
  $('#id_sc_field_jenisdiagnosa_' + iSeqRow).bind('blur', function() { sc_form_tbdiagnosaigd_jenisdiagnosa__onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_tbdiagnosaigd_jenisdiagnosa__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_tbdiagnosaigd_jenisdiagnosa__onfocus(this, iSeqRow) });
  $('#id_sc_field_keterangan_' + iSeqRow).bind('blur', function() { sc_form_tbdiagnosaigd_keterangan__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_tbdiagnosaigd_keterangan__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbdiagnosaigd_keterangan__onfocus(this, iSeqRow) });
  $('#id_sc_field_tgldiagnosa_' + iSeqRow).bind('blur', function() { sc_form_tbdiagnosaigd_tgldiagnosa__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_tbdiagnosaigd_tgldiagnosa__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tbdiagnosaigd_tgldiagnosa__onfocus(this, iSeqRow) });
  $('#id_sc_field_tgldiagnosa__hora' + iSeqRow).bind('blur', function() { sc_form_tbdiagnosaigd_tgldiagnosa__hora_onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_tbdiagnosaigd_tgldiagnosa__hora_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_tbdiagnosaigd_tgldiagnosa__hora_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbdiagnosaigd_trancode__onblur(oThis, iSeqRow) {
  do_ajax_form_tbdiagnosaigd_validate_trancode_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbdiagnosaigd_trancode__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbdiagnosaigd_trancode__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbdiagnosaigd_kodeicdx__onblur(oThis, iSeqRow) {
  do_ajax_form_tbdiagnosaigd_validate_kodeicdx_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbdiagnosaigd_kodeicdx__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbdiagnosaigd_kodeicdx__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbdiagnosaigd_namadiagnosa__onblur(oThis, iSeqRow) {
  do_ajax_form_tbdiagnosaigd_validate_namadiagnosa_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbdiagnosaigd_namadiagnosa__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbdiagnosaigd_namadiagnosa__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbdiagnosaigd_jenisdiagnosa__onblur(oThis, iSeqRow) {
  do_ajax_form_tbdiagnosaigd_validate_jenisdiagnosa_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbdiagnosaigd_jenisdiagnosa__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbdiagnosaigd_jenisdiagnosa__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbdiagnosaigd_keterangan__onblur(oThis, iSeqRow) {
  do_ajax_form_tbdiagnosaigd_validate_keterangan_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbdiagnosaigd_keterangan__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbdiagnosaigd_keterangan__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbdiagnosaigd_tgldiagnosa__onblur(oThis, iSeqRow) {
  do_ajax_form_tbdiagnosaigd_validate_tgldiagnosa_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbdiagnosaigd_tgldiagnosa__hora_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdiagnosaigd_validate_tgldiagnosa_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbdiagnosaigd_tgldiagnosa__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbdiagnosaigd_tgldiagnosa__hora_onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbdiagnosaigd_tgldiagnosa__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbdiagnosaigd_tgldiagnosa__hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("kodeicdx_", "", status);
	displayChange_field("namadiagnosa_", "", status);
	displayChange_field("jenisdiagnosa_", "", status);
	displayChange_field("keterangan_", "", status);
	displayChange_field("tgldiagnosa_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_kodeicdx_(row, status);
	displayChange_field_namadiagnosa_(row, status);
	displayChange_field_jenisdiagnosa_(row, status);
	displayChange_field_keterangan_(row, status);
	displayChange_field_tgldiagnosa_(row, status);
	displayChange_field_trancode_(row, status);
}

function displayChange_field(field, row, status) {
	if ("kodeicdx_" == field) {
		displayChange_field_kodeicdx_(row, status);
	}
	if ("namadiagnosa_" == field) {
		displayChange_field_namadiagnosa_(row, status);
	}
	if ("jenisdiagnosa_" == field) {
		displayChange_field_jenisdiagnosa_(row, status);
	}
	if ("keterangan_" == field) {
		displayChange_field_keterangan_(row, status);
	}
	if ("tgldiagnosa_" == field) {
		displayChange_field_tgldiagnosa_(row, status);
	}
	if ("trancode_" == field) {
		displayChange_field_trancode_(row, status);
	}
}

function displayChange_field_kodeicdx_(row, status) {
}

function displayChange_field_namadiagnosa_(row, status) {
}

function displayChange_field_jenisdiagnosa_(row, status) {
}

function displayChange_field_keterangan_(row, status) {
}

function displayChange_field_tgldiagnosa_(row, status) {
}

function displayChange_field_trancode_(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbdiagnosaigd_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(26);
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

