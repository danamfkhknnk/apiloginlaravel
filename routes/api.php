<?php

use App\Http\Controllers\authoController;
use App\Http\Controllers\ProdukController;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/',function(){
    return response()->json([
        'status'=>false,
        'false'=>'akses not defind'
    ],401);
})->name('login');

Route::get('produk',[ProdukController::class, 'index'])->middleware('auth:sanctum', 'ability:produk');
Route::post('produk',[ProdukController::class, 'store'])->middleware('auth:sanctum', 'ability:store');



Route::post('registrasi',[authoController::class, 'registerUser']);
Route::post('login',[authoController::class, 'loginUser']);