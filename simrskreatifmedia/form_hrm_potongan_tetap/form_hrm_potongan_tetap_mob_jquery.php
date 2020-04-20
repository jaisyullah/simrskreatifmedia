
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
  scEventControl_data["id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_karyawan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pph_21" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["bpjs_tenaga_kerja" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["periode_remunerasi" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_karyawan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_karyawan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pph_21" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pph_21" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["bpjs_tenaga_kerja" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["bpjs_tenaga_kerja" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["periode_remunerasi" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["periode_remunerasi" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("id_karyawan" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("periode_remunerasi" + iSeq == fieldName) {
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
  $('#id_sc_field_id' + iSeqRow).bind('blur', function() { sc_form_hrm_potongan_tetap_id_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_hrm_potongan_tetap_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_pph_21' + iSeqRow).bind('blur', function() { sc_form_hrm_potongan_tetap_pph_21_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_hrm_potongan_tetap_pph_21_onfocus(this, iSeqRow) });
  $('#id_sc_field_bpjs_tenaga_kerja' + iSeqRow).bind('blur', function() { sc_form_hrm_potongan_tetap_bpjs_tenaga_kerja_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_hrm_potongan_tetap_bpjs_tenaga_kerja_onfocus(this, iSeqRow) });
  $('#id_sc_field_periode_remunerasi' + iSeqRow).bind('blur', function() { sc_form_hrm_potongan_tetap_periode_remunerasi_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_hrm_potongan_tetap_periode_remunerasi_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_karyawan' + iSeqRow).bind('blur', function() { sc_form_hrm_potongan_tetap_id_karyawan_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_hrm_potongan_tetap_id_karyawan_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_hrm_potongan_tetap_id_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_potongan_tetap_mob_validate_id();
  scCssBlur(oThis);
}

function sc_form_hrm_potongan_tetap_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_potongan_tetap_pph_21_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_potongan_tetap_mob_validate_pph_21();
  scCssBlur(oThis);
}

function sc_form_hrm_potongan_tetap_pph_21_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_potongan_tetap_bpjs_tenaga_kerja_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_potongan_tetap_mob_validate_bpjs_tenaga_kerja();
  scCssBlur(oThis);
}

function sc_form_hrm_potongan_tetap_bpjs_tenaga_kerja_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_potongan_tetap_periode_remunerasi_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_potongan_tetap_mob_validate_periode_remunerasi();
  scCssBlur(oThis);
}

function sc_form_hrm_potongan_tetap_periode_remunerasi_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_potongan_tetap_id_karyawan_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_potongan_tetap_mob_validate_id_karyawan();
  scCssBlur(oThis);
}

function sc_form_hrm_potongan_tetap_id_karyawan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("id", "", status);
	displayChange_field("id_karyawan", "", status);
	displayChange_field("pph_21", "", status);
	displayChange_field("bpjs_tenaga_kerja", "", status);
	displayChange_field("periode_remunerasi", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_id(row, status);
	displayChange_field_id_karyawan(row, status);
	displayChange_field_pph_21(row, status);
	displayChange_field_bpjs_tenaga_kerja(row, status);
	displayChange_field_periode_remunerasi(row, status);
}

function displayChange_field(field, row, status) {
	if ("id" == field) {
		displayChange_field_id(row, status);
	}
	if ("id_karyawan" == field) {
		displayChange_field_id_karyawan(row, status);
	}
	if ("pph_21" == field) {
		displayChange_field_pph_21(row, status);
	}
	if ("bpjs_tenaga_kerja" == field) {
		displayChange_field_bpjs_tenaga_kerja(row, status);
	}
	if ("periode_remunerasi" == field) {
		displayChange_field_periode_remunerasi(row, status);
	}
}

function displayChange_field_id(row, status) {
}

function displayChange_field_id_karyawan(row, status) {
}

function displayChange_field_pph_21(row, status) {
}

function displayChange_field_bpjs_tenaga_kerja(row, status) {
}

function displayChange_field_periode_remunerasi(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_hrm_potongan_tetap_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(35);
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
