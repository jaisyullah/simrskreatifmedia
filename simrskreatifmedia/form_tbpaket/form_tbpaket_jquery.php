
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
  scEventControl_data["kodepaket" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hargapaket" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["namapaket" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["aktif" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["unit" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["akomodasi" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tindakan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_0" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["kodepaket" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kodepaket" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hargapaket" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hargapaket" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["namapaket" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["namapaket" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["aktif" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["aktif" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["unit" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["unit" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["akomodasi" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["akomodasi" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tindakan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tindakan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_0" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_0" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_1" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("aktif" + iSeq == fieldName) {
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
  $('#id_sc_field_kodepaket' + iSeqRow).bind('blur', function() { sc_form_tbpaket_kodepaket_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbpaket_kodepaket_onfocus(this, iSeqRow) });
  $('#id_sc_field_namapaket' + iSeqRow).bind('blur', function() { sc_form_tbpaket_namapaket_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbpaket_namapaket_onfocus(this, iSeqRow) });
  $('#id_sc_field_hargapaket' + iSeqRow).bind('blur', function() { sc_form_tbpaket_hargapaket_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbpaket_hargapaket_onfocus(this, iSeqRow) });
  $('#id_sc_field_aktif' + iSeqRow).bind('blur', function() { sc_form_tbpaket_aktif_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbpaket_aktif_onfocus(this, iSeqRow) });
  $('#id_sc_field_unit' + iSeqRow).bind('blur', function() { sc_form_tbpaket_unit_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tbpaket_unit_onfocus(this, iSeqRow) });
  $('#id_sc_field_akomodasi' + iSeqRow).bind('blur', function() { sc_form_tbpaket_akomodasi_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbpaket_akomodasi_onfocus(this, iSeqRow) });
  $('#id_sc_field_tindakan' + iSeqRow).bind('blur', function() { sc_form_tbpaket_tindakan_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbpaket_tindakan_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_0' + iSeqRow).bind('blur', function() { sc_form_tbpaket_sc_field_0_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbpaket_sc_field_0_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_1' + iSeqRow).bind('blur', function() { sc_form_tbpaket_sc_field_1_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbpaket_sc_field_1_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbpaket_kodepaket_onblur(oThis, iSeqRow) {
  do_ajax_form_tbpaket_validate_kodepaket();
  scCssBlur(oThis);
}

function sc_form_tbpaket_kodepaket_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbpaket_namapaket_onblur(oThis, iSeqRow) {
  do_ajax_form_tbpaket_validate_namapaket();
  scCssBlur(oThis);
}

function sc_form_tbpaket_namapaket_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbpaket_hargapaket_onblur(oThis, iSeqRow) {
  do_ajax_form_tbpaket_validate_hargapaket();
  scCssBlur(oThis);
}

function sc_form_tbpaket_hargapaket_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbpaket_aktif_onblur(oThis, iSeqRow) {
  do_ajax_form_tbpaket_validate_aktif();
  scCssBlur(oThis);
}

function sc_form_tbpaket_aktif_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbpaket_unit_onblur(oThis, iSeqRow) {
  do_ajax_form_tbpaket_validate_unit();
  scCssBlur(oThis);
}

function sc_form_tbpaket_unit_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbpaket_akomodasi_onblur(oThis, iSeqRow) {
  do_ajax_form_tbpaket_validate_akomodasi();
  scCssBlur(oThis);
}

function sc_form_tbpaket_akomodasi_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbpaket_tindakan_onblur(oThis, iSeqRow) {
  do_ajax_form_tbpaket_validate_tindakan();
  scCssBlur(oThis);
}

function sc_form_tbpaket_tindakan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbpaket_sc_field_0_onblur(oThis, iSeqRow) {
  do_ajax_form_tbpaket_validate_sc_field_0();
  scCssBlur(oThis);
}

function sc_form_tbpaket_sc_field_0_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbpaket_sc_field_1_onblur(oThis, iSeqRow) {
  do_ajax_form_tbpaket_validate_sc_field_1();
  scCssBlur(oThis);
}

function sc_form_tbpaket_sc_field_1_onfocus(oThis, iSeqRow) {
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
	if ("3" == block) {
		displayChange_block_3(status);
	}
	if ("4" == block) {
		displayChange_block_4(status);
	}
	if ("5" == block) {
		displayChange_block_5(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("kodepaket", "", status);
	displayChange_field("hargapaket", "", status);
	displayChange_field("namapaket", "", status);
	displayChange_field("aktif", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("unit", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("akomodasi", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("tindakan", "", status);
}

function displayChange_block_4(status) {
	displayChange_field("sc_field_0", "", status);
}

function displayChange_block_5(status) {
	displayChange_field("sc_field_1", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_kodepaket(row, status);
	displayChange_field_hargapaket(row, status);
	displayChange_field_namapaket(row, status);
	displayChange_field_aktif(row, status);
	displayChange_field_unit(row, status);
	displayChange_field_akomodasi(row, status);
	displayChange_field_tindakan(row, status);
	displayChange_field_sc_field_0(row, status);
	displayChange_field_sc_field_1(row, status);
}

function displayChange_field(field, row, status) {
	if ("kodepaket" == field) {
		displayChange_field_kodepaket(row, status);
	}
	if ("hargapaket" == field) {
		displayChange_field_hargapaket(row, status);
	}
	if ("namapaket" == field) {
		displayChange_field_namapaket(row, status);
	}
	if ("aktif" == field) {
		displayChange_field_aktif(row, status);
	}
	if ("unit" == field) {
		displayChange_field_unit(row, status);
	}
	if ("akomodasi" == field) {
		displayChange_field_akomodasi(row, status);
	}
	if ("tindakan" == field) {
		displayChange_field_tindakan(row, status);
	}
	if ("sc_field_0" == field) {
		displayChange_field_sc_field_0(row, status);
	}
	if ("sc_field_1" == field) {
		displayChange_field_sc_field_1(row, status);
	}
}

function displayChange_field_kodepaket(row, status) {
}

function displayChange_field_hargapaket(row, status) {
}

function displayChange_field_namapaket(row, status) {
}

function displayChange_field_aktif(row, status) {
}

function displayChange_field_unit(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbdetailpaket1")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbdetailpaket1")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_akomodasi(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbdetailpaket2")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbdetailpaket2")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_tindakan(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbdetailpaket3")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbdetailpaket3")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_sc_field_0(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbdetailpaket4")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbdetailpaket4")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_sc_field_1(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbdetailpaket5")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbdetailpaket5")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbpaket_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(20);
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

