<?php

namespace App\Http\Controllers;

use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserInfoController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show()
    {
        $userInfo = Auth::user()->userInfo;
        return view('profile.show', compact('userInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $userInfo = Auth::user()->userInfo;
        return view('profile.edit', compact('userInfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'zip' => 'nullable|string|max:20',
        ]);

        $user = Auth::user();
        
        if ($user->userInfo) {
            $user->userInfo->update($validated);
        } else {
            UserInfo::create([
                'user_id' => $user->id,
                ...$validated
            ]);
        }

        return redirect()->route('profile.show')
            ->with('success', 'Profile information updated successfully.');
    }
}