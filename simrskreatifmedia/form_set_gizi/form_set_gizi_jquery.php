
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
  scEventControl_data["gizi" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jadwal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["mp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ln" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["lh" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["syr" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ekstra" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["buah" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["gizi" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["gizi" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jadwal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jadwal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["mp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["mp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ln" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ln" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["lh" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["lh" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["syr" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["syr" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ekstra" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ekstra" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["buah" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["buah" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("jadwal" + iSeq == fieldName) {
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
  $('#id_sc_field_gizi' + iSeqRow).bind('blur', function() { sc_form_set_gizi_gizi_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_set_gizi_gizi_onfocus(this, iSeqRow) });
  $('#id_sc_field_jadwal' + iSeqRow).bind('blur', function() { sc_form_set_gizi_jadwal_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_set_gizi_jadwal_onfocus(this, iSeqRow) });
  $('#id_sc_field_mp' + iSeqRow).bind('blur', function() { sc_form_set_gizi_mp_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_set_gizi_mp_onfocus(this, iSeqRow) });
  $('#id_sc_field_ln' + iSeqRow).bind('blur', function() { sc_form_set_gizi_ln_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_set_gizi_ln_onfocus(this, iSeqRow) });
  $('#id_sc_field_lh' + iSeqRow).bind('blur', function() { sc_form_set_gizi_lh_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_set_gizi_lh_onfocus(this, iSeqRow) });
  $('#id_sc_field_syr' + iSeqRow).bind('blur', function() { sc_form_set_gizi_syr_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_set_gizi_syr_onfocus(this, iSeqRow) });
  $('#id_sc_field_ekstra' + iSeqRow).bind('blur', function() { sc_form_set_gizi_ekstra_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_set_gizi_ekstra_onfocus(this, iSeqRow) });
  $('#id_sc_field_buah' + iSeqRow).bind('blur', function() { sc_form_set_gizi_buah_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_set_gizi_buah_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_set_gizi_gizi_onblur(oThis, iSeqRow) {
  do_ajax_form_set_gizi_validate_gizi();
  scCssBlur(oThis);
}

function sc_form_set_gizi_gizi_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_set_gizi_jadwal_onblur(oThis, iSeqRow) {
  do_ajax_form_set_gizi_validate_jadwal();
  scCssBlur(oThis);
}

function sc_form_set_gizi_jadwal_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_set_gizi_mp_onblur(oThis, iSeqRow) {
  do_ajax_form_set_gizi_validate_mp();
  scCssBlur(oThis);
}

function sc_form_set_gizi_mp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_set_gizi_ln_onblur(oThis, iSeqRow) {
  do_ajax_form_set_gizi_validate_ln();
  scCssBlur(oThis);
}

function sc_form_set_gizi_ln_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_set_gizi_lh_onblur(oThis, iSeqRow) {
  do_ajax_form_set_gizi_validate_lh();
  scCssBlur(oThis);
}

function sc_form_set_gizi_lh_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_set_gizi_syr_onblur(oThis, iSeqRow) {
  do_ajax_form_set_gizi_validate_syr();
  scCssBlur(oThis);
}

function sc_form_set_gizi_syr_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_set_gizi_ekstra_onblur(oThis, iSeqRow) {
  do_ajax_form_set_gizi_validate_ekstra();
  scCssBlur(oThis);
}

function sc_form_set_gizi_ekstra_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_set_gizi_buah_onblur(oThis, iSeqRow) {
  do_ajax_form_set_gizi_validate_buah();
  scCssBlur(oThis);
}

function sc_form_set_gizi_buah_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("gizi", "", status);
	displayChange_field("jadwal", "", status);
	displayChange_field("mp", "", status);
	displayChange_field("ln", "", status);
	displayChange_field("lh", "", status);
	displayChange_field("syr", "", status);
	displayChange_field("ekstra", "", status);
	displayChange_field("buah", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_gizi(row, status);
	displayChange_field_jadwal(row, status);
	displayChange_field_mp(row, status);
	displayChange_field_ln(row, status);
	displayChange_field_lh(row, status);
	displayChange_field_syr(row, status);
	displayChange_field_ekstra(row, status);
	displayChange_field_buah(row, status);
}

function displayChange_field(field, row, status) {
	if ("gizi" == field) {
		displayChange_field_gizi(row, status);
	}
	if ("jadwal" == field) {
		displayChange_field_jadwal(row, status);
	}
	if ("mp" == field) {
		displayChange_field_mp(row, status);
	}
	if ("ln" == field) {
		displayChange_field_ln(row, status);
	}
	if ("lh" == field) {
		displayChange_field_lh(row, status);
	}
	if ("syr" == field) {
		displayChange_field_syr(row, status);
	}
	if ("ekstra" == field) {
		displayChange_field_ekstra(row, status);
	}
	if ("buah" == field) {
		displayChange_field_buah(row, status);
	}
}

function displayChange_field_gizi(row, status) {
}

function displayChange_field_jadwal(row, status) {
}

function displayChange_field_mp(row, status) {
}

function displayChange_field_ln(row, status) {
}

function displayChange_field_lh(row, status) {
}

function displayChange_field_syr(row, status) {
}

function displayChange_field_ekstra(row, status) {
}

function displayChange_field_buah(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_set_gizi_form" + pageNo).hide();
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

