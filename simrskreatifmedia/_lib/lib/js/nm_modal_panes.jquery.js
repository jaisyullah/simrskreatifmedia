


        var _process = function _process(fnExec, timeOut) {
            var timeOutResolve;
            if (typeof timeOut === 'number') {
                timeOutResolve = timeOut
            } else if (typeof timeOut === 'boolean' && timeOut) {
                timeOutResolve = 200;
            } else {
                timeOutResolve = 1000;
            }
            if (typeof timeOut === 'boolean' && timeOut) {
                return new Promise(function (resolve, reject) {
                    var intervalHolder = setInterval(function () {
                        if (fnExec()) {
                            clearInterval(intervalHolder);
                            resolve();
                        }
                    }, timeOutResolve);
                });
            } else {
                return new Promise(function (resolve, reject) {
                    fnExec();
                    setTimeout(function () {
                        resolve();
                    }, timeOutResolve);
                });

            }
        };


/** Adição no jQuery para abrir painéis */
jQuery.fn.openInModalPane = function(params) {
    var _self = $(this[0]);
    if (params === undefined) {
        params = {};
    }

    if (_self[0]) {
        var openButton;
        var closeButton;
        var paneContent;
        var baseID = _self[0].hasAttribute('id') ? _self.attr('id') : '_' + Math.random().toString(36).substr(2, 17);
        var pane = $('#__mp_' + baseID);
        var options = {
            openingButton: (typeof params.openingButton === 'undefined') ? false : params.openingButton,
            preserveClick: (typeof params.preserveClick === 'undefined') ? false : params.preserveClick,
            isFrame: (typeof params.isFrame === 'undefined') ? '' : 'nm-modalpane-isframe',
            holdAjax: (typeof params.holdAjax === 'undefined') ? '' : 'nm-modalpane-holdajax',
            paneTitleText: (typeof params.paneTitleText === 'undefined' || params.paneTitleText === false) ? '' : params.paneTitleText,
            onClose: (typeof params.onClose === 'function') ? function(e,f,g) {
                var ret = params.onClose(e,f,g);
                if (typeof ret === "undefined") {
                    return true;
                } else {
                    return ret;
                }
            } : function(e,f,g) {return true},
            onReady: (typeof params.onReady === 'function') ? params.onReady : function(e,f,g) {},
            beforeReady: (typeof params.beforeReady === 'function') ? params.beforeReady : function(e,f,g) {},
            onOpen: (typeof params.onOpen === 'function') ? params.onOpen : function(e,f,g) {},
            headerContent: (typeof params.headerContent === 'undefined' || params.headerContent === false) ? '' : '<div class="modal-pane-header">' + params.headerContent + '</div>',
            footerContent: (typeof params.footerContent === 'undefined' || params.footerContent === false) ? '' : '<div class="modal-pane-footer">' + params.footerContent + '</div>',
            appendTo: (typeof params.appendTo === 'undefined') ? 'body' : params.appendTo,
            bodyClass: (typeof params.bodyClass === 'undefined') ? 'scGridPage' : params.bodyClass,
            headerClass: (typeof params.headerClass === 'undefined') ? 'scGridHeader' : params.headerClass,
            toolbarClass: (typeof params.toolbarClass === 'undefined') ? 'scGridToolbar' : params.toolbarClass,
            toolbarPaddingClass: (typeof params.toolbarPaddingClass === 'undefined') ? 'scGridToolbarPadding' : params.toolbarPaddingClass,
            toggleHandler: (typeof params.toggleHandler === 'undefined') ? function(e) { $('#__mp_' + e.data.baseID).toggleModalPane(true); } : params.toggleHandler
        };

        if (!pane[0]){
            $(options.appendTo).append('' +
                '<div id="__mp_' + baseID + '" class="' +options.bodyClass+ ' modal-pane-container" ' +
                options.holdAjax +
                options.isFrame +
                ' >' +
                '<div class="modal-pane-wrapper">' +
                '<div class="modal-pane-topbar ' +options.headerClass+ '">' +
                '<span class="close-button-box">&#8249;</span>' +
                '<span class="title-box">' + options.paneTitleText + '</span>' +
                '</div>' +
                options.headerContent +
                '<div class="modal-pane-content ' + _self.attr('class') + '" id="' + baseID + '"></div>' +
                options.footerContent +
                '</div>' +
                '</div>');
            paneContent = $('#' + baseID + '.modal-pane-content');
            _self.children().appendTo(paneContent);
            _self.remove();

            closeButton = $('#__mp_' + baseID + ' > .modal-pane-wrapper > .modal-pane-topbar > .close-button-box');
            closeButton.on('click', function () {
                if (options.onClose($('#' + baseID + '.modal-pane-content'), openButton, closeButton)) {
                    window.history.back();
                }
            })
        }
        paneContent = $('#' + baseID + '.modal-pane-content');
        closeButton = $('#__mp_' + baseID + ' > .modal-pane-wrapper > .modal-pane-topbar > .close-button-box');

        if (options.openingButton !== false) {
            if (options.openingButton === true) {
                $($('.' + options.toolbarClass + ' .' + options.toolbarPaddingClass)[0]).append(' <a class="scButton_default" id="__mp_button_' + baseID + '" style="vertical-align: middle; display:inline-block;">' + options.paneTitleText + '</a>');
                options.openingButton = '#__mp_button_' + baseID;
            }
            openButton = $(options.openingButton);
            _process(function () {
                options.beforeReady(paneContent, openButton, closeButton);
            }).then(function (value) {
                var clickAction = openButton.attr('onclick');
                openButton.removeAttr('href');
                openButton.removeAttr('onclick');
                openButton.off('click.openModalPane');
                if (!options.preserveClick) {
                    openButton.off('click')
                }
                openButton.on('click.openModalPane', {
                    options: options,
                    baseID: baseID,
                    openButton: openButton,
                    closeButton: closeButton
                }, function (e) {
                    if (options.preserveClick) {
                        eval(clickAction.replace('return', 'var dummyvarreplace = '));
                    }
                    options.toggleHandler(e);
                });
                options.onReady(paneContent, openButton, closeButton);
                return baseID;
            })
        }
    }
    return false;
};

jQuery.fn.toggleModalPane = function(state, fromPop) {
    var _self = $(this[0]).closest('.modal-pane-container');
    var didPop = (typeof fromPop === 'undefined' || fromPop === false) ? false : fromPop;
    scBtnGrpHideMobile();
    if (_self[0]) {
        var baseID = _self[0].hasAttribute('id') ? _self.attr('id') : false;
        var paneHoldAjax = false;
        var isFrame = false;

        if (baseID) {
            if (_self.hasClass('modal-pane-container')) {
                if (typeof state === 'undefined') {
                    _self.toggleClass('active');
                    if (_self.hasClass('active')) {
                        if (typeof _self.attr('nm-modalpane-holdajax') !== 'undefined') paneHoldAjax = true;
                        if (typeof _self.attr('nm-modalpane-isframe') !== 'undefined') isFrame = true;
                        $('body, html').addClass('locked');
                        toggleScrollButton('hide');
                    } else {
                        if (typeof _self.attr('nm-modalpane-holdajax') !== 'undefined') paneHoldAjax = false;
                        if (typeof _self.attr('nm-modalpane-isframe') !== 'undefined') isFrame = false;
                        $('body, html').removeClass('locked');
                        checkScroll();
                    }
                } else {
                    if (state) {
                        if (typeof _self.attr('nm-modalpane-holdajax') !== 'undefined') paneHoldAjax = true;
                        if (typeof _self.attr('nm-modalpane-isframe') !== 'undefined') isFrame = true;
                        _self.addClass('active');
                        $('body, html').addClass('locked');
                        toggleScrollButton('hide');
                    } else {
                        if (typeof _self.attr('nm-modalpane-holdajax') !== 'undefined') paneHoldAjax = false;
                        if (typeof _self.attr('nm-modalpane-isframe') !== 'undefined') isFrame = false;
                        _self.removeClass('active');
                        $('body, html').removeClass('locked');
                        checkScroll();
                    }
                }
            }
            if (!didPop){
                if (_self.hasClass('active')) {
                    var data = {
                        'baseID': baseID,
                        'paneHoldAjax': paneHoldAjax,
                        'isFrame': isFrame
                    };
                    if (history.state !== baseID) history.pushState(data, baseID, '#' + baseID);
                } else {
                    // history.pushState(null, null, '#');
                }
            }
        }
        return _self;
    }
    return false;
};

jQuery.fn.modalPaneExists = function() {
    var _self = $(this[0]).closest('.modal-pane-container');
    return !!_self[0];
};