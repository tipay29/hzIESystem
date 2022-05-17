

let l = window.location;

if(l.pathname === '/color-codes') {

    //save fabric code

        $('#btn-save-fabric-code').click(function (e) {

            e.preventDefault();

            let fabric_code = $('#fabric_code_create').val();
            let _token = $('input[name=token]').val();
            let code = {
                fabric_code: fabric_code,
                _token: _token,
            }

            $.ajax({
                type: 'POST',
                url: '/api/fabric-codes',
                data: code,
                success: function (fabric_code) {
                    alert('Color Code Saved');
                    location.reload();
                },
                error: function(XHR, textStatus, errorThrown)
                {
                    alert(textStatus + ': ' + errorThrown + '\n' + XHR.responseJSON['fabric_code'][0]);
                }
            });

        });

    //delete fabric code
        $('.btn_delete_fabric_code').click(function (e) {
            e.preventDefault();

            let fabric_code_id = this.value;

            if (confirm('Delete Color Color ' + fabric_code_id + ' ???')) {

                $.ajax({
                    type: 'DELETE',
                    url: '/api/fabric-codes/' + fabric_code_id,
                    success: function () {
                        alert('Color Code Deleted');
                        location.reload();
                    },
                    error: function () {
                        alert('error deleting color code')
                    }

                });

            }

        });


        $('#btn-create-fabric-code').click(function (e) {

            e.preventDefault();

            $('.fabric_code_div_two').css('display', 'block');

            $('.fabric_code_div_three').css('display', 'none');

        });

        $('.btn_edit_fabric_code').click(function (e) {
            e.preventDefault();
            $('.fabric_code_div_two').css('display', 'none');

            $('.fabric_code_div_three').css('display', 'block');

            let fabric_code_id = this.value;

            $.ajax({
                type: 'GET',
                url: '/api/fabric-codes/' + fabric_code_id,
                success: function (fabric_code) {
                    $('#fabric_code_edit').val(fabric_code.fabric_code);
                },
                error: function () {
                    alert('error loading Color Code info');
                }
            });

            //UPDATE fabric COLOR

            $('#btn-update-fabric-code').click(function (e) {
                e.preventDefault();
                let fabric_code= {
                    fabric_code: $('#fabric_code_edit').val(),
                }

                $.ajax({
                    type: 'PATCH',
                    url: '/api/fabric-codes/' + fabric_code_id,
                    data: fabric_code,
                    success: function (fabric_code) {
                        alert('Color Code Updated');
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
                $('#fabric-code-container').empty().html(data);
                location.hash = page;
            }).fail(function (jqXHR, ajaxOptions, thrownError) {
                alert('No response from server');
            });
        }


}











