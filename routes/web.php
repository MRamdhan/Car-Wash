<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\OwnerController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('postlogin')->middleware('guest');
Route::middleware(['auth'])->group(function () {
    //Auth
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware(['auth', 'CheckRole:admin'])->group(function () {
        Route::get('/homeAdmin', [AuthController::class, 'homeAdmin'])->name('homeAdmin');
        //Admin
        Route::get('/tambahPaket', [AdminController::class, 'tambahPaket'])->name('tambahPaket');
        Route::post('/postTambahPaket', [AdminController::class, 'postTambahPaket'])->name('postTambahPaket');
        Route::post('/postTambahUser', [AdminController::class, 'postTambahUser'])->name('postTambahUser');
        Route::get('editUser/{user}', [AdminController::class, 'editUser'])->name('editUser');
        Route::post('postEditUser/{user}', [AdminController::class, 'postEditUser'])->name('postEditUser');
        Route::get('/tambahKasir', [AdminController::class, 'tambahKasir'])->name('tambahKasir');
        Route::get('hapusUser/{user}', [AdminController::class, 'hapusUser'])->name('hapusUser');
        Route::get('/editPaket{produk}', [AdminController::class, 'editPaket'])->name('editPaket');
        Route::post('/postEditPaket{produk}', [AdminController::class, 'postEditPaket'])->name('postEditPaket');
        Route::get('/hapusPaket{produk}', [AdminController::class, 'hapusPaket'])->name('hapusPaket');
        Route::get('/searchPaket', [AdminController::class, 'searchPaket'])->name('searchPaket');
        Route::get('/tambahVoucher', [AdminController::class, 'tambahVoucher'])->name('tambahVoucher');
        Route::post('/postTambahVoucher', [AdminController::class, 'postTambahVoucher'])->name('postTambahVoucher');
        Route::get('/editVoucher/{voucher}', [AdminController::class, 'editVoucher'])->name('editVoucher');
        Route::post('/postEditVoucher/{voucher}', [AdminController::class, 'postEditVoucher'])->name('postEditVoucher');
        Route::get('/hapusVoucher/{voucher}', [AdminController::class, 'hapusVoucher'])->name('hapusVoucher');
    });

    Route::middleware(['auth', 'CheckRole:kasir'])->group(function () {
        //Kasir
        Route::get('/homeKasir', [AuthController::class, 'homeKasir'])->name('homeKasir');
        Route::get('/pilih/{produk}', [KasirController::class, 'pilih'])->name('pilih');
        Route::post('/postpilih', [KasirController::class, 'postpilih'])->name('postpilih');
        Route::get('/report', [KasirController::class, 'report'])->name('report');
        Route::get('/searchDate', [KasirController::class, 'searchDate'])->name('searchDate');
        Route::get('/exportPdf', [KasirController::class, 'exportPdf'])->name('exportPdf');
        Route::get('/invoice/{transaksi}', [KasirController::class, 'printInvoice'])->name('printInvoice');
        Route::get('/search', [KasirController::class, 'search'])->name('search');
        Route::get('/log', [KasirController::class, 'log'])->name('log');
        Route::get('/hapusT{transaksi}', [KasirController::class, 'hapusT'])->name('hapusT');
    });

    Route::middleware(['auth', 'CheckRole:owner'])->group(function () {
        //Owner
        Route::get('/searchDateOwner', [OwnerController::class, 'searchDateOwner'])->name('searchDateOwner');
        Route::get('/homeOwner', [OwnerController::class, 'report'])->name('homeOwner');
        Route::get('/invoiceOwner/{transaksi}', [OwnerController::class, 'printInvoiceOwner'])->name('printInvoiceOwner');
        Route::get('/exportOwnerPdf', [OwnerController::class, 'exportOwnerPdf'])->name('exportOwnerPdf');
        Route::get('/logOwner', [OwnerController::class, 'logOwner'])->name('logOwner');
        Route::get('/searchOwner', [OwnerController::class, 'searchOwner'])->name('searchOwner');
    });
});
