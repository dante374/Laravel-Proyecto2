@extends('layouts.app')

@section('title', 'Registrarse')

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

    <form method="POST" action="{{ route('registro.store') }}" class="form-contenido">
        @csrf
        <h2>Registrarse</h2>

        <input type="text" name="name" placeholder="Nombre completo"
               value="{{ old('name') }}" class="form-control mb-2">

        <input type="email" name="email" placeholder="Email"
               value="{{ old('email') }}" class="form-control mb-2">

        <input type="password" name="password" placeholder="Contraseña"
               class="form-control mb-2">

        <input type="password" name="password_confirmation" placeholder="Confirmar contraseña"
               class="form-control mb-3">

        <button type="submit">Registrarse</button>
    </form>
</div>
@endsection
