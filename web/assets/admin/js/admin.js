$(function () {
    $('#tbody').on('click', '.remove', function () {
        let id = $(this).closest('tr').attr('data-id');
        console.log(id);
        // delete.php
        $.ajax({
            url: 'admin.php',
            data: {
                c: 'news',
                m: 'actiondelete',
                id: id,
            },
            success: function (data) {
                if (data == '1') {
                    alert('删除成功')
                    location.reload();
                } else {
                    alert('网络出了点问题')
                }
            }
        })
    });
    $(function () {
        let tbody = $('#tbody');
        let add = $('#add');
        let progress = $('#progress');
        $(document).ajaxStart(function () {
            progress.show();
        })
        $(document).ajaxComplete(function () {
            progress.hide();
        })

        tbody.on('blur', 'input', function () {
            let id = $(this).closest('tr').attr('data-id');
            let k = $(this).attr('data-type');
            let v = $(this).val();
            // update.php
            $.ajax({
                url: '/admin.php?c=news&m=actionupdate',
                data: {
                    k: k,
                    v: v,
                    id: id,
                },
                success: function (data) {

                }
            })
        });
    })
    $("#submit").on('click', function () {
        // insert.php
        $.ajax({
            url: '/admin.php',
            data: {
                c: 'news',
                m: 'actioninsert',
                title: $('#title').val(),
                is_default: $('#is_default').val(),
                cid: $('#cid').val(),
                // alert(1);
            },
            success: function (data) {
                if (data == '1') {
                    alert('添加成功')
                    location.reload();
                } else {
                    alert('网络出了点问题')
                }
            }
        })
    })
    $('.avv').on('click', 'a', function () {

        let page = $(this).text();
        console.log(page);
        $.ajax({
            url: '/admin.php?c=admin&m=index&page=' + page,
            success: function (data) {
                // location.reload();
            }
        });
        return false

    })
})