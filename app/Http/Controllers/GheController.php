<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ghe;
use App\Models\Phong;

class GheController extends Controller
{
    public function index() {
        $phong = Phong::all();
        return view("ghe.index", [
            'phong' => $phong,
            'title' => 'Ghe'
        ]);
    }

    public function getList(Request $request) {
        $text = $request->text;
        $filter = $request->filter;
        $ghe = Ghe::orderBy(''.$text.'', ''.$filter.'')->get();
        return view("ghe.list", compact('ghe'));
    }

    public function create(Request $request) {
        // if ($request->vitri != '') {
             $ghe = Ghe::where('idphong', 'like', '%'.$request->idphong.'%')->where('vitri', 'like', '%'.$request->vitri.'%')->get();
        // }
        // else
        //     $ghe = Ghe::where('idphong', $request->idphong)->get();
        if($ghe->count() >= 1)
            return view("ghe.list", compact('ghe'));
        else return response()->json(['status'=> "Nothing found"]);
    }

    public function show(string $id) {
        $ghe = Ghe::where('idghe',$id)->first();
        return response()->json(['data'=> $ghe]); // 200 là mã lỗi
    }

    public function updateGhe(Request $request) {
        $idghe = request('idghe');
        $ghe = Ghe::where('idghe', $idghe)->update([
            'loaighe' => request('loaighe'),
            'trangthai' => request('trangthai')
        ]);

        return response()->json(
            ['status'=> 'success']);
    }
}
