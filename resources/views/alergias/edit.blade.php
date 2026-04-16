@extends('layouts.template')

@section('content')
<div class="d-flex justify-content-center align-items-start mt-4">
    <div class="card shadow" style="width: 32rem; border-radius: 12px; overflow: hidden; border: none;">
        
        <div class="text-white text-center py-3" style="background-color: #f57c00;">
            <h2 class="mb-0">Editar Alergia</h2>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('alergias.update', $alergia->id_alergia) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="form-label fs-5">Ingrediente</label>
                    <select name="id_ingrediente" class="form-control form-control-lg" required>
                        @foreach($ingredientes as $i)
                            <option value="{{ $i->id_ingrediente }}"
                                {{ $alergia->id_ingrediente == $i->id_ingrediente ? 'selected' : '' }}>
                                {{ $i->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

               <div class="mb-4">
    <label class="form-label fs-5">Niño</label>
    <select name="id_ninio" class="form-control form-control-lg" required>
        @foreach($ninios as $n)
            <option value="{{ $n->id_ninio }}"
                {{ $alergia->id_ninio == $n->id_ninio ? 'selected' : '' }}>
                {{ $n->id_ninio }}
            </option>
        @endforeach
    </select>
</div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-lg text-white" style="background-color: #f57c00;">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection