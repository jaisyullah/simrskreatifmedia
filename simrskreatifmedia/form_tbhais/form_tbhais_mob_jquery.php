
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
  scEventControl_data["trancode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["custcode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["trandate" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["deku" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ett" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cvl" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ivl" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["uc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sputum" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["darah" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["urine" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["antibiotik" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["vap" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["iad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pleb" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["isk" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["trancode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["trancode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["custcode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["custcode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["trandate" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["trandate" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["deku" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["deku" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ett" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ett" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cvl" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cvl" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ivl" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ivl" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["uc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["uc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sputum" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sputum" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["darah" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["darah" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["urine" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["urine" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["antibiotik" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["antibiotik" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["vap" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["vap" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["iad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["iad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pleb" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pleb" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["isk" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["isk" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("custcode" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("deku" + iSeq == fieldName) {
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
  $('#id_sc_field_trancode' + iSeqRow).bind('blur', function() { sc_form_tbhais_trancode_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_tbhais_trancode_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbhais_trancode_onfocus(this, iSeqRow) });
  $('#id_sc_field_custcode' + iSeqRow).bind('blur', function() { sc_form_tbhais_custcode_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbhais_custcode_onfocus(this, iSeqRow) });
  $('#id_sc_field_trandate' + iSeqRow).bind('blur', function() { sc_form_tbhais_trandate_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbhais_trandate_onfocus(this, iSeqRow) });
  $('#id_sc_field_trandate_hora' + iSeqRow).bind('blur', function() { sc_form_tbhais_trandate_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_tbhais_trandate_onfocus(this, iSeqRow) });
  $('#id_sc_field_ett' + iSeqRow).bind('blur', function() { sc_form_tbhais_ett_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tbhais_ett_onfocus(this, iSeqRow) });
  $('#id_sc_field_cvl' + iSeqRow).bind('blur', function() { sc_form_tbhais_cvl_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tbhais_cvl_onfocus(this, iSeqRow) });
  $('#id_sc_field_ivl' + iSeqRow).bind('blur', function() { sc_form_tbhais_ivl_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tbhais_ivl_onfocus(this, iSeqRow) });
  $('#id_sc_field_uc' + iSeqRow).bind('blur', function() { sc_form_tbhais_uc_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_tbhais_uc_onfocus(this, iSeqRow) });
  $('#id_sc_field_vap' + iSeqRow).bind('blur', function() { sc_form_tbhais_vap_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tbhais_vap_onfocus(this, iSeqRow) });
  $('#id_sc_field_iad' + iSeqRow).bind('blur', function() { sc_form_tbhais_iad_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tbhais_iad_onfocus(this, iSeqRow) });
  $('#id_sc_field_pleb' + iSeqRow).bind('blur', function() { sc_form_tbhais_pleb_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tbhais_pleb_onfocus(this, iSeqRow) });
  $('#id_sc_field_isk' + iSeqRow).bind('blur', function() { sc_form_tbhais_isk_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tbhais_isk_onfocus(this, iSeqRow) });
  $('#id_sc_field_deku' + iSeqRow).bind('blur', function() { sc_form_tbhais_deku_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tbhais_deku_onfocus(this, iSeqRow) });
  $('#id_sc_field_sputum' + iSeqRow).bind('blur', function() { sc_form_tbhais_sputum_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbhais_sputum_onfocus(this, iSeqRow) });
  $('#id_sc_field_darah' + iSeqRow).bind('blur', function() { sc_form_tbhais_darah_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbhais_darah_onfocus(this, iSeqRow) });
  $('#id_sc_field_urine' + iSeqRow).bind('blur', function() { sc_form_tbhais_urine_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbhais_urine_onfocus(this, iSeqRow) });
  $('#id_sc_field_antibiotik' + iSeqRow).bind('blur', function() { sc_form_tbhais_antibiotik_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbhais_antibiotik_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbhais_trancode_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhais_mob_validate_trancode();
  scCssBlur(oThis);
}

function sc_form_tbhais_trancode_onchange(oThis, iSeqRow) {
  do_ajax_form_tbhais_mob_refresh_trancode();
}

function sc_form_tbhais_trancode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhais_custcode_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhais_mob_validate_custcode();
  scCssBlur(oThis);
}

function sc_form_tbhais_custcode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhais_trandate_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhais_mob_validate_trandate();
  scCssBlur(oThis);
}

function sc_form_tbhais_trandate_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhais_mob_validate_trandate();
  scCssBlur(oThis);
}

function sc_form_tbhais_trandate_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhais_trandate_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhais_ett_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhais_mob_validate_ett();
  scCssBlur(oThis);
}

function sc_form_tbhais_ett_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhais_cvl_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhais_mob_validate_cvl();
  scCssBlur(oThis);
}

function sc_form_tbhais_cvl_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhais_ivl_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhais_mob_validate_ivl();
  scCssBlur(oThis);
}

function sc_form_tbhais_ivl_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhais_uc_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhais_mob_validate_uc();
  scCssBlur(oThis);
}

function sc_form_tbhais_uc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhais_vap_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhais_mob_validate_vap();
  scCssBlur(oThis);
}

function sc_form_tbhais_vap_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhais_iad_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhais_mob_validate_iad();
  scCssBlur(oThis);
}

function sc_form_tbhais_iad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhais_pleb_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhais_mob_validate_pleb();
  scCssBlur(oThis);
}

function sc_form_tbhais_pleb_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhais_isk_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhais_mob_validate_isk();
  scCssBlur(oThis);
}

function sc_form_tbhais_isk_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhais_deku_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhais_mob_validate_deku();
  scCssBlur(oThis);
}

function sc_form_tbhais_deku_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhais_sputum_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhais_mob_validate_sputum();
  scCssBlur(oThis);
}

function sc_form_tbhais_sputum_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhais_darah_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhais_mob_validate_darah();
  scCssBlur(oThis);
}

function sc_form_tbhais_darah_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhais_urine_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhais_mob_validate_urine();
  scCssBlur(oThis);
}

function sc_form_tbhais_urine_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhais_antibiotik_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhais_mob_validate_antibiotik();
  scCssBlur(oThis);
}

function sc_form_tbhais_antibiotik_onfocus(oThis, iSeqRow) {
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
	if ("3" == block) {
		displayChange_block_3(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("trancode", "", status);
	displayChange_field("custcode", "", status);
	displayChange_field("trandate", "", status);
	displayChange_field("deku", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("ett", "", status);
	displayChange_field("cvl", "", status);
	displayChange_field("ivl", "", status);
	displayChange_field("uc", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("sputum", "", status);
	displayChange_field("darah", "", status);
	displayChange_field("urine", "", status);
	displayChange_field("antibiotik", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("vap", "", status);
	displayChange_field("iad", "", status);
	displayChange_field("pleb", "", status);
	displayChange_field("isk", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_trancode(row, status);
	displayChange_field_custcode(row, status);
	displayChange_field_trandate(row, status);
	displayChange_field_deku(row, status);
	displayChange_field_ett(row, status);
	displayChange_field_cvl(row, status);
	displayChange_field_ivl(row, status);
	displayChange_field_uc(row, status);
	displayChange_field_sputum(row, status);
	displayChange_field_darah(row, status);
	displayChange_field_urine(row, status);
	displayChange_field_antibiotik(row, status);
	displayChange_field_vap(row, status);
	displayChange_field_iad(row, status);
	displayChange_field_pleb(row, status);
	displayChange_field_isk(row, status);
}

function displayChange_field(field, row, status) {
	if ("trancode" == field) {
		displayChange_field_trancode(row, status);
	}
	if ("custcode" == field) {
		displayChange_field_custcode(row, status);
	}
	if ("trandate" == field) {
		displayChange_field_trandate(row, status);
	}
	if ("deku" == field) {
		displayChange_field_deku(row, status);
	}
	if ("ett" == field) {
		displayChange_field_ett(row, status);
	}
	if ("cvl" == field) {
		displayChange_field_cvl(row, status);
	}
	if ("ivl" == field) {
		displayChange_field_ivl(row, status);
	}
	if ("uc" == field) {
		displayChange_field_uc(row, status);
	}
	if ("sputum" == field) {
		displayChange_field_sputum(row, status);
	}
	if ("darah" == field) {
		displayChange_field_darah(row, status);
	}
	if ("urine" == field) {
		displayChange_field_urine(row, status);
	}
	if ("antibiotik" == field) {
		displayChange_field_antibiotik(row, status);
	}
	if ("vap" == field) {
		displayChange_field_vap(row, status);
	}
	if ("iad" == field) {
		displayChange_field_iad(row, status);
	}
	if ("pleb" == field) {
		displayChange_field_pleb(row, status);
	}
	if ("isk" == field) {
		displayChange_field_isk(row, status);
	}
}

function displayChange_field_trancode(row, status) {
}

function displayChange_field_custcode(row, status) {
}

function displayChange_field_trandate(row, status) {
}

function displayChange_field_deku(row, status) {
}

function displayChange_field_ett(row, status) {
}

function displayChange_field_cvl(row, status) {
}

function displayChange_field_ivl(row, status) {
}

function displayChange_field_uc(row, status) {
}

function displayChange_field_sputum(row, status) {
}

function displayChange_field_darah(row, status) {
}

function displayChange_field_urine(row, status) {
}

function displayChange_field_antibiotik(row, status) {
}

function displayChange_field_vap(row, status) {
}

function displayChange_field_iad(row, status) {
}

function displayChange_field_pleb(row, status) {
}

function displayChange_field_isk(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbhais_mob_form" + pageNo).hide();
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
      var elemName;
      if ("" != dateText) {
        elemName = $(this).attr("name");
        $("input[name=sc_clone_" + elemName + "]").hide();
        $("input[name=" + elemName + "]").show();
      }
      do_ajax_form_tbhais_mob_validate_trandate(iSeqRow);
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
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
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
