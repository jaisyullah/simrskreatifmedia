
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
  scEventControl_data["subname_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kondisi_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jml_hari_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["oper_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["n1_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["n2_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["subname_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["subname_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kondisi_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kondisi_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jml_hari_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jml_hari_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["oper_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["oper_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["n1_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["n1_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["n2_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["n2_" + iSeqRow]["change"]) {
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
  if ("subname_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("kondisi_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("oper_" + iSeq == fieldName) {
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
  $('#id_sc_field_id_' + iSeqRow).bind('blur', function() { sc_form_tblabrujukananak_id__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_tblabrujukananak_id__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tblabrujukananak_id__onfocus(this, iSeqRow) });
  $('#id_sc_field_subname_' + iSeqRow).bind('blur', function() { sc_form_tblabrujukananak_subname__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_tblabrujukananak_subname__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tblabrujukananak_subname__onfocus(this, iSeqRow) });
  $('#id_sc_field_kondisi_' + iSeqRow).bind('blur', function() { sc_form_tblabrujukananak_kondisi__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_tblabrujukananak_kondisi__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tblabrujukananak_kondisi__onfocus(this, iSeqRow) });
  $('#id_sc_field_jml_hari_' + iSeqRow).bind('blur', function() { sc_form_tblabrujukananak_jml_hari__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_tblabrujukananak_jml_hari__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tblabrujukananak_jml_hari__onfocus(this, iSeqRow) });
  $('#id_sc_field_n1_' + iSeqRow).bind('blur', function() { sc_form_tblabrujukananak_n1__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_tblabrujukananak_n1__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tblabrujukananak_n1__onfocus(this, iSeqRow) });
  $('#id_sc_field_n2_' + iSeqRow).bind('blur', function() { sc_form_tblabrujukananak_n2__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_tblabrujukananak_n2__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tblabrujukananak_n2__onfocus(this, iSeqRow) });
  $('#id_sc_field_oper_' + iSeqRow).bind('blur', function() { sc_form_tblabrujukananak_oper__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_tblabrujukananak_oper__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tblabrujukananak_oper__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tblabrujukananak_id__onblur(oThis, iSeqRow) {
  do_ajax_form_tblabrujukananak_validate_id_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tblabrujukananak_id__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tblabrujukananak_id__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tblabrujukananak_subname__onblur(oThis, iSeqRow) {
  do_ajax_form_tblabrujukananak_validate_subname_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tblabrujukananak_subname__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tblabrujukananak_subname__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tblabrujukananak_kondisi__onblur(oThis, iSeqRow) {
  do_ajax_form_tblabrujukananak_validate_kondisi_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tblabrujukananak_kondisi__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tblabrujukananak_kondisi__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tblabrujukananak_jml_hari__onblur(oThis, iSeqRow) {
  do_ajax_form_tblabrujukananak_validate_jml_hari_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tblabrujukananak_jml_hari__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tblabrujukananak_jml_hari__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tblabrujukananak_n1__onblur(oThis, iSeqRow) {
  do_ajax_form_tblabrujukananak_validate_n1_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tblabrujukananak_n1__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tblabrujukananak_n1__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tblabrujukananak_n2__onblur(oThis, iSeqRow) {
  do_ajax_form_tblabrujukananak_validate_n2_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tblabrujukananak_n2__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tblabrujukananak_n2__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tblabrujukananak_oper__onblur(oThis, iSeqRow) {
  do_ajax_form_tblabrujukananak_validate_oper_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tblabrujukananak_oper__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tblabrujukananak_oper__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("subname_", "", status);
	displayChange_field("kondisi_", "", status);
	displayChange_field("jml_hari_", "", status);
	displayChange_field("oper_", "", status);
	displayChange_field("n1_", "", status);
	displayChange_field("n2_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_subname_(row, status);
	displayChange_field_kondisi_(row, status);
	displayChange_field_jml_hari_(row, status);
	displayChange_field_oper_(row, status);
	displayChange_field_n1_(row, status);
	displayChange_field_n2_(row, status);
	displayChange_field_id_(row, status);
}

function displayChange_field(field, row, status) {
	if ("subname_" == field) {
		displayChange_field_subname_(row, status);
	}
	if ("kondisi_" == field) {
		displayChange_field_kondisi_(row, status);
	}
	if ("jml_hari_" == field) {
		displayChange_field_jml_hari_(row, status);
	}
	if ("oper_" == field) {
		displayChange_field_oper_(row, status);
	}
	if ("n1_" == field) {
		displayChange_field_n1_(row, status);
	}
	if ("n2_" == field) {
		displayChange_field_n2_(row, status);
	}
	if ("id_" == field) {
		displayChange_field_id_(row, status);
	}
}

function displayChange_field_subname_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_subname___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_subname_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "subname_");
	}
}

function displayChange_field_kondisi_(row, status) {
}

function displayChange_field_jml_hari_(row, status) {
}

function displayChange_field_oper_(row, status) {
}

function displayChange_field_n1_(row, status) {
}

function displayChange_field_n2_(row, status) {
}

function displayChange_field_id_(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_subname_("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tblabrujukananak_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(29);
		}
	}
}
function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

function scJQSelect2Add(seqRow, specificField) {
  if (null == specificField || "subname_" == specificField) {
    scJQSelect2Add_subname_(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_subname_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_subname__obj" : "#id_sc_field_subname_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_subname__obj',
      dropdownCssClass: 'css_subname__obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_subname_) { displayChange_field_subname_(iLine, "on"); } }, 150);
} // scJQElementsAdd

