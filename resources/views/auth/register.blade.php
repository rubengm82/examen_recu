@extends('app')

@section('title', 'Registro')

@section('content')
    <h1>Registro</h1>
    @vite('resources/js/auth/register.js')

    <div id="registerErrors"></div>

    <form id="registerForm" method="POST">
        @csrf

        <div>
            <label for="name">Nombre</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
        </div>

        <div>
            <label for="password_confirmation">Repite password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>
        </div>

        <button type="submit">Registrarme</button>
    </form>
@endsection
