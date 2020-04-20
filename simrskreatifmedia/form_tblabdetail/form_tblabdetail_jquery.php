
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
  scEventControl_data["detailname_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["oper_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["p1_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["p2_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["w1_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["w2_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["satuan_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["lastupdated_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["detailname_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detailname_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["oper_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["oper_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["p1_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["p1_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["p2_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["p2_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["w1_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["w1_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["w2_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["w2_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["satuan_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["satuan_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["lastupdated_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["lastupdated_" + iSeqRow]["change"]) {
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
  if ("oper_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("satuan_" + iSeq == fieldName) {
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
  $('#id_sc_field_detailname_' + iSeqRow).bind('blur', function() { sc_form_tblabdetail_detailname__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_tblabdetail_detailname__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tblabdetail_detailname__onfocus(this, iSeqRow) });
  $('#id_sc_field_oper_' + iSeqRow).bind('blur', function() { sc_form_tblabdetail_oper__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_tblabdetail_oper__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tblabdetail_oper__onfocus(this, iSeqRow) });
  $('#id_sc_field_p1_' + iSeqRow).bind('blur', function() { sc_form_tblabdetail_p1__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_tblabdetail_p1__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tblabdetail_p1__onfocus(this, iSeqRow) });
  $('#id_sc_field_p2_' + iSeqRow).bind('blur', function() { sc_form_tblabdetail_p2__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_tblabdetail_p2__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tblabdetail_p2__onfocus(this, iSeqRow) });
  $('#id_sc_field_w1_' + iSeqRow).bind('blur', function() { sc_form_tblabdetail_w1__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_tblabdetail_w1__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tblabdetail_w1__onfocus(this, iSeqRow) });
  $('#id_sc_field_w2_' + iSeqRow).bind('blur', function() { sc_form_tblabdetail_w2__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_tblabdetail_w2__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tblabdetail_w2__onfocus(this, iSeqRow) });
  $('#id_sc_field_satuan_' + iSeqRow).bind('blur', function() { sc_form_tblabdetail_satuan__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_tblabdetail_satuan__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tblabdetail_satuan__onfocus(this, iSeqRow) });
  $('#id_sc_field_lastupdated_' + iSeqRow).bind('blur', function() { sc_form_tblabdetail_lastupdated__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_tblabdetail_lastupdated__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tblabdetail_lastupdated__onfocus(this, iSeqRow) });
  $('#id_sc_field_lastupdated__hora' + iSeqRow).bind('blur', function() { sc_form_tblabdetail_lastupdated__hora_onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_tblabdetail_lastupdated__hora_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_tblabdetail_lastupdated__hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_' + iSeqRow).bind('blur', function() { sc_form_tblabdetail_id__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_tblabdetail_id__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tblabdetail_id__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tblabdetail_detailname__onblur(oThis, iSeqRow) {
  do_ajax_form_tblabdetail_validate_detailname_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tblabdetail_detailname__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tblabdetail_detailname__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tblabdetail_oper__onblur(oThis, iSeqRow) {
  do_ajax_form_tblabdetail_validate_oper_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tblabdetail_oper__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tblabdetail_oper__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tblabdetail_p1__onblur(oThis, iSeqRow) {
  do_ajax_form_tblabdetail_validate_p1_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tblabdetail_p1__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tblabdetail_p1__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tblabdetail_p2__onblur(oThis, iSeqRow) {
  do_ajax_form_tblabdetail_validate_p2_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tblabdetail_p2__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tblabdetail_p2__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tblabdetail_w1__onblur(oThis, iSeqRow) {
  do_ajax_form_tblabdetail_validate_w1_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tblabdetail_w1__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tblabdetail_w1__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tblabdetail_w2__onblur(oThis, iSeqRow) {
  do_ajax_form_tblabdetail_validate_w2_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tblabdetail_w2__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tblabdetail_w2__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tblabdetail_satuan__onblur(oThis, iSeqRow) {
  do_ajax_form_tblabdetail_validate_satuan_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tblabdetail_satuan__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tblabdetail_satuan__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tblabdetail_lastupdated__onblur(oThis, iSeqRow) {
  do_ajax_form_tblabdetail_validate_lastupdated_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tblabdetail_lastupdated__hora_onblur(oThis, iSeqRow) {
  do_ajax_form_tblabdetail_validate_lastupdated_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tblabdetail_lastupdated__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tblabdetail_lastupdated__hora_onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tblabdetail_lastupdated__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tblabdetail_lastupdated__hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tblabdetail_id__onblur(oThis, iSeqRow) {
  do_ajax_form_tblabdetail_validate_id_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tblabdetail_id__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tblabdetail_id__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("detailname_", "", status);
	displayChange_field("oper_", "", status);
	displayChange_field("p1_", "", status);
	displayChange_field("p2_", "", status);
	displayChange_field("w1_", "", status);
	displayChange_field("w2_", "", status);
	displayChange_field("satuan_", "", status);
	displayChange_field("lastupdated_", "", status);
	displayChange_field("id_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_detailname_(row, status);
	displayChange_field_oper_(row, status);
	displayChange_field_p1_(row, status);
	displayChange_field_p2_(row, status);
	displayChange_field_w1_(row, status);
	displayChange_field_w2_(row, status);
	displayChange_field_satuan_(row, status);
	displayChange_field_lastupdated_(row, status);
	displayChange_field_id_(row, status);
}

function displayChange_field(field, row, status) {
	if ("detailname_" == field) {
		displayChange_field_detailname_(row, status);
	}
	if ("oper_" == field) {
		displayChange_field_oper_(row, status);
	}
	if ("p1_" == field) {
		displayChange_field_p1_(row, status);
	}
	if ("p2_" == field) {
		displayChange_field_p2_(row, status);
	}
	if ("w1_" == field) {
		displayChange_field_w1_(row, status);
	}
	if ("w2_" == field) {
		displayChange_field_w2_(row, status);
	}
	if ("satuan_" == field) {
		displayChange_field_satuan_(row, status);
	}
	if ("lastupdated_" == field) {
		displayChange_field_lastupdated_(row, status);
	}
	if ("id_" == field) {
		displayChange_field_id_(row, status);
	}
}

function displayChange_field_detailname_(row, status) {
}

function displayChange_field_oper_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_oper___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_oper_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "oper_");
	}
}

function displayChange_field_p1_(row, status) {
}

function displayChange_field_p2_(row, status) {
}

function displayChange_field_w1_(row, status) {
}

function displayChange_field_w2_(row, status) {
}

function displayChange_field_satuan_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_satuan___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_satuan_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "satuan_");
	}
}

function displayChange_field_lastupdated_(row, status) {
}

function displayChange_field_id_(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_oper_("all", "on");
	displayChange_field_satuan_("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tblabdetail_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(24);
		}
	}
}
function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

function scJQSelect2Add(seqRow, specificField) {
  if (null == specificField || "oper_" == specificField) {
    scJQSelect2Add_oper_(seqRow);
  }
  if (null == specificField || "satuan_" == specificField) {
    scJQSelect2Add_satuan_(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_oper_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_oper__obj" : "#id_sc_field_oper_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_oper__obj',
      dropdownCssClass: 'css_oper__obj',
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

function scJQSelect2Add_satuan_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_satuan__obj" : "#id_sc_field_satuan_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_satuan__obj',
      dropdownCssClass: 'css_satuan__obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_oper_) { displayChange_field_oper_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_satuan_) { displayChange_field_satuan_(iLine, "on"); } }, 150);
} // scJQElementsAdd

