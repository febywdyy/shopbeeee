<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TigaAdua;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DetailController;



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
    return view('welcome');
});

// Route::get('perkalian', 'App\Http\Controllers\TigaAdua@perkalian');
// Route::post('kali', 'App\Http\Controllers\TigaAdua@perkalian2');

// Route::get('berita/{$idberita}', 'App\Http\Controllers\TigaAduaController@berita');
// Route::get('berita/{$idberita}{$judul}', 'App\Http\Controllers\TigaAduaController@berita');

// Route::get('pendaftaran', 'App\Http\Controllers\TigaAdua@pendaftaran');
// Route::post('pendaftaran', 'App\Http\Controllers\TigaAdua@pendaftaran2');
// Route::post('data', 'App\Http\Controllers\TigaAdua@data');

// Route::get('bladeTest', 'HomeController@index');
// Route::get('bladeTest', 'App\Http\Controllers\TigaAdua@index2');


Route::get('/',function(){
    return view('auth.login');
})->middleware('auth');

Route::get('/welcome',function(){
    return view('welcome');
})->middleware(['auth','verified'])->name('welcome');

Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login-proses', [LoginController::class,'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class,'logout'])->name('logout');

// Route::get('/user', [LoginController::class,'index'])->name('user.index');
// Route::get('/create', [LoginController::class,'create'])->name('user.create');
// Route::post('/store', [LoginController::class,'store'])->name('user.store');

// Route::resource('dosen', 'App\Http\Controllers\DosenController')->middleware('auth');
// Route::resource('mahasiswa', 'App\Http\Controllers\MahasiswaController')->middleware('auth');
// Route::resource('matakuliah', 'App\Http\Controllers\MatakuliahController')->middleware('auth');
Route::resource('barang', 'App\Http\Controllers\BarangController');
// Route::resource('ruang', 'App\Http\Controllers\RuangController')->middleware('auth');
// Route::resource('fak', 'App\Http\Controllers\FakController')->middleware('auth');
// Route::resource('jenjang', 'App\Http\Controllers\JenjangController')->middleware('auth');
// Route::resource('kelas', 'App\Http\Controllers\KelasController')->middleware('auth');
// Route::resource('jadwal', 'App\Http\Controllers\JadwalController')->middleware('auth');
// Route::resource('prodi', 'App\Http\Controllers\ProdiController')->middleware('auth');

Route::get('/', function(){
    return view('feby/template');
});

Route::get('/detail/{id}', [DetailController::class, 'show'])->name('detail.show');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');