<?php

namespace App\Http\Controllers;

use App\Models\Ingrediente;
use Illuminate\Http\Request;

class IngredienteController extends Controller
{
    public function index()
    {
        $ingredientes = Ingrediente::all();
        $ingredientes = Ingrediente::orderBy('id_ingrediente', 'asc')->get();
        return view('ingredientes.index', compact('ingredientes'));
    }

    public function create()
    {
        return view('ingredientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:ingredientes,nombre',
        ], [
            'nombre.required' => 'El nombre es obligatorio',
            'nombre.unique' => 'Ese ingrediente ya existe',
        ]);

        // GUARDAR
Ingrediente::create([
    'nombre' => $request->nombre,
]);
    $ingrediente->update([
    'nombre' => $request->nombre, 
        ]);

        return redirect()->route('ingredientes.index')
            ->with('success', 'Ingrediente registrado correctamente');
    }

    public function edit($id)
    {
        $ingrediente = Ingrediente::findOrFail($id);
        return view('ingredientes.edit', compact('ingrediente'));
    }

    public function update(Request $request, $id)
    {
        $ingrediente = Ingrediente::findOrFail($id);

        $request->validate([
            'nombre' => 'required|unique:ingredientes,nombre,' . $id . ',id_ingrediente',
        ], [
            'nombre.required' => 'El nombre es obligatorio',
            'nombre.unique' => 'Ese ingrediente ya existe',
        ]);

        $ingrediente->update([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('ingredientes.index')
            ->with('success', 'Ingrediente actualizado correctamente');
    }

    public function destroy($id)
    {
        $ingrediente = Ingrediente::findOrFail($id);
        $ingrediente->delete();

        return redirect()->route('ingredientes.index')
            ->with('success', 'Ingrediente eliminado correctamente');
    }
}