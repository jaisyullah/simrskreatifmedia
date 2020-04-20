
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
  scEventControl_data["labcode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kategori" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nama" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipehasil" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["oper" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["satuan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["p1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["p2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["w1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["w2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["lastupdated" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tarif" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detail" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_0" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["labcode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["labcode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kategori" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kategori" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nama" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nama" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipehasil" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipehasil" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["oper" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["oper" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["satuan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["satuan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["p1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["p1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["p2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["p2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["w1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["w1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["w2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["w2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["lastupdated" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["lastupdated" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tarif" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tarif" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detail" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detail" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_0" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_0" + iSeqRow]["change"]) {
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
  if ("kategori" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tipehasil" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("oper" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("satuan" + iSeq == fieldName) {
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
  $('#id_sc_field_id' + iSeqRow).bind('blur', function() { sc_form_tblab_id_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_tblab_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_labcode' + iSeqRow).bind('blur', function() { sc_form_tblab_labcode_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tblab_labcode_onfocus(this, iSeqRow) });
  $('#id_sc_field_kategori' + iSeqRow).bind('blur', function() { sc_form_tblab_kategori_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tblab_kategori_onfocus(this, iSeqRow) });
  $('#id_sc_field_nama' + iSeqRow).bind('blur', function() { sc_form_tblab_nama_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tblab_nama_onfocus(this, iSeqRow) });
  $('#id_sc_field_oper' + iSeqRow).bind('blur', function() { sc_form_tblab_oper_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_tblab_oper_onfocus(this, iSeqRow) });
  $('#id_sc_field_p1' + iSeqRow).bind('blur', function() { sc_form_tblab_p1_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_tblab_p1_onfocus(this, iSeqRow) });
  $('#id_sc_field_p2' + iSeqRow).bind('blur', function() { sc_form_tblab_p2_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_tblab_p2_onfocus(this, iSeqRow) });
  $('#id_sc_field_w1' + iSeqRow).bind('blur', function() { sc_form_tblab_w1_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_tblab_w1_onfocus(this, iSeqRow) });
  $('#id_sc_field_w2' + iSeqRow).bind('blur', function() { sc_form_tblab_w2_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_tblab_w2_onfocus(this, iSeqRow) });
  $('#id_sc_field_satuan' + iSeqRow).bind('blur', function() { sc_form_tblab_satuan_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tblab_satuan_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipehasil' + iSeqRow).bind('blur', function() { sc_form_tblab_tipehasil_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tblab_tipehasil_onfocus(this, iSeqRow) });
  $('#id_sc_field_lastupdated' + iSeqRow).bind('blur', function() { sc_form_tblab_lastupdated_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tblab_lastupdated_onfocus(this, iSeqRow) });
  $('#id_sc_field_lastupdated_hora' + iSeqRow).bind('blur', function() { sc_form_tblab_lastupdated_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_tblab_lastupdated_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_0' + iSeqRow).bind('blur', function() { sc_form_tblab_sc_field_0_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tblab_sc_field_0_onfocus(this, iSeqRow) });
  $('#id_sc_field_detail' + iSeqRow).bind('blur', function() { sc_form_tblab_detail_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tblab_detail_onfocus(this, iSeqRow) });
  $('#id_sc_field_tarif' + iSeqRow).bind('blur', function() { sc_form_tblab_tarif_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tblab_tarif_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tblab_id_onblur(oThis, iSeqRow) {
  do_ajax_form_tblab_mob_validate_id();
  scCssBlur(oThis);
}

function sc_form_tblab_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tblab_labcode_onblur(oThis, iSeqRow) {
  do_ajax_form_tblab_mob_validate_labcode();
  scCssBlur(oThis);
}

function sc_form_tblab_labcode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tblab_kategori_onblur(oThis, iSeqRow) {
  do_ajax_form_tblab_mob_validate_kategori();
  scCssBlur(oThis);
}

function sc_form_tblab_kategori_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tblab_nama_onblur(oThis, iSeqRow) {
  do_ajax_form_tblab_mob_validate_nama();
  scCssBlur(oThis);
}

function sc_form_tblab_nama_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tblab_oper_onblur(oThis, iSeqRow) {
  do_ajax_form_tblab_mob_validate_oper();
  scCssBlur(oThis);
}

function sc_form_tblab_oper_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tblab_p1_onblur(oThis, iSeqRow) {
  do_ajax_form_tblab_mob_validate_p1();
  scCssBlur(oThis);
}

function sc_form_tblab_p1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tblab_p2_onblur(oThis, iSeqRow) {
  do_ajax_form_tblab_mob_validate_p2();
  scCssBlur(oThis);
}

function sc_form_tblab_p2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tblab_w1_onblur(oThis, iSeqRow) {
  do_ajax_form_tblab_mob_validate_w1();
  scCssBlur(oThis);
}

function sc_form_tblab_w1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tblab_w2_onblur(oThis, iSeqRow) {
  do_ajax_form_tblab_mob_validate_w2();
  scCssBlur(oThis);
}

function sc_form_tblab_w2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tblab_satuan_onblur(oThis, iSeqRow) {
  do_ajax_form_tblab_mob_validate_satuan();
  scCssBlur(oThis);
}

function sc_form_tblab_satuan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tblab_tipehasil_onblur(oThis, iSeqRow) {
  do_ajax_form_tblab_mob_validate_tipehasil();
  scCssBlur(oThis);
}

function sc_form_tblab_tipehasil_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tblab_lastupdated_onblur(oThis, iSeqRow) {
  do_ajax_form_tblab_mob_validate_lastupdated();
  scCssBlur(oThis);
}

function sc_form_tblab_lastupdated_onblur(oThis, iSeqRow) {
  do_ajax_form_tblab_mob_validate_lastupdated();
  scCssBlur(oThis);
}

function sc_form_tblab_lastupdated_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tblab_lastupdated_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tblab_sc_field_0_onblur(oThis, iSeqRow) {
  do_ajax_form_tblab_mob_validate_sc_field_0();
  scCssBlur(oThis);
}

function sc_form_tblab_sc_field_0_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tblab_detail_onblur(oThis, iSeqRow) {
  do_ajax_form_tblab_mob_validate_detail();
  scCssBlur(oThis);
}

function sc_form_tblab_detail_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tblab_tarif_onblur(oThis, iSeqRow) {
  do_ajax_form_tblab_mob_validate_tarif();
  scCssBlur(oThis);
}

function sc_form_tblab_tarif_onfocus(oThis, iSeqRow) {
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
	if ("4" == block) {
		displayChange_block_4(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("labcode", "", status);
	displayChange_field("kategori", "", status);
	displayChange_field("nama", "", status);
	displayChange_field("tipehasil", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("oper", "", status);
	displayChange_field("satuan", "", status);
	displayChange_field("p1", "", status);
	displayChange_field("p2", "", status);
	displayChange_field("w1", "", status);
	displayChange_field("w2", "", status);
	displayChange_field("lastupdated", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("tarif", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("detail", "", status);
}

function displayChange_block_4(status) {
	displayChange_field("sc_field_0", "", status);
	displayChange_field("id", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_labcode(row, status);
	displayChange_field_kategori(row, status);
	displayChange_field_nama(row, status);
	displayChange_field_tipehasil(row, status);
	displayChange_field_oper(row, status);
	displayChange_field_satuan(row, status);
	displayChange_field_p1(row, status);
	displayChange_field_p2(row, status);
	displayChange_field_w1(row, status);
	displayChange_field_w2(row, status);
	displayChange_field_lastupdated(row, status);
	displayChange_field_tarif(row, status);
	displayChange_field_detail(row, status);
	displayChange_field_sc_field_0(row, status);
	displayChange_field_id(row, status);
}

function displayChange_field(field, row, status) {
	if ("labcode" == field) {
		displayChange_field_labcode(row, status);
	}
	if ("kategori" == field) {
		displayChange_field_kategori(row, status);
	}
	if ("nama" == field) {
		displayChange_field_nama(row, status);
	}
	if ("tipehasil" == field) {
		displayChange_field_tipehasil(row, status);
	}
	if ("oper" == field) {
		displayChange_field_oper(row, status);
	}
	if ("satuan" == field) {
		displayChange_field_satuan(row, status);
	}
	if ("p1" == field) {
		displayChange_field_p1(row, status);
	}
	if ("p2" == field) {
		displayChange_field_p2(row, status);
	}
	if ("w1" == field) {
		displayChange_field_w1(row, status);
	}
	if ("w2" == field) {
		displayChange_field_w2(row, status);
	}
	if ("lastupdated" == field) {
		displayChange_field_lastupdated(row, status);
	}
	if ("tarif" == field) {
		displayChange_field_tarif(row, status);
	}
	if ("detail" == field) {
		displayChange_field_detail(row, status);
	}
	if ("sc_field_0" == field) {
		displayChange_field_sc_field_0(row, status);
	}
	if ("id" == field) {
		displayChange_field_id(row, status);
	}
}

function displayChange_field_labcode(row, status) {
}

function displayChange_field_kategori(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_kategori__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_kategori" + row).select2("destroy");
		}
		scJQSelect2Add(row, "kategori");
	}
}

function displayChange_field_nama(row, status) {
}

function displayChange_field_tipehasil(row, status) {
}

function displayChange_field_oper(row, status) {
}

function displayChange_field_satuan(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_satuan__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_satuan" + row).select2("destroy");
		}
		scJQSelect2Add(row, "satuan");
	}
}

function displayChange_field_p1(row, status) {
}

function displayChange_field_p2(row, status) {
}

function displayChange_field_w1(row, status) {
}

function displayChange_field_w2(row, status) {
}

function displayChange_field_lastupdated(row, status) {
}

function displayChange_field_tarif(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tblabrate_mob")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tblabrate_mob")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_detail(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tblabdetail_mob")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tblabdetail_mob")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_sc_field_0(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tblabrujukananak_mob")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tblabrujukananak_mob")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_id(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_kategori("all", "on");
	displayChange_field_satuan("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tblab_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(22);
		}
	}
}
function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

function scJQSelect2Add(seqRow, specificField) {
  if (null == specificField || "kategori" == specificField) {
    scJQSelect2Add_kategori(seqRow);
  }
  if (null == specificField || "satuan" == specificField) {
    scJQSelect2Add_satuan(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_kategori(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_kategori_obj" : "#id_sc_field_kategori" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_kategori_obj',
      dropdownCssClass: 'css_kategori_obj',
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

function scJQSelect2Add_satuan(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_satuan_obj" : "#id_sc_field_satuan" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_satuan_obj',
      dropdownCssClass: 'css_satuan_obj',
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
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_kategori) { displayChange_field_kategori(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_satuan) { displayChange_field_satuan(iLine, "on"); } }, 150);
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
