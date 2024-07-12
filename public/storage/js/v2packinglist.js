
let v2_pl_create_select_brand = $('.v2_pl_create_select_brand');
let v2_pl_create_title = $('#v2_pl_create_title');
let v2_pl_create_brand = $('#v2_pl_create_brand');
let v2_pl_create_drop_zone = $('#v2_pl_create_drop_zone');
v2_pl_create_drop_zone.hide();
let v2_pl_div_btn_brand_choose = $('#v2_pl_div_btn_brand_choose');
v2_pl_div_btn_brand_choose.hide();

let v2_pl_div_btn_brand_jw_app = $('#v2_pl_div_btn_brand_jw_app');



v2_pl_div_btn_brand_jw_app.click(function(e){
    e.preventDefault();
    v2_pl_create_title.html('Create Packing List v2 JACKWOLFSKIN');
    v2_pl_create_brand.val('JACKWOLFSKIN-APPAREL');
    v2_pl_create_select_brand.hide();
    v2_pl_create_drop_zone.show();
    v2_pl_div_btn_brand_choose.show();
});

v2_pl_div_btn_brand_choose.click(function(e){
    e.preventDefault();
    v2_pl_create_title.html('Create Packing List v2');
    v2_pl_create_brand.val('');
    v2_pl_create_select_brand.show();
    v2_pl_create_drop_zone.hide();
    v2_pl_div_btn_brand_choose.hide();
});


Dropzone.options.packinglistTwo = {
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
            alert('Packing Lists v2 Succesfully Uploaded!!!');
            // setTimeout(Reload,1000);
            //
            // function Reload(){
            //     window.location.href = '/packing-lists/batch/' + args[1]
            // }

            // console.log(args[1]);
            // alert(args[1]);
        });
    }
}
