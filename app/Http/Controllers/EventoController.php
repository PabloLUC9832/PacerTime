<?php

namespace App\Http\Controllers;

use App\Models\Competidor;
use App\Models\Evento;
use App\Http\Requests\StoreEventoRequest;
use App\Http\Requests\UpdateEventoRequest;
use App\Models\SubEvento;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $search = trim($request->search);
        $eventDeleted = $request->deleted;

        if(!isset($eventDeleted)){

            Cache::forget('deleted');

            $eventos = Evento::with('subEventos')
                ->where('nombre','like',"%{$search}%")
                ->orWhere('descripcion','like',"%{$search}%")
                ->orWhere('lugarEvento','like',"%{$search}%")
                ->orWhere('fechaInicioEvento','like',"%{$search}%")
                ->orWhere('fechaFinEvento','like',"%{$search}%")
                ->orWhere('horaEvento','like',"%{$search}%")
                ->orWhere('lugarEntregaKits','like',"%{$search}%")
                ->orWhere('fechaInicioEntregaKits','like',"%{$search}%")
                ->orWhere('fechaFinEntregaKits','like',"%{$search}%")
                ->orWhere('horaInicioEntregaKits','like',"%{$search}%")
                ->orWhere(function ($query) use ($search){
                    $query->whereHas('subEventos',function ($q) use ($search){
                        $q->where('distancia','like',"%{$search}%")
                            ->orWhere('categoria','like',"%{$search}%")
                            ->orWhere('precio','like',"%{$search}%")
                            ->orWhere('rama','like',"%{$search}%");
                    });
                })
                ->paginate(12)
                ->withQueryString();
        }else{

            Cache::put("deleted", $eventDeleted);

            $eventos = Evento::onlyTrashed()
                ->where(function ($query) use ($search){
                    $query->where('nombre','like',"%{$search}%")
                        ->orWhere('descripcion','like',"%{$search}%")
                        ->orWhere('lugarEvento','like',"%{$search}%")
                        ->orWhere('fechaInicioEvento','like',"%{$search}%")
                        ->orWhere('fechaFinEvento','like',"%{$search}%")
                        ->orWhere('horaEvento','like',"%{$search}%")
                        ->orWhere('lugarEntregaKits','like',"%{$search}%")
                        ->orWhere('fechaInicioEntregaKits','like',"%{$search}%")
                        ->orWhere('fechaFinEntregaKits','like',"%{$search}%")
                        ->orWhere('horaInicioEntregaKits','like',"%{$search}%")
                        ->orWhere(function ($query) use ($search){
                            $query->whereHas('subEventos',function ($q) use ($search){
                                $q->where('distancia','like',"%{$search}%")
                                    ->orWhere('categoria','like',"%{$search}%")
                                    ->orWhere('precio','like',"%{$search}%")
                                    ->orWhere('rama','like',"%{$search}%");
                            });
                        });
                })
                ->paginate(12)
                ->withQueryString();

        }

        if (!empty(count($eventos))){
            foreach ($eventos as $evento){
                $urls[] = $this->getImages($evento->imagen);
            }
        }else{
            $urls[] = "https://pacertime.blob.core.windows.net/files/imagen-no-disponible.png";
        }

        return view('evento.index',compact('eventos','search','urls'));

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

        $slug = Str::slug(strtolower($request->nombre),'-');

        if($request->hasFile('files')){

            $directory="evento-" . $slug;
            $evento->imagen = $directory;

            Storage::makeDirectory($directory);
            foreach($request->file('files') as $file){
                $fileName = time() ."_" . $file->getClientOriginalName();
                $file->storeAs('/'.$directory.'/', $fileName, 'azure');
            }

        }else{
            $evento->imagen = "Indisponible";
        }

        $evento->slug = $slug;
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

        //dd([$request->categoria,$valoresCategoria,$valoresDistancia]);
        //die();
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

        $horaInicioEvento = $request->horaEvento . ":" . $request->minutoEvento. " " . $request->periodoEvento ;
        $horaInicioEntregaKits = $request->horaInicioEntregaKits . ":" . $request->minutoInicioEntregaKits. " " . $request->periodoInicioEntregaKits ;
        $horaFinEntregaKits = $request->horaFinEntregaKits . ":" . $request->minutoFinEntregaKits. " " . $request->periodoFinEntregaKits ;

        if($request->hasFile('files')){

            $directory="evento-".$request->nombre;
            $evento->imagen = $directory;

            Storage::makeDirectory($directory);
            foreach($request->file('files') as $file){
                $fileName = time() ."_" . $file->getClientOriginalName();
                $file->storeAs('/'.$directory.'/', $fileName, 'azure');
            }

        }else{
            $directory = $evento->imagen;
        }

        $evento->update([

            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion ,
            'lugarEvento' => $request->lugarEvento ,
            'fechaInicioEvento' => $request->fechaInicioEvento ,
            'fechaFinEvento' => $request->fechaFinEvento ,
            'horaEvento' => $horaInicioEvento ,
            'lugarEntregaKits' => $request->lugarEntregaKits ,
            'fechaInicioEntregaKits' => $request->fechaInicioEntregaKits ,
            'fechaFinEntregaKits' => $request->fechaFinEntregaKits ,
            'horaInicioEntregaKits' => $horaInicioEntregaKits ,
            'horaFinEntregaKits' => $horaFinEntregaKits ,
            //'imagen' => $evento->imagen ,
            'imagen' => $directory ,

        ]);

        //Se obtienen los ids de los sub eventos ligados al evento
        $subs = Evento::find($evento->id)->subEventos;

        if (count($subs) != 0){

            foreach ($subs as $se){
                $subsId[] = $se->id;
            }
            //se contabilizan
            $nIds = count($subsId);

            // recorrer el array
            for ($i = 0; $i < $nIds; $i++) {

                $rqCat = "categoria$subsId[$i]";

                $rqDis = "distancia$subsId[$i]";
                $rqUni = "unidadDistancia$subsId[$i]";
                $distaCom= $request->post($rqDis) . " ". $request->post($rqUni);

                $rqRam = "rama$subsId[$i]";
                $rqPre = "precio$subsId[$i]";
                $sbEvn = SubEvento::findOrFail($subsId[$i]);
                $sbEvn->update([
                    'categoria' => strtoupper($request->post($rqCat)),
                    'distancia' => $distaCom,
                    'rama' => $request->post($rqRam),
                    'precio' => $request->post($rqPre),
                ]);

            }
        }

        //Si añadieron una categoría nueva
        $valoresCategoria = $this->inputsArray($request->categoria);
        $valoresDistancia = $this->inputsArray($request->distancia);
        $valoresUnidadDistancia = $this->inputsArray($request->unidadDistancia);
        $valoresRama = $this->inputsArray($request->rama);
        $valoresPrecio = $this->inputsArray($request->precio);

        array_map(function ($cate,$dist,$unidDist,$rama,$precio) use($evento){

            $subEvento = new SubEvento();
            $subEvento->distancia = $dist . " " . $unidDist;
            $subEvento->categoria = strtoupper($cate);
            $subEvento->precio = $precio;
            $subEvento->rama = $rama;
            $subEvento->evento_id = $evento->id;
            $subEvento->save();

        },$valoresCategoria,$valoresDistancia,$valoresUnidadDistancia,$valoresRama,$valoresPrecio);


        return redirect()->route('eventos.index')->with('message','El evento ha sido editado exitosamente.');

    }

    /**
     * Remove the specified resource from storage.
     * @link https://laravel.com/docs/10.x/routing#implicit-soft-deleted-models
     */
    //public function destroy($id)
    public function destroy(Evento $evento)
    {

        if($evento->trashed()){
            if ($evento->imagen != "Indisponible") {
                Storage::disk('azure')->deleteDirectory($evento->imagen);
                $evento->forceDelete();
            }else{
                $evento->forceDelete();
            }
            $msj = "El evento ha sido eliminado definivamente";
        }else{
            $evento->delete();
            $msj = "El evento ha sido eliminado exitosamente";
        }

        return redirect()->route('eventos.index')->with('message',$msj);

    }

    /**
     * Función para mostrar las imagenes para su eliminacón
     */
    public function deleteImages(Evento $evento)
    {

        $path = $evento->imagen;
        $disk = Storage::disk('azure');
        $files = $disk->files($path);
        $listFiles = array();
        foreach ($files as $file){
            $filename = explode("/",$file);
            $carpeta = $filename[0];
            $imageName = $filename[1];
            $item = array(
                'carpeta' => $carpeta,
                'imageName' => $imageName,
                'uri' => $file
            );
            array_push($listFiles,$item);
        }

        return view('evento.delete-images',compact('listFiles','evento'));
    }

    /**
     * Función para eliminar 1 o más imagenes de los contenedores de Azure
     *
     * @link https://youtu.be/NmhirV0zaYA
     * @link https://youtu.be/ZRI5F__YMxk
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyImages(Request $request,Evento $evento)
    {

        $request->validate([
            'img' => 'required',
            //'img.*' => 'required|string'
        ],[
            'required' => 'Selecciona al menos una imágen'
            ]
        );

        foreach ($request->img as $item) {
            $directory = $item;
            Storage::disk('azure')->delete($directory);
        }

        $path = $evento->imagen;
        $disk = Storage::disk('azure');
        $files = $disk->files($path);
        $listFiles = array();
        foreach ($files as $file){
            $item = array(
                'uri' => $file
            );
            array_push($listFiles,$item);
        }

        $nFile = count($listFiles);
        if(empty($nFile) ){
            $evento->update([
                'imagen' => "Indisponible",
            ]);
        }

        return back()->with('message','La(s) imágen(es) han sido elimina(das) exitosamente.');

    }

    /**
     * Función para mostrar los competidores inscritos al evento
     *
     *
     *
     */

    public function inscripciones(Evento $evento,Request $request)
    {

        $search = trim($request->search);

        $competidores = Competidor::with('sub_evento')
                                  ->where(function ($query) use ($search,$evento){
                                      $query->whereHas('sub_evento',function ($quer) use ($search,$evento){
                                          $quer->where('evento_id','=',$evento->id)
                                               ->where(function ($que) use ($search){
                                                    $que->where('distancia','like',"%{$search}%")
                                                        ->orWhere('categoria','like',"%{$search}%")
                                                        ->orWhere('precio','like',"%{$search}%")
                                                        ->orWhere('rama','like',"%{$search}%")
                                                        ->orWhere('nombre','like',"%{$search}%")
                                                        ->orWhere('apellido','like',"%{$search}%")
                                                        ->orWhere('email','like',"%{$search}%")
                                                        ->orWhere('telefono','like',"%{$search}%");
                                          });
                                      });
                                  })
                                  ->paginate(15)
                                  ->withQueryString();

        return view ('evento.inscripciones',compact('evento','search','competidores'));
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

        if(empty($inputs)){
            $nuevoArray = [];
        }else{
            $nuevoArray = array_filter($inputs);
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
