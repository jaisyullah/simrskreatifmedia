
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
  scEventControl_data["kodereq" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["unit" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tglreq" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["selesai" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detailreq" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["kodereq" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kodereq" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["unit" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["unit" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tglreq" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tglreq" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["selesai" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["selesai" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detailreq" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detailreq" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("unit" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("selesai" + iSeq == fieldName) {
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
  $('#id_sc_field_kodereq' + iSeqRow).bind('blur', function() { sc_form_tbreqitem_kodereq_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbreqitem_kodereq_onfocus(this, iSeqRow) });
  $('#id_sc_field_unit' + iSeqRow).bind('blur', function() { sc_form_tbreqitem_unit_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tbreqitem_unit_onfocus(this, iSeqRow) });
  $('#id_sc_field_tglreq' + iSeqRow).bind('blur', function() { sc_form_tbreqitem_tglreq_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbreqitem_tglreq_onfocus(this, iSeqRow) });
  $('#id_sc_field_tglreq_hora' + iSeqRow).bind('blur', function() { sc_form_tbreqitem_tglreq_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbreqitem_tglreq_onfocus(this, iSeqRow) });
  $('#id_sc_field_selesai' + iSeqRow).bind('blur', function() { sc_form_tbreqitem_selesai_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbreqitem_selesai_onfocus(this, iSeqRow) });
  $('#id_sc_field_detailreq' + iSeqRow).bind('blur', function() { sc_form_tbreqitem_detailreq_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbreqitem_detailreq_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbreqitem_kodereq_onblur(oThis, iSeqRow) {
  do_ajax_form_tbreqitem_mob_validate_kodereq();
  scCssBlur(oThis);
}

function sc_form_tbreqitem_kodereq_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbreqitem_unit_onblur(oThis, iSeqRow) {
  do_ajax_form_tbreqitem_mob_validate_unit();
  scCssBlur(oThis);
}

function sc_form_tbreqitem_unit_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbreqitem_tglreq_onblur(oThis, iSeqRow) {
  do_ajax_form_tbreqitem_mob_validate_tglreq();
  scCssBlur(oThis);
}

function sc_form_tbreqitem_tglreq_onblur(oThis, iSeqRow) {
  do_ajax_form_tbreqitem_mob_validate_tglreq();
  scCssBlur(oThis);
}

function sc_form_tbreqitem_tglreq_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbreqitem_tglreq_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbreqitem_selesai_onblur(oThis, iSeqRow) {
  do_ajax_form_tbreqitem_mob_validate_selesai();
  scCssBlur(oThis);
}

function sc_form_tbreqitem_selesai_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbreqitem_detailreq_onblur(oThis, iSeqRow) {
  do_ajax_form_tbreqitem_mob_validate_detailreq();
  scCssBlur(oThis);
}

function sc_form_tbreqitem_detailreq_onfocus(oThis, iSeqRow) {
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
}

function displayChange_block_0(status) {
	displayChange_field("kodereq", "", status);
	displayChange_field("unit", "", status);
	displayChange_field("tglreq", "", status);
	displayChange_field("selesai", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("detailreq", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_kodereq(row, status);
	displayChange_field_unit(row, status);
	displayChange_field_tglreq(row, status);
	displayChange_field_selesai(row, status);
	displayChange_field_detailreq(row, status);
}

function displayChange_field(field, row, status) {
	if ("kodereq" == field) {
		displayChange_field_kodereq(row, status);
	}
	if ("unit" == field) {
		displayChange_field_unit(row, status);
	}
	if ("tglreq" == field) {
		displayChange_field_tglreq(row, status);
	}
	if ("selesai" == field) {
		displayChange_field_selesai(row, status);
	}
	if ("detailreq" == field) {
		displayChange_field_detailreq(row, status);
	}
}

function displayChange_field_kodereq(row, status) {
}

function displayChange_field_unit(row, status) {
}

function displayChange_field_tglreq(row, status) {
}

function displayChange_field_selesai(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_selesai__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_selesai" + row).select2("destroy");
		}
		scJQSelect2Add(row, "selesai");
	}
}

function displayChange_field_detailreq(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbdetailreqitem_mob")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbdetailreqitem_mob")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
	displayChange_field_selesai("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbreqitem_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(26);
		}
	}
}
function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

function scJQSelect2Add(seqRow, specificField) {
  if (null == specificField || "selesai" == specificField) {
    scJQSelect2Add_selesai(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_selesai(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_selesai_obj" : "#id_sc_field_selesai" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_selesai_obj',
      dropdownCssClass: 'css_selesai_obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_selesai) { displayChange_field_selesai(iLine, "on"); } }, 150);
} // scJQElementsAdd

var scBtnGrpStatus = {};
function scBtnGrpShow(sGroup) {
  if (typeof(scBtnGrpShowMobile) === typeof(function(){})) { return scBtnGrpShowMobile(sGroup); };
  $('#sc_btgp_btn_' + sGroup).addClass('selected');
  var btnPos = $('#sc_btgp_btn_' + sGroup).offset();
  scBtnGrpStatus[sGroup] = 'open';
  $('#sc_btgp_btn_' + sGroup).mouseout(function() {
    scBtnGrpStatus[sGroup] = '';
    setTimeout(function() {
      scBtnGrpHide(sGroup, false);
    }, 1000);
  }).mouseover(function() {
    scBtnGrpStatus[sGroup] = 'over';
  });
  $('#sc_btgp_div_' + sGroup + ' span a').click(function() {
    scBtnGrpStatus[sGroup] = 'out';
    scBtnGrpHide(sGroup, false);
  });
  $('#sc_btgp_div_' + sGroup).css({
    'left': btnPos.left
  })
  .mouseover(function() {
    scBtnGrpStatus[sGroup] = 'over';
  })
  .mouseleave(function() {
    scBtnGrpStatus[sGroup] = 'out';
    setTimeout(function() {
      scBtnGrpHide(sGroup, false);
    }, 1000);
  })
  .show('fast');
}
function scBtnGrpHide(sGroup, bForce) {
  if (bForce || 'over' != scBtnGrpStatus[sGroup]) {
    $('#sc_btgp_div_' + sGroup).hide('fast');
    $('#sc_btgp_btn_' + sGroup).addClass('selected');
  }
}
