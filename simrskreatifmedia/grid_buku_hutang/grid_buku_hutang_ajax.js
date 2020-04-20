  function nmAjaxShowDebug(oTemp)
  {
    if (!document.getElementById("id_debug_window")) {
      return;
    }
    if (oTemp && oTemp != null) {
        oResp = oTemp;
    }
    if (oResp["htmOutput"] && "" != oResp["htmOutput"]) {
      document.getElementById("id_debug_window").style.display = "";
      document.getElementById("id_debug_text").innerHTML = nmAjaxFormatDebug(oResp["htmOutput"]) + document.getElementById("id_debug_text").innerHTML;
      nmCenterElement(document.getElementById("id_debug_window"));
    }
  }
  function nmAjaxFormatDebug(sDebugMsg)
  {
    return "<table class=\"scFormMessageTable\" style=\"margin: 1px; width: 100%\"><tr><td class=\"scFormMessageMessage\">" + nmAjaxSpecCharParser(sDebugMsg) + "</td></tr></table>";
  }
  function nmAjaxHideDebug()
  {
    if (document.getElementById("id_debug_window")) {
      document.getElementById("id_debug_window").style.display = "none";
      document.getElementById("id_debug_text").innerHTML = "";
    }
  }
  function nmCenterElement(oElem)
  {
    var $oElem    = $(oElem),
        $oWindow  = $(this),
        x         = Math.round(($oWindow.height() - $oElem.height()) / 2),
        iElemTop  = document.documentElement.scrollTop + x,
        iElemLeft = Math.round(($oWindow.width()  - $oElem.width())  / 2);
    $oElem.offset({top: iElemTop, left: iElemLeft});
  }
  function nmAjaxShowAutocomp(sFrameId)
  {
    if (document.getElementById("id_ac_frame_" + sFrameId)) {
      document.getElementById("id_ac_frame_" + sFrameId).style.display = "";
      document.getElementById("id_ac_" + sFrameId).focus();
    }
  }
  function nmAjaxHideAutocomp(sFrameId)
  {
    if (document.getElementById("id_ac_frame_" + sFrameId)) {
      document.getElementById("id_ac_frame_" + sFrameId).style.display = "none";
    }
  }
var NM_index = 0;
var NM_hidden = new Array();
var NM_IE = (navigator.userAgent.indexOf('MSIE') > -1) ? 1 : 0;
function NM_hitTest(o, l)
{
    function getOffset(o){
        for(var r = {l: o.offsetLeft, t: o.offsetTop, r: o.offsetWidth, b: o.offsetHeight};
            o = o.offsetParent; r.l += o.offsetLeft, r.t += o.offsetTop);
        return r.r += r.l, r.b += r.t, r;
    }
    for(var b, s, r = [], a = getOffset(o), j = isNaN(l.length), i = (j ? l = [l] : l).length; i;
        b = getOffset(l[--i]), (a.l == b.l || (a.l > b.l ? a.l <= b.r : b.l <= a.r))
        && (a.t == b.t || (a.t > b.t ? a.t <= b.b : b.t <= a.b)) && (r[r.length] = l[i]));
    return j ? !!r.length : r;
}
var tem_obj = false;
function NM_show_menu(nn)
{
    if (!NM_IE)
    {
         return;
    }
    x = document.getElementById(nn);
    x.style.display = "block";
    obj_sel = document.body;
    tem_obj = true;
    x.ieFix = NM_hitTest(x, obj_sel.getElementsByTagName("select"));
    for (i = 0; i <  x.ieFix.length; i++)
    {
      if (x.ieFix[i].style.visibility != "hidden")
      {
          x.ieFix[i].style.visibility = "hidden";
          NM_hidden[NM_index] = x.ieFix[i];
          NM_index++;
      }
    }
}
function NM_hide_menu()
{
    if (!NM_IE)
    {
         return;
    }
    obj_del = document.body;
    if (tem_obj && obj_del == obj_sel)
    {
        for(var i = NM_hidden.length; i; NM_hidden[--i].style.visibility = "visible");
    }
    NM_index = 0;
    NM_hidden = new Array();
}
  function nmAjaxSpecCharParser(sParseString)
  {
    var ta = document.createElement("textarea");
    ta.innerHTML = sParseString.replace(/</g, "&lt;").replace(/>/g, "&gt;");
    return ta.value;
  } 
  function nmAjaxProcOn()
  {
    if (document.getElementById("id_div_process")) {
      if ($ && $.blockUI) {
        $.blockUI({
          message: $("#id_div_process_block"),
          overlayCSS: { backgroundColor: sc_ajaxBg },
          css: {
            borderColor: sc_ajaxBordC,
            borderStyle: sc_ajaxBordS,
            borderWidth: sc_ajaxBordW
          }
        });
      }
      else {
        document.getElementById("id_div_process").style.display = "";
        document.getElementById("id_fatal_error").style.display = "none";
      }
    }
  }
  function nmAjaxProcOff()
  {
    if (document.getElementById("id_div_process")) {
      if ($ && $.unblockUI) {
        $.unblockUI();
      }
      else {
        document.getElementById("id_div_process").style.display = "none";
      }
    }
  }
