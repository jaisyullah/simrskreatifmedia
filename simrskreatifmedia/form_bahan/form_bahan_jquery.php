
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
  scEventControl_data["bahancode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nama" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kategori" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jenis" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["satuan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["keterangan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["aktif" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detailstok" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["historyharga" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["bahancode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["bahancode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nama" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nama" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kategori" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kategori" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jenis" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jenis" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["satuan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["satuan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["keterangan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["keterangan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["aktif" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["aktif" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detailstok" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detailstok" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["historyharga" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["historyharga" + iSeqRow]["change"]) {
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
  if ("jenis" + iSeq == fieldName) {
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
  $('#id_sc_field_bahancode' + iSeqRow).bind('blur', function() { sc_form_bahan_bahancode_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_bahan_bahancode_onfocus(this, iSeqRow) });
  $('#id_sc_field_nama' + iSeqRow).bind('blur', function() { sc_form_bahan_nama_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_bahan_nama_onfocus(this, iSeqRow) });
  $('#id_sc_field_kategori' + iSeqRow).bind('blur', function() { sc_form_bahan_kategori_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_bahan_kategori_onfocus(this, iSeqRow) });
  $('#id_sc_field_jenis' + iSeqRow).bind('blur', function() { sc_form_bahan_jenis_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_bahan_jenis_onfocus(this, iSeqRow) });
  $('#id_sc_field_satuan' + iSeqRow).bind('blur', function() { sc_form_bahan_satuan_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_bahan_satuan_onfocus(this, iSeqRow) });
  $('#id_sc_field_keterangan' + iSeqRow).bind('blur', function() { sc_form_bahan_keterangan_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_bahan_keterangan_onfocus(this, iSeqRow) });
  $('#id_sc_field_aktif' + iSeqRow).bind('blur', function() { sc_form_bahan_aktif_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_bahan_aktif_onfocus(this, iSeqRow) });
  $('#id_sc_field_detailstok' + iSeqRow).bind('blur', function() { sc_form_bahan_detailstok_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_bahan_detailstok_onfocus(this, iSeqRow) });
  $('#id_sc_field_historyharga' + iSeqRow).bind('blur', function() { sc_form_bahan_historyharga_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_bahan_historyharga_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_bahan_bahancode_onblur(oThis, iSeqRow) {
  do_ajax_form_bahan_validate_bahancode();
  scCssBlur(oThis);
}

function sc_form_bahan_bahancode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_bahan_nama_onblur(oThis, iSeqRow) {
  do_ajax_form_bahan_validate_nama();
  scCssBlur(oThis);
}

function sc_form_bahan_nama_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_bahan_kategori_onblur(oThis, iSeqRow) {
  do_ajax_form_bahan_validate_kategori();
  scCssBlur(oThis);
}

function sc_form_bahan_kategori_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_bahan_jenis_onblur(oThis, iSeqRow) {
  do_ajax_form_bahan_validate_jenis();
  scCssBlur(oThis);
}

function sc_form_bahan_jenis_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_bahan_satuan_onblur(oThis, iSeqRow) {
  do_ajax_form_bahan_validate_satuan();
  scCssBlur(oThis);
}

function sc_form_bahan_satuan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_bahan_keterangan_onblur(oThis, iSeqRow) {
  do_ajax_form_bahan_validate_keterangan();
  scCssBlur(oThis);
}

function sc_form_bahan_keterangan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_bahan_aktif_onblur(oThis, iSeqRow) {
  do_ajax_form_bahan_validate_aktif();
  scCssBlur(oThis);
}

function sc_form_bahan_aktif_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_bahan_detailstok_onblur(oThis, iSeqRow) {
  do_ajax_form_bahan_validate_detailstok();
  scCssBlur(oThis);
}

function sc_form_bahan_detailstok_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_bahan_historyharga_onblur(oThis, iSeqRow) {
  do_ajax_form_bahan_validate_historyharga();
  scCssBlur(oThis);
}

function sc_form_bahan_historyharga_onfocus(oThis, iSeqRow) {
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
	displayChange_field("bahancode", "", status);
	displayChange_field("nama", "", status);
	displayChange_field("kategori", "", status);
	displayChange_field("jenis", "", status);
	displayChange_field("satuan", "", status);
	displayChange_field("keterangan", "", status);
	displayChange_field("aktif", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("detailstok", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("historyharga", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_bahancode(row, status);
	displayChange_field_nama(row, status);
	displayChange_field_kategori(row, status);
	displayChange_field_jenis(row, status);
	displayChange_field_satuan(row, status);
	displayChange_field_keterangan(row, status);
	displayChange_field_aktif(row, status);
	displayChange_field_detailstok(row, status);
	displayChange_field_historyharga(row, status);
}

function displayChange_field(field, row, status) {
	if ("bahancode" == field) {
		displayChange_field_bahancode(row, status);
	}
	if ("nama" == field) {
		displayChange_field_nama(row, status);
	}
	if ("kategori" == field) {
		displayChange_field_kategori(row, status);
	}
	if ("jenis" == field) {
		displayChange_field_jenis(row, status);
	}
	if ("satuan" == field) {
		displayChange_field_satuan(row, status);
	}
	if ("keterangan" == field) {
		displayChange_field_keterangan(row, status);
	}
	if ("aktif" == field) {
		displayChange_field_aktif(row, status);
	}
	if ("detailstok" == field) {
		displayChange_field_detailstok(row, status);
	}
	if ("historyharga" == field) {
		displayChange_field_historyharga(row, status);
	}
}

function displayChange_field_bahancode(row, status) {
}

function displayChange_field_nama(row, status) {
}

function displayChange_field_kategori(row, status) {
}

function displayChange_field_jenis(row, status) {
}

function displayChange_field_satuan(row, status) {
}

function displayChange_field_keterangan(row, status) {
}

function displayChange_field_aktif(row, status) {
}

function displayChange_field_detailstok(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_stock_gizi")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_stock_gizi")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_historyharga(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_hisharga_gizi")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_hisharga_gizi")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_bahan_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(18);
		}
	}
}
function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

