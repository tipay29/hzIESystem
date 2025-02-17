<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['as' => 'api.'],function() {
    Route::resource('employees', 'EmployeeApiController');

    Route::resource('fabric-colors', 'FabricColorApiController');
    Route::resource('fabric-codes', 'FabricCodeApiController');
    Route::resource('fabric-types', 'FabricTypeApiController');
    Route::resource('placements', 'PlacementApiController');
    Route::resource('purchase-orders', 'PurchaseOrderApiController');

    Route::post('styles/{style}/sizes/attach/many','StyleApiController@attachm')->name('styles.attachm');
    Route::post('styles/{style}/sizes/attach','StyleApiController@attach')->name('styles.attach');
    Route::resource('styles', 'StyleApiController');

    Route::resource('production-events', 'ProductionEventApiController');


    Route::post('cuts/utilizations', 'CutApiController@util')->name('cuts.util');
    Route::post('cuts/total-utilizations', 'CutApiController@totalutil')->name('cuts.totalutil');
    Route::resource('cuts', 'CutApiController');

    Route::group(['namespace' => 'SheetDB'],function(){
        Route::post('cut-sheetdbs', 'CutSheetDBApiController@store')->name('cut-sheetdbs.store');
    });

    Route::get('cartons/brands', 'CartonApiController@showBrand')->name('cartons.showbrand');
    Route::post('cartons/order/create','CartonApiController@createCartonOrder')->name('packing-lists.createCartonOrder');
    Route::post('carton-orders','CartonOrderApiController@storeCartonOrder')->name('packing-lists.storeCartonOrder');
    Route::post('carton-orders/update/quantity','CartonOrderApiController@updateCartonQuantity')->name('packing-lists.updateCartonQuantity');
    Route::post('carton-orders/update/code','CartonOrderApiController@updateCartonCode')->name('packing-lists.updateCartonCode');
    Route::post('carton-orders/update/collection','CartonOrderApiController@updateCartonCollection')->name('packing-lists.updateCartonCollection');
    Route::post('carton-orders/update/approve','CartonOrderApiController@updateCartonApprove')->name('packing-lists.updateCartonApprove');

    Route::get('suppliers/{supplier}','SupplierApiController@show')->name('packing-lists.show');

    Route::post('packing-lists/batch/{batch}/number/{number}/color','PackinglistApiController@getColor')->name('packing-lists.getColor');
    Route::post('packing-lists/batch/{batch}/number/{number}/description','PackinglistApiController@getDescription')->name('packing-lists.getDescription');
    Route::post('packing-lists/batch/{batch}/number/{number}/material','PackinglistApiController@getMaterial')->name('packing-lists.getMaterial');
    Route::post('packing-lists/batch/{batch}/number/{number}/masterpo','PackinglistApiController@getMasterPO')->name('packing-lists.getMasterPO');
    Route::post('packing-lists/batch/{batch}/number/{number}/po','PackinglistApiController@getPO')->name('packing-lists.getPO');
    Route::post('packing-lists/number/approve','PackinglistApiController@approveNumber')->name('packing-lists.approveNumber');
    Route::post('packing-lists/approve/{approve}','PackinglistApiController@approves')->name('packing-lists.approves');
    Route::post('packing-lists/update/customers','PackinglistApiController@customers')->name('packing-lists.customers');
    Route::post('packing-lists/update/shipments','PackinglistApiController@shipments')->name('packing-lists.shipments');
    Route::post('packing-lists/update/factorypos','PackinglistApiController@factorypos')->name('packing-lists.factorypos');
    Route::post('packing-lists/update/status','PackinglistApiController@status')->name('packing-lists.status');
    Route::post('packing-lists/update/prepacks','PackinglistApiController@prepacks')->name('packing-lists.prepacks');
    Route::post('packing-lists/update/destinations','PackinglistApiController@destinations')->name('packing-lists.destinations');
    Route::post('packing-lists/update/crds','PackinglistApiController@crds')->name('packing-lists.crds');
    Route::post('packing-lists/update/countries','PackinglistApiController@countries')->name('packing-lists.countries');
    Route::post('packing-lists/update/specials','PackinglistApiController@specials')->name('packing-lists.specials');
    Route::post('packing-lists/update/remarkstwo','PackinglistApiController@remarkstwo')->name('packing-lists.remarkstwo');
    Route::post('packing-lists/update/remarks','PackinglistApiController@remarks')->name('packing-lists.remarks');
    Route::post('packing-lists/update/versions','PackinglistApiController@versions')->name('packing-lists.versions');
    Route::post('packing-lists/update/versions/one','PackinglistApiController@versionsone')->name('packing-lists.versionsone');
    Route::get('packing-lists','PackinglistApiController@index')->name('packing-lists.index');
    Route::post('packing-lists/{packinglist}/update-gw','PackinglistApiController@updategw')->name('packing-lists.updategw');
    Route::post('packing-lists/{packinglist}/update-nw','PackinglistApiController@updatenw')->name('packing-lists.updatenw');
    Route::post('packing-lists/{packinglist}/update-qty','PackinglistApiController@updateqty')->name('packing-lists.updateqty');
    Route::delete('packing-lists/{packinglist}','PackinglistApiController@destroy')->name('packing-lists.destroy');
    Route::post('packing-lists','PackinglistApiController@store')->name('packing-lists.store');

});

