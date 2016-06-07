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
        $('#uid-txt').val(pawonLib.guid());
        
        $('.delete-btn').click(function() {
            that.deleteUser($(this));
        });
        
        $('.edit-btn').click(function() {
            that.editUser($(this).data('id'));
        });
        
        $('#btn-new').click(function() {
            $('#form')[0].reset();
            $('#uid-txt').val(pawonLib.guid());
        });
    },
    addUser: function () {
        var myForm = $('#form');
        var disabled = myForm.find(':input:disabled').removeAttr('disabled');
        var data = myForm.serialize();
        disabled.attr('disabled','disabled');
        pawonLib.send(base_url+'pawoon_user/saveUser',
            {
                data: data,
                success: function() {
                    pawonLib.notify('saved');
                    $('#uid-txt').val(pawonLib.guid());
                }
            }
        )
    },
    
     
    
    deleteUser: function ($el) {
        var d = confirm("Are you sure to delete!");
        if (d) {
            this.doDeleteUser($el.data('id'));
        }
    },
    
    doDeleteUser: function(id) {
        pawonLib.send( base_url+'pawoon_user/delete/'+id,
            {
                success: function() {
                    $( '#tb-list tr[data-id="' + id + '"]').remove();
                    pawonLib.notify('deleted');
                    
                }
            }
        )
    },
    
    
    editUser: function(id) {
        pawonLib.send( base_url+'pawoon_user/user_by_id/'+id,
            {
                success: function(response) {
                    $('#uid-txt').val(response.data.uuid);
                    $('#nama-txt').val(response.data.nama);
                    $('#alamat-txt').val(response.data.alamat);
                }
            }
        )
    },
    
    
    doAjax: function () {

    },
    
    
    
    
}




