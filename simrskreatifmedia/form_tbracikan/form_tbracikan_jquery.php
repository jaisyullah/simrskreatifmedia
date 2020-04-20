
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
  scEventControl_data["racikancode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jasaresep" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["signakali" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jenisaturanpakai" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["totalracikan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hargatotal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detail" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["racikancode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["racikancode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jasaresep" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jasaresep" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["signakali" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["signakali" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jenisaturanpakai" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jenisaturanpakai" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["totalracikan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["totalracikan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hargatotal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hargatotal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detail" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detail" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["signakali" + iSeqRow]["autocomp"]) {
    return true;
  }
  if (scEventControl_data["jenisaturanpakai" + iSeqRow]["autocomp"]) {
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
  $('#id_sc_field_racikancode' + iSeqRow).bind('blur', function() { sc_form_tbracikan_racikancode_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbracikan_racikancode_onfocus(this, iSeqRow) });
  $('#id_sc_field_jasaresep' + iSeqRow).bind('blur', function() { sc_form_tbracikan_jasaresep_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbracikan_jasaresep_onfocus(this, iSeqRow) });
  $('#id_sc_field_signakali' + iSeqRow).bind('blur', function() { sc_form_tbracikan_signakali_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbracikan_signakali_onfocus(this, iSeqRow) });
  $('#id_sc_field_jenisaturanpakai' + iSeqRow).bind('blur', function() { sc_form_tbracikan_jenisaturanpakai_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_tbracikan_jenisaturanpakai_onfocus(this, iSeqRow) });
  $('#id_sc_field_totalracikan' + iSeqRow).bind('blur', function() { sc_form_tbracikan_totalracikan_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tbracikan_totalracikan_onfocus(this, iSeqRow) });
  $('#id_sc_field_hargatotal' + iSeqRow).bind('blur', function() { sc_form_tbracikan_hargatotal_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbracikan_hargatotal_onfocus(this, iSeqRow) });
  $('#id_sc_field_detail' + iSeqRow).bind('blur', function() { sc_form_tbracikan_detail_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbracikan_detail_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbracikan_racikancode_onblur(oThis, iSeqRow) {
  do_ajax_form_tbracikan_validate_racikancode();
  scCssBlur(oThis);
}

function sc_form_tbracikan_racikancode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbracikan_jasaresep_onblur(oThis, iSeqRow) {
  do_ajax_form_tbracikan_validate_jasaresep();
  scCssBlur(oThis);
}

function sc_form_tbracikan_jasaresep_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbracikan_signakali_onblur(oThis, iSeqRow) {
  do_ajax_form_tbracikan_validate_signakali();
  scCssBlur(oThis);
}

function sc_form_tbracikan_signakali_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_tbracikan_jenisaturanpakai_onblur(oThis, iSeqRow) {
  do_ajax_form_tbracikan_validate_jenisaturanpakai();
  scCssBlur(oThis);
}

function sc_form_tbracikan_jenisaturanpakai_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_tbracikan_totalracikan_onblur(oThis, iSeqRow) {
  do_ajax_form_tbracikan_validate_totalracikan();
  scCssBlur(oThis);
}

function sc_form_tbracikan_totalracikan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbracikan_hargatotal_onblur(oThis, iSeqRow) {
  do_ajax_form_tbracikan_validate_hargatotal();
  scCssBlur(oThis);
}

function sc_form_tbracikan_hargatotal_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbracikan_detail_onblur(oThis, iSeqRow) {
  do_ajax_form_tbracikan_validate_detail();
  scCssBlur(oThis);
}

function sc_form_tbracikan_detail_onfocus(oThis, iSeqRow) {
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
	displayChange_field("racikancode", "", status);
	displayChange_field("jasaresep", "", status);
	displayChange_field("signakali", "", status);
	displayChange_field("jenisaturanpakai", "", status);
	displayChange_field("totalracikan", "", status);
	displayChange_field("hargatotal", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("detail", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_racikancode(row, status);
	displayChange_field_jasaresep(row, status);
	displayChange_field_signakali(row, status);
	displayChange_field_jenisaturanpakai(row, status);
	displayChange_field_totalracikan(row, status);
	displayChange_field_hargatotal(row, status);
	displayChange_field_detail(row, status);
}

function displayChange_field(field, row, status) {
	if ("racikancode" == field) {
		displayChange_field_racikancode(row, status);
	}
	if ("jasaresep" == field) {
		displayChange_field_jasaresep(row, status);
	}
	if ("signakali" == field) {
		displayChange_field_signakali(row, status);
	}
	if ("jenisaturanpakai" == field) {
		displayChange_field_jenisaturanpakai(row, status);
	}
	if ("totalracikan" == field) {
		displayChange_field_totalracikan(row, status);
	}
	if ("hargatotal" == field) {
		displayChange_field_hargatotal(row, status);
	}
	if ("detail" == field) {
		displayChange_field_detail(row, status);
	}
}

function displayChange_field_racikancode(row, status) {
}

function displayChange_field_jasaresep(row, status) {
}

function displayChange_field_signakali(row, status) {
}

function displayChange_field_jenisaturanpakai(row, status) {
}

function displayChange_field_totalracikan(row, status) {
}

function displayChange_field_hargatotal(row, status) {
}

function displayChange_field_detail(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbdetailracikan")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbdetailracikan")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbracikan_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(22);
		}
	}
}
function scJQSpinAdd(iSeqRow) {
  $("#id_sc_field_totalracikan" + iSeqRow).spinner({
    max: 99,
    min: 0,
    step: 1,
    page: 5,
    change: function(event, ui) {
      $(this).trigger("change");
    },
    stop: function(event, ui) {
      $(this).trigger("change");
    }
  });
} // scJQSpinAdd

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

function scJQSelect2Add(seqRow, specificField) {
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQSpinAdd(iLine);
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
} // scJQElementsAdd

