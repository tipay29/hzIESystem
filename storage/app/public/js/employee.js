
    let emp_id = $('#emp_id');

    if(emp_id.val() == null){
        $('#emp_name').prop('readonly',false);
    }else{
        $('#emp_name').prop('readonly',true);
    }

    emp_id.change(function(){
        var empNameInput = $('#emp_name');

        $.ajax({
            type: 'GET',
            url: '/api/employees/' + $(this).val(),
            success: function (employee) {
                empNameInput.val(employee.name);
                empNameInput.prop('readonly',true);
            },
            error: function () {
                alert('Error loading data')
            }

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
            $('#employee-container').empty().html(data);
            location.hash = page;
        }).fail(function (jqXHR, ajaxOptions, thrownError) {
            alert('No response from server');
        });
    }




