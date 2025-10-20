@extends('layouts.app')
@section('title', 'Editar Vendedor')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/form-edit.css') }}">
@endsection

@section('content')
@include('vendedores.form', [
    'action' => route('vendedores.update',$vendedor),
    'btnText' => 'Actualizar',
    'vendedor' => $vendedor
])
@endsection

