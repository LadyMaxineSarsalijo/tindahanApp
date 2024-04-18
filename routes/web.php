<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreditorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CreditProductController;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [CreditorController::class, 'creditors'])->name('dashboard');
});

Route::post('/add-product', [ProductController::class, 'addProduct'])->name('addProduct');
Route::post('/add-creditor', [CreditorController::class, 'addCreditor'])->name('addCreditor');

Route::get('/credit-products/{id}', [CreditProductController::class, 'creditProduct'])->name('creditProduct');
Route::post('/add-credit-product', [CreditProductController::class, 'addCreditProduct'])->name('addCreditProduct');


