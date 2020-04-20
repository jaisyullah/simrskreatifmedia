
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
  scEventControl_data["jenistindakan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kodetindakan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kategori" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["namatindakan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["keterangan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["aktif" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tarifrajal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tarifinap" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["jenistindakan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jenistindakan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kodetindakan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kodetindakan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kategori" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kategori" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["namatindakan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["namatindakan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["keterangan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["keterangan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["aktif" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["aktif" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tarifrajal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tarifrajal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tarifinap" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tarifinap" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("jenistindakan" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("kategori" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("kategori" + iSeq == fieldName) {
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
  $('#id_sc_field_jenistindakan' + iSeqRow).bind('blur', function() { sc_form_tbtindakan_jenistindakan_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_tbtindakan_jenistindakan_onfocus(this, iSeqRow) });
  $('#id_sc_field_kodetindakan' + iSeqRow).bind('blur', function() { sc_form_tbtindakan_kodetindakan_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tbtindakan_kodetindakan_onfocus(this, iSeqRow) });
  $('#id_sc_field_kategori' + iSeqRow).bind('blur', function() { sc_form_tbtindakan_kategori_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_tbtindakan_kategori_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbtindakan_kategori_onfocus(this, iSeqRow) });
  $('#id_sc_field_namatindakan' + iSeqRow).bind('blur', function() { sc_form_tbtindakan_namatindakan_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tbtindakan_namatindakan_onfocus(this, iSeqRow) });
  $('#id_sc_field_keterangan' + iSeqRow).bind('blur', function() { sc_form_tbtindakan_keterangan_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbtindakan_keterangan_onfocus(this, iSeqRow) });
  $('#id_sc_field_aktif' + iSeqRow).bind('blur', function() { sc_form_tbtindakan_aktif_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbtindakan_aktif_onfocus(this, iSeqRow) });
  $('#id_sc_field_tarifinap' + iSeqRow).bind('blur', function() { sc_form_tbtindakan_tarifinap_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbtindakan_tarifinap_onfocus(this, iSeqRow) });
  $('#id_sc_field_tarifrajal' + iSeqRow).bind('blur', function() { sc_form_tbtindakan_tarifrajal_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbtindakan_tarifrajal_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbtindakan_jenistindakan_onblur(oThis, iSeqRow) {
  do_ajax_form_tbtindakan_mob_validate_jenistindakan();
  scCssBlur(oThis);
}

function sc_form_tbtindakan_jenistindakan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbtindakan_kodetindakan_onblur(oThis, iSeqRow) {
  do_ajax_form_tbtindakan_mob_validate_kodetindakan();
  scCssBlur(oThis);
}

function sc_form_tbtindakan_kodetindakan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbtindakan_kategori_onblur(oThis, iSeqRow) {
  do_ajax_form_tbtindakan_mob_validate_kategori();
  scCssBlur(oThis);
}

function sc_form_tbtindakan_kategori_onchange(oThis, iSeqRow) {
  do_ajax_form_tbtindakan_mob_event_kategori_onchange();
}

function sc_form_tbtindakan_kategori_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbtindakan_namatindakan_onblur(oThis, iSeqRow) {
  do_ajax_form_tbtindakan_mob_validate_namatindakan();
  scCssBlur(oThis);
}

function sc_form_tbtindakan_namatindakan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbtindakan_keterangan_onblur(oThis, iSeqRow) {
  do_ajax_form_tbtindakan_mob_validate_keterangan();
  scCssBlur(oThis);
}

function sc_form_tbtindakan_keterangan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbtindakan_aktif_onblur(oThis, iSeqRow) {
  do_ajax_form_tbtindakan_mob_validate_aktif();
  scCssBlur(oThis);
}

function sc_form_tbtindakan_aktif_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbtindakan_tarifinap_onblur(oThis, iSeqRow) {
  do_ajax_form_tbtindakan_mob_validate_tarifinap();
  scCssBlur(oThis);
}

function sc_form_tbtindakan_tarifinap_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbtindakan_tarifrajal_onblur(oThis, iSeqRow) {
  do_ajax_form_tbtindakan_mob_validate_tarifrajal();
  scCssBlur(oThis);
}

function sc_form_tbtindakan_tarifrajal_onfocus(oThis, iSeqRow) {
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
	displayChange_field("jenistindakan", "", status);
	displayChange_field("kodetindakan", "", status);
	displayChange_field("kategori", "", status);
	displayChange_field("namatindakan", "", status);
	displayChange_field("keterangan", "", status);
	displayChange_field("aktif", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("tarifrajal", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("tarifinap", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_jenistindakan(row, status);
	displayChange_field_kodetindakan(row, status);
	displayChange_field_kategori(row, status);
	displayChange_field_namatindakan(row, status);
	displayChange_field_keterangan(row, status);
	displayChange_field_aktif(row, status);
	displayChange_field_tarifrajal(row, status);
	displayChange_field_tarifinap(row, status);
}

function displayChange_field(field, row, status) {
	if ("jenistindakan" == field) {
		displayChange_field_jenistindakan(row, status);
	}
	if ("kodetindakan" == field) {
		displayChange_field_kodetindakan(row, status);
	}
	if ("kategori" == field) {
		displayChange_field_kategori(row, status);
	}
	if ("namatindakan" == field) {
		displayChange_field_namatindakan(row, status);
	}
	if ("keterangan" == field) {
		displayChange_field_keterangan(row, status);
	}
	if ("aktif" == field) {
		displayChange_field_aktif(row, status);
	}
	if ("tarifrajal" == field) {
		displayChange_field_tarifrajal(row, status);
	}
	if ("tarifinap" == field) {
		displayChange_field_tarifinap(row, status);
	}
}

function displayChange_field_jenistindakan(row, status) {
}

function displayChange_field_kodetindakan(row, status) {
}

function displayChange_field_kategori(row, status) {
}

function displayChange_field_namatindakan(row, status) {
}

function displayChange_field_keterangan(row, status) {
}

function displayChange_field_aktif(row, status) {
}

function displayChange_field_tarifrajal(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbtarifrj_mob")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbtarifrj_mob")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_tarifinap(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbtarifri_mob")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbtarifri_mob")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbtindakan_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(27);
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
