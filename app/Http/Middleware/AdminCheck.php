<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Role;

class AdminCheck
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
        $adminRole = Auth::user()->roles->pluck('name');

        if(!$adminRole->contains('admin')){

            return redirect()->route('userdashboard');
        }
        return $next($request);
    }
}
