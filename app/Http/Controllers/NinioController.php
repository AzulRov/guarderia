<?php

namespace App\Http\Controllers;

use App\Models\Ninio;
use Illuminate\Http\Request;

class NinioController extends Controller
{
    public function index()
    {
        $ninios = Ninio::all();

        $ninios = Ninio::join('personas', 'personas.id_persona', '=', 'ninios.id_persona')
    ->join('centros', 'centros.id_centro', '=', 'ninios.id_centro')
    ->select(
        'ninios.id_ninio',
        'ninios.matricula',
        'ninios.fecha',
        'personas.nom as persona',
        'centros.nom as centro'
    )
    ->get();
        
        return view('ninios.index', compact('ninios'));
    }

    public function create()
    {
        return view('ninios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'matricula' => 'required|unique:ninios,matricula',
            'fecha' => 'required',
            'id_persona' => 'required',
            'id_centro' => 'required',
        ]);

        Ninio::create([
            'matricula' => $request->matricula,
            'fecha' => $request->fecha,
            'id_persona' => $request->id_persona,
            'id_centro' => $request->id_centro,
        ]);

        return redirect()->route('ninios.index')
            ->with('success', 'Niño guardado correctamente');
    }

    public function edit($id)
    {
        $ninio = Ninio::findOrFail($id);
        return view('ninios.edit', compact('ninio'));
    }

    public function update(Request $request, $id)
    {
        $ninio = Ninio::findOrFail($id);

        $request->validate([
            'matricula' => 'required|unique:ninios,matricula,' . $id . ',id_ninio',
            'fecha' => 'required',
            'id_persona' => 'required',
            'id_centro' => 'required',
        ]);

        $ninio->update([
            'matricula' => $request->matricula,
            'fecha' => $request->fecha,
            'id_persona' => $request->id_persona,
            'id_centro' => $request->id_centro,
        ]);

        return redirect()->route('ninios.index')
            ->with('success', 'Niño actualizado correctamente');
    }

    public function destroy($id)
    {
        $ninio = Ninio::findOrFail($id);
        $ninio->delete();

        return redirect()->route('ninios.index')
            ->with('success', 'Niño eliminado correctamente');
    }
}