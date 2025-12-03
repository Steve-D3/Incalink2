<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Http\Requests\StoreGrupoRequest;
use App\Http\Requests\UpdateGrupoRequest;
use Inertia\Inertia;
class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grupos = Grupo::with('menus')->withCount('personas')->get();
        return Inertia::render('Grupos/Index', [
            'grupos' => $grupos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Grupos/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGrupoRequest $request)
    {
        Grupo::create($request->validated());
        return redirect()->route('grupos.index')
            ->with('success', 'Grupo creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Grupo $grupo)
    {
        return Inertia::render('Grupos/Show', [
            'grupo' => $grupo->load('menus')->loadCount('personas')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grupo $grupo)
    {
        return Inertia::render('Grupos/Edit', [
            'grupo' => $grupo
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGrupoRequest $request, Grupo $grupo)
    {
        $grupo->update($request->validated());
        return redirect()->route('grupos.index')
            ->with('success', 'Grupo actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grupo $grupo)
    {
        $grupo->delete();
        return redirect()->route('grupos.index')
            ->with('success', 'Grupo eliminado exitosamente');
    }
}
