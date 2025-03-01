<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cars;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    public function create()
    {
        return view('cars.create'); // Returns the form view
    }

    public function store(Request $request)
    {

        // Upload files and store paths
        $mainImagePath = $request->file('main_image')->store('uploads/images', 'public');
        $secondImagePath = $request->file('second_image') ? $request->file('second_image')->store('uploads/images', 'public') : null;
        $performanceImagePath = $request->file('performance_image') ? $request->file('performance_image')->store('uploads/images', 'public') : null;
        $interiorImagePath = $request->file('interior_image') ? $request->file('interior_image')->store('uploads/images', 'public') : null;

        // Create a new car record
        Cars::create([
            'brand' => $request->input('brand'),
            'model' => $request->input('model'),
            'category' => $request->input('category'),
            'year' => $request->input('year'),
            '0-100km/h' => $request->input('0-100km/h'),
            '0-160km/h' => $request->input('0-160km/h'),
            '1/4mile' => $request->input('1/4mile'),
            'top_speed' => $request->input('top_speed'),
            'engine' => $request->input('engine'),
            'horsepower' => $request->input('horsepower'),
            'torque' => $request->input('torque'),
            'weight' => $request->input('weight'),
            'seating' => $request->input('seating'),
            'drive' => $request->input('drive'),
            'transmission' => $request->input('transmission'),
            'price' => $request->input('price'),
            'performance' => $request->input('performance'),
            'interior' => $request->input('interior'),
            'main_image' => $mainImagePath,
            'second_image' => $secondImagePath,
            'performance_image' => $performanceImagePath,
            'interior_image' => $interiorImagePath,
            'video' => $request->input('video'),
        ]);

        return redirect('/cars/create')->with('success', 'Car added successfully!');
    }
    public function show($id){
        $car = DB::table('table_cars')->find($id); 
        return view('car-details', compact('car'));
    }
    public function edit($id){
        $car = Cars::find($id); // Find the car to edit
        return view('cars.edit', compact('car')); // Return the edit form view
    }
    public function update(Request $request, $id){
        $car = Cars::find($id); // Find the car to update

        // Handle file uploads if new files are provided
        $mainImagePath = $request->file('main_image') ? $request->file('main_image')->store('uploads/images', 'public') : $car->main_image;
        $secondImagePath = $request->file('second_image') ? $request->file('second_image')->store('uploads/images', 'public') : $car->second_image;
        $performanceImagePath = $request->file('performance_image') ? $request->file('performance_image')->store('uploads/images', 'public') : $car->performance_image;
        $interiorImagePath = $request->file('interior_image') ? $request->file('interior_image')->store('uploads/images', 'public') : $car->interior_image;

        // Update the car record
        $car->update([
            'brand' => $request->input('brand'),
            'model' => $request->input('model'),
            'category' => $request->input('category'),
            'year' => $request->input('year'),
            '0-100km/h' => $request->input('0-100km/h'),
            '0-160km/h' => $request->input('0-160km/h'),
            '1/4mile' => $request->input('1/4mile'),
            'top_speed' => $request->input('top_speed'),
            'engine' => $request->input('engine'),
            'horsepower' => $request->input('horsepower'),
            'torque' => $request->input('torque'),
            'weight' => $request->input('weight'),
            'seating' => $request->input('seating'),
            'drive' => $request->input('drive'),
            'transmission' => $request->input('transmission'),
            'price' => $request->input('price'),
            'performance' => $request->input('performance'),
            'interior' => $request->input('interior'),
            'main_image' => $mainImagePath,
            'second_image' => $secondImagePath,
            'performance_image' => $performanceImagePath,
            'interior_image' => $interiorImagePath,
            'video' => $request->input('video'),
        ]);

        return redirect()->route('car.show', $id)->with('success', 'Car updated successfully!');
    }
    public function destroy($id){
        $car = Cars::find($id); // Find the car to delete

        // Delete associated images from storage
        Storage::disk('public')->delete([
            $car->main_image,
            $car->second_image,
            $car->performance_image,
            $car->interior_image,
        ]);

        $car->delete(); // Delete the car record

        return redirect('/cars')->with('success', 'Car deleted successfully!');
    }
}
