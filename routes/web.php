<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\SuplierController;



Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('register', function () {
    return view('auth.register');
});
Route::post('/signup', [AuthController::class,'register']);
Route::post('/signin', [AuthController::class,'login']);

Route::group(['middleware'=> 'auth'], function () {
    Route::get('/', [BarangController::class, 'index']);
    Route::post('/store-barang', [BarangController::class,'store']);
    Route::patch('/edit_barang/{id}', [BarangController::class,'edit_barang']);
    Route::delete('/delete_barang/{id}', [BarangController::class,'delete_barang']);

    Route::get('transaksi', [TransactionController::class,'index']);
    Route::post('/store-transaksi', [TransactionController::class,'store_transaksi']);
    Route::patch('/edit_transaksi/{id}', [TransactionController::class,'edit_transaksi']);
    Route::delete('/delete_transaksi/{id}', [TransactionController::class,'delete_transaksi']);

    Route::get('suplier',[SuplierController::class,'index']);
    Route::post('/store-suplier', [SuplierController::class,'store_suplier']);
    Route::patch('/edit_suplier/{id}', [SuplierController::class,'edit_suplier']);
    Route::delete('/delete_suplier/{id}', [SuplierController::class,'delete_suplier']);
});

Route::get('/logout',[AuthController::class,'logout']);