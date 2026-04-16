@extends('layouts.template')

@section('content')
<div class="d-flex justify-content-center align-items-start mt-4">
    <div class="card shadow" style="width: 45rem; border-radius: 14px; overflow: hidden; border: none;">

        <div class="text-white text-center py-3" style="background-color: #f57c00;">
            <h2 class="mb-0">Registrar Baja de Niño</h2>
        </div>

        <div class="card-body p-4" style="background-color: #f3f4f6;">
            <form action="{{ route('bajaninios.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="form-label fs-5">Niño</label>
                    <select name="id_ninio" class="form-select form-select-lg" required style="color: black;">
                        <option value="">Seleccione un niño</option>
                        @foreach($ninios as $ninio)
                            <option value="{{ $ninio['id_ninio'] }}" style="color: black;">
                                {{ $ninio['id_ninio'] }} - {{ $ninio['matricula'] }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label fs-5">Motivo</label>
                    <input type="text"
                           name="motivo"
                           class="form-control form-control-lg"
                           value="{{ old('motivo') }}"
                           placeholder="Escribe el motivo de la baja">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('bajaninios.index') }}" class="btn btn-secondary btn-lg">
                        Regresar
                    </a>
                    <button type="submit" class="btn btn-success btn-lg">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection