<?php

use App\Http\Controllers\controllerMontir;
use App\Http\Controllers\controllerPelanggan;
use App\Http\Controllers\controllerSparepart;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DetailServiceController;
use App\Http\Controllers\controllerProfile;
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

Route::get('/data-user', function () {
    return 'ini adalah data user';
})->middleware('auth', 'role:user|admin');

Route::get('/data-admin', function () {
    return 'ini adalah data admin';
})->middleware('auth', 'role:admin');

Route::middleware('auth')->group(function () {

    Route::get('/adm', function () {
        return view('admin.master');
    });


    //MONTIR
    // Route::get('/admin', [MontirController::class, 'admin.montir.index']);
    // Route::get('/montir', [controllerMontir::class, 'index'])->name('montir.index');
    // route::get('/create', [controllerMontir::class, 'create'])->name('admin.montir.create');
    // route::post('/store', [controllerMontir::class, 'store']);
    // Route::get('/{id}/edit', [controllerMontir::class, 'edit'])->name('admin.montir.edit');
    // Route::put('/{id}', [controllerMontir::class, 'update'])->name('admin.montir.update');
    // Route::get('/{id}/detail', [controllerMontir::class, 'detail'])->name('admin.montir.detail');
    // Route::delete('/{id}/destroy', [controllerMontir::class, 'destroy'])->name('montir.destroy');
    Route::resource('montir', controllerMontir::class);
    Route::get('/montir-pdf', [controllerMontir::class, 'montirPDF']);
    Route::get('/montir-excel', [controllerMontir::class, 'montirExcel']);

    //Motor
    Route::resource('motor', MotorController::class);
    Route::get('/motor-pdf', [MotorController::class, 'motorPDF']);
    Route::get('/motor-excel', [MotorController::class, 'motorExcel']);

    //Pelanggan
    Route::resource('pelanggan', ControllerPelanggan::class);
    //Route::get('/pelanggan', [controllerPelanggan::class, 'pelanggan'])->name('pelanggan.pelanggan');
    Route::get('/pelanggan-pdf', [ControllerPelanggan::class, 'pelangganPDF']);
    Route::get('/pelanggan-excel', [ControllerPelanggan::class, 'pelangganExcel']);

    //PROFILE
    Route::get('/profile', [controllerProfile::class, 'profile'])->name('admin.profile.profile');
    // Route::get('/profile-pdf', [ControllerPelanggan::class, 'profilePDF']);

    //Sparepart
    Route::resource('sparepart', controllerSparepart::class);
    // Route::get('/sparepart', [controllerSparepart::class, 'index'])->name('sparepart.index');
    // route::get('/create', [controllerSparepart::class, 'create'])->name('admin.sparepart.create');
    // route::post('/store', [controllerSparepart::class, 'store'])->name('admin.sparepart.store');
    // Route::get('/{id}/edit', [controllerSparepart::class, 'edit'])->name('admin.sparepart.edit');
    // Route::put('/{id}', [controllerSparepart::class, 'update'])->name('admin.sparepart.update');
    // Route::get('/{id}/detail', [controllerSparepart::class, 'detail'])->name('admin.sparepart.detail');
    // Route::delete('/{id}/destroy', [controllerSparepart::class, 'destroy'])->name('admin.sparepart.destroy');
    Route::get('/sparepart-pdf', [ControllerSparepart::class, 'sparepartPDF']);
    Route::get('/sparepart-excel', [ControllerSparepart::class, 'sparepartExcel']);

    //Supplier
    Route::resource('supplier', SupplierController::class);
    Route::get('/supplier-pdf', [SupplierController::class, 'supplierPDF']);
    Route::get('/supplier-excel', [SupplierController::class, 'supplierExcel']);

    //service
    Route::resource('service', ServiceController::class);
    Route::get('/service-pdf', [ServiceController::class, 'servicePDF']);
    Route::get('/service-excel', [ServiceController::class, 'serviceExcel']);

    //Detail Service
    Route::resource('detailservice', DetailServiceController::class);
    Route::get('/detailservice-pdf', [DetailServiceController::class, 'detailservicePDF']);
    Route::get('/detailservice-excel', [DetailServiceController::class, 'detailserviceExcel']);

});

