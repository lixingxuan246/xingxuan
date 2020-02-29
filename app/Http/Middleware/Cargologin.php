<?php

namespace App\Http\Middleware;

use Closure;

class Cargologin
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
         $user = session('cargo');
         if(!$user){
            return redirect('cargo/login');
         }
        return $next($request);
    }
}
