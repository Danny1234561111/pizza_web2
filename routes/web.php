<?php

use App\Http\Controllers\MyController;
use App\Http\Controllers\FormController;
Route::get('/', [MyController::class, 'main']);
#Route::get('/form', [MyController::class, 'formsend']);
Route::get('/about', [MyController::class, 'about']);
Route::post('/submit', [MyController::class, 'handleSubmit']);

Route::get('/form', [FormController::class, 'showForm'])->name('form.show');
Route::post('/form', [FormController::class, 'submitForm'])->name('form.submit');

Route::get('/data', [FormController::class, 'showData'])->name('data.show');


