<?php

namespace App\Http\Controllers;

use App\Models\Competidor;
use App\Http\Requests\StoreCompetidorRequest;
use App\Http\Requests\UpdateCompetidorRequest;
use App\Models\Evento;
use Illuminate\Support\Facades\Storage;

class CompetidorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $eventos = Evento::all();
        //$evento = Evento::find(2);
        //Storage::disk('azure');
        //$contents = Storage::get("evento-BACKVARD ULTRA HUATUSCO NIGHT TRAIL RUNNING");
        //$contents = Storage::disk('azure')->files('evento-BACKVARD ULTRA HUATUSCO NIGHT TRAIL RUNNING');
        //dd(Storage::disk('azure')->exists('evento-BACKVARD ULTRA HUATUSCO NIGHT TRAIL RUNNING/icon2.png'));
        //dd($contents[1]);
        //die();
        /*
        foreach ($eventos as $evento){
            $contents = Storage::disk('azure')->files($evento->imagen);
            $imagesEvent[] = $contents;
        }*/
        //$url = Storage::disk('azure')->url('evento-BACKVARD ULTRA HUATUSCO NIGHT TRAIL RUNNING/icon2.png');
        //dd($url);
        //dd($imagesEvent);

        foreach ($eventos as $evento){
            $urls[] = $this->getImages($evento->imagen);
            //$urls2[] = $urls;
        }

        //$urls = $this->getImages();

        //dd($urls);
        //die();

        return view('competidor.index',compact('eventos','urls'));
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
    public function store(StoreCompetidorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    //public function show(Competidor $competidor)
    public function show(Evento $evento)
    {
        //
        $imagenes = $this->getImages($evento->imagen);
        return view('competidor.show',compact('evento','imagenes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Competidor $competidor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompetidorRequest $request, Competidor $competidor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Competidor $competidor)
    {
        //
    }

    public function getImages($folder)
    {
        /*
        return collect(Storage::files($directory))->map(function($file) {
            return Storage::url($file);
        })*/
        //$archivos = [];
        //return collect(Storage::disk('azure')->files("evento-BACKVARD ULTRA HUATUSCO NIGHT TRAIL RUNNING"))->map(function ($file){
        return collect(Storage::disk('azure')->files($folder))->map(function ($file){
            return  Storage::disk('azure')->url($file);
        });
        /*
        array_map(function ($carpeta){

        },$eventos);
        */

        //return $archivos;
    }

}
