<?php

namespace App\Http\Controllers;

use App\Models\Phong;
use Illuminate\Http\Request;

class PhongController extends Controller
{
    public function index() {
        return view("phong.index", ['title' => 'Phong']);
    }

    public function create () {
        $phong = Phong::all();
        return view("phong.list", compact('phong'));
    }

    public function show(string $id) {
        $phong = Phong::where('idphong',$id)->first();
        return response()->json(['data'=> $phong]); // 200 là mã lỗi
    }

    public function updatePhong(Request $request) {
        $idphong = request('idphong');
        $phong = Phong::where('idphong', $idphong)->update([
            'soluongghe' => request('soluongghe'),
            'amthanh' => request('amthanh'),
            'maychieu' => request('maychieu'),
            'tinhtrang' => request('tinhtrang')
        ]);

        return response()->json(
            ['status'=> 'success']);
    }

}
