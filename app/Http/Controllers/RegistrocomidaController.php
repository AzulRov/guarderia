<?php

namespace App\Http\Controllers;

use App\Models\RegistroComida;
use App\Models\Ninio;
use App\Models\Plato;
use Illuminate\Http\Request;

class RegistroComidaController extends Controller
{
    public function index()
    {
        $registrocomidas = RegistroComida::all();
        $registrocomidas = RegistroComida::join('ninios', 'ninios.id_ninio', '=', 'registro_comidas.id_ninio')
        ->join('personas', 'personas.id_persona', '=', 'ninios.id_persona')
        ->join('platos', 'platos.id_plato', '=', 'registro_comidas.id_plato')
        ->select(
            'registro_comidas.id_registrocomida',
            'personas.nom as nino',
            'platos.nombre as plato',
            'registro_comidas.fecha',
            'registro_comidas.cantidad'
        )
        ->get();
        return view('registrocomidas.index', compact('registrocomidas'));
    }

    public function create()
    {
        return view('registrocomidas.create', [
            'ninios' => Ninio::all(),
            'platos' => Plato::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_nino' => 'required',
            'id_plato' => 'required',
            'fecha' => 'required|date',
            'cantidad' => 'required|numeric|min:1'
        ]);

        RegistroComida::create($request->all());

        return redirect()->route('registrocomidas.index')
            ->with('success', 'Registro guardado correctamente');
    }

    public function edit($id)
    {
        $registrocomida = RegistroComida::findOrFail($id);

        return view('registrocomidas.edit', [
            'registrocomida' => $registrocomida,
            'ninios' => Ninio::all(),
            'platos' => Plato::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_nino' => 'required',
            'id_plato' => 'required',
            'fecha' => 'required|date',
            'cantidad' => 'required|numeric|min:1'
        ]);

        $registrocomida = RegistroComida::findOrFail($id);
        $registrocomida->update($request->all());

        return redirect()->route('registrocomidas.index')
            ->with('success', 'Registro actualizado correctamente');
    }

    public function destroy($id)
    {
        $registrocomida = RegistroComida::findOrFail($id);
        $registrocomida->delete();

        return redirect()->route('registrocomidas.index')
            ->with('success', 'Registro eliminado correctamente');
    }
}
