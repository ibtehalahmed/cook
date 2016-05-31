<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class chefMiddleware
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
 if (Auth::user())
        {  if(Auth::user()->usertype !== 1)
           {
            
              return response('you are not allowed');
           }

    } 
                               return $next($request);

                               
           }
}
