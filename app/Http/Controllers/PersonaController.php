<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Http\Requests\StorePersonaRequest;
use App\Http\Requests\UpdatePersonaRequest;
use Inertia\Inertia;
class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personas = Persona::with('grupos')->get();
        return Inertia::render('Personas/Index', [
            'personas' => $personas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Personas/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePersonaRequest $request)
    {
        Persona::create($request->validated());
        return redirect()->route('personas.index')
            ->with('success', 'Persona creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Persona $persona)
    {
        return Inertia::render('Personas/Show', [
            'persona' => $persona
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Persona $persona)
    {
        return Inertia::render('Personas/Edit', [
            'persona' => $persona
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePersonaRequest $request, Persona $persona)
    {
        $persona->update($request->validated());
        return redirect()->route('personas.index')
            ->with('success', 'Persona actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Persona $persona)
    {
        $persona->delete();
        return redirect()->route('personas.index')
            ->with('success', 'Persona eliminada exitosamente');
    }
}
