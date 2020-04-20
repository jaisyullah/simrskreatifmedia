
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
  scEventControl_data["id_pbf" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_hutang" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["no_referensi" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["keterangan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tanggal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jumlah_bayar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jenis_pembayaran" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_pbf" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_pbf" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_hutang" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_hutang" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["no_referensi" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["no_referensi" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["keterangan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["keterangan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tanggal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tanggal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jumlah_bayar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jumlah_bayar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jenis_pembayaran" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jenis_pembayaran" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("jenis_pembayaran" + iSeq == fieldName) {
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
  $('#id_sc_field_id_pbf' + iSeqRow).bind('blur', function() { sc_form_buku_pengeluaran_id_pbf_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_buku_pengeluaran_id_pbf_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_hutang' + iSeqRow).bind('blur', function() { sc_form_buku_pengeluaran_id_hutang_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_buku_pengeluaran_id_hutang_onfocus(this, iSeqRow) });
  $('#id_sc_field_no_referensi' + iSeqRow).bind('blur', function() { sc_form_buku_pengeluaran_no_referensi_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_buku_pengeluaran_no_referensi_onfocus(this, iSeqRow) });
  $('#id_sc_field_keterangan' + iSeqRow).bind('blur', function() { sc_form_buku_pengeluaran_keterangan_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_buku_pengeluaran_keterangan_onfocus(this, iSeqRow) });
  $('#id_sc_field_tanggal' + iSeqRow).bind('blur', function() { sc_form_buku_pengeluaran_tanggal_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_buku_pengeluaran_tanggal_onfocus(this, iSeqRow) });
  $('#id_sc_field_jumlah_bayar' + iSeqRow).bind('blur', function() { sc_form_buku_pengeluaran_jumlah_bayar_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_buku_pengeluaran_jumlah_bayar_onfocus(this, iSeqRow) });
  $('#id_sc_field_jenis_pembayaran' + iSeqRow).bind('blur', function() { sc_form_buku_pengeluaran_jenis_pembayaran_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_buku_pengeluaran_jenis_pembayaran_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_buku_pengeluaran_id_pbf_onblur(oThis, iSeqRow) {
  do_ajax_form_buku_pengeluaran_mob_validate_id_pbf();
  scCssBlur(oThis);
}

function sc_form_buku_pengeluaran_id_pbf_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_buku_pengeluaran_id_hutang_onblur(oThis, iSeqRow) {
  do_ajax_form_buku_pengeluaran_mob_validate_id_hutang();
  scCssBlur(oThis);
}

function sc_form_buku_pengeluaran_id_hutang_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_buku_pengeluaran_no_referensi_onblur(oThis, iSeqRow) {
  do_ajax_form_buku_pengeluaran_mob_validate_no_referensi();
  scCssBlur(oThis);
}

function sc_form_buku_pengeluaran_no_referensi_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_buku_pengeluaran_keterangan_onblur(oThis, iSeqRow) {
  do_ajax_form_buku_pengeluaran_mob_validate_keterangan();
  scCssBlur(oThis);
}

function sc_form_buku_pengeluaran_keterangan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_buku_pengeluaran_tanggal_onblur(oThis, iSeqRow) {
  do_ajax_form_buku_pengeluaran_mob_validate_tanggal();
  scCssBlur(oThis);
}

function sc_form_buku_pengeluaran_tanggal_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_buku_pengeluaran_jumlah_bayar_onblur(oThis, iSeqRow) {
  do_ajax_form_buku_pengeluaran_mob_validate_jumlah_bayar();
  scCssBlur(oThis);
}

function sc_form_buku_pengeluaran_jumlah_bayar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_buku_pengeluaran_jenis_pembayaran_onblur(oThis, iSeqRow) {
  do_ajax_form_buku_pengeluaran_mob_validate_jenis_pembayaran();
  scCssBlur(oThis);
}

function sc_form_buku_pengeluaran_jenis_pembayaran_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("id_pbf", "", status);
	displayChange_field("id_hutang", "", status);
	displayChange_field("no_referensi", "", status);
	displayChange_field("keterangan", "", status);
	displayChange_field("tanggal", "", status);
	displayChange_field("jumlah_bayar", "", status);
	displayChange_field("jenis_pembayaran", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_id_pbf(row, status);
	displayChange_field_id_hutang(row, status);
	displayChange_field_no_referensi(row, status);
	displayChange_field_keterangan(row, status);
	displayChange_field_tanggal(row, status);
	displayChange_field_jumlah_bayar(row, status);
	displayChange_field_jenis_pembayaran(row, status);
}

function displayChange_field(field, row, status) {
	if ("id_pbf" == field) {
		displayChange_field_id_pbf(row, status);
	}
	if ("id_hutang" == field) {
		displayChange_field_id_hutang(row, status);
	}
	if ("no_referensi" == field) {
		displayChange_field_no_referensi(row, status);
	}
	if ("keterangan" == field) {
		displayChange_field_keterangan(row, status);
	}
	if ("tanggal" == field) {
		displayChange_field_tanggal(row, status);
	}
	if ("jumlah_bayar" == field) {
		displayChange_field_jumlah_bayar(row, status);
	}
	if ("jenis_pembayaran" == field) {
		displayChange_field_jenis_pembayaran(row, status);
	}
}

function displayChange_field_id_pbf(row, status) {
}

function displayChange_field_id_hutang(row, status) {
}

function displayChange_field_no_referensi(row, status) {
}

function displayChange_field_keterangan(row, status) {
}

function displayChange_field_tanggal(row, status) {
}

function displayChange_field_jumlah_bayar(row, status) {
}

function displayChange_field_jenis_pembayaran(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_jenis_pembayaran__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_jenis_pembayaran" + row).select2("destroy");
		}
		scJQSelect2Add(row, "jenis_pembayaran");
	}
}

function scRecreateSelect2() {
	displayChange_field_jenis_pembayaran("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_buku_pengeluaran_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(33);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_tanggal" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_tanggal" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_buku_pengeluaran_mob_validate_tanggal(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['tanggal']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  if (null == specificField || "jenis_pembayaran" == specificField) {
    scJQSelect2Add_jenis_pembayaran(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_jenis_pembayaran(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_jenis_pembayaran_obj" : "#id_sc_field_jenis_pembayaran" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_jenis_pembayaran_obj',
      dropdownCssClass: 'css_jenis_pembayaran_obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_jenis_pembayaran) { displayChange_field_jenis_pembayaran(iLine, "on"); } }, 150);
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
