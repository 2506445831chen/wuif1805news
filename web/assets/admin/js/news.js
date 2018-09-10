$(function () {
    $('#tbody').on('click','.ce',function () {
        var id=$(this).closest('tr').attr('date-id');
        // delete.php
        $.ajax({
            url: '/yemian/admin.php',
            data: {
                c:'news',
                m:'delete',
                id: id
            },
            success: function(data) {
                if (data == '1') {
                    alert('删除成功')
                    location.reload();
                } else {
                    alert('网络出了点问题')
                }
            }
        })
    });

    $('#tbody').on('blur', 'input','textarea', function() {
        var title = $(this).val();
        var dsc=$('#dsy').val();
        var content=$('#cont').val();
        var id = $(this).closest('tr').attr('data-id');
        // update.php
        $.ajax({
            url: '/yemian/admin.php',
            data: {
                c:'news',
                m:'update',
                id: id,
                title: title,
                // dsc:dsc,
                // content:content
            },
            success:function(data){
                console.log(data);
            }
        })
    });

    $("#submit").on('click',function(){
        // insert.php
        $.ajax({
            url:'/yemian/admin.php',
            data:{
                c:'news',
                m:'insert',
                title:$('#title').val(),
                dsc:$('#dsc').val(),
                content:$('#content').val()
            },
            success:function(data){
                if (data == '1') {
                    alert('添加成功')
                    location.reload();
                } else {
                    alert('网络出了点问题')
                }
            }
        })
    })

})