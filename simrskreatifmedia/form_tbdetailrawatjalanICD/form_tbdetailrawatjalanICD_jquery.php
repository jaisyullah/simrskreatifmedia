
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
  scEventControl_data["trancode_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["custcode_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["diagnosa1_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["icd1_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["diagnosa2_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["icd2_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["trancode_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["trancode_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["custcode_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["custcode_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["diagnosa1_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["diagnosa1_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["icd1_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["icd1_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["diagnosa2_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["diagnosa2_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["icd2_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["icd2_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["icd1_" + iSeqRow]["autocomp"]) {
    return true;
  }
  if (scEventControl_data["icd2_" + iSeqRow]["autocomp"]) {
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
  $('#id_sc_field_trancode_' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatjalanICD_trancode__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_tbdetailrawatjalanICD_trancode__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbdetailrawatjalanICD_trancode__onfocus(this, iSeqRow) });
  $('#id_sc_field_custcode_' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatjalanICD_custcode__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_tbdetailrawatjalanICD_custcode__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbdetailrawatjalanICD_custcode__onfocus(this, iSeqRow) });
  $('#id_sc_field_diagnosa1_' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatjalanICD_diagnosa1__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_tbdetailrawatjalanICD_diagnosa1__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbdetailrawatjalanICD_diagnosa1__onfocus(this, iSeqRow) });
  $('#id_sc_field_diagnosa2_' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatjalanICD_diagnosa2__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_tbdetailrawatjalanICD_diagnosa2__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbdetailrawatjalanICD_diagnosa2__onfocus(this, iSeqRow) });
  $('#id_sc_field_icd1_' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatjalanICD_icd1__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_tbdetailrawatjalanICD_icd1__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbdetailrawatjalanICD_icd1__onfocus(this, iSeqRow) });
  $('#id_sc_field_icd2_' + iSeqRow).bind('blur', function() { sc_form_tbdetailrawatjalanICD_icd2__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_tbdetailrawatjalanICD_icd2__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbdetailrawatjalanICD_icd2__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbdetailrawatjalanICD_trancode__onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatjalanICD_validate_trancode_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbdetailrawatjalanICD_trancode__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbdetailrawatjalanICD_trancode__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbdetailrawatjalanICD_custcode__onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatjalanICD_validate_custcode_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbdetailrawatjalanICD_custcode__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbdetailrawatjalanICD_custcode__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbdetailrawatjalanICD_diagnosa1__onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatjalanICD_validate_diagnosa1_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbdetailrawatjalanICD_diagnosa1__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbdetailrawatjalanICD_diagnosa1__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbdetailrawatjalanICD_diagnosa2__onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatjalanICD_validate_diagnosa2_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbdetailrawatjalanICD_diagnosa2__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbdetailrawatjalanICD_diagnosa2__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbdetailrawatjalanICD_icd1__onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatjalanICD_validate_icd1_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbdetailrawatjalanICD_icd1__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbdetailrawatjalanICD_icd1__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_tbdetailrawatjalanICD_icd2__onblur(oThis, iSeqRow) {
  do_ajax_form_tbdetailrawatjalanICD_validate_icd2_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_tbdetailrawatjalanICD_icd2__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_tbdetailrawatjalanICD_icd2__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
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
	displayChange_field("trancode_", "", status);
	displayChange_field("custcode_", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("diagnosa1_", "", status);
	displayChange_field("icd1_", "", status);
	displayChange_field("diagnosa2_", "", status);
	displayChange_field("icd2_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_trancode_(row, status);
	displayChange_field_custcode_(row, status);
	displayChange_field_diagnosa1_(row, status);
	displayChange_field_icd1_(row, status);
	displayChange_field_diagnosa2_(row, status);
	displayChange_field_icd2_(row, status);
}

function displayChange_field(field, row, status) {
	if ("trancode_" == field) {
		displayChange_field_trancode_(row, status);
	}
	if ("custcode_" == field) {
		displayChange_field_custcode_(row, status);
	}
	if ("diagnosa1_" == field) {
		displayChange_field_diagnosa1_(row, status);
	}
	if ("icd1_" == field) {
		displayChange_field_icd1_(row, status);
	}
	if ("diagnosa2_" == field) {
		displayChange_field_diagnosa2_(row, status);
	}
	if ("icd2_" == field) {
		displayChange_field_icd2_(row, status);
	}
}

function displayChange_field_trancode_(row, status) {
}

function displayChange_field_custcode_(row, status) {
}

function displayChange_field_diagnosa1_(row, status) {
}

function displayChange_field_icd1_(row, status) {
}

function displayChange_field_diagnosa2_(row, status) {
}

function displayChange_field_icd2_(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbdetailrawatjalanICD_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(34);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_tglkeluar_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_tglkeluar_" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['tglkeluar_']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['tglkeluar_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_tbdetailrawatjalanICD_validate_tglkeluar_(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['tglkeluar_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
} // scJQElementsAdd

