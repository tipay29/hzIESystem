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


Route::resource('employees','EmployeeApiController');

Route::post('/fabric-colors','FabricColorApiController@store');
Route::delete('/fabric-colors/{color}','FabricColorApiController@destroy');

Route::post('/fabric-codes','FabricCodeApiController@store');
Route::delete('/fabric-codes/{code}','FabricCodeApiController@destroy');
