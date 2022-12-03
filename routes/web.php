<?php

use App\Http\Controllers\controllerMontir;
use App\Http\Controllers\controllerPelanggan;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', function () {
//     return view('guests.index');
// });
Auth::routes();

Route::get('/', function () {
    return view('home');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    
    Route::get('/adm', function () {
        return view('admin.master');
    });
    
    
    // Route::get('/admin', [MontirController::class, 'admin.montir.index']);
    Route::get('/montir', [controllerMontir::class, 'index'])->name('montir.index');
    route::get('/create', [controllerMontir::class, 'create'])->name('admin.montir.create');
    route::post('/store', [controllerMontir::class, 'store']);
    Route::get('/{id}/edit', [controllerMontir::class, 'edit'])->name('admin.montir.edit');
    Route::put('/{id}', [controllerMontir::class, 'update'])->name('admin.montir.update');
    Route::get('/{id}/detail', [controllerMontir::class, 'detail'])->name('admin.montir.detail');
    Route::delete('/{id}/destroy', [controllerMontir::class, 'destroy'])->name('montir.destroy');
    Route::get('/pelanggan', [controllerPelanggan::class, 'pelanggan'])->name('pelanggan.pelanggan');
    Route::get('/montir-pdf', [ControllerMontir::class, 'montirPDF']);
    Route::get('/montir-excel', [ControllerMontir::class, 'montirExcel']);
    Route::get('/pelanggan-pdf', [ControllerPelanggan::class, 'pelangganPDF']);
    Route::get('/pelanggan-excel', [ControllerPelanggan::class, 'pelangganExcel']);
    
    Route::resource('supplier', SupplierController::class);
});