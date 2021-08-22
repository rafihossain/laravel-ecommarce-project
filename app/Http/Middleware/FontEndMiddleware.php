<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class FontEndMiddleware
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
        if(Session::get('customerId')){
            return $next($request);
        }else{
            return redirect ('/account/login-info');
        }
    }
}
