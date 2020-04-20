
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
  scEventControl_data["staffcode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["appcode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["staffname" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["surname" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pob" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dob" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["addressktp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cityktp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["address" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["city" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["statustinggal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sex" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["blood" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["phone" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["religion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["marstatus" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["suku" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["wn" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["simtype" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["simno" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ktp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["npwp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hobby" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["lastupdate" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nipman" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["department" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["enterdate" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["resigndate" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["resignnote" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["status" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["iscompleted" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["staffcode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["staffcode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["appcode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["appcode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["staffname" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["staffname" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["surname" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["surname" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pob" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pob" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dob" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dob" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["addressktp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["addressktp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cityktp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cityktp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["address" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["address" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["city" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["city" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["statustinggal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["statustinggal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sex" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sex" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["blood" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["blood" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["phone" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["phone" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["religion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["religion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["marstatus" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["marstatus" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["suku" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["suku" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["wn" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["wn" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["simtype" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["simtype" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["simno" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["simno" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ktp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ktp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["npwp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["npwp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hobby" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hobby" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["lastupdate" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["lastupdate" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nipman" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nipman" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["department" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["department" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["enterdate" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["enterdate" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["resigndate" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["resigndate" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["resignnote" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["resignnote" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["status" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["status" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["iscompleted" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["iscompleted" + iSeqRow]["change"]) {
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
  $('#id_sc_field_staffcode' + iSeqRow).bind('blur', function() { sc_form_tbemployee_staffcode_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbemployee_staffcode_onfocus(this, iSeqRow) });
  $('#id_sc_field_appcode' + iSeqRow).bind('blur', function() { sc_form_tbemployee_appcode_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbemployee_appcode_onfocus(this, iSeqRow) });
  $('#id_sc_field_staffname' + iSeqRow).bind('blur', function() { sc_form_tbemployee_staffname_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbemployee_staffname_onfocus(this, iSeqRow) });
  $('#id_sc_field_surname' + iSeqRow).bind('blur', function() { sc_form_tbemployee_surname_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbemployee_surname_onfocus(this, iSeqRow) });
  $('#id_sc_field_pob' + iSeqRow).bind('blur', function() { sc_form_tbemployee_pob_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tbemployee_pob_onfocus(this, iSeqRow) });
  $('#id_sc_field_dob' + iSeqRow).bind('blur', function() { sc_form_tbemployee_dob_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tbemployee_dob_onfocus(this, iSeqRow) });
  $('#id_sc_field_dob_hora' + iSeqRow).bind('blur', function() { sc_form_tbemployee_dob_hora_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbemployee_dob_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_addressktp' + iSeqRow).bind('blur', function() { sc_form_tbemployee_addressktp_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbemployee_addressktp_onfocus(this, iSeqRow) });
  $('#id_sc_field_cityktp' + iSeqRow).bind('blur', function() { sc_form_tbemployee_cityktp_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbemployee_cityktp_onfocus(this, iSeqRow) });
  $('#id_sc_field_address' + iSeqRow).bind('blur', function() { sc_form_tbemployee_address_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbemployee_address_onfocus(this, iSeqRow) });
  $('#id_sc_field_city' + iSeqRow).bind('blur', function() { sc_form_tbemployee_city_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tbemployee_city_onfocus(this, iSeqRow) });
  $('#id_sc_field_statustinggal' + iSeqRow).bind('blur', function() { sc_form_tbemployee_statustinggal_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_tbemployee_statustinggal_onfocus(this, iSeqRow) });
  $('#id_sc_field_sex' + iSeqRow).bind('blur', function() { sc_form_tbemployee_sex_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tbemployee_sex_onfocus(this, iSeqRow) });
  $('#id_sc_field_blood' + iSeqRow).bind('blur', function() { sc_form_tbemployee_blood_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbemployee_blood_onfocus(this, iSeqRow) });
  $('#id_sc_field_phone' + iSeqRow).bind('blur', function() { sc_form_tbemployee_phone_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbemployee_phone_onfocus(this, iSeqRow) });
  $('#id_sc_field_hp' + iSeqRow).bind('blur', function() { sc_form_tbemployee_hp_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_tbemployee_hp_onfocus(this, iSeqRow) });
  $('#id_sc_field_religion' + iSeqRow).bind('blur', function() { sc_form_tbemployee_religion_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbemployee_religion_onfocus(this, iSeqRow) });
  $('#id_sc_field_marstatus' + iSeqRow).bind('blur', function() { sc_form_tbemployee_marstatus_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbemployee_marstatus_onfocus(this, iSeqRow) });
  $('#id_sc_field_suku' + iSeqRow).bind('blur', function() { sc_form_tbemployee_suku_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tbemployee_suku_onfocus(this, iSeqRow) });
  $('#id_sc_field_wn' + iSeqRow).bind('blur', function() { sc_form_tbemployee_wn_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_tbemployee_wn_onfocus(this, iSeqRow) });
  $('#id_sc_field_simtype' + iSeqRow).bind('blur', function() { sc_form_tbemployee_simtype_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbemployee_simtype_onfocus(this, iSeqRow) });
  $('#id_sc_field_simno' + iSeqRow).bind('blur', function() { sc_form_tbemployee_simno_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbemployee_simno_onfocus(this, iSeqRow) });
  $('#id_sc_field_ktp' + iSeqRow).bind('blur', function() { sc_form_tbemployee_ktp_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tbemployee_ktp_onfocus(this, iSeqRow) });
  $('#id_sc_field_npwp' + iSeqRow).bind('blur', function() { sc_form_tbemployee_npwp_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tbemployee_npwp_onfocus(this, iSeqRow) });
  $('#id_sc_field_email' + iSeqRow).bind('blur', function() { sc_form_tbemployee_email_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbemployee_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_hobby' + iSeqRow).bind('blur', function() { sc_form_tbemployee_hobby_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbemployee_hobby_onfocus(this, iSeqRow) });
  $('#id_sc_field_lastupdate' + iSeqRow).bind('blur', function() { sc_form_tbemployee_lastupdate_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbemployee_lastupdate_onfocus(this, iSeqRow) });
  $('#id_sc_field_lastupdate_hora' + iSeqRow).bind('blur', function() { sc_form_tbemployee_lastupdate_hora_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_tbemployee_lastupdate_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_nipman' + iSeqRow).bind('blur', function() { sc_form_tbemployee_nipman_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbemployee_nipman_onfocus(this, iSeqRow) });
  $('#id_sc_field_department' + iSeqRow).bind('blur', function() { sc_form_tbemployee_department_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbemployee_department_onfocus(this, iSeqRow) });
  $('#id_sc_field_fp' + iSeqRow).bind('blur', function() { sc_form_tbemployee_fp_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_tbemployee_fp_onfocus(this, iSeqRow) });
  $('#id_sc_field_enterdate' + iSeqRow).bind('blur', function() { sc_form_tbemployee_enterdate_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbemployee_enterdate_onfocus(this, iSeqRow) });
  $('#id_sc_field_enterdate_hora' + iSeqRow).bind('blur', function() { sc_form_tbemployee_enterdate_hora_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_tbemployee_enterdate_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_resigndate' + iSeqRow).bind('blur', function() { sc_form_tbemployee_resigndate_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbemployee_resigndate_onfocus(this, iSeqRow) });
  $('#id_sc_field_resigndate_hora' + iSeqRow).bind('blur', function() { sc_form_tbemployee_resigndate_hora_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_tbemployee_resigndate_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_resignnote' + iSeqRow).bind('blur', function() { sc_form_tbemployee_resignnote_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbemployee_resignnote_onfocus(this, iSeqRow) });
  $('#id_sc_field_status' + iSeqRow).bind('blur', function() { sc_form_tbemployee_status_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbemployee_status_onfocus(this, iSeqRow) });
  $('#id_sc_field_iscompleted' + iSeqRow).bind('blur', function() { sc_form_tbemployee_iscompleted_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbemployee_iscompleted_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbemployee_staffcode_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_staffcode();
  scCssBlur(oThis);
}

function sc_form_tbemployee_staffcode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_appcode_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_appcode();
  scCssBlur(oThis);
}

function sc_form_tbemployee_appcode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_staffname_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_staffname();
  scCssBlur(oThis);
}

function sc_form_tbemployee_staffname_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_surname_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_surname();
  scCssBlur(oThis);
}

function sc_form_tbemployee_surname_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_pob_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_pob();
  scCssBlur(oThis);
}

function sc_form_tbemployee_pob_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_dob_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_dob();
  scCssBlur(oThis);
}

function sc_form_tbemployee_dob_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_dob();
  scCssBlur(oThis);
}

function sc_form_tbemployee_dob_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_dob_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_addressktp_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_addressktp();
  scCssBlur(oThis);
}

function sc_form_tbemployee_addressktp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_cityktp_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_cityktp();
  scCssBlur(oThis);
}

function sc_form_tbemployee_cityktp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_address_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_address();
  scCssBlur(oThis);
}

function sc_form_tbemployee_address_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_city_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_city();
  scCssBlur(oThis);
}

function sc_form_tbemployee_city_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_statustinggal_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_statustinggal();
  scCssBlur(oThis);
}

function sc_form_tbemployee_statustinggal_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_sex_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_sex();
  scCssBlur(oThis);
}

function sc_form_tbemployee_sex_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_blood_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_blood();
  scCssBlur(oThis);
}

function sc_form_tbemployee_blood_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_phone_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_phone();
  scCssBlur(oThis);
}

function sc_form_tbemployee_phone_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_hp_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_hp();
  scCssBlur(oThis);
}

function sc_form_tbemployee_hp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_religion_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_religion();
  scCssBlur(oThis);
}

function sc_form_tbemployee_religion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_marstatus_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_marstatus();
  scCssBlur(oThis);
}

function sc_form_tbemployee_marstatus_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_suku_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_suku();
  scCssBlur(oThis);
}

function sc_form_tbemployee_suku_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_wn_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_wn();
  scCssBlur(oThis);
}

function sc_form_tbemployee_wn_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_simtype_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_simtype();
  scCssBlur(oThis);
}

function sc_form_tbemployee_simtype_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_simno_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_simno();
  scCssBlur(oThis);
}

function sc_form_tbemployee_simno_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_ktp_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_ktp();
  scCssBlur(oThis);
}

function sc_form_tbemployee_ktp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_npwp_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_npwp();
  scCssBlur(oThis);
}

function sc_form_tbemployee_npwp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_email_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_email();
  scCssBlur(oThis);
}

function sc_form_tbemployee_email_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_hobby_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_hobby();
  scCssBlur(oThis);
}

function sc_form_tbemployee_hobby_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_lastupdate_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_lastupdate();
  scCssBlur(oThis);
}

function sc_form_tbemployee_lastupdate_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_lastupdate();
  scCssBlur(oThis);
}

function sc_form_tbemployee_lastupdate_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_lastupdate_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_nipman_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_nipman();
  scCssBlur(oThis);
}

function sc_form_tbemployee_nipman_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_department_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_department();
  scCssBlur(oThis);
}

function sc_form_tbemployee_department_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_fp_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_fp();
  scCssBlur(oThis);
}

function sc_form_tbemployee_fp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_enterdate_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_enterdate();
  scCssBlur(oThis);
}

function sc_form_tbemployee_enterdate_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_enterdate();
  scCssBlur(oThis);
}

function sc_form_tbemployee_enterdate_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_enterdate_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_resigndate_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_resigndate();
  scCssBlur(oThis);
}

function sc_form_tbemployee_resigndate_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_resigndate();
  scCssBlur(oThis);
}

function sc_form_tbemployee_resigndate_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_resigndate_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_resignnote_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_resignnote();
  scCssBlur(oThis);
}

function sc_form_tbemployee_resignnote_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_status_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_status();
  scCssBlur(oThis);
}

function sc_form_tbemployee_status_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbemployee_iscompleted_onblur(oThis, iSeqRow) {
  do_ajax_form_tbemployee_validate_iscompleted();
  scCssBlur(oThis);
}

function sc_form_tbemployee_iscompleted_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("staffcode", "", status);
	displayChange_field("appcode", "", status);
	displayChange_field("staffname", "", status);
	displayChange_field("surname", "", status);
	displayChange_field("pob", "", status);
	displayChange_field("dob", "", status);
	displayChange_field("addressktp", "", status);
	displayChange_field("cityktp", "", status);
	displayChange_field("address", "", status);
	displayChange_field("city", "", status);
	displayChange_field("statustinggal", "", status);
	displayChange_field("sex", "", status);
	displayChange_field("blood", "", status);
	displayChange_field("phone", "", status);
	displayChange_field("hp", "", status);
	displayChange_field("religion", "", status);
	displayChange_field("marstatus", "", status);
	displayChange_field("suku", "", status);
	displayChange_field("wn", "", status);
	displayChange_field("simtype", "", status);
	displayChange_field("simno", "", status);
	displayChange_field("ktp", "", status);
	displayChange_field("npwp", "", status);
	displayChange_field("email", "", status);
	displayChange_field("hobby", "", status);
	displayChange_field("lastupdate", "", status);
	displayChange_field("nipman", "", status);
	displayChange_field("department", "", status);
	displayChange_field("fp", "", status);
	displayChange_field("enterdate", "", status);
	displayChange_field("resigndate", "", status);
	displayChange_field("resignnote", "", status);
	displayChange_field("status", "", status);
	displayChange_field("iscompleted", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_staffcode(row, status);
	displayChange_field_appcode(row, status);
	displayChange_field_staffname(row, status);
	displayChange_field_surname(row, status);
	displayChange_field_pob(row, status);
	displayChange_field_dob(row, status);
	displayChange_field_addressktp(row, status);
	displayChange_field_cityktp(row, status);
	displayChange_field_address(row, status);
	displayChange_field_city(row, status);
	displayChange_field_statustinggal(row, status);
	displayChange_field_sex(row, status);
	displayChange_field_blood(row, status);
	displayChange_field_phone(row, status);
	displayChange_field_hp(row, status);
	displayChange_field_religion(row, status);
	displayChange_field_marstatus(row, status);
	displayChange_field_suku(row, status);
	displayChange_field_wn(row, status);
	displayChange_field_simtype(row, status);
	displayChange_field_simno(row, status);
	displayChange_field_ktp(row, status);
	displayChange_field_npwp(row, status);
	displayChange_field_email(row, status);
	displayChange_field_hobby(row, status);
	displayChange_field_lastupdate(row, status);
	displayChange_field_nipman(row, status);
	displayChange_field_department(row, status);
	displayChange_field_fp(row, status);
	displayChange_field_enterdate(row, status);
	displayChange_field_resigndate(row, status);
	displayChange_field_resignnote(row, status);
	displayChange_field_status(row, status);
	displayChange_field_iscompleted(row, status);
}

function displayChange_field(field, row, status) {
	if ("staffcode" == field) {
		displayChange_field_staffcode(row, status);
	}
	if ("appcode" == field) {
		displayChange_field_appcode(row, status);
	}
	if ("staffname" == field) {
		displayChange_field_staffname(row, status);
	}
	if ("surname" == field) {
		displayChange_field_surname(row, status);
	}
	if ("pob" == field) {
		displayChange_field_pob(row, status);
	}
	if ("dob" == field) {
		displayChange_field_dob(row, status);
	}
	if ("addressktp" == field) {
		displayChange_field_addressktp(row, status);
	}
	if ("cityktp" == field) {
		displayChange_field_cityktp(row, status);
	}
	if ("address" == field) {
		displayChange_field_address(row, status);
	}
	if ("city" == field) {
		displayChange_field_city(row, status);
	}
	if ("statustinggal" == field) {
		displayChange_field_statustinggal(row, status);
	}
	if ("sex" == field) {
		displayChange_field_sex(row, status);
	}
	if ("blood" == field) {
		displayChange_field_blood(row, status);
	}
	if ("phone" == field) {
		displayChange_field_phone(row, status);
	}
	if ("hp" == field) {
		displayChange_field_hp(row, status);
	}
	if ("religion" == field) {
		displayChange_field_religion(row, status);
	}
	if ("marstatus" == field) {
		displayChange_field_marstatus(row, status);
	}
	if ("suku" == field) {
		displayChange_field_suku(row, status);
	}
	if ("wn" == field) {
		displayChange_field_wn(row, status);
	}
	if ("simtype" == field) {
		displayChange_field_simtype(row, status);
	}
	if ("simno" == field) {
		displayChange_field_simno(row, status);
	}
	if ("ktp" == field) {
		displayChange_field_ktp(row, status);
	}
	if ("npwp" == field) {
		displayChange_field_npwp(row, status);
	}
	if ("email" == field) {
		displayChange_field_email(row, status);
	}
	if ("hobby" == field) {
		displayChange_field_hobby(row, status);
	}
	if ("lastupdate" == field) {
		displayChange_field_lastupdate(row, status);
	}
	if ("nipman" == field) {
		displayChange_field_nipman(row, status);
	}
	if ("department" == field) {
		displayChange_field_department(row, status);
	}
	if ("fp" == field) {
		displayChange_field_fp(row, status);
	}
	if ("enterdate" == field) {
		displayChange_field_enterdate(row, status);
	}
	if ("resigndate" == field) {
		displayChange_field_resigndate(row, status);
	}
	if ("resignnote" == field) {
		displayChange_field_resignnote(row, status);
	}
	if ("status" == field) {
		displayChange_field_status(row, status);
	}
	if ("iscompleted" == field) {
		displayChange_field_iscompleted(row, status);
	}
}

function displayChange_field_staffcode(row, status) {
}

function displayChange_field_appcode(row, status) {
}

function displayChange_field_staffname(row, status) {
}

function displayChange_field_surname(row, status) {
}

function displayChange_field_pob(row, status) {
}

function displayChange_field_dob(row, status) {
}

function displayChange_field_addressktp(row, status) {
}

function displayChange_field_cityktp(row, status) {
}

function displayChange_field_address(row, status) {
}

function displayChange_field_city(row, status) {
}

function displayChange_field_statustinggal(row, status) {
}

function displayChange_field_sex(row, status) {
}

function displayChange_field_blood(row, status) {
}

function displayChange_field_phone(row, status) {
}

function displayChange_field_hp(row, status) {
}

function displayChange_field_religion(row, status) {
}

function displayChange_field_marstatus(row, status) {
}

function displayChange_field_suku(row, status) {
}

function displayChange_field_wn(row, status) {
}

function displayChange_field_simtype(row, status) {
}

function displayChange_field_simno(row, status) {
}

function displayChange_field_ktp(row, status) {
}

function displayChange_field_npwp(row, status) {
}

function displayChange_field_email(row, status) {
}

function displayChange_field_hobby(row, status) {
}

function displayChange_field_lastupdate(row, status) {
}

function displayChange_field_nipman(row, status) {
}

function displayChange_field_department(row, status) {
}

function displayChange_field_fp(row, status) {
}

function displayChange_field_enterdate(row, status) {
}

function displayChange_field_resigndate(row, status) {
}

function displayChange_field_resignnote(row, status) {
}

function displayChange_field_status(row, status) {
}

function displayChange_field_iscompleted(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbemployee_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(23);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_dob" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_dob" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['dob']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['dob']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_tbemployee_validate_dob(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['dob']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_lastupdate" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_lastupdate" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['lastupdate']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['lastupdate']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_tbemployee_validate_lastupdate(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['lastupdate']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_enterdate" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_enterdate" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['enterdate']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['enterdate']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_tbemployee_validate_enterdate(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['enterdate']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_resigndate" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_resigndate" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['resigndate']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['resigndate']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_tbemployee_validate_resigndate(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['resigndate']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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

