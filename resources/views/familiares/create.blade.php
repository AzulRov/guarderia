@extends('layouts.template')

@section('content')
<div class="d-flex justify-content-center align-items-start mt-4">
    <div class="card shadow" style="width: 38rem; border-radius: 12px; overflow: hidden; border: none;">

        <div class="text-white text-center py-3" style="background-color: #f57c00;">
            <h2 class="mb-0">Registrar Familiar</h2>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('familiares.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="form-label fs-5">Persona</label>
                    <select name="id_persona" class="form-control form-control-lg" required>
                        <option value="">Seleccione una persona</option>
                        @foreach($personas as $persona)
                            <option value="{{ $persona->id_persona }}">
                                {{ $persona->nom ?? $persona->nombre ?? $persona->id_persona }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label fs-5">DNI</label>
                    <input type="text" name="DNI" class="form-control form-control-lg" required>
                </div>

                <div class="mb-4">
                    <label class="form-label fs-5">Dirección</label>
                    <input type="text" name="dir" class="form-control form-control-lg" required>
                </div>

                <div class="mb-4">
                    <label class="form-label fs-5">Parentezco</label>
                    <select name="id_parentezco" class="form-control form-control-lg" required>
                        <option value="">Seleccione un parentezco</option>
                        @foreach($parentezcos as $parentezco)
                            <option value="{{ $parentezco->id_parentezco }}">
                                {{ $parentezco->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label fs-5">Niño</label>
                    <select name="id_ninio" class="form-control form-control-lg" required>
                        <option value="">Seleccione un niño</option>
                        @foreach($ninios as $ninio)
                            <option value="{{ $ninio->id_ninio }}">
                                {{ $ninio->nom ?? $ninio->nombre ?? $ninio->id_ninio }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success btn-lg">
                        Guardar familiar
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection