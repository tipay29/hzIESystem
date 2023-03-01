

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

///sizee

let btn_save_size = $('#btn_save_size');
let size = $('#size');
let weight = $('#weight');
let carton_id = $('#carton_id');
let mcq = $('#mcq');
let s_style = $('#style');

btn_save_size.click(function(e){

    e.preventDefault();

    let _token = $('input[name=token]').val();

    let style = {
        carton_id: carton_id.val(),
        mcq: mcq.val(),
        size: size.val(),
        weight: weight.val(),
        _token: _token,
    }

    $.ajax({
        type: 'POST',
        url: '/api/styles/' + s_style.val() +'/sizes/attach',
        data: style,
        success: function (style) {
            alert('Size Added');
            location.reload();
        },
        error: function () {
            alert('error adding Size')
        }

    });

});

//size


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
        $('#style-container').empty().html(data);
        location.hash = page;
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        alert('No response from server');
    });
}



