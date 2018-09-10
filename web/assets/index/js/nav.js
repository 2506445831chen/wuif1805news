// var del=document.querySelectorAll('.del-box .content .list');
// var dels=document.querySelector('.del-box .content');
// console.log(del);
// var add=document.querySelectorAll('.add-box .content .list');
// var adds=document.querySelector('.add-box .content');
// console.log(add);
$(function () {
    $('.del-box .content').on('click', '.list', function () {
        // $(this).appendTo('.add-box .content');
        $.ajax({
            url : '/index.php',
            data : {
                c : 'page',
                m : 'update',
                id: $(this).attr('data-id'),
                x : 1
            },
            success : function (data) {
                if(data == 1){
                    // $(this).remove();
                    location.reload()
                }else{
                    alert("网络出了点问题")
                }
            }
        })
    });
    $('.add-box .content').on('click', '.list', function () {
        // $(this).appendTo('.del-box .content');
        $.ajax({
            url : '/index.php',
            data : {
                c : 'page',
                m : 'update',
                id: $(this).attr('date-id'),
                x : 0
            },
            success : function (data) {
                // $(this).remove();
                if (data == 1) {
                    // $(this).remove();
                    location.reload()
                } else {
                    alert("网络出了点问题")
                }
                // location.reload()
            }
        })
    })
    });

// $(function() {
//     $('#tbody').on('click','.remove',function () {
//         let id=$(this).closest('tr').attr('data-id');
//         console.log(id);
//         // delete.php
//         $.ajax({
//             url: '/yemian/admin.php',
//             data: {
//                 c:'news',
//                 m:'delete',
//                 id:id,
//             },
//             success: function(data) {
//                 if (data == '1') {
//                     alert('删除成功')
//                     location.reload();
//                 } else {
//                     alert('网络出了点问题')
//                 }
//             }
//         })
//     });
//
//     $("#submit").on('click',function(){
//         // insert.php
//         $.ajax({
//             url:'/yemian/admin.php',
//             data:{
//                 c:'news',
//                 m:'insert',
//                 title:$('#title').val(),
//                 dsc:$('#dsc').val(),
//                 content:$('#content').val()
//             },
//             success:function(data){
//                 if (data == '1') {
//                     alert('添加成功')
//                     location.reload();
//                 } else {
//                     alert('网络出了点问题')
//                 }
//             }
//         })
//     })
//
// })
