<?php

namespace App\Http\Middleware;

use App\Models\Evento;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class EnsureImageFolderIsEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //dd($request->route()->parameters());
        //dd($request->route('evento.id'));
        //die();
        $idEvento = $request->route('evento.id');
        //dd($idEvento);
        //die();

        $evento = Evento::find($idEvento);
        //dd($evento);
        //die();

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

        if(empty($nFile)){
            return redirect(route('eventos.index'));
        }

        return $next($request);
    }
}
