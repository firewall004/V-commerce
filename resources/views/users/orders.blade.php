@extends('layouts.user')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Your Orders</h1>

        @if ($orders->isEmpty())
            <p>You have no orders yet.</p>
        @else
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">Order Code</th>
                        <th class="border border-gray-300 px-4 py-2">Total</th>
                        <th class="border border-gray-300 px-4 py-2">Status</th>
                        <th class="border border-gray-300 px-4 py-2">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $order->order_code }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $order->total_amount }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $order->status }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $order->created_at->format('Y-m-d H:i:s') }}
                            </td>
                            <td>
                                <a href="{{ route('order.show', $order) }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
