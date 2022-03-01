<?php
use Illuminate\Support\Facades\Route;

//================================== auth ============================
Route::group(['namespace' => 'Auth','prefix' => 'auth'],function (){
    Route::post('login','AuthController@login');
    Route::post('insert_token','AuthController@insert_token');
    Route::post('logout','AuthController@logout');
});
//================================== order ============================
Route::group(['namespace' => 'Orders','prefix' => 'order','middleware'=>'jwt'],function (){
    Route::get('newOrders','OrderController@newOrders');
    Route::get('currentOrders','OrderController@currentOrders');
    Route::get('endedOrders','OrderController@endedOrders');
    Route::post('acceptOrder','OrderController@acceptOrder');
    Route::post('cancelOrder','OrderController@cancelOrder');
    Route::post('endOrder','OrderController@endOrder');
//    Route::get('branchOrders','OrderController@branchOrders');

});




