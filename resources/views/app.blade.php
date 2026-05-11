<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')

    <title>@yield("title", "ExamenLaravelApi")</title>
</head>
<body>
    <nav class="navbar">
        <a href="{{ route("cars.index") }}">Ver coches</a>
        <a href="{{ route("owners.index") }}">Ver dueño</a>
    </nav>
    @yield("content")
</body>
<footer>
    @yield("footer")
</footer>
</html>
