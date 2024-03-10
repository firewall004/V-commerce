<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProductsPurchased = Order::where('status', Order::STATUS_PURCHASED)->sum('total_amount');
        $totalProductsInCart = collect(User::cartItems())->count();

        return view('users.dashboard', compact('totalProductsPurchased', 'totalProductsInCart'));
    }

    public function adminDashboard()
    {
        $totalProducts = Product::count();
        $totalUsers = User::count();

        return view('admin.dashboard', compact('totalProducts', 'totalUsers'));
    }
}
