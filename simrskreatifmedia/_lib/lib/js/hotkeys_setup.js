function execOnTopFrame(funcExecCall, args) {
    var pageRoot = window;

    if (pageRoot.parent !== pageRoot) {
        pageRoot = pageRoot.parent;
    } else {
        return true;
    }

    if (typeof (pageRoot[funcExecCall]) === 'function') {
        var a;
        if (!args) {
            a = [];
        } else {
            if (typeof (args) === typeof ([])) {
                a = args;
            } else {
                a = [args];
            }
        }
        return pageRoot[funcExecCall].apply(pageRoot, a);
    } else {
        return true;
    }
}

function hotkeyNotHere(e,h) {
    return execOnTopFrame('execHotKey', [e,h]);
}

function getHotkeyList() {
    return hotkeyList;
}

function updateHotkeyList() {
    hotkeyList = applicationKeys;
    // var parentKeyList = execOnTopFrame('getHotkeyList');
    // var frames = window.frames;
    // var i = 0;
    // if (typeof(parentKeyList) === typeof('') && parentKeyList !== '') {
    //     hotkeyList += parentKeyList;
    // }
    // for (i = 0; i < frames.length; i++) {
    //     frames[i].updateHotkeys();
    // }
    hotkeys.deleteScope('appScope');
    hotkeyHandlerSetup();
}

function hotkeyHandlerSetup() {
    var shortcuts = getHotkeyList();
    hotkeys.filter = function(event, a){
        if ( $('.blockUI:visible').length > 0 || $('#TB_overlay:visible').length > 0 ) {
            return false;
        } else {
            return true;
        }
    };
    hotkeys(shortcuts, 'appScope', function (e, h) {
        return execHotKey(e, h);
    });
    hotkeys.setScope('appScope');
}

document.addEventListener("DOMContentLoaded", function(event) {
    updateHotkeyList();
});