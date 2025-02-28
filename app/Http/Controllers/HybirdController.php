<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HybirdController extends Controller
{
    public function index (Request $request) {
        $info = [
            'img' => 'images/hybird.jpg',
            'title' => 'Hybirds',
            'description' => 'Experience an electrifying range of hybrid cars designed to fuel your excitement and provide unparalleled performance with every journey.'
        ];
        $Cars = DB::table('table_cars')->where('category', 'hybird')->get();
        return view('category',compact('info', 'Cars'));
    }
}
