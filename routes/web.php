<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers as Controller;
use App\Http\Controllers\Crud;

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

Route::name('auth.')->prefix('/auth')->middleware('guest')->group(function () {
    Route::get('login', [Controller\AuthController::class, 'loginForm'])->name('login.form');
    Route::post('login', [Controller\AuthController::class, 'loginPost'])->name('login.post');
    Route::get('logout', [Controller\AuthController::class, 'logout'])->name('logout')->withoutMiddleware('guest');

    Route::get('register', [Controller\RegisterController::class, 'form'])->name('register.form');
    Route::post('register', [Controller\RegisterController::class, 'post'])->name('register.post');
});

Route::name('dashboard.')->prefix('/dashboard')->middleware('auth')->group(function () {
    Route::get('/', [Controller\AppController::class, 'dashboard'])->name('inicio');
    Route::resource('servicios', Crud\ServiciosController::class)->names('servicios');
});
