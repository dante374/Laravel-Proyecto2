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

        if ($request->session()->has('login_fallido')) {
            $request->session()->regenerate();
            $request->session()->forget('login_fallido');
        }

        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('vendedores.index')->with('success', 'Bienvenido!');
        }

        $request->session()->put('login_fallido', true);

        return redirect()->route('login.show')
            ->withErrors(['email' => 'Las credenciales no coinciden'])
            ->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        return redirect()->route('login.show')->with('success', 'Sesion cerrada correctamente');
    }
}
