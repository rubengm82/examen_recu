@extends("app")

@section("content")
@vite("resources/js/cars/index.js")
<p class="funciona">Pagina del index de cars</p>
<h1>Coches:</h1>
<div class="showCars">
</div>
<a href="{{ route("cars.create") }}">Crear coche</a>
@endsection
