@extends("app")

@section("title", "Crear coche")

@section("content")
@vite('resources/js/cars/create.js')

<form id="createCardForm" class="form" method="POST">
    @csrf
    <input type="text" name="name" id="name" placeholder="Nombre">
    <input type="text" name="model" id="model" placeholder="Modelo">
    <input type="number" name="price" id="price" placeholder="Precio">

    <button type="submit">Crear coche</button>
</form>
@endsection
