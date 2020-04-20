
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
  scEventControl_data["kodekary" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["namalengkap" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tmplahir" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tgllahir" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pendidikan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["agama" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jk" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idno" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["goldar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["npwp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["alamat" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["emgalamat" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["emgnama" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["statustt" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kbm" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fisikbb" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fisiktb" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kacamata" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pidana" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pidanakasus" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kantorspouse" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["photo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["status" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_0" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["keluarga" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["referensi" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_4" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["kodekary" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kodekary" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["namalengkap" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["namalengkap" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tmplahir" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tmplahir" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tgllahir" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tgllahir" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pendidikan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pendidikan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["agama" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["agama" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jk" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jk" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idno" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idno" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["goldar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["goldar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["npwp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["npwp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["alamat" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["alamat" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["emgalamat" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["emgalamat" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["emgnama" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["emgnama" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["statustt" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["statustt" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kbm" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kbm" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fisikbb" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fisikbb" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fisiktb" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fisiktb" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kacamata" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kacamata" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pidana" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pidana" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pidanakasus" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pidanakasus" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kantorspouse" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kantorspouse" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["status" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["status" + iSeqRow]["change"]) {
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
  if (scEventControl_data["sc_field_2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["keluarga" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["keluarga" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["referensi" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["referensi" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_4" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_4" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("pendidikan" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("agama" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("jk" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("goldar" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("statustt" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("kbm" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("kacamata" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("pidana" + iSeq == fieldName) {
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
  $('#id_sc_field_kodekary' + iSeqRow).bind('blur', function() { sc_form_tbhrd_kodekary_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbhrd_kodekary_onfocus(this, iSeqRow) });
  $('#id_sc_field_namalengkap' + iSeqRow).bind('blur', function() { sc_form_tbhrd_namalengkap_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbhrd_namalengkap_onfocus(this, iSeqRow) });
  $('#id_sc_field_tmplahir' + iSeqRow).bind('blur', function() { sc_form_tbhrd_tmplahir_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbhrd_tmplahir_onfocus(this, iSeqRow) });
  $('#id_sc_field_tgllahir' + iSeqRow).bind('blur', function() { sc_form_tbhrd_tgllahir_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbhrd_tgllahir_onfocus(this, iSeqRow) });
  $('#id_sc_field_pendidikan' + iSeqRow).bind('blur', function() { sc_form_tbhrd_pendidikan_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbhrd_pendidikan_onfocus(this, iSeqRow) });
  $('#id_sc_field_agama' + iSeqRow).bind('blur', function() { sc_form_tbhrd_agama_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbhrd_agama_onfocus(this, iSeqRow) });
  $('#id_sc_field_jk' + iSeqRow).bind('blur', function() { sc_form_tbhrd_jk_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_tbhrd_jk_onfocus(this, iSeqRow) });
  $('#id_sc_field_idno' + iSeqRow).bind('blur', function() { sc_form_tbhrd_idno_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tbhrd_idno_onfocus(this, iSeqRow) });
  $('#id_sc_field_goldar' + iSeqRow).bind('blur', function() { sc_form_tbhrd_goldar_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbhrd_goldar_onfocus(this, iSeqRow) });
  $('#id_sc_field_telp' + iSeqRow).bind('blur', function() { sc_form_tbhrd_telp_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tbhrd_telp_onfocus(this, iSeqRow) });
  $('#id_sc_field_npwp' + iSeqRow).bind('blur', function() { sc_form_tbhrd_npwp_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tbhrd_npwp_onfocus(this, iSeqRow) });
  $('#id_sc_field_alamat' + iSeqRow).bind('blur', function() { sc_form_tbhrd_alamat_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbhrd_alamat_onfocus(this, iSeqRow) });
  $('#id_sc_field_emgalamat' + iSeqRow).bind('blur', function() { sc_form_tbhrd_emgalamat_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbhrd_emgalamat_onfocus(this, iSeqRow) });
  $('#id_sc_field_emgnama' + iSeqRow).bind('blur', function() { sc_form_tbhrd_emgnama_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbhrd_emgnama_onfocus(this, iSeqRow) });
  $('#id_sc_field_statustt' + iSeqRow).bind('blur', function() { sc_form_tbhrd_statustt_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbhrd_statustt_onfocus(this, iSeqRow) });
  $('#id_sc_field_kbm' + iSeqRow).bind('blur', function() { sc_form_tbhrd_kbm_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tbhrd_kbm_onfocus(this, iSeqRow) });
  $('#id_sc_field_fisikbb' + iSeqRow).bind('blur', function() { sc_form_tbhrd_fisikbb_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbhrd_fisikbb_onfocus(this, iSeqRow) });
  $('#id_sc_field_fisiktb' + iSeqRow).bind('blur', function() { sc_form_tbhrd_fisiktb_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbhrd_fisiktb_onfocus(this, iSeqRow) });
  $('#id_sc_field_kacamata' + iSeqRow).bind('blur', function() { sc_form_tbhrd_kacamata_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbhrd_kacamata_onfocus(this, iSeqRow) });
  $('#id_sc_field_pidana' + iSeqRow).bind('blur', function() { sc_form_tbhrd_pidana_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbhrd_pidana_onfocus(this, iSeqRow) });
  $('#id_sc_field_pidanakasus' + iSeqRow).bind('blur', function() { sc_form_tbhrd_pidanakasus_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbhrd_pidanakasus_onfocus(this, iSeqRow) });
  $('#id_sc_field_kantorspouse' + iSeqRow).bind('blur', function() { sc_form_tbhrd_kantorspouse_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tbhrd_kantorspouse_onfocus(this, iSeqRow) });
  $('#id_sc_field_photo' + iSeqRow).bind('blur', function() { sc_form_tbhrd_photo_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbhrd_photo_onfocus(this, iSeqRow) });
  $('#id_sc_field_status' + iSeqRow).bind('blur', function() { sc_form_tbhrd_status_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbhrd_status_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_0' + iSeqRow).bind('blur', function() { sc_form_tbhrd_sc_field_0_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbhrd_sc_field_0_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_1' + iSeqRow).bind('blur', function() { sc_form_tbhrd_sc_field_1_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbhrd_sc_field_1_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_2' + iSeqRow).bind('blur', function() { sc_form_tbhrd_sc_field_2_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbhrd_sc_field_2_onfocus(this, iSeqRow) });
  $('#id_sc_field_keluarga' + iSeqRow).bind('blur', function() { sc_form_tbhrd_keluarga_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbhrd_keluarga_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_3' + iSeqRow).bind('blur', function() { sc_form_tbhrd_sc_field_3_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbhrd_sc_field_3_onfocus(this, iSeqRow) });
  $('#id_sc_field_referensi' + iSeqRow).bind('blur', function() { sc_form_tbhrd_referensi_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbhrd_referensi_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_4' + iSeqRow).bind('blur', function() { sc_form_tbhrd_sc_field_4_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbhrd_sc_field_4_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbhrd_kodekary_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrd_validate_kodekary();
  scCssBlur(oThis);
}

function sc_form_tbhrd_kodekary_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhrd_namalengkap_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrd_validate_namalengkap();
  scCssBlur(oThis);
}

function sc_form_tbhrd_namalengkap_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhrd_tmplahir_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrd_validate_tmplahir();
  scCssBlur(oThis);
}

function sc_form_tbhrd_tmplahir_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhrd_tgllahir_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrd_validate_tgllahir();
  scCssBlur(oThis);
}

function sc_form_tbhrd_tgllahir_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhrd_pendidikan_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrd_validate_pendidikan();
  scCssBlur(oThis);
}

function sc_form_tbhrd_pendidikan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhrd_agama_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrd_validate_agama();
  scCssBlur(oThis);
}

function sc_form_tbhrd_agama_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhrd_jk_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrd_validate_jk();
  scCssBlur(oThis);
}

function sc_form_tbhrd_jk_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhrd_idno_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrd_validate_idno();
  scCssBlur(oThis);
}

function sc_form_tbhrd_idno_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhrd_goldar_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrd_validate_goldar();
  scCssBlur(oThis);
}

function sc_form_tbhrd_goldar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhrd_telp_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrd_validate_telp();
  scCssBlur(oThis);
}

function sc_form_tbhrd_telp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhrd_npwp_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrd_validate_npwp();
  scCssBlur(oThis);
}

function sc_form_tbhrd_npwp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhrd_alamat_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrd_validate_alamat();
  scCssBlur(oThis);
}

function sc_form_tbhrd_alamat_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhrd_emgalamat_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrd_validate_emgalamat();
  scCssBlur(oThis);
}

function sc_form_tbhrd_emgalamat_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhrd_emgnama_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrd_validate_emgnama();
  scCssBlur(oThis);
}

function sc_form_tbhrd_emgnama_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhrd_statustt_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrd_validate_statustt();
  scCssBlur(oThis);
}

function sc_form_tbhrd_statustt_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhrd_kbm_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrd_validate_kbm();
  scCssBlur(oThis);
}

function sc_form_tbhrd_kbm_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhrd_fisikbb_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrd_validate_fisikbb();
  scCssBlur(oThis);
}

function sc_form_tbhrd_fisikbb_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhrd_fisiktb_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrd_validate_fisiktb();
  scCssBlur(oThis);
}

function sc_form_tbhrd_fisiktb_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhrd_kacamata_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrd_validate_kacamata();
  scCssBlur(oThis);
}

function sc_form_tbhrd_kacamata_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhrd_pidana_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrd_validate_pidana();
  scCssBlur(oThis);
}

function sc_form_tbhrd_pidana_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhrd_pidanakasus_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrd_validate_pidanakasus();
  scCssBlur(oThis);
}

function sc_form_tbhrd_pidanakasus_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhrd_kantorspouse_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrd_validate_kantorspouse();
  scCssBlur(oThis);
}

function sc_form_tbhrd_kantorspouse_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhrd_photo_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_tbhrd_photo_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_tbhrd_status_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrd_validate_status();
  scCssBlur(oThis);
}

function sc_form_tbhrd_status_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhrd_sc_field_0_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrd_validate_sc_field_0();
  scCssBlur(oThis);
}

function sc_form_tbhrd_sc_field_0_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhrd_sc_field_1_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrd_validate_sc_field_1();
  scCssBlur(oThis);
}

function sc_form_tbhrd_sc_field_1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhrd_sc_field_2_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrd_validate_sc_field_2();
  scCssBlur(oThis);
}

function sc_form_tbhrd_sc_field_2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhrd_keluarga_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrd_validate_keluarga();
  scCssBlur(oThis);
}

function sc_form_tbhrd_keluarga_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhrd_sc_field_3_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrd_validate_sc_field_3();
  scCssBlur(oThis);
}

function sc_form_tbhrd_sc_field_3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhrd_referensi_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrd_validate_referensi();
  scCssBlur(oThis);
}

function sc_form_tbhrd_referensi_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhrd_sc_field_4_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhrd_validate_sc_field_4();
  scCssBlur(oThis);
}

function sc_form_tbhrd_sc_field_4_onfocus(oThis, iSeqRow) {
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
}

function displayChange_block_0(status) {
	displayChange_field("kodekary", "", status);
	displayChange_field("namalengkap", "", status);
	displayChange_field("tmplahir", "", status);
	displayChange_field("tgllahir", "", status);
	displayChange_field("pendidikan", "", status);
	displayChange_field("agama", "", status);
	displayChange_field("jk", "", status);
	displayChange_field("idno", "", status);
	displayChange_field("goldar", "", status);
	displayChange_field("telp", "", status);
	displayChange_field("npwp", "", status);
	displayChange_field("alamat", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("emgalamat", "", status);
	displayChange_field("emgnama", "", status);
	displayChange_field("statustt", "", status);
	displayChange_field("kbm", "", status);
	displayChange_field("fisikbb", "", status);
	displayChange_field("fisiktb", "", status);
	displayChange_field("kacamata", "", status);
	displayChange_field("pidana", "", status);
	displayChange_field("pidanakasus", "", status);
	displayChange_field("kantorspouse", "", status);
	displayChange_field("photo", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("status", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("sc_field_0", "", status);
}

function displayChange_block_4(status) {
	displayChange_field("sc_field_1", "", status);
}

function displayChange_block_5(status) {
	displayChange_field("sc_field_2", "", status);
}

function displayChange_block_6(status) {
	displayChange_field("keluarga", "", status);
}

function displayChange_block_7(status) {
	displayChange_field("sc_field_3", "", status);
}

function displayChange_block_8(status) {
	displayChange_field("referensi", "", status);
}

function displayChange_block_9(status) {
	displayChange_field("sc_field_4", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_kodekary(row, status);
	displayChange_field_namalengkap(row, status);
	displayChange_field_tmplahir(row, status);
	displayChange_field_tgllahir(row, status);
	displayChange_field_pendidikan(row, status);
	displayChange_field_agama(row, status);
	displayChange_field_jk(row, status);
	displayChange_field_idno(row, status);
	displayChange_field_goldar(row, status);
	displayChange_field_telp(row, status);
	displayChange_field_npwp(row, status);
	displayChange_field_alamat(row, status);
	displayChange_field_emgalamat(row, status);
	displayChange_field_emgnama(row, status);
	displayChange_field_statustt(row, status);
	displayChange_field_kbm(row, status);
	displayChange_field_fisikbb(row, status);
	displayChange_field_fisiktb(row, status);
	displayChange_field_kacamata(row, status);
	displayChange_field_pidana(row, status);
	displayChange_field_pidanakasus(row, status);
	displayChange_field_kantorspouse(row, status);
	displayChange_field_photo(row, status);
	displayChange_field_status(row, status);
	displayChange_field_sc_field_0(row, status);
	displayChange_field_sc_field_1(row, status);
	displayChange_field_sc_field_2(row, status);
	displayChange_field_keluarga(row, status);
	displayChange_field_sc_field_3(row, status);
	displayChange_field_referensi(row, status);
	displayChange_field_sc_field_4(row, status);
}

function displayChange_field(field, row, status) {
	if ("kodekary" == field) {
		displayChange_field_kodekary(row, status);
	}
	if ("namalengkap" == field) {
		displayChange_field_namalengkap(row, status);
	}
	if ("tmplahir" == field) {
		displayChange_field_tmplahir(row, status);
	}
	if ("tgllahir" == field) {
		displayChange_field_tgllahir(row, status);
	}
	if ("pendidikan" == field) {
		displayChange_field_pendidikan(row, status);
	}
	if ("agama" == field) {
		displayChange_field_agama(row, status);
	}
	if ("jk" == field) {
		displayChange_field_jk(row, status);
	}
	if ("idno" == field) {
		displayChange_field_idno(row, status);
	}
	if ("goldar" == field) {
		displayChange_field_goldar(row, status);
	}
	if ("telp" == field) {
		displayChange_field_telp(row, status);
	}
	if ("npwp" == field) {
		displayChange_field_npwp(row, status);
	}
	if ("alamat" == field) {
		displayChange_field_alamat(row, status);
	}
	if ("emgalamat" == field) {
		displayChange_field_emgalamat(row, status);
	}
	if ("emgnama" == field) {
		displayChange_field_emgnama(row, status);
	}
	if ("statustt" == field) {
		displayChange_field_statustt(row, status);
	}
	if ("kbm" == field) {
		displayChange_field_kbm(row, status);
	}
	if ("fisikbb" == field) {
		displayChange_field_fisikbb(row, status);
	}
	if ("fisiktb" == field) {
		displayChange_field_fisiktb(row, status);
	}
	if ("kacamata" == field) {
		displayChange_field_kacamata(row, status);
	}
	if ("pidana" == field) {
		displayChange_field_pidana(row, status);
	}
	if ("pidanakasus" == field) {
		displayChange_field_pidanakasus(row, status);
	}
	if ("kantorspouse" == field) {
		displayChange_field_kantorspouse(row, status);
	}
	if ("photo" == field) {
		displayChange_field_photo(row, status);
	}
	if ("status" == field) {
		displayChange_field_status(row, status);
	}
	if ("sc_field_0" == field) {
		displayChange_field_sc_field_0(row, status);
	}
	if ("sc_field_1" == field) {
		displayChange_field_sc_field_1(row, status);
	}
	if ("sc_field_2" == field) {
		displayChange_field_sc_field_2(row, status);
	}
	if ("keluarga" == field) {
		displayChange_field_keluarga(row, status);
	}
	if ("sc_field_3" == field) {
		displayChange_field_sc_field_3(row, status);
	}
	if ("referensi" == field) {
		displayChange_field_referensi(row, status);
	}
	if ("sc_field_4" == field) {
		displayChange_field_sc_field_4(row, status);
	}
}

function displayChange_field_kodekary(row, status) {
}

function displayChange_field_namalengkap(row, status) {
}

function displayChange_field_tmplahir(row, status) {
}

function displayChange_field_tgllahir(row, status) {
}

function displayChange_field_pendidikan(row, status) {
}

function displayChange_field_agama(row, status) {
}

function displayChange_field_jk(row, status) {
}

function displayChange_field_idno(row, status) {
}

function displayChange_field_goldar(row, status) {
}

function displayChange_field_telp(row, status) {
}

function displayChange_field_npwp(row, status) {
}

function displayChange_field_alamat(row, status) {
}

function displayChange_field_emgalamat(row, status) {
}

function displayChange_field_emgnama(row, status) {
}

function displayChange_field_statustt(row, status) {
}

function displayChange_field_kbm(row, status) {
}

function displayChange_field_fisikbb(row, status) {
}

function displayChange_field_fisiktb(row, status) {
}

function displayChange_field_kacamata(row, status) {
}

function displayChange_field_pidana(row, status) {
}

function displayChange_field_pidanakasus(row, status) {
}

function displayChange_field_kantorspouse(row, status) {
}

function displayChange_field_photo(row, status) {
}

function displayChange_field_status(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbhrdstatus")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbhrdstatus")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_sc_field_0(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbhrdformal")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbhrdformal")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_sc_field_1(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbhrdinformal")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbhrdinformal")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_sc_field_2(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbhrdexp")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbhrdexp")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_keluarga(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbhrdklg")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbhrdklg")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_sc_field_3(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbhrdminat")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbhrdminat")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_referensi(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbhrdref")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbhrdref")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_sc_field_4(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbhrdhope")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbhrdhope")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbhrd_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(18);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_tgllahir" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_tgllahir" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_tbhrd_validate_tgllahir(iSeqRow);
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
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['tgllahir']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_photo" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_tbhrd_ul_save.php",
    dropZone: "",
    formData: function() {
      return [
        {name: 'param_field', value: 'photo'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_photo" + iSeqRow);
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_photo" + iSeqRow);
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
        $("#id_img_loader_photo" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_photo" + iSeqRow).hide();
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
      $("#id_sc_field_photo" + iSeqRow).val("");
      $("#id_sc_field_photo_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_photo_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_photo = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_photo) ? "none" : "";
      $("#id_ajax_img_photo" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_photo" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_photo) {
        document.F1.temp_out_photo.value = var_ajax_img_thumb;
        document.F1.temp_out1_photo.value = var_ajax_img_photo;
      }
      else if (document.F1.temp_out_photo) {
        document.F1.temp_out_photo.value = var_ajax_img_photo;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_photo" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_photo" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_photo" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_photo" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

