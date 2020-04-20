
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
  scEventControl_data["doccode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tindakan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tindname" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["class" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rate" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["taxedrate" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["disc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nilai" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["trandate" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["trancode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["struk" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["doccode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["doccode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tindakan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tindakan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tindname" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tindname" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["class" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["class" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rate" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rate" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["taxedrate" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["taxedrate" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["disc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["disc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nilai" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nilai" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["trandate" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["trandate" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["trancode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["trancode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["struk" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["struk" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id" + iSeqRow]["change"]) {
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
  $('#id_sc_field_id' + iSeqRow).bind('blur', function() { sc_form_tbdocinsentif_id_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_tbdocinsentif_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_doccode' + iSeqRow).bind('blur', function() { sc_form_tbdocinsentif_doccode_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbdocinsentif_doccode_onfocus(this, iSeqRow) });
  $('#id_sc_field_tindakan' + iSeqRow).bind('blur', function() { sc_form_tbdocinsentif_tindakan_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbdocinsentif_tindakan_onfocus(this, iSeqRow) });
  $('#id_sc_field_tindname' + iSeqRow).bind('blur', function() { sc_form_tbdocinsentif_tindname_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbdocinsentif_tindname_onfocus(this, iSeqRow) });
  $('#id_sc_field_class' + iSeqRow).bind('blur', function() { sc_form_tbdocinsentif_class_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbdocinsentif_class_onfocus(this, iSeqRow) });
  $('#id_sc_field_rate' + iSeqRow).bind('blur', function() { sc_form_tbdocinsentif_rate_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tbdocinsentif_rate_onfocus(this, iSeqRow) });
  $('#id_sc_field_taxedrate' + iSeqRow).bind('blur', function() { sc_form_tbdocinsentif_taxedrate_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbdocinsentif_taxedrate_onfocus(this, iSeqRow) });
  $('#id_sc_field_disc' + iSeqRow).bind('blur', function() { sc_form_tbdocinsentif_disc_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tbdocinsentif_disc_onfocus(this, iSeqRow) });
  $('#id_sc_field_nilai' + iSeqRow).bind('blur', function() { sc_form_tbdocinsentif_nilai_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbdocinsentif_nilai_onfocus(this, iSeqRow) });
  $('#id_sc_field_trandate' + iSeqRow).bind('blur', function() { sc_form_tbdocinsentif_trandate_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbdocinsentif_trandate_onfocus(this, iSeqRow) });
  $('#id_sc_field_trandate_hora' + iSeqRow).bind('blur', function() { sc_form_tbdocinsentif_trandate_hora_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_tbdocinsentif_trandate_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_trancode' + iSeqRow).bind('blur', function() { sc_form_tbdocinsentif_trancode_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbdocinsentif_trancode_onfocus(this, iSeqRow) });
  $('#id_sc_field_struk' + iSeqRow).bind('blur', function() { sc_form_tbdocinsentif_struk_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbdocinsentif_struk_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbdocinsentif_id_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdocinsentif_validate_id();
  scCssBlur(oThis);
}

function sc_form_tbdocinsentif_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdocinsentif_doccode_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdocinsentif_validate_doccode();
  scCssBlur(oThis);
}

function sc_form_tbdocinsentif_doccode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdocinsentif_tindakan_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdocinsentif_validate_tindakan();
  scCssBlur(oThis);
}

function sc_form_tbdocinsentif_tindakan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdocinsentif_tindname_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdocinsentif_validate_tindname();
  scCssBlur(oThis);
}

function sc_form_tbdocinsentif_tindname_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdocinsentif_class_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdocinsentif_validate_class();
  scCssBlur(oThis);
}

function sc_form_tbdocinsentif_class_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdocinsentif_rate_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdocinsentif_validate_rate();
  scCssBlur(oThis);
}

function sc_form_tbdocinsentif_rate_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdocinsentif_taxedrate_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdocinsentif_validate_taxedrate();
  scCssBlur(oThis);
}

function sc_form_tbdocinsentif_taxedrate_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdocinsentif_disc_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdocinsentif_validate_disc();
  scCssBlur(oThis);
}

function sc_form_tbdocinsentif_disc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdocinsentif_nilai_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdocinsentif_validate_nilai();
  scCssBlur(oThis);
}

function sc_form_tbdocinsentif_nilai_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdocinsentif_trandate_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdocinsentif_validate_trandate();
  scCssBlur(oThis);
}

function sc_form_tbdocinsentif_trandate_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdocinsentif_validate_trandate();
  scCssBlur(oThis);
}

function sc_form_tbdocinsentif_trandate_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdocinsentif_trandate_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdocinsentif_trancode_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdocinsentif_validate_trancode();
  scCssBlur(oThis);
}

function sc_form_tbdocinsentif_trancode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbdocinsentif_struk_onblur(oThis, iSeqRow) {
  do_ajax_form_tbdocinsentif_validate_struk();
  scCssBlur(oThis);
}

function sc_form_tbdocinsentif_struk_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("doccode", "", status);
	displayChange_field("tindakan", "", status);
	displayChange_field("tindname", "", status);
	displayChange_field("class", "", status);
	displayChange_field("rate", "", status);
	displayChange_field("taxedrate", "", status);
	displayChange_field("disc", "", status);
	displayChange_field("nilai", "", status);
	displayChange_field("trandate", "", status);
	displayChange_field("trancode", "", status);
	displayChange_field("struk", "", status);
	displayChange_field("id", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_doccode(row, status);
	displayChange_field_tindakan(row, status);
	displayChange_field_tindname(row, status);
	displayChange_field_class(row, status);
	displayChange_field_rate(row, status);
	displayChange_field_taxedrate(row, status);
	displayChange_field_disc(row, status);
	displayChange_field_nilai(row, status);
	displayChange_field_trandate(row, status);
	displayChange_field_trancode(row, status);
	displayChange_field_struk(row, status);
	displayChange_field_id(row, status);
}

function displayChange_field(field, row, status) {
	if ("doccode" == field) {
		displayChange_field_doccode(row, status);
	}
	if ("tindakan" == field) {
		displayChange_field_tindakan(row, status);
	}
	if ("tindname" == field) {
		displayChange_field_tindname(row, status);
	}
	if ("class" == field) {
		displayChange_field_class(row, status);
	}
	if ("rate" == field) {
		displayChange_field_rate(row, status);
	}
	if ("taxedrate" == field) {
		displayChange_field_taxedrate(row, status);
	}
	if ("disc" == field) {
		displayChange_field_disc(row, status);
	}
	if ("nilai" == field) {
		displayChange_field_nilai(row, status);
	}
	if ("trandate" == field) {
		displayChange_field_trandate(row, status);
	}
	if ("trancode" == field) {
		displayChange_field_trancode(row, status);
	}
	if ("struk" == field) {
		displayChange_field_struk(row, status);
	}
	if ("id" == field) {
		displayChange_field_id(row, status);
	}
}

function displayChange_field_doccode(row, status) {
}

function displayChange_field_tindakan(row, status) {
}

function displayChange_field_tindname(row, status) {
}

function displayChange_field_class(row, status) {
}

function displayChange_field_rate(row, status) {
}

function displayChange_field_taxedrate(row, status) {
}

function displayChange_field_disc(row, status) {
}

function displayChange_field_nilai(row, status) {
}

function displayChange_field_trandate(row, status) {
}

function displayChange_field_trancode(row, status) {
}

function displayChange_field_struk(row, status) {
}

function displayChange_field_id(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbdocinsentif_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(26);
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
      do_ajax_form_tbdocinsentif_validate_trandate(iSeqRow);
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


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

