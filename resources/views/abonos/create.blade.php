@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Registro de Abono</h4>
                </div>

                <div class="card-body">
                    <form action="{{route('abonos.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="id_abono" class="form-label">Id Abono</label>
                                <input type="number" class="form-control" id="id_abono" name="id_abono" placeholder="Ej. 101">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="cantidad" class="form-label">Cantidad</label>
                                <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="$0.00">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" class="form-control" id="fecha" name="fecha">
                        </div>

                        <div class="mb-3">
                            <label for="id_regcuenta" class="form-label">Id REG Cuenta</label>
                            <input type="number" class="form-control" id="id_regcuenta" name="id_regcuenta" placeholder="Ej. 5001">
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-success">
                                Guardar
                            </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
