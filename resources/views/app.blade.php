<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')

    <title>@yield("title", "ExamenLaravelApi")</title>
</head>
<body>
    <nav class="navbar">
        @auth
            <a href="{{ route('cars.index') }}">Ver coches</a>
            <a href="{{ route('owners.index') }}">Ver dueño</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Registro</a>
        @endauth
    </nav>
    @yield("content")
</body>
<footer>
    @yield("footer")
</footer>
</html>
