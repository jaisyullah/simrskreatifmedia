
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
  scEventControl_data["dicom" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hasil" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["struk" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["template" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["attachment" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["attachment2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["attachment3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["trancode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["diagnosa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_0" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["radcode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["hasil" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hasil" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["struk" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["struk" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["template" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["template" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["trancode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["trancode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["diagnosa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["diagnosa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_0" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_0" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["radcode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["radcode" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("diagnosa" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("template" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
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
  $('#id_sc_field_trancode' + iSeqRow).bind('blur', function() { sc_form_tbhasilrad_trancode_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_tbhasilrad_trancode_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbhasilrad_trancode_onfocus(this, iSeqRow) });
  $('#id_sc_field_hasil' + iSeqRow).bind('blur', function() { sc_form_tbhasilrad_hasil_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbhasilrad_hasil_onfocus(this, iSeqRow) });
  $('#id_sc_field_radcode' + iSeqRow).bind('blur', function() { sc_form_tbhasilrad_radcode_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbhasilrad_radcode_onfocus(this, iSeqRow) });
  $('#id_sc_field_attachment' + iSeqRow).bind('blur', function() { sc_form_tbhasilrad_attachment_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbhasilrad_attachment_onfocus(this, iSeqRow) });
  $('#id_sc_field_struk' + iSeqRow).bind('blur', function() { sc_form_tbhasilrad_struk_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbhasilrad_struk_onfocus(this, iSeqRow) });
  $('#id_sc_field_attachment2' + iSeqRow).bind('blur', function() { sc_form_tbhasilrad_attachment2_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbhasilrad_attachment2_onfocus(this, iSeqRow) });
  $('#id_sc_field_attachment3' + iSeqRow).bind('blur', function() { sc_form_tbhasilrad_attachment3_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbhasilrad_attachment3_onfocus(this, iSeqRow) });
  $('#id_sc_field_dicom' + iSeqRow).bind('blur', function() { sc_form_tbhasilrad_dicom_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_tbhasilrad_dicom_onfocus(this, iSeqRow) });
  $('#id_sc_field_diagnosa' + iSeqRow).bind('blur', function() { sc_form_tbhasilrad_diagnosa_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbhasilrad_diagnosa_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_0' + iSeqRow).bind('blur', function() { sc_form_tbhasilrad_sc_field_0_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbhasilrad_sc_field_0_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_1' + iSeqRow).bind('blur', function() { sc_form_tbhasilrad_sc_field_1_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbhasilrad_sc_field_1_onfocus(this, iSeqRow) });
  $('#id_sc_field_template' + iSeqRow).bind('blur', function() { sc_form_tbhasilrad_template_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_tbhasilrad_template_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_tbhasilrad_template_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbhasilrad_trancode_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhasilrad_validate_trancode();
  scCssBlur(oThis);
}

function sc_form_tbhasilrad_trancode_onchange(oThis, iSeqRow) {
  do_ajax_form_tbhasilrad_refresh_trancode();
}

function sc_form_tbhasilrad_trancode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhasilrad_hasil_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhasilrad_validate_hasil();
  scCssBlur(oThis);
}

function sc_form_tbhasilrad_hasil_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhasilrad_radcode_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhasilrad_validate_radcode();
  scCssBlur(oThis);
}

function sc_form_tbhasilrad_radcode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhasilrad_attachment_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_tbhasilrad_attachment_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_tbhasilrad_struk_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhasilrad_validate_struk();
  scCssBlur(oThis);
}

function sc_form_tbhasilrad_struk_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhasilrad_attachment2_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_tbhasilrad_attachment2_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_tbhasilrad_attachment3_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_tbhasilrad_attachment3_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_tbhasilrad_dicom_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_tbhasilrad_dicom_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_tbhasilrad_diagnosa_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhasilrad_validate_diagnosa();
  scCssBlur(oThis);
}

function sc_form_tbhasilrad_diagnosa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhasilrad_sc_field_0_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhasilrad_validate_sc_field_0();
  scCssBlur(oThis);
}

function sc_form_tbhasilrad_sc_field_0_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhasilrad_sc_field_1_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhasilrad_validate_sc_field_1();
  scCssBlur(oThis);
}

function sc_form_tbhasilrad_sc_field_1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbhasilrad_template_onblur(oThis, iSeqRow) {
  do_ajax_form_tbhasilrad_validate_template();
  scCssBlur(oThis);
}

function sc_form_tbhasilrad_template_onchange(oThis, iSeqRow) {
  do_ajax_form_tbhasilrad_event_template_onchange();
}

function sc_form_tbhasilrad_template_onfocus(oThis, iSeqRow) {
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
	displayChange_field("dicom", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("hasil", "", status);
	displayChange_field("struk", "", status);
	displayChange_field("template", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("attachment", "", status);
	displayChange_field("attachment2", "", status);
	displayChange_field("attachment3", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("trancode", "", status);
	displayChange_field("sc_field_1", "", status);
	displayChange_field("diagnosa", "", status);
	displayChange_field("sc_field_0", "", status);
	displayChange_field("radcode", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_dicom(row, status);
	displayChange_field_hasil(row, status);
	displayChange_field_struk(row, status);
	displayChange_field_template(row, status);
	displayChange_field_attachment(row, status);
	displayChange_field_attachment2(row, status);
	displayChange_field_attachment3(row, status);
	displayChange_field_trancode(row, status);
	displayChange_field_sc_field_1(row, status);
	displayChange_field_diagnosa(row, status);
	displayChange_field_sc_field_0(row, status);
	displayChange_field_radcode(row, status);
}

function displayChange_field(field, row, status) {
	if ("dicom" == field) {
		displayChange_field_dicom(row, status);
	}
	if ("hasil" == field) {
		displayChange_field_hasil(row, status);
	}
	if ("struk" == field) {
		displayChange_field_struk(row, status);
	}
	if ("template" == field) {
		displayChange_field_template(row, status);
	}
	if ("attachment" == field) {
		displayChange_field_attachment(row, status);
	}
	if ("attachment2" == field) {
		displayChange_field_attachment2(row, status);
	}
	if ("attachment3" == field) {
		displayChange_field_attachment3(row, status);
	}
	if ("trancode" == field) {
		displayChange_field_trancode(row, status);
	}
	if ("sc_field_1" == field) {
		displayChange_field_sc_field_1(row, status);
	}
	if ("diagnosa" == field) {
		displayChange_field_diagnosa(row, status);
	}
	if ("sc_field_0" == field) {
		displayChange_field_sc_field_0(row, status);
	}
	if ("radcode" == field) {
		displayChange_field_radcode(row, status);
	}
}

function displayChange_field_dicom(row, status) {
}

function displayChange_field_hasil(row, status) {
}

function displayChange_field_struk(row, status) {
}

function displayChange_field_template(row, status) {
}

function displayChange_field_attachment(row, status) {
}

function displayChange_field_attachment2(row, status) {
}

function displayChange_field_attachment3(row, status) {
}

function displayChange_field_trancode(row, status) {
}

function displayChange_field_sc_field_1(row, status) {
}

function displayChange_field_diagnosa(row, status) {
}

function displayChange_field_sc_field_0(row, status) {
}

function displayChange_field_radcode(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbhasilrad_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(23);
		}
	}
}
                var scJQHtmlEditorData = (function() {
                    var data = {};
                    function scJQHtmlEditorData(a, b) {
                        if (a) {
                            if (typeof(a) === typeof({})) {
                                for (var d in a) {
                                    if (a.hasOwnProperty(d)) {
                                        data[d] = a[d];
                                    }
                                }
                            } else if ((typeof(a) === typeof('')) || (typeof(a) === typeof(1))) {
                                if (b) {
                                    data[a] = b;
                                } else {
                                    if (typeof(a) === typeof('')) {
                                        var v = data;
                                        a = a.split('.');
                                        a.forEach(function (r) {
                                            v = v[r];
                                        });
                                        return v;
                                    }
                                    return data[a];
                                }
                            }
                        }
                        return data;
                    }
                    return scJQHtmlEditorData;
                }());
 function scJQHtmlEditorAdd(iSeqRow) {
<?php
$sLangTest = '';
if(is_file('../_lib/lang/arr_langs_tinymce.php'))
{
    include('../_lib/lang/arr_langs_tinymce.php');
    if(isset($Nm_arr_lang_tinymce[ $this->Ini->str_lang ]))
    {
        $sLangTest = $Nm_arr_lang_tinymce[ $this->Ini->str_lang ];
    }
}
if(empty($sLangTest))
{
    $sLangTest = 'en_GB';
}
?>
 var baseData = {
  mode: "textareas",
  theme: "modern",
  browser_spellcheck : true,
  paste_data_images : true,
<?php
if ('novo' != $this->nmgp_opcao && isset($this->nmgp_cmp_readonly['hasil']) && $this->nmgp_cmp_readonly['hasil'] == 'on')
{
    unset($this->nmgp_cmp_readonly['hasil']);
?>
   readonly: "true",
<?php
}
else 
{
?>
   readonly: "",
<?php
}
?>
<?php
if ('yyyymmdd' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%Y{$_SESSION['scriptcase']['reg_conf']['date_sep']}%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%d";
}
elseif ('mmddyyyy' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%d{$_SESSION['scriptcase']['reg_conf']['date_sep']}%Y";
}
elseif ('ddmmyyyy' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%d{$_SESSION['scriptcase']['reg_conf']['date_sep']}%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%Y";
}
else {
    $tinymceDateFormat = "%D";
}
?>
  insertdatetime_formats: ["%H:%M:%S", "%Y-%m-%d", "%I:%M:%S %p", "<?php echo $tinymceDateFormat ?>"],
  relative_urls : false,
  remove_script_host : false,
  convert_urls  : true,
  language : '<?php echo $sLangTest; ?>',
  plugins : 'advlist,autolink,link,image,lists,charmap,print,preview,hr,anchor,pagebreak,searchreplace,wordcount,visualblocks,visualchars,code,fullscreen,insertdatetime,media,nonbreaking,table,directionality,emoticons,template,textcolor,paste,textcolor,colorpicker,textpattern,contextmenu',
  toolbar1: "undo,redo,separator,formatselect,separator,bold,italic,separator,alignleft,aligncenter,alignright,alignjustify,separator,bullist,numlist,outdent,indent,separator,link,image",
  statusbar : false,
  menubar : 'file edit insert view format table tools',
  toolbar_items_size: 'small',
  content_style: ".mce-container-body {text-align: center !important}",
  editor_selector: "mceEditor_hasil" + iSeqRow,
  setup: function(ed) {
    ed.on("init", function (e) {
      if ($('textarea[name="hasil' + iSeqRow + '"]').prop('disabled') == true) {
        ed.setMode("readonly");
      }
    });
  }
 };
 var data = 'function' === typeof Object.assign ? Object.assign({}, scJQHtmlEditorData(baseData)) : baseData;
 tinyMCE.init(data);
} // scJQHtmlEditorAdd

function scJQUploadAdd(iSeqRow) {
  $("#id_sc_field_dicom" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_tbhasilrad_ul_save.php",
    dropZone: "",
    formData: function() {
      return [
        {name: 'param_field', value: 'dicom'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_dicom" + iSeqRow);
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_dicom" + iSeqRow);
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
        $("#id_img_loader_dicom" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_dicom" + iSeqRow).hide();
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
      $("#id_sc_field_dicom" + iSeqRow).val("");
      $("#id_sc_field_dicom_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_dicom_ul_type" + iSeqRow).val(fileData[0].type);
      $("#id_ajax_doc_dicom" + iSeqRow).html(fileData[0].name);
      $("#id_ajax_doc_dicom" + iSeqRow).css("display", "");
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_dicom" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_dicom" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

  $("#id_sc_field_attachment" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_tbhasilrad_ul_save.php",
    dropZone: "",
    formData: function() {
      return [
        {name: 'param_field', value: 'attachment'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_attachment" + iSeqRow);
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_attachment" + iSeqRow);
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
        $("#id_img_loader_attachment" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_attachment" + iSeqRow).hide();
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
      $("#id_sc_field_attachment" + iSeqRow).val("");
      $("#id_sc_field_attachment_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_attachment_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_attachment = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_attachment) ? "none" : "";
      $("#id_ajax_img_attachment" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_attachment" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_attachment) {
        document.F1.temp_out_attachment.value = var_ajax_img_thumb;
        document.F1.temp_out1_attachment.value = var_ajax_img_attachment;
      }
      else if (document.F1.temp_out_attachment) {
        document.F1.temp_out_attachment.value = var_ajax_img_attachment;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_attachment" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_attachment" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_attachment" + iSeqRow).css("display", "none");
      $("#id_ajax_link_attachment" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

  $("#id_sc_field_attachment2" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_tbhasilrad_ul_save.php",
    dropZone: "",
    formData: function() {
      return [
        {name: 'param_field', value: 'attachment2'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_attachment2" + iSeqRow);
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_attachment2" + iSeqRow);
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
        $("#id_img_loader_attachment2" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_attachment2" + iSeqRow).hide();
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
      $("#id_sc_field_attachment2" + iSeqRow).val("");
      $("#id_sc_field_attachment2_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_attachment2_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_attachment2 = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_attachment2) ? "none" : "";
      $("#id_ajax_img_attachment2" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_attachment2" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_attachment2) {
        document.F1.temp_out_attachment2.value = var_ajax_img_thumb;
        document.F1.temp_out1_attachment2.value = var_ajax_img_attachment2;
      }
      else if (document.F1.temp_out_attachment2) {
        document.F1.temp_out_attachment2.value = var_ajax_img_attachment2;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_attachment2" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_attachment2" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_attachment2" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_attachment2" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

  $("#id_sc_field_attachment3" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_tbhasilrad_ul_save.php",
    dropZone: "",
    formData: function() {
      return [
        {name: 'param_field', value: 'attachment3'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_attachment3" + iSeqRow);
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_attachment3" + iSeqRow);
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
        $("#id_img_loader_attachment3" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_attachment3" + iSeqRow).hide();
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
      $("#id_sc_field_attachment3" + iSeqRow).val("");
      $("#id_sc_field_attachment3_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_attachment3_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_attachment3 = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_attachment3) ? "none" : "";
      $("#id_ajax_img_attachment3" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_attachment3" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_attachment3) {
        document.F1.temp_out_attachment3.value = var_ajax_img_thumb;
        document.F1.temp_out1_attachment3.value = var_ajax_img_attachment3;
      }
      else if (document.F1.temp_out_attachment3) {
        document.F1.temp_out_attachment3.value = var_ajax_img_attachment3;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_attachment3" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_attachment3" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_attachment3" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_attachment3" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

} // scJQUploadAdd

function scJQSelect2Add(seqRow, specificField) {
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQHtmlEditorAdd(iLine);
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
} // scJQElementsAdd

