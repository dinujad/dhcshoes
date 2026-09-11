<?php

use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StoreController::class, 'home'])->name('home');
Route::get('/shop', [StoreController::class, 'shop'])->name('shop');
Route::get('/product/{slug}', [StoreController::class, 'product'])->name('product');
Route::get('/about', [StoreController::class, 'about'])->name('about');
Route::post('/bag', [StoreController::class, 'addToBag'])->name('bag.add');
