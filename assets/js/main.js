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
        var that = this;
        disabled.attr('disabled','disabled');
        pawonLib.send(base_url+'pawoon_user/saveUser',
            {
                data: data,
                success: function(response) {
                    pawonLib.notify('saved');
                    $('#uid-txt').val(pawonLib.guid());
                    var tbl = $('#tb-list');
                    if (response.process == 'insert') {
                        var str = '<tr data-id="'+response.data.uuid+'">';
                        str += '<td>'+response.data.uuid+'</td>';
                        str += '<td>'+response.data.nama+'</td>';
                        str += '<td>'+response.data.alamat+'</td>';
                        str += '<td><a class="delete-btn" href="javascript:void(0);" data-id="'+response.data.uuid+'">delete</a> | <a class="edit-btn" href="javascript:void(0);" data-id="'+response.data.uuid+'">edit</a></td>';;
                        str += '</tr>';
                        var $newEL = $(str);
                        tbl.find('tbody').append($newEL);
                        $newEL.find('.delete-btn').click(function() {
                            that.deleteUser($(this));
                        });

                        $newEL.find('.edit-btn').click(function() {
                            that.editUser($(this).data('id'));
                        });
                    } else {
                        var row = tbl.find('tr[data-id="'+response.data.uuid+'"]');
                        var tds = row.find('td');
                        tds[1].innerHTML = response.data.nama;
                        tds[2].innerHTML = response.data.alamat;
                    }
                    $('#form')[0].reset();
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




