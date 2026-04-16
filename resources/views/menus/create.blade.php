@extends('layouts.template')

@section('content')
<div class="d-flex justify-content-center align-items-start mt-4">
    <div class="card shadow" style="width: 34rem; border-radius: 12px; overflow: hidden; border: none;">
        
        <div class="text-white text-center py-3" style="background-color: #8e44ad;">
            <h2 class="mb-0">Registrar Menú</h2>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('menus.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="form-label fs-5">Plato</label>
                    <select name="id_plato" class="form-control form-control-lg" required>
                        @foreach($platos as $p)
                            <option value="{{ $p->id_plato }}">
                                {{ $p->nombre ?? 'Plato ' . $p->id_plato }}
                            </option>
                        @endforeach
                    </select>
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

                <div class="d-grid">
                    <button type="submit" class="btn btn-lg text-white" style="background-color: #9b59b6; border: none;">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
