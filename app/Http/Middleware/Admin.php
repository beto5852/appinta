<?php

namespace App\Http\Middleware;
use Session;
use Closure;
use Illuminate\Contracts\Auth\Guard;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected  $auth;
    public function __construct(Guard $auth)
    {
        $this->middleware = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if( $this->middleware->user()->type != 'admin'){
            Session::flash('message','Accedo denegado usted no es administrador');
            return redirect('/login');
        }
        return $next($request);
    }
}
