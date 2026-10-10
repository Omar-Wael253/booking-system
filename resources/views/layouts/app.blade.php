<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Booking System')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<header class="topbar">
    <a class="brand" href="{{ route('centers.index') }}">
        Booking System
    </a>

    <nav>
        <a href="{{ route('centers.index') }}">Centers</a>
        <a href="{{ route('centers.create') }}">Add Center</a>
    </nav>
</header>

<main class="container">
    @yield('content')
</main>
</body>
</html>

