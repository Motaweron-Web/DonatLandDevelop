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

//================================== auth ============================
Route::group(['namespace' => 'Auth','prefix' => 'auth'],function (){

    Route::post('login','AuthController@login');
    Route::post('logout','AuthController@logout');
    Route::POST('register','AuthController@register');
    Route::get('getProfile','AuthController@getProfile');
    Route::POST('update_profile','AuthController@update_profile');
    Route::POST('inser_token','AuthController@insert_token');



});


Route::group(['namespace' => 'Home','prefix' => 'home'],function (){
    Route::get('products','HomeController@products');
    Route::get('one_product','HomeController@one_product');
    Route::get('offers','HomeController@offers');
    Route::get('categories','HomeController@categories');
    Route::get('branches','HomeController@branches');
    Route::get('slider','HomeController@slider');
    Route::get('second_slider','HomeController@second_slider');
    Route::post('add-deleteFavorite','HomeController@addDeleteFavorite');
});


Route::group(['namespace' => 'Orders','prefix' => 'order','middleware'=>'jwt'],function (){
    Route::get('newOrders','OrderController@newOrders');
    Route::get('oldOrders','OrderController@oldOrders');
    Route::get('one_order','OrderController@one_order');
    Route::post('storeOrder','OrderController@storeOrder')->name('storeOrder');
});


Route::group(['namespace' => 'Profile','prefix' => 'profile','middleware'=>'jwt'],function (){
    Route::get('getProfile','ProfileController@getProfile');
    Route::get('favoriteProducts','ProfileController@favoriteProducts');

});

//================== terms and about and taxes  ===============
Route::group(['namespace' => 'Setting','prefix' => 'terms'],function (){
    Route::get('terms','TermsController@terms')->name('terms');
    Route::get('terms_view/{id}',function($id){
        return view('WebView/terms',compact('id'));
    })->name('terms_view');
    Route::get('about','TermsController@about')->name('about');
    Route::get('about_view/{id}',function($id){
        return view('WebView/terms',compact('id'));
    })->name('about_view');
    Route::get('taxes','TermsController@taxes')->name('taxes');
});
//================== contact  ===============
Route::group(['namespace' => 'Contact','prefix' => 'contact'],function (){
    Route::post('contact','ContactController@index')->name('contact');
});
//================== notifications  ===============
Route::group(['namespace' => 'Notification','prefix' => 'notification'],function (){
    Route::get('notification','NotificationController@index')->name('notification');
    Route::get('driver_notification','NotificationController@driver_notification')->name('driver_notification');
});



Route::fallback(function () {
    return helperJson(null,'URL NOT FOUND!',404);
});

