<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\BuyController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BuyController::class, 'index']);

// Маршруты для Product (BuyController)
Route::prefix('product')->group(function () {
    Route::get('/create', [BuyController::class, 'create'])->name("product.create");
    Route::get('/', [BuyController::class, 'index'])->name('product.index');
    Route::get('/{product}', [BuyController::class, 'show'])->name('product.show');
    Route::post('/', [BuyController::class, 'store'])->name('product.store');
    Route::get('/{product}/edit', [BuyController::class, 'edit'])->name('product.edit');
    Route::delete('/{product}', [BuyController::class, 'destroy'])->name('product.destroy');
    Route::put('/{product}', [BuyController::class, 'update'])->name('product.update');
});


// Маршруты для комментариев (связанные с продуктами)
Route::post('/products/{product}/comments', [CommentController::class, 'storeComment'])->name('product.comments.store');
Route::get('/products/{product}/comments/{comment}/edit', [CommentController::class, 'edit'])->name('product.comments.edit');
Route::put('/products/{product}/comments/{comment}', [CommentController::class, 'update'])->name('product.comments.update');
Route::delete('/products/{product}/comments/{comment}', [CommentController::class, 'destroy'])->name('product.comments.destroy');
Route::get('/products/{product}/comments', [CommentController::class, 'showComments'])->name('product.comments.index');
