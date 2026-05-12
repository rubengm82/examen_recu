@extends('app')

@section('title', 'Login')

@section('content')
    <h1>Login</h1>

    @vite('resources/js/auth/login.js')

    <div id="loginErrors"></div>

    <form id="loginForm" method="POST">
        @csrf

        <div>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
        </div>

        <button type="submit">Entrar</button>
    </form>
@endsection
