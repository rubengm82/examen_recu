@extends('app')

@section('title', 'Login')

@section('content')
    <h1>Login</h1>

    @vite('resources/js/auth/login.js')

    <div id="loginErrors"></div>

    <form id="loginForm" method="POST">
        @csrf

        <div>
            <label for="username">Nombre de usuario</label>
            <input id="username" type="text" name="username" value="{{ old('username') }}" required>
        </div>

        <div>
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
        </div>

        <button type="submit">Entrar</button>
    </form>
@endsection
