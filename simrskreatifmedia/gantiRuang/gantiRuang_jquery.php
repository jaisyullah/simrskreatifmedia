
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
  scEventControl_data["sc_field_1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["custcode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kelas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_0" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["sc_field_1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["custcode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["custcode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kelas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kelas" + iSeqRow]["change"]) {
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
  if (scEventControl_data["sc_field_0" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_0" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("custcode" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("sc_field_2" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("sc_field_3" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("sc_field_0" + iSeq == fieldName) {
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
  $('#id_sc_field_sc_field_0' + iSeqRow).bind('blur', function() { sc_gantiRuang_sc_field_0_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_gantiRuang_sc_field_0_onfocus(this, iSeqRow) });
  $('#id_sc_field_kelas' + iSeqRow).bind('blur', function() { sc_gantiRuang_kelas_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_gantiRuang_kelas_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_1' + iSeqRow).bind('blur', function() { sc_gantiRuang_sc_field_1_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_gantiRuang_sc_field_1_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_2' + iSeqRow).bind('blur', function() { sc_gantiRuang_sc_field_2_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_gantiRuang_sc_field_2_onfocus(this, iSeqRow) });
  $('#id_sc_field_custcode' + iSeqRow).bind('blur', function() { sc_gantiRuang_custcode_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_gantiRuang_custcode_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_3' + iSeqRow).bind('blur', function() { sc_gantiRuang_sc_field_3_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_gantiRuang_sc_field_3_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_gantiRuang_sc_field_3_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_gantiRuang_sc_field_0_onblur(oThis, iSeqRow) {
  do_ajax_gantiRuang_validate_sc_field_0();
  scCssBlur(oThis);
}

function sc_gantiRuang_sc_field_0_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_gantiRuang_kelas_onblur(oThis, iSeqRow) {
  do_ajax_gantiRuang_validate_kelas();
  scCssBlur(oThis);
}

function sc_gantiRuang_kelas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_gantiRuang_sc_field_1_onblur(oThis, iSeqRow) {
  do_ajax_gantiRuang_validate_sc_field_1();
  scCssBlur(oThis);
}

function sc_gantiRuang_sc_field_1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_gantiRuang_sc_field_2_onblur(oThis, iSeqRow) {
  do_ajax_gantiRuang_validate_sc_field_2();
  scCssBlur(oThis);
}

function sc_gantiRuang_sc_field_2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_gantiRuang_custcode_onblur(oThis, iSeqRow) {
  do_ajax_gantiRuang_validate_custcode();
  scCssBlur(oThis);
}

function sc_gantiRuang_custcode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_gantiRuang_sc_field_3_onblur(oThis, iSeqRow) {
  do_ajax_gantiRuang_validate_sc_field_3();
  scCssBlur(oThis);
}

function sc_gantiRuang_sc_field_3_onchange(oThis, iSeqRow) {
  do_ajax_gantiRuang_refresh_sc_field_3();
}

function sc_gantiRuang_sc_field_3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("sc_field_1", "", status);
	displayChange_field("custcode", "", status);
	displayChange_field("kelas", "", status);
	displayChange_field("sc_field_2", "", status);
	displayChange_field("sc_field_3", "", status);
	displayChange_field("sc_field_0", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_sc_field_1(row, status);
	displayChange_field_custcode(row, status);
	displayChange_field_kelas(row, status);
	displayChange_field_sc_field_2(row, status);
	displayChange_field_sc_field_3(row, status);
	displayChange_field_sc_field_0(row, status);
}

function displayChange_field(field, row, status) {
	if ("sc_field_1" == field) {
		displayChange_field_sc_field_1(row, status);
	}
	if ("custcode" == field) {
		displayChange_field_custcode(row, status);
	}
	if ("kelas" == field) {
		displayChange_field_kelas(row, status);
	}
	if ("sc_field_2" == field) {
		displayChange_field_sc_field_2(row, status);
	}
	if ("sc_field_3" == field) {
		displayChange_field_sc_field_3(row, status);
	}
	if ("sc_field_0" == field) {
		displayChange_field_sc_field_0(row, status);
	}
}

function displayChange_field_sc_field_1(row, status) {
}

function displayChange_field_custcode(row, status) {
}

function displayChange_field_kelas(row, status) {
}

function displayChange_field_sc_field_2(row, status) {
}

function displayChange_field_sc_field_3(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_sc_field_3__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_sc_field_3" + row).select2("destroy");
		}
		scJQSelect2Add(row, "sc_field_3");
	}
}

function displayChange_field_sc_field_0(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_sc_field_0__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_sc_field_0" + row).select2("destroy");
		}
		scJQSelect2Add(row, "sc_field_0");
	}
}

function scRecreateSelect2() {
	displayChange_field_sc_field_3("all", "on");
	displayChange_field_sc_field_0("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_gantiRuang_form" + pageNo).hide();
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
  if (null == specificField || "sc_field_3" == specificField) {
    scJQSelect2Add_sc_field_3(seqRow);
  }
  if (null == specificField || "sc_field_0" == specificField) {
    scJQSelect2Add_sc_field_0(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_sc_field_3(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_sc_field_3_obj" : "#id_sc_field_sc_field_3" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_sc_field_3_obj',
      dropdownCssClass: 'css_sc_field_3_obj',
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

function scJQSelect2Add_sc_field_0(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_sc_field_0_obj" : "#id_sc_field_sc_field_0" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_sc_field_0_obj',
      dropdownCssClass: 'css_sc_field_0_obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_sc_field_3) { displayChange_field_sc_field_3(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_sc_field_0) { displayChange_field_sc_field_0(iLine, "on"); } }, 150);
} // scJQElementsAdd

