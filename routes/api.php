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
    Route::resource('styles', 'StyleApiController');

    Route::resource('production-events', 'ProductionEventApiController');


    Route::post('cuts/utilizations', 'CutApiController@util')->name('cuts.util');
    Route::post('cuts/total-utilizations', 'CutApiController@totalutil')->name('cuts.totalutil');
    Route::resource('cuts', 'CutApiController');

    Route::group(['namespace' => 'SheetDB'],function(){
        Route::post('cut-sheetdbs', 'CutSheetDBApiController@store')->name('cut-sheetdbs.store');
    });

});
