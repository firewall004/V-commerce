@extends('layouts.admin')

@section('content')
    <div class="container mx-auto py-8">
        <div class="grid grid-cols-2 gap-6">
            <a href="{{ route('products.index') }}" class="bg-white rounded-lg shadow-md p-6 block">
                <h2 class="text-lg font-semibold mb-4">Total Products</h2>
                <p class="text-3xl font-bold text-blue-500">{{ $totalProducts }}</p>
                <p class="text-blue-500 hover:underline">View Products</p>
            </a>

            <a href="{{ route('users.index') }}" class="bg-white rounded-lg shadow-md p-6 block">
                <h2 class="text-lg font-semibold mb-4">Total Users</h2>
                <p class="text-3xl font-bold text-blue-500">{{ $totalUsers }}</p>
                <p class="text-blue-500 hover:underline">View Users</p>
            </a>
        </div>
    </div>
@endsection
