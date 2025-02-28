<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards = Auth::user()->cards;
        return view('cards.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cards.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'card_number' => 'required|string|size:16',
            'card_holder' => 'required|string|max:255',
            'expiry_month' => 'required|string|size:2',
            'expiry_year' => 'required|string|size:2',
            'cvv' => 'required|string|size:3',
        ]);

        // Format expiry date
        $expiryDate = '20' . $validated['expiry_year'] . '-' . $validated['expiry_month'] . '-01';

        // Encrypt sensitive data
        $cardNumber = Crypt::encryptString($validated['card_number']);
        $cvv = Crypt::encryptString($validated['cvv']);

        Card::create([
            'user_id' => Auth::id(),
            'card_number' => $cardNumber,
            'card_holder' => $validated['card_holder'],
            'expiry_date' => $expiryDate,
            'cvv' => $cvv,
        ]);

        return redirect()->route('cards.index')
            ->with('success', 'Card added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card)
    {
        // Check if user is authorized to delete this card
        if (Auth::id() !== $card->user_id) {
            abort(403);
        }

        $card->delete();

        return redirect()->route('cards.index')
            ->with('success', 'Card deleted successfully.');
    }
}