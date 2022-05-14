
let l = window.location;
let lsplit = l.pathname.split('/');

    let cut_switch_input_style_one = $("#cut_switch_input_style_one");
    let cut_switch_input_po_one_sel = $("#cut_switch_input_po_one");
    let cut_switch_input_po_one = $("#cut_switch_input_po_one_chosen");
    let cut_switch_input_fcode_one_sel = $("#cut_switch_input_fcode_one");
    let cut_switch_input_fcode_one = $("#cut_switch_input_fcode_one_chosen");
    let cut_switch_input_fcolor_one_sel = $("#cut_switch_input_fcolor_one");
    let cut_switch_input_fcolor_one = $("#cut_switch_input_fcolor_one_chosen");
    let cut_switch_input_ftype_one_sel = $("#cut_switch_input_ftype_one");
    let cut_switch_input_ftype_one = $("#cut_switch_input_ftype_one_chosen");
    let cut_switch_input_placement_one_sel = $("#cut_switch_input_placement_one");
    let cut_switch_input_placement_one = $("#cut_switch_input_placement_one_chosen");
    let cut_switch_add_style_one = $('#cut_switch_add_style_one');
     let cut_switch_add_style_two = $('#cut_switch_add_style_two');
     let cut_switch_input_style_two = $('#cut_switch_input_style_two');
     let cut_btn_style_two = $('#cut_btn_style_two');
    let cut_switch_add_po_one = $('#cut_switch_add_po_one');
    let cut_switch_add_po_two = $('#cut_switch_add_po_two');
    let cut_switch_input_po_two = $('#cut_switch_input_po_two');
    let cut_btn_po_two = $('#cut_btn_po_two');
    let cut_switch_add_fcode_one = $('#cut_switch_add_fcode_one');
    let cut_switch_add_fcode_two = $('#cut_switch_add_fcode_two');
    let cut_switch_input_fcode_two = $('#cut_switch_input_fcode_two');
    let cut_btn_fcode_two = $('#cut_btn_fcode_two');
    let cut_switch_add_fcolor_one = $('#cut_switch_add_fcolor_one');
    let cut_switch_add_fcolor_two = $('#cut_switch_add_fcolor_two');
    let cut_switch_input_fcolor_two = $('#cut_switch_input_fcolor_two');
    let cut_btn_fcolor_two = $('#cut_btn_fcolor_two');
    let cut_switch_add_ftype_one = $('#cut_switch_add_ftype_one');
    let cut_switch_add_ftype_two = $('#cut_switch_add_ftype_two');
    let cut_switch_input_ftype_two = $('#cut_switch_input_ftype_two');
    let cut_btn_ftype_two = $('#cut_btn_ftype_two');
    let cut_switch_add_placement_one = $('#cut_switch_add_placement_one');
    let cut_switch_add_placement_two = $('#cut_switch_add_placement_two');
    let cut_switch_input_placement_two = $('#cut_switch_input_placement_two');
    let cut_btn_placement_two = $('#cut_btn_placement_two');

if(lsplit.includes('cuts')){

    if(l.pathname === '/cuts/create') {
        if(cut_switch_input_style_one.val() !== null){
            //update cut
        }

        getStyle(null);
        getPO(null);
        getFabricCode(null);
        getFabricColor(null);
        getFabricType(null);
        getPlacement(null);

    }else if(lsplit.includes('edit') && lsplit.includes('cuts')) {

        if(sessionStorage.getItem('cut') === null){
            setCutSession(lsplit[2]);
        }
        getStyle(null);
        getPO(null);
        getFabricCode(null);
        getFabricColor(null);
        getFabricType(null);
        getPlacement(null);

    }else{
        sessionStorage.clear();
    }

    if(l.pathname === '/cuts'){
        $('window').change(function () {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                } else {
                    getData(page);
                }
            }
        });

        $('.pagination a').onclick(function (event) {
            event.preventDefault();
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
            var url = $(this).attr('href');
            var page = $(this).attr('href').split('page=')[1];
            getData(page);
        });

        function getData(page) {
            // body...
            $.ajax({
                url: '?page=' + page,
                type: 'get',
                datatype: 'html',
            }).done(function (data) {
                $('#cut-container').empty().html(data);
                location.hash = page;
            }).fail(function (jqXHR, ajaxOptions, thrownError) {
                alert('No response from server');
            });
        }
    }



}

cut_switch_add_style_one.click(function(){
    cut_switch_input_style_one.toggle();
    cut_switch_add_style_one.toggle();
    cut_switch_add_style_two.toggle();
    cut_switch_input_style_two.toggle();
    cut_btn_style_two.toggle();
});
cut_switch_add_style_two.click(function(){
    cut_switch_input_style_one.toggle();
    cut_switch_add_style_one.toggle();
    cut_switch_add_style_two.toggle();
    cut_switch_input_style_two.toggle();
    cut_btn_style_two.toggle();
});

cut_switch_add_po_one.click(function(){
    cut_switch_input_po_one.toggle();
    cut_switch_add_po_one.toggle();
    cut_switch_add_po_two.toggle();
    cut_switch_input_po_two.toggle();
    cut_btn_po_two.toggle();
});
cut_switch_add_po_two.click(function(){
    cut_switch_input_po_one.toggle();
    cut_switch_add_po_one.toggle();
    cut_switch_add_po_two.toggle();
    cut_switch_input_po_two.toggle();
    cut_btn_po_two.toggle();
});

cut_switch_add_fcode_one.click(function(){
    cut_switch_input_fcode_one.toggle();
    cut_switch_add_fcode_one.toggle();
    cut_switch_add_fcode_two.toggle();
    cut_switch_input_fcode_two.toggle();
    cut_btn_fcode_two.toggle();
});
cut_switch_add_fcode_two.click(function(){
    cut_switch_input_fcode_one.toggle();
    cut_switch_add_fcode_one.toggle();
    cut_switch_add_fcode_two.toggle();
    cut_switch_input_fcode_two.toggle();
    cut_btn_fcode_two.toggle();
});

cut_switch_add_fcolor_one.click(function(){
    cut_switch_input_fcolor_one.toggle();
    cut_switch_add_fcolor_one.toggle();
    cut_switch_add_fcolor_two.toggle();
    cut_switch_input_fcolor_two.toggle();
    cut_btn_fcolor_two.toggle();
});
cut_switch_add_fcolor_two.click(function(){
    cut_switch_input_fcolor_one.toggle();
    cut_switch_add_fcolor_one.toggle();
    cut_switch_add_fcolor_two.toggle();
    cut_switch_input_fcolor_two.toggle();
    cut_btn_fcolor_two.toggle();
});

cut_switch_add_ftype_one.click(function(){
    cut_switch_input_ftype_one.toggle();
    cut_switch_add_ftype_one.toggle();
    cut_switch_add_ftype_two.toggle();
    cut_switch_input_ftype_two.toggle();
    cut_btn_ftype_two.toggle();
});
cut_switch_add_ftype_two.click(function(){
    cut_switch_input_ftype_one.toggle();
    cut_switch_add_ftype_one.toggle();
    cut_switch_add_ftype_two.toggle();
    cut_switch_input_ftype_two.toggle();
    cut_btn_ftype_two.toggle();
});

cut_switch_add_placement_one.click(function(){
    cut_switch_input_placement_one.toggle();
    cut_switch_add_placement_one.toggle();
    cut_switch_add_placement_two.toggle();
    cut_switch_input_placement_two.toggle();
    cut_btn_placement_two.toggle();
});
cut_switch_add_placement_two.click(function(){
    cut_switch_input_placement_one.toggle();
    cut_switch_add_placement_one.toggle();
    cut_switch_add_placement_two.toggle();
    cut_switch_input_placement_two.toggle();
    cut_btn_placement_two.toggle();
});


cut_switch_input_style_two.keypress(function(e){
    var key = e.which;
    if(key == 13){
        cut_btn_style_two.click();
        return false;
    }
});
cut_btn_style_two.click(function(){


    let style = {
        style_code: cut_switch_input_style_two.val(),
    }

    $.ajax({

        type:'POST',
        url: '/api/styles',
        data: style,
        success: function (style) {
            cut_switch_add_style_two.click();
            getStyle(style);
        },
        error: function (x,h,r) {
            alert(x.responseText);

        }

    });

});

cut_switch_input_po_two.keypress(function(e){
    var key = e.which;
    if(key == 13){
        cut_btn_po_two.click();
        return false;
    }
});
cut_btn_po_two.click(function(){

    let pos = {
        purchase_order: cut_switch_input_po_two.val(),
    }

    $.ajax({

        type:'POST',
        url: '/api/purchase-orders',
        data: pos,
        success: function (pos) {
            cut_switch_add_po_two.click();
            getPO(pos);
        },
        error: function (x,h,r) {
            alert(x.responseText);

        }

    });

});

cut_switch_input_fcode_two.keypress(function(e){
    var key = e.which;
    if(key == 13){
        cut_btn_fcode_two.click();
        return false;
    }
});
cut_btn_fcode_two.click(function(){

    let fcodes = {
        fabric_code: cut_switch_input_fcode_two.val(),
    }

    $.ajax({

        type:'POST',
        url: '/api/fabric-codes',
        data: fcodes,
        success: function (fcodes) {
            cut_switch_add_fcode_two.click();
            getFabricCode(fcodes);
            console.log(fcodes);
        },
        error: function (x,h,r) {
            alert(x.responseText);

        }

    });

});

cut_switch_input_fcolor_two.keypress(function(e){
    var key = e.which;
    if(key == 13){
        cut_btn_fcolor_two.click();
        return false;
    }
});
cut_btn_fcolor_two.click(function(){

    let fcolors = {
        fabric_color: cut_switch_input_fcolor_two.val(),
    }

    $.ajax({

        type:'POST',
        url: '/api/fabric-colors',
        data: fcolors,
        success: function (fcolors) {
            cut_switch_add_fcolor_two.click();
            getFabricColor(fcolors);

        },
        error: function (x,h,r) {
            alert(x.responseText);

        }

    });

});

cut_switch_input_ftype_two.keypress(function(e){
    var key = e.which;
    if(key == 13){
        cut_btn_ftype_two.click();
        return false;
    }
});
cut_btn_ftype_two.click(function(){
    let ftypes = {
        fabric_type: cut_switch_input_ftype_two.val(),
    }

    $.ajax({

        type:'POST',
        url: '/api/fabric-types',
        data: ftypes,
        success: function (ftypes) {
            cut_switch_add_ftype_two.click();
            getFabricType(ftypes);

        },
        error: function (x,h,r) {
            alert(x.responseText);

        }

    });
});

cut_switch_input_placement_two.keypress(function(e){
    var key = e.which;
    if(key == 13){
        cut_btn_placement_two.click();
        return false;
    }
});
cut_btn_placement_two.click(function(){
    let placements = {
        placement: cut_switch_input_placement_two.val(),
    }

    $.ajax({

        type:'POST',
        url: '/api/placements',
        data: placements,
        success: function (placements) {
            cut_switch_add_placement_two.click();
            getPlacement(placements);
        },
        error: function (x,h,r) {
            alert(x.responseText);

        }

    });
});

cut_switch_input_style_one.change(function(){
        sessionStorage.setItem('style',cut_switch_input_style_one.val());
});

cut_switch_input_po_one_sel.change(function(){
        sessionStorage.setItem('purchase_order',cut_switch_input_po_one_sel.val());
});

cut_switch_input_fcode_one_sel.change(function(){
        sessionStorage.setItem('fabric_code',cut_switch_input_fcode_one_sel.val());
});

cut_switch_input_fcolor_one_sel.change(function(){
        sessionStorage.setItem('fabric_color',cut_switch_input_fcolor_one_sel.val());
});

cut_switch_input_ftype_one_sel.change(function(){
        sessionStorage.setItem('fabric_type',cut_switch_input_ftype_one_sel.val());
});

cut_switch_input_placement_one_sel.change(function(){
    sessionStorage.setItem('placement',cut_switch_input_placement_one_sel.val());
});

 function setCutSession(cut){

     $.ajax({
         type: 'GET',
         url: '/api/cuts/' + cut,
         success: function (cut) {
             sessionStorage.setItem('cut', cut.id);
             sessionStorage.setItem('style', cut.styles.map(c => c.id));
             sessionStorage.setItem('fabric_color', cut.fabric_colors.map(c => c.id));
             sessionStorage.setItem('fabric_code', cut.fabric_codes.map(c => c.id));
             sessionStorage.setItem('fabric_type', cut.fabric_types.map(c => c.id));
             sessionStorage.setItem('placement', cut.placements.map(c => c.id));
             sessionStorage.setItem('purchase_order', cut.purchase_orders.map(c => c.id));
         },
     });
 }

function getStyle(a_style){

    $.ajax({
        type: 'GET',
        url: '/api/styles',
        success: function (styles) {

            cut_switch_input_style_one.empty();
            let newOptionDef = '<option value="#" disabled selected>Select style</option>';
            cut_switch_input_style_one.append(newOptionDef);
            $.each(styles, function(i,style){

                let newOption = '<option value="'+style.id+'"  '
                    +
                    styleFunction(a_style,style)

                    +' >'+style.style_code+'</option>';

                cut_switch_input_style_one.append(newOption);

            });
            cut_switch_input_style_one.trigger("chosen:updated");


        },
        error: function(x,h,r){
            console.log(x);
        },
    });
}

function getPO(a_po){

    $.ajax({
        type: 'GET',
        url: '/api/purchase-orders',
        success: function (p_orders) {

            cut_switch_input_po_one_sel.empty();
            $.each(p_orders, function(i,p_order){

                let newOption = '<option value="'+p_order.id+'"  '
                    +
                    poFunction(a_po,p_order)

                    +' >'+p_order.purchase_order+'</option>';

                cut_switch_input_po_one_sel.append(newOption);

            });
            cut_switch_input_po_one_sel.trigger("chosen:updated");


        },
        error: function(x,h,r){
            console.log(x);
        },
    });
}

function getFabricCode(a_fcode){

    $.ajax({
        type: 'GET',
        url: '/api/fabric-codes',
        success: function (fcodes) {

            cut_switch_input_fcode_one_sel.empty();
            $.each(fcodes, function(i,f_code){

                let newOption = '<option value="'+f_code.id+'"  '
                    +
                    fabricCodeFunction(a_fcode,f_code)

                    +' >'+f_code.fabric_code+'</option>';

                cut_switch_input_fcode_one_sel.append(newOption);

            });
            cut_switch_input_fcode_one_sel.trigger("chosen:updated");


        },
        error: function(x,h,r){
            console.log(x);
        },
    });
}

function getFabricColor(a_fcolor){

    $.ajax({
        type: 'GET',
        url: '/api/fabric-colors',
        success: function (fcolors) {

            cut_switch_input_fcolor_one_sel.empty();
            $.each(fcolors, function(i,f_color){

                let newOption = '<option value="'+f_color.id+'"  '
                    +
                    fabricColorFunction(a_fcolor,f_color)

                    +' >'+f_color.fabric_color+'</option>';

                cut_switch_input_fcolor_one_sel.append(newOption);

            });
            cut_switch_input_fcolor_one_sel.trigger("chosen:updated");


        },
        error: function(x,h,r){
            console.log(x);
        },
    });
}

function getFabricType(a_ftype){

    $.ajax({
        type: 'GET',
        url: '/api/fabric-types',
        success: function (ftypes) {

            cut_switch_input_ftype_one_sel.empty();
            $.each(ftypes, function(i,f_type){

                let newOption = '<option value="'+f_type.id+'"  '
                    +
                    fabricTypeFunction(a_ftype,f_type)

                    +' >'+f_type.fabric_type+'</option>';

                cut_switch_input_ftype_one_sel.append(newOption);

            });
            cut_switch_input_ftype_one_sel.trigger("chosen:updated");


        },
        error: function(x,h,r){
            console.log(x);
        },
    });
}

function getPlacement(a_placement){

    $.ajax({
        type: 'GET',
        url: '/api/placements',
        success: function (placements) {

            cut_switch_input_placement_one_sel.empty();
            $.each(placements, function(i,placement){

                let newOption = '<option value="'+placement.id+'"  '
                    +
                    placementFunction(a_placement,placement)

                    +' >'+placement.placement+'</option>';

                cut_switch_input_placement_one_sel.append(newOption);

            });
            cut_switch_input_placement_one_sel.trigger("chosen:updated");


        },
        error: function(x,h,r){
            console.log(x);
        },
    });
}

function styleFunction(a_style,style){


    if(sessionStorage.getItem('style')){
        let s_style = sessionStorage.getItem('style').split(',');

        if(s_style.includes(style.id.toString())){
            return 'selected';
        }
    }

    if(a_style !== null){
        if(a_style.id === style.id){
            return "selected";
        }
    }


}

function poFunction(a_po,p_order){


    if(sessionStorage.getItem('purchase_order')){
        let s_purchase_order = sessionStorage.getItem('purchase_order').split(',');

        if(s_purchase_order.includes(p_order.id.toString())){
            return 'selected';
        }
    }

    if(a_po !== null){
        for (let i = 0; i < a_po.length; i++) {

            if(a_po[i].id === p_order.id){
                return "selected";
            }
        }
    }

}

function fabricCodeFunction(a_fcode,f_code){


    if(sessionStorage.getItem('fabric_code')){
        let s_fabric_code = sessionStorage.getItem('fabric_code').split(',');

        if(s_fabric_code.includes(f_code.id.toString())){
            return 'selected';
        }
    }

    if(a_fcode !== null){
        for (let i = 0; i < a_fcode.length; i++) {

            if(a_fcode[i].id === f_code.id){
                return "selected";
            }
        }
    }

}

function fabricColorFunction(a_fcolor,f_color){


    if(sessionStorage.getItem('fabric_color')){
        let s_fabric_color = sessionStorage.getItem('fabric_color').split(',');

        if(s_fabric_color.includes(f_color.id.toString())){
            return 'selected';
        }
    }

    if(a_fcolor !== null){
        for (let i = 0; i < a_fcolor.length; i++) {

            if(a_fcolor[i].id === f_color.id){
                return "selected";
            }
        }
    }

}

function fabricTypeFunction(a_ftype,f_type){


    if(sessionStorage.getItem('fabric_type')){
        let s_fabric_type = sessionStorage.getItem('fabric_type').split(',');

        if(s_fabric_type.includes(f_type.id.toString())){
            return 'selected';
        }
    }

    if(a_ftype !== null){
        for (let i = 0; i < a_ftype.length; i++) {

            if(a_ftype[i].id === f_type.id){
                return "selected";
            }
        }
    }

}

function placementFunction(a_placement,placement){


    if(sessionStorage.getItem('placement')){
        let s_placement = sessionStorage.getItem('placement').split(',');

        if(s_placement.includes(placement.id.toString())){
            return 'selected';
        }
    }

    if(a_placement !== null){
        for (let i = 0; i < a_placement.length; i++) {

            if(a_placement[i].id === placement.id){
                return "selected";
            }
        }
    }

}





if(l.pathname === '/cuts/utilization'){

    cut_util_table_b2 = $('.cut-util-table-b2');
    cut_util_table_d4 = $('.cut-util-table-d4');
    cut_util_table_e5 = $('.cut-util-table-e5');
    h5_b2 = $('#h5-b2');
    h5_d4 = $('#h5-d4');
    h5_e5 = $('#h5-e5');
    cut_util_building = $('#cut_util_building');
    cut_util_start = $('#cut_util_start_date');
    cut_util_end = $('#cut_util_end_date');

    cut_all_b2 = $('.cut-all-b2');
    cut_all_d4 = $('.cut-all-d4');
    cut_all_e5 = $('.cut-all-e5');

    $('#print-cut-b2').click(function(e){
        e.preventDefault();
        $('.cut-all-d4').removeAttr('id','cut_section-to-print');
        $('.cut-all-e5').removeAttr('id','cut_section-to-print');

        $('.cut-all-b2').attr('id','cut_section-to-print');

        window.print();

    });
    $('#print-cut-d4').click(function(e){
        e.preventDefault();
        $('.cut-all-b2').removeAttr('id','cut_section-to-print');
        $('.cut-all-e5').removeAttr('id','cut_section-to-print');

        $('.cut-all-d4').attr('id','cut_section-to-print');

        window.print();

    });
    $('#print-cut-e5').click(function(e){
        e.preventDefault();
        $('.cut-all-b2').removeAttr('id','cut_section-to-print')
        $('.cut-all-d4').removeAttr('id','cut_section-to-print');

        $('.cut-all-e5').attr('id','cut_section-to-print');
        window.print();

    });

    cut_util_building.change(function(e){
        if($(this).val() == 2){
            cut_all_b2.show();
            cut_all_d4.hide();
            cut_all_e5.hide();
        }else if($(this).val() == 4){
            cut_all_d4.show();
            cut_all_b2.hide();
            cut_all_e5.hide();
        }else if($(this).val() == 5){
            cut_all_e5.show();
            cut_all_b2.hide();
            cut_all_d4.hide();
        }else if($(this).val() == 0){
            cut_all_e5.show();
            cut_all_b2.show();
            cut_all_d4.show();
        }
    });

    cut_util_start.change(function(){
        cut_util_end.val('');
        getCutUtilDate(cut_util_start,cut_util_end);
    });

    cut_util_end.change(function(){

        getCutUtilDate(cut_util_start,cut_util_end);
    });

}

if(l.pathname === '/cuts/total-utilization'){

    cut_total_util_table = $('.cut-total-util-table');
    cut_total_util_start = $('#cut-total-util-start-date');
    cut_total_util_end = $('#cut-total-util-end-date');

    cut_total_util_start.change(function(){
        cut_total_util_end.val('');
        getTotalCutUtilDate(cut_total_util_start, cut_total_util_end);
    });

    cut_total_util_end.change(function(){

        getTotalCutUtilDate(cut_total_util_start, cut_total_util_end);
    });

}

function getCutUtilDate(start,end){

    if(end.val() && start.val()) {

        let cut_dates = {
            spread_start: start.val() + ' 00:00:01',
            spread_end: end.val() + ' 23:59:59',
        }
        $.ajax({

            type:'POST',
            url: '/api/cuts/utilizations',
            data: cut_dates,
            success: function (util) {
                console.log(util);

                cut_util_table_b2.empty();
                cut_util_table_d4.empty();
                cut_util_table_e5.empty();

                $.each(util[0], function(i_b,building){//building


                    if(i_b == 2){

                        let target_table = building['target_table'];
                        let all_table_days = 0;
                        let all_table_work_hours = 0;
                        let all_table_yards = 0;
                        let all_target_table_days = 0;
                        let all_target_table_work_hours = 0;
                        let all_target_table_yards = 0;
                        let all_table_util = 0;
                        $.each(building['tables'], function(i_t,table){//table

                            let days = 0;
                            let work_hours = 0;
                            let yards = 0;
                            let target_days = 0;
                            let target_work_hours = 0;
                            let target_yards = 0;
                            let table_util = 0;
                            $.each(table, function(i_d,date){//date

                                if(date['input'] == 1){
                                    days = days + 1;
                                    work_hours = work_hours + date['work_hour'];
                                    yards = Math.round(yards + date['actual_yard']);
                                }
                                target_days = target_days + 1;
                                target_work_hours = target_work_hours + date['work_hour'];
                                target_yards = Math.round(target_work_hours * 319.5);
                                table_util = Math.round((yards/target_yards)*100);
                            });

                            //totalpertable
                            cut_util_table_b2.append('<tr>\n' +
                                '<td scope="col">'+i_t+'</td>\n' +
                                '<td scope="col">'+days+'</td>\n' +
                                '<td scope="col">'+work_hours+'</td>\n' +
                                '<td scope="col">'+yards+'</td>\n' +
                                '<td scope="col">'+target_days+'</td>\n' +
                                '<td scope="col">'+target_work_hours+'</td>\n' +
                                '<td scope="col">'+target_yards+'</td>\n' +
                                '<td scope="col">'+table_util+'%</td>\n' +
                                '</tr>');

                            all_table_days = all_table_days + days;
                            all_table_work_hours = all_table_work_hours + work_hours;
                            all_table_yards = all_table_yards + yards;
                            all_target_table_days = target_table * target_days;
                            all_target_table_work_hours = target_table * target_work_hours;
                            all_target_table_yards = target_table * target_yards;
                            all_table_util = Math.round((all_table_yards/all_target_table_yards)*100);
                        });

                        //totalall
                        cut_util_table_b2.append('<tr>\n' +
                            '<th scope="col">Total</th>\n' +
                            '<th scope="col">'+all_table_days+'</th>\n' +
                            '<th scope="col">'+all_table_work_hours+'</th>\n' +
                            '<th scope="col">'+all_table_yards+'</th>\n' +
                            '<th scope="col">'+all_target_table_days+'</th>\n' +
                            '<th scope="col">'+all_target_table_work_hours+'</th>\n' +
                            '<th scope="col">'+all_target_table_yards+'</th>\n' +
                            '<th scope="col">'+all_table_util+'%</th>\n' +
                            '</tr>');

                    }

                    if(i_b == 4){

                        let target_table = building['target_table'];
                        let all_table_days = 0;
                        let all_table_work_hours = 0;
                        let all_table_yards = 0;
                        let all_target_table_days = 0;
                        let all_target_table_work_hours = 0;
                        let all_target_table_yards = 0;
                        let all_table_util = 0;
                        $.each(building['tables'], function(i_t,table){//table

                            let days = 0;
                            let work_hours = 0;
                            let yards = 0;
                            let target_days = 0;
                            let target_work_hours = 0;
                            let target_yards = 0;
                            let table_util = 0;
                            $.each(table, function(i_d,date){//date

                                if(date['input'] == 1){
                                    days = days + 1;
                                    work_hours = work_hours + date['work_hour'];
                                    yards = Math.round(yards + date['actual_yard']);
                                }
                                target_days = target_days + 1;
                                target_work_hours = target_work_hours + date['work_hour'];
                                target_yards = Math.round(target_work_hours * 319.5);
                                table_util = Math.round((yards/target_yards)*100);
                            });

                            //totalpertable
                            cut_util_table_d4.append('<tr>\n' +
                                '<td scope="col">'+i_t+'</td>\n' +
                                '<td scope="col">'+days+'</td>\n' +
                                '<td scope="col">'+work_hours+'</td>\n' +
                                '<td scope="col">'+yards+'</td>\n' +
                                '<td scope="col">'+target_days+'</td>\n' +
                                '<td scope="col">'+target_work_hours+'</td>\n' +
                                '<td scope="col">'+target_yards+'</td>\n' +
                                '<td scope="col">'+table_util+'%</td>\n' +
                                '</tr>');

                            all_table_days = all_table_days + days;
                            all_table_work_hours = all_table_work_hours + work_hours;
                            all_table_yards = all_table_yards + yards;
                            all_target_table_days = target_table * target_days;
                            all_target_table_work_hours = target_table * target_work_hours;
                            all_target_table_yards = target_table * target_yards;
                            all_table_util = Math.round((all_table_yards/all_target_table_yards)*100);
                        });

                        //totalall
                        cut_util_table_d4.append('<tr>\n' +
                            '<th scope="col">Total</th>\n' +
                            '<th scope="col">'+all_table_days+'</th>\n' +
                            '<th scope="col">'+all_table_work_hours+'</th>\n' +
                            '<th scope="col">'+all_table_yards+'</th>\n' +
                            '<th scope="col">'+all_target_table_days+'</th>\n' +
                            '<th scope="col">'+all_target_table_work_hours+'</th>\n' +
                            '<th scope="col">'+all_target_table_yards+'</th>\n' +
                            '<th scope="col">'+all_table_util+'%</th>\n' +
                            '</tr>');

                    }

                    if(i_b == 5){

                        let target_table = building['target_table'];
                        let all_table_days = 0;
                        let all_table_work_hours = 0;
                        let all_table_yards = 0;
                        let all_target_table_days = 0;
                        let all_target_table_work_hours = 0;
                        let all_target_table_yards = 0;
                        let all_table_util = 0;
                        $.each(building['tables'], function(i_t,table){//table

                            let days = 0;
                            let work_hours = 0;
                            let yards = 0;
                            let target_days = 0;
                            let target_work_hours = 0;
                            let target_yards = 0;
                            let table_util = 0;
                            $.each(table, function(i_d,date){//date

                                if(date['input'] == 1){
                                    days = days + 1;
                                    work_hours = work_hours + date['work_hour'];
                                    yards = Math.round(yards + date['actual_yard']);
                                }
                                target_days = target_days + 1;
                                target_work_hours = target_work_hours + date['work_hour'];
                                target_yards = Math.round(target_work_hours * 319.5);
                                table_util = Math.round((yards/target_yards)*100);
                            });

                            //totalpertable
                            cut_util_table_e5.append('<tr>\n' +
                                '<td scope="col">'+i_t+'</td>\n' +
                                '<td scope="col">'+days+'</td>\n' +
                                '<td scope="col">'+work_hours+'</td>\n' +
                                '<td scope="col">'+yards+'</td>\n' +
                                '<td scope="col">'+target_days+'</td>\n' +
                                '<td scope="col">'+target_work_hours+'</td>\n' +
                                '<td scope="col">'+target_yards+'</td>\n' +
                                '<td scope="col">'+table_util+'%</td>\n' +
                                '</tr>');

                            all_table_days = all_table_days + days;
                            all_table_work_hours = all_table_work_hours + work_hours;
                            all_table_yards = all_table_yards + yards;
                            all_target_table_days = target_table * target_days;
                            all_target_table_work_hours = target_table * target_work_hours;
                            all_target_table_yards = target_table * target_yards;
                            all_table_util = Math.round((all_table_yards/all_target_table_yards)*100);
                        });

                        //totalall
                        cut_util_table_e5.append('<tr>\n' +
                            '<th scope="col">Total</th>\n' +
                            '<th scope="col">'+all_table_days+'</th>\n' +
                            '<th scope="col">'+all_table_work_hours+'</th>\n' +
                            '<th scope="col">'+all_table_yards+'</th>\n' +
                            '<th scope="col">'+all_target_table_days+'</th>\n' +
                            '<th scope="col">'+all_target_table_work_hours+'</th>\n' +
                            '<th scope="col">'+all_target_table_yards+'</th>\n' +
                            '<th scope="col">'+all_table_util+'%</th>\n' +
                            '</tr>');

                    }


                });




            },
            error: function (x,h,r) {
                if(x.responseJSON['spread_end']){
                    alert(x.responseJSON['spread_end'][0]);
                }
                if(x.responseJSON['spread_start']){
                    alert(x.responseJSON['spread_start'][0]);
                }

            }

        });

    }



}







function getTotalCutUtilDate(start,end){

    if(end.val() && start.val()) {

        let cut_dates = {
            spread_start: start.val() + ' 00:00:01',
            spread_end: end.val() + ' 23:59:59',
        }

        $.ajax({

            type:'POST',
            url: '/api/cuts/total-utilizations',
            data: cut_dates,
            success: function (util) {

                console.log(util);


                cut_total_util_table.empty();
                $.each(util[0], function(i_b,building){//building

                    if(i_b == 2){

                       $.each(building['dates'],function(i_d,date){//date

                           let yard_total = 0;
                           let yard_total_r = 0;
                           let work_hour_divider = 0;
                           let work_hour = 0;
                           let avg_work_hour = 0;
                           let target_yard = 0;
                           let total_target_yard = 0;
                           let total_target_yard_r = 0;
                           let table_count = 0;
                           let table_target = building['target_table'];
                           let table_util = 0;
                           $.each(date,function(i_t,table){//table
                               yard_total = yard_total + table.actual_yard;
                                yard_total = yard_total + table.actual_yard;
                                work_hour = work_hour + table.work_hour;
                                work_hour_divider = work_hour_divider + 1;
                                if(table.input == 1){
                                    table_count = table_count + 1;
                                }

                           });
                           yard_total_r = Math.round(yard_total);
                            avg_work_hour = work_hour/work_hour_divider;
                            target_yard = avg_work_hour*319.5;
                            total_target_yard = table_target*target_yard;
                           total_target_yard_r = Math.round(total_target_yard);
                            table_util = Math.round((yard_total/total_target_yard)*100);

                           cut_total_util_table.append(' <tr>\n' +
                               '<td scope="col">'+i_d+'</td>\n' +
                               '<td scope="col">'+i_b+'</td>\n' +
                               '<td scope="col">'+yard_total_r+'</td>\n' +
                               '<td scope="col">'+avg_work_hour+'</td>\n' +
                               '<td scope="col">'+yard_total+'</td>\n' +
                               '<td scope="col">'+avg_work_hour+'</td>\n' +
                               '<td scope="col">'+target_yard+'</td>\n' +
                               '<td scope="col">'+table_util+'%</td>\n' +
                               '<td scope="col">'+i_d+'</td>\n' +
                               '<td scope="col">'+i_d+'</td>\n' +
                               '<td scope="col">Spreading</td>\n' +
                               '<td scope="col">1</td>\n' +
                               '<td scope="col">'+avg_work_hour+'</td>\n' +
                               '<td scope="col">'+total_target_yard_r+'</td>\n' +
                               '<td scope="col">'+table_target+'</td>\n' +
                               '<td scope="col">'+table_target+'</td>\n' +
                               '<td scope="col">'+table_count+'</td>\n' +
                               '<td scope="col">'+total_target_yard+'</td>\n' +
                               '</tr>');

                       });


                    }
                    if(i_b == 4){

                        $.each(building['dates'],function(i_d,date){//date

                            let yard_total = 0;
                            let yard_total_r = 0;
                            let work_hour_divider = 0;
                            let work_hour = 0;
                            let avg_work_hour = 0;
                            let target_yard = 0;
                            let total_target_yard = 0;
                            let total_target_yard_r = 0;
                            let table_count = 0;
                            let table_target = building['target_table'];
                            let table_util = 0;
                            $.each(date,function(i_t,table){//table
                                yard_total = yard_total + table.actual_yard;
                                yard_total = yard_total + table.actual_yard;
                                work_hour = work_hour + table.work_hour;
                                work_hour_divider = work_hour_divider + 1;
                                if(table.input == 1){
                                    table_count = table_count + 1;
                                }

                            });
                            yard_total_r = Math.round(yard_total);
                            avg_work_hour = work_hour/work_hour_divider;
                            target_yard = avg_work_hour*319.5;
                            total_target_yard = table_target*target_yard;
                            total_target_yard_r = Math.round(total_target_yard);
                            table_util = Math.round((yard_total/total_target_yard)*100);

                            cut_total_util_table.append(' <tr>\n' +
                                '<td scope="col">'+i_d+'</td>\n' +
                                '<td scope="col">'+i_b+'</td>\n' +
                                '<td scope="col">'+yard_total_r+'</td>\n' +
                                '<td scope="col">'+avg_work_hour+'</td>\n' +
                                '<td scope="col">'+yard_total+'</td>\n' +
                                '<td scope="col">'+avg_work_hour+'</td>\n' +
                                '<td scope="col">'+target_yard+'</td>\n' +
                                '<td scope="col">'+table_util+'%</td>\n' +
                                '<td scope="col">'+i_d+'</td>\n' +
                                '<td scope="col">'+i_d+'</td>\n' +
                                '<td scope="col">Spreading</td>\n' +
                                '<td scope="col">1</td>\n' +
                                '<td scope="col">'+avg_work_hour+'</td>\n' +
                                '<td scope="col">'+total_target_yard_r+'</td>\n' +
                                '<td scope="col">'+table_target+'</td>\n' +
                                '<td scope="col">'+table_target+'</td>\n' +
                                '<td scope="col">'+table_count+'</td>\n' +
                                '<td scope="col">'+total_target_yard+'</td>\n' +
                                '</tr>');

                        });

                    }
                    if(i_b == 5){

                        $.each(building['dates'],function(i_d,date){//date

                            let yard_total = 0;
                            let yard_total_r = 0;
                            let work_hour_divider = 0;
                            let work_hour = 0;
                            let avg_work_hour = 0;
                            let target_yard = 0;
                            let total_target_yard = 0;
                            let total_target_yard_r = 0;
                            let table_count = 0;
                            let table_target = building['target_table'];
                            let table_util = 0;
                            $.each(date,function(i_t,table){//table
                                yard_total = yard_total + table.actual_yard;
                                yard_total = yard_total + table.actual_yard;
                                work_hour = work_hour + table.work_hour;
                                work_hour_divider = work_hour_divider + 1;
                                if(table.input == 1){
                                    table_count = table_count + 1;
                                }

                            });
                            yard_total_r = Math.round(yard_total);
                            avg_work_hour = work_hour/work_hour_divider;
                            target_yard = avg_work_hour*319.5;
                            total_target_yard = table_target*target_yard;
                            total_target_yard_r = Math.round(total_target_yard);
                            table_util = Math.round((yard_total/total_target_yard)*100);

                            cut_total_util_table.append(' <tr>\n' +
                                '<td scope="col">'+i_d+'</td>\n' +
                                '<td scope="col">'+i_b+'</td>\n' +
                                '<td scope="col">'+yard_total_r+'</td>\n' +
                                '<td scope="col">'+avg_work_hour+'</td>\n' +
                                '<td scope="col">'+yard_total+'</td>\n' +
                                '<td scope="col">'+avg_work_hour+'</td>\n' +
                                '<td scope="col">'+target_yard+'</td>\n' +
                                '<td scope="col">'+table_util+'%</td>\n' +
                                '<td scope="col">'+i_d+'</td>\n' +
                                '<td scope="col">'+i_d+'</td>\n' +
                                '<td scope="col">Spreading</td>\n' +
                                '<td scope="col">1</td>\n' +
                                '<td scope="col">'+avg_work_hour+'</td>\n' +
                                '<td scope="col">'+total_target_yard_r+'</td>\n' +
                                '<td scope="col">'+table_target+'</td>\n' +
                                '<td scope="col">'+table_target+'</td>\n' +
                                '<td scope="col">'+table_count+'</td>\n' +
                                '<td scope="col">'+total_target_yard+'</td>\n' +
                                '</tr>');

                        });

                    }



                });

            },
            error: function (x,h,r) {
                if(x.responseJSON['spread_end']){
                    alert(x.responseJSON['spread_end'][0]);
                }
                if(x.responseJSON['spread_start']){
                    alert(x.responseJSON['spread_start'][0]);
                }

            }

        });

    }
}
