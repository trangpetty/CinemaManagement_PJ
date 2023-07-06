<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sochamcong;

class SochamcongController extends Controller
{
    public function index() {
        return view("sochamcong.index", ['title' => 'Sochamcong']);
    }

    public function create(Request $request) {
        $sochamcong = Sochamcong::whereMonth('ngaydilam', request('month'))->get();
        return view("sochamcong.list", compact('sochamcong'));
    }
}
