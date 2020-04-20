
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
  scEventControl_data["npocode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jenis" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["alasan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pj" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["npodate" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["selesai" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detailnpo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["npocode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["npocode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jenis" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jenis" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["alasan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["alasan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pj" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pj" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["npodate" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["npodate" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["selesai" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["selesai" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detailnpo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detailnpo" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("selesai" + iSeq == fieldName) {
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
  $('#id_sc_field_npocode' + iSeqRow).bind('blur', function() { sc_form_tbnpo_npocode_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbnpo_npocode_onfocus(this, iSeqRow) });
  $('#id_sc_field_alasan' + iSeqRow).bind('blur', function() { sc_form_tbnpo_alasan_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbnpo_alasan_onfocus(this, iSeqRow) });
  $('#id_sc_field_jenis' + iSeqRow).bind('blur', function() { sc_form_tbnpo_jenis_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbnpo_jenis_onfocus(this, iSeqRow) });
  $('#id_sc_field_pj' + iSeqRow).bind('blur', function() { sc_form_tbnpo_pj_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_tbnpo_pj_onfocus(this, iSeqRow) });
  $('#id_sc_field_npodate' + iSeqRow).bind('blur', function() { sc_form_tbnpo_npodate_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbnpo_npodate_onfocus(this, iSeqRow) });
  $('#id_sc_field_npodate_hora' + iSeqRow).bind('blur', function() { sc_form_tbnpo_npodate_hora_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tbnpo_npodate_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_selesai' + iSeqRow).bind('blur', function() { sc_form_tbnpo_selesai_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbnpo_selesai_onfocus(this, iSeqRow) });
  $('#id_sc_field_detailnpo' + iSeqRow).bind('blur', function() { sc_form_tbnpo_detailnpo_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbnpo_detailnpo_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbnpo_npocode_onblur(oThis, iSeqRow) {
  do_ajax_form_tbnpo_validate_npocode();
  scCssBlur(oThis);
}

function sc_form_tbnpo_npocode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbnpo_alasan_onblur(oThis, iSeqRow) {
  do_ajax_form_tbnpo_validate_alasan();
  scCssBlur(oThis);
}

function sc_form_tbnpo_alasan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbnpo_jenis_onblur(oThis, iSeqRow) {
  do_ajax_form_tbnpo_validate_jenis();
  scCssBlur(oThis);
}

function sc_form_tbnpo_jenis_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbnpo_pj_onblur(oThis, iSeqRow) {
  do_ajax_form_tbnpo_validate_pj();
  scCssBlur(oThis);
}

function sc_form_tbnpo_pj_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbnpo_npodate_onblur(oThis, iSeqRow) {
  do_ajax_form_tbnpo_validate_npodate();
  scCssBlur(oThis);
}

function sc_form_tbnpo_npodate_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_tbnpo_validate_npodate();
  scCssBlur(oThis);
}

function sc_form_tbnpo_npodate_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbnpo_npodate_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbnpo_selesai_onblur(oThis, iSeqRow) {
  do_ajax_form_tbnpo_validate_selesai();
  scCssBlur(oThis);
}

function sc_form_tbnpo_selesai_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbnpo_detailnpo_onblur(oThis, iSeqRow) {
  do_ajax_form_tbnpo_validate_detailnpo();
  scCssBlur(oThis);
}

function sc_form_tbnpo_detailnpo_onfocus(oThis, iSeqRow) {
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
	displayChange_field("npocode", "", status);
	displayChange_field("jenis", "", status);
	displayChange_field("alasan", "", status);
	displayChange_field("pj", "", status);
	displayChange_field("npodate", "", status);
	displayChange_field("selesai", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("detailnpo", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_npocode(row, status);
	displayChange_field_jenis(row, status);
	displayChange_field_alasan(row, status);
	displayChange_field_pj(row, status);
	displayChange_field_npodate(row, status);
	displayChange_field_selesai(row, status);
	displayChange_field_detailnpo(row, status);
}

function displayChange_field(field, row, status) {
	if ("npocode" == field) {
		displayChange_field_npocode(row, status);
	}
	if ("jenis" == field) {
		displayChange_field_jenis(row, status);
	}
	if ("alasan" == field) {
		displayChange_field_alasan(row, status);
	}
	if ("pj" == field) {
		displayChange_field_pj(row, status);
	}
	if ("npodate" == field) {
		displayChange_field_npodate(row, status);
	}
	if ("selesai" == field) {
		displayChange_field_selesai(row, status);
	}
	if ("detailnpo" == field) {
		displayChange_field_detailnpo(row, status);
	}
}

function displayChange_field_npocode(row, status) {
}

function displayChange_field_jenis(row, status) {
}

function displayChange_field_alasan(row, status) {
}

function displayChange_field_pj(row, status) {
}

function displayChange_field_npodate(row, status) {
}

function displayChange_field_selesai(row, status) {
}

function displayChange_field_detailnpo(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbdetailnpo")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbdetailnpo")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbnpo_form" + pageNo).hide();
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

function scJQSelect2Add(seqRow, specificField) {
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
} // scJQElementsAdd

