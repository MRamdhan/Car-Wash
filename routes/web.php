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
Route::get('/',[AuthController::class, 'login'])->name('login');
Route::post('/postlogin',[AuthController::class, 'postlogin'])->name('postlogin');
Route::middleware(['auth'])->group(function () {
    Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
    Route::get('/homeKasir', [AuthController::class, 'homeKasir'])->name('homeKasir');
    Route::get('/homeAdmin', [AuthController::class, 'homeAdmin'])->name('homeAdmin');
    Route::get('/tambahPaket', [AdminController::class, 'tambahPaket'])->name('tambahPaket');
    Route::post('/postTambahPaket', [AdminController::class, 'postTambahPaket'])->name('postTambahPaket');
    Route::get('/editPaket{paket}', [AdminController::class, 'editPaket'])->name('editPaket');
    Route::post('/postEditPaket{paket}', [AdminController::class, 'postEditPaket'])->name('postEditPaket');
    Route::get('/hapusPaket{paket}', [AdminController::class, 'hapusPaket'])->name('hapusPaket');
    Route::get('/pilih/{paket}',[KasirController::class, 'pilih'])->name('pilih');
    Route::post('/postpilih',[KasirController::class, 'postpilih'])->name('postpilih');
    Route::get('/report',[KasirController::class, 'report'])->name('report');
    Route::get('/searchDate',[KasirController::class, 'searchDate'])->name('searchDate');
    Route::get('/invoice/{carwash}',[KasirController::class, 'printInvoice'])->name('printInvoice');
    Route::get('/exportPdf',[KasirController::class, 'exportPdf'])->name('exportPdf');
    Route::get('/homeOwner',[OwnerController::class, 'report'])->name('homeOwner');
    Route::get('/searchDateOwner',[OwnerController::class, 'searchDate'])->name('searchDate');
    Route::get('/invoiceOwner/{carwash}',[OwnerController::class, 'printInvoice'])->name('printInvoice');
    Route::get('/exportOwnerPdf',[OwnerController::class, 'exportPdf'])->name('exportPdf');
    Route::get('/search', [KasirController::class , 'search'])->name('search');
});