
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




