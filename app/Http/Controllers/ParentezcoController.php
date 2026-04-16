<?php

namespace App\Http\Controllers;

use App\Models\Parentezco;
use Illuminate\Http\Request;

class ParentezcoController extends Controller
{
    public function index()
    {
        $parentezcos = Parentezco::all();
        return view('parentezcos.index', compact('parentezcos'));
    }

    public function create()
    {
        return view('parentezcos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100'
        ]);

        Parentezco::create([
            'nombre' => $request->nombre
        ]);

        return redirect()->route('parentezcos.index')
            ->with('success', 'Parentezco registrado correctamente');
    }

    public function edit(Parentezco $parentezco)
    {
        return view('parentezcos.edit', compact('parentezco'));
    }

    public function update(Request $request, Parentezco $parentezco)
    {
        $request->validate([
            'nombre' => 'required|string|max:100'
        ]);

        $parentezco->update([
            'nombre' => $request->nombre
        ]);

        return redirect()->route('parentezcos.index')
            ->with('success', 'Parentezco actualizado correctamente');
    }

    public function destroy(Parentezco $parentezco)
    {
        $parentezco->delete();

        return redirect()->route('parentezcos.index')
            ->with('success', 'Parentezco eliminado correctamente');
    }
}