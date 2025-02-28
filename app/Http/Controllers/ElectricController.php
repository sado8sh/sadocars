<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ElectricController extends Controller
{
    public function index (Request $request) {
        $info = [
            'img' => 'images/electric.jpg',
            'title' => 'Electric',
            'description' => 'Discover an innovative range of electric cars that combine cutting-edge technology, exceptional performance, and eco-friendly driving for a sustainable future.'
        ];
        $Cars = DB::table('table_cars')->where('category', 'electric')->get();
        return view('category',compact('info', 'Cars'));
    }
}
