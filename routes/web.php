<?php

use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/fetch-offers', OfferController::class . '@fetchOffers');

Route::get('products/fetch-products-from-api', ProductController::class . '@fetchPrices');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
