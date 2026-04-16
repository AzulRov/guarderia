<?php

namespace App\Http\Controllers;

use App\Models\RegistrarCuenta;
use App\Models\Familiar;
use Illuminate\Http\Request;

class RegistrarcuentasController extends Controller
{
    public function index()
    {
        $registrarcuentas = RegistrarCuenta::all();
        return view('registrarcuentas.index', compact('registrarcuentas'));
    }

    public function create()
    {
        $familiares = Familiar::all();
        return view('registrarcuentas.create', compact('familiares'));
    }

   public function store(Request $request)
{
    Registrarcuenta::create([
        'id_fam' => $request->id_fam,
        'cuenta' => $request->cuenta
    ]);

    return redirect()->route('registrarcuentas.index')
        ->with('success', 'Cuenta registrada correctamente');
}
    public function edit(RegistrarCuenta $registrarcuenta)
    {
        $familiares = Familiar::all();
        return view('registrarcuentas.edit', compact('registrarcuenta', 'familiares'));
    }

    public function update(Request $request, RegistrarCuenta $registrarcuenta)
    {
        $registrarcuenta->update($request->all());

        return redirect()->route('registrarcuentas.index')
            ->with('success', 'Cuenta actualizada correctamente');
    }

    public function destroy(RegistrarCuenta $registrarcuenta)
    {
        $registrarcuenta->delete();

        return redirect()->route('registrarcuentas.index')
            ->with('success', 'Cuenta eliminada correctamente');
    }
}