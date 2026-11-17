<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

Route::get('/', [PortfolioController::class, 'index'])->name('home');
Route::post('/kirim-pesan', [PortfolioController::class, 'storeMessage'])->name('message.store');