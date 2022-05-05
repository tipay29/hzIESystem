
let l = window.location;
let lsplit = l.pathname.split('/');


let cut_style = $("#cut_style");
let cut_purchase_order = $('#cut_purchase_order');
let cut_fabric_code = $('#cut_fabric_code');
let cut_fabric_color = $('#cut_fabric_color');
let cut_fabric_type = $('#cut_fabric_type');
let cut_placement = $('#cut_placement');



if(lsplit.includes('cuts')){

    if(l.pathname === '/cuts/create') {
        if(cut_style.val() !== null){
            getStyle(cut_style);
        }
    }else{
        sessionStorage.clear();        //delete session value
    }

    if(lsplit.includes('edit') && lsplit.includes('cuts')) {

            setCutSession(lsplit[2]);

        getStyle(cut_style);
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

    getCutUtilAll();

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
        getTotalCutUtilDate(cut_total_util_start.val(), cut_total_util_end.val());
    });

    cut_total_util_end.change(function(){

        getTotalCutUtilDate(cut_total_util_start.val(), cut_total_util_end.val());
    });

}


cut_style.change(function(){

    getStyle(cut_style);
    sessionStorage.clear();
});

cut_purchase_order.change(function(){

        if(cut_purchase_order.val() !== null){
            sessionStorage.setItem('purchase_order',cut_purchase_order.val());
        }

});

cut_fabric_code.change(function(){

    if(cut_fabric_code.val() !== null){
        sessionStorage.setItem('fabric_code',cut_fabric_code.val());
    }

});

cut_fabric_color.change(function(){

    if(cut_fabric_color.val() !== null){
        sessionStorage.setItem('fabric_color',cut_fabric_color.val());
    }

});

cut_fabric_type.change(function(){

    if(cut_fabric_type.val() !== null){
        sessionStorage.setItem('fabric_type',cut_fabric_type.val());
    }

});

cut_placement.change(function(){

    if(cut_placement.val() !== null){
        sessionStorage.setItem('placement',cut_placement.val());
    }

});



 function getStyle(style){

     $.ajax({
         type: 'GET',
         url: '/api/styles/' + style.val(),
         success: function (style) {

             cut_purchase_order.empty();
             $.each(style.purchase_orders, function(i,purchase_order){

                 let newOption = '<option value="'+purchase_order.id+'"  '
                     +
                     oldPOFunction(purchase_order.id)

                     +' >'+purchase_order.purchase_order+'</option>';
                 cut_purchase_order.append(newOption);

             });
             cut_purchase_order.trigger("chosen:updated");

             cut_fabric_code.empty();
             $.each(style.fabric_codes, function(i,fabric_code){

                 let newOption = '<option value="'+fabric_code.id+'"  '
                     +
                     oldFabricCodeFunction(fabric_code.id)
                     +' >'+fabric_code.fabric_code+'</option>';
                 cut_fabric_code.append(newOption);

             });
             cut_fabric_code.trigger("chosen:updated");

             cut_fabric_color.empty();
             $.each(style.fabric_colors, function(i,fabric_color){

                 let newOption = '<option value="'+fabric_color.id+'"  '
                     +
                     oldFabricColorFunction(fabric_color.id)
                     +' >'+fabric_color.fabric_color+'</option>';
                 cut_fabric_color.append(newOption);

             });
             cut_fabric_color.trigger("chosen:updated");

             cut_fabric_type.empty();
             $.each(style.fabric_types, function(i,fabric_type){

                 let newOption = '<option value="'+fabric_type.id+'"  '
                     +
                     oldFabricTypeFunction(fabric_type.id)
                     +' >'+fabric_type.fabric_type+'</option>';
                 cut_fabric_type.append(newOption);

             });
             cut_fabric_type.trigger("chosen:updated");


             cut_placement.empty();
             $.each(style.placements, function(i,placement){

                 let newOption = '<option value="'+placement.id+'"  '
                     +
                     oldPlacementFunction(placement.id)
                     + ' >'+placement.placement+'</option>';
                 cut_placement.append(newOption);

             });
             cut_placement.trigger("chosen:updated");


         },
         error: function(x,h,r){
             console.log(x);
         },
     });
 }

 function setCutSession(cut){
     $.ajax({
         type: 'GET',
         url: '/api/cuts/' + cut,
         success: function (cut) {
             sessionStorage.setItem('fabric_color', cut.fabric_colors.map(c => c.id));
             sessionStorage.setItem('fabric_code', cut.fabric_codes.map(c => c.id));
             sessionStorage.setItem('fabric_type', cut.fabric_types.map(c => c.id));
             sessionStorage.setItem('placement', cut.placements.map(c => c.id));
             sessionStorage.setItem('purchase_order', cut.purchase_orders.map(c => c.id));
         },
     });
 }

function oldPOFunction(data){


    if(sessionStorage.getItem('purchase_order')){
        let s_purchase_order = sessionStorage.getItem('purchase_order').split(',');

        if(s_purchase_order.includes(data.toString())){
            return 'selected';
        }
    }

    if(lsplit.includes('edit') && lsplit.includes('cuts')){
        return '';
    }else{
        return 'selected';
    }
}

function oldFabricCodeFunction(data){


    if(sessionStorage.getItem('fabric_code')){
        let s_fabric_code = sessionStorage.getItem('fabric_code').split(',');

        if(s_fabric_code.includes(data.toString())){
            return 'selected';
        }
    }

    if(lsplit.includes('edit') && lsplit.includes('cuts')){
        return '';
    }else{
        return 'selected';
    }
}

function oldFabricColorFunction(data){


    if(sessionStorage.getItem('fabric_color')){
        let s_fabric_color = sessionStorage.getItem('fabric_color').split(',');

        if(s_fabric_color.includes(data.toString())){
            return 'selected';
        }
    }

    if(lsplit.includes('edit') && lsplit.includes('cuts')){
        return '';
    }else{
        return 'selected';
    }
}

function oldFabricTypeFunction(data){


    if(sessionStorage.getItem('fabric_type')){
        let s_fabric_type = sessionStorage.getItem('fabric_type').split(',');

        if(s_fabric_type.includes(data.toString())){
            return 'selected';
        }
    }

    if(lsplit.includes('edit') && lsplit.includes('cuts')){
        return '';
    }else{
        return 'selected';
    }
}

function oldPlacementFunction(data){


    if(sessionStorage.getItem('placement')){
        let s_placement = sessionStorage.getItem('placement').split(',');

        if(s_placement.includes(data.toString())){
            return 'selected';
        }
    }

    if(lsplit.includes('edit') && lsplit.includes('cuts')){
        return '';
    }else{
        return 'selected';
    }
}

function getCutUtilAll(){


    $.ajax({
        type: 'GET',
        url: '/api/cuts/utilizations',
        success: function (util) {
            console.log(util);
            $.each(util[0]['building'], function(i_b,buildings){

                    if(i_b === 'B2'){

                        let totalDaysb2 = 0;
                        let totalWorkHoursb2 = 0;
                        let totalActualYardsb2 = 0;
                        let totalTargetYardsb2 = 0;
                        let totalUtilb2 = 0;

                        $.each(buildings['table'], function(i_t,table) {

                            totalDaysb2 = totalDaysb2 + table['days'];
                            totalWorkHoursb2 = totalWorkHoursb2 + table['work_hours'];
                            totalActualYardsb2 = totalActualYardsb2 + table['actual_yards'];
                            totalTargetYardsb2 = Math.round(totalWorkHoursb2 * 319.55);
                            totalUtilb2  = Math.round(((totalActualYardsb2/totalTargetYardsb2)*100));

                            cut_util_table_b2.append(''
                                +

                                '    <tr>\n' +
                                '      <td scope="row">'+ i_t +'</td>\n' +
                                '      <td scope="row">'+ table['days'] +'</td>\n' +
                                '      <td scope="row">'+ table['work_hours'] +'</td>\n' +
                                '      <td scope="row">'+ table['actual_yards'] +'</td>\n' +
                                '      <td scope="row">'+ table['target_yards'] +'</td>\n' +
                                '      <td scope="row">'+ table['table_util']+ '%' +'</td>\n' +
                                '    </tr>\n' +

                                    '');

                        });

                        cut_util_table_b2.append(''
                            +

                            '    <tr>\n' +
                            '      <th scope="col">Total</th>\n' +
                            '      <th scope="col">'+ totalDaysb2 +'</th>\n' +
                            '      <th scope="col">'+ totalWorkHoursb2 +'</th>\n' +
                            '      <th scope="col">'+ totalActualYardsb2 +'</th>\n' +
                            '      <th scope="col">'+ totalTargetYardsb2 +'</th>\n' +
                            '      <th scope="col">'+ totalUtilb2 + '%' +'</th>\n' +
                            '    </tr>\n' +

                            '');

                    }

                    if(i_b === 'D4'){

                        let totalDaysd4 = 0;
                        let totalWorkHoursd4 = 0;
                        let totalActualYardsd4 = 0;
                        let totalTargetYardsd4 = 0;
                        let totalUtild4 = 0;

                        $.each(buildings['table'], function(i_t,table) {

                            totalDaysd4 = totalDaysd4 + table['days'];
                            totalWorkHoursd4 = totalWorkHoursd4 + table['work_hours'];
                            totalActualYardsd4 = totalActualYardsd4 + table['actual_yards'];
                            totalTargetYardsd4 = Math.round(totalWorkHoursd4 * 319.55);
                            totalUtild4  = Math.round(((totalActualYardsd4/totalTargetYardsd4)*100));

                            cut_util_table_d4.append(''
                                +

                                '    <tr>\n' +
                                '      <td scope="row">'+ i_t +'</td>\n' +
                                '      <td scope="row">'+ table['days'] +'</td>\n' +
                                '      <td scope="row">'+ table['work_hours'] +'</td>\n' +
                                '      <td scope="row">'+ table['actual_yards'] +'</td>\n' +
                                '      <td scope="row">'+ table['target_yards'] +'</td>\n' +
                                '      <td scope="row">'+ table['table_util'] + '%' +'</td>\n' +
                                '    </tr>\n' +

                                    '');
                        });

                        cut_util_table_d4.append(''
                            +

                            '    <tr>\n' +
                            '      <th scope="col">Total</th>\n' +
                            '      <th scope="col">'+ totalDaysd4 +'</th>\n' +
                            '      <th scope="col">'+ totalWorkHoursd4 +'</th>\n' +
                            '      <th scope="col">'+ totalActualYardsd4 +'</th>\n' +
                            '      <th scope="col">'+ totalTargetYardsd4 +'</th>\n' +
                            '      <th scope="col">'+ totalUtild4 + '%' +'</th>\n' +
                            '    </tr>\n' +

                            '');

                    }

                    if(i_b === 'E5'){

                        let totalDayse5 = 0;
                        let totalWorkHourse5 = 0;
                        let totalActualYardse5 = 0;
                        let totalTargetYardse5 = 0;
                        let totalUtile5 = 0;




                        $.each(buildings['table'], function(i_t,table) {

                            totalDayse5 = totalDayse5 + table['days'];
                            totalWorkHourse5 = totalWorkHourse5 + table['work_hours'];
                            totalActualYardse5 = totalActualYardse5 + table['actual_yards'];
                            totalTargetYardse5 = Math.round(totalWorkHourse5 * 319.55);
                            totalUtile5 = Math.round(((totalActualYardse5/totalTargetYardse5)*100));

                            cut_util_table_e5.append(''
                                +
                                '    <tr>\n' +
                                '      <td scope="row">'+ i_t +'</td>\n' +
                                '      <td scope="row">'+ table['days'] +'</td>\n' +
                                '      <td scope="row">'+ table['work_hours'] +'</td>\n' +
                                '      <td scope="row">'+ table['actual_yards'] +'</td>\n' +
                                '      <td scope="row">'+ table['target_yards'] +'</td>\n' +
                                '      <td scope="row">'+ table['table_util']+ '%' +'</td>\n' +
                                '    </tr>\n' +

                                    '');
                        });

                        cut_util_table_e5.append(''
                            +

                            '    <tr>\n' +
                            '      <th scope="col">Total</th>\n' +
                            '      <th scope="col">'+ totalDayse5 +'</th>\n' +
                            '      <th scope="col">'+ totalWorkHourse5 +'</th>\n' +
                            '      <th scope="col">'+ totalActualYardse5 +'</th>\n' +
                            '      <th scope="col">'+ totalTargetYardse5 +'</th>\n' +
                            '      <th scope="col">'+ totalUtile5 + '%' +'</th>\n' +
                            '    </tr>\n' +

                            '');


                    }


            });




        },
        error: function(x,h,r){
            console.log(x);
        },
    });

}

function getCutUtilDate(start,end){

    if(end.val() && start.val()) {

        let cut_dates = {
            spread_start: start.val(),
            spread_end: end.val(),
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
                $.each(util[0]['building'], function(i_b,buildings){

                    if(i_b === 'B2'){

                        let totalDaysb2 = 0;
                        let totalWorkHoursb2 = 0;
                        let totalActualYardsb2 = 0;
                        let totalTargetYardsb2 = 0;
                        let totalUtilb2 = 0;

                        $.each(buildings['table'], function(i_t,table) {

                            totalDaysb2 = totalDaysb2 + table['days'];
                            totalWorkHoursb2 = totalWorkHoursb2 + table['work_hours'];
                            totalActualYardsb2 = totalActualYardsb2 + table['actual_yards'];
                            totalTargetYardsb2 = Math.round(totalWorkHoursb2 * 319.55);
                            totalUtilb2  = Math.round(((totalActualYardsb2/totalTargetYardsb2)*100));


                            cut_util_table_b2.append(''
                                +

                                '    <tr>\n' +
                                '      <td scope="row">'+ i_t +'</td>\n' +
                                '      <td scope="row">'+ table['days'] +'</td>\n' +
                                '      <td scope="row">'+ table['work_hours'] +'</td>\n' +
                                '      <td scope="row">'+ table['actual_yards'] +'</td>\n' +
                                '      <td scope="row">'+ table['target_yards'] +'</td>\n' +
                                '      <td scope="row">'+ table['table_util']+ '%' +'</td>\n' +
                                '    </tr>\n' +

                                '');

                        });

                        cut_util_table_b2.append(''
                            +

                            '    <tr>\n' +
                            '      <th scope="col">Total</th>\n' +
                            '      <th scope="col">'+ totalDaysb2 +'</th>\n' +
                            '      <th scope="col">'+ totalWorkHoursb2 +'</th>\n' +
                            '      <th scope="col">'+ totalActualYardsb2 +'</th>\n' +
                            '      <th scope="col">'+ totalTargetYardsb2 +'</th>\n' +
                            '      <th scope="col">'+ totalUtilb2 + '%' +'</th>\n' +
                            '    </tr>\n' +

                            '');

                    }

                    if(i_b === 'D4'){

                        let totalDaysd4 = 0;
                        let totalWorkHoursd4 = 0;
                        let totalActualYardsd4 = 0;
                        let totalTargetYardsd4 = 0;
                        let totalUtild4 = 0;

                        $.each(buildings['table'], function(i_t,table) {

                            totalDaysd4 = totalDaysd4 + table['days'];
                            totalWorkHoursd4 = totalWorkHoursd4 + table['work_hours'];
                            totalActualYardsd4 = totalActualYardsd4 + table['actual_yards'];
                            totalTargetYardsd4 = Math.round(totalWorkHoursd4 * 319.55);
                            totalUtild4  = Math.round(((totalActualYardsd4/totalTargetYardsd4)*100));

                            cut_util_table_d4.append(''
                                +

                                '    <tr>\n' +
                                '      <td scope="row">'+ i_t +'</td>\n' +
                                '      <td scope="row">'+ table['days'] +'</td>\n' +
                                '      <td scope="row">'+ table['work_hours'] +'</td>\n' +
                                '      <td scope="row">'+ table['actual_yards'] +'</td>\n' +
                                '      <td scope="row">'+ table['target_yards'] +'</td>\n' +
                                '      <td scope="row">'+ table['table_util'] + '%' +'</td>\n' +
                                '    </tr>\n' +

                                '');
                        });

                        cut_util_table_d4.append(''
                            +

                            '    <tr>\n' +
                            '      <th scope="col">Total</th>\n' +
                            '      <th scope="col">'+ totalDaysd4 +'</th>\n' +
                            '      <th scope="col">'+ totalWorkHoursd4 +'</th>\n' +
                            '      <th scope="col">'+ totalActualYardsd4 +'</th>\n' +
                            '      <th scope="col">'+ totalTargetYardsd4 +'</th>\n' +
                            '      <th scope="col">'+ totalUtild4 + '%' +'</th>\n' +
                            '    </tr>\n' +

                            '');

                    }

                    if(i_b === 'E5'){

                        let totalDayse5 = 0;
                        let totalWorkHourse5 = 0;
                        let totalActualYardse5 = 0;
                        let totalTargetYardse5 = 0;
                        let totalUtile5 = 0;

                        $.each(buildings['table'], function(i_t,table) {

                            totalDayse5 = totalDayse5 + table['days'];
                            totalWorkHourse5 = totalWorkHourse5 + table['work_hours'];
                            totalActualYardse5 = totalActualYardse5 + table['actual_yards'];
                            totalTargetYardse5 = Math.round(totalWorkHourse5 * 319.55);
                            totalUtile5 = Math.round(((totalActualYardse5/totalTargetYardse5)*100));


                            cut_util_table_e5.append(''
                                +
                                '    <tr>\n' +
                                '      <td scope="row">'+ i_t +'</td>\n' +
                                '      <td scope="row">'+ table['days'] +'</td>\n' +
                                '      <td scope="row">'+ table['work_hours'] +'</td>\n' +
                                '      <td scope="row">'+ table['actual_yards'] +'</td>\n' +
                                '      <td scope="row">'+ table['target_yards'] +'</td>\n' +
                                '      <td scope="row">'+ table['table_util']+ '%' +'</td>\n' +
                                '    </tr>\n' +

                                '');
                        });

                        cut_util_table_e5.append(''
                            +

                            '    <tr>\n' +
                            '      <th scope="col">Total</th>\n' +
                            '      <th scope="col">'+ totalDayse5 +'</th>\n' +
                            '      <th scope="col">'+ totalWorkHourse5 +'</th>\n' +
                            '      <th scope="col">'+ totalActualYardse5 +'</th>\n' +
                            '      <th scope="col">'+ totalTargetYardse5 +'</th>\n' +
                            '      <th scope="col">'+ totalUtile5 + '%' +'</th>\n' +
                            '    </tr>\n' +

                            '');


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
        if(end && start) {

            let cut_dates = {
                spread_start: start,
                spread_end: end,
            }

            $.ajax({

                type:'POST',
                url: '/api/cuts/total-utilizations',
                data: cut_dates,
                success: function (util) {


                    $.each(util[0]['building'], function(i_b,buildings){


                            $.each(buildings, function(i_d,dates) {

                                console.log(dates);


                                avg_work_hours = getAVGWorkHours(dates);
                                actual_yards = getActualYards(dates);
                                table_count = _.size(dates);
                                table_util = ((actual_yards/(table_count*Math.round(Math.round(avg_work_hours)*319.55)))*100).toFixed(2);

                                cut_total_util_table.append('<tr>\n' +
                                    '<th scope="col">'+i_d+'</th>\n' +
                                    '<th scope="col">'+getBuilding(i_b)+'</th>\n' +
                                    '<th scope="col">'+Math.round(actual_yards)+'</th>\n' +
                                    '<th scope="col">'+avg_work_hours+'</th>\n' +
                                    '<th scope="col">'+actual_yards+'</th>\n' +
                                    '<th scope="col">'+Math.round(avg_work_hours)+'</th>\n' +
                                    '<th scope="col">'+Math.round(Math.round(avg_work_hours)*319.55)+'</th>\n' +
                                    '<th scope="col">'+table_util+'%'+ '</th>\n' +
                                    '<th scope="col">'+i_d+'</th>\n' +
                                    '<th scope="col">'+i_d+'</th>\n' +
                                    '<th scope="col">Spreading</th>\n' +
                                    '<th scope="col">1</th>\n' +
                                    '<th scope="col">'+Math.round(avg_work_hours)+'</th>\n' +
                                    '<th scope="col">'+Math.round(table_count*Math.round(Math.round(avg_work_hours)*319.55))+'</th>\n' +
                                    '<th scope="col">'+table_count+'</th>\n' +
                                    '<th scope="col">'+table_count+'</th>\n' +
                                    '<th scope="col">'+table_count+'</th>\n' +
                                    '<th scope="col">'+table_count*Math.round(Math.round(avg_work_hours)*319.55)+'</th>\n' +
                                    '                                </tr>');


                            });




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

function getAVGWorkHours(dates){
     let avg_work_hours = 0;
    let avg_divider = 0;

    $.each(dates, function(i_t,tables) {
        avg_work_hours = avg_work_hours + tables['work_hours'];
        avg_divider = avg_divider + tables['count'];
    });
    avg_work_hours = avg_work_hours/avg_divider;

    return avg_work_hours;
}

function getActualYards(dates){
    let actual_yards = 0;

    $.each(dates, function(i_t,tables) {
        actual_yards = actual_yards + tables['actual_yards'];
    });

    return actual_yards;
}

function getBuilding(b){

     if(b === 'B2'){
         return 2;
     }
    if(b === 'D4'){
        return 4;
    }
    if(b === 'E5'){
        return 5;
    }

}
