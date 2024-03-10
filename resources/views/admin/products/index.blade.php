@extends('layouts.admin')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">All Products</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <a href="{{ route('products.create') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mb-4 inline-block rounded">Add New
            Product</a>

        <table class="w-full border-collapse border border-gray-200">
            <thead>
                <tr>
                    <th class="border border-gray-200 px-4 py-2">#</th>
                    <th class="border border-gray-200 px-4 py-2">Name</th>
                    <th class="border border-gray-200 px-4 py-2">Description</th>
                    <th class="border border-gray-200 px-4 py-2">Price</th>
                    <th class="border border-gray-200 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td class="border border-gray-200 px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border border-gray-200 px-4 py-2">{{ $product->name }}</td>
                        <td class="border border-gray-200 px-4 py-2">{{ $product->description }}</td>
                        <td class="border border-gray-200 px-4 py-2">${{ $product->price }}</td>
                        <td class="border border-gray-200 px-4 py-2">
                            <a href="{{ route('products.edit', $product->id) }}"
                                class="text-blue-600 hover:text-blue-900 mr-2">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="border border-gray-200 px-4 py-2 text-center">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
