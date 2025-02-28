<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ConvertiblesController extends Controller
{
    public function index (Request $request) {
        $info = [
            'img' => 'images/convertibles.jpg',
            'title' => 'Convertibles',
            'description' => 'Discover a stunning selection of convertible cars that blend style and freedom, letting you enjoy every journey with the top down and the wind in your hair.'
        ];
        $Cars = DB::table('table_cars')->where('category', 'convertibles')->get();
        return view('category',compact('info', 'Cars'));
    }
}
