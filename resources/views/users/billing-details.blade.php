@extends('layouts.user')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Billing Details</h1>

        <form action="{{ route('billing.submit') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                <input type="text" id="name" name="name" class="form-input"
                    value="{{ $billingDetail ? $billingDetail->name : '' }}" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                <input type="email" id="email" name="email" class="form-input"
                    value="{{ $billingDetail ? $billingDetail->email : '' }}" required>
            </div>
            <div class="mb-4">
                <label for="address" class="block text-gray-700 font-bold mb-2">Address</label>
                <textarea id="address" name="address" class="form-textarea" rows="3" required>{{ $billingDetail ? $billingDetail->address : '' }}</textarea>
            </div>

            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
        </form>
    </div>
@endsection
