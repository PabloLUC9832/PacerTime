<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Http\Requests\StoreEventoRequest;
use App\Http\Requests\UpdateEventoRequest;
use App\Models\SubEvento;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class EventoController extends Controller
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
        return view('evento.create');
        //return view('evento.prueba');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventoRequest $request)
    {

        $horaInicioEvento = $request->horaEvento . ":" . $request->minutoEvento. " " . $request->periodoEvento ;
        $horaInicioEntregaKits = $request->horaInicioEntregaKits . ":" . $request->minutoInicioEntregaKits. " " . $request->periodoInicioEntregaKits ;
        $horaFinEntregaKits = $request->horaFinEntregaKits . ":" . $request->minutoFinEntregaKits. " " . $request->periodoFinEntregaKits ;

        $evento = new Evento();
        $evento->nombre = strtoupper($request->nombre);
        $evento->descripcion = $request->descripcion ;
        $evento->lugarEvento = $request->lugarEvento;
        $evento->fechaInicioEvento = $request->fechaInicioEvento;
        $evento->fechaFinEvento = $request->fechaFinEvento;
        $evento->horaEvento = $horaInicioEvento ;
        $evento->lugarEntregaKits = $request->lugarEntregaKits ;
        $evento->fechaInicioEntregaKits = $request->fechaInicioEntregaKits ;
        $evento->fechaFinEntregaKits = $request->fechaFinEntregaKits ;
        $evento->horaInicioEntregaKits = $horaInicioEntregaKits ;
        $evento->horaFinEntregaKits = $horaFinEntregaKits ;
        //$evento->imagen = $request->file ;
        //$evento->imagen = $nameFiles ;

        if($request->hasFile('files')){

            $directory="evento-".$request->nombre;
            $evento->imagen = $directory;

            Storage::makeDirectory($directory);
            foreach($request->file('files') as $file){
                $fileName = time() ."_" . $file->getClientOriginalName();
                //$nameFiles .= $fileName . "-";
                $file->storeAs('/'.$directory.'/', $fileName, 'azure');
            }

        }else{
            $evento->imagen = "Indisponible";
        }

        $evento->save();



        $ultimoID = DB::table('eventos')
                      //->select('id')
                      ->orderBy('id','desc')
                      ->take(1)
                      //->get();
                      ->pluck('id')->toArray();

        $valor = (int) implode("",$ultimoID);


        $valoresCategoria = $this->inputsArray($request->categoria);
        $valoresDistancia = $this->inputsArray($request->distancia);
        $valoresUnidadDistancia = $this->inputsArray($request->unidadDistancia);
        $valoresRama = $this->inputsArray($request->rama);
        $valoresPrecio = $this->inputsArray($request->precio);


        array_map(function ($cate,$dist,$unidDist,$rama,$precio) use($valor){

            $subEvento = new SubEvento();
            $subEvento->distancia = $dist . " " . $unidDist;
            $subEvento->categoria = strtoupper($cate);
            $subEvento->precio = $precio;
            $subEvento->rama = $rama;
            $subEvento->evento_id = $valor;
            //$subEvento->evento_id = 1;
            $subEvento->save();

        },$valoresCategoria,$valoresDistancia,$valoresUnidadDistancia,$valoresRama,$valoresPrecio);

    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento $evento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventoRequest $request, Evento $evento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento)
    {
        //
    }

    protected function inputsArray($inputs){

        foreach ($inputs as $input){

            $arrayValores[] = $input;
            if ($arrayValores[0] == NULL){
                $nuevoArray = array_slice($arrayValores,1);
            }else{
                $nuevoArray = $arrayValores;
            }

        }
        return $nuevoArray;
    }


}
