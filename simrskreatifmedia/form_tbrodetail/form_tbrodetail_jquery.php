
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
  scEventControl_data["idpo_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["item_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["disc_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["principal_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jmlterima_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hargaterima_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["batchno_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["expdate_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["po_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["idpo_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idpo_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["item_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["item_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["disc_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["disc_" + iSeqRow]["change"]) {
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
  if (scEventControl_data["hargaterima_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hargaterima_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["batchno_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["batchno_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["expdate_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["expdate_" + iSeqRow]["change"]) {
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

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_item_' + iSeqRow).bind('blur', function() { sc_form_tbrodetail_item__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_tbrodetail_item__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbrodetail_item__onfocus(this, iSeqRow) });
  $('#id_sc_field_principal_' + iSeqRow).bind('blur', function() { sc_form_tbrodetail_principal__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_tbrodetail_principal__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbrodetail_principal__onfocus(this, iSeqRow) });
  $('#id_sc_field_disc_' + iSeqRow).bind('blur', function() { sc_form_tbrodetail_disc__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_tbrodetail_disc__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbrodetail_disc__onfocus(this, iSeqRow) });
  $('#id_sc_field_jmlterima_' + iSeqRow).bind('blur', function() { sc_form_tbrodetail_jmlterima__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_tbrodetail_jmlterima__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbrodetail_jmlterima__onfocus(this, iSeqRow) });
  $('#id_sc_field_hargaterima_' + iSeqRow).bind('blur', function() { sc_form_tbrodetail_hargaterima__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_tbrodetail_hargaterima__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tbrodetail_hargaterima__onfocus(this, iSeqRow) });
  $('#id_sc_field_batchno_' + iSeqRow).bind('blur', function() { sc_form_tbrodetail_batchno__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_tbrodetail_batchno__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbrodetail_batchno__onfocus(this, iSeqRow) });
  $('#id_sc_field_expdate_' + iSeqRow).bind('blur', function() { sc_form_tbrodetail_expdate__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_tbrodetail_expdate__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbrodetail_expdate__onfocus(this, iSeqRow) });
  $('#id_sc_field_po_' + iSeqRow).bind('blur', function() { sc_form_tbrodetail_po__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_tbrodetail_po__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tbrodetail_po__onfocus(this, iSeqRow) });
  $('#id_sc_field_idpo_' + iSeqRow).bind('blur', function() { sc_form_tbrodetail_idpo__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_tbrodetail_idpo__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbrodetail_idpo__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbrodetail_item__onblur(oThis, iSeqRow) {
  do_ajax_form_tbrodetail_validate_item_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbrodetail_item__onchange(oThis, iSeqRow) {
  do_ajax_form_tbrodetail_event_item__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_tbrodetail_item__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbrodetail_principal__onblur(oThis, iSeqRow) {
  do_ajax_form_tbrodetail_validate_principal_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbrodetail_principal__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbrodetail_principal__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbrodetail_disc__onblur(oThis, iSeqRow) {
  do_ajax_form_tbrodetail_validate_disc_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbrodetail_disc__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbrodetail_disc__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbrodetail_jmlterima__onblur(oThis, iSeqRow) {
  do_ajax_form_tbrodetail_validate_jmlterima_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbrodetail_jmlterima__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbrodetail_jmlterima__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbrodetail_hargaterima__onblur(oThis, iSeqRow) {
  do_ajax_form_tbrodetail_validate_hargaterima_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbrodetail_hargaterima__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbrodetail_hargaterima__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbrodetail_batchno__onblur(oThis, iSeqRow) {
  do_ajax_form_tbrodetail_validate_batchno_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbrodetail_batchno__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbrodetail_batchno__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbrodetail_expdate__onblur(oThis, iSeqRow) {
  do_ajax_form_tbrodetail_validate_expdate_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbrodetail_expdate__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbrodetail_expdate__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbrodetail_po__onblur(oThis, iSeqRow) {
  do_ajax_form_tbrodetail_validate_po_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbrodetail_po__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbrodetail_po__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbrodetail_idpo__onblur(oThis, iSeqRow) {
  do_ajax_form_tbrodetail_validate_idpo_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbrodetail_idpo__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbrodetail_idpo__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("idpo_", "", status);
	displayChange_field("item_", "", status);
	displayChange_field("disc_", "", status);
	displayChange_field("principal_", "", status);
	displayChange_field("jmlterima_", "", status);
	displayChange_field("hargaterima_", "", status);
	displayChange_field("batchno_", "", status);
	displayChange_field("expdate_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_idpo_(row, status);
	displayChange_field_item_(row, status);
	displayChange_field_disc_(row, status);
	displayChange_field_principal_(row, status);
	displayChange_field_jmlterima_(row, status);
	displayChange_field_hargaterima_(row, status);
	displayChange_field_batchno_(row, status);
	displayChange_field_expdate_(row, status);
	displayChange_field_po_(row, status);
}

function displayChange_field(field, row, status) {
	if ("idpo_" == field) {
		displayChange_field_idpo_(row, status);
	}
	if ("item_" == field) {
		displayChange_field_item_(row, status);
	}
	if ("disc_" == field) {
		displayChange_field_disc_(row, status);
	}
	if ("principal_" == field) {
		displayChange_field_principal_(row, status);
	}
	if ("jmlterima_" == field) {
		displayChange_field_jmlterima_(row, status);
	}
	if ("hargaterima_" == field) {
		displayChange_field_hargaterima_(row, status);
	}
	if ("batchno_" == field) {
		displayChange_field_batchno_(row, status);
	}
	if ("expdate_" == field) {
		displayChange_field_expdate_(row, status);
	}
	if ("po_" == field) {
		displayChange_field_po_(row, status);
	}
}

function displayChange_field_idpo_(row, status) {
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

function displayChange_field_disc_(row, status) {
}

function displayChange_field_principal_(row, status) {
}

function displayChange_field_jmlterima_(row, status) {
}

function displayChange_field_hargaterima_(row, status) {
}

function displayChange_field_batchno_(row, status) {
}

function displayChange_field_expdate_(row, status) {
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
	$("#id_form_tbrodetail_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(23);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_expdate_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_expdate_" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_tbrodetail_validate_expdate_(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['expdate_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_item_) { displayChange_field_item_(iLine, "on"); } }, 150);
} // scJQElementsAdd

