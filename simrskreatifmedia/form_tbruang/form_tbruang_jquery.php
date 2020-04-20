
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
  scEventControl_data["idruang" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["namaruang" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kelas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["noranap" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["bed" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["idruang" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idruang" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["namaruang" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["namaruang" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kelas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kelas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["noranap" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["noranap" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["bed" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["bed" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("kelas" + iSeq == fieldName) {
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
  $('#id_sc_field_idruang' + iSeqRow).bind('blur', function() { sc_form_tbruang_idruang_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbruang_idruang_onfocus(this, iSeqRow) });
  $('#id_sc_field_namaruang' + iSeqRow).bind('blur', function() { sc_form_tbruang_namaruang_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbruang_namaruang_onfocus(this, iSeqRow) });
  $('#id_sc_field_kelas' + iSeqRow).bind('blur', function() { sc_form_tbruang_kelas_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbruang_kelas_onfocus(this, iSeqRow) });
  $('#id_sc_field_noranap' + iSeqRow).bind('blur', function() { sc_form_tbruang_noranap_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbruang_noranap_onfocus(this, iSeqRow) });
  $('#id_sc_field_bed' + iSeqRow).bind('blur', function() { sc_form_tbruang_bed_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tbruang_bed_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbruang_idruang_onblur(oThis, iSeqRow) {
  do_ajax_form_tbruang_validate_idruang();
  scCssBlur(oThis);
}

function sc_form_tbruang_idruang_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbruang_namaruang_onblur(oThis, iSeqRow) {
  do_ajax_form_tbruang_validate_namaruang();
  scCssBlur(oThis);
}

function sc_form_tbruang_namaruang_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbruang_kelas_onblur(oThis, iSeqRow) {
  do_ajax_form_tbruang_validate_kelas();
  scCssBlur(oThis);
}

function sc_form_tbruang_kelas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbruang_noranap_onblur(oThis, iSeqRow) {
  do_ajax_form_tbruang_validate_noranap();
  scCssBlur(oThis);
}

function sc_form_tbruang_noranap_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbruang_bed_onblur(oThis, iSeqRow) {
  do_ajax_form_tbruang_validate_bed();
  scCssBlur(oThis);
}

function sc_form_tbruang_bed_onfocus(oThis, iSeqRow) {
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
	displayChange_field("idruang", "", status);
	displayChange_field("namaruang", "", status);
	displayChange_field("kelas", "", status);
	displayChange_field("noranap", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("bed", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_idruang(row, status);
	displayChange_field_namaruang(row, status);
	displayChange_field_kelas(row, status);
	displayChange_field_noranap(row, status);
	displayChange_field_bed(row, status);
}

function displayChange_field(field, row, status) {
	if ("idruang" == field) {
		displayChange_field_idruang(row, status);
	}
	if ("namaruang" == field) {
		displayChange_field_namaruang(row, status);
	}
	if ("kelas" == field) {
		displayChange_field_kelas(row, status);
	}
	if ("noranap" == field) {
		displayChange_field_noranap(row, status);
	}
	if ("bed" == field) {
		displayChange_field_bed(row, status);
	}
}

function displayChange_field_idruang(row, status) {
}

function displayChange_field_namaruang(row, status) {
}

function displayChange_field_kelas(row, status) {
}

function displayChange_field_noranap(row, status) {
}

function displayChange_field_bed(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbbed")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbbed")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbruang_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(20);
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

