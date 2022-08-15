$('document').ready(function() {

    let originUrl = window.location.origin;

    $.getScript(originUrl + '/storage/js/cutting.js');
    $.getScript(originUrl + '/storage/js/employee.js');
    $.getScript(originUrl + '/storage/js/style/style.js');
    $.getScript(originUrl + '/storage/js/style/purchase-order.js');
    $.getScript(originUrl + '/storage/js/style/fabric-color.js');
    $.getScript(originUrl + '/storage/js/style/fabric-code.js');
    $.getScript(originUrl + '/storage/js/style/fabric-type.js');
    $.getScript(originUrl + '/storage/js/style/placement.js');
    $.getScript(originUrl + '/storage/js/event/production-event.js');

    Dropzone.options.traceOne = {
        init: function () {
            this.on("complete", function (file) {
                alert('wa')
            });
        }
    }


    $('#pot_btn_clear').click(function(e){
        e.preventDefault();
        window.location.href = '/po-traces';
    });


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

