<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\{
  Auth\AuthController,
  Admin\AdminController,
  Order\OrderController
};
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
//================================ Auth ==============================

Route::group(['namespace' => 'Admin'],function (){
//    Route::view('/','Web.index');
    Route::get('login',[AuthController::class,'login'])->name('login');
    Route::post('login',[AuthController::class,'doLogin'])->name('submit.login');
    Route::get('logout',[AuthController::class,'logout'])->name('logout');
});

Route::group(['namespace' => 'Order','middleware'=>'admin','prefix'=>'orders'],function (){
    Route::view('/','Web.index');
//    Route::get('admins',[AdminController::class,'index']);
    Route::get('new',[OrderController::class,'new_orders']);
    Route::get('current',[OrderController::class,'current_orders']);
    Route::get('previous',[OrderController::class,'previous_orders']);
    Route::get('order_accept/{id}',[OrderController::class,'order_accept'])->name('order_accept');
    Route::get('order_refuse/{id}',[OrderController::class,'order_refuse'])->name('order_refuse');
    Route::get('order_end/{id}',[OrderController::class,'order_end'])->name('order_end');
    Route::get('order_details/{id}',[OrderController::class,'order_details'])->name('order_details');
    Route::post('order_delete',[OrderController::class,'order_delete'])->name('order_delete');


});

Route::fallback(function () {
    return view('Web/index');
});
