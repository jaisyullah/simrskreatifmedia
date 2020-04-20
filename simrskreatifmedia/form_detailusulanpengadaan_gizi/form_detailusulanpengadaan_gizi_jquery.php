
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
  scEventControl_data["bahan_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["satuan_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["stok_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jumlah_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["refharga_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["disetujui_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["subtotal_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["diterima_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hargareal_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["supplier_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["keterangan_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["bahan_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["bahan_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["satuan_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["satuan_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["stok_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["stok_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jumlah_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jumlah_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["refharga_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["refharga_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["disetujui_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["disetujui_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["subtotal_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["subtotal_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["diterima_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["diterima_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hargareal_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hargareal_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["supplier_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["supplier_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["keterangan_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["keterangan_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["bahan_" + iSeqRow]["autocomp"]) {
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
  if ("jumlah_" + iSeq == fieldName) {
    _scCalculatorBlurOk[fieldId] = false;
  }
  if ("disetujui_" + iSeq == fieldName) {
    _scCalculatorBlurOk[fieldId] = false;
  }
  scEventControl_data[fieldName]["blur"] = true;
  if ("satuan_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("supplier_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("bahan_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("disetujui_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("jumlah_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("refharga_" + iSeq == fieldName) {
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

function scEventControl_onCalculator_jumlah_() {
  if (!_scCalculatorControl["id_sc_field_jumlah_"]) {
    _scCalculatorBlurOk["id_sc_field_jumlah_"] = true;
    do_ajax_form_detailusulanpengadaan_gizi_event_jumlah__onblur();
  }
} // scEventControl_onCalculator_jumlah_

function scEventControl_onCalculator_disetujui_() {
  if (!_scCalculatorControl["id_sc_field_disetujui_"]) {
    _scCalculatorBlurOk["id_sc_field_disetujui_"] = true;
    do_ajax_form_detailusulanpengadaan_gizi_event_disetujui__onblur();
  }
} // scEventControl_onCalculator_disetujui_

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_id_' + iSeqRow).bind('blur', function() { sc_form_detailusulanpengadaan_gizi_id__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_detailusulanpengadaan_gizi_id__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_detailusulanpengadaan_gizi_id__onfocus(this, iSeqRow) });
  $('#id_sc_field_bahan_' + iSeqRow).bind('blur', function() { sc_form_detailusulanpengadaan_gizi_bahan__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_detailusulanpengadaan_gizi_bahan__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_detailusulanpengadaan_gizi_bahan__onfocus(this, iSeqRow) });
  $('#id_sc_field_satuan_' + iSeqRow).bind('blur', function() { sc_form_detailusulanpengadaan_gizi_satuan__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_detailusulanpengadaan_gizi_satuan__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_detailusulanpengadaan_gizi_satuan__onfocus(this, iSeqRow) });
  $('#id_sc_field_keterangan_' + iSeqRow).bind('blur', function() { sc_form_detailusulanpengadaan_gizi_keterangan__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_detailusulanpengadaan_gizi_keterangan__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_detailusulanpengadaan_gizi_keterangan__onfocus(this, iSeqRow) });
  $('#id_sc_field_refharga_' + iSeqRow).bind('blur', function() { sc_form_detailusulanpengadaan_gizi_refharga__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_detailusulanpengadaan_gizi_refharga__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_detailusulanpengadaan_gizi_refharga__onfocus(this, iSeqRow) });
  $('#id_sc_field_supplier_' + iSeqRow).bind('blur', function() { sc_form_detailusulanpengadaan_gizi_supplier__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_detailusulanpengadaan_gizi_supplier__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_detailusulanpengadaan_gizi_supplier__onfocus(this, iSeqRow) });
  $('#id_sc_field_jumlah_' + iSeqRow).bind('blur', function() { sc_form_detailusulanpengadaan_gizi_jumlah__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_detailusulanpengadaan_gizi_jumlah__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_detailusulanpengadaan_gizi_jumlah__onfocus(this, iSeqRow) });
  $('#id_sc_field_disetujui_' + iSeqRow).bind('blur', function() { sc_form_detailusulanpengadaan_gizi_disetujui__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_detailusulanpengadaan_gizi_disetujui__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_detailusulanpengadaan_gizi_disetujui__onfocus(this, iSeqRow) });
  $('#id_sc_field_diterima_' + iSeqRow).bind('blur', function() { sc_form_detailusulanpengadaan_gizi_diterima__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_detailusulanpengadaan_gizi_diterima__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_detailusulanpengadaan_gizi_diterima__onfocus(this, iSeqRow) });
  $('#id_sc_field_hargareal_' + iSeqRow).bind('blur', function() { sc_form_detailusulanpengadaan_gizi_hargareal__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_detailusulanpengadaan_gizi_hargareal__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_detailusulanpengadaan_gizi_hargareal__onfocus(this, iSeqRow) });
  $('#id_sc_field_stok_' + iSeqRow).bind('blur', function() { sc_form_detailusulanpengadaan_gizi_stok__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_detailusulanpengadaan_gizi_stok__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_detailusulanpengadaan_gizi_stok__onfocus(this, iSeqRow) });
  $('#id_sc_field_subtotal_' + iSeqRow).bind('blur', function() { sc_form_detailusulanpengadaan_gizi_subtotal__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_detailusulanpengadaan_gizi_subtotal__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_detailusulanpengadaan_gizi_subtotal__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_detailusulanpengadaan_gizi_id__onblur(oThis, iSeqRow) {
  do_ajax_form_detailusulanpengadaan_gizi_validate_id_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_id__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_id__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_bahan__onblur(oThis, iSeqRow) {
  do_ajax_form_detailusulanpengadaan_gizi_validate_bahan_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_bahan__onchange(oThis, iSeqRow) {
  do_ajax_form_detailusulanpengadaan_gizi_event_bahan__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_bahan__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_satuan__onblur(oThis, iSeqRow) {
  do_ajax_form_detailusulanpengadaan_gizi_validate_satuan_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_satuan__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_satuan__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_keterangan__onblur(oThis, iSeqRow) {
  do_ajax_form_detailusulanpengadaan_gizi_validate_keterangan_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_keterangan__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_keterangan__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_refharga__onblur(oThis, iSeqRow) {
  do_ajax_form_detailusulanpengadaan_gizi_validate_refharga_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_refharga__onchange(oThis, iSeqRow) {
  do_ajax_form_detailusulanpengadaan_gizi_event_refharga__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_refharga__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_supplier__onblur(oThis, iSeqRow) {
  do_ajax_form_detailusulanpengadaan_gizi_validate_supplier_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_supplier__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_supplier__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_jumlah__onblur(oThis, iSeqRow) {
  do_ajax_form_detailusulanpengadaan_gizi_validate_jumlah_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_jumlah__onchange(oThis, iSeqRow) {
  do_ajax_form_detailusulanpengadaan_gizi_event_jumlah__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_jumlah__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_disetujui__onblur(oThis, iSeqRow) {
  do_ajax_form_detailusulanpengadaan_gizi_validate_disetujui_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_disetujui__onchange(oThis, iSeqRow) {
  do_ajax_form_detailusulanpengadaan_gizi_event_disetujui__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_disetujui__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_diterima__onblur(oThis, iSeqRow) {
  do_ajax_form_detailusulanpengadaan_gizi_validate_diterima_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_diterima__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_diterima__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_hargareal__onblur(oThis, iSeqRow) {
  do_ajax_form_detailusulanpengadaan_gizi_validate_hargareal_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_hargareal__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_hargareal__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_stok__onblur(oThis, iSeqRow) {
  do_ajax_form_detailusulanpengadaan_gizi_validate_stok_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_stok__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_stok__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_subtotal__onblur(oThis, iSeqRow) {
  do_ajax_form_detailusulanpengadaan_gizi_validate_subtotal_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_subtotal__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_detailusulanpengadaan_gizi_subtotal__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("bahan_", "", status);
	displayChange_field("satuan_", "", status);
	displayChange_field("stok_", "", status);
	displayChange_field("jumlah_", "", status);
	displayChange_field("refharga_", "", status);
	displayChange_field("disetujui_", "", status);
	displayChange_field("subtotal_", "", status);
	displayChange_field("diterima_", "", status);
	displayChange_field("hargareal_", "", status);
	displayChange_field("supplier_", "", status);
	displayChange_field("keterangan_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_bahan_(row, status);
	displayChange_field_satuan_(row, status);
	displayChange_field_stok_(row, status);
	displayChange_field_jumlah_(row, status);
	displayChange_field_refharga_(row, status);
	displayChange_field_disetujui_(row, status);
	displayChange_field_subtotal_(row, status);
	displayChange_field_diterima_(row, status);
	displayChange_field_hargareal_(row, status);
	displayChange_field_supplier_(row, status);
	displayChange_field_keterangan_(row, status);
	displayChange_field_id_(row, status);
}

function displayChange_field(field, row, status) {
	if ("bahan_" == field) {
		displayChange_field_bahan_(row, status);
	}
	if ("satuan_" == field) {
		displayChange_field_satuan_(row, status);
	}
	if ("stok_" == field) {
		displayChange_field_stok_(row, status);
	}
	if ("jumlah_" == field) {
		displayChange_field_jumlah_(row, status);
	}
	if ("refharga_" == field) {
		displayChange_field_refharga_(row, status);
	}
	if ("disetujui_" == field) {
		displayChange_field_disetujui_(row, status);
	}
	if ("subtotal_" == field) {
		displayChange_field_subtotal_(row, status);
	}
	if ("diterima_" == field) {
		displayChange_field_diterima_(row, status);
	}
	if ("hargareal_" == field) {
		displayChange_field_hargareal_(row, status);
	}
	if ("supplier_" == field) {
		displayChange_field_supplier_(row, status);
	}
	if ("keterangan_" == field) {
		displayChange_field_keterangan_(row, status);
	}
	if ("id_" == field) {
		displayChange_field_id_(row, status);
	}
}

function displayChange_field_bahan_(row, status) {
}

function displayChange_field_satuan_(row, status) {
}

function displayChange_field_stok_(row, status) {
}

function displayChange_field_jumlah_(row, status) {
}

function displayChange_field_refharga_(row, status) {
}

function displayChange_field_disetujui_(row, status) {
}

function displayChange_field_subtotal_(row, status) {
}

function displayChange_field_diterima_(row, status) {
}

function displayChange_field_hargareal_(row, status) {
}

function displayChange_field_supplier_(row, status) {
}

function displayChange_field_keterangan_(row, status) {
}

function displayChange_field_id_(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_detailusulanpengadaan_gizi_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(39);
		}
	}
}
var jqCalcMonetPos = {};
var _scCalculatorBlurOk = {};

function scJQCalculatorAdd(iSeqRow) {
  _scCalculatorBlurOk["id_sc_field_subtotal_" + iSeqRow] = true;
  $("#id_sc_field_jumlah_" + iSeqRow).calculator({
    onOpen: function(value, inst) {
      if (typeof _scCalculatorControl !== "undefined") {
        if (!_scCalculatorControl["id_sc_field_jumlah_" + iSeqRow]) {
          _scCalculatorControl["id_sc_field_jumlah_" + iSeqRow] = true;
        }
      }
      value = scJQCalculatorUnformat(value, "#id_sc_field_jumlah_" + iSeqRow, '<?php echo str_replace("'", "\'", $this->field_config['jumlah_']['symbol_grp']); ?>', <?php echo $this->field_config['jumlah_']['symbol_fmt']; ?>, '<?php echo str_replace("'", "\'", $this->field_config['jumlah_']['symbol_dec']); ?>', '');
      $(this).val(value);
    },
    onClose: function(value, inst) {
      var oldValue = $(this.val);
      if (typeof _scCalculatorControl !== "undefined") {
        if (_scCalculatorControl["id_sc_field_jumlah_" + iSeqRow]) {
          _scCalculatorControl["id_sc_field_jumlah_" + iSeqRow] = null;
        }
      }
      value = scJQCalculatorFormat(value, "#id_sc_field_jumlah_" + iSeqRow, '<?php echo str_replace("'", "\'", $this->field_config['jumlah_']['symbol_grp']); ?>', <?php echo $this->field_config['jumlah_']['symbol_fmt']; ?>, '<?php echo str_replace("'", "\'", $this->field_config['jumlah_']['symbol_dec']); ?>', 2, '');
      $(this).val(value);
      if (oldValue != value) {
        $(this).trigger('change');
      }
    },
    precision: 2,
    showOn: "button",
<?php
$miniCalculatorIcon = $this->jqueryIconFile('calculator');
$miniCalculatorFA   = $this->jqueryFAFile('calculator');
if ('' != $miniCalculatorIcon) {
?>
    buttonImage: "<?php echo $miniCalculatorIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalculatorFA) {
?>
    buttonText: "<?php echo $miniCalculatorFA; ?>",
<?php
}
?>
  });

  $("#id_sc_field_disetujui_" + iSeqRow).calculator({
    onOpen: function(value, inst) {
      if (typeof _scCalculatorControl !== "undefined") {
        if (!_scCalculatorControl["id_sc_field_disetujui_" + iSeqRow]) {
          _scCalculatorControl["id_sc_field_disetujui_" + iSeqRow] = true;
        }
      }
      value = scJQCalculatorUnformat(value, "#id_sc_field_disetujui_" + iSeqRow, '<?php echo str_replace("'", "\'", $this->field_config['disetujui_']['symbol_grp']); ?>', <?php echo $this->field_config['disetujui_']['symbol_fmt']; ?>, '<?php echo str_replace("'", "\'", $this->field_config['disetujui_']['symbol_dec']); ?>', '');
      $(this).val(value);
    },
    onClose: function(value, inst) {
      var oldValue = $(this.val);
      if (typeof _scCalculatorControl !== "undefined") {
        if (_scCalculatorControl["id_sc_field_disetujui_" + iSeqRow]) {
          _scCalculatorControl["id_sc_field_disetujui_" + iSeqRow] = null;
        }
      }
      value = scJQCalculatorFormat(value, "#id_sc_field_disetujui_" + iSeqRow, '<?php echo str_replace("'", "\'", $this->field_config['disetujui_']['symbol_grp']); ?>', <?php echo $this->field_config['disetujui_']['symbol_fmt']; ?>, '<?php echo str_replace("'", "\'", $this->field_config['disetujui_']['symbol_dec']); ?>', 2, '');
      $(this).val(value);
      if (oldValue != value) {
        $(this).trigger('change');
      }
    },
    precision: 2,
    showOn: "button",
<?php
$miniCalculatorIcon = $this->jqueryIconFile('calculator');
$miniCalculatorFA   = $this->jqueryFAFile('calculator');
if ('' != $miniCalculatorIcon) {
?>
    buttonImage: "<?php echo $miniCalculatorIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalculatorFA) {
?>
    buttonText: "<?php echo $miniCalculatorFA; ?>",
<?php
}
?>
  });

} // scJQCalculatorAdd

function scJQCalculatorUnformat(fValue, sField, sThousands, sFormat, sDecimals, sMonetary) {
  fValue = scJQCalculatorCurrency(fValue, sField, sMonetary);
  if ("" != sThousands) {
    if ("." == sThousands) {
      sThousands = "\\.";
    }
    sRegEx = eval("/" + sThousands + "/g");
    fValue = fValue.replace(sRegEx, "");
  }
  if ("." != sDecimals) {
    sRegEx = eval("/" + sDecimals + "/g");
    fValue = fValue.replace(sRegEx, ".");
  }
  if ("." == fValue.substr(0, 1) || "," == fValue.substr(0, 1)) {
    fValue = "0" + fValue;
  }
  return fValue;
} // scJQCalculatorUnformat

function scJQCalculatorFormat(fValue, sField, sThousands, sFormat, sDecimals, iPrecision, sMonetary) {
  fValue = scJQCalculatorCurrency(fValue.toString(), sField, sMonetary);
  if (-1 < fValue.indexOf('.')) {
    var parts = fValue.split('.'),
        pref = parts[0],
        suf = parts[1];
  }
  else {
    var pref = fValue,
        suf = '';
  }
  if ('' != sThousands) {
    if (3 == sFormat) {
      if (4 <= pref.length) {
        pref_rest = pref.substr(0, pref.length - 3);
        pref = sThousands + pref.substr(pref.length - 3);
        while (2 < pref_rest.length) {
          pref = sThousands + pref_rest.substr(pref_rest.length - 2) + pref;
          pref_rest = pref_rest.substr(0, pref_rest.length - 2);
        }
        if ('' != pref_rest) {
          pref = pref_rest + pref;
        }
      }
    }
    else if (2 == sFormat) {
      if (4 <= pref.length) {
        pref = pref.substr(0, pref.length - 3) + sThousands + pref.substr(pref.length - 3);
      }
    }
    else {
      pref_rest = pref;
      pref = '';
      while (3 < pref_rest.length) {
        pref = sThousands + pref_rest.substr(pref_rest.length - 3) + pref;
        pref_rest = pref_rest.substr(0, pref_rest.length - 3);
      }
      if ('' != pref_rest) {
        pref = pref_rest + pref;
      }
    }
  }
  if ('' != iPrecision) {
    if (suf.length > iPrecision) {
      suf = '1' + suf.substr(0, iPrecision) + '.' + suf.substr(iPrecision);
      suf = Math.round(parseFloat(suf)).toString().substr(1);
    }
    else {
      while (suf.length < iPrecision) {
        suf += '0';
      }
    }
  }
  if ('' != sDecimals && '' != suf) {
    fValue = pref + sDecimals + suf;
  }
  else {
    fValue = pref;
  }
  if ('' != sMonetary) {
    fValue = 'left' == jqCalcMonetPos[sField] ? sMonetary + ' ' + fValue : fValue + ' ' + sMonetary;
  }
  return fValue;
} // scJQCalculatorFormat

function scJQCalculatorCurrency(fValue, sField, sMonetary) {
  if ("" != sMonetary) {
    if (sMonetary + ' ' == fValue.substr(0, sMonetary.length + 1)) {
        fValue = fValue.substr(sMonetary.length + 1);
        jqCalcMonetPos[sField] = 'left';
    }
    else if (sMonetary == fValue.substr(0, sMonetary.length)) {
        fValue = fValue.substr(sMonetary.length + 1);
        jqCalcMonetPos[sField] = 'left';
    }
    else if (' ' + sMonetary == fValue.substr(fValue.length - sMonetary.length - 1)) {
        fValue = fValue.substr(0, fValue.length - sMonetary.length - 1);
        jqCalcMonetPos[sField] = 'right';
    }
    else if (sMonetary == fValue.substr(fValue.length - sMonetary.length)) {
        fValue = fValue.substr(0, fValue.length - sMonetary.length);
        jqCalcMonetPos[sField] = 'right';
    }
  }
  if ("" == fValue) {
    fValue = "0";
  }
  return fValue;
} // scJQCalculatorCurrency

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalculatorAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

