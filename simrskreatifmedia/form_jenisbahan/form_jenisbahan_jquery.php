
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
  scEventControl_data["jeniscode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["namajenis" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["keterangan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["aktif" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["jeniscode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jeniscode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["namajenis" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["namajenis" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["keterangan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["keterangan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["aktif" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["aktif" + iSeqRow]["change"]) {
    return true;
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
  $('#id_sc_field_jeniscode' + iSeqRow).bind('blur', function() { sc_form_jenisbahan_jeniscode_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_jenisbahan_jeniscode_onfocus(this, iSeqRow) });
  $('#id_sc_field_namajenis' + iSeqRow).bind('blur', function() { sc_form_jenisbahan_namajenis_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_jenisbahan_namajenis_onfocus(this, iSeqRow) });
  $('#id_sc_field_keterangan' + iSeqRow).bind('blur', function() { sc_form_jenisbahan_keterangan_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_jenisbahan_keterangan_onfocus(this, iSeqRow) });
  $('#id_sc_field_aktif' + iSeqRow).bind('blur', function() { sc_form_jenisbahan_aktif_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_jenisbahan_aktif_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_jenisbahan_jeniscode_onblur(oThis, iSeqRow) {
  do_ajax_form_jenisbahan_validate_jeniscode();
  scCssBlur(oThis);
}

function sc_form_jenisbahan_jeniscode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_jenisbahan_namajenis_onblur(oThis, iSeqRow) {
  do_ajax_form_jenisbahan_validate_namajenis();
  scCssBlur(oThis);
}

function sc_form_jenisbahan_namajenis_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_jenisbahan_keterangan_onblur(oThis, iSeqRow) {
  do_ajax_form_jenisbahan_validate_keterangan();
  scCssBlur(oThis);
}

function sc_form_jenisbahan_keterangan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_jenisbahan_aktif_onblur(oThis, iSeqRow) {
  do_ajax_form_jenisbahan_validate_aktif();
  scCssBlur(oThis);
}

function sc_form_jenisbahan_aktif_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("jeniscode", "", status);
	displayChange_field("namajenis", "", status);
	displayChange_field("keterangan", "", status);
	displayChange_field("aktif", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_jeniscode(row, status);
	displayChange_field_namajenis(row, status);
	displayChange_field_keterangan(row, status);
	displayChange_field_aktif(row, status);
}

function displayChange_field(field, row, status) {
	if ("jeniscode" == field) {
		displayChange_field_jeniscode(row, status);
	}
	if ("namajenis" == field) {
		displayChange_field_namajenis(row, status);
	}
	if ("keterangan" == field) {
		displayChange_field_keterangan(row, status);
	}
	if ("aktif" == field) {
		displayChange_field_aktif(row, status);
	}
}

function displayChange_field_jeniscode(row, status) {
}

function displayChange_field_namajenis(row, status) {
}

function displayChange_field_keterangan(row, status) {
}

function displayChange_field_aktif(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_jenisbahan_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(23);
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

