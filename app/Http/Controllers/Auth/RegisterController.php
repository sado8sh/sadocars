<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('signup');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8' ],
        ]);

        $user = new User;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = 'user';
        $user->save();

        Auth::login($user);

        return redirect('/');
    }
}