<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Role;

class UserCheck
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
        $userRole = Auth::user()->roles->pluck('name');

        if(!$userRole->contains('user')){

            return redirect()->route('admindashboard');
        }
        return $next($request);
    }
}
