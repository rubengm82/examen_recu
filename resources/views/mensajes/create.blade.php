<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Crear proyecto</title>
    @vite("resources/css/app2.css")
</head>
<body>
    <a href="{{ route("dashboard") }}" class="link_volver">Volver</a>
    <br><br>

    <h1>Crear Mensaje</h1>

    <form id="createForm" class="form" method="POST">
        @csrf
        <select name="destinatario_id" id="destinatario_select_id">
            
        </select> destinatario<br>
        {{-- <input type="text" name="destinatario_id" id="destinatario_id" placeholder="destinatario"> destinatario<br> --}}
        <input type="text" name="asunto" id="asunto" placeholder="asunto"> asunto<br>
        <input type="text" name="mensaje" id="mensaje" placeholder="mensaje"> mensaje<br><br>

        <button type="submit">Aceptar</button>
    </form>
    <br>

    <div id="createMessage" style="color:green"></div>

@vite('resources/js/mensajes/create.js')
</body>
</html>