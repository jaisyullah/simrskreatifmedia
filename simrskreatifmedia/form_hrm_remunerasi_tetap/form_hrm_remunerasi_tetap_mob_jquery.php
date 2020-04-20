
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
  scEventControl_data["id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_karyawan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["gaji_pokok" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tunj_struktural" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tunj_fungsional" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tunj_keluarga" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tunj_transport_makan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tunj_bpjs_kesehatan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["no_dok_penetapan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tanggal_penetapan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["status" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["keterangan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_karyawan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_karyawan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["gaji_pokok" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["gaji_pokok" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tunj_struktural" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tunj_struktural" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tunj_fungsional" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tunj_fungsional" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tunj_keluarga" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tunj_keluarga" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tunj_transport_makan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tunj_transport_makan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tunj_bpjs_kesehatan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tunj_bpjs_kesehatan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["no_dok_penetapan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["no_dok_penetapan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tanggal_penetapan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tanggal_penetapan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["status" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["status" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["keterangan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["keterangan" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("id_karyawan" + iSeq == fieldName) {
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
  $('#id_sc_field_id' + iSeqRow).bind('blur', function() { sc_form_hrm_remunerasi_tetap_id_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_hrm_remunerasi_tetap_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_gaji_pokok' + iSeqRow).bind('blur', function() { sc_form_hrm_remunerasi_tetap_gaji_pokok_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_hrm_remunerasi_tetap_gaji_pokok_onfocus(this, iSeqRow) });
  $('#id_sc_field_tunj_struktural' + iSeqRow).bind('blur', function() { sc_form_hrm_remunerasi_tetap_tunj_struktural_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_hrm_remunerasi_tetap_tunj_struktural_onfocus(this, iSeqRow) });
  $('#id_sc_field_tunj_fungsional' + iSeqRow).bind('blur', function() { sc_form_hrm_remunerasi_tetap_tunj_fungsional_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_hrm_remunerasi_tetap_tunj_fungsional_onfocus(this, iSeqRow) });
  $('#id_sc_field_tunj_keluarga' + iSeqRow).bind('blur', function() { sc_form_hrm_remunerasi_tetap_tunj_keluarga_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_hrm_remunerasi_tetap_tunj_keluarga_onfocus(this, iSeqRow) });
  $('#id_sc_field_tunj_transport_makan' + iSeqRow).bind('blur', function() { sc_form_hrm_remunerasi_tetap_tunj_transport_makan_onblur(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_hrm_remunerasi_tetap_tunj_transport_makan_onfocus(this, iSeqRow) });
  $('#id_sc_field_tunj_bpjs_kesehatan' + iSeqRow).bind('blur', function() { sc_form_hrm_remunerasi_tetap_tunj_bpjs_kesehatan_onblur(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_hrm_remunerasi_tetap_tunj_bpjs_kesehatan_onfocus(this, iSeqRow) });
  $('#id_sc_field_no_dok_penetapan' + iSeqRow).bind('blur', function() { sc_form_hrm_remunerasi_tetap_no_dok_penetapan_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_hrm_remunerasi_tetap_no_dok_penetapan_onfocus(this, iSeqRow) });
  $('#id_sc_field_tanggal_penetapan' + iSeqRow).bind('blur', function() { sc_form_hrm_remunerasi_tetap_tanggal_penetapan_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_hrm_remunerasi_tetap_tanggal_penetapan_onfocus(this, iSeqRow) });
  $('#id_sc_field_status' + iSeqRow).bind('blur', function() { sc_form_hrm_remunerasi_tetap_status_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_hrm_remunerasi_tetap_status_onfocus(this, iSeqRow) });
  $('#id_sc_field_keterangan' + iSeqRow).bind('blur', function() { sc_form_hrm_remunerasi_tetap_keterangan_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_hrm_remunerasi_tetap_keterangan_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_karyawan' + iSeqRow).bind('blur', function() { sc_form_hrm_remunerasi_tetap_id_karyawan_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_hrm_remunerasi_tetap_id_karyawan_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_hrm_remunerasi_tetap_id_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_remunerasi_tetap_mob_validate_id();
  scCssBlur(oThis);
}

function sc_form_hrm_remunerasi_tetap_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_remunerasi_tetap_gaji_pokok_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_remunerasi_tetap_mob_validate_gaji_pokok();
  scCssBlur(oThis);
}

function sc_form_hrm_remunerasi_tetap_gaji_pokok_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_remunerasi_tetap_tunj_struktural_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_remunerasi_tetap_mob_validate_tunj_struktural();
  scCssBlur(oThis);
}

function sc_form_hrm_remunerasi_tetap_tunj_struktural_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_remunerasi_tetap_tunj_fungsional_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_remunerasi_tetap_mob_validate_tunj_fungsional();
  scCssBlur(oThis);
}

function sc_form_hrm_remunerasi_tetap_tunj_fungsional_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_remunerasi_tetap_tunj_keluarga_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_remunerasi_tetap_mob_validate_tunj_keluarga();
  scCssBlur(oThis);
}

function sc_form_hrm_remunerasi_tetap_tunj_keluarga_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_remunerasi_tetap_tunj_transport_makan_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_remunerasi_tetap_mob_validate_tunj_transport_makan();
  scCssBlur(oThis);
}

function sc_form_hrm_remunerasi_tetap_tunj_transport_makan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_remunerasi_tetap_tunj_bpjs_kesehatan_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_remunerasi_tetap_mob_validate_tunj_bpjs_kesehatan();
  scCssBlur(oThis);
}

function sc_form_hrm_remunerasi_tetap_tunj_bpjs_kesehatan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_remunerasi_tetap_no_dok_penetapan_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_remunerasi_tetap_mob_validate_no_dok_penetapan();
  scCssBlur(oThis);
}

function sc_form_hrm_remunerasi_tetap_no_dok_penetapan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_remunerasi_tetap_tanggal_penetapan_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_remunerasi_tetap_mob_validate_tanggal_penetapan();
  scCssBlur(oThis);
}

function sc_form_hrm_remunerasi_tetap_tanggal_penetapan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_remunerasi_tetap_status_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_remunerasi_tetap_mob_validate_status();
  scCssBlur(oThis);
}

function sc_form_hrm_remunerasi_tetap_status_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_remunerasi_tetap_keterangan_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_remunerasi_tetap_mob_validate_keterangan();
  scCssBlur(oThis);
}

function sc_form_hrm_remunerasi_tetap_keterangan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_hrm_remunerasi_tetap_id_karyawan_onblur(oThis, iSeqRow) {
  do_ajax_form_hrm_remunerasi_tetap_mob_validate_id_karyawan();
  scCssBlur(oThis);
}

function sc_form_hrm_remunerasi_tetap_id_karyawan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("id", "", status);
	displayChange_field("id_karyawan", "", status);
	displayChange_field("gaji_pokok", "", status);
	displayChange_field("tunj_struktural", "", status);
	displayChange_field("tunj_fungsional", "", status);
	displayChange_field("tunj_keluarga", "", status);
	displayChange_field("tunj_transport_makan", "", status);
	displayChange_field("tunj_bpjs_kesehatan", "", status);
	displayChange_field("no_dok_penetapan", "", status);
	displayChange_field("tanggal_penetapan", "", status);
	displayChange_field("status", "", status);
	displayChange_field("keterangan", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_id(row, status);
	displayChange_field_id_karyawan(row, status);
	displayChange_field_gaji_pokok(row, status);
	displayChange_field_tunj_struktural(row, status);
	displayChange_field_tunj_fungsional(row, status);
	displayChange_field_tunj_keluarga(row, status);
	displayChange_field_tunj_transport_makan(row, status);
	displayChange_field_tunj_bpjs_kesehatan(row, status);
	displayChange_field_no_dok_penetapan(row, status);
	displayChange_field_tanggal_penetapan(row, status);
	displayChange_field_status(row, status);
	displayChange_field_keterangan(row, status);
}

function displayChange_field(field, row, status) {
	if ("id" == field) {
		displayChange_field_id(row, status);
	}
	if ("id_karyawan" == field) {
		displayChange_field_id_karyawan(row, status);
	}
	if ("gaji_pokok" == field) {
		displayChange_field_gaji_pokok(row, status);
	}
	if ("tunj_struktural" == field) {
		displayChange_field_tunj_struktural(row, status);
	}
	if ("tunj_fungsional" == field) {
		displayChange_field_tunj_fungsional(row, status);
	}
	if ("tunj_keluarga" == field) {
		displayChange_field_tunj_keluarga(row, status);
	}
	if ("tunj_transport_makan" == field) {
		displayChange_field_tunj_transport_makan(row, status);
	}
	if ("tunj_bpjs_kesehatan" == field) {
		displayChange_field_tunj_bpjs_kesehatan(row, status);
	}
	if ("no_dok_penetapan" == field) {
		displayChange_field_no_dok_penetapan(row, status);
	}
	if ("tanggal_penetapan" == field) {
		displayChange_field_tanggal_penetapan(row, status);
	}
	if ("status" == field) {
		displayChange_field_status(row, status);
	}
	if ("keterangan" == field) {
		displayChange_field_keterangan(row, status);
	}
}

function displayChange_field_id(row, status) {
}

function displayChange_field_id_karyawan(row, status) {
}

function displayChange_field_gaji_pokok(row, status) {
}

function displayChange_field_tunj_struktural(row, status) {
}

function displayChange_field_tunj_fungsional(row, status) {
}

function displayChange_field_tunj_keluarga(row, status) {
}

function displayChange_field_tunj_transport_makan(row, status) {
}

function displayChange_field_tunj_bpjs_kesehatan(row, status) {
}

function displayChange_field_no_dok_penetapan(row, status) {
}

function displayChange_field_tanggal_penetapan(row, status) {
}

function displayChange_field_status(row, status) {
}

function displayChange_field_keterangan(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_hrm_remunerasi_tetap_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(37);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_tanggal_penetapan" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_tanggal_penetapan" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_hrm_remunerasi_tetap_mob_validate_tanggal_penetapan(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['tanggal_penetapan']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
