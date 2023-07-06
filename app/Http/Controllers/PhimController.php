<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Phim;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Session;
use Illuminate\Support\Facades\Validator;

class PhimController extends Controller
{
    public function index() {
        return view('phim.index', ['title' => 'Phim']);
    }

    public function getList(Request $request) {
        $text = $request->text;
        $filter = $request->filter;
        $phim = Phim::orderBy(''.$text.'', ''.$filter.'')->get();
        return view("phim.list", compact('phim'));
    }

    public function create(Request $request) {
        $phim = Phim::where('idphim', 'like', '%'.$request->text.'%')
        ->orwhere('ten', 'like', '%'.$request->text.'%')->orderBy('idphim', 'desc')->paginate(5);
        if($phim->count() >= 1)
            return view("phim.list", compact('phim'));
        else return response()->json(['status'=> "Nothing found"]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'idphim' => ['required'],
            'sovekhadung' => ['required', 'min:0']
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $phim = Phim::create([
            'idphim' => request('idphim'),
            'ten' => request('ten'),
            'thoiluong' => request('thoiluong'),
            'theloai' => request('theloai'),
            'daodien' => request('daodien'),
            'dienvienchinh' => request('dienvienchinh'),
            'sovekhadung' => request('sovekhadung')
        ]);
        // $phim = phim::create($request->all());
        return response()->json(
            ['status'=> 'success',
             'data' => $phim
            ]
        );
    }

    public function show(string $id) {
        $phim = Phim::where('idphim',$id)->first();
        return response()->json(['data'=> $phim]); // 200 là mã lỗi
    }

    public function updatephim(Request $request) {
        $gioitinh;
        $idphim = request('idphim');

        $phim = phim::where('idphim', $idphim)->update([
            'ten' => request('ten'),
            'thoiluong' => request('thoiluong'),
            'theloai' => request('theloai'),
            'daodien' => request('daodien'),
            'dienvienchinh' => request('dienvien'),
            'sovekhadung' => request('sove')
        ]);
        return response()->json(
            ['status'=> 'success']);
    }

    public function destroy(string $id) {
        $phim = Phim::where('idphim', $id)->delete();
        return response()->json(['status'=> 'success']); // 200 là mã lỗi
    }

    public function deleteArr(Request $request) {
        $arr = $request->arr;
        for($i = 0; $i < count($arr); $i++){
            $phim = Phim::where('idphim', $arr[$i])->delete();
        }
        return response()->json(['status'=> 'success']); // 200 là mã lỗi
    }
}
