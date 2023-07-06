<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doanuong;
use Session;

class DoanuongController extends Controller
{
    public function index() {
        $role = Session::get('user_id');
        return view("doanuong.index", ['title' => 'Thuc pham', 'role' => $role]);
    }

    public function getList(Request $request) {
        $text = $request->text;
        $filter = $request->filter;
        $doanuong = Doanuong::orderBy(''.$text.'', ''.$filter.'')->get();
        return view("doanuong.list", compact('doanuong'));
    }

    public function create(Request $request) {
        $doanuong = Doanuong::where('iddoanuong', 'like', '%'.$request->text.'%')
        ->orwhere('ten', 'like', '%'.$request->text.'%')->orderBy('iddoanuong', 'desc')->get();
        if($doanuong->count() >= 1)
            return view("doanuong.list", compact('doanuong'));
        else return response()->json(['status'=> "Nothing found"]);
    }


    public function store (Request $request) {
        $doanuong = Doanuong::create([
            'iddoanuong' => request('iddoanuong'),
            'ten' => request('ten'),
            'hsd' => request('hsd'),
            'gia' => request('gia'),
            'soluong' => request('soluong'),
            'phanloai' => request('phanloai')
        ]);

        return response()->json(['status'=> 'success']);
    }

    public function show(string $id) {
        $doanuong = Doanuong::where('iddoanuong',$id)->first();
        return response()->json(['data'=> $doanuong]); // 200 là mã lỗi
    }

    public function updateDoanuong(Request $request) {
        $iddoanuong = request('iddoanuong');
        $doanuong = Doanuong::where('iddoanuong', $iddoanuong)->update([
            'ten' => request('ten'),
            'hsd' => request('hsd'),
            'phanloai' => request('phanloai'),
            'gia' => request('gia'),
            'soluong' => request('soluong')
        ]);
        return response()->json(['status'=> 'success']);
    }

    public function destroy(string $id) {
        $doanuong = Doanuong::where('iddoanuong', $id)->delete();
        return response()->json(['status'=> 'success']); // 200 là mã lỗi
    }

}
