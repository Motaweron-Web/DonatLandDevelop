<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//================================== auth ============================
Route::group(['namespace' => 'Auth','prefix' => 'auth'],function (){

    Route::post('login','AuthController@login');
    Route::post('logout','AuthController@logout');


});

Route::fallback(function () {
    return helperJson(null,'URL NOT FOUND!',404);
});
