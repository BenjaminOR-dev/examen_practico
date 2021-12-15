<?php

namespace App\Http\Middleware;

use App\Helpers\AppHelpers;
use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $roles = '')
    {
        if (!auth()->check()) {
            return redirect()->route('auth.login.form');
        }

        if (!in_array(auth()->user()->id_rol, explode('|', $roles))) {
            return abort(403);
        }

        return $next($request);
    }
}
