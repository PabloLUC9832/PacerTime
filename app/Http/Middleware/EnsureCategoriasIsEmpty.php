<?php

namespace App\Http\Middleware;

use App\Models\Evento;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureCategoriasIsEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $idEvento = $request->route('evento.id');
        //Se obtienen los ids de los sub eventos ligados al evento
        $subs = Evento::find($idEvento)->subEventos;

        if(empty(count($subs))){
            return redirect(route('eventos.edit',$idEvento));
        }

        return $next($request);
    }
}
