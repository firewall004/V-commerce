@extends('layouts.admin')

@section('content')
    <div class="container mx-auto py-8">

        @include('layouts.partials.flash')

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">All Products</h1>
            <a href="{{ route('products.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add New Product</a>
        </div>

        <table class="w-full border-collapse border border-gray-200">
            <thead>
                <tr>
                    <th class="border border-gray-200 px-4 py-2">#</th>
                    <th class="border border-gray-200 px-4 py-2">Name</th>
                    <th class="border border-gray-200 px-4 py-2">Description</th>
                    <th class="border border-gray-200 px-4 py-2">Price</th>
                    <th class="border border-gray-200 px-4 py-2">Image</th>

                    <th class="border border-gray-200 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td class="border border-gray-200 px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border border-gray-200 px-4 py-2">{{ $product->name }}</td>
                        <td class="border border-gray-200 px-4 py-2">{{ $product->description }}</td>
                        <td class="border border-gray-200 px-4 py-2">{{ $product->price }}</td>
                        <td class="border border-gray-200 px-4 py-2">
                            <img src="{{ asset('storage/images/products/' . $product->image) }}" alt="{{ $product->name }}"
                                style="max-width: 100px;">
                        </td>
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
