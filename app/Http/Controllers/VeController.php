<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ve;

class VeController extends Controller
{
    public function index() {
        return view('ve.index', ['title' => 'Ve']);
    }

    public function getList(Request $request) {
        $text = $request->text;
        $filter = $request->filter;
        $ve = Ve::orderBy(''.$text.'', ''.$filter.'')->get();
        return view("ve.list", compact('ve'));
    }

    public function create(Request $request) {
        $ve = Ve::where('idve', 'like', '%'.$request->text.'%')
        ->orwhere('idghe', 'like', '%'.$request->text.'%')->orwhere('idsuatchieu', 'like', '%'.$request->text.'%')->orderBy('idve', 'desc')->get();
        if($ve->count() >= 1)
            return view("ve.list", compact('ve'));
        else return response()->json(['status'=> "Nothing found"]);
    }

    public function destroy(string $id) {
        $ve = Ve::where('idve', $id)->delete();
        return response()->json(['status'=> 'success']); // 200 là mã lỗi
    }
}
