@extends('layouts.app')

@section('title', 'Iniciar sesión')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/form-create.css') }}">
@endsection

@section('content')
<div class="form-contenedor mx-auto mt-5">
    @if ($errors->any())
        <ul class="text-danger list-unstyled">
            @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('login.ejecutar') }}" class="form-contenido" autocomplete="off">
        @csrf
        <h2>Iniciar sesión</h2>

        <input type="email" name="email" placeholder="Email"
               value="{{ old('email') }}" class="form-control mb-2" autocomplete="new-email">

        <input type="password" name="password" placeholder="Contraseña"
               class="form-control mb-3" autocomplete="new-password">

        <button type="submit">Ingresar</button>
        <p>¿No tenes una cuenta?</p>
        <a href="{{ route('registro.show') }}" class="btn btn-success">Registrarse</a>
    </form>
</div>
@endsection
