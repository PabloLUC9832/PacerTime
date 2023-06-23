<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Http\Requests\StoreEventoRequest;
use App\Http\Requests\UpdateEventoRequest;
use App\Models\SubEvento;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        /*
        $eventos = DB::table('eventos')
                   ->get();
        */

        $eventos = Evento::with('subEventos')->get();

        //dd($eventos);

        return view('evento.index',compact('eventos'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('evento.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventoRequest $request)
    {

        /*
         * Se concatenan los request de hora,minuto y periodo para guardar la hora completa
         */

        $horaInicioEvento = $request->horaEvento . ":" . $request->minutoEvento. " " . $request->periodoEvento ;
        $horaInicioEntregaKits = $request->horaInicioEntregaKits . ":" . $request->minutoInicioEntregaKits. " " . $request->periodoInicioEntregaKits ;
        $horaFinEntregaKits = $request->horaFinEntregaKits . ":" . $request->minutoFinEntregaKits. " " . $request->periodoFinEntregaKits ;

        /*
         * Se guarda el evento
         */
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

        /*
         * Se verifica si hay archivos. Si los hay, el nombre de la carpeta en Azure es el dato que va a la
         * columna de la tabla, se crea la carpeta   y  las imagenes se guardan el la carpeta en Azure.
         *
         */

        if($request->hasFile('files')){

            $directory="evento-".$request->nombre;
            $evento->imagen = $directory;

            Storage::makeDirectory($directory);
            foreach($request->file('files') as $file){
                $fileName = time() ."_" . $file->getClientOriginalName();
                $file->storeAs('/'.$directory.'/', $fileName, 'azure');
            }

        }else{
            $evento->imagen = "Indisponible";
        }

        $evento->save();


        /*
         * Se consulta el ultimo id de evento registrado para que se relacione con las categorias /Sub eventos
         * que estan por registrarse
         */
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

        /*
         * El metoodo array map aplica la función a los elementos de los arrays dados.
         * iterara por los elementos, haciendo lo de la función.
         * Así logrando guardar cada categoría.
         */
        array_map(function ($cate,$dist,$unidDist,$rama,$precio) use($valor){

            $subEvento = new SubEvento();
            $subEvento->distancia = $dist . " " . $unidDist;
            $subEvento->categoria = strtoupper($cate);
            $subEvento->precio = $precio;
            $subEvento->rama = $rama;
            $subEvento->evento_id = $valor;
            $subEvento->save();

        },$valoresCategoria,$valoresDistancia,$valoresUnidadDistancia,$valoresRama,$valoresPrecio);

        return redirect()->route('eventos.index')->with('message','El evento ha sido agregado exitosamente.');


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
        //$tiempo = list($hora,$minuto,$periodo);
        $tiempoE = $this->horMinPer($evento->horaEvento);
        $tiempoIEK = $this->horMinPer($evento->horaInicioEntregaKits);
        $tiempoFEK = $this->horMinPer($evento->horaFinEntregaKits);

        return view ('evento.edit',compact('evento','tiempoE','tiempoIEK','tiempoFEK'));
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
    //public function destroy($id)
    {
        //
        //$evento = Evento::findOrFail($id);

        $evento->delete();

        return redirect()->route('eventos.index')->with('message','El evento ha sido eliminado exitosamente.');
        //return redirect()->route('eventos.index');

    }

    /**
     * Función que toma como parametro los inputs request de tipo array.
     * Lo que hace es iterar los request entonces si el indice 0 es igual null
     * con la función quita una posición. Evitando así un error de envio de
     * datos nulos al enviar el Form.
     * Se usa para la sección de Categorías del evento pues, si el usuario se le olvida
     * presionar el botón de Añadir categoría, aún así se envie los datos de la categoría.
     * Y si presiona el botón de Añadir categoría y así poner los datos en la lista, entonces los
     * inputs quedan vacios por lo que el required no lo solucionaba. Entonces al quedar los inputs vacios
     * la posición 0 queda vacia y es cuando hace el array_slice.
     *
     * @see resources/views/evento/create.blade.php
     * @param $inputs
     * @return array
     */
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

    protected function horMinPer($horaCom) : array{

        if ($horaCom != null){
            $hora = explode(":",$horaCom);
            $min = explode(" ",$hora[1]);
            $periodo = explode(" ",$horaCom);

        }else{
            $hora[0] = "--";
            $min[0] = "--";
            $periodo[1] = "--";

        }

        return [$hora[0],$min[0],$periodo[1]];
    }

}
