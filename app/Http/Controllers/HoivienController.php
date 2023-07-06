<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hoivien;

class HoivienController extends Controller
{
    public function index() {
        return view("hoivien.index", ['title' => 'Hoivien']);
    }

    public function getList(Request $request) {
        $text = $request->text;
        $filter = $request->filter;
        $hoivien = Hoivien::orderBy(''.$text.'', ''.$filter.'')->get();
        return view("hoivien.list", compact('hoivien'));
    }

    public function create(Request $request) {
        $hoivien = Hoivien::where('sothe', 'like', '%'.$request->text.'%')
        ->orwhere('tenhv', 'like', '%'.$request->text.'%')->orwhere('loaihv', 'like', '%'.$request->text.'%')->orderBy('sothe', 'desc')->get();
        if($hoivien->count() >= 1)
            return view("hoivien.list", compact('hoivien'));
        else return response()->json(['status'=> "Nothing found"]);
    }


    public function store (Request $request) {

        $hoivien = Hoivien::create([
            'sothe' => request('sothe'),
            'tenhv' => request('tenhv'),
            'ngaysinh' => request('ngaysinh'),
            'dienthoai' => request('dienthoai'),
            'diachi' => request('diachi'),
            'socccd' => request('socccd'),
            'loaihv' => 'VIP1'
        ]);

        return response()->json(
            ['status'=> 'success']
        );
    }

    public function show(string $id) {
        $hoivien = Hoivien::where('sothe',$id)->first();
        return response()->json(['data'=> $hoivien]); // 200 là mã lỗi
    }

    public function updateHoivien(Request $request) {
        $sothe = request('sothe');
        $hoivien = Hoivien::where('sothe', $sothe)->update([
            'tenhv' => request('tenhv'),
            'ngaysinh' => request('ngaysinh'),
            'diachi' => request('diachi'),
            'dienthoai' => request('dienthoai'),
            'socccd' => request('socccd'),
            'diemtl' => request('diemtl'),
            'loaihv' => request('loaihv')
        ]);
        return response()->json(['status'=> 'success']);
    }

    public function destroy(string $id) {
        $hoivien = Hoivien::where('sothe', $id)->delete();
        return response()->json(['status'=> 'success']); // 200 là mã lỗi
    }

}
