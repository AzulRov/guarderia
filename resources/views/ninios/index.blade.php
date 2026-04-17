@extends("layouts.template")

@section("content")

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow-lg border-0">

            <div class="card-header text-white text-center" style="background-color: #f57c00;">
                <h4 class="mb-0">Lista de Niños</h4>
            </div>

            <div class="row">
                <div class="col-3">
                    <a class="btn px-4 mt-4 ms-3 text-white"
                       style="background-color: #ef6c00;"
                       href="{{ route('ninios.create') }}">
                        Registrar
                    </a>
                </div>
            </div>

            <div class="card-body p-4">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover table-striped text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Matrícula</th>
                                <th>Fecha</th>
                                <th>ID Persona</th>
                                <th>ID Centro</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($ninios as $n)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $n->matricula }}</td>
                                <td>{{ $n->fecha }}</td>
                                <td>{{ $n->persona }}</td>
                                <td>{{ $n->centro }}</td>

                                <td>
                                    <a href="{{ route('ninios.edit', $n->id_ninio) }}"
                                       class="btn btn-warning btn-sm text-white">
                                        Editar
                                    </a>

                                    <form action="{{ route('ninios.destroy', $n->id_ninio) }}"
                                          method="POST"
                                          style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('¿Seguro que deseas eliminar este niño?')">
                                            Borrar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">No hay niños registrados</td>
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