

let l = window.location;

if(l.pathname === '/fabric-colors'){

    //save fabric color
    $('#btn-save-fabric-color').click(function(e){

        e.preventDefault();



        let fabric_color = $('#fabric_color_create').val();
        let _token = $('input[name=token]').val();
        let color = {
            fabric_color: fabric_color,
            _token:_token,
        }



        $.ajax({
            type:'POST',
            url: '/api/fabric-colors',
            data: color,
            success: function (fabric_color) {
                alert(color.fabric_color + ' Saved');

                location.reload();
            },
            error: function(XHR, textStatus, errorThrown)
            {
                alert(textStatus + ': ' + errorThrown + '\n' + XHR.responseJSON['fabric_color'][0]);
            }
        });

    });

    //delete fabric color
    $('.btn_delete_fabric_color').click(function(e){
       e.preventDefault();

        let fabric_color_id = this.value;

        if (confirm('Delete Fabric Color ' + fabric_color_id + ' ???')) {

            $.ajax({
                type: 'DELETE',
                url: '/api/fabric-colors/' + fabric_color_id,
                success: function () {
                    alert('Fabric Color Deleted');
                    location.reload();
                },
                error: function () {
                    alert('error deleting fabric color')
                }

            });

        }



    });





    $('#btn-create-fabric-color').click(function(e){

        e.preventDefault();

        $('.fabric_color_div_two').css('display','block');

        $('.fabric_color_div_three').css('display','none');

    });

    $('.btn_edit_fabric_color').click(function(e){

        e.preventDefault();

        $('.fabric_color_div_two').css('display','none');

        $('.fabric_color_div_three').css('display','block');

        let fabric_color_id = this.value;

        $.ajax({
            type: 'GET',
            url: '/api/fabric-colors/' + fabric_color_id,
            success: function(fabric_color){
                $('#fabric_color_edit').val(fabric_color.fabric_color);
            },
            error: function(){
                alert('error loading Fabric Color info');
            }
        });

        //UPDATE fabric COLOR

        $('#btn-update-fabric-color').click(function(e){

            e.preventDefault();

            let fabric_color = {
                fabric_color: $('#fabric_color_edit').val(),
            }

            $.ajax({
                type:'PATCH',
                url: '/api/fabric-colors/' + fabric_color_id,
                data: fabric_color,
                success: function(fabric_color){
                    alert('Fabric Color ID ' + fabric_color_id + ' Updated');
                    location.reload();
                },
                error: function(XHR, textStatus, errorThrown)
                {
                    alert(textStatus + ': ' + errorThrown + '\n' + XHR.responseJSON['fabric_color'][0]);
                }

            });

        });


    });

    $('window').change(function(){
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            } else{
                getData(page);
            }
        }
    });

    $('.pagination a').onclick(function(event){
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
            url : '?page=' + page,
            type : 'get',
            datatype : 'html',
        }).done(function(data){
            $('#fabric-color-container').empty().html(data);
            location.hash = page;
        }).fail(function(jqXHR,ajaxOptions,thrownError){
            alert('No response from server');
        });
    }


}













