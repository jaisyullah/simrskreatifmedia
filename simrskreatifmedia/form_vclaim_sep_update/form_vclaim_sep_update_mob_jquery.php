
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
  scEventControl_data["nokartu" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nama" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nik" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["keterangan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sex" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["umursaatpelayanan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kodehakkelas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["keteranganhakkelas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kodejenispeserta" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["keteranganjenispeserta" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kdprovider" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nmprovider" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tglcetakkartu" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tgltat" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tgltmt" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nosep" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tglsep" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ppkpelayanan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nmppkpelayanan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jnspelayanan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["klsrawat" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nomr" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["asalrujukan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["norujukan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tglrujukan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ppkrujukan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nmppkrujukan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["catatan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["diagawal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nmdiagawal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["politujuan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nmpolitujuan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["polieksekutif" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cob" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kejadianlakalantas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["penjaminlakalantas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["lokasilakalantas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["notelp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["user" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["nokartu" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nokartu" + iSeqRow]["change"]) {
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
  if (scEventControl_data["keterangan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["keterangan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sex" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sex" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["umursaatpelayanan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["umursaatpelayanan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kodehakkelas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kodehakkelas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["keteranganhakkelas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["keteranganhakkelas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kodejenispeserta" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kodejenispeserta" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["keteranganjenispeserta" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["keteranganjenispeserta" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kdprovider" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kdprovider" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nmprovider" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nmprovider" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tglcetakkartu" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tglcetakkartu" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tgltat" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tgltat" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tgltmt" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tgltmt" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nosep" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nosep" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tglsep" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tglsep" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ppkpelayanan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ppkpelayanan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nmppkpelayanan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nmppkpelayanan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jnspelayanan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jnspelayanan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["klsrawat" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["klsrawat" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nomr" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nomr" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["asalrujukan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["asalrujukan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["norujukan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["norujukan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tglrujukan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tglrujukan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ppkrujukan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ppkrujukan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nmppkrujukan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nmppkrujukan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["catatan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["catatan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["diagawal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["diagawal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nmdiagawal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nmdiagawal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["politujuan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["politujuan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nmpolitujuan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nmpolitujuan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["polieksekutif" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["polieksekutif" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cob" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cob" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kejadianlakalantas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kejadianlakalantas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["penjaminlakalantas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["penjaminlakalantas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["lokasilakalantas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["lokasilakalantas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["notelp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["notelp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["user" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["user" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("jnspelayanan" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("klsrawat" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("asalrujukan" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("polieksekutif" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("cob" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("kejadianlakalantas" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("penjaminlakalantas" + iSeq == fieldName) {
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
  $('#id_sc_field_nokartu' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_nokartu_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_vclaim_sep_update_nokartu_onfocus(this, iSeqRow) });
  $('#id_sc_field_nama' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_nama_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_vclaim_sep_update_nama_onfocus(this, iSeqRow) });
  $('#id_sc_field_nik' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_nik_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_vclaim_sep_update_nik_onfocus(this, iSeqRow) });
  $('#id_sc_field_keterangan' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_keterangan_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_vclaim_sep_update_keterangan_onfocus(this, iSeqRow) });
  $('#id_sc_field_sex' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_sex_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_vclaim_sep_update_sex_onfocus(this, iSeqRow) });
  $('#id_sc_field_umursaatpelayanan' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_umursaatpelayanan_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_vclaim_sep_update_umursaatpelayanan_onfocus(this, iSeqRow) });
  $('#id_sc_field_kodehakkelas' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_kodehakkelas_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_vclaim_sep_update_kodehakkelas_onfocus(this, iSeqRow) });
  $('#id_sc_field_keteranganhakkelas' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_keteranganhakkelas_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_vclaim_sep_update_keteranganhakkelas_onfocus(this, iSeqRow) });
  $('#id_sc_field_kodejenispeserta' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_kodejenispeserta_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_vclaim_sep_update_kodejenispeserta_onfocus(this, iSeqRow) });
  $('#id_sc_field_keteranganjenispeserta' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_keteranganjenispeserta_onblur(this, iSeqRow) })
                                                    .bind('focus', function() { sc_form_vclaim_sep_update_keteranganjenispeserta_onfocus(this, iSeqRow) });
  $('#id_sc_field_kdprovider' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_kdprovider_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_vclaim_sep_update_kdprovider_onfocus(this, iSeqRow) });
  $('#id_sc_field_nmprovider' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_nmprovider_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_vclaim_sep_update_nmprovider_onfocus(this, iSeqRow) });
  $('#id_sc_field_tglcetakkartu' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_tglcetakkartu_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_vclaim_sep_update_tglcetakkartu_onfocus(this, iSeqRow) });
  $('#id_sc_field_tgltat' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_tgltat_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_vclaim_sep_update_tgltat_onfocus(this, iSeqRow) });
  $('#id_sc_field_tgltmt' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_tgltmt_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_vclaim_sep_update_tgltmt_onfocus(this, iSeqRow) });
  $('#id_sc_field_tglsep' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_tglsep_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_vclaim_sep_update_tglsep_onfocus(this, iSeqRow) });
  $('#id_sc_field_ppkpelayanan' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_ppkpelayanan_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_vclaim_sep_update_ppkpelayanan_onfocus(this, iSeqRow) });
  $('#id_sc_field_jnspelayanan' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_jnspelayanan_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_vclaim_sep_update_jnspelayanan_onfocus(this, iSeqRow) });
  $('#id_sc_field_klsrawat' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_klsrawat_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_vclaim_sep_update_klsrawat_onfocus(this, iSeqRow) });
  $('#id_sc_field_nomr' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_nomr_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_vclaim_sep_update_nomr_onfocus(this, iSeqRow) });
  $('#id_sc_field_asalrujukan' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_asalrujukan_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_vclaim_sep_update_asalrujukan_onfocus(this, iSeqRow) });
  $('#id_sc_field_tglrujukan' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_tglrujukan_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_vclaim_sep_update_tglrujukan_onfocus(this, iSeqRow) });
  $('#id_sc_field_norujukan' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_norujukan_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_vclaim_sep_update_norujukan_onfocus(this, iSeqRow) });
  $('#id_sc_field_ppkrujukan' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_ppkrujukan_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_vclaim_sep_update_ppkrujukan_onfocus(this, iSeqRow) });
  $('#id_sc_field_catatan' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_catatan_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_vclaim_sep_update_catatan_onfocus(this, iSeqRow) });
  $('#id_sc_field_diagawal' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_diagawal_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_vclaim_sep_update_diagawal_onfocus(this, iSeqRow) });
  $('#id_sc_field_politujuan' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_politujuan_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_vclaim_sep_update_politujuan_onfocus(this, iSeqRow) });
  $('#id_sc_field_polieksekutif' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_polieksekutif_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_vclaim_sep_update_polieksekutif_onfocus(this, iSeqRow) });
  $('#id_sc_field_cob' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_cob_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_vclaim_sep_update_cob_onfocus(this, iSeqRow) });
  $('#id_sc_field_kejadianlakalantas' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_kejadianlakalantas_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_vclaim_sep_update_kejadianlakalantas_onfocus(this, iSeqRow) });
  $('#id_sc_field_penjaminlakalantas' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_penjaminlakalantas_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_vclaim_sep_update_penjaminlakalantas_onfocus(this, iSeqRow) });
  $('#id_sc_field_lokasilakalantas' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_lokasilakalantas_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_vclaim_sep_update_lokasilakalantas_onfocus(this, iSeqRow) });
  $('#id_sc_field_notelp' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_notelp_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_vclaim_sep_update_notelp_onfocus(this, iSeqRow) });
  $('#id_sc_field_user' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_user_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_vclaim_sep_update_user_onfocus(this, iSeqRow) });
  $('#id_sc_field_nmppkpelayanan' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_nmppkpelayanan_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_vclaim_sep_update_nmppkpelayanan_onfocus(this, iSeqRow) });
  $('#id_sc_field_nmppkrujukan' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_nmppkrujukan_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_vclaim_sep_update_nmppkrujukan_onfocus(this, iSeqRow) });
  $('#id_sc_field_nmdiagawal' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_nmdiagawal_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_vclaim_sep_update_nmdiagawal_onfocus(this, iSeqRow) });
  $('#id_sc_field_nmpolitujuan' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_nmpolitujuan_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_vclaim_sep_update_nmpolitujuan_onfocus(this, iSeqRow) });
  $('#id_sc_field_nosep' + iSeqRow).bind('blur', function() { sc_form_vclaim_sep_update_nosep_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_vclaim_sep_update_nosep_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_vclaim_sep_update_nokartu_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_nokartu();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_nokartu_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_nama_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_nama();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_nama_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_nik_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_nik();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_nik_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_keterangan_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_keterangan();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_keterangan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_sex_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_sex();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_sex_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_umursaatpelayanan_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_umursaatpelayanan();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_umursaatpelayanan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_kodehakkelas_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_kodehakkelas();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_kodehakkelas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_keteranganhakkelas_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_keteranganhakkelas();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_keteranganhakkelas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_kodejenispeserta_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_kodejenispeserta();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_kodejenispeserta_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_keteranganjenispeserta_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_keteranganjenispeserta();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_keteranganjenispeserta_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_kdprovider_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_kdprovider();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_kdprovider_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_nmprovider_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_nmprovider();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_nmprovider_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_tglcetakkartu_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_tglcetakkartu();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_tglcetakkartu_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_tgltat_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_tgltat();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_tgltat_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_tgltmt_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_tgltmt();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_tgltmt_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_tglsep_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_tglsep();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_tglsep_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_ppkpelayanan_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_ppkpelayanan();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_ppkpelayanan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_jnspelayanan_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_jnspelayanan();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_jnspelayanan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_klsrawat_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_klsrawat();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_klsrawat_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_nomr_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_nomr();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_nomr_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_asalrujukan_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_asalrujukan();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_asalrujukan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_tglrujukan_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_tglrujukan();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_tglrujukan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_norujukan_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_norujukan();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_norujukan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_ppkrujukan_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_ppkrujukan();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_ppkrujukan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_catatan_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_catatan();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_catatan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_diagawal_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_diagawal();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_diagawal_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_politujuan_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_politujuan();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_politujuan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_polieksekutif_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_polieksekutif();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_polieksekutif_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_cob_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_cob();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_cob_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_kejadianlakalantas_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_kejadianlakalantas();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_kejadianlakalantas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_penjaminlakalantas_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_penjaminlakalantas();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_penjaminlakalantas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_lokasilakalantas_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_lokasilakalantas();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_lokasilakalantas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_notelp_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_notelp();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_notelp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_user_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_user();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_user_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_nmppkpelayanan_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_nmppkpelayanan();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_nmppkpelayanan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_nmppkrujukan_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_nmppkrujukan();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_nmppkrujukan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_nmdiagawal_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_nmdiagawal();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_nmdiagawal_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_nmpolitujuan_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_nmpolitujuan();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_nmpolitujuan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_sep_update_nosep_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_sep_update_mob_validate_nosep();
  scCssBlur(oThis);
}

function sc_form_vclaim_sep_update_nosep_onfocus(oThis, iSeqRow) {
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
}

function displayChange_block_0(status) {
	displayChange_field("nokartu", "", status);
	displayChange_field("nama", "", status);
	displayChange_field("nik", "", status);
	displayChange_field("keterangan", "", status);
	displayChange_field("sex", "", status);
	displayChange_field("umursaatpelayanan", "", status);
	displayChange_field("kodehakkelas", "", status);
	displayChange_field("keteranganhakkelas", "", status);
	displayChange_field("kodejenispeserta", "", status);
	displayChange_field("keteranganjenispeserta", "", status);
	displayChange_field("kdprovider", "", status);
	displayChange_field("nmprovider", "", status);
	displayChange_field("tglcetakkartu", "", status);
	displayChange_field("tgltat", "", status);
	displayChange_field("tgltmt", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("nosep", "", status);
	displayChange_field("tglsep", "", status);
	displayChange_field("ppkpelayanan", "", status);
	displayChange_field("nmppkpelayanan", "", status);
	displayChange_field("jnspelayanan", "", status);
	displayChange_field("klsrawat", "", status);
	displayChange_field("nomr", "", status);
	displayChange_field("asalrujukan", "", status);
	displayChange_field("norujukan", "", status);
	displayChange_field("tglrujukan", "", status);
	displayChange_field("ppkrujukan", "", status);
	displayChange_field("nmppkrujukan", "", status);
	displayChange_field("catatan", "", status);
	displayChange_field("diagawal", "", status);
	displayChange_field("nmdiagawal", "", status);
	displayChange_field("politujuan", "", status);
	displayChange_field("nmpolitujuan", "", status);
	displayChange_field("polieksekutif", "", status);
	displayChange_field("cob", "", status);
	displayChange_field("kejadianlakalantas", "", status);
	displayChange_field("penjaminlakalantas", "", status);
	displayChange_field("lokasilakalantas", "", status);
	displayChange_field("notelp", "", status);
	displayChange_field("user", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_nokartu(row, status);
	displayChange_field_nama(row, status);
	displayChange_field_nik(row, status);
	displayChange_field_keterangan(row, status);
	displayChange_field_sex(row, status);
	displayChange_field_umursaatpelayanan(row, status);
	displayChange_field_kodehakkelas(row, status);
	displayChange_field_keteranganhakkelas(row, status);
	displayChange_field_kodejenispeserta(row, status);
	displayChange_field_keteranganjenispeserta(row, status);
	displayChange_field_kdprovider(row, status);
	displayChange_field_nmprovider(row, status);
	displayChange_field_tglcetakkartu(row, status);
	displayChange_field_tgltat(row, status);
	displayChange_field_tgltmt(row, status);
	displayChange_field_nosep(row, status);
	displayChange_field_tglsep(row, status);
	displayChange_field_ppkpelayanan(row, status);
	displayChange_field_nmppkpelayanan(row, status);
	displayChange_field_jnspelayanan(row, status);
	displayChange_field_klsrawat(row, status);
	displayChange_field_nomr(row, status);
	displayChange_field_asalrujukan(row, status);
	displayChange_field_norujukan(row, status);
	displayChange_field_tglrujukan(row, status);
	displayChange_field_ppkrujukan(row, status);
	displayChange_field_nmppkrujukan(row, status);
	displayChange_field_catatan(row, status);
	displayChange_field_diagawal(row, status);
	displayChange_field_nmdiagawal(row, status);
	displayChange_field_politujuan(row, status);
	displayChange_field_nmpolitujuan(row, status);
	displayChange_field_polieksekutif(row, status);
	displayChange_field_cob(row, status);
	displayChange_field_kejadianlakalantas(row, status);
	displayChange_field_penjaminlakalantas(row, status);
	displayChange_field_lokasilakalantas(row, status);
	displayChange_field_notelp(row, status);
	displayChange_field_user(row, status);
}

function displayChange_field(field, row, status) {
	if ("nokartu" == field) {
		displayChange_field_nokartu(row, status);
	}
	if ("nama" == field) {
		displayChange_field_nama(row, status);
	}
	if ("nik" == field) {
		displayChange_field_nik(row, status);
	}
	if ("keterangan" == field) {
		displayChange_field_keterangan(row, status);
	}
	if ("sex" == field) {
		displayChange_field_sex(row, status);
	}
	if ("umursaatpelayanan" == field) {
		displayChange_field_umursaatpelayanan(row, status);
	}
	if ("kodehakkelas" == field) {
		displayChange_field_kodehakkelas(row, status);
	}
	if ("keteranganhakkelas" == field) {
		displayChange_field_keteranganhakkelas(row, status);
	}
	if ("kodejenispeserta" == field) {
		displayChange_field_kodejenispeserta(row, status);
	}
	if ("keteranganjenispeserta" == field) {
		displayChange_field_keteranganjenispeserta(row, status);
	}
	if ("kdprovider" == field) {
		displayChange_field_kdprovider(row, status);
	}
	if ("nmprovider" == field) {
		displayChange_field_nmprovider(row, status);
	}
	if ("tglcetakkartu" == field) {
		displayChange_field_tglcetakkartu(row, status);
	}
	if ("tgltat" == field) {
		displayChange_field_tgltat(row, status);
	}
	if ("tgltmt" == field) {
		displayChange_field_tgltmt(row, status);
	}
	if ("nosep" == field) {
		displayChange_field_nosep(row, status);
	}
	if ("tglsep" == field) {
		displayChange_field_tglsep(row, status);
	}
	if ("ppkpelayanan" == field) {
		displayChange_field_ppkpelayanan(row, status);
	}
	if ("nmppkpelayanan" == field) {
		displayChange_field_nmppkpelayanan(row, status);
	}
	if ("jnspelayanan" == field) {
		displayChange_field_jnspelayanan(row, status);
	}
	if ("klsrawat" == field) {
		displayChange_field_klsrawat(row, status);
	}
	if ("nomr" == field) {
		displayChange_field_nomr(row, status);
	}
	if ("asalrujukan" == field) {
		displayChange_field_asalrujukan(row, status);
	}
	if ("norujukan" == field) {
		displayChange_field_norujukan(row, status);
	}
	if ("tglrujukan" == field) {
		displayChange_field_tglrujukan(row, status);
	}
	if ("ppkrujukan" == field) {
		displayChange_field_ppkrujukan(row, status);
	}
	if ("nmppkrujukan" == field) {
		displayChange_field_nmppkrujukan(row, status);
	}
	if ("catatan" == field) {
		displayChange_field_catatan(row, status);
	}
	if ("diagawal" == field) {
		displayChange_field_diagawal(row, status);
	}
	if ("nmdiagawal" == field) {
		displayChange_field_nmdiagawal(row, status);
	}
	if ("politujuan" == field) {
		displayChange_field_politujuan(row, status);
	}
	if ("nmpolitujuan" == field) {
		displayChange_field_nmpolitujuan(row, status);
	}
	if ("polieksekutif" == field) {
		displayChange_field_polieksekutif(row, status);
	}
	if ("cob" == field) {
		displayChange_field_cob(row, status);
	}
	if ("kejadianlakalantas" == field) {
		displayChange_field_kejadianlakalantas(row, status);
	}
	if ("penjaminlakalantas" == field) {
		displayChange_field_penjaminlakalantas(row, status);
	}
	if ("lokasilakalantas" == field) {
		displayChange_field_lokasilakalantas(row, status);
	}
	if ("notelp" == field) {
		displayChange_field_notelp(row, status);
	}
	if ("user" == field) {
		displayChange_field_user(row, status);
	}
}

function displayChange_field_nokartu(row, status) {
}

function displayChange_field_nama(row, status) {
}

function displayChange_field_nik(row, status) {
}

function displayChange_field_keterangan(row, status) {
}

function displayChange_field_sex(row, status) {
}

function displayChange_field_umursaatpelayanan(row, status) {
}

function displayChange_field_kodehakkelas(row, status) {
}

function displayChange_field_keteranganhakkelas(row, status) {
}

function displayChange_field_kodejenispeserta(row, status) {
}

function displayChange_field_keteranganjenispeserta(row, status) {
}

function displayChange_field_kdprovider(row, status) {
}

function displayChange_field_nmprovider(row, status) {
}

function displayChange_field_tglcetakkartu(row, status) {
}

function displayChange_field_tgltat(row, status) {
}

function displayChange_field_tgltmt(row, status) {
}

function displayChange_field_nosep(row, status) {
}

function displayChange_field_tglsep(row, status) {
}

function displayChange_field_ppkpelayanan(row, status) {
}

function displayChange_field_nmppkpelayanan(row, status) {
}

function displayChange_field_jnspelayanan(row, status) {
}

function displayChange_field_klsrawat(row, status) {
}

function displayChange_field_nomr(row, status) {
}

function displayChange_field_asalrujukan(row, status) {
}

function displayChange_field_norujukan(row, status) {
}

function displayChange_field_tglrujukan(row, status) {
}

function displayChange_field_ppkrujukan(row, status) {
}

function displayChange_field_nmppkrujukan(row, status) {
}

function displayChange_field_catatan(row, status) {
}

function displayChange_field_diagawal(row, status) {
}

function displayChange_field_nmdiagawal(row, status) {
}

function displayChange_field_politujuan(row, status) {
}

function displayChange_field_nmpolitujuan(row, status) {
}

function displayChange_field_polieksekutif(row, status) {
}

function displayChange_field_cob(row, status) {
}

function displayChange_field_kejadianlakalantas(row, status) {
}

function displayChange_field_penjaminlakalantas(row, status) {
}

function displayChange_field_lokasilakalantas(row, status) {
}

function displayChange_field_notelp(row, status) {
}

function displayChange_field_user(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_vclaim_sep_update_mob_form" + pageNo).hide();
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
  $("#id_sc_field_tglsep" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_tglsep" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_vclaim_sep_update_mob_validate_tglsep(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['tglsep']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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

