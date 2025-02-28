<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LuxuryController extends Controller
{
    public function index (Request $request) {
        $info = [
            'img' => 'images/luxury.jpg',
            'title' => 'Luxury',
            'description' => 'Discover a wide range of SUVs tailored to your lifestyle and adventures.'
        ];
        $Cars = DB::table('table_cars')->where('category', 'luxury')->get();
        return view('category',compact('info', 'Cars'));
    }
}
