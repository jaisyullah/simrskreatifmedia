/**
 * Scriptcase input plugin
 */
$.widget('scriptcase.scInput', {

	/**
	 * Default options
	 */
	options: {
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
	},

	/**
	 * List of predefined masks
	 */
	masks: {
		'cep' : '99.999-999',
		'cpf' : '999.999.999-99',
		'cnpj': '99.999.999/9999-99',
		'ssn' : '999-99-9999',
		'cc'  : '9999 9999 9999 9999'
	}, // masks

	/**
	 * List of special keys
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
	}, // specialKeys

	//------------------------------------------------------------------------------------------------------------------
	// constructor method

	/**
	 * Plugin instance creator
	 */
	_create: function() {
		this._loadOptions();
		this._initializeSettings();
		this._bindEvents();
		this._createWatermark();
	},

	//------------------------------------------------------------------------------------------------------------------
	// public method

	/**
	 * Format the current value on the input
	 */
	formatValue: function() {
		this._getNewValue();
		this._getRange();
		this._maskValue();
		this._setNewValue();
		this._autoTab();
	}, // formatValue

	//------------------------------------------------------------------------------------------------------------------
	// event handling method

	/**
	 * Bind the input element events
	 */
	_bindEvents: function() {
		this._on(this.element, {
			'focus':    '_onFocus',
			'keypress': '_onKeyPress',
			'input':    '_onInput',
			'blur':     '_onBlur'
		});
	}, // _bindEvents

	/**
	 * Handle the focus event
	 */
	_onFocus: function() {
		this.options.hasChanged = false;

		if (this.options.selectOnFocus) {
			$(this.element).select();
		}
	}, // _onFocus

	/**
	 * Handle the keypress event
	 */
	_onKeyPress: function(e) {
		this._getNewValue();
		this._getRange();
		this._getPressedKey(e);
		this._checkForNegative();

		if (this._isSpecialEnterTab()) {
			var prevDef = this._goToNextElement();

			if (prevDef) {
				e.preventDefault();
			}

			return true;
		}

		if (this._isNotText(this.element[0])) {
			return true;
		}

		if (this.options.isSpecial) {
			if (this._isEnterSubmit('enter')) {
				if (typeof nm_submit_form == 'function') { // para filtro da consulta
					nm_submit_form();
				}
				else {
					document.F1.submit();
				}
			}
			else if (this._isEnterTab('enter')) {
				var prevDef = this._goToNextElement();

				if (prevDef) {
					e.preventDefault();
				}
			}
			else if (13 == this.options.pressedKey && 'textarea' != this.element[0].type) {
				e.preventDefault();
			}

			return true;
		}

		this._checkDecimalsPress();
	}, // _onKeyPress

	/**
	 * Handle the input event
	 */
	_onInput: function() {
		this._getNewValue();
		this._getRange();
		this._maskValue();
		this._setNewValue();
		this._autoTab();
	}, // _onInput

	/**
	 * Handle the blur event
	 */
	_onBlur: function() {
		if (typeof _scCalculatorControl !== 'undefined') {
			if (_scCalculatorControl[$(this.element).attr('id')]) {
				return;
			}
		}

		if (this.options.isNumeric) {
			testValue = this._removeCurrencySymbol($(this.element).val());
			testValue = this._removeNegativeSymbol(testValue);

			if ('' == testValue) {
				$(this.element).val('');
			}
		}

		if ('decimal' == this.options.datatype || 'currency' == this.options.datatype) {
			this._completeDecimal();
		}

		if (typeof _scBrowser != undefined && ('msie' == _scBrowser || 'safari' == _scBrowser) && this.options.hasChanged) {
			$(this.element).trigger('change');
		}
	}, // _onBlur

	//------------------------------------------------------------------------------------------------------------------
	// range methods

	/**
	 * Get the cursor position on the input
	 */
	_getRange: function() {
		this.options.range = {start: 0, end: 0};

		if (!$.browser.msie) {
			this.options.range.start = this.element[0].selectionStart;
			this.options.range.end   = this.element[0].selectionEnd;
		}
		else {
			if ('textarea' == this.element[0].type) {
				var inputRange = $(this.element).getSelection();

				this.options.range.start = inputRange.start;
				this.options.range.end   = inputRange.end;
			}
			else {
				var inputRange = document.selection.createRange();

				this.options.range.start = 0 - inputRange.duplicate().moveStart('character', -100000);
				this.options.range.end   = oPos.start + inputRange.text.length;
			}
		}

		this.options.charsFromRight = this.options.newValue.length - this.options.range.end;
	}, // _getRange

	/**
	 * Set the cursor position on the input
	 */
	_setRange: function(startPos, endPos) {
		if ('undefined' == typeof endPos) {
			endPos = startPos;
		}

		if (this.element[0].setSelectionRange) {
			this.element[0].setSelectionRange(startPos, endPos);
		}
		else {
			var inputRange = this.element[0].createTextRange();

			inputRange.collapse();
			inputRange.moveStart('character', startPos);
			inputRange.moveEnd('character', endPos - startPos);
			inputRange.select();
		}
	}, // _setRange

	//------------------------------------------------------------------------------------------------------------------
	// processing methods

	/**
	 * Get the new value after user input
	 */
	_getNewValue: function() {
		this.options.newValue = $(this.element).val();
	}, // _getNewValue

	/**
	 * Check if the value has changed. If yes, set the new value on the input
	 */
	_setNewValue: function() {
		if (this.options.newValue != this.options.maskedValue) {
			$(this.element).val(this.options.maskedValue);

			var negativePosFix = 0;

			if ('suffix' == this.options.negativePos) {
				if (this.options.isNegative) {
					negativePosFix = 1;
				}
				else if (this.options.pressedMinus) {
					negativePosFix = -1;
				}
			}

			this._setRange(this.options.maskedValue.length - this.options.charsFromRight - negativePosFix);

			this.options.hasChanged = true;
		}
	}, // _setNewValue

	/**
	 * Get the pressed key and char
	 */
	_getPressedKey: function(e) {
		this.options.pressedKey  = e.charCode || e.keyCode || e.which;
		this.options.pressedChar = String.fromCharCode(this.options.pressedKey);
		this.options.isSpecial   = (null != this.specialKeys[this.options.pressedKey]) || e.ctrlKey || e.metaKey || e.altKey;

		if (this.options.isSpecial && ((46 == e.charCode && 0 == e.keyCode && 46 == e.which) || (46 == e.charCode && 46 == e.keyCode && 46 == e.which))) {
			this.options.isSpecial = false;
		}
		/*console.log(e.charCode + " - " + e.keyCode + " - " + e.which);*/
	}, // _getPressedKey

	/**
	 * Check if the negative sign was pressed on a numeric input
	 */
	_checkForNegative: function() {
		if (!this.options.isNumeric || !this.options.allowNegative) {
			return;
		}

		var hasMinus = false, newValue = this.options.newValue;

		while (-1 != (minusPos = newValue.indexOf('-'))) {
			newValue = newValue.substr(0, minusPos) + newValue.substr(minusPos + 1);
			hasMinus = !hasMinus;
		}

		if (this.options.onlyNegative) {
			this.options.isNegative = true;
		}
		else if (!hasMinus && '-' == this.options.pressedChar) {
			this.options.pressedMinus = true;
			this.options.isNegative = true;
		}
		else if (hasMinus && '-' == this.options.pressedChar) {
			this.options.pressedMinus = true;
			this.options.isNegative = false;
		}
		else if (hasMinus && '+' == this.options.pressedChar) {
			this.options.isNegative = false;
		}
		else {
			this.options.isNegative = hasMinus;
		}
	}, // _checkForNegative

	//------------------------------------------------------------------------------------------------------------------
	// configuration methods

	/**
	 * Load any values set on the 'alt' attribute into the plugin options
	 */
	_loadOptions: function() {
		var userOptions = {};

		if ($(this.element).attr('alt')) {
			eval('userOptions = ' + $(this.element).attr('alt') + ';');
		}

		this.options = $.extend(this.options, userOptions);
	},

	/**
	 * Initialize the instance settings according to its type
	 */
	_initializeSettings: function() {
		if ('currency' == this.options.datatype && '' == this.options.currencySymbol) {
			this.options.datatype = 'decimal';
		}

		if (('currency' == this.options.datatype || 'decimal' == this.options.datatype) && 0 == this.options.precision) {
			this.options.datatype = 'integer';
		}

		if ('currency' != this.options.datatype && 'decimal' != this.options.datatype) {
			this.options.manualDecimals = false;
		}

		switch (this.options.datatype) {
			case 'integer':
				if ('left' != this.options.alignment && 'center' != this.options.alignment && 'justify' != this.options.alignment) {
					this.options.alignRight = true;
				}
				this.options.isNumeric       = true;
				this.options.maskList        = this._createIntegerMask(this.options.maxLength, this.options.thousandsFormat, this.options.thousandsSep);
				this.options.maskOrientation = 'left';
				this.options.maskChars       = this.options.thousandsSep;
				this.options.originalMask    = this.options.maskList;
				this.options.precision       = 0;
				break;

			case 'decimal':
				if ('left' != this.options.alignment && 'center' != this.options.alignment && 'justify' != this.options.alignment) {
					this.options.alignRight = true;
				}
				this.options.isNumeric       = true;
				this.options.maskList        = this._createDecimalMask(this.options.maxLength, this.options.thousandsFormat, this.options.decimalSep, this.options.thousandsSep, this.options.precision);
				this.options.maskOrientation = 'left';
				this.options.maskChars       = this.options.decimalSep + this.options.thousandsSep;
				this.options.originalMask    = this.options.maskList;
				break;

			case 'currency':
				if ('left' != this.options.alignment && 'center' != this.options.alignment && 'justify' != this.options.alignment) {
					this.options.alignRight = true;
				}
				this.options.isNumeric       = true;
				this.options.maskList        = this._createDecimalMask(this.options.maxLength, this.options.thousandsFormat, this.options.decimalSep, this.options.thousandsSep, this.options.precision);
				this.options.maskOrientation = 'left';
				this.options.maskChars       = this.options.decimalSep + this.options.thousandsSep + this.options.currencySymbol + ' ';
				this.options.originalMask    = this.options.maskList;
				break;

			case 'datetime':
				this.options.allowNegative = false;
				this.options.maskList      = this._createDateTimeMask(this.options.dateFormat, this.options.dateSep, this.options.timeSep);
				this.options.maskChars     = this.options.dateSep + this.options.timeSep + ' ';
				this.options.originalMask  = this.options.maskList;
				break;

			case 'date':
				this.options.allowNegative = false;
				this.options.maskList      = this._createDateMask(this.options.dateFormat, this.options.dateSep);
				this.options.maskChars     = this.options.dateSep;
				this.options.originalMask  = this.options.maskList;
				break;

			case 'time':
				this.options.allowNegative = false;
				this.options.maskList      = this._createTimeMask(this.options.timeFormat, this.options.timeSep);
				this.options.maskChars     = this.options.timeSep;
				this.options.originalMask  = this.options.maskList;
				break;

			case 'mask':
				this.options.allowNegative = false;
				this.options.maskList      = this.options.maskList;
				this.options.longestMask   = this._getLongestMaskSize(this.options.maskList, this.options.maskChars);
				this.options.originalMask  = this.options.maskList;
				break;

			case 'text':
				this.options.allowedChars = this.options.allowedChars.toLowerCase();
				if(this.options.allowedChars != '')
				{
					this.options.allowedChars += "\r\n";
				}
				this.options.maskChars    = '';
				break;

			default:
				this.options.allowNegative = false;
				this.options.maskList      = this.masks[this.options.datatype] ? this.masks[this.options.datatype] : '';
				this.options.originalMask  = this.options.maskList;
				break;
		}

		if ('' != this.options.maskList) {
			this.options.maskListArray = this.options.maskList.split(';');
		}
		else {
			this.options.maskListArray = new Array();
		}

		this.options.originalLength = this.options.maxLength;
		this.options.maxLength      = this._getMaxLength();
		this.options.maskCharsArray = this.options.maskChars.split('');

		$(this.element).attr('maxlength', this.options.maxLength);
	},

	//------------------------------------------------------------------------------------------------------------------
	// masking methods

	/**
	 * Mask a value according to its configuration
	 */
	_maskValue: function() {
		var cleanValue = this._getCleanValue();

		if ('' == cleanValue) {
			this.options.maskedValue = '';
			this._addNegativeSymbol();
			return;
		}

		this.options.maskedValue = 'text' == this.options.datatype
		                         ? this._filterUnallowedChars(cleanValue)
		                         : this._applyMask(cleanValue);

		this._addNegativeSymbol();
		this._addCurrencySymbol();
	}, // _maskValue

	/**
	 * Remove unallowed characters from the value
	 */
	_filterUnallowedChars: function(cleanValue) {
		if ('' == this.options.allowedChars) {
			return this._matchCase(cleanValue);
		}

		var filtered = '';

		for (var i = 0; i < cleanValue.length; i++) {
			if (-1 < this.options.allowedChars.indexOf(cleanValue.charAt(i).toLowerCase())) {
				filtered += cleanValue.charAt(i);
			}
		}

		return this._matchCase(filtered);
	}, // _filterUnallowedChars

	/**
	 * Apply the current mask to a clean value
	 */
	_applyMask: function(cleanValue) {
		var cleanArray, maskedValue, maskArray;

		if ('left' == this.options.maskOrientation) {
			cleanValue = this._checkMaxLength(cleanValue);
		}

		cleanArray  = cleanValue.split('');
		//cleanArray  = getStringCodePoints(cleanValue);
		maskedValue = '';
		maskArray   = this._getMaskArray(cleanValue.length);

		if ('left' == this.options.maskOrientation) {
			maskArray.reverse();
			cleanArray.reverse();
		}

		this.options.invalidCount = 0;

		for (var i = 0; i < maskArray.length; i++) {
			if (-1 < $.inArray(maskArray[i], this.options.maskCharsArray)) {
				maskedValue += maskArray[i];
			}
			else {
				getChar = true;

				while (getChar) {
					thisChar = cleanArray.shift();
					//thisChar = String.fromCharCode(cleanArray.shift());

					if (this._testChar(thisChar, maskArray[i])) {
						getChar = false;
					}
					else {
						this.options.invalidCount++;
						thisChar = '';
					}

					if (0 == cleanArray.length) {
						getChar = false;
					}
				}

				maskedValue += thisChar;
			}

			if (0 == cleanArray.length) {
				break;
			}
		}

		if ('left' == this.options.maskOrientation) {
			maskedValue = this._strReverse(maskedValue);
		}

		return this._matchCase(maskedValue);
	}, // _applyMask

	/**
	 * Get the mask array to be used to format the input value
	 */
	_getMaskArray: function(valueLength) {
		this.options.mask = '';

		if (1 == this.options.maskListArray.length) {
			this.options.mask = this.options.maskListArray[0];
		}
		else if (1 < this.options.maskListArray.length) {
			for (var i = 0; i < this.options.maskListArray.length; i++) {
				cleanMask  = this._removeMaskChars(this.options.mask            , this.options.maskCharsArray);
				cleanMaskI = this._removeMaskChars(this.options.maskListArray[i], this.options.maskCharsArray);

				if ('' == this.options.mask) {
					this.options.mask = this.options.maskListArray[i];
				}
				else if (cleanMask.length < cleanMaskI.length && cleanMask.length < valueLength) {
					this.options.mask = this.options.maskListArray[i];
				}
			}
		}

		return this.options.mask.split('');
	}, // _getMaskArray

	/**
	 * Adds the currency symbol of a value
	 */
	_addCurrencySymbol: function() {
		if ('' == this.options.maskedValue) {
			return;
		}
		else if ('currency' != this.options.datatype) {
			return;
		}

		this.options.maskedValue = ('left' == this.options.currencyPosition)
		                         ? this.options.currencySymbol + ' ' + this.options.maskedValue
		                         : this.options.maskedValue + ' ' + this.options.currencySymbol;
	}, // _addCurrencySymbol

	/**
	 * Removes the currency symbol of a value
	 */
	_removeCurrencySymbol: function(numValue) {
		if ('currency' != this.options.datatype) {
			return numValue;
		}

		if ('left' == this.options.currencyPosition) {
			if (numValue.substr(0, this.options.currencySymbol.length + 1) == this.options.currencySymbol + ' ') {
				return numValue.substr(this.options.currencySymbol.length + 1);
			}
			else if (numValue.substr(0, this.options.currencySymbol.length) == this.options.currencySymbol) {
				return numValue.substr(this.options.currencySymbol.length);
			}
		}
		else if ('right' == this.options.currencyPosition) {
			var curStr = numValue.substr(numValue.length - this.options.currencySymbol.length - 2),
			    curPos = curStr.indexOf('-');
			if (-1 < curPos) {
				numValue = numValue.substr(0, numValue.length - this.options.currencySymbol.length - 2) + '-'
						+ curStr.substr(0, curPos) + curStr.substr(curPos + 1);
			}

			if (numValue.substr(numValue.length - this.options.currencySymbol.length - 1) == this.options.currencySymbol + ' ') {
				return numValue.substr(0, numValue.length - this.options.currencySymbol.length - 2);
			}
			else if (numValue.substr(numValue.length - this.options.currencySymbol.length) == this.options.currencySymbol) {
				return numValue.substr(0, numValue.length - this.options.currencySymbol.length - 1);
			}
		}

		var valArray  = numValue.split(''),
		    curSymbol = this.options.currencySymbol + ' ',
		    arrSymbol = curSymbol.split('');
		    newValue  = '';

		for (var i = 0; i < valArray.length; i++) {
			if (-1 == $.inArray(numValue.charAt(i), arrSymbol)) {
				newValue += numValue.charAt(i);
			}
		}

		return newValue;
	}, // _removeCurrencySymbol

	/**
	 * Adds the negative symbol to a value
	 */
	_addNegativeSymbol: function() {
		if (!this.options.isNumeric || !this.options.allowNegative) {
			return;
		}

		if (this.options.isNegative) {
			$(this.element).attr('maxlength', this.options.maxLength + 1);
			if ('prefix' == this.options.negativePos) {
				this.options.maskedValue = '-' + this.options.maskedValue;
			}
			else {
				this.options.maskedValue = this.options.maskedValue + '-';
			}
		}
		else {
			$(this.element).attr('maxlength', this.options.maxLength);
		}
	}, // _addNegativeSymbol

	/**
	 * Removes the negative symbol of a value
	 */
	_removeNegativeSymbol: function(numValue) {
		if (!this.options.isNumeric) {
			return;
		}

		while (-1 != (minusPos = numValue.indexOf('-'))) {
			numValue = numValue.substr(0, minusPos) + numValue.substr(minusPos + 1);
		}

		return numValue;
	}, // _removeNegativeSymbol

	/**
	 * Complete a decimal value with trailing zeros
	 */
	_completeDecimal: function() {
		if (1 > this.options.precision) {
			return;
		}

		var newValue = $(this.element).val();

		newValue = this._removeCurrencySymbol(newValue);

		if ('' != newValue) {
			if (-1 == newValue.indexOf(this.options.decimalSep)) {
				newValue += this.options.decimalSep + this._strRepeat('0', this.options.precision)
			}
			else {
				var valueParts = newValue.split(this.options.decimalSep);

				if (valueParts[1].length < this.options.precision) {
					valueParts[1] += this._strRepeat('0', this.options.precision - valueParts[1].length);
					newValue       = valueParts.join(this.options.decimalSep);
				}
			}
		}

		this.options.maskedValue = newValue;

		this._addCurrencySymbol();

		$(this.element).val(this.options.maskedValue);
	}, // _completeDecimal

	/**
	 * Check if the input value exceeds the lenght of the mask when formatting to the left. If it does, remove last
	 * character
	 */
	_checkMaxLength: function(cleanValue) {
		if (this.options.isNumeric && cleanValue.length > this.options.originalLength) {
			cleanValue = cleanValue.substr(0, cleanValue.length - 1);
		}

		return cleanValue;
	}, // _checkMaxLength

	/**
	 * Test if a character 'thisChar' is valid
	 */
	_testChar: function(thisChar, charType) {
		if ('9' == charType) {
			regExpression = new RegExp('[0-9]');
			return regExpression.test(thisChar);
		}
		else if ('a' == charType) {
			regExpression = new RegExp('[a-zA-Z]');
			return regExpression.test(thisChar);
		}
		else if ('*' == charType) {
			regExpression = new RegExp('[0-9a-zA-Z]');
			if (regExpression.test(thisChar)) {
				return true;
			}

			// http://kourge.net/projects/regexp-unicode-block
			/*regExpression = /[\u0600-\u06FF\u0750-\u077F]/;
			if (regExpression.test(thisChar)) {
				return true;
			}*/

			return false;
		}

		return thisChar == charType;
	}, // _testChar

	/**
	 * Transform the text according to the character case configuration
	 */
	_matchCase: function(oldValue) {
		if ('' == oldValue || '' == this.options.lettersCase) {
			return oldValue;
		}

		var newValue = '';

		if ('first' == this.options.lettersCase) {
			var pos = 0;

			while (pos < oldValue.length && ' ' == oldValue.charAt(pos)) {
				newValue += oldValue.charAt(pos++);
			}
			if (pos < oldValue.length) {
				newValue += oldValue.charAt(pos).toUpperCase() + oldValue.substr(pos + 1);
			}
		}
		else if ('upper' == this.options.lettersCase || 'lower' == this.options.lettersCase) {
			for (var i = 0; i < oldValue.length; i++) {
				newValue += ('upper' == this.options.lettersCase)
				          ? oldValue.charAt(i).toUpperCase()
				          : oldValue.charAt(i).toLowerCase();
			}
		}
		else if ('words' == this.options.lettersCase) {
			var words = oldValue.split(' ');

			for (var i = 0; i < words.length; i++) {
				if (0 < words[i].length) {
					words[i] = words[i].charAt(0).toUpperCase() + words[i].substr(1);
				}
			}
			newValue = words.join(' ');
		}

		return newValue;
	}, // _matchCase

	/**
	 * Check if the value has a decimal separator when using manual decimals
	 */
	_checkDecimalsPress: function() {
		if (!this.options.manualDecimals) {
			return;
		}

		var decimalPos   = this.options.newValue.indexOf(this.options.decimalSep),
		    isDecimalKey = this.options.pressedChar == this.options.decimalSep,
		    isNumberKey  = 48 <= this.options.pressedKey && 57 >= this.options.pressedKey,
		    maksParts    = this.options.originalMask.split(this.options.decimalSep);

		if (isNumberKey && -1 == decimalPos) {
			this.options.maskList = maksParts[0];
		}
		else if (isDecimalKey && ((-1 == decimalPos) || (decimalPos >= this.options.range.start && decimalPos <= this.options.range.end))) {
			var decimalSize = this.options.newValue.length - this.options.range.end;

			this.options.forceMask       = true;
			this.options.forceDecimalPos = true;

			if (0 == decimalSize) {
				this.options.maskList = maksParts[0] + this.options.decimalSep;
			}
			else if (decimalSize < this.options.precision) {
				this.options.maskList = maksParts[0] + this.options.decimalSep + maksParts[1].substr(0, decimalSize);
			}
			else {
				this.options.maskList = this.options.originalMask;
			}
		}
		else if (isNumberKey && this.options.range.start == this.options.range.end && this.options.range.end > decimalPos) {
			var decimalSize = this.options.newValue.length - decimalPos;

			this.options.forceMask = true;

			if (this.options.precision == decimalSize) {
				this.options.maskList = this.options.originalMask;
			}
			else {
				this.options.maskList = maksParts[0] + this.options.decimalSep + maksParts[1].substr(0, decimalSize);
			}
		}
		else if (isNumberKey && this.options.range.start == this.options.range.end && this.options.range.end <= decimalPos) {
			var decimalSize = this.options.newValue.length - decimalPos;

			this.options.forceMask = true;

			if (this.options.precision == decimalSize - 1) {
				this.options.maskList = this.options.originalMask;
			}
			else {
				this.options.maskList = maksParts[0] + this.options.decimalSep + maksParts[1].substr(0, decimalSize - 1);
			}
		}
		else if (!isNumberKey && -1 < decimalPos) {
			var decimalSize = this.options.newValue.length - decimalPos;

			this.options.forceMask = true;

			if (this.options.precision == decimalSize) {
				this.options.maskList = this.options.originalMask;
			}
			else {
				this.options.maskList = maksParts[0] + this.options.decimalSep + maksParts[1].substr(0, decimalSize);
			}
		}

		this.options.maskListArray = this.options.maskList.split(';');
		this.options.maxLength     = this.options.maskList.length;
	}, // _checkDecimalsPress

	/**
	 * Get the longest size of the mask list
	 */
	_getLongestMaskSize: function(maskList, charList) {
		var charArray = charList.split(''),
			maskArray = maskList.split(';'),
			maxLength = 0;

		for (var i = 0; i < maskArray.length; i++) {
			maxLength = Math.max(maxLength, this._removeMaskChars(maskArray[i], charArray).length);
		}

		return maxLength;
	}, // _getLongestMaskSize

	//------------------------------------------------------------------------------------------------------------------
	// cleaning methods

	/**
	 * Get the value without any mask characters
	 */
	_getCleanValue: function() {
		var cleanValue = this._removeMaskChars(this.options.newValue, this.options.maskCharsArray);

		if ('currency' == this.options.datatype) {
			cleanValue = this._removeCurrencySymbol(cleanValue);
		}
		if (this.options.isNumeric) {
			cleanValue = this._removeNegativeSymbol(cleanValue);
		}

		if ('integer' == this.options.datatype) {
			cleanValue = this._removeZeros(cleanValue, 0);
		}
		else if ('decimal' == this.options.datatype || 'currency' == this.options.datatype) {
			cleanValue = this._removeZeros(cleanValue, this.options.precision);
		}

		return cleanValue;
	}, // _getCleanValue

	/**
	 * Remove all mask characters leaving only the clean value
	 */
	_removeMaskChars: function(originalValue, maskCharsArray) {
		var unmaskedValue = '';

		for (var i = 0; i < originalValue.length; i++) {
			if (-1 == $.inArray(originalValue.charAt(i), maskCharsArray)) {
				unmaskedValue += originalValue.charAt(i);
			}
		}

		return unmaskedValue;
	}, // _removeMaskChars

	/**
	 * Remove the extra zeros on the left for numerical values
	 */
	_removeZeros: function(numValue, numPrecision) {
		if ('' == numValue) {
			return numValue;
		}

		while ('0' == numValue.substr(0, 1) && numPrecision + 1 < numValue.length) {
			numValue = numValue.substr(1);
		}

		this.options.completedZero = false;
		if (!this.options.manualDecimals && 0 < numPrecision && numPrecision + 1 > numValue.length) {
			numValue                   = this._strRepeat('0', numPrecision + 1 - numValue.length) + numValue;
			this.options.completedZero = true;
		}

		return numValue;
	}, // _removeZeros

	//------------------------------------------------------------------------------------------------------------------
	// mask creation methods

	/**
	 * Create an integer mask based on the input length 'numLength' and the thousands separator 'thousandSep' according
	 * to a given format
	 *
	 * numFormat = 1:  9,999,999,999
	 * numFormat = 2:    9999999,999
	 * numFormat = 3: 9,99,99,99,999
	 */
	_createIntegerMask: function(numLength, numFormat, thousandSep) {
		var numMask = new Array();

		if (1 == numFormat) {
			var iRepeat   = Math.floor(numLength / 3),
			    iComplete = numLength % 3;

			if (0 != iComplete) {
				numMask.push(this._strRepeat('9', iComplete));
			}
			for (var i = 0; i < iRepeat; i++) {
				numMask.push('999');
			}
		}
		else if (2 == numFormat) {
			if (4 > numLength) {
				numMask.push(this._strRepeat('9', numLength));
			}
			else {
				numMask.push(this._strRepeat('9', numLength - 3));
				numMask.push(this._strRepeat('9', 3));
			}
		}
		else if (3 == numFormat) {
			if (4 > numLength) {
				numMask.push(this._strRepeat('9', numLength));
			}
			else {
				var iRepeat   = Math.floor((numLength - 3) / 2),
				    iComplete = (numLength - 3) % 2;

				if (0 != iComplete) {
					numMask.push(this._strRepeat('9', iComplete));
				}
				for (var i = 0; i < iRepeat; i++) {
					numMask.push('99');
				}
				numMask.push(this._strRepeat('9', 3));
			}
		}

		return numMask.join(thousandSep);
	}, // _createIntegerMask

	/**
	 * Create a decimal mask based on the input length 'numLength', the decimal separator 'decimalSep', the thousands
	 * separator 'thousandSep' and the precision 'numPrecision'
	 */
	_createDecimalMask: function(numLength, numFormat, decimalSep, thousandSep, numPrecision) {
		var decimals = '';

		if (0 < numPrecision) {
			numLength -= numPrecision;
			decimals   = decimalSep + this._strRepeat('9', numPrecision)
		}

		return this._createIntegerMask(numLength, numFormat, thousandSep) + decimals;
	}, // _createDecimalMask

	/**
	 * Create a date mask based on the input format 'dateFormat' and the date separator 'dateSep'
	 */
	_createDateMask: function(dateFormat, dateSep) {
		var dateMask = new Array();

		dateFormat = dateFormat.replace(/dd/i,   'd')
		                       .replace(/mm/i,   'm')
		                       .replace(/yyyy/i, 'y')
		                       .replace(/aaaa/i, 'y');

		for (var i = 0; i < dateFormat.length; i++) {
			switch (dateFormat.charAt(i)) {
				case 'd':
				case 'm':
					dateMask.push('99');
					break;

				case 'y':
					dateMask.push('9999');
					break;
			}
		}

		return dateMask.join(dateSep);
	}, // _createDateMask

	/**
	 * Create a time mask based on the input format 'timeFormat' and the time separator 'timeSep'
	 */
	_createTimeMask: function(timeFormat, timeSep) {
		var timeMask = new Array();

		timeFormat = timeFormat.replace(/hh/i,  'h')
		                       .replace(/ii/i,  'i')
		                       .replace(/sss/i, 'm')
		                       .replace(/ss/i,  's');

		for (var i = 0; i < timeFormat.length; i++) {
			switch (timeFormat.charAt(i)) {
				case 'h':
				case 'i':
				case 's':
					timeMask.push('99');
					break;
				case 'm':
					timeMask.push('999');
					break;
			}
		}

		return timeMask.join(timeSep);
	}, // _createTimeMask

	/**
	 * Create a date & time mask based on the input format 'dateTimeFormat', the date separator 'dateSep' and time
	 * separator 'timeSep'
	 */
	_createDateTimeMask: function(dateTimeFormat, dateSep, timeSep) {
		var formatParts = dateTimeFormat.split(';');

		return this._createDateMask(formatParts[0], dateSep) +
		       ' ' +
		       this._createTimeMask(formatParts[1], timeSep);
	}, // _createDateTimeMask

	//------------------------------------------------------------------------------------------------------------------
	// auto tabbing methods

	/**
	 * Auto tab to the next form element
	 */
	_autoTab: function() {
		if (!this.options.autoTab) {
			return;
		}
		else if (this.options.isSpecial || 16 == this.options.pressedKey) {
			return;
		}
		else if ('decimal' == this.options.datatype || 'currency' == this.options.datatype) {
			var sepPos = this.options.maskedValue.indexOf(this.options.decimalSep);

			if (-1 == sepPos) {
				return;
			}
			else if (this.options.maskedValue.substr(sepPos + 1).length < this.options.precision) {
				return;
			}
		}

		if ('mask' == this.options.datatype && this.options.longestMask <= this._removeMaskChars(this.options.maskedValue, this.options.maskChars.split('')).length) {
			this._goToNextElement();
		}
		else if ('mask' != this.options.datatype && !this.options.isNegative && this.options.maskedValue.length >= this.options.maxLength) {
			this._goToNextElement();
		}
		else if ('mask' != this.options.datatype && this.options.isNegative && (this.options.maskedValue.length - 1) >= this.options.maxLength) {
			this._goToNextElement();
		}
	}, // _autoTab

	/**
	 * Get the next form element if it exists
	 */
	_getNextElement: function() {
		var elementList = this.element[0].form.elements,
		    inputIndex  = $.inArray(this.element[0], elementList) + 1,
		    testInput;

		for (var i = inputIndex; i < elementList.length; i++) {
			testInput = $(elementList[i]);

			if (this._isValidInput(testInput)) {
				return testInput;
			}
		}

		var formList  = document.forms,
		    formIndex = $.inArray(this.element[0].form, formList) + 1;

		for (var j = formIndex; j < formList.length; j++) {
			elementList = formList[j].elements;

			for (i = 0; i < elementList.length; i++) {
				testInput = $(elementList[i]);

				if (this._isValidInput(testInput)) {
					return testInput;
				}
			}
		}

		return null;
	}, // _getNextElement

	/**
	 * Move the focus to the next form element
	 */
	_goToNextElement: function() {
		if ('textarea' == this.element[0].type) {
			return false;
		}

		nextElement = this._getNextElement();

		if (nextElement) {
			nextElement.focus();

			return this._isNotText(this.element[0]);
		}

		return false;
	}, // _goToNextElement

	/**
	 * Test if an input is a valid one to focus to
	 */
	_isValidInput: function(testInput) {
		var inputElement = testInput.get(0);

		if (0 >= inputElement.offsetHeight || 0 >= inputElement.offsetWidth || inputElement.disabled) {
			return false;
		}

		if ('file' == inputElement.type) {
			return false;
		}

		return true;
	}, // _isValidInput

	//------------------------------------------------------------------------------------------------------------------
	// watermark methods

	/**
	 * Set the watermark for the input
	 */
	_createWatermark: function() {
		if ('' == this.options.watermark) {
			return;
		}

		$(this.element).attr('placeholder', this.options.watermark);
	}, // _createWatermark

	//------------------------------------------------------------------------------------------------------------------
	// auxiliary methods

	/**
	 * Get the maximum length of an input element
	 */
	_getMaxLength: function() {
		var maxLength = 0;

		if ('' != this.options.maskList) {
			for (var i = 0; i < this.options.maskListArray.length; i++) {
				maxLength = Math.max(maxLength, this.options.maskListArray[i].length);
			}
		}

		if (0 == maxLength) {
			if (0 < this.options.maxLength) {
				return this.options.maxLength;
			}

			var thisElement = $(this.element);

			if (thisElement.attr('maxlength') && 0 < thisElement.attr('maxlength')) {
				return thisElement.attr('maxlength');
			}
			if (thisElement.attr('size') && 0 < thisElement.attr('size')) {
				return thisElement.attr('size');
			}
		}

		if ('currency' == this.options.datatype) {
			maxLength += this.options.currencySymbol.length + 1;
		}

		return maxLength;
	}, // _getMaxLength

	/**
	 * Check if the 'enter' tab option is enabled and which key was pressed
	 */
	_isEnterTab: function(pressedKey) {
		if (!this.options.enterTab) {
			return false;
		}

		if ('enter' == pressedKey) {
			return 13 == this.options.pressedKey;
		}
		else {
			return 9 == this.options.pressedKey;
		}
	}, // _isEnterTab

	/**
	 * Check if the 'enter' submit option is enabled and which key was pressed
	 */
	_isEnterSubmit: function(pressedKey) {
		if (!this.options.enterSubmit) {
			return false;
		}

		if ('enter' == pressedKey) {
			return 13 == this.options.pressedKey;
		}
		else {
			return 9 == this.options.pressedKey;
		}
	}, // _isEnterSubmit

	/**
	 * Check if the input is not text
	 */
	_isNotText: function(thisElement) {
		return ('select' == thisElement.type || 'select-one' == thisElement.type || 'select-multiple' == thisElement.type || 'checkbox' == thisElement.type || 'radio' == thisElement.type);
	}, // _isNotText

	_isSpecialEnterTab: function() {
		return this._isEnterTab('enter') && this._isNotText(this.element[0]);
	}, // _isSpecialEnterTab

	/**
	 * Repeat a string 's' for 'n' times
	 */
	_strRepeat: function(s, n) {
		return new Array(n + 1).join(s);
	}, // _strRepeat

	/**
	 * Reverse a string 's'
	 */
	_strReverse: function(s) {
		return s.split('').reverse().join('');
	} // _strReverse

});