@extends('layouts.app')
@section('content')
<h2 style="font-family:Anton, sans-serif">Vendedores</h2>
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    {{-- Mensajes --}}
    @if(session('success'))
        <p style="color: green; font-weight: bold;">{{ session('success') }}</p>
    @endif

    @if(session('warning'))
        <p style="color: green; font-weight: bold;">{{ session('warning') }}</p>
    @endif

    {{-- Buscador --}}
    <form method="GET" action="{{ route('vendedores.index') }}" class="buscador mb-3">
        <input type="text" name="search" placeholder="Buscar nombre o apellido" value="{{ request('search') }}" class="form-control w-auto d-inline-block">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

    {{-- Tabla --}}
    @if($vendedores->isEmpty())
        <p>No hay vendedores registrados.</p>
    @else
      <div class="table-responsive">
        <table class="tabla-style table  table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>
                         <a href="{{route('vendedores.index', ['order' => $order === 'asc' ? 'desc' : 'asc',
                         'search' => request('search')])}}" class="text-white text-decoration-none">
                         Nombre <span id="span">{!! $order === 'asc'?'↑':'↓'!!}</span>
                        </a>
                    </th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Fecha de nacimiento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vendedores as $v)
                    <tr>
                        <td>{{ $v->id }}</td>
                        <td>{{ $v->Nombre }}</td>
                        <td>{{ $v->apellido }}</td>
                        <td>{{ $v->email }}</td>
                        <td>{{ $v->telefono }}</td>
                        <td>{{ $v->direccion }}</td>
                        <td>{{ $v->fecha_nacimiento }}</td>
                        <td>
                            <a href="{{ route('vendedores.show', $v) }}" class="btn btn-primary btn-sm mb-1">Ver</a>
                            <a href="{{ route('vendedores.edit', $v) }}" class="btn btn-warning btn-sm mb-1">Editar</a>
                            @if(request('delete') == $v->id)
                            <div class="alert alert-danger mt-2 p-2">
                                <strong>¿Seguro que querés eliminar este vendedor?</strong>
                                <div class="mt-2">
                                    <form action="{{ route('vendedores.destroy', $v) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm mb-1">Confirmar</button>
                                    </form>
                                    <a href="{{ route('vendedores.index') }}" class="btn btn-secondary btn-sm mb-1">Cancelar</a>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('vendedores.index', ['delete' => $v->id]) }}" class="btn btn-danger btn-sm mb-1">Eliminar</a>
                        @endif
                    </td>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
       </div>
    @endif

    {{-- Botón siempre visible --}}
    <a href="{{ route('vendedores.create') }}" class="btn btn-success ">Nuevo vendedor</a>
@endsection

