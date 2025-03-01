<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserInfo;

class ProfileController extends Controller
{
    public function showProfile()
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $userInfo = $user->userInfo; // Get user info if exists

        return view('profile', compact('user', 'userInfo'));
    }

    public function storeProfile(Request $request)
    {
        // Ensure user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // Validate the form data
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'zip' => 'nullable|string|max:20',
        ]);

        // Check if user info already exists
        if (!$user->userInfo) {
            $userInfo = new UserInfo($validated);
            $userInfo->user_id = $user->id;
            $userInfo->save();
        } else {
            $user->userInfo->update($validated);
        }

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
    public function editProfile()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $userInfo = $user->userInfo;

        return view('profile_edit', compact('user', 'userInfo'));
    }
    public function updateProfile(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    
        $user = Auth::user();
    
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
        'state' => 'required|string|max:100',
        'zip' => 'required|string|max:20',
    ]);

    // If userInfo doesn't exist, create it
    $user->userInfo()->updateOrCreate(
        ['user_id' => $user->id],  // Condition to check existing record
        $validated  // Data to update or insert
    );

    return redirect()->route('profile')->with('success', 'Profile updated successfully.');
}

}
