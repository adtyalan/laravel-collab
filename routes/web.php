<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LlamaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [WelcomeController::class, 'index']);
Route::get('/products', [ProductController::class, 'index']);

Route::get('/products{id}', [ProductController::class, 'show']);

Route::get('products/create', [ProductController::class, 'create']);
Route::post('products', [ProductController::class, 'store']);

Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');

Route::put('/products/{id}/edit', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

// Llama Chatbot
Route::get('/chatbot', function(){
    return view('chatbot');
});
Route::post('/ask-llama', [LlamaController::class, 'ask']);

Route::get('/react', function(){
    return view('react');
});