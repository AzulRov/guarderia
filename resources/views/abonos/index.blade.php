@extends("layouts.template")

@section("content")

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-lg border-0">

            <!-- Header -->
            <div class="card-header bg-primary text-white text-center">
                <h4 class="mb-0">Lista de Abonos</h4>
            </div>

            <!-- Botón Registrar -->
            <div class="row">
                <div class="col-2">
                    <a class="btn btn-success px-4 mt-4 ms-3"
                       href="{{ url('abonos/create') }}">
                        Registrar
                    </a>
                </div>
            </div>

            <!-- Tabla -->
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle text-center">

                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>ID Abono</th>
                                <th>Cantidad</th>
                                <th>Fecha</th>
                                <th>ID Cuenta</th>
                                <th>Familiar</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($abonos as $abono)
                                <tr>
                                    <td class="fw-bold">{{ $loop->index + 1 }}</td>
                                    <td>{{ $abono->id_abono }}</td>
                                    <td>{{ $abono->cantidad }}</td>
                                    <td>{{ $abono->fecha }}</td>
                                    <td>{{ $abono->nom }}</td>
                                    <td>{{$abono->familiar}}</td>
                                    

                                    <td>
                                        <!-- Editar -->
                                        <a class="btn btn-warning px-3"
                                           href="{{ route('abonos.edit', $abono->id_abono) }}">
                                            Editar
                                        </a>

                                        <!-- Eliminar -->
                                        <form action="{{ route('abonos.destroy', $abono->id_abono) }}"method="POST" style="display:inline-block;">
                                
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger px-3">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            @if($abonos->isEmpty())
                                <tr>
                                    <td colspan="6">No hay abonos registrados</td>
                                </tr>
                            @endif
                        </tbody>

                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection