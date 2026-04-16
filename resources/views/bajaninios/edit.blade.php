@extends('layouts.template')

@section('content')

<div class="d-flex justify-content-center mt-4">
    <div class="card" style="width: 30rem;">

        <div class="bg-warning text-white text-center p-3">
            <h3>Editar Baja de Niño</h3>
        </div>

        <div class="card-body">

            <form action="{{ route('bajaninios.update', $baja->id_baja) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Niño</label>
                    <select name="id_ninio" class="form-control" required>
                        @foreach($ninios as $n)
                            <option value="{{ $n->id }}"
                                {{ $baja->id_ninio == $n->id ? 'selected' : '' }}>
                                {{ $n->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Motivo</label>
                    <input type="text" name="motivo" class="form-control"
                           value="{{ $baja->motivo }}" required>
                </div>

                <div class="mb-3">
                    <label>Fecha</label>
                    <input type="date" name="fecha" class="form-control"
                           value="{{ $baja->fecha }}" required>
                </div>

                <button class="btn btn-primary">Actualizar</button>
                <a href="{{ route('bajaninios.index') }}" class="btn btn-secondary">Cancelar</a>

            </form>

        </div>
    </div>
</div>

@endsection