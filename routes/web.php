<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NhanvienController;
use App\Http\Controllers\PhimController;
use App\Http\Controllers\PhongController;
use App\Http\Controllers\GheController;
use App\Http\Controllers\SuatchieuController;
use App\Http\Controllers\DoanuongController;
use App\Http\Controllers\HoivienController;
use App\Http\Controllers\HDNhapController;
use App\Http\Controllers\HDXuatController;
use App\Http\Controllers\SochamcongController;
use App\Http\Controllers\VeController;
use App\Http\Controllers\ThongkeController;

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
    // Tai khoan
    Route::post('/post_acc', [LoginController::class, 'store'])->name('post_acc');
    // Nhan vien
    Route::resource('/nhanvien', NhanvienController::class);
    Route::post('/update-nhanvien', [NhanvienController::class, 'updateNhanvien'])->name('update.nhanvien');
    Route::post('/search-nhanvien', [NhanvienController::class, 'searchNhanvien'])->name('search.nhanvien');
    Route::get('/getList', [NhanvienController::class, 'getList'])->name('getList');
    Route::get('/deleteArr', [NhanvienController::class, 'deleteArr'])->name('deleteArr');
    // Phim
    Route::resource('/phim', PhimController::class);
    Route::post('/update-phim', [PhimController::class, 'updatePhim'])->name('update.phim');
    Route::post('/search-phim', [PhimController::class, 'searchPhim'])->name('search.phim');
    Route::get('/getListPhim', [PhimController::class, 'getList'])->name('getList.phim');
    Route::get('/deleteArrPhim', [PhimController::class, 'deleteArr'])->name('deleteArr.phim');
    // Phong
    Route::resource('/phong', PhongController::class);
    Route::post('/update-phong', [PhongController::class, 'updatePhong'])->name('update.phong');
    // Ghe
    Route::resource('/ghe', GheController::class);
    Route::post('/update-ghe', [GheController::class, 'updateGhe'])->name('update.ghe');
    Route::get('/getListGhe', [GheController::class, 'getList'])->name('getList.ghe');
    Route::post('/search-ghe', [GheController::class, 'searchGhe'])->name('search.ghe');
    // Suat chieu
    Route::resource('/suatchieu', SuatchieuController::class);
    Route::get('/getListSuatchieu', [SuatchieuController::class, 'getList'])->name('getList.suatchieu');
    Route::post('/update-suatchieu', [SuatchieuController::class, 'updateSuatchieu'])->name('update.suatchieu');
    // Do an uong
    Route::resource('/doanuong', DoanuongController::class);
    Route::get('/getListdoanuong', [DoanuongController::class, 'getList'])->name('getList.doanuong');
    Route::post('/update-doanuong', [DoanuongController::class, 'updateDoanuong'])->name('update.doanuong');
    // Hoi vien
    Route::resource('/hoivien', HoivienController::class);
    Route::get('/getListHoivien', [HoivienController::class, 'getList'])->name('getList.hoivien');
    Route::post('/update-hoivien', [HoivienController::class, 'updateHoivien'])->name('update.hoivien');
    // HDNhap
    Route::resource('/hdnhap', HDNhapController::class);
    Route::get('/getListHdnhap', [HDNhapController::class, 'getList'])->name('getList.hdnhap');
    Route::get('/getDetail', [HDNhapController::class, 'getDetail'])->name('getDetail.hdnhap');
    Route::get('/search', [HDNhapController::class, 'search'])->name('search.hdnhap');
    // HDXuat
    Route::resource('/hdxuat', HDXuatController::class);
    Route::get('/getListHdxuat', [HDXuatController::class, 'getList'])->name('getList.hdxuat');
    // So cham cong
    Route::resource('/sochamcong', SochamcongController::class);
    // Ve
    Route::resource('/ve', VeController::class);
    Route::get('/getListve', [VeController::class, 'getList'])->name('getList.ve');
    // Thong ke
    Route::get('/thongke', [ThongkeController::class, 'index'])->name('thongke');
    Route::get('/doanhthu', [ThongkeController::class, 'doanhthu'])->name('doanhthu');
    Route::get('/topTP', [ThongkeController::class, 'topTP'])->name('topTP');
    Route::get('/doanhso', [ThongkeController::class, 'doanhso'])->name('doanhso');
    Route::get('/luong', [ThongkeController::class, 'luong'])->name('luong');
    Route::get('/luongSub', [ThongkeController::class, 'luongSub'])->name('luongSub');
});

