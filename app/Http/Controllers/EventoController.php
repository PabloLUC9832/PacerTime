<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Http\Requests\StoreEventoRequest;
use App\Http\Requests\UpdateEventoRequest;
use App\Models\SubEvento;

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

        $nInputs = (int) $request->clicks;

        //$subEvento = new SubEvento();
        //con foreach
        /*
        for ($i = 1; $i <= $nInputs; $i++) {
            $dis = "distancia{$i}";
            $subEvento = new SubEvento();
            $subEvento->distancia = $request->distancia+$i;
            $subEvento->categoria = $request->categoria+$i;
            $subEvento->precio = $request->precio+$i;
            $subEvento->rama = $request->rama+$i;
            //$subEvento->save();
            //var_dump($request->distancia);
            //var_dump($dis);
            //
        }
         */

        //$subEvento->save();


        /*
        $subEvento = new SubEvento();
        $subEvento->distancia = $request->distancia;
        $subEvento->categoria = $request->categoria;
        $subEvento->precio = $request->precio;
        $subEvento->rama = $request->rama;
*/
        //var_dump($request->clicks);
        //var_dump($nInputs);
        //var_dump($request->distancia1);
        //print_r($request);

        //for ($i = 1; $i <= $nInputs; $i++) {

        //arrayDistancias
            /*
            $subEvento = new SubEvento();
            foreach ($request->distancia as $dis){
                //$subEvento = new SubEvento();
                $subEvento->distancia = $dis;
            }

            foreach ($request->categoria as $cat){
                $subEvento->categoria = $cat;
            }

            foreach ($request->precio as $prec){
                $subEvento->precio = $prec;
            }

            foreach ($request->rama as $ram){
                $subEvento->rama = $ram;

                //var_dump($ram);
            }
            $subEvento->save();
            */

        //}
        /*
        foreach ($request->distancia as $dis){
            $subEvento = new SubEvento();
            $subEvento->distancia = $dis;
        }

        foreach ($request->categoria as $cat){
            $subEvento->categoria = $cat;
        }

        foreach ($request->precio as $prec){
            $subEvento->precio = $prec;
        }

        foreach ($request->rama as $ram){
            $subEvento->rama = $ram;

            //var_dump($ram);
        }
        $subEvento->save();
        */
        //$arrDis[] = [];
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

        array_map(function ($dist,$cate,$preci,$rama){

            $subEvento = new SubEvento();
            $subEvento->distancia = $dist;
            $subEvento->categoria = $cate;
            $subEvento->precio = $preci;
            $subEvento->rama = $rama;
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
