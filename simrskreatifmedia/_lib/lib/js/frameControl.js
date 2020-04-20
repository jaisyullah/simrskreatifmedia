__SC_topFrameRun = function __SC_topFrameRun(funcExecCall, args) {
    var pageRoot = __SC_findTopFrame(window, funcExecCall);

    if (typeof (pageRoot[funcExecCall]) === 'function') {
        var a;
        if (!args) {
            a = [];
        } else {
            a = (typeof (args) === typeof ([]) && args.length !== undefined)  ? args : [args];
        }
        return pageRoot[funcExecCall].apply(window, a);
    } else {
        return false;
    }
};

__SC_topFrameCreateFunc = function __SC_topFrameCreateFunc(funcExecName, funcExecCall, args) {
    var pageRoot = __SC_findTopFrame(window, '__SC_topFrameCreateFunc');

    if (typeof (pageRoot[funcExecName]) !== 'function') {
        pageRoot[funcExecName] = funcExecCall;
    }
    var a;
    if (!args) {
        a = [];
    } else {
        a = (typeof (args) === typeof ([]) && args.length !== undefined)  ? args : [args];
    }
    return pageRoot[funcExecName].apply(window, a);
};

__SC_topFrameCreateAll = function __SC_topFrameCreateAll(funcExecName, funcExecCall, insertStyle, insertDOM, args) {
    var pageRoot = __SC_findTopFrame(window, '__SC_topFrameCreateAll');

    if (typeof (pageRoot[funcExecName]) !== 'function') {
        pageRoot[funcExecName] = funcExecCall;
    }
    var a;
    if (!args) {
        a = [];
    } else {
        a = (typeof (args) === typeof ([]) && args.length !== undefined)  ? args : [args];
    }
    return pageRoot[funcExecName].apply(window, a);
};


__SC_findTopFrame = function __SC_findTopFrame(currentWindow, functionSearch) {
    var pageRoot = currentWindow;

    while (pageRoot.parent !== pageRoot) {
        if (typeof (pageRoot.parent[functionSearch]) === 'function') {
            pageRoot = pageRoot.parent;
        } else {
            break;
        }
    }

    return pageRoot;
};

$(document).ready( function () {
    if (typeof (window.scJs_alert_sweetalert) !== 'function') {
        window.scJs_alert_sweetalert = function (message, callbackOk, params) {
            var sweetAlertConfig;

            if (null == params) {
                params = {};
            }

            params['html'] = message;

            sweetAlertConfig = params;

            Swal.fire(sweetAlertConfig).then(function (result) {
                if (result.value) {
                    if (typeof callbackOk == "function") {
                        callbackOk();
                    }
                }
                else if (result.dismiss == Swal.DismissReason.timer) {
                    $(".swal2-container").hide();
                }
            });
        }
    }

    if (!window.__FRAMECONTROL_scJs_alert_sweetalert) { window.__FRAMECONTROL_scJs_alert_sweetalert = window.scJs_alert_sweetalert; }
    window.scJs_alert_sweetalert = function (a, b, c) {
        window.__SC_topFrameRun('__FRAMECONTROL_scJs_alert_sweetalert', [a, b, c]);
    };
});