<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AcessoHospitalMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      
        if(Auth::user()->it_tipo_utilizador == 2 ||  Auth::user()->it_tipo_utilizador == 3 )
        {
            if(Auth::user()->hospital()->first())
            {
                return $next($request);
            }
            return redirect()->route('site.home'); 
        }
        return $next($request);
    }
}
