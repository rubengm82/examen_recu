<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Crear proyecto</title>
    @vite('resources/js/projects/edit.js')
    @vite("resources/css/app.css")
</head>
<body>

<div id="editProjectData" data-id="{{ $id }}"></div>

<form id="editProjectForm" class="form" method="POST">
    @csrf
    <input type="text" name="nombre" id="nombre" placeholder="Nombre">
    <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion">
    <input type="date" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha inicio">
    <input type="date" name="fecha_fin" id="fecha_fin" placeholder="Fecha fin">

    <button type="submit">Editar proyecto</button>
</form>

<div id="editProjectMessage"></div>

<a href="{{ route('dashboard') }}">Volver al listado</a>

</body>
</html>



