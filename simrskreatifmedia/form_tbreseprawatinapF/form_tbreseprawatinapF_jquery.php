
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
  scEventControl_data["satuan_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jumlah_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["signa_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jenisaturanpakai_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["biaya_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["diskon_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["trandate_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["trancode_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["item_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["item_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["satuan_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["satuan_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jumlah_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jumlah_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["signa_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["signa_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jenisaturanpakai_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jenisaturanpakai_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["biaya_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["biaya_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["diskon_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["diskon_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["trandate_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["trandate_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["trancode_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["trancode_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["signa_" + iSeqRow]["autocomp"]) {
    return true;
  }
  if (scEventControl_data["jenisaturanpakai_" + iSeqRow]["autocomp"]) {
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
  if ("diskon_" + iSeq == fieldName) {
    _scCalculatorBlurOk[fieldId] = false;
  }
  scEventControl_data[fieldName]["blur"] = true;
  if ("item_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("satuan_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("kelas_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("stok_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("item_" + iSeq == fieldName) {
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

function scEventControl_onCalculator_diskon_() {
  if (!_scCalculatorControl["id_sc_field_diskon_"]) {
    _scCalculatorBlurOk["id_sc_field_diskon_"] = true;
    do_ajax_form_tbreseprawatinapF_event_diskon__onblur();
  }
} // scEventControl_onCalculator_diskon_

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_id_' + iSeqRow).bind('blur', function() { sc_form_tbreseprawatinapF_id__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_tbreseprawatinapF_id__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tbreseprawatinapF_id__onfocus(this, iSeqRow) });
  $('#id_sc_field_trancode_' + iSeqRow).bind('blur', function() { sc_form_tbreseprawatinapF_trancode__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_tbreseprawatinapF_trancode__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbreseprawatinapF_trancode__onfocus(this, iSeqRow) });
  $('#id_sc_field_item_' + iSeqRow).bind('blur', function() { sc_form_tbreseprawatinapF_item__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_tbreseprawatinapF_item__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbreseprawatinapF_item__onfocus(this, iSeqRow) });
  $('#id_sc_field_satuan_' + iSeqRow).bind('blur', function() { sc_form_tbreseprawatinapF_satuan__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_tbreseprawatinapF_satuan__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbreseprawatinapF_satuan__onfocus(this, iSeqRow) });
  $('#id_sc_field_jumlah_' + iSeqRow).bind('blur', function() { sc_form_tbreseprawatinapF_jumlah__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_tbreseprawatinapF_jumlah__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbreseprawatinapF_jumlah__onfocus(this, iSeqRow) });
  $('#id_sc_field_signa_' + iSeqRow).bind('blur', function() { sc_form_tbreseprawatinapF_signa__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_tbreseprawatinapF_signa__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbreseprawatinapF_signa__onfocus(this, iSeqRow) });
  $('#id_sc_field_jenisaturanpakai_' + iSeqRow).bind('blur', function() { sc_form_tbreseprawatinapF_jenisaturanpakai__onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_tbreseprawatinapF_jenisaturanpakai__onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_tbreseprawatinapF_jenisaturanpakai__onfocus(this, iSeqRow) });
  $('#id_sc_field_biaya_' + iSeqRow).bind('blur', function() { sc_form_tbreseprawatinapF_biaya__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_tbreseprawatinapF_biaya__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbreseprawatinapF_biaya__onfocus(this, iSeqRow) });
  $('#id_sc_field_trandate_' + iSeqRow).bind('blur', function() { sc_form_tbreseprawatinapF_trandate__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_tbreseprawatinapF_trandate__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbreseprawatinapF_trandate__onfocus(this, iSeqRow) });
  $('#id_sc_field_trandate__hora' + iSeqRow).bind('blur', function() { sc_form_tbreseprawatinapF_trandate__hora_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_tbreseprawatinapF_trandate__hora_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_tbreseprawatinapF_trandate__hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_diskon_' + iSeqRow).bind('blur', function() { sc_form_tbreseprawatinapF_diskon__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_tbreseprawatinapF_diskon__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbreseprawatinapF_diskon__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbreseprawatinapF_id__onblur(oThis, iSeqRow) {
  do_ajax_form_tbreseprawatinapF_validate_id_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbreseprawatinapF_id__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbreseprawatinapF_id__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbreseprawatinapF_trancode__onblur(oThis, iSeqRow) {
  do_ajax_form_tbreseprawatinapF_validate_trancode_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbreseprawatinapF_trancode__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbreseprawatinapF_trancode__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbreseprawatinapF_item__onblur(oThis, iSeqRow) {
  do_ajax_form_tbreseprawatinapF_validate_item_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbreseprawatinapF_item__onchange(oThis, iSeqRow) {
  do_ajax_form_tbreseprawatinapF_event_item__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_tbreseprawatinapF_item__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbreseprawatinapF_satuan__onblur(oThis, iSeqRow) {
  do_ajax_form_tbreseprawatinapF_validate_satuan_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbreseprawatinapF_satuan__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbreseprawatinapF_satuan__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbreseprawatinapF_jumlah__onblur(oThis, iSeqRow) {
  do_ajax_form_tbreseprawatinapF_validate_jumlah_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbreseprawatinapF_jumlah__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbreseprawatinapF_jumlah__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbreseprawatinapF_signa__onblur(oThis, iSeqRow) {
  do_ajax_form_tbreseprawatinapF_validate_signa_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbreseprawatinapF_signa__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbreseprawatinapF_signa__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbreseprawatinapF_jenisaturanpakai__onblur(oThis, iSeqRow) {
  do_ajax_form_tbreseprawatinapF_validate_jenisaturanpakai_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbreseprawatinapF_jenisaturanpakai__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbreseprawatinapF_jenisaturanpakai__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbreseprawatinapF_biaya__onblur(oThis, iSeqRow) {
  do_ajax_form_tbreseprawatinapF_validate_biaya_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbreseprawatinapF_biaya__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbreseprawatinapF_biaya__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbreseprawatinapF_trandate__onblur(oThis, iSeqRow) {
  do_ajax_form_tbreseprawatinapF_validate_trandate_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbreseprawatinapF_trandate__hora_onblur(oThis, iSeqRow) {
  do_ajax_form_tbreseprawatinapF_validate_trandate_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbreseprawatinapF_trandate__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbreseprawatinapF_trandate__hora_onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbreseprawatinapF_trandate__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbreseprawatinapF_trandate__hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbreseprawatinapF_diskon__onblur(oThis, iSeqRow) {
  do_ajax_form_tbreseprawatinapF_validate_diskon_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbreseprawatinapF_diskon__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbreseprawatinapF_diskon__onfocus(oThis, iSeqRow) {
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
	displayChange_field("satuan_", "", status);
	displayChange_field("jumlah_", "", status);
	displayChange_field("signa_", "", status);
	displayChange_field("jenisaturanpakai_", "", status);
	displayChange_field("biaya_", "", status);
	displayChange_field("diskon_", "", status);
	displayChange_field("trandate_", "", status);
	displayChange_field("trancode_", "", status);
	displayChange_field("id_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_item_(row, status);
	displayChange_field_satuan_(row, status);
	displayChange_field_jumlah_(row, status);
	displayChange_field_signa_(row, status);
	displayChange_field_jenisaturanpakai_(row, status);
	displayChange_field_biaya_(row, status);
	displayChange_field_diskon_(row, status);
	displayChange_field_trandate_(row, status);
	displayChange_field_trancode_(row, status);
	displayChange_field_id_(row, status);
}

function displayChange_field(field, row, status) {
	if ("item_" == field) {
		displayChange_field_item_(row, status);
	}
	if ("satuan_" == field) {
		displayChange_field_satuan_(row, status);
	}
	if ("jumlah_" == field) {
		displayChange_field_jumlah_(row, status);
	}
	if ("signa_" == field) {
		displayChange_field_signa_(row, status);
	}
	if ("jenisaturanpakai_" == field) {
		displayChange_field_jenisaturanpakai_(row, status);
	}
	if ("biaya_" == field) {
		displayChange_field_biaya_(row, status);
	}
	if ("diskon_" == field) {
		displayChange_field_diskon_(row, status);
	}
	if ("trandate_" == field) {
		displayChange_field_trandate_(row, status);
	}
	if ("trancode_" == field) {
		displayChange_field_trancode_(row, status);
	}
	if ("id_" == field) {
		displayChange_field_id_(row, status);
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

function displayChange_field_satuan_(row, status) {
}

function displayChange_field_jumlah_(row, status) {
}

function displayChange_field_signa_(row, status) {
}

function displayChange_field_jenisaturanpakai_(row, status) {
}

function displayChange_field_biaya_(row, status) {
}

function displayChange_field_diskon_(row, status) {
}

function displayChange_field_trandate_(row, status) {
}

function displayChange_field_trancode_(row, status) {
}

function displayChange_field_id_(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_item_("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbreseprawatinapF_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(30);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_trandate_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_trandate_" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['trandate_']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['trandate_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_tbreseprawatinapF_validate_trandate_(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['trandate_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
} // scJQCalendarAdd

var jqCalcMonetPos = {};
var _scCalculatorBlurOk = {};

function scJQCalculatorAdd(iSeqRow) {
  _scCalculatorBlurOk["id_sc_field_stok_" + iSeqRow] = true;
  $("#id_sc_field_diskon_" + iSeqRow).calculator({
    onOpen: function(value, inst) {
      if (typeof _scCalculatorControl !== "undefined") {
        if (!_scCalculatorControl["id_sc_field_diskon_" + iSeqRow]) {
          _scCalculatorControl["id_sc_field_diskon_" + iSeqRow] = true;
        }
      }
      value = scJQCalculatorUnformat(value, "#id_sc_field_diskon_" + iSeqRow, '<?php echo str_replace("'", "\'", $this->field_config['diskon_']['symbol_grp']); ?>', <?php echo $this->field_config['diskon_']['symbol_fmt']; ?>, '', '');
      $(this).val(value);
    },
    onClose: function(value, inst) {
      var oldValue = $(this.val);
      if (typeof _scCalculatorControl !== "undefined") {
        if (_scCalculatorControl["id_sc_field_diskon_" + iSeqRow]) {
          _scCalculatorControl["id_sc_field_diskon_" + iSeqRow] = null;
        }
      }
      value = scJQCalculatorFormat(value, "#id_sc_field_diskon_" + iSeqRow, '<?php echo str_replace("'", "\'", $this->field_config['diskon_']['symbol_grp']); ?>', <?php echo $this->field_config['diskon_']['symbol_fmt']; ?>, '', 0, '');
      $(this).val(value);
      if (oldValue != value) {
        $(this).trigger('change');
      }
    },
    precision: 1,
    showOn: "button",
<?php
$miniCalculatorIcon = $this->jqueryIconFile('calculator');
$miniCalculatorFA   = $this->jqueryFAFile('calculator');
if ('' != $miniCalculatorIcon) {
?>
    buttonImage: "<?php echo $miniCalculatorIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalculatorFA) {
?>
    buttonText: "<?php echo $miniCalculatorFA; ?>",
<?php
}
?>
  });

} // scJQCalculatorAdd

function scJQCalculatorUnformat(fValue, sField, sThousands, sFormat, sDecimals, sMonetary) {
  fValue = scJQCalculatorCurrency(fValue, sField, sMonetary);
  if ("" != sThousands) {
    if ("." == sThousands) {
      sThousands = "\\.";
    }
    sRegEx = eval("/" + sThousands + "/g");
    fValue = fValue.replace(sRegEx, "");
  }
  if ("." != sDecimals) {
    sRegEx = eval("/" + sDecimals + "/g");
    fValue = fValue.replace(sRegEx, ".");
  }
  if ("." == fValue.substr(0, 1) || "," == fValue.substr(0, 1)) {
    fValue = "0" + fValue;
  }
  return fValue;
} // scJQCalculatorUnformat

function scJQCalculatorFormat(fValue, sField, sThousands, sFormat, sDecimals, iPrecision, sMonetary) {
  fValue = scJQCalculatorCurrency(fValue.toString(), sField, sMonetary);
  if (-1 < fValue.indexOf('.')) {
    var parts = fValue.split('.'),
        pref = parts[0],
        suf = parts[1];
  }
  else {
    var pref = fValue,
        suf = '';
  }
  if ('' != sThousands) {
    if (3 == sFormat) {
      if (4 <= pref.length) {
        pref_rest = pref.substr(0, pref.length - 3);
        pref = sThousands + pref.substr(pref.length - 3);
        while (2 < pref_rest.length) {
          pref = sThousands + pref_rest.substr(pref_rest.length - 2) + pref;
          pref_rest = pref_rest.substr(0, pref_rest.length - 2);
        }
        if ('' != pref_rest) {
          pref = pref_rest + pref;
        }
      }
    }
    else if (2 == sFormat) {
      if (4 <= pref.length) {
        pref = pref.substr(0, pref.length - 3) + sThousands + pref.substr(pref.length - 3);
      }
    }
    else {
      pref_rest = pref;
      pref = '';
      while (3 < pref_rest.length) {
        pref = sThousands + pref_rest.substr(pref_rest.length - 3) + pref;
        pref_rest = pref_rest.substr(0, pref_rest.length - 3);
      }
      if ('' != pref_rest) {
        pref = pref_rest + pref;
      }
    }
  }
  if ('' != iPrecision) {
    if (suf.length > iPrecision) {
      suf = '1' + suf.substr(0, iPrecision) + '.' + suf.substr(iPrecision);
      suf = Math.round(parseFloat(suf)).toString().substr(1);
    }
    else {
      while (suf.length < iPrecision) {
        suf += '0';
      }
    }
  }
  if ('' != sDecimals && '' != suf) {
    fValue = pref + sDecimals + suf;
  }
  else {
    fValue = pref;
  }
  if ('' != sMonetary) {
    fValue = 'left' == jqCalcMonetPos[sField] ? sMonetary + ' ' + fValue : fValue + ' ' + sMonetary;
  }
  return fValue;
} // scJQCalculatorFormat

function scJQCalculatorCurrency(fValue, sField, sMonetary) {
  if ("" != sMonetary) {
    if (sMonetary + ' ' == fValue.substr(0, sMonetary.length + 1)) {
        fValue = fValue.substr(sMonetary.length + 1);
        jqCalcMonetPos[sField] = 'left';
    }
    else if (sMonetary == fValue.substr(0, sMonetary.length)) {
        fValue = fValue.substr(sMonetary.length + 1);
        jqCalcMonetPos[sField] = 'left';
    }
    else if (' ' + sMonetary == fValue.substr(fValue.length - sMonetary.length - 1)) {
        fValue = fValue.substr(0, fValue.length - sMonetary.length - 1);
        jqCalcMonetPos[sField] = 'right';
    }
    else if (sMonetary == fValue.substr(fValue.length - sMonetary.length)) {
        fValue = fValue.substr(0, fValue.length - sMonetary.length);
        jqCalcMonetPos[sField] = 'right';
    }
  }
  if ("" == fValue) {
    fValue = "0";
  }
  return fValue;
} // scJQCalculatorCurrency

function scJQSpinAdd(iSeqRow) {
  $("#id_sc_field_jumlah_" + iSeqRow).spinner({
    max: 99999,
    min: 0,
    step: 1,
    page: 5,
    change: function(event, ui) {
      $(this).trigger("change");
    },
    stop: function(event, ui) {
      $(this).trigger("change");
    }
  });
} // scJQSpinAdd

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
  scJQCalendarAdd(iLine);
  scJQCalculatorAdd(iLine);
  scJQSpinAdd(iLine);
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_item_) { displayChange_field_item_(iLine, "on"); } }, 150);
} // scJQElementsAdd

