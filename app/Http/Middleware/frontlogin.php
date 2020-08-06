<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class frontlogin
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
        if(empty(Session::has('user_email'))){
            return redirect('/login-register');
        }
        return $next($request);
    }
}
