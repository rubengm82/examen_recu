<!DOCTYPE html>
<html lang="ca">
<head>
<meta charset="UTF-8">
<title>DAW</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
@vite("resources/css/app.css")
@vite("resources/js/projects/index.js")

</head>

<body>

<header>
  <h1>GESTOR DELS MEUS PROJECTES</h1>
</header>

<a href="{{ route("projects.create") }}">Nuevo proyecto</a>
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>
<main class="layout">

  <aside class="sidebar">
    <h2>Llistat del meus projectes</h2>
    <p>Projecte 1</p>
    <p>Projecte 2</p>
    <p>Projecte 3</p>
    <p>Projecte 4</p>
  </aside>

  <article class="featured">
    Projecte 1: És el projecte més nou 
  </article>

  <section class="news">
    <article class="card">Tasca 1 del projecte seleccionat </article>
    <article class="card">Tasca 2 del projecte seleccionat</article>
    <article class="card">Tasca 3 del projecte seleccionat</article>
    <article class="card">Tasca 4 del projecte seleccionat</article>
    <article class="card">Tasca 5 del projecte seleccionat</article>
    <article class="card">Tasca 6 del projecte seleccionat </article>
  </section>

</main>

<footer>
  <p>Examen DAW - Layout Responsive sense media queries</p>
</footer>

</body>
</html>