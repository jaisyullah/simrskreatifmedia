
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
  scEventControl_data["item_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["satuan_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jumlah_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["aturanpakai1_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["aturanpakai2_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["stok_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["biaya_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hargajual_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["item_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["item_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["satuan_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["satuan_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jumlah_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jumlah_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["aturanpakai1_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["aturanpakai1_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["aturanpakai2_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["aturanpakai2_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["stok_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["stok_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["biaya_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["biaya_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hargajual_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hargajual_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["item_" + iSeqRow]["autocomp"]) {
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
  if ("satuan_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("stok_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("hargajual_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("item_" + iSeq == fieldName) {
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
  $('#id_sc_field_id_' + iSeqRow).bind('blur', function() { sc_form_tbreseprjdetail_id__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_tbreseprjdetail_id__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tbreseprjdetail_id__onfocus(this, iSeqRow) });
  $('#id_sc_field_item_' + iSeqRow).bind('blur', function() { sc_form_tbreseprjdetail_item__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_tbreseprjdetail_item__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbreseprjdetail_item__onfocus(this, iSeqRow) });
  $('#id_sc_field_satuan_' + iSeqRow).bind('blur', function() { sc_form_tbreseprjdetail_satuan__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_tbreseprjdetail_satuan__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbreseprjdetail_satuan__onfocus(this, iSeqRow) });
  $('#id_sc_field_jumlah_' + iSeqRow).bind('blur', function() { sc_form_tbreseprjdetail_jumlah__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_tbreseprjdetail_jumlah__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbreseprjdetail_jumlah__onfocus(this, iSeqRow) });
  $('#id_sc_field_aturanpakai1_' + iSeqRow).bind('blur', function() { sc_form_tbreseprjdetail_aturanpakai1__onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_tbreseprjdetail_aturanpakai1__onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_tbreseprjdetail_aturanpakai1__onfocus(this, iSeqRow) });
  $('#id_sc_field_aturanpakai2_' + iSeqRow).bind('blur', function() { sc_form_tbreseprjdetail_aturanpakai2__onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_tbreseprjdetail_aturanpakai2__onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_tbreseprjdetail_aturanpakai2__onfocus(this, iSeqRow) });
  $('#id_sc_field_biaya_' + iSeqRow).bind('blur', function() { sc_form_tbreseprjdetail_biaya__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_tbreseprjdetail_biaya__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbreseprjdetail_biaya__onfocus(this, iSeqRow) });
  $('#id_sc_field_stok_' + iSeqRow).bind('blur', function() { sc_form_tbreseprjdetail_stok__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_tbreseprjdetail_stok__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbreseprjdetail_stok__onfocus(this, iSeqRow) });
  $('#id_sc_field_hargajual_' + iSeqRow).bind('blur', function() { sc_form_tbreseprjdetail_hargajual__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_tbreseprjdetail_hargajual__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbreseprjdetail_hargajual__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbreseprjdetail_id__onblur(oThis, iSeqRow) {
  do_ajax_form_tbreseprjdetail_validate_id_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbreseprjdetail_id__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbreseprjdetail_id__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbreseprjdetail_item__onblur(oThis, iSeqRow) {
  do_ajax_form_tbreseprjdetail_validate_item_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbreseprjdetail_item__onchange(oThis, iSeqRow) {
  do_ajax_form_tbreseprjdetail_event_item__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_tbreseprjdetail_item__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbreseprjdetail_satuan__onblur(oThis, iSeqRow) {
  do_ajax_form_tbreseprjdetail_validate_satuan_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbreseprjdetail_satuan__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbreseprjdetail_satuan__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbreseprjdetail_jumlah__onblur(oThis, iSeqRow) {
  do_ajax_form_tbreseprjdetail_validate_jumlah_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbreseprjdetail_jumlah__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbreseprjdetail_jumlah__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbreseprjdetail_aturanpakai1__onblur(oThis, iSeqRow) {
  do_ajax_form_tbreseprjdetail_validate_aturanpakai1_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbreseprjdetail_aturanpakai1__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbreseprjdetail_aturanpakai1__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbreseprjdetail_aturanpakai2__onblur(oThis, iSeqRow) {
  do_ajax_form_tbreseprjdetail_validate_aturanpakai2_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbreseprjdetail_aturanpakai2__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbreseprjdetail_aturanpakai2__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbreseprjdetail_biaya__onblur(oThis, iSeqRow) {
  do_ajax_form_tbreseprjdetail_validate_biaya_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbreseprjdetail_biaya__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbreseprjdetail_biaya__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbreseprjdetail_stok__onblur(oThis, iSeqRow) {
  do_ajax_form_tbreseprjdetail_validate_stok_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbreseprjdetail_stok__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbreseprjdetail_stok__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbreseprjdetail_hargajual__onblur(oThis, iSeqRow) {
  do_ajax_form_tbreseprjdetail_validate_hargajual_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbreseprjdetail_hargajual__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbreseprjdetail_hargajual__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("item_", "", status);
	displayChange_field("satuan_", "", status);
	displayChange_field("jumlah_", "", status);
	displayChange_field("aturanpakai1_", "", status);
	displayChange_field("aturanpakai2_", "", status);
	displayChange_field("stok_", "", status);
	displayChange_field("biaya_", "", status);
	displayChange_field("hargajual_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_item_(row, status);
	displayChange_field_satuan_(row, status);
	displayChange_field_jumlah_(row, status);
	displayChange_field_aturanpakai1_(row, status);
	displayChange_field_aturanpakai2_(row, status);
	displayChange_field_stok_(row, status);
	displayChange_field_biaya_(row, status);
	displayChange_field_hargajual_(row, status);
	displayChange_field_id_(row, status);
}

function displayChange_field(field, row, status) {
	if ("item_" == field) {
		displayChange_field_item_(row, status);
	}
	if ("satuan_" == field) {
		displayChange_field_satuan_(row, status);
	}
	if ("jumlah_" == field) {
		displayChange_field_jumlah_(row, status);
	}
	if ("aturanpakai1_" == field) {
		displayChange_field_aturanpakai1_(row, status);
	}
	if ("aturanpakai2_" == field) {
		displayChange_field_aturanpakai2_(row, status);
	}
	if ("stok_" == field) {
		displayChange_field_stok_(row, status);
	}
	if ("biaya_" == field) {
		displayChange_field_biaya_(row, status);
	}
	if ("hargajual_" == field) {
		displayChange_field_hargajual_(row, status);
	}
	if ("id_" == field) {
		displayChange_field_id_(row, status);
	}
}

function displayChange_field_item_(row, status) {
}

function displayChange_field_satuan_(row, status) {
}

function displayChange_field_jumlah_(row, status) {
}

function displayChange_field_aturanpakai1_(row, status) {
}

function displayChange_field_aturanpakai2_(row, status) {
}

function displayChange_field_stok_(row, status) {
}

function displayChange_field_biaya_(row, status) {
}

function displayChange_field_hargajual_(row, status) {
}

function displayChange_field_id_(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbreseprjdetail_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(28);
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

