<?php

namespace App\Http\Controllers;

use App\Models\Abono;
use Illuminate\Http\Request;

class AbonoController extends Controller
{
    public function index()
    {
        $abonos = Abono::all();
        //
        /**
         *
         * SELECT
         * abonos.cantidad, abonos.fecha, personas.nom, registro_cuentas.cuenta
         * FROM abonos, registro_cuentas, familiares, ninios, personas
         * WHERE abonos.id_regcuenta = registro_cuentas.id_regcuenta
         * AND registro_cuentas.id_fam = familiares.id_fam
         * AND familiares.id_ninio = ninios.id_ninio
         * AND ninios.id_persona = personas.id_persona;
         */
        $abonos = Abono::join("registro_cuentas","registro_cuentas.id_regcuenta","abonos.id_regcuenta")
        ->join("familiares","familiares.id_fam", "registro_cuentas.id_fam")
        ->join("ninios","ninios.id_ninio","familiares.id_ninio")
        ->join("personas","personas.id_persona", "ninios.id_persona")
            ->select("abonos.id_abono","abonos.cantidad","abonos.fecha","personas.nom", "registro_cuentas.cuenta")
        ->get();
        return view('abonos.index', compact('abonos')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("abonos.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Abono::create($request->all());

    return redirect()->route('abonos.index')
        ->with('success', 'Abono registrado correctamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(Abono $abono)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Abono $abono)
    {
        //
        return view('abonos.edit', compact('abono'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Abono $abono)
    {
        $abono->update($request->all());
        return redirect()->route('abonos.index')
        ->with('success', 'Abono actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Abono $abono)
    {
        //
        $abono->delete();

    return redirect()->route('abonos.index')
        ->with('success', 'Abono eliminado correctamente');
    }
}
