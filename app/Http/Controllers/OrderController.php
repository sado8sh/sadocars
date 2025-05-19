<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
        $car = Cars::findOrFail($request->car_id);
        $cards = Auth::user()->cards;
        
        return view('orders.create', compact('car', 'cards'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:table_cars,id',
        ]);

        $car = Cars::findOrFail($validated['car_id']);

        $order = \App\Models\Order::create([
            'user_id' => auth()->id(),
            'car_id' => $car->id,
            'date' => now(),
            'price' => $car->price,
            'status' => 'pending',
        ]);

        return redirect()->route('orders.show', $order);
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

        $order->load(['car', 'user']);
        
        return view('order', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        // *** Modified Authorization Check ***

        // Allow if the user is an admin OR
        // if the user is the order owner AND the status change is pending to confirmed
        $isOrderOwnerAndConfirming = (Auth::id() === $order->user_id && $order->status === 'pending' && $request->input('status') === 'confirmed');

        if (!Auth::user()->isAdmin() && !$isOrderOwnerAndConfirming) {
            abort(403, 'You are not authorized to update this order status.');
        }

        // *** Validation ***
        // Admins can set any valid status from the list
        // Regular users can only set 'confirmed' IF they are the owner AND it was pending
        $allowedStatuses = Auth::user()->isAdmin()
                            ? ['pending', 'confirmed', 'shipped', 'delivered', 'canceled']
                            : ['confirmed']; // Regular users can only attempt to set 'confirmed'

        $validated = $request->validate([
            'status' => 'required|in:' . implode(',', $allowedStatuses),
        ]);

        // *** Deletion Logic ***
        // This logic seems misplaced in the update method.
        // It looks like it was intended for the cancel method or should be removed.
        // If deleting payments when status changes, move this logic.
        /*
        if ($order->payment && $order->payment->status === 'pending') {
            $order->payment->update(['status' => 'failed']); // Or delete the payment?
        }
        */


        // *** Update the Order Status ***
        $order->update($validated);

        // *** Redirect ***
        // Redirect back to the orders index page after updating from the index view
        return redirect()->route('orders.index')
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

        return redirect()->route('orders.index') // Redirect back to index after canceling from index view
            ->with('success', 'Order canceled successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        // *** Authorization Check ***
        // Use Laravel's Gate for authorization (recommended)
        // If you haven't defined an 'delete-order' Gate, you can use a simple check
        // Example using Gate (requires defining 'delete-order' ability in AuthServiceProvider)
        /*
        if (Gate::denies('delete-order', $order)) {
            abort(403, 'You are not authorized to delete this order.');
        }
        */

        // Simple check: Only the order owner or admin can delete
        if (!Auth::user()->isAdmin() && Auth::id() !== $order->user_id) {
             abort(403, 'You are not authorized to delete this order.');
        }

        // *** Deletion Logic ***
        // You might want to add logic here to handle related data
        // For now, we'll just delete the order record itself.
        // If there were associated payments, you might handle them here.

        $order->delete();

        // Redirect back to the orders index page with a success message
        return redirect()->route('orders.index')
            ->with('success', 'Order deleted successfully.');
    }

    /**
     * Display the specified user's details for admin.
     */
    public function showUserDetails(User $user)
    {
        // The User model is already resolved by route model binding.
        // We can ensure userInfo is loaded, though it should be from the dashboard route.
        $user->load('userInfo');

        // Return the new view for user details
        return view('admin.user-details', compact('user'));
    }
}