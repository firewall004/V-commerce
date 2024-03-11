<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://webmantratech.com/images/favicon.png">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    <div class="flex flex-col min-h-screen">
        @include('layouts.partials.users.nav')

        <main class="container mx-auto px-4 py-8 flex-grow">
            @yield('content')
        </main>

        @include('layouts.partials.footer')
    </div>

</body>

</html>
