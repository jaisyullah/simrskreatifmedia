// Title: COOLjsMenu
// URL: http://javascript.cooldev.com/scripts/coolmenu/
// Version: 2.9.4g
// Last Modify: 11 Apr 2007
// Author: Alex Kunin <alx@cooldev.com>
// Notes: Registration needed to use this script on your web site.
// Copyright (c) 2001-2006 by CoolDev.Com
// Copyright (c) 2001-2006 by Sergey Nosenko

// Options: PROFESSIONAL



function _isFunction(_value)
{
        return typeof _value == 'function';
}

function _isUndefined(_value)
{
        return typeof _value == 'undefined';
}

function _isNumber(_value)
{
        return typeof _value == 'number';
}

function _isObject(_value)
{
        return typeof _value == 'object';
}

function _isInstanceOf(_value, _class)
{
        return _value && _value.constructor == _class;
}

function _isArray(_value)
{
        return _isInstanceOf(_value, Array);
}

Array.prototype._push = Array.prototype.push || function (_value)
{
    this[this.length] = _value;
    return this.length;
};

Array.prototype._splice = Array.prototype.splice || function (_index, _count)
{
    _index = Math.max(0, Math.min(this.length, _index));
    var _arguments = [].concat(arguments);
    var _new = [].concat(arguments).slice(2).concat(this.slice(_index + _count));
    var _result = this.slice(_index, _count);
    this.length = _index;
    for (var i = 0; i < _new.length; i++)
    {
        this._push(_new[i]);
    }

    return _result;
};

function _registerInstance(_instance, _group)
{
    var o = window.$instances || (window.$instances = []);

    if (_group)
    {
        if (!o[_group])
        {
            o[_group] = [];
        }
        o[_group]._push(_instance);
    }

    return '$instances[' + (o._push(_instance) - 1) + ']';
}

function _getInstances(_group, _except)
{
    var _result = [].concat(window.$instances && window.$instances[_group] || []);

    if (_except)
    {
        for (var i = 0; i < _result.length; i++)
        {
            if (_result[i] == _except)
            {
                _result._splice(i, 1);
                break;
            }
        }
    }

    return _result;
}

function _addEventListener(_instance, _type, _listener)
{
    if (_instance.addEventListener)
    {
        _instance.addEventListener(_type, _listener, false);
    }
    else
    {
        var _previousListener = _instance['on' + _type];
        _instance['on' + _type] = function (_event)
        {
            if (!_event)
            {
                _event = window.event;
            }

            _listener(_event);

            return _previousListener ? _previousListener(_event) : true;
        };
    }
}

function _LargeString(_initialValue)
{
    this._pieces = [ _initialValue ];
}

_LargeString._expandTemplate = function (_template, _parameters)
{
    return new _LargeString()._expandTemplate(_template, _parameters);
};

_LargeString._compileTemplate = function (_string)
{
    var _result = [], _pos1 = 0;

    while ((_pos1 = _string.indexOf('{', _pos1)) != -1 && (_pos2 = _string.indexOf('}', _pos1)))
    {
        var _name = _string.slice(_pos1 + 1, _pos2);

        if (_name.match(/^\w+$/))
        {
            _result._push(_string.slice(0, _pos1));
            _result._push(_name);
            _string = _string.slice(_pos2 + 1);
            _pos1 = 0;
        }
        else
        {
            _pos1++;
        }
    }

    _result._push(_string);

    return _result;
};

_LargeString.prototype =
{

    _append:function (_string)
    {
        this._pieces._push(_string);
        return this;
    },

    _expandTemplate:function (_template, _parameters)
    {
        for (var i = 0; i < _template.length; i += 2)
        {
            this._pieces._push(_template[i]);
            this._pieces._push(_parameters[_template[i + 1]]);
        }

        return this;
    },

    toString:function ()
    {
        return this._pieces.join('');
    }

};

function _EventManager(_host)
{
    this._host = _host;
    this._listeners = { focus:[], blur:[], keydown:[], mouseover:[], mouseout:[], click:[] };
    this._jsPath = _registerInstance(this);
    this._jsTemplate = _LargeString._compileTemplate('return ' + this._jsPath + '.$dispatch(\'{type}\',window.event||arguments[0],{arg})');
    this._htmlTemplate = _LargeString._compileTemplate(' on{type}="' + this._generateJsCode('{type}', '{arg}') + '"');
}

_EventManager.prototype =
{

    _search:function (_array, _value)
    {
        for (var i = 0; i < _array.length; i++)
        {
            if (_array[i] == _value)
            {
                return i;
            }
        }

        return -1;
    },

    _getListeners:function (_type)
    {
        if (!this._listeners[_type])
        {
            this._listeners[_type] = [];
            this._listeners[_type]._custom = true;
        }

        return this._listeners[_type];
    },

    _addListener:function (_type, _listener)
    {
        if (_isArray(_type))
        {
            for (var i = 0; i < _type.length; i++)
            {
                this._addListener(_type[i], _listener);
            }
        }
        else if (this._search(this._getListeners(_type), _listener) == -1)
        {
            this._getListeners(_type)._push(_listener);
        }
    },

    _preprocess:function (_type, _event, _arg)
    {

    },

    _dispatch:function (_type, _event, _arg)
    {
        this._preprocess(_type, _event, _arg);

        var _queue = this._getListeners(_type);

        for (var i = _queue.length - 1; i >= 0; i--)
        {
            if ((typeof _queue[i] == 'function' ? _queue[i](_event, _arg) : _queue[i]._execute(_event, _arg)) === false)
            {
                return false;
            }
        }

        return true;
    },

    $dispatch:function (_type, _event, _arg)
    {
        return this._dispatch(_type, _event, _arg);
    },

    _generateJsCode:function (_type, _arg)
    {
        return _LargeString._expandTemplate(this._jsTemplate, { type:_type, arg:_arg || 0 });
    },

    _generateHtmlCode:function (_arg)
    {
        var _result = new _LargeString();

        for (var _type in this._listeners)
        {
            if (!this._listeners[_type]._custom)
            {
                _result._expandTemplate(this._htmlTemplate, { type:_type, arg:_arg || 0 });
            }
        }

        return _result;
    }

};

function CMenuPopUp(_menu, e, dx, dy, _dontForce)
{
    window._CMenus[_menu]._popup(e, { x:dx || 0, y:dy || 0 }, _dontForce);
}

function CMenuPopUpXY(_menu, x, y)
{
    window._CMenus[_menu]._popupAt({ x:x, y:y });
}

function CMenuPopDown(_menu)
{
    window._CMenus[_menu]._popdown();
}

function mEvent(_menuName, _itemIndex, _event)
{
    var o = _CMenus[_menuName];

    switch (_event)
    {
    case 'o':
        o._eventManager._dispatch('mouseover', _event, _itemIndex);
        break;
    case 't':
        o._eventManager._dispatch('mouseout', _event, _itemIndex);
        break;
    }
}

CLoadNotify = function ()
{
    if (window.on$htmlload)
    {
        window.on$htmlload();
    }
};

var _undefined;
window.CMenus = window.$CM = window._CMenus = {};
window.BLANK_IMAGE = 'img/b.gif';

var _bw = {};
    _bw._version = navigator.appVersion;
    _bw._agent = navigator.userAgent;
    _bw._opera = window.opera;
    _bw._operaNew = _bw._agent.match(/opera.[789]/i);
    _bw._operaOld = _bw._opera && !_bw._operaNew;
    _bw._dom = document.getElementById;
    _bw._ie55 = _bw._version.match(/MSIE 5.5/) && _bw._dom && !_bw._opera;
    _bw._ie5 = _bw._version.match(/MSIE 5/) && _bw._dom && !_bw._ie55 && !_bw._opera;
    _bw._ie6 = _bw._version.match(/MSIE 6/) && _bw._dom && !_bw._opera;
    _bw._ie4 = document.all && !_bw._dom && !_bw._opera;
    _bw._ie = _bw._version.match(/MSIE/) && _bw._dom && !_bw._opera;
    _bw._needsIframeFix = _bw._ie && !_bw._ie5;
    _bw._mac = _bw._agent.match(/Mac/);
    _bw._hotjava = _bw._agent.match(/hotjava/i);
    _bw._ns4 = document.layers && !_bw._dom && !_bw._hotjava;
    _bw._gecko = _bw._agent.match(/gecko/i);
    _bw._filters = _bw._ie && !_bw._mac;
    _bw._oldGecko = _bw._agent.match(/gecko\/200[012]/i);

function _Theme(_menu)
{
    this._menu = _menu;
    this._idPrefix = _menu._idPrefix + 't_';
    this._idIndex = 0;
    this._imagePrefix = _menu._root._properties.imagePrefix || '';
    this._urlPrefix = _menu._root._properties.urlPrefix || '';
    this._hideNormalOnRollover = _menu._root._properties.hideNormalOnRollover;

    _applyDefaults(
        _menu._root._properties,
        {
            backgroundColor: '',
            backgroundStyle: '',
            textClass: '',
            borderColor: '',
            borderWidth: '',
            shadowColor: '',
            shadow: '',
            valign: '',
            backgroundClass: '',
            textStyle: '',
            itemFilters: '',
            levelFilters: '',
            levelBackground: null,
            itemBackground: null
        }
    );

    var _this = this,
        _blankImage = _menu._root._properties.blankImage ? this._imagePrefix + _menu._root._properties.blankImage : BLANK_IMAGE;

    function _getStatusText(_item)
    {
        return _this._lookupField(_item, 'status');
    }

    function _setStatusBarText(_item)
    {
        if (_getStatusText(_item))
        {
            window.status = _getStatusText(_item);
        }
    }

    function _resetStatusBarText(_item)
    {
        if (_getStatusText(_item))
        {
            window.status = window.defaultStatus;
        }
    }

    _menu._addEventListener([ 'focus', 'mouseover' ], _setStatusBarText);
    _menu._addEventListener([ 'blur', 'mouseout' ], _resetStatusBarText);

    _menu._addEventListener(
        [ 'focus', 'mouseover' ],
        function (_item)
        {
            _menu._setActiveItem(_item);
        }
    );

    _menu._addEventListener(
        'blur',
        function (_item)
        {
            if (!_item._properties.hasControls)
            {

                _menu._setActiveItem(null);
            }
        }
    );

    _menu._addEventListener(
        'innerhover',
        function (_item)
        {
            if (!_item._properties.clickToActivate)
            {
                _menu._activate();
            }
            if (_menu._activated)
            {
                _menu._showLevel(_item._getLevel());
            }
        }
    );

    _menu._addEventListener(
        'click',
        function (_item)
        {
            _menu._activate();

            if (!_item._properties.url)
            {
                _menu._showLevel(_item._getLevel());
            }
            else if (!_item._properties.sticky)
            {
                _menu._dismiss();
            }
        }
    );

    _menu._addEventListener(
        'outerhover',
        function (_item)
        {
            if ((!_menu._isPopup || _menu._dismissPopupOnRollout) && (!_item || !_item._properties.hasControls))
            {
                _menu._deactivate();
            }
        }
    );

    _menu._addEventListener(
        'outerclick',
        function (_item)
        {
            _menu._dismiss();
        }
    );

    function _generateContent(
        _layer,
        _string,
        _template,
        _backgroundColor,
        _backgroundStyle,
        _cssClass,
        _code,
        _image,
        _imageSize,
        _arrow,
        _arrowSize,
        _verticalAlign,
        _backgroundCssClass,
        _textStyle,
        _autowrap)
    {
        return _string._expandTemplate(
            _template,
            {

                icon: _image && _imageSize ? '<td width="' + _imageSize[1] + '"><img src="' + _this._imagePrefix + _image + '" width="' + _imageSize[1] + '" height="' + _imageSize[0] + '" /></td>' : '',
                arrow: _arrow && _arrowSize ? '<td width="' + _arrowSize[1] + '"><img src="' + _this._imagePrefix + _arrow + '" width="' + _arrowSize[1] + '" height="' + _arrowSize[0] + '" /></td>' : '',

                bgColor: _backgroundColor ? 'background-color:' + _backgroundColor + ';' : '',
                bgClass: _backgroundCssClass,
                bgStyle: _backgroundStyle || '',
                textClass: _cssClass,
                textStyle: _textStyle,
                code: _code,
                valign: _verticalAlign ? ' valign="' + _verticalAlign + '"' : '',
                wrap: _autowrap ? '' : ' nowrap="nowrap"',
                id: _layer._id,
                w: _pxOrAuto(_layer.w),
                h: _pxOrAuto(_layer.h),
                x: _layer.x,
                y: _layer.y,
                visibility: _layer._shouldBeVisible() ? '' : (_bw._ns4 ? ' visibility="hidden"' : 'visibility:hidden;')
            }
        );
    }

    function _pxOrAuto(_n)
    {
        return _bw._ns4 ? (isNaN(_n) ? 1 : _n) : (isNaN(_n) ? '1px' : _n + 'px');
    }

    this._layers =
    {

        _background:new _Layer(
            {
                _template:_bw._ns4 ?
                    _LargeString._compileTemplate('<layer id="{id}" {visibility} width="{w}" height="{h}" left="{x}" top="{y}" color="{color}" background="{image}"></layer>') :
                    _LargeString._compileTemplate('<div id="{id}" class="{cssClass}" style="overflow:hidden;{visibility}position:absolute;{bgImage}width:{w};height:{h};left:{x}px;top:{y}px;background-color:{color};{style}"></div>'),
                _code:function (_string)
                {
                    return _string._expandTemplate(
                        this._template,
                        {
                            id: this._id,
                            w: _pxOrAuto(this.w),
                            h: _pxOrAuto(this.h),
                            x: this.x,
                            y: this.y,
                            visibility: this._shouldBeVisible() ? '' : (_bw._ns4 ? ' visibility="hidden"' : 'visibility:hidden;'),
                            cssClass: this._cssClass,
                            color: this._color,
                            style: this._style,
                            image: this._image,
                            bgImage: this._image ? 'background-image:url(' + this._image + ')' : ''
                        }
                    );
                }
            }
        ),
        _normal:new _Layer(
            {
                _template:_bw._ns4 ?
                    _LargeString._compileTemplate('<layer id="{id}"{visibility} left="{x}" top="{y}" width="{w}" height="{h}"><table width="100%" height="100%" style="{bgColor}{bgStyle}" cellspacing="0" cellpadding="0" border="0"><tr{valign}>{icon}<td class="{bgClass}"{wrap}><div class="{textClass}" style="{textStyle}">{code}</div></td>{arrow}</tr></table></layer>') :
                    _LargeString._compileTemplate('<table id="{id}" style="{visibility}position:absolute;border-collapse:collapse;left:{x}px;top:{y}px;width:{w};height:{h};{bgColor}{bgStyle}" cellspacing="0" cellpadding="0" border="0"><tr{valign}>{icon}<td class="{bgClass}"{wrap}><div class="{textClass}" style="{textStyle}">{code}</div></td>{arrow}</tr></table>'),
                _isContent:!_menu._root._properties.measureRollover,
                _visibleInState:this._hideNormalOnRollover ? 1 : 0,
                _offset:[ '+borderTop', '+borderLeft' ],
                _size:[ '+item-borderTop-borderBottom', '+item-borderLeft-borderRight' ],
                _code:function (_string)
                {
                    var o = this._item._properties;

                    return _generateContent(
                        this,
                        _string,
                        this._template,
                        _indexZero(o.backgroundColor) || o.color.bgON,
                        _indexZero(o.backgroundStyle),
                        _indexZero(o.textClass) || o.css.ON,
                        o.code[0],
                        o.image && o.image[0],
                        o.imgsize,
                        this._item._hasSubmenu && o.arrow && o.arrow[0],
                        o.arrsize,
                        _indexZero(o.valign),
                        _indexZero(o.backgroundClass),
                        _indexZero(o.textStyle),
                        !isNaN(this.w));
                }
            }
        ),
        _trigger:new _Layer(
            {
                _template:_bw._ns4 ?
                    _LargeString._compileTemplate('<layer id="{id}"{visibility} width="{w}" height="{h}" left="{x}" top="{y}"><a class="{css}" title="{4}" accesskey="{key}" href="{href}" target="{target}"' + _menu._eventManager._generateHtmlCode('{index}') + '><img src="' + _blankImage + '" width="{w}" height="{h}" title="{tip}" alt="{tip}" border="0" /></a></layer>') :
                    _LargeString._compileTemplate('<a id="{id}" style="display:block;{visibility}position:absolute;width:{w};height:{h};left:{x}px;top:{y}px;" class="{css}" title="{4}" accesskey="{key}" href="{href}" target="{target}"' + _menu._eventManager._generateHtmlCode('{index}') + '><img src="' + _blankImage + '" width="100%" height="100%" title="{tip}" alt="{tip}" border="0" /></a>'),
                _isTrigger:true,
                _code:function (_string)
                {
                    var o = this._item._properties;

                    return _string._expandTemplate(
                        this._template,
                        {
                            css: o.trigger,
                            key: o.key,
                            href: o.url && ((/^\w+:|^#/.test(o.url) ? '' : _this._urlPrefix) + o.url) || '#',
                            target: o.target,
                            tip: _this._lookupField(this._item, 'tip') || _this._lookupField(this._item, 'alt'),
                            index: this._item._index,
                            id: this._id,
                            w: _pxOrAuto(this.w),
                            h: _pxOrAuto(this.h),
                            x: this.x,
                            y: this.y,
                            visibility: this._shouldBeVisible() ? '' : (_bw._ns4 ? ' visibility="hidden"' : 'visibility:hidden;')
                        }
                    );
                }
            }
        )
    };

    this._layers._rollovered = _copyObject(this._layers._normal);
    this._layers._rollovered._visibleInState = 2;
    this._layers._rollovered._code = function (_string)
    {
        var o = this._item._properties;

        return _generateContent(
            this,
            _string,
            this._template,
            _indexOne(o.backgroundColor) || o.color.bgOVER,
            _indexOne(o.backgroundStyle),
            _indexOne(o.textClass) || o.css.OVER,
            o.code[1],
            o.image && o.image[1],
            o.imgsize,
            this._item._hasSubmenu && o.arrow && o.arrow[1],
            o.arrsize,
            _indexOne(o.valign),
            _indexOne(o.backgroundClass),
            _indexOne(o.textStyle),
            !isNaN(this.w));
    };
    this._layers._separator = _copyObject(this._layers._normal);
    this._layers._separator._code = function (_string)
    {
        var o = this._item._properties;

        return _generateContent(
            this,
            _string,
            this._template,
            _indexZero(o.backgroundColor) || o.color.bgON,
            _indexZero(o.backgroundStyle),
            _indexZero(o.textClass) || o.css.ON,
            0,
            0,
            0,
            0,
            0,
            _indexZero(o.valign),
            _indexZero(o.backgroundClass),
            _indexZero(o.textStyle),
            0);
    };
}

_Theme.prototype =
{
    _borderSize: [ '+item', '+item' ],
    _shadowOffset: [ '+shadow', '+shadow' ],
    _levelBackgroundSize: [ '+level', '+level' ],
    _borderSizes:
    [
        [ '+item', '+borderLeft' ],
        [ '+borderTop', '+item' ],
        [ '+item', '+borderRight' ],
        [ '+borderBottom', '+item' ]
    ],
    _borderOffsets:
    [
        [ 0, 0 ],
        [ 0, 0 ],
        [ 0, '+item-borderRight' ],
        [ '+item-borderBottom', 0 ]
    ],

    _lookupField:function (_item, _name)
    {
        var _value = _item._properties[_name];

        if (_isUndefined(_value))
        {
            return '';
        }

        if (_isUndefined(_item._properties[_value]))
        {
            return _value;
        }

        return _indexZero(_item._properties[_value]);
    },

    _getLayers:function (_item)
    {
        var _result = [],
            o = _item._properties,
            _this = this,
            _shadowColor = o.shadowColor || o.color.shadow,
            _borderColor = o.borderColor || o.color.border;

        function _addLayer(_layer)
        {
            _layer._item = _item;
            _layer._id = _this._idPrefix + _this._idIndex++;

            if (_layer._isTrigger && o.hasControls)
            {
                _layer._visibleInState = 1;
            }

            _layer._visible = _layer._visibleInState === 0 || _layer._visibleInState === 1;

            _result._push(_layer);
        }

        function _addBackgroundLayer(_definition, _defaultSize)
        {
            _addLayer(
                _mergeObjects(
                    _this._layers._background,
                    {
                        _size: _preparePairedCalculator(_definition.size || _defaultSize || _Layer._size),
                        _offset: _preparePairedCalculator(_definition.offset || _Layer._offset, 'item'),
                        _cssClass: _definition.cssClass,
                        _style: _definition.style,
                        _color: _definition.color,
                        _image: _definition.image,
                        _visibleInState: _definition.state || 0
                    }
                ));
        }

        function _addBackgroundLayers(_definitions, _defaultSize)
        {
            if (_definitions)
            {
                for (var i = 0; i < _definitions.length; i++)
                {
                    _addBackgroundLayer(_definitions[i], _defaultSize);
                }
            }
        }

        if (_shadowColor)
        {
            _addBackgroundLayer({ color:_shadowColor, offset:this._shadowOffset });
        }

        if (_item._isFirst)
        {
            _addBackgroundLayers(o.levelBackground, this._levelBackgroundSize);
        }

        _addBackgroundLayers(o.itemBackground);

        if (_borderColor)
        {
            if (!o.transparentBorder)
            {
                _addBackgroundLayer({ color:_borderColor, size:this._borderSize });
            }
            else
            {
                for (var i = 0; i < 4; i++)
                {
                    if (_item._borderSizes[i])
                    {
                        _addBackgroundLayer({ color:_borderColor, size:this._borderSizes[i], offset:this._borderOffsets[i] });
                    }
                }
            }
        }

        if (_item._isSeparator)
        {
            _addLayer(_copyObject(this._layers._separator));
        }
        else
        {
            _addLayer(_copyObject(this._layers._normal));

            if (!o.hasControls)
            {
                _addLayer(_copyObject(this._layers._rollovered));
            }
        }

        _addLayer(_copyObject(this._layers._trigger));

        return _result;
    },

    _applyLevelSpecialEffect: function (_level, _layer) { new _LevelSpecialEffect()._init(_level, _layer); },
    _applyItemSpecialEffect: function (_item, _layer) { new _ItemSpecialEffect()._init(_item, _layer); }
};

function _SpecialEffect()
{
}

_SpecialEffect.prototype =
{
    _filters: '',

    _init:function (_owner, _layer)
    {
        if (_layer._attachSpecialEffect)
        {
            this._owner = _owner;
            this._layer = _layer;
            _layer._attachSpecialEffect(this);
        }
    },

    _beforeVisibilitySet:function (_apply)
    {
        if (_apply && _bw._filters)
        {
            var _filters = this._getFilters(!this._layer._isVisible());

            if (_filters != this._filters)
            {
                if (this._filters)
                {
                    _callMethods(this._layer._layer.filters, { stop:_undefined });
                }

                this._layer._style.filter = this._filters = _filters;
            }

            if (_filters)
            {
                _callMethods(this._layer._layer.filters, { apply:_undefined });
            }
        }
    },

    _afterVisibilitySet:function (_apply)
    {
        if (_apply && _bw._filters && this._filters)
        {
            _callMethods(this._layer._layer.filters, { play:_undefined });
        }
    }

};

function _LevelSpecialEffect()
{
}

_LevelSpecialEffect.prototype = new _SpecialEffect();
_LevelSpecialEffect.prototype._getFilters = function (_isItRollover)
{
    var o = this._owner._properties.levelFilters;
    return _isArray(o) ? o[_isItRollover ? 0 : 1] : (o || '');
};

function _ItemSpecialEffect()
{
}

_ItemSpecialEffect.prototype = new _SpecialEffect();
_ItemSpecialEffect.prototype._getFilters = function (_isItRollover)
{
    var o = this._owner._properties.itemFilters;
    return _isArray(o) ? o[_isItRollover ? 0 : 1] : (o || '');
};

function _Menu(_name, _items)
{

    _applyDefaults(_items[0], { dynamic:true, zIndex:1000, exclusive:true, wrapoff:[ 0, 0 ], delay:[ 0, 800 ], pos:'relative' });

    window._CMenus[_name] = this;

    this._items = [];
    this.items = this._items;
    this._name = _name;
    this._isDynamic = _items[0].dynamic && ((_bw._dom && !_bw._operaOld && !(_bw._ie && _bw._mac)) || _bw._ns4 || _bw._ie4);
    this._jsPath = _registerInstance(this, 'COOLjsMenu');
    this._idPrefix = _name + '_';
    this._httpsBlankDocument = _items[0].https_fix_blank_doc || 'javascript:false';

    this._isPopup = _items[0].popup;
    this._dismissPopupOnRollout = _items[0].dismissPopupOnRollout;
    this._isFramed = _items[0].frames;
    this._isTopFrame = this._isFramed && _items[0].frames[0] == window.name;
    this._isRelative = !this._isPopup && _items[0].pos == 'relative' && (!this._isFramed || this._isTopFrame);

    this._innerHoverTimeout = _isArray(_items[0].delay) ? _items[0].delay[0] : _items[0].delay;
    this._outerHoverTimeout = _isArray(_items[0].delay) ? _items[0].delay[1] : this._innerHoverTimeout;
    this._iframeSpool = [];
    this._iframesToPrecreate = 3;
    this._ns4Offset = { x:0, y:0 };
    this._isCompletelyLoaded = false;
    this._root = new _RootItem(this, _items);
    this._eventManager = new _EventManager(this);

    var _this = this;

    if (this._isFramed)
    {
        this._eventManager._preprocess = function (_type, _event, _arg)
        {
            var _thisItem = _this._items[_arg],
                _that = _this._getOtherMenu(),
                _path = [],
                _thatItem = _that && _that._root;

            if (_thisItem && _that && !_this._transferActive && !_that._transferActive)
            {
                _this._transferActive = true;

                while (_thisItem._parent)
                {
                    _path._push(_thisItem._minorIndex);
                    _thisItem = _thisItem._parent;
                }

                for (var i = _path.length - 1; i >= 0; i--)
                {
                    _thatItem = _thatItem._getLevel()._getChild(_path[i]);
                }

                _that._eventManager._dispatch(_type, _event, _thatItem._index);

                _this._transferActive = false;
            }
        };
    }

    this._timeout = null;

    function _cancelHoverEvent()
    {
        window.clearTimeout(_this._timeout);
    }

    this._cancelHoverEvent = _cancelHoverEvent;

    function _scheduleHoverEvent(_item, _isItInner)
    {
    	_cancelHoverEvent();
		
        var _delay = _isItInner ? _this._innerHoverTimeout : _this._outerHoverTimeout, _handler = _isItInner ? '$oninnerhover' : '$onouterhover';

        if(_item._depth >0 )
        {
        	_this[_handler](_item ? _item._index : -1);
        }
        else
	    {
	        if (_delay > 0)
	        {
	            _this._timeout = window.setTimeout(_this._jsPath + '.' + _handler + '(' + (_item ? _item._index : -1) + ')', _delay);
	        }
	        else if (_delay === 0)
	        {
	            _this[_handler](_item ? _item._index : -1);
	        }
        }
    }

    this._scheduleHoverEvent = _scheduleHoverEvent;

    this._addEventListener('mouseover', function(_item) { _scheduleHoverEvent(_item, true); });
    this._addEventListener('mouseout', function(_item) { _scheduleHoverEvent(_item, false); });
    this._addEventListener([ 'focus', 'click', 'keydown', 'outerclick' ], _cancelHoverEvent);

    _addEventListener(window, 'load', function () { _this._onload(true); });
    _addEventListener(window, '$htmlload', function () { _this._onload(); });

    _addEventListener(window, 'scroll', function () { _this._updateCrossFramePosition(); });
    if (this._isFramed && !this._isTopFrame)
    {
        _addEventListener(window, 'resize', function () { _this._updateCrossFramePosition(); });
    }

    if (_bw._operaOld)
    {
        _LowLevelLayer = _OldOperaLayer;
    }
    else if (_bw._ns4)
    {
        _LowLevelLayer = _Ns4Layer;
    }
    else if (_bw._ie4)
    {
        _LowLevelLayer = _Ie4Layer;
    }
    else
    {
        _LowLevelLayer = _CommonLayer;
    }

    _LowLevelLayer._cache = {};

    this._theme = new _Theme(this);

}

_Menu.prototype =
{

    _show: function () { this._showLevel(this._root._getLevel()); },
    hide: function () { this._showLevel(null); },
    _hideOthers: function () { _callMethods(_getInstances('COOLjsMenu', this), { _dismiss:null }); },
    moveXY: function (x, y) { this._updatePosition({ x:x, y:y }); },
    $oninnerhover: function (_arg) { this._eventManager._dispatch('innerhover', null, _arg); },
    $onouterhover: function (_arg) { this._eventManager._dispatch('outerhover', null, _arg); },

    _dismiss: function ()
    {
        this._showLevel(null);
        this._setActiveItem(null);
        this._eventManager._dispatch('dismiss', null, null);
    },

    _addEventListener:function (_type, _listener)
    {
        this._eventManager._addListener(
            _type,
            {
                _menu:this,
                _listener:_listener,
                _execute:function (_event, _arg)
                {
                    return this._listener(this._menu._items[_arg], _event);
                }
            }
        );
    },

    _onload:function (_isCompletelyLoaded)
    {
        this._isCompletelyLoaded = this._isCompletelyLoaded || _isCompletelyLoaded;

        if (!this._isPopup)
        {

            if (this._isCompletelyLoaded && _bw._ns4)
            {
                _gatherNs4Layers(document.layers);

                if (this._isRelative)
                {
                    var o = document.anchors[this._idPrefix + 'da'];
                    this._root.x = o.x;
                    this._root.y = o.y;
                }
            }
            if (!(_bw._ie4 || _bw._ns4) || _isCompletelyLoaded)
            {
                this._show();
            }

        }

    },

    _addEventListeners:function (_re)
    {
        for (var _name in this)
        {
            if (_name.match(_re))
            {
                this._eventManager._addListener(
                    RegExp.$1,
                    {
                        _instance:this,
                        _methodName:_name,
                        _execute:function (_event, _arg)
                        {
                            return this._instance[this._methodName](this._instance._items[_arg], _event);
                        }
                    }
                );
            }
        }
    },

    _initTop:function (_dynamic)
    {
        this._addEventListeners(/^on(\w+)$/);

        this._root._getLevel()._getChildren();

        this.root = this._root;
        this.root.cd = this._root._getLevel()._children;

        var w = this._root._getLevel().w, h = this._root._getLevel().h, s, i;

        this._withPlaceholder = !isNaN(w + h);

        if (!_bw._ns4)
        {
            s = '<div id="' + this._idPrefix + 'r" style="z-index:' + this._root._rawSubmenu[0].zIndex + ';position:';
            if (this._isFramed && !this._isTopFrame && _bw._gecko)
            {
                s += 'fixed;top:0;left:0;';
            }
            else

            if (this._isRelative)
            {
                s += 'relative;' + (this._withPlaceholder ? 'width:' + w + 'px;height:' + h + 'px;' : '');
            }
            else
            {

                s += 'absolute;left:' + this._root.x + 'px;top:' + this._root.y + 'px;';

            }

            s += '">' + (this._isDynamic ? '' : this._root._getLevel()._getHtml(new _LargeString()));
            if (_bw._needsIframeFix)
            {
                for (i = 0; i < this._iframesToPrecreate; i++)
                {
                    s += '<iframe src="' + this._httpsBlankDocument + '" id="' + this._idPrefix + 'i' + i + '" style="position:absolute;left:-10000px;top:-10000px;visibility:hidden;z-index:-1000;filter:Alpha(opacity=0);" tabindex="-1"></iframe>';
                }
            }
            s += '</div>';

            if (_bw._oldGecko && this._isRelative && this._withPlaceholder)
            {
                s = '<div style="width:' + w + ';height:' + h + 'px;"><div style="width:' + w + 'px;height:' + h + 'px;position:absolute;">' + s + '</div><div style="width:' + w + 'px;height:' + h + 'px;"></div></div>';
            }

            if (_dynamic)
            {
                var o = document.createElement('div');
                o.innerHTML = s;
                document.body.appendChild(o);
            }
            else
            {
                document.write(s);
            }
            this._rootDiv = _LowLevelLayer._find(this._idPrefix + 'r');

            if (_bw._needsIframeFix)
            {
                for (i = 0; i < this._iframesToPrecreate; i++)
                {
                    this._iframeSpool[i] = _LowLevelLayer._find(this._idPrefix + 'i' + i);
                }
            }

        }

        else
        {
            s = (this._isDynamic ? '' : '<div style="color:red;"></div>' + this._root._getLevel()._getHtml(new _LargeString()));

            if (this._isRelative)
            {
                s = '<a name="' + this._idPrefix + 'da" href="#"><img src="' + this._blankImage + '" ' + (this._withPlaceholder ? 'width="' + w + '" height="' + h + '"' : 'width="1" height="1"') + ' border="0" /></a>' + s;
            }

            document.write(s);
        }

        var _this = this, _listener = function ()
        {
            var _event = window.event || arguments[0], o = _event.srcElement || _event.target, _type = 'outerclick';

            while (o)
            {
                if (o == _this._rootDiv._layer)
                {
                    _type = 'innerclick';
                    break;
                }

                o = o.parentNode || o.parentElement;
            }

            _this._eventManager._dispatch(_type, _event, 0);
        };
        _addEventListener(document, 'click', _listener);

    },

    _popup:function (e, _offset, _dontForce)
    {
        if (_dontForce && this._lastShownLevel)
        {
            this._cancelHoverEvent();
            return;
        }

        var _popupOffset = this._root._properties.popupoff, _coords = _bw._ie ? { x:0, y:0} : this._getScrollPosition();
        _addPoint({ x:e.pageX || e.x, y:e.pageY || e.y }, _coords);
        _addPoint(_offset, _coords);
        this._popupAt(_coords);
    },

    _popupAt:function (_coords)
    {
        this._updatePosition(_coords);
        this._show();
    },

    _popdown:function ()
    {
        this._cancelHoverEvent();
        this._scheduleHoverEvent(null, false);
    },

    _getAbsoluteCoords:function ()
    {
        var _result = { x:0, y:0 }, o = this._rootDiv._layer;

        while (o)
        {
            _addPoint({ x:o.offsetLeft, y:o.offsetTop }, _result);
            o = o.offsetParent;
        }

        return _result;
    },

    _getScrollPosition:function ()
    {
        return { x:document.body.scrollLeft || document.body.parentElement && document.body.parentElement.scrollLeft || 0, y:document.body.scrollTop || document.body.parentElement && document.body.parentElement.scrollTop || 0 };
    },

    _updateCrossFramePosition:function ()
    {
        if (this._isFramed && !this._isTopFrame)
        {
            var _offset = { x:0, y:0 }, _frame;

            if (_bw._ie || _bw._operaNew)
            {
                _offset = this._getScrollPosition();
                _frame = this._getOtherFrame();
                if (_frame)
                {
                    _offset.y -= _frame.document.body.parentElement.clientHeight || _frame.document.body.clientHeight;
                }
            }
            else if (_bw._gecko)
            {
                _frame = this._getOtherFrame();
                if (_frame)
                {
                    _offset.y -= _frame.innerHeight;
                }
            }

            var _menu = this._getOtherMenu();
            if (_menu)
            {
                _addPoint(_menu._getAbsoluteCoords(), _offset);
            }

            this._updatePosition(_offset);
        }
    },

    _getOtherFrame:function ()
    {
        if (_isUndefined(this._otherFrame))
        {
            var _list = {};

            function _enumFrames(_frame)
            {
                if (_frame.frames && (!_frame.name || _isUndefined(_list[_frame.name])))
                {
                    for (var i = 0; i < _frame.frames.length; i++)
                    {
                        _enumFrames(_frame.frames[i]);
                    }
                }

                if (_frame.name && _isUndefined(_list[_frame.name]))
                {
                    _list[_frame.name] = _frame;
                }
            }

            _enumFrames(top);

            this._otherFrame = _list[this._root._properties.frames[this._isTopFrame ? 1 : 0]] || null;
        }

        return this._otherFrame;
    },

    _getOtherMenu:function ()
    {
        var o = this._getOtherFrame();
        return o && o._CMenus && o._CMenus[this._name];
    },

    _updatePosition:function (_point)
    {
        if (_bw._ns4)
        {
            _copyPoint(_point, _this._ns4Offset);
            this._root._getLevel()._ns4UpdatePosition();
        }
        else
        {
            this._rootDiv._move(_point);
        }
    },

    _setActiveItem:function (_item)
    {
        if (!(_bw.ie4 || _bw._ns4) || this._isCompletelyLoaded)
        {
            _optimizedCall(this._lastActiveItem, _item, { _setState:1 }, { _setState:2 });

            this._lastActiveItem = _item;

            if (_item && _item._properties.exclusive)
            {
                this._hideOthers();
            }
        }
    },

    _showLevel:function (_level)
    {
        if (!(_bw._ie4 || _bw._ns4) || this._isCompletelyLoaded)
        {

            this._updateCrossFramePosition();

            if (_level && _level._properties.exclusive)
            {
                this._hideOthers();
            }

            if (!_level && !this._isPopup)
            {
                _level = this._root._getLevel();
            }

            _optimizedCall(this._lastShownLevel, _level, { _setVisibility:false }, { _setVisibility:true });

            this._lastShownLevel = _level;

            if (_bw._gecko && this._isRelative)
            {
                var o = this._rootDiv._layer.parentNode;
                if (o.tagName != 'BODY')
                {
                    o.style.width = this._rootDiv._layer.offsetWidth + 'px';
                    o.style.height = this._rootDiv._layer.offsetHeight + 'px';
                }
            }

        }
    },

    _activate:function ()
    {
        this._activated = true;
    },

    _deactivate:function ()
    {
        this._activated = false;

        this._showLevel(this._isPopup && this._lastShownLevel && !this._dismissPopupOnRollout ? this._root._getLevel() : null);

        this._setActiveItem(null);
        this._eventManager._dispatch('deactivate', null, null);
    }

};

_Menu.create = function (_name, _items)
{
    var _result = new COOLjsMenuPRO(_name, _items);

    _result._initTop(true);
    _result._onload();

    return _result;
}

function _indexZero(_value)
{
    return _isArray(_value) ? _value[0] : _value;
}

function _indexOne(_value)
{
    return _isArray(_value) ? _value[1] : _value;
}

_applyDefaults(
    _Menu.prototype,
    {
        addEventListener: _Menu.prototype._addEventListener,
        initTop: _Menu.prototype._initTop,
        init: _nop,
        show: _Menu.prototype._show
    }
);

function _Level()
{
}

_Level.prototype =
{

    x: 0,
    y: 0,

    _init:function (_parent)
    {
        this._properties = _mergeObjects(
            _parent._inheritableProperties,
            _resolveStyle(_parent._rawSubmenu[0].style || _parent._inheritableProperties.style, _parent._depth + 1),
            _parent._rawSubmenu[0]);

        _resolveExceptions(this._properties);

        this._parent = _parent;
        this._menu = _parent._menu;
        this._isTopLevel = !_parent._parent;

        this._isPersistent = !_parent._menu._isPopup && this._isTopLevel;

        this._layerId = _parent._menu._idPrefix + 'l_' + this._parent._index;
        this._maxItemSize = { w:NaN, h:NaN };
        this._offset = _preparePairedCalculator(this._properties.leveloff || [0, 0], 'parentItem');
    },

    _calculateDimensions:function ()
    {
        this.w = this.h = 0;

        for (var i = 0; i < this._children.length; i++)
        {
            var o = this._children[i];
            this.w = Math.max(this.w, o.x + o.w);
            this.h = Math.max(this.h, o.y + o.h);
        }
    },

    _getPath: function () { return (this._parent._parent ? this._parent._parent._getLevel()._getPath() : []).concat([ this ]); },

    _getChildren:function ()
    {
        if (!this._children)
        {
            var i, _items = this._parent._rawSubmenu, _last = _items.length - 1;

            if (_isUndefined(_items[_last]))
            {
                _last--;
            }

            this._children = [];

            for (i = 0; i < _last; i++)
            {
                this._children[i] = new _Item();
            }

            for (i = 0; i < _last; i++)
            {
                var _item = this._children[i];
                _item._init(this._menu, this._parent, i, this._menu._items._push(_item) - 1, this._children[i - 1], this._children[i + 1]);
            }

            this._calculateDimensions();
        }

        return this._children;
    },

    _getNumberOfChildren: function () { return this._getChildren().length; },
    _getChild: function (_index) { return this._getChildren()[_index]; },
    _getFirstChild: function () { return this._getChild(0); },

    _ns4UpdatePosition:function ()
    {
        if (this._layer)
        {
            this._layer._move(this._menu._ns4Offset);

        }
    },

    _getHtml:function (_string)
    {
        if (!this._menu._isDynamic)
        {
            if (_bw._ns4)
            {
                _string._append('<layer id="' + this._layerId + '" left="-10000" top="-10000">');
            }
            else
            {
                _string._append('<div id="' + this._layerId + '" style="position:absolute;left:-10000px;top:-10000px;width:1000px;">');
            }
        }

        _callMethods(this._getChildren(), { _getHtml:_string });

        if (!this._menu._isDynamic)
        {
            if (_bw._ns4)
            {
                _string._append('</layer>');
            }
            else
            {
                _string._append('</div>');
            }

            for (var i = 0; i < this._children.length; i++)
            {
                this._children[i]._getLevel()._getHtml(_string);
            }
        }

        return _string;
    },

    _getLowLevelLayer:function ()
    {
        if (!this._layer)
        {
            this._layer = this._menu._isDynamic ? _LowLevelLayer._create(this._getHtml(new _LargeString()), this._menu._rootDiv || 1) : _LowLevelLayer._find(this._layerId);

            this._menu._theme._applyLevelSpecialEffect(this, this._layer);

            if (isNaN(this.w + this.h))
            {
                this._maxItemSize.w = 0;
                this._maxItemSize.h = 0;
                for (var o = this._getFirstChild(); o; o = o._nextItem)
                {
                    _maxSize(o._getActualSize(), this._maxItemSize);
                }

                _callMethods(this._children, { _recalculateDimensions:_undefined });
                this._calculateDimensions();
                _callMethods(this._children, { _recalculateDimensions:true });
            }

            if (!this._isTopLevel)
            {
                this.x = this._offset.x(this._getFirstChild());
                this.y = this._offset.y(this._getFirstChild());
            }
            else if (_bw._ns4)
            {
                _copyPoint(this._menu._root, this);
            }

            this._layer._move(this);
            if (!_bw._ns4)
            {
                this._layer._resize(this);
            }

            if (!_bw._ns4 && !_bw._operaOld && this._isPersistent && this._menu._isRelative && !this._menu._withPlaceholder)
            {
                this._menu._rootDiv._resize(this);
            }

            if (this._isPersistent)
            {
                var _list = this._menu._root._properties.forms_to_hide;
                if (_list)
                {
                    for (var i = 0; i < _list.length; i++)
                    {
                        _LowLevelLayer._find(_list[i])._setVisibility(!this._menu._lastShownLevel || this._menu._lastShownLevel == this._menu._root._getLevel());
                    }
                }
            }

        }

        return this._layer;
    },

    _setVisibility:function (_value)
    {
        if (this._visible != _value)
        {
            this._visible = _value;
            this._getLowLevelLayer()._setVisibility(_value, true);
            if ((!this._isTopLevel || this._menu._isPopup) && (_bw._needsIframeFix))
            {
                if (_value)
                {
                    if (this._menu._iframeSpool.length)
                    {
                        this._iframe = this._menu._iframeSpool._splice(0, 1)[0];
                    }
                    else
                    {
                        var _iframe = document.createElement('IFRAME');
                        _iframe.style.filter = 'Alpha(opacity=0)';
                        _iframe.style.position = 'absolute';
                        _iframe.style.zIndex = -1000;
                        _iframe.tabIndex = -1;
                        _iframe.src = this._menu._httpsBlankDocument;
                        this._menu._rootDiv._layer.appendChild(_iframe);

                        this._iframe = new _LowLevelLayer(_iframe);
                    }

                    this._iframe._setVisibility(true);
                    this._iframe._resize(this);
                    this._iframe._move(this);
                }
                else if (this._iframe)
                {
                    this._iframe._move({ x:-10000, y:-10000 });
                    this._menu._iframeSpool._push(this._iframe);
                    this._iframe = null;
                }
            }
        }
    }

};

function _DummyLevel()
{
}

_DummyLevel.prototype = new _Level();

_DummyLevel.prototype._setVisibility = _nop;
_DummyLevel.prototype._getHtml = function (_string) { return _string; };
_DummyLevel.prototype._ns4UpdatePosition = _nop;

function _Item()
{
}

_Item.prototype =
{

    _init:function (_menu, _parent, _minorIndex, _index, _previousItem, _nextItem)
    {
        var _data = _parent._rawSubmenu[_minorIndex + 1];

        _applyDefaults(_data, _data.format || {});

        _resolveExceptions(_data);

        this._menu = _menu;
        this.index = _index;
        this._index = _index;
        this._parent = _parent;
        this._depth = _parent._depth + 1;
        this._minorIndex = _minorIndex;
        this._state = 1;
        this._rawSubmenu = _data.sub && _data.sub.length > 0 ? _data.sub : [{}];
        this._hasSubmenu = this._rawSubmenu.length > 1;
        this._isFirst = !_previousItem;
        this._isLast = !_nextItem;
        this._isOnly = !_previousItem && !_nextItem;
        this._isSeparator = _isUndefined(_data.code);
        this._isTopLevel = _parent == _menu._root;
        this._previousItem = _previousItem;
        this._nextItem = _nextItem;

        var p = _mergeObjects(
                _parent._level._properties,
                _resolveStyle(_data.style, this._depth),
                _data),
            o = _mergeObjects(
                p,
                this._isFirst && p.ifFirst,
                this._isLast && p.ifLast,
                this._isOnly && p.ifOnly,
                this._isSeparator && p.ifSeparator,
                p['ifN' + this._minorIndex],
                _data);

        this._inheritableProperties = p;
        this._properties = o;

        this._size = _preparePairedCalculator(o.size);
        this._offset = this._isFirst ? _zeroCalculator : _preparePairedCalculator(o.wrapPoint ? o.wrapoff : o.itemoff || [ 0, 0 ], 'previousItem');

        var b = o.borderWidth || o.borders || o.border || 0,
            s = o.shadow || 0;

        if (_isNumber(b))
        {
            b = [ b, b, b, b ];
        }

        this._borderSizes = b;

        if (_isNumber(s))
        {
            s = [ s, s ];
        }

        this._shadow = s;

        this.borderLeft = { w:b[0], h:b[0] };
        this.borderTop = { w:b[1], h:b[1] };
        this.borderRight = { w:b[2], h:b[2] };
        this.borderBottom = { w:b[3], h:b[3] };
        this.shadow = { w:s[0], h:s[1] };
        this.self = this;
        this.item = this;
        this.previousItem = _previousItem;
        this.level = _parent._getLevel();
        this.parentItem = _parent;
        this.parentLevel = !this._isTopLevel && _parent._parent._getLevel();
        this.maxItem = _parent._getLevel()._maxItemSize;

        this._layers = _menu._theme._getLayers(this);
        this._dynamicLayers = [];

        for (var i = 0; i < this._layers.length; i++)
        {
            if (this._layers[i]._isContent)
            {
                this._contentLayer = this._layers[i];
            }

            if (this._layers[i]._visibleInState !== 0)
            {
                this._dynamicLayers._push(this._layers[i]);
            }
        }

        this._recalculateDimensions();
    },

    getMenu: function () { return this._menu; },
    getLevel: function () { return this._getLevel(); },
    getParent: function () { return this._parent; },
    getData: function () { return this._properties; },

    _getActualSize:function ()
    {
        var o = this._contentLayer._getLowLevelLayer()._getSize();
        this.w = o.w + this.borderLeft.w + this.borderRight.w;
        this.h = o.h + this.borderTop.h + this.borderBottom.h;
        return this;
    },

    _getPath: function () { return (this._parent && this._parent._getPath() || []).concat([ this ]); },

    _recalculateDimensions:function (_invalidateLayers)
    {
        this.w = this._size.w(this);
        this.h = this._size.h(this);

        if (_invalidateLayers)
        {
            _callMethods(this._layers, { _invalidate:_undefined });
        }

        this.x = this._offset.x(this);
        this.y = this._offset.y(this);
    },

    _getLevel:function ()
    {
        if (!this._level)
        {
            (this._level = this._hasSubmenu ? new _Level() : new _DummyLevel())._init(this);
        }

        return this._level;
    },

    _getHtml:function (_string)
    {
        _callMethods(this._layers, { _getHtml:_string });
        return _string;
    },

    _setState:function (_value)
    {
        if (_value != this._state)
        {
            this._state = _value;
            _callMethods(this._dynamicLayers, { _updateVisibility:_undefined });
        }
    }

};

function _RootItem(_menu, _rawSubmenu)
{
    this._menu = _menu;
    this._parent = null;
    this._properties = _mergeObjects({ shadow:0, color:{}, css:{} }, _rawSubmenu[0]);
    this._inheritableProperties = this._properties;
    this.frameoff = _rawSubmenu[0].pos ? _rawSubmenu[0].pos : [ 0, 0 ];
    this._setState = _nop;
    this._index = 'R';
    this._hasSubmenu = true;
    this._depth = -1;
    this._rawSubmenu = _rawSubmenu;

    if (_menu._isFramed && !_menu._isTopFrame)
    {
        this.x = 0;
        this.y = 0;
    }
    else if (!_menu._isRelative && !_menu._isPopup)
    {
        this.x = _rawSubmenu[0].pos[0];
        this.y = _rawSubmenu[0].pos[1];
    }

}

_RootItem.prototype = new _Item();

function _Layer(_data)
{
    for (var i in _data)
    {
        this[i] = _data[i];
    }

    _preparePairedCalculator(this._size);
    _preparePairedCalculator(this._offset, 'item');
}

_Layer._size = [ '+item', '+item' ];
_Layer._offset = [ 0, 0 ];

_Layer.prototype =
{
    _size: _Layer._size,
    _offset: _Layer._offset,
    _visibleInState: 0,

    _recalculateDimensions:function ()
    {
        this.w = this._size.w(this._item);
        this.h = this._size.h(this._item);
        this.x = this._offset.x(this._item);
        this.y = this._offset.y(this._item);
    },

    _invalidate:function ()
    {
        this._recalculateDimensions();
        this._getLowLevelLayer()._resize(this);
        this._getLowLevelLayer()._move(this);
    },

    _getLowLevelLayer:function ()
    {
        if (!this._layer)
        {
            this._layer = _LowLevelLayer._find(this._id);
            if (this._visibleInState === 2)
            {
                this._item._menu._theme._applyItemSpecialEffect(this._item, this._layer);
            }
        }

        return this._layer;
    },

    _getHtml:function (_string)
    {
        this._recalculateDimensions();
        return this._code(_string);
    },

    _shouldBeVisible:function (_value)
    {
        return this._visibleInState === 0 || this._visibleInState === this._item._state;
    },

    _updateVisibility:function ()
    {
        if (this._visible != this._shouldBeVisible())
        {
            this._visible = !this._visible;
            this._getLowLevelLayer()._setVisibility(this._visible, true);
        }
    }

};

_LowLevelLayer = _nop;

function _gatherNs4Layers(_collection)
{
    for (var i = 0; i < _collection.length; i++)
    {
        _LowLevelLayer._cache[_collection[i].id] = _collection[i];
    }
}

function _CommonLayer(_layer)
{
    this._layer = _layer;
    this._style = _layer.style;
    this._firstChild = _bw._mac ? _layer : (_layer.childNodes && _layer.childNodes[0] || _layer);
    this._specialEffect = null;
    this._filters = '';
}

_CommonLayer._find = function (_id)
{
    return new _CommonLayer(document.all && document.all[_id] || document.getElementById(_id));
};

_CommonLayer._create = function (_html, _parent)
{
    var _div = document.createElement('DIV'), o = _div.style;
    o.position = 'absolute';
    o.visibility = 'hidden';
    o.left = o.top = -10000;
    _div.innerHTML = _html;
    (_parent && _parent._layer || _parent || document.body).appendChild(_div);
    return new _CommonLayer(_div);
};

_CommonLayer.prototype =
{
    _isVisible: function () { return this._style.visibility != 'hidden'; },
    _getSize: function () { return { w:Math.max(this._layer.offsetWidth, this._firstChild.offsetWidth), h:Math.max(this._layer.offsetHeight, this._firstChild.offsetHeight) }; },
    _move: function (o) { this._style.left = o.x + 'px'; this._style.top = o.y + 'px'; },
    _resize: function (o) { this._style.width = o.w + 'px'; this._style.height = o.h + 'px'; },

    _attachSpecialEffect:function (_specialEffect)
    {
        this._specialEffect = _specialEffect;
        this._setVisibility = this._setVisibilityAlternative;
    },

    _setVisibility:function (_value)
    {
        this._style.visibility = _value ? 'inherit' : 'hidden';
    },

    _setVisibilityAlternative:function (_value, _applyLevelSpecialEffects)
    {
        this._specialEffect._beforeVisibilitySet(_applyLevelSpecialEffects);
        this._style.visibility = _value ? 'inherit' : 'hidden';
        this._specialEffect._afterVisibilitySet(_applyLevelSpecialEffects);
    }

};

function _OldOperaLayer()
{
}

_OldOperaLayer.prototype =
{
    _setVisibility: function (_value) { this._style.visibility = _value ? 'visible' : 'hidden'; },
    _move: function (o) { this._style.left = o.x; this._style.top = o.y; },
    _resize: function (o) { this._style.width = o.w; this._style.height = o.h; },
    _applyFilters: _nop,
    _playTransition: _nop
};

_OldOperaLayer._find = function (_id)
{
    var _result = new _OldOperaLayer();
    _result._layer = document.getElementById(_id);
    _result._style = _result._layer.style;
    return _result;
};

function _Ns4Layer(_layer)
{
    this._layer = _layer;
    _gatherNs4Layers(_layer.document.layers);
}

_Ns4Layer.prototype =
{
    _setVisibility: function (_value) { this._layer.visibility = _value ? 'inherit' : 'hide'; },
    _move: function (o) { this._layer.moveTo(o.x, o.y); },
    _resize: function (o) { this._layer.resize(o.w, o.h); },
    _applyFilters: _nop,
    _playTransition: _nop
};

_Ns4Layer._find = function (_id)
{
    return new _Ns4Layer(_LowLevelLayer._cache[_id]);
};

_Ns4Layer._create = function (_html)
{
    var o = new Layer(1);
    o.visibility = 'hide';
    o.document.write(_html);
    o.document.close();
    return new _Ns4Layer(o);
};

function _Ie4Layer(_layer)
{
    this._layer = _layer;
    this._firstChild = _layer.children[0] || _layer;
    this._style = _layer.style;
    this._specialEffect = null;
    this._filters = '';
}

_Ie4Layer._find = function (_id)
{
    return new _Ie4Layer(document.all && document.all[_id] || document.getElementById(_id));
};

_Ie4Layer._create = function (_html, _parent)
{
    _parent = _parent && _parent._layer || _parent || document.body;
    _parent.insertAdjacentHTML('beforeEnd', '<div style="position:absolute;visibility:hidden;left:-10000px;top:-10000px;">' + _html + '</div>');
    var _div = _parent.children[_parent.children.length - 1];
    return new _Ie4Layer(_div);
};

_Ie4Layer.prototype =
{
    _isVisible: function () { return this._style.visibility != 'hidden'; },
    _getSize: function () { return { w:this._firstChild.offsetWidth, h:this._firstChild.offsetHeight }; },
    _move: function (o) { this._style.left = o.x + 'px'; this._style.top = o.y + 'px'; },
    _resize: function (o) { this._style.width = o.w + 'px'; this._style.height = o.h + 'px'; },

    _attachSpecialEffect:function (_specialEffect)
    {
        this._specialEffect = _specialEffect;
        this._setVisibility = this._setVisibilityAlternative;
    },

    _setVisibility:function (_value)
    {
        this._style.visibility = _value ? 'inherit' : 'hidden';
    },

    _setVisibilityAlternative:function (_value, _applyLevelSpecialEffects)
    {
        this._specialEffect._beforeVisibilitySet(_applyLevelSpecialEffects);
        this._style.visibility = _value ? 'inherit' : 'hidden';
        this._specialEffect._afterVisibilitySet(_applyLevelSpecialEffects);
    }

};

function _nop()
{
    return '';
}

function _copyObject(_object)
{
    _nop.prototype = _object;
    return new _nop();
}

function _mergeObjects(_object)
{
    var i, j, l, _result = {};

    for (j = 0, l = arguments.length; j < l; j++)
    {
        if (arguments[j])
        {
            for (i in arguments[j])
            {
                _result[i] = arguments[j][i];
            }
        }
    }

    return _result;
}

function _applyDefaults(_object, _template)
{
    for (var i in _template)
    {
        if (_isUndefined(_object[i]))
        {
            _object[i] = _template[i];
        }
    }
}

_preparePairedCalculator = function (_array, _defaultOrigin)
{
    if (!_array._prepared)
    {
        _array.w = _array.x = _prepareCalculator(_array[1], _defaultOrigin, '.w', '.x');
        _array.h = _array.y = _prepareCalculator(_array[0], _defaultOrigin, '.h', '.y');
        _array._prepared = true;
    }

    return _array;
};

_prepareCalculator = function (_value, _defaultOrigin, _coordField, _sizeField)
{
    var _hasFraction = false, _code = '';

    if (_isNumber(_value))
    {
        _code += _value;
    }
    else
    {
        var _match;

        while ((_match = _value.match(/^([-+\.\d+]*)\*?(\w+)/)))
        {
            if (_match[1] === '')
            {
                _defaultOrigin = _match[2];
            }
            else
            {
                switch (_match[1])
                {
                case '-':
                case '+':
                    _code += _match[1] + 1;
                    break;
                default:
                    _hasFraction = _hasFraction || _match[1].indexOf('.') != -1;
                    _code += (_match[1] >= 0 ? '+' : '') + parseFloat(_match[1]);
                    break;
                }

                if (_match[2] != 'px')
                {
                    _code += '*i.' + _match[2] + _coordField;
                }
            }

            _value = _value.slice(_match[0].length);
        }
    }

    if (_defaultOrigin)
    {
        _code += '+i.' + _defaultOrigin + _sizeField;

        switch (_defaultOrigin)
        {
        case 'item':
        case 'previousItem':
            break;
        case 'parentItem':
            _code += '+i.parentLevel' + _sizeField;
            break;
        default:
            _code += '-i.level' + _sizeField;
            break;
        }
    }
    else if (!_code)
    {
        _code = 0;
    }

    if (_hasFraction)
    {
        _code = 'Math.round(' + _code + ')';
    }

    return new Function('i', 'return ' + _code);
};

function _optimizedCall(o1, o2, m1, m2)
{
    var p1 = o1 ? o1._getPath() : [], p2 = o2 ? o2._getPath() : [], i = 0;

    while (i < p1.length && i < p2.length && p1[i] == p2[i])
    {
        i++;
    }

    _callMethods(p1.slice(i), m1);
    _callMethods(p2.slice(i), m2);
}

function _callMethods(_objects, _arguments)
{
    var _methodName, i, l;

    for (_methodName in _arguments)
    {
        if (_isUndefined(_arguments[_methodName]))
        {
            for (i = 0, l = _objects.length; i < l; i++)
            {
                _objects[i][_methodName]();
            }
        }
        else
        {
            for (i = 0, l = _objects.length; i < l; i++)
            {
                _objects[i][_methodName](_arguments[_methodName]);
            }
        }
    }
}

function _resolveStyle(_style, _depth)
{
    if (_isArray(_style))
    {
        if (_isUndefined(_style._depth))
        {
            _style._depth = _depth;
        }

        _style = _style[Math.min(_depth - _style._depth, _style.length - 1)];
    }

    return _style;
}

function _resolveExceptions(_data)
{
    var _pairs = { code:'ocode', image:'oimage', arrow:'oarrow' };

    for (var i in _pairs)
    {
        if (!_isUndefined(_data[i]) && !_isArray(_data[i]))
        {
            _data[i] = [ _data[i], _data[_pairs[i]] || _data[i] ];
        }
    }
}

_maxSize = function (_from, _to)
{
    _to.w = Math.max(_from.w, _to.w);
    _to.h = Math.max(_from.h, _to.h);
};

_copyPoint = function (_from, _to)
{
    _to.x = _from.x;
    _to.y = _from.y;
};

_addPoint = function (_from, _to)
{
    _to.x += _from.x;
    _to.y += _from.y;
};

var _zeroCalculator = _preparePairedCalculator([ 0, 0 ]);

window.COOLjsMenuPRO = _Menu;

