<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class PrivilagesControl
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
        //dd($next);
        if (!check_user_privilage(Auth::user()->id)) {
            return abort(408);
        }
        
        return $next($request);
    }
}
