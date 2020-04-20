
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
  scEventControl_data["nomor_kartu" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nomor_rm" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nama_pasien" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tgl_lahir" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["gender" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["nomor_kartu" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nomor_kartu" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nomor_rm" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nomor_rm" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nama_pasien" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nama_pasien" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tgl_lahir" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tgl_lahir" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["gender" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["gender" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("gender" + iSeq == fieldName) {
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
  $('#id_sc_field_nomor_kartu' + iSeqRow).bind('blur', function() { sc_form_eclaim_update_data_pasien_nomor_kartu_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_eclaim_update_data_pasien_nomor_kartu_onfocus(this, iSeqRow) });
  $('#id_sc_field_nomor_rm' + iSeqRow).bind('blur', function() { sc_form_eclaim_update_data_pasien_nomor_rm_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_eclaim_update_data_pasien_nomor_rm_onfocus(this, iSeqRow) });
  $('#id_sc_field_nama_pasien' + iSeqRow).bind('blur', function() { sc_form_eclaim_update_data_pasien_nama_pasien_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_eclaim_update_data_pasien_nama_pasien_onfocus(this, iSeqRow) });
  $('#id_sc_field_tgl_lahir' + iSeqRow).bind('blur', function() { sc_form_eclaim_update_data_pasien_tgl_lahir_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_eclaim_update_data_pasien_tgl_lahir_onfocus(this, iSeqRow) });
  $('#id_sc_field_gender' + iSeqRow).bind('blur', function() { sc_form_eclaim_update_data_pasien_gender_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_eclaim_update_data_pasien_gender_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_eclaim_update_data_pasien_nomor_kartu_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_update_data_pasien_mob_validate_nomor_kartu();
  scCssBlur(oThis);
}

function sc_form_eclaim_update_data_pasien_nomor_kartu_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_update_data_pasien_nomor_rm_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_update_data_pasien_mob_validate_nomor_rm();
  scCssBlur(oThis);
}

function sc_form_eclaim_update_data_pasien_nomor_rm_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_update_data_pasien_nama_pasien_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_update_data_pasien_mob_validate_nama_pasien();
  scCssBlur(oThis);
}

function sc_form_eclaim_update_data_pasien_nama_pasien_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_update_data_pasien_tgl_lahir_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_update_data_pasien_mob_validate_tgl_lahir();
  scCssBlur(oThis);
}

function sc_form_eclaim_update_data_pasien_tgl_lahir_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_update_data_pasien_gender_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_update_data_pasien_mob_validate_gender();
  scCssBlur(oThis);
}

function sc_form_eclaim_update_data_pasien_gender_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("nomor_kartu", "", status);
	displayChange_field("nomor_rm", "", status);
	displayChange_field("nama_pasien", "", status);
	displayChange_field("tgl_lahir", "", status);
	displayChange_field("gender", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_nomor_kartu(row, status);
	displayChange_field_nomor_rm(row, status);
	displayChange_field_nama_pasien(row, status);
	displayChange_field_tgl_lahir(row, status);
	displayChange_field_gender(row, status);
}

function displayChange_field(field, row, status) {
	if ("nomor_kartu" == field) {
		displayChange_field_nomor_kartu(row, status);
	}
	if ("nomor_rm" == field) {
		displayChange_field_nomor_rm(row, status);
	}
	if ("nama_pasien" == field) {
		displayChange_field_nama_pasien(row, status);
	}
	if ("tgl_lahir" == field) {
		displayChange_field_tgl_lahir(row, status);
	}
	if ("gender" == field) {
		displayChange_field_gender(row, status);
	}
}

function displayChange_field_nomor_kartu(row, status) {
}

function displayChange_field_nomor_rm(row, status) {
}

function displayChange_field_nama_pasien(row, status) {
}

function displayChange_field_tgl_lahir(row, status) {
}

function displayChange_field_gender(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_eclaim_update_data_pasien_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(42);
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

