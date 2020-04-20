
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
  scEventControl_data["nama_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kategori_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["subname_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hasil_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["satuan_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["marked_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rujukan_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["nama_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nama_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kategori_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kategori_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["subname_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["subname_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hasil_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hasil_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["satuan_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["satuan_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["marked_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["marked_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rujukan_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rujukan_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_" + iSeqRow]["change"]) {
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
  if ("hasil_" + iSeq == fieldName) {
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
  $('#id_sc_field_id_' + iSeqRow).bind('blur', function() { sc_form_tbhasillab_id__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_tbhasillab_id__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tbhasillab_id__onfocus(this, iSeqRow) });
  $('#id_sc_field_kategori_' + iSeqRow).bind('blur', function() { sc_form_tbhasillab_kategori__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_tbhasillab_kategori__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbhasillab_kategori__onfocus(this, iSeqRow) });
  $('#id_sc_field_nama_' + iSeqRow).bind('blur', function() { sc_form_tbhasillab_nama__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_tbhasillab_nama__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbhasillab_nama__onfocus(this, iSeqRow) });
  $('#id_sc_field_subname_' + iSeqRow).bind('blur', function() { sc_form_tbhasillab_subname__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_tbhasillab_subname__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbhasillab_subname__onfocus(this, iSeqRow) });
  $('#id_sc_field_hasil_' + iSeqRow).bind('blur', function() { sc_form_tbhasillab_hasil__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_tbhasillab_hasil__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbhasillab_hasil__onfocus(this, iSeqRow) });
  $('#id_sc_field_rujukan_' + iSeqRow).bind('blur', function() { sc_form_tbhasillab_rujukan__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_tbhasillab_rujukan__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbhasillab_rujukan__onfocus(this, iSeqRow) });
  $('#id_sc_field_satuan_' + iSeqRow).bind('blur', function() { sc_form_tbhasillab_satuan__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_tbhasillab_satuan__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbhasillab_satuan__onfocus(this, iSeqRow) });
  $('#id_sc_field_marked_' + iSeqRow).bind('blur', function() { sc_form_tbhasillab_marked__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_tbhasillab_marked__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbhasillab_marked__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbhasillab_id__onblur(oThis, iSeqRow) {
  do_ajax_form_tbhasillab_validate_id_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbhasillab_id__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbhasillab_id__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbhasillab_kategori__onblur(oThis, iSeqRow) {
  do_ajax_form_tbhasillab_validate_kategori_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbhasillab_kategori__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbhasillab_kategori__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbhasillab_nama__onblur(oThis, iSeqRow) {
  do_ajax_form_tbhasillab_validate_nama_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbhasillab_nama__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbhasillab_nama__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbhasillab_subname__onblur(oThis, iSeqRow) {
  do_ajax_form_tbhasillab_validate_subname_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbhasillab_subname__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbhasillab_subname__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbhasillab_hasil__onblur(oThis, iSeqRow) {
  do_ajax_form_tbhasillab_validate_hasil_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbhasillab_hasil__onchange(oThis, iSeqRow) {
  do_ajax_form_tbhasillab_event_hasil__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_tbhasillab_hasil__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbhasillab_rujukan__onblur(oThis, iSeqRow) {
  do_ajax_form_tbhasillab_validate_rujukan_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbhasillab_rujukan__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbhasillab_rujukan__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbhasillab_satuan__onblur(oThis, iSeqRow) {
  do_ajax_form_tbhasillab_validate_satuan_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbhasillab_satuan__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbhasillab_satuan__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbhasillab_marked__onblur(oThis, iSeqRow) {
  do_ajax_form_tbhasillab_validate_marked_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbhasillab_marked__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbhasillab_marked__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("nama_", "", status);
	displayChange_field("kategori_", "", status);
	displayChange_field("subname_", "", status);
	displayChange_field("hasil_", "", status);
	displayChange_field("satuan_", "", status);
	displayChange_field("marked_", "", status);
	displayChange_field("rujukan_", "", status);
	displayChange_field("id_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_nama_(row, status);
	displayChange_field_kategori_(row, status);
	displayChange_field_subname_(row, status);
	displayChange_field_hasil_(row, status);
	displayChange_field_satuan_(row, status);
	displayChange_field_marked_(row, status);
	displayChange_field_rujukan_(row, status);
	displayChange_field_id_(row, status);
}

function displayChange_field(field, row, status) {
	if ("nama_" == field) {
		displayChange_field_nama_(row, status);
	}
	if ("kategori_" == field) {
		displayChange_field_kategori_(row, status);
	}
	if ("subname_" == field) {
		displayChange_field_subname_(row, status);
	}
	if ("hasil_" == field) {
		displayChange_field_hasil_(row, status);
	}
	if ("satuan_" == field) {
		displayChange_field_satuan_(row, status);
	}
	if ("marked_" == field) {
		displayChange_field_marked_(row, status);
	}
	if ("rujukan_" == field) {
		displayChange_field_rujukan_(row, status);
	}
	if ("id_" == field) {
		displayChange_field_id_(row, status);
	}
}

function displayChange_field_nama_(row, status) {
}

function displayChange_field_kategori_(row, status) {
}

function displayChange_field_subname_(row, status) {
}

function displayChange_field_hasil_(row, status) {
}

function displayChange_field_satuan_(row, status) {
}

function displayChange_field_marked_(row, status) {
}

function displayChange_field_rujukan_(row, status) {
}

function displayChange_field_id_(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbhasillab_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(23);
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

