<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

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

    Route::post('packing-lists/update/status','PackinglistApiController@status')->name('packing-lists.status');
    Route::post('packing-lists/update/prepacks','PackinglistApiController@prepacks')->name('packing-lists.prepacks');
    Route::post('packing-lists/update/destinations','PackinglistApiController@destinations')->name('packing-lists.destinations');
    Route::post('packing-lists/update/specials','PackinglistApiController@specials')->name('packing-lists.specials');
    Route::post('packing-lists/update/remarks','PackinglistApiController@remarks')->name('packing-lists.remarks');
    Route::get('packing-lists','PackinglistApiController@index')->name('packing-lists.index');
    Route::post('packing-lists/{packinglist}/update-gw','PackinglistApiController@updategw')->name('packing-lists.updategw');
    Route::post('packing-lists/{packinglist}/update-nw','PackinglistApiController@updatenw')->name('packing-lists.updatenw');
    Route::post('packing-lists/{packinglist}/update-qty','PackinglistApiController@updateqty')->name('packing-lists.updateqty');
    Route::delete('packing-lists/{packinglist}','PackinglistApiController@destroy')->name('packing-lists.destroy');
    Route::post('packing-lists','PackinglistApiController@store')->name('packing-lists.store');

});
