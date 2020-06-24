<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ActivedCustomer
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
        if(!Auth()->user()->actived)
        {
            Auth()->logout();
            return redirect('login')->with('error','Lo sentimos su cuenta esta suspendida.');
        }
        return $next($request);
    }
}
