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
    return redirect('app');
});

Route::get('app/{params?}', function () {
    return view('index');
})->where('params', '[\/\w\.-]*');

// Static assets workaround on Vite
// https://github.com/innocenzi/laravel-vite/issues/31#issuecomment-874577953
Route::fallback(function ($path) {
    if(app()->environment('local') && (str_starts_with($path, 'resources') || str_starts_with($path, 'node_modules'))) {
        try {
            Http::get(env('VITE_URL'));
            return redirect( env('VITE_URL') . '/' . $path);
        }
        catch (ConnectionException $exception) {
            abort(404);
        }
    }
    else
        abort(404);
});
