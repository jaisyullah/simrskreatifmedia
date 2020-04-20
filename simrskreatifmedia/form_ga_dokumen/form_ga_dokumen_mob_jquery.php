
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
  scEventControl_data["nama_dok" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jenis" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sifat" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["unit" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["karyawan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["masa_berlaku" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["lampiran" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["keterangan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["nama_dok" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nama_dok" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jenis" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jenis" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sifat" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sifat" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["unit" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["unit" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["karyawan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["karyawan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["masa_berlaku" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["masa_berlaku" + iSeqRow]["change"]) {
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
  if ("jenis" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("sifat" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("unit" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("karyawan" + iSeq == fieldName) {
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
  $('#id_sc_field_nama_dok' + iSeqRow).bind('blur', function() { sc_form_ga_dokumen_nama_dok_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_ga_dokumen_nama_dok_onfocus(this, iSeqRow) });
  $('#id_sc_field_jenis' + iSeqRow).bind('blur', function() { sc_form_ga_dokumen_jenis_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_ga_dokumen_jenis_onfocus(this, iSeqRow) });
  $('#id_sc_field_sifat' + iSeqRow).bind('blur', function() { sc_form_ga_dokumen_sifat_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_ga_dokumen_sifat_onfocus(this, iSeqRow) });
  $('#id_sc_field_unit' + iSeqRow).bind('blur', function() { sc_form_ga_dokumen_unit_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_ga_dokumen_unit_onfocus(this, iSeqRow) });
  $('#id_sc_field_karyawan' + iSeqRow).bind('blur', function() { sc_form_ga_dokumen_karyawan_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_ga_dokumen_karyawan_onfocus(this, iSeqRow) });
  $('#id_sc_field_masa_berlaku_dia' + iSeqRow).bind('blur', function() { sc_form_ga_dokumen_masa_berlaku_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_ga_dokumen_masa_berlaku_onfocus(this, iSeqRow) });
  $('#id_sc_field_masa_berlaku_mes' + iSeqRow).bind('blur', function() { sc_form_ga_dokumen_masa_berlaku_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_ga_dokumen_masa_berlaku_onfocus(this, iSeqRow) });
  $('#id_sc_field_masa_berlaku_ano' + iSeqRow).bind('blur', function() { sc_form_ga_dokumen_masa_berlaku_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_ga_dokumen_masa_berlaku_onfocus(this, iSeqRow) });
  $('#id_sc_field_lampiran' + iSeqRow).bind('blur', function() { sc_form_ga_dokumen_lampiran_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_ga_dokumen_lampiran_onfocus(this, iSeqRow) });
  $('#id_sc_field_keterangan' + iSeqRow).bind('blur', function() { sc_form_ga_dokumen_keterangan_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_ga_dokumen_keterangan_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_ga_dokumen_nama_dok_onblur(oThis, iSeqRow) {
  do_ajax_form_ga_dokumen_mob_validate_nama_dok();
  scCssBlur(oThis);
}

function sc_form_ga_dokumen_nama_dok_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ga_dokumen_jenis_onblur(oThis, iSeqRow) {
  do_ajax_form_ga_dokumen_mob_validate_jenis();
  scCssBlur(oThis);
}

function sc_form_ga_dokumen_jenis_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ga_dokumen_sifat_onblur(oThis, iSeqRow) {
  do_ajax_form_ga_dokumen_mob_validate_sifat();
  scCssBlur(oThis);
}

function sc_form_ga_dokumen_sifat_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ga_dokumen_unit_onblur(oThis, iSeqRow) {
  do_ajax_form_ga_dokumen_mob_validate_unit();
  scCssBlur(oThis);
}

function sc_form_ga_dokumen_unit_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ga_dokumen_karyawan_onblur(oThis, iSeqRow) {
  do_ajax_form_ga_dokumen_mob_validate_karyawan();
  scCssBlur(oThis);
}

function sc_form_ga_dokumen_karyawan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ga_dokumen_masa_berlaku_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_ga_dokumen_masa_berlaku_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_ga_dokumen_lampiran_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_ga_dokumen_lampiran_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_ga_dokumen_keterangan_onblur(oThis, iSeqRow) {
  do_ajax_form_ga_dokumen_mob_validate_keterangan();
  scCssBlur(oThis);
}

function sc_form_ga_dokumen_keterangan_onfocus(oThis, iSeqRow) {
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
	displayChange_field("nama_dok", "", status);
	displayChange_field("jenis", "", status);
	displayChange_field("sifat", "", status);
	displayChange_field("unit", "", status);
	displayChange_field("karyawan", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("masa_berlaku", "", status);
	displayChange_field("lampiran", "", status);
	displayChange_field("keterangan", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_nama_dok(row, status);
	displayChange_field_jenis(row, status);
	displayChange_field_sifat(row, status);
	displayChange_field_unit(row, status);
	displayChange_field_karyawan(row, status);
	displayChange_field_masa_berlaku(row, status);
	displayChange_field_lampiran(row, status);
	displayChange_field_keterangan(row, status);
}

function displayChange_field(field, row, status) {
	if ("nama_dok" == field) {
		displayChange_field_nama_dok(row, status);
	}
	if ("jenis" == field) {
		displayChange_field_jenis(row, status);
	}
	if ("sifat" == field) {
		displayChange_field_sifat(row, status);
	}
	if ("unit" == field) {
		displayChange_field_unit(row, status);
	}
	if ("karyawan" == field) {
		displayChange_field_karyawan(row, status);
	}
	if ("masa_berlaku" == field) {
		displayChange_field_masa_berlaku(row, status);
	}
	if ("lampiran" == field) {
		displayChange_field_lampiran(row, status);
	}
	if ("keterangan" == field) {
		displayChange_field_keterangan(row, status);
	}
}

function displayChange_field_nama_dok(row, status) {
}

function displayChange_field_jenis(row, status) {
}

function displayChange_field_sifat(row, status) {
}

function displayChange_field_unit(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_unit__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_unit" + row).select2("destroy");
		}
		scJQSelect2Add(row, "unit");
	}
}

function displayChange_field_karyawan(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_karyawan__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_karyawan" + row).select2("destroy");
		}
		scJQSelect2Add(row, "karyawan");
	}
}

function displayChange_field_masa_berlaku(row, status) {
}

function displayChange_field_lampiran(row, status) {
}

function displayChange_field_keterangan(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_unit("all", "on");
	displayChange_field_karyawan("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_ga_dokumen_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(27);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_dummy_masa_berlaku" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var sFormat = "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['masa_berlaku']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
          sSep = "<?php echo "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""; ?>",
          aParts = sFormat.split(sSep),
          aValue = new Array(),
          i, sPart;
      for (i = 0; i < aParts.length; i++) {
        switch (aParts[i]) {
          case "dd":
            sPart = "_dia";
            break;
          case "mm":
            sPart = "_mes";
            break;
          case "yy":
            sPart = "_ano";
            break;
        }
        aValue[i] = $("#id_sc_field_masa_berlaku" + iSeqRow + sPart).val();
      }
      $("#id_sc_dummy_masa_berlaku" + iSeqRow).val(aValue.join(sSep));
    },
    onClose: function(dateText, inst) {
      var sFormat = "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['masa_berlaku']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
          sSep = "<?php echo "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""; ?>",
          aParts = sFormat.split(sSep),
          aValue = dateText.split(sSep),
          i;
      for (i = 0; i < aParts.length; i++) {
        switch (aParts[i]) {
          case "dd":
            sPart = "_dia";
            break;
          case "mm":
            sPart = "_mes";
            break;
          case "yy":
            sPart = "_ano";
            break;
        }
        $("#id_sc_field_masa_berlaku" + iSeqRow + sPart).val(aValue[i]);
      }
      do_ajax_form_ga_dokumen_mob_validate_masa_berlaku(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['masa_berlaku']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_lampiran" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_ga_dokumen_mob_ul_save.php",
    dropZone: $("#hidden_field_data_lampiran" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'lampiran'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_lampiran" + iSeqRow);
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_lampiran" + iSeqRow);
        loader.show();
      }
    },
    done: function(e, data) {
      var fileData, respData, respPos, respMsg, thumbDisplay, checkDisplay, var_ajax_img_thumb, oTemp;
      fileData = null;
      respMsg = "";
      if (data && data.result && data.result[0] && data.result[0].body) {
        respData = data.result[0].body.innerText;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = $.parseJSON(respData);
        }
        else {
          respMsg = respData;
        }
      }
      else {
        respData = data.result;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = eval(respData);
        }
        else {
          respMsg = respData;
        }
      }
      if (window.FormData !== undefined)
      {
        $("#id_img_loader_lampiran" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_lampiran" + iSeqRow).hide();
      }
      if (null == fileData) {
        if ("" != respMsg) {
          oTemp = {"htmOutput" : "<?php echo $this->Ini->Nm_lang['lang_errm_upld_admn']; ?>"};
          scAjaxShowDebug(oTemp);
        }
        return;
      }
      if (fileData[0].error && "" != fileData[0].error) {
        var uploadErrorMessage = "";
        oResp = {};
        if ("acceptFileTypes" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_invl']) ?>";
        }
        else if ("maxFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("minFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("emptyFile" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_empty']) ?>";
        }
        scAjaxShowErrorDisplay("table", uploadErrorMessage);
        return;
      }
      $("#id_sc_field_lampiran" + iSeqRow).val("");
      $("#id_sc_field_lampiran_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_lampiran_ul_type" + iSeqRow).val(fileData[0].type);
      $("#id_ajax_doc_lampiran" + iSeqRow).html(fileData[0].name);
      $("#id_ajax_doc_lampiran" + iSeqRow).css("display", "");
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_lampiran" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_lampiran" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

} // scJQUploadAdd

function scJQSelect2Add(seqRow, specificField) {
  if (null == specificField || "unit" == specificField) {
    scJQSelect2Add_unit(seqRow);
  }
  if (null == specificField || "karyawan" == specificField) {
    scJQSelect2Add_karyawan(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_unit(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_unit_obj" : "#id_sc_field_unit" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_unit_obj',
      dropdownCssClass: 'css_unit_obj',
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

function scJQSelect2Add_karyawan(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_karyawan_obj" : "#id_sc_field_karyawan" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_karyawan_obj',
      dropdownCssClass: 'css_karyawan_obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_unit) { displayChange_field_unit(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_karyawan) { displayChange_field_karyawan(iLine, "on"); } }, 150);
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
