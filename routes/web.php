<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [OrderController::class, 'index'])->name('home');

Route::post('/order', [OrderController::class, 'store'])
    ->middleware('throttle:10,1') // basic spam protection
    ->name('order.store');