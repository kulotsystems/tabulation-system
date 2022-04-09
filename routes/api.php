<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\JudgeController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\PortionController;
use App\Http\Controllers\CriterionController;
use App\Http\Controllers\RatingController;

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


//Route::middleware(['auth:sanctum'])->group(function() {

    Route::group(['prefix' => 'event'], function() {
        Route::get   ('/'    , [EventController::class, 'index']);
        Route::post  ('/'    , [EventController::class, 'store']);
        Route::get   ('/{id}', [EventController::class, 'show'])->where('id', '[0-9]+');
        Route::put   ('/{id}', [EventController::class, 'update'])->where('id', '[0-9]+');
        Route::delete('/{id}', [EventController::class, 'destroy'])->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'judge'], function() {
        Route::get   ('/'    , [JudgeController::class, 'index']);
        Route::post  ('/'    , [JudgeController::class, 'store']);
        Route::get   ('/{id}', [JudgeController::class, 'show'])->where('id', '[0-9]+');
        Route::put   ('/{id}', [JudgeController::class, 'update'])->where('id', '[0-9]+');
        Route::delete('/{id}', [JudgeController::class, 'destroy'])->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'candidate'], function() {
        Route::get   ('/'    , [CandidateController::class, 'index']);
        Route::post  ('/'    , [CandidateController::class, 'store']);
        Route::get   ('/{id}', [CandidateController::class, 'show'])->where('id', '[0-9]+');
        Route::put   ('/{id}', [CandidateController::class, 'update'])->where('id', '[0-9]+');
        Route::delete('/{id}', [CandidateController::class, 'destroy'])->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'portion'], function() {
        Route::get   ('/'    , [PortionController::class, 'index']);
        Route::post  ('/'    , [PortionController::class, 'store']);
        Route::get   ('/{id}', [PortionController::class, 'show'])->where('id', '[0-9]+');
        Route::put   ('/{id}', [PortionController::class, 'update'])->where('id', '[0-9]+');
        Route::delete('/{id}', [PortionController::class, 'destroy'])->where('id', '[0-9]+');
    });

//});

