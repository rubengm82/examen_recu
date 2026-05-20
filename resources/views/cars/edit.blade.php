@extends("app")

@section("title", "Editar coche")

@section("content")
    @vite("resources/js/cars/edit.js")

    <h1>Editar coche</h1>
    <div id="editCarData" data-id="{{ $id }}"></div>

    <form id="editCarForm" method="POST">
        @csrf
        <input type="text" name="name" id="name" placeholder="Nombre">
        <input type="text" name="model" id="model" placeholder="Modelo">
        <input type="number" name="price" id="price" placeholder="Precio">

        <button type="submit">Editar coche</button>
    </form>
    <div id="editCarMessage"></div>
    {{-- <a href="{{ route('cars.index') }}">Volver al listado</a> --}}
@endsection
