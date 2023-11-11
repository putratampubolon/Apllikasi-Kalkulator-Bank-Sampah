<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SampahController;

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
//     return view('dashboard');
// });
Route::controller(SampahController::class)->group(function () {
    Route::get('/sampah', 'index');
    Route::get('/tambahsampah', 'tambahsampah');
    Route::post('/aksitambah', 'aksitambah');
    Route::get('/sampah/edit/{id}', 'edit')->name('sampah.edit');
    Route::put('/sampah/update/{id}', 'update')->name('sampah.update');
    Route::delete('/sampah/delete/{id}', 'destroy')->name('sampah.destroy');

    Route::get('/', 'dashboard')->name('dashboard')->middleware('auth');
    Route::get('/batal', 'tambahsampah');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/user', 'index');
    Route::get('/tambahuser', 'tambahuser');
    Route::post('/aksi_tambah', 'aksi_tambah')->name('aksi_tambah');
    Route::get('/edituser/{id}', 'editUser')->name('edituser');
    Route::post('/aksi_edit/{id}', 'aksi_edit')->name('aksi_edit');
    Route::get('/hapususer/{id}', 'hapusUser')->name('hapususer');

    Route::get('/batall', 'tambahuser');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/loginproses', 'loginproses')->name('loginproses');
    Route::get('/logout', 'logout')->name('logout');

    // Register
    Route::get('/register', 'register')->name('register');
    Route::post('/registeruser', 'registeruser')->name('registeruser');
    Route::post('/registeradmin', 'registeradmin')->name('registeradmin');
});