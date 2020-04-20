
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
  scEventControl_data["adjcode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["depo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["trandate" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["adjby" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jenisadj" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["note" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["status" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detail" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["adjcode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["adjcode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["depo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["depo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["trandate" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["trandate" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["adjby" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["adjby" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jenisadj" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jenisadj" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["note" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["note" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["status" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["status" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detail" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detail" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("depo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("jenisadj" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("status" + iSeq == fieldName) {
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
  $('#id_sc_field_adjcode' + iSeqRow).bind('blur', function() { sc_form_tbadjustment_adjcode_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbadjustment_adjcode_onfocus(this, iSeqRow) });
  $('#id_sc_field_depo' + iSeqRow).bind('blur', function() { sc_form_tbadjustment_depo_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tbadjustment_depo_onfocus(this, iSeqRow) });
  $('#id_sc_field_trandate' + iSeqRow).bind('blur', function() { sc_form_tbadjustment_trandate_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbadjustment_trandate_onfocus(this, iSeqRow) });
  $('#id_sc_field_trandate_hora' + iSeqRow).bind('blur', function() { sc_form_tbadjustment_trandate_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_tbadjustment_trandate_onfocus(this, iSeqRow) });
  $('#id_sc_field_adjby' + iSeqRow).bind('blur', function() { sc_form_tbadjustment_adjby_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbadjustment_adjby_onfocus(this, iSeqRow) });
  $('#id_sc_field_jenisadj' + iSeqRow).bind('blur', function() { sc_form_tbadjustment_jenisadj_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbadjustment_jenisadj_onfocus(this, iSeqRow) });
  $('#id_sc_field_note' + iSeqRow).bind('blur', function() { sc_form_tbadjustment_note_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tbadjustment_note_onfocus(this, iSeqRow) });
  $('#id_sc_field_status' + iSeqRow).bind('blur', function() { sc_form_tbadjustment_status_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbadjustment_status_onfocus(this, iSeqRow) });
  $('#id_sc_field_detail' + iSeqRow).bind('blur', function() { sc_form_tbadjustment_detail_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbadjustment_detail_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbadjustment_adjcode_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadjustment_mob_validate_adjcode();
  scCssBlur(oThis);
}

function sc_form_tbadjustment_adjcode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbadjustment_depo_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadjustment_mob_validate_depo();
  scCssBlur(oThis);
}

function sc_form_tbadjustment_depo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbadjustment_trandate_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadjustment_mob_validate_trandate();
  scCssBlur(oThis);
}

function sc_form_tbadjustment_trandate_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadjustment_mob_validate_trandate();
  scCssBlur(oThis);
}

function sc_form_tbadjustment_trandate_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbadjustment_trandate_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbadjustment_adjby_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadjustment_mob_validate_adjby();
  scCssBlur(oThis);
}

function sc_form_tbadjustment_adjby_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbadjustment_jenisadj_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadjustment_mob_validate_jenisadj();
  scCssBlur(oThis);
}

function sc_form_tbadjustment_jenisadj_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbadjustment_note_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadjustment_mob_validate_note();
  scCssBlur(oThis);
}

function sc_form_tbadjustment_note_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbadjustment_status_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadjustment_mob_validate_status();
  scCssBlur(oThis);
}

function sc_form_tbadjustment_status_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbadjustment_detail_onblur(oThis, iSeqRow) {
  do_ajax_form_tbadjustment_mob_validate_detail();
  scCssBlur(oThis);
}

function sc_form_tbadjustment_detail_onfocus(oThis, iSeqRow) {
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
	displayChange_field("adjcode", "", status);
	displayChange_field("depo", "", status);
	displayChange_field("trandate", "", status);
	displayChange_field("adjby", "", status);
	displayChange_field("jenisadj", "", status);
	displayChange_field("note", "", status);
	displayChange_field("status", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("detail", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_adjcode(row, status);
	displayChange_field_depo(row, status);
	displayChange_field_trandate(row, status);
	displayChange_field_adjby(row, status);
	displayChange_field_jenisadj(row, status);
	displayChange_field_note(row, status);
	displayChange_field_status(row, status);
	displayChange_field_detail(row, status);
}

function displayChange_field(field, row, status) {
	if ("adjcode" == field) {
		displayChange_field_adjcode(row, status);
	}
	if ("depo" == field) {
		displayChange_field_depo(row, status);
	}
	if ("trandate" == field) {
		displayChange_field_trandate(row, status);
	}
	if ("adjby" == field) {
		displayChange_field_adjby(row, status);
	}
	if ("jenisadj" == field) {
		displayChange_field_jenisadj(row, status);
	}
	if ("note" == field) {
		displayChange_field_note(row, status);
	}
	if ("status" == field) {
		displayChange_field_status(row, status);
	}
	if ("detail" == field) {
		displayChange_field_detail(row, status);
	}
}

function displayChange_field_adjcode(row, status) {
}

function displayChange_field_depo(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_depo__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_depo" + row).select2("destroy");
		}
		scJQSelect2Add(row, "depo");
	}
}

function displayChange_field_trandate(row, status) {
}

function displayChange_field_adjby(row, status) {
}

function displayChange_field_jenisadj(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_jenisadj__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_jenisadj" + row).select2("destroy");
		}
		scJQSelect2Add(row, "jenisadj");
	}
}

function displayChange_field_note(row, status) {
}

function displayChange_field_status(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_status__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_status" + row).select2("destroy");
		}
		scJQSelect2Add(row, "status");
	}
}

function displayChange_field_detail(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbdetailadjustment_mob")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbdetailadjustment_mob")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
	displayChange_field_depo("all", "on");
	displayChange_field_jenisadj("all", "on");
	displayChange_field_status("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbadjustment_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(29);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_trandate" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_trandate" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['trandate']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['trandate']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_tbadjustment_mob_validate_trandate(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['trandate']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  if (null == specificField || "depo" == specificField) {
    scJQSelect2Add_depo(seqRow);
  }
  if (null == specificField || "jenisadj" == specificField) {
    scJQSelect2Add_jenisadj(seqRow);
  }
  if (null == specificField || "status" == specificField) {
    scJQSelect2Add_status(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_depo(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_depo_obj" : "#id_sc_field_depo" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_depo_obj',
      dropdownCssClass: 'css_depo_obj',
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

function scJQSelect2Add_jenisadj(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_jenisadj_obj" : "#id_sc_field_jenisadj" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_jenisadj_obj',
      dropdownCssClass: 'css_jenisadj_obj',
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

function scJQSelect2Add_status(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_status_obj" : "#id_sc_field_status" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_status_obj',
      dropdownCssClass: 'css_status_obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_depo) { displayChange_field_depo(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_jenisadj) { displayChange_field_jenisadj(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_status) { displayChange_field_status(iLine, "on"); } }, 150);
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
