<?php

use App\Models\Style;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CutsExport;




Route::group(['namespace' => 'Web'],function(){

    Route::get('users/change','UserController@changePassword')->name('users.changepass');
    Route::post('users/change/update','UserController@passwordUpdate')->name('users.passupdate');

    route::get('/aw',function(){
        $countpl = (\App\Models\PackingList::where('pl_batch',7)->max('pl_number_batch'));

        $test = array();
        dump(count($test));
        array_push($test,1);
        array_push($test,2);
        array_push($test,3);
        array_push($test,4);
        array_push($test,5);
        unset($test[0]);
        $test = array_values($test);
        array_push($test,6);

        dump(count($test));
        dd($test);
    });

    Route::resource('employees','EmployeeController');

    Route::post('cuts/export', 'CutController@exportData')->name('export.cuts');
    Route::get('cuts/total-utilization', 'CutController@totalUtil')->name('cuts.total-util');
    Route::get('cuts/utilization', 'CutController@util')->name('cuts.util');
    Route::resource('cuts','CutController');

    Route::delete('styles/destroy/mcq/{id}','StyleController@destroyMCQ')->name('styles.destroymcq');
    Route::post('styles/update/mcqs','StyleController@updatemcqs')->name('styles.updatemcqs');
    Route::get('styles/edit/mcqs','StyleController@editmcqs')->name('styles.editmcqs');
    Route::post('styles/update/weights','StyleController@updateweights')->name('styles.updateweights');
    Route::get('styles/edit/weights','StyleController@editweights')->name('styles.editweights');
    Route::resource('styles','StyleController');

    Route::get('purchase-orders','PurchaseOrderController@index')->name('purchase-orders.index');
    Route::get('fabric-colors','FabricColorController@index')->name('fabric-colors.index');
    Route::get('color-codes','FabricCodeController@index')->name('color-codes.index');
    Route::get('fabric-types','FabricTypeController@index')->name('fabric-types.index');
    Route::get('fabric-codes','PlacementController@index')->name('fabric-codes.index');

    Route::get('production-events','ProductionEventController@index')->name('production-events.index');

    Route::resource('outputs','OutputController');

    Route::post('v2-packing-lists/import','V2PackingListController@import')->name('v2-packing-lists.import');
    Route::get('v2-packing-lists','V2PackingListController@index')->name('v2-packing-lists.index');
    Route::get('v2-packing-lists/create','V2PackingListController@create')->name('v2-packing-lists.create');

    Route::get('packing-lists/batch/{batch}/number/{number}/refresh-weight','PackingListController@refreshWeights')->name('packing-lists.refreshweights');
    Route::get('packing-lists/exports/batches/{batch}','PackingListController@exportBatches')->name('packing-lists.exportbatches');
    Route::delete('packing-lists/destroy-batch/{batch}/destroy-number/{number}','PackingListController@destroyNumber')->name('packing-lists.destroy-number');
    Route::delete('packing-lists/destroy-batch/{batch}','PackingListController@destroyBatch')->name('packing-lists.destroy-batch');
    Route::get('packing-lists/batch/{batch}/view-all','PackingListController@viewa')->name('packing-lists.viewa');
    Route::get('packing-lists/batch/{batch}/number/{number}','PackingListController@number')->name('packing-lists.number');
    Route::get('packing-lists/batch/{batch}','PackingListController@batch')->name('packing-lists.batch');
    Route::get('packing-lists/batch/{batch}/ctnform','PackingListController@ctnform')->name('packing-lists.ctnform');
    Route::get('packing-lists/batch/{batch}/export','PackingListController@exportBatch')->name('packing-lists.exportbatch');
    Route::get('packing-lists/export','PackingListController@export')->name('packing-lists.export');
    Route::get('packing-lists/batch/{batch}/number/{number}/export','PackingListController@exportNumber')->name('packing-lists.exportnumber');
    Route::post('packing-lists/import','PackingListController@import')->name('packing-lists.import');
    Route::post('packing-lists/mark','PackingListController@mark')->name('packing-lists.mark');
    Route::get('packing-lists/all/views','PackingListController@allViews')->name('packing-lists.allviews');
    Route::resource('packing-lists','PackingListController');

    Route::get('cartons/carton/order/create','CartonController@cartonCreate')->name('cartons.cartoncreate');
    Route::get('cartons/order/create','CartonController@orderCreate')->name('cartons.order-create');
    Route::resource('cartons','CartonController');

    Route::post('carton-orders/mail','CartonOrderController@sendMail')->name('carton-orders.sendMail');
    Route::get('carton-orders/export/{cartonorder}','CartonOrderController@export')->name('carton-orders.export');
    Route::resource('carton-orders','CartonOrderController');
    Route::get('carton-orders/{cartonorder}','CartonOrderController@show')->name('carton-orders.show');




});

Auth::routes();

//single route

Route::get('/', function () {
    return view('home');
});

Route::get('/testmail', function () {
    $name = 'Warren';

//    $mailable = new \Illuminate\Mail\Mailable();
//
//    $mailable->from('it_borin@horizon-outdoor.com')
//        ->to('jwarren.hernandez@gmail.com')
//        ->subject('Sample Mailable')
//        ->html('My Messages');
//    \Illuminate\Support\Facades\Config::set('mail.from', [
//        'address' => 'example@expal.com',
//        'name' => 'example',
//    ]); // default
    \Illuminate\Support\Facades\Mail::to('jwarren.hernandez@gmail.com')->send(new \App\Mail\TestEmail($name));
});

Route::get('locale/{locale}', function ($locale){
    Session::put('locale',$locale);
    return redirect()->back();
});

route::post('/upload-excel',function(){

    $file = request()->file('file')->store('public/files/exam2');

    return 0;
})->name('upload.excel');



