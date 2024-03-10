<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BillingDetail;

class BillingDetailController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
        ]);

        $billingDetail = new BillingDetail([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'user_id' => auth()->id(),
        ]);

        $billingDetail->save();

        return redirect()->back()->with('success', 'Billing details submitted successfully');
    }
}
