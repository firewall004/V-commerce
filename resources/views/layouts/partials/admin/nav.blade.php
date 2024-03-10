<nav class="bg-gray-800 text-white py-4">
    <div class="container mx-auto px-4 flex justify-between items-center">
        <a href="/admin/" class="text-2xl font-bold">{{ config('app.name', 'Laravel') }} - Admin Panel</a>
        <ul class="flex items-center">
            <li class="ml-4">
                <a href="{{ route('products.index') }}" class="text-white hover:text-gray-300">Products</a>
            </li>
            <li class="ml-4">
                <a href="{{ route('users.index') }}" class="text-white hover:text-gray-300">Users</a>
            </li>
            <li class="ml-8">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="text-white hover:text-gray-300">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>
