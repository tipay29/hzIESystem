

Dropzone.options.packinglistOne = {
    init: function () {
        this.on("complete", function (file) {
            alert('nice!!! :)))')
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

pls_btn_clear.click(function(e){
   e.preventDefault();
    window.location.href = '/packing-lists';
});

row_selected.click(function (e) {
    e.preventDefault();

    let pl_key = $(this).find('input:eq(0)').val();
    let pl_row_cut = $(this).find('input:eq(1)').val();
    let pl_total_qty = $(this).find('input:eq(2)').val();
    let pl_nw = $(this).find('input:eq(3)').val();
    let pl_gw = $(this).find('input:eq(4)').val();
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
           alert('nice');
            // window.location.reload();
        },
        error: function (x,h,r) {
            alert(x.responseText);
        }
    });

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
            console.log(packinglist);
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
            alert(packinglist);
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
            alert(packinglist);
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
            alert(packinglist);
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
let pl_status = $('#pl_status');

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
            console.log(status);
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
            alert('PO Succesfully Added');
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
btn_pl_print_all.click(function(e){
    e.preventDefault();

    window.print();

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

pl_create_drop_zone.hide();
div_btn_brand_choose.hide();

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