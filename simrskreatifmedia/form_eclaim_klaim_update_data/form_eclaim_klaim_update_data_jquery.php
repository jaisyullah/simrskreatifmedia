
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
  scEventControl_data["nomor_sep" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nomor_kartu" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tgl_masuk" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tgl_pulang" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jenis_rawat" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kelas_rawat" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["adl_sub_acute" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["adl_chronic" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["icu_indikator" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["icu_los" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ventilator_hour" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["upgrade_class_ind" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["upgrade_class_class" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["upgrade_class_los" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["add_payment_pct" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["birth_weight" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["discharge_status" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["diagnosa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["procedure" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tarif_rs_prosedur_non_bedah" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tarif_rs_prosedur_bedah" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tarif_rs_konsultasi" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tarif_rs_tenaga_ahli" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tarif_rs_keperawatan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tarif_rs_penunjang" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tarif_rs_radiologi" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tarif_rs_laboratorium" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tarif_rs_pelayanan_darah" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tarif_rs_rehabilitasi" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tarif_rs_kamar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tarif_rs_rawat_intensif" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tarif_rs_obat" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tarif_rs_alkes" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tarif_rs_bmhp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tarif_rs_sewa_alat" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tarif_poli_eks" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nama_dokter" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kode_tarif" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["payor_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["payor_cd" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cob_cd" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["nomor_sep" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nomor_sep" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nomor_kartu" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nomor_kartu" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tgl_masuk" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tgl_masuk" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tgl_pulang" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tgl_pulang" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jenis_rawat" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jenis_rawat" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kelas_rawat" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kelas_rawat" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["adl_sub_acute" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["adl_sub_acute" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["adl_chronic" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["adl_chronic" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["icu_indikator" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["icu_indikator" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["icu_los" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["icu_los" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ventilator_hour" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ventilator_hour" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["upgrade_class_ind" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["upgrade_class_ind" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["upgrade_class_class" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["upgrade_class_class" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["upgrade_class_los" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["upgrade_class_los" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["add_payment_pct" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["add_payment_pct" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["birth_weight" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["birth_weight" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["discharge_status" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["discharge_status" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["diagnosa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["diagnosa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["procedure" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["procedure" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tarif_rs_prosedur_non_bedah" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tarif_rs_prosedur_non_bedah" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tarif_rs_prosedur_bedah" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tarif_rs_prosedur_bedah" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tarif_rs_konsultasi" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tarif_rs_konsultasi" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tarif_rs_tenaga_ahli" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tarif_rs_tenaga_ahli" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tarif_rs_keperawatan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tarif_rs_keperawatan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tarif_rs_penunjang" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tarif_rs_penunjang" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tarif_rs_radiologi" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tarif_rs_radiologi" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tarif_rs_laboratorium" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tarif_rs_laboratorium" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tarif_rs_pelayanan_darah" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tarif_rs_pelayanan_darah" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tarif_rs_rehabilitasi" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tarif_rs_rehabilitasi" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tarif_rs_kamar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tarif_rs_kamar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tarif_rs_rawat_intensif" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tarif_rs_rawat_intensif" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tarif_rs_obat" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tarif_rs_obat" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tarif_rs_alkes" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tarif_rs_alkes" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tarif_rs_bmhp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tarif_rs_bmhp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tarif_rs_sewa_alat" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tarif_rs_sewa_alat" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tarif_poli_eks" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tarif_poli_eks" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nama_dokter" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nama_dokter" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kode_tarif" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kode_tarif" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["payor_id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["payor_id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["payor_cd" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["payor_cd" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cob_cd" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cob_cd" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
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
  $('#id_sc_field_nomor_sep' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_nomor_sep_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_eclaim_klaim_update_data_nomor_sep_onfocus(this, iSeqRow) });
  $('#id_sc_field_nomor_kartu' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_nomor_kartu_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_eclaim_klaim_update_data_nomor_kartu_onfocus(this, iSeqRow) });
  $('#id_sc_field_tgl_masuk' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_tgl_masuk_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_eclaim_klaim_update_data_tgl_masuk_onfocus(this, iSeqRow) });
  $('#id_sc_field_tgl_masuk_hora' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_tgl_masuk_hora_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_eclaim_klaim_update_data_tgl_masuk_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_tgl_pulang' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_tgl_pulang_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_eclaim_klaim_update_data_tgl_pulang_onfocus(this, iSeqRow) });
  $('#id_sc_field_tgl_pulang_hora' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_tgl_pulang_hora_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_eclaim_klaim_update_data_tgl_pulang_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_jenis_rawat' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_jenis_rawat_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_eclaim_klaim_update_data_jenis_rawat_onfocus(this, iSeqRow) });
  $('#id_sc_field_kelas_rawat' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_kelas_rawat_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_eclaim_klaim_update_data_kelas_rawat_onfocus(this, iSeqRow) });
  $('#id_sc_field_adl_sub_acute' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_adl_sub_acute_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_eclaim_klaim_update_data_adl_sub_acute_onfocus(this, iSeqRow) });
  $('#id_sc_field_adl_chronic' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_adl_chronic_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_eclaim_klaim_update_data_adl_chronic_onfocus(this, iSeqRow) });
  $('#id_sc_field_icu_indikator' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_icu_indikator_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_eclaim_klaim_update_data_icu_indikator_onfocus(this, iSeqRow) });
  $('#id_sc_field_icu_los' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_icu_los_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_eclaim_klaim_update_data_icu_los_onfocus(this, iSeqRow) });
  $('#id_sc_field_ventilator_hour' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_ventilator_hour_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_eclaim_klaim_update_data_ventilator_hour_onfocus(this, iSeqRow) });
  $('#id_sc_field_upgrade_class_ind' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_upgrade_class_ind_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_eclaim_klaim_update_data_upgrade_class_ind_onfocus(this, iSeqRow) });
  $('#id_sc_field_upgrade_class_class' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_upgrade_class_class_onblur(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_eclaim_klaim_update_data_upgrade_class_class_onfocus(this, iSeqRow) });
  $('#id_sc_field_upgrade_class_los' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_upgrade_class_los_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_eclaim_klaim_update_data_upgrade_class_los_onfocus(this, iSeqRow) });
  $('#id_sc_field_add_payment_pct' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_add_payment_pct_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_eclaim_klaim_update_data_add_payment_pct_onfocus(this, iSeqRow) });
  $('#id_sc_field_birth_weight' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_birth_weight_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_eclaim_klaim_update_data_birth_weight_onfocus(this, iSeqRow) });
  $('#id_sc_field_discharge_status' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_discharge_status_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_eclaim_klaim_update_data_discharge_status_onfocus(this, iSeqRow) });
  $('#id_sc_field_diagnosa' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_diagnosa_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_eclaim_klaim_update_data_diagnosa_onfocus(this, iSeqRow) });
  $('#id_sc_field_procedure' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_procedure_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_eclaim_klaim_update_data_procedure_onfocus(this, iSeqRow) });
  $('#id_sc_field_tarif_rs_prosedur_non_bedah' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_tarif_rs_prosedur_non_bedah_onblur(this, iSeqRow) })
                                                         .bind('focus', function() { sc_form_eclaim_klaim_update_data_tarif_rs_prosedur_non_bedah_onfocus(this, iSeqRow) });
  $('#id_sc_field_tarif_rs_prosedur_bedah' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_tarif_rs_prosedur_bedah_onblur(this, iSeqRow) })
                                                     .bind('focus', function() { sc_form_eclaim_klaim_update_data_tarif_rs_prosedur_bedah_onfocus(this, iSeqRow) });
  $('#id_sc_field_tarif_rs_konsultasi' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_tarif_rs_konsultasi_onblur(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_eclaim_klaim_update_data_tarif_rs_konsultasi_onfocus(this, iSeqRow) });
  $('#id_sc_field_tarif_rs_tenaga_ahli' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_tarif_rs_tenaga_ahli_onblur(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_eclaim_klaim_update_data_tarif_rs_tenaga_ahli_onfocus(this, iSeqRow) });
  $('#id_sc_field_tarif_rs_keperawatan' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_tarif_rs_keperawatan_onblur(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_eclaim_klaim_update_data_tarif_rs_keperawatan_onfocus(this, iSeqRow) });
  $('#id_sc_field_tarif_rs_penunjang' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_tarif_rs_penunjang_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_eclaim_klaim_update_data_tarif_rs_penunjang_onfocus(this, iSeqRow) });
  $('#id_sc_field_tarif_rs_radiologi' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_tarif_rs_radiologi_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_eclaim_klaim_update_data_tarif_rs_radiologi_onfocus(this, iSeqRow) });
  $('#id_sc_field_tarif_rs_laboratorium' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_tarif_rs_laboratorium_onblur(this, iSeqRow) })
                                                   .bind('focus', function() { sc_form_eclaim_klaim_update_data_tarif_rs_laboratorium_onfocus(this, iSeqRow) });
  $('#id_sc_field_tarif_rs_pelayanan_darah' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_tarif_rs_pelayanan_darah_onblur(this, iSeqRow) })
                                                      .bind('focus', function() { sc_form_eclaim_klaim_update_data_tarif_rs_pelayanan_darah_onfocus(this, iSeqRow) });
  $('#id_sc_field_tarif_rs_rehabilitasi' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_tarif_rs_rehabilitasi_onblur(this, iSeqRow) })
                                                   .bind('focus', function() { sc_form_eclaim_klaim_update_data_tarif_rs_rehabilitasi_onfocus(this, iSeqRow) });
  $('#id_sc_field_tarif_rs_kamar' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_tarif_rs_kamar_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_eclaim_klaim_update_data_tarif_rs_kamar_onfocus(this, iSeqRow) });
  $('#id_sc_field_tarif_rs_rawat_intensif' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_tarif_rs_rawat_intensif_onblur(this, iSeqRow) })
                                                     .bind('focus', function() { sc_form_eclaim_klaim_update_data_tarif_rs_rawat_intensif_onfocus(this, iSeqRow) });
  $('#id_sc_field_tarif_rs_obat' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_tarif_rs_obat_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_eclaim_klaim_update_data_tarif_rs_obat_onfocus(this, iSeqRow) });
  $('#id_sc_field_tarif_rs_alkes' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_tarif_rs_alkes_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_eclaim_klaim_update_data_tarif_rs_alkes_onfocus(this, iSeqRow) });
  $('#id_sc_field_tarif_rs_bmhp' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_tarif_rs_bmhp_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_eclaim_klaim_update_data_tarif_rs_bmhp_onfocus(this, iSeqRow) });
  $('#id_sc_field_tarif_rs_sewa_alat' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_tarif_rs_sewa_alat_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_eclaim_klaim_update_data_tarif_rs_sewa_alat_onfocus(this, iSeqRow) });
  $('#id_sc_field_tarif_poli_eks' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_tarif_poli_eks_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_eclaim_klaim_update_data_tarif_poli_eks_onfocus(this, iSeqRow) });
  $('#id_sc_field_nama_dokter' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_nama_dokter_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_eclaim_klaim_update_data_nama_dokter_onfocus(this, iSeqRow) });
  $('#id_sc_field_kode_tarif' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_kode_tarif_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_eclaim_klaim_update_data_kode_tarif_onfocus(this, iSeqRow) });
  $('#id_sc_field_payor_id' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_payor_id_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_eclaim_klaim_update_data_payor_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_payor_cd' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_payor_cd_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_eclaim_klaim_update_data_payor_cd_onfocus(this, iSeqRow) });
  $('#id_sc_field_cob_cd' + iSeqRow).bind('blur', function() { sc_form_eclaim_klaim_update_data_cob_cd_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_eclaim_klaim_update_data_cob_cd_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_eclaim_klaim_update_data_nomor_sep_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_nomor_sep();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_nomor_sep_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_nomor_kartu_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_nomor_kartu();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_nomor_kartu_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_tgl_masuk_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_tgl_masuk();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_tgl_masuk_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_tgl_masuk();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_tgl_masuk_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_tgl_masuk_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_tgl_pulang_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_tgl_pulang();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_tgl_pulang_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_tgl_pulang();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_tgl_pulang_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_tgl_pulang_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_jenis_rawat_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_jenis_rawat();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_jenis_rawat_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_kelas_rawat_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_kelas_rawat();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_kelas_rawat_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_adl_sub_acute_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_adl_sub_acute();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_adl_sub_acute_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_adl_chronic_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_adl_chronic();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_adl_chronic_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_icu_indikator_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_icu_indikator();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_icu_indikator_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_icu_los_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_icu_los();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_icu_los_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_ventilator_hour_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_ventilator_hour();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_ventilator_hour_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_upgrade_class_ind_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_upgrade_class_ind();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_upgrade_class_ind_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_upgrade_class_class_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_upgrade_class_class();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_upgrade_class_class_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_upgrade_class_los_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_upgrade_class_los();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_upgrade_class_los_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_add_payment_pct_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_add_payment_pct();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_add_payment_pct_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_birth_weight_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_birth_weight();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_birth_weight_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_discharge_status_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_discharge_status();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_discharge_status_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_diagnosa_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_diagnosa();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_diagnosa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_procedure_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_procedure();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_procedure_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_tarif_rs_prosedur_non_bedah_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_tarif_rs_prosedur_non_bedah();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_tarif_rs_prosedur_non_bedah_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_tarif_rs_prosedur_bedah_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_tarif_rs_prosedur_bedah();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_tarif_rs_prosedur_bedah_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_tarif_rs_konsultasi_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_tarif_rs_konsultasi();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_tarif_rs_konsultasi_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_tarif_rs_tenaga_ahli_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_tarif_rs_tenaga_ahli();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_tarif_rs_tenaga_ahli_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_tarif_rs_keperawatan_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_tarif_rs_keperawatan();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_tarif_rs_keperawatan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_tarif_rs_penunjang_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_tarif_rs_penunjang();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_tarif_rs_penunjang_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_tarif_rs_radiologi_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_tarif_rs_radiologi();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_tarif_rs_radiologi_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_tarif_rs_laboratorium_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_tarif_rs_laboratorium();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_tarif_rs_laboratorium_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_tarif_rs_pelayanan_darah_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_tarif_rs_pelayanan_darah();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_tarif_rs_pelayanan_darah_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_tarif_rs_rehabilitasi_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_tarif_rs_rehabilitasi();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_tarif_rs_rehabilitasi_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_tarif_rs_kamar_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_tarif_rs_kamar();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_tarif_rs_kamar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_tarif_rs_rawat_intensif_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_tarif_rs_rawat_intensif();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_tarif_rs_rawat_intensif_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_tarif_rs_obat_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_tarif_rs_obat();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_tarif_rs_obat_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_tarif_rs_alkes_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_tarif_rs_alkes();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_tarif_rs_alkes_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_tarif_rs_bmhp_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_tarif_rs_bmhp();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_tarif_rs_bmhp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_tarif_rs_sewa_alat_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_tarif_rs_sewa_alat();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_tarif_rs_sewa_alat_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_tarif_poli_eks_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_tarif_poli_eks();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_tarif_poli_eks_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_nama_dokter_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_nama_dokter();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_nama_dokter_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_kode_tarif_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_kode_tarif();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_kode_tarif_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_payor_id_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_payor_id();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_payor_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_payor_cd_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_payor_cd();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_payor_cd_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_eclaim_klaim_update_data_cob_cd_onblur(oThis, iSeqRow) {
  do_ajax_form_eclaim_klaim_update_data_validate_cob_cd();
  scCssBlur(oThis);
}

function sc_form_eclaim_klaim_update_data_cob_cd_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("nomor_sep", "", status);
	displayChange_field("nomor_kartu", "", status);
	displayChange_field("tgl_masuk", "", status);
	displayChange_field("tgl_pulang", "", status);
	displayChange_field("jenis_rawat", "", status);
	displayChange_field("kelas_rawat", "", status);
	displayChange_field("adl_sub_acute", "", status);
	displayChange_field("adl_chronic", "", status);
	displayChange_field("icu_indikator", "", status);
	displayChange_field("icu_los", "", status);
	displayChange_field("ventilator_hour", "", status);
	displayChange_field("upgrade_class_ind", "", status);
	displayChange_field("upgrade_class_class", "", status);
	displayChange_field("upgrade_class_los", "", status);
	displayChange_field("add_payment_pct", "", status);
	displayChange_field("birth_weight", "", status);
	displayChange_field("discharge_status", "", status);
	displayChange_field("diagnosa", "", status);
	displayChange_field("procedure", "", status);
	displayChange_field("tarif_rs_prosedur_non_bedah", "", status);
	displayChange_field("tarif_rs_prosedur_bedah", "", status);
	displayChange_field("tarif_rs_konsultasi", "", status);
	displayChange_field("tarif_rs_tenaga_ahli", "", status);
	displayChange_field("tarif_rs_keperawatan", "", status);
	displayChange_field("tarif_rs_penunjang", "", status);
	displayChange_field("tarif_rs_radiologi", "", status);
	displayChange_field("tarif_rs_laboratorium", "", status);
	displayChange_field("tarif_rs_pelayanan_darah", "", status);
	displayChange_field("tarif_rs_rehabilitasi", "", status);
	displayChange_field("tarif_rs_kamar", "", status);
	displayChange_field("tarif_rs_rawat_intensif", "", status);
	displayChange_field("tarif_rs_obat", "", status);
	displayChange_field("tarif_rs_alkes", "", status);
	displayChange_field("tarif_rs_bmhp", "", status);
	displayChange_field("tarif_rs_sewa_alat", "", status);
	displayChange_field("tarif_poli_eks", "", status);
	displayChange_field("nama_dokter", "", status);
	displayChange_field("kode_tarif", "", status);
	displayChange_field("payor_id", "", status);
	displayChange_field("payor_cd", "", status);
	displayChange_field("cob_cd", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_nomor_sep(row, status);
	displayChange_field_nomor_kartu(row, status);
	displayChange_field_tgl_masuk(row, status);
	displayChange_field_tgl_pulang(row, status);
	displayChange_field_jenis_rawat(row, status);
	displayChange_field_kelas_rawat(row, status);
	displayChange_field_adl_sub_acute(row, status);
	displayChange_field_adl_chronic(row, status);
	displayChange_field_icu_indikator(row, status);
	displayChange_field_icu_los(row, status);
	displayChange_field_ventilator_hour(row, status);
	displayChange_field_upgrade_class_ind(row, status);
	displayChange_field_upgrade_class_class(row, status);
	displayChange_field_upgrade_class_los(row, status);
	displayChange_field_add_payment_pct(row, status);
	displayChange_field_birth_weight(row, status);
	displayChange_field_discharge_status(row, status);
	displayChange_field_diagnosa(row, status);
	displayChange_field_procedure(row, status);
	displayChange_field_tarif_rs_prosedur_non_bedah(row, status);
	displayChange_field_tarif_rs_prosedur_bedah(row, status);
	displayChange_field_tarif_rs_konsultasi(row, status);
	displayChange_field_tarif_rs_tenaga_ahli(row, status);
	displayChange_field_tarif_rs_keperawatan(row, status);
	displayChange_field_tarif_rs_penunjang(row, status);
	displayChange_field_tarif_rs_radiologi(row, status);
	displayChange_field_tarif_rs_laboratorium(row, status);
	displayChange_field_tarif_rs_pelayanan_darah(row, status);
	displayChange_field_tarif_rs_rehabilitasi(row, status);
	displayChange_field_tarif_rs_kamar(row, status);
	displayChange_field_tarif_rs_rawat_intensif(row, status);
	displayChange_field_tarif_rs_obat(row, status);
	displayChange_field_tarif_rs_alkes(row, status);
	displayChange_field_tarif_rs_bmhp(row, status);
	displayChange_field_tarif_rs_sewa_alat(row, status);
	displayChange_field_tarif_poli_eks(row, status);
	displayChange_field_nama_dokter(row, status);
	displayChange_field_kode_tarif(row, status);
	displayChange_field_payor_id(row, status);
	displayChange_field_payor_cd(row, status);
	displayChange_field_cob_cd(row, status);
}

function displayChange_field(field, row, status) {
	if ("nomor_sep" == field) {
		displayChange_field_nomor_sep(row, status);
	}
	if ("nomor_kartu" == field) {
		displayChange_field_nomor_kartu(row, status);
	}
	if ("tgl_masuk" == field) {
		displayChange_field_tgl_masuk(row, status);
	}
	if ("tgl_pulang" == field) {
		displayChange_field_tgl_pulang(row, status);
	}
	if ("jenis_rawat" == field) {
		displayChange_field_jenis_rawat(row, status);
	}
	if ("kelas_rawat" == field) {
		displayChange_field_kelas_rawat(row, status);
	}
	if ("adl_sub_acute" == field) {
		displayChange_field_adl_sub_acute(row, status);
	}
	if ("adl_chronic" == field) {
		displayChange_field_adl_chronic(row, status);
	}
	if ("icu_indikator" == field) {
		displayChange_field_icu_indikator(row, status);
	}
	if ("icu_los" == field) {
		displayChange_field_icu_los(row, status);
	}
	if ("ventilator_hour" == field) {
		displayChange_field_ventilator_hour(row, status);
	}
	if ("upgrade_class_ind" == field) {
		displayChange_field_upgrade_class_ind(row, status);
	}
	if ("upgrade_class_class" == field) {
		displayChange_field_upgrade_class_class(row, status);
	}
	if ("upgrade_class_los" == field) {
		displayChange_field_upgrade_class_los(row, status);
	}
	if ("add_payment_pct" == field) {
		displayChange_field_add_payment_pct(row, status);
	}
	if ("birth_weight" == field) {
		displayChange_field_birth_weight(row, status);
	}
	if ("discharge_status" == field) {
		displayChange_field_discharge_status(row, status);
	}
	if ("diagnosa" == field) {
		displayChange_field_diagnosa(row, status);
	}
	if ("procedure" == field) {
		displayChange_field_procedure(row, status);
	}
	if ("tarif_rs_prosedur_non_bedah" == field) {
		displayChange_field_tarif_rs_prosedur_non_bedah(row, status);
	}
	if ("tarif_rs_prosedur_bedah" == field) {
		displayChange_field_tarif_rs_prosedur_bedah(row, status);
	}
	if ("tarif_rs_konsultasi" == field) {
		displayChange_field_tarif_rs_konsultasi(row, status);
	}
	if ("tarif_rs_tenaga_ahli" == field) {
		displayChange_field_tarif_rs_tenaga_ahli(row, status);
	}
	if ("tarif_rs_keperawatan" == field) {
		displayChange_field_tarif_rs_keperawatan(row, status);
	}
	if ("tarif_rs_penunjang" == field) {
		displayChange_field_tarif_rs_penunjang(row, status);
	}
	if ("tarif_rs_radiologi" == field) {
		displayChange_field_tarif_rs_radiologi(row, status);
	}
	if ("tarif_rs_laboratorium" == field) {
		displayChange_field_tarif_rs_laboratorium(row, status);
	}
	if ("tarif_rs_pelayanan_darah" == field) {
		displayChange_field_tarif_rs_pelayanan_darah(row, status);
	}
	if ("tarif_rs_rehabilitasi" == field) {
		displayChange_field_tarif_rs_rehabilitasi(row, status);
	}
	if ("tarif_rs_kamar" == field) {
		displayChange_field_tarif_rs_kamar(row, status);
	}
	if ("tarif_rs_rawat_intensif" == field) {
		displayChange_field_tarif_rs_rawat_intensif(row, status);
	}
	if ("tarif_rs_obat" == field) {
		displayChange_field_tarif_rs_obat(row, status);
	}
	if ("tarif_rs_alkes" == field) {
		displayChange_field_tarif_rs_alkes(row, status);
	}
	if ("tarif_rs_bmhp" == field) {
		displayChange_field_tarif_rs_bmhp(row, status);
	}
	if ("tarif_rs_sewa_alat" == field) {
		displayChange_field_tarif_rs_sewa_alat(row, status);
	}
	if ("tarif_poli_eks" == field) {
		displayChange_field_tarif_poli_eks(row, status);
	}
	if ("nama_dokter" == field) {
		displayChange_field_nama_dokter(row, status);
	}
	if ("kode_tarif" == field) {
		displayChange_field_kode_tarif(row, status);
	}
	if ("payor_id" == field) {
		displayChange_field_payor_id(row, status);
	}
	if ("payor_cd" == field) {
		displayChange_field_payor_cd(row, status);
	}
	if ("cob_cd" == field) {
		displayChange_field_cob_cd(row, status);
	}
}

function displayChange_field_nomor_sep(row, status) {
}

function displayChange_field_nomor_kartu(row, status) {
}

function displayChange_field_tgl_masuk(row, status) {
}

function displayChange_field_tgl_pulang(row, status) {
}

function displayChange_field_jenis_rawat(row, status) {
}

function displayChange_field_kelas_rawat(row, status) {
}

function displayChange_field_adl_sub_acute(row, status) {
}

function displayChange_field_adl_chronic(row, status) {
}

function displayChange_field_icu_indikator(row, status) {
}

function displayChange_field_icu_los(row, status) {
}

function displayChange_field_ventilator_hour(row, status) {
}

function displayChange_field_upgrade_class_ind(row, status) {
}

function displayChange_field_upgrade_class_class(row, status) {
}

function displayChange_field_upgrade_class_los(row, status) {
}

function displayChange_field_add_payment_pct(row, status) {
}

function displayChange_field_birth_weight(row, status) {
}

function displayChange_field_discharge_status(row, status) {
}

function displayChange_field_diagnosa(row, status) {
}

function displayChange_field_procedure(row, status) {
}

function displayChange_field_tarif_rs_prosedur_non_bedah(row, status) {
}

function displayChange_field_tarif_rs_prosedur_bedah(row, status) {
}

function displayChange_field_tarif_rs_konsultasi(row, status) {
}

function displayChange_field_tarif_rs_tenaga_ahli(row, status) {
}

function displayChange_field_tarif_rs_keperawatan(row, status) {
}

function displayChange_field_tarif_rs_penunjang(row, status) {
}

function displayChange_field_tarif_rs_radiologi(row, status) {
}

function displayChange_field_tarif_rs_laboratorium(row, status) {
}

function displayChange_field_tarif_rs_pelayanan_darah(row, status) {
}

function displayChange_field_tarif_rs_rehabilitasi(row, status) {
}

function displayChange_field_tarif_rs_kamar(row, status) {
}

function displayChange_field_tarif_rs_rawat_intensif(row, status) {
}

function displayChange_field_tarif_rs_obat(row, status) {
}

function displayChange_field_tarif_rs_alkes(row, status) {
}

function displayChange_field_tarif_rs_bmhp(row, status) {
}

function displayChange_field_tarif_rs_sewa_alat(row, status) {
}

function displayChange_field_tarif_poli_eks(row, status) {
}

function displayChange_field_nama_dokter(row, status) {
}

function displayChange_field_kode_tarif(row, status) {
}

function displayChange_field_payor_id(row, status) {
}

function displayChange_field_payor_cd(row, status) {
}

function displayChange_field_cob_cd(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_eclaim_klaim_update_data_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(37);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_tgl_masuk" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_tgl_masuk" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['tgl_masuk']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['tgl_masuk']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_eclaim_klaim_update_data_validate_tgl_masuk(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['tgl_masuk']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_tgl_pulang" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_tgl_pulang" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['tgl_pulang']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['tgl_pulang']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_eclaim_klaim_update_data_validate_tgl_pulang(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['tgl_pulang']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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

