<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\DashboardController;
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
Route::get('/', [HomeController::class, 'index'])->middleware('guest');
Route::get('/about', [HomeController::class, 'about'])->middleware('guest');
Route::get('/contact', [HomeController::class, 'contact'])->middleware('guest');


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/registrasi', [RegistrasiController::class, 'index'])->middleware('guest');
Route::post('/registrasi', [RegistrasiController::class, 'store']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/karyawan', [KaryawanController::class, 'karyawan'])->middleware('auth');
Route::get('/karyawan', [KaryawanController::class, 'karyawan'])->name('karyawan')->middleware('auth');
Route::get('/tambahkaryawan', [KaryawanController::class, 'tambah'])->middleware('auth');
Route::post('/tambahdata', [KaryawanController::class, 'tambahdata']);
Route::get('/tampilkaryawan/{id}', [KaryawanController::class, 'tampilkaryawan'])->middleware('auth');
Route::post('/updatekaryawan/{id}', [KaryawanController::class, 'updatekaryawan']);
Route::get('/deletekaryawan/{id}', [KaryawanController::class, 'delete'])->middleware('auth');

Route::get('/barang', [BarangController::class, 'barang'])->middleware('auth');
Route::get('/barang', [BarangController::class, 'barang'])->name('barang')->middleware('auth');
Route::post('/tambahbarang', [BarangController::class, 'tambahbarang']);
Route::get('/tampilbarang/{id}', [BarangController::class, 'tampilbarang'])->middleware('auth');
Route::post('/updatebarang/{id}', [BarangController::class, 'updatebarang']);
Route::get('/deletebarang/{id}', [BarangController::class, 'deletebarang'])->middleware('auth');


Route::post('/tambahcategori', [BarangController::class, 'tambahcategori']);
Route::get('/deletecategori/{id}', [BarangController::class, 'deletecategori'])->middleware('auth');




