<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TransaksiController;

Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::resource('menu', MenuController::class)
    ->parameters([
        'menu' => 'menu',
    ]);

Route::get('/transaksi', [TransaksiController::class, 'index'])
    ->name('transaksi.index');

Route::get('/transaksi/create', [TransaksiController::class, 'create'])
    ->name('transaksi.create');

Route::post('/transaksi', [TransaksiController::class, 'store'])
    ->name('transaksi.store');

Route::get('/transaksi/{transaksi}', [TransaksiController::class, 'show'])
    ->name('transaksi.show');
