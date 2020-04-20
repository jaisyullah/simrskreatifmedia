
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
  scEventControl_data["set_tindakan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["poli" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["aktif" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kode_tind" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["set_tindakan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["set_tindakan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["poli" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["poli" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["aktif" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["aktif" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kode_tind" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kode_tind" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("poli" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("kode_tind" + iSeq == fieldName) {
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
  $('#id_sc_field_set_tindakan' + iSeqRow).bind('blur', function() { sc_form_tbsettindakan_set_tindakan_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tbsettindakan_set_tindakan_onfocus(this, iSeqRow) });
  $('#id_sc_field_kode_tind' + iSeqRow).bind('blur', function() { sc_form_tbsettindakan_kode_tind_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbsettindakan_kode_tind_onfocus(this, iSeqRow) });
  $('#id_sc_field_poli' + iSeqRow).bind('blur', function() { sc_form_tbsettindakan_poli_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_tbsettindakan_poli_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tbsettindakan_poli_onfocus(this, iSeqRow) });
  $('#id_sc_field_aktif' + iSeqRow).bind('blur', function() { sc_form_tbsettindakan_aktif_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbsettindakan_aktif_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbsettindakan_set_tindakan_onblur(oThis, iSeqRow) {
  do_ajax_form_tbsettindakan_mob_validate_set_tindakan();
  scCssBlur(oThis);
}

function sc_form_tbsettindakan_set_tindakan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbsettindakan_kode_tind_onblur(oThis, iSeqRow) {
  do_ajax_form_tbsettindakan_mob_validate_kode_tind();
  scCssBlur(oThis);
}

function sc_form_tbsettindakan_kode_tind_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbsettindakan_poli_onblur(oThis, iSeqRow) {
  do_ajax_form_tbsettindakan_mob_validate_poli();
  scCssBlur(oThis);
}

function sc_form_tbsettindakan_poli_onchange(oThis, iSeqRow) {
  do_ajax_form_tbsettindakan_mob_refresh_poli();
}

function sc_form_tbsettindakan_poli_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbsettindakan_aktif_onblur(oThis, iSeqRow) {
  do_ajax_form_tbsettindakan_mob_validate_aktif();
  scCssBlur(oThis);
}

function sc_form_tbsettindakan_aktif_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("set_tindakan", "", status);
	displayChange_field("poli", "", status);
	displayChange_field("aktif", "", status);
	displayChange_field("kode_tind", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_set_tindakan(row, status);
	displayChange_field_poli(row, status);
	displayChange_field_aktif(row, status);
	displayChange_field_kode_tind(row, status);
}

function displayChange_field(field, row, status) {
	if ("set_tindakan" == field) {
		displayChange_field_set_tindakan(row, status);
	}
	if ("poli" == field) {
		displayChange_field_poli(row, status);
	}
	if ("aktif" == field) {
		displayChange_field_aktif(row, status);
	}
	if ("kode_tind" == field) {
		displayChange_field_kode_tind(row, status);
	}
}

function displayChange_field_set_tindakan(row, status) {
}

function displayChange_field_poli(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_poli__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_poli" + row).select2("destroy");
		}
		scJQSelect2Add(row, "poli");
	}
}

function displayChange_field_aktif(row, status) {
}

function displayChange_field_kode_tind(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_kode_tind__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_kode_tind" + row).select2("destroy");
		}
		scJQSelect2Add(row, "kode_tind");
	}
}

function scRecreateSelect2() {
	displayChange_field_poli("all", "on");
	displayChange_field_kode_tind("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbsettindakan_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(30);
		}
	}
}
function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

function scJQSelect2Add(seqRow, specificField) {
  if (null == specificField || "poli" == specificField) {
    scJQSelect2Add_poli(seqRow);
  }
  if (null == specificField || "kode_tind" == specificField) {
    scJQSelect2Add_kode_tind(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_poli(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_poli_obj" : "#id_sc_field_poli" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_poli_obj',
      dropdownCssClass: 'css_poli_obj',
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

function scJQSelect2Add_kode_tind(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_kode_tind_obj" : "#id_sc_field_kode_tind" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_kode_tind_obj',
      dropdownCssClass: 'css_kode_tind_obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_poli) { displayChange_field_poli(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_kode_tind) { displayChange_field_kode_tind(iLine, "on"); } }, 150);
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
