<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NhanvienController;

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

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/post_login', [LoginController::class, 'postLogin'])->name('post_login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function() {
});
Route::resource('/nhanvien', NhanvienController::class);
Route::post('/update-nhanvien', [NhanvienController::class, 'updateNhanvien'])->name('update.nhanvien');
Route::post('/search-nhanvien', [NhanvienController::class, 'searchNhanvien'])->name('search.nhanvien');
Route::get('/getList', [NhanvienController::class, 'getList'])->name('getList');

