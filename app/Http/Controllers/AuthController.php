<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLogin(): View
    {
        return view("auth.login");
    }

    public function login(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "required|string",
        ]);
        $response = null;

        if (! Auth::attempt($credentials)) {
            $response = response()->json(["message" => "Credenciales incorrectas."], 401);
        } else {
            $request->session()->regenerate();
            $response = response()->json(["message" => "Login correcto.", "redirect" => route("cars.index")], 200);
        }

        return $response;
    }

    public function showRegister(): View
    {
        return view("auth.register");
    }

    public function register(Request $request): JsonResponse
    {
        $validate = $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|email|max:255|unique:users,email",
            "password" => "required|string|min:3|confirmed",
        ]);
        $user = User::create($validate);
        $response = null;

        if ($user) {
            Auth::login($user);
            $request->session()->regenerate();

            $response = response()->json(["message" => "Registro correcto.", "redirect" => route("cars.index"),], 201);
        } else {
            $response = response()->json(["message" => "No se ha podido registrar el usuario."], 500);
        }

        return $response;
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("login");
    }
}
