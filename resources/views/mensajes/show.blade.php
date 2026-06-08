<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Show Mensaje</title>
    @vite("resources/css/app2.css")
</head>
<body>
    <a href="{{ route("dashboard") }}" class="link_volver">Volver</a>
    <br><br>

    <h1>Show Mensaje</h1>

    <div id="showData" data-id="{{ $id }}"></div>

    <div class="contenido_show" id='contenido_show'>

    </div>


    {{-- <div id="createMessage" style="color:green"></div> --}}

@vite('resources/js/mensajes/show.js')
</body>
</html>