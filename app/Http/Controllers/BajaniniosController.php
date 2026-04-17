<?php

namespace App\Http\Controllers;

use App\Models\Bajaninios;
use App\Models\Ninio;
use Illuminate\Http\Request;

class BajaniniosController extends Controller
{
    public function index()
    {
        $bajas = Bajaninios::all();
        $bajas = Bajaninios::join('ninios', 'ninios.id_ninio', '=', 'bajaninios.id_ninio')
    ->join('personas', 'personas.id_persona', '=', 'ninios.id_persona')
    ->select(
        'bajaninios.id_baja',
        'personas.nom as ninio',
        'bajaninios.motivo',
        'bajaninios.fecha'
    )
    ->get();

        return view('bajaninios.index', compact('bajas'));
    }

    public function create()
    {
        $ninios = Ninio::all();
        return view('bajaninios.create', compact('ninios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_ninio' => 'required',
            'motivo' => 'required',
            'fecha' => 'required',
        ]);

        Bajaninios::create($request->all());

        return redirect()->route('bajaninios.index')
            ->with('success', 'Baja registrada correctamente');
    }

    public function edit($id)
    {
        $baja = Bajaninios::findOrFail($id);
        $ninios = Ninio::all();

        return view('bajaninios.edit', compact('baja', 'ninios'));
    }

    public function update(Request $request, $id)
    {
        $baja = Bajaninios::findOrFail($id);

        $request->validate([
            'id_ninio' => 'required',
            'motivo' => 'required',
            'fecha' => 'required',
        ]);

        $baja->update($request->all());

        return redirect()->route('bajaninios.index')
            ->with('success', 'Baja actualizada');
    }

    public function destroy($id)
    {
        $baja = Bajaninios::findOrFail($id);
        $baja->delete();

        return redirect()->route('bajaninios.index')
            ->with('success', 'Baja eliminada');
    }
}