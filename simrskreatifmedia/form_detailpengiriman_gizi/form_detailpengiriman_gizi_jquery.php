
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
  scEventControl_data["gelar_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nama_pasien_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kamar_kelas_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["bed_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["diet_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["gizi_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["mp_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["lh_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ln_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["syr_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ekstra_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["buah_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jadwal_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["usia_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["gelar_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["gelar_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nama_pasien_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nama_pasien_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kamar_kelas_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kamar_kelas_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["bed_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["bed_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["diet_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["diet_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["gizi_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["gizi_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["mp_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["mp_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["lh_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["lh_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ln_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ln_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["syr_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["syr_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ekstra_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ekstra_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["buah_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["buah_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jadwal_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jadwal_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["usia_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["usia_" + iSeqRow]["change"]) {
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
  if ("gelar_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("gizi_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("mp_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("lh_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("ln_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("syr_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("ekstra_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("buah_" + iSeq == fieldName) {
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
  $('#id_sc_field_id_' + iSeqRow).bind('blur', function() { sc_form_detailpengiriman_gizi_id__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_detailpengiriman_gizi_id__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_detailpengiriman_gizi_id__onfocus(this, iSeqRow) });
  $('#id_sc_field_gelar_' + iSeqRow).bind('blur', function() { sc_form_detailpengiriman_gizi_gelar__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_detailpengiriman_gizi_gelar__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_detailpengiriman_gizi_gelar__onfocus(this, iSeqRow) });
  $('#id_sc_field_nama_pasien_' + iSeqRow).bind('blur', function() { sc_form_detailpengiriman_gizi_nama_pasien__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_detailpengiriman_gizi_nama_pasien__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_detailpengiriman_gizi_nama_pasien__onfocus(this, iSeqRow) });
  $('#id_sc_field_kamar_kelas_' + iSeqRow).bind('blur', function() { sc_form_detailpengiriman_gizi_kamar_kelas__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_detailpengiriman_gizi_kamar_kelas__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_detailpengiriman_gizi_kamar_kelas__onfocus(this, iSeqRow) });
  $('#id_sc_field_gizi_' + iSeqRow).bind('blur', function() { sc_form_detailpengiriman_gizi_gizi__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_detailpengiriman_gizi_gizi__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_detailpengiriman_gizi_gizi__onfocus(this, iSeqRow) });
  $('#id_sc_field_diet_' + iSeqRow).bind('blur', function() { sc_form_detailpengiriman_gizi_diet__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_detailpengiriman_gizi_diet__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_detailpengiriman_gizi_diet__onfocus(this, iSeqRow) });
  $('#id_sc_field_mp_' + iSeqRow).bind('blur', function() { sc_form_detailpengiriman_gizi_mp__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_detailpengiriman_gizi_mp__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_detailpengiriman_gizi_mp__onfocus(this, iSeqRow) });
  $('#id_sc_field_lh_' + iSeqRow).bind('blur', function() { sc_form_detailpengiriman_gizi_lh__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_detailpengiriman_gizi_lh__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_detailpengiriman_gizi_lh__onfocus(this, iSeqRow) });
  $('#id_sc_field_ln_' + iSeqRow).bind('blur', function() { sc_form_detailpengiriman_gizi_ln__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_detailpengiriman_gizi_ln__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_detailpengiriman_gizi_ln__onfocus(this, iSeqRow) });
  $('#id_sc_field_syr_' + iSeqRow).bind('blur', function() { sc_form_detailpengiriman_gizi_syr__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_detailpengiriman_gizi_syr__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_detailpengiriman_gizi_syr__onfocus(this, iSeqRow) });
  $('#id_sc_field_ekstra_' + iSeqRow).bind('blur', function() { sc_form_detailpengiriman_gizi_ekstra__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_detailpengiriman_gizi_ekstra__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_detailpengiriman_gizi_ekstra__onfocus(this, iSeqRow) });
  $('#id_sc_field_buah_' + iSeqRow).bind('blur', function() { sc_form_detailpengiriman_gizi_buah__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_detailpengiriman_gizi_buah__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_detailpengiriman_gizi_buah__onfocus(this, iSeqRow) });
  $('#id_sc_field_bed_' + iSeqRow).bind('blur', function() { sc_form_detailpengiriman_gizi_bed__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_detailpengiriman_gizi_bed__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_detailpengiriman_gizi_bed__onfocus(this, iSeqRow) });
  $('#id_sc_field_jadwal_' + iSeqRow).bind('blur', function() { sc_form_detailpengiriman_gizi_jadwal__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_detailpengiriman_gizi_jadwal__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_detailpengiriman_gizi_jadwal__onfocus(this, iSeqRow) });
  $('#id_sc_field_usia_' + iSeqRow).bind('blur', function() { sc_form_detailpengiriman_gizi_usia__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_detailpengiriman_gizi_usia__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_detailpengiriman_gizi_usia__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_detailpengiriman_gizi_id__onblur(oThis, iSeqRow) {
  do_ajax_form_detailpengiriman_gizi_validate_id_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detailpengiriman_gizi_id__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_detailpengiriman_gizi_id__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detailpengiriman_gizi_gelar__onblur(oThis, iSeqRow) {
  do_ajax_form_detailpengiriman_gizi_validate_gelar_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detailpengiriman_gizi_gelar__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_detailpengiriman_gizi_gelar__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detailpengiriman_gizi_nama_pasien__onblur(oThis, iSeqRow) {
  do_ajax_form_detailpengiriman_gizi_validate_nama_pasien_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detailpengiriman_gizi_nama_pasien__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_detailpengiriman_gizi_nama_pasien__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detailpengiriman_gizi_kamar_kelas__onblur(oThis, iSeqRow) {
  do_ajax_form_detailpengiriman_gizi_validate_kamar_kelas_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detailpengiriman_gizi_kamar_kelas__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_detailpengiriman_gizi_kamar_kelas__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detailpengiriman_gizi_gizi__onblur(oThis, iSeqRow) {
  do_ajax_form_detailpengiriman_gizi_validate_gizi_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detailpengiriman_gizi_gizi__onchange(oThis, iSeqRow) {
  do_ajax_form_detailpengiriman_gizi_refresh_gizi_(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_detailpengiriman_gizi_gizi__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detailpengiriman_gizi_diet__onblur(oThis, iSeqRow) {
  do_ajax_form_detailpengiriman_gizi_validate_diet_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detailpengiriman_gizi_diet__onchange(oThis, iSeqRow) {
  do_ajax_form_detailpengiriman_gizi_refresh_diet_(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_detailpengiriman_gizi_diet__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detailpengiriman_gizi_mp__onblur(oThis, iSeqRow) {
  do_ajax_form_detailpengiriman_gizi_validate_mp_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detailpengiriman_gizi_mp__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_detailpengiriman_gizi_mp__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detailpengiriman_gizi_lh__onblur(oThis, iSeqRow) {
  do_ajax_form_detailpengiriman_gizi_validate_lh_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detailpengiriman_gizi_lh__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_detailpengiriman_gizi_lh__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detailpengiriman_gizi_ln__onblur(oThis, iSeqRow) {
  do_ajax_form_detailpengiriman_gizi_validate_ln_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detailpengiriman_gizi_ln__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_detailpengiriman_gizi_ln__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detailpengiriman_gizi_syr__onblur(oThis, iSeqRow) {
  do_ajax_form_detailpengiriman_gizi_validate_syr_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detailpengiriman_gizi_syr__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_detailpengiriman_gizi_syr__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detailpengiriman_gizi_ekstra__onblur(oThis, iSeqRow) {
  do_ajax_form_detailpengiriman_gizi_validate_ekstra_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detailpengiriman_gizi_ekstra__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_detailpengiriman_gizi_ekstra__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detailpengiriman_gizi_buah__onblur(oThis, iSeqRow) {
  do_ajax_form_detailpengiriman_gizi_validate_buah_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detailpengiriman_gizi_buah__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_detailpengiriman_gizi_buah__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detailpengiriman_gizi_bed__onblur(oThis, iSeqRow) {
  do_ajax_form_detailpengiriman_gizi_validate_bed_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detailpengiriman_gizi_bed__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_detailpengiriman_gizi_bed__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detailpengiriman_gizi_jadwal__onblur(oThis, iSeqRow) {
  do_ajax_form_detailpengiriman_gizi_validate_jadwal_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detailpengiriman_gizi_jadwal__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_detailpengiriman_gizi_jadwal__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detailpengiriman_gizi_usia__onblur(oThis, iSeqRow) {
  do_ajax_form_detailpengiriman_gizi_validate_usia_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detailpengiriman_gizi_usia__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_detailpengiriman_gizi_usia__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("gelar_", "", status);
	displayChange_field("nama_pasien_", "", status);
	displayChange_field("kamar_kelas_", "", status);
	displayChange_field("bed_", "", status);
	displayChange_field("diet_", "", status);
	displayChange_field("gizi_", "", status);
	displayChange_field("mp_", "", status);
	displayChange_field("lh_", "", status);
	displayChange_field("ln_", "", status);
	displayChange_field("syr_", "", status);
	displayChange_field("ekstra_", "", status);
	displayChange_field("buah_", "", status);
	displayChange_field("jadwal_", "", status);
	displayChange_field("usia_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_gelar_(row, status);
	displayChange_field_nama_pasien_(row, status);
	displayChange_field_kamar_kelas_(row, status);
	displayChange_field_bed_(row, status);
	displayChange_field_diet_(row, status);
	displayChange_field_gizi_(row, status);
	displayChange_field_mp_(row, status);
	displayChange_field_lh_(row, status);
	displayChange_field_ln_(row, status);
	displayChange_field_syr_(row, status);
	displayChange_field_ekstra_(row, status);
	displayChange_field_buah_(row, status);
	displayChange_field_jadwal_(row, status);
	displayChange_field_usia_(row, status);
	displayChange_field_id_(row, status);
}

function displayChange_field(field, row, status) {
	if ("gelar_" == field) {
		displayChange_field_gelar_(row, status);
	}
	if ("nama_pasien_" == field) {
		displayChange_field_nama_pasien_(row, status);
	}
	if ("kamar_kelas_" == field) {
		displayChange_field_kamar_kelas_(row, status);
	}
	if ("bed_" == field) {
		displayChange_field_bed_(row, status);
	}
	if ("diet_" == field) {
		displayChange_field_diet_(row, status);
	}
	if ("gizi_" == field) {
		displayChange_field_gizi_(row, status);
	}
	if ("mp_" == field) {
		displayChange_field_mp_(row, status);
	}
	if ("lh_" == field) {
		displayChange_field_lh_(row, status);
	}
	if ("ln_" == field) {
		displayChange_field_ln_(row, status);
	}
	if ("syr_" == field) {
		displayChange_field_syr_(row, status);
	}
	if ("ekstra_" == field) {
		displayChange_field_ekstra_(row, status);
	}
	if ("buah_" == field) {
		displayChange_field_buah_(row, status);
	}
	if ("jadwal_" == field) {
		displayChange_field_jadwal_(row, status);
	}
	if ("usia_" == field) {
		displayChange_field_usia_(row, status);
	}
	if ("id_" == field) {
		displayChange_field_id_(row, status);
	}
}

function displayChange_field_gelar_(row, status) {
}

function displayChange_field_nama_pasien_(row, status) {
}

function displayChange_field_kamar_kelas_(row, status) {
}

function displayChange_field_bed_(row, status) {
}

function displayChange_field_diet_(row, status) {
}

function displayChange_field_gizi_(row, status) {
}

function displayChange_field_mp_(row, status) {
}

function displayChange_field_lh_(row, status) {
}

function displayChange_field_ln_(row, status) {
}

function displayChange_field_syr_(row, status) {
}

function displayChange_field_ekstra_(row, status) {
}

function displayChange_field_buah_(row, status) {
}

function displayChange_field_jadwal_(row, status) {
}

function displayChange_field_usia_(row, status) {
}

function displayChange_field_id_(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_detailpengiriman_gizi_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(34);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_tgl_lahir_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_tgl_lahir_" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_detailpengiriman_gizi_validate_tgl_lahir_(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['tgl_lahir_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

