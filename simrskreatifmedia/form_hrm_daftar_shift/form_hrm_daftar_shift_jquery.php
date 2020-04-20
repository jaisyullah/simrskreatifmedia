
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
  scEventControl_data["id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["keterangan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["start_time" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["end_time" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["keterangan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["keterangan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["start_time" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["start_time" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["end_time" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["end_time" + iSeqRow]["change"]) {
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
  $('#id_sc_field_id' + iSeqRow).bind('blur', function() { sc_form_hrm_daftar_shift_id_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_hrm_daftar_shift_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_keterangan' + iSeqRow).bind('blur', function() { sc_form_hrm_daftar_shift_keterangan_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_hrm_daftar_shift_keterangan_onfocus(this, iSeqRow) });
  $('#id_sc_field_start_time' + iSeqRow).bind('blur', function() { sc_form_hrm_daftar_shift_start_time_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_hrm_daftar_shift_start_time_onfocus(this, iSeqRow) });
  $('#id_sc_field_end_time' + iSeqRow).bind('blur', function() { sc_form_hrm_daftar_shift_end_time_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_hrm_daftar_shift_end_time_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_hrm_daftar_shift_id_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_daftar_shift_validate_id();
  scCssBlur(oThis);
}

function sc_form_hrm_daftar_shift_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_daftar_shift_keterangan_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_daftar_shift_validate_keterangan();
  scCssBlur(oThis);
}

function sc_form_hrm_daftar_shift_keterangan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_daftar_shift_start_time_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_daftar_shift_validate_start_time();
  scCssBlur(oThis);
}

function sc_form_hrm_daftar_shift_start_time_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_daftar_shift_end_time_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_daftar_shift_validate_end_time();
  scCssBlur(oThis);
}

function sc_form_hrm_daftar_shift_end_time_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("id", "", status);
	displayChange_field("keterangan", "", status);
	displayChange_field("start_time", "", status);
	displayChange_field("end_time", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_id(row, status);
	displayChange_field_keterangan(row, status);
	displayChange_field_start_time(row, status);
	displayChange_field_end_time(row, status);
}

function displayChange_field(field, row, status) {
	if ("id" == field) {
		displayChange_field_id(row, status);
	}
	if ("keterangan" == field) {
		displayChange_field_keterangan(row, status);
	}
	if ("start_time" == field) {
		displayChange_field_start_time(row, status);
	}
	if ("end_time" == field) {
		displayChange_field_end_time(row, status);
	}
}

function displayChange_field_id(row, status) {
}

function displayChange_field_keterangan(row, status) {
}

function displayChange_field_start_time(row, status) {
}

function displayChange_field_end_time(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_hrm_daftar_shift_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(29);
		}
	}
}
var sc_jq_timepicker_value = {};

function scJQTimePickerAdd(iSeqRow) {
  $("#id_sc_field_start_time" + iSeqRow).timepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_timepicker_value["#id_sc_field_start_time" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      if (sc_jq_timepicker_value["#id_sc_field_start_time" + iSeqRow] != dateText) {
        $("#id_sc_field_start_time" + iSeqRow).trigger('change');
      }
    },
    hourText: "<?php   echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_hour'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    minuteText: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_mint'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    timeSeparator: ":",
  });

  $("#id_sc_field_end_time" + iSeqRow).timepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_timepicker_value["#id_sc_field_end_time" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      if (sc_jq_timepicker_value["#id_sc_field_end_time" + iSeqRow] != dateText) {
        $("#id_sc_field_end_time" + iSeqRow).trigger('change');
      }
    },
    hourText: "<?php   echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_hour'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    minuteText: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_jscr_mint'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    timeSeparator: ":",
  });

} // scJQTimePickerAdd

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQTimePickerAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

