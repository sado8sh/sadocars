<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Auth::user()->isAdmin() 
            ? Order::with(['user', 'car'])->latest()->get()
            : Auth::user()->orders()->with('car')->latest()->get();
            
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $car = Car::findOrFail($request->car_id);
        $cards = Auth::user()->cards;
        
        return view('orders.create', compact('car', 'cards'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'card_id' => 'required|exists:cards,id',
        ]);

        $car = Car::findOrFail($validated['car_id']);
        $card = Card::findOrFail($validated['card_id']);

        // Create order
        $order = Order::create([
            'user_id' => Auth::id(),
            'car_id' => $car->id,
            'date' => now(),
            'price' => $car->price,
            'status' => 'pending',
        ]);

        // Create payment
        Payment::create([
            'order_id' => $order->id,
            'user_id' => Auth::id(),
            'card_id' => $card->id,
            'status' => 'pending',
        ]);

        // Here you would integrate with a payment gateway
        // For demo purposes, we'll just mark the payment as completed
        $order->payment->update(['status' => 'completed']);
        $order->update(['status' => 'confirmed']);

        return redirect()->route('orders.show', $order)
            ->with('success', 'Order placed successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        // Check if user is authorized to view this order
        if (!Auth::user()->isAdmin() && Auth::id() !== $order->user_id) {
            abort(403);
        }

        $order->load(['car', 'payment', 'user']);
        
        return view('orders.show', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        // Only admins can update order status
        if (!Auth::user()->isAdmin()) {
            abort(403);
        }

        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,shipped,delivered,canceled',
        ]);

        $order->update($validated);

        return redirect()->route('orders.show', $order)
            ->with('success', 'Order status updated successfully.');
    }

    /**
     * Cancel the specified order.
     */
    public function cancel(Order $order)
    {
        // Check if user is authorized to cancel this order
        if (!Auth::user()->isAdmin() && Auth::id() !== $order->user_id) {
            abort(403);
        }

        // Only pending or confirmed orders can be canceled
        if (!in_array($order->status, ['pending', 'confirmed'])) {
            return back()->with('error', 'This order cannot be canceled.');
        }

        $order->update(['status' => 'canceled']);
        
        // Update payment status if it's pending
        if ($order->payment && $order->payment->status === 'pending') {
            $order->payment->update(['status' => 'failed']);
        }

        return redirect()->route('orders.show', $order)
            ->with('success', 'Order canceled successfully.');
    }
}