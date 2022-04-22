

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
        $('#purchase-order-container').empty().html(data);
        location.hash = page;
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        alert('No response from server');
    });
}

