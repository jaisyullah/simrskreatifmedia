
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
  scEventControl_data["trancode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dokter" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["custcode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["alamat" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kontak" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ruanginap" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["diagnosa1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["icd1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["diagnosa2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["icd2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["diet" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dietary" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["selesai" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tglkeluar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["carakeluar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["alasankeluar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nostruk" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fisik" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tindakan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["resep" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["bhp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_0" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["icd9cm" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["soap" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["trancode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["trancode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dokter" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dokter" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["custcode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["custcode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["alamat" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["alamat" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kontak" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kontak" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ruanginap" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ruanginap" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["diagnosa1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["diagnosa1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["icd1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["icd1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["diagnosa2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["diagnosa2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["icd2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["icd2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["diet" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["diet" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dietary" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dietary" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["selesai" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["selesai" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tglkeluar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tglkeluar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["carakeluar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["carakeluar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["alasankeluar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["alasankeluar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nostruk" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nostruk" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fisik" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fisik" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tindakan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tindakan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["resep" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["resep" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["bhp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["bhp" + iSeqRow]["change"]) {
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
  if (scEventControl_data["icd9cm" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["icd9cm" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["soap" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["soap" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["icd1" + iSeqRow]["autocomp"]) {
    return true;
  }
  if (scEventControl_data["icd2" + iSeqRow]["autocomp"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("dokter" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("custcode" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("sc_field_2" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("kontak" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("ruanginap" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("selesai" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("carakeluar" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("selesai" + iSeq == fieldName) {
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

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_trancode' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatinap_trancode_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_tbdetailrawatinap_trancode_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbdetailrawatinap_trancode_onfocus(this, iSeqRow) });
  $('#id_sc_field_dokter' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatinap_dokter_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbdetailrawatinap_dokter_onfocus(this, iSeqRow) });
  $('#id_sc_field_selesai' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatinap_selesai_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_tbdetailrawatinap_selesai_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbdetailrawatinap_selesai_onfocus(this, iSeqRow) });
  $('#id_sc_field_tglkeluar' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatinap_tglkeluar_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbdetailrawatinap_tglkeluar_onfocus(this, iSeqRow) });
  $('#id_sc_field_tglkeluar_hora' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatinap_tglkeluar_hora_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_tbdetailrawatinap_tglkeluar_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_carakeluar' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatinap_carakeluar_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbdetailrawatinap_carakeluar_onfocus(this, iSeqRow) });
  $('#id_sc_field_alasankeluar' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatinap_alasankeluar_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tbdetailrawatinap_alasankeluar_onfocus(this, iSeqRow) });
  $('#id_sc_field_custcode' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatinap_custcode_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_tbdetailrawatinap_custcode_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbdetailrawatinap_custcode_onfocus(this, iSeqRow) });
  $('#id_sc_field_nostruk' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatinap_nostruk_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbdetailrawatinap_nostruk_onfocus(this, iSeqRow) });
  $('#id_sc_field_diagnosa1' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatinap_diagnosa1_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbdetailrawatinap_diagnosa1_onfocus(this, iSeqRow) });
  $('#id_sc_field_diagnosa2' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatinap_diagnosa2_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbdetailrawatinap_diagnosa2_onfocus(this, iSeqRow) });
  $('#id_sc_field_icd1' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatinap_icd1_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tbdetailrawatinap_icd1_onfocus(this, iSeqRow) });
  $('#id_sc_field_icd2' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatinap_icd2_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tbdetailrawatinap_icd2_onfocus(this, iSeqRow) });
  $('#id_sc_field_diet' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatinap_diet_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tbdetailrawatinap_diet_onfocus(this, iSeqRow) });
  $('#id_sc_field_dietary' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatinap_dietary_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbdetailrawatinap_dietary_onfocus(this, iSeqRow) });
  $('#id_sc_field_bhp' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatinap_bhp_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tbdetailrawatinap_bhp_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_0' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatinap_sc_field_0_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbdetailrawatinap_sc_field_0_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_1' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatinap_sc_field_1_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbdetailrawatinap_sc_field_1_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_2' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatinap_sc_field_2_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbdetailrawatinap_sc_field_2_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_3' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatinap_sc_field_3_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbdetailrawatinap_sc_field_3_onfocus(this, iSeqRow) });
  $('#id_sc_field_fisik' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatinap_fisik_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbdetailrawatinap_fisik_onfocus(this, iSeqRow) });
  $('#id_sc_field_icd9cm' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatinap_icd9cm_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbdetailrawatinap_icd9cm_onfocus(this, iSeqRow) });
  $('#id_sc_field_resep' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatinap_resep_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbdetailrawatinap_resep_onfocus(this, iSeqRow) });
  $('#id_sc_field_ruanginap' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatinap_ruanginap_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbdetailrawatinap_ruanginap_onfocus(this, iSeqRow) });
  $('#id_sc_field_soap' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatinap_soap_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tbdetailrawatinap_soap_onfocus(this, iSeqRow) });
  $('#id_sc_field_tindakan' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatinap_tindakan_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbdetailrawatinap_tindakan_onfocus(this, iSeqRow) });
  $('#id_sc_field_alamat' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatinap_alamat_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbdetailrawatinap_alamat_onfocus(this, iSeqRow) });
  $('#id_sc_field_kontak' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatinap_kontak_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbdetailrawatinap_kontak_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbdetailrawatinap_trancode_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatinap_validate_trancode();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatinap_trancode_onchange(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatinap_refresh_trancode();
}

function sc_form_tbdetailrawatinap_trancode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatinap_dokter_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatinap_validate_dokter();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatinap_dokter_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatinap_selesai_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatinap_validate_selesai();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatinap_selesai_onchange(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatinap_event_selesai_onchange();
}

function sc_form_tbdetailrawatinap_selesai_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatinap_tglkeluar_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatinap_validate_tglkeluar();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatinap_tglkeluar_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatinap_validate_tglkeluar();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatinap_tglkeluar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatinap_tglkeluar_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatinap_carakeluar_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatinap_validate_carakeluar();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatinap_carakeluar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatinap_alasankeluar_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatinap_validate_alasankeluar();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatinap_alasankeluar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatinap_custcode_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatinap_validate_custcode();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatinap_custcode_onchange(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatinap_refresh_custcode();
}

function sc_form_tbdetailrawatinap_custcode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatinap_nostruk_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatinap_validate_nostruk();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatinap_nostruk_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatinap_diagnosa1_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatinap_validate_diagnosa1();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatinap_diagnosa1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatinap_diagnosa2_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatinap_validate_diagnosa2();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatinap_diagnosa2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatinap_icd1_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatinap_validate_icd1();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatinap_icd1_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatinap_icd2_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatinap_validate_icd2();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatinap_icd2_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatinap_diet_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatinap_validate_diet();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatinap_diet_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatinap_dietary_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatinap_validate_dietary();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatinap_dietary_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatinap_bhp_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatinap_validate_bhp();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatinap_bhp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatinap_sc_field_0_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatinap_validate_sc_field_0();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatinap_sc_field_0_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatinap_sc_field_1_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatinap_validate_sc_field_1();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatinap_sc_field_1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatinap_sc_field_2_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatinap_validate_sc_field_2();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatinap_sc_field_2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatinap_sc_field_3_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatinap_validate_sc_field_3();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatinap_sc_field_3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatinap_fisik_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatinap_validate_fisik();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatinap_fisik_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatinap_icd9cm_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatinap_validate_icd9cm();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatinap_icd9cm_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatinap_resep_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatinap_validate_resep();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatinap_resep_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatinap_ruanginap_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatinap_validate_ruanginap();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatinap_ruanginap_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatinap_soap_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatinap_validate_soap();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatinap_soap_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatinap_tindakan_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatinap_validate_tindakan();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatinap_tindakan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatinap_alamat_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatinap_validate_alamat();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatinap_alamat_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatinap_kontak_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatinap_validate_kontak();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatinap_kontak_onfocus(oThis, iSeqRow) {
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
}

function displayChange_block_0(status) {
	displayChange_field("trancode", "", status);
	displayChange_field("dokter", "", status);
	displayChange_field("custcode", "", status);
	displayChange_field("sc_field_2", "", status);
	displayChange_field("alamat", "", status);
	displayChange_field("kontak", "", status);
	displayChange_field("ruanginap", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("diagnosa1", "", status);
	displayChange_field("icd1", "", status);
	displayChange_field("diagnosa2", "", status);
	displayChange_field("icd2", "", status);
	displayChange_field("diet", "", status);
	displayChange_field("dietary", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("selesai", "", status);
	displayChange_field("tglkeluar", "", status);
	displayChange_field("carakeluar", "", status);
	displayChange_field("alasankeluar", "", status);
	displayChange_field("nostruk", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("fisik", "", status);
}

function displayChange_block_4(status) {
	displayChange_field("tindakan", "", status);
}

function displayChange_block_5(status) {
	displayChange_field("resep", "", status);
}

function displayChange_block_6(status) {
	displayChange_field("bhp", "", status);
}

function displayChange_block_7(status) {
	displayChange_field("sc_field_0", "", status);
	displayChange_field("sc_field_1", "", status);
}

function displayChange_block_8(status) {
	displayChange_field("icd9cm", "", status);
}

function displayChange_block_9(status) {
	displayChange_field("soap", "", status);
}

function displayChange_block_10(status) {
	displayChange_field("sc_field_3", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_trancode(row, status);
	displayChange_field_dokter(row, status);
	displayChange_field_custcode(row, status);
	displayChange_field_sc_field_2(row, status);
	displayChange_field_alamat(row, status);
	displayChange_field_kontak(row, status);
	displayChange_field_ruanginap(row, status);
	displayChange_field_diagnosa1(row, status);
	displayChange_field_icd1(row, status);
	displayChange_field_diagnosa2(row, status);
	displayChange_field_icd2(row, status);
	displayChange_field_diet(row, status);
	displayChange_field_dietary(row, status);
	displayChange_field_selesai(row, status);
	displayChange_field_tglkeluar(row, status);
	displayChange_field_carakeluar(row, status);
	displayChange_field_alasankeluar(row, status);
	displayChange_field_nostruk(row, status);
	displayChange_field_fisik(row, status);
	displayChange_field_tindakan(row, status);
	displayChange_field_resep(row, status);
	displayChange_field_bhp(row, status);
	displayChange_field_sc_field_0(row, status);
	displayChange_field_sc_field_1(row, status);
	displayChange_field_icd9cm(row, status);
	displayChange_field_soap(row, status);
	displayChange_field_sc_field_3(row, status);
}

function displayChange_field(field, row, status) {
	if ("trancode" == field) {
		displayChange_field_trancode(row, status);
	}
	if ("dokter" == field) {
		displayChange_field_dokter(row, status);
	}
	if ("custcode" == field) {
		displayChange_field_custcode(row, status);
	}
	if ("sc_field_2" == field) {
		displayChange_field_sc_field_2(row, status);
	}
	if ("alamat" == field) {
		displayChange_field_alamat(row, status);
	}
	if ("kontak" == field) {
		displayChange_field_kontak(row, status);
	}
	if ("ruanginap" == field) {
		displayChange_field_ruanginap(row, status);
	}
	if ("diagnosa1" == field) {
		displayChange_field_diagnosa1(row, status);
	}
	if ("icd1" == field) {
		displayChange_field_icd1(row, status);
	}
	if ("diagnosa2" == field) {
		displayChange_field_diagnosa2(row, status);
	}
	if ("icd2" == field) {
		displayChange_field_icd2(row, status);
	}
	if ("diet" == field) {
		displayChange_field_diet(row, status);
	}
	if ("dietary" == field) {
		displayChange_field_dietary(row, status);
	}
	if ("selesai" == field) {
		displayChange_field_selesai(row, status);
	}
	if ("tglkeluar" == field) {
		displayChange_field_tglkeluar(row, status);
	}
	if ("carakeluar" == field) {
		displayChange_field_carakeluar(row, status);
	}
	if ("alasankeluar" == field) {
		displayChange_field_alasankeluar(row, status);
	}
	if ("nostruk" == field) {
		displayChange_field_nostruk(row, status);
	}
	if ("fisik" == field) {
		displayChange_field_fisik(row, status);
	}
	if ("tindakan" == field) {
		displayChange_field_tindakan(row, status);
	}
	if ("resep" == field) {
		displayChange_field_resep(row, status);
	}
	if ("bhp" == field) {
		displayChange_field_bhp(row, status);
	}
	if ("sc_field_0" == field) {
		displayChange_field_sc_field_0(row, status);
	}
	if ("sc_field_1" == field) {
		displayChange_field_sc_field_1(row, status);
	}
	if ("icd9cm" == field) {
		displayChange_field_icd9cm(row, status);
	}
	if ("soap" == field) {
		displayChange_field_soap(row, status);
	}
	if ("sc_field_3" == field) {
		displayChange_field_sc_field_3(row, status);
	}
}

function displayChange_field_trancode(row, status) {
}

function displayChange_field_dokter(row, status) {
}

function displayChange_field_custcode(row, status) {
}

function displayChange_field_sc_field_2(row, status) {
}

function displayChange_field_alamat(row, status) {
}

function displayChange_field_kontak(row, status) {
}

function displayChange_field_ruanginap(row, status) {
}

function displayChange_field_diagnosa1(row, status) {
}

function displayChange_field_icd1(row, status) {
}

function displayChange_field_diagnosa2(row, status) {
}

function displayChange_field_icd2(row, status) {
}

function displayChange_field_diet(row, status) {
}

function displayChange_field_dietary(row, status) {
}

function displayChange_field_selesai(row, status) {
}

function displayChange_field_tglkeluar(row, status) {
}

function displayChange_field_carakeluar(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_carakeluar__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_carakeluar" + row).select2("destroy");
		}
		scJQSelect2Add(row, "carakeluar");
	}
}

function displayChange_field_alasankeluar(row, status) {
}

function displayChange_field_nostruk(row, status) {
}

function displayChange_field_fisik(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbfisikrawatinap")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbfisikrawatinap")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_tindakan(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbtindakanrawatinap")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbtindakanrawatinap")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_resep(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_grid_tbreseprawatinap")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_grid_tbreseprawatinap")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_bhp(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbbhprawatinap")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbbhprawatinap")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_sc_field_0(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_pemeriksaanLab_RI")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_pemeriksaanLab_RI")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_sc_field_1(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbhasilrad")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbhasilrad")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_icd9cm(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbicd9cmrawatinap")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbicd9cmrawatinap")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_soap(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbsoaprawatinap")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbsoaprawatinap")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_sc_field_3(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_carakeluar("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbdetailrawatinap_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(30);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_tglkeluar" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_tglkeluar" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['tglkeluar']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("ddmmyyyy", "-"); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_tbdetailrawatinap_validate_tglkeluar(iSeqRow);
    },
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("SU"); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("ddmmyyyy", "-"); ?>",
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
  if (null == specificField || "carakeluar" == specificField) {
    scJQSelect2Add_carakeluar(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_carakeluar(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_carakeluar_obj" : "#id_sc_field_carakeluar" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_carakeluar_obj',
      dropdownCssClass: 'css_carakeluar_obj',
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_carakeluar) { displayChange_field_carakeluar(iLine, "on"); } }, 150);
} // scJQElementsAdd

