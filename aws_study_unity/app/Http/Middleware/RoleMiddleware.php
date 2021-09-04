<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // $user = Auth::user();
        // if($user->isAdmin()) {
        //     return redirect()->intended('/admin');
        // }

        if(!$request->user()->userHasRole($role)) {
            abort(403, 'You aren\'t authorized.');
        }

        return $next($request);
    }
}
