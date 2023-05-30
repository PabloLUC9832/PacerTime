<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Http\Requests\StoreEventoRequest;
use App\Http\Requests\UpdateEventoRequest;
use App\Models\SubEvento;
use Illuminate\Support\Facades\DB;

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
        $evento->nombre = $request->nombre;
        $evento->descripcion = $request->descripcion ;
        $evento->lugarEvento = $request->lugarEvento;
        $evento->fechaInicioEvento = $request->fechaInicioEvento;
        $evento->fechaFinEvento = $request->fechaFinEvento;
        $evento->horaEvento = $horaInicioEvento ; //cehcar
        $evento->lugarEntregaKits = $request->lugarEntregaKits ;
        $evento->fechaInicioEntregaKits = $request->fechaInicioEntregaKits ;
        $evento->fechaFinEntregaKits = $request->fechaFinEntregaKits ;
        $evento->horaInicioEntregaKits = $horaInicioEntregaKits ;
        $evento->horaFinEntregaKits = $horaFinEntregaKits ;
        $evento->imagen = $request->file ;

        $evento->save();

        //Para MySql
        $lastID = DB::select("SELECT LAST_INSERT_ID('eventos')");
        $myArr = get_object_vars($lastID[0]);
        $arrayValor = array_values($myArr);
        $valor = implode("",$arrayValor);
        $idActual = $valor+1;
        //print_r($idActual);
        //die();
        //Para SQLServer
        /*
        $lastID = DB::select("SELECT IDENT_CURRENT('eventos')");
        $myArr = get_object_vars($lastID[0]);
        $oo = $myArr[""];
        $ulti = $oo + 1;
         */

        foreach ($request->distancia as $dis){
            $arrDis[] = $dis;
            $nueArrDis = array_slice($arrDis,1);
            //var_dump($arrDis);
        }
        //var_dump($arrDis);
        foreach ($request->categoria as $cat){
            $arrCat[] = $cat;
            $nueArrCat = array_slice($arrCat,1);
        }

        foreach ($request->precio as $prec){
            $arrPrec[] = $prec;
            $nueArrPrec = array_slice($arrPrec,1);
        }

        foreach ($request->rama as $ram){
            $arrRam[] = $ram;
            $nueArrRam = array_slice($arrRam,1);
        }
        //print_r($nue);

        array_map(function ($dist,$cate,$preci,$rama) use($idActual){

            $subEvento = new SubEvento();
            $subEvento->distancia = $dist;
            $subEvento->categoria = $cate;
            $subEvento->precio = $preci;
            $subEvento->rama = $rama;
            $subEvento->evento_id = $idActual;
            $subEvento->save();


//            var_dump($dist);
        },$nueArrDis,$nueArrCat,$nueArrPrec,$nueArrRam);


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
}
