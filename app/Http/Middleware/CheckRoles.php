<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        ///esta variable nos devuelve todos los parametro que recibimos del request y le le decimos que nos separa cual parametro no queremos verificar

//        $roles = func_get_args();
//
//        dd($roles);
//
        $roles =array_slice(func_get_args(),2);

//          dd($roles);

        //si tiene esos roles pasa a dasboard si no lo retorna a '/'
        if(auth()->user()->hasRoles($roles) ){

            return $next($request);
        }

        return redirect('/admin');

    }
}
