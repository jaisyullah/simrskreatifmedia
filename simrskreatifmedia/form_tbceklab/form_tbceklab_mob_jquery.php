
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
  scEventControl_data["ceklab" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["namalab" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jenis" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pemeriksaan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nilairujukandari" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nilairujukansampai" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tarif" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["ceklab" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ceklab" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["namalab" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["namalab" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jenis" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jenis" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pemeriksaan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pemeriksaan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nilairujukandari" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nilairujukandari" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nilairujukansampai" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nilairujukansampai" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tarif" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tarif" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jenis" + iSeqRow]["autocomp"]) {
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
  $('#id_sc_field_ceklab' + iSeqRow).bind('blur', function() { sc_form_tbceklab_ceklab_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbceklab_ceklab_onfocus(this, iSeqRow) });
  $('#id_sc_field_namalab' + iSeqRow).bind('blur', function() { sc_form_tbceklab_namalab_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbceklab_namalab_onfocus(this, iSeqRow) });
  $('#id_sc_field_jenis' + iSeqRow).bind('blur', function() { sc_form_tbceklab_jenis_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbceklab_jenis_onfocus(this, iSeqRow) });
  $('#id_sc_field_nilairujukandari' + iSeqRow).bind('blur', function() { sc_form_tbceklab_nilairujukandari_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_tbceklab_nilairujukandari_onfocus(this, iSeqRow) });
  $('#id_sc_field_nilairujukansampai' + iSeqRow).bind('blur', function() { sc_form_tbceklab_nilairujukansampai_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_tbceklab_nilairujukansampai_onfocus(this, iSeqRow) });
  $('#id_sc_field_pemeriksaan' + iSeqRow).bind('blur', function() { sc_form_tbceklab_pemeriksaan_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbceklab_pemeriksaan_onfocus(this, iSeqRow) });
  $('#id_sc_field_tarif' + iSeqRow).bind('blur', function() { sc_form_tbceklab_tarif_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbceklab_tarif_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbceklab_ceklab_onblur(oThis, iSeqRow) {
  do_ajax_form_tbceklab_mob_validate_ceklab();
  scCssBlur(oThis);
}

function sc_form_tbceklab_ceklab_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbceklab_namalab_onblur(oThis, iSeqRow) {
  do_ajax_form_tbceklab_mob_validate_namalab();
  scCssBlur(oThis);
}

function sc_form_tbceklab_namalab_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbceklab_jenis_onblur(oThis, iSeqRow) {
  do_ajax_form_tbceklab_mob_validate_jenis();
  scCssBlur(oThis);
}

function sc_form_tbceklab_jenis_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_tbceklab_nilairujukandari_onblur(oThis, iSeqRow) {
  do_ajax_form_tbceklab_mob_validate_nilairujukandari();
  scCssBlur(oThis);
}

function sc_form_tbceklab_nilairujukandari_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbceklab_nilairujukansampai_onblur(oThis, iSeqRow) {
  do_ajax_form_tbceklab_mob_validate_nilairujukansampai();
  scCssBlur(oThis);
}

function sc_form_tbceklab_nilairujukansampai_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbceklab_pemeriksaan_onblur(oThis, iSeqRow) {
  do_ajax_form_tbceklab_mob_validate_pemeriksaan();
  scCssBlur(oThis);
}

function sc_form_tbceklab_pemeriksaan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbceklab_tarif_onblur(oThis, iSeqRow) {
  do_ajax_form_tbceklab_mob_validate_tarif();
  scCssBlur(oThis);
}

function sc_form_tbceklab_tarif_onfocus(oThis, iSeqRow) {
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
	displayChange_field("ceklab", "", status);
	displayChange_field("namalab", "", status);
	displayChange_field("jenis", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("pemeriksaan", "", status);
	displayChange_field("nilairujukandari", "", status);
	displayChange_field("nilairujukansampai", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("tarif", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_ceklab(row, status);
	displayChange_field_namalab(row, status);
	displayChange_field_jenis(row, status);
	displayChange_field_pemeriksaan(row, status);
	displayChange_field_nilairujukandari(row, status);
	displayChange_field_nilairujukansampai(row, status);
	displayChange_field_tarif(row, status);
}

function displayChange_field(field, row, status) {
	if ("ceklab" == field) {
		displayChange_field_ceklab(row, status);
	}
	if ("namalab" == field) {
		displayChange_field_namalab(row, status);
	}
	if ("jenis" == field) {
		displayChange_field_jenis(row, status);
	}
	if ("pemeriksaan" == field) {
		displayChange_field_pemeriksaan(row, status);
	}
	if ("nilairujukandari" == field) {
		displayChange_field_nilairujukandari(row, status);
	}
	if ("nilairujukansampai" == field) {
		displayChange_field_nilairujukansampai(row, status);
	}
	if ("tarif" == field) {
		displayChange_field_tarif(row, status);
	}
}

function displayChange_field_ceklab(row, status) {
}

function displayChange_field_namalab(row, status) {
}

function displayChange_field_jenis(row, status) {
}

function displayChange_field_pemeriksaan(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbdetaillab_mob")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbdetaillab_mob")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_nilairujukandari(row, status) {
}

function displayChange_field_nilairujukansampai(row, status) {
}

function displayChange_field_tarif(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tariflab_mob")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tariflab_mob")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbceklab_mob_form" + pageNo).hide();
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
