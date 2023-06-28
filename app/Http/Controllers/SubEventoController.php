<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\SubEvento;
use App\Http\Requests\StoreSubEventoRequest;
use App\Http\Requests\UpdateSubEventoRequest;

class SubEventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubEventoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SubEvento $subEvento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubEvento $subEvento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubEventoRequest $request, SubEvento $subEvento)
    {
        //
    }

    public function delete(Evento $evento)
    {
        return view ('subevento.delete',compact('evento'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubEvento $subEvento)
    {
        //
        $subEvento->delete();
        return back()->with('message','La categoría, distancia, rama y precio han sido eliminadas exitosamente.');
    }
}
