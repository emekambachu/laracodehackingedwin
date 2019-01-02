<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth; //auth class should always be imported

class AdminMiddleware
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
        if(Auth::check()){
            if(Auth::user()->isAdmin()){
                return $next($request);
            }
        }

        return redirect('/admin');

    }

}
