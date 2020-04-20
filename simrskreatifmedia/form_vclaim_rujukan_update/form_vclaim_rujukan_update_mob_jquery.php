
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
  scEventControl_data["norujukan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ppkdirujuk" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nmppkdirujuk" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jnspelayanan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["catatan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["diagrujukan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nmdiagrujukan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tiperujukan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["polirujukan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nmpolirujukan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["user" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["norujukan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["norujukan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ppkdirujuk" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ppkdirujuk" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nmppkdirujuk" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nmppkdirujuk" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jnspelayanan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jnspelayanan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["catatan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["catatan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["diagrujukan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["diagrujukan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nmdiagrujukan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nmdiagrujukan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tiperujukan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tiperujukan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["polirujukan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["polirujukan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nmpolirujukan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nmpolirujukan" + iSeqRow]["change"]) {
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
  if ("tiperujukan" + iSeq == fieldName) {
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
  $('#id_sc_field_ppkdirujuk' + iSeqRow).bind('blur', function() { sc_form_vclaim_rujukan_update_ppkdirujuk_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_vclaim_rujukan_update_ppkdirujuk_onfocus(this, iSeqRow) });
  $('#id_sc_field_nmppkdirujuk' + iSeqRow).bind('blur', function() { sc_form_vclaim_rujukan_update_nmppkdirujuk_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_vclaim_rujukan_update_nmppkdirujuk_onfocus(this, iSeqRow) });
  $('#id_sc_field_jnspelayanan' + iSeqRow).bind('blur', function() { sc_form_vclaim_rujukan_update_jnspelayanan_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_vclaim_rujukan_update_jnspelayanan_onfocus(this, iSeqRow) });
  $('#id_sc_field_catatan' + iSeqRow).bind('blur', function() { sc_form_vclaim_rujukan_update_catatan_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_vclaim_rujukan_update_catatan_onfocus(this, iSeqRow) });
  $('#id_sc_field_diagrujukan' + iSeqRow).bind('blur', function() { sc_form_vclaim_rujukan_update_diagrujukan_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_vclaim_rujukan_update_diagrujukan_onfocus(this, iSeqRow) });
  $('#id_sc_field_tiperujukan' + iSeqRow).bind('blur', function() { sc_form_vclaim_rujukan_update_tiperujukan_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_vclaim_rujukan_update_tiperujukan_onfocus(this, iSeqRow) });
  $('#id_sc_field_polirujukan' + iSeqRow).bind('blur', function() { sc_form_vclaim_rujukan_update_polirujukan_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_vclaim_rujukan_update_polirujukan_onfocus(this, iSeqRow) });
  $('#id_sc_field_user' + iSeqRow).bind('blur', function() { sc_form_vclaim_rujukan_update_user_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_vclaim_rujukan_update_user_onfocus(this, iSeqRow) });
  $('#id_sc_field_nmdiagrujukan' + iSeqRow).bind('blur', function() { sc_form_vclaim_rujukan_update_nmdiagrujukan_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_vclaim_rujukan_update_nmdiagrujukan_onfocus(this, iSeqRow) });
  $('#id_sc_field_nmpolirujukan' + iSeqRow).bind('blur', function() { sc_form_vclaim_rujukan_update_nmpolirujukan_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_vclaim_rujukan_update_nmpolirujukan_onfocus(this, iSeqRow) });
  $('#id_sc_field_norujukan' + iSeqRow).bind('blur', function() { sc_form_vclaim_rujukan_update_norujukan_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_vclaim_rujukan_update_norujukan_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_vclaim_rujukan_update_ppkdirujuk_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_rujukan_update_mob_validate_ppkdirujuk();
  scCssBlur(oThis);
}

function sc_form_vclaim_rujukan_update_ppkdirujuk_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_rujukan_update_nmppkdirujuk_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_rujukan_update_mob_validate_nmppkdirujuk();
  scCssBlur(oThis);
}

function sc_form_vclaim_rujukan_update_nmppkdirujuk_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_rujukan_update_jnspelayanan_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_rujukan_update_mob_validate_jnspelayanan();
  scCssBlur(oThis);
}

function sc_form_vclaim_rujukan_update_jnspelayanan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_rujukan_update_catatan_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_rujukan_update_mob_validate_catatan();
  scCssBlur(oThis);
}

function sc_form_vclaim_rujukan_update_catatan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_rujukan_update_diagrujukan_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_rujukan_update_mob_validate_diagrujukan();
  scCssBlur(oThis);
}

function sc_form_vclaim_rujukan_update_diagrujukan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_rujukan_update_tiperujukan_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_rujukan_update_mob_validate_tiperujukan();
  scCssBlur(oThis);
}

function sc_form_vclaim_rujukan_update_tiperujukan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_rujukan_update_polirujukan_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_rujukan_update_mob_validate_polirujukan();
  scCssBlur(oThis);
}

function sc_form_vclaim_rujukan_update_polirujukan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_rujukan_update_user_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_rujukan_update_mob_validate_user();
  scCssBlur(oThis);
}

function sc_form_vclaim_rujukan_update_user_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_rujukan_update_nmdiagrujukan_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_rujukan_update_mob_validate_nmdiagrujukan();
  scCssBlur(oThis);
}

function sc_form_vclaim_rujukan_update_nmdiagrujukan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_rujukan_update_nmpolirujukan_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_rujukan_update_mob_validate_nmpolirujukan();
  scCssBlur(oThis);
}

function sc_form_vclaim_rujukan_update_nmpolirujukan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_vclaim_rujukan_update_norujukan_onblur(oThis, iSeqRow) {
  do_ajax_form_vclaim_rujukan_update_mob_validate_norujukan();
  scCssBlur(oThis);
}

function sc_form_vclaim_rujukan_update_norujukan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("norujukan", "", status);
	displayChange_field("ppkdirujuk", "", status);
	displayChange_field("nmppkdirujuk", "", status);
	displayChange_field("jnspelayanan", "", status);
	displayChange_field("catatan", "", status);
	displayChange_field("diagrujukan", "", status);
	displayChange_field("nmdiagrujukan", "", status);
	displayChange_field("tiperujukan", "", status);
	displayChange_field("polirujukan", "", status);
	displayChange_field("nmpolirujukan", "", status);
	displayChange_field("user", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_norujukan(row, status);
	displayChange_field_ppkdirujuk(row, status);
	displayChange_field_nmppkdirujuk(row, status);
	displayChange_field_jnspelayanan(row, status);
	displayChange_field_catatan(row, status);
	displayChange_field_diagrujukan(row, status);
	displayChange_field_nmdiagrujukan(row, status);
	displayChange_field_tiperujukan(row, status);
	displayChange_field_polirujukan(row, status);
	displayChange_field_nmpolirujukan(row, status);
	displayChange_field_user(row, status);
}

function displayChange_field(field, row, status) {
	if ("norujukan" == field) {
		displayChange_field_norujukan(row, status);
	}
	if ("ppkdirujuk" == field) {
		displayChange_field_ppkdirujuk(row, status);
	}
	if ("nmppkdirujuk" == field) {
		displayChange_field_nmppkdirujuk(row, status);
	}
	if ("jnspelayanan" == field) {
		displayChange_field_jnspelayanan(row, status);
	}
	if ("catatan" == field) {
		displayChange_field_catatan(row, status);
	}
	if ("diagrujukan" == field) {
		displayChange_field_diagrujukan(row, status);
	}
	if ("nmdiagrujukan" == field) {
		displayChange_field_nmdiagrujukan(row, status);
	}
	if ("tiperujukan" == field) {
		displayChange_field_tiperujukan(row, status);
	}
	if ("polirujukan" == field) {
		displayChange_field_polirujukan(row, status);
	}
	if ("nmpolirujukan" == field) {
		displayChange_field_nmpolirujukan(row, status);
	}
	if ("user" == field) {
		displayChange_field_user(row, status);
	}
}

function displayChange_field_norujukan(row, status) {
}

function displayChange_field_ppkdirujuk(row, status) {
}

function displayChange_field_nmppkdirujuk(row, status) {
}

function displayChange_field_jnspelayanan(row, status) {
}

function displayChange_field_catatan(row, status) {
}

function displayChange_field_diagrujukan(row, status) {
}

function displayChange_field_nmdiagrujukan(row, status) {
}

function displayChange_field_tiperujukan(row, status) {
}

function displayChange_field_polirujukan(row, status) {
}

function displayChange_field_nmpolirujukan(row, status) {
}

function displayChange_field_user(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_vclaim_rujukan_update_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(38);
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

