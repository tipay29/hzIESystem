<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

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


