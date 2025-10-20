@extends('layouts.app')
@section('title','Ver vendedor')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/form-show.css') }}">
@endsection
@section('content')
 <div class="form-contenedor mx-auto mt-5">
    <h2>Detalles del Vendedor</h2>

    <p ><strong>Nombre:</strong> {{ $vendedor->Nombre }}</p>
    <p><strong>Apellido:</strong> {{ $vendedor->apellido }}</p>
    <p><strong>Email:</strong> {{ $vendedor->email }}</p>
    <p><strong>Teléfono:</strong> {{ $vendedor->telefono }}</p>
    <p><strong>Dirección:</strong> {{ $vendedor->direccion }}</p>
    <p><strong>Fecha de nacimiento:</strong> {{ $vendedor->fecha_nacimiento }}</p>
    <div style="display: flex; justify-content: center;">
        <a href="{{ route('vendedores.index') }}" class="boton-volver" >Volver</a>
    </div>
</div>
@endsection