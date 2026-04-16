@extends("layouts.template")

@section("content")

<div class="row justify-content-center mt-4">
    <div class="col-md-9">
        <div class="card shadow-lg border-0" style="border-radius: 12px; overflow: hidden;">

            <div class="card-header text-white text-center py-3" style="background-color: #f57c00;">
                <h4 class="mb-0">Lista de Centros</h4>
            </div>

            <div class="card-body p-4">

                <div class="mb-4">
                    <a href="{{ route('centros.create') }}"
                       class="btn text-white px-4"
                       style="background-color: #ef6c00;">
                        Registrar
                    </a>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>ID Centro</th>
                                <th>Nombre</th>
                                <th>Costo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($centros as $centro)
                                <tr>
                                    <td class="fw-bold">{{ $loop->iteration }}</td>
                                    <td>{{ $centro->id_centro }}</td>
                                    <td>{{ $centro->nom}}</td>
                                    <td>{{ $centro->costo }}</td>
                                    <td>
                                        <a href="{{ route('centros.edit', $centro->id_centro) }}"
                                           class="btn btn-warning btn-sm text-white">
                                            Editar
                                        </a>

                                        <form action="{{ route('centros.destroy', $centro->id_centro) }}"
                                              method="POST"
                                              style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('¿Seguro que deseas eliminar este centro?')">
                                                Borrar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No hay centros registrados</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection