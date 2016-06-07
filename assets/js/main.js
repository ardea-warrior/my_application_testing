$('document').ready(function() {
    user_pawonAPP.init();
})
var user_pawonAPP = {
    init: function() {
        var that = this;
        $('#btn').click(function() {
            that.addUser();
        });
        $('#uid').val(pawonLib.guid());
        
    },
    addUser: function () {
        pawonLib.send('/pawoon_user/addUser',
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


