<?php

namespace App\Http\Controllers;

use App\Models\Competidor;
use App\Http\Requests\StoreCompetidorRequest;
use App\Http\Requests\UpdateCompetidorRequest;
use App\Models\Evento;
use App\Models\SubEvento;
use Illuminate\Support\Facades\Storage;
use MercadoPago\Item;
use MercadoPago\Preference;
use MercadoPago\SDK;

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
    public function create(Evento $evento)
    {



        return view('competidor.create',compact('evento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompetidorRequest $request)
    {

        $subEv = SubEvento::find($request->categoria);
        $evento = Evento::find($subEv->evento_id);

        $nombreC = $request->nombre . " " . $request->apellido;
        $telefono = $request->telefono;


        SDK::setAccessToken(config('services.mercadopago.token'));
        // Crea un objeto de preferencia
        $preference = new Preference();
        // Crea un ítem en la preferencia
        $item = new Item();
        $item->title = "Inscripción al evento {$evento->nombre} a la categoría {$subEv->categoria}, con distancia: {$subEv->distancia} a la rama: {$subEv->rama}" ;
        $item->quantity = 1;
        $item->unit_price = $subEv->precio;

        $preference->back_urls = array(
            /*
            "success" => redirect()->route('competidor.index')->with('status','¡Felicidades has sido inscrito correctamente! Nos vemos en la linea de meta.'),
            "failure" => redirect()->route('competidor.index')->with('status','Lo sentimos ha ocurrido un error. Intenta nuevamente tu pago'),
            "pending" =>
             redirect()->route('competidor.index')->with('status','En cuanto tu pago sea aprobado serás notificado vía email.'),
            */

            "success" => route('competidor.index'),
            "failure" => route('competidor.index'),
            "pending" => route('competidor.index'),

        );
        $preference->auto_return = "approved";

        $preference->items = array($item);
        $preference->save();

        return view('competidor.pago',compact('preference','nombreC'));

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
        if($folder == "Indisponible"){
            return ["https://pacertime.blob.core.windows.net/files/imagen-no-disponible.png"];
        }else{
            return collect(Storage::disk('azure')->files($folder))->map(function ($file){
                return  Storage::disk('azure')->url($file);
            });
        }
    }




}
