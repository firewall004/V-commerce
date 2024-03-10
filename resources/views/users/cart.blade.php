@extends('layouts.user')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Your Cart</h1>

        @include('layouts.partials.flash')

        @if ($cartItems && count($cartItems) > 0)
            <form action="{{ route('cart.clear') }}" method="POST" class="flex justify-end mb-4">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded-md">Clear
                    Cart</button>
            </form>

            <form action="{{ route('cart.update') }}" method="POST">
                @csrf
                <table class="w-full border-collapse border border-gray-200">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Price</th>
                            <th class="px-4 py-2">Quantity</th>
                            <th class="px-4 py-2">Total</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $productId => $item)
                            <tr>
                                <td class="border px-4 py-2">{{ $item['name'] }}</td>
                                <td class="border px-4 py-2">{{ $item['price'] }}</td>
                                <td class="border px-4 py-2">
                                    <input type="number" name="quantity[{{ $productId }}]"
                                        value="{{ $item['quantity'] }}" min="1" class="w-16 text-center">
                                </td>
                                <td class="border px-4 py-2">{{ $item['price'] * $item['quantity'] }}</td>
                                <td class="border px-4 py-2">
                                    <button type="submit" name="action" value="update"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-md">Update</button>

                                    <form action="{{ route('cart.remove') }}" method="POST" class="inline-block">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $productId }}">
                                        <button type="submit" class="text-red-600 hover:text-red-900">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>

            <div class="flex justify-end mt-10">
                <form action="{{ route('order.purchase') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">Proceed to
                        Buy</button>
                </form>
            </div>
        @else
            <p class="text-center text-gray-500">Your cart is empty.</p>
        @endif
    </div>
@endsection
