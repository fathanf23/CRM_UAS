<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\KartuController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CoController;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\RegistrasiController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/registrasi', [RegistrasiController::class, 'index'])->name('registrasi');
Route::post('auth/registrasi/store', [RegistrasiController::class, 'store']);


Route::get('/', [BerandaController::class, 'index'])->name('home');
Route::get('/saran', [SaranController::class, 'index']);
Route::get('/vendor/saran', [SaranController::class, 'create']);
Route::post('/vendor/saran/store', [SaranController::class, 'store']);
Route::get('/carts', [ShopController::class, 'cart'])->name('cart')->middleware('auth');
Route::get('add-to-cart/{id}', [ShopController::class, 'addToCart'])->name('add.to.cart');
Route::delete('remove-from-cart', [ShopController::class, 'remove'])->name('remove.from.cart');

Route::get('success', [ShopController::class, 'success']);



    Route::group(['middleware' => ['auth']], function() {

        // dashboard admin
        Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin');
        // Pelanggan Route
        Route::get('/admin/pelanggan/index', [PelangganController::class, 'index']);
        Route::get('/admin/pelanggan/create', [PelangganController::class, 'create']);
        Route::post('/admin/pelanggan/store', [PelangganController::class, 'store']);
        Route::get('/admin/pelanggan/delete/{id}', [PelangganController::class, 'delete']);
        Route::get('/admin/pelanggan/edit/{id}', [PelangganController::class, 'edit']);
        Route::post('/admin/pelanggan/update/{id}', [PelangganController::class, 'update']);
        
        
        // Kartu Route
        Route::get('/admin/kartu/index', [KartuController::class, 'index']);
        Route::get('/admin/kartu/create', [KartuController::class, 'create']);
        Route::post('/admin/kartu/store', [KartuController::class, 'store']);
    Route::get('/admin/kartu/delete/{id}', [KartuController::class, 'destroy']);
    Route::get('/admin/kartu/edit/{id}', [KartuController::class, 'edit']);
    Route::post('/admin/kartu/update/{id}', [KartuController::class, 'update']);

    //Produk Route
    Route::get('/admin/produk/index', [ProdukController::class, 'index']);
    Route::get('/admin/produk/create', [ProdukController::class, 'create']);
    Route::post('/admin/produk/store', [ProdukController::class, 'store']);
    Route::get('/admin/produk/delete/{id}', [ProdukController::class, 'delete']);
    Route::get('/admin/produk/edit/{id}', [ProdukController::class, 'edit']);
    Route::post('/admin/produk/update/{id}', [ProdukController::class, 'update']);
    
    //User Route
    Route::get('/admin/user/index', [UserController::class, 'index']);
    Route::get('/admin/user/create', [UserController::class, 'create']);
    Route::post('/admin/user/store', [UserController::class, 'store']);
    Route::get('/admin/user/delete/{id}', [UserController::class, 'delete']);
    Route::get('/admin/user/edit/{id}', [UserController::class, 'edit']);
    Route::post('/admin/user/update/{id}', [UserController::class, 'update']);
    
    //Transaski Route
    Route::get('/admin/transaksi/index', [TransaksiController::class, 'index']);
    Route::get('/admin/transaksi/create', [TransaksiController::class, 'create']);
    Route::post('/admin/transaksi/store', [TransaksiController::class, 'store']);
    Route::get('/admin/transaksi/delete/{id}', [TransaksiController::class, 'delete']);
    Route::get('/admin/transaksi/edit/{id}', [TransaksiController::class, 'edit']);
    Route::put('/admin/transaksi/update/{id}', [TransaksiController::class, 'update']);
    
    // Detail Transaksi Route
    Route::get('/admin/detail_transaksi/index', [DetailTransaksiController::class, 'index']);
    Route::get('/admin/detail_transaksi/create', [DetailTransaksiController::class, 'create']);
    Route::post('/admin/detail_transaksi/store', [DetailTransaksiController::class, 'store']);
    Route::get('/admin/detail_transaksi/delet/{id}', [DetailTransaksiController::class, 'delete']);
    Route::get('/admin/detail_transaksi/edit/{id}', [DetailTransaksiController::class, 'edit']);
    Route::put('/admin/detail_transaksi/update/{id}', [DetailTransaksiController::class, 'update']);


    
    Route::post('/checkout', [CoController::class, 'checkout'])->name('checkout');

});
    
    
    
    
    
    