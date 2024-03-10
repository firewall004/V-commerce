@extends('layouts.user')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Order Details</h1>

        <div class="mb-4">
            <span class="font-semibold">Total Amount:</span> {{ $order->total_amount }}
        </div>

        <div class="mb-4">
            <span class="font-semibold">Purchased Date:</span> {{ $order->created_at->format('d/m/Y') }}
        </div>

        <div class="mb-4">
            <span class="font-semibold">Status:</span> {{ $order->status }}
        </div>

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Product</th>
                    <th class="border border-gray-300 px-4 py-2">Quantity</th>
                    <th class="border border-gray-300 px-4 py-2">Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->products as $product)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $product->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $product->pivot->quantity }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $product->pivot->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
