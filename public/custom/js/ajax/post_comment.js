$('.approveForm').on('submit',function(event){
    event.preventDefault();

    var id = $(this).data('id');
    var token = $(this).data('token');

    $.ajax({
        url: "/comment-approve",
        type:"post",
        data:{
            "_token": token,
            id:id
        },
        success:function(){
            $('#comment-approve-delete-block-'+id).addClass('hide');
        },
    });
});

$('.deleteForm').on('submit',function(event){
    event.preventDefault();

    var id = $(this).data('id');
    var token = $(this).data('token');

    $.ajax({
        url: "/comment-delete",
        type:"post",
        data:{
            "_token": token,
            id:id
        },
        success:function(){
            $('#comment-'+id).addClass('hide');
        },
    });
});
