<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect(route('login'));
        }
        if (isset(Auth::user()->UserPermissionGroup->group->name)&&!Auth::user()->UserPermissionGroup->group->name=='admin') {
            return redirect('/home');
        }

            if (Auth::id() !== null && Auth::user()->hasRole(['organisation']) && !isset(Auth::user()->organisation->id)) {
                Session::flush();
                Auth::logout();
                return redirect('login')->with(['message'=>'You don\'t belong to any Organisation please contact administrator']);
            }

            return $next($request);
    }
}



