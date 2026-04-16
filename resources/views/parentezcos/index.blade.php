@extends('layouts.template')

@section('content')
<div class="d-flex justify-content-center align-items-start mt-4">
    <div class="card shadow" style="width: 70rem; border-radius: 14px; overflow: hidden; border: none;">

        <div class="text-white text-center py-3" style="background-color: #f57c00;">
            <h2 class="mb-0">Lista de Parentezcos</h2>
        </div>

        <div class="card-body p-4" style="background-color: #f3f4f6;">
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('parentezcos.create') }}" class="btn btn-success btn-lg">
                    Nuevo Parentezco
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
                            <th>Nombre</th>
                            <th style="width: 180px;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($parentezcos as $parentezco)
                            <tr>
                                <td>{{ $parentezco->id_parentezco }}</td>
                                <td>{{ $parentezco->nombre }}</td>
                                <td>
                                    <a href="{{ route('parentezcos.edit', $parentezco) }}" class="btn btn-primary btn-sm">
                                        Editar
                                    </a>

                                    <form action="{{ route('parentezcos.destroy', $parentezco) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('¿Seguro que deseas eliminar este parentezco?')">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No hay parentezcos registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection