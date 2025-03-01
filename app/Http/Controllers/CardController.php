<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Card;

class CardController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function editCard()
    {
        $user = Auth::user();
        $card = $user->card;
        return view('card_edit', compact('user', 'card'));
    }

    public function updateCard(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'card_number' => 'required|string|size:16',
            'card_holder' => 'required|string|max:255',
            'expiry_date' => 'required|date',
            'cvv' => 'required|string|size:3',
        ]);

        $user->card()->updateOrCreate(
            ['card_id' => $user->id],
            $validated
        );

        return redirect()->route('profile')->with('success', 'Card updated successfully.');
    }
}