<?php

namespace App\Http\Middleware;

use Admin\UserManagement\Models\UsersInnerJoin;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class Organisation
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
        $user = $request->user();
        $canUserOrganisation = UsersInnerJoin::where(array('join_type'=>'organisation','user_id'=> $user->id))->first();
        if ($canUserOrganisation) {
            session(['organisation_id' => $canUserOrganisation->organisation_id]);
            if ($user->hasRole('super-admin')) {
                return redirect('/dashboard');
            }
            if (isset(Auth::user()->UserPermissionGroup->group->name) && !Auth::user()->UserPermissionGroup->group->name == 'admin') {
                if (Auth::id() !== null && Auth::user()->hasRole(['organisation']) && !isset(Auth::user()->organisation->id)) {
                    Session::flush();
                    Auth::logout();
                    return redirect('login')->withErrors(['message'=>'You don\'t belong to any Organisation please contact administrator']);
                }
            }
                return $next($request);

        } else {
            return redirect('/dashboard');
        }
    }
}



