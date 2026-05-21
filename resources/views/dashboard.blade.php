<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <title>Examen Laravel API</title>
  @vite("resources/css/app.css")
  @vite("resources/js/projects/index.js")
</head>

<body>

  <header>
    <div>
      <h1>Examen Laravel API</h1>
      <p>Usuario: <strong>{{auth()->user()->name}}</strong></p>
    </div>
    <div>
      <form action="{{ route('logout') }}" method="POST">
         @csrf
         <button type="submit">Logout</button>
     </form>
    </div>
  </header>

  <a href="{{ route("projects.create") }}">Nuevo proyecto</a>
  {{-- <a href="{{ route("owners") }}">Content Owners</a> --}}
 
  <main class="layout">

    <aside class="sidebar">
      {{-- <h2>Llistat de Items</h2>
      <p>Projecte 1</p>--}}
      <a href="{{ route("projects.create") }}">Nuevo proyecto</a>
    </aside>

    <article class="featured">
      {{-- Projecte 1: És el projecte més nou  --}}
    </article>

    <section class="news">
      {{-- <article class="card">Tasca 1 del projecte seleccionat </article>
      <article class="card">Tasca 2 del projecte seleccionat</article>--}}
    </section>

  </main>

</body>
</html>