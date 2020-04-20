
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
  scEventControl_data["instcode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["init" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["name" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["limit" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["discount" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tempo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["lastupdated" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["address" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["city" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["phone" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fax" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["joindate" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["expdate" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["marginobat" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["markuptindakan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["markupobat" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["markuplab" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["markuprad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["admpolitype" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["adminaptype" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["admpolibaru" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["admpolilama" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["adminap" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["marginpma" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["withpma" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["policy" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["instcode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["instcode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["init" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["init" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["name" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["name" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["limit" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["limit" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["discount" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["discount" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tempo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tempo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["lastupdated" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["lastupdated" + iSeqRow]["change"]) {
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
  if (scEventControl_data["phone" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["phone" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fax" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fax" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["joindate" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["joindate" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["expdate" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["expdate" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["marginobat" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["marginobat" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["markuptindakan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["markuptindakan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["markupobat" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["markupobat" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["markuplab" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["markuplab" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["markuprad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["markuprad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["admpolitype" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["admpolitype" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["adminaptype" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["adminaptype" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["admpolibaru" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["admpolibaru" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["admpolilama" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["admpolilama" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["adminap" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["adminap" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["marginpma" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["marginpma" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["withpma" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["withpma" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["policy" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["policy" + iSeqRow]["change"]) {
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
  $('#id_sc_field_instcode' + iSeqRow).bind('blur', function() { sc_form_tbinstansi_instcode_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbinstansi_instcode_onfocus(this, iSeqRow) });
  $('#id_sc_field_init' + iSeqRow).bind('blur', function() { sc_form_tbinstansi_init_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tbinstansi_init_onfocus(this, iSeqRow) });
  $('#id_sc_field_name' + iSeqRow).bind('blur', function() { sc_form_tbinstansi_name_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tbinstansi_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_address' + iSeqRow).bind('blur', function() { sc_form_tbinstansi_address_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbinstansi_address_onfocus(this, iSeqRow) });
  $('#id_sc_field_city' + iSeqRow).bind('blur', function() { sc_form_tbinstansi_city_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tbinstansi_city_onfocus(this, iSeqRow) });
  $('#id_sc_field_phone' + iSeqRow).bind('blur', function() { sc_form_tbinstansi_phone_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbinstansi_phone_onfocus(this, iSeqRow) });
  $('#id_sc_field_fax' + iSeqRow).bind('blur', function() { sc_form_tbinstansi_fax_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tbinstansi_fax_onfocus(this, iSeqRow) });
  $('#id_sc_field_cp' + iSeqRow).bind('blur', function() { sc_form_tbinstansi_cp_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_tbinstansi_cp_onfocus(this, iSeqRow) });
  $('#id_sc_field_limit' + iSeqRow).bind('blur', function() { sc_form_tbinstansi_limit_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbinstansi_limit_onfocus(this, iSeqRow) });
  $('#id_sc_field_discount' + iSeqRow).bind('blur', function() { sc_form_tbinstansi_discount_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbinstansi_discount_onfocus(this, iSeqRow) });
  $('#id_sc_field_joindate' + iSeqRow).bind('blur', function() { sc_form_tbinstansi_joindate_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbinstansi_joindate_onfocus(this, iSeqRow) });
  $('#id_sc_field_joindate_hora' + iSeqRow).bind('blur', function() { sc_form_tbinstansi_joindate_hora_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_tbinstansi_joindate_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_expdate' + iSeqRow).bind('blur', function() { sc_form_tbinstansi_expdate_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbinstansi_expdate_onfocus(this, iSeqRow) });
  $('#id_sc_field_expdate_hora' + iSeqRow).bind('blur', function() { sc_form_tbinstansi_expdate_hora_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tbinstansi_expdate_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_policy' + iSeqRow).bind('blur', function() { sc_form_tbinstansi_policy_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbinstansi_policy_onfocus(this, iSeqRow) });
  $('#id_sc_field_tempo' + iSeqRow).bind('blur', function() { sc_form_tbinstansi_tempo_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbinstansi_tempo_onfocus(this, iSeqRow) });
  $('#id_sc_field_marginobat' + iSeqRow).bind('blur', function() { sc_form_tbinstansi_marginobat_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbinstansi_marginobat_onfocus(this, iSeqRow) });
  $('#id_sc_field_markuptindakan' + iSeqRow).bind('blur', function() { sc_form_tbinstansi_markuptindakan_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_tbinstansi_markuptindakan_onfocus(this, iSeqRow) });
  $('#id_sc_field_markupobat' + iSeqRow).bind('blur', function() { sc_form_tbinstansi_markupobat_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbinstansi_markupobat_onfocus(this, iSeqRow) });
  $('#id_sc_field_markuplab' + iSeqRow).bind('blur', function() { sc_form_tbinstansi_markuplab_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbinstansi_markuplab_onfocus(this, iSeqRow) });
  $('#id_sc_field_markuprad' + iSeqRow).bind('blur', function() { sc_form_tbinstansi_markuprad_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbinstansi_markuprad_onfocus(this, iSeqRow) });
  $('#id_sc_field_admpolitype' + iSeqRow).bind('blur', function() { sc_form_tbinstansi_admpolitype_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbinstansi_admpolitype_onfocus(this, iSeqRow) });
  $('#id_sc_field_adminaptype' + iSeqRow).bind('blur', function() { sc_form_tbinstansi_adminaptype_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbinstansi_adminaptype_onfocus(this, iSeqRow) });
  $('#id_sc_field_admpolibaru' + iSeqRow).bind('blur', function() { sc_form_tbinstansi_admpolibaru_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbinstansi_admpolibaru_onfocus(this, iSeqRow) });
  $('#id_sc_field_admpolilama' + iSeqRow).bind('blur', function() { sc_form_tbinstansi_admpolilama_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbinstansi_admpolilama_onfocus(this, iSeqRow) });
  $('#id_sc_field_adminap' + iSeqRow).bind('blur', function() { sc_form_tbinstansi_adminap_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbinstansi_adminap_onfocus(this, iSeqRow) });
  $('#id_sc_field_lastupdated' + iSeqRow).bind('blur', function() { sc_form_tbinstansi_lastupdated_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbinstansi_lastupdated_onfocus(this, iSeqRow) });
  $('#id_sc_field_lastupdated_hora' + iSeqRow).bind('blur', function() { sc_form_tbinstansi_lastupdated_hora_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_tbinstansi_lastupdated_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_marginpma' + iSeqRow).bind('blur', function() { sc_form_tbinstansi_marginpma_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbinstansi_marginpma_onfocus(this, iSeqRow) });
  $('#id_sc_field_withpma' + iSeqRow).bind('blur', function() { sc_form_tbinstansi_withpma_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbinstansi_withpma_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbinstansi_instcode_onblur(oThis, iSeqRow) {
  do_ajax_form_tbinstansi_validate_instcode();
  scCssBlur(oThis);
}

function sc_form_tbinstansi_instcode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbinstansi_init_onblur(oThis, iSeqRow) {
  do_ajax_form_tbinstansi_validate_init();
  scCssBlur(oThis);
}

function sc_form_tbinstansi_init_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbinstansi_name_onblur(oThis, iSeqRow) {
  do_ajax_form_tbinstansi_validate_name();
  scCssBlur(oThis);
}

function sc_form_tbinstansi_name_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbinstansi_address_onblur(oThis, iSeqRow) {
  do_ajax_form_tbinstansi_validate_address();
  scCssBlur(oThis);
}

function sc_form_tbinstansi_address_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbinstansi_city_onblur(oThis, iSeqRow) {
  do_ajax_form_tbinstansi_validate_city();
  scCssBlur(oThis);
}

function sc_form_tbinstansi_city_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbinstansi_phone_onblur(oThis, iSeqRow) {
  do_ajax_form_tbinstansi_validate_phone();
  scCssBlur(oThis);
}

function sc_form_tbinstansi_phone_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbinstansi_fax_onblur(oThis, iSeqRow) {
  do_ajax_form_tbinstansi_validate_fax();
  scCssBlur(oThis);
}

function sc_form_tbinstansi_fax_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbinstansi_cp_onblur(oThis, iSeqRow) {
  do_ajax_form_tbinstansi_validate_cp();
  scCssBlur(oThis);
}

function sc_form_tbinstansi_cp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbinstansi_limit_onblur(oThis, iSeqRow) {
  do_ajax_form_tbinstansi_validate_limit();
  scCssBlur(oThis);
}

function sc_form_tbinstansi_limit_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbinstansi_discount_onblur(oThis, iSeqRow) {
  do_ajax_form_tbinstansi_validate_discount();
  scCssBlur(oThis);
}

function sc_form_tbinstansi_discount_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbinstansi_joindate_onblur(oThis, iSeqRow) {
  do_ajax_form_tbinstansi_validate_joindate();
  scCssBlur(oThis);
}

function sc_form_tbinstansi_joindate_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_tbinstansi_validate_joindate();
  scCssBlur(oThis);
}

function sc_form_tbinstansi_joindate_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbinstansi_joindate_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbinstansi_expdate_onblur(oThis, iSeqRow) {
  do_ajax_form_tbinstansi_validate_expdate();
  scCssBlur(oThis);
}

function sc_form_tbinstansi_expdate_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_tbinstansi_validate_expdate();
  scCssBlur(oThis);
}

function sc_form_tbinstansi_expdate_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbinstansi_expdate_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbinstansi_policy_onblur(oThis, iSeqRow) {
  do_ajax_form_tbinstansi_validate_policy();
  scCssBlur(oThis);
}

function sc_form_tbinstansi_policy_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbinstansi_tempo_onblur(oThis, iSeqRow) {
  do_ajax_form_tbinstansi_validate_tempo();
  scCssBlur(oThis);
}

function sc_form_tbinstansi_tempo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbinstansi_marginobat_onblur(oThis, iSeqRow) {
  do_ajax_form_tbinstansi_validate_marginobat();
  scCssBlur(oThis);
}

function sc_form_tbinstansi_marginobat_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbinstansi_markuptindakan_onblur(oThis, iSeqRow) {
  do_ajax_form_tbinstansi_validate_markuptindakan();
  scCssBlur(oThis);
}

function sc_form_tbinstansi_markuptindakan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbinstansi_markupobat_onblur(oThis, iSeqRow) {
  do_ajax_form_tbinstansi_validate_markupobat();
  scCssBlur(oThis);
}

function sc_form_tbinstansi_markupobat_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbinstansi_markuplab_onblur(oThis, iSeqRow) {
  do_ajax_form_tbinstansi_validate_markuplab();
  scCssBlur(oThis);
}

function sc_form_tbinstansi_markuplab_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbinstansi_markuprad_onblur(oThis, iSeqRow) {
  do_ajax_form_tbinstansi_validate_markuprad();
  scCssBlur(oThis);
}

function sc_form_tbinstansi_markuprad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbinstansi_admpolitype_onblur(oThis, iSeqRow) {
  do_ajax_form_tbinstansi_validate_admpolitype();
  scCssBlur(oThis);
}

function sc_form_tbinstansi_admpolitype_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbinstansi_adminaptype_onblur(oThis, iSeqRow) {
  do_ajax_form_tbinstansi_validate_adminaptype();
  scCssBlur(oThis);
}

function sc_form_tbinstansi_adminaptype_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbinstansi_admpolibaru_onblur(oThis, iSeqRow) {
  do_ajax_form_tbinstansi_validate_admpolibaru();
  scCssBlur(oThis);
}

function sc_form_tbinstansi_admpolibaru_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbinstansi_admpolilama_onblur(oThis, iSeqRow) {
  do_ajax_form_tbinstansi_validate_admpolilama();
  scCssBlur(oThis);
}

function sc_form_tbinstansi_admpolilama_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbinstansi_adminap_onblur(oThis, iSeqRow) {
  do_ajax_form_tbinstansi_validate_adminap();
  scCssBlur(oThis);
}

function sc_form_tbinstansi_adminap_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbinstansi_lastupdated_onblur(oThis, iSeqRow) {
  do_ajax_form_tbinstansi_validate_lastupdated();
  scCssBlur(oThis);
}

function sc_form_tbinstansi_lastupdated_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_tbinstansi_validate_lastupdated();
  scCssBlur(oThis);
}

function sc_form_tbinstansi_lastupdated_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbinstansi_lastupdated_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbinstansi_marginpma_onblur(oThis, iSeqRow) {
  do_ajax_form_tbinstansi_validate_marginpma();
  scCssBlur(oThis);
}

function sc_form_tbinstansi_marginpma_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbinstansi_withpma_onblur(oThis, iSeqRow) {
  do_ajax_form_tbinstansi_validate_withpma();
  scCssBlur(oThis);
}

function sc_form_tbinstansi_withpma_onfocus(oThis, iSeqRow) {
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
}

function displayChange_block_0(status) {
	displayChange_field("instcode", "", status);
	displayChange_field("init", "", status);
	displayChange_field("name", "", status);
	displayChange_field("limit", "", status);
	displayChange_field("discount", "", status);
	displayChange_field("tempo", "", status);
	displayChange_field("lastupdated", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("address", "", status);
	displayChange_field("city", "", status);
	displayChange_field("phone", "", status);
	displayChange_field("fax", "", status);
	displayChange_field("cp", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("joindate", "", status);
	displayChange_field("expdate", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("marginobat", "", status);
	displayChange_field("markuptindakan", "", status);
	displayChange_field("markupobat", "", status);
	displayChange_field("markuplab", "", status);
	displayChange_field("markuprad", "", status);
	displayChange_field("admpolitype", "", status);
	displayChange_field("adminaptype", "", status);
	displayChange_field("admpolibaru", "", status);
	displayChange_field("admpolilama", "", status);
	displayChange_field("adminap", "", status);
	displayChange_field("marginpma", "", status);
	displayChange_field("withpma", "", status);
	displayChange_field("policy", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_instcode(row, status);
	displayChange_field_init(row, status);
	displayChange_field_name(row, status);
	displayChange_field_limit(row, status);
	displayChange_field_discount(row, status);
	displayChange_field_tempo(row, status);
	displayChange_field_lastupdated(row, status);
	displayChange_field_address(row, status);
	displayChange_field_city(row, status);
	displayChange_field_phone(row, status);
	displayChange_field_fax(row, status);
	displayChange_field_cp(row, status);
	displayChange_field_joindate(row, status);
	displayChange_field_expdate(row, status);
	displayChange_field_marginobat(row, status);
	displayChange_field_markuptindakan(row, status);
	displayChange_field_markupobat(row, status);
	displayChange_field_markuplab(row, status);
	displayChange_field_markuprad(row, status);
	displayChange_field_admpolitype(row, status);
	displayChange_field_adminaptype(row, status);
	displayChange_field_admpolibaru(row, status);
	displayChange_field_admpolilama(row, status);
	displayChange_field_adminap(row, status);
	displayChange_field_marginpma(row, status);
	displayChange_field_withpma(row, status);
	displayChange_field_policy(row, status);
}

function displayChange_field(field, row, status) {
	if ("instcode" == field) {
		displayChange_field_instcode(row, status);
	}
	if ("init" == field) {
		displayChange_field_init(row, status);
	}
	if ("name" == field) {
		displayChange_field_name(row, status);
	}
	if ("limit" == field) {
		displayChange_field_limit(row, status);
	}
	if ("discount" == field) {
		displayChange_field_discount(row, status);
	}
	if ("tempo" == field) {
		displayChange_field_tempo(row, status);
	}
	if ("lastupdated" == field) {
		displayChange_field_lastupdated(row, status);
	}
	if ("address" == field) {
		displayChange_field_address(row, status);
	}
	if ("city" == field) {
		displayChange_field_city(row, status);
	}
	if ("phone" == field) {
		displayChange_field_phone(row, status);
	}
	if ("fax" == field) {
		displayChange_field_fax(row, status);
	}
	if ("cp" == field) {
		displayChange_field_cp(row, status);
	}
	if ("joindate" == field) {
		displayChange_field_joindate(row, status);
	}
	if ("expdate" == field) {
		displayChange_field_expdate(row, status);
	}
	if ("marginobat" == field) {
		displayChange_field_marginobat(row, status);
	}
	if ("markuptindakan" == field) {
		displayChange_field_markuptindakan(row, status);
	}
	if ("markupobat" == field) {
		displayChange_field_markupobat(row, status);
	}
	if ("markuplab" == field) {
		displayChange_field_markuplab(row, status);
	}
	if ("markuprad" == field) {
		displayChange_field_markuprad(row, status);
	}
	if ("admpolitype" == field) {
		displayChange_field_admpolitype(row, status);
	}
	if ("adminaptype" == field) {
		displayChange_field_adminaptype(row, status);
	}
	if ("admpolibaru" == field) {
		displayChange_field_admpolibaru(row, status);
	}
	if ("admpolilama" == field) {
		displayChange_field_admpolilama(row, status);
	}
	if ("adminap" == field) {
		displayChange_field_adminap(row, status);
	}
	if ("marginpma" == field) {
		displayChange_field_marginpma(row, status);
	}
	if ("withpma" == field) {
		displayChange_field_withpma(row, status);
	}
	if ("policy" == field) {
		displayChange_field_policy(row, status);
	}
}

function displayChange_field_instcode(row, status) {
}

function displayChange_field_init(row, status) {
}

function displayChange_field_name(row, status) {
}

function displayChange_field_limit(row, status) {
}

function displayChange_field_discount(row, status) {
}

function displayChange_field_tempo(row, status) {
}

function displayChange_field_lastupdated(row, status) {
}

function displayChange_field_address(row, status) {
}

function displayChange_field_city(row, status) {
}

function displayChange_field_phone(row, status) {
}

function displayChange_field_fax(row, status) {
}

function displayChange_field_cp(row, status) {
}

function displayChange_field_joindate(row, status) {
}

function displayChange_field_expdate(row, status) {
}

function displayChange_field_marginobat(row, status) {
}

function displayChange_field_markuptindakan(row, status) {
}

function displayChange_field_markupobat(row, status) {
}

function displayChange_field_markuplab(row, status) {
}

function displayChange_field_markuprad(row, status) {
}

function displayChange_field_admpolitype(row, status) {
}

function displayChange_field_adminaptype(row, status) {
}

function displayChange_field_admpolibaru(row, status) {
}

function displayChange_field_admpolilama(row, status) {
}

function displayChange_field_adminap(row, status) {
}

function displayChange_field_marginpma(row, status) {
}

function displayChange_field_withpma(row, status) {
}

function displayChange_field_policy(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbinstansi_form" + pageNo).hide();
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
  $("#id_sc_field_lastupdated" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_lastupdated" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['lastupdated']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['lastupdated']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_tbinstansi_validate_lastupdated(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['lastupdated']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_joindate" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_joindate" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['joindate']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['joindate']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_tbinstansi_validate_joindate(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['joindate']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_expdate" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_expdate" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['expdate']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['expdate']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_tbinstansi_validate_expdate(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['expdate']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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

