<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//================================== auth ============================
Route::group(['namespace' => 'Auth','prefix' => 'auth'],function (){

    Route::post('login','AuthController@login');
    Route::post('logout','AuthController@logout');
    Route::post('insert_token','AuthController@insert_token');

});
//================================== orders ============================
Route::group(['namespace' => 'Orders','prefix' => 'orders'],function (){

    Route::get('current_orders', 'OrderController@currentOrders');
    Route::post('on_way_order', 'OrderController@on_way_order');
    Route::post('accept_order', 'OrderController@acceptOrder');
    Route::post('end_order', 'OrderController@endOrder');
    Route::post('cancel_order', 'OrderController@cancelOrder');
    Route::get('previous_orders', 'OrderController@previousOrders');
    Route::get('order_details', 'OrderController@orderDetails');

});

Route::fallback(function () {
    return helperJson(null,'URL NOT FOUND!',404);
});
