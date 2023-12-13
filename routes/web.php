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


    Route::resource('styles','StyleController');

    Route::get('purchase-orders','PurchaseOrderController@index')->name('purchase-orders.index');
    Route::get('fabric-colors','FabricColorController@index')->name('fabric-colors.index');
    Route::get('color-codes','FabricCodeController@index')->name('color-codes.index');
    Route::get('fabric-types','FabricTypeController@index')->name('fabric-types.index');
    Route::get('fabric-codes','PlacementController@index')->name('fabric-codes.index');

    Route::get('production-events','ProductionEventController@index')->name('production-events.index');

    Route::resource('outputs','OutputController');

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

    Route::get('carton-orders/export/{cartonorder}','CartonOrderController@export')->name('carton-orders.export');
    Route::resource('carton-orders','CartonOrderController');
    Route::get('carton-orders/{cartonorder}','CartonOrderController@show')->name('carton-orders.show');


    Route::resource('cartons','CartonController');


});

Auth::routes();

//single route

Route::get('/', function () {
    return view('home');
});

Route::get('locale/{locale}', function ($locale){
    Session::put('locale',$locale);
    return redirect()->back();
});

route::post('/upload-excel',function(){

    $file = request()->file('file')->store('public/files/exam2');

    return 0;
})->name('upload.excel');



