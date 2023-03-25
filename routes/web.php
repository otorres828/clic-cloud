<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PanelController;

Route::redirect('/', 'login');

Route::get('login', [AuthController::class, 'mostrar_login']);
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('registrarse', [AuthController::class, 'mostrar_register']);
Route::post('register', [AuthController::class, 'register'])->name('register');


Route::get('panel',[PanelController::class,'index'])->name('panel');

