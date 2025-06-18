<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\TransactionController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/**
 * Rute untuk Manajemen Produk (Menu Makanan)
 * Melayani semua kebutuhan untuk halaman "Food".
 * GET /api/products -> Mengambil semua produk
 * POST /api/products -> Menyimpan produk baru
 * GET /api/products/{id} -> Mengambil detail satu produk
 * PUT/PATCH /api/products/{id} -> Memperbarui produk
 * DELETE /api/products/{id} -> Menghapus produk
 */
Route::apiResource('products', ProductController::class);


/**
 * Rute untuk menyimpan Transaksi baru
 * Dipanggil ketika kasir menyelesaikan pembayaran pada pop-up "Charge".
 */
Route::post('transactions', [TransactionController::class, 'store']);
