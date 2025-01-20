<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\TransactionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rute untuk login dan register
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rute yang memerlukan autentikasi
Route::middleware('auth:sanctum')->group(function () {
    // Rute untuk Games (CRUD)
    Route::get('/games', [GameController::class, 'index']); // GET semua game
    Route::post('/games', [GameController::class, 'store']); // POST tambah game
    Route::delete('/games/{id}', [GameController::class, 'destroy']); // DELETE game berdasarkan ID

    // Rute untuk Transaksi
    Route::get('/transactions', [TransactionController::class, 'index']); // GET semua transaksi
    Route::post('/transactions', [TransactionController::class, 'store']); // POST tambah transaksi
});
