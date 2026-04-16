<?php

namespace App\Http\Controllers;

use App\Models\Plato;
use Illuminate\Http\Request;

class PlatoController extends Controller
{
    public function index()
    {
        $platos = Plato::all();
        return view('platos.index', compact('platos'));
    }

    public function create()
    {
        return view('platos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric'
        ]);

        Plato::create($request->all());

        return redirect()->route('platos.index')
            ->with('success', 'Plato guardado');
    }

    public function edit($id)
    {
        $plato = Plato::findOrFail($id);
        return view('platos.edit', compact('plato'));
    }

    public function update(Request $request, $id)
    {
        $plato = Plato::findOrFail($id);

        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric'
        ]);

        $plato->update($request->all());

        return redirect()->route('platos.index')
            ->with('success', 'Plato actualizado');
    }

    public function destroy($id)
    {
        $plato = Plato::findOrFail($id);
        $plato->delete();

        return redirect()->route('platos.index')
            ->with('success', 'Plato eliminado');
    }
}