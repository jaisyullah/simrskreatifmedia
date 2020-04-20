<?php
$edit = ($this->GetVar('conn_open') === 'S');
$sgdb_list = $this->GetVar('db_dbms_short');
if ($edit) {
} else {
}
?>
<h1 class="page-title">Connection</h1>
<div id="connection-body-wrapper">
    <div id="connection-body">
        <div id="sgdb-loader" class="ui active inline centered loader spaced"></div>
        <div sc-repeater class="conn-card-wrapper">
            <div class="conn-card">
                <div class="conn-img"><div class="conn-img-container"><img /></div><span class="close">&#x21fd;</span><span class="conn-title">Connection Settings</span></div>
                <div class="conn-text"></div>
                <div class="conn-form">
                    <form onsubmit="formSubmit(event, this)">
                        <h1 class="ui header"></h1>
                        <div class="field-group">
                            <div class="ui input">
                                <label class="sided">
                                    Connection Name:
                                </label>
                                <input name="conn" placeholder="Ex.: conn_example "/>
                            </div>
                        </div>
                        <div class="field-group unmargin">
                            <div class="ui input">
                                <label class="sided">
                                    DBMS:
                                </label>
                                <select name="dbms" class="ui selection dropdown">

                                </select>
                            </div>
                        </div>
                        <div class="ui top attached tabular menu">
                            <a class="item active" data-tab="connection">Connection</a>
                            <a class="concealed item" data-tab="security">Security</a>
                            <a class="concealed item" data-tab="advanced">Advanced</a>
                        </div>
                        <div id="connection-tab" class="ui bottom attached tab segment active" data-tab="connection">
                            <div id="form-loader" class="ui active inline centered loader spaced"></div>
                            <div class="form-fields">
                                <div class="field-group">
                                    <div id="odbc_name" class="concealed ui grown input"><label>ODBC Name</label><input name="server" placeholder=""/></div>
                                    <div id="ip_path" class="concealed ui grown input"><label>IP/Path</label><input name="server" placeholder=""/></div>
                                    <div id="path" class="concealed ui grown input"><label>Path</label><input name="server" placeholder=""/></div>
                                    <div id="tsname" class="concealed ui grown input"><label>TSNAME</label><input name="server" placeholder=""/></div>
                                    <div id="server" class="concealed ui grown input"><label>Server</label><input name="server" placeholder="Ex.: 127.0.0.1"/></div>
                                    <div id="port" class="concealed ui input"><label>Port</label><input name="port" width="120" type="number" placeholder="Ex.: 9999"/></div>
                                </div>
                                <div class="field-group">
                                    <div id="user" class="concealed ui input"><label>Username</label><input name="user" placeholder="Ex.: username "/></div>
                                    <div id="pass" class="concealed ui input"><label>Password</label><input name="pass" type="password" placeholder="Ex.: password"/></div>
                                </div>
                                <div class="field-group">
                                    <? /*
                                    <div>
                                        <label>Database</label>
                                        <select name="database" class="ui selection dropdown">
                                            <option value="">No Database Available</option>
                                        </select>
                                    </div>
                                    <div><input type="button" onclick="listDatabases(this)" name="test" value="List Databases" class="ui button" /></div>
                                    */ ?>
                                    <div id="database" class="concealed ui input"><label>Database</label><input name="base" placeholder="Ex.: my_database"/></div>
                                    <div id="schema" class="concealed ui input"><label>Schema</label><input name="schema" placeholder="Ex.: my_schema"/></div>
                                </div>
                            </div>
                        </div>
                        <div id="security-tab" class="ui bottom attached tab segment" data-tab="security">
                            <div class="form-fields">
                                <div class="field-group unpadded">
                                    <div id="mysql_use_ssl" class="concealed ui checkbox">
                                        <input name="mysql_use_ssl" type="hidden" value="N"/>
                                        <input id="mysql_use_ssl_input" name="mysql_use_ssl" type="checkbox" value="Y"/>
                                        <label for="mysql_use_ssl_input" class="sided">Use SSL</label>
                                    </div>
                                </div>
                                <div class="field-group">
                                    <div id="mysql_ssl_key" class="concealed ui input"><label>SSL Key</label><input name="mysql_ssl_key" placeholder=""/></div>
                                    <div id="mysql_ssl_cert" class="concealed ui input"><label>SSL Certificate</label><input name="mysql_ssl_cert" placeholder=""/></div>
                                    <div id="mysql_ssl_capath" class="concealed ui input"><label>SSL CA Path</label><input name="mysql_ssl_capath" placeholder=""/></div>
                                </div>
                                <div class="field-group">
                                    <div id="mysql_ssl_ca" class="concealed ui input"><label>SSL CA</label><input name="mysql_ssl_capath" placeholder=""/></div>
                                    <div id="mysql_ssl_cipher" class="concealed ui input"><label>SSL Cipher</label><input name="mysql_ssl_cipher" placeholder=""/></div>
                                </div>
                                <div class="field-group">
                                    <div id="db2_autocommit" class="concealed ui input"><label>Autocommit</label><input name="db2_autocommit" placeholder=""/></div>
                                </div>
                                <div class="field-group">
                                    <div id="db2_i5_lib" class="concealed ui input"><label>Use i5 Library</label><input name="db2_i5_lib" placeholder=""/></div>
                                    <div id="db2_i5_naming" class="concealed ui input"><label>i5 Naming</label><input name="db2_i5_naming" placeholder=""/></div>
                                    <div id="db2_i5_commit" class="concealed ui input"><label>i5 Commit</label><input name="db2_i5_commit" placeholder=""/></div>
                                </div>
                            </div>
                        </div>
                        <div id="advanced-tab" class="ui bottom attached tab segment" data-tab="advanced">
                            <div class="form-fields">
                                <div class="field-group unpadded">
                                    <div id="use_persistent" class="concealed ui checkbox">
                                        <input name="use_persistent" type="hidden" value="N"/>
                                        <input id="use_persistent_input" name="use_persistent" type="checkbox" value="Y"/>
                                        <label for="use_persistent_input" class="sided">Persistent Connection</label>
                                    </div>
                                </div>
                                <div class="field-group unpadded">
                                    <div id="use_schema" class="concealed ui checkbox">
                                        <input name="use_schema" type="hidden" value="N"/>
                                        <input id="use_schema_input" name="use_schema" type="checkbox" value="Y"/>
                                        <label for="use_schema_input" class="sided">Use schema</label>
                                    </div>
                                </div>
                                <div class="field-group">
                                    <div id="decimal" class="concealed ui input"><label>Decimal Separator</label><input name="decimal" placeholder=""/></div>
                                    <div id="date_separator" class="concealed ui input"><label>Date Separator</label><input name="date_separator" placeholder=""/></div>
                                </div>
                                <div class="field-group">
                                    <div id="encoding" class="concealed ui input">
                                        <label>Encoding</label>
                                        <select name="encoding" class="ui selection dropdown">
                                            <option value="">No Encoding Available</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ui grid equal width">
                            <div class="column">
                                <div class="ui green button">
                                    <i class="icon wizard"></i>
                                    Test Connection
                                </div>
                                <span id="bt_nav_1">
				                    <input type="submit" name="concluir" value="Save" class="ui primary button" />
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    var connData = (function() {
        var data = {};
        function connData(a, b) {
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
        return connData;
    }());

    function getSGDBList() {
        request({
            method: 'GET',
            op: 'sgdb_list',
            callback: function (data) {
                var template = $('.conn-card-wrapper[sc-repeater]').clone().removeAttr('sc-repeater');
                $('#sgdb-loader').fadeOut(function() {
                    for (var k in data) {
                        if (data.hasOwnProperty(k)) {
                            var d = data[k];
                            var el = $(template).clone();
                            el.find('.conn-img img').attr('src', '<?php echo $nm_config['url_img']; ?>n_db_' + k + '.png');
                            el.find('.conn-text').html(data[k][k]);
                            el.find('.ui.checkbox').each(function () {
                                $(this).find('input[type="checkbox"]').attr('id', $(this).find('input[type="checkbox"]').attr('id') + '_' + k);
                                $(this).find('label').attr('for', $(this).find('input[type="checkbox"]').attr('id'));
                            });
                            el.find('.ui.header').html(data[k][k]);
                            el.attr('data-sgdb', k);
                            el.on('click.openCard', function () {
                                expandSGDB(this);
                            });
                            el.find('.conn-img .close').on('click.closeCard', function (e) {
                                e.stopPropagation();
                                collapseSGDB(this);
                            });
                            $('#connection-body').append(el);
                            el.find('.menu .item').tab();
                        }
                    }
                });
            }
        });
    }

    function expandSGDB(self) {
        if (!$(self).hasClass('open')) {
            var t = $(self)[0].offsetTop;
            var l = $(self)[0].offsetLeft;
            var selSGDB = $(self).attr('data-sgdb');

            connData('sgdb', selSGDB);
            $(self).css({
                'position': 'static'
            });
            $(self).find('.conn-card').attr('style', 'transform:  none; top: ' + t + 'px; left:' + l + 'px; transition: none; width: 100px;');
            $(self).toggleClass('open');
            setTimeout(function () {
                $(self).find('.conn-card').removeAttr('style');
                $(self).css({
                    'position': ''
                });
            }, 0);
            $(self).find('.conn-form').stop().slideToggle();
            $(self).find('.conn-text').stop().slideToggle();
            $('.conn-card-wrapper').not(self).stop().hide();
            $('h1.page-title').stop().hide();
            request({
                method: 'GET',
                op: 'sgdb_show',
                data: {
                    sgdb: selSGDB
                },
                callback: function (data) {
                    $('#form-loader').fadeOut(function() {
                        for (var k in data.sgdb_list) {
                            $(self).find('[name="sgdb"]').append('<option value="' + k + '">' + data.sgdb_list[k] + '</option>');
                        }
                        $(self).find('.ui.dropdown').dropdown({
                            clearable: true
                        });
                        for (var k in data.input_list) {
                            if (data.input_list[k].length > 0) {
                                $(self).find('.tabular.menu > .item[data-tab="'+ k +'"]').removeClass('concealed');
                                for (var kk in data.input_list[k]) {
                                    $(self).find('#'+ k +'-tab .form-fields #' + data.input_list[k][kk]).removeClass('concealed');
                                }
                            }
                            // $(self).find('#connection-tab .form-fields .concealed#').removeClass('concealed');
                            // $(self).find('[name="sgdb"]').append('<option value="' + k + '">' + data.sgdb_list[k] + '</option>');
                        }
                        $(self).find('.form-fields .concealed').remove();
                        $(self).find('.form-fields .field-group').each(function() {
                            if (!$(this).html().trim().length > 0) {
                                $(this).remove();
                            }
                        });
                        $(self).find('.form-fields').slideToggle();
                        $(self).find('#form-loader').slideToggle();
                    });
                }
            });
        }
    }

    function formSubmit(event, self) {
        connData('formData', getFormData(self));
        return true;
        request({
            method: 'GET',
            op: 'input_list',
            data: {
                sgdb: $(self).attr('data-sgdb')
            },
            callback: function (data) {
                $('#form-loader').fadeOut(function() {
                    for (var k in data.sgdb_list) {
                        $(self).find('[name="sgdb"]').append('<option value="' + k + '">' + data.sgdb_list[k] + '</option>');
                    }
                    $(self).find('.ui.dropdown').dropdown({
                        clearable: true
                    });
                    $(self).find('.form-fields').slideToggle();
                    $(self).find('#form-loader').slideToggle();
                });
            }
        });
    }

    function getFormData(self) {
        event.preventDefault();
        var formArr = $(self).closest('form').serializeArray();
        var formData = {};
        formArr.forEach(function (v) {
            formData[v.name] = v.value;
        });
        return formData;
    }

    function collapseSGDB(self) {
        self = $(self).closest('.conn-card-wrapper');
        if ($(self).hasClass('open')) {
            $($(self).find('.tabular.menu > .item')[0]).click();
            // $(self).find('input:not([type="submit"], [type="button"])').val('');
            $(self).find('option').remove();
            $(self).find('.ui.dropdown').dropdown('destroy');
            $(self).find('.conn-form').stop().slideToggle();
            $(self).find('.conn-text').stop().slideToggle();
            $(self).removeClass('open');
            $('.conn-card-wrapper').not(self).stop().fadeToggle();
            $('h1.page-title').stop().fadeToggle();
            $(self).find('.form-fields').slideToggle();
            $(self).find('#form-loader').slideToggle();
        }
    }

    function request(params) {
        params = params || {};
        params.data = params.data || {};
        params.op = params.op || "";
        params.method = params.method || "GET";
        params.callback = params.callback || function () {};
        try {
            $.ajax(window.location.href.split('?')[0] + '?op=' + params.op, {
                method: params.method,
                data: $.param({
                    data: params.data
                })
            }).then(params.callback);
        } catch (e) {
            console.log(e);
        }
    }

    $(document).ready(function(){
        getSGDBList();

    });
</script>