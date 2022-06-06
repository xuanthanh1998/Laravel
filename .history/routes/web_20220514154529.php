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

Route::get('/', function () {
    return view('welcome');
});




Route::group(['prefix'=>'admin'],function(){
    Route::group(['prefix'=>'theloai'],function(){

        Route::get('danhsach', [App\Http\Controllers\TheLoaiController::class, 'getDanhSach']);
        Route::get('sua',[App\Http\Controllers\TheLoaiController::class, 'getSua']);
        Route::get('them',[App\Http\Controllers\TheLoaiController::class, 'getThem']);
        Route::post('them', [App\Http\Controllers\TheLoaiController::class])
    });

    Route::group(['prefix'=>'loaitin'],function(){
        
        Route::get('danhsach','LoaiTinController@getDanhSach');
        Route::get('sua','LoaiTinController@getSua');
        Route::get('them','LoaiTinController@getThem');
    });

    Route::group(['prefix'=>'tintuc'],function(){
        
        Route::get('danhsach','TinTucController@getDanhSach');
        Route::get('sua','TinTucController@getSua');
        Route::get('them','TinTucController@getThem');
    });
});