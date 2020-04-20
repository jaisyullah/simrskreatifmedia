
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
  scEventControl_data["stok_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jumlah_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["signa_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jenisaturanpakai_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["biaya_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["diskon_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["trandate_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
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
  if (scEventControl_data["stok_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["stok_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jumlah_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jumlah_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["signa_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["signa_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jenisaturanpakai_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jenisaturanpakai_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["biaya_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["biaya_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["diskon_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["diskon_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["trandate_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["trandate_" + iSeqRow]["change"]) {
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
  $('#id_sc_field_id_' + iSeqRow).bind('blur', function() { sc_form_tbreseprawatjalan_old_id__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_tbreseprawatjalan_old_id__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tbreseprawatjalan_old_id__onfocus(this, iSeqRow) });
  $('#id_sc_field_item_' + iSeqRow).bind('blur', function() { sc_form_tbreseprawatjalan_old_item__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_tbreseprawatjalan_old_item__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbreseprawatjalan_old_item__onfocus(this, iSeqRow) });
  $('#id_sc_field_satuan_' + iSeqRow).bind('blur', function() { sc_form_tbreseprawatjalan_old_satuan__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_tbreseprawatjalan_old_satuan__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbreseprawatjalan_old_satuan__onfocus(this, iSeqRow) });
  $('#id_sc_field_jumlah_' + iSeqRow).bind('blur', function() { sc_form_tbreseprawatjalan_old_jumlah__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_tbreseprawatjalan_old_jumlah__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbreseprawatjalan_old_jumlah__onfocus(this, iSeqRow) });
  $('#id_sc_field_signa_' + iSeqRow).bind('blur', function() { sc_form_tbreseprawatjalan_old_signa__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_tbreseprawatjalan_old_signa__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbreseprawatjalan_old_signa__onfocus(this, iSeqRow) });
  $('#id_sc_field_jenisaturanpakai_' + iSeqRow).bind('blur', function() { sc_form_tbreseprawatjalan_old_jenisaturanpakai__onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_tbreseprawatjalan_old_jenisaturanpakai__onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_tbreseprawatjalan_old_jenisaturanpakai__onfocus(this, iSeqRow) });
  $('#id_sc_field_biaya_' + iSeqRow).bind('blur', function() { sc_form_tbreseprawatjalan_old_biaya__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_tbreseprawatjalan_old_biaya__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbreseprawatjalan_old_biaya__onfocus(this, iSeqRow) });
  $('#id_sc_field_trandate_' + iSeqRow).bind('blur', function() { sc_form_tbreseprawatjalan_old_trandate__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_tbreseprawatjalan_old_trandate__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbreseprawatjalan_old_trandate__onfocus(this, iSeqRow) });
  $('#id_sc_field_trandate__hora' + iSeqRow).bind('blur', function() { sc_form_tbreseprawatjalan_old_trandate__hora_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_tbreseprawatjalan_old_trandate__hora_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_tbreseprawatjalan_old_trandate__hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_diskon_' + iSeqRow).bind('blur', function() { sc_form_tbreseprawatjalan_old_diskon__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_tbreseprawatjalan_old_diskon__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbreseprawatjalan_old_diskon__onfocus(this, iSeqRow) });
  $('#id_sc_field_stok_' + iSeqRow).bind('blur', function() { sc_form_tbreseprawatjalan_old_stok__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_tbreseprawatjalan_old_stok__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbreseprawatjalan_old_stok__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbreseprawatjalan_old_id__onblur(oThis, iSeqRow) {
  do_ajax_form_tbreseprawatjalan_old_validate_id_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbreseprawatjalan_old_id__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbreseprawatjalan_old_id__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbreseprawatjalan_old_item__onblur(oThis, iSeqRow) {
  do_ajax_form_tbreseprawatjalan_old_validate_item_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbreseprawatjalan_old_item__onchange(oThis, iSeqRow) {
  do_ajax_form_tbreseprawatjalan_old_event_item__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_tbreseprawatjalan_old_item__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbreseprawatjalan_old_satuan__onblur(oThis, iSeqRow) {
  do_ajax_form_tbreseprawatjalan_old_validate_satuan_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbreseprawatjalan_old_satuan__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbreseprawatjalan_old_satuan__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbreseprawatjalan_old_jumlah__onblur(oThis, iSeqRow) {
  do_ajax_form_tbreseprawatjalan_old_validate_jumlah_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbreseprawatjalan_old_jumlah__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbreseprawatjalan_old_jumlah__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbreseprawatjalan_old_signa__onblur(oThis, iSeqRow) {
  do_ajax_form_tbreseprawatjalan_old_validate_signa_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbreseprawatjalan_old_signa__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbreseprawatjalan_old_signa__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbreseprawatjalan_old_jenisaturanpakai__onblur(oThis, iSeqRow) {
  do_ajax_form_tbreseprawatjalan_old_validate_jenisaturanpakai_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbreseprawatjalan_old_jenisaturanpakai__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbreseprawatjalan_old_jenisaturanpakai__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbreseprawatjalan_old_biaya__onblur(oThis, iSeqRow) {
  do_ajax_form_tbreseprawatjalan_old_validate_biaya_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbreseprawatjalan_old_biaya__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbreseprawatjalan_old_biaya__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbreseprawatjalan_old_trandate__onblur(oThis, iSeqRow) {
  do_ajax_form_tbreseprawatjalan_old_validate_trandate_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbreseprawatjalan_old_trandate__hora_onblur(oThis, iSeqRow) {
  do_ajax_form_tbreseprawatjalan_old_validate_trandate_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbreseprawatjalan_old_trandate__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbreseprawatjalan_old_trandate__hora_onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbreseprawatjalan_old_trandate__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbreseprawatjalan_old_trandate__hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbreseprawatjalan_old_diskon__onblur(oThis, iSeqRow) {
  do_ajax_form_tbreseprawatjalan_old_validate_diskon_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbreseprawatjalan_old_diskon__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbreseprawatjalan_old_diskon__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbreseprawatjalan_old_stok__onblur(oThis, iSeqRow) {
  do_ajax_form_tbreseprawatjalan_old_validate_stok_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbreseprawatjalan_old_stok__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbreseprawatjalan_old_stok__onfocus(oThis, iSeqRow) {
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
	displayChange_field("stok_", "", status);
	displayChange_field("jumlah_", "", status);
	displayChange_field("signa_", "", status);
	displayChange_field("jenisaturanpakai_", "", status);
	displayChange_field("biaya_", "", status);
	displayChange_field("diskon_", "", status);
	displayChange_field("trandate_", "", status);
	displayChange_field("id_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_item_(row, status);
	displayChange_field_satuan_(row, status);
	displayChange_field_stok_(row, status);
	displayChange_field_jumlah_(row, status);
	displayChange_field_signa_(row, status);
	displayChange_field_jenisaturanpakai_(row, status);
	displayChange_field_biaya_(row, status);
	displayChange_field_diskon_(row, status);
	displayChange_field_trandate_(row, status);
	displayChange_field_id_(row, status);
}

function displayChange_field(field, row, status) {
	if ("item_" == field) {
		displayChange_field_item_(row, status);
	}
	if ("satuan_" == field) {
		displayChange_field_satuan_(row, status);
	}
	if ("stok_" == field) {
		displayChange_field_stok_(row, status);
	}
	if ("jumlah_" == field) {
		displayChange_field_jumlah_(row, status);
	}
	if ("signa_" == field) {
		displayChange_field_signa_(row, status);
	}
	if ("jenisaturanpakai_" == field) {
		displayChange_field_jenisaturanpakai_(row, status);
	}
	if ("biaya_" == field) {
		displayChange_field_biaya_(row, status);
	}
	if ("diskon_" == field) {
		displayChange_field_diskon_(row, status);
	}
	if ("trandate_" == field) {
		displayChange_field_trandate_(row, status);
	}
	if ("id_" == field) {
		displayChange_field_id_(row, status);
	}
}

function displayChange_field_item_(row, status) {
}

function displayChange_field_satuan_(row, status) {
}

function displayChange_field_stok_(row, status) {
}

function displayChange_field_jumlah_(row, status) {
}

function displayChange_field_signa_(row, status) {
}

function displayChange_field_jenisaturanpakai_(row, status) {
}

function displayChange_field_biaya_(row, status) {
}

function displayChange_field_diskon_(row, status) {
}

function displayChange_field_trandate_(row, status) {
}

function displayChange_field_id_(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbreseprawatjalan_old_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(34);
		}
	}
}
function scJQSpinAdd(iSeqRow) {
  $("#id_sc_field_jumlah_" + iSeqRow).spinner({
    max: 99999,
    min: 0,
    step: 1,
    page: 5,
    change: function(event, ui) {
      $(this).trigger("change");
    },
    stop: function(event, ui) {
      $(this).trigger("change");
    }
  });
} // scJQSpinAdd

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

function scJQSelect2Add(seqRow, specificField) {
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQSpinAdd(iLine);
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
} // scJQElementsAdd

