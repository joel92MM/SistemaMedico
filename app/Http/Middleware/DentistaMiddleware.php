<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DentistaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // aqui agregamos uuna condicion para el acceso del administrador

        // en esta condicion si el usuario tiene rol de admin podra acceder y si no tiene acceso
        // se redireccionara a la ruta de inicio
        if(auth()->user()->role=='dentista'){
            return $next($request);
        }
        return redirect('/');
    }
}
