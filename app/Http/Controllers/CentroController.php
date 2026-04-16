<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use Illuminate\Http\Request;

class CentroController extends Controller
{
    public function index()
    {
        $centros = Centro::all();
        return view('centros.index', compact('centros'));
    }

    public function create()
    {
        return view('centros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'nom' => 'required|unique:centros,nom',
        'costo' => 'required|numeric',
    ], [
        'nom.required' => 'El nombre es obligatorio',
        'nom.unique' => 'Ese centro ya existe',
        'costo.required' => 'El costo es obligatorio',
        ]);

        Centro::create([
            'nom' => $request->nom,
            'costo' => $request->costo,
        ]);

        return redirect()->route('centros.index')
            ->with('success', 'Centro registrado correctamente');
    }

    public function edit($id)
    {
        $centro = Centro::findOrFail($id);
        return view('centros.edit', compact('centro'));
    }

    public function update(Request $request, $id)
    {
        $centro = Centro::findOrFail($id);

        $request->validate([
            'nom' => 'required|unique:centros,nom,' . $id . ',id_centro',
            'costo' => 'required|numeric',
        ], [
            'nom.required' => 'El nombre es obligatorio',
            'nom.unique' => 'Ese centro ya existe',
            'costo.required' => 'El costo es obligatorio',
            'costo.numeric' => 'El costo debe ser numérico',
        ]);

        $centro->update([
            'nom' => $request->nom,
            'costo' => $request->costo,
        ]);

        return redirect()->route('centros.index')
            ->with('success', 'Centro actualizado correctamente');
    }

    public function destroy($id)
    {
        $centro = Centro::findOrFail($id);
        $centro->delete();

        return redirect()->route('centros.index')
            ->with('success', 'Centro eliminado correctamente');
    }
}