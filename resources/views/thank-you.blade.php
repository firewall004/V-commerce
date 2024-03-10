@extends('layouts.user')

@section('content')
    <div class="container mx-auto py-8">
        <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-6">
                <h1 class="text-3xl font-bold mb-4 text-gray-800">Thank You for Your Order!</h1>
                <p class="text-lg text-gray-700 mb-4">Your order has been successfully placed. We appreciate your business.
                </p>
                <p class="text-lg text-gray-700">You can <a href="{{ route('orders.index') }}"
                        class="text-blue-400 underline">click here</a> to view your orders.</p>
            </div>
        </div>
    </div>
@endsection
