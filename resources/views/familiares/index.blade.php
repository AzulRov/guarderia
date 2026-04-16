@extends('layouts.template')

@section('content')
<div class="d-flex justify-content-center align-items-start mt-4">
    <div class="card shadow" style="width: 75rem; border-radius: 14px; overflow: hidden; border: none;">

        <div class="text-white text-center py-3" style="background-color: #f57c00;">
            <h2 class="mb-0">Lista de Familiares</h2>
        </div>

        <div class="card-body p-4" style="background-color: #f3f4f6;">
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('familiares.create') }}" class="btn btn-success btn-lg">
                    Nuevo familiar
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
                            <th>ID Familiar</th>
                            <th>Persona</th>
                            <th>DNI</th>
                            <th>Dirección</th>
                            <th>Parentezco</th>
                            <th>Niño</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($familiares as $familiar)
                            <tr>
                                <td>{{ $familiar->id_fam }}</td>
                                <td>{{ $familiar->persona->nom ?? $familiar->id_persona }}</td>
                                <td>{{ $familiar->DNI }}</td>
                                <td>{{ $familiar->dir }}</td>
                                <td>{{ $familiar->parentezco->nombre ?? $familiar->id_parentezco }}</td>
                                <td>{{ $familiar->ninio->nom ?? $familiar->id_ninio }}</td>
                                <td>
                                    <a href="{{ url('familiares/' . $familiar->id_fam . '/edit') }}" class="btn btn-primary btn-sm">
    Editar
</a>

                                    <form action="{{ url('familiares/' . $familiar->id_fam) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este familiar?')">
        Eliminar
    </button>
</form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No hay familiares registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection