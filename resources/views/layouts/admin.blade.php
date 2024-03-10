<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://webmantratech.com/images/favicon.png">
    <title>{{ config('app.name', 'Laravel') }} - Admin Panel</title>
    @vite('resources/css/app.css')

</head>

<body class="bg-gray-100">
    @include('layouts.partials.admin.nav')

    <div class="container mx-auto px-4 py-8">
        @yield('content')
    </div>

    @include('layouts.partials.footer')

</body>

</html>
