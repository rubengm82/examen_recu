@extends("app")

@section("content")
    @vite("resources/js/cars/index.js")
    <section class="cars-index">
        <p class="funciona">Pagina del index de cars</p>
        <h1>Coches:</h1>
        <div class="showCars">
        </div>
        {{-- <a class="cars-index__create" href="{{ route("cars.create") }}">Crear coche</a> --}}
    </section>
@endsection
