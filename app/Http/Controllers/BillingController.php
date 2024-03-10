<?php

namespace App\Http\Controllers;

use App\Models\BillingDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillingController extends Controller
{
    public function showForm()
    {
        $billingDetail = Auth::user()->billingDetail;

        return view('users.billing-details', ['billingDetail' => $billingDetail]);
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
        ]);

        Auth::user()->billingDetail()->updateOrCreate(
            [],
            [
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
            ]
        );

        return redirect()->back()->with('success', 'Billing details submitted successfully');
    }
}
