@extends('layouts.template')

@section('content')

<div class="d-flex justify-content-center align-items-start mt-4">
    <div class="card shadow" style="width: 32rem; border-radius: 12px; overflow: hidden; border: none;">

        <div class="text-white text-center py-3" style="background-color: #f57c00;">
            <h2 class="mb-0">Editar Centro</h2>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('centros.update', $centro->id_centro) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="form-label fs-5">Nombre</label>
                    <input type="text"
                           name="nom"
                           class="form-control form-control-lg"
                           value="{{ old('nom', $centro->nom) }}"
                           required>
                    @error('nom')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label fs-5">Costo</label>
                    <input type="number"
                           name="costo"
                           class="form-control form-control-lg"
                           value="{{ old('costo', $centro->costo) }}"
                           required>
                    @error('costo')
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