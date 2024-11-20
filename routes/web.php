<?php

use App\Models\Supplier;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReturController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\DetailReturController;
use App\Http\Controllers\DetailPembelianController;
use App\Http\Controllers\LaporanPembelianController;
use App\Http\Controllers\LaporanPenjualanController;

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
Route::get('/', [HomeController::class, 'index'])->middleware('guest');
Route::get('/about', [HomeController::class, 'about'])->middleware('guest');
Route::get('/contact', [HomeController::class, 'contact'])->middleware('guest');


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);




Route::get('/registrasi', [RegistrasiController::class, 'index'])->middleware('guest');
Route::post('/registrasi', [RegistrasiController::class, 'store']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth', 'admin');

Route::get('/karyawan', [KaryawanController::class, 'karyawan'])->middleware('auth', 'admin');
Route::get('/karyawan', [KaryawanController::class, 'karyawan'])->name('karyawan')->middleware('auth', 'admin');
Route::get('/tambahkaryawan', [KaryawanController::class, 'tambah'])->middleware(['auth', 'admin']);
Route::post('/tambahdata', [KaryawanController::class, 'tambahdata']);
Route::get('/tampilkaryawan/{id}', [KaryawanController::class, 'tampilkaryawan'])->middleware('auth', 'admin');
Route::post('/updatekaryawan/{id}', [KaryawanController::class, 'updatekaryawan']);
Route::get('/deletekaryawan/{id}', [KaryawanController::class, 'delete'])->middleware('auth', 'admin');

Route::get('/barang', [BarangController::class, 'barang'])->name('barang')->middleware('auth');
Route::post('/tambahbarang', [BarangController::class, 'tambahbarang']);
Route::get('/tampilbarang/{id}', [BarangController::class, 'tampilbarang'])->middleware('auth');
Route::post('/updatebarang/{id}', [BarangController::class, 'updatebarang']);
Route::get('/deletebarang/{id}', [BarangController::class, 'deletebarang'])->middleware('auth', 'admin');


Route::post('/tambahcategori', [BarangController::class, 'tambahcategori']);
Route::get('/deletecategori/{id}', [BarangController::class, 'deletecategori'])->middleware('auth');


Route::get('/supplier', [SupplierController::class, 'supplier'])->name('supplier')->middleware('auth');
Route::post('/tambahsupplier', [SupplierController::class, 'tambahsupplier']);
Route::get('/tampilsupplier/{id}', [SupplierController::class, 'tampilsupplier'])->middleware('auth');
Route::post('/updatesupplier/{id}', [SupplierController::class, 'updatesupplier']);
Route::get('/deletesupplier/{id}', [SupplierController::class, 'deletesupplier'])->middleware('auth');

Route::get('/pembelian', [PembelianController::class, 'pembelian'])->name('pembelian')->middleware('auth');
Route::post('/tambahpembelian', [PembelianController::class, 'tambahpembelian']);
Route::get('/tampilpembelian/{id}', [PembelianController::class, 'tampilpembelian'])->middleware('auth');
Route::post('/updatepembelian/{id}', [PembelianController::class, 'updatepembelian']);
Route::get('/deletepembelian/{id}', [PembelianController::class, 'deletepembelian'])->middleware('auth');


Route::get('/detailpembelian/{id}', [DetailPembelianController::class, 'detailpembelian'])->middleware('auth');
Route::get('/deletedetailpembelian/{id}', [DetailPembelianController::class, 'deletedetailpembelian'])->middleware('auth');
Route::get('/get-harga/{id}', 'App\Http\Controllers\DetailPembelianController@getHarga');
Route::post('/tambahdetailpembelian', [DetailPembelianController::class, 'tambahdetailpembelian']);

Route::get('/retur', [ReturController::class, 'retur'])->name('retur')->middleware('auth');
Route::post('/tambahretur', [ReturController::class, 'tambahretur']);
Route::get('/tampilretur/{id}', [ReturController::class, 'tampilretur'])->middleware('auth');
Route::post('/updateretur/{id}', [ReturController::class, 'updateretur']);
Route::get('/deleteretur/{id}', [ReturController::class, 'deleteretur'])->middleware('auth');

Route::get('/detailretur/{id}', [DetailReturController::class, 'detailretur'])->middleware('auth');
Route::get('/deletedetailretur/{id}', [DetailReturController::class, 'deletedetailretur'])->middleware('auth');
Route::post('/tambahdetailretur', [DetailReturController::class, 'tambahdetailretur']);
// Define route to get jumlah by barang

Route::get('/get-jumlah-by-detailpembelian', 'App\Http\Controllers\ReturController@getJumlahByDetailPembelian');
Route::get('/search-barang', [PenjualanController::class, 'search'])->name('search.barang');

Route::get('/penjualan', [PenjualanController::class, 'penjualan'])->name('penjualan')->middleware('auth');
Route::post('/tambahpenjualan', [PenjualanController::class, 'tambahpenjualan']);

Route::get('/laporanpenjualan', [LaporanPenjualanController::class, 'laporanpenjualan'])->name('laporanpenjualan')->middleware('auth', 'admin');
Route::post('/filterpenjualan', [LaporanPenjualanController::class, 'filterpenjualan'])->name('filterpenjualan');

Route::get('/laporanpembelian', [LaporanPembelianController::class, 'laporanpembelian'])->name('laporanpembelian')->middleware('auth', 'admin');
Route::post('/filterpembelian', [LaporanPembelianController::class, 'filterpembelian'])->name('filterpembelian');

Route::post('/upload-excel', [BarangController::class, 'uploadExcelBarang'])->name('uploadExcelBarang');

Route::post('/upload-excel-pembelian', [DetailPembelianController::class, 'uploadExcelPembelian'])->name('uploadExcelPembelian');





