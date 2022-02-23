<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\{
    Auth\AuthController,
    Admin\AdminController,
    Delivery\DeliveryController,
    Clients\ClientController,
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

    Route::get('/',function(){
        return redirect('admin/');
    })->name('/');



Route::fallback(function () {
//    dd('dd');
    return redirect('admin');
//    return substr(url()->current(), -1);
});

//Route::get('aa',function(){
//    return 55;
//});
