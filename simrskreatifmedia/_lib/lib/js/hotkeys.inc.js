(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory() :
        typeof define === 'function' && define.amd ? define(factory) :
            (global.hotkeys = factory());
}(this, (function () { 'use strict';

    var isff = typeof navigator !== 'undefined' ? navigator.userAgent.toLowerCase().indexOf('firefox') > 0 : false;

    
    function addEvent(object, event, method) {
        if (object.addEventListener) {
            object.addEventListener(event, method, false);
        } else if (object.attachEvent) {
            object.attachEvent('on' + event, function () {
                method(window.event);
            });
        }
    }

    
    function getMods(modifier, key) {
        var mods = key.slice(0, key.length - 1);
        for (var i = 0; i < mods.length; i++) {
            mods[i] = modifier[mods[i].toLowerCase()];
        }return mods;
    }

    
    function getKeys(key) {
        if (!key) key = '';

        key = key.replace(/\s/g, ''); 
        var keys = key.split(','); 
        var index = keys.lastIndexOf('');

        
        for (; index >= 0;) {
            keys[index - 1] += ',';
            keys.splice(index, 1);
            index = keys.lastIndexOf('');
        }

        return keys;
    }

    
    function compareArray(a1, a2) {
        var arr1 = a1.length >= a2.length ? a1 : a2;
        var arr2 = a1.length >= a2.length ? a2 : a1;
        var isIndex = true;

        for (var i = 0; i < arr1.length; i++) {
            if (arr2.indexOf(arr1[i]) === -1) isIndex = false;
        }
        return isIndex;
    }

    var _keyMap = { 
        backspace: 8,
        tab: 9,
        clear: 12,
        enter: 13,
        return: 13,
        esc: 27,
        escape: 27,
        space: 32,
        left: 37,
        up: 38,
        right: 39,
        down: 40,
        del: 46,
        delete: 46,
        ins: 45,
        insert: 45,
        home: 36,
        end: 35,
        pageup: 33,
        pause: 19,
        pagedown: 34,
        capslock: 20,
        scrolllock: 145,
        numlock: 144,
        contextmenu: 93,
        '⇪': 20,
        ',': 188,
        '.': 190,
        '/': 191,
        '`': 192,
        '-': isff ? 173 : 189,
        '=': isff ? 61 : 187,
        ';': isff ? 59 : 186,
        '\'': 222,
        '[': 219,
        ']': 221,
        '\\': 220
    };

    var _modifier = { 
        '⇧': 16,
        shift: 16,
        '⌥': 18,
        altleft: 18,
        alt: 18,
        altright: 255,
        altgraph: 255,
        option: 18,
        '⌃': 17,
        ctrl: 17,
        control: 17,
        '⌘': isff ? 224 : 91,
        cmd: isff ? 224 : 91,
        command: isff ? 224 : 91
    };
    var _downKeys = []; 
    var modifierMap = {
        16: 'shiftKey',
        18: 'altKey',
        17: 'ctrlKey'
    };
    var _mods = { 16: false, 18: false, 17: false };
    var _handlers = {};

    
    for (var k = 1; k < 20; k++) {
        _keyMap['f' + k] = 111 + k;
    }

    
    modifierMap[isff ? 224 : 91] = 'metaKey';
    _mods[isff ? 224 : 91] = false;

    var _scope = 'all'; 
    var isBindElement = false; 

    
    var code = function code(x) {
        return _keyMap[x.toLowerCase()] || x.toUpperCase().charCodeAt(0);
    };

    
    function setScope(scope) {
        _scope = scope || 'all';
    }
    
    function getScope() {
        return _scope || 'all';
    }
    
    function getPressedKeyCodes() {
        return _downKeys.slice(0);
    }

    
    function filter(event) {
        var tagName = event.target.tagName || event.srcElement.tagName;
        
        return !(tagName === 'INPUT' || tagName === 'SELECT' || tagName === 'TEXTAREA');
    }

    
    function isPressed(keyCode) {
        if (typeof keyCode === 'string') {
            keyCode = code(keyCode); 
        }
        return _downKeys.indexOf(keyCode) !== -1;
    }

    
    function deleteScope(scope, newScope) {
        var handlers = void 0;
        var i = void 0;

        
        if (!scope) scope = getScope();

        for (var key in _handlers) {
            if (Object.prototype.hasOwnProperty.call(_handlers, key)) {
                handlers = _handlers[key];
                for (i = 0; i < handlers.length;) {
                    if (handlers[i].scope === scope) handlers.splice(i, 1);else i++;
                }
            }
        }

        
        if (getScope() === scope) setScope(newScope || 'all');
    }

    
    function clearModifier(event) {
        var key = event.keyCode || event.which || event.charCode;
        var i = _downKeys.indexOf(key);

        
        if (i >= 0) _downKeys.splice(i, 1);

        
        if (key === 224) key = 91;
        if (key in _mods) {
            _mods[key] = false;

            
            for (var k in _modifier) {
                if (_modifier[k] === key) hotkeys[k] = false;
            }
        }
    }

    
    function unbind(key, scope) {
        var multipleKeys = getKeys(key);
        var keys = void 0;
        var mods = [];
        var obj = void 0;

        for (var i = 0; i < multipleKeys.length; i++) {
            
            keys = multipleKeys[i].split('+');

            
            if (keys.length > 1) mods = getMods(_modifier, keys);

            
            key = keys[keys.length - 1];
            key = key === '*' ? '*' : code(key);

            
            if (!scope) scope = getScope();

            
            if (!_handlers[key]) return;

            
            
            for (var r = 0; r < _handlers[key].length; r++) {
                obj = _handlers[key][r];
                
                if (obj.scope === scope && compareArray(obj.mods, mods)) {
                    _handlers[key][r] = {};
                }
            }
        }
    }

    
    function eventHandler(event, handler, scope) {
        var modifiersMatch = void 0;

        
        if (handler.scope === scope || handler.scope === 'all') {
            
            modifiersMatch = handler.mods.length > 0;

            for (var y in _mods) {
                if (Object.prototype.hasOwnProperty.call(_mods, y)) {
                    if (!_mods[y] && handler.mods.indexOf(+y) > -1 || _mods[y] && handler.mods.indexOf(+y) === -1) modifiersMatch = false;
                }
            }

            
            if (handler.mods.length === 0 && !_mods[16] && !_mods[18] && !_mods[17] && !_mods[91] || modifiersMatch || handler.shortcut === '*') {
                if (handler.method(event, handler) === false) {
                    if (event.preventDefault) event.preventDefault();else event.returnValue = false;
                    if (event.stopPropagation) event.stopPropagation();
                    if (event.cancelBubble) event.cancelBubble = true;
                }
            }
        }
    }

    
    function dispatch(event) {
        var asterisk = _handlers['*'];
        var key = event.keyCode || event.which || event.charCode;

        
        if (_downKeys.indexOf(key) === -1) _downKeys.push(key);

        
        
        if (key === 224) key = 91;

        if (key in _mods) {
            _mods[key] = true;

            
            for (var k in _modifier) {
                if (_modifier[k] === key) hotkeys[k] = true;
            }

            if (!asterisk) return;
        }

        
        for (var e in _mods) {
            if (Object.prototype.hasOwnProperty.call(_mods, e)) {
                _mods[e] = event[modifierMap[e]];
            }
        }

        
        if (!hotkeys.filter.call(this, event)) return;

        
        var scope = getScope();

        
        if (asterisk) {
            for (var i = 0; i < asterisk.length; i++) {
                if (asterisk[i].scope === scope) eventHandler(event, asterisk[i], scope);
            }
        }
        
        if (!(key in _handlers)) return;

        for (var _i = 0; _i < _handlers[key].length; _i++) {
            
            eventHandler(event, _handlers[key][_i], scope);
        }
    }

    function hotkeys(key, option, method) {
        var keys = getKeys(key); 
        var mods = [];
        var scope = 'all'; 
        var element = document; 
        var i = 0;

        
        if (method === undefined && typeof option === 'function') {
            method = option;
        }

        if (Object.prototype.toString.call(option) === '[object Object]') {
            if (option.scope) scope = option.scope; 
            if (option.element) element = option.element; 
        }

        if (typeof option === 'string') scope = option;

        
        for (; i < keys.length; i++) {
            key = keys[i].split('+'); 
            mods = [];

            
            if (key.length > 1) mods = getMods(_modifier, key);

            
            key = key[key.length - 1];
            key = key === '*' ? '*' : code(key); 

            
            if (!(key in _handlers)) _handlers[key] = [];

            _handlers[key].push({
                scope: scope,
                mods: mods,
                shortcut: keys[i],
                method: method,
                key: keys[i]
            });
        }
        
        if (typeof element !== 'undefined' && !isBindElement) {
            isBindElement = true;
            addEvent(element, 'keydown', function (e) {
                dispatch(e);
            });
            addEvent(element, 'keyup', function (e) {
                clearModifier(e);
            });
        }
    }

    var _api = {
        setScope: setScope,
        getScope: getScope,
        deleteScope: deleteScope,
        getPressedKeyCodes: getPressedKeyCodes,
        isPressed: isPressed,
        filter: filter,
        unbind: unbind
    };
    for (var a in _api) {
        if (Object.prototype.hasOwnProperty.call(_api, a)) {
            hotkeys[a] = _api[a];
        }
    }

    if (typeof window !== 'undefined') {
        var _hotkeys = window.hotkeys;
        hotkeys.noConflict = function (deep) {
            if (deep && window.hotkeys === hotkeys) {
                window.hotkeys = _hotkeys;
            }
            return hotkeys;
        };
        window.hotkeys = hotkeys;
    }

    return hotkeys;

})));