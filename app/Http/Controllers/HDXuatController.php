<?php

namespace App\Http\Controllers;

use App\Models\HDXuat;
use App\Models\CThdxuat;
use App\Models\Doanuong;
use App\Models\Nhanvien;
use Illuminate\Http\Request;

class HDXuatController extends Controller
{
    public function index() {
        $phanloai = Doanuong::select('phanloai')->groupBy('phanloai')->get();
        $doanuong = Doanuong::where('phanloai', 'doan')->get();
        return view("hdxuat.index", [
            'title' => 'hdxuat',
            'phanloai' => $phanloai,
            'doanuong' => $doanuong
        ]);
    }

    public function getList(Request $request) {
        $text = $request->text;
        $filter = $request->filter;
        $hdxuat = HDXuat::orderBy(''.$text.'', ''.$filter.'')->get();
        return view("hdxuat.list", compact('hdxuat'));
    }

    public function create (Request $request) {
        $hdxuat = HdXuat::where('idhdxuat', 'like', '%'.$request->text.'%')
        ->orwhere('idnv', 'like', '%'.$request->text.'%')->orderBy('idhdxuat', 'desc')->get();
        if($hdxuat->count() >= 1)
            return view("hdxuat.list", compact('hdxuat'));
        else return response()->json(['status'=> "Nothing found"]);
    }

    public function show(string $id) {
        $idhdxuat = $id;
        $title = 'CTHDX';
        $cthdxuat = CTHDXuat::where('idhdxuat', $id)->get();
        return view('hdxuat.detail', compact('cthdxuat', 'idhdxuat', 'title')); // 200 là mã lỗi
    }

    public function destroy(string $id) {
        $hdxuat = HDXuat::where('idhdxuat', $id)->delete();
        return response()->json(['status'=> 'success']); // 200 là mã lỗi
    }
}
