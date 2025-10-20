@extends('layouts.app')
@section('title', 'Nueva venta')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/form-create.css') }}">
@endsection
@section('content')
@include('ventas.form', [
    'action' => route('ventas.store'),
    'btnText' => 'Crear venta',
    'venta' => null
])
@endsection

