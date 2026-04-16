@extends("layouts.template")

@section("content")

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-lg border-0">

            <div class="card-header text-white text-center" style="background-color: #f57c00;">
                <h4 class="mb-0">Lista de Alergias</h4>
            </div>

            <div class="row">
                <div class="col-2">
                    <a class="btn px-4 mt-4 ms-3 text-white"
                       style="background-color: #ef6c00;"
                       href="{{ url('alergias/create') }}">
                        Registrar
                    </a>
                </div>
            </div>

            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>ID Ingrediente</th>
                                <th>ID Niño</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($alergias as $alergia)
                                <tr>
                                    <td class="fw-bold">{{ $loop->index + 1 }}</td>
                                    <td>{{ $alergia->id_ingrediente }}</td>
                                    <td>{{ $alergia->id_ninio }}</td>
                                    <td>
                                        <a href="{{ route('alergias.edit', $alergia->id_alergia) }}"
                                           class="btn btn-warning btn-sm text-white">
                                            Editar
                                        </a>

                                        <form action="{{ route('alergias.destroy', $alergia->id_alergia) }}"
                                              method="POST"
                                              style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('¿Seguro que deseas eliminar esta alergia?')">
                                                Borrar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No hay alergias registradas</td>
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