@extends('layouts.template')

@section('content')

<div class="d-flex justify-content-center align-items-start mt-4">
    <div class="card shadow" style="width: 32rem; border-radius: 12px; overflow: hidden; border: none;">

        <!-- Encabezado -->
        <div class="text-white text-center py-3" style="background-color: #f57c00;">
            <h2 class="mb-0">Nuevo Plato</h2>
        </div>

        <!-- Formulario -->
        <div class="card-body p-4">

            <form action="{{ route('platos.store') }}" method="POST">
                @csrf

                <!-- Nombre -->
                <div class="mb-4">
                    <label class="form-label fs-5">Nombre</label>
                    <input type="text"
                           name="nombre"
                           class="form-control form-control-lg"
                           value="{{ old('nombre') }}"
                           required>
                    @error('nombre')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Precio -->
                <div class="mb-4">
                    <label class="form-label fs-5">Precio</label>
                    <input type="number"
                           name="precio"
                           class="form-control form-control-lg"
                           value="{{ old('precio') }}"
                           step="0.01"
                           required>
                    @error('precio')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Botones -->
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success btn-lg">
                        Guardar
                    </button>

                    <a href="{{ route('platos.index') }}" class="btn btn-secondary btn-lg">
                        Cancelar
                    </a>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection