<?php

use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Routing\Router;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//Auth Login Admin
Route::get('/adminlogin',[LoginController::class,'admin'])->name('admin');

//Auth LOGIN user
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login-proses',[LoginController::class,'login_proses'])->name('login-proses');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

//Auth Register
Route::get('/register',[LoginController::class,'register'])->name('register');
Route::post('/register-proses',[LoginController::class,'register_proses'])->name('register-proses');


    // Rute yang memerlukan middleware
    Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');
    Route::get('/paketgym', [HomeController::class,'paketgym'])->name('paketgym');
    Route::get('/produkgym', [HomeController::class,'produkgym'])->name('produkgym');

// Dashboard ADMIN 
Route::get('/dashboardadmin',[HomeAdminController::class,'dashboardadmin'])->name('dashboardadmin');

//Bagian Halaman Data Paket Admin 
    Route::get('/paket',[HomeAdminController::class,'paket'])->name('paket');
    Route::get('/create',[HomeAdminController::class,'create'])->name('paket.create');
    Route::post('/store',[HomeAdminController::class,'store'])->name('paket.store');

    Route::get('/edit/{id}',[HomeAdminController::class,'edit'])->name('paket.edit');
    Route::put('/update/{id}',[HomeAdminController::class,'update'])->name('paket.update');
    Route::DELETE('/delete/{id}',[HomeAdminController::class, 'paketdelete'])->name('paket.delete');

//Bagian Halaman Data Produk Admin 
    Route::get('/produk',[HomeAdminController::class,'produk'])->name('produk');
    Route::get('/produkcreate',[HomeAdminController::class,'produkc'])->name('produk.create');
    Route::post('/produkstore',[HomeAdminController::class,'produkstore'])->name('produk.store');

    Route::get('/produkedit/{id}',[HomeAdminController::class,'produkedit'])->name('produk.edit');
    Route::put('/produkupdate/{id}',[HomeAdminController::class,'produkupdate'])->name('produk.update');
    Route::DELETE('/produkdelete/{id}',[HomeAdminController::class,'produkdelete'])->name('produk.delete');
    
