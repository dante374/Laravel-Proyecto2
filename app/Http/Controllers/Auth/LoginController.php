<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show(Request $request)
    {
        // Regeneramos la sesión si venimos de un intento fallido
        if ($request->session()->has('login_failed')) {
            $request->session()->regenerate();
            $request->session()->forget('login_failed');
        }

        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('vendedores.index')->with('success', 'Bienvenido!');
        }

        // Marcamos que hubo un fallo para regenerar la sesión en show()
        $request->session()->put('login_failed', true);

        return redirect()->route('login.show')
            ->withErrors(['email' => 'Las credenciales no coinciden'])
            ->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.show')->with('success', 'Sesión cerrada correctamente');
    }
}
