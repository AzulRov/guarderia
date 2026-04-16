@extends('layouts.template')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card shadow-lg border-0">

            <div class="card-header text-white text-center" style="background-color: #6f42c1;">
                <h4 class="mb-0">Registro de Cuentas</h4>
            </div>

            <div class="card-body p-4">
                <form action="{{ route('registrarcuentas.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Familiar</label>
                        <select name="id_fam" class="form-control" required>
                            @foreach($familiares as $f)
                                <option value="{{ $f->id_fam }}">
                                    {{ $f->DNI }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Cuenta</label>
                        <input type="number" name="cuenta" class="form-control" required>
                    </div>

                    <button type="submit" class="btn w-100 text-white" style="background-color: #6f42c1;">
                        Guardar
                    </button>

                </form>
            </div>

        </div>
    </div>
</div>

@endsection