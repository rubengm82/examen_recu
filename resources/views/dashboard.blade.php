<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <title>Examen Laravel API</title>
  @vite("resources/css/app2.css")
</head>

<body>

  <header>
    <div>
      <h1>Examen Laravel API</h1>
      <p><strong>Bienvenido, {{auth()->user()->name}}!</strong></p>
    </div>
    <div>
      <form action="{{ route('logout') }}" method="POST">
         @csrf
         <button type="submit">Logout</button>
     </form>
    </div>
  </header>

  <a href="{{ route("mensajes.create") }}">Nuevo Mensaje</a>
  {{-- <a href="{{ route("owners") }}">Content Owners</a> --}}
 
  <main class="layout">

    {{--<aside class="sidebar">
       <h2>Llistat de Items</h2>
      <p>Projecte 1</p>
    </aside>--}}

    {{--<article class="featured">
       Projecte 1: És el projecte més nou  
    </article>--}}

    {{--<section class="news">
       <article class="card">Tasca 1 del projecte seleccionat </article>
      <article class="card">Tasca 2 del projecte seleccionat</article>
    </section>--}}

    <div id="mensajes_entrada" class="mensajes_entrada">
      {{-- mensajes_entrada --}}
    </div>
    
    <div id="mensajes_salida" class="mensajes_salida">
      {{-- mensajes_salida --}}
    </div>

  </main>

@vite("resources/js/mensajes/index.js")
</body>
</html>