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

        $auth = auth()->user();

        if (!in_array($auth->id_rol, explode('|', $roles))) {
            return redirect()->route('app.inicio')
               ->with(AppHelpers::alert('No autorizado', 'No tienes los permisos necesarios para acceder a este módulo', 'error'));
        }

        return $next($request);
    }
}
