<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrmawaController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\daftarController;

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

Route::get('/', function () {
    return view('index');
});

route::get('/login',[loginController::class,'index'])->name('login')->middleware('guest');
route::post('/login',[loginController::class,'login']);
route::post('/logout',[loginController::class,'logout']);

route::get('/daftar',[daftarController::class,'index'])->middleware('guset');
route::POST('/daftar',[daftarController::class,'store']);

Route::resource('ormawa',OrmawaController::class)->middleware('auth');
Route::resource('barang',BarangController::class)->middleware('auth');
Route::resource('kategori',KategoriController::class)->middleware('auth');




