
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
  scEventControl_data["trancode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["item" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["satuan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jumlah" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["signa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jenisaturanpakai" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["biaya" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["strukresep" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["trancode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["trancode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["item" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["item" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["satuan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["satuan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jumlah" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jumlah" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["signa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["signa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jenisaturanpakai" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jenisaturanpakai" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["biaya" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["biaya" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["strukresep" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["strukresep" + iSeqRow]["change"]) {
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
  $('#id_sc_field_id' + iSeqRow).bind('blur', function() { sc_form_detailresepinap_del_id_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_detailresepinap_del_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_trancode' + iSeqRow).bind('blur', function() { sc_form_detailresepinap_del_trancode_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_detailresepinap_del_trancode_onfocus(this, iSeqRow) });
  $('#id_sc_field_item' + iSeqRow).bind('blur', function() { sc_form_detailresepinap_del_item_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_detailresepinap_del_item_onfocus(this, iSeqRow) });
  $('#id_sc_field_satuan' + iSeqRow).bind('blur', function() { sc_form_detailresepinap_del_satuan_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_detailresepinap_del_satuan_onfocus(this, iSeqRow) });
  $('#id_sc_field_jumlah' + iSeqRow).bind('blur', function() { sc_form_detailresepinap_del_jumlah_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_detailresepinap_del_jumlah_onfocus(this, iSeqRow) });
  $('#id_sc_field_signa' + iSeqRow).bind('blur', function() { sc_form_detailresepinap_del_signa_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_detailresepinap_del_signa_onfocus(this, iSeqRow) });
  $('#id_sc_field_jenisaturanpakai' + iSeqRow).bind('blur', function() { sc_form_detailresepinap_del_jenisaturanpakai_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_detailresepinap_del_jenisaturanpakai_onfocus(this, iSeqRow) });
  $('#id_sc_field_biaya' + iSeqRow).bind('blur', function() { sc_form_detailresepinap_del_biaya_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_detailresepinap_del_biaya_onfocus(this, iSeqRow) });
  $('#id_sc_field_strukresep' + iSeqRow).bind('blur', function() { sc_form_detailresepinap_del_strukresep_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_detailresepinap_del_strukresep_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_detailresepinap_del_id_onblur(oThis, iSeqRow) {
  do_ajax_form_detailresepinap_del_mob_validate_id();
  scCssBlur(oThis);
}

function sc_form_detailresepinap_del_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_detailresepinap_del_trancode_onblur(oThis, iSeqRow) {
  do_ajax_form_detailresepinap_del_mob_validate_trancode();
  scCssBlur(oThis);
}

function sc_form_detailresepinap_del_trancode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_detailresepinap_del_item_onblur(oThis, iSeqRow) {
  do_ajax_form_detailresepinap_del_mob_validate_item();
  scCssBlur(oThis);
}

function sc_form_detailresepinap_del_item_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_detailresepinap_del_satuan_onblur(oThis, iSeqRow) {
  do_ajax_form_detailresepinap_del_mob_validate_satuan();
  scCssBlur(oThis);
}

function sc_form_detailresepinap_del_satuan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_detailresepinap_del_jumlah_onblur(oThis, iSeqRow) {
  do_ajax_form_detailresepinap_del_mob_validate_jumlah();
  scCssBlur(oThis);
}

function sc_form_detailresepinap_del_jumlah_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_detailresepinap_del_signa_onblur(oThis, iSeqRow) {
  do_ajax_form_detailresepinap_del_mob_validate_signa();
  scCssBlur(oThis);
}

function sc_form_detailresepinap_del_signa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_detailresepinap_del_jenisaturanpakai_onblur(oThis, iSeqRow) {
  do_ajax_form_detailresepinap_del_mob_validate_jenisaturanpakai();
  scCssBlur(oThis);
}

function sc_form_detailresepinap_del_jenisaturanpakai_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_detailresepinap_del_biaya_onblur(oThis, iSeqRow) {
  do_ajax_form_detailresepinap_del_mob_validate_biaya();
  scCssBlur(oThis);
}

function sc_form_detailresepinap_del_biaya_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_detailresepinap_del_strukresep_onblur(oThis, iSeqRow) {
  do_ajax_form_detailresepinap_del_mob_validate_strukresep();
  scCssBlur(oThis);
}

function sc_form_detailresepinap_del_strukresep_onfocus(oThis, iSeqRow) {
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
	displayChange_field("trancode", "", status);
	displayChange_field("item", "", status);
	displayChange_field("satuan", "", status);
	displayChange_field("jumlah", "", status);
	displayChange_field("signa", "", status);
	displayChange_field("jenisaturanpakai", "", status);
	displayChange_field("biaya", "", status);
	displayChange_field("strukresep", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_id(row, status);
	displayChange_field_trancode(row, status);
	displayChange_field_item(row, status);
	displayChange_field_satuan(row, status);
	displayChange_field_jumlah(row, status);
	displayChange_field_signa(row, status);
	displayChange_field_jenisaturanpakai(row, status);
	displayChange_field_biaya(row, status);
	displayChange_field_strukresep(row, status);
}

function displayChange_field(field, row, status) {
	if ("id" == field) {
		displayChange_field_id(row, status);
	}
	if ("trancode" == field) {
		displayChange_field_trancode(row, status);
	}
	if ("item" == field) {
		displayChange_field_item(row, status);
	}
	if ("satuan" == field) {
		displayChange_field_satuan(row, status);
	}
	if ("jumlah" == field) {
		displayChange_field_jumlah(row, status);
	}
	if ("signa" == field) {
		displayChange_field_signa(row, status);
	}
	if ("jenisaturanpakai" == field) {
		displayChange_field_jenisaturanpakai(row, status);
	}
	if ("biaya" == field) {
		displayChange_field_biaya(row, status);
	}
	if ("strukresep" == field) {
		displayChange_field_strukresep(row, status);
	}
}

function displayChange_field_id(row, status) {
}

function displayChange_field_trancode(row, status) {
}

function displayChange_field_item(row, status) {
}

function displayChange_field_satuan(row, status) {
}

function displayChange_field_jumlah(row, status) {
}

function displayChange_field_signa(row, status) {
}

function displayChange_field_jenisaturanpakai(row, status) {
}

function displayChange_field_biaya(row, status) {
}

function displayChange_field_strukresep(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_detailresepinap_del_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(36);
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
