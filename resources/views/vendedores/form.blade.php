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
             Editar Vendedor
            @else
             Nuevo Vendedor
            @endif
        </h2>
        <label for="">Nombre</label>
        <input type="text" name="nombre"  value="{{ old('nombre', $vendedor->Nombre ?? '') }}" class="form-control">
        <label for="">Apellido</label>
        <input type="text" name="apellido"  value="{{ old('apellido', $vendedor->apellido ?? '') }}" class="form-control">
        <label for="">Email</label>
        <input type="email" name="email"  value="{{ old('email', $vendedor->email ?? '') }}" class="form-control">
        <label for="">Telefono</label>
        <input type="text" name="telefono"  value="{{ old('telefono', $vendedor->telefono ?? '') }}" class="form-control">
        <label for="">Direccion</label>
        <input type="text" name="direccion"  value="{{ old('direccion', $vendedor->direccion ?? '') }}" class="form-control">
        <label for="">Fecha de nacimiento</label>
        <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $vendedor->fecha_nacimiento ?? '') }}" class="form-control">

        <button type="submit">{{ $btnText }}</button>
    </form>
</div>



