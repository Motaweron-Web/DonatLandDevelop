<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\{
    Auth\AuthController,
    Admin\AdminController,
    Delivery\DeliveryController,
    Clients\ClientController,
    Slider\SliderController,
    OfferSlider\OfferSliderController,
    Contact\ContactController,
    Setting\SettingController,
    Branch\BranchController,
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
Route::get('/clear-cache', function() {
     Artisan::call('optimize:clear');
     Artisan::call('route:clear');
     Artisan::call('config:clear');
     Artisan::call('view:clear');
     Artisan::call('cache:clear');
     return 'cashe cleared';
});

//================================ Auth ==============================

Route::group(['namespace' => 'Admin'],function (){
    Route::get('login',[AuthController::class,'login'])->name('login');
    Route::post('login',[AuthController::class,'doLogin'])->name('submit.login');
});
Route::group(['middleware'=>'admin'],function (){
    Route::get('admin','HomeController@index');
    Route::get('/','HomeController@index')->name('/');
});
Route::group(['namespace' => 'Admin','middleware'=>'admin'],function (){
    Route::view('profile','Web.Users.Profile.index')->name('profile');
    Route::post('update_profile',[AuthController::class,'update_profile'])->name('update_profile');
    Route::get('logout',[AuthController::class,'logout'])->name('logout');
});
//============================== After Auth =========================
//============================== Admins =========================
Route::group(['namespace' => 'Admin','middleware'=>'admin','prefix'=>'admins'],function (){
    Route::get('all',[AdminController::class,'index'])->name('admins.all');
    Route::post('new',[AdminController::class,'new_admin'])->name('admins.new');
    Route::get('edit/{id}',[AdminController::class,'edit_admin']);
    Route::post('update',[AdminController::class,'admin_update']);
    Route::post('admin_delete',[AdminController::class,'admin_delete'])->name('admin_delete');
});
//============================== Slider =========================
Route::group(['namespace' => 'Slider','middleware'=>'admin','prefix'=>'slider'],function (){
    Route::get('all',[SliderController::class,'index'])->name('slider.all');
    Route::post('new',[SliderController::class,'new_slider'])->name('slider.new');
    Route::get('edit/{id}',[SliderController::class,'edit_slider']);
    Route::post('update',[SliderController::class,'slider_update']);
    Route::post('slider_delete',[SliderController::class,'slider_delete'])->name('slider_delete');
});
//============================== offerSlider =========================
Route::group(['namespace' => 'OfferSlider','middleware'=>'admin','prefix'=>'offerSlider'],function (){
    Route::get('all',[OfferSliderController::class,'index'])->name('offerSlider.all');
    Route::post('new',[OfferSliderController::class,'new_offerSlider'])->name('offerSlider.new');
    Route::get('edit/{id}',[OfferSliderController::class,'edit_offerSlider']);
    Route::post('update',[OfferSliderController::class,'offerSlider_update']);
    Route::post('offerSlider_delete',[OfferSliderController::class,'offerSlider_delete'])->name('offerSlider_delete');
});
//============================== contact =========================
Route::group(['namespace' => 'Contact','middleware'=>'admin','prefix'=>'contact'],function (){
    Route::get('all',[ContactController::class,'index'])->name('contact.all');
    Route::post('contact_delete',[ContactController::class,'contact_delete'])->name('contact_delete');
});
//=======
//============================== branch =========================
Route::group(['namespace' => 'Branch','middleware'=>'admin','prefix'=>'branch'],function (){
    Route::get('all',[BranchController::class,'index'])->name('branch.all');
    Route::post('change_name2',[BranchController::class,'change_name2'])->name('change_name2');
    Route::post('branch_control',[BranchController::class,'branch_control'])->name('branch_control');

});
//============================== setting =========================
Route::group(['namespace' => 'Setting','middleware'=>'admin','prefix'=>'setting'],function (){
    Route::get('all',[SettingController::class,'index'])->name('setting.all');
    Route::post('update_setting',[SettingController::class,'update_setting'])->name('update_setting');
});
//============================== Order =========================

Route::group(['namespace' => 'Order','middleware'=>'admin','prefix'=>'orders'],function (){
    Route::view('/','Web.index');
//    Route::get('admins',[AdminController::class,'index']);
    Route::get('new',[OrderController::class,'new_orders'])->name('orders.new');
    Route::get('current',[OrderController::class,'current_orders'])->name('orders.current');
    Route::get('previous',[OrderController::class,'previous_orders'])->name('orders.previous');
    Route::get('order_accept/{id}',[OrderController::class,'order_accept'])->name('order_accept');
    Route::get('order_refuse/{id}',[OrderController::class,'order_refuse'])->name('order_refuse');
    Route::get('order_end/{id}',[OrderController::class,'order_end'])->name('order_end');
    Route::get('order_details/{id}',[OrderController::class,'order_details'])->name('order_details');
    Route::post('order_delete',[OrderController::class,'order_delete'])->name('order_delete');

});

Route::group(['namespace' => 'Delivery','middleware'=>'admin','prefix'=>'drivers'],function (){
    Route::get('all',[DeliveryController::class,'index'])->name('drivers.all');
    Route::post('new',[DeliveryController::class,'add_driver']);
    Route::get('edit/{id}',[DeliveryController::class,'edit_driver']);
    Route::post('update',[DeliveryController::class,'driver_update']);
    Route::post('driver_delete',[DeliveryController::class,'driver_delete'])->name('driver_delete');
});

Route::group(['namespace' => 'Client','middleware'=>'admin','prefix'=>'clients'],function (){
    Route::get('all',[ClientController::class,'index'])->name('clients.all');
    Route::post('client_delete',[ClientController::class,'client_delete'])->name('client_delete');
});

Route::fallback(function () {
//    dd('dd');
    return redirect('admin');
//    return substr(url()->current(), -1);
});

//Route::get('aa',function(){
//    return 55;
//});
