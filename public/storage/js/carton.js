
let allCheckBox = $('#allCheckBox');

    allCheckBox.change(function () {
        $('input:checkbox').attr('checked', 'checked');
        // $(this).val('uncheck all');
    }, function () {
        $('input:checkbox').removeAttr('checked');
        // $(this).val('check all');
    });

