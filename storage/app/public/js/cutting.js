
$(".chosen-select").chosen({
    no_results_text: "Oops, nothing found!",
});

$('#btn-add-po').click(function(e){

    e.preventDefault();
    $("#myModal").modal('show');


});
