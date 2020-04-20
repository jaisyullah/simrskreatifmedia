
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
  scEventControl_data["instrumentid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["port" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["baud" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["parity" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["stopbit" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["databit" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["instrumentid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["instrumentid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["port" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["port" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["baud" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["baud" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["parity" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["parity" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["stopbit" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["stopbit" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["databit" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["databit" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("instrumentid" + iSeq == fieldName) {
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
  $('#id_sc_field_instrumentid' + iSeqRow).bind('blur', function() { sc_connectLIS_instrumentid_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_connectLIS_instrumentid_onfocus(this, iSeqRow) });
  $('#id_sc_field_port' + iSeqRow).bind('blur', function() { sc_connectLIS_port_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_connectLIS_port_onfocus(this, iSeqRow) });
  $('#id_sc_field_baud' + iSeqRow).bind('blur', function() { sc_connectLIS_baud_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_connectLIS_baud_onfocus(this, iSeqRow) });
  $('#id_sc_field_parity' + iSeqRow).bind('blur', function() { sc_connectLIS_parity_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_connectLIS_parity_onfocus(this, iSeqRow) });
  $('#id_sc_field_stopbit' + iSeqRow).bind('blur', function() { sc_connectLIS_stopbit_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_connectLIS_stopbit_onfocus(this, iSeqRow) });
  $('#id_sc_field_databit' + iSeqRow).bind('blur', function() { sc_connectLIS_databit_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_connectLIS_databit_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_connectLIS_instrumentid_onblur(oThis, iSeqRow) {
  do_ajax_connectLIS_validate_instrumentid();
  scCssBlur(oThis);
}

function sc_connectLIS_instrumentid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_connectLIS_port_onblur(oThis, iSeqRow) {
  do_ajax_connectLIS_validate_port();
  scCssBlur(oThis);
}

function sc_connectLIS_port_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_connectLIS_baud_onblur(oThis, iSeqRow) {
  do_ajax_connectLIS_validate_baud();
  scCssBlur(oThis);
}

function sc_connectLIS_baud_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_connectLIS_parity_onblur(oThis, iSeqRow) {
  do_ajax_connectLIS_validate_parity();
  scCssBlur(oThis);
}

function sc_connectLIS_parity_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_connectLIS_stopbit_onblur(oThis, iSeqRow) {
  do_ajax_connectLIS_validate_stopbit();
  scCssBlur(oThis);
}

function sc_connectLIS_stopbit_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_connectLIS_databit_onblur(oThis, iSeqRow) {
  do_ajax_connectLIS_validate_databit();
  scCssBlur(oThis);
}

function sc_connectLIS_databit_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("instrumentid", "", status);
	displayChange_field("port", "", status);
	displayChange_field("baud", "", status);
	displayChange_field("parity", "", status);
	displayChange_field("stopbit", "", status);
	displayChange_field("databit", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_instrumentid(row, status);
	displayChange_field_port(row, status);
	displayChange_field_baud(row, status);
	displayChange_field_parity(row, status);
	displayChange_field_stopbit(row, status);
	displayChange_field_databit(row, status);
}

function displayChange_field(field, row, status) {
	if ("instrumentid" == field) {
		displayChange_field_instrumentid(row, status);
	}
	if ("port" == field) {
		displayChange_field_port(row, status);
	}
	if ("baud" == field) {
		displayChange_field_baud(row, status);
	}
	if ("parity" == field) {
		displayChange_field_parity(row, status);
	}
	if ("stopbit" == field) {
		displayChange_field_stopbit(row, status);
	}
	if ("databit" == field) {
		displayChange_field_databit(row, status);
	}
}

function displayChange_field_instrumentid(row, status) {
}

function displayChange_field_port(row, status) {
}

function displayChange_field_baud(row, status) {
}

function displayChange_field_parity(row, status) {
}

function displayChange_field_stopbit(row, status) {
}

function displayChange_field_databit(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_connectLIS_form" + pageNo).hide();
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


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

