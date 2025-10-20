@extends('layouts.app')
@section('title', 'Nuevo Vendedor')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/form-create.css') }}">
@endsection

@section('content')
@include('vendedores.form', [
    'action' => route('vendedores.store'),
    'btnText' => 'Crear',
    'vendedor' => null
])
@endsection

