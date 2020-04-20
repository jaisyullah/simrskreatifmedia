
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
  scEventControl_data["nosep" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tglmasuk" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tglkeluar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jaminan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["poli" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nmpoli" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ruangrawat" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kelasrawat" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["spesialistik" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["carakeluar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kondisipulang" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["diagnosa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["procedure" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tindaklanjut" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dirujukkodeppk" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tglkontrol" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["polikontrolkembali" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dpjp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["user" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["nosep" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nosep" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tglmasuk" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tglmasuk" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tglkeluar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tglkeluar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jaminan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jaminan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["poli" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["poli" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nmpoli" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nmpoli" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ruangrawat" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ruangrawat" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kelasrawat" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kelasrawat" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["spesialistik" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["spesialistik" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["carakeluar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["carakeluar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kondisipulang" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kondisipulang" + iSeqRow]["change"]) {
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
  if (scEventControl_data["tindaklanjut" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tindaklanjut" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dirujukkodeppk" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dirujukkodeppk" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tglkontrol" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tglkontrol" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["polikontrolkembali" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["polikontrolkembali" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dpjp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dpjp" + iSeqRow]["change"]) {
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
  $('#id_sc_field_nosep' + iSeqRow).bind('blur', function() { sc_form_vclaim_lpk_insert_nosep_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_vclaim_lpk_insert_nosep_onfocus(this, iSeqRow) });
  $('#id_sc_field_tglmasuk' + iSeqRow).bind('blur', function() { sc_form_vclaim_lpk_insert_tglmasuk_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_vclaim_lpk_insert_tglmasuk_onfocus(this, iSeqRow) });
  $('#id_sc_field_tglkeluar' + iSeqRow).bind('blur', function() { sc_form_vclaim_lpk_insert_tglkeluar_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_vclaim_lpk_insert_tglkeluar_onfocus(this, iSeqRow) });
  $('#id_sc_field_jaminan' + iSeqRow).bind('blur', function() { sc_form_vclaim_lpk_insert_jaminan_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_vclaim_lpk_insert_jaminan_onfocus(this, iSeqRow) });
  $('#id_sc_field_poli' + iSeqRow).bind('blur', function() { sc_form_vclaim_lpk_insert_poli_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_vclaim_lpk_insert_poli_onfocus(this, iSeqRow) });
  $('#id_sc_field_nmpoli' + iSeqRow).bind('blur', function() { sc_form_vclaim_lpk_insert_nmpoli_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_vclaim_lpk_insert_nmpoli_onfocus(this, iSeqRow) });
  $('#id_sc_field_ruangrawat' + iSeqRow).bind('blur', function() { sc_form_vclaim_lpk_insert_ruangrawat_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_vclaim_lpk_insert_ruangrawat_onfocus(this, iSeqRow) });
  $('#id_sc_field_kelasrawat' + iSeqRow).bind('blur', function() { sc_form_vclaim_lpk_insert_kelasrawat_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_vclaim_lpk_insert_kelasrawat_onfocus(this, iSeqRow) });
  $('#id_sc_field_spesialistik' + iSeqRow).bind('blur', function() { sc_form_vclaim_lpk_insert_spesialistik_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_vclaim_lpk_insert_spesialistik_onfocus(this, iSeqRow) });
  $('#id_sc_field_carakeluar' + iSeqRow).bind('blur', function() { sc_form_vclaim_lpk_insert_carakeluar_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_vclaim_lpk_insert_carakeluar_onfocus(this, iSeqRow) });
  $('#id_sc_field_kondisipulang' + iSeqRow).bind('blur', function() { sc_form_vclaim_lpk_insert_kondisipulang_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_vclaim_lpk_insert_kondisipulang_onfocus(this, iSeqRow) });
  $('#id_sc_field_diagnosa' + iSeqRow).bind('blur', function() { sc_form_vclaim_lpk_insert_diagnosa_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_vclaim_lpk_insert_diagnosa_onfocus(this, iSeqRow) });
  $('#id_sc_field_procedure' + iSeqRow).bind('blur', function() { sc_form_vclaim_lpk_insert_procedure_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_vclaim_lpk_insert_procedure_onfocus(this, iSeqRow) });
  $('#id_sc_field_tindaklanjut' + iSeqRow).bind('blur', function() { sc_form_vclaim_lpk_insert_tindaklanjut_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_vclaim_lpk_insert_tindaklanjut_onfocus(this, iSeqRow) });
  $('#id_sc_field_dirujukkodeppk' + iSeqRow).bind('blur', function() { sc_form_vclaim_lpk_insert_dirujukkodeppk_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_vclaim_lpk_insert_dirujukkodeppk_onfocus(this, iSeqRow) });
  $('#id_sc_field_tglkontrol' + iSeqRow).bind('blur', function() { sc_form_vclaim_lpk_insert_tglkontrol_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_vclaim_lpk_insert_tglkontrol_onfocus(this, iSeqRow) });
  $('#id_sc_field_polikontrolkembali' + iSeqRow).bind('blur', function() { sc_form_vclaim_lpk_insert_polikontrolkembali_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_vclaim_lpk_insert_polikontrolkembali_onfocus(this, iSeqRow) });
  $('#id_sc_field_dpjp' + iSeqRow).bind('blur', function() { sc_form_vclaim_lpk_insert_dpjp_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_vclaim_lpk_insert_dpjp_onfocus(this, iSeqRow) });
  $('#id_sc_field_user' + iSeqRow).bind('blur', function() { sc_form_vclaim_lpk_insert_user_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_vclaim_lpk_insert_user_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_vclaim_lpk_insert_nosep_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_lpk_insert_mob_validate_nosep();
  scCssBlur(oThis);
}

function sc_form_vclaim_lpk_insert_nosep_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_lpk_insert_tglmasuk_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_lpk_insert_mob_validate_tglmasuk();
  scCssBlur(oThis);
}

function sc_form_vclaim_lpk_insert_tglmasuk_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_lpk_insert_tglkeluar_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_lpk_insert_mob_validate_tglkeluar();
  scCssBlur(oThis);
}

function sc_form_vclaim_lpk_insert_tglkeluar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_lpk_insert_jaminan_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_lpk_insert_mob_validate_jaminan();
  scCssBlur(oThis);
}

function sc_form_vclaim_lpk_insert_jaminan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_lpk_insert_poli_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_lpk_insert_mob_validate_poli();
  scCssBlur(oThis);
}

function sc_form_vclaim_lpk_insert_poli_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_lpk_insert_nmpoli_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_lpk_insert_mob_validate_nmpoli();
  scCssBlur(oThis);
}

function sc_form_vclaim_lpk_insert_nmpoli_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_lpk_insert_ruangrawat_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_lpk_insert_mob_validate_ruangrawat();
  scCssBlur(oThis);
}

function sc_form_vclaim_lpk_insert_ruangrawat_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_lpk_insert_kelasrawat_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_lpk_insert_mob_validate_kelasrawat();
  scCssBlur(oThis);
}

function sc_form_vclaim_lpk_insert_kelasrawat_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_lpk_insert_spesialistik_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_lpk_insert_mob_validate_spesialistik();
  scCssBlur(oThis);
}

function sc_form_vclaim_lpk_insert_spesialistik_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_lpk_insert_carakeluar_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_lpk_insert_mob_validate_carakeluar();
  scCssBlur(oThis);
}

function sc_form_vclaim_lpk_insert_carakeluar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_lpk_insert_kondisipulang_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_lpk_insert_mob_validate_kondisipulang();
  scCssBlur(oThis);
}

function sc_form_vclaim_lpk_insert_kondisipulang_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_lpk_insert_diagnosa_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_lpk_insert_mob_validate_diagnosa();
  scCssBlur(oThis);
}

function sc_form_vclaim_lpk_insert_diagnosa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_lpk_insert_procedure_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_lpk_insert_mob_validate_procedure();
  scCssBlur(oThis);
}

function sc_form_vclaim_lpk_insert_procedure_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_lpk_insert_tindaklanjut_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_lpk_insert_mob_validate_tindaklanjut();
  scCssBlur(oThis);
}

function sc_form_vclaim_lpk_insert_tindaklanjut_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_lpk_insert_dirujukkodeppk_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_lpk_insert_mob_validate_dirujukkodeppk();
  scCssBlur(oThis);
}

function sc_form_vclaim_lpk_insert_dirujukkodeppk_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_lpk_insert_tglkontrol_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_lpk_insert_mob_validate_tglkontrol();
  scCssBlur(oThis);
}

function sc_form_vclaim_lpk_insert_tglkontrol_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_lpk_insert_polikontrolkembali_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_lpk_insert_mob_validate_polikontrolkembali();
  scCssBlur(oThis);
}

function sc_form_vclaim_lpk_insert_polikontrolkembali_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_lpk_insert_dpjp_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_lpk_insert_mob_validate_dpjp();
  scCssBlur(oThis);
}

function sc_form_vclaim_lpk_insert_dpjp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_lpk_insert_user_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_lpk_insert_mob_validate_user();
  scCssBlur(oThis);
}

function sc_form_vclaim_lpk_insert_user_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("nosep", "", status);
	displayChange_field("tglmasuk", "", status);
	displayChange_field("tglkeluar", "", status);
	displayChange_field("jaminan", "", status);
	displayChange_field("poli", "", status);
	displayChange_field("nmpoli", "", status);
	displayChange_field("ruangrawat", "", status);
	displayChange_field("kelasrawat", "", status);
	displayChange_field("spesialistik", "", status);
	displayChange_field("carakeluar", "", status);
	displayChange_field("kondisipulang", "", status);
	displayChange_field("diagnosa", "", status);
	displayChange_field("procedure", "", status);
	displayChange_field("tindaklanjut", "", status);
	displayChange_field("dirujukkodeppk", "", status);
	displayChange_field("tglkontrol", "", status);
	displayChange_field("polikontrolkembali", "", status);
	displayChange_field("dpjp", "", status);
	displayChange_field("user", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_nosep(row, status);
	displayChange_field_tglmasuk(row, status);
	displayChange_field_tglkeluar(row, status);
	displayChange_field_jaminan(row, status);
	displayChange_field_poli(row, status);
	displayChange_field_nmpoli(row, status);
	displayChange_field_ruangrawat(row, status);
	displayChange_field_kelasrawat(row, status);
	displayChange_field_spesialistik(row, status);
	displayChange_field_carakeluar(row, status);
	displayChange_field_kondisipulang(row, status);
	displayChange_field_diagnosa(row, status);
	displayChange_field_procedure(row, status);
	displayChange_field_tindaklanjut(row, status);
	displayChange_field_dirujukkodeppk(row, status);
	displayChange_field_tglkontrol(row, status);
	displayChange_field_polikontrolkembali(row, status);
	displayChange_field_dpjp(row, status);
	displayChange_field_user(row, status);
}

function displayChange_field(field, row, status) {
	if ("nosep" == field) {
		displayChange_field_nosep(row, status);
	}
	if ("tglmasuk" == field) {
		displayChange_field_tglmasuk(row, status);
	}
	if ("tglkeluar" == field) {
		displayChange_field_tglkeluar(row, status);
	}
	if ("jaminan" == field) {
		displayChange_field_jaminan(row, status);
	}
	if ("poli" == field) {
		displayChange_field_poli(row, status);
	}
	if ("nmpoli" == field) {
		displayChange_field_nmpoli(row, status);
	}
	if ("ruangrawat" == field) {
		displayChange_field_ruangrawat(row, status);
	}
	if ("kelasrawat" == field) {
		displayChange_field_kelasrawat(row, status);
	}
	if ("spesialistik" == field) {
		displayChange_field_spesialistik(row, status);
	}
	if ("carakeluar" == field) {
		displayChange_field_carakeluar(row, status);
	}
	if ("kondisipulang" == field) {
		displayChange_field_kondisipulang(row, status);
	}
	if ("diagnosa" == field) {
		displayChange_field_diagnosa(row, status);
	}
	if ("procedure" == field) {
		displayChange_field_procedure(row, status);
	}
	if ("tindaklanjut" == field) {
		displayChange_field_tindaklanjut(row, status);
	}
	if ("dirujukkodeppk" == field) {
		displayChange_field_dirujukkodeppk(row, status);
	}
	if ("tglkontrol" == field) {
		displayChange_field_tglkontrol(row, status);
	}
	if ("polikontrolkembali" == field) {
		displayChange_field_polikontrolkembali(row, status);
	}
	if ("dpjp" == field) {
		displayChange_field_dpjp(row, status);
	}
	if ("user" == field) {
		displayChange_field_user(row, status);
	}
}

function displayChange_field_nosep(row, status) {
}

function displayChange_field_tglmasuk(row, status) {
}

function displayChange_field_tglkeluar(row, status) {
}

function displayChange_field_jaminan(row, status) {
}

function displayChange_field_poli(row, status) {
}

function displayChange_field_nmpoli(row, status) {
}

function displayChange_field_ruangrawat(row, status) {
}

function displayChange_field_kelasrawat(row, status) {
}

function displayChange_field_spesialistik(row, status) {
}

function displayChange_field_carakeluar(row, status) {
}

function displayChange_field_kondisipulang(row, status) {
}

function displayChange_field_diagnosa(row, status) {
}

function displayChange_field_procedure(row, status) {
}

function displayChange_field_tindaklanjut(row, status) {
}

function displayChange_field_dirujukkodeppk(row, status) {
}

function displayChange_field_tglkontrol(row, status) {
}

function displayChange_field_polikontrolkembali(row, status) {
}

function displayChange_field_dpjp(row, status) {
}

function displayChange_field_user(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_vclaim_lpk_insert_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(34);
		}
	}
}
function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

