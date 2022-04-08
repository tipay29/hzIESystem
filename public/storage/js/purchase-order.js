$('#btn-add-fabric-color-modal').click(function(e){

    e.preventDefault();
    $("#fabric_color_add_modal").modal('show');


});

$('#btn-close-fabric-color-modal').click(function (e) {
    e.preventDefault();
    $("#fabric_color_add_modal").modal('hide');
})

$('#btn-save-fabric-color-modal').click(function(e){

    e.preventDefault();

    let fabric_color = $('#fabric_color_modal').val();
    let _token = $('input[name=token]').val();
    let color = {
        fabric_color: fabric_color,
        _token:_token,
    }

    $.ajax({
        type:'POST',
        url: '/api/fabric-colors',
        data: color,
        success: function (color) {

            alert(color.fabric_color + ' Saved');
            location.reload();

        },
        error: function () {
            alert('error saving');
        }
    });

});

$('#btn-del-fabric-color-modal').click(function(e){
    e.preventDefault();

    let fabric_color = $('#fabric_color').val();

    $.ajax({
        type: 'DELETE',
        url: '/api/fabric-colors/' + fabric_color,
        success: function (r) {

            alert('Color ID '+ r.success + ' has been deleted!');
            location.reload();
        },
        error: function (x,e,t) {
            alert(e + ' : ' + t);
        }

    });

});
//////////


$('#btn-add-fabric-code-modal').click(function(e){

    e.preventDefault();
    $("#fabric_code_add_modal").modal('show');


});

$('#btn-close-fabric-code-modal').click(function (e) {
    e.preventDefault();
    $("#fabric_code_add_modal").modal('hide');
})

$('#btn-save-fabric-code-modal').click(function(e){

    e.preventDefault();

    let fabric_code = $('#fabric_code_modal').val();
    let _token = $('input[name=token]').val();
    let code = {
        fabric_code: fabric_code,
        _token:_token,
    }

    $.ajax({
        type:'POST',
        url: '/api/fabric-codes',
        data: code,
        success: function (code) {

            alert(code.fabric_code + ' Saved');
            location.reload();

        },
        error: function () {
            alert('error saving');
        }
    });

});

$('#btn-del-fabric-code-modal').click(function(e){
    e.preventDefault();

    let fabric_code = $('#fabric_code').val();

    $.ajax({
        type: 'DELETE',
        url: '/api/fabric-codes/' + fabric_code,
        success: function (r) {

            alert('Code ID '+ r.success + ' has been deleted!');
            location.reload();
        },
        error: function (x,e,t) {
            alert(e + ' : ' + t);
        }

    });

});
//////


$('#btn-add-fabric-type-modal').click(function(e){

    e.preventDefault();
    $("#fabric_type_add_modal").modal('show');


});
