@extends('layouts.app')
@section('content')
    <h2 style="font-family:Anton, sans-serif">Ventas</h2>
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    {{-- Mensajes de éxito o advertencia --}}
    @if(session('success'))
        <p style="color: green; font-weight: bold;">{{ session('success') }}</p>
    @endif

    @if(session('warning'))
        <p class="message-warning">{{ session('warning') }}</p>
    @endif

    {{-- Buscador --}}
    <form method="GET" action="{{ route('ventas.index') }}" class="buscador mb-3">
        <input type="text" name="search" placeholder="Buscar fecha" value="{{ request('search') }}" class="form-control w-auto d-inline-block">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

    @if($ventas->isEmpty())
        <p>No hay venta registrada.</p>
    @else
      <div class="table-responsive">
        <table border="1" cellpadding="5" cellspacing="0"  class="tabla-style table  table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                     <th>
                         <a href="{{route('ventas.index', ['order' => $order === 'asc' ? 'desc' : 'asc',
                         'search' => request('search')])}}" class="text-white text-decoration-none">
                         Precio <span id="span">{!! $order === 'asc'?'↑':'↓'!!}</span>
                        </a>
                    </th>
                    <th>Fecha de venta</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ventas as $v)
                    <tr>
                        <td>{{ $v->id }}</td>
                        <td>{{ $v->descripcion }}</td>
                        <td>{{ $v->cant_articulos }}</td>
                        <td>{{ $v->precio }}</td>
                        <td>{{ $v->fecha_venta }}</td>
                        <td>
                            <a href="{{ route('ventas.show', $v) }}" class="btn btn-primary btn-sm mb-1">Ver</a>
                            <a href="{{ route('ventas.edit', $v) }}" class="btn btn-warning btn-sm mb-1">Editar</a>
                            @if(request('delete') == $v->id)
                            <div class="alert alert-danger mt-2 p-2">
                                <strong>¿Seguro que querés eliminar esta venta?</strong>
                                <div class="mt-2">
                                    <form action="{{ route('ventas.destroy', $v) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm mb-1">Confirmar</button>
                                    </form>
                                    <a href="{{ route('ventas.index') }}" class="btn btn-secondary btn-sm">Cancelar</a>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('ventas.index', ['delete' => $v->id]) }}" class="btn btn-danger btn-sm">Eliminar</a>
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
    <br>
    <a href="{{ route('ventas.create') }}" class="btn btn-success" >
       Nueva venta
    </a>
@endsection
