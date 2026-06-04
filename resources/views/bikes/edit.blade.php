<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Editar</title>
    @vite("resources/css/app2.css")
</head>
<body>
    <a href="{{ route('dashboard') }}">Volver</a>
    <br><br>

    <h1>Editar Bike</h1>

    <div id="editData" data-id="{{ $id }}"></div>

    <form id="editForm" class="form" method="POST">
        @csrf
        <input type="text" name="marca" id="marca" placeholder="marca"> marca<br>
        <input type="text" name="modelo" id="modelo" placeholder="modelo"> modelo<br>

        <button type="submit">Aceptar</button>
    </form>
    <br>

    <div id="editMessage" style="color:green"></div>

@vite('resources/js/bikes/edit.js')
</body>
</html>
