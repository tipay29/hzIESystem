
let l = window.location;

if(l.pathname === '/production-events') {

//save fabric code

    $('#btn-save-production-event').click(function (e) {

        e.preventDefault();

        let event = $('#production_event_create').val();
        let special_date = $('#special_date_create').val();
        let work_hour = $('#work_hour_create').val();
        let bldg = $('#bldg_create').val();
        let _token = $('input[name=token]').val();
        let production_event = {
            event: event,
            special_date: special_date,
            work_hour: work_hour,
            bldg: bldg,
            _token: _token,
        }

        $.ajax({
            type: 'POST',
            url: '/api/production-events',
            data: production_event,
            success: function (prod_event) {
                alert('Production Event Saved');
                location.reload();
            },
            error: function(XHR, textStatus, errorThrown)
            {
                alert(textStatus + ': ' + errorThrown + '\n' + XHR.responseText);
            }
        });

    });

    //delete fabric code
    $('.btn_delete_production_event').click(function (e) {
        e.preventDefault();

        let production_event_id = this.value;

        if (confirm('Delete Production Event ' + production_event_id + ' ???')) {

            $.ajax({
                type: 'DELETE',
                url: '/api/production-events/' + production_event_id,
                success: function () {
                    alert('Production Event Deleted');
                    location.reload();
                },
                error: function () {
                    alert('error deleting production event')
                }

            });

        }

    });


    $('#btn-create-production-event').click(function (e) {

        e.preventDefault();

        $('.production_event_div_two').css('display', 'block');

        $('.production_event_div_three').css('display', 'none');

    });

    $('.btn_edit_production_event').click(function (e) {
        e.preventDefault();
        $('.production_event_div_two').css('display', 'none');

        $('.production_event_div_three').css('display', 'block');

        let production_event_id = this.value;

        console.log(production_event_id);
        $.ajax({
            type: 'GET',
            url: '/api/production-events/' + production_event_id,
            success: function (production_event) {
                console.log(production_event);
                $('#production_event_edit').val(production_event.event);
                $('#special_date_edit').val(production_event.special_date);
                $('#work_hour_edit').val(production_event.work_hour);
                $('#bldg_edit').val(production_event.bldg);
            },
            error: function () {
                alert('error loading production event info');
            }
        });

        //UPDATE fabric COLOR

        $('#btn-update-production-event').click(function (e) {
            e.preventDefault();
            let event = $('#production_event_edit').val();
            let special_date = $('#special_date_edit').val();
            let work_hour = $('#work_hour_edit').val();
            let bldg = $('#bldg_edit').val();
            let _token = $('input[name=token]').val();
            let production_event = {
                event: event,
                special_date: special_date,
                work_hour: work_hour,
                bldg: bldg,
                _token: _token,
            }

            $.ajax({
                type: 'PATCH',
                url: '/api/production-events/' + production_event_id,
                data: production_event,
                success: function (production_event) {
                    alert('Production Event Updated');
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
            $('#production-event-container').empty().html(data);
            location.hash = page;
        }).fail(function (jqXHR, ajaxOptions, thrownError) {
            alert('No response from server');
        });
    }




}
