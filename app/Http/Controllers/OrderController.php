<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Throwable;

class OrderController extends Controller
{
    public function index()
    {
        $userOrders = auth()->user()->orders()->latest()->paginate(10);

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
                'status' => Order::STATUS_PENDING,
                'order_code' => Order::generateUniqueCode(),
            ]);

            foreach ($cartItems as $productId => $cartItem) {
                $product = Product::find($productId);
                if ($product) {
                    $order->products()->attach($product, [
                        'quantity' => $cartItem['quantity'],
                        'price' => $cartItem['price'],
                    ]);
                }
            }

            session()->put('order_id', $order->id);

            return redirect()->route('payment.paypal');
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            throw $th;
        }
    }

    public function show(Order $order)
    {
        return view('users.order', ['order' => $order]);
    }
}
