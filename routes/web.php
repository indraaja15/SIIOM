<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrmawaController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\daftarController;
use App\Http\Controllers\berandaController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\detailBarangController;
use App\Http\Controllers\adminControl;
use App\Http\Controllers\profil;

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





Route::Group(['middleware'=>['auth','akses:admin']],function() {
    Route::resource('ormawa',OrmawaController::class);
    Route::resource('admin',adminControl::class);
    route::GET('lihat/{id}',[OrmawaController::class,'lihat']);
    route::get('/daftar',[daftarController::class,'index']);
    route::POST('/daftar',[daftarController::class,'store']);
    route::POST('daftar/{id}',[daftarController::class,'update']);
    route::GET('daftar/{id}/edit',[DaftarController::class,'edit']);


});

Route::Group(['middleware'=>['auth','akses:user']],function() {
    route::GET('kelola/{id}/edit',[DaftarController::class,'editkelola']);
    Route::resource('barang',BarangController::class);
    Route::resource('kategori',KategoriController::class);
    route::POST('daftar/{id}',[daftarController::class,'updatekelola']);
    route::GET('detail/{id}',[detailBarangController::class,'index']);
    route::POST('/detail',[detailBarangController::class,'store']);
    route::GET('detail/{id}/edit',[detailBarangController::class,'edit']);
    // route::get('konfirmasi',[PeminjamanController::class,'konfirmasi']);
    // route::get('pilihormawa',[PeminjamanController::class,'pilihormawa']);
    // route::get('konfirmasi/{id}',[PeminjamanController::class,'ubah']);
    // route::POST('serah/{id}',[PeminjamanController::class,'serah']);
    // route::POST('kembali/{id}',[PeminjamanController::class,'kembali']);
    // route::POST('surat/{id}',[PeminjamanController::class,'surat']);
    // route::GET('pilih/{id}',[PeminjamanController::class,'pilih']);
    // route::GET('tolak/{id}',[PeminjamanController::class,'tolak']);
    route::GET('profil/{id}',[profil::class,'index']);
    // route::POST('noTelp/{id}',[profil::class,'update']);
    // route::GET('ormawaLain',[BarangController::class,'ormawaLain']);
    route::GET('kelola',[daftarController::class,'kelola']);
    route::POST('pw/{id}',[profil::class,'password']);
    route::POST('nonaktif/{id}',[daftarController::class,'nonaktif']);
    route::POST('aktif/{id}',[daftarController::class,'aktif']);
    route::POST('daftar/{id}',[daftarController::class,'updatekelola']);
    route::GET('validasi/{id}',[PeminjamanController::class,'selesai']);
    route::POST('/simpankelola',[daftarController::class,'simpankelola']);
    route::GET('penyerahan/{id}',[PeminjamanController::class,'inputDataBarang']);
    route::POST('/penyerahanBrg',[PeminjamanController::class,'penyerahanBrg']);
    route::GET('detailPenyerahan/{id}',[PeminjamanController::class,'detailPenyerahan']);
    route::GET('validasi',[PeminjamanController::class,'validasi']);
    route::GET('selesai',[PeminjamanController::class,'pengembalian']);
});
Route::Group(['middleware'=>['auth','akses:user,opr']],function() {
    Route::resource('peminjaman',PeminjamanController::class);
    route::get('konfirmasi',[PeminjamanController::class,'konfirmasi']);
    route::get('pilihormawa',[PeminjamanController::class,'pilihormawa']);
    route::get('konfirmasi/{id}',[PeminjamanController::class,'ubah']);
    route::POST('serah/{id}',[PeminjamanController::class,'serah']);
    route::POST('kembali/{id}',[PeminjamanController::class,'kembali']);
    route::POST('surat/{id}',[PeminjamanController::class,'surat']);
    route::GET('pilih/{id}',[PeminjamanController::class,'pilih']);
    route::GET('tolak/{id}',[PeminjamanController::class,'tolak']);
    route::GET('ormawaLain',[BarangController::class,'ormawaLain']);
});

Route::Group(['middleware'=>['auth','akses:admin,user,opr']],function() {
    route::post('/logout',[loginController::class,'logout']);
    route::get('/',[berandaController::class,'index']);
    route::GET('cek/{id}',[BarangController::class,'cek']);
    

});

Route::Group(['middleware'=>['auth','akses:admin,user']],function() {
    
    route::DELETE('daftar/{id}',[daftarController::class,'destroy']);
    
});




