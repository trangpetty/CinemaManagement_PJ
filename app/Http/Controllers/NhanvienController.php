<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nhanvien;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class NhanvienController extends Controller
{
    public function index() {
        // $nhanvien = Nhanvien::paginate(3);
        // return view("nhanvien.index", compact('nhanvien'));
        return view('nhanvien.index');
    }

    public function getList() {
        $nhanvien = Nhanvien::all();
        return view("nhanvien.list", compact('nhanvien'));
    }

    public function create(Request $request) {
        $nhanvien = Nhanvien::where('idnv', 'like', '%'.$request->text.'%')
        ->orwhere('ten', 'like', '%'.$request->text.'%')->orderBy('idnv', 'desc')->paginate(5);
        if($nhanvien->count() >= 1)
            return response()->json(['data'=> $nhanvien]);
        else return response()->json(['status'=> "Nothing found"]);
    }

    public function store(Request $request) {
        $gioitinh;
        if (request('gioitinh') == 1)
        {
            $gioitinh= 0b1;
        }else $gioitinh = 0b0;
        $nhanvien = Nhanvien::create([
            'idnv' => request('idnv'),
            'gioitinh' => $gioitinh,
            'ten' => request('ten'),
            'cccd' => request('cccd'),
            'ngaybdlam' => request('ngaybdlam'),
            'luong' => request('luong'),
            'thuong' => request('thuong'),
            'chucvu' => request('chucvu')
        ]);
        // $nhanvien = Nhanvien::create($request->all());
        return response()->json(
            ['status'=> 'success',
             'data' => $nhanvien
            ]
        );
    }

    public function show(string $id) {
        $nhanvien = Nhanvien::where('idnv',$id)->first();
        return response()->json(['data'=> $nhanvien]); // 200 là mã lỗi
    }

    public function updateNhanvien(Request $request) {
        $gioitinh;
        $idnv = request('idnv');
        if (request('gioitinh_update') == 1)
        {
            $gioitinh= 0b1;
        }else $gioitinh = 0b0;
        $nhanvien = Nhanvien::where('idnv', $idnv)->update([
            'gioitinh' => $gioitinh,
            'ten' => request('ten_update'),
            'cccd' => request('cccd_update'),
            'ngaybdlam' => request('ngaybdlam_update'),
            'luong' => request('luong_update'),
            'thuong' => request('thuong_update'),
            'chucvu' => request('chucvu_update')
        ]);
        //$nhanvien = Nhanvien::create($request->all());
        return response()->json(
            ['status'=> 'success',
             'data' => $nhanvien
            ]);
        //return "hello";
    }

    public function destroy(string $id) {
        $nhanvien = Nhanvien::where('idnv', $id)->delete();
        return response()->json(['status'=> 'success']); // 200 là mã lỗi
    }
}
