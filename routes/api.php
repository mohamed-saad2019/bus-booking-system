<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['api','checkpassword'] ],function(){
    Route::post('/login', 'App\Http\Controllers\AuthController@login');
    Route::get('/getCountries', 'App\Http\Controllers\GovernorateController@getCountries');
});

Route::group(['middleware' => ['api','checkpassword','checkusertoken:api',] ],function(){
    Route::get('getlist' , 'App\Http\Controllers\BookingController@index'); 
    Route::post('ticketbooking' , 'App\Http\Controllers\BookingController@TicketBooking'); 
});


