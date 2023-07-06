<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suatchieu;
use App\Models\Phim;
use App\Models\Phong;
use Session;

class SuatchieuController extends Controller
{
    public function index() {
        $phim = Phim::all();
        $phong = Phong::all();
        $role = Session::get('user_id');
        return view("suatchieu.index", [
            "phim" => $phim,
            "phong" => $phong,
            "title" => 'Suatchieu',
            'role' => $role
        ]);
    }

    public function getList(Request $request) {
        $text = $request->text;
        $filter = $request->filter;
        $suatchieu = Suatchieu::orderBy(''.$text.'', ''.$filter.'')->get();
        return view("suatchieu.list", compact('suatchieu'));
    }

    public function create(Request $request) {
        $suatchieu = Suatchieu::where('idsuatchieu', 'like', '%'.$request->text.'%')
        ->orwhere('idphim', 'like', '%'.$request->text.'%')->orwhere('idphong', 'like', '%'.$request->text.'%')->orderBy('idsuatchieu', 'desc')->get();
        if($suatchieu->count() >= 1)
            return view("suatchieu.list", compact('suatchieu'));
        else return response()->json(['status'=> "Nothing found"]);
    }


    public function store (Request $request) {
        $suatchieu = Suatchieu::create([
            'idsuatchieu' => request('idsuatchieu'),
            'thoigianbd' => request('thoigianbd'),
            'idphim' => request('idphim'),
            'idphong' => request('idphong'),
            'loaichieu' => request('loaichieu')
        ]);

        return response()->json(
            ['status'=> 'success']
        );
    }

    public function show(string $id) {
        $suatchieu = Suatchieu::where('idsuatchieu',$id)->first();
        return response()->json(['data'=> $suatchieu]); // 200 là mã lỗi
    }

    public function updateSuatchieu(Request $request) {
        $idsuatchieu = request('idsuatchieu');
        $suatchieu = Suatchieu::where('idsuatchieu', $idsuatchieu)->update([
            'thoigianbd' => request('thoigianbd'),
            'idphim' => request('idphim'),
            'idphong' => request('idphong'),
            'loaichieu' => request('loaichieu')
        ]);
        return response()->json(['status'=> 'success']);
    }

    public function destroy(string $id) {
        $suatchieu = Suatchieu::where('idsuatchieu', $id)->delete();
        return response()->json(['status'=> 'success']); // 200 là mã lỗi
    }

}
