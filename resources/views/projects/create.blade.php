<!DOCTYPE html>
<html lang="e">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Crear proyecto</title>
</head>
<body>
@vite('resources/js/projects/create.js')
@vite("resources/css/app.css")

<div id="createProjectMessage"></div>
<form id="createProjectForm" class="form" method="POST">
    @csrf
    <input type="text" name="nombre" id="nombre" placeholder="Nombre">
    <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion">
    <input type="date" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha inicio">
    <input type="date" name="fecha_fin" id="fecha_fin" placeholder="Fecha fin">

    <button type="submit">Crear proyecto</button>
</form>
<div id="createCarMessage"></div>
</body>
</html>