
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
  scEventControl_data["sc_field_1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nostruk" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["custcode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_0" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["diagnosa1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["icd1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hta" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["uk" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dokter" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["selesai" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tglkeluar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["carakeluar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["alasankeluar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["resep" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["racikan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["trancode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["trancode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nostruk" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nostruk" + iSeqRow]["change"]) {
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
  if (scEventControl_data["hta" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hta" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["uk" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["uk" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dokter" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dokter" + iSeqRow]["change"]) {
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
  if (scEventControl_data["resep" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["resep" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["racikan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["racikan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["icd1" + iSeqRow]["autocomp"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("sc_field_1" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("custcode" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("sc_field_0" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("dokter" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("selesai" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("carakeluar" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("iskonsul" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("sc_field_1" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("nostruk" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
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
  $('#id_sc_field_trancode' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatjalanF_trancode_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbdetailrawatjalanF_trancode_onfocus(this, iSeqRow) });
  $('#id_sc_field_dokter' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatjalanF_dokter_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbdetailrawatjalanF_dokter_onfocus(this, iSeqRow) });
  $('#id_sc_field_selesai' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatjalanF_selesai_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_tbdetailrawatjalanF_selesai_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbdetailrawatjalanF_selesai_onfocus(this, iSeqRow) });
  $('#id_sc_field_tglkeluar' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatjalanF_tglkeluar_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbdetailrawatjalanF_tglkeluar_onfocus(this, iSeqRow) });
  $('#id_sc_field_tglkeluar_hora' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatjalanF_tglkeluar_hora_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_tbdetailrawatjalanF_tglkeluar_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_carakeluar' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatjalanF_carakeluar_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbdetailrawatjalanF_carakeluar_onfocus(this, iSeqRow) });
  $('#id_sc_field_alasankeluar' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatjalanF_alasankeluar_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tbdetailrawatjalanF_alasankeluar_onfocus(this, iSeqRow) });
  $('#id_sc_field_custcode' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatjalanF_custcode_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_tbdetailrawatjalanF_custcode_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbdetailrawatjalanF_custcode_onfocus(this, iSeqRow) });
  $('#id_sc_field_nostruk' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatjalanF_nostruk_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_tbdetailrawatjalanF_nostruk_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbdetailrawatjalanF_nostruk_onfocus(this, iSeqRow) });
  $('#id_sc_field_diagnosa1' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatjalanF_diagnosa1_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbdetailrawatjalanF_diagnosa1_onfocus(this, iSeqRow) });
  $('#id_sc_field_icd1' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatjalanF_icd1_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tbdetailrawatjalanF_icd1_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_0' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatjalanF_sc_field_0_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbdetailrawatjalanF_sc_field_0_onfocus(this, iSeqRow) });
  $('#id_sc_field_resep' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatjalanF_resep_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbdetailrawatjalanF_resep_onfocus(this, iSeqRow) });
  $('#id_sc_field_hta' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatjalanF_hta_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tbdetailrawatjalanF_hta_onfocus(this, iSeqRow) });
  $('#id_sc_field_tp' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatjalanF_tp_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_tbdetailrawatjalanF_tp_onfocus(this, iSeqRow) });
  $('#id_sc_field_uk' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatjalanF_uk_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_tbdetailrawatjalanF_uk_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_1' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatjalanF_sc_field_1_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_tbdetailrawatjalanF_sc_field_1_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbdetailrawatjalanF_sc_field_1_onfocus(this, iSeqRow) });
  $('#id_sc_field_racikan' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatjalanF_racikan_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbdetailrawatjalanF_racikan_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbdetailrawatjalanF_trancode_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatjalanF_validate_trancode();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatjalanF_trancode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatjalanF_dokter_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatjalanF_validate_dokter();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatjalanF_dokter_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatjalanF_selesai_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatjalanF_validate_selesai();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatjalanF_selesai_onchange(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatjalanF_event_selesai_onchange();
}

function sc_form_tbdetailrawatjalanF_selesai_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatjalanF_tglkeluar_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatjalanF_validate_tglkeluar();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatjalanF_tglkeluar_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatjalanF_validate_tglkeluar();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatjalanF_tglkeluar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatjalanF_tglkeluar_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatjalanF_carakeluar_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatjalanF_validate_carakeluar();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatjalanF_carakeluar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatjalanF_alasankeluar_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatjalanF_validate_alasankeluar();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatjalanF_alasankeluar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatjalanF_custcode_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatjalanF_validate_custcode();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatjalanF_custcode_onchange(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatjalanF_refresh_custcode();
}

function sc_form_tbdetailrawatjalanF_custcode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatjalanF_nostruk_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatjalanF_validate_nostruk();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatjalanF_nostruk_onchange(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatjalanF_event_nostruk_onchange();
}

function sc_form_tbdetailrawatjalanF_nostruk_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatjalanF_diagnosa1_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatjalanF_validate_diagnosa1();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatjalanF_diagnosa1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatjalanF_icd1_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatjalanF_validate_icd1();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatjalanF_icd1_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatjalanF_sc_field_0_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatjalanF_validate_sc_field_0();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatjalanF_sc_field_0_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatjalanF_resep_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatjalanF_validate_resep();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatjalanF_resep_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatjalanF_hta_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatjalanF_validate_hta();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatjalanF_hta_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatjalanF_tp_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatjalanF_validate_tp();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatjalanF_tp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatjalanF_uk_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatjalanF_validate_uk();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatjalanF_uk_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatjalanF_sc_field_1_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatjalanF_validate_sc_field_1();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatjalanF_sc_field_1_onchange(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatjalanF_event_sc_field_1_onchange();
}

function sc_form_tbdetailrawatjalanF_sc_field_1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdetailrawatjalanF_racikan_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatjalanF_validate_racikan();
  scCssBlur(oThis);
}

function sc_form_tbdetailrawatjalanF_racikan_onfocus(oThis, iSeqRow) {
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
}

function displayChange_block_0(status) {
	displayChange_field("trancode", "", status);
	displayChange_field("sc_field_1", "", status);
	displayChange_field("nostruk", "", status);
	displayChange_field("custcode", "", status);
	displayChange_field("sc_field_0", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("diagnosa1", "", status);
	displayChange_field("icd1", "", status);
	displayChange_field("hta", "", status);
	displayChange_field("tp", "", status);
	displayChange_field("uk", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("dokter", "", status);
	displayChange_field("selesai", "", status);
	displayChange_field("tglkeluar", "", status);
	displayChange_field("carakeluar", "", status);
	displayChange_field("alasankeluar", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("resep", "", status);
}

function displayChange_block_4(status) {
	displayChange_field("racikan", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_trancode(row, status);
	displayChange_field_sc_field_1(row, status);
	displayChange_field_nostruk(row, status);
	displayChange_field_custcode(row, status);
	displayChange_field_sc_field_0(row, status);
	displayChange_field_diagnosa1(row, status);
	displayChange_field_icd1(row, status);
	displayChange_field_hta(row, status);
	displayChange_field_tp(row, status);
	displayChange_field_uk(row, status);
	displayChange_field_dokter(row, status);
	displayChange_field_selesai(row, status);
	displayChange_field_tglkeluar(row, status);
	displayChange_field_carakeluar(row, status);
	displayChange_field_alasankeluar(row, status);
	displayChange_field_resep(row, status);
	displayChange_field_racikan(row, status);
}

function displayChange_field(field, row, status) {
	if ("trancode" == field) {
		displayChange_field_trancode(row, status);
	}
	if ("sc_field_1" == field) {
		displayChange_field_sc_field_1(row, status);
	}
	if ("nostruk" == field) {
		displayChange_field_nostruk(row, status);
	}
	if ("custcode" == field) {
		displayChange_field_custcode(row, status);
	}
	if ("sc_field_0" == field) {
		displayChange_field_sc_field_0(row, status);
	}
	if ("diagnosa1" == field) {
		displayChange_field_diagnosa1(row, status);
	}
	if ("icd1" == field) {
		displayChange_field_icd1(row, status);
	}
	if ("hta" == field) {
		displayChange_field_hta(row, status);
	}
	if ("tp" == field) {
		displayChange_field_tp(row, status);
	}
	if ("uk" == field) {
		displayChange_field_uk(row, status);
	}
	if ("dokter" == field) {
		displayChange_field_dokter(row, status);
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
	if ("resep" == field) {
		displayChange_field_resep(row, status);
	}
	if ("racikan" == field) {
		displayChange_field_racikan(row, status);
	}
}

function displayChange_field_trancode(row, status) {
}

function displayChange_field_sc_field_1(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_sc_field_1__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_sc_field_1" + row).select2("destroy");
		}
		scJQSelect2Add(row, "sc_field_1");
	}
}

function displayChange_field_nostruk(row, status) {
}

function displayChange_field_custcode(row, status) {
}

function displayChange_field_sc_field_0(row, status) {
}

function displayChange_field_diagnosa1(row, status) {
}

function displayChange_field_icd1(row, status) {
}

function displayChange_field_hta(row, status) {
}

function displayChange_field_tp(row, status) {
}

function displayChange_field_uk(row, status) {
}

function displayChange_field_dokter(row, status) {
}

function displayChange_field_selesai(row, status) {
}

function displayChange_field_tglkeluar(row, status) {
}

function displayChange_field_carakeluar(row, status) {
}

function displayChange_field_alasankeluar(row, status) {
}

function displayChange_field_resep(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbreseprawatjalanF")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbreseprawatjalanF")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_racikan(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbracikan")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbracikan")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
	displayChange_field_sc_field_1("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbdetailrawatjalanF_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(32);
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
      do_ajax_form_tbdetailrawatjalanF_validate_tglkeluar(iSeqRow);
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
  if (null == specificField || "sc_field_1" == specificField) {
    scJQSelect2Add_sc_field_1(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_sc_field_1(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_sc_field_1_obj" : "#id_sc_field_sc_field_1" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_sc_field_1_obj',
      dropdownCssClass: 'css_sc_field_1_obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_sc_field_1) { displayChange_field_sc_field_1(iLine, "on"); } }, 150);
} // scJQElementsAdd

