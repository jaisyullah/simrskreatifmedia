
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
  scEventControl_data["nostruk" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["penerima" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["status" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["nostruk" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nostruk" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["penerima" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["penerima" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["status" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["status" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("penerima" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("status" + iSeq == fieldName) {
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
  $('#id_sc_field_nostruk' + iSeqRow).bind('blur', function() { sc_form_tbtracer_nostruk_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbtracer_nostruk_onfocus(this, iSeqRow) });
  $('#id_sc_field_penerima' + iSeqRow).bind('blur', function() { sc_form_tbtracer_penerima_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbtracer_penerima_onfocus(this, iSeqRow) });
  $('#id_sc_field_status' + iSeqRow).bind('blur', function() { sc_form_tbtracer_status_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbtracer_status_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbtracer_nostruk_onblur(oThis, iSeqRow) {
  do_ajax_form_tbtracer_validate_nostruk();
  scCssBlur(oThis);
}

function sc_form_tbtracer_nostruk_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbtracer_penerima_onblur(oThis, iSeqRow) {
  do_ajax_form_tbtracer_validate_penerima();
  scCssBlur(oThis);
}

function sc_form_tbtracer_penerima_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbtracer_status_onblur(oThis, iSeqRow) {
  do_ajax_form_tbtracer_validate_status();
  scCssBlur(oThis);
}

function sc_form_tbtracer_status_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("nostruk", "", status);
	displayChange_field("penerima", "", status);
	displayChange_field("status", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_nostruk(row, status);
	displayChange_field_penerima(row, status);
	displayChange_field_status(row, status);
}

function displayChange_field(field, row, status) {
	if ("nostruk" == field) {
		displayChange_field_nostruk(row, status);
	}
	if ("penerima" == field) {
		displayChange_field_penerima(row, status);
	}
	if ("status" == field) {
		displayChange_field_status(row, status);
	}
}

function displayChange_field_nostruk(row, status) {
}

function displayChange_field_penerima(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_penerima__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_penerima" + row).select2("destroy");
		}
		scJQSelect2Add(row, "penerima");
	}
}

function displayChange_field_status(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_status__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_status" + row).select2("destroy");
		}
		scJQSelect2Add(row, "status");
	}
}

function scRecreateSelect2() {
	displayChange_field_penerima("all", "on");
	displayChange_field_status("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbtracer_form" + pageNo).hide();
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

function scJQSelect2Add(seqRow, specificField) {
  if (null == specificField || "penerima" == specificField) {
    scJQSelect2Add_penerima(seqRow);
  }
  if (null == specificField || "status" == specificField) {
    scJQSelect2Add_status(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_penerima(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_penerima_obj" : "#id_sc_field_penerima" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_penerima_obj',
      dropdownCssClass: 'css_penerima_obj',
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
} // scJQSelect2Add

function scJQSelect2Add_status(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_status_obj" : "#id_sc_field_status" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_status_obj',
      dropdownCssClass: 'css_status_obj',
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_penerima) { displayChange_field_penerima(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_status) { displayChange_field_status(iLine, "on"); } }, 150);
} // scJQElementsAdd

