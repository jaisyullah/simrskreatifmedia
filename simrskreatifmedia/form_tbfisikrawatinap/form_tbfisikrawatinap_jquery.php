
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
  scEventControl_data["tinggi_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["berat_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detakjantung_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tekanandarah_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["suhu_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nafas_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["keluhan_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pemeriksa_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tglperiksa_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["trancode_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["tinggi_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tinggi_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["berat_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["berat_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detakjantung_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detakjantung_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tekanandarah_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tekanandarah_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["suhu_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["suhu_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nafas_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nafas_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["keluhan_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["keluhan_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pemeriksa_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pemeriksa_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tglperiksa_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tglperiksa_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["trancode_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["trancode_" + iSeqRow]["change"]) {
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
  if ("pemeriksa_" + iSeq == fieldName) {
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
  $('#id_sc_field_trancode_' + iSeqRow).bind('blur', function() { sc_form_tbfisikrawatinap_trancode__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_tbfisikrawatinap_trancode__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbfisikrawatinap_trancode__onfocus(this, iSeqRow) });
  $('#id_sc_field_tinggi_' + iSeqRow).bind('blur', function() { sc_form_tbfisikrawatinap_tinggi__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_tbfisikrawatinap_tinggi__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbfisikrawatinap_tinggi__onfocus(this, iSeqRow) });
  $('#id_sc_field_berat_' + iSeqRow).bind('blur', function() { sc_form_tbfisikrawatinap_berat__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_tbfisikrawatinap_berat__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbfisikrawatinap_berat__onfocus(this, iSeqRow) });
  $('#id_sc_field_detakjantung_' + iSeqRow).bind('blur', function() { sc_form_tbfisikrawatinap_detakjantung__onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_tbfisikrawatinap_detakjantung__onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_tbfisikrawatinap_detakjantung__onfocus(this, iSeqRow) });
  $('#id_sc_field_tekanandarah_' + iSeqRow).bind('blur', function() { sc_form_tbfisikrawatinap_tekanandarah__onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_tbfisikrawatinap_tekanandarah__onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_tbfisikrawatinap_tekanandarah__onfocus(this, iSeqRow) });
  $('#id_sc_field_suhu_' + iSeqRow).bind('blur', function() { sc_form_tbfisikrawatinap_suhu__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_tbfisikrawatinap_suhu__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbfisikrawatinap_suhu__onfocus(this, iSeqRow) });
  $('#id_sc_field_nafas_' + iSeqRow).bind('blur', function() { sc_form_tbfisikrawatinap_nafas__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_tbfisikrawatinap_nafas__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbfisikrawatinap_nafas__onfocus(this, iSeqRow) });
  $('#id_sc_field_keluhan_' + iSeqRow).bind('blur', function() { sc_form_tbfisikrawatinap_keluhan__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_tbfisikrawatinap_keluhan__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbfisikrawatinap_keluhan__onfocus(this, iSeqRow) });
  $('#id_sc_field_pemeriksa_' + iSeqRow).bind('blur', function() { sc_form_tbfisikrawatinap_pemeriksa__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_tbfisikrawatinap_pemeriksa__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbfisikrawatinap_pemeriksa__onfocus(this, iSeqRow) });
  $('#id_sc_field_tglperiksa_' + iSeqRow).bind('blur', function() { sc_form_tbfisikrawatinap_tglperiksa__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_tbfisikrawatinap_tglperiksa__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbfisikrawatinap_tglperiksa__onfocus(this, iSeqRow) });
  $('#id_sc_field_tglperiksa__hora' + iSeqRow).bind('blur', function() { sc_form_tbfisikrawatinap_tglperiksa__hora_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_tbfisikrawatinap_tglperiksa__hora_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_tbfisikrawatinap_tglperiksa__hora_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbfisikrawatinap_trancode__onblur(oThis, iSeqRow) {
  do_ajax_form_tbfisikrawatinap_validate_trancode_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbfisikrawatinap_trancode__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbfisikrawatinap_trancode__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbfisikrawatinap_tinggi__onblur(oThis, iSeqRow) {
  do_ajax_form_tbfisikrawatinap_validate_tinggi_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbfisikrawatinap_tinggi__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbfisikrawatinap_tinggi__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbfisikrawatinap_berat__onblur(oThis, iSeqRow) {
  do_ajax_form_tbfisikrawatinap_validate_berat_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbfisikrawatinap_berat__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbfisikrawatinap_berat__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbfisikrawatinap_detakjantung__onblur(oThis, iSeqRow) {
  do_ajax_form_tbfisikrawatinap_validate_detakjantung_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbfisikrawatinap_detakjantung__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbfisikrawatinap_detakjantung__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbfisikrawatinap_tekanandarah__onblur(oThis, iSeqRow) {
  do_ajax_form_tbfisikrawatinap_validate_tekanandarah_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbfisikrawatinap_tekanandarah__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbfisikrawatinap_tekanandarah__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbfisikrawatinap_suhu__onblur(oThis, iSeqRow) {
  do_ajax_form_tbfisikrawatinap_validate_suhu_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbfisikrawatinap_suhu__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbfisikrawatinap_suhu__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbfisikrawatinap_nafas__onblur(oThis, iSeqRow) {
  do_ajax_form_tbfisikrawatinap_validate_nafas_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbfisikrawatinap_nafas__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbfisikrawatinap_nafas__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbfisikrawatinap_keluhan__onblur(oThis, iSeqRow) {
  do_ajax_form_tbfisikrawatinap_validate_keluhan_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbfisikrawatinap_keluhan__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbfisikrawatinap_keluhan__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbfisikrawatinap_pemeriksa__onblur(oThis, iSeqRow) {
  do_ajax_form_tbfisikrawatinap_validate_pemeriksa_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbfisikrawatinap_pemeriksa__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbfisikrawatinap_pemeriksa__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbfisikrawatinap_tglperiksa__onblur(oThis, iSeqRow) {
  do_ajax_form_tbfisikrawatinap_validate_tglperiksa_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbfisikrawatinap_tglperiksa__hora_onblur(oThis, iSeqRow) {
  do_ajax_form_tbfisikrawatinap_validate_tglperiksa_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbfisikrawatinap_tglperiksa__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbfisikrawatinap_tglperiksa__hora_onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbfisikrawatinap_tglperiksa__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbfisikrawatinap_tglperiksa__hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("tinggi_", "", status);
	displayChange_field("berat_", "", status);
	displayChange_field("detakjantung_", "", status);
	displayChange_field("tekanandarah_", "", status);
	displayChange_field("suhu_", "", status);
	displayChange_field("nafas_", "", status);
	displayChange_field("keluhan_", "", status);
	displayChange_field("pemeriksa_", "", status);
	displayChange_field("tglperiksa_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_tinggi_(row, status);
	displayChange_field_berat_(row, status);
	displayChange_field_detakjantung_(row, status);
	displayChange_field_tekanandarah_(row, status);
	displayChange_field_suhu_(row, status);
	displayChange_field_nafas_(row, status);
	displayChange_field_keluhan_(row, status);
	displayChange_field_pemeriksa_(row, status);
	displayChange_field_tglperiksa_(row, status);
	displayChange_field_trancode_(row, status);
}

function displayChange_field(field, row, status) {
	if ("tinggi_" == field) {
		displayChange_field_tinggi_(row, status);
	}
	if ("berat_" == field) {
		displayChange_field_berat_(row, status);
	}
	if ("detakjantung_" == field) {
		displayChange_field_detakjantung_(row, status);
	}
	if ("tekanandarah_" == field) {
		displayChange_field_tekanandarah_(row, status);
	}
	if ("suhu_" == field) {
		displayChange_field_suhu_(row, status);
	}
	if ("nafas_" == field) {
		displayChange_field_nafas_(row, status);
	}
	if ("keluhan_" == field) {
		displayChange_field_keluhan_(row, status);
	}
	if ("pemeriksa_" == field) {
		displayChange_field_pemeriksa_(row, status);
	}
	if ("tglperiksa_" == field) {
		displayChange_field_tglperiksa_(row, status);
	}
	if ("trancode_" == field) {
		displayChange_field_trancode_(row, status);
	}
}

function displayChange_field_tinggi_(row, status) {
}

function displayChange_field_berat_(row, status) {
}

function displayChange_field_detakjantung_(row, status) {
}

function displayChange_field_tekanandarah_(row, status) {
}

function displayChange_field_suhu_(row, status) {
}

function displayChange_field_nafas_(row, status) {
}

function displayChange_field_keluhan_(row, status) {
}

function displayChange_field_pemeriksa_(row, status) {
}

function displayChange_field_tglperiksa_(row, status) {
}

function displayChange_field_trancode_(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbfisikrawatinap_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(29);
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

