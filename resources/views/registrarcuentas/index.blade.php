@extends('layouts.template')

@section('content')
<div class="d-flex justify-content-center align-items-start mt-4">
    <div class="card shadow" style="width: 70rem; border-radius: 14px; overflow: hidden; border: none;">

        <div class="text-white text-center py-3" style="background-color: #f57c00;">
            <h2 class="mb-0">Lista de Cuentas Registradas</h2>
        </div>

        <div class="card-body p-4" style="background-color: #f3f4f6;">
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('registrarcuentas.create') }}" class="btn btn-success btn-lg">
                    Nueva cuenta
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle bg-white">
                    <thead>
                        <tr style="background-color: #ffe0b2;">
                            <th>ID</th>
                            <th>Cuenta</th>
                            <th>ID Familiar</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($registrarcuentas as $cuenta)
                            <tr>
                                <td>{{ $cuenta->id_regcuenta }}</td>
                                <td>{{ $cuenta->cuenta }}</td>
                                <td>{{ $cuenta->id_fam }}</td>
                                <td>
                                    <a href="{{ route('registrarcuentas.edit', $cuenta) }}" class="btn btn-primary btn-sm">
                                        Editar
                                    </a>

                                    <form action="{{ route('registrarcuentas.destroy', $cuenta) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar esta cuenta?')">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No hay cuentas registradas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection