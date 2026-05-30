<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Crear Bike</title>
    @vite("resources/css/app.css")
</head>
<body>
    <a href="{{ route("dashboard") }}" class="link_volver">Volver</a>
    <br><br>

    <h1>Crear Bike</h1>

    <form id="createForm" class="form" method="POST">
        @csrf
        <input type="text" name="marca" id="marca" placeholder="marca" required> marca<br>
        <input type="text" name="modelo" id="modelo" placeholder="modelo" required> modelo<br>
        <input type="text" name="cilindrada" id="cilindrada" placeholder="cilindrada" required> cilindrada<br>
        <select name="gasolina" id="gasolina" required>
            <option value="">Gasolina</option>
            <option value="1">SI</option>
            <option value="0">NO</option>
        </select>
        <br><br>
        <button type="submit">Aceptar</button>
    </form>
    <br>

    <div id="createMessage" style="color:green"></div>

@vite('resources/js/bikes/create.js')
</body>
</html>