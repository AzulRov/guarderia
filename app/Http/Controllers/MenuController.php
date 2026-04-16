<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Plato;
use App\Models\Ingrediente;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $menus = Menu::with(['plato', 'ingrediente'])->get();
    return view('menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('menus.create', [
            'platos' => Plato::all(),
            'ingredientes' => Ingrediente::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Menu::create($request->all());

        return redirect()->route('menus.index')
            ->with('success', 'Menú registrado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
