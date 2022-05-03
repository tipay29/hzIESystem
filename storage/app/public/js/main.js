$('document').ready(function() {

    let originUrl = window.location.origin;

    alert('aw');
    $.getScript(originUrl + '/storage/js/cutting.js');
    $.getScript(originUrl + '/storage/js/employee.js');
    $.getScript(originUrl + '/storage/js/style.js');
    $.getScript(originUrl + '/storage/js/purchase-order.js');
    $.getScript(originUrl + '/storage/js/fabric-color.js');
    $.getScript(originUrl + '/storage/js/fabric-code.js');
    $.getScript(originUrl + '/storage/js/fabric-type.js');
    $.getScript(originUrl + '/storage/js/placement.js');

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
        $('.dropdown-toggle').dropdown()
    });

    $(".chosen-select").chosen({
        no_results_text: "Oops, nothing found!",
    });

    setInterval(function () {
        $('iframe').remove();
        $('grammarly-desktop-integration').remove();

    }, 1);
});



//localStorage.setItem
//sessionStorage.setItem(key,data)
//sessionStorage.getItem(key)
//sessionStorage.removeItem(key)
//sessionStorage.clear()
