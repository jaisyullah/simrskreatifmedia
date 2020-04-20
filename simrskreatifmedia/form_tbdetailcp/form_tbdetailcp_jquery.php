
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
  scEventControl_data["id_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["desc_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jenisdesc_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["refdesc_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["days_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["desc_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["desc_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jenisdesc_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jenisdesc_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["refdesc_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["refdesc_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["days_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["days_" + iSeqRow]["change"]) {
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
  if ("jenisdesc_" + iSeq == fieldName) {
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
  $('#id_sc_field_id_' + iSeqRow).bind('blur', function() { sc_form_tbdetailcp_id__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_tbdetailcp_id__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tbdetailcp_id__onfocus(this, iSeqRow) });
  $('#id_sc_field_desc_' + iSeqRow).bind('blur', function() { sc_form_tbdetailcp_desc__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_tbdetailcp_desc__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbdetailcp_desc__onfocus(this, iSeqRow) });
  $('#id_sc_field_jenisdesc_' + iSeqRow).bind('blur', function() { sc_form_tbdetailcp_jenisdesc__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_tbdetailcp_jenisdesc__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbdetailcp_jenisdesc__onfocus(this, iSeqRow) });
  $('#id_sc_field_refdesc_' + iSeqRow).bind('blur', function() { sc_form_tbdetailcp_refdesc__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_tbdetailcp_refdesc__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbdetailcp_refdesc__onfocus(this, iSeqRow) });
  $('#id_sc_field_days_' + iSeqRow).bind('blur', function() { sc_form_tbdetailcp_days__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_tbdetailcp_days__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbdetailcp_days__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbdetailcp_id__onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailcp_validate_id_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbdetailcp_id__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbdetailcp_id__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbdetailcp_desc__onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailcp_validate_desc_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbdetailcp_desc__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbdetailcp_desc__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbdetailcp_jenisdesc__onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailcp_validate_jenisdesc_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbdetailcp_jenisdesc__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbdetailcp_jenisdesc__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbdetailcp_refdesc__onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailcp_validate_refdesc_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbdetailcp_refdesc__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbdetailcp_refdesc__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbdetailcp_days__onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailcp_validate_days_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbdetailcp_days__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbdetailcp_days__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("id_", "", status);
	displayChange_field("desc_", "", status);
	displayChange_field("jenisdesc_", "", status);
	displayChange_field("refdesc_", "", status);
	displayChange_field("days_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_id_(row, status);
	displayChange_field_desc_(row, status);
	displayChange_field_jenisdesc_(row, status);
	displayChange_field_refdesc_(row, status);
	displayChange_field_days_(row, status);
}

function displayChange_field(field, row, status) {
	if ("id_" == field) {
		displayChange_field_id_(row, status);
	}
	if ("desc_" == field) {
		displayChange_field_desc_(row, status);
	}
	if ("jenisdesc_" == field) {
		displayChange_field_jenisdesc_(row, status);
	}
	if ("refdesc_" == field) {
		displayChange_field_refdesc_(row, status);
	}
	if ("days_" == field) {
		displayChange_field_days_(row, status);
	}
}

function displayChange_field_id_(row, status) {
}

function displayChange_field_desc_(row, status) {
}

function displayChange_field_jenisdesc_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_jenisdesc___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_jenisdesc_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "jenisdesc_");
	}
}

function displayChange_field_refdesc_(row, status) {
}

function displayChange_field_days_(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_jenisdesc_("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbdetailcp_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(23);
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
		headerPlaceholder.hide();
	}
	else {
		if (scIsHeaderVisible(formHeaders)) {
			headerPlaceholder.hide();
		}
		else {
			if (!headerPlaceholder.filter(":visible").length || forceDisplay) {
				scSetFixedHeadersContents(formHeaders, headerPlaceholder);
				scSetFixedHeadersSize(formHeaders);
				headerPlaceholder.show();
			}
			scSetFixedHeadersPosition(formHeaders, headerPlaceholder);
			if (0 < rerunHeaderDisplay) {
				rerunHeaderDisplay--;
				setTimeout(function() {
					scSetFixedHeadersContents(formHeaders, headerPlaceholder);
					scSetFixedHeadersSize(formHeaders);
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
  if (null == specificField || "jenisdesc_" == specificField) {
    scJQSelect2Add_jenisdesc_(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_jenisdesc_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_jenisdesc__obj" : "#id_sc_field_jenisdesc_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_jenisdesc__obj',
      dropdownCssClass: 'css_jenisdesc__obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_jenisdesc_) { displayChange_field_jenisdesc_(iLine, "on"); } }, 150);
} // scJQElementsAdd

