
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
  scEventControl_data["kodeitem" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["namaitem" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jenisbarang" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["stokminimal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["max" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["satuanterkecil" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["aktif" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hargajual" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kemasanbeli" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["satuanisi" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["generik" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["paten" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["keterangan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_fornas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["stock" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["margin" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["grid_his_buy" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["kodeitem" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kodeitem" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["namaitem" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["namaitem" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jenisbarang" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jenisbarang" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["stokminimal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["stokminimal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["max" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["max" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["satuanterkecil" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["satuanterkecil" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["aktif" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["aktif" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hargajual" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hargajual" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kemasanbeli" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kemasanbeli" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["satuanisi" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["satuanisi" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["generik" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["generik" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["paten" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["paten" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["keterangan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["keterangan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_fornas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_fornas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["stock" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["stock" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["margin" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["margin" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["grid_his_buy" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["grid_his_buy" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("jenisbarang" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("satuanterkecil" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("kemasanbeli" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("generik" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("paten" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_fornas" + iSeq == fieldName) {
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
  $('#id_sc_field_kodeitem' + iSeqRow).bind('blur', function() { sc_form_tbobat_kodeitem_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbobat_kodeitem_onfocus(this, iSeqRow) });
  $('#id_sc_field_namaitem' + iSeqRow).bind('blur', function() { sc_form_tbobat_namaitem_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbobat_namaitem_onfocus(this, iSeqRow) });
  $('#id_sc_field_jenisbarang' + iSeqRow).bind('blur', function() { sc_form_tbobat_jenisbarang_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbobat_jenisbarang_onfocus(this, iSeqRow) });
  $('#id_sc_field_satuanterkecil' + iSeqRow).bind('blur', function() { sc_form_tbobat_satuanterkecil_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_tbobat_satuanterkecil_onfocus(this, iSeqRow) });
  $('#id_sc_field_keterangan' + iSeqRow).bind('blur', function() { sc_form_tbobat_keterangan_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbobat_keterangan_onfocus(this, iSeqRow) });
  $('#id_sc_field_stokminimal' + iSeqRow).bind('blur', function() { sc_form_tbobat_stokminimal_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbobat_stokminimal_onfocus(this, iSeqRow) });
  $('#id_sc_field_aktif' + iSeqRow).bind('blur', function() { sc_form_tbobat_aktif_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbobat_aktif_onfocus(this, iSeqRow) });
  $('#id_sc_field_hargajual' + iSeqRow).bind('blur', function() { sc_form_tbobat_hargajual_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbobat_hargajual_onfocus(this, iSeqRow) });
  $('#id_sc_field_kemasanbeli' + iSeqRow).bind('blur', function() { sc_form_tbobat_kemasanbeli_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbobat_kemasanbeli_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_fornas' + iSeqRow).bind('blur', function() { sc_form_tbobat_id_fornas_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbobat_id_fornas_onfocus(this, iSeqRow) });
  $('#id_sc_field_generik' + iSeqRow).bind('blur', function() { sc_form_tbobat_generik_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbobat_generik_onfocus(this, iSeqRow) });
  $('#id_sc_field_paten' + iSeqRow).bind('blur', function() { sc_form_tbobat_paten_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbobat_paten_onfocus(this, iSeqRow) });
  $('#id_sc_field_max' + iSeqRow).bind('blur', function() { sc_form_tbobat_max_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tbobat_max_onfocus(this, iSeqRow) });
  $('#id_sc_field_satuanisi' + iSeqRow).bind('blur', function() { sc_form_tbobat_satuanisi_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbobat_satuanisi_onfocus(this, iSeqRow) });
  $('#id_sc_field_stock' + iSeqRow).bind('blur', function() { sc_form_tbobat_stock_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbobat_stock_onfocus(this, iSeqRow) });
  $('#id_sc_field_margin' + iSeqRow).bind('blur', function() { sc_form_tbobat_margin_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbobat_margin_onfocus(this, iSeqRow) });
  $('#id_sc_field_grid_his_buy' + iSeqRow).bind('blur', function() { sc_form_tbobat_grid_his_buy_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tbobat_grid_his_buy_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbobat_kodeitem_onblur(oThis, iSeqRow) {
  do_ajax_form_tbobat_mob_validate_kodeitem();
  scCssBlur(oThis);
}

function sc_form_tbobat_kodeitem_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbobat_namaitem_onblur(oThis, iSeqRow) {
  do_ajax_form_tbobat_mob_validate_namaitem();
  scCssBlur(oThis);
}

function sc_form_tbobat_namaitem_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbobat_jenisbarang_onblur(oThis, iSeqRow) {
  do_ajax_form_tbobat_mob_validate_jenisbarang();
  scCssBlur(oThis);
}

function sc_form_tbobat_jenisbarang_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbobat_satuanterkecil_onblur(oThis, iSeqRow) {
  do_ajax_form_tbobat_mob_validate_satuanterkecil();
  scCssBlur(oThis);
}

function sc_form_tbobat_satuanterkecil_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbobat_keterangan_onblur(oThis, iSeqRow) {
  do_ajax_form_tbobat_mob_validate_keterangan();
  scCssBlur(oThis);
}

function sc_form_tbobat_keterangan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbobat_stokminimal_onblur(oThis, iSeqRow) {
  do_ajax_form_tbobat_mob_validate_stokminimal();
  scCssBlur(oThis);
}

function sc_form_tbobat_stokminimal_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbobat_aktif_onblur(oThis, iSeqRow) {
  do_ajax_form_tbobat_mob_validate_aktif();
  scCssBlur(oThis);
}

function sc_form_tbobat_aktif_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbobat_hargajual_onblur(oThis, iSeqRow) {
  do_ajax_form_tbobat_mob_validate_hargajual();
  scCssBlur(oThis);
}

function sc_form_tbobat_hargajual_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbobat_kemasanbeli_onblur(oThis, iSeqRow) {
  do_ajax_form_tbobat_mob_validate_kemasanbeli();
  scCssBlur(oThis);
}

function sc_form_tbobat_kemasanbeli_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbobat_id_fornas_onblur(oThis, iSeqRow) {
  do_ajax_form_tbobat_mob_validate_id_fornas();
  scCssBlur(oThis);
}

function sc_form_tbobat_id_fornas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbobat_generik_onblur(oThis, iSeqRow) {
  do_ajax_form_tbobat_mob_validate_generik();
  scCssBlur(oThis);
}

function sc_form_tbobat_generik_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbobat_paten_onblur(oThis, iSeqRow) {
  do_ajax_form_tbobat_mob_validate_paten();
  scCssBlur(oThis);
}

function sc_form_tbobat_paten_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbobat_max_onblur(oThis, iSeqRow) {
  do_ajax_form_tbobat_mob_validate_max();
  scCssBlur(oThis);
}

function sc_form_tbobat_max_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbobat_satuanisi_onblur(oThis, iSeqRow) {
  do_ajax_form_tbobat_mob_validate_satuanisi();
  scCssBlur(oThis);
}

function sc_form_tbobat_satuanisi_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbobat_stock_onblur(oThis, iSeqRow) {
  do_ajax_form_tbobat_mob_validate_stock();
  scCssBlur(oThis);
}

function sc_form_tbobat_stock_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbobat_margin_onblur(oThis, iSeqRow) {
  do_ajax_form_tbobat_mob_validate_margin();
  scCssBlur(oThis);
}

function sc_form_tbobat_margin_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbobat_grid_his_buy_onblur(oThis, iSeqRow) {
  do_ajax_form_tbobat_mob_validate_grid_his_buy();
  scCssBlur(oThis);
}

function sc_form_tbobat_grid_his_buy_onfocus(oThis, iSeqRow) {
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
	if ("5" == block) {
		displayChange_block_5(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("kodeitem", "", status);
	displayChange_field("namaitem", "", status);
	displayChange_field("jenisbarang", "", status);
	displayChange_field("stokminimal", "", status);
	displayChange_field("max", "", status);
	displayChange_field("satuanterkecil", "", status);
	displayChange_field("aktif", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("hargajual", "", status);
	displayChange_field("kemasanbeli", "", status);
	displayChange_field("satuanisi", "", status);
	displayChange_field("generik", "", status);
	displayChange_field("paten", "", status);
	displayChange_field("keterangan", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("id_fornas", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("stock", "", status);
}

function displayChange_block_4(status) {
	displayChange_field("margin", "", status);
}

function displayChange_block_5(status) {
	displayChange_field("grid_his_buy", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_kodeitem(row, status);
	displayChange_field_namaitem(row, status);
	displayChange_field_jenisbarang(row, status);
	displayChange_field_stokminimal(row, status);
	displayChange_field_max(row, status);
	displayChange_field_satuanterkecil(row, status);
	displayChange_field_aktif(row, status);
	displayChange_field_hargajual(row, status);
	displayChange_field_kemasanbeli(row, status);
	displayChange_field_satuanisi(row, status);
	displayChange_field_generik(row, status);
	displayChange_field_paten(row, status);
	displayChange_field_keterangan(row, status);
	displayChange_field_id_fornas(row, status);
	displayChange_field_stock(row, status);
	displayChange_field_margin(row, status);
	displayChange_field_grid_his_buy(row, status);
}

function displayChange_field(field, row, status) {
	if ("kodeitem" == field) {
		displayChange_field_kodeitem(row, status);
	}
	if ("namaitem" == field) {
		displayChange_field_namaitem(row, status);
	}
	if ("jenisbarang" == field) {
		displayChange_field_jenisbarang(row, status);
	}
	if ("stokminimal" == field) {
		displayChange_field_stokminimal(row, status);
	}
	if ("max" == field) {
		displayChange_field_max(row, status);
	}
	if ("satuanterkecil" == field) {
		displayChange_field_satuanterkecil(row, status);
	}
	if ("aktif" == field) {
		displayChange_field_aktif(row, status);
	}
	if ("hargajual" == field) {
		displayChange_field_hargajual(row, status);
	}
	if ("kemasanbeli" == field) {
		displayChange_field_kemasanbeli(row, status);
	}
	if ("satuanisi" == field) {
		displayChange_field_satuanisi(row, status);
	}
	if ("generik" == field) {
		displayChange_field_generik(row, status);
	}
	if ("paten" == field) {
		displayChange_field_paten(row, status);
	}
	if ("keterangan" == field) {
		displayChange_field_keterangan(row, status);
	}
	if ("id_fornas" == field) {
		displayChange_field_id_fornas(row, status);
	}
	if ("stock" == field) {
		displayChange_field_stock(row, status);
	}
	if ("margin" == field) {
		displayChange_field_margin(row, status);
	}
	if ("grid_his_buy" == field) {
		displayChange_field_grid_his_buy(row, status);
	}
}

function displayChange_field_kodeitem(row, status) {
}

function displayChange_field_namaitem(row, status) {
}

function displayChange_field_jenisbarang(row, status) {
}

function displayChange_field_stokminimal(row, status) {
}

function displayChange_field_max(row, status) {
}

function displayChange_field_satuanterkecil(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_satuanterkecil__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_satuanterkecil" + row).select2("destroy");
		}
		scJQSelect2Add(row, "satuanterkecil");
	}
}

function displayChange_field_aktif(row, status) {
}

function displayChange_field_hargajual(row, status) {
}

function displayChange_field_kemasanbeli(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_kemasanbeli__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_kemasanbeli" + row).select2("destroy");
		}
		scJQSelect2Add(row, "kemasanbeli");
	}
}

function displayChange_field_satuanisi(row, status) {
}

function displayChange_field_generik(row, status) {
}

function displayChange_field_paten(row, status) {
}

function displayChange_field_keterangan(row, status) {
}

function displayChange_field_id_fornas(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_id_fornas__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_id_fornas" + row).select2("destroy");
		}
		scJQSelect2Add(row, "id_fornas");
	}
}

function displayChange_field_stock(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbstockobat_mob")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbstockobat_mob")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_margin(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbdetailmargin_mob")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbdetailmargin_mob")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_grid_his_buy(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_grid_his_obat")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_grid_his_obat")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
	displayChange_field_satuanterkecil("all", "on");
	displayChange_field_kemasanbeli("all", "on");
	displayChange_field_id_fornas("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbobat_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(23);
		}
	}
}
function scJQSpinAdd(iSeqRow) {
  $("#id_sc_field_satuanisi" + iSeqRow).spinner({
    max: 99999999,
    min: 0,
    step: 1,
    page: 5,
    change: function(event, ui) {
      $(this).trigger("change");
    },
    stop: function(event, ui) {
      $(this).trigger("change");
    }
  });
} // scJQSpinAdd

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

function scJQSelect2Add(seqRow, specificField) {
  if (null == specificField || "satuanterkecil" == specificField) {
    scJQSelect2Add_satuanterkecil(seqRow);
  }
  if (null == specificField || "kemasanbeli" == specificField) {
    scJQSelect2Add_kemasanbeli(seqRow);
  }
  if (null == specificField || "id_fornas" == specificField) {
    scJQSelect2Add_id_fornas(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_satuanterkecil(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_satuanterkecil_obj" : "#id_sc_field_satuanterkecil" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_satuanterkecil_obj',
      dropdownCssClass: 'css_satuanterkecil_obj',
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

function scJQSelect2Add_kemasanbeli(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_kemasanbeli_obj" : "#id_sc_field_kemasanbeli" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_kemasanbeli_obj',
      dropdownCssClass: 'css_kemasanbeli_obj',
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

function scJQSelect2Add_id_fornas(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_fornas_obj" : "#id_sc_field_id_fornas" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_fornas_obj',
      dropdownCssClass: 'css_id_fornas_obj',
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
  scJQSpinAdd(iLine);
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_satuanterkecil) { displayChange_field_satuanterkecil(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_kemasanbeli) { displayChange_field_kemasanbeli(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_id_fornas) { displayChange_field_id_fornas(iLine, "on"); } }, 150);
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
