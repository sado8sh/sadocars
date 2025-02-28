<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SportsController extends Controller
{
    public function index (Request $request) {
        $info = [
            'img' => 'images/sport.jpg',
            'title' => 'Sports',
            'description' => 'Discover a thrilling lineup of sports cars engineered to ignite your passion and deliver unmatched performance on every drive.'
        ];
        $Cars = DB::table('table_cars')->where('category', 'sports')->get();
        return view('category',compact('info', 'Cars'));
    }
}
