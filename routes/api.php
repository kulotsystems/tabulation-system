<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SignInController;

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

Route::group(['prefix' => 'auth'], function() {
    Route::group(['prefix' => 'sign-in'], function() {
        Route::post('/'   , [SignInController::class, 'sign_in']);
        Route::get('/user', [SignInController::class, 'get_user']);
    });

    Route::group(['prefix' => 'sign-out'], function() {
        Route::delete('/', [SignInController::class, 'sign_out']);
    });
});
