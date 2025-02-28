<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        $suv = [
            'img' => 'images/suv.jpg',
            'title' => 'SUV',
            'description' => 'Discover a wide range of SUVs tailored to your lifestyle and adventures.',
            'link' => '/suv'
        ];
        $luxury = [
            'img' => 'images/luxury.jpg',
            'title' => 'Luxury',
            'description' => 'Discover an exquisite collection of luxury cars designed to elevate your journeys and redefine sophistication.',
            'link' => '/luxury'
        ];
        $sport = [
            'img' => 'images/sport.jpg',
            'title' => 'Sports',
            'description' => 'Discover a thrilling lineup of sports cars engineered to ignite your passion and deliver unmatched performance on every drive.',
            'link' => '/sports'
        ];
        $electric = [
            'img' => 'images/electric.jpg',
            'title' => 'Electric',
            'description' => 'Discover an innovative range of electric cars that combine cutting-edge technology, exceptional performance, and eco-friendly driving for a sustainable future.',
            'link' => '/electric'
        ];
        $hybird = [
            'img' => 'images/hybird.jpg',
            'title' => 'Hybirds',
            'description' => 'Experience an electrifying range of hybrid cars designed to fuel your excitement and provide unparalleled performance with every journey.',
            'link' => '/hybird'
        ];
        $convertibles = [
            'img' => 'images/convertibles.jpg',
            'title' => 'Convertibles',
            'description' => 'Discover a stunning selection of convertible cars that blend style and freedom, letting you enjoy every journey with the top down and the wind in your hair.',
            'link' => '/convertibles'
        ];
        return view('home',compact('suv','luxury','sport','electric','hybird','convertibles'));
    }
}
