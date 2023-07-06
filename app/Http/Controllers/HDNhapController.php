<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HDNhap;
use App\Models\CTHDNhap;
use App\Models\Doanuong;
use App\Models\Nhanvien;

class HDNhapController extends Controller
{
    public function index() {
        $phanloai = Doanuong::select('phanloai')->groupBy('phanloai')->get();
        $doanuong = Doanuong::where('phanloai', 'doan')->get();
        return view("hdnhap.index", [
            'title' => 'HDNhap',
            'phanloai' => $phanloai,
            'doanuong' => $doanuong
        ]);
    }

    public function getList(Request $request) {
        $text = $request->text;
        $filter = $request->filter;
        $hdnhap = HDNhap::orderBy(''.$text.'', ''.$filter.'')->get();
        return view("hdnhap.list", compact('hdnhap'));
    }

    public function create (Request $request) {
        $phanloai = Doanuong::select('phanloai')->groupBy('phanloai')->get();
        $nhanvien = Nhanvien::all();
        $title = 'Lap HD';
        return view('hdnhap.add', compact('phanloai', 'title', 'nhanvien'));
    }

    public function search (Request $request) {
        $hdnhap = Hdnhap::where('idhdnhap', 'like', '%'.$request->text.'%')
        ->orwhere('idnv', 'like', '%'.$request->text.'%')->orderBy('idhdnhap', 'desc')->get();
        if($hdnhap->count() >= 1)
            return view("hdnhap.list", compact('hdnhap'));
        else return response()->json(['status'=> "Nothing found"]);
    }

    public function getDetail(Request $request) {
        $doanuong = Doanuong::where('phanloai', request('phanloai'))->get();
        return view('hdnhap.doanuong', compact('doanuong'));
    }

    public function store (Request $request) {
        $hdnhap = HDNhap::create([
            'idnv' => request('idnv'),
            'chuthich' => request('chuthich')
        ]);

        $list = request('cthd');
        $idhdnhap = HDNhap::max('idhdnhap');
        for ($i = 0; $i < count($list); $i++) {
            $cthdnhap = CTHDNhap::create([
                'idhdnhap' => $idhdnhap,
                'iddoanuong' => $list[$i]['iddoanuong'],
                'soluong' => $list[$i]['soluong'],
                'dongia' => $list[$i]['dongia'],
            ]);
            $soluong = Doanuong::select('soluong')->where('iddoanuong', $list[0]['iddoanuong'])->get()[0]['soluong'] + $list[$i]['soluong'];
            Doanuong::where('iddoanuong', $list[0]['iddoanuong'])->update([
                'soluong' => $soluong
            ]);
        }


        return response()->json(
            ['status'=> 'success', 'soluong' => $soluong]
        );
    }

    public function show(string $id) {
        $idhdnhap = $id;
        $cthdnhap = CTHDNhap::where('idhdnhap', $idhdnhap)->get();
        $title = 'hello';
        return view('hdnhap.detail', compact('cthdnhap', 'title', 'idhdnhap')); // 200 là mã lỗi
    }

    public function destroy(string $id) {
        $hdnhap = HDNhap::where('idhdnhap', $id)->delete();
        return response()->json(['status'=> 'success']); // 200 là mã lỗi
    }
}
