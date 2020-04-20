
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
  scEventControl_data["jumlah_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kemasan_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["isi_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["harga_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["disc_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["totalisi_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["subtotal_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["principal_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jmlterima_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["po_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["item_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["item_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jumlah_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jumlah_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kemasan_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kemasan_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["isi_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["isi_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["harga_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["harga_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["disc_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["disc_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["totalisi_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["totalisi_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["subtotal_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["subtotal_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["principal_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["principal_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jmlterima_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jmlterima_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["po_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["po_" + iSeqRow]["change"]) {
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
  if ("item_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("disc_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("harga_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("isi_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("item_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("jumlah_" + iSeq == fieldName) {
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
  $('#id_sc_field_po_' + iSeqRow).bind('blur', function() { sc_form_tbpodetail_old_po__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_tbpodetail_old_po__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tbpodetail_old_po__onfocus(this, iSeqRow) });
  $('#id_sc_field_item_' + iSeqRow).bind('blur', function() { sc_form_tbpodetail_old_item__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_tbpodetail_old_item__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbpodetail_old_item__onfocus(this, iSeqRow) });
  $('#id_sc_field_jumlah_' + iSeqRow).bind('blur', function() { sc_form_tbpodetail_old_jumlah__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_tbpodetail_old_jumlah__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbpodetail_old_jumlah__onfocus(this, iSeqRow) });
  $('#id_sc_field_kemasan_' + iSeqRow).bind('blur', function() { sc_form_tbpodetail_old_kemasan__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_tbpodetail_old_kemasan__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbpodetail_old_kemasan__onfocus(this, iSeqRow) });
  $('#id_sc_field_isi_' + iSeqRow).bind('blur', function() { sc_form_tbpodetail_old_isi__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_tbpodetail_old_isi__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tbpodetail_old_isi__onfocus(this, iSeqRow) });
  $('#id_sc_field_harga_' + iSeqRow).bind('blur', function() { sc_form_tbpodetail_old_harga__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_tbpodetail_old_harga__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbpodetail_old_harga__onfocus(this, iSeqRow) });
  $('#id_sc_field_principal_' + iSeqRow).bind('blur', function() { sc_form_tbpodetail_old_principal__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_tbpodetail_old_principal__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbpodetail_old_principal__onfocus(this, iSeqRow) });
  $('#id_sc_field_disc_' + iSeqRow).bind('blur', function() { sc_form_tbpodetail_old_disc__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_tbpodetail_old_disc__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbpodetail_old_disc__onfocus(this, iSeqRow) });
  $('#id_sc_field_jmlterima_' + iSeqRow).bind('blur', function() { sc_form_tbpodetail_old_jmlterima__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_tbpodetail_old_jmlterima__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbpodetail_old_jmlterima__onfocus(this, iSeqRow) });
  $('#id_sc_field_subtotal_' + iSeqRow).bind('blur', function() { sc_form_tbpodetail_old_subtotal__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_tbpodetail_old_subtotal__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbpodetail_old_subtotal__onfocus(this, iSeqRow) });
  $('#id_sc_field_totalisi_' + iSeqRow).bind('blur', function() { sc_form_tbpodetail_old_totalisi__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_tbpodetail_old_totalisi__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbpodetail_old_totalisi__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbpodetail_old_po__onblur(oThis, iSeqRow) {
  do_ajax_form_tbpodetail_old_validate_po_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpodetail_old_po__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbpodetail_old_po__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbpodetail_old_item__onblur(oThis, iSeqRow) {
  do_ajax_form_tbpodetail_old_validate_item_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpodetail_old_item__onchange(oThis, iSeqRow) {
  do_ajax_form_tbpodetail_old_event_item__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_tbpodetail_old_item__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbpodetail_old_jumlah__onblur(oThis, iSeqRow) {
  do_ajax_form_tbpodetail_old_validate_jumlah_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpodetail_old_jumlah__onchange(oThis, iSeqRow) {
  do_ajax_form_tbpodetail_old_event_jumlah__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_tbpodetail_old_jumlah__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbpodetail_old_kemasan__onblur(oThis, iSeqRow) {
  do_ajax_form_tbpodetail_old_validate_kemasan_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpodetail_old_kemasan__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbpodetail_old_kemasan__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbpodetail_old_isi__onblur(oThis, iSeqRow) {
  do_ajax_form_tbpodetail_old_validate_isi_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpodetail_old_isi__onchange(oThis, iSeqRow) {
  do_ajax_form_tbpodetail_old_event_isi__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_tbpodetail_old_isi__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbpodetail_old_harga__onblur(oThis, iSeqRow) {
  do_ajax_form_tbpodetail_old_validate_harga_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpodetail_old_harga__onchange(oThis, iSeqRow) {
  do_ajax_form_tbpodetail_old_event_harga__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_tbpodetail_old_harga__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbpodetail_old_principal__onblur(oThis, iSeqRow) {
  do_ajax_form_tbpodetail_old_validate_principal_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpodetail_old_principal__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbpodetail_old_principal__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbpodetail_old_disc__onblur(oThis, iSeqRow) {
  do_ajax_form_tbpodetail_old_validate_disc_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpodetail_old_disc__onchange(oThis, iSeqRow) {
  do_ajax_form_tbpodetail_old_event_disc__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_tbpodetail_old_disc__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbpodetail_old_jmlterima__onblur(oThis, iSeqRow) {
  do_ajax_form_tbpodetail_old_validate_jmlterima_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpodetail_old_jmlterima__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbpodetail_old_jmlterima__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbpodetail_old_subtotal__onblur(oThis, iSeqRow) {
  do_ajax_form_tbpodetail_old_validate_subtotal_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpodetail_old_subtotal__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbpodetail_old_subtotal__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbpodetail_old_totalisi__onblur(oThis, iSeqRow) {
  do_ajax_form_tbpodetail_old_validate_totalisi_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbpodetail_old_totalisi__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbpodetail_old_totalisi__onfocus(oThis, iSeqRow) {
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
	displayChange_field("jumlah_", "", status);
	displayChange_field("kemasan_", "", status);
	displayChange_field("isi_", "", status);
	displayChange_field("harga_", "", status);
	displayChange_field("disc_", "", status);
	displayChange_field("totalisi_", "", status);
	displayChange_field("subtotal_", "", status);
	displayChange_field("principal_", "", status);
	displayChange_field("jmlterima_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_item_(row, status);
	displayChange_field_jumlah_(row, status);
	displayChange_field_kemasan_(row, status);
	displayChange_field_isi_(row, status);
	displayChange_field_harga_(row, status);
	displayChange_field_disc_(row, status);
	displayChange_field_totalisi_(row, status);
	displayChange_field_subtotal_(row, status);
	displayChange_field_principal_(row, status);
	displayChange_field_jmlterima_(row, status);
	displayChange_field_po_(row, status);
}

function displayChange_field(field, row, status) {
	if ("item_" == field) {
		displayChange_field_item_(row, status);
	}
	if ("jumlah_" == field) {
		displayChange_field_jumlah_(row, status);
	}
	if ("kemasan_" == field) {
		displayChange_field_kemasan_(row, status);
	}
	if ("isi_" == field) {
		displayChange_field_isi_(row, status);
	}
	if ("harga_" == field) {
		displayChange_field_harga_(row, status);
	}
	if ("disc_" == field) {
		displayChange_field_disc_(row, status);
	}
	if ("totalisi_" == field) {
		displayChange_field_totalisi_(row, status);
	}
	if ("subtotal_" == field) {
		displayChange_field_subtotal_(row, status);
	}
	if ("principal_" == field) {
		displayChange_field_principal_(row, status);
	}
	if ("jmlterima_" == field) {
		displayChange_field_jmlterima_(row, status);
	}
	if ("po_" == field) {
		displayChange_field_po_(row, status);
	}
}

function displayChange_field_item_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_item___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_item_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "item_");
	}
}

function displayChange_field_jumlah_(row, status) {
}

function displayChange_field_kemasan_(row, status) {
}

function displayChange_field_isi_(row, status) {
}

function displayChange_field_harga_(row, status) {
}

function displayChange_field_disc_(row, status) {
}

function displayChange_field_totalisi_(row, status) {
}

function displayChange_field_subtotal_(row, status) {
}

function displayChange_field_principal_(row, status) {
}

function displayChange_field_jmlterima_(row, status) {
}

function displayChange_field_po_(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_item_("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbpodetail_old_form" + pageNo).hide();
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
  if (null == specificField || "item_" == specificField) {
    scJQSelect2Add_item_(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_item_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_item__obj" : "#id_sc_field_item_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_item__obj',
      dropdownCssClass: 'css_item__obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_item_) { displayChange_field_item_(iLine, "on"); } }, 150);
} // scJQElementsAdd

