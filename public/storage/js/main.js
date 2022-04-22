$('document').ready(function() {

    let originUrl = window.location.origin;


    $.getScript(originUrl + '/storage/js/cutting.js');
    $.getScript(originUrl + '/storage/js/employee.js');
    $.getScript(originUrl + '/storage/js/purchase-order.js');
    $.getScript(originUrl + '/storage/js/fabric-color.js');
    $.getScript(originUrl + '/storage/js/fabric-code.js');
    $.getScript(originUrl + '/storage/js/fabric-type.js');
    $.getScript(originUrl + '/storage/js/placement.js');

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
        $('.dropdown-toggle').dropdown()
    });



    setInterval(function () {
        $('iframe').remove();
        $('grammarly-desktop-integration').remove();

    }, 1);
});

