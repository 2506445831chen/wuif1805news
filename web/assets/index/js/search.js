var page=1;
$(function () {
    $('body').on('click','.more',function () {

        $.ajax({
            url:'index.php?c=page&m=search&page='+(page+1),
            data:{
               page:page
            },
            success:function (data) {

                page=page+1;
                data=JSON.parse(data);

                if(data.length>(page-1)*4){
                    data.forEach(v=>{

                }else{
                    $('.more').remove();
                    $('<div id="last">到底了!</div>').appendTo("ul")
                }

            }
        })
    })
    $('body').on('blur','input', function () {
        let wd = $(this).val();
        console.log(1);
        // update.php
        $.ajax({
            url: '/index.php?c=page&m=search',
            data: {
                s: wd
            },
            success: function (data) {
// console.log(1)
//                 alert(1)
            }
        })

    });
})


