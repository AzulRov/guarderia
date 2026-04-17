<?php

namespace App\Http\Controllers;

use App\Models\Alergia;
use App\Models\Ingrediente;
use App\Models\Ninio;
use Illuminate\Http\Request;

class AlergiaController extends Controller
{
    public function index()
    {
        $alergias = Alergia::all();

        $alergias = Alergia::join('ingredientes', 'ingredientes.id_ingrediente', '=', 'alergias.id_ingrediente')
        ->join('ninios', 'ninios.id_ninio', '=', 'alergias.id_ninio')
        ->join('personas', 'personas.id_persona', '=', 'ninios.id_persona')
        ->select(
            'alergias.id_alergia',
            'ingredientes.nombre as ingrediente',
            'personas.nom as ninio'
        )
        ->get();

    return view('alergias.index', compact('alergias'));
    }

    public function create()
    {
        return view('alergias.create', [
            'ingredientes' => Ingrediente::all(),
            'ninios' => Ninio::all()
        ]);
    }

    public function store(Request $request)
    {
        Alergia::create([
            'id_ingrediente' => $request->id_ingrediente,
            'id_ninio' => $request->id_ninio,
        ]);

        return redirect()->route('alergias.index')
            ->with('success', 'Alergia registrada');
    }

    public function edit($id)
    {
        $alergia = Alergia::findOrFail($id);

        return view('alergias.edit', [
            'alergia' => $alergia,
            'ingredientes' => Ingrediente::all(),
            'ninios' => Ninio::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $alergia = Alergia::findOrFail($id);

        $alergia->update([
            'id_ingrediente' => $request->id_ingrediente,
            'id_ninio' => $request->id_ninio,
        ]);

        return redirect()->route('alergias.index')
            ->with('success', 'Alergia actualizada');
    }

    public function destroy($id)
    {
        $alergia = Alergia::findOrFail($id);
        $alergia->delete();

        return redirect()->route('alergias.index')
            ->with('success', 'Alergia eliminada');
    }
}