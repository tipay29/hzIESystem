

let l = window.location;

if(l.pathname === '/fabric-types') {

    //save fabric code

    $('#btn-save-fabric-type').click(function (e) {

        e.preventDefault();

        let fabric_type = $('#fabric_type_create').val();
        let sas = $('#sas_create').val();
        let sas_cut = $('#sas_cut_create').val();
        let _token = $('input[name=token]').val();
        let type = {
            fabric_type: fabric_type,
            sas: sas,
            sas_cut: sas_cut,
            _token: _token,
        }

        $.ajax({
            type: 'POST',
            url: '/api/fabric-types',
            data: type,
            success: function (fabric_type) {
                alert('Fabric Type Saved');
                location.reload();
            },
            error: function(XHR, textStatus, errorThrown)
            {
                alert(textStatus + ': ' + errorThrown + '\n' + XHR.responseJSON['fabric_type'][0]);
            }
        });

    });

    //delete fabric code
    $('.btn_delete_fabric_type').click(function (e) {
        e.preventDefault();

        let fabric_type_id = this.value;

        if (confirm('Delete Fabric Type ' + fabric_type_id + ' ???')) {

            $.ajax({
                type: 'DELETE',
                url: '/api/fabric-types/' + fabric_type_id,
                success: function () {
                    alert('Fabric Type Deleted');
                    location.reload();
                },
                error: function () {
                    alert('error deleting fabric type')
                }

            });

        }

    });


    $('#btn-create-fabric-type').click(function (e) {

        e.preventDefault();

        $('.fabric_type_div_two').css('display', 'block');

        $('.fabric_type_div_three').css('display', 'none');

    });

    $('.btn_edit_fabric_type').click(function (e) {

        e.preventDefault();

        $('.fabric_type_div_two').css('display', 'none');

        $('.fabric_type_div_three').css('display', 'block');

        let fabric_type_id = this.value;

        $.ajax({
            type: 'GET',
            url: '/api/fabric-types/' + fabric_type_id,
            success: function (fabric_type) {
                $('#fabric_type_edit').val(fabric_type.fabric_type);
                $('#sas_edit').val(fabric_type.sas);
                $('#sas_cut_edit').val(fabric_type.sas_cut);
            },
            error: function () {
                alert('error loading Fabric Type info');
            }
        });

        //UPDATE fabric COLOR

        $('#btn-update-fabric-type').click(function (e) {

            e.preventDefault();

            let type = {
                fabric_type: $('#fabric_type_edit').val(),
                sas: $('#sas_edit').val(),
                sas_cut: $('#sas_cut_edit').val(),
            }

            $.ajax({
                type: 'PATCH',
                url: '/api/fabric-types/' + fabric_type_id,
                data: type,
                success: function (fabric_code) {
                    alert('Fabric Type Updated');
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
            $('#fabric-type-container').empty().html(data);
            location.hash = page;
        }).fail(function (jqXHR, ajaxOptions, thrownError) {
            alert('No response from server');
        });
    }


}











