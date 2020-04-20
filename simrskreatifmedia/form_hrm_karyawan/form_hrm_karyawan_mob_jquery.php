
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
  scEventControl_data["kode_karyawan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nama" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nik" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tenaga_medis" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["alamat" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["aktif" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_presensi" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["foto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ponsel" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["npwp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pendidikan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jabatan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_0" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["peringatan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["penilaian" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pembinaan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["penugasan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["penghargaan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["kode_karyawan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kode_karyawan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nama" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nama" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nik" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nik" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tenaga_medis" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tenaga_medis" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["alamat" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["alamat" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["aktif" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["aktif" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_presensi" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_presensi" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ponsel" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ponsel" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["npwp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["npwp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pendidikan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pendidikan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jabatan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jabatan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_0" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_0" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["peringatan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["peringatan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["penilaian" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["penilaian" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pembinaan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pembinaan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["penugasan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["penugasan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["penghargaan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["penghargaan" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("tenaga_medis" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("aktif" + iSeq == fieldName) {
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
  $('#id_sc_field_kode_karyawan' + iSeqRow).bind('blur', function() { sc_form_hrm_karyawan_kode_karyawan_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_hrm_karyawan_kode_karyawan_onfocus(this, iSeqRow) });
  $('#id_sc_field_nama' + iSeqRow).bind('blur', function() { sc_form_hrm_karyawan_nama_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_hrm_karyawan_nama_onfocus(this, iSeqRow) });
  $('#id_sc_field_ponsel' + iSeqRow).bind('blur', function() { sc_form_hrm_karyawan_ponsel_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_hrm_karyawan_ponsel_onfocus(this, iSeqRow) });
  $('#id_sc_field_email' + iSeqRow).bind('blur', function() { sc_form_hrm_karyawan_email_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_hrm_karyawan_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_nik' + iSeqRow).bind('blur', function() { sc_form_hrm_karyawan_nik_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_hrm_karyawan_nik_onfocus(this, iSeqRow) });
  $('#id_sc_field_npwp' + iSeqRow).bind('blur', function() { sc_form_hrm_karyawan_npwp_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_hrm_karyawan_npwp_onfocus(this, iSeqRow) });
  $('#id_sc_field_alamat' + iSeqRow).bind('blur', function() { sc_form_hrm_karyawan_alamat_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_hrm_karyawan_alamat_onfocus(this, iSeqRow) });
  $('#id_sc_field_aktif' + iSeqRow).bind('blur', function() { sc_form_hrm_karyawan_aktif_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_hrm_karyawan_aktif_onfocus(this, iSeqRow) });
  $('#id_sc_field_foto' + iSeqRow).bind('blur', function() { sc_form_hrm_karyawan_foto_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_hrm_karyawan_foto_onfocus(this, iSeqRow) });
  $('#id_sc_field_tenaga_medis' + iSeqRow).bind('blur', function() { sc_form_hrm_karyawan_tenaga_medis_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_hrm_karyawan_tenaga_medis_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_presensi' + iSeqRow).bind('blur', function() { sc_form_hrm_karyawan_id_presensi_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_hrm_karyawan_id_presensi_onfocus(this, iSeqRow) });
  $('#id_sc_field_pendidikan' + iSeqRow).bind('blur', function() { sc_form_hrm_karyawan_pendidikan_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_hrm_karyawan_pendidikan_onfocus(this, iSeqRow) });
  $('#id_sc_field_jabatan' + iSeqRow).bind('blur', function() { sc_form_hrm_karyawan_jabatan_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_hrm_karyawan_jabatan_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_0' + iSeqRow).bind('blur', function() { sc_form_hrm_karyawan_sc_field_0_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_hrm_karyawan_sc_field_0_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_1' + iSeqRow).bind('blur', function() { sc_form_hrm_karyawan_sc_field_1_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_hrm_karyawan_sc_field_1_onfocus(this, iSeqRow) });
  $('#id_sc_field_peringatan' + iSeqRow).bind('blur', function() { sc_form_hrm_karyawan_peringatan_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_hrm_karyawan_peringatan_onfocus(this, iSeqRow) });
  $('#id_sc_field_penilaian' + iSeqRow).bind('blur', function() { sc_form_hrm_karyawan_penilaian_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_hrm_karyawan_penilaian_onfocus(this, iSeqRow) });
  $('#id_sc_field_pembinaan' + iSeqRow).bind('blur', function() { sc_form_hrm_karyawan_pembinaan_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_hrm_karyawan_pembinaan_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_2' + iSeqRow).bind('blur', function() { sc_form_hrm_karyawan_sc_field_2_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_hrm_karyawan_sc_field_2_onfocus(this, iSeqRow) });
  $('#id_sc_field_penugasan' + iSeqRow).bind('blur', function() { sc_form_hrm_karyawan_penugasan_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_hrm_karyawan_penugasan_onfocus(this, iSeqRow) });
  $('#id_sc_field_penghargaan' + iSeqRow).bind('blur', function() { sc_form_hrm_karyawan_penghargaan_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_hrm_karyawan_penghargaan_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_hrm_karyawan_kode_karyawan_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_karyawan_mob_validate_kode_karyawan();
  scCssBlur(oThis);
}

function sc_form_hrm_karyawan_kode_karyawan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_karyawan_nama_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_karyawan_mob_validate_nama();
  scCssBlur(oThis);
}

function sc_form_hrm_karyawan_nama_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_karyawan_ponsel_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_karyawan_mob_validate_ponsel();
  scCssBlur(oThis);
}

function sc_form_hrm_karyawan_ponsel_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_karyawan_email_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_karyawan_mob_validate_email();
  scCssBlur(oThis);
}

function sc_form_hrm_karyawan_email_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_karyawan_nik_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_karyawan_mob_validate_nik();
  scCssBlur(oThis);
}

function sc_form_hrm_karyawan_nik_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_karyawan_npwp_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_karyawan_mob_validate_npwp();
  scCssBlur(oThis);
}

function sc_form_hrm_karyawan_npwp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_karyawan_alamat_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_karyawan_mob_validate_alamat();
  scCssBlur(oThis);
}

function sc_form_hrm_karyawan_alamat_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_karyawan_aktif_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_karyawan_mob_validate_aktif();
  scCssBlur(oThis);
}

function sc_form_hrm_karyawan_aktif_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_karyawan_foto_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_hrm_karyawan_foto_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_hrm_karyawan_tenaga_medis_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_karyawan_mob_validate_tenaga_medis();
  scCssBlur(oThis);
}

function sc_form_hrm_karyawan_tenaga_medis_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_karyawan_id_presensi_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_karyawan_mob_validate_id_presensi();
  scCssBlur(oThis);
}

function sc_form_hrm_karyawan_id_presensi_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_karyawan_pendidikan_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_karyawan_mob_validate_pendidikan();
  scCssBlur(oThis);
}

function sc_form_hrm_karyawan_pendidikan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_karyawan_jabatan_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_karyawan_mob_validate_jabatan();
  scCssBlur(oThis);
}

function sc_form_hrm_karyawan_jabatan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_karyawan_sc_field_0_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_karyawan_mob_validate_sc_field_0();
  scCssBlur(oThis);
}

function sc_form_hrm_karyawan_sc_field_0_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_karyawan_sc_field_1_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_karyawan_mob_validate_sc_field_1();
  scCssBlur(oThis);
}

function sc_form_hrm_karyawan_sc_field_1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_karyawan_peringatan_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_karyawan_mob_validate_peringatan();
  scCssBlur(oThis);
}

function sc_form_hrm_karyawan_peringatan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_karyawan_penilaian_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_karyawan_mob_validate_penilaian();
  scCssBlur(oThis);
}

function sc_form_hrm_karyawan_penilaian_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_karyawan_pembinaan_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_karyawan_mob_validate_pembinaan();
  scCssBlur(oThis);
}

function sc_form_hrm_karyawan_pembinaan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_karyawan_sc_field_2_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_karyawan_mob_validate_sc_field_2();
  scCssBlur(oThis);
}

function sc_form_hrm_karyawan_sc_field_2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_karyawan_penugasan_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_karyawan_mob_validate_penugasan();
  scCssBlur(oThis);
}

function sc_form_hrm_karyawan_penugasan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_karyawan_penghargaan_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_karyawan_mob_validate_penghargaan();
  scCssBlur(oThis);
}

function sc_form_hrm_karyawan_penghargaan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
	if ("1" == block) {
		displayChange_block_1(status);
	}
	if ("2" == block) {
		displayChange_block_2(status);
	}
	if ("3" == block) {
		displayChange_block_3(status);
	}
	if ("4" == block) {
		displayChange_block_4(status);
	}
	if ("5" == block) {
		displayChange_block_5(status);
	}
	if ("6" == block) {
		displayChange_block_6(status);
	}
	if ("7" == block) {
		displayChange_block_7(status);
	}
	if ("8" == block) {
		displayChange_block_8(status);
	}
	if ("9" == block) {
		displayChange_block_9(status);
	}
	if ("10" == block) {
		displayChange_block_10(status);
	}
	if ("11" == block) {
		displayChange_block_11(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("kode_karyawan", "", status);
	displayChange_field("nama", "", status);
	displayChange_field("nik", "", status);
	displayChange_field("tenaga_medis", "", status);
	displayChange_field("alamat", "", status);
	displayChange_field("aktif", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("id_presensi", "", status);
	displayChange_field("foto", "", status);
	displayChange_field("ponsel", "", status);
	displayChange_field("email", "", status);
	displayChange_field("npwp", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("pendidikan", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("jabatan", "", status);
}

function displayChange_block_4(status) {
	displayChange_field("sc_field_0", "", status);
}

function displayChange_block_5(status) {
	displayChange_field("sc_field_1", "", status);
}

function displayChange_block_6(status) {
	displayChange_field("peringatan", "", status);
}

function displayChange_block_7(status) {
	displayChange_field("penilaian", "", status);
}

function displayChange_block_8(status) {
	displayChange_field("pembinaan", "", status);
}

function displayChange_block_9(status) {
	displayChange_field("sc_field_2", "", status);
}

function displayChange_block_10(status) {
	displayChange_field("penugasan", "", status);
}

function displayChange_block_11(status) {
	displayChange_field("penghargaan", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_kode_karyawan(row, status);
	displayChange_field_nama(row, status);
	displayChange_field_nik(row, status);
	displayChange_field_tenaga_medis(row, status);
	displayChange_field_alamat(row, status);
	displayChange_field_aktif(row, status);
	displayChange_field_id_presensi(row, status);
	displayChange_field_foto(row, status);
	displayChange_field_ponsel(row, status);
	displayChange_field_email(row, status);
	displayChange_field_npwp(row, status);
	displayChange_field_pendidikan(row, status);
	displayChange_field_jabatan(row, status);
	displayChange_field_sc_field_0(row, status);
	displayChange_field_sc_field_1(row, status);
	displayChange_field_peringatan(row, status);
	displayChange_field_penilaian(row, status);
	displayChange_field_pembinaan(row, status);
	displayChange_field_sc_field_2(row, status);
	displayChange_field_penugasan(row, status);
	displayChange_field_penghargaan(row, status);
}

function displayChange_field(field, row, status) {
	if ("kode_karyawan" == field) {
		displayChange_field_kode_karyawan(row, status);
	}
	if ("nama" == field) {
		displayChange_field_nama(row, status);
	}
	if ("nik" == field) {
		displayChange_field_nik(row, status);
	}
	if ("tenaga_medis" == field) {
		displayChange_field_tenaga_medis(row, status);
	}
	if ("alamat" == field) {
		displayChange_field_alamat(row, status);
	}
	if ("aktif" == field) {
		displayChange_field_aktif(row, status);
	}
	if ("id_presensi" == field) {
		displayChange_field_id_presensi(row, status);
	}
	if ("foto" == field) {
		displayChange_field_foto(row, status);
	}
	if ("ponsel" == field) {
		displayChange_field_ponsel(row, status);
	}
	if ("email" == field) {
		displayChange_field_email(row, status);
	}
	if ("npwp" == field) {
		displayChange_field_npwp(row, status);
	}
	if ("pendidikan" == field) {
		displayChange_field_pendidikan(row, status);
	}
	if ("jabatan" == field) {
		displayChange_field_jabatan(row, status);
	}
	if ("sc_field_0" == field) {
		displayChange_field_sc_field_0(row, status);
	}
	if ("sc_field_1" == field) {
		displayChange_field_sc_field_1(row, status);
	}
	if ("peringatan" == field) {
		displayChange_field_peringatan(row, status);
	}
	if ("penilaian" == field) {
		displayChange_field_penilaian(row, status);
	}
	if ("pembinaan" == field) {
		displayChange_field_pembinaan(row, status);
	}
	if ("sc_field_2" == field) {
		displayChange_field_sc_field_2(row, status);
	}
	if ("penugasan" == field) {
		displayChange_field_penugasan(row, status);
	}
	if ("penghargaan" == field) {
		displayChange_field_penghargaan(row, status);
	}
}

function displayChange_field_kode_karyawan(row, status) {
}

function displayChange_field_nama(row, status) {
}

function displayChange_field_nik(row, status) {
}

function displayChange_field_tenaga_medis(row, status) {
}

function displayChange_field_alamat(row, status) {
}

function displayChange_field_aktif(row, status) {
}

function displayChange_field_id_presensi(row, status) {
}

function displayChange_field_foto(row, status) {
}

function displayChange_field_ponsel(row, status) {
}

function displayChange_field_email(row, status) {
}

function displayChange_field_npwp(row, status) {
}

function displayChange_field_pendidikan(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_hrm_pendidikan_mob")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_hrm_pendidikan_mob")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_jabatan(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_hrm_jabatan_karyawan_mob")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_hrm_jabatan_karyawan_mob")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_sc_field_0(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_hrm_kontrak_kerja_mob")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_hrm_kontrak_kerja_mob")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_sc_field_1(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbhrdinformal_mob")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbhrdinformal_mob")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_peringatan(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_hrm_peringatan_mob")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_hrm_peringatan_mob")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_penilaian(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_hrm_penilaian_mob")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_hrm_penilaian_mob")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_pembinaan(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_hrm_pembinaan_mob")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_hrm_pembinaan_mob")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_sc_field_2(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_hrm_ikatan_dinas_mob")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_hrm_ikatan_dinas_mob")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_penugasan(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_hrm_penugasan_mob")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_hrm_penugasan_mob")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_penghargaan(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_hrm_penghargaan_mob")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_hrm_penghargaan_mob")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_hrm_karyawan_mob_form" + pageNo).hide();
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
  $("#id_sc_field_foto" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_hrm_karyawan_mob_ul_save.php",
    dropZone: "",
    formData: function() {
      return [
        {name: 'param_field', value: 'foto'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_foto" + iSeqRow);
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_foto" + iSeqRow);
        loader.show();
      }
    },
    done: function(e, data) {
      var fileData, respData, respPos, respMsg, thumbDisplay, checkDisplay, var_ajax_img_thumb, oTemp;
      fileData = null;
      respMsg = "";
      if (data && data.result && data.result[0] && data.result[0].body) {
        respData = data.result[0].body.innerText;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = $.parseJSON(respData);
        }
        else {
          respMsg = respData;
        }
      }
      else {
        respData = data.result;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = eval(respData);
        }
        else {
          respMsg = respData;
        }
      }
      if (window.FormData !== undefined)
      {
        $("#id_img_loader_foto" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_foto" + iSeqRow).hide();
      }
      if (null == fileData) {
        if ("" != respMsg) {
          oTemp = {"htmOutput" : "<?php echo $this->Ini->Nm_lang['lang_errm_upld_admn']; ?>"};
          scAjaxShowDebug(oTemp);
        }
        return;
      }
      if (fileData[0].error && "" != fileData[0].error) {
        var uploadErrorMessage = "";
        oResp = {};
        if ("acceptFileTypes" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_invl']) ?>";
        }
        else if ("maxFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("minFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("emptyFile" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_empty']) ?>";
        }
        scAjaxShowErrorDisplay("table", uploadErrorMessage);
        return;
      }
      $("#id_sc_field_foto" + iSeqRow).val("");
      $("#id_sc_field_foto_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_foto_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_foto = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_foto) ? "none" : "";
      $("#id_ajax_img_foto" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_foto" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_foto) {
        document.F1.temp_out_foto.value = var_ajax_img_thumb;
        document.F1.temp_out1_foto.value = var_ajax_img_foto;
      }
      else if (document.F1.temp_out_foto) {
        document.F1.temp_out_foto.value = var_ajax_img_foto;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_foto" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_foto" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_foto" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_foto" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

var scBtnGrpStatus = {};
function scBtnGrpShow(sGroup) {
  if (typeof(scBtnGrpShowMobile) === typeof(function(){})) { return scBtnGrpShowMobile(sGroup); };
  $('#sc_btgp_btn_' + sGroup).addClass('selected');
  var btnPos = $('#sc_btgp_btn_' + sGroup).offset();
  scBtnGrpStatus[sGroup] = 'open';
  $('#sc_btgp_btn_' + sGroup).mouseout(function() {
    scBtnGrpStatus[sGroup] = '';
    setTimeout(function() {
      scBtnGrpHide(sGroup, false);
    }, 1000);
  }).mouseover(function() {
    scBtnGrpStatus[sGroup] = 'over';
  });
  $('#sc_btgp_div_' + sGroup + ' span a').click(function() {
    scBtnGrpStatus[sGroup] = 'out';
    scBtnGrpHide(sGroup, false);
  });
  $('#sc_btgp_div_' + sGroup).css({
    'left': btnPos.left
  })
  .mouseover(function() {
    scBtnGrpStatus[sGroup] = 'over';
  })
  .mouseleave(function() {
    scBtnGrpStatus[sGroup] = 'out';
    setTimeout(function() {
      scBtnGrpHide(sGroup, false);
    }, 1000);
  })
  .show('fast');
}
function scBtnGrpHide(sGroup, bForce) {
  if (bForce || 'over' != scBtnGrpStatus[sGroup]) {
    $('#sc_btgp_div_' + sGroup).hide('fast');
    $('#sc_btgp_btn_' + sGroup).addClass('selected');
  }
}
