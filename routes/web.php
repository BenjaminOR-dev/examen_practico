<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers as Controller;

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

Route::name('app.')->group(function () {
    Route::get('/', [Controller\AppController::class, 'inicio'])->name('inicio');
});
