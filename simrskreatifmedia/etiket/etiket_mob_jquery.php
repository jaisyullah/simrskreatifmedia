
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
  scEventControl_data["sc_field_0" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_4" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_5" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_6" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_7" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_8" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_9" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["sc_field_0" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_0" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_4" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_4" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_5" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_5" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_6" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_6" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_7" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_7" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_8" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_8" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_9" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_9" + iSeqRow]["change"]) {
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
  $('#id_sc_field_sc_field_0' + iSeqRow).bind('blur', function() { sc_etiket_sc_field_0_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_etiket_sc_field_0_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_1' + iSeqRow).bind('blur', function() { sc_etiket_sc_field_1_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_etiket_sc_field_1_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_2' + iSeqRow).bind('blur', function() { sc_etiket_sc_field_2_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_etiket_sc_field_2_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_3' + iSeqRow).bind('blur', function() { sc_etiket_sc_field_3_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_etiket_sc_field_3_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_4' + iSeqRow).bind('blur', function() { sc_etiket_sc_field_4_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_etiket_sc_field_4_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_5' + iSeqRow).bind('blur', function() { sc_etiket_sc_field_5_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_etiket_sc_field_5_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_6' + iSeqRow).bind('blur', function() { sc_etiket_sc_field_6_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_etiket_sc_field_6_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_7' + iSeqRow).bind('blur', function() { sc_etiket_sc_field_7_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_etiket_sc_field_7_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_8' + iSeqRow).bind('blur', function() { sc_etiket_sc_field_8_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_etiket_sc_field_8_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_9' + iSeqRow).bind('blur', function() { sc_etiket_sc_field_9_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_etiket_sc_field_9_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_etiket_sc_field_0_onblur(oThis, iSeqRow) {
  do_ajax_etiket_mob_validate_sc_field_0();
  scCssBlur(oThis);
}

function sc_etiket_sc_field_0_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_etiket_sc_field_1_onblur(oThis, iSeqRow) {
  do_ajax_etiket_mob_validate_sc_field_1();
  scCssBlur(oThis);
}

function sc_etiket_sc_field_1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_etiket_sc_field_2_onblur(oThis, iSeqRow) {
  do_ajax_etiket_mob_validate_sc_field_2();
  scCssBlur(oThis);
}

function sc_etiket_sc_field_2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_etiket_sc_field_3_onblur(oThis, iSeqRow) {
  do_ajax_etiket_mob_validate_sc_field_3();
  scCssBlur(oThis);
}

function sc_etiket_sc_field_3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_etiket_sc_field_4_onblur(oThis, iSeqRow) {
  do_ajax_etiket_mob_validate_sc_field_4();
  scCssBlur(oThis);
}

function sc_etiket_sc_field_4_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_etiket_sc_field_5_onblur(oThis, iSeqRow) {
  do_ajax_etiket_mob_validate_sc_field_5();
  scCssBlur(oThis);
}

function sc_etiket_sc_field_5_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_etiket_sc_field_6_onblur(oThis, iSeqRow) {
  do_ajax_etiket_mob_validate_sc_field_6();
  scCssBlur(oThis);
}

function sc_etiket_sc_field_6_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_etiket_sc_field_7_onblur(oThis, iSeqRow) {
  do_ajax_etiket_mob_validate_sc_field_7();
  scCssBlur(oThis);
}

function sc_etiket_sc_field_7_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_etiket_sc_field_8_onblur(oThis, iSeqRow) {
  do_ajax_etiket_mob_validate_sc_field_8();
  scCssBlur(oThis);
}

function sc_etiket_sc_field_8_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_etiket_sc_field_9_onblur(oThis, iSeqRow) {
  do_ajax_etiket_mob_validate_sc_field_9();
  scCssBlur(oThis);
}

function sc_etiket_sc_field_9_onfocus(oThis, iSeqRow) {
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
	if ("2" == block) {
		displayChange_block_2(status);
	}
	if ("3" == block) {
		displayChange_block_3(status);
	}
	if ("4" == block) {
		displayChange_block_4(status);
	}
	if ("5" == block) {
		displayChange_block_5(status);
	}
	if ("6" == block) {
		displayChange_block_6(status);
	}
	if ("7" == block) {
		displayChange_block_7(status);
	}
	if ("8" == block) {
		displayChange_block_8(status);
	}
	if ("9" == block) {
		displayChange_block_9(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("sc_field_0", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("sc_field_1", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("sc_field_2", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("sc_field_3", "", status);
}

function displayChange_block_4(status) {
	displayChange_field("sc_field_4", "", status);
}

function displayChange_block_5(status) {
	displayChange_field("sc_field_5", "", status);
}

function displayChange_block_6(status) {
	displayChange_field("sc_field_6", "", status);
}

function displayChange_block_7(status) {
	displayChange_field("sc_field_7", "", status);
}

function displayChange_block_8(status) {
	displayChange_field("sc_field_8", "", status);
}

function displayChange_block_9(status) {
	displayChange_field("sc_field_9", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_sc_field_0(row, status);
	displayChange_field_sc_field_1(row, status);
	displayChange_field_sc_field_2(row, status);
	displayChange_field_sc_field_3(row, status);
	displayChange_field_sc_field_4(row, status);
	displayChange_field_sc_field_5(row, status);
	displayChange_field_sc_field_6(row, status);
	displayChange_field_sc_field_7(row, status);
	displayChange_field_sc_field_8(row, status);
	displayChange_field_sc_field_9(row, status);
}

function displayChange_field(field, row, status) {
	if ("sc_field_0" == field) {
		displayChange_field_sc_field_0(row, status);
	}
	if ("sc_field_1" == field) {
		displayChange_field_sc_field_1(row, status);
	}
	if ("sc_field_2" == field) {
		displayChange_field_sc_field_2(row, status);
	}
	if ("sc_field_3" == field) {
		displayChange_field_sc_field_3(row, status);
	}
	if ("sc_field_4" == field) {
		displayChange_field_sc_field_4(row, status);
	}
	if ("sc_field_5" == field) {
		displayChange_field_sc_field_5(row, status);
	}
	if ("sc_field_6" == field) {
		displayChange_field_sc_field_6(row, status);
	}
	if ("sc_field_7" == field) {
		displayChange_field_sc_field_7(row, status);
	}
	if ("sc_field_8" == field) {
		displayChange_field_sc_field_8(row, status);
	}
	if ("sc_field_9" == field) {
		displayChange_field_sc_field_9(row, status);
	}
}

function displayChange_field_sc_field_0(row, status) {
}

function displayChange_field_sc_field_1(row, status) {
}

function displayChange_field_sc_field_2(row, status) {
}

function displayChange_field_sc_field_3(row, status) {
}

function displayChange_field_sc_field_4(row, status) {
}

function displayChange_field_sc_field_5(row, status) {
}

function displayChange_field_sc_field_6(row, status) {
}

function displayChange_field_sc_field_7(row, status) {
}

function displayChange_field_sc_field_8(row, status) {
}

function displayChange_field_sc_field_9(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_etiket_mob_form" + pageNo).hide();
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

