var page=1;
$(function () {
    $('.more').on('click',function () {

        $.ajax({
            url:'index.php?c=page&m=search&page='+(page+1),
            date:{
               // page:page
            },
            success:function (date) {
                page=page+1;
                data=JSON.parse(data);
                if(data.length){
                    // date.forEach(v=>{
                    //     if(v.cid==2){
                    //         $('<li><a href="">${v.title}</a></li>').appendTo('.redian')
                    //     }else{
                    //         $('<li><a href="">${v.title}</a></li>').appendTo('.redian')
                    //     }
                    // })
                }else{
                    $('.more').remove();
                    $('<div id="last">到底了!</div>').appendTo("ul")
                }
                // location.href='index.php?c=page&m=search&page='+page;
            }
        })
    })
})
tbody.on('blur', 'input', function () {
    let wd = $(this).val();
    // update.php
    $.ajax({
        url: '/index.php?c=page&m=search',
        data: {
            s: wd,
        },
        success: function (data) {

        }
    })
//     $(function(){
//         $(document).keydown(function(event){
//             if(event.keyCode==13){
//                 $(".Box").click(function(){
//                     var inputtext=$("input").val();
//                     $.ajax({
//                         url:"../controller/index/page.php",
//                         data:{title:'inputtext'},
//                     })
//
//                 });
//         });


    });

