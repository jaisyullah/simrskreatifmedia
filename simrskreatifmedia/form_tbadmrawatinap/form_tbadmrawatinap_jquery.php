
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

  if ($oField.length > 0) {
    switch ($oField[0].name) {
      case 'trancode':
      case 'custcode':
      case 'sc_field_0':
      case 'penjamin':
      case 'hubpenjamin':
      case 'status':
      case 'admision':
      case 'tglmasuk':
      case 'doctor':
      case 'kelas':
      case 'bed':
      case 'diagnosa1':
      case 'struckno':
      case 'pembayaran':
      case 'paket':
      case 'provider':
      case 'idprovider':
      case 'caramasuk':
      case 'unitasal':
      case 'perujuk':
      case 'id':
      case 'hotel':
      case 'waitinglist':
        sc_exib_ocult_pag('form_tbadmrawatinap_form0');
        break;
      case 'detailadm':
      case 'detailruang':
        sc_exib_ocult_pag('form_tbadmrawatinap_form1');
        break;
    }
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
  scEventControl_data["custcode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_0" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["penjamin" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hubpenjamin" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["status" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["admision" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tglmasuk" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["doctor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kelas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["bed" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["diagnosa1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["struckno" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pembayaran" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["paket" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["provider" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idprovider" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["caramasuk" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["unitasal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["perujuk" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hotel" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["waitinglist" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detailadm" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detailruang" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["trancode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["trancode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["custcode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["custcode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_0" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_0" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["penjamin" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["penjamin" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hubpenjamin" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hubpenjamin" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["status" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["status" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["admision" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["admision" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tglmasuk" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tglmasuk" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["doctor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["doctor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kelas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kelas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["bed" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["bed" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["diagnosa1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["diagnosa1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["struckno" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["struckno" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pembayaran" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pembayaran" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["paket" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["paket" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["provider" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["provider" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idprovider" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idprovider" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["caramasuk" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["caramasuk" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["unitasal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["unitasal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["perujuk" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["perujuk" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hotel" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hotel" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["waitinglist" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["waitinglist" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detailadm" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detailadm" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detailruang" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detailruang" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["provider" + iSeqRow]["autocomp"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("sc_field_0" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("hubpenjamin" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("status" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("doctor" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("kelas" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("bed" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("pembayaran" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("paket" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("caramasuk" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("unitasal" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("icd2" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("caramasuk" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("custcode" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("pembayaran" + iSeq == fieldName) {
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
  $('#id_sc_field_id' + iSeqRow).bind('blur', function() { sc_form_tbadmrawatinap_id_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_tbadmrawatinap_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_trancode' + iSeqRow).bind('blur', function() { sc_form_tbadmrawatinap_trancode_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbadmrawatinap_trancode_onfocus(this, iSeqRow) });
  $('#id_sc_field_custcode' + iSeqRow).bind('blur', function() { sc_form_tbadmrawatinap_custcode_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_tbadmrawatinap_custcode_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbadmrawatinap_custcode_onfocus(this, iSeqRow) });
  $('#id_sc_field_tglmasuk' + iSeqRow).bind('blur', function() { sc_form_tbadmrawatinap_tglmasuk_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbadmrawatinap_tglmasuk_onfocus(this, iSeqRow) });
  $('#id_sc_field_tglmasuk_hora' + iSeqRow).bind('blur', function() { sc_form_tbadmrawatinap_tglmasuk_hora_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_tbadmrawatinap_tglmasuk_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_pembayaran' + iSeqRow).bind('blur', function() { sc_form_tbadmrawatinap_pembayaran_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_tbadmrawatinap_pembayaran_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbadmrawatinap_pembayaran_onfocus(this, iSeqRow) });
  $('#id_sc_field_kelas' + iSeqRow).bind('blur', function() { sc_form_tbadmrawatinap_kelas_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbadmrawatinap_kelas_onfocus(this, iSeqRow) });
  $('#id_sc_field_bed' + iSeqRow).bind('blur', function() { sc_form_tbadmrawatinap_bed_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tbadmrawatinap_bed_onfocus(this, iSeqRow) });
  $('#id_sc_field_paket' + iSeqRow).bind('blur', function() { sc_form_tbadmrawatinap_paket_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbadmrawatinap_paket_onfocus(this, iSeqRow) });
  $('#id_sc_field_caramasuk' + iSeqRow).bind('blur', function() { sc_form_tbadmrawatinap_caramasuk_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_tbadmrawatinap_caramasuk_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbadmrawatinap_caramasuk_onfocus(this, iSeqRow) });
  $('#id_sc_field_status' + iSeqRow).bind('blur', function() { sc_form_tbadmrawatinap_status_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbadmrawatinap_status_onfocus(this, iSeqRow) });
  $('#id_sc_field_unitasal' + iSeqRow).bind('blur', function() { sc_form_tbadmrawatinap_unitasal_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbadmrawatinap_unitasal_onfocus(this, iSeqRow) });
  $('#id_sc_field_doctor' + iSeqRow).bind('blur', function() { sc_form_tbadmrawatinap_doctor_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbadmrawatinap_doctor_onfocus(this, iSeqRow) });
  $('#id_sc_field_struckno' + iSeqRow).bind('blur', function() { sc_form_tbadmrawatinap_struckno_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbadmrawatinap_struckno_onfocus(this, iSeqRow) });
  $('#id_sc_field_diagnosa1' + iSeqRow).bind('blur', function() { sc_form_tbadmrawatinap_diagnosa1_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbadmrawatinap_diagnosa1_onfocus(this, iSeqRow) });
  $('#id_sc_field_perujuk' + iSeqRow).bind('blur', function() { sc_form_tbadmrawatinap_perujuk_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbadmrawatinap_perujuk_onfocus(this, iSeqRow) });
  $('#id_sc_field_provider' + iSeqRow).bind('blur', function() { sc_form_tbadmrawatinap_provider_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbadmrawatinap_provider_onfocus(this, iSeqRow) });
  $('#id_sc_field_idprovider' + iSeqRow).bind('blur', function() { sc_form_tbadmrawatinap_idprovider_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbadmrawatinap_idprovider_onfocus(this, iSeqRow) });
  $('#id_sc_field_penjamin' + iSeqRow).bind('blur', function() { sc_form_tbadmrawatinap_penjamin_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbadmrawatinap_penjamin_onfocus(this, iSeqRow) });
  $('#id_sc_field_hubpenjamin' + iSeqRow).bind('blur', function() { sc_form_tbadmrawatinap_hubpenjamin_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbadmrawatinap_hubpenjamin_onfocus(this, iSeqRow) });
  $('#id_sc_field_hotel' + iSeqRow).bind('blur', function() { sc_form_tbadmrawatinap_hotel_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbadmrawatinap_hotel_onfocus(this, iSeqRow) });
  $('#id_sc_field_waitinglist' + iSeqRow).bind('blur', function() { sc_form_tbadmrawatinap_waitinglist_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbadmrawatinap_waitinglist_onfocus(this, iSeqRow) });
  $('#id_sc_field_admision' + iSeqRow).bind('blur', function() { sc_form_tbadmrawatinap_admision_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbadmrawatinap_admision_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_0' + iSeqRow).bind('blur', function() { sc_form_tbadmrawatinap_sc_field_0_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbadmrawatinap_sc_field_0_onfocus(this, iSeqRow) });
  $('#id_sc_field_detailadm' + iSeqRow).bind('blur', function() { sc_form_tbadmrawatinap_detailadm_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbadmrawatinap_detailadm_onfocus(this, iSeqRow) });
  $('#id_sc_field_detailruang' + iSeqRow).bind('blur', function() { sc_form_tbadmrawatinap_detailruang_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbadmrawatinap_detailruang_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbadmrawatinap_id_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadmrawatinap_validate_id();
  scCssBlur(oThis);
}

function sc_form_tbadmrawatinap_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbadmrawatinap_trancode_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadmrawatinap_validate_trancode();
  scCssBlur(oThis);
}

function sc_form_tbadmrawatinap_trancode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbadmrawatinap_custcode_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadmrawatinap_validate_custcode();
  scCssBlur(oThis);
}

function sc_form_tbadmrawatinap_custcode_onchange(oThis, iSeqRow) {
  do_ajax_form_tbadmrawatinap_event_custcode_onchange();
}

function sc_form_tbadmrawatinap_custcode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbadmrawatinap_tglmasuk_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadmrawatinap_validate_tglmasuk();
  scCssBlur(oThis);
}

function sc_form_tbadmrawatinap_tglmasuk_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadmrawatinap_validate_tglmasuk();
  scCssBlur(oThis);
}

function sc_form_tbadmrawatinap_tglmasuk_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbadmrawatinap_tglmasuk_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbadmrawatinap_pembayaran_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadmrawatinap_validate_pembayaran();
  scCssBlur(oThis);
}

function sc_form_tbadmrawatinap_pembayaran_onchange(oThis, iSeqRow) {
  do_ajax_form_tbadmrawatinap_event_pembayaran_onchange();
}

function sc_form_tbadmrawatinap_pembayaran_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbadmrawatinap_kelas_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadmrawatinap_validate_kelas();
  scCssBlur(oThis);
}

function sc_form_tbadmrawatinap_kelas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbadmrawatinap_bed_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadmrawatinap_validate_bed();
  scCssBlur(oThis);
}

function sc_form_tbadmrawatinap_bed_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbadmrawatinap_paket_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadmrawatinap_validate_paket();
  scCssBlur(oThis);
}

function sc_form_tbadmrawatinap_paket_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbadmrawatinap_caramasuk_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadmrawatinap_validate_caramasuk();
  scCssBlur(oThis);
}

function sc_form_tbadmrawatinap_caramasuk_onchange(oThis, iSeqRow) {
  do_ajax_form_tbadmrawatinap_event_caramasuk_onchange();
}

function sc_form_tbadmrawatinap_caramasuk_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbadmrawatinap_status_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadmrawatinap_validate_status();
  scCssBlur(oThis);
}

function sc_form_tbadmrawatinap_status_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbadmrawatinap_unitasal_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadmrawatinap_validate_unitasal();
  scCssBlur(oThis);
}

function sc_form_tbadmrawatinap_unitasal_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbadmrawatinap_doctor_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadmrawatinap_validate_doctor();
  scCssBlur(oThis);
}

function sc_form_tbadmrawatinap_doctor_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbadmrawatinap_struckno_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadmrawatinap_validate_struckno();
  scCssBlur(oThis);
}

function sc_form_tbadmrawatinap_struckno_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbadmrawatinap_diagnosa1_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadmrawatinap_validate_diagnosa1();
  scCssBlur(oThis);
}

function sc_form_tbadmrawatinap_diagnosa1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbadmrawatinap_perujuk_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadmrawatinap_validate_perujuk();
  scCssBlur(oThis);
}

function sc_form_tbadmrawatinap_perujuk_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbadmrawatinap_provider_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadmrawatinap_validate_provider();
  scCssBlur(oThis);
}

function sc_form_tbadmrawatinap_provider_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_tbadmrawatinap_idprovider_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadmrawatinap_validate_idprovider();
  scCssBlur(oThis);
}

function sc_form_tbadmrawatinap_idprovider_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbadmrawatinap_penjamin_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadmrawatinap_validate_penjamin();
  scCssBlur(oThis);
}

function sc_form_tbadmrawatinap_penjamin_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbadmrawatinap_hubpenjamin_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadmrawatinap_validate_hubpenjamin();
  scCssBlur(oThis);
}

function sc_form_tbadmrawatinap_hubpenjamin_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbadmrawatinap_hotel_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadmrawatinap_validate_hotel();
  scCssBlur(oThis);
}

function sc_form_tbadmrawatinap_hotel_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbadmrawatinap_waitinglist_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadmrawatinap_validate_waitinglist();
  scCssBlur(oThis);
}

function sc_form_tbadmrawatinap_waitinglist_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbadmrawatinap_admision_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadmrawatinap_validate_admision();
  scCssBlur(oThis);
}

function sc_form_tbadmrawatinap_admision_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbadmrawatinap_sc_field_0_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadmrawatinap_validate_sc_field_0();
  scCssBlur(oThis);
}

function sc_form_tbadmrawatinap_sc_field_0_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbadmrawatinap_detailadm_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadmrawatinap_validate_detailadm();
  scCssBlur(oThis);
}

function sc_form_tbadmrawatinap_detailadm_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbadmrawatinap_detailruang_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadmrawatinap_validate_detailruang();
  scCssBlur(oThis);
}

function sc_form_tbadmrawatinap_detailruang_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_page(page, status) {
	if ("0" == page) {
		displayChange_page_0(status);
	}
	if ("1" == page) {
		displayChange_page_1(status);
	}
}

function displayChange_page_0(status) {
	displayChange_block("0", status);
	displayChange_block("1", status);
	displayChange_block("2", status);
}

function displayChange_page_1(status) {
	displayChange_block("3", status);
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
}

function displayChange_block_0(status) {
	displayChange_field("trancode", "", status);
	displayChange_field("custcode", "", status);
	displayChange_field("sc_field_0", "", status);
	displayChange_field("penjamin", "", status);
	displayChange_field("hubpenjamin", "", status);
	displayChange_field("status", "", status);
	displayChange_field("admision", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("tglmasuk", "", status);
	displayChange_field("doctor", "", status);
	displayChange_field("kelas", "", status);
	displayChange_field("bed", "", status);
	displayChange_field("diagnosa1", "", status);
	displayChange_field("struckno", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("pembayaran", "", status);
	displayChange_field("paket", "", status);
	displayChange_field("provider", "", status);
	displayChange_field("idprovider", "", status);
	displayChange_field("caramasuk", "", status);
	displayChange_field("unitasal", "", status);
	displayChange_field("perujuk", "", status);
	displayChange_field("id", "", status);
	displayChange_field("hotel", "", status);
	displayChange_field("waitinglist", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("detailadm", "", status);
	displayChange_field("detailruang", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_trancode(row, status);
	displayChange_field_custcode(row, status);
	displayChange_field_sc_field_0(row, status);
	displayChange_field_penjamin(row, status);
	displayChange_field_hubpenjamin(row, status);
	displayChange_field_status(row, status);
	displayChange_field_admision(row, status);
	displayChange_field_tglmasuk(row, status);
	displayChange_field_doctor(row, status);
	displayChange_field_kelas(row, status);
	displayChange_field_bed(row, status);
	displayChange_field_diagnosa1(row, status);
	displayChange_field_struckno(row, status);
	displayChange_field_pembayaran(row, status);
	displayChange_field_paket(row, status);
	displayChange_field_provider(row, status);
	displayChange_field_idprovider(row, status);
	displayChange_field_caramasuk(row, status);
	displayChange_field_unitasal(row, status);
	displayChange_field_perujuk(row, status);
	displayChange_field_id(row, status);
	displayChange_field_hotel(row, status);
	displayChange_field_waitinglist(row, status);
	displayChange_field_detailadm(row, status);
	displayChange_field_detailruang(row, status);
}

function displayChange_field(field, row, status) {
	if ("trancode" == field) {
		displayChange_field_trancode(row, status);
	}
	if ("custcode" == field) {
		displayChange_field_custcode(row, status);
	}
	if ("sc_field_0" == field) {
		displayChange_field_sc_field_0(row, status);
	}
	if ("penjamin" == field) {
		displayChange_field_penjamin(row, status);
	}
	if ("hubpenjamin" == field) {
		displayChange_field_hubpenjamin(row, status);
	}
	if ("status" == field) {
		displayChange_field_status(row, status);
	}
	if ("admision" == field) {
		displayChange_field_admision(row, status);
	}
	if ("tglmasuk" == field) {
		displayChange_field_tglmasuk(row, status);
	}
	if ("doctor" == field) {
		displayChange_field_doctor(row, status);
	}
	if ("kelas" == field) {
		displayChange_field_kelas(row, status);
	}
	if ("bed" == field) {
		displayChange_field_bed(row, status);
	}
	if ("diagnosa1" == field) {
		displayChange_field_diagnosa1(row, status);
	}
	if ("struckno" == field) {
		displayChange_field_struckno(row, status);
	}
	if ("pembayaran" == field) {
		displayChange_field_pembayaran(row, status);
	}
	if ("paket" == field) {
		displayChange_field_paket(row, status);
	}
	if ("provider" == field) {
		displayChange_field_provider(row, status);
	}
	if ("idprovider" == field) {
		displayChange_field_idprovider(row, status);
	}
	if ("caramasuk" == field) {
		displayChange_field_caramasuk(row, status);
	}
	if ("unitasal" == field) {
		displayChange_field_unitasal(row, status);
	}
	if ("perujuk" == field) {
		displayChange_field_perujuk(row, status);
	}
	if ("id" == field) {
		displayChange_field_id(row, status);
	}
	if ("hotel" == field) {
		displayChange_field_hotel(row, status);
	}
	if ("waitinglist" == field) {
		displayChange_field_waitinglist(row, status);
	}
	if ("detailadm" == field) {
		displayChange_field_detailadm(row, status);
	}
	if ("detailruang" == field) {
		displayChange_field_detailruang(row, status);
	}
}

function displayChange_field_trancode(row, status) {
}

function displayChange_field_custcode(row, status) {
}

function displayChange_field_sc_field_0(row, status) {
}

function displayChange_field_penjamin(row, status) {
}

function displayChange_field_hubpenjamin(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_hubpenjamin__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_hubpenjamin" + row).select2("destroy");
		}
		scJQSelect2Add(row, "hubpenjamin");
	}
}

function displayChange_field_status(row, status) {
}

function displayChange_field_admision(row, status) {
}

function displayChange_field_tglmasuk(row, status) {
}

function displayChange_field_doctor(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_doctor__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_doctor" + row).select2("destroy");
		}
		scJQSelect2Add(row, "doctor");
	}
}

function displayChange_field_kelas(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_kelas__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_kelas" + row).select2("destroy");
		}
		scJQSelect2Add(row, "kelas");
	}
}

function displayChange_field_bed(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_bed__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_bed" + row).select2("destroy");
		}
		scJQSelect2Add(row, "bed");
	}
}

function displayChange_field_diagnosa1(row, status) {
}

function displayChange_field_struckno(row, status) {
}

function displayChange_field_pembayaran(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_pembayaran__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_pembayaran" + row).select2("destroy");
		}
		scJQSelect2Add(row, "pembayaran");
	}
}

function displayChange_field_paket(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_paket__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_paket" + row).select2("destroy");
		}
		scJQSelect2Add(row, "paket");
	}
}

function displayChange_field_provider(row, status) {
}

function displayChange_field_idprovider(row, status) {
}

function displayChange_field_caramasuk(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_caramasuk__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_caramasuk" + row).select2("destroy");
		}
		scJQSelect2Add(row, "caramasuk");
	}
}

function displayChange_field_unitasal(row, status) {
}

function displayChange_field_perujuk(row, status) {
}

function displayChange_field_id(row, status) {
}

function displayChange_field_hotel(row, status) {
}

function displayChange_field_waitinglist(row, status) {
}

function displayChange_field_detailadm(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_detailadm")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_detailadm")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_detailruang(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbbillruang_adm")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbbillruang_adm")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
	displayChange_field_hubpenjamin("all", "on");
	displayChange_field_doctor("all", "on");
	displayChange_field_kelas("all", "on");
	displayChange_field_bed("all", "on");
	displayChange_field_pembayaran("all", "on");
	displayChange_field_paket("all", "on");
	displayChange_field_caramasuk("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbadmrawatinap_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(27);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_tglmasuk" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_tglmasuk" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_tbadmrawatinap_validate_tglmasuk(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['tglmasuk']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  if (null == specificField || "hubpenjamin" == specificField) {
    scJQSelect2Add_hubpenjamin(seqRow);
  }
  if (null == specificField || "doctor" == specificField) {
    scJQSelect2Add_doctor(seqRow);
  }
  if (null == specificField || "kelas" == specificField) {
    scJQSelect2Add_kelas(seqRow);
  }
  if (null == specificField || "bed" == specificField) {
    scJQSelect2Add_bed(seqRow);
  }
  if (null == specificField || "pembayaran" == specificField) {
    scJQSelect2Add_pembayaran(seqRow);
  }
  if (null == specificField || "paket" == specificField) {
    scJQSelect2Add_paket(seqRow);
  }
  if (null == specificField || "caramasuk" == specificField) {
    scJQSelect2Add_caramasuk(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_hubpenjamin(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_hubpenjamin_obj" : "#id_sc_field_hubpenjamin" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_hubpenjamin_obj',
      dropdownCssClass: 'css_hubpenjamin_obj',
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

function scJQSelect2Add_doctor(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_doctor_obj" : "#id_sc_field_doctor" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_doctor_obj',
      dropdownCssClass: 'css_doctor_obj',
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

function scJQSelect2Add_kelas(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_kelas_obj" : "#id_sc_field_kelas" + seqRow;
  $(elemSelector).select2(
    {
      minimumResultsForSearch: Infinity,
      containerCssClass: 'css_kelas_obj',
      dropdownCssClass: 'css_kelas_obj',
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

function scJQSelect2Add_bed(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_bed_obj" : "#id_sc_field_bed" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_bed_obj',
      dropdownCssClass: 'css_bed_obj',
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

function scJQSelect2Add_pembayaran(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_pembayaran_obj" : "#id_sc_field_pembayaran" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_pembayaran_obj',
      dropdownCssClass: 'css_pembayaran_obj',
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

function scJQSelect2Add_paket(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_paket_obj" : "#id_sc_field_paket" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_paket_obj',
      dropdownCssClass: 'css_paket_obj',
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

function scJQSelect2Add_caramasuk(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_caramasuk_obj" : "#id_sc_field_caramasuk" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_caramasuk_obj',
      dropdownCssClass: 'css_caramasuk_obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_hubpenjamin) { displayChange_field_hubpenjamin(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_doctor) { displayChange_field_doctor(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_kelas) { displayChange_field_kelas(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_bed) { displayChange_field_bed(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_pembayaran) { displayChange_field_pembayaran(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_paket) { displayChange_field_paket(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_caramasuk) { displayChange_field_caramasuk(iLine, "on"); } }, 150);
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
