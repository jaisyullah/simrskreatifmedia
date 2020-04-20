
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
  scEventControl_data["itemcode_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["stok_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jumlah_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["disc_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rate_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sediaan_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["itemcode_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["itemcode_" + iSeqRow]["change"]) {
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
  if (scEventControl_data["disc_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["disc_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rate_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rate_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sediaan_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sediaan_" + iSeqRow]["change"]) {
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
  if ("itemcode_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("stok_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("sediaan_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("itemcode_" + iSeq == fieldName) {
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
  $('#id_sc_field_id_' + iSeqRow).bind('blur', function() { sc_form_tbitemdrugsell_id__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_tbitemdrugsell_id__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tbitemdrugsell_id__onfocus(this, iSeqRow) });
  $('#id_sc_field_itemcode_' + iSeqRow).bind('blur', function() { sc_form_tbitemdrugsell_itemcode__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_tbitemdrugsell_itemcode__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbitemdrugsell_itemcode__onfocus(this, iSeqRow) });
  $('#id_sc_field_sediaan_' + iSeqRow).bind('blur', function() { sc_form_tbitemdrugsell_sediaan__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_tbitemdrugsell_sediaan__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbitemdrugsell_sediaan__onfocus(this, iSeqRow) });
  $('#id_sc_field_rate_' + iSeqRow).bind('blur', function() { sc_form_tbitemdrugsell_rate__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_tbitemdrugsell_rate__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbitemdrugsell_rate__onfocus(this, iSeqRow) });
  $('#id_sc_field_jumlah_' + iSeqRow).bind('blur', function() { sc_form_tbitemdrugsell_jumlah__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_tbitemdrugsell_jumlah__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbitemdrugsell_jumlah__onfocus(this, iSeqRow) });
  $('#id_sc_field_disc_' + iSeqRow).bind('blur', function() { sc_form_tbitemdrugsell_disc__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_tbitemdrugsell_disc__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbitemdrugsell_disc__onfocus(this, iSeqRow) });
  $('#id_sc_field_stok_' + iSeqRow).bind('blur', function() { sc_form_tbitemdrugsell_stok__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_tbitemdrugsell_stok__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbitemdrugsell_stok__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbitemdrugsell_id__onblur(oThis, iSeqRow) {
  do_ajax_form_tbitemdrugsell_validate_id_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbitemdrugsell_id__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbitemdrugsell_id__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbitemdrugsell_itemcode__onblur(oThis, iSeqRow) {
  do_ajax_form_tbitemdrugsell_validate_itemcode_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbitemdrugsell_itemcode__onchange(oThis, iSeqRow) {
  do_ajax_form_tbitemdrugsell_event_itemcode__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_tbitemdrugsell_itemcode__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbitemdrugsell_sediaan__onblur(oThis, iSeqRow) {
  do_ajax_form_tbitemdrugsell_validate_sediaan_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbitemdrugsell_sediaan__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbitemdrugsell_sediaan__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbitemdrugsell_rate__onblur(oThis, iSeqRow) {
  do_ajax_form_tbitemdrugsell_validate_rate_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbitemdrugsell_rate__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbitemdrugsell_rate__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbitemdrugsell_jumlah__onblur(oThis, iSeqRow) {
  do_ajax_form_tbitemdrugsell_validate_jumlah_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbitemdrugsell_jumlah__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbitemdrugsell_jumlah__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbitemdrugsell_disc__onblur(oThis, iSeqRow) {
  do_ajax_form_tbitemdrugsell_validate_disc_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbitemdrugsell_disc__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbitemdrugsell_disc__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbitemdrugsell_stok__onblur(oThis, iSeqRow) {
  do_ajax_form_tbitemdrugsell_validate_stok_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbitemdrugsell_stok__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbitemdrugsell_stok__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("itemcode_", "", status);
	displayChange_field("stok_", "", status);
	displayChange_field("jumlah_", "", status);
	displayChange_field("disc_", "", status);
	displayChange_field("rate_", "", status);
	displayChange_field("sediaan_", "", status);
	displayChange_field("id_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_itemcode_(row, status);
	displayChange_field_stok_(row, status);
	displayChange_field_jumlah_(row, status);
	displayChange_field_disc_(row, status);
	displayChange_field_rate_(row, status);
	displayChange_field_sediaan_(row, status);
	displayChange_field_id_(row, status);
}

function displayChange_field(field, row, status) {
	if ("itemcode_" == field) {
		displayChange_field_itemcode_(row, status);
	}
	if ("stok_" == field) {
		displayChange_field_stok_(row, status);
	}
	if ("jumlah_" == field) {
		displayChange_field_jumlah_(row, status);
	}
	if ("disc_" == field) {
		displayChange_field_disc_(row, status);
	}
	if ("rate_" == field) {
		displayChange_field_rate_(row, status);
	}
	if ("sediaan_" == field) {
		displayChange_field_sediaan_(row, status);
	}
	if ("id_" == field) {
		displayChange_field_id_(row, status);
	}
}

function displayChange_field_itemcode_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_itemcode___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_itemcode_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "itemcode_");
	}
}

function displayChange_field_stok_(row, status) {
}

function displayChange_field_jumlah_(row, status) {
}

function displayChange_field_disc_(row, status) {
}

function displayChange_field_rate_(row, status) {
}

function displayChange_field_sediaan_(row, status) {
}

function displayChange_field_id_(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_itemcode_("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbitemdrugsell_form" + pageNo).hide();
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

function scJQSelect2Add(seqRow, specificField) {
  if (null == specificField || "itemcode_" == specificField) {
    scJQSelect2Add_itemcode_(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_itemcode_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_itemcode__obj" : "#id_sc_field_itemcode_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_itemcode__obj',
      dropdownCssClass: 'css_itemcode__obj',
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_itemcode_) { displayChange_field_itemcode_(iLine, "on"); } }, 150);
} // scJQElementsAdd

