<?php

use App\Http\Controllers\AreaSalesController;
use App\Http\Controllers\KodeTokoController;
use App\Http\Controllers\MasterSalesController;
use App\Http\Controllers\PenjualanController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PenjualanController::class, 'index'])->name('penjualan.index');
Route::get('/penjualan/create', [PenjualanController::class, 'create'])->name('penjualan.create');
Route::get('/penjualan/export-excel', [PenjualanController::class, 'exportExcel'])->name('penjualan.export-excel');
Route::get('/penjualan/export-pdf', [PenjualanController::class, 'exportPdf'])->name('penjualan.export-pdf');
Route::get('/penjualan/{id}', [PenjualanController::class, 'show'])->name('penjualan.show');
Route::post('/penjualan/store', [PenjualanController::class, 'store'])->name('penjualan.store');
Route::get('/penjualan/{id}/edit', [PenjualanController::class, 'edit'])->name('penjualan.edit');
Route::put('/penjualan/{id}/update', [PenjualanController::class, 'update'])->name('penjualan.update');
Route::delete('/penjualan/{id}/destroy', [PenjualanController::class, 'destroy'])->name('penjualan.destroy');
Route::post('/penjualan/import', [PenjualanController::class, 'import'])->name('penjualan.import');

Route::get('/area-sales', [AreaSalesController::class, 'index'])->name('area-sales.index');
Route::get('/area-sales/create', [AreaSalesController::class, 'create'])->name('area-sales.create');
Route::get('/area-sales/export-excel', [AreaSalesController::class, 'exportExcel'])->name('area-sales.export-excel');
Route::get('/area-sales/export-pdf', [AreaSalesController::class, 'exportPdf'])->name('area-sales.export-pdf');
Route::get('/area-sales/{id}', [AreaSalesController::class, 'show'])->name('area-sales.show');
Route::post('/area-sales/store', [AreaSalesController::class, 'store'])->name('area-sales.store');
Route::get('/area-sales/{id}/edit', [AreaSalesController::class, 'edit'])->name('area-sales.edit');
Route::put('/area-sales/{id}/update', [AreaSalesController::class, 'update'])->name('area-sales.update');
Route::delete('/area-sales/{id}/destroy', [AreaSalesController::class, 'destroy'])->name('area-sales.destroy');
Route::post('/area-sales/import', [AreaSalesController::class, 'import'])->name('area-sales.import');

Route::get('/master-sales', [MasterSalesController::class, 'index'])->name('master-sales.index');
Route::get('/master-sales/create', [MasterSalesController::class, 'create'])->name('master-sales.create');
Route::get('/master-sales/export-excel', [MasterSalesController::class, 'exportExcel'])->name('master-sales.export-excel');
Route::get('/master-sales/export-pdf', [MasterSalesController::class, 'exportPdf'])->name('master-sales.export-pdf');
Route::get('/master-sales/{id}', [MasterSalesController::class, 'show'])->name('master-sales.show');
Route::post('/master-sales/store', [MasterSalesController::class, 'store'])->name('master-sales.store');
Route::get('/master-sales/{id}/edit', [MasterSalesController::class, 'edit'])->name('master-sales.edit');
Route::put('/master-sales/{id}/update', [MasterSalesController::class, 'update'])->name('master-sales.update');
Route::delete('/master-sales/{id}/destroy', [MasterSalesController::class, 'destroy'])->name('master-sales.destroy');
Route::post('/master-sales/import', [MasterSalesController::class, 'import'])->name('master-sales.import');

Route::get('/kode-toko', [KodeTokoController::class, 'index'])->name('kode-toko.index');
Route::get('/kode-toko/create', [KodeTokoController::class, 'create'])->name('kode-toko.create');
Route::get('/kode-toko/export-excel', [KodeTokoController::class, 'exportExcel'])->name('kode-toko.export-excel');
Route::get('/kode-toko/export-pdf', [KodeTokoController::class, 'exportPdf'])->name('kode-toko.export-pdf');
Route::get('/kode-toko/{id}', [KodeTokoController::class, 'show'])->name('kode-toko.show');
Route::post('/kode-toko/store', [KodeTokoController::class, 'store'])->name('kode-toko.store');
Route::get('/kode-toko/{id}/edit', [KodeTokoController::class, 'edit'])->name('kode-toko.edit');
Route::put('/kode-toko/{id}/update', [KodeTokoController::class, 'update'])->name('kode-toko.update');
Route::delete('/kode-toko/{id}/destroy', [KodeTokoController::class, 'destroy'])->name('kode-toko.destroy');
Route::post('/kode-toko/import', [KodeTokoController::class, 'import'])->name('kode-toko.import');

