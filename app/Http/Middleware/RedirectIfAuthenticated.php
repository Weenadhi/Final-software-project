<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

            foreach(Auth::user()->role as $role){

                if($role->name == 'super_admin'){

                    return redirect('sadmin/home');

                }elseif($role->name == 'admin'){

                    return redirect('admin/home');

                }elseif($role->name == 'user'){

                    return redirect('user/home');

                }elseif($role->name == 'employee'){

                    return redirect('/login');

                }

            }
        }

        return $next($request);
    }
}
