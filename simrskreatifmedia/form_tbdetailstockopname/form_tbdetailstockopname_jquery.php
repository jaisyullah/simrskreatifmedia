
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
  scEventControl_data["namaitem_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["lokasi_depo_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["exp_date_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["stokawal_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["stokkoreksi_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["stokakhir_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["keterangan_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["namaitem_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["namaitem_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["lokasi_depo_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["lokasi_depo_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["exp_date_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["exp_date_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["stokawal_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["stokawal_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["stokkoreksi_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["stokkoreksi_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["stokakhir_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["stokakhir_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["keterangan_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["keterangan_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["namaitem_" + iSeqRow]["autocomp"]) {
    return true;
  }
  if (scEventControl_data["exp_date_" + iSeqRow]["autocomp"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_active_all() {
  for (var i = 1; i < iAjaxNewLine; i++) {
    if (scEventControl_active(i)) {
      return true;
    }
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("lokasi_depo_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("stokawal_" + iSeq == fieldName) {
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
  $('#id_sc_field_id_' + iSeqRow).bind('blur', function() { sc_form_tbdetailstockopname_id__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_tbdetailstockopname_id__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tbdetailstockopname_id__onfocus(this, iSeqRow) });
  $('#id_sc_field_namaitem_' + iSeqRow).bind('blur', function() { sc_form_tbdetailstockopname_namaitem__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_tbdetailstockopname_namaitem__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbdetailstockopname_namaitem__onfocus(this, iSeqRow) });
  $('#id_sc_field_lokasi_depo_' + iSeqRow).bind('blur', function() { sc_form_tbdetailstockopname_lokasi_depo__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_tbdetailstockopname_lokasi_depo__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tbdetailstockopname_lokasi_depo__onfocus(this, iSeqRow) });
  $('#id_sc_field_exp_date_' + iSeqRow).bind('blur', function() { sc_form_tbdetailstockopname_exp_date__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_tbdetailstockopname_exp_date__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbdetailstockopname_exp_date__onfocus(this, iSeqRow) });
  $('#id_sc_field_stokawal_' + iSeqRow).bind('blur', function() { sc_form_tbdetailstockopname_stokawal__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_tbdetailstockopname_stokawal__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbdetailstockopname_stokawal__onfocus(this, iSeqRow) });
  $('#id_sc_field_stokkoreksi_' + iSeqRow).bind('blur', function() { sc_form_tbdetailstockopname_stokkoreksi__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_tbdetailstockopname_stokkoreksi__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tbdetailstockopname_stokkoreksi__onfocus(this, iSeqRow) });
  $('#id_sc_field_stokakhir_' + iSeqRow).bind('blur', function() { sc_form_tbdetailstockopname_stokakhir__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_tbdetailstockopname_stokakhir__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbdetailstockopname_stokakhir__onfocus(this, iSeqRow) });
  $('#id_sc_field_keterangan_' + iSeqRow).bind('blur', function() { sc_form_tbdetailstockopname_keterangan__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_tbdetailstockopname_keterangan__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbdetailstockopname_keterangan__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbdetailstockopname_id__onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailstockopname_validate_id_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbdetailstockopname_id__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbdetailstockopname_id__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbdetailstockopname_namaitem__onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailstockopname_validate_namaitem_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbdetailstockopname_namaitem__onchange(oThis, iSeqRow) {
  do_ajax_form_tbdetailstockopname_refresh_namaitem_(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_tbdetailstockopname_namaitem__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbdetailstockopname_lokasi_depo__onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailstockopname_validate_lokasi_depo_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbdetailstockopname_lokasi_depo__onchange(oThis, iSeqRow) {
  do_ajax_form_tbdetailstockopname_refresh_lokasi_depo_(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_tbdetailstockopname_lokasi_depo__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbdetailstockopname_exp_date__onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailstockopname_validate_exp_date_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbdetailstockopname_exp_date__onchange(oThis, iSeqRow) {
  do_ajax_form_tbdetailstockopname_refresh_exp_date_(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_tbdetailstockopname_exp_date__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbdetailstockopname_stokawal__onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailstockopname_validate_stokawal_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbdetailstockopname_stokawal__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbdetailstockopname_stokawal__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbdetailstockopname_stokkoreksi__onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailstockopname_validate_stokkoreksi_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbdetailstockopname_stokkoreksi__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbdetailstockopname_stokkoreksi__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbdetailstockopname_stokakhir__onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailstockopname_validate_stokakhir_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbdetailstockopname_stokakhir__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbdetailstockopname_stokakhir__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbdetailstockopname_keterangan__onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailstockopname_validate_keterangan_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbdetailstockopname_keterangan__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbdetailstockopname_keterangan__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("namaitem_", "", status);
	displayChange_field("lokasi_depo_", "", status);
	displayChange_field("exp_date_", "", status);
	displayChange_field("stokawal_", "", status);
	displayChange_field("stokkoreksi_", "", status);
	displayChange_field("stokakhir_", "", status);
	displayChange_field("keterangan_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_namaitem_(row, status);
	displayChange_field_lokasi_depo_(row, status);
	displayChange_field_exp_date_(row, status);
	displayChange_field_stokawal_(row, status);
	displayChange_field_stokkoreksi_(row, status);
	displayChange_field_stokakhir_(row, status);
	displayChange_field_keterangan_(row, status);
	displayChange_field_id_(row, status);
}

function displayChange_field(field, row, status) {
	if ("namaitem_" == field) {
		displayChange_field_namaitem_(row, status);
	}
	if ("lokasi_depo_" == field) {
		displayChange_field_lokasi_depo_(row, status);
	}
	if ("exp_date_" == field) {
		displayChange_field_exp_date_(row, status);
	}
	if ("stokawal_" == field) {
		displayChange_field_stokawal_(row, status);
	}
	if ("stokkoreksi_" == field) {
		displayChange_field_stokkoreksi_(row, status);
	}
	if ("stokakhir_" == field) {
		displayChange_field_stokakhir_(row, status);
	}
	if ("keterangan_" == field) {
		displayChange_field_keterangan_(row, status);
	}
	if ("id_" == field) {
		displayChange_field_id_(row, status);
	}
}

function displayChange_field_namaitem_(row, status) {
}

function displayChange_field_lokasi_depo_(row, status) {
}

function displayChange_field_exp_date_(row, status) {
}

function displayChange_field_stokawal_(row, status) {
}

function displayChange_field_stokkoreksi_(row, status) {
}

function displayChange_field_stokakhir_(row, status) {
}

function displayChange_field_keterangan_(row, status) {
}

function displayChange_field_id_(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbdetailstockopname_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(32);
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

