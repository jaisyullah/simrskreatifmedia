
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
  scEventControl_data["tinggi" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["berat" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detakjantung" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tekanandarah" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["suhu" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nafas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["keluhan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pemeriksa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tglperiksa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["tinggi" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tinggi" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["berat" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["berat" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detakjantung" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detakjantung" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tekanandarah" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tekanandarah" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["suhu" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["suhu" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nafas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nafas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["keluhan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["keluhan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pemeriksa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pemeriksa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tglperiksa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tglperiksa" + iSeqRow]["change"]) {
    return true;
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
  $('#id_sc_field_tinggi' + iSeqRow).bind('blur', function() { sc_form_tbfisikrawatjalan_tinggi_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbfisikrawatjalan_tinggi_onfocus(this, iSeqRow) });
  $('#id_sc_field_berat' + iSeqRow).bind('blur', function() { sc_form_tbfisikrawatjalan_berat_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbfisikrawatjalan_berat_onfocus(this, iSeqRow) });
  $('#id_sc_field_detakjantung' + iSeqRow).bind('blur', function() { sc_form_tbfisikrawatjalan_detakjantung_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tbfisikrawatjalan_detakjantung_onfocus(this, iSeqRow) });
  $('#id_sc_field_tekanandarah' + iSeqRow).bind('blur', function() { sc_form_tbfisikrawatjalan_tekanandarah_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tbfisikrawatjalan_tekanandarah_onfocus(this, iSeqRow) });
  $('#id_sc_field_suhu' + iSeqRow).bind('blur', function() { sc_form_tbfisikrawatjalan_suhu_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tbfisikrawatjalan_suhu_onfocus(this, iSeqRow) });
  $('#id_sc_field_nafas' + iSeqRow).bind('blur', function() { sc_form_tbfisikrawatjalan_nafas_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbfisikrawatjalan_nafas_onfocus(this, iSeqRow) });
  $('#id_sc_field_keluhan' + iSeqRow).bind('blur', function() { sc_form_tbfisikrawatjalan_keluhan_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbfisikrawatjalan_keluhan_onfocus(this, iSeqRow) });
  $('#id_sc_field_pemeriksa' + iSeqRow).bind('blur', function() { sc_form_tbfisikrawatjalan_pemeriksa_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbfisikrawatjalan_pemeriksa_onfocus(this, iSeqRow) });
  $('#id_sc_field_tglperiksa' + iSeqRow).bind('blur', function() { sc_form_tbfisikrawatjalan_tglperiksa_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbfisikrawatjalan_tglperiksa_onfocus(this, iSeqRow) });
  $('#id_sc_field_tglperiksa_hora' + iSeqRow).bind('blur', function() { sc_form_tbfisikrawatjalan_tglperiksa_hora_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_tbfisikrawatjalan_tglperiksa_hora_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbfisikrawatjalan_tinggi_onblur(oThis, iSeqRow) {
  do_ajax_form_tbfisikrawatjalan_validate_tinggi();
  scCssBlur(oThis);
}

function sc_form_tbfisikrawatjalan_tinggi_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbfisikrawatjalan_berat_onblur(oThis, iSeqRow) {
  do_ajax_form_tbfisikrawatjalan_validate_berat();
  scCssBlur(oThis);
}

function sc_form_tbfisikrawatjalan_berat_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbfisikrawatjalan_detakjantung_onblur(oThis, iSeqRow) {
  do_ajax_form_tbfisikrawatjalan_validate_detakjantung();
  scCssBlur(oThis);
}

function sc_form_tbfisikrawatjalan_detakjantung_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbfisikrawatjalan_tekanandarah_onblur(oThis, iSeqRow) {
  do_ajax_form_tbfisikrawatjalan_validate_tekanandarah();
  scCssBlur(oThis);
}

function sc_form_tbfisikrawatjalan_tekanandarah_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbfisikrawatjalan_suhu_onblur(oThis, iSeqRow) {
  do_ajax_form_tbfisikrawatjalan_validate_suhu();
  scCssBlur(oThis);
}

function sc_form_tbfisikrawatjalan_suhu_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbfisikrawatjalan_nafas_onblur(oThis, iSeqRow) {
  do_ajax_form_tbfisikrawatjalan_validate_nafas();
  scCssBlur(oThis);
}

function sc_form_tbfisikrawatjalan_nafas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbfisikrawatjalan_keluhan_onblur(oThis, iSeqRow) {
  do_ajax_form_tbfisikrawatjalan_validate_keluhan();
  scCssBlur(oThis);
}

function sc_form_tbfisikrawatjalan_keluhan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbfisikrawatjalan_pemeriksa_onblur(oThis, iSeqRow) {
  do_ajax_form_tbfisikrawatjalan_validate_pemeriksa();
  scCssBlur(oThis);
}

function sc_form_tbfisikrawatjalan_pemeriksa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbfisikrawatjalan_tglperiksa_onblur(oThis, iSeqRow) {
  do_ajax_form_tbfisikrawatjalan_validate_tglperiksa();
  scCssBlur(oThis);
}

function sc_form_tbfisikrawatjalan_tglperiksa_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_tbfisikrawatjalan_validate_tglperiksa();
  scCssBlur(oThis);
}

function sc_form_tbfisikrawatjalan_tglperiksa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbfisikrawatjalan_tglperiksa_hora_onfocus(oThis, iSeqRow) {
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
	if ("2" == block) {
		displayChange_block_2(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("tinggi", "", status);
	displayChange_field("berat", "", status);
	displayChange_field("detakjantung", "", status);
	displayChange_field("tekanandarah", "", status);
	displayChange_field("suhu", "", status);
	displayChange_field("nafas", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("keluhan", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("pemeriksa", "", status);
	displayChange_field("tglperiksa", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_tinggi(row, status);
	displayChange_field_berat(row, status);
	displayChange_field_detakjantung(row, status);
	displayChange_field_tekanandarah(row, status);
	displayChange_field_suhu(row, status);
	displayChange_field_nafas(row, status);
	displayChange_field_keluhan(row, status);
	displayChange_field_pemeriksa(row, status);
	displayChange_field_tglperiksa(row, status);
}

function displayChange_field(field, row, status) {
	if ("tinggi" == field) {
		displayChange_field_tinggi(row, status);
	}
	if ("berat" == field) {
		displayChange_field_berat(row, status);
	}
	if ("detakjantung" == field) {
		displayChange_field_detakjantung(row, status);
	}
	if ("tekanandarah" == field) {
		displayChange_field_tekanandarah(row, status);
	}
	if ("suhu" == field) {
		displayChange_field_suhu(row, status);
	}
	if ("nafas" == field) {
		displayChange_field_nafas(row, status);
	}
	if ("keluhan" == field) {
		displayChange_field_keluhan(row, status);
	}
	if ("pemeriksa" == field) {
		displayChange_field_pemeriksa(row, status);
	}
	if ("tglperiksa" == field) {
		displayChange_field_tglperiksa(row, status);
	}
}

function displayChange_field_tinggi(row, status) {
}

function displayChange_field_berat(row, status) {
}

function displayChange_field_detakjantung(row, status) {
}

function displayChange_field_tekanandarah(row, status) {
}

function displayChange_field_suhu(row, status) {
}

function displayChange_field_nafas(row, status) {
}

function displayChange_field_keluhan(row, status) {
}

function displayChange_field_pemeriksa(row, status) {
}

function displayChange_field_tglperiksa(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbfisikrawatjalan_form" + pageNo).hide();
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
  $("#id_sc_field_tglperiksa" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_tglperiksa" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['tglperiksa']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("ddmmyyyy", "/"); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_tbfisikrawatjalan_validate_tglperiksa(iSeqRow);
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
    firstDay: <?php echo $this->jqueryCalendarWeekInit("SU"); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("ddmmyyyy", "/"); ?>",
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

