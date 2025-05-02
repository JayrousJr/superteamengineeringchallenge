<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrintingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // application routes
    Route::resource('products', ProductController::class);
    Route::resource('sales', SaleController::class);
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::get('/stock/export/pdf', [PrintingController::class, 'stock'])->name('stock.export.pdf');
    Route::get('/sale/{sale}/pdf', [PrintingController::class, 'sale'])->name('sale.export.pdf');
    Route::get('/sale/export/csv', [PrintingController::class, 'exportCSV'])->name('sale.export.csv');
});

require __DIR__ . '/auth.php';