
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
  scEventControl_data["trancode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["struk" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pasien" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["custcode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["custname" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["extname" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["iskaryawan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["total" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["trandate" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detailsell" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["trancode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["trancode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["struk" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["struk" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pasien" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pasien" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["custcode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["custcode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["custname" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["custname" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["extname" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["extname" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["iskaryawan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["iskaryawan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["total" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["total" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["trandate" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["trandate" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detailsell" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detailsell" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("custname" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("docname" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("doccode" + iSeq == fieldName) {
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
  $('#id_sc_field_id' + iSeqRow).bind('blur', function() { sc_form_tbdrugsell_id_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_tbdrugsell_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_trancode' + iSeqRow).bind('blur', function() { sc_form_tbdrugsell_trancode_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbdrugsell_trancode_onfocus(this, iSeqRow) });
  $('#id_sc_field_struk' + iSeqRow).bind('blur', function() { sc_form_tbdrugsell_struk_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbdrugsell_struk_onfocus(this, iSeqRow) });
  $('#id_sc_field_pasien' + iSeqRow).bind('blur', function() { sc_form_tbdrugsell_pasien_onblur(this, iSeqRow) })
                                    .bind('click', function() { sc_form_tbdrugsell_pasien_onclick(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbdrugsell_pasien_onfocus(this, iSeqRow) });
  $('#id_sc_field_custcode' + iSeqRow).bind('blur', function() { sc_form_tbdrugsell_custcode_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_tbdrugsell_custcode_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbdrugsell_custcode_onfocus(this, iSeqRow) });
  $('#id_sc_field_custname' + iSeqRow).bind('blur', function() { sc_form_tbdrugsell_custname_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbdrugsell_custname_onfocus(this, iSeqRow) });
  $('#id_sc_field_extname' + iSeqRow).bind('blur', function() { sc_form_tbdrugsell_extname_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbdrugsell_extname_onfocus(this, iSeqRow) });
  $('#id_sc_field_trandate' + iSeqRow).bind('blur', function() { sc_form_tbdrugsell_trandate_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbdrugsell_trandate_onfocus(this, iSeqRow) });
  $('#id_sc_field_trandate_hora' + iSeqRow).bind('blur', function() { sc_form_tbdrugsell_trandate_hora_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_tbdrugsell_trandate_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_iskaryawan' + iSeqRow).bind('blur', function() { sc_form_tbdrugsell_iskaryawan_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbdrugsell_iskaryawan_onfocus(this, iSeqRow) });
  $('#id_sc_field_total' + iSeqRow).bind('blur', function() { sc_form_tbdrugsell_total_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbdrugsell_total_onfocus(this, iSeqRow) });
  $('#id_sc_field_detailsell' + iSeqRow).bind('blur', function() { sc_form_tbdrugsell_detailsell_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbdrugsell_detailsell_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbdrugsell_id_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdrugsell_validate_id();
  scCssBlur(oThis);
}

function sc_form_tbdrugsell_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdrugsell_trancode_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdrugsell_validate_trancode();
  scCssBlur(oThis);
}

function sc_form_tbdrugsell_trancode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdrugsell_struk_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdrugsell_validate_struk();
  scCssBlur(oThis);
}

function sc_form_tbdrugsell_struk_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdrugsell_pasien_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdrugsell_validate_pasien();
  scCssBlur(oThis);
}

function sc_form_tbdrugsell_pasien_onclick(oThis, iSeqRow) {
  do_ajax_form_tbdrugsell_event_pasien_onclick();
}

function sc_form_tbdrugsell_pasien_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdrugsell_custcode_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdrugsell_validate_custcode();
  scCssBlur(oThis);
}

function sc_form_tbdrugsell_custcode_onchange(oThis, iSeqRow) {
  do_ajax_form_tbdrugsell_refresh_custcode();
}

function sc_form_tbdrugsell_custcode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdrugsell_custname_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdrugsell_validate_custname();
  scCssBlur(oThis);
}

function sc_form_tbdrugsell_custname_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdrugsell_extname_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdrugsell_validate_extname();
  scCssBlur(oThis);
}

function sc_form_tbdrugsell_extname_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdrugsell_trandate_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdrugsell_validate_trandate();
  scCssBlur(oThis);
}

function sc_form_tbdrugsell_trandate_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdrugsell_validate_trandate();
  scCssBlur(oThis);
}

function sc_form_tbdrugsell_trandate_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdrugsell_trandate_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdrugsell_iskaryawan_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdrugsell_validate_iskaryawan();
  scCssBlur(oThis);
}

function sc_form_tbdrugsell_iskaryawan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdrugsell_total_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdrugsell_validate_total();
  scCssBlur(oThis);
}

function sc_form_tbdrugsell_total_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdrugsell_detailsell_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdrugsell_validate_detailsell();
  scCssBlur(oThis);
}

function sc_form_tbdrugsell_detailsell_onfocus(oThis, iSeqRow) {
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
}

function displayChange_block_0(status) {
	displayChange_field("trancode", "", status);
	displayChange_field("struk", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("pasien", "", status);
	displayChange_field("custcode", "", status);
	displayChange_field("custname", "", status);
	displayChange_field("extname", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("iskaryawan", "", status);
	displayChange_field("total", "", status);
	displayChange_field("trandate", "", status);
	displayChange_field("id", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("detailsell", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_trancode(row, status);
	displayChange_field_struk(row, status);
	displayChange_field_pasien(row, status);
	displayChange_field_custcode(row, status);
	displayChange_field_custname(row, status);
	displayChange_field_extname(row, status);
	displayChange_field_iskaryawan(row, status);
	displayChange_field_total(row, status);
	displayChange_field_trandate(row, status);
	displayChange_field_id(row, status);
	displayChange_field_detailsell(row, status);
}

function displayChange_field(field, row, status) {
	if ("trancode" == field) {
		displayChange_field_trancode(row, status);
	}
	if ("struk" == field) {
		displayChange_field_struk(row, status);
	}
	if ("pasien" == field) {
		displayChange_field_pasien(row, status);
	}
	if ("custcode" == field) {
		displayChange_field_custcode(row, status);
	}
	if ("custname" == field) {
		displayChange_field_custname(row, status);
	}
	if ("extname" == field) {
		displayChange_field_extname(row, status);
	}
	if ("iskaryawan" == field) {
		displayChange_field_iskaryawan(row, status);
	}
	if ("total" == field) {
		displayChange_field_total(row, status);
	}
	if ("trandate" == field) {
		displayChange_field_trandate(row, status);
	}
	if ("id" == field) {
		displayChange_field_id(row, status);
	}
	if ("detailsell" == field) {
		displayChange_field_detailsell(row, status);
	}
}

function displayChange_field_trancode(row, status) {
}

function displayChange_field_struk(row, status) {
}

function displayChange_field_pasien(row, status) {
}

function displayChange_field_custcode(row, status) {
}

function displayChange_field_custname(row, status) {
}

function displayChange_field_extname(row, status) {
}

function displayChange_field_iskaryawan(row, status) {
}

function displayChange_field_total(row, status) {
}

function displayChange_field_trandate(row, status) {
}

function displayChange_field_id(row, status) {
}

function displayChange_field_detailsell(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbitemdrugsell")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbitemdrugsell")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbdrugsell_form" + pageNo).hide();
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
  if (null == specificField || "doccode" == specificField) {
    scJQSelect2Add_doccode(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_doccode(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_doccode_obj" : "#id_sc_field_doccode" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_doccode_obj',
      dropdownCssClass: 'css_doccode_obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_doccode) { displayChange_field_doccode(iLine, "on"); } }, 150);
} // scJQElementsAdd

