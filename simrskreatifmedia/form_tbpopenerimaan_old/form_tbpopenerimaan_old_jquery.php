
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
  scEventControl_data["id_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["item_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jumlah_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["isi_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["totalisi_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jmlterima_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["totalterima_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kemasan_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["harga_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["disc_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["subtotal_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["principal_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hargaterima_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["batchno_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["expdate_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["item_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["item_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jumlah_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jumlah_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["isi_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["isi_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["totalisi_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["totalisi_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jmlterima_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jmlterima_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["totalterima_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["totalterima_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kemasan_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kemasan_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["harga_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["harga_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["disc_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["disc_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["subtotal_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["subtotal_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["principal_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["principal_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hargaterima_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hargaterima_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["batchno_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["batchno_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["expdate_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["expdate_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["item_" + iSeqRow]["autocomp"]) {
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
  if ("kemasan_" + iSeq == fieldName) {
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
  $('#id_sc_field_id_' + iSeqRow).bind('blur', function() { sc_form_tbpopenerimaan_old_id__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_tbpopenerimaan_old_id__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tbpopenerimaan_old_id__onfocus(this, iSeqRow) });
  $('#id_sc_field_item_' + iSeqRow).bind('blur', function() { sc_form_tbpopenerimaan_old_item__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_tbpopenerimaan_old_item__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbpopenerimaan_old_item__onfocus(this, iSeqRow) });
  $('#id_sc_field_jumlah_' + iSeqRow).bind('blur', function() { sc_form_tbpopenerimaan_old_jumlah__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_tbpopenerimaan_old_jumlah__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbpopenerimaan_old_jumlah__onfocus(this, iSeqRow) });
  $('#id_sc_field_kemasan_' + iSeqRow).bind('blur', function() { sc_form_tbpopenerimaan_old_kemasan__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_tbpopenerimaan_old_kemasan__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbpopenerimaan_old_kemasan__onfocus(this, iSeqRow) });
  $('#id_sc_field_isi_' + iSeqRow).bind('blur', function() { sc_form_tbpopenerimaan_old_isi__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_tbpopenerimaan_old_isi__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tbpopenerimaan_old_isi__onfocus(this, iSeqRow) });
  $('#id_sc_field_harga_' + iSeqRow).bind('blur', function() { sc_form_tbpopenerimaan_old_harga__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_tbpopenerimaan_old_harga__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbpopenerimaan_old_harga__onfocus(this, iSeqRow) });
  $('#id_sc_field_principal_' + iSeqRow).bind('blur', function() { sc_form_tbpopenerimaan_old_principal__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_tbpopenerimaan_old_principal__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbpopenerimaan_old_principal__onfocus(this, iSeqRow) });
  $('#id_sc_field_disc_' + iSeqRow).bind('blur', function() { sc_form_tbpopenerimaan_old_disc__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_tbpopenerimaan_old_disc__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbpopenerimaan_old_disc__onfocus(this, iSeqRow) });
  $('#id_sc_field_jmlterima_' + iSeqRow).bind('blur', function() { sc_form_tbpopenerimaan_old_jmlterima__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_tbpopenerimaan_old_jmlterima__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbpopenerimaan_old_jmlterima__onfocus(this, iSeqRow) });
  $('#id_sc_field_hargaterima_' + iSeqRow).bind('blur', function() { sc_form_tbpopenerimaan_old_hargaterima__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_tbpopenerimaan_old_hargaterima__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tbpopenerimaan_old_hargaterima__onfocus(this, iSeqRow) });
  $('#id_sc_field_batchno_' + iSeqRow).bind('blur', function() { sc_form_tbpopenerimaan_old_batchno__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_tbpopenerimaan_old_batchno__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbpopenerimaan_old_batchno__onfocus(this, iSeqRow) });
  $('#id_sc_field_expdate_' + iSeqRow).bind('blur', function() { sc_form_tbpopenerimaan_old_expdate__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_tbpopenerimaan_old_expdate__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbpopenerimaan_old_expdate__onfocus(this, iSeqRow) });
  $('#id_sc_field_subtotal_' + iSeqRow).bind('blur', function() { sc_form_tbpopenerimaan_old_subtotal__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_tbpopenerimaan_old_subtotal__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbpopenerimaan_old_subtotal__onfocus(this, iSeqRow) });
  $('#id_sc_field_totalisi_' + iSeqRow).bind('blur', function() { sc_form_tbpopenerimaan_old_totalisi__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_tbpopenerimaan_old_totalisi__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbpopenerimaan_old_totalisi__onfocus(this, iSeqRow) });
  $('#id_sc_field_totalterima_' + iSeqRow).bind('blur', function() { sc_form_tbpopenerimaan_old_totalterima__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_tbpopenerimaan_old_totalterima__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tbpopenerimaan_old_totalterima__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbpopenerimaan_old_id__onblur(oThis, iSeqRow) {
  do_ajax_form_tbpopenerimaan_old_validate_id_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpopenerimaan_old_id__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbpopenerimaan_old_id__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbpopenerimaan_old_item__onblur(oThis, iSeqRow) {
  do_ajax_form_tbpopenerimaan_old_validate_item_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpopenerimaan_old_item__onchange(oThis, iSeqRow) {
  do_ajax_form_tbpopenerimaan_old_refresh_item_(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_tbpopenerimaan_old_item__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbpopenerimaan_old_jumlah__onblur(oThis, iSeqRow) {
  do_ajax_form_tbpopenerimaan_old_validate_jumlah_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpopenerimaan_old_jumlah__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbpopenerimaan_old_jumlah__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbpopenerimaan_old_kemasan__onblur(oThis, iSeqRow) {
  do_ajax_form_tbpopenerimaan_old_validate_kemasan_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpopenerimaan_old_kemasan__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbpopenerimaan_old_kemasan__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbpopenerimaan_old_isi__onblur(oThis, iSeqRow) {
  do_ajax_form_tbpopenerimaan_old_validate_isi_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpopenerimaan_old_isi__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbpopenerimaan_old_isi__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbpopenerimaan_old_harga__onblur(oThis, iSeqRow) {
  do_ajax_form_tbpopenerimaan_old_validate_harga_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpopenerimaan_old_harga__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbpopenerimaan_old_harga__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbpopenerimaan_old_principal__onblur(oThis, iSeqRow) {
  do_ajax_form_tbpopenerimaan_old_validate_principal_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpopenerimaan_old_principal__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbpopenerimaan_old_principal__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbpopenerimaan_old_disc__onblur(oThis, iSeqRow) {
  do_ajax_form_tbpopenerimaan_old_validate_disc_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpopenerimaan_old_disc__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbpopenerimaan_old_disc__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbpopenerimaan_old_jmlterima__onblur(oThis, iSeqRow) {
  do_ajax_form_tbpopenerimaan_old_validate_jmlterima_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpopenerimaan_old_jmlterima__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbpopenerimaan_old_jmlterima__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbpopenerimaan_old_hargaterima__onblur(oThis, iSeqRow) {
  do_ajax_form_tbpopenerimaan_old_validate_hargaterima_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpopenerimaan_old_hargaterima__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbpopenerimaan_old_hargaterima__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbpopenerimaan_old_batchno__onblur(oThis, iSeqRow) {
  do_ajax_form_tbpopenerimaan_old_validate_batchno_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpopenerimaan_old_batchno__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbpopenerimaan_old_batchno__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbpopenerimaan_old_expdate__onblur(oThis, iSeqRow) {
  do_ajax_form_tbpopenerimaan_old_validate_expdate_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpopenerimaan_old_expdate__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbpopenerimaan_old_expdate__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbpopenerimaan_old_subtotal__onblur(oThis, iSeqRow) {
  do_ajax_form_tbpopenerimaan_old_validate_subtotal_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpopenerimaan_old_subtotal__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbpopenerimaan_old_subtotal__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbpopenerimaan_old_totalisi__onblur(oThis, iSeqRow) {
  do_ajax_form_tbpopenerimaan_old_validate_totalisi_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpopenerimaan_old_totalisi__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbpopenerimaan_old_totalisi__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbpopenerimaan_old_totalterima__onblur(oThis, iSeqRow) {
  do_ajax_form_tbpopenerimaan_old_validate_totalterima_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpopenerimaan_old_totalterima__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbpopenerimaan_old_totalterima__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("id_", "", status);
	displayChange_field("item_", "", status);
	displayChange_field("jumlah_", "", status);
	displayChange_field("isi_", "", status);
	displayChange_field("totalisi_", "", status);
	displayChange_field("jmlterima_", "", status);
	displayChange_field("totalterima_", "", status);
	displayChange_field("kemasan_", "", status);
	displayChange_field("harga_", "", status);
	displayChange_field("disc_", "", status);
	displayChange_field("subtotal_", "", status);
	displayChange_field("principal_", "", status);
	displayChange_field("hargaterima_", "", status);
	displayChange_field("batchno_", "", status);
	displayChange_field("expdate_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_id_(row, status);
	displayChange_field_item_(row, status);
	displayChange_field_jumlah_(row, status);
	displayChange_field_isi_(row, status);
	displayChange_field_totalisi_(row, status);
	displayChange_field_jmlterima_(row, status);
	displayChange_field_totalterima_(row, status);
	displayChange_field_kemasan_(row, status);
	displayChange_field_harga_(row, status);
	displayChange_field_disc_(row, status);
	displayChange_field_subtotal_(row, status);
	displayChange_field_principal_(row, status);
	displayChange_field_hargaterima_(row, status);
	displayChange_field_batchno_(row, status);
	displayChange_field_expdate_(row, status);
}

function displayChange_field(field, row, status) {
	if ("id_" == field) {
		displayChange_field_id_(row, status);
	}
	if ("item_" == field) {
		displayChange_field_item_(row, status);
	}
	if ("jumlah_" == field) {
		displayChange_field_jumlah_(row, status);
	}
	if ("isi_" == field) {
		displayChange_field_isi_(row, status);
	}
	if ("totalisi_" == field) {
		displayChange_field_totalisi_(row, status);
	}
	if ("jmlterima_" == field) {
		displayChange_field_jmlterima_(row, status);
	}
	if ("totalterima_" == field) {
		displayChange_field_totalterima_(row, status);
	}
	if ("kemasan_" == field) {
		displayChange_field_kemasan_(row, status);
	}
	if ("harga_" == field) {
		displayChange_field_harga_(row, status);
	}
	if ("disc_" == field) {
		displayChange_field_disc_(row, status);
	}
	if ("subtotal_" == field) {
		displayChange_field_subtotal_(row, status);
	}
	if ("principal_" == field) {
		displayChange_field_principal_(row, status);
	}
	if ("hargaterima_" == field) {
		displayChange_field_hargaterima_(row, status);
	}
	if ("batchno_" == field) {
		displayChange_field_batchno_(row, status);
	}
	if ("expdate_" == field) {
		displayChange_field_expdate_(row, status);
	}
}

function displayChange_field_id_(row, status) {
}

function displayChange_field_item_(row, status) {
}

function displayChange_field_jumlah_(row, status) {
}

function displayChange_field_isi_(row, status) {
}

function displayChange_field_totalisi_(row, status) {
}

function displayChange_field_jmlterima_(row, status) {
}

function displayChange_field_totalterima_(row, status) {
}

function displayChange_field_kemasan_(row, status) {
}

function displayChange_field_harga_(row, status) {
}

function displayChange_field_disc_(row, status) {
}

function displayChange_field_subtotal_(row, status) {
}

function displayChange_field_principal_(row, status) {
}

function displayChange_field_hargaterima_(row, status) {
}

function displayChange_field_batchno_(row, status) {
}

function displayChange_field_expdate_(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbpopenerimaan_old_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(31);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_expdate_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_expdate_" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_tbpopenerimaan_old_validate_expdate_(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['expdate_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
} // scJQCalendarAdd

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

function scJQSelect2Add(seqRow, specificField) {
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
} // scJQElementsAdd

