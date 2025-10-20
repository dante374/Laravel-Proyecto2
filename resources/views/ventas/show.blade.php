
@extends('layouts.app')
@section('title','Ver venta')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/form-show.css') }}">
@endsection
@section('content')
 <div class="form-contenedor mx-auto mt-5">
    <h2>Detalle de Venta</h2>

    <p><strong>ID:</strong> {{ $venta->id }}</p>
    <p><strong>Descripción:</strong> {{ $venta->descripcion }}</p>
    <p><strong>Cantidad:</strong> {{ $venta->cant_articulos }}</p>
    <p><strong>Precio:</strong> {{ $venta->precio }}</p>
    <p><strong>Fecha de venta:</strong> {{ $venta->fecha_venta }}</p>
    <div style="display: flex; justify-content: center;">
        <a href="{{ route('ventas.index') }}" class="boton-volver" >Volver</a>
    </div>
</div>
@endsection