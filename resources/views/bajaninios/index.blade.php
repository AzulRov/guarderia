@extends("layouts.template")

@section("content")

<div class="row justify-content-center mt-4">
    <div class="col-md-10">
        <div class="card shadow-lg border-0" style="border-radius: 12px; overflow: hidden;">

            <div class="card-header text-white text-center py-3" style="background-color: #f57c00;">
                <h4 class="mb-0">Lista de Bajas de Niños</h4>
            </div>

            <div class="card-body p-4">

                <div class="mb-4">
                    <a href="{{ route('bajaninios.create') }}"
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
                    <table class="table table-hover table-striped text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>ID Baja</th>
                                <th>ID Niño</th>
                                <th>Motivo</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($bajas as $baja)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $baja->id_baja }}</td>
                                    <td>{{ $baja->id_ninio }}</td>
                                    <td>{{ $baja->motivo }}</td>
                                    <td>{{ $baja->fecha }}</td>
                                    <td>
                                        <a href="{{ route('bajaninios.edit', $baja->id_baja) }}"
                                           class="btn btn-warning btn-sm text-white">
                                            Editar
                                        </a>

                                        <form action="{{ route('bajaninios.destroy', $baja->id_baja) }}"
                                              method="POST"
                                              style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"
                                                    onclick="return confirm('¿Eliminar baja?')">
                                                Borrar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No hay bajas registradas</td>
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