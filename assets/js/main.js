$('document').ready(function() {
    user_pawonAPP.init();
})
var user_pawonAPP = {
    init: function() {
        var that = this;
        $('#btn').click(function() {
            that.addUser();
        });
        $('#btn-reload').click(function() {
            document.location.reload();
        }) ;
        $('#uid').val(pawonLib.guid());
        
    },
    addUser: function () {
        pawonLib.send('http://demo.ardea.me/pawoon/my_application_testing/pawoon_user/addUser',
            {
                data: $('#form').serialize(),
                success: function() {
                    pawonLib.notify('saved');
                }
            }
        )
    },
    deleteUser: function () {

    },
    doAjax: function () {

    },
}


