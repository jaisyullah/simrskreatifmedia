
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
  scEventControl_data["suppcode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jenis" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nama" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["alamat" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telp_cp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["no_rek" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["aktif" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["suppcode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["suppcode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jenis" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jenis" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nama" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nama" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["alamat" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["alamat" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telp_cp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telp_cp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["no_rek" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["no_rek" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["aktif" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["aktif" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("jenis" + iSeq == fieldName) {
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
  $('#id_sc_field_suppcode' + iSeqRow).bind('blur', function() { sc_form_supplier_gizi_suppcode_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_supplier_gizi_suppcode_onfocus(this, iSeqRow) });
  $('#id_sc_field_jenis' + iSeqRow).bind('blur', function() { sc_form_supplier_gizi_jenis_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_supplier_gizi_jenis_onfocus(this, iSeqRow) });
  $('#id_sc_field_nama' + iSeqRow).bind('blur', function() { sc_form_supplier_gizi_nama_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_supplier_gizi_nama_onfocus(this, iSeqRow) });
  $('#id_sc_field_alamat' + iSeqRow).bind('blur', function() { sc_form_supplier_gizi_alamat_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_supplier_gizi_alamat_onfocus(this, iSeqRow) });
  $('#id_sc_field_telp' + iSeqRow).bind('blur', function() { sc_form_supplier_gizi_telp_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_supplier_gizi_telp_onfocus(this, iSeqRow) });
  $('#id_sc_field_cp' + iSeqRow).bind('blur', function() { sc_form_supplier_gizi_cp_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_supplier_gizi_cp_onfocus(this, iSeqRow) });
  $('#id_sc_field_telp_cp' + iSeqRow).bind('blur', function() { sc_form_supplier_gizi_telp_cp_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_supplier_gizi_telp_cp_onfocus(this, iSeqRow) });
  $('#id_sc_field_no_rek' + iSeqRow).bind('blur', function() { sc_form_supplier_gizi_no_rek_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_supplier_gizi_no_rek_onfocus(this, iSeqRow) });
  $('#id_sc_field_aktif' + iSeqRow).bind('blur', function() { sc_form_supplier_gizi_aktif_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_supplier_gizi_aktif_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_supplier_gizi_suppcode_onblur(oThis, iSeqRow) {
  do_ajax_form_supplier_gizi_validate_suppcode();
  scCssBlur(oThis);
}

function sc_form_supplier_gizi_suppcode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_supplier_gizi_jenis_onblur(oThis, iSeqRow) {
  do_ajax_form_supplier_gizi_validate_jenis();
  scCssBlur(oThis);
}

function sc_form_supplier_gizi_jenis_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_supplier_gizi_nama_onblur(oThis, iSeqRow) {
  do_ajax_form_supplier_gizi_validate_nama();
  scCssBlur(oThis);
}

function sc_form_supplier_gizi_nama_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_supplier_gizi_alamat_onblur(oThis, iSeqRow) {
  do_ajax_form_supplier_gizi_validate_alamat();
  scCssBlur(oThis);
}

function sc_form_supplier_gizi_alamat_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_supplier_gizi_telp_onblur(oThis, iSeqRow) {
  do_ajax_form_supplier_gizi_validate_telp();
  scCssBlur(oThis);
}

function sc_form_supplier_gizi_telp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_supplier_gizi_cp_onblur(oThis, iSeqRow) {
  do_ajax_form_supplier_gizi_validate_cp();
  scCssBlur(oThis);
}

function sc_form_supplier_gizi_cp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_supplier_gizi_telp_cp_onblur(oThis, iSeqRow) {
  do_ajax_form_supplier_gizi_validate_telp_cp();
  scCssBlur(oThis);
}

function sc_form_supplier_gizi_telp_cp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_supplier_gizi_no_rek_onblur(oThis, iSeqRow) {
  do_ajax_form_supplier_gizi_validate_no_rek();
  scCssBlur(oThis);
}

function sc_form_supplier_gizi_no_rek_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_supplier_gizi_aktif_onblur(oThis, iSeqRow) {
  do_ajax_form_supplier_gizi_validate_aktif();
  scCssBlur(oThis);
}

function sc_form_supplier_gizi_aktif_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("suppcode", "", status);
	displayChange_field("jenis", "", status);
	displayChange_field("nama", "", status);
	displayChange_field("alamat", "", status);
	displayChange_field("telp", "", status);
	displayChange_field("cp", "", status);
	displayChange_field("telp_cp", "", status);
	displayChange_field("no_rek", "", status);
	displayChange_field("aktif", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_suppcode(row, status);
	displayChange_field_jenis(row, status);
	displayChange_field_nama(row, status);
	displayChange_field_alamat(row, status);
	displayChange_field_telp(row, status);
	displayChange_field_cp(row, status);
	displayChange_field_telp_cp(row, status);
	displayChange_field_no_rek(row, status);
	displayChange_field_aktif(row, status);
}

function displayChange_field(field, row, status) {
	if ("suppcode" == field) {
		displayChange_field_suppcode(row, status);
	}
	if ("jenis" == field) {
		displayChange_field_jenis(row, status);
	}
	if ("nama" == field) {
		displayChange_field_nama(row, status);
	}
	if ("alamat" == field) {
		displayChange_field_alamat(row, status);
	}
	if ("telp" == field) {
		displayChange_field_telp(row, status);
	}
	if ("cp" == field) {
		displayChange_field_cp(row, status);
	}
	if ("telp_cp" == field) {
		displayChange_field_telp_cp(row, status);
	}
	if ("no_rek" == field) {
		displayChange_field_no_rek(row, status);
	}
	if ("aktif" == field) {
		displayChange_field_aktif(row, status);
	}
}

function displayChange_field_suppcode(row, status) {
}

function displayChange_field_jenis(row, status) {
}

function displayChange_field_nama(row, status) {
}

function displayChange_field_alamat(row, status) {
}

function displayChange_field_telp(row, status) {
}

function displayChange_field_cp(row, status) {
}

function displayChange_field_telp_cp(row, status) {
}

function displayChange_field_no_rek(row, status) {
}

function displayChange_field_aktif(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_supplier_gizi_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(26);
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

