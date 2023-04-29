

Dropzone.options.packinglistOne = {
    init: function () {
        this.on('success', function() {
            var args = Array.prototype.slice.call(arguments);

            // Look at the output in you browser console, if there is something interesting
            // if (confirm("This Packing List is pending as draft, do you want to approve???")) {
            //
            //     $.ajax({
            //         type:'POST',
            //         url: '/api/packing-lists/approve/' + args[1],
            //         success: function (datas) {
            //             console.log(datas);
            //         },
            //         error: function (x,h,r) {
            //             alert(x.responseText);
            //         }
            //     });
            //
            // }
            alert('Packing Lists Succesfully Uploaded!!!');
            setTimeout(Reload,1000);

            function Reload(){
                window.location.href = '/packing-lists/batch/' + args[1]
            }

            // console.log(args[1]);
            // alert(args[1]);
        });
    }
}

Dropzone.options.instandMcq = {
    init: function () {
        this.on("complete", function (file) {
            alert('instantmcq!!! :)))')
        });
    }
}

let l = window.location;
let lsplit = l.pathname.split('/');
let pl_status = $('#pl_status');

if(lsplit.includes('packing-lists')) {
    if (lsplit.includes('batch') && lsplit.includes('number')) {

        getPO(lsplit[3],lsplit[5]);
        getMasterPO(lsplit[3],lsplit[5]);
        getMaterial(lsplit[3],lsplit[5]);
        getDescription(lsplit[3],lsplit[5]);
        getColor(lsplit[3],lsplit[5]);
        getCarton();
    }
}
let ctn_brand = $('#ctn_brand');
let ctn_type = $('#ctn_type');

let addMcqModal = $('#addMcqModal');
let addMcqModalBtn = $('#addMcqModalBtn');
let add_mcq_title = $('#add_mcq_title');
let size_one = $('#size_one');
let size_two = $('#size_two');
let size_three = $('#size_three');
let size_four = $('#size_four');
let size_five = $('#size_five');
let size_six = $('#size_six');
let size_seven = $('#size_seven');
let size_eight = $('#size_eight');
let size_nine = $('#size_nine');
let size_ten = $('#size_ten');
console.log(size_five);


if(lsplit.includes('packing-lists')){

    if(l.pathname.includes('batch') && l.pathname.includes('number') ) {

        //display carton in select
        getCartonPerBrand(ctn_brand.val(),ctn_type.val());


    }

}

// pl_rm_save.click(function(){
//     console.log(pl_rm_input);
// });

//UPDATE PL
let pl_update_id_input = $('#pl_update_id_input');
let pl_update_qty_input = $('#pl_update_qty_input');
let pl_update_nw_input = $('#pl_update_nw_input');
let pl_update_gw_input = $('#pl_update_gw_input');
let pl_update_qty_btn = $('#pl_update_qty_btn');
let pl_update_nw_btn = $('#pl_update_nw_btn');
let pl_update_gw_btn = $('#pl_update_gw_btn');
let pl_update_rowcut_input = $('#pl_update_rowcut_input');
let pl_delete_btn = $('#pl_delete_btn');
let row_selected = $('tr#ClickableRow');

let pl_mcq_style_id_input = $('#pl_mcq_style_id_input');
let pl_mcq_style_input = $('#pl_mcq_style_input');

let pl_mcq_size_lbl_one = $('#pl_mcq_size_lbl_one');
let pl_mcq_size_lbl_two = $('#pl_mcq_size_lbl_two');
let pl_mcq_size_lbl_three = $('#pl_mcq_size_lbl_three');
let pl_mcq_size_lbl_four = $('#pl_mcq_size_lbl_four');
let pl_mcq_size_lbl_five = $('#pl_mcq_size_lbl_five');
let pl_mcq_size_lbl_six = $('#pl_mcq_size_lbl_six');
let pl_mcq_size_lbl_seven = $('#pl_mcq_size_lbl_seven');
let pl_mcq_size_lbl_eight = $('#pl_mcq_size_lbl_eight');
let pl_mcq_size_lbl_nine = $('#pl_mcq_size_lbl_nine');
let pl_mcq_size_lbl_ten = $('#pl_mcq_size_lbl_ten');

pl_mcq_size_lbl_one.html($('#size_value_one').val());
pl_mcq_size_lbl_two.html($('#size_value_two').val());
pl_mcq_size_lbl_three.html($('#size_value_three').val());
pl_mcq_size_lbl_four.html($('#size_value_four').val());
pl_mcq_size_lbl_five.html($('#size_value_five').val());
pl_mcq_size_lbl_six.html($('#size_value_six').val());
pl_mcq_size_lbl_seven.html($('#size_value_seven').val());
pl_mcq_size_lbl_eight.html($('#size_value_eight').val());
pl_mcq_size_lbl_nine.html($('#size_value_nine').val());
pl_mcq_size_lbl_ten.html($('#size_value_ten').val());

let pl_mcq_size_input = $('#pl_mcq_size_input');
let pl_mcq_size_input_two = $('#pl_mcq_size_input_two');
let pl_mcq_size_input_three = $('#pl_mcq_size_input_three');
let pl_mcq_size_input_four = $('#pl_mcq_size_input_four');
let pl_mcq_size_input_five = $('#pl_mcq_size_input_five');
let pl_mcq_size_input_six = $('#pl_mcq_size_input_six');
let pl_mcq_size_input_seven = $('#pl_mcq_size_input_seven');
let pl_mcq_size_input_eight = $('#pl_mcq_size_input_eight');
let pl_mcq_size_input_nine = $('#pl_mcq_size_input_nine');
let pl_mcq_size_input_ten = $('#pl_mcq_size_input_ten');

let pl_mcq_weight_input = $('#pl_mcq_weight_input');
let pl_mcq_weight_input_two = $('#pl_mcq_weight_input_two');
let pl_mcq_weight_input_three = $('#pl_mcq_weight_input_three');
let pl_mcq_weight_input_four = $('#pl_mcq_weight_input_four');
let pl_mcq_weight_input_five = $('#pl_mcq_weight_input_five');
let pl_mcq_weight_input_six = $('#pl_mcq_weight_input_six');
let pl_mcq_weight_input_seven = $('#pl_mcq_weight_input_seven');
let pl_mcq_weight_input_eight = $('#pl_mcq_weight_input_eight');
let pl_mcq_weight_input_nine = $('#pl_mcq_weight_input_nine');
let pl_mcq_weight_input_ten = $('#pl_mcq_weight_input_ten');


let pl_mcq_qty_first_input = $('#pl_mcq_qty_first_input');
let pl_mcq_qty_first_input_two = $('#pl_mcq_qty_first_input_two');
let pl_mcq_qty_first_input_three = $('#pl_mcq_qty_first_input_three');
let pl_mcq_qty_first_input_four = $('#pl_mcq_qty_first_input_four');
let pl_mcq_qty_first_input_five = $('#pl_mcq_qty_first_input_five');
let pl_mcq_qty_first_input_six = $('#pl_mcq_qty_first_input_six');
let pl_mcq_qty_first_input_seven = $('#pl_mcq_qty_first_input_seven');
let pl_mcq_qty_first_input_eight = $('#pl_mcq_qty_first_input_eight');
let pl_mcq_qty_first_input_nine = $('#pl_mcq_qty_first_input_nine');
let pl_mcq_qty_first_input_ten = $('#pl_mcq_qty_first_input_ten');

let pl_mcq_qty_second_input = $('#pl_mcq_qty_second_input');
let pl_mcq_qty_second_input_two = $('#pl_mcq_qty_second_input_two');
let pl_mcq_qty_second_input_three = $('#pl_mcq_qty_second_input_three');
let pl_mcq_qty_second_input_four = $('#pl_mcq_qty_second_input_four');
let pl_mcq_qty_second_input_five = $('#pl_mcq_qty_second_input_five');
let pl_mcq_qty_second_input_six = $('#pl_mcq_qty_second_input_six');
let pl_mcq_qty_second_input_seven = $('#pl_mcq_qty_second_input_seven');
let pl_mcq_qty_second_input_eight = $('#pl_mcq_qty_second_input_eight');
let pl_mcq_qty_second_input_nine = $('#pl_mcq_qty_second_input_nine');
let pl_mcq_qty_second_input_ten = $('#pl_mcq_qty_second_input_ten');

let pl_mcq_qty_three_input = $('#pl_mcq_qty_three_input');
let pl_mcq_qty_three_input_two = $('#pl_mcq_qty_three_input_two');
let pl_mcq_qty_three_input_three = $('#pl_mcq_qty_three_input_three');
let pl_mcq_qty_three_input_four = $('#pl_mcq_qty_three_input_four');
let pl_mcq_qty_three_input_five = $('#pl_mcq_qty_three_input_five');
let pl_mcq_qty_three_input_six = $('#pl_mcq_qty_three_input_six');
let pl_mcq_qty_three_input_seven = $('#pl_mcq_qty_three_input_seven');
let pl_mcq_qty_three_input_eight = $('#pl_mcq_qty_three_input_eight');
let pl_mcq_qty_three_input_nine = $('#pl_mcq_qty_three_input_nine');
let pl_mcq_qty_three_input_ten = $('#pl_mcq_qty_three_input_ten');

let pl_mcq_carton_first_input = $('#pl_mcq_carton_first_input');
let pl_mcq_carton_first_input_two = $('#pl_mcq_carton_first_input_two');
let pl_mcq_carton_first_input_three = $('#pl_mcq_carton_first_input_three');
let pl_mcq_carton_first_input_four = $('#pl_mcq_carton_first_input_four');
let pl_mcq_carton_first_input_five = $('#pl_mcq_carton_first_input_five');
let pl_mcq_carton_first_input_six = $('#pl_mcq_carton_first_input_six');
let pl_mcq_carton_first_input_seven = $('#pl_mcq_carton_first_input_seven');
let pl_mcq_carton_first_input_eight = $('#pl_mcq_carton_first_input_eight');
let pl_mcq_carton_first_input_nine = $('#pl_mcq_carton_first_input_nine');
let pl_mcq_carton_first_input_ten = $('#pl_mcq_carton_first_input_ten');

let pl_mcq_carton_second_input = $('#pl_mcq_carton_second_input');
let pl_mcq_carton_second_input_two = $('#pl_mcq_carton_second_input_two');
let pl_mcq_carton_second_input_three = $('#pl_mcq_carton_second_input_three');
let pl_mcq_carton_second_input_four = $('#pl_mcq_carton_second_input_four');
let pl_mcq_carton_second_input_five = $('#pl_mcq_carton_second_input_five');
let pl_mcq_carton_second_input_six = $('#pl_mcq_carton_second_input_six');
let pl_mcq_carton_second_input_seven = $('#pl_mcq_carton_second_input_seven');
let pl_mcq_carton_second_input_eight = $('#pl_mcq_carton_second_input_eight');
let pl_mcq_carton_second_input_nine = $('#pl_mcq_carton_second_input_nine');
let pl_mcq_carton_second_input_ten = $('#pl_mcq_carton_second_input_ten');

let pl_mcq_carton_three_input = $('#pl_mcq_carton_three_input');
let pl_mcq_carton_three_input_two = $('#pl_mcq_carton_three_input_two');
let pl_mcq_carton_three_input_three = $('#pl_mcq_carton_three_input_three');
let pl_mcq_carton_three_input_four = $('#pl_mcq_carton_three_input_four');
let pl_mcq_carton_three_input_five = $('#pl_mcq_carton_three_input_five');
let pl_mcq_carton_three_input_six = $('#pl_mcq_carton_three_input_six');
let pl_mcq_carton_three_input_seven = $('#pl_mcq_carton_three_input_seven');
let pl_mcq_carton_three_input_eight = $('#pl_mcq_carton_three_input_eight');
let pl_mcq_carton_three_input_nine = $('#pl_mcq_carton_three_input_nine');
let pl_mcq_carton_three_input_ten = $('#pl_mcq_carton_three_input_ten');

let pl_mcq_add_btn = $('#pl_mcq_add_btn');

let pls_btn_clear = $('#pls_btn_clear');
let pls_batch_btn_clear = $('#pls_batch_btn_clear');
let pln_clear = $('#pln_clear');
pls_btn_clear.click(function(e){
   e.preventDefault();
    window.location.href = '/packing-lists';
});

pls_batch_btn_clear.click(function(e){
    e.preventDefault();
    window.history.replaceState(null, null, window.location.pathname);
    location.reload();
});

pln_clear.click(function(e){
    e.preventDefault();
    sessionStorage.clear();
    window.history.replaceState(null, null, window.location.pathname);
    location.reload();
});

row_selected.click(function (e) {
    e.preventDefault();

    let pl_key = $(this).find('input:eq(0)').val();
    let pl_row_cut = $(this).find('input:eq(1)').val();
    let pl_total_qty = $(this).find('input:eq(2)').val();
    let pl_nw = $(this).find('input:eq(3)').val();
    let pl_gw = $(this).find('input:eq(4)').val();
    let pl_mcq_size_lbl_one = $('#pl_mcq_size_lbl_one');
    let size_value_one = $('#size_value_one');

    if(size_value_one.val() === undefined){
        pl_mcq_size_lbl_one.html(pl_total_qty);
    }
    pl_update_qty_input.val(pl_total_qty);
    pl_update_id_input.val(pl_key);
    pl_update_nw_input.val(pl_nw);
    pl_update_gw_input.val(pl_gw);
    pl_update_rowcut_input.val(pl_row_cut);

    let pl_style_code = $(this).find('input:eq(5)').val();
    let pl_size = $(this).find('input:eq(6)').val();
    let pl_style_id = $(this).find('input:eq(7)').val();
    pl_mcq_style_input.val(pl_style_code);

    pl_mcq_size_input.val(size_one.val());
    pl_mcq_size_input_two.val(size_two.val());
    pl_mcq_size_input_three.val(size_three.val());
    pl_mcq_size_input_four.val(size_four.val());
    pl_mcq_size_input_five.val(size_five.val());
    pl_mcq_size_input_six.val(size_six.val());
    pl_mcq_size_input_seven.val(size_seven.val());
    pl_mcq_size_input_eight.val(size_eight.val());
    pl_mcq_size_input_nine.val(size_nine.val());
    pl_mcq_size_input_ten.val(size_ten.val());

    pl_mcq_style_id_input.val(pl_style_id);

    add_mcq_title.html(pl_style_code);

    addMcqModalBtn.click();
    // window.scrollTo(0, document.body.scrollHeight);
});
let _token = $('input[name=token]').val();
pl_mcq_add_btn.dblclick(function(e){
    e.preventDefault();

    let styles = {
        size_one: pl_mcq_size_input.val(),
        weight_one: pl_mcq_weight_input.val(),

        carton_id_first_one: pl_mcq_carton_first_input.val(),
        mcq_first_one: pl_mcq_qty_first_input.val(),
        carton_id_second_one: pl_mcq_carton_second_input.val(),
        mcq_second_one: pl_mcq_qty_second_input.val(),
        carton_id_third_one: pl_mcq_carton_three_input.val(),
        mcq_third_one: pl_mcq_qty_three_input.val(),

        size_two: pl_mcq_size_input_two.val(),
        weight_two: pl_mcq_weight_input_two.val(),

        carton_id_first_two: pl_mcq_carton_first_input_two.val(),
        mcq_first_two: pl_mcq_qty_first_input_two.val(),
        carton_id_second_two: pl_mcq_carton_second_input_two.val(),
        mcq_second_two: pl_mcq_qty_second_input_two.val(),
        carton_id_third_two: pl_mcq_carton_three_input_two.val(),
        mcq_third_two: pl_mcq_qty_three_input_two.val(),


        size_three: pl_mcq_size_input_three.val(),
        weight_three: pl_mcq_weight_input_three.val(),

        carton_id_first_three: pl_mcq_carton_first_input_three.val(),
        mcq_first_three: pl_mcq_qty_first_input_three.val(),
        carton_id_second_three: pl_mcq_carton_second_input_three.val(),
        mcq_second_three: pl_mcq_qty_second_input_three.val(),
        carton_id_third_three: pl_mcq_carton_three_input_three.val(),
        mcq_third_three: pl_mcq_qty_three_input_three.val(),

        size_four: pl_mcq_size_input_four.val(),
        weight_four: pl_mcq_weight_input_four.val(),

        carton_id_first_four: pl_mcq_carton_first_input_four.val(),
        mcq_first_four: pl_mcq_qty_first_input_four.val(),
        carton_id_second_four: pl_mcq_carton_second_input_four.val(),
        mcq_second_four: pl_mcq_qty_second_input_four.val(),
        carton_id_third_four: pl_mcq_carton_three_input_four.val(),
        mcq_third_four: pl_mcq_qty_three_input_four.val(),

        size_five: pl_mcq_size_input_five.val(),
        weight_five: pl_mcq_weight_input_five.val(),

        carton_id_first_five: pl_mcq_carton_first_input_five.val(),
        mcq_first_five: pl_mcq_qty_first_input_five.val(),
        carton_id_second_five: pl_mcq_carton_second_input_five.val(),
        mcq_second_five: pl_mcq_qty_second_input_five.val(),
        carton_id_third_five: pl_mcq_carton_three_input_five.val(),
        mcq_third_five: pl_mcq_qty_three_input_five.val(),

        size_six: pl_mcq_size_input_six.val(),
        weight_six: pl_mcq_weight_input_six.val(),

        carton_id_first_six: pl_mcq_carton_first_input_six.val(),
        mcq_first_six: pl_mcq_qty_first_input_six.val(),
        carton_id_second_six: pl_mcq_carton_second_input_six.val(),
        mcq_second_six: pl_mcq_qty_second_input_six.val(),
        carton_id_third_six: pl_mcq_carton_three_input_six.val(),
        mcq_third_six: pl_mcq_qty_three_input_six.val(),

        size_seven: pl_mcq_size_input_seven.val(),
        weight_seven: pl_mcq_weight_input_seven.val(),

        carton_id_first_seven: pl_mcq_carton_first_input_seven.val(),
        mcq_first_seven: pl_mcq_qty_first_input_seven.val(),
        carton_id_second_seven: pl_mcq_carton_second_input_seven.val(),
        mcq_second_seven: pl_mcq_qty_second_input_seven.val(),
        carton_id_third_seven: pl_mcq_carton_three_input_seven.val(),
        mcq_third_seven: pl_mcq_qty_three_input_seven.val(),

        size_eight: pl_mcq_size_input_eight.val(),
        weight_eight: pl_mcq_weight_input_eight.val(),

        carton_id_first_eight: pl_mcq_carton_first_input_eight.val(),
        mcq_first_eight: pl_mcq_qty_first_input_eight.val(),
        carton_id_second_eight: pl_mcq_carton_second_input_eight.val(),
        mcq_second_eight: pl_mcq_qty_second_input_eight.val(),
        carton_id_third_eight: pl_mcq_carton_three_input_eight.val(),
        mcq_third_eight: pl_mcq_qty_three_input_eight.val(),


        size_nine: pl_mcq_size_input_nine.val(),
        weight_nine: pl_mcq_weight_input_nine.val(),

        carton_id_first_nine: pl_mcq_carton_first_input_nine.val(),
        mcq_first_nine: pl_mcq_qty_first_input_nine.val(),
        carton_id_second_nine: pl_mcq_carton_second_input_nine.val(),
        mcq_second_nine: pl_mcq_qty_second_input_nine.val(),
        carton_id_third_nine: pl_mcq_carton_three_input_nine.val(),
        mcq_third_nine: pl_mcq_qty_three_input_nine.val(),

        size_ten: pl_mcq_size_input_ten.val(),
        weight_ten: pl_mcq_weight_input_ten.val(),

        carton_id_first_ten: pl_mcq_carton_first_input_ten.val(),
        mcq_first_ten: pl_mcq_qty_first_input_ten.val(),
        carton_id_second_ten: pl_mcq_carton_second_input_ten.val(),
        mcq_second_ten: pl_mcq_qty_second_input_ten.val(),
        carton_id_third_ten: pl_mcq_carton_three_input_ten.val(),
        mcq_third_ten: pl_mcq_qty_three_input_ten.val(),

        _token: _token,
    }

    $.ajax({
        type:'POST',
        url: '/api/styles/' + pl_mcq_style_id_input.val() + '/sizes/attach/many',
        data: styles,
        success: function (styles) {
           alert('Successfully Added!!!');
           window.location.reload();
        },
        error: function (x,h,r) {
            alert(x.responseText);
        }
    });

});

pl_mcq_qty_first_input.change(function(e){
    let total_pcs = pl_mcq_size_lbl_one.html();
    let cntl_num = pl_mcq_qty_first_input.val();
    let bal = 0;
    bal = total_pcs%cntl_num;
    pl_mcq_qty_second_input.attr("placeholder", bal);
    if(pl_mcq_qty_first_input.val() === ""){
        pl_mcq_qty_second_input.removeAttr("placeholder");
    }
});

pl_mcq_qty_first_input_two.change(function(e){
    let total_pcs = pl_mcq_size_lbl_two.html();
    let cntl_num = pl_mcq_qty_first_input_two.val();
    let bal = 0;
    bal = total_pcs%cntl_num;
    pl_mcq_qty_second_input_two.attr("placeholder", bal);
    if(pl_mcq_qty_first_input_two.val() === ""){
        pl_mcq_qty_second_input_two.removeAttr("placeholder");
    }
});

pl_mcq_qty_first_input_three.change(function(e){
    let total_pcs = pl_mcq_size_lbl_three.html();
    let cntl_num = pl_mcq_qty_first_input_three.val();
    let bal = 0;
    bal = total_pcs%cntl_num;
    pl_mcq_qty_second_input_three.attr("placeholder", bal);
    if(pl_mcq_qty_first_input_three.val() === ""){
        pl_mcq_qty_second_input_three.removeAttr("placeholder");
    }
});

pl_mcq_qty_first_input_four.change(function(e){
    let total_pcs = pl_mcq_size_lbl_four.html();
    let cntl_num = pl_mcq_qty_first_input_four.val();
    let bal = 0;
    bal = total_pcs%cntl_num;
    pl_mcq_qty_second_input_four.attr("placeholder", bal);
    if(pl_mcq_qty_first_input_four.val() === ""){
        pl_mcq_qty_second_input_four.removeAttr("placeholder");
    }
});

pl_mcq_qty_first_input_five.change(function(e){
    let total_pcs = pl_mcq_size_lbl_five.html();
    let cntl_num = pl_mcq_qty_first_input_five.val();
    let bal = 0;
    bal = total_pcs%cntl_num;
    pl_mcq_qty_second_input_five.attr("placeholder", bal);
    if(pl_mcq_qty_first_input_five.val() === ""){
        pl_mcq_qty_second_input_five.removeAttr("placeholder");
    }
});

pl_mcq_qty_first_input_six.change(function(e){
    let total_pcs = pl_mcq_size_lbl_six.html();
    let cntl_num = pl_mcq_qty_first_input_six.val();
    let bal = 0;
    bal = total_pcs%cntl_num;
    pl_mcq_qty_second_input_six.attr("placeholder", bal);
    if(pl_mcq_qty_first_input_six.val() === ""){
        pl_mcq_qty_second_input_six.removeAttr("placeholder");
    }
});

pl_mcq_qty_first_input_seven.change(function(e){
    let total_pcs = pl_mcq_size_lbl_seven.html();
    let cntl_num = pl_mcq_qty_first_input_seven.val();
    let bal = 0;
    bal = total_pcs%cntl_num;
    pl_mcq_qty_second_input_seven.attr("placeholder", bal);
    if(pl_mcq_qty_first_input_seven.val() === ""){
        pl_mcq_qty_second_input_seven.removeAttr("placeholder");
    }
});

pl_mcq_qty_first_input_eight.change(function(e){
    let total_pcs = pl_mcq_size_lbl_eight.html();
    let cntl_num = pl_mcq_qty_first_input_eight.val();
    let bal = 0;
    bal = total_pcs%cntl_num;
    pl_mcq_qty_second_input_eight.attr("placeholder", bal);
    if(pl_mcq_qty_first_input_eight.val() === ""){
        pl_mcq_qty_second_input_eight.removeAttr("placeholder");
    }
});

pl_mcq_qty_first_input_nine.change(function(e){
    let total_pcs = pl_mcq_size_lbl_nine.html();
    let cntl_num = pl_mcq_qty_first_input_nine.val();
    let bal = 0;
    bal = total_pcs%cntl_num;
    pl_mcq_qty_second_input_nine.attr("placeholder", bal);
    if(pl_mcq_qty_first_input_nine.val() === ""){
        pl_mcq_qty_second_input_nine.removeAttr("placeholder");
    }
});

pl_mcq_qty_first_input_ten.change(function(e){
    let total_pcs = pl_mcq_size_lbl_ten.html();
    let cntl_num = pl_mcq_qty_first_input_ten.val();
    let bal = 0;
    bal = total_pcs%cntl_num;
    pl_mcq_qty_second_input_ten.attr("placeholder", bal);
    if(pl_mcq_qty_first_input_ten.val() === ""){
        pl_mcq_qty_second_input_ten.removeAttr("placeholder");
    }
});

pl_update_qty_btn.click(function(e){
    e.preventDefault();
    let packinglist = {
        id: pl_update_id_input.val(),
        quantity: pl_update_qty_input.val(),
    }
    $.ajax({
        type:'POST',
        url: '/api/packing-lists/' + parseInt(pl_update_id_input.val()) + '/update-qty',
        data: packinglist,
        success: function (packinglist) {
            alert('Updated Successfully!!!');
            window.location.reload();
        },
        error: function (x,h,r) {
            alert(x.responseText);
        }
    });

});

pl_update_nw_btn.click(function (e) {
    e.preventDefault();
    let packinglist = {
        id: pl_update_id_input.val(),
        nw: pl_update_nw_input.val(),
        row_cut: pl_update_rowcut_input.val(),
    }
    $.ajax({
        type:'POST',
        url: '/api/packing-lists/' + parseInt(pl_update_id_input.val()) + '/update-nw',
        data: packinglist,
        success: function (packinglist) {
            alert('Updated Successfully!!!');
            window.location.reload();
        },
        error: function (x,h,r) {
            alert(x.responseText);
        }
    });
});

pl_update_gw_btn.click(function(e){
    e.preventDefault();
    let packinglist = {
        id: pl_update_id_input.val(),
        gw: pl_update_gw_input.val(),
        row_cut: pl_update_rowcut_input.val(),
    }
    $.ajax({
        type:'POST',
        url: '/api/packing-lists/' + parseInt(pl_update_id_input.val()) + '/update-gw',
        data: packinglist,
        success: function (packinglist) {
            alert('Updated Succesfully!!!');
            window.location.reload();
        },
        error: function (x,h,r) {
            alert(x.responseText);
        }
    });
});
//UPDATE PL
//delete pl row
pl_delete_btn.click(function(e){
    e.preventDefault();

    $.ajax({

        type:'DELETE',
        url: '/api/packing-lists/' + parseInt(pl_update_id_input.val()),
        success: function (packinglist) {
            alert('Deleted Succesfully!')
            window.location.reload();
        },
        error: function (x,h,r) {
            alert(x.responseText);

        }

    });

});
//delete pl row
//add po
let pl_add_po_btn = $('#pl_add_po_btn');
let pl_add_po_quantity = $('#pl_add_po_quantity');
let pl_add_po_size = $('#pl_add_po_size');
let pl_add_po_color = $('#pl_add_po_color');
let pl_add_po_description = $('#pl_add_po_description');
let pl_add_po_prepack = $('#pl_add_po_prepack');
let pl_add_po_material = $('#pl_add_po_material');
let pl_add_po_style = $('#pl_add_po_style');
let pl_add_po_master_po = $('#pl_add_po_master_po');
let pl_add_po_factory_po = $('#pl_add_po_factory_po');
let pl_add_po_po = $('#pl_add_po_po');
let pl_add_po_brand = $('#pl_add_po_brand');
let pl_add_po_type = $('#pl_add_po_type');
let pl_add_po_number_batch = $('#pl_add_po_number_batch');
let pl_add_po_batch = $('#pl_add_po_batch');
let pl_add_po_crd = $('#pl_add_po_crd');
let pl_add_po_country = $('#pl_add_po_country');
let pl_add_po_user = $('#pl_add_po_user');

let pl_rm_input = $('#pl_rm_input');

pl_rm_input.change(function(e){
    e.preventDefault();
    let remarks = {
        remarks: pl_rm_input.val(),
        batch: pl_add_po_batch.val(),
        number_batch: pl_add_po_number_batch.val(),
    }
    $.ajax({
        type:'POST',
        url: '/api/packing-lists/update/remarks',
        data: remarks,
        success: function (remarks) {
            console.log(remarks);
        },
        error: function (x,h,r) {
            alert(x.responseText);
        }
    });
});

let pl_rm_input_two = $('#pl_rm_input_two');

pl_rm_input_two.change(function(e){
    e.preventDefault();
    let remarks = {
        remarks_two: pl_rm_input_two.val(),
        batch: pl_add_po_batch.val(),
        number_batch: pl_add_po_number_batch.val(),
    }
    $.ajax({
        type:'POST',
        url: '/api/packing-lists/update/remarkstwo',
        data: remarks,
        success: function (remarks) {
            console.log(remarks);
        },
        error: function (x,h,r) {
            alert(x.responseText);
        }
    });
});

let pl_special_pack = $('#pl_special_pack');
pl_special_pack.change(function (e) {
    e.preventDefault();
    let specials = {
        specials: pl_special_pack.val(),
        batch: pl_add_po_batch.val(),
        number_batch: pl_add_po_number_batch.val(),
    }
    $.ajax({
        type:'POST',
        url: '/api/packing-lists/update/specials',
        data: specials,
        success: function (specials) {
            console.log(specials);
        },
        error: function (x,h,r) {
            alert(x.responseText);
        }
    });
});

let pl_pre_pack = $('#pl_pre_pack');

pl_pre_pack.change(function (e) {
    e.preventDefault();
    let specials = {
        prepacks: pl_pre_pack.val(),
        batch: pl_add_po_batch.val(),
        number_batch: pl_add_po_number_batch.val(),
    }
    $.ajax({
        type:'POST',
        url: '/api/packing-lists/update/prepacks',
        data: specials,
        success: function (specials) {
            console.log(specials);
        },
        error: function (x,h,r) {
            alert(x.responseText);
        }
    });
});


if(pl_status.val() === "Draft"){
    pl_status.css("background-color", "yellow");
    pl_status.css("color", "black");
}else if(pl_status.val() === "Cancelled"){
    pl_status.css("background-color", "red");
    pl_status.css("color", "black");
}else if(pl_status.val() === "Final"){
    pl_status.css("background-color", "green");
    pl_status.css("color", "white");
}

pl_status.change(function (e) {
    e.preventDefault();
    let status = {
        status: pl_status.val(),
        batch: pl_add_po_batch.val(),
        number_batch: pl_add_po_number_batch.val(),
    }
    $.ajax({
        type:'POST',
        url: '/api/packing-lists/update/status',
        data: status,
        success: function (status) {
            if(status[0]['pl_status'] === "Draft"){
                pl_status.css("background-color", "yellow");
                pl_status.css("color", "black");
            }else if(status[0]['pl_status'] === "Cancelled"){
                pl_status.css("background-color", "red");
                pl_status.css("color", "black");
            }else if(status[0]['pl_status'] === "Final"){
                pl_status.css("background-color", "green");
                pl_status.css("color", "white");
            }
        },
        error: function (x,h,r) {
            alert(x.responseText);
        }
    });
});


let pl_factory_po_input = $('#pl_factory_po_input');

pl_factory_po_input.change(function(e){
    e.preventDefault();
    let factorypos = {
        factory_po: pl_factory_po_input.val(),
        batch: pl_add_po_batch.val(),
        number_batch: pl_add_po_number_batch.val(),
    }
    $.ajax({
        type:'POST',
        url: '/api/packing-lists/update/factorypos',
        data: factorypos,
        success: function (factorypos) {
            console.log(factorypos);
        },
        error: function (x,h,r) {
            alert(x.responseText);
        }
    });
});

let pl_select_customer = $('#pl_select_customer');

pl_select_customer.change(function(e){
    e.preventDefault();

    let customers = {
        customer: pl_select_customer.val(),
        batch: pl_add_po_batch.val(),
        number_batch: pl_add_po_number_batch.val(),
    }
    $.ajax({
        type:'POST',
        url: '/api/packing-lists/update/customers',
        data: customers,
        success: function (customers) {
            console.log(customers);
            location.reload();
        },
        error: function (x,h,r) {
            alert(x.responseText);
        }
    });


});

let pl_shipment_input = $('#pl_shipment_input');

pl_shipment_input.change(function(e){
    e.preventDefault();
    let shipments = {
        shipment_mode: pl_shipment_input.val(),
        batch: pl_add_po_batch.val(),
        number_batch: pl_add_po_number_batch.val(),
    }
    $.ajax({
        type:'POST',
        url: '/api/packing-lists/update/shipments',
        data: shipments,
        success: function (shipments) {
            console.log(shipments);
        },
        error: function (x,h,r) {
            alert(x.responseText);
        }
    });
});

let pl_destination_input = $('#pl_destination_input');

pl_destination_input.change(function(e){
    e.preventDefault();
    let destinations = {
        destination: pl_destination_input.val(),
        batch: pl_add_po_batch.val(),
        number_batch: pl_add_po_number_batch.val(),
    }
    $.ajax({
        type:'POST',
        url: '/api/packing-lists/update/destinations',
        data: destinations,
        success: function (destinations) {
            console.log(destinations);
        },
        error: function (x,h,r) {
            alert(x.responseText);
        }
    });
});

pl_add_po_btn.click(function(e){

    e.preventDefault();

    let packinglist = {
        pl_po_cut: pl_add_po_po.val(),
        pl_master_po: pl_add_po_master_po.val(),
        pl_factory_po: pl_add_po_factory_po.val(),
        pl_sku: pl_add_po_style.val(),
        pl_material: pl_add_po_material.val(),
        pl_description: pl_add_po_description.val(),
        pl_color: pl_add_po_color.val(),
        pl_style_size: pl_add_po_size.val(),
        pl_country: pl_add_po_country.val(),
        pl_crd: pl_add_po_crd.val(),
        pl_order_quantity: pl_add_po_quantity.val(),
        pl_pre_pack: pl_add_po_prepack.val(),
        pl_brand: pl_add_po_brand.val(),
        pl_type: pl_add_po_type.val(),
        pl_batch: pl_add_po_batch.val(),
        pl_number_batch: pl_add_po_number_batch.val(),
        user_id: pl_add_po_user.val(),

    }

    console.log(packinglist);

    $.ajax({

        type:'POST',
        url: '/api/packing-lists',
        data: packinglist,
        success: function (packinglist) {
            alert('Added Succesfully!!!');
            window.location.reload();
        },
        error: function (x,h,r) {
            console.log(x);
            alert(x.responseText);
        }

    });

});
//add po


//CHOOSE BRAND
let btn_pl_print_all = $('#pl_print_all');
let pl_print_batch = $('#pl_print_batch');
let pl_print = $('#pl_print');
btn_pl_print_all.click(function(e){
    e.preventDefault();
    console.log(lsplit);
    if (lsplit.includes('batch') && lsplit.includes('view-all')) {
        let batch = lsplit[3];

        if (confirm("Some Packing List are not final, do you want to approve???")) {

            $.ajax({
                type:'POST',
                url: '/api/packing-lists/approve/' + batch,
                success: function (datas) {
                    console.log(datas);
                },
                error: function (x,h,r) {
                    alert(x.responseText);
                }
            });

        }
        setTimeout(Reload,3000);

        function Reload(){
            location.reload();
        }
        window.print();
    }



});

pl_print.click(function(e){
    e.preventDefault();
    if (lsplit.includes('batch') && lsplit.includes('number')) {

        let batch = lsplit[3];
        let number = lsplit[5];


        if(pl_status.val() !== "Final"){
            if (confirm("This Packing List is not final, do you want to approve???")) {

                let packinglist = {
                    batch: batch,
                    number: number,
                }

                $.ajax({
                    type:'POST',
                    url: '/api/packing-lists/number/approve',
                    data: packinglist,
                    success: function (datas) {
                        console.log(datas);
                        pl_status.css("background-color", "green");
                        pl_status.css("color", "white");
                    },
                    error: function (x,h,r) {
                        alert(x.responseText);
                    }
                });

            }
        }
        setTimeout(Reload,1000);

        function Reload(){
            location.reload();
        }
        window.print();
    }

});

pl_print_batch.click(function(e){
    e.preventDefault();

    window.print();
});


let pl_create_drop_zone = $('#pl_create_drop_zone');
let div_btn_brand_dickies_app = $('#div_btn_brand_dickies_app');
let div_btn_brand_dickies_eq = $('#div_btn_brand_dickies_eq');
let div_btn_brand_vans_app = $('#div_btn_brand_vans_app');
let div_btn_brand_vans_eq = $('#div_btn_brand_vans_eq');
let div_btn_brand_kipling_eq = $('#div_btn_brand_kipling_eq');
let div_btn_brand_tnf_app = $('#div_btn_brand_tnf_app');
let div_btn_brand_tnf_eq = $('#div_btn_brand_tnf_eq');
let div_btn_brand_jansport_eq = $('#div_btn_brand_jansport_eq');
let div_btn_brand_eastpak_eq = $('#div_btn_brand_eastpak_eq');
let div_btn_brand_napapijri_app = $('#div_btn_brand_napapijri_app');
let pl_create_select_brand = $('.pl_create_select_brand');
let pl_create_brand = $('#pl_create_brand');
let div_btn_brand_choose = $('#div_btn_brand_choose');
let pl_create_title = $('#pl_create_title');
let div_btn_brand_adv_eq = $('#div_btn_brand_adv_eq');
pl_create_drop_zone.hide();
div_btn_brand_choose.hide();

div_btn_brand_adv_eq.click(function(e){
    e.preventDefault();
    pl_create_select_brand.hide();
    pl_create_title.html('Create Packing List ADVANTUS-EQUIPMENT');
    pl_create_brand.val('ADVANTUS-EQUIPMENT');
    pl_create_drop_zone.show();
    div_btn_brand_choose.show();
});

div_btn_brand_dickies_app.click(function(e){
    e.preventDefault();
    pl_create_select_brand.hide();
    pl_create_title.html('Create Packing List DICKIES-APPAREL');
    pl_create_brand.val('DICKIES-APPAREL');
    pl_create_drop_zone.show();
    div_btn_brand_choose.show();
});
div_btn_brand_dickies_eq.click(function(e){
    e.preventDefault();
    pl_create_select_brand.hide();
    pl_create_title.html('Create Packing List DICKIES-EQUIPMENT');
    pl_create_brand.val('DICKIES-EQUIPMENT');
    pl_create_drop_zone.show();
    div_btn_brand_choose.show();
});
div_btn_brand_vans_app.click(function(e){
    e.preventDefault();
    pl_create_select_brand.hide();
    pl_create_title.html('Create Packing List VANS-APPAREL');
    pl_create_brand.val('VANS-APPAREL');
    pl_create_drop_zone.show();
    div_btn_brand_choose.show();
});
div_btn_brand_vans_eq.click(function(e){
    e.preventDefault();
    pl_create_select_brand.hide();
    pl_create_title.html('Create Packing List VANS-EQUIPMENT');
    pl_create_brand.val('VANS-EQUIPMENT');
    pl_create_drop_zone.show();
    div_btn_brand_choose.show();
});
div_btn_brand_kipling_eq.click(function(e){
    e.preventDefault();
    pl_create_select_brand.hide();
    pl_create_title.html('Create Packing List KIPLING-EQUIPMENT');
    pl_create_brand.val('KIPLING-EQUIPMENT');
    pl_create_drop_zone.show();
    div_btn_brand_choose.show();
});
div_btn_brand_tnf_app.click(function(e){
    e.preventDefault();
    pl_create_select_brand.hide();
    pl_create_title.html('Create Packing List TNF-APPAREL');
    pl_create_brand.val('TNF-APPAREL');
    pl_create_drop_zone.show();
    div_btn_brand_choose.show();
});
div_btn_brand_tnf_eq.click(function(e){
    e.preventDefault();
    pl_create_select_brand.hide();
    pl_create_title.html('Create Packing List TNF-EQUIPMENT');
    pl_create_brand.val('TNF-EQUIPMENT');
    pl_create_drop_zone.show();
    div_btn_brand_choose.show();
});
div_btn_brand_jansport_eq.click(function(e){
    e.preventDefault();
    pl_create_select_brand.hide();
    pl_create_title.html('Create Packing List JANSPORT-EQUIPMENT');
    pl_create_brand.val('JANSPORT-EQUIPMENT');
    pl_create_drop_zone.show();
    div_btn_brand_choose.show();
});
div_btn_brand_eastpak_eq.click(function(e){
    e.preventDefault();
    pl_create_select_brand.hide();
    pl_create_title.html('Create Packing List EASTPAK-EQUIPMENT');
    pl_create_brand.val('EASTPAK-EQUIPMENT');
    pl_create_drop_zone.show();
    div_btn_brand_choose.show();
});
div_btn_brand_napapijri_app.click(function(e){
    e.preventDefault();
    pl_create_select_brand.hide();
    pl_create_title.html('Create Packing List NAPAPIJRI-APPAREL');
    pl_create_brand.val('NAPAPIJRI-APPAREL');
    pl_create_drop_zone.show();
    div_btn_brand_choose.show();
});

div_btn_brand_choose.click(function(e){
    e.preventDefault();
    pl_create_select_brand.show();
    pl_create_title.html('Create Packing List');
    pl_create_brand.val('');
    pl_create_drop_zone.hide();
    div_btn_brand_choose.hide();
});

function getCartonPerBrand(brand,type){

    let cartons = {
        brand: brand,
        type: type,
    }

    $.ajax({
        type: 'GET',
        url: '/api/cartons/brands',
        data: cartons,
        success: function (cartons) {
            console.log(cartons);

            pl_mcq_carton_first_input.empty();
            pl_mcq_carton_first_input_two.empty();
            pl_mcq_carton_first_input_three.empty();
            pl_mcq_carton_first_input_four.empty();
            pl_mcq_carton_first_input_five.empty();
            pl_mcq_carton_first_input_six.empty();
            pl_mcq_carton_first_input_seven.empty();
            pl_mcq_carton_first_input_eight.empty();
            pl_mcq_carton_first_input_nine.empty();
            pl_mcq_carton_first_input_ten.empty();

            pl_mcq_carton_second_input.empty();
            pl_mcq_carton_second_input_two.empty();
            pl_mcq_carton_second_input_three.empty();
            pl_mcq_carton_second_input_four.empty();
            pl_mcq_carton_second_input_five.empty();
            pl_mcq_carton_second_input_six.empty();
            pl_mcq_carton_second_input_seven.empty();
            pl_mcq_carton_second_input_eight.empty();
            pl_mcq_carton_second_input_nine.empty();
            pl_mcq_carton_second_input_ten.empty();

            pl_mcq_carton_three_input.empty();
            pl_mcq_carton_three_input_two.empty();
            pl_mcq_carton_three_input_three.empty();
            pl_mcq_carton_three_input_four.empty();
            pl_mcq_carton_three_input_five.empty();
            pl_mcq_carton_three_input_six.empty();
            pl_mcq_carton_three_input_seven.empty();
            pl_mcq_carton_three_input_eight.empty();
            pl_mcq_carton_three_input_nine.empty();
            pl_mcq_carton_three_input_ten.empty();

            let newOptionDef = '<option value="#" disabled selected>Select Carton</option>';

            pl_mcq_carton_first_input.append(newOptionDef);
            pl_mcq_carton_first_input_two.append(newOptionDef);
            pl_mcq_carton_first_input_three.append(newOptionDef);
            pl_mcq_carton_first_input_four.append(newOptionDef);
            pl_mcq_carton_first_input_five.append(newOptionDef);
            pl_mcq_carton_first_input_six.append(newOptionDef);
            pl_mcq_carton_first_input_seven.append(newOptionDef);
            pl_mcq_carton_first_input_eight.append(newOptionDef);
            pl_mcq_carton_first_input_nine.append(newOptionDef);
            pl_mcq_carton_first_input_ten.append(newOptionDef);

            pl_mcq_carton_second_input.append(newOptionDef);
            pl_mcq_carton_second_input_two.append(newOptionDef);
            pl_mcq_carton_second_input_three.append(newOptionDef);
            pl_mcq_carton_second_input_four.append(newOptionDef);
            pl_mcq_carton_second_input_five.append(newOptionDef);
            pl_mcq_carton_second_input_six.append(newOptionDef);
            pl_mcq_carton_second_input_seven.append(newOptionDef);
            pl_mcq_carton_second_input_eight.append(newOptionDef);
            pl_mcq_carton_second_input_nine.append(newOptionDef);
            pl_mcq_carton_second_input_ten.append(newOptionDef);

            pl_mcq_carton_three_input.append(newOptionDef);
            pl_mcq_carton_three_input_two.append(newOptionDef);
            pl_mcq_carton_three_input_three.append(newOptionDef);
            pl_mcq_carton_three_input_four.append(newOptionDef);
            pl_mcq_carton_three_input_five.append(newOptionDef);
            pl_mcq_carton_three_input_six.append(newOptionDef);
            pl_mcq_carton_three_input_seven.append(newOptionDef);
            pl_mcq_carton_three_input_eight.append(newOptionDef);
            pl_mcq_carton_three_input_nine.append(newOptionDef);
            pl_mcq_carton_three_input_ten.append(newOptionDef);

            $.each(cartons, function(i,carton){

                console.log(carton);
                let newOption = '<option value="'+carton.id+'">'+carton.ctn_size+ 'CM' +'</option>';

                pl_mcq_carton_first_input.append(newOption);
                pl_mcq_carton_first_input_two.append(newOption);
                pl_mcq_carton_first_input_three.append(newOption);
                pl_mcq_carton_first_input_four.append(newOption);
                pl_mcq_carton_first_input_five.append(newOption);
                pl_mcq_carton_first_input_six.append(newOption);
                pl_mcq_carton_first_input_seven.append(newOption);
                pl_mcq_carton_first_input_eight.append(newOption);
                pl_mcq_carton_first_input_nine.append(newOption);
                pl_mcq_carton_first_input_ten.append(newOption);

                pl_mcq_carton_second_input.append(newOption);
                pl_mcq_carton_second_input_two.append(newOption);
                pl_mcq_carton_second_input_three.append(newOption);
                pl_mcq_carton_second_input_four.append(newOption);
                pl_mcq_carton_second_input_five.append(newOption);
                pl_mcq_carton_second_input_six.append(newOption);
                pl_mcq_carton_second_input_seven.append(newOption);
                pl_mcq_carton_second_input_eight.append(newOption);
                pl_mcq_carton_second_input_nine.append(newOption);
                pl_mcq_carton_second_input_ten.append(newOption);

                pl_mcq_carton_three_input.append(newOption);
                pl_mcq_carton_three_input_two.append(newOption);
                pl_mcq_carton_three_input_three.append(newOption);
                pl_mcq_carton_three_input_four.append(newOption);
                pl_mcq_carton_three_input_five.append(newOption);
                pl_mcq_carton_three_input_six.append(newOption);
                pl_mcq_carton_three_input_seven.append(newOption);
                pl_mcq_carton_three_input_eight.append(newOption);
                pl_mcq_carton_three_input_nine.append(newOption);
                pl_mcq_carton_three_input_ten.append(newOption);

            });



        },
        error: function(x,h,r){
            console.log(x);
        },
    });
}


let ata_size_btn = $('#ata_size_btn');
let ata_nw_btn = $('#ata_nw_btn');
let ata_carton_btn = $('#ata_carton_btn');
let ata_mcq_btn = $('#ata_mcq_btn');
let ata_carton_second_btn = $('#ata_carton_second_btn');
let ata_mcq_second_btn = $('#ata_mcq_second_btn');
let ata_carton_third_btn = $('#ata_carton_third_btn');
let ata_mcq_third_btn = $('#ata_mcq_third_btn');

ata_size_btn.click(function(e){
    e.preventDefault();

    pl_mcq_size_input_two.val(pl_mcq_size_input.val());
    pl_mcq_size_input_three.val(pl_mcq_size_input.val());
    pl_mcq_size_input_four.val(pl_mcq_size_input.val());
    pl_mcq_size_input_five.val(pl_mcq_size_input.val());
    pl_mcq_size_input_six.val(pl_mcq_size_input.val());
    pl_mcq_size_input_seven.val(pl_mcq_size_input.val());
    pl_mcq_size_input_eight.val(pl_mcq_size_input.val());
    pl_mcq_size_input_nine.val(pl_mcq_size_input.val());
    pl_mcq_size_input_ten.val(pl_mcq_size_input.val());
});
ata_nw_btn.click(function(e){
    e.preventDefault();

    if(pl_mcq_size_input_two.val() !== ""){
    pl_mcq_weight_input_two.val(pl_mcq_weight_input.val());
    }
    if(pl_mcq_size_input_three.val() !== "") {
        pl_mcq_weight_input_three.val(pl_mcq_weight_input.val());
    }
    if(pl_mcq_size_input_four.val() !== "") {
        pl_mcq_weight_input_four.val(pl_mcq_weight_input.val());
    }
    if(pl_mcq_size_input_five.val() !== "") {
        pl_mcq_weight_input_five.val(pl_mcq_weight_input.val());
    }
    if(pl_mcq_size_input_six.val() !== "") {
        pl_mcq_weight_input_six.val(pl_mcq_weight_input.val());
    }
    if(pl_mcq_size_input_seven.val() !== "") {
        pl_mcq_weight_input_seven.val(pl_mcq_weight_input.val());
    }
    if(pl_mcq_size_input_eight.val() !== "") {
        pl_mcq_weight_input_eight.val(pl_mcq_weight_input.val());
    }
    if(pl_mcq_size_input_nine.val() !== "") {
        pl_mcq_weight_input_nine.val(pl_mcq_weight_input.val());
    }
    if(pl_mcq_size_input_ten.val() !== "") {
        pl_mcq_weight_input_ten.val(pl_mcq_weight_input.val());
    }
});
ata_carton_btn.click(function(e){
    e.preventDefault();

});
ata_mcq_btn.click(function(e){
    e.preventDefault();
    if(pl_mcq_size_input_two.val() !== "") {
    pl_mcq_qty_first_input_two.val(pl_mcq_qty_first_input.val());}
    if(pl_mcq_size_input_three.val() !== "") {
    pl_mcq_qty_first_input_three.val(pl_mcq_qty_first_input.val());}
    if(pl_mcq_size_input_four.val() !== "") {
    pl_mcq_qty_first_input_four.val(pl_mcq_qty_first_input.val());}
    if(pl_mcq_size_input_five.val() !== "") {
    pl_mcq_qty_first_input_five.val(pl_mcq_qty_first_input.val());}
    if(pl_mcq_size_input_six.val() !== "") {
    pl_mcq_qty_first_input_six.val(pl_mcq_qty_first_input.val());}
    if(pl_mcq_size_input_seven.val() !== "") {
    pl_mcq_qty_first_input_seven.val(pl_mcq_qty_first_input.val());}
    if(pl_mcq_size_input_eight.val() !== "") {
    pl_mcq_qty_first_input_eight.val(pl_mcq_qty_first_input.val());}
    if(pl_mcq_size_input_nine.val() !== "") {
    pl_mcq_qty_first_input_nine.val(pl_mcq_qty_first_input.val());}
    if(pl_mcq_size_input_ten.val() !== "") {
        pl_mcq_qty_first_input_ten.val(pl_mcq_qty_first_input.val());
    }
});
ata_carton_second_btn.click(function(e){
    e.preventDefault();

});
ata_mcq_second_btn.click(function(e){
    e.preventDefault();
    if(pl_mcq_size_input_two.val() !== "") {
    pl_mcq_qty_second_input_two.val(pl_mcq_qty_second_input.val());}
    if(pl_mcq_size_input_three.val() !== "") {
    pl_mcq_qty_second_input_three.val(pl_mcq_qty_second_input.val());}
    if(pl_mcq_size_input_four.val() !== "") {
    pl_mcq_qty_second_input_four.val(pl_mcq_qty_second_input.val());}
    if(pl_mcq_size_input_five.val() !== "") {
    pl_mcq_qty_second_input_five.val(pl_mcq_qty_second_input.val());}
    if(pl_mcq_size_input_six.val() !== "") {
    pl_mcq_qty_second_input_six.val(pl_mcq_qty_second_input.val());}
    if(pl_mcq_size_input_seven.val() !== "") {
    pl_mcq_qty_second_input_seven.val(pl_mcq_qty_second_input.val());}
    if(pl_mcq_size_input_eight.val() !== "") {
    pl_mcq_qty_second_input_eight.val(pl_mcq_qty_second_input.val());}
    if(pl_mcq_size_input_nine.val() !== "") {
    pl_mcq_qty_second_input_nine.val(pl_mcq_qty_second_input.val());}
    if(pl_mcq_size_input_ten.val() !== "") {
    pl_mcq_qty_second_input_ten.val(pl_mcq_qty_second_input.val());}
});
ata_carton_third_btn.click(function(e){
    e.preventDefault();

});
ata_mcq_third_btn.click(function(e){
    e.preventDefault();
    if(pl_mcq_size_input_two.val() !== "") {
    pl_mcq_qty_three_input_two.val(pl_mcq_qty_three_input.val());}
    if(pl_mcq_size_input_three.val() !== "") {
    pl_mcq_qty_three_input_three.val(pl_mcq_qty_three_input.val());}
    if(pl_mcq_size_input_four.val() !== "") {
    pl_mcq_qty_three_input_four.val(pl_mcq_qty_three_input.val());}
    if(pl_mcq_size_input_five.val() !== "") {
    pl_mcq_qty_three_input_five.val(pl_mcq_qty_three_input.val());}
    if(pl_mcq_size_input_six.val() !== "") {
    pl_mcq_qty_three_input_six.val(pl_mcq_qty_three_input.val());}
    if(pl_mcq_size_input_seven.val() !== "") {
    pl_mcq_qty_three_input_seven.val(pl_mcq_qty_three_input.val());}
    if(pl_mcq_size_input_eight.val() !== "") {
    pl_mcq_qty_three_input_eight.val(pl_mcq_qty_three_input.val());
        if(pl_mcq_size_input_nine.val() !== "") {}
    pl_mcq_qty_three_input_nine.val(pl_mcq_qty_three_input.val());}
    if(pl_mcq_size_input_ten.val() !== "") {
    pl_mcq_qty_three_input_ten.val(pl_mcq_qty_three_input.val());}
});

//filter
let pln_filter = $('#pln_filter');
let pln_po_cut = $('#pln_po_cut');
let pln_master_po = $('#pln_master_po');
let pln_material = $('#pln_material');
let pln_description = $('#pln_description');
let pln_color = $('#pln_color');
let pln_carton = $('#pln_carton');
pln_po_cut.change(function(){
    sessionStorage.setItem('po_cut',pln_po_cut.val());
    pln_filter.click();
});

pln_master_po.change(function(){
    sessionStorage.setItem('master_po',pln_master_po.val());
    pln_filter.click();
});

pln_material.change(function(){
    sessionStorage.setItem('material',pln_material.val());
    pln_filter.click();
});

pln_description.change(function(){
    sessionStorage.setItem('description',pln_description.val());
    pln_filter.click();
});

pln_color.change(function(){
    sessionStorage.setItem('color',pln_color.val());
    pln_filter.click();
});

pln_carton.change(function(){
    sessionStorage.setItem('carton',pln_carton.val());
    pln_filter.click();
});

function getPO(batch,number){
    $.ajax({
        type: 'POST',
        url: '/api/packing-lists/batch/' + batch+ '/number/' + number+ '/po',
        success: function (pckls) {
       console.log(pckls);
            pln_po_cut.empty();
            $.each(pckls, function(i,pckl){

                let newOption = '<option value="'+pckl.pl_po_cut+'"  '
                    +
                    getPOSelected(pckl.pl_po_cut)

                    +' >'+pckl.pl_po_cut+'</option>';

                pln_po_cut.append(newOption);

            });
            pln_po_cut.trigger("chosen:updated");


        },
        error: function(x,h,r){
            console.log(x);
        },
    });
}

function getPOSelected(po_cut){
    if(sessionStorage.getItem('po_cut')){
        let s_po_cut = sessionStorage.getItem('po_cut').split(',');

        if(s_po_cut.includes(po_cut)){
            return 'selected';
        }
    }
}

function getMasterPO(batch,number){
    $.ajax({
        type: 'POST',
        url: '/api/packing-lists/batch/' + batch+ '/number/' + number+ '/masterpo',
        success: function (pckls) {
            console.log(pckls);

            pln_master_po.empty();
            $.each(pckls, function(i,pckl){

                let newOption = '<option value="'+pckl.pl_master_po+'"  '
                    +
                    getMasterPOSelected(pckl.pl_master_po)

                    +' >'+pckl.pl_master_po+'</option>';

                pln_master_po.append(newOption);

            });
            pln_master_po.trigger("chosen:updated");


        },
        error: function(x,h,r){
            console.log(x);
        },
    });
}

function getMasterPOSelected(master_po){
    if(sessionStorage.getItem('master_po')){
        let s_master_po = sessionStorage.getItem('master_po').split(',');

        if(s_master_po.includes(master_po)){
            return 'selected';
        }
    }
}

function getMaterial(batch,number){
    $.ajax({
        type: 'POST',
        url: '/api/packing-lists/batch/' + batch+ '/number/' + number+ '/material',
        success: function (pckls) {
            console.log(pckls);

            pln_material.empty();
            $.each(pckls, function(i,pckl){

                let newOption = '<option value="'+pckl.pl_material+'"  '
                    +
                    getMaterialSelected(pckl.pl_material)

                    +' >'+pckl.pl_material+'</option>';

                pln_material.append(newOption);

            });
            pln_material.trigger("chosen:updated");


        },
        error: function(x,h,r){
            console.log(x);
        },
    });
}

function getMaterialSelected(material){
    if(sessionStorage.getItem('material')){
        let s_material = sessionStorage.getItem('material').split(',');

        if(s_material.includes(material)){
            return 'selected';
        }
    }
}

function getDescription(batch,number){
    $.ajax({
        type: 'POST',
        url: '/api/packing-lists/batch/' + batch+ '/number/' + number+ '/description',
        success: function (pckls) {
            console.log(pckls);

            pln_description.empty();
            $.each(pckls, function(i,pckl){

                let newOption = '<option value="'+pckl.pl_description+'"  '
                    +
                    getDescriptionSelected(pckl.pl_description)

                    +' >'+pckl.pl_description+'</option>';

                pln_description.append(newOption);

            });
            pln_description.trigger("chosen:updated");


        },
        error: function(x,h,r){
            console.log(x);
        },
    });
}

function getDescriptionSelected(description){
    if(sessionStorage.getItem('description')){
        let s_description = sessionStorage.getItem('description').split(',');

        if(s_description.includes(description)){
            return 'selected';
        }
    }
}

function getColor(batch,number){
    $.ajax({
        type: 'POST',
        url: '/api/packing-lists/batch/' + batch+ '/number/' + number+ '/color',
        success: function (pckls) {
            console.log(pckls);

            pln_color.empty();
            $.each(pckls, function(i,pckl){

                let newOption = '<option value="'+pckl.pl_color+'"  '
                    +
                    getColorSelected(pckl.pl_color)

                    +' >'+pckl.pl_color+'</option>';

                pln_color.append(newOption);

            });
            pln_color.trigger("chosen:updated");


        },
        error: function(x,h,r){
            console.log(x);
        },
    });
}

function getColorSelected(color){
    if(sessionStorage.getItem('color')){
        let s_color = sessionStorage.getItem('color').split(',');

        if(s_color.includes(color)){
            return 'selected';
        }
    }
}
function getCarton(){
    let pln_ctn = $('#pln_carton');
    let pln_value_ctn = $('#pln_value_ctn').val();
    pln_value_ctn = pln_value_ctn.replace('[','').replace(']','');
    pln_value_ctn = pln_value_ctn.split(',');
    console.log(pln_value_ctn);

    pln_ctn.empty();
    for(let i = 0;i < pln_value_ctn.length;i++){


        let newOption = '<option value="'+pln_value_ctn[i].replace('"','').replace('"','')+'"  '
            +
            getCartonSelected(pln_value_ctn[i].replace('"','').replace('"',''))

            +' >'+pln_value_ctn[i].replace('"','').replace('"','')+'</option>';

        pln_ctn.append(newOption);

    }
    pln_ctn.trigger("chosen:updated");
}

function getCartonSelected(carton){
    if(sessionStorage.getItem('carton')){
        let s_carton = sessionStorage.getItem('carton').split(',');

        if(s_carton.includes(carton)){
            return 'selected';
        }
    }
}
