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

Route::get('/', function () {
    return view('dashboard');
});

Route::middleware(['guest'])->group(function(){

    //Auth Register
    Route::get('/register',[LoginController::class,'register'])->name('register');
    Route::post('/register-proses',[LoginController::class,'register_proses'])->name('register-proses');

    //Auth LOGIN user
    Route::get('/login',[LoginController::class,'index'])->name('login');
    Route::post('/login-proses',[LoginController::class,'login_proses'])->name('login-proses');
    
    
});

Route::middleware(['auth'])->group(function(){
    Route::get('/paketgym', [HomeController::class,'paketgym'])->name('paketgym');
    Route::get('/produkgym', [HomeController::class,'produkgym'])->name('produkgym');
    Route::get('/aboutgym', [HomeController::class, 'aboutgym'])->name('aboutgym');
    
    
    // Dashboard ADMIN 
    Route::get('/dashboardadmin',[HomeAdminController::class,'dashboardadmin'])->name('dashboardadmin')->middleware('userAkses:admin');

    //Bagian Halaman Data Paket Admin 
    Route::get('/paket',[HomeAdminController::class,'paket'])->name('paket')->middleware('userAkses:admin');
    Route::get('/create',[HomeAdminController::class,'create'])->name('paket.create')->middleware('userAkses:admin');
    Route::post('/store',[HomeAdminController::class,'store'])->name('paket.store')->middleware('userAkses:admin');

    Route::get('/edit/{id}',[HomeAdminController::class,'edit'])->name('paket.edit')->middleware('userAkses:admin');
    Route::put('/update/{id}',[HomeAdminController::class,'update'])->name('paket.update')->middleware('userAkses:admin');
    Route::DELETE('/delete/{id}',[HomeAdminController::class, 'paketdelete'])->name('paket.delete')->middleware('userAkses:admin');

    //Bagian Halaman Data Produk Admin 
    Route::get('/produk',[HomeAdminController::class,'produk'])->name('produk')->middleware('userAkses:admin');
    Route::get('/produkcreate',[HomeAdminController::class,'produkc'])->name('produk.create')->middleware('userAkses:admin');
    Route::post('/produkstore',[HomeAdminController::class,'produkstore'])->name('produk.store')->middleware('userAkses:admin');

    Route::get('/produkedit/{id}',[HomeAdminController::class,'produkedit'])->name('produk.edit')->middleware('userAkses:admin');
    Route::put('/produkupdate/{id}',[HomeAdminController::class,'produkupdate'])->name('produk.update')->middleware('userAkses:admin');
    Route::DELETE('/produkdelete/{id}',[HomeAdminController::class,'produkdelete'])->name('produk.delete')->middleware('userAkses:admin');

    Route::get('/logout',[LoginController::class,'logout'])->name('logout');
    

});

Route::get('/home', function(){
    return redirect('/dashboard');
});

Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');
//Auth Login Admin
Route::get('/adminlogin',[LoginController::class,'admin'])->name('admin');



Route::get('/logout',[LoginController::class,'logout'])->name('logout');



    
  

