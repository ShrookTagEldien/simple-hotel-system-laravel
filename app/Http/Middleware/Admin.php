<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next=null , $guard=null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('admin/dashBoard');
        }else{
            return redirect('admin/login');
        } 

        return $next($request);
    }
}
