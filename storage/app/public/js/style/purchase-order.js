

let l = window.location;

if(l.pathname === '/purchase-orders') {

    //save fabric code

    $('#btn-save-purchase-order').click(function (e) {

        e.preventDefault();

        let purchase_order = $('#purchase_order_create').val();
        let _token = $('input[name=token]').val();
        let order = {
            purchase_order: purchase_order,
            _token: _token,
        }

        $.ajax({
            type: 'POST',
            url: '/api/purchase-orders',
            data: order,
            success: function (purchase_order) {
                alert('Purchase Order Saved');
                location.reload();
            },
            error: function(XHR, textStatus, errorThrown)
            {
                alert(textStatus + ': ' + errorThrown + '\n' + XHR.responseText);
            }
        });

    });

    //delete fabric code
    $('.btn_delete_purchase_order').click(function (e) {
        e.preventDefault();

        let purchase_order_id = this.value;

        if (confirm('Delete Purchase Order ' + purchase_order_id + ' ???')) {

            $.ajax({
                type: 'DELETE',
                url: '/api/purchase-orders/' + purchase_order_id,
                success: function () {
                    alert('Purchase Order Deleted');
                    location.reload();
                },
                error: function () {
                    alert('error deleting purchase order');
                }

            });

        }

    });


    $('#btn-create-purchase-order').click(function (e) {

        e.preventDefault();

        $('.purchase_order_div_two').css('display', 'block');

        $('.purchase_order_div_three').css('display', 'none');

    });

    $('.btn_edit_purchase_order').click(function (e) {

        e.preventDefault();

        $('.purchase_order_div_two').css('display', 'none');

        $('.purchase_order_div_three').css('display', 'block');

        let purchase_order_id = this.value;

        $.ajax({
            type: 'GET',
            url: '/api/purchase-orders/' + purchase_order_id,
            success: function (purchase_order) {
                $('#purchase_order_edit').val(purchase_order.purchase_order);
            },
            error: function () {
                alert('error loading purchase order info');
            }
        });

        //UPDATE fabric COLOR

        $('#btn-update-purchase-order').click(function (e) {

            e.preventDefault();

            let order = {
                purchase_order: $('#purchase_order_edit').val(),
            }

            $.ajax({
                type: 'PATCH',
                url: '/api/purchase-orders/' + purchase_order_id,
                data: order,
                success: function (purchase_order) {
                    alert('Purchase Order Updated');
                    location.reload();
                },
                error: function(XHR, textStatus, errorThrown)
                {
                    alert(textStatus + ': ' + errorThrown + '\n' + XHR.responseText);
                }

            });

        });


    });

    $('window').change(function () {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            } else {
                getData(page);
            }
        }
    });

    $('.pagination a').onclick(function (event) {
        event.preventDefault();
        $('li').removeClass('active');
        $(this).parent('li').addClass('active');
        var url = $(this).attr('href');
        var page = $(this).attr('href').split('page=')[1];
        getData(page);
    });

    function getData(page) {
        // body...
        $.ajax({
            url: '?page=' + page,
            type: 'get',
            datatype: 'html',
        }).done(function (data) {
            $('#purchase-order-container').empty().html(data);
            location.hash = page;
        }).fail(function (jqXHR, ajaxOptions, thrownError) {
            alert('No response from server');
        });
    }


}











