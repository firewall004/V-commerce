<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        // dd($request->all());
        $productId = $request->input('product_id');
        $product = Product::findOrFail($productId);

        $cart = session()->get('cart');

        if (!$cart) {
            $cart = [
                $productId => [
                    'name' => $product->name,
                    'quantity' => 1,
                    'price' => $product->price
                ]
            ];
            session()->put('cart', $cart);
            return response()->json(['success' => true, 'message' => "Product added to cart successfully"]);
        }

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price
            ];
        }

        session()->put('cart', $cart);
        return response()->json(['success' => true, 'message' => "Product added to cart successfully"]);
    }

    public function show()
    {
        $cartItems = User::cartItems();
        return view('users.cart', compact('cartItems'));
    }

    public function update(Request $request)
    {
        $cart = session()->get('cart', []);

        foreach ($request->input('quantity', []) as $productId => $quantity) {
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] = $quantity;
            }
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Cart updated successfully');
    }

    public function remove(Request $request)
    {
        $productId = $request->input('product_id');
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed from cart');
    }
}
