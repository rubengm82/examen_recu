<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Editar proyecto</title>
    @vite('resources/js/projects/edit.js')
    @vite("resources/css/app.css")
</head>
<body>
    <a href="{{ route('dashboard') }}">Volver</a>
    <br><br>

    <h1>Editar proyecto</h1>

    <div id="editProjectData" data-id="{{ $id }}"></div>

    <form id="editProjectForm" class="form" method="POST">
        @csrf
        <input type="text" name="nombre" id="nombre" placeholder="Nombre"> Nombre<br>
        <input type="text" name="descripcion" id="descripcion" placeholder="Descripción"> Descripción<br>
        <input type="date" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha inicio"> Fecha inicio<br>
        <input type="date" name="fecha_fin" id="fecha_fin" placeholder="Fecha fin"> Fecha fin<br><br>

        <button type="submit">Aceptar</button>
    </form>
    <br>

    <div id="editProjectMessage"></div>


</body>
</html>



