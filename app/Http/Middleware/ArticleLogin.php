<?php

namespace App\Http\Middleware;

use Closure;

class ArticleLogin
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
        //执行动作
        $user = session('logindo');
        if(!$user){
            return redirect("article/login");
        }
        return $next($request);
    }
}
