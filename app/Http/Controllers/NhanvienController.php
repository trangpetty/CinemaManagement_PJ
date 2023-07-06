<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Models\Nhanvien;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

class NhanvienController extends Controller
{
    public function index(Request $request) {
        $role = $request->session()->get('user_id');
        return view('nhanvien.index', ['title' => 'Nhan vien', 'role' => $role]);
    }

    public function getList(Request $request) {
        $text = $request->text;
        $filter = $request->filter;
        $nhanvien = Nhanvien::orderBy(''.$text.'', ''.$filter.'')->get();
        return view("nhanvien.list", compact('nhanvien'));
    }

    public function create(Request $request) {
        $nhanvien = Nhanvien::where('idnv', 'like', '%'.$request->text.'%')
        ->orwhere('ten', 'like', '%'.$request->text.'%')->orderBy('idnv', 'desc')->paginate(5);
        if($nhanvien->count() >= 1)
            return view("nhanvien.list", compact('nhanvien'));
        else return response()->json(['status'=> "Nothing found"]);
    }

    public function store(Request $request) {
        $gioitinh;
        if (request('gioitinh') == 1)
        {
            $gioitinh= 0b1;
        }else $gioitinh = 0b0;

        $validator = Validator::make($request->all(), [
            'idnv' => ['required'],
            'gioitinh' => ['required'],
            'cccd' => ['required'],
            'ngaybdlam' => ['required'],
            'luong' => ['required'],
            'chucvu' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

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
        $idnv = request('idnv');
        $nhanvien = Nhanvien::where('idnv', $idnv)->update([
            'gioitinh' => request('gioitinh_update'),
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

    public function deleteArr(Request $request) {
        $arr = $request->arr;
        for($i = 0; $i < count($arr); $i++){
            $nhanvien = Nhanvien::where('idnv', $arr[$i])->delete();
        }
        return response()->json(['status'=> 'success']); // 200 là mã lỗi
    }
}
