<nav class="bg-gray-800 text-white py-4">
    <div class="container mx-auto px-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold">{{ config('app.name', 'Laravel') }}</h1>
        <ul class="flex space-x-4">
            <li><a href="{{ route('products') }}" class="hover:text-gray-300">Products</a></li>
            <li><a href="{{ route('cart') }}" class="hover:text-gray-300">Cart</a></li>
            <li><a href="{{ route('billing.form') }}" class="hover:text-gray-300">Billing Details</a></li>
            <li>
                <a href="{{ route('orders.index') }}">Orders</a>
            </li>

        </ul>
    </div>
</nav>
