var pawonLib = {
    loadingId: 'loading-indicator',
    send: function (url, params, output) {
        var that = this;
        if (typeof (params) == 'undefined') {
            params = {};
        }
        var outputParams = output || 'json';
        var showLoading = typeof params.showLoading != 'undefined' ? params.showLoading : true;
        var loadingId = typeof params.loadingId != 'undefined' ? params.loadingId : this.loadingId;
        var that = this;
        var ajaxParams = {
            type: params.type || 'POST',
            reponseType: 'defaut',
            statusCode: {
                404: function () {
                    //alert("page not found");
                }
            },
            context: params.context || null,
            url: '',
            crossDomain: params.crossDomain || true,
            resultType: 'normal'
        }

        if (typeof params.data == 'undefined') {
            ajaxParams.data = {
            };
        } else {
            var parameters = '';
            if (typeof params.data == 'object') {
                parameters = params.data;
            } else {
                parameters = params.data;
            }
            ajaxParams.data = parameters;
        }
        if (typeof params.resultType != 'undefined')
            ajaxParams.resultType = params.resultType;

        ajaxParams.data.useAjax = that.useDataParamAjax;


        if (outputParams) {
            ajaxParams.dataType = outputParams;
        }
        if (params.xhrFields) {
            ajaxParams.xhrFields = {
                withCredentials: true
            }
        }
        ajaxParams.error = function (response) {
            if (showLoading)
                $('#' + that.loadingId).hide();
            if (typeof response.result == 'object' && typeof response.result.status != 'undefined') {
                that.notify(response.result.status);
            } else {
                that.notify('ajaxError');
            }
            if (typeof params.error == 'function') {
                params.error();
            }
        }
        ajaxParams.fail = function () {
            if (showLoading)
                $('#' + that.loadingId).hide();
            that.notify('ajaxError');
            if (typeof params.fail == 'function') {
                params.fail();
            }
        }
        ajaxParams.success = function (response) {
            if (showLoading)
                $('#' + that.loadingId).hide();
            if (typeof response.Expired != 'undefined') {
                modalApp.setTitle(response.title);
                modalApp.setContent(response.Message);
                modalApp.onHidenCallback = function() {
                    $.ajax({
                        type: 'get',
                        async: false,
                        url: window.location.origin + '/destroy',
                        success: function () {
                            unloaded = true;
                        },
                        timeout: 5000
                    });
                    document.location.href = base_url;
                };
                modalApp.setFooter('<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>');
                modalApp.showModal();
                clearInterval(tokomartApp.checkTimer);
                return;
            }
            if (params.resultType == 'pure') {
                if (params.success && typeof params.success == 'function') {
                    params.success(response);
                }
            } else {
                if (typeof response.Success != 'undefined') {
                    if (response.Success) {
                        if (params.success && typeof params.success == 'function') {
                            params.success(response);
                        }
                    } else {
                        if (typeof response.Message != 'undefined')
                            that.notify(response.Message);
                    }
                }
            }

        }


        if (showLoading)
            $('#' + that.loadingId).show();
        var request = jQuery.ajax(url, ajaxParams)
        return request;
    },
    notify: function (message) {
        alert (message);

    },
    guid: function () {
        function s4() {
            return Math.floor((1 + Math.random()) * 0x10000)
                    .toString(16)
                    .substring(1);
        }
        return s4() + s4();
        
        
    }
}