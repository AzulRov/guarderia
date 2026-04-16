@extends('layouts.template')

@section('content')

<div class="d-flex justify-content-center align-items-start mt-4">
    <div class="card shadow" style="width: 32rem; border-radius: 12px; overflow: hidden; border: none;">

        <div class="text-white text-center py-3" style="background-color: #f57c00;">
            <h2 class="mb-0">Editar Ingrediente</h2>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('ingredientes.update', $ingrediente->id_ingrediente) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="form-label fs-5">Nombre</label>
                    <input type="text"
                           name="nombre"
                           class="form-control form-control-lg"
                           value="{{ old('nombre', $ingrediente->nombre) }}"
                           required>
                    @error('nombre_ingrediente')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid">
                    <button type="submit"
                            class="btn btn-lg text-white"
                            style="background-color: #f57c00;">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>

@endsection