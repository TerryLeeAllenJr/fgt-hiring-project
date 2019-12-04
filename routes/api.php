<?php

use Illuminate\Http\Request;

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




Route::middleware('auth:api')->group(function(){

    // Laravel default route for showing the user data.
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Explicit resource route for categories.
    Route::resource('categories','CategoryController')->except(['edit','create']);

});




