
let cbAll = $('#cbSelectAll');

cbAll.click(function(){
    $('input:checkbox').prop('checked', this.checked);
});


let select_supplier = $('#select_supplier');
let h6_supplier_phone = $('#h6_supplier_phone');
let h6_supplier_name_en = $('#h6_supplier_name_en');
let h6_supplier_address_one = $('#h6_supplier_address_one');
let h6_supplier_address_two = $('#h6_supplier_address_two');
let h6_supplier_address_three = $('#h6_supplier_address_three');
let h6_supplier_attn = $('#h6_supplier_attn');
let h6_supplier_email = $('#h6_supplier_email');
let h6_supplier_remark = $('#h6_supplier_remark');
select_supplier.change(function(e){
    e.preventDefault();

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
        },
        error: function (x,h,r) {
            alert(x.responseText);
        }
    });

});
