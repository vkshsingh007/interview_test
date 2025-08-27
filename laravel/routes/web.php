<?php
use App\Http\Controllers\AuthController;

Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth');
Route::get('/logout', [AuthController::class, 'logout']);

Route::resource('tasks', TaskController::class)->middleware('auth');