
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
  scEventControl_data["pbfcode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pbfname" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jenis" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["address" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["disc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["city" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["phone" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fax" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["status" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["pbfcode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pbfcode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pbfname" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pbfname" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jenis" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jenis" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["address" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["address" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["disc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["disc" + iSeqRow]["change"]) {
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
  if (scEventControl_data["status" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["status" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("jenis" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("status" + iSeq == fieldName) {
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
  $('#id_sc_field_pbfcode' + iSeqRow).bind('blur', function() { sc_form_tbpbf_pbfcode_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbpbf_pbfcode_onfocus(this, iSeqRow) });
  $('#id_sc_field_pbfname' + iSeqRow).bind('blur', function() { sc_form_tbpbf_pbfname_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbpbf_pbfname_onfocus(this, iSeqRow) });
  $('#id_sc_field_address' + iSeqRow).bind('blur', function() { sc_form_tbpbf_address_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbpbf_address_onfocus(this, iSeqRow) });
  $('#id_sc_field_city' + iSeqRow).bind('blur', function() { sc_form_tbpbf_city_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tbpbf_city_onfocus(this, iSeqRow) });
  $('#id_sc_field_phone' + iSeqRow).bind('blur', function() { sc_form_tbpbf_phone_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbpbf_phone_onfocus(this, iSeqRow) });
  $('#id_sc_field_fax' + iSeqRow).bind('blur', function() { sc_form_tbpbf_fax_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tbpbf_fax_onfocus(this, iSeqRow) });
  $('#id_sc_field_cp' + iSeqRow).bind('blur', function() { sc_form_tbpbf_cp_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_tbpbf_cp_onfocus(this, iSeqRow) });
  $('#id_sc_field_status' + iSeqRow).bind('blur', function() { sc_form_tbpbf_status_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbpbf_status_onfocus(this, iSeqRow) });
  $('#id_sc_field_disc' + iSeqRow).bind('blur', function() { sc_form_tbpbf_disc_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tbpbf_disc_onfocus(this, iSeqRow) });
  $('#id_sc_field_jenis' + iSeqRow).bind('blur', function() { sc_form_tbpbf_jenis_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbpbf_jenis_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbpbf_pbfcode_onblur(oThis, iSeqRow) {
  do_ajax_form_tbpbf_mob_validate_pbfcode();
  scCssBlur(oThis);
}

function sc_form_tbpbf_pbfcode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbpbf_pbfname_onblur(oThis, iSeqRow) {
  do_ajax_form_tbpbf_mob_validate_pbfname();
  scCssBlur(oThis);
}

function sc_form_tbpbf_pbfname_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbpbf_address_onblur(oThis, iSeqRow) {
  do_ajax_form_tbpbf_mob_validate_address();
  scCssBlur(oThis);
}

function sc_form_tbpbf_address_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbpbf_city_onblur(oThis, iSeqRow) {
  do_ajax_form_tbpbf_mob_validate_city();
  scCssBlur(oThis);
}

function sc_form_tbpbf_city_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbpbf_phone_onblur(oThis, iSeqRow) {
  do_ajax_form_tbpbf_mob_validate_phone();
  scCssBlur(oThis);
}

function sc_form_tbpbf_phone_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbpbf_fax_onblur(oThis, iSeqRow) {
  do_ajax_form_tbpbf_mob_validate_fax();
  scCssBlur(oThis);
}

function sc_form_tbpbf_fax_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbpbf_cp_onblur(oThis, iSeqRow) {
  do_ajax_form_tbpbf_mob_validate_cp();
  scCssBlur(oThis);
}

function sc_form_tbpbf_cp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbpbf_status_onblur(oThis, iSeqRow) {
  do_ajax_form_tbpbf_mob_validate_status();
  scCssBlur(oThis);
}

function sc_form_tbpbf_status_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbpbf_disc_onblur(oThis, iSeqRow) {
  do_ajax_form_tbpbf_mob_validate_disc();
  scCssBlur(oThis);
}

function sc_form_tbpbf_disc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbpbf_jenis_onblur(oThis, iSeqRow) {
  do_ajax_form_tbpbf_mob_validate_jenis();
  scCssBlur(oThis);
}

function sc_form_tbpbf_jenis_onfocus(oThis, iSeqRow) {
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
}

function displayChange_block_0(status) {
	displayChange_field("pbfcode", "", status);
	displayChange_field("pbfname", "", status);
	displayChange_field("jenis", "", status);
	displayChange_field("address", "", status);
	displayChange_field("disc", "", status);
	displayChange_field("city", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("phone", "", status);
	displayChange_field("fax", "", status);
	displayChange_field("cp", "", status);
	displayChange_field("status", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_pbfcode(row, status);
	displayChange_field_pbfname(row, status);
	displayChange_field_jenis(row, status);
	displayChange_field_address(row, status);
	displayChange_field_disc(row, status);
	displayChange_field_city(row, status);
	displayChange_field_phone(row, status);
	displayChange_field_fax(row, status);
	displayChange_field_cp(row, status);
	displayChange_field_status(row, status);
}

function displayChange_field(field, row, status) {
	if ("pbfcode" == field) {
		displayChange_field_pbfcode(row, status);
	}
	if ("pbfname" == field) {
		displayChange_field_pbfname(row, status);
	}
	if ("jenis" == field) {
		displayChange_field_jenis(row, status);
	}
	if ("address" == field) {
		displayChange_field_address(row, status);
	}
	if ("disc" == field) {
		displayChange_field_disc(row, status);
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
	if ("status" == field) {
		displayChange_field_status(row, status);
	}
}

function displayChange_field_pbfcode(row, status) {
}

function displayChange_field_pbfname(row, status) {
}

function displayChange_field_jenis(row, status) {
}

function displayChange_field_address(row, status) {
}

function displayChange_field_disc(row, status) {
}

function displayChange_field_city(row, status) {
}

function displayChange_field_phone(row, status) {
}

function displayChange_field_fax(row, status) {
}

function displayChange_field_cp(row, status) {
}

function displayChange_field_status(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbpbf_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(22);
		}
	}
}
function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

function scJQSelect2Add(seqRow, specificField) {
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
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
