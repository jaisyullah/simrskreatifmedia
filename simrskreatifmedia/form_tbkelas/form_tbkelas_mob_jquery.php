
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
  scEventControl_data["idkelas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["namakelas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fasilitas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tarifkamar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["idkelas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idkelas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["namakelas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["namakelas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fasilitas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fasilitas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tarifkamar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tarifkamar" + iSeqRow]["change"]) {
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
  $('#id_sc_field_idkelas' + iSeqRow).bind('blur', function() { sc_form_tbkelas_idkelas_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbkelas_idkelas_onfocus(this, iSeqRow) });
  $('#id_sc_field_namakelas' + iSeqRow).bind('blur', function() { sc_form_tbkelas_namakelas_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbkelas_namakelas_onfocus(this, iSeqRow) });
  $('#id_sc_field_fasilitas' + iSeqRow).bind('blur', function() { sc_form_tbkelas_fasilitas_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbkelas_fasilitas_onfocus(this, iSeqRow) });
  $('#id_sc_field_tarifkamar' + iSeqRow).bind('blur', function() { sc_form_tbkelas_tarifkamar_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbkelas_tarifkamar_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbkelas_idkelas_onblur(oThis, iSeqRow) {
  do_ajax_form_tbkelas_mob_validate_idkelas();
  scCssBlur(oThis);
}

function sc_form_tbkelas_idkelas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbkelas_namakelas_onblur(oThis, iSeqRow) {
  do_ajax_form_tbkelas_mob_validate_namakelas();
  scCssBlur(oThis);
}

function sc_form_tbkelas_namakelas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbkelas_fasilitas_onblur(oThis, iSeqRow) {
  do_ajax_form_tbkelas_mob_validate_fasilitas();
  scCssBlur(oThis);
}

function sc_form_tbkelas_fasilitas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbkelas_tarifkamar_onblur(oThis, iSeqRow) {
  do_ajax_form_tbkelas_mob_validate_tarifkamar();
  scCssBlur(oThis);
}

function sc_form_tbkelas_tarifkamar_onfocus(oThis, iSeqRow) {
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
	displayChange_field("idkelas", "", status);
	displayChange_field("namakelas", "", status);
	displayChange_field("fasilitas", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("tarifkamar", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_idkelas(row, status);
	displayChange_field_namakelas(row, status);
	displayChange_field_fasilitas(row, status);
	displayChange_field_tarifkamar(row, status);
}

function displayChange_field(field, row, status) {
	if ("idkelas" == field) {
		displayChange_field_idkelas(row, status);
	}
	if ("namakelas" == field) {
		displayChange_field_namakelas(row, status);
	}
	if ("fasilitas" == field) {
		displayChange_field_fasilitas(row, status);
	}
	if ("tarifkamar" == field) {
		displayChange_field_tarifkamar(row, status);
	}
}

function displayChange_field_idkelas(row, status) {
}

function displayChange_field_namakelas(row, status) {
}

function displayChange_field_fasilitas(row, status) {
}

function displayChange_field_tarifkamar(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbtarifinap_mob")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbtarifinap_mob")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbkelas_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(24);
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
