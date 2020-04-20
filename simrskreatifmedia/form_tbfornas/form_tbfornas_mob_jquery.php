
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
  scEventControl_data["nama_obat" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["satuan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["keterangan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["maks_usage" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nama_obat" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nama_obat" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["satuan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["satuan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["keterangan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["keterangan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["maks_usage" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["maks_usage" + iSeqRow]["change"]) {
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
  $('#id_sc_field_id' + iSeqRow).bind('blur', function() { sc_form_tbfornas_id_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_tbfornas_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_nama_obat' + iSeqRow).bind('blur', function() { sc_form_tbfornas_nama_obat_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbfornas_nama_obat_onfocus(this, iSeqRow) });
  $('#id_sc_field_satuan' + iSeqRow).bind('blur', function() { sc_form_tbfornas_satuan_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbfornas_satuan_onfocus(this, iSeqRow) });
  $('#id_sc_field_keterangan' + iSeqRow).bind('blur', function() { sc_form_tbfornas_keterangan_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbfornas_keterangan_onfocus(this, iSeqRow) });
  $('#id_sc_field_maks_usage' + iSeqRow).bind('blur', function() { sc_form_tbfornas_maks_usage_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbfornas_maks_usage_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbfornas_id_onblur(oThis, iSeqRow) {
  do_ajax_form_tbfornas_mob_validate_id();
  scCssBlur(oThis);
}

function sc_form_tbfornas_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbfornas_nama_obat_onblur(oThis, iSeqRow) {
  do_ajax_form_tbfornas_mob_validate_nama_obat();
  scCssBlur(oThis);
}

function sc_form_tbfornas_nama_obat_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbfornas_satuan_onblur(oThis, iSeqRow) {
  do_ajax_form_tbfornas_mob_validate_satuan();
  scCssBlur(oThis);
}

function sc_form_tbfornas_satuan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbfornas_keterangan_onblur(oThis, iSeqRow) {
  do_ajax_form_tbfornas_mob_validate_keterangan();
  scCssBlur(oThis);
}

function sc_form_tbfornas_keterangan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbfornas_maks_usage_onblur(oThis, iSeqRow) {
  do_ajax_form_tbfornas_mob_validate_maks_usage();
  scCssBlur(oThis);
}

function sc_form_tbfornas_maks_usage_onfocus(oThis, iSeqRow) {
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
	displayChange_field("nama_obat", "", status);
	displayChange_field("satuan", "", status);
	displayChange_field("keterangan", "", status);
	displayChange_field("maks_usage", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_id(row, status);
	displayChange_field_nama_obat(row, status);
	displayChange_field_satuan(row, status);
	displayChange_field_keterangan(row, status);
	displayChange_field_maks_usage(row, status);
}

function displayChange_field(field, row, status) {
	if ("id" == field) {
		displayChange_field_id(row, status);
	}
	if ("nama_obat" == field) {
		displayChange_field_nama_obat(row, status);
	}
	if ("satuan" == field) {
		displayChange_field_satuan(row, status);
	}
	if ("keterangan" == field) {
		displayChange_field_keterangan(row, status);
	}
	if ("maks_usage" == field) {
		displayChange_field_maks_usage(row, status);
	}
}

function displayChange_field_id(row, status) {
}

function displayChange_field_nama_obat(row, status) {
}

function displayChange_field_satuan(row, status) {
}

function displayChange_field_keterangan(row, status) {
}

function displayChange_field_maks_usage(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbfornas_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(25);
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
