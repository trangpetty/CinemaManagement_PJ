<?php

namespace App\Http\Controllers;

use App\Models\Sochamcong;
use App\Models\CTHDNhap;
use App\Models\CTHDXuat;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ThongkeController extends Controller
{
    public function index () {
        $title = 'Doanh thu';
        return view('thongke.index', compact('title'));
    }

    public function doanhthu(Request $request) {
        $filter = request('filter');
        if ($filter == 'day') {
            $cthd = CTHDNhap::join('hdnhap', 'cthdnhap.idhdnhap', '=', 'hdnhap.idhdnhap')
                    ->join('doanuong', 'cthdnhap.iddoanuong', '=', 'doanuong.iddoanuong')
                    ->select(
                        'cthdnhap.iddoanuong',
                        'doanuong.ten',
                        DB::raw('SUM(cthdnhap.soluong) as soluong'),
                        'doanuong.gia',
                        DB::raw('SUM(cthdnhap.dongia) as dongia'),
                    )
                    ->where('hdnhap.ngaylaphd', date('Y-m-d'))
                    ->groupBy('cthdnhap.iddoanuong', 'doanuong.ten', 'doanuong.gia')
                    ->get();
        } else {
            $cthd = CTHDNhap::join('hdnhap', 'cthdnhap.idhdnhap', '=', 'hdnhap.idhdnhap')
                    ->join('doanuong', 'cthdnhap.iddoanuong', '=', 'doanuong.iddoanuong')
                    ->select(
                        'cthdnhap.iddoanuong',
                        'doanuong.ten',
                        DB::raw('SUM(cthdnhap.soluong) as soluong'),
                        'doanuong.gia',
                        DB::raw('SUM(cthdnhap.dongia) as dongia'),
                    )
                    ->whereMonth('hdnhap.ngaylaphd', date('m'))
                    ->groupBy('cthdnhap.iddoanuong', 'doanuong.ten', 'doanuong.gia')
                    ->get();
        }
        return view('thongke.doanhthu', compact('cthd'));
    }

    public function topTP (Request $request) {
        $filter = request('filter');
        if ($filter == 'day') {
            $toptp = CTHDNhap::join('hdnhap', 'cthdnhap.idhdnhap', '=', 'hdnhap.idhdnhap')
                    ->join('doanuong', 'cthdnhap.iddoanuong', '=', 'doanuong.iddoanuong')
                    ->select(
                        'cthdnhap.iddoanuong',
                        'doanuong.ten',
                        DB::raw('SUM(cthdnhap.soluong) as soluong'),
                        'doanuong.gia',
                        DB::raw('SUM(cthdnhap.dongia) as dongia'),
                    )
                    ->where('hdnhap.ngaylaphd', date('Y-m-d'))
                    ->groupBy('cthdnhap.iddoanuong', 'doanuong.ten', 'doanuong.gia')
                    ->orderBy('soluong', 'DESC')
                    ->take(3)
                    ->get();
        }else {
            $toptp = CTHDNhap::join('hdnhap', 'cthdnhap.idhdnhap', '=', 'hdnhap.idhdnhap')
                    ->join('doanuong', 'cthdnhap.iddoanuong', '=', 'doanuong.iddoanuong')
                    ->select(
                        'cthdnhap.iddoanuong',
                        'doanuong.ten',
                        DB::raw('SUM(cthdnhap.soluong) as soluong'),
                        'doanuong.gia',
                        DB::raw('SUM(cthdnhap.dongia) as dongia'),
                    )
                    ->whereMonth('hdnhap.ngaylaphd', date('m'))
                    ->groupBy('cthdnhap.iddoanuong', 'doanuong.ten', 'doanuong.gia')
                    ->orderBy('soluong', 'DESC')
                    ->take(3)
                    ->get();
        }
        return view('thongke.topTP', compact('toptp'));
    }

    public function doanhso () {
        $doanhso = array();
        for ($i = 1; $i <= 12; $i++) {
            $ds = CTHDNhap::join('hdnhap', 'cthdnhap.idhdnhap', '=', 'hdnhap.idhdnhap')
                    ->select(DB::raw('SUM(cthdnhap.dongia) as dongia'))
                    ->whereMonth('hdnhap.ngaylaphd', $i)
                    ->whereYear('hdnhap.ngaylaphd', date('Y'))
                    ->get()[0]['dongia'];
            if ($ds == null)   $doanhso[$i] = 0;
            else $doanhso[$i] = $ds;
        }
        return response()->json(['data' => $doanhso]);
    }

    public function luong () {
        $title = 'Luong';
        return view('thongke.luong',compact('title'));
    }

    public function luongSub (Request $request) {
        $luong = Sochamcong::join('nhanvien', 'sochamcong.idnv', '=', 'nhanvien.idnv')
                ->select(
                    'sochamcong.idnv',
                    'nhanvien.ten',
                    DB::raw('COUNT(sochamcong.idnv) as socong'),
                    'nhanvien.luong',
                    DB::raw('COUNT(sochamcong.idnv) * nhanvien.luong as luongket'),
                )
                ->whereMonth('sochamcong.ngaydilam', request('month'))
                ->groupBy('sochamcong.idnv', 'nhanvien.ten', 'nhanvien.luong')
                ->get();
        return view('thongke.luongSub', compact('luong'));
    }
}
