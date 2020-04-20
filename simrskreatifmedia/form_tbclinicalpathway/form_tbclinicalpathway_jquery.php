
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
  scEventControl_data["namacp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["aktif" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["icd" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detail" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["namacp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["namacp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["aktif" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["aktif" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["icd" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["icd" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detail" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detail" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["icd" + iSeqRow]["autocomp"]) {
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
  $('#id_sc_field_namacp' + iSeqRow).bind('blur', function() { sc_form_tbclinicalpathway_namacp_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbclinicalpathway_namacp_onfocus(this, iSeqRow) });
  $('#id_sc_field_aktif' + iSeqRow).bind('blur', function() { sc_form_tbclinicalpathway_aktif_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbclinicalpathway_aktif_onfocus(this, iSeqRow) });
  $('#id_sc_field_icd' + iSeqRow).bind('blur', function() { sc_form_tbclinicalpathway_icd_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tbclinicalpathway_icd_onfocus(this, iSeqRow) });
  $('#id_sc_field_detail' + iSeqRow).bind('blur', function() { sc_form_tbclinicalpathway_detail_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbclinicalpathway_detail_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbclinicalpathway_namacp_onblur(oThis, iSeqRow) {
  do_ajax_form_tbclinicalpathway_validate_namacp();
  scCssBlur(oThis);
}

function sc_form_tbclinicalpathway_namacp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbclinicalpathway_aktif_onblur(oThis, iSeqRow) {
  do_ajax_form_tbclinicalpathway_validate_aktif();
  scCssBlur(oThis);
}

function sc_form_tbclinicalpathway_aktif_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbclinicalpathway_icd_onblur(oThis, iSeqRow) {
  do_ajax_form_tbclinicalpathway_validate_icd();
  scCssBlur(oThis);
}

function sc_form_tbclinicalpathway_icd_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_tbclinicalpathway_detail_onblur(oThis, iSeqRow) {
  do_ajax_form_tbclinicalpathway_validate_detail();
  scCssBlur(oThis);
}

function sc_form_tbclinicalpathway_detail_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
	if ("1" == block) {
		displayChange_block_1(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("namacp", "", status);
	displayChange_field("aktif", "", status);
	displayChange_field("icd", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("detail", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_namacp(row, status);
	displayChange_field_aktif(row, status);
	displayChange_field_icd(row, status);
	displayChange_field_detail(row, status);
}

function displayChange_field(field, row, status) {
	if ("namacp" == field) {
		displayChange_field_namacp(row, status);
	}
	if ("aktif" == field) {
		displayChange_field_aktif(row, status);
	}
	if ("icd" == field) {
		displayChange_field_icd(row, status);
	}
	if ("detail" == field) {
		displayChange_field_detail(row, status);
	}
}

function displayChange_field_namacp(row, status) {
}

function displayChange_field_aktif(row, status) {
}

function displayChange_field_icd(row, status) {
}

function displayChange_field_detail(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbdetailcp")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbdetailcp")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbclinicalpathway_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(30);
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

