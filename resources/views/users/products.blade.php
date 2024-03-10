@extends('layouts.user')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-8">Products</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach ($products as $product)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('storage/images/products/' . $product->image) }}" alt="{{ $product->name }}"
                        class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold">{{ $product->name }}</h2>
                        <p class="text-gray-600">{{ $product->description }}</p>
                        <p class="text-gray-700 font-semibold mt-2">{{ $product->price }}</p>
                        <form id="addToCartForm{{ $product->id }}" action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="button" onclick="addToCart({{ $product->id }})"
                                class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add to
                                Cart</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection



<script>
    function addToCart(productId) {
        var formData = new FormData(document.getElementById("addToCartForm" + productId));
        var xhr = new XMLHttpRequest();

        xhr.open("POST", "{{ route('cart.add') }}", true);
        xhr.setRequestHeader("X-CSRF-Token", "{{ csrf_token() }}");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    alert(response.message);
                } else {
                    console.error(xhr.responseText);
                }
            }
        };

        xhr.send(formData);
    }
</script>
