<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Feed</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-base text-body">
    <main class="min-h-screen flex justify-center mx-auto max-w-7xl">
        <x-feed.sidebar />
        @yield('content')
        <x-feed.trending-panel />
    </main>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
