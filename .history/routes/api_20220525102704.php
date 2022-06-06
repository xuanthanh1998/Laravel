<?php
// routes/api.php
 
use Illuminate\Http\Request;
 
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [App\Http\Controllers\AuthController::class,'login']);
    Route::post('signup', [App\Http\Controllers\AuthController::class,'signup']);
   
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::delete('logout', 'AuthController@logout');
        Route::get('me', 'AuthController@user');
    });
});