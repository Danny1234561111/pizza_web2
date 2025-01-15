<?php

use App\Http\Controllers\MyController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\BuyController; // Подключаем BuyController

Route::get('/', [MyController::class, 'main']);
Route::get('/about', [MyController::class, 'about']);
Route::post('/submit', [MyController::class, 'handleSubmit']);

Route::get('/form', [FormController::class, 'showForm'])->name('form.show');
Route::post('/form', [FormController::class, 'submitForm'])->name('form.submit');
Route::get('/data', [FormController::class, 'showData'])->name('data.show');

Route::get('/product/create', [BuyController::class, 'create'])->name("product.create");
Route::prefix('product')->group(function() {
    Route::get('', [BuyController::class, 'index'])->name('product.index');
    Route::get('{product}', [BuyController::class, 'show'])->name('product.show');
    Route::post('', [BuyController::class, 'store'])->name('product.store'); // Исправлено
    Route::get('{product}/edit', [BuyController::class, 'edit'])->name('product.edit');
    Route::delete('{product}', [BuyController::class, 'destroy'])->name('product.destroy');
});
