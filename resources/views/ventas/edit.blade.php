
@extends('layouts.app')
@section('title', 'Editar Venta')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/form-edit.css') }}">
@endsection

@section('content')
@include('ventas.form', [
    'action' => route('ventas.update',$venta),
    'btnText' => 'Actualizar',
    'venta' => $venta
])
@endsection
