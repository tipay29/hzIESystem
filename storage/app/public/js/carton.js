
let cbAll = $('#cbSelectAll');

cbAll.click(function(){
    $('input:checkbox').prop('checked', this.checked);
});

let ctn_check = $('#ctn_check');
let ctn_btn_confirm = $('#ctn_btn_confirm');
let ctn_supplier_id = $('#ctn_supplier_id');
let ctn_user_id = $('#ctn_user_id');
let ctn_content = $('#ctn_content');
let ctn_bill_code = $('#ctn_bill_code');
let ctn_order_date = $('#ctn_order_date');
let ctn_delivery_date = $('#ctn_delivery_date');
let ctn_instruction = $('#ctn_instruction');
let ctn_remarks = $('#ctn_remarks');


let h6_supplier_phone = $('#h6_supplier_phone');
let h6_supplier_name_en = $('#h6_supplier_name_en');
let h6_supplier_address_one = $('#h6_supplier_address_one');
let h6_supplier_address_two = $('#h6_supplier_address_two');
let h6_supplier_address_three = $('#h6_supplier_address_three');
let h6_supplier_attn = $('#h6_supplier_attn');
let h6_supplier_email = $('#h6_supplier_email');
let h6_supplier_remark = $('#h6_supplier_remark');

ctn_supplier_id.change(function(e){
    e.preventDefault();

    console.log(ctn_content.val());

    $.ajax({
        type:'GET',
        url: '/api/suppliers/' + $(this).val(),
        success: function (supplier) {
            h6_supplier_phone.html(supplier.phone);
            h6_supplier_name_en.html(supplier.name_en);
            h6_supplier_address_one.html(supplier.address_one);
            h6_supplier_address_two.html(supplier.address_two);
            h6_supplier_address_three.html(supplier.address_three);
            h6_supplier_attn.html(supplier.attn);
            h6_supplier_email.html(supplier.email);
            h6_supplier_remark.html(supplier.remark);
            supp_name_sign.html(supplier.name_ch);
        },
        error: function (x,h,r) {
            alert(x.responseText);
        }
    });

});

ctn_btn_confirm.click(function(e){
    e.preventDefault();
    alert(ctn_check.val());
        //change if already finish
    if(ctn_check.val() === 1){
        alert('Cannot proceed, Check list if have empty!');
    }else{

        let carton_order = {
            ctn_bill_code: ctn_bill_code.text(),
            ctn_order_date: ctn_order_date.text(),
            ctn_delivery_date: ctn_delivery_date.text(),
            ctn_instruction: ctn_instruction.val(),
            ctn_remarks: ctn_remarks.val(),
            ctn_content: JSON.parse(ctn_content.val()),
            ctn_supplier_id: ctn_supplier_id.val(),
            ctn_user_id: ctn_user_id.val(),
        };

        $.ajax({
            type:'POST',
            url: '/api/carton-orders',
            data: carton_order,
            success: function (carton_order) {
                console.log(carton_order);
                alert('Save Successfully!!!');
                window.location.href = '/carton-orders/' + carton_order.id;
            },
            error: function (x,h,r) {
                alert(x.responseText);
            }
        });

    }
});
