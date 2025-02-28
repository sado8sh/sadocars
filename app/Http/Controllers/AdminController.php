<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function dashboard()
    {
        // Check if user is admin
        if (!Auth::user()->isAdmin()) {
            abort(403);
        }

        $totalUsers = User::where('role', 'user')->count();
        $totalCars = Car::count();
        $totalOrders = Order::count();
        $recentOrders = Order::with(['user', 'car'])->latest()->take(5)->get();

        return view('admin.dashboard', compact('totalUsers', 'totalCars', 'totalOrders', 'recentOrders'));
    }

    /**
     * Display a listing of the users.
     */
    public function users()
    {
        // Check if user is admin
        if (!Auth::user()->isAdmin()) {
            abort(403);
        }

        $users = User::with('userInfo')->where('role', 'user')->get();
        return view('admin.users', compact('users'));
    }
}