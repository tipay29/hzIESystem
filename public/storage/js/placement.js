

let l = window.location;

if(l.pathname === '/placements') {

    //save fabric code

    $('#btn-save-placement').click(function (e) {

        e.preventDefault();

        let placement = $('#placement_create').val();
        let _token = $('input[name=token]').val();
        let place = {
            placement: placement,
            _token: _token,
        }

        $.ajax({
            type: 'POST',
            url: '/api/placements',
            data: place,
            success: function (placement) {
                alert(placement.placement + ' Saved');
                location.reload();
            },
            error: function(XHR, textStatus, errorThrown)
            {
                alert(textStatus + ': ' + errorThrown + '\n' + XHR.responseJSON['placement'][0]);
            }
        });

    });

    //delete fabric code
    $('.btn_delete_placement').click(function (e) {
        e.preventDefault();

        let placement_id = this.value;

        if (confirm('Delete Placement ' + placement_id + ' ???')) {

            $.ajax({
                type: 'DELETE',
                url: '/api/placements/' + placement_id,
                success: function () {
                    alert('Placement Deleted');
                    location.reload();
                },
                error: function () {
                    alert('error deleting placement')
                }

            });

        }

    });


    $('#btn-create-placement').click(function (e) {

        e.preventDefault();

        $('.placement_div_two').css('display', 'block');

        $('.placement_div_three').css('display', 'none');

    });

    $('.btn_edit_placement').click(function (e) {
        e.preventDefault();
        $('.placement_div_two').css('display', 'none');

        $('.placement_div_three').css('display', 'block');

        let placement_id = this.value;

        $.ajax({
            type: 'GET',
            url: '/api/placements/' + placement_id,
            success: function (placement) {
                $('#placement_edit').val(placement.placement);
            },
            error: function () {
                alert('error loading Placement info');
            }
        });

        //UPDATE fabric COLOR

        $('#btn-update-placement').click(function (e) {
            e.preventDefault();
            let placement = {
                placement: $('#placement_edit').val(),
            }

            $.ajax({
                type: 'PATCH',
                url: '/api/placements/' + placement_id,
                data: placement,
                success: function (placement) {
                    alert('Placement ID ' + placement_id + ' Updated');
                    location.reload();
                },
                error: function(XHR, textStatus, errorThrown)
                {
                    alert(textStatus + ': ' + errorThrown + '\n' + XHR.responseJSON['placement'][0]);
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
            $('#placement-container').empty().html(data);
            location.hash = page;
        }).fail(function (jqXHR, ajaxOptions, thrownError) {
            alert('No response from server');
        });
    }


}











