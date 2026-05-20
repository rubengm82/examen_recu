@extends("app")

@section("title", "Ver coche")

@section("content")
    @vite("resources/js/cars/show.js")

    <h1>Detalle del coche</h1>
    <div id="showCarContent" data-id="{{ $id }}"></div>
    {{-- <a href="{{ route('cars.index') }}">Volver al listado</a> --}}
@endsection
