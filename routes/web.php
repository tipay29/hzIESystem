<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'Web'],function(){
    Route::resource('employees','EmployeeController');
    Route::resource('cuts','CutController');
    Route::resource('styles','StyleController');



    Route::get('purchase-orders','PurchaseOrderController@index')->name('purchase-orders.index');
    Route::get('fabric-colors','FabricColorController@index')->name('fabric-colors.index');
    Route::get('fabric-codes','FabricCodeController@index')->name('fabric-codes.index');
    Route::get('fabric-types','FabricTypeController@index')->name('fabric-types.index');
    Route::get('placements','PlacementController@index')->name('placements.index');
});


Auth::routes();


//single route

Route::get('/', function () {
    return view('home');
});


