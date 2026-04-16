@extends('layouts.template')

@section('content')
<div class="d-flex justify-content-center align-items-start mt-4">
    <div class="card shadow" style="width: 32rem; border-radius: 12px; overflow: hidden; border: none;">

        <div class="text-white text-center py-3" style="background-color: #f57c00;">
            <h2 class="mb-0">Editar Cuenta</h2>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('registrarcuentas.update', $registrarcuenta) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="form-label fs-5">Familiar</label>
                    <select name="id_fam" class="form-control form-control-lg" required>
                        @foreach($familiares as $familiar)
                            <option value="{{ $familiar->id_fam }}"
                                {{ $registrarcuenta->id_fam == $familiar->id_fam ? 'selected' : '' }}>
                                {{ $familiar->nom ?? $familiar->id_fam }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label fs-5">Cuenta</label>
                    <input type="text"
                           name="cuenta"
                           class="form-control form-control-lg"
                           value="{{ $registrarcuenta->cuenta }}"
                           required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-warning btn-lg text-white">
                        Actualizar cuenta
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection