@extends('layouts.user')

@section('content')
    <div class="container mx-auto py-8">
        <div class="grid grid-cols-2 gap-6">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-lg font-semibold mb-4">Total Products Purchased</h2>
                <p class="text-3xl font-bold text-blue-500">{{ $totalProductsPurchased }}</p>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-lg font-semibold mb-4">Total Products in Cart</h2>
                <p class="text-3xl font-bold text-blue-500">{{ $totalProductsInCart }}</p>
            </div>
        </div>
    </div>
@endsection
