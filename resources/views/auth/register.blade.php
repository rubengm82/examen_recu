@extends('app')

@section('title', 'Registro')

@section('content')
    <h1>Registro</h1>

    <form id="registerForm" method="POST">
        @csrf

        <div>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required>
            <label for="name">Nombre Real</label>
        </div>
        
        <div>
            <input id="departamento" type="text" name="departamento" value="{{ old('departamento') }}" required>
            <label for="departamento">Departamento</label>
        </div>  

        <div>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            <label for="email">Email</label>
        </div>

        <div>
            <input id="password" type="password" name="password" required>
            <label for="password">Password</label>
        </div>

        <button type="submit">Registrarme</button>
    </form>

    <div id="registerErrors"></div>

    @vite('resources/js/auth/register.js')
@endsection
