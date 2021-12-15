<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers as Controller;
use App\Http\Controllers\Crud;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::name('app.')->group(function () {
    Route::get('/', [Controller\AppController::class, 'inicio'])->name('inicio');
    Route::get('servicios', [Controller\AppController::class, 'servicios'])->name('servicios');
    Route::get('servicio/{slug}', [Controller\AppController::class, 'ver_servicio'])->name('ver-servicio');
    Route::post('servicio/mensaje', [Controller\AppController::class, 'guardarMensaje'])->name('guardar-mensaje');
});

Route::name('auth.')->prefix('/auth')->middleware('guest')->group(function () {
    Route::get('login', [Controller\AuthController::class, 'loginForm'])->name('login.form');
    Route::post('login', [Controller\AuthController::class, 'loginPost'])->name('login.post');

    Route::get('logout', [Controller\AuthController::class, 'logout'])->name('logout')->withoutMiddleware('guest');

    Route::get('register', [Controller\RegisterController::class, 'form'])->name('register.form');
    Route::post('register', [Controller\RegisterController::class, 'post'])->name('register.post');
});

Route::name('dashboard.')->prefix('/dashboard')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('dashboard.servicios.index');
    })->name('inicio');
    Route::resource('servicios', Crud\ServiciosController::class)->names('servicios');
});
