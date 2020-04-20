
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
  scEventControl_data["namapemeriksaan_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["standardari_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["standarsampai_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nilai_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dokter_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["keterangan_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tglperiksa_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["namapemeriksaan_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["namapemeriksaan_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["standardari_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["standardari_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["standarsampai_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["standarsampai_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nilai_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nilai_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dokter_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dokter_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["keterangan_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["keterangan_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tglperiksa_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tglperiksa_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_" + iSeqRow]["change"]) {
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
  if ("dokter_" + iSeq == fieldName) {
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
  $('#id_sc_field_id_' + iSeqRow).bind('blur', function() { sc_form_tbpemeriksaanigd_id__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_tbpemeriksaanigd_id__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tbpemeriksaanigd_id__onfocus(this, iSeqRow) });
  $('#id_sc_field_namapemeriksaan_' + iSeqRow).bind('blur', function() { sc_form_tbpemeriksaanigd_namapemeriksaan__onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_tbpemeriksaanigd_namapemeriksaan__onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_tbpemeriksaanigd_namapemeriksaan__onfocus(this, iSeqRow) });
  $('#id_sc_field_standardari_' + iSeqRow).bind('blur', function() { sc_form_tbpemeriksaanigd_standardari__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_tbpemeriksaanigd_standardari__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tbpemeriksaanigd_standardari__onfocus(this, iSeqRow) });
  $('#id_sc_field_standarsampai_' + iSeqRow).bind('blur', function() { sc_form_tbpemeriksaanigd_standarsampai__onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_tbpemeriksaanigd_standarsampai__onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_tbpemeriksaanigd_standarsampai__onfocus(this, iSeqRow) });
  $('#id_sc_field_nilai_' + iSeqRow).bind('blur', function() { sc_form_tbpemeriksaanigd_nilai__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_tbpemeriksaanigd_nilai__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbpemeriksaanigd_nilai__onfocus(this, iSeqRow) });
  $('#id_sc_field_dokter_' + iSeqRow).bind('blur', function() { sc_form_tbpemeriksaanigd_dokter__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_tbpemeriksaanigd_dokter__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbpemeriksaanigd_dokter__onfocus(this, iSeqRow) });
  $('#id_sc_field_keterangan_' + iSeqRow).bind('blur', function() { sc_form_tbpemeriksaanigd_keterangan__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_tbpemeriksaanigd_keterangan__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbpemeriksaanigd_keterangan__onfocus(this, iSeqRow) });
  $('#id_sc_field_tglperiksa_' + iSeqRow).bind('blur', function() { sc_form_tbpemeriksaanigd_tglperiksa__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_tbpemeriksaanigd_tglperiksa__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbpemeriksaanigd_tglperiksa__onfocus(this, iSeqRow) });
  $('#id_sc_field_tglperiksa__hora' + iSeqRow).bind('blur', function() { sc_form_tbpemeriksaanigd_tglperiksa__hora_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_tbpemeriksaanigd_tglperiksa__hora_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_tbpemeriksaanigd_tglperiksa__hora_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbpemeriksaanigd_id__onblur(oThis, iSeqRow) {
  do_ajax_form_tbpemeriksaanigd_validate_id_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpemeriksaanigd_id__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbpemeriksaanigd_id__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbpemeriksaanigd_namapemeriksaan__onblur(oThis, iSeqRow) {
  do_ajax_form_tbpemeriksaanigd_validate_namapemeriksaan_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpemeriksaanigd_namapemeriksaan__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbpemeriksaanigd_namapemeriksaan__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbpemeriksaanigd_standardari__onblur(oThis, iSeqRow) {
  do_ajax_form_tbpemeriksaanigd_validate_standardari_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpemeriksaanigd_standardari__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbpemeriksaanigd_standardari__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbpemeriksaanigd_standarsampai__onblur(oThis, iSeqRow) {
  do_ajax_form_tbpemeriksaanigd_validate_standarsampai_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpemeriksaanigd_standarsampai__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbpemeriksaanigd_standarsampai__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbpemeriksaanigd_nilai__onblur(oThis, iSeqRow) {
  do_ajax_form_tbpemeriksaanigd_validate_nilai_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpemeriksaanigd_nilai__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbpemeriksaanigd_nilai__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbpemeriksaanigd_dokter__onblur(oThis, iSeqRow) {
  do_ajax_form_tbpemeriksaanigd_validate_dokter_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpemeriksaanigd_dokter__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbpemeriksaanigd_dokter__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbpemeriksaanigd_keterangan__onblur(oThis, iSeqRow) {
  do_ajax_form_tbpemeriksaanigd_validate_keterangan_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpemeriksaanigd_keterangan__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbpemeriksaanigd_keterangan__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbpemeriksaanigd_tglperiksa__onblur(oThis, iSeqRow) {
  do_ajax_form_tbpemeriksaanigd_validate_tglperiksa_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpemeriksaanigd_tglperiksa__hora_onblur(oThis, iSeqRow) {
  do_ajax_form_tbpemeriksaanigd_validate_tglperiksa_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpemeriksaanigd_tglperiksa__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbpemeriksaanigd_tglperiksa__hora_onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbpemeriksaanigd_tglperiksa__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbpemeriksaanigd_tglperiksa__hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("namapemeriksaan_", "", status);
	displayChange_field("standardari_", "", status);
	displayChange_field("standarsampai_", "", status);
	displayChange_field("nilai_", "", status);
	displayChange_field("dokter_", "", status);
	displayChange_field("keterangan_", "", status);
	displayChange_field("tglperiksa_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_namapemeriksaan_(row, status);
	displayChange_field_standardari_(row, status);
	displayChange_field_standarsampai_(row, status);
	displayChange_field_nilai_(row, status);
	displayChange_field_dokter_(row, status);
	displayChange_field_keterangan_(row, status);
	displayChange_field_tglperiksa_(row, status);
	displayChange_field_id_(row, status);
}

function displayChange_field(field, row, status) {
	if ("namapemeriksaan_" == field) {
		displayChange_field_namapemeriksaan_(row, status);
	}
	if ("standardari_" == field) {
		displayChange_field_standardari_(row, status);
	}
	if ("standarsampai_" == field) {
		displayChange_field_standarsampai_(row, status);
	}
	if ("nilai_" == field) {
		displayChange_field_nilai_(row, status);
	}
	if ("dokter_" == field) {
		displayChange_field_dokter_(row, status);
	}
	if ("keterangan_" == field) {
		displayChange_field_keterangan_(row, status);
	}
	if ("tglperiksa_" == field) {
		displayChange_field_tglperiksa_(row, status);
	}
	if ("id_" == field) {
		displayChange_field_id_(row, status);
	}
}

function displayChange_field_namapemeriksaan_(row, status) {
}

function displayChange_field_standardari_(row, status) {
}

function displayChange_field_standarsampai_(row, status) {
}

function displayChange_field_nilai_(row, status) {
}

function displayChange_field_dokter_(row, status) {
}

function displayChange_field_keterangan_(row, status) {
}

function displayChange_field_tglperiksa_(row, status) {
}

function displayChange_field_id_(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbpemeriksaanigd_form" + pageNo).hide();
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

