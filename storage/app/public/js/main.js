$('document').ready(function() {

    $.getScript('http://127.0.0.1:8000/storage/js/cutting.js');
    $.getScript('http://127.0.0.1:8000/storage/js/employee.js');


    setInterval(function () {
        $('iframe').remove();
        $('grammarly-desktop-integration').remove();

    }, 1);
});

