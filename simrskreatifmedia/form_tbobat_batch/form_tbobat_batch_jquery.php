
function scJQGeneralAdd() {
  scLoadScInput('input:text.sc-js-input');
  scLoadScInput('input:password.sc-js-input');
  scLoadScInput('input:checkbox.sc-js-input');
  scLoadScInput('input:radio.sc-js-input');
  scLoadScInput('select.sc-js-input');
  scLoadScInput('textarea.sc-js-input');

  scJQCheckboxControl_general('')
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
  scEventControl_data["jenisbarang_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kemasanbeli_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["satuanterkecil_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["generik_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["paten_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jenisobat_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["stokminimal_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["max_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["namaitem_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["namaitem_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jenisbarang_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jenisbarang_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kemasanbeli_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kemasanbeli_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["satuanterkecil_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["satuanterkecil_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["generik_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["generik_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["paten_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["paten_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jenisobat_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jenisobat_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["stokminimal_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["stokminimal_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["max_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["max_" + iSeqRow]["change"]) {
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
  if ("jenisbarang_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("kemasanbeli_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("satuanterkecil_" + iSeq == fieldName) {
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
  $('#id_sc_field_namaitem_' + iSeqRow).bind('blur', function() { sc_form_tbobat_batch_namaitem__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_tbobat_batch_namaitem__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbobat_batch_namaitem__onfocus(this, iSeqRow) });
  $('#id_sc_field_jenisbarang_' + iSeqRow).bind('blur', function() { sc_form_tbobat_batch_jenisbarang__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_tbobat_batch_jenisbarang__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tbobat_batch_jenisbarang__onfocus(this, iSeqRow) });
  $('#id_sc_field_jenisobat_' + iSeqRow).bind('blur', function() { sc_form_tbobat_batch_jenisobat__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_tbobat_batch_jenisobat__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbobat_batch_jenisobat__onfocus(this, iSeqRow) });
  $('#id_sc_field_satuanterkecil_' + iSeqRow).bind('blur', function() { sc_form_tbobat_batch_satuanterkecil__onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_tbobat_batch_satuanterkecil__onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_tbobat_batch_satuanterkecil__onfocus(this, iSeqRow) });
  $('#id_sc_field_stokminimal_' + iSeqRow).bind('blur', function() { sc_form_tbobat_batch_stokminimal__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_tbobat_batch_stokminimal__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tbobat_batch_stokminimal__onfocus(this, iSeqRow) });
  $('#id_sc_field_kemasanbeli_' + iSeqRow).bind('blur', function() { sc_form_tbobat_batch_kemasanbeli__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_tbobat_batch_kemasanbeli__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tbobat_batch_kemasanbeli__onfocus(this, iSeqRow) });
  $('#id_sc_field_generik_' + iSeqRow).bind('blur', function() { sc_form_tbobat_batch_generik__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_tbobat_batch_generik__onchange(this, iSeqRow) })
                                      .bind('click', function() { sc_form_tbobat_batch_generik__onclick(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbobat_batch_generik__onfocus(this, iSeqRow) });
  $('#id_sc_field_paten_' + iSeqRow).bind('blur', function() { sc_form_tbobat_batch_paten__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_tbobat_batch_paten__onchange(this, iSeqRow) })
                                    .bind('click', function() { sc_form_tbobat_batch_paten__onclick(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbobat_batch_paten__onfocus(this, iSeqRow) });
  $('#id_sc_field_max_' + iSeqRow).bind('blur', function() { sc_form_tbobat_batch_max__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_tbobat_batch_max__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tbobat_batch_max__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbobat_batch_namaitem__onblur(oThis, iSeqRow) {
  do_ajax_form_tbobat_batch_validate_namaitem_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbobat_batch_namaitem__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbobat_batch_namaitem__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbobat_batch_jenisbarang__onblur(oThis, iSeqRow) {
  do_ajax_form_tbobat_batch_validate_jenisbarang_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbobat_batch_jenisbarang__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbobat_batch_jenisbarang__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbobat_batch_jenisobat__onblur(oThis, iSeqRow) {
  do_ajax_form_tbobat_batch_validate_jenisobat_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbobat_batch_jenisobat__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbobat_batch_jenisobat__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbobat_batch_satuanterkecil__onblur(oThis, iSeqRow) {
  do_ajax_form_tbobat_batch_validate_satuanterkecil_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbobat_batch_satuanterkecil__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbobat_batch_satuanterkecil__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbobat_batch_stokminimal__onblur(oThis, iSeqRow) {
  do_ajax_form_tbobat_batch_validate_stokminimal_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbobat_batch_stokminimal__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbobat_batch_stokminimal__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbobat_batch_kemasanbeli__onblur(oThis, iSeqRow) {
  do_ajax_form_tbobat_batch_validate_kemasanbeli_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbobat_batch_kemasanbeli__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbobat_batch_kemasanbeli__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbobat_batch_generik__onblur(oThis, iSeqRow) {
  do_ajax_form_tbobat_batch_validate_generik_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbobat_batch_generik__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbobat_batch_generik__onclick(oThis, iSeqRow) {
  do_ajax_form_tbobat_batch_event_generik__onclick(iSeqRow);
}

function sc_form_tbobat_batch_generik__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbobat_batch_paten__onblur(oThis, iSeqRow) {
  do_ajax_form_tbobat_batch_validate_paten_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbobat_batch_paten__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbobat_batch_paten__onclick(oThis, iSeqRow) {
  do_ajax_form_tbobat_batch_event_paten__onclick(iSeqRow);
}

function sc_form_tbobat_batch_paten__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbobat_batch_max__onblur(oThis, iSeqRow) {
  do_ajax_form_tbobat_batch_validate_max_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbobat_batch_max__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbobat_batch_max__onfocus(oThis, iSeqRow) {
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
	displayChange_field("jenisbarang_", "", status);
	displayChange_field("kemasanbeli_", "", status);
	displayChange_field("satuanterkecil_", "", status);
	displayChange_field("generik_", "", status);
	displayChange_field("paten_", "", status);
	displayChange_field("jenisobat_", "", status);
	displayChange_field("stokminimal_", "", status);
	displayChange_field("max_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_namaitem_(row, status);
	displayChange_field_jenisbarang_(row, status);
	displayChange_field_kemasanbeli_(row, status);
	displayChange_field_satuanterkecil_(row, status);
	displayChange_field_generik_(row, status);
	displayChange_field_paten_(row, status);
	displayChange_field_jenisobat_(row, status);
	displayChange_field_stokminimal_(row, status);
	displayChange_field_max_(row, status);
}

function displayChange_field(field, row, status) {
	if ("namaitem_" == field) {
		displayChange_field_namaitem_(row, status);
	}
	if ("jenisbarang_" == field) {
		displayChange_field_jenisbarang_(row, status);
	}
	if ("kemasanbeli_" == field) {
		displayChange_field_kemasanbeli_(row, status);
	}
	if ("satuanterkecil_" == field) {
		displayChange_field_satuanterkecil_(row, status);
	}
	if ("generik_" == field) {
		displayChange_field_generik_(row, status);
	}
	if ("paten_" == field) {
		displayChange_field_paten_(row, status);
	}
	if ("jenisobat_" == field) {
		displayChange_field_jenisobat_(row, status);
	}
	if ("stokminimal_" == field) {
		displayChange_field_stokminimal_(row, status);
	}
	if ("max_" == field) {
		displayChange_field_max_(row, status);
	}
}

function displayChange_field_namaitem_(row, status) {
}

function displayChange_field_jenisbarang_(row, status) {
}

function displayChange_field_kemasanbeli_(row, status) {
}

function displayChange_field_satuanterkecil_(row, status) {
}

function displayChange_field_generik_(row, status) {
}

function displayChange_field_paten_(row, status) {
}

function displayChange_field_jenisobat_(row, status) {
}

function displayChange_field_stokminimal_(row, status) {
}

function displayChange_field_max_(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbobat_batch_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(25);
		}
	}
}
<?php

$formWidthCorrection = '';
if (false !== strpos($this->Ini->form_table_width, 'calc')) {
	$formWidthCalc = substr($this->Ini->form_table_width, strpos($this->Ini->form_table_width, '(') + 1);
	$formWidthCalc = substr($formWidthCalc, 0, strpos($formWidthCalc, ')'));
	$formWidthParts = explode(' ', $formWidthCalc);
	if (3 == count($formWidthParts) && 'px' == substr($formWidthParts[2], -2)) {
		$formWidthParts[2] = substr($formWidthParts[2], 0, -2) / 2;
		$formWidthCorrection = $formWidthParts[1] . ' ' . $formWidthParts[2];
	}
}

?>

$(window).scroll(function() {
	scSetFixedHeaders();
});

var rerunHeaderDisplay = 1;

function scSetFixedHeaders(forceDisplay) {
	if (null == forceDisplay) {
		forceDisplay = false;
	}
	var divScroll, formHeaders, headerPlaceholder;
	formHeaders = scGetHeaderRow();
	headerPlaceholder = $("#sc-id-fixedheaders-placeholder");
	if (!formHeaders) {
        if (headerPlaceholder.filter(":visible").length) {
            scJQCheckboxControl_updateHide();
        }
		headerPlaceholder.hide();
	}
	else {
		if (scIsHeaderVisible(formHeaders)) {
            if (headerPlaceholder.filter(":visible").length) {
                scJQCheckboxControl_updateHide();
            }
			headerPlaceholder.hide();
		}
		else {
			if (!headerPlaceholder.filter(":visible").length || forceDisplay) {
				scSetFixedHeadersContents(formHeaders, headerPlaceholder);
				scSetFixedHeadersSize(formHeaders);
				scJQCheckboxControl_updateShow();
				headerPlaceholder.show();
			}
			scSetFixedHeadersPosition(formHeaders, headerPlaceholder);
			if (0 < rerunHeaderDisplay) {
				rerunHeaderDisplay--;
				setTimeout(function() {
					scSetFixedHeadersContents(formHeaders, headerPlaceholder);
					scSetFixedHeadersSize(formHeaders);
					scJQCheckboxControl_updateShow();
					headerPlaceholder.show();
					scSetFixedHeadersPosition(formHeaders, headerPlaceholder);
				}, 5);
			}
		}
	}
}

function scSetFixedHeadersPosition(formHeaders, headerPlaceholder) {
	if (formHeaders) {
		headerPlaceholder.css({"top": 0<?php echo $formWidthCorrection ?>, "left": (Math.floor(formHeaders.position().left) - $(document).scrollLeft()<?php echo $formWidthCorrection ?>) + "px"});
	}
}

function scIsHeaderVisible(formHeaders) {
	if (typeof(scIsHeaderVisibleMobile) === typeof(function(){})) { return scIsHeaderVisibleMobile(gridHeaders); }
	return formHeaders.offset().top > $(document).scrollTop();
}

function scGetHeaderRow() {
	var formHeaders = $(".sc-ui-header-row").filter(":visible");
	if (!formHeaders.length) {
		formHeaders = false;
	}
	return formHeaders;
}

function scSetFixedHeadersContents(formHeaders, headerPlaceholder) {
	var i, htmlContent;
	htmlContent = "<table id=\"sc-id-fixed-headers\" class=\"scFormTable\">";
	for (i = 0; i < formHeaders.length; i++) {
		htmlContent += "<tr class=\"scFormLabelOddMult\" id=\"sc-id-headers-row-" + i + "\">" + $(formHeaders[i]).html() + "</tr>";
	}
	htmlContent += "</table>";
	headerPlaceholder.html(htmlContent);
	scJQCheckboxControl_general("#sc-id-fixedheaders-placeholder ");
}

function scSetFixedHeadersSize(formHeaders) {
	var i, j, headerColumns, formColumns, cellHeight, cellWidth, tableOriginal, tableHeaders;
	tableOriginal = $("#hidden_bloco_0");
	tableHeaders = document.getElementById("sc-id-fixed-headers");
	$(tableHeaders).css("width", $(tableOriginal).outerWidth());
	for (i = 0; i < formHeaders.length; i++) {
		headerColumns = $("#sc-id-fixed-headers-row-" + i).find("td");
		formColumns = $(formHeaders[i]).find("td");
		for (j = 0; j < formColumns.length; j++) {
			if (window.getComputedStyle(formColumns[j])) {
				cellWidth = window.getComputedStyle(formColumns[j]).width;
				cellHeight = window.getComputedStyle(formColumns[j]).height;
			}
			else {
				cellWidth = $(formColumns[j]).width() + "px";
				cellHeight = $(formColumns[j]).height() + "px";
			}
			$(headerColumns[j]).css({
				"width": cellWidth,
				"height": cellHeight
			});
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

function scJQCheckboxControl_general(mainContainer) {
    $(mainContainer + '.sc-ui-checkbox-generik_-control').click(function() { scJQCheckboxControl('generik_', '__ALL__', this); });
    $(mainContainer + '.sc-ui-checkbox-paten_-control').click(function() { scJQCheckboxControl('paten_', '__ALL__', this); });
}

function scJQCheckboxControl_updateShow() {
    $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-generik_-control').prop("checked", $('#div_hidden_bloco_0 .sc-ui-checkbox-generik_-control').prop("checked"));
    $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-paten_-control').prop("checked", $('#div_hidden_bloco_0 .sc-ui-checkbox-paten_-control').prop("checked"));
}

function scJQCheckboxControl_updateHide() {
    $('#div_hidden_bloco_0 .sc-ui-checkbox-generik_-control').prop("checked", $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-generik_-control').prop("checked"));
    $('#div_hidden_bloco_0 .sc-ui-checkbox-paten_-control').prop("checked", $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-paten_-control').prop("checked"));
}

function scJQCheckboxControl(sColumn, sSeqRow, oCheckbox) {
  var iSeqRow = '';

  if ('__ALL__' == sColumn || 'generik_' == sColumn) {
    iSeqRow = ('__REC__' == sSeqRow) ? $(oCheckbox).attr('alt') : '';
    scJQCheckboxControl_generik_(iSeqRow, oCheckbox.checked);
    if ('__REC__' == sSeqRow) {
      nm_check_insert(iSeqRow);
    }
    else {
      if ('__ALL__' == sColumn || 'generik_' == sColumn) {
         for (var i = 1; i <= iAjaxNewLine; i++) {
           nm_check_insert(i);
         }
      }
    }
    if ('__ALL__' == sColumn && '__ALL__' == sSeqRow) {
      var $oCheckbox = $(".sc-ui-checkbox-record-all");
      for (var i = 0; i < $oCheckbox.length; i++) {
        if (oCheckbox.checked != $oCheckbox[i].checked) {
          $oCheckbox[i].checked = oCheckbox.checked;
        }
      }
    }
  }

  if ('__ALL__' == sColumn || 'paten_' == sColumn) {
    iSeqRow = ('__REC__' == sSeqRow) ? $(oCheckbox).attr('alt') : '';
    scJQCheckboxControl_paten_(iSeqRow, oCheckbox.checked);
    if ('__REC__' == sSeqRow) {
      nm_check_insert(iSeqRow);
    }
    else {
      if ('__ALL__' == sColumn || 'paten_' == sColumn) {
         for (var i = 1; i <= iAjaxNewLine; i++) {
           nm_check_insert(i);
         }
      }
    }
    if ('__ALL__' == sColumn && '__ALL__' == sSeqRow) {
      var $oCheckbox = $(".sc-ui-checkbox-record-all");
      for (var i = 0; i < $oCheckbox.length; i++) {
        if (oCheckbox.checked != $oCheckbox[i].checked) {
          $oCheckbox[i].checked = oCheckbox.checked;
        }
      }
    }
  }

} // scJQCheckboxControl

function scJQCheckboxControl_generik_(iSeqRow, bChecked) {
  if ('__ALL__' == iSeqRow) {
    var $oCheckbox = $(".sc-ui-checkbox-generik_");
  }
  else {
    var $oCheckbox = $(".sc-ui-checkbox-generik_" + iSeqRow);
  }

  var bChanged = false, lcsObjects;
  for (var i = 0; i < $oCheckbox.length; i++) {
    if (bChecked != $oCheckbox[i].checked && !$oCheckbox[i].disabled) {
      $oCheckbox[i].checked = bChecked;
      nm_check_insert(iSeqRow);
      lcsObjects = $($oCheckbox[i]).parent().find(".lcs_switch");
      if (lcsObjects.length) {
        if (bChecked) {
          lcsObjects.lcs_on();
        }
        else {
          lcsObjects.lcs_off();
        }
      }
      bChanged = true;
    }
  }
} // scJQCheckboxControl_generik_

function scJQCheckboxControl_paten_(iSeqRow, bChecked) {
  if ('__ALL__' == iSeqRow) {
    var $oCheckbox = $(".sc-ui-checkbox-paten_");
  }
  else {
    var $oCheckbox = $(".sc-ui-checkbox-paten_" + iSeqRow);
  }

  var bChanged = false, lcsObjects;
  for (var i = 0; i < $oCheckbox.length; i++) {
    if (bChecked != $oCheckbox[i].checked && !$oCheckbox[i].disabled) {
      $oCheckbox[i].checked = bChecked;
      nm_check_insert(iSeqRow);
      lcsObjects = $($oCheckbox[i]).parent().find(".lcs_switch");
      if (lcsObjects.length) {
        if (bChecked) {
          lcsObjects.lcs_on();
        }
        else {
          lcsObjects.lcs_off();
        }
      }
      bChanged = true;
    }
  }
} // scJQCheckboxControl_paten_

