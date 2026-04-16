@extends('layouts.template')

@section('content')

<div class="d-flex justify-content-center align-items-start mt-4">
    <div class="card shadow" style="width: 65rem; border-radius: 14px; overflow: hidden; border: none;">

        <div class="text-white text-center py-3" style="background-color: #f57c00;">
            <h2 class="mb-0">Lista de Platos</h2>
        </div>

        <div class="card-body p-4" style="background-color: #f3f4f6;">

            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('platos.create') }}" class="btn btn-success btn-lg">
                    Nuevo Plato
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
                            <th>Precio</th>
                            <th style="width: 180px;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($platos as $plato)
                            <tr>
                                <td>{{ $plato->id_plato }}</td>
                                <td>{{ $plato->nombre }}</td>
                                <td>{{ $plato->precio }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('platos.edit', $plato->id_plato) }}" class="btn btn-primary btn-sm">
                                            Editar
                                        </a>

                                        <form action="{{ route('platos.destroy', $plato->id_plato) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este plato?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No hay platos registrados</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection