<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

     public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'El email es obligatorio',
            'password.required' => 'La contraseña es obligatoria'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('vendedores.index')->with('success', 'Bienvenido!');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.show')->with('success', 'Sesión cerrada correctamente');
    }

}
