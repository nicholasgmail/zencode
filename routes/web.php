<?php

use App\Models\Commentators;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\{CommentatorsController};

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //комментарии
    Route::prefix('comment')->group(function () {
        Route::get('/index', [CommentatorsController::class, 'index'])->name('commentators');
    });
});
