<?php

namespace App\Http\Controllers;

use App\Models\Familiar;
use App\Models\Persona;
use App\Models\Parentezco;
use App\Models\Ninio;
use Illuminate\Http\Request;

class FamiliarController extends Controller
{
    public function index()
    {
        $familiares = Familiar::with(['persona', 'parentezco', 'ninio'])->get();
        return view('familiares.index', compact('familiares'));
    }

    public function create()
    {
        $personas = Persona::all();
        $parentezcos = Parentezco::all();
        $ninios = Ninio::all();

        return view('familiares.create', compact('personas', 'parentezcos', 'ninios'));
    }

    public function store(Request $request)
    {
        Familiar::create([
            'id_persona' => $request->id_persona,
            'DNI' => $request->DNI,
            'dir' => $request->dir,
            'id_parentezco' => $request->id_parentezco,
            'id_ninio' => $request->id_ninio
        ]);

        return redirect()->route('familiares.index')
            ->with('success', 'Familiar registrado correctamente');
    }

    public function edit(Familiar $familiar)
    {
        $personas = Persona::all();
        $parentezcos = Parentezco::all();
        $ninios = Ninio::all();

        return view('familiares.edit', compact('familiar', 'personas', 'parentezcos', 'ninios'));
    }

    public function update(Request $request, Familiar $familiar)
    {
        $familiar->update([
            'id_persona' => $request->id_persona,
            'DNI' => $request->DNI,
            'dir' => $request->dir,
            'id_parentezco' => $request->id_parentezco,
            'id_ninio' => $request->id_ninio
        ]);

        return redirect()->route('familiares.index')
            ->with('success', 'Familiar actualizado correctamente');
    }

    public function destroy(Familiar $familiar)
    {
        $familiar->delete();

        return redirect()->route('familiares.index')
            ->with('success', 'Familiar eliminado correctamente');
    }
}