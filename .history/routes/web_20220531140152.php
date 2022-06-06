<?php

use Illuminate\Support\Facades\Route;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Http\Controllers\GoogleSocialiteController;
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
        Route::get('sua/{id}',[App\Http\Controllers\TheLoaiController::class, 'getSua']);
        Route::post('sua/{id}',[App\Http\Controllers\TheLoaiController::class, 'postSua']);

        Route::get('them',[App\Http\Controllers\TheLoaiController::class, 'getThem']);
        Route::post('them',[App\Http\Controllers\TheLoaiController::class, 'postThem']);

        Route::get('xoa/{id}',[App\Http\Controllers\TheLoaiController::class, 'getXoa']);
    });

    Route::group(['prefix'=>'loaitin'],function(){
        
       
        Route::get('danhsach', [App\Http\Controllers\LoaiTinController::class, 'getDanhSach']);

        Route::get('sua/{id}',[App\Http\Controllers\LoaiTinController::class, 'getSua']);
        Route::post('sua/{id}',[App\Http\Controllers\LoaiTinController::class, 'postSua']);

        Route::get('them',[App\Http\Controllers\LoaiTinController::class, 'getThem']);
        Route::post('them',[App\Http\Controllers\LoaiTinController::class, 'postThem']);

        Route::get('xoa/{id}',[App\Http\Controllers\LoaiTinController::class, 'getXoa']);
    });

    Route::group(['prefix'=>'tintuc'],function(){
       
        Route::get('danhsach', [App\Http\Controllers\TinTucController::class, 'getDanhSach']);
        
        Route::get('sua/{id}',[App\Http\Controllers\TinTucController::class, 'getSua']);
        Route::post('sua/{id}',[App\Http\Controllers\TinTucController::class, 'postSua']);

        Route::get('them',[App\Http\Controllers\TinTucController::class, 'getThem']);
        Route::post('them',[App\Http\Controllers\TinTucController::class, 'postThem']);

        Route::get('xoa/{id}',[App\Http\Controllers\TinTucController::class, 'getXoa']);
    });

    Route::group(['prefix'=>'ajax'],function(){
        Route::get('loaitin/{idTheLoai}',[App\Http\Controllers\AjaxController::class, 'getLoaiTin']);
    });
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('email-test', function(){

    $details['email'] = ' phamxuanthanh9897@gmail.com';

    dispatch(new App\Jobs\SendEmailJob($details));
});



Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::get('login/google', [App\Http\Controllers\GoogleSocialiteController::class, 'redirectToGoogle'])->name('login.google');
Route::get('callback/google', [App\Http\Controllers\GoogleSocialiteController::class, 'handleCallback']);
