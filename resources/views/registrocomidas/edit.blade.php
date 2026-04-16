@extends('layouts.template')

@section('content')

<div class="d-flex justify-content-center align-items-start mt-4">
    <div class="card shadow" style="width: 36rem; border-radius: 12px; overflow: hidden; border: none;">

        <div class="text-white text-center py-3" style="background-color: #f57c00;">
            <h2 class="mb-0">Editar Registro de Comida</h2>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('registrocomidas.update', $registrocomida->id_registrocomida) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="form-label fs-5">Niño</label>
                    <select name="id_nino" class="form-control form-control-lg" required>
                        @foreach($ninios as $ninio)
                            <option value="{{ $ninio->id_nino }}" {{ old('id_nino', $registrocomida->id_nino) == $ninio->id_nino ? 'selected' : '' }}>
                                {{ $ninio->id_nino }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_nino')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label fs-5">Plato</label>
                    <select name="id_plato" class="form-control form-control-lg" required>
                        @foreach($platos as $plato)
                            <option value="{{ $plato->id_plato }}" {{ old('id_plato', $registrocomida->id_plato) == $plato->id_plato ? 'selected' : '' }}>
                                {{ $plato->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_plato')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label fs-5">Fecha</label>
                    <input type="date" name="fecha" class="form-control form-control-lg" value="{{ old('fecha', $registrocomida->fecha) }}" required>
                    @error('fecha')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label fs-5">Cantidad</label>
                    <input type="number" name="cantidad" class="form-control form-control-lg" value="{{ old('cantidad', $registrocomida->cantidad) }}" min="1" required>
                    @error('cantidad')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary btn-lg">Actualizar</button>
                    <a href="{{ route('registrocomidas.index') }}" class="btn btn-secondary btn-lg">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection