
// ---------- delete_filter
function ajax_delete_filter(parm)
{
    nmAjaxProcOn();
    $.ajax({
      type: "POST",
      url: "index.php",
      data: "nmgp_opcao=ajax_filter_delete&script_case_init=" + document.F1.script_case_init.value + "&script_case_session=" + document.F1.script_case_session.value + "&NM_filters_del=" + parm
     })
     .done(function(json_del_fil) {
        var i, oResp;
        Tst_integrid = json_del_fil.trim();
        if ("{" != Tst_integrid.substr(0, 1)) {
            nmAjaxProcOff();
            alert (json_del_fil);
            return;
        }
        eval("oResp = " + json_del_fil);
        if (oResp["ss_time_out"]) {
            nmAjaxProcOff();
            nm_move();
        }
        if (oResp["setValue"]) {
          for (i = 0; i < oResp["setValue"].length; i++) {
               $("#" + oResp["setValue"][i]["field"]).html(oResp["setValue"][i]["value"]);
          }
        }
        nmAjaxProcOff();
        var deleteFilterEvent = new Event('updatefilter');
        document.dispatchEvent(deleteFilterEvent);
    });
}

// ---------- save_filter
function ajax_save_filter(save_name, save_opt, parm, pos)
{
    nmAjaxProcOn();
    $.ajax({
      type: "POST",
      url: "index.php",
      data: "nmgp_opcao=ajax_filter_save&script_case_init=" + document.F1.script_case_init.value + "&script_case_session=" + document.F1.script_case_session.value + "&nmgp_save_name=" + save_name + "&nmgp_save_option=" + save_opt + "&NM_filters_save=" + parm
     })
     .done(function(json_save_fil) {
        var i, oResp;
        Tst_integrid = json_save_fil.trim();
        if ("{" != Tst_integrid.substr(0, 1)) {
            nmAjaxProcOff();
            alert (json_save_fil);
            return;
        }
        eval("oResp = " + json_save_fil);
        if (oResp["ss_time_out"]) {
            nmAjaxProcOff();
            nm_move();
        }
        if (oResp["setValue"]) {
          for (i = 0; i < oResp["setValue"].length; i++) {
               $("#" + oResp["setValue"][i]["field"]).html(oResp["setValue"][i]["value"]);
          }
        }
        if (oResp["htmOutput"]) {
            nmAjaxShowDebug(oResp);
         }
        document.getElementById('sel_recup_filters_' + pos).selectedIndex = -1;
        document.getElementById('sel_filters_del_' + pos).selectedIndex = -1;
        document.getElementById('SC_nmgp_save_name_' + pos).value = '';
        document.getElementById('Apaga_filters_' + pos).style.display = '';
        document.getElementById('sel_recup_filters_' + pos).style.display = '';
        document.getElementById('Salvar_filters_' + pos).style.display = 'none';
        nmAjaxProcOff();
        var saveFilterEvent = new Event('updatefilter');
        document.dispatchEvent(saveFilterEvent);
    });
}

// ---------- select_filter
var Table_sv_fil = new Array();
Table_sv_fil[0] = "address";
Table_sv_fil[1] = "instcode";
Table_sv_fil[2] = "init";
Table_sv_fil[3] = "name";
Table_sv_fil[4] = "city";
Table_sv_fil[5] = "phone";
Table_sv_fil[6] = "fax";
Table_sv_fil[7] = "cp";
Table_sv_fil[8] = "limit";
Table_sv_fil[9] = "discount";
Table_sv_fil[10] = "sc_field_0";
Table_sv_fil[11] = "sc_field_1";
Table_sv_fil[12] = "policy";
Table_sv_fil[13] = "itemtype";
Table_sv_fil[14] = "deleted";
Table_sv_fil[15] = "tempo";
Table_sv_fil[16] = "asuransi";
Table_sv_fil[17] = "marginobat";
Table_sv_fil[18] = "markuptindakan";
Table_sv_fil[19] = "markupobat";
Table_sv_fil[20] = "markuplab";
Table_sv_fil[21] = "markuprad";
Table_sv_fil[22] = "admpolitype";
Table_sv_fil[23] = "adminaptype";
Table_sv_fil[24] = "admpolibaru";
Table_sv_fil[25] = "admpolilama";
Table_sv_fil[26] = "adminap";
Table_sv_fil[27] = "sc_field_2";
Table_sv_fil[28] = "marginpma";
Table_sv_fil[29] = "withpma";
Table_sv_fil[30] = "forminternal";
Table_sv_fil[31] = "vacc";
Table_sv_fil[32] = "extcode";
Table_sv_fil[33] = "umum";
Table_sv_fil[34] = "autoshow";
Table_sv_fil[35] = "bpjs";
Table_sv_fil[36] = "caracode";
function ajax_select_filter(parm)
{
    nmAjaxProcOn();
    $.ajax({
      type: "POST", async:false,
      url: "index.php",
      data: "nmgp_opcao=ajax_filter_select&script_case_init=" + document.F1.script_case_init.value + "&script_case_session=" + document.F1.script_case_session.value + "&NM_filters=" + parm
     })
     .done(function(json_sel_fil) {
        var i, oResp;
        Tst_integrid = json_sel_fil.trim();
        if ("{" != Tst_integrid.substr(0, 1)) {
            nmAjaxProcOff();
            alert (json_sel_fil);
            return;
        }
        eval("oResp = " + json_sel_fil);
        if (oResp["ss_time_out"]) {
            nmAjaxProcOff();
            nm_move();
        }
        if (oResp["set_val"]) {
          for (i = 0; i < oResp["set_val"].length; i++) {
               $("#" + oResp["set_val"][i]["field"]).val(oResp["set_val"][i]["value"]);
          }
        }
        if (oResp["set_html"]) {
          for (i = 0; i < oResp["set_html"].length; i++) {
               $("#" + oResp["set_html"][i]["field"]).html(oResp["set_html"][i]["value"]);
          }
        }
        if (oResp["setVar"]) {
          for (i = 0; i < oResp["setVar"].length; i++) {
               eval (oResp["setVar"][i]["var"] + ' = \"' + oResp["setVar"][i]["value"] + '\"');
          }
        }
        if (oResp["set_radio"]) {
          for (i = 0; i < oResp["set_radio"].length; i++) {
               if ($("#" + oResp["set_radio"][i]["field"])) {
                   $("#" + oResp["set_radio"][i]["field"]).removeAttr('checked');
                   $('input[id="' + oResp["set_radio"][i]["field"] + '"][value="' + oResp["set_radio"][i]["value"] + '"]').prop('checked', true);
              }
          }
        }
        if (oResp["set_checkbox"]) {
          for (i = 0; i < oResp["set_checkbox"].length; i++) {
              var cmp_ck = oResp["set_checkbox"][i]["field"].substr(3) + "[]";
              if (document.F1.elements[cmp_ck]) {
                  var obj_check = document.F1.elements[cmp_ck];
                  if (obj_check.length == undefined) {
                      document.F1.elements[cmp_ck].checked = false;
                      for (y = 0; y < oResp["set_checkbox"][i]["value"].length; y++) {
                          if (document.F1.elements[cmp_ck].value == oResp["set_checkbox"][i]["value"][y]) {
                              document.F1.elements[cmp_ck].checked = true;
                          }
                      }
                  }
                  if (obj_check.length != undefined) {
                      for (x = 0; x < obj_check.length; x++) {
                          obj_check[x].checked = false;
                      }
                      for (x = 0; x < obj_check.length; x++) {
                          for (y = 0; y < oResp["set_checkbox"][i]["value"].length; y++) {
                              if (obj_check[x].value == oResp["set_checkbox"][i]["value"][y]) {
                                  obj_check[x].checked = true;
                              }
                          }
                      }
                  }
              }
          }
        }
        if (oResp["set_selmult"]) {
          for (i = 0; i < oResp["set_selmult"].length; i++) {
             var obj_sel = document.getElementById(oResp["set_selmult"][i]["field"]);
             for (x = 0; x < obj_sel.length; x++) {
                 if (obj_sel[x].selected) {
                    obj_sel[x].selected = false;
                 }
             }
             for (x = 0; x < obj_sel.length; x++) {
                 for (y = 0; y < oResp["set_selmult"][i]["value"].length; y++) {
                     if (obj_sel[x].value == oResp["set_selmult"][i]["value"][y]) {
                         obj_sel[x].selected = true;
                     }
                 }
             }
          }
        }
        if (oResp["set_ddcheckbox"]) {
          for (i = 0; i < oResp["set_ddcheckbox"].length; i++) {
             var obj_sel = document.getElementById(oResp["set_ddcheckbox"][i]["field"]);
             var cmp_chk = oResp["set_ddcheckbox"][i]["field"].substring(3);
             $('#' + oResp["set_ddcheckbox"][i]["field"]).dropdownchecklist('destroy');
             $('#' + oResp["set_ddcheckbox"][i]["field"] + ' option').each(function() {
                $(this).attr('selected',false);
             });
             for (x = 0; x < obj_sel.length; x++) {
                 for (y = 0; y < oResp["set_ddcheckbox"][i]["value"].length; y++) {
                     if (obj_sel[x].value == oResp["set_ddcheckbox"][i]["value"][y]) {
                         obj_sel[x].selected = true;
                     }
                 }
             }
          }
          Sc_carga_ddcheckbox(cmp_chk);
        }
        if (oResp["set_dselect"]) {
          for (i = 0; i < oResp["set_dselect"].length; i++) {
              var obj_sel_orig = document.getElementById(oResp["set_dselect"][i]["field"] + "_orig");
              var obj_sel_dest = document.getElementById(oResp["set_dselect"][i]["field"] + "_dest");
              obj_sel_dest.length = 0
              for (x = 0; x < obj_sel_orig.length; x++) {
                     obj_sel_orig[x].disabled = false;
                     obj_sel_orig[x].style.color = "";
              }
              var ind = 0;
              for (y = 0; y < oResp["set_dselect"][i]["value"].length; y++) {
                 for (x = 0; x < obj_sel_orig.length; x++) {
                     if (obj_sel_orig[x].value == oResp["set_dselect"][i]["value"][y]["opt"]) {
                         obj_sel_orig[x].disabled = true;
                         obj_sel_orig[x].style.color = "#A0A0A0";
                         obj_sel_dest.options[ind] = new Option(oResp["set_dselect"][i]["value"][y]["value"], oResp["set_dselect"][i]["value"][y]["opt"]);
                         ind++;
                     }
                 }
             }
          }
        }
        if (oResp["set_select2_aut"]) {
          for (i = 0; i < oResp["set_select2_aut"].length; i++) {
               $("#" + oResp["set_select2_aut"][i]["field"]).val(null).trigger('change');
               var newOption = new Option(oResp["set_select2_aut"][i]["value"], oResp["set_select2_aut"][i]["value"], true, true);
               $("#" + oResp["set_select2_aut"][i]["field"]).append(newOption);
          }
        }
        if (oResp["set_fil_order"]) {
          for (i = 0; i < oResp["set_fil_order"].length; i++) {
              var obj_sel_orig = document.getElementById(oResp["set_fil_order"][i]["field"] + "_orig");
              var obj_sel_dest = document.getElementById(oResp["set_fil_order"][i]["field"] + "_dest");
              obj_sel_dest.length = 0
              for (x = 0; x < obj_sel_orig.length; x++) {
                     obj_sel_orig[x].disabled = false;
                     obj_sel_orig[x].style.color = "";
              }
              var ind = 0;
              for (y = 0; y < oResp["set_fil_order"][i]["value"].length; y++) {
                 for (x = 0; x < obj_sel_orig.length; x++) {
                     if (obj_sel_orig[x].value == oResp["set_fil_order"][i]["value"][y].substr(1)) {
                         obj_sel_orig[x].disabled = true;
                         obj_sel_orig[x].style.color = "#A0A0A0";
                         obj_sel_dest.options[ind] = new Option(oResp["set_fil_order"][i]["value"][y], oResp["set_fil_order"][i]["value"][y]);
                         ind++;
                     }
                 }
             }
          }
        }
        for (i = 0; i < Table_sv_fil.length; i++) {
           if (document.getElementById('id_vis_' + Table_sv_fil[i])) {
              if (search_get_sel_txt("SC_" + Table_sv_fil[i] + "_cond") == "bw") {
                 document.getElementById('id_vis_' + Table_sv_fil[i]).style.display ='';
              }
              else {
                 document.getElementById('id_vis_' + Table_sv_fil[i]).style.display ='none';
              }
           }
        }
        nmAjaxProcOff();
    });
}
