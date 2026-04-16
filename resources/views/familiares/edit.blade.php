@extends('layouts.template')

@section('content')
<div class="d-flex justify-content-center align-items-start mt-4">
    <div class="card shadow" style="width: 38rem; border-radius: 12px; overflow: hidden; border: none;">

        <div class="text-white text-center py-3" style="background-color: #f57c00;">
            <h2 class="mb-0">Editar Familiar</h2>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('familiares.update', ['familiare' => $familiar->id_fam]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="form-label fs-5">Persona</label>
                    <select name="id_persona" class="form-control form-control-lg" required>
                        @foreach($personas as $persona)
                            <option value="{{ $persona->id_persona }}"
                                {{ $persona->id_persona == $familiar->id_persona ? 'selected' : '' }}>
                                {{ $persona->nom ?? $persona->nombre ?? $persona->id_persona }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label fs-5">DNI</label>
                    <input type="text"
                           name="DNI"
                           class="form-control form-control-lg"
                           value="{{ $familiar->DNI }}"
                           required>
                </div>

                <div class="mb-4">
                    <label class="form-label fs-5">Dirección</label>
                    <input type="text"
                           name="dir"
                           class="form-control form-control-lg"
                           value="{{ $familiar->dir }}"
                           required>
                </div>

                <div class="mb-4">
                    <label class="form-label fs-5">Parentezco</label>
                    <select name="id_parentezco" class="form-control form-control-lg" required>
                        @foreach($parentezcos as $parentezco)
                            <option value="{{ $parentezco->id_parentezco }}"
                                {{ $parentezco->id_parentezco == $familiar->id_parentezco ? 'selected' : '' }}>
                                {{ $parentezco->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label fs-5">Niño</label>
                    <select name="id_ninio" class="form-control form-control-lg" required>
                        @foreach($ninios as $ninio)
                            <option value="{{ $ninio->id_ninio }}"
                                {{ $ninio->id_ninio == $familiar->id_ninio ? 'selected' : '' }}>
                                {{ $ninio->nom ?? $ninio->nombre ?? $ninio->id_ninio }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-warning btn-lg text-white">
                        Actualizar Familiar
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection