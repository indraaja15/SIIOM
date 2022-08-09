<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrmawaController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\daftarController;
use App\Http\Controllers\berandaController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\adminControl;

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



route::get('Barang.detailbarang',[BarangController::class,'detail']);
route::get('Ormawa.ormawaDetail',[ormawaController::class,'detail']);

route::get('/login',[loginController::class,'index'])->name('login')->middleware('guest');
route::post('/login',[loginController::class,'login']);


route::get('/daftar',[daftarController::class,'index'])->middleware('guest');
route::POST('/daftar',[daftarController::class,'store']);


Route::Group(['middleware'=>['auth','akses:admin']],function() {
    Route::resource('ormawa',OrmawaController::class);
    Route::resource('admin',adminControl::class);
    route::GET('lihat/{id}',[OrmawaController::class,'lihat']);

});

Route::Group(['middleware'=>['auth','akses:user']],function() {
    Route::resource('barang',BarangController::class);
    Route::resource('kategori',KategoriController::class);
    Route::resource('peminjaman',PeminjamanController::class);
    route::get('konfirmasi',[PeminjamanController::class,'konfirmasi']);
    route::get('pilihormawa',[PeminjamanController::class,'pilihormawa']);
    route::get('konfirmasi/{id}',[PeminjamanController::class,'ubah']);
    route::POST('serah/{id}',[PeminjamanController::class,'serah']);
    route::POST('kembali/{id}',[PeminjamanController::class,'kembali']);
    route::POST('surat/{id}',[PeminjamanController::class,'surat']);
    route::GET('pilih/{id}',[PeminjamanController::class,'pilih']);
    
    route::GET('ormawaLain',[BarangController::class,'ormawaLain']);
});

Route::Group(['middleware'=>['auth','akses:admin,user']],function() {
    route::post('/logout',[loginController::class,'logout']);
    route::get('/',[berandaController::class,'index']);
    route::GET('cek/{id}',[BarangController::class,'cek']);
});




