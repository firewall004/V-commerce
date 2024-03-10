@extends('layouts.user')

@section('content')
    <div class="container  py-8">

        @include('layouts.partials.flash')

        <h1 class="text-2xl font-bold mb-4">Billing Details</h1>

        <form action="{{ route('billing.submit') }}" method="POST" class="max-w-md">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                <input type="text" id="name" name="name" class="form-input rounded-md border-gray-300"
                    value="{{ $billingDetail ? $billingDetail->name : '' }}" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                <input type="email" id="email" name="email" class="form-input rounded-md border-gray-300"
                    value="{{ $billingDetail ? $billingDetail->email : '' }}" required>
            </div>
            <div class="mb-4">
                <label for="address" class="block text-gray-700 font-bold mb-2">Address</label>
                <textarea id="address" name="address" class="form-textarea rounded-md border-gray-300" rows="3" required>{{ $billingDetail ? $billingDetail->address : '' }}</textarea>
            </div>

            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
        </form>
    </div>
@endsection
