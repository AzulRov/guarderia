@extends('layouts.template')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-lg">

            <div class="card-header bg-warning text-white text-center">
                <h4>Editar Abono</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('abonos.update', $abono->id_abono) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">ID Abono</label>
                        <input type="number" name="id_abono" class="form-control"
                               value="{{ $abono->id_abono }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Cantidad</label>
                        <input type="number" name="cantidad" class="form-control"
                               value="{{ $abono->cantidad }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fecha</label>
                        <input type="date" name="fecha" class="form-control"
                               value="{{ $abono->fecha }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">ID Cuenta</label>
                        <input type="number" name="id_regcuenta" class="form-control"
                               value="{{ $abono->id_regcuenta }}">
                    </div>

                    <button class="btn btn-success w-100">
                        Actualizar
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection