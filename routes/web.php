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
    Route::get('servicios', [Controller\AppController::class, 'servicios'])->name('servicios');
});

Route::name('auth.')->prefix('/auth')->group(function () {
    Route::get('login', [Controller\AuthController::class, 'login'])->name('login');
});

Route::name('crud.')->prefix('/crud')->group(function () {
    //
});
