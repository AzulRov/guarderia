@extends('layouts.template')

@section('content')
<div class="container-fluid py-4">
    <div class="card shadow-lg border-0" style="border-radius: 18px; overflow: hidden;">
        
        <div class="text-white py-3 px-4" style="background: linear-gradient(90deg, #f57c00, #fb8c00);">
            <h2 class="mb-0 fw-bold">Menús</h2>
        </div>

        <div class="card-body p-4" style="background-color: #f8fafc;">
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('menus.create') }}" class="btn btn-success btn-lg shadow-sm">
                    Nuevo Menú
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle bg-white shadow-sm" style="border-radius: 12px; overflow: hidden;">
                    <thead>
                        <tr style="background-color: #e3f2fd;">
                            <th class="py-3">ID</th>
                            <th class="py-3">Plato</th>
                            <th class="py-3">Ingrediente</th>
                            <th class="py-3 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($menus as $menu)
                            <tr>
                                <td>{{ $menu->id_menu }}</td>
                                <td>
                                    <span class="fw-semibold">
                                        {{ $menu->plato->nombre ?? 'Sin plato' }}
                                    </span>
                                    <br>
                                    <small class="text-muted">ID: {{ $menu->id_plato }}</small>
                                </td>
                                <td>
                                    <span class="fw-semibold">
                                        {{ $menu->ingrediente->nombre ?? 'Sin ingrediente' }}
                                    </span>
                                    <br>
                                    <small class="text-muted">ID: {{ $menu->id_ingrediente }}</small>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('menus.edit', $menu) }}" class="btn btn-primary btn-sm me-1">
                                        Editar
                                    </a>

                                    <form action="{{ route('menus.destroy', $menu) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('¿Seguro que deseas eliminar este menú?')">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4">No hay menús registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection