$('.approveForm').on('submit',function(event){
    event.preventDefault();

    var id = $(this).data('id');
    var token = $(this).data('token');
    console.log(id);

    $.ajax({
        url: "/comment-approve",
        type:"post",
        data:{
            "_token": token,
            id:id
        },
        success:function(response){
            console.log(response);
        },
    });
});

$('.deleteForm').on('submit',function(event){
    event.preventDefault();

    var id = $(this).data('id');
    var token = $(this).data('token');
    console.log(id);

    $.ajax({
        url: "/comment-delete",
        type:"post",
        data:{
            "_token": token,
            id:id
        },
        success:function(response){
            console.log(response);
        },
    });
});
