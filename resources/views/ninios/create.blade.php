@extends('layouts.template')

@section('content')

<div class="d-flex justify-content-center mt-4">
    <div class="card shadow" style="width: 32rem; border-radius: 12px; overflow: hidden; border: none;">
        
        <div class="text-white text-center py-3" style="background-color: #f57c00;">
            <h2 class="mb-0">Registrar Niño</h2>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('ninios.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Matrícula</label>
                    <input type="text" name="matricula" class="form-control" value="{{ old('matricula') }}" required>
                    @error('matricula')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Fecha</label>
                    <input type="date" name="fecha" class="form-control" value="{{ old('fecha') }}" required>
                    @error('fecha')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">ID Persona</label>
                    <input type="number" name="id_persona" class="form-control" value="{{ old('id_persona') }}" required>
                    @error('id_persona')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">ID Centro</label>
                    <input type="number" name="id_centro" class="form-control" value="{{ old('id_centro') }}" required>
                    @error('id_centro')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn w-100 text-white" style="background-color: #f57c00;">
                    Guardar
                </button>
            </form>
        </div>
    </div>
</div>

@endsection