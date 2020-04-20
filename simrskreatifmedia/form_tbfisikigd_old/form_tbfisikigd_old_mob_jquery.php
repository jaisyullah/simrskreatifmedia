
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
  scEventControl_data["tinggi" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["berat" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detakjantung" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tekanandarah" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["suhu" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nafas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["keluhan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pemeriksa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tglperiksa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["tinggi" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tinggi" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["berat" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["berat" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detakjantung" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detakjantung" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tekanandarah" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tekanandarah" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["suhu" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["suhu" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nafas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nafas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["keluhan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["keluhan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pemeriksa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pemeriksa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tglperiksa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tglperiksa" + iSeqRow]["change"]) {
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
  $('#id_sc_field_tinggi' + iSeqRow).bind('blur', function() { sc_form_tbfisikigd_old_tinggi_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbfisikigd_old_tinggi_onfocus(this, iSeqRow) });
  $('#id_sc_field_berat' + iSeqRow).bind('blur', function() { sc_form_tbfisikigd_old_berat_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbfisikigd_old_berat_onfocus(this, iSeqRow) });
  $('#id_sc_field_detakjantung' + iSeqRow).bind('blur', function() { sc_form_tbfisikigd_old_detakjantung_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tbfisikigd_old_detakjantung_onfocus(this, iSeqRow) });
  $('#id_sc_field_tekanandarah' + iSeqRow).bind('blur', function() { sc_form_tbfisikigd_old_tekanandarah_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tbfisikigd_old_tekanandarah_onfocus(this, iSeqRow) });
  $('#id_sc_field_suhu' + iSeqRow).bind('blur', function() { sc_form_tbfisikigd_old_suhu_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tbfisikigd_old_suhu_onfocus(this, iSeqRow) });
  $('#id_sc_field_nafas' + iSeqRow).bind('blur', function() { sc_form_tbfisikigd_old_nafas_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbfisikigd_old_nafas_onfocus(this, iSeqRow) });
  $('#id_sc_field_keluhan' + iSeqRow).bind('blur', function() { sc_form_tbfisikigd_old_keluhan_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbfisikigd_old_keluhan_onfocus(this, iSeqRow) });
  $('#id_sc_field_pemeriksa' + iSeqRow).bind('blur', function() { sc_form_tbfisikigd_old_pemeriksa_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbfisikigd_old_pemeriksa_onfocus(this, iSeqRow) });
  $('#id_sc_field_tglperiksa' + iSeqRow).bind('blur', function() { sc_form_tbfisikigd_old_tglperiksa_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbfisikigd_old_tglperiksa_onfocus(this, iSeqRow) });
  $('#id_sc_field_tglperiksa_hora' + iSeqRow).bind('blur', function() { sc_form_tbfisikigd_old_tglperiksa_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_tbfisikigd_old_tglperiksa_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbfisikigd_old_tinggi_onblur(oThis, iSeqRow) {
  do_ajax_form_tbfisikigd_old_mob_validate_tinggi();
  scCssBlur(oThis);
}

function sc_form_tbfisikigd_old_tinggi_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbfisikigd_old_berat_onblur(oThis, iSeqRow) {
  do_ajax_form_tbfisikigd_old_mob_validate_berat();
  scCssBlur(oThis);
}

function sc_form_tbfisikigd_old_berat_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbfisikigd_old_detakjantung_onblur(oThis, iSeqRow) {
  do_ajax_form_tbfisikigd_old_mob_validate_detakjantung();
  scCssBlur(oThis);
}

function sc_form_tbfisikigd_old_detakjantung_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbfisikigd_old_tekanandarah_onblur(oThis, iSeqRow) {
  do_ajax_form_tbfisikigd_old_mob_validate_tekanandarah();
  scCssBlur(oThis);
}

function sc_form_tbfisikigd_old_tekanandarah_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbfisikigd_old_suhu_onblur(oThis, iSeqRow) {
  do_ajax_form_tbfisikigd_old_mob_validate_suhu();
  scCssBlur(oThis);
}

function sc_form_tbfisikigd_old_suhu_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbfisikigd_old_nafas_onblur(oThis, iSeqRow) {
  do_ajax_form_tbfisikigd_old_mob_validate_nafas();
  scCssBlur(oThis);
}

function sc_form_tbfisikigd_old_nafas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbfisikigd_old_keluhan_onblur(oThis, iSeqRow) {
  do_ajax_form_tbfisikigd_old_mob_validate_keluhan();
  scCssBlur(oThis);
}

function sc_form_tbfisikigd_old_keluhan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbfisikigd_old_pemeriksa_onblur(oThis, iSeqRow) {
  do_ajax_form_tbfisikigd_old_mob_validate_pemeriksa();
  scCssBlur(oThis);
}

function sc_form_tbfisikigd_old_pemeriksa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbfisikigd_old_tglperiksa_onblur(oThis, iSeqRow) {
  do_ajax_form_tbfisikigd_old_mob_validate_tglperiksa();
  scCssBlur(oThis);
}

function sc_form_tbfisikigd_old_tglperiksa_onblur(oThis, iSeqRow) {
  do_ajax_form_tbfisikigd_old_mob_validate_tglperiksa();
  scCssBlur(oThis);
}

function sc_form_tbfisikigd_old_tglperiksa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbfisikigd_old_tglperiksa_onfocus(oThis, iSeqRow) {
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
}

function displayChange_block_0(status) {
	displayChange_field("tinggi", "", status);
	displayChange_field("berat", "", status);
	displayChange_field("detakjantung", "", status);
	displayChange_field("tekanandarah", "", status);
	displayChange_field("suhu", "", status);
	displayChange_field("nafas", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("keluhan", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("pemeriksa", "", status);
	displayChange_field("tglperiksa", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_tinggi(row, status);
	displayChange_field_berat(row, status);
	displayChange_field_detakjantung(row, status);
	displayChange_field_tekanandarah(row, status);
	displayChange_field_suhu(row, status);
	displayChange_field_nafas(row, status);
	displayChange_field_keluhan(row, status);
	displayChange_field_pemeriksa(row, status);
	displayChange_field_tglperiksa(row, status);
}

function displayChange_field(field, row, status) {
	if ("tinggi" == field) {
		displayChange_field_tinggi(row, status);
	}
	if ("berat" == field) {
		displayChange_field_berat(row, status);
	}
	if ("detakjantung" == field) {
		displayChange_field_detakjantung(row, status);
	}
	if ("tekanandarah" == field) {
		displayChange_field_tekanandarah(row, status);
	}
	if ("suhu" == field) {
		displayChange_field_suhu(row, status);
	}
	if ("nafas" == field) {
		displayChange_field_nafas(row, status);
	}
	if ("keluhan" == field) {
		displayChange_field_keluhan(row, status);
	}
	if ("pemeriksa" == field) {
		displayChange_field_pemeriksa(row, status);
	}
	if ("tglperiksa" == field) {
		displayChange_field_tglperiksa(row, status);
	}
}

function displayChange_field_tinggi(row, status) {
}

function displayChange_field_berat(row, status) {
}

function displayChange_field_detakjantung(row, status) {
}

function displayChange_field_tekanandarah(row, status) {
}

function displayChange_field_suhu(row, status) {
}

function displayChange_field_nafas(row, status) {
}

function displayChange_field_keluhan(row, status) {
}

function displayChange_field_pemeriksa(row, status) {
}

function displayChange_field_tglperiksa(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbfisikigd_old_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(31);
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
