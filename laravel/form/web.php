<?php
use App\Http\Controllers\FormController;

Route::get('/form', [FormController::class, 'index']);
Route::post('/form-submit', [FormController::class, 'submit']);
