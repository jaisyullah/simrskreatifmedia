
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
  scEventControl_data["posisi_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["code_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["actcode_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["penolong_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["disc_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kelas_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["posisi_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["posisi_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["code_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["code_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["actcode_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["actcode_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["penolong_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["penolong_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["disc_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["disc_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kelas_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kelas_" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_active_all() {
  for (var i = 1; i < iAjaxNewLine; i++) {
    if (scEventControl_active(i)) {
      return true;
    }
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("posisi_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("code_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("actcode_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("kelas_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("actname_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("posisi_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
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
  $('#id_sc_field_id_' + iSeqRow).bind('blur', function() { sc_form_tbtim_id__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_tbtim_id__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tbtim_id__onfocus(this, iSeqRow) });
  $('#id_sc_field_posisi_' + iSeqRow).bind('blur', function() { sc_form_tbtim_posisi__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_tbtim_posisi__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbtim_posisi__onfocus(this, iSeqRow) });
  $('#id_sc_field_code_' + iSeqRow).bind('blur', function() { sc_form_tbtim_code__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_tbtim_code__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbtim_code__onfocus(this, iSeqRow) });
  $('#id_sc_field_actcode_' + iSeqRow).bind('blur', function() { sc_form_tbtim_actcode__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_tbtim_actcode__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbtim_actcode__onfocus(this, iSeqRow) });
  $('#id_sc_field_disc_' + iSeqRow).bind('blur', function() { sc_form_tbtim_disc__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_tbtim_disc__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbtim_disc__onfocus(this, iSeqRow) });
  $('#id_sc_field_penolong_' + iSeqRow).bind('blur', function() { sc_form_tbtim_penolong__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_tbtim_penolong__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbtim_penolong__onfocus(this, iSeqRow) });
  $('#id_sc_field_kelas_' + iSeqRow).bind('blur', function() { sc_form_tbtim_kelas__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_tbtim_kelas__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbtim_kelas__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbtim_id__onblur(oThis, iSeqRow) {
  do_ajax_form_tbtim_validate_id_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbtim_id__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbtim_id__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbtim_posisi__onblur(oThis, iSeqRow) {
  do_ajax_form_tbtim_validate_posisi_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbtim_posisi__onchange(oThis, iSeqRow) {
  do_ajax_form_tbtim_event_posisi__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_tbtim_posisi__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbtim_code__onblur(oThis, iSeqRow) {
  do_ajax_form_tbtim_validate_code_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbtim_code__onchange(oThis, iSeqRow) {
  do_ajax_form_tbtim_refresh_code_(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_tbtim_code__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbtim_actcode__onblur(oThis, iSeqRow) {
  do_ajax_form_tbtim_validate_actcode_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbtim_actcode__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbtim_actcode__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbtim_disc__onblur(oThis, iSeqRow) {
  do_ajax_form_tbtim_validate_disc_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbtim_disc__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbtim_disc__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbtim_penolong__onblur(oThis, iSeqRow) {
  do_ajax_form_tbtim_validate_penolong_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbtim_penolong__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbtim_penolong__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbtim_kelas__onblur(oThis, iSeqRow) {
  do_ajax_form_tbtim_validate_kelas_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbtim_kelas__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbtim_kelas__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("posisi_", "", status);
	displayChange_field("code_", "", status);
	displayChange_field("actcode_", "", status);
	displayChange_field("penolong_", "", status);
	displayChange_field("disc_", "", status);
	displayChange_field("id_", "", status);
	displayChange_field("kelas_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_posisi_(row, status);
	displayChange_field_code_(row, status);
	displayChange_field_actcode_(row, status);
	displayChange_field_penolong_(row, status);
	displayChange_field_disc_(row, status);
	displayChange_field_id_(row, status);
	displayChange_field_kelas_(row, status);
}

function displayChange_field(field, row, status) {
	if ("posisi_" == field) {
		displayChange_field_posisi_(row, status);
	}
	if ("code_" == field) {
		displayChange_field_code_(row, status);
	}
	if ("actcode_" == field) {
		displayChange_field_actcode_(row, status);
	}
	if ("penolong_" == field) {
		displayChange_field_penolong_(row, status);
	}
	if ("disc_" == field) {
		displayChange_field_disc_(row, status);
	}
	if ("id_" == field) {
		displayChange_field_id_(row, status);
	}
	if ("kelas_" == field) {
		displayChange_field_kelas_(row, status);
	}
}

function displayChange_field_posisi_(row, status) {
}

function displayChange_field_code_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_code___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_code_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "code_");
	}
}

function displayChange_field_actcode_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_actcode___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_actcode_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "actcode_");
	}
}

function displayChange_field_penolong_(row, status) {
}

function displayChange_field_disc_(row, status) {
}

function displayChange_field_id_(row, status) {
}

function displayChange_field_kelas_(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_code_("all", "on");
	displayChange_field_actcode_("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbtim_form" + pageNo).hide();
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
  if (null == specificField || "code_" == specificField) {
    scJQSelect2Add_code_(seqRow);
  }
  if (null == specificField || "actcode_" == specificField) {
    scJQSelect2Add_actcode_(seqRow);
  }
  if (null == specificField || "actname_" == specificField) {
    scJQSelect2Add_actname_(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_code_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_code__obj" : "#id_sc_field_code_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_code__obj',
      dropdownCssClass: 'css_code__obj',
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

function scJQSelect2Add_actcode_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_actcode__obj" : "#id_sc_field_actcode_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_actcode__obj',
      dropdownCssClass: 'css_actcode__obj',
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

function scJQSelect2Add_actname_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_actname__obj" : "#id_sc_field_actname_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_actname__obj',
      dropdownCssClass: 'css_actname__obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_code_) { displayChange_field_code_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_actcode_) { displayChange_field_actcode_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_actname_) { displayChange_field_actname_(iLine, "on"); } }, 150);
} // scJQElementsAdd

