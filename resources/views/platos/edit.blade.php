@extends('layouts.template')

@section('content')

<div class="container mt-4">
    <h2>Editar Plato</h2>

    <form action="{{ route('platos.update', $plato->id_plato) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control"
                   value="{{ $plato->nombre }}" required>
        </div>

        <div class="mb-3">
            <label>Precio</label>
            <input type="number" step="0.01" name="precio" class="form-control"
                   value="{{ $plato->precio }}" required>
        </div>

        <button class="btn btn-primary">Actualizar</button>
        <a href="{{ route('platos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

</div>

@endsection