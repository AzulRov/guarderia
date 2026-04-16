@extends('layouts.template')

@section('content')
<div class="d-flex justify-content-center align-items-start mt-4">
    <div class="card shadow" style="width: 32rem; border-radius: 12px; overflow: hidden; border: none;">
        
        <div class="text-white text-center py-3" style="background-color: #f57c00;">
            <h2 class="mb-0">Registrar Alergia</h2>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('alergias.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="form-label fs-5">ID Alergia</label>
                
                </div>

                <div class="mb-4">
                    <label class="form-label fs-5">Ingrediente</label>
                    <select name="id_ingrediente" class="form-control form-control-lg" required>
                        @foreach($ingredientes as $i)
                            <option value="{{ $i->id_ingrediente }}">
                                {{ $i->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label fs-5">Niño</label>
                    <select name="id_ninio" class="form-control form-control-lg" required>
                        @foreach($ninios as $n)
                            <option value="{{ $n->id_ninio }}">
                                {{ $n->matricula }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-lg text-white" style="background-color: #ef6c00; border: none;">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
