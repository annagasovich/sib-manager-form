<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\ListController;
use Illuminate\Support\Facades\Redirect;
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

Route::get('/', function (){
    return Redirect::route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('application')->group(function () {
    Route::post('/send', [FormController::class, 'post']);
    Route::get('/success', [FormController::class, 'success'])->name('success');
    Route::post('/check', [ListController::class, 'post']);
});
