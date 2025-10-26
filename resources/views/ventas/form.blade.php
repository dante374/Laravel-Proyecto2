<div class="form-contenedor mx-auto mt-5">
    @if ($errors->any())
        <ul class="text-danger list-unstyled">
            @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ $action }}" class="form-contenido">
        @csrf
        @if($btnText === 'Actualizar')
            @method('PUT')
        @endif
        <h2>
            @if($btnText === 'Actualizar')
             Editar Venta
            @else
             Nueva Venta
            @endif
        </h2>
        <label>Descripción</label><br>
        <input type="text" name="descripcion" value="{{ $venta->descripcion ?? old('descripcion') }}"  class="form-control">
        <label>Cantidad de artículos</label><br>
        <input type="number" name="cant_articulos" value="{{ $venta->cant_articulos ?? old('cant_articulos',1) }}" class="form-control">
        <label>Precio</label><br>
        <input type="number" step="0.01" name="precio" value="{{ $venta->precio ?? old('precio') }}"   class="form-control">
        <label>Fecha de venta</label><br>
        <input type="date" name="fecha_venta" value="{{ $venta->fecha_venta ?? old('fecha_venta') }}"  class="form-control">
        <button type="submit">{{ $btnText }}</button>
    </form>
</div>



