<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SuvController extends Controller
{
    public function index (Request $request) {
        $info = [
            'img' => 'images/suv.jpg',
            'title' => 'SUV',
            'description' => 'Discover a thrilling lineup of sports cars engineered to ignite your passion and deliver unmatched performance on every drive.'
        ];
        $Cars = DB::table('table_cars')->where('category', 'SUV')->get();
        return view('category',compact('info', 'Cars'));
    }
}
