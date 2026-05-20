@extends('app')

@section('title', 'Login')

@section('content')
    <h1>Login</h1>
    
    <form id="loginForm" method="POST">
        @csrf

        <div>
            <input id="email" type="email" name="email" value="{{ old('username') }}" required>
            <label for="email">Email</label>
        </div>
        
        <div>
            <input id="password" type="password" name="password" required>
            <label for="password">Password</label>
        </div>
        
        <button type="submit">Entrar</button>
    </form>
    
    <div id="loginErrors"></div>
    
    @vite('resources/js/auth/login.js')
@endsection
