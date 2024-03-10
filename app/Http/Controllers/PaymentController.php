<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    public function paypal()
    {
        $orderId = session()->get('order_id');
        $order = Order::findOrFail($orderId);

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $orderData = [
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('payment.success'),
                "cancel_url" => route('payment.cancel')
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $order->total_amount,
                    ]
                ]
            ]
        ];

        $response = $provider->createOrder($orderData);

        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect()->route('cancel');
        }
    }

    public function success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $orderId = session()->get('order_id');
            Order::where('id', $orderId)->update(['status' => Order::STATUS_PURCHASED]);
            session()->put('cart', []);

            return view('thank-you');
        } else {
            $orderId = session()->get('order_id');
            Order::where('id', $orderId)->update(['status' => Order::STATUS_CANCELLED]);

            return redirect()->route('cancel');
        }
    }

    public function cancel()
    {
        $orderId = session()->get('order_id');
        Order::where('id', $orderId)->update(['status' => Order::STATUS_CANCELLED]);
        return view('payment-failed');
    }
}
