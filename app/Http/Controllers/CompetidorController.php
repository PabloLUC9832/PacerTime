<?php

namespace App\Http\Controllers;

use App\Models\Competidor;
use App\Http\Requests\StoreCompetidorRequest;
use App\Http\Requests\UpdateCompetidorRequest;
use App\Models\Evento;
use App\Models\SubEvento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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

        foreach ($eventos as $evento){
            $urls[] = $this->getImages($evento->imagen);
        }

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

        //Se almacenan los datos del competidor en cache, para
        //ser guardados en la bd posterior a la realización correcta
        //del pago
        $nombre = $request->nombre . " " . $request->apellido;
        $nombreSlug = Str::slug($nombre,'-');

        $email = $request->email;
        $telefono = $request->telefono;
        $telefonoEmergencia = $request->telefonoEmergencia;
        $datos = [
            "nombre" => $request->nombre,
            "apellido" => $request->apellido,
            'fechaNacimiento' => $request->fechaNacimiento,
            'genero' => $request->genero,
            "email" => $email,
            "telefono" => $telefono,
            "telefonoEmergencia" => $telefonoEmergencia,
            "sub_evento" => $subEv->id,
        ];

        Cache::put("competidor-{$nombreSlug}", $datos);



        SDK::setAccessToken(config('services.mercadopago.token'));
        // Crea un objeto de preferencia
        $preference = new Preference();
        // Crea un ítem en la preferencia
        $item = new Item();
        $item->title = "Inscripción al evento {$evento->nombre} a la categoría {$subEv->categoria}, con distancia: {$subEv->distancia} a la rama: {$subEv->rama}" ;
        $item->quantity = 1;
        $item->unit_price = $subEv->precio;

        //$nombreSlug = Str::slug($nombre,'-');

        $preference->back_urls = array(

            "success" => route('competidor.post-pago',['competidor' => "{$nombreSlug}"]),
            "failure" => route('competidor.post-pago',['competidor' => "{$nombreSlug}"]),
            "pending" => route('competidor.post-pago',['competidor' => "{$nombreSlug}"]),

        );
        $preference->auto_return = "approved";

        $preference->items = array($item);
        $preference->save();

        return view('competidor.pago',compact('preference','request','evento','subEv'));

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

    public function eventos(Request $request)
    {

        $search = trim($request->search);

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

        if (!empty(count($eventos))){
            foreach ($eventos as $evento){
                $urls[] = $this->getImages($evento->imagen);
            }
        }else{
            $urls[] = "https://pacertime.blob.core.windows.net/files/imagen-no-disponible.png";
        }

        return view('competidor.eventos',compact('eventos','search','urls'));
    }

    public function post_pago()
    {
        $status = request("collection_status");
        $nombreC = request("competidor");
        $datosCompetidor = Cache::get("competidor-{$nombreC}");
        list('nombre' => $nombre ,
            'apellido' => $apellido,
            'fechaNacimiento' => $fechaNacimiento,
            'genero' => $genero,
            'email' => $email,
            'telefono' => $telefono,
            'telefonoEmergencia' =>$telefonoEmergencia,
            'sub_evento' => $subEv) = $datosCompetidor;

        $message = "";
        switch ($status) {

            case 'approved' :

                $competidor = new Competidor();
                $competidor->nombre = $nombre;
                $competidor->apellido = $apellido;
                $competidor->fechaNacimiento = $fechaNacimiento;
                $competidor->genero = $genero;
                $competidor->email = $email;
                $competidor->telefono = $telefono;
                $competidor->telefonoEmergencia = $telefonoEmergencia;
                $competidor->sub_evento_id = $subEv;
                $competidor->save();
                $message = "Felicidades {$nombre} {$apellido} has sido inscrito con éxito. Nos vemos en la línea de meta :D.";
            break;

            case 'pending' :
            case 'in_process' :
                $message = "Tu pago aún está pendiente. En cuanto sea aprobado te enviaremos un correo.";
            break;

            case 'rejected' :
                $message = "Lo sentimos tu pago ha sido rechazado. Por favor vuelve a intentarlo.";
            break;

        }

        return view ('competidor.post-pago',compact('status','message'));
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
