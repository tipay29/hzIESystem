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
    Route::resource('purchase-orders','PurchaseOrderController');





    Route::resource('fabric-colors','FabricColorController');
});


Auth::routes();


//single route

Route::get('/', function () {
    return view('home');
});


Route::get('fabric-codes',function(){
    return view('fabric-code.index');
})->name('fabric-codes.index');
Route::get('fabric-types',function(){
    return view('fabric-type.index');
})->name('fabric-types.index');
Route::get('placements',function(){
    return view('placement.index');
})->name('placements.index');


