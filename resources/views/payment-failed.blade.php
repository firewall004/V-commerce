@extends('layouts.user')

@section('content')
    <div class="flex items-center justify-center h-screen bg-gray-100">
        <div class="max-w-md mx-auto bg-white rounded-md shadow-md overflow-hidden">
            <div class="px-6 py-8">
                <h1 class="text-3xl font-semibold text-center text-red-600 mb-4">Payment Failed</h1>
                <p class="text-lg text-center text-gray-600 mb-6">Unfortunately, your payment could not be processed at this
                    time. Please try again later or contact support for assistance.</p>
                <div class="flex justify-center">
                    <a href="/"
                        class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-3 rounded-md transition duration-300">Go
                        to Homepage</a>
                </div>
            </div>
        </div>
    </div>
@endsection
