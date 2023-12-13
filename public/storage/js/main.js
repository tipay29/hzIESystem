$('document').ready(function() {

    let originUrl = window.location.origin;

    $.getScript(originUrl + '/storage/js/cutting.js');
    $.getScript(originUrl + '/storage/js/employee.js');
    $.getScript(originUrl + '/storage/js/style/purchase-order.js');
    $.getScript(originUrl + '/storage/js/style/fabric-color.js');
    $.getScript(originUrl + '/storage/js/style/fabric-code.js');
    $.getScript(originUrl + '/storage/js/style/fabric-type.js');
    $.getScript(originUrl + '/storage/js/style/placement.js');
    $.getScript(originUrl + '/storage/js/event/production-event.js');


    // $.getScript(originUrl + '/storage/js/packinglist.js');     attach to app layout



    Dropzone.options.uploadOne = {
        init: function () {
            this.on("complete", function (file) {
                alert('Goodluck!!! :)))')
            });
        }
    }





    let lineo = $('#output_line');

    $('#output_next').click(function(e){
        e.preventDefault();

        let plineo = 0;

        if(lineo.val() !== ""){
            plineo = parseInt(lineo.val());
        }

        let lineinc = plineo + 1;

        lineo.val(lineinc);

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

