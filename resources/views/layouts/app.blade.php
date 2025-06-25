<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Club Management System')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Add the CSS styles from the previous template here */
        :root { /* ... */ }
        body { /* ... */ }
        /* ... rest of the styles ... */
    </style>
</head>
<body>
    @if(!request()->routeIs('login') && !request()->routeIs('register'))
        @include('partials.navbar')
    @endif

    <main class="container py-4">
        @yield('content')
    </main>

    @if(!request()->routeIs('login') && !request()->routeIs('register'))
        @include('partials.footer')
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>