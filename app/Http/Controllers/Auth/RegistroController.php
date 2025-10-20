<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Acá vamos a agregar la lógica después
    }
}
