<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }} - Admin Panel</title>
    @vite('resources/css/app.css')

</head>

<body class="bg-gray-100">
    <nav class="bg-gray-800 text-white py-4">
        <div class="container mx-auto px-4">
            <h1 class="text-2xl font-bold">{{ config('app.name', 'Laravel') }} - Admin Panel</h1>
        </div>
    </nav>
    <div class="container mx-auto px-4 py-8">
        @yield('content')
    </div>

    @include('layouts.partials.footer')

</body>

</html>
