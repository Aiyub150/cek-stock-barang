<?php

use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;

Route::get('/', function () {
    return view('welcome');
});

#Authentication
Route::get('/login', [AuthenticationController::class, 'LoginForm'])->name('login');
Route::post('/login', [AuthenticationController::class, 'login']);
Route::get('/register', [AuthenticationController::class, 'RegisterForm'])->name('register.form');
Route::post('/register', [AuthenticationController::class, 'register'])->name('register');
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('admin/dashboard');
})->name('dashboard');

#stock
// Route untuk CRUD Stocks
Route::prefix('stocks')->name('stocks.')->group(function () {
    // Menampilkan semua data stocks
    Route::get('/', [StockController::class, 'index'])->name('index');

    // Menampilkan form untuk membuat data stock baru
    Route::get('/create', [StockController::class, 'create'])->name('create');

    // Menyimpan data stock baru
    Route::post('/', [StockController::class, 'store'])->name('store');

    // Menampilkan detail data stock tertentu
    Route::get('/{stock}', [StockController::class, 'show'])->name('show');

    // Menampilkan form untuk mengedit data stock tertentu
    Route::get('/{stock}/edit', [StockController::class, 'edit'])->name('edit');

    // Mengupdate data stock tertentu
    Route::put('/{stock}', [StockController::class, 'update'])->name('update');

    // Menghapus data stock tertentu
    Route::delete('/{stock}', [StockController::class, 'destroy'])->name('destroy');
});
