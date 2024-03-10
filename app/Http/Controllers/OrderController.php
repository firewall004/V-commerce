<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Throwable;

class OrderController extends Controller
{
    public function index()
    {
        $userOrders = auth()->user()->orders()->latest()->get();

        return view('users.orders', ['orders' => $userOrders]);
    }

    public function purchase()
    {
        try {
            $cartItems = collect(User::cartItems());

            $totalPrice = $cartItems->sum(function ($cartItem) {
                return $cartItem['quantity'] * $cartItem['price'];
            });

            $order = Order::create([
                'user_id' => auth()->id(),
                'total_amount' => $totalPrice,
                'status' => Order::STATUS_PURCHASED,
                'order_code' => Order::generateUniqueCode(),
            ]);

            $order->products()->attach($cartItems->keys());

            session()->put('cart', []);

            return redirect()->route('orders.index')->with('success', 'Order placed successfully');
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            throw $th;
        }
    }
}
