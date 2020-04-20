/**
 * $Id: jquery.scInput.js,v 1.5 2011-12-09 20:24:31 luis Exp $
 */

 var _scCalculatorControl = {};

(function($) {

    $.fn.listen = function() {
        return $.scInput.setInput(this);
    }; // listen

    $.scInput = {

        //---------- Public methods ------------------------------------------//

        /**
         * Initializes the input elements and binds its event handlers.
         */
        setInput: function($oElement) {
            var _this = this;

            return $oElement.each(function() {
                var $this     = $(this),
                    oSettings = _this._loadOptions($this);

                if ('textarea' != this.type || !$.browser.msie || 9 <= parseFloat($.browser.version)) {
                    if (oSettings.alignRight) {
                        $this.css('text-align', 'right');
                    }
                    $this.attr('maxlength', oSettings.maxLength);

                    _this._createWatermark($this, this.type, oSettings);

                    $this.bind('focus'   , {element: _this, settings: oSettings, callEvent: _this._onFocus   }, _this._prepareEvent)
                         .bind('blur'    , {element: _this, settings: oSettings, callEvent: _this._onBlur    }, _this._prepareEvent)
                         .bind('keydown' , {element: _this, settings: oSettings, callEvent: _this._onKeyDown }, _this._prepareEvent)
                         .bind('keyup'   , {element: _this, settings: oSettings, callEvent: _this._onKeyUp   }, _this._prepareEvent)
                         .bind('keypress', {element: _this, settings: oSettings, callEvent: _this._onKeyPress}, _this._prepareEvent)
                         .bind('paste'   , {element: _this, settings: oSettings, callEvent: _this._onPaste   }, _this._preparePasteEvent);
                }
            });
        }, // setInput

        //---------- Event methods -------------------------------------------//

        /**
         * Handles the onBlur event of the input element.
         */
        _onBlur: function(e, o) {
            if (typeof _scCalculatorControl !== "undefined") {
                if (_scCalculatorControl[o.$this.attr("id")]) {
                    return;
                }
            }

            this._applyWatermark(o.$this, o.$clone);

            if (o.isNumeric) {
                sTestValue = this._removeCurrencySymbol(o.$this.val(), o);
                sTestValue = this._removeNegativeSymbol(sTestValue, o);
                if ('' == sTestValue) {
                    o.$this.val('');
                }
            }

            if ('decimal' == o.datatype || 'currency' == o.datatype) {
                this._completeDecimal(o);
            }

            if (o.inputFocusValue != o.$this.val() && !this._isNotText(o._this)) {
                o.$this.trigger('change');
            }

            return true;
        }, // _onBlur

        /**
         * Handles the onFocus event of the input element.
         */
        _onFocus: function(e, o) {
            o.inputFocusValue = o.$this.val();

            if (o.selectOnFocus) {
                o.$this.select();
            }

            return true;
        }, // _onFocus

        /**
         * Handles the onKeyDown event of the input element.
         */
        _onKeyDown: function(e, o) {
            o.isSpecial = (null != this.specialKeys[o.pressedKey]) || e.ctrlKey || e.metaKey || e.altKey;

            return true;
        }, // _onKeyDown

        /**
         * Handles the onKeyPress event of the input element.
         */
        _onKeyPress: function(e, o) {
            if (this._isSpecialEnterTab(o)) {
                var bPrevDef = this._goToNextElement(o);

                if (bPrevDef) {
                    e.preventDefault();
                }

                return true;
            }

            if (this._isNotText(o._this)) {
                return true;
            }

            if (o.isSpecial) {
                if (this._isEnterSubmit(o, 'enter')) {
                   if (typeof nm_submit_form == 'function') {   // para filtro da consulta
                       nm_submit_form();
                   }else{
                       document.F1.submit();
                   }
                }
                else if (this._isEnterTab(o, 'enter')) {
                    var bPrevDef = this._goToNextElement(o);

                    if (bPrevDef) {
                        e.preventDefault();
                    }
                }
                return true;
            }

            if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
                if (0 == e.charCode && 0 == e.which && e.keyCode > 111 && e.keyCode < 123) {
                    return;
                }
            }

            e.preventDefault();

            o.originalValue = this._removeCurrencySymbol(o.originalValue, o);
            o.originalValue = this._removeNegativeSymbol(o.originalValue, o);
            this._checkDecimalsPress(o);
            o.originalValue = this._addNegativeSymbol(o.originalValue, o);
            o.originalValue = this._addCurrencySymbol(o.originalValue, o);

            if (-1 < $.inArray(o.pressedChar, o.maskCharsArray) && !o.forceMask) {
                return true;
            }

            o.newValue    = this._removeCurrencySymbol(this._getNewValue(o), o);
            o.newValue    = this._removeNegativeSymbol(o.newValue, o);
            o.maskedValue = this._maskValue(o);
            o.maskedValue = this._addNegativeSymbol(o.maskedValue, o);
            o.maskedValue = this._addCurrencySymbol(o.maskedValue, o);

            o.$this.val(o.maskedValue);
            this._setRange(o._this, o.maskedValue.length - o.charsFromRight);
            this._checkCurrencyRange(o);

            o.forceMask       = false;
            o.forceDecimalPos = false;

            return true;
        }, // _onKeyPress

        /**
         * Handles the onKeyUp event of the input element.
         */
        _onKeyUp: function(e, o) {
            if (o.isSpecial && 8 != o.pressedKey && 46 != o.pressedKey) {
                return true;
            }

            if (this._isNotText(o._this)) {
                return true;
            }

            o.newValue      = o.isSpecial ? this._getNewValue(o) : o.originalValue;
            o.newValue      = this._removeCurrencySymbol(o.newValue, o);
            o.newValue      = this._removeNegativeSymbol(o.newValue, o);
            o.maskedValue   = this._maskValue(o);
            o.maskedValue   = this._addNegativeSymbol(o.maskedValue, o);
            o.maskedValue   = this._addCurrencySymbol(o.maskedValue, o);

            if (o.maskedValue != o.$this.val()) {
                o.$this.val(o.maskedValue);
                this._setRange(o._this, o.maskedValue.length - o.charsFromRight);
            }

            o.completedZero = false;

            this._autoTab(o);

            return true;
        }, // _onKeyUp

        /**
         * Handles the onPaste event of the input element.
         */
        _onPaste: function(e, o) {
            return this._onKeyUp(e, o);
        }, // _onPaste

        /**
         * Prepares all the information that will be passed to the event
         * handlers.
         */
        _preparePasteEvent: function(e) {
            setTimeout(function () { e.data.element._prepareEvent(e); }, 1);
        }, // _preparePasteEvent

        /**
         * Prepares all the information that will be passed to the event
         * handlers.
         */
        _prepareEvent: function(e) {
            var _this = e.data.element,
                o     = e.data.settings;

            o._this          = e.target;
            o.$this          = $(o._this);
            o.pressedKey     = _this._getPressedKey(e);
            o.pressedChar    = String.fromCharCode(o.pressedKey);
            o.originalValue  = o.$this.val();
            if ('select' == o._this.type || 'select-one' == o._this.type || 'select-multiple' == o._this.type || 'checkbox' == o._this.type || 'radio' == o._this.type) {
                o.range          = 0;
                o.charsFromRight = 0;
            }
            else {
                o.range          = _this._getRange(o._this, e);
                o.charsFromRight = o.originalValue.length - o.range.end;
            }

            e.data.callEvent.call(_this, e, o);
        }, // _prepareEvent

        //---------- Mask methods --------------------------------------------//

        /**
         * Adds the currency symbol of a value.
         */
        _addCurrencySymbol: function(sValue, o) {
            if ('' == sValue) {
                return '';
            }
            else if ('currency' != o.datatype) {
                return sValue;
            }

            return ('left' == o.currencyPosition)
                   ? o.currencySymbol + ' ' + sValue
                   : sValue + ' ' + o.currencySymbol;
        }, // _addCurrencySymbol

        /**
         * Adds the currency symbol of a value.
         */
        _addNegativeSymbol: function(sValue, o) {
            if (!o.isNumeric || !o.allowNegative) {
                return sValue;
            }

            if (o.isNegative) {
                o.$this.attr('maxlength', o.maxLength + 1);
				if ('prefix' == o.negativePos) {
					return '-' + sValue;
				}
				else {
					return sValue + '-';
				}
            }
            else {
                o.$this.attr('maxlength', o.maxLength);
                return sValue;
            }
        }, // _addNegativeSymbol

        /**
         * Applies the current mask to a clean value.
         */
        _applyMask: function(o, sCleanValue) {
            var aCleanArray  = sCleanValue.split(''),
            //var aCleanArray  = getStringCodePoints(sCleanValue),
                sMaskedValue = '',
                aMaskArray   = this._getMaskArray(o, sCleanValue.length);

            if ('left' == o.maskOrientation) {
                aMaskArray.reverse();
                aCleanArray.reverse();
            }

            o.invalidCount = 0;

            for (var i = 0; i < aMaskArray.length; i++) {
                if (-1 < $.inArray(aMaskArray[i], o.maskCharsArray)) {
                    sMaskedValue += aMaskArray[i];
                }
                else {
                    bGetChar = true;

                    while (bGetChar) {
                        sChar = aCleanArray.shift();
                        //sChar = String.fromCharCode(aCleanArray.shift());

                        if (this._testChar(sChar, aMaskArray[i])) {
                            bGetChar = false;
                        }
                        else {
                            o.invalidCount++;
                            sChar = '';
                        }

                        if (0 == aCleanArray.length) {
                            bGetChar = false;
                        }
                    }

                    sMaskedValue += sChar;
                }

                if (0 == aCleanArray.length) {
                    break;
                }
            }

            if ('left' == o.maskOrientation) {
                sMaskedValue = this._strReverse(sMaskedValue);
            }

            return this._matchCase(o, sMaskedValue);
        }, // _applyMask

        /**
         * Checks if the cursor is positioned at the right place when displaying
         * the currency symbol.
         */
        _checkCurrencyRange: function(o) {
            if ('currency' != o.datatype || '' == o.maskedValue) {
                return;
            }

            var oRange = this._getRange(o._this, null);

            if ('right' == o.currencyPosition) {
                var iValuePos = o.maskedValue.length - o.currencySymbol.length - 1;

                if (oRange.end > iValuePos) {
                    this._setRange(o._this, iValuePos);
                }
            }
        }, // _checkCurrencyRange

        /**
         * Checks if the value has a decimal separator when using manual
         * decimals.
         */
        _checkDecimalsPress: function(o) {
            if (!o.manualDecimals) {
                return;
            }

            var iDecimalPos = o.originalValue.indexOf(o.decimalSep),
                bDecimalKey = o.pressedChar == o.decimalSep,
                bNumberKey  = 48 <= o.pressedKey && 57 >= o.pressedKey,
                aMaskParts  = o.originalMask.split(o.decimalSep);

            if (bNumberKey && -1 == iDecimalPos) {
                o.maskList = aMaskParts[0];
            }
            else if (bDecimalKey && ((-1 == iDecimalPos) || (iDecimalPos >= o.range.start && iDecimalPos <= o.range.end))) {
                var iDecimalSize  = o.originalValue.length - o.range.end;
                o.forceMask       = true;
                o.forceDecimalPos = true;

                if (0 == iDecimalSize) {
                    o.maskList = aMaskParts[0] + o.decimalSep;
                }
                else if (iDecimalSize < o.precision) {
                    o.maskList = aMaskParts[0] + o.decimalSep + aMaskParts[1].substr(0, iDecimalSize);
                }
                else {
                    o.maskList = o.originalMask;
                }
            }
            else if (bNumberKey && o.range.start == o.range.end && o.range.end > iDecimalPos) {
                var iDecimalSize  = o.originalValue.length - iDecimalPos;
                o.forceMask       = true;

                if (o.precision == iDecimalSize) {
                    o.maskList = o.originalMask;
                }
                else {
                    o.maskList = aMaskParts[0] + o.decimalSep + aMaskParts[1].substr(0, iDecimalSize);
                }
            }
            else if (bNumberKey && o.range.start == o.range.end && o.range.end <= iDecimalPos) {
                var iDecimalSize  = o.originalValue.length - iDecimalPos;
                o.forceMask       = true;

                if (o.precision == iDecimalSize - 1) {
                    o.maskList = o.originalMask;
                }
                else {
                    o.maskList = aMaskParts[0] + o.decimalSep + aMaskParts[1].substr(0, iDecimalSize - 1);
                }
            }
            else if (!bNumberKey && -1 < iDecimalPos) {
                var iDecimalSize  = o.originalValue.length - iDecimalPos;
                o.forceMask       = true;

                if (o.precision == iDecimalSize) {
                    o.maskList = o.originalMask;
                }
                else {
                    o.maskList = aMaskParts[0] + o.decimalSep + aMaskParts[1].substr(0, iDecimalSize);
                }
            }

            o.maxLength = o.maskList.length;
        }, // _checkDecimalsPress

        /**
         * Completes a decimal value with trailing zeros.
         */
        _completeDecimal: function(o) {
            if (1 > o.precision) {
                return;
            }

            var sValue = o.$this.val();

            sValue = this._removeCurrencySymbol(sValue, o);

            if ('' != sValue) {
                if (-1 == sValue.indexOf(o.decimalSep)) {
                    sValue += o.decimalSep + this._strRepeat('0', o.precision)
                }
                else {
                    var aParts = sValue.split(o.decimalSep);

                    if (aParts[1].length < o.precision) {
                        aParts[1] += this._strRepeat('0', o.precision - aParts[1].length);
                        sValue     = aParts.join(o.decimalSep);
                    }
                }
            }

            sValue = this._addCurrencySymbol(sValue, o);

            o.$this.val(sValue);
        }, // _completeDecimal

        /**
         * Creates a decimal mask based on the input length 'iLength', the
         * decimal separator 'sDecimal', the thousands separator 'sThousands'
         * and the precision 'iPrecision'.
         */
        _createDecimalMask: function(iLength, sFormat, sDecimal, sThousands, iPrecision) {
            var sDecimals = '';

            if (0 < iPrecision) {
                iLength  -= iPrecision;
                sDecimals = sDecimal + this._strRepeat('9', iPrecision)
            }

            return this._createIntegerMask(iLength, sFormat, sThousands) + sDecimals;
        }, // _createDecimalMask

        /**
         * Creates a date mask based on the input format 'sFormat' and the date
         * separator 'sSeparator'.
         */
        _createDateMask: function(sFormat, sSeparator) {
            var aMask = new Array();

            sFormat = sFormat.replace(/dd/i,   'd')
                             .replace(/mm/i,   'm')
                             .replace(/yyyy/i, 'y')
                             .replace(/aaaa/i, 'y');

            for (var i = 0; i < sFormat.length; i++) {
                switch (sFormat.charAt(i)) {
                    case 'd':
                    case 'm':
                        aMask.push('99');
                        break;

                    case 'y':
                        aMask.push('9999');
                        break;
                }
            }

            return aMask.join(sSeparator);
        }, // _createDateMask

        /**
         * Creates a date & time mask based on the input format 'sFormat' and
         * the date separator 'sDateSep' and time separator 'sTimeSep'.
         */
        _createDateTimeMask: function(sFormat, sDateSep, sTimeSep) {
            var aPartsFormat = sFormat.split(';');

            return this._createDateMask(aPartsFormat[0], sDateSep) +
                   ' ' +
                   this._createTimeMask(aPartsFormat[1], sTimeSep);
        }, // _createDateTimeMask

        /**
         * Creates an integer mask based on the input length 'iLength' and the
         * thousands separator 'sThousands' according to a given format.
         *
         * sFormat = 1:  9,999,999,999
         * sFormat = 2:    9999999,999
         * sFormat = 3: 9,99,99,99,999
         */
        _createIntegerMask: function(iLength, sFormat, sThousands) {
            var aMask = new Array();

            if (1 == sFormat) {
                var iRepeat   = Math.floor(iLength / 3),
                    iComplete = iLength % 3;

                if (0 != iComplete) {
                    aMask.push(this._strRepeat('9', iComplete));
                }
                for (var i = 0; i < iRepeat; i++) {
                    aMask.push('999');
                }
            }
            else if (2 == sFormat) {
                if (4 > iLength) {
                    aMask.push(this._strRepeat('9', iLength));
                }
                else {
                    aMask.push(this._strRepeat('9', iLength - 3));
                    aMask.push(this._strRepeat('9', 3));
                }
            }
            else if (3 == sFormat) {
                if (4 > iLength) {
                    aMask.push(this._strRepeat('9', iLength));
                }
                else {
                    var iRepeat   = Math.floor((iLength - 3) / 2),
                        iComplete = (iLength - 3) % 2;

                    if (0 != iComplete) {
                        aMask.push(this._strRepeat('9', iComplete));
                    }
                    for (var i = 0; i < iRepeat; i++) {
                        aMask.push('99');
                    }
                    aMask.push(this._strRepeat('9', 3));
                }
            }

            return aMask.join(sThousands);
        }, // _createIntegerMask

        /**
         * Creates a time mask based on the input format 'sFormat' and the time
         * separator 'sSeparator'.
         */
        _createTimeMask: function(sFormat, sSeparator) {
            var aMask = new Array();

            sFormat = sFormat.replace(/hh/i, 'h')
                             .replace(/ii/i, 'i')
                             .replace(/sss/i, 'm')
                             .replace(/ss/i, 's');

            for (var i = 0; i < sFormat.length; i++) {
                switch (sFormat.charAt(i)) {
                    case 'h':
                    case 'i':
                    case 's':
                        aMask.push('99');
                        break;
                    case 'm':
                        aMask.push('999');
                        break;
                }
            }

            return aMask.join(sSeparator);
        }, // _createTimeMask

        /**
         * Removes unallowed characters from the value.
         */
        _filterUnallowedChars: function(o, sCleanValue) {
            if ('' == o.allowedChars) {
                return this._matchCase(o, sCleanValue);
            }

            var sFiltered = '';

            for (var i = 0; i < sCleanValue.length; i++) {
                if (-1 < o.allowedChars.indexOf(sCleanValue.charAt(i).toLowerCase())) {
                    sFiltered += sCleanValue.charAt(i);
                }
            }

            return this._matchCase(o, sFiltered);
        }, // _filterUnallowedChars

        /**
         * Gets the longest size of the mask list.
         */
        _getLongestMaskSize: function(sList, sChars) {
            var aChars = sChars.split(''),
                aList  = sList.split(';'),
                iMax   = 0;

            for (var i = 0; i < aList.length; i++) {
                iMax = Math.max(iMax, this._removeMaskChars(aList[i], aChars).length);
            }

            return iMax;
        }, // _getLongestMaskSize

        /**
         * Gets the value without any mask characters.
         */
        _getCleanValue: function(o) {
            var sCleanValue = this._removeMaskChars(o.newValue, o.maskCharsArray);

            if ('integer' == o.datatype) {
                sCleanValue = this._removeZeros(o, sCleanValue, 0);
            }
            else if ('decimal' == o.datatype || 'currency' == o.datatype) {
                sCleanValue = this._removeZeros(o, sCleanValue, o.precision);
            }

            return sCleanValue;
        }, // _getCleanValue

        /**
         * Gets the mask array to be used to format the input value.
         */
        _getMaskArray: function(o, iValueLength) {
            if ('' != o.maskList) {
                var aMaskArray = o.maskList.split(';');
            }
            else {
                var aMaskArray = new Array();
            }

            o.mask = '';
            if (1 == aMaskArray.length) {
                o.mask = aMaskArray[0];
            }
            else if (1 < aMaskArray.length) {
                for (var i = 0; i < aMaskArray.length; i++) {
                    sCleanMask  = this._removeMaskChars(o.mask       , o.maskCharsArray);
                    sCleanMaskI = this._removeMaskChars(aMaskArray[i], o.maskCharsArray);

                    if ('' == o.mask) {
                        o.mask = aMaskArray[i];
                    }
                    else if (sCleanMask.length < sCleanMaskI.length && sCleanMask.length < iValueLength) {
                        o.mask = aMaskArray[i];
                    }
                }
            }

            return o.mask.split('');
        }, // _getMaskArray

        /**
         * Gets the input value with the new pressed key.
         */
        _getNewValue: function(o) {
            if (o.isSpecial) {
                return o.originalValue;
            }

            var sNewValue = o.originalValue.substr(0, o.range.start)
                          + o.pressedChar
                          + o.originalValue.substr(o.range.end);

            return sNewValue;
        }, // _getNewValue

        /**
         * Masks a value according to its configuration.
         */
        _maskValue: function(o) {
            if ('currency' == o.datatype && !o.manualDecimals && o.newValue.length > (o.maxLength - o.currencySymbol.length - 1)) {
                var sRetValue = this._removeCurrencySymbol(o.originalValue, o);
                sRetValue     = this._removeNegativeSymbol(sRetValue, o);
                return sRetValue;
            }
            else if (o.newValue.length > o.maxLength && o.newValue.substr(0,1) == 0 && ('integer' == o.datatype || 'decimal' == o.datatype)) {
                 o.newValue = o.newValue.substr(1);
            }
            else if (o.newValue.length > o.maxLength) {
                var sRetValue = this._removeCurrencySymbol(o.originalValue, o);
                sRetValue     = this._removeNegativeSymbol(sRetValue, o);
                return sRetValue;
            }

            var sCleanValue = this._getCleanValue(o);

            if ('' == sCleanValue) {
                return '';
            }

            var sMaskedValue = 'text' == o.datatype
                             ? this._filterUnallowedChars(o, sCleanValue)
                             : this._applyMask(o, sCleanValue);

            return sMaskedValue;
        }, // _maskValue

        /**
         *
         */
        _matchCase: function(o, sValue) {
            if ('' == sValue || '' == o.lettersCase) {
                return sValue;
            }

            var sNew = '';

            if ('first' == o.lettersCase) {
                var iPos = 0;

                while (iPos < sValue.length && ' ' == sValue.charAt(iPos)) {
                    sNew += sValue.charAt(iPos++);
                }
                if (iPos < sValue.length) {
                    sNew += sValue.charAt(iPos).toUpperCase() + sValue.substr(iPos + 1);
                }
            }
            else if ('upper' == o.lettersCase || 'lower' == o.lettersCase) {
                for (var i = 0; i < sValue.length; i++) {
                    sNew += ('upper' == o.lettersCase)
                          ? sValue.charAt(i).toUpperCase()
                          : sValue.charAt(i).toLowerCase();
                }
            }
            else if ('words' == o.lettersCase) {
                var aParts = sValue.split(' ');

                for (var i = 0; i < aParts.length; i++) {
                    if (0 < aParts[i].length) {
                        aParts[i] = aParts[i].charAt(0).toUpperCase() + aParts[i].substr(1);
                    }
                }
                sNew = aParts.join(' ');
            }

            return sNew;
        }, // _matchCase

        /**
         * Removes the currency symbol of a value.
         */
        _removeCurrencySymbol: function(sValue, o) {
            if ('currency' != o.datatype) {
                return sValue;
            }

            if ('left' == o.currencyPosition) {
                if (sValue.substr(0, o.currencySymbol.length + 1) == o.currencySymbol + ' ') {
                    return sValue.substr(o.currencySymbol.length + 1);
                }
                else if (sValue.substr(0, o.currencySymbol.length) == o.currencySymbol) {
                    return sValue.substr(o.currencySymbol.length);
                }
            }
            else if ('right' == o.currencyPosition) {
                var sCurStr = sValue.substr(sValue.length - o.currencySymbol.length - 2),
                    iCurPos = sCurStr.indexOf('-');
                if (-1 < iCurPos) {
                    sValue = sValue.substr(0, sValue.length - o.currencySymbol.length - 2) + '-'
                            + sCurStr.substr(0, iCurPos) + sCurStr.substr(iCurPos + 1);
                }

                if (sValue.substr(sValue.length - o.currencySymbol.length - 1) == o.currencySymbol + ' ') {
                    return sValue.substr(0, sValue.length - o.currencySymbol.length - 2);
                }
                else if (sValue.substr(sValue.length - o.currencySymbol.length) == o.currencySymbol) {
                    return sValue.substr(0, sValue.length - o.currencySymbol.length - 1);
                }
            }

            var aValue  = sValue.split(''),
                sSymbol = o.currencySymbol + ' ',
                aSymbol = sSymbol.split('');
                sNew    = '';

            for (var i = 0; i < aValue.length; i++) {
                if (-1 == $.inArray(sValue.charAt(i), aSymbol)) {
                    sNew += sValue.charAt(i);
                }
            }

            return sNew;
        }, // _removeCurrencySymbol

        /**
         * Removes the negative symbol of a value.
         */
        _removeNegativeSymbol: function(sValue, o) {
            if (!o.isNumeric) {
                return sValue;
            }

            var hasMinus = false;

            while (-1 != (iPos = sValue.indexOf('-'))) {
                sValue   = sValue.substr(0, iPos) + sValue.substr(iPos + 1);
                hasMinus = !hasMinus;
            }

            if (o.onlyNegative) {
                o.isNegative = true;
            }
            else if (!hasMinus && '-' == o.pressedChar) {
				o.pressedMinus = true;
                o.isNegative = true;
            }
            else if (hasMinus && '-' == o.pressedChar) {
				o.pressedMinus = true;
                o.isNegative = false;
            }
            else if (hasMinus && '+' == o.pressedChar) {
                o.isNegative = false;
            }
            else {
                o.isNegative = hasMinus;
            }

            return sValue;
        }, // _removeNegativeSymbol

        /**
         * Removes all mask characters leaving only the clean value.
         */
        _removeMaskChars: function(sOriginalValue, aMaskCharsArray) {
            var sNewValue = '';

            for (var i = 0; i < sOriginalValue.length; i++) {
                if (-1 == $.inArray(sOriginalValue.charAt(i), aMaskCharsArray)) {
                    sNewValue += sOriginalValue.charAt(i);
                }
            }

            return sNewValue;
        }, // _removeMaskChars

        /**
         * Removes the extra zeros on the left for numerical values.
         */
        _removeZeros: function(o, sValue, iPrecision) {
            if ('' == sValue) {
                return sValue;
            }

            while ('0' == sValue.substr(0, 1) && iPrecision + 1 < sValue.length) {
                sValue = sValue.substr(1);
            }

            o.completedZero = false;
            if (!o.manualDecimals && 0 < iPrecision && iPrecision + 1 > sValue.length) {
                sValue          = this._strRepeat('0', iPrecision + 1 - sValue.length) + sValue;
                o.completedZero = true;
            }

            return sValue;
        }, // _removeZeros

        /**
         * Tests if a character 'sChar' is valid.
         */
        _testChar: function(sChar, sType) {
            if ('9' == sType) {
                oRegExp = new RegExp('[0-9]');
                return oRegExp.test(sChar);
            }
            else if ('a' == sType) {
                oRegExp = new RegExp('[a-zA-Z]');
                return oRegExp.test(sChar);
            }
            else if ('*' == sType) {
                oRegExp = new RegExp('[0-9a-zA-Z]');
                if (oRegExp.test(sChar)) {
					return true;
				}

				// http://kourge.net/projects/regexp-unicode-block
                /*oRegExp = /[\u0600-\u06FF\u0750-\u077F]/;
                if (oRegExp.test(sChar)) {
					return true;
				}*/

				return false;
            }

            return sChar == sType;
        }, // _testChar

        //---------- Watermark methods ---------------------------------------//

        /**
         * Applies the watermark to the input element.
         */
        _applyWatermark: function($oElement, $oClone) {
            if (null == $oClone) {
                return;
            }

            if ('' == $oElement.val()) {
                $oElement.hide();
                $oClone.show();
            }
            else {
                $oElement.show();
                $oClone.hide();
            }
        }, // _applyWatermark

        /**
         * Creates the clone object that will display the watermark.
         */
        _createWatermark: function($oElement, sType, oSettings) {
            if ('' == oSettings.watermark) {
                return;
            }

            oSettings.$clone = $oElement.clone();

            var $oClone = oSettings.$clone;

            if ('password' == $oClone[0].type) {
                $oClone[0].type = 'text';
            }

            $oClone.attr('name', 'sc_clone_' + $oElement.attr('name'))
                   .val(oSettings.watermark)
                   .addClass(oSettings.watermarkClass)
                   .insertAfter($oElement)
                   .bind('focus', {element: $oElement, clone: $oClone}, this._removeWatermark);

            this._applyWatermark($oElement, $oClone);
        }, // _createWatermark

        /**
         * Removes the watermark of the input element.
         */
        _removeWatermark: function(e) {
            var $oElement = e.data.element,
                $oClone   = e.data.clone;

            if (null == $oClone) {
                return;
            }

            $oClone.hide();
            $oElement.show().focus().trigger('focus');
        }, // _removeWatermark

        //---------- Auto tab methods ----------------------------------------//

        /**
         * Auto tabs to the next form element.
         */
        _autoTab: function(o) {
            if (!o.autoTab) {
                return;
            }
            else if (o.isSpecial || 16 == o.pressedKey) {
                return;
            }
            else if ('decimal' == o.datatype || 'currency' == o.datatype) {
                var iPos = o.maskedValue.indexOf(o.decimalSep);

                if (-1 == iPos) {
                    return;
                }
                else if (o.maskedValue.substr(iPos + 1).length < o.precision) {
                    return;
                }
            }

            if ('mask' == o.datatype && o.longestMask <= this._removeMaskChars(o.maskedValue, o.maskChars.split('')).length) {
                this._goToNextElement(o);
            }
            else if ('mask' != o.datatype && !o.isNegative && o.maskedValue.length >= o.maxLength) {
                this._goToNextElement(o);
            }
            else if ('mask' != o.datatype && o.isNegative && (o.maskedValue.length - 1) >= o.maxLength) {
                this._goToNextElement(o);
            }
        }, // _autoTab

        /**
         * Gets the next form element if it exists.
         */
        _getNextElement: function(o) {
            var oInput      = o._this,
                oElements   = oInput.form.elements,
                iInputIndex = $.inArray(oInput, oElements) + 1;

            for (var i = iInputIndex; i < oElements.length; i++) {
                var $oTestInput = $(oElements[i]);

                if (this._isValidInput($oTestInput)) {
                    return $oTestInput;
                }
            }

            var oForms     = document.forms,
                iFormIndex = $.inArray(oInput.form, oForms) + 1;

            for (var j = iFormIndex; j < oForms.length; j++) {
                oElements = oForms[j].elements;

                for (i = 0; i < oElements.length; i++) {
                    $oTestInput = $(oElements[i]);

                    if (this._isValidInput($oTestInput)) {
                        return $oTestInput;
                    }
                }
            }

            return null;
        }, // _getNextElement

        /**
         * Moves the focus to the next form element.
         */
        _goToNextElement: function(o) {
            if ('textarea' == o._this.type) {
                return false;
            }

            $oNext = this._getNextElement(o);

            if ($oNext) {
                //o.$this.trigger('blur');
                $oNext.focus();

                return this._isNotText(o._this);
            }

            return false;
        }, // _goToNextElement

        /**
         * Tests if an input is a valid one to focus to.
         */
        _isValidInput: function(o) {
            var oInput = o.get(0);

            if (0 >= oInput.offsetHeight || 0 >= oInput.offsetWidth || oInput.disabled) {
                return false;
            }

            if ("file" == oInput.type) {
                return false;
            }

            return true;
        }, // _isValidInput

        //---------- Auxiliary methods ---------------------------------------//

        /**
         * Gets the maximum length of an input element.
         */
        _getMaxLength: function(oSettings, $oElement) {
            var iMaxLength = 0;

            if ('' != oSettings.maskList) {
                var aMaskList = oSettings.maskList.split(';');

                for (var i = 0; i < aMaskList.length; i++) {
                    iMaxLength = Math.max(iMaxLength, aMaskList[i].length);
                }
            }

            if (0 == iMaxLength) {
                if (0 < oSettings.maxLength) {
                    return oSettings.maxLength;
                }
                if ($oElement.attr('maxlength') && 0 < $oElement.attr('maxlength')) {
                    return $oElement.attr('maxlength');
                }
                if ($oElement.attr('size') && 0 < $oElement.attr('size')) {
                    return $oElement.attr('size');
                }
            }

            if ('currency' == oSettings.datatype) {
                iMaxLength += oSettings.currencySymbol.length + 1;
            }

            return iMaxLength;
        }, // _getMaxLength

        /**
         * Gets the code of the pressed key.
         */
        _getPressedKey: function(e) {
            return e.charCode || e.keyCode || e.which;
        }, // _getPressedKey

        /**
         * Gets the range selection info of the input element.
         */
        _getRange: function(oInput, e) {
            if (!$.browser.msie) {
                return {
                    start: oInput.selectionStart,
                    end  : oInput.selectionEnd
                };
            }

            var oPos = {start: 0, end: 0};

            if ('textarea' == oInput.type && 'blur' != e.type) {
                var oRange = $(oInput).getSelection();

                oPos.start = oRange.start;
                oPos.end   = oRange.end;
            }
            else {
                var oRange = document.selection.createRange();

                oPos.start = 0 - oRange.duplicate().moveStart('character', -100000);
                oPos.end   = oPos.start + oRange.text.length;
            }

            return oPos;
        }, // _getRange

        /**
         * Checks if the 'enter' tab option is enabled and which key was
         * pressed.
         */
        _isEnterTab: function(o, sKey) {
            if (!o.enterTab) {
                return false;
            }

            if ('enter' == sKey) {
                return 13 == o.pressedKey;
            }
            else {
                return 9 == o.pressedKey;
            }
        }, // _isEnterTab

        /**
         * Checks if the 'enter' submit option is enabled and which key was
         * pressed.
         */
        _isEnterSubmit: function(o, sKey) {
            if (!o.enterSubmit) {
                return false;
            }

            if ('enter' == sKey) {
                return 13 == o.pressedKey;
            }
            else {
                return 9 == o.pressedKey;
            }
        }, // _isEnterSubmit

        _isNotText: function(o) {
            return ('select' == o.type || 'select-one' == o.type || 'select-multiple' == o.type || 'checkbox' == o.type || 'radio' == o.type);
        }, // _isNotText

        _isSpecialEnterTab: function(o) {
            return this._isEnterTab(o, 'enter') && this._isNotText(o);
        }, // _isSpecialEnterTab

        /**
         * Loads the options for the input element '$oElement'. Looks for
         * options defined via its 'alt' attribute to extend the default values.
         * Then completes the options according to the input datatype.
         */
        _loadOptions: function($oElement) {
            if ($oElement.attr('alt')) {
                eval('var oMetadata = ' + $oElement.attr('alt'));
            }
            else {
                var oMetadata = {};
            }

            var oSettings = $.extend({}, this.defaults, oMetadata);

            oSettings = this._setDatatypeSettings(oSettings);

            oSettings.maxLength      = this._getMaxLength(oSettings, $oElement);
            oSettings.maskCharsArray = oSettings.maskChars.split('');

            return oSettings;
        }, // _loadOptions

        /**
         * Sets the parameters depending on the input element data type.
         */
        _setDatatypeSettings: function(o) {
            if ('currency' == o.datatype && '' == o.currencySymbol) {
                o.datatype = 'decimal';
            }

            if (('currency' == o.datatype || 'decimal' == o.datatype) && 0 == o.precision) {
                o.datatype = 'integer';
            }

            if ('currency' != o.datatype && 'decimal' != o.datatype) {
                o.manualDecimals = false;
            }

            switch (o.datatype) {
                case 'integer':
                    if ('left' != o.alignment && 'center' != o.alignment && 'justify' != o.alignment) {
                        o.alignRight = true;
                    }
                    o.isNumeric       = true;
                    o.maskList        = this._createIntegerMask(o.maxLength, o.thousandsFormat, o.thousandsSep);
                    o.maskOrientation = 'left';
                    o.maskChars       = o.thousandsSep;
                    o.originalMask    = o.maskList;
                    break;

                case 'decimal':
                    if ('left' != o.alignment && 'center' != o.alignment && 'justify' != o.alignment) {
                        o.alignRight = true;
                    }
                    o.isNumeric       = true;
                    o.maskList        = this._createDecimalMask(o.maxLength, o.thousandsFormat, o.decimalSep, o.thousandsSep, o.precision);
                    o.maskOrientation = 'left';
                    o.maskChars       = o.decimalSep + o.thousandsSep;
                    o.originalMask    = o.maskList;
                    break;

                case 'currency':
                    if ('left' != o.alignment && 'center' != o.alignment && 'justify' != o.alignment) {
                        o.alignRight = true;
                    }
                    o.isNumeric       = true;
                    o.maskList        = this._createDecimalMask(o.maxLength, o.thousandsFormat, o.decimalSep, o.thousandsSep, o.precision);
                    o.maskOrientation = 'left';
                    o.maskChars       = o.decimalSep + o.thousandsSep + o.currencySymbol + ' ';
                    o.originalMask    = o.maskList;
                    break;

                case 'datetime':
                    o.allowNegative = false;
                    o.maskList      = this._createDateTimeMask(o.dateFormat, o.dateSep, o.timeSep);
                    o.maskChars     = o.dateSep + o.timeSep + ' ';
                    o.originalMask  = o.maskList;
                    break;

                case 'date':
                    o.allowNegative = false;
                    o.maskList      = this._createDateMask(o.dateFormat, o.dateSep);
                    o.maskChars     = o.dateSep;
                    o.originalMask  = o.maskList;
                    break;

                case 'time':
                    o.allowNegative = false;
                    o.maskList      = this._createTimeMask(o.timeFormat, o.timeSep);
                    o.maskChars     = o.timeSep;
                    o.originalMask  = o.maskList;
                    break;

                case 'mask':
                    o.allowNegative = false;
                    o.maskList      = o.maskList;
                    o.longestMask   = this._getLongestMaskSize(o.maskList, o.maskChars);
                    o.originalMask    = o.maskList;
                    break;

                case 'text':
                    o.allowedChars = o.allowedChars.toLowerCase();
                    o.maskChars    = '';
                    break;

                default:
                    o.allowNegative = false;
                    o.maskList      = this.masks[o.datatype] ? this.masks[o.datatype] : '';
                    o.originalMask  = o.maskList;
                    break;
            }

            return o;
        }, // _setDatatypeSettings

        /**
         * Sets the range selection info of the input element.
         */
        _setRange: function(oInput, iStart, iEnd) {
            if ('undefined' == typeof iEnd) {
                iEnd = iStart;
            }

            if (oInput.setSelectionRange) {
                oInput.setSelectionRange(iStart, iEnd);
            }
            else {
                var oRange = oInput.createTextRange();
                oRange.collapse();
                oRange.moveStart('character', iStart);
                oRange.moveEnd('character', iEnd - iStart);
                oRange.select();
            }
        }, // _setRange

        /**
         * Repeats a string 's' for 'n' times.
         */
        _strRepeat: function(s, n) {
            return new Array(n + 1).join(s);
        }, // _strRepeat

        /**
         * Reverses a string 's'.
         */
        _strReverse: function(s) {
            return s.split('').reverse().join('');
        }, // _strReverse

        _debug: function(s) {
            n = $('#id-debug').html();
            $('#id-debug').html('' == n ? s : n + "\n" + s);
        },

        //---------- Constants -----------------------------------------------//

        /**
         * List of predefined masks.
         */
        masks: {
            'cep' : '99.999-999',
            'cpf' : '999.999.999-99',
            'cnpj': '99.999.999/9999-99',
            'ssn' : '999-99-9999',
            'cc'  : '9999 9999 9999 9999'
        }, // masks

        /**
         * Default values for the input element behavior.
         */
        defaults: {
            // General
            datatype        : 'text',
            maxLength       : 0,
            alignment       : '',
            alignRight      : false,
            enterTab        : false,
            enterSubmit     : false,
            selectOnFocus   : true,
            lettersCase     : '',
            // Mask
            mask            : '',
            maskChars       : '(){}[].,;:-+/ ',
            maskList        : '',
            maskOrientation : 'right',
            allowedChars    : '',
            decimalSep      : '.',
            thousandsSep    : ',',
            precision       : 2,
            dateFormat      : 'mdy',
            dateSep         : '/',
            timeFormat      : 'his',
            timeSep         : ':',
            currencySymbol  : '',
            currencyPosition: 'left',
            allowNegative   : true,
            onlyNegative    : false,
			negativePos     : 'prefix',
            manualDecimals  : false,
            thousandsFormat : 1,
            // Auto tab
            autoTab         : false,
            // Watermark
            watermark       : '',
            watermarkClass  : '',
            // Internal
            $clone          : null,
            completedZero   : false,
            invalidCount    : 0,
            inputFocusValue : '',
            isNegative      : false,
            isNumeric       : false,
            pressedMinus    : false,
            hasDecimal      : -1,
            originalMask    : '',
            forceMask       : false,
            forceDecimalPos : false,
            longestMask     : 0
        }, // defaults

        /**
         * List of special keys.
         */
        specialKeys: {
            8  : 'backspace',
            9  : 'tab',
            13 : 'enter',
            16 : 'shift',
            17 : 'control',
            18 : 'alt',
            27 : 'esc',
            33 : 'page up',
            34 : 'page down',
            35 : 'end',
            36 : 'home',
            37 : 'left',
            38 : 'up',
            39 : 'right',
            40 : 'down',
            45 : 'insert',
            46 : 'delete',
            93 : 'menu',
            116: 'f5',
            123: 'f12',
            224: 'command'
        } // specialKeys

    }; // scInput

}) (jQuery);